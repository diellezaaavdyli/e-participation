@if ($user->isAdmin())
    @lang('Administrator')
@elseif ($user->isDirector())
    @lang('Director')
@elseif ($user->isPrincipal())
    @lang('Principal')
@elseif ($user->isTeacher())
    @lang('Teacher')
@elseif ($user->isUser())
    @lang('User')
@else
    @lang('N/A')
@endif
