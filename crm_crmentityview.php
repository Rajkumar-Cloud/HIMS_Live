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
$crm_crmentity_view = new crm_crmentity_view();

// Run the page
$crm_crmentity_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$crm_crmentity_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$crm_crmentity->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fcrm_crmentityview = currentForm = new ew.Form("fcrm_crmentityview", "view");

// Form_CustomValidate event
fcrm_crmentityview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fcrm_crmentityview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$crm_crmentity->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $crm_crmentity_view->ExportOptions->render("body") ?>
<?php $crm_crmentity_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $crm_crmentity_view->showPageHeader(); ?>
<?php
$crm_crmentity_view->showMessage();
?>
<form name="fcrm_crmentityview" id="fcrm_crmentityview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($crm_crmentity_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $crm_crmentity_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="crm_crmentity">
<input type="hidden" name="modal" value="<?php echo (int)$crm_crmentity_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($crm_crmentity->crmid->Visible) { // crmid ?>
	<tr id="r_crmid">
		<td class="<?php echo $crm_crmentity_view->TableLeftColumnClass ?>"><span id="elh_crm_crmentity_crmid"><?php echo $crm_crmentity->crmid->caption() ?></span></td>
		<td data-name="crmid"<?php echo $crm_crmentity->crmid->cellAttributes() ?>>
