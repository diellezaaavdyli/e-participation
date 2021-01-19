<x-utils.link
    class="c-subheader-nav-link"
    :href="route('admin.auth.user.deactivated')"
    :text="__('translator.deactivate_user_title')"
    permission="admin.access.user.reactivate" />

@if ($logged_in_user->hasAllAccess())
    <x-utils.link class="c-subheader-nav-link" :href="route('admin.auth.user.deleted')" :text="__('translator.deleted_user_title')" />
@endif
