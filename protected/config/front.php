<?php
return CMap::mergeArray(
    require(dirname(__FILE__).'/main.php'),
    array(
        'theme'=>'xenia',
	'components'=>array(
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'' => 'Site'
			),
		),
	),
    )
);