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
$view_ivf_oocytedenudation_embryology_chart_update = new view_ivf_oocytedenudation_embryology_chart_update();

// Run the page
$view_ivf_oocytedenudation_embryology_chart_update->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_ivf_oocytedenudation_embryology_chart_update->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "update";
var fview_ivf_oocytedenudation_embryology_chartupdate = currentForm = new ew.Form("fview_ivf_oocytedenudation_embryology_chartupdate", "update");

// Validate form
fview_ivf_oocytedenudation_embryology_chartupdate.validate = function() {
	if (!this.validateRequired)
		return true; // Ignore validation
	var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
	if ($fobj.find("#confirm").val() == "F")
		return true;
	if (!ew.updateSelected(fobj)) {
		ew.alert(ew.language.phrase("NoFieldSelected"));
		return false;
	}
	var elm, felm, uelm, addcnt = 0;
	var $k = $fobj.find("#" + this.formKeyCountName); // Get key_count
	var rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1;
	var startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
	var gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
	for (var i = startcnt; i <= rowcnt; i++) {
		var infix = ($k[0]) ? String(i) : "";
		$fobj.data("rowindex", infix);
		<?php if ($view_ivf_oocytedenudation_embryology_chart_update->OocyteNo->Required) { ?>
			elm = this.getElements("x" + infix + "_OocyteNo");
			uelm = this.getElements("u" + infix + "_OocyteNo");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_oocytedenudation_embryology_chart->OocyteNo->caption(), $view_ivf_oocytedenudation_embryology_chart->OocyteNo->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($view_ivf_oocytedenudation_embryology_chart_update->Stage->Required) { ?>
			elm = this.getElements("x" + infix + "_Stage");
			uelm = this.getElements("u" + infix + "_Stage");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_oocytedenudation_embryology_chart->Stage->caption(), $view_ivf_oocytedenudation_embryology_chart->Stage->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($view_ivf_oocytedenudation_embryology_chart_update->RIDNo->Required) { ?>
			elm = this.getElements("x" + infix + "_RIDNo");
			uelm = this.getElements("u" + infix + "_RIDNo");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_oocytedenudation_embryology_chart->RIDNo->caption(), $view_ivf_oocytedenudation_embryology_chart->RIDNo->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
			elm = this.getElements("x" + infix + "_RIDNo");
			uelm = this.getElements("u" + infix + "_RIDNo");
			if (uelm && uelm.checked && elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_ivf_oocytedenudation_embryology_chart->RIDNo->errorMessage()) ?>");
		<?php if ($view_ivf_oocytedenudation_embryology_chart_update->Name->Required) { ?>
			elm = this.getElements("x" + infix + "_Name");
			uelm = this.getElements("u" + infix + "_Name");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_oocytedenudation_embryology_chart->Name->caption(), $view_ivf_oocytedenudation_embryology_chart->Name->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($view_ivf_oocytedenudation_embryology_chart_update->Day0OocyteStage->Required) { ?>
			elm = this.getElements("x" + infix + "_Day0OocyteStage");
			uelm = this.getElements("u" + infix + "_Day0OocyteStage");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_oocytedenudation_embryology_chart->Day0OocyteStage->caption(), $view_ivf_oocytedenudation_embryology_chart->Day0OocyteStage->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($view_ivf_oocytedenudation_embryology_chart_update->Day0sino->Required) { ?>
			elm = this.getElements("x" + infix + "_Day0sino");
			uelm = this.getElements("u" + infix + "_Day0sino");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_oocytedenudation_embryology_chart->Day0sino->caption(), $view_ivf_oocytedenudation_embryology_chart->Day0sino->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($view_ivf_oocytedenudation_embryology_chart_update->TidNo->Required) { ?>
			elm = this.getElements("x" + infix + "_TidNo");
			uelm = this.getElements("u" + infix + "_TidNo");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_oocytedenudation_embryology_chart->TidNo->caption(), $view_ivf_oocytedenudation_embryology_chart->TidNo->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
			elm = this.getElements("x" + infix + "_TidNo");
			uelm = this.getElements("u" + infix + "_TidNo");
			if (uelm && uelm.checked && elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($view_ivf_oocytedenudation_embryology_chart->TidNo->errorMessage()) ?>");
		<?php if ($view_ivf_oocytedenudation_embryology_chart_update->DidNO->Required) { ?>
			elm = this.getElements("x" + infix + "_DidNO");
			uelm = this.getElements("u" + infix + "_DidNO");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_oocytedenudation_embryology_chart->DidNO->caption(), $view_ivf_oocytedenudation_embryology_chart->DidNO->RequiredErrorMessage)) ?>");
			}
		<?php } ?>
		<?php if ($view_ivf_oocytedenudation_embryology_chart_update->Remarks->Required) { ?>
			elm = this.getElements("x" + infix + "_Remarks");
			uelm = this.getElements("u" + infix + "_Remarks");
			if (uelm && uelm.checked) {
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_ivf_oocytedenudation_embryology_chart->Remarks->caption(), $view_ivf_oocytedenudation_embryology_chart->Remarks->RequiredErrorMessage)) ?>");
			}
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
	}
	return true;
}

// Form_CustomValidate event
fview_ivf_oocytedenudation_embryology_chartupdate.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_ivf_oocytedenudation_embryology_chartupdate.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $view_ivf_oocytedenudation_embryology_chart_update->showPageHeader(); ?>
<?php
$view_ivf_oocytedenudation_embryology_chart_update->showMessage();
?>
<form name="fview_ivf_oocytedenudation_embryology_chartupdate" id="fview_ivf_oocytedenudation_embryology_chartupdate" class="<?php echo $view_ivf_oocytedenudation_embryology_chart_update->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_ivf_oocytedenudation_embryology_chart_update->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_ivf_oocytedenudation_embryology_chart_update->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_ivf_oocytedenudation_embryology_chart">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$view_ivf_oocytedenudation_embryology_chart_update->IsModal ?>">
<?php foreach ($view_ivf_oocytedenudation_embryology_chart_update->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div id="tbl_view_ivf_oocytedenudation_embryology_chartupdate" class="ew-update-div"><!-- page -->
	<div class="form-check">
		<input type="checkbox" class="form-check-input" name="u" id="u" onclick="ew.selectAll(this);"><label class="form-check-label" for="u"><?php echo $Language->Phrase("UpdateSelectAll") ?></label>
	</div>
<?php if ($view_ivf_oocytedenudation_embryology_chart->OocyteNo->Visible) { // OocyteNo ?>
	<div id="r_OocyteNo" class="form-group row">
		<label for="x_OocyteNo" class="<?php echo $view_ivf_oocytedenudation_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_OocyteNo" id="u_OocyteNo" class="form-check-input ew-multi-select" value="1"<?php echo ($view_ivf_oocytedenudation_embryology_chart->OocyteNo->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_OocyteNo"><?php echo $view_ivf_oocytedenudation_embryology_chart->OocyteNo->caption() ?></label></div></label>
		<div class="<?php echo $view_ivf_oocytedenudation_embryology_chart_update->RightColumnClass ?>"><div<?php echo $view_ivf_oocytedenudation_embryology_chart->OocyteNo->cellAttributes() ?>>
<span id="el_view_ivf_oocytedenudation_embryology_chart_OocyteNo">
<input type="text" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_OocyteNo" name="x_OocyteNo" id="x_OocyteNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_oocytedenudation_embryology_chart->OocyteNo->getPlaceHolder()) ?>" value="<?php echo $view_ivf_oocytedenudation_embryology_chart->OocyteNo->EditValue ?>"<?php echo $view_ivf_oocytedenudation_embryology_chart->OocyteNo->editAttributes() ?>>
</span>
<?php echo $view_ivf_oocytedenudation_embryology_chart->OocyteNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart->Stage->Visible) { // Stage ?>
	<div id="r_Stage" class="form-group row">
		<label for="x_Stage" class="<?php echo $view_ivf_oocytedenudation_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Stage" id="u_Stage" class="form-check-input ew-multi-select" value="1"<?php echo ($view_ivf_oocytedenudation_embryology_chart->Stage->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Stage"><?php echo $view_ivf_oocytedenudation_embryology_chart->Stage->caption() ?></label></div></label>
		<div class="<?php echo $view_ivf_oocytedenudation_embryology_chart_update->RightColumnClass ?>"><div<?php echo $view_ivf_oocytedenudation_embryology_chart->Stage->cellAttributes() ?>>
<span id="el_view_ivf_oocytedenudation_embryology_chart_Stage">
<input type="text" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_Stage" name="x_Stage" id="x_Stage" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_oocytedenudation_embryology_chart->Stage->getPlaceHolder()) ?>" value="<?php echo $view_ivf_oocytedenudation_embryology_chart->Stage->EditValue ?>"<?php echo $view_ivf_oocytedenudation_embryology_chart->Stage->editAttributes() ?>>
</span>
<?php echo $view_ivf_oocytedenudation_embryology_chart->Stage->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart->RIDNo->Visible) { // RIDNo ?>
	<div id="r_RIDNo" class="form-group row">
		<label for="x_RIDNo" class="<?php echo $view_ivf_oocytedenudation_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_RIDNo" id="u_RIDNo" class="form-check-input ew-multi-select" value="1"<?php echo ($view_ivf_oocytedenudation_embryology_chart->RIDNo->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_RIDNo"><?php echo $view_ivf_oocytedenudation_embryology_chart->RIDNo->caption() ?></label></div></label>
		<div class="<?php echo $view_ivf_oocytedenudation_embryology_chart_update->RightColumnClass ?>"><div<?php echo $view_ivf_oocytedenudation_embryology_chart->RIDNo->cellAttributes() ?>>
<span id="el_view_ivf_oocytedenudation_embryology_chart_RIDNo">
<input type="text" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_RIDNo" name="x_RIDNo" id="x_RIDNo" size="30" placeholder="<?php echo HtmlEncode($view_ivf_oocytedenudation_embryology_chart->RIDNo->getPlaceHolder()) ?>" value="<?php echo $view_ivf_oocytedenudation_embryology_chart->RIDNo->EditValue ?>"<?php echo $view_ivf_oocytedenudation_embryology_chart->RIDNo->editAttributes() ?>>
</span>
<?php echo $view_ivf_oocytedenudation_embryology_chart->RIDNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart->Name->Visible) { // Name ?>
	<div id="r_Name" class="form-group row">
		<label for="x_Name" class="<?php echo $view_ivf_oocytedenudation_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Name" id="u_Name" class="form-check-input ew-multi-select" value="1"<?php echo ($view_ivf_oocytedenudation_embryology_chart->Name->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Name"><?php echo $view_ivf_oocytedenudation_embryology_chart->Name->caption() ?></label></div></label>
		<div class="<?php echo $view_ivf_oocytedenudation_embryology_chart_update->RightColumnClass ?>"><div<?php echo $view_ivf_oocytedenudation_embryology_chart->Name->cellAttributes() ?>>
<span id="el_view_ivf_oocytedenudation_embryology_chart_Name">
<input type="text" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_oocytedenudation_embryology_chart->Name->getPlaceHolder()) ?>" value="<?php echo $view_ivf_oocytedenudation_embryology_chart->Name->EditValue ?>"<?php echo $view_ivf_oocytedenudation_embryology_chart->Name->editAttributes() ?>>
</span>
<?php echo $view_ivf_oocytedenudation_embryology_chart->Name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart->Day0OocyteStage->Visible) { // Day0OocyteStage ?>
	<div id="r_Day0OocyteStage" class="form-group row">
		<label for="x_Day0OocyteStage" class="<?php echo $view_ivf_oocytedenudation_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Day0OocyteStage" id="u_Day0OocyteStage" class="form-check-input ew-multi-select" value="1"<?php echo ($view_ivf_oocytedenudation_embryology_chart->Day0OocyteStage->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Day0OocyteStage"><?php echo $view_ivf_oocytedenudation_embryology_chart->Day0OocyteStage->caption() ?></label></div></label>
		<div class="<?php echo $view_ivf_oocytedenudation_embryology_chart_update->RightColumnClass ?>"><div<?php echo $view_ivf_oocytedenudation_embryology_chart->Day0OocyteStage->cellAttributes() ?>>
<span id="el_view_ivf_oocytedenudation_embryology_chart_Day0OocyteStage">
<input type="text" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_Day0OocyteStage" name="x_Day0OocyteStage" id="x_Day0OocyteStage" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_oocytedenudation_embryology_chart->Day0OocyteStage->getPlaceHolder()) ?>" value="<?php echo $view_ivf_oocytedenudation_embryology_chart->Day0OocyteStage->EditValue ?>"<?php echo $view_ivf_oocytedenudation_embryology_chart->Day0OocyteStage->editAttributes() ?>>
</span>
<?php echo $view_ivf_oocytedenudation_embryology_chart->Day0OocyteStage->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart->Day0sino->Visible) { // Day0sino ?>
	<div id="r_Day0sino" class="form-group row">
		<label for="x_Day0sino" class="<?php echo $view_ivf_oocytedenudation_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Day0sino" id="u_Day0sino" class="form-check-input ew-multi-select" value="1"<?php echo ($view_ivf_oocytedenudation_embryology_chart->Day0sino->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Day0sino"><?php echo $view_ivf_oocytedenudation_embryology_chart->Day0sino->caption() ?></label></div></label>
		<div class="<?php echo $view_ivf_oocytedenudation_embryology_chart_update->RightColumnClass ?>"><div<?php echo $view_ivf_oocytedenudation_embryology_chart->Day0sino->cellAttributes() ?>>
<span id="el_view_ivf_oocytedenudation_embryology_chart_Day0sino">
<input type="text" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_Day0sino" name="x_Day0sino" id="x_Day0sino" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_oocytedenudation_embryology_chart->Day0sino->getPlaceHolder()) ?>" value="<?php echo $view_ivf_oocytedenudation_embryology_chart->Day0sino->EditValue ?>"<?php echo $view_ivf_oocytedenudation_embryology_chart->Day0sino->editAttributes() ?>>
</span>
<?php echo $view_ivf_oocytedenudation_embryology_chart->Day0sino->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart->TidNo->Visible) { // TidNo ?>
	<div id="r_TidNo" class="form-group row">
		<label for="x_TidNo" class="<?php echo $view_ivf_oocytedenudation_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_TidNo" id="u_TidNo" class="form-check-input ew-multi-select" value="1"<?php echo ($view_ivf_oocytedenudation_embryology_chart->TidNo->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_TidNo"><?php echo $view_ivf_oocytedenudation_embryology_chart->TidNo->caption() ?></label></div></label>
		<div class="<?php echo $view_ivf_oocytedenudation_embryology_chart_update->RightColumnClass ?>"><div<?php echo $view_ivf_oocytedenudation_embryology_chart->TidNo->cellAttributes() ?>>
<span id="el_view_ivf_oocytedenudation_embryology_chart_TidNo">
<input type="text" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?php echo HtmlEncode($view_ivf_oocytedenudation_embryology_chart->TidNo->getPlaceHolder()) ?>" value="<?php echo $view_ivf_oocytedenudation_embryology_chart->TidNo->EditValue ?>"<?php echo $view_ivf_oocytedenudation_embryology_chart->TidNo->editAttributes() ?>>
</span>
<?php echo $view_ivf_oocytedenudation_embryology_chart->TidNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart->DidNO->Visible) { // DidNO ?>
	<div id="r_DidNO" class="form-group row">
		<label for="x_DidNO" class="<?php echo $view_ivf_oocytedenudation_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_DidNO" id="u_DidNO" class="form-check-input ew-multi-select" value="1"<?php echo ($view_ivf_oocytedenudation_embryology_chart->DidNO->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_DidNO"><?php echo $view_ivf_oocytedenudation_embryology_chart->DidNO->caption() ?></label></div></label>
		<div class="<?php echo $view_ivf_oocytedenudation_embryology_chart_update->RightColumnClass ?>"><div<?php echo $view_ivf_oocytedenudation_embryology_chart->DidNO->cellAttributes() ?>>
<span id="el_view_ivf_oocytedenudation_embryology_chart_DidNO">
<input type="text" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_DidNO" name="x_DidNO" id="x_DidNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_oocytedenudation_embryology_chart->DidNO->getPlaceHolder()) ?>" value="<?php echo $view_ivf_oocytedenudation_embryology_chart->DidNO->EditValue ?>"<?php echo $view_ivf_oocytedenudation_embryology_chart->DidNO->editAttributes() ?>>
</span>
<?php echo $view_ivf_oocytedenudation_embryology_chart->DidNO->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_ivf_oocytedenudation_embryology_chart->Remarks->Visible) { // Remarks ?>
	<div id="r_Remarks" class="form-group row">
		<label for="x_Remarks" class="<?php echo $view_ivf_oocytedenudation_embryology_chart_update->LeftColumnClass ?>"><div class="form-check">
<input type="checkbox" name="u_Remarks" id="u_Remarks" class="form-check-input ew-multi-select" value="1"<?php echo ($view_ivf_oocytedenudation_embryology_chart->Remarks->MultiUpdate == "1") ? " checked" : "" ?>>
<label class="form-check-label" for="u_Remarks"><?php echo $view_ivf_oocytedenudation_embryology_chart->Remarks->caption() ?></label></div></label>
		<div class="<?php echo $view_ivf_oocytedenudation_embryology_chart_update->RightColumnClass ?>"><div<?php echo $view_ivf_oocytedenudation_embryology_chart->Remarks->cellAttributes() ?>>
<span id="el_view_ivf_oocytedenudation_embryology_chart_Remarks">
<input type="text" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_ivf_oocytedenudation_embryology_chart->Remarks->getPlaceHolder()) ?>" value="<?php echo $view_ivf_oocytedenudation_embryology_chart->Remarks->EditValue ?>"<?php echo $view_ivf_oocytedenudation_embryology_chart->Remarks->editAttributes() ?>>
</span>
<?php echo $view_ivf_oocytedenudation_embryology_chart->Remarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page -->
<?php if (!$view_ivf_oocytedenudation_embryology_chart_update->IsModal) { ?>
	<div class="form-group row"><!-- buttons .form-group -->
		<div class="<?php echo $view_ivf_oocytedenudation_embryology_chart_update->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("UpdateBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $view_ivf_oocytedenudation_embryology_chart_update->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
		</div><!-- /buttons offset -->
	</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$view_ivf_oocytedenudation_embryology_chart_update->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$view_ivf_oocytedenudation_embryology_chart_update->terminate();
?>