<?php
/* @var $this GalleryController */
/* @var $data Gallery */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Title')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Title), array('view', 'id'=>$data->Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TransDate')); ?>:</b>
	<?php echo CHtml::encode($data->TransDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Pinned')); ?>:</b>
	<?php echo CHtml::encode($data->Pinned); ?>
	<br />


</div>