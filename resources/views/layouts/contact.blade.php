
<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="DashForge">
    <meta name="twitter:description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="twitter:image" content="http://themepixels.me/dashforge/img/dashforge-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/dashforge">
    <meta property="og:title" content="DashForge">
    <meta property="og:description" content="Responsive Bootstrap 4 Dashboard Template">

    <meta property="og:image" content="http://themepixels.me/dashforge/img/dashforge-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/dashforge/img/dashforge-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="author" content="ThemePixels">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/assets-new/img/favicon.png">

    <title>@yield('title', 'Welcome to NCDMB Local ERP')</title>

    <!-- vendor css -->
    <link href="/assets-new/css/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="/assets-new/css/ionicons/css/ionicons.min.css" rel="stylesheet">

    <!-- DashForge CSS -->
    <link rel="stylesheet" href="/assets-new/css/dashforge.css">
    <link rel="stylesheet" href="/assets-new/css/dashforge.contacts.css">

  </head>
  <body class="app-contact">

    @include('partials.updated.header')

    <div id="users" class="contact-wrapper">
      <div class="contact-navleft">
        <nav class="nav flex-column">
          <a href="#tabContact" class="nav-link active" data-toggle="tab">
            <span data-toggle="tooltip" title="All Contacts" data-placement="right"><i data-feather="users"></i></span>
          </a>
          <a href="#tabPhoneCall" class="nav-link" data-toggle="tab">
            <span data-toggle="tooltip" title="Recently Contacted" data-placement="right"><i data-feather="phone-call"></i></span>
          </a>
          <a href="#tabFavorites" class="nav-link" data-toggle="tab">
            <span data-toggle="tooltip" title="Favorites" data-placement="right"><i data-feather="star"></i></span>
          </a>
          <a href="#tabTags" class="nav-link" data-toggle="tab">
            <span data-toggle="tooltip" title="Contact Labels" data-placement="right"><i data-feather="tag"></i></span>
          </a>
          <a href="#tabExport" class="nav-link" data-toggle="tab">
            <span data-toggle="tooltip" title="Export Contacts" data-placement="right"><i data-feather="upload"></i></span>
          </a>
          <a href="" class="nav-link">
            <span data-toggle="tooltip" title="Contact Settings" data-placement="right"><i data-feather="settings"></i></span>
          </a>
        </nav>
      </div><!-- contact-navleft -->

      <div class="contact-sidebar">
        <div class="contact-sidebar-header">
          <i data-feather="search"></i>
          <div class="search-form">
            <input type="search" class="form-control" placeholder="Search contacts">
          </div>
          <a href="#modalNewContact" class="btn btn-xs btn-icon btn-primary" data-toggle="modal">
            <span data-toggle="tooltip" title="Add New Contact"><i data-feather="user-plus"></i></span>
          </a><!-- contact-add -->
        </div><!-- contact-sidebar-header -->

        <div class="contact-sidebar-body">
          <div class="tab-content">


            <div id="tabContact" class="tab-pane fade active show">

              <div class="pd-y-20 pd-x-10 contact-list">

                <label id="contactA" class="contact-list-divider">STAFF</label>
                <div class="media" v-for="user in profiles" v-on:click="getUser(user.id)">
                  <div class="avatar avatar-sm avatar-online"><span class="avatar-initial rounded-circle bg-gray-700">@{{ user.name.charAt(0) }}</span></div>
                  <div class="media-body mg-l-10">
                    <h6 class="tx-13 mg-b-3">@{{ user.name }}</h6>
                    <span class="tx-12">@{{ user.staff_no }}</span>
                  </div><!-- media-body -->
                  <nav>
                    <a href=""><i data-feather="star"></i></a>
                    <a href=""><i data-feather="edit-2"></i></a>
                  </nav>
                </div><!-- media -->
              </div><!-- contact-list -->
            </div><!-- tab-pane -->


            <div id="tabPhoneCall" class="tab-pane fade">
              <div class="pd-y-20 pd-x-10 contact-list">
                <label class="contact-list-divider">Recently Contacted</label>
                <div class="media">
                  <div class="avatar avatar-sm avatar-online"><img src="https://via.placeholder.com/500" class="rounded-circle" alt=""></div>
                  <div class="media-body mg-l-10">
                    <h6 class="tx-13 mg-b-3">Camille Audrey</h6>
                    <span class="tx-12">+1-234-567-890</span>
                  </div><!-- media-body -->
                  <nav>
                    <a href=""><i data-feather="star"></i></a>
                    <a href=""><i data-feather="edit-2"></i></a>
                  </nav>
                </div><!-- media -->
                <div class="media">
                  <div class="avatar avatar-sm avatar-offline"><span class="avatar-initial rounded-circle bg-success">E</span></div>
                  <div class="media-body mg-l-10">
                    <h6 class="tx-13 mg-b-3">Elvis Vircede</h6>
                    <span class="tx-12">+63929-123-4567</span>
                  </div><!-- media-body -->
                  <nav>
                    <a href=""><i data-feather="star"></i></a>
                    <a href=""><i data-feather="edit-2"></i></a>
                  </nav>
                </div><!-- media -->
              </div><!-- contact-list -->
            </div><!-- tab-pane -->
            <div id="tabFavorites" class="tab-pane fade">
              <div class="pd-y-20 pd-x-10 contact-list">
                <label class="contact-list-divider">My Favorites</label>
                <div class="media">
                  <div class="avatar avatar-sm avatar-online"><img src="https://via.placeholder.com/500" class="rounded-circle" alt=""></div>
                  <div class="media-body mg-l-10">
                    <h6 class="tx-13 mg-b-3">Archie Cantones</h6>
                    <span class="tx-12">archie@cantones.com</span>
                  </div><!-- media-body -->
                  <nav>
                    <a href=""><i data-feather="star"></i></a>
                    <a href=""><i data-feather="edit-2"></i></a>
                  </nav>
                </div><!-- media -->
                <div class="media">
                  <div class="avatar avatar-sm avatar-online"><img src="https://via.placeholder.com/500" class="rounded-circle" alt=""></div>
                  <div class="media-body mg-l-10">
                    <h6 class="tx-13 mg-b-3">Brenda Aceron</h6>
                    <span class="tx-12">brenda@aceron.com</span>
                  </div><!-- media-body -->
                  <nav>
                    <a href=""><i data-feather="star"></i></a>
                    <a href=""><i data-feather="edit-2"></i></a>
                  </nav>
                </div><!-- media -->
                <div class="media">
                  <div class="avatar avatar-sm avatar-online"><span class="avatar-initial rounded-circle bg-indigo">B</span></div>
                  <div class="media-body mg-l-10">
                    <h6 class="tx-13 mg-b-3">Brandibelle Yap</h6>
                    <span class="tx-12">byap@urmail.com</span>
                  </div><!-- media-body -->
                  <nav>
                    <a href=""><i data-feather="star"></i></a>
                    <a href=""><i data-feather="edit-2"></i></a>
                  </nav>
                </div><!-- media -->
                <div class="media">
                  <div class="avatar avatar-sm avatar-online"><img src="https://via.placeholder.com/500" class="rounded-circle" alt=""></div>
                  <div class="media-body mg-l-10">
                    <h6 class="tx-13 mg-b-3">Camille Audrey</h6>
                    <span class="tx-12">+1-234-567-890</span>
                  </div><!-- media-body -->
                  <nav>
                    <a href=""><i data-feather="star"></i></a>
                    <a href=""><i data-feather="edit-2"></i></a>
                  </nav>
                </div><!-- media -->
                <div class="media">
                  <div class="avatar avatar-sm avatar-offline"><span class="avatar-initial rounded-circle bg-success">E</span></div>
                  <div class="media-body mg-l-10">
                    <h6 class="tx-13 mg-b-3">Elvis Vircede</h6>
                    <span class="tx-12">+63929-123-4567</span>
                  </div><!-- media-body -->
                  <nav>
                    <a href=""><i data-feather="star"></i></a>
                    <a href=""><i data-feather="edit-2"></i></a>
                  </nav>
                </div><!-- media -->
              </div><!-- contact-list -->
            </div><!-- tab-pane -->

            <div id="tabTags" class="tab-pane fade">
              <div class="pd-y-20 pd-x-10 contact-list">
                <label class="contact-list-divider">My Family</label>
                <div class="media">
                  <div class="avatar avatar-sm avatar-online"><span class="avatar-initial rounded-circle bg-gray-700">A</span></div>
                  <div class="media-body mg-l-10">
                    <h6 class="tx-13 mg-b-3">Abigail Johnson</h6>
                    <span class="tx-12">+1-234-567-890</span>
                  </div><!-- media-body -->
                  <nav>
                    <a href=""><i data-feather="star"></i></a>
                    <a href=""><i data-feather="edit-2"></i></a>
                  </nav>
                </div><!-- media -->
                <div class="media">
                  <div class="avatar avatar-sm avatar-online"><img src="https://via.placeholder.com/500" class="rounded-circle" alt=""></div>
                  <div class="media-body mg-l-10">
                    <h6 class="tx-13 mg-b-3">Archie Cantones</h6>
                    <span class="tx-12">archie@cantones.com</span>
                  </div><!-- media-body -->
                  <nav>
                    <a href=""><i data-feather="star"></i></a>
                    <a href=""><i data-feather="edit-2"></i></a>
                  </nav>
                </div><!-- media -->
                <label class="contact-list-divider">My Friends</label>
                <div class="media">
                  <div class="avatar avatar-sm avatar-online"><span class="avatar-initial rounded-circle bg-primary">a</span></div>
                  <div class="media-body mg-l-10">
                    <h6 class="tx-13 mg-b-3">Allan Rey Palban</h6>
                    <span class="tx-12">allanr@palban.com</span>
                  </div><!-- media-body -->
                  <nav>
                    <a href=""><i data-feather="star"></i></a>
                    <a href=""><i data-feather="edit-2"></i></a>
                  </nav>
                </div><!-- media -->
                <div class="media">
                  <div class="avatar avatar-sm avatar-offline"><span class="avatar-initial rounded-circle bg-primary">D</span></div>
                  <div class="media-body mg-l-10">
                    <h6 class="tx-13 mg-b-3">Daniel Calinawan</h6>
                    <span class="tx-12">daniel@youremail.com</span>
                  </div><!-- media-body -->
                  <nav>
                    <a href=""><i data-feather="star"></i></a>
                    <a href=""><i data-feather="edit-2"></i></a>
                  </nav>
                </div><!-- media -->
                <div class="media">
                  <div class="avatar avatar-sm avatar-offline"><span class="avatar-initial rounded-circle bg-success">E</span></div>
                  <div class="media-body mg-l-10">
                    <h6 class="tx-13 mg-b-3">Elvis Vircede</h6>
                    <span class="tx-12">+63929-123-4567</span>
                  </div><!-- media-body -->
                  <nav>
                    <a href=""><i data-feather="star"></i></a>
                    <a href=""><i data-feather="edit-2"></i></a>
                  </nav>
                </div><!-- media -->
                <label class="contact-list-divider">My Officemates</label>
                <div class="media">
                  <div class="avatar avatar-sm avatar-online"><span class="avatar-initial rounded-circle bg-gray-700">E</span></div>
                  <div class="media-body mg-l-10">
                    <h6 class="tx-13 mg-b-3">Elena Salubre</h6>
                    <span class="tx-12">e.salubre@myemail.com</span>
                  </div><!-- media-body -->
                  <nav>
                    <a href=""><i data-feather="star"></i></a>
                    <a href=""><i data-feather="edit-2"></i></a>
                  </nav>
                </div><!-- media -->
              </div><!-- contact-list -->
            </div><!-- tab-pane -->

            <div id="tabExport" class="tab-pane fade">
              <div class="pd-y-25 pd-x-20">
                <h6 class="tx-12 tx-semibold tx-spacing-1 tx-uppercase">Export Contacts</h6>
                <p class="tx-13 tx-color-03 mg-b-20">You can export your contacts and import them into other email apps.</p>
                <div class="form-group">
                  <label class="tx-13">Which contacts do you want to export?</label>
                  <select class="custom-select tx-13">
                    <option value="1" selected>All Contacts</option>
                    <option value="2">My Favorites</option>
                    <option value="3">My Family</option>
                    <option value="4">My Friends</option>
                    <option value="4">My Officemates</option>
                  </select>
                </div><!-- form-group -->
                <button class="btn btn-sm btn-primary">Export</button>
              </div>
            </div><!-- tab-pane -->
          </div><!-- tab-content -->
        </div><!-- contact-sidebar-body -->
      </div><!-- contact-sidebar -->

      <div class="contact-content">
        <div class="contact-content-header">
          <nav class="nav">
            <a href="#contactInformation" class="nav-link active" data-toggle="tab">Contact Info<span>rmation</span></a>
            <a href="#contactLogs" class="nav-link" data-toggle="tab"><span>Activities </span>Logs</a>
          </nav>
          <a href="" id="contactOptions" class="text-secondary mg-l-auto d-xl-none"><i data-feather="more-horizontal"></i></a>
        </div><!-- contact-content-header -->

        <div class="contact-content-body">
          <div class="tab-content">

            <div id="contactInformation" class="tab-pane show active pd-20 pd-xl-25">
              <div class="d-flex align-items-center justify-content-between mg-b-25">
                <h6 class="mg-b-0">Personal Details</h6>
                <div class="d-flex">
                  <a href="#modalEditContact" data-toggle="modal" class="btn btn-sm btn-white d-flex align-items-center mg-r-5"><i data-feather="edit-2"></i><span class="d-none d-sm-inline mg-l-5"> Edit</span></a>
                  <a href="#modalDeleteContact" data-toggle="modal" class="btn btn-sm btn-white d-flex align-items-center"><i data-feather="trash"></i><span class="d-none d-sm-inline mg-l-5"> Delete</span></a>
                </div>
              </div>


              {{-- The Personal Details Section --}}

              <div class="row">
                <div class="col-6 col-sm">
                  <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Fullname</label>
                  <p class="mg-b-0" v-text="user.name"></p>
                </div><!-- col -->
                <div class="col-6 col-sm">
                  <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Staff Number</label>
                  <p class="mg-b-0" v-text="user.staff_no"></p>
                </div><!-- col -->
                <div class="col-sm mg-t-20 mg-sm-t-0">
                  <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Grade Level</label>
                  <p class="mg-b-0" v-if="user.profile" v-text="user.profile.grade_level"></p>
                </div><!-- col -->
              </div><!-- row -->

              <h6 class="mg-t-40 mg-b-20">Contact Details</h6>

              <div class="row row-sm">
                <div class="col-6 col-sm-4">
                  <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Email Address</label>
                  <p class="tx-primary tx-rubik mg-b-0" v-text="user.email"></p>
                </div>
                <div class="col-6 col-sm-4">
                  <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Location</label>
                  <p class="tx-primary tx-rubik mg-b-0" v-if="user.location" v-text="user.location.name"></p>
                </div>
                <div class="col-6 col-sm-4 mg-t-20 mg-sm-t-0">
                  <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Room No.</label>
                  <p class="tx-primary tx-rubik mg-b-0" v-text="user.room_no"></p>
                </div>
              </div><!-- row -->
            </div>
            <div id="contactLogs" class="tab-pane pd-20 pd-xl-25">
              <div class="d-flex align-items-center justify-content-between mg-b-30">
                <h6 class="tx-15 mg-b-0">User Activities</h6>
                <a href="#" class="btn btn-sm btn-white d-flex align-items-center"><i class="icon ion-md-time mg-r-5 tx-16 lh--9"></i> Coming Soon</a>
              </div>
            </div><!-- tab-pane -->
          </div><!-- tab-content -->
        </div><!-- contact-content-body -->

        <div class="contact-content-sidebar">
          <div class="clearfix mg-b-25">
            <div id="contactAvatar" class="pos-relative float-left">
              <div class="avatar avatar-xl"><span class="avatar-initial rounded-circle bg-gray-700 tx-normal">A</span></div>
              <a href="" class="contact-edit-photo" data-toggle="tooltip" title="Upload Photo"><i data-feather="edit-2"></i></a>
            </div>
          </div>
          <h5 id="contactName" class="tx-18 tx-xl-20 mg-b-5" v-if="user.groups" v-text="user.name"></h5>
          <hr>
          <div v-for="group in user.groups">
            <p class="tx-13 tx-lg-12 tx-xl-13 tx-color-03 mg-b-20" v-text="group.name">,</p>
          </div>
          

        </div><!-- contact-content-sidebar -->
      </div><!-- contact-content -->

    </div><!-- contact-wrapper -->


    <div class="modal fade effect-scale" id="modalNewContact" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-body pd-20 pd-sm-30">
            <button type="button" class="close pos-absolute t-15 r-20" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>

            <h5 class="tx-18 tx-sm-20 mg-b-20">Create New Contact</h5>
            <p class="tx-13 tx-color-03 mg-b-30">You can add more information than what you see here, such as address and birthday by clicking <span class="tx-color-02">Add More Fields</span> button below to bring up more options.</p>

            <div class="d-sm-flex">
              <div class="mg-sm-r-30">
                <div class="pos-relative d-inline-block mg-b-20">
                  <div class="avatar avatar-xxl"><span class="avatar-initial rounded-circle bg-gray-700 tx-normal"><i class="icon ion-md-person"></i></span></div>
                  <a href="" class="contact-edit-photo"><i data-feather="edit-2"></i></a>
                </div>
              </div><!-- col -->
              <div class="flex-fill">
                <h6 class="mg-b-10">Personal Information</h6>
                <div class="form-group mg-b-10">
                  <input type="text" class="form-control" placeholder="Firstname">
                </div><!-- form-group -->
                <div class="form-group mg-b-10">
                  <input type="text" class="form-control" placeholder="Lastname">
                </div><!-- form-group -->

                <h6 class="mg-t-20 mg-b-10">Contact Information</h6>

                <div class="form-group mg-b-10">
                  <input type="text" class="form-control" placeholder="Phone number">
                </div><!-- form-group -->
                <div class="form-group mg-b-10">
                  <input type="email" class="form-control" placeholder="Email address">
                </div><!-- form-group -->

                <h6 class="mg-t-20 mg-b-10">Notes</h6>
                <textarea class="form-control" rows="2" placeholder="Add notes"></textarea>
              </div><!-- col -->
            </div>
          </div>
          <div class="modal-footer">
            <div class="wd-100p d-flex flex-column flex-sm-row justify-content-end">
              <div class="dropup mg-b-15 mg-sm-b-0 mg-sm-r-auto">
                <button type="button" class="btn btn-block bd bd-gray-300" data-toggle="dropdown">Add More Fields <i class="icon ion-ios-arrow-up mg-l-5"></i></button>
                <div class="dropdown-menu tx-13">
                  <a href="" class="dropdown-item">Email</a>
                  <a href="" class="dropdown-item">Phone</a>
                  <a href="" class="dropdown-item">Address</a>
                  <a href="" class="dropdown-item">Custom</a>
                </div><!-- dropdown-menu -->
              </div>
              <button type="button" class="btn btn-primary mg-b-5 mg-sm-b-0">Save Contact</button>
              <button type="button" class="btn btn-secondary mg-sm-l-5" data-dismiss="modal">Discard</button>
            </div>
          </div><!-- modal-footer -->
        </div><!-- modal-content -->
      </div><!-- modal-dialog -->
    </div><!-- modal -->

    <div class="modal fade effect-scale" id="modalEditContact" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-body pd-20 pd-sm-30">
            <button type="button" class="close pos-absolute t-15 r-20" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>

            <h5 class="tx-18 tx-sm-20 mg-b-20">Edit Contact</h5>
            <p class="tx-13 tx-color-03 mg-b-30">You can add more information than what you see here, such as address and birthday by clicking <span class="tx-color-02">Add More Fields</span> button below to bring up more options.</p>

            <div class="d-sm-flex">
              <div class="mg-sm-r-30">
                <div class="pos-relative d-inline-block mg-b-20">
                  <div class="avatar avatar-xxl"><span class="avatar-initial rounded-circle bg-gray-700 tx-normal">A</span></div>
                  <a href="" class="contact-edit-photo"><i data-feather="edit-2"></i></a>
                </div>
              </div><!-- col -->
              <div class="flex-fill">
                <h6 class="mg-b-10">Personal Information</h6>
                <div class="form-group mg-b-10">
                  <input type="text" class="form-control" placeholder="Firstname" value="Abigail">
                </div><!-- form-group -->
                <div class="form-group mg-b-10">
                  <input type="text" class="form-control" placeholder="Lastname" value="Johnson">
                </div><!-- form-group -->

                <h6 class="mg-t-20 mg-b-10">Contact Information</h6>

                <div class="form-group mg-b-10">
                  <input type="text" class="form-control" placeholder="Phone number" value="+1 234 567 8910">
                </div><!-- form-group -->
                <div class="form-group mg-b-10">
                  <input type="email" class="form-control" placeholder="Email address" value="me@themepixels.me">
                </div><!-- form-group -->

                <h6 class="mg-t-20 mg-b-10">Notes</h6>
                <textarea class="form-control" rows="2" placeholder="Add notes"></textarea>
              </div><!-- col -->
            </div>
          </div>
          <div class="modal-footer">
            <div class="wd-100p d-flex flex-column flex-sm-row justify-content-end">
              <div class="dropup mg-b-15 mg-sm-b-0 mg-sm-r-auto">
                <button type="button" class="btn btn-block bd bd-gray-300" data-toggle="dropdown">Add More Fields <i class="icon ion-ios-arrow-up mg-l-5"></i></button>
                <div class="dropdown-menu tx-13">
                  <a href="" class="dropdown-item">Email</a>
                  <a href="" class="dropdown-item">Phone</a>
                  <a href="" class="dropdown-item">Address</a>
                  <a href="" class="dropdown-item">Custom</a>
                </div><!-- dropdown-menu -->
              </div>
              <button type="button" class="btn btn-primary mg-b-5 mg-sm-b-0">Save Changes</button>
              <button type="button" class="btn btn-secondary mg-sm-l-5" data-dismiss="modal">Cancel</button>
            </div>
          </div><!-- modal-footer -->
        </div><!-- modal-content -->
      </div><!-- modal-dialog -->
    </div><!-- modal -->

    <div class="modal fade effect-scale" id="modalDeleteContact" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title">Delete Contact</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p class="mg-b-0">Do you really want to delete this contact?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary">Continue Delete</button>
          </div>
        </div>
      </div>
    </div>


    <script src="/js/jquery.min.js"></script>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <script src="/assets-new/js/feather-icons/feather.min.js"></script>
    <script src="/assets-new/js/perfect-scrollbar/perfect-scrollbar.min.js"></script>

    <script src="/assets-new/js/dashforge.js"></script>
    <script src="/assets-new/js/dashforge.contacts.js"></script>
    <script src="/js/sweetalert.min.js"></script>

    <!-- append theme customizer -->
    <script src="/assets-new/js/js-cookie/js.cookie.js"></script>
    <script src="/assets-new/js/dashforge.settings.js"></script>
    <script src="/js/typeahead.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

    @include('flash')
    @yield('scripts')

    <script>
      
        var url = "{{ route('find.user.details') }}";
        var token = "{{ csrf_token() }}";
        var users = "{{ $users }}";
        var lap = new Vue({

          el: '#users',
          data: {
            profiles: {},
            user: {},
          },
          methods: {
            getUser(value) {
              $.ajax({
                url : url,
                context: this,
                data : { 
                    user : value,
                    _token : token 
                },
                method : 'POST',
                success : function(data) {
                  this.user = data;
                },
                error : function(data) {
                    console.log(data);
                }
              });
            }
          },
          created() {
            this.profiles = JSON.parse(users.replace(/&quot;/g,'"'))
          },

        });



    </script>

  </body>
</html>
