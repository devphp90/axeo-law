<link href="/css/docs.css" rel="stylesheet">
<div class="row">
	<div class="span3 bs-docs-sidebar">
        <ul class="nav nav-list bs-docs-sidenav">
			<li><a href="#transitions"><i class="icon-chevron-right"></i> Transitions</a></li>
			<li><a href="#modals"><i class="icon-chevron-right"></i> Modal</a></li>
			<li><a href="#dropdowns"><i class="icon-chevron-right"></i> Dropdown</a></li>
			<li><a href="#scrollspy"><i class="icon-chevron-right"></i> Scrollspy</a></li>
			<li><a href="#tabs"><i class="icon-chevron-right"></i> Tab</a></li>
			<li><a href="#tooltips"><i class="icon-chevron-right"></i> Tooltip</a></li>
			<li><a href="#popovers"><i class="icon-chevron-right"></i> Popover</a></li>
			<li><a href="#alerts"><i class="icon-chevron-right"></i> Alert</a></li>
			<li><a href="#buttons"><i class="icon-chevron-right"></i> Button</a></li>
			<li><a href="#collapse"><i class="icon-chevron-right"></i> Collapse</a></li>
			<li><a href="#carousel"><i class="icon-chevron-right"></i> Carousel</a></li>
			<li><a href="#typeahead"><i class="icon-chevron-right"></i> Typeahead</a></li>
			<li><a href="#affix"><i class="icon-chevron-right"></i> Affix</a></li>
        </ul>
    </div>
    <div class="span9">
    	<!-- extendedgridview nav
		   ================================================== -->
<section id="extendedgridview">

    <h2>TbExtendedGridView
        <small>bootstrap.widgets.TbExtendedGridView</small>
    </h2>
    <p>
	    Have you ever thought to display a more <span rel="popover" data-trigger="hover" data-html="1" data-title="test" data-content="My content">elaborated</span> summary of the data displayed on your grid? Or
        wanted to have a
        fixed header as you go down on thousand records? What about if you wish to display a chart of the
        data but not
        willing to leave the grid? And also, you wish to maintain that awesomeness even throughout AJAX calls?
        And what about if we tell you that we have done that?
    </p>

    <p>
        With <strong>TbExtendedGridView</strong> you will be able to solve all those issues, plus we have also
        included some other columns that will help make the grid even more powerful:
    <ul>
        <li><strong>TbJEditableColumn</strong> - for inline editing</li>
        <li><strong>TbTotalSumColumn</strong> - to sum up the total of a column and display it at its footer</li>
    </ul>
    </p>

    <p>
	    <span class="label label-important">New</span> by setting the <code>responsiveTable</code> property to <code>true</code> (this is
	    for all extended versions of TbGridView), tables will be automatically converted to suit mobile size. Try it by resizing the
	    browser window and check this first example.
    </p>

    <h3>Fixed Header</h3>

    <p>
        Thanks to the great jquery plugin <a target="_blank" href="https://github.com/jmosbech/StickyTableHeaders">StickyTableHeaders</a>
        we have managed to get this feature
        and make it as easy as to setup a simple boolean <code>fixedHeader</code> property to <code>true</code>.
    </p>

    <p><span class="label label-info">Note</span> It is important for the sake of the following examples that you reduce
        the height of your browser to see the effect.</p>

    <div class="bs-docs-example">
		<div id="yw0" class="grid-view">
<table class="items table table-striped">
<thead>
<tr>
<th id="yw0_c0">#</th><th id="yw0_c1">First name</th><th id="yw0_c2">Last name</th><th id="yw0_c3">Language</th><th id="yw0_c4">Hours worked</th><th class="button-column" id="yw0_c5">Edit</th></tr>
</thead>
<tbody>
<tr class="odd"><td style="width: 60px">1</td><td>Mark</td><td>Otto</td><td>CSS</td><td class="tobeselected">10</td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td></tr>
<tr class="even"><td style="width: 60px">2</td><td>Jacob</td><td>Thornton</td><td>JavaScript</td><td class="tobeselected">20</td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td></tr>
<tr class="odd"><td style="width: 60px">3</td><td>Stu</td><td>Dent</td><td>HTML</td><td class="tobeselected">15</td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td></tr>
<tr class="even"><td style="width: 60px">4</td><td>Sunny</td><td>Man</td><td>HTML</td><td class="tobeselected">15</td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td></tr>
</tbody>
</table><div class="keys" style="display:none" title="/extended-grid.html"><span>1</span><span>2</span><span>3</span><span>4</span></div>
</div>    </div>

<pre class="prettyprint linenums">
$this->widget('bootstrap.widgets.TbExtendedGridView', array(
	'fixedHeader' => true,
	'headerOffset' => 40, // 40px is the height of the main navigation at bootstrap
	'type' => 'striped',
	'dataProvider' => $gridDataProvider,
	'responsiveTable' => true,
	'template' => "{items}",
	'columns' => $gridColumns,
));
</pre>
    <h3>Fixed header with Filter</h3>

    <div class="bs-docs-example">
		<div id="yw1" class="grid-view">
<table class="items table table-striped table-bordered">
<thead>
<tr>
<th id="yw1_c0">#</th><th id="yw1_c1">First name</th><th id="yw1_c2">Last name</th><th id="yw1_c3">Language</th><th id="yw1_c4">Hours worked</th><th class="button-column" id="yw1_c5">Edit</th></tr>
<tr class="filters">
<td><div class="filter-container"><input name="Person[id]" id="Person_id" type="text" /></div></td><td><div class="filter-container"><input name="Person[firstName]" id="Person_firstName" type="text" /></div></td><td><div class="filter-container"><input name="Person[lastName]" id="Person_lastName" type="text" /></div></td><td><div class="filter-container"><input name="Person[language]" id="Person_language" type="text" /></div></td><td><div class="filter-container"><input name="Person[hours]" id="Person_hours" type="text" /></div></td><td>&nbsp;</td></tr>
</thead>
<tbody>
<tr class="odd"><td style="width: 60px">1</td><td>Mark</td><td>Otto</td><td>CSS</td><td class="tobeselected">10</td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td></tr>
<tr class="even"><td style="width: 60px">2</td><td>Jacob</td><td>Thornton</td><td>JavaScript</td><td class="tobeselected">20</td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td></tr>
<tr class="odd"><td style="width: 60px">3</td><td>Stu</td><td>Dent</td><td>HTML</td><td class="tobeselected">15</td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td></tr>
<tr class="even"><td style="width: 60px">4</td><td>Sunny</td><td>Man</td><td>HTML</td><td class="tobeselected">15</td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td></tr>
</tbody>
</table><div class="keys" style="display:none" title="/extended-grid.html"><span>1</span><span>2</span><span>3</span><span>4</span></div>
</div>    </div>

<pre class="prettyprint linenums">
$this->widget('bootstrap.widgets.TbExtendedGridView', array(
	'filter'=>$person,
	'fixedHeader' => true,
	'headerOffset' => 40, // 40px is the height of the main navigation at bootstrap
	'type'=>'striped bordered',
	'dataProvider' => $gridDataProvider,
	'template' => "{items}",
	'columns' => $gridColumns,
));
</pre>
    <h3>Sortable Rows</h3>

    <p>
	  	Sometimes, we may need to display a set of records that are ordered by a `position` on the database, and that
	    order is important on the list. Most of the times, they are just a small amount of records that have a preference
	    in a first-in first-out scenario. The extended grid view provides a mechanism to order the rows and report back
	    through a javascript callback the new position of the data, so you could easily make an AJAX request to the server
	    and update the list.
    </p>
	<p>
		<span class="label label-info">Note</span>: It also will update the keys position, so you can safely use regular $.fn.yiiGridView functions.
	</p>

    <div class="bs-docs-example">
		<div id="yw2" class="grid-view">
<table class="items table table-striped table-bordered">
<thead>
<tr>
<th id="yw2_c0">#</th><th id="yw2_c1">First name</th><th id="yw2_c2">Last name</th><th id="yw2_c3">Language</th><th id="yw2_c4">Hours worked</th></tr>
</thead>
<tbody>
<tr class="odd"><td style="width: 60px">1</td><td>Mark</td><td>Otto</td><td>CSS</td><td class="tobeselected">10</td></tr>
<tr class="even"><td style="width: 60px">2</td><td>Jacob</td><td>Thornton</td><td>JavaScript</td><td class="tobeselected">20</td></tr>
<tr class="odd"><td style="width: 60px">3</td><td>Stu</td><td>Dent</td><td>HTML</td><td class="tobeselected">15</td></tr>
<tr class="even"><td style="width: 60px">4</td><td>Sunny</td><td>Man</td><td>HTML</td><td class="tobeselected">15</td></tr>
</tbody>
</table><div class="keys" style="display:none" title="/extended-grid.html"><span>1</span><span>2</span><span>3</span><span>4</span></div>
</div>    </div>

<pre class="prettyprint linenums">
$this->widget('bootstrap.widgets.TbExtendedGridView', array(
	'sortableRows'=>true,
    'afterSortableUpdate' => 'js:function(id, position){ console.log("id: "+id+", position:"+position);}',
	'type'=>'striped bordered',
	'dataProvider' => $gridDataProvider,
	'template' => "{items}",
	'columns' => $gridColumns,
));
</pre>
    <h3>Selectable Cells</h3>

    <p>
		The <code>TbExtendedGridView</code> allows you also to provide a selectable mechanism to its cells. This is very useful when you wish
	    to display some feedback information related to the selected cells.
    </p>
    <p>
        The following example demonstrates the above. Select the cells of the <strong>Hours worked</strong> column to see its total on the
	    span tag with id: 'hours'.

    </p>

    <div class="bs-docs-example">
	    <span class="label label-info">Sum Of Selected Hours</span>: <span id="hours">0</span>
	    <div id="yw3" class="grid-view">
<table class="items table table-striped table-bordered">
<thead>
<tr>
<th id="yw3_c0">#</th><th id="yw3_c1">First name</th><th id="yw3_c2">Last name</th><th id="yw3_c3">Language</th><th id="yw3_c4">Hours worked</th></tr>
</thead>
<tbody>
<tr class="odd"><td style="width: 60px">1</td><td>Mark</td><td>Otto</td><td>CSS</td><td class="tobeselected">10</td></tr>
<tr class="even"><td style="width: 60px">2</td><td>Jacob</td><td>Thornton</td><td>JavaScript</td><td class="tobeselected">20</td></tr>
<tr class="odd"><td style="width: 60px">3</td><td>Stu</td><td>Dent</td><td>HTML</td><td class="tobeselected">15</td></tr>
<tr class="even"><td style="width: 60px">4</td><td>Sunny</td><td>Man</td><td>HTML</td><td class="tobeselected">15</td></tr>
</tbody>
</table>0<div class="keys" style="display:none" title="/extended-grid.html"><span>1</span><span>2</span><span>3</span><span>4</span></div>
</div>    </div>

