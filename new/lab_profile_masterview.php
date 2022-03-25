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
$lab_profile_master_view = new lab_profile_master_view();

// Run the page
$lab_profile_master_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_profile_master_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$lab_profile_master_view->isExport()) { ?>
<script>
var flab_profile_masterview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	flab_profile_masterview = currentForm = new ew.Form("flab_profile_masterview", "view");
	loadjs.done("flab_profile_masterview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$lab_profile_master_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $lab_profile_master_view->ExportOptions->render("body") ?>
<?php $lab_profile_master_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $lab_profile_master_view->showPageHeader(); ?>
<?php
$lab_profile_master_view->showMessage();
?>
<form name="flab_profile_masterview" id="flab_profile_masterview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_profile_master">
<input type="hidden" name="modal" value="<?php echo (int)$lab_profile_master_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($lab_profile_master_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $lab_profile_master_view->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_id"><?php echo $lab_profile_master_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $lab_profile_master_view->id->cellAttributes() ?>>
<span id="el_lab_profile_master_id">
<span<?php echo $lab_profile_master_view->id->viewAttributes() ?>><?php echo $lab_profile_master_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_profile_master_view->ProfileCode->Visible) { // ProfileCode ?>
	<tr id="r_ProfileCode">
		<td class="<?php echo $lab_profile_master_view->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_ProfileCode"><?php echo $lab_profile_master_view->ProfileCode->caption() ?></span></td>
		<td data-name="ProfileCode" <?php echo $lab_profile_master_view->ProfileCode->cellAttributes() ?>>
<span id="el_lab_profile_master_ProfileCode">
<span<?php echo $lab_profile_master_view->ProfileCode->viewAttributes() ?>><?php echo $lab_profile_master_view->ProfileCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_profile_master_view->ProfileName->Visible) { // ProfileName ?>
	<tr id="r_ProfileName">
		<td class="<?php echo $lab_profile_master_view->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_ProfileName"><?php echo $lab_profile_master_view->ProfileName->caption() ?></span></td>
		<td data-name="ProfileName" <?php echo $lab_profile_master_view->ProfileName->cellAttributes() ?>>
<span id="el_lab_profile_master_ProfileName">
<span<?php echo $lab_profile_master_view->ProfileName->viewAttributes() ?>><?php echo $lab_profile_master_view->ProfileName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_profile_master_view->ProfileAmount->Visible) { // ProfileAmount ?>
	<tr id="r_ProfileAmount">
		<td class="<?php echo $lab_profile_master_view->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_ProfileAmount"><?php echo $lab_profile_master_view->ProfileAmount->caption() ?></span></td>
		<td data-name="ProfileAmount" <?php echo $lab_profile_master_view->ProfileAmount->cellAttributes() ?>>
<span id="el_lab_profile_master_ProfileAmount">
<span<?php echo $lab_profile_master_view->ProfileAmount->viewAttributes() ?>><?php echo $lab_profile_master_view->ProfileAmount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_profile_master_view->ProfileSpecialAmount->Visible) { // ProfileSpecialAmount ?>
	<tr id="r_ProfileSpecialAmount">
		<td class="<?php echo $lab_profile_master_view->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_ProfileSpecialAmount"><?php echo $lab_profile_master_view->ProfileSpecialAmount->caption() ?></span></td>
		<td data-name="ProfileSpecialAmount" <?php echo $lab_profile_master_view->ProfileSpecialAmount->cellAttributes() ?>>
<span id="el_lab_profile_master_ProfileSpecialAmount">
<span<?php echo $lab_profile_master_view->ProfileSpecialAmount->viewAttributes() ?>><?php echo $lab_profile_master_view->ProfileSpecialAmount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_profile_master_view->ProfileMasterInactive->Visible) { // ProfileMasterInactive ?>
	<tr id="r_ProfileMasterInactive">
		<td class="<?php echo $lab_profile_master_view->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_ProfileMasterInactive"><?php echo $lab_profile_master_view->ProfileMasterInactive->caption() ?></span></td>
		<td data-name="ProfileMasterInactive" <?php echo $lab_profile_master_view->ProfileMasterInactive->cellAttributes() ?>>
<span id="el_lab_profile_master_ProfileMasterInactive">
<span<?php echo $lab_profile_master_view->ProfileMasterInactive->viewAttributes() ?>><?php echo $lab_profile_master_view->ProfileMasterInactive->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_profile_master_view->ReagentAmt->Visible) { // ReagentAmt ?>
	<tr id="r_ReagentAmt">
		<td class="<?php echo $lab_profile_master_view->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_ReagentAmt"><?php echo $lab_profile_master_view->ReagentAmt->caption() ?></span></td>
		<td data-name="ReagentAmt" <?php echo $lab_profile_master_view->ReagentAmt->cellAttributes() ?>>
<span id="el_lab_profile_master_ReagentAmt">
<span<?php echo $lab_profile_master_view->ReagentAmt->viewAttributes() ?>><?php echo $lab_profile_master_view->ReagentAmt->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_profile_master_view->LabAmt->Visible) { // LabAmt ?>
	<tr id="r_LabAmt">
		<td class="<?php echo $lab_profile_master_view->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_LabAmt"><?php echo $lab_profile_master_view->LabAmt->caption() ?></span></td>
		<td data-name="LabAmt" <?php echo $lab_profile_master_view->LabAmt->cellAttributes() ?>>
<span id="el_lab_profile_master_LabAmt">
<span<?php echo $lab_profile_master_view->LabAmt->viewAttributes() ?>><?php echo $lab_profile_master_view->LabAmt->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_profile_master_view->RefAmt->Visible) { // RefAmt ?>
	<tr id="r_RefAmt">
		<td class="<?php echo $lab_profile_master_view->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_RefAmt"><?php echo $lab_profile_master_view->RefAmt->caption() ?></span></td>
		<td data-name="RefAmt" <?php echo $lab_profile_master_view->RefAmt->cellAttributes() ?>>
<span id="el_lab_profile_master_RefAmt">
<span<?php echo $lab_profile_master_view->RefAmt->viewAttributes() ?>><?php echo $lab_profile_master_view->RefAmt->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_profile_master_view->MainDeptCD->Visible) { // MainDeptCD ?>
	<tr id="r_MainDeptCD">
		<td class="<?php echo $lab_profile_master_view->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_MainDeptCD"><?php echo $lab_profile_master_view->MainDeptCD->caption() ?></span></td>
		<td data-name="MainDeptCD" <?php echo $lab_profile_master_view->MainDeptCD->cellAttributes() ?>>
<span id="el_lab_profile_master_MainDeptCD">
<span<?php echo $lab_profile_master_view->MainDeptCD->viewAttributes() ?>><?php echo $lab_profile_master_view->MainDeptCD->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_profile_master_view->Individual->Visible) { // Individual ?>
	<tr id="r_Individual">
		<td class="<?php echo $lab_profile_master_view->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_Individual"><?php echo $lab_profile_master_view->Individual->caption() ?></span></td>
		<td data-name="Individual" <?php echo $lab_profile_master_view->Individual->cellAttributes() ?>>
<span id="el_lab_profile_master_Individual">
<span<?php echo $lab_profile_master_view->Individual->viewAttributes() ?>><?php echo $lab_profile_master_view->Individual->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_profile_master_view->ShortName->Visible) { // ShortName ?>
	<tr id="r_ShortName">
		<td class="<?php echo $lab_profile_master_view->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_ShortName"><?php echo $lab_profile_master_view->ShortName->caption() ?></span></td>
		<td data-name="ShortName" <?php echo $lab_profile_master_view->ShortName->cellAttributes() ?>>
<span id="el_lab_profile_master_ShortName">
<span<?php echo $lab_profile_master_view->ShortName->viewAttributes() ?>><?php echo $lab_profile_master_view->ShortName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_profile_master_view->Note->Visible) { // Note ?>
	<tr id="r_Note">
		<td class="<?php echo $lab_profile_master_view->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_Note"><?php echo $lab_profile_master_view->Note->caption() ?></span></td>
		<td data-name="Note" <?php echo $lab_profile_master_view->Note->cellAttributes() ?>>
<span id="el_lab_profile_master_Note">
<span<?php echo $lab_profile_master_view->Note->viewAttributes() ?>><?php echo $lab_profile_master_view->Note->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_profile_master_view->PrevAmt->Visible) { // PrevAmt ?>
	<tr id="r_PrevAmt">
		<td class="<?php echo $lab_profile_master_view->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_PrevAmt"><?php echo $lab_profile_master_view->PrevAmt->caption() ?></span></td>
		<td data-name="PrevAmt" <?php echo $lab_profile_master_view->PrevAmt->cellAttributes() ?>>
<span id="el_lab_profile_master_PrevAmt">
<span<?php echo $lab_profile_master_view->PrevAmt->viewAttributes() ?>><?php echo $lab_profile_master_view->PrevAmt->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_profile_master_view->BillName->Visible) { // BillName ?>
	<tr id="r_BillName">
		<td class="<?php echo $lab_profile_master_view->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_BillName"><?php echo $lab_profile_master_view->BillName->caption() ?></span></td>
		<td data-name="BillName" <?php echo $lab_profile_master_view->BillName->cellAttributes() ?>>
<span id="el_lab_profile_master_BillName">
<span<?php echo $lab_profile_master_view->BillName->viewAttributes() ?>><?php echo $lab_profile_master_view->BillName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_profile_master_view->ActualAmt->Visible) { // ActualAmt ?>
	<tr id="r_ActualAmt">
		<td class="<?php echo $lab_profile_master_view->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_ActualAmt"><?php echo $lab_profile_master_view->ActualAmt->caption() ?></span></td>
		<td data-name="ActualAmt" <?php echo $lab_profile_master_view->ActualAmt->cellAttributes() ?>>
<span id="el_lab_profile_master_ActualAmt">
<span<?php echo $lab_profile_master_view->ActualAmt->viewAttributes() ?>><?php echo $lab_profile_master_view->ActualAmt->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_profile_master_view->NoHeading->Visible) { // NoHeading ?>
	<tr id="r_NoHeading">
		<td class="<?php echo $lab_profile_master_view->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_NoHeading"><?php echo $lab_profile_master_view->NoHeading->caption() ?></span></td>
		<td data-name="NoHeading" <?php echo $lab_profile_master_view->NoHeading->cellAttributes() ?>>
<span id="el_lab_profile_master_NoHeading">
<span<?php echo $lab_profile_master_view->NoHeading->viewAttributes() ?>><?php echo $lab_profile_master_view->NoHeading->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_profile_master_view->EditDate->Visible) { // EditDate ?>
	<tr id="r_EditDate">
		<td class="<?php echo $lab_profile_master_view->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_EditDate"><?php echo $lab_profile_master_view->EditDate->caption() ?></span></td>
		<td data-name="EditDate" <?php echo $lab_profile_master_view->EditDate->cellAttributes() ?>>
<span id="el_lab_profile_master_EditDate">
<span<?php echo $lab_profile_master_view->EditDate->viewAttributes() ?>><?php echo $lab_profile_master_view->EditDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_profile_master_view->EditUser->Visible) { // EditUser ?>
	<tr id="r_EditUser">
		<td class="<?php echo $lab_profile_master_view->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_EditUser"><?php echo $lab_profile_master_view->EditUser->caption() ?></span></td>
		<td data-name="EditUser" <?php echo $lab_profile_master_view->EditUser->cellAttributes() ?>>
<span id="el_lab_profile_master_EditUser">
<span<?php echo $lab_profile_master_view->EditUser->viewAttributes() ?>><?php echo $lab_profile_master_view->EditUser->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_profile_master_view->HISCD->Visible) { // HISCD ?>
	<tr id="r_HISCD">
		<td class="<?php echo $lab_profile_master_view->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_HISCD"><?php echo $lab_profile_master_view->HISCD->caption() ?></span></td>
		<td data-name="HISCD" <?php echo $lab_profile_master_view->HISCD->cellAttributes() ?>>
<span id="el_lab_profile_master_HISCD">
<span<?php echo $lab_profile_master_view->HISCD->viewAttributes() ?>><?php echo $lab_profile_master_view->HISCD->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_profile_master_view->PriceList->Visible) { // PriceList ?>
	<tr id="r_PriceList">
		<td class="<?php echo $lab_profile_master_view->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_PriceList"><?php echo $lab_profile_master_view->PriceList->caption() ?></span></td>
		<td data-name="PriceList" <?php echo $lab_profile_master_view->PriceList->cellAttributes() ?>>
<span id="el_lab_profile_master_PriceList">
<span<?php echo $lab_profile_master_view->PriceList->viewAttributes() ?>><?php echo $lab_profile_master_view->PriceList->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_profile_master_view->IPAmt->Visible) { // IPAmt ?>
	<tr id="r_IPAmt">
		<td class="<?php echo $lab_profile_master_view->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_IPAmt"><?php echo $lab_profile_master_view->IPAmt->caption() ?></span></td>
		<td data-name="IPAmt" <?php echo $lab_profile_master_view->IPAmt->cellAttributes() ?>>
<span id="el_lab_profile_master_IPAmt">
<span<?php echo $lab_profile_master_view->IPAmt->viewAttributes() ?>><?php echo $lab_profile_master_view->IPAmt->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_profile_master_view->IInsAmt->Visible) { // IInsAmt ?>
	<tr id="r_IInsAmt">
		<td class="<?php echo $lab_profile_master_view->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_IInsAmt"><?php echo $lab_profile_master_view->IInsAmt->caption() ?></span></td>
		<td data-name="IInsAmt" <?php echo $lab_profile_master_view->IInsAmt->cellAttributes() ?>>
<span id="el_lab_profile_master_IInsAmt">
<span<?php echo $lab_profile_master_view->IInsAmt->viewAttributes() ?>><?php echo $lab_profile_master_view->IInsAmt->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_profile_master_view->ManualCD->Visible) { // ManualCD ?>
	<tr id="r_ManualCD">
		<td class="<?php echo $lab_profile_master_view->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_ManualCD"><?php echo $lab_profile_master_view->ManualCD->caption() ?></span></td>
		<td data-name="ManualCD" <?php echo $lab_profile_master_view->ManualCD->cellAttributes() ?>>
<span id="el_lab_profile_master_ManualCD">
<span<?php echo $lab_profile_master_view->ManualCD->viewAttributes() ?>><?php echo $lab_profile_master_view->ManualCD->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_profile_master_view->Free->Visible) { // Free ?>
	<tr id="r_Free">
		<td class="<?php echo $lab_profile_master_view->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_Free"><?php echo $lab_profile_master_view->Free->caption() ?></span></td>
		<td data-name="Free" <?php echo $lab_profile_master_view->Free->cellAttributes() ?>>
<span id="el_lab_profile_master_Free">
<span<?php echo $lab_profile_master_view->Free->viewAttributes() ?>><?php echo $lab_profile_master_view->Free->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_profile_master_view->IIpAmt->Visible) { // IIpAmt ?>
	<tr id="r_IIpAmt">
		<td class="<?php echo $lab_profile_master_view->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_IIpAmt"><?php echo $lab_profile_master_view->IIpAmt->caption() ?></span></td>
		<td data-name="IIpAmt" <?php echo $lab_profile_master_view->IIpAmt->cellAttributes() ?>>
<span id="el_lab_profile_master_IIpAmt">
<span<?php echo $lab_profile_master_view->IIpAmt->viewAttributes() ?>><?php echo $lab_profile_master_view->IIpAmt->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_profile_master_view->InsAmt->Visible) { // InsAmt ?>
	<tr id="r_InsAmt">
		<td class="<?php echo $lab_profile_master_view->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_InsAmt"><?php echo $lab_profile_master_view->InsAmt->caption() ?></span></td>
		<td data-name="InsAmt" <?php echo $lab_profile_master_view->InsAmt->cellAttributes() ?>>
<span id="el_lab_profile_master_InsAmt">
<span<?php echo $lab_profile_master_view->InsAmt->viewAttributes() ?>><?php echo $lab_profile_master_view->InsAmt->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_profile_master_view->OutSource->Visible) { // OutSource ?>
	<tr id="r_OutSource">
		<td class="<?php echo $lab_profile_master_view->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_OutSource"><?php echo $lab_profile_master_view->OutSource->caption() ?></span></td>
		<td data-name="OutSource" <?php echo $lab_profile_master_view->OutSource->cellAttributes() ?>>
<span id="el_lab_profile_master_OutSource">
<span<?php echo $lab_profile_master_view->OutSource->viewAttributes() ?>><?php echo $lab_profile_master_view->OutSource->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$lab_profile_master_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$lab_profile_master_view->isExport()) { ?>
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
$lab_profile_master_view->terminate();
?>