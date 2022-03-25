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
$pharmacy_grn_add = new pharmacy_grn_add();

// Run the page
$pharmacy_grn_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_grn_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpharmacy_grnadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fpharmacy_grnadd = currentForm = new ew.Form("fpharmacy_grnadd", "add");

	// Validate form
	fpharmacy_grnadd.validate = function() {
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
			<?php if ($pharmacy_grn_add->GRNNO->Required) { ?>
				elm = this.getElements("x" + infix + "_GRNNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_grn_add->GRNNO->caption(), $pharmacy_grn_add->GRNNO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_grn_add->DT->Required) { ?>
				elm = this.getElements("x" + infix + "_DT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_grn_add->DT->caption(), $pharmacy_grn_add->DT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DT");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_grn_add->DT->errorMessage()) ?>");
			<?php if ($pharmacy_grn_add->YM->Required) { ?>
				elm = this.getElements("x" + infix + "_YM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_grn_add->YM->caption(), $pharmacy_grn_add->YM->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_grn_add->PC->Required) { ?>
				elm = this.getElements("x" + infix + "_PC");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_grn_add->PC->caption(), $pharmacy_grn_add->PC->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_grn_add->Customercode->Required) { ?>
				elm = this.getElements("x" + infix + "_Customercode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_grn_add->Customercode->caption(), $pharmacy_grn_add->Customercode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_grn_add->Customername->Required) { ?>
				elm = this.getElements("x" + infix + "_Customername");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_grn_add->Customername->caption(), $pharmacy_grn_add->Customername->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_grn_add->pharmacy_pocol->Required) { ?>
				elm = this.getElements("x" + infix + "_pharmacy_pocol");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_grn_add->pharmacy_pocol->caption(), $pharmacy_grn_add->pharmacy_pocol->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_grn_add->Address1->Required) { ?>
				elm = this.getElements("x" + infix + "_Address1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_grn_add->Address1->caption(), $pharmacy_grn_add->Address1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_grn_add->Address2->Required) { ?>
				elm = this.getElements("x" + infix + "_Address2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_grn_add->Address2->caption(), $pharmacy_grn_add->Address2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_grn_add->Address3->Required) { ?>
				elm = this.getElements("x" + infix + "_Address3");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_grn_add->Address3->caption(), $pharmacy_grn_add->Address3->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_grn_add->State->Required) { ?>
				elm = this.getElements("x" + infix + "_State");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_grn_add->State->caption(), $pharmacy_grn_add->State->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_grn_add->Pincode->Required) { ?>
				elm = this.getElements("x" + infix + "_Pincode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_grn_add->Pincode->caption(), $pharmacy_grn_add->Pincode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_grn_add->Phone->Required) { ?>
				elm = this.getElements("x" + infix + "_Phone");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_grn_add->Phone->caption(), $pharmacy_grn_add->Phone->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_grn_add->Fax->Required) { ?>
				elm = this.getElements("x" + infix + "_Fax");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_grn_add->Fax->caption(), $pharmacy_grn_add->Fax->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_grn_add->EEmail->Required) { ?>
				elm = this.getElements("x" + infix + "_EEmail");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_grn_add->EEmail->caption(), $pharmacy_grn_add->EEmail->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_grn_add->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_grn_add->HospID->caption(), $pharmacy_grn_add->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_grn_add->createdby->Required) { ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_grn_add->createdby->caption(), $pharmacy_grn_add->createdby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_grn_add->createddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_grn_add->createddatetime->caption(), $pharmacy_grn_add->createddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_grn_add->BILLNO->Required) { ?>
				elm = this.getElements("x" + infix + "_BILLNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_grn_add->BILLNO->caption(), $pharmacy_grn_add->BILLNO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_grn_add->BILLDT->Required) { ?>
				elm = this.getElements("x" + infix + "_BILLDT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_grn_add->BILLDT->caption(), $pharmacy_grn_add->BILLDT->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BILLDT");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_grn_add->BILLDT->errorMessage()) ?>");
			<?php if ($pharmacy_grn_add->BRCODE->Required) { ?>
				elm = this.getElements("x" + infix + "_BRCODE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_grn_add->BRCODE->caption(), $pharmacy_grn_add->BRCODE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_grn_add->PharmacyID->Required) { ?>
				elm = this.getElements("x" + infix + "_PharmacyID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_grn_add->PharmacyID->caption(), $pharmacy_grn_add->PharmacyID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_grn_add->BillTotalValue->Required) { ?>
				elm = this.getElements("x" + infix + "_BillTotalValue");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_grn_add->BillTotalValue->caption(), $pharmacy_grn_add->BillTotalValue->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BillTotalValue");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_grn_add->BillTotalValue->errorMessage()) ?>");
			<?php if ($pharmacy_grn_add->GRNTotalValue->Required) { ?>
				elm = this.getElements("x" + infix + "_GRNTotalValue");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_grn_add->GRNTotalValue->caption(), $pharmacy_grn_add->GRNTotalValue->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_GRNTotalValue");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_grn_add->GRNTotalValue->errorMessage()) ?>");
			<?php if ($pharmacy_grn_add->BillDiscount->Required) { ?>
				elm = this.getElements("x" + infix + "_BillDiscount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_grn_add->BillDiscount->caption(), $pharmacy_grn_add->BillDiscount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BillDiscount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_grn_add->BillDiscount->errorMessage()) ?>");
			<?php if ($pharmacy_grn_add->BillUpload->Required) { ?>
				felm = this.getElements("x" + infix + "_BillUpload");
				elm = this.getElements("fn_x" + infix + "_BillUpload");
				if (felm && elm && !ew.hasValue(elm))
					return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $pharmacy_grn_add->BillUpload->caption(), $pharmacy_grn_add->BillUpload->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_grn_add->TransPort->Required) { ?>
				elm = this.getElements("x" + infix + "_TransPort");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_grn_add->TransPort->caption(), $pharmacy_grn_add->TransPort->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TransPort");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_grn_add->TransPort->errorMessage()) ?>");
			<?php if ($pharmacy_grn_add->AnyOther->Required) { ?>
				elm = this.getElements("x" + infix + "_AnyOther");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_grn_add->AnyOther->caption(), $pharmacy_grn_add->AnyOther->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_AnyOther");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_grn_add->AnyOther->errorMessage()) ?>");
			<?php if ($pharmacy_grn_add->Remarks->Required) { ?>
				elm = this.getElements("x" + infix + "_Remarks");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_grn_add->Remarks->caption(), $pharmacy_grn_add->Remarks->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_grn_add->GrnValue->Required) { ?>
				elm = this.getElements("x" + infix + "_GrnValue");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_grn_add->GrnValue->caption(), $pharmacy_grn_add->GrnValue->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_GrnValue");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_grn_add->GrnValue->errorMessage()) ?>");
			<?php if ($pharmacy_grn_add->Pid->Required) { ?>
				elm = this.getElements("x" + infix + "_Pid");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_grn_add->Pid->caption(), $pharmacy_grn_add->Pid->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Pid");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_grn_add->Pid->errorMessage()) ?>");
			<?php if ($pharmacy_grn_add->PaymentNo->Required) { ?>
				elm = this.getElements("x" + infix + "_PaymentNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_grn_add->PaymentNo->caption(), $pharmacy_grn_add->PaymentNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_grn_add->PaymentStatus->Required) { ?>
				elm = this.getElements("x" + infix + "_PaymentStatus");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_grn_add->PaymentStatus->caption(), $pharmacy_grn_add->PaymentStatus->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pharmacy_grn_add->PaidAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_PaidAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_grn_add->PaidAmount->caption(), $pharmacy_grn_add->PaidAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PaidAmount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pharmacy_grn_add->PaidAmount->errorMessage()) ?>");

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
	fpharmacy_grnadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpharmacy_grnadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpharmacy_grnadd.lists["x_PC"] = <?php echo $pharmacy_grn_add->PC->Lookup->toClientList($pharmacy_grn_add) ?>;
	fpharmacy_grnadd.lists["x_PC"].options = <?php echo JsonEncode($pharmacy_grn_add->PC->lookupOptions()) ?>;
	fpharmacy_grnadd.lists["x_BRCODE"] = <?php echo $pharmacy_grn_add->BRCODE->Lookup->toClientList($pharmacy_grn_add) ?>;
	fpharmacy_grnadd.lists["x_BRCODE"].options = <?php echo JsonEncode($pharmacy_grn_add->BRCODE->lookupOptions()) ?>;
	loadjs.done("fpharmacy_grnadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pharmacy_grn_add->showPageHeader(); ?>
<?php
$pharmacy_grn_add->showMessage();
?>
<form name="fpharmacy_grnadd" id="fpharmacy_grnadd" class="<?php echo $pharmacy_grn_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_grn">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_grn_add->IsModal ?>">
<?php if ($pharmacy_grn->getCurrentMasterTable() == "pharmacy_payment") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="pharmacy_payment">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($pharmacy_grn_add->Pid->getSessionValue()) ?>">
<?php } ?>
<div class="ew-add-div d-none"><!-- page* -->
<?php if ($pharmacy_grn_add->GRNNO->Visible) { // GRNNO ?>
	<div id="r_GRNNO" class="form-group row">
		<label id="elh_pharmacy_grn_GRNNO" for="x_GRNNO" class="<?php echo $pharmacy_grn_add->LeftColumnClass ?>"><script id="tpc_pharmacy_grn_GRNNO" type="text/html"><?php echo $pharmacy_grn_add->GRNNO->caption() ?><?php echo $pharmacy_grn_add->GRNNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_grn_add->RightColumnClass ?>"><div <?php echo $pharmacy_grn_add->GRNNO->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_GRNNO" type="text/html"><span id="el_pharmacy_grn_GRNNO">
<input type="text" data-table="pharmacy_grn" data-field="x_GRNNO" name="x_GRNNO" id="x_GRNNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_grn_add->GRNNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_add->GRNNO->EditValue ?>"<?php echo $pharmacy_grn_add->GRNNO->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_grn_add->GRNNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_grn_add->DT->Visible) { // DT ?>
	<div id="r_DT" class="form-group row">
		<label id="elh_pharmacy_grn_DT" for="x_DT" class="<?php echo $pharmacy_grn_add->LeftColumnClass ?>"><script id="tpc_pharmacy_grn_DT" type="text/html"><?php echo $pharmacy_grn_add->DT->caption() ?><?php echo $pharmacy_grn_add->DT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_grn_add->RightColumnClass ?>"><div <?php echo $pharmacy_grn_add->DT->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_DT" type="text/html"><span id="el_pharmacy_grn_DT">
<input type="text" data-table="pharmacy_grn" data-field="x_DT" name="x_DT" id="x_DT" placeholder="<?php echo HtmlEncode($pharmacy_grn_add->DT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_add->DT->EditValue ?>"<?php echo $pharmacy_grn_add->DT->editAttributes() ?>>
<?php if (!$pharmacy_grn_add->DT->ReadOnly && !$pharmacy_grn_add->DT->Disabled && !isset($pharmacy_grn_add->DT->EditAttrs["readonly"]) && !isset($pharmacy_grn_add->DT->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="pharmacy_grnadd_js">
loadjs.ready(["fpharmacy_grnadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_grnadd", "x_DT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php echo $pharmacy_grn_add->DT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_grn_add->YM->Visible) { // YM ?>
	<div id="r_YM" class="form-group row">
		<label id="elh_pharmacy_grn_YM" for="x_YM" class="<?php echo $pharmacy_grn_add->LeftColumnClass ?>"><script id="tpc_pharmacy_grn_YM" type="text/html"><?php echo $pharmacy_grn_add->YM->caption() ?><?php echo $pharmacy_grn_add->YM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_grn_add->RightColumnClass ?>"><div <?php echo $pharmacy_grn_add->YM->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_YM" type="text/html"><span id="el_pharmacy_grn_YM">
<input type="text" data-table="pharmacy_grn" data-field="x_YM" name="x_YM" id="x_YM" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_grn_add->YM->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_add->YM->EditValue ?>"<?php echo $pharmacy_grn_add->YM->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_grn_add->YM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_grn_add->PC->Visible) { // PC ?>
	<div id="r_PC" class="form-group row">
		<label id="elh_pharmacy_grn_PC" for="x_PC" class="<?php echo $pharmacy_grn_add->LeftColumnClass ?>"><script id="tpc_pharmacy_grn_PC" type="text/html"><?php echo $pharmacy_grn_add->PC->caption() ?><?php echo $pharmacy_grn_add->PC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_grn_add->RightColumnClass ?>"><div <?php echo $pharmacy_grn_add->PC->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_PC" type="text/html"><span id="el_pharmacy_grn_PC">
<?php $pharmacy_grn_add->PC->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_PC"><?php echo EmptyValue(strval($pharmacy_grn_add->PC->ViewValue)) ? $Language->phrase("PleaseSelect") : $pharmacy_grn_add->PC->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pharmacy_grn_add->PC->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($pharmacy_grn_add->PC->ReadOnly || $pharmacy_grn_add->PC->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_PC',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pharmacy_grn_add->PC->Lookup->getParamTag($pharmacy_grn_add, "p_x_PC") ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_PC" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pharmacy_grn_add->PC->displayValueSeparatorAttribute() ?>" name="x_PC" id="x_PC" value="<?php echo $pharmacy_grn_add->PC->CurrentValue ?>"<?php echo $pharmacy_grn_add->PC->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_grn_add->PC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_grn_add->Customercode->Visible) { // Customercode ?>
	<div id="r_Customercode" class="form-group row">
		<label id="elh_pharmacy_grn_Customercode" for="x_Customercode" class="<?php echo $pharmacy_grn_add->LeftColumnClass ?>"><script id="tpc_pharmacy_grn_Customercode" type="text/html"><?php echo $pharmacy_grn_add->Customercode->caption() ?><?php echo $pharmacy_grn_add->Customercode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_grn_add->RightColumnClass ?>"><div <?php echo $pharmacy_grn_add->Customercode->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_Customercode" type="text/html"><span id="el_pharmacy_grn_Customercode">
<input type="text" data-table="pharmacy_grn" data-field="x_Customercode" name="x_Customercode" id="x_Customercode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_grn_add->Customercode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_add->Customercode->EditValue ?>"<?php echo $pharmacy_grn_add->Customercode->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_grn_add->Customercode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_grn_add->Customername->Visible) { // Customername ?>
	<div id="r_Customername" class="form-group row">
		<label id="elh_pharmacy_grn_Customername" for="x_Customername" class="<?php echo $pharmacy_grn_add->LeftColumnClass ?>"><script id="tpc_pharmacy_grn_Customername" type="text/html"><?php echo $pharmacy_grn_add->Customername->caption() ?><?php echo $pharmacy_grn_add->Customername->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_grn_add->RightColumnClass ?>"><div <?php echo $pharmacy_grn_add->Customername->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_Customername" type="text/html"><span id="el_pharmacy_grn_Customername">
<input type="text" data-table="pharmacy_grn" data-field="x_Customername" name="x_Customername" id="x_Customername" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_grn_add->Customername->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_add->Customername->EditValue ?>"<?php echo $pharmacy_grn_add->Customername->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_grn_add->Customername->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_grn_add->pharmacy_pocol->Visible) { // pharmacy_pocol ?>
	<div id="r_pharmacy_pocol" class="form-group row">
		<label id="elh_pharmacy_grn_pharmacy_pocol" for="x_pharmacy_pocol" class="<?php echo $pharmacy_grn_add->LeftColumnClass ?>"><script id="tpc_pharmacy_grn_pharmacy_pocol" type="text/html"><?php echo $pharmacy_grn_add->pharmacy_pocol->caption() ?><?php echo $pharmacy_grn_add->pharmacy_pocol->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_grn_add->RightColumnClass ?>"><div <?php echo $pharmacy_grn_add->pharmacy_pocol->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_pharmacy_pocol" type="text/html"><span id="el_pharmacy_grn_pharmacy_pocol">
<input type="text" data-table="pharmacy_grn" data-field="x_pharmacy_pocol" name="x_pharmacy_pocol" id="x_pharmacy_pocol" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_grn_add->pharmacy_pocol->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_add->pharmacy_pocol->EditValue ?>"<?php echo $pharmacy_grn_add->pharmacy_pocol->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_grn_add->pharmacy_pocol->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_grn_add->Address1->Visible) { // Address1 ?>
	<div id="r_Address1" class="form-group row">
		<label id="elh_pharmacy_grn_Address1" for="x_Address1" class="<?php echo $pharmacy_grn_add->LeftColumnClass ?>"><script id="tpc_pharmacy_grn_Address1" type="text/html"><?php echo $pharmacy_grn_add->Address1->caption() ?><?php echo $pharmacy_grn_add->Address1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_grn_add->RightColumnClass ?>"><div <?php echo $pharmacy_grn_add->Address1->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_Address1" type="text/html"><span id="el_pharmacy_grn_Address1">
<input type="text" data-table="pharmacy_grn" data-field="x_Address1" name="x_Address1" id="x_Address1" placeholder="<?php echo HtmlEncode($pharmacy_grn_add->Address1->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_add->Address1->EditValue ?>"<?php echo $pharmacy_grn_add->Address1->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_grn_add->Address1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_grn_add->Address2->Visible) { // Address2 ?>
	<div id="r_Address2" class="form-group row">
		<label id="elh_pharmacy_grn_Address2" for="x_Address2" class="<?php echo $pharmacy_grn_add->LeftColumnClass ?>"><script id="tpc_pharmacy_grn_Address2" type="text/html"><?php echo $pharmacy_grn_add->Address2->caption() ?><?php echo $pharmacy_grn_add->Address2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_grn_add->RightColumnClass ?>"><div <?php echo $pharmacy_grn_add->Address2->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_Address2" type="text/html"><span id="el_pharmacy_grn_Address2">
<input type="text" data-table="pharmacy_grn" data-field="x_Address2" name="x_Address2" id="x_Address2" placeholder="<?php echo HtmlEncode($pharmacy_grn_add->Address2->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_add->Address2->EditValue ?>"<?php echo $pharmacy_grn_add->Address2->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_grn_add->Address2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_grn_add->Address3->Visible) { // Address3 ?>
	<div id="r_Address3" class="form-group row">
		<label id="elh_pharmacy_grn_Address3" for="x_Address3" class="<?php echo $pharmacy_grn_add->LeftColumnClass ?>"><script id="tpc_pharmacy_grn_Address3" type="text/html"><?php echo $pharmacy_grn_add->Address3->caption() ?><?php echo $pharmacy_grn_add->Address3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_grn_add->RightColumnClass ?>"><div <?php echo $pharmacy_grn_add->Address3->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_Address3" type="text/html"><span id="el_pharmacy_grn_Address3">
<input type="text" data-table="pharmacy_grn" data-field="x_Address3" name="x_Address3" id="x_Address3" placeholder="<?php echo HtmlEncode($pharmacy_grn_add->Address3->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_add->Address3->EditValue ?>"<?php echo $pharmacy_grn_add->Address3->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_grn_add->Address3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_grn_add->State->Visible) { // State ?>
	<div id="r_State" class="form-group row">
		<label id="elh_pharmacy_grn_State" for="x_State" class="<?php echo $pharmacy_grn_add->LeftColumnClass ?>"><script id="tpc_pharmacy_grn_State" type="text/html"><?php echo $pharmacy_grn_add->State->caption() ?><?php echo $pharmacy_grn_add->State->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_grn_add->RightColumnClass ?>"><div <?php echo $pharmacy_grn_add->State->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_State" type="text/html"><span id="el_pharmacy_grn_State">
<input type="text" data-table="pharmacy_grn" data-field="x_State" name="x_State" id="x_State" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_grn_add->State->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_add->State->EditValue ?>"<?php echo $pharmacy_grn_add->State->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_grn_add->State->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_grn_add->Pincode->Visible) { // Pincode ?>
	<div id="r_Pincode" class="form-group row">
		<label id="elh_pharmacy_grn_Pincode" for="x_Pincode" class="<?php echo $pharmacy_grn_add->LeftColumnClass ?>"><script id="tpc_pharmacy_grn_Pincode" type="text/html"><?php echo $pharmacy_grn_add->Pincode->caption() ?><?php echo $pharmacy_grn_add->Pincode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_grn_add->RightColumnClass ?>"><div <?php echo $pharmacy_grn_add->Pincode->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_Pincode" type="text/html"><span id="el_pharmacy_grn_Pincode">
<input type="text" data-table="pharmacy_grn" data-field="x_Pincode" name="x_Pincode" id="x_Pincode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_grn_add->Pincode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_add->Pincode->EditValue ?>"<?php echo $pharmacy_grn_add->Pincode->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_grn_add->Pincode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_grn_add->Phone->Visible) { // Phone ?>
	<div id="r_Phone" class="form-group row">
		<label id="elh_pharmacy_grn_Phone" for="x_Phone" class="<?php echo $pharmacy_grn_add->LeftColumnClass ?>"><script id="tpc_pharmacy_grn_Phone" type="text/html"><?php echo $pharmacy_grn_add->Phone->caption() ?><?php echo $pharmacy_grn_add->Phone->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_grn_add->RightColumnClass ?>"><div <?php echo $pharmacy_grn_add->Phone->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_Phone" type="text/html"><span id="el_pharmacy_grn_Phone">
<input type="text" data-table="pharmacy_grn" data-field="x_Phone" name="x_Phone" id="x_Phone" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_grn_add->Phone->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_add->Phone->EditValue ?>"<?php echo $pharmacy_grn_add->Phone->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_grn_add->Phone->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_grn_add->Fax->Visible) { // Fax ?>
	<div id="r_Fax" class="form-group row">
		<label id="elh_pharmacy_grn_Fax" for="x_Fax" class="<?php echo $pharmacy_grn_add->LeftColumnClass ?>"><script id="tpc_pharmacy_grn_Fax" type="text/html"><?php echo $pharmacy_grn_add->Fax->caption() ?><?php echo $pharmacy_grn_add->Fax->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_grn_add->RightColumnClass ?>"><div <?php echo $pharmacy_grn_add->Fax->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_Fax" type="text/html"><span id="el_pharmacy_grn_Fax">
<input type="text" data-table="pharmacy_grn" data-field="x_Fax" name="x_Fax" id="x_Fax" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_grn_add->Fax->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_add->Fax->EditValue ?>"<?php echo $pharmacy_grn_add->Fax->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_grn_add->Fax->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_grn_add->EEmail->Visible) { // EEmail ?>
	<div id="r_EEmail" class="form-group row">
		<label id="elh_pharmacy_grn_EEmail" for="x_EEmail" class="<?php echo $pharmacy_grn_add->LeftColumnClass ?>"><script id="tpc_pharmacy_grn_EEmail" type="text/html"><?php echo $pharmacy_grn_add->EEmail->caption() ?><?php echo $pharmacy_grn_add->EEmail->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_grn_add->RightColumnClass ?>"><div <?php echo $pharmacy_grn_add->EEmail->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_EEmail" type="text/html"><span id="el_pharmacy_grn_EEmail">
<input type="text" data-table="pharmacy_grn" data-field="x_EEmail" name="x_EEmail" id="x_EEmail" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_grn_add->EEmail->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_add->EEmail->EditValue ?>"<?php echo $pharmacy_grn_add->EEmail->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_grn_add->EEmail->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_grn_add->BILLNO->Visible) { // BILLNO ?>
	<div id="r_BILLNO" class="form-group row">
		<label id="elh_pharmacy_grn_BILLNO" for="x_BILLNO" class="<?php echo $pharmacy_grn_add->LeftColumnClass ?>"><script id="tpc_pharmacy_grn_BILLNO" type="text/html"><?php echo $pharmacy_grn_add->BILLNO->caption() ?><?php echo $pharmacy_grn_add->BILLNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_grn_add->RightColumnClass ?>"><div <?php echo $pharmacy_grn_add->BILLNO->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_BILLNO" type="text/html"><span id="el_pharmacy_grn_BILLNO">
<input type="text" data-table="pharmacy_grn" data-field="x_BILLNO" name="x_BILLNO" id="x_BILLNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_grn_add->BILLNO->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_add->BILLNO->EditValue ?>"<?php echo $pharmacy_grn_add->BILLNO->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_grn_add->BILLNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_grn_add->BILLDT->Visible) { // BILLDT ?>
	<div id="r_BILLDT" class="form-group row">
		<label id="elh_pharmacy_grn_BILLDT" for="x_BILLDT" class="<?php echo $pharmacy_grn_add->LeftColumnClass ?>"><script id="tpc_pharmacy_grn_BILLDT" type="text/html"><?php echo $pharmacy_grn_add->BILLDT->caption() ?><?php echo $pharmacy_grn_add->BILLDT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_grn_add->RightColumnClass ?>"><div <?php echo $pharmacy_grn_add->BILLDT->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_BILLDT" type="text/html"><span id="el_pharmacy_grn_BILLDT">
<input type="text" data-table="pharmacy_grn" data-field="x_BILLDT" name="x_BILLDT" id="x_BILLDT" placeholder="<?php echo HtmlEncode($pharmacy_grn_add->BILLDT->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_add->BILLDT->EditValue ?>"<?php echo $pharmacy_grn_add->BILLDT->editAttributes() ?>>
<?php if (!$pharmacy_grn_add->BILLDT->ReadOnly && !$pharmacy_grn_add->BILLDT->Disabled && !isset($pharmacy_grn_add->BILLDT->EditAttrs["readonly"]) && !isset($pharmacy_grn_add->BILLDT->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="pharmacy_grnadd_js">
loadjs.ready(["fpharmacy_grnadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fpharmacy_grnadd", "x_BILLDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php echo $pharmacy_grn_add->BILLDT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_grn_add->BRCODE->Visible) { // BRCODE ?>
	<div id="r_BRCODE" class="form-group row">
		<label id="elh_pharmacy_grn_BRCODE" for="x_BRCODE" class="<?php echo $pharmacy_grn_add->LeftColumnClass ?>"><script id="tpc_pharmacy_grn_BRCODE" type="text/html"><?php echo $pharmacy_grn_add->BRCODE->caption() ?><?php echo $pharmacy_grn_add->BRCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_grn_add->RightColumnClass ?>"><div <?php echo $pharmacy_grn_add->BRCODE->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_BRCODE" type="text/html"><span id="el_pharmacy_grn_BRCODE">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pharmacy_grn" data-field="x_BRCODE" data-value-separator="<?php echo $pharmacy_grn_add->BRCODE->displayValueSeparatorAttribute() ?>" id="x_BRCODE" name="x_BRCODE"<?php echo $pharmacy_grn_add->BRCODE->editAttributes() ?>>
			<?php echo $pharmacy_grn_add->BRCODE->selectOptionListHtml("x_BRCODE") ?>
		</select>
</div>
<?php echo $pharmacy_grn_add->BRCODE->Lookup->getParamTag($pharmacy_grn_add, "p_x_BRCODE") ?>
</span></script>
<?php echo $pharmacy_grn_add->BRCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_grn_add->BillTotalValue->Visible) { // BillTotalValue ?>
	<div id="r_BillTotalValue" class="form-group row">
		<label id="elh_pharmacy_grn_BillTotalValue" for="x_BillTotalValue" class="<?php echo $pharmacy_grn_add->LeftColumnClass ?>"><script id="tpc_pharmacy_grn_BillTotalValue" type="text/html"><?php echo $pharmacy_grn_add->BillTotalValue->caption() ?><?php echo $pharmacy_grn_add->BillTotalValue->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_grn_add->RightColumnClass ?>"><div <?php echo $pharmacy_grn_add->BillTotalValue->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_BillTotalValue" type="text/html"><span id="el_pharmacy_grn_BillTotalValue">
<input type="text" data-table="pharmacy_grn" data-field="x_BillTotalValue" name="x_BillTotalValue" id="x_BillTotalValue" size="30" placeholder="<?php echo HtmlEncode($pharmacy_grn_add->BillTotalValue->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_add->BillTotalValue->EditValue ?>"<?php echo $pharmacy_grn_add->BillTotalValue->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_grn_add->BillTotalValue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_grn_add->GRNTotalValue->Visible) { // GRNTotalValue ?>
	<div id="r_GRNTotalValue" class="form-group row">
		<label id="elh_pharmacy_grn_GRNTotalValue" for="x_GRNTotalValue" class="<?php echo $pharmacy_grn_add->LeftColumnClass ?>"><script id="tpc_pharmacy_grn_GRNTotalValue" type="text/html"><?php echo $pharmacy_grn_add->GRNTotalValue->caption() ?><?php echo $pharmacy_grn_add->GRNTotalValue->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_grn_add->RightColumnClass ?>"><div <?php echo $pharmacy_grn_add->GRNTotalValue->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_GRNTotalValue" type="text/html"><span id="el_pharmacy_grn_GRNTotalValue">
<input type="text" data-table="pharmacy_grn" data-field="x_GRNTotalValue" name="x_GRNTotalValue" id="x_GRNTotalValue" size="30" placeholder="<?php echo HtmlEncode($pharmacy_grn_add->GRNTotalValue->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_add->GRNTotalValue->EditValue ?>"<?php echo $pharmacy_grn_add->GRNTotalValue->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_grn_add->GRNTotalValue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_grn_add->BillDiscount->Visible) { // BillDiscount ?>
	<div id="r_BillDiscount" class="form-group row">
		<label id="elh_pharmacy_grn_BillDiscount" for="x_BillDiscount" class="<?php echo $pharmacy_grn_add->LeftColumnClass ?>"><script id="tpc_pharmacy_grn_BillDiscount" type="text/html"><?php echo $pharmacy_grn_add->BillDiscount->caption() ?><?php echo $pharmacy_grn_add->BillDiscount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_grn_add->RightColumnClass ?>"><div <?php echo $pharmacy_grn_add->BillDiscount->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_BillDiscount" type="text/html"><span id="el_pharmacy_grn_BillDiscount">
<input type="text" data-table="pharmacy_grn" data-field="x_BillDiscount" name="x_BillDiscount" id="x_BillDiscount" size="30" placeholder="<?php echo HtmlEncode($pharmacy_grn_add->BillDiscount->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_add->BillDiscount->EditValue ?>"<?php echo $pharmacy_grn_add->BillDiscount->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_grn_add->BillDiscount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_grn_add->BillUpload->Visible) { // BillUpload ?>
	<div id="r_BillUpload" class="form-group row">
		<label id="elh_pharmacy_grn_BillUpload" class="<?php echo $pharmacy_grn_add->LeftColumnClass ?>"><script id="tpc_pharmacy_grn_BillUpload" type="text/html"><?php echo $pharmacy_grn_add->BillUpload->caption() ?><?php echo $pharmacy_grn_add->BillUpload->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_grn_add->RightColumnClass ?>"><div <?php echo $pharmacy_grn_add->BillUpload->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_BillUpload" type="text/html"><span id="el_pharmacy_grn_BillUpload">
<div id="fd_x_BillUpload">
<div class="input-group">
	<div class="custom-file">
		<input type="file" class="custom-file-input" title="<?php echo $pharmacy_grn_add->BillUpload->title() ?>" data-table="pharmacy_grn" data-field="x_BillUpload" name="x_BillUpload" id="x_BillUpload" lang="<?php echo CurrentLanguageID() ?>"<?php echo $pharmacy_grn_add->BillUpload->editAttributes() ?><?php if ($pharmacy_grn_add->BillUpload->ReadOnly || $pharmacy_grn_add->BillUpload->Disabled) echo " disabled"; ?>>
		<label class="custom-file-label ew-file-label" for="x_BillUpload"><?php echo $Language->phrase("ChooseFile") ?></label>
	</div>
</div>
<input type="hidden" name="fn_x_BillUpload" id= "fn_x_BillUpload" value="<?php echo $pharmacy_grn_add->BillUpload->Upload->FileName ?>">
<input type="hidden" name="fa_x_BillUpload" id= "fa_x_BillUpload" value="0">
<input type="hidden" name="fs_x_BillUpload" id= "fs_x_BillUpload" value="450">
<input type="hidden" name="fx_x_BillUpload" id= "fx_x_BillUpload" value="<?php echo $pharmacy_grn_add->BillUpload->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_BillUpload" id= "fm_x_BillUpload" value="<?php echo $pharmacy_grn_add->BillUpload->UploadMaxFileSize ?>">
</div>
<table id="ft_x_BillUpload" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span></script>
<?php echo $pharmacy_grn_add->BillUpload->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_grn_add->TransPort->Visible) { // TransPort ?>
	<div id="r_TransPort" class="form-group row">
		<label id="elh_pharmacy_grn_TransPort" for="x_TransPort" class="<?php echo $pharmacy_grn_add->LeftColumnClass ?>"><script id="tpc_pharmacy_grn_TransPort" type="text/html"><?php echo $pharmacy_grn_add->TransPort->caption() ?><?php echo $pharmacy_grn_add->TransPort->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_grn_add->RightColumnClass ?>"><div <?php echo $pharmacy_grn_add->TransPort->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_TransPort" type="text/html"><span id="el_pharmacy_grn_TransPort">
<input type="text" data-table="pharmacy_grn" data-field="x_TransPort" name="x_TransPort" id="x_TransPort" size="30" placeholder="<?php echo HtmlEncode($pharmacy_grn_add->TransPort->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_add->TransPort->EditValue ?>"<?php echo $pharmacy_grn_add->TransPort->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_grn_add->TransPort->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_grn_add->AnyOther->Visible) { // AnyOther ?>
	<div id="r_AnyOther" class="form-group row">
		<label id="elh_pharmacy_grn_AnyOther" for="x_AnyOther" class="<?php echo $pharmacy_grn_add->LeftColumnClass ?>"><script id="tpc_pharmacy_grn_AnyOther" type="text/html"><?php echo $pharmacy_grn_add->AnyOther->caption() ?><?php echo $pharmacy_grn_add->AnyOther->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_grn_add->RightColumnClass ?>"><div <?php echo $pharmacy_grn_add->AnyOther->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_AnyOther" type="text/html"><span id="el_pharmacy_grn_AnyOther">
<input type="text" data-table="pharmacy_grn" data-field="x_AnyOther" name="x_AnyOther" id="x_AnyOther" size="30" placeholder="<?php echo HtmlEncode($pharmacy_grn_add->AnyOther->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_add->AnyOther->EditValue ?>"<?php echo $pharmacy_grn_add->AnyOther->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_grn_add->AnyOther->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_grn_add->Remarks->Visible) { // Remarks ?>
	<div id="r_Remarks" class="form-group row">
		<label id="elh_pharmacy_grn_Remarks" for="x_Remarks" class="<?php echo $pharmacy_grn_add->LeftColumnClass ?>"><script id="tpc_pharmacy_grn_Remarks" type="text/html"><?php echo $pharmacy_grn_add->Remarks->caption() ?><?php echo $pharmacy_grn_add->Remarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_grn_add->RightColumnClass ?>"><div <?php echo $pharmacy_grn_add->Remarks->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_Remarks" type="text/html"><span id="el_pharmacy_grn_Remarks">
<input type="text" data-table="pharmacy_grn" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" size="30" maxlength="205" placeholder="<?php echo HtmlEncode($pharmacy_grn_add->Remarks->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_add->Remarks->EditValue ?>"<?php echo $pharmacy_grn_add->Remarks->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_grn_add->Remarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_grn_add->GrnValue->Visible) { // GrnValue ?>
	<div id="r_GrnValue" class="form-group row">
		<label id="elh_pharmacy_grn_GrnValue" for="x_GrnValue" class="<?php echo $pharmacy_grn_add->LeftColumnClass ?>"><script id="tpc_pharmacy_grn_GrnValue" type="text/html"><?php echo $pharmacy_grn_add->GrnValue->caption() ?><?php echo $pharmacy_grn_add->GrnValue->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_grn_add->RightColumnClass ?>"><div <?php echo $pharmacy_grn_add->GrnValue->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_GrnValue" type="text/html"><span id="el_pharmacy_grn_GrnValue">
<input type="text" data-table="pharmacy_grn" data-field="x_GrnValue" name="x_GrnValue" id="x_GrnValue" size="30" placeholder="<?php echo HtmlEncode($pharmacy_grn_add->GrnValue->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_add->GrnValue->EditValue ?>"<?php echo $pharmacy_grn_add->GrnValue->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_grn_add->GrnValue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_grn_add->Pid->Visible) { // Pid ?>
	<div id="r_Pid" class="form-group row">
		<label id="elh_pharmacy_grn_Pid" for="x_Pid" class="<?php echo $pharmacy_grn_add->LeftColumnClass ?>"><script id="tpc_pharmacy_grn_Pid" type="text/html"><?php echo $pharmacy_grn_add->Pid->caption() ?><?php echo $pharmacy_grn_add->Pid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_grn_add->RightColumnClass ?>"><div <?php echo $pharmacy_grn_add->Pid->cellAttributes() ?>>
<?php if ($pharmacy_grn_add->Pid->getSessionValue() != "") { ?>
<script id="tpx_pharmacy_grn_Pid" type="text/html"><span id="el_pharmacy_grn_Pid">
<span<?php echo $pharmacy_grn_add->Pid->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pharmacy_grn_add->Pid->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" id="x_Pid" name="x_Pid" value="<?php echo HtmlEncode($pharmacy_grn_add->Pid->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx_pharmacy_grn_Pid" type="text/html"><span id="el_pharmacy_grn_Pid">
<input type="text" data-table="pharmacy_grn" data-field="x_Pid" name="x_Pid" id="x_Pid" size="30" placeholder="<?php echo HtmlEncode($pharmacy_grn_add->Pid->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_add->Pid->EditValue ?>"<?php echo $pharmacy_grn_add->Pid->editAttributes() ?>>
</span></script>
<?php } ?>
<?php echo $pharmacy_grn_add->Pid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_grn_add->PaymentNo->Visible) { // PaymentNo ?>
	<div id="r_PaymentNo" class="form-group row">
		<label id="elh_pharmacy_grn_PaymentNo" for="x_PaymentNo" class="<?php echo $pharmacy_grn_add->LeftColumnClass ?>"><script id="tpc_pharmacy_grn_PaymentNo" type="text/html"><?php echo $pharmacy_grn_add->PaymentNo->caption() ?><?php echo $pharmacy_grn_add->PaymentNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_grn_add->RightColumnClass ?>"><div <?php echo $pharmacy_grn_add->PaymentNo->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_PaymentNo" type="text/html"><span id="el_pharmacy_grn_PaymentNo">
<input type="text" data-table="pharmacy_grn" data-field="x_PaymentNo" name="x_PaymentNo" id="x_PaymentNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_grn_add->PaymentNo->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_add->PaymentNo->EditValue ?>"<?php echo $pharmacy_grn_add->PaymentNo->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_grn_add->PaymentNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_grn_add->PaymentStatus->Visible) { // PaymentStatus ?>
	<div id="r_PaymentStatus" class="form-group row">
		<label id="elh_pharmacy_grn_PaymentStatus" for="x_PaymentStatus" class="<?php echo $pharmacy_grn_add->LeftColumnClass ?>"><script id="tpc_pharmacy_grn_PaymentStatus" type="text/html"><?php echo $pharmacy_grn_add->PaymentStatus->caption() ?><?php echo $pharmacy_grn_add->PaymentStatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_grn_add->RightColumnClass ?>"><div <?php echo $pharmacy_grn_add->PaymentStatus->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_PaymentStatus" type="text/html"><span id="el_pharmacy_grn_PaymentStatus">
<input type="text" data-table="pharmacy_grn" data-field="x_PaymentStatus" name="x_PaymentStatus" id="x_PaymentStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pharmacy_grn_add->PaymentStatus->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_add->PaymentStatus->EditValue ?>"<?php echo $pharmacy_grn_add->PaymentStatus->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_grn_add->PaymentStatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_grn_add->PaidAmount->Visible) { // PaidAmount ?>
	<div id="r_PaidAmount" class="form-group row">
		<label id="elh_pharmacy_grn_PaidAmount" for="x_PaidAmount" class="<?php echo $pharmacy_grn_add->LeftColumnClass ?>"><script id="tpc_pharmacy_grn_PaidAmount" type="text/html"><?php echo $pharmacy_grn_add->PaidAmount->caption() ?><?php echo $pharmacy_grn_add->PaidAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $pharmacy_grn_add->RightColumnClass ?>"><div <?php echo $pharmacy_grn_add->PaidAmount->cellAttributes() ?>>
<script id="tpx_pharmacy_grn_PaidAmount" type="text/html"><span id="el_pharmacy_grn_PaidAmount">
<input type="text" data-table="pharmacy_grn" data-field="x_PaidAmount" name="x_PaidAmount" id="x_PaidAmount" size="30" placeholder="<?php echo HtmlEncode($pharmacy_grn_add->PaidAmount->getPlaceHolder()) ?>" value="<?php echo $pharmacy_grn_add->PaidAmount->EditValue ?>"<?php echo $pharmacy_grn_add->PaidAmount->editAttributes() ?>>
</span></script>
<?php echo $pharmacy_grn_add->PaidAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_pharmacy_grnadd" class="ew-custom-template"></div>
<script id="tpm_pharmacy_grnadd" type="text/html">
<div id="ct_pharmacy_grn_add"><style>
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
</style>
<div class="row">
	<div class="col-4">
		<h3 class="card-title">{{include tmpl="#tpc_pharmacy_grn_GRNNO"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_GRNNO")/}}</h3>
	</div>
</div>
<div id="divCheckbox" style="display: none;">{{include tmpl="#tpc_pharmacy_grn_pharmacy_pocol"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_pharmacy_pocol")/}}</div>
<div class="row">
	<div class="col-4">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Supplier</h3>
			</div>
			<div class="card-body">
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_BRCODE"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_BRCODE")/}}</span>
				  </div>
				 <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_PC"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_PC")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_DT"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_DT")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_YM"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_YM")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_Customercode"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_Customercode")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_Customername"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_Customername")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_BILLDT"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_BILLDT")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_BILLNO"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_BILLNO")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_BillTotalValue"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_BillTotalValue")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_BillUpload"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_BillUpload")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_Remarks"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_Remarks")/}}</span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
	<div class="col-8">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Details</h3>
			</div>
			<div class="card-body">
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_Address1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_Address1")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_Address2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_Address2")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_Address3"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_Address3")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_State"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_State")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_Pincode"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_Pincode")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_Fax"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_Fax")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_Phone"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_Phone")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_GRNTotalValue"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_GRNTotalValue")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_TransPort"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_TransPort")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_AnyOther"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_AnyOther")/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_BillDiscount"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_BillDiscount")/}}</span>
				  </div>
				  <div hidden class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pharmacy_grn_GrnValue"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_pharmacy_grn_GrnValue")/}}</span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>				
	</div>