<pre class="prettyprint linenums">
&lt;span class="label label-info"&gt;Sum Of Selected Hours&lt;/span&gt;: &lt;span id="hours"&gt;0&lt;/span&gt;
&lt;?php
$this->widget('bootstrap.widgets.TbExtendedGridView', array(
    'selectableCells'=>true,
    'selectableCellsFilter'=>'td.tobeselected',
	'afterSelectableCells' => 'js:function(selected){
		var sum = 0;
		$.each(selected, function(){
		sum += parseInt($(this).text());
		});
		$("#hours").html(sum);
	}',
    'type' => 'striped bordered',
    'dataProvider' => $gridDataProvider,
    'template' => "{items}",
    'columns' => array_slice($gridColumns, 0, count($gridColumns)-1),
));
?&gt;
</pre>
    <h3>Bulk Actions</h3>

    <p>
        The extended grid allows you to display bulk action buttons on its footer. The configuration options of the buttons are
	    the same as regular TbButton widgets, the only difference is that you can set its 'click' handler, which will be triggered
	    having the selected checkbox elements as a parameter to the function.
    </p>
    <p>
        <span class="label label-info">Note</span>: The buttons won't be functional (active) until at least one checkbox element is
	    on its <code>checked</code> state.
    </p>
    <div class="bs-docs-example">
		<div id="yw4" class="grid-view">
<table class="items table table-striped table-bordered">
<thead>
<tr>
<th class="checkbox-column" id="yw4_c0"><input type="checkbox" value="1" name="yw4_c0_all" id="yw4_c0_all" /></th><th id="yw4_c1">#</th><th id="yw4_c2">First name</th><th id="yw4_c3">Last name</th><th id="yw4_c4">Language</th><th id="yw4_c5">Hours worked</th><th class="button-column" id="yw4_c6">Edit</th></tr>
</thead>
<tfoot>
<tr><td colspan="7"><div id="egw0" style="position:relative" class="pull-right">&nbsp;<button class="disabled bulk-actions-btn btn btn-primary btn-small" id="yw5" name="yt0" type="button">Testing Primary Bulk Actions</button>&nbsp;&nbsp;<button class="disabled bulk-actions-btn btn btn-success btn-small" id="yw6" name="yt1" type="button">Testing Success Bulk Actions</button>&nbsp;<div style="position:absolute;top:0;left:0;height:100%;width:100%;display:block;" class="bulk-actions-blocker"></div></div></td></tr></tfoot>
<tbody>
<tr class="odd"><td class="checkbox-column"><input value="1" id="yw4_c0_0" type="checkbox" name="yw4_c0[]" /></td><td style="width: 60px">1</td><td>Mark</td><td>Otto</td><td>CSS</td><td class="tobeselected">10</td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td></tr>
<tr class="even"><td class="checkbox-column"><input value="2" id="yw4_c0_1" type="checkbox" name="yw4_c0[]" /></td><td style="width: 60px">2</td><td>Jacob</td><td>Thornton</td><td>JavaScript</td><td class="tobeselected">20</td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td></tr>
<tr class="odd"><td class="checkbox-column"><input value="3" id="yw4_c0_2" type="checkbox" name="yw4_c0[]" /></td><td style="width: 60px">3</td><td>Stu</td><td>Dent</td><td>HTML</td><td class="tobeselected">15</td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td></tr>
<tr class="even"><td class="checkbox-column"><input value="4" id="yw4_c0_3" type="checkbox" name="yw4_c0[]" /></td><td style="width: 60px">4</td><td>Sunny</td><td>Man</td><td>HTML</td><td class="tobeselected">15</td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td></tr>
</tbody>
</table><div class="keys" style="display:none" title="/extended-grid.html"><span>1</span><span>2</span><span>3</span><span>4</span></div>
</div>    </div>

<pre class="prettyprint linenums">
$this->widget('bootstrap.widgets.TbExtendedGridView', array(
	'type' => 'striped bordered',
	'dataProvider' => $gridDataProvider,
	'template' => "{items}",
	'bulkActions' => array(
	'actionButtons' => array(
		array(
			'buttonType' => 'button',
			'type' => 'primary',
			'size' => 'small',
			'label' => 'Testing Primary Bulk Actions',
			'click' => 'js:function(values){console.log(values);}'
			)
		),
		// if grid doesn't have a checkbox column type, it will attach
		// one and this configuration will be part of it
		'checkBoxColumnConfig' => array(
		    'name' => 'id'
		),
	),
	'columns' => $gridColumns,
));
</pre>
</section>

<!-- extendedgridview nav
			  ================================================== -->
<section id="extendedsummary">
<h2>Extended Summary</h2>

<p>
    There are so many times that a client wishes to see a summary of the records displayed on your grid. When that
    occurs, we found ourselves, poor programmers
    building a sub-grid that will display the summary and forcing us to loop through the data provider once more,
    slowing down our app.
</p>

<p>
    We have included an extended summary version into this great grid component in order to save us time and headaches.
    The grid makes use of the following components
    for different displays:
</p>
<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>Name</th>
        <th>Description</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td><strong>TbSumOperation</strong></td>
        <td>Will display the sum of an specific column</td>
    </tr>
    <tr>
        <td><strong>TbCountOfTypeOperation</strong></td>
        <td>Displays the number of times a type of value appears in the specified column cell (ie. total of zeros, total
            of ones).
        </td>
    </tr>
    <tr>
        <td><strong>TbPercentOfTypeOperation</strong></td>
        <td>Displays the percent number of times a type of value appears in the specified column cell (ie. percent of
            zeros, percent of ones)
        </td>
    </tr>
    <tr>
        <td><strong>TbPercentOfTypeEasyPieOperation</strong></td>
        <td>
            Displays the percent number of times a type of value appears in the specified column cell on
            <strong>pie</strong> charts. The handling of
            its display is taken care by the nice jquery plugin <a targe="_blank"
                                                                   href="https://github.com/rendro/easy-pie-chart">easy-pie-chart</a>.
        </td>
    </tr>
    <tr>
        <td><strong>TbPercentOfTypeGooglePieOperation</td>
        <td>
            Well, you guessed right. It is the same operation as <code>TbPercentOfTypeEasyPieOperation</code> but with
            the difference that this pie is more powerful as it can render
            a single pie to display the summary results.
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <span class="label label-warning">Important!</span> when using charts you may need to check browser
            compatibility. As you know, most of these plugins do
            use canvas for their rendering.
        </td>
    </tr>
    </tbody>
</table>

<h3>Examples</h3>
<strong>TbSumOperation</strong>

<div class="bs-docs-example">
	<div id="yw7" class="grid-view">
<table class="items table table-striped table-bordered">
<thead>
<tr>
<th id="yw7_c0">#</th><th id="yw7_c1">First name</th><th id="yw7_c2">Last name</th><th id="yw7_c3">Language</th><th id="yw7_c4">Hours worked</th><th class="button-column" id="yw7_c5">Edit</th></tr>
<tr class="filters">
<td><div class="filter-container"><input name="Person[id]" id="Person_id" type="text" /></div></td><td><div class="filter-container"><input name="Person[firstName]" id="Person_firstName" type="text" /></div></td><td><div class="filter-container"><input name="Person[lastName]" id="Person_lastName" type="text" /></div></td><td><div class="filter-container"><input name="Person[language]" id="Person_language" type="text" /></div></td><td><div class="filter-container"><input name="Person[hours]" id="Person_hours" type="text" /></div></td><td>&nbsp;</td></tr>
</thead>
<tbody>
<tr class="odd"><td style="width: 60px">1</td><td>Mark</td><td>Otto</td><td>CSS</td><td class="tobeselected">10</td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td></tr>
<tr class="even"><td style="width: 60px">2</td><td>Jacob</td><td>Thornton</td><td>JavaScript</td><td class="tobeselected">20</td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td></tr>
<tr class="odd"><td style="width: 60px">3</td><td>Stu</td><td>Dent</td><td>HTML</td><td class="tobeselected">15</td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td></tr>
<tr class="even"><td style="width: 60px">4</td><td>Sunny</td><td>Man</td><td>HTML</td><td class="tobeselected">15</td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td></tr>
</tbody>
</table>
<div  class="well pull-right extended-summary" style="width:300px"></div>
<div id="yw7-extended-summary" style="display:none"><h3>Total Employee Hours</h3>Total Hours: 60<br/></div><div class="keys" style="display:none" title="/extended-grid.html"><span>1</span><span>2</span><span>3</span><span>4</span></div>
</div>    <div style="clear:both"></div>
</div>
<pre class="prettyprint linenums">
$this->widget('bootstrap.widgets.TbExtendedGridView', array(
    'filter'=>$person,
    'type'=>'striped bordered',
    'dataProvider' => $gridDataProvider,
    'template' => "{items}\n{extendedSummary}",
    'columns' => $gridColumns,
    'extendedSummary' => array(
        'title' => 'Total Employee Hours',
        'columns' => array(
            'hours' => array('label'=>'Total Hours', 'class'=>'TbSumOperation')
        )
    ),
    'extendedSummaryOptions' => array(
        'class' => 'well pull-right',
        'style' => 'width:300px'
    ),
));
</pre>
<strong>TbCountOfTypeOperation</strong>

<div class="bs-docs-example">
	<div id="yw8" class="grid-view">
