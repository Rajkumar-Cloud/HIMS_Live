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
$depositdetails_add = new depositdetails_add();

// Run the page
$depositdetails_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$depositdetails_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fdepositdetailsadd = currentForm = new ew.Form("fdepositdetailsadd", "add");

// Validate form
fdepositdetailsadd.validate = function() {
	if (!this.validateRequired)
		return true; // Ignore validation
	var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
	if ($fobj.find("#confirm").val() == "F")
		return true;
	var elm, felm, uelm, addcnt = 0;
	var $k = $fobj.find("#" + this.formKeyCountName); // Get key_count
	var rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1;
	var startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
	var gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
	for (var i = startcnt; i <= rowcnt; i++) {
		var infix = ($k[0]) ? String(i) : "";
		$fobj.data("rowindex", infix);
		<?php if ($depositdetails_add->DepositDate->Required) { ?>
			elm = this.getElements("x" + infix + "_DepositDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails->DepositDate->caption(), $depositdetails->DepositDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DepositDate");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($depositdetails->DepositDate->errorMessage()) ?>");
		<?php if ($depositdetails_add->DepositToBankSelect->Required) { ?>
			elm = this.getElements("x" + infix + "_DepositToBankSelect");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails->DepositToBankSelect->caption(), $depositdetails->DepositToBankSelect->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($depositdetails_add->DepositToBank->Required) { ?>
			elm = this.getElements("x" + infix + "_DepositToBank");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails->DepositToBank->caption(), $depositdetails->DepositToBank->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($depositdetails_add->TransferToSelect->Required) { ?>
			elm = this.getElements("x" + infix + "_TransferToSelect");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails->TransferToSelect->caption(), $depositdetails->TransferToSelect->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($depositdetails_add->TransferTo->Required) { ?>
			elm = this.getElements("x" + infix + "_TransferTo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails->TransferTo->caption(), $depositdetails->TransferTo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($depositdetails_add->OpeningBalance->Required) { ?>
			elm = this.getElements("x" + infix + "_OpeningBalance");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails->OpeningBalance->caption(), $depositdetails->OpeningBalance->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($depositdetails_add->Other->Required) { ?>
			elm = this.getElements("x" + infix + "_Other");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails->Other->caption(), $depositdetails->Other->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($depositdetails_add->TotalCash->Required) { ?>
			elm = this.getElements("x" + infix + "_TotalCash");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails->TotalCash->caption(), $depositdetails->TotalCash->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($depositdetails_add->Cheque->Required) { ?>
			elm = this.getElements("x" + infix + "_Cheque");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails->Cheque->caption(), $depositdetails->Cheque->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($depositdetails_add->Card->Required) { ?>
			elm = this.getElements("x" + infix + "_Card");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails->Card->caption(), $depositdetails->Card->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($depositdetails_add->NEFTRTGS->Required) { ?>
			elm = this.getElements("x" + infix + "_NEFTRTGS");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails->NEFTRTGS->caption(), $depositdetails->NEFTRTGS->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($depositdetails_add->TotalTransferDepositAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_TotalTransferDepositAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails->TotalTransferDepositAmount->caption(), $depositdetails->TotalTransferDepositAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($depositdetails_add->CreatedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_CreatedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails->CreatedBy->caption(), $depositdetails->CreatedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($depositdetails_add->CreatedDateTime->Required) { ?>
			elm = this.getElements("x" + infix + "_CreatedDateTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails->CreatedDateTime->caption(), $depositdetails->CreatedDateTime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($depositdetails_add->ModifiedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_ModifiedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails->ModifiedBy->caption(), $depositdetails->ModifiedBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($depositdetails_add->ModifiedDateTime->Required) { ?>
			elm = this.getElements("x" + infix + "_ModifiedDateTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails->ModifiedDateTime->caption(), $depositdetails->ModifiedDateTime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($depositdetails_add->CreatedUserName->Required) { ?>
			elm = this.getElements("x" + infix + "_CreatedUserName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails->CreatedUserName->caption(), $depositdetails->CreatedUserName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($depositdetails_add->ModifiedUserName->Required) { ?>
			elm = this.getElements("x" + infix + "_ModifiedUserName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails->ModifiedUserName->caption(), $depositdetails->ModifiedUserName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($depositdetails_add->A2000Count->Required) { ?>
			elm = this.getElements("x" + infix + "_A2000Count");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails->A2000Count->caption(), $depositdetails->A2000Count->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_A2000Count");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($depositdetails->A2000Count->errorMessage()) ?>");
		<?php if ($depositdetails_add->A2000Amount->Required) { ?>
			elm = this.getElements("x" + infix + "_A2000Amount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails->A2000Amount->caption(), $depositdetails->A2000Amount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_A2000Amount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($depositdetails->A2000Amount->errorMessage()) ?>");
		<?php if ($depositdetails_add->A1000Count->Required) { ?>
			elm = this.getElements("x" + infix + "_A1000Count");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails->A1000Count->caption(), $depositdetails->A1000Count->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_A1000Count");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($depositdetails->A1000Count->errorMessage()) ?>");
		<?php if ($depositdetails_add->A1000Amount->Required) { ?>
			elm = this.getElements("x" + infix + "_A1000Amount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails->A1000Amount->caption(), $depositdetails->A1000Amount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_A1000Amount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($depositdetails->A1000Amount->errorMessage()) ?>");
		<?php if ($depositdetails_add->A500Count->Required) { ?>
			elm = this.getElements("x" + infix + "_A500Count");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails->A500Count->caption(), $depositdetails->A500Count->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_A500Count");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($depositdetails->A500Count->errorMessage()) ?>");
		<?php if ($depositdetails_add->A500Amount->Required) { ?>
			elm = this.getElements("x" + infix + "_A500Amount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails->A500Amount->caption(), $depositdetails->A500Amount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_A500Amount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($depositdetails->A500Amount->errorMessage()) ?>");
		<?php if ($depositdetails_add->A200Count->Required) { ?>
			elm = this.getElements("x" + infix + "_A200Count");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails->A200Count->caption(), $depositdetails->A200Count->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_A200Count");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($depositdetails->A200Count->errorMessage()) ?>");
		<?php if ($depositdetails_add->A200Amount->Required) { ?>
			elm = this.getElements("x" + infix + "_A200Amount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails->A200Amount->caption(), $depositdetails->A200Amount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_A200Amount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($depositdetails->A200Amount->errorMessage()) ?>");
		<?php if ($depositdetails_add->A100Count->Required) { ?>
			elm = this.getElements("x" + infix + "_A100Count");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails->A100Count->caption(), $depositdetails->A100Count->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_A100Count");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($depositdetails->A100Count->errorMessage()) ?>");
		<?php if ($depositdetails_add->A100Amount->Required) { ?>
			elm = this.getElements("x" + infix + "_A100Amount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails->A100Amount->caption(), $depositdetails->A100Amount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_A100Amount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($depositdetails->A100Amount->errorMessage()) ?>");
		<?php if ($depositdetails_add->A50Count->Required) { ?>
			elm = this.getElements("x" + infix + "_A50Count");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails->A50Count->caption(), $depositdetails->A50Count->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_A50Count");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($depositdetails->A50Count->errorMessage()) ?>");
		<?php if ($depositdetails_add->A50Amount->Required) { ?>
			elm = this.getElements("x" + infix + "_A50Amount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails->A50Amount->caption(), $depositdetails->A50Amount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_A50Amount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($depositdetails->A50Amount->errorMessage()) ?>");
		<?php if ($depositdetails_add->A20Count->Required) { ?>
			elm = this.getElements("x" + infix + "_A20Count");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails->A20Count->caption(), $depositdetails->A20Count->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_A20Count");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($depositdetails->A20Count->errorMessage()) ?>");
		<?php if ($depositdetails_add->A20Amount->Required) { ?>
			elm = this.getElements("x" + infix + "_A20Amount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails->A20Amount->caption(), $depositdetails->A20Amount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_A20Amount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($depositdetails->A20Amount->errorMessage()) ?>");
		<?php if ($depositdetails_add->A10Count->Required) { ?>
			elm = this.getElements("x" + infix + "_A10Count");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails->A10Count->caption(), $depositdetails->A10Count->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_A10Count");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($depositdetails->A10Count->errorMessage()) ?>");
		<?php if ($depositdetails_add->A10Amount->Required) { ?>
			elm = this.getElements("x" + infix + "_A10Amount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails->A10Amount->caption(), $depositdetails->A10Amount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_A10Amount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($depositdetails->A10Amount->errorMessage()) ?>");
		<?php if ($depositdetails_add->BalanceAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_BalanceAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails->BalanceAmount->caption(), $depositdetails->BalanceAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BalanceAmount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($depositdetails->BalanceAmount->errorMessage()) ?>");
		<?php if ($depositdetails_add->CashCollected->Required) { ?>
			elm = this.getElements("x" + infix + "_CashCollected");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails->CashCollected->caption(), $depositdetails->CashCollected->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_CashCollected");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($depositdetails->CashCollected->errorMessage()) ?>");
		<?php if ($depositdetails_add->RTGS->Required) { ?>
			elm = this.getElements("x" + infix + "_RTGS");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails->RTGS->caption(), $depositdetails->RTGS->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RTGS");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($depositdetails->RTGS->errorMessage()) ?>");
		<?php if ($depositdetails_add->PAYTM->Required) { ?>
			elm = this.getElements("x" + infix + "_PAYTM");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails->PAYTM->caption(), $depositdetails->PAYTM->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PAYTM");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($depositdetails->PAYTM->errorMessage()) ?>");
		<?php if ($depositdetails_add->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails->HospID->caption(), $depositdetails->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($depositdetails_add->ManualCash->Required) { ?>
			elm = this.getElements("x" + infix + "_ManualCash");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails->ManualCash->caption(), $depositdetails->ManualCash->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ManualCash");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($depositdetails->ManualCash->errorMessage()) ?>");
		<?php if ($depositdetails_add->ManualCard->Required) { ?>
			elm = this.getElements("x" + infix + "_ManualCard");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails->ManualCard->caption(), $depositdetails->ManualCard->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ManualCard");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($depositdetails->ManualCard->errorMessage()) ?>");

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
	}

	// Process detail forms
	var dfs = $fobj.find("input[name='detailpage']").get();
	for (var i = 0; i < dfs.length; i++) {
		var df = dfs[i], val = df.value;
		if (val && ew.forms[val])
			if (!ew.forms[val].validate())
				return false;
	}
	return true;
}

// Form_CustomValidate event
fdepositdetailsadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fdepositdetailsadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fdepositdetailsadd.lists["x_DepositToBankSelect"] = <?php echo $depositdetails_add->DepositToBankSelect->Lookup->toClientList() ?>;
fdepositdetailsadd.lists["x_DepositToBankSelect"].options = <?php echo JsonEncode($depositdetails_add->DepositToBankSelect->options(FALSE, TRUE)) ?>;
fdepositdetailsadd.lists["x_DepositToBank"] = <?php echo $depositdetails_add->DepositToBank->Lookup->toClientList() ?>;
fdepositdetailsadd.lists["x_DepositToBank"].options = <?php echo JsonEncode($depositdetails_add->DepositToBank->lookupOptions()) ?>;
fdepositdetailsadd.lists["x_TransferTo"] = <?php echo $depositdetails_add->TransferTo->Lookup->toClientList() ?>;
fdepositdetailsadd.lists["x_TransferTo"].options = <?php echo JsonEncode($depositdetails_add->TransferTo->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $depositdetails_add->showPageHeader(); ?>
<?php
$depositdetails_add->showMessage();
?>
<form name="fdepositdetailsadd" id="fdepositdetailsadd" class="<?php echo $depositdetails_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($depositdetails_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $depositdetails_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="depositdetails">
<?php if ($depositdetails->isConfirm()) { // Confirm page ?>
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="confirm" id="confirm" value="confirm">
<?php } else { ?>
<input type="hidden" name="action" id="action" value="confirm">
<?php } ?>
<input type="hidden" name="modal" value="<?php echo (int)$depositdetails_add->IsModal ?>">
<div class="ew-add-div d-none"><!-- page* -->
<?php if ($depositdetails->DepositDate->Visible) { // DepositDate ?>
	<div id="r_DepositDate" class="form-group row">
		<label id="elh_depositdetails_DepositDate" for="x_DepositDate" class="<?php echo $depositdetails_add->LeftColumnClass ?>"><script id="tpc_depositdetails_DepositDate" class="depositdetailsadd" type="text/html"><span><?php echo $depositdetails->DepositDate->caption() ?><?php echo ($depositdetails->DepositDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $depositdetails_add->RightColumnClass ?>"><div<?php echo $depositdetails->DepositDate->cellAttributes() ?>>
<?php if (!$depositdetails->isConfirm()) { ?>
<script id="tpx_depositdetails_DepositDate" class="depositdetailsadd" type="text/html">
<span id="el_depositdetails_DepositDate">
<input type="text" data-table="depositdetails" data-field="x_DepositDate" data-format="7" name="x_DepositDate" id="x_DepositDate" placeholder="<?php echo HtmlEncode($depositdetails->DepositDate->getPlaceHolder()) ?>" value="<?php echo $depositdetails->DepositDate->EditValue ?>"<?php echo $depositdetails->DepositDate->editAttributes() ?>>
<?php if (!$depositdetails->DepositDate->ReadOnly && !$depositdetails->DepositDate->Disabled && !isset($depositdetails->DepositDate->EditAttrs["readonly"]) && !isset($depositdetails->DepositDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="depositdetailsadd_js">
ew.createDateTimePicker("fdepositdetailsadd", "x_DepositDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } else { ?>
<script id="tpx_depositdetails_DepositDate" class="depositdetailsadd" type="text/html">
<span id="el_depositdetails_DepositDate">
<span<?php echo $depositdetails->DepositDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($depositdetails->DepositDate->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="depositdetails" data-field="x_DepositDate" name="x_DepositDate" id="x_DepositDate" value="<?php echo HtmlEncode($depositdetails->DepositDate->FormValue) ?>">
<?php } ?>
<?php echo $depositdetails->DepositDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($depositdetails->DepositToBankSelect->Visible) { // DepositToBankSelect ?>
	<div id="r_DepositToBankSelect" class="form-group row">
		<label id="elh_depositdetails_DepositToBankSelect" class="<?php echo $depositdetails_add->LeftColumnClass ?>"><script id="tpc_depositdetails_DepositToBankSelect" class="depositdetailsadd" type="text/html"><span><?php echo $depositdetails->DepositToBankSelect->caption() ?><?php echo ($depositdetails->DepositToBankSelect->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $depositdetails_add->RightColumnClass ?>"><div<?php echo $depositdetails->DepositToBankSelect->cellAttributes() ?>>
<?php if (!$depositdetails->isConfirm()) { ?>
<script id="tpx_depositdetails_DepositToBankSelect" class="depositdetailsadd" type="text/html">
<span id="el_depositdetails_DepositToBankSelect">
<div id="tp_x_DepositToBankSelect" class="ew-template"><input type="radio" class="form-check-input" data-table="depositdetails" data-field="x_DepositToBankSelect" data-value-separator="<?php echo $depositdetails->DepositToBankSelect->displayValueSeparatorAttribute() ?>" name="x_DepositToBankSelect" id="x_DepositToBankSelect" value="{value}"<?php echo $depositdetails->DepositToBankSelect->editAttributes() ?>></div>
<div id="dsl_x_DepositToBankSelect" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $depositdetails->DepositToBankSelect->radioButtonListHtml(FALSE, "x_DepositToBankSelect") ?>
</div></div>
</span>
</script>
<?php } else { ?>
<script id="tpx_depositdetails_DepositToBankSelect" class="depositdetailsadd" type="text/html">
<span id="el_depositdetails_DepositToBankSelect">
<span<?php echo $depositdetails->DepositToBankSelect->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($depositdetails->DepositToBankSelect->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="depositdetails" data-field="x_DepositToBankSelect" name="x_DepositToBankSelect" id="x_DepositToBankSelect" value="<?php echo HtmlEncode($depositdetails->DepositToBankSelect->FormValue) ?>">
<?php } ?>
<?php echo $depositdetails->DepositToBankSelect->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($depositdetails->DepositToBank->Visible) { // DepositToBank ?>
	<div id="r_DepositToBank" class="form-group row">
		<label id="elh_depositdetails_DepositToBank" for="x_DepositToBank" class="<?php echo $depositdetails_add->LeftColumnClass ?>"><script id="tpc_depositdetails_DepositToBank" class="depositdetailsadd" type="text/html"><span><?php echo $depositdetails->DepositToBank->caption() ?><?php echo ($depositdetails->DepositToBank->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $depositdetails_add->RightColumnClass ?>"><div<?php echo $depositdetails->DepositToBank->cellAttributes() ?>>
<?php if (!$depositdetails->isConfirm()) { ?>
<script id="tpx_depositdetails_DepositToBank" class="depositdetailsadd" type="text/html">
<span id="el_depositdetails_DepositToBank">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="depositdetails" data-field="x_DepositToBank" data-value-separator="<?php echo $depositdetails->DepositToBank->displayValueSeparatorAttribute() ?>" id="x_DepositToBank" name="x_DepositToBank"<?php echo $depositdetails->DepositToBank->editAttributes() ?>>
		<?php echo $depositdetails->DepositToBank->selectOptionListHtml("x_DepositToBank") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "bankbranches") && !$depositdetails->DepositToBank->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_DepositToBank" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $depositdetails->DepositToBank->caption() ?>" data-title="<?php echo $depositdetails->DepositToBank->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_DepositToBank',url:'bankbranchesaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $depositdetails->DepositToBank->Lookup->getParamTag("p_x_DepositToBank") ?>
</span>
</script>
<?php } else { ?>
<script id="tpx_depositdetails_DepositToBank" class="depositdetailsadd" type="text/html">
<span id="el_depositdetails_DepositToBank">
<span<?php echo $depositdetails->DepositToBank->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($depositdetails->DepositToBank->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="depositdetails" data-field="x_DepositToBank" name="x_DepositToBank" id="x_DepositToBank" value="<?php echo HtmlEncode($depositdetails->DepositToBank->FormValue) ?>">
<?php } ?>
<?php echo $depositdetails->DepositToBank->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($depositdetails->TransferToSelect->Visible) { // TransferToSelect ?>
	<div id="r_TransferToSelect" class="form-group row">
		<label id="elh_depositdetails_TransferToSelect" for="x_TransferToSelect" class="<?php echo $depositdetails_add->LeftColumnClass ?>"><script id="tpc_depositdetails_TransferToSelect" class="depositdetailsadd" type="text/html"><span><?php echo $depositdetails->TransferToSelect->caption() ?><?php echo ($depositdetails->TransferToSelect->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $depositdetails_add->RightColumnClass ?>"><div<?php echo $depositdetails->TransferToSelect->cellAttributes() ?>>
<?php if (!$depositdetails->isConfirm()) { ?>
<script id="tpx_depositdetails_TransferToSelect" class="depositdetailsadd" type="text/html">
<span id="el_depositdetails_TransferToSelect">
<input type="text" data-table="depositdetails" data-field="x_TransferToSelect" name="x_TransferToSelect" id="x_TransferToSelect" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($depositdetails->TransferToSelect->getPlaceHolder()) ?>" value="<?php echo $depositdetails->TransferToSelect->EditValue ?>"<?php echo $depositdetails->TransferToSelect->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_depositdetails_TransferToSelect" class="depositdetailsadd" type="text/html">
<span id="el_depositdetails_TransferToSelect">
<span<?php echo $depositdetails->TransferToSelect->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($depositdetails->TransferToSelect->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="depositdetails" data-field="x_TransferToSelect" name="x_TransferToSelect" id="x_TransferToSelect" value="<?php echo HtmlEncode($depositdetails->TransferToSelect->FormValue) ?>">
<?php } ?>
<?php echo $depositdetails->TransferToSelect->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($depositdetails->TransferTo->Visible) { // TransferTo ?>
	<div id="r_TransferTo" class="form-group row">
		<label id="elh_depositdetails_TransferTo" for="x_TransferTo" class="<?php echo $depositdetails_add->LeftColumnClass ?>"><script id="tpc_depositdetails_TransferTo" class="depositdetailsadd" type="text/html"><span><?php echo $depositdetails->TransferTo->caption() ?><?php echo ($depositdetails->TransferTo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $depositdetails_add->RightColumnClass ?>"><div<?php echo $depositdetails->TransferTo->cellAttributes() ?>>
<?php if (!$depositdetails->isConfirm()) { ?>
<script id="tpx_depositdetails_TransferTo" class="depositdetailsadd" type="text/html">
<span id="el_depositdetails_TransferTo">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="depositdetails" data-field="x_TransferTo" data-value-separator="<?php echo $depositdetails->TransferTo->displayValueSeparatorAttribute() ?>" id="x_TransferTo" name="x_TransferTo"<?php echo $depositdetails->TransferTo->editAttributes() ?>>
		<?php echo $depositdetails->TransferTo->selectOptionListHtml("x_TransferTo") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "banktransferto") && !$depositdetails->TransferTo->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TransferTo" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $depositdetails->TransferTo->caption() ?>" data-title="<?php echo $depositdetails->TransferTo->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TransferTo',url:'banktransfertoaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $depositdetails->TransferTo->Lookup->getParamTag("p_x_TransferTo") ?>
</span>
</script>
<?php } else { ?>
<script id="tpx_depositdetails_TransferTo" class="depositdetailsadd" type="text/html">
<span id="el_depositdetails_TransferTo">
<span<?php echo $depositdetails->TransferTo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($depositdetails->TransferTo->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="depositdetails" data-field="x_TransferTo" name="x_TransferTo" id="x_TransferTo" value="<?php echo HtmlEncode($depositdetails->TransferTo->FormValue) ?>">
<?php } ?>
<?php echo $depositdetails->TransferTo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($depositdetails->OpeningBalance->Visible) { // OpeningBalance ?>
	<div id="r_OpeningBalance" class="form-group row">
		<label id="elh_depositdetails_OpeningBalance" for="x_OpeningBalance" class="<?php echo $depositdetails_add->LeftColumnClass ?>"><script id="tpc_depositdetails_OpeningBalance" class="depositdetailsadd" type="text/html"><span><?php echo $depositdetails->OpeningBalance->caption() ?><?php echo ($depositdetails->OpeningBalance->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $depositdetails_add->RightColumnClass ?>"><div<?php echo $depositdetails->OpeningBalance->cellAttributes() ?>>
<?php if (!$depositdetails->isConfirm()) { ?>
<script id="tpx_depositdetails_OpeningBalance" class="depositdetailsadd" type="text/html">
<span id="el_depositdetails_OpeningBalance">
<input type="text" data-table="depositdetails" data-field="x_OpeningBalance" name="x_OpeningBalance" id="x_OpeningBalance" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($depositdetails->OpeningBalance->getPlaceHolder()) ?>" value="<?php echo $depositdetails->OpeningBalance->EditValue ?>"<?php echo $depositdetails->OpeningBalance->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_depositdetails_OpeningBalance" class="depositdetailsadd" type="text/html">
<span id="el_depositdetails_OpeningBalance">
<span<?php echo $depositdetails->OpeningBalance->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($depositdetails->OpeningBalance->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="depositdetails" data-field="x_OpeningBalance" name="x_OpeningBalance" id="x_OpeningBalance" value="<?php echo HtmlEncode($depositdetails->OpeningBalance->FormValue) ?>">
<?php } ?>
<?php echo $depositdetails->OpeningBalance->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($depositdetails->Other->Visible) { // Other ?>
	<div id="r_Other" class="form-group row">
		<label id="elh_depositdetails_Other" for="x_Other" class="<?php echo $depositdetails_add->LeftColumnClass ?>"><script id="tpc_depositdetails_Other" class="depositdetailsadd" type="text/html"><span><?php echo $depositdetails->Other->caption() ?><?php echo ($depositdetails->Other->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $depositdetails_add->RightColumnClass ?>"><div<?php echo $depositdetails->Other->cellAttributes() ?>>
<?php if (!$depositdetails->isConfirm()) { ?>
<script id="tpx_depositdetails_Other" class="depositdetailsadd" type="text/html">
<span id="el_depositdetails_Other">
<input type="text" data-table="depositdetails" data-field="x_Other" name="x_Other" id="x_Other" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($depositdetails->Other->getPlaceHolder()) ?>" value="<?php echo $depositdetails->Other->EditValue ?>"<?php echo $depositdetails->Other->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_depositdetails_Other" class="depositdetailsadd" type="text/html">
<span id="el_depositdetails_Other">
<span<?php echo $depositdetails->Other->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($depositdetails->Other->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="depositdetails" data-field="x_Other" name="x_Other" id="x_Other" value="<?php echo HtmlEncode($depositdetails->Other->FormValue) ?>">
<?php } ?>
<?php echo $depositdetails->Other->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($depositdetails->TotalCash->Visible) { // TotalCash ?>
	<div id="r_TotalCash" class="form-group row">
		<label id="elh_depositdetails_TotalCash" for="x_TotalCash" class="<?php echo $depositdetails_add->LeftColumnClass ?>"><script id="tpc_depositdetails_TotalCash" class="depositdetailsadd" type="text/html"><span><?php echo $depositdetails->TotalCash->caption() ?><?php echo ($depositdetails->TotalCash->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $depositdetails_add->RightColumnClass ?>"><div<?php echo $depositdetails->TotalCash->cellAttributes() ?>>
<?php if (!$depositdetails->isConfirm()) { ?>
<script id="tpx_depositdetails_TotalCash" class="depositdetailsadd" type="text/html">
<span id="el_depositdetails_TotalCash">
<input type="text" data-table="depositdetails" data-field="x_TotalCash" name="x_TotalCash" id="x_TotalCash" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($depositdetails->TotalCash->getPlaceHolder()) ?>" value="<?php echo $depositdetails->TotalCash->EditValue ?>"<?php echo $depositdetails->TotalCash->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_depositdetails_TotalCash" class="depositdetailsadd" type="text/html">
<span id="el_depositdetails_TotalCash">
<span<?php echo $depositdetails->TotalCash->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($depositdetails->TotalCash->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="depositdetails" data-field="x_TotalCash" name="x_TotalCash" id="x_TotalCash" value="<?php echo HtmlEncode($depositdetails->TotalCash->FormValue) ?>">
<?php } ?>
<?php echo $depositdetails->TotalCash->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($depositdetails->Cheque->Visible) { // Cheque ?>
	<div id="r_Cheque" class="form-group row">
		<label id="elh_depositdetails_Cheque" for="x_Cheque" class="<?php echo $depositdetails_add->LeftColumnClass ?>"><script id="tpc_depositdetails_Cheque" class="depositdetailsadd" type="text/html"><span><?php echo $depositdetails->Cheque->caption() ?><?php echo ($depositdetails->Cheque->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $depositdetails_add->RightColumnClass ?>"><div<?php echo $depositdetails->Cheque->cellAttributes() ?>>
<?php if (!$depositdetails->isConfirm()) { ?>
<script id="tpx_depositdetails_Cheque" class="depositdetailsadd" type="text/html">
<span id="el_depositdetails_Cheque">
<input type="text" data-table="depositdetails" data-field="x_Cheque" name="x_Cheque" id="x_Cheque" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($depositdetails->Cheque->getPlaceHolder()) ?>" value="<?php echo $depositdetails->Cheque->EditValue ?>"<?php echo $depositdetails->Cheque->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_depositdetails_Cheque" class="depositdetailsadd" type="text/html">
<span id="el_depositdetails_Cheque">
<span<?php echo $depositdetails->Cheque->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($depositdetails->Cheque->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="depositdetails" data-field="x_Cheque" name="x_Cheque" id="x_Cheque" value="<?php echo HtmlEncode($depositdetails->Cheque->FormValue) ?>">
<?php } ?>
<?php echo $depositdetails->Cheque->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($depositdetails->Card->Visible) { // Card ?>
	<div id="r_Card" class="form-group row">
		<label id="elh_depositdetails_Card" for="x_Card" class="<?php echo $depositdetails_add->LeftColumnClass ?>"><script id="tpc_depositdetails_Card" class="depositdetailsadd" type="text/html"><span><?php echo $depositdetails->Card->caption() ?><?php echo ($depositdetails->Card->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $depositdetails_add->RightColumnClass ?>"><div<?php echo $depositdetails->Card->cellAttributes() ?>>
<?php if (!$depositdetails->isConfirm()) { ?>
<script id="tpx_depositdetails_Card" class="depositdetailsadd" type="text/html">
<span id="el_depositdetails_Card">
<input type="text" data-table="depositdetails" data-field="x_Card" name="x_Card" id="x_Card" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($depositdetails->Card->getPlaceHolder()) ?>" value="<?php echo $depositdetails->Card->EditValue ?>"<?php echo $depositdetails->Card->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_depositdetails_Card" class="depositdetailsadd" type="text/html">
<span id="el_depositdetails_Card">
<span<?php echo $depositdetails->Card->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($depositdetails->Card->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="depositdetails" data-field="x_Card" name="x_Card" id="x_Card" value="<?php echo HtmlEncode($depositdetails->Card->FormValue) ?>">
<?php } ?>
<?php echo $depositdetails->Card->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($depositdetails->NEFTRTGS->Visible) { // NEFTRTGS ?>
	<div id="r_NEFTRTGS" class="form-group row">
		<label id="elh_depositdetails_NEFTRTGS" for="x_NEFTRTGS" class="<?php echo $depositdetails_add->LeftColumnClass ?>"><script id="tpc_depositdetails_NEFTRTGS" class="depositdetailsadd" type="text/html"><span><?php echo $depositdetails->NEFTRTGS->caption() ?><?php echo ($depositdetails->NEFTRTGS->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $depositdetails_add->RightColumnClass ?>"><div<?php echo $depositdetails->NEFTRTGS->cellAttributes() ?>>
<?php if (!$depositdetails->isConfirm()) { ?>
<script id="tpx_depositdetails_NEFTRTGS" class="depositdetailsadd" type="text/html">
<span id="el_depositdetails_NEFTRTGS">
<input type="text" data-table="depositdetails" data-field="x_NEFTRTGS" name="x_NEFTRTGS" id="x_NEFTRTGS" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($depositdetails->NEFTRTGS->getPlaceHolder()) ?>" value="<?php echo $depositdetails->NEFTRTGS->EditValue ?>"<?php echo $depositdetails->NEFTRTGS->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_depositdetails_NEFTRTGS" class="depositdetailsadd" type="text/html">
<span id="el_depositdetails_NEFTRTGS">
<span<?php echo $depositdetails->NEFTRTGS->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($depositdetails->NEFTRTGS->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="depositdetails" data-field="x_NEFTRTGS" name="x_NEFTRTGS" id="x_NEFTRTGS" value="<?php echo HtmlEncode($depositdetails->NEFTRTGS->FormValue) ?>">
<?php } ?>
<?php echo $depositdetails->NEFTRTGS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($depositdetails->TotalTransferDepositAmount->Visible) { // TotalTransferDepositAmount ?>
	<div id="r_TotalTransferDepositAmount" class="form-group row">
		<label id="elh_depositdetails_TotalTransferDepositAmount" for="x_TotalTransferDepositAmount" class="<?php echo $depositdetails_add->LeftColumnClass ?>"><script id="tpc_depositdetails_TotalTransferDepositAmount" class="depositdetailsadd" type="text/html"><span><?php echo $depositdetails->TotalTransferDepositAmount->caption() ?><?php echo ($depositdetails->TotalTransferDepositAmount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $depositdetails_add->RightColumnClass ?>"><div<?php echo $depositdetails->TotalTransferDepositAmount->cellAttributes() ?>>
<?php if (!$depositdetails->isConfirm()) { ?>
<script id="tpx_depositdetails_TotalTransferDepositAmount" class="depositdetailsadd" type="text/html">
<span id="el_depositdetails_TotalTransferDepositAmount">
<input type="text" data-table="depositdetails" data-field="x_TotalTransferDepositAmount" name="x_TotalTransferDepositAmount" id="x_TotalTransferDepositAmount" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($depositdetails->TotalTransferDepositAmount->getPlaceHolder()) ?>" value="<?php echo $depositdetails->TotalTransferDepositAmount->EditValue ?>"<?php echo $depositdetails->TotalTransferDepositAmount->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_depositdetails_TotalTransferDepositAmount" class="depositdetailsadd" type="text/html">
<span id="el_depositdetails_TotalTransferDepositAmount">
<span<?php echo $depositdetails->TotalTransferDepositAmount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($depositdetails->TotalTransferDepositAmount->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="depositdetails" data-field="x_TotalTransferDepositAmount" name="x_TotalTransferDepositAmount" id="x_TotalTransferDepositAmount" value="<?php echo HtmlEncode($depositdetails->TotalTransferDepositAmount->FormValue) ?>">
<?php } ?>
<?php echo $depositdetails->TotalTransferDepositAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
	<?php if (!$depositdetails->isConfirm()) { ?>
	<?php } else { ?>
	<script id="tpx_depositdetails_CreatedBy" class="depositdetailsadd" type="text/html">
	<span id="el_depositdetails_CreatedBy">
	<span<?php echo $depositdetails->CreatedBy->viewAttributes() ?>>
	<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($depositdetails->CreatedBy->ViewValue) ?>"></span>
	</span>
	</script>
	<input type="hidden" data-table="depositdetails" data-field="x_CreatedBy" name="x_CreatedBy" id="x_CreatedBy" value="<?php echo HtmlEncode($depositdetails->CreatedBy->FormValue) ?>">
	<?php } ?>
	<?php if (!$depositdetails->isConfirm()) { ?>
	<?php } else { ?>
	<script id="tpx_depositdetails_CreatedDateTime" class="depositdetailsadd" type="text/html">
	<span id="el_depositdetails_CreatedDateTime">
	<span<?php echo $depositdetails->CreatedDateTime->viewAttributes() ?>>
	<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($depositdetails->CreatedDateTime->ViewValue) ?>"></span>
	</span>
	</script>
	<input type="hidden" data-table="depositdetails" data-field="x_CreatedDateTime" name="x_CreatedDateTime" id="x_CreatedDateTime" value="<?php echo HtmlEncode($depositdetails->CreatedDateTime->FormValue) ?>">
	<?php } ?>
	<?php if (!$depositdetails->isConfirm()) { ?>
	<?php } else { ?>
	<script id="tpx_depositdetails_ModifiedBy" class="depositdetailsadd" type="text/html">
	<span id="el_depositdetails_ModifiedBy">
	<span<?php echo $depositdetails->ModifiedBy->viewAttributes() ?>>
	<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($depositdetails->ModifiedBy->ViewValue) ?>"></span>
	</span>
	</script>
	<input type="hidden" data-table="depositdetails" data-field="x_ModifiedBy" name="x_ModifiedBy" id="x_ModifiedBy" value="<?php echo HtmlEncode($depositdetails->ModifiedBy->FormValue) ?>">
	<?php } ?>
	<?php if (!$depositdetails->isConfirm()) { ?>
	<?php } else { ?>
	<script id="tpx_depositdetails_ModifiedDateTime" class="depositdetailsadd" type="text/html">
	<span id="el_depositdetails_ModifiedDateTime">
	<span<?php echo $depositdetails->ModifiedDateTime->viewAttributes() ?>>
	<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($depositdetails->ModifiedDateTime->ViewValue) ?>"></span>
	</span>
	</script>
	<input type="hidden" data-table="depositdetails" data-field="x_ModifiedDateTime" name="x_ModifiedDateTime" id="x_ModifiedDateTime" value="<?php echo HtmlEncode($depositdetails->ModifiedDateTime->FormValue) ?>">
	<?php } ?>
	<?php if (!$depositdetails->isConfirm()) { ?>
	<?php } else { ?>
	<script id="tpx_depositdetails_CreatedUserName" class="depositdetailsadd" type="text/html">
	<span id="el_depositdetails_CreatedUserName">
	<span<?php echo $depositdetails->CreatedUserName->viewAttributes() ?>>
	<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($depositdetails->CreatedUserName->ViewValue) ?>"></span>
	</span>
	</script>
	<input type="hidden" data-table="depositdetails" data-field="x_CreatedUserName" name="x_CreatedUserName" id="x_CreatedUserName" value="<?php echo HtmlEncode($depositdetails->CreatedUserName->FormValue) ?>">
	<?php } ?>
	<?php if (!$depositdetails->isConfirm()) { ?>
	<?php } else { ?>
	<script id="tpx_depositdetails_ModifiedUserName" class="depositdetailsadd" type="text/html">
	<span id="el_depositdetails_ModifiedUserName">
	<span<?php echo $depositdetails->ModifiedUserName->viewAttributes() ?>>
	<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($depositdetails->ModifiedUserName->ViewValue) ?>"></span>
	</span>
	</script>
	<input type="hidden" data-table="depositdetails" data-field="x_ModifiedUserName" name="x_ModifiedUserName" id="x_ModifiedUserName" value="<?php echo HtmlEncode($depositdetails->ModifiedUserName->FormValue) ?>">
	<?php } ?>
<?php if ($depositdetails->A2000Count->Visible) { // A2000Count ?>
	<div id="r_A2000Count" class="form-group row">
		<label id="elh_depositdetails_A2000Count" for="x_A2000Count" class="<?php echo $depositdetails_add->LeftColumnClass ?>"><script id="tpc_depositdetails_A2000Count" class="depositdetailsadd" type="text/html"><span><?php echo $depositdetails->A2000Count->caption() ?><?php echo ($depositdetails->A2000Count->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $depositdetails_add->RightColumnClass ?>"><div<?php echo $depositdetails->A2000Count->cellAttributes() ?>>
<?php if (!$depositdetails->isConfirm()) { ?>
<script id="tpx_depositdetails_A2000Count" class="depositdetailsadd" type="text/html">
<span id="el_depositdetails_A2000Count">
<input type="text" data-table="depositdetails" data-field="x_A2000Count" name="x_A2000Count" id="x_A2000Count" size="8" placeholder="<?php echo HtmlEncode($depositdetails->A2000Count->getPlaceHolder()) ?>" value="<?php echo $depositdetails->A2000Count->EditValue ?>"<?php echo $depositdetails->A2000Count->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_depositdetails_A2000Count" class="depositdetailsadd" type="text/html">
<span id="el_depositdetails_A2000Count">
<span<?php echo $depositdetails->A2000Count->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($depositdetails->A2000Count->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="depositdetails" data-field="x_A2000Count" name="x_A2000Count" id="x_A2000Count" value="<?php echo HtmlEncode($depositdetails->A2000Count->FormValue) ?>">
<?php } ?>
<?php echo $depositdetails->A2000Count->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($depositdetails->A2000Amount->Visible) { // A2000Amount ?>
	<div id="r_A2000Amount" class="form-group row">
		<label id="elh_depositdetails_A2000Amount" for="x_A2000Amount" class="<?php echo $depositdetails_add->LeftColumnClass ?>"><script id="tpc_depositdetails_A2000Amount" class="depositdetailsadd" type="text/html"><span><?php echo $depositdetails->A2000Amount->caption() ?><?php echo ($depositdetails->A2000Amount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $depositdetails_add->RightColumnClass ?>"><div<?php echo $depositdetails->A2000Amount->cellAttributes() ?>>
<?php if (!$depositdetails->isConfirm()) { ?>
<script id="tpx_depositdetails_A2000Amount" class="depositdetailsadd" type="text/html">
<span id="el_depositdetails_A2000Amount">
<input type="text" data-table="depositdetails" data-field="x_A2000Amount" name="x_A2000Amount" id="x_A2000Amount" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($depositdetails->A2000Amount->getPlaceHolder()) ?>" value="<?php echo $depositdetails->A2000Amount->EditValue ?>"<?php echo $depositdetails->A2000Amount->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_depositdetails_A2000Amount" class="depositdetailsadd" type="text/html">
<span id="el_depositdetails_A2000Amount">
<span<?php echo $depositdetails->A2000Amount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($depositdetails->A2000Amount->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="depositdetails" data-field="x_A2000Amount" name="x_A2000Amount" id="x_A2000Amount" value="<?php echo HtmlEncode($depositdetails->A2000Amount->FormValue) ?>">
<?php } ?>
<?php echo $depositdetails->A2000Amount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($depositdetails->A1000Count->Visible) { // A1000Count ?>
	<div id="r_A1000Count" class="form-group row">
		<label id="elh_depositdetails_A1000Count" for="x_A1000Count" class="<?php echo $depositdetails_add->LeftColumnClass ?>"><script id="tpc_depositdetails_A1000Count" class="depositdetailsadd" type="text/html"><span><?php echo $depositdetails->A1000Count->caption() ?><?php echo ($depositdetails->A1000Count->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $depositdetails_add->RightColumnClass ?>"><div<?php echo $depositdetails->A1000Count->cellAttributes() ?>>
<?php if (!$depositdetails->isConfirm()) { ?>
<script id="tpx_depositdetails_A1000Count" class="depositdetailsadd" type="text/html">
<span id="el_depositdetails_A1000Count">
<input type="text" data-table="depositdetails" data-field="x_A1000Count" name="x_A1000Count" id="x_A1000Count" size="8" placeholder="<?php echo HtmlEncode($depositdetails->A1000Count->getPlaceHolder()) ?>" value="<?php echo $depositdetails->A1000Count->EditValue ?>"<?php echo $depositdetails->A1000Count->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_depositdetails_A1000Count" class="depositdetailsadd" type="text/html">
<span id="el_depositdetails_A1000Count">
<span<?php echo $depositdetails->A1000Count->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($depositdetails->A1000Count->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="depositdetails" data-field="x_A1000Count" name="x_A1000Count" id="x_A1000Count" value="<?php echo HtmlEncode($depositdetails->A1000Count->FormValue) ?>">
<?php } ?>
<?php echo $depositdetails->A1000Count->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($depositdetails->A1000Amount->Visible) { // A1000Amount ?>
	<div id="r_A1000Amount" class="form-group row">
		<label id="elh_depositdetails_A1000Amount" for="x_A1000Amount" class="<?php echo $depositdetails_add->LeftColumnClass ?>"><script id="tpc_depositdetails_A1000Amount" class="depositdetailsadd" type="text/html"><span><?php echo $depositdetails->A1000Amount->caption() ?><?php echo ($depositdetails->A1000Amount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $depositdetails_add->RightColumnClass ?>"><div<?php echo $depositdetails->A1000Amount->cellAttributes() ?>>
<?php if (!$depositdetails->isConfirm()) { ?>
<script id="tpx_depositdetails_A1000Amount" class="depositdetailsadd" type="text/html">
<span id="el_depositdetails_A1000Amount">
<input type="text" data-table="depositdetails" data-field="x_A1000Amount" name="x_A1000Amount" id="x_A1000Amount" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($depositdetails->A1000Amount->getPlaceHolder()) ?>" value="<?php echo $depositdetails->A1000Amount->EditValue ?>"<?php echo $depositdetails->A1000Amount->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_depositdetails_A1000Amount" class="depositdetailsadd" type="text/html">
<span id="el_depositdetails_A1000Amount">
<span<?php echo $depositdetails->A1000Amount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($depositdetails->A1000Amount->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="depositdetails" data-field="x_A1000Amount" name="x_A1000Amount" id="x_A1000Amount" value="<?php echo HtmlEncode($depositdetails->A1000Amount->FormValue) ?>">
<?php } ?>
<?php echo $depositdetails->A1000Amount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($depositdetails->A500Count->Visible) { // A500Count ?>
	<div id="r_A500Count" class="form-group row">
		<label id="elh_depositdetails_A500Count" for="x_A500Count" class="<?php echo $depositdetails_add->LeftColumnClass ?>"><script id="tpc_depositdetails_A500Count" class="depositdetailsadd" type="text/html"><span><?php echo $depositdetails->A500Count->caption() ?><?php echo ($depositdetails->A500Count->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $depositdetails_add->RightColumnClass ?>"><div<?php echo $depositdetails->A500Count->cellAttributes() ?>>
<?php if (!$depositdetails->isConfirm()) { ?>
<script id="tpx_depositdetails_A500Count" class="depositdetailsadd" type="text/html">
<span id="el_depositdetails_A500Count">
<input type="text" data-table="depositdetails" data-field="x_A500Count" name="x_A500Count" id="x_A500Count" size="8" placeholder="<?php echo HtmlEncode($depositdetails->A500Count->getPlaceHolder()) ?>" value="<?php echo $depositdetails->A500Count->EditValue ?>"<?php echo $depositdetails->A500Count->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_depositdetails_A500Count" class="depositdetailsadd" type="text/html">
<span id="el_depositdetails_A500Count">
<span<?php echo $depositdetails->A500Count->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($depositdetails->A500Count->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="depositdetails" data-field="x_A500Count" name="x_A500Count" id="x_A500Count" value="<?php echo HtmlEncode($depositdetails->A500Count->FormValue) ?>">
<?php } ?>
<?php echo $depositdetails->A500Count->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($depositdetails->A500Amount->Visible) { // A500Amount ?>
	<div id="r_A500Amount" class="form-group row">
		<label id="elh_depositdetails_A500Amount" for="x_A500Amount" class="<?php echo $depositdetails_add->LeftColumnClass ?>"><script id="tpc_depositdetails_A500Amount" class="depositdetailsadd" type="text/html"><span><?php echo $depositdetails->A500Amount->caption() ?><?php echo ($depositdetails->A500Amount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $depositdetails_add->RightColumnClass ?>"><div<?php echo $depositdetails->A500Amount->cellAttributes() ?>>
<?php if (!$depositdetails->isConfirm()) { ?>
<script id="tpx_depositdetails_A500Amount" class="depositdetailsadd" type="text/html">
<span id="el_depositdetails_A500Amount">
<input type="text" data-table="depositdetails" data-field="x_A500Amount" name="x_A500Amount" id="x_A500Amount" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($depositdetails->A500Amount->getPlaceHolder()) ?>" value="<?php echo $depositdetails->A500Amount->EditValue ?>"<?php echo $depositdetails->A500Amount->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_depositdetails_A500Amount" class="depositdetailsadd" type="text/html">
<span id="el_depositdetails_A500Amount">
<span<?php echo $depositdetails->A500Amount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($depositdetails->A500Amount->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="depositdetails" data-field="x_A500Amount" name="x_A500Amount" id="x_A500Amount" value="<?php echo HtmlEncode($depositdetails->A500Amount->FormValue) ?>">
<?php } ?>
<?php echo $depositdetails->A500Amount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($depositdetails->A200Count->Visible) { // A200Count ?>
	<div id="r_A200Count" class="form-group row">
		<label id="elh_depositdetails_A200Count" for="x_A200Count" class="<?php echo $depositdetails_add->LeftColumnClass ?>"><script id="tpc_depositdetails_A200Count" class="depositdetailsadd" type="text/html"><span><?php echo $depositdetails->A200Count->caption() ?><?php echo ($depositdetails->A200Count->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $depositdetails_add->RightColumnClass ?>"><div<?php echo $depositdetails->A200Count->cellAttributes() ?>>
<?php if (!$depositdetails->isConfirm()) { ?>
<script id="tpx_depositdetails_A200Count" class="depositdetailsadd" type="text/html">
<span id="el_depositdetails_A200Count">
<input type="text" data-table="depositdetails" data-field="x_A200Count" name="x_A200Count" id="x_A200Count" size="8" placeholder="<?php echo HtmlEncode($depositdetails->A200Count->getPlaceHolder()) ?>" value="<?php echo $depositdetails->A200Count->EditValue ?>"<?php echo $depositdetails->A200Count->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_depositdetails_A200Count" class="depositdetailsadd" type="text/html">
<span id="el_depositdetails_A200Count">
<span<?php echo $depositdetails->A200Count->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($depositdetails->A200Count->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="depositdetails" data-field="x_A200Count" name="x_A200Count" id="x_A200Count" value="<?php echo HtmlEncode($depositdetails->A200Count->FormValue) ?>">
<?php } ?>
<?php echo $depositdetails->A200Count->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($depositdetails->A200Amount->Visible) { // A200Amount ?>
	<div id="r_A200Amount" class="form-group row">
		<label id="elh_depositdetails_A200Amount" for="x_A200Amount" class="<?php echo $depositdetails_add->LeftColumnClass ?>"><script id="tpc_depositdetails_A200Amount" class="depositdetailsadd" type="text/html"><span><?php echo $depositdetails->A200Amount->caption() ?><?php echo ($depositdetails->A200Amount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $depositdetails_add->RightColumnClass ?>"><div<?php echo $depositdetails->A200Amount->cellAttributes() ?>>
<?php if (!$depositdetails->isConfirm()) { ?>
<script id="tpx_depositdetails_A200Amount" class="depositdetailsadd" type="text/html">
<span id="el_depositdetails_A200Amount">
<input type="text" data-table="depositdetails" data-field="x_A200Amount" name="x_A200Amount" id="x_A200Amount" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($depositdetails->A200Amount->getPlaceHolder()) ?>" value="<?php echo $depositdetails->A200Amount->EditValue ?>"<?php echo $depositdetails->A200Amount->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_depositdetails_A200Amount" class="depositdetailsadd" type="text/html">
<span id="el_depositdetails_A200Amount">
<span<?php echo $depositdetails->A200Amount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($depositdetails->A200Amount->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="depositdetails" data-field="x_A200Amount" name="x_A200Amount" id="x_A200Amount" value="<?php echo HtmlEncode($depositdetails->A200Amount->FormValue) ?>">
<?php } ?>
<?php echo $depositdetails->A200Amount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($depositdetails->A100Count->Visible) { // A100Count ?>
	<div id="r_A100Count" class="form-group row">
		<label id="elh_depositdetails_A100Count" for="x_A100Count" class="<?php echo $depositdetails_add->LeftColumnClass ?>"><script id="tpc_depositdetails_A100Count" class="depositdetailsadd" type="text/html"><span><?php echo $depositdetails->A100Count->caption() ?><?php echo ($depositdetails->A100Count->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $depositdetails_add->RightColumnClass ?>"><div<?php echo $depositdetails->A100Count->cellAttributes() ?>>
<?php if (!$depositdetails->isConfirm()) { ?>
<script id="tpx_depositdetails_A100Count" class="depositdetailsadd" type="text/html">
<span id="el_depositdetails_A100Count">
<input type="text" data-table="depositdetails" data-field="x_A100Count" name="x_A100Count" id="x_A100Count" size="8" placeholder="<?php echo HtmlEncode($depositdetails->A100Count->getPlaceHolder()) ?>" value="<?php echo $depositdetails->A100Count->EditValue ?>"<?php echo $depositdetails->A100Count->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_depositdetails_A100Count" class="depositdetailsadd" type="text/html">
<span id="el_depositdetails_A100Count">
<span<?php echo $depositdetails->A100Count->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($depositdetails->A100Count->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="depositdetails" data-field="x_A100Count" name="x_A100Count" id="x_A100Count" value="<?php echo HtmlEncode($depositdetails->A100Count->FormValue) ?>">
<?php } ?>
<?php echo $depositdetails->A100Count->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($depositdetails->A100Amount->Visible) { // A100Amount ?>
	<div id="r_A100Amount" class="form-group row">
		<label id="elh_depositdetails_A100Amount" for="x_A100Amount" class="<?php echo $depositdetails_add->LeftColumnClass ?>"><script id="tpc_depositdetails_A100Amount" class="depositdetailsadd" type="text/html"><span><?php echo $depositdetails->A100Amount->caption() ?><?php echo ($depositdetails->A100Amount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $depositdetails_add->RightColumnClass ?>"><div<?php echo $depositdetails->A100Amount->cellAttributes() ?>>
<?php if (!$depositdetails->isConfirm()) { ?>
<script id="tpx_depositdetails_A100Amount" class="depositdetailsadd" type="text/html">
<span id="el_depositdetails_A100Amount">
<input type="text" data-table="depositdetails" data-field="x_A100Amount" name="x_A100Amount" id="x_A100Amount" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($depositdetails->A100Amount->getPlaceHolder()) ?>" value="<?php echo $depositdetails->A100Amount->EditValue ?>"<?php echo $depositdetails->A100Amount->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_depositdetails_A100Amount" class="depositdetailsadd" type="text/html">
<span id="el_depositdetails_A100Amount">
<span<?php echo $depositdetails->A100Amount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($depositdetails->A100Amount->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="depositdetails" data-field="x_A100Amount" name="x_A100Amount" id="x_A100Amount" value="<?php echo HtmlEncode($depositdetails->A100Amount->FormValue) ?>">
<?php } ?>
<?php echo $depositdetails->A100Amount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($depositdetails->A50Count->Visible) { // A50Count ?>
	<div id="r_A50Count" class="form-group row">
		<label id="elh_depositdetails_A50Count" for="x_A50Count" class="<?php echo $depositdetails_add->LeftColumnClass ?>"><script id="tpc_depositdetails_A50Count" class="depositdetailsadd" type="text/html"><span><?php echo $depositdetails->A50Count->caption() ?><?php echo ($depositdetails->A50Count->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $depositdetails_add->RightColumnClass ?>"><div<?php echo $depositdetails->A50Count->cellAttributes() ?>>
<?php if (!$depositdetails->isConfirm()) { ?>
<script id="tpx_depositdetails_A50Count" class="depositdetailsadd" type="text/html">
<span id="el_depositdetails_A50Count">
<input type="text" data-table="depositdetails" data-field="x_A50Count" name="x_A50Count" id="x_A50Count" size="8" placeholder="<?php echo HtmlEncode($depositdetails->A50Count->getPlaceHolder()) ?>" value="<?php echo $depositdetails->A50Count->EditValue ?>"<?php echo $depositdetails->A50Count->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_depositdetails_A50Count" class="depositdetailsadd" type="text/html">
<span id="el_depositdetails_A50Count">
<span<?php echo $depositdetails->A50Count->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($depositdetails->A50Count->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="depositdetails" data-field="x_A50Count" name="x_A50Count" id="x_A50Count" value="<?php echo HtmlEncode($depositdetails->A50Count->FormValue) ?>">
<?php } ?>
<?php echo $depositdetails->A50Count->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($depositdetails->A50Amount->Visible) { // A50Amount ?>
	<div id="r_A50Amount" class="form-group row">
		<label id="elh_depositdetails_A50Amount" for="x_A50Amount" class="<?php echo $depositdetails_add->LeftColumnClass ?>"><script id="tpc_depositdetails_A50Amount" class="depositdetailsadd" type="text/html"><span><?php echo $depositdetails->A50Amount->caption() ?><?php echo ($depositdetails->A50Amount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $depositdetails_add->RightColumnClass ?>"><div<?php echo $depositdetails->A50Amount->cellAttributes() ?>>
<?php if (!$depositdetails->isConfirm()) { ?>
<script id="tpx_depositdetails_A50Amount" class="depositdetailsadd" type="text/html">
<span id="el_depositdetails_A50Amount">
<input type="text" data-table="depositdetails" data-field="x_A50Amount" name="x_A50Amount" id="x_A50Amount" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($depositdetails->A50Amount->getPlaceHolder()) ?>" value="<?php echo $depositdetails->A50Amount->EditValue ?>"<?php echo $depositdetails->A50Amount->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_depositdetails_A50Amount" class="depositdetailsadd" type="text/html">
<span id="el_depositdetails_A50Amount">
<span<?php echo $depositdetails->A50Amount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($depositdetails->A50Amount->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="depositdetails" data-field="x_A50Amount" name="x_A50Amount" id="x_A50Amount" value="<?php echo HtmlEncode($depositdetails->A50Amount->FormValue) ?>">
<?php } ?>
<?php echo $depositdetails->A50Amount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($depositdetails->A20Count->Visible) { // A20Count ?>
	<div id="r_A20Count" class="form-group row">
		<label id="elh_depositdetails_A20Count" for="x_A20Count" class="<?php echo $depositdetails_add->LeftColumnClass ?>"><script id="tpc_depositdetails_A20Count" class="depositdetailsadd" type="text/html"><span><?php echo $depositdetails->A20Count->caption() ?><?php echo ($depositdetails->A20Count->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $depositdetails_add->RightColumnClass ?>"><div<?php echo $depositdetails->A20Count->cellAttributes() ?>>
<?php if (!$depositdetails->isConfirm()) { ?>
<script id="tpx_depositdetails_A20Count" class="depositdetailsadd" type="text/html">
<span id="el_depositdetails_A20Count">
<input type="text" data-table="depositdetails" data-field="x_A20Count" name="x_A20Count" id="x_A20Count" size="8" placeholder="<?php echo HtmlEncode($depositdetails->A20Count->getPlaceHolder()) ?>" value="<?php echo $depositdetails->A20Count->EditValue ?>"<?php echo $depositdetails->A20Count->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_depositdetails_A20Count" class="depositdetailsadd" type="text/html">
<span id="el_depositdetails_A20Count">
<span<?php echo $depositdetails->A20Count->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($depositdetails->A20Count->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="depositdetails" data-field="x_A20Count" name="x_A20Count" id="x_A20Count" value="<?php echo HtmlEncode($depositdetails->A20Count->FormValue) ?>">
<?php } ?>
<?php echo $depositdetails->A20Count->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($depositdetails->A20Amount->Visible) { // A20Amount ?>
	<div id="r_A20Amount" class="form-group row">
		<label id="elh_depositdetails_A20Amount" for="x_A20Amount" class="<?php echo $depositdetails_add->LeftColumnClass ?>"><script id="tpc_depositdetails_A20Amount" class="depositdetailsadd" type="text/html"><span><?php echo $depositdetails->A20Amount->caption() ?><?php echo ($depositdetails->A20Amount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $depositdetails_add->RightColumnClass ?>"><div<?php echo $depositdetails->A20Amount->cellAttributes() ?>>
<?php if (!$depositdetails->isConfirm()) { ?>
<script id="tpx_depositdetails_A20Amount" class="depositdetailsadd" type="text/html">
<span id="el_depositdetails_A20Amount">
<input type="text" data-table="depositdetails" data-field="x_A20Amount" name="x_A20Amount" id="x_A20Amount" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($depositdetails->A20Amount->getPlaceHolder()) ?>" value="<?php echo $depositdetails->A20Amount->EditValue ?>"<?php echo $depositdetails->A20Amount->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_depositdetails_A20Amount" class="depositdetailsadd" type="text/html">
<span id="el_depositdetails_A20Amount">
<span<?php echo $depositdetails->A20Amount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($depositdetails->A20Amount->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="depositdetails" data-field="x_A20Amount" name="x_A20Amount" id="x_A20Amount" value="<?php echo HtmlEncode($depositdetails->A20Amount->FormValue) ?>">
<?php } ?>
<?php echo $depositdetails->A20Amount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($depositdetails->A10Count->Visible) { // A10Count ?>
	<div id="r_A10Count" class="form-group row">
		<label id="elh_depositdetails_A10Count" for="x_A10Count" class="<?php echo $depositdetails_add->LeftColumnClass ?>"><script id="tpc_depositdetails_A10Count" class="depositdetailsadd" type="text/html"><span><?php echo $depositdetails->A10Count->caption() ?><?php echo ($depositdetails->A10Count->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $depositdetails_add->RightColumnClass ?>"><div<?php echo $depositdetails->A10Count->cellAttributes() ?>>
<?php if (!$depositdetails->isConfirm()) { ?>
<script id="tpx_depositdetails_A10Count" class="depositdetailsadd" type="text/html">
<span id="el_depositdetails_A10Count">
<input type="text" data-table="depositdetails" data-field="x_A10Count" name="x_A10Count" id="x_A10Count" size="8" placeholder="<?php echo HtmlEncode($depositdetails->A10Count->getPlaceHolder()) ?>" value="<?php echo $depositdetails->A10Count->EditValue ?>"<?php echo $depositdetails->A10Count->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_depositdetails_A10Count" class="depositdetailsadd" type="text/html">
<span id="el_depositdetails_A10Count">
<span<?php echo $depositdetails->A10Count->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($depositdetails->A10Count->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="depositdetails" data-field="x_A10Count" name="x_A10Count" id="x_A10Count" value="<?php echo HtmlEncode($depositdetails->A10Count->FormValue) ?>">
<?php } ?>
<?php echo $depositdetails->A10Count->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($depositdetails->A10Amount->Visible) { // A10Amount ?>
	<div id="r_A10Amount" class="form-group row">
		<label id="elh_depositdetails_A10Amount" for="x_A10Amount" class="<?php echo $depositdetails_add->LeftColumnClass ?>"><script id="tpc_depositdetails_A10Amount" class="depositdetailsadd" type="text/html"><span><?php echo $depositdetails->A10Amount->caption() ?><?php echo ($depositdetails->A10Amount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $depositdetails_add->RightColumnClass ?>"><div<?php echo $depositdetails->A10Amount->cellAttributes() ?>>
<?php if (!$depositdetails->isConfirm()) { ?>
<script id="tpx_depositdetails_A10Amount" class="depositdetailsadd" type="text/html">
<span id="el_depositdetails_A10Amount">
<input type="text" data-table="depositdetails" data-field="x_A10Amount" name="x_A10Amount" id="x_A10Amount" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($depositdetails->A10Amount->getPlaceHolder()) ?>" value="<?php echo $depositdetails->A10Amount->EditValue ?>"<?php echo $depositdetails->A10Amount->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_depositdetails_A10Amount" class="depositdetailsadd" type="text/html">
<span id="el_depositdetails_A10Amount">
<span<?php echo $depositdetails->A10Amount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($depositdetails->A10Amount->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="depositdetails" data-field="x_A10Amount" name="x_A10Amount" id="x_A10Amount" value="<?php echo HtmlEncode($depositdetails->A10Amount->FormValue) ?>">
<?php } ?>
<?php echo $depositdetails->A10Amount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($depositdetails->BalanceAmount->Visible) { // BalanceAmount ?>
	<div id="r_BalanceAmount" class="form-group row">
		<label id="elh_depositdetails_BalanceAmount" for="x_BalanceAmount" class="<?php echo $depositdetails_add->LeftColumnClass ?>"><script id="tpc_depositdetails_BalanceAmount" class="depositdetailsadd" type="text/html"><span><?php echo $depositdetails->BalanceAmount->caption() ?><?php echo ($depositdetails->BalanceAmount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $depositdetails_add->RightColumnClass ?>"><div<?php echo $depositdetails->BalanceAmount->cellAttributes() ?>>
<?php if (!$depositdetails->isConfirm()) { ?>
<script id="tpx_depositdetails_BalanceAmount" class="depositdetailsadd" type="text/html">
<span id="el_depositdetails_BalanceAmount">
<input type="text" data-table="depositdetails" data-field="x_BalanceAmount" name="x_BalanceAmount" id="x_BalanceAmount" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($depositdetails->BalanceAmount->getPlaceHolder()) ?>" value="<?php echo $depositdetails->BalanceAmount->EditValue ?>"<?php echo $depositdetails->BalanceAmount->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_depositdetails_BalanceAmount" class="depositdetailsadd" type="text/html">
<span id="el_depositdetails_BalanceAmount">
<span<?php echo $depositdetails->BalanceAmount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($depositdetails->BalanceAmount->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="depositdetails" data-field="x_BalanceAmount" name="x_BalanceAmount" id="x_BalanceAmount" value="<?php echo HtmlEncode($depositdetails->BalanceAmount->FormValue) ?>">
<?php } ?>
<?php echo $depositdetails->BalanceAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($depositdetails->CashCollected->Visible) { // CashCollected ?>
	<div id="r_CashCollected" class="form-group row">
		<label id="elh_depositdetails_CashCollected" for="x_CashCollected" class="<?php echo $depositdetails_add->LeftColumnClass ?>"><script id="tpc_depositdetails_CashCollected" class="depositdetailsadd" type="text/html"><span><?php echo $depositdetails->CashCollected->caption() ?><?php echo ($depositdetails->CashCollected->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $depositdetails_add->RightColumnClass ?>"><div<?php echo $depositdetails->CashCollected->cellAttributes() ?>>
<?php if (!$depositdetails->isConfirm()) { ?>
<script id="tpx_depositdetails_CashCollected" class="depositdetailsadd" type="text/html">
<span id="el_depositdetails_CashCollected">
<input type="text" data-table="depositdetails" data-field="x_CashCollected" name="x_CashCollected" id="x_CashCollected" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($depositdetails->CashCollected->getPlaceHolder()) ?>" value="<?php echo $depositdetails->CashCollected->EditValue ?>"<?php echo $depositdetails->CashCollected->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_depositdetails_CashCollected" class="depositdetailsadd" type="text/html">
<span id="el_depositdetails_CashCollected">
<span<?php echo $depositdetails->CashCollected->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($depositdetails->CashCollected->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="depositdetails" data-field="x_CashCollected" name="x_CashCollected" id="x_CashCollected" value="<?php echo HtmlEncode($depositdetails->CashCollected->FormValue) ?>">
<?php } ?>
<?php echo $depositdetails->CashCollected->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($depositdetails->RTGS->Visible) { // RTGS ?>
	<div id="r_RTGS" class="form-group row">
		<label id="elh_depositdetails_RTGS" for="x_RTGS" class="<?php echo $depositdetails_add->LeftColumnClass ?>"><script id="tpc_depositdetails_RTGS" class="depositdetailsadd" type="text/html"><span><?php echo $depositdetails->RTGS->caption() ?><?php echo ($depositdetails->RTGS->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $depositdetails_add->RightColumnClass ?>"><div<?php echo $depositdetails->RTGS->cellAttributes() ?>>
<?php if (!$depositdetails->isConfirm()) { ?>
<script id="tpx_depositdetails_RTGS" class="depositdetailsadd" type="text/html">
<span id="el_depositdetails_RTGS">
<input type="text" data-table="depositdetails" data-field="x_RTGS" name="x_RTGS" id="x_RTGS" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($depositdetails->RTGS->getPlaceHolder()) ?>" value="<?php echo $depositdetails->RTGS->EditValue ?>"<?php echo $depositdetails->RTGS->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_depositdetails_RTGS" class="depositdetailsadd" type="text/html">
<span id="el_depositdetails_RTGS">
<span<?php echo $depositdetails->RTGS->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($depositdetails->RTGS->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="depositdetails" data-field="x_RTGS" name="x_RTGS" id="x_RTGS" value="<?php echo HtmlEncode($depositdetails->RTGS->FormValue) ?>">
<?php } ?>
<?php echo $depositdetails->RTGS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($depositdetails->PAYTM->Visible) { // PAYTM ?>
	<div id="r_PAYTM" class="form-group row">
		<label id="elh_depositdetails_PAYTM" for="x_PAYTM" class="<?php echo $depositdetails_add->LeftColumnClass ?>"><script id="tpc_depositdetails_PAYTM" class="depositdetailsadd" type="text/html"><span><?php echo $depositdetails->PAYTM->caption() ?><?php echo ($depositdetails->PAYTM->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $depositdetails_add->RightColumnClass ?>"><div<?php echo $depositdetails->PAYTM->cellAttributes() ?>>
<?php if (!$depositdetails->isConfirm()) { ?>
<script id="tpx_depositdetails_PAYTM" class="depositdetailsadd" type="text/html">
<span id="el_depositdetails_PAYTM">
<input type="text" data-table="depositdetails" data-field="x_PAYTM" name="x_PAYTM" id="x_PAYTM" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($depositdetails->PAYTM->getPlaceHolder()) ?>" value="<?php echo $depositdetails->PAYTM->EditValue ?>"<?php echo $depositdetails->PAYTM->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_depositdetails_PAYTM" class="depositdetailsadd" type="text/html">
<span id="el_depositdetails_PAYTM">
<span<?php echo $depositdetails->PAYTM->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($depositdetails->PAYTM->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="depositdetails" data-field="x_PAYTM" name="x_PAYTM" id="x_PAYTM" value="<?php echo HtmlEncode($depositdetails->PAYTM->FormValue) ?>">
<?php } ?>
<?php echo $depositdetails->PAYTM->CustomMsg ?></div></div>
	</div>
<?php } ?>
	<?php if (!$depositdetails->isConfirm()) { ?>
	<?php } else { ?>
	<script id="tpx_depositdetails_HospID" class="depositdetailsadd" type="text/html">
	<span id="el_depositdetails_HospID">
	<span<?php echo $depositdetails->HospID->viewAttributes() ?>>
	<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($depositdetails->HospID->ViewValue) ?>"></span>
	</span>
	</script>
	<input type="hidden" data-table="depositdetails" data-field="x_HospID" name="x_HospID" id="x_HospID" value="<?php echo HtmlEncode($depositdetails->HospID->FormValue) ?>">
	<?php } ?>
<?php if ($depositdetails->ManualCash->Visible) { // ManualCash ?>
	<div id="r_ManualCash" class="form-group row">
		<label id="elh_depositdetails_ManualCash" for="x_ManualCash" class="<?php echo $depositdetails_add->LeftColumnClass ?>"><script id="tpc_depositdetails_ManualCash" class="depositdetailsadd" type="text/html"><span><?php echo $depositdetails->ManualCash->caption() ?><?php echo ($depositdetails->ManualCash->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $depositdetails_add->RightColumnClass ?>"><div<?php echo $depositdetails->ManualCash->cellAttributes() ?>>
<?php if (!$depositdetails->isConfirm()) { ?>
<script id="tpx_depositdetails_ManualCash" class="depositdetailsadd" type="text/html">
<span id="el_depositdetails_ManualCash">
<input type="text" data-table="depositdetails" data-field="x_ManualCash" name="x_ManualCash" id="x_ManualCash" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($depositdetails->ManualCash->getPlaceHolder()) ?>" value="<?php echo $depositdetails->ManualCash->EditValue ?>"<?php echo $depositdetails->ManualCash->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_depositdetails_ManualCash" class="depositdetailsadd" type="text/html">
<span id="el_depositdetails_ManualCash">
<span<?php echo $depositdetails->ManualCash->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($depositdetails->ManualCash->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="depositdetails" data-field="x_ManualCash" name="x_ManualCash" id="x_ManualCash" value="<?php echo HtmlEncode($depositdetails->ManualCash->FormValue) ?>">
<?php } ?>
<?php echo $depositdetails->ManualCash->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($depositdetails->ManualCard->Visible) { // ManualCard ?>
	<div id="r_ManualCard" class="form-group row">
		<label id="elh_depositdetails_ManualCard" for="x_ManualCard" class="<?php echo $depositdetails_add->LeftColumnClass ?>"><script id="tpc_depositdetails_ManualCard" class="depositdetailsadd" type="text/html"><span><?php echo $depositdetails->ManualCard->caption() ?><?php echo ($depositdetails->ManualCard->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $depositdetails_add->RightColumnClass ?>"><div<?php echo $depositdetails->ManualCard->cellAttributes() ?>>
<?php if (!$depositdetails->isConfirm()) { ?>
<script id="tpx_depositdetails_ManualCard" class="depositdetailsadd" type="text/html">
<span id="el_depositdetails_ManualCard">
<input type="text" data-table="depositdetails" data-field="x_ManualCard" name="x_ManualCard" id="x_ManualCard" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($depositdetails->ManualCard->getPlaceHolder()) ?>" value="<?php echo $depositdetails->ManualCard->EditValue ?>"<?php echo $depositdetails->ManualCard->editAttributes() ?>>
</span>
</script>
<?php } else { ?>
<script id="tpx_depositdetails_ManualCard" class="depositdetailsadd" type="text/html">
<span id="el_depositdetails_ManualCard">
<span<?php echo $depositdetails->ManualCard->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($depositdetails->ManualCard->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="depositdetails" data-field="x_ManualCard" name="x_ManualCard" id="x_ManualCard" value="<?php echo HtmlEncode($depositdetails->ManualCard->FormValue) ?>">
<?php } ?>
<?php echo $depositdetails->ManualCard->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_depositdetailsadd" class="ew-custom-template"></div>
<script id="tpm_depositdetailsadd" type="text/html">
<div id="ct_depositdetails_add"><style>
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
<?php if (!$depositdetails_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $depositdetails_add->OffsetColumnClass ?>"><!-- buttons offset -->
<?php if (!$depositdetails->isConfirm()) { // Confirm page ?>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit" onclick="this.form.action.value='confirm';"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $depositdetails_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
<?php } else { ?>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("ConfirmBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="submit" onclick="this.form.action.value='cancel';"><?php echo $Language->phrase("CancelBtn") ?></button>
<?php } ?>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($depositdetails->Rows) ?> };
ew.applyTemplate("tpd_depositdetailsadd", "tpm_depositdetailsadd", "depositdetailsadd", "<?php echo $depositdetails->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.depositdetailsadd_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$depositdetails_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

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
<?php include_once "footer.php" ?>
<?php
$depositdetails_add->terminate();
?>