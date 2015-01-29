<?php
/* @var $this GalleryPhotoController */
/* @var $model GalleryPhoto */

$this->breadcrumbs=array(
	'Gallery Photos'=>array('index'),
	$model->Title,
);

$this->menu=array(
	array('label'=>'List GalleryPhoto', 'url'=>array('index')),
	array('label'=>'Create GalleryPhoto', 'url'=>array('create')),
	array('label'=>'Update GalleryPhoto', 'url'=>array('update', 'id'=>$model->Id)),
	array('label'=>'Delete GalleryPhoto', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage GalleryPhoto', 'url'=>array('admin')),
);
?>

<h1>View GalleryPhoto #<?php echo $model->Id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Id',
		array(
            'name'=>'Gallery',
            'value'=>$model->gallery->Title,
        ),
		'Title',
		'Sequence',
		'Photo',
        array(
            'name'=>'Photo Display',
            'type'=>'raw',
            'value'=>html_entity_decode(CHtml::image(Yii::app()->request->baseUrl.'/images/galleryphoto/'.$model->Photo,$model->Title,array('width'=>341,'height'=>232)))
        ),
		array(
            'name'=>'IsActive',
            'value'=>Helper::getBooleanTextValue($model->IsActive),
        ),
	),
)); ?>
