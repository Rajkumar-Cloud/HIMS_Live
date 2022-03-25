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
$ivf_stimulation_gnrh_delete = new ivf_stimulation_gnrh_delete();

// Run the page
$ivf_stimulation_gnrh_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_stimulation_gnrh_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fivf_stimulation_gnrhdelete = currentForm = new ew.Form("fivf_stimulation_gnrhdelete", "delete");

// Form_CustomValidate event
fivf_stimulation_gnrhdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_stimulation_gnrhdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $ivf_stimulation_gnrh_delete->showPageHeader(); ?>
<?php
$ivf_stimulation_gnrh_delete->showMessage();
?>
<form name="fivf_stimulation_gnrhdelete" id="fivf_stimulation_gnrhdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ivf_stimulation_gnrh_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_stimulation_gnrh_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_stimulation_gnrh">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($ivf_stimulation_gnrh_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($ivf_stimulation_gnrh->id->Visible) { // id ?>
		<th class="<?php echo $ivf_stimulation_gnrh->id->headerCellClass() ?>"><span id="elh_ivf_stimulation_gnrh_id" class="ivf_stimulation_gnrh_id"><?php echo $ivf_stimulation_gnrh->id->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_stimulation_gnrh->Name->Visible) { // Name ?>
		<th class="<?php echo $ivf_stimulation_gnrh->Name->headerCellClass() ?>"><span id="elh_ivf_stimulation_gnrh_Name" class="ivf_stimulation_gnrh_Name"><?php echo $ivf_stimulation_gnrh->Name->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$ivf_stimulation_gnrh_delete->RecCnt = 0;
$i = 0;
while (!$ivf_stimulation_gnrh_delete->Recordset->EOF) {
	$ivf_stimulation_gnrh_delete->RecCnt++;
	$ivf_stimulation_gnrh_delete->RowCnt++;

	// Set row properties
	$ivf_stimulation_gnrh->resetAttributes();
	$ivf_stimulation_gnrh->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$ivf_stimulation_gnrh_delete->loadRowValues($ivf_stimulation_gnrh_delete->Recordset);

	// Render row
	$ivf_stimulation_gnrh_delete->renderRow();
?>
	<tr<?php echo $ivf_stimulation_gnrh->rowAttributes() ?>>
<?php if ($ivf_stimulation_gnrh->id->Visible) { // id ?>
		<td<?php echo $ivf_stimulation_gnrh->id->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_gnrh_delete->RowCnt ?>_ivf_stimulation_gnrh_id" class="ivf_stimulation_gnrh_id">
<span<?php echo $ivf_stimulation_gnrh->id->viewAttributes() ?>>
<?php echo $ivf_stimulation_gnrh->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_stimulation_gnrh->Name->Visible) { // Name ?>
		<td<?php echo $ivf_stimulation_gnrh->Name->cellAttributes() ?>>
<span id="el<?php echo $ivf_stimulation_gnrh_delete->RowCnt ?>_ivf_stimulation_gnrh_Name" class="ivf_stimulation_gnrh_Name">
<span<?php echo $ivf_stimulation_gnrh->Name->viewAttributes() ?>>
<?php echo $ivf_stimulation_gnrh->Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$ivf_stimulation_gnrh_delete->Recordset->moveNext();
}
$ivf_stimulation_gnrh_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $ivf_stimulation_gnrh_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$ivf_stimulation_gnrh_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$ivf_stimulation_gnrh_delete->terminate();
?>