<?php return array(
  'storage'=>'public/storage/',
  'currencies'=>array( 'IDR'=>'IDR','USD'=>'USD','SGD'=>'SGD','EU'=>'EU','AUD'=>'AUD'),
  'parama_roles'=>array( 'root'=>'root','super'=>'super','user'=>'user','client'=>'client','vendor'=>'vendor'),
  'parama_access'=>array( 'all'=>'all','restrict'=>'restrict','client'=>'client','vendor'=>'vendor'),
  'doc_type'=>array( 
  		'General'=>array(
	 		'references'=>'References',
			'correspondences'=>'Correspondences',
			'minutes of meeting'=>'Minutes of Meeting',
			'progress report'=>'Progress Report',
		),
		'Marketing'=>array(
			'marketing'=>'Marketing',
			'tender'=>'Tender',
			'proposal'=>'Proposal',
			'quotation'=>'Quotation',
			),
		'Legal'=>array(
			'agreement'=>'Agreement',
			'contract'=>'Contract',
			'bond'=>'Bond'
			),
		'Finance'=>array(
			'finance'=>'Finance',
			'invoice'=>'Invoice',
			'administration'=>'Administration',
			),
		'Warehouse & QC'=>array(
			'inspection'=>'Inspection',
			'test report'=>'Test Report',
			'ncr'=>'NCR',
			'acceptance'=>'Acceptance',
			'stock list'=>'Stock List',
			'material receiving'=>'Material Receiving Report',
			'repair maintenance'=>'Repair Maintenance',
		),
		'Employee'=>array(
			'employee profile'=>'Employee Profile',
			'employee resume'=>'Employee Resume',
			'employee job description'=>'Employee Job Description',
			'employee leave request'=>'Employee Leave Request',
			'employee medical claim'=>'Employee Medical claim',
			'employee regular medical'=>'Employee Regular medical',
			'employee hospitalized insurance'=>'Employee Hospitalized Insurance',
			'employee tax'=>'Employee Tax',
			'employee jamsostek'=>'Employee JAMSOSTEK',
			'employee salary slip'=>'Employee Salary Slip',
		),
		'Assets'=>array(
			'leasing'=>'Leasing',
			'maintenance'=>'Maintenance',
			'insurance'=>'Insurance',
			'license'=>'License',
		)
  	),
  'doc_format'=>array( 'letter'=>'Letter','fax'=>'Fax','email'=>'Email','scan'=>'Scan','other'=>'Other'),

  'department'=>array('all'=>'All',
  		'indoor sales'=>'Indoor Sales',
  		'outdoor sales'=>'Outdoor Sales',
  		'finance'=>'Finance',
  		'hr'=>'Human Resource',
  		'warehouse'=>'Warehouse',
  		'qc'=>'QA/QC'),
);
