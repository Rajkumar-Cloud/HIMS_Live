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
$hr_holidays_delete = new hr_holidays_delete();

// Run the page
$hr_holidays_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_holidays_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fhr_holidaysdelete = currentForm = new ew.Form("fhr_holidaysdelete", "delete");

// Form_CustomValidate event
fhr_holidaysdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_holidaysdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fhr_holidaysdelete.lists["x_status"] = <?php echo $hr_holidays_delete->status->Lookup->toClientList() ?>;
fhr_holidaysdelete.lists["x_status"].options = <?php echo JsonEncode($hr_holidays_delete->status->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $hr_holidays_delete->showPageHeader(); ?>
<?php
$hr_holidays_delete->showMessage();
?>
<form name="fhr_holidaysdelete" id="fhr_holidaysdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_holidays_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_holidays_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_holidays">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($hr_holidays_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($hr_holidays->id->Visible) { // id ?>
		<th class="<?php echo $hr_holidays->id->headerCellClass() ?>"><span id="elh_hr_holidays_id" class="hr_holidays_id"><?php echo $hr_holidays->id->caption() ?></span></th>
<?php } ?>
<?php if ($hr_holidays->name->Visible) { // name ?>
		<th class="<?php echo $hr_holidays->name->headerCellClass() ?>"><span id="elh_hr_holidays_name" class="hr_holidays_name"><?php echo $hr_holidays->name->caption() ?></span></th>
<?php } ?>
<?php if ($hr_holidays->dateh->Visible) { // dateh ?>
		<th class="<?php echo $hr_holidays->dateh->headerCellClass() ?>"><span id="elh_hr_holidays_dateh" class="hr_holidays_dateh"><?php echo $hr_holidays->dateh->caption() ?></span></th>
<?php } ?>
<?php if ($hr_holidays->status->Visible) { // status ?>
		<th class="<?php echo $hr_holidays->status->headerCellClass() ?>"><span id="elh_hr_holidays_status" class="hr_holidays_status"><?php echo $hr_holidays->status->caption() ?></span></th>
<?php } ?>
<?php if ($hr_holidays->country->Visible) { // country ?>
		<th class="<?php echo $hr_holidays->country->headerCellClass() ?>"><span id="elh_hr_holidays_country" class="hr_holidays_country"><?php echo $hr_holidays->country->caption() ?></span></th>
<?php } ?>
<?php if ($hr_holidays->HospID->Visible) { // HospID ?>
		<th class="<?php echo $hr_holidays->HospID->headerCellClass() ?>"><span id="elh_hr_holidays_HospID" class="hr_holidays_HospID"><?php echo $hr_holidays->HospID->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$hr_holidays_delete->RecCnt = 0;
$i = 0;
while (!$hr_holidays_delete->Recordset->EOF) {
	$hr_holidays_delete->RecCnt++;
	$hr_holidays_delete->RowCnt++;

	// Set row properties
	$hr_holidays->resetAttributes();
	$hr_holidays->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$hr_holidays_delete->loadRowValues($hr_holidays_delete->Recordset);

	// Render row
	$hr_holidays_delete->renderRow();
?>
	<tr<?php echo $hr_holidays->rowAttributes() ?>>
<?php if ($hr_holidays->id->Visible) { // id ?>
		<td<?php echo $hr_holidays->id->cellAttributes() ?>>
<span id="el<?php echo $hr_holidays_delete->RowCnt ?>_hr_holidays_id" class="hr_holidays_id">
<span<?php echo $hr_holidays->id->viewAttributes() ?>>
<?php echo $hr_holidays->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_holidays->name->Visible) { // name ?>
		<td<?php echo $hr_holidays->name->cellAttributes() ?>>
<span id="el<?php echo $hr_holidays_delete->RowCnt ?>_hr_holidays_name" class="hr_holidays_name">
<span<?php echo $hr_holidays->name->viewAttributes() ?>>
<?php echo $hr_holidays->name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_holidays->dateh->Visible) { // dateh ?>
		<td<?php echo $hr_holidays->dateh->cellAttributes() ?>>
<span id="el<?php echo $hr_holidays_delete->RowCnt ?>_hr_holidays_dateh" class="hr_holidays_dateh">
<span<?php echo $hr_holidays->dateh->viewAttributes() ?>>
<?php echo $hr_holidays->dateh->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_holidays->status->Visible) { // status ?>
		<td<?php echo $hr_holidays->status->cellAttributes() ?>>
<span id="el<?php echo $hr_holidays_delete->RowCnt ?>_hr_holidays_status" class="hr_holidays_status">
<span<?php echo $hr_holidays->status->viewAttributes() ?>>
<?php echo $hr_holidays->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_holidays->country->Visible) { // country ?>
		<td<?php echo $hr_holidays->country->cellAttributes() ?>>
<span id="el<?php echo $hr_holidays_delete->RowCnt ?>_hr_holidays_country" class="hr_holidays_country">
<span<?php echo $hr_holidays->country->viewAttributes() ?>>
<?php echo $hr_holidays->country->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_holidays->HospID->Visible) { // HospID ?>
		<td<?php echo $hr_holidays->HospID->cellAttributes() ?>>
<span id="el<?php echo $hr_holidays_delete->RowCnt ?>_hr_holidays_HospID" class="hr_holidays_HospID">
<span<?php echo $hr_holidays->HospID->viewAttributes() ?>>
<?php echo $hr_holidays->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$hr_holidays_delete->Recordset->moveNext();
}
$hr_holidays_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $hr_holidays_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$hr_holidays_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$hr_holidays_delete->terminate();
?>