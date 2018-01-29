<ul class="nav nav-pills nav-stacked">
    <li class="{{ return_if(on_page('account'),'active') }}">
        <a href="{{ route('account.index') }}">Account Overview</a>
    </li>
    <li class="{{ return_if(on_page('account/profile'),'active') }}">
        <a href="{{ route('account.profile.index') }}">Profile</a>
    </li>
    <li class="{{  return_if(on_page('account/password'),'active') }}">
            <a href="{{ route('account.change.password.index') }}">Change Password</a>
    </li>
</ul>

<hr>

@subscribed
    <ul class="nav nav-pills nav-stacked">
        @subscriptionnotcancelled
            <li><a href="#">Change Plan</a></li>

            <li><a href="{{ route('account.subscription.cancel.index') }}">Cancel subscription</a></li>
        @endsubscriptionnotcancelled

        @subscriptioncancelled
            <li><a href="#">Resume subscription</a></li>
        @endsubscriptioncancelled

        <li><a href="#">Update card</a></li>
    </ul>
@endsubscribed
