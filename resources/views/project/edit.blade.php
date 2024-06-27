<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="mb-6">
                    <h1 class="text-3xl font-bold text-gray-900">Edit Project</h1>
                </div>

                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6" role="alert">
                        <strong class="font-bold">Whoops!</strong> Something went wrong.
                        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('projects.update', $project) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 gap-6">
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="title">Title</label>
                            <input type="text" name="title" id="title" value="{{ old('title', $project->title) }}"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                required>
                        </div>

                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="problem_statement">Problem Statement</label>
                            <textarea name="problem_statement" id="problem_statement"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                rows="5" required>{{ old('problem_statement', $project->problem_statement) }}</textarea>
                        </div>

                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="solution_proposed">Solution Proposed</label>
                            <textarea name="solution_proposed" id="solution_proposed"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                rows="5" required>{{ old('solution_proposed', $project->solution_proposed) }}</textarea>
                        </div>

                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="description">Project Description</label>
                            <textarea name="description" id="description"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                rows="5" required>{{ old('description', $project->description) }}</textarea>
                        </div>

                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="flowchart_diagram">Flowchart Diagram</label>
                            <input type="file" name="flowchart_diagram" id="flowchart_diagram"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @if ($project->flowchart_diagram)
                                <img src="{{ asset('storage/' . $project->flowchart_diagram) }}" alt="Flowchart diagram"
                                    class="mt-2 w-full h-auto">
                            @endif
                        </div>

                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="database_diagram">Database Diagram</label>
                            <input type="file" name="database_diagram" id="database_diagram"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @if ($project->database_diagram)
                                <img src="{{ asset('storage/' . $project->database_diagram) }}" alt="Database diagram"
                                    class="mt-2 w-full h-auto">
                            @endif
                        </div>

                        {{-- <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="video_url">Video URL</label>
                            <input type="file" name="video_url" id="video_url"
                                value="{{ old('video_url', $project->video_url) }}"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                required>
                            <video class="w-full h-auto mt-2" controls>
                            @if ($project->video_url)
                                <img src="{{ asset('storage/' . $project->video_url) }}" alt=""
                                    class="mt-2 w-full h-auto">
                            @endif                            
                                <source src="{{ $project->video_url }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                                             --}}
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="powerpoint">PowerPoint Presentation</label>
                            <input type="file" name="powerpoint" id="powerpoint"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @if ($project->powerpoint)
                                <a href="{{ asset('storage/' . $project->powerpoint) }}" target="_blank"
                                    class="text-blue-500">Download PowerPoint</a>
                            @endif
                        </div>

                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="demo_url">Demo URL</label>
                            <input type="url" name="demo_url" id="demo_url"
                                value="{{ old('demo_url', $project->demo_url) }}"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                required>
                        </div>

                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="tools_used">Tools Used</label>
                            <input type="text" name="tools_used" id="tools_used"
                                value="{{ old('tools_used', $project->tools_used) }}"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                required>
                        </div>

                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="programming_language">Programming Language</label>
                            <input type="text" name="programming_language" id="programming_language"
                                value="{{ old('programming_language', $project->programming_language) }}"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                required>
                        </div>

                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="github_repository">GitHub Repository</label>
                            <input type="url" name="github_repository" id="github_repository"
                                value="{{ old('github_repository', $project->github_repository) }}"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                required>
                        </div>

                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="visibility">Visibility</label>
                            <select name="visibility" id="visibility"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                required>
                                <option value="public" {{ old('visibility', $project->visibility) == 'public' ? 'selected' : '' }}>Public</option>
                                <option value="private" {{ old('visibility', $project->visibility) == 'private' ? 'selected' : '' }}>Private</option>
                            </select>
                        </div>

                        <div>
                            <button type="submit"
                                class="inline-flex items-center px-6 py-3 bg-red-500 text-white text-sm font-medium rounded-lg shadow hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-900 transition ease-in-out duration-150">
                                Update Project
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
