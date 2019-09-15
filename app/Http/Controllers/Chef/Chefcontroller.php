<?php

namespace App\Http\Controllers\Chef;

use App\Comment;
use App\Http\Requests\Post\SpecialItemRequest;
use App\placeOrder;
use App\Post;
use App\SpecialItem;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use function Sodium\add;

class Chefcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Profile
    public function index()
    {
        $user=User::find(Auth::id());
        $posts=Post::where('user_id',Auth::id())->latest()->get();
        $items=SpecialItem::where('user_id',Auth::id())->latest()->get();

        return view('Chef.profile',compact('user','posts','items'));
    }

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
        //displaying chef profile to users

        $user=User::find($id);
        $posts=Post::where('user_id',$id)->latest()->get();
        $items=SpecialItem::where('user_id',$id)->latest()->get();

        return view('Chef.profile',compact('user','posts','items'));
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

    public function SpecialItemForm()
    {
        return view('Chef.specialItem');
    }

    public function SpecialItemData(SpecialItemRequest $request)
    {
        $image=$request->Image->store('specialItems');
        SpecialItem::create([
            'title'=>request('Title'),
            'image'=>$image,
            'details'=>request('Details'),
            'user_id'=>Auth::id(),
            'reacts'=>0
        ]);
        return redirect()->action('Chef\ChefController@index');

    }

    public function DisplaySpecialItem($id)
    {

        $item=SpecialItem::find($id);
        $user=User::find($item->user_id);
        $name=$user->name;
        $id=$user->id;
        $comments=Comment::where('special_item_id',$id)->get();
        return view('Chef.displaySpecialItem',compact('item','comments','name','id'));
    }
}
