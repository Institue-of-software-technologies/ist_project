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
                        <h2 class="text-xl font-bold text-dark-800 mb-4">Step 1: What Project are you uploading ?</h2>

                            <div class="mb-5">
                                <label class="required block text-dark-700 text-sm font-bold mb-2" for="course">Project</label>
                                <div class="relative">
                                    <select id="course" name="course" data-hs-select='{
                                        "placeholder": "Select one option...",
                                        "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
                                        "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-300 rounded-lg text-start text-sm focus:outline-none focus:ring-6 focus:ring-blue-500",
                                        "dropdownClasses": "mt-2 z-50 w-full max-h-72 p-1 space-y-0.5 bg-white border border-gray-300 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300",
                                        "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100",
                                        "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-blue-600\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>",
                                        "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                                    }' class="hidden" required>
                                        <option value="">Choose</option>
                                        <option  value="SotwareDevelopment">Software development</option>
                                        <option value="CyberSecurity">Cyber security</option>
                                    </select>
                                </div>
                            </div>
                        
                        <button id="btn-" type="button" class="next-button inline-flex items-center px-4 py-2 bg-red-800 text-white text-sm font-medium rounded-lg shadow hover:bg-dark-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-dark-800 transition ease-in-out duration-150 mb-5">Next</button>
                    </div>

                    <div id="step-2" class="step hidden">
                        <h2 class="text-xl font-bold text-dark-800 mb-4">Step 2: Basic Information</h2>

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

                        <button id="btn-" type="button" class="prev-button inline-flex items-center px-4 py-2 bg-red-800 text-white text-sm font-medium rounded-lg shadow hover:bg-dark-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-dark-800 transition ease-in-out duration-150">Previous</button>
                        <button id="btn-" type="button" class="next-button inline-flex items-center px-4 py-2 bg-red-800 text-white text-sm font-medium rounded-lg shadow hover:bg-dark-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-dark-800 transition ease-in-out duration-150">Next</button>
                    </div>

                    <div id="step-3" class="step hidden">
                        <h2 class="text-xl font-bold text-dark-800 mb-4">Step 3: Project Details</h2>

                        <div class="mb-4">
                            <label class="required block text-dark-700 text-sm font-bold mb-2" for="description">Project Description</label>
                            <textarea name="description" id="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-dark-700 leading-tight focus:outline-none focus:shadow-outline-dark" rows="5" required></textarea>
                        </div>

                    
                            <div class="mb-4" id="sofware1" style="display: none">
                                <label class="block text-dark-700 text-sm font-bold mb-2" for="flowchart_diagram">Flowchart Diagram</label>
                                <input type="file" name="flowchart_diagram" id="flowchart_diagram" class="shadow appearance-none border rounded w-full py-2 px-3 text-dark-700 leading-tight focus:outline-none focus:shadow-outline-dark">
                            </div>
                        
                            <div class="mb-4" id="sofware2" style="display: none">
                                <label class="block text-dark-700 text-sm font-bold mb-2" for="database_diagram">Database Diagram</label>
                                <input type="file" name="database_diagram" id="database_diagram" class="shadow appearance-none border rounded w-full py-2 px-3 text-dark-700 leading-tight focus:outline-none focus:shadow-outline-dark" >
                            </div>

                        <div class="mb-4" >
                            <label class="required block text-dark-700 text-sm font-bold mb-2" for="database_diagram">Project Documentation</label>
                            <input type="file" name="documentation" id="documentation" class="shadow appearance-none border rounded w-full py-2 px-3 text-dark-700 leading-tight focus:outline-none focus:shadow-outline-dark" required>
                        </div>

                        <div class="mb-4">
                            <label class="required block text-dark-700 text-sm font-bold mb-2" for="screenshots">Screenshots</label>
                            <label style="font-weight: 400" class="required block text-dark-700 text-sm mb-2" for="screenshots">you can select multiple files in this input</label>
                            <input type="file" name="screenshots[]" id="screenshots" multiple
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-dark-700 leading-tight focus:outline-none focus:shadow-outline-dark" required>
                            <div id="fileList" class="mt-2 text-sm text-gray-600"></div>
                        </div>

                        <button id="btn-" type="button" class="prev-button inline-flex items-center px-4 py-2 bg-red-800 text-white text-sm font-medium rounded-lg shadow hover:bg-dark-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-dark-800 transition ease-in-out duration-150">Previous</button>
                        <button id="btn-" type="button" class="next-button inline-flex items-center px-4 py-2 bg-red-800 text-white text-sm font-medium rounded-lg shadow hover:bg-dark-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-dark-800 transition ease-in-out duration-150">Next</button>
                    </div>

                    <div id="step-4" class="step hidden">
                        <h2 class="text-xl font-bold text-dark-800 mb-4">Step 4: Project Resources</h2>

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

                        <button id="btn-" type="button" class="prev-button inline-flex items-center px-4 py-2 bg-red-800 text-white text-sm font-medium rounded-lg shadow hover:bg-dark-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-dark-800 transition ease-in-out duration-150">Previous</button>
                        <button id="btn-" type="button" class="next-button inline-flex items-center px-4 py-2 bg-red-800 text-white text-sm font-medium rounded-lg shadow hover:bg-dark-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-dark-800 transition ease-in-out duration-150">Next</button>
                    </div>

                    <div id="step-5" class="step">
                        <h2 class="text-xl font-bold text-dark-800 mb-4">Step 5: Additional Information</h2>

                            <div class="mb-4" id="cyber" style="display:none">
                                <label class="block text-dark-700 text-sm font-bold mb-2" for="tools_used">Tools Used</label>
                                <div class="relative">
                                    <select name="tools_used[]" multiple data-hs-select='{
                                        "placeholder": "Select multiple options...",
                                        "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
                                        "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-300 rounded-lg text-start text-sm focus:outline-none focus:ring-6 focus:ring-blue-500",
                                        "dropdownClasses": "mt-2 z-50 w-full max-h-72 p-1 space-y-0.5 bg-white border border-gray-300 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300",
                                        "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100",
                                        "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-blue-600\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>",
                                        "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                                    }' class="hidden">
                                        <option value="">Choose</option>
                                        @foreach ($tools as $tool)
                                            <option value="{{ $tool->id }}">{{ $tool->tool_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        <div class="mb-4">
                            <label class="block text-dark-700 text-sm font-bold mb-2" for="programming_language">Programming Language</label>
                            <select name="skills_used[]" multiple="" data-hs-select='{
                                "placeholder": "Select multiple options...",
                                "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
                                "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-300 rounded-lg text-start text-sm focus:outline-none focus:ring-6 focus:ring-blue-500",
                                "dropdownClasses": "mt-2 z-50 w-full max-h-72 p-1 space-y-0.5 bg-white border border-gray-300 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300",
                                "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100",
                                "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-blue-600\" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>",
                                "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                              }' class="hidden">

                                    <option value="">Choose</option>
                                    @foreach ($skills as $skill )
                                        <option value="{{$skill->id}}">{{$skill->name}}</option>
                                    @endforeach
                              </select>    
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

                        <button id="btn-" type="button" class="prev-button inline-flex items-center px-4 py-2 bg-red-800 text-white text-sm font-medium rounded-lg shadow hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-800 transition ease-in-out duration-150">Previous</button>
                        <button type="submit" class="inline-flex items-center px-6 py-3 bg-red-900 text-white text-sm font-medium rounded-lg shadow hover:bg-red-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-900 transition ease-in-out duration-150">Publish Project</button>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let currentStep = 1;
            const totalSteps = 5;
            let selectedFiles = [];

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

            document.getElementById('screenshots').addEventListener('change', function(event) {
                const inputFiles = Array.from(event.target.files);
                selectedFiles = [...selectedFiles, ...inputFiles];
                displaySelectedFiles();
            });

            document.getElementById("course").addEventListener("change", function() {
                const initValue = localStorage.getItem('course');
                if(initValue){
                    localStorage.clear();
                }
                localStorage.setItem('course', this.value);
            });

            function displaySelectedFiles() {
                const fileList = document.getElementById('fileList');
                fileList.innerHTML = '';

                if (selectedFiles.length > 0) {
                    const ul = document.createElement('ul');
                    selectedFiles.forEach((file, index) => {
                        const li = document.createElement('li');
                        li.textContent = `${index + 1}. ${file.name}`;
                        ul.appendChild(li);
                    });
                    fileList.appendChild(ul);
                }
            }

            document.getElementById("btn-").addEventListener("click",function(){
               const course = localStorage.getItem('course');
               console.log(course);
               if(course == "SotwareDevelopment"){
                    let software1 = document.getElementById('sofware1');
                    software1.style.display="block"
                    let software2 = document.getElementById('sofware2');
                    software2.style.display="block"
               }
               else if(course == "CyberSecurity"){
                    let software = document.getElementById('cyber');
                    software.style.display="block"
               }
               else{
                let software1 = document.getElementById('sofware1');
                    software1.style.display="none"
                    let software2 = document.getElementById('sofware2');
                    software2.style.display="none"
                    let software = document.getElementById('cyber');
                    software.style.display="none"
               }
            })
            
        });
    </script>
</x-app-layout>
