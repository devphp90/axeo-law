<?php

class CalendarController extends AdminController
{
    public $modelClass = 'Task';
    public $layout = '/layouts/column1';
    
    public function actionIndex()
    {
        $model = new Task();
        $model->all_date = Task::ALL_DATE_YES;
        $this->render('index', array('model' => $model));
    }
    
    protected function getEventData()
    {
        $data = array();
        
        // get data from tasks
        $tasks = $this->getTasks();
        $taskColor = param('eventColor', 'task');
        foreach ($tasks as $key => $task) {
            $data[] = array(
                'id' => $task->id,
                'title' => $task->title,
                'start' => $task->start_time,
                'end' => $task->end_time,
                'allDay' => $task->all_date == Task::ALL_DATE_YES ? true : false,
                'color' => $taskColor,
                'type' => 'task',
            );
        }
        
        // get data from appointment
        $appointments = $this->getAppointments();
        $apptColor = param('eventColor', 'appointment');
        foreach ($appointments as $key => $appointment) {
            $data[] = array(
                'id' => $appointment->id,
                'title' => $appointment->title,
                'start' => $appointment->start_time,
                'end' => $appointment->end_time,
                'allDay' => false,
                'color' => $apptColor,
                'type' => 'appointment',
            );
        }
        
        // get data from appointment
        $keyDates = $this->getKeyDates();
        $keyDateColor = param('eventColor', 'keyDate');
        foreach ($keyDates as $key => $keyDate) {
            $data[] = array(
                'id' => $keyDate->id,
                'title' => $keyDate->title,
                'start' => $keyDate->start_date,
                'end' => $keyDate->end_date,
                'allDay' => false,
                'color' => $keyDateColor,
                'type' => 'keyDate',
            );
        }
        
        return $data;
    }
    
    protected function getTasks()
    {
        $criteria = new CDbCriteria();
        if (user()->isAdmin()) {
            $criteria->condition = 'office_id = :officeId';
            $criteria->params = array(':officeId' => user()->officeId);
        }
        return Task::model()->findAll($criteria);
    }
    
    protected function getAppointments()
    {
        $criteria = new CDbCriteria();
        if (user()->isAdmin()) {
            $criteria->condition = 'office_id = :officeId';
            $criteria->params = array(':officeId' => user()->officeId);
        }
        return Appointment::model()->findAll($criteria);
    }
    
    protected function getKeyDates()
    {
        $criteria = new CDbCriteria();
        if (user()->isAdmin()) {
            $criteria->condition = 'office_id = :officeId';
            $criteria->params = array(':officeId' => user()->officeId);
        }
        return KeyDate::model()->findAll($criteria);
    }

    public function actionAdd()
    {
        $model = new Task();
        $model->all_date = 1;
        
        Utils::ajaxValidation($model, 'event_form');
        if (isset($_POST['Task'])) {
            $model->attributes = $_POST['Task'];
            if (!user()->isSuperAdmin())
                $model->office_id = user()->officeId;
            $model->save();
            $this->redirect('index');
        }
        $this->render('index', array('model' => $model));

    }
    
    public function actionView($id)
    {
        if (request()->isAjaxRequest) {
            $type = app()->request->getParam('type');
            switch ($type) {
                case 'task':
                    $this->modelClass = 'Task';
                    $model = $this->loadModel($id);
                    $this->renderPartial('_view_task', array('model' => $model));
                    break;
                case 'appointment':
                    $this->modelClass = 'Appointment';
                    $model = $this->loadModel($id);
                    $this->renderPartial('_view_appointment', array('model' => $model));
                    break;
                case 'keyDate':
                    $this->modelClass = 'KeyDate';
                    $model = $this->loadModel($id);
                    $this->renderPartial('_view_key_date', array('model' => $model));
                    break;
                default :
                    break;
            }
        }
    }
    
    public function actionEdit($id)
    {
        $model = $this->loadModel($id);
        Utils::ajaxValidation($model, 'event_form');
        if (isset($_POST['Task'])) {
            $model->attributes = $_POST['Task'];
            //TODO: Need change user_kindergarten_id
            $model->save();
            $this->redirect(url('admin/calendar/index'));
        }
        if (request()->isAjaxRequest) {
            $this->renderPartial('_form', array('model' => $model, 'action' => url('admin/calendar/edit', array('id' => $model->id))));
        }
    }
    
    public function actionDeleteEvent()
    {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $res = Task::model()->deleteByPk($id);
            if (request()->isAjaxRequest) {
                echo $res;
            } else {
                $this->redirect(url('admin/calendar/index'));
            }
        }
    }
}