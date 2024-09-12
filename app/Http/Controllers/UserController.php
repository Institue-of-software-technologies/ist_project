<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Skill;
use Illuminate\Support\Str;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Notifications\AccountActivation;
use App\Notifications\AccountDeactivation;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class UserController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:view user', only: ['index']),
            new Middleware('permission:delete user', only: ['destroy']),
            new Middleware('permission:edit user', only: ['update', 'edit']),
            new Middleware('permission:create user', only: ['create', 'store']),
            new Middleware('permission:activateDeactivateUser', only: ['activate' ,'deactivate'])
        ];
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xls,xlsx,csv|max:2048',
        ]);

        if ($request->hasFile('file')) {
            try {
                $file = $request->file('file');
                Excel::import(new UsersImport, $file);
                return redirect()->route('role-permission.user.index')->with('success', 'Users Imported and Email sent successfully');
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
        $user = User::where('activation_token', $token)->first();

        if (!$user) {
            return redirect('/')->with('error', 'Invalid activation token');
        }

        $request->validate([
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/[A-Z]/',
                'regex:/[a-z]/',
                'regex:/[0-9]/',
                'confirmed',
            ],
        ]);

        $user->password = Hash::make($request->password);
        $user->activation_token = null;
        $user->email_verified_at = now();
        $user->save();

        return redirect('login')->with('success', 'Account activated. You can now log in');
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
                'password.regex' => 'The password must be between 8 and 20 characters long and include at least one uppercase letter and one special character.'
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

        return redirect()->route('role-permission.user.index')->with('success', 'User created with role and email sent successfully');
    }

    public function edit(User $user)
    {
        $roles = Role::pluck('name', 'name')->all();
        $userRoles = $user->roles->pluck('name', 'name')->all();
        $skills = Skill::all();
        $userSkills = $user->skills->pluck('name', 'name')->all();

        return view('role-permission.user.edit', [
            'user' => $user,
            'roles' => $roles,
            'userRoles' => $userRoles,
            'skills' => $skills,
            'userSkills' => $userSkills
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
                'password.regex' => 'The password must be between 8 and 20 characters long and include at least one uppercase letter and one special character.'
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
        $user->syncSkills($request->skills);

        return redirect()->route('role-permission.user.index')->with('success', 'User Updated Successfully with roles');
    }

    public function destroy($userId)
    {
        $user = User::findOrFail($userId);
        $user->delete();

        return redirect()->route('role-permission.user.index')->with('success', 'User Deleted Successfully');
    }

    public function resendActivationEmail($user)
    {
        $user->notify(new AccountActivation($user));
    }
    public function deactivate($userId)
    {
        $user = User::find($userId);
        if ($user) {
            // Set a flag or status to indicate that the user is deactivated
            $user->deactivated_at = now();
            $user->save();

            // Send email notification
            $user->notify(new AccountDeactivation($user));

            return redirect()->route('role-permission.user.index')->with('success', 'User account deactivated successfully.');
        }

        return redirect()->route('role-permission.user.index')->with('error', 'User not found.');
    }
    public function activate($userId)
    {
        $user = User::find($userId);
        if ($user) {
            $user->deactivated_at = null;
            $user->save();

            return redirect()->route('role-permission.user.index')->with('success', 'User account activated successfully.');
        }

        return redirect()->route('role-permission.user.index')->with('error', 'User not found.');
    }


}
