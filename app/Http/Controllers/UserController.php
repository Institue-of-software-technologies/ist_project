<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Notifications\AccountActivation;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Facades\Log;

class UserController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:view user', only: ['index']),
            new Middleware('permission:delete user', only: ['destroy']),
            new Middleware('permission:edit user', only: ['update', 'edit']),
            new Middleware('permission:create user', only: ['create', 'store']),
        ];
    }

    // import function 
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xls,xlsx,csv|max:2048',
        ]);

        if ($request->hasFile('file')) {
            try {
                $file = $request->file('file');
                Excel::import(new UsersImport, $file);
                return redirect()->route('users.index')->with('status', 'Users Imported and Email sent successfully');
            } catch (\Exception $e) {
                Log::error('Error importing file: ' . $e->getMessage(), ['exception' => $e]);
                return redirect()->back()->withErrors(['file' => 'Error importing file. Please try again.']);
            }
        } else {
            return redirect()->back()->withErrors(['file' => 'No file uploaded.']);
        }
    }




    public function activateAccount($token)
    {
        $user = User::where('activation_token', $token)->first();
        if (!$user) {
            return redirect('/')->with('error', 'Invalid activation token');
        }

        return view('auth.activate', ['token' => $token]);
    }

    public function setPassword(Request $request, $token)
    {
        // Find the user by activation token
        $user = User::where('activation_token', $token)->first();

        // Check if the user exists
        if (!$user) {
            return redirect('/')->with('error', 'Invalid activation token');
        }

        // Validate the password
        $request->validate([
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/[A-Z]/', // must contain at least one uppercase letter
                'regex:/[a-z]/', // must contain at least one lowercase letter
                'regex:/[0-9]/', // must contain at least one digit
                'confirmed',
            ],
        ]);

        // Update the user's password
        $user->password = Hash::make($request->password);
        $user->activation_token = null;
        $user->email_verified_at = now();
        $user->save();

        // Redirect to the login page with a success message
        return redirect('login')->with('status', 'Account activated. You can now log in');
    }

    public function index()
    {
        $users = User::get();
        return view('role-permission.user.index', ['users' => $users]);
    }

    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('role-permission.user.create', ['roles' => $roles]);
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:users,email',
                'password' => [
                    'required',
                    'string',
                    'confirmed',
                    'min:8',
                    'max:20',
                    'regex:/^(?=.*[A-Z])(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$/'
                ],
                'roles' => 'required'
            ],
            [
                'password.regex' => 'The password must be between 8 and 20 characters long and include at least one uppercase letter and
one special character.'
            ]
        );

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'activation_token' => Str::random(60),

        ]);

        $user->notify(new AccountActivation($user));

        $user->syncRoles($request->roles);

        return redirect('/users')->with('status', 'User created with role and email sent successfully');
    }

    public function edit(User $user)
    {
        $roles = Role::pluck('name', 'name')->all();
        $userRoles = $user->roles->pluck('name', 'name')->all();
        return view('role-permission.user.edit', [
            'user' => $user,
            'roles' => $roles,
            'userRoles' => $userRoles
        ]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate(
            [
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:users,email,' . $user->id,
                'password' => [
                    'nullable',
                    'string',
                    'min:8',
                    'max:20',
                    'regex:/^(?=.*[A-Z])(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$/'
                ],
                'roles' => 'required'
            ],
            [
                'password.regex' => 'The password must be between 8 and 20 characters long and include at least one uppercase letter and
one special character.'
            ]

        );
        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if (!empty($request->password)) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);
        $user->syncRoles($request->roles);

        return redirect('/users')->with('status', 'User Updated Successfully with roles');
    }

    public function destroy($userId)
    {
        $user = User::findOrFail($userId);
        $user->delete();

        return redirect('/users')->with('status', 'User Deleted Successfully');
    }
}
