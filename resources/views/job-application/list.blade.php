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

                    <ul class="mt-4 space-y-4">
                        @foreach ($alumnis as $alumni)
                            <div class="transition duration-1000 ease-out transform hover:-translate-y-2">
                                <a href="{{ route('job-application.applist', ['id' => $alumni->id])  }}"
                                    class="text-2xl text-red-600">{{ $alumni->name }}</a>
                            </div>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
