@extends('admin.layouts.app', ['withOutHeaderSidebar' => true])

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Create Role</h4>
                </div>
            </div>
            <div class="card-body">
                <p>Please fill in the details below to create a new role and assign permissions.</p>
                <form data-action="{{ route('admin.role.store') }}" class="adminFrm form-horizontal" method="POST"
                    data-class="requiredCheck">
                    @csrf
                    <div class="form-group row">
                        <label class="control-label col-sm-3 align-self-center mb-0" for="roleName">Role Name:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="role_name" id="roleName"
                                placeholder="Enter Role Name" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-sm-3 align-self-center mb-0">Permission List:</label>
                    </div>
                    <div class="form-group row">
                        <label class="control-label">All Permissions &nbsp;<input type="checkbox"
                                id="allPermission"></label>
                    </div>
                    <div class="form-group row">
                        @foreach ($permissions as $key => $permission)
                            <div class="col-md-4">
                                <p><strong>{{ $key }}</strong></p>
                                @foreach ($permission as $value)
                                    <div>
                                        <input type="checkbox" name="permissions[]" class="permission-checkbox"
                                            id="permission_{{ $value->id }}" value="{{ $value->id }}">
                                        &nbsp; {{ $value->name }}
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Create Role</button>
                        <button type="reset" class="btn btn-danger">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
