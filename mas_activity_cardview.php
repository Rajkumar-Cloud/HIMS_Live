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
$mas_activity_card_view = new mas_activity_card_view();

// Run the page
$mas_activity_card_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_activity_card_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$mas_activity_card->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fmas_activity_cardview = currentForm = new ew.Form("fmas_activity_cardview", "view");

// Form_CustomValidate event
fmas_activity_cardview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fmas_activity_cardview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fmas_activity_cardview.lists["x_Selected[]"] = <?php echo $mas_activity_card_view->Selected->Lookup->toClientList() ?>;
fmas_activity_cardview.lists["x_Selected[]"].options = <?php echo JsonEncode($mas_activity_card_view->Selected->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$mas_activity_card->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $mas_activity_card_view->ExportOptions->render("body") ?>
<?php $mas_activity_card_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $mas_activity_card_view->showPageHeader(); ?>
<?php
$mas_activity_card_view->showMessage();
?>
<form name="fmas_activity_cardview" id="fmas_activity_cardview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($mas_activity_card_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $mas_activity_card_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_activity_card">
<input type="hidden" name="modal" value="<?php echo (int)$mas_activity_card_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($mas_activity_card->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $mas_activity_card_view->TableLeftColumnClass ?>"><span id="elh_mas_activity_card_id"><?php echo $mas_activity_card->id->caption() ?></span></td>
		<td data-name="id"<?php echo $mas_activity_card->id->cellAttributes() ?>>
<span id="el_mas_activity_card_id">
<span<?php echo $mas_activity_card->id->viewAttributes() ?>>
<?php echo $mas_activity_card->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_activity_card->Activity->Visible) { // Activity ?>
	<tr id="r_Activity">
		<td class="<?php echo $mas_activity_card_view->TableLeftColumnClass ?>"><span id="elh_mas_activity_card_Activity"><?php echo $mas_activity_card->Activity->caption() ?></span></td>
		<td data-name="Activity"<?php echo $mas_activity_card->Activity->cellAttributes() ?>>
<span id="el_mas_activity_card_Activity">
<span<?php echo $mas_activity_card->Activity->viewAttributes() ?>>
<?php echo $mas_activity_card->Activity->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_activity_card->Type->Visible) { // Type ?>
	<tr id="r_Type">
		<td class="<?php echo $mas_activity_card_view->TableLeftColumnClass ?>"><span id="elh_mas_activity_card_Type"><?php echo $mas_activity_card->Type->caption() ?></span></td>
		<td data-name="Type"<?php echo $mas_activity_card->Type->cellAttributes() ?>>
<span id="el_mas_activity_card_Type">
<span<?php echo $mas_activity_card->Type->viewAttributes() ?>>
<?php echo $mas_activity_card->Type->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_activity_card->Units->Visible) { // Units ?>
	<tr id="r_Units">
		<td class="<?php echo $mas_activity_card_view->TableLeftColumnClass ?>"><span id="elh_mas_activity_card_Units"><?php echo $mas_activity_card->Units->caption() ?></span></td>
		<td data-name="Units"<?php echo $mas_activity_card->Units->cellAttributes() ?>>
<span id="el_mas_activity_card_Units">
<span<?php echo $mas_activity_card->Units->viewAttributes() ?>>
<?php echo $mas_activity_card->Units->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_activity_card->Amount->Visible) { // Amount ?>
	<tr id="r_Amount">
		<td class="<?php echo $mas_activity_card_view->TableLeftColumnClass ?>"><span id="elh_mas_activity_card_Amount"><?php echo $mas_activity_card->Amount->caption() ?></span></td>
		<td data-name="Amount"<?php echo $mas_activity_card->Amount->cellAttributes() ?>>
<span id="el_mas_activity_card_Amount">
<span<?php echo $mas_activity_card->Amount->viewAttributes() ?>>
<?php echo $mas_activity_card->Amount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_activity_card->Selected->Visible) { // Selected ?>
	<tr id="r_Selected">
		<td class="<?php echo $mas_activity_card_view->TableLeftColumnClass ?>"><span id="elh_mas_activity_card_Selected"><?php echo $mas_activity_card->Selected->caption() ?></span></td>
		<td data-name="Selected"<?php echo $mas_activity_card->Selected->cellAttributes() ?>>
<span id="el_mas_activity_card_Selected">
<span<?php echo $mas_activity_card->Selected->viewAttributes() ?>>
<?php echo $mas_activity_card->Selected->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$mas_activity_card_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$mas_activity_card->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$mas_activity_card_view->terminate();
?>