<table id="progressTable">
	<thead>
		<tr>
			<th class="one">#</th>
			<th class="one">Date</th>
			<th colspan="2">Reports</th>
			<th colspan="2" rowspan="2">Comments</th>
		</tr>
		<tr>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
			<th class="one">By</th>
			<th class="five">Description</th>
		</tr>
		<tr>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
			<th>
				{{ Form::textarea('progressInput','',array('id'=>'progressInput','rows'=>"2", 'class'=>'text'))}}
				{{ Form::button('Add',array('class'=>'button right','id'=>'progressAdd'))}}
			</th>
			<th>
			</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
	</tbody>
</table>

