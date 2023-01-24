@extends('master')
@section('title','Home | '.env('APP_NAME'))

@section('content')
<!-- Intro Banner
================================================== -->
<!-- add class "disable-gradient" to enable consistent background overlay -->
<div class="intro-banner" data-background-image="{{ asset('assets/images/home-background.jpg') }}">
	<div class="container">

		<!-- Intro Headline -->
		<div class="row">
			<div class="col-md-12">
				<div class="banner-headline">
					<h3>
						<strong>Hire experts or be hired for any job, any time.</strong>
						<br>
						<span>Thousands of small businesses use <strong class="color">{{ env('APP_NAME') }}</strong> to turn their ideas into reality.</span>
					</h3>
				</div>
			</div>
		</div>

		<!-- Search Bar -->
		<div class="row">
			<div class="col-md-8">
				<div class="intro-banner-search-form margin-top-95">

					<!-- Search Field -->
					<div class="intro-search-field">
						<label for ="intro-keywords" class="field-title ripple-effect">What job you want?</label>
						<input id="intro-keywords" type="text" placeholder="Job Title or Keywords">
					</div>

					<!-- Button -->
					<div class="intro-search-button">
						<button class="button ripple-effect">Search</button>
					</div>
				</div>
			</div>
		</div>

		<!-- Stats -->
		<div class="row">
			<div class="col-md-12">
				<ul class="intro-stats margin-top-45 hide-under-992px">
					<li>
						<strong class="counter">1,586</strong>
						<span>Jobs Posted</span>
					</li>
					<li>
						<strong class="counter">3,543</strong>
						<span>Tasks Posted</span>
					</li>
					<li>
						<strong class="counter">1,232</strong>
						<span>Freelancers</span>
					</li>
				</ul>
			</div>
		</div>

	</div>
</div>


<!-- Content
================================================== -->
<!-- Category Boxes -->
<div class="section margin-top-65">
	<div class="container">
		<div class="row">
			<div class="col-xl-12">

				<div class="section-headline centered margin-bottom-15">
					<h3>Popular Job Categories</h3>
				</div>

				<!-- Category Boxes Container -->
				<div class="categories-container">
				@forelse ($categories as $category)
					<!-- Category Box -->
					<a href="{{ route('show_category',$category->id) }}" class="category-box">
						<div class="category-box-icon">
							<i class="{{ $category->icon_name }}"></i>
						</div>
						<div class="category-box-counter">612</div>
						<div class="category-box-content">
							<h3>{{ $category->name }}</h3>
							<p>{{ $category->description }}</p>
						</div>
					</a>
					@empty
					<a href="#" class="category-box">
						<div class="category-box-content">
							<h3>No Data Found </h3>
						</div>
					</a>
                    @endforelse

				</div>

			</div>
		</div>
	</div>
</div>
<!-- Category Boxes / End -->


<!-- Features Jobs -->
<div class="section gray margin-top-45 padding-top-65 padding-bottom-75">
	<div class="container">
		<div class="row">
			<div class="col-xl-12">

				<!-- Section Headline -->
				<div class="section-headline margin-top-0 margin-bottom-35">
					<h3>Featured Jobs</h3>
					<a href="{{ route('all_project') }}" class="headline-link">Browse All Jobs</a>
				</div>

				<!-- Jobs Container -->
				<div class="listings-container compact-list-layout margin-top-35">

                    @forelse ($projects as $project)

                    <!-- Job Listing -->
                    <a href="" class="job-listing with-apply-button">

                        <!-- Job Listing Details -->
                        <div class="job-listing-details">

                            <!-- Details -->
                            <div class="job-listing-description">
                                <h3 class="job-listing-title">{{ $project->title }}</h3>

                                <!-- Job Listing Footer -->
                                <div class="job-listing-footer">
                                    <ul>
                                        <li>${{ $project->min }}  ${{ $project->max }}</li>
                                        <li><i class="icon-material-outline-business-center"></i> {{ $project->status }}</li>
                                        <li><i class="icon-material-outline-access-time"></i> {{ $project->created_at->diffForHumans() }}</li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Apply Button -->
                            <span href="" class="button button-sliding-icon list-apply-button ripple-effect">Apply Now</span>

{{--                            <span class="list-apply-button ripple-effect">Apply Now</span>--}}
                        </div>
                    </a>

                    @empty
                        <a href="#" class="category-box">
                            <div class="category-box-content">
                                <h3>No Data Found </h3>
                            </div>
                        </a>
                    @endforelse
</div>
<!-- Jobs Container / End -->

</div>
</div>
</div>
</div>
<!-- Featured Jobs / End -->


<!-- Highest Rated Freelancers -->
<div class="section gray padding-top-65 padding-bottom-70 full-width-carousel-fix">
<div class="container">
<div class="row">

<div class="col-xl-12">
<!-- Section Headline -->
<div class="section-headline margin-top-0 margin-bottom-25">
<h3>Highest Rated Freelancers</h3>
<a href="{{ route('all_freelancer') }}" class="headline-link">Browse All Freelancers</a>
</div>
</div>

<div class="col-xl-12">
<div class="default-slick-carousel freelancers-container freelancers-grid-layout">
@forelse ($freelancers as $freelancer)
<!--Freelancer -->
<div class="freelancer">

    <!-- Overview -->
    <div class="freelancer-overview">
        <div class="freelancer-overview-inner">

            <!-- Bookmark Icon -->

            <!-- Avatar -->
            <div class="freelancer-avatar">
                <div class="verified-badge"></div>
                <a href=""><img src="{{ $freelancer->image_url }}" alt=""></a>
            </div>

            <!-- Name -->
            <div class="freelancer-name">
                <h4><a href="">{{ $freelancer->fname }}{{ $freelancer->lname }}</a></h4>
            </div>

        </div>
    </div>

    <!-- Details -->
    <div class="freelancer-details">

        <a href="{{route('show_freelancer',$freelancer->id)}}" class="button button-sliding-icon ripple-effect">View Profile <i class="icon-material-outline-arrow-right-alt"></i></a>
    </div>
</div>
<!-- Freelancer / End -->

@empty
    <div class="freelancer">
        <div class="freelancer-overview">
            <h3>No Data Found </h3>
        </div>
    </div>

@endforelse


</div>
</div>

</div>
</div>
</div>
<!-- Highest Rated Freelancers / End-->


@endsection
