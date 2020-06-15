<div  class="table-responsive"> 
	<table class="table table-hover table-bordered table-striped" id="sampleTable" style="width: 100%;">
		<thead>
			<tr>
				<th>Sl.No.</th>
				<th>Date</th>
				<th>File</th>
				<th>
					<div class="animated-checkbox">
						<label>
							<input onclick="checkAllCheckbox($(this));" type="checkbox" ><span class="label-text"></span>
						</label>
						<button id="shaker" class="btn btn-danger btn-sm" type="button" onclick="deleteResumeList()">Delete&nbsp;&nbsp;&nbsp;<i class="fa fa-trash-o"></i></button>
					</div>
				</th>
			</tr>
		</thead>
		<tbody>
			<?php  foreach ($result as $key=> $row)   { ?>
				<tr>
					<td><?php echo $key+1;?></td>
					<td><?php echo date("d-m-Y", strtotime($row['upload_date']));?></td>
					<td><?php echo '<a href="'.$row['file_path'].'" download="'.$row['fileName'].'">
						<i class="fa fa-download" aria-hidden="true" style="font-size:20px"></i>&nbsp;&nbsp;  <span>'.$row['fileName'].'</span> 
					</a>';?></td>
					<td>
						<div  class="animated-checkbox" style="display: inline-block;">
							<label><input onclick="shakeDeleteBtn()" class="checkbox" type="checkbox" value="<?php echo $row['ID'];?>"><span class="label-text"></span></label>
						</div>
					</td>
				</tr>
			<?php } ?>        
		</tbody>
	</table>
</div>