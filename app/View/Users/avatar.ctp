 <script type="text/javascript" src="/MoneyLover/js/jquery-1.11.1.min.js"></script>
 <style type="text/css">
 	span{
 		height: 2.5em;
 	}
	.form-control{
		margin: 0;
		height: 35px;
		border: none;
		border-radius: 0 3px 3px 0;
	}
 </style>
 <div class="col-xs-12 col-sm-3 col-md-4"></div>
 <div class="col-xs-12 col-sm-6 col-md-4">
 	<div class="form-box">
 		<div class="form-top">
 			<h1>Change Avatar</h1>
 		</div>
 		<div class="form-mid">
 			<?php echo $this->form->create('User', array('enctype' => 'multipart/form-data')); ?>
 			<div class="form-group">
 				<div class="fileinputs">
 					<?php
 					//echo $this->Form->input('avatar', array('type'=> 'file', 'class'=>''));
 					?>
 				</div>
 				<div class="">
 					<div class="input-group">
 						<label class="input-group-btn">
 							<span class="btn btn-primary">
 								Browse&hellip; <input type="file" name="data[avatar]" id="avatar" style="display: none;" multiple>
 							</span>
 						</label>
 						<input type="text" class="form-control" readonly>
 					</div>
 				</div>
 				<div>
 					<?php
 					echo $this->Form->button('Submit', array('type'=>'submit', 'class'=>'btn'));
 					echo $this->Form->end();
 					?>
 				</div>
 			</div>
 		</div>
 	</div>
 </div>

 <?php 

 ?>
 <?php
	//echo $this->form->create('User', array('enctype' => 'multipart/form-data'));
	//echo $this->Form->input('avatar', array('type'=> 'file'));

 ?>
 <script>
 	$(function() {

  // We can attach the `fileselect` event to all file inputs on the page
  $(document).on('change', ':file', function() {
  	var input = $(this),
  	numFiles = input.get(0).files ? input.get(0).files.length : 1,
  	label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
  	input.trigger('fileselect', [numFiles, label]);
  });

  // We can watch for our custom `fileselect` event like this
  $(document).ready( function() {
  	$(':file').on('fileselect', function(event, numFiles, label) {

  		var input = $(this).parents('.input-group').find(':text'),
  		log = numFiles > 1 ? numFiles + ' files selected' : label;

  		if( input.length ) {
  			input.val(log);
  		} else {
  			if( log ) alert(log);
  		}

  	});
  });
  
});
</script>