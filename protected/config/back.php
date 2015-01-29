<?php
return CMap::mergeArray(
    require(dirname(__FILE__).'/main.php'),
    array(
	'components'=>array(
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'' => 'Product'
			),
		),
	),
    )
);