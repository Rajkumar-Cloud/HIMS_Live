<?php

namespace PHPMaker2021\HIMS;

// Page object
$BillCollectionReport = &$Page;
?>
<?php
	$dbhelper = &DbHelper();
?>





<div class="input-group date" data-provide="datepicker">
	<input type="text" class="form-control">
	<div class="input-group-addon">
		<span class="glyphicon glyphicon-th"></span>
	</div>
</div>


<script>
$('.datepicker').datepicker({
	format: 'mm/dd/yyyy',
	startDate: '-3d'
});
</script>

<div class="card">
	<div class="card-header">
		<h3 class="card-title">Bill Collections</h3>
	</div>
	<div class="card-body p-0">
<?php
	$sql = "SELECT  UserName,CARD, CASH, neft,PAYTM,CHEQUE,RTGS,NotSelected,REFUND,CANCEL,Total FROM ganeshkumar_bjhims.view_dashboard_summary_payment_mode

	where HospID='".HospitalID()."' and createddate ='".date("Y-m-d")."' ";
	echo $dbhelper->ExecuteHtml($sql, array("fieldcaption" => TRUE, "tablename" => array("products", "categories")));
?>
	</div>
</div>
<div class="card">
	<div class="card-header">
		<h3 class="card-title">Deptment Wise</h3>
	</div>
	<div class="card-body p-0">
<?php
	$sql = "SELECT DEPARTMENT,TestCount,SumAmount FROM ganeshkumar_bjhims.view_dashboard_service_count
	where HospID='".HospitalID()."' and createddate ='".date("Y-m-d")."'";
	echo $dbhelper->ExecuteHtml($sql, array("fieldcaption" => TRUE, "tablename" => array("products", "categories")));
?>
	</div>
</div>


<?= GetDebugMessage() ?>
