<?php 
session_start();
$_SESSION['total_result']	=	20;

?>
<!DOCTYPE html>
<html>
<head>
	<title>Checking</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
<div class="container">
<h1 class="text-center">Infinite Scrolling Demo</h1>
	<?php
	$i=0;
	for($i==0;$i<20;$i++){
		?>
		<div class="panel panel-default col-lg-5 col-md-5 col-sm-12 col-xs-12 posts" style="margin:10px">
			<h2><?php echo $i;?> Some Awesome heading </h2>
			<img src="http://placehold.it/600x600/1abc9c/fff/?text=<?php echo rand();?>" width="100%" class="img-rounded">

		</div>
		<?php
	}
	?>
	
</div>
<div class="clearfix"></div>
	<div id="check_visible" class="text-center">
		Load more...
	</div>

<script type="text/javascript">
$( window ).scroll(function() {

  if(isScrolledIntoView(check_visible)==true){
		  	$.ajax({ type: "GET",   
		     url: "ajax.php",   
		     success : function(html)
		     {
		         $('.container').append(html);
		        
		     }
		});
	}
});




function isScrolledIntoView(el) {
    var elemTop = el.getBoundingClientRect().top;
    var elemBottom = el.getBoundingClientRect().bottom;

    var isVisible = (elemTop >= 0) && (elemBottom <= window.innerHeight);
    return isVisible;
}
</script>
</body>
</html>