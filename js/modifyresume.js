$(document).ready(function(){
		$("#addedu").click(function(){
		$("#editedu").show(),
		$("#edudetail").hide();
		});
	});
$(document).ready(function(){
		$("#resetedu").click(function(){
		$("#editedu").hide(),
		//$("#updateedu").hide(),
		$("#edudetail").show();
		});
	});

	$(document).ready(function(){
		$("#editobj").click(function(){
		$("#editobj1").show(),
		$("#objdetail").hide();
		});
	});
	
	$(document).ready(function(){
		$("#editinfo").click(function(){
		$("#formcontact").show(),
		$("#formdetail").hide();
		});
		$("#submitcan").click(function(){
		$("#formcontact").hide(),
		$("#formdetail").show();
		});
	});
	$(document).ready(function(){
		$("*").load(function(){
	
		$("#success").hide(3000);
		});
		
	});
	$(document).ready(function(){
		$("#addobj").click(function(){
		$("#editobj1").show(),
		$("#objdetail").hide();
		});
		$("#resetobj").click(function(){
		$("#editobj1").hide(),
		$("#objdetail").show();
		});
	});

	
	

	

	$(document).ready(function(){
		$("#addwork").click(function(){
		$("#editwork").show(),
		$("#workdetail").hide();
		});
	});
	$(document).ready(function(){
		$("#resetwork").click(function(){
		$("#editwork").hide(),
		$("#workdetail").show();
		});
	});
	


	$(document).ready(function(){
		$("#addref").click(function(){
		$("#editref").show(),
		$("#refdetail").hide();
		});
	});
	$(document).ready(function(){
		$("#resetref").click(function(){
		$("#editref").hide(),
		$("#refdetail").show();
		});
	});
	

	

	$(document).ready(function(){
		$("#addski").click(function(){
		$("#editski").show(),
		$("#skidetail").hide();
		});
	});
	$(document).ready(function(){
		$("#resetski").click(function(){
		$("#editski").hide(),
		$("#skidetail").show();
		});
	});
	$(document).ready(function(){
		$("#editski1").click(function(){
		$("#editski").show(),
		$("#skidetail").hide();
		});
	});
	

	function addwork()
	{
	  
	  if(document.frm3.current.checked==true)
	  {
		document.frm3.woenddate.disabled=true;
		document.frm3.woendyear.disabled=true;
	  }
	  else if(document.frm3.current.checked==false)
	  {
		document.frm3.woenddate.disabled=false;
		document.frm3.woendyear.disabled=false;
	  }
	}
	function applywork()
	{
	  
	  if(document.frm1.current1.checked==true)
	  {
		document.frm1.woenddate1.disabled=true;
		document.frm1.woendyear1.disabled=true;
	  }
	  else if(document.frm1.current1.checked==false)
	  {
		document.frm1.woenddate1.disabled=false;
		document.frm1.woendyear1.disabled=false;
	  }
	}

		
		//------- JAVASCRIPT FUNCTIONS START ----------//
	
	function edit_woBack(url1, container1){
	
		var xmlhttp;
		if (window.XMLHttpRequest)
  		{// code for IE7+, Firefox, Chrome, Opera, Safari
  			xmlhttp=new XMLHttpRequest();
  		}
		else
  		{// code for IE6, IE5
  			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  		}
			xmlhttp.onreadystatechange=function()
  			{
  				if (xmlhttp.readyState==4 && xmlhttp.status==200)
    			{
    				document.getElementById(container1).innerHTML=xmlhttp.responseText;
					$("#workdetail").hide(),
					$("#updatework").show();
					$("#resetwork1").click(function(){
					$("#workdetail").show(),
					$("#updatework").hide();
					});
    			}
  			}
		xmlhttp.open('GET',url1,true);
		xmlhttp.send();
	
	}	
		//------- JAVASCRIPT FUNCTIONS START ----------//
	
	function edit_refBack(url2, container2){
	
		var xmlhttp;
		if (window.XMLHttpRequest)
  		{// code for IE7+, Firefox, Chrome, Opera, Safari
  			xmlhttp=new XMLHttpRequest();
  		}
		else
  		{// code for IE6, IE5
  			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  		}
			xmlhttp.onreadystatechange=function()
  			{
  				if (xmlhttp.readyState==4 && xmlhttp.status==200)
    			{
    				document.getElementById(container2).innerHTML=xmlhttp.responseText;
					$("#refdetail").hide(),
					$("#updateref").show();
					$("#resetref1").click(function(){
					$("#refdetail").show(),
					$("#updateref").hide();
					});
    			}
  			}
		xmlhttp.open('GET',url2,true);
		xmlhttp.send();
	
	}
		//------- JAVASCRIPT FUNCTIONS START ----------//
	
	function edit_edBack(url, container){
	
		var xmlhttp;
		if (window.XMLHttpRequest)
  		{// code for IE7+, Firefox, Chrome, Opera, Safari
  			xmlhttp=new XMLHttpRequest();
  		}
		else
  		{// code for IE6, IE5
  			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  		}
			xmlhttp.onreadystatechange=function()
  			{
  				if (xmlhttp.readyState==4 && xmlhttp.status==200)
    			{
    				document.getElementById(container).innerHTML=xmlhttp.responseText;
					$("#edudetail").hide(),
					$("#updateedu").show();
					$("#resetedu2").click(function(){
					$("#edudetail").show(),
					$("#updateedu").hide();
					});
    			}
  			}
		xmlhttp.open('GET',url,true);
		xmlhttp.send();
	
	}
	
// Validation form in modify_resume
$(document).ready(function(){
	// validate signup form on keyup and submit
	$("#signupForm").validate({
		rules: {
			f_name: "required",
			m_num: {
				required: true ,
				phoneAll: true
			},
			
			p_num: {
				required: true ,
				phoneAll: true
			},
			str: "required",
			strt2: "required"
		},
		messages: {
			//firstname: "Please enter your firstname.",
			f_name: "Please enter your full name.",
			m_num: "Please specify a valid mobile number.",
			p_num: "Please specify a valid phone number.",
			
		}
	});
});

$(document).ready(function(){
	// validate signup form on keyup and submit
	$("#addeduform").validate({
		rules: {
			edu_level: "required",
			instname: "required",
			instaddr: "required"
	
		}
	});
});

$(document).ready(function(){
	// validate signup form on keyup and submit
	$("#addworkform").validate({
		rules: {
			jobtitle: "required",
			company: "required",
			wostrdate: "required",
			wostryear: "required",
			woenddate: "required",
			woendyear: "required",
			woaddr: "required"
			
	
		}
	});
});
$(document).ready(function(){
	// validate signup form on keyup and submit
	$("#updatereform").validate({
		rules: {
			refname: "required",
			refjob: "required",
			refcompany: "required",
			phmno: {
				required: true ,
				phoneAll: true
			},
			refemail: {
				required: true ,
				email: true
			}
			
			
		
		},
		messages: {
			//firstname: "Please enter your firstname.",
			refname: "Please enter your full name.",
			refjob: "Please enter specific job title.",
			refcompany: "Please enter the company name.",
			phmno: "Please specify a valid phone/mobile number.",
			refemail:"Please enter valid email address",
		}
	});
});
