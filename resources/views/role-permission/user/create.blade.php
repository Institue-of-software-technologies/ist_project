<x-app-layout>
    <!-- resources/views/users/create.blade.php -->
    <div class="container mx-auto mt-5">
        <div class="flex flex-col">
            <div class="w-full">

                @if (session('status'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                        role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                @if ($errors->any())
                    <ul class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative mb-4">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <div class="bg-gray-100 p-4 border-b border-gray-200">
                        <h4 class="text-lg font-semibold">Create User
                            <a href="{{ url('users') }}"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded float-right">Back</a>
                        </h4>
                    </div>
                    <div class="p-4">
                        <form action="{{ url('users') }}" method="POST">
                            @csrf


                            <div>
                                <x-input-label for="name" :value="__('First Name')" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                    :value="old('name')" required autofocus autocomplete="name" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="lname" :value="__('Last Name')" />
                                <x-text-input id="lname" class="block mt-1 w-full" type="text" name="lname"
                                    :value="old('name')" required autofocus autocomplete="name" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <!-- Email Address -->
                            <div class="mt-4">
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                    :value="old('email')" required autocomplete="username" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <!-- Password -->
                            <div class="mt-4">
                                <!-- Password Requirements Box -->
                                <div class="bg-red-100 border border-red-400 text-gray-900 px-4 py-3 rounded mb-4">
                                    <h3 class="font-semibold">Your password must contain the following:</h3>
                                    <ul class="list-disc list-inside">
                                        <li>Upper & Lowercase letters</li>
                                        <li>Numbers</li>
                                        <li>Special Characters</li>
                                    </ul>
                                </div>
                                <x-input-label for="password" :value="__('Password')" />
                                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                                    required autocomplete="new-password" />

                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>


                            <div class="mt-4">
                                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                    name="password_confirmation" required autocomplete="new-password" />

                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>

                            <!-- Show Password Checkbox -->
                            <div class="mt-4">
                                <label class="inline-flex items-center">
                                    <input type="checkbox" id="showPasswords"
                                        class="form-checkbox h-5 w-5 text-red-600">
                                    <span class="ml-2 text-gray-700">Show Password</span>
                                </label>
                            </div>

                            <div class="mb-4">
                                <label for="roles" class="block text-gray-700">Roles</label>
                                <select name="roles[]"
                                    class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50"
                                    multiple>
                                    <option value="">Select Role</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role }}">{{ $role }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <button type="submit"
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('showPasswords').addEventListener('change', function() {
            const passwordField = document.getElementById('password');
            const confirmPasswordField = document.getElementById('password_confirmation');
            const type = this.checked ? 'text' : 'password';
            passwordField.setAttribute('type', type);
            confirmPasswordField.setAttribute('type', type);
        });
    </script>
</x-app-layout>
