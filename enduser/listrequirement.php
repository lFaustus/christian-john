<div class = "table-responsive">
<a href="addrequirement.php?pid=<?php echo $pid?>">ADD</a> || <a href="listprocess.php">Back to List Of Process</a>


  <?php if($requirement){?>
	<table id="myTable" class = "table table-striped table-hover">  
<thead>
<tr>
<th>&nbsp;</th>
<th>Requirement Name</th>
<th>Copy No.</th>
<th>Created On</th>
</tr>
</thead>
        <tbody>  
         <?php foreach($requirement as $r){?>
<tr>
<td>
<a href="updaterequirement.php?id=<?php echo $r['reqid']; ?>&pid=<?php echo $pid; ?>">UPDATE</a>
<a href="deleterequirement.php?id=<?php echo $r['reqid']; ?>&pid=<?php echo $pid; ?> " onclick = "return confirm('Are You Sure!')">DELETE</a>
</td>
<td><?php echo htmlentities($r['reqname']);?></td>
<td><?php echo htmlentities($r['copyno']);?></td>
<td><?php echo htmlentities($r['createdon']);?></td>
</tr>
<?php }?>  
        </tbody>  
      </table>  
<?php }
else {
$message="No REQUIREMENTS";
}?>
<div> <?php echo $message;?> </div>

 </div>
<script>
$(document).ready(function(){
    $('#myTable').dataTable();
});
</script>