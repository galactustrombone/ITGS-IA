<!DOCTYPE HTML>
<HTML>
	<head>
		<?php include('navbar.php'); ?>
		<link rel="stylesheet" type="text/css" href="defaultstylesheet.css">
	</head>
	<body>
		<div id="content">
			<p id="p">0</p>
			<button onclick="iterate()"></button>
			<script type="text/javascript">
				var i = 0;
				function iterate() {
					i ++;
					document.getElementById("p").innerHTML = i;
				}
			</script>
		</div>
	</body>
</HTML>