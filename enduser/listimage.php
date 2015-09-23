 <div class = "table-responsive">

 
     <?php if($image){?>
     <?php foreach($image as $i){?>
	<div style="float:left; width:100px; height:100px; border:1;"><a href="uploads/<?php echo $i['file'];?>" target="_blank"><img src="uploads/<?php echo $i['file'];?>" style="width:100px; height:80px;"><br/>
   <a href="deletefile.php?id=<?php echo $i['filemediaid']; ?> " onclick = "return confirm('Are You Sure?')">DELETE</a>
<a href="uploads/<?php echo $i['file'];?>" download>DOWNLOAD</a>
    </div>
     <?php }}
else {
$message="No IMAGE";
}?> 

<div> <?php echo $message;?> </div>
 </div>
<script>
$(document).ready(function(){
    $('#myTable').dataTable();
});
</script>