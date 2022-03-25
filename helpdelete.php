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
$help_delete = new help_delete();

// Run the page
$help_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$help_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fhelpdelete = currentForm = new ew.Form("fhelpdelete", "delete");

// Form_CustomValidate event
fhelpdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhelpdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $help_delete->showPageHeader(); ?>
<?php
$help_delete->showMessage();
?>
<form name="fhelpdelete" id="fhelpdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($help_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $help_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="help">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($help_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($help->id->Visible) { // id ?>
		<th class="<?php echo $help->id->headerCellClass() ?>"><span id="elh_help_id" class="help_id"><?php echo $help->id->caption() ?></span></th>
<?php } ?>
<?php if ($help->Tittle->Visible) { // Tittle ?>
		<th class="<?php echo $help->Tittle->headerCellClass() ?>"><span id="elh_help_Tittle" class="help_Tittle"><?php echo $help->Tittle->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$help_delete->RecCnt = 0;
$i = 0;
while (!$help_delete->Recordset->EOF) {
	$help_delete->RecCnt++;
	$help_delete->RowCnt++;

	// Set row properties
	$help->resetAttributes();
	$help->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$help_delete->loadRowValues($help_delete->Recordset);

	// Render row
	$help_delete->renderRow();
?>
	<tr<?php echo $help->rowAttributes() ?>>
<?php if ($help->id->Visible) { // id ?>
		<td<?php echo $help->id->cellAttributes() ?>>
<span id="el<?php echo $help_delete->RowCnt ?>_help_id" class="help_id">
<span<?php echo $help->id->viewAttributes() ?>>
<?php echo $help->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($help->Tittle->Visible) { // Tittle ?>
		<td<?php echo $help->Tittle->cellAttributes() ?>>
<span id="el<?php echo $help_delete->RowCnt ?>_help_Tittle" class="help_Tittle">
<span<?php echo $help->Tittle->viewAttributes() ?>>
<?php echo $help->Tittle->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$help_delete->Recordset->moveNext();
}
$help_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $help_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$help_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$help_delete->terminate();
?>