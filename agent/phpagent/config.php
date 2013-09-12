<?php

$defcat = array(
    'general'=>'general_correspondences_incoming_emails',
    'outdoor_sales'=>'os_general_correspondences_incoming_emails',
    'indoor_sales'=>'is_general_correspondences_incoming_emails',
    'project_control'=>'pc_correspondences_incoming_emails',
    'bod'=>'bod_general_incoming_emails',
    'president_director'=>'pd_correspondences_incoming_emails',
    'operations_director'=>'od_correspondences_incoming_emails',
    'finance_hr_director'=>'fa_correspondences_incoming_emails',
    'finance_pusat'=>'fa_correspondences_incoming_emails',
    'finance_kemang'=>'fa_correspondences_incoming_emails',
    'finance_balikpapan'=>'fabp_correspondences_incoming_emails',
    'sales_kemang'=>'is_general_correspondences_incoming_emails',
    'sales_balikpapan'=>'smbp_general_correspondences_incoming_emails',
    'tender_balikpapan'=>'btbp_general_correspondences_incoming_emails',
    'hr_admin'=>'fa_correspondences_incoming_emails',
    'warehouse'=>'warehouse_incoming_emails',
    'qc'=>'qc_incoming_emails',
    'clients'=>'client_general_incoming_emails',
    'principal_vendor'=>'vendor_general_incoming_emails',
    'subcon'=>'subcon_incoming_emails'
);

$doctmpl = array(

        'title'=> '',
        'docFormat'=> 'email',
        'access'=> 'confidential',
        'interaction'=> 'ro',
        'docTag'=> '',
        'effectiveDate'=> new MongoDate(),
        'expiryDate'=> '',
        'alert'=> 'No',
        'alertStart'=> 0,
        'docShare'=> '',
        'docApprovalRequest'=> '',
        'docDepartment'=> '',
        'docCategoryLabel'=> 'E-mails',
        'docCategoryParents'=> '',
        'docCategory'=> '',
        'docOriginalTemplate'=> 'none',
        'docRemarks'=> '',
        'docRevisionOf'=> '',
        'docProject'=> '',
        'docProjectId'=> '',
        'docProjectTitle'=> '',
        'docTender'=> '',
        'docTenderId'=> '',
        'docTenderTitle'=> '',
        'docOpportunity'=> '',
        'docOpportunityId'=> '',
        'docOpportunityTitle'=> '',
        'expiring'=> 0,
        'createdDate'=> new MongoDate(),
        'lastUpdate'=> new MongoDate(),
        'creatorName'=> '',
        'creatorId'=> '',
        'useAsTemplate'=> 'No',
        'sharedEmails'=> [],
        'sharedIds'=> [],
        'approvalRequestEmails'=> [],
        'approvalRequestIds'=> [],
        'docFilename'=> '',
        'docFiledata'=> {},
        'docFileList'=> '',
        'docEmailInput'=> 1,
        'tags'=> []
    );





?>