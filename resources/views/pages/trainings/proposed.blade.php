@extends('layouts.master')
@section('title', 'ERP Portal | Proposed Trainings')
@section('page-title', 'Proposed Trainings')
@section('content')
<div class="row">
	<!-- table success start -->
    <div class="col-md-12 mt-5">
        <div class="card">
            <div class="card-body">
            	<div class="row">
            		<div class="col-md-8"><h4 class="header-title">Proposed Trainings</h4></div>
                    @can('create-trainings')
            		<div class="col-md-4"><a href="{{ route('create.proposed') }}" class="btn btn-flat btn-xs btn-primary mb-3 float-right">Propose Training</a></div>
                    @endcan
            	</div>
                
                
                <div class="single-table">
                    <div class="table-responsive">
                    	@if($trainings->count() > 0)
                        <table class="table text-center">
                            <thead class="text-uppercase bg-success">
                                <tr class="text-white">
                                    <th scope="col">ID</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Provider</th>
                                    <th scope="col">Start Date</th>
                                    <th scope="col">End Date</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@php
                            		$count = 1;
                            	@endphp
                            	@foreach ($trainings as $training)
                            		<tr>
	                                    <th scope="row">{{ $count++ }}</th>
	                                    <td>{{ $training->title }}</td>
                                        <td>{{ $training->provider }}</td>
                                        <td>{{ $training->start_date->format('d M, Y') }}</td>
                                        <td>{{ $training->end_date->format('d M, Y') }}</td>
	                                    <td>
                                            {{ $training->category_id === 0 ? ' Not Categorized' : $training->category->name }}
                                        </td>
	                                    <td>
	                                    	<form action="{{ route('trainings.destroy', $training->id) }}" method="POST">
	                                    		@csrf
	                                    		@method('DELETE')
                                                @can('edit-trainings')
	                                    		<a href="{{ route('trainings.edit', $training->id) }}" class="btn btn-xs btn-flat btn-warning"><i class="ti-pencil"></i></a>
                                                @endcan
                                                @can('delete-trainings')
	                                    		<button type="submit" class="btn btn-xs btn-flat btn-danger">
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
                        	<div class="alert alert-warning">There are no trainings created at the moment.</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- table success end -->
</div>
@stop