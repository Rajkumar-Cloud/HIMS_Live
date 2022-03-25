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
$qaqcrecord_andrology_add = new qaqcrecord_andrology_add();

// Run the page
$qaqcrecord_andrology_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$qaqcrecord_andrology_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fqaqcrecord_andrologyadd = currentForm = new ew.Form("fqaqcrecord_andrologyadd", "add");

// Validate form
fqaqcrecord_andrologyadd.validate = function() {
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
		<?php if ($qaqcrecord_andrology_add->Date->Required) { ?>
			elm = this.getElements("x" + infix + "_Date");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $qaqcrecord_andrology->Date->caption(), $qaqcrecord_andrology->Date->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Date");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($qaqcrecord_andrology->Date->errorMessage()) ?>");
		<?php if ($qaqcrecord_andrology_add->LN2_Level->Required) { ?>
			elm = this.getElements("x" + infix + "_LN2_Level");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $qaqcrecord_andrology->LN2_Level->caption(), $qaqcrecord_andrology->LN2_Level->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_LN2_Level");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($qaqcrecord_andrology->LN2_Level->errorMessage()) ?>");
		<?php if ($qaqcrecord_andrology_add->LN2_Checked->Required) { ?>
			elm = this.getElements("x" + infix + "_LN2_Checked[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $qaqcrecord_andrology->LN2_Checked->caption(), $qaqcrecord_andrology->LN2_Checked->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($qaqcrecord_andrology_add->Incubator_Temp->Required) { ?>
			elm = this.getElements("x" + infix + "_Incubator_Temp");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $qaqcrecord_andrology->Incubator_Temp->caption(), $qaqcrecord_andrology->Incubator_Temp->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Incubator_Temp");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($qaqcrecord_andrology->Incubator_Temp->errorMessage()) ?>");
		<?php if ($qaqcrecord_andrology_add->Incubator_Cleaned->Required) { ?>
			elm = this.getElements("x" + infix + "_Incubator_Cleaned[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $qaqcrecord_andrology->Incubator_Cleaned->caption(), $qaqcrecord_andrology->Incubator_Cleaned->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($qaqcrecord_andrology_add->LAF_MG->Required) { ?>
			elm = this.getElements("x" + infix + "_LAF_MG");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $qaqcrecord_andrology->LAF_MG->caption(), $qaqcrecord_andrology->LAF_MG->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_LAF_MG");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($qaqcrecord_andrology->LAF_MG->errorMessage()) ?>");
		<?php if ($qaqcrecord_andrology_add->LAF_Cleaned->Required) { ?>
			elm = this.getElements("x" + infix + "_LAF_Cleaned[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $qaqcrecord_andrology->LAF_Cleaned->caption(), $qaqcrecord_andrology->LAF_Cleaned->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($qaqcrecord_andrology_add->REF_Temp->Required) { ?>
			elm = this.getElements("x" + infix + "_REF_Temp");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $qaqcrecord_andrology->REF_Temp->caption(), $qaqcrecord_andrology->REF_Temp->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_REF_Temp");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($qaqcrecord_andrology->REF_Temp->errorMessage()) ?>");
		<?php if ($qaqcrecord_andrology_add->REF_Cleaned->Required) { ?>
			elm = this.getElements("x" + infix + "_REF_Cleaned[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $qaqcrecord_andrology->REF_Cleaned->caption(), $qaqcrecord_andrology->REF_Cleaned->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($qaqcrecord_andrology_add->Heating_Temp->Required) { ?>
			elm = this.getElements("x" + infix + "_Heating_Temp");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $qaqcrecord_andrology->Heating_Temp->caption(), $qaqcrecord_andrology->Heating_Temp->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Heating_Temp");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($qaqcrecord_andrology->Heating_Temp->errorMessage()) ?>");
		<?php if ($qaqcrecord_andrology_add->Heating_Cleaned->Required) { ?>
			elm = this.getElements("x" + infix + "_Heating_Cleaned[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $qaqcrecord_andrology->Heating_Cleaned->caption(), $qaqcrecord_andrology->Heating_Cleaned->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($qaqcrecord_andrology_add->Createdby->Required) { ?>
			elm = this.getElements("x" + infix + "_Createdby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $qaqcrecord_andrology->Createdby->caption(), $qaqcrecord_andrology->Createdby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($qaqcrecord_andrology_add->CreatedDate->Required) { ?>
			elm = this.getElements("x" + infix + "_CreatedDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $qaqcrecord_andrology->CreatedDate->caption(), $qaqcrecord_andrology->CreatedDate->RequiredErrorMessage)) ?>");
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
fqaqcrecord_andrologyadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fqaqcrecord_andrologyadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fqaqcrecord_andrologyadd.lists["x_LN2_Checked[]"] = <?php echo $qaqcrecord_andrology_add->LN2_Checked->Lookup->toClientList() ?>;
fqaqcrecord_andrologyadd.lists["x_LN2_Checked[]"].options = <?php echo JsonEncode($qaqcrecord_andrology_add->LN2_Checked->options(FALSE, TRUE)) ?>;
fqaqcrecord_andrologyadd.lists["x_Incubator_Cleaned[]"] = <?php echo $qaqcrecord_andrology_add->Incubator_Cleaned->Lookup->toClientList() ?>;
fqaqcrecord_andrologyadd.lists["x_Incubator_Cleaned[]"].options = <?php echo JsonEncode($qaqcrecord_andrology_add->Incubator_Cleaned->options(FALSE, TRUE)) ?>;
fqaqcrecord_andrologyadd.lists["x_LAF_Cleaned[]"] = <?php echo $qaqcrecord_andrology_add->LAF_Cleaned->Lookup->toClientList() ?>;
fqaqcrecord_andrologyadd.lists["x_LAF_Cleaned[]"].options = <?php echo JsonEncode($qaqcrecord_andrology_add->LAF_Cleaned->options(FALSE, TRUE)) ?>;
fqaqcrecord_andrologyadd.lists["x_REF_Cleaned[]"] = <?php echo $qaqcrecord_andrology_add->REF_Cleaned->Lookup->toClientList() ?>;
fqaqcrecord_andrologyadd.lists["x_REF_Cleaned[]"].options = <?php echo JsonEncode($qaqcrecord_andrology_add->REF_Cleaned->options(FALSE, TRUE)) ?>;
fqaqcrecord_andrologyadd.lists["x_Heating_Cleaned[]"] = <?php echo $qaqcrecord_andrology_add->Heating_Cleaned->Lookup->toClientList() ?>;
fqaqcrecord_andrologyadd.lists["x_Heating_Cleaned[]"].options = <?php echo JsonEncode($qaqcrecord_andrology_add->Heating_Cleaned->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $qaqcrecord_andrology_add->showPageHeader(); ?>
<?php
$qaqcrecord_andrology_add->showMessage();
?>
<form name="fqaqcrecord_andrologyadd" id="fqaqcrecord_andrologyadd" class="<?php echo $qaqcrecord_andrology_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($qaqcrecord_andrology_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $qaqcrecord_andrology_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="qaqcrecord_andrology">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$qaqcrecord_andrology_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($qaqcrecord_andrology->Date->Visible) { // Date ?>
	<div id="r_Date" class="form-group row">
		<label id="elh_qaqcrecord_andrology_Date" for="x_Date" class="<?php echo $qaqcrecord_andrology_add->LeftColumnClass ?>"><?php echo $qaqcrecord_andrology->Date->caption() ?><?php echo ($qaqcrecord_andrology->Date->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $qaqcrecord_andrology_add->RightColumnClass ?>"><div<?php echo $qaqcrecord_andrology->Date->cellAttributes() ?>>
<span id="el_qaqcrecord_andrology_Date">
<input type="text" data-table="qaqcrecord_andrology" data-field="x_Date" name="x_Date" id="x_Date" placeholder="<?php echo HtmlEncode($qaqcrecord_andrology->Date->getPlaceHolder()) ?>" value="<?php echo $qaqcrecord_andrology->Date->EditValue ?>"<?php echo $qaqcrecord_andrology->Date->editAttributes() ?>>
<?php if (!$qaqcrecord_andrology->Date->ReadOnly && !$qaqcrecord_andrology->Date->Disabled && !isset($qaqcrecord_andrology->Date->EditAttrs["readonly"]) && !isset($qaqcrecord_andrology->Date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fqaqcrecord_andrologyadd", "x_Date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $qaqcrecord_andrology->Date->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($qaqcrecord_andrology->LN2_Level->Visible) { // LN2_Level ?>
	<div id="r_LN2_Level" class="form-group row">
		<label id="elh_qaqcrecord_andrology_LN2_Level" for="x_LN2_Level" class="<?php echo $qaqcrecord_andrology_add->LeftColumnClass ?>"><?php echo $qaqcrecord_andrology->LN2_Level->caption() ?><?php echo ($qaqcrecord_andrology->LN2_Level->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $qaqcrecord_andrology_add->RightColumnClass ?>"><div<?php echo $qaqcrecord_andrology->LN2_Level->cellAttributes() ?>>
<span id="el_qaqcrecord_andrology_LN2_Level">
<input type="text" data-table="qaqcrecord_andrology" data-field="x_LN2_Level" name="x_LN2_Level" id="x_LN2_Level" size="30" placeholder="<?php echo HtmlEncode($qaqcrecord_andrology->LN2_Level->getPlaceHolder()) ?>" value="<?php echo $qaqcrecord_andrology->LN2_Level->EditValue ?>"<?php echo $qaqcrecord_andrology->LN2_Level->editAttributes() ?>>
</span>
<?php echo $qaqcrecord_andrology->LN2_Level->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($qaqcrecord_andrology->LN2_Checked->Visible) { // LN2_Checked ?>
	<div id="r_LN2_Checked" class="form-group row">
		<label id="elh_qaqcrecord_andrology_LN2_Checked" class="<?php echo $qaqcrecord_andrology_add->LeftColumnClass ?>"><?php echo $qaqcrecord_andrology->LN2_Checked->caption() ?><?php echo ($qaqcrecord_andrology->LN2_Checked->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $qaqcrecord_andrology_add->RightColumnClass ?>"><div<?php echo $qaqcrecord_andrology->LN2_Checked->cellAttributes() ?>>
<span id="el_qaqcrecord_andrology_LN2_Checked">
<div id="tp_x_LN2_Checked" class="ew-template"><input type="checkbox" class="form-check-input" data-table="qaqcrecord_andrology" data-field="x_LN2_Checked" data-value-separator="<?php echo $qaqcrecord_andrology->LN2_Checked->displayValueSeparatorAttribute() ?>" name="x_LN2_Checked[]" id="x_LN2_Checked[]" value="{value}"<?php echo $qaqcrecord_andrology->LN2_Checked->editAttributes() ?>></div>
<div id="dsl_x_LN2_Checked" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $qaqcrecord_andrology->LN2_Checked->checkBoxListHtml(FALSE, "x_LN2_Checked[]") ?>
</div></div>
</span>
<?php echo $qaqcrecord_andrology->LN2_Checked->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($qaqcrecord_andrology->Incubator_Temp->Visible) { // Incubator_Temp ?>
	<div id="r_Incubator_Temp" class="form-group row">
		<label id="elh_qaqcrecord_andrology_Incubator_Temp" for="x_Incubator_Temp" class="<?php echo $qaqcrecord_andrology_add->LeftColumnClass ?>"><?php echo $qaqcrecord_andrology->Incubator_Temp->caption() ?><?php echo ($qaqcrecord_andrology->Incubator_Temp->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $qaqcrecord_andrology_add->RightColumnClass ?>"><div<?php echo $qaqcrecord_andrology->Incubator_Temp->cellAttributes() ?>>
<span id="el_qaqcrecord_andrology_Incubator_Temp">
<input type="text" data-table="qaqcrecord_andrology" data-field="x_Incubator_Temp" name="x_Incubator_Temp" id="x_Incubator_Temp" size="30" placeholder="<?php echo HtmlEncode($qaqcrecord_andrology->Incubator_Temp->getPlaceHolder()) ?>" value="<?php echo $qaqcrecord_andrology->Incubator_Temp->EditValue ?>"<?php echo $qaqcrecord_andrology->Incubator_Temp->editAttributes() ?>>
</span>
<?php echo $qaqcrecord_andrology->Incubator_Temp->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($qaqcrecord_andrology->Incubator_Cleaned->Visible) { // Incubator_Cleaned ?>
	<div id="r_Incubator_Cleaned" class="form-group row">
		<label id="elh_qaqcrecord_andrology_Incubator_Cleaned" class="<?php echo $qaqcrecord_andrology_add->LeftColumnClass ?>"><?php echo $qaqcrecord_andrology->Incubator_Cleaned->caption() ?><?php echo ($qaqcrecord_andrology->Incubator_Cleaned->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $qaqcrecord_andrology_add->RightColumnClass ?>"><div<?php echo $qaqcrecord_andrology->Incubator_Cleaned->cellAttributes() ?>>
<span id="el_qaqcrecord_andrology_Incubator_Cleaned">
<div id="tp_x_Incubator_Cleaned" class="ew-template"><input type="checkbox" class="form-check-input" data-table="qaqcrecord_andrology" data-field="x_Incubator_Cleaned" data-value-separator="<?php echo $qaqcrecord_andrology->Incubator_Cleaned->displayValueSeparatorAttribute() ?>" name="x_Incubator_Cleaned[]" id="x_Incubator_Cleaned[]" value="{value}"<?php echo $qaqcrecord_andrology->Incubator_Cleaned->editAttributes() ?>></div>
<div id="dsl_x_Incubator_Cleaned" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $qaqcrecord_andrology->Incubator_Cleaned->checkBoxListHtml(FALSE, "x_Incubator_Cleaned[]") ?>
</div></div>
</span>
<?php echo $qaqcrecord_andrology->Incubator_Cleaned->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($qaqcrecord_andrology->LAF_MG->Visible) { // LAF_MG ?>
	<div id="r_LAF_MG" class="form-group row">
		<label id="elh_qaqcrecord_andrology_LAF_MG" for="x_LAF_MG" class="<?php echo $qaqcrecord_andrology_add->LeftColumnClass ?>"><?php echo $qaqcrecord_andrology->LAF_MG->caption() ?><?php echo ($qaqcrecord_andrology->LAF_MG->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $qaqcrecord_andrology_add->RightColumnClass ?>"><div<?php echo $qaqcrecord_andrology->LAF_MG->cellAttributes() ?>>
<span id="el_qaqcrecord_andrology_LAF_MG">
<input type="text" data-table="qaqcrecord_andrology" data-field="x_LAF_MG" name="x_LAF_MG" id="x_LAF_MG" size="30" placeholder="<?php echo HtmlEncode($qaqcrecord_andrology->LAF_MG->getPlaceHolder()) ?>" value="<?php echo $qaqcrecord_andrology->LAF_MG->EditValue ?>"<?php echo $qaqcrecord_andrology->LAF_MG->editAttributes() ?>>
</span>
<?php echo $qaqcrecord_andrology->LAF_MG->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($qaqcrecord_andrology->LAF_Cleaned->Visible) { // LAF_Cleaned ?>
	<div id="r_LAF_Cleaned" class="form-group row">
		<label id="elh_qaqcrecord_andrology_LAF_Cleaned" class="<?php echo $qaqcrecord_andrology_add->LeftColumnClass ?>"><?php echo $qaqcrecord_andrology->LAF_Cleaned->caption() ?><?php echo ($qaqcrecord_andrology->LAF_Cleaned->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $qaqcrecord_andrology_add->RightColumnClass ?>"><div<?php echo $qaqcrecord_andrology->LAF_Cleaned->cellAttributes() ?>>
<span id="el_qaqcrecord_andrology_LAF_Cleaned">
<div id="tp_x_LAF_Cleaned" class="ew-template"><input type="checkbox" class="form-check-input" data-table="qaqcrecord_andrology" data-field="x_LAF_Cleaned" data-value-separator="<?php echo $qaqcrecord_andrology->LAF_Cleaned->displayValueSeparatorAttribute() ?>" name="x_LAF_Cleaned[]" id="x_LAF_Cleaned[]" value="{value}"<?php echo $qaqcrecord_andrology->LAF_Cleaned->editAttributes() ?>></div>
<div id="dsl_x_LAF_Cleaned" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $qaqcrecord_andrology->LAF_Cleaned->checkBoxListHtml(FALSE, "x_LAF_Cleaned[]") ?>
</div></div>
</span>
<?php echo $qaqcrecord_andrology->LAF_Cleaned->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($qaqcrecord_andrology->REF_Temp->Visible) { // REF_Temp ?>
	<div id="r_REF_Temp" class="form-group row">
		<label id="elh_qaqcrecord_andrology_REF_Temp" for="x_REF_Temp" class="<?php echo $qaqcrecord_andrology_add->LeftColumnClass ?>"><?php echo $qaqcrecord_andrology->REF_Temp->caption() ?><?php echo ($qaqcrecord_andrology->REF_Temp->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $qaqcrecord_andrology_add->RightColumnClass ?>"><div<?php echo $qaqcrecord_andrology->REF_Temp->cellAttributes() ?>>
<span id="el_qaqcrecord_andrology_REF_Temp">
<input type="text" data-table="qaqcrecord_andrology" data-field="x_REF_Temp" name="x_REF_Temp" id="x_REF_Temp" size="30" placeholder="<?php echo HtmlEncode($qaqcrecord_andrology->REF_Temp->getPlaceHolder()) ?>" value="<?php echo $qaqcrecord_andrology->REF_Temp->EditValue ?>"<?php echo $qaqcrecord_andrology->REF_Temp->editAttributes() ?>>
</span>
<?php echo $qaqcrecord_andrology->REF_Temp->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($qaqcrecord_andrology->REF_Cleaned->Visible) { // REF_Cleaned ?>
	<div id="r_REF_Cleaned" class="form-group row">
		<label id="elh_qaqcrecord_andrology_REF_Cleaned" class="<?php echo $qaqcrecord_andrology_add->LeftColumnClass ?>"><?php echo $qaqcrecord_andrology->REF_Cleaned->caption() ?><?php echo ($qaqcrecord_andrology->REF_Cleaned->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $qaqcrecord_andrology_add->RightColumnClass ?>"><div<?php echo $qaqcrecord_andrology->REF_Cleaned->cellAttributes() ?>>
<span id="el_qaqcrecord_andrology_REF_Cleaned">
<div id="tp_x_REF_Cleaned" class="ew-template"><input type="checkbox" class="form-check-input" data-table="qaqcrecord_andrology" data-field="x_REF_Cleaned" data-value-separator="<?php echo $qaqcrecord_andrology->REF_Cleaned->displayValueSeparatorAttribute() ?>" name="x_REF_Cleaned[]" id="x_REF_Cleaned[]" value="{value}"<?php echo $qaqcrecord_andrology->REF_Cleaned->editAttributes() ?>></div>
<div id="dsl_x_REF_Cleaned" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $qaqcrecord_andrology->REF_Cleaned->checkBoxListHtml(FALSE, "x_REF_Cleaned[]") ?>
</div></div>
</span>
<?php echo $qaqcrecord_andrology->REF_Cleaned->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($qaqcrecord_andrology->Heating_Temp->Visible) { // Heating_Temp ?>
	<div id="r_Heating_Temp" class="form-group row">
		<label id="elh_qaqcrecord_andrology_Heating_Temp" for="x_Heating_Temp" class="<?php echo $qaqcrecord_andrology_add->LeftColumnClass ?>"><?php echo $qaqcrecord_andrology->Heating_Temp->caption() ?><?php echo ($qaqcrecord_andrology->Heating_Temp->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $qaqcrecord_andrology_add->RightColumnClass ?>"><div<?php echo $qaqcrecord_andrology->Heating_Temp->cellAttributes() ?>>
<span id="el_qaqcrecord_andrology_Heating_Temp">
<input type="text" data-table="qaqcrecord_andrology" data-field="x_Heating_Temp" name="x_Heating_Temp" id="x_Heating_Temp" size="30" placeholder="<?php echo HtmlEncode($qaqcrecord_andrology->Heating_Temp->getPlaceHolder()) ?>" value="<?php echo $qaqcrecord_andrology->Heating_Temp->EditValue ?>"<?php echo $qaqcrecord_andrology->Heating_Temp->editAttributes() ?>>
</span>
<?php echo $qaqcrecord_andrology->Heating_Temp->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($qaqcrecord_andrology->Heating_Cleaned->Visible) { // Heating_Cleaned ?>
	<div id="r_Heating_Cleaned" class="form-group row">
		<label id="elh_qaqcrecord_andrology_Heating_Cleaned" class="<?php echo $qaqcrecord_andrology_add->LeftColumnClass ?>"><?php echo $qaqcrecord_andrology->Heating_Cleaned->caption() ?><?php echo ($qaqcrecord_andrology->Heating_Cleaned->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $qaqcrecord_andrology_add->RightColumnClass ?>"><div<?php echo $qaqcrecord_andrology->Heating_Cleaned->cellAttributes() ?>>
<span id="el_qaqcrecord_andrology_Heating_Cleaned">
<div id="tp_x_Heating_Cleaned" class="ew-template"><input type="checkbox" class="form-check-input" data-table="qaqcrecord_andrology" data-field="x_Heating_Cleaned" data-value-separator="<?php echo $qaqcrecord_andrology->Heating_Cleaned->displayValueSeparatorAttribute() ?>" name="x_Heating_Cleaned[]" id="x_Heating_Cleaned[]" value="{value}"<?php echo $qaqcrecord_andrology->Heating_Cleaned->editAttributes() ?>></div>
<div id="dsl_x_Heating_Cleaned" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $qaqcrecord_andrology->Heating_Cleaned->checkBoxListHtml(FALSE, "x_Heating_Cleaned[]") ?>
</div></div>
</span>
<?php echo $qaqcrecord_andrology->Heating_Cleaned->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$qaqcrecord_andrology_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $qaqcrecord_andrology_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $qaqcrecord_andrology_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$qaqcrecord_andrology_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$qaqcrecord_andrology_add->terminate();
?>