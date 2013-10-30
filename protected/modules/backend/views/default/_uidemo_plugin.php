<link href="/css/docs.css" rel="stylesheet">
<div class="row">
 <div class="span3 bs-docs-sidebar">
        <ul class="nav nav-list bs-docs-sidenav">
           <li><a href="#intro"><i class="icon-chevron-right"></i> Intro</a></li>
                <li><a href="#accordion"><i class="icon-chevron-right"></i> Accordion</a></li>
                <li><a href="#button"><i class="icon-chevron-right"></i> Button</a></li>
                <li><a href="#datepicker"><i class="icon-chevron-right"></i> DatePicker</a></li>
                <li><a href="#dialog"><i class="icon-chevron-right"></i> Dialog</a></li>
                <li><a href="#progress"><i class="icon-chevron-right"></i> Progress Bar</a></li>
                <li><a href="#slider"><i class="icon-chevron-right"></i> Slider</a></li>
                <li><a href="#tabs"><i class="icon-chevron-right"></i> Tabs</a></li>
        </ul>
      </div>
      <div class="span9">
      		 <!-- intro nav
	   ================================================== -->
            <section id="intro">

                <h2>JQuery UI Bootstrap
                    <small>A Bootstrap-themed kickstart for JQuery UI widgets</small>
                </h2>
                <p>
                    We came across of <a target="_blank" href="http://addyosmani.github.com/jquery-ui-bootstrap/">Addyosmani's</a> work
	                on JQuery's UI CSS to have a Bootstrap look-alike theme and we thought that could be a good asset to YiiBooster. This
	                way we can still make use of Yii's Jui library widgets with Bootstrap's design.
                </p>

            </section>

            <!-- accordion nav
				 ================================================== -->
            <section id="accordion">
                <h2>CJuiAccordion</h2>
	            <p>
		            For more information, please visit:
		            <a target="_blank" href="http://www.yiiframework.com/doc/api/1.1/CJuiAccordion">http://www.yiiframework.com/doc/api/1.1/CJuiAccordion</a>
	            </p>
                <div class="bs-docs-example">
					<?php
					$this->widget('zii.widgets.jui.CJuiAccordion', array(
	'panels'=>array(
		'panel 1'=>'content for panel 1',
		'panel 2'=>'content for panel 2',
		// panel 3 contains the content rendered by a partial view
		// 'panel 3'=>$this->renderPartial('_partial',null,true),
	),
	// additional javascript options for the accordion plugin
	'options'=>array(
		'animated'=>'bounceslide',
	),
));
					?>
                </div>
<pre class="prettyprint linenums">
$this->widget('zii.widgets.jui.CJuiAccordion', array(
	'panels'=>array(
		'panel 1'=>'content for panel 1',
		'panel 2'=>'content for panel 2',
		// panel 3 contains the content rendered by a partial view
		// 'panel 3'=>$this->renderPartial('_partial',null,true),
	),
	// additional javascript options for the accordion plugin
	'options'=>array(
		'animated'=>'bounceslide',
	),
));
</pre>
            </section>
            <!-- autocomplete nav
					================================================== -->
            <section id="autocomplete">
                <h2>CJuiAutoComplete</h2>
                <p>
                    For more information, please visit:
                    <a target="_blank" href="http://www.yiiframework.com/doc/api/1.1/CJuiAutoComplete">http://www.yiiframework.com/doc/api/1.1/CJuiAutoComplete</a>
                </p>
                <div class="bs-docs-example">
		            <?php
		            $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
    'name'=>'city',
    'source'=>array('ac1', 'ac2', 'ac3'),
    // additional javascript options for the autocomplete plugin
    'options'=>array(
        'minLength'=>'2',
    ),
    'htmlOptions'=>array(
        'style'=>'height:20px;'
    ),
));
		            ?>
                </div>
<pre class="prettyprint linenums">
$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
    'name'=>'city',
    'source'=>array('ac1', 'ac2', 'ac3'),
    // additional javascript options for the autocomplete plugin
    'options'=>array(
        'minLength'=>'2',
    ),
    'htmlOptions'=>array(
        'style'=>'height:20px;'
    ),
));
</pre>
            </section>
            <!-- button nav
					   ================================================== -->
            <section id="button">
                <h2>CJuiButton</h2>
                <p>
                    For more information, please visit:
                    <a target="_blank" href="http://www.yiiframework.com/doc/api/1.1/CJuiButton">http://www.yiiframework.com/doc/api/1.1/CJuiButton</a>
                </p>
	            <h3>Button</h3>
                <div class="bs-docs-example">
			        <?php
			        $this->widget('zii.widgets.jui.CJuiButton', array(
'name'=>'submit',
'caption'=>'Save',
// you can easily change the look of the button by providing the correct class
// ui-button-error, ui-button-primary, ui-button-success
'htmlOptions' => array('class'=>'ui-button-error'),
'onclick'=>new CJavaScriptExpression('function(){alert("Yes");}'),
));
			        ?>
			        <br/>
			        <br/>
                </div>
