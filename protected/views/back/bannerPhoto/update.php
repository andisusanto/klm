<?php
/* @var $this BannerPhotoController */
/* @var $model BannerPhoto */

$this->breadcrumbs=array(
	'Banner Photos'=>array('index'),
	$model->Title=>array('view','id'=>$model->Id),
	'Update',
);

$this->menu=array(
	array('label'=>'List BannerPhoto', 'url'=>array('index')),
	array('label'=>'Create BannerPhoto', 'url'=>array('create')),
	array('label'=>'View BannerPhoto', 'url'=>array('view', 'id'=>$model->Id)),
	array('label'=>'Manage BannerPhoto', 'url'=>array('admin')),
);
?>

<h1>Update BannerPhoto <?php echo $model->Id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>