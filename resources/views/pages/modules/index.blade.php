@extends('layouts.master')
@section('title', 'ERP Portal | Modules')
@section('content')
<div class="row">
	<!-- table success start -->
    <div class="col-md-12 mt-5">
        <div class="card">
            <div class="card-body">
            	<div class="row">
            		<div class="col-md-8"><h4 class="header-title">Modules</h4></div>
            		<div class="col-md-4"><a href="{{ route('modules.create') }}" class="btn btn-flat btn-xs btn-primary mb-3 float-right">Create Modules</a></div>
            	</div>
                
                
                <div class="single-table">
                    <div class="table-responsive">
                    	@if($modules->count() > 0)
                        <table class="table text-center">
                            <thead class="text-uppercase bg-success">
                                <tr class="text-white">
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Permission</th>
                                    <th scope="col">Route</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@php
                            		$count = 1;
                            	@endphp
                            	@foreach ($modules as $module)
                            		<tr>
	                                    <th scope="row">{{ $count++ }}</th>
	                                    <td>{{ $module->name }}</td>
	                                    <td>{{ $module->permission }}</td>
                                        <td>{{ $module->route }}</td>
	                                    <td>
	                                    	<form action="{{ route('modules.destroy', $module->id) }}" method="POST">
	                                    		@csrf
	                                    		@method('DELETE')
	                                    		<a href="{{ route('modules.edit', $module->id) }}" class="btn btn-xs btn-flat btn-warning"><i data-feather="edit"></i></a>
	                                    		<button type="submit" class="btn btn-xs btn-flat btn-danger">
	                                    			<i data-feather="trash-2"></i>
	                                    		</button>
	                                    	</form>
	                                    </td>
	                                </tr>
                            	@endforeach
                            </tbody>
                        </table>
                        @else
                        	<div class="alert alert-warning">There are no modules created at the moment.</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- table success end -->
</div>
@stop