<table class="items table table-striped table-bordered">
<thead>
<tr>
<th id="yw8_c0">#</th><th id="yw8_c1">First name</th><th id="yw8_c2">Last name</th><th id="yw8_c3">Language</th><th id="yw8_c4">Hours worked</th><th class="button-column" id="yw8_c5">Edit</th></tr>
<tr class="filters">
<td><div class="filter-container"><input name="Person[id]" id="Person_id" type="text" /></div></td><td><div class="filter-container"><input name="Person[firstName]" id="Person_firstName" type="text" /></div></td><td><div class="filter-container"><input name="Person[lastName]" id="Person_lastName" type="text" /></div></td><td><div class="filter-container"><input name="Person[language]" id="Person_language" type="text" /></div></td><td><div class="filter-container"><input name="Person[hours]" id="Person_hours" type="text" /></div></td><td>&nbsp;</td></tr>
</thead>
<tbody>
<tr class="odd"><td style="width: 60px">1</td><td>Mark</td><td>Otto</td><td>CSS</td><td class="tobeselected">10</td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td></tr>
<tr class="even"><td style="width: 60px">2</td><td>Jacob</td><td>Thornton</td><td>JavaScript</td><td class="tobeselected">20</td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td></tr>
<tr class="odd"><td style="width: 60px">3</td><td>Stu</td><td>Dent</td><td>HTML</td><td class="tobeselected">15</td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td></tr>
<tr class="even"><td style="width: 60px">4</td><td>Sunny</td><td>Man</td><td>HTML</td><td class="tobeselected">15</td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td></tr>
</tbody>
</table>
<div  class="well pull-right extended-summary" style="width:300px"></div>
<div id="yw8-extended-summary" style="display:none"><h3>Expertise</h3>Total Expertise: Css(1) Js(1) html(2)<br/></div><div class="keys" style="display:none" title="/extended-grid.html"><span>1</span><span>2</span><span>3</span><span>4</span></div>
</div>    <div style="clear:both"></div>
</div>
<pre class="prettyprint linenums">
$this->widget('bootstrap.widgets.TbExtendedGridView', array(
    'filter'=>$person,
    'type'=>'striped bordered',
    'dataProvider' => $gridDataProvider,
    'template' => "{items}\n{extendedSummary}",
    'columns' => $gridColumns,
    'extendedSummary' => array(
        'title' => 'Expertise',
        'columns' => array(
	        'language' => array(
		        'label'=>'Total Expertise',
		        'types' => array(
			        'CSS'=>array('label'=>'Css'),
			        'JavaScript'=>array('label'=>'Js'),
			        'HTML'=>array('label'=>'html')
		        ),
		        'class'=>'TbCountOfTypeOperation'
	        )
        )
    ),
    'extendedSummaryOptions' => array(
        'class' => 'well pull-right',
        'style' => 'width:300px'
    ),
));
</pre>
<strong>TbPercentOfTypeOperation</strong>

<div class="bs-docs-example">
	<div id="yw9" class="grid-view">
<table class="items table table-striped table-bordered">
<thead>
<tr>
<th id="yw9_c0">#</th><th id="yw9_c1">First name</th><th id="yw9_c2">Last name</th><th id="yw9_c3">Language</th><th id="yw9_c4">Hours worked</th><th class="button-column" id="yw9_c5">Edit</th></tr>
<tr class="filters">
<td><div class="filter-container"><input name="Person[id]" id="Person_id" type="text" /></div></td><td><div class="filter-container"><input name="Person[firstName]" id="Person_firstName" type="text" /></div></td><td><div class="filter-container"><input name="Person[lastName]" id="Person_lastName" type="text" /></div></td><td><div class="filter-container"><input name="Person[language]" id="Person_language" type="text" /></div></td><td><div class="filter-container"><input name="Person[hours]" id="Person_hours" type="text" /></div></td><td>&nbsp;</td></tr>
</thead>
<tbody>
<tr class="odd"><td style="width: 60px">1</td><td>Mark</td><td>Otto</td><td>CSS</td><td class="tobeselected">10</td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td></tr>
<tr class="even"><td style="width: 60px">2</td><td>Jacob</td><td>Thornton</td><td>JavaScript</td><td class="tobeselected">20</td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td></tr>
<tr class="odd"><td style="width: 60px">3</td><td>Stu</td><td>Dent</td><td>HTML</td><td class="tobeselected">15</td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td></tr>
<tr class="even"><td style="width: 60px">4</td><td>Sunny</td><td>Man</td><td>HTML</td><td class="tobeselected">15</td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td></tr>
</tbody>
</table>
<div  class="well pull-right extended-summary" style="width:400px"></div>
<div id="yw9-extended-summary" style="display:none"><h3>Expertise</h3>Total Expertise: Css(25.0%) Js(25.0%) html(50.0%)<br/></div><div class="keys" style="display:none" title="/extended-grid.html"><span>1</span><span>2</span><span>3</span><span>4</span></div>
</div>    <div style="clear:both"></div>
</div>
<pre class="prettyprint linenums">
$this->widget('bootstrap.widgets.TbExtendedGridView', array(
    'filter'=>$person,
    'type'=>'striped bordered',
    'dataProvider' => $gridDataProvider,
    'template' => "{items}\n{extendedSummary}",
    'columns' => $gridColumns,
    'extendedSummary' => array(
        'title' => 'Expertise',
        'columns' => array(
	        'language' => array(
		        'label'=>'Total Expertise',
		        'types' => array(
			        'CSS'=>array('label'=>'Css'),
			        'JavaScript'=>array('label'=>'Js'),
			        'HTML'=>array('label'=>'html')
		        ),
		        'class'=>'TbPercentOfTypeOperation'
	        )
        )
    ),
    'extendedSummaryOptions' => array(
        'class' => 'well pull-right',
        'style' => 'width:400px'
    ),
));
</pre>
<strong>TbPercentOfTypeEasyPieOperation</strong>

<div class="bs-docs-example">
	<div id="yw10" class="grid-view">
<table class="items table table-striped table-bordered">
<thead>
<tr>
<th id="yw10_c0">#</th><th id="yw10_c1">First name</th><th id="yw10_c2">Last name</th><th id="yw10_c3">Language</th><th id="yw10_c4">Hours worked</th><th class="button-column" id="yw10_c5">Edit</th></tr>
<tr class="filters">
<td><div class="filter-container"><input name="Person[id]" id="Person_id" type="text" /></div></td><td><div class="filter-container"><input name="Person[firstName]" id="Person_firstName" type="text" /></div></td><td><div class="filter-container"><input name="Person[lastName]" id="Person_lastName" type="text" /></div></td><td><div class="filter-container"><input name="Person[language]" id="Person_language" type="text" /></div></td><td><div class="filter-container"><input name="Person[hours]" id="Person_hours" type="text" /></div></td><td>&nbsp;</td></tr>
</thead>
<tbody>
<tr class="odd"><td style="width: 60px">1</td><td>Mark</td><td>Otto</td><td>CSS</td><td class="tobeselected">10</td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td></tr>
<tr class="even"><td style="width: 60px">2</td><td>Jacob</td><td>Thornton</td><td>JavaScript</td><td class="tobeselected">20</td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td></tr>
<tr class="odd"><td style="width: 60px">3</td><td>Stu</td><td>Dent</td><td>HTML</td><td class="tobeselected">15</td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td></tr>
<tr class="even"><td style="width: 60px">4</td><td>Sunny</td><td>Man</td><td>HTML</td><td class="tobeselected">15</td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td></tr>
</tbody>
</table>
<div  class="well pull-right extended-summary" style="width:350px"></div>
<div id="yw10-extended-summary" style="display:none"><h3>Expertise</h3><div style="clear:both">Total Expertise: </div><div style="float:left;text-align:center;margin:2px"><div class="bootstrap-operation-easy-pie-chart" data-percent="25.0">25.0%</div><div>Css</div></div> <div style="float:left;text-align:center;margin:2px"><div class="bootstrap-operation-easy-pie-chart" data-percent="25.0">25.0%</div><div>Js</div></div> <div style="float:left;text-align:center;margin:2px"><div class="bootstrap-operation-easy-pie-chart" data-percent="50.0">50.0%</div><div>html</div></div><br/></div><div class="keys" style="display:none" title="/extended-grid.html"><span>1</span><span>2</span><span>3</span><span>4</span></div>
</div>    <div style="clear:both"></div>
</div>
<pre class="prettyprint linenums">
$this->widget('bootstrap.widgets.TbExtendedGridView', array(
    'filter'=>$person,
    'type'=>'striped bordered',
    'dataProvider' => $gridDataProvider,
    'template' => "{items}\n{extendedSummary}",
    'columns' => $gridColumns,
    'extendedSummary' => array(
        'title' => 'Expertise',
        'columns' => array(
	        'language' => array(
		        'label'=>'Total Expertise',
		        'types' => array(
			        'CSS'=>array('label'=>'Css'),
			        'JavaScript'=>array('label'=>'Js'),
			        'HTML'=>array('label'=>'html')
		        ),
		        'class'=>'TbPercentOfTypeEasyPieOperation',
		        // you can also configure how the chart looks like
		        'chartOptions' => array(
			        'barColor' => '#333',
			        'trackColor' => '#999',
			        'lineWidth' => 8 ,
			        'lineCap' => 'square'
		        )
	        )
        )
    ),
    'extendedSummaryOptions' => array(
        'class' => 'well pull-right',
        'style' => 'width:350px'
    ),
))
</pre>
<strong>TbPercentOfTypeGooglePieOperation</strong>

<div class="bs-docs-example">
	<div id="yw11" class="grid-view">
<table class="items table table-striped table-bordered">
<thead>
<tr>
<th id="yw11_c0">#</th><th id="yw11_c1">First name</th><th id="yw11_c2">Last name</th><th id="yw11_c3">Language</th><th id="yw11_c4">Hours worked</th><th class="button-column" id="yw11_c5">Edit</th></tr>
<tr class="filters">
<td><div class="filter-container"><input name="Person[id]" id="Person_id" type="text" /></div></td><td><div class="filter-container"><input name="Person[firstName]" id="Person_firstName" type="text" /></div></td><td><div class="filter-container"><input name="Person[lastName]" id="Person_lastName" type="text" /></div></td><td><div class="filter-container"><input name="Person[language]" id="Person_language" type="text" /></div></td><td><div class="filter-container"><input name="Person[hours]" id="Person_hours" type="text" /></div></td><td>&nbsp;</td></tr>
</thead>
<tbody>
<tr class="odd"><td style="width: 60px">1</td><td>Mark</td><td>Otto</td><td>CSS</td><td class="tobeselected">10</td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td></tr>
<tr class="even"><td style="width: 60px">2</td><td>Jacob</td><td>Thornton</td><td>JavaScript</td><td class="tobeselected">20</td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td></tr>
<tr class="odd"><td style="width: 60px">3</td><td>Stu</td><td>Dent</td><td>HTML</td><td class="tobeselected">15</td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td></tr>
<tr class="even"><td style="width: 60px">4</td><td>Sunny</td><td>Man</td><td>HTML</td><td class="tobeselected">15</td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td></tr>
</tbody>
</table>
<div  class="well pull-right extended-summary" style="width:250px"></div>
<div id="yw11-extended-summary" style="display:none"><h3>Expertise</h3><div id='yw12' class='bootstrap-operation-google-pie-chart' data-data='[["Label","Percent"],["Css",25],["Js",25],["html",50]]' data-options='{"title":"Now, thats cool!"}'></div><br/></div><div class="keys" style="display:none" title="/extended-grid.html"><span>1</span><span>2</span><span>3</span><span>4</span></div>
</div>    <div style="clear:both"></div>
</div>
<pre class="prettyprint linenums">
$this->widget('bootstrap.widgets.TbExtendedGridView', array(
    'filter'=>$person,
    'type'=>'striped bordered',
    'dataProvider' => $gridDataProvider,
    'template' => "{items}\n{extendedSummary}",
    'columns' => $gridColumns,
    'extendedSummary' => array(
        'title' => 'Expertise',
        'columns' => array(
	        'language' => array(
		        'label'=>'Total Expertise',
		        'types' => array(
			        'CSS'=>array('label'=>'Css'),
			        'JavaScript'=>array('label'=>'Js'),
			        'HTML'=>array('label'=>'html')
		        ),
		        'class'=>'TbPercentOfTypeGooglePieOperation',
	        )
        )
    ),
    'extendedSummaryOptions' => array(
        'class' => 'well pull-right',
        'style' => 'width:300px'
    ),
))
</pre>
<hr class="bs-docs-separator">
</section>
<!-- extendedgridview nav
				 ================================================== -->
