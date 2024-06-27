<x-app-layout>
    <div class="container mx-auto mt-2 px-4">
        @if (session('status'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <!-- Job Details Section -->
        <div class="mt-3 p-5 flex justify-between items-center shadow-lg shadow-gray-300">
            <h4 class="text-lg font-semibold">Job Details</h4>
        </div>

        <div class=" grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <div
                    class="bg-white border border-lg border-gray-300 hover:border-gray-500 rounded-lg overflow-hidden mt-4 p-4">
                    <div class="p-4 border-b border-gray-200">
                        <h5 class="text-xl font-bold">{{ $job->title }}</h5>
                        <p class="text-sm text-gray-600">{{ $job->company_name }}</p>
                        <hr>
                        <hr>
                        <span
                            class="md:inline-flex hidden items-center px-3 py-0.5 mt-3 rounded-full text-xs md:text-sm font-normal bg-red-100 text-red-500 capitalize mr-2">
                            New
                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="hidden ml-2 md:inline-flex">
                                <path
                                    d="M7 1.75V2.33333M7 11.6667V12.25M12.25 7H11.6667M2.33333 7H1.75M10.7123 10.7123L10.2998 10.2998M3.70017 3.70017L3.28769 3.28769M10.7123 3.28772L10.2999 3.7002M3.7002 10.2999L3.28772 10.7123M9.33333 7C9.33333 8.28866 8.28866 9.33333 7 9.33333C5.71134 9.33333 4.66667 8.28866 4.66667 7C4.66667 5.71134 5.71134 4.66667 7 4.66667C8.28866 4.66667 9.33333 5.71134 9.33333 7Z"
                                    stroke="#389660" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </span>
                        <span class="">{{ $job->created_at->diffForHumans() }}</span>
                    </div>

                    <!-- Job Details -->
                    <div class="p-4">
                        <hr>
                        <hr>
                        <hr>
                        <section class="mb-4">
                            <h3 class="text-3xl font-bold">Job Details</h3>
                            <ul class="list-none text-xl mb-4">
                                <li><strong>Job Type:</strong> {{ ucfirst($job->job_type) }}</li>
                                <li><strong>Location:</strong> {{ $job->location }}</li>
                                <li><strong>Salary:</strong> {{ $job->salary }}</li>
                            </ul>
                        </section>

                        <!-- Requirements -->
                        <section class="mb-4">
                            <hr>
                            <hr>
                            <hr>
                            <hr>
                            <h3 class="text-3xl font-bold">Requirements</h3>
                            <ul class="list-none text-xl mb-4">
                                <li><strong>Experience Level:</strong> {{ $job->experience_level }}</li>
                                <li><strong>Education Level:</strong> {{ $job->education_level }}</li>
                                <li><strong>Skills:</strong> {{ $job->skills }}</li>
                            </ul>
                        </section>

                        <!-- Job Description -->
                        <section class="mb-4 text-pretty">
                            <hr>
                            <hr>
                            <hr>
                            <hr>
                            <h3 class="text-3xl font-bold">Job Description</h3>
                            <ul class="list-disc list-inside text-xl text-gray-600">
                                @foreach (explode("\n", $job->description) as $point)
                                    <li class="mb-2">{{ $point }}</li>
                                @endforeach
                            </ul>
                        </section>
                    </div>
                </div>
            </div>

            <!-- Job Application Form -->
            @can('apply job')
                <div>
                    <div
                        class="bg-white border border-lg border-gray-300 hover:border-gray-500 shadow-md rounded-lg overflow-hidden mt-4 p-4">
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf

                            <h4 class="text-lg font-semibold mb-4">Apply Here</h4>

                            <div class="mb-4">
                                <label for="experience" class="block text-xl font-medium text-gray-700">Years of
                                    Experience</label>
                                <select id="experience" name="experience"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                    @for ($i = 1; $i <= 20; $i++)
                                        <option value="{{ $i }}">{{ $i }}
                                            year{{ $i > 1 ? 's' : '' }}</option>
                                    @endfor
                                    <option value="more_than_20">More than 20 years</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="salary" class="block text-xl font-medium text-gray-700">Monthly Salary
                                    Expectation (Gross)</label>
                                <input type="number" id="salary" name="salary"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                            <div class="mb-4">
                                <label for="cover_letter" class="block text-xl font-medium text-gray-700">Cover
                                    Letter</label>
                                <textarea id="cover_letter" name="cover_letter" rows="4"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"></textarea>
                            </div>

                            <div class="mb-4">
                                <label for="cv" class="block text-xl font-medium text-gray-700">Attach CV</label>
                                <input type="file" id="cv" name="cv"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                            <div class="mb-4">
                                <label for="gender" class="block text-xl font-medium text-gray-700">Gender</label>
                                <select id="gender" name="gender"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                    <option value="prefer_not_to_say">Prefer not to say</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="linkedin" class="block text-xl font-medium text-gray-700">LinkedIn
                                    Profile</label>
                                <input type="url" id="linkedin" name="linkedin"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                            <div class="mb-4">
                                <label for="education" class="block text-xl font-medium text-gray-700">Education</label>
                                <input type="text" id="education" name="education"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                            <div class="mb-4">
                                <label for="address" class="block text-xl font-medium text-gray-700">Address</label>
                                <input type="text" id="address" name="address"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                            <div class="mb-4">
                                <label for="phone" class="block text-xl font-medium text-gray-700">Phone Number</label>
                                <input type="text" id="phone" name="phone"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                            <div class="flex justify-end">
                                <button type="submit"
                                    class="bg-red-600 text-white px-4 py-2 rounded-md shadow-sm">Submit
                                    Application</button>
                            </div>
                        </form>
                    </div>
                </div>
            @endcan
        </div>
    </div>
    </div>
</x-app-layout>
