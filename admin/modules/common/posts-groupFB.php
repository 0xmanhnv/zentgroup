<?php 
	include_once("widgets/header.php"); 
	include_once("widgets/menu.php");
	include_once('../libs/FB/func.php');
?>
<div id="page-wrapper">
	<h1>bai viet</h1>
	<?php 
		if(isset($_GET['idGroup'])){ 
			$posts = get_posts_group($_GET['idGroup']);
			foreach ($posts['data'] as $key => $value) {
	?>
	<div>
		<p style="border-bottom: 1px solid black;">
			
			<?php 
				if(isset($value['message'])) {
					echo $value['message'];
				}
			?>

		</p>
	</div>
	<?php
			} 
		} 
	?>
</div>

<?php include_once("widgets/footer.php") ?>