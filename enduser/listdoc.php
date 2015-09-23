 <div class = "table-responsive">

 
     <?php if($doc){?>
	<table id="myTable" class = "table table-striped table-hover">  
			<thead>  
          <tr>  
<th>&nbsp;</th>
<th>File Name</th>

		  </tr>  
        </thead>  
        <tbody>  
        <?php foreach($doc as $d){?>
<tr>
<td>

<a href="deletefile.php?id=<?php echo $d['filemediaid']; ?> " onclick = "return confirm('Are You Sure?')">DELETE</a>
</td>
<td><a href="uploads/<?php echo $d['file'];?>" target='_blank' 
title="Click here to open a Word document">
<?php echo $d['file'];?></a></td>
</tr><?php }?>  
        </tbody>  
      </table>  
     <?php }
else {
$message="No Documents";
}?> 

<div> <?php echo $message;?> </div>
 </div>
<script>
$(document).ready(function(){
    $('#myTable').dataTable();
});
</script>