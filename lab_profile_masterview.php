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
<?php include_once "header.php" ?>
<?php if (!$lab_profile_master->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var flab_profile_masterview = currentForm = new ew.Form("flab_profile_masterview", "view");

// Form_CustomValidate event
flab_profile_masterview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
flab_profile_masterview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$lab_profile_master->isExport()) { ?>
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
<?php if ($lab_profile_master_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $lab_profile_master_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_profile_master">
<input type="hidden" name="modal" value="<?php echo (int)$lab_profile_master_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($lab_profile_master->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $lab_profile_master_view->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_id"><?php echo $lab_profile_master->id->caption() ?></span></td>
		<td data-name="id"<?php echo $lab_profile_master->id->cellAttributes() ?>>
<span id="el_lab_profile_master_id">
<span<?php echo $lab_profile_master->id->viewAttributes() ?>>
<?php echo $lab_profile_master->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_profile_master->ProfileCode->Visible) { // ProfileCode ?>
	<tr id="r_ProfileCode">
		<td class="<?php echo $lab_profile_master_view->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_ProfileCode"><?php echo $lab_profile_master->ProfileCode->caption() ?></span></td>
		<td data-name="ProfileCode"<?php echo $lab_profile_master->ProfileCode->cellAttributes() ?>>
<span id="el_lab_profile_master_ProfileCode">
<span<?php echo $lab_profile_master->ProfileCode->viewAttributes() ?>>
<?php echo $lab_profile_master->ProfileCode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_profile_master->ProfileName->Visible) { // ProfileName ?>
	<tr id="r_ProfileName">
		<td class="<?php echo $lab_profile_master_view->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_ProfileName"><?php echo $lab_profile_master->ProfileName->caption() ?></span></td>
		<td data-name="ProfileName"<?php echo $lab_profile_master->ProfileName->cellAttributes() ?>>
<span id="el_lab_profile_master_ProfileName">
<span<?php echo $lab_profile_master->ProfileName->viewAttributes() ?>>
<?php echo $lab_profile_master->ProfileName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_profile_master->ProfileAmount->Visible) { // ProfileAmount ?>
	<tr id="r_ProfileAmount">
		<td class="<?php echo $lab_profile_master_view->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_ProfileAmount"><?php echo $lab_profile_master->ProfileAmount->caption() ?></span></td>
		<td data-name="ProfileAmount"<?php echo $lab_profile_master->ProfileAmount->cellAttributes() ?>>
<span id="el_lab_profile_master_ProfileAmount">
<span<?php echo $lab_profile_master->ProfileAmount->viewAttributes() ?>>
<?php echo $lab_profile_master->ProfileAmount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_profile_master->ProfileSpecialAmount->Visible) { // ProfileSpecialAmount ?>
	<tr id="r_ProfileSpecialAmount">
		<td class="<?php echo $lab_profile_master_view->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_ProfileSpecialAmount"><?php echo $lab_profile_master->ProfileSpecialAmount->caption() ?></span></td>
		<td data-name="ProfileSpecialAmount"<?php echo $lab_profile_master->ProfileSpecialAmount->cellAttributes() ?>>
<span id="el_lab_profile_master_ProfileSpecialAmount">
<span<?php echo $lab_profile_master->ProfileSpecialAmount->viewAttributes() ?>>
<?php echo $lab_profile_master->ProfileSpecialAmount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_profile_master->ProfileMasterInactive->Visible) { // ProfileMasterInactive ?>
	<tr id="r_ProfileMasterInactive">
		<td class="<?php echo $lab_profile_master_view->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_ProfileMasterInactive"><?php echo $lab_profile_master->ProfileMasterInactive->caption() ?></span></td>
		<td data-name="ProfileMasterInactive"<?php echo $lab_profile_master->ProfileMasterInactive->cellAttributes() ?>>
<span id="el_lab_profile_master_ProfileMasterInactive">
<span<?php echo $lab_profile_master->ProfileMasterInactive->viewAttributes() ?>>
<?php echo $lab_profile_master->ProfileMasterInactive->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_profile_master->ReagentAmt->Visible) { // ReagentAmt ?>
	<tr id="r_ReagentAmt">
		<td class="<?php echo $lab_profile_master_view->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_ReagentAmt"><?php echo $lab_profile_master->ReagentAmt->caption() ?></span></td>
		<td data-name="ReagentAmt"<?php echo $lab_profile_master->ReagentAmt->cellAttributes() ?>>
<span id="el_lab_profile_master_ReagentAmt">
<span<?php echo $lab_profile_master->ReagentAmt->viewAttributes() ?>>
<?php echo $lab_profile_master->ReagentAmt->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_profile_master->LabAmt->Visible) { // LabAmt ?>
	<tr id="r_LabAmt">
		<td class="<?php echo $lab_profile_master_view->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_LabAmt"><?php echo $lab_profile_master->LabAmt->caption() ?></span></td>
		<td data-name="LabAmt"<?php echo $lab_profile_master->LabAmt->cellAttributes() ?>>
<span id="el_lab_profile_master_LabAmt">
<span<?php echo $lab_profile_master->LabAmt->viewAttributes() ?>>
<?php echo $lab_profile_master->LabAmt->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_profile_master->RefAmt->Visible) { // RefAmt ?>
	<tr id="r_RefAmt">
		<td class="<?php echo $lab_profile_master_view->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_RefAmt"><?php echo $lab_profile_master->RefAmt->caption() ?></span></td>
		<td data-name="RefAmt"<?php echo $lab_profile_master->RefAmt->cellAttributes() ?>>
<span id="el_lab_profile_master_RefAmt">
<span<?php echo $lab_profile_master->RefAmt->viewAttributes() ?>>
<?php echo $lab_profile_master->RefAmt->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_profile_master->MainDeptCD->Visible) { // MainDeptCD ?>
	<tr id="r_MainDeptCD">
		<td class="<?php echo $lab_profile_master_view->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_MainDeptCD"><?php echo $lab_profile_master->MainDeptCD->caption() ?></span></td>
		<td data-name="MainDeptCD"<?php echo $lab_profile_master->MainDeptCD->cellAttributes() ?>>
<span id="el_lab_profile_master_MainDeptCD">
<span<?php echo $lab_profile_master->MainDeptCD->viewAttributes() ?>>
<?php echo $lab_profile_master->MainDeptCD->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_profile_master->Individual->Visible) { // Individual ?>
	<tr id="r_Individual">
		<td class="<?php echo $lab_profile_master_view->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_Individual"><?php echo $lab_profile_master->Individual->caption() ?></span></td>
		<td data-name="Individual"<?php echo $lab_profile_master->Individual->cellAttributes() ?>>
<span id="el_lab_profile_master_Individual">
<span<?php echo $lab_profile_master->Individual->viewAttributes() ?>>
<?php echo $lab_profile_master->Individual->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_profile_master->ShortName->Visible) { // ShortName ?>
	<tr id="r_ShortName">
		<td class="<?php echo $lab_profile_master_view->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_ShortName"><?php echo $lab_profile_master->ShortName->caption() ?></span></td>
		<td data-name="ShortName"<?php echo $lab_profile_master->ShortName->cellAttributes() ?>>
<span id="el_lab_profile_master_ShortName">
<span<?php echo $lab_profile_master->ShortName->viewAttributes() ?>>
<?php echo $lab_profile_master->ShortName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_profile_master->Note->Visible) { // Note ?>
	<tr id="r_Note">
		<td class="<?php echo $lab_profile_master_view->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_Note"><?php echo $lab_profile_master->Note->caption() ?></span></td>
		<td data-name="Note"<?php echo $lab_profile_master->Note->cellAttributes() ?>>
<span id="el_lab_profile_master_Note">
<span<?php echo $lab_profile_master->Note->viewAttributes() ?>>
<?php echo $lab_profile_master->Note->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_profile_master->PrevAmt->Visible) { // PrevAmt ?>
	<tr id="r_PrevAmt">
		<td class="<?php echo $lab_profile_master_view->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_PrevAmt"><?php echo $lab_profile_master->PrevAmt->caption() ?></span></td>
		<td data-name="PrevAmt"<?php echo $lab_profile_master->PrevAmt->cellAttributes() ?>>
<span id="el_lab_profile_master_PrevAmt">
<span<?php echo $lab_profile_master->PrevAmt->viewAttributes() ?>>
<?php echo $lab_profile_master->PrevAmt->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_profile_master->BillName->Visible) { // BillName ?>
	<tr id="r_BillName">
		<td class="<?php echo $lab_profile_master_view->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_BillName"><?php echo $lab_profile_master->BillName->caption() ?></span></td>
		<td data-name="BillName"<?php echo $lab_profile_master->BillName->cellAttributes() ?>>
<span id="el_lab_profile_master_BillName">
<span<?php echo $lab_profile_master->BillName->viewAttributes() ?>>
<?php echo $lab_profile_master->BillName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_profile_master->ActualAmt->Visible) { // ActualAmt ?>
	<tr id="r_ActualAmt">
		<td class="<?php echo $lab_profile_master_view->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_ActualAmt"><?php echo $lab_profile_master->ActualAmt->caption() ?></span></td>
		<td data-name="ActualAmt"<?php echo $lab_profile_master->ActualAmt->cellAttributes() ?>>
<span id="el_lab_profile_master_ActualAmt">
<span<?php echo $lab_profile_master->ActualAmt->viewAttributes() ?>>
<?php echo $lab_profile_master->ActualAmt->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_profile_master->NoHeading->Visible) { // NoHeading ?>
	<tr id="r_NoHeading">
		<td class="<?php echo $lab_profile_master_view->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_NoHeading"><?php echo $lab_profile_master->NoHeading->caption() ?></span></td>
		<td data-name="NoHeading"<?php echo $lab_profile_master->NoHeading->cellAttributes() ?>>
<span id="el_lab_profile_master_NoHeading">
<span<?php echo $lab_profile_master->NoHeading->viewAttributes() ?>>
<?php echo $lab_profile_master->NoHeading->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_profile_master->EditDate->Visible) { // EditDate ?>
	<tr id="r_EditDate">
		<td class="<?php echo $lab_profile_master_view->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_EditDate"><?php echo $lab_profile_master->EditDate->caption() ?></span></td>
		<td data-name="EditDate"<?php echo $lab_profile_master->EditDate->cellAttributes() ?>>
<span id="el_lab_profile_master_EditDate">
<span<?php echo $lab_profile_master->EditDate->viewAttributes() ?>>
<?php echo $lab_profile_master->EditDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_profile_master->EditUser->Visible) { // EditUser ?>
	<tr id="r_EditUser">
		<td class="<?php echo $lab_profile_master_view->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_EditUser"><?php echo $lab_profile_master->EditUser->caption() ?></span></td>
		<td data-name="EditUser"<?php echo $lab_profile_master->EditUser->cellAttributes() ?>>
<span id="el_lab_profile_master_EditUser">
<span<?php echo $lab_profile_master->EditUser->viewAttributes() ?>>
<?php echo $lab_profile_master->EditUser->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_profile_master->HISCD->Visible) { // HISCD ?>
	<tr id="r_HISCD">
		<td class="<?php echo $lab_profile_master_view->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_HISCD"><?php echo $lab_profile_master->HISCD->caption() ?></span></td>
		<td data-name="HISCD"<?php echo $lab_profile_master->HISCD->cellAttributes() ?>>
<span id="el_lab_profile_master_HISCD">
<span<?php echo $lab_profile_master->HISCD->viewAttributes() ?>>
<?php echo $lab_profile_master->HISCD->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_profile_master->PriceList->Visible) { // PriceList ?>
	<tr id="r_PriceList">
		<td class="<?php echo $lab_profile_master_view->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_PriceList"><?php echo $lab_profile_master->PriceList->caption() ?></span></td>
		<td data-name="PriceList"<?php echo $lab_profile_master->PriceList->cellAttributes() ?>>
<span id="el_lab_profile_master_PriceList">
<span<?php echo $lab_profile_master->PriceList->viewAttributes() ?>>
<?php echo $lab_profile_master->PriceList->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_profile_master->IPAmt->Visible) { // IPAmt ?>
	<tr id="r_IPAmt">
		<td class="<?php echo $lab_profile_master_view->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_IPAmt"><?php echo $lab_profile_master->IPAmt->caption() ?></span></td>
		<td data-name="IPAmt"<?php echo $lab_profile_master->IPAmt->cellAttributes() ?>>
<span id="el_lab_profile_master_IPAmt">
<span<?php echo $lab_profile_master->IPAmt->viewAttributes() ?>>
<?php echo $lab_profile_master->IPAmt->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_profile_master->IInsAmt->Visible) { // IInsAmt ?>
	<tr id="r_IInsAmt">
		<td class="<?php echo $lab_profile_master_view->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_IInsAmt"><?php echo $lab_profile_master->IInsAmt->caption() ?></span></td>
		<td data-name="IInsAmt"<?php echo $lab_profile_master->IInsAmt->cellAttributes() ?>>
<span id="el_lab_profile_master_IInsAmt">
<span<?php echo $lab_profile_master->IInsAmt->viewAttributes() ?>>
<?php echo $lab_profile_master->IInsAmt->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_profile_master->ManualCD->Visible) { // ManualCD ?>
	<tr id="r_ManualCD">
		<td class="<?php echo $lab_profile_master_view->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_ManualCD"><?php echo $lab_profile_master->ManualCD->caption() ?></span></td>
		<td data-name="ManualCD"<?php echo $lab_profile_master->ManualCD->cellAttributes() ?>>
<span id="el_lab_profile_master_ManualCD">
<span<?php echo $lab_profile_master->ManualCD->viewAttributes() ?>>
<?php echo $lab_profile_master->ManualCD->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_profile_master->Free->Visible) { // Free ?>
	<tr id="r_Free">
		<td class="<?php echo $lab_profile_master_view->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_Free"><?php echo $lab_profile_master->Free->caption() ?></span></td>
		<td data-name="Free"<?php echo $lab_profile_master->Free->cellAttributes() ?>>
<span id="el_lab_profile_master_Free">
<span<?php echo $lab_profile_master->Free->viewAttributes() ?>>
<?php echo $lab_profile_master->Free->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_profile_master->IIpAmt->Visible) { // IIpAmt ?>
	<tr id="r_IIpAmt">
		<td class="<?php echo $lab_profile_master_view->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_IIpAmt"><?php echo $lab_profile_master->IIpAmt->caption() ?></span></td>
		<td data-name="IIpAmt"<?php echo $lab_profile_master->IIpAmt->cellAttributes() ?>>
<span id="el_lab_profile_master_IIpAmt">
<span<?php echo $lab_profile_master->IIpAmt->viewAttributes() ?>>
<?php echo $lab_profile_master->IIpAmt->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_profile_master->InsAmt->Visible) { // InsAmt ?>
	<tr id="r_InsAmt">
		<td class="<?php echo $lab_profile_master_view->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_InsAmt"><?php echo $lab_profile_master->InsAmt->caption() ?></span></td>
		<td data-name="InsAmt"<?php echo $lab_profile_master->InsAmt->cellAttributes() ?>>
<span id="el_lab_profile_master_InsAmt">
<span<?php echo $lab_profile_master->InsAmt->viewAttributes() ?>>
<?php echo $lab_profile_master->InsAmt->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($lab_profile_master->OutSource->Visible) { // OutSource ?>
	<tr id="r_OutSource">
		<td class="<?php echo $lab_profile_master_view->TableLeftColumnClass ?>"><span id="elh_lab_profile_master_OutSource"><?php echo $lab_profile_master->OutSource->caption() ?></span></td>
		<td data-name="OutSource"<?php echo $lab_profile_master->OutSource->cellAttributes() ?>>
<span id="el_lab_profile_master_OutSource">
<span<?php echo $lab_profile_master->OutSource->viewAttributes() ?>>
<?php echo $lab_profile_master->OutSource->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$lab_profile_master_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$lab_profile_master->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$lab_profile_master_view->terminate();
?>