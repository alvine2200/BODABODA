<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Forum;
use App\Models\Reply;
use App\Models\Support;
use Illuminate\Support\Str;
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
            if(!Auth::user()->is_admin){
                
                $forum_user=Forum::where('user_id',Auth::user()->id)->get();

                return view('user.forums',compact('forum_user'));
            }
        
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
            'slug'=>Str::slug($request->topic),
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
        $edit=Forum::findOrFail($id);
        return view('user.edit_forum',compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $validator=Validator::make($request->all(),[
            'topic'=>'string',
            'subtopic' =>'string',
            'image'=>'mimes:jpeg,jpg,png,gif,svg|max:10000',
            'body'=>'string',
        ]);        
        
        if($validator->fails())
        {
            return back()->with('errors',$validator->errors());
        }
        $forum=Forum::findOrFail($slug);

        if($request->hasFile('image'))
        {
            $file=$request->file('image');
            $img=$file->getClientOriginalName();
            $images=uniqid().$img;
            $file->move('images/forum',$images);

            $forum['image']=$images;
            $forum['topic']=$request->topic;
            $forum['subtopic']=$request->subtopic;
            $forum['body']=$request->body;
            $forum['time']=Carbon::now()->format('ymdhis');
            $forum->update();            
    
            return redirect('forums')->with('success','Forum updated successfully, waiting for approval');
    
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

            return redirect('forums')->with('success','Forum updated successfully, waiting for approval');
        }

       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        
        $user=User::findOrFail(Auth::user()->id);
        $user->forums->find($slug)->delete();        

        return back()->with('success','Forum Deleted Successfully');
    }

    public function add_forum()
    {
        return view('forum.add_forum');
    }

    public function approve_forum($id)
    {
        $forums=Forum::findOrFail($id);
        
        if($forums){
            $forums->status = 'approved';
            $forums->update();
            return back()->with('success','Forum approved successfully');
        }

    }

    public function view_forums()
    {
        $forums=Forum::where('status', 'approved')->latest()->paginate(9);
        return view('admin.forums',compact('forums'));
    }

    public function view_post($slug)
    {
        
        $post=Forum::with(['users'])->where('slug',$slug)->first();
        $replies=Reply::where('forum_id',$post->id)->get();
        return view('admin.view_posts',compact('post','replies'));
    }

}
