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
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fappointment_patienttypeedelete = currentForm = new ew.Form("fappointment_patienttypeedelete", "delete");

// Form_CustomValidate event
fappointment_patienttypeedelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fappointment_patienttypeedelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fappointment_patienttypeedelete.lists["x_Type"] = <?php echo $appointment_patienttypee_delete->Type->Lookup->toClientList() ?>;
fappointment_patienttypeedelete.lists["x_Type"].options = <?php echo JsonEncode($appointment_patienttypee_delete->Type->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $appointment_patienttypee_delete->showPageHeader(); ?>
<?php
$appointment_patienttypee_delete->showMessage();
?>
<form name="fappointment_patienttypeedelete" id="fappointment_patienttypeedelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($appointment_patienttypee_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $appointment_patienttypee_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="appointment_patienttypee">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($appointment_patienttypee_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($appointment_patienttypee->id->Visible) { // id ?>
		<th class="<?php echo $appointment_patienttypee->id->headerCellClass() ?>"><span id="elh_appointment_patienttypee_id" class="appointment_patienttypee_id"><?php echo $appointment_patienttypee->id->caption() ?></span></th>
<?php } ?>
<?php if ($appointment_patienttypee->Name->Visible) { // Name ?>
		<th class="<?php echo $appointment_patienttypee->Name->headerCellClass() ?>"><span id="elh_appointment_patienttypee_Name" class="appointment_patienttypee_Name"><?php echo $appointment_patienttypee->Name->caption() ?></span></th>
<?php } ?>
<?php if ($appointment_patienttypee->Type->Visible) { // Type ?>
		<th class="<?php echo $appointment_patienttypee->Type->headerCellClass() ?>"><span id="elh_appointment_patienttypee_Type" class="appointment_patienttypee_Type"><?php echo $appointment_patienttypee->Type->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$appointment_patienttypee_delete->RecCnt = 0;
$i = 0;
while (!$appointment_patienttypee_delete->Recordset->EOF) {
	$appointment_patienttypee_delete->RecCnt++;
	$appointment_patienttypee_delete->RowCnt++;

	// Set row properties
	$appointment_patienttypee->resetAttributes();
	$appointment_patienttypee->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$appointment_patienttypee_delete->loadRowValues($appointment_patienttypee_delete->Recordset);

	// Render row
	$appointment_patienttypee_delete->renderRow();
?>
	<tr<?php echo $appointment_patienttypee->rowAttributes() ?>>
<?php if ($appointment_patienttypee->id->Visible) { // id ?>
		<td<?php echo $appointment_patienttypee->id->cellAttributes() ?>>
<span id="el<?php echo $appointment_patienttypee_delete->RowCnt ?>_appointment_patienttypee_id" class="appointment_patienttypee_id">
<span<?php echo $appointment_patienttypee->id->viewAttributes() ?>>
<?php echo $appointment_patienttypee->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($appointment_patienttypee->Name->Visible) { // Name ?>
		<td<?php echo $appointment_patienttypee->Name->cellAttributes() ?>>
<span id="el<?php echo $appointment_patienttypee_delete->RowCnt ?>_appointment_patienttypee_Name" class="appointment_patienttypee_Name">
<span<?php echo $appointment_patienttypee->Name->viewAttributes() ?>>
<?php echo $appointment_patienttypee->Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($appointment_patienttypee->Type->Visible) { // Type ?>
		<td<?php echo $appointment_patienttypee->Type->cellAttributes() ?>>
<span id="el<?php echo $appointment_patienttypee_delete->RowCnt ?>_appointment_patienttypee_Type" class="appointment_patienttypee_Type">
<span<?php echo $appointment_patienttypee->Type->viewAttributes() ?>>
<?php echo $appointment_patienttypee->Type->getViewValue() ?></span>
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
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$appointment_patienttypee_delete->terminate();
?>