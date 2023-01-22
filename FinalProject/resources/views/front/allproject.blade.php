@extends('master')
@section('title','All Project | '.env('APP_NAME'))

@section('content')
    <div class="margin-top-90"></div>

    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4">
                <div class="sidebar-container">

                    <!-- Location -->
                    <div class="sidebar-widget">
                        <h3>Open projects</h3>

                    </div>

                    <!-- Category -->
                    <div class="sidebar-widget">
                        <h3>Category</h3>
                        <div class="btn-group bootstrap-select show-tick default">
                            <select class="selectpicker default" multiple="" data-selected-text-format="count" data-size="7" title="All Categories" tabindex="-98">
                                <option>Admin Support</option>
                                <option>Customer Service</option>
                                <option>Data Analytics</option>
                                <option>Design &amp; Creative</option>
                                <option>Legal</option>
                                <option>Software Developing</option>
                                <option>IT &amp; Networking</option>
                                <option>Writing</option>
                                <option>Translation</option>
                                <option>Sales &amp; Marketing</option>
                            </select></div>
                    </div>

                    <!-- Salary -->
                    <div class="sidebar-widget">
                        <h3>Salary</h3>
                        <div class="margin-top-55"></div>

                        <!-- Range Slider -->
                        <input class="range-slider" type="text" value="0,15000" data-slider-currency="$" data-slider-min="0" data-slider-max="15000" data-slider-step="50" data-slider-value="[0,15000]" data-value="0,15000" style="display: none;">

                    </div>

                    <!-- Tags -->
                    <div class="sidebar-widget">
                        <h3>Skills</h3>

                        <div class="tags-container">
                            <div class="tag">
                                <input type="checkbox" id="tag1">
                                <label for="tag1">front-end dev</label>
                            </div>
                            <div class="tag">
                                <input type="checkbox" id="tag2">
                                <label for="tag2">angular</label>
                            </div>
                            <div class="tag">
                                <input type="checkbox" id="tag3">
                                <label for="tag3">react</label>
                            </div>
                            <div class="tag">
                                <input type="checkbox" id="tag4">
                                <label for="tag4">vue js</label>
                            </div>
                            <div class="tag">
                                <input type="checkbox" id="tag5">
                                <label for="tag5">web apps</label>
                            </div>
                            <div class="tag">
                                <input type="checkbox" id="tag6">
                                <label for="tag6">design</label>
                            </div>
                            <div class="tag">
                                <input type="checkbox" id="tag7">
                                <label for="tag7">wordpress</label>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                </div>
            </div>
            <div class="col-xl-9 col-lg-8 content-left-offset">


                <div class="listings-container margin-top-35">
                    @forelse ($projects as $project)
                    <!-- Job Listing -->
                    <a  href="{{ route('show_project',$project->id) }}" class="job-listing">

                        <!-- Job Listing Details -->
                        <div class="job-listing-details">
                            <!-- Logo -->

                            <!-- Details -->
                            <div class="job-listing-description">
{{--                                <h4 class="job-listing-company"> {{ $project->category_id }}</h4>--}}
                                <h3 class="job-listing-title"> {{ $project->title }} </h3>
                                <p class="job-listing-text"> {{ $project->description }} </p>
                            </div>
                            <div>

                                <button class="button ripple-effect"><i class="icon-feather-plus"></i> Add your offer </button>

                            </div>

                        </div>

                        <!-- Job Listing Footer -->
                        <div class="job-listing-footer">
                            <ul>
                                <li><i class="icon-feather-user"></i> {{ $project->user->fname }}</li>
                                <li><i class="icon-material-outline-business-center"></i> {{ $project->status }}</li>
                                <li><i class="icon-material-outline-account-balance-wallet"></i> ${{ $project->min }}-${{ $project->max }}</li>
                                <li><i class="icon-material-outline-access-time"></i> {{ $project->created_at->diffForHumans() }}</li>
                            </ul>
                        </div>
                    </a>
                    @empty
                        <a>
                            <div>No Data</div>
                        </a>
                    @endforelse


                    <!-- Pagination -->
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Pagination -->
                            <div class="pagination-container margin-top-30 margin-bottom-60">
                                <nav class="pagination">
                                    <ul>
                                        <li class="pagination-arrow"><a href="#"><i class="icon-material-outline-keyboard-arrow-left"></i></a></li>
                                        <li><a href="#">1</a></li>
                                        <li><a href="#" class="current-page">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li class="pagination-arrow"><a href="#"><i class="icon-material-outline-keyboard-arrow-right"></i></a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!-- Pagination / End -->

                </div>

            </div>
        </div>
    </div>


@endsection
