<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>Software for Loan Processing and <?php echo CHtml::encode(Yii::app()->name); ?></h1>

<h3>Real estate, autos, boats, appliances, ...</h3>
<p>~ <strong>LoanPro is cloud-based</strong>.&nbsp; Designed and built from the 
ground-up for the cloud using the latest Open Source platform, tools, and 
techniques. No infrastructure to install, maintain, and secure  
lowering Total Cost of Ownership (TCO). The software and data reside in a Tier-1 
datacenter connected to the Internet.</p>
<p>~ <strong>LoanPro is browser-based</strong>.&nbsp; Accessible from any 
device such as a PC, Mac, smartphone, or tablet that can run a browser (IE, Chrome, Safari, 
etc.).&nbsp; No software to install or upgrade lowering TCO and increasing 
flexibility.</p>
<p>~ <strong>LoanPro is multi-portal</strong>.&nbsp; Not just the typical User and Admin, but 
Borrower, Lender, Appraiser, Title, etc.</p>
<p>~ <strong>LoanPro is fast</strong>. A cloud app, but comparable to, or even faster than 
in office, client-server systems.</p>
<p>~ <strong>LoanPro provides a modern UI/UX</strong>, in a cloud based app.&nbsp; 
The same features users 
have long enjoyed on desktop computers with Windows and MacOS.</p>
<p>~ <strong>LoanPro is built with security</strong> as a main concern, and includes options such as Multi Factor Authentication 
(MFA).</p>
<?php
$this->widget('ext.eguiders.EGuider', array(
              'id'          => 'first',
        'next'        => 'second',
        'title'       => 'Guider title',
        'buttons'     => array(array('name'=>'Next')),
        'description' => '<b>here you should put some intresting text</b>',
        'overlay'     => true,
        'xButton'     => true,
        // look here !! 'show' is true, so that means this guider will be
        // automatically displayed when the page loads
        'show'        => true,
        'autoFocus'      => true
    )
);