@extends('layouts.master')
@section('title', 'ERP Portal | Issue')
@section('content')
<div class="row">
	<!-- table success start -->
    <div class="col-md-12 mt-5">
        <div class="card">
            <div class="card-body">
            	<div class="row">
            		<div class="col-md-8"><h4 class="header-title">Issue</h4></div>
                    @can('create-issues')
            		<div class="col-md-4"><a href="{{ route('issues.create') }}" class="btn btn-flat btn-xs btn-primary mb-3 float-right">Create Issue</a></div>
                    @endcan
            	</div>
                
                
                <div class="single-table">
                    <div class="table-responsive">
                    	@if($issues->count() > 0)
                        <table class="table text-center">
                            <thead class="text-uppercase bg-success">
                                <tr class="text-white">
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@php
                            		$count = 1;
                            	@endphp
                            	@foreach ($issues as $issue)
                            		<tr>
	                                    <th scope="row">{{ $count++ }}</th>
	                                    <td>{{ $issue->name }}</td>
	                                    <td>{{ $issue->category->name }}</td>
	                                    <td>
	                                    	<form action="{{ route('issues.destroy', $issue->id) }}" method="POST">
	                                    		@csrf
	                                    		@method('DELETE')
                                                @can('edit-issues')
	                                    		<a href="{{ route('issues.edit', $issue->id) }}" class="btn btn-xs btn-flat btn-warning"><i class="ti-pencil"></i></a>
                                                @endcan
                                                @can('delete-issues')
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
                        	<div class="alert alert-warning">There are no issues created at the moment.</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- table success end -->
</div>
@stop