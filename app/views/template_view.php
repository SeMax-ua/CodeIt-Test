<!doctype html>
<html lang="en">
	<head>
		<title>Test</title>
		<link href="css/style.css" rel="stylesheet" type="text/css">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta charset="utf-8">
	</head>
	
	<body>
		<div class="main">
		<div id="h_nav">
				<ul>
					<li><a href="./main">Main page</a></li>
					<li><a href="./logedin">Press here to go to a page for auth users.</a></li>
					<li><a href="https://github.com/SeMax-ua">GitHub Source code</a></li>
				</ul>
			</div>
			<div class="wrapper">
				<div class="container">
					<?php include 'app/views/'.$content_view; ?>
				</div>
			</div>
		</div>

	<footer>
			<div class="footer_block block_r">
				<h3>Info</h3>
				<ul>
					<li>This is a simple mvc registration/authorization app.</li>
					<li>Source code avialable on gitHub <a href="https://github.com/SeMax-ua">@SeMax_ua</a></u>.</span></li>
				</ul>
			</div>
	</footer>
	</body>
</html>