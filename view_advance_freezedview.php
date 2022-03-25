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
$view_advance_freezed_view = new view_advance_freezed_view();

// Run the page
$view_advance_freezed_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_advance_freezed_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_advance_freezed->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fview_advance_freezedview = currentForm = new ew.Form("fview_advance_freezedview", "view");

// Form_CustomValidate event
fview_advance_freezedview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_advance_freezedview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_advance_freezedview.lists["x_freezed"] = <?php echo $view_advance_freezed_view->freezed->Lookup->toClientList() ?>;
fview_advance_freezedview.lists["x_freezed"].options = <?php echo JsonEncode($view_advance_freezed_view->freezed->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$view_advance_freezed->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $view_advance_freezed_view->ExportOptions->render("body") ?>
<?php $view_advance_freezed_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $view_advance_freezed_view->showPageHeader(); ?>
<?php
$view_advance_freezed_view->showMessage();
?>
<form name="fview_advance_freezedview" id="fview_advance_freezedview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_advance_freezed_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_advance_freezed_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_advance_freezed">
<input type="hidden" name="modal" value="<?php echo (int)$view_advance_freezed_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($view_advance_freezed->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $view_advance_freezed_view->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_id"><?php echo $view_advance_freezed->id->caption() ?></span></td>
		<td data-name="id"<?php echo $view_advance_freezed->id->cellAttributes() ?>>
<span id="el_view_advance_freezed_id">
<span<?php echo $view_advance_freezed->id->viewAttributes() ?>>
<?php echo $view_advance_freezed->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_advance_freezed->freezed->Visible) { // freezed ?>
	<tr id="r_freezed">
		<td class="<?php echo $view_advance_freezed_view->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_freezed"><?php echo $view_advance_freezed->freezed->caption() ?></span></td>
		<td data-name="freezed"<?php echo $view_advance_freezed->freezed->cellAttributes() ?>>
<span id="el_view_advance_freezed_freezed">
<span<?php echo $view_advance_freezed->freezed->viewAttributes() ?>>
<?php echo $view_advance_freezed->freezed->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_advance_freezed->PatientID->Visible) { // PatientID ?>
	<tr id="r_PatientID">
		<td class="<?php echo $view_advance_freezed_view->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_PatientID"><?php echo $view_advance_freezed->PatientID->caption() ?></span></td>
		<td data-name="PatientID"<?php echo $view_advance_freezed->PatientID->cellAttributes() ?>>
<span id="el_view_advance_freezed_PatientID">
<span<?php echo $view_advance_freezed->PatientID->viewAttributes() ?>>
<?php echo $view_advance_freezed->PatientID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_advance_freezed->PatientName->Visible) { // PatientName ?>
	<tr id="r_PatientName">
		<td class="<?php echo $view_advance_freezed_view->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_PatientName"><?php echo $view_advance_freezed->PatientName->caption() ?></span></td>
		<td data-name="PatientName"<?php echo $view_advance_freezed->PatientName->cellAttributes() ?>>
<span id="el_view_advance_freezed_PatientName">
<span<?php echo $view_advance_freezed->PatientName->viewAttributes() ?>>
<?php echo $view_advance_freezed->PatientName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_advance_freezed->Name->Visible) { // Name ?>
	<tr id="r_Name">
		<td class="<?php echo $view_advance_freezed_view->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_Name"><?php echo $view_advance_freezed->Name->caption() ?></span></td>
		<td data-name="Name"<?php echo $view_advance_freezed->Name->cellAttributes() ?>>
<span id="el_view_advance_freezed_Name">
<span<?php echo $view_advance_freezed->Name->viewAttributes() ?>>
<?php echo $view_advance_freezed->Name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_advance_freezed->Mobile->Visible) { // Mobile ?>
	<tr id="r_Mobile">
		<td class="<?php echo $view_advance_freezed_view->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_Mobile"><?php echo $view_advance_freezed->Mobile->caption() ?></span></td>
		<td data-name="Mobile"<?php echo $view_advance_freezed->Mobile->cellAttributes() ?>>
<span id="el_view_advance_freezed_Mobile">
<span<?php echo $view_advance_freezed->Mobile->viewAttributes() ?>>
<?php echo $view_advance_freezed->Mobile->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_advance_freezed->voucher_type->Visible) { // voucher_type ?>
	<tr id="r_voucher_type">
		<td class="<?php echo $view_advance_freezed_view->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_voucher_type"><?php echo $view_advance_freezed->voucher_type->caption() ?></span></td>
		<td data-name="voucher_type"<?php echo $view_advance_freezed->voucher_type->cellAttributes() ?>>
<span id="el_view_advance_freezed_voucher_type">
<span<?php echo $view_advance_freezed->voucher_type->viewAttributes() ?>>
<?php echo $view_advance_freezed->voucher_type->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_advance_freezed->Details->Visible) { // Details ?>
	<tr id="r_Details">
		<td class="<?php echo $view_advance_freezed_view->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_Details"><?php echo $view_advance_freezed->Details->caption() ?></span></td>
		<td data-name="Details"<?php echo $view_advance_freezed->Details->cellAttributes() ?>>
<span id="el_view_advance_freezed_Details">
<span<?php echo $view_advance_freezed->Details->viewAttributes() ?>>
<?php echo $view_advance_freezed->Details->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_advance_freezed->ModeofPayment->Visible) { // ModeofPayment ?>
	<tr id="r_ModeofPayment">
		<td class="<?php echo $view_advance_freezed_view->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_ModeofPayment"><?php echo $view_advance_freezed->ModeofPayment->caption() ?></span></td>
		<td data-name="ModeofPayment"<?php echo $view_advance_freezed->ModeofPayment->cellAttributes() ?>>
<span id="el_view_advance_freezed_ModeofPayment">
<span<?php echo $view_advance_freezed->ModeofPayment->viewAttributes() ?>>
<?php echo $view_advance_freezed->ModeofPayment->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_advance_freezed->Amount->Visible) { // Amount ?>
	<tr id="r_Amount">
		<td class="<?php echo $view_advance_freezed_view->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_Amount"><?php echo $view_advance_freezed->Amount->caption() ?></span></td>
		<td data-name="Amount"<?php echo $view_advance_freezed->Amount->cellAttributes() ?>>
<span id="el_view_advance_freezed_Amount">
<span<?php echo $view_advance_freezed->Amount->viewAttributes() ?>>
<?php echo $view_advance_freezed->Amount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_advance_freezed->AnyDues->Visible) { // AnyDues ?>
	<tr id="r_AnyDues">
		<td class="<?php echo $view_advance_freezed_view->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_AnyDues"><?php echo $view_advance_freezed->AnyDues->caption() ?></span></td>
		<td data-name="AnyDues"<?php echo $view_advance_freezed->AnyDues->cellAttributes() ?>>
<span id="el_view_advance_freezed_AnyDues">
<span<?php echo $view_advance_freezed->AnyDues->viewAttributes() ?>>
<?php echo $view_advance_freezed->AnyDues->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_advance_freezed->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $view_advance_freezed_view->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_createdby"><?php echo $view_advance_freezed->createdby->caption() ?></span></td>
		<td data-name="createdby"<?php echo $view_advance_freezed->createdby->cellAttributes() ?>>
<span id="el_view_advance_freezed_createdby">
<span<?php echo $view_advance_freezed->createdby->viewAttributes() ?>>
<?php echo $view_advance_freezed->createdby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_advance_freezed->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $view_advance_freezed_view->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_createddatetime"><?php echo $view_advance_freezed->createddatetime->caption() ?></span></td>
		<td data-name="createddatetime"<?php echo $view_advance_freezed->createddatetime->cellAttributes() ?>>
<span id="el_view_advance_freezed_createddatetime">
<span<?php echo $view_advance_freezed->createddatetime->viewAttributes() ?>>
<?php echo $view_advance_freezed->createddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_advance_freezed->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $view_advance_freezed_view->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_modifiedby"><?php echo $view_advance_freezed->modifiedby->caption() ?></span></td>
		<td data-name="modifiedby"<?php echo $view_advance_freezed->modifiedby->cellAttributes() ?>>
<span id="el_view_advance_freezed_modifiedby">
<span<?php echo $view_advance_freezed->modifiedby->viewAttributes() ?>>
<?php echo $view_advance_freezed->modifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_advance_freezed->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $view_advance_freezed_view->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_modifieddatetime"><?php echo $view_advance_freezed->modifieddatetime->caption() ?></span></td>
		<td data-name="modifieddatetime"<?php echo $view_advance_freezed->modifieddatetime->cellAttributes() ?>>
<span id="el_view_advance_freezed_modifieddatetime">
<span<?php echo $view_advance_freezed->modifieddatetime->viewAttributes() ?>>
<?php echo $view_advance_freezed->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_advance_freezed->PatID->Visible) { // PatID ?>
	<tr id="r_PatID">
		<td class="<?php echo $view_advance_freezed_view->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_PatID"><?php echo $view_advance_freezed->PatID->caption() ?></span></td>
		<td data-name="PatID"<?php echo $view_advance_freezed->PatID->cellAttributes() ?>>
<span id="el_view_advance_freezed_PatID">
<span<?php echo $view_advance_freezed->PatID->viewAttributes() ?>>
<?php echo $view_advance_freezed->PatID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_advance_freezed->VisiteType->Visible) { // VisiteType ?>
	<tr id="r_VisiteType">
		<td class="<?php echo $view_advance_freezed_view->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_VisiteType"><?php echo $view_advance_freezed->VisiteType->caption() ?></span></td>
		<td data-name="VisiteType"<?php echo $view_advance_freezed->VisiteType->cellAttributes() ?>>
<span id="el_view_advance_freezed_VisiteType">
<span<?php echo $view_advance_freezed->VisiteType->viewAttributes() ?>>
<?php echo $view_advance_freezed->VisiteType->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_advance_freezed->VisitDate->Visible) { // VisitDate ?>
	<tr id="r_VisitDate">
		<td class="<?php echo $view_advance_freezed_view->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_VisitDate"><?php echo $view_advance_freezed->VisitDate->caption() ?></span></td>
		<td data-name="VisitDate"<?php echo $view_advance_freezed->VisitDate->cellAttributes() ?>>
<span id="el_view_advance_freezed_VisitDate">
<span<?php echo $view_advance_freezed->VisitDate->viewAttributes() ?>>
<?php echo $view_advance_freezed->VisitDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_advance_freezed->AdvanceNo->Visible) { // AdvanceNo ?>
	<tr id="r_AdvanceNo">
		<td class="<?php echo $view_advance_freezed_view->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_AdvanceNo"><?php echo $view_advance_freezed->AdvanceNo->caption() ?></span></td>
		<td data-name="AdvanceNo"<?php echo $view_advance_freezed->AdvanceNo->cellAttributes() ?>>
<span id="el_view_advance_freezed_AdvanceNo">
<span<?php echo $view_advance_freezed->AdvanceNo->viewAttributes() ?>>
<?php echo $view_advance_freezed->AdvanceNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_advance_freezed->Status->Visible) { // Status ?>
	<tr id="r_Status">
		<td class="<?php echo $view_advance_freezed_view->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_Status"><?php echo $view_advance_freezed->Status->caption() ?></span></td>
		<td data-name="Status"<?php echo $view_advance_freezed->Status->cellAttributes() ?>>
<span id="el_view_advance_freezed_Status">
<span<?php echo $view_advance_freezed->Status->viewAttributes() ?>>
<?php echo $view_advance_freezed->Status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_advance_freezed->Date->Visible) { // Date ?>
	<tr id="r_Date">
		<td class="<?php echo $view_advance_freezed_view->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_Date"><?php echo $view_advance_freezed->Date->caption() ?></span></td>
		<td data-name="Date"<?php echo $view_advance_freezed->Date->cellAttributes() ?>>
<span id="el_view_advance_freezed_Date">
<span<?php echo $view_advance_freezed->Date->viewAttributes() ?>>
<?php echo $view_advance_freezed->Date->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_advance_freezed->AdvanceValidityDate->Visible) { // AdvanceValidityDate ?>
	<tr id="r_AdvanceValidityDate">
		<td class="<?php echo $view_advance_freezed_view->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_AdvanceValidityDate"><?php echo $view_advance_freezed->AdvanceValidityDate->caption() ?></span></td>
		<td data-name="AdvanceValidityDate"<?php echo $view_advance_freezed->AdvanceValidityDate->cellAttributes() ?>>
<span id="el_view_advance_freezed_AdvanceValidityDate">
<span<?php echo $view_advance_freezed->AdvanceValidityDate->viewAttributes() ?>>
<?php echo $view_advance_freezed->AdvanceValidityDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_advance_freezed->TotalRemainingAdvance->Visible) { // TotalRemainingAdvance ?>
	<tr id="r_TotalRemainingAdvance">
		<td class="<?php echo $view_advance_freezed_view->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_TotalRemainingAdvance"><?php echo $view_advance_freezed->TotalRemainingAdvance->caption() ?></span></td>
		<td data-name="TotalRemainingAdvance"<?php echo $view_advance_freezed->TotalRemainingAdvance->cellAttributes() ?>>
<span id="el_view_advance_freezed_TotalRemainingAdvance">
<span<?php echo $view_advance_freezed->TotalRemainingAdvance->viewAttributes() ?>>
<?php echo $view_advance_freezed->TotalRemainingAdvance->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_advance_freezed->Remarks->Visible) { // Remarks ?>
	<tr id="r_Remarks">
		<td class="<?php echo $view_advance_freezed_view->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_Remarks"><?php echo $view_advance_freezed->Remarks->caption() ?></span></td>
		<td data-name="Remarks"<?php echo $view_advance_freezed->Remarks->cellAttributes() ?>>
<span id="el_view_advance_freezed_Remarks">
<span<?php echo $view_advance_freezed->Remarks->viewAttributes() ?>>
<?php echo $view_advance_freezed->Remarks->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_advance_freezed->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
	<tr id="r_SeectPaymentMode">
		<td class="<?php echo $view_advance_freezed_view->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_SeectPaymentMode"><?php echo $view_advance_freezed->SeectPaymentMode->caption() ?></span></td>
		<td data-name="SeectPaymentMode"<?php echo $view_advance_freezed->SeectPaymentMode->cellAttributes() ?>>
<span id="el_view_advance_freezed_SeectPaymentMode">
<span<?php echo $view_advance_freezed->SeectPaymentMode->viewAttributes() ?>>
<?php echo $view_advance_freezed->SeectPaymentMode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_advance_freezed->PaidAmount->Visible) { // PaidAmount ?>
	<tr id="r_PaidAmount">
		<td class="<?php echo $view_advance_freezed_view->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_PaidAmount"><?php echo $view_advance_freezed->PaidAmount->caption() ?></span></td>
		<td data-name="PaidAmount"<?php echo $view_advance_freezed->PaidAmount->cellAttributes() ?>>
<span id="el_view_advance_freezed_PaidAmount">
<span<?php echo $view_advance_freezed->PaidAmount->viewAttributes() ?>>
<?php echo $view_advance_freezed->PaidAmount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_advance_freezed->Currency->Visible) { // Currency ?>
	<tr id="r_Currency">
		<td class="<?php echo $view_advance_freezed_view->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_Currency"><?php echo $view_advance_freezed->Currency->caption() ?></span></td>
		<td data-name="Currency"<?php echo $view_advance_freezed->Currency->cellAttributes() ?>>
<span id="el_view_advance_freezed_Currency">
<span<?php echo $view_advance_freezed->Currency->viewAttributes() ?>>
<?php echo $view_advance_freezed->Currency->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_advance_freezed->CardNumber->Visible) { // CardNumber ?>
	<tr id="r_CardNumber">
		<td class="<?php echo $view_advance_freezed_view->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_CardNumber"><?php echo $view_advance_freezed->CardNumber->caption() ?></span></td>
		<td data-name="CardNumber"<?php echo $view_advance_freezed->CardNumber->cellAttributes() ?>>
<span id="el_view_advance_freezed_CardNumber">
<span<?php echo $view_advance_freezed->CardNumber->viewAttributes() ?>>
<?php echo $view_advance_freezed->CardNumber->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_advance_freezed->BankName->Visible) { // BankName ?>
	<tr id="r_BankName">
		<td class="<?php echo $view_advance_freezed_view->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_BankName"><?php echo $view_advance_freezed->BankName->caption() ?></span></td>
		<td data-name="BankName"<?php echo $view_advance_freezed->BankName->cellAttributes() ?>>
<span id="el_view_advance_freezed_BankName">
<span<?php echo $view_advance_freezed->BankName->viewAttributes() ?>>
<?php echo $view_advance_freezed->BankName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_advance_freezed->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $view_advance_freezed_view->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_HospID"><?php echo $view_advance_freezed->HospID->caption() ?></span></td>
		<td data-name="HospID"<?php echo $view_advance_freezed->HospID->cellAttributes() ?>>
<span id="el_view_advance_freezed_HospID">
<span<?php echo $view_advance_freezed->HospID->viewAttributes() ?>>
<?php echo $view_advance_freezed->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_advance_freezed->Reception->Visible) { // Reception ?>
	<tr id="r_Reception">
		<td class="<?php echo $view_advance_freezed_view->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_Reception"><?php echo $view_advance_freezed->Reception->caption() ?></span></td>
		<td data-name="Reception"<?php echo $view_advance_freezed->Reception->cellAttributes() ?>>
<span id="el_view_advance_freezed_Reception">
<span<?php echo $view_advance_freezed->Reception->viewAttributes() ?>>
<?php echo $view_advance_freezed->Reception->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_advance_freezed->mrnno->Visible) { // mrnno ?>
	<tr id="r_mrnno">
		<td class="<?php echo $view_advance_freezed_view->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_mrnno"><?php echo $view_advance_freezed->mrnno->caption() ?></span></td>
		<td data-name="mrnno"<?php echo $view_advance_freezed->mrnno->cellAttributes() ?>>
<span id="el_view_advance_freezed_mrnno">
<span<?php echo $view_advance_freezed->mrnno->viewAttributes() ?>>
<?php echo $view_advance_freezed->mrnno->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_advance_freezed->GetUserName->Visible) { // GetUserName ?>
	<tr id="r_GetUserName">
		<td class="<?php echo $view_advance_freezed_view->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_GetUserName"><?php echo $view_advance_freezed->GetUserName->caption() ?></span></td>
		<td data-name="GetUserName"<?php echo $view_advance_freezed->GetUserName->cellAttributes() ?>>
<span id="el_view_advance_freezed_GetUserName">
<span<?php echo $view_advance_freezed->GetUserName->viewAttributes() ?>>
<?php echo $view_advance_freezed->GetUserName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_advance_freezed->AdjustmentwithAdvance->Visible) { // AdjustmentwithAdvance ?>
	<tr id="r_AdjustmentwithAdvance">
		<td class="<?php echo $view_advance_freezed_view->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_AdjustmentwithAdvance"><?php echo $view_advance_freezed->AdjustmentwithAdvance->caption() ?></span></td>
		<td data-name="AdjustmentwithAdvance"<?php echo $view_advance_freezed->AdjustmentwithAdvance->cellAttributes() ?>>
<span id="el_view_advance_freezed_AdjustmentwithAdvance">
<span<?php echo $view_advance_freezed->AdjustmentwithAdvance->viewAttributes() ?>>
<?php echo $view_advance_freezed->AdjustmentwithAdvance->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_advance_freezed->AdjustmentBillNumber->Visible) { // AdjustmentBillNumber ?>
	<tr id="r_AdjustmentBillNumber">
		<td class="<?php echo $view_advance_freezed_view->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_AdjustmentBillNumber"><?php echo $view_advance_freezed->AdjustmentBillNumber->caption() ?></span></td>
		<td data-name="AdjustmentBillNumber"<?php echo $view_advance_freezed->AdjustmentBillNumber->cellAttributes() ?>>
<span id="el_view_advance_freezed_AdjustmentBillNumber">
<span<?php echo $view_advance_freezed->AdjustmentBillNumber->viewAttributes() ?>>
<?php echo $view_advance_freezed->AdjustmentBillNumber->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_advance_freezed->CancelAdvance->Visible) { // CancelAdvance ?>
	<tr id="r_CancelAdvance">
		<td class="<?php echo $view_advance_freezed_view->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_CancelAdvance"><?php echo $view_advance_freezed->CancelAdvance->caption() ?></span></td>
		<td data-name="CancelAdvance"<?php echo $view_advance_freezed->CancelAdvance->cellAttributes() ?>>
<span id="el_view_advance_freezed_CancelAdvance">
<span<?php echo $view_advance_freezed->CancelAdvance->viewAttributes() ?>>
<?php echo $view_advance_freezed->CancelAdvance->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_advance_freezed->CancelReasan->Visible) { // CancelReasan ?>
	<tr id="r_CancelReasan">
		<td class="<?php echo $view_advance_freezed_view->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_CancelReasan"><?php echo $view_advance_freezed->CancelReasan->caption() ?></span></td>
		<td data-name="CancelReasan"<?php echo $view_advance_freezed->CancelReasan->cellAttributes() ?>>
<span id="el_view_advance_freezed_CancelReasan">
<span<?php echo $view_advance_freezed->CancelReasan->viewAttributes() ?>>
<?php echo $view_advance_freezed->CancelReasan->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_advance_freezed->CancelBy->Visible) { // CancelBy ?>
	<tr id="r_CancelBy">
		<td class="<?php echo $view_advance_freezed_view->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_CancelBy"><?php echo $view_advance_freezed->CancelBy->caption() ?></span></td>
		<td data-name="CancelBy"<?php echo $view_advance_freezed->CancelBy->cellAttributes() ?>>
<span id="el_view_advance_freezed_CancelBy">
<span<?php echo $view_advance_freezed->CancelBy->viewAttributes() ?>>
<?php echo $view_advance_freezed->CancelBy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_advance_freezed->CancelDate->Visible) { // CancelDate ?>
	<tr id="r_CancelDate">
		<td class="<?php echo $view_advance_freezed_view->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_CancelDate"><?php echo $view_advance_freezed->CancelDate->caption() ?></span></td>
		<td data-name="CancelDate"<?php echo $view_advance_freezed->CancelDate->cellAttributes() ?>>
<span id="el_view_advance_freezed_CancelDate">
<span<?php echo $view_advance_freezed->CancelDate->viewAttributes() ?>>
<?php echo $view_advance_freezed->CancelDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_advance_freezed->CancelDateTime->Visible) { // CancelDateTime ?>
	<tr id="r_CancelDateTime">
		<td class="<?php echo $view_advance_freezed_view->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_CancelDateTime"><?php echo $view_advance_freezed->CancelDateTime->caption() ?></span></td>
		<td data-name="CancelDateTime"<?php echo $view_advance_freezed->CancelDateTime->cellAttributes() ?>>
<span id="el_view_advance_freezed_CancelDateTime">
<span<?php echo $view_advance_freezed->CancelDateTime->viewAttributes() ?>>
<?php echo $view_advance_freezed->CancelDateTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_advance_freezed->CanceledBy->Visible) { // CanceledBy ?>
	<tr id="r_CanceledBy">
		<td class="<?php echo $view_advance_freezed_view->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_CanceledBy"><?php echo $view_advance_freezed->CanceledBy->caption() ?></span></td>
		<td data-name="CanceledBy"<?php echo $view_advance_freezed->CanceledBy->cellAttributes() ?>>
<span id="el_view_advance_freezed_CanceledBy">
<span<?php echo $view_advance_freezed->CanceledBy->viewAttributes() ?>>
<?php echo $view_advance_freezed->CanceledBy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_advance_freezed->CancelStatus->Visible) { // CancelStatus ?>
	<tr id="r_CancelStatus">
		<td class="<?php echo $view_advance_freezed_view->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_CancelStatus"><?php echo $view_advance_freezed->CancelStatus->caption() ?></span></td>
		<td data-name="CancelStatus"<?php echo $view_advance_freezed->CancelStatus->cellAttributes() ?>>
<span id="el_view_advance_freezed_CancelStatus">
<span<?php echo $view_advance_freezed->CancelStatus->viewAttributes() ?>>
<?php echo $view_advance_freezed->CancelStatus->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_advance_freezed->Cash->Visible) { // Cash ?>
	<tr id="r_Cash">
		<td class="<?php echo $view_advance_freezed_view->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_Cash"><?php echo $view_advance_freezed->Cash->caption() ?></span></td>
		<td data-name="Cash"<?php echo $view_advance_freezed->Cash->cellAttributes() ?>>
<span id="el_view_advance_freezed_Cash">
<span<?php echo $view_advance_freezed->Cash->viewAttributes() ?>>
<?php echo $view_advance_freezed->Cash->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_advance_freezed->Card->Visible) { // Card ?>
	<tr id="r_Card">
		<td class="<?php echo $view_advance_freezed_view->TableLeftColumnClass ?>"><span id="elh_view_advance_freezed_Card"><?php echo $view_advance_freezed->Card->caption() ?></span></td>
		<td data-name="Card"<?php echo $view_advance_freezed->Card->cellAttributes() ?>>
<span id="el_view_advance_freezed_Card">
<span<?php echo $view_advance_freezed->Card->viewAttributes() ?>>
<?php echo $view_advance_freezed->Card->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$view_advance_freezed_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_advance_freezed->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_advance_freezed_view->terminate();
?>