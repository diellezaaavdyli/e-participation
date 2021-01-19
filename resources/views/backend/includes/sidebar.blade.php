<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <div class="c-sidebar-brand d-lg-down-none">

    </div><!--c-sidebar-brand-->

    <ul class="c-sidebar-nav">

    @if ( $logged_in_user->hasAllAccess() ||  $logged_in_user->can('admin.access.issue.view'))

        <li class="c-sidebar-nav-item">
            <x-utils.link
                class="c-sidebar-nav-link"
                :href="route('admin.issues.index')"
                :active="activeClass(Route::is('admin.issues.index'), 'c-active')"
                icon="c-sidebar-nav-icon far fa-edit"
                :text="__('translator.issues_title')" />
        </li>
    @endif

    @if ( $logged_in_user->hasAllAccess() ||  $logged_in_user->can('admin.access.comment.view'))
        <li class="c-sidebar-nav-item">
            <x-utils.link
                class="c-sidebar-nav-link"
                :href="route('admin.comments.index')"
                :active="activeClass(Route::is('admin.comments.index'), 'c-active')"
                icon="c-sidebar-nav-icon fas fa-comments"
                :text="__('translator.comments_title')" />
        </li>
        @endif
        @if ( $logged_in_user->hasAllAccess() ||  $logged_in_user->can('admin.access.tag.view'))
        <li class="c-sidebar-nav-item">
            <x-utils.link
                class="c-sidebar-nav-link"
                :href="route('admin.tags.index')"
                :active="activeClass(Route::is('admin.tags.index'), 'c-active')"
                icon="c-sidebar-nav-icon fas fa-tags"
                :text="__('translator.tags_title')" />
        </li>
        @endif
        @if ( $logged_in_user->hasAllAccess() ||  $logged_in_user->can('admin.access.activity.view'))
        <li class="c-sidebar-nav-item">
            <x-utils.link
                class="c-sidebar-nav-link"
                :href="route('admin.activities.index')"
                :active="activeClass(Route::is('admin.activities.index'), 'c-active')"
                icon="c-sidebar-nav-icon far fa-calendar-alt"
                :text="__('translator.actvities_title')" />
        </li>
        @endif
        @if ( $logged_in_user->hasAllAccess() ||  $logged_in_user->can('admin.access.form.view'))
        <li class="c-sidebar-nav-item">
            <x-utils.link
                class="c-sidebar-nav-link"
                :href="route('admin.forms.plenaryindex')"
                :active="activeClass(Route::is('admin.forms.plenaryindex'), 'c-active')"
                icon="c-sidebar-nav-icon fab fa-wpforms"
                :text="__('translator.plenary_form_manager')" />
        </li>
        <li class="c-sidebar-nav-item">
            <x-utils.link
                class="c-sidebar-nav-link"
                :href="route('admin.forms.visitindex')"
                :active="activeClass(Route::is('admin.forms.visitindex'), 'c-active')"
                icon="c-sidebar-nav-icon fab fa-wpforms"
                :text="__('translator.visit_form_manager')" />
        </li>
        @endif
        @if ( $logged_in_user->hasAllAccess() ||  $logged_in_user->can('admin.access.setting.view'))
        <li class="c-sidebar-nav-item">
            <x-utils.link
                class="c-sidebar-nav-link"
                :href="route('admin.settings.index')"
                :active="activeClass(Route::is('admin.settings.index'), 'c-active')"
                icon="c-sidebar-nav-icon fas fa-cogs"
                :text="__('translator.setings_title')" />
        </li>
        @endif
        @if ( $logged_in_user->hasAllAccess() ||  $logged_in_user->can('admin.access.mails.view'))
        <li class="c-sidebar-nav-item">
            <x-utils.link
                class="c-sidebar-nav-link"
                :href="route('admin.mails.index')"
                :active="activeClass(Route::is('admin.mails.index'), 'c-active')"
                icon="c-sidebar-nav-icon fas fa-envelope"
                :text="__('translator.mails_title')" />
        </li>
        @endif
        @if (
                        $logged_in_user->hasAllAccess() ||
                        (
                            $logged_in_user->can('admin.access.user.list') ||
                            $logged_in_user->can('admin.access.user.deactivate') ||
                            $logged_in_user->can('admin.access.user.reactivate') ||
                            $logged_in_user->can('admin.access.user.clear-session') ||
                            $logged_in_user->can('admin.access.user.impersonate') ||
                            $logged_in_user->can('admin.access.user.change-password')
                        )
                    )
            <li class="c-sidebar-nav-item">
                <x-utils.link
                    :href="route('admin.auth.user.index')"
                    class="c-sidebar-nav-link"
                    :text="__('translator.user_title')"
                    icon="c-sidebar-nav-icon cil-user"
                    :active="activeClass(Route::is('admin.auth.user.*'), 'c-active')" />
            </li>
        @endif

        @if (
            $logged_in_user->hasAllAccess() ||
            (
                $logged_in_user->can('admin.access.user.list') ||
                $logged_in_user->can('admin.access.user.deactivate') ||
                $logged_in_user->can('admin.access.user.reactivate') ||
                $logged_in_user->can('admin.access.user.clear-session') ||
                $logged_in_user->can('admin.access.user.impersonate') ||
                $logged_in_user->can('admin.access.user.change-password')
            )
        )
            <li class="c-sidebar-nav-title">@lang('translator.system_title')</li>

            <li class="c-sidebar-nav-dropdown {{ activeClass(Route::is('admin.auth.user.*') || Route::is('admin.auth.role.*'), 'c-open c-show') }}">
                <x-utils.link
                    href="#"
                    icon="c-sidebar-nav-icon cil-user"
                    class="c-sidebar-nav-dropdown-toggle"
                    :text="__('translator.access_title')" />

                <ul class="c-sidebar-nav-dropdown-items">
                    @if ($logged_in_user->hasAllAccess())
                        <li class="c-sidebar-nav-item">
                            <x-utils.link
                                :href="route('admin.auth.role.index')"
                                class="c-sidebar-nav-link"
                                :text="__('translator.role_title')"
                                :active="activeClass(Route::is('admin.auth.role.*'), 'c-active')" />
                        </li>
                    @endif
                </ul>
            </li>
        @endif

    </ul>

    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
</div><!--sidebar-->
