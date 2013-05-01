<h5>Contact Persons</h5>
<table id="contactTable">
	<thead>
		<tr>
			<th>Name</th>
			<th>Email</th>
			<th>Position</th>
			<th>Direct Line</th>
			<th>Mobile</th>
			<th>&nbsp;</th>
		</tr>
		<tr>
			<th>{{ Form::text('contactName','',array('id'=>'contactName', 'class'=>'auto_contact_name'))}}</th>
			<th>{{ Form::text('contactEmail','',array('id'=>'contactEmail','class'=>'auto_contact_email'))}}</th>
			<th>{{ Form::text('contactPosition','',array('id'=>'contactPosition'))}}</th>
			<th>{{ Form::text('contactDirectLine','',array('id'=>'contactDirectLine'))}}</th>
			<th>{{ Form::text('contactMobile','',array('id'=>'contactMobile'))}}</th>
			<th>{{ Form::button('Add','Add',array('id'=>'contectAdd'))}}</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td><span class="del" >del</span></td>
		</tr>
	</tbody>
</table>