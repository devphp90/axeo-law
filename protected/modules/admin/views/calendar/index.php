<?php
cs()->registerCoreScript('jquery.ui');
cs()->registerScriptFile('/js/fullcalendar/fullcalendar.min.js');
cs()->registerCssFile('/css/fullcalendar/fullcalendar.css');
//cs()->registerCssFile('/css/fullcalendar/fullcalendar.print.css');

$events = $this->getEventData();
?>

<!-- Color Notes -->
<div class="notes" style="padding-bottom: 30px;">
    <div style="margin:0 10px 0 0;float:right;">
        <div style="width:15px; height:15px; background:<?php echo param('eventColor', 'task') ?>;float:left; margin:3px 5px 0 0"></div>Task
    </div>
    <div style="margin:0 10px 0 0;float:right;">
        <div style="width:15px; height:15px; background:<?php echo param('eventColor', 'appointment') ?>;float:left; margin:3px 5px 0 0"></div>Appointment
    </div>
</div>
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
                $('#add_event :input:text').val('');
                $('#Task_start_time').val(printDate(start));
                $('#Task_end_time').val(printDate(end));
                $('#add_event').parent().find('.ui-dialog-title').text('Add Task');
                $('#add_event').dialog('open');
            },
            eventClick: function (event) {
                currentId = event.id;
                if (event.type == 'task') {
                    $('#view_event .event-content').addClass('loading');
                    $('#view_event .event-content').html('');
                    $('#view_event').dialog('open');
                    $('#view_event').parent().find('.ui-dialog-title').text('Loading...');
                    $('#view_event').parent().find('.ui-dialog-buttonset').hide();
                } else {
                    $('#view_appointment .appointment-content').addClass('loading');
                    $('#view_appointment .appointment-content').html('');
                    $('#view_appointment').dialog('open');
                    $('#view_appointment').parent().find('.ui-dialog-title').text('Loading...');
                    $('#view_appointment').parent().find('.ui-dialog-buttonset').hide();
                }
                $.ajax ({
                    url: '<?php echo url("admin/calendar/view") ?>',
                    type: 'GET',
                    data: {id: event.id, type: event.type},
                    success: function (response) {
                        if (event.type == 'task') {
                            $('#view_event .event-content').removeClass('loading');
                            $('#view_event .event-content').html(response);
                            $('#view_event').parent().find('.ui-dialog-title').text('View Task: ' + event.title);
                            $('#view_event').parent().find('.ui-dialog-buttonset').show();
                        } else {
                            $('#view_appointment .appointment-content').removeClass('loading');
                            $('#view_appointment .appointment-content').html(response);
                            $('#view_appointment').parent().find('.ui-dialog-title').text('View Appointment: ' + event.title);
                            $('#view_appointment').parent().find('.ui-dialog-buttonset').show();
                        }
                    }
                });
             }
        });
		
    });

</script>

<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id' => 'add_event',
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
    'id' => 'view_event',
    'options' => array(
        'width' => '500',
        'height' => '300',
        'title' => 'View Event',
        'autoOpen' => false,
        'buttons' => array(
            array('text' => 'Edit', 'click' => "js:function(){
                $('#add_event .event-content #event_form').html('');
                $('#add_event .event-content').addClass('loading');
                $('#view_event').dialog('close');
                $('#add_event').dialog('open');
                $('#add_event').parent().find('.ui-dialog-buttonset').hide();
                $('#add_event').parent().find('.ui-dialog-title').text('Loading...');
                $.ajax ({
                    url: '" . url('admin/calendar/edit') . "',
                    type: 'GET',
                    data: {id: currentId },
                    success: function(response) {
                        $('#add_event .event-content').removeClass('loading');
                        form = $(response);
                        $('#add_event .event-content #event_form').html(form.html());
                        $('#add_event .event-content #event_form').attr('action', form.attr('action'));
                        $('#add_event').parent().find('.ui-dialog-title').text('Edit Task: #'+currentId);
                        $('#add_event').parent().find('.ui-dialog-buttonset').show();
                        $('#Event_start_time').datetimepicker({'format':'yyyy-mm-dd hh:ii:ss','autoclose':true,'todayBtn':true,'language':'en_us','weekStart':0});
                        $('#Event_end_time').datetimepicker({'format':'yyyy-mm-dd hh:ii:ss','autoclose':true,'todayBtn':true,'language':'en_us','weekStart':0});
                    }
                });
            }"),
            array('text' => 'Delete', 'click' => "js:function(){
                    bootbox.confirm('Are you sure you want to delete this event?', function (confirmed) {
                        if(confirmed == false)
                            return;
                        $('#view_event .event-content').addClass('loading');
                        $.ajax ({
                            url: '" . url('admin/calendar/deleteEvent') . "',
                            type: 'POST',
                            data: {id: currentId},
                            success: function (response) {
                                if(response == 1) {
                                    $('#calendar').fullCalendar('removeEvents', currentId);
                                    $('#view_event').dialog('close');
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
$params = array('model' => $model);
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id' => 'view_appointment',
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