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
$mas_where_didyou_hear_delete = new mas_where_didyou_hear_delete();

// Run the page
$mas_where_didyou_hear_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_where_didyou_hear_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fmas_where_didyou_heardelete = currentForm = new ew.Form("fmas_where_didyou_heardelete", "delete");

// Form_CustomValidate event
fmas_where_didyou_heardelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fmas_where_didyou_heardelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $mas_where_didyou_hear_delete->showPageHeader(); ?>
<?php
$mas_where_didyou_hear_delete->showMessage();
?>
<form name="fmas_where_didyou_heardelete" id="fmas_where_didyou_heardelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($mas_where_didyou_hear_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $mas_where_didyou_hear_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_where_didyou_hear">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($mas_where_didyou_hear_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($mas_where_didyou_hear->id->Visible) { // id ?>
		<th class="<?php echo $mas_where_didyou_hear->id->headerCellClass() ?>"><span id="elh_mas_where_didyou_hear_id" class="mas_where_didyou_hear_id"><?php echo $mas_where_didyou_hear->id->caption() ?></span></th>
<?php } ?>
<?php if ($mas_where_didyou_hear->Job->Visible) { // Job ?>
		<th class="<?php echo $mas_where_didyou_hear->Job->headerCellClass() ?>"><span id="elh_mas_where_didyou_hear_Job" class="mas_where_didyou_hear_Job"><?php echo $mas_where_didyou_hear->Job->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$mas_where_didyou_hear_delete->RecCnt = 0;
$i = 0;
while (!$mas_where_didyou_hear_delete->Recordset->EOF) {
	$mas_where_didyou_hear_delete->RecCnt++;
	$mas_where_didyou_hear_delete->RowCnt++;

	// Set row properties
	$mas_where_didyou_hear->resetAttributes();
	$mas_where_didyou_hear->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$mas_where_didyou_hear_delete->loadRowValues($mas_where_didyou_hear_delete->Recordset);

	// Render row
	$mas_where_didyou_hear_delete->renderRow();
?>
	<tr<?php echo $mas_where_didyou_hear->rowAttributes() ?>>
<?php if ($mas_where_didyou_hear->id->Visible) { // id ?>
		<td<?php echo $mas_where_didyou_hear->id->cellAttributes() ?>>
<span id="el<?php echo $mas_where_didyou_hear_delete->RowCnt ?>_mas_where_didyou_hear_id" class="mas_where_didyou_hear_id">
<span<?php echo $mas_where_didyou_hear->id->viewAttributes() ?>>
<?php echo $mas_where_didyou_hear->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_where_didyou_hear->Job->Visible) { // Job ?>
		<td<?php echo $mas_where_didyou_hear->Job->cellAttributes() ?>>
<span id="el<?php echo $mas_where_didyou_hear_delete->RowCnt ?>_mas_where_didyou_hear_Job" class="mas_where_didyou_hear_Job">
<span<?php echo $mas_where_didyou_hear->Job->viewAttributes() ?>>
<?php echo $mas_where_didyou_hear->Job->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$mas_where_didyou_hear_delete->Recordset->moveNext();
}
$mas_where_didyou_hear_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $mas_where_didyou_hear_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$mas_where_didyou_hear_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$mas_where_didyou_hear_delete->terminate();
?>