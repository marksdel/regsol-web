
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
	<?php include 'js/gtag.js'; ?>
    <title>RegSol - Blog</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="RegSol Blog">
    <meta name="keywords" content="regulatory blog aml gdpr mifid brexit dublin ireland compliance">
    <meta name="author" content="DW">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta property="og:title" content="RegSol">
	<meta property="og:description" content="Regulatory and compliance solutions for European firms">
	
    <?php include 'header-common.php';?>
	<script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/550517faeafaf001b97a16724/e9ca002511238c462b2f1e6f1.js");</script>

</head>
<body>
    <div id="loading-screen" class="centered-column">
        <div class="spinner centered-column">
            <div class="loader"></div>
        </div>
    </div>
	
    <!-- NAVBAR -->
    <?php include 'menu.php';?>

	<!-- SECTION -->
	<section id="Posts" class="pale-gray" >
		<script>
            $('#first-splash-image').on('load', function() {
                $('#loading-screen').addClass('loading-slide-up');
            });
            setTimeout(function() {
                $('#loading-screen').addClass('loading-slide-up');
            }, 500)
        </script>

		<div class="container centered-column blog-landing">
			<div class="col-sm-12 col-xs-12">			
				<br><br>
				<h1>RegSol Blog</h1>				
			</div>

		</div>		
		<br>
		<div class="container white-insert">
			<div class="col-sm-7 col-xs-12" >
				<h3>RegSol Blog Posts</h3>
				<?php
					function displayPage($obj) {
						$num_posts = sizeof($obj->items);
						 for ($i=0;$i<$num_posts; $i++) {						 
							 echo '<div class="blog-item">';
							 $id = $obj->items[$i]->id;
							 $title = $obj->items[$i]->title;
							 $summary = substr($obj->items[$i]->content, 0, 100);
							 $author = $obj->items[$i]->author->displayName;
							 echo "<b><a href='blogpost.php?id=$id' class='blog-title'>$title</a></b>";
							 echo "<br>";
							 $publishedStr = $obj->items[$i]->published;
							 $published = strtotime($publishedStr);
							 $published = date("F Y",$published);
							 echo "<i>$published</i>";
							 echo "<br><br>";
							 echo $obj->items[$i]->content;
							 echo"</div>";
							 echo"<div class='text-right' width='100%'><a href='blogpost.php?id=$id' class='blog-title' >Read more here...</a></div>";
						}
					}
					
					function getPosts($page) {						
						$ch = curl_init();
						curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
						curl_setopt($ch, CURLOPT_URL, $page);
						$result = curl_exec($ch);
						curl_close($ch);
						$obj = json_decode($result);
						return $obj;
					}
					
					$pageRoot = 'https://www.googleapis.com/blogger/v3/blogs/569641560437060827/posts?key=AIzaSyDC-RUAeH6350oK0l7m9DmO-gx7IrWSRuc';
					
					
					//page 1
					$page = $pageRoot;
					$obj = getPosts($page);
					displayPage($obj);
										
					//page 2
					$page = $pageRoot.'&pageToken='.$obj->nextPageToken;
					$obj = getPosts($page);
					displayPage($obj);
					
					//page 3
					$page = $pageRoot.'&pageToken='.$obj->nextPageToken;
					$obj = getPosts($page);
					displayPage($obj);
					
					//page 4
					$page = $pageRoot.'&pageToken='.$obj->nextPageToken;
					$obj = getPosts($page);
					displayPage($obj);
					
					
				?>				

			</div>	
			<div class="col-sm-1 hidden-xs">	
				&nbsp;
			</div>
			<div class="col-sm-4 hidden-xs twitter-feed">		
				<a class="twitter-timeline twitter-feed" data-height="2000" href="https://twitter.com/regsolireland?ref_src=twsrc%5Etfw">Tweets by regsolireland</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
			</div>
		</div>
		
		</div>

		<?php include 'footer.php';?>
	</section>	
	
	<?php include 'resize-menu.php';?>

   
</body>
</html>
