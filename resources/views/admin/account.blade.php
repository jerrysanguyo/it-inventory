@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('List of registered Accounts') }}</div>

                <div class="card-body">
                    <table class="table" id="accounts-table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Full name</th>
                                <th>Email Address</th>
                                <th>Role</th>
                                <th>Date of registration</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('#accounts-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '{!! route('accounts.data') !!}',
            type: 'GET'
        },
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'role', name: 'role' },
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });
});
</script>
@endpush
