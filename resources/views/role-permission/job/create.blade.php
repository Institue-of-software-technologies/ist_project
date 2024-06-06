<x-app-layout>
    <x-slot name="header">
        @include('role-permission.nav-links')
    </x-slot>

    <div class="container mx-auto mt-2 px-4">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-2xl font-bold mb-4">Create Job</h1>
                <form action="{{ route('jobs.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="title" class="block text-gray-700">Title</label>
                        <input type="text" name="title" class="form-control mt-1 block w-full border border-gray-300 p-2 rounded" required>
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-gray-700">Description</label>
                        <textarea name="description" class="form-control mt-1 block w-full border border-gray-300 p-2 rounded" required></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="location" class="text-gray-700">Location</label>
                        <input name="location" class="mt-1 w-full border border-gray-300 p-2 rounded" required>
                    </div>
                    <div class="mb-4">
                        <label for="salary" class="text-gray-700">Salary</label>
                        <input type="number" name="salary" class=" mt-1 block w-full border border-gray-300 p-2 rounded">
                    </div>
                    <div class="mb-4">
                        <label for="company_name" class="block text-gray-700">Company Name</label>
                        <input type="text" name="company_name" class="form-control mt-1 block w-full border border-gray-300 p-2 rounded" required>
                    </div>
                    <div class="mb-4">
                        <label for="job_type" class="block text-gray-700">Job Type</label>
                        <select name="job_type" class="form-control mt-1 block w-full border border-gray-300 p-2 rounded" required>
                            <option value="full-time">Full-Time</option>
                            <option value="part-time">Part-Time</option>
                            <option value="contract">Contract</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="experience_level" class="block text-gray-700">Experience Level</label>
                        <input type="text" name="experience_level" class="form-control mt-1 block w-full border border-gray-300 p-2 rounded" required>
                    </div>
                    <div class="mb-4">
                        <label for="education_level" class="block text-gray-700">Education Level</label>
                        <input type="text" name="education_level" class="form-control mt-1 block w-full border border-gray-300 p-2 rounded" required>
                    </div>
                    <div class="mb-4">
                        <label for="skills" class="block text-gray-700">Skills</label>
                        <textarea name="skills" class="form-control mt-1 block w-full border border-gray-300 p-2 rounded" required></textarea>
                    </div>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create Job</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
