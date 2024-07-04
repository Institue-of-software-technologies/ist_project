<x-app-layout>
    <div class="container mx-auto mt-2 px-4">
        <div class="max-w-7xl mx-auto bg-white rounded-lg overflow-hidden shadow-md">
            <div class="p-6">
                <h1 class="text-2xl font-semibold mb-4">Edit Job</h1>
                <form action="{{ route('jobs.update', $job->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="title" class="block text-gray-700 font-bold mb-2">Title</label>
                        <input type="text" name="title" class="form-input w-full" value="{{ $job->title }}" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="company_logo">Company Logo</label>
                        <input type="file" name="company_logo" id="company_logo" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        @if ($job->company_logo)
                            <img src="{{ asset('storage/' . $job->company_logo) }}" alt="Company logo" class="mt-2 w-full h-auto">
                        @endif
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-gray-700 font-bold mb-2">Description</label>
                        <textarea name="description" class="form-textarea w-full" rows="3" required>{{ $job->description }}</textarea>
                    </div>
                    <div class="mb-4">
                        <label for="location" class="block text-gray-700 font-bold mb-2">Location</label>
                        <input type="text" name="location" class="form-input w-full" value="{{ $job->location }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="salary" class="block text-gray-700 font-bold mb-2">Salary</label>
                        <input type="text" name="salary" class="form-input w-full" value="{{ $job->salary }}">
                    </div>
                    <div class="mb-4">
                        <label for="company_name" class="block text-gray-700 font-bold mb-2">Company Name</label>
                        <input type="text" name="company_name" class="form-input w-full" value="{{ $job->company_name }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="job_type" class="block text-gray-700 font-bold mb-2">Job Type</label>
                        <select name="job_type" class="form-select w-full" required>
                            <option value="full-time" {{ $job->job_type == 'full-time' ? 'selected' : '' }}>Full-Time</option>
                            <option value="part-time" {{ $job->job_type == 'part-time' ? 'selected' : '' }}>Part-Time</option>
                            <option value="contract" {{ $job->job_type == 'contract' ? 'selected' : '' }}>Contract</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="experience_level" class="block text-gray-700 font-bold mb-2">Experience Level</label>
                        <input type="text" name="experience_level" class="form-input w-full" value="{{ $job->experience_level }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="education_level" class="block text-gray-700 font-bold mb-2">Education Level</label>
                        <input type="text" name="education_level" class="form-input w-full" value="{{ $job->education_level }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="skills" class="block text-gray-700 font-bold mb-2">Skills</label>
                        <textarea name="skills" class="form-textarea w-full" rows="3" required>{{ $job->skills }}</textarea>
                    </div>
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"><i class="fas fa-edit"></i> Update Job</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
