<?php
session_start();
$prev 	=	$_SESSION['total_result'];
$j=$prev;	// 21
$count=	$j+20;	//	41
	
	for($j==$j+1;$j<$count;$j++){	//	21 to 41
		?>
		<div class="panel panel-default col-lg-5 col-md-5 col-sm-12 col-xs-12" style="margin:10px">
			<h2><?php echo $j;?> Some Awesome heading </h2>
			<img src="http://placehold.it/600x600/1abc9c/fff/?text=<?php echo rand();?>" width="100%" class="img-rounded">
		</div>
		<?php
	}
	$_SESSION['total_result']	=$count;		//41
?>