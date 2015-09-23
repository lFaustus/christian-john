

 <div class = "table-responsive">
 <a href="listprocess.php" class="btn btn-default btn-fab btn-raised mdi-hardware-keyboard-backspace"></a>
 <button class="btn btn-fab btn-info mdi-content-add" data-toggle="modal" data-target="#modal"></button>
 
     <?php if($step){$ctr=1;?>
	<table id="myTable" class = "table table-striped table-hover">  
			<thead>  
          <tr>  
<th>&nbsp;</th>
<th>Step No</th>
<th>Step Description</th>
<th>Created On</th>
<th>Manage</th>
		  </tr>  
        </thead>  
        <tbody>  
        <?php foreach($step as $s){?>
<tr>
<td>
<a href="updatestep.php?id=<?php echo $s['stepid']; ?>&pid=<?php echo $pid; ?>">UPDATE</a>
<a href="deletestep.php?id=<?php echo $s['stepid']; ?>&pid=<?php echo $pid; ?> " onclick = "return confirm('Are You Sure!')">DELETE</a>
</td>
<td><?php echo $ctr;?></td>
<td><?php echo htmlentities($s['stepdesc']);?></td>
<td><?php echo htmlentities($s['createon']);?></td>
<td><a href="liststeprequired.php?id=<?php echo $s['stepid'];?>&pid=<?php echo $pid;?>">Requirement</a>&nbsp;&nbsp;<a href="listrequisite.php?id=<?php echo $s['stepid'];?>&pid=<?php echo $pid;?>">Requisite</a>&nbsp;&nbsp;<a href="listsubsteps.php?id=<?php echo $s['stepid'];?>&pid=<?php echo $pid;?>">Substeps</a></td>
</tr><?php $ctr++;}?>  
        </tbody>  
      </table>  
     <?php }
else {
$message="No STEPS";
}?> 

<div> <?php echo $message;?> </div>
 </div>
<script>
$(document).ready(function(){
    $('#myTable').dataTable();
});
</script>