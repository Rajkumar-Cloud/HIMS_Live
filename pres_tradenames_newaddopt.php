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
$pres_tradenames_new_addopt = new pres_tradenames_new_addopt();

// Run the page
$pres_tradenames_new_addopt->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_tradenames_new_addopt->Page_Render();
?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "addopt";
var fpres_tradenames_newaddopt = currentForm = new ew.Form("fpres_tradenames_newaddopt", "addopt");

// Validate form
fpres_tradenames_newaddopt.validate = function() {
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
		<?php if ($pres_tradenames_new_addopt->Drug_Name->Required) { ?>
			elm = this.getElements("x" + infix + "_Drug_Name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_tradenames_new->Drug_Name->caption(), $pres_tradenames_new->Drug_Name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_tradenames_new_addopt->Generic_Name->Required) { ?>
			elm = this.getElements("x" + infix + "_Generic_Name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_tradenames_new->Generic_Name->caption(), $pres_tradenames_new->Generic_Name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_tradenames_new_addopt->Trade_Name->Required) { ?>
			elm = this.getElements("x" + infix + "_Trade_Name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_tradenames_new->Trade_Name->caption(), $pres_tradenames_new->Trade_Name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_tradenames_new_addopt->PR_CODE->Required) { ?>
			elm = this.getElements("x" + infix + "_PR_CODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_tradenames_new->PR_CODE->caption(), $pres_tradenames_new->PR_CODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_tradenames_new_addopt->Form->Required) { ?>
			elm = this.getElements("x" + infix + "_Form");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_tradenames_new->Form->caption(), $pres_tradenames_new->Form->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_tradenames_new_addopt->Strength->Required) { ?>
			elm = this.getElements("x" + infix + "_Strength");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_tradenames_new->Strength->caption(), $pres_tradenames_new->Strength->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_tradenames_new_addopt->Unit->Required) { ?>
			elm = this.getElements("x" + infix + "_Unit");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_tradenames_new->Unit->caption(), $pres_tradenames_new->Unit->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_tradenames_new_addopt->CONTAINER_TYPE->Required) { ?>
			elm = this.getElements("x" + infix + "_CONTAINER_TYPE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_tradenames_new->CONTAINER_TYPE->caption(), $pres_tradenames_new->CONTAINER_TYPE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_tradenames_new_addopt->CONTAINER_STRENGTH->Required) { ?>
			elm = this.getElements("x" + infix + "_CONTAINER_STRENGTH");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_tradenames_new->CONTAINER_STRENGTH->caption(), $pres_tradenames_new->CONTAINER_STRENGTH->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_tradenames_new_addopt->TypeOfDrug->Required) { ?>
			elm = this.getElements("x" + infix + "_TypeOfDrug");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_tradenames_new->TypeOfDrug->caption(), $pres_tradenames_new->TypeOfDrug->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_tradenames_new_addopt->ProductType->Required) { ?>
			elm = this.getElements("x" + infix + "_ProductType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_tradenames_new->ProductType->caption(), $pres_tradenames_new->ProductType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_tradenames_new_addopt->Generic_Name1->Required) { ?>
			elm = this.getElements("x" + infix + "_Generic_Name1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_tradenames_new->Generic_Name1->caption(), $pres_tradenames_new->Generic_Name1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_tradenames_new_addopt->Strength1->Required) { ?>
			elm = this.getElements("x" + infix + "_Strength1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_tradenames_new->Strength1->caption(), $pres_tradenames_new->Strength1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_tradenames_new_addopt->Unit1->Required) { ?>
			elm = this.getElements("x" + infix + "_Unit1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_tradenames_new->Unit1->caption(), $pres_tradenames_new->Unit1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_tradenames_new_addopt->Generic_Name2->Required) { ?>
			elm = this.getElements("x" + infix + "_Generic_Name2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_tradenames_new->Generic_Name2->caption(), $pres_tradenames_new->Generic_Name2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_tradenames_new_addopt->Strength2->Required) { ?>
			elm = this.getElements("x" + infix + "_Strength2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_tradenames_new->Strength2->caption(), $pres_tradenames_new->Strength2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_tradenames_new_addopt->Unit2->Required) { ?>
			elm = this.getElements("x" + infix + "_Unit2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_tradenames_new->Unit2->caption(), $pres_tradenames_new->Unit2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_tradenames_new_addopt->Generic_Name3->Required) { ?>
			elm = this.getElements("x" + infix + "_Generic_Name3");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_tradenames_new->Generic_Name3->caption(), $pres_tradenames_new->Generic_Name3->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_tradenames_new_addopt->Strength3->Required) { ?>
			elm = this.getElements("x" + infix + "_Strength3");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_tradenames_new->Strength3->caption(), $pres_tradenames_new->Strength3->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_tradenames_new_addopt->Unit3->Required) { ?>
			elm = this.getElements("x" + infix + "_Unit3");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_tradenames_new->Unit3->caption(), $pres_tradenames_new->Unit3->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_tradenames_new_addopt->Generic_Name4->Required) { ?>
			elm = this.getElements("x" + infix + "_Generic_Name4");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_tradenames_new->Generic_Name4->caption(), $pres_tradenames_new->Generic_Name4->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_tradenames_new_addopt->Generic_Name5->Required) { ?>
			elm = this.getElements("x" + infix + "_Generic_Name5");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_tradenames_new->Generic_Name5->caption(), $pres_tradenames_new->Generic_Name5->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_tradenames_new_addopt->Strength4->Required) { ?>
			elm = this.getElements("x" + infix + "_Strength4");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_tradenames_new->Strength4->caption(), $pres_tradenames_new->Strength4->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_tradenames_new_addopt->Strength5->Required) { ?>
			elm = this.getElements("x" + infix + "_Strength5");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_tradenames_new->Strength5->caption(), $pres_tradenames_new->Strength5->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_tradenames_new_addopt->Unit4->Required) { ?>
			elm = this.getElements("x" + infix + "_Unit4");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_tradenames_new->Unit4->caption(), $pres_tradenames_new->Unit4->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_tradenames_new_addopt->Unit5->Required) { ?>
			elm = this.getElements("x" + infix + "_Unit5");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_tradenames_new->Unit5->caption(), $pres_tradenames_new->Unit5->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_tradenames_new_addopt->AlterNative1->Required) { ?>
			elm = this.getElements("x" + infix + "_AlterNative1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_tradenames_new->AlterNative1->caption(), $pres_tradenames_new->AlterNative1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_tradenames_new_addopt->AlterNative2->Required) { ?>
			elm = this.getElements("x" + infix + "_AlterNative2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_tradenames_new->AlterNative2->caption(), $pres_tradenames_new->AlterNative2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_tradenames_new_addopt->AlterNative3->Required) { ?>
			elm = this.getElements("x" + infix + "_AlterNative3");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_tradenames_new->AlterNative3->caption(), $pres_tradenames_new->AlterNative3->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_tradenames_new_addopt->AlterNative4->Required) { ?>
			elm = this.getElements("x" + infix + "_AlterNative4");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_tradenames_new->AlterNative4->caption(), $pres_tradenames_new->AlterNative4->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
	}
	return true;
}

// Form_CustomValidate event
fpres_tradenames_newaddopt.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpres_tradenames_newaddopt.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpres_tradenames_newaddopt.lists["x_Generic_Name"] = <?php echo $pres_tradenames_new_addopt->Generic_Name->Lookup->toClientList() ?>;
fpres_tradenames_newaddopt.lists["x_Generic_Name"].options = <?php echo JsonEncode($pres_tradenames_new_addopt->Generic_Name->lookupOptions()) ?>;
fpres_tradenames_newaddopt.lists["x_Form"] = <?php echo $pres_tradenames_new_addopt->Form->Lookup->toClientList() ?>;
fpres_tradenames_newaddopt.lists["x_Form"].options = <?php echo JsonEncode($pres_tradenames_new_addopt->Form->lookupOptions()) ?>;
fpres_tradenames_newaddopt.lists["x_Unit"] = <?php echo $pres_tradenames_new_addopt->Unit->Lookup->toClientList() ?>;
fpres_tradenames_newaddopt.lists["x_Unit"].options = <?php echo JsonEncode($pres_tradenames_new_addopt->Unit->lookupOptions()) ?>;
fpres_tradenames_newaddopt.lists["x_TypeOfDrug"] = <?php echo $pres_tradenames_new_addopt->TypeOfDrug->Lookup->toClientList() ?>;
fpres_tradenames_newaddopt.lists["x_TypeOfDrug"].options = <?php echo JsonEncode($pres_tradenames_new_addopt->TypeOfDrug->options(FALSE, TRUE)) ?>;
fpres_tradenames_newaddopt.lists["x_ProductType"] = <?php echo $pres_tradenames_new_addopt->ProductType->Lookup->toClientList() ?>;
fpres_tradenames_newaddopt.lists["x_ProductType"].options = <?php echo JsonEncode($pres_tradenames_new_addopt->ProductType->options(FALSE, TRUE)) ?>;
fpres_tradenames_newaddopt.lists["x_Generic_Name1"] = <?php echo $pres_tradenames_new_addopt->Generic_Name1->Lookup->toClientList() ?>;
fpres_tradenames_newaddopt.lists["x_Generic_Name1"].options = <?php echo JsonEncode($pres_tradenames_new_addopt->Generic_Name1->lookupOptions()) ?>;
fpres_tradenames_newaddopt.lists["x_Unit1"] = <?php echo $pres_tradenames_new_addopt->Unit1->Lookup->toClientList() ?>;
fpres_tradenames_newaddopt.lists["x_Unit1"].options = <?php echo JsonEncode($pres_tradenames_new_addopt->Unit1->lookupOptions()) ?>;
fpres_tradenames_newaddopt.lists["x_Generic_Name2"] = <?php echo $pres_tradenames_new_addopt->Generic_Name2->Lookup->toClientList() ?>;
fpres_tradenames_newaddopt.lists["x_Generic_Name2"].options = <?php echo JsonEncode($pres_tradenames_new_addopt->Generic_Name2->lookupOptions()) ?>;
fpres_tradenames_newaddopt.lists["x_Unit2"] = <?php echo $pres_tradenames_new_addopt->Unit2->Lookup->toClientList() ?>;
fpres_tradenames_newaddopt.lists["x_Unit2"].options = <?php echo JsonEncode($pres_tradenames_new_addopt->Unit2->lookupOptions()) ?>;
fpres_tradenames_newaddopt.lists["x_Generic_Name3"] = <?php echo $pres_tradenames_new_addopt->Generic_Name3->Lookup->toClientList() ?>;
fpres_tradenames_newaddopt.lists["x_Generic_Name3"].options = <?php echo JsonEncode($pres_tradenames_new_addopt->Generic_Name3->lookupOptions()) ?>;
fpres_tradenames_newaddopt.lists["x_Unit3"] = <?php echo $pres_tradenames_new_addopt->Unit3->Lookup->toClientList() ?>;
fpres_tradenames_newaddopt.lists["x_Unit3"].options = <?php echo JsonEncode($pres_tradenames_new_addopt->Unit3->lookupOptions()) ?>;
fpres_tradenames_newaddopt.lists["x_Generic_Name4"] = <?php echo $pres_tradenames_new_addopt->Generic_Name4->Lookup->toClientList() ?>;
fpres_tradenames_newaddopt.lists["x_Generic_Name4"].options = <?php echo JsonEncode($pres_tradenames_new_addopt->Generic_Name4->lookupOptions()) ?>;
fpres_tradenames_newaddopt.lists["x_Generic_Name5"] = <?php echo $pres_tradenames_new_addopt->Generic_Name5->Lookup->toClientList() ?>;
fpres_tradenames_newaddopt.lists["x_Generic_Name5"].options = <?php echo JsonEncode($pres_tradenames_new_addopt->Generic_Name5->lookupOptions()) ?>;
fpres_tradenames_newaddopt.lists["x_Unit4"] = <?php echo $pres_tradenames_new_addopt->Unit4->Lookup->toClientList() ?>;
fpres_tradenames_newaddopt.lists["x_Unit4"].options = <?php echo JsonEncode($pres_tradenames_new_addopt->Unit4->lookupOptions()) ?>;
fpres_tradenames_newaddopt.lists["x_Unit5"] = <?php echo $pres_tradenames_new_addopt->Unit5->Lookup->toClientList() ?>;
fpres_tradenames_newaddopt.lists["x_Unit5"].options = <?php echo JsonEncode($pres_tradenames_new_addopt->Unit5->lookupOptions()) ?>;
fpres_tradenames_newaddopt.lists["x_AlterNative1"] = <?php echo $pres_tradenames_new_addopt->AlterNative1->Lookup->toClientList() ?>;
fpres_tradenames_newaddopt.lists["x_AlterNative1"].options = <?php echo JsonEncode($pres_tradenames_new_addopt->AlterNative1->lookupOptions()) ?>;
fpres_tradenames_newaddopt.lists["x_AlterNative2"] = <?php echo $pres_tradenames_new_addopt->AlterNative2->Lookup->toClientList() ?>;
fpres_tradenames_newaddopt.lists["x_AlterNative2"].options = <?php echo JsonEncode($pres_tradenames_new_addopt->AlterNative2->lookupOptions()) ?>;
fpres_tradenames_newaddopt.lists["x_AlterNative3"] = <?php echo $pres_tradenames_new_addopt->AlterNative3->Lookup->toClientList() ?>;
fpres_tradenames_newaddopt.lists["x_AlterNative3"].options = <?php echo JsonEncode($pres_tradenames_new_addopt->AlterNative3->lookupOptions()) ?>;
fpres_tradenames_newaddopt.lists["x_AlterNative4"] = <?php echo $pres_tradenames_new_addopt->AlterNative4->Lookup->toClientList() ?>;
fpres_tradenames_newaddopt.lists["x_AlterNative4"].options = <?php echo JsonEncode($pres_tradenames_new_addopt->AlterNative4->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $pres_tradenames_new_addopt->showPageHeader(); ?>
<?php
$pres_tradenames_new_addopt->showMessage();
?>
<form name="fpres_tradenames_newaddopt" id="fpres_tradenames_newaddopt" class="ew-form ew-horizontal" action="<?php echo API_URL ?>" method="post">
<?php //if ($pres_tradenames_new_addopt->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pres_tradenames_new_addopt->Token ?>">
<?php //} ?>
<input type="hidden" name="<?php echo API_ACTION_NAME ?>" id="<?php echo API_ACTION_NAME ?>" value="<?php echo API_ADD_ACTION ?>">
<input type="hidden" name="<?php echo API_OBJECT_NAME ?>" id="<?php echo API_OBJECT_NAME ?>" value="<?php echo $pres_tradenames_new_addopt->TableVar ?>">
<?php if ($pres_tradenames_new->Drug_Name->Visible) { // Drug_Name ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Drug_Name"><?php echo $pres_tradenames_new->Drug_Name->caption() ?><?php echo ($pres_tradenames_new->Drug_Name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pres_tradenames_new" data-field="x_Drug_Name" name="x_Drug_Name" id="x_Drug_Name" placeholder="<?php echo HtmlEncode($pres_tradenames_new->Drug_Name->getPlaceHolder()) ?>" value="<?php echo $pres_tradenames_new->Drug_Name->EditValue ?>"<?php echo $pres_tradenames_new->Drug_Name->editAttributes() ?>>
<?php echo $pres_tradenames_new->Drug_Name->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pres_tradenames_new->Generic_Name->Visible) { // Generic_Name ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Generic_Name"><?php echo $pres_tradenames_new->Generic_Name->caption() ?><?php echo ($pres_tradenames_new->Generic_Name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Generic_Name"><?php echo strval($pres_tradenames_new->Generic_Name->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pres_tradenames_new->Generic_Name->ViewValue) : $pres_tradenames_new->Generic_Name->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pres_tradenames_new->Generic_Name->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pres_tradenames_new->Generic_Name->ReadOnly || $pres_tradenames_new->Generic_Name->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_Generic_Name',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pres_tradenames_new->Generic_Name->Lookup->getParamTag("p_x_Generic_Name") ?>
<input type="hidden" data-table="pres_tradenames_new" data-field="x_Generic_Name" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pres_tradenames_new->Generic_Name->displayValueSeparatorAttribute() ?>" name="x_Generic_Name" id="x_Generic_Name" value="<?php echo $pres_tradenames_new->Generic_Name->CurrentValue ?>"<?php echo $pres_tradenames_new->Generic_Name->editAttributes() ?>>
<?php echo $pres_tradenames_new->Generic_Name->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pres_tradenames_new->Trade_Name->Visible) { // Trade_Name ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Trade_Name"><?php echo $pres_tradenames_new->Trade_Name->caption() ?><?php echo ($pres_tradenames_new->Trade_Name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pres_tradenames_new" data-field="x_Trade_Name" name="x_Trade_Name" id="x_Trade_Name" placeholder="<?php echo HtmlEncode($pres_tradenames_new->Trade_Name->getPlaceHolder()) ?>" value="<?php echo $pres_tradenames_new->Trade_Name->EditValue ?>"<?php echo $pres_tradenames_new->Trade_Name->editAttributes() ?>>
<?php echo $pres_tradenames_new->Trade_Name->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pres_tradenames_new->PR_CODE->Visible) { // PR_CODE ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_PR_CODE"><?php echo $pres_tradenames_new->PR_CODE->caption() ?><?php echo ($pres_tradenames_new->PR_CODE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pres_tradenames_new" data-field="x_PR_CODE" name="x_PR_CODE" id="x_PR_CODE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_tradenames_new->PR_CODE->getPlaceHolder()) ?>" value="<?php echo $pres_tradenames_new->PR_CODE->EditValue ?>"<?php echo $pres_tradenames_new->PR_CODE->editAttributes() ?>>
<?php echo $pres_tradenames_new->PR_CODE->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pres_tradenames_new->Form->Visible) { // Form ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Form"><?php echo $pres_tradenames_new->Form->caption() ?><?php echo ($pres_tradenames_new->Form->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pres_tradenames_new" data-field="x_Form" data-value-separator="<?php echo $pres_tradenames_new->Form->displayValueSeparatorAttribute() ?>" id="x_Form" name="x_Form"<?php echo $pres_tradenames_new->Form->editAttributes() ?>>
		<?php echo $pres_tradenames_new->Form->selectOptionListHtml("x_Form") ?>
	</select>
</div>
<?php echo $pres_tradenames_new->Form->Lookup->getParamTag("p_x_Form") ?>
<?php echo $pres_tradenames_new->Form->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pres_tradenames_new->Strength->Visible) { // Strength ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Strength"><?php echo $pres_tradenames_new->Strength->caption() ?><?php echo ($pres_tradenames_new->Strength->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pres_tradenames_new" data-field="x_Strength" name="x_Strength" id="x_Strength" placeholder="<?php echo HtmlEncode($pres_tradenames_new->Strength->getPlaceHolder()) ?>" value="<?php echo $pres_tradenames_new->Strength->EditValue ?>"<?php echo $pres_tradenames_new->Strength->editAttributes() ?>>
<?php echo $pres_tradenames_new->Strength->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pres_tradenames_new->Unit->Visible) { // Unit ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Unit"><?php echo $pres_tradenames_new->Unit->caption() ?><?php echo ($pres_tradenames_new->Unit->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pres_tradenames_new" data-field="x_Unit" data-value-separator="<?php echo $pres_tradenames_new->Unit->displayValueSeparatorAttribute() ?>" id="x_Unit" name="x_Unit"<?php echo $pres_tradenames_new->Unit->editAttributes() ?>>
		<?php echo $pres_tradenames_new->Unit->selectOptionListHtml("x_Unit") ?>
	</select>
</div>
<?php echo $pres_tradenames_new->Unit->Lookup->getParamTag("p_x_Unit") ?>
<?php echo $pres_tradenames_new->Unit->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pres_tradenames_new->CONTAINER_TYPE->Visible) { // CONTAINER_TYPE ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_CONTAINER_TYPE"><?php echo $pres_tradenames_new->CONTAINER_TYPE->caption() ?><?php echo ($pres_tradenames_new->CONTAINER_TYPE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pres_tradenames_new" data-field="x_CONTAINER_TYPE" name="x_CONTAINER_TYPE" id="x_CONTAINER_TYPE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_tradenames_new->CONTAINER_TYPE->getPlaceHolder()) ?>" value="<?php echo $pres_tradenames_new->CONTAINER_TYPE->EditValue ?>"<?php echo $pres_tradenames_new->CONTAINER_TYPE->editAttributes() ?>>
<?php echo $pres_tradenames_new->CONTAINER_TYPE->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pres_tradenames_new->CONTAINER_STRENGTH->Visible) { // CONTAINER_STRENGTH ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_CONTAINER_STRENGTH"><?php echo $pres_tradenames_new->CONTAINER_STRENGTH->caption() ?><?php echo ($pres_tradenames_new->CONTAINER_STRENGTH->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pres_tradenames_new" data-field="x_CONTAINER_STRENGTH" name="x_CONTAINER_STRENGTH" id="x_CONTAINER_STRENGTH" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_tradenames_new->CONTAINER_STRENGTH->getPlaceHolder()) ?>" value="<?php echo $pres_tradenames_new->CONTAINER_STRENGTH->EditValue ?>"<?php echo $pres_tradenames_new->CONTAINER_STRENGTH->editAttributes() ?>>
<?php echo $pres_tradenames_new->CONTAINER_STRENGTH->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pres_tradenames_new->TypeOfDrug->Visible) { // TypeOfDrug ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_TypeOfDrug"><?php echo $pres_tradenames_new->TypeOfDrug->caption() ?><?php echo ($pres_tradenames_new->TypeOfDrug->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pres_tradenames_new" data-field="x_TypeOfDrug" data-value-separator="<?php echo $pres_tradenames_new->TypeOfDrug->displayValueSeparatorAttribute() ?>" id="x_TypeOfDrug" name="x_TypeOfDrug"<?php echo $pres_tradenames_new->TypeOfDrug->editAttributes() ?>>
		<?php echo $pres_tradenames_new->TypeOfDrug->selectOptionListHtml("x_TypeOfDrug") ?>
	</select>
</div>
<?php echo $pres_tradenames_new->TypeOfDrug->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pres_tradenames_new->ProductType->Visible) { // ProductType ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_ProductType"><?php echo $pres_tradenames_new->ProductType->caption() ?><?php echo ($pres_tradenames_new->ProductType->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pres_tradenames_new" data-field="x_ProductType" data-value-separator="<?php echo $pres_tradenames_new->ProductType->displayValueSeparatorAttribute() ?>" id="x_ProductType" name="x_ProductType"<?php echo $pres_tradenames_new->ProductType->editAttributes() ?>>
		<?php echo $pres_tradenames_new->ProductType->selectOptionListHtml("x_ProductType") ?>
	</select>
</div>
<?php echo $pres_tradenames_new->ProductType->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pres_tradenames_new->Generic_Name1->Visible) { // Generic_Name1 ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Generic_Name1"><?php echo $pres_tradenames_new->Generic_Name1->caption() ?><?php echo ($pres_tradenames_new->Generic_Name1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Generic_Name1"><?php echo strval($pres_tradenames_new->Generic_Name1->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pres_tradenames_new->Generic_Name1->ViewValue) : $pres_tradenames_new->Generic_Name1->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pres_tradenames_new->Generic_Name1->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pres_tradenames_new->Generic_Name1->ReadOnly || $pres_tradenames_new->Generic_Name1->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_Generic_Name1',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pres_tradenames_new->Generic_Name1->Lookup->getParamTag("p_x_Generic_Name1") ?>
<input type="hidden" data-table="pres_tradenames_new" data-field="x_Generic_Name1" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pres_tradenames_new->Generic_Name1->displayValueSeparatorAttribute() ?>" name="x_Generic_Name1" id="x_Generic_Name1" value="<?php echo $pres_tradenames_new->Generic_Name1->CurrentValue ?>"<?php echo $pres_tradenames_new->Generic_Name1->editAttributes() ?>>
<?php echo $pres_tradenames_new->Generic_Name1->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pres_tradenames_new->Strength1->Visible) { // Strength1 ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Strength1"><?php echo $pres_tradenames_new->Strength1->caption() ?><?php echo ($pres_tradenames_new->Strength1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pres_tradenames_new" data-field="x_Strength1" name="x_Strength1" id="x_Strength1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pres_tradenames_new->Strength1->getPlaceHolder()) ?>" value="<?php echo $pres_tradenames_new->Strength1->EditValue ?>"<?php echo $pres_tradenames_new->Strength1->editAttributes() ?>>
<?php echo $pres_tradenames_new->Strength1->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pres_tradenames_new->Unit1->Visible) { // Unit1 ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Unit1"><?php echo $pres_tradenames_new->Unit1->caption() ?><?php echo ($pres_tradenames_new->Unit1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pres_tradenames_new" data-field="x_Unit1" data-value-separator="<?php echo $pres_tradenames_new->Unit1->displayValueSeparatorAttribute() ?>" id="x_Unit1" name="x_Unit1"<?php echo $pres_tradenames_new->Unit1->editAttributes() ?>>
		<?php echo $pres_tradenames_new->Unit1->selectOptionListHtml("x_Unit1") ?>
	</select>
</div>
<?php echo $pres_tradenames_new->Unit1->Lookup->getParamTag("p_x_Unit1") ?>
<?php echo $pres_tradenames_new->Unit1->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pres_tradenames_new->Generic_Name2->Visible) { // Generic_Name2 ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Generic_Name2"><?php echo $pres_tradenames_new->Generic_Name2->caption() ?><?php echo ($pres_tradenames_new->Generic_Name2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Generic_Name2"><?php echo strval($pres_tradenames_new->Generic_Name2->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pres_tradenames_new->Generic_Name2->ViewValue) : $pres_tradenames_new->Generic_Name2->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pres_tradenames_new->Generic_Name2->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pres_tradenames_new->Generic_Name2->ReadOnly || $pres_tradenames_new->Generic_Name2->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_Generic_Name2',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pres_tradenames_new->Generic_Name2->Lookup->getParamTag("p_x_Generic_Name2") ?>
<input type="hidden" data-table="pres_tradenames_new" data-field="x_Generic_Name2" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pres_tradenames_new->Generic_Name2->displayValueSeparatorAttribute() ?>" name="x_Generic_Name2" id="x_Generic_Name2" value="<?php echo $pres_tradenames_new->Generic_Name2->CurrentValue ?>"<?php echo $pres_tradenames_new->Generic_Name2->editAttributes() ?>>
<?php echo $pres_tradenames_new->Generic_Name2->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pres_tradenames_new->Strength2->Visible) { // Strength2 ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Strength2"><?php echo $pres_tradenames_new->Strength2->caption() ?><?php echo ($pres_tradenames_new->Strength2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pres_tradenames_new" data-field="x_Strength2" name="x_Strength2" id="x_Strength2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pres_tradenames_new->Strength2->getPlaceHolder()) ?>" value="<?php echo $pres_tradenames_new->Strength2->EditValue ?>"<?php echo $pres_tradenames_new->Strength2->editAttributes() ?>>
<?php echo $pres_tradenames_new->Strength2->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pres_tradenames_new->Unit2->Visible) { // Unit2 ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Unit2"><?php echo $pres_tradenames_new->Unit2->caption() ?><?php echo ($pres_tradenames_new->Unit2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pres_tradenames_new" data-field="x_Unit2" data-value-separator="<?php echo $pres_tradenames_new->Unit2->displayValueSeparatorAttribute() ?>" id="x_Unit2" name="x_Unit2"<?php echo $pres_tradenames_new->Unit2->editAttributes() ?>>
		<?php echo $pres_tradenames_new->Unit2->selectOptionListHtml("x_Unit2") ?>
	</select>
</div>
<?php echo $pres_tradenames_new->Unit2->Lookup->getParamTag("p_x_Unit2") ?>
<?php echo $pres_tradenames_new->Unit2->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pres_tradenames_new->Generic_Name3->Visible) { // Generic_Name3 ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Generic_Name3"><?php echo $pres_tradenames_new->Generic_Name3->caption() ?><?php echo ($pres_tradenames_new->Generic_Name3->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Generic_Name3"><?php echo strval($pres_tradenames_new->Generic_Name3->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pres_tradenames_new->Generic_Name3->ViewValue) : $pres_tradenames_new->Generic_Name3->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pres_tradenames_new->Generic_Name3->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pres_tradenames_new->Generic_Name3->ReadOnly || $pres_tradenames_new->Generic_Name3->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_Generic_Name3',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pres_tradenames_new->Generic_Name3->Lookup->getParamTag("p_x_Generic_Name3") ?>
<input type="hidden" data-table="pres_tradenames_new" data-field="x_Generic_Name3" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pres_tradenames_new->Generic_Name3->displayValueSeparatorAttribute() ?>" name="x_Generic_Name3" id="x_Generic_Name3" value="<?php echo $pres_tradenames_new->Generic_Name3->CurrentValue ?>"<?php echo $pres_tradenames_new->Generic_Name3->editAttributes() ?>>
<?php echo $pres_tradenames_new->Generic_Name3->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pres_tradenames_new->Strength3->Visible) { // Strength3 ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Strength3"><?php echo $pres_tradenames_new->Strength3->caption() ?><?php echo ($pres_tradenames_new->Strength3->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pres_tradenames_new" data-field="x_Strength3" name="x_Strength3" id="x_Strength3" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pres_tradenames_new->Strength3->getPlaceHolder()) ?>" value="<?php echo $pres_tradenames_new->Strength3->EditValue ?>"<?php echo $pres_tradenames_new->Strength3->editAttributes() ?>>
<?php echo $pres_tradenames_new->Strength3->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pres_tradenames_new->Unit3->Visible) { // Unit3 ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Unit3"><?php echo $pres_tradenames_new->Unit3->caption() ?><?php echo ($pres_tradenames_new->Unit3->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pres_tradenames_new" data-field="x_Unit3" data-value-separator="<?php echo $pres_tradenames_new->Unit3->displayValueSeparatorAttribute() ?>" id="x_Unit3" name="x_Unit3"<?php echo $pres_tradenames_new->Unit3->editAttributes() ?>>
		<?php echo $pres_tradenames_new->Unit3->selectOptionListHtml("x_Unit3") ?>
	</select>
</div>
<?php echo $pres_tradenames_new->Unit3->Lookup->getParamTag("p_x_Unit3") ?>
<?php echo $pres_tradenames_new->Unit3->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pres_tradenames_new->Generic_Name4->Visible) { // Generic_Name4 ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Generic_Name4"><?php echo $pres_tradenames_new->Generic_Name4->caption() ?><?php echo ($pres_tradenames_new->Generic_Name4->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Generic_Name4"><?php echo strval($pres_tradenames_new->Generic_Name4->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pres_tradenames_new->Generic_Name4->ViewValue) : $pres_tradenames_new->Generic_Name4->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pres_tradenames_new->Generic_Name4->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pres_tradenames_new->Generic_Name4->ReadOnly || $pres_tradenames_new->Generic_Name4->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_Generic_Name4',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pres_tradenames_new->Generic_Name4->Lookup->getParamTag("p_x_Generic_Name4") ?>
<input type="hidden" data-table="pres_tradenames_new" data-field="x_Generic_Name4" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pres_tradenames_new->Generic_Name4->displayValueSeparatorAttribute() ?>" name="x_Generic_Name4" id="x_Generic_Name4" value="<?php echo $pres_tradenames_new->Generic_Name4->CurrentValue ?>"<?php echo $pres_tradenames_new->Generic_Name4->editAttributes() ?>>
<?php echo $pres_tradenames_new->Generic_Name4->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pres_tradenames_new->Generic_Name5->Visible) { // Generic_Name5 ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Generic_Name5"><?php echo $pres_tradenames_new->Generic_Name5->caption() ?><?php echo ($pres_tradenames_new->Generic_Name5->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Generic_Name5"><?php echo strval($pres_tradenames_new->Generic_Name5->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pres_tradenames_new->Generic_Name5->ViewValue) : $pres_tradenames_new->Generic_Name5->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pres_tradenames_new->Generic_Name5->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pres_tradenames_new->Generic_Name5->ReadOnly || $pres_tradenames_new->Generic_Name5->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_Generic_Name5',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pres_tradenames_new->Generic_Name5->Lookup->getParamTag("p_x_Generic_Name5") ?>
<input type="hidden" data-table="pres_tradenames_new" data-field="x_Generic_Name5" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pres_tradenames_new->Generic_Name5->displayValueSeparatorAttribute() ?>" name="x_Generic_Name5" id="x_Generic_Name5" value="<?php echo $pres_tradenames_new->Generic_Name5->CurrentValue ?>"<?php echo $pres_tradenames_new->Generic_Name5->editAttributes() ?>>
<?php echo $pres_tradenames_new->Generic_Name5->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pres_tradenames_new->Strength4->Visible) { // Strength4 ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Strength4"><?php echo $pres_tradenames_new->Strength4->caption() ?><?php echo ($pres_tradenames_new->Strength4->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pres_tradenames_new" data-field="x_Strength4" name="x_Strength4" id="x_Strength4" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pres_tradenames_new->Strength4->getPlaceHolder()) ?>" value="<?php echo $pres_tradenames_new->Strength4->EditValue ?>"<?php echo $pres_tradenames_new->Strength4->editAttributes() ?>>
<?php echo $pres_tradenames_new->Strength4->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pres_tradenames_new->Strength5->Visible) { // Strength5 ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Strength5"><?php echo $pres_tradenames_new->Strength5->caption() ?><?php echo ($pres_tradenames_new->Strength5->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="pres_tradenames_new" data-field="x_Strength5" name="x_Strength5" id="x_Strength5" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pres_tradenames_new->Strength5->getPlaceHolder()) ?>" value="<?php echo $pres_tradenames_new->Strength5->EditValue ?>"<?php echo $pres_tradenames_new->Strength5->editAttributes() ?>>
<?php echo $pres_tradenames_new->Strength5->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pres_tradenames_new->Unit4->Visible) { // Unit4 ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Unit4"><?php echo $pres_tradenames_new->Unit4->caption() ?><?php echo ($pres_tradenames_new->Unit4->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pres_tradenames_new" data-field="x_Unit4" data-value-separator="<?php echo $pres_tradenames_new->Unit4->displayValueSeparatorAttribute() ?>" id="x_Unit4" name="x_Unit4"<?php echo $pres_tradenames_new->Unit4->editAttributes() ?>>
		<?php echo $pres_tradenames_new->Unit4->selectOptionListHtml("x_Unit4") ?>
	</select>
</div>
<?php echo $pres_tradenames_new->Unit4->Lookup->getParamTag("p_x_Unit4") ?>
<?php echo $pres_tradenames_new->Unit4->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pres_tradenames_new->Unit5->Visible) { // Unit5 ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Unit5"><?php echo $pres_tradenames_new->Unit5->caption() ?><?php echo ($pres_tradenames_new->Unit5->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pres_tradenames_new" data-field="x_Unit5" data-value-separator="<?php echo $pres_tradenames_new->Unit5->displayValueSeparatorAttribute() ?>" id="x_Unit5" name="x_Unit5"<?php echo $pres_tradenames_new->Unit5->editAttributes() ?>>
		<?php echo $pres_tradenames_new->Unit5->selectOptionListHtml("x_Unit5") ?>
	</select>
</div>
<?php echo $pres_tradenames_new->Unit5->Lookup->getParamTag("p_x_Unit5") ?>
<?php echo $pres_tradenames_new->Unit5->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pres_tradenames_new->AlterNative1->Visible) { // AlterNative1 ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_AlterNative1"><?php echo $pres_tradenames_new->AlterNative1->caption() ?><?php echo ($pres_tradenames_new->AlterNative1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_AlterNative1"><?php echo strval($pres_tradenames_new->AlterNative1->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pres_tradenames_new->AlterNative1->ViewValue) : $pres_tradenames_new->AlterNative1->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pres_tradenames_new->AlterNative1->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pres_tradenames_new->AlterNative1->ReadOnly || $pres_tradenames_new->AlterNative1->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_AlterNative1',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pres_tradenames_new->AlterNative1->Lookup->getParamTag("p_x_AlterNative1") ?>
<input type="hidden" data-table="pres_tradenames_new" data-field="x_AlterNative1" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pres_tradenames_new->AlterNative1->displayValueSeparatorAttribute() ?>" name="x_AlterNative1" id="x_AlterNative1" value="<?php echo $pres_tradenames_new->AlterNative1->CurrentValue ?>"<?php echo $pres_tradenames_new->AlterNative1->editAttributes() ?>>
<?php echo $pres_tradenames_new->AlterNative1->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pres_tradenames_new->AlterNative2->Visible) { // AlterNative2 ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_AlterNative2"><?php echo $pres_tradenames_new->AlterNative2->caption() ?><?php echo ($pres_tradenames_new->AlterNative2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_AlterNative2"><?php echo strval($pres_tradenames_new->AlterNative2->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pres_tradenames_new->AlterNative2->ViewValue) : $pres_tradenames_new->AlterNative2->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pres_tradenames_new->AlterNative2->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pres_tradenames_new->AlterNative2->ReadOnly || $pres_tradenames_new->AlterNative2->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_AlterNative2',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pres_tradenames_new->AlterNative2->Lookup->getParamTag("p_x_AlterNative2") ?>
<input type="hidden" data-table="pres_tradenames_new" data-field="x_AlterNative2" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pres_tradenames_new->AlterNative2->displayValueSeparatorAttribute() ?>" name="x_AlterNative2" id="x_AlterNative2" value="<?php echo $pres_tradenames_new->AlterNative2->CurrentValue ?>"<?php echo $pres_tradenames_new->AlterNative2->editAttributes() ?>>
<?php echo $pres_tradenames_new->AlterNative2->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pres_tradenames_new->AlterNative3->Visible) { // AlterNative3 ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_AlterNative3"><?php echo $pres_tradenames_new->AlterNative3->caption() ?><?php echo ($pres_tradenames_new->AlterNative3->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_AlterNative3"><?php echo strval($pres_tradenames_new->AlterNative3->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pres_tradenames_new->AlterNative3->ViewValue) : $pres_tradenames_new->AlterNative3->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pres_tradenames_new->AlterNative3->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pres_tradenames_new->AlterNative3->ReadOnly || $pres_tradenames_new->AlterNative3->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_AlterNative3',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pres_tradenames_new->AlterNative3->Lookup->getParamTag("p_x_AlterNative3") ?>
<input type="hidden" data-table="pres_tradenames_new" data-field="x_AlterNative3" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pres_tradenames_new->AlterNative3->displayValueSeparatorAttribute() ?>" name="x_AlterNative3" id="x_AlterNative3" value="<?php echo $pres_tradenames_new->AlterNative3->CurrentValue ?>"<?php echo $pres_tradenames_new->AlterNative3->editAttributes() ?>>
<?php echo $pres_tradenames_new->AlterNative3->CustomMsg ?></div>
	</div>
<?php } ?>
<?php if ($pres_tradenames_new->AlterNative4->Visible) { // AlterNative4 ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_AlterNative4"><?php echo $pres_tradenames_new->AlterNative4->caption() ?><?php echo ($pres_tradenames_new->AlterNative4->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_AlterNative4"><?php echo strval($pres_tradenames_new->AlterNative4->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pres_tradenames_new->AlterNative4->ViewValue) : $pres_tradenames_new->AlterNative4->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pres_tradenames_new->AlterNative4->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pres_tradenames_new->AlterNative4->ReadOnly || $pres_tradenames_new->AlterNative4->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_AlterNative4',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pres_tradenames_new->AlterNative4->Lookup->getParamTag("p_x_AlterNative4") ?>
<input type="hidden" data-table="pres_tradenames_new" data-field="x_AlterNative4" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pres_tradenames_new->AlterNative4->displayValueSeparatorAttribute() ?>" name="x_AlterNative4" id="x_AlterNative4" value="<?php echo $pres_tradenames_new->AlterNative4->CurrentValue ?>"<?php echo $pres_tradenames_new->AlterNative4->editAttributes() ?>>
<?php echo $pres_tradenames_new->AlterNative4->CustomMsg ?></div>
	</div>
<?php } ?>
</form>
<?php
$pres_tradenames_new_addopt->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php
$pres_tradenames_new_addopt->terminate();
?>