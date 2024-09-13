<x-app-layout>
    <div class="bg-gray-100 justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl lg:max-w-4xl mx-auto w-full bg-white shadow-lg rounded-lg overflow-hidden">

            {{-- Display success message if any --}}
            @if (session('success'))
                <div class="alert alert-success bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            @if ($profile)
                <div class="relative bg-gradient-to-r from-red-500 to-red-700 p-16">
                    @if ($profile->profile_photo)
                        <div class="absolute top-32 left-28 transform -translate-x-1/2 -translate-y-1/2">
                            <img src="{{ asset('storage/' . $profile->profile_photo) }}" alt="{{ $profile->full_name }}" class="w-48 h-48 rounded-full shadow-xl border-8 border-gray-500 object-cover">
                        </div>
                    @endif
                </div>
                <div class="mt-8 text-right">
                    <a href="{{ url('alumni/profile/' . $profile->id . '/edit') }}" class="text-xl font-bold rounded-full transition duration-300">
                        <i class="fas fa-edit m-2"></i>
                    </a>
                </div>
                <div class="text-left mt-7 m-5">
                    <p class="font-black text-3xl ">{{ $profile->full_name }}</p>
                    <div class="grid sm:grid-cols-1 lg:grid-cols-2">
                        <h2>Lives In <i class="fas fa-map-marker-alt"></i> {{ $profile->location }}</h2>
                        <h1 class="text-red-500">{{ __('Contact Info') }}</h1>
                        <a href="mailto:{{ $profile->email }}"><i class="far fa-envelope text-xl"></i> {{ $profile->email }}</a>
                        <a href="tel:{{ $profile->phone }}"><strong class="text-gray-700"><i class="fas fa-phone"></i> {{ __('Phone:') }}</strong> {{ $profile->phone }}</a>
                        <h2>
                            <a href="{{ $profile->linkedin_profile }}" target="_blank" class="text-red-600 hover:text-red-800 inline-block">
                                <i class="fab fa-linkedin text-xl"></i>
                            </a>
                            <strong class="text-gray-700">{{ __('LinkedIn Profile ') }}</strong>
                        </h2>

                        <h2>
                            <a href="{{ $profile->social_media_links }}" target="_blank" class="text-pink-600 hover:text-pink-800">
                                <i class="fab fa-instagram text-xl"></i>
                            </a>
                            <strong class="text-gray-700">{{ __('Instagram Link') }}</strong>
                        </h2>
                    </div>
                </div>

                {{-- Education --}}
                <div class="max-w-2xl lg:max-w-4xl mx-auto mt-3 bg-white rounded-lg overflow-hidden p-5">
                    <h1 style="font-weight: bolder" class="text-4xl text-center">{{ __('Education ') }}</h1>
                    <h1 class="text-2xl"><i class="fas fa-graduation-cap"></i> {{ $profile->degree }}</h1>
                    <h1 class="font-bold">{{ __('Graduation Year ') }}</h1>
                    <h4 class="text-gray-500">{{ $profile->graduation_year }}</h4>
                    <hr>
                    <p>
                        <h1 class="text-gray-900 font-bold">{{ __('Extra Course ') }}</h1> {{ $profile->extra_course }}
                    </p>
                </div>

                {{-- Skills --}}
                <div class="max-w-2xl lg:max-w-4xl mx-auto mt-3 bg-white rounded-lg overflow-hidden p-5">
                    <h1 style="font-weight: bolder" class="text-4xl text-center">{{ __('Skills ') }}</h1>
                    <ul class="list-disc ml-5">
                        @forelse($skills as $skill)
                            <li class="text-lg"><i class="fas fa-lightbulb"></i> {{ $skill->name }}</li>
                        @empty
                            <li class="text-gray-500">{{ __('No skills added.') }}</li>
                        @endforelse
                    </ul>
                </div>

                {{-- WorkSpace --}}
                <div class="max-w-2xl lg:max-w-4xl mx-auto mt-3 bg-white rounded-lg overflow-hidden p-5">
                    <h1 class="text-4xl font-black text-center">{{ __('Work Space ') }}</h1>
                    <h1 class="text-gray-900 font-bold">{{ __('Current Job Title ') }}
                        <h4 class="text-gray-400">{{ $profile->current_job_title }}</h4>
                    </h1>
                    <h1 class="text-gray-900 font-bold">{{ __('Current Employer ') }}
                        <h4 class="text-gray-400">{{ $profile->current_employer }}</h4>
                    </h1>
                    <h1 class="font-bold">{{ __('Skills') }} <i class="fas fa-cogs text-gray-600 mr-2"></i>
                        <ul class="list-disc ml-5">
                            @forelse($skills as $skill)
                                <li class="text-gray-400">{{ $skill->name }}</li>
                            @empty
                                <li class="text-gray-500">{{ __('No skills listed.') }}</li>
                            @endforelse
                        </ul>
                    </h1>
                </div>

            @else
                <p class="text-gray-700">{{ __('You have not created a profile yet.') }} <a href="{{ route('alumni.profile.create') }}" class="text-red-600 hover:text-red-800 font-bold">{{ __('Create Profile') }}</a></p>
            @endif
        </div>
    </div>
</x-app-layout>
