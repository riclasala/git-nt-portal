
/*window.setInterval(function(){var buttons = $('.distributors');
var i = 0, length = buttons.length;

for (i; i < length; i++) {
        buttons[i].addEventListener("click", function() {
        	getDownlines(this);       	
        });
	}


},1000);*/


//function called when button is clicked 
function getDownlines(id){

	var btns = document.getElementsByTagName('button');
	var btn;
	
	for(x=0; x<btns.length; x++){
		if(btns[x].value == id){
			btn = btns[x];
		}
	}

	//alert(btn.value);

	var d_id = btn.value;
	var distributor = btn.name;

	if(btn.classList.contains('hasChild')){	

	if(btn.classList.contains(d_id)){
		btn.classList.remove(d_id);
		btn.classList.remove('displayed');	
		btn.style.background = "none";
		btn.style.color = "black";		
		$('#'+btn.value).empty();
	}
	else{
		var request = new XMLHttpRequest();

		request.open('GET', 'http://192.168.1.218:8888/portal/genealogy_controller/returnJson/'+d_id);

		request.onload = function(){			
			var data = JSON.parse(request.responseText);
			var content = setContent(data,distributor);
			generate(d_id,content);
			btn.classList.toggle(d_id);
			btn.classList.toggle('displayed');
			btn.style.background = "#333366";
			btn.style.color = "white";
		};

		request.send();	

	}

	}
	else{

	}
}	

//set content of html
function setContent(data,distributor){

	//var content = "<br><span class='label'>" + distributor + "'s DISTRIBUTORS</span><br>";
	
	var content = "";
	
	for(i=0; i<data.length; i++){
		
		var hasChild = "noChild";

		if(data[i].have_child == 1) { hasChild = "hasChild" }

		var click = data[i].id;

		content += "<button onclick='getDownlines(" + click + ");' class='distributors "+ hasChild +"' value='" + data[i].id + "' uniq='name' name='"+ data[i].distributor +"'>[" + data[i].id + "]<div class='d-name' ><b class='name'> " + data[i].distributor +"</b><span class='rank'>RANK: " + data[i].rank + "</span></div><span>" + data[i].team + "</span></button><div id='" + data[i].id + "' class='container'></div>";
	}

	content += "<br>"

	return content;		
}

//generate element
function generate(element_id,content){

	var item = document.getElementById(element_id);
	item.innerHTML = content;
	//item.style.background = "rgba(128,128,128,0.7)";

	var spans = $("span");
	for(i=0; i<spans.length; i++){
		if(spans[i].id == element_id){
			spans[i].innerHTML = element_id + "'s Downlines<br><br>";
		}
	}
}
