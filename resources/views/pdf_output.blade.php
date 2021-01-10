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
    	font-size: 12px;
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


@if ($pdf_id == 1 && $event_user_status == 2)
@foreach($user as $user_info)
<center>
	<table >
		<tbody>
			<tr>
				<td style="width: 5%">Name:</td>
				<td><b>{{ $user_info->first_name }} {{ $user_info->last_name }}</b><hr color="black" style="width:350px"></td>
				<td style="width: 5%">Nickname:</td>
				<td><b>{{ $user_info->nick_name }}</b><hr color="black" ></td>
			</tr>
			<tr>
				@foreach($user_info->tbl_address as $address)
				<td style="width: 5%">Address:</td>
				<td style="width: 50%"><b>Brgy. {{ $address->tbl_barangay->barangay_name }} {{ $address->tbl_barangay->tbl_town->town_name }}, Laguna</b><hr color="black" style="width:350px"></td>
				@endforeach
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
	<br><br>
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



{{-- laguna gay queen and laguna lesbian king will fetch here --}}
@if ($pdf_id == 2 && $event_user_status == 2)
@foreach($user as $user_info)

	<table>
		<tbody>
			<tr>
				<td style="width: 5%">Name:</td>
				<td><b>{{ $user_info->first_name }} {{ $user_info->last_name }}</b><hr color="black" style="width:350px"></td>
				<td style="width: 5%">Nickname:</td>
				<td><b>{{ $user_info->nick_name }}</b><hr color="black" ></td>
			</tr>
			<tr>
				@foreach($user_info->tbl_address as $address)
				<td style="width: 5%">Address:</td>
				<td style="width: 50%"><b>Brgy. {{ $address->tbl_barangay->barangay_name }} {{ $address->tbl_barangay->tbl_town->town_name }}, Laguna</b><hr color="black" style="width:350px"></td>
				@endforeach
				<td style="width: 5%">Tel No.:</td>
				<td><b>{{ $user_info->telephone_number }}</b><hr color="black" ></td>
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
	@foreach($registeruser as $registered)
	<center>
	<table >
		<tbody>
			<tr>
				<td style="width: 1%">Citizenship:</td>
				<td style="width: 20%"><b>{{$user_info->citizenship }} </b><hr color="black" style="width:130px"></td>
				<td style="width: 5%">Height:</td>
				<td style="width: 12%"><b>{{$registered->height }} cm </b><hr color="black" style="width:70px"></td>
				<td style="width: 5%">Weight:</td>
				<td style="width: 10%"><b>{{ $registered->weight }} kg</b><hr color="black" style="width:60px"></td>
				<td style="width: 15%">Color of Hair:</td>
				<td ><b>{{ $registered->color_of_hair }}</b><hr color="black" ></td>
			</tr>
		</tbody>
	</table>
	<table>
		<tbody>
			<tr>
				<td style="width: 15%">Color of Eyes:</td>
				<td style="width: 10%"><b>{{ $registered->color_of_eyes }}</b><hr color="black"  style="width:60px"></td>
				<td style="width: 15%">Hobbies/Talent:</td>
				<td style="width: 33%"><b>{{ $registered->special_hobbies }}</b><hr color="black"  style="width:230px"></td>
				<td style="width: 5%">Contact:</td>
				<td ><b>{{ $user_info->contact }}</b><hr color="black"  style="width:105px"></td>
			</tr>
		</tbody>
	</table>
	<table >
		<tbody>
			<tr>
				<td style="width: 5%">Occupation:</td>
				<td style="width: 45%"><b>{{ $user_info->work }}</b><hr color="black"  style="width:100%"></td>
				<td style="width: 5%">Employer:</td>
				<td ><b>{{ $registered->employer }}</b><hr color="black"  style="width:100%"></td>
			</tr>
		</tbody>
	</table>
	<table >
		<tbody>
			<tr>
				<td style="width: 19%">School Attended:</td>
				<td style="width: 45%"><b>{{ $user_info->school }}</b><hr color="black"  style="width:100%"></td>
				<td style="width: 5%">Degree:</td>
				<td ><b>{{ $registered->degree }}</b><hr color="black"  style="width:100%"></td>
			</tr>
		</tbody>
	</table>
	<table >
		<tbody>
			<tr>
				<td style="width: 17%">Father's Name:</td>
				<td style="width: 35%"><b>{{ $registered->father_name }}</b><hr color="black"  style="width:100%"></td>
				<td style="width: 5%">Occupation:</td>
				<td ><b>{{ $registered->father_occupation }}</b><hr color="black"  style="width:100%"></td>
			</tr>
			<tr>
				<td style="width: 17%">Mother's Name:</td>
				<td style="width: 35%"><b>{{ $registered->mother_name }}</b><hr color="black"  style="width:100%"></td>
				<td style="width: 5%">Occupation:</td>
				<td ><b>{{ $registered->mother_occupation }}</b><hr color="black"  style="width:100%"></td>
			</tr>
		</tbody>
	</table>