</div>
</div>
</script>

<?php
	if (in_array("view_pharmacygrn", explode(",", $pharmacy_grn->getCurrentDetailTable())) && $view_pharmacygrn->DetailAdd) {
?>
<?php if ($pharmacy_grn->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("view_pharmacygrn", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "view_pharmacygrngrid.php" ?>
<?php } ?>
<?php if (!$pharmacy_grn_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $pharmacy_grn_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pharmacy_grn_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($pharmacy_grn->Rows) ?> };
	ew.applyTemplate("tpd_pharmacy_grnadd", "tpm_pharmacy_grnadd", "pharmacy_grnadd", "<?php echo $pharmacy_grn->CustomExport ?>", ew.templateData.rows[0]);
	$("script.pharmacy_grnadd_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$pharmacy_grn_add->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// document.write("page loaded");
	// Write your table-specific startup script here
	// document.write("page loaded");

	</script>
	<style>
	.input-group>.form-control.ew-lookup-text {
		width: 35em;
	}
	.input-group {
		position: relative;
		display: flex;
		flex-wrap: nowrap;
		align-items: stretch;
		width: 100%;
	}
	.ew-grid .ew-table, .ew-grid .ew-grid-middle-panel {
		border: 0;
		padding: 0;
		margin-bottom: 0;
		overflow-x: scroll;
	}
	</style>
	<script>
	$("[data-name='Quantity']").hide();
	$("[data-name='BillDate']").hide();

	function addtotalSum()
	{	
		var totSum = 0;
		for (var i = 1; i < 40; i++) {
				try {
					var amount = document.getElementById("x" + i + "_SalTax");
					if (amount.value != '') {

					//	totSum = parseFloat(totSum).toFixed(2) + parseFloat(amount.value).toFixed(2);
					totSum = ((Number(totSum)) + Number(amount.value));
					}
				}
				catch(err) {
				}
		}
			var BillAmount = document.getElementById("x_GRNTotalValue");

		//	BillAmount.value = parseFloat(totSum).toFixed(2);
			BillAmount.value = Math.round(totSum).toFixed(2);
			var BillAmount = document.getElementById("x_GrnValue");
			BillAmount.value = Math.round(totSum).toFixed(2);
	}
});
</script>
<?php include_once "footer.php"; ?>
<?php
$pharmacy_grn_add->terminate();
?>