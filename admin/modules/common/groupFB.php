<?php 
	include_once("widgets/header.php"); 
	include_once("widgets/menu.php");
	include_once('../libs/FB/get-list-group.php');
	$groups = get_list_group();
?>

<?php if(isset($_COOKIE['msg'])){ ?>
	<div class="alert alert-success" style="width: 50%; position: fixed; top: 100px; right: 0px;">
	  <strong>Success!</strong> <?php echo $_COOKIE['msg']; ?>
	</div>
<?php } ?>
<div id="page-wrapper">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Tên group</th>
				<th>Trạng thái</th>
				<th>Hành động</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($groups['data'] as $key => $value) { ?>
			<tr>
				<td><?php echo $value['name']; ?></td>
				<td><?php echo $value['privacy']; ?></td>
				<td>
					<a class="btn btn-info" href="<?php echo "https://facebook.com/groups/".$value['id']; ?>">Vào</a>
					<a class="btn btn-success" href="<?php echo base_url('admin/?m=common&a=posts-groupFB&idGroup='.$value['id'].''); ?>">Bài viết</a>
					<!-- Trigger the modal with a button -->
					<button type="button" class="btn btn-info" data-toggle="modal" data-target="#<?php echo $value['id']; ?>">Đăng bài</button>
					<!-- Modal -->
					<div id="<?php echo $value['id']; ?>" class="modal fade" role="dialog">
					  <div class="modal-dialog">

					    <!-- Modal content-->
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal">&times;</button>
					        <h3 class="modal-title" style="font-weight: bold;">Đăng bài lên nhóm</h3>
					      </div>
					      <div class="modal-body">
					        <form action="<?php echo base_url('admin/?m=common&a=post_to_groupFB'); ?>" method="POST" role="form">
					        	<legend style="text-align: center;"><?php echo $value['name'] ?></legend>
					        	<div class="form-group">
					        		<input type="text" hidden="true" value="<?php echo $value['id']; ?>" name="idgroup">
					        	</div>
					        	<!-- <div class="form-group">
					        		<label for="">Link: </label>
					        		<input type="text" class="form-control" id="" placeholder="Input link" name="link">
					        	</div> -->
					        	<div class="form-group">
					        		<div class="form-group">
									  <label for="message">Message:</label>
									  <textarea class="form-control" rows="5" id="comment" name="message"></textarea>
									</div> 
					        	</div>
					      
					        
					        	<button type="submit" class="btn btn-primary" name="submit" style="width: 100%;">Đăng bài</button>
					        </form>
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					      </div>
					    </div>

					  </div>
					</div>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
<?php include_once("widgets/footer.php") ?>
