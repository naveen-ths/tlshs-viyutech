<section id="home-lalit-news">
    <div class="midbox-inner wiki-mk">
        <h2>Blogs and News Articles</h2>
        <div class="owl-slider">
            <div id="lalit-news" class="owl-carousel">
                @foreach($blogs as $data)
                <div class="item">
                    <div class="lalit-news-item">
                        <img src="{{asset('assets/blog')}}/{{$data->icon}}" alt=" {{$data->name}}"  alt="Contact Us">
                        <h3>{{$data->name}}</h3>
                        <div class="news-doc">
                            <a href="{{url('blog')}}/{{$data->slug}}">Read More</a>
                            <span>{{ date('F d, Y', strtotime($data->created_at)) }} </span>
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