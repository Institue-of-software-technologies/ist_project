<x-app-layout>
    <x-slot name="header">
        @include('role-permission.nav-links')
    </x-slot>

    <div class="container mx-auto mt-2 px-4">
        <div class="row">
            <div class="col-md-12">
                @if (session('status'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                        role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4"
                        role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session('failures'))
                    <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative mb-4"
                        role="alert">
                        <ul>
                            @foreach (session('failures') as $failure)
                                <li>{{ $failure->errors() }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('import.users') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="file" class="block text-sm font-medium text-gray-700">Upload Multiple
                            Users</label>
                        <input type="file" name="file" id="file" class="mt-1 block w-full">
                    </div>
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Upload</button>
                </form>
                <div class="card mt-3 bg-white shadow-md rounded-lg overflow-hidden">

                    <div class="card-header bg-gray-100 p-4 border-b border-gray-200">

                        <h4 class="text-lg font-semibold flex justify-between items-center">
                            Users
                            @can('create user')
                                <a href="{{ url('users/create') }}"
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Add User</a>
                            @endcan
                        </h4>
                    </div>
                    <div class="p-4">
                        <div class="overflow-x-auto mt-4">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Id</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Name</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Email</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Roles</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($users as $user)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $user->id }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $user->name }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @if (!empty($user->getRoleNames()))
                                                    @foreach ($user->getRoleNames() as $rolename)
                                                        <span
                                                            class="bg-red-600 text-white text-xs font-bold mr-2 px-2.5 py-0.5 rounded">{{ $rolename }}</span>
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap flex items-center space-x-2">
                                                @can('edit user')
                                                    <a href="{{ url('users/' . $user->id . '/edit') }}"
                                                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                                                @endcan
                                                @can('delete user')
                                                    <a href="{{ url('users/' . $user->id . '/delete') }}"
                                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</a>
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
