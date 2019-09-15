@extends('Partials.master')
@section('content')

    <div class="row">
        <div class="col-md-4"></div>
        <div class="panel panel-info col-md-4" style="background: #c9e2b3">
            <h1 class="text-center">Special Item</h1>
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
            <form class="form-horizontal" action="{{route('chef.specialItemData')}}" method="Post" enctype="multipart/form-data" style="color: black">
                <fieldset>
                    {{csrf_field()}}
                    <div class="form-group">
                        <div class="col-md-1"></div>
                        <div class="col-md-4">
                            <label for="title" class="control-label" style="font-size: 15px">Title</label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="Title" id="title" placeholder="Title" class="form-control">
                        </div>
                        <div class="col-md-1"></div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <textarea class="form-control" name="Details" rows="5" id="textArea" placeholder="Type Some Details Here"></textarea>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3"></div>
                        <div class="col-lg-8">
                            <img style="display: none; margin-top: 5px" src="" id="profile-img"  width="250px" />
                        </div>
                        <div class="col-md-1"></div>
                    </div>


                    <div class="form-group">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <label class="control-label btn btn-default btn-lg btn-block text-center">
                                Add Picture
                                <input type="file" style="display: none;"  name="Image"
                                       accept="image/jpeg, image/x-png"
                                       onchange="document.getElementById('profile-img').style.display='block';
                            document.getElementById('profile-img').src = window.URL.createObjectURL(this.files[0])"
                                >
                            </label>
                        </div>

                        <div class="col-md-1"></div>
                    </div>

                    <div class="form-group">

                        <div class="col-lg-offset-7">
                            <button type="reset" class="btn btn-default" style="font-size: 20px">Cancel</button>
                            <button type="submit" name="Post" class="btn btn-primary" style="font-size: 20px">Add Item</button>
                        </div>
                    </div>


                </fieldset>
            </form>

        </div>
        <div class="col-md-4"></div>
    </div>

@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr('#ended_at',{
            enableTime:true
        });
    </script>

@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection

