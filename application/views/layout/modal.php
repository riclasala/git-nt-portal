
<style>
  .update-title{ 
     color: white;  
     width: 100%;  
     height: 30px;  
     margin: 10px;  
     background: linear-gradient(90deg, rgba(255,255,255,1) 2%, rgba(0,153,51,1) 52%, rgba(255,255,255,1) 97%); padding: 5px 0 0 0; 
     } 

</style>
<div class="modal fade" id="portalModal" role="dialog">
  <div class="modal-dialog">
  <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
          <span aria-hidden="true">×</span> 
        </button>
        <center> 
          <img class="company-img" src="<?php echo base_url('assets/images/big-logo.png'); ?>"> 
          <?php if(isset($distributor)){ ?>
          <h3><span class="green">Happy Day</span> <?php echo $distributor->fullName; ?>!</h3>
          <?php } ?>       
        </center> 
      </div>
      <div class="modal-body">
        <!-- Modal content-->
      </div>
    </div>  
  </div>
</div>