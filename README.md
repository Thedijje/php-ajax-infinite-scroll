# php-ajax-infinite-scroll
## A simple way to load dynamic content on the fly


### Introduction
PHP-AJAX infinite scroll is simple library to help you understand deciding way to create infinite scrolling based on dybamic content from your database.


### How it works
In our example, we have content in container class. We have placed an element with some content say please wait or loading with a id which we will check if its visible on windows scroll.
On windows scroll function if the element placed at last visible, we will fire our ajax function.

### Approach we have choosen
We have initially loaded 20 items say while page rendered first time. and we have also stored this 20 value in session.
On ajax call, we'll check the current session value and fetch 20 more item from database using limit (10,10).
Once we load 20 more item we'll update session value to 20+20 so that next time we'll provide 40 as offset value in limit while querying from database.

### Usage
This totally customised file and not ready to use as it is, but we have used concept here which i am going to explain one by one.

#### making an HTML element which will trigger last post reach
```
<div id="check_visible" class="text-center">
		Load more...
	</div>
```


#### Function to check if element is visible
this will ensure that user has reached at last item, we can also implement this to put it on higher position so that more posts are loaded in advance.

```
function isScrolledIntoView(el) {
	// Function to check if given element is in viewport of window or visible?
    var elemTop = el.getBoundingClientRect().top;
    var elemBottom = el.getBoundingClientRect().bottom;

    var isVisible = (elemTop >= 0) && (elemBottom <= window.innerHeight);
    return isVisible;
}
```

#### Calling Ajax funciton 
We'll call ajax function once function returns true for given element

```
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

```

#### Finally on ajax based remote file
```
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
 ```
