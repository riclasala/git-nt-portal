<style>		
	::-webkit-scrollbar { 
	    display: none; 
	}
	.child-container{
		transition: 0.3s;
		margin-left: 15px;
		display: none;
	}
	.distributors{
		margin-top: 2px;
		padding: 7px 2px 7px 2px;
		border:none;		
		width: 100%;
		transition: 0.1s;
		text-align: left;
		font-family: Calibri;
		display: inline-block;
		background: rgba(153,153,153,0.3);
	}
	.distributors:before{
		padding: 5px;
		display: inline-block;
		width: 25px;
	}
	.distributors:hover{
		background: rgba(51,51,102,0.8);
		color: white;
	}	
	.distributors span{		
		text-align: left;
		display: inline-block;
		width: 18%;
	}
	#first-column{
		margin-top: -20px;
	}
	.noChild::before{
		padding: 5px;		
		content: "\25ba";
		opacity: 0;		
		position: relative;
		width: 25px;
	}
	.hasChild::before{
		padding: 5px;
		transition: 0.2s;
		content: "\25ba";
		position: relative;
		width: 25px;
	}
	.displayed{
		background: rgba(51,153,204,0.8);
		color: white;
	}
	.displayed::before{		
		color: white;
		transition: 0.2s;
		content: '\25bc';
		position: relative;
		width: 25px;
	}
	.displayed_fixed::before{				
		transition: 0.2s;
		content: '\25bc';
		position: relative;
		width: 25px;
	}
	.right{
		float: right;
		margin-right: 10px;
	}
	.left{
		float: left;
		margin-left: 30px;
	}
	.content-body{
		margin: 20px;
		padding: 10px;
		width: 95%;
		position: absolute;
		float: left;
	}
	#main-container{
		height: 700px;
		overflow-y: scroll;
	}	
	.loader{
		margin: 10px;
    width: 100%;
    height: 1000px;
    position: absolute;
    display: none;
    background: rgba(0,0,0,0.3);
    top: 0;
    left: 0;
	}
	#loading-image{
	    width: 50px;
	    margin-top: 350px;
	}
	.head{
		margin-left: 15px;
		font-size: 20px;
	}
	.filter-display{
		margin-top: -10px;
	}
	a.display{		
		text-decoration: none;
		border-radius: 5px;
		font-size: 13px;
		margin-left: 5px;
		padding: 7px;
		color: black;
		background: rgba(51,51,102,0.3);	
		transition: 0.3s;	
	}
	a.display:hover{
		background: rgba(51,51,102,0.8);	
		color: white;
	}
	a.active{
		background: rgba(51,51,102,0.8);	
		color: white;	
	}

	/* responsive layout */
	
	/*tablet to desktop*/
	@media (min-width: 768px){
		#filter-display{ margin-top: -10px; }
	}

	/*tablet to desktop*/
	@media (max-width: 768px){	
		.distributors{ font-size: 13px; padding: 3px; }
		#filter-display{ margin-top: -8px; }
		#display-genealogy{ padding: 6px; font-size: 13px; }
		#display-all-genealogy{ padding: 6px; font-size: 13px; }
	}

	/*mobile screen*/
	@media (max-width: 600px){		
		.distributors{ font-size: 13px; padding: 3px; }		
		.distributors span{ display: block; margin-left: 25px; font-size: 11px; width: 100%; }
		#display-genealogy{ padding: 5px; font-size: 12px; }
		#display-all-genealogy{ padding: 5px; font-size: 12px; }
		#filter-display{ margin-top: -5px; }
		#main-container{ height: 630px; }
	}



</style>

<br><br>
<div class="head">
	<i class="fa fa-tree"></i> Genealogy
	<div class="right" id="filter-display">
	<a id="display-genealogy" class="display">MY DISTRIBUTORS</a>
	<a id="display-all-genealogy" class="display">ALL DISTRIBUTORS</a>
	<br>
	</div>
</div>
<div class="col-lg-12" id="main-container">
	<div class="loader"> 
        <center> 
            <img id="loading-image" src="<?php echo base_url(); ?>assets/images/ajax-loader.gif" alt="loading.."> 
        </center> 
    </div>
