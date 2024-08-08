<x-app-layout>
    <div x-data="{ openModal: false, currentProject: null }" >
        <div class="profile-header bg-gradient-to-r from-red-500 to-red-700 py-6 text-center text-white">
            <a class="bg-red-500 hover:bg-red-700 text-white font-bold my-auto px-4 rounded float-right"
                href="{{ url('/profiles/index') }}">Back</a>
            <h1 class="text-2xl font-bold mb-2">{{ $alumni->name}}' Projects</h1>
        </div>
        <div class="max-w-7xl mx-auto py-5 sm:px-6 lg:px-8">
            @if ($alumni->projects->isEmpty())
                <div
                    class="flex flex-col items-center justify-center p-6 bg-red-100 border border-solid border-red-600 text-red-700 text-center font-bold rounded-lg shadow-lg">
                    <p class="text-xl mb-2">{{ __('The Alumni Has Not Published Any Projects.') }}</p>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach ($alumni->projects as $project)
                        <div
                            class="bg-white shadow-md rounded-lg overflow-hidden transform transition duration-500 hover:scale-105 hover:shadow-xl">
                            <div class="p-5">
                                <h3 class="text-2xl font-bold text-red-600 mb-2">{{ $project->title }}</h3>
                                <p class="text-gray-700 mb-4">
                                    {{ Illuminate\Support\Str::limit($project->description, 150) }}</p>
                                <p class="text-2xl text-red-500 mt-2">Posted
                                    <span>{{ $project->created_at->diffForHumans() }}</span>
                                </p>
                                <button @click="openModal = true; currentProject = {{ json_encode($project) }}"
                                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                    View More
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- Modal -->
        @foreach ($alumni->projects as $project)
            <div x-show="openModal" class="fixed inset-0 z-50 overflow-y-auto" style="display: none;">
                <div class="min-h-screen px-4 text-center">
                    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                    </div>
                    <span class="inline-block h-screen align-middle" aria-hidden="true">&#8203;</span>
                    <div
                        class="inline-block w-full max-w-5xl p-6 my-8 overflow-hidden text-left align-middle transition-all transform bg-white shadow-xl rounded-lg">
                        <div class="flex justify-between items-center">
                            <h3 class="text-3xl font-bold text-red-600" x-text="currentProject?.title"></h3>
                            <button @click="openModal = false" class="text-gray-700 hover:text-gray-900">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                        <div class="mt-4">
                            <div class="shadow-2xl shadow-gray-700 rounded-xl p-1 mt-8 text-center">
                                <label class="block text-gray-700 text-2xl lg:text-3xl font-bold mb-2" for="video_url">
                                    <i class="fa-solid fa-video"></i> Video Presentation
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
                        </div>

                        <p class="mt-10 text-center text-gray-900">
                            <strong class="text-2xl lg:text-3xl">Problem Statement:</strong> <br>
                            <template x-for="point in currentProject?.problem_statement?.split('\n')"
                                :key="point">
                                <li class="mb-2 text-xl" x-text="point"></li>
                            </template>
                        </p>
                        <p class="mt-2 text-center text-gray-900">
                            <strong class="text-2xl lg:text-3xl">Solution Proposed:</strong> <br>
                            <template x-for="point in currentProject?.solution_proposed?.split('\n')"
                                :key="point">
                                <li class="mb-2 text-xl" x-text="point"></li>
                            </template>
                        </p>

                        <section class="mb-4">
                            <h3 class="text-2xl lg:text-3xl text-center font-bold">Project Description:</h3>
                            <ul class="list-disc list-inside text-gray-750">
                                <template x-for="point in currentProject?.description?.split('\n')"
                                    :key="point">
                                    <li class="mb-2 text-xl" x-text="point"></li>
                                </template>
                            </ul>
                        </section>

                        <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 text-wrap mt-7">
                            <p class="mt-2 text-xl text-gray-900">
                                <strong class="text-xl lg:text-3xl">Tools <i class="fa-solid fa-toolbox"></i>:</strong>
                                <br>
                                <span x-text="currentProject?.tools_used"></span>
                            </p>
                            <p class="mt-2 text-xl text-gray-900">
                                <strong class="text-xl lg:text-3xl">Programming Language:</strong> <br>
                                <span x-text="currentProject?.programming_language"></span>
                            </p>
                            <p class="mt-2 text-xl text-gray-900">
                                <strong class="text-xl lg:text-3xl">GitHub Repository:</strong> <br>
                                <a href="{{ $project->github_repository }}" target="_blank"
                                    class="text-xl lg:text-3xl"><i class="fa-brands fa-github"></i></a>
                            </p>
                            <h1>
                                @if ($project->powerpoint)
                                    <p class="mt-2 text-xl text-gray-900">
                                        <strong class="text-xl lg:text-3xl">PowerPoint
                                            Presentation:</strong>
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
                                    <p class="mt-2 text-xl lg:text-3xl text-gray-900"><strong>Database
                                            Diagram:</strong></p>
                                    <a href="{{ asset('storage/' . $project->database_diagram) }}" target="_blank"
                                        class="text-blue-500">View Database Diagram</a>
                                @endif
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
