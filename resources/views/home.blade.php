@extends('Partials.master')

@section('content')
    @if(auth()->user()->isUser())
         <div class="row " style="color: black; ">

        <div class="col-md-1 col-lg-1"></div>

        <div class="card col-xs-12 col-sm-6  col-md-3 col-lg-3" style="" >

        </div>

        <div class="panel col-xs-12 col-sm-6 col-md-6 col-lg-6" style="">

            @foreach($posts as $post)
                    <div class="panel panel-info" style="background: antiquewhite;font-size: 25px;">
                        <p class="text-center">
                            <a href="{{route('chef.show',$post->user_id)}}" class="col-md-12" style="text-decoration: none"> <strong>Posted By :{{$post->menu_for}}</strong>
                            </a>
                        </p>
                        <a href="{{route('post.show',$post->id)}}" class="" style="text-decoration: none">

                            <div style="margin-left: 7px; margin-right: 7px">

                                <p class="text-info text-center">
                                    <strong>Posted at:</strong>{{ $post->created_at }}
                                </p>
                                <p style="color: black">{{$post->details }}</strong>  .</p>
                                <img src="{{asset('storage/'.$post->image)}}"  style="height:200px;width: 40%; margin-left: 190px">
                                <p class="text-center" style="color: orangered">Price: {{$post->price}}</p>
                            </div>
                        </a>

                    </div>

            @endforeach

                <ul class="pagination" style="margin-left: 60%">
                    {{$posts->links()}}
                </ul>

        </div>

        <div class="col-md-2 col-lg-2"></div>



    </div>
    @elseif(auth()->user()->isChef())
        <div class="row">
            <div class="col-md-4"></div>
            <div class="panel panel-info col-md-4" style="background: #c9e2b3">
                <h1 class="text-center">Create Post</h1>
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
                <form class="form-horizontal" action="{{route('post.store')}}" method="Post" enctype="multipart/form-data" style="color: black">
                    <fieldset>
                        {{csrf_field()}}
                        <div class="form-group">
                            <div class="col-md-1"></div>
                            <div class="col-md-4">
                                <label for="name" class="control-label" style="font-size: 15px">Menu For</label>
                            </div>
                            <div class="col-lg-6">
                                <select class="form-control" name="MenuFor" id="select">
                                    <option value="Breakfast">Breakfast</option>
                                    <option value="Lunch">Lunch</option>
                                    <option value="Snacks">Snacks</option>
                                    <option value="Dinner">Dinner</option>

                                </select>
                            </div>
                            <div class="col-md-1"></div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <textarea class="form-control" name="Details" rows="5" id="textArea" placeholder="Type Some Details Here"></textarea>
                                {{--                            <input id="details" type="hidden" name="Details">--}}
                                {{--                            <trix-editor class="trix-content" input="details" style="background: white" placeholder="Write some details">--}}

                                {{--                            </trix-editor>--}}
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
                            <div class="col-md-1"></div>
                            <div class="col-md-4">
                                <label for="ended_at" class="control-label" style="font-size: 15px">Ended At</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="Ended_At" id="ended_at" class="form-control">
                            </div>
                            <div class="col-md-1"></div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-1"></div>
                            <div class="col-md-4">
                                <label for="maxOrder" class="control-label" style="font-size: 15px">Max Order</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="number" name="MaxOrder" id="maxOrder" class="form-control">
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-1"></div>
                            <div class="col-md-4">
                                <label for="price" class="control-label" style="font-size: 15px">Plate Price</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="number" name="Price" id="price" class="form-control">
                            </div>
                            <div class="col-md-1"></div>
                        </div>

                        <div class="form-group">

                            <div class="col-lg-offset-7">
                                <button type="reset" class="btn btn-default" style="font-size: 20px">Cancel</button>
                                <button type="submit" name="Post" class="btn btn-primary" style="font-size: 20px">Post</button>
                            </div>
                        </div>


                    </fieldset>
                </form>

            </div>
            <div class="col-md-4"></div>
        </div>
    @endif
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
