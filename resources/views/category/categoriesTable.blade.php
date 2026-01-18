@extends('layout.admin')

@section('content')
    {{-- استايل DataTables --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.min.css">

    <div class="container mt-4 mb-5">
        <a href="{{ url('/addcategory') }}" class="btn btn-success  btn-lg mb-3">
            <i class="fas fa-plus"></i> Add Category
        </a>

        <table id="myTable" class="display table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($category as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>
                            <h4>{{ $item->name }}</h4>
                        </td>
                        <td
                            style="max-width: 300px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word;">
                           <h5>{{ $item->description }}</h5> 
                        </td>
                        <td>
                            <img src="{{ $item->imagepath }}"
                                style="width: 80px; height: 75px; object-fit: cover; border-radius: 5px;"
                                alt="Category Image">
                        </td>
                        <td style="white-space: nowrap; width: 150px;">
                            <a href="{{ url('/deletecategory/' . $item->id) }}" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i> Delete
                            </a>
                            <a href="{{ url('/editcategory/' . $item->id) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-edit"></i> Edit
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
