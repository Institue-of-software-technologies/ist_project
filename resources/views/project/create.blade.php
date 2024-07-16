<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                            @if ($errors->any())
                <div class="mb-4">
                    <ul class="list-disc list-inside text-sm text-red-600">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <div class="mb-4">
                    <h1 class="text-2xl font-bold text-dark-900">Publish Your Project</h1>
                </div>
                
                <form method="POST" action="{{ route('projects.store') }}" enctype="multipart/form-data" id="projectForm">
                    @csrf

                    <div id="step-1" class="step">
                        <h2 class="text-xl font-bold text-dark-800 mb-4">Step 1: Basic Information</h2>

                        <div class="mb-4">
                            <label class="required block text-dark-700 text-sm font-bold mb-2" for="title">Title</label>
                            <input type="text" name="title" id="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-dark-700 leading-tight focus:outline-none focus:shadow-outline-dark" required>
                        </div>

                        <div class="mb-4">
                            <label class="required block text-dark-700 text-sm font-bold mb-2" for="problem_statement">Problem Statement</label>
                            <textarea name="problem_statement" id="problem_statement" class="shadow appearance-none border rounded w-full py-2 px-3 text-dark-700 leading-tight focus:outline-none focus:shadow-outline-dark" rows="3" required></textarea>
                        </div>

                        <div class="mb-4">
                            <label class="required block text-dark-700 text-sm font-bold mb-2" for="solution_proposed">Solution Proposed</label>
                            <textarea name="solution_proposed" id="solution_proposed" class="shadow appearance-none border rounded w-full py-2 px-3 text-dark-700 leading-tight focus:outline-none focus:shadow-outline-dark" rows="3" required></textarea>
                        </div>

                        <button type="button" class="next-button inline-flex items-center px-4 py-2 bg-red-800 text-white text-sm font-medium rounded-lg shadow hover:bg-dark-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-dark-800 transition ease-in-out duration-150">Next</button>
                    </div>

                    <div id="step-2" class="step hidden">
                        <h2 class="text-xl font-bold text-dark-800 mb-4">Step 2: Project Details</h2>

                        <div class="mb-4">
                            <label class="required block text-dark-700 text-sm font-bold mb-2" for="description">Project Description</label>
                            <textarea name="description" id="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-dark-700 leading-tight focus:outline-none focus:shadow-outline-dark" rows="5" required></textarea>
                        </div>

                        <div class="mb-4">
                            <label class="required block text-dark-700 text-sm font-bold mb-2" for="flowchart_diagram">Flowchart Diagram</label>
                            <input type="file" name="flowchart_diagram" id="flowchart_diagram" class="shadow appearance-none border rounded w-full py-2 px-3 text-dark-700 leading-tight focus:outline-none focus:shadow-outline-dark" required>
                        </div>

                        <div class="mb-4">
                            <label class="required block text-dark-700 text-sm font-bold mb-2" for="database_diagram">Database Diagram</label>
                            <input type="file" name="database_diagram" id="database_diagram" class="shadow appearance-none border rounded w-full py-2 px-3 text-dark-700 leading-tight focus:outline-none focus:shadow-outline-dark" required>
                        </div>

                        <button type="button" class="prev-button inline-flex items-center px-4 py-2 bg-red-800 text-white text-sm font-medium rounded-lg shadow hover:bg-dark-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-dark-800 transition ease-in-out duration-150">Previous</button>
                        <button type="button" class="next-button inline-flex items-center px-4 py-2 bg-red-800 text-white text-sm font-medium rounded-lg shadow hover:bg-dark-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-dark-800 transition ease-in-out duration-150">Next</button>
                    </div>

                    <div id="step-3" class="step hidden">
                        <h2 class="text-xl font-bold text-dark-800 mb-4">Step 3: Project Resources</h2>

                        <div class="mb-4">
                            <label class="required block text-dark-700 text-sm font-bold mb-2" for="powerpoint">PowerPoint Presentation</label>
                            <input type="file" name="powerpoint" id="powerpoint" class="shadow appearance-none border rounded w-full py-2 px-3 text-dark-700 leading-tight focus:outline-none focus:shadow-outline-dark" required>
                        </div>

                        <div class="mb-4">
                            <label class="required block text-dark-700 text-sm font-bold mb-2" for="demo_url">Demo URL</label>
                            <input type="url" name="demo_url" id="demo_url" class="shadow appearance-none border rounded w-full py-2 px-3 text-dark-700 leading-tight focus:outline-none focus:shadow-outline-dark" required>
                        </div>

                        <div class="mb-4">
                            <label class="required block text-dark-700 text-sm font-bold mb-2" for="video_url">Video URL</label>
                            <input type="url" name="video_url" id="video_url" class="shadow appearance-none border rounded w-full py-2 px-3 text-dark-700 leading-tight focus:outline-none focus:shadow-outline-dark" required>
                        </div>

                        <button type="button" class="prev-button inline-flex items-center px-4 py-2 bg-red-800 text-white text-sm font-medium rounded-lg shadow hover:bg-dark-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-dark-800 transition ease-in-out duration-150">Previous</button>
                        <button type="button" class="next-button inline-flex items-center px-4 py-2 bg-red-800 text-white text-sm font-medium rounded-lg shadow hover:bg-dark-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-dark-800 transition ease-in-out duration-150">Next</button>
                    </div>

                    <div id="step-4" class="step hidden">
                        <h2 class="text-xl font-bold text-dark-800 mb-4">Step 4: Additional Information</h2>

                        <div class="mb-4">
                            <label class="required block text-dark-700 text-sm font-bold mb-2" for="tools_used">Tools Used</label>
                            <input type="text" name="tools_used" id="tools_used" class="shadow appearance-none border rounded w-full py-2 px-3 text-dark-700 leading-tight focus:outline-none focus:shadow-outline-dark" required>
                        </div>

                        <div class="mb-4">
                            <label class="required block text-dark-700 text-sm font-bold mb-2" for="programming_language">Programming Language</label>
                            <input type="text" name="programming_language" id="programming_language" class="shadow appearance-none border rounded w-full py-2 px-3 text-dark-700 leading-tight focus:outline-none focus:shadow-outline-dark" required>
                        </div>

                        <div class="mb-4">
                            <label class="required block text-dark-700 text-sm font-bold mb-2" for="github_repository">GitHub Repository</label>
                            <input type="url" name="github_repository" id="github_repository" class="shadow appearance-none border rounded w-full py-2 px-3 text-dark-700 leading-tight focus:outline-none focus:shadow-outline-dark" required>
                        </div>

                        <div class="mb-4">
                            <label class="required block text-dark-700 text-sm font-bold mb-2">Project Visibility</label>
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" name="visibility" value="public" class="form-radio text-dark-800" required>
                                    <span class="ml-2">Public</span>
                                </label>
                                <label class="inline-flex items-center ml-6">
                                    <input type="radio" name="visibility" value="private" class="form-radio text-dark-800" required>
                                    <span class="ml-2">Private</span>
                                </label>
                            </div>
                        </div>

                        <button type="button" class="prev-button inline-flex items-center px-4 py-2 bg-red-800 text-white text-sm font-medium rounded-lg shadow hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-800 transition ease-in-out duration-150">Previous</button>
                        <button type="submit" class="inline-flex items-center px-6 py-3 bg-red-900 text-white text-sm font-medium rounded-lg shadow hover:bg-red-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-900 transition ease-in-out duration-150">Publish Project</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let currentStep = 1;
            const totalSteps = 4;

            function showStep(step) {
                document.querySelectorAll('.step').forEach((element, index) => {
                    element.classList.add('hidden');
                    if (index + 1 === step) {
                        element.classList.remove('hidden');
                    }
                });
            }

            function validateStep(step) {
                let valid = true;
                const inputs = document.querySelectorAll(`#step-${step} [required]`);
                inputs.forEach(input => {
                    if (!input.value) {
                        valid = false;
                        input.classList.add('border-red-400');
                    } else {
                        input.classList.remove('border-green-400');
                    }
                });
                return valid;
            }

            document.querySelectorAll('.next-button').forEach(button => {
                button.addEventListener('click', function () {
                    if (validateStep(currentStep)) {
                        if (currentStep < totalSteps) {
                            currentStep++;
                            showStep(currentStep);
                        }
                    }
                });
            });

            document.querySelectorAll('.prev-button').forEach(button => {
                button.addEventListener('click', function () {
                    if (currentStep > 1) {
                        currentStep--;
                        showStep(currentStep);
                    }
                });
            });

            showStep(currentStep);
        });
    </script>
</x-app-layout>
