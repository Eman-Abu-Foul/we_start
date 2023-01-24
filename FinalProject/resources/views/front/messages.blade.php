@extends('master')
@section('title','Dashboard | '.env('APP_NAME'))

@section('content')
    <!-- Dashboard Container -->
    <div class="dashboard-container">

    @include('sidebar')

        <div class="dashboard-content-container" data-simplebar="init" style="height: 304px;"><div class="simplebar-track vertical" style="visibility: visible;"><div class="simplebar-scrollbar visible" style="visibility: visible; top: 0px; height: 76px;"></div></div><div class="simplebar-track horizontal" style="visibility: visible;"><div class="simplebar-scrollbar visible" style="visibility: visible; left: 0px; width: 25px;"></div></div><div class="simplebar-scroll-content" style="padding-right: 17px; margin-bottom: -34px;"><div class="simplebar-content" style="padding-bottom: 17px; margin-right: -17px;">
                    <div class="dashboard-content-inner" style="min-height: 304px;">

                        <!-- Dashboard Headline -->
                        <div class="dashboard-headline">
                            <h3>Messages</h3>

                            <!-- Breadcrumbs -->
                            <nav id="breadcrumbs" class="dark">
                                <ul>
                                    <li><a href="#">Home</a></li>
                                    <li><a href="#">Dashboard</a></li>
                                    <li>Messages</li>
                                </ul>
                            </nav>
                        </div>

                        <div class="messages-container margin-top-0">

                            <div class="messages-container-inner">

                                <!-- Messages -->
                                <div class="messages-inbox">
                                    <div class="messages-headline">
                                        <div class="input-with-icon">
                                            <input id="autocomplete-input" type="text" placeholder="Search">
                                            <i class="icon-material-outline-search"></i>
                                        </div>
                                    </div>

                                    <ul>
                                        <li>
                                            <a href="#">
                                                <div class="message-avatar"><i class="status-icon status-online"></i><img src="images/user-avatar-small-03.jpg" alt=""></div>

                                                <div class="message-by">
                                                    <div class="message-by-headline">
                                                        <h5>David Peterson</h5>
                                                        <span>4 hours ago</span>
                                                    </div>
                                                    <p>Thanks for reaching out. I'm quite busy right now on many</p>
                                                </div>
                                            </a>
                                        </li>



                                    </ul>
                                </div>
                                <!-- Messages / End -->

                                <!-- Message Content -->
                                <div class="message-content">

                                    <div class="messages-headline">
                                        <h4>Sindy Forest</h4>
                                        <a href="#" class="message-action"><i class="icon-feather-trash-2"></i> Delete Conversation</a>
                                    </div>

                                    <!-- Message Content Inner -->
                                    <div class="message-content-inner">

                                        <!-- Time Sign -->
                                        <div class="message-time-sign">
                                            <span>28 June, 2018</span>
                                        </div>

                                        <div class="message-bubble me">
                                            <div class="message-bubble-inner">
                                                <div class="message-avatar"><img src="images/user-avatar-small-01.jpg" alt=""></div>
                                                <div class="message-text" id="messages"><p> </p></div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>

                                        <div class="message-bubble">
                                            <div class="message-bubble-inner">
                                                <div class="message-avatar"><img src="images/user-avatar-small-02.jpg" alt=""></div>
                                                <div class="message-text"><p> </p></div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>


                                    </div>
                                    <!-- Message Content Inner / End -->
                                    <form id="msgForm" action="{{ route('messages.peer',4) }}" method="post">
                                        @csrf
                                        <div class="message-reply">
                                            <textarea cols="1" rows="1" id="message" name="message" placeholder="Your Message"></textarea>
                                            <button type="submit" class="button ripple-effect">Send</button>
                                        </div>

                                    </form>

                                    <!-- Reply Area -->


                                </div>
                                <!-- Message Content -->

                            </div>
                        </div>
                        <!-- Messages Container / End -->




                        <!-- Footer -->
                        <div class="dashboard-footer-spacer" style="padding-top: 123.6px;"></div>
                        <div class="small-footer margin-top-15">
                            <div class="small-footer-copyrights">
                                © 2018 <strong>Hireo</strong>. All Rights Reserved.
                            </div>
                            <ul class="footer-social-links">
                                <li>
                                    <a href="#" data-tippy-placement="top" data-tippy="" data-original-title="Facebook">
                                        <i class="icon-brand-facebook-f"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" data-tippy-placement="top" data-tippy="" data-original-title="Twitter">
                                        <i class="icon-brand-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" data-tippy-placement="top" data-tippy="" data-original-title="Google Plus">
                                        <i class="icon-brand-google-plus-g"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" data-tippy-placement="top" data-tippy="" data-original-title="LinkedIn">
                                        <i class="icon-brand-linkedin-in"></i>
                                    </a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <!-- Footer / End -->

                    </div>
                </div></div></div>

    </div>
@endsection

