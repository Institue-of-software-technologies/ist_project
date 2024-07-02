<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black leading-tight">
            {{ __('Alumni Projects') }}

                        <a class="bg-red-500 hover:bg-red-700 text-white font-bold my-auto px-4 rounded float-right" href="{{route ('alumni.index')}}">Back</a>
        </h2>
    
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-300 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 border-b border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900">{{ $alumni->name }}'s Projects</h3>
                    <p class="mt-2 text-lg text-gray-800">List of projects by {{ $alumni->name }}:</p>

                    <ul class="mt-4 space-y-4">
                        @foreach($alumni->projects as $project)
                            <li>
                                <a href="{{ route('alumni.projects.show', ['project' => $project->id]) }}"
                                   class="text-red-600 text-2xl hover:text-red-500">{{ $project->title }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
