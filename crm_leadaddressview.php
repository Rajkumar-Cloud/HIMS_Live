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
$crm_leadaddress_view = new crm_leadaddress_view();

// Run the page
$crm_leadaddress_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$crm_leadaddress_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$crm_leadaddress->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fcrm_leadaddressview = currentForm = new ew.Form("fcrm_leadaddressview", "view");

// Form_CustomValidate event
fcrm_leadaddressview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fcrm_leadaddressview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$crm_leadaddress->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $crm_leadaddress_view->ExportOptions->render("body") ?>
<?php $crm_leadaddress_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $crm_leadaddress_view->showPageHeader(); ?>
<?php
$crm_leadaddress_view->showMessage();
?>
<form name="fcrm_leadaddressview" id="fcrm_leadaddressview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($crm_leadaddress_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $crm_leadaddress_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="crm_leadaddress">
<input type="hidden" name="modal" value="<?php echo (int)$crm_leadaddress_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($crm_leadaddress->leadaddressid->Visible) { // leadaddressid ?>
	<tr id="r_leadaddressid">
		<td class="<?php echo $crm_leadaddress_view->TableLeftColumnClass ?>"><span id="elh_crm_leadaddress_leadaddressid"><?php echo $crm_leadaddress->leadaddressid->caption() ?></span></td>
		<td data-name="leadaddressid"<?php echo $crm_leadaddress->leadaddressid->cellAttributes() ?>>
