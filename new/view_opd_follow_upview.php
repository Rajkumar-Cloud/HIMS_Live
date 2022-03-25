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
<?php include_once "header.php"; ?>
<?php if (!$view_opd_follow_up_view->isExport()) { ?>
<script>
var fview_opd_follow_upview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fview_opd_follow_upview = currentForm = new ew.Form("fview_opd_follow_upview", "view");
	loadjs.done("fview_opd_follow_upview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$view_opd_follow_up_view->isExport()) { ?>
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
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_opd_follow_up">
<input type="hidden" name="modal" value="<?php echo (int)$view_opd_follow_up_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($view_opd_follow_up_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $view_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_view_opd_follow_up_id"><?php echo $view_opd_follow_up_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $view_opd_follow_up_view->id->cellAttributes() ?>>
<span id="el_view_opd_follow_up_id">
<span<?php echo $view_opd_follow_up_view->id->viewAttributes() ?>><?php echo $view_opd_follow_up_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_opd_follow_up_view->Reception->Visible) { // Reception ?>
	<tr id="r_Reception">
		<td class="<?php echo $view_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_view_opd_follow_up_Reception"><?php echo $view_opd_follow_up_view->Reception->caption() ?></span></td>
		<td data-name="Reception" <?php echo $view_opd_follow_up_view->Reception->cellAttributes() ?>>
<span id="el_view_opd_follow_up_Reception">
<span<?php echo $view_opd_follow_up_view->Reception->viewAttributes() ?>><?php echo $view_opd_follow_up_view->Reception->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_opd_follow_up_view->PatientId->Visible) { // PatientId ?>
	<tr id="r_PatientId">
		<td class="<?php echo $view_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_view_opd_follow_up_PatientId"><?php echo $view_opd_follow_up_view->PatientId->caption() ?></span></td>
		<td data-name="PatientId" <?php echo $view_opd_follow_up_view->PatientId->cellAttributes() ?>>
<span id="el_view_opd_follow_up_PatientId">
<span<?php echo $view_opd_follow_up_view->PatientId->viewAttributes() ?>><?php echo $view_opd_follow_up_view->PatientId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_opd_follow_up_view->mrnno->Visible) { // mrnno ?>
	<tr id="r_mrnno">
		<td class="<?php echo $view_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_view_opd_follow_up_mrnno"><?php echo $view_opd_follow_up_view->mrnno->caption() ?></span></td>
		<td data-name="mrnno" <?php echo $view_opd_follow_up_view->mrnno->cellAttributes() ?>>
<span id="el_view_opd_follow_up_mrnno">
<span<?php echo $view_opd_follow_up_view->mrnno->viewAttributes() ?>><?php echo $view_opd_follow_up_view->mrnno->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_opd_follow_up_view->PatientName->Visible) { // PatientName ?>
	<tr id="r_PatientName">
		<td class="<?php echo $view_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_view_opd_follow_up_PatientName"><?php echo $view_opd_follow_up_view->PatientName->caption() ?></span></td>
		<td data-name="PatientName" <?php echo $view_opd_follow_up_view->PatientName->cellAttributes() ?>>
<span id="el_view_opd_follow_up_PatientName">
<span<?php echo $view_opd_follow_up_view->PatientName->viewAttributes() ?>><?php echo $view_opd_follow_up_view->PatientName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_opd_follow_up_view->Telephone->Visible) { // Telephone ?>
	<tr id="r_Telephone">
		<td class="<?php echo $view_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_view_opd_follow_up_Telephone"><?php echo $view_opd_follow_up_view->Telephone->caption() ?></span></td>
		<td data-name="Telephone" <?php echo $view_opd_follow_up_view->Telephone->cellAttributes() ?>>
<span id="el_view_opd_follow_up_Telephone">
<span<?php echo $view_opd_follow_up_view->Telephone->viewAttributes() ?>><?php echo $view_opd_follow_up_view->Telephone->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_opd_follow_up_view->Age->Visible) { // Age ?>
	<tr id="r_Age">
		<td class="<?php echo $view_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_view_opd_follow_up_Age"><?php echo $view_opd_follow_up_view->Age->caption() ?></span></td>
		<td data-name="Age" <?php echo $view_opd_follow_up_view->Age->cellAttributes() ?>>
<span id="el_view_opd_follow_up_Age">
<span<?php echo $view_opd_follow_up_view->Age->viewAttributes() ?>><?php echo $view_opd_follow_up_view->Age->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_opd_follow_up_view->Gender->Visible) { // Gender ?>
	<tr id="r_Gender">
		<td class="<?php echo $view_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_view_opd_follow_up_Gender"><?php echo $view_opd_follow_up_view->Gender->caption() ?></span></td>
		<td data-name="Gender" <?php echo $view_opd_follow_up_view->Gender->cellAttributes() ?>>
<span id="el_view_opd_follow_up_Gender">
<span<?php echo $view_opd_follow_up_view->Gender->viewAttributes() ?>><?php echo $view_opd_follow_up_view->Gender->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_opd_follow_up_view->profilePic->Visible) { // profilePic ?>
	<tr id="r_profilePic">
		<td class="<?php echo $view_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_view_opd_follow_up_profilePic"><?php echo $view_opd_follow_up_view->profilePic->caption() ?></span></td>
		<td data-name="profilePic" <?php echo $view_opd_follow_up_view->profilePic->cellAttributes() ?>>
<span id="el_view_opd_follow_up_profilePic">
<span<?php echo $view_opd_follow_up_view->profilePic->viewAttributes() ?>><?php echo $view_opd_follow_up_view->profilePic->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_opd_follow_up_view->procedurenotes->Visible) { // procedurenotes ?>
	<tr id="r_procedurenotes">
		<td class="<?php echo $view_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_view_opd_follow_up_procedurenotes"><?php echo $view_opd_follow_up_view->procedurenotes->caption() ?></span></td>
		<td data-name="procedurenotes" <?php echo $view_opd_follow_up_view->procedurenotes->cellAttributes() ?>>
<span id="el_view_opd_follow_up_procedurenotes">
<span<?php echo $view_opd_follow_up_view->procedurenotes->viewAttributes() ?>><?php echo $view_opd_follow_up_view->procedurenotes->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_opd_follow_up_view->NextReviewDate->Visible) { // NextReviewDate ?>
	<tr id="r_NextReviewDate">
		<td class="<?php echo $view_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_view_opd_follow_up_NextReviewDate"><?php echo $view_opd_follow_up_view->NextReviewDate->caption() ?></span></td>
		<td data-name="NextReviewDate" <?php echo $view_opd_follow_up_view->NextReviewDate->cellAttributes() ?>>
<span id="el_view_opd_follow_up_NextReviewDate">
<span<?php echo $view_opd_follow_up_view->NextReviewDate->viewAttributes() ?>><?php echo $view_opd_follow_up_view->NextReviewDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_opd_follow_up_view->ICSIAdvised->Visible) { // ICSIAdvised ?>
	<tr id="r_ICSIAdvised">
		<td class="<?php echo $view_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_view_opd_follow_up_ICSIAdvised"><?php echo $view_opd_follow_up_view->ICSIAdvised->caption() ?></span></td>
		<td data-name="ICSIAdvised" <?php echo $view_opd_follow_up_view->ICSIAdvised->cellAttributes() ?>>
<span id="el_view_opd_follow_up_ICSIAdvised">
<span<?php echo $view_opd_follow_up_view->ICSIAdvised->viewAttributes() ?>><?php echo $view_opd_follow_up_view->ICSIAdvised->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_opd_follow_up_view->DeliveryRegistered->Visible) { // DeliveryRegistered ?>
	<tr id="r_DeliveryRegistered">
		<td class="<?php echo $view_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_view_opd_follow_up_DeliveryRegistered"><?php echo $view_opd_follow_up_view->DeliveryRegistered->caption() ?></span></td>
		<td data-name="DeliveryRegistered" <?php echo $view_opd_follow_up_view->DeliveryRegistered->cellAttributes() ?>>
<span id="el_view_opd_follow_up_DeliveryRegistered">
<span<?php echo $view_opd_follow_up_view->DeliveryRegistered->viewAttributes() ?>><?php echo $view_opd_follow_up_view->DeliveryRegistered->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_opd_follow_up_view->EDD->Visible) { // EDD ?>
	<tr id="r_EDD">
		<td class="<?php echo $view_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_view_opd_follow_up_EDD"><?php echo $view_opd_follow_up_view->EDD->caption() ?></span></td>
		<td data-name="EDD" <?php echo $view_opd_follow_up_view->EDD->cellAttributes() ?>>
<span id="el_view_opd_follow_up_EDD">
<span<?php echo $view_opd_follow_up_view->EDD->viewAttributes() ?>><?php echo $view_opd_follow_up_view->EDD->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_opd_follow_up_view->SerologyPositive->Visible) { // SerologyPositive ?>
	<tr id="r_SerologyPositive">
		<td class="<?php echo $view_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_view_opd_follow_up_SerologyPositive"><?php echo $view_opd_follow_up_view->SerologyPositive->caption() ?></span></td>
		<td data-name="SerologyPositive" <?php echo $view_opd_follow_up_view->SerologyPositive->cellAttributes() ?>>
<span id="el_view_opd_follow_up_SerologyPositive">
<span<?php echo $view_opd_follow_up_view->SerologyPositive->viewAttributes() ?>><?php echo $view_opd_follow_up_view->SerologyPositive->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_opd_follow_up_view->Allergy->Visible) { // Allergy ?>
	<tr id="r_Allergy">
		<td class="<?php echo $view_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_view_opd_follow_up_Allergy"><?php echo $view_opd_follow_up_view->Allergy->caption() ?></span></td>
		<td data-name="Allergy" <?php echo $view_opd_follow_up_view->Allergy->cellAttributes() ?>>
<span id="el_view_opd_follow_up_Allergy">
<span<?php echo $view_opd_follow_up_view->Allergy->viewAttributes() ?>><?php echo $view_opd_follow_up_view->Allergy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_opd_follow_up_view->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $view_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_view_opd_follow_up_status"><?php echo $view_opd_follow_up_view->status->caption() ?></span></td>
		<td data-name="status" <?php echo $view_opd_follow_up_view->status->cellAttributes() ?>>
<span id="el_view_opd_follow_up_status">
<span<?php echo $view_opd_follow_up_view->status->viewAttributes() ?>><?php echo $view_opd_follow_up_view->status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_opd_follow_up_view->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $view_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_view_opd_follow_up_createdby"><?php echo $view_opd_follow_up_view->createdby->caption() ?></span></td>
		<td data-name="createdby" <?php echo $view_opd_follow_up_view->createdby->cellAttributes() ?>>
<span id="el_view_opd_follow_up_createdby">
<span<?php echo $view_opd_follow_up_view->createdby->viewAttributes() ?>><?php echo $view_opd_follow_up_view->createdby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_opd_follow_up_view->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $view_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_view_opd_follow_up_createddatetime"><?php echo $view_opd_follow_up_view->createddatetime->caption() ?></span></td>
		<td data-name="createddatetime" <?php echo $view_opd_follow_up_view->createddatetime->cellAttributes() ?>>
<span id="el_view_opd_follow_up_createddatetime">
<span<?php echo $view_opd_follow_up_view->createddatetime->viewAttributes() ?>><?php echo $view_opd_follow_up_view->createddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_opd_follow_up_view->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $view_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_view_opd_follow_up_modifiedby"><?php echo $view_opd_follow_up_view->modifiedby->caption() ?></span></td>
		<td data-name="modifiedby" <?php echo $view_opd_follow_up_view->modifiedby->cellAttributes() ?>>
<span id="el_view_opd_follow_up_modifiedby">
<span<?php echo $view_opd_follow_up_view->modifiedby->viewAttributes() ?>><?php echo $view_opd_follow_up_view->modifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_opd_follow_up_view->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $view_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_view_opd_follow_up_modifieddatetime"><?php echo $view_opd_follow_up_view->modifieddatetime->caption() ?></span></td>
		<td data-name="modifieddatetime" <?php echo $view_opd_follow_up_view->modifieddatetime->cellAttributes() ?>>
<span id="el_view_opd_follow_up_modifieddatetime">
<span<?php echo $view_opd_follow_up_view->modifieddatetime->viewAttributes() ?>><?php echo $view_opd_follow_up_view->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_opd_follow_up_view->LMP->Visible) { // LMP ?>
	<tr id="r_LMP">
		<td class="<?php echo $view_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_view_opd_follow_up_LMP"><?php echo $view_opd_follow_up_view->LMP->caption() ?></span></td>
		<td data-name="LMP" <?php echo $view_opd_follow_up_view->LMP->cellAttributes() ?>>
<span id="el_view_opd_follow_up_LMP">
<span<?php echo $view_opd_follow_up_view->LMP->viewAttributes() ?>><?php echo $view_opd_follow_up_view->LMP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_opd_follow_up_view->Procedure->Visible) { // Procedure ?>
	<tr id="r_Procedure">
		<td class="<?php echo $view_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_view_opd_follow_up_Procedure"><?php echo $view_opd_follow_up_view->Procedure->caption() ?></span></td>
		<td data-name="Procedure" <?php echo $view_opd_follow_up_view->Procedure->cellAttributes() ?>>
<span id="el_view_opd_follow_up_Procedure">
<span<?php echo $view_opd_follow_up_view->Procedure->viewAttributes() ?>><?php echo $view_opd_follow_up_view->Procedure->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_opd_follow_up_view->ProcedureDateTime->Visible) { // ProcedureDateTime ?>
	<tr id="r_ProcedureDateTime">
		<td class="<?php echo $view_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_view_opd_follow_up_ProcedureDateTime"><?php echo $view_opd_follow_up_view->ProcedureDateTime->caption() ?></span></td>
		<td data-name="ProcedureDateTime" <?php echo $view_opd_follow_up_view->ProcedureDateTime->cellAttributes() ?>>
<span id="el_view_opd_follow_up_ProcedureDateTime">
<span<?php echo $view_opd_follow_up_view->ProcedureDateTime->viewAttributes() ?>><?php echo $view_opd_follow_up_view->ProcedureDateTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_opd_follow_up_view->ICSIDate->Visible) { // ICSIDate ?>
	<tr id="r_ICSIDate">
		<td class="<?php echo $view_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_view_opd_follow_up_ICSIDate"><?php echo $view_opd_follow_up_view->ICSIDate->caption() ?></span></td>
		<td data-name="ICSIDate" <?php echo $view_opd_follow_up_view->ICSIDate->cellAttributes() ?>>
<span id="el_view_opd_follow_up_ICSIDate">
<span<?php echo $view_opd_follow_up_view->ICSIDate->viewAttributes() ?>><?php echo $view_opd_follow_up_view->ICSIDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($view_opd_follow_up_view->RIDNo->Visible) { // RIDNo ?>
	<tr id="r_RIDNo">
		<td class="<?php echo $view_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_view_opd_follow_up_RIDNo"><?php echo $view_opd_follow_up_view->RIDNo->caption() ?></span></td>
		<td data-name="RIDNo" <?php echo $view_opd_follow_up_view->RIDNo->cellAttributes() ?>>
<span id="el_view_opd_follow_up_RIDNo">
<span<?php echo $view_opd_follow_up_view->RIDNo->viewAttributes() ?>><?php echo $view_opd_follow_up_view->RIDNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$view_opd_follow_up_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_opd_follow_up_view->isExport()) { ?>
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
$view_opd_follow_up_view->terminate();
?>