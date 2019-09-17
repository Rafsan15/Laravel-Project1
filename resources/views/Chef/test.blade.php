@extends('Partials.master')
@section('content')

<div id="" class="row">
    <div class="col-md-3"></div>
<div id="showPostDiv"  class="panel  col-md-6" style="">

        @foreach($posts as $post)
            @if(($post->order_left)!=0)
                <div class="panel panel-info" style="background: antiquewhite;font-size: 25px;">
                    <p class="text-center">
                        <a href="{{route('chef.show',$post->user_id)}}" class="col-md-12" style="text-decoration: none">
                            <strong>Posted By :{{$post->chef_name}}</strong>
                        </a>
                    </p>

                    <a href="{{route('post.show',$post->id)}}" class="" style="text-decoration: none">

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
                                <input type="hidden" name="leftTime"value="{{$post->ended_at}}">

                            </p>
                            <p class="col-md-12" style="color: black">Details :: {{$post->details }}</p>
                            <img id="postImg" src="{{asset('storage/'.$post->image)}}"  style="height:200px;width: 40%; margin-left: 190px">
                            <p class="text-center" style="color: orangered">Price: {{$post->price}}</p>
                        </div>
                        <div>
                            <a href="{{route('user.placeOrderForm',$post->id)}}" class="btn btn-block " style="background: orangered;color: white;font-size: 30px">Place Order</a>

                        </div>
                    </a>

                </div>

            @endif
        @endforeach
        <ul id="postPaginateId" class="pagination" style="margin-left: 60%">
            {{$posts->links()}}
        </ul>

    </div>
<div class="col-md-3"></div>
</div>



@endsection

@section('script')
<script>

    //     setInterval(function () {
    //         $('#showPostDiv').load('#showPostDiv');
    // }, 1000);
    function refresh() {
        var d = new Date();
        var date = d.getDate();
        var hour = d.getHours();
        var min = d.getMinutes();
        var sec = d.getSeconds();


     //   document.getElementById('c').innerText=hour+":"+min+":"+sec;
       var timeSpans= document.getElementsByName('timeSpan');
       var leftTimes= document.getElementsByName('leftTime');
       // var diff = Math.abs(d - leftTimes[0].value);
//var y=(d.getDate() - 10 )+' '+(d.getHours() - 5 );
          //alert(diff);
        var lday= parseInt(leftTimes[0].value.substring(8, 10));
        var lhour= parseInt(leftTimes[2].value.substring(11, 13));
        var lmin= parseInt(leftTimes[0].value.substring(14, 16));
        var m=parseInt(d.getMinutes());
        // if(lmin==0)
        // {
        //     m=60-d.getMinutes();
        // }

      //  alert(days+' '+hours+" "+minutes+" "+secs);
      //  alert(lday-10);
       //alert(d.getHours());
      // alert(m);
       //alert(m+10);
       for(var i=0; i<timeSpans.length;i++){
           //timeSpans[i].innerHTML=hour+":"+min+":"+sec;
           var lmin= parseInt(leftTimes[i].value.substring(14, 16));
           var lday= parseInt(leftTimes[i].value.substring(8, 10));
           var lhour= parseInt(leftTimes[i].value.substring(11, 13));
           var lsec= parseInt(leftTimes[i].value.substring(17, 19));
           if(parseInt(d.getMinutes())>lmin)
           {
               lmin=lmin+60;
           }
           if(parseInt(d.getMinutes())< parseInt(leftTimes[i].value.substring(14, 16))){
               lmin= parseInt(leftTimes[i].value.substring(14, 16));
           }
           if(parseInt(d.getHours())>lhour)
           {
               lhour=lhour+24;
           }
           if(parseInt(d.getHours())< parseInt(leftTimes[i].value.substring(11, 13))){
               lmin= parseInt(leftTimes[i].value.substring(11, 13));
           }

         //  var x=60-lmin;
           //lmin= lmin+x;
         //  if(lmin==0)
           var y=(d.getDate() - lday )+'days  '+(d.getHours() - lhour)
               +' hours'+(d.getMinutes() - lmin)+'mins'+(d.getSeconds() - lsec)+"secs";
           var y2=(lday-d.getDate())+' days  '+(lhour-d.getHours())
               +' hours '+(lmin-d.getMinutes())+' mins '+(60-d.getSeconds())+" secs ";
           timeSpans[i].innerHTML=y2;

       }

        setTimeout(refresh, 1000);
    }

    refresh();

</script>
@endsection
