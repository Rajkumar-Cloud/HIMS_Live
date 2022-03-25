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
$pres_tradenames_new_add = new pres_tradenames_new_add();

// Run the page
$pres_tradenames_new_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_tradenames_new_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fpres_tradenames_newadd = currentForm = new ew.Form("fpres_tradenames_newadd", "add");

// Validate form
fpres_tradenames_newadd.validate = function() {
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
		<?php if ($pres_tradenames_new_add->Drug_Name->Required) { ?>
			elm = this.getElements("x" + infix + "_Drug_Name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_tradenames_new->Drug_Name->caption(), $pres_tradenames_new->Drug_Name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_tradenames_new_add->Generic_Name->Required) { ?>
			elm = this.getElements("x" + infix + "_Generic_Name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_tradenames_new->Generic_Name->caption(), $pres_tradenames_new->Generic_Name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_tradenames_new_add->Trade_Name->Required) { ?>
			elm = this.getElements("x" + infix + "_Trade_Name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_tradenames_new->Trade_Name->caption(), $pres_tradenames_new->Trade_Name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_tradenames_new_add->PR_CODE->Required) { ?>
			elm = this.getElements("x" + infix + "_PR_CODE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_tradenames_new->PR_CODE->caption(), $pres_tradenames_new->PR_CODE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_tradenames_new_add->Form->Required) { ?>
			elm = this.getElements("x" + infix + "_Form");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_tradenames_new->Form->caption(), $pres_tradenames_new->Form->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_tradenames_new_add->Strength->Required) { ?>
			elm = this.getElements("x" + infix + "_Strength");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_tradenames_new->Strength->caption(), $pres_tradenames_new->Strength->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_tradenames_new_add->Unit->Required) { ?>
			elm = this.getElements("x" + infix + "_Unit");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_tradenames_new->Unit->caption(), $pres_tradenames_new->Unit->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_tradenames_new_add->CONTAINER_TYPE->Required) { ?>
			elm = this.getElements("x" + infix + "_CONTAINER_TYPE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_tradenames_new->CONTAINER_TYPE->caption(), $pres_tradenames_new->CONTAINER_TYPE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_tradenames_new_add->CONTAINER_STRENGTH->Required) { ?>
			elm = this.getElements("x" + infix + "_CONTAINER_STRENGTH");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_tradenames_new->CONTAINER_STRENGTH->caption(), $pres_tradenames_new->CONTAINER_STRENGTH->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_tradenames_new_add->TypeOfDrug->Required) { ?>
			elm = this.getElements("x" + infix + "_TypeOfDrug");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_tradenames_new->TypeOfDrug->caption(), $pres_tradenames_new->TypeOfDrug->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_tradenames_new_add->ProductType->Required) { ?>
			elm = this.getElements("x" + infix + "_ProductType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_tradenames_new->ProductType->caption(), $pres_tradenames_new->ProductType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_tradenames_new_add->Generic_Name1->Required) { ?>
			elm = this.getElements("x" + infix + "_Generic_Name1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_tradenames_new->Generic_Name1->caption(), $pres_tradenames_new->Generic_Name1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_tradenames_new_add->Strength1->Required) { ?>
			elm = this.getElements("x" + infix + "_Strength1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_tradenames_new->Strength1->caption(), $pres_tradenames_new->Strength1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_tradenames_new_add->Unit1->Required) { ?>
			elm = this.getElements("x" + infix + "_Unit1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_tradenames_new->Unit1->caption(), $pres_tradenames_new->Unit1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_tradenames_new_add->Generic_Name2->Required) { ?>
			elm = this.getElements("x" + infix + "_Generic_Name2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_tradenames_new->Generic_Name2->caption(), $pres_tradenames_new->Generic_Name2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_tradenames_new_add->Strength2->Required) { ?>
			elm = this.getElements("x" + infix + "_Strength2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_tradenames_new->Strength2->caption(), $pres_tradenames_new->Strength2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_tradenames_new_add->Unit2->Required) { ?>
			elm = this.getElements("x" + infix + "_Unit2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_tradenames_new->Unit2->caption(), $pres_tradenames_new->Unit2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_tradenames_new_add->Generic_Name3->Required) { ?>
			elm = this.getElements("x" + infix + "_Generic_Name3");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_tradenames_new->Generic_Name3->caption(), $pres_tradenames_new->Generic_Name3->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_tradenames_new_add->Strength3->Required) { ?>
			elm = this.getElements("x" + infix + "_Strength3");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_tradenames_new->Strength3->caption(), $pres_tradenames_new->Strength3->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_tradenames_new_add->Unit3->Required) { ?>
			elm = this.getElements("x" + infix + "_Unit3");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_tradenames_new->Unit3->caption(), $pres_tradenames_new->Unit3->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_tradenames_new_add->Generic_Name4->Required) { ?>
			elm = this.getElements("x" + infix + "_Generic_Name4");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_tradenames_new->Generic_Name4->caption(), $pres_tradenames_new->Generic_Name4->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_tradenames_new_add->Generic_Name5->Required) { ?>
			elm = this.getElements("x" + infix + "_Generic_Name5");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_tradenames_new->Generic_Name5->caption(), $pres_tradenames_new->Generic_Name5->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_tradenames_new_add->Strength4->Required) { ?>
			elm = this.getElements("x" + infix + "_Strength4");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_tradenames_new->Strength4->caption(), $pres_tradenames_new->Strength4->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_tradenames_new_add->Strength5->Required) { ?>
			elm = this.getElements("x" + infix + "_Strength5");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_tradenames_new->Strength5->caption(), $pres_tradenames_new->Strength5->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_tradenames_new_add->Unit4->Required) { ?>
			elm = this.getElements("x" + infix + "_Unit4");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_tradenames_new->Unit4->caption(), $pres_tradenames_new->Unit4->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_tradenames_new_add->Unit5->Required) { ?>
			elm = this.getElements("x" + infix + "_Unit5");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_tradenames_new->Unit5->caption(), $pres_tradenames_new->Unit5->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_tradenames_new_add->AlterNative1->Required) { ?>
			elm = this.getElements("x" + infix + "_AlterNative1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_tradenames_new->AlterNative1->caption(), $pres_tradenames_new->AlterNative1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_tradenames_new_add->AlterNative2->Required) { ?>
			elm = this.getElements("x" + infix + "_AlterNative2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_tradenames_new->AlterNative2->caption(), $pres_tradenames_new->AlterNative2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_tradenames_new_add->AlterNative3->Required) { ?>
			elm = this.getElements("x" + infix + "_AlterNative3");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_tradenames_new->AlterNative3->caption(), $pres_tradenames_new->AlterNative3->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_tradenames_new_add->AlterNative4->Required) { ?>
			elm = this.getElements("x" + infix + "_AlterNative4");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_tradenames_new->AlterNative4->caption(), $pres_tradenames_new->AlterNative4->RequiredErrorMessage)) ?>");
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
fpres_tradenames_newadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpres_tradenames_newadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpres_tradenames_newadd.lists["x_Generic_Name"] = <?php echo $pres_tradenames_new_add->Generic_Name->Lookup->toClientList() ?>;
fpres_tradenames_newadd.lists["x_Generic_Name"].options = <?php echo JsonEncode($pres_tradenames_new_add->Generic_Name->lookupOptions()) ?>;
fpres_tradenames_newadd.lists["x_Form"] = <?php echo $pres_tradenames_new_add->Form->Lookup->toClientList() ?>;
fpres_tradenames_newadd.lists["x_Form"].options = <?php echo JsonEncode($pres_tradenames_new_add->Form->lookupOptions()) ?>;
fpres_tradenames_newadd.lists["x_Unit"] = <?php echo $pres_tradenames_new_add->Unit->Lookup->toClientList() ?>;
fpres_tradenames_newadd.lists["x_Unit"].options = <?php echo JsonEncode($pres_tradenames_new_add->Unit->lookupOptions()) ?>;
fpres_tradenames_newadd.lists["x_TypeOfDrug"] = <?php echo $pres_tradenames_new_add->TypeOfDrug->Lookup->toClientList() ?>;
fpres_tradenames_newadd.lists["x_TypeOfDrug"].options = <?php echo JsonEncode($pres_tradenames_new_add->TypeOfDrug->options(FALSE, TRUE)) ?>;
fpres_tradenames_newadd.lists["x_ProductType"] = <?php echo $pres_tradenames_new_add->ProductType->Lookup->toClientList() ?>;
fpres_tradenames_newadd.lists["x_ProductType"].options = <?php echo JsonEncode($pres_tradenames_new_add->ProductType->options(FALSE, TRUE)) ?>;
fpres_tradenames_newadd.lists["x_Generic_Name1"] = <?php echo $pres_tradenames_new_add->Generic_Name1->Lookup->toClientList() ?>;
fpres_tradenames_newadd.lists["x_Generic_Name1"].options = <?php echo JsonEncode($pres_tradenames_new_add->Generic_Name1->lookupOptions()) ?>;
fpres_tradenames_newadd.lists["x_Unit1"] = <?php echo $pres_tradenames_new_add->Unit1->Lookup->toClientList() ?>;
fpres_tradenames_newadd.lists["x_Unit1"].options = <?php echo JsonEncode($pres_tradenames_new_add->Unit1->lookupOptions()) ?>;
fpres_tradenames_newadd.lists["x_Generic_Name2"] = <?php echo $pres_tradenames_new_add->Generic_Name2->Lookup->toClientList() ?>;
fpres_tradenames_newadd.lists["x_Generic_Name2"].options = <?php echo JsonEncode($pres_tradenames_new_add->Generic_Name2->lookupOptions()) ?>;
fpres_tradenames_newadd.lists["x_Unit2"] = <?php echo $pres_tradenames_new_add->Unit2->Lookup->toClientList() ?>;
fpres_tradenames_newadd.lists["x_Unit2"].options = <?php echo JsonEncode($pres_tradenames_new_add->Unit2->lookupOptions()) ?>;
fpres_tradenames_newadd.lists["x_Generic_Name3"] = <?php echo $pres_tradenames_new_add->Generic_Name3->Lookup->toClientList() ?>;
fpres_tradenames_newadd.lists["x_Generic_Name3"].options = <?php echo JsonEncode($pres_tradenames_new_add->Generic_Name3->lookupOptions()) ?>;
fpres_tradenames_newadd.lists["x_Unit3"] = <?php echo $pres_tradenames_new_add->Unit3->Lookup->toClientList() ?>;
fpres_tradenames_newadd.lists["x_Unit3"].options = <?php echo JsonEncode($pres_tradenames_new_add->Unit3->lookupOptions()) ?>;
fpres_tradenames_newadd.lists["x_Generic_Name4"] = <?php echo $pres_tradenames_new_add->Generic_Name4->Lookup->toClientList() ?>;
fpres_tradenames_newadd.lists["x_Generic_Name4"].options = <?php echo JsonEncode($pres_tradenames_new_add->Generic_Name4->lookupOptions()) ?>;
fpres_tradenames_newadd.lists["x_Generic_Name5"] = <?php echo $pres_tradenames_new_add->Generic_Name5->Lookup->toClientList() ?>;
fpres_tradenames_newadd.lists["x_Generic_Name5"].options = <?php echo JsonEncode($pres_tradenames_new_add->Generic_Name5->lookupOptions()) ?>;
fpres_tradenames_newadd.lists["x_Unit4"] = <?php echo $pres_tradenames_new_add->Unit4->Lookup->toClientList() ?>;
fpres_tradenames_newadd.lists["x_Unit4"].options = <?php echo JsonEncode($pres_tradenames_new_add->Unit4->lookupOptions()) ?>;
fpres_tradenames_newadd.lists["x_Unit5"] = <?php echo $pres_tradenames_new_add->Unit5->Lookup->toClientList() ?>;
fpres_tradenames_newadd.lists["x_Unit5"].options = <?php echo JsonEncode($pres_tradenames_new_add->Unit5->lookupOptions()) ?>;
fpres_tradenames_newadd.lists["x_AlterNative1"] = <?php echo $pres_tradenames_new_add->AlterNative1->Lookup->toClientList() ?>;
fpres_tradenames_newadd.lists["x_AlterNative1"].options = <?php echo JsonEncode($pres_tradenames_new_add->AlterNative1->lookupOptions()) ?>;
fpres_tradenames_newadd.lists["x_AlterNative2"] = <?php echo $pres_tradenames_new_add->AlterNative2->Lookup->toClientList() ?>;
fpres_tradenames_newadd.lists["x_AlterNative2"].options = <?php echo JsonEncode($pres_tradenames_new_add->AlterNative2->lookupOptions()) ?>;
fpres_tradenames_newadd.lists["x_AlterNative3"] = <?php echo $pres_tradenames_new_add->AlterNative3->Lookup->toClientList() ?>;
fpres_tradenames_newadd.lists["x_AlterNative3"].options = <?php echo JsonEncode($pres_tradenames_new_add->AlterNative3->lookupOptions()) ?>;
fpres_tradenames_newadd.lists["x_AlterNative4"] = <?php echo $pres_tradenames_new_add->AlterNative4->Lookup->toClientList() ?>;
fpres_tradenames_newadd.lists["x_AlterNative4"].options = <?php echo JsonEncode($pres_tradenames_new_add->AlterNative4->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $pres_tradenames_new_add->showPageHeader(); ?>
<?php
$pres_tradenames_new_add->showMessage();
?>
<form name="fpres_tradenames_newadd" id="fpres_tradenames_newadd" class="<?php echo $pres_tradenames_new_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pres_tradenames_new_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pres_tradenames_new_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_tradenames_new">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$pres_tradenames_new_add->IsModal ?>">
<div class="ew-add-div d-none"><!-- page* -->
<?php if ($pres_tradenames_new->Drug_Name->Visible) { // Drug_Name ?>
	<div id="r_Drug_Name" class="form-group row">
		<label id="elh_pres_tradenames_new_Drug_Name" for="x_Drug_Name" class="<?php echo $pres_tradenames_new_add->LeftColumnClass ?>"><script id="tpc_pres_tradenames_new_Drug_Name" class="pres_tradenames_newadd" type="text/html"><span><?php echo $pres_tradenames_new->Drug_Name->caption() ?><?php echo ($pres_tradenames_new->Drug_Name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pres_tradenames_new_add->RightColumnClass ?>"><div<?php echo $pres_tradenames_new->Drug_Name->cellAttributes() ?>>
<script id="tpx_pres_tradenames_new_Drug_Name" class="pres_tradenames_newadd" type="text/html">
<span id="el_pres_tradenames_new_Drug_Name">
<input type="text" data-table="pres_tradenames_new" data-field="x_Drug_Name" name="x_Drug_Name" id="x_Drug_Name" placeholder="<?php echo HtmlEncode($pres_tradenames_new->Drug_Name->getPlaceHolder()) ?>" value="<?php echo $pres_tradenames_new->Drug_Name->EditValue ?>"<?php echo $pres_tradenames_new->Drug_Name->editAttributes() ?>>
</span>
</script>
<?php echo $pres_tradenames_new->Drug_Name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_tradenames_new->Generic_Name->Visible) { // Generic_Name ?>
	<div id="r_Generic_Name" class="form-group row">
		<label id="elh_pres_tradenames_new_Generic_Name" for="x_Generic_Name" class="<?php echo $pres_tradenames_new_add->LeftColumnClass ?>"><script id="tpc_pres_tradenames_new_Generic_Name" class="pres_tradenames_newadd" type="text/html"><span><?php echo $pres_tradenames_new->Generic_Name->caption() ?><?php echo ($pres_tradenames_new->Generic_Name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pres_tradenames_new_add->RightColumnClass ?>"><div<?php echo $pres_tradenames_new->Generic_Name->cellAttributes() ?>>
<script id="tpx_pres_tradenames_new_Generic_Name" class="pres_tradenames_newadd" type="text/html">
<span id="el_pres_tradenames_new_Generic_Name">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Generic_Name"><?php echo strval($pres_tradenames_new->Generic_Name->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pres_tradenames_new->Generic_Name->ViewValue) : $pres_tradenames_new->Generic_Name->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pres_tradenames_new->Generic_Name->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pres_tradenames_new->Generic_Name->ReadOnly || $pres_tradenames_new->Generic_Name->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_Generic_Name',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pres_tradenames_new->Generic_Name->Lookup->getParamTag("p_x_Generic_Name") ?>
<input type="hidden" data-table="pres_tradenames_new" data-field="x_Generic_Name" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pres_tradenames_new->Generic_Name->displayValueSeparatorAttribute() ?>" name="x_Generic_Name" id="x_Generic_Name" value="<?php echo $pres_tradenames_new->Generic_Name->CurrentValue ?>"<?php echo $pres_tradenames_new->Generic_Name->editAttributes() ?>>
</span>
</script>
<?php echo $pres_tradenames_new->Generic_Name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_tradenames_new->Trade_Name->Visible) { // Trade_Name ?>
	<div id="r_Trade_Name" class="form-group row">
		<label id="elh_pres_tradenames_new_Trade_Name" for="x_Trade_Name" class="<?php echo $pres_tradenames_new_add->LeftColumnClass ?>"><script id="tpc_pres_tradenames_new_Trade_Name" class="pres_tradenames_newadd" type="text/html"><span><?php echo $pres_tradenames_new->Trade_Name->caption() ?><?php echo ($pres_tradenames_new->Trade_Name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pres_tradenames_new_add->RightColumnClass ?>"><div<?php echo $pres_tradenames_new->Trade_Name->cellAttributes() ?>>
<script id="tpx_pres_tradenames_new_Trade_Name" class="pres_tradenames_newadd" type="text/html">
<span id="el_pres_tradenames_new_Trade_Name">
<input type="text" data-table="pres_tradenames_new" data-field="x_Trade_Name" name="x_Trade_Name" id="x_Trade_Name" placeholder="<?php echo HtmlEncode($pres_tradenames_new->Trade_Name->getPlaceHolder()) ?>" value="<?php echo $pres_tradenames_new->Trade_Name->EditValue ?>"<?php echo $pres_tradenames_new->Trade_Name->editAttributes() ?>>
</span>
</script>
<?php echo $pres_tradenames_new->Trade_Name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_tradenames_new->PR_CODE->Visible) { // PR_CODE ?>
	<div id="r_PR_CODE" class="form-group row">
		<label id="elh_pres_tradenames_new_PR_CODE" for="x_PR_CODE" class="<?php echo $pres_tradenames_new_add->LeftColumnClass ?>"><script id="tpc_pres_tradenames_new_PR_CODE" class="pres_tradenames_newadd" type="text/html"><span><?php echo $pres_tradenames_new->PR_CODE->caption() ?><?php echo ($pres_tradenames_new->PR_CODE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pres_tradenames_new_add->RightColumnClass ?>"><div<?php echo $pres_tradenames_new->PR_CODE->cellAttributes() ?>>
<script id="tpx_pres_tradenames_new_PR_CODE" class="pres_tradenames_newadd" type="text/html">
<span id="el_pres_tradenames_new_PR_CODE">
<input type="text" data-table="pres_tradenames_new" data-field="x_PR_CODE" name="x_PR_CODE" id="x_PR_CODE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_tradenames_new->PR_CODE->getPlaceHolder()) ?>" value="<?php echo $pres_tradenames_new->PR_CODE->EditValue ?>"<?php echo $pres_tradenames_new->PR_CODE->editAttributes() ?>>
</span>
</script>
<?php echo $pres_tradenames_new->PR_CODE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_tradenames_new->Form->Visible) { // Form ?>
	<div id="r_Form" class="form-group row">
		<label id="elh_pres_tradenames_new_Form" for="x_Form" class="<?php echo $pres_tradenames_new_add->LeftColumnClass ?>"><script id="tpc_pres_tradenames_new_Form" class="pres_tradenames_newadd" type="text/html"><span><?php echo $pres_tradenames_new->Form->caption() ?><?php echo ($pres_tradenames_new->Form->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pres_tradenames_new_add->RightColumnClass ?>"><div<?php echo $pres_tradenames_new->Form->cellAttributes() ?>>
<script id="tpx_pres_tradenames_new_Form" class="pres_tradenames_newadd" type="text/html">
<span id="el_pres_tradenames_new_Form">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pres_tradenames_new" data-field="x_Form" data-value-separator="<?php echo $pres_tradenames_new->Form->displayValueSeparatorAttribute() ?>" id="x_Form" name="x_Form"<?php echo $pres_tradenames_new->Form->editAttributes() ?>>
		<?php echo $pres_tradenames_new->Form->selectOptionListHtml("x_Form") ?>
	</select>
</div>
<?php echo $pres_tradenames_new->Form->Lookup->getParamTag("p_x_Form") ?>
</span>
</script>
<?php echo $pres_tradenames_new->Form->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_tradenames_new->Strength->Visible) { // Strength ?>
	<div id="r_Strength" class="form-group row">
		<label id="elh_pres_tradenames_new_Strength" for="x_Strength" class="<?php echo $pres_tradenames_new_add->LeftColumnClass ?>"><script id="tpc_pres_tradenames_new_Strength" class="pres_tradenames_newadd" type="text/html"><span><?php echo $pres_tradenames_new->Strength->caption() ?><?php echo ($pres_tradenames_new->Strength->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pres_tradenames_new_add->RightColumnClass ?>"><div<?php echo $pres_tradenames_new->Strength->cellAttributes() ?>>
<script id="tpx_pres_tradenames_new_Strength" class="pres_tradenames_newadd" type="text/html">
<span id="el_pres_tradenames_new_Strength">
<input type="text" data-table="pres_tradenames_new" data-field="x_Strength" name="x_Strength" id="x_Strength" placeholder="<?php echo HtmlEncode($pres_tradenames_new->Strength->getPlaceHolder()) ?>" value="<?php echo $pres_tradenames_new->Strength->EditValue ?>"<?php echo $pres_tradenames_new->Strength->editAttributes() ?>>
</span>
</script>
<?php echo $pres_tradenames_new->Strength->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_tradenames_new->Unit->Visible) { // Unit ?>
	<div id="r_Unit" class="form-group row">
		<label id="elh_pres_tradenames_new_Unit" for="x_Unit" class="<?php echo $pres_tradenames_new_add->LeftColumnClass ?>"><script id="tpc_pres_tradenames_new_Unit" class="pres_tradenames_newadd" type="text/html"><span><?php echo $pres_tradenames_new->Unit->caption() ?><?php echo ($pres_tradenames_new->Unit->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pres_tradenames_new_add->RightColumnClass ?>"><div<?php echo $pres_tradenames_new->Unit->cellAttributes() ?>>
<script id="tpx_pres_tradenames_new_Unit" class="pres_tradenames_newadd" type="text/html">
<span id="el_pres_tradenames_new_Unit">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pres_tradenames_new" data-field="x_Unit" data-value-separator="<?php echo $pres_tradenames_new->Unit->displayValueSeparatorAttribute() ?>" id="x_Unit" name="x_Unit"<?php echo $pres_tradenames_new->Unit->editAttributes() ?>>
		<?php echo $pres_tradenames_new->Unit->selectOptionListHtml("x_Unit") ?>
	</select>
</div>
<?php echo $pres_tradenames_new->Unit->Lookup->getParamTag("p_x_Unit") ?>
</span>
</script>
<?php echo $pres_tradenames_new->Unit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_tradenames_new->CONTAINER_TYPE->Visible) { // CONTAINER_TYPE ?>
	<div id="r_CONTAINER_TYPE" class="form-group row">
		<label id="elh_pres_tradenames_new_CONTAINER_TYPE" for="x_CONTAINER_TYPE" class="<?php echo $pres_tradenames_new_add->LeftColumnClass ?>"><script id="tpc_pres_tradenames_new_CONTAINER_TYPE" class="pres_tradenames_newadd" type="text/html"><span><?php echo $pres_tradenames_new->CONTAINER_TYPE->caption() ?><?php echo ($pres_tradenames_new->CONTAINER_TYPE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pres_tradenames_new_add->RightColumnClass ?>"><div<?php echo $pres_tradenames_new->CONTAINER_TYPE->cellAttributes() ?>>
<script id="tpx_pres_tradenames_new_CONTAINER_TYPE" class="pres_tradenames_newadd" type="text/html">
<span id="el_pres_tradenames_new_CONTAINER_TYPE">
<input type="text" data-table="pres_tradenames_new" data-field="x_CONTAINER_TYPE" name="x_CONTAINER_TYPE" id="x_CONTAINER_TYPE" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_tradenames_new->CONTAINER_TYPE->getPlaceHolder()) ?>" value="<?php echo $pres_tradenames_new->CONTAINER_TYPE->EditValue ?>"<?php echo $pres_tradenames_new->CONTAINER_TYPE->editAttributes() ?>>
</span>
</script>
<?php echo $pres_tradenames_new->CONTAINER_TYPE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_tradenames_new->CONTAINER_STRENGTH->Visible) { // CONTAINER_STRENGTH ?>
	<div id="r_CONTAINER_STRENGTH" class="form-group row">
		<label id="elh_pres_tradenames_new_CONTAINER_STRENGTH" for="x_CONTAINER_STRENGTH" class="<?php echo $pres_tradenames_new_add->LeftColumnClass ?>"><script id="tpc_pres_tradenames_new_CONTAINER_STRENGTH" class="pres_tradenames_newadd" type="text/html"><span><?php echo $pres_tradenames_new->CONTAINER_STRENGTH->caption() ?><?php echo ($pres_tradenames_new->CONTAINER_STRENGTH->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pres_tradenames_new_add->RightColumnClass ?>"><div<?php echo $pres_tradenames_new->CONTAINER_STRENGTH->cellAttributes() ?>>
<script id="tpx_pres_tradenames_new_CONTAINER_STRENGTH" class="pres_tradenames_newadd" type="text/html">
<span id="el_pres_tradenames_new_CONTAINER_STRENGTH">
<input type="text" data-table="pres_tradenames_new" data-field="x_CONTAINER_STRENGTH" name="x_CONTAINER_STRENGTH" id="x_CONTAINER_STRENGTH" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_tradenames_new->CONTAINER_STRENGTH->getPlaceHolder()) ?>" value="<?php echo $pres_tradenames_new->CONTAINER_STRENGTH->EditValue ?>"<?php echo $pres_tradenames_new->CONTAINER_STRENGTH->editAttributes() ?>>
</span>
</script>
<?php echo $pres_tradenames_new->CONTAINER_STRENGTH->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_tradenames_new->TypeOfDrug->Visible) { // TypeOfDrug ?>
	<div id="r_TypeOfDrug" class="form-group row">
		<label id="elh_pres_tradenames_new_TypeOfDrug" for="x_TypeOfDrug" class="<?php echo $pres_tradenames_new_add->LeftColumnClass ?>"><script id="tpc_pres_tradenames_new_TypeOfDrug" class="pres_tradenames_newadd" type="text/html"><span><?php echo $pres_tradenames_new->TypeOfDrug->caption() ?><?php echo ($pres_tradenames_new->TypeOfDrug->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pres_tradenames_new_add->RightColumnClass ?>"><div<?php echo $pres_tradenames_new->TypeOfDrug->cellAttributes() ?>>
<script id="tpx_pres_tradenames_new_TypeOfDrug" class="pres_tradenames_newadd" type="text/html">
<span id="el_pres_tradenames_new_TypeOfDrug">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pres_tradenames_new" data-field="x_TypeOfDrug" data-value-separator="<?php echo $pres_tradenames_new->TypeOfDrug->displayValueSeparatorAttribute() ?>" id="x_TypeOfDrug" name="x_TypeOfDrug"<?php echo $pres_tradenames_new->TypeOfDrug->editAttributes() ?>>
		<?php echo $pres_tradenames_new->TypeOfDrug->selectOptionListHtml("x_TypeOfDrug") ?>
	</select>
</div>
</span>
</script>
<?php echo $pres_tradenames_new->TypeOfDrug->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_tradenames_new->ProductType->Visible) { // ProductType ?>
	<div id="r_ProductType" class="form-group row">
		<label id="elh_pres_tradenames_new_ProductType" for="x_ProductType" class="<?php echo $pres_tradenames_new_add->LeftColumnClass ?>"><script id="tpc_pres_tradenames_new_ProductType" class="pres_tradenames_newadd" type="text/html"><span><?php echo $pres_tradenames_new->ProductType->caption() ?><?php echo ($pres_tradenames_new->ProductType->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pres_tradenames_new_add->RightColumnClass ?>"><div<?php echo $pres_tradenames_new->ProductType->cellAttributes() ?>>
<script id="tpx_pres_tradenames_new_ProductType" class="pres_tradenames_newadd" type="text/html">
<span id="el_pres_tradenames_new_ProductType">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pres_tradenames_new" data-field="x_ProductType" data-value-separator="<?php echo $pres_tradenames_new->ProductType->displayValueSeparatorAttribute() ?>" id="x_ProductType" name="x_ProductType"<?php echo $pres_tradenames_new->ProductType->editAttributes() ?>>
		<?php echo $pres_tradenames_new->ProductType->selectOptionListHtml("x_ProductType") ?>
	</select>
</div>
</span>
</script>
<?php echo $pres_tradenames_new->ProductType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_tradenames_new->Generic_Name1->Visible) { // Generic_Name1 ?>
	<div id="r_Generic_Name1" class="form-group row">
		<label id="elh_pres_tradenames_new_Generic_Name1" for="x_Generic_Name1" class="<?php echo $pres_tradenames_new_add->LeftColumnClass ?>"><script id="tpc_pres_tradenames_new_Generic_Name1" class="pres_tradenames_newadd" type="text/html"><span><?php echo $pres_tradenames_new->Generic_Name1->caption() ?><?php echo ($pres_tradenames_new->Generic_Name1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pres_tradenames_new_add->RightColumnClass ?>"><div<?php echo $pres_tradenames_new->Generic_Name1->cellAttributes() ?>>
<script id="tpx_pres_tradenames_new_Generic_Name1" class="pres_tradenames_newadd" type="text/html">
<span id="el_pres_tradenames_new_Generic_Name1">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Generic_Name1"><?php echo strval($pres_tradenames_new->Generic_Name1->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pres_tradenames_new->Generic_Name1->ViewValue) : $pres_tradenames_new->Generic_Name1->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pres_tradenames_new->Generic_Name1->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pres_tradenames_new->Generic_Name1->ReadOnly || $pres_tradenames_new->Generic_Name1->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_Generic_Name1',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pres_tradenames_new->Generic_Name1->Lookup->getParamTag("p_x_Generic_Name1") ?>
<input type="hidden" data-table="pres_tradenames_new" data-field="x_Generic_Name1" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pres_tradenames_new->Generic_Name1->displayValueSeparatorAttribute() ?>" name="x_Generic_Name1" id="x_Generic_Name1" value="<?php echo $pres_tradenames_new->Generic_Name1->CurrentValue ?>"<?php echo $pres_tradenames_new->Generic_Name1->editAttributes() ?>>
</span>
</script>
<?php echo $pres_tradenames_new->Generic_Name1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_tradenames_new->Strength1->Visible) { // Strength1 ?>
	<div id="r_Strength1" class="form-group row">
		<label id="elh_pres_tradenames_new_Strength1" for="x_Strength1" class="<?php echo $pres_tradenames_new_add->LeftColumnClass ?>"><script id="tpc_pres_tradenames_new_Strength1" class="pres_tradenames_newadd" type="text/html"><span><?php echo $pres_tradenames_new->Strength1->caption() ?><?php echo ($pres_tradenames_new->Strength1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pres_tradenames_new_add->RightColumnClass ?>"><div<?php echo $pres_tradenames_new->Strength1->cellAttributes() ?>>
<script id="tpx_pres_tradenames_new_Strength1" class="pres_tradenames_newadd" type="text/html">
<span id="el_pres_tradenames_new_Strength1">
<input type="text" data-table="pres_tradenames_new" data-field="x_Strength1" name="x_Strength1" id="x_Strength1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pres_tradenames_new->Strength1->getPlaceHolder()) ?>" value="<?php echo $pres_tradenames_new->Strength1->EditValue ?>"<?php echo $pres_tradenames_new->Strength1->editAttributes() ?>>
</span>
</script>
<?php echo $pres_tradenames_new->Strength1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_tradenames_new->Unit1->Visible) { // Unit1 ?>
	<div id="r_Unit1" class="form-group row">
		<label id="elh_pres_tradenames_new_Unit1" for="x_Unit1" class="<?php echo $pres_tradenames_new_add->LeftColumnClass ?>"><script id="tpc_pres_tradenames_new_Unit1" class="pres_tradenames_newadd" type="text/html"><span><?php echo $pres_tradenames_new->Unit1->caption() ?><?php echo ($pres_tradenames_new->Unit1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pres_tradenames_new_add->RightColumnClass ?>"><div<?php echo $pres_tradenames_new->Unit1->cellAttributes() ?>>
<script id="tpx_pres_tradenames_new_Unit1" class="pres_tradenames_newadd" type="text/html">
<span id="el_pres_tradenames_new_Unit1">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pres_tradenames_new" data-field="x_Unit1" data-value-separator="<?php echo $pres_tradenames_new->Unit1->displayValueSeparatorAttribute() ?>" id="x_Unit1" name="x_Unit1"<?php echo $pres_tradenames_new->Unit1->editAttributes() ?>>
		<?php echo $pres_tradenames_new->Unit1->selectOptionListHtml("x_Unit1") ?>
	</select>
</div>
<?php echo $pres_tradenames_new->Unit1->Lookup->getParamTag("p_x_Unit1") ?>
</span>
</script>
<?php echo $pres_tradenames_new->Unit1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_tradenames_new->Generic_Name2->Visible) { // Generic_Name2 ?>
	<div id="r_Generic_Name2" class="form-group row">
		<label id="elh_pres_tradenames_new_Generic_Name2" for="x_Generic_Name2" class="<?php echo $pres_tradenames_new_add->LeftColumnClass ?>"><script id="tpc_pres_tradenames_new_Generic_Name2" class="pres_tradenames_newadd" type="text/html"><span><?php echo $pres_tradenames_new->Generic_Name2->caption() ?><?php echo ($pres_tradenames_new->Generic_Name2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pres_tradenames_new_add->RightColumnClass ?>"><div<?php echo $pres_tradenames_new->Generic_Name2->cellAttributes() ?>>
<script id="tpx_pres_tradenames_new_Generic_Name2" class="pres_tradenames_newadd" type="text/html">
<span id="el_pres_tradenames_new_Generic_Name2">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Generic_Name2"><?php echo strval($pres_tradenames_new->Generic_Name2->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pres_tradenames_new->Generic_Name2->ViewValue) : $pres_tradenames_new->Generic_Name2->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pres_tradenames_new->Generic_Name2->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pres_tradenames_new->Generic_Name2->ReadOnly || $pres_tradenames_new->Generic_Name2->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_Generic_Name2',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pres_tradenames_new->Generic_Name2->Lookup->getParamTag("p_x_Generic_Name2") ?>
<input type="hidden" data-table="pres_tradenames_new" data-field="x_Generic_Name2" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pres_tradenames_new->Generic_Name2->displayValueSeparatorAttribute() ?>" name="x_Generic_Name2" id="x_Generic_Name2" value="<?php echo $pres_tradenames_new->Generic_Name2->CurrentValue ?>"<?php echo $pres_tradenames_new->Generic_Name2->editAttributes() ?>>
</span>
</script>
<?php echo $pres_tradenames_new->Generic_Name2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_tradenames_new->Strength2->Visible) { // Strength2 ?>
	<div id="r_Strength2" class="form-group row">
		<label id="elh_pres_tradenames_new_Strength2" for="x_Strength2" class="<?php echo $pres_tradenames_new_add->LeftColumnClass ?>"><script id="tpc_pres_tradenames_new_Strength2" class="pres_tradenames_newadd" type="text/html"><span><?php echo $pres_tradenames_new->Strength2->caption() ?><?php echo ($pres_tradenames_new->Strength2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pres_tradenames_new_add->RightColumnClass ?>"><div<?php echo $pres_tradenames_new->Strength2->cellAttributes() ?>>
<script id="tpx_pres_tradenames_new_Strength2" class="pres_tradenames_newadd" type="text/html">
<span id="el_pres_tradenames_new_Strength2">
<input type="text" data-table="pres_tradenames_new" data-field="x_Strength2" name="x_Strength2" id="x_Strength2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pres_tradenames_new->Strength2->getPlaceHolder()) ?>" value="<?php echo $pres_tradenames_new->Strength2->EditValue ?>"<?php echo $pres_tradenames_new->Strength2->editAttributes() ?>>
</span>
</script>
<?php echo $pres_tradenames_new->Strength2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_tradenames_new->Unit2->Visible) { // Unit2 ?>
	<div id="r_Unit2" class="form-group row">
		<label id="elh_pres_tradenames_new_Unit2" for="x_Unit2" class="<?php echo $pres_tradenames_new_add->LeftColumnClass ?>"><script id="tpc_pres_tradenames_new_Unit2" class="pres_tradenames_newadd" type="text/html"><span><?php echo $pres_tradenames_new->Unit2->caption() ?><?php echo ($pres_tradenames_new->Unit2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pres_tradenames_new_add->RightColumnClass ?>"><div<?php echo $pres_tradenames_new->Unit2->cellAttributes() ?>>
<script id="tpx_pres_tradenames_new_Unit2" class="pres_tradenames_newadd" type="text/html">
<span id="el_pres_tradenames_new_Unit2">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pres_tradenames_new" data-field="x_Unit2" data-value-separator="<?php echo $pres_tradenames_new->Unit2->displayValueSeparatorAttribute() ?>" id="x_Unit2" name="x_Unit2"<?php echo $pres_tradenames_new->Unit2->editAttributes() ?>>
		<?php echo $pres_tradenames_new->Unit2->selectOptionListHtml("x_Unit2") ?>
	</select>
</div>
<?php echo $pres_tradenames_new->Unit2->Lookup->getParamTag("p_x_Unit2") ?>
</span>
</script>
<?php echo $pres_tradenames_new->Unit2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_tradenames_new->Generic_Name3->Visible) { // Generic_Name3 ?>
	<div id="r_Generic_Name3" class="form-group row">
		<label id="elh_pres_tradenames_new_Generic_Name3" for="x_Generic_Name3" class="<?php echo $pres_tradenames_new_add->LeftColumnClass ?>"><script id="tpc_pres_tradenames_new_Generic_Name3" class="pres_tradenames_newadd" type="text/html"><span><?php echo $pres_tradenames_new->Generic_Name3->caption() ?><?php echo ($pres_tradenames_new->Generic_Name3->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pres_tradenames_new_add->RightColumnClass ?>"><div<?php echo $pres_tradenames_new->Generic_Name3->cellAttributes() ?>>
<script id="tpx_pres_tradenames_new_Generic_Name3" class="pres_tradenames_newadd" type="text/html">
<span id="el_pres_tradenames_new_Generic_Name3">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Generic_Name3"><?php echo strval($pres_tradenames_new->Generic_Name3->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pres_tradenames_new->Generic_Name3->ViewValue) : $pres_tradenames_new->Generic_Name3->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pres_tradenames_new->Generic_Name3->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pres_tradenames_new->Generic_Name3->ReadOnly || $pres_tradenames_new->Generic_Name3->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_Generic_Name3',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pres_tradenames_new->Generic_Name3->Lookup->getParamTag("p_x_Generic_Name3") ?>
<input type="hidden" data-table="pres_tradenames_new" data-field="x_Generic_Name3" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pres_tradenames_new->Generic_Name3->displayValueSeparatorAttribute() ?>" name="x_Generic_Name3" id="x_Generic_Name3" value="<?php echo $pres_tradenames_new->Generic_Name3->CurrentValue ?>"<?php echo $pres_tradenames_new->Generic_Name3->editAttributes() ?>>
</span>
</script>
<?php echo $pres_tradenames_new->Generic_Name3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_tradenames_new->Strength3->Visible) { // Strength3 ?>
	<div id="r_Strength3" class="form-group row">
		<label id="elh_pres_tradenames_new_Strength3" for="x_Strength3" class="<?php echo $pres_tradenames_new_add->LeftColumnClass ?>"><script id="tpc_pres_tradenames_new_Strength3" class="pres_tradenames_newadd" type="text/html"><span><?php echo $pres_tradenames_new->Strength3->caption() ?><?php echo ($pres_tradenames_new->Strength3->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pres_tradenames_new_add->RightColumnClass ?>"><div<?php echo $pres_tradenames_new->Strength3->cellAttributes() ?>>
<script id="tpx_pres_tradenames_new_Strength3" class="pres_tradenames_newadd" type="text/html">
<span id="el_pres_tradenames_new_Strength3">
<input type="text" data-table="pres_tradenames_new" data-field="x_Strength3" name="x_Strength3" id="x_Strength3" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pres_tradenames_new->Strength3->getPlaceHolder()) ?>" value="<?php echo $pres_tradenames_new->Strength3->EditValue ?>"<?php echo $pres_tradenames_new->Strength3->editAttributes() ?>>
</span>
</script>
<?php echo $pres_tradenames_new->Strength3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_tradenames_new->Unit3->Visible) { // Unit3 ?>
	<div id="r_Unit3" class="form-group row">
		<label id="elh_pres_tradenames_new_Unit3" for="x_Unit3" class="<?php echo $pres_tradenames_new_add->LeftColumnClass ?>"><script id="tpc_pres_tradenames_new_Unit3" class="pres_tradenames_newadd" type="text/html"><span><?php echo $pres_tradenames_new->Unit3->caption() ?><?php echo ($pres_tradenames_new->Unit3->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pres_tradenames_new_add->RightColumnClass ?>"><div<?php echo $pres_tradenames_new->Unit3->cellAttributes() ?>>
<script id="tpx_pres_tradenames_new_Unit3" class="pres_tradenames_newadd" type="text/html">
<span id="el_pres_tradenames_new_Unit3">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pres_tradenames_new" data-field="x_Unit3" data-value-separator="<?php echo $pres_tradenames_new->Unit3->displayValueSeparatorAttribute() ?>" id="x_Unit3" name="x_Unit3"<?php echo $pres_tradenames_new->Unit3->editAttributes() ?>>
		<?php echo $pres_tradenames_new->Unit3->selectOptionListHtml("x_Unit3") ?>
	</select>
</div>
<?php echo $pres_tradenames_new->Unit3->Lookup->getParamTag("p_x_Unit3") ?>
</span>
</script>
<?php echo $pres_tradenames_new->Unit3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_tradenames_new->Generic_Name4->Visible) { // Generic_Name4 ?>
	<div id="r_Generic_Name4" class="form-group row">
		<label id="elh_pres_tradenames_new_Generic_Name4" for="x_Generic_Name4" class="<?php echo $pres_tradenames_new_add->LeftColumnClass ?>"><script id="tpc_pres_tradenames_new_Generic_Name4" class="pres_tradenames_newadd" type="text/html"><span><?php echo $pres_tradenames_new->Generic_Name4->caption() ?><?php echo ($pres_tradenames_new->Generic_Name4->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pres_tradenames_new_add->RightColumnClass ?>"><div<?php echo $pres_tradenames_new->Generic_Name4->cellAttributes() ?>>
<script id="tpx_pres_tradenames_new_Generic_Name4" class="pres_tradenames_newadd" type="text/html">
<span id="el_pres_tradenames_new_Generic_Name4">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Generic_Name4"><?php echo strval($pres_tradenames_new->Generic_Name4->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pres_tradenames_new->Generic_Name4->ViewValue) : $pres_tradenames_new->Generic_Name4->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pres_tradenames_new->Generic_Name4->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pres_tradenames_new->Generic_Name4->ReadOnly || $pres_tradenames_new->Generic_Name4->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_Generic_Name4',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pres_tradenames_new->Generic_Name4->Lookup->getParamTag("p_x_Generic_Name4") ?>
<input type="hidden" data-table="pres_tradenames_new" data-field="x_Generic_Name4" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pres_tradenames_new->Generic_Name4->displayValueSeparatorAttribute() ?>" name="x_Generic_Name4" id="x_Generic_Name4" value="<?php echo $pres_tradenames_new->Generic_Name4->CurrentValue ?>"<?php echo $pres_tradenames_new->Generic_Name4->editAttributes() ?>>
</span>
</script>
<?php echo $pres_tradenames_new->Generic_Name4->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_tradenames_new->Generic_Name5->Visible) { // Generic_Name5 ?>
	<div id="r_Generic_Name5" class="form-group row">
		<label id="elh_pres_tradenames_new_Generic_Name5" for="x_Generic_Name5" class="<?php echo $pres_tradenames_new_add->LeftColumnClass ?>"><script id="tpc_pres_tradenames_new_Generic_Name5" class="pres_tradenames_newadd" type="text/html"><span><?php echo $pres_tradenames_new->Generic_Name5->caption() ?><?php echo ($pres_tradenames_new->Generic_Name5->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pres_tradenames_new_add->RightColumnClass ?>"><div<?php echo $pres_tradenames_new->Generic_Name5->cellAttributes() ?>>
<script id="tpx_pres_tradenames_new_Generic_Name5" class="pres_tradenames_newadd" type="text/html">
<span id="el_pres_tradenames_new_Generic_Name5">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Generic_Name5"><?php echo strval($pres_tradenames_new->Generic_Name5->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pres_tradenames_new->Generic_Name5->ViewValue) : $pres_tradenames_new->Generic_Name5->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pres_tradenames_new->Generic_Name5->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pres_tradenames_new->Generic_Name5->ReadOnly || $pres_tradenames_new->Generic_Name5->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_Generic_Name5',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pres_tradenames_new->Generic_Name5->Lookup->getParamTag("p_x_Generic_Name5") ?>
<input type="hidden" data-table="pres_tradenames_new" data-field="x_Generic_Name5" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pres_tradenames_new->Generic_Name5->displayValueSeparatorAttribute() ?>" name="x_Generic_Name5" id="x_Generic_Name5" value="<?php echo $pres_tradenames_new->Generic_Name5->CurrentValue ?>"<?php echo $pres_tradenames_new->Generic_Name5->editAttributes() ?>>
</span>
</script>
<?php echo $pres_tradenames_new->Generic_Name5->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_tradenames_new->Strength4->Visible) { // Strength4 ?>
	<div id="r_Strength4" class="form-group row">
		<label id="elh_pres_tradenames_new_Strength4" for="x_Strength4" class="<?php echo $pres_tradenames_new_add->LeftColumnClass ?>"><script id="tpc_pres_tradenames_new_Strength4" class="pres_tradenames_newadd" type="text/html"><span><?php echo $pres_tradenames_new->Strength4->caption() ?><?php echo ($pres_tradenames_new->Strength4->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pres_tradenames_new_add->RightColumnClass ?>"><div<?php echo $pres_tradenames_new->Strength4->cellAttributes() ?>>
<script id="tpx_pres_tradenames_new_Strength4" class="pres_tradenames_newadd" type="text/html">
<span id="el_pres_tradenames_new_Strength4">
<input type="text" data-table="pres_tradenames_new" data-field="x_Strength4" name="x_Strength4" id="x_Strength4" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pres_tradenames_new->Strength4->getPlaceHolder()) ?>" value="<?php echo $pres_tradenames_new->Strength4->EditValue ?>"<?php echo $pres_tradenames_new->Strength4->editAttributes() ?>>
</span>
</script>
<?php echo $pres_tradenames_new->Strength4->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_tradenames_new->Strength5->Visible) { // Strength5 ?>
	<div id="r_Strength5" class="form-group row">
		<label id="elh_pres_tradenames_new_Strength5" for="x_Strength5" class="<?php echo $pres_tradenames_new_add->LeftColumnClass ?>"><script id="tpc_pres_tradenames_new_Strength5" class="pres_tradenames_newadd" type="text/html"><span><?php echo $pres_tradenames_new->Strength5->caption() ?><?php echo ($pres_tradenames_new->Strength5->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pres_tradenames_new_add->RightColumnClass ?>"><div<?php echo $pres_tradenames_new->Strength5->cellAttributes() ?>>
<script id="tpx_pres_tradenames_new_Strength5" class="pres_tradenames_newadd" type="text/html">
<span id="el_pres_tradenames_new_Strength5">
<input type="text" data-table="pres_tradenames_new" data-field="x_Strength5" name="x_Strength5" id="x_Strength5" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($pres_tradenames_new->Strength5->getPlaceHolder()) ?>" value="<?php echo $pres_tradenames_new->Strength5->EditValue ?>"<?php echo $pres_tradenames_new->Strength5->editAttributes() ?>>
</span>
</script>
<?php echo $pres_tradenames_new->Strength5->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_tradenames_new->Unit4->Visible) { // Unit4 ?>
	<div id="r_Unit4" class="form-group row">
		<label id="elh_pres_tradenames_new_Unit4" for="x_Unit4" class="<?php echo $pres_tradenames_new_add->LeftColumnClass ?>"><script id="tpc_pres_tradenames_new_Unit4" class="pres_tradenames_newadd" type="text/html"><span><?php echo $pres_tradenames_new->Unit4->caption() ?><?php echo ($pres_tradenames_new->Unit4->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pres_tradenames_new_add->RightColumnClass ?>"><div<?php echo $pres_tradenames_new->Unit4->cellAttributes() ?>>
<script id="tpx_pres_tradenames_new_Unit4" class="pres_tradenames_newadd" type="text/html">
<span id="el_pres_tradenames_new_Unit4">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pres_tradenames_new" data-field="x_Unit4" data-value-separator="<?php echo $pres_tradenames_new->Unit4->displayValueSeparatorAttribute() ?>" id="x_Unit4" name="x_Unit4"<?php echo $pres_tradenames_new->Unit4->editAttributes() ?>>
		<?php echo $pres_tradenames_new->Unit4->selectOptionListHtml("x_Unit4") ?>
	</select>
</div>
<?php echo $pres_tradenames_new->Unit4->Lookup->getParamTag("p_x_Unit4") ?>
</span>
</script>
<?php echo $pres_tradenames_new->Unit4->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_tradenames_new->Unit5->Visible) { // Unit5 ?>
	<div id="r_Unit5" class="form-group row">
		<label id="elh_pres_tradenames_new_Unit5" for="x_Unit5" class="<?php echo $pres_tradenames_new_add->LeftColumnClass ?>"><script id="tpc_pres_tradenames_new_Unit5" class="pres_tradenames_newadd" type="text/html"><span><?php echo $pres_tradenames_new->Unit5->caption() ?><?php echo ($pres_tradenames_new->Unit5->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pres_tradenames_new_add->RightColumnClass ?>"><div<?php echo $pres_tradenames_new->Unit5->cellAttributes() ?>>
<script id="tpx_pres_tradenames_new_Unit5" class="pres_tradenames_newadd" type="text/html">
<span id="el_pres_tradenames_new_Unit5">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="pres_tradenames_new" data-field="x_Unit5" data-value-separator="<?php echo $pres_tradenames_new->Unit5->displayValueSeparatorAttribute() ?>" id="x_Unit5" name="x_Unit5"<?php echo $pres_tradenames_new->Unit5->editAttributes() ?>>
		<?php echo $pres_tradenames_new->Unit5->selectOptionListHtml("x_Unit5") ?>
	</select>
</div>
<?php echo $pres_tradenames_new->Unit5->Lookup->getParamTag("p_x_Unit5") ?>
</span>
</script>
<?php echo $pres_tradenames_new->Unit5->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_tradenames_new->AlterNative1->Visible) { // AlterNative1 ?>
	<div id="r_AlterNative1" class="form-group row">
		<label id="elh_pres_tradenames_new_AlterNative1" for="x_AlterNative1" class="<?php echo $pres_tradenames_new_add->LeftColumnClass ?>"><script id="tpc_pres_tradenames_new_AlterNative1" class="pres_tradenames_newadd" type="text/html"><span><?php echo $pres_tradenames_new->AlterNative1->caption() ?><?php echo ($pres_tradenames_new->AlterNative1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pres_tradenames_new_add->RightColumnClass ?>"><div<?php echo $pres_tradenames_new->AlterNative1->cellAttributes() ?>>
<script id="tpx_pres_tradenames_new_AlterNative1" class="pres_tradenames_newadd" type="text/html">
<span id="el_pres_tradenames_new_AlterNative1">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_AlterNative1"><?php echo strval($pres_tradenames_new->AlterNative1->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pres_tradenames_new->AlterNative1->ViewValue) : $pres_tradenames_new->AlterNative1->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pres_tradenames_new->AlterNative1->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pres_tradenames_new->AlterNative1->ReadOnly || $pres_tradenames_new->AlterNative1->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_AlterNative1',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pres_tradenames_new->AlterNative1->Lookup->getParamTag("p_x_AlterNative1") ?>
<input type="hidden" data-table="pres_tradenames_new" data-field="x_AlterNative1" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pres_tradenames_new->AlterNative1->displayValueSeparatorAttribute() ?>" name="x_AlterNative1" id="x_AlterNative1" value="<?php echo $pres_tradenames_new->AlterNative1->CurrentValue ?>"<?php echo $pres_tradenames_new->AlterNative1->editAttributes() ?>>
</span>
</script>
<?php echo $pres_tradenames_new->AlterNative1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_tradenames_new->AlterNative2->Visible) { // AlterNative2 ?>
	<div id="r_AlterNative2" class="form-group row">
		<label id="elh_pres_tradenames_new_AlterNative2" for="x_AlterNative2" class="<?php echo $pres_tradenames_new_add->LeftColumnClass ?>"><script id="tpc_pres_tradenames_new_AlterNative2" class="pres_tradenames_newadd" type="text/html"><span><?php echo $pres_tradenames_new->AlterNative2->caption() ?><?php echo ($pres_tradenames_new->AlterNative2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pres_tradenames_new_add->RightColumnClass ?>"><div<?php echo $pres_tradenames_new->AlterNative2->cellAttributes() ?>>
<script id="tpx_pres_tradenames_new_AlterNative2" class="pres_tradenames_newadd" type="text/html">
<span id="el_pres_tradenames_new_AlterNative2">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_AlterNative2"><?php echo strval($pres_tradenames_new->AlterNative2->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pres_tradenames_new->AlterNative2->ViewValue) : $pres_tradenames_new->AlterNative2->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pres_tradenames_new->AlterNative2->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pres_tradenames_new->AlterNative2->ReadOnly || $pres_tradenames_new->AlterNative2->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_AlterNative2',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pres_tradenames_new->AlterNative2->Lookup->getParamTag("p_x_AlterNative2") ?>
<input type="hidden" data-table="pres_tradenames_new" data-field="x_AlterNative2" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pres_tradenames_new->AlterNative2->displayValueSeparatorAttribute() ?>" name="x_AlterNative2" id="x_AlterNative2" value="<?php echo $pres_tradenames_new->AlterNative2->CurrentValue ?>"<?php echo $pres_tradenames_new->AlterNative2->editAttributes() ?>>
</span>
</script>
<?php echo $pres_tradenames_new->AlterNative2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_tradenames_new->AlterNative3->Visible) { // AlterNative3 ?>
	<div id="r_AlterNative3" class="form-group row">
		<label id="elh_pres_tradenames_new_AlterNative3" for="x_AlterNative3" class="<?php echo $pres_tradenames_new_add->LeftColumnClass ?>"><script id="tpc_pres_tradenames_new_AlterNative3" class="pres_tradenames_newadd" type="text/html"><span><?php echo $pres_tradenames_new->AlterNative3->caption() ?><?php echo ($pres_tradenames_new->AlterNative3->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pres_tradenames_new_add->RightColumnClass ?>"><div<?php echo $pres_tradenames_new->AlterNative3->cellAttributes() ?>>
<script id="tpx_pres_tradenames_new_AlterNative3" class="pres_tradenames_newadd" type="text/html">
<span id="el_pres_tradenames_new_AlterNative3">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_AlterNative3"><?php echo strval($pres_tradenames_new->AlterNative3->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pres_tradenames_new->AlterNative3->ViewValue) : $pres_tradenames_new->AlterNative3->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pres_tradenames_new->AlterNative3->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pres_tradenames_new->AlterNative3->ReadOnly || $pres_tradenames_new->AlterNative3->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_AlterNative3',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pres_tradenames_new->AlterNative3->Lookup->getParamTag("p_x_AlterNative3") ?>
<input type="hidden" data-table="pres_tradenames_new" data-field="x_AlterNative3" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pres_tradenames_new->AlterNative3->displayValueSeparatorAttribute() ?>" name="x_AlterNative3" id="x_AlterNative3" value="<?php echo $pres_tradenames_new->AlterNative3->CurrentValue ?>"<?php echo $pres_tradenames_new->AlterNative3->editAttributes() ?>>
</span>
</script>
<?php echo $pres_tradenames_new->AlterNative3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_tradenames_new->AlterNative4->Visible) { // AlterNative4 ?>
	<div id="r_AlterNative4" class="form-group row">
		<label id="elh_pres_tradenames_new_AlterNative4" for="x_AlterNative4" class="<?php echo $pres_tradenames_new_add->LeftColumnClass ?>"><script id="tpc_pres_tradenames_new_AlterNative4" class="pres_tradenames_newadd" type="text/html"><span><?php echo $pres_tradenames_new->AlterNative4->caption() ?><?php echo ($pres_tradenames_new->AlterNative4->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $pres_tradenames_new_add->RightColumnClass ?>"><div<?php echo $pres_tradenames_new->AlterNative4->cellAttributes() ?>>
<script id="tpx_pres_tradenames_new_AlterNative4" class="pres_tradenames_newadd" type="text/html">
<span id="el_pres_tradenames_new_AlterNative4">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_AlterNative4"><?php echo strval($pres_tradenames_new->AlterNative4->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($pres_tradenames_new->AlterNative4->ViewValue) : $pres_tradenames_new->AlterNative4->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($pres_tradenames_new->AlterNative4->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($pres_tradenames_new->AlterNative4->ReadOnly || $pres_tradenames_new->AlterNative4->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_AlterNative4',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $pres_tradenames_new->AlterNative4->Lookup->getParamTag("p_x_AlterNative4") ?>
<input type="hidden" data-table="pres_tradenames_new" data-field="x_AlterNative4" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $pres_tradenames_new->AlterNative4->displayValueSeparatorAttribute() ?>" name="x_AlterNative4" id="x_AlterNative4" value="<?php echo $pres_tradenames_new->AlterNative4->CurrentValue ?>"<?php echo $pres_tradenames_new->AlterNative4->editAttributes() ?>>
</span>
</script>
<?php echo $pres_tradenames_new->AlterNative4->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_pres_tradenames_newadd" class="ew-custom-template"></div>
<script id="tpm_pres_tradenames_newadd" type="text/html">
<div id="ct_pres_tradenames_new_add"><style>
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
<h3 class="card-title">Products Entry Form</h3>
<div class="row">
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Products</h3>
			</div>
			<div class="card-body">
				 <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pres_tradenames_new_ProductType"/}}&nbsp;{{include tmpl="#tpx_pres_tradenames_new_ProductType"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pres_tradenames_new_PR_CODE"/}}&nbsp;{{include tmpl="#tpx_pres_tradenames_new_PR_CODE"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pres_tradenames_new_Trade_Name"/}}&nbsp;{{include tmpl="#tpx_pres_tradenames_new_Trade_Name"/}}</span>
				  </div>
				 <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pres_tradenames_new_CONTAINER_TYPE"/}}&nbsp;{{include tmpl="#tpx_pres_tradenames_new_CONTAINER_TYPE"/}}</span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
	<div id="DrugDetails" class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Drug Details</h3>
			</div>
			<div class="card-body">
				<div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pres_tradenames_new_Drug_Name"/}}&nbsp;{{include tmpl="#tpx_pres_tradenames_new_Drug_Name"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pres_tradenames_new_Form"/}}&nbsp;{{include tmpl="#tpx_pres_tradenames_new_Form"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pres_tradenames_new_TypeOfDrug"/}}&nbsp;{{include tmpl="#tpx_pres_tradenames_new_TypeOfDrug"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pres_tradenames_new_CONTAINER_STRENGTH"/}}&nbsp;{{include tmpl="#tpx_pres_tradenames_new_CONTAINER_STRENGTH"/}}</span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>				
	</div>
</div>
<div class="row">
	<div id="Combination1" class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Combination 1</h3>
			</div>
			<div class="card-body">
				<div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pres_tradenames_new_Generic_Name"/}}&nbsp;{{include tmpl="#tpx_pres_tradenames_new_Generic_Name"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pres_tradenames_new_Strength"/}}&nbsp;{{include tmpl="#tpx_pres_tradenames_new_Strength"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pres_tradenames_new_Unit"/}}&nbsp;{{include tmpl="#tpx_pres_tradenames_new_Unit"/}}</span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
	<div id="Combination2" class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Combination 2</h3>
			</div>
			<div class="card-body">
				<div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pres_tradenames_new_Generic_Name1"/}}&nbsp;{{include tmpl="#tpx_pres_tradenames_new_Generic_Name1"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pres_tradenames_new_Strength1"/}}&nbsp;{{include tmpl="#tpx_pres_tradenames_new_Strength1"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pres_tradenames_new_Unit1"/}}&nbsp;{{include tmpl="#tpx_pres_tradenames_new_Unit1"/}}</span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>				
	</div>
</div>
<div class="row">
	<div id="Combination3" class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Combination 3</h3>
			</div>
			<div class="card-body">
				<div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pres_tradenames_new_Generic_Name2"/}}&nbsp;{{include tmpl="#tpx_pres_tradenames_new_Generic_Name2"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pres_tradenames_new_Strength2"/}}&nbsp;{{include tmpl="#tpx_pres_tradenames_new_Strength2"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pres_tradenames_new_Unit2"/}}&nbsp;{{include tmpl="#tpx_pres_tradenames_new_Unit2"/}}</span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
	<div id="Combination4" class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Combination 4</h3>
			</div>
			<div class="card-body">
				<div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pres_tradenames_new_Generic_Name3"/}}&nbsp;{{include tmpl="#tpx_pres_tradenames_new_Generic_Name3"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pres_tradenames_new_Strength3"/}}&nbsp;{{include tmpl="#tpx_pres_tradenames_new_Strength3"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pres_tradenames_new_Unit3"/}}&nbsp;{{include tmpl="#tpx_pres_tradenames_new_Unit3"/}}</span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>				
	</div>
</div>
<div class="row">
	<div id="Combination5" class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Combination 5</h3>
			</div>
			<div class="card-body">
				<div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pres_tradenames_new_Generic_Name4"/}}&nbsp;{{include tmpl="#tpx_pres_tradenames_new_Generic_Name4"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pres_tradenames_new_Strength4"/}}&nbsp;{{include tmpl="#tpx_pres_tradenames_new_Strength4"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pres_tradenames_new_Unit4"/}}&nbsp;{{include tmpl="#tpx_pres_tradenames_new_Unit4"/}}</span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
	<div id="Combination6" class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Combination 6</h3>
			</div>
			<div class="card-body">
				<div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pres_tradenames_new_Generic_Name5"/}}&nbsp;{{include tmpl="#tpx_pres_tradenames_new_Generic_Name5"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pres_tradenames_new_Strength5"/}}&nbsp;{{include tmpl="#tpx_pres_tradenames_new_Strength5"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_pres_tradenames_new_Unit5"/}}&nbsp;{{include tmpl="#tpx_pres_tradenames_new_Unit5"/}}</span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>				
	</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Alter Native Items</h3>
			</div>
			<div class="card-body">
			<table class="ew-table">
				<tbody>
					<tr><td>{{include tmpl="#tpc_pres_tradenames_new_AlterNative1"/}}&nbsp;{{include tmpl="#tpx_pres_tradenames_new_AlterNative1"/}}</td><td>{{include tmpl="#tpc_pres_tradenames_new_AlterNative2"/}}&nbsp;{{include tmpl="#tpx_pres_tradenames_new_AlterNative2"/}}</td></tr>
					<tr><td>{{include tmpl="#tpc_pres_tradenames_new_AlterNative3"/}}&nbsp;{{include tmpl="#tpx_pres_tradenames_new_AlterNative3"/}}</td><td>{{include tmpl="#tpc_pres_tradenames_new_AlterNative4"/}}&nbsp;{{include tmpl="#tpx_pres_tradenames_new_AlterNative4"/}}</td></tr>
				</tbody>
			</table>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
</div>
</script>
<?php
	if (in_array("pres_trade_combination_names_new", explode(",", $pres_tradenames_new->getCurrentDetailTable())) && $pres_trade_combination_names_new->DetailAdd) {
?>
<?php if ($pres_tradenames_new->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("pres_trade_combination_names_new", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "pres_trade_combination_names_newgrid.php" ?>
<?php } ?>
<?php if (!$pres_tradenames_new_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $pres_tradenames_new_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pres_tradenames_new_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($pres_tradenames_new->Rows) ?> };
ew.applyTemplate("tpd_pres_tradenames_newadd", "tpm_pres_tradenames_newadd", "pres_tradenames_newadd", "<?php echo $pres_tradenames_new->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.pres_tradenames_newadd_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$pres_tradenames_new_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

			document.getElementById("Combination1").style.display = "none";
				document.getElementById("Combination2").style.display = "none";
				document.getElementById("Combination3").style.display = "none";
				document.getElementById("Combination4").style.display = "none";
				document.getElementById("Combination5").style.display = "none";
				document.getElementById("Combination6").style.display = "none";
</script>
<?php include_once "footer.php" ?>
<?php
$pres_tradenames_new_add->terminate();
?>