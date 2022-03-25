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
$mas_user_template_prescription_view = new mas_user_template_prescription_view();

// Run the page
$mas_user_template_prescription_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_user_template_prescription_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$mas_user_template_prescription_view->isExport()) { ?>
<script>
var fmas_user_template_prescriptionview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fmas_user_template_prescriptionview = currentForm = new ew.Form("fmas_user_template_prescriptionview", "view");
	loadjs.done("fmas_user_template_prescriptionview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$mas_user_template_prescription_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $mas_user_template_prescription_view->ExportOptions->render("body") ?>
<?php $mas_user_template_prescription_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $mas_user_template_prescription_view->showPageHeader(); ?>
<?php
$mas_user_template_prescription_view->showMessage();
?>
<form name="fmas_user_template_prescriptionview" id="fmas_user_template_prescriptionview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_user_template_prescription">
<input type="hidden" name="modal" value="<?php echo (int)$mas_user_template_prescription_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($mas_user_template_prescription_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $mas_user_template_prescription_view->TableLeftColumnClass ?>"><span id="elh_mas_user_template_prescription_id"><?php echo $mas_user_template_prescription_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $mas_user_template_prescription_view->id->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_id">
<span<?php echo $mas_user_template_prescription_view->id->viewAttributes() ?>><?php echo $mas_user_template_prescription_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_user_template_prescription_view->TemplateName->Visible) { // TemplateName ?>
	<tr id="r_TemplateName">
		<td class="<?php echo $mas_user_template_prescription_view->TableLeftColumnClass ?>"><span id="elh_mas_user_template_prescription_TemplateName"><?php echo $mas_user_template_prescription_view->TemplateName->caption() ?></span></td>
		<td data-name="TemplateName" <?php echo $mas_user_template_prescription_view->TemplateName->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_TemplateName">
<span<?php echo $mas_user_template_prescription_view->TemplateName->viewAttributes() ?>><?php echo $mas_user_template_prescription_view->TemplateName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_user_template_prescription_view->Medicine->Visible) { // Medicine ?>
	<tr id="r_Medicine">
		<td class="<?php echo $mas_user_template_prescription_view->TableLeftColumnClass ?>"><span id="elh_mas_user_template_prescription_Medicine"><?php echo $mas_user_template_prescription_view->Medicine->caption() ?></span></td>
		<td data-name="Medicine" <?php echo $mas_user_template_prescription_view->Medicine->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_Medicine">
<span<?php echo $mas_user_template_prescription_view->Medicine->viewAttributes() ?>><?php echo $mas_user_template_prescription_view->Medicine->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_user_template_prescription_view->M->Visible) { // M ?>
	<tr id="r_M">
		<td class="<?php echo $mas_user_template_prescription_view->TableLeftColumnClass ?>"><span id="elh_mas_user_template_prescription_M"><?php echo $mas_user_template_prescription_view->M->caption() ?></span></td>
		<td data-name="M" <?php echo $mas_user_template_prescription_view->M->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_M">
<span<?php echo $mas_user_template_prescription_view->M->viewAttributes() ?>><?php echo $mas_user_template_prescription_view->M->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_user_template_prescription_view->A->Visible) { // A ?>
	<tr id="r_A">
		<td class="<?php echo $mas_user_template_prescription_view->TableLeftColumnClass ?>"><span id="elh_mas_user_template_prescription_A"><?php echo $mas_user_template_prescription_view->A->caption() ?></span></td>
		<td data-name="A" <?php echo $mas_user_template_prescription_view->A->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_A">
<span<?php echo $mas_user_template_prescription_view->A->viewAttributes() ?>><?php echo $mas_user_template_prescription_view->A->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_user_template_prescription_view->N->Visible) { // N ?>
	<tr id="r_N">
		<td class="<?php echo $mas_user_template_prescription_view->TableLeftColumnClass ?>"><span id="elh_mas_user_template_prescription_N"><?php echo $mas_user_template_prescription_view->N->caption() ?></span></td>
		<td data-name="N" <?php echo $mas_user_template_prescription_view->N->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_N">
<span<?php echo $mas_user_template_prescription_view->N->viewAttributes() ?>><?php echo $mas_user_template_prescription_view->N->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_user_template_prescription_view->NoOfDays->Visible) { // NoOfDays ?>
	<tr id="r_NoOfDays">
		<td class="<?php echo $mas_user_template_prescription_view->TableLeftColumnClass ?>"><span id="elh_mas_user_template_prescription_NoOfDays"><?php echo $mas_user_template_prescription_view->NoOfDays->caption() ?></span></td>
		<td data-name="NoOfDays" <?php echo $mas_user_template_prescription_view->NoOfDays->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_NoOfDays">
<span<?php echo $mas_user_template_prescription_view->NoOfDays->viewAttributes() ?>><?php echo $mas_user_template_prescription_view->NoOfDays->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_user_template_prescription_view->PreRoute->Visible) { // PreRoute ?>
	<tr id="r_PreRoute">
		<td class="<?php echo $mas_user_template_prescription_view->TableLeftColumnClass ?>"><span id="elh_mas_user_template_prescription_PreRoute"><?php echo $mas_user_template_prescription_view->PreRoute->caption() ?></span></td>
		<td data-name="PreRoute" <?php echo $mas_user_template_prescription_view->PreRoute->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_PreRoute">
<span<?php echo $mas_user_template_prescription_view->PreRoute->viewAttributes() ?>><?php echo $mas_user_template_prescription_view->PreRoute->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_user_template_prescription_view->TimeOfTaking->Visible) { // TimeOfTaking ?>
	<tr id="r_TimeOfTaking">
		<td class="<?php echo $mas_user_template_prescription_view->TableLeftColumnClass ?>"><span id="elh_mas_user_template_prescription_TimeOfTaking"><?php echo $mas_user_template_prescription_view->TimeOfTaking->caption() ?></span></td>
		<td data-name="TimeOfTaking" <?php echo $mas_user_template_prescription_view->TimeOfTaking->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_TimeOfTaking">
<span<?php echo $mas_user_template_prescription_view->TimeOfTaking->viewAttributes() ?>><?php echo $mas_user_template_prescription_view->TimeOfTaking->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_user_template_prescription_view->CreatedBy->Visible) { // CreatedBy ?>
	<tr id="r_CreatedBy">
		<td class="<?php echo $mas_user_template_prescription_view->TableLeftColumnClass ?>"><span id="elh_mas_user_template_prescription_CreatedBy"><?php echo $mas_user_template_prescription_view->CreatedBy->caption() ?></span></td>
		<td data-name="CreatedBy" <?php echo $mas_user_template_prescription_view->CreatedBy->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_CreatedBy">
<span<?php echo $mas_user_template_prescription_view->CreatedBy->viewAttributes() ?>><?php echo $mas_user_template_prescription_view->CreatedBy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_user_template_prescription_view->CreateDateTime->Visible) { // CreateDateTime ?>
	<tr id="r_CreateDateTime">
		<td class="<?php echo $mas_user_template_prescription_view->TableLeftColumnClass ?>"><span id="elh_mas_user_template_prescription_CreateDateTime"><?php echo $mas_user_template_prescription_view->CreateDateTime->caption() ?></span></td>
		<td data-name="CreateDateTime" <?php echo $mas_user_template_prescription_view->CreateDateTime->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_CreateDateTime">
<span<?php echo $mas_user_template_prescription_view->CreateDateTime->viewAttributes() ?>><?php echo $mas_user_template_prescription_view->CreateDateTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_user_template_prescription_view->ModifiedBy->Visible) { // ModifiedBy ?>
	<tr id="r_ModifiedBy">
		<td class="<?php echo $mas_user_template_prescription_view->TableLeftColumnClass ?>"><span id="elh_mas_user_template_prescription_ModifiedBy"><?php echo $mas_user_template_prescription_view->ModifiedBy->caption() ?></span></td>
		<td data-name="ModifiedBy" <?php echo $mas_user_template_prescription_view->ModifiedBy->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_ModifiedBy">
<span<?php echo $mas_user_template_prescription_view->ModifiedBy->viewAttributes() ?>><?php echo $mas_user_template_prescription_view->ModifiedBy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_user_template_prescription_view->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
	<tr id="r_ModifiedDateTime">
		<td class="<?php echo $mas_user_template_prescription_view->TableLeftColumnClass ?>"><span id="elh_mas_user_template_prescription_ModifiedDateTime"><?php echo $mas_user_template_prescription_view->ModifiedDateTime->caption() ?></span></td>
		<td data-name="ModifiedDateTime" <?php echo $mas_user_template_prescription_view->ModifiedDateTime->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_ModifiedDateTime">
<span<?php echo $mas_user_template_prescription_view->ModifiedDateTime->viewAttributes() ?>><?php echo $mas_user_template_prescription_view->ModifiedDateTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$mas_user_template_prescription_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$mas_user_template_prescription_view->isExport()) { ?>
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
$mas_user_template_prescription_view->terminate();
?>