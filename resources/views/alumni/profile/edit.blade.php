<x-app-layout>
    <div class="bg-gray-100 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl w-full bg-white shadow-md rounded-lg overflow-hidden">
            <div class="profile-header bg-blue-600 py-6 text-center text-white">
                <h1 class="text-3xl font-semibold mb-2">{{ __('Edit Profile') }}</h1>
            </div>
            <div class="profile-body p-6">
                <!-- Step Indicator -->
                <div class="mb-6">
                    <div class="flex justify-between">
                        <div id="stepIndicator1" class="step-indicator">Step 1</div>
                        <div id="stepIndicator2" class="step-indicator">Step 2</div>
                        <div id="stepIndicator3" class="step-indicator">Step 3</div>
                        <div id="stepIndicator4" class="step-indicator">Step 4</div>
                    </div>
                </div>

                <form method="POST" action="{{ route('alumni.profile.update', $profile->id) }}" enctype="multipart/form-data" id="multiStepForm">
                    @csrf
                    @method('PUT')

                    <!-- Step 1 -->
                    <div class="step" id="step1">
                        <div class="grid grid-cols-1 gap-6">
                            <div>
                                <label for="full_name" class="block text-sm font-medium text-gray-700">{{ __('Full Name') }}</label>
                                <input type="text" name="full_name" id="full_name" value="{{ old('full_name', $profile->full_name) }}" required class="mt-1 block w-full">
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">{{ __('Email') }}</label>
                                <input type="email" name="email" id="email" value="{{ old('email', $profile->email) }}" class="mt-1 block w-full">
                            </div>
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700">{{ __('Phone') }}</label>
                                <input type="text" name="phone" id="phone" value="{{ old('phone', $profile->phone) }}" class="mt-1 block w-full">
                            </div>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="step hidden" id="step2">
                        <div class="grid grid-cols-1 gap-6">
                            <div>
                                <label for="degree" class="block text-sm font-medium text-gray-700">{{ __('Degree') }}</label>
                                <input type="text" name="degree" id="degree" value="{{ old('degree', $profile->degree) }}" class="mt-1 block w-full">
                            </div>
                            <div>
                                <label for="graduation_year" class="block text-sm font-medium text-gray-700">{{ __('Graduation Year') }}</label>
                                <input type="number" name="graduation_year" id="graduation_year" value="{{ old('graduation_year', $profile->graduation_year) }}" required class="mt-1 block w-full">
                            </div>
                            <div>
                                <label for="extra_course" class="block text-sm font-medium text-gray-700">{{ __('Extra Course') }}</label>
                                <input type="text" name="extra_course" id="extra_course" value="{{ old('extra_course', $profile->extra_course) }}" class="mt-1 block w-full">
                            </div>
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="step hidden" id="step3">
                        <div class="grid grid-cols-1 gap-6">
                            <div>
                                <label for="current_job_title" class="block text-sm font-medium text-gray-700">{{ __('Current Job Title') }}</label>
                                <input type="text" name="current_job_title" id="current_job_title" value="{{ old('current_job_title', $profile->current_job_title) }}" class="mt-1 block w-full">
                            </div>
                            <div>
                                <label for="current_employer" class="block text-sm font-medium text-gray-700">{{ __('Current Employer') }}</label>
                                <input type="text" name="current_employer" id="current_employer" value="{{ old('current_employer', $profile->current_employer) }}" class="mt-1 block w-full">
                            </div>
                            <div>
                                <label for="skills" class="block text-sm font-medium text-gray-700">{{ __('Skills') }}</label>
                                <input type="text" name="skills" id="skills" value="{{ old('skills', $profile->skills) }}" class="mt-1 block w-full">
                            </div>
                        </div>
                    </div>

                    <!-- Step 4 -->
                    <div class="step hidden" id="step4">
                        <div class="grid grid-cols-1 gap-6">
                            <div>
                                <label for="location" class="block text-sm font-medium text-gray-700">{{ __('Location') }}</label>
                                <input type="text" name="location" id="location" value="{{ old('location', $profile->location) }}" class="mt-1 block w-full">
                            </div>
                            <div>
                                <label for="linkedin_profile" class="block text-sm font-medium text-gray-700">{{ __('LinkedIn Profile') }}</label>
                                <input type="url" name="linkedin_profile" id="linkedin_profile" value="{{ old('linkedin_profile', $profile->linkedin_profile) }}" class="mt-1 block w-full">
                            </div>
                            <div>
                                <label for="social_media_links" class="block text-sm font-medium text-gray-700">{{ __('Instagram Link') }}</label>
                                <input type="text" name="social_media_links" id="social_media_links" value="{{ old('social_media_links', $profile->social_media_links) }}" class="mt-1 block w-full">
                            </div>
                            <div>
                                <label for="profile_photo" class="block text-sm font-medium text-gray-700">{{ __('Profile Photo') }}</label>
                                <input type="file" name="profile_photo" id="profile_photo" class="mt-1 block w-full">
                                @if ($profile->profile_photo)
                                    <img src="{{ asset('storage/' . $profile->profile_photo) }}" alt="{{ $profile->full_name }}" class="w-32 h-32 mx-auto rounded-full shadow-md mt-2">
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-between mt-4">
                        <button type="button" class="bg-gray-500 text-white py-2 px-4 rounded-md shadow-sm hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2" id="prevBtn" onclick="prevStep()" style="display: none;">
                            {{ __('Previous') }}
                        </button>
                        <button type="button" class="bg-red-600 text-white py-2 px-4 rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2" id="nextBtn" onclick="nextStep()">
                            {{ __('Next') }}
                        </button>
                        <button type="submit" class="w-64 bg-red-600 text-white py-2 px-4 rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 hidden" id="submitBtn">
                            {{ __('Update Profile') }}
                        </button>
                    </div>
                </form>
            </div>
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
            background-color: #f51212; /* Indigo-600 */
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
