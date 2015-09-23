/*
 * Licensed to the Apache Software Foundation (ASF) under one
 * or more contributor license agreements.  See the NOTICE file
 * distributed with this work for additional information
 * regarding copyright ownership.  The ASF licenses this file
 * to you under the Apache License, Version 2.0 (the
 * "License"); you may not use this file except in compliance
 * with the License.  You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing,
 * software distributed under the License is distributed on an
 * "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
 * KIND, either express or implied.  See the License for the
 * specific language governing permissions and limitations
 * under the License.
*/
var app = {
    initialize: function() {
        this.bindEvents();
    },
    bindEvents: function() {
        document.addEventListener('deviceready', this.onDeviceReady, false);
    },
	successHandler: function(result) {
		console.log('CallBack Success! Result = '+result);
	},
	errorHandler: function(error) {
		console.log(error);
	},
    onDeviceReady: function() {
		console.log('Device ready');

		navigator.splashscreen.hide();
	}
};

var back = {
    initialize: function() {
        this.bindEvents();
    },
    bindEvents: function() {
		document.addEventListener('backbutton', this.onBackKeyDown, false);
    },
	onBackKeyDown: function() {
		var msg=confirm('Do you want to exit application?');

		if (msg) {
			if (navigator.app) {
				navigator.app.exitApp();
			} else if (navigator.device) {
				navigator.device.exitApp();
			}
		}	
	}
};

function checkMember() {
	var user = $('#username').val();
	var pass = $('#password').val();

	var url = 'http://www.ojtap.com/mobile/member.php';
	if (user != '' && pass != '') {
		$.ajax({
			type: 'GET',
			url: url,
			data: {user: user, pass: pass},
			success: function(data, textStatus){
				if (data.username === null || data.username === '') {
						alert('Invalid Username or Password!');
				} else {
					var status = data.status;
					var res_status = status.toLowerCase();
					
					if (res_status != 'a' && res_status != 'active') {
						alert("Account is not activated, please contact the Admin.");
					} else {
						window.localStorage['user'] = user;
						window.localStorage['type'] = data.type;
						
						if (data.type.toLowerCase() == "adviser" || data.type.toLowerCase() == "student") {
							alert("Welcome, " + data.username);

							goTo();
					
						} else {
							alert("Error! The account you entered is not suited, please contact the Admin.");
						}
					}
				}
			},
			error: function(data, textStatus){
				alert('A problem occured! Please check your network connection.');
			},
			dataType: 'json'
		}); 
	} else {
		alert("Please input login details!");
	}
}

function goTo() {
	var user = window.localStorage.getItem('user');
	var type = window.localStorage.getItem('type');
	
	if (user != undefined || user != null || user.length != 0) {
		if (type.toLowerCase() == "adviser") {
		window.location.href = "index_adviser.html";
		}
	
		if (type.toLowerCase() == "student") {
			window.location.href = "index_student.html"
		}
	}
}

function checkSession() {
	var user = window.localStorage.getItem('user');
	
	clearData(true);
	dispAnnounceAd();
	dispAnnounceSt();
	if (user != undefined || user != null || user.length != 0) {
		dispProfile();
		dispRequirement();
		dispRequirementChklst();
		dispApplicationSt();
		dispStudentFilter(0);	
	}
}

function removeUser() {
	var user = window.localStorage.getItem('user');
	
	if (user != undefined || user != null) {
		window.localStorage.removeItem('user');
		clearData(false);
		window.location.href = "login.html";

		alert('Logout Successfully!');
	} 
} 

