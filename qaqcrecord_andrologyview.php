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
$qaqcrecord_andrology_view = new qaqcrecord_andrology_view();

// Run the page
$qaqcrecord_andrology_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$qaqcrecord_andrology_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$qaqcrecord_andrology->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fqaqcrecord_andrologyview = currentForm = new ew.Form("fqaqcrecord_andrologyview", "view");

// Form_CustomValidate event
fqaqcrecord_andrologyview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fqaqcrecord_andrologyview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fqaqcrecord_andrologyview.lists["x_LN2_Checked[]"] = <?php echo $qaqcrecord_andrology_view->LN2_Checked->Lookup->toClientList() ?>;
fqaqcrecord_andrologyview.lists["x_LN2_Checked[]"].options = <?php echo JsonEncode($qaqcrecord_andrology_view->LN2_Checked->options(FALSE, TRUE)) ?>;
fqaqcrecord_andrologyview.lists["x_Incubator_Cleaned[]"] = <?php echo $qaqcrecord_andrology_view->Incubator_Cleaned->Lookup->toClientList() ?>;
fqaqcrecord_andrologyview.lists["x_Incubator_Cleaned[]"].options = <?php echo JsonEncode($qaqcrecord_andrology_view->Incubator_Cleaned->options(FALSE, TRUE)) ?>;
fqaqcrecord_andrologyview.lists["x_LAF_Cleaned[]"] = <?php echo $qaqcrecord_andrology_view->LAF_Cleaned->Lookup->toClientList() ?>;
fqaqcrecord_andrologyview.lists["x_LAF_Cleaned[]"].options = <?php echo JsonEncode($qaqcrecord_andrology_view->LAF_Cleaned->options(FALSE, TRUE)) ?>;
fqaqcrecord_andrologyview.lists["x_REF_Cleaned[]"] = <?php echo $qaqcrecord_andrology_view->REF_Cleaned->Lookup->toClientList() ?>;
fqaqcrecord_andrologyview.lists["x_REF_Cleaned[]"].options = <?php echo JsonEncode($qaqcrecord_andrology_view->REF_Cleaned->options(FALSE, TRUE)) ?>;
fqaqcrecord_andrologyview.lists["x_Heating_Cleaned[]"] = <?php echo $qaqcrecord_andrology_view->Heating_Cleaned->Lookup->toClientList() ?>;
fqaqcrecord_andrologyview.lists["x_Heating_Cleaned[]"].options = <?php echo JsonEncode($qaqcrecord_andrology_view->Heating_Cleaned->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$qaqcrecord_andrology->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $qaqcrecord_andrology_view->ExportOptions->render("body") ?>
<?php $qaqcrecord_andrology_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $qaqcrecord_andrology_view->showPageHeader(); ?>
<?php
$qaqcrecord_andrology_view->showMessage();
?>
<form name="fqaqcrecord_andrologyview" id="fqaqcrecord_andrologyview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($qaqcrecord_andrology_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $qaqcrecord_andrology_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="qaqcrecord_andrology">
<input type="hidden" name="modal" value="<?php echo (int)$qaqcrecord_andrology_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($qaqcrecord_andrology->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $qaqcrecord_andrology_view->TableLeftColumnClass ?>"><span id="elh_qaqcrecord_andrology_id"><?php echo $qaqcrecord_andrology->id->caption() ?></span></td>
		<td data-name="id"<?php echo $qaqcrecord_andrology->id->cellAttributes() ?>>
<span id="el_qaqcrecord_andrology_id">
<span<?php echo $qaqcrecord_andrology->id->viewAttributes() ?>>
<?php echo $qaqcrecord_andrology->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($qaqcrecord_andrology->Date->Visible) { // Date ?>
	<tr id="r_Date">
		<td class="<?php echo $qaqcrecord_andrology_view->TableLeftColumnClass ?>"><span id="elh_qaqcrecord_andrology_Date"><?php echo $qaqcrecord_andrology->Date->caption() ?></span></td>
		<td data-name="Date"<?php echo $qaqcrecord_andrology->Date->cellAttributes() ?>>
<span id="el_qaqcrecord_andrology_Date">
<span<?php echo $qaqcrecord_andrology->Date->viewAttributes() ?>>
<?php echo $qaqcrecord_andrology->Date->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($qaqcrecord_andrology->LN2_Level->Visible) { // LN2_Level ?>
	<tr id="r_LN2_Level">
		<td class="<?php echo $qaqcrecord_andrology_view->TableLeftColumnClass ?>"><span id="elh_qaqcrecord_andrology_LN2_Level"><?php echo $qaqcrecord_andrology->LN2_Level->caption() ?></span></td>
		<td data-name="LN2_Level"<?php echo $qaqcrecord_andrology->LN2_Level->cellAttributes() ?>>
<span id="el_qaqcrecord_andrology_LN2_Level">
<span<?php echo $qaqcrecord_andrology->LN2_Level->viewAttributes() ?>>
<?php echo $qaqcrecord_andrology->LN2_Level->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($qaqcrecord_andrology->LN2_Checked->Visible) { // LN2_Checked ?>
	<tr id="r_LN2_Checked">
		<td class="<?php echo $qaqcrecord_andrology_view->TableLeftColumnClass ?>"><span id="elh_qaqcrecord_andrology_LN2_Checked"><?php echo $qaqcrecord_andrology->LN2_Checked->caption() ?></span></td>
		<td data-name="LN2_Checked"<?php echo $qaqcrecord_andrology->LN2_Checked->cellAttributes() ?>>
<span id="el_qaqcrecord_andrology_LN2_Checked">
<span<?php echo $qaqcrecord_andrology->LN2_Checked->viewAttributes() ?>>
<?php echo $qaqcrecord_andrology->LN2_Checked->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($qaqcrecord_andrology->Incubator_Temp->Visible) { // Incubator_Temp ?>
	<tr id="r_Incubator_Temp">
		<td class="<?php echo $qaqcrecord_andrology_view->TableLeftColumnClass ?>"><span id="elh_qaqcrecord_andrology_Incubator_Temp"><?php echo $qaqcrecord_andrology->Incubator_Temp->caption() ?></span></td>
		<td data-name="Incubator_Temp"<?php echo $qaqcrecord_andrology->Incubator_Temp->cellAttributes() ?>>
<span id="el_qaqcrecord_andrology_Incubator_Temp">
<span<?php echo $qaqcrecord_andrology->Incubator_Temp->viewAttributes() ?>>
<?php echo $qaqcrecord_andrology->Incubator_Temp->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($qaqcrecord_andrology->Incubator_Cleaned->Visible) { // Incubator_Cleaned ?>
	<tr id="r_Incubator_Cleaned">
		<td class="<?php echo $qaqcrecord_andrology_view->TableLeftColumnClass ?>"><span id="elh_qaqcrecord_andrology_Incubator_Cleaned"><?php echo $qaqcrecord_andrology->Incubator_Cleaned->caption() ?></span></td>
		<td data-name="Incubator_Cleaned"<?php echo $qaqcrecord_andrology->Incubator_Cleaned->cellAttributes() ?>>
<span id="el_qaqcrecord_andrology_Incubator_Cleaned">
<span<?php echo $qaqcrecord_andrology->Incubator_Cleaned->viewAttributes() ?>>
<?php echo $qaqcrecord_andrology->Incubator_Cleaned->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($qaqcrecord_andrology->LAF_MG->Visible) { // LAF_MG ?>
	<tr id="r_LAF_MG">
		<td class="<?php echo $qaqcrecord_andrology_view->TableLeftColumnClass ?>"><span id="elh_qaqcrecord_andrology_LAF_MG"><?php echo $qaqcrecord_andrology->LAF_MG->caption() ?></span></td>
		<td data-name="LAF_MG"<?php echo $qaqcrecord_andrology->LAF_MG->cellAttributes() ?>>
<span id="el_qaqcrecord_andrology_LAF_MG">
<span<?php echo $qaqcrecord_andrology->LAF_MG->viewAttributes() ?>>
<?php echo $qaqcrecord_andrology->LAF_MG->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($qaqcrecord_andrology->LAF_Cleaned->Visible) { // LAF_Cleaned ?>
	<tr id="r_LAF_Cleaned">
		<td class="<?php echo $qaqcrecord_andrology_view->TableLeftColumnClass ?>"><span id="elh_qaqcrecord_andrology_LAF_Cleaned"><?php echo $qaqcrecord_andrology->LAF_Cleaned->caption() ?></span></td>
		<td data-name="LAF_Cleaned"<?php echo $qaqcrecord_andrology->LAF_Cleaned->cellAttributes() ?>>
<span id="el_qaqcrecord_andrology_LAF_Cleaned">
<span<?php echo $qaqcrecord_andrology->LAF_Cleaned->viewAttributes() ?>>
<?php echo $qaqcrecord_andrology->LAF_Cleaned->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($qaqcrecord_andrology->REF_Temp->Visible) { // REF_Temp ?>
	<tr id="r_REF_Temp">
		<td class="<?php echo $qaqcrecord_andrology_view->TableLeftColumnClass ?>"><span id="elh_qaqcrecord_andrology_REF_Temp"><?php echo $qaqcrecord_andrology->REF_Temp->caption() ?></span></td>
		<td data-name="REF_Temp"<?php echo $qaqcrecord_andrology->REF_Temp->cellAttributes() ?>>
<span id="el_qaqcrecord_andrology_REF_Temp">
<span<?php echo $qaqcrecord_andrology->REF_Temp->viewAttributes() ?>>
<?php echo $qaqcrecord_andrology->REF_Temp->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($qaqcrecord_andrology->REF_Cleaned->Visible) { // REF_Cleaned ?>
	<tr id="r_REF_Cleaned">
		<td class="<?php echo $qaqcrecord_andrology_view->TableLeftColumnClass ?>"><span id="elh_qaqcrecord_andrology_REF_Cleaned"><?php echo $qaqcrecord_andrology->REF_Cleaned->caption() ?></span></td>
		<td data-name="REF_Cleaned"<?php echo $qaqcrecord_andrology->REF_Cleaned->cellAttributes() ?>>
<span id="el_qaqcrecord_andrology_REF_Cleaned">
<span<?php echo $qaqcrecord_andrology->REF_Cleaned->viewAttributes() ?>>
<?php echo $qaqcrecord_andrology->REF_Cleaned->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($qaqcrecord_andrology->Heating_Temp->Visible) { // Heating_Temp ?>
	<tr id="r_Heating_Temp">
		<td class="<?php echo $qaqcrecord_andrology_view->TableLeftColumnClass ?>"><span id="elh_qaqcrecord_andrology_Heating_Temp"><?php echo $qaqcrecord_andrology->Heating_Temp->caption() ?></span></td>
		<td data-name="Heating_Temp"<?php echo $qaqcrecord_andrology->Heating_Temp->cellAttributes() ?>>
<span id="el_qaqcrecord_andrology_Heating_Temp">
<span<?php echo $qaqcrecord_andrology->Heating_Temp->viewAttributes() ?>>
<?php echo $qaqcrecord_andrology->Heating_Temp->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($qaqcrecord_andrology->Heating_Cleaned->Visible) { // Heating_Cleaned ?>
	<tr id="r_Heating_Cleaned">
		<td class="<?php echo $qaqcrecord_andrology_view->TableLeftColumnClass ?>"><span id="elh_qaqcrecord_andrology_Heating_Cleaned"><?php echo $qaqcrecord_andrology->Heating_Cleaned->caption() ?></span></td>
		<td data-name="Heating_Cleaned"<?php echo $qaqcrecord_andrology->Heating_Cleaned->cellAttributes() ?>>
<span id="el_qaqcrecord_andrology_Heating_Cleaned">
<span<?php echo $qaqcrecord_andrology->Heating_Cleaned->viewAttributes() ?>>
<?php echo $qaqcrecord_andrology->Heating_Cleaned->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($qaqcrecord_andrology->Createdby->Visible) { // Createdby ?>
	<tr id="r_Createdby">
		<td class="<?php echo $qaqcrecord_andrology_view->TableLeftColumnClass ?>"><span id="elh_qaqcrecord_andrology_Createdby"><?php echo $qaqcrecord_andrology->Createdby->caption() ?></span></td>
		<td data-name="Createdby"<?php echo $qaqcrecord_andrology->Createdby->cellAttributes() ?>>
<span id="el_qaqcrecord_andrology_Createdby">
<span<?php echo $qaqcrecord_andrology->Createdby->viewAttributes() ?>>
<?php echo $qaqcrecord_andrology->Createdby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($qaqcrecord_andrology->CreatedDate->Visible) { // CreatedDate ?>
	<tr id="r_CreatedDate">
		<td class="<?php echo $qaqcrecord_andrology_view->TableLeftColumnClass ?>"><span id="elh_qaqcrecord_andrology_CreatedDate"><?php echo $qaqcrecord_andrology->CreatedDate->caption() ?></span></td>
		<td data-name="CreatedDate"<?php echo $qaqcrecord_andrology->CreatedDate->cellAttributes() ?>>
<span id="el_qaqcrecord_andrology_CreatedDate">
<span<?php echo $qaqcrecord_andrology->CreatedDate->viewAttributes() ?>>
<?php echo $qaqcrecord_andrology->CreatedDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$qaqcrecord_andrology_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$qaqcrecord_andrology->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$qaqcrecord_andrology_view->terminate();
?>