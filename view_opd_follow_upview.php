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
$view_opd_follow_up_view = new view_opd_follow_up_view();

// Run the page
$view_opd_follow_up_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_opd_follow_up_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_opd_follow_up->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fview_opd_follow_upview = currentForm = new ew.Form("fview_opd_follow_upview", "view");

// Form_CustomValidate event
fview_opd_follow_upview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_opd_follow_upview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_opd_follow_upview.lists["x_ICSIAdvised[]"] = <?php echo $view_opd_follow_up_view->ICSIAdvised->Lookup->toClientList() ?>;
fview_opd_follow_upview.lists["x_ICSIAdvised[]"].options = <?php echo JsonEncode($view_opd_follow_up_view->ICSIAdvised->options(FALSE, TRUE)) ?>;
fview_opd_follow_upview.lists["x_DeliveryRegistered[]"] = <?php echo $view_opd_follow_up_view->DeliveryRegistered->Lookup->toClientList() ?>;
fview_opd_follow_upview.lists["x_DeliveryRegistered[]"].options = <?php echo JsonEncode($view_opd_follow_up_view->DeliveryRegistered->options(FALSE, TRUE)) ?>;
fview_opd_follow_upview.lists["x_SerologyPositive[]"] = <?php echo $view_opd_follow_up_view->SerologyPositive->Lookup->toClientList() ?>;
fview_opd_follow_upview.lists["x_SerologyPositive[]"].options = <?php echo JsonEncode($view_opd_follow_up_view->SerologyPositive->options(FALSE, TRUE)) ?>;
fview_opd_follow_upview.lists["x_Allergy"] = <?php echo $view_opd_follow_up_view->Allergy->Lookup->toClientList() ?>;
fview_opd_follow_upview.lists["x_Allergy"].options = <?php echo JsonEncode($view_opd_follow_up_view->Allergy->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$view_opd_follow_up->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $view_opd_follow_up_view->ExportOptions->render("body") ?>
<?php $view_opd_follow_up_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $view_opd_follow_up_view->showPageHeader(); ?>
<?php
$view_opd_follow_up_view->showMessage();
?>
<form name="fview_opd_follow_upview" id="fview_opd_follow_upview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_opd_follow_up_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_opd_follow_up_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_opd_follow_up">
<input type="hidden" name="modal" value="<?php echo (int)$view_opd_follow_up_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($view_opd_follow_up->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $view_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_view_opd_follow_up_id"><?php echo $view_opd_follow_up->id->caption() ?></span></td>
		<td data-name="id"<?php echo $view_opd_follow_up->id->cellAttributes() ?>>
<span id="el_view_opd_follow_up_id">
<span<?php echo $view_opd_follow_up->id->viewAttributes() ?>>
<?php echo $view_opd_follow_up->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_opd_follow_up->Reception->Visible) { // Reception ?>
	<tr id="r_Reception">
		<td class="<?php echo $view_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_view_opd_follow_up_Reception"><?php echo $view_opd_follow_up->Reception->caption() ?></span></td>
		<td data-name="Reception"<?php echo $view_opd_follow_up->Reception->cellAttributes() ?>>
<span id="el_view_opd_follow_up_Reception">
<span<?php echo $view_opd_follow_up->Reception->viewAttributes() ?>>
<?php echo $view_opd_follow_up->Reception->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_opd_follow_up->PatientId->Visible) { // PatientId ?>
	<tr id="r_PatientId">
		<td class="<?php echo $view_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_view_opd_follow_up_PatientId"><?php echo $view_opd_follow_up->PatientId->caption() ?></span></td>
		<td data-name="PatientId"<?php echo $view_opd_follow_up->PatientId->cellAttributes() ?>>
<span id="el_view_opd_follow_up_PatientId">
<span<?php echo $view_opd_follow_up->PatientId->viewAttributes() ?>>
<?php echo $view_opd_follow_up->PatientId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_opd_follow_up->mrnno->Visible) { // mrnno ?>
	<tr id="r_mrnno">
		<td class="<?php echo $view_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_view_opd_follow_up_mrnno"><?php echo $view_opd_follow_up->mrnno->caption() ?></span></td>
		<td data-name="mrnno"<?php echo $view_opd_follow_up->mrnno->cellAttributes() ?>>
<span id="el_view_opd_follow_up_mrnno">
<span<?php echo $view_opd_follow_up->mrnno->viewAttributes() ?>>
<?php echo $view_opd_follow_up->mrnno->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_opd_follow_up->PatientName->Visible) { // PatientName ?>
	<tr id="r_PatientName">
		<td class="<?php echo $view_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_view_opd_follow_up_PatientName"><?php echo $view_opd_follow_up->PatientName->caption() ?></span></td>
		<td data-name="PatientName"<?php echo $view_opd_follow_up->PatientName->cellAttributes() ?>>
<span id="el_view_opd_follow_up_PatientName">
<span<?php echo $view_opd_follow_up->PatientName->viewAttributes() ?>>
<?php echo $view_opd_follow_up->PatientName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_opd_follow_up->Telephone->Visible) { // Telephone ?>
	<tr id="r_Telephone">
		<td class="<?php echo $view_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_view_opd_follow_up_Telephone"><?php echo $view_opd_follow_up->Telephone->caption() ?></span></td>
		<td data-name="Telephone"<?php echo $view_opd_follow_up->Telephone->cellAttributes() ?>>
<span id="el_view_opd_follow_up_Telephone">
<span<?php echo $view_opd_follow_up->Telephone->viewAttributes() ?>>
<?php echo $view_opd_follow_up->Telephone->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_opd_follow_up->Age->Visible) { // Age ?>
	<tr id="r_Age">
		<td class="<?php echo $view_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_view_opd_follow_up_Age"><?php echo $view_opd_follow_up->Age->caption() ?></span></td>
		<td data-name="Age"<?php echo $view_opd_follow_up->Age->cellAttributes() ?>>
<span id="el_view_opd_follow_up_Age">
<span<?php echo $view_opd_follow_up->Age->viewAttributes() ?>>
<?php echo $view_opd_follow_up->Age->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_opd_follow_up->Gender->Visible) { // Gender ?>
	<tr id="r_Gender">
		<td class="<?php echo $view_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_view_opd_follow_up_Gender"><?php echo $view_opd_follow_up->Gender->caption() ?></span></td>
		<td data-name="Gender"<?php echo $view_opd_follow_up->Gender->cellAttributes() ?>>
<span id="el_view_opd_follow_up_Gender">
<span<?php echo $view_opd_follow_up->Gender->viewAttributes() ?>>
<?php echo $view_opd_follow_up->Gender->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_opd_follow_up->profilePic->Visible) { // profilePic ?>
	<tr id="r_profilePic">
		<td class="<?php echo $view_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_view_opd_follow_up_profilePic"><?php echo $view_opd_follow_up->profilePic->caption() ?></span></td>
		<td data-name="profilePic"<?php echo $view_opd_follow_up->profilePic->cellAttributes() ?>>
<span id="el_view_opd_follow_up_profilePic">
<span<?php echo $view_opd_follow_up->profilePic->viewAttributes() ?>>
<?php echo $view_opd_follow_up->profilePic->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_opd_follow_up->procedurenotes->Visible) { // procedurenotes ?>
	<tr id="r_procedurenotes">
		<td class="<?php echo $view_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_view_opd_follow_up_procedurenotes"><?php echo $view_opd_follow_up->procedurenotes->caption() ?></span></td>
		<td data-name="procedurenotes"<?php echo $view_opd_follow_up->procedurenotes->cellAttributes() ?>>
<span id="el_view_opd_follow_up_procedurenotes">
<span<?php echo $view_opd_follow_up->procedurenotes->viewAttributes() ?>>
<?php echo $view_opd_follow_up->procedurenotes->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_opd_follow_up->NextReviewDate->Visible) { // NextReviewDate ?>
	<tr id="r_NextReviewDate">
		<td class="<?php echo $view_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_view_opd_follow_up_NextReviewDate"><?php echo $view_opd_follow_up->NextReviewDate->caption() ?></span></td>
		<td data-name="NextReviewDate"<?php echo $view_opd_follow_up->NextReviewDate->cellAttributes() ?>>
<span id="el_view_opd_follow_up_NextReviewDate">
<span<?php echo $view_opd_follow_up->NextReviewDate->viewAttributes() ?>>
<?php echo $view_opd_follow_up->NextReviewDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_opd_follow_up->ICSIAdvised->Visible) { // ICSIAdvised ?>
	<tr id="r_ICSIAdvised">
		<td class="<?php echo $view_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_view_opd_follow_up_ICSIAdvised"><?php echo $view_opd_follow_up->ICSIAdvised->caption() ?></span></td>
		<td data-name="ICSIAdvised"<?php echo $view_opd_follow_up->ICSIAdvised->cellAttributes() ?>>
<span id="el_view_opd_follow_up_ICSIAdvised">
<span<?php echo $view_opd_follow_up->ICSIAdvised->viewAttributes() ?>>
<?php echo $view_opd_follow_up->ICSIAdvised->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_opd_follow_up->DeliveryRegistered->Visible) { // DeliveryRegistered ?>
	<tr id="r_DeliveryRegistered">
		<td class="<?php echo $view_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_view_opd_follow_up_DeliveryRegistered"><?php echo $view_opd_follow_up->DeliveryRegistered->caption() ?></span></td>
		<td data-name="DeliveryRegistered"<?php echo $view_opd_follow_up->DeliveryRegistered->cellAttributes() ?>>
<span id="el_view_opd_follow_up_DeliveryRegistered">
<span<?php echo $view_opd_follow_up->DeliveryRegistered->viewAttributes() ?>>
<?php echo $view_opd_follow_up->DeliveryRegistered->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_opd_follow_up->EDD->Visible) { // EDD ?>
	<tr id="r_EDD">
		<td class="<?php echo $view_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_view_opd_follow_up_EDD"><?php echo $view_opd_follow_up->EDD->caption() ?></span></td>
		<td data-name="EDD"<?php echo $view_opd_follow_up->EDD->cellAttributes() ?>>
<span id="el_view_opd_follow_up_EDD">
<span<?php echo $view_opd_follow_up->EDD->viewAttributes() ?>>
<?php echo $view_opd_follow_up->EDD->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_opd_follow_up->SerologyPositive->Visible) { // SerologyPositive ?>
	<tr id="r_SerologyPositive">
		<td class="<?php echo $view_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_view_opd_follow_up_SerologyPositive"><?php echo $view_opd_follow_up->SerologyPositive->caption() ?></span></td>
		<td data-name="SerologyPositive"<?php echo $view_opd_follow_up->SerologyPositive->cellAttributes() ?>>
<span id="el_view_opd_follow_up_SerologyPositive">
<span<?php echo $view_opd_follow_up->SerologyPositive->viewAttributes() ?>>
<?php echo $view_opd_follow_up->SerologyPositive->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_opd_follow_up->Allergy->Visible) { // Allergy ?>
	<tr id="r_Allergy">
		<td class="<?php echo $view_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_view_opd_follow_up_Allergy"><?php echo $view_opd_follow_up->Allergy->caption() ?></span></td>
		<td data-name="Allergy"<?php echo $view_opd_follow_up->Allergy->cellAttributes() ?>>
<span id="el_view_opd_follow_up_Allergy">
<span<?php echo $view_opd_follow_up->Allergy->viewAttributes() ?>>
<?php echo $view_opd_follow_up->Allergy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_opd_follow_up->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $view_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_view_opd_follow_up_status"><?php echo $view_opd_follow_up->status->caption() ?></span></td>
		<td data-name="status"<?php echo $view_opd_follow_up->status->cellAttributes() ?>>
<span id="el_view_opd_follow_up_status">
<span<?php echo $view_opd_follow_up->status->viewAttributes() ?>>
<?php echo $view_opd_follow_up->status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_opd_follow_up->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $view_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_view_opd_follow_up_createdby"><?php echo $view_opd_follow_up->createdby->caption() ?></span></td>
		<td data-name="createdby"<?php echo $view_opd_follow_up->createdby->cellAttributes() ?>>
<span id="el_view_opd_follow_up_createdby">
<span<?php echo $view_opd_follow_up->createdby->viewAttributes() ?>>
<?php echo $view_opd_follow_up->createdby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_opd_follow_up->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $view_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_view_opd_follow_up_createddatetime"><?php echo $view_opd_follow_up->createddatetime->caption() ?></span></td>
		<td data-name="createddatetime"<?php echo $view_opd_follow_up->createddatetime->cellAttributes() ?>>
<span id="el_view_opd_follow_up_createddatetime">
<span<?php echo $view_opd_follow_up->createddatetime->viewAttributes() ?>>
<?php echo $view_opd_follow_up->createddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_opd_follow_up->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $view_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_view_opd_follow_up_modifiedby"><?php echo $view_opd_follow_up->modifiedby->caption() ?></span></td>
		<td data-name="modifiedby"<?php echo $view_opd_follow_up->modifiedby->cellAttributes() ?>>
<span id="el_view_opd_follow_up_modifiedby">
<span<?php echo $view_opd_follow_up->modifiedby->viewAttributes() ?>>
<?php echo $view_opd_follow_up->modifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_opd_follow_up->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $view_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_view_opd_follow_up_modifieddatetime"><?php echo $view_opd_follow_up->modifieddatetime->caption() ?></span></td>
		<td data-name="modifieddatetime"<?php echo $view_opd_follow_up->modifieddatetime->cellAttributes() ?>>
<span id="el_view_opd_follow_up_modifieddatetime">
<span<?php echo $view_opd_follow_up->modifieddatetime->viewAttributes() ?>>
<?php echo $view_opd_follow_up->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_opd_follow_up->LMP->Visible) { // LMP ?>
	<tr id="r_LMP">
		<td class="<?php echo $view_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_view_opd_follow_up_LMP"><?php echo $view_opd_follow_up->LMP->caption() ?></span></td>
		<td data-name="LMP"<?php echo $view_opd_follow_up->LMP->cellAttributes() ?>>
<span id="el_view_opd_follow_up_LMP">
<span<?php echo $view_opd_follow_up->LMP->viewAttributes() ?>>
<?php echo $view_opd_follow_up->LMP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_opd_follow_up->Procedure->Visible) { // Procedure ?>
	<tr id="r_Procedure">
		<td class="<?php echo $view_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_view_opd_follow_up_Procedure"><?php echo $view_opd_follow_up->Procedure->caption() ?></span></td>
		<td data-name="Procedure"<?php echo $view_opd_follow_up->Procedure->cellAttributes() ?>>
<span id="el_view_opd_follow_up_Procedure">
<span<?php echo $view_opd_follow_up->Procedure->viewAttributes() ?>>
<?php echo $view_opd_follow_up->Procedure->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_opd_follow_up->ProcedureDateTime->Visible) { // ProcedureDateTime ?>
	<tr id="r_ProcedureDateTime">
		<td class="<?php echo $view_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_view_opd_follow_up_ProcedureDateTime"><?php echo $view_opd_follow_up->ProcedureDateTime->caption() ?></span></td>
		<td data-name="ProcedureDateTime"<?php echo $view_opd_follow_up->ProcedureDateTime->cellAttributes() ?>>
<span id="el_view_opd_follow_up_ProcedureDateTime">
<span<?php echo $view_opd_follow_up->ProcedureDateTime->viewAttributes() ?>>
<?php echo $view_opd_follow_up->ProcedureDateTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_opd_follow_up->ICSIDate->Visible) { // ICSIDate ?>
	<tr id="r_ICSIDate">
		<td class="<?php echo $view_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_view_opd_follow_up_ICSIDate"><?php echo $view_opd_follow_up->ICSIDate->caption() ?></span></td>
		<td data-name="ICSIDate"<?php echo $view_opd_follow_up->ICSIDate->cellAttributes() ?>>
<span id="el_view_opd_follow_up_ICSIDate">
<span<?php echo $view_opd_follow_up->ICSIDate->viewAttributes() ?>>
<?php echo $view_opd_follow_up->ICSIDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_opd_follow_up->RIDNo->Visible) { // RIDNo ?>
	<tr id="r_RIDNo">
		<td class="<?php echo $view_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_view_opd_follow_up_RIDNo"><?php echo $view_opd_follow_up->RIDNo->caption() ?></span></td>
		<td data-name="RIDNo"<?php echo $view_opd_follow_up->RIDNo->cellAttributes() ?>>
<span id="el_view_opd_follow_up_RIDNo">
<span<?php echo $view_opd_follow_up->RIDNo->viewAttributes() ?>>
<?php echo $view_opd_follow_up->RIDNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$view_opd_follow_up_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_opd_follow_up->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_opd_follow_up_view->terminate();
?>