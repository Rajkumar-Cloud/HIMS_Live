<?php
namespace PHPMaker2020\HIMS;

// Autoload
include_once "autoload.php";

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	\Delight\Cookie\Session::start(Config("COOKIE_SAMESITE")); // Init session data

// Output buffering
ob_start();
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
<?php include_once "header.php"; ?>
<script>
var fbanktransfertodelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fbanktransfertodelete = currentForm = new ew.Form("fbanktransfertodelete", "delete");
	loadjs.done("fbanktransfertodelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $banktransferto_delete->showPageHeader(); ?>
<?php
$banktransferto_delete->showMessage();
?>
<form name="fbanktransfertodelete" id="fbanktransfertodelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="banktransferto">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($banktransferto_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($banktransferto_delete->id->Visible) { // id ?>
		<th class="<?php echo $banktransferto_delete->id->headerCellClass() ?>"><span id="elh_banktransferto_id" class="banktransferto_id"><?php echo $banktransferto_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($banktransferto_delete->Name->Visible) { // Name ?>
		<th class="<?php echo $banktransferto_delete->Name->headerCellClass() ?>"><span id="elh_banktransferto_Name" class="banktransferto_Name"><?php echo $banktransferto_delete->Name->caption() ?></span></th>
<?php } ?>
<?php if ($banktransferto_delete->Street_Address->Visible) { // Street_Address ?>
		<th class="<?php echo $banktransferto_delete->Street_Address->headerCellClass() ?>"><span id="elh_banktransferto_Street_Address" class="banktransferto_Street_Address"><?php echo $banktransferto_delete->Street_Address->caption() ?></span></th>
<?php } ?>
<?php if ($banktransferto_delete->City->Visible) { // City ?>
		<th class="<?php echo $banktransferto_delete->City->headerCellClass() ?>"><span id="elh_banktransferto_City" class="banktransferto_City"><?php echo $banktransferto_delete->City->caption() ?></span></th>
<?php } ?>
<?php if ($banktransferto_delete->State->Visible) { // State ?>
		<th class="<?php echo $banktransferto_delete->State->headerCellClass() ?>"><span id="elh_banktransferto_State" class="banktransferto_State"><?php echo $banktransferto_delete->State->caption() ?></span></th>
<?php } ?>
<?php if ($banktransferto_delete->Zipcode->Visible) { // Zipcode ?>
		<th class="<?php echo $banktransferto_delete->Zipcode->headerCellClass() ?>"><span id="elh_banktransferto_Zipcode" class="banktransferto_Zipcode"><?php echo $banktransferto_delete->Zipcode->caption() ?></span></th>
<?php } ?>
<?php if ($banktransferto_delete->Mobile_Number->Visible) { // Mobile_Number ?>
		<th class="<?php echo $banktransferto_delete->Mobile_Number->headerCellClass() ?>"><span id="elh_banktransferto_Mobile_Number" class="banktransferto_Mobile_Number"><?php echo $banktransferto_delete->Mobile_Number->caption() ?></span></th>
<?php } ?>
<?php if ($banktransferto_delete->AccountNo->Visible) { // AccountNo ?>
		<th class="<?php echo $banktransferto_delete->AccountNo->headerCellClass() ?>"><span id="elh_banktransferto_AccountNo" class="banktransferto_AccountNo"><?php echo $banktransferto_delete->AccountNo->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$banktransferto_delete->RecordCount = 0;
$i = 0;
while (!$banktransferto_delete->Recordset->EOF) {
	$banktransferto_delete->RecordCount++;
	$banktransferto_delete->RowCount++;

	// Set row properties
	$banktransferto->resetAttributes();
	$banktransferto->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$banktransferto_delete->loadRowValues($banktransferto_delete->Recordset);

	// Render row
	$banktransferto_delete->renderRow();
?>
	<tr <?php echo $banktransferto->rowAttributes() ?>>
<?php if ($banktransferto_delete->id->Visible) { // id ?>
		<td <?php echo $banktransferto_delete->id->cellAttributes() ?>>
<span id="el<?php echo $banktransferto_delete->RowCount ?>_banktransferto_id" class="banktransferto_id">
<span<?php echo $banktransferto_delete->id->viewAttributes() ?>><?php echo $banktransferto_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($banktransferto_delete->Name->Visible) { // Name ?>
		<td <?php echo $banktransferto_delete->Name->cellAttributes() ?>>
<span id="el<?php echo $banktransferto_delete->RowCount ?>_banktransferto_Name" class="banktransferto_Name">
<span<?php echo $banktransferto_delete->Name->viewAttributes() ?>><?php echo $banktransferto_delete->Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($banktransferto_delete->Street_Address->Visible) { // Street_Address ?>
		<td <?php echo $banktransferto_delete->Street_Address->cellAttributes() ?>>
<span id="el<?php echo $banktransferto_delete->RowCount ?>_banktransferto_Street_Address" class="banktransferto_Street_Address">
<span<?php echo $banktransferto_delete->Street_Address->viewAttributes() ?>><?php echo $banktransferto_delete->Street_Address->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($banktransferto_delete->City->Visible) { // City ?>
		<td <?php echo $banktransferto_delete->City->cellAttributes() ?>>
<span id="el<?php echo $banktransferto_delete->RowCount ?>_banktransferto_City" class="banktransferto_City">
<span<?php echo $banktransferto_delete->City->viewAttributes() ?>><?php echo $banktransferto_delete->City->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($banktransferto_delete->State->Visible) { // State ?>
		<td <?php echo $banktransferto_delete->State->cellAttributes() ?>>
<span id="el<?php echo $banktransferto_delete->RowCount ?>_banktransferto_State" class="banktransferto_State">
<span<?php echo $banktransferto_delete->State->viewAttributes() ?>><?php echo $banktransferto_delete->State->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($banktransferto_delete->Zipcode->Visible) { // Zipcode ?>
		<td <?php echo $banktransferto_delete->Zipcode->cellAttributes() ?>>
<span id="el<?php echo $banktransferto_delete->RowCount ?>_banktransferto_Zipcode" class="banktransferto_Zipcode">
<span<?php echo $banktransferto_delete->Zipcode->viewAttributes() ?>><?php echo $banktransferto_delete->Zipcode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($banktransferto_delete->Mobile_Number->Visible) { // Mobile_Number ?>
		<td <?php echo $banktransferto_delete->Mobile_Number->cellAttributes() ?>>
<span id="el<?php echo $banktransferto_delete->RowCount ?>_banktransferto_Mobile_Number" class="banktransferto_Mobile_Number">
<span<?php echo $banktransferto_delete->Mobile_Number->viewAttributes() ?>><?php echo $banktransferto_delete->Mobile_Number->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($banktransferto_delete->AccountNo->Visible) { // AccountNo ?>
		<td <?php echo $banktransferto_delete->AccountNo->cellAttributes() ?>>
<span id="el<?php echo $banktransferto_delete->RowCount ?>_banktransferto_AccountNo" class="banktransferto_AccountNo">
<span<?php echo $banktransferto_delete->AccountNo->viewAttributes() ?>><?php echo $banktransferto_delete->AccountNo->getViewValue() ?></span>
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
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php include_once "footer.php"; ?>
<?php
$banktransferto_delete->terminate();
?>