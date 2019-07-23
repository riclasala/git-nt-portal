<section class="container-fluid">
	<div id="row"> 
		<h3>Video Training</h3>
    	<?php 
			if(isset($videos)){
				foreach($videos as $video){ 
    	?>  
 		<div class="col-md-3 col-sm-6 col-xs-12 thumbnail" uniq="video" video="<?php echo $video->link; ?>?autoplay=1" data-toggle="modal" data-target=".modal_video">
 			<img uniq="img" data-toggle="tooltip" data-placement="auto" title="<?php echo $video->video_name; ?>" src = "<?php echo base_url('assets/images/training/'.$video->file_name.'_1.png'); ?>" height="auto" width="100%">
 		</div> 
		<?php 
				} 
			} 
		?> 
	<div>
</section> 

<!-- Modal Video --> 
<div class="modal fade modal_video" id = 'my_vt_modal' tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"> 
	<div class="modal-dialog modal-lg"> 
		<div class="modal-content"> 
			<iframe id="video_frame" width="100%" height="450" src="" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; "  allowfullscreen>
			</iframe> 
		</div> 
	</div> 
</div> 

<script> 
 	$(document).ready(function(){
 		$("div[uniq='video']").click(function(){ 
			var video = $(this).attr('video'); 
			$("#video_frame").attr('src', video); 
		}); 
		$('#my_vt_modal').on('hidden.bs.modal', function (e) { 
			e.preventDefault(); 
			$('#video_frame').attr('src', ''); 
		});
		$("img[uniq='img']").mouseover(function(e){
			var img = $(this).attr('src'); 
			$('[data-toggle="tooltip"]').tooltip();   
			img = img.replace("_1", "_2");
			$(this).css('cursor','pointer');
			$(this).attr('src',img); 
		});
		$("img[uniq='img']").mouseout(function(){
			var img = $(this).attr('src'); 
			img = img.replace("_2", "_1");
			$(this).css('cursor','');
			$(this).attr('src',img); 
		});
 	});
</script>