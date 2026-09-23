@extends('frontend.main')

@section('title', $blog_info['title'])
@section('keywords', $blog_info['keyword'])
@section('description', $blog_info['description'])

@push('structured-data')
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "BlogPosting",
      "headline": "{{ $blog_info['title'] }}",
      "description": "{{ $blog_info['description'] }}",
      "image": "{{ asset('blog')}}/{{$blog_info['image'] }}",
      "author": {
        "@type": "Person",
        "name": "TLSHS Editorial Team"
      },
      "publisher": {
        "@type": "Organization",
        "name": "The Lalit Suri Hospitality School",
        "logo": {
          "@type": "ImageObject",
          "url": "https://tlshs.com/wp-content/uploads/2023/04/logo.png"
        }
      },

      "datePublished": "{{ $blog_info['created_at'] }}",
      "dateModified": "{{ $blog_info['updated_at'] }}",
      "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "{{ url()->current() }}"
      }
    }
    </script>
@endpush
 @if(!empty($blog_info['long_description2']))
        @push('blogschema')
        {!! $blog_info['long_description2'] !!}
        @endpush
 @endif        
 
@section('content')

<section id="blog-details-slider">

    <div class="midbox-inner wiki-mk">
        <div class="blog-details-slider">
            <div class="blog-details-lefttext">

                <h1>{{$blog_info['name']}} </h1>
                {!! $blog_info['short_description'] !!}

                <div class="blog-section-right">
                    <div class="blog-od">
                        <img src="{{asset('frontend_asset/images/2024/01/blog-img.png')}}" alt="TLSHS">
                        TLSHS
                    </div>
                    <div class="blog-datetime">{{ date('F d, Y', strtotime($blog_info->created_at)) }} 
                        <div class="time-blog"><span></span>10 mins read</div>
                        <div class="time-blog"><span></span>Views: {{$blog_info['count']}}</div>
                    </div>
                </div>


            </div>
            <div class="blog-details-rightimg">
                <img src="{{asset('blog')}}/{{$blog_info['image']}}" alt="{{$blog_info['name']}} ">
            </div>
        </div>
    </div>
</section>



<section id="blog-mid-doc">
    <div class="midbox-inner wiki-mk">
        <div class="blog-mid-doc">
            <div class="blog-mid-doc-left">

                {!! $blog_info['long_description'] !!}
                <hr />
                <h4 class="mt-4">Comments:</h4>
                <?php
//                if(Auth::check()) {
//                 echo  'Welcome '.Auth::user()->name;
                 ?>
                <form id="comment-form" action="post" >
                    @csrf
                    <div class="form-group">
                        <textarea class="form-control" id="comment_message" name="comment_message" placeholder="Write Your Comment..."></textarea>
                        <input type="hidden" id="post_id" name="post_id" value="{{ $blog_info['id'] }}" />
                    </div>
                    <div class="form-group text-end">
                        <button id="comment-submit-btn" class="btn btn-success mt-2" type="button"><i class="fa fa-comment"></i> Add Comment</button>
                    </div>
                </form>
                <?php
//                    echo '<pre>';
//                    print_r($comments);
//                    echo '</pre>';
                ?>
                <?php
//                } else {
//                }
                ?>
                @include('comments.commentsDisplay', ['comments' => $comments, 'post_id' => $blog_info['id']])
                
            </div>
            <div class="blog-mid-doc-right">


                <div class="blog-nav Subscribe">
                    <h3>Weekly Newsletter</h3>
                    <p>Stay Connected, Stay Inspired, Updates on Events, Highlights and More...</p>

                    <input type="text" placeholder="Your name" name="name" required="">
                    <button type="submit" name="en" class="send-message"> Subscribe </button>
                </div>




                <div class="blog-nav Subscribe">
                    <h3>Related Blogs</h3>
                    @foreach($related_blog as $blg)
                    <p><a href="{{url('blog')}}/{{$blg->slug}}">{{$blg->name}}</a></p>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</section>


<section id="web-lalit-button">
    <div class="midbox-inner wiki-mk">

        <ul>
            <li>
                <img src="{{asset('frontend_asset/images/2024/01/07/1.jpg')}}" alt="TLSH">
                <h3>Contact Us</h3>
                <a href="{{url('contact-us')}}"><img src="{{asset('frontend_asset/images/2024/01/b-icon.png')}}" alt="Contact Us"></a>
            </li>
            <li>
                <img src="{{asset('frontend_asset/images/2024/01/07/1.jpg')}}" alt="Download Brochure">
                <h3>Download a<br> Brochure</h3>
                <a href="{{asset('frontend_asset/images/2024/03/01/E-brochure.pdf')}}" target="_black">
                    <img src="{{asset('frontend_asset/images/2024/01/b-icon.png')}}" alt="Download Brochure"></a>
            </li>
            <li>
                <img src="{{asset('frontend_asset/images/2024/01/07/1.jpg')}}" alt="Apply Now">
                <h3>Apply Now</h3>
                <a href="{{url('apply')}}"><img src="{{asset('frontend_asset/images/2024/01/b-icon.png')}}" alt="TLSH"></a>
            </li>
        </ul>

    </div>
</section>


@endsection