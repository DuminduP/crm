<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Customers') }}
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
                                <th>Name</th>
                                <th>Passport#</th>
                                <th>Mobile</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $customer)
                            <tr>
                                <td>{{$customer->id}}</td>
                                <td class="name">{{$customer->name}}</td>
                                <td>{{$customer->passport_number}}</td>
                                <td><a href="tel:{{$customer->mobile}}">{{$customer->mobile}}</a></td>
                                <td><a href="mailto:{{$customer->email}}">{{$customer->email}}</a></td>
                                <td>{{$customer->status}}</td>
                                <td>
                                    <a href="{{route('edit_customer',['id' => $customer->id] )}}" title="Edit"><i class="fas fa-edit"></i></a> &nbsp;
                                    <a href="{{route('view_customer',['id' => $customer->id] )}}" title="View"><i class="fas fa-eye"></i></a> &nbsp;
                                    <a href="{{route('new_ticket',['customer_id' => $customer->id] )}}" title="Ticket"><i class="fa fa-ticket"></i></a> &nbsp;
                                    <a href="{{route('delete_customer',['id' => $customer->id] )}}" title="Delete" class="delete"><i class="fa fa-trash"></i></a>
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
    $(document).ready(function() {
        $('#dTable').DataTable({
            "order": [
                [0, "desc"]
            ]
        });

        $('.delete').click(function() {
            var name = $(this).parent().parent().find('.name').html();
            return confirm("Are you sure you want to delete " + name + " ?");
        })
    });
</script>