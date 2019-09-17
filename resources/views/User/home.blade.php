@extends('Partials.master')
@section('content')


    <div id="showPostDivroot" class="row " style="color: black; ">

        <div id="showPostDiv0" class="card col-xs-12 col-sm-6  col-md-4 col-lg-4" style="" >
            <div class="panel panel-info" style="margin: 10px">

                <br>
                <form class="form-horizontal">

                    <div class="form-group">
                        <div class="col-md-8">
                            <input style="" type="text" id="searchTags" readonly  class="form-control" placeholder="Filters">

                        </div>
                        <div class="col-md-4">
                            <input type="button" onclick="clearFilters()"  style="width: 123%;margin-left: -30px" class="btn btn-default btn-success " value="Clear">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="select" class="col-lg-4 control-label">Category</label>
                        <div class="col-lg-8" >
                            <select  class="form-control" id="selectCategory" onchange="showItems()" style="margin-right: 5px">
                                <option>Select A Category</option>
                                <option value="Breakfast">Breakfast</option>
                                <option value="Lunch">Lunch</option>
                                <option value="Dinner">Dinner</option>
                                <option value="Snacks">Snacks</option>
                          </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="select" class="col-lg-4 control-label">Looking For</label>
                        <div class="col-lg-8" >
                            <select  class="form-control" id="selectItem" style="margin-right: 5px" onchange="filterTags()">
                            </select>
                        </div>
                    </div>
                </form>
            </div>

        </div>

        <div id="showPostDiv" class="panel col-xs-12 col-sm-6 col-md-6 col-lg-6" style="">

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
                                    <input type="hidden" name="leftTime" value="{{$post->ended_at}}">

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

        <div class="col-md-2 col-lg-2"></div>



    </div>
<input type="hidden" name="itemname" id="item" value="{{$itemNames}}">
<input type="hidden" name="foodpost" id="post" value="{{$foodPosts}}">
@endsection

