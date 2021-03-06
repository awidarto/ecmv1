<?php return array(
  'roles'=>array( 
      'root'=>'Root',
      'super'=>'Superuser',
      'president'=>'President Director',
      'bod'=>'Board of Director',
      'financedirector'=>'Finance Director',
      'hrdirector'=>'HR Director',
      'financemanager'=>'Finance Manager',
      'hrmanager'=>'HR Manager',
      'employee'=>'Employee',
      'client'=>'Client',
      'vendor'=>'Vendor'
    ),
  'access'=>array( 'all'=>'all','restrict'=>'restrict','client'=>'client','vendor'=>'vendor'),
  'permissions'=>array('read'=>'read','create'=>'create','edit'=>'edit','delete'=>'delete','approve'=>'approve','share'=>'share','download'=>'download'),
  'aclobjects'=>array(
  		'document'=>'Document',
  		'user'=>'User',
  		'employee'=>'Employee',
  		'contact'=>'Contact',
  		'project'=>'Project',
  		'tender'=>'Tender',
  		'invoice'=>'Invoice',
  		'payroll'=>'Payroll',
  		'finance'=>'Finance',
  		'hr'=>'Human Resource'
  	)
);
