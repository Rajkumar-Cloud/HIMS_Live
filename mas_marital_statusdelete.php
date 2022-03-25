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
$mas_marital_status_delete = new mas_marital_status_delete();

// Run the page
$mas_marital_status_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_marital_status_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fmas_marital_statusdelete = currentForm = new ew.Form("fmas_marital_statusdelete", "delete");

// Form_CustomValidate event
fmas_marital_statusdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fmas_marital_statusdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $mas_marital_status_delete->showPageHeader(); ?>
<?php
$mas_marital_status_delete->showMessage();
?>
<form name="fmas_marital_statusdelete" id="fmas_marital_statusdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($mas_marital_status_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $mas_marital_status_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_marital_status">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($mas_marital_status_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($mas_marital_status->id->Visible) { // id ?>
		<th class="<?php echo $mas_marital_status->id->headerCellClass() ?>"><span id="elh_mas_marital_status_id" class="mas_marital_status_id"><?php echo $mas_marital_status->id->caption() ?></span></th>
<?php } ?>
<?php if ($mas_marital_status->MaritalStatus->Visible) { // MaritalStatus ?>
		<th class="<?php echo $mas_marital_status->MaritalStatus->headerCellClass() ?>"><span id="elh_mas_marital_status_MaritalStatus" class="mas_marital_status_MaritalStatus"><?php echo $mas_marital_status->MaritalStatus->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$mas_marital_status_delete->RecCnt = 0;
$i = 0;
while (!$mas_marital_status_delete->Recordset->EOF) {
	$mas_marital_status_delete->RecCnt++;
	$mas_marital_status_delete->RowCnt++;

	// Set row properties
	$mas_marital_status->resetAttributes();
	$mas_marital_status->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$mas_marital_status_delete->loadRowValues($mas_marital_status_delete->Recordset);

	// Render row
	$mas_marital_status_delete->renderRow();
?>
	<tr<?php echo $mas_marital_status->rowAttributes() ?>>
<?php if ($mas_marital_status->id->Visible) { // id ?>
		<td<?php echo $mas_marital_status->id->cellAttributes() ?>>
<span id="el<?php echo $mas_marital_status_delete->RowCnt ?>_mas_marital_status_id" class="mas_marital_status_id">
<span<?php echo $mas_marital_status->id->viewAttributes() ?>>
<?php echo $mas_marital_status->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_marital_status->MaritalStatus->Visible) { // MaritalStatus ?>
		<td<?php echo $mas_marital_status->MaritalStatus->cellAttributes() ?>>
<span id="el<?php echo $mas_marital_status_delete->RowCnt ?>_mas_marital_status_MaritalStatus" class="mas_marital_status_MaritalStatus">
<span<?php echo $mas_marital_status->MaritalStatus->viewAttributes() ?>>
<?php echo $mas_marital_status->MaritalStatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$mas_marital_status_delete->Recordset->moveNext();
}
$mas_marital_status_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $mas_marital_status_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$mas_marital_status_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$mas_marital_status_delete->terminate();
?>