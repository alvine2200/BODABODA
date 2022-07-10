
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="Agents Portal">
		<meta name="keywords" content="agents portal,admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
        <meta name="author" content="Sawasawa Africa LTD">
        <meta name="robots" content="noindex, nofollow">
        <title>Login - Agents</title>

		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('light-theme/img/favicon.png') }}">

		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('light-theme/css/bootstrap.min.css') }}">

		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{ asset('light-theme/css/font-awesome.min.css') }}">

		<!-- Main CSS -->
        <link rel="stylesheet" href="{{ asset('light-theme/css/style.css') }}">

    </head>
    <body class="account-page">

		<!-- Main Wrapper -->
        <div class="main-wrapper">

			<div class="account-content">
				{{-- <a href="job-list.html" class="btn btn-primary apply-btn">Apply Job</a> --}}
				<div class="container">

					<!-- Account Logo -->

					@yield('content')
                    @yield('custom_js')

                </div>
			</div>
        </div>
		<!-- /Main Wrapper -->

		<!-- jQuery -->
        <script src="{{ asset('light-theme/js/jquery-3.5.1.min.js') }}"></script>

		<!-- Bootstrap Core JS -->
        <script src="{{ asset('light-theme/js/popper.min.js') }}"></script>
        <script src="{{ asset('light-theme/js/bootstrap.min.js') }}"></script>

		<!-- Custom JS -->
		<script src="{{ asset('light-theme/js/app.js') }}"></script>

    </body>
</html>
