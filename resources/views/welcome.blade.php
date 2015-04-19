<html>
	<head>
		<title>Laravel</title>
		
		<link href='//fonts.googleapis.com/css?family=OpenSans:100' rel='stylesheet' type='text/css'>

		<style>
			body {
				margin: 0;
				padding: 0;
				width: 100%;
				height: 100%;
				display: table;
				font-weight: 100;
				font-family: Open Sans;
        background: #F2F7F9;
			}

			.container {
				text-align: center;
				display: table-cell;
				vertical-align: middle;
			}

			.content {
				text-align: center;
				display: inline-block;
			}

			.title {
				font-size: 76px;
        color:#dc4c4c;
        text-shadow:1px 1px #FFF;
			}

			.quote {
        margin-top: 30px;
				font-size: 24px;
        color:#3e474f;
        text-shadow:1px 1px #FFF;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="content">
				<div class="title">Welcome to Aecore!</div>
				<div class="quote">{{ Inspiring::quote() }}</div>
        <p><a href="/login" title="Log In to Aecore.">Log in to alpha</a></p>
			</div>
		</div>
	</body>
</html>
