<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="robots" content="NOINDEX,NOFOLLOW" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>TLSH</title>
    <link rel="icon" type="image/png" href="favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1" />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css'>
    <link rel='stylesheet'
        href='https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.2/iconfont/material-icons.min.css'>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/appointment-app.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend_assets/css/main.css')}}">
</head>

<body>

    <section class="sighup-section">
        <img src="{{asset('assets/images/bg.jpg')}}" class="treatment-img">
        <form action="{{route('login')}}" method="post" style="width: 100%;">
            @csrf
            <div class="sighup-box">
                <h1>Sign In</h1>
                <div class="touch-form">
                    <input type="email" class="box-now" placeholder="Email" id="email" name="email"
                        value="{{ old('email') }}">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @enderror

                </div>
                <div class="touch-form">
                    <input type="password" class="box-now" placeholder="Password" id="password" name="password"
                        value="{{ old('password') }}">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @enderror

                </div>
                <div class="agree-box">By continuing, you agree with our <a href="#">privacy policy</a> and <a
                        href="#">terms of use.</a></div>

                <div class="touch-form">
                    <button type="submit" name="en" class="submit-now-button">Sign In</button>
                </div>

            </div>
        </form>
    </section>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
    <script type="text/javascript">
        var $animation_elements = $('.animation-element');
        var $window = $(window);

        function check_if_in_view() {
            var window_height = $window.height();
            var window_top_position = $window.scrollTop();
            var window_bottom_position = (window_top_position + window_height);

            $.each($animation_elements, function () {
                var $element = $(this);
                var element_height = $element.outerHeight();
                var element_top_position = $element.offset().top;
                var element_bottom_position = (element_top_position + element_height);

                //check to see if this current container is within viewport
                if ((element_bottom_position >= window_top_position) &&
                    (element_top_position <= window_bottom_position)) {
                    $element.addClass('in-view');
                } else {
                    $element.removeClass('in-view');
                }
            });
        }

        $window.on('scroll resize', check_if_in_view);
        $window.trigger('scroll');

        function openForm() {
            document.getElementById("myForm").style.display = "block";
        }

        function closeForm() {
            document.getElementById("myForm").style.display = "none";
        }

        function validate() {
            //alert('I am called');
            if (document.myForm.name.value == "") {
                alert("Enter a name");
                document.myForm.name.focus();
                return false;
            }
            if (!/^[a-zA-Z]*$/g.test(document.myForm.name.value)) {
                alert("Invalid characters");
                document.myForm.name.focus();
                return false;
            }
        }
    </script>
</body>

</html>