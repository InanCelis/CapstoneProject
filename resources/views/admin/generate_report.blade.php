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
    .event_name
    {
    	text-transform: uppercase;
    }

    table, td, th {
	  border: 1px solid black;
	}

	table {
	  border-collapse: collapse;
	  width: 100%;
	}

	th {
	  height: 30px;
	  text-align: center
	}
	td
	{
		padding: 5px;
	}
    
</style>
</head>
<body>
<header>
	<img src="{{ public_path().'/ydapic/' }}{{ $dataImage}}" class="header" alt="logo" height="185px" width="815px"><br>
</header>

{{-- for audition --}}
@if($pdf_id == 1)
	<center>
		<p class="entry">LIST OF APPLICANT FOR AUDITION</p>
		<h2 class="event_name"><b>{{ $event_name['name'] }}</b></h2>
	</center>

	<table>
		<tr>
			<th>Name</th>
			<th>Address</th>
			<th>Contact</th>
		</tr>
		@foreach($event_registered as $event)
			<tr>
				<td>{{ $event->user->first_name }} {{ $event->user->last_name }}</td>
				@foreach($event->user->tbl_address as $address)
				
				<td>
					Brgy. {{ $address->tbl_barangay->barangay_name }} {{ $address->tbl_barangay->tbl_town->town_name }}, Laguna
				</td>
				@endforeach

				<td style="text-align: center;">{{ $event->user->contact }}</td>
			</tr>
		@endforeach
	</table>
@endif


@if($pdf_id == 2)
	<center>
		<p class="entry">LIST OF CONTESTANT</p>
		<h2 class="event_name"><b>{{ $event_name['name'] }}</b></h2>
	</center>

	<table>
		<tr>
			<th>Name</th>
			<th>Address</th>
			<th>Contact</th>
		</tr>
		@foreach($event_registered as $event)
			<tr>
				<td>{{ $event->user->first_name }} {{ $event->user->last_name }}</td>
				@foreach($event->user->tbl_address as $address)
				
				<td>
					Brgy. {{ $address->tbl_barangay->barangay_name }} {{ $address->tbl_barangay->tbl_town->town_name }}, Laguna
				</td>
				@endforeach

				<td style="text-align: center;">{{ $event->user->contact }}</td>
			</tr>
		@endforeach
	</table>
@endif

@if($pdf_id == 3)
	<center>
		<p class="entry">LIST OF APPLICANT FOR AUDITION</p>
		<h2 class="event_name"><b>{{ $event_name['name'] }}</b></h2>
	</center>

	<table>
		<tr>
			<th>Name of Group</th>
			<th>Municipality</th>
			<th>Contact</th>
		</tr>
		@foreach($event_registered as $event)
			<tr>
				<td>{{ $event->user->name_of_group }}</td>
				@foreach($event->user->tbl_address as $address)
				
				<td>
				 {{ $address->tbl_barangay->tbl_town->town_name }}
				</td>
				@endforeach

				<td style="text-align: center;">{{ $event->user->contact }}</td>
			</tr>
		@endforeach
	</table>
@endif


@if($pdf_id == 4)
	<center>
		<p class="entry">LIST OF CONTESTANT</p>
		<h2 class="event_name"><b>{{ $event_name['name'] }}</b></h2>
	</center>

	<table>
		<tr>
			<th>Name of Group</th>
			<th>Municipality</th>
			<th>Contact</th>
		</tr>
		@foreach($event_registered as $event)
			<tr>
				<td>{{ $event->user->name_of_group }}</td>
				@foreach($event->user->tbl_address as $address)
				
				<td>
				 {{ $address->tbl_barangay->tbl_town->town_name }}
				</td>
				@endforeach

				<td style="text-align: center;">{{ $event->user->contact }}</td>
			</tr>
		@endforeach
	</table>
@endif



</body>
</html>
