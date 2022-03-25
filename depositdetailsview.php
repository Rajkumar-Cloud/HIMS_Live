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
$depositdetails_view = new depositdetails_view();

// Run the page
$depositdetails_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$depositdetails_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$depositdetails->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fdepositdetailsview = currentForm = new ew.Form("fdepositdetailsview", "view");

// Form_CustomValidate event
fdepositdetailsview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fdepositdetailsview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fdepositdetailsview.lists["x_DepositToBankSelect"] = <?php echo $depositdetails_view->DepositToBankSelect->Lookup->toClientList() ?>;
fdepositdetailsview.lists["x_DepositToBankSelect"].options = <?php echo JsonEncode($depositdetails_view->DepositToBankSelect->options(FALSE, TRUE)) ?>;
fdepositdetailsview.lists["x_DepositToBank"] = <?php echo $depositdetails_view->DepositToBank->Lookup->toClientList() ?>;
fdepositdetailsview.lists["x_DepositToBank"].options = <?php echo JsonEncode($depositdetails_view->DepositToBank->lookupOptions()) ?>;
fdepositdetailsview.lists["x_TransferTo"] = <?php echo $depositdetails_view->TransferTo->Lookup->toClientList() ?>;
fdepositdetailsview.lists["x_TransferTo"].options = <?php echo JsonEncode($depositdetails_view->TransferTo->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$depositdetails->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $depositdetails_view->ExportOptions->render("body") ?>
<?php $depositdetails_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $depositdetails_view->showPageHeader(); ?>
<?php
$depositdetails_view->showMessage();
?>
<form name="fdepositdetailsview" id="fdepositdetailsview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($depositdetails_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $depositdetails_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="depositdetails">
<input type="hidden" name="modal" value="<?php echo (int)$depositdetails_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($depositdetails->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_id"><script id="tpc_depositdetails_id" class="depositdetailsview" type="text/html"><span><?php echo $depositdetails->id->caption() ?></span></script></span></td>
		<td data-name="id"<?php echo $depositdetails->id->cellAttributes() ?>>
<script id="tpx_depositdetails_id" class="depositdetailsview" type="text/html">
<span id="el_depositdetails_id">
<span<?php echo $depositdetails->id->viewAttributes() ?>>
<?php echo $depositdetails->id->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails->DepositDate->Visible) { // DepositDate ?>
	<tr id="r_DepositDate">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_DepositDate"><script id="tpc_depositdetails_DepositDate" class="depositdetailsview" type="text/html"><span><?php echo $depositdetails->DepositDate->caption() ?></span></script></span></td>
		<td data-name="DepositDate"<?php echo $depositdetails->DepositDate->cellAttributes() ?>>
<script id="tpx_depositdetails_DepositDate" class="depositdetailsview" type="text/html">
<span id="el_depositdetails_DepositDate">
<span<?php echo $depositdetails->DepositDate->viewAttributes() ?>>
<?php echo $depositdetails->DepositDate->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails->DepositToBankSelect->Visible) { // DepositToBankSelect ?>
	<tr id="r_DepositToBankSelect">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_DepositToBankSelect"><script id="tpc_depositdetails_DepositToBankSelect" class="depositdetailsview" type="text/html"><span><?php echo $depositdetails->DepositToBankSelect->caption() ?></span></script></span></td>
		<td data-name="DepositToBankSelect"<?php echo $depositdetails->DepositToBankSelect->cellAttributes() ?>>
<script id="tpx_depositdetails_DepositToBankSelect" class="depositdetailsview" type="text/html">
<span id="el_depositdetails_DepositToBankSelect">
<span<?php echo $depositdetails->DepositToBankSelect->viewAttributes() ?>>
<?php echo $depositdetails->DepositToBankSelect->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails->DepositToBank->Visible) { // DepositToBank ?>
	<tr id="r_DepositToBank">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_DepositToBank"><script id="tpc_depositdetails_DepositToBank" class="depositdetailsview" type="text/html"><span><?php echo $depositdetails->DepositToBank->caption() ?></span></script></span></td>
		<td data-name="DepositToBank"<?php echo $depositdetails->DepositToBank->cellAttributes() ?>>
<script id="tpx_depositdetails_DepositToBank" class="depositdetailsview" type="text/html">
<span id="el_depositdetails_DepositToBank">
<span<?php echo $depositdetails->DepositToBank->viewAttributes() ?>>
<?php echo $depositdetails->DepositToBank->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails->TransferToSelect->Visible) { // TransferToSelect ?>
	<tr id="r_TransferToSelect">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_TransferToSelect"><script id="tpc_depositdetails_TransferToSelect" class="depositdetailsview" type="text/html"><span><?php echo $depositdetails->TransferToSelect->caption() ?></span></script></span></td>
		<td data-name="TransferToSelect"<?php echo $depositdetails->TransferToSelect->cellAttributes() ?>>
<script id="tpx_depositdetails_TransferToSelect" class="depositdetailsview" type="text/html">
<span id="el_depositdetails_TransferToSelect">
<span<?php echo $depositdetails->TransferToSelect->viewAttributes() ?>>
<?php echo $depositdetails->TransferToSelect->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails->TransferTo->Visible) { // TransferTo ?>
	<tr id="r_TransferTo">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_TransferTo"><script id="tpc_depositdetails_TransferTo" class="depositdetailsview" type="text/html"><span><?php echo $depositdetails->TransferTo->caption() ?></span></script></span></td>
		<td data-name="TransferTo"<?php echo $depositdetails->TransferTo->cellAttributes() ?>>
<script id="tpx_depositdetails_TransferTo" class="depositdetailsview" type="text/html">
<span id="el_depositdetails_TransferTo">
<span<?php echo $depositdetails->TransferTo->viewAttributes() ?>>
<?php echo $depositdetails->TransferTo->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails->OpeningBalance->Visible) { // OpeningBalance ?>
	<tr id="r_OpeningBalance">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_OpeningBalance"><script id="tpc_depositdetails_OpeningBalance" class="depositdetailsview" type="text/html"><span><?php echo $depositdetails->OpeningBalance->caption() ?></span></script></span></td>
		<td data-name="OpeningBalance"<?php echo $depositdetails->OpeningBalance->cellAttributes() ?>>
<script id="tpx_depositdetails_OpeningBalance" class="depositdetailsview" type="text/html">
<span id="el_depositdetails_OpeningBalance">
<span<?php echo $depositdetails->OpeningBalance->viewAttributes() ?>>
<?php echo $depositdetails->OpeningBalance->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails->Other->Visible) { // Other ?>
	<tr id="r_Other">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_Other"><script id="tpc_depositdetails_Other" class="depositdetailsview" type="text/html"><span><?php echo $depositdetails->Other->caption() ?></span></script></span></td>
		<td data-name="Other"<?php echo $depositdetails->Other->cellAttributes() ?>>
<script id="tpx_depositdetails_Other" class="depositdetailsview" type="text/html">
<span id="el_depositdetails_Other">
<span<?php echo $depositdetails->Other->viewAttributes() ?>>
<?php echo $depositdetails->Other->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails->TotalCash->Visible) { // TotalCash ?>
	<tr id="r_TotalCash">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_TotalCash"><script id="tpc_depositdetails_TotalCash" class="depositdetailsview" type="text/html"><span><?php echo $depositdetails->TotalCash->caption() ?></span></script></span></td>
		<td data-name="TotalCash"<?php echo $depositdetails->TotalCash->cellAttributes() ?>>
<script id="tpx_depositdetails_TotalCash" class="depositdetailsview" type="text/html">
<span id="el_depositdetails_TotalCash">
<span<?php echo $depositdetails->TotalCash->viewAttributes() ?>>
<?php echo $depositdetails->TotalCash->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails->Cheque->Visible) { // Cheque ?>
	<tr id="r_Cheque">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_Cheque"><script id="tpc_depositdetails_Cheque" class="depositdetailsview" type="text/html"><span><?php echo $depositdetails->Cheque->caption() ?></span></script></span></td>
		<td data-name="Cheque"<?php echo $depositdetails->Cheque->cellAttributes() ?>>
<script id="tpx_depositdetails_Cheque" class="depositdetailsview" type="text/html">
<span id="el_depositdetails_Cheque">
<span<?php echo $depositdetails->Cheque->viewAttributes() ?>>
<?php echo $depositdetails->Cheque->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails->Card->Visible) { // Card ?>
	<tr id="r_Card">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_Card"><script id="tpc_depositdetails_Card" class="depositdetailsview" type="text/html"><span><?php echo $depositdetails->Card->caption() ?></span></script></span></td>
		<td data-name="Card"<?php echo $depositdetails->Card->cellAttributes() ?>>
<script id="tpx_depositdetails_Card" class="depositdetailsview" type="text/html">
<span id="el_depositdetails_Card">
<span<?php echo $depositdetails->Card->viewAttributes() ?>>
<?php echo $depositdetails->Card->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails->NEFTRTGS->Visible) { // NEFTRTGS ?>
	<tr id="r_NEFTRTGS">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_NEFTRTGS"><script id="tpc_depositdetails_NEFTRTGS" class="depositdetailsview" type="text/html"><span><?php echo $depositdetails->NEFTRTGS->caption() ?></span></script></span></td>
		<td data-name="NEFTRTGS"<?php echo $depositdetails->NEFTRTGS->cellAttributes() ?>>
<script id="tpx_depositdetails_NEFTRTGS" class="depositdetailsview" type="text/html">
<span id="el_depositdetails_NEFTRTGS">
<span<?php echo $depositdetails->NEFTRTGS->viewAttributes() ?>>
<?php echo $depositdetails->NEFTRTGS->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails->TotalTransferDepositAmount->Visible) { // TotalTransferDepositAmount ?>
	<tr id="r_TotalTransferDepositAmount">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_TotalTransferDepositAmount"><script id="tpc_depositdetails_TotalTransferDepositAmount" class="depositdetailsview" type="text/html"><span><?php echo $depositdetails->TotalTransferDepositAmount->caption() ?></span></script></span></td>
		<td data-name="TotalTransferDepositAmount"<?php echo $depositdetails->TotalTransferDepositAmount->cellAttributes() ?>>
<script id="tpx_depositdetails_TotalTransferDepositAmount" class="depositdetailsview" type="text/html">
<span id="el_depositdetails_TotalTransferDepositAmount">
<span<?php echo $depositdetails->TotalTransferDepositAmount->viewAttributes() ?>>
<?php echo $depositdetails->TotalTransferDepositAmount->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails->CreatedBy->Visible) { // CreatedBy ?>
	<tr id="r_CreatedBy">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_CreatedBy"><script id="tpc_depositdetails_CreatedBy" class="depositdetailsview" type="text/html"><span><?php echo $depositdetails->CreatedBy->caption() ?></span></script></span></td>
		<td data-name="CreatedBy"<?php echo $depositdetails->CreatedBy->cellAttributes() ?>>
<script id="tpx_depositdetails_CreatedBy" class="depositdetailsview" type="text/html">
<span id="el_depositdetails_CreatedBy">
<span<?php echo $depositdetails->CreatedBy->viewAttributes() ?>>
<?php echo $depositdetails->CreatedBy->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails->CreatedDateTime->Visible) { // CreatedDateTime ?>
	<tr id="r_CreatedDateTime">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_CreatedDateTime"><script id="tpc_depositdetails_CreatedDateTime" class="depositdetailsview" type="text/html"><span><?php echo $depositdetails->CreatedDateTime->caption() ?></span></script></span></td>
		<td data-name="CreatedDateTime"<?php echo $depositdetails->CreatedDateTime->cellAttributes() ?>>
<script id="tpx_depositdetails_CreatedDateTime" class="depositdetailsview" type="text/html">
<span id="el_depositdetails_CreatedDateTime">
<span<?php echo $depositdetails->CreatedDateTime->viewAttributes() ?>>
<?php echo $depositdetails->CreatedDateTime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails->ModifiedBy->Visible) { // ModifiedBy ?>
	<tr id="r_ModifiedBy">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_ModifiedBy"><script id="tpc_depositdetails_ModifiedBy" class="depositdetailsview" type="text/html"><span><?php echo $depositdetails->ModifiedBy->caption() ?></span></script></span></td>
		<td data-name="ModifiedBy"<?php echo $depositdetails->ModifiedBy->cellAttributes() ?>>
<script id="tpx_depositdetails_ModifiedBy" class="depositdetailsview" type="text/html">
<span id="el_depositdetails_ModifiedBy">
<span<?php echo $depositdetails->ModifiedBy->viewAttributes() ?>>
<?php echo $depositdetails->ModifiedBy->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
	<tr id="r_ModifiedDateTime">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_ModifiedDateTime"><script id="tpc_depositdetails_ModifiedDateTime" class="depositdetailsview" type="text/html"><span><?php echo $depositdetails->ModifiedDateTime->caption() ?></span></script></span></td>
		<td data-name="ModifiedDateTime"<?php echo $depositdetails->ModifiedDateTime->cellAttributes() ?>>
<script id="tpx_depositdetails_ModifiedDateTime" class="depositdetailsview" type="text/html">
<span id="el_depositdetails_ModifiedDateTime">
<span<?php echo $depositdetails->ModifiedDateTime->viewAttributes() ?>>
<?php echo $depositdetails->ModifiedDateTime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails->CreatedUserName->Visible) { // CreatedUserName ?>
	<tr id="r_CreatedUserName">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_CreatedUserName"><script id="tpc_depositdetails_CreatedUserName" class="depositdetailsview" type="text/html"><span><?php echo $depositdetails->CreatedUserName->caption() ?></span></script></span></td>
		<td data-name="CreatedUserName"<?php echo $depositdetails->CreatedUserName->cellAttributes() ?>>
<script id="tpx_depositdetails_CreatedUserName" class="depositdetailsview" type="text/html">
<span id="el_depositdetails_CreatedUserName">
<span<?php echo $depositdetails->CreatedUserName->viewAttributes() ?>>
<?php echo $depositdetails->CreatedUserName->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails->ModifiedUserName->Visible) { // ModifiedUserName ?>
	<tr id="r_ModifiedUserName">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_ModifiedUserName"><script id="tpc_depositdetails_ModifiedUserName" class="depositdetailsview" type="text/html"><span><?php echo $depositdetails->ModifiedUserName->caption() ?></span></script></span></td>
		<td data-name="ModifiedUserName"<?php echo $depositdetails->ModifiedUserName->cellAttributes() ?>>
<script id="tpx_depositdetails_ModifiedUserName" class="depositdetailsview" type="text/html">
<span id="el_depositdetails_ModifiedUserName">
<span<?php echo $depositdetails->ModifiedUserName->viewAttributes() ?>>
<?php echo $depositdetails->ModifiedUserName->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails->A2000Count->Visible) { // A2000Count ?>
	<tr id="r_A2000Count">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_A2000Count"><script id="tpc_depositdetails_A2000Count" class="depositdetailsview" type="text/html"><span><?php echo $depositdetails->A2000Count->caption() ?></span></script></span></td>
		<td data-name="A2000Count"<?php echo $depositdetails->A2000Count->cellAttributes() ?>>
<script id="tpx_depositdetails_A2000Count" class="depositdetailsview" type="text/html">
<span id="el_depositdetails_A2000Count">
<span<?php echo $depositdetails->A2000Count->viewAttributes() ?>>
<?php echo $depositdetails->A2000Count->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails->A2000Amount->Visible) { // A2000Amount ?>
	<tr id="r_A2000Amount">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_A2000Amount"><script id="tpc_depositdetails_A2000Amount" class="depositdetailsview" type="text/html"><span><?php echo $depositdetails->A2000Amount->caption() ?></span></script></span></td>
		<td data-name="A2000Amount"<?php echo $depositdetails->A2000Amount->cellAttributes() ?>>
<script id="tpx_depositdetails_A2000Amount" class="depositdetailsview" type="text/html">
<span id="el_depositdetails_A2000Amount">
<span<?php echo $depositdetails->A2000Amount->viewAttributes() ?>>
<?php echo $depositdetails->A2000Amount->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails->A1000Count->Visible) { // A1000Count ?>
	<tr id="r_A1000Count">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_A1000Count"><script id="tpc_depositdetails_A1000Count" class="depositdetailsview" type="text/html"><span><?php echo $depositdetails->A1000Count->caption() ?></span></script></span></td>
		<td data-name="A1000Count"<?php echo $depositdetails->A1000Count->cellAttributes() ?>>
<script id="tpx_depositdetails_A1000Count" class="depositdetailsview" type="text/html">
<span id="el_depositdetails_A1000Count">
<span<?php echo $depositdetails->A1000Count->viewAttributes() ?>>
<?php echo $depositdetails->A1000Count->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails->A1000Amount->Visible) { // A1000Amount ?>
	<tr id="r_A1000Amount">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_A1000Amount"><script id="tpc_depositdetails_A1000Amount" class="depositdetailsview" type="text/html"><span><?php echo $depositdetails->A1000Amount->caption() ?></span></script></span></td>
		<td data-name="A1000Amount"<?php echo $depositdetails->A1000Amount->cellAttributes() ?>>
<script id="tpx_depositdetails_A1000Amount" class="depositdetailsview" type="text/html">
<span id="el_depositdetails_A1000Amount">
<span<?php echo $depositdetails->A1000Amount->viewAttributes() ?>>
<?php echo $depositdetails->A1000Amount->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails->A500Count->Visible) { // A500Count ?>
	<tr id="r_A500Count">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_A500Count"><script id="tpc_depositdetails_A500Count" class="depositdetailsview" type="text/html"><span><?php echo $depositdetails->A500Count->caption() ?></span></script></span></td>
		<td data-name="A500Count"<?php echo $depositdetails->A500Count->cellAttributes() ?>>
<script id="tpx_depositdetails_A500Count" class="depositdetailsview" type="text/html">
<span id="el_depositdetails_A500Count">
<span<?php echo $depositdetails->A500Count->viewAttributes() ?>>
<?php echo $depositdetails->A500Count->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails->A500Amount->Visible) { // A500Amount ?>
	<tr id="r_A500Amount">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_A500Amount"><script id="tpc_depositdetails_A500Amount" class="depositdetailsview" type="text/html"><span><?php echo $depositdetails->A500Amount->caption() ?></span></script></span></td>
		<td data-name="A500Amount"<?php echo $depositdetails->A500Amount->cellAttributes() ?>>
<script id="tpx_depositdetails_A500Amount" class="depositdetailsview" type="text/html">
<span id="el_depositdetails_A500Amount">
<span<?php echo $depositdetails->A500Amount->viewAttributes() ?>>
<?php echo $depositdetails->A500Amount->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails->A200Count->Visible) { // A200Count ?>
	<tr id="r_A200Count">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_A200Count"><script id="tpc_depositdetails_A200Count" class="depositdetailsview" type="text/html"><span><?php echo $depositdetails->A200Count->caption() ?></span></script></span></td>
		<td data-name="A200Count"<?php echo $depositdetails->A200Count->cellAttributes() ?>>
<script id="tpx_depositdetails_A200Count" class="depositdetailsview" type="text/html">
<span id="el_depositdetails_A200Count">
<span<?php echo $depositdetails->A200Count->viewAttributes() ?>>
<?php echo $depositdetails->A200Count->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails->A200Amount->Visible) { // A200Amount ?>
	<tr id="r_A200Amount">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_A200Amount"><script id="tpc_depositdetails_A200Amount" class="depositdetailsview" type="text/html"><span><?php echo $depositdetails->A200Amount->caption() ?></span></script></span></td>
		<td data-name="A200Amount"<?php echo $depositdetails->A200Amount->cellAttributes() ?>>
<script id="tpx_depositdetails_A200Amount" class="depositdetailsview" type="text/html">
<span id="el_depositdetails_A200Amount">
<span<?php echo $depositdetails->A200Amount->viewAttributes() ?>>
<?php echo $depositdetails->A200Amount->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails->A100Count->Visible) { // A100Count ?>
	<tr id="r_A100Count">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_A100Count"><script id="tpc_depositdetails_A100Count" class="depositdetailsview" type="text/html"><span><?php echo $depositdetails->A100Count->caption() ?></span></script></span></td>
		<td data-name="A100Count"<?php echo $depositdetails->A100Count->cellAttributes() ?>>
<script id="tpx_depositdetails_A100Count" class="depositdetailsview" type="text/html">
<span id="el_depositdetails_A100Count">
<span<?php echo $depositdetails->A100Count->viewAttributes() ?>>
<?php echo $depositdetails->A100Count->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails->A100Amount->Visible) { // A100Amount ?>
	<tr id="r_A100Amount">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_A100Amount"><script id="tpc_depositdetails_A100Amount" class="depositdetailsview" type="text/html"><span><?php echo $depositdetails->A100Amount->caption() ?></span></script></span></td>
		<td data-name="A100Amount"<?php echo $depositdetails->A100Amount->cellAttributes() ?>>
<script id="tpx_depositdetails_A100Amount" class="depositdetailsview" type="text/html">
<span id="el_depositdetails_A100Amount">
<span<?php echo $depositdetails->A100Amount->viewAttributes() ?>>
<?php echo $depositdetails->A100Amount->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails->A50Count->Visible) { // A50Count ?>
	<tr id="r_A50Count">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_A50Count"><script id="tpc_depositdetails_A50Count" class="depositdetailsview" type="text/html"><span><?php echo $depositdetails->A50Count->caption() ?></span></script></span></td>
		<td data-name="A50Count"<?php echo $depositdetails->A50Count->cellAttributes() ?>>
<script id="tpx_depositdetails_A50Count" class="depositdetailsview" type="text/html">
<span id="el_depositdetails_A50Count">
<span<?php echo $depositdetails->A50Count->viewAttributes() ?>>
<?php echo $depositdetails->A50Count->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails->A50Amount->Visible) { // A50Amount ?>
	<tr id="r_A50Amount">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_A50Amount"><script id="tpc_depositdetails_A50Amount" class="depositdetailsview" type="text/html"><span><?php echo $depositdetails->A50Amount->caption() ?></span></script></span></td>
		<td data-name="A50Amount"<?php echo $depositdetails->A50Amount->cellAttributes() ?>>
<script id="tpx_depositdetails_A50Amount" class="depositdetailsview" type="text/html">
<span id="el_depositdetails_A50Amount">
<span<?php echo $depositdetails->A50Amount->viewAttributes() ?>>
<?php echo $depositdetails->A50Amount->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails->A20Count->Visible) { // A20Count ?>
	<tr id="r_A20Count">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_A20Count"><script id="tpc_depositdetails_A20Count" class="depositdetailsview" type="text/html"><span><?php echo $depositdetails->A20Count->caption() ?></span></script></span></td>
		<td data-name="A20Count"<?php echo $depositdetails->A20Count->cellAttributes() ?>>
<script id="tpx_depositdetails_A20Count" class="depositdetailsview" type="text/html">
<span id="el_depositdetails_A20Count">
<span<?php echo $depositdetails->A20Count->viewAttributes() ?>>
<?php echo $depositdetails->A20Count->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails->A20Amount->Visible) { // A20Amount ?>
	<tr id="r_A20Amount">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_A20Amount"><script id="tpc_depositdetails_A20Amount" class="depositdetailsview" type="text/html"><span><?php echo $depositdetails->A20Amount->caption() ?></span></script></span></td>
		<td data-name="A20Amount"<?php echo $depositdetails->A20Amount->cellAttributes() ?>>
<script id="tpx_depositdetails_A20Amount" class="depositdetailsview" type="text/html">
<span id="el_depositdetails_A20Amount">
<span<?php echo $depositdetails->A20Amount->viewAttributes() ?>>
<?php echo $depositdetails->A20Amount->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails->A10Count->Visible) { // A10Count ?>
	<tr id="r_A10Count">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_A10Count"><script id="tpc_depositdetails_A10Count" class="depositdetailsview" type="text/html"><span><?php echo $depositdetails->A10Count->caption() ?></span></script></span></td>
		<td data-name="A10Count"<?php echo $depositdetails->A10Count->cellAttributes() ?>>
<script id="tpx_depositdetails_A10Count" class="depositdetailsview" type="text/html">
<span id="el_depositdetails_A10Count">
<span<?php echo $depositdetails->A10Count->viewAttributes() ?>>
<?php echo $depositdetails->A10Count->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails->A10Amount->Visible) { // A10Amount ?>
	<tr id="r_A10Amount">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_A10Amount"><script id="tpc_depositdetails_A10Amount" class="depositdetailsview" type="text/html"><span><?php echo $depositdetails->A10Amount->caption() ?></span></script></span></td>
		<td data-name="A10Amount"<?php echo $depositdetails->A10Amount->cellAttributes() ?>>
<script id="tpx_depositdetails_A10Amount" class="depositdetailsview" type="text/html">
<span id="el_depositdetails_A10Amount">
<span<?php echo $depositdetails->A10Amount->viewAttributes() ?>>
<?php echo $depositdetails->A10Amount->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails->BalanceAmount->Visible) { // BalanceAmount ?>
	<tr id="r_BalanceAmount">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_BalanceAmount"><script id="tpc_depositdetails_BalanceAmount" class="depositdetailsview" type="text/html"><span><?php echo $depositdetails->BalanceAmount->caption() ?></span></script></span></td>
		<td data-name="BalanceAmount"<?php echo $depositdetails->BalanceAmount->cellAttributes() ?>>
<script id="tpx_depositdetails_BalanceAmount" class="depositdetailsview" type="text/html">
<span id="el_depositdetails_BalanceAmount">
<span<?php echo $depositdetails->BalanceAmount->viewAttributes() ?>>
<?php echo $depositdetails->BalanceAmount->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails->CashCollected->Visible) { // CashCollected ?>
	<tr id="r_CashCollected">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_CashCollected"><script id="tpc_depositdetails_CashCollected" class="depositdetailsview" type="text/html"><span><?php echo $depositdetails->CashCollected->caption() ?></span></script></span></td>
		<td data-name="CashCollected"<?php echo $depositdetails->CashCollected->cellAttributes() ?>>
<script id="tpx_depositdetails_CashCollected" class="depositdetailsview" type="text/html">
<span id="el_depositdetails_CashCollected">
<span<?php echo $depositdetails->CashCollected->viewAttributes() ?>>
<?php echo $depositdetails->CashCollected->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails->RTGS->Visible) { // RTGS ?>
	<tr id="r_RTGS">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_RTGS"><script id="tpc_depositdetails_RTGS" class="depositdetailsview" type="text/html"><span><?php echo $depositdetails->RTGS->caption() ?></span></script></span></td>
		<td data-name="RTGS"<?php echo $depositdetails->RTGS->cellAttributes() ?>>
<script id="tpx_depositdetails_RTGS" class="depositdetailsview" type="text/html">
<span id="el_depositdetails_RTGS">
<span<?php echo $depositdetails->RTGS->viewAttributes() ?>>
<?php echo $depositdetails->RTGS->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails->PAYTM->Visible) { // PAYTM ?>
	<tr id="r_PAYTM">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_PAYTM"><script id="tpc_depositdetails_PAYTM" class="depositdetailsview" type="text/html"><span><?php echo $depositdetails->PAYTM->caption() ?></span></script></span></td>
		<td data-name="PAYTM"<?php echo $depositdetails->PAYTM->cellAttributes() ?>>
<script id="tpx_depositdetails_PAYTM" class="depositdetailsview" type="text/html">
<span id="el_depositdetails_PAYTM">
<span<?php echo $depositdetails->PAYTM->viewAttributes() ?>>
<?php echo $depositdetails->PAYTM->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_HospID"><script id="tpc_depositdetails_HospID" class="depositdetailsview" type="text/html"><span><?php echo $depositdetails->HospID->caption() ?></span></script></span></td>
		<td data-name="HospID"<?php echo $depositdetails->HospID->cellAttributes() ?>>
<script id="tpx_depositdetails_HospID" class="depositdetailsview" type="text/html">
<span id="el_depositdetails_HospID">
<span<?php echo $depositdetails->HospID->viewAttributes() ?>>
<?php echo $depositdetails->HospID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails->ManualCash->Visible) { // ManualCash ?>
	<tr id="r_ManualCash">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_ManualCash"><script id="tpc_depositdetails_ManualCash" class="depositdetailsview" type="text/html"><span><?php echo $depositdetails->ManualCash->caption() ?></span></script></span></td>
		<td data-name="ManualCash"<?php echo $depositdetails->ManualCash->cellAttributes() ?>>
<script id="tpx_depositdetails_ManualCash" class="depositdetailsview" type="text/html">
<span id="el_depositdetails_ManualCash">
<span<?php echo $depositdetails->ManualCash->viewAttributes() ?>>
<?php echo $depositdetails->ManualCash->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails->ManualCard->Visible) { // ManualCard ?>
	<tr id="r_ManualCard">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_ManualCard"><script id="tpc_depositdetails_ManualCard" class="depositdetailsview" type="text/html"><span><?php echo $depositdetails->ManualCard->caption() ?></span></script></span></td>
		<td data-name="ManualCard"<?php echo $depositdetails->ManualCard->cellAttributes() ?>>
<script id="tpx_depositdetails_ManualCard" class="depositdetailsview" type="text/html">
<span id="el_depositdetails_ManualCard">
<span<?php echo $depositdetails->ManualCard->viewAttributes() ?>>
<?php echo $depositdetails->ManualCard->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
</table>
<div id="tpd_depositdetailsview" class="ew-custom-template"></div>
<script id="tpm_depositdetailsview" type="text/html">
<div id="ct_depositdetails_view"><style>
	.ew-form:not(.ew-list-form):not(.ew-pager-form), table.ew-master-table.ew-vertical {
		width: 100%;
	}
	.content-wrapper {
		background: #f4f6f9;
	}
	.form-control-plaintext {
		display: unset;
		width: unset;
	}
	.widget-user .widget-user-image {
		position: absolute;
		top: 65px;
		left: 90%;
		margin-left: -45px;
	}
	.widget-user .card-footer {
		padding-top: 0px;
	}
	.card-footer {
		padding: .05rem 0.025rem;
		background-color: rgba(17,17,17,0.03);
		border-top: 0 solid #f4f4f4;
	}
	.widget-user .widget-user-username {
	margin-top: 0;
	margin-bottom: 0px;
	font-size: 18px;
	font-weight: 300;
	text-shadow: 0 1px 1px rgba(0,0,0,0.2);
}
.widget-user .widget-user-image {
	position: absolute;
	top: 5px;
	left: 90%;
	margin-left: -45px;
}
.widget-user .widget-user-header {
	padding: 1rem;
	height: 100px;
	border-top-left-radius: .25rem;
	border-top-right-radius: .25rem;
}
.form-control:not(textarea) {
	width: -webkit-fill-available;
}
.ew-row .ew-cell {
	margin-right: unset;
}
.form-control:not(textarea) {
	width: auto;
}
</style>
<input id="createdbyId" name="createdbyId" type="hidden" value="<?php echo CurrentUserName(); ?>">
<input id="HospIDId" name="HospIDId" type="hidden" value="<?php echo HospitalID(); ?>">
<div class="row">
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Deposit Details</h3>
			</div>
			<div class="card-body">
				 <div>{{include tmpl="#tpc_depositdetails_DepositToBankSelect"/}}&nbsp;{{include tmpl="#tpx_depositdetails_DepositToBankSelect"/}}</div>
				 <div id="DepositToBankid">{{include tmpl="#tpc_depositdetails_DepositToBank"/}}&nbsp;{{include tmpl="#tpx_depositdetails_DepositToBank"/}}</div>
				 <div id="TransferToid">{{include tmpl="#tpc_depositdetails_TransferTo"/}}&nbsp;{{include tmpl="#tpx_depositdetails_TransferTo"/}}</div>
				 <div>{{include tmpl="#tpc_depositdetails_DepositDate"/}}&nbsp;{{include tmpl="#tpx_depositdetails_DepositDate"/}}</div>
			</div>
		</div>
	</div>
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Deposit Details</h3>
			</div>
			<div class="card-body">
			  <!-- /.card-body -->
<table class="table table-condensed">
				 <tbody align="right">
				 			<tr><td  align="right" style="width: 40px">Opening Balance</td><td  align="right" style="width: 40px"></td><td  align="right" style="width: 40px">{{include tmpl="#tpc_depositdetails_OpeningBalance"/}}&nbsp;{{include tmpl="#tpx_depositdetails_OpeningBalance"/}}</td></tr>
				</tbody>
</table>			
<table class="table table-condensed">
<thead align="right">
					<tr>
					  <th align="right" style="width: 40px">Denomination</th>
					  <th align="right" style="width: 40px">Count</th>
					  <th align="right" style="width: 40px">Amount</th>
					</tr>
				  </thead>
	 <tbody align="right">
		<tr><td>2000</td><td align="right">{{include tmpl="#tpc_depositdetails_A2000Count"/}}&nbsp;{{include tmpl="#tpx_depositdetails_A2000Count"/}}</td><td align="right">{{include tmpl="#tpc_depositdetails_A2000Amount"/}}&nbsp;{{include tmpl="#tpx_depositdetails_A2000Amount"/}}</td></tr>
		<tr><td>1000</td><td align="right">{{include tmpl="#tpc_depositdetails_A1000Count"/}}&nbsp;{{include tmpl="#tpx_depositdetails_A1000Count"/}}</td><td align="right">{{include tmpl="#tpc_depositdetails_A1000Amount"/}}&nbsp;{{include tmpl="#tpx_depositdetails_A1000Amount"/}}</td></tr>
		<tr><td>500</td><td align="right">{{include tmpl="#tpc_depositdetails_A500Count"/}}&nbsp;{{include tmpl="#tpx_depositdetails_A500Count"/}}</td><td align="right">{{include tmpl="#tpc_depositdetails_A500Amount"/}}&nbsp;{{include tmpl="#tpx_depositdetails_A500Amount"/}}</td></tr>
		<tr><td>200</td><td align="right">{{include tmpl="#tpc_depositdetails_A200Count"/}}&nbsp;{{include tmpl="#tpx_depositdetails_A200Count"/}}</td><td align="right">{{include tmpl="#tpc_depositdetails_A200Amount"/}}&nbsp;{{include tmpl="#tpx_depositdetails_A200Amount"/}}</td></tr>
		<tr><td>100</td><td align="right">{{include tmpl="#tpc_depositdetails_A100Count"/}}&nbsp;{{include tmpl="#tpx_depositdetails_A100Count"/}}</td><td align="right">{{include tmpl="#tpc_depositdetails_A100Amount"/}}&nbsp;{{include tmpl="#tpx_depositdetails_A100Amount"/}}</td></tr>
		<tr><td>50</td><td align="right">{{include tmpl="#tpc_depositdetails_A50Count"/}}&nbsp;{{include tmpl="#tpx_depositdetails_A50Count"/}}</td><td align="right">{{include tmpl="#tpc_depositdetails_A50Amount"/}}&nbsp;{{include tmpl="#tpx_depositdetails_A50Amount"/}}</td></tr>
		<tr><td>20</td><td align="right">{{include tmpl="#tpc_depositdetails_A20Count"/}}&nbsp;{{include tmpl="#tpx_depositdetails_A20Count"/}}</td><td align="right">{{include tmpl="#tpc_depositdetails_A20Amount"/}}&nbsp;{{include tmpl="#tpx_depositdetails_A20Amount"/}}</td></tr>
		<tr><td>10</td><td align="right">{{include tmpl="#tpc_depositdetails_A10Count"/}}&nbsp;{{include tmpl="#tpx_depositdetails_A10Count"/}}</td><td align="right">{{include tmpl="#tpc_depositdetails_A10Amount"/}}&nbsp;{{include tmpl="#tpx_depositdetails_A10Amount"/}}</td></tr>
		<tr><td>Other</td><td></td><td align="right">{{include tmpl="#tpc_depositdetails_Other"/}}&nbsp;{{include tmpl="#tpx_depositdetails_Other"/}}</td></tr>
	</tbody>
</table>
<hr>
<table class="table table-condensed">
				 <tbody align="right">
				 			<tr><td>Total Cash</td><td></td><td>{{include tmpl="#tpc_depositdetails_TotalCash"/}}&nbsp;{{include tmpl="#tpx_depositdetails_TotalCash"/}}</td></tr>
				 				<tr><td>Cash Collected</td><td></td><td>{{include tmpl="#tpc_depositdetails_CashCollected"/}}&nbsp;{{include tmpl="#tpx_depositdetails_CashCollected"/}}</td></tr>
				 			<tr><td>Cheque</td><td></td><td>{{include tmpl="#tpc_depositdetails_Cheque"/}}&nbsp;{{include tmpl="#tpx_depositdetails_Cheque"/}}</td></tr>
				 			<tr><td>Card</td><td></td><td>{{include tmpl="#tpc_depositdetails_Card"/}}&nbsp;{{include tmpl="#tpx_depositdetails_Card"/}}</td></tr>
				 					<tr><td>PAYTM</td><td></td><td>{{include tmpl="#tpc_depositdetails_PAYTM"/}}&nbsp;{{include tmpl="#tpx_depositdetails_PAYTM"/}}</td></tr>
				 			<tr><td>NEFT</td><td></td><td>{{include tmpl="#tpc_depositdetails_NEFTRTGS"/}}&nbsp;{{include tmpl="#tpx_depositdetails_NEFTRTGS"/}}</td></tr>
				 				<tr><td>RTGS</td><td></td><td>{{include tmpl="#tpc_depositdetails_RTGS"/}}&nbsp;{{include tmpl="#tpx_depositdetails_RTGS"/}}</td></tr>
				 					<tr><td>Manual Cash</td><td></td><td>{{include tmpl="#tpc_depositdetails_ManualCash"/}}&nbsp;{{include tmpl="#tpx_depositdetails_ManualCash"/}}</td></tr>
				 						<tr><td>Manual Card </td><td></td><td>{{include tmpl="#tpc_depositdetails_ManualCard"/}}&nbsp;{{include tmpl="#tpx_depositdetails_ManualCard"/}}</td></tr>
				 			<tr><td>Total Transfer / Deposit Amount</td><td></td><td>{{include tmpl="#tpc_depositdetails_TotalTransferDepositAmount"/}}&nbsp;{{include tmpl="#tpx_depositdetails_TotalTransferDepositAmount"/}}</td></tr>
				 			<tr><td>Balance Amount</td><td></td><td>{{include tmpl="#tpc_depositdetails_BalanceAmount"/}}&nbsp;{{include tmpl="#tpx_depositdetails_BalanceAmount"/}}</td></tr>
				</tbody>
</table>			
			</div>
		</div>
	</div>
</div>
</div>
</script>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($depositdetails->Rows) ?> };
ew.applyTemplate("tpd_depositdetailsview", "tpm_depositdetailsview", "depositdetailsview", "<?php echo $depositdetails->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.depositdetailsview_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$depositdetails_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$depositdetails->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");
// Write your table-specific startup script here
// document.write("page loaded");

						document.getElementById("DepositToBankid").style.visibility = "hidden";
						document.getElementById("TransferToid").style.visibility = "hidden";

