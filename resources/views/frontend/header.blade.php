<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PSZ6HV2P"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PCT7QQ6S"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>


<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5KCW45XC" height="0" width="0"
                  style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<header class="header" id="header-id">
    <!---subnav--->
    <div class="headerTertiary">
        <a href="{{url('/')}}" target="_self" class="logo-d"> <img src="{{asset('assets/images/logo.png')}}" alt="Brand Logo"></a>
        <div Class="headnav-right">
            <div class="topnav-sub-menu">
                <ul>
                    <!--<li><a href="{{url('scholarship')}}" target="_self">Scholarship</a></li>-->
                    <!---li><a href="#" target="_self">Research</a></li--->
                    <li><a href="{{asset('frontend/images/2024/03/01/E-brochure.pdf')}}" target="_black">E-Brochure</a></li>
                    <!--<li><a href="{{url('apply')}}" target="_self">Apply</a></li>-->
                    <style>
                      .npfTitle img {
                          width: 6%!important;
                      }
                      .npfWidget-c5b6c4e8c2d57f19409612c15c4ec0bb.npfWidgetButton { padding: 0; background-color: #BA1717;
                      }
                      #popup-in-c5b6c4e8c2d57f19409612c15c4ec0bb { background-color: #fff; }
                    </style>
                    <li><button type="button" class="npfWidgetButton npfWidget-c5b6c4e8c2d57f19409612c15c4ec0bb">Apply</button></li>
                    <?php
                    if (Auth::check()) {
                      ?>
                        <input type="button" value="Log Out" class="btn btn-default btn-flat float-end" onClick='submitDetailsForm()' />
                        <form id="logout_form" method="POST" action="{{ route('logout') }}">
                            @csrf
                        </form>
                      <?php
                    } else {
                      ?>
                      <!--<li><a href="{{url('logout')}}" target="_self">Logout</a></li>-->
                      <?php }
                      ?>
                </ul>
            </div>
            <script language="javascript" type="text/javascript">
              function submitDetailsForm() {
                  document.getElementById("logout_form").submit();
              }
            </script>
            <div class="topnav-right">
                <div class="menu-top">
                    <div class="page-header">
                        <nav>
                            <div class="top-menu-wrapper">
                                <ul class="top-menu">

                                    <!--<li class="has-dropdown" style="display: block;">-->
                                    <!--    <a href="{{url('/')}}"> Home </a>-->
                                    <!--</li>-->

                                    <li class="has-dropdown" style="display: block;">
                                        <a href="{{url('about-us')}}"> About Us </a>
                                    </li>

                                    <!--<li class="has-dropdown" style="display: block;">-->
                                    <!--    <a href="{{url('program')}}"> Programmes </a>-->
                                    <!--</li>-->
                                    <li class="has-dropdown" style="display: block;">
                                        <a href="{{url('program')}}"> Programmes  <i class="fas fa-chevron-down"></i></a>
                                        <ul class="sub-menu wiki-nav">
                                            <!-- Degree Category -->
                                            <li class="menu-category"><strong>Degree</strong></li>
                                            @foreach($specfooter as $data)
                                                @if(str_contains(strtolower($data->name), 'b.sc') || str_contains(strtolower($data->name), 'bachelor') || str_contains(strtolower($data->slug), 'b-sc'))
                                                    <li><a href="{{url('program')}}/{{$data->slug}}">{{$data->name}}</a></li>
                                                @endif
                                            @endforeach
                                            
                                            <!-- Diploma Category -->
                                            <li class="menu-category"><strong>Diploma</strong></li>
                                            @foreach($specfooter as $data)
                                                @if(str_contains(strtolower($data->name), 'diploma'))
                                                    <li><a href="{{url('program')}}/{{$data->slug}}">{{$data->name}}</a></li>
                                                @endif
                                            @endforeach
                                            
                                            <!-- Certificate / Skill Development Category -->
                                            <li class="menu-category"><strong>Certificate / Skill Development</strong></li>
                                            @foreach($specfooter as $data)
                                                @if(!str_contains(strtolower($data->name), 'diploma') && !str_contains(strtolower($data->name), 'b.sc') && !str_contains(strtolower($data->name), 'bachelor') && !str_contains(strtolower($data->slug), 'b-sc'))
                                                    <li><a href="{{url('program')}}/{{$data->slug}}">{{$data->name}}</a></li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li class="has-dropdown" style="display: block;">
                                        <a href="{{url('admission')}}"> Admission </a>
                                    </li>
                                    <li class="has-dropdown" style="display: block;">
                                        <a href="#"> Scholarship  <i class="fas fa-chevron-down"></i></a>
                                        <ul class="sub-menu wiki-nav">
                                            <li><a href="/aditya-nanda-scholarship">Aditya Nanda Scholarship</a> </li>
                                            <li><a href="/apna-heera-scholarship">Apna Heera Scholarship</a> </li>

                                        </ul>
                                    </li>
                                    <li class="has-dropdown" style="display: block;">
                                        <a href="{{url('event')}}"> Events </a>
                                    </li>
                                    <li class="has-dropdown" style="display: block;">
                                        <a href="{{url('faculty')}}"> Faculty </a>
                                    </li>

                                    <li class="has-dropdown" style="display: block;">
                                        <a href="{{url('contact-us')}}"> Contact Us </a>
                                    </li>

                                </ul>

                            </div>
                        </nav>



                    </div>
                </div>
            </div>

        </div>
    </div>



    <!---subnav END--->
    <!---top nav--->
    <div class="headerSecondry">
        <div class="header-inner wiki-mk">
            <a href="{{url('/')}}" target="_self" class="logo-m"> <img src="{{asset('assets/images/logo.png')}}"
                                                                       alt="Brand Logo"></a>
            <div class="mob-head-button">
                <!---div class="m-searchbox"><a href="#" data-popup-open="popup-7"><img src="images/2024/01/search-m-icon.png"></a></div-->
                <div class="mob-phone"><a href="tel:+919810349440"><img src="{{asset('assets/images/mob-icon.png')}}"></a></div>
                <!--<div class="get-started-m"><a href="{{url('apply')}}">Apply</a></div>-->
                <div class="get-started-m"><button type="button" class="npfWidgetButton npfWidget-c5b6c4e8c2d57f19409612c15c4ec0bb">Apply</button></div>
                <div class="burger js-menuToggle">
                    <i class="fa fa-navicon"></i>
                </div>
            </div>

            <nav class="navbar">

                <ul class="pushNav js-topPushNav">
                    <li class="closeLevel js-closeLevelTop hdg">
                        <i class="fa fa-close"></i>
                        Close
                    </li>

                    <li><a href="{{url('/')}}">Home</a></li>
                    <li><a href="{{url('about-us')}}">About Us</a></li>
                    <li><a href="{{url('program')}}">Programmes</a></li>
                    <li><a href="{{url('admission')}}">Admission</a></li>
                    <li><a href="{{url('event')}}">Events</a></li>
                    <li><a href="{{url('faculty')}}">Faculty</a></li>
                    <li><a href="{{url('apply')}}">Apply</a></li>
                    <li><a href="{{url('contact-us')}}">Contact Us</a></li>

                </ul>
            </nav>


        </div>
    </div>
    <!---subnav END--->
    <!---main nav--->
</header>
<!---header--->