<x-app-layout>
    <style>
        .transition-transform {
            transition: transform 0.7s ease-in-out;
        }
    </style>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="mb-4">
                    <h1 class="text-2xl font-bold text-gray-900">Your Published Projects</h1>
                </div>

                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                        role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                    @foreach ($projects as $project)
                        <div
                            class="bg-white shadow-md rounded-lg p-5 border border-gray-200 transition-transform hover:scale-105">
                            <h3 class="text-3xl font-semibold text-gray-800">{{ $project->title }}</h3>
                            <p class="mt-2 text-xl text-gray-600">{{ $project->description }}</p>
                            <p class="text-2xl text-red-500">Posted {{$project->created_at->diffForHumans() }}</p>
                            <a href="{{ $project->link }}" target="_blank"
                                class="text-blue-500 text-2xl p-5 shadow shadow-red-300 rounded-xl border-red-300 mt-2 block transition-transform hover:scale-105">
                                View Project
                                @if ($project->screenshot)
                                    <img src="{{ asset('storage/' . $project->screenshot) }}"
                                        alt="Screenshot of {{ $project->title }}"
                                        class="mt-4 w-full h-auto transition-transform hover:scale-200">
                                @endif
                            </a>
                            <div class="mt-4 flex space-x-4">
                                <a href="{{ route('projects.edit', $project->id) }}"
                                    class="inline-flex items-center px-4 py-2 bg-yellow-500 text-white text-sm font-medium rounded-lg shadow hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition ease-in-out duration-150">
                                        <i class="fas fa-edit mr-2"></i>
                                </a>
                                <form action="{{ route('projects.destroy', $project->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this project?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="inline-flex items-center px-4 py-2 bg-red-500 text-white text-sm font-medium rounded-lg shadow hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition ease-in-out duration-150">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
