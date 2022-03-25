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
$mas_reference_type_delete = new mas_reference_type_delete();

// Run the page
$mas_reference_type_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_reference_type_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fmas_reference_typedelete = currentForm = new ew.Form("fmas_reference_typedelete", "delete");

// Form_CustomValidate event
fmas_reference_typedelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fmas_reference_typedelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $mas_reference_type_delete->showPageHeader(); ?>
<?php
$mas_reference_type_delete->showMessage();
?>
<form name="fmas_reference_typedelete" id="fmas_reference_typedelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($mas_reference_type_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $mas_reference_type_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_reference_type">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($mas_reference_type_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($mas_reference_type->id->Visible) { // id ?>
		<th class="<?php echo $mas_reference_type->id->headerCellClass() ?>"><span id="elh_mas_reference_type_id" class="mas_reference_type_id"><?php echo $mas_reference_type->id->caption() ?></span></th>
<?php } ?>
<?php if ($mas_reference_type->reference->Visible) { // reference ?>
		<th class="<?php echo $mas_reference_type->reference->headerCellClass() ?>"><span id="elh_mas_reference_type_reference" class="mas_reference_type_reference"><?php echo $mas_reference_type->reference->caption() ?></span></th>
<?php } ?>
<?php if ($mas_reference_type->ReferMobileNo->Visible) { // ReferMobileNo ?>
		<th class="<?php echo $mas_reference_type->ReferMobileNo->headerCellClass() ?>"><span id="elh_mas_reference_type_ReferMobileNo" class="mas_reference_type_ReferMobileNo"><?php echo $mas_reference_type->ReferMobileNo->caption() ?></span></th>
<?php } ?>
<?php if ($mas_reference_type->ReferClinicname->Visible) { // ReferClinicname ?>
		<th class="<?php echo $mas_reference_type->ReferClinicname->headerCellClass() ?>"><span id="elh_mas_reference_type_ReferClinicname" class="mas_reference_type_ReferClinicname"><?php echo $mas_reference_type->ReferClinicname->caption() ?></span></th>
<?php } ?>
<?php if ($mas_reference_type->ReferCity->Visible) { // ReferCity ?>
		<th class="<?php echo $mas_reference_type->ReferCity->headerCellClass() ?>"><span id="elh_mas_reference_type_ReferCity" class="mas_reference_type_ReferCity"><?php echo $mas_reference_type->ReferCity->caption() ?></span></th>
<?php } ?>
<?php if ($mas_reference_type->HospID->Visible) { // HospID ?>
		<th class="<?php echo $mas_reference_type->HospID->headerCellClass() ?>"><span id="elh_mas_reference_type_HospID" class="mas_reference_type_HospID"><?php echo $mas_reference_type->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($mas_reference_type->_email->Visible) { // email ?>
		<th class="<?php echo $mas_reference_type->_email->headerCellClass() ?>"><span id="elh_mas_reference_type__email" class="mas_reference_type__email"><?php echo $mas_reference_type->_email->caption() ?></span></th>
<?php } ?>
<?php if ($mas_reference_type->whatapp->Visible) { // whatapp ?>
		<th class="<?php echo $mas_reference_type->whatapp->headerCellClass() ?>"><span id="elh_mas_reference_type_whatapp" class="mas_reference_type_whatapp"><?php echo $mas_reference_type->whatapp->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$mas_reference_type_delete->RecCnt = 0;
$i = 0;
while (!$mas_reference_type_delete->Recordset->EOF) {
	$mas_reference_type_delete->RecCnt++;
	$mas_reference_type_delete->RowCnt++;

	// Set row properties
	$mas_reference_type->resetAttributes();
	$mas_reference_type->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$mas_reference_type_delete->loadRowValues($mas_reference_type_delete->Recordset);

	// Render row
	$mas_reference_type_delete->renderRow();
?>
	<tr<?php echo $mas_reference_type->rowAttributes() ?>>
<?php if ($mas_reference_type->id->Visible) { // id ?>
		<td<?php echo $mas_reference_type->id->cellAttributes() ?>>
<span id="el<?php echo $mas_reference_type_delete->RowCnt ?>_mas_reference_type_id" class="mas_reference_type_id">
<span<?php echo $mas_reference_type->id->viewAttributes() ?>>
<?php echo $mas_reference_type->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_reference_type->reference->Visible) { // reference ?>
		<td<?php echo $mas_reference_type->reference->cellAttributes() ?>>
<span id="el<?php echo $mas_reference_type_delete->RowCnt ?>_mas_reference_type_reference" class="mas_reference_type_reference">
<span<?php echo $mas_reference_type->reference->viewAttributes() ?>>
<?php echo $mas_reference_type->reference->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_reference_type->ReferMobileNo->Visible) { // ReferMobileNo ?>
		<td<?php echo $mas_reference_type->ReferMobileNo->cellAttributes() ?>>
<span id="el<?php echo $mas_reference_type_delete->RowCnt ?>_mas_reference_type_ReferMobileNo" class="mas_reference_type_ReferMobileNo">
<span<?php echo $mas_reference_type->ReferMobileNo->viewAttributes() ?>>
<?php echo $mas_reference_type->ReferMobileNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_reference_type->ReferClinicname->Visible) { // ReferClinicname ?>
		<td<?php echo $mas_reference_type->ReferClinicname->cellAttributes() ?>>
<span id="el<?php echo $mas_reference_type_delete->RowCnt ?>_mas_reference_type_ReferClinicname" class="mas_reference_type_ReferClinicname">
<span<?php echo $mas_reference_type->ReferClinicname->viewAttributes() ?>>
<?php echo $mas_reference_type->ReferClinicname->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_reference_type->ReferCity->Visible) { // ReferCity ?>
		<td<?php echo $mas_reference_type->ReferCity->cellAttributes() ?>>
<span id="el<?php echo $mas_reference_type_delete->RowCnt ?>_mas_reference_type_ReferCity" class="mas_reference_type_ReferCity">
<span<?php echo $mas_reference_type->ReferCity->viewAttributes() ?>>
<?php echo $mas_reference_type->ReferCity->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_reference_type->HospID->Visible) { // HospID ?>
		<td<?php echo $mas_reference_type->HospID->cellAttributes() ?>>
<span id="el<?php echo $mas_reference_type_delete->RowCnt ?>_mas_reference_type_HospID" class="mas_reference_type_HospID">
<span<?php echo $mas_reference_type->HospID->viewAttributes() ?>>
<?php echo $mas_reference_type->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_reference_type->_email->Visible) { // email ?>
		<td<?php echo $mas_reference_type->_email->cellAttributes() ?>>
<span id="el<?php echo $mas_reference_type_delete->RowCnt ?>_mas_reference_type__email" class="mas_reference_type__email">
<span<?php echo $mas_reference_type->_email->viewAttributes() ?>>
<?php echo $mas_reference_type->_email->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_reference_type->whatapp->Visible) { // whatapp ?>
		<td<?php echo $mas_reference_type->whatapp->cellAttributes() ?>>
<span id="el<?php echo $mas_reference_type_delete->RowCnt ?>_mas_reference_type_whatapp" class="mas_reference_type_whatapp">
<span<?php echo $mas_reference_type->whatapp->viewAttributes() ?>>
<?php echo $mas_reference_type->whatapp->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$mas_reference_type_delete->Recordset->moveNext();
}
$mas_reference_type_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $mas_reference_type_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$mas_reference_type_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$mas_reference_type_delete->terminate();
?>