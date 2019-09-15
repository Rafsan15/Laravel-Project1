@extends('Partials.master')
@section('content')
    <div class="row">
        <div class="panel col-xs-12 col-sm-6 col-md-5 col-lg-5" style="margin-left: 2%">
            <div class="panel panel-info" style="background: antiquewhite;font-size: 25px">
                <div >
                    <p class="">
                        <a href="{{route('chef.show',$id)}}" class="col-md-10" style="text-decoration: none"><strong class=" ">{{$name}}</strong>
                        </a>
                        <div class="col-md-2">

                        <input type="hidden" id="totalReact" value="{{$item->react }}">
                        <input type="hidden" id="imageReact" value="{{asset('img/star2.jpg')}}">
                            <span  class="label label-success">
                                 <img onclick="reactHandel()" class="" id="reactPic" style="width: 30px;height: 25px ;"
                                      src="{{asset('img/star.jpg')}}" >
                                <strong id="reactCounter">{{$item->react }}</strong>

                            </span>
                        </div>


                    </p>
                    <strong style="margin-left: 7px; margin-right: 7px" class="text-info">Title:{{ $item->title }}</strong>


                    <p style="color: black;margin-left: 7px; margin-right: 7px">Description: {{$item->details }}</strong>  .</p>
                    <img src="{{asset('storage/'.$item->image)}}"  style="height:200px;width: 40%; margin-left: 180px;margin-bottom: 5px">
                </div>
            </div>

        </div>

        <div class="panel col-xs-12 col-sm-6 col-md-6 col-lg-6" style="font-size: 25px;">
            <form class="form-horizontal" action="{{route('user.storeComment')}}" method="POST" style="background: whitesmoke">
                {{csrf_field()}}
                <input type="hidden" name="ItemId" value="{{$item->id}}">
                <div class="form-group" >
                    <div class="col-md-7" style="">
                        <textarea class="form-control" name="Comment" rows="3" id="textArea" placeholder="Add Comment"></textarea>
                    </div>
                    <div class="col-md-4" style="margin-right: 1%">
                        <input type="submit" class="btn btn-info" style="font-size: 25px;width: 100%" value="Comment" >
                    </div>
                </div>
            </form>

            @foreach($comments as $comment)
                <div class="panel panel-info" style="background: whitesmoke;margin-top: 10px">
                    <div class="panel-heading text-center" style="background: whitesmoke">
                        <p class="panel-title" style="color: black">{{$comment->comment_by}}
                            <a href="#" class="btn btn-success btn-sm justify-content-end">Small button</a>
                        </p>


                    </div>
                    <div class="panel-body">
                        {{$comment->comment}}
                    </div>
                </div>
            @endforeach



        </div>

        <div class="col-md-1"></div>

    </div>


@endsection

@section('script')
    <script>
        function reactHandel() {

            var x=document.getElementById('totalReact').value;
            var y=document.getElementById('imageReact').value;
            x=x+1;
           document.getElementById('reactCounter').innerHTML=x;
           document.getElementById('reactPic').src=y;


        }
    </script>
    @endsection
