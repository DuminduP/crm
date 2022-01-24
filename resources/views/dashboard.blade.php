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
                            <tr><th>ID</th><th>Name</th><th>Passport#</th><th>Mobile</th><th>Email</th><th>Actions</th></tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $customer)   
                            <tr>
                                <td>{{$customer->id}}</td>
                                <td>{{$customer->name}}</td>
                                <td>{{$customer->passport_number}}</td>
                                <td><a href="tel:{{$customer->mobile}}">{{$customer->mobile}}</a></td>
                                <td><a href="mailto:{{$customer->email}}">{{$customer->email}}</a></td>
                                <td>
                                    <a href="{{route('edit_customer',['id' => $customer->id] )}}" title="Edit"><i class="fas fa-edit"></i></a> &nbsp;
                                    <a href="{{route('view_customer',['id' => $customer->id] )}}" title="View"><i class="fas fa-eye"></i></a>
                                </td>
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
$(document).ready( function () {
    $('#dTable').DataTable({
        "order": [[ 0, "desc" ]]
    });
} );
</script>