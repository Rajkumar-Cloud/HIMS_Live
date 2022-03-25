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
$ivf_vitrification_delete = new ivf_vitrification_delete();

// Run the page
$ivf_vitrification_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_vitrification_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fivf_vitrificationdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fivf_vitrificationdelete = currentForm = new ew.Form("fivf_vitrificationdelete", "delete");
	loadjs.done("fivf_vitrificationdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $ivf_vitrification_delete->showPageHeader(); ?>
<?php
$ivf_vitrification_delete->showMessage();
?>
<form name="fivf_vitrificationdelete" id="fivf_vitrificationdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_vitrification">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($ivf_vitrification_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($ivf_vitrification_delete->vitrificationDate->Visible) { // vitrificationDate ?>
		<th class="<?php echo $ivf_vitrification_delete->vitrificationDate->headerCellClass() ?>"><span id="elh_ivf_vitrification_vitrificationDate" class="ivf_vitrification_vitrificationDate"><?php echo $ivf_vitrification_delete->vitrificationDate->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitrification_delete->PrimaryEmbryologist->Visible) { // PrimaryEmbryologist ?>
		<th class="<?php echo $ivf_vitrification_delete->PrimaryEmbryologist->headerCellClass() ?>"><span id="elh_ivf_vitrification_PrimaryEmbryologist" class="ivf_vitrification_PrimaryEmbryologist"><?php echo $ivf_vitrification_delete->PrimaryEmbryologist->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitrification_delete->SecondaryEmbryologist->Visible) { // SecondaryEmbryologist ?>
		<th class="<?php echo $ivf_vitrification_delete->SecondaryEmbryologist->headerCellClass() ?>"><span id="elh_ivf_vitrification_SecondaryEmbryologist" class="ivf_vitrification_SecondaryEmbryologist"><?php echo $ivf_vitrification_delete->SecondaryEmbryologist->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitrification_delete->EmbryoNo->Visible) { // EmbryoNo ?>
		<th class="<?php echo $ivf_vitrification_delete->EmbryoNo->headerCellClass() ?>"><span id="elh_ivf_vitrification_EmbryoNo" class="ivf_vitrification_EmbryoNo"><?php echo $ivf_vitrification_delete->EmbryoNo->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitrification_delete->FertilisationDate->Visible) { // FertilisationDate ?>
		<th class="<?php echo $ivf_vitrification_delete->FertilisationDate->headerCellClass() ?>"><span id="elh_ivf_vitrification_FertilisationDate" class="ivf_vitrification_FertilisationDate"><?php echo $ivf_vitrification_delete->FertilisationDate->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitrification_delete->Day->Visible) { // Day ?>
		<th class="<?php echo $ivf_vitrification_delete->Day->headerCellClass() ?>"><span id="elh_ivf_vitrification_Day" class="ivf_vitrification_Day"><?php echo $ivf_vitrification_delete->Day->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitrification_delete->Grade->Visible) { // Grade ?>
		<th class="<?php echo $ivf_vitrification_delete->Grade->headerCellClass() ?>"><span id="elh_ivf_vitrification_Grade" class="ivf_vitrification_Grade"><?php echo $ivf_vitrification_delete->Grade->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitrification_delete->Incubator->Visible) { // Incubator ?>
		<th class="<?php echo $ivf_vitrification_delete->Incubator->headerCellClass() ?>"><span id="elh_ivf_vitrification_Incubator" class="ivf_vitrification_Incubator"><?php echo $ivf_vitrification_delete->Incubator->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitrification_delete->Tank->Visible) { // Tank ?>
		<th class="<?php echo $ivf_vitrification_delete->Tank->headerCellClass() ?>"><span id="elh_ivf_vitrification_Tank" class="ivf_vitrification_Tank"><?php echo $ivf_vitrification_delete->Tank->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitrification_delete->Canister->Visible) { // Canister ?>
		<th class="<?php echo $ivf_vitrification_delete->Canister->headerCellClass() ?>"><span id="elh_ivf_vitrification_Canister" class="ivf_vitrification_Canister"><?php echo $ivf_vitrification_delete->Canister->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitrification_delete->Gobiet->Visible) { // Gobiet ?>
		<th class="<?php echo $ivf_vitrification_delete->Gobiet->headerCellClass() ?>"><span id="elh_ivf_vitrification_Gobiet" class="ivf_vitrification_Gobiet"><?php echo $ivf_vitrification_delete->Gobiet->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitrification_delete->CryolockNo->Visible) { // CryolockNo ?>
		<th class="<?php echo $ivf_vitrification_delete->CryolockNo->headerCellClass() ?>"><span id="elh_ivf_vitrification_CryolockNo" class="ivf_vitrification_CryolockNo"><?php echo $ivf_vitrification_delete->CryolockNo->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitrification_delete->CryolockColour->Visible) { // CryolockColour ?>
		<th class="<?php echo $ivf_vitrification_delete->CryolockColour->headerCellClass() ?>"><span id="elh_ivf_vitrification_CryolockColour" class="ivf_vitrification_CryolockColour"><?php echo $ivf_vitrification_delete->CryolockColour->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitrification_delete->Stage->Visible) { // Stage ?>
		<th class="<?php echo $ivf_vitrification_delete->Stage->headerCellClass() ?>"><span id="elh_ivf_vitrification_Stage" class="ivf_vitrification_Stage"><?php echo $ivf_vitrification_delete->Stage->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$ivf_vitrification_delete->RecordCount = 0;
$i = 0;
while (!$ivf_vitrification_delete->Recordset->EOF) {
	$ivf_vitrification_delete->RecordCount++;
	$ivf_vitrification_delete->RowCount++;

	// Set row properties
	$ivf_vitrification->resetAttributes();
	$ivf_vitrification->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$ivf_vitrification_delete->loadRowValues($ivf_vitrification_delete->Recordset);

	// Render row
	$ivf_vitrification_delete->renderRow();
?>
	<tr <?php echo $ivf_vitrification->rowAttributes() ?>>
<?php if ($ivf_vitrification_delete->vitrificationDate->Visible) { // vitrificationDate ?>
		<td <?php echo $ivf_vitrification_delete->vitrificationDate->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitrification_delete->RowCount ?>_ivf_vitrification_vitrificationDate" class="ivf_vitrification_vitrificationDate">
<span<?php echo $ivf_vitrification_delete->vitrificationDate->viewAttributes() ?>><?php echo $ivf_vitrification_delete->vitrificationDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitrification_delete->PrimaryEmbryologist->Visible) { // PrimaryEmbryologist ?>
		<td <?php echo $ivf_vitrification_delete->PrimaryEmbryologist->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitrification_delete->RowCount ?>_ivf_vitrification_PrimaryEmbryologist" class="ivf_vitrification_PrimaryEmbryologist">
<span<?php echo $ivf_vitrification_delete->PrimaryEmbryologist->viewAttributes() ?>><?php echo $ivf_vitrification_delete->PrimaryEmbryologist->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitrification_delete->SecondaryEmbryologist->Visible) { // SecondaryEmbryologist ?>
		<td <?php echo $ivf_vitrification_delete->SecondaryEmbryologist->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitrification_delete->RowCount ?>_ivf_vitrification_SecondaryEmbryologist" class="ivf_vitrification_SecondaryEmbryologist">
<span<?php echo $ivf_vitrification_delete->SecondaryEmbryologist->viewAttributes() ?>><?php echo $ivf_vitrification_delete->SecondaryEmbryologist->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitrification_delete->EmbryoNo->Visible) { // EmbryoNo ?>
		<td <?php echo $ivf_vitrification_delete->EmbryoNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitrification_delete->RowCount ?>_ivf_vitrification_EmbryoNo" class="ivf_vitrification_EmbryoNo">
<span<?php echo $ivf_vitrification_delete->EmbryoNo->viewAttributes() ?>><?php echo $ivf_vitrification_delete->EmbryoNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitrification_delete->FertilisationDate->Visible) { // FertilisationDate ?>
		<td <?php echo $ivf_vitrification_delete->FertilisationDate->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitrification_delete->RowCount ?>_ivf_vitrification_FertilisationDate" class="ivf_vitrification_FertilisationDate">
<span<?php echo $ivf_vitrification_delete->FertilisationDate->viewAttributes() ?>><?php echo $ivf_vitrification_delete->FertilisationDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitrification_delete->Day->Visible) { // Day ?>
		<td <?php echo $ivf_vitrification_delete->Day->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitrification_delete->RowCount ?>_ivf_vitrification_Day" class="ivf_vitrification_Day">
<span<?php echo $ivf_vitrification_delete->Day->viewAttributes() ?>><?php echo $ivf_vitrification_delete->Day->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitrification_delete->Grade->Visible) { // Grade ?>
		<td <?php echo $ivf_vitrification_delete->Grade->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitrification_delete->RowCount ?>_ivf_vitrification_Grade" class="ivf_vitrification_Grade">
<span<?php echo $ivf_vitrification_delete->Grade->viewAttributes() ?>><?php echo $ivf_vitrification_delete->Grade->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitrification_delete->Incubator->Visible) { // Incubator ?>
		<td <?php echo $ivf_vitrification_delete->Incubator->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitrification_delete->RowCount ?>_ivf_vitrification_Incubator" class="ivf_vitrification_Incubator">
<span<?php echo $ivf_vitrification_delete->Incubator->viewAttributes() ?>><?php echo $ivf_vitrification_delete->Incubator->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitrification_delete->Tank->Visible) { // Tank ?>
		<td <?php echo $ivf_vitrification_delete->Tank->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitrification_delete->RowCount ?>_ivf_vitrification_Tank" class="ivf_vitrification_Tank">
<span<?php echo $ivf_vitrification_delete->Tank->viewAttributes() ?>><?php echo $ivf_vitrification_delete->Tank->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitrification_delete->Canister->Visible) { // Canister ?>
		<td <?php echo $ivf_vitrification_delete->Canister->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitrification_delete->RowCount ?>_ivf_vitrification_Canister" class="ivf_vitrification_Canister">
<span<?php echo $ivf_vitrification_delete->Canister->viewAttributes() ?>><?php echo $ivf_vitrification_delete->Canister->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitrification_delete->Gobiet->Visible) { // Gobiet ?>
		<td <?php echo $ivf_vitrification_delete->Gobiet->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitrification_delete->RowCount ?>_ivf_vitrification_Gobiet" class="ivf_vitrification_Gobiet">
<span<?php echo $ivf_vitrification_delete->Gobiet->viewAttributes() ?>><?php echo $ivf_vitrification_delete->Gobiet->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitrification_delete->CryolockNo->Visible) { // CryolockNo ?>
		<td <?php echo $ivf_vitrification_delete->CryolockNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitrification_delete->RowCount ?>_ivf_vitrification_CryolockNo" class="ivf_vitrification_CryolockNo">
<span<?php echo $ivf_vitrification_delete->CryolockNo->viewAttributes() ?>><?php echo $ivf_vitrification_delete->CryolockNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitrification_delete->CryolockColour->Visible) { // CryolockColour ?>
		<td <?php echo $ivf_vitrification_delete->CryolockColour->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitrification_delete->RowCount ?>_ivf_vitrification_CryolockColour" class="ivf_vitrification_CryolockColour">
<span<?php echo $ivf_vitrification_delete->CryolockColour->viewAttributes() ?>><?php echo $ivf_vitrification_delete->CryolockColour->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitrification_delete->Stage->Visible) { // Stage ?>
		<td <?php echo $ivf_vitrification_delete->Stage->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitrification_delete->RowCount ?>_ivf_vitrification_Stage" class="ivf_vitrification_Stage">
<span<?php echo $ivf_vitrification_delete->Stage->viewAttributes() ?>><?php echo $ivf_vitrification_delete->Stage->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$ivf_vitrification_delete->Recordset->moveNext();
}
$ivf_vitrification_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $ivf_vitrification_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$ivf_vitrification_delete->showPageFooter();
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
$ivf_vitrification_delete->terminate();
?>