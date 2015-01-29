<?php
/* @var $this BannerPhotoController */
/* @var $model BannerPhoto */

$this->breadcrumbs=array(
	'Banner Photos'=>array('index'),
	$model->Title,
);

$this->menu=array(
	array('label'=>'List BannerPhoto', 'url'=>array('index')),
	array('label'=>'Create BannerPhoto', 'url'=>array('create')),
	array('label'=>'Update BannerPhoto', 'url'=>array('update', 'id'=>$model->Id)),
	array('label'=>'Delete BannerPhoto', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BannerPhoto', 'url'=>array('admin')),
);
?>

<h1>View BannerPhoto #<?php echo $model->Id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Id',
		'Sequence',
		'Title',
		'Photo',
        array(
            'name'=>'Photo Display',
            'type'=>'raw',
            'value'=>html_entity_decode(CHtml::image(Yii::app()->request->baseUrl.'/images/bannerphoto/'.$model->Photo,$model->Title,array('width'=>341,'height'=>232))),
        ),
		array(
            'name'=>'Active',
            'value'=>Helper::getBooleanTextValue($model->Active),
        ),
	),
)); ?>
