<?php return array(
  'storage'=>'public/storage/',
  'currencies'=>array( 'IDR'=>'IDR','USD'=>'USD','SGD'=>'SGD','EU'=>'EU','AUD'=>'AUD'),
  'parama_roles'=>array( 'root'=>'root','super'=>'super','user'=>'user','client'=>'client','vendor'=>'vendor'),
  'parama_access'=>array( 'all'=>'all','restrict'=>'restrict','client'=>'client','vendor'=>'vendor'),
  'doc_type'=>array( 
  		'General'=>array(
	 		'references'=>'References',
			'correspondences'=>'Correspondences',
			'minutesofmeeting'=>'Minutes of Meeting',
			'progress_report'=>'Progress Report',
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
			'stock_list'=>'Stock List',
			'material_receiving'=>'Material Receiving Report',
			'repair_maintenance'=>'Repair Maintenance',
		),
		'Employee'=>array(
			'employee_profile'=>'Employee Profile',
			'employee_resume'=>'Employee Resume',
			'employee_job description'=>'Employee Job Description',
			'employee_leave request'=>'Employee Leave Request',
			'employee_medical claim'=>'Employee Medical claim',
			'employee_regular medical'=>'Employee Regular medical',
			'employee_hospitalized insurance'=>'Employee Hospitalized Insurance',
			'employee_tax'=>'Employee Tax',
			'employee_jamsostek'=>'Employee JAMSOSTEK',
			'employee_salary slip'=>'Employee Salary Slip',
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
