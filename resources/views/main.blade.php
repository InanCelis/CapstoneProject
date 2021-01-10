@extends('layouts.app')

@section('content')

  <div class="main-content">
    <!-- Header -->
    <div class="header bg-dark pt-5 pb-3 cover" >
    
      <div class="container ">
        <div class="header-body">
          <div class="row align-items-center">
            <div class="col-md-10">
              <div class="pr-5">
                <h1 class="display-2 text-white font-weight-bold mb-0">Youth Development Affairs Office of Laguna</h1>
                <p class="text-white mt-4 desc">The Youth Development Affairs (YDA), since its establishment in August 1997 has been focusing in youth development and empowerment. Series of youth related activities such as seminars, workshops, and orientation are conducted to achieve the said goal. These activities are focused on leadership, environment as well as cultural issues. Youth dynamics are also encouraged such as tree planting, outreach programs, and youth camps. All of these are in pursuant to the state policy on youth as stated under Section 13 of Article II – “to include into the youth the sense of patriotism and nationalism and encourage their involvement in public and civic affairs.</p>
               
              </div>
            </div>
           
          </div>
        </div>
      </div>
    </div>
    <section id="about" class="py-7 section-nucleo-icons bg-gray overflow-hidden text-white">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-12 text-center">
            <h2 class="display-3">Vision</h2>
            <p >
              Our vision is to lead the province in creating an active, progressive, empowered and participative youth of Laguna ready to take the role of becoming the next generation of patriotic and dedicated leaders contributing to overall nation building.
            </p>
          </div>

          <div class="col-lg-12 text-center">
            <h2 class="display-3">Mission</h2>
            <p >
              The Provincial Youth Development Affairs Office ensures the protection and participation of the youth of Laguna in the formulation of policies and implementation of programs, projects and activities with the support of the local and national government agencies, as well as youth and youth-serving organizations.
            </p>
          </div>
        </div>
      </div>
    </section>
    <section class="py-7">
      <div class="container">
        <div class="row row-grid justify-content-center">
          <div class="col-lg-12 text-center">
            <h2 class="display-3">Our location</h2>
            <div class="text-center">
            	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3346.680823787307!2d121.4146351372383!3d14.276724090021505!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397e30d43c1e179%3A0x9d867ccb23ece786!2sLaguna%20Provincial%20Capitol!5e0!3m2!1sen!2sph!4v1581804395802!5m2!1sen!2sph" class="w-100" height="600" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="py-0">
      <div class="container">
        <div class="row row-grid justify-content-center">
          <div class="col-lg-12 text-center">
            <h3 class="h2">Comment section</h3>
            <div class="text-center">
                <hr>
                <div id="fb-root w-100"></div>
                <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v6.0"></script>
                <div class="fb-comments w-100" data-href="http://ydalaguna.co/" data-width="" data-numposts="5"></div> 
            </div>
          </div>
        </div>
      </div>
    </section>
    
    
  </div>

 {{-- <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v6.0"></script>
<div class="fb-comments w-100 col-12" data-href="http://127.0.0.1:8000/" data-width="" data-numposts="5"></div>   --}}  
@endsection
