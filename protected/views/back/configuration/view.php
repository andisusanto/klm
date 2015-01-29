<?php
/* @var $this ConfigurationController */
/* @var $model Configuration */

$this->breadcrumbs=array(
	'Configurations'=>array('index'),
	$model->Id,
);

$this->menu=array(
	array('label'=>'List Configuration', 'url'=>array('index')),
	array('label'=>'Create Configuration', 'url'=>array('create')),
	array('label'=>'Update Configuration', 'url'=>array('update', 'id'=>$model->Id)),
	array('label'=>'Delete Configuration', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Configuration', 'url'=>array('admin')),
);
?>

<h1>View Configuration #<?php echo $model->Id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Id',
		'LoyaltyPointConversionRate',
		'AmountToGetALoyaltyPoint',
		'AdminEmail',
		'NewArrivalCutOffDate',
	),
)); ?>
