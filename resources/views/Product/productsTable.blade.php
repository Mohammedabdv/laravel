@extends('layout.admin')

@section('content')
    {{-- استايل DataTables --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.min.css">

    <div class="container mt-4 mb-5">
        <a href="{{ url('/addproduct') }}" class="btn btn-success btn-lg mb-3">
            <i class="fas fa-plus"></i> Add Product
        </a>

        <table id="myTable" class="display table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th style="width: 50px;">ID</th>
                    <th style="width: 200px;">Name</th>
                    <th style="width: 200px;">Description</th>
                    <th style="width: 100px;">Price</th>
                    <th style="width: 100px;">Quantity</th>
                    <th style="width: 80px;">Image</th>
                    <th style="width: 250px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td><h5>{{ $item->name }}</h5></td>
                        <td
                            style="max-width: 300px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word;">
                           <h5>{{ $item->description }}</h5> 
                        </td>
                        <td><h5>{{ $item->price }} $</h5></td>
                        <td><h5>{{ $item->quantity }}</h5></td>
                        <td>
                            <img src="{{ $item->imagepath }}" style="width: 80px; height: 75px; object-fit: cover; border-radius: 5px;" alt="Product Image">
                        </td>
                        <td style="white-space: nowrap;">
                            <a href="{{ url('/deleteproduct/' . $item->id) }}" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i> Delete
                            </a>
                            <a href="{{ url('/editproduct/' . $item->id) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <a href="{{ url('/addproductphoto/' . $item->id) }}" class="btn btn-secondary btn-sm">
                                <i class="fas fa-image"></i> Add Image
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@push('scripts')
    {{-- jQuery --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-MXe5EK5gyK+fbhwQy/dukwz9fw71HZcsM4KsyDBDTvMyjymkiO0M5qqU0lF4vqLI4VnKf1+DIKf1GM6RFkO8PA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- DataTables --}}
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                language: {
                    search: "Search:",
                    lengthMenu: "Show _MENU_ records per page",
                    info: "Showing _START_ to _END_ of _TOTAL_ records",
                    paginate: {
                        first: "First",
                        last: "Last",
                        next: "Next",
                        previous: "Previous"
                    },
                    zeroRecords: "No matching records found"
                },
                paging: true,
                searching: true,
                info: true
            });
        });
    </script>
@endpush
