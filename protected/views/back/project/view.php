<?php
/* @var $this GalleryController */
/* @var $model Gallery */

$this->breadcrumbs=array(
	'Galleries'=>array('index'),
	$model->Title,
);

$this->menu=array(
	array('label'=>'List Gallery', 'url'=>array('index')),
	array('label'=>'Create Gallery', 'url'=>array('create')),
	array('label'=>'Update Gallery', 'url'=>array('update', 'id'=>$model->Id)),
	array('label'=>'Delete Gallery', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Gallery', 'url'=>array('admin')),
	array('label'=>'Create Gallery Photo', 'url'=>array('GalleryPhoto/create','gallery'=>$model->Id)),
);
?>

<h1>View Gallery #<?php echo $model->Id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Title',
		'Content',
        'TransDate',
		array(
            'name'=>'Pinned',
            'value'=>Helper::getBooleanTextValue($model->Pinned),
        ),
	),
)); ?>
<br />
<?php
$this->widget(
    'booster.widgets.TbTabs',
    array(
        'type' => 'tabs', // 'tabs' or 'pills'
        'tabs' => array(
            array(
                'label' => 'Photos',
                'content' => $this->renderPartial('photos',array('model'=>$photosDataProvider), true),
                'active' => true
            ),
        ),
    )
);
?>
