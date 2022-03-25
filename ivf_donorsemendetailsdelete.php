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
$ivf_donorsemendetails_delete = new ivf_donorsemendetails_delete();

// Run the page
$ivf_donorsemendetails_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_donorsemendetails_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fivf_donorsemendetailsdelete = currentForm = new ew.Form("fivf_donorsemendetailsdelete", "delete");

// Form_CustomValidate event
fivf_donorsemendetailsdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_donorsemendetailsdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fivf_donorsemendetailsdelete.lists["x_BloodGroup"] = <?php echo $ivf_donorsemendetails_delete->BloodGroup->Lookup->toClientList() ?>;
fivf_donorsemendetailsdelete.lists["x_BloodGroup"].options = <?php echo JsonEncode($ivf_donorsemendetails_delete->BloodGroup->lookupOptions()) ?>;
fivf_donorsemendetailsdelete.lists["x_SkinColor"] = <?php echo $ivf_donorsemendetails_delete->SkinColor->Lookup->toClientList() ?>;
fivf_donorsemendetailsdelete.lists["x_SkinColor"].options = <?php echo JsonEncode($ivf_donorsemendetails_delete->SkinColor->options(FALSE, TRUE)) ?>;
fivf_donorsemendetailsdelete.lists["x_EyeColor"] = <?php echo $ivf_donorsemendetails_delete->EyeColor->Lookup->toClientList() ?>;
fivf_donorsemendetailsdelete.lists["x_EyeColor"].options = <?php echo JsonEncode($ivf_donorsemendetails_delete->EyeColor->options(FALSE, TRUE)) ?>;
fivf_donorsemendetailsdelete.lists["x_HairColor"] = <?php echo $ivf_donorsemendetails_delete->HairColor->Lookup->toClientList() ?>;
fivf_donorsemendetailsdelete.lists["x_HairColor"].options = <?php echo JsonEncode($ivf_donorsemendetails_delete->HairColor->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $ivf_donorsemendetails_delete->showPageHeader(); ?>
<?php
$ivf_donorsemendetails_delete->showMessage();
?>
<form name="fivf_donorsemendetailsdelete" id="fivf_donorsemendetailsdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ivf_donorsemendetails_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_donorsemendetails_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_donorsemendetails">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($ivf_donorsemendetails_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($ivf_donorsemendetails->DonorNo->Visible) { // DonorNo ?>
		<th class="<?php echo $ivf_donorsemendetails->DonorNo->headerCellClass() ?>"><span id="elh_ivf_donorsemendetails_DonorNo" class="ivf_donorsemendetails_DonorNo"><?php echo $ivf_donorsemendetails->DonorNo->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_donorsemendetails->BatchNo->Visible) { // BatchNo ?>
		<th class="<?php echo $ivf_donorsemendetails->BatchNo->headerCellClass() ?>"><span id="elh_ivf_donorsemendetails_BatchNo" class="ivf_donorsemendetails_BatchNo"><?php echo $ivf_donorsemendetails->BatchNo->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_donorsemendetails->BloodGroup->Visible) { // BloodGroup ?>
		<th class="<?php echo $ivf_donorsemendetails->BloodGroup->headerCellClass() ?>"><span id="elh_ivf_donorsemendetails_BloodGroup" class="ivf_donorsemendetails_BloodGroup"><?php echo $ivf_donorsemendetails->BloodGroup->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_donorsemendetails->Height->Visible) { // Height ?>
		<th class="<?php echo $ivf_donorsemendetails->Height->headerCellClass() ?>"><span id="elh_ivf_donorsemendetails_Height" class="ivf_donorsemendetails_Height"><?php echo $ivf_donorsemendetails->Height->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_donorsemendetails->SkinColor->Visible) { // SkinColor ?>
		<th class="<?php echo $ivf_donorsemendetails->SkinColor->headerCellClass() ?>"><span id="elh_ivf_donorsemendetails_SkinColor" class="ivf_donorsemendetails_SkinColor"><?php echo $ivf_donorsemendetails->SkinColor->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_donorsemendetails->EyeColor->Visible) { // EyeColor ?>
		<th class="<?php echo $ivf_donorsemendetails->EyeColor->headerCellClass() ?>"><span id="elh_ivf_donorsemendetails_EyeColor" class="ivf_donorsemendetails_EyeColor"><?php echo $ivf_donorsemendetails->EyeColor->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_donorsemendetails->HairColor->Visible) { // HairColor ?>
		<th class="<?php echo $ivf_donorsemendetails->HairColor->headerCellClass() ?>"><span id="elh_ivf_donorsemendetails_HairColor" class="ivf_donorsemendetails_HairColor"><?php echo $ivf_donorsemendetails->HairColor->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_donorsemendetails->NoOfVials->Visible) { // NoOfVials ?>
		<th class="<?php echo $ivf_donorsemendetails->NoOfVials->headerCellClass() ?>"><span id="elh_ivf_donorsemendetails_NoOfVials" class="ivf_donorsemendetails_NoOfVials"><?php echo $ivf_donorsemendetails->NoOfVials->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_donorsemendetails->Tank->Visible) { // Tank ?>
		<th class="<?php echo $ivf_donorsemendetails->Tank->headerCellClass() ?>"><span id="elh_ivf_donorsemendetails_Tank" class="ivf_donorsemendetails_Tank"><?php echo $ivf_donorsemendetails->Tank->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_donorsemendetails->Canister->Visible) { // Canister ?>
		<th class="<?php echo $ivf_donorsemendetails->Canister->headerCellClass() ?>"><span id="elh_ivf_donorsemendetails_Canister" class="ivf_donorsemendetails_Canister"><?php echo $ivf_donorsemendetails->Canister->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_donorsemendetails->Remarks->Visible) { // Remarks ?>
		<th class="<?php echo $ivf_donorsemendetails->Remarks->headerCellClass() ?>"><span id="elh_ivf_donorsemendetails_Remarks" class="ivf_donorsemendetails_Remarks"><?php echo $ivf_donorsemendetails->Remarks->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$ivf_donorsemendetails_delete->RecCnt = 0;
$i = 0;
while (!$ivf_donorsemendetails_delete->Recordset->EOF) {
	$ivf_donorsemendetails_delete->RecCnt++;
	$ivf_donorsemendetails_delete->RowCnt++;

	// Set row properties
	$ivf_donorsemendetails->resetAttributes();
	$ivf_donorsemendetails->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$ivf_donorsemendetails_delete->loadRowValues($ivf_donorsemendetails_delete->Recordset);

	// Render row
	$ivf_donorsemendetails_delete->renderRow();
?>
	<tr<?php echo $ivf_donorsemendetails->rowAttributes() ?>>
<?php if ($ivf_donorsemendetails->DonorNo->Visible) { // DonorNo ?>
		<td<?php echo $ivf_donorsemendetails->DonorNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_donorsemendetails_delete->RowCnt ?>_ivf_donorsemendetails_DonorNo" class="ivf_donorsemendetails_DonorNo">
<span<?php echo $ivf_donorsemendetails->DonorNo->viewAttributes() ?>>
<?php echo $ivf_donorsemendetails->DonorNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_donorsemendetails->BatchNo->Visible) { // BatchNo ?>
		<td<?php echo $ivf_donorsemendetails->BatchNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_donorsemendetails_delete->RowCnt ?>_ivf_donorsemendetails_BatchNo" class="ivf_donorsemendetails_BatchNo">
<span<?php echo $ivf_donorsemendetails->BatchNo->viewAttributes() ?>>
<?php echo $ivf_donorsemendetails->BatchNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_donorsemendetails->BloodGroup->Visible) { // BloodGroup ?>
		<td<?php echo $ivf_donorsemendetails->BloodGroup->cellAttributes() ?>>
<span id="el<?php echo $ivf_donorsemendetails_delete->RowCnt ?>_ivf_donorsemendetails_BloodGroup" class="ivf_donorsemendetails_BloodGroup">
<span<?php echo $ivf_donorsemendetails->BloodGroup->viewAttributes() ?>>
<?php echo $ivf_donorsemendetails->BloodGroup->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_donorsemendetails->Height->Visible) { // Height ?>
		<td<?php echo $ivf_donorsemendetails->Height->cellAttributes() ?>>
<span id="el<?php echo $ivf_donorsemendetails_delete->RowCnt ?>_ivf_donorsemendetails_Height" class="ivf_donorsemendetails_Height">
<span<?php echo $ivf_donorsemendetails->Height->viewAttributes() ?>>
<?php echo $ivf_donorsemendetails->Height->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_donorsemendetails->SkinColor->Visible) { // SkinColor ?>
		<td<?php echo $ivf_donorsemendetails->SkinColor->cellAttributes() ?>>
<span id="el<?php echo $ivf_donorsemendetails_delete->RowCnt ?>_ivf_donorsemendetails_SkinColor" class="ivf_donorsemendetails_SkinColor">
<span<?php echo $ivf_donorsemendetails->SkinColor->viewAttributes() ?>>
<?php echo $ivf_donorsemendetails->SkinColor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_donorsemendetails->EyeColor->Visible) { // EyeColor ?>
		<td<?php echo $ivf_donorsemendetails->EyeColor->cellAttributes() ?>>
<span id="el<?php echo $ivf_donorsemendetails_delete->RowCnt ?>_ivf_donorsemendetails_EyeColor" class="ivf_donorsemendetails_EyeColor">
<span<?php echo $ivf_donorsemendetails->EyeColor->viewAttributes() ?>>
<?php echo $ivf_donorsemendetails->EyeColor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_donorsemendetails->HairColor->Visible) { // HairColor ?>
		<td<?php echo $ivf_donorsemendetails->HairColor->cellAttributes() ?>>
<span id="el<?php echo $ivf_donorsemendetails_delete->RowCnt ?>_ivf_donorsemendetails_HairColor" class="ivf_donorsemendetails_HairColor">
<span<?php echo $ivf_donorsemendetails->HairColor->viewAttributes() ?>>
<?php echo $ivf_donorsemendetails->HairColor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_donorsemendetails->NoOfVials->Visible) { // NoOfVials ?>
		<td<?php echo $ivf_donorsemendetails->NoOfVials->cellAttributes() ?>>
<span id="el<?php echo $ivf_donorsemendetails_delete->RowCnt ?>_ivf_donorsemendetails_NoOfVials" class="ivf_donorsemendetails_NoOfVials">
<span<?php echo $ivf_donorsemendetails->NoOfVials->viewAttributes() ?>>
<?php echo $ivf_donorsemendetails->NoOfVials->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_donorsemendetails->Tank->Visible) { // Tank ?>
		<td<?php echo $ivf_donorsemendetails->Tank->cellAttributes() ?>>
<span id="el<?php echo $ivf_donorsemendetails_delete->RowCnt ?>_ivf_donorsemendetails_Tank" class="ivf_donorsemendetails_Tank">
<span<?php echo $ivf_donorsemendetails->Tank->viewAttributes() ?>>
<?php echo $ivf_donorsemendetails->Tank->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_donorsemendetails->Canister->Visible) { // Canister ?>
		<td<?php echo $ivf_donorsemendetails->Canister->cellAttributes() ?>>
<span id="el<?php echo $ivf_donorsemendetails_delete->RowCnt ?>_ivf_donorsemendetails_Canister" class="ivf_donorsemendetails_Canister">
<span<?php echo $ivf_donorsemendetails->Canister->viewAttributes() ?>>
<?php echo $ivf_donorsemendetails->Canister->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_donorsemendetails->Remarks->Visible) { // Remarks ?>
		<td<?php echo $ivf_donorsemendetails->Remarks->cellAttributes() ?>>
<span id="el<?php echo $ivf_donorsemendetails_delete->RowCnt ?>_ivf_donorsemendetails_Remarks" class="ivf_donorsemendetails_Remarks">
<span<?php echo $ivf_donorsemendetails->Remarks->viewAttributes() ?>>
<?php echo $ivf_donorsemendetails->Remarks->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$ivf_donorsemendetails_delete->Recordset->moveNext();
}
$ivf_donorsemendetails_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $ivf_donorsemendetails_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$ivf_donorsemendetails_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$ivf_donorsemendetails_delete->terminate();
?>