function dispProfile() {
	var user = window.localStorage.getItem('user');
	var type = window.localStorage.getItem('type');
	var prof;

	if (type.toLowerCase() == "student") {
		$.getJSON('http://www.ojtap.com/mobile/st_profile.php?user=' +user, function(data) {
			$.each(data, function(index, item) {
				if (item.id == '' || item.id == undefined || item.id == null) {
					console.log('Empty data');
				} else {
					if (item.pic === '' || item.pic === null) {
						prof = '<div class="image_single" ><img src="images/icons_dark/about.png" alt="" title="" border="0" /></div>';
						prof += '<div class="image_caption blue blue_borderbottom">'+item.fname+' '+item.mname+' '+item.lname+'</div>';
					} else {
						prof = '<div class="image_single"><img src="'+item.pic+'" alt="" title="" border="0" /></div>';
						prof += '<div class="image_caption blue blue_borderbottom">'+item.fname+' '+item.mname+' '+item.lname+'</div>'
					}
					
					prof += '<ul class="responsive_table">';
					prof +=	'	<li class="table_row">'
					prof +=	'		<div style="text-align: center;">Personal Information</div>';
					prof +=	' 	</li>';
					prof +=	'	<li class="table_row">'
					prof +=	'		<div class="table_section">Address: </div>'
					prof +=	'		<div class="table_section">'+item.house +', '+item.barangay +', '+item.street +', '+item.city + ', '+item.country+'</div> ';
					prof +=	' 	</li>';
					prof +=	' 	<li class="table_row">';
					prof +=	'		<div class="table_section">Mobile No: </div>';
					prof +=	'		<div class="table_section">'+item.mobile+'</div> ';
					prof +=	' 	</li>';
					prof +=	' 	<li class="table_row">';
					prof +=	'		<div class="table_section">Email Address: </div>';
					prof +=	'		<div class="table_section">'+item.email+'</div> ';
					prof +=	' 	</li>';
					prof +=	' 	<li class="table_row">';
					prof +=	'		<div class="table_section">Birthdate: </div>';
					prof +=	'		<div class="table_section">'+item.dbirth+'</div> ';
					prof +=	' 	</li>';
					prof += '</ul>';	

					$('#displayProf').append(prof);
				}
			});
		});
	} else if (type.toLowerCase() == "adviser") {
		$.getJSON('http://www.ojtap.com/mobile/ad_profile.php?user=' +user, function(data) {
			$.each(data, function(index, item) {
				if (item.id == '' || item.id == undefined || item.id == null) {
					console.log('Empty data');
				} else {
					if (item.pic === '' || item.pic === null) {
						prof = '<div class="image_single" ><img src="images/icons_dark/about.png" alt="" title="" border="0" /></div>';
						prof += '<div class="image_caption blue blue_borderbottom">'+item.fname+' '+item.mname+' '+item.lname+'</div>';
					} else {
						prof = '<div class="image_single"><img src="'+item.pic+'" alt="" title="" border="0" /></div>';
						prof += '<div class="image_caption blue blue_borderbottom">'+item.fname+' '+item.mname+' '+item.lname+'</div>'
					}
									
					prof += '<ul class="responsive_table">';
					prof +=	'	<li class="table_row">'
					prof +=	'		<div style="text-align: center;">Personal Information</div>';
					prof +=	' 	</li>';
					prof +=	'	<li class="table_row">'
					prof +=	'		<div class="table_section">Address: </div>'
					prof +=	'		<div class="table_section">'+item.house +', '+item.barangay +', '+item.street +', '+item.city + ', '+item.country+'</div> ';
					prof +=	' 	</li>';
					prof +=	' 	<li class="table_row">';
					prof +=	'		<div class="table_section">Mobile No: </div>';
					prof +=	'		<div class="table_section">'+item.mobile+'</div> ';
					prof +=	' 	</li>';
					prof +=	' 	<li class="table_row">';
					prof +=	'		<div class="table_section">Email Address: </div>';
					prof +=	'		<div class="table_section">'+item.email+'</div> ';
					prof +=	' 	</li>';
					prof +=	' 	<li class="table_row">';
					prof +=	'		<div class="table_section">Birthdate: </div>';
					prof +=	'		<div class="table_section">'+item.dbirth+'</div> ';
					prof +=	' 	</li>';
					prof += '</ul>';		

					$('#displayProf').append(prof);
				}
			});
		});
	}
}

function dispAnnounceAd() {
	var user = window.localStorage.getItem('user');
	
	$.getJSON('http://www.ojtap.com/mobile/ad_view_announce.php?user=' + user, function(data) {
		$.each(data, function(index, item) {
			if (item.date == '' || item.date == undefined || item.date == null) {
				console.log('Empty data');
			} else {	
				var announce = '<div>';
				announce += '<h4><a href="javascript:menu(5);" onclick="announceDetail('+item.id+');" style="text-decoration:underline;">' + item.title + '</a></h4>';
				announce += '</div>';
				
				$('#displayNews').append(announce);
			}
		});
	});
}

