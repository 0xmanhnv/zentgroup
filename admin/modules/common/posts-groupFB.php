<?php 
	include_once("widgets/header.php"); 
	include_once("widgets/menu.php");
	include_once('../libs/FB/func.php');
?>
<div id="page-wrapper" style="padding-top: 10px;">
	<!-- main content -->
	<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
		<?php 
			if(isset($_GET['idGroup'])){
				// lay tat ca bai viet tu group
				$posts = get_posts_group($_GET['idGroup']);
				foreach ($posts['data'] as $key => $value) {
					//lay thong tin user post len
					$infoUserPost = getInfoUserPost($value['id']);

		?>
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
	        <div class="box-post">
	        	<div class="title title-post">
	                <a href="<?php echo 'https://facebook.com/'.$infoUserPost['from']['id']; ?>"><?php echo $infoUserPost['from']['name']; ?></a>
	            </div>
	            <div class="message">
	        		<?php 
						if(isset($value['message'])) {
							echo $value['message'];
						}
						//likes post
						$likes = (array)get_reactions($value['id']);
						// comment post
						$commens = get_comments($value['id']);
					?>
	            </div>
	            <div class="info-post">
	                <div class="meta-info">
	                	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
	                		<div style="display: inline-block; text-align: center;">
	                			<i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
	                			<span><?php echo count($likes); ?></span>
	                		</div>
	                	</div>
	                	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
	                		<div style="display: inline-block; text-align: center;">
	                			<i class="fa fa-commenting-o" aria-hidden="true"></i> 
	                			<span><?php echo count($commens['data']); ?></span>
	                		</div>
	                	</div>
	                	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
	                		<div style="display: inline-block; text-align: center;">
	                			<i class="fa fa-share-alt" aria-hidden="true"></i> 
	                		</div>
	                	</div>
	                </div>
	            </div>
	        </div>
	    </div>
	    <?php
				} 
			} 
		?>
	</div>
	<!-- end main content -->
	<!-- tab right -->
	<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
		Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
	</div>
	<!-- end tab right -->
</div>
<?php include_once("widgets/footer.php") ?>