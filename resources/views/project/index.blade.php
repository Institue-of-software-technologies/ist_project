<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-200 overflow-hidden shadow-xl sm:rounded-lg p-6">
                @if (session('status'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                        role="alert">
                        <span class="block sm:inline">{{ session('status') }}</span>
                    </div>
                @endif

                @if ($projects->isEmpty())
                    <div
                        class="flex flex-col items-center justify-center p-6 bg-red-100 border border-solid border-red-600 text-red-700 text-center font-bold rounded-lg shadow-lg">
                        <p class="text-xl mb-2">{{ __('You Have Not Posted Any Projects.') }}</p>
                        <h1 class="text-2xl mb-4">Would you like to publish any?</h1>
                        <a href="{{ route('projects.create') }}"
                            class="bg-blue-500 text-white px-4 py-2 rounded mt-4">Create New Project</a>
                    </div>
                @else
                    <div x-data="{ openModal: false, currentProject: null }" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach ($projects as $project)
                            <div class="bg-gray-200 shadow-md rounded-lg p-5 border border-gray-800 mt-5">
                                <h3 class="text-3xl lg:text-4xl font-extrabold text-center text-red-600">
                                    {{ $project->title }}</h3>
                                <p class="text-center font-bold text-gray-900">
                                    {{ Illuminate\Support\Str::limit($project->description, 300) }}</p>
                                <button @click="openModal = true; currentProject = {{ json_encode($project) }}"
                                    class="bg-blue-500 text-white px-4 py-2 rounded">
                                    View More
                                </button>
                            </div>
                        @endforeach

                        <!-- Modal -->
                        <div x-show="openModal" class="fixed inset-0 z-50 overflow-y-auto" style="display: none;">
                            <div class="min-h-screen px-4 text-center">
                                <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                                </div>

                                <span class="inline-block h-screen align-middle" aria-hidden="true">&#8203;</span>

                                <div
                                    class="inline-block w-full max-w-5xl p-6 my-8 overflow-hidden text-left align-middle transition-all transform bg-white shadow-xl rounded-lg">
                                    <div class="flex justify-between items-center">
                                        <h3 class="text-3xl lg:text-4xl font-extrabold text-center text-red-600"
                                            x-text="currentProject?.title"></h3>
                                        <button @click="openModal = false" class="text-gray-700 hover:text-gray-900">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                    <div class="mt-4">
                                        <div class="shadow-2xl shadow-gray-700 rounded-xl p-1 mt-8 text-center">
                                            <label class="block text-gray-700 text-2xl lg:text-3xl font-bold mb-2"
                                                for="video_url">
                                                <i class="fa-solid fa-video"></i> Video Presentation
                                            </label>
                                            @if (isset($project) && $project->video_url)
                                                @php
                                                    $youtubePattern =
                                                        '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^&?\/]+)/';
                                                    $isYouTube = preg_match(
                                                        $youtubePattern,
                                                        $project->video_url,
                                                        $match,
                                                    );
                                                @endphp

                                                @if ($isYouTube && isset($match[1]))
                                                    @php
                                                        $videoId = $match[1];
                                                    @endphp
                                                    <iframe class="w-full h-96 mt-2 rounded-xl"
                                                        src="https://www.youtube.com/embed/{{ $videoId }}"
                                                        frameborder="0"
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
                                            <strong class="text-xl lg:text-3xl">Tools <i
                                                    class="fa-solid fa-toolbox"></i>:</strong> <br>
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
                                                <a href="{{ asset('storage/' . $project->flowchart_diagram) }}"
                                                    target="_blank" class="text-blue-500">View Flowchart Diagram</a>
                                            @endif
                                        </h1>
                                        <h1>
                                            @if ($project->database_diagram)
                                                <p class="mt-2 text-xl lg:text-3xl text-gray-900"><strong>Database
                                                        Diagram:</strong></p>
                                                <a href="{{ asset('storage/' . $project->database_diagram) }}"
                                                    target="_blank" class="text-blue-500">View Database Diagram</a>
                                            @endif
                                        </h1>
                                    </div>

                                    <p class="text-2xl text-red-500 mt-2">Posted <span
                                            x-text="currentProject?.created_at"></span></p>
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
                @endif
            </div>
        </div>
    </div>
    </div>
    {{-- <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.0/dist/alpine.min.js" defer></script> --}}
</x-app-layout>