<pre class="prettyprint linenums">
$this->widget('zii.widgets.jui.CJuiButton', array(
'name'=>'submit',
'caption'=>'Save',
// you can easily change the look of the button by providing the correct class
// ui-button-error, ui-button-primary, ui-button-success
'htmlOptions' => array('class'=>'ui-button-error'),
'onclick'=>new CJavaScriptExpression('function(){alert("Yes");}'),
));
</pre>
                <h3>Radio Button</h3>
                <div class="bs-docs-example">
		           <?php $radio = $this->beginWidget('zii.widgets.jui.CJuiButton', array(
    'name'=>'btnradio',
    'buttonType'=>'buttonset'
)); ?>
<input type="radio" id="radio1" name="radio" /><label for="radio1">Choice 1</label>
<input type="radio" id="radio2" name="radio" checked="checked" /><label for="radio2">Choice 2</label>
<input type="radio" id="radio3" name="radio" /><label for="radio3">Choice 3</label>
<?php $this->endWidget();?>
<br/>
                </div>
<pre class="prettyprint linenums">
&lt;?php $radio = $this-&gt;beginWidget('zii.widgets.jui.CJuiButton', array(
    'name'=&gt;'btnradio',
    'buttonType'=&gt;'buttonset'
)); ?&gt;
&lt;input type=&quot;radio&quot; id=&quot;radio1&quot; name=&quot;radio&quot; /&gt;&lt;label for=&quot;radio1&quot;&gt;Choice 1&lt;/label&gt;
&lt;input type=&quot;radio&quot; id=&quot;radio2&quot; name=&quot;radio&quot; checked=&quot;checked&quot; /&gt;&lt;label for=&quot;radio2&quot;&gt;Choice 2&lt;/label&gt;
&lt;input type=&quot;radio&quot; id=&quot;radio3&quot; name=&quot;radio&quot; /&gt;&lt;label for=&quot;radio3&quot;&gt;Choice 3&lt;/label&gt;
&lt;?php $this-&gt;endWidget();?&gt;
</pre>
                <h3>CheckBoxes</h3>
                <div class="bs-docs-example">
                </div>
<pre class="prettyprint linenums">
&lt;?php $radio = $this-&gt;beginWidget('zii.widgets.jui.CJuiButton', array(
    'name'=&gt;'btnradio',
    'buttonType'=&gt;'buttonset'
)); ?&gt;
&lt;input type=&quot;checkbox&quot; id=&quot;check1&quot; /&gt;&lt;label for=&quot;check1&quot;&gt;B&lt;/label&gt;
&lt;input type=&quot;checkbox&quot; id=&quot;check2&quot; /&gt;&lt;label for=&quot;check2&quot;&gt;I&lt;/label&gt;
&lt;input type=&quot;checkbox&quot; id=&quot;check3&quot; /&gt;&lt;label for=&quot;check3&quot;&gt;U&lt;/label&gt;
&lt;?php $this-&gt;endWidget();?&gt;
</pre>
            </section>
            <!-- datepicker nav
					   ================================================== -->
            <section id="datepicker">
                <h2>CJuiDatePicker</h2>
                <p>
                    For more information, please visit:
                    <a target="_blank" href="http://www.yiiframework.com/doc/api/1.1/CJuiDatePicker">http://www.yiiframework.com/doc/api/1.1/CJuiDatePicker</a>
                </p>
                <div class="bs-docs-example">
		            <?php
		            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
    'name'=>'publishDate',
    // additional javascript options for the date picker plugin
    'options'=>array(
        'showAnim'=>'fold',
    ),
    'htmlOptions'=>array(
        'style'=>'height:20px;'
    ),
));
		            ?>
                </div>
<pre class="prettyprint linenums">
$this->widget('zii.widgets.jui.CJuiDatePicker', array(
    'name'=>'publishDate',
    // additional javascript options for the date picker plugin
    'options'=>array(
        'showAnim'=>'fold',
    ),
    'htmlOptions'=>array(
        'style'=>'height:20px;'
    ),
));
</pre>
            </section>
            <!-- dialog nav
						  ================================================== -->
            <section id="dialog">
                <h2>CJuiDialog</h2>
                <p>
                    For more information, please visit:
                    <a target="_blank" href="http://www.yiiframework.com/doc/api/1.1/CJuiDialog">http://www.yiiframework.com/doc/api/1.1/CJuiDialog</a>
                </p>
                <div class="bs-docs-example">
		            <?php
		            $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
'id'=>'mydialog',
// additional javascript options for the dialog plugin
'options'=>array(
    'title'=>'Dialog box 1',
    'autoOpen'=>false,
    'buttons' => array(
        array('text'=>'Close','click'=> 'js:function(){$(this).dialog("close");}'),
        array('text'=>'Cancel','click'=> 'js:function(){$(this).dialog("close");}'),
    ),
),
));

echo 'dialog content here';

$this->endWidget('zii.widgets.jui.CJuiDialog');

