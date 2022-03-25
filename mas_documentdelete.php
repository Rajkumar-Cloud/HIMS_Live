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
$mas_document_delete = new mas_document_delete();

// Run the page
$mas_document_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_document_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fmas_documentdelete = currentForm = new ew.Form("fmas_documentdelete", "delete");

// Form_CustomValidate event
fmas_documentdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fmas_documentdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $mas_document_delete->showPageHeader(); ?>
<?php
$mas_document_delete->showMessage();
?>
<form name="fmas_documentdelete" id="fmas_documentdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($mas_document_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $mas_document_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_document">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($mas_document_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($mas_document->id->Visible) { // id ?>
		<th class="<?php echo $mas_document->id->headerCellClass() ?>"><span id="elh_mas_document_id" class="mas_document_id"><?php echo $mas_document->id->caption() ?></span></th>
<?php } ?>
<?php if ($mas_document->Name->Visible) { // Name ?>
		<th class="<?php echo $mas_document->Name->headerCellClass() ?>"><span id="elh_mas_document_Name" class="mas_document_Name"><?php echo $mas_document->Name->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$mas_document_delete->RecCnt = 0;
$i = 0;
while (!$mas_document_delete->Recordset->EOF) {
	$mas_document_delete->RecCnt++;
	$mas_document_delete->RowCnt++;

	// Set row properties
	$mas_document->resetAttributes();
	$mas_document->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$mas_document_delete->loadRowValues($mas_document_delete->Recordset);

	// Render row
	$mas_document_delete->renderRow();
?>
	<tr<?php echo $mas_document->rowAttributes() ?>>
<?php if ($mas_document->id->Visible) { // id ?>
		<td<?php echo $mas_document->id->cellAttributes() ?>>
<span id="el<?php echo $mas_document_delete->RowCnt ?>_mas_document_id" class="mas_document_id">
<span<?php echo $mas_document->id->viewAttributes() ?>>
<?php echo $mas_document->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_document->Name->Visible) { // Name ?>
		<td<?php echo $mas_document->Name->cellAttributes() ?>>
<span id="el<?php echo $mas_document_delete->RowCnt ?>_mas_document_Name" class="mas_document_Name">
<span<?php echo $mas_document->Name->viewAttributes() ?>>
<?php echo $mas_document->Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$mas_document_delete->Recordset->moveNext();
}
$mas_document_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $mas_document_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$mas_document_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$mas_document_delete->terminate();
?>