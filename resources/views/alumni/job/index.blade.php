<x-app-layout>
    <style>
        .transition {
            transition: background-color 0.3s ease-in-out, transform 0.3s ease-in-out;
        }
    </style>
    <div class="container mx-auto mt-2 px-4">
        <div class="row">
            <div class="col-md-12">
                @if (session('status'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                        role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="mt-3 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 justify-between items-center">
                    <div>
                    <h4 class="text-lg font-semibold">
                        Jobs
                    </h4>
                    </div>
                    <div>
                    <form action="{{ route('jobs.search') }}" method="GET" class="mt-4">
                        <input type="text" name="find"
                            class="py-2 px-4 text-gray-900 font-semibold border rounded-lg w-1/2"
                            placeholder="Search by name">
                        <button type="submit"
                            class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg">Search</button>
                    </form>
                    </div>
                    @can('create job')
                        <a href="{{ url('jobs/create') }}"
                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                            <i class="fas fa-add"></i> Add Jobs
                        </a>
                    @endcan
                </div>
                @if ($jobs->isEmpty())
                    <div
                        class="flex p-6 bg-red-100 border border-solid border-red-600 text-red-700 text-center font-bold rounded-lg shadow-lg">
                        <p class="text-xl">{{ __('No Jobs found.') }}</p>
                    </div>
                @else
                    <div class="mt-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach ($jobs as $job)
                            <div
                                class="bg-white shadow-lg rounded-lg overflow-hidden transition transform hover:bg-gray-100 hover:-translate-y-3">
                                <a href="{{ url('alumni/jobs/' . $job->id) }}" class="flex items-center p-4">
                                    <!-- Job Details -->
                                    <div class="flex-grow">
                                        <h1 class="float-right">{{ $job->job_type }}</h1>
                                        @if ($job->company_logo)
                                            <div class="flex justify-center mt-8">
                                                <div class="rounded-xl p-1">
                                                    <img src="{{ asset('storage/' . $job->company_logo) }}"
                                                        alt="Company Logo"
                                                        class="w-32 h-32 lg:w-44 lg:h-36 rounded-xl mx-auto">
                                                </div>
                                            </div>
                                        @endif
                                        <h5 class="text-2xl text-center font-extrabold text-gray-900">
                                            {{ $job->title }}
                                        </h5>
                                        <hr>
                                        <hr>
                                        <hr>
                                        <h1 class="text-2xl text-center text-red-500">{{ $job->company_name }}</h1>
                                        <h1 class="text-center"><i class="fas fa-location-dot"></i>{{ $job->location }}
                                        </h1>
                                        <div class="grid grid-cols-3 justify-between underline underline-offset-4">
                                            <h1 class="text-xl"><i class="fas fa-dollar"></i>{{ $job->salary }}</h1>
                                        </div>
                                        <div class="flex-grow flex-row">
                                            <p class="mt-3">
                                                <hr>
                                                <hr>
                                                <hr>
                                                <hr>
                                            </p>
                                            <h1
                                                class="md:inline-flex hidden items-center px-3 py-0.5 rounded-full text-xs md:text-sm font-normal bg-red-100 text-red-500 capitalize mr-2">
                                                New
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="hidden ml-2 md:inline-flex">
                                                    <path
                                                        d="M7 1.75V2.33333M7 11.6667V12.25M12.25 7H11.6667M2.33333 7H1.75M10.7123 10.7123L10.2998 10.2998M3.70017 3.70017L3.28769 3.28769M10.7123 3.28772L10.2999 3.7002M3.7002 10.2999L3.28772 10.7123M9.33333 7C9.33333 8.28866 8.28866 9.33333 7 9.33333C5.71134 9.33333 4.66667 8.28866 4.66667 7C4.66667 5.71134 5.71134 4.66667 7 4.66667C8.28866 4.66667 9.33333 5.71134 9.33333 7Z"
                                                        stroke="#389660" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </h1>
                                            <h1 class="">Posted {{ $job->created_at->diffForHumans() }}</h1>
                                        </div>
                                    </div>
                                </a>
                                <!-- Actions -->
                                <div class="flex items-center bg-red-100 px-5 py-2 gap-x-1 w-full rounded-b-lg">
                                    <h1>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 20 20" fill="none" class role="presentation"
                                            aria-hidden="true">
                                            <path
                                                d="M4.26753 14.8364C5.96056 13.8795 7.9165 13.3333 10 13.3333C12.0835 13.3333 14.0394 13.8795 15.7325 14.8364M12.5 8.33333C12.5 9.71405 11.3807 10.8333 10 10.8333C8.61929 10.8333 7.5 9.71405 7.5 8.33333C7.5 6.95262 8.61929 5.83333 10 5.83333C11.3807 5.83333 12.5 6.95262 12.5 8.33333ZM17.5 10C17.5 14.1421 14.1421 17.5 10 17.5C5.85786 17.5 2.5 14.1421 2.5 10C2.5 5.85786 5.85786 2.5 10 2.5C14.1421 2.5 17.5 5.85786 17.5 10Z"
                                                stroke="#328756" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </h1>
                                    <h1 class="text-sm leading-5 font-medium text-red-600">
                                        Easy Apply
                                    </h1>
                                </div>
                            </div>
                        @endforeach
                @endif
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
