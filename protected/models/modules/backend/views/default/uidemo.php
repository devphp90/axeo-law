<h1>UI Demo - <?php echo ucfirst($type)?></h1>
<?php
$this->beginWidget('zii.widgets.CPortlet', array(
		'htmlOptions'=>array(
			'class'=>''
		)
	));
$this->widget('bootstrap.widgets.TbMenu', array(
		'type'=>'pills',
		'items'=>array(
	array(	
		'label'=>Yii::t('app','Components'), 
		'active'=>$type == 'component'?true:false,
		'url'=>$this->createUrl('uidemo',array('type'=>'component')), 
	),
	array(
		'label'=>Yii::t('app','Grid'), 
		'active'=>$type == 'grid'?true:false,
		'url'=>$this->createUrl('uidemo',array('type'=>'grid')), 
	),
	array(
		'label'=>Yii::t('app','Plugins'), 
		'active'=>$type == 'plugin'?true:false,
		'url'=>$this->createUrl('uidemo',array('type'=>'plugin')), 
	),
	array(
		'label'=>Yii::t('app','Javascript'), 
		'active'=>$type == 'javascript'?true:false,
		'url'=>$this->createUrl('uidemo',array('type'=>'javascript')), 

	),
),
	));
$this->endWidget();
$this->renderPartial('_uidemo_'.$type);
?>
