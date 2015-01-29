<?php
/* @var $this GalleryPhotoController */
/* @var $model GalleryPhoto */

$this->breadcrumbs=array(
	'Gallery Photos'=>array('index'),
	$model->Title=>array('view','id'=>$model->Id),
	'Update',
);

$this->menu=array(
	array('label'=>'List GalleryPhoto', 'url'=>array('index')),
	array('label'=>'Create GalleryPhoto', 'url'=>array('create')),
	array('label'=>'View GalleryPhoto', 'url'=>array('view', 'id'=>$model->Id)),
	array('label'=>'Manage GalleryPhoto', 'url'=>array('admin')),
);
?>

<h1>Update GalleryPhoto <?php echo $model->Id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>