<section id="gridswitch">
    <h2>The Grid/Chart switcher</h2>

    <p>
        There will be times, where you wish to see a bit more details on a graphic than just those values on a
        pie chart. <strong>TbExtendedGridView</strong> aims to provide an easy to configure chart display, where
        the data is automatically extracted from its dataProvider.
    </p>

    <p>
        The way it works, is that you set a couple of configuration options of the <code>chartOptions</code> property
        and thats it. The grid will automatically display a chart by making use of the great
        <a target="_blank" href="http://www.highcharts.com/">Higcharts JS</a> library. We highly recommend you to get
        familiar with this library if you are going to make use of this feature.
    </p>

    <p>
        The <code>chartOptions</code> property is a configurable chart array with three elements:
    <ul>
        <li><code>data</code>, whichwill contain the <code>series</code> attribute of <strong>Highcharts JS</strong>
        </li>
        <li><code>config</code>, will hold the rest of <a target="_blank" href="http://api.highcharts.com/highcharts">the
            chart configuration options</a></li>
        <li><code>htmlOptions</code>, the HTML tag attributes of the chart container.</li>
    </ul>
    <span class="label label-important">Important!</span> the <code>style</code> and <code>data-config</code> attributes
    of the container will be overrided,
    as they are required for the correct functionality of the chart.
    </p>
	<p><span class="label label-important">Important</span>: Highcharts JS is not open source for commercial products. We have include this
	chart library as we thought is one of the best around. We will update the library to support more charts in future releases.</p>
    <h3>Example</h3>

    <div class="bs-docs-example">
		<div id="yw14" class="grid-view">
<table class="items table table-striped table-bordered">
<div span="row"><div style="margin-bottom:5px" class="btn-group" data-toggle="buttons-radio"><a class="active yw14-grid-control grid btn" id="yw15" href="#">Grid</a><a class="yw14-grid-control chart btn" id="yw16" href="#">Chart</a></div></div><div span="row"><div id='exgvwChartyw14'  style="display:none" data-config='{"chart":{"width":800,"renderTo":"exgvwChartyw14"},"series":[{"name":"Hours worked","data":[10,20,15,15]}]}'></div></div><thead>
<tr>
<th id="yw14_c0">#</th><th id="yw14_c1">First name</th><th id="yw14_c2">Last name</th><th id="yw14_c3">Language</th><th id="yw14_c4">Hours worked</th><th class="button-column" id="yw14_c5">Edit</th></tr>
<tr class="filters">
<td><div class="filter-container"><input name="Person[id]" id="Person_id" type="text" /></div></td><td><div class="filter-container"><input name="Person[firstName]" id="Person_firstName" type="text" /></div></td><td><div class="filter-container"><input name="Person[lastName]" id="Person_lastName" type="text" /></div></td><td><div class="filter-container"><input name="Person[language]" id="Person_language" type="text" /></div></td><td><div class="filter-container"><input name="Person[hours]" id="Person_hours" type="text" /></div></td><td>&nbsp;</td></tr>
</thead>
<tbody>
<tr class="odd"><td style="width: 60px">1</td><td>Mark</td><td>Otto</td><td>CSS</td><td class="tobeselected">10</td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td></tr>
<tr class="even"><td style="width: 60px">2</td><td>Jacob</td><td>Thornton</td><td>JavaScript</td><td class="tobeselected">20</td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td></tr>
<tr class="odd"><td style="width: 60px">3</td><td>Stu</td><td>Dent</td><td>HTML</td><td class="tobeselected">15</td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td></tr>
<tr class="even"><td style="width: 60px">4</td><td>Sunny</td><td>Man</td><td>HTML</td><td class="tobeselected">15</td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td></tr>
</tbody>
</table>
<div  class="extended-summary"></div><div class="keys" style="display:none" title="/extended-grid.html"><span>1</span><span>2</span><span>3</span><span>4</span></div>
</div>        <div style="clear:both"></div>
    </div>
<pre class="prettyprint linenums">
$this->widget('bootstrap.widgets.TbExtendedGridView', array(
    'filter'=>$person,
    'type'=>'striped bordered',
    'dataProvider' => $gridDataProvider,
    'template' => "{items}\n{extendedSummary}",
    'columns' => $gridColumns,
    'chartOptions' => array(
        'data' => array(
            'series' => array(
                array(
	                'name' => 'Hours worked',
	                'attribute' => 'hours'
                )
            )
        ),
        'config' => array(
            'chart'=>array(
                'width'=>800
            )
        )
    ),
));
</pre>
    <hr class="bs-docs-separator">
</section>
<!-- groupgridview nav
				 ================================================== -->
<section id="groupgridview">
    <h2>The TbGroupGridView widget</h2>

    <p>
        We have worked a bit and modified slightly the great work of Vitaliy Potapov, <a target="_blank"
                                                                                         href="http://groupgridview.demopage.ru/">BootGroupView</a>,
        to provide
        our library with a grid that features row and cell merging and/or grouping.
    </p>

    <h3>Examples</h3>
    <strong>Merge in one column</strong>

    <div class="bs-docs-example">
		<div id="yw17" class="grid-view">
<table class="items table table-striped table-bordered">
<thead>
<tr>
<th id="yw17_c0">#</th><th id="yw17_c1">First name</th><th id="yw17_c2">Last name</th><th id="yw17_c3">Language</th><th id="yw17_c4">Hours worked</th><th class="button-column" id="yw17_c5">Edit</th></tr>
<tr class="filters">
<td><div class="filter-container"><input name="Person[id]" id="Person_id" type="text" /></div></td><td><div class="filter-container"><input name="Person[firstName]" id="Person_firstName" type="text" /></div></td><td><div class="filter-container"><input name="Person[lastName]" id="Person_lastName" type="text" /></div></td><td><div class="filter-container"><input name="Person[language]" id="Person_language" type="text" /></div></td><td><div class="filter-container"><input name="Person[hours]" id="Person_hours" type="text" /></div></td><td>&nbsp;</td></tr>
</thead>
<tbody>
<tr class="odd"><td style="width: 60px">1</td><td>Mark</td><td>Otto</td><td rowspan="1" class="merge" style=";text-align: center; vertical-align: middle">CSS</td><td class="tobeselected">10</td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td></tr>
<tr class="even"><td style="width: 60px">2</td><td>Jacob</td><td>Thornton</td><td rowspan="1" class="merge" style=";text-align: center; vertical-align: middle">JavaScript</td><td class="tobeselected">20</td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td></tr>
<tr class="odd"><td style="width: 60px">3</td><td>Stu</td><td>Dent</td><td rowspan="2" class="merge" style=";text-align: center; vertical-align: middle">HTML</td><td class="tobeselected">15</td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td></tr>
<tr class="even"><td style="width: 60px">4</td><td>Sunny</td><td>Man</td><td class="tobeselected">15</td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td></tr>
</tbody>
</table><div class="keys" style="display:none" title="/extended-grid.html"><span>1</span><span>2</span><span>3</span><span>4</span></div>
</div>        <div style="clear:both"></div>
    </div>
<pre class="prettyprint linenums">
$this->widget('bootstrap.widgets.TbGroupGridView', array(
	'filter'=>$person,
	'type'=>'striped bordered',
	'dataProvider' => $gridDataProvider,
	'template' => "{items}",
	'extraRowColumns'=> array('firstLetter'),
	'extraRowExpression' =>  '"&lt;b style=\"font-size: 3em; color: #333;\"&gt;".substr($data->firstName, 0, 1)."&lt;/b&gt;"',
	'extraRowHtmlOptions' => array('style'=>'padding:10px'),
	'columns' => $gridColumns,
	'mergeColumns' => array('language')
));
</pre>
    <strong>Merge in two columns</strong>

    <div class="bs-docs-example">
		<div id="yw18" class="grid-view">
<table class="items table table-striped table-bordered">
<thead>
<tr>
<th id="yw18_c0">#</th><th id="yw18_c1">First name</th><th id="yw18_c2">Last name</th><th id="yw18_c3">Language</th><th id="yw18_c4">Hours worked</th><th class="button-column" id="yw18_c5">Edit</th></tr>
<tr class="filters">
<td><div class="filter-container"><input name="Person[id]" id="Person_id" type="text" /></div></td><td><div class="filter-container"><input name="Person[firstName]" id="Person_firstName" type="text" /></div></td><td><div class="filter-container"><input name="Person[lastName]" id="Person_lastName" type="text" /></div></td><td><div class="filter-container"><input name="Person[language]" id="Person_language" type="text" /></div></td><td><div class="filter-container"><input name="Person[hours]" id="Person_hours" type="text" /></div></td><td>&nbsp;</td></tr>
</thead>
<tbody>
<tr class="odd"><td style="width: 60px">1</td><td>Mark</td><td>Otto</td><td rowspan="1" class="merge" style=";text-align: center; vertical-align: middle">CSS</td><td class="merge" rowspan="1" style=";text-align: center; vertical-align: middle">10</td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td></tr>
<tr class="even"><td style="width: 60px">2</td><td>Jacob</td><td>Thornton</td><td rowspan="1" class="merge" style=";text-align: center; vertical-align: middle">JavaScript</td><td class="merge" rowspan="1" style=";text-align: center; vertical-align: middle">20</td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td></tr>
<tr class="odd"><td style="width: 60px">3</td><td>Stu</td><td>Dent</td><td rowspan="2" class="merge" style=";text-align: center; vertical-align: middle">HTML</td><td class="merge" rowspan="2" style=";text-align: center; vertical-align: middle">15</td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td></tr>
<tr class="even"><td style="width: 60px">4</td><td>Sunny</td><td>Man</td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td></tr>
</tbody>
</table><div class="keys" style="display:none" title="/extended-grid.html"><span>1</span><span>2</span><span>3</span><span>4</span></div>
</div>        <div style="clear:both"></div>
    </div>
