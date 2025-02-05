<x-authenticated-layout>
    <x-slot:heading>
        Job Listings
    </x-slot:heading>
    
    <ul>
        @foreach ($jobs as $job)
            <li>
                <a href="/jobs/{{ $job['id'] }}" class="text-blue-500 hover:underline">
                    <b>{{ $job['title'] }}</b>: Pays {{ $job['salary'] }} per year.
                </a>
            </li>
        @endforeach
    </ul>

</x-authenticated-layout>