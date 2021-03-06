@extends('layouts.master')
@section('title', 'ERP Portal | Trainings')
@section('page-title', 'Manage Trainings')
@section('content')
<div class="row">
	<!-- table success start -->
    <div class="col-md-4 mt-5">
        <div class="card mb-5">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12"><h4 class="header-title">Propose Training for Staff</h4></div>
                    <div class="col-md-12">
                        <form role="form" method="POST" action="{{ route('find.staff') }}">
                            @csrf
                            <div class="form-group">
                                <label>Enter Staff ID or Name</label>
                                <input type="text" autocomplete="off" name="staff" id="normalt" class="typeahead form-control">
                            </div>

                            <button class="btn btn-primary">
                                <i class="fa fa-send"></i>&nbsp;&nbsp;
                                Find Staff
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <h4 class="header-title">Manage Uncategorized Trainings</h4>

        <form>
            @csrf 
            <div class="form-group">
                <input type="text" name="search" id="search" class="form-control" placeholder="Search for Users">
            </div>
        </form>

        @foreach ($users as $user)
            @if ($user->trainings->where('category_id', 0)->where('completed', 1)->count() > 0)
                <div class="card card-bordered">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-9"><h5 class="title">{{ $user->name }}</h5></div>
                            <div class="col-md-3"><a href="#" class="btn btn-xs btn-primary btn-block view-trainings" data-user="{{ $user->staff_no }}">View</a></div>
                        </div>
                        
                        <p class="card-text">{{ $user->staff_no }}<br><small>Trainings: {{ $user->trainings->where('category_id', 0)->count() }}</small></p>
                    </div>
                </div>
            @endif
        @endforeach

    </div>
    <div class="col-md-8 mt-5">
        <div class="user-trainings">
            <div class="row" id="training-data">
                
            </div>
        </div>
    </div>
    <!-- table success end -->
</div>
@stop

@section('scripts')
<script>
        
    var token = "{{ csrf_token() }}";
    var url = "{{ route('get.staff.trainings') }}";
    var path = "{{ route('autocomplete') }}";
    var input = $('input.typeahead');

    $(document).ready(function() {
        $('.view-trainings').click(function() {
            var user = $(this).attr('data-user');

            $.ajax({
                url : url,
                data : { 
                    user : user,
                    _token : token 
                },
                method : 'POST',
                success : function(data) {
                    $('#training-data').html(data);
                    // $('#dataShow').modal('show');
                    // console.log(data);
                },
                error : function(data) {
                    console.log(data);
                }
            });
        });

        $('input.typeahead').typeahead({
            minLength: 2,
            source: function (query, process) {
                return $.get(path, {query: query}, function (data) {
                    return process(data);
                });
            }
        });
    });

</script>
@stop
