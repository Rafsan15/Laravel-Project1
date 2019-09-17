@extends('Partials.master')
@section('content')

    <div class="row " style="color: black; ">

        <div class="col-md-3 col-lg-3"></div>

        <div class="panel col-xs-12 col-sm-6 col-md-6 col-lg-6" style="">
            <div class="panel panel-info" style="background: antiquewhite;font-size: 25px">
                <p class="text-center">
                    <a href="{{route('chef.show',$post->user_id)}}" class="col-md-12" style="text-decoration: none">
                        <strong>Posted By :{{$post->chef_name}}</strong>
                    </a>
                </p>

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
            </div>
        </div>

        <div class="col-md-3 col-lg-3">
            <div class="">
                @if(auth()->user()->isUser())
                    <a id="placeOrderlink" href="{{route('user.placeOrderForm',$post->id)}}" class="btn btn-lg col-md-offset-3" style="background: orangered;color: white;font-size: 30px">Place Order</a>
                @endif
                @if(auth()->user()->isChef())

                        <form action="{{route('post.destroy',$post->id)}}" method="POST">
                            {{csrf_field()}}
                            @method('DELETE')
                            <a href="{{ route('order.orderList',$post->id) }}" class="btn btn-lg col-md-offset-3" style="width: 200px;background: orangered;color: white;font-size: 30px;margin-top: 2px">Order List</a>
                            <a href="{{route('post.edit',$post->id)}}" class="btn btn-lg btn-success col-md-offset-3" style="width: 200px;color: white;font-size: 30px;margin-top: 2px">Edit Post</a>
                            <input type="submit" value="Delete Post" class="btn btn-lg col-md-offset-3 btn-danger" style="width: 200px;color: white;font-size: 30px;margin-top: 2px" >

                        </form>
                    @endif
                 <br>
            </div>
        </div>



    </div>



@endsection

@section('script')
    <script>
        function refresh() {
            var d = new Date();
            var date = d.getDate();
            var hour = d.getHours();
            var min = d.getMinutes();
            var sec = d.getSeconds();

            var timeSpans= document.getElementsByName('timeSpan');
            var leftTimes= document.getElementsByName('leftTime');


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
                    document.getElementById('placeOrderlink').style.display='none';
                }

            }

            setTimeout(refresh, 1000);
        }

        refresh();

    </script>

@endsection
