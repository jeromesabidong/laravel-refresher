<x-authenticated-layout>
    <x-slot:heading>
        Job Info
    </x-slot:heading>

    <h2 class="font-bold text-lg">{{ $job->title }}</h2>

    <p>
        This job pays {{ $job->salary }} per year. 
    </p>

    @can('edit', $job)
    <p class="mt-6">
        <x-button href="/jobs/{{ $job->id }}/edit">Edit Job</x-button>
    </p>
    @endcan
</x-authenticated-layout>