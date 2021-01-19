<button class="close-button show-on-small-device close-sidebars"><i class="fas fa-times"></i></button>

<div class="input-wrapper">
    <form class="w-100" action="{{ route('frontend.issues.index') }}" method="get">
        <input class="input-search" type="text" placeholder="@lang('translator.search_placeholder')" name="search">
        <button class="float-right search-button" type="submit"><i class="fab fa-sistrix"></i></button>
    </form>
</div>
<div class="activities-wrapper">
    <div class="activities-header">
        <h4>@lang('translator.sidebar_activities_title')</h4> 
    </div>
    <div class="w-100 activities-list">
    @inject('activities', 'App\Models\Activity')
    @if(count($activities::getLastActivites()) > 0)
        @foreach($activities::getLastActivites() as $activity)
                @include('frontend.activities.activity')
        @endforeach
    @else
    <h5>@lang('translator.sidebar_activities_empty')</h5>
    <hr>
    @endif
    </div>
</div>
<div class="tags-wrapper">
    <div class="sidebar-title-wrapper">
        <h4>@lang('translator.sidebar_tag_title')</h4>
    </div>
    <?php 
    $tagvalue = '';
    if(isset($_GET['tag'])){
        $tagvalue  = $_GET['tag'];
    }
    ?>
    <div class="tags-body-wrapper">
    @inject('tags', 'App\Models\Tag')
    @if(count($tags::getTags()) > 0)
    <form  class="w-100 tag-form" action="{{ route('frontend.issues.index') }}" method="get">
        @foreach($tags::getTags() as $tag) 
          <label class="tag-item {{ ($tagvalue == $tag->slug) ? 'active': '' }} " for="tag-{{$tag->slug}}">{{$tag->name}}
          <input class="tag-checkbox" type="radio" name="tag" id="tag-{{$tag->slug}}" {{ ($tagvalue == $tag->slug) ? 'checked': '' }} value="{{$tag->slug}}">
          </label>
        @endforeach
    </form>
    @else
    <h5>@lang('translator.sidebar_tag_empty')</h5>
    <hr>
    @endif
    </div>
</div>
@inject('content', 'App\Models\Content')
@if($content::returnContentValue('sidebar_description') && $content::returnContentValue('sidebar_description')->image)
<div class="sidebar-image-wrapper separator-1" style="background:url('{{ url('/images') .'/'. $content::returnContentValue('sidebar_description')->image}}')">
    <div class="image-content-wrapper  page-content-wrapper">
        @if($content::returnContentValue('sidebar_description')->image)
    {!!  $content::returnContentValue('sidebar_description')->description !!}
    @endif
    </div>
</div>
@endif
<div class="sidebar-list-wrapper separator-1 w-100 d-inline-block">
<div class="sidebar-title-wrapper">
@inject('socials', 'App\Models\Social')
        <h4>@lang('translator.socials_title')</h4>
    </div>
    <ul class="list-unstyled social-list">
    @if(count($socials::getSocials()) > 0)
        @foreach($socials::getSocials() as $social) 
        @if($social->name ==='facebook')
            <li><a target="_blank" href="{{$social->url}}"><i class="fab fa-facebook-square"></i></a></li>
        @elseif($social->name ==='instagram' && $social->url !== '')
       
       
        @elseif($social->name ==='youtube' && $social->url !== '')
        <li><a target="_blank" href="{{$social->url}}"><i class="fab fa-youtube"></i></a></li>
        @endif
            @endforeach
        @endif
    </ul>
</div>
<div class="sidebar-list-wrapper separator-1">
    <div class="sidebar-title-wrapper">
        <h4>@lang('translator.archives_title')</h4>
    </div>
    <ul class="sidebar-list">
        @if(count($activities::getActivitiesByMonth()) > 0)
         @foreach($activities::getActivitiesByMonth() as $activity) 
                   <?php
                   $monthNum  = $activity->month;
                   $dateObj   = DateTime::createFromFormat('!m', $monthNum);
                   $monthNameDisplay = Date::parse($dateObj)->format('F');
                   $monthName = $dateObj->format('F');
                   $date = $monthName .'/'. $activity->year
                   ?>
                <li><a class="text-capitalized" href="{{ route('frontend.activities.index', ['date'=>$date ]) }}"> {{$monthNameDisplay}} {{$activity->year}} <span>({{$activity->counter}})</span> </a> </li>
         @endforeach
        @endif
  
      
    </ul>
</div>

<div class="sidebar-articles-wrapper separator-1">
<div class="sidebar-title-wrapper">
        <h4>@lang('translator.issues_title')</h4>
    </div>
    <div class="w-100 articles-list">
    @inject('user', 'App\Models\User')
        @inject('issues', 'App\Models\Issue')
        @if(count($issues::getLastIssues()) > 0)
         @foreach($issues::getLastIssues() as $issue) 
        <div class="article-item-wrapper">
            <div class="image-container">
                <img src="{{$user::returnAuthUserAvatar($issue->user)}}" alt="">
            </div>
            <div class="article-item-content">
                <h5>{{$issue->title}}</h5>
                <div class="date-location-comment-article">
                    <div class="date">
                    <span class="date-separator text-capitalized"><i class="far fa-calendar-alt"></i> {{ substr( Date::parse($issue->created_at)->format('F'), 0, 3)}} {{date('j', strtotime($issue->created_at)) }},  {{date('Y', strtotime($issue->created_at)) }}</span>
                    <span><i class="fas fa-comment-alt"></i> ({{$issue->comments()->count()}})</span>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>
</div>

