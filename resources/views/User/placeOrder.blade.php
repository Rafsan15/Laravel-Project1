@extends('Partials.master')
@section('content')
    <div class="row">
        <div class="panel col-xs-12 col-sm-6 col-md-5 col-lg-5" style="margin-left: 2%">

            <div class="panel panel-info" style="background: antiquewhite;font-size: 25px">
                <div style="margin-left: 7px; margin-right: 7px">
                    <p class="">
                        <a href="{{route('chef.show',$id)}}" class="col-md-7" style="text-decoration: none"><strong class=" ">{{$name}}</strong>
                        </a>
                        <strong class="col-md-5 text-info">Quantity Left :{{$post->order_left}}</strong>
                    </p>

                    <p style="color: black">{{$post->details }}</strong>  .</p>
                    <img src="{{asset('storage/'.$post->image)}}"  style="height:200px;width: 40%; margin-left: 180px">
                    <p class="text-center" style="color: orangered">Price: {{$post->price}}</p>
                </div>
            </div>



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
    </script>
@endsection
