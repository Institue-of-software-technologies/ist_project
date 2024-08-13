<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Alumni List') }}
            <a class="bg-red-500 hover:bg-red-700 text-white font-bold my-auto px-4 rounded float-right"
                href="{{ route('dashboard') }}">Back</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-gray-300 border-b border-gray-200">
                    <h3 class="text-3xl font-semibold text-gray-800">Alumni List</h3>
                    <p class="mt-2 text-lg text-gray-900">Click on an alumni to view their Applications:</p>

                    <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                        @foreach ($alumnis as $alumni)
                            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-transform transform hover:-translate-y-2 hover:scale-105 duration-300 ease-out relative">
                                <div class="flex flex-col items-center">
                                    <h4 class="text-2xl text-gray-800 font-semibold">{{ $alumni->name }}</h4>
                                    
                                    <div class="mt-2">
                                        <span class="bg-red-500 text-white rounded-full px-2 py-1 text-xl font-bold shadow">
                                            {{ $alumni->applications_count }}
                                        </span>
                                        <p class="text-lg text-gray-600 mt-2">Applications</p>
                                    </div>
                                    
                                    <a href="{{ route('job-application.applist', ['id' => $alumni->id]) }}"
                                        class="mt-4 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded transition-colors duration-300 ease-in-out">
                                        View Applications
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
