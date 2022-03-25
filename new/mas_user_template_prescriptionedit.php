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
$mas_user_template_prescription_edit = new mas_user_template_prescription_edit();

// Run the page
$mas_user_template_prescription_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_user_template_prescription_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fmas_user_template_prescriptionedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fmas_user_template_prescriptionedit = currentForm = new ew.Form("fmas_user_template_prescriptionedit", "edit");

	// Validate form
	fmas_user_template_prescriptionedit.validate = function() {
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
			<?php if ($mas_user_template_prescription_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_user_template_prescription_edit->id->caption(), $mas_user_template_prescription_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_user_template_prescription_edit->TemplateName->Required) { ?>
				elm = this.getElements("x" + infix + "_TemplateName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_user_template_prescription_edit->TemplateName->caption(), $mas_user_template_prescription_edit->TemplateName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_user_template_prescription_edit->Medicine->Required) { ?>
				elm = this.getElements("x" + infix + "_Medicine");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_user_template_prescription_edit->Medicine->caption(), $mas_user_template_prescription_edit->Medicine->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_user_template_prescription_edit->M->Required) { ?>
				elm = this.getElements("x" + infix + "_M");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_user_template_prescription_edit->M->caption(), $mas_user_template_prescription_edit->M->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_user_template_prescription_edit->A->Required) { ?>
				elm = this.getElements("x" + infix + "_A");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_user_template_prescription_edit->A->caption(), $mas_user_template_prescription_edit->A->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_user_template_prescription_edit->N->Required) { ?>
				elm = this.getElements("x" + infix + "_N");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_user_template_prescription_edit->N->caption(), $mas_user_template_prescription_edit->N->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_user_template_prescription_edit->NoOfDays->Required) { ?>
				elm = this.getElements("x" + infix + "_NoOfDays");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_user_template_prescription_edit->NoOfDays->caption(), $mas_user_template_prescription_edit->NoOfDays->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_user_template_prescription_edit->PreRoute->Required) { ?>
				elm = this.getElements("x" + infix + "_PreRoute");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_user_template_prescription_edit->PreRoute->caption(), $mas_user_template_prescription_edit->PreRoute->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_user_template_prescription_edit->TimeOfTaking->Required) { ?>
				elm = this.getElements("x" + infix + "_TimeOfTaking");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_user_template_prescription_edit->TimeOfTaking->caption(), $mas_user_template_prescription_edit->TimeOfTaking->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_user_template_prescription_edit->Status->Required) { ?>
				elm = this.getElements("x" + infix + "_Status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_user_template_prescription_edit->Status->caption(), $mas_user_template_prescription_edit->Status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_user_template_prescription_edit->CreatedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_CreatedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_user_template_prescription_edit->CreatedBy->caption(), $mas_user_template_prescription_edit->CreatedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_user_template_prescription_edit->CreateDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_CreateDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_user_template_prescription_edit->CreateDateTime->caption(), $mas_user_template_prescription_edit->CreateDateTime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_user_template_prescription_edit->ModifiedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_ModifiedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_user_template_prescription_edit->ModifiedBy->caption(), $mas_user_template_prescription_edit->ModifiedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($mas_user_template_prescription_edit->ModifiedDateTime->Required) { ?>
				elm = this.getElements("x" + infix + "_ModifiedDateTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_user_template_prescription_edit->ModifiedDateTime->caption(), $mas_user_template_prescription_edit->ModifiedDateTime->RequiredErrorMessage)) ?>");
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
	fmas_user_template_prescriptionedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fmas_user_template_prescriptionedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fmas_user_template_prescriptionedit.lists["x_TemplateName"] = <?php echo $mas_user_template_prescription_edit->TemplateName->Lookup->toClientList($mas_user_template_prescription_edit) ?>;
	fmas_user_template_prescriptionedit.lists["x_TemplateName"].options = <?php echo JsonEncode($mas_user_template_prescription_edit->TemplateName->lookupOptions()) ?>;
	fmas_user_template_prescriptionedit.lists["x_Medicine"] = <?php echo $mas_user_template_prescription_edit->Medicine->Lookup->toClientList($mas_user_template_prescription_edit) ?>;
	fmas_user_template_prescriptionedit.lists["x_Medicine"].options = <?php echo JsonEncode($mas_user_template_prescription_edit->Medicine->lookupOptions()) ?>;
	fmas_user_template_prescriptionedit.autoSuggests["x_Medicine"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fmas_user_template_prescriptionedit.lists["x_PreRoute"] = <?php echo $mas_user_template_prescription_edit->PreRoute->Lookup->toClientList($mas_user_template_prescription_edit) ?>;
	fmas_user_template_prescriptionedit.lists["x_PreRoute"].options = <?php echo JsonEncode($mas_user_template_prescription_edit->PreRoute->lookupOptions()) ?>;
	fmas_user_template_prescriptionedit.autoSuggests["x_PreRoute"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fmas_user_template_prescriptionedit.lists["x_TimeOfTaking"] = <?php echo $mas_user_template_prescription_edit->TimeOfTaking->Lookup->toClientList($mas_user_template_prescription_edit) ?>;
	fmas_user_template_prescriptionedit.lists["x_TimeOfTaking"].options = <?php echo JsonEncode($mas_user_template_prescription_edit->TimeOfTaking->lookupOptions()) ?>;
	fmas_user_template_prescriptionedit.autoSuggests["x_TimeOfTaking"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	loadjs.done("fmas_user_template_prescriptionedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $mas_user_template_prescription_edit->showPageHeader(); ?>
<?php
$mas_user_template_prescription_edit->showMessage();
?>
<form name="fmas_user_template_prescriptionedit" id="fmas_user_template_prescriptionedit" class="<?php echo $mas_user_template_prescription_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_user_template_prescription">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$mas_user_template_prescription_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($mas_user_template_prescription_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_mas_user_template_prescription_id" class="<?php echo $mas_user_template_prescription_edit->LeftColumnClass ?>"><?php echo $mas_user_template_prescription_edit->id->caption() ?><?php echo $mas_user_template_prescription_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_user_template_prescription_edit->RightColumnClass ?>"><div <?php echo $mas_user_template_prescription_edit->id->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_id">
<span<?php echo $mas_user_template_prescription_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($mas_user_template_prescription_edit->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="mas_user_template_prescription" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($mas_user_template_prescription_edit->id->CurrentValue) ?>">
<?php echo $mas_user_template_prescription_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_user_template_prescription_edit->TemplateName->Visible) { // TemplateName ?>
	<div id="r_TemplateName" class="form-group row">
		<label id="elh_mas_user_template_prescription_TemplateName" for="x_TemplateName" class="<?php echo $mas_user_template_prescription_edit->LeftColumnClass ?>"><?php echo $mas_user_template_prescription_edit->TemplateName->caption() ?><?php echo $mas_user_template_prescription_edit->TemplateName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_user_template_prescription_edit->RightColumnClass ?>"><div <?php echo $mas_user_template_prescription_edit->TemplateName->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_TemplateName">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="mas_user_template_prescription" data-field="x_TemplateName" data-value-separator="<?php echo $mas_user_template_prescription_edit->TemplateName->displayValueSeparatorAttribute() ?>" id="x_TemplateName" name="x_TemplateName"<?php echo $mas_user_template_prescription_edit->TemplateName->editAttributes() ?>>
			<?php echo $mas_user_template_prescription_edit->TemplateName->selectOptionListHtml("x_TemplateName") ?>
		</select>
	<?php if (AllowAdd(CurrentProjectID() . "mas_template_prescription_type") && !$mas_user_template_prescription_edit->TemplateName->ReadOnly) { ?>
	<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplateName" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $mas_user_template_prescription_edit->TemplateName->caption() ?>" data-title="<?php echo $mas_user_template_prescription_edit->TemplateName->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplateName',url:'mas_template_prescription_typeaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
	<?php } ?>
</div>
<?php echo $mas_user_template_prescription_edit->TemplateName->Lookup->getParamTag($mas_user_template_prescription_edit, "p_x_TemplateName") ?>
</span>
<?php echo $mas_user_template_prescription_edit->TemplateName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_user_template_prescription_edit->Medicine->Visible) { // Medicine ?>
	<div id="r_Medicine" class="form-group row">
		<label id="elh_mas_user_template_prescription_Medicine" class="<?php echo $mas_user_template_prescription_edit->LeftColumnClass ?>"><?php echo $mas_user_template_prescription_edit->Medicine->caption() ?><?php echo $mas_user_template_prescription_edit->Medicine->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_user_template_prescription_edit->RightColumnClass ?>"><div <?php echo $mas_user_template_prescription_edit->Medicine->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_Medicine">
<?php
$onchange = $mas_user_template_prescription_edit->Medicine->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$mas_user_template_prescription_edit->Medicine->EditAttrs["onchange"] = "";
?>
<span id="as_x_Medicine">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x_Medicine" id="sv_x_Medicine" value="<?php echo RemoveHtml($mas_user_template_prescription_edit->Medicine->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_user_template_prescription_edit->Medicine->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($mas_user_template_prescription_edit->Medicine->getPlaceHolder()) ?>"<?php echo $mas_user_template_prescription_edit->Medicine->editAttributes() ?>>
		<div class="input-group-append">
			<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($mas_user_template_prescription_edit->Medicine->caption()), $Language->phrase("LookupLink", TRUE))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x_Medicine',m:0,n:10,srch:false});" class="ew-lookup-btn btn btn-default"<?php echo ($mas_user_template_prescription_edit->Medicine->ReadOnly || $mas_user_template_prescription_edit->Medicine->Disabled) ? " disabled" : "" ?>><i class="fas fa-search ew-icon"></i></button>
			<?php if (AllowAdd(CurrentProjectID() . "pres_tradenames_new") && !$mas_user_template_prescription_edit->Medicine->ReadOnly) { ?>
			<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_Medicine" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $mas_user_template_prescription_edit->Medicine->caption() ?>" data-title="<?php echo $mas_user_template_prescription_edit->Medicine->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_Medicine',url:'pres_tradenames_newaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button>
			<?php } ?>
		</div>
	</div>
</span>
<input type="hidden" data-table="mas_user_template_prescription" data-field="x_Medicine" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $mas_user_template_prescription_edit->Medicine->displayValueSeparatorAttribute() ?>" name="x_Medicine" id="x_Medicine" value="<?php echo HtmlEncode($mas_user_template_prescription_edit->Medicine->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fmas_user_template_prescriptionedit"], function() {
	fmas_user_template_prescriptionedit.createAutoSuggest({"id":"x_Medicine","forceSelect":true});
});
</script>
<?php echo $mas_user_template_prescription_edit->Medicine->Lookup->getParamTag($mas_user_template_prescription_edit, "p_x_Medicine") ?>
</span>
<?php echo $mas_user_template_prescription_edit->Medicine->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_user_template_prescription_edit->M->Visible) { // M ?>
	<div id="r_M" class="form-group row">
		<label id="elh_mas_user_template_prescription_M" for="x_M" class="<?php echo $mas_user_template_prescription_edit->LeftColumnClass ?>"><?php echo $mas_user_template_prescription_edit->M->caption() ?><?php echo $mas_user_template_prescription_edit->M->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_user_template_prescription_edit->RightColumnClass ?>"><div <?php echo $mas_user_template_prescription_edit->M->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_M">
<input type="text" data-table="mas_user_template_prescription" data-field="x_M" name="x_M" id="x_M" size="2" maxlength="3" placeholder="<?php echo HtmlEncode($mas_user_template_prescription_edit->M->getPlaceHolder()) ?>" value="<?php echo $mas_user_template_prescription_edit->M->EditValue ?>"<?php echo $mas_user_template_prescription_edit->M->editAttributes() ?>>
</span>
<?php echo $mas_user_template_prescription_edit->M->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_user_template_prescription_edit->A->Visible) { // A ?>
	<div id="r_A" class="form-group row">
		<label id="elh_mas_user_template_prescription_A" for="x_A" class="<?php echo $mas_user_template_prescription_edit->LeftColumnClass ?>"><?php echo $mas_user_template_prescription_edit->A->caption() ?><?php echo $mas_user_template_prescription_edit->A->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_user_template_prescription_edit->RightColumnClass ?>"><div <?php echo $mas_user_template_prescription_edit->A->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_A">
<input type="text" data-table="mas_user_template_prescription" data-field="x_A" name="x_A" id="x_A" size="2" maxlength="3" placeholder="<?php echo HtmlEncode($mas_user_template_prescription_edit->A->getPlaceHolder()) ?>" value="<?php echo $mas_user_template_prescription_edit->A->EditValue ?>"<?php echo $mas_user_template_prescription_edit->A->editAttributes() ?>>
</span>
<?php echo $mas_user_template_prescription_edit->A->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_user_template_prescription_edit->N->Visible) { // N ?>
	<div id="r_N" class="form-group row">
		<label id="elh_mas_user_template_prescription_N" for="x_N" class="<?php echo $mas_user_template_prescription_edit->LeftColumnClass ?>"><?php echo $mas_user_template_prescription_edit->N->caption() ?><?php echo $mas_user_template_prescription_edit->N->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_user_template_prescription_edit->RightColumnClass ?>"><div <?php echo $mas_user_template_prescription_edit->N->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_N">
<input type="text" data-table="mas_user_template_prescription" data-field="x_N" name="x_N" id="x_N" size="2" maxlength="3" placeholder="<?php echo HtmlEncode($mas_user_template_prescription_edit->N->getPlaceHolder()) ?>" value="<?php echo $mas_user_template_prescription_edit->N->EditValue ?>"<?php echo $mas_user_template_prescription_edit->N->editAttributes() ?>>
</span>
<?php echo $mas_user_template_prescription_edit->N->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_user_template_prescription_edit->NoOfDays->Visible) { // NoOfDays ?>
	<div id="r_NoOfDays" class="form-group row">
		<label id="elh_mas_user_template_prescription_NoOfDays" for="x_NoOfDays" class="<?php echo $mas_user_template_prescription_edit->LeftColumnClass ?>"><?php echo $mas_user_template_prescription_edit->NoOfDays->caption() ?><?php echo $mas_user_template_prescription_edit->NoOfDays->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_user_template_prescription_edit->RightColumnClass ?>"><div <?php echo $mas_user_template_prescription_edit->NoOfDays->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_NoOfDays">
<input type="text" data-table="mas_user_template_prescription" data-field="x_NoOfDays" name="x_NoOfDays" id="x_NoOfDays" size="5" maxlength="10" placeholder="<?php echo HtmlEncode($mas_user_template_prescription_edit->NoOfDays->getPlaceHolder()) ?>" value="<?php echo $mas_user_template_prescription_edit->NoOfDays->EditValue ?>"<?php echo $mas_user_template_prescription_edit->NoOfDays->editAttributes() ?>>
</span>
<?php echo $mas_user_template_prescription_edit->NoOfDays->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_user_template_prescription_edit->PreRoute->Visible) { // PreRoute ?>
	<div id="r_PreRoute" class="form-group row">
		<label id="elh_mas_user_template_prescription_PreRoute" class="<?php echo $mas_user_template_prescription_edit->LeftColumnClass ?>"><?php echo $mas_user_template_prescription_edit->PreRoute->caption() ?><?php echo $mas_user_template_prescription_edit->PreRoute->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_user_template_prescription_edit->RightColumnClass ?>"><div <?php echo $mas_user_template_prescription_edit->PreRoute->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_PreRoute">
<?php
$onchange = $mas_user_template_prescription_edit->PreRoute->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$mas_user_template_prescription_edit->PreRoute->EditAttrs["onchange"] = "";
?>
<span id="as_x_PreRoute">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x_PreRoute" id="sv_x_PreRoute" value="<?php echo RemoveHtml($mas_user_template_prescription_edit->PreRoute->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($mas_user_template_prescription_edit->PreRoute->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($mas_user_template_prescription_edit->PreRoute->getPlaceHolder()) ?>"<?php echo $mas_user_template_prescription_edit->PreRoute->editAttributes() ?>>
		<div class="input-group-append">
			<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($mas_user_template_prescription_edit->PreRoute->caption()), $Language->phrase("LookupLink", TRUE))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x_PreRoute',m:0,n:10,srch:true});" class="ew-lookup-btn btn btn-default"<?php echo ($mas_user_template_prescription_edit->PreRoute->ReadOnly || $mas_user_template_prescription_edit->PreRoute->Disabled) ? " disabled" : "" ?>><i class="fas fa-search ew-icon"></i></button>
			<?php if (AllowAdd(CurrentProjectID() . "pres_mas_route") && !$mas_user_template_prescription_edit->PreRoute->ReadOnly) { ?>
			<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_PreRoute" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $mas_user_template_prescription_edit->PreRoute->caption() ?>" data-title="<?php echo $mas_user_template_prescription_edit->PreRoute->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_PreRoute',url:'pres_mas_routeaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button>
			<?php } ?>
		</div>
	</div>
</span>
<input type="hidden" data-table="mas_user_template_prescription" data-field="x_PreRoute" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $mas_user_template_prescription_edit->PreRoute->displayValueSeparatorAttribute() ?>" name="x_PreRoute" id="x_PreRoute" value="<?php echo HtmlEncode($mas_user_template_prescription_edit->PreRoute->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fmas_user_template_prescriptionedit"], function() {
	fmas_user_template_prescriptionedit.createAutoSuggest({"id":"x_PreRoute","forceSelect":false});
});
</script>
<?php echo $mas_user_template_prescription_edit->PreRoute->Lookup->getParamTag($mas_user_template_prescription_edit, "p_x_PreRoute") ?>
</span>
<?php echo $mas_user_template_prescription_edit->PreRoute->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_user_template_prescription_edit->TimeOfTaking->Visible) { // TimeOfTaking ?>
	<div id="r_TimeOfTaking" class="form-group row">
		<label id="elh_mas_user_template_prescription_TimeOfTaking" class="<?php echo $mas_user_template_prescription_edit->LeftColumnClass ?>"><?php echo $mas_user_template_prescription_edit->TimeOfTaking->caption() ?><?php echo $mas_user_template_prescription_edit->TimeOfTaking->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_user_template_prescription_edit->RightColumnClass ?>"><div <?php echo $mas_user_template_prescription_edit->TimeOfTaking->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_TimeOfTaking">
<?php
$onchange = $mas_user_template_prescription_edit->TimeOfTaking->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$mas_user_template_prescription_edit->TimeOfTaking->EditAttrs["onchange"] = "";
?>
<span id="as_x_TimeOfTaking">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x_TimeOfTaking" id="sv_x_TimeOfTaking" value="<?php echo RemoveHtml($mas_user_template_prescription_edit->TimeOfTaking->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($mas_user_template_prescription_edit->TimeOfTaking->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($mas_user_template_prescription_edit->TimeOfTaking->getPlaceHolder()) ?>"<?php echo $mas_user_template_prescription_edit->TimeOfTaking->editAttributes() ?>>
		<?php if (AllowAdd(CurrentProjectID() . "pres_mas_timeoftaking") && !$mas_user_template_prescription_edit->TimeOfTaking->ReadOnly) { ?>
		<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TimeOfTaking" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $mas_user_template_prescription_edit->TimeOfTaking->caption() ?>" data-title="<?php echo $mas_user_template_prescription_edit->TimeOfTaking->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TimeOfTaking',url:'pres_mas_timeoftakingaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button></div>
		<?php } ?>
	</div>
</span>
<input type="hidden" data-table="mas_user_template_prescription" data-field="x_TimeOfTaking" data-value-separator="<?php echo $mas_user_template_prescription_edit->TimeOfTaking->displayValueSeparatorAttribute() ?>" name="x_TimeOfTaking" id="x_TimeOfTaking" value="<?php echo HtmlEncode($mas_user_template_prescription_edit->TimeOfTaking->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fmas_user_template_prescriptionedit"], function() {
	fmas_user_template_prescriptionedit.createAutoSuggest({"id":"x_TimeOfTaking","forceSelect":false});
});
</script>
<?php echo $mas_user_template_prescription_edit->TimeOfTaking->Lookup->getParamTag($mas_user_template_prescription_edit, "p_x_TimeOfTaking") ?>
</span>
<?php echo $mas_user_template_prescription_edit->TimeOfTaking->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_user_template_prescription_edit->Status->Visible) { // Status ?>
	<div id="r_Status" class="form-group row">
		<label id="elh_mas_user_template_prescription_Status" for="x_Status" class="<?php echo $mas_user_template_prescription_edit->LeftColumnClass ?>"><?php echo $mas_user_template_prescription_edit->Status->caption() ?><?php echo $mas_user_template_prescription_edit->Status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_user_template_prescription_edit->RightColumnClass ?>"><div <?php echo $mas_user_template_prescription_edit->Status->cellAttributes() ?>>
<span id="el_mas_user_template_prescription_Status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="mas_user_template_prescription" data-field="x_Status" data-value-separator="<?php echo $mas_user_template_prescription_edit->Status->displayValueSeparatorAttribute() ?>" id="x_Status" name="x_Status"<?php echo $mas_user_template_prescription_edit->Status->editAttributes() ?>>
			<?php echo $mas_user_template_prescription_edit->Status->selectOptionListHtml("x_Status") ?>
		</select>
</div>
</span>
<?php echo $mas_user_template_prescription_edit->Status->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$mas_user_template_prescription_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $mas_user_template_prescription_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $mas_user_template_prescription_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$mas_user_template_prescription_edit->showPageFooter();
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
$mas_user_template_prescription_edit->terminate();
?>