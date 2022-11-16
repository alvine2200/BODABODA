<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Support;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SupportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $index = 'support.index';
        if (Auth::user()->is_admin == true) {
            $support = Support::all();
            return view($index, compact('support'));
        } else {
            $support = Support::where('user_id', Auth::user()->id)->get();
            return view($index, compact('support'));
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
    public function store(Request $request, Support $support)
    {
        $rules = 'required|string';
        $validator = Validator::make($request->all(), [
            'subject' => $rules,
            'message' => $rules,
            'photo' => 'mimes:jpeg,jpg,png,gif|required|max:10240',
        ]);

        if ($validator->fails()) {
            return back()->with('errors', $validator->errors());
        }

        $ticket = $request->only('subject', 'message', 'photo');

        $ticketNumber = mt_rand(1000000, 999999999);
        $time_sent = \Carbon\Carbon::now()->format('ymdhis');

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $name = $file->getClientOriginalName();
            $photo = uniqid() . $name;
            $file->move('pictures/support', $photo);
            $support['photo'] = $photo;
        }

        Support::create([
            'user_id' => Auth::user()->id,
            'ticket_number' => $ticketNumber,
            'subject' => $ticket['subject'],
            'message' => $ticket['message'],
            'time_sent' => $time_sent,
            'photo' => $photo,
        ]);

        return back()->with('success', 'Ticket Submitted Successfully');
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
        $user = Support::findOrFail($id);
        return view('support.edit', compact('user'));
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
        $rules = 'string';
        $validator = Validator::make($request->all(), [
            'subject' => $rules,
            'message' => $rules,
            'photo' => 'mimes:jpeg,jpg,png,gif|max:10240',
        ]);

        if ($validator->fails()) {
            return back()->with('errors', $validator->errors());
        }

        $pic = Support::findOrFail($id);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $name = $file->getClientOriginalName();
            $photo = uniqid() . $name;
            $file->move('pictures/support', $photo);

            $pic['photo'] = $photo;
            $pic['subject'] = $request->subject;
            $pic['message'] = $request->message;
            $pic->update();
            return back()->with('success', 'Ticket updated successfully');
        } elseif ($request->hasFile('photo') == '') {
            $pic['photo'] = $pic->photo;
            $pic['subject'] = $request->subject;
            $pic['message'] = $request->message;

            $pic->update();

            return back()->with('success', 'Ticket updated successfully');
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
        $user = User::findOrFail(Auth::user()->id);
        $user->supports()->find($id)->delete();
        return back()->with('success', 'Ticket deleted successfully');
    }

    public function resolve($id)
    {
        $support = Support::findOrFail($id);
        $support['status'] = 'resolved';
        $support->update();
        return back()->with('success', 'Ticket resolved successfully');
    }

    public function reply_ticket($id)
    {
        $support = Support::findOrFail($id);
        return view('support.reply', compact('support'));
    }

    public function reply(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'reply' => 'required|string',
        ]);

        if ($validator->fails()) {
            return back()->with('errors', $validator->errors());
        }

        $support = Support::findOrFail($id);
        $support->reply = $request->reply;
        $support->status = 'replied';
        $support->time_replied = \Carbon\Carbon::now()->format('ymdhis');
        $support->update();

        return redirect('support')->with('success', 'Reply successfully sent');
    }
}
