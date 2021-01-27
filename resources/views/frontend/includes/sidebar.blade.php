<button class="close-button show-on-small-device close-sidebars"><i class="fas fa-times"></i></button>
<div class="sidebar">
    <div class="sidebar-user-wrapper">
    @if (Auth::check())
          @inject('user', 'App\Models\User')
          <img src="{{ $user::returnAuthUserAvatar($logged_in_user) }}" alt="" class="rounded-image">
          <h5 class="heading4">@lang('translator.welcome_message'),  {{ Auth::user()->name }}</h5>
         
          @endif

    </div>
    <div class="sidebar-menu">
    <ul>
                <li  class="{{ Route::currentRouteName() == 'frontend.issues.index' ? 'active' : '' }}"><a href="{{ route('frontend.issues.index') }}">@lang('translator.issues_title')</a></li>
                <li  class="{{ Route::currentRouteName() == 'frontend.activities.index' ? 'active' : '' }}"><a href="{{ route('frontend.activities.index') }}">@lang('translator.actvities_title')</a></li>
                <li  class="{{ Route::currentRouteName() == 'frontend.forms.index' ? 'active' : '' }}"><a href="{{ route('frontend.forms.index') }}">@lang('translator.forms_title')</a></li>
                <li  class="{{ Route::currentRouteName() == 'frontend.about.index' ? 'active' : '' }}"><a href="{{ route('frontend.about.index') }}">@lang('translator.about_title')</a></li>
                <li  class="{{ Route::currentRouteName() == 'frontend.contact.index' ? 'active' : '' }}"><a href="{{ route('frontend.contact.index') }}">@lang('translator.contact_title')</a></li>
            </ul>

          
    </div>
    <div>
    <p style="color:white; font-size:13px; position: fixed; bottom: 0; width:280px; "><em>eParticipation is an inclusive platform which
     aims to engage citizens in decision-making and public service delivery 
     by submitting issues to specific Members of the Parliament, following the activities of the Parliament,
      and directly submitting electronic forms. </em></p>
    </div>
</div>
