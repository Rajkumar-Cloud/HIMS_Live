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
$sys_tittle_delete = new sys_tittle_delete();

// Run the page
$sys_tittle_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sys_tittle_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fsys_tittledelete = currentForm = new ew.Form("fsys_tittledelete", "delete");

// Form_CustomValidate event
fsys_tittledelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fsys_tittledelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $sys_tittle_delete->showPageHeader(); ?>
<?php
$sys_tittle_delete->showMessage();
?>
<form name="fsys_tittledelete" id="fsys_tittledelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($sys_tittle_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $sys_tittle_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sys_tittle">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($sys_tittle_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($sys_tittle->id->Visible) { // id ?>
		<th class="<?php echo $sys_tittle->id->headerCellClass() ?>"><span id="elh_sys_tittle_id" class="sys_tittle_id"><?php echo $sys_tittle->id->caption() ?></span></th>
<?php } ?>
<?php if ($sys_tittle->Name->Visible) { // Name ?>
		<th class="<?php echo $sys_tittle->Name->headerCellClass() ?>"><span id="elh_sys_tittle_Name" class="sys_tittle_Name"><?php echo $sys_tittle->Name->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$sys_tittle_delete->RecCnt = 0;
$i = 0;
while (!$sys_tittle_delete->Recordset->EOF) {
	$sys_tittle_delete->RecCnt++;
	$sys_tittle_delete->RowCnt++;

	// Set row properties
	$sys_tittle->resetAttributes();
	$sys_tittle->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$sys_tittle_delete->loadRowValues($sys_tittle_delete->Recordset);

	// Render row
	$sys_tittle_delete->renderRow();
?>
	<tr<?php echo $sys_tittle->rowAttributes() ?>>
<?php if ($sys_tittle->id->Visible) { // id ?>
		<td<?php echo $sys_tittle->id->cellAttributes() ?>>
<span id="el<?php echo $sys_tittle_delete->RowCnt ?>_sys_tittle_id" class="sys_tittle_id">
<span<?php echo $sys_tittle->id->viewAttributes() ?>>
<?php echo $sys_tittle->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sys_tittle->Name->Visible) { // Name ?>
		<td<?php echo $sys_tittle->Name->cellAttributes() ?>>
<span id="el<?php echo $sys_tittle_delete->RowCnt ?>_sys_tittle_Name" class="sys_tittle_Name">
<span<?php echo $sys_tittle->Name->viewAttributes() ?>>
<?php echo $sys_tittle->Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$sys_tittle_delete->Recordset->moveNext();
}
$sys_tittle_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $sys_tittle_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$sys_tittle_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$sys_tittle_delete->terminate();
?>