<?php

use function PHPSTORM_META\type;

include_once('./database/connect.php');
if(isset($_POST['cmt']))
{
	$id=$_GET['blog_id'];
	$date = date('Y-m-d H:i:s');
	$name=$_POST['name'];
	$cmt=$_POST['message'];
	$rs=mysqli_query($con,"INSERT INTO user_blog ( blog_id, role, content, name,date) VALUES ( '$id', 'reader', '$cmt', '$name','$date');");
	if($rs)
	{

	}else{
		
		echo $date;
		echo $name;
		echo $cmt;
		echo $_GET['blog_id'];
	}
}


?>

	
	<section>
		<div class="container">
			
				<div class="col-sm-9">
					<div class="blog-post-area">
						<h2 class="title text-center">Latest From our Blog</h2>
						<?php
						$blog_list_single=mysqli_query($con,"SELECT blog.id as id,blog.title as title,blog.content as content,blog.brieft as brieft, blog.date as date, blog.img as img, blog.author as author ,blog.cmt as cmt from blog WHERE blog.id=".$_GET['blog_id']." ");
						while($row_blog_single=mysqli_fetch_array($blog_list_single)){
						?>
						<div class="single-blog-post">
							<h3><?php echo $row_blog_single['title'] ?></h3>
							<div class="post-meta">
								<ul>
									<li><i class="fa fa-user"></i><?php echo $row_blog_single['author'] ?></li>
									<li><i class="fa fa-clock-o"></i><?php echo $row_blog_single['date'] ?></li>
									
								</ul>
								<!-- <span>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-half-o"></i>
								</span> -->
							</div>
							<a href="">
								<img src="<?php echo $row_blog_single['img'] ?>" alt="">
							</a>
							<p>
							<?php echo $row_blog_single['content'] ?>
							</p>
							<!-- <div class="pager-area">
								<ul class="pager pull-right">
									<li><a href="#">Pre</a></li>
									<li><a href="#">Next</a></li>
								</ul>
							</div> -->
						</div>
					</div><!--/blog-post-area-->

					<!-- <div class="rating-area">
						<ul class="ratings">
							<li class="rate-this">Rate this item:</li>
							<li>
								<i class="fa fa-star color"></i>
								<i class="fa fa-star color"></i>
								<i class="fa fa-star color"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
							</li>
							<li class="color">(6 votes)</li>
						</ul>
						<ul class="tag">
							<li>TAG:</li>
							<li><a class="color" href="">Pink <span>/</span></a></li>
							<li><a class="color" href="">T-Shirt <span>/</span></a></li>
							<li><a class="color" href="">Girls</a></li>
						</ul>
					</div>/rating-area -->

					<div class="socials-share">
						<!-- <a href=""><img src="images/blog/socials.png" alt=""></a> -->
					</div><!--/socials-share-->

					<div class="media commnets">
						<!-- <a class="pull-left" href="#">
							<img class="media-object" src="images/blog/man-one.jpg" alt="">
						</a> -->
						<div class="media-body">
							<h4 class="media-heading"><?php echo $row_blog_single['author'] ?></h4>
							<p><?php echo $row_blog_single['cmt'] ?></p>
							<div class="blog-socials">
								<ul>
									<li><a href=""><i class="fa fa-facebook"></i></a></li>
									<li><a href=""><i class="fa fa-twitter"></i></a></li>
									<li><a href=""><i class="fa fa-dribbble"></i></a></li>
									<li><a href=""><i class="fa fa-google-plus"></i></a></li>
								</ul>
								<!-- <a class="btn btn-primary" href="">Other Posts</a> -->
							</div>
						</div>
					</div>
					<?php
						}
					?><!--Comments-->
					<div class="response-area">
						<?php
						$sum_res=mysqli_query($con,"SELECT * from user_blog where user_blog.blog_id=".$_GET['blog_id']." and role='reader'");
						$sum_res1=mysqli_query($con,"SELECT COUNT(*) as sum from user_blog where user_blog.blog_id=".$_GET['blog_id']." and role='reader'");
						$row_sum_res1=mysqli_fetch_assoc($sum_res1);

						?>
						<h2><?php echo $row_sum_res1['sum']?> RESPONSES</h2>
						<ul class="media-list">
						<?php 
						while($row_sum_res=mysqli_fetch_array($sum_res))
						{
						?>
							<li class="media">
								
								<!-- <a class="pull-left" href="#">
									<img class="media-object" src="images/blog/man-two.jpg" alt="">
								</a> -->
								<div class="media-body">
									<ul class="sinlge-post-meta">
										<li><i class="fa fa-user"></i><?php echo $row_sum_res['name']?></li>
										<li><i class="fa fa-clock-o"></i><?php echo $row_sum_res['date']?></li>
										
									</ul>
									<p><?php echo $row_sum_res['content']?></p>
									
								</div>
							</li>
							<?php
							}?>
							<!-- <li class="media second-media">
								<a class="pull-left" href="#">
									<img class="media-object" src="images/blog/man-three.jpg" alt="">
								</a>
								<div class="media-body">
									<ul class="sinlge-post-meta">
										<li><i class="fa fa-user"></i>Janis Gallagher</li>
										<li><i class="fa fa-clock-o"></i> 1:33 pm</li>
										<li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
									</ul>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
									<a class="btn btn-primary" href=""><i class="fa fa-reply"></i>Replay</a>
								</div>
							</li>
							<li class="media">
								<a class="pull-left" href="#">
									<img class="media-object" src="images/blog/man-four.jpg" alt="">
								</a>
								<div class="media-body">
									<ul class="sinlge-post-meta">
										<li><i class="fa fa-user"></i>Janis Gallagher</li>
										<li><i class="fa fa-clock-o"></i> 1:33 pm</li>
										<li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
									</ul>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
									<a class="btn btn-primary" href=""><i class="fa fa-reply"></i>Replay</a>
								</div>
							</li> -->
						</ul>					
					</div><!--/Response-area-->
					<div class="replay-box">
						<div class="row">
							<div class="col-sm-12">
								<h2>Leave a replay</h2>
								<form method="post">
									<div class="blank-arrow">
										<label>Your Name</label>
									</div>
									<span>*</span>
									<input type="text" name="name" placeholder="write your name...">
									
									<div class="blank-arrow">
										<label>Your Comment</label>
									</div>
									<span>*</span>
									<textarea name="message" rows="11"></textarea>
									<input style="color: white;" class="btn btn-primary" name="cmt" type="submit" value="Submit">
								</form>
							</div>
							<!-- <div class="col-sm-8">
								<div class="text-area">
									<div class="blank-arrow">
										<label>Your Name</label>
									</div>
									<span>*</span>
									<input type="text" placeholder="write your name...">
									<div class="blank-arrow">
										<label>Your Name</label>
									</div>
									<span>*</span>
									<textarea name="message" rows="11"></textarea>
									<a class="btn btn-primary" href="">post comment</a>
								</div>
							</div> -->
						</div>
					</div><!--/Repaly Box-->
				</div>	
			
		</div>
	</section>
	
	
	

  
