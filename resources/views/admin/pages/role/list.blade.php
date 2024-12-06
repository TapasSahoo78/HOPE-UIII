@extends('admin.layouts.app', ['withOutHeaderSidebar' => true])

@section('content')
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">User Management</h4>
                </div>
            </div>
            <div class="card-body">
                <p>This table displays a list of users. You can manage user details and perform actions such as editing or
                    deleting users.</p>

                <div class="custom-datatable-entries">
                    <table id="roleTable" class="table table-striped" data-toggle="data-table">
                        <thead>
                            <tr>
                                <th>Sl. No.</th>
                                <th>Name</th>
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
    <script src="{{ asset('assets/datatable/role.js') }}"></script>
@endpush