function dispAnnounceSt() {
	var user = window.localStorage.getItem('user');
	
	$.getJSON('http://www.ojtap.com/mobile/st_view_announce.php?user=' + user, function(data) {
		$.each(data, function(index, item) {
			if (item.date == '' || item.date == undefined || item.date == null) {
				console.log('Empty data');
			} else {	
				var announce = '<div>';
				announce += '<h4><a href="javascript:menu(4);" onclick="announceDetail('+item.id+');" style="text-decoration:underline;">' + item.title + '</a></h4>';
				announce += '</div>';
				
				$('#displayNews').append(announce);
			}
		});
	});
}

function announceDetail(id) {
	$('#displayNewsDetail').html('');
		
	var ann_id = id;
	var ann;
	
	$.getJSON('http://www.ojtap.com/mobile/viewann_detail.php?id=' + ann_id, function(data) {
		$.each(data, function(index, item) {
			if (item.date == '' || item.date == undefined || item.date == null) {
				console.log('Empty data');
			} else {	
				ann = '<a href="javascript:menu(1);"class="backtoblog">back</a>';
				ann += '<h3 style="text-decoration:underline;">' + item.title + '</h3>';
				ann += '<div class="toggle_container" style="text-align: justify;"><p>' + item.message +'</p>';
				ann += '<p style="float:right; text-decoration:underline; color:#acacac; font-style:italic;">' + item.date + '</p>';
				ann += '</div>';
				
				$('#displayNewsDetail').append(ann);
			}
		});
	});
}


function dispStudentList(data) {
	var user = window.localStorage.getItem('user');
	var student;
	$.getJSON('http://www.ojtap.com/mobile/ad_student_list.php?user=' +user, function(data) {
		$.each(data, function(index, item) {
			if (item.id == '' || item.id == undefined || item.id == null) {
				console.log('Empty data');
			} else {
				student ='<h4>';
				if (item.mname != null)
					student += '<a id="student" href="javascript:menu(4);" style="text-decoration: underline;"onclick="dispSel('+item.id+');">'+item.lname +', '+item.fname +' '+item.mname.substring(0, 1)+'</a>';
				else
					student += '<a id="student" href="javascript:menu(4);" style="text-decoration: underline;"onclick="dispSel('+item.id+');">'+item.lname +', '+item.fname +'</a>';
				
				student +='</h4>';
				$('#displayFilter').append(student);
			}
		});
	});
}

function dispSel(id) {
	dispSelStudentProf(id);
	dispSelStudentApp(id);
	dispSelStudentReq(id);
}

function dispSelStudentReq(id) {
	$('#displayStReq').html('');
		
	var st_id = id;
	var req;
	
	$.getJSON('http://www.ojtap.com/mobile/ad_st_requirement.php?id=' +st_id, function(data) {
		$.each(data, function(index, item) {
			if (item.id == '') {
				console.log('Empty data');
			} else {	
				var req = '<div class="table_section">' + item.req_name + '</div>';
				req +=    '<div class="table_section">' + item.req_date + '</div>';
				req +=    '<div class="table_section_small">' + item.checklist + '</div>';

				$('#displayStReq').append(req);
			}
		});
	});
}

function dispSelStudentApp(id) {
	$('#displayStApp').html('');
		
	var st_id = id;
	var app;
	
	$.getJSON('http://www.ojtap.com/mobile/ad_st_application.php?id=' +st_id, function(data) {
		$.each(data, function(index, item) {
			if (item.id == '') {
				console.log('Empty data');
			} else {	
				app = '<div class="table_section">' + item.jobname + '</div>';
				app += '<div class="table_section">'+item.company+'</div>';
				if (item.app_status.toLowerCase() == "s") {
					app += '<div class="table_section_small" style="color: orange;">' + item.app_status +'cheduled' + '</div>';
				} else if (item.app_status.toLowerCase() == "scheduled") {
					app += '<div class="table_section_small" style="color: orange;">' + item.app_status + '</div>';
				} else if (item.app_status.toLowerCase() == "pending") {
					app += '<div class="table_section_small" style="color: red;">' + item.app_status +'</div>';
				} else if (item.app_status.toLowerCase() == "hired") {
					app += '<div class="table_section_small">' + item.app_status +'</div>';
				} else if (item.app_status.toLowerCase() == "waiting") {
					app += '<div class="table_section_small" style="color: green;">' + item.app_status +'</div>';
				} else if (item.app_status.toLowerCase() == "p") {
					app += '<div class="table_section_small" style="color: red;">' + item.app_status + 'ending'+'</div>';
				} else if (item.app_status.toLowerCase() == "h") {
					app += '<div class="table_section_small">' + item.app_status + 'ired'+'</div>';
				} else if (item.app_status.toLowerCase() == "w") {
					app += '<div class="table_section_small" style="color: green;">' + item.app_status + 'aiting'+'</div>';				
				}
				$('#displayStApp').append(app);
			}
		});
	});
}

