@extends('layouts.master')
@section('title', 'ERP Portal | Per Diems')
@section('content')
<div class="row">
	<!-- table success start -->
    <div class="col-md-12 mt-5">
        <div class="card">
            <div class="card-body">
            	<div class="row">
            		<div class="col-md-8"><h4 class="header-title">Local Per Diem</h4><a href="{{ route('gradeGroups.index') }}" class="btn btn-flat btn-xs btn-danger"><i class="ti-close"></i>&nbsp;&nbsp; Back to Grade Groups</a></div>
                    @can('create-grade-groups')
            		<div class="col-md-4">
                        <a href="{{ route('create.diems', $gradeGroup->label) }}" class="btn btn-flat btn-xs btn-primary mb-3 float-right">Add Local Per Diem</a></div>
                    @endcan
            	</div>
                
                
                <div class="single-table">
                    <div class="table-responsive">
                    	@if($gradeGroup->travelCategories->count() > 0)
                        <table class="table text-center">
                            <thead class="text-uppercase bg-success">
                                <tr class="text-white">
                                    <th scope="col">ID</th>
                                    <th scope="col">Grades</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@php
                            		$count = 1;
                            	@endphp
                            	@foreach ($gradeGroup->travelCategories as $perdiem)
                            		<tr>
	                                    <th scope="row">{{ $count++ }}</th>
                                        <td>{{ $perdiem->type }}</td>
	                                    <td>{{ FormatLongNumber($perdiem->pivot->per_diem) }}</td>
	                                    <td>
	                                    	<form action="{{ route('destroy.per.diem', [$gradeGroup->id, $perdiem->id]) }}" method="POST">
	                                    		@csrf
	                                    		@method('DELETE')
                                                @can('edit-grade-groups')
	                                    		<a href="{{ route('edit.per.diem', [$gradeGroup->id, $perdiem->id]) }}" class="btn btn-xs btn-flat btn-warning"><i data-feather="edit"></i></a>
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
                        	<div class="alert alert-warning">There are no per diem rates created at the moment.</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- table success end -->
</div>
@stop