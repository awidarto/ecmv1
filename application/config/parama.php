<?php return array(
  // do not forget to trail slash all path configurations
  'storage'=>'public/storage/',
  'avatarstorage'=>'public/avatar/',
  'photostorage'=>'public/employees/',
  'currencies'=>array( 'IDR'=>'IDR','USD'=>'USD','EURO'=>'EURO'),
  'roles'=>array( 
  		'root'=>'Root User',
  		'super'=>'Super User',
  		'outdoor_sales'=>'Outdoor Sales',
  		'indoor_sales'=>'Indoor Sales',
  		'project_control'=>'Project Control',
  		'bod'=>'Board of Director',
  		'president_director'=>'President Director',
  		'operations_director'=>'Operations Director',
  		'finance_hr_director'=>'Finance & HR Director',
  		'finance_pusat'=>'F&A Pusat',
  		'finance_kemang'=>'F&A Kemang',
  		'finance_balikpapan'=>'F&A Balikpapan',
  		'sales_kemang'=>'S&M Kemang',
  		'sales_balikpapan'=>'S&M Balikpapan',
      'bt_balikpapan'=>'Bid & Tender Balikpapan',
  		'hr_admin'=>'HR Admin',
  		'warehouse'=>'Warehouse',
  		'qc'=>'Quality Control',
  		'clients'=>'Clients',
  		'principal_vendor'=>'Principal / Vendors',
  		'subcon'=>'3rd Party / Sub-Con'
  		),
  'access'=>array( 'all'=>'all','restrict'=>'restrict','client'=>'client','vendor'=>'vendor'),
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

  'doc_category_list'=>array( 
      'references'=>'References',
      'correspondences'=>'Correspondences',
      'minutesofmeeting'=>'Minutes of Meeting',
      'progress_report'=>'Progress Report',
      'marketing'=>'Marketing',
      'tender'=>'Tender',
      'proposal'=>'Proposal',
      'quotation'=>'Quotation',
      'agreement'=>'Agreement',
      'contract'=>'Contract',
      'bond'=>'Bond',
      'finance'=>'Finance',
      'invoice'=>'Invoice',
      'administration'=>'Administration',
      'inspection'=>'Inspection',
      'test report'=>'Test Report',
      'ncr'=>'NCR',
      'acceptance'=>'Acceptance',
      'stock_list'=>'Stock List',
      'material_receiving'=>'Material Receiving Report',
      'repair_maintenance'=>'Repair Maintenance',
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
      'leasing'=>'Leasing',
      'maintenance'=>'Maintenance',
      'insurance'=>'Insurance',
      'license'=>'License',
  ),

  'doc_format'=>array( 'letter'=>'Letter','fax'=>'Fax','email'=>'Email','drawing'=>'Drawing','picture'=>'Picture','scan'=>'Scan','other'=>'Other'),

  'department'=>array(
  		'general'=>'General',
      'template'=>'Template',
  		'outdoor_sales'=>'Outdoor Sales',
  		'indoor_sales'=>'Indoor Sales',
  		'project_control'=>'Project Control',
  		'bod'=>'Board of Director',
  		'president_director'=>'President Director',
  		'operations_director'=>'Operations Director',
  		'finance_hr_director'=>'Finance & HR Director',
  		'finance_pusat'=>'F&A Pusat',
  		'finance_kemang'=>'F&A Kemang',
  		'finance_balikpapan'=>'F&A Balikpapan',
  		'sales_kemang'=>'S&M Kemang',
  		'sales_balikpapan'=>'S&M Balikpapan',
      'tender_balikpapan'=>'Bid & Tender Balikpapan',
  		'hr_admin'=>'HR Admin',
  		'warehouse'=>'Warehouse',
  		'qc'=>'Quality Control',
  		'clients'=>'Clients',
  		'principal_vendor'=>'Principal / Vendors',
  		'subcon'=>'3rd Party / Sub-Con'
  		),

  'eventtitle'=>array(
      'document.upload'=>'New Document Created',
      'document.create'=>'New Document Created',
      'document.update'=>'Updated',
      'document.delete'=>'Deleted',
      'document.share'=>'shared to you',
      'document.expire'=>'will expire',

      'project.upload'=>'New Project Created',
      'project.create'=>'New Project Created',
      'project.update'=>'A Project Updated',
      'project.delete'=>'A Project Deleted',

      'request.approval'=>'Approval Requested'
    ),

  'contentsection'=>array(
      'help'=>'Help',
      'faq'=>'FAQ',
    ),

  'contentcategory'=>array(
      'help'=>'Help',
      'faq'=>'FAQ',
    ),

  'tenderstatus'=>array(
      'inprogress'=>'In Progress',
      'won'=>'Won',
      'loss'=>'Loss',
      'decline'=>'Declined',
      'pending'=>'Pending'
    ),

  'projectstatus'=>array(
      'inprogress'=>'In Progress',
      'completed'=>'Completed'
    ),

  'opportunitystatus'=>array(
      'open'=>'Open',
      'inprogress'=>'In Progress',
      'cancelled'=>'Cancelled',
      'declined'=>'Declined'
    ),
  'expiration_alert_days'=>14,


);
