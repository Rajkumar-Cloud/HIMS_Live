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
$pres_indicationstable_edit = new pres_indicationstable_edit();

// Run the page
$pres_indicationstable_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_indicationstable_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fpres_indicationstableedit = currentForm = new ew.Form("fpres_indicationstableedit", "edit");

// Validate form
fpres_indicationstableedit.validate = function() {
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
		<?php if ($pres_indicationstable_edit->Sno->Required) { ?>
			elm = this.getElements("x" + infix + "_Sno");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_indicationstable->Sno->caption(), $pres_indicationstable->Sno->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_indicationstable_edit->Genericname->Required) { ?>
			elm = this.getElements("x" + infix + "_Genericname");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_indicationstable->Genericname->caption(), $pres_indicationstable->Genericname->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_indicationstable_edit->Indications->Required) { ?>
			elm = this.getElements("x" + infix + "_Indications");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_indicationstable->Indications->caption(), $pres_indicationstable->Indications->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_indicationstable_edit->Category->Required) { ?>
			elm = this.getElements("x" + infix + "_Category");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_indicationstable->Category->caption(), $pres_indicationstable->Category->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_indicationstable_edit->Min_Age->Required) { ?>
			elm = this.getElements("x" + infix + "_Min_Age");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_indicationstable->Min_Age->caption(), $pres_indicationstable->Min_Age->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Min_Age");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pres_indicationstable->Min_Age->errorMessage()) ?>");
		<?php if ($pres_indicationstable_edit->Min_Days->Required) { ?>
			elm = this.getElements("x" + infix + "_Min_Days");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_indicationstable->Min_Days->caption(), $pres_indicationstable->Min_Days->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_indicationstable_edit->Max_Age->Required) { ?>
			elm = this.getElements("x" + infix + "_Max_Age");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_indicationstable->Max_Age->caption(), $pres_indicationstable->Max_Age->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Max_Age");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pres_indicationstable->Max_Age->errorMessage()) ?>");
		<?php if ($pres_indicationstable_edit->Max_Days->Required) { ?>
			elm = this.getElements("x" + infix + "_Max_Days");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_indicationstable->Max_Days->caption(), $pres_indicationstable->Max_Days->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_indicationstable_edit->_Route->Required) { ?>
			elm = this.getElements("x" + infix + "__Route");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_indicationstable->_Route->caption(), $pres_indicationstable->_Route->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_indicationstable_edit->Form->Required) { ?>
			elm = this.getElements("x" + infix + "_Form");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_indicationstable->Form->caption(), $pres_indicationstable->Form->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_indicationstable_edit->Min_Dose_Val->Required) { ?>
			elm = this.getElements("x" + infix + "_Min_Dose_Val");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_indicationstable->Min_Dose_Val->caption(), $pres_indicationstable->Min_Dose_Val->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Min_Dose_Val");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pres_indicationstable->Min_Dose_Val->errorMessage()) ?>");
		<?php if ($pres_indicationstable_edit->Min_Dose_Unit->Required) { ?>
			elm = this.getElements("x" + infix + "_Min_Dose_Unit");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_indicationstable->Min_Dose_Unit->caption(), $pres_indicationstable->Min_Dose_Unit->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_indicationstable_edit->Max_Dose_Val->Required) { ?>
			elm = this.getElements("x" + infix + "_Max_Dose_Val");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_indicationstable->Max_Dose_Val->caption(), $pres_indicationstable->Max_Dose_Val->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Max_Dose_Val");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pres_indicationstable->Max_Dose_Val->errorMessage()) ?>");
		<?php if ($pres_indicationstable_edit->Max_Dose_Unit->Required) { ?>
			elm = this.getElements("x" + infix + "_Max_Dose_Unit");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_indicationstable->Max_Dose_Unit->caption(), $pres_indicationstable->Max_Dose_Unit->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_indicationstable_edit->Frequency->Required) { ?>
			elm = this.getElements("x" + infix + "_Frequency");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_indicationstable->Frequency->caption(), $pres_indicationstable->Frequency->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_indicationstable_edit->Duration->Required) { ?>
			elm = this.getElements("x" + infix + "_Duration");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_indicationstable->Duration->caption(), $pres_indicationstable->Duration->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Duration");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($pres_indicationstable->Duration->errorMessage()) ?>");
		<?php if ($pres_indicationstable_edit->DWMY->Required) { ?>
			elm = this.getElements("x" + infix + "_DWMY");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_indicationstable->DWMY->caption(), $pres_indicationstable->DWMY->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_indicationstable_edit->Contraindications->Required) { ?>
			elm = this.getElements("x" + infix + "_Contraindications");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_indicationstable->Contraindications->caption(), $pres_indicationstable->Contraindications->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($pres_indicationstable_edit->RecStatus->Required) { ?>
			elm = this.getElements("x" + infix + "_RecStatus");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_indicationstable->RecStatus->caption(), $pres_indicationstable->RecStatus->RequiredErrorMessage)) ?>");
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
fpres_indicationstableedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpres_indicationstableedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $pres_indicationstable_edit->showPageHeader(); ?>
<?php
$pres_indicationstable_edit->showMessage();
?>
<form name="fpres_indicationstableedit" id="fpres_indicationstableedit" class="<?php echo $pres_indicationstable_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pres_indicationstable_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pres_indicationstable_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_indicationstable">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$pres_indicationstable_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($pres_indicationstable->Sno->Visible) { // Sno ?>
	<div id="r_Sno" class="form-group row">
		<label id="elh_pres_indicationstable_Sno" class="<?php echo $pres_indicationstable_edit->LeftColumnClass ?>"><?php echo $pres_indicationstable->Sno->caption() ?><?php echo ($pres_indicationstable->Sno->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_indicationstable_edit->RightColumnClass ?>"><div<?php echo $pres_indicationstable->Sno->cellAttributes() ?>>
<span id="el_pres_indicationstable_Sno">
<span<?php echo $pres_indicationstable->Sno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($pres_indicationstable->Sno->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="pres_indicationstable" data-field="x_Sno" name="x_Sno" id="x_Sno" value="<?php echo HtmlEncode($pres_indicationstable->Sno->CurrentValue) ?>">
<?php echo $pres_indicationstable->Sno->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_indicationstable->Genericname->Visible) { // Genericname ?>
	<div id="r_Genericname" class="form-group row">
		<label id="elh_pres_indicationstable_Genericname" for="x_Genericname" class="<?php echo $pres_indicationstable_edit->LeftColumnClass ?>"><?php echo $pres_indicationstable->Genericname->caption() ?><?php echo ($pres_indicationstable->Genericname->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_indicationstable_edit->RightColumnClass ?>"><div<?php echo $pres_indicationstable->Genericname->cellAttributes() ?>>
<span id="el_pres_indicationstable_Genericname">
<input type="text" data-table="pres_indicationstable" data-field="x_Genericname" name="x_Genericname" id="x_Genericname" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pres_indicationstable->Genericname->getPlaceHolder()) ?>" value="<?php echo $pres_indicationstable->Genericname->EditValue ?>"<?php echo $pres_indicationstable->Genericname->editAttributes() ?>>
</span>
<?php echo $pres_indicationstable->Genericname->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_indicationstable->Indications->Visible) { // Indications ?>
	<div id="r_Indications" class="form-group row">
		<label id="elh_pres_indicationstable_Indications" for="x_Indications" class="<?php echo $pres_indicationstable_edit->LeftColumnClass ?>"><?php echo $pres_indicationstable->Indications->caption() ?><?php echo ($pres_indicationstable->Indications->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_indicationstable_edit->RightColumnClass ?>"><div<?php echo $pres_indicationstable->Indications->cellAttributes() ?>>
<span id="el_pres_indicationstable_Indications">
<input type="text" data-table="pres_indicationstable" data-field="x_Indications" name="x_Indications" id="x_Indications" placeholder="<?php echo HtmlEncode($pres_indicationstable->Indications->getPlaceHolder()) ?>" value="<?php echo $pres_indicationstable->Indications->EditValue ?>"<?php echo $pres_indicationstable->Indications->editAttributes() ?>>
</span>
<?php echo $pres_indicationstable->Indications->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_indicationstable->Category->Visible) { // Category ?>
	<div id="r_Category" class="form-group row">
		<label id="elh_pres_indicationstable_Category" for="x_Category" class="<?php echo $pres_indicationstable_edit->LeftColumnClass ?>"><?php echo $pres_indicationstable->Category->caption() ?><?php echo ($pres_indicationstable->Category->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_indicationstable_edit->RightColumnClass ?>"><div<?php echo $pres_indicationstable->Category->cellAttributes() ?>>
<span id="el_pres_indicationstable_Category">
<input type="text" data-table="pres_indicationstable" data-field="x_Category" name="x_Category" id="x_Category" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_indicationstable->Category->getPlaceHolder()) ?>" value="<?php echo $pres_indicationstable->Category->EditValue ?>"<?php echo $pres_indicationstable->Category->editAttributes() ?>>
</span>
<?php echo $pres_indicationstable->Category->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_indicationstable->Min_Age->Visible) { // Min_Age ?>
	<div id="r_Min_Age" class="form-group row">
		<label id="elh_pres_indicationstable_Min_Age" for="x_Min_Age" class="<?php echo $pres_indicationstable_edit->LeftColumnClass ?>"><?php echo $pres_indicationstable->Min_Age->caption() ?><?php echo ($pres_indicationstable->Min_Age->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_indicationstable_edit->RightColumnClass ?>"><div<?php echo $pres_indicationstable->Min_Age->cellAttributes() ?>>
<span id="el_pres_indicationstable_Min_Age">
<input type="text" data-table="pres_indicationstable" data-field="x_Min_Age" name="x_Min_Age" id="x_Min_Age" size="30" placeholder="<?php echo HtmlEncode($pres_indicationstable->Min_Age->getPlaceHolder()) ?>" value="<?php echo $pres_indicationstable->Min_Age->EditValue ?>"<?php echo $pres_indicationstable->Min_Age->editAttributes() ?>>
</span>
<?php echo $pres_indicationstable->Min_Age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_indicationstable->Min_Days->Visible) { // Min_Days ?>
	<div id="r_Min_Days" class="form-group row">
		<label id="elh_pres_indicationstable_Min_Days" for="x_Min_Days" class="<?php echo $pres_indicationstable_edit->LeftColumnClass ?>"><?php echo $pres_indicationstable->Min_Days->caption() ?><?php echo ($pres_indicationstable->Min_Days->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_indicationstable_edit->RightColumnClass ?>"><div<?php echo $pres_indicationstable->Min_Days->cellAttributes() ?>>
<span id="el_pres_indicationstable_Min_Days">
<input type="text" data-table="pres_indicationstable" data-field="x_Min_Days" name="x_Min_Days" id="x_Min_Days" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_indicationstable->Min_Days->getPlaceHolder()) ?>" value="<?php echo $pres_indicationstable->Min_Days->EditValue ?>"<?php echo $pres_indicationstable->Min_Days->editAttributes() ?>>
</span>
<?php echo $pres_indicationstable->Min_Days->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_indicationstable->Max_Age->Visible) { // Max_Age ?>
	<div id="r_Max_Age" class="form-group row">
		<label id="elh_pres_indicationstable_Max_Age" for="x_Max_Age" class="<?php echo $pres_indicationstable_edit->LeftColumnClass ?>"><?php echo $pres_indicationstable->Max_Age->caption() ?><?php echo ($pres_indicationstable->Max_Age->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_indicationstable_edit->RightColumnClass ?>"><div<?php echo $pres_indicationstable->Max_Age->cellAttributes() ?>>
<span id="el_pres_indicationstable_Max_Age">
<input type="text" data-table="pres_indicationstable" data-field="x_Max_Age" name="x_Max_Age" id="x_Max_Age" size="30" placeholder="<?php echo HtmlEncode($pres_indicationstable->Max_Age->getPlaceHolder()) ?>" value="<?php echo $pres_indicationstable->Max_Age->EditValue ?>"<?php echo $pres_indicationstable->Max_Age->editAttributes() ?>>
</span>
<?php echo $pres_indicationstable->Max_Age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_indicationstable->Max_Days->Visible) { // Max_Days ?>
	<div id="r_Max_Days" class="form-group row">
		<label id="elh_pres_indicationstable_Max_Days" for="x_Max_Days" class="<?php echo $pres_indicationstable_edit->LeftColumnClass ?>"><?php echo $pres_indicationstable->Max_Days->caption() ?><?php echo ($pres_indicationstable->Max_Days->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_indicationstable_edit->RightColumnClass ?>"><div<?php echo $pres_indicationstable->Max_Days->cellAttributes() ?>>
<span id="el_pres_indicationstable_Max_Days">
<input type="text" data-table="pres_indicationstable" data-field="x_Max_Days" name="x_Max_Days" id="x_Max_Days" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_indicationstable->Max_Days->getPlaceHolder()) ?>" value="<?php echo $pres_indicationstable->Max_Days->EditValue ?>"<?php echo $pres_indicationstable->Max_Days->editAttributes() ?>>
</span>
<?php echo $pres_indicationstable->Max_Days->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_indicationstable->_Route->Visible) { // Route ?>
	<div id="r__Route" class="form-group row">
		<label id="elh_pres_indicationstable__Route" for="x__Route" class="<?php echo $pres_indicationstable_edit->LeftColumnClass ?>"><?php echo $pres_indicationstable->_Route->caption() ?><?php echo ($pres_indicationstable->_Route->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_indicationstable_edit->RightColumnClass ?>"><div<?php echo $pres_indicationstable->_Route->cellAttributes() ?>>
<span id="el_pres_indicationstable__Route">
<input type="text" data-table="pres_indicationstable" data-field="x__Route" name="x__Route" id="x__Route" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_indicationstable->_Route->getPlaceHolder()) ?>" value="<?php echo $pres_indicationstable->_Route->EditValue ?>"<?php echo $pres_indicationstable->_Route->editAttributes() ?>>
</span>
<?php echo $pres_indicationstable->_Route->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_indicationstable->Form->Visible) { // Form ?>
	<div id="r_Form" class="form-group row">
		<label id="elh_pres_indicationstable_Form" for="x_Form" class="<?php echo $pres_indicationstable_edit->LeftColumnClass ?>"><?php echo $pres_indicationstable->Form->caption() ?><?php echo ($pres_indicationstable->Form->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_indicationstable_edit->RightColumnClass ?>"><div<?php echo $pres_indicationstable->Form->cellAttributes() ?>>
<span id="el_pres_indicationstable_Form">
<input type="text" data-table="pres_indicationstable" data-field="x_Form" name="x_Form" id="x_Form" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_indicationstable->Form->getPlaceHolder()) ?>" value="<?php echo $pres_indicationstable->Form->EditValue ?>"<?php echo $pres_indicationstable->Form->editAttributes() ?>>
</span>
<?php echo $pres_indicationstable->Form->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_indicationstable->Min_Dose_Val->Visible) { // Min_Dose_Val ?>
	<div id="r_Min_Dose_Val" class="form-group row">
		<label id="elh_pres_indicationstable_Min_Dose_Val" for="x_Min_Dose_Val" class="<?php echo $pres_indicationstable_edit->LeftColumnClass ?>"><?php echo $pres_indicationstable->Min_Dose_Val->caption() ?><?php echo ($pres_indicationstable->Min_Dose_Val->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_indicationstable_edit->RightColumnClass ?>"><div<?php echo $pres_indicationstable->Min_Dose_Val->cellAttributes() ?>>
<span id="el_pres_indicationstable_Min_Dose_Val">
<input type="text" data-table="pres_indicationstable" data-field="x_Min_Dose_Val" name="x_Min_Dose_Val" id="x_Min_Dose_Val" size="30" placeholder="<?php echo HtmlEncode($pres_indicationstable->Min_Dose_Val->getPlaceHolder()) ?>" value="<?php echo $pres_indicationstable->Min_Dose_Val->EditValue ?>"<?php echo $pres_indicationstable->Min_Dose_Val->editAttributes() ?>>
</span>
<?php echo $pres_indicationstable->Min_Dose_Val->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_indicationstable->Min_Dose_Unit->Visible) { // Min_Dose_Unit ?>
	<div id="r_Min_Dose_Unit" class="form-group row">
		<label id="elh_pres_indicationstable_Min_Dose_Unit" for="x_Min_Dose_Unit" class="<?php echo $pres_indicationstable_edit->LeftColumnClass ?>"><?php echo $pres_indicationstable->Min_Dose_Unit->caption() ?><?php echo ($pres_indicationstable->Min_Dose_Unit->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_indicationstable_edit->RightColumnClass ?>"><div<?php echo $pres_indicationstable->Min_Dose_Unit->cellAttributes() ?>>
<span id="el_pres_indicationstable_Min_Dose_Unit">
<input type="text" data-table="pres_indicationstable" data-field="x_Min_Dose_Unit" name="x_Min_Dose_Unit" id="x_Min_Dose_Unit" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_indicationstable->Min_Dose_Unit->getPlaceHolder()) ?>" value="<?php echo $pres_indicationstable->Min_Dose_Unit->EditValue ?>"<?php echo $pres_indicationstable->Min_Dose_Unit->editAttributes() ?>>
</span>
<?php echo $pres_indicationstable->Min_Dose_Unit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_indicationstable->Max_Dose_Val->Visible) { // Max_Dose_Val ?>
	<div id="r_Max_Dose_Val" class="form-group row">
		<label id="elh_pres_indicationstable_Max_Dose_Val" for="x_Max_Dose_Val" class="<?php echo $pres_indicationstable_edit->LeftColumnClass ?>"><?php echo $pres_indicationstable->Max_Dose_Val->caption() ?><?php echo ($pres_indicationstable->Max_Dose_Val->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_indicationstable_edit->RightColumnClass ?>"><div<?php echo $pres_indicationstable->Max_Dose_Val->cellAttributes() ?>>
<span id="el_pres_indicationstable_Max_Dose_Val">
<input type="text" data-table="pres_indicationstable" data-field="x_Max_Dose_Val" name="x_Max_Dose_Val" id="x_Max_Dose_Val" size="30" placeholder="<?php echo HtmlEncode($pres_indicationstable->Max_Dose_Val->getPlaceHolder()) ?>" value="<?php echo $pres_indicationstable->Max_Dose_Val->EditValue ?>"<?php echo $pres_indicationstable->Max_Dose_Val->editAttributes() ?>>
</span>
<?php echo $pres_indicationstable->Max_Dose_Val->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_indicationstable->Max_Dose_Unit->Visible) { // Max_Dose_Unit ?>
	<div id="r_Max_Dose_Unit" class="form-group row">
		<label id="elh_pres_indicationstable_Max_Dose_Unit" for="x_Max_Dose_Unit" class="<?php echo $pres_indicationstable_edit->LeftColumnClass ?>"><?php echo $pres_indicationstable->Max_Dose_Unit->caption() ?><?php echo ($pres_indicationstable->Max_Dose_Unit->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_indicationstable_edit->RightColumnClass ?>"><div<?php echo $pres_indicationstable->Max_Dose_Unit->cellAttributes() ?>>
<span id="el_pres_indicationstable_Max_Dose_Unit">
<input type="text" data-table="pres_indicationstable" data-field="x_Max_Dose_Unit" name="x_Max_Dose_Unit" id="x_Max_Dose_Unit" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_indicationstable->Max_Dose_Unit->getPlaceHolder()) ?>" value="<?php echo $pres_indicationstable->Max_Dose_Unit->EditValue ?>"<?php echo $pres_indicationstable->Max_Dose_Unit->editAttributes() ?>>
</span>
<?php echo $pres_indicationstable->Max_Dose_Unit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_indicationstable->Frequency->Visible) { // Frequency ?>
	<div id="r_Frequency" class="form-group row">
		<label id="elh_pres_indicationstable_Frequency" for="x_Frequency" class="<?php echo $pres_indicationstable_edit->LeftColumnClass ?>"><?php echo $pres_indicationstable->Frequency->caption() ?><?php echo ($pres_indicationstable->Frequency->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_indicationstable_edit->RightColumnClass ?>"><div<?php echo $pres_indicationstable->Frequency->cellAttributes() ?>>
<span id="el_pres_indicationstable_Frequency">
<input type="text" data-table="pres_indicationstable" data-field="x_Frequency" name="x_Frequency" id="x_Frequency" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_indicationstable->Frequency->getPlaceHolder()) ?>" value="<?php echo $pres_indicationstable->Frequency->EditValue ?>"<?php echo $pres_indicationstable->Frequency->editAttributes() ?>>
</span>
<?php echo $pres_indicationstable->Frequency->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_indicationstable->Duration->Visible) { // Duration ?>
	<div id="r_Duration" class="form-group row">
		<label id="elh_pres_indicationstable_Duration" for="x_Duration" class="<?php echo $pres_indicationstable_edit->LeftColumnClass ?>"><?php echo $pres_indicationstable->Duration->caption() ?><?php echo ($pres_indicationstable->Duration->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_indicationstable_edit->RightColumnClass ?>"><div<?php echo $pres_indicationstable->Duration->cellAttributes() ?>>
<span id="el_pres_indicationstable_Duration">
<input type="text" data-table="pres_indicationstable" data-field="x_Duration" name="x_Duration" id="x_Duration" size="30" placeholder="<?php echo HtmlEncode($pres_indicationstable->Duration->getPlaceHolder()) ?>" value="<?php echo $pres_indicationstable->Duration->EditValue ?>"<?php echo $pres_indicationstable->Duration->editAttributes() ?>>
</span>
<?php echo $pres_indicationstable->Duration->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_indicationstable->DWMY->Visible) { // DWMY ?>
	<div id="r_DWMY" class="form-group row">
		<label id="elh_pres_indicationstable_DWMY" for="x_DWMY" class="<?php echo $pres_indicationstable_edit->LeftColumnClass ?>"><?php echo $pres_indicationstable->DWMY->caption() ?><?php echo ($pres_indicationstable->DWMY->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_indicationstable_edit->RightColumnClass ?>"><div<?php echo $pres_indicationstable->DWMY->cellAttributes() ?>>
<span id="el_pres_indicationstable_DWMY">
<input type="text" data-table="pres_indicationstable" data-field="x_DWMY" name="x_DWMY" id="x_DWMY" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_indicationstable->DWMY->getPlaceHolder()) ?>" value="<?php echo $pres_indicationstable->DWMY->EditValue ?>"<?php echo $pres_indicationstable->DWMY->editAttributes() ?>>
</span>
<?php echo $pres_indicationstable->DWMY->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_indicationstable->Contraindications->Visible) { // Contraindications ?>
	<div id="r_Contraindications" class="form-group row">
		<label id="elh_pres_indicationstable_Contraindications" for="x_Contraindications" class="<?php echo $pres_indicationstable_edit->LeftColumnClass ?>"><?php echo $pres_indicationstable->Contraindications->caption() ?><?php echo ($pres_indicationstable->Contraindications->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_indicationstable_edit->RightColumnClass ?>"><div<?php echo $pres_indicationstable->Contraindications->cellAttributes() ?>>
<span id="el_pres_indicationstable_Contraindications">
<input type="text" data-table="pres_indicationstable" data-field="x_Contraindications" name="x_Contraindications" id="x_Contraindications" placeholder="<?php echo HtmlEncode($pres_indicationstable->Contraindications->getPlaceHolder()) ?>" value="<?php echo $pres_indicationstable->Contraindications->EditValue ?>"<?php echo $pres_indicationstable->Contraindications->editAttributes() ?>>
</span>
<?php echo $pres_indicationstable->Contraindications->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_indicationstable->RecStatus->Visible) { // RecStatus ?>
	<div id="r_RecStatus" class="form-group row">
		<label id="elh_pres_indicationstable_RecStatus" for="x_RecStatus" class="<?php echo $pres_indicationstable_edit->LeftColumnClass ?>"><?php echo $pres_indicationstable->RecStatus->caption() ?><?php echo ($pres_indicationstable->RecStatus->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_indicationstable_edit->RightColumnClass ?>"><div<?php echo $pres_indicationstable->RecStatus->cellAttributes() ?>>
<span id="el_pres_indicationstable_RecStatus">
<input type="text" data-table="pres_indicationstable" data-field="x_RecStatus" name="x_RecStatus" id="x_RecStatus" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_indicationstable->RecStatus->getPlaceHolder()) ?>" value="<?php echo $pres_indicationstable->RecStatus->EditValue ?>"<?php echo $pres_indicationstable->RecStatus->editAttributes() ?>>
</span>
<?php echo $pres_indicationstable->RecStatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$pres_indicationstable_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $pres_indicationstable_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pres_indicationstable_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$pres_indicationstable_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$pres_indicationstable_edit->terminate();
?>