<x-app-layout>
    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="mb-4">
                    <h1 class="text-2xl font-bold text-gray-900 text-center">Your Published Projects</h1>
                </div>

                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                        role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                <div class=" grid grid-cols-1 md:grid-cols-1 lg:grid-cols-2 gap-6">
                    @foreach ($projects as $project)
                        <div
                            class="bg-white shadow-md rounded-lg p-5 border border-gray-200">
                            <h3 class="text-5xl font-semibold text-gray-800">{{ $project->title }}</h3>
                            <p class="mt-2 text-xl text-gray-900">
                                <strong class="text-3xl">Problem Statement:</strong> <br>
                                {{ $project->problem_statement }}</p>                                
                            <p class="mt-2 text-xl text-gray-900">
                                <strong class="text-3xl">Solution Proposed:</strong> <br>
                                {{ $project->solution_proposed }}</p>

                                    <section class="mb-4">
                                        <h3 class="text-3xl font-bold">Education</h3>
                                        <ul class="list-disc list-inside text-gray-750">
                                            @foreach (explode("\n", $project->description) as $point)
                                                <li class="mb-2 text-2xl">{{ $point}}</li>
                                            @endforeach
                                        </ul>
                                    </section>

                            {{-- <p class="mt-2 text-xl text-gray-900">
                                <strong class="text-3xl">Description:</strong> <br>
                                {{ $project->description }}</p> --}}
                            <p class="mt-2 text-xl text-gray-900">
                                <strong class="text-3xl">Tools <i class="fa-solid fa-toolbox"></i> :</strong> <br>
                                {{ $project->tools_used }}</p>
                            <p class="mt-2 text-xl text-gray-900">
                                <strong class="text-3xl">Programming Language:</strong> <br>
                                {{ $project->programming_language }}</p>
                            <p class="mt-2 text-xl text-gray-900">
                                <strong class="text-3xl">GitHub Repository:</strong> <br>
                                <a
                                    href="{{ $project->github_repository }}" target="_blank"
                                    class="text-3xl"><i class="fa-brands fa-github"></i></a></p>
                            @if ($project->powerpoint)
                                <p class="mt-2 text-xl text-gray-900">
                                    <strong class="text-3xl">PowerPoint Presentation:</strong></p>
                                <a href="{{ asset('storage/' . $project->powerpoint) }}" target="_blank"
                                    class="text-blue-500">Download PowerPoint</a>
                            @endif                                    

                            @if ($project->flowchart_diagram)
                            <div class="shadow-lg shadow-red-100 rounded-lg p-1 mt-5">
                                <p class="mt-2 text-3xl text-gray-900"><strong>Flowchart Diagram:</strong></p>
                                <img src="{{ asset('storage/' . $project->flowchart_diagram) }}" alt="Flowchart diagram"
                                    class="mt-2 w-full h-auto">
                                    </div>
                            @endif
                            @if ($project->database_diagram)
                            <div class="shadow-lg shadow-red-100 rounded-lg p-1 mt-5">
                                <p class="mt-2 text-6xl text-gray-900"><strong><i class="fa-solid fa-database"></i> Diagram:</strong></p>
                                <img src="{{ asset('storage/' . $project->database_diagram) }}" alt="Database diagram"
                                    class="mt-2 w-full h-auto">
                            </div>
                            @endif

                             <div class="shadow-lg shadow-red-100 rounded-lg p-1 mt-5">
                                <label class="block text-gray-700 text-6xl font-bold mb-2" for="video_url"><i class="fa-solid fa-video"></i></label>
                                @if (isset($project) && $project->video_url)
                                    <video class="w-full h-auto mt-2" autoplay muted>
                                        <source src="{{ asset('storage/' . $project->video_url) }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                @endif
                            </div>
                            {{-- <p class="mt-2 text-xl text-gray-900"><strong>Visibility <i class="fa-solid fa-eye"></i> :</strong>
                                {{ ucfirst($project->visibility) }}</p> --}}
                            <p class="text-2xl text-red-500 mt-2">Posted {{ $project->created_at->diffForHumans() }}
                            </p>
                            <div class="mt-4 flex space-x-4">
                                @can('edit project')
                                <a href="{{ route('projects.edit', $project->id) }}"
                                    class="inline-flex items-center px-4 py-2 bg-yellow-500 text-white text-sm font-medium rounded-lg shadow hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition ease-in-out duration-150">
                                    <i class="fas fa-edit text-xl"></i>
                                </a>
                                @endcan
                                @can('delete project')
                                <form action="{{ route('projects.destroy', $project->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this project?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="inline-flex items-center px-4 py-2 bg-red-500 text-white text-sm font-medium rounded-lg shadow hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition ease-in-out duration-150">
                                        <i class="fas fa-trash text-xl"></i>
                                    </button>
                                </form>
                                @endcan


                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
