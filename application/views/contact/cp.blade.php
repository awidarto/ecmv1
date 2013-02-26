@layout('dialog')

@section('content')
	<div class="row">
		<div class="twelve columns">
			<fieldset>
				{{ $form->hidden('companyId','',array('id'=>'companyId'))}}
				{{ $form->hidden('companyName','',array('id'=>'companyName'))}}
				{{ $form->hidden('personId','',array('id'=>'personId'))}}

				{{ $form->text('personName','Name.req','',array('class'=>'auto_name_cp text','id'=>'personName')) }}
				{{ $form->text('personEmail','Business Email.req','',array('class'=>'auto_email_cp text','id'=>'personEmail')) }}
				{{ $form->text('personCompany','Company.req','',array('class'=>'auto_company_cp text','id'=>'personCompany')) }}
				{{ $form->text('personPosition','Position.req','',array('class'=>'text','id'=>'personPosition')) }}
				{{ $form->text('personPhone','Phone.req','',array('class'=>'text','id'=>'personPhone')) }}
				{{ $form->text('personMobile','Mobile.req','',array('class'=>'text','id'=>'personMobile')) }}
			</fieldset>
		</div>
	</div>
	<hr />
	<div class="row right">
	{{ Form::button('Add',array('class'=>'button','id'=>'savecontact'))}}&nbsp;&nbsp;
	{{ Form::button('Cancel',array('class'=>'button','id'=>'closedialog'))}}
	</div>

<script type="text/javascript">
    $(document).ready(function(){
		$('#savecontact').click(function(){

			var contact = {};
			contact.companyId = $('#companyId').val();
			contact.companyName = $('#companyName').val();

			contact.personId		= $('#personId').val();
			contact.personName		= $('#personName').val();
			contact.personEmail		= $('#personEmail').val();
			contact.personCompany	= $('#personCompany').val();
			contact.personPosition	= $('#personPosition').val();
			contact.personPhone		= $('#personPhone').val();
			contact.personMobile	= $('#personMobile').val();

			console.log(contact);

			$.post("{{ URL::to('opportunity/addcontact/'.$id) }}",contact, function(data) {
				if(data.status == 'OK'){
					//redraw table
					parent.cTable.fnDraw();
					parent.jQuery.fancybox.close();
				}else{
					parent.jQuery.fancybox.close();
				}
			},'json');
		});

		$('#closedialog').click(function(){
			parent.jQuery.fancybox.close();
		});
    });
</script>
@endsection

