<?php
	return array(

		'tender_valid_head_selects'=>array(

			'unmapped'=>'unmapped',
			'no'=>'no',
            'date'=>'date',
            'tender_no'=>'tender_no',
            'clients_tender_no'=>'clients_tender_no',
            'clients_name' => 	'clients_name',
            'brief_scope_description' => 	'brief_scope_description',
            'delivery_terms' => 	'delivery_terms',
            'closing_date' => 	'closing_date',
            'tender_system' => 	'tender_system',
            'bid_price_usd' => 	'bid_price_usd',
            'bid_price_euro' => 'bid_price_euro',
            'bid_price_idr' => 'bid_price_idr',
            'equivalent_bid_price_usd' => 'equivalent_bid_price_usd',
            'proposed_vendor' => 'proposed_vendor',
            'person_in_charge' => 'person_in_charge',
            'status' => 'status',
            'remarks' => 'remarks'
		),

		'project_valid_head_selects'=>array(

			'unmapped'=>'unmapped',
			'no'=>'no',
            'job_no' => 'job_no',
            'clients_po_contract_no' => 'clients_po_contract_no',
            'clients_name' => 	'clients_name',
            'brief_contract_scope_description' => 'brief_contract_scope_description',
            'delivery_terms' => 	'delivery_terms',
            'effective_date' => 'effective_date',
            'due_date' => 'due_date',
            'contract_price_usd' => 'contract_price_usd',
            'contract_price_euro' => 'contract_price_euro',
            'contract_price_idr' => 'contract_price_idr',
            'equivalent_contract_price_usd' => 'equivalent_contract_price_usd',
            'person_in_charge' => 'person_in_charge',
            'status' => 'status',
            'remarks' => 'remarks'
		),

		'project_map'=>array(
            'job_no' => 'projectNumber',
            'clients_po_contract_no' => 'clientPONumber',
            'clients_name' => 	'clientName',
            'brief_contract_scope_description' => 'briefScopeDescription',
            'delivery_terms' => 	'deliveryTerm',
            'effective_date' => 'effectiveDate',
            'due_date' => 'dueDate',
            'contract_price_usd' => 'contractPriceUSD',
            'contract_price_euro' =>'contractPriceEURO',
            'contract_price_idr' => 'contractPriceIDR',
            'equivalent_contract_price_usd' => 'equivalentContractPriceUSD',
            'person_in_charge' => 'projectPIC',
            'status' => 'projectStatus',
            'remarks' => 'projectRemark',

			//map to			

			//'projectNumber'=> '',
			//'clientPONumber'=> '',
			//'clientName'=> '',
			//'briefScopeDescription'=> '',
			//'deliveryTerm'=> '',
			//'effectiveDate'=> '',
			//'dueDate'=> '',
			//'projectVendor'=> '',
			//'projectPIC'=> '',
			//'contractPriceUSD'=> '',
			//'contractPriceEURO'=> '',
			//'contractPriceIDR'=> '',
			//'equivalentContractPriceUSD'=> '',
			//'projectStatus'=> '',
			//'projectRemark'=> '',
			//'projectApproval'=> '',
			//'projectShare'=> '',
			//'projectDepartment'=> '',
			//'projectLead'=> '',
			//'projectTag'=> '',


		),

		'project_template'=>array(

			'projectNumber'=> '',
			'clientPONumber'=> '',
			'clientName'=> '',
			'briefScopeDescription'=> '',
			'deliveryTerm'=> '',
			'effectiveDate'=> '',
			'dueDate'=> '',
			'projectVendor'=> '',
			'projectPIC'=> '',
			'contractPriceUSD'=> '',
			'contractPriceEURO'=> '',
			'contractPriceIDR'=> '',
			'equivalentContractPriceUSD'=> '',
			'projectStatus'=> '',
			'projectRemark'=> '',
			'projectApproval'=> '',
			'projectShare'=> '',
			'projectDepartment'=> '',
			'projectLead'=> '',
			'projectTag'=> '',
			
		),

		'tender_map'=>array(

            'date'=>'tenderDate',
            'tender_no'=>'tenderNumber',
            'clients_tender_no'=>'clientTenderNumber',
            'clients_name' => 	'clientName',
            'brief_scope_description' => 	'briefScopeDescription',
            'delivery_terms' => 	'deliveryTerm',
            'closing_date' => 	'closingDate',
            'tender_system' => 	'tenderSystem',
            'bid_price_usd' => 	'bidPriceUSD',
            'bid_price_euro' => 'bidPriceEURO',
            'bid_price_idr' => 'bidPriceIDR',
            'equivalent_bid_price_usd' => 'equivalentBidPriceUSD',
            'proposed_vendor' => 'proposedVendor',
            'person_in_charge' => 'tenderPIC',
            'status' => 'tenderStatus',
            'remarks' => 'tenderRemark',

            //map to

			//'bidPriceUSD'=> '',
			//'bidPriceEURO'=> '',
			//'bidPriceIDR'=> '',
			//'briefScopeDescription'=> '',
			//'clientName'=> '',
			//'clientTenderNumber'=> '',
			//'closingDate'=> '',
			//'deliveryTerm'=> '',
			//'equivalentBidPriceUSD'=> '100000',
			//'proposedVendor'=> '',
			//'tags'=> '',
			//'tenderApproval'=> '',
			//'tenderDate'=> '',
			//'tenderDepartment'=> '',
			//'tenderLead'=> '',
			//'tenderManagerId'=> '',
			//'tenderNumber'=> '',
			//'tenderPIC'=> '',
			//'tenderRemark'=> '',
			//'tenderShare'=> '',
			//'tenderStatus'=> '',
			//'tenderSystem'=> '',
			//'tenderTag'=> '' 			

		),

		'tender_template'=>array(

			'bidPriceUSD'=> '',
			'bidPriceEURO'=> '',
			'bidPriceIDR'=> '',
			'briefScopeDescription'=> '',
			'clientName'=> '',
			'clientTenderNumber'=> '',
			'closingDate'=> '',
			'deliveryTerm'=> '',
			'equivalentBidPriceUSD'=> '',
			'proposedVendor'=> '',
			'tags'=> array(),
			'tenderApproval'=> '',
			'tenderDate'=> '',
			'tenderDepartment'=> '',
			'tenderLead'=> '',
			'tenderManagerId'=> '',
			'tenderNumber'=> '',
			'tenderPIC'=> '',
			'tenderRemark'=> '',
			'tenderShare'=> '',
			'tenderStatus'=> '',
			'tenderSystem'=> '',
			'tenderTag'=> '' 			
		),



	);

?>