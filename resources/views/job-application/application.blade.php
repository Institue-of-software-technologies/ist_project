<x-app-layout>
    <div class="container mx-auto mt-2 px-4">
        <div class="grid grid-cols-1 lg:grid-cols-1 md:grid-cols-2 gap-4">

            <div
                class="bg-white border border-lg border-gray-300 hover:border-gray-500 rounded-lg overflow-hidden mt-4 p-4">
                <h5 class="text-3xl font-bold text-center">{{ $application->job->title }}</h5>
                <p class="text-2xl text-gray-600 text-center">Company: {{ $application->job->company_name }}
                    <img src="{{ asset('storage/' . $application->job->company_logo) }}" alt="Company Logo"
                        class="w-auto h-auto lg:w-52 lg:h-36 rounded-xl mx-auto">
                </p>
                <p class="text-xl text-gray-600 text-center">Applicant: {{ $application->user->name }}</p>
                <p class="text-lg text-gray-600 text-center">Experience: {{ $application->experience }} years</p>
                <div class="text-xl text-gray-900 mt-2">
                    <h6 class="font-bold mb-2">Cover Letter:</h6>
                    <div class="bg-gray-100 p-4 rounded-lg">
                        <pre class="whitespace-pre-wrap text-lg">{{ $application->cover_letter }}</pre>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="{{ asset('storage/' . $application->cv) }}"
                        class="bg-red-600 text-white text-center rounded-xl p-3 white" target="_blank"><i
                            class="fas fa-download"></i> Download CV</a>
                </div>
                <div class="flex flex-col text-xl space-y-2 mt-4">
                    <h1>Find Me @</h1>

                    @if ($application->user->email)
                        <a href="mailto:{{ $application->user->email }}"><i class="fas fa-briefcase"></i>
                            {{ $application->user->email }}</a>
                    @endif
                    @if ($application->phone)
                        <a href="tel:{{ $application->phone }}" class="text-gray-900"><i class="fas fa-phone"></i>
                            {{ $application->phone }}</a>
                    @endif
                    @if ($application->linkedin)
                        <a href="{{ $application->linkedin }}" target="_blank" class="hover:text-red-600"><i
                                class="fab fa-linkedin"></i> LinkedIn Profile</a>
                    @endif
                </div>
                <div class="mt-4 flex flex-row">
                    <form action="{{ route('applications.sendEmail', $application->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-blue-500 text-white text-center rounded-xl p-3">Approve</button>
                    </form>
                    <form action="{{ route('applications.reject', $application->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-red-500 text-white text-center rounded-xl p-3">Reject
                            </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
