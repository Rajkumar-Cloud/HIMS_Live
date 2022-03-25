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
$sys_workdays_delete = new sys_workdays_delete();

// Run the page
$sys_workdays_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sys_workdays_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fsys_workdaysdelete = currentForm = new ew.Form("fsys_workdaysdelete", "delete");

// Form_CustomValidate event
fsys_workdaysdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fsys_workdaysdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fsys_workdaysdelete.lists["x_status"] = <?php echo $sys_workdays_delete->status->Lookup->toClientList() ?>;
fsys_workdaysdelete.lists["x_status"].options = <?php echo JsonEncode($sys_workdays_delete->status->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $sys_workdays_delete->showPageHeader(); ?>
<?php
$sys_workdays_delete->showMessage();
?>
<form name="fsys_workdaysdelete" id="fsys_workdaysdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($sys_workdays_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $sys_workdays_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sys_workdays">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($sys_workdays_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($sys_workdays->id->Visible) { // id ?>
		<th class="<?php echo $sys_workdays->id->headerCellClass() ?>"><span id="elh_sys_workdays_id" class="sys_workdays_id"><?php echo $sys_workdays->id->caption() ?></span></th>
<?php } ?>
<?php if ($sys_workdays->name->Visible) { // name ?>
		<th class="<?php echo $sys_workdays->name->headerCellClass() ?>"><span id="elh_sys_workdays_name" class="sys_workdays_name"><?php echo $sys_workdays->name->caption() ?></span></th>
<?php } ?>
<?php if ($sys_workdays->status->Visible) { // status ?>
		<th class="<?php echo $sys_workdays->status->headerCellClass() ?>"><span id="elh_sys_workdays_status" class="sys_workdays_status"><?php echo $sys_workdays->status->caption() ?></span></th>
<?php } ?>
<?php if ($sys_workdays->country->Visible) { // country ?>
		<th class="<?php echo $sys_workdays->country->headerCellClass() ?>"><span id="elh_sys_workdays_country" class="sys_workdays_country"><?php echo $sys_workdays->country->caption() ?></span></th>
<?php } ?>
<?php if ($sys_workdays->HospID->Visible) { // HospID ?>
		<th class="<?php echo $sys_workdays->HospID->headerCellClass() ?>"><span id="elh_sys_workdays_HospID" class="sys_workdays_HospID"><?php echo $sys_workdays->HospID->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$sys_workdays_delete->RecCnt = 0;
$i = 0;
while (!$sys_workdays_delete->Recordset->EOF) {
	$sys_workdays_delete->RecCnt++;
	$sys_workdays_delete->RowCnt++;

	// Set row properties
	$sys_workdays->resetAttributes();
	$sys_workdays->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$sys_workdays_delete->loadRowValues($sys_workdays_delete->Recordset);

	// Render row
	$sys_workdays_delete->renderRow();
?>
	<tr<?php echo $sys_workdays->rowAttributes() ?>>
<?php if ($sys_workdays->id->Visible) { // id ?>
		<td<?php echo $sys_workdays->id->cellAttributes() ?>>
<span id="el<?php echo $sys_workdays_delete->RowCnt ?>_sys_workdays_id" class="sys_workdays_id">
<span<?php echo $sys_workdays->id->viewAttributes() ?>>
<?php echo $sys_workdays->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sys_workdays->name->Visible) { // name ?>
		<td<?php echo $sys_workdays->name->cellAttributes() ?>>
<span id="el<?php echo $sys_workdays_delete->RowCnt ?>_sys_workdays_name" class="sys_workdays_name">
<span<?php echo $sys_workdays->name->viewAttributes() ?>>
<?php echo $sys_workdays->name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sys_workdays->status->Visible) { // status ?>
		<td<?php echo $sys_workdays->status->cellAttributes() ?>>
<span id="el<?php echo $sys_workdays_delete->RowCnt ?>_sys_workdays_status" class="sys_workdays_status">
<span<?php echo $sys_workdays->status->viewAttributes() ?>>
<?php echo $sys_workdays->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sys_workdays->country->Visible) { // country ?>
		<td<?php echo $sys_workdays->country->cellAttributes() ?>>
<span id="el<?php echo $sys_workdays_delete->RowCnt ?>_sys_workdays_country" class="sys_workdays_country">
<span<?php echo $sys_workdays->country->viewAttributes() ?>>
<?php echo $sys_workdays->country->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sys_workdays->HospID->Visible) { // HospID ?>
		<td<?php echo $sys_workdays->HospID->cellAttributes() ?>>
<span id="el<?php echo $sys_workdays_delete->RowCnt ?>_sys_workdays_HospID" class="sys_workdays_HospID">
<span<?php echo $sys_workdays->HospID->viewAttributes() ?>>
<?php echo $sys_workdays->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$sys_workdays_delete->Recordset->moveNext();
}
$sys_workdays_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $sys_workdays_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$sys_workdays_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$sys_workdays_delete->terminate();
?>