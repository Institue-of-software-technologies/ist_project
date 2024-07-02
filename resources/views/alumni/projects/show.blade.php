<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-200 shadow-xl sm:rounded-lg p-6">
                <div class="mb-4 flex justify-between items-center">
                    <h3 class="text-3xl text-gray-900 font-bold ">These are my projects</h3>
                    {{-- <a href="{{ route('alumni.index') }}" class="bg-red-500 hover:bg-red-700 text-white font-bold px-4 py-2 rounded">
                        Back
                    </a> --}}
                </div>

                <div class="gap-6">
                    <div class="bg-gray-200 shadow-md rounded-lg p-6 border border-gray-600 mx-auto">
                        <h3 class="text-3xl lg:text-5xl font-semibold text-gray-900">{{ $project->title }}</h3>
                        <p class="mt-4 text-xl text-gray-800">
                            <strong class="lg:text-3xl text-xl">Problem Statement:</strong><br>
                            {{ $project->problem_statement }}
                        </p>
                        <p class="mt-4 text-xl text-gray-800">
                            <strong class="lg:text-3xl text-xl">Solution Proposed:</strong><br>
                            {{ $project->solution_proposed }}
                        </p>

                        <section class="mb-4">
                            <h3 class="lg:text-3xl text-xl font-bold text-gray-900">Education</h3>
                            <ul class="list-disc list-inside text-gray-800">
                                @foreach (explode("\n", $project->description) as $point)
                                    <li class="mb-2 text-2xl">{{ $point }}</li>
                                @endforeach
                            </ul>
                        </section>

                        <p class="mt-4 text-xl text-gray-800">
                            <strong class="lg:text-3xl text-xl">Tools <i class="fa-solid fa-toolbox"></i>:</strong><br>
                            {{ $project->tools_used }}
                        </p>
                        <p class="mt-4 text-xl text-gray-800">
                            <strong class="lg:text-3xl text-xl">Programming Language:</strong><br>
                            {{ $project->programming_language }}
                        </p>
                        <p class="mt-4 text-xl text-gray-800">
                            <strong class="lg:text-3xl text-xl">GitHub Repository:</strong><br>
                            <a href="{{ $project->github_repository }}" target="_blank" class="lg:text-3xl text-xl">
                                <i class="fa-brands fa-github"></i>
                            </a>
                        </p>

                        @if ($project->powerpoint)
                            <p class="mt-4 text-xl text-gray-800">
                                <strong class="lg:text-3xl text-xl">PowerPoint Presentation:</strong>
                            </p>
                            <a href="{{ asset('storage/' . $project->powerpoint) }}" target="_blank" class="text-blue-500 hover:text-blue-800">
                                Download PowerPoint
                            </a>
                        @endif

                        @if ($project->flowchart_diagram)
                            <div class=" p-1 mt-5">
                                <p class="mt-4 lg:text-3xl text-xl text-gray-800">
                                    <strong>Flowchart Diagram:</strong>
                                </p>
                                <img src="{{ asset('storage/' . $project->flowchart_diagram) }}" alt="Flowchart diagram" class="mt-2 w-full h-auto rounded-xl">
                            </div>
                        @endif

                        @if ($project->database_diagram)
                            <div class="p-1 mt-5">
                                <p class="mt-4 text-2xl lg:text-4xl text-gray-800">
                                    <strong><i class="fa-solid fa-database"></i> Diagram:</strong>
                                </p>
                                <img src="{{ asset('storage/' . $project->database_diagram) }}" alt="Database diagram" class="mt-2 w-full h-auto rounded-xl">
                            </div>
                        @endif

                        <div class="p-1 mt-5">
                            <label class="block text-gray-800 text-2xl lg:text-4xl font-bold mb-2" for="video_url">
                                <i class="fa-solid fa-video"></i>
                            </label>
                            @if (isset($project) && $project->video_url)
                                <video class="w-full h-auto mt-2 rounded-xl" autoplay muted>
                                    <source src="{{ asset('storage/' . $project->video_url) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            @endif
                        </div>

                        <p class="text-2xl text-red-600 mt-4">Posted {{ $project->created_at->diffForHumans() }}</p>

                        <div class="mt-4 flex space-x-4">
                            @can('edit project')
                                <a href="{{ route('projects.edit', $project->id) }}" class="inline-flex items-center px-4 py-2 bg-yellow-500 text-white text-sm font-medium rounded-lg shadow hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition ease-in-out duration-150">
                                    <i class="fas fa-edit text-xl"></i>
                                </a>
                            @endcan
                            @can('delete project')
                                <form action="{{ route('projects.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this project?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-500 text-white text-sm font-medium rounded-lg shadow hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition ease-in-out duration-150">
                                        <i class="fas fa-trash text-xl"></i>
                                    </button>
                                </form>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
