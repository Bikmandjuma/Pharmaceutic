  <?php
    if (isset($_POST['GetLost'])) {
      session_start();
      session_destroy();
      ?>
        <script>
          window.location.href='../index.php';
        </script>
      <?php
      
    }


  ?>
  <!--start of Logout modal -->
	  <div class="modal" style="margin-top:100px;" id="ModalLogout" tabindex="-1" role="dialog" aria-hidden="true">
	    <div class="modal-dialog modal-sm text-center">
	      <div class="modal-content">
	        <div class="modal-body">
	          <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
	          <h4>Logout system&nbsp;<i class="fa fa-lock"></i></h4>
	        </div>
	        <div class="modal-body">
	          <p><i class="fa fa-question-circle"></i>Are you sure , you want to log-off ? <br /></p>
	          <div class="actionsBtns">
	            <form method="POST">
	              <button type="submit" name="GetLost" class="btn btn-primary"  style="border-radius:10px;color:white;"><i class="fa fa-lock"></i> Yes</button> &nbsp;&nbsp;&nbsp;
	              <button class="btn btn-danger" data-dismiss="modal" style="border-radius:10px;"><i class="fa fa-times"></i> Not now</button>
	            </form>
	          </div>
	        </div>
	      </div>
	    </div>
	  </div>
	<!--end of logout modal-->