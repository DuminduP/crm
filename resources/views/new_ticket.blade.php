@section('title', 'New Customer Registration : ')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Traveling Information') }}
        </h2>
    </x-slot>
    
    <x-crm-card>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="customer_id" :value="__('Customer Name')" />

                <select name="customer_id" id="customer_id" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" required>
                    <option value="" >Please select</option>
                    @foreach($customers as $id => $name)
                        <option value="{{$id}}" title="{{$name}}" {{old('customer_id', 1) == $id ? 'selected' : ''}}>{{$name}}</option>
                    @endforeach
                </select>
            </div>
            <!-- From -->
            <div class="mt-4">
                <x-label for="from" :value="__('From')" />

                <x-input id="from" class="block mt-1 w-full" type="text" name="from" :value="old('from')" required />
            </div>
            <!-- To -->
            <div class="mt-4">
                <x-label for="to" :value="__('To')" />

                <x-input id="to" class="block mt-1 w-full" type="text" name="to" :value="old('to')" required />
            </div>

                        <!-- Air Line -->
                        <div>
                            <x-label for="airline" :value="__('Air Line')" />
            
                            <select name="airline" id="airline">
                                @foreach($airlines as $id => $name)
                                    <option value="{{$id}}" title="{{$name}}" {{old('airline', 1) == $id ? 'selected' : ''}}>{{$name}}</option>
                                @endforeach
                            </select>
                        </div>



            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Save') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
