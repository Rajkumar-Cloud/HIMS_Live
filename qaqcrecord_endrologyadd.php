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
$qaqcrecord_endrology_add = new qaqcrecord_endrology_add();

// Run the page
$qaqcrecord_endrology_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$qaqcrecord_endrology_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fqaqcrecord_endrologyadd = currentForm = new ew.Form("fqaqcrecord_endrologyadd", "add");

// Validate form
fqaqcrecord_endrologyadd.validate = function() {
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
		<?php if ($qaqcrecord_endrology_add->Date->Required) { ?>
			elm = this.getElements("x" + infix + "_Date");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $qaqcrecord_endrology->Date->caption(), $qaqcrecord_endrology->Date->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Date");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($qaqcrecord_endrology->Date->errorMessage()) ?>");
		<?php if ($qaqcrecord_endrology_add->LN2_Level->Required) { ?>
			elm = this.getElements("x" + infix + "_LN2_Level");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $qaqcrecord_endrology->LN2_Level->caption(), $qaqcrecord_endrology->LN2_Level->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_LN2_Level");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($qaqcrecord_endrology->LN2_Level->errorMessage()) ?>");
		<?php if ($qaqcrecord_endrology_add->LN2_Checked->Required) { ?>
			elm = this.getElements("x" + infix + "_LN2_Checked[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $qaqcrecord_endrology->LN2_Checked->caption(), $qaqcrecord_endrology->LN2_Checked->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($qaqcrecord_endrology_add->Incubator_Temp->Required) { ?>
			elm = this.getElements("x" + infix + "_Incubator_Temp");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $qaqcrecord_endrology->Incubator_Temp->caption(), $qaqcrecord_endrology->Incubator_Temp->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Incubator_Temp");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($qaqcrecord_endrology->Incubator_Temp->errorMessage()) ?>");
		<?php if ($qaqcrecord_endrology_add->Incubator_Cleaned->Required) { ?>
			elm = this.getElements("x" + infix + "_Incubator_Cleaned[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $qaqcrecord_endrology->Incubator_Cleaned->caption(), $qaqcrecord_endrology->Incubator_Cleaned->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($qaqcrecord_endrology_add->LAF_MG->Required) { ?>
			elm = this.getElements("x" + infix + "_LAF_MG");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $qaqcrecord_endrology->LAF_MG->caption(), $qaqcrecord_endrology->LAF_MG->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_LAF_MG");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($qaqcrecord_endrology->LAF_MG->errorMessage()) ?>");
		<?php if ($qaqcrecord_endrology_add->LAF_Cleaned->Required) { ?>
			elm = this.getElements("x" + infix + "_LAF_Cleaned[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $qaqcrecord_endrology->LAF_Cleaned->caption(), $qaqcrecord_endrology->LAF_Cleaned->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($qaqcrecord_endrology_add->REF_Temp->Required) { ?>
			elm = this.getElements("x" + infix + "_REF_Temp");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $qaqcrecord_endrology->REF_Temp->caption(), $qaqcrecord_endrology->REF_Temp->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_REF_Temp");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($qaqcrecord_endrology->REF_Temp->errorMessage()) ?>");
		<?php if ($qaqcrecord_endrology_add->REF_Cleaned->Required) { ?>
			elm = this.getElements("x" + infix + "_REF_Cleaned[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $qaqcrecord_endrology->REF_Cleaned->caption(), $qaqcrecord_endrology->REF_Cleaned->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($qaqcrecord_endrology_add->Heating_Temp->Required) { ?>
			elm = this.getElements("x" + infix + "_Heating_Temp");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $qaqcrecord_endrology->Heating_Temp->caption(), $qaqcrecord_endrology->Heating_Temp->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Heating_Temp");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($qaqcrecord_endrology->Heating_Temp->errorMessage()) ?>");
		<?php if ($qaqcrecord_endrology_add->Heating_Cleaned->Required) { ?>
			elm = this.getElements("x" + infix + "_Heating_Cleaned[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $qaqcrecord_endrology->Heating_Cleaned->caption(), $qaqcrecord_endrology->Heating_Cleaned->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($qaqcrecord_endrology_add->Createdby->Required) { ?>
			elm = this.getElements("x" + infix + "_Createdby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $qaqcrecord_endrology->Createdby->caption(), $qaqcrecord_endrology->Createdby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($qaqcrecord_endrology_add->CreatedDate->Required) { ?>
			elm = this.getElements("x" + infix + "_CreatedDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $qaqcrecord_endrology->CreatedDate->caption(), $qaqcrecord_endrology->CreatedDate->RequiredErrorMessage)) ?>");
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
fqaqcrecord_endrologyadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fqaqcrecord_endrologyadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fqaqcrecord_endrologyadd.lists["x_LN2_Checked[]"] = <?php echo $qaqcrecord_endrology_add->LN2_Checked->Lookup->toClientList() ?>;
fqaqcrecord_endrologyadd.lists["x_LN2_Checked[]"].options = <?php echo JsonEncode($qaqcrecord_endrology_add->LN2_Checked->options(FALSE, TRUE)) ?>;
fqaqcrecord_endrologyadd.lists["x_Incubator_Cleaned[]"] = <?php echo $qaqcrecord_endrology_add->Incubator_Cleaned->Lookup->toClientList() ?>;
fqaqcrecord_endrologyadd.lists["x_Incubator_Cleaned[]"].options = <?php echo JsonEncode($qaqcrecord_endrology_add->Incubator_Cleaned->options(FALSE, TRUE)) ?>;
fqaqcrecord_endrologyadd.lists["x_LAF_Cleaned[]"] = <?php echo $qaqcrecord_endrology_add->LAF_Cleaned->Lookup->toClientList() ?>;
fqaqcrecord_endrologyadd.lists["x_LAF_Cleaned[]"].options = <?php echo JsonEncode($qaqcrecord_endrology_add->LAF_Cleaned->options(FALSE, TRUE)) ?>;
fqaqcrecord_endrologyadd.lists["x_REF_Cleaned[]"] = <?php echo $qaqcrecord_endrology_add->REF_Cleaned->Lookup->toClientList() ?>;
fqaqcrecord_endrologyadd.lists["x_REF_Cleaned[]"].options = <?php echo JsonEncode($qaqcrecord_endrology_add->REF_Cleaned->options(FALSE, TRUE)) ?>;
fqaqcrecord_endrologyadd.lists["x_Heating_Cleaned[]"] = <?php echo $qaqcrecord_endrology_add->Heating_Cleaned->Lookup->toClientList() ?>;
fqaqcrecord_endrologyadd.lists["x_Heating_Cleaned[]"].options = <?php echo JsonEncode($qaqcrecord_endrology_add->Heating_Cleaned->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $qaqcrecord_endrology_add->showPageHeader(); ?>
<?php
$qaqcrecord_endrology_add->showMessage();
?>
<form name="fqaqcrecord_endrologyadd" id="fqaqcrecord_endrologyadd" class="<?php echo $qaqcrecord_endrology_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($qaqcrecord_endrology_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $qaqcrecord_endrology_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="qaqcrecord_endrology">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$qaqcrecord_endrology_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($qaqcrecord_endrology->Date->Visible) { // Date ?>
	<div id="r_Date" class="form-group row">
		<label id="elh_qaqcrecord_endrology_Date" for="x_Date" class="<?php echo $qaqcrecord_endrology_add->LeftColumnClass ?>"><?php echo $qaqcrecord_endrology->Date->caption() ?><?php echo ($qaqcrecord_endrology->Date->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $qaqcrecord_endrology_add->RightColumnClass ?>"><div<?php echo $qaqcrecord_endrology->Date->cellAttributes() ?>>
<span id="el_qaqcrecord_endrology_Date">
<input type="text" data-table="qaqcrecord_endrology" data-field="x_Date" name="x_Date" id="x_Date" placeholder="<?php echo HtmlEncode($qaqcrecord_endrology->Date->getPlaceHolder()) ?>" value="<?php echo $qaqcrecord_endrology->Date->EditValue ?>"<?php echo $qaqcrecord_endrology->Date->editAttributes() ?>>
<?php if (!$qaqcrecord_endrology->Date->ReadOnly && !$qaqcrecord_endrology->Date->Disabled && !isset($qaqcrecord_endrology->Date->EditAttrs["readonly"]) && !isset($qaqcrecord_endrology->Date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fqaqcrecord_endrologyadd", "x_Date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $qaqcrecord_endrology->Date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($qaqcrecord_endrology->LN2_Level->Visible) { // LN2_Level ?>
	<div id="r_LN2_Level" class="form-group row">
		<label id="elh_qaqcrecord_endrology_LN2_Level" for="x_LN2_Level" class="<?php echo $qaqcrecord_endrology_add->LeftColumnClass ?>"><?php echo $qaqcrecord_endrology->LN2_Level->caption() ?><?php echo ($qaqcrecord_endrology->LN2_Level->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $qaqcrecord_endrology_add->RightColumnClass ?>"><div<?php echo $qaqcrecord_endrology->LN2_Level->cellAttributes() ?>>
<span id="el_qaqcrecord_endrology_LN2_Level">
<input type="text" data-table="qaqcrecord_endrology" data-field="x_LN2_Level" name="x_LN2_Level" id="x_LN2_Level" size="30" placeholder="<?php echo HtmlEncode($qaqcrecord_endrology->LN2_Level->getPlaceHolder()) ?>" value="<?php echo $qaqcrecord_endrology->LN2_Level->EditValue ?>"<?php echo $qaqcrecord_endrology->LN2_Level->editAttributes() ?>>
</span>
<?php echo $qaqcrecord_endrology->LN2_Level->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($qaqcrecord_endrology->LN2_Checked->Visible) { // LN2_Checked ?>
	<div id="r_LN2_Checked" class="form-group row">
		<label id="elh_qaqcrecord_endrology_LN2_Checked" class="<?php echo $qaqcrecord_endrology_add->LeftColumnClass ?>"><?php echo $qaqcrecord_endrology->LN2_Checked->caption() ?><?php echo ($qaqcrecord_endrology->LN2_Checked->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $qaqcrecord_endrology_add->RightColumnClass ?>"><div<?php echo $qaqcrecord_endrology->LN2_Checked->cellAttributes() ?>>
<span id="el_qaqcrecord_endrology_LN2_Checked">
<div id="tp_x_LN2_Checked" class="ew-template"><input type="checkbox" class="form-check-input" data-table="qaqcrecord_endrology" data-field="x_LN2_Checked" data-value-separator="<?php echo $qaqcrecord_endrology->LN2_Checked->displayValueSeparatorAttribute() ?>" name="x_LN2_Checked[]" id="x_LN2_Checked[]" value="{value}"<?php echo $qaqcrecord_endrology->LN2_Checked->editAttributes() ?>></div>
<div id="dsl_x_LN2_Checked" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $qaqcrecord_endrology->LN2_Checked->checkBoxListHtml(FALSE, "x_LN2_Checked[]") ?>
</div></div>
</span>
<?php echo $qaqcrecord_endrology->LN2_Checked->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($qaqcrecord_endrology->Incubator_Temp->Visible) { // Incubator_Temp ?>
	<div id="r_Incubator_Temp" class="form-group row">
		<label id="elh_qaqcrecord_endrology_Incubator_Temp" for="x_Incubator_Temp" class="<?php echo $qaqcrecord_endrology_add->LeftColumnClass ?>"><?php echo $qaqcrecord_endrology->Incubator_Temp->caption() ?><?php echo ($qaqcrecord_endrology->Incubator_Temp->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $qaqcrecord_endrology_add->RightColumnClass ?>"><div<?php echo $qaqcrecord_endrology->Incubator_Temp->cellAttributes() ?>>
<span id="el_qaqcrecord_endrology_Incubator_Temp">
<input type="text" data-table="qaqcrecord_endrology" data-field="x_Incubator_Temp" name="x_Incubator_Temp" id="x_Incubator_Temp" size="30" placeholder="<?php echo HtmlEncode($qaqcrecord_endrology->Incubator_Temp->getPlaceHolder()) ?>" value="<?php echo $qaqcrecord_endrology->Incubator_Temp->EditValue ?>"<?php echo $qaqcrecord_endrology->Incubator_Temp->editAttributes() ?>>
</span>
<?php echo $qaqcrecord_endrology->Incubator_Temp->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($qaqcrecord_endrology->Incubator_Cleaned->Visible) { // Incubator_Cleaned ?>
	<div id="r_Incubator_Cleaned" class="form-group row">
		<label id="elh_qaqcrecord_endrology_Incubator_Cleaned" class="<?php echo $qaqcrecord_endrology_add->LeftColumnClass ?>"><?php echo $qaqcrecord_endrology->Incubator_Cleaned->caption() ?><?php echo ($qaqcrecord_endrology->Incubator_Cleaned->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $qaqcrecord_endrology_add->RightColumnClass ?>"><div<?php echo $qaqcrecord_endrology->Incubator_Cleaned->cellAttributes() ?>>
<span id="el_qaqcrecord_endrology_Incubator_Cleaned">
<div id="tp_x_Incubator_Cleaned" class="ew-template"><input type="checkbox" class="form-check-input" data-table="qaqcrecord_endrology" data-field="x_Incubator_Cleaned" data-value-separator="<?php echo $qaqcrecord_endrology->Incubator_Cleaned->displayValueSeparatorAttribute() ?>" name="x_Incubator_Cleaned[]" id="x_Incubator_Cleaned[]" value="{value}"<?php echo $qaqcrecord_endrology->Incubator_Cleaned->editAttributes() ?>></div>
<div id="dsl_x_Incubator_Cleaned" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $qaqcrecord_endrology->Incubator_Cleaned->checkBoxListHtml(FALSE, "x_Incubator_Cleaned[]") ?>
</div></div>
</span>
<?php echo $qaqcrecord_endrology->Incubator_Cleaned->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($qaqcrecord_endrology->LAF_MG->Visible) { // LAF_MG ?>
	<div id="r_LAF_MG" class="form-group row">
		<label id="elh_qaqcrecord_endrology_LAF_MG" for="x_LAF_MG" class="<?php echo $qaqcrecord_endrology_add->LeftColumnClass ?>"><?php echo $qaqcrecord_endrology->LAF_MG->caption() ?><?php echo ($qaqcrecord_endrology->LAF_MG->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $qaqcrecord_endrology_add->RightColumnClass ?>"><div<?php echo $qaqcrecord_endrology->LAF_MG->cellAttributes() ?>>
<span id="el_qaqcrecord_endrology_LAF_MG">
<input type="text" data-table="qaqcrecord_endrology" data-field="x_LAF_MG" name="x_LAF_MG" id="x_LAF_MG" size="30" placeholder="<?php echo HtmlEncode($qaqcrecord_endrology->LAF_MG->getPlaceHolder()) ?>" value="<?php echo $qaqcrecord_endrology->LAF_MG->EditValue ?>"<?php echo $qaqcrecord_endrology->LAF_MG->editAttributes() ?>>
</span>
<?php echo $qaqcrecord_endrology->LAF_MG->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($qaqcrecord_endrology->LAF_Cleaned->Visible) { // LAF_Cleaned ?>
	<div id="r_LAF_Cleaned" class="form-group row">
		<label id="elh_qaqcrecord_endrology_LAF_Cleaned" class="<?php echo $qaqcrecord_endrology_add->LeftColumnClass ?>"><?php echo $qaqcrecord_endrology->LAF_Cleaned->caption() ?><?php echo ($qaqcrecord_endrology->LAF_Cleaned->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $qaqcrecord_endrology_add->RightColumnClass ?>"><div<?php echo $qaqcrecord_endrology->LAF_Cleaned->cellAttributes() ?>>
<span id="el_qaqcrecord_endrology_LAF_Cleaned">
<div id="tp_x_LAF_Cleaned" class="ew-template"><input type="checkbox" class="form-check-input" data-table="qaqcrecord_endrology" data-field="x_LAF_Cleaned" data-value-separator="<?php echo $qaqcrecord_endrology->LAF_Cleaned->displayValueSeparatorAttribute() ?>" name="x_LAF_Cleaned[]" id="x_LAF_Cleaned[]" value="{value}"<?php echo $qaqcrecord_endrology->LAF_Cleaned->editAttributes() ?>></div>
<div id="dsl_x_LAF_Cleaned" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $qaqcrecord_endrology->LAF_Cleaned->checkBoxListHtml(FALSE, "x_LAF_Cleaned[]") ?>
</div></div>
</span>
<?php echo $qaqcrecord_endrology->LAF_Cleaned->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($qaqcrecord_endrology->REF_Temp->Visible) { // REF_Temp ?>
	<div id="r_REF_Temp" class="form-group row">
		<label id="elh_qaqcrecord_endrology_REF_Temp" for="x_REF_Temp" class="<?php echo $qaqcrecord_endrology_add->LeftColumnClass ?>"><?php echo $qaqcrecord_endrology->REF_Temp->caption() ?><?php echo ($qaqcrecord_endrology->REF_Temp->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $qaqcrecord_endrology_add->RightColumnClass ?>"><div<?php echo $qaqcrecord_endrology->REF_Temp->cellAttributes() ?>>
<span id="el_qaqcrecord_endrology_REF_Temp">
<input type="text" data-table="qaqcrecord_endrology" data-field="x_REF_Temp" name="x_REF_Temp" id="x_REF_Temp" size="30" placeholder="<?php echo HtmlEncode($qaqcrecord_endrology->REF_Temp->getPlaceHolder()) ?>" value="<?php echo $qaqcrecord_endrology->REF_Temp->EditValue ?>"<?php echo $qaqcrecord_endrology->REF_Temp->editAttributes() ?>>
</span>
<?php echo $qaqcrecord_endrology->REF_Temp->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($qaqcrecord_endrology->REF_Cleaned->Visible) { // REF_Cleaned ?>
	<div id="r_REF_Cleaned" class="form-group row">
		<label id="elh_qaqcrecord_endrology_REF_Cleaned" class="<?php echo $qaqcrecord_endrology_add->LeftColumnClass ?>"><?php echo $qaqcrecord_endrology->REF_Cleaned->caption() ?><?php echo ($qaqcrecord_endrology->REF_Cleaned->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $qaqcrecord_endrology_add->RightColumnClass ?>"><div<?php echo $qaqcrecord_endrology->REF_Cleaned->cellAttributes() ?>>
<span id="el_qaqcrecord_endrology_REF_Cleaned">
<div id="tp_x_REF_Cleaned" class="ew-template"><input type="checkbox" class="form-check-input" data-table="qaqcrecord_endrology" data-field="x_REF_Cleaned" data-value-separator="<?php echo $qaqcrecord_endrology->REF_Cleaned->displayValueSeparatorAttribute() ?>" name="x_REF_Cleaned[]" id="x_REF_Cleaned[]" value="{value}"<?php echo $qaqcrecord_endrology->REF_Cleaned->editAttributes() ?>></div>
<div id="dsl_x_REF_Cleaned" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $qaqcrecord_endrology->REF_Cleaned->checkBoxListHtml(FALSE, "x_REF_Cleaned[]") ?>
</div></div>
</span>
<?php echo $qaqcrecord_endrology->REF_Cleaned->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($qaqcrecord_endrology->Heating_Temp->Visible) { // Heating_Temp ?>
	<div id="r_Heating_Temp" class="form-group row">
		<label id="elh_qaqcrecord_endrology_Heating_Temp" for="x_Heating_Temp" class="<?php echo $qaqcrecord_endrology_add->LeftColumnClass ?>"><?php echo $qaqcrecord_endrology->Heating_Temp->caption() ?><?php echo ($qaqcrecord_endrology->Heating_Temp->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $qaqcrecord_endrology_add->RightColumnClass ?>"><div<?php echo $qaqcrecord_endrology->Heating_Temp->cellAttributes() ?>>
<span id="el_qaqcrecord_endrology_Heating_Temp">
<input type="text" data-table="qaqcrecord_endrology" data-field="x_Heating_Temp" name="x_Heating_Temp" id="x_Heating_Temp" size="30" placeholder="<?php echo HtmlEncode($qaqcrecord_endrology->Heating_Temp->getPlaceHolder()) ?>" value="<?php echo $qaqcrecord_endrology->Heating_Temp->EditValue ?>"<?php echo $qaqcrecord_endrology->Heating_Temp->editAttributes() ?>>
</span>
<?php echo $qaqcrecord_endrology->Heating_Temp->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($qaqcrecord_endrology->Heating_Cleaned->Visible) { // Heating_Cleaned ?>
	<div id="r_Heating_Cleaned" class="form-group row">
		<label id="elh_qaqcrecord_endrology_Heating_Cleaned" class="<?php echo $qaqcrecord_endrology_add->LeftColumnClass ?>"><?php echo $qaqcrecord_endrology->Heating_Cleaned->caption() ?><?php echo ($qaqcrecord_endrology->Heating_Cleaned->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $qaqcrecord_endrology_add->RightColumnClass ?>"><div<?php echo $qaqcrecord_endrology->Heating_Cleaned->cellAttributes() ?>>
<span id="el_qaqcrecord_endrology_Heating_Cleaned">
<div id="tp_x_Heating_Cleaned" class="ew-template"><input type="checkbox" class="form-check-input" data-table="qaqcrecord_endrology" data-field="x_Heating_Cleaned" data-value-separator="<?php echo $qaqcrecord_endrology->Heating_Cleaned->displayValueSeparatorAttribute() ?>" name="x_Heating_Cleaned[]" id="x_Heating_Cleaned[]" value="{value}"<?php echo $qaqcrecord_endrology->Heating_Cleaned->editAttributes() ?>></div>
<div id="dsl_x_Heating_Cleaned" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $qaqcrecord_endrology->Heating_Cleaned->checkBoxListHtml(FALSE, "x_Heating_Cleaned[]") ?>
</div></div>
</span>
<?php echo $qaqcrecord_endrology->Heating_Cleaned->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$qaqcrecord_endrology_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $qaqcrecord_endrology_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $qaqcrecord_endrology_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$qaqcrecord_endrology_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$qaqcrecord_endrology_add->terminate();
?>