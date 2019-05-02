@extends('layouts.master')
@section('title', 'ERP Portal | Unresolved Tickets')
@section('page-title', 'Unresolved Tickets')
@section('content')
<div class="row">
	<!-- table success start -->
    <div class="col-md-12 mt-5">
        <div class="card">
            <div class="card-body">
            	<div class="row">
            		<div class="col-md-12"><h4 class="header-title">Tickets</h4></div>
            	</div>
                
                
                <div class="single-table">
                    <div class="table-responsive">
                    	@if($tickets->count() > 0)
                        <table class="table text-center">
                            <thead class="text-uppercase bg-success">
                                <tr class="text-white">
                                    <th scope="col">ID</th>
                                    <th scope="col">Code</th>
                                    <th scope="col">Created</th>
                                    <th scope="col">Assigned To</th>
                                    <th scope="col">Priority</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@php
                            		$count = 1;
                            	@endphp
                            	@foreach ($tickets as $ticket)
                            		<tr>
	                                    <th scope="row">{{ $count++ }}</th>
	                                    <td>{{ $ticket->code }}</td>
	                                    <td>{{ $ticket->created_at->diffForHumans() }}</td>
                                        <td>{{ $ticket->assigned === 0 ? ' not assigned' : ' assigned' }}</td>
                                        <td>{{ ucfirst($ticket->priority) }}</td>
                                        <td>
                                            @if ($ticket->status === 'unresolved')
                                                <span class="badge badge-pill badge-danger">{{ $ticket->status }}</span>
                                            @elseif($ticket->status === 'in progress')
                                                <span class="badge badge-pill badge-warning">{{ $ticket->status }}</span>
                                            @else
                                                <span class="badge badge-pill badge-success">{{ $ticket->status }}</span>
                                            @endif   
                                        </td>
	                                    <td>
	                                    	<form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST">
	                                    		@csrf
	                                    		@method('DELETE')

                                                @can('edit-tickets')
	                                    		<a href="{{ route('tickets.edit', $ticket->id) }}" title="Edit Ticket" class="btn btn-xs btn-flat btn-warning"><i class="ti-pencil"></i></a>
                                                @endcan
                                                @can('delete-tickets')
	                                    		<button type="submit" title="Delete Ticket" class="btn btn-xs btn-flat btn-danger">
	                                    			<i class="ti-trash"></i>
	                                    		</button>
                                                @endcan
	                                    	</form>
	                                    </td>
	                                </tr>
                            	@endforeach
                            </tbody>
                        </table>
                        @else
                        	<div class="alert alert-warning">You have not generated any ticket at this time.</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- table success end -->
</div>
@stop