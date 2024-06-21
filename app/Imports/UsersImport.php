<?php
namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Notifications\AccountActivation;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Log;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        try {
            // Create the user with a random activation token
            $user = new User([
                'name' => $row['name'],
                'email' => $row['email'],
                'password' => Hash::make('defaultpassword'), // Set a default password, prompt for reset later
                'activation_token' => Str::random(60),
            ]);

            $user->save();

            // Assign default roles if necessary (optional)
// $user->syncRoles(['default-role']);

            // Send account activation email
            $user->notify(new AccountActivation($user));

            return $user;
        } catch (\Exception $e) {
            Log::error('Error importing user: ' . $e->getMessage());
            throw $e;
        }
    }
}
