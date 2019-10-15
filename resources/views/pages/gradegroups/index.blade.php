@extends('layouts.master')
@section('title', 'ERP Portal | Grade Groups')
@section('content')
<div class="row">
	<!-- table success start -->
    <div class="col-md-12 mt-5">
        <div class="card">
            <div class="card-body">
            	<div class="row">
            		<div class="col-md-8"><h4 class="header-title">Grade Groups</h4></div>
                    @can('create-grade-groups')
            		<div class="col-md-4"><a href="{{ route('gradeGroups.create') }}" class="btn btn-flat btn-xs btn-primary mb-3 float-right">Create Grade Group</a></div>
                    @endcan
            	</div>
                
                
                <div class="single-table">
                    <div class="table-responsive">
                    	@if($gradeGroups->count() > 0)
                        <table class="table text-center">
                            <thead class="text-uppercase bg-success">
                                <tr class="text-white">
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Grades</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@php
                            		$count = 1;
                            	@endphp
                            	@foreach ($gradeGroups as $gradeGroup)
                            		<tr>
	                                    <th scope="row">{{ $count++ }}</th>
	                                    <td>{{ $gradeGroup->name }}</td>
	                                    <td>{{ $gradeGroup->grades }}</td>
	                                    <td>
	                                    	<form action="{{ route('gradeGroups.destroy', $gradeGroup->id) }}" method="POST">
	                                    		@csrf
	                                    		@method('DELETE')
                                                @can('edit-grade-groups')
                                                <a href="{{ route('per.diems.index', $gradeGroup->label) }}" class="btn btn-xs btn-primary"><i class="ti-plus"></i> &nbsp;Add Local Per Diem</a>
	                                    		<a href="{{ route('gradeGroups.edit', $gradeGroup->id) }}" class="btn btn-xs btn-flat btn-warning"><i data-feather="edit"></i></a>
                                                @endcan
                                                @can('delete-grade-groups')
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
                        	<div class="alert alert-warning">There are no grade groups created at the moment.</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- table success end -->
</div>
@stop