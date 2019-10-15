@extends('layouts.master')
@section('title', 'ERP Portal | Tasks')
@section('page-title', 'Tasks')
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
                                    @if ($ticket->assigns->last()->id === auth()->user()->id)
                                        <tr>
                                            <th scope="row">{{ $count++ }}</th>
                                            <td>{{ $ticket->code }}</td>
                                            <td>{{ $ticket->created_at->diffForHumans() }}</td>
                                            <td>
                                                @if ($ticket->assigned === 0)
                                                    Not Assigned
                                                @else
                                                    {{ $ticket->assigns->last()->name }}
                                                @endif
                                            </td>
                                            <td>{{ ucfirst($ticket->priority) }}</td>
                                            <td>
                                                @if ($ticket->status === 'unresolved')
                                                    <span class="badge badge-pill badge-danger">{{ $ticket->status }}</span>
                                                @elseif($ticket->status === 'inprogress' || $ticket->status === 'inprogress')
                                                    <span class="badge badge-pill badge-warning">{{ $ticket->status }}</span>
                                                @else
                                                    <span class="badge badge-pill badge-success">{{ $ticket->status }}</span>
                                                @endif   
                                            </td>
                                            <td>
                                                @if ($ticket->status !== 'resolved')
                                                    @if ($ticket->transferred < 3)
                                                        @can('transfer-tickets')
                                                            <button type="button" title="Make Transfer Request" class="btn btn-info btn-flat btn-xs" data-toggle="modal" data-target="#transferRequest{{ $ticket->id }}"><i class="ti-write"></i>&nbsp;&nbsp; Escalate Ticket</button>
                                                        @endcan
                                                    @endif
                                                    @can('generate-ticket-report')
                                                        <button type="button" class="btn btn-primary btn-flat btn-xs" data-toggle="modal" data-target="#generateReport{{ $ticket->id }}"><i data-feather="file-text"></i>&nbsp;&nbsp; Generate Report</button>
                                                    @endcan
                                                @else
                                                    <a href="{{ route('ticket.report', $ticket->code) }}" class="btn btn-flat btn-xs btn-info"><i data-feather="eye"></i>&nbsp;&nbsp; View Report</a>
                                                @endif
                                            </td>
                                        </tr>

                                        <!-- Generate Report -->
                                        @include('pages.modals.report')
                                        {{-- Escalate Ticket --}}
                                        @include('pages.modals.escalate')
                                    @endif 
                                @endforeach
                            </tbody>
                        </table>
                        @else
                            <div class="alert alert-warning">You have not been assigned any ticket at this time.</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- table success end -->
</div>
@stop