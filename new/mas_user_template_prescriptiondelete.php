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
$mas_user_template_prescription_delete = new mas_user_template_prescription_delete();

// Run the page
$mas_user_template_prescription_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_user_template_prescription_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fmas_user_template_prescriptiondelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fmas_user_template_prescriptiondelete = currentForm = new ew.Form("fmas_user_template_prescriptiondelete", "delete");
	loadjs.done("fmas_user_template_prescriptiondelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $mas_user_template_prescription_delete->showPageHeader(); ?>
<?php
$mas_user_template_prescription_delete->showMessage();
?>
<form name="fmas_user_template_prescriptiondelete" id="fmas_user_template_prescriptiondelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_user_template_prescription">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($mas_user_template_prescription_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($mas_user_template_prescription_delete->id->Visible) { // id ?>
		<th class="<?php echo $mas_user_template_prescription_delete->id->headerCellClass() ?>"><span id="elh_mas_user_template_prescription_id" class="mas_user_template_prescription_id"><?php echo $mas_user_template_prescription_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($mas_user_template_prescription_delete->TemplateName->Visible) { // TemplateName ?>
		<th class="<?php echo $mas_user_template_prescription_delete->TemplateName->headerCellClass() ?>"><span id="elh_mas_user_template_prescription_TemplateName" class="mas_user_template_prescription_TemplateName"><?php echo $mas_user_template_prescription_delete->TemplateName->caption() ?></span></th>
<?php } ?>
<?php if ($mas_user_template_prescription_delete->Medicine->Visible) { // Medicine ?>
		<th class="<?php echo $mas_user_template_prescription_delete->Medicine->headerCellClass() ?>"><span id="elh_mas_user_template_prescription_Medicine" class="mas_user_template_prescription_Medicine"><?php echo $mas_user_template_prescription_delete->Medicine->caption() ?></span></th>
<?php } ?>
<?php if ($mas_user_template_prescription_delete->M->Visible) { // M ?>
		<th class="<?php echo $mas_user_template_prescription_delete->M->headerCellClass() ?>"><span id="elh_mas_user_template_prescription_M" class="mas_user_template_prescription_M"><?php echo $mas_user_template_prescription_delete->M->caption() ?></span></th>
<?php } ?>
<?php if ($mas_user_template_prescription_delete->A->Visible) { // A ?>
		<th class="<?php echo $mas_user_template_prescription_delete->A->headerCellClass() ?>"><span id="elh_mas_user_template_prescription_A" class="mas_user_template_prescription_A"><?php echo $mas_user_template_prescription_delete->A->caption() ?></span></th>
<?php } ?>
<?php if ($mas_user_template_prescription_delete->N->Visible) { // N ?>
		<th class="<?php echo $mas_user_template_prescription_delete->N->headerCellClass() ?>"><span id="elh_mas_user_template_prescription_N" class="mas_user_template_prescription_N"><?php echo $mas_user_template_prescription_delete->N->caption() ?></span></th>
<?php } ?>
<?php if ($mas_user_template_prescription_delete->NoOfDays->Visible) { // NoOfDays ?>
		<th class="<?php echo $mas_user_template_prescription_delete->NoOfDays->headerCellClass() ?>"><span id="elh_mas_user_template_prescription_NoOfDays" class="mas_user_template_prescription_NoOfDays"><?php echo $mas_user_template_prescription_delete->NoOfDays->caption() ?></span></th>
<?php } ?>
<?php if ($mas_user_template_prescription_delete->PreRoute->Visible) { // PreRoute ?>
		<th class="<?php echo $mas_user_template_prescription_delete->PreRoute->headerCellClass() ?>"><span id="elh_mas_user_template_prescription_PreRoute" class="mas_user_template_prescription_PreRoute"><?php echo $mas_user_template_prescription_delete->PreRoute->caption() ?></span></th>
<?php } ?>
<?php if ($mas_user_template_prescription_delete->TimeOfTaking->Visible) { // TimeOfTaking ?>
		<th class="<?php echo $mas_user_template_prescription_delete->TimeOfTaking->headerCellClass() ?>"><span id="elh_mas_user_template_prescription_TimeOfTaking" class="mas_user_template_prescription_TimeOfTaking"><?php echo $mas_user_template_prescription_delete->TimeOfTaking->caption() ?></span></th>
<?php } ?>
<?php if ($mas_user_template_prescription_delete->CreatedBy->Visible) { // CreatedBy ?>
		<th class="<?php echo $mas_user_template_prescription_delete->CreatedBy->headerCellClass() ?>"><span id="elh_mas_user_template_prescription_CreatedBy" class="mas_user_template_prescription_CreatedBy"><?php echo $mas_user_template_prescription_delete->CreatedBy->caption() ?></span></th>
<?php } ?>
<?php if ($mas_user_template_prescription_delete->CreateDateTime->Visible) { // CreateDateTime ?>
		<th class="<?php echo $mas_user_template_prescription_delete->CreateDateTime->headerCellClass() ?>"><span id="elh_mas_user_template_prescription_CreateDateTime" class="mas_user_template_prescription_CreateDateTime"><?php echo $mas_user_template_prescription_delete->CreateDateTime->caption() ?></span></th>
<?php } ?>
<?php if ($mas_user_template_prescription_delete->ModifiedBy->Visible) { // ModifiedBy ?>
		<th class="<?php echo $mas_user_template_prescription_delete->ModifiedBy->headerCellClass() ?>"><span id="elh_mas_user_template_prescription_ModifiedBy" class="mas_user_template_prescription_ModifiedBy"><?php echo $mas_user_template_prescription_delete->ModifiedBy->caption() ?></span></th>
<?php } ?>
<?php if ($mas_user_template_prescription_delete->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
		<th class="<?php echo $mas_user_template_prescription_delete->ModifiedDateTime->headerCellClass() ?>"><span id="elh_mas_user_template_prescription_ModifiedDateTime" class="mas_user_template_prescription_ModifiedDateTime"><?php echo $mas_user_template_prescription_delete->ModifiedDateTime->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$mas_user_template_prescription_delete->RecordCount = 0;
$i = 0;
while (!$mas_user_template_prescription_delete->Recordset->EOF) {
	$mas_user_template_prescription_delete->RecordCount++;
	$mas_user_template_prescription_delete->RowCount++;

	// Set row properties
	$mas_user_template_prescription->resetAttributes();
	$mas_user_template_prescription->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$mas_user_template_prescription_delete->loadRowValues($mas_user_template_prescription_delete->Recordset);

	// Render row
	$mas_user_template_prescription_delete->renderRow();
?>
	<tr <?php echo $mas_user_template_prescription->rowAttributes() ?>>
<?php if ($mas_user_template_prescription_delete->id->Visible) { // id ?>
		<td <?php echo $mas_user_template_prescription_delete->id->cellAttributes() ?>>
<span id="el<?php echo $mas_user_template_prescription_delete->RowCount ?>_mas_user_template_prescription_id" class="mas_user_template_prescription_id">
<span<?php echo $mas_user_template_prescription_delete->id->viewAttributes() ?>><?php echo $mas_user_template_prescription_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_user_template_prescription_delete->TemplateName->Visible) { // TemplateName ?>
		<td <?php echo $mas_user_template_prescription_delete->TemplateName->cellAttributes() ?>>
<span id="el<?php echo $mas_user_template_prescription_delete->RowCount ?>_mas_user_template_prescription_TemplateName" class="mas_user_template_prescription_TemplateName">
<span<?php echo $mas_user_template_prescription_delete->TemplateName->viewAttributes() ?>><?php echo $mas_user_template_prescription_delete->TemplateName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_user_template_prescription_delete->Medicine->Visible) { // Medicine ?>
		<td <?php echo $mas_user_template_prescription_delete->Medicine->cellAttributes() ?>>
<span id="el<?php echo $mas_user_template_prescription_delete->RowCount ?>_mas_user_template_prescription_Medicine" class="mas_user_template_prescription_Medicine">
<span<?php echo $mas_user_template_prescription_delete->Medicine->viewAttributes() ?>><?php echo $mas_user_template_prescription_delete->Medicine->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_user_template_prescription_delete->M->Visible) { // M ?>
		<td <?php echo $mas_user_template_prescription_delete->M->cellAttributes() ?>>
<span id="el<?php echo $mas_user_template_prescription_delete->RowCount ?>_mas_user_template_prescription_M" class="mas_user_template_prescription_M">
<span<?php echo $mas_user_template_prescription_delete->M->viewAttributes() ?>><?php echo $mas_user_template_prescription_delete->M->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_user_template_prescription_delete->A->Visible) { // A ?>
		<td <?php echo $mas_user_template_prescription_delete->A->cellAttributes() ?>>
<span id="el<?php echo $mas_user_template_prescription_delete->RowCount ?>_mas_user_template_prescription_A" class="mas_user_template_prescription_A">
<span<?php echo $mas_user_template_prescription_delete->A->viewAttributes() ?>><?php echo $mas_user_template_prescription_delete->A->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_user_template_prescription_delete->N->Visible) { // N ?>
		<td <?php echo $mas_user_template_prescription_delete->N->cellAttributes() ?>>
<span id="el<?php echo $mas_user_template_prescription_delete->RowCount ?>_mas_user_template_prescription_N" class="mas_user_template_prescription_N">
<span<?php echo $mas_user_template_prescription_delete->N->viewAttributes() ?>><?php echo $mas_user_template_prescription_delete->N->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_user_template_prescription_delete->NoOfDays->Visible) { // NoOfDays ?>
		<td <?php echo $mas_user_template_prescription_delete->NoOfDays->cellAttributes() ?>>
<span id="el<?php echo $mas_user_template_prescription_delete->RowCount ?>_mas_user_template_prescription_NoOfDays" class="mas_user_template_prescription_NoOfDays">
<span<?php echo $mas_user_template_prescription_delete->NoOfDays->viewAttributes() ?>><?php echo $mas_user_template_prescription_delete->NoOfDays->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_user_template_prescription_delete->PreRoute->Visible) { // PreRoute ?>
		<td <?php echo $mas_user_template_prescription_delete->PreRoute->cellAttributes() ?>>
<span id="el<?php echo $mas_user_template_prescription_delete->RowCount ?>_mas_user_template_prescription_PreRoute" class="mas_user_template_prescription_PreRoute">
<span<?php echo $mas_user_template_prescription_delete->PreRoute->viewAttributes() ?>><?php echo $mas_user_template_prescription_delete->PreRoute->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_user_template_prescription_delete->TimeOfTaking->Visible) { // TimeOfTaking ?>
		<td <?php echo $mas_user_template_prescription_delete->TimeOfTaking->cellAttributes() ?>>
<span id="el<?php echo $mas_user_template_prescription_delete->RowCount ?>_mas_user_template_prescription_TimeOfTaking" class="mas_user_template_prescription_TimeOfTaking">
<span<?php echo $mas_user_template_prescription_delete->TimeOfTaking->viewAttributes() ?>><?php echo $mas_user_template_prescription_delete->TimeOfTaking->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_user_template_prescription_delete->CreatedBy->Visible) { // CreatedBy ?>
		<td <?php echo $mas_user_template_prescription_delete->CreatedBy->cellAttributes() ?>>
<span id="el<?php echo $mas_user_template_prescription_delete->RowCount ?>_mas_user_template_prescription_CreatedBy" class="mas_user_template_prescription_CreatedBy">
<span<?php echo $mas_user_template_prescription_delete->CreatedBy->viewAttributes() ?>><?php echo $mas_user_template_prescription_delete->CreatedBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_user_template_prescription_delete->CreateDateTime->Visible) { // CreateDateTime ?>
		<td <?php echo $mas_user_template_prescription_delete->CreateDateTime->cellAttributes() ?>>
<span id="el<?php echo $mas_user_template_prescription_delete->RowCount ?>_mas_user_template_prescription_CreateDateTime" class="mas_user_template_prescription_CreateDateTime">
<span<?php echo $mas_user_template_prescription_delete->CreateDateTime->viewAttributes() ?>><?php echo $mas_user_template_prescription_delete->CreateDateTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_user_template_prescription_delete->ModifiedBy->Visible) { // ModifiedBy ?>
		<td <?php echo $mas_user_template_prescription_delete->ModifiedBy->cellAttributes() ?>>
<span id="el<?php echo $mas_user_template_prescription_delete->RowCount ?>_mas_user_template_prescription_ModifiedBy" class="mas_user_template_prescription_ModifiedBy">
<span<?php echo $mas_user_template_prescription_delete->ModifiedBy->viewAttributes() ?>><?php echo $mas_user_template_prescription_delete->ModifiedBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_user_template_prescription_delete->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
		<td <?php echo $mas_user_template_prescription_delete->ModifiedDateTime->cellAttributes() ?>>
<span id="el<?php echo $mas_user_template_prescription_delete->RowCount ?>_mas_user_template_prescription_ModifiedDateTime" class="mas_user_template_prescription_ModifiedDateTime">
<span<?php echo $mas_user_template_prescription_delete->ModifiedDateTime->viewAttributes() ?>><?php echo $mas_user_template_prescription_delete->ModifiedDateTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$mas_user_template_prescription_delete->Recordset->moveNext();
}
$mas_user_template_prescription_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $mas_user_template_prescription_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$mas_user_template_prescription_delete->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php include_once "footer.php"; ?>
<?php
$mas_user_template_prescription_delete->terminate();
?>