<?php
/* @var $this ConfigurationController */
/* @var $data Configuration */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id), array('view', 'id'=>$data->Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LoyaltyPointConversionRate')); ?>:</b>
	<?php echo CHtml::encode($data->LoyaltyPointConversionRate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('AmountToGetALoyaltyPoint')); ?>:</b>
	<?php echo CHtml::encode($data->AmountToGetALoyaltyPoint); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('AdminEmail')); ?>:</b>
	<?php echo CHtml::encode($data->AdminEmail); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NewArrivalCutOffDate')); ?>:</b>
	<?php echo CHtml::encode($data->NewArrivalCutOffDate); ?>
	<br />


</div>