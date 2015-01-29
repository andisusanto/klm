<?php
/* @var $this GalleryPhotoController */
/* @var $data GalleryPhoto */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Title')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Title), array('galleryPhoto/view', 'id'=>$data->Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Sequence')); ?>:</b>
	<?php echo CHtml::encode($data->Sequence); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Photo')); ?>:</b>
	<?php echo CHtml::encode($data->Photo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IsActive')); ?>:</b>
	<?php echo CHtml::encode(Helper::getBooleanTextValue($data->IsActive)); ?>
	<br />


</div>