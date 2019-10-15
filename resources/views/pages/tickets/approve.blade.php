@extends('layouts.master')
@section('title', 'ERP Portal | Approve Tickets')
@section('page-title', 'Approve Tickets')
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
                                    <th scope="col">Resolved By</th>
                                    <th scope="col">Owner</th>
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
                                        <td>{{ $ticket->assigns->last()->name }}</td>
                                        <td>{{ $ticket->owner->name }}</td>
                                        <td>
                                            <span class="badge badge-pill badge-success">{{ $ticket->status }}</span>
                                        </td>
                                        <td>
                                            <a href="{{ route('ticket.report', $ticket->code) }}" class="btn btn-flat btn-xs btn-info"><i data-feather="eye"></i>&nbsp;&nbsp; View Report</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                            <div class="alert alert-warning">There are no tickets to approve at this time.</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- table success end -->
</div>
@stop