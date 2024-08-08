<!-- resources/views/applications/index.blade.php -->

<x-app-layout>
    <div class="container mx-auto mt-2 px-4">
        @if (session('status'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="text-center">
            <h3 class="text-xl font-semibold text-gray-900">{{ $user->name }}'s Applications</h3>
            <p class="mt-2 text-lg text-gray-800">List of applications made by {{ $user->name }}:</p>
        </div>
        @if ($applications->isEmpty())
            <div
                class="flex items-center ml-20 justify-center p-6 bg-red-100 border border-solid border-red-600 text-red-700 text-center font-bold rounded-lg shadow-lg">
                <p class="text-xl">{{ __('User Has Not Applied For Any Jobs.') }}</p>
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 ">
            @foreach ($applications as $application)
                <div
                    class="bg-white border border-lg border-gray-300 hover:border-gray-500 rounded-lg overflow-hidden mt-4 p-4 transition duration-1000 ease-out transform hover:-translate-y-2">
                    <h5 class="text-3xl font-bold text-center">{{ $application->job->title }}</h5>
                    <p class="text-2xl text-gray-600 text-center">Company: {{ $application->job->company_name }}
                        <img src="{{ asset('storage/' . $application->job->company_logo) }}" alt="Company Logo"
                            class="w-32 h-28 md:w-32 md:h-28 lg:w-52 lg:h-36 rounded-xl mx-auto">
                    </p>
                    <p class="text-xl text-gray-600 text-center">Name: {{ $application->user->name }}</p>
                    <p class="text-lg text-gray-600 text-center">Experience: {{ $application->experience }} years</p>

                    @if ($application->reviewed)
                        <p class="text-green-600 font-bold text-center">Reviewed</p>
                    @else
                        <form
                            action="{{ route('job-application.mark-as-reviewed', ['applicationId' => $application->id]) }}"
                            method="POST">
                            @csrf
                            <button type="submit" class="bg-yellow-500 text-white text-center rounded-xl p-2 mt-3">Mark
                                as Reviewed</button>
                        </form>
                    @endif

                    <div class="mt-3">
                        <a href="{{ route('job-application.application', ['applicationId' => $application->id]) }}"
                            class="bg-blue-600 text-white text-center rounded-xl p-2">View Application</a>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</x-app-layout>
