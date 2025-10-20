<x-layout>
    <x-slot:heading>
        Jobs
    </x-slot:heading>

    <!-- Create Job Button -->
    <div class="flex justify-end mb-6">
        <a href="{{ route('jobs.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            + Create Job
        </a>
    </div>

    <!-- Job Listings Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($jobs as $job)
            <div class="bg-white shadow rounded-lg p-6">
                <h2 class="text-lg font-bold text-gray-800 mb-2">
                    <a href="{{ route('jobs.show', $job) }}" class="hover:text-blue-600">
                        {{ $job->title }}
                    </a>
                </h2>
                <p class="text-sm text-gray-600 mb-1">
                    Employer: <span class="font-semibold">{{ $job->employer->name }}</span>
                </p>
                <p class="text-sm text-gray-600 mb-3">
                    Salary: <span class="font-semibold">{{ $job->salary }}</span>
                </p>

                <!-- Tags -->
                <div class="flex flex-wrap gap-2 mb-4">
                    @if ($job->tags && $job->tags->count() > 0)
                        @foreach ($job->tags as $tag)
                            <span class="bg-gray-200 px-2 py-1 rounded text-xs text-gray-700">
                                #{{ $tag->name }}
                            </span>
                        @endforeach
                    @else
                        <span class="text-xs text-gray-400 italic">No tags</span>
                    @endif
                </div>

                <!-- Actions -->
                <div class="flex justify-between items-center text-sm">
                    <a href="{{ route('jobs.show', $job) }}" class="text-blue-600 hover:underline">
                        View
                    </a>
                    <a href="{{ route('jobs.edit', $job) }}" class="text-yellow-600 hover:underline">
                        Edit
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $jobs->links() }}
    </div>
</x-layout>
