@extends('Partials.master')
@section('content')
    <div class="row">
        <div class="panel col-xs-12 col-sm-6 col-md-5 col-lg-5" style="margin-left: 2%">

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
                    <p class="col-md-7" style="color: black">Item Name ::
                        <strong style="color: orangered">{{$post->item_name}}</strong>

                    </p>
                    <p class="col-md-5">
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
                </div>            </div>



        </div>

        <div class="panel panel-info col-md-6" style="background: #c9e2b3">
            <h1 class="text-center">Place Order</h1>
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
            <form class="form-horizontal" action="{{route('order.store',$post->id)}}" method="post" style="color: black">
                <fieldset>
                    {{ csrf_field() }}
                    <input type="hidden" name="Post_Id" value="{{$post->id}}">
                    <div class="form-group" >
                        <label for="quantity" class="col-lg-3 control-label">Quantity</label>
                        <div class="col-lg-9">
                            <input type="hidden" id="orderLeft" value="{{$post->order_left}}">
                            <input type="number" class="form-control" name="Quantity" id="quantity" onchange="orderCheck()" placeholder="Quantity">
                            <span id="quantityCheckSpan" style="color: #e8491d"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="price" class="col-lg-3 control-label">Estimated Price</label>
                        <div class="col-lg-9">
                            <input type="hidden" id="orderPrice" value="{{$post->price}}">
                            <input type="text" class="form-control" readonly name="Price" id="price" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address" class="col-lg-3 control-label">Address</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="Address" id="address" placeholder="Address">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone" class="col-lg-3 control-label">Phone</label>
                        <div class="col-lg-9">
                            <input type="number" class="form-control" name="Phone" id="phone" placeholder="Phone">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class=" col-lg-offset-9">
                            <button type="reset" class="btn btn-default">Cancel</button>
                            <button type="submit" id="placeOrderBtn" name="LogIn" class="btn btn-primary">Place Order</button>
                        </div>
                    </div>
                </fieldset>
            </form>

        </div>
        <div class="col-md-1"></div>
    </div>


@endsection

@section('script')
    <script>
        function orderCheck() {
            var x =document.getElementById('orderLeft').value;
            var y =document.getElementById('quantity').value;
            var p =document.getElementById('price');
            var z =document.getElementById('orderPrice').value;
            var res=x-y;
            var total=y*z;
            if(res<0)
            {
                document.getElementById("quantityCheckSpan").innerHTML="Please order valid quantity" +
                    ".Maximum quantity left:"+x;
                document.getElementById("placeOrderBtn").disabled=true;
                p.value=0;

            }
            else {
                document.getElementById("quantityCheckSpan").innerHTML="";
                document.getElementById("placeOrderBtn").disabled=false;
                p.value=total;

            }

        }

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
                    document.getElementById("placeOrderBtn").disabled=true;

                }

            }

            setTimeout(refresh, 1000);
        }

        refresh();

    </script>
@endsection
