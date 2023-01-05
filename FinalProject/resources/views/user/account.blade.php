@extends('master')
@section('title','Account | '.env('APP_NAME'))

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
				<h3>Account</h3>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="#">Home</a></li>
						<li>Account</li>
					</ul>
				</nav>
			</div>
            <div class="fun-facts-container">
                <div class="col-xl-12">
                        <div class="dashboard-box margin-top-0">

                            <!-- Headline -->
                            <div class="headline">
                                <h3><i class="icon-material-outline-account-circle"></i> My Account</h3>
                            </div>

                            <div class="content with-padding padding-bottom-0">

                                <div class="row">

                                    <div class="col-auto" style="align-items: center;">
                                        <div class="avatar-wrapper" data-tippy-placement="bottom" data-tippy="" data-original-title="Change Avatar">
                                            <img class="profile-pic" src="https://ui-avatars.com/api/?background=random&name={{ auth()->user()->fname }}" alt="">
                                            <div class="upload-button"></div>
                                            <input class="file-upload" type="file" accept="image/*">
                                        </div>
                                    </div>
                                    <div class="dashboard-headline">

                                        <h3>{{ Auth::user()->fname }}{{ Auth::user()->lname }}</h3>
                                        <p style="display: inline">Phone Number : <h5 style="display: inline">{{ Auth::user()->phone }}</h5></p>
                                        <a href="{{route('edit.account')}}"><span> Edit Account <i class="icon-feather-edit"></i></span></a>
                                    </div>


                                </div>



                            </div>

                        </div>
                    </div>

                <div class="col-xl-12 padding-bottom-50">
                    <div class="dashboard-box">

                        <!-- Headline -->
                        <div class="headline">
                            <div class="row">
                                <div class="col-xl-10">
                                    <h3><i class="icon-material-outline-dashboard"></i> My Work</h3>
                                </div>
                                <div class="col-xl-2">
                                    <a href="{{ route('works.create') }}" class="button"><i class="icon-material-outline-add"></i>Add Work</a>
                                </div>
                            </div>

                        </div>

                        <div class="content">
                            <ul class="fields-ul">
                                <li>
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="companies-list">
                                                @forelse ($works as $work)
                                                    <div class="col-xl-4">
                                                        <a href="{{ route('works.show',$work->id) }}" class="company">
                                                            <div class="company-inner-alignment">
{{--                                                                $work->image[0]['path']--}}
                                                                <span class="company-logo"><img src="{{ asset($work->image[0]['path']) }}" alt=""></span>

                                                                <span class="company-not-rated">{{ $work->title }}</span>
                                                            </div>
                                                        </a>
                                                    </div>

                                                @empty
                                                    <tr>
                                                        <td colspan="5">No Data</td>
                                                    </tr>
                                                @endforelse
                                            </div>
                                        </div>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>


                <div class="clearfix"></div>
                <!-- Main Navigation / End -->


            </div>
        </div>
	</div>
	<!-- Dashboard Content / End -->

</div>
<!-- Dashboard Container / End -->

@endsection
