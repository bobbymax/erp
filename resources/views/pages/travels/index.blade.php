@extends('layouts.master')
@section('title', 'ERP Portal | Travel Categories')
@section('content')
<div class="row">
	<!-- table success start -->
    <div class="col-md-12 mt-5">
        <div class="card">
            <div class="card-body">
            	<div class="row">
            		<div class="col-md-8"><h4 class="header-title">Travel Categories</h4></div>
                    @can('create-travels-categories')
            		<div class="col-md-4"><a href="{{ route('travels.create') }}" class="btn btn-flat btn-xs btn-primary mb-3 float-right">Create Travel Category</a></div>
                    @endcan
            	</div>
                
                
                <div class="single-table">
                    <div class="table-responsive">
                    	@if($travels->count() > 0)
                        <table class="table text-center">
                            <thead class="text-uppercase bg-success">
                                <tr class="text-white">
                                    <th scope="col">ID</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Locations</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@php
                            		$count = 1;
                            	@endphp
                            	@foreach ($travels as $travel)
                            		<tr>
	                                    <th scope="row">{{ $count++ }}</th>
	                                    <td>{{ $travel->type }}</td>
	                                    <td>{{ $travel->locations }}</td>
	                                    <td>
	                                    	<form action="{{ route('travels.destroy', $travel->id) }}" method="POST">
	                                    		@csrf
	                                    		@method('DELETE')
                                                @can('edit-travels-categories')
	                                    		<a href="{{ route('travels.edit', $travel->id) }}" class="btn btn-xs btn-flat btn-warning"><i data-feather="edit"></i></a>
                                                @endcan
                                                @can('delete-travels-categories')
	                                    		<button type="submit" class="btn btn-xs btn-flat btn-danger">
	                                    			<i data-feather="trash-2"></i>
	                                    		</button>
                                                @endcan
	                                    	</form>
	                                    </td>
	                                </tr>
                            	@endforeach
                            </tbody>
                        </table>
                        @else
                        	<div class="alert alert-warning">There are no travels created at the moment.</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- table success end -->
</div>
@stop