@extends('admin.layouts.app', ['withOutHeaderSidebar' => true])

@section('content')
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Assign User</h4>
                </div>
                <a href="{{ route('admin.user.role') }}" class="btn btn-primary">New Assign User</a>
            </div>
            <div class="card-body">
                <div class="custom-datatable-entries">
                    <table id="assignUserTable" class="table table-striped" data-toggle="data-table">
                        <thead>
                            <tr>
                                <th>Sl. No.</th>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Data will be populated by DataTables -->
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('assets/datatable/permission.js') }}"></script>
@endpush
