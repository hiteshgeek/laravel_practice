<x-layout>
    <x-slot:heading>
        Register
    </x-slot:heading>

    <form method='POST' action='/register'>
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label for="title">Name</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="text" name="name" id="name" placeholder="Name"
                                required></x-form-input>

                            <x-form-error name='name' />
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="title">Email</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="email" name="email" id="email" placeholder="Email"
                                required></x-form-input>

                            <x-form-error name='email' />
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="salary">Password</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="password" name="password" id="password" placeholder="Password"
                                required></x-form-input>
                        </div>
                        <x-form-error name='password' />
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="salary">Confirm Password</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="password" name="password_confirmation" id="password_confirmation"
                                placeholder="Confirm Password" required></x-form-input>
                        </div>
                        <x-form-error name='password_confirmation' />
                    </x-form-field>
                </div>

            </div>

        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href='/' type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
            <x-form-button>Register</x-form-button>
        </div>
    </form>

</x-layout>
