<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="mb-4">
                    <h1 class="text-2xl font-bold text-gray-900">Publish Your Project</h1>
                </div>
                
                <form method="POST" action="{{ route('projects.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="title">Title</label>
                        <input type="text" name="title" id="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="description">Project Description</label>
                        <textarea name="description" id="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" rows="5" required></textarea>
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="link">Project Link</label>
                        <input type="url" name="link" id="link" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="screenshot">Project Screenshot</label>
                        <input type="file" name="screenshot" id="screenshot" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    
                    <div>
                        <button type="submit" class="inline-flex items-center px-6 py-3 bg-gray-900 text-white text-sm font-medium rounded-lg shadow hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition ease-in-out duration-150">Publish Project</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