<pre class="prettyprint linenums">
$this->widget('bootstrap.widgets.TbGroupGridView', array(
	'filter'=>$person,
	'type'=>'striped bordered',
	'dataProvider' => $gridDataProvider,
	'template' => "{items}",
	'extraRowColumns'=> array('firstLetter'),
	'extraRowExpression' =>  '"&lt;b style=\"font-size: 3em; color: #333;\"&gt;".substr($data->firstName, 0, 1)."&lt;/b&gt;"',
	'extraRowHtmlOptions' => array('style'=>'padding:10px'),
	'columns' => $gridColumns,
	'mergeColumns' => array('language', 'hours')
));
</pre>
    <strong>Extra Row</strong>

    <div class="bs-docs-example">
		<div id="yw19" class="grid-view">
<table class="items table table-striped table-bordered">
<thead>
<tr>
<th id="yw19_c0">#</th><th id="yw19_c1">First name</th><th id="yw19_c2">Last name</th><th id="yw19_c3">Language</th><th id="yw19_c4">Hours worked</th><th class="button-column" id="yw19_c5">Edit</th><th style="display:none" id="yw19_c6">firstLetter</th></tr>
<tr class="filters">
<td><div class="filter-container"><input name="Person[id]" id="Person_id" type="text" /></div></td><td><div class="filter-container"><input name="Person[firstName]" id="Person_firstName" type="text" /></div></td><td><div class="filter-container"><input name="Person[lastName]" id="Person_lastName" type="text" /></div></td><td><div class="filter-container"><input name="Person[language]" id="Person_language" type="text" /></div></td><td><div class="filter-container"><input name="Person[hours]" id="Person_hours" type="text" /></div></td><td>&nbsp;</td><td style="display:none"><div class="filter-container">&nbsp;</div></td></tr>
</thead>
<tbody>
<tr><td style="padding:10px" class="extrarow" colspan="7"><b style="font-size: 3em; color: #333;">M</b></td></tr><tr class="odd"><td style="width: 60px">1</td><td>Mark</td><td>Otto</td><td>CSS</td><td class="tobeselected">10</td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td><td style="display:none">M</td></tr>
<tr><td style="padding:10px" class="extrarow" colspan="7"><b style="font-size: 3em; color: #333;">J</b></td></tr><tr class="even"><td style="width: 60px">2</td><td>Jacob</td><td>Thornton</td><td>JavaScript</td><td class="tobeselected">20</td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td><td style="display:none">J</td></tr>
<tr><td style="padding:10px" class="extrarow" colspan="7"><b style="font-size: 3em; color: #333;">S</b></td></tr><tr class="odd"><td style="width: 60px">3</td><td>Stu</td><td>Dent</td><td>HTML</td><td class="tobeselected">15</td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td><td style="display:none">S</td></tr>
<tr class="even"><td style="width: 60px">4</td><td>Sunny</td><td>Man</td><td>HTML</td><td class="tobeselected">15</td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td><td style="display:none">S</td></tr>
</tbody>
</table><div class="keys" style="display:none" title="/extended-grid.html"><span>1</span><span>2</span><span>3</span><span>4</span></div>
</div>        <div style="clear:both"></div>
    </div>
<pre class="prettyprint linenums">
$groupGridColumns = $gridColumns;
$groupGridColumns[] = array(
    'name' => 'firstLetter',
    'value' => 'substr($data->firstName, 0, 1)',
    'headerHtmlOptions' => array('style'=>'display:none'),
    'htmlOptions' =>array('style'=>'display:none')
);

$this->widget('bootstrap.widgets.TbGroupGridView', array(
	'filter'=>$person,
	'type'=>'striped bordered',
	'dataProvider' => $gridDataProvider,
	'template' => "{items}",
	'extraRowColumns'=> array('firstLetter'),
	'extraRowExpression' => '"&lt;b style=\"font-size: 3em; color: #333;\"&gt;".substr($data->firstName, 0, 1)."&lt;/b&gt;"',
	'extraRowHtmlOptions' => array('style'=>'padding:10px'),
	'columns' => $groupGridColumns
));
</pre>
    <strong>Extra Row + Merge</strong>

    <div class="bs-docs-example">
		<div id="yw20" class="grid-view">
<table class="items table table-striped table-bordered">
<thead>
<tr>
<th id="yw20_c0">#</th><th id="yw20_c1">First name</th><th id="yw20_c2">Last name</th><th id="yw20_c3">Language</th><th id="yw20_c4">Hours worked</th><th class="button-column" id="yw20_c5">Edit</th><th style="display:none" id="yw20_c6">firstLetter</th></tr>
<tr class="filters">
<td><div class="filter-container"><input name="Person[id]" id="Person_id" type="text" /></div></td><td><div class="filter-container"><input name="Person[firstName]" id="Person_firstName" type="text" /></div></td><td><div class="filter-container"><input name="Person[lastName]" id="Person_lastName" type="text" /></div></td><td><div class="filter-container"><input name="Person[language]" id="Person_language" type="text" /></div></td><td><div class="filter-container"><input name="Person[hours]" id="Person_hours" type="text" /></div></td><td>&nbsp;</td><td style="display:none"><div class="filter-container">&nbsp;</div></td></tr>
</thead>
<tbody>
<tr><td style="padding:10px" class="extrarow" colspan="7"><b style="font-size: 3em; color: #333;">M</b></td></tr><tr class="odd"><td style="width: 60px">1</td><td>Mark</td><td>Otto</td><td>CSS</td><td class="merge" rowspan="1" style=";text-align: center; vertical-align: middle">10</td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td><td style="display:none">M</td></tr>
<tr><td style="padding:10px" class="extrarow" colspan="7"><b style="font-size: 3em; color: #333;">J</b></td></tr><tr class="even"><td style="width: 60px">2</td><td>Jacob</td><td>Thornton</td><td>JavaScript</td><td class="merge" rowspan="1" style=";text-align: center; vertical-align: middle">20</td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td><td style="display:none">J</td></tr>
<tr><td style="padding:10px" class="extrarow" colspan="7"><b style="font-size: 3em; color: #333;">S</b></td></tr><tr class="odd"><td style="width: 60px">3</td><td>Stu</td><td>Dent</td><td>HTML</td><td class="merge" rowspan="2" style=";text-align: center; vertical-align: middle">15</td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td><td style="display:none">S</td></tr>
<tr class="even"><td style="width: 60px">4</td><td>Sunny</td><td>Man</td><td>HTML</td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td><td style="display:none">S</td></tr>
</tbody>
</table><div class="keys" style="display:none" title="/extended-grid.html"><span>1</span><span>2</span><span>3</span><span>4</span></div>
</div>        <div style="clear:both"></div>
    </div>
<pre class="prettyprint linenums">
$groupGridColumns = $gridColumns;
$groupGridColumns[] = array(
    'name' => 'firstLetter',
    'value' => 'substr($data->firstName, 0, 1)',
    'headerHtmlOptions' => array('style'=>'display:none'),
    'htmlOptions' =>array('style'=>'display:none')
);

$this->widget('bootstrap.widgets.TbGroupGridView', array(
	'filter'=>$person,
	'type'=>'striped bordered',
	'dataProvider' => $groupDataProvider,
	'template' => "{items}",
	'extraRowColumns'=> array('firstLetter'),
	'extraRowExpression' => '"&lt;b style=\"font-size: 3em; color: #333;\"&gt;".substr($data->firstName, 0, 1)."&lt;/b&gt;"',
	'extraRowHtmlOptions' => array('style'=>'padding:10px'),
	'columns' => $groupGridColumns,
	'mergeColumns' => array('hours')
));
</pre>
    <hr class="bs-docs-separator">
</section>
<!-- groupgridview nav
				 ================================================== -->
<section id="extendedfilter">
    <h2>The TbExtendedFilter widget</h2>

    <p>
       There are times, where you wish to save your filters and we are forced to use different types of storage systems
	   to keep track of the filters (ie: Session variables with serialized objects, Cookies, Db, etc).
    </p>

    <p>
        YiiBooster proposed a different approach and even though the first version is working with JSON storage (at the server side)
	    we want to provide filters to be saved at the database instead.
    </p>
	<p>
		It use is a bit tricky, you can use it with any <code>CGridView</code> instance of Booster or even the <code>CGridView</code>
		itself, but the grid has to be <code>extended</code> and then override <code>renderTableHeader()</code> to display it.
	</p>

    <h3>Example</h3>
    <strong>Overriding TbGridView</strong>
	<p>As previously said, we first need to override an <code>CGridView</code>, for the example we are going to make use of <code>TbGridView</code></p>
<pre class="prettyprint linenums">
// import required classes to my widget
Yii::import('bootstrap.widgets.TbGridView');
Yii::import('bootstrap.widgets.TbExtendedFilter');

class WMyGridView extends TbGridView {

	/**
	* We need this attribute in order to fire the saved filter.
	* In fact, you could remove its requirement from TbExtendedFilter but
	* we thought is better to provide 'less' magic.
	*/
	public $redirectRoute;

	public function renderTableHeader()
	{
		if(!$this->hideHeader)
		{
			echo "&gt;thead&lt;\n";
			// Heads up! We are going to display our filter here
			$this->renderExtendedFilter();
			if($this->filterPosition===self::FILTER_POS_HEADER)
				$this->renderFilter();

			echo "&lt;tr&gt;\n";
			foreach($this->columns as $column)
				$column->renderHeaderCell();
			echo "&lt;/tr&gt;\n";

			if($this->filterPosition===self::FILTER_POS_BODY)
				$this->renderFilter();

			echo "&lt;/thead&gt;\n";
		}
		elseif($this->filter!==null && ($this->filterPosition===self::FILTER_POS_HEADER || $this->filterPosition===self::FILTER_POS_BODY))
		{
			echo "&lt;thead&gt;\n";
			// Heads up! We are going to display our filter here
			$this->renderExtendedFilter();
			$this->renderFilter();
			echo "&lt;/thead&gt;\n";
		}
	}

