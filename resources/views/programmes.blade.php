@extends('frontend.main')

@section('title', $data['title'])
@section('keywords', $data['keyword'])
@section('description', $data['description'])



@push('program')
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Course",
  "name": "{{$data['name']}}",
  "description": "{{$data['description']}}",
  "provider": {
    "@type": "EducationalOrganization",
    "name": "TLSHS",
    "url": "https://tlshs.com"
  },
  "educationalProgramMode": "Offline",
  "offers": {
    "@type": "Offer",
    "price": "Contact for Fees",
    "priceCurrency": "INR",
    "url": "https://tlshs.com/program/{{$data['slug']}}"
  }
}
</script>

@endpush

@section('content')

<style>
    .hometop-section-left ul li{
        color: #ffffff;
        list-style: circle;
    }
    #home-slider .hometop-section-left {
            width: 51%;
    }
</style>

<section id="home-slider">
    <img class="home-slider-img"  alt="Contact Us" src="@if(!empty($data['image'])){{asset('assets/speciality')}}/{{$data['image']}}@else{{asset('frontend_asset/images/2024/02/examination-scheme.jpg')}}@endif">
    <div class="hometop-section">
        <div class="hometop-section-left">
          
            <h1>{{$data['name']}}</h1>
              <h3>{{$data['quote']}}</h3>
            {!! $data['centered_content'] !!}

        </div>
    </div>
</section>




<section id="admission-nav">
    <ul>
        <li><a href="{{url('program')}}">Programmes</a></li>
        <li class="active"><a href="{{url('program')}}/{{$data['slug']}}">Examination Scheme</a></li>
        @foreach($sub_specialityList as $list)
        <li><a href="{{url('program')}}/{{$data['slug']}}/{{$list['slug']}}">{{$list['name']}}</a></li>
        @endforeach
        <!-- <li><a href="examination-rules.html">Examination Rules</a></li> -->
        <li><a href="{{asset('frontend_asset/images/2024/03/01/Date-Sheet-B.Sc_.-HHA-SEM-III-V-Revised-2023-24-13.10.23-1.pdf')}}"
                target="_black">Examination Datesheets</a></li>
    </ul>
</section>
 <style>
.breadcrumb{background:#efefef; padding: 12px 0 12px;display: flex;flex-direction: column;}
.breadcrumb ul {padding: 0px; display: flex;     flex-wrap: wrap;}
.breadcrumb li {list-style:none;position: relative;text-align: left;color:#000; font-size: 14px; }
.breadcrumb li a {padding:0px 6px 0px ;color:#000;font-weight: 400;}
.breadcrumb li a:hover {color:#BA1717;}
.breadcrumb li:last-child{padding-left:10px;}
.breadcrumb .fa {color: #444;position: absolute;top:6px;right:8px;}
.breadcrumb .fa-home{color:#1c2b70;position: absolute;top:10px;right:10px;}
 </style>
 
<section class="breadcrumb">
<div class="mid-inner  wiki-mk">
<ul>
<li><a href="{{url('/')}}">Home  </a> / </li>
<li> <a href="{{url('program')}}"> Programmes </a> / </li>
  <li><a href="#">{{$data['name']}}</a></li>
</ul>
</div>
</section>
 
<section id="examination-scheme">
    <div class="midbox-inner wiki-mk">
        <div class="examination-scheme">

            <div class="examination-scheme-left">
                <div class="examination-scheme-nav">
                    <ul>  
                        <li   class="active" ><a href="{{url('program')}}/{{$data['slug']}}">{{$data['name']}}</a></li>
                        @foreach($restdata as $rdata)
                        <li><a href="{{url('program')}}/{{$rdata['slug']}}">{{$rdata->name}}</a></li>
                        @endforeach
                    </ul>

                </div>
            </div>


            <div class="examination-scheme-right">
                <h2>{{$data['name']}}</h2>

              
                {!! $data['long_description'] !!}

            </div>

        </div>
    </div>
</section>

<section id="admission-nav">
<ul>
        <li class="active"><a href="https://tlshs.com/program">Programmes</a></li>
        <li class="active"><a href="https://tlshs.com/blog">Blogs</a></li>
        <li class="active"><a href="https://tlshs.com/faculty">Faculty</a></li>
        <li class="active"><a href="https://tlshs.com/aditya-nanda-scholarship">Aditya Nanda Scholarship</a></li>
        <li class="active"><a href="https://tlshs.com/apna-heera-scholarship">Apna Heera Scholarship</a></li>   
</ul>
</section>

@endsection