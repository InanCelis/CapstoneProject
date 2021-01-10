<!DOCTYPE html>
<html>
<head>
    <title>PDF</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">

 {{--  <link rel="stylesheet" href="{{public_path('/pdfstyle/bootstrap.min.css')}}"> --}}
  
<style type="text/css">
	body{
            font-family: "consolas", Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif;            
        }
    .header{
        margin-top: -45px; 
        margin-left: -45px;
    }

    .entry{
    	font-size: 12
    }
    table{
    	width: 100%;
    }
  	.sign{
  		text-transform: uppercase;
  	}

  	.table_group {
 	 border-collapse: collapse;

	}

	.table_group, .table_header, .table_data {
	  border: 1px solid black;
	  padding: 1px;
	  font-size: 14px;
	  font-weight: regular;
	  text-align: center;
	}
	.table_data{
		padding: 10px;
		font-weight: bold;
	}

	.table_group1 {
 	 border-collapse: collapse;

	}

	.table_group1, .table_header1, .table_data1 {
	  border: 1px solid black;
	  padding: 1px;
	  font-size: 13px;
	  font-weight: regular;
	  text-align: center;
	}
	.table_data1{
		padding: 4px;
		font-weight: bold;
	}
	.table_header1{
		padding: -9px;
	}
	.description{
		text-align: justify;
		text-align-last: justify;
		text-justify: inter-character;
	}
	
</style>
</head>
<body>
<header>
	<img src="{{ public_path().'/ydapic/' }}{{ $dataImage}}" class="header" alt="logo" height="185px" width="815px"><br>
</header>

<div style="margin-top: 500px">
@foreach($ydahead as $head)
	{{ $head->name }} <br>
   	{{ $head->position }}
@endforeach
</div>


</body>
</html>