<span id="el_crm_leadaddress_leadaddressid">
<span<?php echo $crm_leadaddress->leadaddressid->viewAttributes() ?>>
<?php echo $crm_leadaddress->leadaddressid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_leadaddress->phone->Visible) { // phone ?>
	<tr id="r_phone">
		<td class="<?php echo $crm_leadaddress_view->TableLeftColumnClass ?>"><span id="elh_crm_leadaddress_phone"><?php echo $crm_leadaddress->phone->caption() ?></span></td>
		<td data-name="phone"<?php echo $crm_leadaddress->phone->cellAttributes() ?>>
<span id="el_crm_leadaddress_phone">
<span<?php echo $crm_leadaddress->phone->viewAttributes() ?>>
<?php echo $crm_leadaddress->phone->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_leadaddress->mobile->Visible) { // mobile ?>
	<tr id="r_mobile">
		<td class="<?php echo $crm_leadaddress_view->TableLeftColumnClass ?>"><span id="elh_crm_leadaddress_mobile"><?php echo $crm_leadaddress->mobile->caption() ?></span></td>
		<td data-name="mobile"<?php echo $crm_leadaddress->mobile->cellAttributes() ?>>
<span id="el_crm_leadaddress_mobile">
<span<?php echo $crm_leadaddress->mobile->viewAttributes() ?>>
<?php echo $crm_leadaddress->mobile->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_leadaddress->fax->Visible) { // fax ?>
	<tr id="r_fax">
		<td class="<?php echo $crm_leadaddress_view->TableLeftColumnClass ?>"><span id="elh_crm_leadaddress_fax"><?php echo $crm_leadaddress->fax->caption() ?></span></td>
		<td data-name="fax"<?php echo $crm_leadaddress->fax->cellAttributes() ?>>
<span id="el_crm_leadaddress_fax">
<span<?php echo $crm_leadaddress->fax->viewAttributes() ?>>
<?php echo $crm_leadaddress->fax->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_leadaddress->addresslevel1a->Visible) { // addresslevel1a ?>
	<tr id="r_addresslevel1a">
		<td class="<?php echo $crm_leadaddress_view->TableLeftColumnClass ?>"><span id="elh_crm_leadaddress_addresslevel1a"><?php echo $crm_leadaddress->addresslevel1a->caption() ?></span></td>
		<td data-name="addresslevel1a"<?php echo $crm_leadaddress->addresslevel1a->cellAttributes() ?>>
<span id="el_crm_leadaddress_addresslevel1a">
<span<?php echo $crm_leadaddress->addresslevel1a->viewAttributes() ?>>
<?php echo $crm_leadaddress->addresslevel1a->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_leadaddress->addresslevel2a->Visible) { // addresslevel2a ?>
	<tr id="r_addresslevel2a">
		<td class="<?php echo $crm_leadaddress_view->TableLeftColumnClass ?>"><span id="elh_crm_leadaddress_addresslevel2a"><?php echo $crm_leadaddress->addresslevel2a->caption() ?></span></td>
		<td data-name="addresslevel2a"<?php echo $crm_leadaddress->addresslevel2a->cellAttributes() ?>>
<span id="el_crm_leadaddress_addresslevel2a">
<span<?php echo $crm_leadaddress->addresslevel2a->viewAttributes() ?>>
<?php echo $crm_leadaddress->addresslevel2a->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_leadaddress->addresslevel3a->Visible) { // addresslevel3a ?>
	<tr id="r_addresslevel3a">
		<td class="<?php echo $crm_leadaddress_view->TableLeftColumnClass ?>"><span id="elh_crm_leadaddress_addresslevel3a"><?php echo $crm_leadaddress->addresslevel3a->caption() ?></span></td>
		<td data-name="addresslevel3a"<?php echo $crm_leadaddress->addresslevel3a->cellAttributes() ?>>
<span id="el_crm_leadaddress_addresslevel3a">
<span<?php echo $crm_leadaddress->addresslevel3a->viewAttributes() ?>>
<?php echo $crm_leadaddress->addresslevel3a->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_leadaddress->addresslevel4a->Visible) { // addresslevel4a ?>
	<tr id="r_addresslevel4a">
		<td class="<?php echo $crm_leadaddress_view->TableLeftColumnClass ?>"><span id="elh_crm_leadaddress_addresslevel4a"><?php echo $crm_leadaddress->addresslevel4a->caption() ?></span></td>
		<td data-name="addresslevel4a"<?php echo $crm_leadaddress->addresslevel4a->cellAttributes() ?>>
<span id="el_crm_leadaddress_addresslevel4a">
<span<?php echo $crm_leadaddress->addresslevel4a->viewAttributes() ?>>
<?php echo $crm_leadaddress->addresslevel4a->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_leadaddress->addresslevel5a->Visible) { // addresslevel5a ?>
	<tr id="r_addresslevel5a">
		<td class="<?php echo $crm_leadaddress_view->TableLeftColumnClass ?>"><span id="elh_crm_leadaddress_addresslevel5a"><?php echo $crm_leadaddress->addresslevel5a->caption() ?></span></td>
		<td data-name="addresslevel5a"<?php echo $crm_leadaddress->addresslevel5a->cellAttributes() ?>>
<span id="el_crm_leadaddress_addresslevel5a">
<span<?php echo $crm_leadaddress->addresslevel5a->viewAttributes() ?>>
<?php echo $crm_leadaddress->addresslevel5a->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_leadaddress->addresslevel6a->Visible) { // addresslevel6a ?>
	<tr id="r_addresslevel6a">
		<td class="<?php echo $crm_leadaddress_view->TableLeftColumnClass ?>"><span id="elh_crm_leadaddress_addresslevel6a"><?php echo $crm_leadaddress->addresslevel6a->caption() ?></span></td>
		<td data-name="addresslevel6a"<?php echo $crm_leadaddress->addresslevel6a->cellAttributes() ?>>
<span id="el_crm_leadaddress_addresslevel6a">
<span<?php echo $crm_leadaddress->addresslevel6a->viewAttributes() ?>>
<?php echo $crm_leadaddress->addresslevel6a->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_leadaddress->addresslevel7a->Visible) { // addresslevel7a ?>
	<tr id="r_addresslevel7a">
		<td class="<?php echo $crm_leadaddress_view->TableLeftColumnClass ?>"><span id="elh_crm_leadaddress_addresslevel7a"><?php echo $crm_leadaddress->addresslevel7a->caption() ?></span></td>
		<td data-name="addresslevel7a"<?php echo $crm_leadaddress->addresslevel7a->cellAttributes() ?>>
<span id="el_crm_leadaddress_addresslevel7a">
<span<?php echo $crm_leadaddress->addresslevel7a->viewAttributes() ?>>
<?php echo $crm_leadaddress->addresslevel7a->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_leadaddress->addresslevel8a->Visible) { // addresslevel8a ?>
	<tr id="r_addresslevel8a">
		<td class="<?php echo $crm_leadaddress_view->TableLeftColumnClass ?>"><span id="elh_crm_leadaddress_addresslevel8a"><?php echo $crm_leadaddress->addresslevel8a->caption() ?></span></td>
		<td data-name="addresslevel8a"<?php echo $crm_leadaddress->addresslevel8a->cellAttributes() ?>>
<span id="el_crm_leadaddress_addresslevel8a">
<span<?php echo $crm_leadaddress->addresslevel8a->viewAttributes() ?>>
<?php echo $crm_leadaddress->addresslevel8a->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_leadaddress->buildingnumbera->Visible) { // buildingnumbera ?>
	<tr id="r_buildingnumbera">
		<td class="<?php echo $crm_leadaddress_view->TableLeftColumnClass ?>"><span id="elh_crm_leadaddress_buildingnumbera"><?php echo $crm_leadaddress->buildingnumbera->caption() ?></span></td>
		<td data-name="buildingnumbera"<?php echo $crm_leadaddress->buildingnumbera->cellAttributes() ?>>
<span id="el_crm_leadaddress_buildingnumbera">
<span<?php echo $crm_leadaddress->buildingnumbera->viewAttributes() ?>>
<?php echo $crm_leadaddress->buildingnumbera->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_leadaddress->localnumbera->Visible) { // localnumbera ?>
	<tr id="r_localnumbera">
		<td class="<?php echo $crm_leadaddress_view->TableLeftColumnClass ?>"><span id="elh_crm_leadaddress_localnumbera"><?php echo $crm_leadaddress->localnumbera->caption() ?></span></td>
		<td data-name="localnumbera"<?php echo $crm_leadaddress->localnumbera->cellAttributes() ?>>
<span id="el_crm_leadaddress_localnumbera">
<span<?php echo $crm_leadaddress->localnumbera->viewAttributes() ?>>
<?php echo $crm_leadaddress->localnumbera->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_leadaddress->poboxa->Visible) { // poboxa ?>
	<tr id="r_poboxa">
		<td class="<?php echo $crm_leadaddress_view->TableLeftColumnClass ?>"><span id="elh_crm_leadaddress_poboxa"><?php echo $crm_leadaddress->poboxa->caption() ?></span></td>
		<td data-name="poboxa"<?php echo $crm_leadaddress->poboxa->cellAttributes() ?>>
<span id="el_crm_leadaddress_poboxa">
<span<?php echo $crm_leadaddress->poboxa->viewAttributes() ?>>
<?php echo $crm_leadaddress->poboxa->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_leadaddress->phone_extra->Visible) { // phone_extra ?>
	<tr id="r_phone_extra">
		<td class="<?php echo $crm_leadaddress_view->TableLeftColumnClass ?>"><span id="elh_crm_leadaddress_phone_extra"><?php echo $crm_leadaddress->phone_extra->caption() ?></span></td>
		<td data-name="phone_extra"<?php echo $crm_leadaddress->phone_extra->cellAttributes() ?>>
<span id="el_crm_leadaddress_phone_extra">
<span<?php echo $crm_leadaddress->phone_extra->viewAttributes() ?>>
<?php echo $crm_leadaddress->phone_extra->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_leadaddress->mobile_extra->Visible) { // mobile_extra ?>
	<tr id="r_mobile_extra">
		<td class="<?php echo $crm_leadaddress_view->TableLeftColumnClass ?>"><span id="elh_crm_leadaddress_mobile_extra"><?php echo $crm_leadaddress->mobile_extra->caption() ?></span></td>
		<td data-name="mobile_extra"<?php echo $crm_leadaddress->mobile_extra->cellAttributes() ?>>
<span id="el_crm_leadaddress_mobile_extra">
<span<?php echo $crm_leadaddress->mobile_extra->viewAttributes() ?>>
<?php echo $crm_leadaddress->mobile_extra->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_leadaddress->fax_extra->Visible) { // fax_extra ?>
	<tr id="r_fax_extra">
		<td class="<?php echo $crm_leadaddress_view->TableLeftColumnClass ?>"><span id="elh_crm_leadaddress_fax_extra"><?php echo $crm_leadaddress->fax_extra->caption() ?></span></td>
		<td data-name="fax_extra"<?php echo $crm_leadaddress->fax_extra->cellAttributes() ?>>
<span id="el_crm_leadaddress_fax_extra">
<span<?php echo $crm_leadaddress->fax_extra->viewAttributes() ?>>
<?php echo $crm_leadaddress->fax_extra->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$crm_leadaddress_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$crm_leadaddress->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$crm_leadaddress_view->terminate();
?>