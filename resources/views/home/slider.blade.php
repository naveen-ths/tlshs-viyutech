<section id="home-slider">
@foreach($banner as $bann)
    <img class="home-slider-img" src="{{asset('assets/banner')}}/{{$bann->icon}}" alt="B. Sc. Hotel Management - The LaLiT Suri Hospitality School">
    <div class="hometop-section">
        <div class="hometop-section-left">
            <h3>{!! $bann->name !!}</h3>
            <h1>The Lalit Suri Hospitality School</h1>
          <p>  {!! $bann->description !!}  </p>
            <div class="hometop-section-button">
                <a href="{{url('apply')}}">Get Started <img src="{{asset('assets/images/arrow.png')}}" alt="get started"></a>
            </div>

        </div>
    </div>
@endforeach
</section>