@extends('master')
@section('title','Create Category | '.env('APP_NAME'))

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
				<h3>All Category</h3>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="#">Home</a></li>
						<li>Create Category</li>
					</ul>
				</nav>
			</div>
	
            <!-- Fun Facts Container -->
            <div class="fun-facts-container">
                <form style="width: calc(100% + 30px);">
                @csrf
                    <div class="col-xl-12 col-md-2">
                        <div class="section-headline margin-top-5 margin-bottom-2">
                            <h5>Category Name</h5>
                        </div>
                        <input class="with-border" placeholder="name" id="name" name="name" type="text">
                    </div>

                    <div class="col-xl-12 col-md-2">
                        <div class="section-headline margin-top-5 margin-bottom-2">
                            <h5>Icon Category</h5>
                        </div>
                    
                        <select class="selectpicker" data-selected-text-format="count > 1" id="icon_name">
                            <option value="icon-line-awesome-file-code-o" data-icon="icon-line-awesome-file-code-o" selected>Web & Software Dev</option>
                            <option value="icon-line-awesome-cloud-upload" data-icon="icon-line-awesome-cloud-upload">Data Science & Analitycs</option>
                            <option value="icon-line-awesome-suitcase" data-icon="icon-line-awesome-suitcase">Accounting & Consulting</option>
                            <option value="icon-line-awesome-pencil" data-icon="icon-line-awesome-pencil">Writing & Translations</option>
                            <option value="icon-line-awesome-pie-chart" data-icon="icon-line-awesome-pie-chart">Sales & Marketing</option>
                            <option value="icon-line-awesome-image" data-icon="icon-line-awesome-image">Graphics & Design</option>
                            <option value="icon-line-awesome-bullhorn" data-icon="icon-line-awesome-bullhorn">Digital Marketing</option>
                            <option value="icon-line-awesome-graduation-cap" data-icon="icon-line-awesome-graduation-cap">Education & Training</option>
                        </select>
                    </div>

                    <div class="col-xl-12 col-md-2">
                        <div class="section-headline margin-top-15 margin-bottom-2">
                            <h5>Description</h5>
                        </div>
                        <textarea class="with-border" rows="5" id="description" name="description" placeholder="Description..."></textarea>
                    </div>
                    <button onclick="performStore()" class="button ripple-effect button-sliding-icon margin-left-15" style="width: 155.375px;">Save <i class="icon-feather-check"></i></button>

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
    function performStore() {
        axios.post('/categories', {
            name: document.getElementById('name').value,
            icon_name: document.getElementById('icon_name').value,
            description: document.getElementById('description').value
        })
        .then(function (response) {
            //2xx
            console.log(response);
            toastr.success(response.data.message);
            window.location.href = '/categories';
            
        })
        .catch(function (error) {
            //4xx - 5xx
            console.log(error.response.data.message);
            toastr.error(error.response.data.message);
        });
    }
</script>
@endsection