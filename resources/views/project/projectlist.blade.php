 <x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="mb-8">
                    <h1 class="text-3xl font-extrabold text-gray-900 text-center">Your Published Projects</h1>
                </div>

                @if (session('status'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                        role="alert">
                        <span class="block sm:inline">{{ session('status') }}</span>
                    </div>
                @endif

                @if ($projects->isEmpty())
                    <div class="flex items-center justify-center p-6 bg-red-100 border border-red-600 text-red-700 text-center font-bold rounded-lg shadow-lg">
                        <p class="text-xl">{{ __('You Have Not Published Any Projects.') }}</p>
                    </div>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($projects as $project)
                            <div class="bg-gray-100 shadow-lg  rounded-lg p-5 border border-gray-300 hover:bg-gray-300 transition duration-1000 ease-out transform hover:-translate-y-2">
                                <h3 class="text-2xl font-extrabold text-center text-red-600 mb-4">
                                    <a href="{{ route('project.index', $project->id) }}">{{ $project->title }}</a>
                                </h3>
                                <p class="text-center font-bold text-gray-900">
                                    {{ Illuminate\Support\Str::limit($project->description, 300) }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
