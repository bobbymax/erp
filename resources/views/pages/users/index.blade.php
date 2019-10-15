@extends('layouts.master')
@section('title', 'ERP Portal | Users')
@section('content')
<div class="row">
	<!-- table success start -->
    <div class="col-md-12 mt-5">
        <div class="card">
            <div class="card-body">
            	<div class="row">
            		<div class="col-md-8"><h4 class="header-title">Users</h4></div>
                    @can('create-users')
                        <div class="col-md-4"><a href="{{ route('users.create') }}" class="btn btn-flat btn-xs btn-primary mb-3 float-right"><i data-feather="user-plus"></i>&nbsp; Create User</a></div>
                    @endcan
            		
            	</div>
                
                
                <div class="single-table">
                    <div class="table-responsive">
                    	@if($users->count() > 0)
                        <table class="table text-center">
                            <thead class="text-uppercase bg-success">
                                <tr class="text-white">
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Staff No.</th>
                                    <th scope="col">Location</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@php
                            		$count = 1;
                            	@endphp
                            	@foreach ($users as $user)
                            		<tr>
	                                    <th scope="row">{{ $count++ }}</th>
	                                    <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
	                                    <td>{{ $user->staff_no }}</td>
                                        <td>{{ $user->location->name }}</td>
	                                    <td>
                                            @can('delete-users')
	                                    	<form action="{{ route('users.destroy', $user->id) }}" method="POST">
	                                    		@csrf
	                                    		@method('DELETE')

                                                @can('edit-users')
                                                <a href="{{ route('users.show', $user->id) }}" class="btn btn-flat btn-info btn-xs">
                                                    <i data-feather="user-check"></i>&nbsp; Add to Group
                                                </a>
	                                    		<a href="{{ route('users.edit', $user->id) }}" class="btn btn-xs btn-flat btn-warning"><i data-feather="edit"></i></a>
                                                @endcan
	                                    		<button type="submit" class="btn btn-xs btn-flat btn-danger">
	                                    			<i data-feather="trash-2"></i>
	                                    		</button>
	                                    	</form>
                                            @endcan
	                                    </td>
	                                </tr>
                            	@endforeach
                            </tbody>
                        </table>
                        @else
                        	<div class="alert alert-warning">There are no users created at the moment.</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- table success end -->
</div>
@stop