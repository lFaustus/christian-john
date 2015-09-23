 <div class = "table-responsive">

 
     <?php if($video){$ctr=1;?>
	<?php foreach($video as $v){?>
    <div style="float:left; width:320; height:240;">

<video id="sampleMovie" width="320" height="240" preload controls>
	<source src="uploads/<?php echo $v['file'];?>" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"' />
	<source src="uploads/<?php echo $v['file'];?>" type='video/ogg; codecs="theora, vorbis"' />
	<source src="uploads/<?php echo $v['file'];?>" type='video/webm; codecs="vp8, vorbis"' />
	<object type="application/x-shockwave-flash" data="http://releases.flowplayer.org/swf/flowplayer-3.2.1.swf" width="640" height="360">
		<param name="movie" value="http://releases.flowplayer.org/swf/flowplayer-3.2.1.swf" />
		<param name="allowFullScreen" value="true" />
		<param name="wmode" value="transparent" />
		<param name="flashvars" value='config={"clip":{"url":"HTML5Sample_flv.flv","autoPlay":false,"autoBuffering":true}}' />
	</object>
    
</video>
    <br/>
    <a href="deletefile.php?id=<?php echo $v['filemediaid']; ?> " onclick = "return confirm('Are You Sure?')">DELETE</a>

    <a href="uploads/<?php echo $v['file'];?>" download>DOWNLOAD</a>
    </div>
     <?php }}
else {
$message="No Video";
}?> 

<div> <?php echo $message;?> </div>
 </div>
<script>
$(document).ready(function(){
    $('#myTable').dataTable();
});
</script>