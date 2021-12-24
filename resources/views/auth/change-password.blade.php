@section('title', 'New Customer Registration : ')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Change Password') }}
        </h2>
    </x-slot>

    <x-crm-card>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="">
            @csrf

          

            <!-- Old Password -->
            <div class="mt-4">
                <x-label for="current_password" :value="__('Current Password')" />

                <x-input id="old_password" class="block mt-1 w-full"
                                type="password"
                                name="current_password"
                                required autocomplete="current_password" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('New Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Change') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-app-layout>
