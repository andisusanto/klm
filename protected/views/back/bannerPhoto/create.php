<?php
/* @var $this BannerPhotoController */
/* @var $model BannerPhoto */

$this->breadcrumbs=array(
	'Banner Photos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List BannerPhoto', 'url'=>array('index')),
	array('label'=>'Manage BannerPhoto', 'url'=>array('admin')),
);
?>

<h1>Create BannerPhoto</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>