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
$mas_typeofregsistration_delete = new mas_typeofregsistration_delete();

// Run the page
$mas_typeofregsistration_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_typeofregsistration_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fmas_typeofregsistrationdelete = currentForm = new ew.Form("fmas_typeofregsistrationdelete", "delete");

// Form_CustomValidate event
fmas_typeofregsistrationdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fmas_typeofregsistrationdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $mas_typeofregsistration_delete->showPageHeader(); ?>
<?php
$mas_typeofregsistration_delete->showMessage();
?>
<form name="fmas_typeofregsistrationdelete" id="fmas_typeofregsistrationdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($mas_typeofregsistration_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $mas_typeofregsistration_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_typeofregsistration">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($mas_typeofregsistration_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($mas_typeofregsistration->id->Visible) { // id ?>
		<th class="<?php echo $mas_typeofregsistration->id->headerCellClass() ?>"><span id="elh_mas_typeofregsistration_id" class="mas_typeofregsistration_id"><?php echo $mas_typeofregsistration->id->caption() ?></span></th>
<?php } ?>
<?php if ($mas_typeofregsistration->RegsistrationType->Visible) { // RegsistrationType ?>
		<th class="<?php echo $mas_typeofregsistration->RegsistrationType->headerCellClass() ?>"><span id="elh_mas_typeofregsistration_RegsistrationType" class="mas_typeofregsistration_RegsistrationType"><?php echo $mas_typeofregsistration->RegsistrationType->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$mas_typeofregsistration_delete->RecCnt = 0;
$i = 0;
while (!$mas_typeofregsistration_delete->Recordset->EOF) {
	$mas_typeofregsistration_delete->RecCnt++;
	$mas_typeofregsistration_delete->RowCnt++;

	// Set row properties
	$mas_typeofregsistration->resetAttributes();
	$mas_typeofregsistration->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$mas_typeofregsistration_delete->loadRowValues($mas_typeofregsistration_delete->Recordset);

	// Render row
	$mas_typeofregsistration_delete->renderRow();
?>
	<tr<?php echo $mas_typeofregsistration->rowAttributes() ?>>
<?php if ($mas_typeofregsistration->id->Visible) { // id ?>
		<td<?php echo $mas_typeofregsistration->id->cellAttributes() ?>>
<span id="el<?php echo $mas_typeofregsistration_delete->RowCnt ?>_mas_typeofregsistration_id" class="mas_typeofregsistration_id">
<span<?php echo $mas_typeofregsistration->id->viewAttributes() ?>>
<?php echo $mas_typeofregsistration->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_typeofregsistration->RegsistrationType->Visible) { // RegsistrationType ?>
		<td<?php echo $mas_typeofregsistration->RegsistrationType->cellAttributes() ?>>
<span id="el<?php echo $mas_typeofregsistration_delete->RowCnt ?>_mas_typeofregsistration_RegsistrationType" class="mas_typeofregsistration_RegsistrationType">
<span<?php echo $mas_typeofregsistration->RegsistrationType->viewAttributes() ?>>
<?php echo $mas_typeofregsistration->RegsistrationType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$mas_typeofregsistration_delete->Recordset->moveNext();
}
$mas_typeofregsistration_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $mas_typeofregsistration_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$mas_typeofregsistration_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$mas_typeofregsistration_delete->terminate();
?>