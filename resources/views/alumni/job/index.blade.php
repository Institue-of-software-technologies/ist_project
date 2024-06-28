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
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="mt-3 flex justify-between items-center">
                    <h4 class="text-lg font-semibold">
                        Jobs
                    </h4>
                    @can('create job')
                        <a href="{{ url('jobs/create') }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                            <i class="fas fa-add"></i> Add Jobs
                        </a>
                    @endcan
                </div>

                <div class="mt-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4">
                    @foreach ($jobs as $job)
                        <div class="bg-white shadow-lg rounded-lg overflow-hidden transition transform hover:bg-red-100 hover:-translate-y-3">
                            <a href="{{ url('alumni/jobs/' . $job->id) }}" class="flex items-center p-4">
                                <!-- Job Details -->
                                <div class="flex-grow">
                                    <h5 class="text-2xl font-extrabold text-red-500">{{ $job->title }}</h5>
                                    <p class="text-2xl text-red-400">{{ $job->company_name }}</p>
                                    <div class="grid grid-cols-3 justify-between underline underline-offset-4">
                                        <span class="">{{ $job->location }}</span>
                                        <span class="">{{ $job->job_type }}</span>
                                        <span class="">Salary : {{ $job->salary }}</span>
                                    </div>
                                    <div class="flex-grow flex-row">
                                        <p class="mt-10">
                                            <hr>
                                            <hr>
                                            <hr>
                                            <hr>
                                        </p>
                                        <span class="md:inline-flex hidden items-center px-3 py-0.5 rounded-full text-xs md:text-sm font-normal bg-red-100 text-red-500 capitalize mr-2">
                                            New
                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg" class="hidden ml-2 md:inline-flex">
                                                <path d="M7 1.75V2.33333M7 11.6667V12.25M12.25 7H11.6667M2.33333 7H1.75M10.7123 10.7123L10.2998 10.2998M3.70017 3.70017L3.28769 3.28769M10.7123 3.28772L10.2999 3.7002M3.7002 10.2999L3.28772 10.7123M9.33333 7C9.33333 8.28866 8.28866 9.33333 7 9.33333C5.71134 9.33333 4.66667 8.28866 4.66667 7C4.66667 5.71134 5.71134 4.66667 7 4.66667C8.28866 4.66667 9.33333 5.71134 9.33333 7Z" stroke="#389660" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </span>
                                        <span class="">Posted {{ $job->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                            </a>
                            <!-- Actions -->
                            <div class="flex items-center bg-red-100 px-5 py-2 gap-x-1 w-full rounded-b-lg">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" class role="presentation" aria-hidden="true">
                                        <path d="M4.26753 14.8364C5.96056 13.8795 7.9165 13.3333 10 13.3333C12.0835 13.3333 14.0394 13.8795 15.7325 14.8364M12.5 8.33333C12.5 9.71405 11.3807 10.8333 10 10.8333C8.61929 10.8333 7.5 9.71405 7.5 8.33333C7.5 6.95262 8.61929 5.83333 10 5.83333C11.3807 5.83333 12.5 6.95262 12.5 8.33333ZM17.5 10C17.5 14.1421 14.1421 17.5 10 17.5C5.85786 17.5 2.5 14.1421 2.5 10C2.5 5.85786 5.85786 2.5 10 2.5C14.1421 2.5 17.5 5.85786 17.5 10Z" stroke="#328756" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                                <span class="text-sm leading-5 font-medium text-red-600">
                                    Easy Apply
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
