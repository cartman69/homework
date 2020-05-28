<?php include 'application/views/head.php';?>
<table>
	<thead>
		<tr>
            <th>School</th>
			<th>Name</th>
		</tr>
	</thead>
	<tbody>
    {classes}
    	<tr>
            <td>{school_id}</td>
    		<td>{name}</td>
    	</tr>
    {/classes}
	</tbody>
</table>
<a class="btn btn-primary" href="<?php echo site_url(array('classe', 'add')); ?>">New class</a>
<?php include 'application/views/foot.php';?>