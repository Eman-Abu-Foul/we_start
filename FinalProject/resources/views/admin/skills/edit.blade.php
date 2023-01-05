@extends('master')
@section('title','Edit Skill | '.env('APP_NAME'))

@section('content')
<!-- Dashboard Container -->
<div class="dashboard-container">

@include('sidebar')

	<!-- Dashboard Content
	================================================== -->
	<div class="dashboard-content-container" data-simplebar>
		<div class="dashboard-content-inner" >
			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				<h3>Edit Skill</h3>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="#">Home</a></li>
						<li>Edit Skill</li>
					</ul>
				</nav>
			</div>
	
            <!-- Fun Facts Container -->
            <div class="fun-facts-container">
                <form style="width: calc(100% + 30px);">
                @csrf
                    <div class="col-xl-12 col-md-2">
                        <div class="section-headline margin-top-5 margin-bottom-2">
                            <h5>Skill Name</h5>
                        </div>
                        <input value="{{$skill->name}}" class="with-border" placeholder="name" id="name" name="name" type="text">
                    </div>

                    <button onclick="performUpdate()" class="button ripple-effect button-sliding-icon margin-left-15" style="width: 155.375px;"> Update <i class="icon-feather-check"></i></button>

                </form>

                
            </div>
            
		</div>
	</div>
	<!-- Dashboard Content / End -->

</div>
<!-- Dashboard Container / End -->

@endsection
@section('scripts')
<script>
    function performUpdate() {
        axios.put('/skills/{{$skill->id}}', {
            name: document.getElementById('name').value,
        })
        .then(function (response) {
            //2xx
            console.log(response);
            toastr.success(response.data.message);
            window.location.href = '/skills';
            
        })
        .catch(function (error) {
            //4xx - 5xx
            console.log(error.response.data.message);
            toastr.error(error.response.data.message);
        });
    }
</script>
@endsection