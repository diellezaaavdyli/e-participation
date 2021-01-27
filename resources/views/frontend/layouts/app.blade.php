<!doctype html>
<html lang="{{ htmlLang() }}" @langrtl dir="rtl" @endlangrtl>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ appName() }} | @yield('title')</title>
    <meta name="description" content="@yield('meta_description', appName())">
    <meta name="author" content="@yield('meta_author', 'Anthony Rappa')">
    @yield('meta')

    @stack('before-styles')
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;300;400;500;600;700;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="{{ asset('css/frontend.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.min.css') }}" rel="stylesheet">

    <script src="{{ asset('js/main.min.js')}}"></script>
    <script src="{{ asset('js/popper.min.js')}}"></script>
    <script src="{{ asset('js/tooltip.min.js')}}"></script>
    <script src="{{ asset('js/locales-all.min.js') }}"></script>
    
    <livewire:styles />
    @stack('after-styles')

    @include('includes.partials.ga')
</head>
<body>
    @include('includes.partials.logged-in-as')

    <div id="app">

              
<div class="user-bar ">
    <ul class="list-unstyled c-header-nav d-md-down-none">
    @if (Auth::check())
          @inject('user', 'App\Models\User')
          <img src="{{ $user::returnAuthUserAvatar($logged_in_user) }}" alt="" class="rounded-image">
          <h5 class="heading4">@lang('translator.welcome_message'),  {{ Auth::user()->name }}</h5>
          @else
          <!-- <li  class="{{ Route::currentRouteName() == 'frontend.auth.login' ? 'active' : '' }}"><a href="{{ route('frontend.auth.login') }}">Login</a></li>
           <li  class="{{ Route::currentRouteName() == 'frontend.auth.register' ? 'active' : '' }}"><a href="{{ route('frontend.auth.register') }}">Register</a></li> -->
           <button  class="log-in"
            class="{{ Route::currentRouteName() == 'frontend.auth.login' ? 'active' : '' }}"><a href="{{ route('frontend.auth.login') }}" type="button">Log in</button>
          
            <button class="sign-up"
           class="{{ Route::currentRouteName() == 'frontend.auth.register' ? 'active' : '' }}"><a href="{{ route('frontend.auth.register') }}" type="button">Sign up</button>
          @endif
        @if(config('boilerplate.locale.status') && count(config('boilerplate.locale.languages')) > 1)
            <li class="c-header-nav-item dropdown lang-list">
                <x-utils.link
                    :text="__(getLocaleName(app()->getLocale()))"
                    class="c-header-nav-link dropdown-toggle"
                    id="navbarDropdownLanguageLink"
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false" />

                @include('includes.partials.lang')
            </li>
        @endif
    

        @if (Auth::check() && $logged_in_user->email_verified_at != null)
        @if($logged_in_user->isAdmin())
        <li class="c-header-nav-item dropdown ">
        <x-utils.link
                    class="dropdown-item admin-route"
                    icon="c-icon  cil-account-logout"
                    href="{{route('admin.dashboard')}}">
                    <x-slot name="text">
                       Admin
                    </x-slot>
            </x-utils.link>
        </li>
        @endif
        <li class="c-header-nav-item dropdown ">
            <x-utils.link class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <x-slot name="text">
                    <div class="c-avatar">
                    @inject('user', 'App\Models\User')
                        <img class="c-avatar-img" src="{{$user::returnAuthUserAvatar($logged_in_user)}}" alt="{{ $logged_in_user->email ?? '' }}">
                    </div>
                </x-slot>
            </x-utils.link>
   
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-user-account">  
            <x-utils.link
                    class="dropdown-item"
                    icon="c-icon  cil-account-logout"
                    href="{{route('frontend.user.account')}}">
                    <x-slot name="text">
                        @lang('translator.label_account')
                    </x-slot>
                </x-utils.link>
                <x-utils.link
                    class="dropdown-item"
                    icon="c-icon  cil-account-logout"
                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <x-slot name="text">
                        @lang('translator.log_out')
                        <x-forms.post :action="route('frontend.auth.logout')" id="logout-form" class="d-none" />
                    </x-slot>
                </x-utils.link>
            </div>
        </li>
        @endif
    </ul>
</div>

                <div class="sidbar-wrapper">
                @include('frontend.includes.sidebar')
                </div>
             
                <div class="page-content-container ">
                    <div class="content-wrapper" >
                        @include('frontend.includes.topbar')
                        @yield('content')
                    </div>
                 
                    <div class="right-sidebar">
                    @include('frontend.includes.right-sidebar')
                    </div>
                 
                    <div class="w-100">
                        @include('frontend.includes.footer')
                    </div>
                </div>
       

      
    </div><!--app-->

    @stack('before-scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="{{ mix('js/manifest.js') }}"></script>
    <script src="{{ mix('js/vendor.js') }}"></script>
    <script src="{{ mix('js/frontend.js') }}"></script>

    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
  

    
    <livewire:scripts />
    @if(Route::currentRouteName() == 'frontend.issues.index')
    <script>
        var editor_config = {
            selector:'.textarea'
        }
        tinymce.init(editor_config);
    </script>
    @endif;
    @stack('after-scripts')
</body>
</html>
<div class="overlay">

</div>