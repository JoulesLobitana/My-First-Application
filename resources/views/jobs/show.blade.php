<x-layout>
    <x-slot:heading>
        Job
    </x-slot:heading>

    <p class="text-sm text-gray-500">{{ $job->employer->name }}</p>

    <h2 class="font-bold text-lg">{{ $job['title'] }}</h2>

    <p>
        This job pays {{ $job['salary'] }} per year.
    </p>

    <div class="mt-4">
        <a href="/jobs/{{ $job->id }}/edit"
           class="text-indigo-600 hover:underline font-semibold text-sm">
            Edit Job
        </a>
    </div>
</x-layout>
