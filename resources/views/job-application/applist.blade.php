<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black leading-tight">
            {{ __('Alumni Projects') }}
            <a class="bg-red-500 hover:bg-red-700 text-white font-bold my-auto px-4 rounded float-right"
                href="{{ route('job-application.list') }}">Back</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-300 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 border-b border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900">{{ $user->name }}'s Applications</h3>
                    <p class="mt-2 text-lg text-gray-800">List of applications made by {{ $user->name }}:</p>

                    @if ($applications->isEmpty())
                        <div
                            class="flex items-center ml-20 justify-center p-6 bg-red-100 border border-solid border-red-600 text-red-700 text-center font-bold rounded-lg shadow-lg">
                            <p class="text-xl">{{ __('The User Has Not Made Any Applications.') }}</p>
                        </div>
                    @endif
                    <ul class="mt-4 space-y-4">
                        @foreach ($applications as $application)
                            <li>
                                <a href="{{ route('job-application.application', ['applicationId' => $application->id]) }}"
                                    class="text-red-600 text-2xl hover:text-red-500">{{ $application->job->title }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
