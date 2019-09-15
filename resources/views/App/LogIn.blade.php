@extends('Partials.master')
@section('content')
    <div class="row">
        <div class="col-md-3"></div>
        <div class="panel panel-info col-md-6" style="background: #c9e2b3">
            <h1 class="text-center">LogIn Form</h1>
            <form class="form-horizontal" action="{{ route('user.loginData') }}" method="post" style="color: black">
                <fieldset>
                    {{ csrf_field() }}
                    <div class="form-group" >
                        <label for="email" class="col-lg-2 control-label">Email</label>
                        <div class="col-lg-10">
                            <input type="email" class="form-control" name="Email" id="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-lg-2 control-label">Password</label>
                        <div class="col-lg-10">
                            <input type="password" class="form-control" name="Password" id="password" placeholder="Password">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <button type="reset" class="btn btn-default">Cancel</button>
                            <button type="submit" name="LogIn" class="btn btn-primary">LogIn</button>
                        </div>
                    </div>
                </fieldset>
            </form>

        </div>
        <div class="col-md-3"></div>
    </div>


@endsection
