@extends('Partials.master')
@section('content')


    <div id="showPostDivroot" class="row " style="color: black; ">

        <div id="showPostDiv0" class="card col-xs-12 col-sm-6  col-md-4 col-lg-4" style="" >
            <div class="panel panel-info" style="margin: 10px">

                <br>
                <form class="form-horizontal">

                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" id="searchTags" readonly  class="form-control" placeholder="Filters">
                        </div>
{{--                        <div class="col-md-4">--}}
{{--                            <input type="submit" style="width: 100%" class="btn btn-default btn-success" value="Search">--}}
{{--                        </div>--}}
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

                            <div style="margin-left: 7px; margin-right: 7px">

                                <p class="text-info text-center">
                                    <strong>Posted at:{{ $post->created_at }}</strong>
                                </p>
                                <p style="color: black">{{$post->details }} .</p>
                                <img id="postImg" src="{{asset('storage/'.$post->image)}}"  style="height:200px;width: 40%; margin-left: 190px">
                                <p class="text-center" style="color: orangered">Price: {{$post->price}}</p>
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
    <script src="{{ asset('js/select2.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#filterSearch').select2();
        });
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
                pTag3.innerHTML=post.details;

                var postImg=document.createElement('img');
                postImg.src="/storage/"+post.image;
                postImg.setAttribute("style", "height:200px;width: 40%; margin-left: 190px");

                var pTag4=document.createElement('p');
                pTag4.setAttribute("class", "text-center");
                pTag4.setAttribute("style", "color: orangered");
                pTag4.innerHTML="Price:"+post.price;

                var paginate=document.createElement('ul');
                paginate.setAttribute("class", "pagination");
                paginate.setAttribute("style", "margin-left: 60%");
                paginate.innerHTML="{{$posts->links()}}";

                aTag1.appendChild(strong1);
                pTag1.appendChild(aTag1);

                pTag2.appendChild(strong2);
                lastDiv.appendChild(pTag2);
                lastDiv.appendChild(pTag3);
                lastDiv.appendChild(postImg);
                lastDiv.appendChild(pTag4);

                aTag2.appendChild(lastDiv);


                panelInfoDiv.appendChild(pTag1);
                panelInfoDiv.appendChild(aTag2);
                showPostDiv.appendChild(panelInfoDiv);
                //showPostDiv.appendChild(paginate);
            }
        });


    }

    </script>
@endsection
@section('css')
    <link href="{{asset('css/select2.css')}}" rel="stylesheet" />
@endsection
