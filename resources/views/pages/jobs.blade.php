<x-authenticated-layout>
    <x-slot:heading>
        Job Listings
    </x-slot:heading>
    
    <div class="space-y-4">
        @foreach ($jobs as $job)
            <a href="/jobs/{{ $job['id'] }}" class="block px-4 py-6 border border-gray-200">
                <div class="font-bold text-blue-500 text-sm">{{ $job->employer->name  }}</div>
                <div>
                    <b>{{ $job['title'] }}</b>: Pays {{ $job['salary'] }} per year.
                </div>
            </a>
        @endforeach

        <div>
            <!-- for pagination links -->
            {{ $jobs->links() }}
        </div>
</div>

</x-authenticated-layout>