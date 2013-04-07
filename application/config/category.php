<?php

return array(

	'all'=>array(
			array('label'=>'General',

				'children'=>array(
					array('label'=>'References','id'=>'references'),
					array('label'=>'Correspondences','id'=>'correspondences'),
					array('label'=>'Minutes of Meeting','id'=>'minutesofmeeting'),
					array('label'=>'Progress Report','id'=>'progressreport'),
				)

			),
			array('label'=>'Indoor Sales',

				'children'=>array(
					array('label'=>'References','id'=>'references'),
					array('label'=>'Communication',

						'children'=>array(
							array('label'=>'Letter','id'=>'letter'),
							array('label'=>'Email','id'=>'email'),
						)
					),
					array('label'=>'Minutes of Meeting','id'=>'minutesofmeeting'),
					array('label'=>'Progress Report','id'=>'progressreport'),
				)

			)
		)

);

/*

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


