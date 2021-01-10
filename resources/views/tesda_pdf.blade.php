<!DOCTYPE html>
<html>
<head>
    <title>PDF</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">

 {{--  <link rel="stylesheet" href="{{public_path('/pdfstyle/bootstrap.min.css')}}"> --}}
{{--   <link rel="stylesheet" href="vendor/bootstrap/dist/css/bootstrap.css" /> --}}


<style type="text/css">
	body{
            font-family: calibri;           
        }
    .table_on_top{
     	margin-top: -15px;
    }
    
    .text-right{
    	text-align: right;
    }

    table{
    	width: 100%;
    }
    hr{
    	border: 1px solid black;
    }
    .head_des{
    	font-size: 14px;
    }
    .title{
    	font-size: 13px;
    }
    .datas{
    	font-size: 13px;

    }
    .data{
    	font-size: 14px;
    }

 	.picture{
 		position: absolute;
 		right: 20px;
 		margin-top: -35px
 	}
 	.text-center{
 		text-align: center;
 	}
 	.educational, .td, .th {
 	  border-collapse: collapse;
	  border: 2px solid black;
	}
	.sign{
  		text-transform: uppercase;
  	}
  	.gov{
  		position: absolute;
  		margin-top: -115px
  	}
  	.footer{
  		position: absolute;
  	}
  	.form{
  		position: absolute;
  		right: 0px;
  		margin-top: 55px;
  	}
