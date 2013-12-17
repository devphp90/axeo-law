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
        
        $criteria = new CDbCriteria();
        if (user()->isAdmin()) {
            $criteria->condition = 'office_id = :officeId';
            $criteria->params = array(':officeId' => user()->officeId);
        }
        $events = Task::model()->findAll($criteria);
        
        foreach ($events as $key => $event) {
            $data[] = array(
                'id' => $event->id,
                'title' => $event->title,
                'start' => $event->start_time,
                'end' => $event->end_time,
                'allDay' => $event->all_date,
            );
        }
        
        return $data;
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
        $event = $this->loadEvent($id);
        if (request()->isAjaxRequest) {
            $this->renderPartial('view', array('model' => $event));
        }
    }
    
    protected function loadEvent($id)
    {
        $event = Task::model()->findByPk($id);
        if ($event == null)
            throw new CHttpException(404);
        return $event;
    }
    
    public function actionEdit($id)
    {
        $model = $this->loadEvent($id);
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