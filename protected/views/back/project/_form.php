<?php
/* @var $this GalleryController */
/* @var $model Gallery */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('booster.widgets.TbActiveForm', array(
	'id'=>'gallery-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->textFieldGroup($model,'Title',array('size'=>60,'maxlength'=>80)); ?>
	</div>
    
	<div class="row">
		<?php echo $form->datePickerGroup($model,'TransDate', array('widgetOptions'=>array('options'=>array('format'=>'yyyy-mm-dd')))); ?>
	</div>

	<div class="row">
		<?php echo $form->checkBoxGroup($model,'Pinned'); ?>
	</div>
	<div class="row">
		<?php echo $form->ckEditorGroup($model,'Content',array('size'=>60,'maxlength'=>5000)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->