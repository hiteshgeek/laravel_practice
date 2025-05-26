<x-layout>
    <x-slot:heading>
        Edit Job : {{ $job->title }}
    </x-slot:heading>

    <form method='POST' action='/jobs/{{ $job->id }}'>
        @csrf
        @method('PATCH')

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label for="title">Title</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="text" name="title" id="title" placeholder="Shift Leader"
                                value="{{ $job->title }}"></x-form-input>

                            <x-form-error name='title' />
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="salary">Salary</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="text" name="salary" id="salary" placeholder="100000 per year"
                                value="{{ $job->salary }}"></x-form-input>
                        </div>
                        <x-form-error name='salary' />
                    </x-form-field>

                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-between gap-x-6">
            <div class='flex item-center'>
                <button class='text-red-500 text-sm font-bold' form='delete-form'>Delete</button>
            </div>
            <div class='flex items-center gap-x-6'>
                <a href='/jobs/{{ $job->id }}' class="text-sm/6 font-semibold text-gray-900">Cancel</a>
                <div><button type="submit"
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
                </div>
            </div>
        </div>
    </form>

    <form method='POST' action='/jobs/{{ $job->id }}' class='hidden' id="delete-form">
        @csrf
        @method('DELETE')
    </form>

</x-layout>
