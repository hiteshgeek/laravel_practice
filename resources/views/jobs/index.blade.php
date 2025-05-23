<x-layout>
    <x-slot:heading>
        Jobs Listings
    </x-slot:heading>

    <div class="space-y-4">
        @foreach ($jobs as $i => $job)
            <a href="/jobs/{{ $job['id'] }}" class='block px-4 py-6 border bordere-gray-200 rounded-lg'>
                <div class="font-bold text-blue-500 text-sm">
                    {{ $i + 1 }}.
                    {{ $job->employer->name }}
                </div>
                <div>
                    <strong>{{ $job['title'] }}</strong>:{{ $job['salary'] }}
                </div>
            </a>
        @endforeach

        <div>
            {{ $jobs->links() }}
        </div>
    </div>
</x-layout>
