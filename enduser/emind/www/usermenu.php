<?php
	session_start();
	include_once('userfunction.php');
	//include_once('agencyfunction.php');
	$userId = $_SESSION['userid'];
	if(isset($_SESSION['userLogin'])){
	   $info = user($userId);
	   $list = listprocess($userId);
	   $agency = agency();
	   
	   
	 
	 
	 }
	 else{
		include_once("location:login.html");
	 }
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<title>EndInMind</title>
	<link type="text/css" rel="stylesheet" href="css/style.css"/>
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
	
	<link type="text/css" rel="stylesheet" href="colors/corporate/corporate.css"/>
	<link type="text/css" rel="stylesheet" href="css/idangerous.swiper.css"/>
	<link type="text/css" rel="stylesheet" href="css/swipebox.css"/>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'/>
	<script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	
	<script type="text/javascript" src="cordova.js"></script>
	<script type="text/javascript" src="js/base.js"></script>
	<script src="js/jquery.validate.min.js" type="text/javascript"></script>
	<script type="text/javascript">
			app.initialize();
			back.initialize();
	</script>
	<style>
		div#divList{
				 padding :4%;
				 background-color:#428bca;
				 border-color:#357ebd;
		}
		div#divList:hover{
				 padding :4%;
				 
				 background:blue;
		 
		}
		b#boldName{
				font-size:20px;
		}
		.modal{ /* Edited classname 10/03/2014 */
			margin: 0;
			position: absolute;
			top: 10%;
			left: 2%;
		}
	
	</style>
	
	
	
</head>
<body>
  <div id="header">
      <div class="gohome radius20"><a href="#"><img src="images/icons/home.png" alt="" title="" /></a></div>
	  <div class="gomenu radius20"><a href="#" onclick="removeUser();"><img src="images/icons/tools.png" alt="" title="" /></a></div>
  </div>
  <div class="swiper-container swiper-parent">
    <div class="swiper-wrapper">
      <!--Menu page-->
      <div class="swiper-slide sliderbg_menu">
          <div id="swiper-nested0" class="swiper-container swiper-nested">
			   <div class="swiper-wrapper">
					<div class="swiper-slide">
						<div class="slide-inner">
							<div class="logo"><a href="#"><b>EndInMind</b></a></div>
							<div class="slogan"></div>
							<div class="menu">
								<ul>
