<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Accordion</title>
      <link rel="stylesheet" href="css/menu.css">
	<script type="text/javascript" src="js/jquery-1.3.1.min.js"></script>
	<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
  
	<script>
	
	$(document).ready(function () {
		
		$('#accordion a.item').click(function () {

			//slideup or hide all the Submenu
			$('#accordion li').children('ul').slideUp('fast');	
			
			//remove all the "Over" class, so that the arrow reset to default
			$('#accordion a.item').each(function () {
				if ($(this).attr('rel')!='') {
					$(this).removeClass($(this).attr('rel') + 'Over');	
				}
			});
			
			//show the selected submenu
			$(this).siblings('ul').slideDown('fast');
			
			//add "Over" class, so that the arrow pointing down
			$(this).addClass($(this).attr('rel') + 'Over');			

			return false;

		});
	
	});
	
	</script>

	
</head>

<body>

<br/><br/><br/>

<ul id="accordion">
	<li>
		<a href="#" class="item popular" rel="popular">Popular Post</a>
		<ul>
			<li><a href="#">Popular Post 1</a></li>
			<li><a href="#">Popular Post 2</a></li>
			<li><a href="#" class="last">Popular Post 3</a></li>
		</ul>
	</li>
	<li>
		<a href="#" class="item category" rel="category">Category</a>
		<ul>
			<li><a href="#">Category 1</a></li>
			<li><a href="#">Category 2</a></li>
			<li><a href="#" class="last">Category 3</a></li>
		</ul>
	</li>
	<li>
		<a href="#" class="item comment" rel="comment">Recent Comment</a>
		<ul>
			<li><a href="#">Comment 1</a></li>
			<li><a href="#">Comment 2</a></li>
			<li><a href="#" class="last">Comment 3</a></li>
		</ul>
	</li>
</ul>

 


</body>
</html>
