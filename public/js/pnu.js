    $(document).ready(function(){

    	//base = 'http://localhost/pnu/public/';

    	var sharelist = {};

		$('.date').datepicker({
			dateFormat: "dd-mm-yy"
		});

		$('.pop').click(function(){
			var _id = $(this).attr('id');

			var _rel = $(this).attr('rel');

			$.fancybox({
				type:'iframe',
				href: base + '/' + _rel + '/' + _id,
				autosize: true
			});

		})

		$('.tag_email_inline').tagsInput({
			'autocomplete_url': base + 'ajax/email',
		   	'height':'80px',
		   	'width':'100%',
		   	'interactive':true,
		   	'onChange' : function(c){

		   		},
		   	'onAddTag' : function(t){
		   			console.log(t);
		   		},
		   	'onRemoveTag' : function(t){
		   			console.log(t);
		   		},
		   	'defaultText':'add email',
		   	'removeWithBackspace' : true,
		   	'minChars' : 0,
		   	'maxChars' : 0, //if not provided there is no limit,
		   	'placeholderColor' : '#666666'
		});


		$('.tag_email').tagsInput({
			'autocomplete_url': base + 'ajax/email',
			'autocomplete':{
				'select':function(event, ui){

					if(_.indexOf(sharearray,ui.item.id) < 0){
						sharearray.push(ui.item.id);
					}

					console.log(sharearray);

					var sh = $('#shared').val();

					if(sh == ''){
						$('#shared').val(ui.item.id);
					}else{
						$('#shared').val(sh + ',' + ui.item.id);
					}
				}
			},
		   	'height':'100px',
		   	'width':'100%',
		   	'interactive':true,
		   	'onChange' : function(c){
		   			console.log(c);
		   		},
		   	'onAddTag' : function(t){
		   			console.log(t);
		   		},
		   	'onRemoveTag' : function(t){
		   			console.log(t);
		   		},
		   	'defaultText':'add email',
		   	'removeWithBackspace' : true,
		   	'minChars' : 0,
		   	'maxChars' : 0, //if not provided there is no limit,
		   	'placeholderColor' : '#666666'
		});

		$('.tag_shared').tagsInput({
			'autocomplete_url': base + 'ajax/email',
			'autocomplete':{
				'select':function(event, ui){
					sharelist[ui.item.value] = ui.item.id;
				}
			},
		   	'height':'100px',
		   	'width':'100%',
		   	'interactive':true,
		   	'onChange' : function(c){
		   			console.log(sharelist);
		   		},
		   	'onAddTag' : function(t){
					sharelist[t] = '';		   			
		   		},
		   	'onRemoveTag' : function(t){
					delete sharelist[t];
		   		},
		   	'defaultText':'add email',
		   	'removeWithBackspace' : true,
		   	'minChars' : 0,
		   	'maxChars' : 0, //if not provided there is no limit,
		   	'placeholderColor' : '#666666'
		});		

		$('.tag_rev').tagsInput({
			'autocomplete_url': base + 'ajax/rev',
		   	'height':'100px',
		   	'width':'100%',
		   	'interactive':true,
		   	'onChange' : function(c){

		   		},
		   	'onAddTag' : function(t){
		   			console.log(t);
		   		},
		   	'onRemoveTag' : function(t){
		   			console.log(t);
		   		},
		   	'defaultText':'add title',
		   	'removeWithBackspace' : true,
		   	'minChars' : 0,
		   	'maxChars' : 0, //if not provided there is no limit,
		   	'placeholderColor' : '#666666'
		});

		$('.tag_keyword').tagsInput({
			'autocomplete_url': base + 'ajax/tag',
		   'height':'100px',
		   'width':'100%',
		   'interactive':true,
		   'onChange' : function(c){

		   		},
		   'onAddTag' : function(t){
		   			console.log(t);
		   		},
		   'onRemoveTag' : function(t){
		   			console.log(t);
		   		},
		   'defaultText':'add tag',
		   'removeWithBackspace' : true,
		   'minChars' : 0,
		   'maxChars' : 0, //if not provided there is no limit,
		   'placeholderColor' : '#666666'
		});

		$('.tag_project').autocomplete({
			source: base + 'ajax/project'
		});

		$('.tag_revision').autocomplete({
			source: base + 'ajax/rev'
		});

		$('.auto_user').autocomplete({
			source: base + 'ajax/email',
			select: function(event, ui){
				$('#user_id').val(ui.item.id);
				$('#user_name').val(ui.item.label);				
			}
		});

		$('.auto_pm').autocomplete({
			source: base + 'ajax/user',
			select: function(event, ui){
				$('#pm_id').val(ui.item.id);
				$('#pm_name').val(ui.item.value);				
				$('#pm_email').val(ui.item.email);				
			}
		});

		$('.auto_client').autocomplete({
			source: base + 'ajax/email',
			select: function(event, ui){
				$('#client_id').val(ui.item.id);
				$('#client_name').val(ui.item.label);				
			}
		});

		//project

		$('.auto_project_number').autocomplete({
			source: base + 'ajax/project',
			select: function(event, ui){
				$('#project_id').val(ui.item.id);
				$('#project_title').val(ui.item.title);				
			}
		});


		$('.auto_project_name').autocomplete({
			source: base + 'ajax/projectname',
			select: function(event, ui){
				$('#project_id').val(ui.item.id);
				$('#project_number').val(ui.item.number);			
			}
		});

		//tender

		$('.auto_tender_number').autocomplete({
			source: base + 'ajax/tender',
			select: function(event, ui){
				$('#tender_id').val(ui.item.id);
				$('#tender_title').val(ui.item.title);				
			}
		});


		$('.auto_tender_name').autocomplete({
			source: base + 'ajax/tendername',
			select: function(event, ui){
				$('#tender_id').val(ui.item.id);
				$('#tender_number').val(ui.item.number);			
			}
		});

		//opportunity

		$('.auto_opportunity_number').autocomplete({
			source: base + 'ajax/opportunity',
			select: function(event, ui){
				$('#opportunity_id').val(ui.item.id);
				$('#opportunity_title').val(ui.item.title);				
			}
		});

		$('.auto_opportunity_name').autocomplete({
			source: base + 'ajax/opportunityname',
			select: function(event, ui){
				$('#opportunity_id').val(ui.item.id);
				$('#opportunity_number').val(ui.item.number);			
			}
		});		

    });