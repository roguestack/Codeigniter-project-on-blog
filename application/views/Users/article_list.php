<?php include 'header.php' ;?>
<div class="container-fluid">
	<h1>Welcome to TechnoBlog-e</h1>
	<p>here you will find all latest trends and recent blogs on technologies</p>
</div>
<div class="container-fluid">
	<table class="table table-hover">
		<thead class="text-center">
			<tr class="table-secondary">
				<th scope="col">ID</th>
				<th>Title</th>
				<th>Details</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach($res as $row){?>
			<tr class="table-primary">
			<td scope="col"><?php echo $row->id ?></td>
			<td><?php echo $row->article_title?></td>
			<td><?php echo $row->article_body ?></td>
			</tr>
		<?php }?>
		</tbody>
	</table>
</div>
<?php include 'footer.php'; ?>
