<?php $this->beginContent('/layouts/main'); ?>
	<div id="content">
		<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
				'htmlOptions'=>array(
					'class'=>''
				)
			));
		$this->widget('bootstrap.widgets.TbMenu', array(
				'type'=>'pills',
				'items'=>$this->menu,
			));
		$this->endWidget();
		echo $content; ?>
</div>
<?php $this->endContent(); ?>