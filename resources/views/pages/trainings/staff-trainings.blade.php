@extends('layouts.master')
@section('title', 'ERP Portal | Staff Trainings')
@section('page-title', 'Proposed Trainings')
@section('content')
<div class="row">
	<!-- table success start -->
    <div class="col-md-12 mt-5">
        <div class="card">
            <div class="card-body">
                
                <div class="single-table">
                    <div class="table-responsive">
                    	@if($users->count() > 0)
                        <table class="table text-center">
                            <thead class="text-uppercase bg-success">
                                <tr class="text-white">
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Staff Number</th>
                                    <th scope="col">Number of Trainings</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@php
                            		$count = 1;
                            	@endphp

                            	@foreach ($users as $user)
                                    {{-- expr --}}
                            		<tr>
	                                    <th scope="row">{{ $count++ }}</th>
	                                    <td>{{ $user->name }}</td>
                                        <td>{{ $user->staff_no }}</td>
                                        <td>{{ $user->trainings->where('completed', 1)->count() }}</td>
	                                    <td>
	                                    	<a href="{{ route('trainings.print', $user->id) }}" target="_blank" class="btn btn-xs btn-info">Print Training{{ $user->trainings->where('completed', 1)->count() > 1 ? 's' : '' }}</a>
	                                    </td>
	                                </tr>
                            	@endforeach
                            </tbody>
                        </table>
                        @else
                        	<div class="alert alert-warning">There are no users with trainings at the moment.</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- table success end -->
</div>
@stop