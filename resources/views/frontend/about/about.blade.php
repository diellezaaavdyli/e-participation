@extends('frontend.layouts.app')

@section('title', __('translator.about_title'))
@section('content')

   
            <p style="font-weight:bold; font-size:20px; text-align:center;">@lang('translator.republicofKosovo')</p>
            <p style="font-weight:bold; font-size:20px;text-align:center; ">@lang('translator.assemblyofKosovo')</p>
        <hr style="width:60%;">
            
 <div class="about-page" >

        <p style="text-align:center;">eParticipation is an inclusive platform which aims to engage citizens
        in decision-making and public service delivery by submitting issues to specific 
        Members of the Assembly, following the activities of the Assembly, 
        and directly submitting electronic forms.  </em></p>
        <p>This platform consists of three categories listed in the main menu: </p>
    <ul>
        <li>Home</li>
        <li>Agenda</li>
        <li>Visit & Attend</li>
    </ul>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The Home bar directs the citizens to the main page of this platform 
        where they can address an issue to a respective member of the Assembly,
        or to the Assembly institution as a whole where a respective member of the Assembly
        will respond to each issue respectively. When navigating through the home page,
        citizens can address an issue using the form by first writing a title of the issue,
        then describing the issue including as much details as necessary. When scrolling down,
        the citizens can see the issues listed by the latest issues in the top. The citizens 
        then can press read more to see the issue and the response towards that issue. 
        If a third party user wants to see the issues submitted in the platform in order to 
        check how they have been addressed, they can use the keyword section, by selecting a
        keyword and submitting, so that the issue that contains that keyword pops up. </p>

        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The Agenda bar directs the citizens to the page containing the
        agenda of the Assembly of the Republic of Kosovo. Citizens can
        apply to be part of any event showcased in the calendar by choosing 
        the event and pressing attend. In order to attend the event the citizens 
        should first apply by filling the information required. As soon as their 
        request is submitted, the staff from the Assembly of the Republic of Kosovo
        will handle the requests and notify them with a response. </p>

        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The Visit & Attend bar directs the citizens to the page where they can 
        request to attend a plenary meeting or merely pay a visit to the Assembly
        of the Republic of Kosovo. In order to do so, the citizens should first fill 
        in the form in the page and a contact point from the Assembly of the Republic 
        of Kosovo will handle their requests and notify them via email. </p>


        <img src="img/NED.png" width=100px; height:100px; style="padding-bottom:15px; ">

        <h4>Dokumente të rëndësishme:</h4>
        <ul style="text-align:left;">
            <li><a href="http://www.kuvendikosoves.org/Uploads/Data/Files/6/KushtetutaeRepublikesseKosoves_nJ4SXNnEAT.pdf">Kushtetuta e Republikës së Kosovës</a></li>
            <li><a href="http://www.kuvendikosoves.org/Uploads/Data/Files/1/1920px-Flag_of_Kosovo.svg_va3RsNrubr.png">Flamuri i Republikës së Kosovës</a></li>
            <li><a href="about:blank#blocked">Himni i Republikës së Kosovës</a></li>
            <li><a href="http://www.kuvendikosoves.org/Uploads/Data/Files/1/Coat_of_arms_of_Kosovo.svg_2keFmPKHuS.png">Stema e Republikës së Kosovës</a></li>
            <li><a href="http://www.kuvendikosoves.org/Uploads/Data/Files/6/Rr_K_RK_29_04_2010_1_EDbu8aqXYd.pdf">Rregullorja e Kuvendit të Republikës së Kosovës</a></li>
        </ul> 

</div> 

@endsection

