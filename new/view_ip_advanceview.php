<?php
namespace PHPMaker2020\HIMS;

// Autoload
include_once "autoload.php";

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	\Delight\Cookie\Session::start(Config("COOKIE_SAMESITE")); // Init session data

// Output buffering
ob_start();
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
<?php include_once "header.php"; ?>
<?php if (!$view_ip_advance_view->isExport()) { ?>
<script>
var fview_ip_advanceview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fview_ip_advanceview = currentForm = new ew.Form("fview_ip_advanceview", "view");
	loadjs.done("fview_ip_advanceview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$view_ip_advance_view->isExport()) { ?>
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
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_ip_advance">
<input type="hidden" name="modal" value="<?php echo (int)$view_ip_advance_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($view_ip_advance_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $view_ip_advance_view->TableLeftColumnClass ?>"><span id="elh_view_ip_advance_id"><script id="tpc_view_ip_advance_id" type="text/html"><?php echo $view_ip_advance_view->id->caption() ?></script></span></td>
		<td data-name="id" <?php echo $view_ip_advance_view->id->cellAttributes() ?>>
<script id="tpx_view_ip_advance_id" type="text/html"><span id="el_view_ip_advance_id">
<span<?php echo $view_ip_advance_view->id->viewAttributes() ?>><?php echo $view_ip_advance_view->id->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_advance_view->Name->Visible) { // Name ?>
	<tr id="r_Name">
		<td class="<?php echo $view_ip_advance_view->TableLeftColumnClass ?>"><span id="elh_view_ip_advance_Name"><script id="tpc_view_ip_advance_Name" type="text/html"><?php echo $view_ip_advance_view->Name->caption() ?></script></span></td>
		<td data-name="Name" <?php echo $view_ip_advance_view->Name->cellAttributes() ?>>
<script id="tpx_view_ip_advance_Name" type="text/html"><span id="el_view_ip_advance_Name">
<span<?php echo $view_ip_advance_view->Name->viewAttributes() ?>><?php echo $view_ip_advance_view->Name->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_advance_view->Mobile->Visible) { // Mobile ?>
	<tr id="r_Mobile">
		<td class="<?php echo $view_ip_advance_view->TableLeftColumnClass ?>"><span id="elh_view_ip_advance_Mobile"><script id="tpc_view_ip_advance_Mobile" type="text/html"><?php echo $view_ip_advance_view->Mobile->caption() ?></script></span></td>
		<td data-name="Mobile" <?php echo $view_ip_advance_view->Mobile->cellAttributes() ?>>
<script id="tpx_view_ip_advance_Mobile" type="text/html"><span id="el_view_ip_advance_Mobile">
<span<?php echo $view_ip_advance_view->Mobile->viewAttributes() ?>><?php echo $view_ip_advance_view->Mobile->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_advance_view->voucher_type->Visible) { // voucher_type ?>
	<tr id="r_voucher_type">
		<td class="<?php echo $view_ip_advance_view->TableLeftColumnClass ?>"><span id="elh_view_ip_advance_voucher_type"><script id="tpc_view_ip_advance_voucher_type" type="text/html"><?php echo $view_ip_advance_view->voucher_type->caption() ?></script></span></td>
		<td data-name="voucher_type" <?php echo $view_ip_advance_view->voucher_type->cellAttributes() ?>>
<script id="tpx_view_ip_advance_voucher_type" type="text/html"><span id="el_view_ip_advance_voucher_type">
<span<?php echo $view_ip_advance_view->voucher_type->viewAttributes() ?>><?php echo $view_ip_advance_view->voucher_type->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_advance_view->Details->Visible) { // Details ?>
	<tr id="r_Details">
		<td class="<?php echo $view_ip_advance_view->TableLeftColumnClass ?>"><span id="elh_view_ip_advance_Details"><script id="tpc_view_ip_advance_Details" type="text/html"><?php echo $view_ip_advance_view->Details->caption() ?></script></span></td>
		<td data-name="Details" <?php echo $view_ip_advance_view->Details->cellAttributes() ?>>
<script id="tpx_view_ip_advance_Details" type="text/html"><span id="el_view_ip_advance_Details">
<span<?php echo $view_ip_advance_view->Details->viewAttributes() ?>><?php echo $view_ip_advance_view->Details->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_advance_view->ModeofPayment->Visible) { // ModeofPayment ?>
	<tr id="r_ModeofPayment">
		<td class="<?php echo $view_ip_advance_view->TableLeftColumnClass ?>"><span id="elh_view_ip_advance_ModeofPayment"><script id="tpc_view_ip_advance_ModeofPayment" type="text/html"><?php echo $view_ip_advance_view->ModeofPayment->caption() ?></script></span></td>
		<td data-name="ModeofPayment" <?php echo $view_ip_advance_view->ModeofPayment->cellAttributes() ?>>
<script id="tpx_view_ip_advance_ModeofPayment" type="text/html"><span id="el_view_ip_advance_ModeofPayment">
<span<?php echo $view_ip_advance_view->ModeofPayment->viewAttributes() ?>><?php echo $view_ip_advance_view->ModeofPayment->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_advance_view->Amount->Visible) { // Amount ?>
	<tr id="r_Amount">
		<td class="<?php echo $view_ip_advance_view->TableLeftColumnClass ?>"><span id="elh_view_ip_advance_Amount"><script id="tpc_view_ip_advance_Amount" type="text/html"><?php echo $view_ip_advance_view->Amount->caption() ?></script></span></td>
		<td data-name="Amount" <?php echo $view_ip_advance_view->Amount->cellAttributes() ?>>
<script id="tpx_view_ip_advance_Amount" type="text/html"><span id="el_view_ip_advance_Amount">
<span<?php echo $view_ip_advance_view->Amount->viewAttributes() ?>><?php echo $view_ip_advance_view->Amount->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_advance_view->AnyDues->Visible) { // AnyDues ?>
	<tr id="r_AnyDues">
		<td class="<?php echo $view_ip_advance_view->TableLeftColumnClass ?>"><span id="elh_view_ip_advance_AnyDues"><script id="tpc_view_ip_advance_AnyDues" type="text/html"><?php echo $view_ip_advance_view->AnyDues->caption() ?></script></span></td>
		<td data-name="AnyDues" <?php echo $view_ip_advance_view->AnyDues->cellAttributes() ?>>
<script id="tpx_view_ip_advance_AnyDues" type="text/html"><span id="el_view_ip_advance_AnyDues">
<span<?php echo $view_ip_advance_view->AnyDues->viewAttributes() ?>><?php echo $view_ip_advance_view->AnyDues->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_advance_view->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $view_ip_advance_view->TableLeftColumnClass ?>"><span id="elh_view_ip_advance_createdby"><script id="tpc_view_ip_advance_createdby" type="text/html"><?php echo $view_ip_advance_view->createdby->caption() ?></script></span></td>
		<td data-name="createdby" <?php echo $view_ip_advance_view->createdby->cellAttributes() ?>>
<script id="tpx_view_ip_advance_createdby" type="text/html"><span id="el_view_ip_advance_createdby">
<span<?php echo $view_ip_advance_view->createdby->viewAttributes() ?>><?php echo $view_ip_advance_view->createdby->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_advance_view->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $view_ip_advance_view->TableLeftColumnClass ?>"><span id="elh_view_ip_advance_createddatetime"><script id="tpc_view_ip_advance_createddatetime" type="text/html"><?php echo $view_ip_advance_view->createddatetime->caption() ?></script></span></td>
		<td data-name="createddatetime" <?php echo $view_ip_advance_view->createddatetime->cellAttributes() ?>>
<script id="tpx_view_ip_advance_createddatetime" type="text/html"><span id="el_view_ip_advance_createddatetime">
<span<?php echo $view_ip_advance_view->createddatetime->viewAttributes() ?>><?php echo $view_ip_advance_view->createddatetime->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_advance_view->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $view_ip_advance_view->TableLeftColumnClass ?>"><span id="elh_view_ip_advance_modifiedby"><script id="tpc_view_ip_advance_modifiedby" type="text/html"><?php echo $view_ip_advance_view->modifiedby->caption() ?></script></span></td>
		<td data-name="modifiedby" <?php echo $view_ip_advance_view->modifiedby->cellAttributes() ?>>
<script id="tpx_view_ip_advance_modifiedby" type="text/html"><span id="el_view_ip_advance_modifiedby">
<span<?php echo $view_ip_advance_view->modifiedby->viewAttributes() ?>><?php echo $view_ip_advance_view->modifiedby->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_advance_view->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $view_ip_advance_view->TableLeftColumnClass ?>"><span id="elh_view_ip_advance_modifieddatetime"><script id="tpc_view_ip_advance_modifieddatetime" type="text/html"><?php echo $view_ip_advance_view->modifieddatetime->caption() ?></script></span></td>
		<td data-name="modifieddatetime" <?php echo $view_ip_advance_view->modifieddatetime->cellAttributes() ?>>
<script id="tpx_view_ip_advance_modifieddatetime" type="text/html"><span id="el_view_ip_advance_modifieddatetime">
<span<?php echo $view_ip_advance_view->modifieddatetime->viewAttributes() ?>><?php echo $view_ip_advance_view->modifieddatetime->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_advance_view->PatID->Visible) { // PatID ?>
	<tr id="r_PatID">
		<td class="<?php echo $view_ip_advance_view->TableLeftColumnClass ?>"><span id="elh_view_ip_advance_PatID"><script id="tpc_view_ip_advance_PatID" type="text/html"><?php echo $view_ip_advance_view->PatID->caption() ?></script></span></td>
		<td data-name="PatID" <?php echo $view_ip_advance_view->PatID->cellAttributes() ?>>
<script id="tpx_view_ip_advance_PatID" type="text/html"><span id="el_view_ip_advance_PatID">
<span<?php echo $view_ip_advance_view->PatID->viewAttributes() ?>><?php echo $view_ip_advance_view->PatID->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_advance_view->PatientID->Visible) { // PatientID ?>
	<tr id="r_PatientID">
		<td class="<?php echo $view_ip_advance_view->TableLeftColumnClass ?>"><span id="elh_view_ip_advance_PatientID"><script id="tpc_view_ip_advance_PatientID" type="text/html"><?php echo $view_ip_advance_view->PatientID->caption() ?></script></span></td>
		<td data-name="PatientID" <?php echo $view_ip_advance_view->PatientID->cellAttributes() ?>>
<script id="tpx_view_ip_advance_PatientID" type="text/html"><span id="el_view_ip_advance_PatientID">
<span<?php echo $view_ip_advance_view->PatientID->viewAttributes() ?>><?php echo $view_ip_advance_view->PatientID->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_advance_view->PatientName->Visible) { // PatientName ?>
	<tr id="r_PatientName">
		<td class="<?php echo $view_ip_advance_view->TableLeftColumnClass ?>"><span id="elh_view_ip_advance_PatientName"><script id="tpc_view_ip_advance_PatientName" type="text/html"><?php echo $view_ip_advance_view->PatientName->caption() ?></script></span></td>
		<td data-name="PatientName" <?php echo $view_ip_advance_view->PatientName->cellAttributes() ?>>
<script id="tpx_view_ip_advance_PatientName" type="text/html"><span id="el_view_ip_advance_PatientName">
<span<?php echo $view_ip_advance_view->PatientName->viewAttributes() ?>><?php echo $view_ip_advance_view->PatientName->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_advance_view->VisiteType->Visible) { // VisiteType ?>
	<tr id="r_VisiteType">
		<td class="<?php echo $view_ip_advance_view->TableLeftColumnClass ?>"><span id="elh_view_ip_advance_VisiteType"><script id="tpc_view_ip_advance_VisiteType" type="text/html"><?php echo $view_ip_advance_view->VisiteType->caption() ?></script></span></td>
		<td data-name="VisiteType" <?php echo $view_ip_advance_view->VisiteType->cellAttributes() ?>>
<script id="tpx_view_ip_advance_VisiteType" type="text/html"><span id="el_view_ip_advance_VisiteType">
<span<?php echo $view_ip_advance_view->VisiteType->viewAttributes() ?>><?php echo $view_ip_advance_view->VisiteType->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_advance_view->VisitDate->Visible) { // VisitDate ?>
	<tr id="r_VisitDate">
		<td class="<?php echo $view_ip_advance_view->TableLeftColumnClass ?>"><span id="elh_view_ip_advance_VisitDate"><script id="tpc_view_ip_advance_VisitDate" type="text/html"><?php echo $view_ip_advance_view->VisitDate->caption() ?></script></span></td>
		<td data-name="VisitDate" <?php echo $view_ip_advance_view->VisitDate->cellAttributes() ?>>
<script id="tpx_view_ip_advance_VisitDate" type="text/html"><span id="el_view_ip_advance_VisitDate">
<span<?php echo $view_ip_advance_view->VisitDate->viewAttributes() ?>><?php echo $view_ip_advance_view->VisitDate->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_advance_view->AdvanceNo->Visible) { // AdvanceNo ?>
	<tr id="r_AdvanceNo">
		<td class="<?php echo $view_ip_advance_view->TableLeftColumnClass ?>"><span id="elh_view_ip_advance_AdvanceNo"><script id="tpc_view_ip_advance_AdvanceNo" type="text/html"><?php echo $view_ip_advance_view->AdvanceNo->caption() ?></script></span></td>
		<td data-name="AdvanceNo" <?php echo $view_ip_advance_view->AdvanceNo->cellAttributes() ?>>
<script id="tpx_view_ip_advance_AdvanceNo" type="text/html"><span id="el_view_ip_advance_AdvanceNo">
<span<?php echo $view_ip_advance_view->AdvanceNo->viewAttributes() ?>><?php echo $view_ip_advance_view->AdvanceNo->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_advance_view->Status->Visible) { // Status ?>
	<tr id="r_Status">
		<td class="<?php echo $view_ip_advance_view->TableLeftColumnClass ?>"><span id="elh_view_ip_advance_Status"><script id="tpc_view_ip_advance_Status" type="text/html"><?php echo $view_ip_advance_view->Status->caption() ?></script></span></td>
		<td data-name="Status" <?php echo $view_ip_advance_view->Status->cellAttributes() ?>>
<script id="tpx_view_ip_advance_Status" type="text/html"><span id="el_view_ip_advance_Status">
<span<?php echo $view_ip_advance_view->Status->viewAttributes() ?>><?php echo $view_ip_advance_view->Status->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_advance_view->Date->Visible) { // Date ?>
	<tr id="r_Date">
		<td class="<?php echo $view_ip_advance_view->TableLeftColumnClass ?>"><span id="elh_view_ip_advance_Date"><script id="tpc_view_ip_advance_Date" type="text/html"><?php echo $view_ip_advance_view->Date->caption() ?></script></span></td>
		<td data-name="Date" <?php echo $view_ip_advance_view->Date->cellAttributes() ?>>
<script id="tpx_view_ip_advance_Date" type="text/html"><span id="el_view_ip_advance_Date">
<span<?php echo $view_ip_advance_view->Date->viewAttributes() ?>><?php echo $view_ip_advance_view->Date->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_advance_view->AdvanceValidityDate->Visible) { // AdvanceValidityDate ?>
	<tr id="r_AdvanceValidityDate">
		<td class="<?php echo $view_ip_advance_view->TableLeftColumnClass ?>"><span id="elh_view_ip_advance_AdvanceValidityDate"><script id="tpc_view_ip_advance_AdvanceValidityDate" type="text/html"><?php echo $view_ip_advance_view->AdvanceValidityDate->caption() ?></script></span></td>
		<td data-name="AdvanceValidityDate" <?php echo $view_ip_advance_view->AdvanceValidityDate->cellAttributes() ?>>
<script id="tpx_view_ip_advance_AdvanceValidityDate" type="text/html"><span id="el_view_ip_advance_AdvanceValidityDate">
<span<?php echo $view_ip_advance_view->AdvanceValidityDate->viewAttributes() ?>><?php echo $view_ip_advance_view->AdvanceValidityDate->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_advance_view->TotalRemainingAdvance->Visible) { // TotalRemainingAdvance ?>
	<tr id="r_TotalRemainingAdvance">
		<td class="<?php echo $view_ip_advance_view->TableLeftColumnClass ?>"><span id="elh_view_ip_advance_TotalRemainingAdvance"><script id="tpc_view_ip_advance_TotalRemainingAdvance" type="text/html"><?php echo $view_ip_advance_view->TotalRemainingAdvance->caption() ?></script></span></td>
		<td data-name="TotalRemainingAdvance" <?php echo $view_ip_advance_view->TotalRemainingAdvance->cellAttributes() ?>>
<script id="tpx_view_ip_advance_TotalRemainingAdvance" type="text/html"><span id="el_view_ip_advance_TotalRemainingAdvance">
<span<?php echo $view_ip_advance_view->TotalRemainingAdvance->viewAttributes() ?>><?php echo $view_ip_advance_view->TotalRemainingAdvance->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_advance_view->Remarks->Visible) { // Remarks ?>
	<tr id="r_Remarks">
		<td class="<?php echo $view_ip_advance_view->TableLeftColumnClass ?>"><span id="elh_view_ip_advance_Remarks"><script id="tpc_view_ip_advance_Remarks" type="text/html"><?php echo $view_ip_advance_view->Remarks->caption() ?></script></span></td>
		<td data-name="Remarks" <?php echo $view_ip_advance_view->Remarks->cellAttributes() ?>>
<script id="tpx_view_ip_advance_Remarks" type="text/html"><span id="el_view_ip_advance_Remarks">
<span<?php echo $view_ip_advance_view->Remarks->viewAttributes() ?>><?php echo $view_ip_advance_view->Remarks->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_advance_view->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
	<tr id="r_SeectPaymentMode">
		<td class="<?php echo $view_ip_advance_view->TableLeftColumnClass ?>"><span id="elh_view_ip_advance_SeectPaymentMode"><script id="tpc_view_ip_advance_SeectPaymentMode" type="text/html"><?php echo $view_ip_advance_view->SeectPaymentMode->caption() ?></script></span></td>
		<td data-name="SeectPaymentMode" <?php echo $view_ip_advance_view->SeectPaymentMode->cellAttributes() ?>>
<script id="tpx_view_ip_advance_SeectPaymentMode" type="text/html"><span id="el_view_ip_advance_SeectPaymentMode">
<span<?php echo $view_ip_advance_view->SeectPaymentMode->viewAttributes() ?>><?php echo $view_ip_advance_view->SeectPaymentMode->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_advance_view->PaidAmount->Visible) { // PaidAmount ?>
	<tr id="r_PaidAmount">
		<td class="<?php echo $view_ip_advance_view->TableLeftColumnClass ?>"><span id="elh_view_ip_advance_PaidAmount"><script id="tpc_view_ip_advance_PaidAmount" type="text/html"><?php echo $view_ip_advance_view->PaidAmount->caption() ?></script></span></td>
		<td data-name="PaidAmount" <?php echo $view_ip_advance_view->PaidAmount->cellAttributes() ?>>
<script id="tpx_view_ip_advance_PaidAmount" type="text/html"><span id="el_view_ip_advance_PaidAmount">
<span<?php echo $view_ip_advance_view->PaidAmount->viewAttributes() ?>><?php echo $view_ip_advance_view->PaidAmount->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_advance_view->Currency->Visible) { // Currency ?>
	<tr id="r_Currency">
		<td class="<?php echo $view_ip_advance_view->TableLeftColumnClass ?>"><span id="elh_view_ip_advance_Currency"><script id="tpc_view_ip_advance_Currency" type="text/html"><?php echo $view_ip_advance_view->Currency->caption() ?></script></span></td>
		<td data-name="Currency" <?php echo $view_ip_advance_view->Currency->cellAttributes() ?>>
<script id="tpx_view_ip_advance_Currency" type="text/html"><span id="el_view_ip_advance_Currency">
<span<?php echo $view_ip_advance_view->Currency->viewAttributes() ?>><?php echo $view_ip_advance_view->Currency->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_advance_view->CardNumber->Visible) { // CardNumber ?>
	<tr id="r_CardNumber">
		<td class="<?php echo $view_ip_advance_view->TableLeftColumnClass ?>"><span id="elh_view_ip_advance_CardNumber"><script id="tpc_view_ip_advance_CardNumber" type="text/html"><?php echo $view_ip_advance_view->CardNumber->caption() ?></script></span></td>
		<td data-name="CardNumber" <?php echo $view_ip_advance_view->CardNumber->cellAttributes() ?>>
<script id="tpx_view_ip_advance_CardNumber" type="text/html"><span id="el_view_ip_advance_CardNumber">
<span<?php echo $view_ip_advance_view->CardNumber->viewAttributes() ?>><?php echo $view_ip_advance_view->CardNumber->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_advance_view->BankName->Visible) { // BankName ?>
	<tr id="r_BankName">
		<td class="<?php echo $view_ip_advance_view->TableLeftColumnClass ?>"><span id="elh_view_ip_advance_BankName"><script id="tpc_view_ip_advance_BankName" type="text/html"><?php echo $view_ip_advance_view->BankName->caption() ?></script></span></td>
		<td data-name="BankName" <?php echo $view_ip_advance_view->BankName->cellAttributes() ?>>
<script id="tpx_view_ip_advance_BankName" type="text/html"><span id="el_view_ip_advance_BankName">
<span<?php echo $view_ip_advance_view->BankName->viewAttributes() ?>><?php echo $view_ip_advance_view->BankName->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_advance_view->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $view_ip_advance_view->TableLeftColumnClass ?>"><span id="elh_view_ip_advance_HospID"><script id="tpc_view_ip_advance_HospID" type="text/html"><?php echo $view_ip_advance_view->HospID->caption() ?></script></span></td>
		<td data-name="HospID" <?php echo $view_ip_advance_view->HospID->cellAttributes() ?>>
<script id="tpx_view_ip_advance_HospID" type="text/html"><span id="el_view_ip_advance_HospID">
<span<?php echo $view_ip_advance_view->HospID->viewAttributes() ?>><?php echo $view_ip_advance_view->HospID->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_advance_view->Reception->Visible) { // Reception ?>
	<tr id="r_Reception">
		<td class="<?php echo $view_ip_advance_view->TableLeftColumnClass ?>"><span id="elh_view_ip_advance_Reception"><script id="tpc_view_ip_advance_Reception" type="text/html"><?php echo $view_ip_advance_view->Reception->caption() ?></script></span></td>
		<td data-name="Reception" <?php echo $view_ip_advance_view->Reception->cellAttributes() ?>>
<script id="tpx_view_ip_advance_Reception" type="text/html"><span id="el_view_ip_advance_Reception">
<span<?php echo $view_ip_advance_view->Reception->viewAttributes() ?>><?php echo $view_ip_advance_view->Reception->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_advance_view->mrnno->Visible) { // mrnno ?>
	<tr id="r_mrnno">
		<td class="<?php echo $view_ip_advance_view->TableLeftColumnClass ?>"><span id="elh_view_ip_advance_mrnno"><script id="tpc_view_ip_advance_mrnno" type="text/html"><?php echo $view_ip_advance_view->mrnno->caption() ?></script></span></td>
		<td data-name="mrnno" <?php echo $view_ip_advance_view->mrnno->cellAttributes() ?>>
<script id="tpx_view_ip_advance_mrnno" type="text/html"><span id="el_view_ip_advance_mrnno">
<span<?php echo $view_ip_advance_view->mrnno->viewAttributes() ?>><?php echo $view_ip_advance_view->mrnno->getViewValue() ?></span>
</span></script>
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
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($view_ip_advance->Rows) ?> };
	ew.applyTemplate("tpd_view_ip_advanceview", "tpm_view_ip_advanceview", "view_ip_advanceview", "<?php echo $view_ip_advance->CustomExport ?>", ew.templateData.rows[0]);
	$("script.view_ip_advanceview_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$view_ip_advance_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_ip_advance_view->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$view_ip_advance_view->terminate();
?>