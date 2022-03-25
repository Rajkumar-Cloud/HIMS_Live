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
$view_ivf_oocytedenudation_embryology_chart_add = new view_ivf_oocytedenudation_embryology_chart_add();

// Run the page
$view_ivf_oocytedenudation_embryology_chart_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_ivf_oocytedenudation_embryology_chart_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fview_ivf_oocytedenudation_embryology_chartadd = currentForm = new ew.Form("fview_ivf_oocytedenudation_embryology_chartadd", "add");

// Validate form
fview_ivf_oocytedenudation_embryology_chartadd.validate = function() {
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
		<?php if ($view_ivf_oocytedenudation_embryology_chart_add->OocyteNo->Required) { ?>
			elm = this.getElements("x" + infix + "_OocyteNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_oocytedenudation_embryology_chart->OocyteNo->caption(), $view_ivf_oocytedenudation_embryology_chart->OocyteNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ivf_oocytedenudation_embryology_chart_add->Stage->Required) { ?>
			elm = this.getElements("x" + infix + "_Stage");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_oocytedenudation_embryology_chart->Stage->caption(), $view_ivf_oocytedenudation_embryology_chart->Stage->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ivf_oocytedenudation_embryology_chart_add->RIDNo->Required) { ?>
			elm = this.getElements("x" + infix + "_RIDNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_oocytedenudation_embryology_chart->RIDNo->caption(), $view_ivf_oocytedenudation_embryology_chart->RIDNo->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RIDNo");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_ivf_oocytedenudation_embryology_chart->RIDNo->errorMessage()) ?>");
		<?php if ($view_ivf_oocytedenudation_embryology_chart_add->Name->Required) { ?>
			elm = this.getElements("x" + infix + "_Name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_oocytedenudation_embryology_chart->Name->caption(), $view_ivf_oocytedenudation_embryology_chart->Name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ivf_oocytedenudation_embryology_chart_add->Day0OocyteStage->Required) { ?>
			elm = this.getElements("x" + infix + "_Day0OocyteStage");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_oocytedenudation_embryology_chart->Day0OocyteStage->caption(), $view_ivf_oocytedenudation_embryology_chart->Day0OocyteStage->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ivf_oocytedenudation_embryology_chart_add->Day0sino->Required) { ?>
			elm = this.getElements("x" + infix + "_Day0sino");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_oocytedenudation_embryology_chart->Day0sino->caption(), $view_ivf_oocytedenudation_embryology_chart->Day0sino->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ivf_oocytedenudation_embryology_chart_add->TidNo->Required) { ?>
			elm = this.getElements("x" + infix + "_TidNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_oocytedenudation_embryology_chart->TidNo->caption(), $view_ivf_oocytedenudation_embryology_chart->TidNo->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TidNo");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_ivf_oocytedenudation_embryology_chart->TidNo->errorMessage()) ?>");
		<?php if ($view_ivf_oocytedenudation_embryology_chart_add->DidNO->Required) { ?>
			elm = this.getElements("x" + infix + "_DidNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_oocytedenudation_embryology_chart->DidNO->caption(), $view_ivf_oocytedenudation_embryology_chart->DidNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($view_ivf_oocytedenudation_embryology_chart_add->Remarks->Required) { ?>
			elm = this.getElements("x" + infix + "_Remarks");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_oocytedenudation_embryology_chart->Remarks->caption(), $view_ivf_oocytedenudation_embryology_chart->Remarks->RequiredErrorMessage)) ?>");
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
fview_ivf_oocytedenudation_embryology_chartadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_ivf_oocytedenudation_embryology_chartadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $view_ivf_oocytedenudation_embryology_chart_add->showPageHeader(); ?>
<?php
$view_ivf_oocytedenudation_embryology_chart_add->showMessage();
?>
<form name="fview_ivf_oocytedenudation_embryology_chartadd" id="fview_ivf_oocytedenudation_embryology_chartadd" class="<?php echo $view_ivf_oocytedenudation_embryology_chart_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_ivf_oocytedenudation_embryology_chart_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_ivf_oocytedenudation_embryology_chart_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_ivf_oocytedenudation_embryology_chart">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$view_ivf_oocytedenudation_embryology_chart_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($view_ivf_oocytedenudation_embryology_chart->OocyteNo->Visible) { // OocyteNo ?>
	<div id="r_OocyteNo" class="form-group row">
		<label id="elh_view_ivf_oocytedenudation_embryology_chart_OocyteNo" for="x_OocyteNo" class="<?php echo $view_ivf_oocytedenudation_embryology_chart_add->LeftColumnClass ?>"><?php echo $view_ivf_oocytedenudation_embryology_chart->OocyteNo->caption() ?><?php echo ($view_ivf_oocytedenudation_embryology_chart->OocyteNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_ivf_oocytedenudation_embryology_chart_add->RightColumnClass ?>"><div<?php echo $view_ivf_oocytedenudation_embryology_chart->OocyteNo->cellAttributes() ?>>
<span id="el_view_ivf_oocytedenudation_embryology_chart_OocyteNo">
<input type="text" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_OocyteNo" name="x_OocyteNo" id="x_OocyteNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_oocytedenudation_embryology_chart->OocyteNo->getPlaceHolder()) ?>" value="<?php echo $view_ivf_oocytedenudation_embryology_chart->OocyteNo->EditValue ?>"<?php echo $view_ivf_oocytedenudation_embryology_chart->OocyteNo->editAttributes() ?>>
</span>
<?php echo $view_ivf_oocytedenudation_embryology_chart->OocyteNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart->Stage->Visible) { // Stage ?>
	<div id="r_Stage" class="form-group row">
		<label id="elh_view_ivf_oocytedenudation_embryology_chart_Stage" for="x_Stage" class="<?php echo $view_ivf_oocytedenudation_embryology_chart_add->LeftColumnClass ?>"><?php echo $view_ivf_oocytedenudation_embryology_chart->Stage->caption() ?><?php echo ($view_ivf_oocytedenudation_embryology_chart->Stage->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_ivf_oocytedenudation_embryology_chart_add->RightColumnClass ?>"><div<?php echo $view_ivf_oocytedenudation_embryology_chart->Stage->cellAttributes() ?>>
<span id="el_view_ivf_oocytedenudation_embryology_chart_Stage">
<input type="text" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_Stage" name="x_Stage" id="x_Stage" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_oocytedenudation_embryology_chart->Stage->getPlaceHolder()) ?>" value="<?php echo $view_ivf_oocytedenudation_embryology_chart->Stage->EditValue ?>"<?php echo $view_ivf_oocytedenudation_embryology_chart->Stage->editAttributes() ?>>
</span>
<?php echo $view_ivf_oocytedenudation_embryology_chart->Stage->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart->RIDNo->Visible) { // RIDNo ?>
	<div id="r_RIDNo" class="form-group row">
		<label id="elh_view_ivf_oocytedenudation_embryology_chart_RIDNo" for="x_RIDNo" class="<?php echo $view_ivf_oocytedenudation_embryology_chart_add->LeftColumnClass ?>"><?php echo $view_ivf_oocytedenudation_embryology_chart->RIDNo->caption() ?><?php echo ($view_ivf_oocytedenudation_embryology_chart->RIDNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_ivf_oocytedenudation_embryology_chart_add->RightColumnClass ?>"><div<?php echo $view_ivf_oocytedenudation_embryology_chart->RIDNo->cellAttributes() ?>>
<span id="el_view_ivf_oocytedenudation_embryology_chart_RIDNo">
<input type="text" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_RIDNo" name="x_RIDNo" id="x_RIDNo" size="30" placeholder="<?php echo HtmlEncode($view_ivf_oocytedenudation_embryology_chart->RIDNo->getPlaceHolder()) ?>" value="<?php echo $view_ivf_oocytedenudation_embryology_chart->RIDNo->EditValue ?>"<?php echo $view_ivf_oocytedenudation_embryology_chart->RIDNo->editAttributes() ?>>
</span>
<?php echo $view_ivf_oocytedenudation_embryology_chart->RIDNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart->Name->Visible) { // Name ?>
	<div id="r_Name" class="form-group row">
		<label id="elh_view_ivf_oocytedenudation_embryology_chart_Name" for="x_Name" class="<?php echo $view_ivf_oocytedenudation_embryology_chart_add->LeftColumnClass ?>"><?php echo $view_ivf_oocytedenudation_embryology_chart->Name->caption() ?><?php echo ($view_ivf_oocytedenudation_embryology_chart->Name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_ivf_oocytedenudation_embryology_chart_add->RightColumnClass ?>"><div<?php echo $view_ivf_oocytedenudation_embryology_chart->Name->cellAttributes() ?>>
<span id="el_view_ivf_oocytedenudation_embryology_chart_Name">
<input type="text" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_oocytedenudation_embryology_chart->Name->getPlaceHolder()) ?>" value="<?php echo $view_ivf_oocytedenudation_embryology_chart->Name->EditValue ?>"<?php echo $view_ivf_oocytedenudation_embryology_chart->Name->editAttributes() ?>>
</span>
<?php echo $view_ivf_oocytedenudation_embryology_chart->Name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart->Day0OocyteStage->Visible) { // Day0OocyteStage ?>
	<div id="r_Day0OocyteStage" class="form-group row">
		<label id="elh_view_ivf_oocytedenudation_embryology_chart_Day0OocyteStage" for="x_Day0OocyteStage" class="<?php echo $view_ivf_oocytedenudation_embryology_chart_add->LeftColumnClass ?>"><?php echo $view_ivf_oocytedenudation_embryology_chart->Day0OocyteStage->caption() ?><?php echo ($view_ivf_oocytedenudation_embryology_chart->Day0OocyteStage->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_ivf_oocytedenudation_embryology_chart_add->RightColumnClass ?>"><div<?php echo $view_ivf_oocytedenudation_embryology_chart->Day0OocyteStage->cellAttributes() ?>>
<span id="el_view_ivf_oocytedenudation_embryology_chart_Day0OocyteStage">
<input type="text" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_Day0OocyteStage" name="x_Day0OocyteStage" id="x_Day0OocyteStage" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_oocytedenudation_embryology_chart->Day0OocyteStage->getPlaceHolder()) ?>" value="<?php echo $view_ivf_oocytedenudation_embryology_chart->Day0OocyteStage->EditValue ?>"<?php echo $view_ivf_oocytedenudation_embryology_chart->Day0OocyteStage->editAttributes() ?>>
</span>
<?php echo $view_ivf_oocytedenudation_embryology_chart->Day0OocyteStage->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart->Day0sino->Visible) { // Day0sino ?>
	<div id="r_Day0sino" class="form-group row">
		<label id="elh_view_ivf_oocytedenudation_embryology_chart_Day0sino" for="x_Day0sino" class="<?php echo $view_ivf_oocytedenudation_embryology_chart_add->LeftColumnClass ?>"><?php echo $view_ivf_oocytedenudation_embryology_chart->Day0sino->caption() ?><?php echo ($view_ivf_oocytedenudation_embryology_chart->Day0sino->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_ivf_oocytedenudation_embryology_chart_add->RightColumnClass ?>"><div<?php echo $view_ivf_oocytedenudation_embryology_chart->Day0sino->cellAttributes() ?>>
<span id="el_view_ivf_oocytedenudation_embryology_chart_Day0sino">
<input type="text" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_Day0sino" name="x_Day0sino" id="x_Day0sino" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_oocytedenudation_embryology_chart->Day0sino->getPlaceHolder()) ?>" value="<?php echo $view_ivf_oocytedenudation_embryology_chart->Day0sino->EditValue ?>"<?php echo $view_ivf_oocytedenudation_embryology_chart->Day0sino->editAttributes() ?>>
</span>
<?php echo $view_ivf_oocytedenudation_embryology_chart->Day0sino->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart->TidNo->Visible) { // TidNo ?>
	<div id="r_TidNo" class="form-group row">
		<label id="elh_view_ivf_oocytedenudation_embryology_chart_TidNo" for="x_TidNo" class="<?php echo $view_ivf_oocytedenudation_embryology_chart_add->LeftColumnClass ?>"><?php echo $view_ivf_oocytedenudation_embryology_chart->TidNo->caption() ?><?php echo ($view_ivf_oocytedenudation_embryology_chart->TidNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_ivf_oocytedenudation_embryology_chart_add->RightColumnClass ?>"><div<?php echo $view_ivf_oocytedenudation_embryology_chart->TidNo->cellAttributes() ?>>
<span id="el_view_ivf_oocytedenudation_embryology_chart_TidNo">
<input type="text" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?php echo HtmlEncode($view_ivf_oocytedenudation_embryology_chart->TidNo->getPlaceHolder()) ?>" value="<?php echo $view_ivf_oocytedenudation_embryology_chart->TidNo->EditValue ?>"<?php echo $view_ivf_oocytedenudation_embryology_chart->TidNo->editAttributes() ?>>
</span>
<?php echo $view_ivf_oocytedenudation_embryology_chart->TidNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart->DidNO->Visible) { // DidNO ?>
	<div id="r_DidNO" class="form-group row">
		<label id="elh_view_ivf_oocytedenudation_embryology_chart_DidNO" for="x_DidNO" class="<?php echo $view_ivf_oocytedenudation_embryology_chart_add->LeftColumnClass ?>"><?php echo $view_ivf_oocytedenudation_embryology_chart->DidNO->caption() ?><?php echo ($view_ivf_oocytedenudation_embryology_chart->DidNO->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_ivf_oocytedenudation_embryology_chart_add->RightColumnClass ?>"><div<?php echo $view_ivf_oocytedenudation_embryology_chart->DidNO->cellAttributes() ?>>
<span id="el_view_ivf_oocytedenudation_embryology_chart_DidNO">
<input type="text" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_DidNO" name="x_DidNO" id="x_DidNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_oocytedenudation_embryology_chart->DidNO->getPlaceHolder()) ?>" value="<?php echo $view_ivf_oocytedenudation_embryology_chart->DidNO->EditValue ?>"<?php echo $view_ivf_oocytedenudation_embryology_chart->DidNO->editAttributes() ?>>
</span>
<?php echo $view_ivf_oocytedenudation_embryology_chart->DidNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart->Remarks->Visible) { // Remarks ?>
	<div id="r_Remarks" class="form-group row">
		<label id="elh_view_ivf_oocytedenudation_embryology_chart_Remarks" for="x_Remarks" class="<?php echo $view_ivf_oocytedenudation_embryology_chart_add->LeftColumnClass ?>"><?php echo $view_ivf_oocytedenudation_embryology_chart->Remarks->caption() ?><?php echo ($view_ivf_oocytedenudation_embryology_chart->Remarks->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $view_ivf_oocytedenudation_embryology_chart_add->RightColumnClass ?>"><div<?php echo $view_ivf_oocytedenudation_embryology_chart->Remarks->cellAttributes() ?>>
<span id="el_view_ivf_oocytedenudation_embryology_chart_Remarks">
<input type="text" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_oocytedenudation_embryology_chart->Remarks->getPlaceHolder()) ?>" value="<?php echo $view_ivf_oocytedenudation_embryology_chart->Remarks->EditValue ?>"<?php echo $view_ivf_oocytedenudation_embryology_chart->Remarks->editAttributes() ?>>
</span>
<?php echo $view_ivf_oocytedenudation_embryology_chart->Remarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$view_ivf_oocytedenudation_embryology_chart_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $view_ivf_oocytedenudation_embryology_chart_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $view_ivf_oocytedenudation_embryology_chart_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$view_ivf_oocytedenudation_embryology_chart_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$view_ivf_oocytedenudation_embryology_chart_add->terminate();
?>