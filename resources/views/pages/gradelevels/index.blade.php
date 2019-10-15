@extends('layouts.master')
@section('title', 'ERP Portal | Grade Levels')
@section('content')
<div class="row">
	<!-- table success start -->
    <div class="col-md-12 mt-5">
        <div class="card">
            <div class="card-body">
            	<div class="row">
            		<div class="col-md-8"><h4 class="header-title">Grade Levels</h4></div>
                    @can('create-grades')
            		<div class="col-md-4"><a href="{{ route('grades.create') }}" class="btn btn-flat btn-xs btn-primary mb-3 float-right">Create Grade Levels</a></div>
                    @endcan
            	</div>
                
                
                <div class="single-table">
                    <div class="table-responsive">
                    	@if($grades->count() > 0)
                        <table class="table text-center">
                            <thead class="text-uppercase bg-success">
                                <tr class="text-white">
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Code</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@php
                            		$count = 1;
                            	@endphp
                            	@foreach ($grades as $grade)
                            		<tr>
	                                    <th scope="row">{{ $count++ }}</th>
	                                    <td>{{ $grade->name }}</td>
	                                    <td>{{ $grade->code }}</td>
	                                    <td>
	                                    	<form action="{{ route('grades.destroy', $grade->id) }}" method="POST">
	                                    		@csrf
	                                    		@method('DELETE')
                                                @can('edit-grades')
	                                    		<a href="{{ route('grades.edit', $grade->id) }}" class="btn btn-xs btn-flat btn-warning"><i data-feather="edit"></i></a>
                                                @endcan
                                                @can('delete-grades')
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
                        	<div class="alert alert-warning">There are no grades created at the moment.</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- table success end -->
</div>
@stop