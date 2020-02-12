<div id="mailCompose" class="mail-compose">
      <div class="mail-compose-dialog">
        <div class="mail-compose-header">
          <h6 class="mail-compose-title tx-white">New Message</h6>
          <nav class="nav nav-icon-only">
            <a id="mailComposeMinimize" href="" class="nav-link nav-link-minimize d-none d-lg-block">
              <i data-feather="minus"></i>
              <i data-feather="square"></i>
            </a>
            <a id="mailComposeShrink" href="" class="nav-link nav-link-shrink d-none d-lg-block">
              <i data-feather="minimize-2"></i>
              <i data-feather="maximize-2"></i>
            </a>
            <a id="mailComposeClose" href="" class="nav-link nav-link-close"><i data-feather="x"></i></a>
          </nav>
        </div><!-- mail-compose-header -->
        <div class="mail-compose-body">
          <div class="form-row align-items-center">
            <div class="col-sm">Recipient:</div>
            <div class="col-sm-10">
              <input type="text" class="form-control bd-0 pd-x-0" placeholder="Enter recipient's email address">
            </div>
          </div>
          <hr class="mg-y-10">
          <div class="form-row align-items-center">
            <div class="col-sm">Subject:</div>
            <div class="col-sm-10">
              <input type="text" class="form-control bd-0 pd-x-0" placeholder="Enter subject">
            </div>
          </div>
          <div id="editor-container2" class="ht-150 mg-t-15"></div>
          <div class="d-sm-flex align-items-center justify-content-between mg-t-25">
            <div id="toolbar-container2" class="bd-0-f pd-0-f">
              <span class="ql-formats">
                <button class="ql-bold"></button>
                <button class="ql-italic"></button>
                <button class="ql-underline"></button>
              </span>
              <span class="ql-formats">
                <button class="ql-link"></button>
                <button class="ql-image"></button>
              </span>
            </div>
            <div class="tx-13 mg-t-15 mg-sm-t-0">
              <button class="btn btn-white mg-r-5">Save as Draft</button>
              <button class="btn btn-primary">Send</button>
            </div>
          </div>
        </div><!-- mail-compose-body -->
      </div><!-- mail-compose-dialog -->
    </div><!-- mail-compose -->