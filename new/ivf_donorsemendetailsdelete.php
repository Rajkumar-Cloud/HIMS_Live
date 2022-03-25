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
<?php include_once "header.php"; ?>
<script>
var fivf_donorsemendetailsdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fivf_donorsemendetailsdelete = currentForm = new ew.Form("fivf_donorsemendetailsdelete", "delete");
	loadjs.done("fivf_donorsemendetailsdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $ivf_donorsemendetails_delete->showPageHeader(); ?>
<?php
$ivf_donorsemendetails_delete->showMessage();
?>
<form name="fivf_donorsemendetailsdelete" id="fivf_donorsemendetailsdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_donorsemendetails">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($ivf_donorsemendetails_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($ivf_donorsemendetails_delete->DonorNo->Visible) { // DonorNo ?>
		<th class="<?php echo $ivf_donorsemendetails_delete->DonorNo->headerCellClass() ?>"><span id="elh_ivf_donorsemendetails_DonorNo" class="ivf_donorsemendetails_DonorNo"><?php echo $ivf_donorsemendetails_delete->DonorNo->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_donorsemendetails_delete->BatchNo->Visible) { // BatchNo ?>
		<th class="<?php echo $ivf_donorsemendetails_delete->BatchNo->headerCellClass() ?>"><span id="elh_ivf_donorsemendetails_BatchNo" class="ivf_donorsemendetails_BatchNo"><?php echo $ivf_donorsemendetails_delete->BatchNo->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_donorsemendetails_delete->BloodGroup->Visible) { // BloodGroup ?>
		<th class="<?php echo $ivf_donorsemendetails_delete->BloodGroup->headerCellClass() ?>"><span id="elh_ivf_donorsemendetails_BloodGroup" class="ivf_donorsemendetails_BloodGroup"><?php echo $ivf_donorsemendetails_delete->BloodGroup->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_donorsemendetails_delete->Height->Visible) { // Height ?>
		<th class="<?php echo $ivf_donorsemendetails_delete->Height->headerCellClass() ?>"><span id="elh_ivf_donorsemendetails_Height" class="ivf_donorsemendetails_Height"><?php echo $ivf_donorsemendetails_delete->Height->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_donorsemendetails_delete->SkinColor->Visible) { // SkinColor ?>
		<th class="<?php echo $ivf_donorsemendetails_delete->SkinColor->headerCellClass() ?>"><span id="elh_ivf_donorsemendetails_SkinColor" class="ivf_donorsemendetails_SkinColor"><?php echo $ivf_donorsemendetails_delete->SkinColor->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_donorsemendetails_delete->EyeColor->Visible) { // EyeColor ?>
		<th class="<?php echo $ivf_donorsemendetails_delete->EyeColor->headerCellClass() ?>"><span id="elh_ivf_donorsemendetails_EyeColor" class="ivf_donorsemendetails_EyeColor"><?php echo $ivf_donorsemendetails_delete->EyeColor->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_donorsemendetails_delete->HairColor->Visible) { // HairColor ?>
		<th class="<?php echo $ivf_donorsemendetails_delete->HairColor->headerCellClass() ?>"><span id="elh_ivf_donorsemendetails_HairColor" class="ivf_donorsemendetails_HairColor"><?php echo $ivf_donorsemendetails_delete->HairColor->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_donorsemendetails_delete->NoOfVials->Visible) { // NoOfVials ?>
		<th class="<?php echo $ivf_donorsemendetails_delete->NoOfVials->headerCellClass() ?>"><span id="elh_ivf_donorsemendetails_NoOfVials" class="ivf_donorsemendetails_NoOfVials"><?php echo $ivf_donorsemendetails_delete->NoOfVials->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_donorsemendetails_delete->Tank->Visible) { // Tank ?>
		<th class="<?php echo $ivf_donorsemendetails_delete->Tank->headerCellClass() ?>"><span id="elh_ivf_donorsemendetails_Tank" class="ivf_donorsemendetails_Tank"><?php echo $ivf_donorsemendetails_delete->Tank->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_donorsemendetails_delete->Canister->Visible) { // Canister ?>
		<th class="<?php echo $ivf_donorsemendetails_delete->Canister->headerCellClass() ?>"><span id="elh_ivf_donorsemendetails_Canister" class="ivf_donorsemendetails_Canister"><?php echo $ivf_donorsemendetails_delete->Canister->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_donorsemendetails_delete->Remarks->Visible) { // Remarks ?>
		<th class="<?php echo $ivf_donorsemendetails_delete->Remarks->headerCellClass() ?>"><span id="elh_ivf_donorsemendetails_Remarks" class="ivf_donorsemendetails_Remarks"><?php echo $ivf_donorsemendetails_delete->Remarks->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$ivf_donorsemendetails_delete->RecordCount = 0;
$i = 0;
while (!$ivf_donorsemendetails_delete->Recordset->EOF) {
	$ivf_donorsemendetails_delete->RecordCount++;
	$ivf_donorsemendetails_delete->RowCount++;

	// Set row properties
	$ivf_donorsemendetails->resetAttributes();
	$ivf_donorsemendetails->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$ivf_donorsemendetails_delete->loadRowValues($ivf_donorsemendetails_delete->Recordset);

	// Render row
	$ivf_donorsemendetails_delete->renderRow();
?>
	<tr <?php echo $ivf_donorsemendetails->rowAttributes() ?>>
<?php if ($ivf_donorsemendetails_delete->DonorNo->Visible) { // DonorNo ?>
		<td <?php echo $ivf_donorsemendetails_delete->DonorNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_donorsemendetails_delete->RowCount ?>_ivf_donorsemendetails_DonorNo" class="ivf_donorsemendetails_DonorNo">
<span<?php echo $ivf_donorsemendetails_delete->DonorNo->viewAttributes() ?>><?php echo $ivf_donorsemendetails_delete->DonorNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_donorsemendetails_delete->BatchNo->Visible) { // BatchNo ?>
		<td <?php echo $ivf_donorsemendetails_delete->BatchNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_donorsemendetails_delete->RowCount ?>_ivf_donorsemendetails_BatchNo" class="ivf_donorsemendetails_BatchNo">
<span<?php echo $ivf_donorsemendetails_delete->BatchNo->viewAttributes() ?>><?php echo $ivf_donorsemendetails_delete->BatchNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_donorsemendetails_delete->BloodGroup->Visible) { // BloodGroup ?>
		<td <?php echo $ivf_donorsemendetails_delete->BloodGroup->cellAttributes() ?>>
<span id="el<?php echo $ivf_donorsemendetails_delete->RowCount ?>_ivf_donorsemendetails_BloodGroup" class="ivf_donorsemendetails_BloodGroup">
<span<?php echo $ivf_donorsemendetails_delete->BloodGroup->viewAttributes() ?>><?php echo $ivf_donorsemendetails_delete->BloodGroup->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_donorsemendetails_delete->Height->Visible) { // Height ?>
		<td <?php echo $ivf_donorsemendetails_delete->Height->cellAttributes() ?>>
<span id="el<?php echo $ivf_donorsemendetails_delete->RowCount ?>_ivf_donorsemendetails_Height" class="ivf_donorsemendetails_Height">
<span<?php echo $ivf_donorsemendetails_delete->Height->viewAttributes() ?>><?php echo $ivf_donorsemendetails_delete->Height->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_donorsemendetails_delete->SkinColor->Visible) { // SkinColor ?>
		<td <?php echo $ivf_donorsemendetails_delete->SkinColor->cellAttributes() ?>>
<span id="el<?php echo $ivf_donorsemendetails_delete->RowCount ?>_ivf_donorsemendetails_SkinColor" class="ivf_donorsemendetails_SkinColor">
<span<?php echo $ivf_donorsemendetails_delete->SkinColor->viewAttributes() ?>><?php echo $ivf_donorsemendetails_delete->SkinColor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_donorsemendetails_delete->EyeColor->Visible) { // EyeColor ?>
		<td <?php echo $ivf_donorsemendetails_delete->EyeColor->cellAttributes() ?>>
<span id="el<?php echo $ivf_donorsemendetails_delete->RowCount ?>_ivf_donorsemendetails_EyeColor" class="ivf_donorsemendetails_EyeColor">
<span<?php echo $ivf_donorsemendetails_delete->EyeColor->viewAttributes() ?>><?php echo $ivf_donorsemendetails_delete->EyeColor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_donorsemendetails_delete->HairColor->Visible) { // HairColor ?>
		<td <?php echo $ivf_donorsemendetails_delete->HairColor->cellAttributes() ?>>
<span id="el<?php echo $ivf_donorsemendetails_delete->RowCount ?>_ivf_donorsemendetails_HairColor" class="ivf_donorsemendetails_HairColor">
<span<?php echo $ivf_donorsemendetails_delete->HairColor->viewAttributes() ?>><?php echo $ivf_donorsemendetails_delete->HairColor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_donorsemendetails_delete->NoOfVials->Visible) { // NoOfVials ?>
		<td <?php echo $ivf_donorsemendetails_delete->NoOfVials->cellAttributes() ?>>
<span id="el<?php echo $ivf_donorsemendetails_delete->RowCount ?>_ivf_donorsemendetails_NoOfVials" class="ivf_donorsemendetails_NoOfVials">
<span<?php echo $ivf_donorsemendetails_delete->NoOfVials->viewAttributes() ?>><?php echo $ivf_donorsemendetails_delete->NoOfVials->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_donorsemendetails_delete->Tank->Visible) { // Tank ?>
		<td <?php echo $ivf_donorsemendetails_delete->Tank->cellAttributes() ?>>
<span id="el<?php echo $ivf_donorsemendetails_delete->RowCount ?>_ivf_donorsemendetails_Tank" class="ivf_donorsemendetails_Tank">
<span<?php echo $ivf_donorsemendetails_delete->Tank->viewAttributes() ?>><?php echo $ivf_donorsemendetails_delete->Tank->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_donorsemendetails_delete->Canister->Visible) { // Canister ?>
		<td <?php echo $ivf_donorsemendetails_delete->Canister->cellAttributes() ?>>
<span id="el<?php echo $ivf_donorsemendetails_delete->RowCount ?>_ivf_donorsemendetails_Canister" class="ivf_donorsemendetails_Canister">
<span<?php echo $ivf_donorsemendetails_delete->Canister->viewAttributes() ?>><?php echo $ivf_donorsemendetails_delete->Canister->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_donorsemendetails_delete->Remarks->Visible) { // Remarks ?>
		<td <?php echo $ivf_donorsemendetails_delete->Remarks->cellAttributes() ?>>
<span id="el<?php echo $ivf_donorsemendetails_delete->RowCount ?>_ivf_donorsemendetails_Remarks" class="ivf_donorsemendetails_Remarks">
<span<?php echo $ivf_donorsemendetails_delete->Remarks->viewAttributes() ?>><?php echo $ivf_donorsemendetails_delete->Remarks->getViewValue() ?></span>
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
$ivf_donorsemendetails_delete->terminate();
?>