
   <!-- Page Heading -->
      <br/>
                <div class="row">
                    <div class="col-lg-12">
                        <div class = "well">
							<h1 style = "color:#eb477d;text-shadow: 3px 1px 2px #999">
								Personal Process
								<!-- <small>Statistics Overview</small> -->
							</h1>
                        </div>
                    </div>
                </div>
                <!-- /.row -->



<br/>
<!-------->
<div class = "row">
  <div class = "col-lg-12">
   	
	<ul id="tabs" class="nav nav-tabs" style = "box-shadow:1px 3px 5px #999;" data-tabs="tabs">
		<li class="active"><a href="#red" data-toggle="tab"><b style = "color:#eb477d">Pending Process</b></a></li>
        <li><a href="#orange" data-toggle="tab"><b style = "color:#eb477d">Completed Process</b></a></li>
        <li><a href="#yellow" data-toggle="tab"><b style = "color:#eb477d">Deleted Process</b></a></li>
        
    </ul>
   
    <div id="my-tab-content" class="tab-content">
        <div class="tab-pane active" id="red">
            <h3>Pending Process</h3>
            <?php include('pending_table.php');  ?>
			
        </div>
        <div class="tab-pane" id="orange">
            <h3>Completed Process</h3>
            <p>orange orange orange orange orange</p>
			
        </div>
        <div class="tab-pane" id="yellow">
            <h3>Yellow</h3>
            <p>yellow yellow yellow yellow yellow</p>
        </div>
        <div class="tab-pane" id="green">
            <h3>Green</h3>
            <p>green green green green green</p>
        </div>
        <div class="tab-pane" id="blue">
            <h1>Blue</h1>
            <p>blue blue blue blue blue</p>
        </div>
    </div>
  </div>
</div>


<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $('#tabs').tab();
    });
</script>    



<script type="text/javascript" src="js/bootstrap.js"></script>