function calculateAmount()
{
var x_A2000Count = +document.getElementById("x_A2000Count").value;
document.getElementById("x_A2000Amount").value = x_A2000Count * 2000;
var x_A1000Count = +document.getElementById("x_A1000Count").value;
document.getElementById("x_A1000Amount").value = x_A1000Count * 1000;
var x_A500Count = +document.getElementById("x_A500Count").value;
document.getElementById("x_A500Amount").value = x_A500Count * 500;
var x_A200Count = +document.getElementById("x_A200Count").value;
document.getElementById("x_A200Amount").value = x_A200Count * 200;
var x_A100Count = +document.getElementById("x_A100Count").value;
document.getElementById("x_A100Amount").value = x_A100Count * 100;
var x_A50Count = +document.getElementById("x_A50Count").value;
document.getElementById("x_A50Amount").value = x_A50Count * 50;
var x_A20Count = +document.getElementById("x_A20Count").value;
document.getElementById("x_A20Amount").value = x_A20Count * 20;
var x_A10Count = +document.getElementById("x_A10Count").value;
document.getElementById("x_A10Amount").value = x_A10Count * 10;
var x_A2000Amount = +document.getElementById("x_A2000Amount").value ;
var x_A1000Amount = +document.getElementById("x_A1000Amount").value;
var x_A500Amount = +document.getElementById("x_A500Amount").value ;
var x_A200Amount = +document.getElementById("x_A200Amount").value;
var x_A100Amount = +document.getElementById("x_A100Amount").value;
var x_A50Amount = +document.getElementById("x_A50Amount").value;
var x_A20Amount = +document.getElementById("x_A20Amount").value;
var x_A10Amount = +document.getElementById("x_A10Amount").value ;
var x_OpeningBalance = +document.getElementById("x_OpeningBalance").value ;
var x_Other = +document.getElementById("x_Other").value ;
document.getElementById("x_TotalCash").value  = x_A2000Amount + x_A1000Amount + x_A500Amount + x_A200Amount
  + x_A100Amount + x_A50Amount +  x_A20Amount + x_A10Amount + x_OpeningBalance + x_Other ;
 var x_TotalCash = +document.getElementById("x_TotalCash").value;
  var x_TotalTransferDepositAmount = +document.getElementById("x_TotalTransferDepositAmount").value;
  document.getElementById("x_BalanceAmount").value  = x_TotalCash -  x_TotalTransferDepositAmount;
}
</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$depositdetails_view->terminate();
?>