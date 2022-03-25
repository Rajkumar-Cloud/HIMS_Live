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
<?php include_once "header.php" ?>
<?php if (!$mas_user_template_prescription->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fmas_user_template_prescriptionview = currentForm = new ew.Form("fmas_user_template_prescriptionview", "view");

// Form_CustomValidate event
fmas_user_template_prescriptionview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fmas_user_template_prescriptionview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fmas_user_template_prescriptionview.lists["x_TemplateName"] = <?php echo $mas_user_template_prescription_view->TemplateName->Lookup->toClientList() ?>;
fmas_user_template_prescriptionview.lists["x_TemplateName"].options = <?php echo JsonEncode($mas_user_template_prescription_view->TemplateName->lookupOptions()) ?>;
fmas_user_template_prescriptionview.lists["x_Medicine"] = <?php echo $mas_user_template_prescription_view->Medicine->Lookup->toClientList() ?>;
fmas_user_template_prescriptionview.lists["x_Medicine"].options = <?php echo JsonEncode($mas_user_template_prescription_view->Medicine->lookupOptions()) ?>;
fmas_user_template_prescriptionview.autoSuggests["x_Medicine"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fmas_user_template_prescriptionview.lists["x_PreRoute"] = <?php echo $mas_user_template_prescription_view->PreRoute->Lookup->toClientList() ?>;
fmas_user_template_prescriptionview.lists["x_PreRoute"].options = <?php echo JsonEncode($mas_user_template_prescription_view->PreRoute->lookupOptions()) ?>;
fmas_user_template_prescriptionview.autoSuggests["x_PreRoute"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fmas_user_template_prescriptionview.lists["x_TimeOfTaking"] = <?php echo $mas_user_template_prescription_view->TimeOfTaking->Lookup->toClientList() ?>;
fmas_user_template_prescriptionview.lists["x_TimeOfTaking"].options = <?php echo JsonEncode($mas_user_template_prescription_view->TimeOfTaking->lookupOptions()) ?>;
fmas_user_template_prescriptionview.autoSuggests["x_TimeOfTaking"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$mas_user_template_prescription->isExport()) { ?>
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
<?php if ($mas_user_template_prescription_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $mas_user_template_prescription_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_user_template_prescription">
<input type="hidden" name="modal" value="<?php echo (int)$mas_user_template_prescription_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($mas_user_template_prescription->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $mas_user_template_prescription_view->TableLeftColumnClass ?>"><span id="elh_mas_user_template_prescription_id"><?php echo $mas_user_template_prescription->id->caption() ?></span></td>
		<td data-name="id"<?php echo $mas_user_template_prescription->id->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_id">
<span<?php echo $mas_user_template_prescription->id->viewAttributes() ?>>
<?php echo $mas_user_template_prescription->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_user_template_prescription->TemplateName->Visible) { // TemplateName ?>
	<tr id="r_TemplateName">
		<td class="<?php echo $mas_user_template_prescription_view->TableLeftColumnClass ?>"><span id="elh_mas_user_template_prescription_TemplateName"><?php echo $mas_user_template_prescription->TemplateName->caption() ?></span></td>
		<td data-name="TemplateName"<?php echo $mas_user_template_prescription->TemplateName->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_TemplateName">
<span<?php echo $mas_user_template_prescription->TemplateName->viewAttributes() ?>>
<?php echo $mas_user_template_prescription->TemplateName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_user_template_prescription->Medicine->Visible) { // Medicine ?>
	<tr id="r_Medicine">
		<td class="<?php echo $mas_user_template_prescription_view->TableLeftColumnClass ?>"><span id="elh_mas_user_template_prescription_Medicine"><?php echo $mas_user_template_prescription->Medicine->caption() ?></span></td>
		<td data-name="Medicine"<?php echo $mas_user_template_prescription->Medicine->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_Medicine">
<span<?php echo $mas_user_template_prescription->Medicine->viewAttributes() ?>>
<?php echo $mas_user_template_prescription->Medicine->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_user_template_prescription->M->Visible) { // M ?>
	<tr id="r_M">
		<td class="<?php echo $mas_user_template_prescription_view->TableLeftColumnClass ?>"><span id="elh_mas_user_template_prescription_M"><?php echo $mas_user_template_prescription->M->caption() ?></span></td>
		<td data-name="M"<?php echo $mas_user_template_prescription->M->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_M">
<span<?php echo $mas_user_template_prescription->M->viewAttributes() ?>>
<?php echo $mas_user_template_prescription->M->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_user_template_prescription->A->Visible) { // A ?>
	<tr id="r_A">
		<td class="<?php echo $mas_user_template_prescription_view->TableLeftColumnClass ?>"><span id="elh_mas_user_template_prescription_A"><?php echo $mas_user_template_prescription->A->caption() ?></span></td>
		<td data-name="A"<?php echo $mas_user_template_prescription->A->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_A">
<span<?php echo $mas_user_template_prescription->A->viewAttributes() ?>>
<?php echo $mas_user_template_prescription->A->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_user_template_prescription->N->Visible) { // N ?>
	<tr id="r_N">
		<td class="<?php echo $mas_user_template_prescription_view->TableLeftColumnClass ?>"><span id="elh_mas_user_template_prescription_N"><?php echo $mas_user_template_prescription->N->caption() ?></span></td>
		<td data-name="N"<?php echo $mas_user_template_prescription->N->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_N">
<span<?php echo $mas_user_template_prescription->N->viewAttributes() ?>>
<?php echo $mas_user_template_prescription->N->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_user_template_prescription->NoOfDays->Visible) { // NoOfDays ?>
	<tr id="r_NoOfDays">
		<td class="<?php echo $mas_user_template_prescription_view->TableLeftColumnClass ?>"><span id="elh_mas_user_template_prescription_NoOfDays"><?php echo $mas_user_template_prescription->NoOfDays->caption() ?></span></td>
		<td data-name="NoOfDays"<?php echo $mas_user_template_prescription->NoOfDays->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_NoOfDays">
<span<?php echo $mas_user_template_prescription->NoOfDays->viewAttributes() ?>>
<?php echo $mas_user_template_prescription->NoOfDays->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_user_template_prescription->PreRoute->Visible) { // PreRoute ?>
	<tr id="r_PreRoute">
		<td class="<?php echo $mas_user_template_prescription_view->TableLeftColumnClass ?>"><span id="elh_mas_user_template_prescription_PreRoute"><?php echo $mas_user_template_prescription->PreRoute->caption() ?></span></td>
		<td data-name="PreRoute"<?php echo $mas_user_template_prescription->PreRoute->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_PreRoute">
<span<?php echo $mas_user_template_prescription->PreRoute->viewAttributes() ?>>
<?php echo $mas_user_template_prescription->PreRoute->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_user_template_prescription->TimeOfTaking->Visible) { // TimeOfTaking ?>
	<tr id="r_TimeOfTaking">
		<td class="<?php echo $mas_user_template_prescription_view->TableLeftColumnClass ?>"><span id="elh_mas_user_template_prescription_TimeOfTaking"><?php echo $mas_user_template_prescription->TimeOfTaking->caption() ?></span></td>
		<td data-name="TimeOfTaking"<?php echo $mas_user_template_prescription->TimeOfTaking->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_TimeOfTaking">
<span<?php echo $mas_user_template_prescription->TimeOfTaking->viewAttributes() ?>>
<?php echo $mas_user_template_prescription->TimeOfTaking->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_user_template_prescription->CreatedBy->Visible) { // CreatedBy ?>
	<tr id="r_CreatedBy">
		<td class="<?php echo $mas_user_template_prescription_view->TableLeftColumnClass ?>"><span id="elh_mas_user_template_prescription_CreatedBy"><?php echo $mas_user_template_prescription->CreatedBy->caption() ?></span></td>
		<td data-name="CreatedBy"<?php echo $mas_user_template_prescription->CreatedBy->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_CreatedBy">
<span<?php echo $mas_user_template_prescription->CreatedBy->viewAttributes() ?>>
<?php echo $mas_user_template_prescription->CreatedBy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_user_template_prescription->CreateDateTime->Visible) { // CreateDateTime ?>
	<tr id="r_CreateDateTime">
		<td class="<?php echo $mas_user_template_prescription_view->TableLeftColumnClass ?>"><span id="elh_mas_user_template_prescription_CreateDateTime"><?php echo $mas_user_template_prescription->CreateDateTime->caption() ?></span></td>
		<td data-name="CreateDateTime"<?php echo $mas_user_template_prescription->CreateDateTime->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_CreateDateTime">
<span<?php echo $mas_user_template_prescription->CreateDateTime->viewAttributes() ?>>
<?php echo $mas_user_template_prescription->CreateDateTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_user_template_prescription->ModifiedBy->Visible) { // ModifiedBy ?>
	<tr id="r_ModifiedBy">
		<td class="<?php echo $mas_user_template_prescription_view->TableLeftColumnClass ?>"><span id="elh_mas_user_template_prescription_ModifiedBy"><?php echo $mas_user_template_prescription->ModifiedBy->caption() ?></span></td>
		<td data-name="ModifiedBy"<?php echo $mas_user_template_prescription->ModifiedBy->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_ModifiedBy">
<span<?php echo $mas_user_template_prescription->ModifiedBy->viewAttributes() ?>>
<?php echo $mas_user_template_prescription->ModifiedBy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_user_template_prescription->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
	<tr id="r_ModifiedDateTime">
		<td class="<?php echo $mas_user_template_prescription_view->TableLeftColumnClass ?>"><span id="elh_mas_user_template_prescription_ModifiedDateTime"><?php echo $mas_user_template_prescription->ModifiedDateTime->caption() ?></span></td>
		<td data-name="ModifiedDateTime"<?php echo $mas_user_template_prescription->ModifiedDateTime->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_ModifiedDateTime">
<span<?php echo $mas_user_template_prescription->ModifiedDateTime->viewAttributes() ?>>
<?php echo $mas_user_template_prescription->ModifiedDateTime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$mas_user_template_prescription_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$mas_user_template_prescription->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$mas_user_template_prescription_view->terminate();
?>