<?php

namespace App\Http\Controllers;
use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        //Session::put('key',"Let's learn Laravel");
        Session::flush();
        return view('posts.posts')->with('posts',$items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|min:5',
            'content' => 'required',
            'amount' => 'required'
        ]);

        $item = new Item();
        //next is added
        $item->user_id = auth()->user()->id;
        $item->name = $request->input('name');
        $item->content = $request->input('content');
        $item->amount = $request->input('amount');

        $item->save();

        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::find($id);
        $sess_key = Session::get('key');
        return view('posts.post')->with(['post'=>$item, 'sess_key'=>$sess_key]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::find($id);
        return view('posts.edit')->with('post',$item);
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
        $this->validate($request,[
            'name' => 'required|min:5',
            'content' => 'required',
            'amount' => 'required'

        ]);

        $item = Item::find($id);
        $item->name = $request->input('name');
        $item->content = $request->input('content');
        $item->amount = $request->input('amount');

        $item->save();
        
        // $items = Item::all();
        // return view('posts.posts')->with('posts',$items);
         return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);
        $item->delete();

        return redirect('/posts');
        //->with('info','Item Deleted')
    }
}
