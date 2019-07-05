@extends('layouts.master')
@section('content')
<!-- sales report area start -->
    <div class="sales-report-area mt-5 mb-5">
        <div class="row">
            <div class="col-md-4">
                <div class="single-report mb-xs-30">
                    <div class="s-report-inner pr--20 pt--30 mb-3">
                        <div class="icon"><i class="fa fa-users"></i></div>
                        <div class="s-report-title d-flex justify-content-between">
                            <h4 class="header-title mb-0">Users</h4>
                            <p>online</p>
                        </div>
                        <div class="d-flex justify-content-between pb-2">
                            <h2>$ 4567809,987</h2>
                            <span>- 45.87</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="single-report mb-xs-30">
                    <div class="s-report-inner pr--20 pt--30 mb-3">
                        <div class="icon"><i class="fa fa-hourglass-start"></i></div>
                        <div class="s-report-title d-flex justify-content-between">
                            <h4 class="header-title mb-0">Tasks</h4>
                            <p>unattended</p>
                        </div>
                        <div class="d-flex justify-content-between pb-2">
                            <h2>$ 4567809,987</h2>
                            <span>- 45.87</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="single-report">
                    <div class="s-report-inner pr--20 pt--30 mb-3">
                        <div class="icon"><i class="fa fa-ticket"></i></div>
                        <div class="s-report-title d-flex justify-content-between">
                            <h4 class="header-title mb-0">Tickets</h4>
                            <p>unassigned</p>
                        </div>
                        <div class="d-flex justify-content-between pb-2">
                            <h2>$ 4567809,987</h2>
                            <span>- 45.87</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- sales report area end -->
@stop