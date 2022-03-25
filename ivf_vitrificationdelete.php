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
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fivf_vitrificationdelete = currentForm = new ew.Form("fivf_vitrificationdelete", "delete");

// Form_CustomValidate event
fivf_vitrificationdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_vitrificationdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fivf_vitrificationdelete.lists["x_Day"] = <?php echo $ivf_vitrification_delete->Day->Lookup->toClientList() ?>;
fivf_vitrificationdelete.lists["x_Day"].options = <?php echo JsonEncode($ivf_vitrification_delete->Day->options(FALSE, TRUE)) ?>;
fivf_vitrificationdelete.lists["x_Grade"] = <?php echo $ivf_vitrification_delete->Grade->Lookup->toClientList() ?>;
fivf_vitrificationdelete.lists["x_Grade"].options = <?php echo JsonEncode($ivf_vitrification_delete->Grade->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $ivf_vitrification_delete->showPageHeader(); ?>
<?php
$ivf_vitrification_delete->showMessage();
?>
<form name="fivf_vitrificationdelete" id="fivf_vitrificationdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ivf_vitrification_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_vitrification_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_vitrification">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($ivf_vitrification_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($ivf_vitrification->vitrificationDate->Visible) { // vitrificationDate ?>
		<th class="<?php echo $ivf_vitrification->vitrificationDate->headerCellClass() ?>"><span id="elh_ivf_vitrification_vitrificationDate" class="ivf_vitrification_vitrificationDate"><?php echo $ivf_vitrification->vitrificationDate->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitrification->PrimaryEmbryologist->Visible) { // PrimaryEmbryologist ?>
		<th class="<?php echo $ivf_vitrification->PrimaryEmbryologist->headerCellClass() ?>"><span id="elh_ivf_vitrification_PrimaryEmbryologist" class="ivf_vitrification_PrimaryEmbryologist"><?php echo $ivf_vitrification->PrimaryEmbryologist->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitrification->SecondaryEmbryologist->Visible) { // SecondaryEmbryologist ?>
		<th class="<?php echo $ivf_vitrification->SecondaryEmbryologist->headerCellClass() ?>"><span id="elh_ivf_vitrification_SecondaryEmbryologist" class="ivf_vitrification_SecondaryEmbryologist"><?php echo $ivf_vitrification->SecondaryEmbryologist->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitrification->EmbryoNo->Visible) { // EmbryoNo ?>
		<th class="<?php echo $ivf_vitrification->EmbryoNo->headerCellClass() ?>"><span id="elh_ivf_vitrification_EmbryoNo" class="ivf_vitrification_EmbryoNo"><?php echo $ivf_vitrification->EmbryoNo->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitrification->FertilisationDate->Visible) { // FertilisationDate ?>
		<th class="<?php echo $ivf_vitrification->FertilisationDate->headerCellClass() ?>"><span id="elh_ivf_vitrification_FertilisationDate" class="ivf_vitrification_FertilisationDate"><?php echo $ivf_vitrification->FertilisationDate->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitrification->Day->Visible) { // Day ?>
		<th class="<?php echo $ivf_vitrification->Day->headerCellClass() ?>"><span id="elh_ivf_vitrification_Day" class="ivf_vitrification_Day"><?php echo $ivf_vitrification->Day->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitrification->Grade->Visible) { // Grade ?>
		<th class="<?php echo $ivf_vitrification->Grade->headerCellClass() ?>"><span id="elh_ivf_vitrification_Grade" class="ivf_vitrification_Grade"><?php echo $ivf_vitrification->Grade->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitrification->Incubator->Visible) { // Incubator ?>
		<th class="<?php echo $ivf_vitrification->Incubator->headerCellClass() ?>"><span id="elh_ivf_vitrification_Incubator" class="ivf_vitrification_Incubator"><?php echo $ivf_vitrification->Incubator->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitrification->Tank->Visible) { // Tank ?>
		<th class="<?php echo $ivf_vitrification->Tank->headerCellClass() ?>"><span id="elh_ivf_vitrification_Tank" class="ivf_vitrification_Tank"><?php echo $ivf_vitrification->Tank->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitrification->Canister->Visible) { // Canister ?>
		<th class="<?php echo $ivf_vitrification->Canister->headerCellClass() ?>"><span id="elh_ivf_vitrification_Canister" class="ivf_vitrification_Canister"><?php echo $ivf_vitrification->Canister->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitrification->Gobiet->Visible) { // Gobiet ?>
		<th class="<?php echo $ivf_vitrification->Gobiet->headerCellClass() ?>"><span id="elh_ivf_vitrification_Gobiet" class="ivf_vitrification_Gobiet"><?php echo $ivf_vitrification->Gobiet->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitrification->CryolockNo->Visible) { // CryolockNo ?>
		<th class="<?php echo $ivf_vitrification->CryolockNo->headerCellClass() ?>"><span id="elh_ivf_vitrification_CryolockNo" class="ivf_vitrification_CryolockNo"><?php echo $ivf_vitrification->CryolockNo->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitrification->CryolockColour->Visible) { // CryolockColour ?>
		<th class="<?php echo $ivf_vitrification->CryolockColour->headerCellClass() ?>"><span id="elh_ivf_vitrification_CryolockColour" class="ivf_vitrification_CryolockColour"><?php echo $ivf_vitrification->CryolockColour->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_vitrification->Stage->Visible) { // Stage ?>
		<th class="<?php echo $ivf_vitrification->Stage->headerCellClass() ?>"><span id="elh_ivf_vitrification_Stage" class="ivf_vitrification_Stage"><?php echo $ivf_vitrification->Stage->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$ivf_vitrification_delete->RecCnt = 0;
$i = 0;
while (!$ivf_vitrification_delete->Recordset->EOF) {
	$ivf_vitrification_delete->RecCnt++;
	$ivf_vitrification_delete->RowCnt++;

	// Set row properties
	$ivf_vitrification->resetAttributes();
	$ivf_vitrification->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$ivf_vitrification_delete->loadRowValues($ivf_vitrification_delete->Recordset);

	// Render row
	$ivf_vitrification_delete->renderRow();
?>
	<tr<?php echo $ivf_vitrification->rowAttributes() ?>>
<?php if ($ivf_vitrification->vitrificationDate->Visible) { // vitrificationDate ?>
		<td<?php echo $ivf_vitrification->vitrificationDate->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitrification_delete->RowCnt ?>_ivf_vitrification_vitrificationDate" class="ivf_vitrification_vitrificationDate">
<span<?php echo $ivf_vitrification->vitrificationDate->viewAttributes() ?>>
<?php echo $ivf_vitrification->vitrificationDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitrification->PrimaryEmbryologist->Visible) { // PrimaryEmbryologist ?>
		<td<?php echo $ivf_vitrification->PrimaryEmbryologist->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitrification_delete->RowCnt ?>_ivf_vitrification_PrimaryEmbryologist" class="ivf_vitrification_PrimaryEmbryologist">
<span<?php echo $ivf_vitrification->PrimaryEmbryologist->viewAttributes() ?>>
<?php echo $ivf_vitrification->PrimaryEmbryologist->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitrification->SecondaryEmbryologist->Visible) { // SecondaryEmbryologist ?>
		<td<?php echo $ivf_vitrification->SecondaryEmbryologist->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitrification_delete->RowCnt ?>_ivf_vitrification_SecondaryEmbryologist" class="ivf_vitrification_SecondaryEmbryologist">
<span<?php echo $ivf_vitrification->SecondaryEmbryologist->viewAttributes() ?>>
<?php echo $ivf_vitrification->SecondaryEmbryologist->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitrification->EmbryoNo->Visible) { // EmbryoNo ?>
		<td<?php echo $ivf_vitrification->EmbryoNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitrification_delete->RowCnt ?>_ivf_vitrification_EmbryoNo" class="ivf_vitrification_EmbryoNo">
<span<?php echo $ivf_vitrification->EmbryoNo->viewAttributes() ?>>
<?php echo $ivf_vitrification->EmbryoNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitrification->FertilisationDate->Visible) { // FertilisationDate ?>
		<td<?php echo $ivf_vitrification->FertilisationDate->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitrification_delete->RowCnt ?>_ivf_vitrification_FertilisationDate" class="ivf_vitrification_FertilisationDate">
<span<?php echo $ivf_vitrification->FertilisationDate->viewAttributes() ?>>
<?php echo $ivf_vitrification->FertilisationDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitrification->Day->Visible) { // Day ?>
		<td<?php echo $ivf_vitrification->Day->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitrification_delete->RowCnt ?>_ivf_vitrification_Day" class="ivf_vitrification_Day">
<span<?php echo $ivf_vitrification->Day->viewAttributes() ?>>
<?php echo $ivf_vitrification->Day->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitrification->Grade->Visible) { // Grade ?>
		<td<?php echo $ivf_vitrification->Grade->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitrification_delete->RowCnt ?>_ivf_vitrification_Grade" class="ivf_vitrification_Grade">
<span<?php echo $ivf_vitrification->Grade->viewAttributes() ?>>
<?php echo $ivf_vitrification->Grade->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitrification->Incubator->Visible) { // Incubator ?>
		<td<?php echo $ivf_vitrification->Incubator->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitrification_delete->RowCnt ?>_ivf_vitrification_Incubator" class="ivf_vitrification_Incubator">
<span<?php echo $ivf_vitrification->Incubator->viewAttributes() ?>>
<?php echo $ivf_vitrification->Incubator->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitrification->Tank->Visible) { // Tank ?>
		<td<?php echo $ivf_vitrification->Tank->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitrification_delete->RowCnt ?>_ivf_vitrification_Tank" class="ivf_vitrification_Tank">
<span<?php echo $ivf_vitrification->Tank->viewAttributes() ?>>
<?php echo $ivf_vitrification->Tank->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitrification->Canister->Visible) { // Canister ?>
		<td<?php echo $ivf_vitrification->Canister->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitrification_delete->RowCnt ?>_ivf_vitrification_Canister" class="ivf_vitrification_Canister">
<span<?php echo $ivf_vitrification->Canister->viewAttributes() ?>>
<?php echo $ivf_vitrification->Canister->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitrification->Gobiet->Visible) { // Gobiet ?>
		<td<?php echo $ivf_vitrification->Gobiet->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitrification_delete->RowCnt ?>_ivf_vitrification_Gobiet" class="ivf_vitrification_Gobiet">
<span<?php echo $ivf_vitrification->Gobiet->viewAttributes() ?>>
<?php echo $ivf_vitrification->Gobiet->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitrification->CryolockNo->Visible) { // CryolockNo ?>
		<td<?php echo $ivf_vitrification->CryolockNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitrification_delete->RowCnt ?>_ivf_vitrification_CryolockNo" class="ivf_vitrification_CryolockNo">
<span<?php echo $ivf_vitrification->CryolockNo->viewAttributes() ?>>
<?php echo $ivf_vitrification->CryolockNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitrification->CryolockColour->Visible) { // CryolockColour ?>
		<td<?php echo $ivf_vitrification->CryolockColour->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitrification_delete->RowCnt ?>_ivf_vitrification_CryolockColour" class="ivf_vitrification_CryolockColour">
<span<?php echo $ivf_vitrification->CryolockColour->viewAttributes() ?>>
<?php echo $ivf_vitrification->CryolockColour->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_vitrification->Stage->Visible) { // Stage ?>
		<td<?php echo $ivf_vitrification->Stage->cellAttributes() ?>>
<span id="el<?php echo $ivf_vitrification_delete->RowCnt ?>_ivf_vitrification_Stage" class="ivf_vitrification_Stage">
<span<?php echo $ivf_vitrification->Stage->viewAttributes() ?>>
<?php echo $ivf_vitrification->Stage->getViewValue() ?></span>
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
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$ivf_vitrification_delete->terminate();
?>