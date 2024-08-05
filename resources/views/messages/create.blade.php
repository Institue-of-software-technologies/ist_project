<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold mb-6">{{ __('Send Message to') }} {{ $receiver->full_name }}</h1>
                <form action="{{ route('messages.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="receiver_id" value="{{ $receiver->user_id }}">
                    <div class="mb-4">
                        <label for="message" class="block text-gray-700 font-bold mb-2">{{ __('Message') }}</label>
                        <textarea name="message" id="message" rows="4" class="w-full border rounded-lg p-2" required></textarea>
                    </div>
                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg">{{ __('Send Message') }}</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
