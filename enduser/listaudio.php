 <div class = "table-responsive">

 
     <?php if($audio){$ctr=1;?>
	<?php foreach($audio as $a){?>
    <div style="float:left; width:320; height:240;">
<audio controls>
 
  <source src="uploads/<?php echo $a['file'];?>" type="<?php echo $a['filetype']?>">
  <source src="uploads/<?php echo $a['file'];?>" type="audio/ogg">
  <source src="uploads/<?php echo $a['file'];?>" type="audio/mpeg">
Your browser does not support the audio element.

</audio><br/>
<a href="deletefile.php?id=<?php echo $d['filemediaid']; ?> " onclick = "return confirm('Are You Sure?')">DELETE</a>
<a href="uploads/<?php echo $a['file'];?>" download>DOWNLOAD</a>
    </div>
     <?php }}
else {
$message="No Audio/Record";
}?> 

<div> <?php echo $message;?> </div>
 </div>
<script>
$(document).ready(function(){
    $('#myTable').dataTable();
});
</script>