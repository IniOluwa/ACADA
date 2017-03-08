@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Profile</div>

                <div class="panel-body">
                  <div class="content">
                    <div class="col-sm-10">
                        <form class="form-horizontal" action="{{ route('updateProfile') }}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <fieldset>
                            <div class="form-group">
                                <label for="Name" class="col-lg-4 control-label">Name</label>
                                <div class="col-lg-8">
                                  <input class="form-control" type="text" name="newName" value="{{ Auth::user()->name }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="Email" class="col-lg-4 control-label">Email Address</label>
                                <div class="col-lg-8">
                                  <input class="form-control" type="text" name="newEmail" value="{{ Auth::user()->email }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="Avatar" class="col-lg-4 control-label">Profile Avatar</label>
                                <div class="col-lg-8">
                                  <input type="file" class="form-control" name="avatar">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="Password" class="col-lg-4 control-label">New Password</label>
                                <div class="col-lg-8">
                                  <input class="form-control" type="password" name="newPassword" value="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="Password" class="col-lg-4 control-label">Confirm New Password</label>
                                <div class="col-lg-8">
                                  <input class="form-control" type="password" name="confirmNewPassword" value="">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-10 col-lg-offset-2">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                          </fieldset>
                        </form>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
