@include('layouts.headLogin')

<div class="login">
        <div class="container">
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="header">
                    <h2>Sign In</h2>
                </div>
                <div class="social">
                    <i class="fa-brands fa-facebook"></i>
                    <i class="fa-brands fa-google-plus-g"></i>
                    <i class="fa-brands fa-instagram"></i>
                </div>
                <div class="login">
        <div class="container">
            <form action="{{ route('login') }}" method="post">
                <div class="header">
                    <h2>{{ __('Sign in') }}</h2>
                </div>
                <div class="social">
                    <i class="fa-brands fa-facebook-f"></i>
                    <i class="fa-brands fa-google-plus-g"></i>
                    <i class="fa-brands fa-instagram"></i>
                </div>
                <div class="email">
                <input type="email" class="input" id="email" name="email" :value="old('email')" placeholder="Email"  autocomplete="username"  autofocus>
                </div>
                <div class="usemail"></div>
                <div class="password">
                    <input type="password" class="input" id="password" name="password"
                             autocomplete="current-password" placeholder="password" >
                </div>
                <div class="uspass"></div>
                <!-- Remember Me -->
        <div class="block mt-2 ms-2">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span style="color:#fac031">{{ __('Remember me') }}</span>
            </label>
        </div>
                <div class="forgot">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>
                    @endif
                </div>
                <div class="b">
                    <input type="submit" id="submit" value="{{ __('Log in') }}">
                </div>
            </form>
        </div>
    </div>
    @include('layouts.scriptlogin')
   <script>
     $(document).ready(function (){
        $('form'). submit(function (ev){
           $('.input').each(function (){
              if($(this).val() == ''){
                 $(this).css({'border-bottom':'1px solid red'});
                 ev.preventDefault();
              }else{
                $(this).css({'border-bottom':'1px solid #eee'});
              }
           });
        });
        $('form').submit(function(event){
            var email = $('#email').val();
            var password = $('#password').val();
            if(email == ''){
                $('.usemail').addClass('error')
                              .html('Email is required');
                event.preventDefault();
                
            }else{
                $('.usemail').hide();

            }
            if(password == ''){
                $('.uspass').addClass('error')
                            .html('password is required');
                event.preventDefault();
            }
        })
     });
   </script>
    
</body>
</html>