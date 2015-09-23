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
var pushNotification;
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
	onNotificationGCM: function(e) {
		switch(e.event) {
			case 'registered':
				if (e.regid.length > 0) {
				    $.post('http://smeagenglish.com/app/regid.php', {'uuid':device.uuid, 'regid':e.regid, 'platform':device.platform});
					console.log('Regid = ' + e.regid + ' \nDevice ID = ' + device.uuid + ' \nPlatform = ' + device.platform);
				}
				break;
			case 'message':
				console.log('message = '+e.message+'msgcnt ='+e.msgcnt);
				break;
			case 'error':
				console.log('GCM error = '+e.msg);
				break;
			default:
				console.log('An unknown GCM event has occured');
				break;
		}
	},
    onDeviceReady: function() {
		console.log('Device ready');

		pushNotification = window.plugins.pushNotification;
		pushNotification.register(app.successHandler, app.errorHandler,
		{'senderID':'952376294927', 'ecb':'app.onNotificationGCM'});

		navigator.splashscreen.hide();
	}
};

// Back Button
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
	var passport = $('#passport').val();
	var url = 'http://smeagenglish.com/app/member.php';

	$.ajax({
		type: 'GET',
		url: url,
		data: {mb: passport},
		success: function(data, textStatus){
			if (data.name === '' || data.name === null) {
				alert('Wrong passport number!');
			} else {
				window.localStorage['passport'] = passport;
				alert("Welcome, " + data.name);
				window.localStorage['name'] = data.name;
				
				checkSession();
			}
		},
		error: function(data, textStatus){
			alert('A problem occured! Please check your internet connection.');
		},
		dataType: 'json'
	});
}

function checkSession() {
	var user = window.localStorage.getItem('passport');

	clearData(true);
	dispAnnounce();
	if (user != undefined || user != null || user.length != 0) {
		$('#login-form').hide();
		$('#user-data').show();

		dispAtData();
		dispSAData();
		dispCoData();
		dispWaData();
		dispTestResult(0);
	}
} 

function removeUser() {
	var user = window.localStorage.getItem('passport');

	if (user != undefined || user != null) {
		window.localStorage.removeItem('passport');
		$('#login-form').show();
		$('#user-data').hide();
		clearData(false);

		alert('Logout Successfully!');
	} 
}

function clearData(news) {
	if (news) {
		$('#displayNews').html('');
	}
	$('#displayAttendance').html('');
	$('#displayTeacher').html('');
	$('#displayComment').html('');
	$('#displayWarning').html('');
	$('#displayTEScore').html('');
}

// open website from native mobile browser (external)
function openURL(urlString) { 
	myURL = encodeURI(urlString);
	window.open(myURL, '_system', 'location=no');
}

function dispTestResult(idx) {
	$('#displayTEScore').html('');

	switch (idx) {
		case 0 :
			dispTEData(false);
			dispTOData(false);
			dispTFData(false);
			dispIEData(false);
			break;
		case 1 :
			dispTEData(true);
			break;
		case 2 :
			dispTOData(true);
			break;
		case 3 :
			dispTFData(true);
			break;
		case 4 :
			dispIEData(true);
			break;
	}
}

//	Announcement
function dispAnnounce() {
	$.getJSON('http://smeagenglish.com/app/announce.php', function(data) {
		$.each(data, function(index, item) {
			if (item.regdate == '' || item.regdate == undefined || item.regdate == null) {
				console.log('Empty data');
			} else {
				var announce = '<div class="news" style="text-align: justify;">';
				announce += '<h3>' + item.title + '</h3>';
				announce += '<p style="float:right; text-decoration:underline; color:#acacac; font-style:italic;">' + item.regdate + '</p>';
				announce += '<br style="clear:both;" />';
				
				if (item.image != '') {
					announce += '<div class="image_single radius4"><img src="' + item.image + '" /></div>';
				}
				
				announce += '<p class="darkgray_borderbottom">' + item.content + '<br /></p>';
				announce += '</div>';
				
				$('#displayNews').append(announce);
			}
		});
	});
}

