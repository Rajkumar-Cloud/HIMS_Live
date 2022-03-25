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
$sys_country_view = new sys_country_view();

// Run the page
$sys_country_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sys_country_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$sys_country->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fsys_countryview = currentForm = new ew.Form("fsys_countryview", "view");

// Form_CustomValidate event
fsys_countryview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fsys_countryview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$sys_country->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $sys_country_view->ExportOptions->render("body") ?>
<?php $sys_country_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $sys_country_view->showPageHeader(); ?>
<?php
$sys_country_view->showMessage();
?>
<form name="fsys_countryview" id="fsys_countryview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($sys_country_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $sys_country_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sys_country">
<input type="hidden" name="modal" value="<?php echo (int)$sys_country_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($sys_country->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $sys_country_view->TableLeftColumnClass ?>"><span id="elh_sys_country_id"><?php echo $sys_country->id->caption() ?></span></td>
		<td data-name="id"<?php echo $sys_country->id->cellAttributes() ?>>
<span id="el_sys_country_id">
<span<?php echo $sys_country->id->viewAttributes() ?>>
<?php echo $sys_country->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sys_country->code->Visible) { // code ?>
	<tr id="r_code">
		<td class="<?php echo $sys_country_view->TableLeftColumnClass ?>"><span id="elh_sys_country_code"><?php echo $sys_country->code->caption() ?></span></td>
		<td data-name="code"<?php echo $sys_country->code->cellAttributes() ?>>
<span id="el_sys_country_code">
<span<?php echo $sys_country->code->viewAttributes() ?>>
<?php echo $sys_country->code->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sys_country->namecap->Visible) { // namecap ?>
	<tr id="r_namecap">
		<td class="<?php echo $sys_country_view->TableLeftColumnClass ?>"><span id="elh_sys_country_namecap"><?php echo $sys_country->namecap->caption() ?></span></td>
		<td data-name="namecap"<?php echo $sys_country->namecap->cellAttributes() ?>>
<span id="el_sys_country_namecap">
<span<?php echo $sys_country->namecap->viewAttributes() ?>>
<?php echo $sys_country->namecap->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sys_country->name->Visible) { // name ?>
	<tr id="r_name">
		<td class="<?php echo $sys_country_view->TableLeftColumnClass ?>"><span id="elh_sys_country_name"><?php echo $sys_country->name->caption() ?></span></td>
		<td data-name="name"<?php echo $sys_country->name->cellAttributes() ?>>
<span id="el_sys_country_name">
<span<?php echo $sys_country->name->viewAttributes() ?>>
<?php echo $sys_country->name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sys_country->iso3->Visible) { // iso3 ?>
	<tr id="r_iso3">
		<td class="<?php echo $sys_country_view->TableLeftColumnClass ?>"><span id="elh_sys_country_iso3"><?php echo $sys_country->iso3->caption() ?></span></td>
		<td data-name="iso3"<?php echo $sys_country->iso3->cellAttributes() ?>>
<span id="el_sys_country_iso3">
<span<?php echo $sys_country->iso3->viewAttributes() ?>>
<?php echo $sys_country->iso3->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sys_country->numcode->Visible) { // numcode ?>
	<tr id="r_numcode">
		<td class="<?php echo $sys_country_view->TableLeftColumnClass ?>"><span id="elh_sys_country_numcode"><?php echo $sys_country->numcode->caption() ?></span></td>
		<td data-name="numcode"<?php echo $sys_country->numcode->cellAttributes() ?>>
<span id="el_sys_country_numcode">
<span<?php echo $sys_country->numcode->viewAttributes() ?>>
<?php echo $sys_country->numcode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$sys_country_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$sys_country->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$sys_country_view->terminate();
?>