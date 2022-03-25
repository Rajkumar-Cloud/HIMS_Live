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
$store_grn_add = new store_grn_add();

// Run the page
$store_grn_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$store_grn_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fstore_grnadd = currentForm = new ew.Form("fstore_grnadd", "add");

// Validate form
fstore_grnadd.validate = function() {
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
		<?php if ($store_grn_add->GRNNO->Required) { ?>
			elm = this.getElements("x" + infix + "_GRNNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_grn->GRNNO->caption(), $store_grn->GRNNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_grn_add->DT->Required) { ?>
			elm = this.getElements("x" + infix + "_DT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_grn->DT->caption(), $store_grn->DT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DT");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_grn->DT->errorMessage()) ?>");
		<?php if ($store_grn_add->YM->Required) { ?>
			elm = this.getElements("x" + infix + "_YM");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_grn->YM->caption(), $store_grn->YM->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_grn_add->PC->Required) { ?>
			elm = this.getElements("x" + infix + "_PC");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_grn->PC->caption(), $store_grn->PC->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_grn_add->Customercode->Required) { ?>
			elm = this.getElements("x" + infix + "_Customercode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_grn->Customercode->caption(), $store_grn->Customercode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_grn_add->Customername->Required) { ?>
			elm = this.getElements("x" + infix + "_Customername");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_grn->Customername->caption(), $store_grn->Customername->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_grn_add->pharmacy_pocol->Required) { ?>
			elm = this.getElements("x" + infix + "_pharmacy_pocol");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_grn->pharmacy_pocol->caption(), $store_grn->pharmacy_pocol->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_grn_add->Address1->Required) { ?>
			elm = this.getElements("x" + infix + "_Address1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_grn->Address1->caption(), $store_grn->Address1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_grn_add->Address2->Required) { ?>
			elm = this.getElements("x" + infix + "_Address2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_grn->Address2->caption(), $store_grn->Address2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_grn_add->Address3->Required) { ?>
			elm = this.getElements("x" + infix + "_Address3");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_grn->Address3->caption(), $store_grn->Address3->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_grn_add->State->Required) { ?>
			elm = this.getElements("x" + infix + "_State");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_grn->State->caption(), $store_grn->State->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_grn_add->Pincode->Required) { ?>
			elm = this.getElements("x" + infix + "_Pincode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_grn->Pincode->caption(), $store_grn->Pincode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_grn_add->Phone->Required) { ?>
			elm = this.getElements("x" + infix + "_Phone");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_grn->Phone->caption(), $store_grn->Phone->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_grn_add->Fax->Required) { ?>
			elm = this.getElements("x" + infix + "_Fax");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_grn->Fax->caption(), $store_grn->Fax->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_grn_add->EEmail->Required) { ?>
			elm = this.getElements("x" + infix + "_EEmail");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_grn->EEmail->caption(), $store_grn->EEmail->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_grn_add->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_grn->HospID->caption(), $store_grn->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_grn_add->createdby->Required) { ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_grn->createdby->caption(), $store_grn->createdby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_grn_add->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_grn->createddatetime->caption(), $store_grn->createddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_grn_add->BILLNO->Required) { ?>
			elm = this.getElements("x" + infix + "_BILLNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_grn->BILLNO->caption(), $store_grn->BILLNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_grn_add->BILLDT->Required) { ?>
			elm = this.getElements("x" + infix + "_BILLDT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_grn->BILLDT->caption(), $store_grn->BILLDT->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BILLDT");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_grn->BILLDT->errorMessage()) ?>");
		<?php if ($store_grn_add->BRCODE->Required) { ?>
			elm = this.getElements("x" + infix + "_BRCODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_grn->BRCODE->caption(), $store_grn->BRCODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_grn_add->PharmacyID->Required) { ?>
			elm = this.getElements("x" + infix + "_PharmacyID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_grn->PharmacyID->caption(), $store_grn->PharmacyID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_grn_add->BillTotalValue->Required) { ?>
			elm = this.getElements("x" + infix + "_BillTotalValue");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_grn->BillTotalValue->caption(), $store_grn->BillTotalValue->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BillTotalValue");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_grn->BillTotalValue->errorMessage()) ?>");
		<?php if ($store_grn_add->GRNTotalValue->Required) { ?>
			elm = this.getElements("x" + infix + "_GRNTotalValue");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_grn->GRNTotalValue->caption(), $store_grn->GRNTotalValue->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_GRNTotalValue");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_grn->GRNTotalValue->errorMessage()) ?>");
		<?php if ($store_grn_add->BillDiscount->Required) { ?>
			elm = this.getElements("x" + infix + "_BillDiscount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_grn->BillDiscount->caption(), $store_grn->BillDiscount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BillDiscount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_grn->BillDiscount->errorMessage()) ?>");
		<?php if ($store_grn_add->BillUpload->Required) { ?>
			felm = this.getElements("x" + infix + "_BillUpload");
			elm = this.getElements("fn_x" + infix + "_BillUpload");
			if (felm && elm && !ew.hasValue(elm))
				return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $store_grn->BillUpload->caption(), $store_grn->BillUpload->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_grn_add->TransPort->Required) { ?>
			elm = this.getElements("x" + infix + "_TransPort");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_grn->TransPort->caption(), $store_grn->TransPort->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TransPort");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_grn->TransPort->errorMessage()) ?>");
		<?php if ($store_grn_add->AnyOther->Required) { ?>
			elm = this.getElements("x" + infix + "_AnyOther");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_grn->AnyOther->caption(), $store_grn->AnyOther->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_AnyOther");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_grn->AnyOther->errorMessage()) ?>");
		<?php if ($store_grn_add->Remarks->Required) { ?>
			elm = this.getElements("x" + infix + "_Remarks");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_grn->Remarks->caption(), $store_grn->Remarks->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_grn_add->GrnValue->Required) { ?>
			elm = this.getElements("x" + infix + "_GrnValue");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_grn->GrnValue->caption(), $store_grn->GrnValue->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_GrnValue");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_grn->GrnValue->errorMessage()) ?>");
		<?php if ($store_grn_add->Pid->Required) { ?>
			elm = this.getElements("x" + infix + "_Pid");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_grn->Pid->caption(), $store_grn->Pid->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Pid");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_grn->Pid->errorMessage()) ?>");
		<?php if ($store_grn_add->PaymentNo->Required) { ?>
			elm = this.getElements("x" + infix + "_PaymentNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_grn->PaymentNo->caption(), $store_grn->PaymentNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_grn_add->PaymentStatus->Required) { ?>
			elm = this.getElements("x" + infix + "_PaymentStatus");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_grn->PaymentStatus->caption(), $store_grn->PaymentStatus->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_grn_add->PaidAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_PaidAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_grn->PaidAmount->caption(), $store_grn->PaidAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PaidAmount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_grn->PaidAmount->errorMessage()) ?>");
		<?php if ($store_grn_add->StoreID->Required) { ?>
			elm = this.getElements("x" + infix + "_StoreID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_grn->StoreID->caption(), $store_grn->StoreID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_StoreID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_grn->StoreID->errorMessage()) ?>");

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
fstore_grnadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fstore_grnadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fstore_grnadd.lists["x_PC"] = <?php echo $store_grn_add->PC->Lookup->toClientList() ?>;
fstore_grnadd.lists["x_PC"].options = <?php echo JsonEncode($store_grn_add->PC->lookupOptions()) ?>;
fstore_grnadd.lists["x_BRCODE"] = <?php echo $store_grn_add->BRCODE->Lookup->toClientList() ?>;
fstore_grnadd.lists["x_BRCODE"].options = <?php echo JsonEncode($store_grn_add->BRCODE->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $store_grn_add->showPageHeader(); ?>
<?php
$store_grn_add->showMessage();
?>
<form name="fstore_grnadd" id="fstore_grnadd" class="<?php echo $store_grn_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($store_grn_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $store_grn_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="store_grn">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$store_grn_add->IsModal ?>">
<?php if ($store_grn->getCurrentMasterTable() == "store_payment") { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="store_payment">
<input type="hidden" name="fk_id" value="<?php echo $store_grn->Pid->getSessionValue() ?>">
<?php } ?>
<div class="ew-add-div d-none"><!-- page* -->
<?php if ($store_grn->GRNNO->Visible) { // GRNNO ?>
	<div id="r_GRNNO" class="form-group row">
		<label id="elh_store_grn_GRNNO" for="x_GRNNO" class="<?php echo $store_grn_add->LeftColumnClass ?>"><script id="tpc_store_grn_GRNNO" class="store_grnadd" type="text/html"><span><?php echo $store_grn->GRNNO->caption() ?><?php echo ($store_grn->GRNNO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_grn_add->RightColumnClass ?>"><div<?php echo $store_grn->GRNNO->cellAttributes() ?>>
<script id="tpx_store_grn_GRNNO" class="store_grnadd" type="text/html">
<span id="el_store_grn_GRNNO">
<input type="text" data-table="store_grn" data-field="x_GRNNO" name="x_GRNNO" id="x_GRNNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_grn->GRNNO->getPlaceHolder()) ?>" value="<?php echo $store_grn->GRNNO->EditValue ?>"<?php echo $store_grn->GRNNO->editAttributes() ?>>
</span>
</script>
<?php echo $store_grn->GRNNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_grn->DT->Visible) { // DT ?>
	<div id="r_DT" class="form-group row">
		<label id="elh_store_grn_DT" for="x_DT" class="<?php echo $store_grn_add->LeftColumnClass ?>"><script id="tpc_store_grn_DT" class="store_grnadd" type="text/html"><span><?php echo $store_grn->DT->caption() ?><?php echo ($store_grn->DT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_grn_add->RightColumnClass ?>"><div<?php echo $store_grn->DT->cellAttributes() ?>>
<script id="tpx_store_grn_DT" class="store_grnadd" type="text/html">
<span id="el_store_grn_DT">
<input type="text" data-table="store_grn" data-field="x_DT" name="x_DT" id="x_DT" placeholder="<?php echo HtmlEncode($store_grn->DT->getPlaceHolder()) ?>" value="<?php echo $store_grn->DT->EditValue ?>"<?php echo $store_grn->DT->editAttributes() ?>>
<?php if (!$store_grn->DT->ReadOnly && !$store_grn->DT->Disabled && !isset($store_grn->DT->EditAttrs["readonly"]) && !isset($store_grn->DT->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="store_grnadd_js">
ew.createDateTimePicker("fstore_grnadd", "x_DT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php echo $store_grn->DT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_grn->YM->Visible) { // YM ?>
	<div id="r_YM" class="form-group row">
		<label id="elh_store_grn_YM" for="x_YM" class="<?php echo $store_grn_add->LeftColumnClass ?>"><script id="tpc_store_grn_YM" class="store_grnadd" type="text/html"><span><?php echo $store_grn->YM->caption() ?><?php echo ($store_grn->YM->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_grn_add->RightColumnClass ?>"><div<?php echo $store_grn->YM->cellAttributes() ?>>
<script id="tpx_store_grn_YM" class="store_grnadd" type="text/html">
<span id="el_store_grn_YM">
<input type="text" data-table="store_grn" data-field="x_YM" name="x_YM" id="x_YM" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_grn->YM->getPlaceHolder()) ?>" value="<?php echo $store_grn->YM->EditValue ?>"<?php echo $store_grn->YM->editAttributes() ?>>
</span>
</script>
<?php echo $store_grn->YM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_grn->PC->Visible) { // PC ?>
	<div id="r_PC" class="form-group row">
		<label id="elh_store_grn_PC" for="x_PC" class="<?php echo $store_grn_add->LeftColumnClass ?>"><script id="tpc_store_grn_PC" class="store_grnadd" type="text/html"><span><?php echo $store_grn->PC->caption() ?><?php echo ($store_grn->PC->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_grn_add->RightColumnClass ?>"><div<?php echo $store_grn->PC->cellAttributes() ?>>
<script id="tpx_store_grn_PC" class="store_grnadd" type="text/html">
<span id="el_store_grn_PC">
<?php $store_grn->PC->EditAttrs["onchange"] = "ew.autoFill(this);" . @$store_grn->PC->EditAttrs["onchange"]; ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_PC"><?php echo strval($store_grn->PC->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($store_grn->PC->ViewValue) : $store_grn->PC->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($store_grn->PC->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($store_grn->PC->ReadOnly || $store_grn->PC->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_PC',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
<?php if (AllowAdd(CurrentProjectID() . "store_suppliers") && !$store_grn->PC->ReadOnly) { ?>
<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_PC" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $store_grn->PC->caption() ?>" data-title="<?php echo $store_grn->PC->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_PC',url:'store_suppliersaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button>
<?php } ?>
	</div>
</div>
<?php echo $store_grn->PC->Lookup->getParamTag("p_x_PC") ?>
<input type="hidden" data-table="store_grn" data-field="x_PC" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $store_grn->PC->displayValueSeparatorAttribute() ?>" name="x_PC" id="x_PC" value="<?php echo $store_grn->PC->CurrentValue ?>"<?php echo $store_grn->PC->editAttributes() ?>>
</span>
</script>
<?php echo $store_grn->PC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_grn->Customercode->Visible) { // Customercode ?>
	<div id="r_Customercode" class="form-group row">
		<label id="elh_store_grn_Customercode" for="x_Customercode" class="<?php echo $store_grn_add->LeftColumnClass ?>"><script id="tpc_store_grn_Customercode" class="store_grnadd" type="text/html"><span><?php echo $store_grn->Customercode->caption() ?><?php echo ($store_grn->Customercode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_grn_add->RightColumnClass ?>"><div<?php echo $store_grn->Customercode->cellAttributes() ?>>
<script id="tpx_store_grn_Customercode" class="store_grnadd" type="text/html">
<span id="el_store_grn_Customercode">
<input type="text" data-table="store_grn" data-field="x_Customercode" name="x_Customercode" id="x_Customercode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_grn->Customercode->getPlaceHolder()) ?>" value="<?php echo $store_grn->Customercode->EditValue ?>"<?php echo $store_grn->Customercode->editAttributes() ?>>
</span>
</script>
<?php echo $store_grn->Customercode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_grn->Customername->Visible) { // Customername ?>
	<div id="r_Customername" class="form-group row">
		<label id="elh_store_grn_Customername" for="x_Customername" class="<?php echo $store_grn_add->LeftColumnClass ?>"><script id="tpc_store_grn_Customername" class="store_grnadd" type="text/html"><span><?php echo $store_grn->Customername->caption() ?><?php echo ($store_grn->Customername->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_grn_add->RightColumnClass ?>"><div<?php echo $store_grn->Customername->cellAttributes() ?>>
<script id="tpx_store_grn_Customername" class="store_grnadd" type="text/html">
<span id="el_store_grn_Customername">
<input type="text" data-table="store_grn" data-field="x_Customername" name="x_Customername" id="x_Customername" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_grn->Customername->getPlaceHolder()) ?>" value="<?php echo $store_grn->Customername->EditValue ?>"<?php echo $store_grn->Customername->editAttributes() ?>>
</span>
</script>
<?php echo $store_grn->Customername->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_grn->pharmacy_pocol->Visible) { // pharmacy_pocol ?>
	<div id="r_pharmacy_pocol" class="form-group row">
		<label id="elh_store_grn_pharmacy_pocol" for="x_pharmacy_pocol" class="<?php echo $store_grn_add->LeftColumnClass ?>"><script id="tpc_store_grn_pharmacy_pocol" class="store_grnadd" type="text/html"><span><?php echo $store_grn->pharmacy_pocol->caption() ?><?php echo ($store_grn->pharmacy_pocol->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_grn_add->RightColumnClass ?>"><div<?php echo $store_grn->pharmacy_pocol->cellAttributes() ?>>
<script id="tpx_store_grn_pharmacy_pocol" class="store_grnadd" type="text/html">
<span id="el_store_grn_pharmacy_pocol">
<input type="text" data-table="store_grn" data-field="x_pharmacy_pocol" name="x_pharmacy_pocol" id="x_pharmacy_pocol" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_grn->pharmacy_pocol->getPlaceHolder()) ?>" value="<?php echo $store_grn->pharmacy_pocol->EditValue ?>"<?php echo $store_grn->pharmacy_pocol->editAttributes() ?>>
</span>
</script>
<?php echo $store_grn->pharmacy_pocol->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_grn->Address1->Visible) { // Address1 ?>
	<div id="r_Address1" class="form-group row">
		<label id="elh_store_grn_Address1" for="x_Address1" class="<?php echo $store_grn_add->LeftColumnClass ?>"><script id="tpc_store_grn_Address1" class="store_grnadd" type="text/html"><span><?php echo $store_grn->Address1->caption() ?><?php echo ($store_grn->Address1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_grn_add->RightColumnClass ?>"><div<?php echo $store_grn->Address1->cellAttributes() ?>>
<script id="tpx_store_grn_Address1" class="store_grnadd" type="text/html">
<span id="el_store_grn_Address1">
<input type="text" data-table="store_grn" data-field="x_Address1" name="x_Address1" id="x_Address1" placeholder="<?php echo HtmlEncode($store_grn->Address1->getPlaceHolder()) ?>" value="<?php echo $store_grn->Address1->EditValue ?>"<?php echo $store_grn->Address1->editAttributes() ?>>
</span>
</script>
<?php echo $store_grn->Address1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_grn->Address2->Visible) { // Address2 ?>
	<div id="r_Address2" class="form-group row">
		<label id="elh_store_grn_Address2" for="x_Address2" class="<?php echo $store_grn_add->LeftColumnClass ?>"><script id="tpc_store_grn_Address2" class="store_grnadd" type="text/html"><span><?php echo $store_grn->Address2->caption() ?><?php echo ($store_grn->Address2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_grn_add->RightColumnClass ?>"><div<?php echo $store_grn->Address2->cellAttributes() ?>>
<script id="tpx_store_grn_Address2" class="store_grnadd" type="text/html">
<span id="el_store_grn_Address2">
<input type="text" data-table="store_grn" data-field="x_Address2" name="x_Address2" id="x_Address2" placeholder="<?php echo HtmlEncode($store_grn->Address2->getPlaceHolder()) ?>" value="<?php echo $store_grn->Address2->EditValue ?>"<?php echo $store_grn->Address2->editAttributes() ?>>
</span>
</script>
<?php echo $store_grn->Address2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_grn->Address3->Visible) { // Address3 ?>
	<div id="r_Address3" class="form-group row">
		<label id="elh_store_grn_Address3" for="x_Address3" class="<?php echo $store_grn_add->LeftColumnClass ?>"><script id="tpc_store_grn_Address3" class="store_grnadd" type="text/html"><span><?php echo $store_grn->Address3->caption() ?><?php echo ($store_grn->Address3->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_grn_add->RightColumnClass ?>"><div<?php echo $store_grn->Address3->cellAttributes() ?>>
<script id="tpx_store_grn_Address3" class="store_grnadd" type="text/html">
<span id="el_store_grn_Address3">
<input type="text" data-table="store_grn" data-field="x_Address3" name="x_Address3" id="x_Address3" placeholder="<?php echo HtmlEncode($store_grn->Address3->getPlaceHolder()) ?>" value="<?php echo $store_grn->Address3->EditValue ?>"<?php echo $store_grn->Address3->editAttributes() ?>>
</span>
</script>
<?php echo $store_grn->Address3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_grn->State->Visible) { // State ?>
	<div id="r_State" class="form-group row">
		<label id="elh_store_grn_State" for="x_State" class="<?php echo $store_grn_add->LeftColumnClass ?>"><script id="tpc_store_grn_State" class="store_grnadd" type="text/html"><span><?php echo $store_grn->State->caption() ?><?php echo ($store_grn->State->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_grn_add->RightColumnClass ?>"><div<?php echo $store_grn->State->cellAttributes() ?>>
<script id="tpx_store_grn_State" class="store_grnadd" type="text/html">
<span id="el_store_grn_State">
<input type="text" data-table="store_grn" data-field="x_State" name="x_State" id="x_State" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_grn->State->getPlaceHolder()) ?>" value="<?php echo $store_grn->State->EditValue ?>"<?php echo $store_grn->State->editAttributes() ?>>
</span>
</script>
<?php echo $store_grn->State->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_grn->Pincode->Visible) { // Pincode ?>
	<div id="r_Pincode" class="form-group row">
		<label id="elh_store_grn_Pincode" for="x_Pincode" class="<?php echo $store_grn_add->LeftColumnClass ?>"><script id="tpc_store_grn_Pincode" class="store_grnadd" type="text/html"><span><?php echo $store_grn->Pincode->caption() ?><?php echo ($store_grn->Pincode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_grn_add->RightColumnClass ?>"><div<?php echo $store_grn->Pincode->cellAttributes() ?>>
<script id="tpx_store_grn_Pincode" class="store_grnadd" type="text/html">
<span id="el_store_grn_Pincode">
<input type="text" data-table="store_grn" data-field="x_Pincode" name="x_Pincode" id="x_Pincode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_grn->Pincode->getPlaceHolder()) ?>" value="<?php echo $store_grn->Pincode->EditValue ?>"<?php echo $store_grn->Pincode->editAttributes() ?>>
</span>
</script>
<?php echo $store_grn->Pincode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_grn->Phone->Visible) { // Phone ?>
	<div id="r_Phone" class="form-group row">
		<label id="elh_store_grn_Phone" for="x_Phone" class="<?php echo $store_grn_add->LeftColumnClass ?>"><script id="tpc_store_grn_Phone" class="store_grnadd" type="text/html"><span><?php echo $store_grn->Phone->caption() ?><?php echo ($store_grn->Phone->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_grn_add->RightColumnClass ?>"><div<?php echo $store_grn->Phone->cellAttributes() ?>>
<script id="tpx_store_grn_Phone" class="store_grnadd" type="text/html">
<span id="el_store_grn_Phone">
<input type="text" data-table="store_grn" data-field="x_Phone" name="x_Phone" id="x_Phone" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_grn->Phone->getPlaceHolder()) ?>" value="<?php echo $store_grn->Phone->EditValue ?>"<?php echo $store_grn->Phone->editAttributes() ?>>
</span>
</script>
<?php echo $store_grn->Phone->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_grn->Fax->Visible) { // Fax ?>
	<div id="r_Fax" class="form-group row">
		<label id="elh_store_grn_Fax" for="x_Fax" class="<?php echo $store_grn_add->LeftColumnClass ?>"><script id="tpc_store_grn_Fax" class="store_grnadd" type="text/html"><span><?php echo $store_grn->Fax->caption() ?><?php echo ($store_grn->Fax->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_grn_add->RightColumnClass ?>"><div<?php echo $store_grn->Fax->cellAttributes() ?>>
<script id="tpx_store_grn_Fax" class="store_grnadd" type="text/html">
<span id="el_store_grn_Fax">
<input type="text" data-table="store_grn" data-field="x_Fax" name="x_Fax" id="x_Fax" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_grn->Fax->getPlaceHolder()) ?>" value="<?php echo $store_grn->Fax->EditValue ?>"<?php echo $store_grn->Fax->editAttributes() ?>>
</span>
</script>
<?php echo $store_grn->Fax->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_grn->EEmail->Visible) { // EEmail ?>
	<div id="r_EEmail" class="form-group row">
		<label id="elh_store_grn_EEmail" for="x_EEmail" class="<?php echo $store_grn_add->LeftColumnClass ?>"><script id="tpc_store_grn_EEmail" class="store_grnadd" type="text/html"><span><?php echo $store_grn->EEmail->caption() ?><?php echo ($store_grn->EEmail->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_grn_add->RightColumnClass ?>"><div<?php echo $store_grn->EEmail->cellAttributes() ?>>
<script id="tpx_store_grn_EEmail" class="store_grnadd" type="text/html">
<span id="el_store_grn_EEmail">
<input type="text" data-table="store_grn" data-field="x_EEmail" name="x_EEmail" id="x_EEmail" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_grn->EEmail->getPlaceHolder()) ?>" value="<?php echo $store_grn->EEmail->EditValue ?>"<?php echo $store_grn->EEmail->editAttributes() ?>>
</span>
</script>
<?php echo $store_grn->EEmail->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_grn->BILLNO->Visible) { // BILLNO ?>
	<div id="r_BILLNO" class="form-group row">
		<label id="elh_store_grn_BILLNO" for="x_BILLNO" class="<?php echo $store_grn_add->LeftColumnClass ?>"><script id="tpc_store_grn_BILLNO" class="store_grnadd" type="text/html"><span><?php echo $store_grn->BILLNO->caption() ?><?php echo ($store_grn->BILLNO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_grn_add->RightColumnClass ?>"><div<?php echo $store_grn->BILLNO->cellAttributes() ?>>
<script id="tpx_store_grn_BILLNO" class="store_grnadd" type="text/html">
<span id="el_store_grn_BILLNO">
<input type="text" data-table="store_grn" data-field="x_BILLNO" name="x_BILLNO" id="x_BILLNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_grn->BILLNO->getPlaceHolder()) ?>" value="<?php echo $store_grn->BILLNO->EditValue ?>"<?php echo $store_grn->BILLNO->editAttributes() ?>>
</span>
</script>
<?php echo $store_grn->BILLNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_grn->BILLDT->Visible) { // BILLDT ?>
	<div id="r_BILLDT" class="form-group row">
		<label id="elh_store_grn_BILLDT" for="x_BILLDT" class="<?php echo $store_grn_add->LeftColumnClass ?>"><script id="tpc_store_grn_BILLDT" class="store_grnadd" type="text/html"><span><?php echo $store_grn->BILLDT->caption() ?><?php echo ($store_grn->BILLDT->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_grn_add->RightColumnClass ?>"><div<?php echo $store_grn->BILLDT->cellAttributes() ?>>
<script id="tpx_store_grn_BILLDT" class="store_grnadd" type="text/html">
<span id="el_store_grn_BILLDT">
<input type="text" data-table="store_grn" data-field="x_BILLDT" name="x_BILLDT" id="x_BILLDT" placeholder="<?php echo HtmlEncode($store_grn->BILLDT->getPlaceHolder()) ?>" value="<?php echo $store_grn->BILLDT->EditValue ?>"<?php echo $store_grn->BILLDT->editAttributes() ?>>
<?php if (!$store_grn->BILLDT->ReadOnly && !$store_grn->BILLDT->Disabled && !isset($store_grn->BILLDT->EditAttrs["readonly"]) && !isset($store_grn->BILLDT->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="store_grnadd_js">
ew.createDateTimePicker("fstore_grnadd", "x_BILLDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php echo $store_grn->BILLDT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_grn->BRCODE->Visible) { // BRCODE ?>
	<div id="r_BRCODE" class="form-group row">
		<label id="elh_store_grn_BRCODE" for="x_BRCODE" class="<?php echo $store_grn_add->LeftColumnClass ?>"><script id="tpc_store_grn_BRCODE" class="store_grnadd" type="text/html"><span><?php echo $store_grn->BRCODE->caption() ?><?php echo ($store_grn->BRCODE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_grn_add->RightColumnClass ?>"><div<?php echo $store_grn->BRCODE->cellAttributes() ?>>
<script id="tpx_store_grn_BRCODE" class="store_grnadd" type="text/html">
<span id="el_store_grn_BRCODE">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="store_grn" data-field="x_BRCODE" data-value-separator="<?php echo $store_grn->BRCODE->displayValueSeparatorAttribute() ?>" id="x_BRCODE" name="x_BRCODE"<?php echo $store_grn->BRCODE->editAttributes() ?>>
		<?php echo $store_grn->BRCODE->selectOptionListHtml("x_BRCODE") ?>
	</select>
</div>
<?php echo $store_grn->BRCODE->Lookup->getParamTag("p_x_BRCODE") ?>
</span>
</script>
<?php echo $store_grn->BRCODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_grn->BillTotalValue->Visible) { // BillTotalValue ?>
	<div id="r_BillTotalValue" class="form-group row">
		<label id="elh_store_grn_BillTotalValue" for="x_BillTotalValue" class="<?php echo $store_grn_add->LeftColumnClass ?>"><script id="tpc_store_grn_BillTotalValue" class="store_grnadd" type="text/html"><span><?php echo $store_grn->BillTotalValue->caption() ?><?php echo ($store_grn->BillTotalValue->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_grn_add->RightColumnClass ?>"><div<?php echo $store_grn->BillTotalValue->cellAttributes() ?>>
<script id="tpx_store_grn_BillTotalValue" class="store_grnadd" type="text/html">
<span id="el_store_grn_BillTotalValue">
<input type="text" data-table="store_grn" data-field="x_BillTotalValue" name="x_BillTotalValue" id="x_BillTotalValue" size="30" placeholder="<?php echo HtmlEncode($store_grn->BillTotalValue->getPlaceHolder()) ?>" value="<?php echo $store_grn->BillTotalValue->EditValue ?>"<?php echo $store_grn->BillTotalValue->editAttributes() ?>>
</span>
</script>
<?php echo $store_grn->BillTotalValue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_grn->GRNTotalValue->Visible) { // GRNTotalValue ?>
	<div id="r_GRNTotalValue" class="form-group row">
		<label id="elh_store_grn_GRNTotalValue" for="x_GRNTotalValue" class="<?php echo $store_grn_add->LeftColumnClass ?>"><script id="tpc_store_grn_GRNTotalValue" class="store_grnadd" type="text/html"><span><?php echo $store_grn->GRNTotalValue->caption() ?><?php echo ($store_grn->GRNTotalValue->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_grn_add->RightColumnClass ?>"><div<?php echo $store_grn->GRNTotalValue->cellAttributes() ?>>
<script id="tpx_store_grn_GRNTotalValue" class="store_grnadd" type="text/html">
<span id="el_store_grn_GRNTotalValue">
<input type="text" data-table="store_grn" data-field="x_GRNTotalValue" name="x_GRNTotalValue" id="x_GRNTotalValue" size="30" placeholder="<?php echo HtmlEncode($store_grn->GRNTotalValue->getPlaceHolder()) ?>" value="<?php echo $store_grn->GRNTotalValue->EditValue ?>"<?php echo $store_grn->GRNTotalValue->editAttributes() ?>>
</span>
</script>
<?php echo $store_grn->GRNTotalValue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_grn->BillDiscount->Visible) { // BillDiscount ?>
	<div id="r_BillDiscount" class="form-group row">
		<label id="elh_store_grn_BillDiscount" for="x_BillDiscount" class="<?php echo $store_grn_add->LeftColumnClass ?>"><script id="tpc_store_grn_BillDiscount" class="store_grnadd" type="text/html"><span><?php echo $store_grn->BillDiscount->caption() ?><?php echo ($store_grn->BillDiscount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_grn_add->RightColumnClass ?>"><div<?php echo $store_grn->BillDiscount->cellAttributes() ?>>
<script id="tpx_store_grn_BillDiscount" class="store_grnadd" type="text/html">
<span id="el_store_grn_BillDiscount">
<input type="text" data-table="store_grn" data-field="x_BillDiscount" name="x_BillDiscount" id="x_BillDiscount" size="30" placeholder="<?php echo HtmlEncode($store_grn->BillDiscount->getPlaceHolder()) ?>" value="<?php echo $store_grn->BillDiscount->EditValue ?>"<?php echo $store_grn->BillDiscount->editAttributes() ?>>
</span>
</script>
<?php echo $store_grn->BillDiscount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_grn->BillUpload->Visible) { // BillUpload ?>
	<div id="r_BillUpload" class="form-group row">
		<label id="elh_store_grn_BillUpload" class="<?php echo $store_grn_add->LeftColumnClass ?>"><script id="tpc_store_grn_BillUpload" class="store_grnadd" type="text/html"><span><?php echo $store_grn->BillUpload->caption() ?><?php echo ($store_grn->BillUpload->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_grn_add->RightColumnClass ?>"><div<?php echo $store_grn->BillUpload->cellAttributes() ?>>
<script id="tpx_store_grn_BillUpload" class="store_grnadd" type="text/html">
<span id="el_store_grn_BillUpload">
<div id="fd_x_BillUpload">
<span title="<?php echo $store_grn->BillUpload->title() ? $store_grn->BillUpload->title() : $Language->phrase("ChooseFile") ?>" class="btn btn-default btn-sm fileinput-button ew-tooltip<?php if ($store_grn->BillUpload->ReadOnly || $store_grn->BillUpload->Disabled) echo " d-none"; ?>">
	<span><?php echo $Language->phrase("ChooseFileBtn") ?></span>
	<input type="file" title=" " data-table="store_grn" data-field="x_BillUpload" name="x_BillUpload" id="x_BillUpload"<?php echo $store_grn->BillUpload->editAttributes() ?>>
</span>
<input type="hidden" name="fn_x_BillUpload" id= "fn_x_BillUpload" value="<?php echo $store_grn->BillUpload->Upload->FileName ?>">
<input type="hidden" name="fa_x_BillUpload" id= "fa_x_BillUpload" value="0">
<input type="hidden" name="fs_x_BillUpload" id= "fs_x_BillUpload" value="450">
<input type="hidden" name="fx_x_BillUpload" id= "fx_x_BillUpload" value="<?php echo $store_grn->BillUpload->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_BillUpload" id= "fm_x_BillUpload" value="<?php echo $store_grn->BillUpload->UploadMaxFileSize ?>">
</div>
<table id="ft_x_BillUpload" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
</script>
<?php echo $store_grn->BillUpload->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_grn->TransPort->Visible) { // TransPort ?>
	<div id="r_TransPort" class="form-group row">
		<label id="elh_store_grn_TransPort" for="x_TransPort" class="<?php echo $store_grn_add->LeftColumnClass ?>"><script id="tpc_store_grn_TransPort" class="store_grnadd" type="text/html"><span><?php echo $store_grn->TransPort->caption() ?><?php echo ($store_grn->TransPort->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_grn_add->RightColumnClass ?>"><div<?php echo $store_grn->TransPort->cellAttributes() ?>>
<script id="tpx_store_grn_TransPort" class="store_grnadd" type="text/html">
<span id="el_store_grn_TransPort">
<input type="text" data-table="store_grn" data-field="x_TransPort" name="x_TransPort" id="x_TransPort" size="30" placeholder="<?php echo HtmlEncode($store_grn->TransPort->getPlaceHolder()) ?>" value="<?php echo $store_grn->TransPort->EditValue ?>"<?php echo $store_grn->TransPort->editAttributes() ?>>
</span>
</script>
<?php echo $store_grn->TransPort->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_grn->AnyOther->Visible) { // AnyOther ?>
	<div id="r_AnyOther" class="form-group row">
		<label id="elh_store_grn_AnyOther" for="x_AnyOther" class="<?php echo $store_grn_add->LeftColumnClass ?>"><script id="tpc_store_grn_AnyOther" class="store_grnadd" type="text/html"><span><?php echo $store_grn->AnyOther->caption() ?><?php echo ($store_grn->AnyOther->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_grn_add->RightColumnClass ?>"><div<?php echo $store_grn->AnyOther->cellAttributes() ?>>
<script id="tpx_store_grn_AnyOther" class="store_grnadd" type="text/html">
<span id="el_store_grn_AnyOther">
<input type="text" data-table="store_grn" data-field="x_AnyOther" name="x_AnyOther" id="x_AnyOther" size="30" placeholder="<?php echo HtmlEncode($store_grn->AnyOther->getPlaceHolder()) ?>" value="<?php echo $store_grn->AnyOther->EditValue ?>"<?php echo $store_grn->AnyOther->editAttributes() ?>>
</span>
</script>
<?php echo $store_grn->AnyOther->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_grn->Remarks->Visible) { // Remarks ?>
	<div id="r_Remarks" class="form-group row">
		<label id="elh_store_grn_Remarks" for="x_Remarks" class="<?php echo $store_grn_add->LeftColumnClass ?>"><script id="tpc_store_grn_Remarks" class="store_grnadd" type="text/html"><span><?php echo $store_grn->Remarks->caption() ?><?php echo ($store_grn->Remarks->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_grn_add->RightColumnClass ?>"><div<?php echo $store_grn->Remarks->cellAttributes() ?>>
<script id="tpx_store_grn_Remarks" class="store_grnadd" type="text/html">
<span id="el_store_grn_Remarks">
<input type="text" data-table="store_grn" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" size="30" maxlength="205" placeholder="<?php echo HtmlEncode($store_grn->Remarks->getPlaceHolder()) ?>" value="<?php echo $store_grn->Remarks->EditValue ?>"<?php echo $store_grn->Remarks->editAttributes() ?>>
</span>
</script>
<?php echo $store_grn->Remarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_grn->GrnValue->Visible) { // GrnValue ?>
	<div id="r_GrnValue" class="form-group row">
		<label id="elh_store_grn_GrnValue" for="x_GrnValue" class="<?php echo $store_grn_add->LeftColumnClass ?>"><script id="tpc_store_grn_GrnValue" class="store_grnadd" type="text/html"><span><?php echo $store_grn->GrnValue->caption() ?><?php echo ($store_grn->GrnValue->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_grn_add->RightColumnClass ?>"><div<?php echo $store_grn->GrnValue->cellAttributes() ?>>
<script id="tpx_store_grn_GrnValue" class="store_grnadd" type="text/html">
<span id="el_store_grn_GrnValue">
<input type="text" data-table="store_grn" data-field="x_GrnValue" name="x_GrnValue" id="x_GrnValue" size="30" placeholder="<?php echo HtmlEncode($store_grn->GrnValue->getPlaceHolder()) ?>" value="<?php echo $store_grn->GrnValue->EditValue ?>"<?php echo $store_grn->GrnValue->editAttributes() ?>>
</span>
</script>
<?php echo $store_grn->GrnValue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_grn->Pid->Visible) { // Pid ?>
	<div id="r_Pid" class="form-group row">
		<label id="elh_store_grn_Pid" for="x_Pid" class="<?php echo $store_grn_add->LeftColumnClass ?>"><script id="tpc_store_grn_Pid" class="store_grnadd" type="text/html"><span><?php echo $store_grn->Pid->caption() ?><?php echo ($store_grn->Pid->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_grn_add->RightColumnClass ?>"><div<?php echo $store_grn->Pid->cellAttributes() ?>>
<?php if ($store_grn->Pid->getSessionValue() <> "") { ?>
<script id="tpx_store_grn_Pid" class="store_grnadd" type="text/html">
<span id="el_store_grn_Pid">
<span<?php echo $store_grn->Pid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($store_grn->Pid->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" id="x_Pid" name="x_Pid" value="<?php echo HtmlEncode($store_grn->Pid->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx_store_grn_Pid" class="store_grnadd" type="text/html">
<span id="el_store_grn_Pid">
<input type="text" data-table="store_grn" data-field="x_Pid" name="x_Pid" id="x_Pid" size="30" placeholder="<?php echo HtmlEncode($store_grn->Pid->getPlaceHolder()) ?>" value="<?php echo $store_grn->Pid->EditValue ?>"<?php echo $store_grn->Pid->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php echo $store_grn->Pid->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_grn->PaymentNo->Visible) { // PaymentNo ?>
	<div id="r_PaymentNo" class="form-group row">
		<label id="elh_store_grn_PaymentNo" for="x_PaymentNo" class="<?php echo $store_grn_add->LeftColumnClass ?>"><script id="tpc_store_grn_PaymentNo" class="store_grnadd" type="text/html"><span><?php echo $store_grn->PaymentNo->caption() ?><?php echo ($store_grn->PaymentNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_grn_add->RightColumnClass ?>"><div<?php echo $store_grn->PaymentNo->cellAttributes() ?>>
<script id="tpx_store_grn_PaymentNo" class="store_grnadd" type="text/html">
<span id="el_store_grn_PaymentNo">
<input type="text" data-table="store_grn" data-field="x_PaymentNo" name="x_PaymentNo" id="x_PaymentNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_grn->PaymentNo->getPlaceHolder()) ?>" value="<?php echo $store_grn->PaymentNo->EditValue ?>"<?php echo $store_grn->PaymentNo->editAttributes() ?>>
</span>
</script>
<?php echo $store_grn->PaymentNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_grn->PaymentStatus->Visible) { // PaymentStatus ?>
	<div id="r_PaymentStatus" class="form-group row">
		<label id="elh_store_grn_PaymentStatus" for="x_PaymentStatus" class="<?php echo $store_grn_add->LeftColumnClass ?>"><script id="tpc_store_grn_PaymentStatus" class="store_grnadd" type="text/html"><span><?php echo $store_grn->PaymentStatus->caption() ?><?php echo ($store_grn->PaymentStatus->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_grn_add->RightColumnClass ?>"><div<?php echo $store_grn->PaymentStatus->cellAttributes() ?>>
<script id="tpx_store_grn_PaymentStatus" class="store_grnadd" type="text/html">
<span id="el_store_grn_PaymentStatus">
<input type="text" data-table="store_grn" data-field="x_PaymentStatus" name="x_PaymentStatus" id="x_PaymentStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($store_grn->PaymentStatus->getPlaceHolder()) ?>" value="<?php echo $store_grn->PaymentStatus->EditValue ?>"<?php echo $store_grn->PaymentStatus->editAttributes() ?>>
</span>
</script>
<?php echo $store_grn->PaymentStatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_grn->PaidAmount->Visible) { // PaidAmount ?>
	<div id="r_PaidAmount" class="form-group row">
		<label id="elh_store_grn_PaidAmount" for="x_PaidAmount" class="<?php echo $store_grn_add->LeftColumnClass ?>"><script id="tpc_store_grn_PaidAmount" class="store_grnadd" type="text/html"><span><?php echo $store_grn->PaidAmount->caption() ?><?php echo ($store_grn->PaidAmount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_grn_add->RightColumnClass ?>"><div<?php echo $store_grn->PaidAmount->cellAttributes() ?>>
<script id="tpx_store_grn_PaidAmount" class="store_grnadd" type="text/html">
<span id="el_store_grn_PaidAmount">
<input type="text" data-table="store_grn" data-field="x_PaidAmount" name="x_PaidAmount" id="x_PaidAmount" size="30" placeholder="<?php echo HtmlEncode($store_grn->PaidAmount->getPlaceHolder()) ?>" value="<?php echo $store_grn->PaidAmount->EditValue ?>"<?php echo $store_grn->PaidAmount->editAttributes() ?>>
</span>
</script>
<?php echo $store_grn->PaidAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_grn->StoreID->Visible) { // StoreID ?>
	<div id="r_StoreID" class="form-group row">
		<label id="elh_store_grn_StoreID" for="x_StoreID" class="<?php echo $store_grn_add->LeftColumnClass ?>"><script id="tpc_store_grn_StoreID" class="store_grnadd" type="text/html"><span><?php echo $store_grn->StoreID->caption() ?><?php echo ($store_grn->StoreID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $store_grn_add->RightColumnClass ?>"><div<?php echo $store_grn->StoreID->cellAttributes() ?>>
<script id="tpx_store_grn_StoreID" class="store_grnadd" type="text/html">
<span id="el_store_grn_StoreID">
<input type="text" data-table="store_grn" data-field="x_StoreID" name="x_StoreID" id="x_StoreID" size="30" placeholder="<?php echo HtmlEncode($store_grn->StoreID->getPlaceHolder()) ?>" value="<?php echo $store_grn->StoreID->EditValue ?>"<?php echo $store_grn->StoreID->editAttributes() ?>>
</span>
</script>
<?php echo $store_grn->StoreID->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_store_grnadd" class="ew-custom-template"></div>
<script id="tpm_store_grnadd" type="text/html">
<div id="ct_store_grn_add"><style>
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
		<h3 class="card-title">{{include tmpl="#tpc_store_grn_GRNNO"/}}&nbsp;{{include tmpl="#tpx_store_grn_GRNNO"/}}</h3>
	</div>
</div>
<div id="divCheckbox" style="display: none;">{{include tmpl="#tpc_store_grn_pharmacy_pocol"/}}&nbsp;{{include tmpl="#tpx_store_grn_pharmacy_pocol"/}}</div>
<div class="row">
	<div class="col-4">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Supplier</h3>
			</div>
			<div class="card-body">
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_grn_BRCODE"/}}&nbsp;{{include tmpl="#tpx_store_grn_BRCODE"/}}</span>
				  </div>
				 <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_grn_PC"/}}&nbsp;{{include tmpl="#tpx_store_grn_PC"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_grn_DT"/}}&nbsp;{{include tmpl="#tpx_store_grn_DT"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_grn_YM"/}}&nbsp;{{include tmpl="#tpx_store_grn_YM"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_grn_Customercode"/}}&nbsp;{{include tmpl="#tpx_store_grn_Customercode"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_grn_Customername"/}}&nbsp;{{include tmpl="#tpx_store_grn_Customername"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_grn_BILLDT"/}}&nbsp;{{include tmpl="#tpx_store_grn_BILLDT"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_grn_BILLNO"/}}&nbsp;{{include tmpl="#tpx_store_grn_BILLNO"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_grn_BillTotalValue"/}}&nbsp;{{include tmpl="#tpx_store_grn_BillTotalValue"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_grn_BillUpload"/}}&nbsp;{{include tmpl="#tpx_store_grn_BillUpload"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_grn_Remarks"/}}&nbsp;{{include tmpl="#tpx_store_grn_Remarks"/}}</span>
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
					<span class="ew-cell">{{include tmpl="#tpc_store_grn_Address1"/}}&nbsp;{{include tmpl="#tpx_store_grn_Address1"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_grn_Address2"/}}&nbsp;{{include tmpl="#tpx_store_grn_Address2"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_grn_Address3"/}}&nbsp;{{include tmpl="#tpx_store_grn_Address3"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_grn_State"/}}&nbsp;{{include tmpl="#tpx_store_grn_State"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_grn_Pincode"/}}&nbsp;{{include tmpl="#tpx_store_grn_Pincode"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_grn_Fax"/}}&nbsp;{{include tmpl="#tpx_store_grn_Fax"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_grn_Phone"/}}&nbsp;{{include tmpl="#tpx_store_grn_Phone"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_grn_GRNTotalValue"/}}&nbsp;{{include tmpl="#tpx_store_grn_GRNTotalValue"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_grn_TransPort"/}}&nbsp;{{include tmpl="#tpx_store_grn_TransPort"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_grn_AnyOther"/}}&nbsp;{{include tmpl="#tpx_store_grn_AnyOther"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_grn_BillDiscount"/}}&nbsp;{{include tmpl="#tpx_store_grn_BillDiscount"/}}</span>
				  </div>
				  <div hidden class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_grn_GrnValue"/}}&nbsp;{{include tmpl="#tpx_store_grn_GrnValue"/}}</span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>				
	</div>
</div>
</div>
</script>
<?php
	if (in_array("view_store_grn", explode(",", $store_grn->getCurrentDetailTable())) && $view_store_grn->DetailAdd) {
?>
<?php if ($store_grn->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("view_store_grn", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "view_store_grngrid.php" ?>
<?php } ?>
<?php if (!$store_grn_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $store_grn_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $store_grn_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($store_grn->Rows) ?> };
ew.applyTemplate("tpd_store_grnadd", "tpm_store_grnadd", "store_grnadd", "<?php echo $store_grn->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.store_grnadd_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$store_grn_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

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
</script>
<?php include_once "footer.php" ?>
<?php
$store_grn_add->terminate();
?>