// the button that may open the dialog
$this->widget('zii.widgets.jui.CJuiButton', array(
    'name'=>'btndialog',
    'caption'=>'Open Dialog',
    'onclick'=>new CJavaScriptExpression('function(){$("#mydialog").dialog("open"); return false;}'),
));
		            ?>
		            <br/>
		            <br/>
                </div>
<pre class="prettyprint linenums">
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
'id'=>'mydialog',
// additional javascript options for the dialog plugin
'options'=>array(
    'title'=>'Dialog box 1',
    'autoOpen'=>false,
    'buttons' => array(
        array('text'=>'Close','click'=> 'js:function(){$(this).dialog("close");}'),
        array('text'=>'Cancel','click'=> 'js:function(){$(this).dialog("close");}'),
    ),
),
));

echo 'dialog content here';

$this->endWidget('zii.widgets.jui.CJuiDialog');

// the button that may open the dialog
$this->widget('zii.widgets.jui.CJuiButton', array(
    'name'=>'btndialog',
    'caption'=>'Open Dialog',
    'onclick'=>new CJavaScriptExpression('function(){$("#mydialog").dialog("open"); return false;}'),
));
</pre>
	            </section>
            <!-- progress nav
						  ================================================== -->
            <section id="progress">
                <h2>CJuiProgressBar</h2>
                <p>
                    For more information, please visit:
                    <a target="_blank" href="http://www.yiiframework.com/doc/api/1.1/CJuiProgressBar">http://www.yiiframework.com/doc/api/1.1/CJuiProgressBar</a>
                </p>
                <div class="bs-docs-example">
		            <?php
		            $this->widget('zii.widgets.jui.CJuiProgressBar', array(
    'value'=>75,
    // additional javascript options for the progress bar plugin
    'options'=>array(
        'change'=>new CJavaScriptExpression('function(event, ui) {}'),
    ),
    'htmlOptions'=>array(
        'style'=>'height:20px;'
    ),
));
		            ?>
		            <br/>
                </div>
<pre class="prettyprint linenums">
$this->widget('zii.widgets.jui.CJuiProgressBar', array(
    'value'=>75,
    // additional javascript options for the progress bar plugin
    'options'=>array(
        'change'=>new CJavaScriptExpression('function(event, ui) {...}'),
    ),
    'htmlOptions'=>array(
        'style'=>'height:20px;'
    ),
));
</pre>       </section>
            <!-- slider nav
							 ================================================== -->
            <section id="slider">
                <h2>CJuiSlider</h2>
                <p>
                    For more information, please visit:
                    <a target="_blank" href="http://www.yiiframework.com/doc/api/1.1/CJuiSlider">http://www.yiiframework.com/doc/api/1.1/CJuiSlider</a>
                </p>
                <div class="bs-docs-example">
	               <?php
	               $this->widget('zii.widgets.jui.CJuiSlider', array(
    'value'=>37,
    // additional javascript options for the slider plugin
    'options'=>array(
        'min'=>10,
        'max'=>50,
    ),
));
	               ?>
	               <br/>
                </div>
<pre class="prettyprint linenums">
// simple example
$this->widget('zii.widgets.jui.CJuiSlider', array(
    'value'=>37,
    // additional javascript options for the slider plugin
    'options'=>array(
        'min'=>10,
        'max'=>50,
    ),
));

// range slider
$this->widget('zii.widgets.jui.CJuiSlider', array(
    'options'=>array(
        'min'=>10,
        'max'=>50,
        'range'=>true,
        'values'=>array(5, 20)
    ),
));
</pre>       </section>
            <!-- tabs nav
							 ================================================== -->
            <section id="tabs">
                <h2>CJuiTabs</h2>
                <p>
                    For more information, please visit:
                    <a target="_blank" href="http://www.yiiframework.com/doc/api/1.1/CJuiTabs">http://www.yiiframework.com/doc/api/1.1/CJuiTabs</a>
                </p>
                <div class="bs-docs-example">
		            <?php
		            $this->widget('zii.widgets.jui.CJuiTabs', array(
    'tabs'=>array(
        'StaticTab 1'=>'Content for tab 1',
        'StaticTab 2'=>array('content'=>'Content for tab 2', 'id'=>'tab2'),
        // panel 3 contains the content rendered by a partial view
        // 'AjaxTab'=>array('ajax'=>$ajaxUrl),
    ),
    // additional javascript options for the tabs plugin
    'options'=>array(
        'collapsible'=>true,
    ),
));
		            ?>
                </div>
<pre class="prettyprint linenums">
$this->widget('zii.widgets.jui.CJuiTabs', array(
    'tabs'=>array(
        'StaticTab 1'=>'Content for tab 1',
        'StaticTab 2'=>array('content'=>'Content for tab 2', 'id'=>'tab2'),
        // panel 3 contains the content rendered by a partial view
        // 'AjaxTab'=>array('ajax'=>$ajaxUrl),
    ),
    // additional javascript options for the tabs plugin
    'options'=>array(
        'collapsible'=>true,
    ),
));
</pre>       </section>
      </div>
</div>

