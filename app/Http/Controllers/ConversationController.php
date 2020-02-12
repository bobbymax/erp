<?php

namespace App\Http\Controllers;

use App\Conversation;
use App\Training;
use App\User;
use App\Thread;
use App\MSender;
use App\MRecipient;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Http\MailBox;

class ConversationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    protected function queryValues()
    {
        return $message = "Please share more clarity on this subject";
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conversations = auth()->user()->getConversations(auth()->user());
        // dd($conversations);
        return view('pages.messages.inbox', compact('conversations'));
    }

    public function getThreads(Request $request)
    {
        if ($request->ajax()) {
            $conversationId = $request->convo;

            $conversation = Conversation::with('threads', 'sender', 'recipient')->find($conversationId);

            // $conversation = $conversation->toJson();

            return response()->json($conversation);
        }
    }


    public function queryTraining(Training $training, User $user)
    {
        $conversation = new Conversation;

        $conversation->type = 'training';
        $conversation->sender_id = auth()->user()->id;
        $conversation->recipient_id = $training->proposed->manager;
        $conversation->type_id = $training->id;
        $conversation->label = 'query';
        $conversation->subject = "Query on Training Decision";

        if ($conversation->save()) {
            $thread = new Thread;

            $thread->reference_code = getToken(10);
            $thread->message = $this->queryValues();

            if ($conversation->threads()->save($thread)) {

                $sender = new MSender;

                $sender->user_id = auth()->user()->id;
                $sender->conversation_id = $conversation->id;
                $thread->mSenders()->save($sender);

                $recipient = new MRecipient;

                $recipient->user_id = $training->proposed->manager;
                $recipient->conversation_id = $conversation->id;
                $thread->mRecipients()->save($recipient);

                $training->query = 1;
                $training->save();
            }

            flash()->success('Success', 'The line Manager would be notified of this query');

            return back();

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Conversation  $conversation
     * @return \Illuminate\Http\Response
     */
    public function show(Conversation $conversation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Conversation  $conversation
     * @return \Illuminate\Http\Response
     */
    public function edit(Conversation $conversation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Conversation  $conversation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Conversation $conversation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Conversation  $conversation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Conversation $conversation)
    {
        //
    }
}
