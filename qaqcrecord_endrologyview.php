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
$qaqcrecord_endrology_view = new qaqcrecord_endrology_view();

// Run the page
$qaqcrecord_endrology_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$qaqcrecord_endrology_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$qaqcrecord_endrology->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fqaqcrecord_endrologyview = currentForm = new ew.Form("fqaqcrecord_endrologyview", "view");

// Form_CustomValidate event
fqaqcrecord_endrologyview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fqaqcrecord_endrologyview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fqaqcrecord_endrologyview.lists["x_LN2_Checked[]"] = <?php echo $qaqcrecord_endrology_view->LN2_Checked->Lookup->toClientList() ?>;
fqaqcrecord_endrologyview.lists["x_LN2_Checked[]"].options = <?php echo JsonEncode($qaqcrecord_endrology_view->LN2_Checked->options(FALSE, TRUE)) ?>;
fqaqcrecord_endrologyview.lists["x_Incubator_Cleaned[]"] = <?php echo $qaqcrecord_endrology_view->Incubator_Cleaned->Lookup->toClientList() ?>;
fqaqcrecord_endrologyview.lists["x_Incubator_Cleaned[]"].options = <?php echo JsonEncode($qaqcrecord_endrology_view->Incubator_Cleaned->options(FALSE, TRUE)) ?>;
fqaqcrecord_endrologyview.lists["x_LAF_Cleaned[]"] = <?php echo $qaqcrecord_endrology_view->LAF_Cleaned->Lookup->toClientList() ?>;
fqaqcrecord_endrologyview.lists["x_LAF_Cleaned[]"].options = <?php echo JsonEncode($qaqcrecord_endrology_view->LAF_Cleaned->options(FALSE, TRUE)) ?>;
fqaqcrecord_endrologyview.lists["x_REF_Cleaned[]"] = <?php echo $qaqcrecord_endrology_view->REF_Cleaned->Lookup->toClientList() ?>;
fqaqcrecord_endrologyview.lists["x_REF_Cleaned[]"].options = <?php echo JsonEncode($qaqcrecord_endrology_view->REF_Cleaned->options(FALSE, TRUE)) ?>;
fqaqcrecord_endrologyview.lists["x_Heating_Cleaned[]"] = <?php echo $qaqcrecord_endrology_view->Heating_Cleaned->Lookup->toClientList() ?>;
fqaqcrecord_endrologyview.lists["x_Heating_Cleaned[]"].options = <?php echo JsonEncode($qaqcrecord_endrology_view->Heating_Cleaned->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$qaqcrecord_endrology->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $qaqcrecord_endrology_view->ExportOptions->render("body") ?>
<?php $qaqcrecord_endrology_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $qaqcrecord_endrology_view->showPageHeader(); ?>
<?php
$qaqcrecord_endrology_view->showMessage();
?>
<form name="fqaqcrecord_endrologyview" id="fqaqcrecord_endrologyview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($qaqcrecord_endrology_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $qaqcrecord_endrology_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="qaqcrecord_endrology">
<input type="hidden" name="modal" value="<?php echo (int)$qaqcrecord_endrology_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($qaqcrecord_endrology->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $qaqcrecord_endrology_view->TableLeftColumnClass ?>"><span id="elh_qaqcrecord_endrology_id"><?php echo $qaqcrecord_endrology->id->caption() ?></span></td>
		<td data-name="id"<?php echo $qaqcrecord_endrology->id->cellAttributes() ?>>
<span id="el_qaqcrecord_endrology_id">
<span<?php echo $qaqcrecord_endrology->id->viewAttributes() ?>>
<?php echo $qaqcrecord_endrology->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($qaqcrecord_endrology->Date->Visible) { // Date ?>
	<tr id="r_Date">
		<td class="<?php echo $qaqcrecord_endrology_view->TableLeftColumnClass ?>"><span id="elh_qaqcrecord_endrology_Date"><?php echo $qaqcrecord_endrology->Date->caption() ?></span></td>
		<td data-name="Date"<?php echo $qaqcrecord_endrology->Date->cellAttributes() ?>>
<span id="el_qaqcrecord_endrology_Date">
<span<?php echo $qaqcrecord_endrology->Date->viewAttributes() ?>>
<?php echo $qaqcrecord_endrology->Date->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($qaqcrecord_endrology->LN2_Level->Visible) { // LN2_Level ?>
	<tr id="r_LN2_Level">
		<td class="<?php echo $qaqcrecord_endrology_view->TableLeftColumnClass ?>"><span id="elh_qaqcrecord_endrology_LN2_Level"><?php echo $qaqcrecord_endrology->LN2_Level->caption() ?></span></td>
		<td data-name="LN2_Level"<?php echo $qaqcrecord_endrology->LN2_Level->cellAttributes() ?>>
<span id="el_qaqcrecord_endrology_LN2_Level">
<span<?php echo $qaqcrecord_endrology->LN2_Level->viewAttributes() ?>>
<?php echo $qaqcrecord_endrology->LN2_Level->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($qaqcrecord_endrology->LN2_Checked->Visible) { // LN2_Checked ?>
	<tr id="r_LN2_Checked">
		<td class="<?php echo $qaqcrecord_endrology_view->TableLeftColumnClass ?>"><span id="elh_qaqcrecord_endrology_LN2_Checked"><?php echo $qaqcrecord_endrology->LN2_Checked->caption() ?></span></td>
		<td data-name="LN2_Checked"<?php echo $qaqcrecord_endrology->LN2_Checked->cellAttributes() ?>>
<span id="el_qaqcrecord_endrology_LN2_Checked">
<span<?php echo $qaqcrecord_endrology->LN2_Checked->viewAttributes() ?>>
<?php echo $qaqcrecord_endrology->LN2_Checked->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($qaqcrecord_endrology->Incubator_Temp->Visible) { // Incubator_Temp ?>
	<tr id="r_Incubator_Temp">
		<td class="<?php echo $qaqcrecord_endrology_view->TableLeftColumnClass ?>"><span id="elh_qaqcrecord_endrology_Incubator_Temp"><?php echo $qaqcrecord_endrology->Incubator_Temp->caption() ?></span></td>
		<td data-name="Incubator_Temp"<?php echo $qaqcrecord_endrology->Incubator_Temp->cellAttributes() ?>>
<span id="el_qaqcrecord_endrology_Incubator_Temp">
<span<?php echo $qaqcrecord_endrology->Incubator_Temp->viewAttributes() ?>>
<?php echo $qaqcrecord_endrology->Incubator_Temp->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($qaqcrecord_endrology->Incubator_Cleaned->Visible) { // Incubator_Cleaned ?>
	<tr id="r_Incubator_Cleaned">
		<td class="<?php echo $qaqcrecord_endrology_view->TableLeftColumnClass ?>"><span id="elh_qaqcrecord_endrology_Incubator_Cleaned"><?php echo $qaqcrecord_endrology->Incubator_Cleaned->caption() ?></span></td>
		<td data-name="Incubator_Cleaned"<?php echo $qaqcrecord_endrology->Incubator_Cleaned->cellAttributes() ?>>
<span id="el_qaqcrecord_endrology_Incubator_Cleaned">
<span<?php echo $qaqcrecord_endrology->Incubator_Cleaned->viewAttributes() ?>>
<?php echo $qaqcrecord_endrology->Incubator_Cleaned->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($qaqcrecord_endrology->LAF_MG->Visible) { // LAF_MG ?>
	<tr id="r_LAF_MG">
		<td class="<?php echo $qaqcrecord_endrology_view->TableLeftColumnClass ?>"><span id="elh_qaqcrecord_endrology_LAF_MG"><?php echo $qaqcrecord_endrology->LAF_MG->caption() ?></span></td>
		<td data-name="LAF_MG"<?php echo $qaqcrecord_endrology->LAF_MG->cellAttributes() ?>>
<span id="el_qaqcrecord_endrology_LAF_MG">
<span<?php echo $qaqcrecord_endrology->LAF_MG->viewAttributes() ?>>
<?php echo $qaqcrecord_endrology->LAF_MG->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($qaqcrecord_endrology->LAF_Cleaned->Visible) { // LAF_Cleaned ?>
	<tr id="r_LAF_Cleaned">
		<td class="<?php echo $qaqcrecord_endrology_view->TableLeftColumnClass ?>"><span id="elh_qaqcrecord_endrology_LAF_Cleaned"><?php echo $qaqcrecord_endrology->LAF_Cleaned->caption() ?></span></td>
		<td data-name="LAF_Cleaned"<?php echo $qaqcrecord_endrology->LAF_Cleaned->cellAttributes() ?>>
<span id="el_qaqcrecord_endrology_LAF_Cleaned">
<span<?php echo $qaqcrecord_endrology->LAF_Cleaned->viewAttributes() ?>>
<?php echo $qaqcrecord_endrology->LAF_Cleaned->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($qaqcrecord_endrology->REF_Temp->Visible) { // REF_Temp ?>
	<tr id="r_REF_Temp">
		<td class="<?php echo $qaqcrecord_endrology_view->TableLeftColumnClass ?>"><span id="elh_qaqcrecord_endrology_REF_Temp"><?php echo $qaqcrecord_endrology->REF_Temp->caption() ?></span></td>
		<td data-name="REF_Temp"<?php echo $qaqcrecord_endrology->REF_Temp->cellAttributes() ?>>
<span id="el_qaqcrecord_endrology_REF_Temp">
<span<?php echo $qaqcrecord_endrology->REF_Temp->viewAttributes() ?>>
<?php echo $qaqcrecord_endrology->REF_Temp->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($qaqcrecord_endrology->REF_Cleaned->Visible) { // REF_Cleaned ?>
	<tr id="r_REF_Cleaned">
		<td class="<?php echo $qaqcrecord_endrology_view->TableLeftColumnClass ?>"><span id="elh_qaqcrecord_endrology_REF_Cleaned"><?php echo $qaqcrecord_endrology->REF_Cleaned->caption() ?></span></td>
		<td data-name="REF_Cleaned"<?php echo $qaqcrecord_endrology->REF_Cleaned->cellAttributes() ?>>
<span id="el_qaqcrecord_endrology_REF_Cleaned">
<span<?php echo $qaqcrecord_endrology->REF_Cleaned->viewAttributes() ?>>
<?php echo $qaqcrecord_endrology->REF_Cleaned->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($qaqcrecord_endrology->Heating_Temp->Visible) { // Heating_Temp ?>
	<tr id="r_Heating_Temp">
		<td class="<?php echo $qaqcrecord_endrology_view->TableLeftColumnClass ?>"><span id="elh_qaqcrecord_endrology_Heating_Temp"><?php echo $qaqcrecord_endrology->Heating_Temp->caption() ?></span></td>
		<td data-name="Heating_Temp"<?php echo $qaqcrecord_endrology->Heating_Temp->cellAttributes() ?>>
<span id="el_qaqcrecord_endrology_Heating_Temp">
<span<?php echo $qaqcrecord_endrology->Heating_Temp->viewAttributes() ?>>
<?php echo $qaqcrecord_endrology->Heating_Temp->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($qaqcrecord_endrology->Heating_Cleaned->Visible) { // Heating_Cleaned ?>
	<tr id="r_Heating_Cleaned">
		<td class="<?php echo $qaqcrecord_endrology_view->TableLeftColumnClass ?>"><span id="elh_qaqcrecord_endrology_Heating_Cleaned"><?php echo $qaqcrecord_endrology->Heating_Cleaned->caption() ?></span></td>
		<td data-name="Heating_Cleaned"<?php echo $qaqcrecord_endrology->Heating_Cleaned->cellAttributes() ?>>
<span id="el_qaqcrecord_endrology_Heating_Cleaned">
<span<?php echo $qaqcrecord_endrology->Heating_Cleaned->viewAttributes() ?>>
<?php echo $qaqcrecord_endrology->Heating_Cleaned->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($qaqcrecord_endrology->Createdby->Visible) { // Createdby ?>
	<tr id="r_Createdby">
		<td class="<?php echo $qaqcrecord_endrology_view->TableLeftColumnClass ?>"><span id="elh_qaqcrecord_endrology_Createdby"><?php echo $qaqcrecord_endrology->Createdby->caption() ?></span></td>
		<td data-name="Createdby"<?php echo $qaqcrecord_endrology->Createdby->cellAttributes() ?>>
<span id="el_qaqcrecord_endrology_Createdby">
<span<?php echo $qaqcrecord_endrology->Createdby->viewAttributes() ?>>
<?php echo $qaqcrecord_endrology->Createdby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($qaqcrecord_endrology->CreatedDate->Visible) { // CreatedDate ?>
	<tr id="r_CreatedDate">
		<td class="<?php echo $qaqcrecord_endrology_view->TableLeftColumnClass ?>"><span id="elh_qaqcrecord_endrology_CreatedDate"><?php echo $qaqcrecord_endrology->CreatedDate->caption() ?></span></td>
		<td data-name="CreatedDate"<?php echo $qaqcrecord_endrology->CreatedDate->cellAttributes() ?>>
<span id="el_qaqcrecord_endrology_CreatedDate">
<span<?php echo $qaqcrecord_endrology->CreatedDate->viewAttributes() ?>>
<?php echo $qaqcrecord_endrology->CreatedDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$qaqcrecord_endrology_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$qaqcrecord_endrology->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$qaqcrecord_endrology_view->terminate();
?>