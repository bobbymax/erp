@extends('layouts.master')
@section('title', 'ERP Portal | Groups')
@section('content')
<div class="row">
	<!-- table success start -->
    <div class="col-md-12 mt-5">
        <div class="card">
            <div class="card-body">
            	<div class="row">
            		<div class="col-md-8"><h4 class="header-title">Groups</h4></div>
            		<div class="col-md-4"><a href="{{ route('groups.create') }}" class="btn btn-flat btn-xs btn-primary mb-3 float-right">Create Group</a></div>
            	</div>
                
                
                <div class="single-table">
                    <div class="table-responsive">
                    	@if($groups->count() > 0)
                        <table class="table text-center">
                            <thead class="text-uppercase bg-success">
                                <tr class="text-white">
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Relative</th>
                                    <th scope="col">Parent Group</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@php
                            		$count = 1;
                            	@endphp
                            	@foreach ($groups as $group)
                            		<tr>
	                                    <th scope="row">{{ $count++ }}</th>
	                                    <td>{{ $group->name }}</td>
	                                    <td>{{ $group->relative === 0 ? 'None' : $group->getDivision->name }}</td>
	                                    <td>{{ $group->parent === 0 ? 'None' : $group->getDirectorate->name }}</td>
	                                    <td>
	                                    	<form action="{{ route('groups.destroy', $group->id) }}" method="POST">
	                                    		@csrf
	                                    		@method('DELETE')
                                                <a href="{{ route('groups.show', $group->id) }}" class="btn btn-flat btn-xs btn-info">Give Permissions</a>
	                                    		<a href="{{ route('groups.edit', $group->id) }}" class="btn btn-xs btn-flat btn-warning"><i data-feather="edit"></i></a>
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
                        	<div class="alert alert-warning">There are no groups created at the moment.</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- table success end -->
</div>
@stop