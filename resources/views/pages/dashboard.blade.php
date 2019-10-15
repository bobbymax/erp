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
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1 mg-b-10">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Helpdesk Management</li>
          </ol>
        </nav>
        <h4 class="mg-b-0 tx-spacing--1">Welcome to Dashboard</h4>
      </div>
      <div class="d-none d-md-block">
        <button class="btn btn-sm pd-x-15 btn-white btn-uppercase"><i data-feather="save" class="wd-10 mg-r-5"></i> Save</button>
        <button class="btn btn-sm pd-x-15 btn-white btn-uppercase mg-l-5"><i data-feather="share-2" class="wd-10 mg-r-5"></i> Share</button>
        <button class="btn btn-sm pd-x-15 btn-primary btn-uppercase mg-l-5"><i data-feather="plus" class="wd-10 mg-r-5"></i> Add New Ticket</button>
      </div>
    </div>

    <div class="row row-xs">
      <div class="col-lg-8">
        <div class="card">
          <div class="card-header d-sm-flex justify-content-between bd-b-0 pd-t-20 pd-b-0">
            <div class="mg-b-10 mg-sm-b-0">
              <h6 class="mg-b-5">Current Ticket Status</h6>
              <p class="tx-12 tx-color-03 mg-b-0">as of 10th to 17th of March 2019</p>
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
              <div id="flotChart1" class="flot-chart"></div>
            </div>
          </div><!-- card-body -->
          <div class="card-footer pd-y-15 pd-x-20">
            <div class="row row-sm">
              <div class="col-6 col-sm-4 col-md-3 col-lg">
                <h4 class="tx-normal tx-rubik mg-b-10">156</h4>
                <div class="progress ht-2 mg-b-10">
                  <div class="progress-bar wd-100p bg-df-2" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h6 class="tx-uppercase tx-spacing-1 tx-semibold tx-10 tx-color-02 mg-b-2">New Tickets</h6>
                <p class="tx-10 tx-color-03 mg-b-0"><span class="tx-medium tx-success">1.2% <i class="icon ion-md-arrow-down"></i></span> than yesterday</p>
              </div><!-- col -->
              <div class="col-6 col-sm-4 col-md-3 col-lg">
                <h4 class="tx-normal tx-rubik mg-b-10">86</h4>
                <div class="progress ht-2 mg-b-10">
                  <div class="progress-bar wd-85p bg-df-2" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h6 class="tx-uppercase tx-spacing-1 tx-semibold tx-10 tx-color-02 mg-b-2">Solved Tickets</h6>
                <p class="tx-10 tx-color-03 mg-b-0"><span class="tx-medium tx-danger">-0.6% <i class="icon ion-md-arrow-down"></i></span> than yesterday</p>
              </div><!-- col -->
              <div class="col-6 col-sm-4 col-md-3 col-lg mg-t-20 mg-sm-t-0">
                <h4 class="tx-normal tx-rubik mg-b-10">27</h4>
                <div class="progress ht-2 mg-b-10">
                  <div class="progress-bar wd-25p bg-df-2" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h6 class="tx-uppercase tx-spacing-1 tx-semibold tx-10 tx-color-02 mg-b-2">Unresolved Tickets</h6>
                <p class="tx-10 tx-color-03 mg-b-0"><span class="tx-medium tx-success">0.3% <i class="icon ion-md-arrow-down"></i></span> than yesterday</p>
              </div><!-- col -->
              <div class="col-6 col-sm-4 col-md-3 col-lg mg-t-20 mg-md-t-0">
                <h4 class="tx-normal tx-rubik mg-b-10">45</h4>
                <div class="progress ht-2 mg-b-10">
                  <div class="progress-bar wd-45p bg-df-2" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h6 class="tx-uppercase tx-spacing-1 tx-semibold tx-10 tx-color-02 mg-b-2">Open Tickets</h6>
                <p class="tx-10 tx-color-03 mg-b-0"><span class="tx-medium tx-success">0.3% <i class="icon ion-md-arrow-down"></i></span> than yesterday</p>
              </div><!-- col -->
              <div class="col-6 col-sm-4 col-md-3 col-lg mg-t-20 mg-lg-t-0">
                <h4 class="tx-normal tx-rubik mg-b-10">30</h4>
                <div class="progress ht-2 mg-b-10">
                  <div class="progress-bar wd-30p bg-df-2" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h6 class="tx-uppercase tx-spacing-1 tx-semibold tx-10 tx-color-02 mg-b-2">Unassigned</h6>
                <p class="tx-10 tx-color-03 mg-b-0"><span class="tx-medium tx-success">0.3% <i class="icon ion-md-arrow-down"></i></span> than yesterday</p>
              </div><!-- col -->
            </div><!-- row -->
          </div><!-- card-footer -->
        </div><!-- card -->
        <div class="row row-xs mg-t-10">
          <div class="col-md-7">
            <div class="card">
              <div class="card-header pd-b-0 pd-t-20 bd-b-0">
                <h6 class="mg-b-0">Tickets By Request Type</h6>
              </div><!-- card-header -->
              <div class="card-body">
                <div class="chart-seventeen"><canvas id="chartBar2"></canvas></div>
              </div><!-- card-body -->
            </div><!-- card -->
          </div>
          <div class="col-md-5 mg-t-10 mg-md-t-0">
            <div class="card">
              <div class="card-header pd-b-0 pd-t-20 bd-b-0">
                <h6 class="mg-b-0">Customer Satisfaction</h6>
              </div><!-- card-header -->
              <div class="card-body pd-y-10">
                <div class="d-flex align-items-baseline tx-rubik">
                  <h1 class="tx-40 lh-1 tx-normal tx-spacing--2 mg-b-5 mg-r-5">9.8</h1>
                  <p class="tx-11 tx-color-03 mg-b-0"><span class="tx-medium tx-success">1.6% <i class="icon ion-md-arrow-up"></i></span></p>
                </div>
                <h6 class="tx-uppercase tx-spacing-1 tx-semibold tx-10 tx-color-02 mg-b-15">Performance Score</h6>

                <div class="progress bg-transparent op-7 ht-10 mg-b-15">
                  <div class="progress-bar bg-primary wd-50p" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                  <div class="progress-bar bg-success wd-25p bd-l bd-white" role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                  <div class="progress-bar bg-warning wd-5p bd-l bd-white" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100"></div>
                  <div class="progress-bar bg-pink wd-5p bd-l bd-white" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100"></div>
                  <div class="progress-bar bg-teal wd-10p bd-l bd-white" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                  <div class="progress-bar bg-purple wd-5p bd-l bd-white" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                </div>

                <table class="table-dashboard-two">
                  <tbody>
                    <tr>
                      <td><div class="wd-12 ht-12 rounded-circle bd bd-3 bd-primary"></div></td>
                      <td class="tx-medium">Excellent</td>
                      <td class="text-right">3,007</td>
                      <td class="text-right">50%</td>
                    </tr>
                    <tr>
                      <td><div class="wd-12 ht-12 rounded-circle bd bd-3 bd-success"></div></td>
                      <td class="tx-medium">Very Good</td>
                      <td class="text-right">1,674</td>
                      <td class="text-right">25%</td>
                    </tr>
                    <tr>
                      <td><div class="wd-12 ht-12 rounded-circle bd bd-3 bd-warning"></div></td>
                      <td class="tx-medium">Good</td>
                      <td class="text-right">125</td>
                      <td class="text-right">6%</td>
                    </tr>
                    <tr>
                      <td><div class="wd-12 ht-12 rounded-circle bd bd-3 bd-pink"></div></td>
                      <td class="tx-medium">Fair</td>
                      <td class="text-right">98</td>
                      <td class="text-right">5%</td>
                    </tr>
                    <tr>
                      <td><div class="wd-12 ht-12 rounded-circle bd bd-3 bd-teal"></div></td>
                      <td class="tx-medium">Poor</td>
                      <td class="text-right">512</td>
                      <td class="text-right">10%</td>
                    </tr>
                    <tr>
                      <td><div class="wd-12 ht-12 rounded-circle bd bd-3 bd-purple"></div></td>
                      <td class="tx-medium">Very Poor</td>
                      <td class="text-right">81</td>
                      <td class="text-right">4%</td>
                    </tr>
                  </tbody>
                </table>
              </div><!-- card-body -->
            </div><!-- card -->
          </div>
          <div class="col-md-6 mg-t-10">
            <div class="card">
              <div class="card-header pd-b-0 pd-x-20 bd-b-0">
                <div class="d-sm-flex align-items-center justify-content-between">
                  <h6 class="mg-b-0">Recent Activities</h6>
                  <p class="tx-12 tx-color-03 mg-b-0">Last activity: 2 hours ago</p>
                </div>
              </div><!-- card-header -->
              <div class="card-body pd-20">
                <ul class="activity tx-13">
                  <li class="activity-item">
                    <div class="activity-icon bg-primary-light tx-primary">
                      <i data-feather="clock"></i>
                    </div>
                    <div class="activity-body">
                      <p class="mg-b-2"><strong>Louise</strong> added a time entry to the ticket <a href="" class="link-02"><strong>Sales Revenue</strong></a></p>
                      <small class="tx-color-03">2 hours ago</small>
                    </div><!-- activity-body -->
                  </li><!-- activity-item -->
                  <li class="activity-item">
                    <div class="activity-icon bg-success-light tx-success">
                      <i data-feather="paperclip"></i>
                    </div>
                    <div class="activity-body">
                      <p class="mg-b-2"><strong>Kevin</strong> added new attachment to the ticket <a href="" class="link-01"><strong>Software Bug Reporting</strong></a></p>
                      <small class="tx-color-03">5 hours ago</small>
                    </div><!-- activity-body -->
                  </li><!-- activity-item -->
                  <li class="activity-item">
                    <div class="activity-icon bg-warning-light tx-orange">
                      <i data-feather="share"></i>
                    </div>
                    <div class="activity-body">
                      <p class="mg-b-2"><strong>Natalie</strong> reassigned ticket <a href="" class="link-02"><strong>Problem installing software</strong></a> to <strong>Katherine</strong></p>
                      <small class="tx-color-03">8 hours ago</small>
                    </div><!-- activity-body -->
                  </li><!-- activity-item -->
                  <li class="activity-item">
                    <div class="activity-icon bg-pink-light tx-pink">
                      <i data-feather="plus-circle"></i>
                    </div>
                    <div class="activity-body">
                      <p class="mg-b-2"><strong>Katherine</strong> submitted new ticket <a href="" class="link-02"><strong>Payment Method</strong></a></p>
                      <small class="tx-color-03">Yesterday</small>
                    </div><!-- activity-body -->
                  </li><!-- activity-item -->
                  <li class="activity-item">
                    <div class="activity-icon bg-indigo-light tx-indigo">
                      <i data-feather="settings"></i>
                    </div>
                    <div class="activity-body">
                      <p class="mg-b-2"><strong>Katherine</strong> changed settings to ticket category <a href="" class="link-02"><strong>Payment &amp; Invoice</strong></a></p>
                      <small class="tx-color-03">2 days ago</small>
                    </div><!-- activity-body -->
                  </li><!-- activity-item -->
                </ul><!-- activity -->
              </div><!-- card-body -->
            </div><!-- card -->
          </div>
          <div class="col-md-6 mg-t-10">
            <div class="card">
              <div class="card-header pd-b-0 pd-x-20 bd-b-0">
                <h6 class="mg-b-0">Agent Performance Points</h6>
              </div><!-- card-header -->
              <div class="card-body pd-t-25">
                <div class="media">
                  <div class="avatar"><img src="https://via.placeholder.com/500" class="rounded-circle" alt=""></div>
                  <div class="media-body mg-l-15">
                    <h6 class="tx-13 mg-b-2">Katherine Lumaad</h6>
                    <p class="tx-color-03 tx-12 mg-b-10">Technical Support</p>
                    <div class="progress ht-4 op-7 mg-b-5">
                      <div class="progress-bar wd-85p" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="d-flex justify-content-between tx-12">
                      <span class="tx-color-03">Executive Level</span>
                      <strong class="tx-medium">12,312 points</strong>
                    </div>
                  </div><!-- media-body -->
                </div><!-- media -->
                <div class="media mg-t-25">
                  <div class="avatar"><img src="https://via.placeholder.com/500" class="rounded-circle" alt=""></div>
                  <div class="media-body mg-l-15">
                    <h6 class="tx-13 mg-b-2">Adrian Monino</h6>
                    <p class="tx-color-03 tx-12 mg-b-10">Sales Representative</p>
                    <div class="progress ht-4 op-7 mg-b-5">
                      <div class="progress-bar bg-success wd-60p" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="d-flex justify-content-between tx-12">
                      <span class="tx-color-03">Master Level</span>
                      <strong class="tx-medium">10,044 points</strong>
                    </div>
                  </div><!-- media-body -->
                </div><!-- media -->
                <div class="media mg-t-25">
                  <div class="avatar"><img src="https://via.placeholder.com/500" class="rounded-circle" alt=""></div>
                  <div class="media-body mg-l-15">
                    <h6 class="tx-13 mg-b-2">Rolando Paloso</h6>
                    <p class="tx-color-03 tx-12 mg-b-10">Software Support</p>
                    <div class="progress ht-4 op-7 mg-b-5">
                      <div class="progress-bar bg-indigo wd-45p" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="d-flex justify-content-between tx-12">
                      <span class="tx-color-03">Super Elite Level</span>
                      <strong class="tx-medium">7,500 points</strong>
                    </div>
                  </div><!-- media-body -->
                </div><!-- media -->
                <div class="media mg-t-20">
                  <div class="avatar"><img src="https://via.placeholder.com/500" class="rounded-circle" alt=""></div>
                  <div class="media-body mg-l-15">
                    <h6 class="tx-13 mg-b-2">Dyanne Rose Aceron</h6>
                    <p class="tx-color-03 tx-12 mg-b-10">Sales Representative</p>
                    <div class="progress ht-4 op-7 mg-b-5">
                      <div class="progress-bar bg-pink wd-40p" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="d-flex justify-content-between tx-12">
                      <span class="tx-color-03">Elite Level</span>
                      <strong class="tx-medium">6,870 points</strong>
                    </div>
                  </div><!-- media-body -->
                </div><!-- media -->
              </div><!-- card-body -->
            </div><!-- card -->
          </div>
        </div><!-- row -->
      </div><!-- col -->
      <div class="col-lg-4 mg-t-10 mg-lg-t-0">
        <div class="row row-xs">
          <div class="col-12 col-md-6 col-lg-12">
            <div class="card card-body">
              <div class="media d-block d-sm-flex align-items-center">
                <div class="d-inline-block pos-relative">
                  <span class="peity-donut" data-peity='{ "fill": ["#65e0e0","#e5e9f2"], "height": 110, "width": 110, "innerRadius": 46 }'>70,30</span>

                  <div class="pos-absolute a-0 d-flex flex-column align-items-center justify-content-center">
                    <h3 class="tx-rubik tx-spacing--1 mg-b-0">86%</h3>
                    <span class="tx-9 tx-semibold tx-sans tx-color-03 tx-uppercase">Reached</span>
                  </div>
                </div>
                <div class="media-body mg-t-20 mg-sm-t-0 mg-sm-l-20">
                  <h6 class="mg-b-5">Time to Resolved Complaint</h6>
                  <p class="lh-4 tx-12 tx-color-03 mg-b-15">The average time taken to resolve complaints.</p>
                  <h3 class="tx-spacing--1 mg-b-0">7m:32s <small class="tx-13 tx-color-03">/ Goal: 8m:0s</small></h3>
                </div><!-- media-body -->
              </div><!-- media -->
            </div>
          </div><!-- col -->
          <div class="col-12 col-md-6 col-lg-12 mg-t-10 mg-md-t-0 mg-lg-t-10">
            <div class="card card-body">
              <div class="media d-block d-sm-flex align-items-center">
                <div class="d-inline-block pos-relative">
                  <span class="peity-donut" data-peity='{ "fill": ["#69b2f8","#e5e9f2"], "height": 110, "width": 110, "innerRadius": 46 }'>69,31</span>

                  <div class="pos-absolute a-0 d-flex flex-column align-items-center justify-content-center">
                    <h3 class="tx-rubik tx-spacing--1 mg-b-0">69%</h3>
                    <span class="tx-9 tx-semibold tx-sans tx-color-03 tx-uppercase">Reached</span>
                  </div>
                </div>
                <div class="media-body mg-t-20 mg-sm-t-0 mg-sm-l-20">
                  <h6 class="mg-b-5">Average Speed of Answer</h6>
                  <p class="lh-4 tx-12 tx-color-03 mg-b-15">Measure how quickly support staff answer incoming calls.</p>
                  <h3 class="tx-spacing--1 mg-b-0">0m:20s <small class="tx-13 tx-color-03">/ Goal: 0m:10s</small></h3>
                </div><!-- media-body -->
              </div><!-- media -->
            </div>
          </div><!-- col -->
          <div class="col-12 col-md-6 col-lg-12 mg-t-10">
            <div class="card">
              <div class="card-header pd-t-20 pd-b-0 bd-b-0 d-flex justify-content-between">
                <h6 class="lh-5 mg-b-0">Complaints Received</h6>
                <a href="" class="tx-13 link-03">This Month <i class="icon ion-ios-arrow-down tx-12"></i></a>
              </div><!-- card-header -->
              <div class="card-body pd-0 pos-relative">
                <div class="pos-absolute t-10 l-20 z-index-10">
                  <div class="d-flex align-items-baseline">
                    <h1 class="tx-normal tx-rubik mg-b-0 mg-r-5">165</h1>
                    <p class="tx-11 tx-color-03 mg-b-0"><span class="tx-medium tx-success">0.3% <i class="icon ion-md-arrow-down"></i></span> than last month</p>
                  </div>
                  <p class="tx-12 tx-color-03 wd-60p">The total number of complaints that have been received.</p>
                </div>

                <div class="chart-sixteen">
                  <div id="flotChart2" class="flot-chart"></div>
                </div>
              </div><!-- card-body -->
            </div><!-- card -->
          </div><!-- col -->
          <div class="col-12 col-md-6 col-lg-12 mg-t-10">
            <div class="card">
              <div class="card-header pd-t-20 pd-b-0 bd-b-0">
                <h6 class="lh-5 mg-b-5">Overall Rating</h6>
                <p class="tx-12 tx-color-03 mg-b-0">Measures the quality or your support team’s efforts.</p>
              </div><!-- card-header -->
              <div class="card-body pd-0">
                <div class="pd-t-10 pd-b-15 pd-x-20 d-flex align-items-baseline">
                  <h1 class="tx-normal tx-rubik mg-b-0 mg-r-5">4.2</h1>
                  <div class="tx-18">
                    <i class="icon ion-md-star lh-0 tx-orange"></i>
                    <i class="icon ion-md-star lh-0 tx-orange"></i>
                    <i class="icon ion-md-star lh-0 tx-orange"></i>
                    <i class="icon ion-md-star lh-0 tx-orange"></i>
                    <i class="icon ion-md-star lh-0 tx-gray-300"></i>
                  </div>
                </div>
                <div class="list-group list-group-flush tx-13">
                  <div class="list-group-item pd-y-5 pd-x-20 d-flex align-items-center">
                    <strong class="tx-12 tx-rubik">5.0</strong>
                    <div class="tx-16 mg-l-10">
                      <i class="icon ion-md-star lh-0 tx-orange"></i>
                      <i class="icon ion-md-star lh-0 tx-orange"></i>
                      <i class="icon ion-md-star lh-0 tx-orange"></i>
                      <i class="icon ion-md-star lh-0 tx-orange"></i>
                      <i class="icon ion-md-star lh-0 tx-orange"></i>
                    </div>
                    <div class="mg-l-auto tx-rubik tx-color-02">4,230</div>
                    <div class="mg-l-20 tx-rubik tx-color-03 wd-10p text-right">58%</div>
                  </div>
                  <div class="list-group-item pd-y-5 pd-x-20 d-flex align-items-center">
                    <strong class="tx-12 tx-rubik">4.0</strong>
                    <div class="tx-16 mg-l-10">
                      <i class="icon ion-md-star lh-0 tx-orange"></i>
                      <i class="icon ion-md-star lh-0 tx-orange"></i>
                      <i class="icon ion-md-star lh-0 tx-orange"></i>
                      <i class="icon ion-md-star lh-0 tx-orange"></i>
                      <i class="icon ion-md-star lh-0 tx-gray-300"></i>
                    </div>
                    <div class="mg-l-auto tx-rubik tx-color-02">1,416</div>
                    <div class="mg-l-20 tx-rubik tx-color-03 wd-10p text-right">24%</div>
                  </div>
                  <div class="list-group-item pd-y-5 pd-x-20 d-flex align-items-center">
                    <strong class="tx-12 tx-rubik">3.0</strong>
                    <div class="tx-16 mg-l-10">
                      <i class="icon ion-md-star lh-0 tx-orange"></i>
                      <i class="icon ion-md-star lh-0 tx-orange"></i>
                      <i class="icon ion-md-star lh-0 tx-orange"></i>
                      <i class="icon ion-md-star lh-0 tx-gray-300"></i>
                      <i class="icon ion-md-star lh-0 tx-gray-300"></i>
                    </div>
                    <div class="mg-l-auto tx-rubik tx-color-02">980</div>
                    <div class="mg-l-20 tx-rubik tx-color-03 wd-10p text-right">16%</div>
                  </div>
                  <div class="list-group-item pd-y-5 pd-x-20 d-flex align-items-center">
                    <strong class="tx-12 tx-rubik">2.0</strong>
                    <div class="tx-16 mg-l-10">
                      <i class="icon ion-md-star lh-0 tx-orange"></i>
                      <i class="icon ion-md-star lh-0 tx-orange"></i>
                      <i class="icon ion-md-star lh-0 tx-gray-300"></i>
                      <i class="icon ion-md-star lh-0 tx-gray-300"></i>
                      <i class="icon ion-md-star lh-0 tx-gray-300"></i>
                    </div>
                    <div class="mg-l-auto tx-rubik tx-color-02">401</div>
                    <div class="mg-l-20 tx-rubik tx-color-03 wd-10p text-right">8%</div>
                  </div>
                  <div class="list-group-item pd-y-5 pd-x-20 d-flex align-items-center bg-transparent">
                    <strong class="tx-12 tx-rubik">1.0</strong>
                    <div class="tx-16 mg-l-10">
                      <i class="icon ion-md-star lh-0 tx-orange"></i>
                      <i class="icon ion-md-star lh-0 tx-gray-300"></i>
                      <i class="icon ion-md-star lh-0 tx-gray-300"></i>
                      <i class="icon ion-md-star lh-0 tx-gray-300"></i>
                      <i class="icon ion-md-star lh-0 tx-gray-300"></i>
                    </div>
                    <div class="mg-l-auto tx-rubik tx-color-02">798</div>
                    <div class="mg-l-20 tx-rubik tx-color-03 wd-10p text-right">12%</div>
                  </div>
                </div><!-- list-group -->
              </div><!-- card-body -->
            </div><!-- card -->
          </div><!-- col -->
          <div class="col-12 col-md-6 col-lg-12 mg-t-10">
            <div class="card">
              <div class="card-header d-flex align-items-center justify-content-between">
                <h6 class="mg-b-0">Transaction History</h6>
                <div class="d-flex tx-18">
                  <a href="" class="link-03 lh-0"><i class="icon ion-md-refresh"></i></a>
                  <a href="" class="link-03 lh-0 mg-l-10"><i class="icon ion-md-more"></i></a>
                </div>
              </div>
              <ul class="list-group list-group-flush tx-13">
                <li class="list-group-item d-flex pd-sm-x-20">
                  <div class="avatar d-none d-sm-block"><span class="avatar-initial rounded-circle bg-indigo op-5"><i class="icon ion-md-return-left"></i></span></div>
                  <div class="pd-sm-l-10">
                    <p class="tx-medium mg-b-2">Process refund to #00910</p>
                    <small class="tx-12 tx-color-03 mg-b-0">Mar 21, 2019, 1:00pm</small>
                  </div>
                  <div class="mg-l-auto text-right">
                    <p class="tx-medium mg-b-2">-$16.50</p>
                    <small class="tx-12 tx-success mg-b-0">Completed</small>
                  </div>
                </li>
                <li class="list-group-item d-flex pd-sm-x-20">
                  <div class="avatar d-none d-sm-block"><span class="avatar-initial rounded-circle bg-orange op-5"><i class="icon ion-md-bus"></i></span></div>
                  <div class="pd-sm-l-10">
                    <p class="tx-medium mg-b-2">Process delivery to #44333</p>
                    <small class="tx-12 tx-color-03 mg-b-0">Mar 20, 2019, 11:40am</small>
                  </div>
                  <div class="mg-l-auto text-right">
                    <p class="tx-medium mg-b-2">3 Items</p>
                    <small class="tx-12 tx-info mg-b-0">For pickup</small>
                  </div>
                </li>
                <li class="list-group-item d-flex pd-sm-x-20">
                  <div class="avatar d-none d-sm-block"><span class="avatar-initial rounded-circle bg-teal"><i class="icon ion-md-checkmark"></i></span></div>
                  <div class="pd-sm-l-10">
                    <p class="tx-medium mg-b-0">Payment from #023328</p>
                    <small class="tx-12 tx-color-03 mg-b-0">Mar 20, 2019, 10:30pm</small>
                  </div>
                  <div class="mg-l-auto text-right">
                    <p class="tx-medium mg-b-0">+ $129.50</p>
                    <small class="tx-12 tx-success mg-b-0">Completed</small>
                  </div>
                </li>
                <li class="list-group-item d-flex pd-sm-x-20">
                  <div class="avatar d-none d-sm-block"><span class="avatar-initial rounded-circle bg-gray-400"><i class="icon ion-md-close"></i></span></div>
                  <div class="pd-sm-l-10">
                    <p class="tx-medium mg-b-0">Payment failed from #087651</p>
                    <small class="tx-12 tx-color-03 mg-b-0">Mar 19, 2019, 12:54pm</small>
                  </div>
                  <div class="mg-l-auto text-right">
                    <p class="tx-medium mg-b-0">$150.00</p>
                    <small class="tx-12 tx-danger mg-b-0">Declined</small>
                  </div>
                </li>
              </ul>
              <div class="card-footer text-center tx-13">
                <a href="" class="link-03">View All Transactions <i class="icon ion-md-arrow-down mg-l-5"></i></a>
              </div><!-- card-footer -->
            </div><!-- card -->
          </div><!-- col -->
        </div><!-- row -->
      </div><!-- col -->
    </div><!-- row -->
@stop