@extends('admin.master')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <!-- left column -->
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Manage Password</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('profile.pwd_update', $user->id) }}" id="password_change_form" method="post">
                          @csrf

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                            <label for="current_password">Current Pasasword</label>
                                            <input type="password" name="current_password" class="form-control form-control-sm" id="current_password" placeholder="Enter current password">
                                        </div>

                                <div class="form-group col-md-4">
                                    <label for="new_password">New Pasasword<span class="text-danger">*</span></label>
                                    <input type="password" name="new_password" class="form-control form-control-sm" id="new_password"
                                        placeholder="Enter new password">
                                </div>

                                <div class="form-group col-md-4">
                                            <label for="again_new_password">Again New Pasasword<span class="text-danger">*</span></label>

                                            <input type="password" name="again_new_password" class="form-control form-control-sm" id="again_new_password" placeholder="Confirm new password">
                                        </div>

                                        <button type="submit" class="btn btn-primary  btn-block btn-sm">Update</button>
                            </div>
                        </form>

                    </div>


                </div>
                <!-- /.card -->

            </div>
            <!--/.col (left) -->

        </div>
    </div>
@endsection
