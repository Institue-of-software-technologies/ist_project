<x-app-layout>
    <!-- resources/views/skills/edit.blade.php -->
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
                        <h4 class="text-lg font-semibold">Edit Tool
                            <a href="{{ url('skills') }}"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded float-right">Back</a>
                        </h4>
                    </div>
                    <div class="p-4">
                        <form action="{{ url('skills/'.$tool->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Skill Name -->
                            <div>
                                <x-input-label for="name" :value="__('Tool Name')" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                    value="{{ old('name', $tool->tool_name) }}" required autofocus />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <div class="mt-4">
                                <button type="submit"
                                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
