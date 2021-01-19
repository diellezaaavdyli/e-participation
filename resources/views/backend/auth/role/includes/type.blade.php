@inject('user', '\App\Models\User')

@if ($role->type === $user::TYPE_ADMIN)
    @lang('Administrator')
@elseif ($role->type === $user::TYPE_DIRECTOR)
    @lang('Director')
@elseif ($role->type === $user::TYPE_PRINCIPAL)
    @lang('Principal')
@elseif ($role->type === $user::TYPE_TEACHER)
    @lang('Teacher')
@elseif ($role->type === $user::TYPE_USER)
    @lang('User')
@else
    @lang('N/A')
@endif
