<div class="modal-header bg-success">
    <h4 class="modal-title text-white" id="exampleModalLabel">Details</h4>
    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
       <span aria-hidden="true" class="text-white">&times;</span>
    </button>
</div>
<div class="modal-body container-fluid">
  @foreach($acc_request as $req)
    <h4 class="my-3 text-dark">Message:</h4>
    <div class="text-sm bg-secondary" style="overflow-y: auto; max-height:220px;">
      {!! nl2br($req->message) !!} 
    </div>

    <h4 class="my-3 text-dark">Feedback:</h4>
    
      @if(auth()->user()->usertype == 1)
        <form id="add_feedback" method="POST"> 
          @csrf
          <input type="hidden" name="request_id" id="req_id" value="{{ $req->id }}">
         <textarea rows="2" class="form-control form-control-alternative" name="feedback" placeholder="Feedback" onkeyup="new do_resize(this);" cols="70" rows="10" required>{{ $req->feedback }}</textarea
          >
          <button type="submit" class="btn btn-submit bg-success my-2 pull-right"> Send</button>

        </form>

      @else

        <div class="text-sm bg-secondary" style="overflow-y: auto; max-height:220px;">
         {!! nl2br($req->feedback) !!}
        </div>

      @endif
    
  @endforeach
</div>

<script src="{{ asset('/js/accreditation.js') }}"></script>
