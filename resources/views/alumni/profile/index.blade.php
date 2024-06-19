<x-app-layout>
    <div class="bg-gray-100 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl w-full bg-white shadow-lg rounded-lg overflow-hidden">
                @if (session('status'))
                    <div class="alert alert-success bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                          {{ session('status') }}
                    </div>
                @endif            
            <div class="profile-header bg-gradient-to-r from-red-500 to-red-700 py-6 text-center text-white">              
                <h1 class="text-4xl font-bold mb-2">{{ __('Profile') }}</h1>
                <p class="text-xl">{{ __('Welcome,') }} {{ Auth::user()->name }}</p>
            </div>
            <div class="profile-body text-center p-8">
                @if ($profile)
                    @if ($profile->profile_photo)
                        <div class="flex justify-center mb-6">
                            <img src="{{ asset('storage/' . $profile->profile_photo) }}" alt="{{ $profile->full_name }}"
                                class="w-52 h-52 rounded-full shadow-lg shadow-gray-300 border-4 border-gray-500">
                        </div>
                    @endif
                    <div class="text-left space-y-4">
                        <p class="font-black text-2xl ">{{ $profile->full_name }}</p>
                        <p><i class="far fa-envelope"></i> {{ $profile->email }}</p>
                        <p><i class="fas fa-map-marker-alt"></i> {{ $profile->location }}</p>         
                        <h1 style="font-weight: bolder" class="text-4xl  text-center">{{ __('Education ') }}</h1>              
                        <p><i class="fas fa-graduation-cap"></i> {{ $profile->degree }}</p>

                        <p><h1 class="text-gray-900 font-bold">{{ __('Graduation Year ') }}</h1> {{ $profile->graduation_year }}</p>
                        <p><h1 class="text-gray-900 font-bold">{{ __('Extra Course ') }}</h1> {{ $profile->extra_course }}</p>

                        <h1 class="text-4xl font-black text-center">{{ __('Job Titles ') }}</h1>

                        <p class="font-bold text-2xl"><h1 class="text-gray-900 font-bold">{{ __('Current Job Title ') }}</h1>{{ $profile->current_job_title }}</p>

                        <p ><h1 class="text-gray-900 font-bold">{{ __('Current Employer ') }}</h1> {{ $profile->current_employer }}</p>

                        <p class="font-bold"><h1 class=" font-bold">{{__('Skills')}}</h1>    <i class="fas fa-cogs text-gray-600 mr-2"></i> {{ $profile->skills }}</p>

                        <h1 class="text-4xl font-black text-center">{{ __('Reach me ') }}</h1>
                                                
                        <p><strong class="text-gray-700">{{ __('Phone:') }}</strong> {{ $profile->phone }}</p>
                        <p>
                            <strong class="text-gray-700">{{ __('LinkedIn Profile ') }}</strong> 
                            <a href="{{ $profile->linkedin_profile }}" target="_blank" class="text-red-600 hover:text-red-800 inline-block">
                                <i class="fab fa-linkedin fa-2xl"></i>
                            </a>
                        </p>

                        <p><strong class="text-gray-700">{{ __('Instagram Link') }}</strong> 

                            <a href="{{ $profile->social_media_links }}" target="_blank" class="text-pink-600 hover:text-pink-800">
                                <i class="fab fa-instagram text-3xl"></i>
                            </a>
                        </p>

                    </div>
                    <div class="mt-8 text-center">
                        <a href="{{ url('alumni/profile/' . $profile->id . '/edit') }}"
                            class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full shadow-lg transition duration-300">{{ __('Edit Profile') }}</a>
                    </div>
                @else
                    <p class="text-gray-700">{{ __('You have not created a profile yet.') }} <a href="{{ route('profile.create') }}"
                            class="text-red-600 hover:text-red-800 font-bold">{{ __('Create Profile') }}</a></p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
