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
                        @if(auth()->user()->isUser())
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
                    @if(auth()->user()->isUser())
                        <a href="{{ route('user.updateForm') }}" class="btn btn-info col-md-offset-2">Edit  Profile</a>

                    @endif

                    <hr>
                </div>

            </div>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="">
            <div class="panel panel-info">
                <h1 class="text-center">Order History</h1>
                <table class="table table-striped table-hover ">
                    <thead>
                    <tr class="text-center">
                        <th class="text-center">Order Time</th>
                        <th class="text-center">Quantity</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">View</th>
                        <th class="text-center">Deliver</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr class="info text-center">
                            <td>{{$order->created_at}}</td>
                            <td>{{$order->quantity}}</td>
                            <td>{{$order->price}}</td>
                            <td>
                                @if($order->deliver==true)
                                    <a href="{{route('post.show',array($order->post_id))}}" class="btn btn-success">View</a>

                                @else
                                    <a href="{{route('post.show',array($order->post_id))}}" class="btn btn-primary">View</a>
                                @endif
                            </td>
                            <td>
                                @if($order->deliver==true)
                                    <strong class="text-success">Yes</strong>
                                    @else
                                    <strong class="text-danger">No</strong>
                                    @endif
                            </td>

                        </tr>
                    @endforeach

                    </tbody>
                </table>
                <ul class="pagination" style="margin-left: 60%">
                    {{$orders->links()}}
                </ul>


            </div>

        </div>

        <div class="card col-xs-12 col-sm-6  col-md-3 col-lg-3" >
            <div class="panel panel-info" style="background: #fff3cd;margin-right: 3%">
                {{--                <a href="#" class="btn btn-lg col-md-offset-3" style="background: #1d3b58">Active Menu</a>--}}
                <hr>
                <p style="font-size: 20px"><strong >Order Received: </strong>{{$orderCount}}</p>
                <p style="font-size: 20px"><strong >Member Since: </strong>{{$d}}</p>
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
