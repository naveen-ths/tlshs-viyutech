@extends('frontend.main')

@section('title', 'Unlock Hotel Success: Hospitality & Hotel Management Blog')
@section('description', "Intriguing & Informative: Seeking Hotel Management Expertise? Discover proven strategies, industry trends & guest experience secrets. Boost your hotel's success. Read Now!")

@section('content')

<section id="home-slider">
    <img class="home-slider-img" src="{{asset('frontend_asset/images/2024/02/faculty.jpg')}}" alt="Hotel Management and Catering Technology">
    <div class="hometop-section">
        <div class="hometop-section-left">
            <h3>Learn the art of hospitality service with</h3>
            <h1>Hotel Management and Catering Technology</h1>
            
            <div class="hometop-section-button">
                <a href="{{url('contact-us')}}">Get Started <img src="{{asset('frontend_asset/images/2024/01/arrow.png')}}" alt="TLSH"></a>
            </div>

        </div>
    </div>
</section>
 

<section id="home-lalit-news">
     <div class="midbox-inner wiki-mk">
         <h2>Blogs </h2>


         <div class="owl-slider">
             <div id="lalit-news" class="owl-carousel">
@foreach($blogs as $list)
                 <div class="item">
                     <div class="lalit-news-item"><img src="{{asset('blog')}}/{{$list->icon}}" alt="{{$list->name}}">
                         <h3>{{$list->name}}</h3>
                         <div class="news-doc">
                             <a href="{{url('blog')}}/{{$list->slug}}">Read More</a>
                             <span>{{ date('F d, Y', strtotime($list->created_at)) }}  </span>
                         </div>
                     </div>
                 </div>
                 <!---item END-->
@endforeach
                  

             </div>
         </div>
         <!---END-->

     </div>
 </section>


 <section id="web-lalit-button">
     <div class="midbox-inner wiki-mk">

         <ul>
             <li>
                 <img src="{{asset('frontend_asset/images/2024/01/07/1.jpg')}}" alt="Contact Us">
                 <h3>Contact Us</h3>
                 <a href="{{url('contact-us')}}">
                    <img src="{{asset('frontend_asset/images/2024/01/b-icon.png')}}" alt="Contact Us"></a>
             </li>
             <li>
                 <img src="{{asset('frontend_asset/images/2024/01/07/1.jpg')}}">
                 <h3>Download a<br> Brochure</h3>
                 <a href="{{asset('frontend_asset/images/2024/03/01/E-brochure.pdf')}}" target="_black">
                    <img src="{{asset('frontend_asset/images/2024/01/b-icon.png')}}" alt="Download a  Brochure"></a>
             </li>
             <li>
                 <img src="{{asset('frontend_asset/images/2024/01/07/1.jpg')}}" alt="TLSH">
                 <h3>Apply Now</h3>
                 <a href="{{url('apply')}}"><img src="{{asset('frontend_asset/images/2024/01/b-icon.png')}}" alt="Apply Now"></a>
             </li>
         </ul>

     </div>
 </section>


@endsection