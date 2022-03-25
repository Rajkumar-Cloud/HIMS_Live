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
<?php include_once "header.php" ?>
<?php if (!$ivf_donorsemendetails->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fivf_donorsemendetailsview = currentForm = new ew.Form("fivf_donorsemendetailsview", "view");

// Form_CustomValidate event
fivf_donorsemendetailsview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_donorsemendetailsview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fivf_donorsemendetailsview.lists["x_BloodGroup"] = <?php echo $ivf_donorsemendetails_view->BloodGroup->Lookup->toClientList() ?>;
fivf_donorsemendetailsview.lists["x_BloodGroup"].options = <?php echo JsonEncode($ivf_donorsemendetails_view->BloodGroup->lookupOptions()) ?>;
fivf_donorsemendetailsview.lists["x_SkinColor"] = <?php echo $ivf_donorsemendetails_view->SkinColor->Lookup->toClientList() ?>;
fivf_donorsemendetailsview.lists["x_SkinColor"].options = <?php echo JsonEncode($ivf_donorsemendetails_view->SkinColor->options(FALSE, TRUE)) ?>;
fivf_donorsemendetailsview.lists["x_EyeColor"] = <?php echo $ivf_donorsemendetails_view->EyeColor->Lookup->toClientList() ?>;
fivf_donorsemendetailsview.lists["x_EyeColor"].options = <?php echo JsonEncode($ivf_donorsemendetails_view->EyeColor->options(FALSE, TRUE)) ?>;
fivf_donorsemendetailsview.lists["x_HairColor"] = <?php echo $ivf_donorsemendetails_view->HairColor->Lookup->toClientList() ?>;
fivf_donorsemendetailsview.lists["x_HairColor"].options = <?php echo JsonEncode($ivf_donorsemendetails_view->HairColor->options(FALSE, TRUE)) ?>;
fivf_donorsemendetailsview.lists["x_Lagency"] = <?php echo $ivf_donorsemendetails_view->Lagency->Lookup->toClientList() ?>;
fivf_donorsemendetailsview.lists["x_Lagency"].options = <?php echo JsonEncode($ivf_donorsemendetails_view->Lagency->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$ivf_donorsemendetails->isExport()) { ?>
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
<?php if ($ivf_donorsemendetails_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_donorsemendetails_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_donorsemendetails">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_donorsemendetails_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($ivf_donorsemendetails->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $ivf_donorsemendetails_view->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_id"><?php echo $ivf_donorsemendetails->id->caption() ?></span></td>
		<td data-name="id"<?php echo $ivf_donorsemendetails->id->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_id">
<span<?php echo $ivf_donorsemendetails->id->viewAttributes() ?>>
<?php echo $ivf_donorsemendetails->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_donorsemendetails->RIDNo->Visible) { // RIDNo ?>
	<tr id="r_RIDNo">
		<td class="<?php echo $ivf_donorsemendetails_view->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_RIDNo"><?php echo $ivf_donorsemendetails->RIDNo->caption() ?></span></td>
		<td data-name="RIDNo"<?php echo $ivf_donorsemendetails->RIDNo->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_RIDNo">
<span<?php echo $ivf_donorsemendetails->RIDNo->viewAttributes() ?>>
<?php echo $ivf_donorsemendetails->RIDNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_donorsemendetails->TidNo->Visible) { // TidNo ?>
	<tr id="r_TidNo">
		<td class="<?php echo $ivf_donorsemendetails_view->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_TidNo"><?php echo $ivf_donorsemendetails->TidNo->caption() ?></span></td>
		<td data-name="TidNo"<?php echo $ivf_donorsemendetails->TidNo->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_TidNo">
<span<?php echo $ivf_donorsemendetails->TidNo->viewAttributes() ?>>
<?php echo $ivf_donorsemendetails->TidNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_donorsemendetails->Agency->Visible) { // Agency ?>
	<tr id="r_Agency">
		<td class="<?php echo $ivf_donorsemendetails_view->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_Agency"><?php echo $ivf_donorsemendetails->Agency->caption() ?></span></td>
		<td data-name="Agency"<?php echo $ivf_donorsemendetails->Agency->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_Agency">
<span<?php echo $ivf_donorsemendetails->Agency->viewAttributes() ?>>
<?php echo $ivf_donorsemendetails->Agency->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_donorsemendetails->ReceivedOn->Visible) { // ReceivedOn ?>
	<tr id="r_ReceivedOn">
		<td class="<?php echo $ivf_donorsemendetails_view->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_ReceivedOn"><?php echo $ivf_donorsemendetails->ReceivedOn->caption() ?></span></td>
		<td data-name="ReceivedOn"<?php echo $ivf_donorsemendetails->ReceivedOn->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_ReceivedOn">
<span<?php echo $ivf_donorsemendetails->ReceivedOn->viewAttributes() ?>>
<?php echo $ivf_donorsemendetails->ReceivedOn->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_donorsemendetails->ReceivedBy->Visible) { // ReceivedBy ?>
	<tr id="r_ReceivedBy">
		<td class="<?php echo $ivf_donorsemendetails_view->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_ReceivedBy"><?php echo $ivf_donorsemendetails->ReceivedBy->caption() ?></span></td>
		<td data-name="ReceivedBy"<?php echo $ivf_donorsemendetails->ReceivedBy->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_ReceivedBy">
<span<?php echo $ivf_donorsemendetails->ReceivedBy->viewAttributes() ?>>
<?php echo $ivf_donorsemendetails->ReceivedBy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_donorsemendetails->DonorNo->Visible) { // DonorNo ?>
	<tr id="r_DonorNo">
		<td class="<?php echo $ivf_donorsemendetails_view->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_DonorNo"><?php echo $ivf_donorsemendetails->DonorNo->caption() ?></span></td>
		<td data-name="DonorNo"<?php echo $ivf_donorsemendetails->DonorNo->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_DonorNo">
<span<?php echo $ivf_donorsemendetails->DonorNo->viewAttributes() ?>>
<?php echo $ivf_donorsemendetails->DonorNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_donorsemendetails->BatchNo->Visible) { // BatchNo ?>
	<tr id="r_BatchNo">
		<td class="<?php echo $ivf_donorsemendetails_view->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_BatchNo"><?php echo $ivf_donorsemendetails->BatchNo->caption() ?></span></td>
		<td data-name="BatchNo"<?php echo $ivf_donorsemendetails->BatchNo->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_BatchNo">
<span<?php echo $ivf_donorsemendetails->BatchNo->viewAttributes() ?>>
<?php echo $ivf_donorsemendetails->BatchNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_donorsemendetails->BloodGroup->Visible) { // BloodGroup ?>
	<tr id="r_BloodGroup">
		<td class="<?php echo $ivf_donorsemendetails_view->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_BloodGroup"><?php echo $ivf_donorsemendetails->BloodGroup->caption() ?></span></td>
		<td data-name="BloodGroup"<?php echo $ivf_donorsemendetails->BloodGroup->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_BloodGroup">
<span<?php echo $ivf_donorsemendetails->BloodGroup->viewAttributes() ?>>
<?php echo $ivf_donorsemendetails->BloodGroup->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_donorsemendetails->Height->Visible) { // Height ?>
	<tr id="r_Height">
		<td class="<?php echo $ivf_donorsemendetails_view->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_Height"><?php echo $ivf_donorsemendetails->Height->caption() ?></span></td>
		<td data-name="Height"<?php echo $ivf_donorsemendetails->Height->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_Height">
<span<?php echo $ivf_donorsemendetails->Height->viewAttributes() ?>>
<?php echo $ivf_donorsemendetails->Height->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_donorsemendetails->SkinColor->Visible) { // SkinColor ?>
	<tr id="r_SkinColor">
		<td class="<?php echo $ivf_donorsemendetails_view->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_SkinColor"><?php echo $ivf_donorsemendetails->SkinColor->caption() ?></span></td>
		<td data-name="SkinColor"<?php echo $ivf_donorsemendetails->SkinColor->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_SkinColor">
<span<?php echo $ivf_donorsemendetails->SkinColor->viewAttributes() ?>>
<?php echo $ivf_donorsemendetails->SkinColor->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_donorsemendetails->EyeColor->Visible) { // EyeColor ?>
	<tr id="r_EyeColor">
		<td class="<?php echo $ivf_donorsemendetails_view->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_EyeColor"><?php echo $ivf_donorsemendetails->EyeColor->caption() ?></span></td>
		<td data-name="EyeColor"<?php echo $ivf_donorsemendetails->EyeColor->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_EyeColor">
<span<?php echo $ivf_donorsemendetails->EyeColor->viewAttributes() ?>>
<?php echo $ivf_donorsemendetails->EyeColor->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_donorsemendetails->HairColor->Visible) { // HairColor ?>
	<tr id="r_HairColor">
		<td class="<?php echo $ivf_donorsemendetails_view->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_HairColor"><?php echo $ivf_donorsemendetails->HairColor->caption() ?></span></td>
		<td data-name="HairColor"<?php echo $ivf_donorsemendetails->HairColor->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_HairColor">
<span<?php echo $ivf_donorsemendetails->HairColor->viewAttributes() ?>>
<?php echo $ivf_donorsemendetails->HairColor->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_donorsemendetails->NoOfVials->Visible) { // NoOfVials ?>
	<tr id="r_NoOfVials">
		<td class="<?php echo $ivf_donorsemendetails_view->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_NoOfVials"><?php echo $ivf_donorsemendetails->NoOfVials->caption() ?></span></td>
		<td data-name="NoOfVials"<?php echo $ivf_donorsemendetails->NoOfVials->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_NoOfVials">
<span<?php echo $ivf_donorsemendetails->NoOfVials->viewAttributes() ?>>
<?php echo $ivf_donorsemendetails->NoOfVials->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_donorsemendetails->Tank->Visible) { // Tank ?>
	<tr id="r_Tank">
		<td class="<?php echo $ivf_donorsemendetails_view->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_Tank"><?php echo $ivf_donorsemendetails->Tank->caption() ?></span></td>
		<td data-name="Tank"<?php echo $ivf_donorsemendetails->Tank->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_Tank">
<span<?php echo $ivf_donorsemendetails->Tank->viewAttributes() ?>>
<?php echo $ivf_donorsemendetails->Tank->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_donorsemendetails->Canister->Visible) { // Canister ?>
	<tr id="r_Canister">
		<td class="<?php echo $ivf_donorsemendetails_view->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_Canister"><?php echo $ivf_donorsemendetails->Canister->caption() ?></span></td>
		<td data-name="Canister"<?php echo $ivf_donorsemendetails->Canister->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_Canister">
<span<?php echo $ivf_donorsemendetails->Canister->viewAttributes() ?>>
<?php echo $ivf_donorsemendetails->Canister->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_donorsemendetails->Remarks->Visible) { // Remarks ?>
	<tr id="r_Remarks">
		<td class="<?php echo $ivf_donorsemendetails_view->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_Remarks"><?php echo $ivf_donorsemendetails->Remarks->caption() ?></span></td>
		<td data-name="Remarks"<?php echo $ivf_donorsemendetails->Remarks->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_Remarks">
<span<?php echo $ivf_donorsemendetails->Remarks->viewAttributes() ?>>
<?php echo $ivf_donorsemendetails->Remarks->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_donorsemendetails->patientid->Visible) { // patientid ?>
	<tr id="r_patientid">
		<td class="<?php echo $ivf_donorsemendetails_view->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_patientid"><?php echo $ivf_donorsemendetails->patientid->caption() ?></span></td>
		<td data-name="patientid"<?php echo $ivf_donorsemendetails->patientid->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_patientid">
<span<?php echo $ivf_donorsemendetails->patientid->viewAttributes() ?>>
<?php echo $ivf_donorsemendetails->patientid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_donorsemendetails->coupleid->Visible) { // coupleid ?>
	<tr id="r_coupleid">
		<td class="<?php echo $ivf_donorsemendetails_view->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_coupleid"><?php echo $ivf_donorsemendetails->coupleid->caption() ?></span></td>
		<td data-name="coupleid"<?php echo $ivf_donorsemendetails->coupleid->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_coupleid">
<span<?php echo $ivf_donorsemendetails->coupleid->viewAttributes() ?>>
<?php echo $ivf_donorsemendetails->coupleid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_donorsemendetails->Usedstatus->Visible) { // Usedstatus ?>
	<tr id="r_Usedstatus">
		<td class="<?php echo $ivf_donorsemendetails_view->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_Usedstatus"><?php echo $ivf_donorsemendetails->Usedstatus->caption() ?></span></td>
		<td data-name="Usedstatus"<?php echo $ivf_donorsemendetails->Usedstatus->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_Usedstatus">
<span<?php echo $ivf_donorsemendetails->Usedstatus->viewAttributes() ?>>
<?php echo $ivf_donorsemendetails->Usedstatus->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_donorsemendetails->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $ivf_donorsemendetails_view->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_status"><?php echo $ivf_donorsemendetails->status->caption() ?></span></td>
		<td data-name="status"<?php echo $ivf_donorsemendetails->status->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_status">
<span<?php echo $ivf_donorsemendetails->status->viewAttributes() ?>>
<?php echo $ivf_donorsemendetails->status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_donorsemendetails->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $ivf_donorsemendetails_view->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_createdby"><?php echo $ivf_donorsemendetails->createdby->caption() ?></span></td>
		<td data-name="createdby"<?php echo $ivf_donorsemendetails->createdby->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_createdby">
<span<?php echo $ivf_donorsemendetails->createdby->viewAttributes() ?>>
<?php echo $ivf_donorsemendetails->createdby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_donorsemendetails->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $ivf_donorsemendetails_view->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_createddatetime"><?php echo $ivf_donorsemendetails->createddatetime->caption() ?></span></td>
		<td data-name="createddatetime"<?php echo $ivf_donorsemendetails->createddatetime->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_createddatetime">
<span<?php echo $ivf_donorsemendetails->createddatetime->viewAttributes() ?>>
<?php echo $ivf_donorsemendetails->createddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_donorsemendetails->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $ivf_donorsemendetails_view->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_modifiedby"><?php echo $ivf_donorsemendetails->modifiedby->caption() ?></span></td>
		<td data-name="modifiedby"<?php echo $ivf_donorsemendetails->modifiedby->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_modifiedby">
<span<?php echo $ivf_donorsemendetails->modifiedby->viewAttributes() ?>>
<?php echo $ivf_donorsemendetails->modifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_donorsemendetails->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $ivf_donorsemendetails_view->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_modifieddatetime"><?php echo $ivf_donorsemendetails->modifieddatetime->caption() ?></span></td>
		<td data-name="modifieddatetime"<?php echo $ivf_donorsemendetails->modifieddatetime->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_modifieddatetime">
<span<?php echo $ivf_donorsemendetails->modifieddatetime->viewAttributes() ?>>
<?php echo $ivf_donorsemendetails->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_donorsemendetails->Lagency->Visible) { // Lagency ?>
	<tr id="r_Lagency">
		<td class="<?php echo $ivf_donorsemendetails_view->TableLeftColumnClass ?>"><span id="elh_ivf_donorsemendetails_Lagency"><?php echo $ivf_donorsemendetails->Lagency->caption() ?></span></td>
		<td data-name="Lagency"<?php echo $ivf_donorsemendetails->Lagency->cellAttributes() ?>>
<span id="el_ivf_donorsemendetails_Lagency">
<span<?php echo $ivf_donorsemendetails->Lagency->viewAttributes() ?>>
<?php echo $ivf_donorsemendetails->Lagency->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$ivf_donorsemendetails_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$ivf_donorsemendetails->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$ivf_donorsemendetails_view->terminate();
?>