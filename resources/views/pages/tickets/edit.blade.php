@extends('layouts.master')
@section('title', 'ERP Portal | Assign Ticket')
@section('page-title', 'Assign Ticket')
@section('content')
<div class="row">
	<div class="col-12">
		<div class="card mt-5">
            <div class="card-body">
                <div class="invoice-area">
                    <div class="invoice-head">
                        <div class="row">
                            <div class="iv-left col-6">
                                <span>Ticket Details</span>
                            </div>
                            <div class="iv-right col-6 text-md-right">
                                <span>#{{ $ticket->code }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="invoice-address">
                                <h5>
                                	@if ($ticket->assigned === 0)
                                		<span class="badge badge-pill badge-warning">unassigned</span>
                                	@endif
                                </h5>
                                <p>{{ $ticket->owner->name }}</p>
                                <p>{{ $ticket->owner->location->name . ", " . "room " . auth()->user()->room_no }}</p>
                                <p>{{ $ticket->owner->groups->last()->name }}</p>
                            </div>
                        </div>
                        <div class="col-md-6 text-md-right">
                            <ul class="invoice-date">
                                <li>Current Date: {{ $ticket->created_at->diffForHumans() }}</li>
                                <li>Status: 
                                	@if ($ticket->status === "unresolved")
                                		<span class="badge badge-pill badge-danger">
                                	@elseif ($ticket->status === "inprogress")
                                		<span class="badge badge-pill badge-warning">
                                	@else
                                		<span class="badge badge-pill badge-success">
                                	@endif
                                		{{ $ticket->status }}
                                	</span>
                                </li>
                                @if (auth()->user()->groups->contains('label', 'staff'))
                                    <li>
                                        <a href="#" class="btn btn-flat btn-xs btn-primary">
                                            <i class="ti-hand-open"></i>&nbsp;&nbsp;
                                            Take this ticket
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="invoice-table table-responsive mt-5">
                        <table class="table table-bordered table-hover text-right">
                            <thead>
                                <tr class="text-capitalize">
                                    <th class="text-center" style="width: 5%;">id</th>
                                    <th class="text-left" style="width: 20%; min-width: 130px;">description</th>
                                    <th style="min-width: 100px">Issue</th>
                                    @if ($ticket->additional_info !== null)
                                    	<th>details</th>
                                    @endif
                                    <th style="width: 35%;">Assign Ticket</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">1</td>
                                    <td class="text-left">{{ $ticket->additional_info === null ? $ticket->details : $ticket->additional_info }}</td>
                                    <td>{{ $ticket->issue->name }}</td>
                                    @if ($ticket->additional_info !== null)
                                    	<td>{{ $ticket->details }}</td>
                                    @endif
                                    <td>
                                        <form action="{{ route('assign.ticket', $ticket->id) }}" method="POST">
                                            @csrf

                                            <div class="row">
                                                <div class="col-9">
                                                   <div class="form-group">
                                                        <select name="assigns" id="assigns" class="form-control form-control-sm">
                                                            <option>Select Staff</option>
                                                            @foreach ($users as $user)
                                                                @if ($user->groups->contains('label', 'administrators') && auth()->user()->id !== $user->id)
                                                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div> 
                                                </div>
                                                <div class="col-3">
                                                    <button type="submit" class="btn btn-flat btn-xs btn-primary">Assign Staff</button>
                                                </div>
                                            </div>
                                            
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        
                        @if ($ticket->status === "resolved")
                            <a href="#" class="btn btn-flat btn-sm btn-success">Close Ticket</a>
                        @endif
                        <a href="{{ route('unresolved.tickets') }}" class="btn btn-flat btn-sm btn-danger">Cancel</a>  
                    </div>
                </div>
            </div>
        </div>
	</div>
</div>
@stop