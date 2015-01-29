<?php
/* @var $this BannerPhotoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Banner Photos',
);

$this->menu=array(
	array('label'=>'Create BannerPhoto', 'url'=>array('create')),
	array('label'=>'Manage BannerPhoto', 'url'=>array('admin')),
);
?>

<h1>Banner Photos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
