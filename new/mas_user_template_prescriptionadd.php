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
$mas_user_template_prescription_add = new mas_user_template_prescription_add();

// Run the page
$mas_user_template_prescription_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_user_template_prescription_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fmas_user_template_prescriptionadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fmas_user_template_prescriptionadd = currentForm = new ew.Form("fmas_user_template_prescriptionadd", "add");

	// Validate form
	fmas_user_template_prescriptionadd.validate = function() {
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
			<?php if ($mas_user_template_prescription_add->TemplateName->Required) { ?>
				elm = this.getElements("x" + infix + "_TemplateName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_user_template_prescription_add->TemplateName->caption(), $mas_user_template_prescription_add->TemplateName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_user_template_prescription_add->Medicine->Required) { ?>
				elm = this.getElements("x" + infix + "_Medicine");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_user_template_prescription_add->Medicine->caption(), $mas_user_template_prescription_add->Medicine->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_user_template_prescription_add->M->Required) { ?>
				elm = this.getElements("x" + infix + "_M");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_user_template_prescription_add->M->caption(), $mas_user_template_prescription_add->M->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_user_template_prescription_add->A->Required) { ?>
				elm = this.getElements("x" + infix + "_A");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_user_template_prescription_add->A->caption(), $mas_user_template_prescription_add->A->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_user_template_prescription_add->N->Required) { ?>
				elm = this.getElements("x" + infix + "_N");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_user_template_prescription_add->N->caption(), $mas_user_template_prescription_add->N->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_user_template_prescription_add->NoOfDays->Required) { ?>
				elm = this.getElements("x" + infix + "_NoOfDays");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_user_template_prescription_add->NoOfDays->caption(), $mas_user_template_prescription_add->NoOfDays->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_user_template_prescription_add->PreRoute->Required) { ?>
				elm = this.getElements("x" + infix + "_PreRoute");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_user_template_prescription_add->PreRoute->caption(), $mas_user_template_prescription_add->PreRoute->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_user_template_prescription_add->TimeOfTaking->Required) { ?>
				elm = this.getElements("x" + infix + "_TimeOfTaking");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_user_template_prescription_add->TimeOfTaking->caption(), $mas_user_template_prescription_add->TimeOfTaking->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_user_template_prescription_add->CreatedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_CreatedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_user_template_prescription_add->CreatedBy->caption(), $mas_user_template_prescription_add->CreatedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_user_template_prescription_add->CreateDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_CreateDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_user_template_prescription_add->CreateDateTime->caption(), $mas_user_template_prescription_add->CreateDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_user_template_prescription_add->ModifiedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_ModifiedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_user_template_prescription_add->ModifiedBy->caption(), $mas_user_template_prescription_add->ModifiedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_user_template_prescription_add->ModifiedDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_ModifiedDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_user_template_prescription_add->ModifiedDateTime->caption(), $mas_user_template_prescription_add->ModifiedDateTime->RequiredErrorMessage)) ?>");
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
	fmas_user_template_prescriptionadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fmas_user_template_prescriptionadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fmas_user_template_prescriptionadd.lists["x_TemplateName"] = <?php echo $mas_user_template_prescription_add->TemplateName->Lookup->toClientList($mas_user_template_prescription_add) ?>;
	fmas_user_template_prescriptionadd.lists["x_TemplateName"].options = <?php echo JsonEncode($mas_user_template_prescription_add->TemplateName->lookupOptions()) ?>;
	fmas_user_template_prescriptionadd.lists["x_Medicine"] = <?php echo $mas_user_template_prescription_add->Medicine->Lookup->toClientList($mas_user_template_prescription_add) ?>;
	fmas_user_template_prescriptionadd.lists["x_Medicine"].options = <?php echo JsonEncode($mas_user_template_prescription_add->Medicine->lookupOptions()) ?>;
	fmas_user_template_prescriptionadd.autoSuggests["x_Medicine"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fmas_user_template_prescriptionadd.lists["x_PreRoute"] = <?php echo $mas_user_template_prescription_add->PreRoute->Lookup->toClientList($mas_user_template_prescription_add) ?>;
	fmas_user_template_prescriptionadd.lists["x_PreRoute"].options = <?php echo JsonEncode($mas_user_template_prescription_add->PreRoute->lookupOptions()) ?>;
	fmas_user_template_prescriptionadd.autoSuggests["x_PreRoute"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fmas_user_template_prescriptionadd.lists["x_TimeOfTaking"] = <?php echo $mas_user_template_prescription_add->TimeOfTaking->Lookup->toClientList($mas_user_template_prescription_add) ?>;
	fmas_user_template_prescriptionadd.lists["x_TimeOfTaking"].options = <?php echo JsonEncode($mas_user_template_prescription_add->TimeOfTaking->lookupOptions()) ?>;
	fmas_user_template_prescriptionadd.autoSuggests["x_TimeOfTaking"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	loadjs.done("fmas_user_template_prescriptionadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $mas_user_template_prescription_add->showPageHeader(); ?>
<?php
$mas_user_template_prescription_add->showMessage();
?>
<form name="fmas_user_template_prescriptionadd" id="fmas_user_template_prescriptionadd" class="<?php echo $mas_user_template_prescription_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_user_template_prescription">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$mas_user_template_prescription_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($mas_user_template_prescription_add->TemplateName->Visible) { // TemplateName ?>
	<div id="r_TemplateName" class="form-group row">
		<label id="elh_mas_user_template_prescription_TemplateName" for="x_TemplateName" class="<?php echo $mas_user_template_prescription_add->LeftColumnClass ?>"><?php echo $mas_user_template_prescription_add->TemplateName->caption() ?><?php echo $mas_user_template_prescription_add->TemplateName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_user_template_prescription_add->RightColumnClass ?>"><div <?php echo $mas_user_template_prescription_add->TemplateName->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_TemplateName">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="mas_user_template_prescription" data-field="x_TemplateName" data-value-separator="<?php echo $mas_user_template_prescription_add->TemplateName->displayValueSeparatorAttribute() ?>" id="x_TemplateName" name="x_TemplateName"<?php echo $mas_user_template_prescription_add->TemplateName->editAttributes() ?>>
			<?php echo $mas_user_template_prescription_add->TemplateName->selectOptionListHtml("x_TemplateName") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "mas_template_prescription_type") && !$mas_user_template_prescription_add->TemplateName->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplateName" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $mas_user_template_prescription_add->TemplateName->caption() ?>" data-title="<?php echo $mas_user_template_prescription_add->TemplateName->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplateName',url:'mas_template_prescription_typeaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $mas_user_template_prescription_add->TemplateName->Lookup->getParamTag($mas_user_template_prescription_add, "p_x_TemplateName") ?>
</span>
<?php echo $mas_user_template_prescription_add->TemplateName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_user_template_prescription_add->Medicine->Visible) { // Medicine ?>
	<div id="r_Medicine" class="form-group row">
		<label id="elh_mas_user_template_prescription_Medicine" class="<?php echo $mas_user_template_prescription_add->LeftColumnClass ?>"><?php echo $mas_user_template_prescription_add->Medicine->caption() ?><?php echo $mas_user_template_prescription_add->Medicine->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_user_template_prescription_add->RightColumnClass ?>"><div <?php echo $mas_user_template_prescription_add->Medicine->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_Medicine">
<?php
$onchange = $mas_user_template_prescription_add->Medicine->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$mas_user_template_prescription_add->Medicine->EditAttrs["onchange"] = "";
?>
<span id="as_x_Medicine">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x_Medicine" id="sv_x_Medicine" value="<?php echo RemoveHtml($mas_user_template_prescription_add->Medicine->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_user_template_prescription_add->Medicine->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($mas_user_template_prescription_add->Medicine->getPlaceHolder()) ?>"<?php echo $mas_user_template_prescription_add->Medicine->editAttributes() ?>>
		<div class="input-group-append">
			<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($mas_user_template_prescription_add->Medicine->caption()), $Language->phrase("LookupLink", TRUE))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x_Medicine',m:0,n:10,srch:false});" class="ew-lookup-btn btn btn-default"<?php echo ($mas_user_template_prescription_add->Medicine->ReadOnly || $mas_user_template_prescription_add->Medicine->Disabled) ? " disabled" : "" ?>><i class="fas fa-search ew-icon"></i></button>
			<?php if (AllowAdd(CurrentProjectID() . "pres_tradenames_new") && !$mas_user_template_prescription_add->Medicine->ReadOnly) { ?>
			<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_Medicine" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $mas_user_template_prescription_add->Medicine->caption() ?>" data-title="<?php echo $mas_user_template_prescription_add->Medicine->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_Medicine',url:'pres_tradenames_newaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button>
			<?php } ?>
		</div>
	</div>
</span>
<input type="hidden" data-table="mas_user_template_prescription" data-field="x_Medicine" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $mas_user_template_prescription_add->Medicine->displayValueSeparatorAttribute() ?>" name="x_Medicine" id="x_Medicine" value="<?php echo HtmlEncode($mas_user_template_prescription_add->Medicine->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fmas_user_template_prescriptionadd"], function() {
	fmas_user_template_prescriptionadd.createAutoSuggest({"id":"x_Medicine","forceSelect":true});
});
</script>
<?php echo $mas_user_template_prescription_add->Medicine->Lookup->getParamTag($mas_user_template_prescription_add, "p_x_Medicine") ?>
</span>
<?php echo $mas_user_template_prescription_add->Medicine->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_user_template_prescription_add->M->Visible) { // M ?>
	<div id="r_M" class="form-group row">
		<label id="elh_mas_user_template_prescription_M" for="x_M" class="<?php echo $mas_user_template_prescription_add->LeftColumnClass ?>"><?php echo $mas_user_template_prescription_add->M->caption() ?><?php echo $mas_user_template_prescription_add->M->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_user_template_prescription_add->RightColumnClass ?>"><div <?php echo $mas_user_template_prescription_add->M->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_M">
<input type="text" data-table="mas_user_template_prescription" data-field="x_M" name="x_M" id="x_M" size="2" maxlength="3" placeholder="<?php echo HtmlEncode($mas_user_template_prescription_add->M->getPlaceHolder()) ?>" value="<?php echo $mas_user_template_prescription_add->M->EditValue ?>"<?php echo $mas_user_template_prescription_add->M->editAttributes() ?>>
</span>
<?php echo $mas_user_template_prescription_add->M->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_user_template_prescription_add->A->Visible) { // A ?>
	<div id="r_A" class="form-group row">
		<label id="elh_mas_user_template_prescription_A" for="x_A" class="<?php echo $mas_user_template_prescription_add->LeftColumnClass ?>"><?php echo $mas_user_template_prescription_add->A->caption() ?><?php echo $mas_user_template_prescription_add->A->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_user_template_prescription_add->RightColumnClass ?>"><div <?php echo $mas_user_template_prescription_add->A->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_A">
<input type="text" data-table="mas_user_template_prescription" data-field="x_A" name="x_A" id="x_A" size="2" maxlength="3" placeholder="<?php echo HtmlEncode($mas_user_template_prescription_add->A->getPlaceHolder()) ?>" value="<?php echo $mas_user_template_prescription_add->A->EditValue ?>"<?php echo $mas_user_template_prescription_add->A->editAttributes() ?>>
</span>
<?php echo $mas_user_template_prescription_add->A->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_user_template_prescription_add->N->Visible) { // N ?>
	<div id="r_N" class="form-group row">
		<label id="elh_mas_user_template_prescription_N" for="x_N" class="<?php echo $mas_user_template_prescription_add->LeftColumnClass ?>"><?php echo $mas_user_template_prescription_add->N->caption() ?><?php echo $mas_user_template_prescription_add->N->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_user_template_prescription_add->RightColumnClass ?>"><div <?php echo $mas_user_template_prescription_add->N->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_N">
<input type="text" data-table="mas_user_template_prescription" data-field="x_N" name="x_N" id="x_N" size="2" maxlength="3" placeholder="<?php echo HtmlEncode($mas_user_template_prescription_add->N->getPlaceHolder()) ?>" value="<?php echo $mas_user_template_prescription_add->N->EditValue ?>"<?php echo $mas_user_template_prescription_add->N->editAttributes() ?>>
</span>
<?php echo $mas_user_template_prescription_add->N->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_user_template_prescription_add->NoOfDays->Visible) { // NoOfDays ?>
	<div id="r_NoOfDays" class="form-group row">
		<label id="elh_mas_user_template_prescription_NoOfDays" for="x_NoOfDays" class="<?php echo $mas_user_template_prescription_add->LeftColumnClass ?>"><?php echo $mas_user_template_prescription_add->NoOfDays->caption() ?><?php echo $mas_user_template_prescription_add->NoOfDays->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_user_template_prescription_add->RightColumnClass ?>"><div <?php echo $mas_user_template_prescription_add->NoOfDays->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_NoOfDays">
<input type="text" data-table="mas_user_template_prescription" data-field="x_NoOfDays" name="x_NoOfDays" id="x_NoOfDays" size="5" maxlength="10" placeholder="<?php echo HtmlEncode($mas_user_template_prescription_add->NoOfDays->getPlaceHolder()) ?>" value="<?php echo $mas_user_template_prescription_add->NoOfDays->EditValue ?>"<?php echo $mas_user_template_prescription_add->NoOfDays->editAttributes() ?>>
</span>
<?php echo $mas_user_template_prescription_add->NoOfDays->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_user_template_prescription_add->PreRoute->Visible) { // PreRoute ?>
	<div id="r_PreRoute" class="form-group row">
		<label id="elh_mas_user_template_prescription_PreRoute" class="<?php echo $mas_user_template_prescription_add->LeftColumnClass ?>"><?php echo $mas_user_template_prescription_add->PreRoute->caption() ?><?php echo $mas_user_template_prescription_add->PreRoute->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_user_template_prescription_add->RightColumnClass ?>"><div <?php echo $mas_user_template_prescription_add->PreRoute->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_PreRoute">
<?php
$onchange = $mas_user_template_prescription_add->PreRoute->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$mas_user_template_prescription_add->PreRoute->EditAttrs["onchange"] = "";
?>
<span id="as_x_PreRoute">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x_PreRoute" id="sv_x_PreRoute" value="<?php echo RemoveHtml($mas_user_template_prescription_add->PreRoute->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($mas_user_template_prescription_add->PreRoute->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($mas_user_template_prescription_add->PreRoute->getPlaceHolder()) ?>"<?php echo $mas_user_template_prescription_add->PreRoute->editAttributes() ?>>
		<div class="input-group-append">
			<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($mas_user_template_prescription_add->PreRoute->caption()), $Language->phrase("LookupLink", TRUE))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x_PreRoute',m:0,n:10,srch:true});" class="ew-lookup-btn btn btn-default"<?php echo ($mas_user_template_prescription_add->PreRoute->ReadOnly || $mas_user_template_prescription_add->PreRoute->Disabled) ? " disabled" : "" ?>><i class="fas fa-search ew-icon"></i></button>
			<?php if (AllowAdd(CurrentProjectID() . "pres_mas_route") && !$mas_user_template_prescription_add->PreRoute->ReadOnly) { ?>
			<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_PreRoute" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $mas_user_template_prescription_add->PreRoute->caption() ?>" data-title="<?php echo $mas_user_template_prescription_add->PreRoute->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_PreRoute',url:'pres_mas_routeaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button>
			<?php } ?>
		</div>
	</div>
</span>
<input type="hidden" data-table="mas_user_template_prescription" data-field="x_PreRoute" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $mas_user_template_prescription_add->PreRoute->displayValueSeparatorAttribute() ?>" name="x_PreRoute" id="x_PreRoute" value="<?php echo HtmlEncode($mas_user_template_prescription_add->PreRoute->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fmas_user_template_prescriptionadd"], function() {
	fmas_user_template_prescriptionadd.createAutoSuggest({"id":"x_PreRoute","forceSelect":false});
});
</script>
<?php echo $mas_user_template_prescription_add->PreRoute->Lookup->getParamTag($mas_user_template_prescription_add, "p_x_PreRoute") ?>
</span>
<?php echo $mas_user_template_prescription_add->PreRoute->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_user_template_prescription_add->TimeOfTaking->Visible) { // TimeOfTaking ?>
	<div id="r_TimeOfTaking" class="form-group row">
		<label id="elh_mas_user_template_prescription_TimeOfTaking" class="<?php echo $mas_user_template_prescription_add->LeftColumnClass ?>"><?php echo $mas_user_template_prescription_add->TimeOfTaking->caption() ?><?php echo $mas_user_template_prescription_add->TimeOfTaking->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_user_template_prescription_add->RightColumnClass ?>"><div <?php echo $mas_user_template_prescription_add->TimeOfTaking->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_TimeOfTaking">
<?php
$onchange = $mas_user_template_prescription_add->TimeOfTaking->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$mas_user_template_prescription_add->TimeOfTaking->EditAttrs["onchange"] = "";
?>
<span id="as_x_TimeOfTaking">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x_TimeOfTaking" id="sv_x_TimeOfTaking" value="<?php echo RemoveHtml($mas_user_template_prescription_add->TimeOfTaking->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($mas_user_template_prescription_add->TimeOfTaking->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($mas_user_template_prescription_add->TimeOfTaking->getPlaceHolder()) ?>"<?php echo $mas_user_template_prescription_add->TimeOfTaking->editAttributes() ?>>
		<?php if (AllowAdd(CurrentProjectID() . "pres_mas_timeoftaking") && !$mas_user_template_prescription_add->TimeOfTaking->ReadOnly) { ?>
		<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TimeOfTaking" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $mas_user_template_prescription_add->TimeOfTaking->caption() ?>" data-title="<?php echo $mas_user_template_prescription_add->TimeOfTaking->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TimeOfTaking',url:'pres_mas_timeoftakingaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
		<?php } ?>
	</div>
</span>
<input type="hidden" data-table="mas_user_template_prescription" data-field="x_TimeOfTaking" data-value-separator="<?php echo $mas_user_template_prescription_add->TimeOfTaking->displayValueSeparatorAttribute() ?>" name="x_TimeOfTaking" id="x_TimeOfTaking" value="<?php echo HtmlEncode($mas_user_template_prescription_add->TimeOfTaking->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fmas_user_template_prescriptionadd"], function() {
	fmas_user_template_prescriptionadd.createAutoSuggest({"id":"x_TimeOfTaking","forceSelect":false});
});
</script>
<?php echo $mas_user_template_prescription_add->TimeOfTaking->Lookup->getParamTag($mas_user_template_prescription_add, "p_x_TimeOfTaking") ?>
</span>
<?php echo $mas_user_template_prescription_add->TimeOfTaking->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$mas_user_template_prescription_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $mas_user_template_prescription_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $mas_user_template_prescription_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$mas_user_template_prescription_add->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php include_once "footer.php"; ?>
<?php
$mas_user_template_prescription_add->terminate();
?>