</center>
	Why Do you wish to join {{ $event_name['name'] }}?
	<table >
		<tbody>
			<tr>
				<td><b style="font-size: 15px;">{{ $registered->wish_to_join }}</b><hr color="black"  style="width:100%"></td>
			</tr>
			<tr>
				<td><hr color="black"  style="width:100%; border: 1px dashed black;"></td>
			</tr>
		</tbody>
	</table>
	<br>
	I HEREWITH ATTEST:
	<br><br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. That I'am of good moral character. <br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. That the above aforementioned information is true and I'am willing to submit satisfactory proof <br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; of my age and residence.
	<br><br>
	I also undestand that I have to pass the screening and meet all the requirements of {{ $event_name['name'] }} before I can qualify as an official candidate.

	@endforeach
	<br><br>
	<table>
	     <tbody>
	          <tr>
	          	<td style="width:50%"> 
	            	<center>
	            		<p style="font-size: 1px;">.</p><hr color="black" style="width:90%">Date
	            	</center>
	            </td>
	            <td style="width:50%"> 
	            	<center>
	            		<b class="sign">{{ $user_info->first_name }} {{ $user_info->last_name }}</b><hr color="black" style="width:90%">Applicant's Signature over Printed Name
	            	</center>
	            </td>
	          </tr>
	      </tbody>
     </table>
     <br>
	
    <b>NOTE:</b> THIS INFORMATION FORM SHOULD BE ACCOMPANIED BY A 5R CLOSE UP AND 5R WHOLE BODY PICTURES AND A COPY OF REQUIRED DOCUMENTS. 	
<br><br><br>

	@foreach($ydahead as $head)
	{{ $head->name }} <br>
   	{{ $head->position }}
 	@endforeach
			
@endforeach
@endif



{{-- bandanilag  will fetch here --}}
@if ($pdf_id == 3 && $event_user_status == 2)
 @foreach($user as $user_info)
 @foreach($registeruser as $registered)
	<center>
		<table >
			<tbody>
				<tr>
					<td style="width: 17%">Name of Group:</td>
					<td ><b>{{ $registered->name_of_group }}</b><hr color="black" ></td>
					<td style="width: 27%"></td>
				</tr>
			</tbody>
		</table>
		@foreach($user_info->tbl_address as $address)
		<table >
			<tbody>
				<tr>
					<td style="width: 18%">Municipality/City:</td>
					<td ><b>{{ $address->tbl_barangay->tbl_town->town_name }}, Laguna</b><hr color="black" ></td>
					<td style="width: 27%"></td>
				</tr>
			</tbody>
		</table>
		@endforeach
		<table >
			<tbody>
				<tr>
					<td style="width: 17%">Contact Person:</td>
					<td ><b>{{ $user_info->first_name }} {{ $user_info->last_name }}</b><hr color="black" ></td>
					<td style="width: 27%"></td>
				</tr>
				<tr>
					<td style="width: 18%">Contact Number:</td>
					<td ><b>{{ $user_info->contact }}</b><hr color="black" ></td>
					<td style="width: 27%"></td>
				</tr>
			</tbody>
		</table>
	</center><br>
	Members:
	<center>
		<table class="table_group">
			<thead>
				<tr>
					<th style="width: 70%" class="table_header"><p>NAME</p></th>
					<th style="" class="table_header"><p>SIGNATURE</p></th>
				</tr>
			</thead>
			<tbody>
				@foreach($registered->tbl_event_member as $member)	
					<tr>
						<td style="width: 70%" class="table_data">{{ $member->member_name }}</td>
						<td class="table_data"></td>
					</tr>
				@endforeach
			</tbody>
		</table>
		<br>
		<hr style="width: 98%">
		<center>
			<b>OFFICIAL CLAIMANT:</b>
		</center>

		<div class="description">
			This is to certify that ______________________________________________________________ is
			the 
			<b style="padding-left:2em;">OFFICIAL</b>
			<b style="padding-left:2em;">CLAIMANT</b>
			<label style="padding-left:3em;">of</label>
			our group ____________________________________.
			We will be  receiving an amount of ______________________ as ____________ place in the {{ $event_name['name'] }} {{ date('Y') }}.

			<br><br>
			<center>
				<hr style="width: 80%"><br>
				<hr style="width: 80%"><br>
				<hr style="width: 80%"><br>
				<hr style="width: 80%"><br>
			</center>

		</div>
	</center>
	<br><br>

	@foreach($ydahead as $head)
	{{ $head->name }} <br>
   	{{ $head->position }}
 	@endforeach

 @endforeach
 @endforeach
