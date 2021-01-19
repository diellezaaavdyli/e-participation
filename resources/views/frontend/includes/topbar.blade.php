<div class="topbar-logo">
    <button class="button-toggle-txt button-toggle-sidebar show-on-small-device">
    <i class="fas fa-bars"></i>
    </button>
    <ul class="list-unstyled c-header-nav d-md-down-none lang-responsive">
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
    </ul>
    <img src="{{ asset('img/kosovo_gov.png') }}" alt="">
    <button class="button-toggle-txt button-toggle-right-sidebar show-on-small-device">
    <i class="fas fa-bars"></i>
    </button>
</div>
<div class="overlay-sidebars close-sidebars">

</div>