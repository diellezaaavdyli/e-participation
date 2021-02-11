@extends('frontend.layouts.app')

@section('title', __('translator.contact_title'))
@section('content')


<div class="about-page">
<p style="font-weight:bold; font-size:20px; text-align:center;">@lang('translator.republicofKosovo')</p>
            <p style="font-weight:bold; font-size:20px;text-align:center; ">@lang('translator.assemblyofKosovo')</p>
           
            <hr style="width:60%;">

            <p style="text-align:center;">@lang('translator.eParticipation')</p>
          
            <h4 style="font-weight:bold;">@lang('translator.contact_address')</h4>
            <span style="font-weight:bold;">@lang('translator.contact_address_h_1')</span><br><span style=" font-size:12px;">Kuvendi i Kosovës<br>Sheshi IBRAHIM RUGOVA nr. 5<br>Prishtinë (10000)<br></span>
            <span style="font-weight:bold;"> @lang('translator.contact_address_h_2')</span><span style=" font-size:12px;"><br>Kuvendi i Kosovës<br>Rruga UÇK nr. 65<br>Prishtinë (10000)</span>


         <h4>@lang('translator.contact_contact')</h4>   
         <ul>
         <li style="font-weight:600;"><a href="http://www.kuvendikosoves.org/shq/kryetari-i-kuvendit/">@lang('translator.contact_contact_p_1')</a></li>
         <li style="font-weight:600;"><a href="http://www.kuvendikosoves.org/shq/administrata/zyra-e-sekretarit-te-pergjithshem/">@lang('translator.contact_contact_p_2')</a></li>    
         <li style="font-weight:600;"><a href="http://www.kuvendikosoves.org/shq/administrata/drejtoria-e-pergjithshme-e-administrates/">@lang('translator.contact_contact_p_3')</a></li>
         <li style="font-weight:600;"><a href="http://www.kuvendikosoves.org/shq/administrata/drejtoria-e-pergjithshme-e-per-ceshtje-ligjor/">@lang('translator.contact_contact_p_4')</a></li>
         <li style="font-weight:600;"><a href="http://www.kuvendikosoves.org/shq/administrata/drejtoria-per-media-dhe-marredhenie-me-publik/">@lang('translator.contact_contact_p_5')</a></li>
        
         </ul>
         <h4 style="font-weight:bold;">@lang('translator.direct_contact')</h4>   
         <ul>
         <li style="font-weight:600;" ><a href="https://president-ksgov.net/">@lang('translator.direct_contact_p_1')</a></li>
         <li style="font-weight:600;"><a href="http://kryeministri-ks.net/">@lang('translator.direct_contact_p_2')</a></li>         
         <li style="font-weight:600;"><a href="https://www.kqz-ks.org/">@lang('translator.direct_contact_p_3')</a></li>
         <li style="font-weight:600;"><a href="https://mail.rks-gov.net/owa/auth/logon.aspx?replaceCurrent=1&url=https%3a%2f%2fmail.rks-gov.net%2fowa%2fCookieAuth.dll%23GetLogon%3freason%3d0%26formdir%3d1%26curl%3dZ2FOWAZ2F">@lang('translator.direct_contact_p_4')</a></li>
         <li style="font-weight:600;"><a href="http://www.kuvendikosoves.org/shq/harta-e-faqes/">@lang('translator.direct_contact_p_5')</a></li>
         </ul>

  </div>
@endsection