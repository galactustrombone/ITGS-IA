<!DOCTYPE HTML>
<HTML>
	<head>
		<style type="text/css">
			#navbar {
				background-color: #FF8888;
				color: white;
				font-size: 14px;
				text-transform: uppercase;
				font-family: "Segoe UI", "Arial", sans-serif;
				font-weight: bold;
				padding: 8px 8px;
			}
			.navbar {
				vertical-align: middle;
			}
			h1.navbar {
				display: inline;
				padding: 14px 25px;
			}
			a.navbar {
				border-radius: 10px;
				display: inline-block;
				color: white;
				text-decoration: none;
				text-align: center;
				padding: 14px 25px;
			}
			a.navbar:link, a.navbar:visited {
				background-color: #AA3333;
			}

			a.navbar:hover {
				background-color: #880000;
			}

			a.navbar:active {
				background-color: #660000;
			}
			#logo {
				height: 50px;
				padding: 8px 8px;
			}
		</style>
	</head>
	<body>
		<nav id="navbar">
			<img id="logo" class="navbar" src="img/logo.svg"> <!-- onerror="this.src='logo.png'" -->
			<h1 class="navbar">Sheet Music</h1>
			<a class="navbar" href="pieces.php">Pieces</a>
			<a class="navbar" href="addpiece.php">Add a Piece</a>
			<a class="navbar" href="allparts.php">All Parts</a>
			<a class="navbar" href="missingparts.php">Missing Parts</a>
			<a class="navbar" href="thisweek.php">This Week</a>
			<a class="navbar" href="about.php">About</a>
		</nav>
	</body>
</HTML>