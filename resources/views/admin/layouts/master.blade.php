<!DOCTYPE html>
<html>
<head>
	@include('admin.layouts.meta')

	@yield('title')

	@include('admin.layouts.css')
	
	@yield('css')

</head>
<body class="hold-transition {{ config('usersetting.theme-colors') }} fixed sidebar-mini">
	@include('admin.layouts.header')
	@include('admin.layouts.sidebar')

	<div class="wrapper">
		@yield('content')
	</div>

	@include('admin.layouts.footer')

	@include('admin.layouts.control-sidebar')
	
	@include('admin.layouts.scripts')

	@yield('script')

	@include('sweet::alert')
</body>
</html>