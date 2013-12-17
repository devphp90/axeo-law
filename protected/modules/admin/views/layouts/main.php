<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>

    <body>
        <?php
        $this->widget('bootstrap.widgets.TbNavbar', array(
            'fixed' => true,
            'brand' => Yii::app()->name . ' Office',
            'collapse' => true, // requires bootstrap-responsive.css
            'items' => array(
                array(
                    'class' => 'bootstrap.widgets.TbMenu',
                    'items' => array(
                        array(
                            'label' => Yii::t('app', 'Home'),
                            'url' => array('/admin/default/index')
                        ),
                        array(
                            'label' => Yii::t('app', 'Law Offices'),
                            'url' => array('/admin/office'),
                            'visible'=> user()->isSuperAdmin(),
                        ),
                        array(
                            'label' => Yii::t('app', 'Role'),
                            'url' => array('/admin/role'),
                            'visible'=> user()->isSuperAdmin() || user()->isAdmin(),
                        ),
                        array(
                            'label' => Yii::t('app', 'Staff'),
                            'url' => array('/admin/staff'),
                            'visible'=> user()->isAdmin(),
                        ),
                        array(
                            'label' => Yii::t('app', 'Clients'),
                            'url' => array('/admin/client'),
                        ),
                        array(
                            'label' => Yii::t('app', 'Matters'),
                            'url' => array('/admin/matter'),
                        ),
                        array(
                            'label' => Yii::t('app', 'Documents'),
                            'url' => array('/admin/document'),
                        ),
                        array(
                            'label' => Yii::t('app', 'Appointment'),
                            'url' => array('/admin/appointment'),
                        ),
                        array(
                            'label' => Yii::t('app', 'Calendar'),
                            'url' => array('/admin/calendar'),
                        ),
                    ),
                ),
                array(
                    'class' => 'bootstrap.widgets.TbMenu',
                    'htmlOptions' => array('class' => 'pull-right'),
                    'items' => array(
                        array('label' => Yii::t('app', 'Logout'), 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest),
                        array('label' => Yii::t('app', 'Login'), 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
                    ),
                ),
            ),
        ));
        ?>
        <div class="container" id="page">
            <?php // if (isset($this->breadcrumbs)): ?>
                <?php
               /* $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
                    'links' => $this->breadcrumbs,
                    'homeLink' => CHtml::link('Home', $this->homeUrl),
                ));*/
                ?>
            <?php //endif ?>


            <?php echo $content; ?>

            <hr/>

            <div id="footer">
                Copyright &copy; <?php echo date('Y'); ?> by AXEO.<br/>
                All Rights Reserved.<br/>
                
            </div><!-- footer -->

        </div><!-- page -->

    </body>
</html>