
<style>
    #home-specializations li h3{
        font-size: 21px;
    }
</style>
<section id="home-specializations">
    <div class="midbox-inner wiki-mk">
        <h2>Bachelor Program in Hospitality </h2>

        <ul>
            @foreach($Speciality as $program)
            <li>
                <h3>{{$program->name}}</h3>
               
                 {!! $program->short_description !!}   
                <a href="{{url('program')}}/{{$program->slug}}"><img src="{{asset('assets/images/home-arrow.png')}}" alt="{{$program->name}}"> </a>
            </li>
            @endforeach
           
        </ul>


    </div>
</section>