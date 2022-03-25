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
$ivf_donorsemendetails_view = new ivf_donorsemendetails_view();

// Run the page
$ivf_donorsemendetails_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_donorsemendetails_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$ivf_donorsemendetails_view->isExport()) { ?>
<script>
var fivf_donorsemendetailsview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fivf_donorsemendetailsview = currentForm = new ew.Form("fivf_donorsemendetailsview", "view");
	loadjs.done("fivf_donorsemendetailsview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$ivf_donorsemendetails_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $ivf_donorsemendetails_view->ExportOptions->render("body") ?>
<?php $ivf_donorsemendetails_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $ivf_donorsemendetails_view->showPageHeader(); ?>
<?php
$ivf_donorsemendetails_view->showMessage();
?>
<form name="fivf_donorsemendetailsview" id="fivf_donorsemendetailsview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_donorsemendetails">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_donorsemendetails_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($ivf_donorsemendetails_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $ivf_donorsemendetails_view->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_id"><?php echo $ivf_donorsemendetails_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $ivf_donorsemendetails_view->id->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_id">
<span<?php echo $ivf_donorsemendetails_view->id->viewAttributes() ?>><?php echo $ivf_donorsemendetails_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_donorsemendetails_view->RIDNo->Visible) { // RIDNo ?>
	<tr id="r_RIDNo">
		<td class="<?php echo $ivf_donorsemendetails_view->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_RIDNo"><?php echo $ivf_donorsemendetails_view->RIDNo->caption() ?></span></td>
		<td data-name="RIDNo" <?php echo $ivf_donorsemendetails_view->RIDNo->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_RIDNo">
<span<?php echo $ivf_donorsemendetails_view->RIDNo->viewAttributes() ?>><?php echo $ivf_donorsemendetails_view->RIDNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_donorsemendetails_view->TidNo->Visible) { // TidNo ?>
	<tr id="r_TidNo">
		<td class="<?php echo $ivf_donorsemendetails_view->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_TidNo"><?php echo $ivf_donorsemendetails_view->TidNo->caption() ?></span></td>
		<td data-name="TidNo" <?php echo $ivf_donorsemendetails_view->TidNo->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_TidNo">
<span<?php echo $ivf_donorsemendetails_view->TidNo->viewAttributes() ?>><?php echo $ivf_donorsemendetails_view->TidNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_donorsemendetails_view->Agency->Visible) { // Agency ?>
	<tr id="r_Agency">
		<td class="<?php echo $ivf_donorsemendetails_view->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_Agency"><?php echo $ivf_donorsemendetails_view->Agency->caption() ?></span></td>
		<td data-name="Agency" <?php echo $ivf_donorsemendetails_view->Agency->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_Agency">
<span<?php echo $ivf_donorsemendetails_view->Agency->viewAttributes() ?>><?php echo $ivf_donorsemendetails_view->Agency->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_donorsemendetails_view->ReceivedOn->Visible) { // ReceivedOn ?>
	<tr id="r_ReceivedOn">
		<td class="<?php echo $ivf_donorsemendetails_view->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_ReceivedOn"><?php echo $ivf_donorsemendetails_view->ReceivedOn->caption() ?></span></td>
		<td data-name="ReceivedOn" <?php echo $ivf_donorsemendetails_view->ReceivedOn->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_ReceivedOn">
<span<?php echo $ivf_donorsemendetails_view->ReceivedOn->viewAttributes() ?>><?php echo $ivf_donorsemendetails_view->ReceivedOn->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_donorsemendetails_view->ReceivedBy->Visible) { // ReceivedBy ?>
	<tr id="r_ReceivedBy">
		<td class="<?php echo $ivf_donorsemendetails_view->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_ReceivedBy"><?php echo $ivf_donorsemendetails_view->ReceivedBy->caption() ?></span></td>
		<td data-name="ReceivedBy" <?php echo $ivf_donorsemendetails_view->ReceivedBy->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_ReceivedBy">
<span<?php echo $ivf_donorsemendetails_view->ReceivedBy->viewAttributes() ?>><?php echo $ivf_donorsemendetails_view->ReceivedBy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_donorsemendetails_view->DonorNo->Visible) { // DonorNo ?>
	<tr id="r_DonorNo">
		<td class="<?php echo $ivf_donorsemendetails_view->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_DonorNo"><?php echo $ivf_donorsemendetails_view->DonorNo->caption() ?></span></td>
		<td data-name="DonorNo" <?php echo $ivf_donorsemendetails_view->DonorNo->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_DonorNo">
<span<?php echo $ivf_donorsemendetails_view->DonorNo->viewAttributes() ?>><?php echo $ivf_donorsemendetails_view->DonorNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_donorsemendetails_view->BatchNo->Visible) { // BatchNo ?>
	<tr id="r_BatchNo">
		<td class="<?php echo $ivf_donorsemendetails_view->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_BatchNo"><?php echo $ivf_donorsemendetails_view->BatchNo->caption() ?></span></td>
		<td data-name="BatchNo" <?php echo $ivf_donorsemendetails_view->BatchNo->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_BatchNo">
<span<?php echo $ivf_donorsemendetails_view->BatchNo->viewAttributes() ?>><?php echo $ivf_donorsemendetails_view->BatchNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_donorsemendetails_view->BloodGroup->Visible) { // BloodGroup ?>
	<tr id="r_BloodGroup">
		<td class="<?php echo $ivf_donorsemendetails_view->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_BloodGroup"><?php echo $ivf_donorsemendetails_view->BloodGroup->caption() ?></span></td>
		<td data-name="BloodGroup" <?php echo $ivf_donorsemendetails_view->BloodGroup->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_BloodGroup">
<span<?php echo $ivf_donorsemendetails_view->BloodGroup->viewAttributes() ?>><?php echo $ivf_donorsemendetails_view->BloodGroup->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_donorsemendetails_view->Height->Visible) { // Height ?>
	<tr id="r_Height">
		<td class="<?php echo $ivf_donorsemendetails_view->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_Height"><?php echo $ivf_donorsemendetails_view->Height->caption() ?></span></td>
		<td data-name="Height" <?php echo $ivf_donorsemendetails_view->Height->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_Height">
<span<?php echo $ivf_donorsemendetails_view->Height->viewAttributes() ?>><?php echo $ivf_donorsemendetails_view->Height->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_donorsemendetails_view->SkinColor->Visible) { // SkinColor ?>
	<tr id="r_SkinColor">
		<td class="<?php echo $ivf_donorsemendetails_view->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_SkinColor"><?php echo $ivf_donorsemendetails_view->SkinColor->caption() ?></span></td>
		<td data-name="SkinColor" <?php echo $ivf_donorsemendetails_view->SkinColor->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_SkinColor">
<span<?php echo $ivf_donorsemendetails_view->SkinColor->viewAttributes() ?>><?php echo $ivf_donorsemendetails_view->SkinColor->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_donorsemendetails_view->EyeColor->Visible) { // EyeColor ?>
	<tr id="r_EyeColor">
		<td class="<?php echo $ivf_donorsemendetails_view->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_EyeColor"><?php echo $ivf_donorsemendetails_view->EyeColor->caption() ?></span></td>
		<td data-name="EyeColor" <?php echo $ivf_donorsemendetails_view->EyeColor->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_EyeColor">
<span<?php echo $ivf_donorsemendetails_view->EyeColor->viewAttributes() ?>><?php echo $ivf_donorsemendetails_view->EyeColor->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_donorsemendetails_view->HairColor->Visible) { // HairColor ?>
	<tr id="r_HairColor">
		<td class="<?php echo $ivf_donorsemendetails_view->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_HairColor"><?php echo $ivf_donorsemendetails_view->HairColor->caption() ?></span></td>
		<td data-name="HairColor" <?php echo $ivf_donorsemendetails_view->HairColor->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_HairColor">
<span<?php echo $ivf_donorsemendetails_view->HairColor->viewAttributes() ?>><?php echo $ivf_donorsemendetails_view->HairColor->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_donorsemendetails_view->NoOfVials->Visible) { // NoOfVials ?>
	<tr id="r_NoOfVials">
		<td class="<?php echo $ivf_donorsemendetails_view->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_NoOfVials"><?php echo $ivf_donorsemendetails_view->NoOfVials->caption() ?></span></td>
		<td data-name="NoOfVials" <?php echo $ivf_donorsemendetails_view->NoOfVials->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_NoOfVials">
<span<?php echo $ivf_donorsemendetails_view->NoOfVials->viewAttributes() ?>><?php echo $ivf_donorsemendetails_view->NoOfVials->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_donorsemendetails_view->Tank->Visible) { // Tank ?>
	<tr id="r_Tank">
		<td class="<?php echo $ivf_donorsemendetails_view->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_Tank"><?php echo $ivf_donorsemendetails_view->Tank->caption() ?></span></td>
		<td data-name="Tank" <?php echo $ivf_donorsemendetails_view->Tank->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_Tank">
<span<?php echo $ivf_donorsemendetails_view->Tank->viewAttributes() ?>><?php echo $ivf_donorsemendetails_view->Tank->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_donorsemendetails_view->Canister->Visible) { // Canister ?>
	<tr id="r_Canister">
		<td class="<?php echo $ivf_donorsemendetails_view->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_Canister"><?php echo $ivf_donorsemendetails_view->Canister->caption() ?></span></td>
		<td data-name="Canister" <?php echo $ivf_donorsemendetails_view->Canister->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_Canister">
<span<?php echo $ivf_donorsemendetails_view->Canister->viewAttributes() ?>><?php echo $ivf_donorsemendetails_view->Canister->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_donorsemendetails_view->Remarks->Visible) { // Remarks ?>
	<tr id="r_Remarks">
		<td class="<?php echo $ivf_donorsemendetails_view->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_Remarks"><?php echo $ivf_donorsemendetails_view->Remarks->caption() ?></span></td>
		<td data-name="Remarks" <?php echo $ivf_donorsemendetails_view->Remarks->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_Remarks">
<span<?php echo $ivf_donorsemendetails_view->Remarks->viewAttributes() ?>><?php echo $ivf_donorsemendetails_view->Remarks->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_donorsemendetails_view->patientid->Visible) { // patientid ?>
	<tr id="r_patientid">
		<td class="<?php echo $ivf_donorsemendetails_view->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_patientid"><?php echo $ivf_donorsemendetails_view->patientid->caption() ?></span></td>
		<td data-name="patientid" <?php echo $ivf_donorsemendetails_view->patientid->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_patientid">
<span<?php echo $ivf_donorsemendetails_view->patientid->viewAttributes() ?>><?php echo $ivf_donorsemendetails_view->patientid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_donorsemendetails_view->coupleid->Visible) { // coupleid ?>
	<tr id="r_coupleid">
		<td class="<?php echo $ivf_donorsemendetails_view->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_coupleid"><?php echo $ivf_donorsemendetails_view->coupleid->caption() ?></span></td>
		<td data-name="coupleid" <?php echo $ivf_donorsemendetails_view->coupleid->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_coupleid">
<span<?php echo $ivf_donorsemendetails_view->coupleid->viewAttributes() ?>><?php echo $ivf_donorsemendetails_view->coupleid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_donorsemendetails_view->Usedstatus->Visible) { // Usedstatus ?>
	<tr id="r_Usedstatus">
		<td class="<?php echo $ivf_donorsemendetails_view->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_Usedstatus"><?php echo $ivf_donorsemendetails_view->Usedstatus->caption() ?></span></td>
		<td data-name="Usedstatus" <?php echo $ivf_donorsemendetails_view->Usedstatus->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_Usedstatus">
<span<?php echo $ivf_donorsemendetails_view->Usedstatus->viewAttributes() ?>><?php echo $ivf_donorsemendetails_view->Usedstatus->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_donorsemendetails_view->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $ivf_donorsemendetails_view->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_status"><?php echo $ivf_donorsemendetails_view->status->caption() ?></span></td>
		<td data-name="status" <?php echo $ivf_donorsemendetails_view->status->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_status">
<span<?php echo $ivf_donorsemendetails_view->status->viewAttributes() ?>><?php echo $ivf_donorsemendetails_view->status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_donorsemendetails_view->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $ivf_donorsemendetails_view->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_createdby"><?php echo $ivf_donorsemendetails_view->createdby->caption() ?></span></td>
		<td data-name="createdby" <?php echo $ivf_donorsemendetails_view->createdby->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_createdby">
<span<?php echo $ivf_donorsemendetails_view->createdby->viewAttributes() ?>><?php echo $ivf_donorsemendetails_view->createdby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_donorsemendetails_view->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $ivf_donorsemendetails_view->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_createddatetime"><?php echo $ivf_donorsemendetails_view->createddatetime->caption() ?></span></td>
		<td data-name="createddatetime" <?php echo $ivf_donorsemendetails_view->createddatetime->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_createddatetime">
<span<?php echo $ivf_donorsemendetails_view->createddatetime->viewAttributes() ?>><?php echo $ivf_donorsemendetails_view->createddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_donorsemendetails_view->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $ivf_donorsemendetails_view->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_modifiedby"><?php echo $ivf_donorsemendetails_view->modifiedby->caption() ?></span></td>
		<td data-name="modifiedby" <?php echo $ivf_donorsemendetails_view->modifiedby->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_modifiedby">
<span<?php echo $ivf_donorsemendetails_view->modifiedby->viewAttributes() ?>><?php echo $ivf_donorsemendetails_view->modifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_donorsemendetails_view->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $ivf_donorsemendetails_view->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_modifieddatetime"><?php echo $ivf_donorsemendetails_view->modifieddatetime->caption() ?></span></td>
		<td data-name="modifieddatetime" <?php echo $ivf_donorsemendetails_view->modifieddatetime->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_modifieddatetime">
<span<?php echo $ivf_donorsemendetails_view->modifieddatetime->viewAttributes() ?>><?php echo $ivf_donorsemendetails_view->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_donorsemendetails_view->Lagency->Visible) { // Lagency ?>
	<tr id="r_Lagency">
		<td class="<?php echo $ivf_donorsemendetails_view->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_Lagency"><?php echo $ivf_donorsemendetails_view->Lagency->caption() ?></span></td>
		<td data-name="Lagency" <?php echo $ivf_donorsemendetails_view->Lagency->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_Lagency">
<span<?php echo $ivf_donorsemendetails_view->Lagency->viewAttributes() ?>><?php echo $ivf_donorsemendetails_view->Lagency->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$ivf_donorsemendetails_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$ivf_donorsemendetails_view->isExport()) { ?>
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
$ivf_donorsemendetails_view->terminate();
?>