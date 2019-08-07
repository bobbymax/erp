@foreach ($user->trainings as $training)
    @if ($training->completed === true)
        <div class="col-md-4">
            <div class="card">
                <img class="card-img-top img-fluid" src="http://dummyimage.com/900x320/4d494d/686a82.gif&text={{ $user->name }}+Training" alt="image">
                <div class="card-body">
                    <h5 class="title mb-0">{{ $training->title }}</h5>
                    <p class="mb-3">by: <span style="font-style: italic;">{{ $training->provider }}</span></p>

                    <select data-training="{{ $training->id }}" class="form-control category" name="categories">
                        <option value="" {{ $training->category_id === 0 ? ' selected' : '' }}>Uncategorized</option>
                        @foreach ($categories as $category)
                            @if ($category->module->label === 'staff-services')
                                <option value="{{ $category->id }}" {{ $training->category_id === $category->id ? ' selected' : '' }}>{{ $category->name }}</option>
                            @endif
                        @endforeach
                    </select>

                    <p class="mt-3"><strong>from:</strong> {{ $training->start_date->format('d M') . " - " . $training->end_date->format('d F, Y') }}</p>
                    <p><strong>sponsor:</strong> {{ $training->location_during_training }}</p>
                    <p><strong>location:</strong> {{ $training->location }}</p>
                </div>
            </div>
        </div>
    @endif
@endforeach

<script>
    var postUrl = "{{ route('update.training.category') }}";
    var token = "{{ csrf_token() }}";


    $(document).ready(function() {
        $(".category").change(function() {

            var category = $(this).val();
            var training = $(this).attr('data-training');

            $.ajax({
                url : postUrl,
                data : { 
                    category : category,
                    training : training,
                    _token : token 
                },
                method : 'POST',
                success : function(data) {
                    if ( data.status === 'success' ) {
                        swal("Good Job!", data.data, "success");
                        setInterval(function() {
                        }, 1000);
                    }
                },
                error : function(data) {
                    console.log(data);
                }
            });


        });
    });
</script>
