<div  class="table-responsive"> 
	<table class="table table-hover table-bordered table-striped" id="sampleTable" style="width: 100%;">
		<thead>
			<tr>
				<th>Sl.No.</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Email</th>
				<th>Date</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php  foreach ($result as $key=> $row)   { ?>
				<tr>
					<td><?php echo $key+1;?></td>
					<td><?php echo $row['fname'];?></td>
					<td><?php echo $row['lname'];?></td>
					<td><?php echo $row['email'];?></td>
					<td><?php echo date("d-m-Y", strtotime($row['added_on']));?></td>
					<td>
						<button onclick="viewContactUs($(this))" value="<?php echo $row['ID'];?>" class="btn btn-outline-info btn-sm" style="" type="button">View</button>
					</td>
				</tr>
			<?php } ?>        
		</tbody>
	</table>
</div>