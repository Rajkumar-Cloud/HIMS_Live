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
$pres_restricteddruglist_view = new pres_restricteddruglist_view();

// Run the page
$pres_restricteddruglist_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_restricteddruglist_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$pres_restricteddruglist->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fpres_restricteddruglistview = currentForm = new ew.Form("fpres_restricteddruglistview", "view");

// Form_CustomValidate event
fpres_restricteddruglistview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpres_restricteddruglistview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$pres_restricteddruglist->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $pres_restricteddruglist_view->ExportOptions->render("body") ?>
<?php $pres_restricteddruglist_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $pres_restricteddruglist_view->showPageHeader(); ?>
<?php
$pres_restricteddruglist_view->showMessage();
?>
<form name="fpres_restricteddruglistview" id="fpres_restricteddruglistview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pres_restricteddruglist_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pres_restricteddruglist_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_restricteddruglist">
<input type="hidden" name="modal" value="<?php echo (int)$pres_restricteddruglist_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($pres_restricteddruglist->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $pres_restricteddruglist_view->TableLeftColumnClass ?>"><span id="elh_pres_restricteddruglist_id"><?php echo $pres_restricteddruglist->id->caption() ?></span></td>
		<td data-name="id"<?php echo $pres_restricteddruglist->id->cellAttributes() ?>>
<span id="el_pres_restricteddruglist_id">
<span<?php echo $pres_restricteddruglist->id->viewAttributes() ?>>
<?php echo $pres_restricteddruglist->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_restricteddruglist->Genericname->Visible) { // Genericname ?>
	<tr id="r_Genericname">
		<td class="<?php echo $pres_restricteddruglist_view->TableLeftColumnClass ?>"><span id="elh_pres_restricteddruglist_Genericname"><?php echo $pres_restricteddruglist->Genericname->caption() ?></span></td>
		<td data-name="Genericname"<?php echo $pres_restricteddruglist->Genericname->cellAttributes() ?>>
<span id="el_pres_restricteddruglist_Genericname">
<span<?php echo $pres_restricteddruglist->Genericname->viewAttributes() ?>>
<?php echo $pres_restricteddruglist->Genericname->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_restricteddruglist->RestrictedWarning->Visible) { // RestrictedWarning ?>
	<tr id="r_RestrictedWarning">
		<td class="<?php echo $pres_restricteddruglist_view->TableLeftColumnClass ?>"><span id="elh_pres_restricteddruglist_RestrictedWarning"><?php echo $pres_restricteddruglist->RestrictedWarning->caption() ?></span></td>
		<td data-name="RestrictedWarning"<?php echo $pres_restricteddruglist->RestrictedWarning->cellAttributes() ?>>
<span id="el_pres_restricteddruglist_RestrictedWarning">
<span<?php echo $pres_restricteddruglist->RestrictedWarning->viewAttributes() ?>>
<?php echo $pres_restricteddruglist->RestrictedWarning->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$pres_restricteddruglist_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$pres_restricteddruglist->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$pres_restricteddruglist_view->terminate();
?>