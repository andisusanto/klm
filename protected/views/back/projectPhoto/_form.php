<?php
/* @var $this GalleryPhotoController */
/* @var $model GalleryPhoto */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('booster.widgets.TbActiveForm', array(
	'id'=>'gallery-photo-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
    'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
    ),
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->textFieldGroup($model,'Sequence',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->textFieldGroup($model,'Title',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->fileFieldGroup($model,'PhotoFile',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->checkBoxGroup($model,'IsActive'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>
    <?php if($model->isNewRecord!='1'){ ?>
    <div class="row">
         <?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/galleryphoto/'.$model->Photo,"Photo",array("width"=>200)); ?>
    </div>
    <?php }?>

<?php $this->endWidget(); ?>

</div><!-- form -->