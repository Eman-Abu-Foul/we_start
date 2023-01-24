@extends('master')
@section('title','All Project | '.env('APP_NAME'))

@section('content')
    <div class="margin-top-90"></div>

    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4">
                <div class="sidebar-container">


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

                        <!-- More Skills -->
                    </div>
                    <div class="clearfix"></div>

                </div>
            </div>
            <div class="col-xl-9 col-lg-8 content-left-offset">

                <!-- Freelancers List Container -->
                <div class="freelancers-container freelancers-list-layout compact-list margin-top-35">
                    @forelse ($freelancers as $freelancer)

                    <!--Freelancer -->
                    <div class="freelancer">

                        <!-- Overview -->
                        <div class="freelancer-overview">
                            <div class="freelancer-overview-inner">
                                <!-- Bookmark Icon -->
                                <span class="bookmark-icon"></span>

                                <!-- Avatar -->
                                <div class="freelancer-avatar">
                                    <a href=""><img src="{{$freelancer->image_url}}" alt=""></a>
                                </div>

                                <!-- Name -->
                                <div class="freelancer-name">
                                    <h4><a href="#"> {{ $freelancer->fname }} {{ $freelancer->lname }}</a></h4>
                                    <span>{{ $freelancer->profile->specialization }}</span>

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
                        <li>
                            <div>No Freelancer Found</div>
                        </li>
                    @endforelse
                </div>
                <!-- Freelancers Container / End -->


                <!-- Pagination -->
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12">
                        <!-- Pagination -->
                        <div class="pagination-container margin-top-40 margin-bottom-60">
                            <nav class="pagination">
                                <ul>
                                    <li class="pagination-arrow"><a href="#" class="ripple-effect"><i class="icon-material-outline-keyboard-arrow-left"></i></a></li>
                                    <li><a href="#" class="ripple-effect">1</a></li>
                                    <li><a href="#" class="current-page ripple-effect">2</a></li>
                                    <li><a href="#" class="ripple-effect">3</a></li>
                                    <li><a href="#" class="ripple-effect">4</a></li>
                                    <li class="pagination-arrow"><a href="#" class="ripple-effect"><i class="icon-material-outline-keyboard-arrow-right"></i></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- Pagination / End -->

            </div>
        </div>
    </div>
@endsection
