@extends('Partials.master')
@section('content')

    <div class="row " style="color: black; ">

        <div class="col-md-1 col-lg-1"></div>

        <div class="card col-xs-12 col-sm-6  col-md-3 col-lg-3" style="" >
{{--            <div class="" style="background: #fff3cd;">--}}
{{--                --}}{{--                <a href="#" class="btn btn-lg col-md-offset-3" style="background: #1d3b58">Active Menu</a>--}}
{{--                <hr>--}}
{{--                <p style="font-size: 20px"><strong >Ratings: </strong>80% <small style="font-size: 15px">(180)</small></p>--}}
{{--                <p style="font-size: 20px"><strong >Order Complete: </strong>50</p>--}}
{{--                <p style="font-size: 20px"><strong >Member Since: </strong>05 Sept 2019</p>--}}
{{--                <br>--}}
{{--            </div>--}}

{{--            <div class="text-center" style="background: #fff3cd;margin-top: 10px">--}}
{{--                <p class="" style="font-size: 20px"><strong>Special For</strong></p>--}}
{{--                <a href="#" ><p style="font-size: 20px;color: #1f6fb2">Polao</p></a>--}}
{{--                <a href="#" ><p style="font-size: 20px;color: #1f6fb2">Kacchhi Reza</p></a>--}}

{{--            </div>--}}

        </div>

        <div class="panel col-xs-12 col-sm-6 col-md-6 col-lg-6" style="">

            @foreach($posts as $post)
                @if(($post->order_left)!=0)
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

                @endif
            @endforeach



        </div>

        <div class="col-md-2 col-lg-2"></div>



    </div>



@endsection

@section('script')
    <script>

    </script>

@endsection
