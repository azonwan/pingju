
<!DOCTYPE html>
<html lang="zh">
	<head>

		<meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>
			@section('title')
评聚评汇
			@show
		</title>


		<meta name="keywords" content="" />
		<meta name="author" content="" />
		<meta name="description" content="@section('description')  @show" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <link rel="stylesheet" href="{{ cdn('assets/css/'.Asset::styles('frontend')) }}">

        <link rel="shortcut icon" href="{{ cdn('assets/images/big_logo.png') }}"/>

        <script>
            Config = {
                'cdnDomain': '{{ getCdnDomain() }}',
                'user_id': {{ $currentUser ? $currentUser->id : 0 }},
                'routes': {
                    'notificationsCount' : '{{ route('notifications.count') }}',
                    'upload_image' : '{{ route('upload_image') }}'
                },
                'token': '{{ csrf_token() }}',
                'variable': {
                    'follow' : '{{ lang('Follow') }}',
                    'unfollow' : '{{ lang('Unfollow') }}',
                }
            };
        </script>

	    @yield('styles')

	</head>
	<body id="body">

		<div id="wrap">

			@include('layouts.partials.nav')

			<div class="container">

				@include('flash::message')

				@yield('content')

			</div>

		</div>

	  <div id="footer" class="footer">
	    <div class="container small">
	      <p class="pull-left">
	      	<i class="fa fa-heart-o"></i>  <br>
			&nbsp;<i class="fa fa-lightbulb-o"></i> 
	      </p>

	      <p class="pull-right">
	      	<i class="fa fa-cloud"></i> Powered by <!--a href="https://www.linode.com/?r=3cfb2c09c29cf2b6e6c87cc1f71ffdc2f9ea5722" target="_blank">Linode <i class="fa fa-external-link"></i></a-->.
	      </p>
	    </div>
	  </div>

        <script src="{{ cdn('assets/js/'.Asset::scripts('frontend')) }}"></script>

	    @yield('scripts')

        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>
        @if (App::environment() == 'production')
		<!--script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-53903425-1', 'auto');
          ga('send', 'pageview');

        </script-->
        @endif

	</body>
</html>
