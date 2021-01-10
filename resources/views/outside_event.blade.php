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

<center>
	<p class="entry">ENTRY APPLICATION FORM</p>
	<h2><b>{{ $event_name['name'] }}</b></h2>
</center> <br>


@if ($event_id == 2 )
@foreach($colorun as $user_info)
<center>
	<table>
		<tbody>
			<tr>
				<td style="width: 5%">Name:</td>
				<td style="width: 50%"><b>{{ $user_info->first_name }} {{ $user_info->last_name }}</b><hr color="black" style="width:350px"></td>
				<td style="width: 5%">Contact:</td>
				<td><b>{{ $user_info->contact }}</b><hr color="black" ></td>
			</tr>
			
		</tbody>
	</table>
	<table>
		<tbody>
			<tr>
				<td style="width: 5%">Address:</td>
				<td style="width: 50%"><b>{{ $user_info->barangay }} {{ $user_info->municipality }}, {{ $user_info->province }}</b><hr color="black" style="width:100%"  ></td>
			</tr>
		</tbody>
	</table>
	<table>
		<tbody>
			<tr>
				<td style="width: 5%">Birthday:</td>
				<td ><b>{{ date('M d,Y', strtotime($user_info->birthdate)) }} </b><hr color="black" style="width:130px"></td>
				<td style="width: 5%">Birthplace:</td>
				<td colspan="3" ><b>{{ $user_info->birthplace }} </b><hr color="black" style="width:270px"></td>
				<td style="width: 5%">Age:</td>
				<td><b>{{ \Carbon\Carbon::parse($user_info->birthdate)->age}} years old</b><hr color="black" ></td>
			</tr>
		</tbody>
	</table>
	<hr style="width: 100%;">
	<center><h4>WAIVER:</h4></center>
	<p>This is to attest and certify that the organizers are not LIABLE to any untoward incidents that might happen during the ANILAG COLOR RUN {{ $year }}.</p>
	<br>

	<table>
	     <tbody>
	          <tr>
	            <td> 
	            	<center>
	            		<b class="sign">{{ $user_info->first_name }} {{ $user_info->last_name }}</b><hr color="black" style="width:500px">Signature over Printed Name
	            	</center>
	            </td>
	          </tr>
	      </tbody>
     </table>
</center>
<br><br><br>
@foreach($ydahead as $head)
	{{ $head->name }} <br>
   	{{ $head->position }}
 @endforeach
			
@endforeach
@endif



@if ($event_id == 3 )
@foreach($cosplay as $user_info)
<center>
	<table>
		<tbody>
			<tr>
				<td style="width: 5%">Name:</td>
				<td style="width: 50%"><b>{{ $user_info->first_name }} {{ $user_info->last_name }}</b><hr color="black" style="width:350px"></td>
				<td style="width: 5%">Nickname:</td>
				<td><b>{{ $user_info->nick_name }}</b><hr color="black" ></td>
			</tr>
			<tr>
				<td style="width: 5%">Address:</td>
				<td style="width: 50%"><b>{{ $user_info->barangay }} {{ $user_info->municipality }}, {{ $user_info->province }}</b><hr color="black" style="width:100%"  ></td>
				<td style="width: 5%">Contact:</td>
				<td><b>{{ $user_info->contact }}</b><hr color="black" ></td>
			</tr>
		</tbody>
	</table>

	<table>
		<tbody>
			<tr>
				<td style="width: 5%">Birthday:</td>
				<td ><b>{{ date('M d,Y', strtotime($user_info->birthdate)) }} </b><hr color="black" style="width:130px"></td>
				<td style="width: 5%">Birthplace:</td>
				<td colspan="3" ><b>{{ $user_info->birthplace }} </b><hr color="black" style="width:270px"></td>
				<td style="width: 5%">Age:</td>
				<td><b>{{ \Carbon\Carbon::parse($user_info->birthdate)->age}} years old</b><hr color="black" ></td>
			</tr>
		</tbody>
	</table>
	<br>
	<table>
	     <tbody>
	          <tr>
	            <td> 
	            	<center>
	            		<b class="sign">{{ $user_info->first_name }} {{ $user_info->last_name }}</b><hr color="black" style="width:500px">Signature over Printed Name
	            	</center>
	            </td>
	          </tr>
	      </tbody>
     </table>
</center>
<br><br><br>
@foreach($ydahead as $head)
	{{ $head->name }} <br>
   	{{ $head->position }}
 @endforeach
			
@endforeach
@endif
</body>
</html>