//	Attendance
function dispAtData() {
	var user = window.localStorage.getItem('passport');

	$.getJSON('http://smeagenglish.com/app/attendance.php?mb='+user, function(data) {
		$.each(data, function(i, item) {
			var atDif = parseFloat(item.class) - parseFloat(item.absence);
			var value = (atDif / parseFloat(item.class)) * 100;
			var res = value.toFixed(0);
			var resPercentage = res + "%";

			if (item.week == '' || item.class == '0') {
				console.log('Empty data');
			} else {
				var attendance = '<li class="post">';
				
				if (res > 90) {
					attendance += '<a href="#" class="post_check"></a>';
				} else {
					attendance += '<a href="#" class="post_more"></a>';
				}
				
				attendance += '<div class="post_right_reveal">';
				attendance += '<h2><a href="#">' + resPercentage + '</a></h2>';
				attendance += 'Classes : ' + item.class + ', Absences : ' + item.absence;
				attendance += '</div>';
				attendance += '<div class="post_left">';
				attendance += '<span class="day">' + numbers(item.week) + '</span>';
				attendance += '<span class="month">week</span>';
				attendance += '</div>';
				attendance += '</li>';

				$('#displayAttendance').append(attendance);
			}
		});
	});
}

//	S.A Teacher
function dispSAData(user) {
	var user = window.localStorage.getItem('passport');

	$.getJSON('http://smeagenglish.com/app/sateacher.php?mb='+user, function(data) {
		$.each(data, function(i, item) {
			if (item.name == '') {
				console.log('Empty data');
			} else {
				var teacher = '<div class="portfolio_image_round">';
				
				if (item.photo == '') {
					teacher += '<img src="http://smeagenglish.com/smeadmin/staff/print/id-card/photo/teacher/no-img.png" alt="teacher"/>';
				} else {
					teacher += '<img src="http://smeagenglish.com/smeadmin/staff/print/id-card/photo/teacher/' + item.photo + '" alt="teacher"/>';
				}
				
				teacher += '</div>';
				teacher += '<div class="portfolio_details"><h4>' + item.name + '</h4><p>' + item.position + '</p></div>';
				teacher += '<div class="clearfix"></div>';

				$('#displayTeacher').append(teacher);
			}
		});
	});
}

//	Comment
function dispCoData() {
	var user = window.localStorage.getItem('passport');

	$.getJSON('http://smeagenglish.com/app/comment.php?mb='+user, function(data) {
		$.each(data, function(i, item) {
			if (item.comment == '' || item.date == '') {
				console.log('Empty data');
			} else {
			var comment = '<br />';
				comment += '<div class="portfolio_item radius8">';
				
				if (item.health == 'Sick') {
					comment += '<div class="portfolio_image_round"><img src="images/icons/sick.png" alt="" title="" border="0" /></div>';
				} else {
					comment += '<div class="portfolio_image_round"><img src="images/icons/good.png" alt="" title="" border="0" /></div>';
				}
				
				comment += '<div class="portfolio_details" style="text-align: justify;">';
				comment += '<p>' + item.comment + '</p>';
				comment += '<p style="float:right; text-decoration:underline; color:#acacac; font-style:italic;">' + item.date + '</p>';
				comment += '<br style="clear:both;" />';
				comment += '</div>';
				comment += '</div>';

				$('#displayComment').append(comment);
			}
		});
	});
}

//	Warning
function dispWaData() {
	var user = window.localStorage.getItem('passport');

	$.getJSON('http://smeagenglish.com/app/warning.php?mb='+user, function(data) {
		var warning = '';
		var sum = 0;
		var update = '????-??-??';
		$.each(data, function(i, item) {
			if (item.type == '' || item.reason == '' || item.date == '') {
				console.log('Empty data');
			} else {
				warning += '<div class="portfolio_item radius8">';
				
				if (item.type == 'Admin') {
					warning += '<div class="portfolio_image"><img src="images/icons/admin.png" alt="" title="" border="0" /></div>';
				} else {
					warning += '<div class="portfolio_image"><img src="images/icons/academic.png" alt="" title="" border="0" /></div>';
				}
				
				warning += '<div class="portfolio_details">';
				warning += '<h4>' + item.point + ' point(s)</h4>';
				warning += '<p>' + item.reason + '</p>';
				warning += '<p style="float:right; text-decoration:underline; color:#acacac; font-style:italic;">' + item.date + '</p>';
				warning += '<br style="clear:both;" />';
				warning += '</div>';
				warning += '</div>';

				var point = parseFloat(item.point);
				sum += point;
				update = item.update;
			}
		});
		
		if (sum == 0) {
			$('#displayWarning').append('<h2>Wow~. You don\'n have warning.</h2>');
		} else {
			$('#displayWarning').append('<h2>You have ' + sum + ' warning(s).</h2>');
		}

		$('#displayWarning').append(warning);
		$('#displayWarning').append('<p style="font-style:italic;">Last update ' + update + '.<br />It might not included your latest warning.</p>');
	});
}