</div>
<script>
$(document).ready(function(){
	//variable for complete genealogy	
var genealogy = [];
var genealogy_length;
$('.loader').show();
$.ajax({ 
    type: "post",   
    url: "<?php echo base_url('report/retrievegenealogy/'.$distributor->distributor_id); ?>",
    //dataType: 'json',
    success: function(data){
    	alert(data);
        genealogy = data;  
	    genealogy_length = data.length;
	    var downlines = retrieve_downlines(<?php echo $distributor->distributor_id; ?>);
	    
	    var content = generate_content(downlines);
	    $('#main-container').html(content);
	    $('#display-genealogy').addClass('active');
    },
    complete: function(){
        $('.loader').hide();
    }
});

//for button click of distributors to display downlines
function get_downlines(d_id){	
	if($('#'+d_id).hasClass('hasChild')){
		if($('#'+d_id).hasClass('displayed')){
			$('#'+d_id).removeClass('displayed');
			$('#'+d_id).next().slideUp(200);	
		}
		else{
			var downlines = retrieve_downlines(d_id);
			var content = generate_content(downlines);
			$('#'+d_id).next().html(content);
			$('#'+d_id).next().slideDown(200);	
			$('#'+d_id).toggleClass('displayed');						
		}
	}
}

//retrieval of downlines
function retrieve_downlines(id){
	var downlines = [];
	for(i=0; i<genealogy_length; i++){
		if(genealogy[i].sponsor_id == id){
			downlines.push(genealogy[i]);
		}
	}
	return downlines;	
}

//check if a distributor has downline
function has_downlines(d_id){
	var has_child = false;
	for(z=0;z<genealogy_length; z++){
		var rec = genealogy[z];
		if(rec['sponsor_id'] == d_id){
			has_child = true; 
			break;
		}
	}
	return has_child;
}

//function generates content when downlines is loaded
function generate_content(array){
	var content = "<div style='width: 100%;'>";
	for(x=0; x<array.length; x++){
		var hasChild = "noChild";		
		var record = array[x];
		var mobile = record['mobile_number'];
		if(mobile == null){ mobile = " N/A"; }
		else{ mobile = " " + mobile + " "; }
		var d_id = record['distributor_id'];		
		if(has_downlines(d_id) == true){ hasChild = "hasChild";}
		content += 
			"<button onclick='get_downlines("+d_id+");' class='distributors "+ hasChild +"' id='" + d_id +"'>"				
				//+"<div>"
					+"<span id='first-column'>[" + d_id + "]</span>"
					+"<span>Name: <b>" + record['distributor'] +"</b></span>"				
					+"<span>RANK: <b>" + record['rank'] +"</b></span>"
					+"<span>Last Active:<b>"+"</b></span>"
					+"<span>Mobile Number:<b>" + mobile +"</b></span>"
					//+"<span><b>" + mobile +"</b></span>"
					//+"<span id='separator'> | </span>"
					//+"<span>Team:" + record['team'] + "</span>"
				//+"</div>" 
			+"</button>"
			+"<div class='child-container'></div>";
	}
	content += "</div>";
	return content;		
}

//function generates all 
function generate_content_all(array){
	var content = "";
	for(x=0; x<array.length; x++){
		var hasChild = "noChild";		
		var record = array[x];
		var mobile = record['mobile_number'];
		if(mobile == null){ mobile = " N/A"; }
		else{ mobile = " " + mobile + " "; }
		var d_id = record['distributor_id'];
		var current_level = record['d_level'];
		if(has_downlines(d_id) == true){ hasChild = "hasChild";}
		//alert(current_level);
		if(current_level>0){
			if(current_level>1){
				var margin = 10*current_level;				
			}
			else{
				var margin = 0;
			}
				content += 
				"<div style='margin-left: "+margin+"px;'>"
				+"<button class='distributors "+ hasChild +" displayed_fixed' id='" + d_id +"'>"					
					//+"<div>"
						+"<span id='first-column'>[" + d_id + "]</span>"
						+"<span>Name: <b>" + record['distributor'] +"<b></span>"							
						+"<span>RANK: <b>" + record['rank'] +"</b></span>"	
						+"<span>Last Active:<b>"+"</b></span>"	
						+"<span>Mobile Number:<b>" + mobile +"</b></span>"	
						//+"<span><b>" + mobile +"</b></span>"
						//+"<span id='separator'> | </span>"
						//+"<span>Team:" + record['team'] + "</span>"
					//+"</div>" 
				+"</button>"
				+"</div>";
			}			
		}
		//alert(content);
	//content += "</div>"
	return content;
}

$('#display-genealogy').on('click',function(){
	var downlines = retrieve_downlines(<?= $distributor->distributor_id ?>);
	var content = generate_content(downlines);
	$('#main-container').html(content);
	$(this).addClass('active');
	$('#display-all-genealogy').removeClass('active');
});

$('#display-all-genealogy').on('click',function(){
	var content = generate_content_all(genealogy);	
	$('#main-container').html(content);
	$(this).addClass('active');
	$('#display-genealogy').removeClass('active');
});

});


</script>