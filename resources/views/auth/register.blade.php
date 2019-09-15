@extends('layouts.landingMaster')

@section('content')
<div class="row">
    <div class="col-md-3"></div>

    <div class="panel panel-info col-md-6" style="background: #c9e2b3">
        <h1 class="text-center">Registration Form</h1>
                    <form method="POST" action="{{ route('register') }}" class="form-horizontal" style="color: black">
                        @csrf

                        <div class="form-group">
                            <label for="name" class="col-lg-2 control-label">{{ __('Name') }}</label>

                            <div class="col-md-10">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="email" class="col-lg-2 control-label">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-10">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="password" class="col-lg-2 control-label">{{ __('Password') }}</label>

                            <div class="col-md-10">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

{{--                        <div class="form-group row">--}}
{{--                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <div class="form-group ">
                            <label for="Location" class="col-lg-2 control-label">{{ __('Location') }}</label>

                            <div class="col-md-10">
                                <select class="form-control" name="location" id="select">
                                    <option value="">Select One Area</option>
                                    <option value="Mirpur">Mirpur</option>
                                    <option value="Banani">Banani</option>
                                    <option value="Bashundhara">Bashundhara</option>
                                    <option value="Farmgate">Farmgate</option>
                                    <option value="Shabag">Shabag</option>
                                </select>                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="phone" class="col-lg-2 control-label">{{ __('Phone') }}</label>

                            <div class="col-md-10">
                                <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">

                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-2"></div>
                            <div class="radio col-md-5">
                                    <label>
                                        <input type="radio" name="status" id="optionsRadios1" value="Chef" checked="">
                                       <strong style="font-size: 20px">As A Chef</strong>
                                    </label>
                                </div>
                            <div class=" radio col-md-5">
                                <label>
                                    <input type="radio" name="status" id="optionsRadios1" value="User" checked="">
                                    <strong style="font-size: 20px">As An User</strong>
                                </label>
                            </div>
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-2">
                                <button type="reset" class="btn btn-default">Cancel</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
