@extends('layouts.master')
@section('title', 'ERP Portal | Approve Trainings')
@section('page-title', 'Approve Trainings')
@section('content')
<div class="row">
	<!-- table success start -->
    <div class="col-md-12 mt-5">
        <div class="card">
            <div class="card-body">
                <div class="single-table">
                    <div class="table-responsive">
                    	@if($trainings->count() > 0)
                        <table class="table text-center">
                            <thead class="text-uppercase bg-success">
                                <tr class="text-white">
                                    <th scope="col">ID</th>
                                    <th scope="col">Staff</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Provider</th>
                                    <th scope="col">Start Date</th>
                                    <th scope="col">Location</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@php
                            		$count = 1;
                            	@endphp
                            	@foreach ($trainings as $training)
                                    @if ($training->owner->groups->contains('label', $group->label))
                                        {{-- expr --}}
                                		<tr>
    	                                    <th scope="row">{{ $count++ }}</th>
    	                                    <td>{{ $training->owner->name }}</td>
    	                                    <td>{{ $training->title }}</td>
                                            <td>{{ $training->provider }}</td>
                                            <td>{{ $training->start_date->format('d M, Y') }}</td>
    	                                    <td>
                                                {{ $training->location }}
                                            </td>
                                            <td>pending</td>
    	                                    <td>
    	                                    	<button type="button" title="Review Training" class="btn btn-info btn-flat btn-xs" data-toggle="modal" data-target="#reviewTraining{{ $training->id }}"><i class="ti-menu-alt"></i>&nbsp;&nbsp; REVIEW</button>
    	                                    </td>
    	                                </tr>

    	                                @include('pages.modals.trainings-approval')
                                    @endif
                            	@endforeach
                            </tbody>
                        </table>
                        @else
                        	<div class="alert alert-warning">There are no trainings awaiting your approval at the moment.</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- table success end -->
</div>
@stop