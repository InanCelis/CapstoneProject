<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Service Unavailable</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet"> 

	<!-- Custom stlylesheet -->


	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
<style type="text/css">
	* {
	 -webkit-box-sizing: border-box;
	 box-sizing: border-box;
	}

	body {
	  padding: 0;
	  margin: 0;

	}

	#notfound {
	  position: relative;
	  height: 100vh;
	  background-color: white;
	}

	#notfound .notfound {
	  position: absolute;
	  left: 50%;
	  top: 50%;
	  -webkit-transform: translate(-50%, -50%);
	      -ms-transform: translate(-50%, -50%);
	          transform: translate(-50%, -50%);
	}

	.notfound {
	  max-width: 460px;
	  width: 100%;
	  text-align: center;
	  line-height: 1.4;
	}

	.notfound .notfound-404 {
	  height: 158px;
	  line-height: 153px;
	}

	.notfound .notfound-404 h1 {
	  font-family: 'Josefin Sans', sans-serif;
	  color: lightgray;
	  font-size: 220px;
	  letter-spacing: 10px;
	  margin: 0px;
	  font-weight: 700;
	  text-shadow: 5px 5px 0px black, -5px -2px 0px black;
	}

	.notfound .notfound-404 h1>span {
	  text-shadow: 2px 2px 0px black, -2px -2px 0px #ffab00, 0px 0px 8px #ff8700;
	}

	.notfound p {
	  font-family: 'Josefin Sans', sans-serif;
	  color: black;
	  font-size: 17px;
	  font-weight: 400;
	  margin-top: 0px;
	  margin-bottom: 15px;
	}

	.notfound a {
	  font-family: 'Josefin Sans', sans-serif;
	  font-size: 14px;
	  text-decoration: none;
	  text-transform: uppercase;
	  background: transparent;
	  color: #c9c9c9;
	  border: 2px solid #c9c9c9;
	  display: inline-block;
	  padding: 10px 25px;
	  font-weight: 700;
	  -webkit-transition: 0.2s all;
	  transition: 0.2s all;
	}

.notfound a:hover {
  color: #ffab00;
  border-color: #ffab00;
}	
	@media only screen and (max-width: 480px) {
	  .notfound .notfound-404 {
	    height: 122px;
	    line-height: 122px;
	  }

	  .notfound .notfound-404 h1 {
	      font-size: 100px;
	  }
	}
	.image{
		border: 5px solid blue;
		border-radius: 50%;
		box-shadow: 2px 2px -2px black, 2px 2px 0px gray, 0px 0px 8px black;
	}
	.oops{
		color:blue;
		font-size:35px;
		text-shadow: 2px 2px 2px black, 2px 2px 0px black, 0px 8px 8px black;
	}
</style>
</head>

<body>

	<div id="notfound">
		<div class="notfound">
			<div class="notfound-404">
				<h1>5<span><img src="{{ asset('/pageicon/yda.png') }}" height="120px" width="120px" class="image"></span>3</h1>
			</div>
			<span class="oops">Service Unavailable</span><p>Looks like we're having some server issues</p>
			<a href="/">Back to main</a>
			
		</div>
	</div>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
