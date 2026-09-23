
<style>
.fb-feed-box h2 {
  font-size:34px;
  color: #000000;
  padding-bottom: 20px;
  z-index: 1;
  width: 100%;
  position: relative;
  display: block;
  font-family: Prata Regular;
}
</style>

<!--<section class="fb-feed-box" style="background: #FAFAFA; padding: 60px 0px 60px;">-->
<!--<div class="midbox-inner wiki-mk">-->
<!--<h2>Facebook @TLSHS</h2>-->
<!--<div class="taggbox" style="width:100%;height:100%" data-widget-id="2140529" data-tags="false"  ></div><script src="https://widget.taggbox.com/embed-lite.min.js" type="text/javascript"></script>-->
<!--</div>-->
<!--</section>-->
<footer>
    <div class="midbox-inner wiki-mk">
        <div class="footer-logobox">
            <div class="footer-logobox-left">
                <img src="{{asset('assets/images/logo-f.png')}}">
            </div>
            <div class="footer-logobox-right">
                <p>Transform your passion into a profession at The Lalit Suri Hospitality School, where we equip you
                    with the skills and knowledge to excel in the global hospitality arena.</p>
            </div>
        </div>

        <div class="footer-section">
            <div class="footer-links">
                <div class="footer-navbox">
                    <h4 class="footer-nav-des">Quick Links</h4>
                    <h4 class="but footer-nav-mob">Quick Links <i class="fas fa-chevron-down"></i></h4>
                    <ul class="footerbox">
                        <li><a href="{{url('/')}}" target="_self">Home</a></li>
                        <li><a href="{{url('about-us')}}" target="_self">About Us</a></li>
                        <li><a href="{{url('program')}}" target="_self">Programmes</a></li>
                        <li><a href="{{url('admission')}}" target="_self">Admission</a></li>
                        <li><a href="{{url('event')}}" target="_self">Events</a></li>
                        <li><a href="{{url('faculty')}}" target="_self">Faculty</a></li>
                        <li><a href="{{url('contact-us')}}" target="_self">Contact Us</a></li>
                        <li><a href="{{url('blogs')}}" target="_self">Blogs</a></li>
                    </ul>
                </div>
                <div class="footer-navbox">
                    <h4 class="footer-nav-des">Programmes</h4>
                    <h4 class="but footer-nav-mob">Programmes <i class="fas fa-chevron-down"></i></h4>
                    <ul class="footerbox">
                        @foreach($specfooter as $data)
                        <li><a href="{{url('program')}}/{{$data->slug}}" target="_self">{{$data->name}}</a></li>
                        @endforeach
                        <!-- <li><a href="diploma-in-food-production.html" target="_self">Diploma in Food Production</a></li>
                        <li><a href="diploma-in-bakery-patisserie.html" target="_self">Diploma in Bakery &
                                Patisserie</a></li> -->
                    </ul>
                </div>
                <div class="footer-navbox">
                    <h4 class="footer-nav-des">Legal</h4>
                    <h4 class="but footer-nav-mob">Legal <i class="fas fa-chevron-down"></i></h4>
                    <ul class="footerbox">
                        <li><a href="{{url('privacy-policy')}}" target="_self">Privacy Policy</a></li>
                        <li><a href="{{url('terms-conditions')}}" target="_self">Terms and Conditions</a></li>
                    </ul>
                </div>
                <div class="footer-navbox">
                    <h4 class="footer-nav-des">Get in Touch</h4>
                    <h4 class="but footer-nav-mob">Get in Touch <i class="fas fa-chevron-down"></i></h4>
                    <ul class="footerbox">
                        <li><a href="#" target="_self">Near Badkhal Complex, Pali <br>Road Faridabad 121 001,<br>
                                Haryana, India </a></li>
                        <li><a href="tel:+91 9810349440" onclick="gtag('event', 'Click', { 'event_category' : 'Call Now Footer', 'event_label' : 'Call Now  Footer'});" target="_self">T: +91 9810349440</a></li>
                        <li><a href="tel: 9810349440"  onclick="gtag('event', 'Click', { 'event_category' : 'Call Now Footer', 'event_label' : 'Call Now  Footer'});" target="_self">F: +91 8826601199</a></li>
                        <li><a href="#" target="_self">E: admissions@tlshs.com</a></li>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d112312.50466252828!2d77.15592844041102!3d28.3961417281155!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cde778471c225%3A0xca232497a1dceb18!2sThe%20Lalit%20Suri%20Hospitality%20School!5e0!3m2!1sen!2sin!4v1742972829536!5m2!1sen!2sin" width="300" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </ul>
                </div>

            </div>
            <div class="footer-newsletter">
                <h4>Subscribe to Newsletter</h4>
                <p>Subscribe to our newsletter and be the first one to get updates</p>
                <form method="POST" action="{{url('subscribePost')}}">
                    @csrf
                    <div class="search-newsletter"><input type="email" placeholder="Enter your email..." name="email"
                            required="" style="">
                        <button type="submit" name="en" class="subscribe-now">Subscribe</button>
                    </div>
                </form>

                <div class="wiki">
                    <ul>
                        <li>
                            <a href="https://www.facebook.com/TheLalitSuriHospitalitySchool/" target="_black"><i
                                    class="fab fa-facebook-f"></i></a>
                        </li>

                        <li>
                            <a href="https://in.linkedin.com/company/tlshs" target="_black"><i
                                    class="fab fa-linkedin-in"></i></a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>

        <div class="copyright">

            <div class="wh">
                <!--a href="#" target="_black">Privacy Policy</a> | <a href="#" target="_black">Terms &amp; Conditions</a-->
                © Copyright {{date('Y')}} The Lalit Suri Hospitality School, All rights reserved.
            </div>

        </div>
</footer>