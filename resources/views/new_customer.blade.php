@section('title', 'New Customer Registration : ')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Customer Details') }}
        </h2>
    </x-slot>
    
    <x-crm-card>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $customer->name)" required autofocus />
            </div>
            <!-- Mobile -->
            <div class="mt-4">
                <x-label for="mobile" :value="__('Mobile Number')" />

                <x-input id="mobile" class="block mt-1 w-full" type="tel" name="mobile" :value="old('mobile', $customer->mobile)" required />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $customer->email)" required />
            </div>

            <!-- passport_number -->
            <div class="mt-4">
                <x-label for="passport_number" :value="__('Passport Number')" />

                <x-input id="passport_number" class="block mt-1 w-full"
                                type="text"
                                name="passport_number" :value="old('passport_number', $customer->passport_number)" 
                                required />
            </div>
            <!-- passport_expiry -->
            <div class="mt-4">
                <x-label for="passport_expiry" :value="__('Passport Expiry Date')" />

                <x-input id="passport_expiry" class="block mt-1 w-full"
                                type="date"
                                name="passport_expiry" :value="old('passport_expiry', $customer->passport_expiry)" 
                                 />
            </div>
            <!-- dob -->
            <div class="mt-4">
                <x-label for="dob" :value="__('Date of Birth')" />

                <x-input id="dob" class="block mt-1 w-full"
                                type="date"
                                name="dob" :value="old('dob', $customer->dob)" 
                                 />
            </div>



            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Save') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
