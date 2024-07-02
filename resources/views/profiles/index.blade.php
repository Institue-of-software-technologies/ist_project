<x-app-layout>
    <div class=" flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl w-full bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="profile-header bg-gradient-to-r from-red-500 to-red-700 py-6 text-center text-white">
                <h1 class="text-4xl font-bold mb-2">{{ __('Alumni Profiles') }}</h1>
                <form action="{{ route('profiles.search') }}" method="GET" class="mt-4">
                    <input type="text" name="search" class="py-2 px-4 text-gray-900 font-semibold border rounded-lg w-1/2"
                        placeholder="Search by name">
                    <button type="submit"
                        class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg">Search</button>
                </form>
            </div>
            <div class="profile-body p-8">
                @if ($profiles->isEmpty())
                    <p class="text-gray-700">{{ __('No profiles found.') }}</p>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach ($profiles as $profile)
                            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                                <div class="text-center py-6 bg-gradient-to-r from-red-500 to-red-700 text-white">
                                    <h2 class="text-2xl font-bold">{{ $profile->full_name }}</h2>
                                </div>
                                <div class="p-4">
                                    @if ($profile->profile_photo)
                                        <div class="flex justify-center mb-4">
                                            <img src="{{ asset('storage/' . $profile->profile_photo) }}"
                                                alt="{{ $profile->full_name }}"
                                                class="w-32 h-32 rounded-full shadow-lg shadow-gray-300 border-4 border-gray-500">
                                        </div>
                                    @endif
                                    <p class="text-gray-700"><i class="far fa-envelope"></i> {{ $profile->email }}</p>
                                    <p class="text-gray-700"><i class="fas fa-map-marker-alt"></i>
                                        {{ $profile->location }}</p>
                                    <p class="text-gray-700"><i class="fas fa-graduation-cap"></i>
                                        {{ $profile->degree }}</p>
                                    <p class="text-gray-700"><i class="fas fa-briefcase"></i>
                                        {{ $profile->current_job_title }}</p>
                                    <h1 class="text-3xl font-black text-center">{{ __('Reach me ') }}</h1>

                                    <p><strong class="text-gray-700">{{ __('Phone:') }}</strong>
                                        {{ $profile->phone }}</p>
                                    <p>
                                        <strong class="text-gray-700">{{ __('LinkedIn Profile ') }}</strong>
                                        <a href="{{ $profile->linkedin_profile }}" target="_blank"
                                            class="text-red-600 hover:text-red-800 inline-block">
                                            <i class="fab fa-linkedin fa-2xl"></i>
                                        </a>
                                    </p>
                                    <div class="mt-4 text-center">
                                        <a href="{{ url('alumni/profile/index/' . $profile->id) }}"
                                            class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg">View
                                            Profile</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