function dispSelStudentProf(id) {
		$('#displaySTProf').html('');
		
		var st_id = id;
		var prof;

		$.getJSON('http://www.ojtap.com/mobile/ad_st_profile.php?id=' +st_id, function(data) {
			$.each(data, function(index, item) {
				if (item.id == '') {
					console.log("Empty Data");
				} else if (item.id == st_id) {
					if (item.pic === '' || item.pic === null) {
							prof = '<div class="image_single" ><img src="images/icons_dark/about.png" alt="" title="" border="0" /></div>';
							prof += '<div class="image_caption blue blue_borderbottom">'+item.fname+' '+item.mname+' '+item.lname+'</div>';
					} else {
						prof = '<div class="image_single"><img src="'+item.pic+'" alt="" title="" border="0" /></div>';
						prof += '<div class="image_caption blue blue_borderbottom">'+item.fname+' '+item.mname+' '+item.lname+'</div>'
					}
						
					prof += '<ul class="responsive_table">';
					prof +=	'	<li class="table_row">'
					prof +=	'		<div style="text-align: center;">Personal Information</div>';
					prof +=	' 	</li>';
					prof +=	'	<li class="table_row">'
					prof +=	'		<div class="table_section">Address: </div>'
					prof +=	'		<div class="table_section">'+item.house +', '+item.barangay +', '+item.street +', '+item.city + ', '+item.country+'</div> ';
					prof +=	' 	</li>';
					prof +=	' 	<li class="table_row">';
					prof +=	'		<div class="table_section">Mobile No: </div>';
					prof +=	'		<div class="table_section">'+item.mobile+'</div> ';
					prof +=	' 	</li>';
					prof +=	' 	<li class="table_row">';
					prof +=	'		<div class="table_section">Email Address: </div>';
					prof +=	'		<div class="table_section">'+item.email+'</div> ';
					prof +=	' 	</li>';
					prof +=	' 	<li class="table_row">';
					prof +=	'		<div class="table_section">Birthdate: </div>';
					prof +=	'		<div class="table_section">'+item.db+'</div> ';
					prof +=	' 	</li>';
					prof += '</ul>';	

					$('#displaySTProf').append(prof);
				}
			});
		});	
}

function dispStudentFilter(idx) {
	$('#displayFilter').html('');

	switch (idx) {
		case 0 :
			dispPractClass(true);
			break;
		case 1 :
			dispStudentList(true);
			break;
	}
}

function dispRequirement() {
	var user = window.localStorage.getItem('user');
	
	$.getJSON('http://www.ojtap.com/mobile/st_view_requirement.php?user=' +user, function(data) {
		$.each(data, function(index, item) {
			if (item.req_name == '') {
				console.log('Empty data');
			} else {	
				var req = '<div class="table_section">' + item.req_name + '</div>';
				req += '<div class="table_section">' + item.req_date + '</div>';
				req += '<div class="table_section_small">' + item.checklist + '</div>';

				$('#displayRequirement').append(req);
			}
		});
	});
}

function dispRequirementChklst(data) {
	var user = window.localStorage.getItem('user');
	
	$.getJSON('http://www.ojtap.com/mobile/st_view_checklist.php?user=' +user, function(data) {
		$.each(data, function(index, item) {
			if (item.req_name == '') {
				console.log('Empty data');
			} else {	
				var reqchklst = '<div class="table_section"><a>' + item.req_name + '</a></div>';
				reqchklst += '<div class="table_section"><a>' + item.deadline + '</a></div>';
				

				$('#displayRequirementChecklist').append(reqchklst);
			}
		});
	});
}

