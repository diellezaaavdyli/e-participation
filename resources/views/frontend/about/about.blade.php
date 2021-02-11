@extends('frontend.layouts.app')

@section('title', __('translator.about_title'))
@section('content')

   
            <p style="font-weight:bold; font-size:20px; text-align:center;">@lang('translator.republicofKosovo')</p>
            <p style="font-weight:bold; font-size:20px;text-align:center; ">@lang('translator.assemblyofKosovo')</p>
        <hr style="width:60%;">
            
 <div class="about-page" >

        <p style="text-align:center;">@lang('translator.eParticipation')</em></p>
        <p>@lang('translator.about_main_menu')</p>
    <ul>
        <li>@lang('translator.about_li_1')</li>
        <li>@lang('translator.about_li_2')</li>
        <li>@lang('translator.about_li_3')</li>
    </ul>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@lang('translator.about_p_1')</p>

        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@lang('translator.about_p_2')</p>

        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@lang('translator.about_p_3')</p>


        <img src="img/NED.png" width=100px; height:100px; style="padding-bottom:15px; ">

        <h4>@lang('translator.about_important_docs')</h4>
        <ul style="text-align:left;">
            <li><a href="http://www.kuvendikosoves.org/Uploads/Data/Files/6/KushtetutaeRepublikesseKosoves_nJ4SXNnEAT.pdf">@lang('translator.about_important_docs_1')</a></li>
            <li><a href="http://www.kuvendikosoves.org/Uploads/Data/Files/1/1920px-Flag_of_Kosovo.svg_va3RsNrubr.png">@lang('translator.about_important_docs_2')</a></li>
            <li><a href="http://www.kuvendikosoves.org/Uploads/Data/Files/1/Coat_of_arms_of_Kosovo.svg_2keFmPKHuS.png">@lang('translator.about_important_docs_3')</a></li>
            <li><a href="about:blank#blocked">@lang('translator.about_important_docs_4')</a></li>
            <li><a href="http://www.kuvendikosoves.org/Uploads/Data/Files/6/Rr_K_RK_29_04_2010_1_EDbu8aqXYd.pdf">@lang('translator.about_important_docs_5')</a></li>
        </ul> 

</div> 

@endsection