</style>
</head>
<body>

	<table  class="table_on_top">
		<tbody>
			<tr>
				<td style="width: 40%;">
					<img src="{{ public_path().'/images/tesda.png' }}" class="header" alt="logo" height="80px" width="80px">
				    <img src="{{ public_path().'/images/lagunalogo.png' }}" class="header" alt="logo" height="80px" width="80px">
				    <img src="{{ public_path().'/images/yda.png' }}" class="header" alt="logo" height="80px" width="80px">
				    <img src="{{ public_path().'/images/misl.png' }}" class="header" alt="logo" height="80px" width="70px">
			    </td>
			    <td >
				    <div class="text-right head_des">
						Province of Laguna
		             </div>
		             <div class="text-right head_des">
		              <b> YOUTH DEVELOPMENT AFFAIRS</b>
		             </div>
		             <div class="text-right head_des">
		               Provincial Capitol Compound, Santa Cruz, Laguna
		             </div>
		             <div class="text-right head_des">
		               Tel.: (049) 501 - 1810 / FB Page: <a href="https://www.facebook.com/ShoutboxxLaguna/">shoutboxxlaguna</a>
		             </div>
		             <div class="text-right head_des">
		              <b> INFORMATION TECHNOLOGY TRAINING PROGRAM</b>
		             </div> 
			    </td>
			</tr>
		</tbody>
	</table>    
	@foreach($user as $users)
		@foreach($registered_tesda as $tesda)
			<div class="title">
			<b>PERSONAL INFORMATION <br>
			PERSONAL NA TALA</b>
			</div>
			<img class="picture" src="{{ public_path().'/tesda_pictures/' }}{{ $tesda->user_picture }}"  name="pic" id="pic" height=188px width=188px>
			<table>
				<tbody >
					<tr >
		              <td class="datas" style="width: 15%">LAST NAME <br> APELYIDO</td>
		              <td style="width: 52%"><strong class="data">{{ $users->last_name }}</strong><hr></td>
		              <td rowspan="3"></td>
		            </tr>
		            <tr>
		              <td class="datas" style="width: 15%">FIRST NAME <br> PANAGALAN</td>
		              <td style="width: 52%"><strong class="data">{{ $users->first_name }}</strong><hr></td>
		            </tr>
		            <tr >
		              <td class="datas" style="width: 15%">MIDDLE NAME <br>GITNANG PANAGALAN</td>
		              <td style="width: 52%"><strong class="data">{{ $users->middle_name }}</strong><hr></td>
		            </tr>
				</tbody>
			</table>
			<br>
			<table >
				<tbody>
					<tr>
		              <td class="datas" style="width:16%">RESEDENTIAL ADDRESS <br> LUGAR TIRAHAN</td>
		              @foreach($users->tbl_address as $address)
		              <td style="width: 43%"><strong class="data">Brgy. {{ $address->tbl_barangay->barangay_name }} {{ $address->tbl_barangay->tbl_town->town_name }}, Laguna</strong><hr></td>
		              @endforeach

		              <td class="datas text-right" style="width:5%">SEX <br> KASARIAN</td>

		              @if($users->gender == 'Male')
		              	<td><img src="{{ public_path().'/images/checked.png' }}"></td>
		              	@else
		              	<td><img src="{{ public_path().'/images/blank.png' }}"></td>
		              @endif
		              <td class="datas text-right" style="width: 5%">MALE <br> LALAKI</td>

		              @if($users->gender == 'Female')
		              	<td><img src="{{ public_path().'/images/checked.png' }}"></td>
		              	@else
		              	<td><img src="{{ public_path().'/images/blank.png' }}"></td>
		              @endif
		              <td class="datas text-right" style="width: 5%">FEMALE <br> BABAE</td>
		            </tr>
				</tbody>
			</table>

			<table>
				<tbody>
					<tr>
					  <td class="datas" style="width:20%">DATE OF BIRTH <br> ARAW NG KAPANGANAKAN</td>
					  <td style="width: 30%"><strong class="data">{{ \Carbon\Carbon::parse($users->birthdate)->format('m / d / y')}}</strong><hr></td>
					   <td class="datas" style="width:20%">PLACE OF BIRTH <br> LUGAR NG KAPANGANAKAN</td>
					   <td style="width: 52%"><strong class="data">{{ $users->birthplace }}</strong><hr></td>
					</tr>
				</tbody>
			</table>
			<table>
				<tbody>
					<tr>
					  <td class="datas" style="width:33%">CONTACT NUMBER<br> NUMERONG TATAWAGAN</td>
					  <td style="width: 30%"><strong class="data">{{ $users->contact }}</strong><hr></td>
					   <td class="datas" style="width:23%">CIVIL STATUS <br> KATAYUAN SIBIL</td>
					   <td style="width: 52%"><strong class="data">{{ $users->civil_status }}</strong><hr></td>
					</tr>
				</tbody>
			</table>

			<br>
			<div class="title">
			<b>EDUCATIONAL BACKGROUND <br>
			TALA SA PAG AARAL</b>
			</div>

			<table class="educational">
				<thead>
					<tr class="text-center datas">
						<th class="th" style="width: 15%">LEVEL <br> ANTAS</th>
						<th class="th" style="width: 35%">NAME OF SCHOOL <br> PANGALAN NG PAARALAN</th>
						<th class="th" style="width: 15%">YEAR GRADUATED <br> <small style="font-size: 10px;">TAONG NAKAPAGTAPOS</small></th>
						<th class="th" style="width: 35%">ACADEMIC HONOR RECEIVED <br> MGA KARANGALANG NAKAMIT</th>
					</tr>
				</thead>
				<tbody>
					<tr class="text-center">
						<td class="datas td">ELEMENTARY ELEMENTARYA</td>
						<td class="td datas"><strong>{{ $tesda->elementary_name }}</strong></td>
						<td class="td datas"><strong>{{ $tesda->elementary_year }}</strong></td>
						<td class="td datas"><strong>{{ $tesda->elementary_academic }}</strong></td>
					</tr>
					<tr class="text-center">
						<td class="datas td">SECONDARY SEKONDARYA</td>
						<td class="td datas"><strong>{{ $tesda->secondary_name }}</strong></td>
						<td class="td datas"><strong>{{ $tesda->secondary_year }}</strong></td>
						<td class="td datas"><strong>{{ $tesda->secondary_academic }}</strong></td>
					</tr>
					<tr class="text-center">
						<td class="datas td">VOCATIONAL MAIKLING KURSO</td>
						<td class="td datas"><strong>{{ $tesda->vocational_name }}</strong></td>
						<td class="td datas"><strong>{{ $tesda->vocational_year }}</strong></td>
						<td class="td datas"><strong>{{ $tesda->vocational_academic }}</strong></td>
					</tr>
					<tr class="text-center">
						<td class="datas td">COLLEGE KOLEHIYO</td>
						<td class="td datas"><strong>{{ $tesda->college_name }}</strong></td>
						<td class="td datas"><strong>{{ $tesda->college_year }}</strong></td>
						<td class="td datas"><strong>{{ $tesda->college_academic }}</strong></td>
					</tr>
				</tbody>
			</table>
			<table>
				<tr>
					<td style="width: 55%" class="datas">NAME OF PERSON TO BE CONTACT INCASE OF EMERGENCY</td>
					<td style="width: 45%"><strong class="data">{{ $tesda->contact_person }}</strong><hr></td>
				</tr>
			</table>
			<table>
				<tr>
					<td style="width: 20%" class="datas">HIS/HER ADDRESS</td>
					<td style="width: 80%"><strong class="data">{{ $tesda->contact_address }}</strong><hr></td>
				</tr>
			</table>

			 <p class="datas">1. ARE YOU A STUDENT OR AN OUT-OF-SCHOOL YOUTH? <br>IKAW BA AY ISANG ESTUDYANTE O ISANG HINDI NA NAG AARAL NA KABATAAN?</p>
			 <table>
			 	<tr>
			 		@if($tesda->student == 'Student')
			 			<td class="text-right"><img src="{{ public_path().'/images/checked.png' }}"></td>
		              @else
		              	<td class="text-right"><img src="{{ public_path().'/images/blank.png' }}"></td>
			 		@endif
			 		<td class="datas">STUDENT <br>ESTUDYANTE</td>
			 		@if($tesda->student == 'Out of School')
			 			<td class="text-right"><img src="{{ public_path().'/images/checked.png' }}"></td>
		              @else
		              	<td class="text-right"><img src="{{ public_path().'/images/blank.png' }}"></td>
			 		@endif
			 		<td class="datas">OUT OF SCHOOL <br>HINDI NAG AARAL</td>
			 	</tr>
			 </table>

			 <div class="title">
			<b>COMPUTER BACKGROUND <br>
			KASANAYAN SA COMPUTER</b>
			</div>
			<p class="datas">5 Being the highest and 1 being the lowest / 5 pinaka mataas at 1 pinaka mababa</p>
			<table>
				<tr>
					<td style="width: 25%"></td>
					<td>
						<img src="{{ public_path().'/images/1.png' }}">&nbsp;&nbsp;
						<img src="{{ public_path().'/images/2.png' }}">&nbsp;&nbsp;
						<img src="{{ public_path().'/images/3.png' }}">&nbsp;&nbsp;
						<img src="{{ public_path().'/images/4.png' }}">&nbsp;&nbsp;
						<img src="{{ public_path().'/images/5.png' }}">
					</td>
				</tr>
				<tr>
					<td class="datas">Microsoft Office</td>
					<td>
						@for($i = 1; $i < 6; $i++)
							@if ($tesda->microsoft_office == $i)
								<img src="{{ public_path().'/images/shade.jpg' }}">&nbsp;&nbsp;
							@else
								<img src="{{ public_path().'/images/0.png' }}">&nbsp;&nbsp;
							@endif 
						@endfor
					</td>
				</tr>
				<tr>
					<td class="datas">Microsoft Excel</td>
					<td>
						@for($i = 1; $i < 6; $i++)
							@if ($tesda->microsoft_excel == $i)
								<img src="{{ public_path().'/images/shade.jpg' }}">&nbsp;&nbsp;
							@else
								<img src="{{ public_path().'/images/0.png' }}">&nbsp;&nbsp;
							@endif
						@endfor
					</td>
				</tr>
				<tr>
					<td class="datas">Powerpoint Presentation</td>
					<td>
						@for($i = 1; $i < 6; $i++)
							@if ($tesda->powerpoint == $i)
								<img src="{{ public_path().'/images/shade.jpg' }}">&nbsp;&nbsp;
							@else
								<img src="{{ public_path().'/images/0.png' }}">&nbsp;&nbsp;
							@endif
						@endfor
					</td>
				</tr>
				<tr>
					<td class="datas">Adobe Photoshop</td>
					<td>
						@for($i = 1; $i < 6; $i++)
							@if ($tesda->adobe_photoshop == $i)
								<img src="{{ public_path().'/images/shade.jpg' }}">&nbsp;&nbsp;
							@else
								<img src="{{ public_path().'/images/0.png' }}">&nbsp;&nbsp;
							@endif
						@endfor
					</td>
				</tr>
				<tr>
					<td class="datas">Adobe Premiere</td>
					<td>
						@for($i = 1; $i < 6; $i++)
							@if ($tesda->adobe_premiere == $i)
								<img src="{{ public_path().'/images/shade.jpg' }}">&nbsp;&nbsp;
							@else
								<img src="{{ public_path().'/images/0.png' }}">&nbsp;&nbsp;
							@endif
						@endfor
					</td>
				</tr>
				<tr>
					<td></td>
					<td class="data">others please specify : <strong>{{ $tesda->other_specify}}</strong><hr></td>
				</tr>
			</table><br>
			<table >
				<tr>
					<td style="width: 50%"></td>
					<td class="datas" style="width: 50%">
						<center><b class="sign">{{ $users->first_name }} {{ $users->last_name }}</b></center>
						<hr><center>SIGNATURE OVER PRINTED <br> LAGDA SA IBABAW NG BUONG PANGALAN</center>
					</td>
				</tr>
			</table>
			<img class="gov" src="{{ public_path().'/images/gov.png' }}">
			<img class="footer" style="width: 100%" src="{{ public_path().'/images/footer.png' }}">
			<p class="data text-right form">Form No. -YDA-002-0</p>

	   @endforeach
   @endforeach

</body>
</html>