@endif


{{-- dance revolution  will fetch here --}}
@if ($pdf_id == 4 && $event_user_status == 2)
 @foreach($user as $user_info)
 @foreach($registeruser as $registered)
	<center>
		<table >
			<tbody>
				<tr>
					<td style="width: 17%">Name of Group:</td>
					<td ><b>{{ $registered->name_of_group }}</b><hr color="black" ></td>
					<td style="width: 27%"></td>
				</tr>
			</tbody>
		</table>
		@foreach($user_info->tbl_address as $address)
		<table >
			<tbody>
				<tr>
					<td style="width: 18%">Municipality/City:</td>
					<td ><b>{{ $address->tbl_barangay->tbl_town->town_name }}, Laguna</b><hr color="black" ></td>
					<td style="width: 27%"></td>
				</tr>
			</tbody>
		</table>
		@endforeach
		<table >
			<tbody>
				<tr>
					<td style="width: 17%">Contact Person:</td>
					<td ><b>{{ $user_info->first_name }} {{ $user_info->last_name }}</b><hr color="black" ></td>
					<td style="width: 27%"></td>
				</tr>
				<tr>
					<td style="width: 18%">Contact Number:</td>
					<td ><b>{{ $user_info->contact }}</b><hr color="black" ></td>
					<td style="width: 27%"></td>
				</tr>
			</tbody>
		</table>
	</center><br>
	Members:
	<center>
		<table class="table_group1">
			<thead>
				<tr>
					<th style="width: 40%" class="table_header1"><p>NAME</p></th>
					<th style="" class="table_header1"><p>SIGNATURE</p></th>
					<th style="width: 40%" class="table_header1"><p>NAME</p></th>
					<th style="" class="table_header1"><p>SIGNATURE</p></th>
				</tr>
			</thead>																		 
			<tbody>
				<?php $count = ceil(count($registered->tbl_event_member) / 2); $index = 0; ?> 
				@for( $i = 0; $i < $count; $i++ )	
					<tr>
						@for( $x = 0; $x < 2; $x++ )

							@if ($index == count($registered->tbl_event_member))
								<td style="width: 40%" class="table_data1"></td>
								<td style="width: 18%" class="table_data1"></td>
								@break
							@endif

							<td style="width: 40%" class="table_data1">{{ $registered->tbl_event_member[$index]->member_name }}</td>
							<td style="width: 18%" class="table_data1"></td>

							<?php $index++; ?>

						@endfor
					</tr>
				@endfor
			</tbody>
		</table>
		<hr style="width: 98%">
		<center>
			<br>
			<b>WAIVER:</b>
		</center>

		<div class="description">
			This is to attest and certify that the organizers are not LIABLE to any untoward
			incidents that might happen during the {{ $event_name['name'] }} audition and finals {{ date('Y') }}.
		</div>
		<br>
			<table>
				<tbody style="font-size: 13px; padding: 1px;">
				<?php $count = ceil(count($registered->tbl_event_member) / 2); $index = 0; ?> 
				@for( $i = 0; $i < $count; $i++ )	
					<tr>
						@for( $x = 0; $x < 2; $x++ )

							@if ($index == count($registered->tbl_event_member))
								<td style="width: 18%; padding: -5px;"><p style="font-size: 1px">.</p><hr style="width: 90%;"></td>
								@break
							@endif
							<td style="width: 40%; padding: -5px;" ><center>{{ $registered->tbl_event_member[$index]->member_name }}</center> <hr style="width: 90%;"></td>
							<?php $index++; ?>

						@endfor
					</tr>
				@endfor
			</tbody>
			</table>
	</center>
	<br>
	Date:<br>
	Received by : _____________
	<div style="text-align: right;">

		@foreach($ydahead as $head)
		{{ $head->name }} <br>
	   	{{ $head->position }}
 		@endforeach
 		
	</div>
	
 @endforeach
 @endforeach
@endif


</body>
</html>
