@extends('layouts.messages')
@section('content')
	<div class="mail-group">
	    <div class="mail-group-header">
	      <i data-feather="search"></i>
	      <div class="search-form">
	        <input type="search" class="form-control" placeholder="Search mail">
	      </div><!-- search-form -->
	    </div><!-- mail-group-header -->
	    <div class="mail-group-body">
	      <div class="pd-y-15 pd-x-20 d-flex justify-content-between align-items-center">
	        <h6 class="tx-uppercase tx-semibold mg-b-0">Inbox</h6>
	        <div class="dropdown tx-13">
	          <span class="tx-color-03">Sort:</span> <a href="" class="dropdown-link link-02">Date</a>
	        </div><!-- dropdown -->
	      </div>


	      <label class="mail-group-label">Today</label>
	      <ul class="list-unstyled media-list mg-b-0" v-for="conversation in conversations" v-on:click="getThreads(conversation.id)">
	        <li class="media unread">
	          <div class="avatar"><span class="avatar-initial rounded-circle bg-indigo" v-text="conversation.sender.name.charAt(0)"></span></div>
	          <div class="media-body mg-l-15">
	            <div class="tx-color-03 d-flex align-items-center justify-content-between mg-b-2">
	              <span class="tx-12" v-text="conversation.sender.name"></span>
	              <span class="tx-11" v-text="conversation.sender.created_at"></span>
	            </div>
	            <h6 class="tx-13" v-text="conversation.subject"></h6>
	            <p class="tx-12 tx-color-03 mg-b-0" v-text="conversation.threads[conversation.threads.length - 1].message"></p>
	          </div><!-- media-body -->
	        </li>
	      </ul>

	      <hr>
	    </div><!-- mail-group-body -->
  	</div><!-- mail-group -->

	<div class="mail-content">
		<div class="mail-content-header d-none">
			<a href="" id="mailContentClose" class="link-02 d-none d-lg-block d-xl-none mg-r-20"><i data-feather="arrow-left"></i></a>
			<div class="media">
			<div class="avatar avatar-sm"><img src="https://via.placeholder.com/600" class="rounded-circle" alt=""></div>
			<div class="media-body mg-l-10">
			  <h6 class="mg-b-2 tx-13" v-text="conversations[0].sender.name"></h6>
			  <span class="d-block tx-11 tx-color-03">Today, 11:40am</span>
			</div><!-- media-body -->
			</div><!-- media -->
			<nav class="nav nav-icon-only mg-l-auto">
				<a href="" data-toggle="tooltip" title="Archive" class="nav-link d-none d-sm-block"><i data-feather="archive"></i></a>
				<a href="" data-toggle="tooltip" title="Report Spam" class="nav-link d-none d-sm-block"><i data-feather="slash"></i></a>
				<a href="" data-toggle="tooltip" title="Mark Unread" class="nav-link d-none d-sm-block"><i data-feather="mail"></i></a>
				<a href="" data-toggle="tooltip" title="Add Label" class="nav-link d-none d-sm-block"><i data-feather="folder"></i></a>
				<a href="" data-toggle="tooltip" title="Add Tag" class="nav-link d-none d-sm-block"><i data-feather="tag"></i></a>
				<span class="nav-divider d-none d-sm-block"></span>
				<a href="" data-toggle="tooltip" title="Mark Important" class="nav-link d-none d-sm-block"><i data-feather="star"></i></a>
				<a href="" data-toggle="tooltip" title="Trash" class="nav-link d-none d-sm-block"><i data-feather="trash"></i></a>
				<a href="" data-toggle="tooltip" title="Print" class="nav-link d-none d-sm-block"><i data-feather="printer"></i></a>
				<a href="" data-toggle="tooltip" title="Options" class="nav-link d-sm-none"><i data-feather="more-vertical"></i></a>
			</nav>
		</div><!-- mail-content-header -->
		<div class="mail-content-body d-none">
			<div class="pd-20 pd-lg-25 pd-xl-30" v-for="thread in convo.threads">
				<h5 class="mg-b-30" v-text="convo.subject"></h5>

				<h6 class="tx-semibold mg-b-0" v-text="convo.recipient.name"></h6><br>

				<p v-text="thread.message"></p>
				<p>
				  <span>Best Regards,</span><br>
				  <strong v-text="convo.sender.name"></strong>
				</p>
			</div>

			<div class="pd-20 pd-lg-25 pd-xl-30 pd-t-0-f">
				<div id="editor-container" class="tx-13 tx-lg-14 ht-100">
				  Type here to <u>Reply</u> or <u>Forward</u>
				</div>
				<div class="d-flex align-items-center justify-content-between mg-t-10">
				  <div id="toolbar-container" class="bd-0-f pd-0-f">
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
				  <button class="btn btn-primary">Reply</button>
				</div>
			</div>
		</div><!-- mail-content-body -->
	</div><!-- mail-content -->
@stop

@section('scripts')
	
	<script>
		var conversations = "{{ $conversations }}";
		var token = "{{ csrf_token() }}";
		var url = "{{ route('get.convo.threads') }}";
	</script>

@stop