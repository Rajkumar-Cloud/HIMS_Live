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
$ivf_vitrification_view = new ivf_vitrification_view();

// Run the page
$ivf_vitrification_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_vitrification_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$ivf_vitrification->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fivf_vitrificationview = currentForm = new ew.Form("fivf_vitrificationview", "view");

// Form_CustomValidate event
fivf_vitrificationview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_vitrificationview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fivf_vitrificationview.lists["x_Day"] = <?php echo $ivf_vitrification_view->Day->Lookup->toClientList() ?>;
fivf_vitrificationview.lists["x_Day"].options = <?php echo JsonEncode($ivf_vitrification_view->Day->options(FALSE, TRUE)) ?>;
fivf_vitrificationview.lists["x_Grade"] = <?php echo $ivf_vitrification_view->Grade->Lookup->toClientList() ?>;
fivf_vitrificationview.lists["x_Grade"].options = <?php echo JsonEncode($ivf_vitrification_view->Grade->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$ivf_vitrification->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $ivf_vitrification_view->ExportOptions->render("body") ?>
<?php $ivf_vitrification_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $ivf_vitrification_view->showPageHeader(); ?>
<?php
$ivf_vitrification_view->showMessage();
?>
<form name="fivf_vitrificationview" id="fivf_vitrificationview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ivf_vitrification_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_vitrification_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_vitrification">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_vitrification_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($ivf_vitrification->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $ivf_vitrification_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_id"><?php echo $ivf_vitrification->id->caption() ?></span></td>
		<td data-name="id"<?php echo $ivf_vitrification->id->cellAttributes() ?>>
<span id="el_ivf_vitrification_id">
<span<?php echo $ivf_vitrification->id->viewAttributes() ?>>
<?php echo $ivf_vitrification->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitrification->RIDNo->Visible) { // RIDNo ?>
	<tr id="r_RIDNo">
		<td class="<?php echo $ivf_vitrification_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_RIDNo"><?php echo $ivf_vitrification->RIDNo->caption() ?></span></td>
		<td data-name="RIDNo"<?php echo $ivf_vitrification->RIDNo->cellAttributes() ?>>
<span id="el_ivf_vitrification_RIDNo">
<span<?php echo $ivf_vitrification->RIDNo->viewAttributes() ?>>
<?php echo $ivf_vitrification->RIDNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitrification->PatientName->Visible) { // PatientName ?>
	<tr id="r_PatientName">
		<td class="<?php echo $ivf_vitrification_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_PatientName"><?php echo $ivf_vitrification->PatientName->caption() ?></span></td>
		<td data-name="PatientName"<?php echo $ivf_vitrification->PatientName->cellAttributes() ?>>
<span id="el_ivf_vitrification_PatientName">
<span<?php echo $ivf_vitrification->PatientName->viewAttributes() ?>>
<?php echo $ivf_vitrification->PatientName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitrification->TiDNo->Visible) { // TiDNo ?>
	<tr id="r_TiDNo">
		<td class="<?php echo $ivf_vitrification_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_TiDNo"><?php echo $ivf_vitrification->TiDNo->caption() ?></span></td>
		<td data-name="TiDNo"<?php echo $ivf_vitrification->TiDNo->cellAttributes() ?>>
<span id="el_ivf_vitrification_TiDNo">
<span<?php echo $ivf_vitrification->TiDNo->viewAttributes() ?>>
<?php echo $ivf_vitrification->TiDNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitrification->vitrificationDate->Visible) { // vitrificationDate ?>
	<tr id="r_vitrificationDate">
		<td class="<?php echo $ivf_vitrification_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_vitrificationDate"><?php echo $ivf_vitrification->vitrificationDate->caption() ?></span></td>
		<td data-name="vitrificationDate"<?php echo $ivf_vitrification->vitrificationDate->cellAttributes() ?>>
<span id="el_ivf_vitrification_vitrificationDate">
<span<?php echo $ivf_vitrification->vitrificationDate->viewAttributes() ?>>
<?php echo $ivf_vitrification->vitrificationDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitrification->PrimaryEmbryologist->Visible) { // PrimaryEmbryologist ?>
	<tr id="r_PrimaryEmbryologist">
		<td class="<?php echo $ivf_vitrification_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_PrimaryEmbryologist"><?php echo $ivf_vitrification->PrimaryEmbryologist->caption() ?></span></td>
		<td data-name="PrimaryEmbryologist"<?php echo $ivf_vitrification->PrimaryEmbryologist->cellAttributes() ?>>
<span id="el_ivf_vitrification_PrimaryEmbryologist">
<span<?php echo $ivf_vitrification->PrimaryEmbryologist->viewAttributes() ?>>
<?php echo $ivf_vitrification->PrimaryEmbryologist->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitrification->SecondaryEmbryologist->Visible) { // SecondaryEmbryologist ?>
	<tr id="r_SecondaryEmbryologist">
		<td class="<?php echo $ivf_vitrification_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_SecondaryEmbryologist"><?php echo $ivf_vitrification->SecondaryEmbryologist->caption() ?></span></td>
		<td data-name="SecondaryEmbryologist"<?php echo $ivf_vitrification->SecondaryEmbryologist->cellAttributes() ?>>
<span id="el_ivf_vitrification_SecondaryEmbryologist">
<span<?php echo $ivf_vitrification->SecondaryEmbryologist->viewAttributes() ?>>
<?php echo $ivf_vitrification->SecondaryEmbryologist->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitrification->EmbryoNo->Visible) { // EmbryoNo ?>
	<tr id="r_EmbryoNo">
		<td class="<?php echo $ivf_vitrification_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_EmbryoNo"><?php echo $ivf_vitrification->EmbryoNo->caption() ?></span></td>
		<td data-name="EmbryoNo"<?php echo $ivf_vitrification->EmbryoNo->cellAttributes() ?>>
<span id="el_ivf_vitrification_EmbryoNo">
<span<?php echo $ivf_vitrification->EmbryoNo->viewAttributes() ?>>
<?php echo $ivf_vitrification->EmbryoNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitrification->FertilisationDate->Visible) { // FertilisationDate ?>
	<tr id="r_FertilisationDate">
		<td class="<?php echo $ivf_vitrification_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_FertilisationDate"><?php echo $ivf_vitrification->FertilisationDate->caption() ?></span></td>
		<td data-name="FertilisationDate"<?php echo $ivf_vitrification->FertilisationDate->cellAttributes() ?>>
<span id="el_ivf_vitrification_FertilisationDate">
<span<?php echo $ivf_vitrification->FertilisationDate->viewAttributes() ?>>
<?php echo $ivf_vitrification->FertilisationDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitrification->Day->Visible) { // Day ?>
	<tr id="r_Day">
		<td class="<?php echo $ivf_vitrification_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_Day"><?php echo $ivf_vitrification->Day->caption() ?></span></td>
		<td data-name="Day"<?php echo $ivf_vitrification->Day->cellAttributes() ?>>
<span id="el_ivf_vitrification_Day">
<span<?php echo $ivf_vitrification->Day->viewAttributes() ?>>
<?php echo $ivf_vitrification->Day->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitrification->Grade->Visible) { // Grade ?>
	<tr id="r_Grade">
		<td class="<?php echo $ivf_vitrification_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_Grade"><?php echo $ivf_vitrification->Grade->caption() ?></span></td>
		<td data-name="Grade"<?php echo $ivf_vitrification->Grade->cellAttributes() ?>>
<span id="el_ivf_vitrification_Grade">
<span<?php echo $ivf_vitrification->Grade->viewAttributes() ?>>
<?php echo $ivf_vitrification->Grade->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitrification->Incubator->Visible) { // Incubator ?>
	<tr id="r_Incubator">
		<td class="<?php echo $ivf_vitrification_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_Incubator"><?php echo $ivf_vitrification->Incubator->caption() ?></span></td>
		<td data-name="Incubator"<?php echo $ivf_vitrification->Incubator->cellAttributes() ?>>
<span id="el_ivf_vitrification_Incubator">
<span<?php echo $ivf_vitrification->Incubator->viewAttributes() ?>>
<?php echo $ivf_vitrification->Incubator->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitrification->Tank->Visible) { // Tank ?>
	<tr id="r_Tank">
		<td class="<?php echo $ivf_vitrification_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_Tank"><?php echo $ivf_vitrification->Tank->caption() ?></span></td>
		<td data-name="Tank"<?php echo $ivf_vitrification->Tank->cellAttributes() ?>>
<span id="el_ivf_vitrification_Tank">
<span<?php echo $ivf_vitrification->Tank->viewAttributes() ?>>
<?php echo $ivf_vitrification->Tank->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitrification->Canister->Visible) { // Canister ?>
	<tr id="r_Canister">
		<td class="<?php echo $ivf_vitrification_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_Canister"><?php echo $ivf_vitrification->Canister->caption() ?></span></td>
		<td data-name="Canister"<?php echo $ivf_vitrification->Canister->cellAttributes() ?>>
<span id="el_ivf_vitrification_Canister">
<span<?php echo $ivf_vitrification->Canister->viewAttributes() ?>>
<?php echo $ivf_vitrification->Canister->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitrification->Gobiet->Visible) { // Gobiet ?>
	<tr id="r_Gobiet">
		<td class="<?php echo $ivf_vitrification_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_Gobiet"><?php echo $ivf_vitrification->Gobiet->caption() ?></span></td>
		<td data-name="Gobiet"<?php echo $ivf_vitrification->Gobiet->cellAttributes() ?>>
<span id="el_ivf_vitrification_Gobiet">
<span<?php echo $ivf_vitrification->Gobiet->viewAttributes() ?>>
<?php echo $ivf_vitrification->Gobiet->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitrification->CryolockNo->Visible) { // CryolockNo ?>
	<tr id="r_CryolockNo">
		<td class="<?php echo $ivf_vitrification_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_CryolockNo"><?php echo $ivf_vitrification->CryolockNo->caption() ?></span></td>
		<td data-name="CryolockNo"<?php echo $ivf_vitrification->CryolockNo->cellAttributes() ?>>
<span id="el_ivf_vitrification_CryolockNo">
<span<?php echo $ivf_vitrification->CryolockNo->viewAttributes() ?>>
<?php echo $ivf_vitrification->CryolockNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitrification->CryolockColour->Visible) { // CryolockColour ?>
	<tr id="r_CryolockColour">
		<td class="<?php echo $ivf_vitrification_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_CryolockColour"><?php echo $ivf_vitrification->CryolockColour->caption() ?></span></td>
		<td data-name="CryolockColour"<?php echo $ivf_vitrification->CryolockColour->cellAttributes() ?>>
<span id="el_ivf_vitrification_CryolockColour">
<span<?php echo $ivf_vitrification->CryolockColour->viewAttributes() ?>>
<?php echo $ivf_vitrification->CryolockColour->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitrification->Stage->Visible) { // Stage ?>
	<tr id="r_Stage">
		<td class="<?php echo $ivf_vitrification_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_Stage"><?php echo $ivf_vitrification->Stage->caption() ?></span></td>
		<td data-name="Stage"<?php echo $ivf_vitrification->Stage->cellAttributes() ?>>
<span id="el_ivf_vitrification_Stage">
<span<?php echo $ivf_vitrification->Stage->viewAttributes() ?>>
<?php echo $ivf_vitrification->Stage->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitrification->thawDate->Visible) { // thawDate ?>
	<tr id="r_thawDate">
		<td class="<?php echo $ivf_vitrification_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_thawDate"><?php echo $ivf_vitrification->thawDate->caption() ?></span></td>
		<td data-name="thawDate"<?php echo $ivf_vitrification->thawDate->cellAttributes() ?>>
<span id="el_ivf_vitrification_thawDate">
<span<?php echo $ivf_vitrification->thawDate->viewAttributes() ?>>
<?php echo $ivf_vitrification->thawDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitrification->thawPrimaryEmbryologist->Visible) { // thawPrimaryEmbryologist ?>
	<tr id="r_thawPrimaryEmbryologist">
		<td class="<?php echo $ivf_vitrification_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_thawPrimaryEmbryologist"><?php echo $ivf_vitrification->thawPrimaryEmbryologist->caption() ?></span></td>
		<td data-name="thawPrimaryEmbryologist"<?php echo $ivf_vitrification->thawPrimaryEmbryologist->cellAttributes() ?>>
<span id="el_ivf_vitrification_thawPrimaryEmbryologist">
<span<?php echo $ivf_vitrification->thawPrimaryEmbryologist->viewAttributes() ?>>
<?php echo $ivf_vitrification->thawPrimaryEmbryologist->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitrification->thawSecondaryEmbryologist->Visible) { // thawSecondaryEmbryologist ?>
	<tr id="r_thawSecondaryEmbryologist">
		<td class="<?php echo $ivf_vitrification_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_thawSecondaryEmbryologist"><?php echo $ivf_vitrification->thawSecondaryEmbryologist->caption() ?></span></td>
		<td data-name="thawSecondaryEmbryologist"<?php echo $ivf_vitrification->thawSecondaryEmbryologist->cellAttributes() ?>>
<span id="el_ivf_vitrification_thawSecondaryEmbryologist">
<span<?php echo $ivf_vitrification->thawSecondaryEmbryologist->viewAttributes() ?>>
<?php echo $ivf_vitrification->thawSecondaryEmbryologist->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitrification->thawET->Visible) { // thawET ?>
	<tr id="r_thawET">
		<td class="<?php echo $ivf_vitrification_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_thawET"><?php echo $ivf_vitrification->thawET->caption() ?></span></td>
		<td data-name="thawET"<?php echo $ivf_vitrification->thawET->cellAttributes() ?>>
<span id="el_ivf_vitrification_thawET">
<span<?php echo $ivf_vitrification->thawET->viewAttributes() ?>>
<?php echo $ivf_vitrification->thawET->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitrification->thawReFrozen->Visible) { // thawReFrozen ?>
	<tr id="r_thawReFrozen">
		<td class="<?php echo $ivf_vitrification_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_thawReFrozen"><?php echo $ivf_vitrification->thawReFrozen->caption() ?></span></td>
		<td data-name="thawReFrozen"<?php echo $ivf_vitrification->thawReFrozen->cellAttributes() ?>>
<span id="el_ivf_vitrification_thawReFrozen">
<span<?php echo $ivf_vitrification->thawReFrozen->viewAttributes() ?>>
<?php echo $ivf_vitrification->thawReFrozen->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitrification->thawAbserve->Visible) { // thawAbserve ?>
	<tr id="r_thawAbserve">
		<td class="<?php echo $ivf_vitrification_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_thawAbserve"><?php echo $ivf_vitrification->thawAbserve->caption() ?></span></td>
		<td data-name="thawAbserve"<?php echo $ivf_vitrification->thawAbserve->cellAttributes() ?>>
<span id="el_ivf_vitrification_thawAbserve">
<span<?php echo $ivf_vitrification->thawAbserve->viewAttributes() ?>>
<?php echo $ivf_vitrification->thawAbserve->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitrification->thawDiscard->Visible) { // thawDiscard ?>
	<tr id="r_thawDiscard">
		<td class="<?php echo $ivf_vitrification_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_thawDiscard"><?php echo $ivf_vitrification->thawDiscard->caption() ?></span></td>
		<td data-name="thawDiscard"<?php echo $ivf_vitrification->thawDiscard->cellAttributes() ?>>
<span id="el_ivf_vitrification_thawDiscard">
<span<?php echo $ivf_vitrification->thawDiscard->viewAttributes() ?>>
<?php echo $ivf_vitrification->thawDiscard->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitrification->Catheter->Visible) { // Catheter ?>
	<tr id="r_Catheter">
		<td class="<?php echo $ivf_vitrification_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_Catheter"><?php echo $ivf_vitrification->Catheter->caption() ?></span></td>
		<td data-name="Catheter"<?php echo $ivf_vitrification->Catheter->cellAttributes() ?>>
<span id="el_ivf_vitrification_Catheter">
<span<?php echo $ivf_vitrification->Catheter->viewAttributes() ?>>
<?php echo $ivf_vitrification->Catheter->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitrification->Difficulty->Visible) { // Difficulty ?>
	<tr id="r_Difficulty">
		<td class="<?php echo $ivf_vitrification_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_Difficulty"><?php echo $ivf_vitrification->Difficulty->caption() ?></span></td>
		<td data-name="Difficulty"<?php echo $ivf_vitrification->Difficulty->cellAttributes() ?>>
<span id="el_ivf_vitrification_Difficulty">
<span<?php echo $ivf_vitrification->Difficulty->viewAttributes() ?>>
<?php echo $ivf_vitrification->Difficulty->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitrification->Easy->Visible) { // Easy ?>
	<tr id="r_Easy">
		<td class="<?php echo $ivf_vitrification_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_Easy"><?php echo $ivf_vitrification->Easy->caption() ?></span></td>
		<td data-name="Easy"<?php echo $ivf_vitrification->Easy->cellAttributes() ?>>
<span id="el_ivf_vitrification_Easy">
<span<?php echo $ivf_vitrification->Easy->viewAttributes() ?>>
<?php echo $ivf_vitrification->Easy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitrification->Comments->Visible) { // Comments ?>
	<tr id="r_Comments">
		<td class="<?php echo $ivf_vitrification_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_Comments"><?php echo $ivf_vitrification->Comments->caption() ?></span></td>
		<td data-name="Comments"<?php echo $ivf_vitrification->Comments->cellAttributes() ?>>
<span id="el_ivf_vitrification_Comments">
<span<?php echo $ivf_vitrification->Comments->viewAttributes() ?>>
<?php echo $ivf_vitrification->Comments->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitrification->Doctor->Visible) { // Doctor ?>
	<tr id="r_Doctor">
		<td class="<?php echo $ivf_vitrification_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_Doctor"><?php echo $ivf_vitrification->Doctor->caption() ?></span></td>
		<td data-name="Doctor"<?php echo $ivf_vitrification->Doctor->cellAttributes() ?>>
<span id="el_ivf_vitrification_Doctor">
<span<?php echo $ivf_vitrification->Doctor->viewAttributes() ?>>
<?php echo $ivf_vitrification->Doctor->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitrification->Embryologist->Visible) { // Embryologist ?>
	<tr id="r_Embryologist">
		<td class="<?php echo $ivf_vitrification_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_Embryologist"><?php echo $ivf_vitrification->Embryologist->caption() ?></span></td>
		<td data-name="Embryologist"<?php echo $ivf_vitrification->Embryologist->cellAttributes() ?>>
<span id="el_ivf_vitrification_Embryologist">
<span<?php echo $ivf_vitrification->Embryologist->viewAttributes() ?>>
<?php echo $ivf_vitrification->Embryologist->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$ivf_vitrification_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$ivf_vitrification->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$ivf_vitrification_view->terminate();
?>