function dispApplicationSt() {
	var user = window.localStorage.getItem('user');
	
	$.getJSON('http://www.ojtap.com/mobile/st_application.php?user=' +user, function(data) {
		$.each(data, function(index, item) {
			if (item.req_name == '') {
				console.log('Empty data');
			} else {	
				var ap = '<div class="table_section">' + item.job + '</div>';
				ap += '<div class="table_section">' + item.company + '</div>';
				if (item.status.toLowerCase() == "s") {
					ap += '<div class="table_section_small" style="color: orange;">' + item.status +'cheduled' + '</div>';
				} else if (item.status.toLowerCase() == "scheduled") {
					ap += '<div class="table_section_small" style="color: orange;">' + item.status + '</div>';
				} else if (item.status.toLowerCase() == "pending") {
					ap += '<div class="table_section_small" style="color: red;">' + item.status +'</div>';
				} else if (item.status.toLowerCase() == "hired") {
					ap += '<div class="table_section_small">' + item.status +'</div>';
				} else if (item.status.toLowerCase() == "waiting") {
					ap += '<div class="table_section_small" style="color: green;">' + item.status +'</div>';
				} else if (item.status.toLowerCase() == "p") {
					ap += '<div class="table_section_small" style="color: red;">' + item.status + 'ending'+'</div>';
				} else if (item.status.toLowerCase() == "h") {
					ap += '<div class="table_section_small">' + item.status + 'ired'+'</div>';
				} else if (item.status.toLowerCase() == "w") {
					ap += '<div class="table_section_small" style="color: green;">' + item.status + 'aiting'+'</div>';				
				} 

				$('#displayApplication').append(ap);
			}
		});
	});
}

function dispPractClass() {
	var user = window.localStorage.getItem('user');

	$.getJSON('http://www.ojtap.com/mobile/ad_view_practclass.php?user=' +user, function(data) {
		$.each(data, function(index, item) {
			if (item.req_name == '') {
				console.log('Empty data');
			} else {	
				var pc = '<ul class="responsive_table">';
				pc +=	   '<li class="table_row">';
				pc +=	     '<div class="table_section">Practicum Name</div>';
				pc +=        '<div class="table_section_small">Students</div>';
				pc +=        '<div class="table_section_small">Semester</div>';
				pc +=        '<div class="table_section_small">Schedule</div>';
				pc +=	   '</li>';
				pc +=	   '<li class="table_row">';
			    pc +=        '<div class="table_section">'+item.name+'</div>';
				pc +=        '<div class="table_section_small">'+item.enrolled+'</div>';
				pc +=        '<div class="table_section_small">'+item.sem+'</div>';
				pc +=        '<div class="table_section_small">'+item.day+' '+item.time+'</div>';	
				pc +=	   '</li>';
				pc +=    '</ul>';

				$('#displayFilter').append(pc);
			}
		});
	});
}

function postAnnounce() {
	var user = window.localStorage.getItem('user');
	var title1 = $('#title').val();
	var message1 = $('#message').val();
	
	var url = 'http://www.ojtap.com/mobile/ad_post_announce.php';
	
	if (title1 != "" && message1 != "") {
		$.ajax({
			type: 'GET',
			url: url,
			data: {user: user, title: title1, message: message1},
			success: function(data, textStatus){
				if (data.result === null || data.result === '') {
					alert('Failed');
				} else {
					if (data.result != "Failed") {
						alert("Announcement was successfully posted.");
						
						window.location.href = "index_adviser.html";
					}
				}
			},
			error: function(data, textStatus){
				alert('Error! Check your network connection.');
			},
			dataType: 'json'
		}); 
	} else {
		alert("Please fill out the form");
	}
}

function newAnn() {
	var user = window.localStorage.getItem('user');
	var old_count = localStorage.getItem('count');
	
	var url = "http://www.ojtap.com/mobile/st_ann_alert.php";
	setInterval(function(){ 
		$.ajax({
			type: "GET",
			url: url,
			data: "user=" + user,
			success : function(data){
				if (data.count == "0") {
					console.log("No Announcement");
				} else if (data.count != "0" && data.count != old_count) {
					alert('You have a new announcement');
					window.localStorage['count'] = data.count;
					
					window.location.href="index_student.html";
				}
			},
			dataType: 'json'
		});
	},3000);
}

function clearData(news) {
	if (news) {
		$('#displayNews').html('');
	}
	$('#displayProf').html('');
	$('#displayRequirement').html('');
	$('#displayRequirementChecklist').html('');
	$('#displayApplication').html('');
	$('#displayFilter').html('');
	$('#displaySTProf').html('');
	$('#displayNewsDetail').html('');
}

function openURL(urlString) { 
	myURL = encodeURI(urlString);
	window.open(myURL, '_system', 'location=no');
}


