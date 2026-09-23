@extends('frontend.main')

@section('title', "Top Hotel Management College In Delhi For Bachelor Degree | 1.5 Year Diploma Courses")
@section('description', "Explore TLSHS, one of the top hotel management colleges in Delhi offering 1.5-year diploma courses. Find detailed information on admission, fees, and more. Start your career in hospitality today!")

@section('content')


@include('home.slider')

@include('home.program')
<section class="video-box">
    <div class="midbox-inner wiki-mk">
        <video width="100%" height="auto" controls autoplay muted>
            <source src="https://tlshs.com/frontend/SCHOOL-high-res.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
</section>

@include('home.placement')


@include('home.brand')


@include('home.notice_board')


{!!  $hundred['long_description'] !!}

@include('home.hospitality')

@include('home.diffrent')

@include('home.industry_speak')

@include('home.faq')

@include('home.homeblog')    



@include('home.contact_us')


@endsection