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
$pres_genericinteractions_delete = new pres_genericinteractions_delete();

// Run the page
$pres_genericinteractions_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_genericinteractions_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fpres_genericinteractionsdelete = currentForm = new ew.Form("fpres_genericinteractionsdelete", "delete");

// Form_CustomValidate event
fpres_genericinteractionsdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpres_genericinteractionsdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $pres_genericinteractions_delete->showPageHeader(); ?>
<?php
$pres_genericinteractions_delete->showMessage();
?>
<form name="fpres_genericinteractionsdelete" id="fpres_genericinteractionsdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pres_genericinteractions_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pres_genericinteractions_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_genericinteractions">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($pres_genericinteractions_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($pres_genericinteractions->id->Visible) { // id ?>
		<th class="<?php echo $pres_genericinteractions->id->headerCellClass() ?>"><span id="elh_pres_genericinteractions_id" class="pres_genericinteractions_id"><?php echo $pres_genericinteractions->id->caption() ?></span></th>
<?php } ?>
<?php if ($pres_genericinteractions->Genericname->Visible) { // Genericname ?>
		<th class="<?php echo $pres_genericinteractions->Genericname->headerCellClass() ?>"><span id="elh_pres_genericinteractions_Genericname" class="pres_genericinteractions_Genericname"><?php echo $pres_genericinteractions->Genericname->caption() ?></span></th>
<?php } ?>
<?php if ($pres_genericinteractions->Interactions->Visible) { // Interactions ?>
		<th class="<?php echo $pres_genericinteractions->Interactions->headerCellClass() ?>"><span id="elh_pres_genericinteractions_Interactions" class="pres_genericinteractions_Interactions"><?php echo $pres_genericinteractions->Interactions->caption() ?></span></th>
<?php } ?>
<?php if ($pres_genericinteractions->Remarks->Visible) { // Remarks ?>
		<th class="<?php echo $pres_genericinteractions->Remarks->headerCellClass() ?>"><span id="elh_pres_genericinteractions_Remarks" class="pres_genericinteractions_Remarks"><?php echo $pres_genericinteractions->Remarks->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$pres_genericinteractions_delete->RecCnt = 0;
$i = 0;
while (!$pres_genericinteractions_delete->Recordset->EOF) {
	$pres_genericinteractions_delete->RecCnt++;
	$pres_genericinteractions_delete->RowCnt++;

	// Set row properties
	$pres_genericinteractions->resetAttributes();
	$pres_genericinteractions->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$pres_genericinteractions_delete->loadRowValues($pres_genericinteractions_delete->Recordset);

	// Render row
	$pres_genericinteractions_delete->renderRow();
?>
	<tr<?php echo $pres_genericinteractions->rowAttributes() ?>>
<?php if ($pres_genericinteractions->id->Visible) { // id ?>
		<td<?php echo $pres_genericinteractions->id->cellAttributes() ?>>
<span id="el<?php echo $pres_genericinteractions_delete->RowCnt ?>_pres_genericinteractions_id" class="pres_genericinteractions_id">
<span<?php echo $pres_genericinteractions->id->viewAttributes() ?>>
<?php echo $pres_genericinteractions->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_genericinteractions->Genericname->Visible) { // Genericname ?>
		<td<?php echo $pres_genericinteractions->Genericname->cellAttributes() ?>>
<span id="el<?php echo $pres_genericinteractions_delete->RowCnt ?>_pres_genericinteractions_Genericname" class="pres_genericinteractions_Genericname">
<span<?php echo $pres_genericinteractions->Genericname->viewAttributes() ?>>
<?php echo $pres_genericinteractions->Genericname->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_genericinteractions->Interactions->Visible) { // Interactions ?>
		<td<?php echo $pres_genericinteractions->Interactions->cellAttributes() ?>>
<span id="el<?php echo $pres_genericinteractions_delete->RowCnt ?>_pres_genericinteractions_Interactions" class="pres_genericinteractions_Interactions">
<span<?php echo $pres_genericinteractions->Interactions->viewAttributes() ?>>
<?php echo $pres_genericinteractions->Interactions->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_genericinteractions->Remarks->Visible) { // Remarks ?>
		<td<?php echo $pres_genericinteractions->Remarks->cellAttributes() ?>>
<span id="el<?php echo $pres_genericinteractions_delete->RowCnt ?>_pres_genericinteractions_Remarks" class="pres_genericinteractions_Remarks">
<span<?php echo $pres_genericinteractions->Remarks->viewAttributes() ?>>
<?php echo $pres_genericinteractions->Remarks->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$pres_genericinteractions_delete->Recordset->moveNext();
}
$pres_genericinteractions_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pres_genericinteractions_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$pres_genericinteractions_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$pres_genericinteractions_delete->terminate();
?>