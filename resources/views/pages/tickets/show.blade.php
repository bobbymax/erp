@extends('layouts.master')
@section('title', 'ERP Portal | Ticket Details')
@section('page-title', 'Ticket Details')
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
                            </ul>
                        </div>
                    </div>
                    <div class="invoice-table table-responsive mt-5">
                        <table class="table table-bordered table-hover text-right">
                            <thead>
                                <tr class="text-capitalize">
                                    <th class="text-center" style="width: 5%;">id</th>
                                    <th class="text-left" style="width: 45%; min-width: 130px;">description</th>
                                    <th>category</th>
                                    <th style="min-width: 100px">Issue</th>
                                    @if ($ticket->additional_info !== null)
                                    	<th>details</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">1</td>
                                    <td class="text-left">{{ $ticket->additional_info === null ? $ticket->details : $ticket->additional_info }}</td>
                                    <td>{{ $ticket->category->name }}</td>
                                    <td>{{ $ticket->issue->name }}</td>
                                    @if ($ticket->additional_info !== null)
                                    	<td>{{ $ticket->details }}</td>
                                    @endif
                                </tr>
                            </tbody>
                        </table>
                        
                        @if ($ticket->status === "resolved" && $ticket->closed !== 1)
                            @can('close-tickets')
                                <a href="{{ route('close.ticket', $ticket->id) }}" class="btn btn-flat btn-sm btn-success">Close Ticket</a>
                            @endcan
                        @endif
                        <a href="{{ route('tickets.index') }}" class="btn btn-flat btn-sm btn-danger">Cancel</a>  
                    </div>
                </div>
            </div>
        </div>
	</div>
</div>
@stop