<span id="el_crm_crmentity_crmid">
<span<?php echo $crm_crmentity->crmid->viewAttributes() ?>>
<?php echo $crm_crmentity->crmid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_crmentity->smcreatorid->Visible) { // smcreatorid ?>
	<tr id="r_smcreatorid">
		<td class="<?php echo $crm_crmentity_view->TableLeftColumnClass ?>"><span id="elh_crm_crmentity_smcreatorid"><?php echo $crm_crmentity->smcreatorid->caption() ?></span></td>
		<td data-name="smcreatorid"<?php echo $crm_crmentity->smcreatorid->cellAttributes() ?>>
<span id="el_crm_crmentity_smcreatorid">
<span<?php echo $crm_crmentity->smcreatorid->viewAttributes() ?>>
<?php echo $crm_crmentity->smcreatorid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_crmentity->smownerid->Visible) { // smownerid ?>
	<tr id="r_smownerid">
		<td class="<?php echo $crm_crmentity_view->TableLeftColumnClass ?>"><span id="elh_crm_crmentity_smownerid"><?php echo $crm_crmentity->smownerid->caption() ?></span></td>
		<td data-name="smownerid"<?php echo $crm_crmentity->smownerid->cellAttributes() ?>>
<span id="el_crm_crmentity_smownerid">
<span<?php echo $crm_crmentity->smownerid->viewAttributes() ?>>
<?php echo $crm_crmentity->smownerid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_crmentity->shownerid->Visible) { // shownerid ?>
	<tr id="r_shownerid">
		<td class="<?php echo $crm_crmentity_view->TableLeftColumnClass ?>"><span id="elh_crm_crmentity_shownerid"><?php echo $crm_crmentity->shownerid->caption() ?></span></td>
		<td data-name="shownerid"<?php echo $crm_crmentity->shownerid->cellAttributes() ?>>
<span id="el_crm_crmentity_shownerid">
<span<?php echo $crm_crmentity->shownerid->viewAttributes() ?>>
<?php echo $crm_crmentity->shownerid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_crmentity->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $crm_crmentity_view->TableLeftColumnClass ?>"><span id="elh_crm_crmentity_modifiedby"><?php echo $crm_crmentity->modifiedby->caption() ?></span></td>
		<td data-name="modifiedby"<?php echo $crm_crmentity->modifiedby->cellAttributes() ?>>
<span id="el_crm_crmentity_modifiedby">
<span<?php echo $crm_crmentity->modifiedby->viewAttributes() ?>>
<?php echo $crm_crmentity->modifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_crmentity->setype->Visible) { // setype ?>
	<tr id="r_setype">
		<td class="<?php echo $crm_crmentity_view->TableLeftColumnClass ?>"><span id="elh_crm_crmentity_setype"><?php echo $crm_crmentity->setype->caption() ?></span></td>
		<td data-name="setype"<?php echo $crm_crmentity->setype->cellAttributes() ?>>
<span id="el_crm_crmentity_setype">
<span<?php echo $crm_crmentity->setype->viewAttributes() ?>>
<?php echo $crm_crmentity->setype->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_crmentity->description->Visible) { // description ?>
	<tr id="r_description">
		<td class="<?php echo $crm_crmentity_view->TableLeftColumnClass ?>"><span id="elh_crm_crmentity_description"><?php echo $crm_crmentity->description->caption() ?></span></td>
		<td data-name="description"<?php echo $crm_crmentity->description->cellAttributes() ?>>
<span id="el_crm_crmentity_description">
<span<?php echo $crm_crmentity->description->viewAttributes() ?>>
<?php echo $crm_crmentity->description->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_crmentity->attention->Visible) { // attention ?>
	<tr id="r_attention">
		<td class="<?php echo $crm_crmentity_view->TableLeftColumnClass ?>"><span id="elh_crm_crmentity_attention"><?php echo $crm_crmentity->attention->caption() ?></span></td>
		<td data-name="attention"<?php echo $crm_crmentity->attention->cellAttributes() ?>>
<span id="el_crm_crmentity_attention">
<span<?php echo $crm_crmentity->attention->viewAttributes() ?>>
<?php echo $crm_crmentity->attention->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_crmentity->createdtime->Visible) { // createdtime ?>
	<tr id="r_createdtime">
		<td class="<?php echo $crm_crmentity_view->TableLeftColumnClass ?>"><span id="elh_crm_crmentity_createdtime"><?php echo $crm_crmentity->createdtime->caption() ?></span></td>
		<td data-name="createdtime"<?php echo $crm_crmentity->createdtime->cellAttributes() ?>>
<span id="el_crm_crmentity_createdtime">
<span<?php echo $crm_crmentity->createdtime->viewAttributes() ?>>
<?php echo $crm_crmentity->createdtime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_crmentity->modifiedtime->Visible) { // modifiedtime ?>
	<tr id="r_modifiedtime">
		<td class="<?php echo $crm_crmentity_view->TableLeftColumnClass ?>"><span id="elh_crm_crmentity_modifiedtime"><?php echo $crm_crmentity->modifiedtime->caption() ?></span></td>
		<td data-name="modifiedtime"<?php echo $crm_crmentity->modifiedtime->cellAttributes() ?>>
<span id="el_crm_crmentity_modifiedtime">
<span<?php echo $crm_crmentity->modifiedtime->viewAttributes() ?>>
<?php echo $crm_crmentity->modifiedtime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_crmentity->viewedtime->Visible) { // viewedtime ?>
	<tr id="r_viewedtime">
		<td class="<?php echo $crm_crmentity_view->TableLeftColumnClass ?>"><span id="elh_crm_crmentity_viewedtime"><?php echo $crm_crmentity->viewedtime->caption() ?></span></td>
		<td data-name="viewedtime"<?php echo $crm_crmentity->viewedtime->cellAttributes() ?>>
<span id="el_crm_crmentity_viewedtime">
<span<?php echo $crm_crmentity->viewedtime->viewAttributes() ?>>
<?php echo $crm_crmentity->viewedtime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_crmentity->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $crm_crmentity_view->TableLeftColumnClass ?>"><span id="elh_crm_crmentity_status"><?php echo $crm_crmentity->status->caption() ?></span></td>
		<td data-name="status"<?php echo $crm_crmentity->status->cellAttributes() ?>>
<span id="el_crm_crmentity_status">
<span<?php echo $crm_crmentity->status->viewAttributes() ?>>
<?php echo $crm_crmentity->status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_crmentity->version->Visible) { // version ?>
	<tr id="r_version">
		<td class="<?php echo $crm_crmentity_view->TableLeftColumnClass ?>"><span id="elh_crm_crmentity_version"><?php echo $crm_crmentity->version->caption() ?></span></td>
		<td data-name="version"<?php echo $crm_crmentity->version->cellAttributes() ?>>
<span id="el_crm_crmentity_version">
<span<?php echo $crm_crmentity->version->viewAttributes() ?>>
<?php echo $crm_crmentity->version->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_crmentity->presence->Visible) { // presence ?>
	<tr id="r_presence">
		<td class="<?php echo $crm_crmentity_view->TableLeftColumnClass ?>"><span id="elh_crm_crmentity_presence"><?php echo $crm_crmentity->presence->caption() ?></span></td>
		<td data-name="presence"<?php echo $crm_crmentity->presence->cellAttributes() ?>>
<span id="el_crm_crmentity_presence">
<span<?php echo $crm_crmentity->presence->viewAttributes() ?>>
<?php echo $crm_crmentity->presence->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_crmentity->deleted->Visible) { // deleted ?>
	<tr id="r_deleted">
		<td class="<?php echo $crm_crmentity_view->TableLeftColumnClass ?>"><span id="elh_crm_crmentity_deleted"><?php echo $crm_crmentity->deleted->caption() ?></span></td>
		<td data-name="deleted"<?php echo $crm_crmentity->deleted->cellAttributes() ?>>
<span id="el_crm_crmentity_deleted">
<span<?php echo $crm_crmentity->deleted->viewAttributes() ?>>
<?php echo $crm_crmentity->deleted->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_crmentity->was_read->Visible) { // was_read ?>
	<tr id="r_was_read">
		<td class="<?php echo $crm_crmentity_view->TableLeftColumnClass ?>"><span id="elh_crm_crmentity_was_read"><?php echo $crm_crmentity->was_read->caption() ?></span></td>
		<td data-name="was_read"<?php echo $crm_crmentity->was_read->cellAttributes() ?>>
<span id="el_crm_crmentity_was_read">
<span<?php echo $crm_crmentity->was_read->viewAttributes() ?>>
<?php echo $crm_crmentity->was_read->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_crmentity->_private->Visible) { // private ?>
	<tr id="r__private">
		<td class="<?php echo $crm_crmentity_view->TableLeftColumnClass ?>"><span id="elh_crm_crmentity__private"><?php echo $crm_crmentity->_private->caption() ?></span></td>
		<td data-name="_private"<?php echo $crm_crmentity->_private->cellAttributes() ?>>
<span id="el_crm_crmentity__private">
<span<?php echo $crm_crmentity->_private->viewAttributes() ?>>
<?php echo $crm_crmentity->_private->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($crm_crmentity->users->Visible) { // users ?>
	<tr id="r_users">
		<td class="<?php echo $crm_crmentity_view->TableLeftColumnClass ?>"><span id="elh_crm_crmentity_users"><?php echo $crm_crmentity->users->caption() ?></span></td>
		<td data-name="users"<?php echo $crm_crmentity->users->cellAttributes() ?>>
<span id="el_crm_crmentity_users">
<span<?php echo $crm_crmentity->users->viewAttributes() ?>>
<?php echo $crm_crmentity->users->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$crm_crmentity_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$crm_crmentity->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$crm_crmentity_view->terminate();
?>