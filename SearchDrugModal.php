<style>
	#search_id:hover{
		cursor: pointer;
		color:blue;
		transform: scale(1.2);
	}
</style>
<!--start of Search drug modal -->
	  <div class="modal" style="margin-top:100px;" id="ModalSearchDrug" tabindex="-1" role="dialog" aria-hidden="true">
	    <div class="modal-dialog modal-md text-center">
	      <div class="modal-content">
	        <div class="modal-body">
	          <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
	          <h4>Search pills&nbsp;&nbsp;<i class="fa fa-pills"></i></h4>
	        </div>
	        <div class="modal-body">
	          <div class="actionsBtns">
	            <form method="POST" class="d-flex" action="search.php">
	            	<input type="text" name="search" class="form-control mb-2" placeholder="Searching . . . . " required style="border:2px solid skyblue;">
	              <button type="submit" name="SubmitSearch" style="background: none;border: none;"><i class="fa fa-search" id="search_id" style="margin-left:-50px;"></i></button>
	            </form>
	          </div>
	        </div>
	      </div>
	    </div>
	  </div>
	<!--end of Search drug modal-->