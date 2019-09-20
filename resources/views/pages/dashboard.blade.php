@extends('layouts.master')
@section('content')
<!-- sales report area start -->
    <div class="sales-report-area mt-5 mb-5">
        <div class="row">
            @if (!is_object(auth()->user()->profile))
                <div class="col-md-12 mb-5">
                    <div class="alert alert-danger" role="alert">
                        <h4 class="alert-heading">Update your User Profile!!</h4>
                        <p>Please update your profile details in order to enjoy the features of this application.</p>
                        <br>
                        <a href="#" class="btn btn-danger btn-xs">Go to Profile</a>
                    </div>
                </div>
            @endif

            <div class="col-md-4">
                <a href="{{ route('tickets.create') }}" class="btn btn-block btn-info">Create Support Ticket</a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('trainings.create') }}" class="btn btn-block btn-primary">Add Training</a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('create.proposed') }}" class="btn btn-block btn-info">Propose Training</a>
            </div>
        </div>
    </div>
    <!-- sales report area end -->
@stop