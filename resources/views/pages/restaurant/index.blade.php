<!DOCTYPE html>
<html lang="en">
  	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="images/icon.ico">
		<link href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" rel="stylesheet">
		<title>Admin</title>
		@include('layout.section-head')
	
	</head>

  	  	<body class="nav-md">
		<div class="container body">
			<div class="main_container">
				
				<!-- Left Menu -->
				@include('layout.left_menu')
				<!-- /Left Menu -->

				<!-- top navigation -->
				@include('layout.header')
				<!-- /top navigation -->

				<!-- page content -->
				@include('pages.'.$folder.'.content-'.$content)
				<!-- /page content -->

				<!-- footer content -->
				@include('layout.footer')
				<!-- /footer content -->
				
			</div>
		</div>

		@include('layout.section-footer')
	
  	</body>
</html>
