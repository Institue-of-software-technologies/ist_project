<x-app-layout>
    <div class="container mx-auto mt-2 px-4">

        @if ($applications->isEmpty())
            <div
                class="flex flex-col items-center ml-20 justify-center p-6 bg-red-100 border border-solid border-red-600 text-red-700 text-center font-bold rounded-lg shadow-lg">
                <p class="text-xl mb-2">{{ __('You Have Not Applied For Any Jobs.') }}</p>
                <a href="{{ url('alumni/jobs') }}"
                    class="bg-blue-500 text-white px-4 py-2 rounded mt-4 hover:bg-blue-600 transition duration-300">Find
                    Jobs</a>
            </div>
        @else
            <h1 class="text-3xl text-center font-bold">Job Applications</h1>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach ($applications as $application)
                    <div
                        class="bg-white border border-lg border-gray-300 hover:border-gray-500 rounded-lg overflow-hidden mt-4 p-4 transition duration-1000 ease-out transform hover:-translate-y-2">
                        <h5 class="text-3xl font-bold text-center">{{ $application->job->title }}</h5>
                        <p class="text-2xl text-gray-600 text-center">Company: {{ $application->job->company_name }}
                            <img src="{{ asset('storage/' . $application->job->company_logo) }}" alt="Company Logo"
                                class="w-32 h-28 md:w-32 md:h-28 lg:w-52 lg:h-36 rounded-xl mx-auto">
                        </p>
                        <p class="text-xl text-gray-600 text-center">Name: {{ $application->user->name }}</p>

                        {{-- Display the application status --}}
                        <p class="text-lg text-gray-800 text-center font-semibold mt-2">
                            Status:
                            <span
                                class="
        @if ($application->reviewed == 1) text-green-600
        @else 
            text-yellow-600 @endif">
                                {{ $application->reviewed == 1 ? 'Reviewed!!Check your email for the feedback' : 'Pending Review' }}
                            </span>
                        </p>


                        <div class="mt-3">
                            <a href="{{ route('job-application.show', $application->id) }}"
                                class="bg-blue-600 text-white text-center rounded-xl p-2">View Application</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>
