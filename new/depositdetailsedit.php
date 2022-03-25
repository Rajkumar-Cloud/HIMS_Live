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
$depositdetails_edit = new depositdetails_edit();

// Run the page
$depositdetails_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$depositdetails_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fdepositdetailsedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fdepositdetailsedit = currentForm = new ew.Form("fdepositdetailsedit", "edit");

	// Validate form
	fdepositdetailsedit.validate = function() {
		if (!this.validateRequired)
			return true; // Ignore validation
		var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
		if ($fobj.find("#confirm").val() == "confirm")
			return true;
		var elm, felm, uelm, addcnt = 0;
		var $k = $fobj.find("#" + this.formKeyCountName); // Get key_count
		var rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1;
		var startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
		var gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
		for (var i = startcnt; i <= rowcnt; i++) {
			var infix = ($k[0]) ? String(i) : "";
			$fobj.data("rowindex", infix);
			<?php if ($depositdetails_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails_edit->id->caption(), $depositdetails_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($depositdetails_edit->DepositDate->Required) { ?>
				elm = this.getElements("x" + infix + "_DepositDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails_edit->DepositDate->caption(), $depositdetails_edit->DepositDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DepositDate");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($depositdetails_edit->DepositDate->errorMessage()) ?>");
			<?php if ($depositdetails_edit->DepositToBankSelect->Required) { ?>
				elm = this.getElements("x" + infix + "_DepositToBankSelect");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails_edit->DepositToBankSelect->caption(), $depositdetails_edit->DepositToBankSelect->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($depositdetails_edit->DepositToBank->Required) { ?>
				elm = this.getElements("x" + infix + "_DepositToBank");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails_edit->DepositToBank->caption(), $depositdetails_edit->DepositToBank->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($depositdetails_edit->TransferToSelect->Required) { ?>
				elm = this.getElements("x" + infix + "_TransferToSelect");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails_edit->TransferToSelect->caption(), $depositdetails_edit->TransferToSelect->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($depositdetails_edit->TransferTo->Required) { ?>
				elm = this.getElements("x" + infix + "_TransferTo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails_edit->TransferTo->caption(), $depositdetails_edit->TransferTo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($depositdetails_edit->OpeningBalance->Required) { ?>
				elm = this.getElements("x" + infix + "_OpeningBalance");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails_edit->OpeningBalance->caption(), $depositdetails_edit->OpeningBalance->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($depositdetails_edit->Other->Required) { ?>
				elm = this.getElements("x" + infix + "_Other");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails_edit->Other->caption(), $depositdetails_edit->Other->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($depositdetails_edit->TotalCash->Required) { ?>
				elm = this.getElements("x" + infix + "_TotalCash");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails_edit->TotalCash->caption(), $depositdetails_edit->TotalCash->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($depositdetails_edit->Cheque->Required) { ?>
				elm = this.getElements("x" + infix + "_Cheque");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails_edit->Cheque->caption(), $depositdetails_edit->Cheque->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($depositdetails_edit->Card->Required) { ?>
				elm = this.getElements("x" + infix + "_Card");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails_edit->Card->caption(), $depositdetails_edit->Card->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($depositdetails_edit->NEFTRTGS->Required) { ?>
				elm = this.getElements("x" + infix + "_NEFTRTGS");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails_edit->NEFTRTGS->caption(), $depositdetails_edit->NEFTRTGS->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($depositdetails_edit->TotalTransferDepositAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_TotalTransferDepositAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails_edit->TotalTransferDepositAmount->caption(), $depositdetails_edit->TotalTransferDepositAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($depositdetails_edit->CreatedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_CreatedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails_edit->CreatedBy->caption(), $depositdetails_edit->CreatedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($depositdetails_edit->CreatedDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_CreatedDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails_edit->CreatedDateTime->caption(), $depositdetails_edit->CreatedDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($depositdetails_edit->ModifiedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_ModifiedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails_edit->ModifiedBy->caption(), $depositdetails_edit->ModifiedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($depositdetails_edit->ModifiedDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_ModifiedDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails_edit->ModifiedDateTime->caption(), $depositdetails_edit->ModifiedDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($depositdetails_edit->CreatedUserName->Required) { ?>
				elm = this.getElements("x" + infix + "_CreatedUserName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails_edit->CreatedUserName->caption(), $depositdetails_edit->CreatedUserName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($depositdetails_edit->ModifiedUserName->Required) { ?>
				elm = this.getElements("x" + infix + "_ModifiedUserName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails_edit->ModifiedUserName->caption(), $depositdetails_edit->ModifiedUserName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($depositdetails_edit->A2000Count->Required) { ?>
				elm = this.getElements("x" + infix + "_A2000Count");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails_edit->A2000Count->caption(), $depositdetails_edit->A2000Count->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_A2000Count");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($depositdetails_edit->A2000Count->errorMessage()) ?>");
			<?php if ($depositdetails_edit->A2000Amount->Required) { ?>
				elm = this.getElements("x" + infix + "_A2000Amount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails_edit->A2000Amount->caption(), $depositdetails_edit->A2000Amount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_A2000Amount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($depositdetails_edit->A2000Amount->errorMessage()) ?>");
			<?php if ($depositdetails_edit->A1000Count->Required) { ?>
				elm = this.getElements("x" + infix + "_A1000Count");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails_edit->A1000Count->caption(), $depositdetails_edit->A1000Count->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_A1000Count");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($depositdetails_edit->A1000Count->errorMessage()) ?>");
			<?php if ($depositdetails_edit->A1000Amount->Required) { ?>
				elm = this.getElements("x" + infix + "_A1000Amount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails_edit->A1000Amount->caption(), $depositdetails_edit->A1000Amount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_A1000Amount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($depositdetails_edit->A1000Amount->errorMessage()) ?>");
			<?php if ($depositdetails_edit->A500Count->Required) { ?>
				elm = this.getElements("x" + infix + "_A500Count");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails_edit->A500Count->caption(), $depositdetails_edit->A500Count->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_A500Count");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($depositdetails_edit->A500Count->errorMessage()) ?>");
			<?php if ($depositdetails_edit->A500Amount->Required) { ?>
				elm = this.getElements("x" + infix + "_A500Amount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails_edit->A500Amount->caption(), $depositdetails_edit->A500Amount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_A500Amount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($depositdetails_edit->A500Amount->errorMessage()) ?>");
			<?php if ($depositdetails_edit->A200Count->Required) { ?>
				elm = this.getElements("x" + infix + "_A200Count");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails_edit->A200Count->caption(), $depositdetails_edit->A200Count->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_A200Count");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($depositdetails_edit->A200Count->errorMessage()) ?>");
			<?php if ($depositdetails_edit->A200Amount->Required) { ?>
				elm = this.getElements("x" + infix + "_A200Amount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails_edit->A200Amount->caption(), $depositdetails_edit->A200Amount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_A200Amount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($depositdetails_edit->A200Amount->errorMessage()) ?>");
			<?php if ($depositdetails_edit->A100Count->Required) { ?>
				elm = this.getElements("x" + infix + "_A100Count");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails_edit->A100Count->caption(), $depositdetails_edit->A100Count->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_A100Count");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($depositdetails_edit->A100Count->errorMessage()) ?>");
			<?php if ($depositdetails_edit->A100Amount->Required) { ?>
				elm = this.getElements("x" + infix + "_A100Amount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails_edit->A100Amount->caption(), $depositdetails_edit->A100Amount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_A100Amount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($depositdetails_edit->A100Amount->errorMessage()) ?>");
			<?php if ($depositdetails_edit->A50Count->Required) { ?>
				elm = this.getElements("x" + infix + "_A50Count");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails_edit->A50Count->caption(), $depositdetails_edit->A50Count->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_A50Count");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($depositdetails_edit->A50Count->errorMessage()) ?>");
			<?php if ($depositdetails_edit->A50Amount->Required) { ?>
				elm = this.getElements("x" + infix + "_A50Amount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails_edit->A50Amount->caption(), $depositdetails_edit->A50Amount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_A50Amount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($depositdetails_edit->A50Amount->errorMessage()) ?>");
			<?php if ($depositdetails_edit->A20Count->Required) { ?>
				elm = this.getElements("x" + infix + "_A20Count");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails_edit->A20Count->caption(), $depositdetails_edit->A20Count->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_A20Count");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($depositdetails_edit->A20Count->errorMessage()) ?>");
			<?php if ($depositdetails_edit->A20Amount->Required) { ?>
				elm = this.getElements("x" + infix + "_A20Amount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails_edit->A20Amount->caption(), $depositdetails_edit->A20Amount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_A20Amount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($depositdetails_edit->A20Amount->errorMessage()) ?>");
			<?php if ($depositdetails_edit->A10Count->Required) { ?>
				elm = this.getElements("x" + infix + "_A10Count");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails_edit->A10Count->caption(), $depositdetails_edit->A10Count->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_A10Count");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($depositdetails_edit->A10Count->errorMessage()) ?>");
			<?php if ($depositdetails_edit->A10Amount->Required) { ?>
				elm = this.getElements("x" + infix + "_A10Amount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails_edit->A10Amount->caption(), $depositdetails_edit->A10Amount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_A10Amount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($depositdetails_edit->A10Amount->errorMessage()) ?>");
			<?php if ($depositdetails_edit->BalanceAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_BalanceAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails_edit->BalanceAmount->caption(), $depositdetails_edit->BalanceAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BalanceAmount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($depositdetails_edit->BalanceAmount->errorMessage()) ?>");
			<?php if ($depositdetails_edit->CashCollected->Required) { ?>
				elm = this.getElements("x" + infix + "_CashCollected");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails_edit->CashCollected->caption(), $depositdetails_edit->CashCollected->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_CashCollected");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($depositdetails_edit->CashCollected->errorMessage()) ?>");
			<?php if ($depositdetails_edit->RTGS->Required) { ?>
				elm = this.getElements("x" + infix + "_RTGS");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails_edit->RTGS->caption(), $depositdetails_edit->RTGS->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RTGS");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($depositdetails_edit->RTGS->errorMessage()) ?>");
			<?php if ($depositdetails_edit->PAYTM->Required) { ?>
				elm = this.getElements("x" + infix + "_PAYTM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails_edit->PAYTM->caption(), $depositdetails_edit->PAYTM->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PAYTM");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($depositdetails_edit->PAYTM->errorMessage()) ?>");
			<?php if ($depositdetails_edit->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $depositdetails_edit->HospID->caption(), $depositdetails_edit->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
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

	// Form_CustomValidate
	fdepositdetailsedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fdepositdetailsedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fdepositdetailsedit.lists["x_DepositToBankSelect"] = <?php echo $depositdetails_edit->DepositToBankSelect->Lookup->toClientList($depositdetails_edit) ?>;
	fdepositdetailsedit.lists["x_DepositToBankSelect"].options = <?php echo JsonEncode($depositdetails_edit->DepositToBankSelect->options(FALSE, TRUE)) ?>;
	fdepositdetailsedit.lists["x_DepositToBank"] = <?php echo $depositdetails_edit->DepositToBank->Lookup->toClientList($depositdetails_edit) ?>;
	fdepositdetailsedit.lists["x_DepositToBank"].options = <?php echo JsonEncode($depositdetails_edit->DepositToBank->lookupOptions()) ?>;
	fdepositdetailsedit.lists["x_TransferTo"] = <?php echo $depositdetails_edit->TransferTo->Lookup->toClientList($depositdetails_edit) ?>;
	fdepositdetailsedit.lists["x_TransferTo"].options = <?php echo JsonEncode($depositdetails_edit->TransferTo->lookupOptions()) ?>;
	loadjs.done("fdepositdetailsedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $depositdetails_edit->showPageHeader(); ?>
<?php
$depositdetails_edit->showMessage();
?>
<form name="fdepositdetailsedit" id="fdepositdetailsedit" class="<?php echo $depositdetails_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="depositdetails">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$depositdetails_edit->IsModal ?>">
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($depositdetails_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_depositdetails_id" class="<?php echo $depositdetails_edit->LeftColumnClass ?>"><script id="tpc_depositdetails_id" type="text/html"><?php echo $depositdetails_edit->id->caption() ?><?php echo $depositdetails_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $depositdetails_edit->RightColumnClass ?>"><div <?php echo $depositdetails_edit->id->cellAttributes() ?>>
<script id="tpx_depositdetails_id" type="text/html"><span id="el_depositdetails_id">
<span<?php echo $depositdetails_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($depositdetails_edit->id->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="depositdetails" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($depositdetails_edit->id->CurrentValue) ?>">
<?php echo $depositdetails_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($depositdetails_edit->DepositDate->Visible) { // DepositDate ?>
	<div id="r_DepositDate" class="form-group row">
		<label id="elh_depositdetails_DepositDate" for="x_DepositDate" class="<?php echo $depositdetails_edit->LeftColumnClass ?>"><script id="tpc_depositdetails_DepositDate" type="text/html"><?php echo $depositdetails_edit->DepositDate->caption() ?><?php echo $depositdetails_edit->DepositDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $depositdetails_edit->RightColumnClass ?>"><div <?php echo $depositdetails_edit->DepositDate->cellAttributes() ?>>
<script id="tpx_depositdetails_DepositDate" type="text/html"><span id="el_depositdetails_DepositDate">
<input type="text" data-table="depositdetails" data-field="x_DepositDate" data-format="7" name="x_DepositDate" id="x_DepositDate" placeholder="<?php echo HtmlEncode($depositdetails_edit->DepositDate->getPlaceHolder()) ?>" value="<?php echo $depositdetails_edit->DepositDate->EditValue ?>"<?php echo $depositdetails_edit->DepositDate->editAttributes() ?>>
<?php if (!$depositdetails_edit->DepositDate->ReadOnly && !$depositdetails_edit->DepositDate->Disabled && !isset($depositdetails_edit->DepositDate->EditAttrs["readonly"]) && !isset($depositdetails_edit->DepositDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="depositdetailsedit_js">
loadjs.ready(["fdepositdetailsedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fdepositdetailsedit", "x_DepositDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php echo $depositdetails_edit->DepositDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($depositdetails_edit->DepositToBankSelect->Visible) { // DepositToBankSelect ?>
	<div id="r_DepositToBankSelect" class="form-group row">
		<label id="elh_depositdetails_DepositToBankSelect" class="<?php echo $depositdetails_edit->LeftColumnClass ?>"><script id="tpc_depositdetails_DepositToBankSelect" type="text/html"><?php echo $depositdetails_edit->DepositToBankSelect->caption() ?><?php echo $depositdetails_edit->DepositToBankSelect->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $depositdetails_edit->RightColumnClass ?>"><div <?php echo $depositdetails_edit->DepositToBankSelect->cellAttributes() ?>>
<script id="tpx_depositdetails_DepositToBankSelect" type="text/html"><span id="el_depositdetails_DepositToBankSelect">
<div id="tp_x_DepositToBankSelect" class="ew-template"><input type="radio" class="custom-control-input" data-table="depositdetails" data-field="x_DepositToBankSelect" data-value-separator="<?php echo $depositdetails_edit->DepositToBankSelect->displayValueSeparatorAttribute() ?>" name="x_DepositToBankSelect" id="x_DepositToBankSelect" value="{value}"<?php echo $depositdetails_edit->DepositToBankSelect->editAttributes() ?>></div>
<div id="dsl_x_DepositToBankSelect" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $depositdetails_edit->DepositToBankSelect->radioButtonListHtml(FALSE, "x_DepositToBankSelect") ?>
</div></div>
</span></script>
<?php echo $depositdetails_edit->DepositToBankSelect->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($depositdetails_edit->DepositToBank->Visible) { // DepositToBank ?>
	<div id="r_DepositToBank" class="form-group row">
		<label id="elh_depositdetails_DepositToBank" for="x_DepositToBank" class="<?php echo $depositdetails_edit->LeftColumnClass ?>"><script id="tpc_depositdetails_DepositToBank" type="text/html"><?php echo $depositdetails_edit->DepositToBank->caption() ?><?php echo $depositdetails_edit->DepositToBank->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $depositdetails_edit->RightColumnClass ?>"><div <?php echo $depositdetails_edit->DepositToBank->cellAttributes() ?>>
<script id="tpx_depositdetails_DepositToBank" type="text/html"><span id="el_depositdetails_DepositToBank">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="depositdetails" data-field="x_DepositToBank" data-value-separator="<?php echo $depositdetails_edit->DepositToBank->displayValueSeparatorAttribute() ?>" id="x_DepositToBank" name="x_DepositToBank"<?php echo $depositdetails_edit->DepositToBank->editAttributes() ?>>
			<?php echo $depositdetails_edit->DepositToBank->selectOptionListHtml("x_DepositToBank") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "bankbranches") && !$depositdetails_edit->DepositToBank->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_DepositToBank" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $depositdetails_edit->DepositToBank->caption() ?>" data-title="<?php echo $depositdetails_edit->DepositToBank->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_DepositToBank',url:'bankbranchesaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $depositdetails_edit->DepositToBank->Lookup->getParamTag($depositdetails_edit, "p_x_DepositToBank") ?>
</span></script>
<?php echo $depositdetails_edit->DepositToBank->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($depositdetails_edit->TransferToSelect->Visible) { // TransferToSelect ?>
	<div id="r_TransferToSelect" class="form-group row">
		<label id="elh_depositdetails_TransferToSelect" for="x_TransferToSelect" class="<?php echo $depositdetails_edit->LeftColumnClass ?>"><script id="tpc_depositdetails_TransferToSelect" type="text/html"><?php echo $depositdetails_edit->TransferToSelect->caption() ?><?php echo $depositdetails_edit->TransferToSelect->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $depositdetails_edit->RightColumnClass ?>"><div <?php echo $depositdetails_edit->TransferToSelect->cellAttributes() ?>>
<script id="tpx_depositdetails_TransferToSelect" type="text/html"><span id="el_depositdetails_TransferToSelect">
<input type="text" data-table="depositdetails" data-field="x_TransferToSelect" name="x_TransferToSelect" id="x_TransferToSelect" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($depositdetails_edit->TransferToSelect->getPlaceHolder()) ?>" value="<?php echo $depositdetails_edit->TransferToSelect->EditValue ?>"<?php echo $depositdetails_edit->TransferToSelect->editAttributes() ?>>
</span></script>
<?php echo $depositdetails_edit->TransferToSelect->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($depositdetails_edit->TransferTo->Visible) { // TransferTo ?>
	<div id="r_TransferTo" class="form-group row">
		<label id="elh_depositdetails_TransferTo" for="x_TransferTo" class="<?php echo $depositdetails_edit->LeftColumnClass ?>"><script id="tpc_depositdetails_TransferTo" type="text/html"><?php echo $depositdetails_edit->TransferTo->caption() ?><?php echo $depositdetails_edit->TransferTo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $depositdetails_edit->RightColumnClass ?>"><div <?php echo $depositdetails_edit->TransferTo->cellAttributes() ?>>
<script id="tpx_depositdetails_TransferTo" type="text/html"><span id="el_depositdetails_TransferTo">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="depositdetails" data-field="x_TransferTo" data-value-separator="<?php echo $depositdetails_edit->TransferTo->displayValueSeparatorAttribute() ?>" id="x_TransferTo" name="x_TransferTo"<?php echo $depositdetails_edit->TransferTo->editAttributes() ?>>
			<?php echo $depositdetails_edit->TransferTo->selectOptionListHtml("x_TransferTo") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "banktransferto") && !$depositdetails_edit->TransferTo->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TransferTo" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $depositdetails_edit->TransferTo->caption() ?>" data-title="<?php echo $depositdetails_edit->TransferTo->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TransferTo',url:'banktransfertoaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $depositdetails_edit->TransferTo->Lookup->getParamTag($depositdetails_edit, "p_x_TransferTo") ?>
</span></script>
<?php echo $depositdetails_edit->TransferTo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($depositdetails_edit->OpeningBalance->Visible) { // OpeningBalance ?>
	<div id="r_OpeningBalance" class="form-group row">
		<label id="elh_depositdetails_OpeningBalance" for="x_OpeningBalance" class="<?php echo $depositdetails_edit->LeftColumnClass ?>"><script id="tpc_depositdetails_OpeningBalance" type="text/html"><?php echo $depositdetails_edit->OpeningBalance->caption() ?><?php echo $depositdetails_edit->OpeningBalance->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $depositdetails_edit->RightColumnClass ?>"><div <?php echo $depositdetails_edit->OpeningBalance->cellAttributes() ?>>
<script id="tpx_depositdetails_OpeningBalance" type="text/html"><span id="el_depositdetails_OpeningBalance">
<input type="text" data-table="depositdetails" data-field="x_OpeningBalance" name="x_OpeningBalance" id="x_OpeningBalance" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($depositdetails_edit->OpeningBalance->getPlaceHolder()) ?>" value="<?php echo $depositdetails_edit->OpeningBalance->EditValue ?>"<?php echo $depositdetails_edit->OpeningBalance->editAttributes() ?>>
</span></script>
<?php echo $depositdetails_edit->OpeningBalance->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($depositdetails_edit->Other->Visible) { // Other ?>
	<div id="r_Other" class="form-group row">
		<label id="elh_depositdetails_Other" for="x_Other" class="<?php echo $depositdetails_edit->LeftColumnClass ?>"><script id="tpc_depositdetails_Other" type="text/html"><?php echo $depositdetails_edit->Other->caption() ?><?php echo $depositdetails_edit->Other->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $depositdetails_edit->RightColumnClass ?>"><div <?php echo $depositdetails_edit->Other->cellAttributes() ?>>
<script id="tpx_depositdetails_Other" type="text/html"><span id="el_depositdetails_Other">
<input type="text" data-table="depositdetails" data-field="x_Other" name="x_Other" id="x_Other" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($depositdetails_edit->Other->getPlaceHolder()) ?>" value="<?php echo $depositdetails_edit->Other->EditValue ?>"<?php echo $depositdetails_edit->Other->editAttributes() ?>>
</span></script>
<?php echo $depositdetails_edit->Other->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($depositdetails_edit->TotalCash->Visible) { // TotalCash ?>
	<div id="r_TotalCash" class="form-group row">
		<label id="elh_depositdetails_TotalCash" for="x_TotalCash" class="<?php echo $depositdetails_edit->LeftColumnClass ?>"><script id="tpc_depositdetails_TotalCash" type="text/html"><?php echo $depositdetails_edit->TotalCash->caption() ?><?php echo $depositdetails_edit->TotalCash->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $depositdetails_edit->RightColumnClass ?>"><div <?php echo $depositdetails_edit->TotalCash->cellAttributes() ?>>
<script id="tpx_depositdetails_TotalCash" type="text/html"><span id="el_depositdetails_TotalCash">
<input type="text" data-table="depositdetails" data-field="x_TotalCash" name="x_TotalCash" id="x_TotalCash" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($depositdetails_edit->TotalCash->getPlaceHolder()) ?>" value="<?php echo $depositdetails_edit->TotalCash->EditValue ?>"<?php echo $depositdetails_edit->TotalCash->editAttributes() ?>>
</span></script>
<?php echo $depositdetails_edit->TotalCash->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($depositdetails_edit->Cheque->Visible) { // Cheque ?>
	<div id="r_Cheque" class="form-group row">
		<label id="elh_depositdetails_Cheque" for="x_Cheque" class="<?php echo $depositdetails_edit->LeftColumnClass ?>"><script id="tpc_depositdetails_Cheque" type="text/html"><?php echo $depositdetails_edit->Cheque->caption() ?><?php echo $depositdetails_edit->Cheque->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $depositdetails_edit->RightColumnClass ?>"><div <?php echo $depositdetails_edit->Cheque->cellAttributes() ?>>
<script id="tpx_depositdetails_Cheque" type="text/html"><span id="el_depositdetails_Cheque">
<input type="text" data-table="depositdetails" data-field="x_Cheque" name="x_Cheque" id="x_Cheque" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($depositdetails_edit->Cheque->getPlaceHolder()) ?>" value="<?php echo $depositdetails_edit->Cheque->EditValue ?>"<?php echo $depositdetails_edit->Cheque->editAttributes() ?>>
</span></script>
<?php echo $depositdetails_edit->Cheque->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($depositdetails_edit->Card->Visible) { // Card ?>
	<div id="r_Card" class="form-group row">
		<label id="elh_depositdetails_Card" for="x_Card" class="<?php echo $depositdetails_edit->LeftColumnClass ?>"><script id="tpc_depositdetails_Card" type="text/html"><?php echo $depositdetails_edit->Card->caption() ?><?php echo $depositdetails_edit->Card->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $depositdetails_edit->RightColumnClass ?>"><div <?php echo $depositdetails_edit->Card->cellAttributes() ?>>
<script id="tpx_depositdetails_Card" type="text/html"><span id="el_depositdetails_Card">
<input type="text" data-table="depositdetails" data-field="x_Card" name="x_Card" id="x_Card" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($depositdetails_edit->Card->getPlaceHolder()) ?>" value="<?php echo $depositdetails_edit->Card->EditValue ?>"<?php echo $depositdetails_edit->Card->editAttributes() ?>>
</span></script>
<?php echo $depositdetails_edit->Card->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($depositdetails_edit->NEFTRTGS->Visible) { // NEFTRTGS ?>
	<div id="r_NEFTRTGS" class="form-group row">
		<label id="elh_depositdetails_NEFTRTGS" for="x_NEFTRTGS" class="<?php echo $depositdetails_edit->LeftColumnClass ?>"><script id="tpc_depositdetails_NEFTRTGS" type="text/html"><?php echo $depositdetails_edit->NEFTRTGS->caption() ?><?php echo $depositdetails_edit->NEFTRTGS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $depositdetails_edit->RightColumnClass ?>"><div <?php echo $depositdetails_edit->NEFTRTGS->cellAttributes() ?>>
<script id="tpx_depositdetails_NEFTRTGS" type="text/html"><span id="el_depositdetails_NEFTRTGS">
<input type="text" data-table="depositdetails" data-field="x_NEFTRTGS" name="x_NEFTRTGS" id="x_NEFTRTGS" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($depositdetails_edit->NEFTRTGS->getPlaceHolder()) ?>" value="<?php echo $depositdetails_edit->NEFTRTGS->EditValue ?>"<?php echo $depositdetails_edit->NEFTRTGS->editAttributes() ?>>
</span></script>
<?php echo $depositdetails_edit->NEFTRTGS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($depositdetails_edit->TotalTransferDepositAmount->Visible) { // TotalTransferDepositAmount ?>
	<div id="r_TotalTransferDepositAmount" class="form-group row">
		<label id="elh_depositdetails_TotalTransferDepositAmount" for="x_TotalTransferDepositAmount" class="<?php echo $depositdetails_edit->LeftColumnClass ?>"><script id="tpc_depositdetails_TotalTransferDepositAmount" type="text/html"><?php echo $depositdetails_edit->TotalTransferDepositAmount->caption() ?><?php echo $depositdetails_edit->TotalTransferDepositAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $depositdetails_edit->RightColumnClass ?>"><div <?php echo $depositdetails_edit->TotalTransferDepositAmount->cellAttributes() ?>>
<script id="tpx_depositdetails_TotalTransferDepositAmount" type="text/html"><span id="el_depositdetails_TotalTransferDepositAmount">
<input type="text" data-table="depositdetails" data-field="x_TotalTransferDepositAmount" name="x_TotalTransferDepositAmount" id="x_TotalTransferDepositAmount" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($depositdetails_edit->TotalTransferDepositAmount->getPlaceHolder()) ?>" value="<?php echo $depositdetails_edit->TotalTransferDepositAmount->EditValue ?>"<?php echo $depositdetails_edit->TotalTransferDepositAmount->editAttributes() ?>>
</span></script>
<?php echo $depositdetails_edit->TotalTransferDepositAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($depositdetails_edit->A2000Count->Visible) { // A2000Count ?>
	<div id="r_A2000Count" class="form-group row">
		<label id="elh_depositdetails_A2000Count" for="x_A2000Count" class="<?php echo $depositdetails_edit->LeftColumnClass ?>"><script id="tpc_depositdetails_A2000Count" type="text/html"><?php echo $depositdetails_edit->A2000Count->caption() ?><?php echo $depositdetails_edit->A2000Count->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $depositdetails_edit->RightColumnClass ?>"><div <?php echo $depositdetails_edit->A2000Count->cellAttributes() ?>>
<script id="tpx_depositdetails_A2000Count" type="text/html"><span id="el_depositdetails_A2000Count">
<input type="text" data-table="depositdetails" data-field="x_A2000Count" name="x_A2000Count" id="x_A2000Count" size="8" placeholder="<?php echo HtmlEncode($depositdetails_edit->A2000Count->getPlaceHolder()) ?>" value="<?php echo $depositdetails_edit->A2000Count->EditValue ?>"<?php echo $depositdetails_edit->A2000Count->editAttributes() ?>>
</span></script>
<?php echo $depositdetails_edit->A2000Count->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($depositdetails_edit->A2000Amount->Visible) { // A2000Amount ?>
	<div id="r_A2000Amount" class="form-group row">
		<label id="elh_depositdetails_A2000Amount" for="x_A2000Amount" class="<?php echo $depositdetails_edit->LeftColumnClass ?>"><script id="tpc_depositdetails_A2000Amount" type="text/html"><?php echo $depositdetails_edit->A2000Amount->caption() ?><?php echo $depositdetails_edit->A2000Amount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $depositdetails_edit->RightColumnClass ?>"><div <?php echo $depositdetails_edit->A2000Amount->cellAttributes() ?>>
<script id="tpx_depositdetails_A2000Amount" type="text/html"><span id="el_depositdetails_A2000Amount">
<input type="text" data-table="depositdetails" data-field="x_A2000Amount" name="x_A2000Amount" id="x_A2000Amount" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($depositdetails_edit->A2000Amount->getPlaceHolder()) ?>" value="<?php echo $depositdetails_edit->A2000Amount->EditValue ?>"<?php echo $depositdetails_edit->A2000Amount->editAttributes() ?>>
</span></script>
<?php echo $depositdetails_edit->A2000Amount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($depositdetails_edit->A1000Count->Visible) { // A1000Count ?>
	<div id="r_A1000Count" class="form-group row">
		<label id="elh_depositdetails_A1000Count" for="x_A1000Count" class="<?php echo $depositdetails_edit->LeftColumnClass ?>"><script id="tpc_depositdetails_A1000Count" type="text/html"><?php echo $depositdetails_edit->A1000Count->caption() ?><?php echo $depositdetails_edit->A1000Count->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $depositdetails_edit->RightColumnClass ?>"><div <?php echo $depositdetails_edit->A1000Count->cellAttributes() ?>>
<script id="tpx_depositdetails_A1000Count" type="text/html"><span id="el_depositdetails_A1000Count">
<input type="text" data-table="depositdetails" data-field="x_A1000Count" name="x_A1000Count" id="x_A1000Count" size="8" placeholder="<?php echo HtmlEncode($depositdetails_edit->A1000Count->getPlaceHolder()) ?>" value="<?php echo $depositdetails_edit->A1000Count->EditValue ?>"<?php echo $depositdetails_edit->A1000Count->editAttributes() ?>>
</span></script>
<?php echo $depositdetails_edit->A1000Count->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($depositdetails_edit->A1000Amount->Visible) { // A1000Amount ?>
	<div id="r_A1000Amount" class="form-group row">
		<label id="elh_depositdetails_A1000Amount" for="x_A1000Amount" class="<?php echo $depositdetails_edit->LeftColumnClass ?>"><script id="tpc_depositdetails_A1000Amount" type="text/html"><?php echo $depositdetails_edit->A1000Amount->caption() ?><?php echo $depositdetails_edit->A1000Amount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $depositdetails_edit->RightColumnClass ?>"><div <?php echo $depositdetails_edit->A1000Amount->cellAttributes() ?>>
<script id="tpx_depositdetails_A1000Amount" type="text/html"><span id="el_depositdetails_A1000Amount">
<input type="text" data-table="depositdetails" data-field="x_A1000Amount" name="x_A1000Amount" id="x_A1000Amount" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($depositdetails_edit->A1000Amount->getPlaceHolder()) ?>" value="<?php echo $depositdetails_edit->A1000Amount->EditValue ?>"<?php echo $depositdetails_edit->A1000Amount->editAttributes() ?>>
</span></script>
<?php echo $depositdetails_edit->A1000Amount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($depositdetails_edit->A500Count->Visible) { // A500Count ?>
	<div id="r_A500Count" class="form-group row">
		<label id="elh_depositdetails_A500Count" for="x_A500Count" class="<?php echo $depositdetails_edit->LeftColumnClass ?>"><script id="tpc_depositdetails_A500Count" type="text/html"><?php echo $depositdetails_edit->A500Count->caption() ?><?php echo $depositdetails_edit->A500Count->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $depositdetails_edit->RightColumnClass ?>"><div <?php echo $depositdetails_edit->A500Count->cellAttributes() ?>>
<script id="tpx_depositdetails_A500Count" type="text/html"><span id="el_depositdetails_A500Count">
<input type="text" data-table="depositdetails" data-field="x_A500Count" name="x_A500Count" id="x_A500Count" size="8" placeholder="<?php echo HtmlEncode($depositdetails_edit->A500Count->getPlaceHolder()) ?>" value="<?php echo $depositdetails_edit->A500Count->EditValue ?>"<?php echo $depositdetails_edit->A500Count->editAttributes() ?>>
</span></script>
<?php echo $depositdetails_edit->A500Count->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($depositdetails_edit->A500Amount->Visible) { // A500Amount ?>
	<div id="r_A500Amount" class="form-group row">
		<label id="elh_depositdetails_A500Amount" for="x_A500Amount" class="<?php echo $depositdetails_edit->LeftColumnClass ?>"><script id="tpc_depositdetails_A500Amount" type="text/html"><?php echo $depositdetails_edit->A500Amount->caption() ?><?php echo $depositdetails_edit->A500Amount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $depositdetails_edit->RightColumnClass ?>"><div <?php echo $depositdetails_edit->A500Amount->cellAttributes() ?>>
<script id="tpx_depositdetails_A500Amount" type="text/html"><span id="el_depositdetails_A500Amount">
<input type="text" data-table="depositdetails" data-field="x_A500Amount" name="x_A500Amount" id="x_A500Amount" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($depositdetails_edit->A500Amount->getPlaceHolder()) ?>" value="<?php echo $depositdetails_edit->A500Amount->EditValue ?>"<?php echo $depositdetails_edit->A500Amount->editAttributes() ?>>
</span></script>
<?php echo $depositdetails_edit->A500Amount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($depositdetails_edit->A200Count->Visible) { // A200Count ?>
	<div id="r_A200Count" class="form-group row">
		<label id="elh_depositdetails_A200Count" for="x_A200Count" class="<?php echo $depositdetails_edit->LeftColumnClass ?>"><script id="tpc_depositdetails_A200Count" type="text/html"><?php echo $depositdetails_edit->A200Count->caption() ?><?php echo $depositdetails_edit->A200Count->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $depositdetails_edit->RightColumnClass ?>"><div <?php echo $depositdetails_edit->A200Count->cellAttributes() ?>>
<script id="tpx_depositdetails_A200Count" type="text/html"><span id="el_depositdetails_A200Count">
<input type="text" data-table="depositdetails" data-field="x_A200Count" name="x_A200Count" id="x_A200Count" size="8" placeholder="<?php echo HtmlEncode($depositdetails_edit->A200Count->getPlaceHolder()) ?>" value="<?php echo $depositdetails_edit->A200Count->EditValue ?>"<?php echo $depositdetails_edit->A200Count->editAttributes() ?>>
</span></script>
<?php echo $depositdetails_edit->A200Count->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($depositdetails_edit->A200Amount->Visible) { // A200Amount ?>
	<div id="r_A200Amount" class="form-group row">
		<label id="elh_depositdetails_A200Amount" for="x_A200Amount" class="<?php echo $depositdetails_edit->LeftColumnClass ?>"><script id="tpc_depositdetails_A200Amount" type="text/html"><?php echo $depositdetails_edit->A200Amount->caption() ?><?php echo $depositdetails_edit->A200Amount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $depositdetails_edit->RightColumnClass ?>"><div <?php echo $depositdetails_edit->A200Amount->cellAttributes() ?>>
<script id="tpx_depositdetails_A200Amount" type="text/html"><span id="el_depositdetails_A200Amount">
<input type="text" data-table="depositdetails" data-field="x_A200Amount" name="x_A200Amount" id="x_A200Amount" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($depositdetails_edit->A200Amount->getPlaceHolder()) ?>" value="<?php echo $depositdetails_edit->A200Amount->EditValue ?>"<?php echo $depositdetails_edit->A200Amount->editAttributes() ?>>
</span></script>
<?php echo $depositdetails_edit->A200Amount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($depositdetails_edit->A100Count->Visible) { // A100Count ?>
	<div id="r_A100Count" class="form-group row">
		<label id="elh_depositdetails_A100Count" for="x_A100Count" class="<?php echo $depositdetails_edit->LeftColumnClass ?>"><script id="tpc_depositdetails_A100Count" type="text/html"><?php echo $depositdetails_edit->A100Count->caption() ?><?php echo $depositdetails_edit->A100Count->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $depositdetails_edit->RightColumnClass ?>"><div <?php echo $depositdetails_edit->A100Count->cellAttributes() ?>>
<script id="tpx_depositdetails_A100Count" type="text/html"><span id="el_depositdetails_A100Count">
<input type="text" data-table="depositdetails" data-field="x_A100Count" name="x_A100Count" id="x_A100Count" size="8" placeholder="<?php echo HtmlEncode($depositdetails_edit->A100Count->getPlaceHolder()) ?>" value="<?php echo $depositdetails_edit->A100Count->EditValue ?>"<?php echo $depositdetails_edit->A100Count->editAttributes() ?>>
</span></script>
<?php echo $depositdetails_edit->A100Count->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($depositdetails_edit->A100Amount->Visible) { // A100Amount ?>
	<div id="r_A100Amount" class="form-group row">
		<label id="elh_depositdetails_A100Amount" for="x_A100Amount" class="<?php echo $depositdetails_edit->LeftColumnClass ?>"><script id="tpc_depositdetails_A100Amount" type="text/html"><?php echo $depositdetails_edit->A100Amount->caption() ?><?php echo $depositdetails_edit->A100Amount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $depositdetails_edit->RightColumnClass ?>"><div <?php echo $depositdetails_edit->A100Amount->cellAttributes() ?>>
<script id="tpx_depositdetails_A100Amount" type="text/html"><span id="el_depositdetails_A100Amount">
<input type="text" data-table="depositdetails" data-field="x_A100Amount" name="x_A100Amount" id="x_A100Amount" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($depositdetails_edit->A100Amount->getPlaceHolder()) ?>" value="<?php echo $depositdetails_edit->A100Amount->EditValue ?>"<?php echo $depositdetails_edit->A100Amount->editAttributes() ?>>
</span></script>
<?php echo $depositdetails_edit->A100Amount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($depositdetails_edit->A50Count->Visible) { // A50Count ?>
	<div id="r_A50Count" class="form-group row">
		<label id="elh_depositdetails_A50Count" for="x_A50Count" class="<?php echo $depositdetails_edit->LeftColumnClass ?>"><script id="tpc_depositdetails_A50Count" type="text/html"><?php echo $depositdetails_edit->A50Count->caption() ?><?php echo $depositdetails_edit->A50Count->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $depositdetails_edit->RightColumnClass ?>"><div <?php echo $depositdetails_edit->A50Count->cellAttributes() ?>>
<script id="tpx_depositdetails_A50Count" type="text/html"><span id="el_depositdetails_A50Count">
<input type="text" data-table="depositdetails" data-field="x_A50Count" name="x_A50Count" id="x_A50Count" size="8" placeholder="<?php echo HtmlEncode($depositdetails_edit->A50Count->getPlaceHolder()) ?>" value="<?php echo $depositdetails_edit->A50Count->EditValue ?>"<?php echo $depositdetails_edit->A50Count->editAttributes() ?>>
</span></script>
<?php echo $depositdetails_edit->A50Count->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($depositdetails_edit->A50Amount->Visible) { // A50Amount ?>
	<div id="r_A50Amount" class="form-group row">
		<label id="elh_depositdetails_A50Amount" for="x_A50Amount" class="<?php echo $depositdetails_edit->LeftColumnClass ?>"><script id="tpc_depositdetails_A50Amount" type="text/html"><?php echo $depositdetails_edit->A50Amount->caption() ?><?php echo $depositdetails_edit->A50Amount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $depositdetails_edit->RightColumnClass ?>"><div <?php echo $depositdetails_edit->A50Amount->cellAttributes() ?>>
<script id="tpx_depositdetails_A50Amount" type="text/html"><span id="el_depositdetails_A50Amount">
<input type="text" data-table="depositdetails" data-field="x_A50Amount" name="x_A50Amount" id="x_A50Amount" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($depositdetails_edit->A50Amount->getPlaceHolder()) ?>" value="<?php echo $depositdetails_edit->A50Amount->EditValue ?>"<?php echo $depositdetails_edit->A50Amount->editAttributes() ?>>
</span></script>
<?php echo $depositdetails_edit->A50Amount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($depositdetails_edit->A20Count->Visible) { // A20Count ?>
	<div id="r_A20Count" class="form-group row">
		<label id="elh_depositdetails_A20Count" for="x_A20Count" class="<?php echo $depositdetails_edit->LeftColumnClass ?>"><script id="tpc_depositdetails_A20Count" type="text/html"><?php echo $depositdetails_edit->A20Count->caption() ?><?php echo $depositdetails_edit->A20Count->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $depositdetails_edit->RightColumnClass ?>"><div <?php echo $depositdetails_edit->A20Count->cellAttributes() ?>>
<script id="tpx_depositdetails_A20Count" type="text/html"><span id="el_depositdetails_A20Count">
<input type="text" data-table="depositdetails" data-field="x_A20Count" name="x_A20Count" id="x_A20Count" size="8" placeholder="<?php echo HtmlEncode($depositdetails_edit->A20Count->getPlaceHolder()) ?>" value="<?php echo $depositdetails_edit->A20Count->EditValue ?>"<?php echo $depositdetails_edit->A20Count->editAttributes() ?>>
</span></script>
<?php echo $depositdetails_edit->A20Count->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($depositdetails_edit->A20Amount->Visible) { // A20Amount ?>
	<div id="r_A20Amount" class="form-group row">
		<label id="elh_depositdetails_A20Amount" for="x_A20Amount" class="<?php echo $depositdetails_edit->LeftColumnClass ?>"><script id="tpc_depositdetails_A20Amount" type="text/html"><?php echo $depositdetails_edit->A20Amount->caption() ?><?php echo $depositdetails_edit->A20Amount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $depositdetails_edit->RightColumnClass ?>"><div <?php echo $depositdetails_edit->A20Amount->cellAttributes() ?>>
<script id="tpx_depositdetails_A20Amount" type="text/html"><span id="el_depositdetails_A20Amount">
<input type="text" data-table="depositdetails" data-field="x_A20Amount" name="x_A20Amount" id="x_A20Amount" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($depositdetails_edit->A20Amount->getPlaceHolder()) ?>" value="<?php echo $depositdetails_edit->A20Amount->EditValue ?>"<?php echo $depositdetails_edit->A20Amount->editAttributes() ?>>
</span></script>
<?php echo $depositdetails_edit->A20Amount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($depositdetails_edit->A10Count->Visible) { // A10Count ?>
	<div id="r_A10Count" class="form-group row">
		<label id="elh_depositdetails_A10Count" for="x_A10Count" class="<?php echo $depositdetails_edit->LeftColumnClass ?>"><script id="tpc_depositdetails_A10Count" type="text/html"><?php echo $depositdetails_edit->A10Count->caption() ?><?php echo $depositdetails_edit->A10Count->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $depositdetails_edit->RightColumnClass ?>"><div <?php echo $depositdetails_edit->A10Count->cellAttributes() ?>>
<script id="tpx_depositdetails_A10Count" type="text/html"><span id="el_depositdetails_A10Count">
<input type="text" data-table="depositdetails" data-field="x_A10Count" name="x_A10Count" id="x_A10Count" size="8" placeholder="<?php echo HtmlEncode($depositdetails_edit->A10Count->getPlaceHolder()) ?>" value="<?php echo $depositdetails_edit->A10Count->EditValue ?>"<?php echo $depositdetails_edit->A10Count->editAttributes() ?>>
</span></script>
<?php echo $depositdetails_edit->A10Count->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($depositdetails_edit->A10Amount->Visible) { // A10Amount ?>
	<div id="r_A10Amount" class="form-group row">
		<label id="elh_depositdetails_A10Amount" for="x_A10Amount" class="<?php echo $depositdetails_edit->LeftColumnClass ?>"><script id="tpc_depositdetails_A10Amount" type="text/html"><?php echo $depositdetails_edit->A10Amount->caption() ?><?php echo $depositdetails_edit->A10Amount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $depositdetails_edit->RightColumnClass ?>"><div <?php echo $depositdetails_edit->A10Amount->cellAttributes() ?>>
<script id="tpx_depositdetails_A10Amount" type="text/html"><span id="el_depositdetails_A10Amount">
<input type="text" data-table="depositdetails" data-field="x_A10Amount" name="x_A10Amount" id="x_A10Amount" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($depositdetails_edit->A10Amount->getPlaceHolder()) ?>" value="<?php echo $depositdetails_edit->A10Amount->EditValue ?>"<?php echo $depositdetails_edit->A10Amount->editAttributes() ?>>
</span></script>
<?php echo $depositdetails_edit->A10Amount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($depositdetails_edit->BalanceAmount->Visible) { // BalanceAmount ?>
	<div id="r_BalanceAmount" class="form-group row">
		<label id="elh_depositdetails_BalanceAmount" for="x_BalanceAmount" class="<?php echo $depositdetails_edit->LeftColumnClass ?>"><script id="tpc_depositdetails_BalanceAmount" type="text/html"><?php echo $depositdetails_edit->BalanceAmount->caption() ?><?php echo $depositdetails_edit->BalanceAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $depositdetails_edit->RightColumnClass ?>"><div <?php echo $depositdetails_edit->BalanceAmount->cellAttributes() ?>>
<script id="tpx_depositdetails_BalanceAmount" type="text/html"><span id="el_depositdetails_BalanceAmount">
<input type="text" data-table="depositdetails" data-field="x_BalanceAmount" name="x_BalanceAmount" id="x_BalanceAmount" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($depositdetails_edit->BalanceAmount->getPlaceHolder()) ?>" value="<?php echo $depositdetails_edit->BalanceAmount->EditValue ?>"<?php echo $depositdetails_edit->BalanceAmount->editAttributes() ?>>
</span></script>
<?php echo $depositdetails_edit->BalanceAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($depositdetails_edit->CashCollected->Visible) { // CashCollected ?>
	<div id="r_CashCollected" class="form-group row">
		<label id="elh_depositdetails_CashCollected" for="x_CashCollected" class="<?php echo $depositdetails_edit->LeftColumnClass ?>"><script id="tpc_depositdetails_CashCollected" type="text/html"><?php echo $depositdetails_edit->CashCollected->caption() ?><?php echo $depositdetails_edit->CashCollected->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $depositdetails_edit->RightColumnClass ?>"><div <?php echo $depositdetails_edit->CashCollected->cellAttributes() ?>>
<script id="tpx_depositdetails_CashCollected" type="text/html"><span id="el_depositdetails_CashCollected">
<input type="text" data-table="depositdetails" data-field="x_CashCollected" name="x_CashCollected" id="x_CashCollected" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($depositdetails_edit->CashCollected->getPlaceHolder()) ?>" value="<?php echo $depositdetails_edit->CashCollected->EditValue ?>"<?php echo $depositdetails_edit->CashCollected->editAttributes() ?>>
</span></script>
<?php echo $depositdetails_edit->CashCollected->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($depositdetails_edit->RTGS->Visible) { // RTGS ?>
	<div id="r_RTGS" class="form-group row">
		<label id="elh_depositdetails_RTGS" for="x_RTGS" class="<?php echo $depositdetails_edit->LeftColumnClass ?>"><script id="tpc_depositdetails_RTGS" type="text/html"><?php echo $depositdetails_edit->RTGS->caption() ?><?php echo $depositdetails_edit->RTGS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $depositdetails_edit->RightColumnClass ?>"><div <?php echo $depositdetails_edit->RTGS->cellAttributes() ?>>
<script id="tpx_depositdetails_RTGS" type="text/html"><span id="el_depositdetails_RTGS">
<input type="text" data-table="depositdetails" data-field="x_RTGS" name="x_RTGS" id="x_RTGS" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($depositdetails_edit->RTGS->getPlaceHolder()) ?>" value="<?php echo $depositdetails_edit->RTGS->EditValue ?>"<?php echo $depositdetails_edit->RTGS->editAttributes() ?>>
</span></script>
<?php echo $depositdetails_edit->RTGS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($depositdetails_edit->PAYTM->Visible) { // PAYTM ?>
	<div id="r_PAYTM" class="form-group row">
		<label id="elh_depositdetails_PAYTM" for="x_PAYTM" class="<?php echo $depositdetails_edit->LeftColumnClass ?>"><script id="tpc_depositdetails_PAYTM" type="text/html"><?php echo $depositdetails_edit->PAYTM->caption() ?><?php echo $depositdetails_edit->PAYTM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $depositdetails_edit->RightColumnClass ?>"><div <?php echo $depositdetails_edit->PAYTM->cellAttributes() ?>>
<script id="tpx_depositdetails_PAYTM" type="text/html"><span id="el_depositdetails_PAYTM">
<input type="text" data-table="depositdetails" data-field="x_PAYTM" name="x_PAYTM" id="x_PAYTM" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($depositdetails_edit->PAYTM->getPlaceHolder()) ?>" value="<?php echo $depositdetails_edit->PAYTM->EditValue ?>"<?php echo $depositdetails_edit->PAYTM->editAttributes() ?>>
</span></script>
<?php echo $depositdetails_edit->PAYTM->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_depositdetailsedit" class="ew-custom-template"></div>
<script id="tpm_depositdetailsedit" type="text/html">
<div id="ct_depositdetails_edit"><style>
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

<?php if (!$depositdetails_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $depositdetails_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $depositdetails_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($depositdetails->Rows) ?> };
	ew.applyTemplate("tpd_depositdetailsedit", "tpm_depositdetailsedit", "depositdetailsedit", "<?php echo $depositdetails->CustomExport ?>", ew.templateData.rows[0]);
	$("script.depositdetailsedit_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$depositdetails_edit->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	function calculateAmount(){var e=+document.getElementById("x_A2000Count").value;document.getElementById("x_A2000Amount").value=2e3*e;var t=+document.getElementById("x_A1000Count").value;document.getElementById("x_A1000Amount").value=1e3*t;var n=+document.getElementById("x_A500Count").value;document.getElementById("x_A500Amount").value=500*n;var u=+document.getElementById("x_A200Count").value;document.getElementById("x_A200Amount").value=200*u;var m=+document.getElementById("x_A100Count").value;document.getElementById("x_A100Amount").value=100*m;var l=+document.getElementById("x_A50Count").value;document.getElementById("x_A50Amount").value=50*l;var d=+document.getElementById("x_A20Count").value;document.getElementById("x_A20Amount").value=20*d;var o=+document.getElementById("x_A10Count").value;document.getElementById("x_A10Amount").value=10*o;var a=+document.getElementById("x_A2000Amount").value,A=+document.getElementById("x_A1000Amount").value,v=+document.getElementById("x_A500Amount").value,c=+document.getElementById("x_A200Amount").value,y=+document.getElementById("x_A100Amount").value,B=+document.getElementById("x_A50Amount").value,g=+document.getElementById("x_A20Amount").value,E=+document.getElementById("x_A10Amount").value,I=+document.getElementById("x_OpeningBalance").value,x=+document.getElementById("x_Other").value;document.getElementById("x_TotalCash").value=a+A+v+c+y+B+g+E+I+x;var _=+document.getElementById("x_TotalCash").value,i=+document.getElementById("x_TotalTransferDepositAmount").value;document.getElementById("x_BalanceAmount").value=_-i}document.getElementById("DepositToBankid").style.visibility="hidden",document.getElementById("TransferToid").style.visibility="hidden";
});
</script>
<?php include_once "footer.php"; ?>
<?php
$depositdetails_edit->terminate();
?>