@section('script')
    <script>
        var items = JSON.parse(document.getElementById('item').value);
        var posts = JSON.parse(document.getElementById('post').value);

        function showItems() {

            var category=document.getElementById('selectCategory').value;
            var selectitem=document.getElementById('selectItem');

            selectitem.innerHTML="";
            var option1 = document.createElement("option");
            option1.text = "Select an item";
            selectitem.add(option1);
            items.forEach(function(item) {
                if(item.menu_for==category)
                {
                    var option = document.createElement("option");
                    option = document.createElement("option");
                    option.text = item.item_name;
                    option.value = item.item_name;
                    selectitem.add(option);
                }
            });
            var searchTags=document.getElementById('searchTags');
            searchTags.value="";
            searchTags.value=category+" -> ";

            var showPostDiv= document.getElementById('showPostDiv');

            var postPaginateId= document.getElementById('postPaginateId');
            showPostDiv.innerHTML="";

            //postPaginateId.innerHTML="";
            // alert('finish');


            posts.forEach(function(post) {
                // alert(post.menu_for +"  "+post.item_name);
                if(post.menu_for==category)
                {

                    var panelInfoDiv=document.createElement('div');
                    panelInfoDiv.setAttribute("class", "panel panel-info");
                    panelInfoDiv.setAttribute("style", "background: antiquewhite;font-size: 25px;");

                    var pTag1=document.createElement('p');
                    pTag1.setAttribute("class", "text-center");

                    var aTag1=document.createElement('a');
                    aTag1.setAttribute("class", "col-md-12");
                    aTag1.setAttribute("style", "text-decoration: none");
                    aTag1.href="/chef/"+post.user_id;

                    var strong1=document.createElement('strong');
                    strong1.innerHTML="Posted By :"+post.chef_name;

                    var aTag2=document.createElement('a');
                    aTag2.setAttribute("style", "text-decoration: none");
                    aTag2.href="/post/"+post.id;

                    var lastDiv=document.createElement('Div');
                    lastDiv.setAttribute("style", "margin-left: 7px; margin-right: 7px");

                    var pTag2=document.createElement('p');
                    pTag2.setAttribute("class", "text-info text-center");

                    var strong2=document.createElement('strong');
                    strong2.innerHTML="Posted at:"+post.created_at;

                    var pTag3=document.createElement('p');
                    pTag3.setAttribute("style", "color: black");
                    pTag3.setAttribute("class", "col-md-12");
                    pTag3.innerHTML="Details :: "+post.details;

                    var postImg=document.createElement('img');
                    postImg.src="/storage/"+post.image;
                    postImg.setAttribute("style", "height:200px;width: 40%; margin-left: 190px");

                    var pTag4=document.createElement('p');
                    pTag4.setAttribute("class", "text-center");
                    pTag4.setAttribute("style", "color: orangered");
                    pTag4.innerHTML="Price:"+post.price;

                    var pTag5=document.createElement('p');
                    pTag5.setAttribute("class", "col-md-8");
                    pTag5.setAttribute("style", "color: black");
                    pTag5.innerHTML="Item Name ::";

                    var strong3=document.createElement('strong');
                    strong3.setAttribute("style", "color: orangered");
                    strong3.innerHTML=post.item_name;

                    var pTag6=document.createElement('p');
                    pTag6.setAttribute("class", "col-md-4");

                    var strong4=document.createElement('strong');
                    strong4.setAttribute("style", "color: black");
                    strong4.innerHTML="Order Left::"+post.order_left;

                    var btnDiv=document.createElement('div');

                    var aTag3=document.createElement('a');
                    aTag3.setAttribute("class", "btn btn-block ");
                    aTag3.setAttribute("style", "background: orangered;color: white;font-size: 30px");
                    aTag3.innerHTML="Place Order"
                    aTag3.href="/placeOrder/"+post.id;

                    var pTag7=document.createElement('p');
                    pTag7.setAttribute("class", "col-md-12 btn btn-block btn-success");
                    pTag7.setAttribute("style", "font-size: 30px");

                    var strong5=document.createElement('strong');
                    strong5.setAttribute("style", "color: black;");
                    strong5.innerHTML="Time Left::";

                    var span1=document.createElement('span');
                    span1.setAttribute("name", "timeSpan");

                    var hidden1=document.createElement('hidden');
                    hidden1.setAttribute("name", "leftTime");
                    hidden1.value=post.ended_at;


                    var paginate=document.createElement('ul');
                    paginate.setAttribute("class", "pagination");
                    paginate.setAttribute("style", "margin-left: 60%");

                    aTag1.appendChild(strong1);
                    pTag1.appendChild(aTag1);
                    btnDiv.appendChild(aTag3);

                    pTag2.appendChild(strong2);
                    pTag5.appendChild(strong3);
                    pTag6.appendChild(strong4);

                    pTag7.appendChild(strong5);
                    pTag7.appendChild(span1);
                    pTag7.appendChild(hidden1);


                    lastDiv.appendChild(pTag2);
                    lastDiv.appendChild(pTag5);
                    lastDiv.appendChild(pTag6);
                    lastDiv.appendChild(pTag7);
                    lastDiv.appendChild(pTag3);
                    lastDiv.appendChild(postImg);
                    lastDiv.appendChild(pTag4);

                    aTag2.appendChild(lastDiv);
                    aTag2.appendChild(btnDiv);


                    panelInfoDiv.appendChild(pTag1);
                    panelInfoDiv.appendChild(aTag2);
                    showPostDiv.appendChild(panelInfoDiv);
                    //showPostDiv.appendChild(paginate);
                }
            });

        }

        function filterTags() {
            var category=document.getElementById('selectCategory').value;
            var selectitem=document.getElementById('selectItem').value;

            var searchTags=document.getElementById('searchTags');
            searchTags.value="";
            searchTags.value=category+" -> "+selectitem;

            var showPostDiv= document.getElementById('showPostDiv');

            var postPaginateId= document.getElementById('postPaginateId');
            showPostDiv.innerHTML="";

            //postPaginateId.innerHTML="";
            // alert('finish');


            posts.forEach(function(post) {
                // alert(post.menu_for +"  "+post.item_name);
                if(post.menu_for==category && post.item_name==selectitem )
                {

                    var panelInfoDiv=document.createElement('div');
                    panelInfoDiv.setAttribute("class", "panel panel-info");
                    panelInfoDiv.setAttribute("style", "background: antiquewhite;font-size: 25px;");

                    var pTag1=document.createElement('p');
                    pTag1.setAttribute("class", "text-center");

                    var aTag1=document.createElement('a');
                    aTag1.setAttribute("class", "col-md-12");
                    aTag1.setAttribute("style", "text-decoration: none");
                    aTag1.href="/chef/"+post.user_id;

                    var strong1=document.createElement('strong');
                    strong1.innerHTML="Posted By :"+post.chef_name;

                    var aTag2=document.createElement('a');
                    aTag2.setAttribute("style", "text-decoration: none");
                    aTag2.href="/post/"+post.id;

                    var lastDiv=document.createElement('Div');
                    lastDiv.setAttribute("style", "margin-left: 7px; margin-right: 7px");

                    var pTag2=document.createElement('p');
                    pTag2.setAttribute("class", "text-info text-center");

                    var strong2=document.createElement('strong');
                    strong2.innerHTML="Posted at:"+post.created_at;

                    var pTag3=document.createElement('p');
                    pTag3.setAttribute("style", "color: black");
                    pTag3.setAttribute("class", "col-md-12");
                    pTag3.innerHTML="Details :: "+post.details;

                    var postImg=document.createElement('img');
                    postImg.src="/storage/"+post.image;
                    postImg.setAttribute("style", "height:200px;width: 40%; margin-left: 190px");

                    var pTag4=document.createElement('p');
                    pTag4.setAttribute("class", "text-center");
                    pTag4.setAttribute("style", "color: orangered");
                    pTag4.innerHTML="Price:"+post.price;

                    var pTag5=document.createElement('p');
                    pTag5.setAttribute("class", "col-md-8");
                    pTag5.setAttribute("style", "color: black");
                    pTag5.innerHTML="Item Name ::";

                    var strong3=document.createElement('strong');
                    strong3.setAttribute("style", "color: orangered");
                    strong3.innerHTML=post.item_name;

                    var pTag6=document.createElement('p');
                    pTag6.setAttribute("class", "col-md-4");

                    var strong4=document.createElement('strong');
                    strong4.setAttribute("style", "color: black");
                    strong4.innerHTML="Order Left::"+post.order_left;

                    var btnDiv=document.createElement('div');

                    var aTag3=document.createElement('a');
                    aTag3.setAttribute("class", "btn btn-block ");
                    aTag3.setAttribute("style", "background: orangered;color: white;font-size: 30px");
                    aTag3.innerHTML="Place Order"
                    aTag3.href="/placeOrder/"+post.id;

                    var pTag7=document.createElement('p');
                    pTag7.setAttribute("class", "col-md-12 btn btn-block btn-success");
                    pTag7.setAttribute("style", "font-size: 30px");

                    var strong5=document.createElement('strong');
                    strong5.setAttribute("style", "color: black;");
                    strong5.innerHTML="Time Left::";

                    var span1=document.createElement('span');
                    span1.setAttribute("name", "timeSpan");

                    var hidden1=document.createElement('hidden');
                    hidden1.setAttribute("name", "leftTime");
                    hidden1.value=post.ended_at;


                    var paginate=document.createElement('ul');
                    paginate.setAttribute("class", "pagination");
                    paginate.setAttribute("style", "margin-left: 60%");

                    aTag1.appendChild(strong1);
                    pTag1.appendChild(aTag1);
                    btnDiv.appendChild(aTag3);

                    pTag2.appendChild(strong2);
                    pTag5.appendChild(strong3);
                    pTag6.appendChild(strong4);

                    pTag7.appendChild(strong5);
                    pTag7.appendChild(span1);
                    pTag7.appendChild(hidden1);


                    lastDiv.appendChild(pTag2);
                    lastDiv.appendChild(pTag5);
                    lastDiv.appendChild(pTag6);
                    lastDiv.appendChild(pTag7);
                    lastDiv.appendChild(pTag3);
                    lastDiv.appendChild(postImg);
                    lastDiv.appendChild(pTag4);

                    aTag2.appendChild(lastDiv);
                    aTag2.appendChild(btnDiv);


                    panelInfoDiv.appendChild(pTag1);
                    panelInfoDiv.appendChild(aTag2);
                    showPostDiv.appendChild(panelInfoDiv);
                    //showPostDiv.appendChild(paginate);
                }
            });


        }

        function clearFilters() {
            // document.getElementById('selectCategory').innerText="";
            document.getElementById('selectItem').innerText="";

            var searchTags=document.getElementById('searchTags');
            searchTags.value="";

            var showPostDiv= document.getElementById('showPostDiv');

            showPostDiv.innerHTML="";

            //postPaginateId.innerHTML="";
            // alert('finish');


            posts.forEach(function(post) {
                var panelInfoDiv=document.createElement('div');
                panelInfoDiv.setAttribute("class", "panel panel-info");
                panelInfoDiv.setAttribute("style", "background: antiquewhite;font-size: 25px;");

                var pTag1=document.createElement('p');
                pTag1.setAttribute("class", "text-center");

                var aTag1=document.createElement('a');
                aTag1.setAttribute("class", "col-md-12");
                aTag1.setAttribute("style", "text-decoration: none");
                aTag1.href="/chef/"+post.user_id;

                var strong1=document.createElement('strong');
                strong1.innerHTML="Posted By :"+post.chef_name;

                var aTag2=document.createElement('a');
                aTag2.setAttribute("style", "text-decoration: none");
                aTag2.href="/post/"+post.id;

                var lastDiv=document.createElement('Div');
                lastDiv.setAttribute("style", "margin-left: 7px; margin-right: 7px");

                var pTag2=document.createElement('p');
                pTag2.setAttribute("class", "text-info text-center");

                var strong2=document.createElement('strong');
                strong2.innerHTML="Posted at:"+post.created_at;

                var pTag3=document.createElement('p');
                pTag3.setAttribute("style", "color: black");
                pTag3.setAttribute("class", "col-md-12");
                pTag3.innerHTML="Details :: "+post.details;

                var postImg=document.createElement('img');
                postImg.src="/storage/"+post.image;
                postImg.setAttribute("style", "height:200px;width: 40%; margin-left: 190px");

                var pTag4=document.createElement('p');
                pTag4.setAttribute("class", "text-center");
                pTag4.setAttribute("style", "color: orangered");
                pTag4.innerHTML="Price:"+post.price;

                var pTag5=document.createElement('p');
                pTag5.setAttribute("class", "col-md-8");
                pTag5.setAttribute("style", "color: black");
                pTag5.innerHTML="Item Name ::";

                var strong3=document.createElement('strong');
                strong3.setAttribute("style", "color: orangered");
                strong3.innerHTML=post.item_name;

                var pTag6=document.createElement('p');
                pTag6.setAttribute("class", "col-md-4");

                var strong4=document.createElement('strong');
                strong4.setAttribute("style", "color: black");
                strong4.innerHTML="Order Left::"+post.order_left;

                var btnDiv=document.createElement('div');

                var aTag3=document.createElement('a');
                aTag3.setAttribute("class", "btn btn-block ");
                aTag3.setAttribute("style", "background: orangered;color: white;font-size: 30px");
                aTag3.innerHTML="Place Order"
                aTag3.href="/placeOrder/"+post.id;

                var pTag7=document.createElement('p');
                pTag7.setAttribute("class", "col-md-12 btn btn-block btn-success");
                pTag7.setAttribute("style", "font-size: 30px");

                var strong5=document.createElement('strong');
                strong5.setAttribute("style", "color: black;");
                strong5.innerHTML="Time Left::";

                var span1=document.createElement('span');
                span1.setAttribute("name", "timeSpan");

                var hidden1=document.createElement('hidden');
                hidden1.setAttribute("name", "leftTime");
                hidden1.value=post.ended_at;


                var paginate=document.createElement('ul');
                paginate.setAttribute("class", "pagination");
                paginate.setAttribute("style", "margin-left: 60%");

                aTag1.appendChild(strong1);
                pTag1.appendChild(aTag1);
                btnDiv.appendChild(aTag3);

                pTag2.appendChild(strong2);
                pTag5.appendChild(strong3);
                pTag6.appendChild(strong4);

                pTag7.appendChild(strong5);
                pTag7.appendChild(span1);
                pTag7.appendChild(hidden1);


                lastDiv.appendChild(pTag2);
                lastDiv.appendChild(pTag5);
                lastDiv.appendChild(pTag6);
                lastDiv.appendChild(pTag7);
                lastDiv.appendChild(pTag3);
                lastDiv.appendChild(postImg);
                lastDiv.appendChild(pTag4);

                aTag2.appendChild(lastDiv);
                aTag2.appendChild(btnDiv);


                panelInfoDiv.appendChild(pTag1);
                panelInfoDiv.appendChild(aTag2);
                showPostDiv.appendChild(panelInfoDiv);
                //showPostDiv.appendChild(paginate);

            });

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

            }

            setTimeout(refresh, 1000);
        }

        refresh();

    </script>
@endsection
@section('css')
    <link href="{{asset('css/select2.css')}}" rel="stylesheet" />
@endsection
