@extends('admin.layouts.app', ['withOutHeaderSidebar' => true])

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Assign User</h4>
                </div>
            </div>
            <div class="card-body">
                <form data-action="{{ route('admin.user.role') }}" class="adminFrm form-horizontal" method="POST"
                    data-class="requiredCheck">
                    @csrf
                    <div class="form-group row">
                        <label class="control-label col-sm-3 align-self-center mb-0" for="user_role">Role</label>
                        <div class="col-sm-6">
                            <select name="user_role" id="user_role" class="form-select">
                                {{ getRolesList() }}
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-3 align-self-center mb-0" for="name">Name</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="name" id="name"
                                placeholder="Enter Name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-3 align-self-center mb-0" for="email">Email</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="email" id="email"
                                placeholder="Enter Email" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-3 align-self-center mb-0" for="password">Password</label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control" name="password" id="password"
                                placeholder="Enter Password" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Assign User</button>
                        <button type="reset" class="btn btn-danger">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
