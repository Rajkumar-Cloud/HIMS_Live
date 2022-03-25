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
$lab_testname_edit = new lab_testname_edit();

// Run the page
$lab_testname_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_testname_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var flab_testnameedit = currentForm = new ew.Form("flab_testnameedit", "edit");

// Validate form
flab_testnameedit.validate = function() {
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
		<?php if ($lab_testname_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_testname->id->caption(), $lab_testname->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_testname_edit->TestCode->Required) { ?>
			elm = this.getElements("x" + infix + "_TestCode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_testname->TestCode->caption(), $lab_testname->TestCode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_testname_edit->Name->Required) { ?>
			elm = this.getElements("x" + infix + "_Name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_testname->Name->caption(), $lab_testname->Name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_testname_edit->SampleType->Required) { ?>
			elm = this.getElements("x" + infix + "_SampleType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_testname->SampleType->caption(), $lab_testname->SampleType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_testname_edit->Department->Required) { ?>
			elm = this.getElements("x" + infix + "_Department");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_testname->Department->caption(), $lab_testname->Department->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_testname_edit->schedule->Required) { ?>
			elm = this.getElements("x" + infix + "_schedule");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_testname->schedule->caption(), $lab_testname->schedule->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_testname_edit->Modified->Required) { ?>
			elm = this.getElements("x" + infix + "_Modified");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_testname->Modified->caption(), $lab_testname->Modified->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_testname_edit->ModifiedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_ModifiedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_testname->ModifiedBy->caption(), $lab_testname->ModifiedBy->RequiredErrorMessage)) ?>");
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
flab_testnameedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
flab_testnameedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
flab_testnameedit.lists["x_SampleType"] = <?php echo $lab_testname_edit->SampleType->Lookup->toClientList() ?>;
flab_testnameedit.lists["x_SampleType"].options = <?php echo JsonEncode($lab_testname_edit->SampleType->lookupOptions()) ?>;
flab_testnameedit.lists["x_Department"] = <?php echo $lab_testname_edit->Department->Lookup->toClientList() ?>;
flab_testnameedit.lists["x_Department"].options = <?php echo JsonEncode($lab_testname_edit->Department->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $lab_testname_edit->showPageHeader(); ?>
<?php
$lab_testname_edit->showMessage();
?>
<form name="flab_testnameedit" id="flab_testnameedit" class="<?php echo $lab_testname_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($lab_testname_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $lab_testname_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_testname">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$lab_testname_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($lab_testname->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_lab_testname_id" class="<?php echo $lab_testname_edit->LeftColumnClass ?>"><?php echo $lab_testname->id->caption() ?><?php echo ($lab_testname->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_testname_edit->RightColumnClass ?>"><div<?php echo $lab_testname->id->cellAttributes() ?>>
<span id="el_lab_testname_id">
<span<?php echo $lab_testname->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($lab_testname->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="lab_testname" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($lab_testname->id->CurrentValue) ?>">
<?php echo $lab_testname->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_testname->TestCode->Visible) { // TestCode ?>
	<div id="r_TestCode" class="form-group row">
		<label id="elh_lab_testname_TestCode" for="x_TestCode" class="<?php echo $lab_testname_edit->LeftColumnClass ?>"><?php echo $lab_testname->TestCode->caption() ?><?php echo ($lab_testname->TestCode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_testname_edit->RightColumnClass ?>"><div<?php echo $lab_testname->TestCode->cellAttributes() ?>>
<span id="el_lab_testname_TestCode">
<input type="text" data-table="lab_testname" data-field="x_TestCode" name="x_TestCode" id="x_TestCode" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($lab_testname->TestCode->getPlaceHolder()) ?>" value="<?php echo $lab_testname->TestCode->EditValue ?>"<?php echo $lab_testname->TestCode->editAttributes() ?>>
</span>
<?php echo $lab_testname->TestCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_testname->Name->Visible) { // Name ?>
	<div id="r_Name" class="form-group row">
		<label id="elh_lab_testname_Name" for="x_Name" class="<?php echo $lab_testname_edit->LeftColumnClass ?>"><?php echo $lab_testname->Name->caption() ?><?php echo ($lab_testname->Name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_testname_edit->RightColumnClass ?>"><div<?php echo $lab_testname->Name->cellAttributes() ?>>
<span id="el_lab_testname_Name">
<input type="text" data-table="lab_testname" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($lab_testname->Name->getPlaceHolder()) ?>" value="<?php echo $lab_testname->Name->EditValue ?>"<?php echo $lab_testname->Name->editAttributes() ?>>
</span>
<?php echo $lab_testname->Name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_testname->SampleType->Visible) { // SampleType ?>
	<div id="r_SampleType" class="form-group row">
		<label id="elh_lab_testname_SampleType" for="x_SampleType" class="<?php echo $lab_testname_edit->LeftColumnClass ?>"><?php echo $lab_testname->SampleType->caption() ?><?php echo ($lab_testname->SampleType->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_testname_edit->RightColumnClass ?>"><div<?php echo $lab_testname->SampleType->cellAttributes() ?>>
<span id="el_lab_testname_SampleType">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="lab_testname" data-field="x_SampleType" data-value-separator="<?php echo $lab_testname->SampleType->displayValueSeparatorAttribute() ?>" id="x_SampleType" name="x_SampleType"<?php echo $lab_testname->SampleType->editAttributes() ?>>
		<?php echo $lab_testname->SampleType->selectOptionListHtml("x_SampleType") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "lab_mas_sampletype") && !$lab_testname->SampleType->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_SampleType" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $lab_testname->SampleType->caption() ?>" data-title="<?php echo $lab_testname->SampleType->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_SampleType',url:'lab_mas_sampletypeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $lab_testname->SampleType->Lookup->getParamTag("p_x_SampleType") ?>
</span>
<?php echo $lab_testname->SampleType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_testname->Department->Visible) { // Department ?>
	<div id="r_Department" class="form-group row">
		<label id="elh_lab_testname_Department" for="x_Department" class="<?php echo $lab_testname_edit->LeftColumnClass ?>"><?php echo $lab_testname->Department->caption() ?><?php echo ($lab_testname->Department->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_testname_edit->RightColumnClass ?>"><div<?php echo $lab_testname->Department->cellAttributes() ?>>
<span id="el_lab_testname_Department">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="lab_testname" data-field="x_Department" data-value-separator="<?php echo $lab_testname->Department->displayValueSeparatorAttribute() ?>" id="x_Department" name="x_Department"<?php echo $lab_testname->Department->editAttributes() ?>>
		<?php echo $lab_testname->Department->selectOptionListHtml("x_Department") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "lab_mas_department") && !$lab_testname->Department->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_Department" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $lab_testname->Department->caption() ?>" data-title="<?php echo $lab_testname->Department->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_Department',url:'lab_mas_departmentaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $lab_testname->Department->Lookup->getParamTag("p_x_Department") ?>
</span>
<?php echo $lab_testname->Department->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_testname->schedule->Visible) { // schedule ?>
	<div id="r_schedule" class="form-group row">
		<label id="elh_lab_testname_schedule" for="x_schedule" class="<?php echo $lab_testname_edit->LeftColumnClass ?>"><?php echo $lab_testname->schedule->caption() ?><?php echo ($lab_testname->schedule->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_testname_edit->RightColumnClass ?>"><div<?php echo $lab_testname->schedule->cellAttributes() ?>>
<span id="el_lab_testname_schedule">
<input type="text" data-table="lab_testname" data-field="x_schedule" name="x_schedule" id="x_schedule" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($lab_testname->schedule->getPlaceHolder()) ?>" value="<?php echo $lab_testname->schedule->EditValue ?>"<?php echo $lab_testname->schedule->editAttributes() ?>>
</span>
<?php echo $lab_testname->schedule->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php
	if (in_array("lab_agerange", explode(",", $lab_testname->getCurrentDetailTable())) && $lab_agerange->DetailEdit) {
?>
<?php if ($lab_testname->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("lab_agerange", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "lab_agerangegrid.php" ?>
<?php } ?>
<?php if (!$lab_testname_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $lab_testname_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $lab_testname_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$lab_testname_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$lab_testname_edit->terminate();
?>