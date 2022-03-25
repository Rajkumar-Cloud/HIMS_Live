<?php
namespace PHPMaker2019\HIMS;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start(); 

// Autoload
include_once "autoload.php";
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$view_ip_advance_view = new view_ip_advance_view();

// Run the page
$view_ip_advance_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_ip_advance_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_ip_advance->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fview_ip_advanceview = currentForm = new ew.Form("fview_ip_advanceview", "view");

// Form_CustomValidate event
fview_ip_advanceview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_ip_advanceview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_ip_advanceview.lists["x_ModeofPayment"] = <?php echo $view_ip_advance_view->ModeofPayment->Lookup->toClientList() ?>;
fview_ip_advanceview.lists["x_ModeofPayment"].options = <?php echo JsonEncode($view_ip_advance_view->ModeofPayment->lookupOptions()) ?>;
fview_ip_advanceview.lists["x_Reception"] = <?php echo $view_ip_advance_view->Reception->Lookup->toClientList() ?>;
fview_ip_advanceview.lists["x_Reception"].options = <?php echo JsonEncode($view_ip_advance_view->Reception->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$view_ip_advance->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $view_ip_advance_view->ExportOptions->render("body") ?>
<?php $view_ip_advance_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $view_ip_advance_view->showPageHeader(); ?>
<?php
$view_ip_advance_view->showMessage();
?>
<form name="fview_ip_advanceview" id="fview_ip_advanceview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_ip_advance_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_ip_advance_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_ip_advance">
<input type="hidden" name="modal" value="<?php echo (int)$view_ip_advance_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($view_ip_advance->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $view_ip_advance_view->TableLeftColumnClass ?>"><span id="elh_view_ip_advance_id"><script id="tpc_view_ip_advance_id" class="view_ip_advanceview" type="text/html"><span><?php echo $view_ip_advance->id->caption() ?></span></script></span></td>
		<td data-name="id"<?php echo $view_ip_advance->id->cellAttributes() ?>>
<script id="tpx_view_ip_advance_id" class="view_ip_advanceview" type="text/html">
<span id="el_view_ip_advance_id">
<span<?php echo $view_ip_advance->id->viewAttributes() ?>>
<?php echo $view_ip_advance->id->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_advance->Name->Visible) { // Name ?>
	<tr id="r_Name">
		<td class="<?php echo $view_ip_advance_view->TableLeftColumnClass ?>"><span id="elh_view_ip_advance_Name"><script id="tpc_view_ip_advance_Name" class="view_ip_advanceview" type="text/html"><span><?php echo $view_ip_advance->Name->caption() ?></span></script></span></td>
		<td data-name="Name"<?php echo $view_ip_advance->Name->cellAttributes() ?>>
<script id="tpx_view_ip_advance_Name" class="view_ip_advanceview" type="text/html">
<span id="el_view_ip_advance_Name">
<span<?php echo $view_ip_advance->Name->viewAttributes() ?>>
<?php echo $view_ip_advance->Name->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_advance->Mobile->Visible) { // Mobile ?>
	<tr id="r_Mobile">
		<td class="<?php echo $view_ip_advance_view->TableLeftColumnClass ?>"><span id="elh_view_ip_advance_Mobile"><script id="tpc_view_ip_advance_Mobile" class="view_ip_advanceview" type="text/html"><span><?php echo $view_ip_advance->Mobile->caption() ?></span></script></span></td>
		<td data-name="Mobile"<?php echo $view_ip_advance->Mobile->cellAttributes() ?>>
<script id="tpx_view_ip_advance_Mobile" class="view_ip_advanceview" type="text/html">
<span id="el_view_ip_advance_Mobile">
<span<?php echo $view_ip_advance->Mobile->viewAttributes() ?>>
<?php echo $view_ip_advance->Mobile->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_advance->voucher_type->Visible) { // voucher_type ?>
	<tr id="r_voucher_type">
		<td class="<?php echo $view_ip_advance_view->TableLeftColumnClass ?>"><span id="elh_view_ip_advance_voucher_type"><script id="tpc_view_ip_advance_voucher_type" class="view_ip_advanceview" type="text/html"><span><?php echo $view_ip_advance->voucher_type->caption() ?></span></script></span></td>
		<td data-name="voucher_type"<?php echo $view_ip_advance->voucher_type->cellAttributes() ?>>
<script id="tpx_view_ip_advance_voucher_type" class="view_ip_advanceview" type="text/html">
<span id="el_view_ip_advance_voucher_type">
<span<?php echo $view_ip_advance->voucher_type->viewAttributes() ?>>
<?php echo $view_ip_advance->voucher_type->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_advance->Details->Visible) { // Details ?>
	<tr id="r_Details">
		<td class="<?php echo $view_ip_advance_view->TableLeftColumnClass ?>"><span id="elh_view_ip_advance_Details"><script id="tpc_view_ip_advance_Details" class="view_ip_advanceview" type="text/html"><span><?php echo $view_ip_advance->Details->caption() ?></span></script></span></td>
		<td data-name="Details"<?php echo $view_ip_advance->Details->cellAttributes() ?>>
<script id="tpx_view_ip_advance_Details" class="view_ip_advanceview" type="text/html">
<span id="el_view_ip_advance_Details">
<span<?php echo $view_ip_advance->Details->viewAttributes() ?>>
<?php echo $view_ip_advance->Details->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_advance->ModeofPayment->Visible) { // ModeofPayment ?>
	<tr id="r_ModeofPayment">
		<td class="<?php echo $view_ip_advance_view->TableLeftColumnClass ?>"><span id="elh_view_ip_advance_ModeofPayment"><script id="tpc_view_ip_advance_ModeofPayment" class="view_ip_advanceview" type="text/html"><span><?php echo $view_ip_advance->ModeofPayment->caption() ?></span></script></span></td>
		<td data-name="ModeofPayment"<?php echo $view_ip_advance->ModeofPayment->cellAttributes() ?>>
<script id="tpx_view_ip_advance_ModeofPayment" class="view_ip_advanceview" type="text/html">
<span id="el_view_ip_advance_ModeofPayment">
<span<?php echo $view_ip_advance->ModeofPayment->viewAttributes() ?>>
<?php echo $view_ip_advance->ModeofPayment->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_advance->Amount->Visible) { // Amount ?>
	<tr id="r_Amount">
		<td class="<?php echo $view_ip_advance_view->TableLeftColumnClass ?>"><span id="elh_view_ip_advance_Amount"><script id="tpc_view_ip_advance_Amount" class="view_ip_advanceview" type="text/html"><span><?php echo $view_ip_advance->Amount->caption() ?></span></script></span></td>
		<td data-name="Amount"<?php echo $view_ip_advance->Amount->cellAttributes() ?>>
<script id="tpx_view_ip_advance_Amount" class="view_ip_advanceview" type="text/html">
<span id="el_view_ip_advance_Amount">
<span<?php echo $view_ip_advance->Amount->viewAttributes() ?>>
<?php echo $view_ip_advance->Amount->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_advance->AnyDues->Visible) { // AnyDues ?>
	<tr id="r_AnyDues">
		<td class="<?php echo $view_ip_advance_view->TableLeftColumnClass ?>"><span id="elh_view_ip_advance_AnyDues"><script id="tpc_view_ip_advance_AnyDues" class="view_ip_advanceview" type="text/html"><span><?php echo $view_ip_advance->AnyDues->caption() ?></span></script></span></td>
		<td data-name="AnyDues"<?php echo $view_ip_advance->AnyDues->cellAttributes() ?>>
<script id="tpx_view_ip_advance_AnyDues" class="view_ip_advanceview" type="text/html">
<span id="el_view_ip_advance_AnyDues">
<span<?php echo $view_ip_advance->AnyDues->viewAttributes() ?>>
<?php echo $view_ip_advance->AnyDues->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_advance->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $view_ip_advance_view->TableLeftColumnClass ?>"><span id="elh_view_ip_advance_createdby"><script id="tpc_view_ip_advance_createdby" class="view_ip_advanceview" type="text/html"><span><?php echo $view_ip_advance->createdby->caption() ?></span></script></span></td>
		<td data-name="createdby"<?php echo $view_ip_advance->createdby->cellAttributes() ?>>
<script id="tpx_view_ip_advance_createdby" class="view_ip_advanceview" type="text/html">
<span id="el_view_ip_advance_createdby">
<span<?php echo $view_ip_advance->createdby->viewAttributes() ?>>
<?php echo $view_ip_advance->createdby->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_advance->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $view_ip_advance_view->TableLeftColumnClass ?>"><span id="elh_view_ip_advance_createddatetime"><script id="tpc_view_ip_advance_createddatetime" class="view_ip_advanceview" type="text/html"><span><?php echo $view_ip_advance->createddatetime->caption() ?></span></script></span></td>
		<td data-name="createddatetime"<?php echo $view_ip_advance->createddatetime->cellAttributes() ?>>
<script id="tpx_view_ip_advance_createddatetime" class="view_ip_advanceview" type="text/html">
<span id="el_view_ip_advance_createddatetime">
<span<?php echo $view_ip_advance->createddatetime->viewAttributes() ?>>
<?php echo $view_ip_advance->createddatetime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_advance->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $view_ip_advance_view->TableLeftColumnClass ?>"><span id="elh_view_ip_advance_modifiedby"><script id="tpc_view_ip_advance_modifiedby" class="view_ip_advanceview" type="text/html"><span><?php echo $view_ip_advance->modifiedby->caption() ?></span></script></span></td>
		<td data-name="modifiedby"<?php echo $view_ip_advance->modifiedby->cellAttributes() ?>>
<script id="tpx_view_ip_advance_modifiedby" class="view_ip_advanceview" type="text/html">
<span id="el_view_ip_advance_modifiedby">
<span<?php echo $view_ip_advance->modifiedby->viewAttributes() ?>>
<?php echo $view_ip_advance->modifiedby->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_advance->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $view_ip_advance_view->TableLeftColumnClass ?>"><span id="elh_view_ip_advance_modifieddatetime"><script id="tpc_view_ip_advance_modifieddatetime" class="view_ip_advanceview" type="text/html"><span><?php echo $view_ip_advance->modifieddatetime->caption() ?></span></script></span></td>
		<td data-name="modifieddatetime"<?php echo $view_ip_advance->modifieddatetime->cellAttributes() ?>>
<script id="tpx_view_ip_advance_modifieddatetime" class="view_ip_advanceview" type="text/html">
<span id="el_view_ip_advance_modifieddatetime">
<span<?php echo $view_ip_advance->modifieddatetime->viewAttributes() ?>>
<?php echo $view_ip_advance->modifieddatetime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_advance->PatID->Visible) { // PatID ?>
	<tr id="r_PatID">
		<td class="<?php echo $view_ip_advance_view->TableLeftColumnClass ?>"><span id="elh_view_ip_advance_PatID"><script id="tpc_view_ip_advance_PatID" class="view_ip_advanceview" type="text/html"><span><?php echo $view_ip_advance->PatID->caption() ?></span></script></span></td>
		<td data-name="PatID"<?php echo $view_ip_advance->PatID->cellAttributes() ?>>
<script id="tpx_view_ip_advance_PatID" class="view_ip_advanceview" type="text/html">
<span id="el_view_ip_advance_PatID">
<span<?php echo $view_ip_advance->PatID->viewAttributes() ?>>
<?php echo $view_ip_advance->PatID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_advance->PatientID->Visible) { // PatientID ?>
	<tr id="r_PatientID">
		<td class="<?php echo $view_ip_advance_view->TableLeftColumnClass ?>"><span id="elh_view_ip_advance_PatientID"><script id="tpc_view_ip_advance_PatientID" class="view_ip_advanceview" type="text/html"><span><?php echo $view_ip_advance->PatientID->caption() ?></span></script></span></td>
		<td data-name="PatientID"<?php echo $view_ip_advance->PatientID->cellAttributes() ?>>
<script id="tpx_view_ip_advance_PatientID" class="view_ip_advanceview" type="text/html">
<span id="el_view_ip_advance_PatientID">
<span<?php echo $view_ip_advance->PatientID->viewAttributes() ?>>
<?php echo $view_ip_advance->PatientID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_advance->PatientName->Visible) { // PatientName ?>
	<tr id="r_PatientName">
		<td class="<?php echo $view_ip_advance_view->TableLeftColumnClass ?>"><span id="elh_view_ip_advance_PatientName"><script id="tpc_view_ip_advance_PatientName" class="view_ip_advanceview" type="text/html"><span><?php echo $view_ip_advance->PatientName->caption() ?></span></script></span></td>
		<td data-name="PatientName"<?php echo $view_ip_advance->PatientName->cellAttributes() ?>>
<script id="tpx_view_ip_advance_PatientName" class="view_ip_advanceview" type="text/html">
<span id="el_view_ip_advance_PatientName">
<span<?php echo $view_ip_advance->PatientName->viewAttributes() ?>>
<?php echo $view_ip_advance->PatientName->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_advance->VisiteType->Visible) { // VisiteType ?>
	<tr id="r_VisiteType">
		<td class="<?php echo $view_ip_advance_view->TableLeftColumnClass ?>"><span id="elh_view_ip_advance_VisiteType"><script id="tpc_view_ip_advance_VisiteType" class="view_ip_advanceview" type="text/html"><span><?php echo $view_ip_advance->VisiteType->caption() ?></span></script></span></td>
		<td data-name="VisiteType"<?php echo $view_ip_advance->VisiteType->cellAttributes() ?>>
<script id="tpx_view_ip_advance_VisiteType" class="view_ip_advanceview" type="text/html">
<span id="el_view_ip_advance_VisiteType">
<span<?php echo $view_ip_advance->VisiteType->viewAttributes() ?>>
<?php echo $view_ip_advance->VisiteType->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_advance->VisitDate->Visible) { // VisitDate ?>
	<tr id="r_VisitDate">
		<td class="<?php echo $view_ip_advance_view->TableLeftColumnClass ?>"><span id="elh_view_ip_advance_VisitDate"><script id="tpc_view_ip_advance_VisitDate" class="view_ip_advanceview" type="text/html"><span><?php echo $view_ip_advance->VisitDate->caption() ?></span></script></span></td>
		<td data-name="VisitDate"<?php echo $view_ip_advance->VisitDate->cellAttributes() ?>>
<script id="tpx_view_ip_advance_VisitDate" class="view_ip_advanceview" type="text/html">
<span id="el_view_ip_advance_VisitDate">
<span<?php echo $view_ip_advance->VisitDate->viewAttributes() ?>>
<?php echo $view_ip_advance->VisitDate->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_advance->AdvanceNo->Visible) { // AdvanceNo ?>
	<tr id="r_AdvanceNo">
		<td class="<?php echo $view_ip_advance_view->TableLeftColumnClass ?>"><span id="elh_view_ip_advance_AdvanceNo"><script id="tpc_view_ip_advance_AdvanceNo" class="view_ip_advanceview" type="text/html"><span><?php echo $view_ip_advance->AdvanceNo->caption() ?></span></script></span></td>
		<td data-name="AdvanceNo"<?php echo $view_ip_advance->AdvanceNo->cellAttributes() ?>>
<script id="tpx_view_ip_advance_AdvanceNo" class="view_ip_advanceview" type="text/html">
<span id="el_view_ip_advance_AdvanceNo">
<span<?php echo $view_ip_advance->AdvanceNo->viewAttributes() ?>>
<?php echo $view_ip_advance->AdvanceNo->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_advance->Status->Visible) { // Status ?>
	<tr id="r_Status">
		<td class="<?php echo $view_ip_advance_view->TableLeftColumnClass ?>"><span id="elh_view_ip_advance_Status"><script id="tpc_view_ip_advance_Status" class="view_ip_advanceview" type="text/html"><span><?php echo $view_ip_advance->Status->caption() ?></span></script></span></td>
		<td data-name="Status"<?php echo $view_ip_advance->Status->cellAttributes() ?>>
<script id="tpx_view_ip_advance_Status" class="view_ip_advanceview" type="text/html">
<span id="el_view_ip_advance_Status">
<span<?php echo $view_ip_advance->Status->viewAttributes() ?>>
<?php echo $view_ip_advance->Status->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_advance->Date->Visible) { // Date ?>
	<tr id="r_Date">
		<td class="<?php echo $view_ip_advance_view->TableLeftColumnClass ?>"><span id="elh_view_ip_advance_Date"><script id="tpc_view_ip_advance_Date" class="view_ip_advanceview" type="text/html"><span><?php echo $view_ip_advance->Date->caption() ?></span></script></span></td>
		<td data-name="Date"<?php echo $view_ip_advance->Date->cellAttributes() ?>>
<script id="tpx_view_ip_advance_Date" class="view_ip_advanceview" type="text/html">
<span id="el_view_ip_advance_Date">
<span<?php echo $view_ip_advance->Date->viewAttributes() ?>>
<?php echo $view_ip_advance->Date->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_advance->AdvanceValidityDate->Visible) { // AdvanceValidityDate ?>
	<tr id="r_AdvanceValidityDate">
		<td class="<?php echo $view_ip_advance_view->TableLeftColumnClass ?>"><span id="elh_view_ip_advance_AdvanceValidityDate"><script id="tpc_view_ip_advance_AdvanceValidityDate" class="view_ip_advanceview" type="text/html"><span><?php echo $view_ip_advance->AdvanceValidityDate->caption() ?></span></script></span></td>
		<td data-name="AdvanceValidityDate"<?php echo $view_ip_advance->AdvanceValidityDate->cellAttributes() ?>>
<script id="tpx_view_ip_advance_AdvanceValidityDate" class="view_ip_advanceview" type="text/html">
<span id="el_view_ip_advance_AdvanceValidityDate">
<span<?php echo $view_ip_advance->AdvanceValidityDate->viewAttributes() ?>>
<?php echo $view_ip_advance->AdvanceValidityDate->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_advance->TotalRemainingAdvance->Visible) { // TotalRemainingAdvance ?>
	<tr id="r_TotalRemainingAdvance">
		<td class="<?php echo $view_ip_advance_view->TableLeftColumnClass ?>"><span id="elh_view_ip_advance_TotalRemainingAdvance"><script id="tpc_view_ip_advance_TotalRemainingAdvance" class="view_ip_advanceview" type="text/html"><span><?php echo $view_ip_advance->TotalRemainingAdvance->caption() ?></span></script></span></td>
		<td data-name="TotalRemainingAdvance"<?php echo $view_ip_advance->TotalRemainingAdvance->cellAttributes() ?>>
<script id="tpx_view_ip_advance_TotalRemainingAdvance" class="view_ip_advanceview" type="text/html">
<span id="el_view_ip_advance_TotalRemainingAdvance">
<span<?php echo $view_ip_advance->TotalRemainingAdvance->viewAttributes() ?>>
<?php echo $view_ip_advance->TotalRemainingAdvance->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_advance->Remarks->Visible) { // Remarks ?>
	<tr id="r_Remarks">
		<td class="<?php echo $view_ip_advance_view->TableLeftColumnClass ?>"><span id="elh_view_ip_advance_Remarks"><script id="tpc_view_ip_advance_Remarks" class="view_ip_advanceview" type="text/html"><span><?php echo $view_ip_advance->Remarks->caption() ?></span></script></span></td>
		<td data-name="Remarks"<?php echo $view_ip_advance->Remarks->cellAttributes() ?>>
<script id="tpx_view_ip_advance_Remarks" class="view_ip_advanceview" type="text/html">
<span id="el_view_ip_advance_Remarks">
<span<?php echo $view_ip_advance->Remarks->viewAttributes() ?>>
<?php echo $view_ip_advance->Remarks->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_advance->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
	<tr id="r_SeectPaymentMode">
		<td class="<?php echo $view_ip_advance_view->TableLeftColumnClass ?>"><span id="elh_view_ip_advance_SeectPaymentMode"><script id="tpc_view_ip_advance_SeectPaymentMode" class="view_ip_advanceview" type="text/html"><span><?php echo $view_ip_advance->SeectPaymentMode->caption() ?></span></script></span></td>
		<td data-name="SeectPaymentMode"<?php echo $view_ip_advance->SeectPaymentMode->cellAttributes() ?>>
<script id="tpx_view_ip_advance_SeectPaymentMode" class="view_ip_advanceview" type="text/html">
<span id="el_view_ip_advance_SeectPaymentMode">
<span<?php echo $view_ip_advance->SeectPaymentMode->viewAttributes() ?>>
<?php echo $view_ip_advance->SeectPaymentMode->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_advance->PaidAmount->Visible) { // PaidAmount ?>
	<tr id="r_PaidAmount">
		<td class="<?php echo $view_ip_advance_view->TableLeftColumnClass ?>"><span id="elh_view_ip_advance_PaidAmount"><script id="tpc_view_ip_advance_PaidAmount" class="view_ip_advanceview" type="text/html"><span><?php echo $view_ip_advance->PaidAmount->caption() ?></span></script></span></td>
		<td data-name="PaidAmount"<?php echo $view_ip_advance->PaidAmount->cellAttributes() ?>>
<script id="tpx_view_ip_advance_PaidAmount" class="view_ip_advanceview" type="text/html">
<span id="el_view_ip_advance_PaidAmount">
<span<?php echo $view_ip_advance->PaidAmount->viewAttributes() ?>>
<?php echo $view_ip_advance->PaidAmount->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_advance->Currency->Visible) { // Currency ?>
	<tr id="r_Currency">
		<td class="<?php echo $view_ip_advance_view->TableLeftColumnClass ?>"><span id="elh_view_ip_advance_Currency"><script id="tpc_view_ip_advance_Currency" class="view_ip_advanceview" type="text/html"><span><?php echo $view_ip_advance->Currency->caption() ?></span></script></span></td>
		<td data-name="Currency"<?php echo $view_ip_advance->Currency->cellAttributes() ?>>
<script id="tpx_view_ip_advance_Currency" class="view_ip_advanceview" type="text/html">
<span id="el_view_ip_advance_Currency">
<span<?php echo $view_ip_advance->Currency->viewAttributes() ?>>
<?php echo $view_ip_advance->Currency->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_advance->CardNumber->Visible) { // CardNumber ?>
	<tr id="r_CardNumber">
		<td class="<?php echo $view_ip_advance_view->TableLeftColumnClass ?>"><span id="elh_view_ip_advance_CardNumber"><script id="tpc_view_ip_advance_CardNumber" class="view_ip_advanceview" type="text/html"><span><?php echo $view_ip_advance->CardNumber->caption() ?></span></script></span></td>
		<td data-name="CardNumber"<?php echo $view_ip_advance->CardNumber->cellAttributes() ?>>
<script id="tpx_view_ip_advance_CardNumber" class="view_ip_advanceview" type="text/html">
<span id="el_view_ip_advance_CardNumber">
<span<?php echo $view_ip_advance->CardNumber->viewAttributes() ?>>
<?php echo $view_ip_advance->CardNumber->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_advance->BankName->Visible) { // BankName ?>
	<tr id="r_BankName">
		<td class="<?php echo $view_ip_advance_view->TableLeftColumnClass ?>"><span id="elh_view_ip_advance_BankName"><script id="tpc_view_ip_advance_BankName" class="view_ip_advanceview" type="text/html"><span><?php echo $view_ip_advance->BankName->caption() ?></span></script></span></td>
		<td data-name="BankName"<?php echo $view_ip_advance->BankName->cellAttributes() ?>>
<script id="tpx_view_ip_advance_BankName" class="view_ip_advanceview" type="text/html">
<span id="el_view_ip_advance_BankName">
<span<?php echo $view_ip_advance->BankName->viewAttributes() ?>>
<?php echo $view_ip_advance->BankName->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_advance->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $view_ip_advance_view->TableLeftColumnClass ?>"><span id="elh_view_ip_advance_HospID"><script id="tpc_view_ip_advance_HospID" class="view_ip_advanceview" type="text/html"><span><?php echo $view_ip_advance->HospID->caption() ?></span></script></span></td>
		<td data-name="HospID"<?php echo $view_ip_advance->HospID->cellAttributes() ?>>
<script id="tpx_view_ip_advance_HospID" class="view_ip_advanceview" type="text/html">
<span id="el_view_ip_advance_HospID">
<span<?php echo $view_ip_advance->HospID->viewAttributes() ?>>
<?php echo $view_ip_advance->HospID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_advance->Reception->Visible) { // Reception ?>
	<tr id="r_Reception">
		<td class="<?php echo $view_ip_advance_view->TableLeftColumnClass ?>"><span id="elh_view_ip_advance_Reception"><script id="tpc_view_ip_advance_Reception" class="view_ip_advanceview" type="text/html"><span><?php echo $view_ip_advance->Reception->caption() ?></span></script></span></td>
		<td data-name="Reception"<?php echo $view_ip_advance->Reception->cellAttributes() ?>>
<script id="tpx_view_ip_advance_Reception" class="view_ip_advanceview" type="text/html">
<span id="el_view_ip_advance_Reception">
<span<?php echo $view_ip_advance->Reception->viewAttributes() ?>>
<?php echo $view_ip_advance->Reception->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_advance->mrnno->Visible) { // mrnno ?>
	<tr id="r_mrnno">
		<td class="<?php echo $view_ip_advance_view->TableLeftColumnClass ?>"><span id="elh_view_ip_advance_mrnno"><script id="tpc_view_ip_advance_mrnno" class="view_ip_advanceview" type="text/html"><span><?php echo $view_ip_advance->mrnno->caption() ?></span></script></span></td>
		<td data-name="mrnno"<?php echo $view_ip_advance->mrnno->cellAttributes() ?>>
<script id="tpx_view_ip_advance_mrnno" class="view_ip_advanceview" type="text/html">
<span id="el_view_ip_advance_mrnno">
<span<?php echo $view_ip_advance->mrnno->viewAttributes() ?>>
<?php echo $view_ip_advance->mrnno->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
</table>
<div id="tpd_view_ip_advanceview" class="ew-custom-template"></div>
<script id="tpm_view_ip_advanceview" type="text/html">
<div id="ct_view_ip_advance_view"><style>
.ew-form:not(.ew-list-form):not(.ew-pager-form), table.ew-master-table.ew-vertical {
	width: 90%;
}
	.ew-form:not(.ew-list-form):not(.ew-pager-form), table.ew-master-table.ew-vertical {
		width: 90%;
	}
	.content-wrapper {
		background: #f4f6f9;
	}
	.form-control-plaintext {
		display: unset;
		width: unset;
	}
	.widget-user .widget-user-image {
		position: absolute;
		top: 65px;
		left: 90%;
		margin-left: -45px;
	}
	.widget-user .card-footer {
		padding-top: 0px;
	}
	.card-footer {
		padding: .05rem 0.025rem;
		background-color: rgba(17,17,17,0.03);
		border-top: 0 solid #f4f4f4;
	}
	.widget-user .widget-user-username {
	margin-top: 0;
	margin-bottom: 0px;
	font-size: 18px;
	font-weight: 300;
	text-shadow: 0 1px 1px rgba(0,0,0,0.2);
}
.widget-user .widget-user-image {
	position: absolute;
	top: 5px;
	left: 90%;
	margin-left: -45px;
}
.widget-user .widget-user-header {
	padding: 1rem;
	height: 100px;
	border-top-left-radius: .25rem;
	border-top-right-radius: .25rem;
}
.form-control:not(textarea) {
	width: -webkit-fill-available;
}
.ew-row .ew-cell {
	margin-right: unset;
}
.alignleft {
	float: left;
}
.alignright {
	float: right;
}
</style>
<?php

function convertToIndianCurrency($number) {
	$no = round($number);
	$decimal = round($number - ($no = floor($number)), 2) * 100;    
	$digits_length = strlen($no);    
	$i = 0;
	$str = array();
	$words = array(
		0 => '',
		1 => 'One',
		2 => 'Two',
		3 => 'Three',
		4 => 'Four',
		5 => 'Five',
		6 => 'Six',
		7 => 'Seven',
		8 => 'Eight',
		9 => 'Nine',
		10 => 'Ten',
		11 => 'Eleven',
		12 => 'Twelve',
		13 => 'Thirteen',
		14 => 'Fourteen',
		15 => 'Fifteen',
		16 => 'Sixteen',
		17 => 'Seventeen',
		18 => 'Eighteen',
		19 => 'Nineteen',
		20 => 'Twenty',
		30 => 'Thirty',
		40 => 'Forty',
		50 => 'Fifty',
		60 => 'Sixty',
		70 => 'Seventy',
		80 => 'Eighty',
		90 => 'Ninety');
	$digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
	while ($i < $digits_length) {
		$divider = ($i == 2) ? 10 : 100;
		$number = floor($no % $divider);
		$no = floor($no / $divider);
		$i += $divider == 10 ? 1 : 2;
		if ($number) {
			$plural = (($counter = count($str)) && $number > 9) ? 's' : null;            
			$str [] = ($number < 21) ? $words[$number] . ' ' . $digits[$counter] . $plural : $words[floor($number / 10) * 10] . ' ' . $words[$number % 10] . ' ' . $digits[$counter] . $plural;
		} else {
			$str [] = null;
		}  
	}
	$Rupees = implode(' ', array_reverse($str));
	$paise = ($decimal) ? "And Paise " . ($words[$decimal - $decimal%10]) ." " .($words[$decimal%10])  : '';
	return ($Rupees ? 'Rupees ' . $Rupees : '') . $paise . " Only";
}
			$invoiceId = $Page->id->CurrentValue;
			$patient_id = $Page->PatientID->CurrentValue;
					 $PatId = $Page->PatID->CurrentValue;
$dbhelper = &DbHelper();
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$PatId."' ;";
$rs = $dbhelper->LoadRecordset($sql);
while (!$rs->EOF) {
	 $row = &$rs->fields;
	 $Patid =  $row["id"];
	 $PatientID =  $row["PatientID"];
	 $gender =  $row["gender"];
	 $dob =  $row["dob"];
	 $Age =  $row["Age"];
	 if($dob != null)
	 {
	 	$Age = $Age;
	 }
	 $mobile_no =  $row["mobile_no"];
	 $IdentificationMark =  $row["IdentificationMark"];
	 $Religion =  $row["Religion"];
	 $street =  $row["street"];
	 $town =  $row["town"];
	 $province =  $row["province"];
	 $country =  $row["country"];
	 $postal_code =  $row["postal_code"];
	 $PEmail =  $row["PEmail"];
	if( $street != '')
	{
		$address .= $street;
	}
	if( $town != '')
	{
		$address .= ', '.$town;
	}
	if( $province != '')
	{
		$address .= ', '.$province;
	}
	if( $country != '')
	{
		$address .= ', '.$country;
	}
	 if( $postal_code != '')
	{
		$address .= ', '.$postal_code;
	}
	 $rs->MoveNext();
 }
 $aa = "ewbarcode.php?data=".$Page->id->CurrentValue."&encode=EAN-13&height=40&color=%23000000";
 ?>
<table width="100%">
	 <tbody>
		<tr>
			<td  style="float:left;width:50px;"></td>
			<td><h2 align="center">Advance Receipt</h2></td>
			<td  style="float:left;width:50px;"><img src='<?php echo $aa; ?>' alt style="border: 0;"></td>
		</tr>
	</tbody>
</table>
<hr>
<font size="4" style="font-weight: bold;">
<table width="100%">
	 <tbody>
		<tr><td  style="width:240px;">Patient Id  </td><td  style="width:4px;">:</td><td> {{:PatientID}} </td><td  style="float: right;">Adv. No: {{:AdvanceNo}}</td></tr>
		<tr><td  style="width:240px;">Patient Name  </td><td  style="width:4px;">:</td><td> {{:PatientName}}</td><td  style="float: right;">Adv. Date:<?php echo date("d-m-Y", strtotime($Page->createddatetime->CurrentValue)); ?></td></tr>
	</tbody>
</table>
<table width="100%">
	 <tbody>
		<tr><td  style="width:240px;">Address  </td><td  style="width:4px;">:</td><td> <?php echo $address; ?> </td></tr>
			<tr><td  style="width:240px;">Remarks</td><td  style="width:4px;">:</td><td> {{:Remarks}} </td></tr>
			<tr><td  style="width:240px;">Advance Amount (Rs.)</td><td  style="width:4px;">:</td><td> {{:Amount}} </td></tr>
			<tr><td  style="width:240px;">In words</td><td  style="width:4px;">:</td><td>  <?php echo convertToIndianCurrency($Page->Amount->CurrentValue); ?> </td></tr>
			<tr><td  style="width:240px;">Payment Details</td><td  style="width:4px;">:</td><td> {{:ModeofPayment}} </td></tr>
<?php
if($Page->ModeofPayment->CurrentValue =='CARD' || $Page->ModeofPayment->CurrentValue =='PAYTM'  || $Page->ModeofPayment->CurrentValue =='NEFT' )
{
$bankMode = '<tr><td  style="width:240px;">Number </td><td  style="width:4px;">:</td><td> ********'.substr($Page->CardNumber->CurrentValue,-4).' </td></tr>';
$bankMode .= '<tr><td  style="width:240px;">Bank Name</td><td  style="width:4px;">:</td><td> '.$Page->BankName->CurrentValue.' </td></tr>';
echo $bankMode;
}
$tt = "ewbarcode.php?data=".$Page->AdvanceNo->CurrentValue."&encode=QRCODE&height=60&color=%23000000";
?>
	</tbody>
</table>
<hr>
<table width="100%">
	 <tbody>
		<tr><td  style="float:left;"><img src='<?php echo $tt; ?>' alt style="border: 0;">Printed On: <?php echo date("F j, Y"); ?> </td><td  style="float: right;">Prep By: {{:createdby}}</td></tr>			
	</tbody>
</table>
</font>
</div>
</script>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($view_ip_advance->Rows) ?> };
ew.applyTemplate("tpd_view_ip_advanceview", "tpm_view_ip_advanceview", "view_ip_advanceview", "<?php echo $view_ip_advance->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.view_ip_advanceview_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$view_ip_advance_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_ip_advance->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_ip_advance_view->terminate();
?>