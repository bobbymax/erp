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
                        <a href="{{ route('user.account', auth()->user()->staff_no) }}" class="btn btn-danger btn-xs">Go to Profile</a>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <!-- sales report area end -->

    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-30">
      <div>
        <h4 class="mg-b-0 tx-spacing--1">Welcome to Dashboard</h4>
      </div>
    </div>

    <div class="row row-xs">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header d-sm-flex justify-content-between bd-b-0 pd-t-20 pd-b-0">
            <div class="mg-b-10 mg-sm-b-0">
              <h6 class="mg-b-5">Accumulated Ticket Status</h6>
            </div>
            <ul class="list-inline tx-uppercase tx-10 tx-medium tx-spacing-1 tx-color-03 mg-b-0">
              <li class="list-inline-item">
                <span class="d-inline-block wd-7 ht-7 bg-gray-400 rounded-circle mg-r-5"></span>
                New<span class="d-none d-md-inline"> Tickets</span>
              </li>
              <li class="list-inline-item mg-l-10">
                <span class="d-inline-block wd-7 ht-7 bg-df-2 rounded-circle mg-r-5"></span>
                Solved<span class="d-none d-md-inline"> Tickets</span>
              </li>
              <li class="list-inline-item mg-l-10">
                <span class="d-inline-block wd-7 ht-7 bg-primary rounded-circle mg-r-5"></span>
                Open<span class="d-none d-md-inline"> Tickets</span>
              </li>
            </ul>
          </div>
          <div class="card-body">
            <div class="chart-fifteen">
              <div id="flotChart2" class="flot-chart"></div>
            </div>
          </div><!-- card-body -->
          <div class="card-footer pd-y-15 pd-x-20">
            <div class="row row-sm">
              <div class="col-6 col-sm-4 col-md-3 col-lg">
                <h4 class="tx-normal tx-rubik mg-b-10">{{ auth()->user()->tickets->count() }}</h4>
                <div class="progress ht-2 mg-b-10">
                  <div class="progress-bar wd-100p bg-df-2" role="progressbar" aria-valuenow="{{ auth()->user()->tickets->count() }}" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h6 class="tx-uppercase tx-spacing-1 tx-semibold tx-10 tx-color-02 mg-b-2">New Tickets</h6>
              </div><!-- col -->
              <div class="col-6 col-sm-4 col-md-3 col-lg">
                <h4 class="tx-normal tx-rubik mg-b-10">{{ auth()->user()->tickets->where('status', 'resolved')->count() }}</h4>
                <div class="progress ht-2 mg-b-10">
                  <div class="progress-bar wd-85p bg-df-2" role="progressbar" aria-valuenow="{{ auth()->user()->tickets->where('status', 'resolved')->count() }}" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h6 class="tx-uppercase tx-spacing-1 tx-semibold tx-10 tx-color-02 mg-b-2">Solved Tickets</h6>
              </div><!-- col -->


              <div class="col-6 col-sm-4 col-md-3 col-lg mg-t-20 mg-sm-t-0">
                <h4 class="tx-normal tx-rubik mg-b-10">{{ auth()->user()->tickets->where('status', 'unresolved')->count() }}</h4>
                <div class="progress ht-2 mg-b-10">
                  <div class="progress-bar wd-25p bg-df-2" role="progressbar" aria-valuenow="{{ auth()->user()->tickets->where('status', 'unresolved')->count() }}" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h6 class="tx-uppercase tx-spacing-1 tx-semibold tx-10 tx-color-02 mg-b-2">Unresolved Tickets</h6>
              </div><!-- col -->
              <div class="col-6 col-sm-4 col-md-3 col-lg mg-t-20 mg-md-t-0">
                <h4 class="tx-normal tx-rubik mg-b-10">{{ auth()->user()->tickets->where('status', 'inprogress')->count() }}</h4>
                <div class="progress ht-2 mg-b-10">
                  <div class="progress-bar wd-45p bg-df-2" role="progressbar" aria-valuenow="{{ auth()->user()->tickets->where('status', 'inprogress')->count() }}" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h6 class="tx-uppercase tx-spacing-1 tx-semibold tx-10 tx-color-02 mg-b-2">Open Tickets</h6>
              </div><!-- col -->
              <div class="col-6 col-sm-4 col-md-3 col-lg mg-t-20 mg-lg-t-0">
                <h4 class="tx-normal tx-rubik mg-b-10">{{ auth()->user()->tickets->where('assigned', 0)->count() }}</h4>
                <div class="progress ht-2 mg-b-10">
                  <div class="progress-bar wd-30p bg-df-2" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h6 class="tx-uppercase tx-spacing-1 tx-semibold tx-10 tx-color-02 mg-b-2">Unassigned</h6>
              </div><!-- col -->
            </div><!-- row -->
          </div><!-- card-footer -->
        </div><!-- card -->

      </div><!-- col -->
    </div><!-- row -->
@stop