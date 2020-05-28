<?php include 'application/views/head.php';?>
<table>
	<thead>
		<tr>
			<th>Name</th>
			<th>Postal code</th>
		</tr>
	</thead>
	<tbody>
    {schools}
    	<tr>
    		<td>{name}</td>
    		<td>{postalcode}</td>
    	</tr>
    {/schools}
	</tbody>
</table>
<a class="btn btn-primary" href="<?php echo site_url(array('school', 'add')); ?>">New school</a>
<?php include 'application/views/foot.php';?>