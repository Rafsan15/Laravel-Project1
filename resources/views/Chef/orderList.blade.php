@extends('Partials.master')
@section('content')
    <div class="panel panel-info" style="margin-left: 5px;margin-right: 5px">
        <table class="table table-striped table-hover ">
            <thead>
            <tr class="text-center">
                <th class="text-center">Quantity</th>
                <th class="text-center">Phone</th>
                <th class="text-center">Address</th>
                <th class="text-center">Confirm</th>
                <th class="text-center">Deliver</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr class="info text-center">
                    <td>{{$user->quantity}}</td>
                    <td>{{$user->phone}}</td>
                    <td>{{$user->address}}</td>
                    <td>
                        @if($user->confirm=='false')
                            <a href="{{route('order.status',array($user->id,'confirm',$user->id))}}" class="btn btn-primary">Confirm</a>
                        @else
                            <a href="" class="btn btn-success disabled">Done</a>
                        @endif

                    </td>
                    <td>
                        @if($user->deliver=='false')
                            <a href="{{route('order.status',array($user->id,'deliver',$user->id))}}" class="btn btn-primary">Deliver</a>
                        @else
                            <a href="" class="btn btn-success disabled">Done</a>
                        @endif
                    </td>

                </tr>
            @endforeach


            </tbody>
        </table>
    </div>
@endsection
