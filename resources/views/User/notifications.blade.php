@extends('Partials.master')
@section('content')
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Notifications</h3>
            </div>
            <div class="panel-body">
                <ul class="list-group">
                    @foreach($notifications as $notification)
                        <li class="list-group-item">
                            @if($notification->type=="App\Notifications\NewOrderAdded")
                                New Order Placed
                                <a href="{{route('post.show',$notification->data['post']['id'])}}" class="btn btn-primary btn-sm col-md-offset-7">
                                    View</a>
                            @elseif($notification->type=="App\Notifications\ConfirmOrderAdded")
                                Your order has been confirmed!!
                                <a href="{{route('post.show',$notification->data['order']['post_id'])}}"
                                   class="btn btn-primary btn-sm col-md-offset-4">
                                    View</a>
                            @elseif($notification->type=="App\Notifications\DeliverOrderAdded")
                                Your order has been delivered!!!
                                <a href="{{route('post.show',$notification->data['order']['post_id'])}}"
                                   class="btn btn-primary btn-sm col-md-offset-4">
                                    View</a>
                            @endif
                        </li>
                    @endforeach
                </ul>

                <ul class="pagination" style="margin-left: 60%">
                    {{$notifications->links()}}
                </ul>            </div>
        </div>

    </div>
    <div class="col-md-4"></div>
</div>
@endsection
