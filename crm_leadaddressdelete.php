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
$crm_leadaddress_delete = new crm_leadaddress_delete();

// Run the page
$crm_leadaddress_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$crm_leadaddress_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fcrm_leadaddressdelete = currentForm = new ew.Form("fcrm_leadaddressdelete", "delete");

// Form_CustomValidate event
fcrm_leadaddressdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fcrm_leadaddressdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $crm_leadaddress_delete->showPageHeader(); ?>
<?php
$crm_leadaddress_delete->showMessage();
?>
<form name="fcrm_leadaddressdelete" id="fcrm_leadaddressdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($crm_leadaddress_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $crm_leadaddress_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="crm_leadaddress">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($crm_leadaddress_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($crm_leadaddress->leadaddressid->Visible) { // leadaddressid ?>
		<th class="<?php echo $crm_leadaddress->leadaddressid->headerCellClass() ?>"><span id="elh_crm_leadaddress_leadaddressid" class="crm_leadaddress_leadaddressid"><?php echo $crm_leadaddress->leadaddressid->caption() ?></span></th>
<?php } ?>
<?php if ($crm_leadaddress->phone->Visible) { // phone ?>
		<th class="<?php echo $crm_leadaddress->phone->headerCellClass() ?>"><span id="elh_crm_leadaddress_phone" class="crm_leadaddress_phone"><?php echo $crm_leadaddress->phone->caption() ?></span></th>
<?php } ?>
<?php if ($crm_leadaddress->mobile->Visible) { // mobile ?>
		<th class="<?php echo $crm_leadaddress->mobile->headerCellClass() ?>"><span id="elh_crm_leadaddress_mobile" class="crm_leadaddress_mobile"><?php echo $crm_leadaddress->mobile->caption() ?></span></th>
<?php } ?>
<?php if ($crm_leadaddress->fax->Visible) { // fax ?>
		<th class="<?php echo $crm_leadaddress->fax->headerCellClass() ?>"><span id="elh_crm_leadaddress_fax" class="crm_leadaddress_fax"><?php echo $crm_leadaddress->fax->caption() ?></span></th>
<?php } ?>
<?php if ($crm_leadaddress->addresslevel1a->Visible) { // addresslevel1a ?>
		<th class="<?php echo $crm_leadaddress->addresslevel1a->headerCellClass() ?>"><span id="elh_crm_leadaddress_addresslevel1a" class="crm_leadaddress_addresslevel1a"><?php echo $crm_leadaddress->addresslevel1a->caption() ?></span></th>
<?php } ?>
<?php if ($crm_leadaddress->addresslevel2a->Visible) { // addresslevel2a ?>
		<th class="<?php echo $crm_leadaddress->addresslevel2a->headerCellClass() ?>"><span id="elh_crm_leadaddress_addresslevel2a" class="crm_leadaddress_addresslevel2a"><?php echo $crm_leadaddress->addresslevel2a->caption() ?></span></th>
<?php } ?>
<?php if ($crm_leadaddress->addresslevel3a->Visible) { // addresslevel3a ?>
		<th class="<?php echo $crm_leadaddress->addresslevel3a->headerCellClass() ?>"><span id="elh_crm_leadaddress_addresslevel3a" class="crm_leadaddress_addresslevel3a"><?php echo $crm_leadaddress->addresslevel3a->caption() ?></span></th>
<?php } ?>
<?php if ($crm_leadaddress->addresslevel4a->Visible) { // addresslevel4a ?>
		<th class="<?php echo $crm_leadaddress->addresslevel4a->headerCellClass() ?>"><span id="elh_crm_leadaddress_addresslevel4a" class="crm_leadaddress_addresslevel4a"><?php echo $crm_leadaddress->addresslevel4a->caption() ?></span></th>
<?php } ?>
<?php if ($crm_leadaddress->addresslevel5a->Visible) { // addresslevel5a ?>
		<th class="<?php echo $crm_leadaddress->addresslevel5a->headerCellClass() ?>"><span id="elh_crm_leadaddress_addresslevel5a" class="crm_leadaddress_addresslevel5a"><?php echo $crm_leadaddress->addresslevel5a->caption() ?></span></th>
<?php } ?>
<?php if ($crm_leadaddress->addresslevel6a->Visible) { // addresslevel6a ?>
		<th class="<?php echo $crm_leadaddress->addresslevel6a->headerCellClass() ?>"><span id="elh_crm_leadaddress_addresslevel6a" class="crm_leadaddress_addresslevel6a"><?php echo $crm_leadaddress->addresslevel6a->caption() ?></span></th>
<?php } ?>
<?php if ($crm_leadaddress->addresslevel7a->Visible) { // addresslevel7a ?>
		<th class="<?php echo $crm_leadaddress->addresslevel7a->headerCellClass() ?>"><span id="elh_crm_leadaddress_addresslevel7a" class="crm_leadaddress_addresslevel7a"><?php echo $crm_leadaddress->addresslevel7a->caption() ?></span></th>
<?php } ?>
<?php if ($crm_leadaddress->addresslevel8a->Visible) { // addresslevel8a ?>
		<th class="<?php echo $crm_leadaddress->addresslevel8a->headerCellClass() ?>"><span id="elh_crm_leadaddress_addresslevel8a" class="crm_leadaddress_addresslevel8a"><?php echo $crm_leadaddress->addresslevel8a->caption() ?></span></th>
<?php } ?>
<?php if ($crm_leadaddress->buildingnumbera->Visible) { // buildingnumbera ?>
		<th class="<?php echo $crm_leadaddress->buildingnumbera->headerCellClass() ?>"><span id="elh_crm_leadaddress_buildingnumbera" class="crm_leadaddress_buildingnumbera"><?php echo $crm_leadaddress->buildingnumbera->caption() ?></span></th>
<?php } ?>
<?php if ($crm_leadaddress->localnumbera->Visible) { // localnumbera ?>
		<th class="<?php echo $crm_leadaddress->localnumbera->headerCellClass() ?>"><span id="elh_crm_leadaddress_localnumbera" class="crm_leadaddress_localnumbera"><?php echo $crm_leadaddress->localnumbera->caption() ?></span></th>
<?php } ?>
<?php if ($crm_leadaddress->poboxa->Visible) { // poboxa ?>
		<th class="<?php echo $crm_leadaddress->poboxa->headerCellClass() ?>"><span id="elh_crm_leadaddress_poboxa" class="crm_leadaddress_poboxa"><?php echo $crm_leadaddress->poboxa->caption() ?></span></th>
<?php } ?>
<?php if ($crm_leadaddress->phone_extra->Visible) { // phone_extra ?>
		<th class="<?php echo $crm_leadaddress->phone_extra->headerCellClass() ?>"><span id="elh_crm_leadaddress_phone_extra" class="crm_leadaddress_phone_extra"><?php echo $crm_leadaddress->phone_extra->caption() ?></span></th>
<?php } ?>
<?php if ($crm_leadaddress->mobile_extra->Visible) { // mobile_extra ?>
		<th class="<?php echo $crm_leadaddress->mobile_extra->headerCellClass() ?>"><span id="elh_crm_leadaddress_mobile_extra" class="crm_leadaddress_mobile_extra"><?php echo $crm_leadaddress->mobile_extra->caption() ?></span></th>
<?php } ?>
<?php if ($crm_leadaddress->fax_extra->Visible) { // fax_extra ?>
		<th class="<?php echo $crm_leadaddress->fax_extra->headerCellClass() ?>"><span id="elh_crm_leadaddress_fax_extra" class="crm_leadaddress_fax_extra"><?php echo $crm_leadaddress->fax_extra->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$crm_leadaddress_delete->RecCnt = 0;
$i = 0;
while (!$crm_leadaddress_delete->Recordset->EOF) {
	$crm_leadaddress_delete->RecCnt++;
	$crm_leadaddress_delete->RowCnt++;

	// Set row properties
	$crm_leadaddress->resetAttributes();
	$crm_leadaddress->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$crm_leadaddress_delete->loadRowValues($crm_leadaddress_delete->Recordset);

	// Render row
	$crm_leadaddress_delete->renderRow();
?>
	<tr<?php echo $crm_leadaddress->rowAttributes() ?>>
<?php if ($crm_leadaddress->leadaddressid->Visible) { // leadaddressid ?>
		<td<?php echo $crm_leadaddress->leadaddressid->cellAttributes() ?>>
<span id="el<?php echo $crm_leadaddress_delete->RowCnt ?>_crm_leadaddress_leadaddressid" class="crm_leadaddress_leadaddressid">
<span<?php echo $crm_leadaddress->leadaddressid->viewAttributes() ?>>
<?php echo $crm_leadaddress->leadaddressid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_leadaddress->phone->Visible) { // phone ?>
		<td<?php echo $crm_leadaddress->phone->cellAttributes() ?>>
<span id="el<?php echo $crm_leadaddress_delete->RowCnt ?>_crm_leadaddress_phone" class="crm_leadaddress_phone">
<span<?php echo $crm_leadaddress->phone->viewAttributes() ?>>
<?php echo $crm_leadaddress->phone->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_leadaddress->mobile->Visible) { // mobile ?>
		<td<?php echo $crm_leadaddress->mobile->cellAttributes() ?>>
<span id="el<?php echo $crm_leadaddress_delete->RowCnt ?>_crm_leadaddress_mobile" class="crm_leadaddress_mobile">
<span<?php echo $crm_leadaddress->mobile->viewAttributes() ?>>
<?php echo $crm_leadaddress->mobile->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_leadaddress->fax->Visible) { // fax ?>
		<td<?php echo $crm_leadaddress->fax->cellAttributes() ?>>
<span id="el<?php echo $crm_leadaddress_delete->RowCnt ?>_crm_leadaddress_fax" class="crm_leadaddress_fax">
<span<?php echo $crm_leadaddress->fax->viewAttributes() ?>>
<?php echo $crm_leadaddress->fax->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_leadaddress->addresslevel1a->Visible) { // addresslevel1a ?>
		<td<?php echo $crm_leadaddress->addresslevel1a->cellAttributes() ?>>
<span id="el<?php echo $crm_leadaddress_delete->RowCnt ?>_crm_leadaddress_addresslevel1a" class="crm_leadaddress_addresslevel1a">
<span<?php echo $crm_leadaddress->addresslevel1a->viewAttributes() ?>>
<?php echo $crm_leadaddress->addresslevel1a->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_leadaddress->addresslevel2a->Visible) { // addresslevel2a ?>
		<td<?php echo $crm_leadaddress->addresslevel2a->cellAttributes() ?>>
<span id="el<?php echo $crm_leadaddress_delete->RowCnt ?>_crm_leadaddress_addresslevel2a" class="crm_leadaddress_addresslevel2a">
<span<?php echo $crm_leadaddress->addresslevel2a->viewAttributes() ?>>
<?php echo $crm_leadaddress->addresslevel2a->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_leadaddress->addresslevel3a->Visible) { // addresslevel3a ?>
		<td<?php echo $crm_leadaddress->addresslevel3a->cellAttributes() ?>>
<span id="el<?php echo $crm_leadaddress_delete->RowCnt ?>_crm_leadaddress_addresslevel3a" class="crm_leadaddress_addresslevel3a">
<span<?php echo $crm_leadaddress->addresslevel3a->viewAttributes() ?>>
<?php echo $crm_leadaddress->addresslevel3a->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_leadaddress->addresslevel4a->Visible) { // addresslevel4a ?>
		<td<?php echo $crm_leadaddress->addresslevel4a->cellAttributes() ?>>
<span id="el<?php echo $crm_leadaddress_delete->RowCnt ?>_crm_leadaddress_addresslevel4a" class="crm_leadaddress_addresslevel4a">
<span<?php echo $crm_leadaddress->addresslevel4a->viewAttributes() ?>>
<?php echo $crm_leadaddress->addresslevel4a->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_leadaddress->addresslevel5a->Visible) { // addresslevel5a ?>
		<td<?php echo $crm_leadaddress->addresslevel5a->cellAttributes() ?>>
<span id="el<?php echo $crm_leadaddress_delete->RowCnt ?>_crm_leadaddress_addresslevel5a" class="crm_leadaddress_addresslevel5a">
<span<?php echo $crm_leadaddress->addresslevel5a->viewAttributes() ?>>
<?php echo $crm_leadaddress->addresslevel5a->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_leadaddress->addresslevel6a->Visible) { // addresslevel6a ?>
		<td<?php echo $crm_leadaddress->addresslevel6a->cellAttributes() ?>>
<span id="el<?php echo $crm_leadaddress_delete->RowCnt ?>_crm_leadaddress_addresslevel6a" class="crm_leadaddress_addresslevel6a">
<span<?php echo $crm_leadaddress->addresslevel6a->viewAttributes() ?>>
<?php echo $crm_leadaddress->addresslevel6a->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_leadaddress->addresslevel7a->Visible) { // addresslevel7a ?>
		<td<?php echo $crm_leadaddress->addresslevel7a->cellAttributes() ?>>
<span id="el<?php echo $crm_leadaddress_delete->RowCnt ?>_crm_leadaddress_addresslevel7a" class="crm_leadaddress_addresslevel7a">
<span<?php echo $crm_leadaddress->addresslevel7a->viewAttributes() ?>>
<?php echo $crm_leadaddress->addresslevel7a->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_leadaddress->addresslevel8a->Visible) { // addresslevel8a ?>
		<td<?php echo $crm_leadaddress->addresslevel8a->cellAttributes() ?>>
<span id="el<?php echo $crm_leadaddress_delete->RowCnt ?>_crm_leadaddress_addresslevel8a" class="crm_leadaddress_addresslevel8a">
<span<?php echo $crm_leadaddress->addresslevel8a->viewAttributes() ?>>
<?php echo $crm_leadaddress->addresslevel8a->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_leadaddress->buildingnumbera->Visible) { // buildingnumbera ?>
		<td<?php echo $crm_leadaddress->buildingnumbera->cellAttributes() ?>>
<span id="el<?php echo $crm_leadaddress_delete->RowCnt ?>_crm_leadaddress_buildingnumbera" class="crm_leadaddress_buildingnumbera">
<span<?php echo $crm_leadaddress->buildingnumbera->viewAttributes() ?>>
<?php echo $crm_leadaddress->buildingnumbera->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_leadaddress->localnumbera->Visible) { // localnumbera ?>
		<td<?php echo $crm_leadaddress->localnumbera->cellAttributes() ?>>
<span id="el<?php echo $crm_leadaddress_delete->RowCnt ?>_crm_leadaddress_localnumbera" class="crm_leadaddress_localnumbera">
<span<?php echo $crm_leadaddress->localnumbera->viewAttributes() ?>>
<?php echo $crm_leadaddress->localnumbera->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_leadaddress->poboxa->Visible) { // poboxa ?>
		<td<?php echo $crm_leadaddress->poboxa->cellAttributes() ?>>
<span id="el<?php echo $crm_leadaddress_delete->RowCnt ?>_crm_leadaddress_poboxa" class="crm_leadaddress_poboxa">
<span<?php echo $crm_leadaddress->poboxa->viewAttributes() ?>>
<?php echo $crm_leadaddress->poboxa->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_leadaddress->phone_extra->Visible) { // phone_extra ?>
		<td<?php echo $crm_leadaddress->phone_extra->cellAttributes() ?>>
<span id="el<?php echo $crm_leadaddress_delete->RowCnt ?>_crm_leadaddress_phone_extra" class="crm_leadaddress_phone_extra">
<span<?php echo $crm_leadaddress->phone_extra->viewAttributes() ?>>
<?php echo $crm_leadaddress->phone_extra->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_leadaddress->mobile_extra->Visible) { // mobile_extra ?>
		<td<?php echo $crm_leadaddress->mobile_extra->cellAttributes() ?>>
<span id="el<?php echo $crm_leadaddress_delete->RowCnt ?>_crm_leadaddress_mobile_extra" class="crm_leadaddress_mobile_extra">
<span<?php echo $crm_leadaddress->mobile_extra->viewAttributes() ?>>
<?php echo $crm_leadaddress->mobile_extra->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($crm_leadaddress->fax_extra->Visible) { // fax_extra ?>
		<td<?php echo $crm_leadaddress->fax_extra->cellAttributes() ?>>
<span id="el<?php echo $crm_leadaddress_delete->RowCnt ?>_crm_leadaddress_fax_extra" class="crm_leadaddress_fax_extra">
<span<?php echo $crm_leadaddress->fax_extra->viewAttributes() ?>>
<?php echo $crm_leadaddress->fax_extra->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$crm_leadaddress_delete->Recordset->moveNext();
}
$crm_leadaddress_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $crm_leadaddress_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$crm_leadaddress_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$crm_leadaddress_delete->terminate();
?>