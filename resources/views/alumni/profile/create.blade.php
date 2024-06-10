<x-app-layout>
    <div class="">
        <div class="max-w-4xl mx-auto py-8 px-4 sm:px-6 lg:px-8 shadow-lg bg-white mt-20">

            @if (session('status'))
                <div class="alert alert-success bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <h2 class="text-2xl font-bold mb-6 text-center">{{ __('Create Profile') }}</h2>

            @if ($errors->any())
                <div class="mb-4">
                    <ul class="list-disc list-inside text-sm text-red-600">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Step Indicator -->
            <div class="mb-6">
                <div class="flex justify-between">
                    <div id="stepIndicator1" class="step-indicator">Step 1</div>
                    <div id="stepIndicator2" class="step-indicator">Step 2</div>
                    <div id="stepIndicator3" class="step-indicator">Step 3</div>
                    <div id="stepIndicator4" class="step-indicator">Step 4</div>
                </div>
            </div>

            <form method="POST" action="{{ route('alumni.profile.store') }}" enctype="multipart/form-data" id="multiStepForm">
                @csrf

                <div class="step" id="step1">
                    <h3 class="text-xl font-bold mb-4">{{ __('Personal Info') }}</h3>
                    <div class="mb-4">
                        <label for="full_name" class="required block text-sm font-medium text-gray-700">{{ __('Full Name') }}</label>
                        <input id="full_name" type="text" placeholder="Enter Your Full Name" name="full_name" value="{{ old('full_name') }}" required autocomplete="full_name" autofocus
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('full_name') border-red-500 @enderror">
                        @error('full_name')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="email" class="required block text-sm font-medium text-gray-700">{{ __('Email Address') }}</label>
                        <input id="email" type="email" placeholder="Enter Your Email" name="email" value="{{ old('email') }}" required autocomplete="email"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('email') border-red-500 @enderror">
                        @error('email')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="profile_photo" class="required block text-sm font-medium text-gray-700">{{ __('Profile Image') }}</label>
                        <input id="profile_photo" type="file" name="profile_photo"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('profile_photo') border-red-500 @enderror">
                        @error('profile_photo')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>                                    </div>

                    {{-- Education --}}
                <div class="step hidden" id="step2">
                    <h3 class="text-xl font-bold mb-4">{{ __('Education') }}</h3>
                    <div class="mb-4">
                        <label for="degree" class="required block text-sm font-medium text-gray-700">{{ __('Degree') }}</label>
                        <input id="degree" type="text" placeholder="Enter Your Degree" name="degree" value="{{ old('degree') }}" required autocomplete="degree"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('degree') border-red-500 @enderror">
                        @error('degree')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="graduation_year" class="required block text-sm font-medium text-gray-700">{{ __('Graduation Year') }}</label>
                        <input id="graduation_year" type="text" placeholder="Enter Your Graduation Year" name="graduation_year" value="{{ old('graduation_year') }}" required autocomplete="graduation_year"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('graduation_year') border-red-500 @enderror">
                        @error('graduation_year')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="extra_course" class="optional block text-sm font-medium text-gray-700">{{ __('Extra Course') }}</label>
                        <input id="extra_course" type="text" placeholder="Enter Your Extra Course" name="extra_course" value="{{ old('extra_course') }}" required autocomplete="extra_course"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('extra_course') border-red-500 @enderror">
                        @error('extra_course')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                {{-- Job Specifications --}}
                <div class="step hidden" id="step3">
                    <h3 class="text-xl font-bold mb-4">{{ __('Job Specifications') }}</h3>
                    <div class="mb-4">
                        <label for="current_job_title" class="required block text-sm font-medium text-gray-700">{{ __('Current Job Title') }}</label>
                        <input id="current_job_title" type="text" placeholder="Enter Your Current Job Title" name="current_job_title" value="{{ old('current_job_title') }}" required autocomplete="current_job_title"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('current_job_title') border-red-500 @enderror">
                        @error('current_job_title')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="current_employer" class="required block text-sm font-medium text-gray-700">{{ __('Current Employer') }}</label>
                        <input id="current_employer" type="text" placeholder="Enter Your Current Employer" name="current_employer" value="{{ old('current_employer') }}" required autocomplete="current_employer"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('current_employer') border-red-500 @enderror">
                        @error('current_employer')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="skills" class="required block text-sm font-medium text-gray-700">{{ __('Skills') }}</label>
                        <input id="skills" type="text" placeholder="Enter Your Skills" name="skills" value="{{ old('skills') }}" required autocomplete="skills"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('skills') border-red-500 @enderror">
                        @error('skills')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

                {{-- Social Media accounts --}}
                <div class="step hidden" id="step4">
                    <h3 class="text-xl font-bold mb-4">{{ __('Social Media') }}</h3>
                    <div class="mb-4">
                        <label for="linkedin_profile" class="required block text-sm font-medium text-gray-700">{{ __('LinkedIn Profile') }}</label>
                        <input id="linkedin_profile" type="text" placeholder="Enter Your LinkedIn Profile" name="linkedin_profile" value="{{ old('linkedin_profile') }}" required autocomplete="linkedin_profile"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('linkedin_profile') border-red-500 @enderror">
                        @error('linkedin_profile')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="phone" class="required block text-sm font-medium text-gray-700">{{ __('Phone Number') }}</label>
                        <input id="phone" type="text" placeholder="Enter Your Phone Number" name="phone" value="{{ old('phone') }}" required autocomplete="phone"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('phone') border-red-500 @enderror">
                        @error('phone')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="social_media_links" class="block text-sm font-medium text-gray-700">{{ __('Instagram') }}</label>
                        <input id="social_media_links" type="text" placeholder="Enter Your Social Media @" name="social_media_links" value="{{ old('social_media_links') }}" required autocomplete="social_media_links"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('social_media_links') border-red-500 @enderror">
                        @error('social_media_links')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

                <div class="flex items-center justify-between mt-4">
                    <button type="button" class="bg-gray-500 text-white py-2 px-4 rounded-md shadow-sm hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2" id="prevBtn" onclick="prevStep()" style="display: none;">
                        {{ __('Previous') }}
                    </button>
                    <button type="button" class="bg-indigo-600 text-white py-2 px-4 rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2" id="nextBtn" onclick="nextStep()">
                        {{ __('Next') }}
                    </button>
                    <button type="submit" class="w-64 bg-indigo-600 text-white py-2 px-4 rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 hidden" id="submitBtn">
                        {{ __('Create Profile') }}
                    </button>
                </div>
            </form>
        </div>
    </div> 

    <style>
        .step-indicator {
            width: 24%;
            padding: 8px;
            text-align: center;
            font-weight: bold;
            color: white;
            background-color: gray;
            border-radius: 4px;
        }
        .step-indicator.active {
            background-color: #4f46e5; /* Indigo-600 */
        }
    </style>

    <script>
        let currentStep = 1;
        const totalSteps = 4;

        function showStep(step) {
            for (let i = 1; i <= totalSteps; i++) {
                document.getElementById(`step${i}`).classList.add('hidden');
                document.getElementById(`stepIndicator${i}`).classList.remove('active');
            }
            document.getElementById(`step${step}`).classList.remove('hidden');
            document.getElementById(`stepIndicator${step}`).classList.add('active');
            document.getElementById('prevBtn').style.display = step > 1 ? 'inline-block' : 'none';
            document.getElementById('nextBtn').style.display = step < totalSteps ? 'inline-block' : 'none';
            document.getElementById('submitBtn').style.display = step === totalSteps ? 'inline-block' : 'none';
        }

        function nextStep() {
            if (validateStep(currentStep)) {
                currentStep++;
                showStep(currentStep);
            }
        }

        function prevStep() {
            currentStep--;
            showStep(currentStep);
        }

        function validateStep(step) {
            // Add your validation logic for each step here if needed.
            return true;
        }

        document.addEventListener('DOMContentLoaded', () => {
            showStep(currentStep);
        });
    </script>
</x-app-layout>
