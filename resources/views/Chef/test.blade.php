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

                    </form>

                    <hr>
                    <p class="text-left" style="font-size: 20px"><strong>Name:</strong>{{$user->name}} </p>
                    <p class="text-left" style="font-size: 20px"><strong>Email:</strong>{{$user->email}} </p>
                    <p class="text-left" style="font-size: 20px"><strong>Location:</strong>{{$user->location}} </p>
                    <p class="text-left" style="font-size: 20px"><strong>Phone:</strong>{{$user->phone}} </p>
                    <a href="{{ route('user.updateForm') }}" class="btn btn-info col-md-offset-2">Edit  Profile</a>
                    <hr>
                </div>

            </div>
        </div>

        <div class="panel col-xs-12 col-sm-6 col-md-6 col-lg-6" style="">
            <ul class="nav nav-pills col-md-offset-4">
                <li class="active "style="font-size: 25px"><a href="#" >Subscribe <span class="badge">42</span></a></li>

            </ul>
            <hr>
            @foreach($posts as $post)
                <div class="panel panel-info" style="background: antiquewhite;font-size: 25px">
                    <p style="font-size: 25px"><strong>Posted at:</strong>{{ $post->created_at }}</p>
                    <p>{{$post->details }}</strong>  .</p>
                    <img src="{{asset('storage/'.$post->image)}}"  style="height:200px;width: 40% ">
                    <p>Price: {{$post->price}}</p>

                </div>
            @endforeach

        </div>
        <div class="card col-xs-12 col-sm-6  col-md-3 col-lg-3" style="background: #fff3cd;">
            <a href="#" class="btn btn-lg col-md-offset-3" style="background: #1d3b58">Active Menu</a>
            <p style="font-size: 20px"><strong >Ratings: </strong>80% <small style="font-size: 15px">(180)</small></p>
            <p style="font-size: 20px"><strong >Order Complete: </strong>50</p>
            <p style="font-size: 20px"><strong >Member Since: </strong>05 Sept 2019</p>
            <div class="text-center">
                <p class="" style="font-size: 20px"><strong>Special For</strong></p>
                <a href="#" ><p style="font-size: 20px;color: #1f6fb2">Polao</p></a>
                <a href="#" ><p style="font-size: 20px;color: #1f6fb2">Kacchhi Reza</p></a>

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
