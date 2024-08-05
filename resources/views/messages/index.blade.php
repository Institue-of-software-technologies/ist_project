<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold mb-6">{{ __('Messages') }}</h1>

                <h2 class="text-xl font-semibold mb-4">{{ __('Received Messages') }}</h2>
                @forelse ($receivedMessages as $message)
                    <div class="mb-4 p-4 border rounded-lg {{ $message->is_read ? '' : 'bg-yellow-100' }}">
                        <div class="text-xl text-gray-900 mt-2">
                            <h6 class="font-bold mb-2">Cover Letter:</h6>
                            <div class="bg-gray-100 p-4 rounded-lg">
                                <pre class="whitespace-pre-wrap text-lg"><strong>FROM :{{ $message->sender->name }}</strong>: {{ $message->message }}</pre>
                            </div>
                        </div>
                        <p class="text-gray-600 text-sm">{{ $message->created_at->diffForHumans() }}</p>
                    </div>
                @empty
                    <p>{{ __('No received messages.') }}</p>
                @endforelse

                <h2 class="text-xl font-semibold mb-4 mt-6">{{ __('Sent Messages') }}</h2>
                @forelse ($sentMessages as $message)
                    <div class="mb-4 p-4 border rounded-lg">
                        <div class="text-xl text-gray-900 mt-2">
                            {{-- <h6 class="font-bold mb-2">Cover Letter:</h6> --}}
                            <div class="bg-gray-100 p-4 rounded-lg">
                                <pre class="whitespace-pre-wrap text-lg"><strong>To:{{ $message->receiver->name }}</strong>: {{ $message->message }}</pre>
                            </div>
                        </div>
                        <p class="text-gray-600 text-sm">{{ $message->created_at->diffForHumans() }}</p>
                    </div>
                @empty
                    <p>{{ __('No sent messages.') }}</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
