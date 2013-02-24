<table id="progressTable">
	<thead>
		<tr>
			<th class="one">Date</th>
			<th colspan="2">Reports</th>
			<th colspan="2">Comments</th>
		</tr>
		<tr>
			<th>&nbsp;</th>
			<th>By</th>
			<th class="five">Description</th>
			<th>By</th>
			<th class="five">Description</th>
		</tr>
		<tr>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
			<th>
				{{ Form::textarea('progressInput','',array('id'=>'progressInput','rows'=>"2", 'class'=>'text'))}}
				{{ Form::button('Add','Add',array('id'=>'progressAdd'))}}
			</th>
			<th>&nbsp;</th>
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
			<td></td>
		</tr>
	</tbody>
</table>

