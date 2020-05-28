<?php include 'application/views/head.php';?>
<table>
	<thead>
		<tr>
			<th>Name</th>
		</tr>
	</thead>
	<tbody>
    {contents}
    	<tr>
    		<td>{libelle}</td>
    	</tr>
    {/contents}
	</tbody>
</table>
<a class="btn btn-primary" href="<?php echo site_url(array('content', 'add')); ?>">New content</a>
<?php include 'application/views/foot.php';?>