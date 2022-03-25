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
$ivf_mas_template_type_delete = new ivf_mas_template_type_delete();

// Run the page
$ivf_mas_template_type_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_mas_template_type_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fivf_mas_template_typedelete = currentForm = new ew.Form("fivf_mas_template_typedelete", "delete");

// Form_CustomValidate event
fivf_mas_template_typedelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_mas_template_typedelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $ivf_mas_template_type_delete->showPageHeader(); ?>
<?php
$ivf_mas_template_type_delete->showMessage();
?>
<form name="fivf_mas_template_typedelete" id="fivf_mas_template_typedelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ivf_mas_template_type_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_mas_template_type_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_mas_template_type">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($ivf_mas_template_type_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($ivf_mas_template_type->id->Visible) { // id ?>
		<th class="<?php echo $ivf_mas_template_type->id->headerCellClass() ?>"><span id="elh_ivf_mas_template_type_id" class="ivf_mas_template_type_id"><?php echo $ivf_mas_template_type->id->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_mas_template_type->TemplateName->Visible) { // TemplateName ?>
		<th class="<?php echo $ivf_mas_template_type->TemplateName->headerCellClass() ?>"><span id="elh_ivf_mas_template_type_TemplateName" class="ivf_mas_template_type_TemplateName"><?php echo $ivf_mas_template_type->TemplateName->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$ivf_mas_template_type_delete->RecCnt = 0;
$i = 0;
while (!$ivf_mas_template_type_delete->Recordset->EOF) {
	$ivf_mas_template_type_delete->RecCnt++;
	$ivf_mas_template_type_delete->RowCnt++;

	// Set row properties
	$ivf_mas_template_type->resetAttributes();
	$ivf_mas_template_type->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$ivf_mas_template_type_delete->loadRowValues($ivf_mas_template_type_delete->Recordset);

	// Render row
	$ivf_mas_template_type_delete->renderRow();
?>
	<tr<?php echo $ivf_mas_template_type->rowAttributes() ?>>
<?php if ($ivf_mas_template_type->id->Visible) { // id ?>
		<td<?php echo $ivf_mas_template_type->id->cellAttributes() ?>>
<span id="el<?php echo $ivf_mas_template_type_delete->RowCnt ?>_ivf_mas_template_type_id" class="ivf_mas_template_type_id">
<span<?php echo $ivf_mas_template_type->id->viewAttributes() ?>>
<?php echo $ivf_mas_template_type->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_mas_template_type->TemplateName->Visible) { // TemplateName ?>
		<td<?php echo $ivf_mas_template_type->TemplateName->cellAttributes() ?>>
<span id="el<?php echo $ivf_mas_template_type_delete->RowCnt ?>_ivf_mas_template_type_TemplateName" class="ivf_mas_template_type_TemplateName">
<span<?php echo $ivf_mas_template_type->TemplateName->viewAttributes() ?>>
<?php echo $ivf_mas_template_type->TemplateName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$ivf_mas_template_type_delete->Recordset->moveNext();
}
$ivf_mas_template_type_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $ivf_mas_template_type_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$ivf_mas_template_type_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$ivf_mas_template_type_delete->terminate();
?>