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
                <a id="postDiv" href="{{route('post.show',$post->id)}}" class="" style="text-decoration: none">
                    <div class="panel panel-info" style="background: antiquewhite;font-size: 25px">
                        <div style="">

                            <p class="text-info text-center">
                                <strong>Posted at:{{ $post->created_at }}</strong>
                            </p>
                            <p class="col-md-8" style="color: black">Item Name ::
                                <strong style="color: orangered">{{$post->item_name}}</strong>

                            </p>
                            <p class="col-md-4">
                                <strong style="color: black;"> Order Left::{{$post->order_left}}</strong>

                            </p>
                            <p class="col-md-12 btn btn-block btn-success" style="font-size: 30px" >
                                <strong id="timeLeft" style="color: black;"> Time Left::
                                </strong>
                                <span name="timeSpan"  id="c"></span>
                                <input type="hidden" name="leftTime" value="{{$post->ended_at}}">

                            </p>
                            <p class="col-md-12" style="color: black">Details :: {{$post->details }}</p>
                            <img id="postImg" src="{{asset('storage/'.$post->image)}}"  style="height:200px;width: 40%; margin-left: 190px">
                            <p class="text-center" style="color: orangered">Price: {{$post->price}}</p>
                        </div>

                        @if(auth()->user()->isUser())
                            <div  name="placeOrderLinkBtn">
                                <a  href="{{route('user.placeOrderForm',$post->id)}}" class="btn btn-block " style="background: orangered;color: white;font-size: 30px">Place Order</a>

                            </div>
                        @endif
                        @if(auth()->user()->isChef())
                            <form action="{{route('post.destroy',$post->id)}}" method="POST">
                                {{csrf_field()}}
                                @method('DELETE')
                                <a href="{{route('post.edit',$post->id)}}" class="btn btn-info" style="margin-left:9%;width: 40%;font-size: 25px">Update Post</a>

                                <input type="submit" value="Delete Post" class="btn btn-danger" style="margin: 5px;width: 40%;font-size: 25px" >

                            </form>
                        @endif
                    </div>
                </a>

                @endforeach



        </div>

        <div class="card col-xs-12 col-sm-6  col-md-3 col-lg-3" >
            <div class="panel panel-info" style="background: #fff3cd;margin-right: 3%">
{{--                <a href="#" class="btn btn-lg col-md-offset-3" style="background: #1d3b58">Active Menu</a>--}}
                <hr>
                <p style="font-size: 20px"><strong >Order Complete: </strong>{{$orderCount}}</p>
                <p style="font-size: 20px"><strong >Member Since: </strong>{{$d}}</p>
                <br>
            </div>

            <div class="panel panel-info text-center" style="background: #fff3cd;margin-top: 10px;margin-right: 3%">
                <p class="" style="font-size: 20px"><strong>Special Items</strong></p>
                @foreach($items as $item)
{{--                    <a href="{{route('chef.displaySpecialItem',$item->id)}}" ><p style="font-size: 20px;color: #1f6fb2">{{ $item->title }}</p></a>--}}
                    <a href="" ><p style="font-size: 20px;color: #1f6fb2">{{ $item->title }}</p></a>

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

        function refresh() {
            var d = new Date();
            var date = d.getDate();
            var hour = d.getHours();
            var min = d.getMinutes();
            var sec = d.getSeconds();

            var timeSpans= document.getElementsByName('timeSpan');
            var leftTimes= document.getElementsByName('leftTime');
            var placeOrderLinkBtn= document.getElementsByName('placeOrderLinkBtn');


            for(var i=0; i<timeSpans.length;i++){
                var lmin= parseInt(leftTimes[i].value.substring(14, 16));
                var lday= parseInt(leftTimes[i].value.substring(8, 10));
                var lhour= parseInt(leftTimes[i].value.substring(11, 13));
                var lsec= parseInt(leftTimes[i].value.substring(17, 19));
                if(parseInt(d.getMinutes())>=parseInt(leftTimes[i].value.substring(14, 16)))
                {
                    lmin=lmin+60;
                    lhour=parseInt(leftTimes[i].value.substring(11, 13))-1;
                }
                if(parseInt(d.getMinutes())< parseInt(leftTimes[i].value.substring(14, 16))){
                    lmin= parseInt(leftTimes[i].value.substring(14, 16));
                }
                if(parseInt(d.getHours())>lhour)
                {
                    lday=lday-1;
                    lhour=lhour+24;
                }
                // if(parseInt(d.getHours())< parseInt(leftTimes[i].value.substring(11, 13))){
                //     lhour= parseInt(leftTimes[i].value.substring(11, 13));
                // }

                var y2=(lday-d.getDate())+' days  '+(lhour-d.getHours())
                    +' hours '+((lmin-d.getMinutes())-1)+' mins '+(60-d.getSeconds())+" secs ";
                timeSpans[i].innerHTML=y2;

                var cday=parseInt(leftTimes[i].value.substring(8, 10))-d.getDate();
                var chour=parseInt(leftTimes[i].value.substring(11, 13))-d.getHours();
                var cmin=parseInt(leftTimes[i].value.substring(14, 16))-d.getMinutes();

                if(cday<=0 && chour<=0 && cmin<=0)
                {
                    timeSpans[i].innerHTML="Order Closed";
                    document.getElementById('timeLeft').innerText="";
                    placeOrderLinkBtn[i].style.display='none';
                }
            }

            setTimeout(refresh, 1000);
        }

        refresh();

    </script>

@endsection
