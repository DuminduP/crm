<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Customers') }}
        </h2>
        @if (session('status'))
            <x-alert>
                {{ session('status') }}
            </x-alert>
        @endif
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table id="dTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Customer</th>
                                <th>Airline</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tickets as $ticket)
                                <tr>
                                    <td>{{ $ticket->id }}</td>
                                    <td><a href="{{ route('edit_customer', ['id' => $ticket->customer->id]) }}">{{ $ticket->customer->name }}
                                        </a></td>
                                    <td>{{ $ticket->airline }}</td>
                                    <td>{{ $ticket->from }}</td>
                                    <td>{{ $ticket->to }}</td>
                                    <td><a href="{{ route('edit_ticket', ['id' => $ticket->id]) }}">Edit</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    $(document).ready(function() {
        $('#dTable').DataTable({
            "order": [
                [0, "desc"]
            ]
        });
    });
</script>
