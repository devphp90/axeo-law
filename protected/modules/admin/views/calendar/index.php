<?php
cs()->registerCoreScript('jquery.ui');
cs()->registerScriptFile('/js/fullcalendar/fullcalendar.min.js');
cs()->registerCssFile('/css/fullcalendar/fullcalendar.css');
//cs()->registerCssFile('/css/fullcalendar/fullcalendar.print.css');

$events = $this->getEventData();
?>

<!-- Color Notes -->
<?php $this->renderPartial('_color_note') ?>
<!-- Color Notes -->
<div class="clearfix"></div>

<div id='calendar'></div>
<script>
    function padStr(i)
    {
        return (i < 10) ? "0" + i : "" + i;
    }
    function printDate(date)
    {
        var dateStr = padStr(date.getFullYear()) + '-' +
        padStr(1 + date.getMonth()) + '-' +
        padStr(date.getDate()) + ' ' +
        padStr(date.getHours()) + ':' +
        padStr(date.getMinutes()) + ':' +
        padStr(date.getSeconds());

        return dateStr;
    }
    
    $(document).ready(function() {
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();
		
        $('#calendar').fullCalendar({
            header: {
                left: 'today prev,next',
                center: 'title',
                right: 'agendaWeek,month,agendaDay',
                selectable: true
            },
            aspectRatio: 1,
            defaultView: 'agendaWeek',
            editable: true,
            selectable: true,
            events: <?php echo CJSON::encode($events) ?>,
            select: function (start, end, allDay) {
                $('.control-group').removeClass('error');
                $('.control-group').removeClass('success');
                $('.help-inline').html('');
                $('#add-event :input:text').val('');
                $('#Task_start_time').val(printDate(start));
                $('#Task_end_time').val(printDate(end));
                $('#add-event').parent().find('.ui-dialog-title').text('Add Task');
                $('#add-event').dialog('open');
            },
            eventClick: function (event) {
                currentId = event.id;
                if (event.type == 'task') {
                    $('#view-event .event-content').addClass('loading');
                    $('#view-event .event-content').html('');
                    $('#view-event').dialog('open');
                    $('#view-event').parent().find('.ui-dialog-title').text('Loading...');
                    $('#view-event').parent().find('.ui-dialog-buttonset').hide();
                } else if (event.type == 'appointment') {
                    $('#view-appointment .appointment-content').addClass('loading');
                    $('#view-appointment .appointment-content').html('');
                    $('#view-appointment').dialog('open');
                    $('#view-appointment').parent().find('.ui-dialog-title').text('Loading...');
                    $('#view-appointment').parent().find('.ui-dialog-buttonset').hide();
                } else if (event.type == 'keyDate') {
                    $('#view-key-date .key-date-content').addClass('loading');
                    $('#view-key-date .key-date-content').html('');
                    $('#view-key-date').dialog('open');
                    $('#view-key-date').parent().find('.ui-dialog-title').text('Loading...');
                    $('#view-key-date').parent().find('.ui-dialog-buttonset').hide();
                }
                $.ajax ({
                    url: '<?php echo url("admin/calendar/view") ?>',
                    type: 'GET',
                    data: {id: event.id, type: event.type},
                    success: function (response) {
                        if (event.type == 'task') {
                            $('#view-event .event-content').removeClass('loading');
                            $('#view-event .event-content').html(response);
                            $('#view-event').parent().find('.ui-dialog-title').text('View Task: ' + event.title);
                            $('#view-event').parent().find('.ui-dialog-buttonset').show();
                        } else if (event.type == 'appointment') {
                            $('#view-appointment .appointment-content').removeClass('loading');
                            $('#view-appointment .appointment-content').html(response);
                            $('#view-appointment').parent().find('.ui-dialog-title').text('View Appointment: ' + event.title);
                            $('#view-appointment').parent().find('.ui-dialog-buttonset').show();
                        } else if (event.type == 'keyDate') {
                            $('#view-key-date .key-date-content').removeClass('loading');
                            $('#view-key-date .key-date-content').html(response);
                            $('#view-key-date').parent().find('.ui-dialog-title').text('View Key Date: ' + event.title);
                            $('#view-key-date').parent().find('.ui-dialog-buttonset').show();
                        }
                    }
                });
             }
        });
		
    });

