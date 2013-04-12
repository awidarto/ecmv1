<?php

return array(

	'all'=>array(
			array('label'=>'General',
				'id'=>'parent',
				'children'=>array(
					array('label'=>'References','id'=>'references'),
					array('label'=>'Correspondences','id'=>'correspondences'),
					array('label'=>'Minutes of Meeting','id'=>'minutesofmeeting'),
					array('label'=>'Progress Report','id'=>'progressreport'),
				)

			),
			array('label'=>'Indoor Sales',
				'id'=>'parent',
				'children'=>array(
					array('label'=>'References','id'=>'references'),
					array('label'=>'Communication',
						'id'=>'parent',
						'children'=>array(
							array('label'=>'Letter','id'=>'letter'),
							array('label'=>'Email','id'=>'email'),
						)
					),
					array('label'=>'Minutes of Meeting','id'=>'minutesofmeeting'),
					array('label'=>'Progress Report','id'=>'progressreport'),
				)

			)
		),
	'indoor_sales'=>array(
		array('label'=>'All','id'=>'all'),
		array(
			'label'=>'General Files',
			'id'=>'parent',
			'children'=>array(
				array('label'=>'General Correspondences','id'=>'parent',
					'children'=>array(
						array('label'=>'Incoming','id'=>'parent',
							'children'=>array(
								array('label'=>'Letters','id'=>'incoming_letters'),
								array('label'=>'Faxes','id'=>'incoming_faxes'),
								array('label'=>'E-mails','id'=>'incoming_emails'),
							)
						),
						array('label'=>'Outgoing','id'=>'parent',
							'children'=>array(
								array('label'=>'Letters','parents'=>'general_correspondences::outgoing','id'=>'outgoing_letters'),
								array('label'=>'Faxes','id'=>'outgoing_faxes'),
								array('label'=>'E-mails','id'=>'outgoing_emails'),
							)
						)
					)
				),
				array('label'=>'Aggreements','id'=>'parent',
					'children'=>array(
						array('label'=>'Agency Aggreements','id'=>'parent',
							'children'=>array(
								array('label'=>'Goodwin','id'=>'goodwin'),
								array('label'=>'SRI','id'=>'sri'),
								array('label'=>'Others','id'=>'others'),
							)
						)
					)
				),
				array('label'=>'Tender Check List Form','id'=>'tender_checklist_form'),
				array('label'=>'Tender Estimate Form','id'=>'tender_estimate_forms'),
				array('label'=>'Tender Registers','id'=>'tender_registers'),
				array('label'=>'Job Registers','id'=>'job_registers')
			)
		),
		array('label'=>'Tender Related','id'=>'parent',
				'children'=>array(
					array('label'=>'Tender PreQualification','id'=>'parent',
						'children'=>array(
							array('label'=>'PQ Documents','id'=>'pq_documents'),
							array('label'=>'Response to PQ Documents','id'=>'response_pq_documents'),
							array('label'=>'Consortium Aggreements','id'=>'consortium_agreements'),
						)
					),
					array('label'=>'Bid / RFQ Documents ( w/ All Attachments)','id'=>'bid_rfq_docs'),
					array('label'=>'Administrative & Technical Proposal','id'=>'parent',
						'children'=>array(
								array('label'=>'Administrative & Technical Proposal Check List','id'=>'administrative_technical_proposal_check_list'),
								array('label'=>'Supporting Documents','id'=>'parent',
									'children'=>array(
										array('label'=>'Vendor/principal\'s Technical Proposal','id'=>'vendor_principal_technical_proposal'),
										array('label'=>'Subcontractor\'s Technical Proposal',	'id'=>'subcontractor_technical_proposal'),
										array('label'=>'Other Supporting Documents',			'id'=>'other_supporting_documents'),
									)
								),
								array('label'=>'Administrative & Technical Bid Proposal Submission','id'=>'administrative_technical_bid_proposal_submission')
							)
					),
					array('label'=>'Commercial Proposal','id'=>'parent',
						'children'=>array(
									array('label'=>'Commercial Proposal Check List','id'=>''),
									array('label'=>'Supporting Documents','id'=>'parent',
										'children'=>array(
											array('label'=>'Vendor/principal\'s Commercial Proposal','id'=>''),
											array('label'=>'Subcontractor\'s Commercial Proposal','id'=>''),
											array('label'=>'Other Supporting Documents','id'=>''),
										)),
									array('label'=>'Tender Estimate','id'=>''),
									array('label'=>'Commercial Bid Proposal Submission','id'=>'')
						)
					),
					array('label'=>'Correspondences','id'=>'parent',
						'children'=>array(
							array('label'=>'Incoming','id'=>'parent',
								'children'=>array(
									array('label'=>'Letters','id'=>'incoming_letters'),
									array('label'=>'Faxes','id'=>'incoming_faxes'),
									array('label'=>'E-mails','id'=>'incoming_emails'),
								)
							),
							array('label'=>'Outgoing','id'=>'parent',
								'children'=>array(
									array('label'=>'Letters','parents'=>'general_correspondences::outgoing','id'=>'tender_outgoing_letters'),
									array('label'=>'Faxes','id'=>'tender_outgoing_faxes'),
									array('label'=>'E-mails','id'=>'tender_outgoing_emails'),
								)
							)
						)
					),
					array('label'=>'Minutes Of Meeting (MoM)','id'=>'tender_minutes_of_meeting'),
					array('label'=>'Bid Opening Results','id'=>'bid_opening_result'),
				)
			),
			array('label'=>'Contract / PO / Aggreement','id'=>'parent',
				'children'=>array(
					array('label'=>'With Client','id'=>'minutes_of_meeting'),
					array('label'=>'With Vendor / Principal','id'=>'bid_opening_result'),
					array('label'=>'With Subcontractor / 3rd Party','id'=>'bid_opening_result'),
				)
			)

	),

);

/*

/*
Tender Pre-qualification
	PQ Document
	response To PQ Document
	consortium Agreement (if Applicable)
Bid / RFQ Document (c/w All Attachments)
Administrative & Technical Proposal
	Administrative & Technical Proposal Check List
	Supporting Documents
		Vendor/principal's Technical Proposal
		Subcontractor's Technical Proposal
		Other Supporting Documents
		a.	supporting Letters From Vendor/principal
	Administrative & Technical Bid Proposal Submission
Commercial Proposal
	Commercial Proposal Check List
	Supporting Documents
		Vendor/principal's Commercial Proposal
		Subcontractor's Commercial Proposal
		Other Supporting Documents
		a. Bid Bond
	Tender Estimate
	Commercial Bid Proposal Submission
Correspondences
	Incoming Correspondences
		Letters
		Faxes
		E-mails
	Outgoing Correspondences
		Letters
		Faxes
		E-mails
Minutes Of Meeting (MoM)


[
	{"label":"General",
		"children":[
			{"label":"References","id":"references"},
			{"label":"Correspondences","id":"correspondences"},
			{"label":"Minutes of Meeting","id":"minutesofmeeting"},
			{"label":"Progress Report","id":"progressreport"}
		]
	},
	{
		"label":"Indoor Sales",
		"children":[
			{"label":"References","id":"references"},
			{"label":"Communication",
				"children":[
					{"label":"Letter","id":"letter"},
					{"label":"Email","id":"email"}
				]
			},
			{"label":"Minutes of Meeting","id":"minutesofmeeting"},
			{"label":"Progress Report","id":"progressreport"}
		]
	}
];

*/

?>


