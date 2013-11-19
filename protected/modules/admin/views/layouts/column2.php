<?php $this->beginContent('/layouts/main'); ?>
	<div id="content">
		<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
				'htmlOptions'=>array(
					'class'=>''
				)
			));
			?>
			<div id="submenu-action" class="well well-small">
			<?php
		$this->widget('bootstrap.widgets.TbMenu', array(
				'type'=>'pills',
				'items'=>$this->menu,
			));
			?>
			</div>
			<?php 
		$this->endWidget();
		echo $content; ?>
</div>
<?php $this->endContent(); ?>