</script>

<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id' => 'add-event',
    // additional javascript options for the dialog plugin
    'options' => array(
        'width' => '600',
        'height' => '500',
        'title' => 'Add Event',
        'autoOpen' => false,
        'buttons' => array(
            array('text' => 'Submit', 'click' => 'js:function(){ 
                $("#event_form").submit(); 
            }'),
            array('text' => 'Cancel', 'click' => 'js:function(){ $(this).dialog("close"); }'),
        ),
    ),
));
?>
<div class="event-content">
    <?php $this->renderPartial('_form', array('model' => $model));?>
</div>
<?php
$this->endWidget('zii.widgets.jui.CJuiDialog');
?>

<?php
$params = array('model' => $model);
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id' => 'view-event',
    'options' => array(
        'width' => '500',
        'height' => '300',
        'title' => 'View Event',
        'autoOpen' => false,
        'buttons' => array(
            array('text' => 'Edit', 'click' => "js:function(){
                $('#add-event .event-content #event_form').html('');
                $('#add-event .event-content').addClass('loading');
                $('#view-event').dialog('close');
                $('#add-event').dialog('open');
                $('#add-event').parent().find('.ui-dialog-buttonset').hide();
                $('#add-event').parent().find('.ui-dialog-title').text('Loading...');
                $.ajax ({
                    url: '" . url('admin/calendar/edit') . "',
                    type: 'GET',
                    data: {id: currentId },
                    success: function(response) {
                        $('#add-event .event-content').removeClass('loading');
                        form = $(response);
                        $('#add-event .event-content #event_form').html(form.html());
                        $('#add-event .event-content #event_form').attr('action', form.attr('action'));
                        $('#add-event').parent().find('.ui-dialog-title').text('Edit Task: #'+currentId);
                        $('#add-event').parent().find('.ui-dialog-buttonset').show();
                        $('#Event_start_time').datetimepicker({'format':'yyyy-mm-dd hh:ii:ss','autoclose':true,'todayBtn':true,'language':'en_us','weekStart':0});
                        $('#Event_end_time').datetimepicker({'format':'yyyy-mm-dd hh:ii:ss','autoclose':true,'todayBtn':true,'language':'en_us','weekStart':0});
                    }
                });
            }"),
            array('text' => 'Delete', 'click' => "js:function(){
                    bootbox.confirm('Are you sure you want to delete this event?', function (confirmed) {
                        if(confirmed == false)
                            return;
                        $('#view-event .event-content').addClass('loading');
                        $.ajax ({
                            url: '" . url('admin/calendar/deleteEvent') . "',
                            type: 'POST',
                            data: {id: currentId},
                            success: function (response) {
                                if(response == 1) {
                                    $('#calendar').fullCalendar('removeEvents', currentId);
                                    $('#view-event').dialog('close');
                                }
                            }
                        });
                    });
                }"
            ),

        ),
    ),
));
?>
<div class="event-content">

</div>
<?php
$this->endWidget('zii.widgets.jui.CJuiDialog');
?>

<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id' => 'view-appointment',
    'options' => array(
        'width' => '500',
        'height' => '300',
        'title' => 'View Appointment',
        'autoOpen' => false,
    ),
));
?>
<div class="appointment-content">

</div>
<?php
$this->endWidget('zii.widgets.jui.CJuiDialog');
?>

<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id' => 'view-key-date',
    'options' => array(
        'width' => '500',
        'height' => '300',
        'title' => 'View Key Date',
        'autoOpen' => false,
    ),
));
?>
<div class="key-date-content">

</div>
<?php
$this->endWidget('zii.widgets.jui.CJuiDialog');
?>