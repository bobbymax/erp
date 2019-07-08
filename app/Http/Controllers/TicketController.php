<?php

namespace App\Http\Controllers;

use App\Ticket;
use App\TicketReport;
use App\Category;
use App\Issue;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

use DB;
use Mail;

use App\Mail\TicketCreated;
use App\Mail\TicketAssigned;

class TicketController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = auth()->user()->tickets;
        return view('pages.tickets.owner', compact('tickets'));
    }

    public function unresolved()
    {
        $tickets = Ticket::where('assigned', 0)->where('status', 'unresolved')->get();
        return view('pages.tickets.unresolved', compact('tickets'));
    }

    public function tasks()
    {
        $tickets = auth()->user()->resolvables;
        $users = User::latest()->get();
        return view('pages.tickets.tasks', compact('tickets', 'users'));
    }

    public function approve()
    {
        $tickets = Ticket::where('status', 'resolved')->where('closed', false)->get();
        return view('pages.tickets.approve', compact('tickets'));
    }

    public function createHelpdesk()
    {
        $categories = Category::latest()->get();
        $users = User::orderBy('name', 'ASC')->get();
        return view('pages.tickets.helpdesk', compact('categories', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::latest()->get();
        return view('pages.tickets.create', compact('categories'));
    }

    // public function autocomplete(Request $request)
    // {

    //     if ($request->ajax()) {
    //         $data = User::select("name")->where("name","LIKE","%{$request->input('query')}%")->get();
    //         return response()->json($data);
    //     }
    // }
    // 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function adhocStore(Request $request)
    {
        $this->validate($request, [
            'users' => 'required|integer',
            'categories' => 'required|integer',
            'issues' => 'required|integer',
            'specification' => 'required|string',
            'priority' => 'required|string'
        ]);

        $ticket = new Ticket;

        $ticket->code = getToken(4) . substr(time(), -4);
        $ticket->category_id = $request->categories;
        $ticket->issue_id = $request->issues;
        $ticket->details = $request->specification;
        $ticket->priority = $request->priority;
        $ticket->additional_info = $request->additional_info;
        $ticket->user_id = $request->users;
        $ticket->save();

        //auth()->user()->tickets()->save($ticket);

        Mail::to("icthelpdesk@ncdmb.gov.ng")->cc($ticket->owner->email)->queue(new TicketCreated($ticket));
        flash()->success('Success!!', 'You have successfully opened a support ticket, an ICT staff would be with you shortly.');

        return redirect()->route('tickets.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'categories' => 'required|integer',
            'issues' => 'required|integer',
            'specification' => 'required|string',
            'priority' => 'required|string'
        ]);

        $ticket = new Ticket;

        $ticket->code = getToken(4) . substr(time(), -4);
        $ticket->category_id = $request->categories;
        $ticket->issue_id = $request->issues;
        $ticket->details = $request->specification;
        $ticket->priority = $request->priority;
        $ticket->additional_info = $request->additional_info;

        auth()->user()->tickets()->save($ticket);

        Mail::to("icthelpdesk@ncdmb.gov.ng")->cc($ticket->owner->email)->queue(new TicketCreated($ticket));
        flash()->success('Success!!', 'You have successfully opened a support ticket, an ICT staff would be with you shortly.');

        return redirect()->route('tickets.index');
    }

    public function assign(Request $request, Ticket $ticket)
    {
        $this->validate($request, [
            'assigns' => 'required|integer',
        ]);

        $id = $request->assigns;
        $user = User::find($id);

        if ($user) {

            $report = "This ticket has been assigned";
            
            $message = [
                [auth()->user()->id, $user->id, "assigned", $report, Carbon::now()],
            ];

            $report = TicketReport::create([
                'ticket_id' => $ticket->id,
                'details' => json_encode($message),
            ]);

            if ($report) {
                $ticket->assigns()->sync($user->id);
                $ticket->assigned = true;
                $ticket->assigned_by = auth()->user()->id;
                $ticket->status = "inprogress";
                $ticket->save();
            }
            

            flash()->success('All Done!!', 'You have assigned this ticket to this user successfully.');
            Mail::to($ticket->owner->email)->cc('IT@ncdmb.gov.ng')->queue(new TicketAssigned($ticket));
        } else {
            flash()->error('Oops!!', 'Something seems to be wrong, not your fault tho, we would get right at it.');
        }

        return redirect()->route('unresolved.tickets');
    }

    public function close(Ticket $ticket)
    {
        $ticket->closed = true;
        $ticket->save();
        flash()->success('Completed!!', 'This ticket has been closed successfully.');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show($ticket)
    {
        $ticket = Ticket::where('code', $ticket)->firstOrFail();
        return view('pages.tickets.show', compact('ticket'));
    }

    public function report($ticket)
    {
        $ticket = Ticket::where('code', $ticket)->firstOrFail();
        return view('pages.tickets.report', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        $users = User::latest()->get();
        return view('pages.tickets.edit', compact('ticket', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    public function fetch(Request $request)
    {
        if ($request->ajax()) {
            $select = $request->select;
            $value = $request->value;
            $dependent = $request->dependent;

            if ($value !== null) {
                $query = DB::table($select)->where('id', $value)->first();

                if ($select === "categories") {
                    $results = Issue::where('category_id', $query->id)->pluck('name', 'id')->all();
                } else {
                    $results = $query;
                }

                $data = view('pages.ajax.issues', compact('results', 'select', 'dependent'))->render();
                return response()->json(['options' => $data]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
