<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>
        <div style="text-align: center">
            <h1>New Customer Registration</h1>
        </div>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>
            <!-- Mobile -->
            <div>
                <x-label for="mobile" :value="__('Phone Number')" />

                <x-input id="mobile" class="block mt-1 w-full" type="tel" name="mobile" :value="old('mobile')" required />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- passport_number -->
            <div class="mt-4">
                <x-label for="passport_number" :value="__('passport_number')" />

                <x-input id="passport_number" class="block mt-1 w-full"
                                type="text"
                                name="passport_number"
                                required />
            </div>
            <!-- passport_expiry -->
            <div class="mt-4">
                <x-label for="passport_expiry" :value="__('Passport Expiry Date')" />

                <x-input id="passport_expiry" class="block mt-1 w-full"
                                type="date"
                                name="passport_expiry"
                                 />
            </div>
            <!-- dob -->
            <div class="mt-4">
                <x-label for="dob" :value="__('Date of Birth')" />

                <x-input id="dob" class="block mt-1 w-full"
                                type="date"
                                name="dob"
                                 />
            </div>



            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Create') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
