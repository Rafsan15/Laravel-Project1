<?php

namespace App\Http\Controllers\User;

use App\Comment;
use App\Http\Requests\Post\CommentRequest;
use App\placeOrder;
use App\Post;
use App\SpecialItem;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::where('order_left','!=',0.00)->latest()->paginate(4);
        foreach ($posts as $post){
            $user=User::find($post->user_id);
            $post->menu_for=$user->name;
        }

        //dd($datas);
        return view('User.home');    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function PlaceOrderForm($id)
    {
        $post=Post::find($id);
        $user=User::find($post->user_id);
        $name=$user->name;
        $id=$user->id;
        return view('User.placeOrder',compact('post','name','id'));
    }

    public function StoreComment(CommentRequest $request)
    {
        Comment::create([
            'special_item_id'=>request('ItemId'),
            'user_id'=>Auth::id(),
            'comment_by'=>'Rafsan',
            'comment'=>request('Comment')

        ]);
        return redirect()->action('Chef\ChefController@DisplaySpecialItem',request('ItemId'));
    }

    public function UserProfile($id)
    {
        $user=User::find($id);
        $orders=placeOrder::where('user_id',$id)->latest()->paginate(6);
        $orderscount=placeOrder::where('user_id',$id)->get();
        $orderCount=0;
//        $posts=array();
//        foreach ($orders as $order) {
//            $post=Post::where('id',$order->post_id)->get();
//            array_push($posts,$post);
//        }
        foreach ($orderscount as $order)
        {
            if($order->deliver==true)
            {
                $orderCount++;
            }
        }
        $d=substr( $user->created_at,0,10);
        return view('User.profile',[
            'user'=>$user,
            'orders'=>$orders,
            'orderCount'=>$orderCount,
            'd'=>$d
        ]);
    }
//compact('user','orders','orderCount','d')
    public function notifications()
    {
        \auth()->user()->unreadNotifications->markAsRead();

        return view('User.notifications',[
                'notifications'=>auth()->user()->notifications()->paginate(5)
        ]);
    }
}