//	Progress Test
function dispTEData(show_nodata) {
	var user = window.localStorage.getItem('passport');

	$.getJSON('http://smeagenglish.com/app/score.php?mb='+user+'&ca=Progress%20Test', function(data) {
		var te = '';
		$.each(data, function(i, item) {
			if (item.name == '' || item.date == '') {
				console.log('Empty data');
			} else {
				var level = ["1L", "1M", "1H", "2L", "2M", "2H", "3L", "3M", "3H", "4L", "4M", "4H", "5L", "5M", "5H", "6"];
				var total = teProgress(item.part1) + teProgress(item.part2) + teProgress(item.part3) + teProgress(item.part4);

				te += '<h3>' + item.name + '</h3>';
				te += '<table width="100%"><tr><td width="70%" valign="top">';
				te += '<div class="bar">';
				te += '    <div class="percentage-red" style="min-width:100px; width:' + (teProgress(item.part1)/16*100) + '%"> &nbsp; Listening ' + level[teProgress(item.part1)-1] + '</div>';
				te += '</div>';
				te += '<div class="bar">';
				te += '    <div class="percentage-green" style="min-width:100px; width:' + (teProgress(item.part2)/16*100) + '%"> &nbsp; Reading ' + level[teProgress(item.part2)-1] + '</div>';
				te += '</div>';
				te += '<div class="bar">';
				te += '    <div class="percentage-blue" style="min-width:100px; width:' + (teProgress(item.part3)/16*100) + '%"> &nbsp; Speaking ' + level[teProgress(item.part3)-1] + '</div>';
				te += '</div>';
				te += '<div class="bar">';
				te += '    <div class="percentage-gray" style="min-width:100px; width:' + (teProgress(item.part4)/16*100) + '%"> &nbsp; Writing ' + level[teProgress(item.part4)-1] + '</div>';
				te += '</div>';
				te += '</td><td width="30%" style="border:1px dotted #ccc; text-align: center; vertical-align: middle;"><span style="font-size:24pt; font-weight:bold;">' + level[parseInt(total/4)] + '</span></td></tr></table>';
				te += '<p style="float:right; text-decoration:underline; color:#acacac; font-style:italic;">' + item.date + '</p>';
				te += '<p class="darkgray_borderbottom" style="clear:both;" /></p>';
			}
		});
		
		if (te == '' && show_nodata) {
			te = '<p style="font-style:italic;">You did\'t attend any Progress Test yet.</p>';
		}
		
		$('#displayTEScore').append(te);
	});	
}

//	IELTS
function dispIEData(show_nodata) {
	var user = window.localStorage.getItem('passport');

	$.getJSON('http://smeagenglish.com/app/score.php?mb='+user+'&ca=IELTS', function(data) {
		var te = '';
		$.each(data, function(i, item) {
			if (item.name == '' || item.date == '') {
				console.log('Empty data');
			} else {
				var total = parseFloat(item.part1) + parseFloat(item.part2) + parseFloat(item.part3) + parseFloat(item.part4);
				te += '<h3>' + item.name + '</h3>';
				te += '<table width="100%"><tr><td width="70%" valign="top">';
				te += '<div class="bar">';
				te += '    <div class="percentage-red" style="min-width:100px; width:' + ((item.part1/9)*100) + '%"> &nbsp; Listening ' + item.part1 + '</div>';
				te += '</div>';
				te += '<div class="bar">';
				te += '    <div class="percentage-green" style="min-width:100px; width:' + ((item.part2/9)*100) + '%"> &nbsp; Reading ' + item.part2 + '</div>';
				te += '</div>';
				te += '<div class="bar">';
				te += '    <div class="percentage-blue" style="min-width:100px; width:' + ((item.part3/9)*100) + '%"> &nbsp; Speaking ' + item.part3 + '</div>';
				te += '</div>';
				te += '<div class="bar">';
				te += '    <div class="percentage-gray" style="min-width:100px; width:' + ((item.part4/9)*100) + '%"> &nbsp; Writing ' + item.part4 + '</div>';
				te += '</div>';
				te += '</td><td width="30%" style="border:1px dotted #ccc; text-align: center; vertical-align: middle;"><span style="font-size:24pt; font-weight:bold;">' + total + '</span></td></tr></table>';
				te += '<p style="float:right; text-decoration:underline; color:#acacac; font-style:italic;">' + item.date + '</p>';
				te += '<p class="darkgray_borderbottom" style="clear:both;" /></p>';
			}
		});
		
		if (te == '' && show_nodata) {
			te = '<p style="font-style:italic;">You did\'t attend any IELTS Test yet.</p>';
		}
		
		$('#displayTEScore').append(te);
	});
}

