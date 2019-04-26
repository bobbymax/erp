@extends('layouts.master')
@section('title', 'ERP Portal | Categories')
@section('content')
<div class="row">
	<!-- table success start -->
    <div class="col-md-12 mt-5">
        <div class="card">
            <div class="card-body">
            	<div class="row">
            		<div class="col-md-8"><h4 class="header-title">Categories</h4></div>
                    @can('create-categories')
            		<div class="col-md-4"><a href="{{ route('categories.create') }}" class="btn btn-flat btn-xs btn-primary mb-3 float-right">Create Category</a></div>
                    @endcan
            	</div>
                
                
                <div class="single-table">
                    <div class="table-responsive">
                    	@if($categories->count() > 0)
                        <table class="table text-center">
                            <thead class="text-uppercase bg-success">
                                <tr class="text-white">
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Module</th>
                                    <th scope="col">Icon</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@php
                            		$count = 1;
                            	@endphp
                            	@foreach ($categories as $category)
                            		<tr>
	                                    <th scope="row">{{ $count++ }}</th>
	                                    <td>{{ $category->name }}</td>
	                                    <td>{{ $category->module->name }}</td>
                                        <td>{{ $category->icon }}</td>
	                                    <td>
	                                    	<form action="{{ route('categories.destroy', $category->id) }}" method="POST">
	                                    		@csrf
	                                    		@method('DELETE')
                                                @can('edit-categories')
	                                    		<a href="{{ route('categories.edit', $category->id) }}" class="btn btn-xs btn-flat btn-warning"><i class="ti-pencil-alt"></i></a>
                                                @endcan
                                                @can('delete-categories')
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
                        	<div class="alert alert-warning">There are no categories created at the moment.</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- table success end -->
</div>
@stop