<li><a href="javascript:menu(0);"><img src="images/icons/about.png" alt="" title="" /><span>My Profile</span></a></li>
									<li><a href="javascript:menu(1);"><img src="images/icons/law.png" alt="" title="" /><span>My Process</span></a></li>
									<li><a href="javascript:menu(2);"><img src="images/icons/code.png" alt="" title="" /><span>Subscription</span></a></li>
									<li><a href="javascript:menu(3);"><img src="images/icons/docs.png" alt="" title="" /><span>Create Process</span></a></li>
									<li><a href="javascript:menu(4);" onclick = "agencyList()"><img src="images/icons/docs.png" alt="" title="" /><span>Download Process</span></a></li>
                                    <li><a href="javascript:menu(5);"><img src="images/icons/light.png" alt="" title="" /><span>Notification</span></a></li>
  									
                                    
                                    
								
								<!--<li><a href='#' onclick='openURL("http://www.facebook.com/ojtapcom")'><img src="images/icons/social/facebook.png" /><span>Facebook</span></a></li>
									<li><a href='#' onclick='openURL("http://www.youtube.com")'><img src="images/icons/social/youtube.png" /><span>Youtube</span></a></li>
									<li><a href='#' onclick='openURL("http://www.twitter.com")'><img src="images/icons/social/twitter.png"  /><span>Twitter</span></a></li>
									<li><a href='#' onclick='removeUser();'><img src="images/icons/tools.png"  /><span>Logout</span></a></li> -->
								</ul>
							<div class="clearfix"></div>
							</div>
						</div>
					</div>
			   </div>
			  <div class="swiper-scrollbar"></div>
          </div> 
      </div>
      <!--Page 1 content-->
      <div class="swiper-slide sliderbg">
		<div id="swiper-nested1" class="swiper-container swiper-nested">
			<div class="swiper-wrapper">
				<div class="swiper-slide">
					<div class="slide-inner">
						<div class="pages_container">
						<h2 class="page_title">My Profiles</h2><hr />
						<div id="displayProfile">
							<div class="image_single"><img class = "img img-circle" width = "200px" height = "200px" src = "../../files/<?php echo $info['image'];?>" alt="" title="" border="0" /></div>
							<div class="image_caption blue blue_borderbottom"><?php echo $info['firstname'] . ' ' . $info['mi'] . ' ' . $info['lastname'];  ?></div>
							<ul class="responsive_table">
							<li class="table_row">
								<div style="text-align: center;">Personal Information</div>
							</li>
							<li class="table_row">
								<div class="table_section">Address:</div>
								<div class="table_section"><?php echo $info['address'];?></div>
							</li>
							<li class="table_row">
								<div class="table_section">Birthdate:</div>
								<div class="table_section"><?php echo $info['bdate'];?></div>
							</li>
							<li class="table_row">
								<div class="table_section">Email: </div>
								<div class="table_section"><?php echo $info['email'];?></div>
							</li>
							<li class="table_row">
								<div class="table_section">Contact No.: </div>
								<div class="table_section"><?php echo $info['contactno'];?></div>
							</li>
							
						</div> <hr /><br />		
						
				<div class="clearfix"></div>
						<div id="scrolltop1" class="scrolltop radius20"><a href="#"><img src="images/icons/top.png" alt="Go on top" title="Go on top" /></a></div>
						</div>
					</div>
				</div>
			</div>
			<div class="swiper-scrollbar"></div>
		</div>
     </div>
      
      <!--Page 2 content-->
	<div class="swiper-slide sliderbg">
      <div id="swiper-nested2" class="swiper-container swiper-nested">
			<div class="swiper-wrapper">
				<div class="swiper-slide">
					<div class="slide-inner">
						<div class="pages_container">
							<h2 class="page_title">My Process</h2><hr />
							<div id="displayProcess"></div><hr />	
								<div class="login-form">
								  <div class = "menu" >
			
				 
			
									<?php if($list): ?>
												
										<?php foreach($list as $rows):  ?>
													<div id = "divList" data-toggle="modal" data-target = "#modalContextMenu" onclick = "alert('pagsure oid')">	
														<b id = "boldName"><?php echo $rows['processname']; ?></b>
													</div>
												<hr/>
										<?php  endforeach; ?>	
								      	<!--<input type="submit" name="submit" value="Post"  class="form_submit radius4 green green_borderbottom"> onclick="postAnnounce();"/> -->
									     
													
									<?php else: ?>
											<div id = "divListEmpty" onclick = "alert('pagsure oid')">	
														<b id = "boldName">No Entry of Process Yet!!!</b>
											</div>
									<?php endif; ?>
										</div>
								</div>		
									
						<div class="clearfix"></div> 
						<div id="scrolltop2" class="scrolltop radius20"><a href="#"><img src="images/icons/top.png" alt="Go on top" title="Go on top" /></a></div> 
						</div>
					</div>
				</div>
			</div>
			 <div class="swiper-scrollbar"></div>
     </div>
	</div>
     
      <!--Page 3 content-->
	<div class="swiper-slide sliderbg">
		<div id="swiper-nested3" class="swiper-container swiper-nested">
			<div class="swiper-wrapper">
				<div class="swiper-slide">
					<div class="slide-inner">
						<div class="pages_container">
							<h2 class="page_title">Post Announcement</h2> <hr />
							<div class="form">
								<div id="login-form">
									<label>Title:</label>
									<input type="text" name="title" id="title" value="" class="form_input required" />
									<label>Message:</label>
									<textarea name="message" id="message" class="form_textarea textarea required" rows="" cols=""></textarea>
									<br /><br />
									<input type="submit" name="submit" value="Post" class="form_submit radius4 green green_borderbottom" onclick="postAnnounce();"/>
									<br /><br /><hr />
								</div>
							</div>
							<div class="clearfix"></div>
							<div id="scrolltop3" class="scrolltop radius20"><a href="#"><img src="images/icons/top.png" alt="Go on top" title="Go on top" /></a></div>
						</div>
					</div>
				</div>
			</div>
			<div class="swiper-scrollbar"></div>
		</div>
	</div>
	 
	<div class="swiper-slide sliderbg">
		<div id="swiper-nested4" class="swiper-container swiper-nested">
			<div class="swiper-wrapper">
				<div class="swiper-slide">
					<div class="slide-inner">
						<div class="pages_container">
							<h2 class="page_title">Practicum</h2><hr /><br/>
							<div class="toogle_wrap radius8">
									<div class="trigger">
										<a href="#">Filter</a>
									</div>
									<div class="toggle_container">
										<ul class="listing_detailed">
											<li><a href="javascript:dispStudentFilter(0);">Practicum</a></li>
											<li><a href="javascript:dispStudentFilter(1);">Students</a></li>
										</ul>
									</div>				
							</div><br />
							<div id="displayFilter"></div>
							<hr /><br />			
							<div class="clearfix"></div>
							<div id="scrolltop4" class="scrolltop radius20"><a href="#"><img src="images/icons/top.png" alt="Go on top" title="Go on top" /></a></div>
						</div>
					</div>
				</div>
			</div>
			<div class="swiper-scrollbar"></div>
		</div>
	</div>    
	  <!--Page 2 content-->
	<div class="swiper-slide sliderbg">
      <div id="swiper-nested5" class="swiper-container swiper-nested">
			<div class="swiper-wrapper">
				<div class="swiper-slide">
					<div class="slide-inner">
						<div class="pages_container">
							<h2 class="page_title">Download Process</h2><hr />
							<div id="displayAgency"></div><hr /><br />	
							<div class="login-form">
								  <div id = "divDownload" class = "menu" >
									
								  </div>
								</div>
							
							
							
							
							
							<div class="clearfix"></div>
							<div id="scrolltop2" class="scrolltop radius20"><a href="#"><img src="images/icons/top.png" alt="Go on top" title="Go on top" /></a></div>
						</div>
					</div>
				</div>
			</div>
			<div class="swiper-scrollbar"></div>
     </div>
	</div>
    



	<!--End of pages--> 
	 
	<div class="swiper-slide sliderbg">
		<div id="swiper-nested5" class="swiper-container swiper-nested">
			<div class="swiper-wrapper">
				<div class="swiper-slide">
					<div class="slide-inner">
						<div class="pages_container">
							<h2 class="page_title">Student</h2><hr /><br/>
							<div id="displaySTProf"></div> 
							<br />
							<ul class="responsive_table">
								 <li class="table_row">
									<div style="text-align: center;">Application</div>
								 </li>
								 <li class="table_row">
									<div class="table_section">Job</div>
									<div class="table_section">Company</div> 
									<div class="table_section_small">Status</div> 
								 </li>
								 <li id="displayStApp" class="table_row">
								
								 </li>
							</ul>
							<br />
							<ul class="responsive_table">
								 <li class="table_row">
									<div style="text-align: center;">Requirement</div>
								 </li>
								 <li class="table_row">
									<div class="table_section">Title</div>
									<div class="table_section">Upload Date</div>
									<div class="table_section_small">Checklist</div> 
									
								 </li>
								 <li id="displayStReq" class="table_row">
								
								 </li>
							</ul>
							<hr />			
							<br />			
							<div class="clearfix"></div>
							<div id="scrolltop5" class="scrolltop radius20"><a href="#"><img src="images/icons/top.png" alt="Go on top" title="Go on top" /></a></div>
						</div>
					</div>
				</div>
			</div>
			<div class="swiper-scrollbar"></div>
		</div>
	</div>   
	 
	<div class="swiper-slide sliderbg">
		<div id="swiper-nested6" class="swiper-container swiper-nested">
			<div class="swiper-wrapper">
				<div class="swiper-slide">
					<div class="slide-inner">
						<div class="pages_container">
							<div id> </div> <br />
							<div id="displayNewsDetail"></div><hr /><br/>		
							<div class="clearfix"></div>
							<div id="scrolltop6" class="scrolltop radius20"><a href="#"><img src="images/icons/top.png" alt="Go on top" title="Go on top" /></a></div>
						</div>
					</div>
				</div>
			</div>
			<div class="swiper-scrollbar"></div>
		</div>
	</div> 
    </div>
    <div class="pagination"></div>
  </div>
  
  
  
  
  
  	<!--- START OF MODAL -->
	<div class="modal fade" id="modalContextMenu" role="dialog">
	<div class="modal-dialog">
    
      <!-- Modal content-->
	  
      <div class="modal-content" style = "width:100%;">
   <!--     <div class="modal-header"> 
		  <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h6 class="modal-title"><b style = "font-size:20px;">Menu</b></h6>
        </div> -->
        <div class="modal-body"> 
		<!-- style = "max-height: 400px;overflow-y: scroll;" -->
		<div class = "row">	
				<hr/>
				<input type="submit" name="submit" value="Post" class="form_submit radius4 green green_borderbottom" onclick="postAnnounce();"/>
				<hr/>
				<input type="submit" name="submit" value="Post" class="form_submit radius4 green green_borderbottom" onclick="postAnnounce();"/>
				<hr/>
								
        </div> <!-- end of row -->
        </div>
	 </div>
      
    </div>
	<!-- END OF MODAL -->
  
  
  
  
  
  
  
  
  
  
  <!-- END OF MODAL -->
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
	<script type="text/javascript" src="js/jquery.swipebox.js"></script>
	<script type="text/javascript" src="js/idangerous.swiper-2.1.min.js"></script>
	<script type="text/javascript" src="js/idangerous.swiper.scrollbar-2.1.js"></script>
	<script type="text/javascript" src="js/jquery.tabify.js"></script>
	<script type="text/javascript" src="js/jquery.fitvids.js"></script>
	<script type="text/javascript" charset="utf-8">
		var $ = jQuery.noConflict();  

		var swiperParent = new Swiper('.swiper-parent', {
			pagination: '.pagination',
			paginationClickable: false,
			onSlideChangeEnd : function() {
				if (swiperParent.activeIndex != 0) {
					$('#header').animate({'top':'0px'}, 400);
					menu(swiperParent.activeIndex - 1);
				}
				if (swiperParent.activeIndex == 0) {
					$('#header').animate({'top':'-100px'}, 400);
				}
			}
		});
		var swiperNested0 = new Swiper('#swiper-nested0', {
			mode:'vertical',
			scrollContainer: true
		});
		
		var swiperNested1 = new Swiper('#swiper-nested1', {
			mode:'vertical',
			scrollContainer: true,
			scrollbar: {
				container:$(this).find('.swiper-scrollbar')[1]
			}
		});
		var swiperNested2 = new Swiper('#swiper-nested2', {
			mode:'vertical',
			scrollContainer: true,
			scrollbar: {
				container:$(this).find('.swiper-scrollbar')[1]
			}
		});
		var swiperNested3 = new Swiper('#swiper-nested3', {
			mode:'vertical',
			scrollContainer: true,
			scrollbar: {
				container:$(this).find('.swiper-scrollbar')[1]
			}
		});
		var swiperNested4 = new Swiper('#swiper-nested4', {
			mode:'vertical',
			scrollContainer: true,
			scrollbar: {
				container:$(this).find('.swiper-scrollbar')[1]
			}
		});
		var swiperNested5 = new Swiper('#swiper-nested5', {
			mode:'vertical',
			scrollContainer: true,
			scrollbar: {
				container:$(this).find('.swiper-scrollbar')[1]
			}
		});
		var swiperNested6 = new Swiper('#swiper-nested6', {
			mode:'vertical',
			scrollContainer: true,
			scrollbar: {
				container:$(this).find('.swiper-scrollbar')[1]
			}
		});

		function menu(i) {
			switch (i) {
				case 0 : swiperNested1.reInit(); break;
				case 1 : swiperNested2.reInit(); break;
				case 2 : swiperNested3.reInit(); break;
				case 3 : swiperNested4.reInit(); break;
				case 4 : swiperNested5.reInit(); break;
				case 5 : swiperNested6.reInit(); break;
				default : break;
			}
			swiperParent.swipeTo(i+1);
		}
		
		//amoang function
		
	    function agencyList(){
		
				var url = 'agencyprocess.php?role=agencylist';
				loadContent(url);
			}	
         
		function getProcess(id){
			var id = id;
			var url = "agencyprocess.php?role=processlist&agencyid=" + id;	
		    loadContent(url);
		  }
		function loadContent(url){
			var url = url;
			
			$.ajax({
				type : "POST",
				url : url,
				success: function(data){
					$('#divDownload').html(data);
				}
			});
		}
		
		
		
		
		
		
	</script>
	
	<script type="text/javascript" src="js/load.js"></script>
</body>
</html>