<x-layout>
    <x-slot:heading>
        Edit Job
    </x-slot:heading>

    <form method="POST" action="/jobs/{{ $job->id }}">
        @csrf
        @method('PATCH')  {{-- ✅ Method spoofing for PATCH requests --}}

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Edit Job</h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">Update the job details below.</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                    {{-- Title Field --}}
                    <div class="sm:col-span-4">
                        <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                        <div class="mt-2">
                            <input type="text" name="title" id="title"
                                   value="{{ old('title', $job->title) }}"
                                   class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                   required>
                        </div>
                        @error('title')
                            <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Salary Field --}}
                    <div class="sm:col-span-4">
                        <label for="salary" class="block text-sm font-medium leading-6 text-gray-900">Salary</label>
                        <div class="mt-2">
                            <input type="text" name="salary" id="salary"
                                   value="{{ old('salary', $job->salary) }}"
                                   class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                   required>
                        </div>
                        @error('salary')
                            <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-between">
            <div>
                <a href="/jobs/{{ $job->id }}" class="text-sm font-semibold text-gray-900">Cancel</a>
            </div>
            <div class="flex gap-x-4">
                {{-- ✅ Delete Button (connected to hidden form below) --}}
                <button form="delete-form" class="text-red-500 text-sm font-semibold">Delete</button>

                {{-- ✅ Save Button --}}
                <button type="submit"
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">
                    Update
                </button>
            </div>
        </div>
    </form>

    {{-- ✅ Hidden Delete Form --}}
    <form method="POST" action="/jobs/{{ $job->id }}" id="delete-form" class="hidden">
        @csrf
        @method('DELETE')
    </form>
</x-layout>
