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
<?php include_once "header.php"; ?>
<?php if (!$ivf_vitrification_view->isExport()) { ?>
<script>
var fivf_vitrificationview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fivf_vitrificationview = currentForm = new ew.Form("fivf_vitrificationview", "view");
	loadjs.done("fivf_vitrificationview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$ivf_vitrification_view->isExport()) { ?>
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
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_vitrification">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_vitrification_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($ivf_vitrification_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $ivf_vitrification_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_id"><?php echo $ivf_vitrification_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $ivf_vitrification_view->id->cellAttributes() ?>>
<span id="el_ivf_vitrification_id">
<span<?php echo $ivf_vitrification_view->id->viewAttributes() ?>><?php echo $ivf_vitrification_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitrification_view->RIDNo->Visible) { // RIDNo ?>
	<tr id="r_RIDNo">
		<td class="<?php echo $ivf_vitrification_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_RIDNo"><?php echo $ivf_vitrification_view->RIDNo->caption() ?></span></td>
		<td data-name="RIDNo" <?php echo $ivf_vitrification_view->RIDNo->cellAttributes() ?>>
<span id="el_ivf_vitrification_RIDNo">
<span<?php echo $ivf_vitrification_view->RIDNo->viewAttributes() ?>><?php echo $ivf_vitrification_view->RIDNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitrification_view->PatientName->Visible) { // PatientName ?>
	<tr id="r_PatientName">
		<td class="<?php echo $ivf_vitrification_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_PatientName"><?php echo $ivf_vitrification_view->PatientName->caption() ?></span></td>
		<td data-name="PatientName" <?php echo $ivf_vitrification_view->PatientName->cellAttributes() ?>>
<span id="el_ivf_vitrification_PatientName">
<span<?php echo $ivf_vitrification_view->PatientName->viewAttributes() ?>><?php echo $ivf_vitrification_view->PatientName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitrification_view->TiDNo->Visible) { // TiDNo ?>
	<tr id="r_TiDNo">
		<td class="<?php echo $ivf_vitrification_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_TiDNo"><?php echo $ivf_vitrification_view->TiDNo->caption() ?></span></td>
		<td data-name="TiDNo" <?php echo $ivf_vitrification_view->TiDNo->cellAttributes() ?>>
<span id="el_ivf_vitrification_TiDNo">
<span<?php echo $ivf_vitrification_view->TiDNo->viewAttributes() ?>><?php echo $ivf_vitrification_view->TiDNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitrification_view->vitrificationDate->Visible) { // vitrificationDate ?>
	<tr id="r_vitrificationDate">
		<td class="<?php echo $ivf_vitrification_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_vitrificationDate"><?php echo $ivf_vitrification_view->vitrificationDate->caption() ?></span></td>
		<td data-name="vitrificationDate" <?php echo $ivf_vitrification_view->vitrificationDate->cellAttributes() ?>>
<span id="el_ivf_vitrification_vitrificationDate">
<span<?php echo $ivf_vitrification_view->vitrificationDate->viewAttributes() ?>><?php echo $ivf_vitrification_view->vitrificationDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitrification_view->PrimaryEmbryologist->Visible) { // PrimaryEmbryologist ?>
	<tr id="r_PrimaryEmbryologist">
		<td class="<?php echo $ivf_vitrification_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_PrimaryEmbryologist"><?php echo $ivf_vitrification_view->PrimaryEmbryologist->caption() ?></span></td>
		<td data-name="PrimaryEmbryologist" <?php echo $ivf_vitrification_view->PrimaryEmbryologist->cellAttributes() ?>>
<span id="el_ivf_vitrification_PrimaryEmbryologist">
<span<?php echo $ivf_vitrification_view->PrimaryEmbryologist->viewAttributes() ?>><?php echo $ivf_vitrification_view->PrimaryEmbryologist->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitrification_view->SecondaryEmbryologist->Visible) { // SecondaryEmbryologist ?>
	<tr id="r_SecondaryEmbryologist">
		<td class="<?php echo $ivf_vitrification_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_SecondaryEmbryologist"><?php echo $ivf_vitrification_view->SecondaryEmbryologist->caption() ?></span></td>
		<td data-name="SecondaryEmbryologist" <?php echo $ivf_vitrification_view->SecondaryEmbryologist->cellAttributes() ?>>
<span id="el_ivf_vitrification_SecondaryEmbryologist">
<span<?php echo $ivf_vitrification_view->SecondaryEmbryologist->viewAttributes() ?>><?php echo $ivf_vitrification_view->SecondaryEmbryologist->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitrification_view->EmbryoNo->Visible) { // EmbryoNo ?>
	<tr id="r_EmbryoNo">
		<td class="<?php echo $ivf_vitrification_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_EmbryoNo"><?php echo $ivf_vitrification_view->EmbryoNo->caption() ?></span></td>
		<td data-name="EmbryoNo" <?php echo $ivf_vitrification_view->EmbryoNo->cellAttributes() ?>>
<span id="el_ivf_vitrification_EmbryoNo">
<span<?php echo $ivf_vitrification_view->EmbryoNo->viewAttributes() ?>><?php echo $ivf_vitrification_view->EmbryoNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitrification_view->FertilisationDate->Visible) { // FertilisationDate ?>
	<tr id="r_FertilisationDate">
		<td class="<?php echo $ivf_vitrification_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_FertilisationDate"><?php echo $ivf_vitrification_view->FertilisationDate->caption() ?></span></td>
		<td data-name="FertilisationDate" <?php echo $ivf_vitrification_view->FertilisationDate->cellAttributes() ?>>
<span id="el_ivf_vitrification_FertilisationDate">
<span<?php echo $ivf_vitrification_view->FertilisationDate->viewAttributes() ?>><?php echo $ivf_vitrification_view->FertilisationDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitrification_view->Day->Visible) { // Day ?>
	<tr id="r_Day">
		<td class="<?php echo $ivf_vitrification_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_Day"><?php echo $ivf_vitrification_view->Day->caption() ?></span></td>
		<td data-name="Day" <?php echo $ivf_vitrification_view->Day->cellAttributes() ?>>
<span id="el_ivf_vitrification_Day">
<span<?php echo $ivf_vitrification_view->Day->viewAttributes() ?>><?php echo $ivf_vitrification_view->Day->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitrification_view->Grade->Visible) { // Grade ?>
	<tr id="r_Grade">
		<td class="<?php echo $ivf_vitrification_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_Grade"><?php echo $ivf_vitrification_view->Grade->caption() ?></span></td>
		<td data-name="Grade" <?php echo $ivf_vitrification_view->Grade->cellAttributes() ?>>
<span id="el_ivf_vitrification_Grade">
<span<?php echo $ivf_vitrification_view->Grade->viewAttributes() ?>><?php echo $ivf_vitrification_view->Grade->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitrification_view->Incubator->Visible) { // Incubator ?>
	<tr id="r_Incubator">
		<td class="<?php echo $ivf_vitrification_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_Incubator"><?php echo $ivf_vitrification_view->Incubator->caption() ?></span></td>
		<td data-name="Incubator" <?php echo $ivf_vitrification_view->Incubator->cellAttributes() ?>>
<span id="el_ivf_vitrification_Incubator">
<span<?php echo $ivf_vitrification_view->Incubator->viewAttributes() ?>><?php echo $ivf_vitrification_view->Incubator->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitrification_view->Tank->Visible) { // Tank ?>
	<tr id="r_Tank">
		<td class="<?php echo $ivf_vitrification_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_Tank"><?php echo $ivf_vitrification_view->Tank->caption() ?></span></td>
		<td data-name="Tank" <?php echo $ivf_vitrification_view->Tank->cellAttributes() ?>>
<span id="el_ivf_vitrification_Tank">
<span<?php echo $ivf_vitrification_view->Tank->viewAttributes() ?>><?php echo $ivf_vitrification_view->Tank->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitrification_view->Canister->Visible) { // Canister ?>
	<tr id="r_Canister">
		<td class="<?php echo $ivf_vitrification_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_Canister"><?php echo $ivf_vitrification_view->Canister->caption() ?></span></td>
		<td data-name="Canister" <?php echo $ivf_vitrification_view->Canister->cellAttributes() ?>>
<span id="el_ivf_vitrification_Canister">
<span<?php echo $ivf_vitrification_view->Canister->viewAttributes() ?>><?php echo $ivf_vitrification_view->Canister->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitrification_view->Gobiet->Visible) { // Gobiet ?>
	<tr id="r_Gobiet">
		<td class="<?php echo $ivf_vitrification_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_Gobiet"><?php echo $ivf_vitrification_view->Gobiet->caption() ?></span></td>
		<td data-name="Gobiet" <?php echo $ivf_vitrification_view->Gobiet->cellAttributes() ?>>
<span id="el_ivf_vitrification_Gobiet">
<span<?php echo $ivf_vitrification_view->Gobiet->viewAttributes() ?>><?php echo $ivf_vitrification_view->Gobiet->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitrification_view->CryolockNo->Visible) { // CryolockNo ?>
	<tr id="r_CryolockNo">
		<td class="<?php echo $ivf_vitrification_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_CryolockNo"><?php echo $ivf_vitrification_view->CryolockNo->caption() ?></span></td>
		<td data-name="CryolockNo" <?php echo $ivf_vitrification_view->CryolockNo->cellAttributes() ?>>
<span id="el_ivf_vitrification_CryolockNo">
<span<?php echo $ivf_vitrification_view->CryolockNo->viewAttributes() ?>><?php echo $ivf_vitrification_view->CryolockNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitrification_view->CryolockColour->Visible) { // CryolockColour ?>
	<tr id="r_CryolockColour">
		<td class="<?php echo $ivf_vitrification_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_CryolockColour"><?php echo $ivf_vitrification_view->CryolockColour->caption() ?></span></td>
		<td data-name="CryolockColour" <?php echo $ivf_vitrification_view->CryolockColour->cellAttributes() ?>>
<span id="el_ivf_vitrification_CryolockColour">
<span<?php echo $ivf_vitrification_view->CryolockColour->viewAttributes() ?>><?php echo $ivf_vitrification_view->CryolockColour->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitrification_view->Stage->Visible) { // Stage ?>
	<tr id="r_Stage">
		<td class="<?php echo $ivf_vitrification_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_Stage"><?php echo $ivf_vitrification_view->Stage->caption() ?></span></td>
		<td data-name="Stage" <?php echo $ivf_vitrification_view->Stage->cellAttributes() ?>>
<span id="el_ivf_vitrification_Stage">
<span<?php echo $ivf_vitrification_view->Stage->viewAttributes() ?>><?php echo $ivf_vitrification_view->Stage->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitrification_view->thawDate->Visible) { // thawDate ?>
	<tr id="r_thawDate">
		<td class="<?php echo $ivf_vitrification_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_thawDate"><?php echo $ivf_vitrification_view->thawDate->caption() ?></span></td>
		<td data-name="thawDate" <?php echo $ivf_vitrification_view->thawDate->cellAttributes() ?>>
<span id="el_ivf_vitrification_thawDate">
<span<?php echo $ivf_vitrification_view->thawDate->viewAttributes() ?>><?php echo $ivf_vitrification_view->thawDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitrification_view->thawPrimaryEmbryologist->Visible) { // thawPrimaryEmbryologist ?>
	<tr id="r_thawPrimaryEmbryologist">
		<td class="<?php echo $ivf_vitrification_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_thawPrimaryEmbryologist"><?php echo $ivf_vitrification_view->thawPrimaryEmbryologist->caption() ?></span></td>
		<td data-name="thawPrimaryEmbryologist" <?php echo $ivf_vitrification_view->thawPrimaryEmbryologist->cellAttributes() ?>>
<span id="el_ivf_vitrification_thawPrimaryEmbryologist">
<span<?php echo $ivf_vitrification_view->thawPrimaryEmbryologist->viewAttributes() ?>><?php echo $ivf_vitrification_view->thawPrimaryEmbryologist->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitrification_view->thawSecondaryEmbryologist->Visible) { // thawSecondaryEmbryologist ?>
	<tr id="r_thawSecondaryEmbryologist">
		<td class="<?php echo $ivf_vitrification_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_thawSecondaryEmbryologist"><?php echo $ivf_vitrification_view->thawSecondaryEmbryologist->caption() ?></span></td>
		<td data-name="thawSecondaryEmbryologist" <?php echo $ivf_vitrification_view->thawSecondaryEmbryologist->cellAttributes() ?>>
<span id="el_ivf_vitrification_thawSecondaryEmbryologist">
<span<?php echo $ivf_vitrification_view->thawSecondaryEmbryologist->viewAttributes() ?>><?php echo $ivf_vitrification_view->thawSecondaryEmbryologist->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitrification_view->thawET->Visible) { // thawET ?>
	<tr id="r_thawET">
		<td class="<?php echo $ivf_vitrification_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_thawET"><?php echo $ivf_vitrification_view->thawET->caption() ?></span></td>
		<td data-name="thawET" <?php echo $ivf_vitrification_view->thawET->cellAttributes() ?>>
<span id="el_ivf_vitrification_thawET">
<span<?php echo $ivf_vitrification_view->thawET->viewAttributes() ?>><?php echo $ivf_vitrification_view->thawET->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitrification_view->thawReFrozen->Visible) { // thawReFrozen ?>
	<tr id="r_thawReFrozen">
		<td class="<?php echo $ivf_vitrification_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_thawReFrozen"><?php echo $ivf_vitrification_view->thawReFrozen->caption() ?></span></td>
		<td data-name="thawReFrozen" <?php echo $ivf_vitrification_view->thawReFrozen->cellAttributes() ?>>
<span id="el_ivf_vitrification_thawReFrozen">
<span<?php echo $ivf_vitrification_view->thawReFrozen->viewAttributes() ?>><?php echo $ivf_vitrification_view->thawReFrozen->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitrification_view->thawAbserve->Visible) { // thawAbserve ?>
	<tr id="r_thawAbserve">
		<td class="<?php echo $ivf_vitrification_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_thawAbserve"><?php echo $ivf_vitrification_view->thawAbserve->caption() ?></span></td>
		<td data-name="thawAbserve" <?php echo $ivf_vitrification_view->thawAbserve->cellAttributes() ?>>
<span id="el_ivf_vitrification_thawAbserve">
<span<?php echo $ivf_vitrification_view->thawAbserve->viewAttributes() ?>><?php echo $ivf_vitrification_view->thawAbserve->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitrification_view->thawDiscard->Visible) { // thawDiscard ?>
	<tr id="r_thawDiscard">
		<td class="<?php echo $ivf_vitrification_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_thawDiscard"><?php echo $ivf_vitrification_view->thawDiscard->caption() ?></span></td>
		<td data-name="thawDiscard" <?php echo $ivf_vitrification_view->thawDiscard->cellAttributes() ?>>
<span id="el_ivf_vitrification_thawDiscard">
<span<?php echo $ivf_vitrification_view->thawDiscard->viewAttributes() ?>><?php echo $ivf_vitrification_view->thawDiscard->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitrification_view->Catheter->Visible) { // Catheter ?>
	<tr id="r_Catheter">
		<td class="<?php echo $ivf_vitrification_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_Catheter"><?php echo $ivf_vitrification_view->Catheter->caption() ?></span></td>
		<td data-name="Catheter" <?php echo $ivf_vitrification_view->Catheter->cellAttributes() ?>>
<span id="el_ivf_vitrification_Catheter">
<span<?php echo $ivf_vitrification_view->Catheter->viewAttributes() ?>><?php echo $ivf_vitrification_view->Catheter->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitrification_view->Difficulty->Visible) { // Difficulty ?>
	<tr id="r_Difficulty">
		<td class="<?php echo $ivf_vitrification_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_Difficulty"><?php echo $ivf_vitrification_view->Difficulty->caption() ?></span></td>
		<td data-name="Difficulty" <?php echo $ivf_vitrification_view->Difficulty->cellAttributes() ?>>
<span id="el_ivf_vitrification_Difficulty">
<span<?php echo $ivf_vitrification_view->Difficulty->viewAttributes() ?>><?php echo $ivf_vitrification_view->Difficulty->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitrification_view->Easy->Visible) { // Easy ?>
	<tr id="r_Easy">
		<td class="<?php echo $ivf_vitrification_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_Easy"><?php echo $ivf_vitrification_view->Easy->caption() ?></span></td>
		<td data-name="Easy" <?php echo $ivf_vitrification_view->Easy->cellAttributes() ?>>
<span id="el_ivf_vitrification_Easy">
<span<?php echo $ivf_vitrification_view->Easy->viewAttributes() ?>><?php echo $ivf_vitrification_view->Easy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitrification_view->Comments->Visible) { // Comments ?>
	<tr id="r_Comments">
		<td class="<?php echo $ivf_vitrification_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_Comments"><?php echo $ivf_vitrification_view->Comments->caption() ?></span></td>
		<td data-name="Comments" <?php echo $ivf_vitrification_view->Comments->cellAttributes() ?>>
<span id="el_ivf_vitrification_Comments">
<span<?php echo $ivf_vitrification_view->Comments->viewAttributes() ?>><?php echo $ivf_vitrification_view->Comments->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitrification_view->Doctor->Visible) { // Doctor ?>
	<tr id="r_Doctor">
		<td class="<?php echo $ivf_vitrification_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_Doctor"><?php echo $ivf_vitrification_view->Doctor->caption() ?></span></td>
		<td data-name="Doctor" <?php echo $ivf_vitrification_view->Doctor->cellAttributes() ?>>
<span id="el_ivf_vitrification_Doctor">
<span<?php echo $ivf_vitrification_view->Doctor->viewAttributes() ?>><?php echo $ivf_vitrification_view->Doctor->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_vitrification_view->Embryologist->Visible) { // Embryologist ?>
	<tr id="r_Embryologist">
		<td class="<?php echo $ivf_vitrification_view->TableLeftColumnClass ?>"><span id="elh_ivf_vitrification_Embryologist"><?php echo $ivf_vitrification_view->Embryologist->caption() ?></span></td>
		<td data-name="Embryologist" <?php echo $ivf_vitrification_view->Embryologist->cellAttributes() ?>>
<span id="el_ivf_vitrification_Embryologist">
<span<?php echo $ivf_vitrification_view->Embryologist->viewAttributes() ?>><?php echo $ivf_vitrification_view->Embryologist->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$ivf_vitrification_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$ivf_vitrification_view->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$ivf_vitrification_view->terminate();
?>