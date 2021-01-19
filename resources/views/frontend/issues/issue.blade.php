<div class="issues-item">
        <div class="issue-image">
        @inject('user', 'App\Models\User')
         <img src="{{ $user::returnAuthUserAvatar($issue->user) }}" alt="" class="rounded-image">
        </div>
        <div class="issue-content-wrapper">
            <h4 class="heading4">{{$issue->title}}</h4>
            <ul class="issue-list">
                <li><i class="far fa-calendar-alt"></i>  <span class="text-capitalized"> {{Date::parse($issue->created_at)->format('F')}}</span> {{date('j', strtotime($issue->created_at)) }},  {{date('Y', strtotime($issue->created_at)) }}</li>
                <li><i class="fas fa-user"></i> <span> {{$issue->user->name}}</span></li>
                <li><i class="fas fa-comment-alt"></i>
                
                @if($issue->comments()->count() > 1)
                {{$issue->comments()->count()}} @lang('translator.comments')
                 @elseif($issue->comments()->count() == 1)
                 {{$issue->comments()->count()}}  @lang('translator.comment')
                 @else 
                 @lang('translator.no_comment')
                 @endif
                 </li>
            </ul>
            <p>{!! substr(strip_tags($issue->description), 0, 100) !!}</p>
            <a href="{{ route('frontend.issues.getSingleIssue', ['slug' => $issue->slug]) }}" >@lang('translator.read_more') ></a>
        </div>
</div>