@extends('layouts.master')
@section('content')
<style>
	body {
		background-color: #27ae60;
	}
	.itenaries {
		background-color: #fff;
		text-transform: uppercase;
	}
	.feather-14 {
		width: 16px;
    	height: 16px;
	}
	.b-radius {
		border-radius: 8px;
	}
	.itenaries ul {
		
	}
	.mail-details {
		padding: 15px 25px;
		background: #fff;
	}
	.itenaries ul li:hover {
		background-color: #ecf0f1;
	}
	.itenaries ul li {
		border-bottom: 1px solid #bdc3c7;
	}
	.itenaries ul li:last-child {
		border-bottom: 0;
	}
	.itenaries ul li a {
		padding: 20px 25px;
		display: block;
		font-size: 14px !important;
		text-decoration: none;
		color: #27ae60;
	}
</style>

<div class="row">
	<div class="col-3">
		<div class="itenaries">
			<ul class="nav flex-column">
				<li class="nav-item"><a href="#"><i class="feather-14" data-feather="inbox"></i>&nbsp;&nbsp;&nbsp;Inbox</a></li>
				<li class="nav-item"><a href="#"><i class="feather-14" data-feather="send"></i>&nbsp;&nbsp;&nbsp;Sent</a></li>
				<li class="nav-item"><a href="#"><i class="feather-14" data-feather="archive"></i>&nbsp;&nbsp;&nbsp;Trash</a></li>
				<li class="nav-item"><a href="#"><i class="feather-14" data-feather="file-plus"></i>&nbsp;&nbsp;&nbsp;Compose Message</a></li>
			</ul>
		</div>
	</div>
	<div class="col-9">
		<div class="mail-details">
			<ul class="nav flex-column">
				<li>
					<small>July, 2019 14:06</small><br>
					<h4>Staff Name</h4>
					Morbi in sem quis dui placerat ornare. Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. Sed arcu....

					<ul>
						<li>Yes</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</div>
@stop