	protected function renderExtendedFilter()
	{
		// at the moment it only works with instances of CActiveRecord
		if(!$this->filter instanceof CActiveRecord)
		{
			return  false;
		}
		$extendedFilter =  Yii::createComponent(array(
			'class' => 'TbExtendedFilter',
			'model' => $this->filter,
			'grid' => $this,
			'redirectRoute' => $this->redirectRoute //ie: array('/report/index', 'ajax'=>$this->id)
		));

		$extendedFilter->init();
		$extendedFilter->run();
	}
}
</pre>
    <strong>Using our widget</strong>
    <div class="alert alert-info"><strong>Can't see it?</strong> Filter the next grid in order to see how the extended grid appears! <br/>
    <span class="label label-important">Note</span> We save filters on the server, please make good use of this.
    </div>
    <div class="bs-docs-example">
		<div id="yw21" class="grid-view">
<table class="items table table-striped table-bordered">
<thead>
<tr>
<th id="yw21_c0"><a class="sort-link" href="/extended-grid.html?Region_sort=country_code">Country Code<span class="caret"></span></a></th><th id="yw21_c1"><a class="sort-link" href="/extended-grid.html?Region_sort=name">Region Name<span class="caret"></span></a></th></tr>
<tr class="filters">
<td><div class="filter-container"><input name="Region[country_code]" id="Region_country_code" type="text" /></div></td><td><div class="filter-container"><input name="Region[name]" id="Region_name" type="text" maxlength="45" /></div></td></tr>
</thead>
<tbody>
<tr class="odd"><td>CA</td><td>Alberta</td></tr>
<tr class="even"><td>CA</td><td>British Columbia</td></tr>
<tr class="odd"><td>CA</td><td>Manitoba</td></tr>
<tr class="even"><td>CA</td><td>New Brunswick</td></tr>
</tbody>
</table><div class="keys" style="display:none" title="/extended-grid.html"><span>1</span><span>2</span><span>3</span><span>4</span></div>
</div>        <div style="clear:both"></div>
    </div>
<pre class="prettyprint linenums">
 $this->widget('WMyGridView', array(
    'type' => 'striped bordered',
    'redirectRoute' => CHtml::normalizeUrl(''),
    'dataProvider' => $region->search(),
    'template' => "{items}",
    'filter' => $region,
    'columns' => array(
	    array('name' => 'country_code', 'header' => 'Country Code'),
	    array('name' => 'name', 'header' => 'Region Name'),
    ))
);?>
</pre>
    <strong>Extra Row</strong>

    <div class="bs-docs-example">
		<div id="yw23" class="grid-view">
<table class="items table table-striped table-bordered">
<thead>
<tr>
<th id="yw23_c0">#</th><th id="yw23_c1">First name</th><th id="yw23_c2">Last name</th><th id="yw23_c3">Language</th><th id="yw23_c4">Hours worked</th><th class="button-column" id="yw23_c5">Edit</th><th style="display:none" id="yw23_c6">firstLetter</th></tr>
<tr class="filters">
<td><div class="filter-container"><input name="Person[id]" id="Person_id" type="text" /></div></td><td><div class="filter-container"><input name="Person[firstName]" id="Person_firstName" type="text" /></div></td><td><div class="filter-container"><input name="Person[lastName]" id="Person_lastName" type="text" /></div></td><td><div class="filter-container"><input name="Person[language]" id="Person_language" type="text" /></div></td><td><div class="filter-container"><input name="Person[hours]" id="Person_hours" type="text" /></div></td><td>&nbsp;</td><td style="display:none"><div class="filter-container">&nbsp;</div></td></tr>
</thead>
<tbody>
<tr><td style="padding:10px" class="extrarow" colspan="7"><b style="font-size: 3em; color: #333;">M</b></td></tr><tr class="odd"><td style="width: 60px">1</td><td>Mark</td><td>Otto</td><td>CSS</td><td class="tobeselected">10</td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td><td style="display:none">M</td></tr>
<tr><td style="padding:10px" class="extrarow" colspan="7"><b style="font-size: 3em; color: #333;">J</b></td></tr><tr class="even"><td style="width: 60px">2</td><td>Jacob</td><td>Thornton</td><td>JavaScript</td><td class="tobeselected">20</td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td><td style="display:none">J</td></tr>
<tr><td style="padding:10px" class="extrarow" colspan="7"><b style="font-size: 3em; color: #333;">S</b></td></tr><tr class="odd"><td style="width: 60px">3</td><td>Stu</td><td>Dent</td><td>HTML</td><td class="tobeselected">15</td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td><td style="display:none">S</td></tr>
<tr class="even"><td style="width: 60px">4</td><td>Sunny</td><td>Man</td><td>HTML</td><td class="tobeselected">15</td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td><td style="display:none">S</td></tr>
</tbody>
</table><div class="keys" style="display:none" title="/extended-grid.html"><span>1</span><span>2</span><span>3</span><span>4</span></div>
</div>        <div style="clear:both"></div>
    </div>
<pre class="prettyprint linenums">
$groupGridColumns = $gridColumns;
$groupGridColumns[] = array(
    'name' => 'firstLetter',
    'value' => 'substr($data->firstName, 0, 1)',
    'headerHtmlOptions' => array('style'=>'display:none'),
    'htmlOptions' =>array('style'=>'display:none')
);

$this->widget('bootstrap.widgets.TbGroupGridView', array(
	'filter'=>$person,
	'type'=>'striped bordered',
	'dataProvider' => $gridDataProvider,
	'template' => "{items}",
	'extraRowColumns'=> array('firstLetter'),
	'extraRowExpression' => '"&lt;b style=\"font-size: 3em; color: #333;\"&gt;".substr($data->firstName, 0, 1)."&lt;/b&gt;"',
	'extraRowHtmlOptions' => array('style'=>'padding:10px'),
	'columns' => $groupGridColumns
));
</pre>
    <strong>Extra Row + Merge</strong>

    <div class="bs-docs-example">
		<div id="yw24" class="grid-view">
<table class="items table table-striped table-bordered">
<thead>
<tr>
<th id="yw24_c0">#</th><th id="yw24_c1">First name</th><th id="yw24_c2">Last name</th><th id="yw24_c3">Language</th><th id="yw24_c4">Hours worked</th><th class="button-column" id="yw24_c5">Edit</th><th style="display:none" id="yw24_c6">firstLetter</th></tr>
<tr class="filters">
<td><div class="filter-container"><input name="Person[id]" id="Person_id" type="text" /></div></td><td><div class="filter-container"><input name="Person[firstName]" id="Person_firstName" type="text" /></div></td><td><div class="filter-container"><input name="Person[lastName]" id="Person_lastName" type="text" /></div></td><td><div class="filter-container"><input name="Person[language]" id="Person_language" type="text" /></div></td><td><div class="filter-container"><input name="Person[hours]" id="Person_hours" type="text" /></div></td><td>&nbsp;</td><td style="display:none"><div class="filter-container">&nbsp;</div></td></tr>
</thead>
<tbody>
<tr><td style="padding:10px" class="extrarow" colspan="7"><b style="font-size: 3em; color: #333;">M</b></td></tr><tr class="odd"><td style="width: 60px">1</td><td>Mark</td><td>Otto</td><td>CSS</td><td class="merge" rowspan="1" style=";text-align: center; vertical-align: middle">10</td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td><td style="display:none">M</td></tr>
<tr><td style="padding:10px" class="extrarow" colspan="7"><b style="font-size: 3em; color: #333;">J</b></td></tr><tr class="even"><td style="width: 60px">2</td><td>Jacob</td><td>Thornton</td><td>JavaScript</td><td class="merge" rowspan="1" style=";text-align: center; vertical-align: middle">20</td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td><td style="display:none">J</td></tr>
<tr><td style="padding:10px" class="extrarow" colspan="7"><b style="font-size: 3em; color: #333;">S</b></td></tr><tr class="odd"><td style="width: 60px">3</td><td>Stu</td><td>Dent</td><td>HTML</td><td class="merge" rowspan="2" style=";text-align: center; vertical-align: middle">15</td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td><td style="display:none">S</td></tr>
<tr class="even"><td style="width: 60px">4</td><td>Sunny</td><td>Man</td><td>HTML</td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td><td style="display:none">S</td></tr>
</tbody>
</table><div class="keys" style="display:none" title="/extended-grid.html"><span>1</span><span>2</span><span>3</span><span>4</span></div>
</div>        <div style="clear:both"></div>
    </div>
<pre class="prettyprint linenums">
$groupGridColumns = $gridColumns;
$groupGridColumns[] = array(
    'name' => 'firstLetter',
    'value' => 'substr($data->firstName, 0, 1)',
    'headerHtmlOptions' => array('style'=>'display:none'),
    'htmlOptions' =>array('style'=>'display:none')
);

$this->widget('bootstrap.widgets.TbGroupGridView', array(
	'filter'=>$person,
	'type'=>'striped bordered',
	'dataProvider' => $groupDataProvider,
	'template' => "{items}",
	'extraRowColumns'=> array('firstLetter'),
	'extraRowExpression' => '"&lt;b style=\"font-size: 3em; color: #333;\"&gt;".substr($data->firstName, 0, 1)."&lt;/b&gt;"',
	'extraRowHtmlOptions' => array('style'=>'padding:10px'),
	'columns' => $groupGridColumns,
	'mergeColumns' => array('hours')
));
</pre>
    <hr class="bs-docs-separator">
</section>
<!-- gridcolumns nav
				 ================================================== -->
<section id="gridcolumns">
<h2>Additional Columns</h2>

<p>
    If you thought the above wasn't enough, we have created a couple of extra components (that we expect to grow)
    that increase the beauty of this grid.
</p>
<p>
	<span class="label label-info">Note</span>: You can also use this column types with regular <code>TbGridView</code> widget.
</p>

<h3>TbImageColumn</h3>

<p>
    Display an image on your grid. In order to display an image related to the data provider of the grid, you set
    its <code>imagePathExpression</code>. The expression string will have the following variables passed to it:
    <strong>$row</strong> (the row number), <strong>$data</strong> (the data module of the row) and
    <strong>$this</strong> (the column object).
</p>

<div class="bs-docs-example">
	<div id="yw25" class="grid-view">
