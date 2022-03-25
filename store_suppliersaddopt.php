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
$store_suppliers_addopt = new store_suppliers_addopt();

// Run the page
$store_suppliers_addopt->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$store_suppliers_addopt->Page_Render();
?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "addopt";
var fstore_suppliersaddopt = currentForm = new ew.Form("fstore_suppliersaddopt", "addopt");

// Validate form
fstore_suppliersaddopt.validate = function() {
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
		<?php if ($store_suppliers_addopt->Suppliercode->Required) { ?>
			elm = this.getElements("x" + infix + "_Suppliercode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->Suppliercode->caption(), $store_suppliers->Suppliercode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_addopt->Suppliername->Required) { ?>
			elm = this.getElements("x" + infix + "_Suppliername");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->Suppliername->caption(), $store_suppliers->Suppliername->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_addopt->Abbreviation->Required) { ?>
			elm = this.getElements("x" + infix + "_Abbreviation");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->Abbreviation->caption(), $store_suppliers->Abbreviation->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_addopt->Creationdate->Required) { ?>
			elm = this.getElements("x" + infix + "_Creationdate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->Creationdate->caption(), $store_suppliers->Creationdate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Creationdate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_suppliers->Creationdate->errorMessage()) ?>");
		<?php if ($store_suppliers_addopt->Address1->Required) { ?>
			elm = this.getElements("x" + infix + "_Address1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->Address1->caption(), $store_suppliers->Address1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_addopt->Address2->Required) { ?>
			elm = this.getElements("x" + infix + "_Address2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->Address2->caption(), $store_suppliers->Address2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_addopt->Address3->Required) { ?>
			elm = this.getElements("x" + infix + "_Address3");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->Address3->caption(), $store_suppliers->Address3->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_addopt->Citycode->Required) { ?>
			elm = this.getElements("x" + infix + "_Citycode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->Citycode->caption(), $store_suppliers->Citycode->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Citycode");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_suppliers->Citycode->errorMessage()) ?>");
		<?php if ($store_suppliers_addopt->State->Required) { ?>
			elm = this.getElements("x" + infix + "_State");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->State->caption(), $store_suppliers->State->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_addopt->Pincode->Required) { ?>
			elm = this.getElements("x" + infix + "_Pincode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->Pincode->caption(), $store_suppliers->Pincode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_addopt->Tngstnumber->Required) { ?>
			elm = this.getElements("x" + infix + "_Tngstnumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->Tngstnumber->caption(), $store_suppliers->Tngstnumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_addopt->Phone->Required) { ?>
			elm = this.getElements("x" + infix + "_Phone");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->Phone->caption(), $store_suppliers->Phone->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_addopt->Fax->Required) { ?>
			elm = this.getElements("x" + infix + "_Fax");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->Fax->caption(), $store_suppliers->Fax->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_addopt->_Email->Required) { ?>
			elm = this.getElements("x" + infix + "__Email");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->_Email->caption(), $store_suppliers->_Email->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_addopt->Paymentmode->Required) { ?>
			elm = this.getElements("x" + infix + "_Paymentmode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->Paymentmode->caption(), $store_suppliers->Paymentmode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_addopt->Contactperson1->Required) { ?>
			elm = this.getElements("x" + infix + "_Contactperson1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->Contactperson1->caption(), $store_suppliers->Contactperson1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_addopt->CP1Address1->Required) { ?>
			elm = this.getElements("x" + infix + "_CP1Address1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->CP1Address1->caption(), $store_suppliers->CP1Address1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_addopt->CP1Address2->Required) { ?>
			elm = this.getElements("x" + infix + "_CP1Address2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->CP1Address2->caption(), $store_suppliers->CP1Address2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_addopt->CP1Address3->Required) { ?>
			elm = this.getElements("x" + infix + "_CP1Address3");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->CP1Address3->caption(), $store_suppliers->CP1Address3->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_addopt->CP1Citycode->Required) { ?>
			elm = this.getElements("x" + infix + "_CP1Citycode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->CP1Citycode->caption(), $store_suppliers->CP1Citycode->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_CP1Citycode");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_suppliers->CP1Citycode->errorMessage()) ?>");
		<?php if ($store_suppliers_addopt->CP1State->Required) { ?>
			elm = this.getElements("x" + infix + "_CP1State");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->CP1State->caption(), $store_suppliers->CP1State->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_addopt->CP1Pincode->Required) { ?>
			elm = this.getElements("x" + infix + "_CP1Pincode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->CP1Pincode->caption(), $store_suppliers->CP1Pincode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_addopt->CP1Designation->Required) { ?>
			elm = this.getElements("x" + infix + "_CP1Designation");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->CP1Designation->caption(), $store_suppliers->CP1Designation->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_addopt->CP1Phone->Required) { ?>
			elm = this.getElements("x" + infix + "_CP1Phone");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->CP1Phone->caption(), $store_suppliers->CP1Phone->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_addopt->CP1MobileNo->Required) { ?>
			elm = this.getElements("x" + infix + "_CP1MobileNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->CP1MobileNo->caption(), $store_suppliers->CP1MobileNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_addopt->CP1Fax->Required) { ?>
			elm = this.getElements("x" + infix + "_CP1Fax");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->CP1Fax->caption(), $store_suppliers->CP1Fax->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_addopt->CP1Email->Required) { ?>
			elm = this.getElements("x" + infix + "_CP1Email");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->CP1Email->caption(), $store_suppliers->CP1Email->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_addopt->Contactperson2->Required) { ?>
			elm = this.getElements("x" + infix + "_Contactperson2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->Contactperson2->caption(), $store_suppliers->Contactperson2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_addopt->CP2Address1->Required) { ?>
			elm = this.getElements("x" + infix + "_CP2Address1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->CP2Address1->caption(), $store_suppliers->CP2Address1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_addopt->CP2Address2->Required) { ?>
			elm = this.getElements("x" + infix + "_CP2Address2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->CP2Address2->caption(), $store_suppliers->CP2Address2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_addopt->CP2Address3->Required) { ?>
			elm = this.getElements("x" + infix + "_CP2Address3");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->CP2Address3->caption(), $store_suppliers->CP2Address3->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_addopt->CP2Citycode->Required) { ?>
			elm = this.getElements("x" + infix + "_CP2Citycode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->CP2Citycode->caption(), $store_suppliers->CP2Citycode->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_CP2Citycode");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_suppliers->CP2Citycode->errorMessage()) ?>");
		<?php if ($store_suppliers_addopt->CP2State->Required) { ?>
			elm = this.getElements("x" + infix + "_CP2State");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->CP2State->caption(), $store_suppliers->CP2State->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_addopt->CP2Pincode->Required) { ?>
			elm = this.getElements("x" + infix + "_CP2Pincode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->CP2Pincode->caption(), $store_suppliers->CP2Pincode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_addopt->CP2Designation->Required) { ?>
			elm = this.getElements("x" + infix + "_CP2Designation");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->CP2Designation->caption(), $store_suppliers->CP2Designation->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_addopt->CP2Phone->Required) { ?>
			elm = this.getElements("x" + infix + "_CP2Phone");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->CP2Phone->caption(), $store_suppliers->CP2Phone->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_addopt->CP2MobileNo->Required) { ?>
			elm = this.getElements("x" + infix + "_CP2MobileNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->CP2MobileNo->caption(), $store_suppliers->CP2MobileNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_addopt->CP2Fax->Required) { ?>
			elm = this.getElements("x" + infix + "_CP2Fax");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->CP2Fax->caption(), $store_suppliers->CP2Fax->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_addopt->CP2Email->Required) { ?>
			elm = this.getElements("x" + infix + "_CP2Email");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->CP2Email->caption(), $store_suppliers->CP2Email->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_addopt->Type->Required) { ?>
			elm = this.getElements("x" + infix + "_Type");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->Type->caption(), $store_suppliers->Type->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_addopt->Creditterms->Required) { ?>
			elm = this.getElements("x" + infix + "_Creditterms");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->Creditterms->caption(), $store_suppliers->Creditterms->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_addopt->Remarks->Required) { ?>
			elm = this.getElements("x" + infix + "_Remarks");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->Remarks->caption(), $store_suppliers->Remarks->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_addopt->Tinnumber->Required) { ?>
			elm = this.getElements("x" + infix + "_Tinnumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->Tinnumber->caption(), $store_suppliers->Tinnumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_addopt->Universalsuppliercode->Required) { ?>
			elm = this.getElements("x" + infix + "_Universalsuppliercode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->Universalsuppliercode->caption(), $store_suppliers->Universalsuppliercode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_addopt->Mobilenumber->Required) { ?>
			elm = this.getElements("x" + infix + "_Mobilenumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->Mobilenumber->caption(), $store_suppliers->Mobilenumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_addopt->PANNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_PANNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->PANNumber->caption(), $store_suppliers->PANNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_addopt->SalesRepMobileNo->Required) { ?>
			elm = this.getElements("x" + infix + "_SalesRepMobileNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->SalesRepMobileNo->caption(), $store_suppliers->SalesRepMobileNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_addopt->GSTNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_GSTNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->GSTNumber->caption(), $store_suppliers->GSTNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_addopt->TANNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_TANNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->TANNumber->caption(), $store_suppliers->TANNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_addopt->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->HospID->caption(), $store_suppliers->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_suppliers->HospID->errorMessage()) ?>");
		<?php if ($store_suppliers_addopt->BranchID->Required) { ?>
			elm = this.getElements("x" + infix + "_BranchID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->BranchID->caption(), $store_suppliers->BranchID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BranchID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_suppliers->BranchID->errorMessage()) ?>");
		<?php if ($store_suppliers_addopt->StoreID->Required) { ?>
			elm = this.getElements("x" + infix + "_StoreID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->StoreID->caption(), $store_suppliers->StoreID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_StoreID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_suppliers->StoreID->errorMessage()) ?>");

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
	}
	return true;
}

// Form_CustomValidate event
fstore_suppliersaddopt.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fstore_suppliersaddopt.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $store_suppliers_addopt->showPageHeader(); ?>
<?php
$store_suppliers_addopt->showMessage();
?>
<form name="fstore_suppliersaddopt" id="fstore_suppliersaddopt" class="ew-form ew-horizontal" action="<?php echo API_URL ?>" method="post">
<?php //if ($store_suppliers_addopt->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $store_suppliers_addopt->Token ?>">
<?php //} ?>
<input type="hidden" name="<?php echo API_ACTION_NAME ?>" id="<?php echo API_ACTION_NAME ?>" value="<?php echo API_ADD_ACTION ?>">
<input type="hidden" name="<?php echo API_OBJECT_NAME ?>" id="<?php echo API_OBJECT_NAME ?>" value="<?php echo $store_suppliers_addopt->TableVar ?>">
<?php if ($store_suppliers->Suppliercode->Visible) { // Suppliercode ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Suppliercode"><?php echo $store_suppliers->Suppliercode->caption() ?><?php echo ($store_suppliers->Suppliercode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_suppliers" data-field="x_Suppliercode" name="x_Suppliercode" id="x_Suppliercode" size="30" maxlength="15" placeholder="<?php echo HtmlEncode($store_suppliers->Suppliercode->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->Suppliercode->EditValue ?>"<?php echo $store_suppliers->Suppliercode->editAttributes() ?>>
<?php echo $store_suppliers->Suppliercode->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->Suppliername->Visible) { // Suppliername ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Suppliername"><?php echo $store_suppliers->Suppliername->caption() ?><?php echo ($store_suppliers->Suppliername->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_suppliers" data-field="x_Suppliername" name="x_Suppliername" id="x_Suppliername" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($store_suppliers->Suppliername->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->Suppliername->EditValue ?>"<?php echo $store_suppliers->Suppliername->editAttributes() ?>>
<?php echo $store_suppliers->Suppliername->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->Abbreviation->Visible) { // Abbreviation ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Abbreviation"><?php echo $store_suppliers->Abbreviation->caption() ?><?php echo ($store_suppliers->Abbreviation->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_suppliers" data-field="x_Abbreviation" name="x_Abbreviation" id="x_Abbreviation" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($store_suppliers->Abbreviation->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->Abbreviation->EditValue ?>"<?php echo $store_suppliers->Abbreviation->editAttributes() ?>>
<?php echo $store_suppliers->Abbreviation->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->Creationdate->Visible) { // Creationdate ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Creationdate"><?php echo $store_suppliers->Creationdate->caption() ?><?php echo ($store_suppliers->Creationdate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_suppliers" data-field="x_Creationdate" name="x_Creationdate" id="x_Creationdate" placeholder="<?php echo HtmlEncode($store_suppliers->Creationdate->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->Creationdate->EditValue ?>"<?php echo $store_suppliers->Creationdate->editAttributes() ?>>
<?php if (!$store_suppliers->Creationdate->ReadOnly && !$store_suppliers->Creationdate->Disabled && !isset($store_suppliers->Creationdate->EditAttrs["readonly"]) && !isset($store_suppliers->Creationdate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fstore_suppliersaddopt", "x_Creationdate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
<?php echo $store_suppliers->Creationdate->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->Address1->Visible) { // Address1 ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Address1"><?php echo $store_suppliers->Address1->caption() ?><?php echo ($store_suppliers->Address1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_suppliers" data-field="x_Address1" name="x_Address1" id="x_Address1" size="30" maxlength="250" placeholder="<?php echo HtmlEncode($store_suppliers->Address1->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->Address1->EditValue ?>"<?php echo $store_suppliers->Address1->editAttributes() ?>>
<?php echo $store_suppliers->Address1->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->Address2->Visible) { // Address2 ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Address2"><?php echo $store_suppliers->Address2->caption() ?><?php echo ($store_suppliers->Address2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_suppliers" data-field="x_Address2" name="x_Address2" id="x_Address2" size="30" maxlength="250" placeholder="<?php echo HtmlEncode($store_suppliers->Address2->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->Address2->EditValue ?>"<?php echo $store_suppliers->Address2->editAttributes() ?>>
<?php echo $store_suppliers->Address2->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->Address3->Visible) { // Address3 ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Address3"><?php echo $store_suppliers->Address3->caption() ?><?php echo ($store_suppliers->Address3->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_suppliers" data-field="x_Address3" name="x_Address3" id="x_Address3" size="30" maxlength="250" placeholder="<?php echo HtmlEncode($store_suppliers->Address3->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->Address3->EditValue ?>"<?php echo $store_suppliers->Address3->editAttributes() ?>>
<?php echo $store_suppliers->Address3->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->Citycode->Visible) { // Citycode ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Citycode"><?php echo $store_suppliers->Citycode->caption() ?><?php echo ($store_suppliers->Citycode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_suppliers" data-field="x_Citycode" name="x_Citycode" id="x_Citycode" size="30" placeholder="<?php echo HtmlEncode($store_suppliers->Citycode->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->Citycode->EditValue ?>"<?php echo $store_suppliers->Citycode->editAttributes() ?>>
<?php echo $store_suppliers->Citycode->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->State->Visible) { // State ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_State"><?php echo $store_suppliers->State->caption() ?><?php echo ($store_suppliers->State->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_suppliers" data-field="x_State" name="x_State" id="x_State" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($store_suppliers->State->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->State->EditValue ?>"<?php echo $store_suppliers->State->editAttributes() ?>>
<?php echo $store_suppliers->State->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->Pincode->Visible) { // Pincode ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Pincode"><?php echo $store_suppliers->Pincode->caption() ?><?php echo ($store_suppliers->Pincode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_suppliers" data-field="x_Pincode" name="x_Pincode" id="x_Pincode" size="30" maxlength="15" placeholder="<?php echo HtmlEncode($store_suppliers->Pincode->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->Pincode->EditValue ?>"<?php echo $store_suppliers->Pincode->editAttributes() ?>>
<?php echo $store_suppliers->Pincode->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->Tngstnumber->Visible) { // Tngstnumber ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Tngstnumber"><?php echo $store_suppliers->Tngstnumber->caption() ?><?php echo ($store_suppliers->Tngstnumber->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_suppliers" data-field="x_Tngstnumber" name="x_Tngstnumber" id="x_Tngstnumber" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($store_suppliers->Tngstnumber->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->Tngstnumber->EditValue ?>"<?php echo $store_suppliers->Tngstnumber->editAttributes() ?>>
<?php echo $store_suppliers->Tngstnumber->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->Phone->Visible) { // Phone ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Phone"><?php echo $store_suppliers->Phone->caption() ?><?php echo ($store_suppliers->Phone->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_suppliers" data-field="x_Phone" name="x_Phone" id="x_Phone" size="30" maxlength="40" placeholder="<?php echo HtmlEncode($store_suppliers->Phone->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->Phone->EditValue ?>"<?php echo $store_suppliers->Phone->editAttributes() ?>>
<?php echo $store_suppliers->Phone->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->Fax->Visible) { // Fax ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Fax"><?php echo $store_suppliers->Fax->caption() ?><?php echo ($store_suppliers->Fax->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_suppliers" data-field="x_Fax" name="x_Fax" id="x_Fax" size="30" maxlength="40" placeholder="<?php echo HtmlEncode($store_suppliers->Fax->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->Fax->EditValue ?>"<?php echo $store_suppliers->Fax->editAttributes() ?>>
<?php echo $store_suppliers->Fax->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->_Email->Visible) { // Email ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x__Email"><?php echo $store_suppliers->_Email->caption() ?><?php echo ($store_suppliers->_Email->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_suppliers" data-field="x__Email" name="x__Email" id="x__Email" size="30" maxlength="40" placeholder="<?php echo HtmlEncode($store_suppliers->_Email->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->_Email->EditValue ?>"<?php echo $store_suppliers->_Email->editAttributes() ?>>
<?php echo $store_suppliers->_Email->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->Paymentmode->Visible) { // Paymentmode ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Paymentmode"><?php echo $store_suppliers->Paymentmode->caption() ?><?php echo ($store_suppliers->Paymentmode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_suppliers" data-field="x_Paymentmode" name="x_Paymentmode" id="x_Paymentmode" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($store_suppliers->Paymentmode->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->Paymentmode->EditValue ?>"<?php echo $store_suppliers->Paymentmode->editAttributes() ?>>
<?php echo $store_suppliers->Paymentmode->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->Contactperson1->Visible) { // Contactperson1 ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Contactperson1"><?php echo $store_suppliers->Contactperson1->caption() ?><?php echo ($store_suppliers->Contactperson1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_suppliers" data-field="x_Contactperson1" name="x_Contactperson1" id="x_Contactperson1" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($store_suppliers->Contactperson1->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->Contactperson1->EditValue ?>"<?php echo $store_suppliers->Contactperson1->editAttributes() ?>>
<?php echo $store_suppliers->Contactperson1->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->CP1Address1->Visible) { // CP1Address1 ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_CP1Address1"><?php echo $store_suppliers->CP1Address1->caption() ?><?php echo ($store_suppliers->CP1Address1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_suppliers" data-field="x_CP1Address1" name="x_CP1Address1" id="x_CP1Address1" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($store_suppliers->CP1Address1->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->CP1Address1->EditValue ?>"<?php echo $store_suppliers->CP1Address1->editAttributes() ?>>
<?php echo $store_suppliers->CP1Address1->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->CP1Address2->Visible) { // CP1Address2 ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_CP1Address2"><?php echo $store_suppliers->CP1Address2->caption() ?><?php echo ($store_suppliers->CP1Address2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_suppliers" data-field="x_CP1Address2" name="x_CP1Address2" id="x_CP1Address2" size="30" maxlength="250" placeholder="<?php echo HtmlEncode($store_suppliers->CP1Address2->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->CP1Address2->EditValue ?>"<?php echo $store_suppliers->CP1Address2->editAttributes() ?>>
<?php echo $store_suppliers->CP1Address2->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->CP1Address3->Visible) { // CP1Address3 ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_CP1Address3"><?php echo $store_suppliers->CP1Address3->caption() ?><?php echo ($store_suppliers->CP1Address3->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_suppliers" data-field="x_CP1Address3" name="x_CP1Address3" id="x_CP1Address3" size="30" maxlength="250" placeholder="<?php echo HtmlEncode($store_suppliers->CP1Address3->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->CP1Address3->EditValue ?>"<?php echo $store_suppliers->CP1Address3->editAttributes() ?>>
<?php echo $store_suppliers->CP1Address3->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->CP1Citycode->Visible) { // CP1Citycode ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_CP1Citycode"><?php echo $store_suppliers->CP1Citycode->caption() ?><?php echo ($store_suppliers->CP1Citycode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_suppliers" data-field="x_CP1Citycode" name="x_CP1Citycode" id="x_CP1Citycode" size="30" placeholder="<?php echo HtmlEncode($store_suppliers->CP1Citycode->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->CP1Citycode->EditValue ?>"<?php echo $store_suppliers->CP1Citycode->editAttributes() ?>>
<?php echo $store_suppliers->CP1Citycode->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->CP1State->Visible) { // CP1State ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_CP1State"><?php echo $store_suppliers->CP1State->caption() ?><?php echo ($store_suppliers->CP1State->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_suppliers" data-field="x_CP1State" name="x_CP1State" id="x_CP1State" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($store_suppliers->CP1State->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->CP1State->EditValue ?>"<?php echo $store_suppliers->CP1State->editAttributes() ?>>
<?php echo $store_suppliers->CP1State->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->CP1Pincode->Visible) { // CP1Pincode ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_CP1Pincode"><?php echo $store_suppliers->CP1Pincode->caption() ?><?php echo ($store_suppliers->CP1Pincode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_suppliers" data-field="x_CP1Pincode" name="x_CP1Pincode" id="x_CP1Pincode" size="30" maxlength="15" placeholder="<?php echo HtmlEncode($store_suppliers->CP1Pincode->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->CP1Pincode->EditValue ?>"<?php echo $store_suppliers->CP1Pincode->editAttributes() ?>>
<?php echo $store_suppliers->CP1Pincode->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->CP1Designation->Visible) { // CP1Designation ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_CP1Designation"><?php echo $store_suppliers->CP1Designation->caption() ?><?php echo ($store_suppliers->CP1Designation->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_suppliers" data-field="x_CP1Designation" name="x_CP1Designation" id="x_CP1Designation" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($store_suppliers->CP1Designation->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->CP1Designation->EditValue ?>"<?php echo $store_suppliers->CP1Designation->editAttributes() ?>>
<?php echo $store_suppliers->CP1Designation->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->CP1Phone->Visible) { // CP1Phone ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_CP1Phone"><?php echo $store_suppliers->CP1Phone->caption() ?><?php echo ($store_suppliers->CP1Phone->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_suppliers" data-field="x_CP1Phone" name="x_CP1Phone" id="x_CP1Phone" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($store_suppliers->CP1Phone->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->CP1Phone->EditValue ?>"<?php echo $store_suppliers->CP1Phone->editAttributes() ?>>
<?php echo $store_suppliers->CP1Phone->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->CP1MobileNo->Visible) { // CP1MobileNo ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_CP1MobileNo"><?php echo $store_suppliers->CP1MobileNo->caption() ?><?php echo ($store_suppliers->CP1MobileNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_suppliers" data-field="x_CP1MobileNo" name="x_CP1MobileNo" id="x_CP1MobileNo" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($store_suppliers->CP1MobileNo->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->CP1MobileNo->EditValue ?>"<?php echo $store_suppliers->CP1MobileNo->editAttributes() ?>>
<?php echo $store_suppliers->CP1MobileNo->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->CP1Fax->Visible) { // CP1Fax ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_CP1Fax"><?php echo $store_suppliers->CP1Fax->caption() ?><?php echo ($store_suppliers->CP1Fax->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_suppliers" data-field="x_CP1Fax" name="x_CP1Fax" id="x_CP1Fax" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($store_suppliers->CP1Fax->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->CP1Fax->EditValue ?>"<?php echo $store_suppliers->CP1Fax->editAttributes() ?>>
<?php echo $store_suppliers->CP1Fax->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->CP1Email->Visible) { // CP1Email ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_CP1Email"><?php echo $store_suppliers->CP1Email->caption() ?><?php echo ($store_suppliers->CP1Email->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_suppliers" data-field="x_CP1Email" name="x_CP1Email" id="x_CP1Email" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($store_suppliers->CP1Email->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->CP1Email->EditValue ?>"<?php echo $store_suppliers->CP1Email->editAttributes() ?>>
<?php echo $store_suppliers->CP1Email->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->Contactperson2->Visible) { // Contactperson2 ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Contactperson2"><?php echo $store_suppliers->Contactperson2->caption() ?><?php echo ($store_suppliers->Contactperson2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_suppliers" data-field="x_Contactperson2" name="x_Contactperson2" id="x_Contactperson2" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($store_suppliers->Contactperson2->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->Contactperson2->EditValue ?>"<?php echo $store_suppliers->Contactperson2->editAttributes() ?>>
<?php echo $store_suppliers->Contactperson2->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->CP2Address1->Visible) { // CP2Address1 ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_CP2Address1"><?php echo $store_suppliers->CP2Address1->caption() ?><?php echo ($store_suppliers->CP2Address1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_suppliers" data-field="x_CP2Address1" name="x_CP2Address1" id="x_CP2Address1" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($store_suppliers->CP2Address1->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->CP2Address1->EditValue ?>"<?php echo $store_suppliers->CP2Address1->editAttributes() ?>>
<?php echo $store_suppliers->CP2Address1->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->CP2Address2->Visible) { // CP2Address2 ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_CP2Address2"><?php echo $store_suppliers->CP2Address2->caption() ?><?php echo ($store_suppliers->CP2Address2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_suppliers" data-field="x_CP2Address2" name="x_CP2Address2" id="x_CP2Address2" size="30" maxlength="250" placeholder="<?php echo HtmlEncode($store_suppliers->CP2Address2->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->CP2Address2->EditValue ?>"<?php echo $store_suppliers->CP2Address2->editAttributes() ?>>
<?php echo $store_suppliers->CP2Address2->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->CP2Address3->Visible) { // CP2Address3 ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_CP2Address3"><?php echo $store_suppliers->CP2Address3->caption() ?><?php echo ($store_suppliers->CP2Address3->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_suppliers" data-field="x_CP2Address3" name="x_CP2Address3" id="x_CP2Address3" size="30" maxlength="250" placeholder="<?php echo HtmlEncode($store_suppliers->CP2Address3->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->CP2Address3->EditValue ?>"<?php echo $store_suppliers->CP2Address3->editAttributes() ?>>
<?php echo $store_suppliers->CP2Address3->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->CP2Citycode->Visible) { // CP2Citycode ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_CP2Citycode"><?php echo $store_suppliers->CP2Citycode->caption() ?><?php echo ($store_suppliers->CP2Citycode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_suppliers" data-field="x_CP2Citycode" name="x_CP2Citycode" id="x_CP2Citycode" size="30" placeholder="<?php echo HtmlEncode($store_suppliers->CP2Citycode->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->CP2Citycode->EditValue ?>"<?php echo $store_suppliers->CP2Citycode->editAttributes() ?>>
<?php echo $store_suppliers->CP2Citycode->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->CP2State->Visible) { // CP2State ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_CP2State"><?php echo $store_suppliers->CP2State->caption() ?><?php echo ($store_suppliers->CP2State->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_suppliers" data-field="x_CP2State" name="x_CP2State" id="x_CP2State" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($store_suppliers->CP2State->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->CP2State->EditValue ?>"<?php echo $store_suppliers->CP2State->editAttributes() ?>>
<?php echo $store_suppliers->CP2State->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->CP2Pincode->Visible) { // CP2Pincode ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_CP2Pincode"><?php echo $store_suppliers->CP2Pincode->caption() ?><?php echo ($store_suppliers->CP2Pincode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_suppliers" data-field="x_CP2Pincode" name="x_CP2Pincode" id="x_CP2Pincode" size="30" maxlength="15" placeholder="<?php echo HtmlEncode($store_suppliers->CP2Pincode->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->CP2Pincode->EditValue ?>"<?php echo $store_suppliers->CP2Pincode->editAttributes() ?>>
<?php echo $store_suppliers->CP2Pincode->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->CP2Designation->Visible) { // CP2Designation ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_CP2Designation"><?php echo $store_suppliers->CP2Designation->caption() ?><?php echo ($store_suppliers->CP2Designation->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_suppliers" data-field="x_CP2Designation" name="x_CP2Designation" id="x_CP2Designation" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($store_suppliers->CP2Designation->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->CP2Designation->EditValue ?>"<?php echo $store_suppliers->CP2Designation->editAttributes() ?>>
<?php echo $store_suppliers->CP2Designation->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->CP2Phone->Visible) { // CP2Phone ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_CP2Phone"><?php echo $store_suppliers->CP2Phone->caption() ?><?php echo ($store_suppliers->CP2Phone->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_suppliers" data-field="x_CP2Phone" name="x_CP2Phone" id="x_CP2Phone" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($store_suppliers->CP2Phone->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->CP2Phone->EditValue ?>"<?php echo $store_suppliers->CP2Phone->editAttributes() ?>>
<?php echo $store_suppliers->CP2Phone->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->CP2MobileNo->Visible) { // CP2MobileNo ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_CP2MobileNo"><?php echo $store_suppliers->CP2MobileNo->caption() ?><?php echo ($store_suppliers->CP2MobileNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_suppliers" data-field="x_CP2MobileNo" name="x_CP2MobileNo" id="x_CP2MobileNo" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($store_suppliers->CP2MobileNo->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->CP2MobileNo->EditValue ?>"<?php echo $store_suppliers->CP2MobileNo->editAttributes() ?>>
<?php echo $store_suppliers->CP2MobileNo->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->CP2Fax->Visible) { // CP2Fax ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_CP2Fax"><?php echo $store_suppliers->CP2Fax->caption() ?><?php echo ($store_suppliers->CP2Fax->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_suppliers" data-field="x_CP2Fax" name="x_CP2Fax" id="x_CP2Fax" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($store_suppliers->CP2Fax->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->CP2Fax->EditValue ?>"<?php echo $store_suppliers->CP2Fax->editAttributes() ?>>
<?php echo $store_suppliers->CP2Fax->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->CP2Email->Visible) { // CP2Email ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_CP2Email"><?php echo $store_suppliers->CP2Email->caption() ?><?php echo ($store_suppliers->CP2Email->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_suppliers" data-field="x_CP2Email" name="x_CP2Email" id="x_CP2Email" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($store_suppliers->CP2Email->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->CP2Email->EditValue ?>"<?php echo $store_suppliers->CP2Email->editAttributes() ?>>
<?php echo $store_suppliers->CP2Email->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->Type->Visible) { // Type ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Type"><?php echo $store_suppliers->Type->caption() ?><?php echo ($store_suppliers->Type->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_suppliers" data-field="x_Type" name="x_Type" id="x_Type" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($store_suppliers->Type->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->Type->EditValue ?>"<?php echo $store_suppliers->Type->editAttributes() ?>>
<?php echo $store_suppliers->Type->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->Creditterms->Visible) { // Creditterms ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Creditterms"><?php echo $store_suppliers->Creditterms->caption() ?><?php echo ($store_suppliers->Creditterms->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_suppliers" data-field="x_Creditterms" name="x_Creditterms" id="x_Creditterms" size="30" maxlength="120" placeholder="<?php echo HtmlEncode($store_suppliers->Creditterms->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->Creditterms->EditValue ?>"<?php echo $store_suppliers->Creditterms->editAttributes() ?>>
<?php echo $store_suppliers->Creditterms->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->Remarks->Visible) { // Remarks ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Remarks"><?php echo $store_suppliers->Remarks->caption() ?><?php echo ($store_suppliers->Remarks->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_suppliers" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" size="30" maxlength="120" placeholder="<?php echo HtmlEncode($store_suppliers->Remarks->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->Remarks->EditValue ?>"<?php echo $store_suppliers->Remarks->editAttributes() ?>>
<?php echo $store_suppliers->Remarks->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->Tinnumber->Visible) { // Tinnumber ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Tinnumber"><?php echo $store_suppliers->Tinnumber->caption() ?><?php echo ($store_suppliers->Tinnumber->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_suppliers" data-field="x_Tinnumber" name="x_Tinnumber" id="x_Tinnumber" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($store_suppliers->Tinnumber->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->Tinnumber->EditValue ?>"<?php echo $store_suppliers->Tinnumber->editAttributes() ?>>
<?php echo $store_suppliers->Tinnumber->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->Universalsuppliercode->Visible) { // Universalsuppliercode ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Universalsuppliercode"><?php echo $store_suppliers->Universalsuppliercode->caption() ?><?php echo ($store_suppliers->Universalsuppliercode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_suppliers" data-field="x_Universalsuppliercode" name="x_Universalsuppliercode" id="x_Universalsuppliercode" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($store_suppliers->Universalsuppliercode->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->Universalsuppliercode->EditValue ?>"<?php echo $store_suppliers->Universalsuppliercode->editAttributes() ?>>
<?php echo $store_suppliers->Universalsuppliercode->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->Mobilenumber->Visible) { // Mobilenumber ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Mobilenumber"><?php echo $store_suppliers->Mobilenumber->caption() ?><?php echo ($store_suppliers->Mobilenumber->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_suppliers" data-field="x_Mobilenumber" name="x_Mobilenumber" id="x_Mobilenumber" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($store_suppliers->Mobilenumber->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->Mobilenumber->EditValue ?>"<?php echo $store_suppliers->Mobilenumber->editAttributes() ?>>
<?php echo $store_suppliers->Mobilenumber->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->PANNumber->Visible) { // PANNumber ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_PANNumber"><?php echo $store_suppliers->PANNumber->caption() ?><?php echo ($store_suppliers->PANNumber->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_suppliers" data-field="x_PANNumber" name="x_PANNumber" id="x_PANNumber" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($store_suppliers->PANNumber->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->PANNumber->EditValue ?>"<?php echo $store_suppliers->PANNumber->editAttributes() ?>>
<?php echo $store_suppliers->PANNumber->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->SalesRepMobileNo->Visible) { // SalesRepMobileNo ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_SalesRepMobileNo"><?php echo $store_suppliers->SalesRepMobileNo->caption() ?><?php echo ($store_suppliers->SalesRepMobileNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_suppliers" data-field="x_SalesRepMobileNo" name="x_SalesRepMobileNo" id="x_SalesRepMobileNo" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($store_suppliers->SalesRepMobileNo->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->SalesRepMobileNo->EditValue ?>"<?php echo $store_suppliers->SalesRepMobileNo->editAttributes() ?>>
<?php echo $store_suppliers->SalesRepMobileNo->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->GSTNumber->Visible) { // GSTNumber ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_GSTNumber"><?php echo $store_suppliers->GSTNumber->caption() ?><?php echo ($store_suppliers->GSTNumber->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_suppliers" data-field="x_GSTNumber" name="x_GSTNumber" id="x_GSTNumber" size="30" maxlength="15" placeholder="<?php echo HtmlEncode($store_suppliers->GSTNumber->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->GSTNumber->EditValue ?>"<?php echo $store_suppliers->GSTNumber->editAttributes() ?>>
<?php echo $store_suppliers->GSTNumber->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->TANNumber->Visible) { // TANNumber ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_TANNumber"><?php echo $store_suppliers->TANNumber->caption() ?><?php echo ($store_suppliers->TANNumber->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_suppliers" data-field="x_TANNumber" name="x_TANNumber" id="x_TANNumber" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($store_suppliers->TANNumber->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->TANNumber->EditValue ?>"<?php echo $store_suppliers->TANNumber->editAttributes() ?>>
<?php echo $store_suppliers->TANNumber->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->HospID->Visible) { // HospID ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_HospID"><?php echo $store_suppliers->HospID->caption() ?><?php echo ($store_suppliers->HospID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_suppliers" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?php echo HtmlEncode($store_suppliers->HospID->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->HospID->EditValue ?>"<?php echo $store_suppliers->HospID->editAttributes() ?>>
<?php echo $store_suppliers->HospID->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->BranchID->Visible) { // BranchID ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_BranchID"><?php echo $store_suppliers->BranchID->caption() ?><?php echo ($store_suppliers->BranchID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_suppliers" data-field="x_BranchID" name="x_BranchID" id="x_BranchID" size="30" placeholder="<?php echo HtmlEncode($store_suppliers->BranchID->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->BranchID->EditValue ?>"<?php echo $store_suppliers->BranchID->editAttributes() ?>>
<?php echo $store_suppliers->BranchID->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->StoreID->Visible) { // StoreID ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_StoreID"><?php echo $store_suppliers->StoreID->caption() ?><?php echo ($store_suppliers->StoreID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="store_suppliers" data-field="x_StoreID" name="x_StoreID" id="x_StoreID" size="30" placeholder="<?php echo HtmlEncode($store_suppliers->StoreID->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->StoreID->EditValue ?>"<?php echo $store_suppliers->StoreID->editAttributes() ?>>
<?php echo $store_suppliers->StoreID->CustomMsg ?></div>
	</div>
<?php } ?>
</form>
<?php
$store_suppliers_addopt->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php
$store_suppliers_addopt->terminate();
?>