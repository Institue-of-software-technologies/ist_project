<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold mb-6">{{ __('Message from') }} {{ $message->sender->name }}</h1>
                <p class="text-gray-700">{{ $message->message }}</p>
                <p class="text-sm text-gray-500 mt-4">{{ $message->created_at->diffForHumans() }}</p>
                <a href="{{ route('messages.index') }}" class="mt-6 inline-block bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg">{{ __('Back to Messages') }}</a>
            </div>
        </div>
    </div>
</x-app-layout>
