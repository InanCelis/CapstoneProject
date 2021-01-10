 <!-- ADD remark -->
  <div class="modal fade bg-dark" id="addeventremark" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLabel">Add remark</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="add_event_remark" method="POST">
          <div class="modal-body ">
             @csrf
             <input type="hidden" name="" id="eventid">
             <div class="row">
               <div class="col-lg-12">
                 <div class="form-group">
                  <label class="form-control-label" for="input-school">Remark</label>
                  <textarea rows="8 " class="form-control form-control-alternative" name="remark" placeholder="Remark" required></textarea>
                 </div>
               </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-sm " data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary btn-sm btn-submit"><i class="ni ni-send"></i> send</button>
          </div>
        </form>
      </div>
    </div>
  </div>
