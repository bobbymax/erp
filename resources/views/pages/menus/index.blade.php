@extends('layouts.master')
@section('title', 'ERP Portal | Menus')
@section('content')
<div class="row">
	<!-- table success start -->
    <div class="col-md-12 mt-5">
        <div class="card">
            <div class="card-body">
            	<div class="row">
            		<div class="col-md-8"><h4 class="header-title">Menus</h4></div>
            		<div class="col-md-4"><a href="{{ route('menus.create') }}" class="btn btn-flat btn-xs btn-primary mb-3 float-right">Create Menu</a></div>
            	</div>
                
                
                <div class="single-table">
                    <div class="table-responsive">
                    	@if($menus->count() > 0)
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
                            	@foreach ($menus as $menu)
                            		<tr>
	                                    <th scope="row">{{ $count++ }}</th>
	                                    <td>{{ $menu->name }}</td>
	                                    <td>{{ $menu->permission }}</td>
                                        <td>{{ $menu->route }}</td>
	                                    <td>
	                                    	<form action="{{ route('menus.destroy', $menu->id) }}" method="POST">
	                                    		@csrf
	                                    		@method('DELETE')
	                                    		<a href="{{ route('menus.edit', $menu->id) }}" class="btn btn-xs btn-flat btn-warning"><i class="ti-pencil"></i></a>
	                                    		<button type="submit" class="btn btn-xs btn-flat btn-danger">
	                                    			<i class="ti-trash"></i>
	                                    		</button>
	                                    	</form>
	                                    </td>
	                                </tr>
                            	@endforeach
                            </tbody>
                        </table>
                        @else
                        	<div class="alert alert-warning">There are no menus created at the moment.</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- table success end -->
</div>
@stop