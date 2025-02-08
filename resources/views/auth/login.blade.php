<x-authenticated-layout>
    <x-slot:heading>
        Register
    </x-slot:heading>

    <form method="POST" action="/login">

        @csrf

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label for="email_address">Email Address</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="email_address" id="email_address" required type='email' />
                            <x-form-error name="email_address" />
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="password">Password</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="password" id="password" required type='password' />
                            <x-form-error name="password" />
                        </div>
                    </x-form-field>
                </div>
            </div>

        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/" type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
            
            <x-form-button>Login</x-form-button>
        </div>
    </form>

</x-authenticated-layout>