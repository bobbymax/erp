@extends('layouts.master')
@section('title', 'ERP Portal | Locations')
@section('content')
<div class="row">
	<!-- table success start -->
    <div class="col-md-12 mt-5">
        <div class="card">
            <div class="card-body">
            	<div class="row">
            		<div class="col-md-8"><h4 class="header-title">Locations</h4></div>
                    @can('create-locations')
            		<div class="col-md-4"><a href="{{ route('locations.create') }}" class="btn btn-flat btn-xs btn-primary mb-3 float-right">Create Location</a></div>
                    @endcan
            	</div>
                
                
                <div class="single-table">
                    <div class="table-responsive">
                    	@if($locations->count() > 0)
                        <table class="table text-center">
                            <thead class="text-uppercase bg-success">
                                <tr class="text-white">
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Short</th>
                                    <th scope="col">Travel Category</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@php
                            		$count = 1;
                            	@endphp
                            	@foreach ($locations as $location)
                            		<tr>
	                                    <th scope="row">{{ $count++ }}</th>
	                                    <td>{{ $location->name }}</td>
	                                    <td>{{ $location->short }}</td>
                                        <td>{{ $location->travel_category_id != 0 ? $location->travelCategory->type : 'None' }}</td>
	                                    <td>
	                                    	<form action="{{ route('locations.destroy', $location->id) }}" method="POST">
	                                    		@csrf
	                                    		@method('DELETE')
                                                @can('edit-locations')
	                                    		<a href="{{ route('locations.edit', $location->id) }}" class="btn btn-xs btn-flat btn-warning"><i class="ti-pencil"></i></a>
                                                @endcan
                                                @can('delete-locations')
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
                        	<div class="alert alert-warning">There are no locations created at the moment.</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- table success end -->
</div>
@stop