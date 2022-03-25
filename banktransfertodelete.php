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
$banktransferto_delete = new banktransferto_delete();

// Run the page
$banktransferto_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$banktransferto_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fbanktransfertodelete = currentForm = new ew.Form("fbanktransfertodelete", "delete");

// Form_CustomValidate event
fbanktransfertodelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fbanktransfertodelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $banktransferto_delete->showPageHeader(); ?>
<?php
$banktransferto_delete->showMessage();
?>
<form name="fbanktransfertodelete" id="fbanktransfertodelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($banktransferto_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $banktransferto_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="banktransferto">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($banktransferto_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($banktransferto->id->Visible) { // id ?>
		<th class="<?php echo $banktransferto->id->headerCellClass() ?>"><span id="elh_banktransferto_id" class="banktransferto_id"><?php echo $banktransferto->id->caption() ?></span></th>
<?php } ?>
<?php if ($banktransferto->Name->Visible) { // Name ?>
		<th class="<?php echo $banktransferto->Name->headerCellClass() ?>"><span id="elh_banktransferto_Name" class="banktransferto_Name"><?php echo $banktransferto->Name->caption() ?></span></th>
<?php } ?>
<?php if ($banktransferto->Street_Address->Visible) { // Street_Address ?>
		<th class="<?php echo $banktransferto->Street_Address->headerCellClass() ?>"><span id="elh_banktransferto_Street_Address" class="banktransferto_Street_Address"><?php echo $banktransferto->Street_Address->caption() ?></span></th>
<?php } ?>
<?php if ($banktransferto->City->Visible) { // City ?>
		<th class="<?php echo $banktransferto->City->headerCellClass() ?>"><span id="elh_banktransferto_City" class="banktransferto_City"><?php echo $banktransferto->City->caption() ?></span></th>
<?php } ?>
<?php if ($banktransferto->State->Visible) { // State ?>
		<th class="<?php echo $banktransferto->State->headerCellClass() ?>"><span id="elh_banktransferto_State" class="banktransferto_State"><?php echo $banktransferto->State->caption() ?></span></th>
<?php } ?>
<?php if ($banktransferto->Zipcode->Visible) { // Zipcode ?>
		<th class="<?php echo $banktransferto->Zipcode->headerCellClass() ?>"><span id="elh_banktransferto_Zipcode" class="banktransferto_Zipcode"><?php echo $banktransferto->Zipcode->caption() ?></span></th>
<?php } ?>
<?php if ($banktransferto->Mobile_Number->Visible) { // Mobile_Number ?>
		<th class="<?php echo $banktransferto->Mobile_Number->headerCellClass() ?>"><span id="elh_banktransferto_Mobile_Number" class="banktransferto_Mobile_Number"><?php echo $banktransferto->Mobile_Number->caption() ?></span></th>
<?php } ?>
<?php if ($banktransferto->AccountNo->Visible) { // AccountNo ?>
		<th class="<?php echo $banktransferto->AccountNo->headerCellClass() ?>"><span id="elh_banktransferto_AccountNo" class="banktransferto_AccountNo"><?php echo $banktransferto->AccountNo->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$banktransferto_delete->RecCnt = 0;
$i = 0;
while (!$banktransferto_delete->Recordset->EOF) {
	$banktransferto_delete->RecCnt++;
	$banktransferto_delete->RowCnt++;

	// Set row properties
	$banktransferto->resetAttributes();
	$banktransferto->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$banktransferto_delete->loadRowValues($banktransferto_delete->Recordset);

	// Render row
	$banktransferto_delete->renderRow();
?>
	<tr<?php echo $banktransferto->rowAttributes() ?>>
<?php if ($banktransferto->id->Visible) { // id ?>
		<td<?php echo $banktransferto->id->cellAttributes() ?>>
<span id="el<?php echo $banktransferto_delete->RowCnt ?>_banktransferto_id" class="banktransferto_id">
<span<?php echo $banktransferto->id->viewAttributes() ?>>
<?php echo $banktransferto->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($banktransferto->Name->Visible) { // Name ?>
		<td<?php echo $banktransferto->Name->cellAttributes() ?>>
<span id="el<?php echo $banktransferto_delete->RowCnt ?>_banktransferto_Name" class="banktransferto_Name">
<span<?php echo $banktransferto->Name->viewAttributes() ?>>
<?php echo $banktransferto->Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($banktransferto->Street_Address->Visible) { // Street_Address ?>
		<td<?php echo $banktransferto->Street_Address->cellAttributes() ?>>
<span id="el<?php echo $banktransferto_delete->RowCnt ?>_banktransferto_Street_Address" class="banktransferto_Street_Address">
<span<?php echo $banktransferto->Street_Address->viewAttributes() ?>>
<?php echo $banktransferto->Street_Address->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($banktransferto->City->Visible) { // City ?>
		<td<?php echo $banktransferto->City->cellAttributes() ?>>
<span id="el<?php echo $banktransferto_delete->RowCnt ?>_banktransferto_City" class="banktransferto_City">
<span<?php echo $banktransferto->City->viewAttributes() ?>>
<?php echo $banktransferto->City->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($banktransferto->State->Visible) { // State ?>
		<td<?php echo $banktransferto->State->cellAttributes() ?>>
<span id="el<?php echo $banktransferto_delete->RowCnt ?>_banktransferto_State" class="banktransferto_State">
<span<?php echo $banktransferto->State->viewAttributes() ?>>
<?php echo $banktransferto->State->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($banktransferto->Zipcode->Visible) { // Zipcode ?>
		<td<?php echo $banktransferto->Zipcode->cellAttributes() ?>>
<span id="el<?php echo $banktransferto_delete->RowCnt ?>_banktransferto_Zipcode" class="banktransferto_Zipcode">
<span<?php echo $banktransferto->Zipcode->viewAttributes() ?>>
<?php echo $banktransferto->Zipcode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($banktransferto->Mobile_Number->Visible) { // Mobile_Number ?>
		<td<?php echo $banktransferto->Mobile_Number->cellAttributes() ?>>
<span id="el<?php echo $banktransferto_delete->RowCnt ?>_banktransferto_Mobile_Number" class="banktransferto_Mobile_Number">
<span<?php echo $banktransferto->Mobile_Number->viewAttributes() ?>>
<?php echo $banktransferto->Mobile_Number->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($banktransferto->AccountNo->Visible) { // AccountNo ?>
		<td<?php echo $banktransferto->AccountNo->cellAttributes() ?>>
<span id="el<?php echo $banktransferto_delete->RowCnt ?>_banktransferto_AccountNo" class="banktransferto_AccountNo">
<span<?php echo $banktransferto->AccountNo->viewAttributes() ?>>
<?php echo $banktransferto->AccountNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$banktransferto_delete->Recordset->moveNext();
}
$banktransferto_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $banktransferto_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$banktransferto_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$banktransferto_delete->terminate();
?>