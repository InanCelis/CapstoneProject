@if(count($registeruser))
<div class="container" >
     <div class="row">
       <div class="col-md-1">
       </div>
       <div class="col-md-10">
        <center><strong>Application Status</strong></center><br>
         <ul class="progressbar " style="margin-left: -20px;">
          @foreach($registeruser as $registered)
              @if($registered->event_registration_status == 1)
              <li class="active">Registered</li>
              <li>Approved</li>
              <li>Auditioned</li>
              <li>Passed</li>
              @elseif($registered->event_registration_status == 2)
              <li class="active">Registered</li>
              <li class="active">Approved</li>
              <li>Auditioned</li>
              <li>Passed</li>
              @elseif($registered->event_registration_status == 3)
              <li class="active">Registered</li>
              <li class="active">Approved</li>
              <li class="active">Auditioned</li>
              <li class="active">Passed</li>
              @elseif($registered->event_registration_status == 4)
              <li class="active">Registered</li>
              <li class="active">Approved</li>
              <li class="active">Auditioned</li>
              <li class="inactive">Passed</li>
              @endif
          @endforeach
          </ul>
       </div>
       <div class="col-md-1">
       </div>
     </div>
</div>
@else

@endif