<?php

namespace App\Http\Controllers\User;

use App\Models\Forum;
use App\Models\Reply;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request,$id, Reply $reply)
    {
       $validator=Validator::make($request->all(),[
            'comment'=>'required|string|',
       ]);

       if($validator->fails()){
         return back()->with('errors',$validator->errors());
       }
        $input=$request->only('comment');
        
        $forum=Forum::findOrFail($id);
        if(!$forum)
        {
            return back()->with('errors','Forum not found!');
        }

         if(!Auth::user()->id){
             return back()->with('errors','Sorry, You cant comment, Login first');
          }

        Reply::Create([
            'forum_id' => $forum->id,
            'user_id' => Auth::user()->id,
            'comment' =>$input['comment'],
        ]);

        return redirect()->back()->with('success','Comment submitted successfully');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $forum=Forum::findOrFail($slug);
        $replies=Reply::where('forum_id',$forum->id)->get();
        return view('admin.view_posts',compact('forum', 'replies'));
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
}
