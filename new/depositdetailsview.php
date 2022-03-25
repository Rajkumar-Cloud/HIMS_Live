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
<?php include_once "header.php"; ?>
<?php if (!$depositdetails_view->isExport()) { ?>
<script>
var fdepositdetailsview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fdepositdetailsview = currentForm = new ew.Form("fdepositdetailsview", "view");
	loadjs.done("fdepositdetailsview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$depositdetails_view->isExport()) { ?>
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
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="depositdetails">
<input type="hidden" name="modal" value="<?php echo (int)$depositdetails_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($depositdetails_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_id"><script id="tpc_depositdetails_id" type="text/html"><?php echo $depositdetails_view->id->caption() ?></script></span></td>
		<td data-name="id" <?php echo $depositdetails_view->id->cellAttributes() ?>>
<script id="tpx_depositdetails_id" type="text/html"><span id="el_depositdetails_id">
<span<?php echo $depositdetails_view->id->viewAttributes() ?>><?php echo $depositdetails_view->id->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails_view->DepositDate->Visible) { // DepositDate ?>
	<tr id="r_DepositDate">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_DepositDate"><script id="tpc_depositdetails_DepositDate" type="text/html"><?php echo $depositdetails_view->DepositDate->caption() ?></script></span></td>
		<td data-name="DepositDate" <?php echo $depositdetails_view->DepositDate->cellAttributes() ?>>
<script id="tpx_depositdetails_DepositDate" type="text/html"><span id="el_depositdetails_DepositDate">
<span<?php echo $depositdetails_view->DepositDate->viewAttributes() ?>><?php echo $depositdetails_view->DepositDate->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails_view->DepositToBankSelect->Visible) { // DepositToBankSelect ?>
	<tr id="r_DepositToBankSelect">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_DepositToBankSelect"><script id="tpc_depositdetails_DepositToBankSelect" type="text/html"><?php echo $depositdetails_view->DepositToBankSelect->caption() ?></script></span></td>
		<td data-name="DepositToBankSelect" <?php echo $depositdetails_view->DepositToBankSelect->cellAttributes() ?>>
<script id="tpx_depositdetails_DepositToBankSelect" type="text/html"><span id="el_depositdetails_DepositToBankSelect">
<span<?php echo $depositdetails_view->DepositToBankSelect->viewAttributes() ?>><?php echo $depositdetails_view->DepositToBankSelect->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails_view->DepositToBank->Visible) { // DepositToBank ?>
	<tr id="r_DepositToBank">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_DepositToBank"><script id="tpc_depositdetails_DepositToBank" type="text/html"><?php echo $depositdetails_view->DepositToBank->caption() ?></script></span></td>
		<td data-name="DepositToBank" <?php echo $depositdetails_view->DepositToBank->cellAttributes() ?>>
<script id="tpx_depositdetails_DepositToBank" type="text/html"><span id="el_depositdetails_DepositToBank">
<span<?php echo $depositdetails_view->DepositToBank->viewAttributes() ?>><?php echo $depositdetails_view->DepositToBank->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails_view->TransferToSelect->Visible) { // TransferToSelect ?>
	<tr id="r_TransferToSelect">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_TransferToSelect"><script id="tpc_depositdetails_TransferToSelect" type="text/html"><?php echo $depositdetails_view->TransferToSelect->caption() ?></script></span></td>
		<td data-name="TransferToSelect" <?php echo $depositdetails_view->TransferToSelect->cellAttributes() ?>>
<script id="tpx_depositdetails_TransferToSelect" type="text/html"><span id="el_depositdetails_TransferToSelect">
<span<?php echo $depositdetails_view->TransferToSelect->viewAttributes() ?>><?php echo $depositdetails_view->TransferToSelect->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails_view->TransferTo->Visible) { // TransferTo ?>
	<tr id="r_TransferTo">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_TransferTo"><script id="tpc_depositdetails_TransferTo" type="text/html"><?php echo $depositdetails_view->TransferTo->caption() ?></script></span></td>
		<td data-name="TransferTo" <?php echo $depositdetails_view->TransferTo->cellAttributes() ?>>
<script id="tpx_depositdetails_TransferTo" type="text/html"><span id="el_depositdetails_TransferTo">
<span<?php echo $depositdetails_view->TransferTo->viewAttributes() ?>><?php echo $depositdetails_view->TransferTo->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails_view->OpeningBalance->Visible) { // OpeningBalance ?>
	<tr id="r_OpeningBalance">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_OpeningBalance"><script id="tpc_depositdetails_OpeningBalance" type="text/html"><?php echo $depositdetails_view->OpeningBalance->caption() ?></script></span></td>
		<td data-name="OpeningBalance" <?php echo $depositdetails_view->OpeningBalance->cellAttributes() ?>>
<script id="tpx_depositdetails_OpeningBalance" type="text/html"><span id="el_depositdetails_OpeningBalance">
<span<?php echo $depositdetails_view->OpeningBalance->viewAttributes() ?>><?php echo $depositdetails_view->OpeningBalance->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails_view->Other->Visible) { // Other ?>
	<tr id="r_Other">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_Other"><script id="tpc_depositdetails_Other" type="text/html"><?php echo $depositdetails_view->Other->caption() ?></script></span></td>
		<td data-name="Other" <?php echo $depositdetails_view->Other->cellAttributes() ?>>
<script id="tpx_depositdetails_Other" type="text/html"><span id="el_depositdetails_Other">
<span<?php echo $depositdetails_view->Other->viewAttributes() ?>><?php echo $depositdetails_view->Other->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails_view->TotalCash->Visible) { // TotalCash ?>
	<tr id="r_TotalCash">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_TotalCash"><script id="tpc_depositdetails_TotalCash" type="text/html"><?php echo $depositdetails_view->TotalCash->caption() ?></script></span></td>
		<td data-name="TotalCash" <?php echo $depositdetails_view->TotalCash->cellAttributes() ?>>
<script id="tpx_depositdetails_TotalCash" type="text/html"><span id="el_depositdetails_TotalCash">
<span<?php echo $depositdetails_view->TotalCash->viewAttributes() ?>><?php echo $depositdetails_view->TotalCash->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails_view->Cheque->Visible) { // Cheque ?>
	<tr id="r_Cheque">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_Cheque"><script id="tpc_depositdetails_Cheque" type="text/html"><?php echo $depositdetails_view->Cheque->caption() ?></script></span></td>
		<td data-name="Cheque" <?php echo $depositdetails_view->Cheque->cellAttributes() ?>>
<script id="tpx_depositdetails_Cheque" type="text/html"><span id="el_depositdetails_Cheque">
<span<?php echo $depositdetails_view->Cheque->viewAttributes() ?>><?php echo $depositdetails_view->Cheque->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails_view->Card->Visible) { // Card ?>
	<tr id="r_Card">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_Card"><script id="tpc_depositdetails_Card" type="text/html"><?php echo $depositdetails_view->Card->caption() ?></script></span></td>
		<td data-name="Card" <?php echo $depositdetails_view->Card->cellAttributes() ?>>
<script id="tpx_depositdetails_Card" type="text/html"><span id="el_depositdetails_Card">
<span<?php echo $depositdetails_view->Card->viewAttributes() ?>><?php echo $depositdetails_view->Card->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails_view->NEFTRTGS->Visible) { // NEFTRTGS ?>
	<tr id="r_NEFTRTGS">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_NEFTRTGS"><script id="tpc_depositdetails_NEFTRTGS" type="text/html"><?php echo $depositdetails_view->NEFTRTGS->caption() ?></script></span></td>
		<td data-name="NEFTRTGS" <?php echo $depositdetails_view->NEFTRTGS->cellAttributes() ?>>
<script id="tpx_depositdetails_NEFTRTGS" type="text/html"><span id="el_depositdetails_NEFTRTGS">
<span<?php echo $depositdetails_view->NEFTRTGS->viewAttributes() ?>><?php echo $depositdetails_view->NEFTRTGS->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails_view->TotalTransferDepositAmount->Visible) { // TotalTransferDepositAmount ?>
	<tr id="r_TotalTransferDepositAmount">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_TotalTransferDepositAmount"><script id="tpc_depositdetails_TotalTransferDepositAmount" type="text/html"><?php echo $depositdetails_view->TotalTransferDepositAmount->caption() ?></script></span></td>
		<td data-name="TotalTransferDepositAmount" <?php echo $depositdetails_view->TotalTransferDepositAmount->cellAttributes() ?>>
<script id="tpx_depositdetails_TotalTransferDepositAmount" type="text/html"><span id="el_depositdetails_TotalTransferDepositAmount">
<span<?php echo $depositdetails_view->TotalTransferDepositAmount->viewAttributes() ?>><?php echo $depositdetails_view->TotalTransferDepositAmount->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails_view->CreatedBy->Visible) { // CreatedBy ?>
	<tr id="r_CreatedBy">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_CreatedBy"><script id="tpc_depositdetails_CreatedBy" type="text/html"><?php echo $depositdetails_view->CreatedBy->caption() ?></script></span></td>
		<td data-name="CreatedBy" <?php echo $depositdetails_view->CreatedBy->cellAttributes() ?>>
<script id="tpx_depositdetails_CreatedBy" type="text/html"><span id="el_depositdetails_CreatedBy">
<span<?php echo $depositdetails_view->CreatedBy->viewAttributes() ?>><?php echo $depositdetails_view->CreatedBy->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails_view->CreatedDateTime->Visible) { // CreatedDateTime ?>
	<tr id="r_CreatedDateTime">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_CreatedDateTime"><script id="tpc_depositdetails_CreatedDateTime" type="text/html"><?php echo $depositdetails_view->CreatedDateTime->caption() ?></script></span></td>
		<td data-name="CreatedDateTime" <?php echo $depositdetails_view->CreatedDateTime->cellAttributes() ?>>
<script id="tpx_depositdetails_CreatedDateTime" type="text/html"><span id="el_depositdetails_CreatedDateTime">
<span<?php echo $depositdetails_view->CreatedDateTime->viewAttributes() ?>><?php echo $depositdetails_view->CreatedDateTime->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails_view->ModifiedBy->Visible) { // ModifiedBy ?>
	<tr id="r_ModifiedBy">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_ModifiedBy"><script id="tpc_depositdetails_ModifiedBy" type="text/html"><?php echo $depositdetails_view->ModifiedBy->caption() ?></script></span></td>
		<td data-name="ModifiedBy" <?php echo $depositdetails_view->ModifiedBy->cellAttributes() ?>>
<script id="tpx_depositdetails_ModifiedBy" type="text/html"><span id="el_depositdetails_ModifiedBy">
<span<?php echo $depositdetails_view->ModifiedBy->viewAttributes() ?>><?php echo $depositdetails_view->ModifiedBy->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails_view->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
	<tr id="r_ModifiedDateTime">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_ModifiedDateTime"><script id="tpc_depositdetails_ModifiedDateTime" type="text/html"><?php echo $depositdetails_view->ModifiedDateTime->caption() ?></script></span></td>
		<td data-name="ModifiedDateTime" <?php echo $depositdetails_view->ModifiedDateTime->cellAttributes() ?>>
<script id="tpx_depositdetails_ModifiedDateTime" type="text/html"><span id="el_depositdetails_ModifiedDateTime">
<span<?php echo $depositdetails_view->ModifiedDateTime->viewAttributes() ?>><?php echo $depositdetails_view->ModifiedDateTime->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails_view->CreatedUserName->Visible) { // CreatedUserName ?>
	<tr id="r_CreatedUserName">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_CreatedUserName"><script id="tpc_depositdetails_CreatedUserName" type="text/html"><?php echo $depositdetails_view->CreatedUserName->caption() ?></script></span></td>
		<td data-name="CreatedUserName" <?php echo $depositdetails_view->CreatedUserName->cellAttributes() ?>>
<script id="tpx_depositdetails_CreatedUserName" type="text/html"><span id="el_depositdetails_CreatedUserName">
<span<?php echo $depositdetails_view->CreatedUserName->viewAttributes() ?>><?php echo $depositdetails_view->CreatedUserName->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails_view->ModifiedUserName->Visible) { // ModifiedUserName ?>
	<tr id="r_ModifiedUserName">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_ModifiedUserName"><script id="tpc_depositdetails_ModifiedUserName" type="text/html"><?php echo $depositdetails_view->ModifiedUserName->caption() ?></script></span></td>
		<td data-name="ModifiedUserName" <?php echo $depositdetails_view->ModifiedUserName->cellAttributes() ?>>
<script id="tpx_depositdetails_ModifiedUserName" type="text/html"><span id="el_depositdetails_ModifiedUserName">
<span<?php echo $depositdetails_view->ModifiedUserName->viewAttributes() ?>><?php echo $depositdetails_view->ModifiedUserName->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails_view->A2000Count->Visible) { // A2000Count ?>
	<tr id="r_A2000Count">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_A2000Count"><script id="tpc_depositdetails_A2000Count" type="text/html"><?php echo $depositdetails_view->A2000Count->caption() ?></script></span></td>
		<td data-name="A2000Count" <?php echo $depositdetails_view->A2000Count->cellAttributes() ?>>
<script id="tpx_depositdetails_A2000Count" type="text/html"><span id="el_depositdetails_A2000Count">
<span<?php echo $depositdetails_view->A2000Count->viewAttributes() ?>><?php echo $depositdetails_view->A2000Count->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails_view->A2000Amount->Visible) { // A2000Amount ?>
	<tr id="r_A2000Amount">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_A2000Amount"><script id="tpc_depositdetails_A2000Amount" type="text/html"><?php echo $depositdetails_view->A2000Amount->caption() ?></script></span></td>
		<td data-name="A2000Amount" <?php echo $depositdetails_view->A2000Amount->cellAttributes() ?>>
<script id="tpx_depositdetails_A2000Amount" type="text/html"><span id="el_depositdetails_A2000Amount">
<span<?php echo $depositdetails_view->A2000Amount->viewAttributes() ?>><?php echo $depositdetails_view->A2000Amount->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails_view->A1000Count->Visible) { // A1000Count ?>
	<tr id="r_A1000Count">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_A1000Count"><script id="tpc_depositdetails_A1000Count" type="text/html"><?php echo $depositdetails_view->A1000Count->caption() ?></script></span></td>
		<td data-name="A1000Count" <?php echo $depositdetails_view->A1000Count->cellAttributes() ?>>
<script id="tpx_depositdetails_A1000Count" type="text/html"><span id="el_depositdetails_A1000Count">
<span<?php echo $depositdetails_view->A1000Count->viewAttributes() ?>><?php echo $depositdetails_view->A1000Count->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails_view->A1000Amount->Visible) { // A1000Amount ?>
	<tr id="r_A1000Amount">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_A1000Amount"><script id="tpc_depositdetails_A1000Amount" type="text/html"><?php echo $depositdetails_view->A1000Amount->caption() ?></script></span></td>
		<td data-name="A1000Amount" <?php echo $depositdetails_view->A1000Amount->cellAttributes() ?>>
<script id="tpx_depositdetails_A1000Amount" type="text/html"><span id="el_depositdetails_A1000Amount">
<span<?php echo $depositdetails_view->A1000Amount->viewAttributes() ?>><?php echo $depositdetails_view->A1000Amount->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails_view->A500Count->Visible) { // A500Count ?>
	<tr id="r_A500Count">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_A500Count"><script id="tpc_depositdetails_A500Count" type="text/html"><?php echo $depositdetails_view->A500Count->caption() ?></script></span></td>
		<td data-name="A500Count" <?php echo $depositdetails_view->A500Count->cellAttributes() ?>>
<script id="tpx_depositdetails_A500Count" type="text/html"><span id="el_depositdetails_A500Count">
<span<?php echo $depositdetails_view->A500Count->viewAttributes() ?>><?php echo $depositdetails_view->A500Count->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails_view->A500Amount->Visible) { // A500Amount ?>
	<tr id="r_A500Amount">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_A500Amount"><script id="tpc_depositdetails_A500Amount" type="text/html"><?php echo $depositdetails_view->A500Amount->caption() ?></script></span></td>
		<td data-name="A500Amount" <?php echo $depositdetails_view->A500Amount->cellAttributes() ?>>
<script id="tpx_depositdetails_A500Amount" type="text/html"><span id="el_depositdetails_A500Amount">
<span<?php echo $depositdetails_view->A500Amount->viewAttributes() ?>><?php echo $depositdetails_view->A500Amount->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails_view->A200Count->Visible) { // A200Count ?>
	<tr id="r_A200Count">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_A200Count"><script id="tpc_depositdetails_A200Count" type="text/html"><?php echo $depositdetails_view->A200Count->caption() ?></script></span></td>
		<td data-name="A200Count" <?php echo $depositdetails_view->A200Count->cellAttributes() ?>>
<script id="tpx_depositdetails_A200Count" type="text/html"><span id="el_depositdetails_A200Count">
<span<?php echo $depositdetails_view->A200Count->viewAttributes() ?>><?php echo $depositdetails_view->A200Count->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails_view->A200Amount->Visible) { // A200Amount ?>
	<tr id="r_A200Amount">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_A200Amount"><script id="tpc_depositdetails_A200Amount" type="text/html"><?php echo $depositdetails_view->A200Amount->caption() ?></script></span></td>
		<td data-name="A200Amount" <?php echo $depositdetails_view->A200Amount->cellAttributes() ?>>
<script id="tpx_depositdetails_A200Amount" type="text/html"><span id="el_depositdetails_A200Amount">
<span<?php echo $depositdetails_view->A200Amount->viewAttributes() ?>><?php echo $depositdetails_view->A200Amount->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails_view->A100Count->Visible) { // A100Count ?>
	<tr id="r_A100Count">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_A100Count"><script id="tpc_depositdetails_A100Count" type="text/html"><?php echo $depositdetails_view->A100Count->caption() ?></script></span></td>
		<td data-name="A100Count" <?php echo $depositdetails_view->A100Count->cellAttributes() ?>>
<script id="tpx_depositdetails_A100Count" type="text/html"><span id="el_depositdetails_A100Count">
<span<?php echo $depositdetails_view->A100Count->viewAttributes() ?>><?php echo $depositdetails_view->A100Count->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails_view->A100Amount->Visible) { // A100Amount ?>
	<tr id="r_A100Amount">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_A100Amount"><script id="tpc_depositdetails_A100Amount" type="text/html"><?php echo $depositdetails_view->A100Amount->caption() ?></script></span></td>
		<td data-name="A100Amount" <?php echo $depositdetails_view->A100Amount->cellAttributes() ?>>
<script id="tpx_depositdetails_A100Amount" type="text/html"><span id="el_depositdetails_A100Amount">
<span<?php echo $depositdetails_view->A100Amount->viewAttributes() ?>><?php echo $depositdetails_view->A100Amount->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails_view->A50Count->Visible) { // A50Count ?>
	<tr id="r_A50Count">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_A50Count"><script id="tpc_depositdetails_A50Count" type="text/html"><?php echo $depositdetails_view->A50Count->caption() ?></script></span></td>
		<td data-name="A50Count" <?php echo $depositdetails_view->A50Count->cellAttributes() ?>>
<script id="tpx_depositdetails_A50Count" type="text/html"><span id="el_depositdetails_A50Count">
<span<?php echo $depositdetails_view->A50Count->viewAttributes() ?>><?php echo $depositdetails_view->A50Count->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails_view->A50Amount->Visible) { // A50Amount ?>
	<tr id="r_A50Amount">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_A50Amount"><script id="tpc_depositdetails_A50Amount" type="text/html"><?php echo $depositdetails_view->A50Amount->caption() ?></script></span></td>
		<td data-name="A50Amount" <?php echo $depositdetails_view->A50Amount->cellAttributes() ?>>
<script id="tpx_depositdetails_A50Amount" type="text/html"><span id="el_depositdetails_A50Amount">
<span<?php echo $depositdetails_view->A50Amount->viewAttributes() ?>><?php echo $depositdetails_view->A50Amount->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails_view->A20Count->Visible) { // A20Count ?>
	<tr id="r_A20Count">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_A20Count"><script id="tpc_depositdetails_A20Count" type="text/html"><?php echo $depositdetails_view->A20Count->caption() ?></script></span></td>
		<td data-name="A20Count" <?php echo $depositdetails_view->A20Count->cellAttributes() ?>>
<script id="tpx_depositdetails_A20Count" type="text/html"><span id="el_depositdetails_A20Count">
<span<?php echo $depositdetails_view->A20Count->viewAttributes() ?>><?php echo $depositdetails_view->A20Count->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails_view->A20Amount->Visible) { // A20Amount ?>
	<tr id="r_A20Amount">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_A20Amount"><script id="tpc_depositdetails_A20Amount" type="text/html"><?php echo $depositdetails_view->A20Amount->caption() ?></script></span></td>
		<td data-name="A20Amount" <?php echo $depositdetails_view->A20Amount->cellAttributes() ?>>
<script id="tpx_depositdetails_A20Amount" type="text/html"><span id="el_depositdetails_A20Amount">
<span<?php echo $depositdetails_view->A20Amount->viewAttributes() ?>><?php echo $depositdetails_view->A20Amount->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails_view->A10Count->Visible) { // A10Count ?>
	<tr id="r_A10Count">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_A10Count"><script id="tpc_depositdetails_A10Count" type="text/html"><?php echo $depositdetails_view->A10Count->caption() ?></script></span></td>
		<td data-name="A10Count" <?php echo $depositdetails_view->A10Count->cellAttributes() ?>>
<script id="tpx_depositdetails_A10Count" type="text/html"><span id="el_depositdetails_A10Count">
<span<?php echo $depositdetails_view->A10Count->viewAttributes() ?>><?php echo $depositdetails_view->A10Count->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails_view->A10Amount->Visible) { // A10Amount ?>
	<tr id="r_A10Amount">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_A10Amount"><script id="tpc_depositdetails_A10Amount" type="text/html"><?php echo $depositdetails_view->A10Amount->caption() ?></script></span></td>
		<td data-name="A10Amount" <?php echo $depositdetails_view->A10Amount->cellAttributes() ?>>
<script id="tpx_depositdetails_A10Amount" type="text/html"><span id="el_depositdetails_A10Amount">
<span<?php echo $depositdetails_view->A10Amount->viewAttributes() ?>><?php echo $depositdetails_view->A10Amount->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails_view->BalanceAmount->Visible) { // BalanceAmount ?>
	<tr id="r_BalanceAmount">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_BalanceAmount"><script id="tpc_depositdetails_BalanceAmount" type="text/html"><?php echo $depositdetails_view->BalanceAmount->caption() ?></script></span></td>
		<td data-name="BalanceAmount" <?php echo $depositdetails_view->BalanceAmount->cellAttributes() ?>>
<script id="tpx_depositdetails_BalanceAmount" type="text/html"><span id="el_depositdetails_BalanceAmount">
<span<?php echo $depositdetails_view->BalanceAmount->viewAttributes() ?>><?php echo $depositdetails_view->BalanceAmount->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails_view->CashCollected->Visible) { // CashCollected ?>
	<tr id="r_CashCollected">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_CashCollected"><script id="tpc_depositdetails_CashCollected" type="text/html"><?php echo $depositdetails_view->CashCollected->caption() ?></script></span></td>
		<td data-name="CashCollected" <?php echo $depositdetails_view->CashCollected->cellAttributes() ?>>
<script id="tpx_depositdetails_CashCollected" type="text/html"><span id="el_depositdetails_CashCollected">
<span<?php echo $depositdetails_view->CashCollected->viewAttributes() ?>><?php echo $depositdetails_view->CashCollected->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails_view->RTGS->Visible) { // RTGS ?>
	<tr id="r_RTGS">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_RTGS"><script id="tpc_depositdetails_RTGS" type="text/html"><?php echo $depositdetails_view->RTGS->caption() ?></script></span></td>
		<td data-name="RTGS" <?php echo $depositdetails_view->RTGS->cellAttributes() ?>>
<script id="tpx_depositdetails_RTGS" type="text/html"><span id="el_depositdetails_RTGS">
<span<?php echo $depositdetails_view->RTGS->viewAttributes() ?>><?php echo $depositdetails_view->RTGS->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails_view->PAYTM->Visible) { // PAYTM ?>
	<tr id="r_PAYTM">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_PAYTM"><script id="tpc_depositdetails_PAYTM" type="text/html"><?php echo $depositdetails_view->PAYTM->caption() ?></script></span></td>
		<td data-name="PAYTM" <?php echo $depositdetails_view->PAYTM->cellAttributes() ?>>
<script id="tpx_depositdetails_PAYTM" type="text/html"><span id="el_depositdetails_PAYTM">
<span<?php echo $depositdetails_view->PAYTM->viewAttributes() ?>><?php echo $depositdetails_view->PAYTM->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($depositdetails_view->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $depositdetails_view->TableLeftColumnClass ?>"><span id="elh_depositdetails_HospID"><script id="tpc_depositdetails_HospID" type="text/html"><?php echo $depositdetails_view->HospID->caption() ?></script></span></td>
		<td data-name="HospID" <?php echo $depositdetails_view->HospID->cellAttributes() ?>>
<script id="tpx_depositdetails_HospID" type="text/html"><span id="el_depositdetails_HospID">
<span<?php echo $depositdetails_view->HospID->viewAttributes() ?>><?php echo $depositdetails_view->HospID->getViewValue() ?></span>
</span></script>
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
				 <div>{{include tmpl="#tpc_depositdetails_DepositToBankSelect"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_depositdetails_DepositToBankSelect")/}}</div>
				 <div id="DepositToBankid">{{include tmpl="#tpc_depositdetails_DepositToBank"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_depositdetails_DepositToBank")/}}</div>
				 <div id="TransferToid">{{include tmpl="#tpc_depositdetails_TransferTo"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_depositdetails_TransferTo")/}}</div>
				 <div>{{include tmpl="#tpc_depositdetails_DepositDate"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_depositdetails_DepositDate")/}}</div>
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
				 			<tr><td  align="right" style="width: 40px">Opening Balance</td><td  align="right" style="width: 40px"></td><td  align="right" style="width: 40px">{{include tmpl="#tpc_depositdetails_OpeningBalance"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_depositdetails_OpeningBalance")/}}</td></tr>
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
		<tr><td>2000</td><td align="right">{{include tmpl="#tpc_depositdetails_A2000Count"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_depositdetails_A2000Count")/}}</td><td align="right">{{include tmpl="#tpc_depositdetails_A2000Amount"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_depositdetails_A2000Amount")/}}</td></tr>
		<tr><td>1000</td><td align="right">{{include tmpl="#tpc_depositdetails_A1000Count"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_depositdetails_A1000Count")/}}</td><td align="right">{{include tmpl="#tpc_depositdetails_A1000Amount"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_depositdetails_A1000Amount")/}}</td></tr>
		<tr><td>500</td><td align="right">{{include tmpl="#tpc_depositdetails_A500Count"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_depositdetails_A500Count")/}}</td><td align="right">{{include tmpl="#tpc_depositdetails_A500Amount"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_depositdetails_A500Amount")/}}</td></tr>
		<tr><td>200</td><td align="right">{{include tmpl="#tpc_depositdetails_A200Count"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_depositdetails_A200Count")/}}</td><td align="right">{{include tmpl="#tpc_depositdetails_A200Amount"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_depositdetails_A200Amount")/}}</td></tr>
		<tr><td>100</td><td align="right">{{include tmpl="#tpc_depositdetails_A100Count"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_depositdetails_A100Count")/}}</td><td align="right">{{include tmpl="#tpc_depositdetails_A100Amount"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_depositdetails_A100Amount")/}}</td></tr>
		<tr><td>50</td><td align="right">{{include tmpl="#tpc_depositdetails_A50Count"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_depositdetails_A50Count")/}}</td><td align="right">{{include tmpl="#tpc_depositdetails_A50Amount"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_depositdetails_A50Amount")/}}</td></tr>
		<tr><td>20</td><td align="right">{{include tmpl="#tpc_depositdetails_A20Count"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_depositdetails_A20Count")/}}</td><td align="right">{{include tmpl="#tpc_depositdetails_A20Amount"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_depositdetails_A20Amount")/}}</td></tr>
		<tr><td>10</td><td align="right">{{include tmpl="#tpc_depositdetails_A10Count"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_depositdetails_A10Count")/}}</td><td align="right">{{include tmpl="#tpc_depositdetails_A10Amount"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_depositdetails_A10Amount")/}}</td></tr>
		<tr><td>Other</td><td></td><td align="right">{{include tmpl="#tpc_depositdetails_Other"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_depositdetails_Other")/}}</td></tr>
	</tbody>
</table>
<hr>
<table class="table table-condensed">
				 <tbody align="right">
				 			<tr><td>Total Cash</td><td></td><td>{{include tmpl="#tpc_depositdetails_TotalCash"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_depositdetails_TotalCash")/}}</td></tr>
				 				<tr><td>Cash Collected</td><td></td><td>{{include tmpl="#tpc_depositdetails_CashCollected"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_depositdetails_CashCollected")/}}</td></tr>
				 			<tr><td>Cheque</td><td></td><td>{{include tmpl="#tpc_depositdetails_Cheque"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_depositdetails_Cheque")/}}</td></tr>
				 			<tr><td>Card</td><td></td><td>{{include tmpl="#tpc_depositdetails_Card"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_depositdetails_Card")/}}</td></tr>
				 					<tr><td>PAYTM</td><td></td><td>{{include tmpl="#tpc_depositdetails_PAYTM"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_depositdetails_PAYTM")/}}</td></tr>
				 			<tr><td>NEFT</td><td></td><td>{{include tmpl="#tpc_depositdetails_NEFTRTGS"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_depositdetails_NEFTRTGS")/}}</td></tr>
				 				<tr><td>RTGS</td><td></td><td>{{include tmpl="#tpc_depositdetails_RTGS"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_depositdetails_RTGS")/}}</td></tr>
				 			<tr><td>Total Transfer / Deposit Amount</td><td></td><td>{{include tmpl="#tpc_depositdetails_TotalTransferDepositAmount"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_depositdetails_TotalTransferDepositAmount")/}}</td></tr>
				 			<tr><td>Balance Amount</td><td></td><td>{{include tmpl="#tpc_depositdetails_BalanceAmount"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_depositdetails_BalanceAmount")/}}</td></tr>
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
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($depositdetails->Rows) ?> };
	ew.applyTemplate("tpd_depositdetailsview", "tpm_depositdetailsview", "depositdetailsview", "<?php echo $depositdetails->CustomExport ?>", ew.templateData.rows[0]);
	$("script.depositdetailsview_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$depositdetails_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$depositdetails_view->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	function calculateAmount(){var e=+document.getElementById("x_A2000Count").value;document.getElementById("x_A2000Amount").value=2e3*e;var t=+document.getElementById("x_A1000Count").value;document.getElementById("x_A1000Amount").value=1e3*t;var n=+document.getElementById("x_A500Count").value;document.getElementById("x_A500Amount").value=500*n;var u=+document.getElementById("x_A200Count").value;document.getElementById("x_A200Amount").value=200*u;var m=+document.getElementById("x_A100Count").value;document.getElementById("x_A100Amount").value=100*m;var l=+document.getElementById("x_A50Count").value;document.getElementById("x_A50Amount").value=50*l;var d=+document.getElementById("x_A20Count").value;document.getElementById("x_A20Amount").value=20*d;var o=+document.getElementById("x_A10Count").value;document.getElementById("x_A10Amount").value=10*o;var a=+document.getElementById("x_A2000Amount").value,A=+document.getElementById("x_A1000Amount").value,v=+document.getElementById("x_A500Amount").value,c=+document.getElementById("x_A200Amount").value,y=+document.getElementById("x_A100Amount").value,B=+document.getElementById("x_A50Amount").value,g=+document.getElementById("x_A20Amount").value,E=+document.getElementById("x_A10Amount").value,I=+document.getElementById("x_OpeningBalance").value,x=+document.getElementById("x_Other").value;document.getElementById("x_TotalCash").value=a+A+v+c+y+B+g+E+I+x;var _=+document.getElementById("x_TotalCash").value,i=+document.getElementById("x_TotalTransferDepositAmount").value;document.getElementById("x_BalanceAmount").value=_-i}document.getElementById("DepositToBankid").style.visibility="hidden",document.getElementById("TransferToid").style.visibility="hidden";
});
</script>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$depositdetails_view->terminate();
?>