<table class="items table table-striped table-bordered">
<thead>
<tr>
<th id="yw25_c0">&nbsp;</th><th id="yw25_c1">#</th><th id="yw25_c2">First name</th><th id="yw25_c3">Last name</th><th id="yw25_c4">Language</th><th id="yw25_c5">Hours worked</th><th class="button-column" id="yw25_c6">Edit</th></tr>
<tr class="filters">
<td>&nbsp;</td><td><div class="filter-container"><input name="Person[id]" id="Person_id" type="text" /></div></td><td><div class="filter-container"><input name="Person[firstName]" id="Person_firstName" type="text" /></div></td><td><div class="filter-container"><input name="Person[lastName]" id="Person_lastName" type="text" /></div></td><td><div class="filter-container"><input name="Person[language]" id="Person_language" type="text" /></div></td><td><div class="filter-container"><input name="Person[hours]" id="Person_hours" type="text" /></div></td><td>&nbsp;</td></tr>
</thead>
<tbody>
<tr class="odd"><td><img src="http://placekitten.com/48/48" /></td><td style="width: 60px">1</td><td>Mark</td><td>Otto</td><td>CSS</td><td class="tobeselected">10</td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td></tr>
<tr class="even"><td><img src="http://placekitten.com/48/48" /></td><td style="width: 60px">2</td><td>Jacob</td><td>Thornton</td><td>JavaScript</td><td class="tobeselected">20</td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td></tr>
<tr class="odd"><td><img src="http://placekitten.com/48/48" /></td><td style="width: 60px">3</td><td>Stu</td><td>Dent</td><td>HTML</td><td class="tobeselected">15</td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td></tr>
<tr class="even"><td><img src="http://placekitten.com/48/48" /></td><td style="width: 60px">4</td><td>Sunny</td><td>Man</td><td>HTML</td><td class="tobeselected">15</td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td></tr>
</tbody>
</table><div class="keys" style="display:none" title="/extended-grid.html"><span>1</span><span>2</span><span>3</span><span>4</span></div>
</div>    <div style="clear:both"></div>
</div>
<pre class="prettyprint linenums">
$this->widget('bootstrap.widgets.TbExtendedGridView', array(
    'filter'=>$person,
    'type'=>'striped bordered',
    'dataProvider' => $gridDataProvider,
    'template' => "{items}",
    'columns' => array_merge(array(array('class'=>'bootstrap.widgets.TbImageColumn')),$gridColumns),
));
</pre>
<h3>TbRelationalColumn</h3>

<p>
    Display relational data or extra info from an ajax call into a dynamically created sub-row. This column
    is thought in order to display sub-grids or a more extended information about a model. The
    <code>TbPickerColumn</code> has a
    similar behavior but the amount of information that we can display is a less that with
    <code>TbRelationalColumn</code>.
</p>

<p>
    <span class="label label-important">Important</span>: Do not use this type of column to display a link. It is
    recommended
    to work with css classes instead to change the style of its contents.
</p>

<div class="bs-docs-example">
	<div id="yw26" class="grid-view">
<table class="items table table-striped table-bordered">
<thead>
<tr>
<th id="yw26_c0">firstLetter</th><th id="yw26_c1">#</th><th id="yw26_c2">First name</th><th id="yw26_c3">Last name</th><th id="yw26_c4">Language</th><th id="yw26_c5">Hours worked</th><th class="button-column" id="yw26_c6">Edit</th></tr>
<tr class="filters">
<td><div class="filter-container"><input name="Person[firstLetter]" id="Person_firstLetter" type="text" /></div></td><td><div class="filter-container"><input name="Person[id]" id="Person_id" type="text" /></div></td><td><div class="filter-container"><input name="Person[firstName]" id="Person_firstName" type="text" /></div></td><td><div class="filter-container"><input name="Person[lastName]" id="Person_lastName" type="text" /></div></td><td><div class="filter-container"><input name="Person[language]" id="Person_language" type="text" /></div></td><td><div class="filter-container"><input name="Person[hours]" id="Person_hours" type="text" /></div></td><td>&nbsp;</td></tr>
</thead>
<tbody>
<tr class="odd"><td><span class="tbrelational-column" data-rowid="1">test-subgrid</span></td><td style="width: 60px">1</td><td>Mark</td><td>Otto</td><td>CSS</td><td class="tobeselected">10</td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td></tr>
<tr class="even"><td><span class="tbrelational-column" data-rowid="2">test-subgrid</span></td><td style="width: 60px">2</td><td>Jacob</td><td>Thornton</td><td>JavaScript</td><td class="tobeselected">20</td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td></tr>
<tr class="odd"><td><span class="tbrelational-column" data-rowid="3">test-subgrid</span></td><td style="width: 60px">3</td><td>Stu</td><td>Dent</td><td>HTML</td><td class="tobeselected">15</td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td></tr>
<tr class="even"><td><span class="tbrelational-column" data-rowid="4">test-subgrid</span></td><td style="width: 60px">4</td><td>Sunny</td><td>Man</td><td>HTML</td><td class="tobeselected">15</td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td></tr>
</tbody>
</table><div class="keys" style="display:none" title="/extended-grid.html"><span>1</span><span>2</span><span>3</span><span>4</span></div>
</div>    <div style="clear:both"></div>
</div>
<pre class="prettyprint linenums">
// on your view
$this->widget('bootstrap.widgets.TbExtendedGridView', array(
    'filter'=>$person,
    'type'=>'striped bordered',
    'dataProvider' => $gridDataProvider,
    'template' => "{items}",
    'columns' => array_merge(array(
        array(
            'class'=>'bootstrap.widgets.TbRelationalColumn',
            'name' => 'firstLetter',
			'url' => $this->createUrl('site/relational'),
            'value'=> '"test-subgrid"',
            'afterAjaxUpdate' => 'js:function(tr,rowid,data){
                bootbox.alert("I have afterAjax events too!<br/>This will only happen once for row with id: "+rowid);
            }'
		)
    ),$gridColumns),
));

// on your controller
// example code for action rendering the relational data
public function actionRelational()
{
	// partially rendering "_relational" view
	$this->renderPartial('_relational', array(
		'id' => Yii::app()->getRequest()->getParam('id'),
		'gridDataProvider' => $this->getGridDataProvider(),
		'gridColumns' => $this->getGridColumns()
	));
}

// example code for the view "_relational" that returns the HTML content
echo CHtml::tag('h3',array(),'RELATIONAL DATA EXAMPLE ROW : "'.$id.'"');
$this->widget('bootstrap.widgets.TbExtendedGridView', array(
	'type'=>'striped bordered',
	'dataProvider' => $gridDataProvider,
	'template' => "{items}",
	'columns' => array_merge(array(array('class'=>'bootstrap.widgets.TbImageColumn')),$gridColumns),
));
</pre>
<h3>TbTotalSumColumn</h3>

<p>
    Sometimes we just need to sum up and there is no need to display it on a summary.
</p>

<div class="bs-docs-example">
	<div id="yw27" class="grid-view">
<table class="items table table-striped table-bordered">
<thead>
<tr>
<th id="yw27_c0">#</th><th id="yw27_c1">First name</th><th id="yw27_c2">Last name</th><th id="yw27_c3">Language</th><th id="yw27_c4">Hours worked</th><th class="button-column" id="yw27_c5">&nbsp;</th></tr>
<tr class="filters">
<td><div class="filter-container"><input name="Person[id]" id="Person_id" type="text" /></div></td><td><div class="filter-container"><input name="Person[firstName]" id="Person_firstName" type="text" /></div></td><td><div class="filter-container"><input name="Person[lastName]" id="Person_lastName" type="text" /></div></td><td><div class="filter-container"><input name="Person[language]" id="Person_language" type="text" /></div></td><td><div class="filter-container"><input name="Person[hours]" id="Person_hours" type="text" /></div></td><td>&nbsp;</td></tr>
</thead>
<tfoot>
<tr>
<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td><strong>Total Hours</strong></td><td>60</td><td class="button-column">&nbsp;</td></tr>
</tfoot>
<tbody>
<tr class="odd"><td style="width: 60px">1</td><td>Mark</td><td>Otto</td><td>CSS</td><td>10</td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td></tr>
<tr class="even"><td style="width: 60px">2</td><td>Jacob</td><td>Thornton</td><td>JavaScript</td><td>20</td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td></tr>
<tr class="odd"><td style="width: 60px">3</td><td>Stu</td><td>Dent</td><td>HTML</td><td>15</td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td></tr>
<tr class="even"><td style="width: 60px">4</td><td>Sunny</td><td>Man</td><td>HTML</td><td>15</td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td></tr>
</tbody>
</table><div class="keys" style="display:none" title="/extended-grid.html"><span>1</span><span>2</span><span>3</span><span>4</span></div>
</div>    <div style="clear:both"></div>
</div>
<pre class="prettyprint linenums">
$this->widget('bootstrap.widgets.TbExtendedGridView', array(
    'filter'=>$person,
    'type'=>'striped bordered',
    'dataProvider' => $gridDataProvider,
    'template' => "{items}",
    'columns' =>array(
        array('name'=>'id', 'header'=>'#', 'htmlOptions'=>array('style'=>'width: 60px')),
        array('name'=>'firstName', 'header'=>'First name'),
        array('name'=>'lastName', 'header'=>'Last name'),
        array('name'=>'language', 'header'=>'Language', 'footer'=>'<strong>Total Hours</strong>'),
        array(
            'name'=>'hours',
            'header'=>'Hours worked',
            'class'=>'bootstrap.widgets.TbTotalSumColumn'
        ),
        array(
            'htmlOptions' => array('nowrap'=>'nowrap'),
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'viewButtonUrl'=>null,
            'updateButtonUrl'=>null,
            'deleteButtonUrl'=>null,
        )
    ),
));
</pre>
<h3>TbToggleColumn</h3>

<p>
    Allows to modify the value of column on the fly. This type of column is good when you wish to modify the value of
	a displayed model that has two states: yes-no, true-false, 1-0, yin-yan, etc...
</p>
<p>
	The widget works in conjunction with an action that will receive the <code>id</code> and the <code>attribute</code>
	parameters. <code>YiiBooster</code> comes with an action ready to use for that purpose: <code>TbToggleAction</code>.
</p>
<p>
	See the next example on how to use:
</p>

<div class="bs-docs-example">
	<div id="yw28" class="grid-view">
