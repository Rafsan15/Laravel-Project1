@extends('Partials.master')
@section('content')

    <div class="row " style="color: black; ">

        <div class="col-md-3 col-lg-3"></div>

        <div class="panel col-xs-12 col-sm-6 col-md-6 col-lg-6" style="">
            <div class="panel panel-info" style="background: antiquewhite;font-size: 25px">
                <div style="margin-left: 7px; margin-right: 7px">
                    <p class="">
                        <a href="{{route('chef.show',$id)}}" class="col-md-7" style="text-decoration: none"><strong class=" ">{{$name}}</strong>
                        </a>
                        <strong class="col-md-5 text-info">Quantity Left :{{$post->order_left}}</strong>
                    </p>

                    <p style="color: black">{{$post->details }}</strong>  .</p>
                    <img src="{{asset('storage/'.$post->image)}}"  style="height:200px;width: 40%; margin-left: 200px">
                    <p class="text-center" style="color: orangered">Price: {{$post->price}}</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-lg-3">
            <div class="">
                @if(auth()->user()->isUser())
                    <a href="{{route('user.placeOrderForm',$post->id)}}" class="btn btn-lg col-md-offset-3" style="background: orangered;color: white;font-size: 30px">Place Order</a>
                @endif
                @if(auth()->user()->isChef())
                        <a href="{{ route('order.orderList',$post->id) }}" class="btn btn-lg col-md-offset-3" style="width: 200px;background: orangered;color: white;font-size: 30px;margin-top: 2px">Order List</a>
                        <a href="{{route('post.edit',$post->id)}}" class="btn btn-lg btn-success col-md-offset-3" style="width: 200px;color: white;font-size: 30px;margin-top: 2px">Edit Post</a>
                        <a href="" class="btn btn-lg btn-danger col-md-offset-3" style="width: 200px;color: white;font-size: 30px;margin-top: 2px">Delete Post</a>

                    @endif
                 <br>
            </div>
        </div>



    </div>



@endsection

@section('script')
    <script>

    </script>

@endsection
