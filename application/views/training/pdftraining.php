<section class="container-fluid">
	<div id="row"> 
		<h3>PDF Training</h3>
		<?php 
			if(isset($pdfs)){
				foreach($pdfs as $pdf){ 
    	?> 
 		<div class="col-md-3 col-sm-6 col-xs-12 thumbnail" uniq="pdf" pdf="<?php echo base_url('assets/documents/pdf/'.$pdf->file_name.'.pdf'); ?>" data-toggle="modal" data-target=".modal_pdf">
 			<img uniq="img" data-toggle="tooltip" data-placement="auto" title="<?php echo $pdf->pdf_name; ?>" src = "<?php echo base_url('assets/images/training/'.$pdf->file_name.'.jpg'); ?>" height="auto" width="100%">                                   
		</div> 
		<?php 
				} 
			} 
		?> 
	<div>
</section> 

<!-- Modal Video --> 
<div class="modal fade modal_pdf" id = 'my_pt_modal' tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"> 
	<div class="modal-dialog modal-lg"> 
		<div class="modal-content"> 
			<object type="application/pdf" id="pdf_frame" data="" width="100%" height="500" style="height: 85vh;">
				No Support
			</object> 
		</div> 
	</div> 
</div> 

<script> 
 	$(document).ready(function(){
 		$("div[uniq='pdf']").click(function(){ 
			var pdf = $(this).attr('pdf'); 
			$("#pdf_frame").attr('data', pdf); 
		}); 
		$('#my_pt_modal').on('hidden.bs.modal', function (e) { 
			e.preventDefault(); 
			$('#pdf_frame').attr('data', ''); 
		});
		$("img[uniq='img']").mouseover(function(e){ 
			$('[data-toggle="tooltip"]').tooltip();   
			$(this).css('cursor','pointer');
		});
 	});
</script>