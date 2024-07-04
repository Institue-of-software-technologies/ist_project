<x-app-layout>
    <div class="container mx-auto my-auto lg:mt-32 mt-32 px-4">
        <div class="row">
            <div class="col-md-12 rounded-xl border border-solid border-gray-800 p-5 bg-gray-200 ">
                <h1 class="text-3xl font-bold mb-4 text-gray-900">Create Job</h1>
                <form id="jobForm" action="{{ route('jobs.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div id="step-1" class="step">
                        <div class="grid grid-cols-1 gap-4 mb-4">
                            <div>
                                <label for="title" class="required block text-gray-800 font-semibold">Title</label>
                                <input type="text" name="title" class="form-control mt-1 block w-full border border-gray-400 p-2 rounded focus:border-red-500 focus:ring-red-500" required>
                            </div>
                            <div>
                                <label class="required block text-dark-700 text-sm font-bold mb-2" for="company_logo">Company Logo</label>
                                <input type="file" name="company_logo" id="company_logo" class="shadow appearance-none border rounded w-full py-2 px-3 text-dark-700 leading-tight focus:outline-none focus:shadow-outline-dark" required>
                            </div>
                            <div>
                                <label for="description" class="required block text-gray-800 font-semibold">Description</label>
                                <textarea name="description" class="form-control mt-1 block w-full border border-gray-400 p-2 rounded focus:border-red-500 focus:ring-red-500" required></textarea>
                            </div>
                        </div>
                        <button type="button" class=" bg-black hover:bg-gray-800 text-white font-bold py-2 px-4 rounded transition duration-150 ease-in-out" onclick="nextStep()">Next</button>
                    </div>
                    
                    <div id="step-2" class="step hidden">
                        <div class="grid grid-cols-1 gap-4 mb-4">
                            <div>
                                <label for="location" class="block required text-gray-800 font-semibold">Location</label>
                                <input name="location" class="form-control mt-1 block w-full border border-gray-400 p-2 rounded focus:border-red-500 focus:ring-red-500" required>
                            </div>
                            <div>
                                <label for="salary" class="block required text-gray-800 font-semibold">Salary</label>
                                <input type="number" name="salary" class="form-control mt-1 block w-full border border-gray-400 p-2 rounded focus:border-red-500 focus:ring-red-500">
                            </div>
                            <div>
                                <label for="company_name" class="block required text-gray-800 font-semibold">Company Name</label>
                                <input type="text" name="company_name" class="form-control mt-1 block w-full border border-gray-400 p-2 rounded focus:border-red-500 focus:ring-red-500" required>
                            </div>
                        </div>
                        <button type="button" class="bg-black hover:bg-gray-800 text-white font-bold py-2 px-4 rounded transition duration-150 ease-in-out" onclick="prevStep()">Previous</button>
                        <button type="button" class="bg-black hover:bg-gray-800 text-white font-bold py-2 px-4 rounded transition duration-150 ease-in-out" onclick="nextStep()">Next</button>
                    </div>
                    
                    <div id="step-3" class="step hidden">
                        <div class="grid grid-cols-1 gap-4 mb-4">
                            <div>
                                <label for="job_type" class="block required text-gray-800 font-semibold">Job Type</label>
                                <select name="job_type" class="form-control mt-1 block w-full border border-gray-400 p-2 rounded focus:border-red-500 focus:ring-red-500" required>
                                    <option value="full-time">Full-Time</option>
                                    <option value="part-time">Part-Time</option>
                                    <option value="contract">Contract</option>
                                </select>
                            </div>
                            <div>
                                <label for="experience_level" class="block required text-gray-800 font-semibold">Experience Level</label>
                                <input type="text" name="experience_level" class="form-control mt-1 block w-full border border-gray-400 p-2 rounded focus:border-red-500 focus:ring-red-500" required>
                            </div>
                            <div>
                                <label for="education_level" class="block required text-gray-800 font-semibold">Education Level</label>
                                <input type="text" name="education_level" class="form-control mt-1 block w-full border border-gray-400 p-2 rounded focus:border-red-500 focus:ring-red-500" required>
                            </div>
                            <div>
                                <label for="skills" class="block required text-gray-800 font-semibold">Skills</label>
                                <textarea name="skills" class="form-control mt-1 block w-full border border-gray-400 p-2 rounded focus:border-red-500 focus:ring-red-500" required></textarea>
                            </div>
                        </div>
                        <button type="button" class="bg-black hover:bg-gray-800 text-white font-bold py-2 px-4 rounded transition duration-150 ease-in-out" onclick="prevStep()">Previous</button>
                        <button type="submit" class="bg-red-600 hover:bg-red-800 text-white font-bold py-2 px-4 rounded transition duration-150 ease-in-out">Create Job</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function nextStep() {
            const currentStep = document.querySelector('.step:not(.hidden)');
            const nextStep = currentStep.nextElementSibling;
            if (nextStep && validateStep(currentStep)) {
                currentStep.classList.add('hidden');
                nextStep.classList.remove('hidden');
            }
        }

        function prevStep() {
            const currentStep = document.querySelector('.step:not(.hidden)');
            const prevStep = currentStep.previousElementSibling;
            if (prevStep) {
                currentStep.classList.add('hidden');
                prevStep.classList.remove('hidden');
            }
        }

        function validateStep(step) {
            const inputs = step.querySelectorAll('input, textarea, select');
            for (let input of inputs) {
                if (!input.checkValidity()) {
                    input.reportValidity();
                    return false;
                }
            }
            return true;
        }
    </script>
</x-app-layout>
