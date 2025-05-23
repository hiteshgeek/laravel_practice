<x-layout>
    <x-slot:heading>
        Jobs
    </x-slot:heading>

    <h2 class='font-bold text-lg'>{{ $job->title }}</h2>
    <p>Salary of this job is {{ $job->salary }}</p>

    <p class='mt-6'>
        <x-button href='/jobs/{{ $job->id }}/edit'>Edit Job</x-button>
    </p>
</x-layout>
