<!-- Notifications -->
<div class="header-notifications">

    <!-- Trigger -->
    <div class="header-notifications-trigger">
        <a href="#"><i class="icon-feather-bell"></i><span>{{ $unread >99? '99' : $unread }}</span></a>
    </div>

    <!-- Dropdown -->
    <div class="header-notifications-dropdown">


        <div class="header-notifications-headline">
            <h4>Notifications</h4>
            <button class="mark-as-read ripple-effect-dark" title="Mark all as read" data-tippy-placement="left">
                <i class="icon-feather-check-square"></i>
            </button>
        </div>

        <div class="header-notifications-content">
            <div class="header-notifications-scroll" data-simplebar>
                <ul>
                    <!-- Notification -->
                    <li class="notifications-not-read">
                        @forelse($notifications as $notification)
                        <a href="">
                            <span class="notification-icon"><i class="icon-material-outline-group"></i></span>
                            <span class="notification-text">
                                @if($notification->unread())
                                   * <strong>{{ $notification->data['name'] }}</strong> applied for a job <span class="color">{{ $notification->data['project'] }}</span>
                                @else
                                    {{ $notification->data['name'] }} applied for a job <span class="color">{{ $notification->data['project'] }}</span>

                                @endif
                            </span>
                        </a>
                        @empty
                            <a> No Notifications Founded </a>
                        @endforelse
                    </li>

                </ul>
            </div>
            <a href="" class="header-notifications-button ripple-effect button-sliding-icon">View All Notifications<i class="icon-material-outline-arrow-right-alt"></i></a>

        </div>

    </div>

</div>


