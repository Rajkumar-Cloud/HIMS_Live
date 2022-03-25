<?php

namespace PHPMaker2021\HIMS;

// Page object
$CollectionSummary = &$Page;
?>
<?php
	$dbhelper = &DbHelper();
?>
<div class="card">
	<div class="card-header">
		<h3 class="card-title">All Collections</h3>
	</div>
	<div class="card-body p-0">
<?php
	$sql = "SELECT  UserName,CARD, CASH, neft,PAYTM,CHEQUE,RTGS,NotSelected,REFUND,CANCEL,Total FROM ganeshkumar_bjhims.view_dashboard_summary_payment_mode

	where HospID='".HospitalID()."' and createddate ='".date("Y-m-d")."' ";
	echo $dbhelper->ExecuteHtml($sql, array("fieldcaption" => TRUE, "tablename" => array("products", "categories")));
?>
	</div>
</div>



<?= GetDebugMessage() ?>