<table class="items table table-striped table-bordered">
<thead>
<tr>
<th id="yw28_c0"><a class="sort-link" href="/extended-grid.html?Region_sort=country_code">Country Code<span class="caret"></span></a></th><th id="yw28_c1"><a class="sort-link" href="/extended-grid.html?Region_sort=name">Region Name<span class="caret"></span></a></th><th class="toggle-column" id="yw28_c2"><a class="sort-link" href="/extended-grid.html?Region_sort=status">Toggle</a></th></tr>
</thead>
<tbody>
<tr class="odd"><td>CA</td><td>Alberta</td><td class="toggle-column"><a class="status_toggle" title="Uncheck" rel="tooltip" href="/site/toggle/id/1/attribute/status.html"><i class="icon-ok-circle"></i></a></td></tr>
<tr class="even"><td>CA</td><td>British Columbia</td><td class="toggle-column"><a class="status_toggle" title="Uncheck" rel="tooltip" href="/site/toggle/id/2/attribute/status.html"><i class="icon-ok-circle"></i></a></td></tr>
<tr class="odd"><td>CA</td><td>Manitoba</td><td class="toggle-column"><a class="status_toggle" title="Check" rel="tooltip" href="/site/toggle/id/3/attribute/status.html"><i class="icon-remove-sign"></i></a></td></tr>
<tr class="even"><td>CA</td><td>New Brunswick</td><td class="toggle-column"><a class="status_toggle" title="Check" rel="tooltip" href="/site/toggle/id/4/attribute/status.html"><i class="icon-remove-sign"></i></a></td></tr>
</tbody>
</table><div class="keys" style="display:none" title="/extended-grid.html"><span>1</span><span>2</span><span>3</span><span>4</span></div>
</div>    <div style="clear:both"></div>
</div>
<pre class="prettyprint linenums">
// on your controller, set the action Toggle
public function actions()
{
    return array(
        'toggle' => array(
        'class'=>'bootstrap.actions.TbToggleAction',
        'modelName' => 'Region',
        )
    );
}
// The Grid
$this->widget('bootstrap.widgets.TbGridView', array(
    'type' => 'striped bordered',
    'dataProvider' => $dataProvider,
    'template' => "{items}",
    'columns' => array(
        array('name' => 'country_code', 'header' => 'Country Code'),
        array('name' => 'name', 'header' => 'Region Name'),
        array(
            'class'=>'bootstrap.widgets.TbToggleColumn',
            'toggleAction'=>'site/toggle',
            'name' => 'status',
            'header' => 'Toggle Status'
        ),
    ))
);
</pre>
<h3>TbPickerColumn</h3>

<p>
    Display whatever content you wish with this cool plugin. It makes use of a bootstrap tooltip
    plugin that we have developed, so you can configure your <strong>picker</strong> with the regular
    bootstrap tooltip options plus an extra one: <code>width</code>.
</p>

<div class="bs-docs-example">
	<div id="yw29" class="grid-view">
<table class="items table table-striped table-bordered">
<thead>
<tr>
<th id="yw29_c0">#</th><th id="yw29_c1">First name</th><th id="yw29_c2">Last name</th><th id="yw29_c3">Language</th><th id="yw29_c4">Hours worked</th><th class="button-column" id="yw29_c5">&nbsp;</th></tr>
<tr class="filters">
<td><div class="filter-container"><input name="Person[id]" id="Person_id" type="text" /></div></td><td><div class="filter-container"><input name="Person[firstName]" id="Person_firstName" type="text" /></div></td><td><div class="filter-container"><input name="Person[lastName]" id="Person_lastName" type="text" /></div></td><td><div class="filter-container"><input name="Person[language]" id="Person_language" type="text" /></div></td><td><div class="filter-container"><input name="Person[hours]" id="Person_hours" type="text" /></div></td><td>&nbsp;</td></tr>
</thead>
<tbody>
<tr class="odd"><td style="width: 60px">1</td><td>Mark</td><td>Otto</td><td>CSS</td><td><a class="bootstrap-picker" href="#">10</a></td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td></tr>
<tr class="even"><td style="width: 60px">2</td><td>Jacob</td><td>Thornton</td><td>JavaScript</td><td><a class="bootstrap-picker" href="#">20</a></td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td></tr>
<tr class="odd"><td style="width: 60px">3</td><td>Stu</td><td>Dent</td><td>HTML</td><td><a class="bootstrap-picker" href="#">15</a></td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td></tr>
<tr class="even"><td style="width: 60px">4</td><td>Sunny</td><td>Man</td><td>HTML</td><td><a class="bootstrap-picker" href="#">15</a></td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td></tr>
</tbody>
</table><div class="keys" style="display:none" title="/extended-grid.html"><span>1</span><span>2</span><span>3</span><span>4</span></div>
</div>    <div style="clear:both"></div>
</div>
<pre class="prettyprint linenums">
$this->widget('bootstrap.widgets.TbExtendedGridView', array(
    'filter'=>$person,
    'type'=>'striped bordered',
    'dataProvider' => $gridDataProvider,
    'template' => "{items}",
    'columns' =>array(
        array('name'=>'id', 'header'=>'#', 'htmlOptions'=>array('style'=>'width: 60px')),
        array('name'=>'firstName', 'header'=>'First name'),
        array('name'=>'lastName', 'header'=>'Last name'),
        array('name'=>'language', 'header'=>'Language'),
        array(
            'name'=>'hours',
            'header'=>'Hours worked',
            'class'=>'bootstrap.widgets.TbPickerColumn',
            'pickerOptions' => array(
                'title' => 'Where did I spend my hours',
                'content' => 'js:function(){
                    // I know this is silly, but you could use AJAX here right?
                    // to change its content via AJAX, you just set it like this
                    // $(".picker-content > *").html(r); where r is the response
                    // data of your success function
                    return "Why do you want to know?";
                }'
            )
        ),
        array(
            'htmlOptions' => array('nowrap'=>'nowrap'),
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'viewButtonUrl'=>null,
            'updateButtonUrl'=>null,
            'deleteButtonUrl'=>null,
        )
    )
));
</pre>
<h3>TbJEditableColumn</h3>

<p>
    You can provide of inline editing capabilities with this column to your grid. Please, note that even
    though the TbJEditableColumn plugins are the ones from <a target="_blank"
                                                              target="http://www.appelsiini.net/projects/jeditable">jquery.jeditable</a>
    plugin, they have been modified
    to clean up bugs and make them use properly with the grid. Do not override the plugins directly from those of
    <a target="_blank" target="http://www.appelsiini.net/projects/jeditable">jquery.jeditable</a>, as they may not work
    as expected.
</p>

<p>
    These are the types supported by TbJEditableColumn:
<ul>
    <li><code>text</code>: edit in place displaying a input text field</li>
    <li><code>select</code>: edit in place displaying a dropdown list field form</li>
    <li><code>textarea</code>: edit in place displaying a textarea field</li>
    <li><code>time</code>: edit in place displaying a time form</li>
    <li><code>masked</code>: edit in place displaying a masked jquery input plugin</li>
    <li><code>bdatepicker</code>: edit in place displaying a bootstrap calendar plugin</li>
    <li><code>bcolorpicker</code>: edit in place displaying a bootstrap color picker plugin</li>
</ul>
The javascript will always submit the row <code>id</code> plus <code>editable</code> that holds the grid <code>id</code>
</p>
<p>The following example show how it works. Please, double click on any hours to display the inline editor</p>

<div class="bs-docs-example">
	<div id="yw30" class="grid-view">
<table class="items table table-striped table-bordered">
<thead>
<tr>
<th id="yw30_c0">#</th><th id="yw30_c1">First name</th><th id="yw30_c2">Last name</th><th id="yw30_c3">Language</th><th style="width:80px" id="yw30_c4">Hours worked</th><th class="button-column" id="yw30_c5">&nbsp;</th></tr>
<tr class="filters">
<td><div class="filter-container"><input name="Person[id]" id="Person_id" type="text" /></div></td><td><div class="filter-container"><input name="Person[firstName]" id="Person_firstName" type="text" /></div></td><td><div class="filter-container"><input name="Person[lastName]" id="Person_lastName" type="text" /></div></td><td><div class="filter-container"><input name="Person[language]" id="Person_language" type="text" /></div></td><td><div class="filter-container"><input name="Person[hours]" id="Person_hours" type="text" /></div></td><td>&nbsp;</td></tr>
</thead>
<tbody>
<tr class="odd"><td style="width: 60px">1</td><td>Mark</td><td>Otto</td><td>CSS</td><td><span class="tbjeditable-column-yw30_c4" data-rowid="1">10</span></td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td></tr>
<tr class="even"><td style="width: 60px">2</td><td>Jacob</td><td>Thornton</td><td>JavaScript</td><td><span class="tbjeditable-column-yw30_c4" data-rowid="2">20</span></td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td></tr>
<tr class="odd"><td style="width: 60px">3</td><td>Stu</td><td>Dent</td><td>HTML</td><td><span class="tbjeditable-column-yw30_c4" data-rowid="3">15</span></td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td></tr>
<tr class="even"><td style="width: 60px">4</td><td>Sunny</td><td>Man</td><td>HTML</td><td><span class="tbjeditable-column-yw30_c4" data-rowid="4">15</span></td><td nowrap="nowrap"><a class="view" title="View" rel="tooltip" href="#"><i class="icon-eye-open"></i></a> <a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td></tr>
</tbody>
</table><div class="keys" style="display:none" title="/extended-grid.html"><span>1</span><span>2</span><span>3</span><span>4</span></div>
</div>    <div style="clear:both"></div>
</div>
<pre class="prettyprint linenums">
$this->widget('bootstrap.widgets.TbExtendedGridView', array(
    'filter'=>$person,
    'type'=>'striped bordered',
    'dataProvider' => $gridDataProvider,
    'template' => "{items}",
    'columns' =>array(
        array('name'=>'id', 'header'=>'#', 'htmlOptions'=>array('style'=>'width: 60px')),
        array('name'=>'firstName', 'header'=>'First name'),
        array('name'=>'lastName', 'header'=>'Last name'),
        array('name'=>'language', 'header'=>'Language'),
        array(
            'name'=>'hours',
            'header'=>'Hours worked',
			'headerHtmlOptions' => array('style' => 'width:50px')
            'class'=>'bootstrap.widgets.TbJEditableColumn',
            'jEditableOptions' => array(
	            'type' => 'text',
				// very important to get the attribute to update on the server!
	            'submitdata' => array('attribute'=>'hours'),
	            'cssclass' => 'form',
	            'width' => '80px'
            )
        ),
        array(
            'htmlOptions' => array('nowrap'=>'nowrap'),
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'viewButtonUrl'=>null,
            'updateButtonUrl'=>null,
            'deleteButtonUrl'=>null,
        )
    )
));
</pre>
<p>
    For the sake of the example, we have just echo the value to the client, but you get the idea on how it
    should work on the server</p>
<pre class="prettyprint linenums">
$r = Yii::app()->getRequest();
// we can check whether is comming from a specific grid id too
// avoided for the sake of the example
if($r->getParam('editable'))
{
	//echo $r->getParam('attribute');
	echo $r->getParam('value');
	Yii::app()->end();
}
</pre>
</section>
    </div>
</div>