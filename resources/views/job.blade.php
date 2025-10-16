<x-layout>
    <x-slot:heading>
        Job
    </x-slot:heading>

    <p class="text-sm text-gray-500">{{ $job->employer->name }}</p>

    <h2 class="font-bold text-lg">{{ $job['title'] }}</h2>
    <p>
        This job pays {{ $job['salary'] }} per year.
    </p>
    @if($job->tags->count())
    <div class="mt-4">
        <h3 class="font-semibold">Tags:</h3>
        <ul class="flex gap-2">
            @foreach ($job->tags as $tag)
                <li class="px-2 py-1 bg-gray-200 rounded">{{ $tag->name }}</li>
            @endforeach
        </ul>
    </div>
@endif
</x-layout>
