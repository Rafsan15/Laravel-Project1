@extends('Partials.master')
@section('content')

    <div class="row " style="color: black; ">

        <div class="panel col-xs-12 col-sm-6 col-md-3 col-lg-3" style="">
            <div class="panel panel-info col-md-offset-1">
                <div class="col-md-offset-2">
                    <form class="form-horizontal" action="{{route('user.profilePicture')}}" method="Post" enctype="multipart/form-data">
                        {{csrf_field()}}

                        @if(isset($user))
                            <img src="{{asset('storage/'.$user->profile_picture)}}" id="profile-img"  style="height: 40%;width: 80%;border-radius: 50% ">
                        @else
                            <img src="" id="profile-img"  style="height: 40%;width: 80%;border-radius: 50% ">

                        @endif
                        @if(auth()->user()->isChef())
                            <label class="control-label btn btn-info col-md-offset-2 text-center"
                                   id="changePicture" onclick="change()">
                                Change Picture
                                <input type="file" style="display: none;"  name="Image"
                                       accept="image/jpeg, image/x-png"
                                       onchange="document.getElementById('profile-img').style.display='block';
                            document.getElementById('profile-img').src = window.URL.createObjectURL(this.files[0])"
                                >
                            </label>
                            <button type="submit" name="UpdatePicture" id="updatePicture" class="btn btn-success col-md-offset-3"
                                    style="display: none;margin-top: 2px">Update</button>
                        @endif


                    </form>

                    <hr>
                    <p class="text-left" style="font-size: 20px"><strong>Name:</strong>{{$user->name}} </p>
                    <p class="text-left" style="font-size: 20px"><strong>Email:</strong>{{$user->email}} </p>
                    <p class="text-left" style="font-size: 20px"><strong>Location:</strong>{{$user->location}} </p>
                    <p class="text-left" style="font-size: 20px"><strong>Phone:</strong>{{$user->phone}} </p>
                    @if(auth()->user()->isChef())
                        <a href="{{ route('user.updateForm') }}" class="btn btn-info col-md-offset-2">Edit  Profile</a>

                    @endif

                    <hr>
                </div>

            </div>
        </div>

        <div class="panel col-xs-12 col-sm-6 col-md-6 col-lg-6" style="">
            <hr>

                @foreach($posts as $post)
                <a href="{{route('post.show',$post->id)}}" class="" style="text-decoration: none">
                    <div class="panel panel-info" style="background: antiquewhite;font-size: 25px">
                      <div style="margin-left: 7px; margin-right: 7px">
                          <p class="text-info">
                              <strong>Posted at:</strong>{{ $post->created_at }}
                              <strong style="margin-left: 18%">Quantity Left:</strong>{{  $post->order_left }}
                          </p>
                          <p style="color: black">{{$post->details }}</strong>  .</p>
                          <img src="{{asset('storage/'.$post->image)}}"  style="height:200px;width: 40%; margin-left: 200px">
                          <p class="text-center" style="color: orangered">Price: {{$post->price}}</p>

                          @if(auth()->user()->isChef())
                              <a href="{{route('post.edit',$post->id)}}" class="btn btn-success" style="margin-left:9%;width: 40%;font-size: 25px">Update Post</a>
                              <a href="#" class="btn btn-danger" style="margin: 5px;width: 40%;font-size: 25px">Delete Post</a>
                          @endif


                      </div>

                    </div>
                </a>
                @endforeach



        </div>

        <div class="card col-xs-12 col-sm-6  col-md-3 col-lg-3" >
            <div class="panel panel-info" style="background: #fff3cd;margin-right: 3%">
{{--                <a href="#" class="btn btn-lg col-md-offset-3" style="background: #1d3b58">Active Menu</a>--}}
                <hr>
                <p style="font-size: 20px"><strong >Order Complete: </strong>50</p>
                <p style="font-size: 20px"><strong >Member Since: </strong>{{$user->created_at}}</p>
                <br>
            </div>

            <div class="panel panel-info text-center" style="background: #fff3cd;margin-top: 10px;margin-right: 3%">
                <p class="" style="font-size: 20px"><strong>Special Items</strong></p>
                @foreach($items as $item)
                    <a href="{{route('chef.displaySpecialItem',$item->id)}}" ><p style="font-size: 20px;color: #1f6fb2">{{ $item->title }}</p></a>

                @endforeach
                @if(auth()->user()->isChef())
                    <a href="{{route('chef.specialItemForm')}}" class="btn btn-info" style="margin-bottom: 8px">Add Special Item</a>

                @endif
                <br>


            </div>

        </div>


    </div>



@endsection

@section('script')
    <script>
        function change() {

            var x = document.getElementById("changePicture");
            var y = document.getElementById("updatePicture");
            y.style.display = "block";
            // x.style.display = "none";

        }


    </script>

@endsection
