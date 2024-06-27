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

        <div class="gap-4">
            <div>
                <div class="bg-white mx-auto border border-lg border-gray-500 rounded-lg overflow-hidden mt-4 p-4">
                    <div class="p-4 border-b border-gray-200">
                        <h5 class="text-xl font-bold">{{ $job->title }}</h5>
                        <p class="text-sm text-gray-600">{{ $job->company_name }}</p>
                    </div>

                    <!-- Job Details -->
                    <div class="p-4">
                        <section class="mb-4">
                            <h3 class="text-3xl font-bold">Job Details</h3>
                            <ul class="list-none mb-4">
                                <li><strong>Job Type:</strong> {{ ucfirst($job->job_type) }}</li>
                                <li><strong>Location:</strong> {{ $job->location }}</li>
                                <li><strong>Salary:</strong> {{ $job->salary }}</li>
                            </ul>
                        </section>

                        <!-- Requirements -->
                        <section class="mb-4">
                            <h3 class="text-3xl font-bold">Requirements</h3>
                            <ul class="list-none mb-4">
                                <li><strong>Experience Level:</strong> {{ $job->experience_level }}</li>
                                <li><strong>Education Level:</strong> {{ $job->education_level }}</li>
                                <li><strong>Skills:</strong> {{ $job->skills }}</li>
                            </ul>
                        </section>

                        <!-- Job Description -->
                        <section class="mb-4 text-pretty">
                            <h3 class="text-3xl font-bold">Job Description</h3>
                            <ul class="list-disc list-inside text-gray-600">
                                @foreach (explode("\n", $job->description) as $point)
                                    <li class="mb-2">{{ $point }}</li>
                                @endforeach
                            </ul>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
