@section('title', 'New Customer Registration : ')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Customer Detail View') }}
        </h2>
    </x-slot>
    
    <x-crm-card>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <div>
                <div class="flex items-center justify-end mt-4">
                    <a href="{{route('edit_customer',['id' => $customer->id] )}}" title="Edit"><i class="fas fa-edit"></i></a> 
                </div>
                <x-namevalue-div :name="__('Name')" :value="$customer->name" />
                <x-namevalue-div :name="__('Mobile')" :value="$customer->mobile" />
                <x-namevalue-div :name="__('Email')" :value="$customer->email" />
                <x-namevalue-div :name="__('Passport Number')" :value="$customer->passport_number" />
                <x-namevalue-div :name="__('Passport Expiry Date')" :value="$customer->passport_expiry" />
                <x-namevalue-div :name="__('Date of Birth')" :value="$customer->dob" />
            </div>

    </x-crm-card>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table id="dTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Created Date</th>
                                <th>Airline</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customer->tickets as $ticket)
                                <tr>
                                    <td>{{ $ticket->id }}</td>
                                    <td>{{ $ticket->created_at }}</td>
                                    <td>{{ $ticket->airline }}</td>
                                    <td>{{ $ticket->from }}</td>
                                    <td>{{ $ticket->to }}</td>
                                    <td><a href="{{ route('edit_ticket', ['id' => $ticket->id]) }}"><i class="fas fa-edit"></i></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</x-guest-layout>

<script>
    $(document).ready(function() {
        $('#dTable').DataTable({
            "order": [
                [0, "desc"]
            ]
        });
    });
</script>