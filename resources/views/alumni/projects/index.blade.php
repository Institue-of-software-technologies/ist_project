<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black leading-tight">
            {{ __('Alumni Projects') }}

            <a class="bg-red-500 hover:bg-red-700 text-white font-bold my-auto px-4 rounded float-right"
                href="{{ route('alumni.index') }}">Back</a>
        </h2>


    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-300 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 border-b border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900">{{ $alumni->name }}'s Projects</h3>
                    <p class="mt-2 text-lg text-gray-800">List of projects by {{ $alumni->name }}:</p>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @if ($alumni->projects->isEmpty())
                                <div
                                    class="justify-center p-6 bg-red-100 border border-solid border-red-600 text-red-700 text-center font-bold rounded-lg shadow-lg">
                                    <p class="text-xl">{{ __('User Has Not Published Any Projects.') }}</p>
                                </div>
                            @endif                        
                        @foreach ($alumni->projects as $project)
                            <div
                                class=" bg-gray-100 shadow-lg rounded-lg p-5 border border-gray-300 hover:bg-gray-200 transition duration-1000 ease-out transform hover:-translate-y-2">
                                <h3 class="text-2xl font-bold text-center text-red-600 mb-4">
                                    <a
                                        href="{{ route('alumni.projects.show', ['project' => $project->id]) }}">{{ $project->title }}</a>
                                </h3>
                                <p class="text-center text-gray-700">
                                    {{ Illuminate\Support\Str::limit($project->description, 300) }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
