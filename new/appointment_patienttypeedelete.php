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
$appointment_patienttypee_delete = new appointment_patienttypee_delete();

// Run the page
$appointment_patienttypee_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$appointment_patienttypee_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fappointment_patienttypeedelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fappointment_patienttypeedelete = currentForm = new ew.Form("fappointment_patienttypeedelete", "delete");
	loadjs.done("fappointment_patienttypeedelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $appointment_patienttypee_delete->showPageHeader(); ?>
<?php
$appointment_patienttypee_delete->showMessage();
?>
<form name="fappointment_patienttypeedelete" id="fappointment_patienttypeedelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="appointment_patienttypee">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($appointment_patienttypee_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($appointment_patienttypee_delete->id->Visible) { // id ?>
		<th class="<?php echo $appointment_patienttypee_delete->id->headerCellClass() ?>"><span id="elh_appointment_patienttypee_id" class="appointment_patienttypee_id"><?php echo $appointment_patienttypee_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($appointment_patienttypee_delete->Name->Visible) { // Name ?>
		<th class="<?php echo $appointment_patienttypee_delete->Name->headerCellClass() ?>"><span id="elh_appointment_patienttypee_Name" class="appointment_patienttypee_Name"><?php echo $appointment_patienttypee_delete->Name->caption() ?></span></th>
<?php } ?>
<?php if ($appointment_patienttypee_delete->Type->Visible) { // Type ?>
		<th class="<?php echo $appointment_patienttypee_delete->Type->headerCellClass() ?>"><span id="elh_appointment_patienttypee_Type" class="appointment_patienttypee_Type"><?php echo $appointment_patienttypee_delete->Type->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$appointment_patienttypee_delete->RecordCount = 0;
$i = 0;
while (!$appointment_patienttypee_delete->Recordset->EOF) {
	$appointment_patienttypee_delete->RecordCount++;
	$appointment_patienttypee_delete->RowCount++;

	// Set row properties
	$appointment_patienttypee->resetAttributes();
	$appointment_patienttypee->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$appointment_patienttypee_delete->loadRowValues($appointment_patienttypee_delete->Recordset);

	// Render row
	$appointment_patienttypee_delete->renderRow();
?>
	<tr <?php echo $appointment_patienttypee->rowAttributes() ?>>
<?php if ($appointment_patienttypee_delete->id->Visible) { // id ?>
		<td <?php echo $appointment_patienttypee_delete->id->cellAttributes() ?>>
<span id="el<?php echo $appointment_patienttypee_delete->RowCount ?>_appointment_patienttypee_id" class="appointment_patienttypee_id">
<span<?php echo $appointment_patienttypee_delete->id->viewAttributes() ?>><?php echo $appointment_patienttypee_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($appointment_patienttypee_delete->Name->Visible) { // Name ?>
		<td <?php echo $appointment_patienttypee_delete->Name->cellAttributes() ?>>
<span id="el<?php echo $appointment_patienttypee_delete->RowCount ?>_appointment_patienttypee_Name" class="appointment_patienttypee_Name">
<span<?php echo $appointment_patienttypee_delete->Name->viewAttributes() ?>><?php echo $appointment_patienttypee_delete->Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($appointment_patienttypee_delete->Type->Visible) { // Type ?>
		<td <?php echo $appointment_patienttypee_delete->Type->cellAttributes() ?>>
<span id="el<?php echo $appointment_patienttypee_delete->RowCount ?>_appointment_patienttypee_Type" class="appointment_patienttypee_Type">
<span<?php echo $appointment_patienttypee_delete->Type->viewAttributes() ?>><?php echo $appointment_patienttypee_delete->Type->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$appointment_patienttypee_delete->Recordset->moveNext();
}
$appointment_patienttypee_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $appointment_patienttypee_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$appointment_patienttypee_delete->showPageFooter();
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
$appointment_patienttypee_delete->terminate();
?>