@extends('Partials.master')
@section('content')

    <div class="row">
        <div class="col-md-4"></div>
        <div class="panel panel-info col-md-4" style="background: #c9e2b3">
            <h1 class="text-center">Update Post</h1>
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
            <form class="form-horizontal" action="{{route('post.update',$post->id)}}" method="Post" enctype="multipart/form-data" style="color: black">
                <fieldset>
                    {{csrf_field()}}
                    @method('PUT')
                    <div class="form-group">
                        <div class="col-md-1"></div>
                        <div class="col-md-4">
                            <label for="name" class="control-label" style="font-size: 15px">Menu For</label>
                        </div>
                        <div class="col-lg-6">
                            <select class="form-control" value="{{$post->menu_for}}" name="MenuFor" id="select">
                                <option value="Breakfast">Breakfast</option>
                                <option value="Lunch">Lunch</option>
                                <option value="Snacks">Snacks</option>
                                <option value="Dinner">Dinner</option>

                            </select>
                        </div>
                        <div class="col-md-1"></div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <textarea class="form-control"  value="" name="Details" rows="5" id="textArea" placeholder="Type Some Details Here">{{$post->details}}
                            </textarea>

                        </div>
                        <div class="col-md-1"></div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3"></div>
                        <div class="col-lg-8">
                            <img style="margin-top: 5px" src="{{asset('storage/'.$post->image)}}" id="profile-img"  width="250px" />
                        </div>
                        <div class="col-md-1"></div>
                    </div>


                    <div class="form-group">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <input type="hidden" name="PImage" value="{{$post->image}}">
                            <label class="control-label btn btn-default btn-lg btn-block text-center">
                                Change Picture
                                <input type="file" style="display: none;"   name="Image"
                                       accept="image/jpeg, image/x-png"
                                       onchange="document.getElementById('profile-img').style.display='block';
                            document.getElementById('profile-img').src = window.URL.createObjectURL(this.files[0])"
                                >
                            </label>
                        </div>

                        <div class="col-md-1"></div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-1"></div>
                        <div class="col-md-4">
                            <label for="ended_at"   class="control-label" style="font-size: 15px">Ended At</label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text"  value="{{$post->ended_at}}" class="form-control" name="Ended_At" id="ended_at" class="form-control">
                        </div>
                        <div class="col-md-1"></div>
                    </div>


                    <div class="form-group">
                        <div class="col-md-1"></div>
                        <div class="col-md-4">
                            <label for="maxOrder" class="control-label" style="font-size: 15px">Max Order</label>
                        </div>
                        <div class="col-lg-6">
                            <input type="number" value="{{$post->max_order}}" name="MaxOrder" id="maxOrder" class="form-control">
                        </div>
                        <div class="col-md-1"></div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-1"></div>
                        <div class="col-md-4">
                            <label for="price" class="control-label" style="font-size: 15px">Plate Price</label>
                        </div>
                        <div class="col-lg-6">
                            <input type="number" value="{{$post->price}}" name="Price" id="price" class="form-control">
                        </div>
                        <div class="col-md-1"></div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-offset-7">
{{--                            <button type="button" onclick="handleDelete({{$post->id}})" class="btn btn-danger" style="font-size: 20px">Delete</button>--}}
                            <button type="reset" name="" class="btn btn-info" style="font-size: 20px">Cancel</button>
                            <button type="submit" name="Post" class="btn btn-primary" style="font-size: 20px">Update</button>
                        </div>
                    </div>


                </fieldset>
            </form>

        </div>

        <div class="col-md-4"></div>

        <div class="modal fade" id="deletepost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="" method="POST" id="deletePost">
                    {{csrf_field()}}
                    @method('DELETE')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete Post</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Are You Sure ?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Go Back</button>
                            <button type="submit" class="btn btn-primary">Delete Post</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>

@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr('#ended_at',{
            enableTime:true
        });

        function handleDelete(id) {

            // console.log('deleting')
            // var form=document.getElementById('deletePost')
            // form.action='/post/'+id;
             $('#deletepost').modal('show')
        }
    </script>

@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection

