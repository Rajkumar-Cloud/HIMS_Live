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
$store_suppliers_add = new store_suppliers_add();

// Run the page
$store_suppliers_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$store_suppliers_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fstore_suppliersadd = currentForm = new ew.Form("fstore_suppliersadd", "add");

// Validate form
fstore_suppliersadd.validate = function() {
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
		<?php if ($store_suppliers_add->Suppliercode->Required) { ?>
			elm = this.getElements("x" + infix + "_Suppliercode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->Suppliercode->caption(), $store_suppliers->Suppliercode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_add->Suppliername->Required) { ?>
			elm = this.getElements("x" + infix + "_Suppliername");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->Suppliername->caption(), $store_suppliers->Suppliername->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_add->Abbreviation->Required) { ?>
			elm = this.getElements("x" + infix + "_Abbreviation");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->Abbreviation->caption(), $store_suppliers->Abbreviation->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_add->Creationdate->Required) { ?>
			elm = this.getElements("x" + infix + "_Creationdate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->Creationdate->caption(), $store_suppliers->Creationdate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Creationdate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_suppliers->Creationdate->errorMessage()) ?>");
		<?php if ($store_suppliers_add->Address1->Required) { ?>
			elm = this.getElements("x" + infix + "_Address1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->Address1->caption(), $store_suppliers->Address1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_add->Address2->Required) { ?>
			elm = this.getElements("x" + infix + "_Address2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->Address2->caption(), $store_suppliers->Address2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_add->Address3->Required) { ?>
			elm = this.getElements("x" + infix + "_Address3");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->Address3->caption(), $store_suppliers->Address3->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_add->Citycode->Required) { ?>
			elm = this.getElements("x" + infix + "_Citycode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->Citycode->caption(), $store_suppliers->Citycode->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Citycode");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_suppliers->Citycode->errorMessage()) ?>");
		<?php if ($store_suppliers_add->State->Required) { ?>
			elm = this.getElements("x" + infix + "_State");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->State->caption(), $store_suppliers->State->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_add->Pincode->Required) { ?>
			elm = this.getElements("x" + infix + "_Pincode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->Pincode->caption(), $store_suppliers->Pincode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_add->Tngstnumber->Required) { ?>
			elm = this.getElements("x" + infix + "_Tngstnumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->Tngstnumber->caption(), $store_suppliers->Tngstnumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_add->Phone->Required) { ?>
			elm = this.getElements("x" + infix + "_Phone");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->Phone->caption(), $store_suppliers->Phone->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_add->Fax->Required) { ?>
			elm = this.getElements("x" + infix + "_Fax");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->Fax->caption(), $store_suppliers->Fax->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_add->_Email->Required) { ?>
			elm = this.getElements("x" + infix + "__Email");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->_Email->caption(), $store_suppliers->_Email->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_add->Paymentmode->Required) { ?>
			elm = this.getElements("x" + infix + "_Paymentmode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->Paymentmode->caption(), $store_suppliers->Paymentmode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_add->Contactperson1->Required) { ?>
			elm = this.getElements("x" + infix + "_Contactperson1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->Contactperson1->caption(), $store_suppliers->Contactperson1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_add->CP1Address1->Required) { ?>
			elm = this.getElements("x" + infix + "_CP1Address1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->CP1Address1->caption(), $store_suppliers->CP1Address1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_add->CP1Address2->Required) { ?>
			elm = this.getElements("x" + infix + "_CP1Address2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->CP1Address2->caption(), $store_suppliers->CP1Address2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_add->CP1Address3->Required) { ?>
			elm = this.getElements("x" + infix + "_CP1Address3");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->CP1Address3->caption(), $store_suppliers->CP1Address3->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_add->CP1Citycode->Required) { ?>
			elm = this.getElements("x" + infix + "_CP1Citycode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->CP1Citycode->caption(), $store_suppliers->CP1Citycode->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_CP1Citycode");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_suppliers->CP1Citycode->errorMessage()) ?>");
		<?php if ($store_suppliers_add->CP1State->Required) { ?>
			elm = this.getElements("x" + infix + "_CP1State");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->CP1State->caption(), $store_suppliers->CP1State->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_add->CP1Pincode->Required) { ?>
			elm = this.getElements("x" + infix + "_CP1Pincode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->CP1Pincode->caption(), $store_suppliers->CP1Pincode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_add->CP1Designation->Required) { ?>
			elm = this.getElements("x" + infix + "_CP1Designation");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->CP1Designation->caption(), $store_suppliers->CP1Designation->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_add->CP1Phone->Required) { ?>
			elm = this.getElements("x" + infix + "_CP1Phone");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->CP1Phone->caption(), $store_suppliers->CP1Phone->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_add->CP1MobileNo->Required) { ?>
			elm = this.getElements("x" + infix + "_CP1MobileNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->CP1MobileNo->caption(), $store_suppliers->CP1MobileNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_add->CP1Fax->Required) { ?>
			elm = this.getElements("x" + infix + "_CP1Fax");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->CP1Fax->caption(), $store_suppliers->CP1Fax->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_add->CP1Email->Required) { ?>
			elm = this.getElements("x" + infix + "_CP1Email");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->CP1Email->caption(), $store_suppliers->CP1Email->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_add->Contactperson2->Required) { ?>
			elm = this.getElements("x" + infix + "_Contactperson2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->Contactperson2->caption(), $store_suppliers->Contactperson2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_add->CP2Address1->Required) { ?>
			elm = this.getElements("x" + infix + "_CP2Address1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->CP2Address1->caption(), $store_suppliers->CP2Address1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_add->CP2Address2->Required) { ?>
			elm = this.getElements("x" + infix + "_CP2Address2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->CP2Address2->caption(), $store_suppliers->CP2Address2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_add->CP2Address3->Required) { ?>
			elm = this.getElements("x" + infix + "_CP2Address3");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->CP2Address3->caption(), $store_suppliers->CP2Address3->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_add->CP2Citycode->Required) { ?>
			elm = this.getElements("x" + infix + "_CP2Citycode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->CP2Citycode->caption(), $store_suppliers->CP2Citycode->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_CP2Citycode");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_suppliers->CP2Citycode->errorMessage()) ?>");
		<?php if ($store_suppliers_add->CP2State->Required) { ?>
			elm = this.getElements("x" + infix + "_CP2State");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->CP2State->caption(), $store_suppliers->CP2State->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_add->CP2Pincode->Required) { ?>
			elm = this.getElements("x" + infix + "_CP2Pincode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->CP2Pincode->caption(), $store_suppliers->CP2Pincode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_add->CP2Designation->Required) { ?>
			elm = this.getElements("x" + infix + "_CP2Designation");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->CP2Designation->caption(), $store_suppliers->CP2Designation->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_add->CP2Phone->Required) { ?>
			elm = this.getElements("x" + infix + "_CP2Phone");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->CP2Phone->caption(), $store_suppliers->CP2Phone->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_add->CP2MobileNo->Required) { ?>
			elm = this.getElements("x" + infix + "_CP2MobileNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->CP2MobileNo->caption(), $store_suppliers->CP2MobileNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_add->CP2Fax->Required) { ?>
			elm = this.getElements("x" + infix + "_CP2Fax");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->CP2Fax->caption(), $store_suppliers->CP2Fax->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_add->CP2Email->Required) { ?>
			elm = this.getElements("x" + infix + "_CP2Email");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->CP2Email->caption(), $store_suppliers->CP2Email->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_add->Type->Required) { ?>
			elm = this.getElements("x" + infix + "_Type");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->Type->caption(), $store_suppliers->Type->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_add->Creditterms->Required) { ?>
			elm = this.getElements("x" + infix + "_Creditterms");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->Creditterms->caption(), $store_suppliers->Creditterms->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_add->Remarks->Required) { ?>
			elm = this.getElements("x" + infix + "_Remarks");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->Remarks->caption(), $store_suppliers->Remarks->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_add->Tinnumber->Required) { ?>
			elm = this.getElements("x" + infix + "_Tinnumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->Tinnumber->caption(), $store_suppliers->Tinnumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_add->Universalsuppliercode->Required) { ?>
			elm = this.getElements("x" + infix + "_Universalsuppliercode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->Universalsuppliercode->caption(), $store_suppliers->Universalsuppliercode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_add->Mobilenumber->Required) { ?>
			elm = this.getElements("x" + infix + "_Mobilenumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->Mobilenumber->caption(), $store_suppliers->Mobilenumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_add->PANNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_PANNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->PANNumber->caption(), $store_suppliers->PANNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_add->SalesRepMobileNo->Required) { ?>
			elm = this.getElements("x" + infix + "_SalesRepMobileNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->SalesRepMobileNo->caption(), $store_suppliers->SalesRepMobileNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_add->GSTNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_GSTNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->GSTNumber->caption(), $store_suppliers->GSTNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_add->TANNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_TANNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->TANNumber->caption(), $store_suppliers->TANNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($store_suppliers_add->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->HospID->caption(), $store_suppliers->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_suppliers->HospID->errorMessage()) ?>");
		<?php if ($store_suppliers_add->BranchID->Required) { ?>
			elm = this.getElements("x" + infix + "_BranchID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $store_suppliers->BranchID->caption(), $store_suppliers->BranchID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BranchID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($store_suppliers->BranchID->errorMessage()) ?>");
		<?php if ($store_suppliers_add->StoreID->Required) { ?>
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
fstore_suppliersadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fstore_suppliersadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $store_suppliers_add->showPageHeader(); ?>
<?php
$store_suppliers_add->showMessage();
?>
<form name="fstore_suppliersadd" id="fstore_suppliersadd" class="<?php echo $store_suppliers_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($store_suppliers_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $store_suppliers_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="store_suppliers">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$store_suppliers_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($store_suppliers->Suppliercode->Visible) { // Suppliercode ?>
	<div id="r_Suppliercode" class="form-group row">
		<label id="elh_store_suppliers_Suppliercode" for="x_Suppliercode" class="<?php echo $store_suppliers_add->LeftColumnClass ?>"><?php echo $store_suppliers->Suppliercode->caption() ?><?php echo ($store_suppliers->Suppliercode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_suppliers_add->RightColumnClass ?>"><div<?php echo $store_suppliers->Suppliercode->cellAttributes() ?>>
<span id="el_store_suppliers_Suppliercode">
<input type="text" data-table="store_suppliers" data-field="x_Suppliercode" name="x_Suppliercode" id="x_Suppliercode" size="30" maxlength="15" placeholder="<?php echo HtmlEncode($store_suppliers->Suppliercode->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->Suppliercode->EditValue ?>"<?php echo $store_suppliers->Suppliercode->editAttributes() ?>>
</span>
<?php echo $store_suppliers->Suppliercode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->Suppliername->Visible) { // Suppliername ?>
	<div id="r_Suppliername" class="form-group row">
		<label id="elh_store_suppliers_Suppliername" for="x_Suppliername" class="<?php echo $store_suppliers_add->LeftColumnClass ?>"><?php echo $store_suppliers->Suppliername->caption() ?><?php echo ($store_suppliers->Suppliername->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_suppliers_add->RightColumnClass ?>"><div<?php echo $store_suppliers->Suppliername->cellAttributes() ?>>
<span id="el_store_suppliers_Suppliername">
<input type="text" data-table="store_suppliers" data-field="x_Suppliername" name="x_Suppliername" id="x_Suppliername" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($store_suppliers->Suppliername->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->Suppliername->EditValue ?>"<?php echo $store_suppliers->Suppliername->editAttributes() ?>>
</span>
<?php echo $store_suppliers->Suppliername->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->Abbreviation->Visible) { // Abbreviation ?>
	<div id="r_Abbreviation" class="form-group row">
		<label id="elh_store_suppliers_Abbreviation" for="x_Abbreviation" class="<?php echo $store_suppliers_add->LeftColumnClass ?>"><?php echo $store_suppliers->Abbreviation->caption() ?><?php echo ($store_suppliers->Abbreviation->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_suppliers_add->RightColumnClass ?>"><div<?php echo $store_suppliers->Abbreviation->cellAttributes() ?>>
<span id="el_store_suppliers_Abbreviation">
<input type="text" data-table="store_suppliers" data-field="x_Abbreviation" name="x_Abbreviation" id="x_Abbreviation" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($store_suppliers->Abbreviation->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->Abbreviation->EditValue ?>"<?php echo $store_suppliers->Abbreviation->editAttributes() ?>>
</span>
<?php echo $store_suppliers->Abbreviation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->Creationdate->Visible) { // Creationdate ?>
	<div id="r_Creationdate" class="form-group row">
		<label id="elh_store_suppliers_Creationdate" for="x_Creationdate" class="<?php echo $store_suppliers_add->LeftColumnClass ?>"><?php echo $store_suppliers->Creationdate->caption() ?><?php echo ($store_suppliers->Creationdate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_suppliers_add->RightColumnClass ?>"><div<?php echo $store_suppliers->Creationdate->cellAttributes() ?>>
<span id="el_store_suppliers_Creationdate">
<input type="text" data-table="store_suppliers" data-field="x_Creationdate" name="x_Creationdate" id="x_Creationdate" placeholder="<?php echo HtmlEncode($store_suppliers->Creationdate->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->Creationdate->EditValue ?>"<?php echo $store_suppliers->Creationdate->editAttributes() ?>>
<?php if (!$store_suppliers->Creationdate->ReadOnly && !$store_suppliers->Creationdate->Disabled && !isset($store_suppliers->Creationdate->EditAttrs["readonly"]) && !isset($store_suppliers->Creationdate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fstore_suppliersadd", "x_Creationdate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $store_suppliers->Creationdate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->Address1->Visible) { // Address1 ?>
	<div id="r_Address1" class="form-group row">
		<label id="elh_store_suppliers_Address1" for="x_Address1" class="<?php echo $store_suppliers_add->LeftColumnClass ?>"><?php echo $store_suppliers->Address1->caption() ?><?php echo ($store_suppliers->Address1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_suppliers_add->RightColumnClass ?>"><div<?php echo $store_suppliers->Address1->cellAttributes() ?>>
<span id="el_store_suppliers_Address1">
<input type="text" data-table="store_suppliers" data-field="x_Address1" name="x_Address1" id="x_Address1" size="30" maxlength="250" placeholder="<?php echo HtmlEncode($store_suppliers->Address1->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->Address1->EditValue ?>"<?php echo $store_suppliers->Address1->editAttributes() ?>>
</span>
<?php echo $store_suppliers->Address1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->Address2->Visible) { // Address2 ?>
	<div id="r_Address2" class="form-group row">
		<label id="elh_store_suppliers_Address2" for="x_Address2" class="<?php echo $store_suppliers_add->LeftColumnClass ?>"><?php echo $store_suppliers->Address2->caption() ?><?php echo ($store_suppliers->Address2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_suppliers_add->RightColumnClass ?>"><div<?php echo $store_suppliers->Address2->cellAttributes() ?>>
<span id="el_store_suppliers_Address2">
<input type="text" data-table="store_suppliers" data-field="x_Address2" name="x_Address2" id="x_Address2" size="30" maxlength="250" placeholder="<?php echo HtmlEncode($store_suppliers->Address2->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->Address2->EditValue ?>"<?php echo $store_suppliers->Address2->editAttributes() ?>>
</span>
<?php echo $store_suppliers->Address2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->Address3->Visible) { // Address3 ?>
	<div id="r_Address3" class="form-group row">
		<label id="elh_store_suppliers_Address3" for="x_Address3" class="<?php echo $store_suppliers_add->LeftColumnClass ?>"><?php echo $store_suppliers->Address3->caption() ?><?php echo ($store_suppliers->Address3->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_suppliers_add->RightColumnClass ?>"><div<?php echo $store_suppliers->Address3->cellAttributes() ?>>
<span id="el_store_suppliers_Address3">
<input type="text" data-table="store_suppliers" data-field="x_Address3" name="x_Address3" id="x_Address3" size="30" maxlength="250" placeholder="<?php echo HtmlEncode($store_suppliers->Address3->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->Address3->EditValue ?>"<?php echo $store_suppliers->Address3->editAttributes() ?>>
</span>
<?php echo $store_suppliers->Address3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->Citycode->Visible) { // Citycode ?>
	<div id="r_Citycode" class="form-group row">
		<label id="elh_store_suppliers_Citycode" for="x_Citycode" class="<?php echo $store_suppliers_add->LeftColumnClass ?>"><?php echo $store_suppliers->Citycode->caption() ?><?php echo ($store_suppliers->Citycode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_suppliers_add->RightColumnClass ?>"><div<?php echo $store_suppliers->Citycode->cellAttributes() ?>>
<span id="el_store_suppliers_Citycode">
<input type="text" data-table="store_suppliers" data-field="x_Citycode" name="x_Citycode" id="x_Citycode" size="30" placeholder="<?php echo HtmlEncode($store_suppliers->Citycode->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->Citycode->EditValue ?>"<?php echo $store_suppliers->Citycode->editAttributes() ?>>
</span>
<?php echo $store_suppliers->Citycode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->State->Visible) { // State ?>
	<div id="r_State" class="form-group row">
		<label id="elh_store_suppliers_State" for="x_State" class="<?php echo $store_suppliers_add->LeftColumnClass ?>"><?php echo $store_suppliers->State->caption() ?><?php echo ($store_suppliers->State->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_suppliers_add->RightColumnClass ?>"><div<?php echo $store_suppliers->State->cellAttributes() ?>>
<span id="el_store_suppliers_State">
<input type="text" data-table="store_suppliers" data-field="x_State" name="x_State" id="x_State" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($store_suppliers->State->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->State->EditValue ?>"<?php echo $store_suppliers->State->editAttributes() ?>>
</span>
<?php echo $store_suppliers->State->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->Pincode->Visible) { // Pincode ?>
	<div id="r_Pincode" class="form-group row">
		<label id="elh_store_suppliers_Pincode" for="x_Pincode" class="<?php echo $store_suppliers_add->LeftColumnClass ?>"><?php echo $store_suppliers->Pincode->caption() ?><?php echo ($store_suppliers->Pincode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_suppliers_add->RightColumnClass ?>"><div<?php echo $store_suppliers->Pincode->cellAttributes() ?>>
<span id="el_store_suppliers_Pincode">
<input type="text" data-table="store_suppliers" data-field="x_Pincode" name="x_Pincode" id="x_Pincode" size="30" maxlength="15" placeholder="<?php echo HtmlEncode($store_suppliers->Pincode->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->Pincode->EditValue ?>"<?php echo $store_suppliers->Pincode->editAttributes() ?>>
</span>
<?php echo $store_suppliers->Pincode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->Tngstnumber->Visible) { // Tngstnumber ?>
	<div id="r_Tngstnumber" class="form-group row">
		<label id="elh_store_suppliers_Tngstnumber" for="x_Tngstnumber" class="<?php echo $store_suppliers_add->LeftColumnClass ?>"><?php echo $store_suppliers->Tngstnumber->caption() ?><?php echo ($store_suppliers->Tngstnumber->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_suppliers_add->RightColumnClass ?>"><div<?php echo $store_suppliers->Tngstnumber->cellAttributes() ?>>
<span id="el_store_suppliers_Tngstnumber">
<input type="text" data-table="store_suppliers" data-field="x_Tngstnumber" name="x_Tngstnumber" id="x_Tngstnumber" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($store_suppliers->Tngstnumber->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->Tngstnumber->EditValue ?>"<?php echo $store_suppliers->Tngstnumber->editAttributes() ?>>
</span>
<?php echo $store_suppliers->Tngstnumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->Phone->Visible) { // Phone ?>
	<div id="r_Phone" class="form-group row">
		<label id="elh_store_suppliers_Phone" for="x_Phone" class="<?php echo $store_suppliers_add->LeftColumnClass ?>"><?php echo $store_suppliers->Phone->caption() ?><?php echo ($store_suppliers->Phone->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_suppliers_add->RightColumnClass ?>"><div<?php echo $store_suppliers->Phone->cellAttributes() ?>>
<span id="el_store_suppliers_Phone">
<input type="text" data-table="store_suppliers" data-field="x_Phone" name="x_Phone" id="x_Phone" size="30" maxlength="40" placeholder="<?php echo HtmlEncode($store_suppliers->Phone->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->Phone->EditValue ?>"<?php echo $store_suppliers->Phone->editAttributes() ?>>
</span>
<?php echo $store_suppliers->Phone->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->Fax->Visible) { // Fax ?>
	<div id="r_Fax" class="form-group row">
		<label id="elh_store_suppliers_Fax" for="x_Fax" class="<?php echo $store_suppliers_add->LeftColumnClass ?>"><?php echo $store_suppliers->Fax->caption() ?><?php echo ($store_suppliers->Fax->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_suppliers_add->RightColumnClass ?>"><div<?php echo $store_suppliers->Fax->cellAttributes() ?>>
<span id="el_store_suppliers_Fax">
<input type="text" data-table="store_suppliers" data-field="x_Fax" name="x_Fax" id="x_Fax" size="30" maxlength="40" placeholder="<?php echo HtmlEncode($store_suppliers->Fax->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->Fax->EditValue ?>"<?php echo $store_suppliers->Fax->editAttributes() ?>>
</span>
<?php echo $store_suppliers->Fax->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->_Email->Visible) { // Email ?>
	<div id="r__Email" class="form-group row">
		<label id="elh_store_suppliers__Email" for="x__Email" class="<?php echo $store_suppliers_add->LeftColumnClass ?>"><?php echo $store_suppliers->_Email->caption() ?><?php echo ($store_suppliers->_Email->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_suppliers_add->RightColumnClass ?>"><div<?php echo $store_suppliers->_Email->cellAttributes() ?>>
<span id="el_store_suppliers__Email">
<input type="text" data-table="store_suppliers" data-field="x__Email" name="x__Email" id="x__Email" size="30" maxlength="40" placeholder="<?php echo HtmlEncode($store_suppliers->_Email->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->_Email->EditValue ?>"<?php echo $store_suppliers->_Email->editAttributes() ?>>
</span>
<?php echo $store_suppliers->_Email->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->Paymentmode->Visible) { // Paymentmode ?>
	<div id="r_Paymentmode" class="form-group row">
		<label id="elh_store_suppliers_Paymentmode" for="x_Paymentmode" class="<?php echo $store_suppliers_add->LeftColumnClass ?>"><?php echo $store_suppliers->Paymentmode->caption() ?><?php echo ($store_suppliers->Paymentmode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_suppliers_add->RightColumnClass ?>"><div<?php echo $store_suppliers->Paymentmode->cellAttributes() ?>>
<span id="el_store_suppliers_Paymentmode">
<input type="text" data-table="store_suppliers" data-field="x_Paymentmode" name="x_Paymentmode" id="x_Paymentmode" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($store_suppliers->Paymentmode->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->Paymentmode->EditValue ?>"<?php echo $store_suppliers->Paymentmode->editAttributes() ?>>
</span>
<?php echo $store_suppliers->Paymentmode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->Contactperson1->Visible) { // Contactperson1 ?>
	<div id="r_Contactperson1" class="form-group row">
		<label id="elh_store_suppliers_Contactperson1" for="x_Contactperson1" class="<?php echo $store_suppliers_add->LeftColumnClass ?>"><?php echo $store_suppliers->Contactperson1->caption() ?><?php echo ($store_suppliers->Contactperson1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_suppliers_add->RightColumnClass ?>"><div<?php echo $store_suppliers->Contactperson1->cellAttributes() ?>>
<span id="el_store_suppliers_Contactperson1">
<input type="text" data-table="store_suppliers" data-field="x_Contactperson1" name="x_Contactperson1" id="x_Contactperson1" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($store_suppliers->Contactperson1->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->Contactperson1->EditValue ?>"<?php echo $store_suppliers->Contactperson1->editAttributes() ?>>
</span>
<?php echo $store_suppliers->Contactperson1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->CP1Address1->Visible) { // CP1Address1 ?>
	<div id="r_CP1Address1" class="form-group row">
		<label id="elh_store_suppliers_CP1Address1" for="x_CP1Address1" class="<?php echo $store_suppliers_add->LeftColumnClass ?>"><?php echo $store_suppliers->CP1Address1->caption() ?><?php echo ($store_suppliers->CP1Address1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_suppliers_add->RightColumnClass ?>"><div<?php echo $store_suppliers->CP1Address1->cellAttributes() ?>>
<span id="el_store_suppliers_CP1Address1">
<input type="text" data-table="store_suppliers" data-field="x_CP1Address1" name="x_CP1Address1" id="x_CP1Address1" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($store_suppliers->CP1Address1->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->CP1Address1->EditValue ?>"<?php echo $store_suppliers->CP1Address1->editAttributes() ?>>
</span>
<?php echo $store_suppliers->CP1Address1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->CP1Address2->Visible) { // CP1Address2 ?>
	<div id="r_CP1Address2" class="form-group row">
		<label id="elh_store_suppliers_CP1Address2" for="x_CP1Address2" class="<?php echo $store_suppliers_add->LeftColumnClass ?>"><?php echo $store_suppliers->CP1Address2->caption() ?><?php echo ($store_suppliers->CP1Address2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_suppliers_add->RightColumnClass ?>"><div<?php echo $store_suppliers->CP1Address2->cellAttributes() ?>>
<span id="el_store_suppliers_CP1Address2">
<input type="text" data-table="store_suppliers" data-field="x_CP1Address2" name="x_CP1Address2" id="x_CP1Address2" size="30" maxlength="250" placeholder="<?php echo HtmlEncode($store_suppliers->CP1Address2->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->CP1Address2->EditValue ?>"<?php echo $store_suppliers->CP1Address2->editAttributes() ?>>
</span>
<?php echo $store_suppliers->CP1Address2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->CP1Address3->Visible) { // CP1Address3 ?>
	<div id="r_CP1Address3" class="form-group row">
		<label id="elh_store_suppliers_CP1Address3" for="x_CP1Address3" class="<?php echo $store_suppliers_add->LeftColumnClass ?>"><?php echo $store_suppliers->CP1Address3->caption() ?><?php echo ($store_suppliers->CP1Address3->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_suppliers_add->RightColumnClass ?>"><div<?php echo $store_suppliers->CP1Address3->cellAttributes() ?>>
<span id="el_store_suppliers_CP1Address3">
<input type="text" data-table="store_suppliers" data-field="x_CP1Address3" name="x_CP1Address3" id="x_CP1Address3" size="30" maxlength="250" placeholder="<?php echo HtmlEncode($store_suppliers->CP1Address3->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->CP1Address3->EditValue ?>"<?php echo $store_suppliers->CP1Address3->editAttributes() ?>>
</span>
<?php echo $store_suppliers->CP1Address3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->CP1Citycode->Visible) { // CP1Citycode ?>
	<div id="r_CP1Citycode" class="form-group row">
		<label id="elh_store_suppliers_CP1Citycode" for="x_CP1Citycode" class="<?php echo $store_suppliers_add->LeftColumnClass ?>"><?php echo $store_suppliers->CP1Citycode->caption() ?><?php echo ($store_suppliers->CP1Citycode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_suppliers_add->RightColumnClass ?>"><div<?php echo $store_suppliers->CP1Citycode->cellAttributes() ?>>
<span id="el_store_suppliers_CP1Citycode">
<input type="text" data-table="store_suppliers" data-field="x_CP1Citycode" name="x_CP1Citycode" id="x_CP1Citycode" size="30" placeholder="<?php echo HtmlEncode($store_suppliers->CP1Citycode->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->CP1Citycode->EditValue ?>"<?php echo $store_suppliers->CP1Citycode->editAttributes() ?>>
</span>
<?php echo $store_suppliers->CP1Citycode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->CP1State->Visible) { // CP1State ?>
	<div id="r_CP1State" class="form-group row">
		<label id="elh_store_suppliers_CP1State" for="x_CP1State" class="<?php echo $store_suppliers_add->LeftColumnClass ?>"><?php echo $store_suppliers->CP1State->caption() ?><?php echo ($store_suppliers->CP1State->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_suppliers_add->RightColumnClass ?>"><div<?php echo $store_suppliers->CP1State->cellAttributes() ?>>
<span id="el_store_suppliers_CP1State">
<input type="text" data-table="store_suppliers" data-field="x_CP1State" name="x_CP1State" id="x_CP1State" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($store_suppliers->CP1State->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->CP1State->EditValue ?>"<?php echo $store_suppliers->CP1State->editAttributes() ?>>
</span>
<?php echo $store_suppliers->CP1State->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->CP1Pincode->Visible) { // CP1Pincode ?>
	<div id="r_CP1Pincode" class="form-group row">
		<label id="elh_store_suppliers_CP1Pincode" for="x_CP1Pincode" class="<?php echo $store_suppliers_add->LeftColumnClass ?>"><?php echo $store_suppliers->CP1Pincode->caption() ?><?php echo ($store_suppliers->CP1Pincode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_suppliers_add->RightColumnClass ?>"><div<?php echo $store_suppliers->CP1Pincode->cellAttributes() ?>>
<span id="el_store_suppliers_CP1Pincode">
<input type="text" data-table="store_suppliers" data-field="x_CP1Pincode" name="x_CP1Pincode" id="x_CP1Pincode" size="30" maxlength="15" placeholder="<?php echo HtmlEncode($store_suppliers->CP1Pincode->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->CP1Pincode->EditValue ?>"<?php echo $store_suppliers->CP1Pincode->editAttributes() ?>>
</span>
<?php echo $store_suppliers->CP1Pincode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->CP1Designation->Visible) { // CP1Designation ?>
	<div id="r_CP1Designation" class="form-group row">
		<label id="elh_store_suppliers_CP1Designation" for="x_CP1Designation" class="<?php echo $store_suppliers_add->LeftColumnClass ?>"><?php echo $store_suppliers->CP1Designation->caption() ?><?php echo ($store_suppliers->CP1Designation->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_suppliers_add->RightColumnClass ?>"><div<?php echo $store_suppliers->CP1Designation->cellAttributes() ?>>
<span id="el_store_suppliers_CP1Designation">
<input type="text" data-table="store_suppliers" data-field="x_CP1Designation" name="x_CP1Designation" id="x_CP1Designation" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($store_suppliers->CP1Designation->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->CP1Designation->EditValue ?>"<?php echo $store_suppliers->CP1Designation->editAttributes() ?>>
</span>
<?php echo $store_suppliers->CP1Designation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->CP1Phone->Visible) { // CP1Phone ?>
	<div id="r_CP1Phone" class="form-group row">
		<label id="elh_store_suppliers_CP1Phone" for="x_CP1Phone" class="<?php echo $store_suppliers_add->LeftColumnClass ?>"><?php echo $store_suppliers->CP1Phone->caption() ?><?php echo ($store_suppliers->CP1Phone->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_suppliers_add->RightColumnClass ?>"><div<?php echo $store_suppliers->CP1Phone->cellAttributes() ?>>
<span id="el_store_suppliers_CP1Phone">
<input type="text" data-table="store_suppliers" data-field="x_CP1Phone" name="x_CP1Phone" id="x_CP1Phone" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($store_suppliers->CP1Phone->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->CP1Phone->EditValue ?>"<?php echo $store_suppliers->CP1Phone->editAttributes() ?>>
</span>
<?php echo $store_suppliers->CP1Phone->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->CP1MobileNo->Visible) { // CP1MobileNo ?>
	<div id="r_CP1MobileNo" class="form-group row">
		<label id="elh_store_suppliers_CP1MobileNo" for="x_CP1MobileNo" class="<?php echo $store_suppliers_add->LeftColumnClass ?>"><?php echo $store_suppliers->CP1MobileNo->caption() ?><?php echo ($store_suppliers->CP1MobileNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_suppliers_add->RightColumnClass ?>"><div<?php echo $store_suppliers->CP1MobileNo->cellAttributes() ?>>
<span id="el_store_suppliers_CP1MobileNo">
<input type="text" data-table="store_suppliers" data-field="x_CP1MobileNo" name="x_CP1MobileNo" id="x_CP1MobileNo" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($store_suppliers->CP1MobileNo->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->CP1MobileNo->EditValue ?>"<?php echo $store_suppliers->CP1MobileNo->editAttributes() ?>>
</span>
<?php echo $store_suppliers->CP1MobileNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->CP1Fax->Visible) { // CP1Fax ?>
	<div id="r_CP1Fax" class="form-group row">
		<label id="elh_store_suppliers_CP1Fax" for="x_CP1Fax" class="<?php echo $store_suppliers_add->LeftColumnClass ?>"><?php echo $store_suppliers->CP1Fax->caption() ?><?php echo ($store_suppliers->CP1Fax->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_suppliers_add->RightColumnClass ?>"><div<?php echo $store_suppliers->CP1Fax->cellAttributes() ?>>
<span id="el_store_suppliers_CP1Fax">
<input type="text" data-table="store_suppliers" data-field="x_CP1Fax" name="x_CP1Fax" id="x_CP1Fax" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($store_suppliers->CP1Fax->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->CP1Fax->EditValue ?>"<?php echo $store_suppliers->CP1Fax->editAttributes() ?>>
</span>
<?php echo $store_suppliers->CP1Fax->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->CP1Email->Visible) { // CP1Email ?>
	<div id="r_CP1Email" class="form-group row">
		<label id="elh_store_suppliers_CP1Email" for="x_CP1Email" class="<?php echo $store_suppliers_add->LeftColumnClass ?>"><?php echo $store_suppliers->CP1Email->caption() ?><?php echo ($store_suppliers->CP1Email->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_suppliers_add->RightColumnClass ?>"><div<?php echo $store_suppliers->CP1Email->cellAttributes() ?>>
<span id="el_store_suppliers_CP1Email">
<input type="text" data-table="store_suppliers" data-field="x_CP1Email" name="x_CP1Email" id="x_CP1Email" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($store_suppliers->CP1Email->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->CP1Email->EditValue ?>"<?php echo $store_suppliers->CP1Email->editAttributes() ?>>
</span>
<?php echo $store_suppliers->CP1Email->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->Contactperson2->Visible) { // Contactperson2 ?>
	<div id="r_Contactperson2" class="form-group row">
		<label id="elh_store_suppliers_Contactperson2" for="x_Contactperson2" class="<?php echo $store_suppliers_add->LeftColumnClass ?>"><?php echo $store_suppliers->Contactperson2->caption() ?><?php echo ($store_suppliers->Contactperson2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_suppliers_add->RightColumnClass ?>"><div<?php echo $store_suppliers->Contactperson2->cellAttributes() ?>>
<span id="el_store_suppliers_Contactperson2">
<input type="text" data-table="store_suppliers" data-field="x_Contactperson2" name="x_Contactperson2" id="x_Contactperson2" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($store_suppliers->Contactperson2->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->Contactperson2->EditValue ?>"<?php echo $store_suppliers->Contactperson2->editAttributes() ?>>
</span>
<?php echo $store_suppliers->Contactperson2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->CP2Address1->Visible) { // CP2Address1 ?>
	<div id="r_CP2Address1" class="form-group row">
		<label id="elh_store_suppliers_CP2Address1" for="x_CP2Address1" class="<?php echo $store_suppliers_add->LeftColumnClass ?>"><?php echo $store_suppliers->CP2Address1->caption() ?><?php echo ($store_suppliers->CP2Address1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_suppliers_add->RightColumnClass ?>"><div<?php echo $store_suppliers->CP2Address1->cellAttributes() ?>>
<span id="el_store_suppliers_CP2Address1">
<input type="text" data-table="store_suppliers" data-field="x_CP2Address1" name="x_CP2Address1" id="x_CP2Address1" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($store_suppliers->CP2Address1->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->CP2Address1->EditValue ?>"<?php echo $store_suppliers->CP2Address1->editAttributes() ?>>
</span>
<?php echo $store_suppliers->CP2Address1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->CP2Address2->Visible) { // CP2Address2 ?>
	<div id="r_CP2Address2" class="form-group row">
		<label id="elh_store_suppliers_CP2Address2" for="x_CP2Address2" class="<?php echo $store_suppliers_add->LeftColumnClass ?>"><?php echo $store_suppliers->CP2Address2->caption() ?><?php echo ($store_suppliers->CP2Address2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_suppliers_add->RightColumnClass ?>"><div<?php echo $store_suppliers->CP2Address2->cellAttributes() ?>>
<span id="el_store_suppliers_CP2Address2">
<input type="text" data-table="store_suppliers" data-field="x_CP2Address2" name="x_CP2Address2" id="x_CP2Address2" size="30" maxlength="250" placeholder="<?php echo HtmlEncode($store_suppliers->CP2Address2->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->CP2Address2->EditValue ?>"<?php echo $store_suppliers->CP2Address2->editAttributes() ?>>
</span>
<?php echo $store_suppliers->CP2Address2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->CP2Address3->Visible) { // CP2Address3 ?>
	<div id="r_CP2Address3" class="form-group row">
		<label id="elh_store_suppliers_CP2Address3" for="x_CP2Address3" class="<?php echo $store_suppliers_add->LeftColumnClass ?>"><?php echo $store_suppliers->CP2Address3->caption() ?><?php echo ($store_suppliers->CP2Address3->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_suppliers_add->RightColumnClass ?>"><div<?php echo $store_suppliers->CP2Address3->cellAttributes() ?>>
<span id="el_store_suppliers_CP2Address3">
<input type="text" data-table="store_suppliers" data-field="x_CP2Address3" name="x_CP2Address3" id="x_CP2Address3" size="30" maxlength="250" placeholder="<?php echo HtmlEncode($store_suppliers->CP2Address3->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->CP2Address3->EditValue ?>"<?php echo $store_suppliers->CP2Address3->editAttributes() ?>>
</span>
<?php echo $store_suppliers->CP2Address3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->CP2Citycode->Visible) { // CP2Citycode ?>
	<div id="r_CP2Citycode" class="form-group row">
		<label id="elh_store_suppliers_CP2Citycode" for="x_CP2Citycode" class="<?php echo $store_suppliers_add->LeftColumnClass ?>"><?php echo $store_suppliers->CP2Citycode->caption() ?><?php echo ($store_suppliers->CP2Citycode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_suppliers_add->RightColumnClass ?>"><div<?php echo $store_suppliers->CP2Citycode->cellAttributes() ?>>
<span id="el_store_suppliers_CP2Citycode">
<input type="text" data-table="store_suppliers" data-field="x_CP2Citycode" name="x_CP2Citycode" id="x_CP2Citycode" size="30" placeholder="<?php echo HtmlEncode($store_suppliers->CP2Citycode->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->CP2Citycode->EditValue ?>"<?php echo $store_suppliers->CP2Citycode->editAttributes() ?>>
</span>
<?php echo $store_suppliers->CP2Citycode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->CP2State->Visible) { // CP2State ?>
	<div id="r_CP2State" class="form-group row">
		<label id="elh_store_suppliers_CP2State" for="x_CP2State" class="<?php echo $store_suppliers_add->LeftColumnClass ?>"><?php echo $store_suppliers->CP2State->caption() ?><?php echo ($store_suppliers->CP2State->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_suppliers_add->RightColumnClass ?>"><div<?php echo $store_suppliers->CP2State->cellAttributes() ?>>
<span id="el_store_suppliers_CP2State">
<input type="text" data-table="store_suppliers" data-field="x_CP2State" name="x_CP2State" id="x_CP2State" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($store_suppliers->CP2State->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->CP2State->EditValue ?>"<?php echo $store_suppliers->CP2State->editAttributes() ?>>
</span>
<?php echo $store_suppliers->CP2State->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->CP2Pincode->Visible) { // CP2Pincode ?>
	<div id="r_CP2Pincode" class="form-group row">
		<label id="elh_store_suppliers_CP2Pincode" for="x_CP2Pincode" class="<?php echo $store_suppliers_add->LeftColumnClass ?>"><?php echo $store_suppliers->CP2Pincode->caption() ?><?php echo ($store_suppliers->CP2Pincode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_suppliers_add->RightColumnClass ?>"><div<?php echo $store_suppliers->CP2Pincode->cellAttributes() ?>>
<span id="el_store_suppliers_CP2Pincode">
<input type="text" data-table="store_suppliers" data-field="x_CP2Pincode" name="x_CP2Pincode" id="x_CP2Pincode" size="30" maxlength="15" placeholder="<?php echo HtmlEncode($store_suppliers->CP2Pincode->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->CP2Pincode->EditValue ?>"<?php echo $store_suppliers->CP2Pincode->editAttributes() ?>>
</span>
<?php echo $store_suppliers->CP2Pincode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->CP2Designation->Visible) { // CP2Designation ?>
	<div id="r_CP2Designation" class="form-group row">
		<label id="elh_store_suppliers_CP2Designation" for="x_CP2Designation" class="<?php echo $store_suppliers_add->LeftColumnClass ?>"><?php echo $store_suppliers->CP2Designation->caption() ?><?php echo ($store_suppliers->CP2Designation->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_suppliers_add->RightColumnClass ?>"><div<?php echo $store_suppliers->CP2Designation->cellAttributes() ?>>
<span id="el_store_suppliers_CP2Designation">
<input type="text" data-table="store_suppliers" data-field="x_CP2Designation" name="x_CP2Designation" id="x_CP2Designation" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($store_suppliers->CP2Designation->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->CP2Designation->EditValue ?>"<?php echo $store_suppliers->CP2Designation->editAttributes() ?>>
</span>
<?php echo $store_suppliers->CP2Designation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->CP2Phone->Visible) { // CP2Phone ?>
	<div id="r_CP2Phone" class="form-group row">
		<label id="elh_store_suppliers_CP2Phone" for="x_CP2Phone" class="<?php echo $store_suppliers_add->LeftColumnClass ?>"><?php echo $store_suppliers->CP2Phone->caption() ?><?php echo ($store_suppliers->CP2Phone->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_suppliers_add->RightColumnClass ?>"><div<?php echo $store_suppliers->CP2Phone->cellAttributes() ?>>
<span id="el_store_suppliers_CP2Phone">
<input type="text" data-table="store_suppliers" data-field="x_CP2Phone" name="x_CP2Phone" id="x_CP2Phone" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($store_suppliers->CP2Phone->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->CP2Phone->EditValue ?>"<?php echo $store_suppliers->CP2Phone->editAttributes() ?>>
</span>
<?php echo $store_suppliers->CP2Phone->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->CP2MobileNo->Visible) { // CP2MobileNo ?>
	<div id="r_CP2MobileNo" class="form-group row">
		<label id="elh_store_suppliers_CP2MobileNo" for="x_CP2MobileNo" class="<?php echo $store_suppliers_add->LeftColumnClass ?>"><?php echo $store_suppliers->CP2MobileNo->caption() ?><?php echo ($store_suppliers->CP2MobileNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_suppliers_add->RightColumnClass ?>"><div<?php echo $store_suppliers->CP2MobileNo->cellAttributes() ?>>
<span id="el_store_suppliers_CP2MobileNo">
<input type="text" data-table="store_suppliers" data-field="x_CP2MobileNo" name="x_CP2MobileNo" id="x_CP2MobileNo" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($store_suppliers->CP2MobileNo->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->CP2MobileNo->EditValue ?>"<?php echo $store_suppliers->CP2MobileNo->editAttributes() ?>>
</span>
<?php echo $store_suppliers->CP2MobileNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->CP2Fax->Visible) { // CP2Fax ?>
	<div id="r_CP2Fax" class="form-group row">
		<label id="elh_store_suppliers_CP2Fax" for="x_CP2Fax" class="<?php echo $store_suppliers_add->LeftColumnClass ?>"><?php echo $store_suppliers->CP2Fax->caption() ?><?php echo ($store_suppliers->CP2Fax->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_suppliers_add->RightColumnClass ?>"><div<?php echo $store_suppliers->CP2Fax->cellAttributes() ?>>
<span id="el_store_suppliers_CP2Fax">
<input type="text" data-table="store_suppliers" data-field="x_CP2Fax" name="x_CP2Fax" id="x_CP2Fax" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($store_suppliers->CP2Fax->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->CP2Fax->EditValue ?>"<?php echo $store_suppliers->CP2Fax->editAttributes() ?>>
</span>
<?php echo $store_suppliers->CP2Fax->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->CP2Email->Visible) { // CP2Email ?>
	<div id="r_CP2Email" class="form-group row">
		<label id="elh_store_suppliers_CP2Email" for="x_CP2Email" class="<?php echo $store_suppliers_add->LeftColumnClass ?>"><?php echo $store_suppliers->CP2Email->caption() ?><?php echo ($store_suppliers->CP2Email->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_suppliers_add->RightColumnClass ?>"><div<?php echo $store_suppliers->CP2Email->cellAttributes() ?>>
<span id="el_store_suppliers_CP2Email">
<input type="text" data-table="store_suppliers" data-field="x_CP2Email" name="x_CP2Email" id="x_CP2Email" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($store_suppliers->CP2Email->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->CP2Email->EditValue ?>"<?php echo $store_suppliers->CP2Email->editAttributes() ?>>
</span>
<?php echo $store_suppliers->CP2Email->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->Type->Visible) { // Type ?>
	<div id="r_Type" class="form-group row">
		<label id="elh_store_suppliers_Type" for="x_Type" class="<?php echo $store_suppliers_add->LeftColumnClass ?>"><?php echo $store_suppliers->Type->caption() ?><?php echo ($store_suppliers->Type->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_suppliers_add->RightColumnClass ?>"><div<?php echo $store_suppliers->Type->cellAttributes() ?>>
<span id="el_store_suppliers_Type">
<input type="text" data-table="store_suppliers" data-field="x_Type" name="x_Type" id="x_Type" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($store_suppliers->Type->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->Type->EditValue ?>"<?php echo $store_suppliers->Type->editAttributes() ?>>
</span>
<?php echo $store_suppliers->Type->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->Creditterms->Visible) { // Creditterms ?>
	<div id="r_Creditterms" class="form-group row">
		<label id="elh_store_suppliers_Creditterms" for="x_Creditterms" class="<?php echo $store_suppliers_add->LeftColumnClass ?>"><?php echo $store_suppliers->Creditterms->caption() ?><?php echo ($store_suppliers->Creditterms->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_suppliers_add->RightColumnClass ?>"><div<?php echo $store_suppliers->Creditterms->cellAttributes() ?>>
<span id="el_store_suppliers_Creditterms">
<input type="text" data-table="store_suppliers" data-field="x_Creditterms" name="x_Creditterms" id="x_Creditterms" size="30" maxlength="120" placeholder="<?php echo HtmlEncode($store_suppliers->Creditterms->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->Creditterms->EditValue ?>"<?php echo $store_suppliers->Creditterms->editAttributes() ?>>
</span>
<?php echo $store_suppliers->Creditterms->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->Remarks->Visible) { // Remarks ?>
	<div id="r_Remarks" class="form-group row">
		<label id="elh_store_suppliers_Remarks" for="x_Remarks" class="<?php echo $store_suppliers_add->LeftColumnClass ?>"><?php echo $store_suppliers->Remarks->caption() ?><?php echo ($store_suppliers->Remarks->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_suppliers_add->RightColumnClass ?>"><div<?php echo $store_suppliers->Remarks->cellAttributes() ?>>
<span id="el_store_suppliers_Remarks">
<input type="text" data-table="store_suppliers" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" size="30" maxlength="120" placeholder="<?php echo HtmlEncode($store_suppliers->Remarks->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->Remarks->EditValue ?>"<?php echo $store_suppliers->Remarks->editAttributes() ?>>
</span>
<?php echo $store_suppliers->Remarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->Tinnumber->Visible) { // Tinnumber ?>
	<div id="r_Tinnumber" class="form-group row">
		<label id="elh_store_suppliers_Tinnumber" for="x_Tinnumber" class="<?php echo $store_suppliers_add->LeftColumnClass ?>"><?php echo $store_suppliers->Tinnumber->caption() ?><?php echo ($store_suppliers->Tinnumber->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_suppliers_add->RightColumnClass ?>"><div<?php echo $store_suppliers->Tinnumber->cellAttributes() ?>>
<span id="el_store_suppliers_Tinnumber">
<input type="text" data-table="store_suppliers" data-field="x_Tinnumber" name="x_Tinnumber" id="x_Tinnumber" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($store_suppliers->Tinnumber->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->Tinnumber->EditValue ?>"<?php echo $store_suppliers->Tinnumber->editAttributes() ?>>
</span>
<?php echo $store_suppliers->Tinnumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->Universalsuppliercode->Visible) { // Universalsuppliercode ?>
	<div id="r_Universalsuppliercode" class="form-group row">
		<label id="elh_store_suppliers_Universalsuppliercode" for="x_Universalsuppliercode" class="<?php echo $store_suppliers_add->LeftColumnClass ?>"><?php echo $store_suppliers->Universalsuppliercode->caption() ?><?php echo ($store_suppliers->Universalsuppliercode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_suppliers_add->RightColumnClass ?>"><div<?php echo $store_suppliers->Universalsuppliercode->cellAttributes() ?>>
<span id="el_store_suppliers_Universalsuppliercode">
<input type="text" data-table="store_suppliers" data-field="x_Universalsuppliercode" name="x_Universalsuppliercode" id="x_Universalsuppliercode" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($store_suppliers->Universalsuppliercode->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->Universalsuppliercode->EditValue ?>"<?php echo $store_suppliers->Universalsuppliercode->editAttributes() ?>>
</span>
<?php echo $store_suppliers->Universalsuppliercode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->Mobilenumber->Visible) { // Mobilenumber ?>
	<div id="r_Mobilenumber" class="form-group row">
		<label id="elh_store_suppliers_Mobilenumber" for="x_Mobilenumber" class="<?php echo $store_suppliers_add->LeftColumnClass ?>"><?php echo $store_suppliers->Mobilenumber->caption() ?><?php echo ($store_suppliers->Mobilenumber->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_suppliers_add->RightColumnClass ?>"><div<?php echo $store_suppliers->Mobilenumber->cellAttributes() ?>>
<span id="el_store_suppliers_Mobilenumber">
<input type="text" data-table="store_suppliers" data-field="x_Mobilenumber" name="x_Mobilenumber" id="x_Mobilenumber" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($store_suppliers->Mobilenumber->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->Mobilenumber->EditValue ?>"<?php echo $store_suppliers->Mobilenumber->editAttributes() ?>>
</span>
<?php echo $store_suppliers->Mobilenumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->PANNumber->Visible) { // PANNumber ?>
	<div id="r_PANNumber" class="form-group row">
		<label id="elh_store_suppliers_PANNumber" for="x_PANNumber" class="<?php echo $store_suppliers_add->LeftColumnClass ?>"><?php echo $store_suppliers->PANNumber->caption() ?><?php echo ($store_suppliers->PANNumber->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_suppliers_add->RightColumnClass ?>"><div<?php echo $store_suppliers->PANNumber->cellAttributes() ?>>
<span id="el_store_suppliers_PANNumber">
<input type="text" data-table="store_suppliers" data-field="x_PANNumber" name="x_PANNumber" id="x_PANNumber" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($store_suppliers->PANNumber->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->PANNumber->EditValue ?>"<?php echo $store_suppliers->PANNumber->editAttributes() ?>>
</span>
<?php echo $store_suppliers->PANNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->SalesRepMobileNo->Visible) { // SalesRepMobileNo ?>
	<div id="r_SalesRepMobileNo" class="form-group row">
		<label id="elh_store_suppliers_SalesRepMobileNo" for="x_SalesRepMobileNo" class="<?php echo $store_suppliers_add->LeftColumnClass ?>"><?php echo $store_suppliers->SalesRepMobileNo->caption() ?><?php echo ($store_suppliers->SalesRepMobileNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_suppliers_add->RightColumnClass ?>"><div<?php echo $store_suppliers->SalesRepMobileNo->cellAttributes() ?>>
<span id="el_store_suppliers_SalesRepMobileNo">
<input type="text" data-table="store_suppliers" data-field="x_SalesRepMobileNo" name="x_SalesRepMobileNo" id="x_SalesRepMobileNo" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($store_suppliers->SalesRepMobileNo->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->SalesRepMobileNo->EditValue ?>"<?php echo $store_suppliers->SalesRepMobileNo->editAttributes() ?>>
</span>
<?php echo $store_suppliers->SalesRepMobileNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->GSTNumber->Visible) { // GSTNumber ?>
	<div id="r_GSTNumber" class="form-group row">
		<label id="elh_store_suppliers_GSTNumber" for="x_GSTNumber" class="<?php echo $store_suppliers_add->LeftColumnClass ?>"><?php echo $store_suppliers->GSTNumber->caption() ?><?php echo ($store_suppliers->GSTNumber->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_suppliers_add->RightColumnClass ?>"><div<?php echo $store_suppliers->GSTNumber->cellAttributes() ?>>
<span id="el_store_suppliers_GSTNumber">
<input type="text" data-table="store_suppliers" data-field="x_GSTNumber" name="x_GSTNumber" id="x_GSTNumber" size="30" maxlength="15" placeholder="<?php echo HtmlEncode($store_suppliers->GSTNumber->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->GSTNumber->EditValue ?>"<?php echo $store_suppliers->GSTNumber->editAttributes() ?>>
</span>
<?php echo $store_suppliers->GSTNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->TANNumber->Visible) { // TANNumber ?>
	<div id="r_TANNumber" class="form-group row">
		<label id="elh_store_suppliers_TANNumber" for="x_TANNumber" class="<?php echo $store_suppliers_add->LeftColumnClass ?>"><?php echo $store_suppliers->TANNumber->caption() ?><?php echo ($store_suppliers->TANNumber->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_suppliers_add->RightColumnClass ?>"><div<?php echo $store_suppliers->TANNumber->cellAttributes() ?>>
<span id="el_store_suppliers_TANNumber">
<input type="text" data-table="store_suppliers" data-field="x_TANNumber" name="x_TANNumber" id="x_TANNumber" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($store_suppliers->TANNumber->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->TANNumber->EditValue ?>"<?php echo $store_suppliers->TANNumber->editAttributes() ?>>
</span>
<?php echo $store_suppliers->TANNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->HospID->Visible) { // HospID ?>
	<div id="r_HospID" class="form-group row">
		<label id="elh_store_suppliers_HospID" for="x_HospID" class="<?php echo $store_suppliers_add->LeftColumnClass ?>"><?php echo $store_suppliers->HospID->caption() ?><?php echo ($store_suppliers->HospID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_suppliers_add->RightColumnClass ?>"><div<?php echo $store_suppliers->HospID->cellAttributes() ?>>
<span id="el_store_suppliers_HospID">
<input type="text" data-table="store_suppliers" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?php echo HtmlEncode($store_suppliers->HospID->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->HospID->EditValue ?>"<?php echo $store_suppliers->HospID->editAttributes() ?>>
</span>
<?php echo $store_suppliers->HospID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->BranchID->Visible) { // BranchID ?>
	<div id="r_BranchID" class="form-group row">
		<label id="elh_store_suppliers_BranchID" for="x_BranchID" class="<?php echo $store_suppliers_add->LeftColumnClass ?>"><?php echo $store_suppliers->BranchID->caption() ?><?php echo ($store_suppliers->BranchID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_suppliers_add->RightColumnClass ?>"><div<?php echo $store_suppliers->BranchID->cellAttributes() ?>>
<span id="el_store_suppliers_BranchID">
<input type="text" data-table="store_suppliers" data-field="x_BranchID" name="x_BranchID" id="x_BranchID" size="30" placeholder="<?php echo HtmlEncode($store_suppliers->BranchID->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->BranchID->EditValue ?>"<?php echo $store_suppliers->BranchID->editAttributes() ?>>
</span>
<?php echo $store_suppliers->BranchID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($store_suppliers->StoreID->Visible) { // StoreID ?>
	<div id="r_StoreID" class="form-group row">
		<label id="elh_store_suppliers_StoreID" for="x_StoreID" class="<?php echo $store_suppliers_add->LeftColumnClass ?>"><?php echo $store_suppliers->StoreID->caption() ?><?php echo ($store_suppliers->StoreID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $store_suppliers_add->RightColumnClass ?>"><div<?php echo $store_suppliers->StoreID->cellAttributes() ?>>
<span id="el_store_suppliers_StoreID">
<input type="text" data-table="store_suppliers" data-field="x_StoreID" name="x_StoreID" id="x_StoreID" size="30" placeholder="<?php echo HtmlEncode($store_suppliers->StoreID->getPlaceHolder()) ?>" value="<?php echo $store_suppliers->StoreID->EditValue ?>"<?php echo $store_suppliers->StoreID->editAttributes() ?>>
</span>
<?php echo $store_suppliers->StoreID->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$store_suppliers_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $store_suppliers_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $store_suppliers_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$store_suppliers_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$store_suppliers_add->terminate();
?>