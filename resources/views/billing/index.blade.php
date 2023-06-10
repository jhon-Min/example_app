@extends('layouts.app')

@section('title')
    All BIlling
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            @if (session('created'))
                <div class="alert alert-success">
                    {{ session('created') }}
                </div>
            @endif

            @if (session('updated'))
                <div class="alert alert-success">
                    {{ session('updated') }}
                </div>
            @endif
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>BIlling Lists</h4>
                    <a href="{{ route('billing.create') }}" class="btn btn-primary">Add</a>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover dt-responsive no-wrap w-100" id="dataTable">
                        <thead>
                            <tr>
                                <th>Client Name</th>
                                <th>Amount</th>
                                <th>Due Date</th>
                                <th>Description</th>
                                <th class="no-sort">Action</th>
                                <th class="hidden">Created_At</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            var table = $('#dataTable').DataTable({
                ajax: '{{ route('billing.ssd') }}',
                columns: [{
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'amount',
                        name: 'amount'
                    },
                    {
                        data: 'due_date',
                        name: 'due_date'
                    },
                    {
                        data: 'desc',
                        name: 'desc'
                    },
                    {
                        data: 'action',
                        name: 'action',
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                    },
                ],

            });

            // Delete
            $(document).on('click', '.del-btn', function(e, id) {
                e.preventDefault();
                var id = $(this).data("id");
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!",
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire("Deleted!", "Your file has been deleted.", "success");
                        $.ajax({
                            method: "DELETE",
                            url: `/billing/${id}`,
                        }).done(function(res) {
                            table.ajax.reload();
                        })
                    }
                });
            })
        })
    </script>
@endsection
