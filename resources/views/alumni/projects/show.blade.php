<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-200 shadow-xl sm:rounded-lg p-6">
                <div class="mb-4 flex justify-between items-center">
                    <h3 class="text-3xl text-gray-900 font-bold ">These are my projects</h3>
                    <a href="{{ route('alumni.index') }}"
                        class="bg-red-500 hover:bg-red-700 text-white font-bold px-4 py-2 rounded">
                        Back
                    </a>
                </div>

                <div class="gap-6">
                    <div class="bg-gray-200  shadow-md rounded-lg p-5 border border-gray-800 mt-5">
                        <h3 class="text-3xl lg:text-5xl font-extrabold text-center text-red-600">{{ $project->title }}
                        </h3>
                        <div class="shadow-2xl shadow-gray-700 rounded-xl p-1 mt-8 text-center">
                            <label class="block text-gray-700 text-2xl lg:text-3xl font-bold mb-2" for="video_url">
                                <i class="fa-solid fa-video"></i>Video Presentation
                            </label>
                            @if (isset($project) && $project->video_url)
                                @php
                                    $youtubePattern =
                                        '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^&?\/]+)/';
                                    $isYouTube = preg_match($youtubePattern, $project->video_url, $match);
                                @endphp

                                @if ($isYouTube && isset($match[1]))
                                    @php
                                        $videoId = $match[1];
                                    @endphp
                                    <iframe class="w-full h-96 mt-2 rounded-xl"
                                        src="https://www.youtube.com/embed/{{ $videoId }}" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                @endif
                            @else
                                <p class="text-red-500">Video URL is not available or invalid.</p>
                            @endif
                        </div>
                        <p class="mt-10 text-center text-gray-900">
                            <strong class="text-2xl lg:text-3xl ">Problem Statement:</strong> <br>
                            @foreach (explode("\n", $project->problem_statement) as $point)
                                <li class="mb-2 text-xl">{{ $point }}</li>
                            @endforeach
                        </p>
                        <p class="mt-2 text-center text-gray-900">
                            <strong class="text-2xl lg:text-3xl">Solution Proposed:</strong> <br>
                            @foreach (explode("\n", $project->solution_proposed) as $point)
                                <li class="mb-2 text-xl">{{ $point }}</li>
                            @endforeach
                        </p>

                        <section class="mb-4">
                            <h3 class="text-2xl lg:text-3xl text-center font-bold">Project Description : </h3>
                            <ul class="list-disc list-inside text-gray-750">
                                @foreach (explode("\n", $project->description) as $point)
                                    <li class="mb-2 text-xl">{{ $point }}</li>
                                @endforeach
                            </ul>
                        </section>

                        <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 text-wrap mt-7">
                            <p class="mt-2 text-xl text-gray-900">
                                <strong class="text-xl lg:text-3xl">Tools <i class="fa-solid fa-toolbox"></i>
                                    :</strong> <br>
                                {{ $project->tools_used }}
                            </p>
                            <p class="mt-2 text-xl text-gray-900">
                                <strong class="text-xl lg:text-3xl">Programming Language:</strong> <br>
                                {{ $project->programming_language }}
                            </p>
                            <p class="mt-2 text-xl text-gray-900">
                                <strong class="text-xl lg:text-3xl">GitHub Repository:</strong> <br>
                                <a href="{{ $project->github_repository }}" target="_blank"
                                    class="text-xl lg:text-3xl"><i class="fa-brands fa-github"></i></a>
                            </p>
                            <h1>
                                @if ($project->powerpoint)
                                    <p class="mt-2 text-xl text-gray-900">
                                        <strong class="text-xl lg:text-3xl">PowerPoint Presentation:</strong>
                                    </p>
                                    <a href="{{ asset('storage/' . $project->powerpoint) }}" target="_blank"
                                        class="text-blue-500">Download PowerPoint</a>
                                @endif
                            </h1>
                            <h1>
                                @if ($project->flowchart_diagram)
                                    <p class="mt-2 text-xl lg:text-3xl text-gray-900"><strong>Flowchart
                                            Diagram:</strong></p>
                                    <a href="{{ asset('storage/' . $project->flowchart_diagram) }}" target="_blank"
                                        class="text-blue-500">View Flowchart Diagram</a>
                                @endif
                            </h1>
                            <h1>
                                @if ($project->database_diagram)
                                    <p class="mt-2 text-xl lg:text-3xl text-gray-900"><strong>Flowchart
                                            Diagram:</strong></p>
                                    <a href="{{ asset('storage/' . $project->database_diagram) }}" target="_blank"
                                        class="text-blue-500">View Database Diagram</a>
                                @endif
                            </h1>
                        </div>

                        {{-- <p class="mt-2 text-xl text-gray-900"><strong>Visibility <i class="fa-solid fa-eye"></i> :</strong>
                                {{ ucfirst($project->visibility) }}</p> --}}
                        <p class="text-2xl text-red-500 mt-2">Posted
                            {{ $project->created_at->diffForHumans() }}
                        </p>
                        <div class="mt-4 flex space-x-4">
                            {{-- @can('edit project') --}}
                            <a href="{{ route('projects.edit', $project->id) }}"
                                class="inline-flex items-center px-4 py-2 bg-yellow-500 text-white text-sm font-medium rounded-lg shadow hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition ease-in-out duration-150">
                                <i class="fas fa-edit text-xl"></i>
                            </a>
                            {{-- @endcan --}}
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
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
