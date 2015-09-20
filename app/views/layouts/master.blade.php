
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

        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <link rel="stylesheet" href="{{ cdn('assets/css/'.Asset::styles('frontend')) }}">

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
    <body>
       <div class='container-fluid'>

          <div class='row'>

              @yield('content')

          </div>

      </div> 

	</body>
</html>