//	TOEIC
function dispTOData(show_nodata) {
	var user = window.localStorage.getItem('passport');

	$.getJSON('http://smeagenglish.com/app/score.php?mb='+user+'&ca=TOEIC', function(data) {
		var te = '';
		$.each(data, function(i, item) {
			if (item.name == '' || item.date == '') {
				console.log('Empty data');
			} else {
				sumListening = parseInt(item.part1) + parseInt(item.part2) + parseInt(item.part3) + parseInt(item.part4);
				sumReading = parseInt(item.part5) + parseInt(item.part6) + parseInt(item.part7);
				var total = sumListening + sumReading;
				te += '<h3>' + item.name + '</h3>';
				te += '<table width="100%"><tr><td width="70%" valign="top">';
				te += '<div class="bar">';
				te += '    <div class="percentage-red" style="min-width:100px; width:' + ((sumListening/495)*100) + '%"> &nbsp; Listening ' + sumListening + '</div>';
				te += '</div>';
				te += '<div class="bar">';
				te += '    <div class="percentage-green" style="min-width:100px; width:' + ((sumReading/495)*100) + '%"> &nbsp; Reading ' + sumReading + '</div>';
				te += '</div>';
				te += '</td><td width="30%" style="border:1px dotted #ccc; text-align: center; vertical-align: middle;"><span style="font-size:24pt; font-weight:bold;">' + total + '</span></td></tr></table>';
				te += '<p style="float:right; text-decoration:underline; color:#acacac; font-style:italic;">' + item.date + '</p>';
				te += '<p class="darkgray_borderbottom" style="clear:both;" /></p>';
			}
		});
		
		if (te == '' && show_nodata) {
			te = '<p style="font-style:italic;">You did\'t attend any TOEIC Test yet.</p>';
		}
		
		$('#displayTEScore').append(te);
	});
} 

//	TOEFL
function dispTFData(show_nodata) {
	var user = window.localStorage.getItem('passport');

	$.getJSON('http://smeagenglish.com/app/score.php?mb='+user+'&ca=TOEFL', function(data) {
		var te = '';
		$.each(data, function(i, item) {
			if (item.name == '' || item.date == '') {
				console.log('Empty data');
			} else {
				var total = parseInt(item.part1) + parseInt(item.part2) + parseInt(item.part3) + parseInt(item.part4);
				te += '<h3>' + item.name + '</h3>';
				te += '<table width="100%"><tr><td width="70%" valign="top">';
				te += '<div class="bar">';
				te += '    <div class="percentage-red" style="min-width:100px; width:' + ((item.part1/30)*100) + '%"> &nbsp; Listening ' + item.part1 + '</div>';
				te += '</div>';
				te += '<div class="bar">';
				te += '    <div class="percentage-green" style="min-width:100px; width:' + ((item.part2/30)*100) + '%"> &nbsp; Reading ' + item.part2 + '</div>';
				te += '</div>';
				te += '<div class="bar">';
				te += '    <div class="percentage-blue" style="min-width:100px; width:' + ((item.part3/30)*100) + '%"> &nbsp; Speaking ' + item.part3 + '</div>';
				te += '</div>';
				te += '<div class="bar">';
				te += '    <div class="percentage-gray" style="min-width:100px; width:' + ((item.part4/30)*100) + '%"> &nbsp; Writing ' + item.part4 + '</div>';
				te += '</div>';
				te += '</td><td width="30%" style="border:1px dotted #ccc; text-align: center; vertical-align: middle;"><span style="font-size:24pt; font-weight:bold;">' + total + '</span></td></tr></table>';
				te += '<p style="float:right; text-decoration:underline; color:#acacac; font-style:italic;">' + item.date + '</p>';
				te += '<p class="darkgray_borderbottom" style="clear:both;" /></p>';
			}
		});
		
		if (te == '' && show_nodata) {
			te = '<p style="font-style:italic;">You did\'t attend any TOEFL Test yet.</p>';
		}
		
		$('#displayTEScore').append(te);
	});
}

//	SMEAG Level
function teProgress(i) {
	var ret = 0;
	switch (i) {
		case '6' : ret++;
		case '5H' : ret++;
		case '5M' : ret++;
		case '5L' : ret++;
		case '4H' : ret++;
		case '4M' : ret++;
		case '4L' : ret++;
		case '3H' : ret++;
		case '3M' : ret++;
		case '3L' : ret++;
		case '2H' : ret++;
		case '2M' : ret++;
		case '2L' : ret++;
		case '1H' : ret++;
		case '1M' : ret++;
		case '1L' : ret++;
	}

	return ret;
}

//	To Ordinals
function numbers(i) {
	var j = i % 10,
        k = i % 100;
    if (j == 1 && k != 11) {
        return i + "st";
    }
    if (j == 2 && k != 12) {
        return i + "nd";
    }
    if (j == 3 && k != 13) {
        return i + "rd";
    }
    return i + "th";
}

//------------------------------

