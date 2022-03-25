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
$pharmacy_suppliers_edit = new pharmacy_suppliers_edit();

// Run the page
$pharmacy_suppliers_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_suppliers_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fpharmacy_suppliersedit = currentForm = new ew.Form("fpharmacy_suppliersedit", "edit");

// Validate form
fpharmacy_suppliersedit.validate = function() {
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
		<?php if ($pharmacy_suppliers_edit->Suppliercode->Required) { ?>
			elm = this.getElements("x" + infix + "_Suppliercode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_suppliers->Suppliercode->caption(), $pharmacy_suppliers->Suppliercode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_suppliers_edit->Suppliername->Required) { ?>
			elm = this.getElements("x" + infix + "_Suppliername");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_suppliers->Suppliername->caption(), $pharmacy_suppliers->Suppliername->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_suppliers_edit->Abbreviation->Required) { ?>
			elm = this.getElements("x" + infix + "_Abbreviation");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_suppliers->Abbreviation->caption(), $pharmacy_suppliers->Abbreviation->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_suppliers_edit->Creationdate->Required) { ?>
			elm = this.getElements("x" + infix + "_Creationdate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_suppliers->Creationdate->caption(), $pharmacy_suppliers->Creationdate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Creationdate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_suppliers->Creationdate->errorMessage()) ?>");
		<?php if ($pharmacy_suppliers_edit->Address1->Required) { ?>
			elm = this.getElements("x" + infix + "_Address1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_suppliers->Address1->caption(), $pharmacy_suppliers->Address1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_suppliers_edit->Address2->Required) { ?>
			elm = this.getElements("x" + infix + "_Address2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_suppliers->Address2->caption(), $pharmacy_suppliers->Address2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_suppliers_edit->Address3->Required) { ?>
			elm = this.getElements("x" + infix + "_Address3");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_suppliers->Address3->caption(), $pharmacy_suppliers->Address3->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_suppliers_edit->Citycode->Required) { ?>
			elm = this.getElements("x" + infix + "_Citycode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_suppliers->Citycode->caption(), $pharmacy_suppliers->Citycode->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Citycode");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_suppliers->Citycode->errorMessage()) ?>");
		<?php if ($pharmacy_suppliers_edit->State->Required) { ?>
			elm = this.getElements("x" + infix + "_State");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_suppliers->State->caption(), $pharmacy_suppliers->State->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_suppliers_edit->Pincode->Required) { ?>
			elm = this.getElements("x" + infix + "_Pincode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_suppliers->Pincode->caption(), $pharmacy_suppliers->Pincode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_suppliers_edit->Tngstnumber->Required) { ?>
			elm = this.getElements("x" + infix + "_Tngstnumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_suppliers->Tngstnumber->caption(), $pharmacy_suppliers->Tngstnumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_suppliers_edit->Phone->Required) { ?>
			elm = this.getElements("x" + infix + "_Phone");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_suppliers->Phone->caption(), $pharmacy_suppliers->Phone->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_suppliers_edit->Fax->Required) { ?>
			elm = this.getElements("x" + infix + "_Fax");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_suppliers->Fax->caption(), $pharmacy_suppliers->Fax->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_suppliers_edit->_Email->Required) { ?>
			elm = this.getElements("x" + infix + "__Email");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_suppliers->_Email->caption(), $pharmacy_suppliers->_Email->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_suppliers_edit->Paymentmode->Required) { ?>
			elm = this.getElements("x" + infix + "_Paymentmode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_suppliers->Paymentmode->caption(), $pharmacy_suppliers->Paymentmode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_suppliers_edit->Contactperson1->Required) { ?>
			elm = this.getElements("x" + infix + "_Contactperson1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_suppliers->Contactperson1->caption(), $pharmacy_suppliers->Contactperson1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_suppliers_edit->CP1Address1->Required) { ?>
			elm = this.getElements("x" + infix + "_CP1Address1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_suppliers->CP1Address1->caption(), $pharmacy_suppliers->CP1Address1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_suppliers_edit->CP1Address2->Required) { ?>
			elm = this.getElements("x" + infix + "_CP1Address2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_suppliers->CP1Address2->caption(), $pharmacy_suppliers->CP1Address2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_suppliers_edit->CP1Address3->Required) { ?>
			elm = this.getElements("x" + infix + "_CP1Address3");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_suppliers->CP1Address3->caption(), $pharmacy_suppliers->CP1Address3->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_suppliers_edit->CP1Citycode->Required) { ?>
			elm = this.getElements("x" + infix + "_CP1Citycode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_suppliers->CP1Citycode->caption(), $pharmacy_suppliers->CP1Citycode->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_CP1Citycode");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_suppliers->CP1Citycode->errorMessage()) ?>");
		<?php if ($pharmacy_suppliers_edit->CP1State->Required) { ?>
			elm = this.getElements("x" + infix + "_CP1State");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_suppliers->CP1State->caption(), $pharmacy_suppliers->CP1State->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_suppliers_edit->CP1Pincode->Required) { ?>
			elm = this.getElements("x" + infix + "_CP1Pincode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_suppliers->CP1Pincode->caption(), $pharmacy_suppliers->CP1Pincode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_suppliers_edit->CP1Designation->Required) { ?>
			elm = this.getElements("x" + infix + "_CP1Designation");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_suppliers->CP1Designation->caption(), $pharmacy_suppliers->CP1Designation->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_suppliers_edit->CP1Phone->Required) { ?>
			elm = this.getElements("x" + infix + "_CP1Phone");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_suppliers->CP1Phone->caption(), $pharmacy_suppliers->CP1Phone->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_suppliers_edit->CP1MobileNo->Required) { ?>
			elm = this.getElements("x" + infix + "_CP1MobileNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_suppliers->CP1MobileNo->caption(), $pharmacy_suppliers->CP1MobileNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_suppliers_edit->CP1Fax->Required) { ?>
			elm = this.getElements("x" + infix + "_CP1Fax");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_suppliers->CP1Fax->caption(), $pharmacy_suppliers->CP1Fax->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_suppliers_edit->CP1Email->Required) { ?>
			elm = this.getElements("x" + infix + "_CP1Email");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_suppliers->CP1Email->caption(), $pharmacy_suppliers->CP1Email->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_suppliers_edit->Contactperson2->Required) { ?>
			elm = this.getElements("x" + infix + "_Contactperson2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_suppliers->Contactperson2->caption(), $pharmacy_suppliers->Contactperson2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_suppliers_edit->CP2Address1->Required) { ?>
			elm = this.getElements("x" + infix + "_CP2Address1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_suppliers->CP2Address1->caption(), $pharmacy_suppliers->CP2Address1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_suppliers_edit->CP2Address2->Required) { ?>
			elm = this.getElements("x" + infix + "_CP2Address2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_suppliers->CP2Address2->caption(), $pharmacy_suppliers->CP2Address2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_suppliers_edit->CP2Address3->Required) { ?>
			elm = this.getElements("x" + infix + "_CP2Address3");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_suppliers->CP2Address3->caption(), $pharmacy_suppliers->CP2Address3->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_suppliers_edit->CP2Citycode->Required) { ?>
			elm = this.getElements("x" + infix + "_CP2Citycode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_suppliers->CP2Citycode->caption(), $pharmacy_suppliers->CP2Citycode->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_CP2Citycode");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pharmacy_suppliers->CP2Citycode->errorMessage()) ?>");
		<?php if ($pharmacy_suppliers_edit->CP2State->Required) { ?>
			elm = this.getElements("x" + infix + "_CP2State");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_suppliers->CP2State->caption(), $pharmacy_suppliers->CP2State->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_suppliers_edit->CP2Pincode->Required) { ?>
			elm = this.getElements("x" + infix + "_CP2Pincode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_suppliers->CP2Pincode->caption(), $pharmacy_suppliers->CP2Pincode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_suppliers_edit->CP2Designation->Required) { ?>
			elm = this.getElements("x" + infix + "_CP2Designation");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_suppliers->CP2Designation->caption(), $pharmacy_suppliers->CP2Designation->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_suppliers_edit->CP2Phone->Required) { ?>
			elm = this.getElements("x" + infix + "_CP2Phone");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_suppliers->CP2Phone->caption(), $pharmacy_suppliers->CP2Phone->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_suppliers_edit->CP2MobileNo->Required) { ?>
			elm = this.getElements("x" + infix + "_CP2MobileNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_suppliers->CP2MobileNo->caption(), $pharmacy_suppliers->CP2MobileNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_suppliers_edit->CP2Fax->Required) { ?>
			elm = this.getElements("x" + infix + "_CP2Fax");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_suppliers->CP2Fax->caption(), $pharmacy_suppliers->CP2Fax->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_suppliers_edit->CP2Email->Required) { ?>
			elm = this.getElements("x" + infix + "_CP2Email");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_suppliers->CP2Email->caption(), $pharmacy_suppliers->CP2Email->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_suppliers_edit->Type->Required) { ?>
			elm = this.getElements("x" + infix + "_Type");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_suppliers->Type->caption(), $pharmacy_suppliers->Type->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_suppliers_edit->Creditterms->Required) { ?>
			elm = this.getElements("x" + infix + "_Creditterms");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_suppliers->Creditterms->caption(), $pharmacy_suppliers->Creditterms->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_suppliers_edit->Remarks->Required) { ?>
			elm = this.getElements("x" + infix + "_Remarks");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_suppliers->Remarks->caption(), $pharmacy_suppliers->Remarks->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_suppliers_edit->Tinnumber->Required) { ?>
			elm = this.getElements("x" + infix + "_Tinnumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_suppliers->Tinnumber->caption(), $pharmacy_suppliers->Tinnumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_suppliers_edit->Universalsuppliercode->Required) { ?>
			elm = this.getElements("x" + infix + "_Universalsuppliercode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_suppliers->Universalsuppliercode->caption(), $pharmacy_suppliers->Universalsuppliercode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_suppliers_edit->Mobilenumber->Required) { ?>
			elm = this.getElements("x" + infix + "_Mobilenumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_suppliers->Mobilenumber->caption(), $pharmacy_suppliers->Mobilenumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_suppliers_edit->PANNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_PANNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_suppliers->PANNumber->caption(), $pharmacy_suppliers->PANNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_suppliers_edit->SalesRepMobileNo->Required) { ?>
			elm = this.getElements("x" + infix + "_SalesRepMobileNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_suppliers->SalesRepMobileNo->caption(), $pharmacy_suppliers->SalesRepMobileNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_suppliers_edit->GSTNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_GSTNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_suppliers->GSTNumber->caption(), $pharmacy_suppliers->GSTNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_suppliers_edit->TANNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_TANNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_suppliers->TANNumber->caption(), $pharmacy_suppliers->TANNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pharmacy_suppliers_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pharmacy_suppliers->id->caption(), $pharmacy_suppliers->id->RequiredErrorMessage)) ?>");
		<?php } ?>

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
fpharmacy_suppliersedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_suppliersedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $pharmacy_suppliers_edit->showPageHeader(); ?>
<?php
$pharmacy_suppliers_edit->showMessage();
?>
<form name="fpharmacy_suppliersedit" id="fpharmacy_suppliersedit" class="<?php echo $pharmacy_suppliers_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pharmacy_suppliers_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_suppliers_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_suppliers">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_suppliers_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($pharmacy_suppliers->Suppliercode->Visible) { // Suppliercode ?>
	<div id="r_Suppliercode" class="form-group row">
		<label id="elh_pharmacy_suppliers_Suppliercode" for="x_Suppliercode" class="<?php echo $pharmacy_suppliers_edit->LeftColumnClass ?>"><?php echo $pharmacy_suppliers->Suppliercode->caption() ?><?php echo ($pharmacy_suppliers->Suppliercode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_suppliers_edit->RightColumnClass ?>"><div<?php echo $pharmacy_suppliers->Suppliercode->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_Suppliercode">
<input type="text" data-table="pharmacy_suppliers" data-field="x_Suppliercode" name="x_Suppliercode" id="x_Suppliercode" size="30" maxlength="15" placeholder="<?php echo HtmlEncode($pharmacy_suppliers->Suppliercode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_suppliers->Suppliercode->EditValue ?>"<?php echo $pharmacy_suppliers->Suppliercode->editAttributes() ?>>
</span>
<?php echo $pharmacy_suppliers->Suppliercode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_suppliers->Suppliername->Visible) { // Suppliername ?>
	<div id="r_Suppliername" class="form-group row">
		<label id="elh_pharmacy_suppliers_Suppliername" for="x_Suppliername" class="<?php echo $pharmacy_suppliers_edit->LeftColumnClass ?>"><?php echo $pharmacy_suppliers->Suppliername->caption() ?><?php echo ($pharmacy_suppliers->Suppliername->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_suppliers_edit->RightColumnClass ?>"><div<?php echo $pharmacy_suppliers->Suppliername->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_Suppliername">
<input type="text" data-table="pharmacy_suppliers" data-field="x_Suppliername" name="x_Suppliername" id="x_Suppliername" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($pharmacy_suppliers->Suppliername->getPlaceHolder()) ?>" value="<?php echo $pharmacy_suppliers->Suppliername->EditValue ?>"<?php echo $pharmacy_suppliers->Suppliername->editAttributes() ?>>
</span>
<?php echo $pharmacy_suppliers->Suppliername->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_suppliers->Abbreviation->Visible) { // Abbreviation ?>
	<div id="r_Abbreviation" class="form-group row">
		<label id="elh_pharmacy_suppliers_Abbreviation" for="x_Abbreviation" class="<?php echo $pharmacy_suppliers_edit->LeftColumnClass ?>"><?php echo $pharmacy_suppliers->Abbreviation->caption() ?><?php echo ($pharmacy_suppliers->Abbreviation->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_suppliers_edit->RightColumnClass ?>"><div<?php echo $pharmacy_suppliers->Abbreviation->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_Abbreviation">
<input type="text" data-table="pharmacy_suppliers" data-field="x_Abbreviation" name="x_Abbreviation" id="x_Abbreviation" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($pharmacy_suppliers->Abbreviation->getPlaceHolder()) ?>" value="<?php echo $pharmacy_suppliers->Abbreviation->EditValue ?>"<?php echo $pharmacy_suppliers->Abbreviation->editAttributes() ?>>
</span>
<?php echo $pharmacy_suppliers->Abbreviation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_suppliers->Creationdate->Visible) { // Creationdate ?>
	<div id="r_Creationdate" class="form-group row">
		<label id="elh_pharmacy_suppliers_Creationdate" for="x_Creationdate" class="<?php echo $pharmacy_suppliers_edit->LeftColumnClass ?>"><?php echo $pharmacy_suppliers->Creationdate->caption() ?><?php echo ($pharmacy_suppliers->Creationdate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_suppliers_edit->RightColumnClass ?>"><div<?php echo $pharmacy_suppliers->Creationdate->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_Creationdate">
<input type="text" data-table="pharmacy_suppliers" data-field="x_Creationdate" name="x_Creationdate" id="x_Creationdate" placeholder="<?php echo HtmlEncode($pharmacy_suppliers->Creationdate->getPlaceHolder()) ?>" value="<?php echo $pharmacy_suppliers->Creationdate->EditValue ?>"<?php echo $pharmacy_suppliers->Creationdate->editAttributes() ?>>
<?php if (!$pharmacy_suppliers->Creationdate->ReadOnly && !$pharmacy_suppliers->Creationdate->Disabled && !isset($pharmacy_suppliers->Creationdate->EditAttrs["readonly"]) && !isset($pharmacy_suppliers->Creationdate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpharmacy_suppliersedit", "x_Creationdate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $pharmacy_suppliers->Creationdate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_suppliers->Address1->Visible) { // Address1 ?>
	<div id="r_Address1" class="form-group row">
		<label id="elh_pharmacy_suppliers_Address1" for="x_Address1" class="<?php echo $pharmacy_suppliers_edit->LeftColumnClass ?>"><?php echo $pharmacy_suppliers->Address1->caption() ?><?php echo ($pharmacy_suppliers->Address1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_suppliers_edit->RightColumnClass ?>"><div<?php echo $pharmacy_suppliers->Address1->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_Address1">
<input type="text" data-table="pharmacy_suppliers" data-field="x_Address1" name="x_Address1" id="x_Address1" size="30" maxlength="250" placeholder="<?php echo HtmlEncode($pharmacy_suppliers->Address1->getPlaceHolder()) ?>" value="<?php echo $pharmacy_suppliers->Address1->EditValue ?>"<?php echo $pharmacy_suppliers->Address1->editAttributes() ?>>
</span>
<?php echo $pharmacy_suppliers->Address1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_suppliers->Address2->Visible) { // Address2 ?>
	<div id="r_Address2" class="form-group row">
		<label id="elh_pharmacy_suppliers_Address2" for="x_Address2" class="<?php echo $pharmacy_suppliers_edit->LeftColumnClass ?>"><?php echo $pharmacy_suppliers->Address2->caption() ?><?php echo ($pharmacy_suppliers->Address2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_suppliers_edit->RightColumnClass ?>"><div<?php echo $pharmacy_suppliers->Address2->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_Address2">
<input type="text" data-table="pharmacy_suppliers" data-field="x_Address2" name="x_Address2" id="x_Address2" size="30" maxlength="250" placeholder="<?php echo HtmlEncode($pharmacy_suppliers->Address2->getPlaceHolder()) ?>" value="<?php echo $pharmacy_suppliers->Address2->EditValue ?>"<?php echo $pharmacy_suppliers->Address2->editAttributes() ?>>
</span>
<?php echo $pharmacy_suppliers->Address2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_suppliers->Address3->Visible) { // Address3 ?>
	<div id="r_Address3" class="form-group row">
		<label id="elh_pharmacy_suppliers_Address3" for="x_Address3" class="<?php echo $pharmacy_suppliers_edit->LeftColumnClass ?>"><?php echo $pharmacy_suppliers->Address3->caption() ?><?php echo ($pharmacy_suppliers->Address3->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_suppliers_edit->RightColumnClass ?>"><div<?php echo $pharmacy_suppliers->Address3->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_Address3">
<input type="text" data-table="pharmacy_suppliers" data-field="x_Address3" name="x_Address3" id="x_Address3" size="30" maxlength="250" placeholder="<?php echo HtmlEncode($pharmacy_suppliers->Address3->getPlaceHolder()) ?>" value="<?php echo $pharmacy_suppliers->Address3->EditValue ?>"<?php echo $pharmacy_suppliers->Address3->editAttributes() ?>>
</span>
<?php echo $pharmacy_suppliers->Address3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_suppliers->Citycode->Visible) { // Citycode ?>
	<div id="r_Citycode" class="form-group row">
		<label id="elh_pharmacy_suppliers_Citycode" for="x_Citycode" class="<?php echo $pharmacy_suppliers_edit->LeftColumnClass ?>"><?php echo $pharmacy_suppliers->Citycode->caption() ?><?php echo ($pharmacy_suppliers->Citycode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_suppliers_edit->RightColumnClass ?>"><div<?php echo $pharmacy_suppliers->Citycode->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_Citycode">
<input type="text" data-table="pharmacy_suppliers" data-field="x_Citycode" name="x_Citycode" id="x_Citycode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_suppliers->Citycode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_suppliers->Citycode->EditValue ?>"<?php echo $pharmacy_suppliers->Citycode->editAttributes() ?>>
</span>
<?php echo $pharmacy_suppliers->Citycode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_suppliers->State->Visible) { // State ?>
	<div id="r_State" class="form-group row">
		<label id="elh_pharmacy_suppliers_State" for="x_State" class="<?php echo $pharmacy_suppliers_edit->LeftColumnClass ?>"><?php echo $pharmacy_suppliers->State->caption() ?><?php echo ($pharmacy_suppliers->State->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_suppliers_edit->RightColumnClass ?>"><div<?php echo $pharmacy_suppliers->State->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_State">
<input type="text" data-table="pharmacy_suppliers" data-field="x_State" name="x_State" id="x_State" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_suppliers->State->getPlaceHolder()) ?>" value="<?php echo $pharmacy_suppliers->State->EditValue ?>"<?php echo $pharmacy_suppliers->State->editAttributes() ?>>
</span>
<?php echo $pharmacy_suppliers->State->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_suppliers->Pincode->Visible) { // Pincode ?>
	<div id="r_Pincode" class="form-group row">
		<label id="elh_pharmacy_suppliers_Pincode" for="x_Pincode" class="<?php echo $pharmacy_suppliers_edit->LeftColumnClass ?>"><?php echo $pharmacy_suppliers->Pincode->caption() ?><?php echo ($pharmacy_suppliers->Pincode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_suppliers_edit->RightColumnClass ?>"><div<?php echo $pharmacy_suppliers->Pincode->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_Pincode">
<input type="text" data-table="pharmacy_suppliers" data-field="x_Pincode" name="x_Pincode" id="x_Pincode" size="30" maxlength="15" placeholder="<?php echo HtmlEncode($pharmacy_suppliers->Pincode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_suppliers->Pincode->EditValue ?>"<?php echo $pharmacy_suppliers->Pincode->editAttributes() ?>>
</span>
<?php echo $pharmacy_suppliers->Pincode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_suppliers->Tngstnumber->Visible) { // Tngstnumber ?>
	<div id="r_Tngstnumber" class="form-group row">
		<label id="elh_pharmacy_suppliers_Tngstnumber" for="x_Tngstnumber" class="<?php echo $pharmacy_suppliers_edit->LeftColumnClass ?>"><?php echo $pharmacy_suppliers->Tngstnumber->caption() ?><?php echo ($pharmacy_suppliers->Tngstnumber->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_suppliers_edit->RightColumnClass ?>"><div<?php echo $pharmacy_suppliers->Tngstnumber->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_Tngstnumber">
<input type="text" data-table="pharmacy_suppliers" data-field="x_Tngstnumber" name="x_Tngstnumber" id="x_Tngstnumber" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_suppliers->Tngstnumber->getPlaceHolder()) ?>" value="<?php echo $pharmacy_suppliers->Tngstnumber->EditValue ?>"<?php echo $pharmacy_suppliers->Tngstnumber->editAttributes() ?>>
</span>
<?php echo $pharmacy_suppliers->Tngstnumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_suppliers->Phone->Visible) { // Phone ?>
	<div id="r_Phone" class="form-group row">
		<label id="elh_pharmacy_suppliers_Phone" for="x_Phone" class="<?php echo $pharmacy_suppliers_edit->LeftColumnClass ?>"><?php echo $pharmacy_suppliers->Phone->caption() ?><?php echo ($pharmacy_suppliers->Phone->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_suppliers_edit->RightColumnClass ?>"><div<?php echo $pharmacy_suppliers->Phone->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_Phone">
<input type="text" data-table="pharmacy_suppliers" data-field="x_Phone" name="x_Phone" id="x_Phone" size="30" maxlength="40" placeholder="<?php echo HtmlEncode($pharmacy_suppliers->Phone->getPlaceHolder()) ?>" value="<?php echo $pharmacy_suppliers->Phone->EditValue ?>"<?php echo $pharmacy_suppliers->Phone->editAttributes() ?>>
</span>
<?php echo $pharmacy_suppliers->Phone->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_suppliers->Fax->Visible) { // Fax ?>
	<div id="r_Fax" class="form-group row">
		<label id="elh_pharmacy_suppliers_Fax" for="x_Fax" class="<?php echo $pharmacy_suppliers_edit->LeftColumnClass ?>"><?php echo $pharmacy_suppliers->Fax->caption() ?><?php echo ($pharmacy_suppliers->Fax->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_suppliers_edit->RightColumnClass ?>"><div<?php echo $pharmacy_suppliers->Fax->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_Fax">
<input type="text" data-table="pharmacy_suppliers" data-field="x_Fax" name="x_Fax" id="x_Fax" size="30" maxlength="40" placeholder="<?php echo HtmlEncode($pharmacy_suppliers->Fax->getPlaceHolder()) ?>" value="<?php echo $pharmacy_suppliers->Fax->EditValue ?>"<?php echo $pharmacy_suppliers->Fax->editAttributes() ?>>
</span>
<?php echo $pharmacy_suppliers->Fax->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_suppliers->_Email->Visible) { // Email ?>
	<div id="r__Email" class="form-group row">
		<label id="elh_pharmacy_suppliers__Email" for="x__Email" class="<?php echo $pharmacy_suppliers_edit->LeftColumnClass ?>"><?php echo $pharmacy_suppliers->_Email->caption() ?><?php echo ($pharmacy_suppliers->_Email->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_suppliers_edit->RightColumnClass ?>"><div<?php echo $pharmacy_suppliers->_Email->cellAttributes() ?>>
<span id="el_pharmacy_suppliers__Email">
<input type="text" data-table="pharmacy_suppliers" data-field="x__Email" name="x__Email" id="x__Email" size="30" maxlength="40" placeholder="<?php echo HtmlEncode($pharmacy_suppliers->_Email->getPlaceHolder()) ?>" value="<?php echo $pharmacy_suppliers->_Email->EditValue ?>"<?php echo $pharmacy_suppliers->_Email->editAttributes() ?>>
</span>
<?php echo $pharmacy_suppliers->_Email->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_suppliers->Paymentmode->Visible) { // Paymentmode ?>
	<div id="r_Paymentmode" class="form-group row">
		<label id="elh_pharmacy_suppliers_Paymentmode" for="x_Paymentmode" class="<?php echo $pharmacy_suppliers_edit->LeftColumnClass ?>"><?php echo $pharmacy_suppliers->Paymentmode->caption() ?><?php echo ($pharmacy_suppliers->Paymentmode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_suppliers_edit->RightColumnClass ?>"><div<?php echo $pharmacy_suppliers->Paymentmode->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_Paymentmode">
<input type="text" data-table="pharmacy_suppliers" data-field="x_Paymentmode" name="x_Paymentmode" id="x_Paymentmode" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_suppliers->Paymentmode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_suppliers->Paymentmode->EditValue ?>"<?php echo $pharmacy_suppliers->Paymentmode->editAttributes() ?>>
</span>
<?php echo $pharmacy_suppliers->Paymentmode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_suppliers->Contactperson1->Visible) { // Contactperson1 ?>
	<div id="r_Contactperson1" class="form-group row">
		<label id="elh_pharmacy_suppliers_Contactperson1" for="x_Contactperson1" class="<?php echo $pharmacy_suppliers_edit->LeftColumnClass ?>"><?php echo $pharmacy_suppliers->Contactperson1->caption() ?><?php echo ($pharmacy_suppliers->Contactperson1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_suppliers_edit->RightColumnClass ?>"><div<?php echo $pharmacy_suppliers->Contactperson1->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_Contactperson1">
<input type="text" data-table="pharmacy_suppliers" data-field="x_Contactperson1" name="x_Contactperson1" id="x_Contactperson1" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pharmacy_suppliers->Contactperson1->getPlaceHolder()) ?>" value="<?php echo $pharmacy_suppliers->Contactperson1->EditValue ?>"<?php echo $pharmacy_suppliers->Contactperson1->editAttributes() ?>>
</span>
<?php echo $pharmacy_suppliers->Contactperson1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_suppliers->CP1Address1->Visible) { // CP1Address1 ?>
	<div id="r_CP1Address1" class="form-group row">
		<label id="elh_pharmacy_suppliers_CP1Address1" for="x_CP1Address1" class="<?php echo $pharmacy_suppliers_edit->LeftColumnClass ?>"><?php echo $pharmacy_suppliers->CP1Address1->caption() ?><?php echo ($pharmacy_suppliers->CP1Address1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_suppliers_edit->RightColumnClass ?>"><div<?php echo $pharmacy_suppliers->CP1Address1->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_CP1Address1">
<input type="text" data-table="pharmacy_suppliers" data-field="x_CP1Address1" name="x_CP1Address1" id="x_CP1Address1" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($pharmacy_suppliers->CP1Address1->getPlaceHolder()) ?>" value="<?php echo $pharmacy_suppliers->CP1Address1->EditValue ?>"<?php echo $pharmacy_suppliers->CP1Address1->editAttributes() ?>>
</span>
<?php echo $pharmacy_suppliers->CP1Address1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_suppliers->CP1Address2->Visible) { // CP1Address2 ?>
	<div id="r_CP1Address2" class="form-group row">
		<label id="elh_pharmacy_suppliers_CP1Address2" for="x_CP1Address2" class="<?php echo $pharmacy_suppliers_edit->LeftColumnClass ?>"><?php echo $pharmacy_suppliers->CP1Address2->caption() ?><?php echo ($pharmacy_suppliers->CP1Address2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_suppliers_edit->RightColumnClass ?>"><div<?php echo $pharmacy_suppliers->CP1Address2->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_CP1Address2">
<input type="text" data-table="pharmacy_suppliers" data-field="x_CP1Address2" name="x_CP1Address2" id="x_CP1Address2" size="30" maxlength="250" placeholder="<?php echo HtmlEncode($pharmacy_suppliers->CP1Address2->getPlaceHolder()) ?>" value="<?php echo $pharmacy_suppliers->CP1Address2->EditValue ?>"<?php echo $pharmacy_suppliers->CP1Address2->editAttributes() ?>>
</span>
<?php echo $pharmacy_suppliers->CP1Address2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_suppliers->CP1Address3->Visible) { // CP1Address3 ?>
	<div id="r_CP1Address3" class="form-group row">
		<label id="elh_pharmacy_suppliers_CP1Address3" for="x_CP1Address3" class="<?php echo $pharmacy_suppliers_edit->LeftColumnClass ?>"><?php echo $pharmacy_suppliers->CP1Address3->caption() ?><?php echo ($pharmacy_suppliers->CP1Address3->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_suppliers_edit->RightColumnClass ?>"><div<?php echo $pharmacy_suppliers->CP1Address3->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_CP1Address3">
<input type="text" data-table="pharmacy_suppliers" data-field="x_CP1Address3" name="x_CP1Address3" id="x_CP1Address3" size="30" maxlength="250" placeholder="<?php echo HtmlEncode($pharmacy_suppliers->CP1Address3->getPlaceHolder()) ?>" value="<?php echo $pharmacy_suppliers->CP1Address3->EditValue ?>"<?php echo $pharmacy_suppliers->CP1Address3->editAttributes() ?>>
</span>
<?php echo $pharmacy_suppliers->CP1Address3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_suppliers->CP1Citycode->Visible) { // CP1Citycode ?>
	<div id="r_CP1Citycode" class="form-group row">
		<label id="elh_pharmacy_suppliers_CP1Citycode" for="x_CP1Citycode" class="<?php echo $pharmacy_suppliers_edit->LeftColumnClass ?>"><?php echo $pharmacy_suppliers->CP1Citycode->caption() ?><?php echo ($pharmacy_suppliers->CP1Citycode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_suppliers_edit->RightColumnClass ?>"><div<?php echo $pharmacy_suppliers->CP1Citycode->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_CP1Citycode">
<input type="text" data-table="pharmacy_suppliers" data-field="x_CP1Citycode" name="x_CP1Citycode" id="x_CP1Citycode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_suppliers->CP1Citycode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_suppliers->CP1Citycode->EditValue ?>"<?php echo $pharmacy_suppliers->CP1Citycode->editAttributes() ?>>
</span>
<?php echo $pharmacy_suppliers->CP1Citycode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_suppliers->CP1State->Visible) { // CP1State ?>
	<div id="r_CP1State" class="form-group row">
		<label id="elh_pharmacy_suppliers_CP1State" for="x_CP1State" class="<?php echo $pharmacy_suppliers_edit->LeftColumnClass ?>"><?php echo $pharmacy_suppliers->CP1State->caption() ?><?php echo ($pharmacy_suppliers->CP1State->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_suppliers_edit->RightColumnClass ?>"><div<?php echo $pharmacy_suppliers->CP1State->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_CP1State">
<input type="text" data-table="pharmacy_suppliers" data-field="x_CP1State" name="x_CP1State" id="x_CP1State" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_suppliers->CP1State->getPlaceHolder()) ?>" value="<?php echo $pharmacy_suppliers->CP1State->EditValue ?>"<?php echo $pharmacy_suppliers->CP1State->editAttributes() ?>>
</span>
<?php echo $pharmacy_suppliers->CP1State->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_suppliers->CP1Pincode->Visible) { // CP1Pincode ?>
	<div id="r_CP1Pincode" class="form-group row">
		<label id="elh_pharmacy_suppliers_CP1Pincode" for="x_CP1Pincode" class="<?php echo $pharmacy_suppliers_edit->LeftColumnClass ?>"><?php echo $pharmacy_suppliers->CP1Pincode->caption() ?><?php echo ($pharmacy_suppliers->CP1Pincode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_suppliers_edit->RightColumnClass ?>"><div<?php echo $pharmacy_suppliers->CP1Pincode->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_CP1Pincode">
<input type="text" data-table="pharmacy_suppliers" data-field="x_CP1Pincode" name="x_CP1Pincode" id="x_CP1Pincode" size="30" maxlength="15" placeholder="<?php echo HtmlEncode($pharmacy_suppliers->CP1Pincode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_suppliers->CP1Pincode->EditValue ?>"<?php echo $pharmacy_suppliers->CP1Pincode->editAttributes() ?>>
</span>
<?php echo $pharmacy_suppliers->CP1Pincode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_suppliers->CP1Designation->Visible) { // CP1Designation ?>
	<div id="r_CP1Designation" class="form-group row">
		<label id="elh_pharmacy_suppliers_CP1Designation" for="x_CP1Designation" class="<?php echo $pharmacy_suppliers_edit->LeftColumnClass ?>"><?php echo $pharmacy_suppliers->CP1Designation->caption() ?><?php echo ($pharmacy_suppliers->CP1Designation->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_suppliers_edit->RightColumnClass ?>"><div<?php echo $pharmacy_suppliers->CP1Designation->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_CP1Designation">
<input type="text" data-table="pharmacy_suppliers" data-field="x_CP1Designation" name="x_CP1Designation" id="x_CP1Designation" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_suppliers->CP1Designation->getPlaceHolder()) ?>" value="<?php echo $pharmacy_suppliers->CP1Designation->EditValue ?>"<?php echo $pharmacy_suppliers->CP1Designation->editAttributes() ?>>
</span>
<?php echo $pharmacy_suppliers->CP1Designation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_suppliers->CP1Phone->Visible) { // CP1Phone ?>
	<div id="r_CP1Phone" class="form-group row">
		<label id="elh_pharmacy_suppliers_CP1Phone" for="x_CP1Phone" class="<?php echo $pharmacy_suppliers_edit->LeftColumnClass ?>"><?php echo $pharmacy_suppliers->CP1Phone->caption() ?><?php echo ($pharmacy_suppliers->CP1Phone->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_suppliers_edit->RightColumnClass ?>"><div<?php echo $pharmacy_suppliers->CP1Phone->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_CP1Phone">
<input type="text" data-table="pharmacy_suppliers" data-field="x_CP1Phone" name="x_CP1Phone" id="x_CP1Phone" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_suppliers->CP1Phone->getPlaceHolder()) ?>" value="<?php echo $pharmacy_suppliers->CP1Phone->EditValue ?>"<?php echo $pharmacy_suppliers->CP1Phone->editAttributes() ?>>
</span>
<?php echo $pharmacy_suppliers->CP1Phone->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_suppliers->CP1MobileNo->Visible) { // CP1MobileNo ?>
	<div id="r_CP1MobileNo" class="form-group row">
		<label id="elh_pharmacy_suppliers_CP1MobileNo" for="x_CP1MobileNo" class="<?php echo $pharmacy_suppliers_edit->LeftColumnClass ?>"><?php echo $pharmacy_suppliers->CP1MobileNo->caption() ?><?php echo ($pharmacy_suppliers->CP1MobileNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_suppliers_edit->RightColumnClass ?>"><div<?php echo $pharmacy_suppliers->CP1MobileNo->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_CP1MobileNo">
<input type="text" data-table="pharmacy_suppliers" data-field="x_CP1MobileNo" name="x_CP1MobileNo" id="x_CP1MobileNo" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_suppliers->CP1MobileNo->getPlaceHolder()) ?>" value="<?php echo $pharmacy_suppliers->CP1MobileNo->EditValue ?>"<?php echo $pharmacy_suppliers->CP1MobileNo->editAttributes() ?>>
</span>
<?php echo $pharmacy_suppliers->CP1MobileNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_suppliers->CP1Fax->Visible) { // CP1Fax ?>
	<div id="r_CP1Fax" class="form-group row">
		<label id="elh_pharmacy_suppliers_CP1Fax" for="x_CP1Fax" class="<?php echo $pharmacy_suppliers_edit->LeftColumnClass ?>"><?php echo $pharmacy_suppliers->CP1Fax->caption() ?><?php echo ($pharmacy_suppliers->CP1Fax->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_suppliers_edit->RightColumnClass ?>"><div<?php echo $pharmacy_suppliers->CP1Fax->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_CP1Fax">
<input type="text" data-table="pharmacy_suppliers" data-field="x_CP1Fax" name="x_CP1Fax" id="x_CP1Fax" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_suppliers->CP1Fax->getPlaceHolder()) ?>" value="<?php echo $pharmacy_suppliers->CP1Fax->EditValue ?>"<?php echo $pharmacy_suppliers->CP1Fax->editAttributes() ?>>
</span>
<?php echo $pharmacy_suppliers->CP1Fax->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_suppliers->CP1Email->Visible) { // CP1Email ?>
	<div id="r_CP1Email" class="form-group row">
		<label id="elh_pharmacy_suppliers_CP1Email" for="x_CP1Email" class="<?php echo $pharmacy_suppliers_edit->LeftColumnClass ?>"><?php echo $pharmacy_suppliers->CP1Email->caption() ?><?php echo ($pharmacy_suppliers->CP1Email->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_suppliers_edit->RightColumnClass ?>"><div<?php echo $pharmacy_suppliers->CP1Email->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_CP1Email">
<input type="text" data-table="pharmacy_suppliers" data-field="x_CP1Email" name="x_CP1Email" id="x_CP1Email" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_suppliers->CP1Email->getPlaceHolder()) ?>" value="<?php echo $pharmacy_suppliers->CP1Email->EditValue ?>"<?php echo $pharmacy_suppliers->CP1Email->editAttributes() ?>>
</span>
<?php echo $pharmacy_suppliers->CP1Email->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_suppliers->Contactperson2->Visible) { // Contactperson2 ?>
	<div id="r_Contactperson2" class="form-group row">
		<label id="elh_pharmacy_suppliers_Contactperson2" for="x_Contactperson2" class="<?php echo $pharmacy_suppliers_edit->LeftColumnClass ?>"><?php echo $pharmacy_suppliers->Contactperson2->caption() ?><?php echo ($pharmacy_suppliers->Contactperson2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_suppliers_edit->RightColumnClass ?>"><div<?php echo $pharmacy_suppliers->Contactperson2->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_Contactperson2">
<input type="text" data-table="pharmacy_suppliers" data-field="x_Contactperson2" name="x_Contactperson2" id="x_Contactperson2" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pharmacy_suppliers->Contactperson2->getPlaceHolder()) ?>" value="<?php echo $pharmacy_suppliers->Contactperson2->EditValue ?>"<?php echo $pharmacy_suppliers->Contactperson2->editAttributes() ?>>
</span>
<?php echo $pharmacy_suppliers->Contactperson2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_suppliers->CP2Address1->Visible) { // CP2Address1 ?>
	<div id="r_CP2Address1" class="form-group row">
		<label id="elh_pharmacy_suppliers_CP2Address1" for="x_CP2Address1" class="<?php echo $pharmacy_suppliers_edit->LeftColumnClass ?>"><?php echo $pharmacy_suppliers->CP2Address1->caption() ?><?php echo ($pharmacy_suppliers->CP2Address1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_suppliers_edit->RightColumnClass ?>"><div<?php echo $pharmacy_suppliers->CP2Address1->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_CP2Address1">
<input type="text" data-table="pharmacy_suppliers" data-field="x_CP2Address1" name="x_CP2Address1" id="x_CP2Address1" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($pharmacy_suppliers->CP2Address1->getPlaceHolder()) ?>" value="<?php echo $pharmacy_suppliers->CP2Address1->EditValue ?>"<?php echo $pharmacy_suppliers->CP2Address1->editAttributes() ?>>
</span>
<?php echo $pharmacy_suppliers->CP2Address1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_suppliers->CP2Address2->Visible) { // CP2Address2 ?>
	<div id="r_CP2Address2" class="form-group row">
		<label id="elh_pharmacy_suppliers_CP2Address2" for="x_CP2Address2" class="<?php echo $pharmacy_suppliers_edit->LeftColumnClass ?>"><?php echo $pharmacy_suppliers->CP2Address2->caption() ?><?php echo ($pharmacy_suppliers->CP2Address2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_suppliers_edit->RightColumnClass ?>"><div<?php echo $pharmacy_suppliers->CP2Address2->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_CP2Address2">
<input type="text" data-table="pharmacy_suppliers" data-field="x_CP2Address2" name="x_CP2Address2" id="x_CP2Address2" size="30" maxlength="250" placeholder="<?php echo HtmlEncode($pharmacy_suppliers->CP2Address2->getPlaceHolder()) ?>" value="<?php echo $pharmacy_suppliers->CP2Address2->EditValue ?>"<?php echo $pharmacy_suppliers->CP2Address2->editAttributes() ?>>
</span>
<?php echo $pharmacy_suppliers->CP2Address2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_suppliers->CP2Address3->Visible) { // CP2Address3 ?>
	<div id="r_CP2Address3" class="form-group row">
		<label id="elh_pharmacy_suppliers_CP2Address3" for="x_CP2Address3" class="<?php echo $pharmacy_suppliers_edit->LeftColumnClass ?>"><?php echo $pharmacy_suppliers->CP2Address3->caption() ?><?php echo ($pharmacy_suppliers->CP2Address3->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_suppliers_edit->RightColumnClass ?>"><div<?php echo $pharmacy_suppliers->CP2Address3->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_CP2Address3">
<input type="text" data-table="pharmacy_suppliers" data-field="x_CP2Address3" name="x_CP2Address3" id="x_CP2Address3" size="30" maxlength="250" placeholder="<?php echo HtmlEncode($pharmacy_suppliers->CP2Address3->getPlaceHolder()) ?>" value="<?php echo $pharmacy_suppliers->CP2Address3->EditValue ?>"<?php echo $pharmacy_suppliers->CP2Address3->editAttributes() ?>>
</span>
<?php echo $pharmacy_suppliers->CP2Address3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_suppliers->CP2Citycode->Visible) { // CP2Citycode ?>
	<div id="r_CP2Citycode" class="form-group row">
		<label id="elh_pharmacy_suppliers_CP2Citycode" for="x_CP2Citycode" class="<?php echo $pharmacy_suppliers_edit->LeftColumnClass ?>"><?php echo $pharmacy_suppliers->CP2Citycode->caption() ?><?php echo ($pharmacy_suppliers->CP2Citycode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_suppliers_edit->RightColumnClass ?>"><div<?php echo $pharmacy_suppliers->CP2Citycode->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_CP2Citycode">
<input type="text" data-table="pharmacy_suppliers" data-field="x_CP2Citycode" name="x_CP2Citycode" id="x_CP2Citycode" size="30" placeholder="<?php echo HtmlEncode($pharmacy_suppliers->CP2Citycode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_suppliers->CP2Citycode->EditValue ?>"<?php echo $pharmacy_suppliers->CP2Citycode->editAttributes() ?>>
</span>
<?php echo $pharmacy_suppliers->CP2Citycode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_suppliers->CP2State->Visible) { // CP2State ?>
	<div id="r_CP2State" class="form-group row">
		<label id="elh_pharmacy_suppliers_CP2State" for="x_CP2State" class="<?php echo $pharmacy_suppliers_edit->LeftColumnClass ?>"><?php echo $pharmacy_suppliers->CP2State->caption() ?><?php echo ($pharmacy_suppliers->CP2State->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_suppliers_edit->RightColumnClass ?>"><div<?php echo $pharmacy_suppliers->CP2State->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_CP2State">
<input type="text" data-table="pharmacy_suppliers" data-field="x_CP2State" name="x_CP2State" id="x_CP2State" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_suppliers->CP2State->getPlaceHolder()) ?>" value="<?php echo $pharmacy_suppliers->CP2State->EditValue ?>"<?php echo $pharmacy_suppliers->CP2State->editAttributes() ?>>
</span>
<?php echo $pharmacy_suppliers->CP2State->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_suppliers->CP2Pincode->Visible) { // CP2Pincode ?>
	<div id="r_CP2Pincode" class="form-group row">
		<label id="elh_pharmacy_suppliers_CP2Pincode" for="x_CP2Pincode" class="<?php echo $pharmacy_suppliers_edit->LeftColumnClass ?>"><?php echo $pharmacy_suppliers->CP2Pincode->caption() ?><?php echo ($pharmacy_suppliers->CP2Pincode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_suppliers_edit->RightColumnClass ?>"><div<?php echo $pharmacy_suppliers->CP2Pincode->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_CP2Pincode">
<input type="text" data-table="pharmacy_suppliers" data-field="x_CP2Pincode" name="x_CP2Pincode" id="x_CP2Pincode" size="30" maxlength="15" placeholder="<?php echo HtmlEncode($pharmacy_suppliers->CP2Pincode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_suppliers->CP2Pincode->EditValue ?>"<?php echo $pharmacy_suppliers->CP2Pincode->editAttributes() ?>>
</span>
<?php echo $pharmacy_suppliers->CP2Pincode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_suppliers->CP2Designation->Visible) { // CP2Designation ?>
	<div id="r_CP2Designation" class="form-group row">
		<label id="elh_pharmacy_suppliers_CP2Designation" for="x_CP2Designation" class="<?php echo $pharmacy_suppliers_edit->LeftColumnClass ?>"><?php echo $pharmacy_suppliers->CP2Designation->caption() ?><?php echo ($pharmacy_suppliers->CP2Designation->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_suppliers_edit->RightColumnClass ?>"><div<?php echo $pharmacy_suppliers->CP2Designation->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_CP2Designation">
<input type="text" data-table="pharmacy_suppliers" data-field="x_CP2Designation" name="x_CP2Designation" id="x_CP2Designation" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_suppliers->CP2Designation->getPlaceHolder()) ?>" value="<?php echo $pharmacy_suppliers->CP2Designation->EditValue ?>"<?php echo $pharmacy_suppliers->CP2Designation->editAttributes() ?>>
</span>
<?php echo $pharmacy_suppliers->CP2Designation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_suppliers->CP2Phone->Visible) { // CP2Phone ?>
	<div id="r_CP2Phone" class="form-group row">
		<label id="elh_pharmacy_suppliers_CP2Phone" for="x_CP2Phone" class="<?php echo $pharmacy_suppliers_edit->LeftColumnClass ?>"><?php echo $pharmacy_suppliers->CP2Phone->caption() ?><?php echo ($pharmacy_suppliers->CP2Phone->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_suppliers_edit->RightColumnClass ?>"><div<?php echo $pharmacy_suppliers->CP2Phone->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_CP2Phone">
<input type="text" data-table="pharmacy_suppliers" data-field="x_CP2Phone" name="x_CP2Phone" id="x_CP2Phone" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_suppliers->CP2Phone->getPlaceHolder()) ?>" value="<?php echo $pharmacy_suppliers->CP2Phone->EditValue ?>"<?php echo $pharmacy_suppliers->CP2Phone->editAttributes() ?>>
</span>
<?php echo $pharmacy_suppliers->CP2Phone->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_suppliers->CP2MobileNo->Visible) { // CP2MobileNo ?>
	<div id="r_CP2MobileNo" class="form-group row">
		<label id="elh_pharmacy_suppliers_CP2MobileNo" for="x_CP2MobileNo" class="<?php echo $pharmacy_suppliers_edit->LeftColumnClass ?>"><?php echo $pharmacy_suppliers->CP2MobileNo->caption() ?><?php echo ($pharmacy_suppliers->CP2MobileNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_suppliers_edit->RightColumnClass ?>"><div<?php echo $pharmacy_suppliers->CP2MobileNo->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_CP2MobileNo">
<input type="text" data-table="pharmacy_suppliers" data-field="x_CP2MobileNo" name="x_CP2MobileNo" id="x_CP2MobileNo" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_suppliers->CP2MobileNo->getPlaceHolder()) ?>" value="<?php echo $pharmacy_suppliers->CP2MobileNo->EditValue ?>"<?php echo $pharmacy_suppliers->CP2MobileNo->editAttributes() ?>>
</span>
<?php echo $pharmacy_suppliers->CP2MobileNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_suppliers->CP2Fax->Visible) { // CP2Fax ?>
	<div id="r_CP2Fax" class="form-group row">
		<label id="elh_pharmacy_suppliers_CP2Fax" for="x_CP2Fax" class="<?php echo $pharmacy_suppliers_edit->LeftColumnClass ?>"><?php echo $pharmacy_suppliers->CP2Fax->caption() ?><?php echo ($pharmacy_suppliers->CP2Fax->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_suppliers_edit->RightColumnClass ?>"><div<?php echo $pharmacy_suppliers->CP2Fax->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_CP2Fax">
<input type="text" data-table="pharmacy_suppliers" data-field="x_CP2Fax" name="x_CP2Fax" id="x_CP2Fax" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_suppliers->CP2Fax->getPlaceHolder()) ?>" value="<?php echo $pharmacy_suppliers->CP2Fax->EditValue ?>"<?php echo $pharmacy_suppliers->CP2Fax->editAttributes() ?>>
</span>
<?php echo $pharmacy_suppliers->CP2Fax->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_suppliers->CP2Email->Visible) { // CP2Email ?>
	<div id="r_CP2Email" class="form-group row">
		<label id="elh_pharmacy_suppliers_CP2Email" for="x_CP2Email" class="<?php echo $pharmacy_suppliers_edit->LeftColumnClass ?>"><?php echo $pharmacy_suppliers->CP2Email->caption() ?><?php echo ($pharmacy_suppliers->CP2Email->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_suppliers_edit->RightColumnClass ?>"><div<?php echo $pharmacy_suppliers->CP2Email->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_CP2Email">
<input type="text" data-table="pharmacy_suppliers" data-field="x_CP2Email" name="x_CP2Email" id="x_CP2Email" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_suppliers->CP2Email->getPlaceHolder()) ?>" value="<?php echo $pharmacy_suppliers->CP2Email->EditValue ?>"<?php echo $pharmacy_suppliers->CP2Email->editAttributes() ?>>
</span>
<?php echo $pharmacy_suppliers->CP2Email->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_suppliers->Type->Visible) { // Type ?>
	<div id="r_Type" class="form-group row">
		<label id="elh_pharmacy_suppliers_Type" for="x_Type" class="<?php echo $pharmacy_suppliers_edit->LeftColumnClass ?>"><?php echo $pharmacy_suppliers->Type->caption() ?><?php echo ($pharmacy_suppliers->Type->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_suppliers_edit->RightColumnClass ?>"><div<?php echo $pharmacy_suppliers->Type->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_Type">
<input type="text" data-table="pharmacy_suppliers" data-field="x_Type" name="x_Type" id="x_Type" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_suppliers->Type->getPlaceHolder()) ?>" value="<?php echo $pharmacy_suppliers->Type->EditValue ?>"<?php echo $pharmacy_suppliers->Type->editAttributes() ?>>
</span>
<?php echo $pharmacy_suppliers->Type->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_suppliers->Creditterms->Visible) { // Creditterms ?>
	<div id="r_Creditterms" class="form-group row">
		<label id="elh_pharmacy_suppliers_Creditterms" for="x_Creditterms" class="<?php echo $pharmacy_suppliers_edit->LeftColumnClass ?>"><?php echo $pharmacy_suppliers->Creditterms->caption() ?><?php echo ($pharmacy_suppliers->Creditterms->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_suppliers_edit->RightColumnClass ?>"><div<?php echo $pharmacy_suppliers->Creditterms->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_Creditterms">
<input type="text" data-table="pharmacy_suppliers" data-field="x_Creditterms" name="x_Creditterms" id="x_Creditterms" size="30" maxlength="120" placeholder="<?php echo HtmlEncode($pharmacy_suppliers->Creditterms->getPlaceHolder()) ?>" value="<?php echo $pharmacy_suppliers->Creditterms->EditValue ?>"<?php echo $pharmacy_suppliers->Creditterms->editAttributes() ?>>
</span>
<?php echo $pharmacy_suppliers->Creditterms->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_suppliers->Remarks->Visible) { // Remarks ?>
	<div id="r_Remarks" class="form-group row">
		<label id="elh_pharmacy_suppliers_Remarks" for="x_Remarks" class="<?php echo $pharmacy_suppliers_edit->LeftColumnClass ?>"><?php echo $pharmacy_suppliers->Remarks->caption() ?><?php echo ($pharmacy_suppliers->Remarks->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_suppliers_edit->RightColumnClass ?>"><div<?php echo $pharmacy_suppliers->Remarks->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_Remarks">
<input type="text" data-table="pharmacy_suppliers" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" size="30" maxlength="120" placeholder="<?php echo HtmlEncode($pharmacy_suppliers->Remarks->getPlaceHolder()) ?>" value="<?php echo $pharmacy_suppliers->Remarks->EditValue ?>"<?php echo $pharmacy_suppliers->Remarks->editAttributes() ?>>
</span>
<?php echo $pharmacy_suppliers->Remarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_suppliers->Tinnumber->Visible) { // Tinnumber ?>
	<div id="r_Tinnumber" class="form-group row">
		<label id="elh_pharmacy_suppliers_Tinnumber" for="x_Tinnumber" class="<?php echo $pharmacy_suppliers_edit->LeftColumnClass ?>"><?php echo $pharmacy_suppliers->Tinnumber->caption() ?><?php echo ($pharmacy_suppliers->Tinnumber->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_suppliers_edit->RightColumnClass ?>"><div<?php echo $pharmacy_suppliers->Tinnumber->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_Tinnumber">
<input type="text" data-table="pharmacy_suppliers" data-field="x_Tinnumber" name="x_Tinnumber" id="x_Tinnumber" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_suppliers->Tinnumber->getPlaceHolder()) ?>" value="<?php echo $pharmacy_suppliers->Tinnumber->EditValue ?>"<?php echo $pharmacy_suppliers->Tinnumber->editAttributes() ?>>
</span>
<?php echo $pharmacy_suppliers->Tinnumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_suppliers->Universalsuppliercode->Visible) { // Universalsuppliercode ?>
	<div id="r_Universalsuppliercode" class="form-group row">
		<label id="elh_pharmacy_suppliers_Universalsuppliercode" for="x_Universalsuppliercode" class="<?php echo $pharmacy_suppliers_edit->LeftColumnClass ?>"><?php echo $pharmacy_suppliers->Universalsuppliercode->caption() ?><?php echo ($pharmacy_suppliers->Universalsuppliercode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_suppliers_edit->RightColumnClass ?>"><div<?php echo $pharmacy_suppliers->Universalsuppliercode->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_Universalsuppliercode">
<input type="text" data-table="pharmacy_suppliers" data-field="x_Universalsuppliercode" name="x_Universalsuppliercode" id="x_Universalsuppliercode" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_suppliers->Universalsuppliercode->getPlaceHolder()) ?>" value="<?php echo $pharmacy_suppliers->Universalsuppliercode->EditValue ?>"<?php echo $pharmacy_suppliers->Universalsuppliercode->editAttributes() ?>>
</span>
<?php echo $pharmacy_suppliers->Universalsuppliercode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_suppliers->Mobilenumber->Visible) { // Mobilenumber ?>
	<div id="r_Mobilenumber" class="form-group row">
		<label id="elh_pharmacy_suppliers_Mobilenumber" for="x_Mobilenumber" class="<?php echo $pharmacy_suppliers_edit->LeftColumnClass ?>"><?php echo $pharmacy_suppliers->Mobilenumber->caption() ?><?php echo ($pharmacy_suppliers->Mobilenumber->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_suppliers_edit->RightColumnClass ?>"><div<?php echo $pharmacy_suppliers->Mobilenumber->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_Mobilenumber">
<input type="text" data-table="pharmacy_suppliers" data-field="x_Mobilenumber" name="x_Mobilenumber" id="x_Mobilenumber" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_suppliers->Mobilenumber->getPlaceHolder()) ?>" value="<?php echo $pharmacy_suppliers->Mobilenumber->EditValue ?>"<?php echo $pharmacy_suppliers->Mobilenumber->editAttributes() ?>>
</span>
<?php echo $pharmacy_suppliers->Mobilenumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_suppliers->PANNumber->Visible) { // PANNumber ?>
	<div id="r_PANNumber" class="form-group row">
		<label id="elh_pharmacy_suppliers_PANNumber" for="x_PANNumber" class="<?php echo $pharmacy_suppliers_edit->LeftColumnClass ?>"><?php echo $pharmacy_suppliers->PANNumber->caption() ?><?php echo ($pharmacy_suppliers->PANNumber->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_suppliers_edit->RightColumnClass ?>"><div<?php echo $pharmacy_suppliers->PANNumber->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_PANNumber">
<input type="text" data-table="pharmacy_suppliers" data-field="x_PANNumber" name="x_PANNumber" id="x_PANNumber" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_suppliers->PANNumber->getPlaceHolder()) ?>" value="<?php echo $pharmacy_suppliers->PANNumber->EditValue ?>"<?php echo $pharmacy_suppliers->PANNumber->editAttributes() ?>>
</span>
<?php echo $pharmacy_suppliers->PANNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_suppliers->SalesRepMobileNo->Visible) { // SalesRepMobileNo ?>
	<div id="r_SalesRepMobileNo" class="form-group row">
		<label id="elh_pharmacy_suppliers_SalesRepMobileNo" for="x_SalesRepMobileNo" class="<?php echo $pharmacy_suppliers_edit->LeftColumnClass ?>"><?php echo $pharmacy_suppliers->SalesRepMobileNo->caption() ?><?php echo ($pharmacy_suppliers->SalesRepMobileNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_suppliers_edit->RightColumnClass ?>"><div<?php echo $pharmacy_suppliers->SalesRepMobileNo->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_SalesRepMobileNo">
<input type="text" data-table="pharmacy_suppliers" data-field="x_SalesRepMobileNo" name="x_SalesRepMobileNo" id="x_SalesRepMobileNo" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pharmacy_suppliers->SalesRepMobileNo->getPlaceHolder()) ?>" value="<?php echo $pharmacy_suppliers->SalesRepMobileNo->EditValue ?>"<?php echo $pharmacy_suppliers->SalesRepMobileNo->editAttributes() ?>>
</span>
<?php echo $pharmacy_suppliers->SalesRepMobileNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_suppliers->GSTNumber->Visible) { // GSTNumber ?>
	<div id="r_GSTNumber" class="form-group row">
		<label id="elh_pharmacy_suppliers_GSTNumber" for="x_GSTNumber" class="<?php echo $pharmacy_suppliers_edit->LeftColumnClass ?>"><?php echo $pharmacy_suppliers->GSTNumber->caption() ?><?php echo ($pharmacy_suppliers->GSTNumber->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_suppliers_edit->RightColumnClass ?>"><div<?php echo $pharmacy_suppliers->GSTNumber->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_GSTNumber">
<input type="text" data-table="pharmacy_suppliers" data-field="x_GSTNumber" name="x_GSTNumber" id="x_GSTNumber" size="30" maxlength="15" placeholder="<?php echo HtmlEncode($pharmacy_suppliers->GSTNumber->getPlaceHolder()) ?>" value="<?php echo $pharmacy_suppliers->GSTNumber->EditValue ?>"<?php echo $pharmacy_suppliers->GSTNumber->editAttributes() ?>>
</span>
<?php echo $pharmacy_suppliers->GSTNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_suppliers->TANNumber->Visible) { // TANNumber ?>
	<div id="r_TANNumber" class="form-group row">
		<label id="elh_pharmacy_suppliers_TANNumber" for="x_TANNumber" class="<?php echo $pharmacy_suppliers_edit->LeftColumnClass ?>"><?php echo $pharmacy_suppliers->TANNumber->caption() ?><?php echo ($pharmacy_suppliers->TANNumber->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_suppliers_edit->RightColumnClass ?>"><div<?php echo $pharmacy_suppliers->TANNumber->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_TANNumber">
<input type="text" data-table="pharmacy_suppliers" data-field="x_TANNumber" name="x_TANNumber" id="x_TANNumber" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($pharmacy_suppliers->TANNumber->getPlaceHolder()) ?>" value="<?php echo $pharmacy_suppliers->TANNumber->EditValue ?>"<?php echo $pharmacy_suppliers->TANNumber->editAttributes() ?>>
</span>
<?php echo $pharmacy_suppliers->TANNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pharmacy_suppliers->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_pharmacy_suppliers_id" class="<?php echo $pharmacy_suppliers_edit->LeftColumnClass ?>"><?php echo $pharmacy_suppliers->id->caption() ?><?php echo ($pharmacy_suppliers->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pharmacy_suppliers_edit->RightColumnClass ?>"><div<?php echo $pharmacy_suppliers->id->cellAttributes() ?>>
<span id="el_pharmacy_suppliers_id">
<span<?php echo $pharmacy_suppliers->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pharmacy_suppliers->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_suppliers" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($pharmacy_suppliers->id->CurrentValue) ?>">
<?php echo $pharmacy_suppliers->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$pharmacy_suppliers_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $pharmacy_suppliers_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pharmacy_suppliers_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$pharmacy_suppliers_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$pharmacy_suppliers_edit->terminate();
?>