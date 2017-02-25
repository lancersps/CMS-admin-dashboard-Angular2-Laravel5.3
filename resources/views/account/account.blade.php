@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-sm-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Pages
                </div>

                <div class="panel-body">
                    <form method="post" action="{{ url('/admin/account/update') }}">{{ csrf_field() }}
                    <br>
                    <label class="form text-left">Email Address</label>
                    <input type="text" class="form form-control" name="email" value="{{ $useremail }}">
                    <br>
                    <label class="form text-left">Current Password</label>
                    <input type="password" class="form form-control" name="current_password" value="">
                    <br>
                    <label class="form text-left">New Password</label>
                    <input type="password" class="form form-control" name="new_password" value="">
                    <br>
                    <label class="form text-left">Confirm Password</label>
                    <input type="text" class="form form-control" name="confirm_password" value="">
                    <br>
                    <input type="submit" class="btn btn-success btn-sm" name="btn_new" value="Save Changes">
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
