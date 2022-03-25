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
$pres_mas_route_delete = new pres_mas_route_delete();

// Run the page
$pres_mas_route_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_mas_route_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fpres_mas_routedelete = currentForm = new ew.Form("fpres_mas_routedelete", "delete");

// Form_CustomValidate event
fpres_mas_routedelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpres_mas_routedelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $pres_mas_route_delete->showPageHeader(); ?>
<?php
$pres_mas_route_delete->showMessage();
?>
<form name="fpres_mas_routedelete" id="fpres_mas_routedelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pres_mas_route_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pres_mas_route_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_mas_route">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($pres_mas_route_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($pres_mas_route->ID->Visible) { // ID ?>
		<th class="<?php echo $pres_mas_route->ID->headerCellClass() ?>"><span id="elh_pres_mas_route_ID" class="pres_mas_route_ID"><?php echo $pres_mas_route->ID->caption() ?></span></th>
<?php } ?>
<?php if ($pres_mas_route->_Route->Visible) { // Route ?>
		<th class="<?php echo $pres_mas_route->_Route->headerCellClass() ?>"><span id="elh_pres_mas_route__Route" class="pres_mas_route__Route"><?php echo $pres_mas_route->_Route->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$pres_mas_route_delete->RecCnt = 0;
$i = 0;
while (!$pres_mas_route_delete->Recordset->EOF) {
	$pres_mas_route_delete->RecCnt++;
	$pres_mas_route_delete->RowCnt++;

	// Set row properties
	$pres_mas_route->resetAttributes();
	$pres_mas_route->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$pres_mas_route_delete->loadRowValues($pres_mas_route_delete->Recordset);

	// Render row
	$pres_mas_route_delete->renderRow();
?>
	<tr<?php echo $pres_mas_route->rowAttributes() ?>>
<?php if ($pres_mas_route->ID->Visible) { // ID ?>
		<td<?php echo $pres_mas_route->ID->cellAttributes() ?>>
<span id="el<?php echo $pres_mas_route_delete->RowCnt ?>_pres_mas_route_ID" class="pres_mas_route_ID">
<span<?php echo $pres_mas_route->ID->viewAttributes() ?>>
<?php echo $pres_mas_route->ID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_mas_route->_Route->Visible) { // Route ?>
		<td<?php echo $pres_mas_route->_Route->cellAttributes() ?>>
<span id="el<?php echo $pres_mas_route_delete->RowCnt ?>_pres_mas_route__Route" class="pres_mas_route__Route">
<span<?php echo $pres_mas_route->_Route->viewAttributes() ?>>
<?php echo $pres_mas_route->_Route->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$pres_mas_route_delete->Recordset->moveNext();
}
$pres_mas_route_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pres_mas_route_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$pres_mas_route_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$pres_mas_route_delete->terminate();
?>