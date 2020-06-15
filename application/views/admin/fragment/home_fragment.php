<div  class="table-responsive"> 
	<table class="table table-hover table-bordered table-striped" id="sampleTable" style="width: 100%;">
		<thead>
			<tr>
				<th>Sl.No.</th>
				<th>Heading</th>
				<th>Sub Heading</th>
				<th>Description</th>
				<th>Picture</th>
				<th>
					<div class="animated-checkbox">
						<label>
							<input onclick="checkAllCheckbox($(this));" type="checkbox" ><span class="label-text"></span>
						</label>
						<button id="shaker" class="btn btn-danger btn-sm" type="button" onclick="deleteHome()">Delete&nbsp;&nbsp;&nbsp;<i class="fa fa-trash-o"></i></button>
					</div>
				</th>
			</tr>
		</thead>
		<tbody>
			<?php  foreach ($result as $key=> $row)   { ?>
				<tr>
					<td><?php echo $key+1;?></td>
					<td><?php echo substr($row['heading1'], 0, 30).(strlen(trim($row['heading1'])) > 30 ? '...' : '');?></td>
					<td><?php echo substr($row['heading2'], 0, 30).(strlen(trim($row['heading2'])) > 30 ? '...' : '');?></td>
					<td><?php echo substr($row['description'], 0, 60).(strlen(trim($row['description'])) > 30 ? '...' : '');?></td>
					<td><?php echo '<img src="'.$row["img_url"].'" alt="No IMG" height="50" width="50">'; ?></td>
					
						<td>
							<div  class="animated-checkbox" style="display: inline-block;">
								<label><input onclick="shakeDeleteBtn()" class="checkbox" type="checkbox" value="<?php echo $row['ID'];?>"><span class="label-text"></span></label>
							</div>
							<button onclick="editHome($(this))" value="<?php echo $row['ID'];?>" class="btn btn-outline-info btn-sm" style="" type="button"><i style ="font-size: 12px; margin-right: 0px;" class="fa fa-lg fa-fw fa-pencil"></i>EDIT</button>
						</td>
				
			</tr>
		<?php } ?>        
	</tbody>
</table>
</div>