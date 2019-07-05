<?php

namespace App\Http\Controllers;

use App\TicketReport;
use App\Ticket;
use App\User;
use DB; 
use Carbon\Carbon;
use Illuminate\Http\Request;

class TicketReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Ticket $ticket)
    {
        $this->validate($request, [
            'user_id' => 'required|integer',
            'report' => 'required|min:3',
        ]);

        /**
         * JSON  Formart
         * Transferred From, 
         * Escalated To, 
         * Request Type, 
         * Details of Report and 
         * Time Created
         */

        $message = [
            [auth()->user()->id, $request->user_id, $request->type == 'transfer' ? 'escalated' : $request->type, $request->report, Carbon::now()],
        ];

        if (is_object($ticket->report)) {

            $existing = json_decode($ticket->report->details);
            $updated_report = array_merge($existing, $message);

            $ticket->report->details = json_encode($updated_report);

            if ($ticket->report->save()) {
                if ($request->type == 'transfer') {

                    $ticket->assigns()->sync($request->user_id);
                    $ticket->transferred = $ticket->transferred + 1;
                    $ticket->status = "escalated";
                    $ticket->save();

                } else {
                    $ticket->status = $request->type;
                    $ticket->report_generated = true;
                    $ticket->save();
                }
            }
        } else {
            $report = TicketReport::create([
                'ticket_id' => $ticket->id,
                'details' => json_encode($message),
            ]);

            if ($report) {
                if ($request->type == 'transfer') {

                    $ticket->assigns()->sync($request->user_id);
                    $ticket->transferred = $ticket->transferred + 1;
                    $ticket->status = "escalated";
                    $ticket->save();
                } else {
                    $ticket->status = $request->type;
                    $ticket->report_generated = true;
                    $ticket->save();
                }
            }
        }

        flash()->success('All Done!!', 'Report generated successfully.');
        return redirect()->route('tasks.index');
    }

}
