@extends('Partials.master')
@section('content')
    <div class="row">
        <div class="col-md-3"></div>
        <div class="panel panel-info col-md-6" style="background: #c9e2b3">
            <h1 class="text-center">Update Form</h1>

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="list-group">
                        @foreach($errors->all() as $error)
                            <li class="list-group-item text-danger">
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="form-horizontal"  action="{{ route('user.updateData') }}" method="post" style="color: black">
                <fieldset>
                    {{ csrf_field() }}
                    <div class="form-group" >
                        <label for="name" class="col-lg-2 control-label">Name</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" value="{{$user->name}}" name="Name" id="name" placeholder="Name">
                        </div>
                    </div>

                    <div class="form-group" >
                        <label for="email" class="col-lg-2 control-label">Email</label>
                        <div class="col-lg-10">
                            <input type="email" class="form-control" value="{{$user->email}}" name="Email" id="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-lg-2 control-label">Password</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" value="{{$user->password}}" name="Password" id="password" placeholder="Password">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="select" class="col-lg-2 control-label">Location</label>
                        <div class="col-lg-10">
                            <select class="form-control" value="{{$user->location}}" name="Location" id="select">

                                <option value="Mirpur">Mirpur</option>
                                <option value="Banani">Banani</option>
                                <option value="Bashundhara">Bashundhara</option>
                                <option value="Farmgate">Farmgate</option>
                                <option value="Shabag">Shabag</option>
                            </select>

                        </div>
                    </div>

                    <div class="form-group" >
                        <label for="phone" class="col-lg-2 control-label">Phone</label>
                        <div class="col-lg-10">
                            <input type="number"  value="{{$user->phone}}" class="form-control" name="Phone" id="phone" placeholder="Phone">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <button type="reset" class="btn btn-default">Cancel</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </fieldset>
            </form>

        </div>
        <div class="col-md-3"></div>
    </div>


@endsection
