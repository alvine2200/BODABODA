<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Forum;
use App\Models\Support;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ForumsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        if(Auth::user()->is_admin == true)
        {
            $forums=Forum::all();
            return view('user.forums',compact('forums'));
        } 
        else
        {
        $user= Auth::user()->id;
        $forums=Forum::where('user_id',$user)->get();

        return view('user.forums',compact('forums'));
        }

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
        $validator=Validator::make($request->all(),[
            'topic'=>'required|string',
            'subtopic' =>'required|string',
            'image'=>'mimes:jpeg,jpg,png,gif,svg|required|max:10000',
            'body'=>'required|string',
        ]);

        if($validator->fails())
        {
            return back()->with('errors',$validator->errors());
        }

        if($request->hasfile('image'))
        {
            $file=$request->file('image');
            $img=$file->getClientOriginalName();
            $images=uniqid().$img;
            $file->move('images/forum',$images);
        }

        Forum::firstOrCreate([
            'user_id'=>Auth::user()->id,
            'topic'=>$request->topic,
            'subtopic'=>$request->subtopic,
            'body'=>$request->body,
            'image'=>$images,
            'time'=>Carbon::now()->format('ymdhis'),
            'status'=>'Pending',
        ]);

        return back()->with('success','Forum submitted successfully, waiting for approval');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    
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
        $validator=Validator::make($request->all(),[
            'topic'=>'string',
            'subtopic' =>'string',
            'image'=>'mimes:jpeg,jpg,png,gif,svg|max:10000',
            'body'=>'string',
        ]);

        $forum=Forum::findOrFail($id);
        if($validator->fails())
        {
            return back()->with('errors',$validator->errors());
        }

        if($request->hasFile('image'))
        {
            $file=$request->file('image');
            $img=$file->getClientOriginalName();
            $images=uniqid().$img;
            $file->move('images/forum',$images);

            $forum['image']=$images;
            $forum['user_id']=Auth::user()->id;
            $forum['topic']=$request->topic;
            $forum['subtopic']=$request->subtopic;
            $forum['body']=$request->body;
            $forum['time']=Carbon::now()->format('ymdhis');
            $forum->update();            
    
            return back()->with('success','Forum updated successfully, waiting for approval');
    
        }
        elseif($request->hasFile('image') == null)
        {
            $forum['image']=$forum->image;
            $forum['user_id']=Auth::user()->id;
            $forum['topic']=$request->topic;
            $forum['subtopic']=$request->subtopic;
            $forum['body']=$request->body;
            $forum['time']=Carbon::now()->format('ymdhis');
            $forum->update();

            return back()->with('success','Forum updated successfully, waiting for approval');
        }

       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $forums=Forum::findOrFail($id);
        $image_path = public_path("images/forum/{{$forums->image}}");
        
        if(file_exists($image_path)){
            Storage::delete($image_path);
        }

        $forums->delete();

        return back()->with('success','Forum Deleted Successfully');
    }
}
