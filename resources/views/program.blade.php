@extends('frontend.main')

@section('title', "Bachelor's & Diploma in Hospitality | TLSHS Programmes")

@section('description',
"Explore Bachelor's and Diploma degrees in Hospitality Management at The Lalit Suri Hospitality
School. Launch your career in hospitality today!")
@section('content')

<section id="home-slider">
    <img class="home-slider-img" src="{{ asset('assets/images/academic-calendar.jpg') }}" alt="Contact Us">
    <div class="hometop-section">
        <div class="hometop-section-left">
            <h3>The best phase of your life begins here</h3>
            <h1>The Lalit Suri Hospitality School</h1>
            <p>Start your career in hospitality with The Lalit Suri Hospitality School, where excellence meets
                opportunity. Here, you�ll gain the skills and connections to thrive in the global hospitality industry.
            </p>
        </div>
    </div>
</section>
<section id="admission-nav">
    <ul>
        <li class="active"><a href="{{ url('program') }}">Programmes</a></li>
        <li><a href="{{ url('program') }}/b-sc-in-hospitality-hotel-administration">Examination Scheme</a></li>
        <li>
            <a href="{{ url('program') }}/b-sc-in-hospitality-hotel-administration/academic-calendar">
                Academic Calendar
            </a>
        </li>
        <li>
            <a href="{{ url('program') }}/b-sc-in-hospitality-hotel-administration/examination-rules">
                Examination Rules
            </a>
        </li>
        <li>
            <a href="{{ asset('frontend_asset/images/2024/03/01/Date-Sheet-B.Sc_.-HHA-SEM-III-V-Revised-2023-24-13.10.23-1.pdf') }}"
               target="_black">Examination Datesheets
            </a>
        </li>
    </ul>
</section>

@if (count($data) > 0)
@php $i = 0; @endphp
@foreach ($data as $sub)
<section id="@php if ($i % 2 == 0) { echo 'about-why-hospitality';  } else { echo 'admission-section';  } @endphp">
    <div class="@php if ($i % 2 == 0) { echo 'about-why-hospitality';  } else { echo 'admission-section';  } @endphp">
        @if ($i % 2 == 0)
        <div class="about-why-hospitalityleft">
            @if ($i == 2)
            <img src="{{ asset('assets/images/bakery.jpg') }}" alt="Contact Us">
            @else
            @if ($sub->image != '')
              <img class="home-slider-img"  alt="Contact Us" src="@if(!empty($sub->image)){{asset('assets/speciality')}}/{{$sub->image}}@else{{asset('frontend_asset/images/2024/02/examination-scheme.jpg')}}@endif">
              @else
              <img src="{{ asset('assets/images/1.jpg') }}" alt="Contact Us">
              @endif
            @endif
        </div>
        @endif
        <div
            class="@php if ($i % 2 == 0) { echo 'about-why-hospitalityright';  } else { echo 'admission-section-left';  } @endphp">
            <span>
                @if (str_contains(strtolower($sub->name), 'b.sc') ||
                str_contains(strtolower($sub->name), 'bachelor') ||
                str_contains(strtolower($sub->slug), 'b-sc'))
                Degree
                @elseif (str_contains(strtolower($sub->name), 'diploma'))
                Diploma
                @else
                Certificate / Skill Development
                @endif
            </span>
            <h2>{{ $sub->name }}</h2>
            {!! $sub->short_description !!}
            <a href="{{ asset('speciality') }}/{{ $sub->mobile_image }}" target="_black">
                Syllabus of {{ $sub->name }}
                <img src="{{ asset('assets/images/arrow.png') }}" alt="Contact Us">
            </a>

        </div>
        @if ($i % 2 == 1)
        <div class="admission-section-right">
            <img src="{{ asset('assets/images/2.jpg') }}" alt="Contact Us">
        </div>
        @endif
    </div>
</section>
@php $i++; @endphp
@endforeach
@endif
@endsection