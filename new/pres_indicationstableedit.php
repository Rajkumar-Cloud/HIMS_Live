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
<?php include_once "header.php"; ?>
<script>
var fpres_indicationstableedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fpres_indicationstableedit = currentForm = new ew.Form("fpres_indicationstableedit", "edit");

	// Validate form
	fpres_indicationstableedit.validate = function() {
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
			<?php if ($pres_indicationstable_edit->Sno->Required) { ?>
				elm = this.getElements("x" + infix + "_Sno");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_indicationstable_edit->Sno->caption(), $pres_indicationstable_edit->Sno->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_indicationstable_edit->Genericname->Required) { ?>
				elm = this.getElements("x" + infix + "_Genericname");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_indicationstable_edit->Genericname->caption(), $pres_indicationstable_edit->Genericname->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_indicationstable_edit->Indications->Required) { ?>
				elm = this.getElements("x" + infix + "_Indications");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_indicationstable_edit->Indications->caption(), $pres_indicationstable_edit->Indications->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_indicationstable_edit->Category->Required) { ?>
				elm = this.getElements("x" + infix + "_Category");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_indicationstable_edit->Category->caption(), $pres_indicationstable_edit->Category->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_indicationstable_edit->Min_Age->Required) { ?>
				elm = this.getElements("x" + infix + "_Min_Age");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_indicationstable_edit->Min_Age->caption(), $pres_indicationstable_edit->Min_Age->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Min_Age");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pres_indicationstable_edit->Min_Age->errorMessage()) ?>");
			<?php if ($pres_indicationstable_edit->Min_Days->Required) { ?>
				elm = this.getElements("x" + infix + "_Min_Days");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_indicationstable_edit->Min_Days->caption(), $pres_indicationstable_edit->Min_Days->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_indicationstable_edit->Max_Age->Required) { ?>
				elm = this.getElements("x" + infix + "_Max_Age");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_indicationstable_edit->Max_Age->caption(), $pres_indicationstable_edit->Max_Age->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Max_Age");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pres_indicationstable_edit->Max_Age->errorMessage()) ?>");
			<?php if ($pres_indicationstable_edit->Max_Days->Required) { ?>
				elm = this.getElements("x" + infix + "_Max_Days");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_indicationstable_edit->Max_Days->caption(), $pres_indicationstable_edit->Max_Days->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_indicationstable_edit->_Route->Required) { ?>
				elm = this.getElements("x" + infix + "__Route");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_indicationstable_edit->_Route->caption(), $pres_indicationstable_edit->_Route->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_indicationstable_edit->Form->Required) { ?>
				elm = this.getElements("x" + infix + "_Form");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_indicationstable_edit->Form->caption(), $pres_indicationstable_edit->Form->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_indicationstable_edit->Min_Dose_Val->Required) { ?>
				elm = this.getElements("x" + infix + "_Min_Dose_Val");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_indicationstable_edit->Min_Dose_Val->caption(), $pres_indicationstable_edit->Min_Dose_Val->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Min_Dose_Val");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pres_indicationstable_edit->Min_Dose_Val->errorMessage()) ?>");
			<?php if ($pres_indicationstable_edit->Min_Dose_Unit->Required) { ?>
				elm = this.getElements("x" + infix + "_Min_Dose_Unit");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_indicationstable_edit->Min_Dose_Unit->caption(), $pres_indicationstable_edit->Min_Dose_Unit->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_indicationstable_edit->Max_Dose_Val->Required) { ?>
				elm = this.getElements("x" + infix + "_Max_Dose_Val");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_indicationstable_edit->Max_Dose_Val->caption(), $pres_indicationstable_edit->Max_Dose_Val->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Max_Dose_Val");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pres_indicationstable_edit->Max_Dose_Val->errorMessage()) ?>");
			<?php if ($pres_indicationstable_edit->Max_Dose_Unit->Required) { ?>
				elm = this.getElements("x" + infix + "_Max_Dose_Unit");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_indicationstable_edit->Max_Dose_Unit->caption(), $pres_indicationstable_edit->Max_Dose_Unit->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_indicationstable_edit->Frequency->Required) { ?>
				elm = this.getElements("x" + infix + "_Frequency");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_indicationstable_edit->Frequency->caption(), $pres_indicationstable_edit->Frequency->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_indicationstable_edit->Duration->Required) { ?>
				elm = this.getElements("x" + infix + "_Duration");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_indicationstable_edit->Duration->caption(), $pres_indicationstable_edit->Duration->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Duration");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pres_indicationstable_edit->Duration->errorMessage()) ?>");
			<?php if ($pres_indicationstable_edit->DWMY->Required) { ?>
				elm = this.getElements("x" + infix + "_DWMY");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_indicationstable_edit->DWMY->caption(), $pres_indicationstable_edit->DWMY->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_indicationstable_edit->Contraindications->Required) { ?>
				elm = this.getElements("x" + infix + "_Contraindications");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_indicationstable_edit->Contraindications->caption(), $pres_indicationstable_edit->Contraindications->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_indicationstable_edit->RecStatus->Required) { ?>
				elm = this.getElements("x" + infix + "_RecStatus");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_indicationstable_edit->RecStatus->caption(), $pres_indicationstable_edit->RecStatus->RequiredErrorMessage)) ?>");
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
	fpres_indicationstableedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpres_indicationstableedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fpres_indicationstableedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pres_indicationstable_edit->showPageHeader(); ?>
<?php
$pres_indicationstable_edit->showMessage();
?>
<form name="fpres_indicationstableedit" id="fpres_indicationstableedit" class="<?php echo $pres_indicationstable_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_indicationstable">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$pres_indicationstable_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($pres_indicationstable_edit->Sno->Visible) { // Sno ?>
	<div id="r_Sno" class="form-group row">
		<label id="elh_pres_indicationstable_Sno" class="<?php echo $pres_indicationstable_edit->LeftColumnClass ?>"><?php echo $pres_indicationstable_edit->Sno->caption() ?><?php echo $pres_indicationstable_edit->Sno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_indicationstable_edit->RightColumnClass ?>"><div <?php echo $pres_indicationstable_edit->Sno->cellAttributes() ?>>
<span id="el_pres_indicationstable_Sno">
<span<?php echo $pres_indicationstable_edit->Sno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($pres_indicationstable_edit->Sno->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="pres_indicationstable" data-field="x_Sno" name="x_Sno" id="x_Sno" value="<?php echo HtmlEncode($pres_indicationstable_edit->Sno->CurrentValue) ?>">
<?php echo $pres_indicationstable_edit->Sno->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_indicationstable_edit->Genericname->Visible) { // Genericname ?>
	<div id="r_Genericname" class="form-group row">
		<label id="elh_pres_indicationstable_Genericname" for="x_Genericname" class="<?php echo $pres_indicationstable_edit->LeftColumnClass ?>"><?php echo $pres_indicationstable_edit->Genericname->caption() ?><?php echo $pres_indicationstable_edit->Genericname->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_indicationstable_edit->RightColumnClass ?>"><div <?php echo $pres_indicationstable_edit->Genericname->cellAttributes() ?>>
<span id="el_pres_indicationstable_Genericname">
<input type="text" data-table="pres_indicationstable" data-field="x_Genericname" name="x_Genericname" id="x_Genericname" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pres_indicationstable_edit->Genericname->getPlaceHolder()) ?>" value="<?php echo $pres_indicationstable_edit->Genericname->EditValue ?>"<?php echo $pres_indicationstable_edit->Genericname->editAttributes() ?>>
</span>
<?php echo $pres_indicationstable_edit->Genericname->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_indicationstable_edit->Indications->Visible) { // Indications ?>
	<div id="r_Indications" class="form-group row">
		<label id="elh_pres_indicationstable_Indications" for="x_Indications" class="<?php echo $pres_indicationstable_edit->LeftColumnClass ?>"><?php echo $pres_indicationstable_edit->Indications->caption() ?><?php echo $pres_indicationstable_edit->Indications->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_indicationstable_edit->RightColumnClass ?>"><div <?php echo $pres_indicationstable_edit->Indications->cellAttributes() ?>>
<span id="el_pres_indicationstable_Indications">
<input type="text" data-table="pres_indicationstable" data-field="x_Indications" name="x_Indications" id="x_Indications" placeholder="<?php echo HtmlEncode($pres_indicationstable_edit->Indications->getPlaceHolder()) ?>" value="<?php echo $pres_indicationstable_edit->Indications->EditValue ?>"<?php echo $pres_indicationstable_edit->Indications->editAttributes() ?>>
</span>
<?php echo $pres_indicationstable_edit->Indications->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_indicationstable_edit->Category->Visible) { // Category ?>
	<div id="r_Category" class="form-group row">
		<label id="elh_pres_indicationstable_Category" for="x_Category" class="<?php echo $pres_indicationstable_edit->LeftColumnClass ?>"><?php echo $pres_indicationstable_edit->Category->caption() ?><?php echo $pres_indicationstable_edit->Category->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_indicationstable_edit->RightColumnClass ?>"><div <?php echo $pres_indicationstable_edit->Category->cellAttributes() ?>>
<span id="el_pres_indicationstable_Category">
<input type="text" data-table="pres_indicationstable" data-field="x_Category" name="x_Category" id="x_Category" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_indicationstable_edit->Category->getPlaceHolder()) ?>" value="<?php echo $pres_indicationstable_edit->Category->EditValue ?>"<?php echo $pres_indicationstable_edit->Category->editAttributes() ?>>
</span>
<?php echo $pres_indicationstable_edit->Category->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_indicationstable_edit->Min_Age->Visible) { // Min_Age ?>
	<div id="r_Min_Age" class="form-group row">
		<label id="elh_pres_indicationstable_Min_Age" for="x_Min_Age" class="<?php echo $pres_indicationstable_edit->LeftColumnClass ?>"><?php echo $pres_indicationstable_edit->Min_Age->caption() ?><?php echo $pres_indicationstable_edit->Min_Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_indicationstable_edit->RightColumnClass ?>"><div <?php echo $pres_indicationstable_edit->Min_Age->cellAttributes() ?>>
<span id="el_pres_indicationstable_Min_Age">
<input type="text" data-table="pres_indicationstable" data-field="x_Min_Age" name="x_Min_Age" id="x_Min_Age" size="30" placeholder="<?php echo HtmlEncode($pres_indicationstable_edit->Min_Age->getPlaceHolder()) ?>" value="<?php echo $pres_indicationstable_edit->Min_Age->EditValue ?>"<?php echo $pres_indicationstable_edit->Min_Age->editAttributes() ?>>
</span>
<?php echo $pres_indicationstable_edit->Min_Age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_indicationstable_edit->Min_Days->Visible) { // Min_Days ?>
	<div id="r_Min_Days" class="form-group row">
		<label id="elh_pres_indicationstable_Min_Days" for="x_Min_Days" class="<?php echo $pres_indicationstable_edit->LeftColumnClass ?>"><?php echo $pres_indicationstable_edit->Min_Days->caption() ?><?php echo $pres_indicationstable_edit->Min_Days->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_indicationstable_edit->RightColumnClass ?>"><div <?php echo $pres_indicationstable_edit->Min_Days->cellAttributes() ?>>
<span id="el_pres_indicationstable_Min_Days">
<input type="text" data-table="pres_indicationstable" data-field="x_Min_Days" name="x_Min_Days" id="x_Min_Days" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_indicationstable_edit->Min_Days->getPlaceHolder()) ?>" value="<?php echo $pres_indicationstable_edit->Min_Days->EditValue ?>"<?php echo $pres_indicationstable_edit->Min_Days->editAttributes() ?>>
</span>
<?php echo $pres_indicationstable_edit->Min_Days->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_indicationstable_edit->Max_Age->Visible) { // Max_Age ?>
	<div id="r_Max_Age" class="form-group row">
		<label id="elh_pres_indicationstable_Max_Age" for="x_Max_Age" class="<?php echo $pres_indicationstable_edit->LeftColumnClass ?>"><?php echo $pres_indicationstable_edit->Max_Age->caption() ?><?php echo $pres_indicationstable_edit->Max_Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_indicationstable_edit->RightColumnClass ?>"><div <?php echo $pres_indicationstable_edit->Max_Age->cellAttributes() ?>>
<span id="el_pres_indicationstable_Max_Age">
<input type="text" data-table="pres_indicationstable" data-field="x_Max_Age" name="x_Max_Age" id="x_Max_Age" size="30" placeholder="<?php echo HtmlEncode($pres_indicationstable_edit->Max_Age->getPlaceHolder()) ?>" value="<?php echo $pres_indicationstable_edit->Max_Age->EditValue ?>"<?php echo $pres_indicationstable_edit->Max_Age->editAttributes() ?>>
</span>
<?php echo $pres_indicationstable_edit->Max_Age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_indicationstable_edit->Max_Days->Visible) { // Max_Days ?>
	<div id="r_Max_Days" class="form-group row">
		<label id="elh_pres_indicationstable_Max_Days" for="x_Max_Days" class="<?php echo $pres_indicationstable_edit->LeftColumnClass ?>"><?php echo $pres_indicationstable_edit->Max_Days->caption() ?><?php echo $pres_indicationstable_edit->Max_Days->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_indicationstable_edit->RightColumnClass ?>"><div <?php echo $pres_indicationstable_edit->Max_Days->cellAttributes() ?>>
<span id="el_pres_indicationstable_Max_Days">
<input type="text" data-table="pres_indicationstable" data-field="x_Max_Days" name="x_Max_Days" id="x_Max_Days" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_indicationstable_edit->Max_Days->getPlaceHolder()) ?>" value="<?php echo $pres_indicationstable_edit->Max_Days->EditValue ?>"<?php echo $pres_indicationstable_edit->Max_Days->editAttributes() ?>>
</span>
<?php echo $pres_indicationstable_edit->Max_Days->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_indicationstable_edit->_Route->Visible) { // Route ?>
	<div id="r__Route" class="form-group row">
		<label id="elh_pres_indicationstable__Route" for="x__Route" class="<?php echo $pres_indicationstable_edit->LeftColumnClass ?>"><?php echo $pres_indicationstable_edit->_Route->caption() ?><?php echo $pres_indicationstable_edit->_Route->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_indicationstable_edit->RightColumnClass ?>"><div <?php echo $pres_indicationstable_edit->_Route->cellAttributes() ?>>
<span id="el_pres_indicationstable__Route">
<input type="text" data-table="pres_indicationstable" data-field="x__Route" name="x__Route" id="x__Route" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_indicationstable_edit->_Route->getPlaceHolder()) ?>" value="<?php echo $pres_indicationstable_edit->_Route->EditValue ?>"<?php echo $pres_indicationstable_edit->_Route->editAttributes() ?>>
</span>
<?php echo $pres_indicationstable_edit->_Route->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_indicationstable_edit->Form->Visible) { // Form ?>
	<div id="r_Form" class="form-group row">
		<label id="elh_pres_indicationstable_Form" for="x_Form" class="<?php echo $pres_indicationstable_edit->LeftColumnClass ?>"><?php echo $pres_indicationstable_edit->Form->caption() ?><?php echo $pres_indicationstable_edit->Form->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_indicationstable_edit->RightColumnClass ?>"><div <?php echo $pres_indicationstable_edit->Form->cellAttributes() ?>>
<span id="el_pres_indicationstable_Form">
<input type="text" data-table="pres_indicationstable" data-field="x_Form" name="x_Form" id="x_Form" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_indicationstable_edit->Form->getPlaceHolder()) ?>" value="<?php echo $pres_indicationstable_edit->Form->EditValue ?>"<?php echo $pres_indicationstable_edit->Form->editAttributes() ?>>
</span>
<?php echo $pres_indicationstable_edit->Form->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_indicationstable_edit->Min_Dose_Val->Visible) { // Min_Dose_Val ?>
	<div id="r_Min_Dose_Val" class="form-group row">
		<label id="elh_pres_indicationstable_Min_Dose_Val" for="x_Min_Dose_Val" class="<?php echo $pres_indicationstable_edit->LeftColumnClass ?>"><?php echo $pres_indicationstable_edit->Min_Dose_Val->caption() ?><?php echo $pres_indicationstable_edit->Min_Dose_Val->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_indicationstable_edit->RightColumnClass ?>"><div <?php echo $pres_indicationstable_edit->Min_Dose_Val->cellAttributes() ?>>
<span id="el_pres_indicationstable_Min_Dose_Val">
<input type="text" data-table="pres_indicationstable" data-field="x_Min_Dose_Val" name="x_Min_Dose_Val" id="x_Min_Dose_Val" size="30" placeholder="<?php echo HtmlEncode($pres_indicationstable_edit->Min_Dose_Val->getPlaceHolder()) ?>" value="<?php echo $pres_indicationstable_edit->Min_Dose_Val->EditValue ?>"<?php echo $pres_indicationstable_edit->Min_Dose_Val->editAttributes() ?>>
</span>
<?php echo $pres_indicationstable_edit->Min_Dose_Val->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_indicationstable_edit->Min_Dose_Unit->Visible) { // Min_Dose_Unit ?>
	<div id="r_Min_Dose_Unit" class="form-group row">
		<label id="elh_pres_indicationstable_Min_Dose_Unit" for="x_Min_Dose_Unit" class="<?php echo $pres_indicationstable_edit->LeftColumnClass ?>"><?php echo $pres_indicationstable_edit->Min_Dose_Unit->caption() ?><?php echo $pres_indicationstable_edit->Min_Dose_Unit->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_indicationstable_edit->RightColumnClass ?>"><div <?php echo $pres_indicationstable_edit->Min_Dose_Unit->cellAttributes() ?>>
<span id="el_pres_indicationstable_Min_Dose_Unit">
<input type="text" data-table="pres_indicationstable" data-field="x_Min_Dose_Unit" name="x_Min_Dose_Unit" id="x_Min_Dose_Unit" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_indicationstable_edit->Min_Dose_Unit->getPlaceHolder()) ?>" value="<?php echo $pres_indicationstable_edit->Min_Dose_Unit->EditValue ?>"<?php echo $pres_indicationstable_edit->Min_Dose_Unit->editAttributes() ?>>
</span>
<?php echo $pres_indicationstable_edit->Min_Dose_Unit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_indicationstable_edit->Max_Dose_Val->Visible) { // Max_Dose_Val ?>
	<div id="r_Max_Dose_Val" class="form-group row">
		<label id="elh_pres_indicationstable_Max_Dose_Val" for="x_Max_Dose_Val" class="<?php echo $pres_indicationstable_edit->LeftColumnClass ?>"><?php echo $pres_indicationstable_edit->Max_Dose_Val->caption() ?><?php echo $pres_indicationstable_edit->Max_Dose_Val->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_indicationstable_edit->RightColumnClass ?>"><div <?php echo $pres_indicationstable_edit->Max_Dose_Val->cellAttributes() ?>>
<span id="el_pres_indicationstable_Max_Dose_Val">
<input type="text" data-table="pres_indicationstable" data-field="x_Max_Dose_Val" name="x_Max_Dose_Val" id="x_Max_Dose_Val" size="30" placeholder="<?php echo HtmlEncode($pres_indicationstable_edit->Max_Dose_Val->getPlaceHolder()) ?>" value="<?php echo $pres_indicationstable_edit->Max_Dose_Val->EditValue ?>"<?php echo $pres_indicationstable_edit->Max_Dose_Val->editAttributes() ?>>
</span>
<?php echo $pres_indicationstable_edit->Max_Dose_Val->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_indicationstable_edit->Max_Dose_Unit->Visible) { // Max_Dose_Unit ?>
	<div id="r_Max_Dose_Unit" class="form-group row">
		<label id="elh_pres_indicationstable_Max_Dose_Unit" for="x_Max_Dose_Unit" class="<?php echo $pres_indicationstable_edit->LeftColumnClass ?>"><?php echo $pres_indicationstable_edit->Max_Dose_Unit->caption() ?><?php echo $pres_indicationstable_edit->Max_Dose_Unit->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_indicationstable_edit->RightColumnClass ?>"><div <?php echo $pres_indicationstable_edit->Max_Dose_Unit->cellAttributes() ?>>
<span id="el_pres_indicationstable_Max_Dose_Unit">
<input type="text" data-table="pres_indicationstable" data-field="x_Max_Dose_Unit" name="x_Max_Dose_Unit" id="x_Max_Dose_Unit" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_indicationstable_edit->Max_Dose_Unit->getPlaceHolder()) ?>" value="<?php echo $pres_indicationstable_edit->Max_Dose_Unit->EditValue ?>"<?php echo $pres_indicationstable_edit->Max_Dose_Unit->editAttributes() ?>>
</span>
<?php echo $pres_indicationstable_edit->Max_Dose_Unit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_indicationstable_edit->Frequency->Visible) { // Frequency ?>
	<div id="r_Frequency" class="form-group row">
		<label id="elh_pres_indicationstable_Frequency" for="x_Frequency" class="<?php echo $pres_indicationstable_edit->LeftColumnClass ?>"><?php echo $pres_indicationstable_edit->Frequency->caption() ?><?php echo $pres_indicationstable_edit->Frequency->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_indicationstable_edit->RightColumnClass ?>"><div <?php echo $pres_indicationstable_edit->Frequency->cellAttributes() ?>>
<span id="el_pres_indicationstable_Frequency">
<input type="text" data-table="pres_indicationstable" data-field="x_Frequency" name="x_Frequency" id="x_Frequency" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_indicationstable_edit->Frequency->getPlaceHolder()) ?>" value="<?php echo $pres_indicationstable_edit->Frequency->EditValue ?>"<?php echo $pres_indicationstable_edit->Frequency->editAttributes() ?>>
</span>
<?php echo $pres_indicationstable_edit->Frequency->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_indicationstable_edit->Duration->Visible) { // Duration ?>
	<div id="r_Duration" class="form-group row">
		<label id="elh_pres_indicationstable_Duration" for="x_Duration" class="<?php echo $pres_indicationstable_edit->LeftColumnClass ?>"><?php echo $pres_indicationstable_edit->Duration->caption() ?><?php echo $pres_indicationstable_edit->Duration->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_indicationstable_edit->RightColumnClass ?>"><div <?php echo $pres_indicationstable_edit->Duration->cellAttributes() ?>>
<span id="el_pres_indicationstable_Duration">
<input type="text" data-table="pres_indicationstable" data-field="x_Duration" name="x_Duration" id="x_Duration" size="30" placeholder="<?php echo HtmlEncode($pres_indicationstable_edit->Duration->getPlaceHolder()) ?>" value="<?php echo $pres_indicationstable_edit->Duration->EditValue ?>"<?php echo $pres_indicationstable_edit->Duration->editAttributes() ?>>
</span>
<?php echo $pres_indicationstable_edit->Duration->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_indicationstable_edit->DWMY->Visible) { // DWMY ?>
	<div id="r_DWMY" class="form-group row">
		<label id="elh_pres_indicationstable_DWMY" for="x_DWMY" class="<?php echo $pres_indicationstable_edit->LeftColumnClass ?>"><?php echo $pres_indicationstable_edit->DWMY->caption() ?><?php echo $pres_indicationstable_edit->DWMY->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_indicationstable_edit->RightColumnClass ?>"><div <?php echo $pres_indicationstable_edit->DWMY->cellAttributes() ?>>
<span id="el_pres_indicationstable_DWMY">
<input type="text" data-table="pres_indicationstable" data-field="x_DWMY" name="x_DWMY" id="x_DWMY" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_indicationstable_edit->DWMY->getPlaceHolder()) ?>" value="<?php echo $pres_indicationstable_edit->DWMY->EditValue ?>"<?php echo $pres_indicationstable_edit->DWMY->editAttributes() ?>>
</span>
<?php echo $pres_indicationstable_edit->DWMY->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_indicationstable_edit->Contraindications->Visible) { // Contraindications ?>
	<div id="r_Contraindications" class="form-group row">
		<label id="elh_pres_indicationstable_Contraindications" for="x_Contraindications" class="<?php echo $pres_indicationstable_edit->LeftColumnClass ?>"><?php echo $pres_indicationstable_edit->Contraindications->caption() ?><?php echo $pres_indicationstable_edit->Contraindications->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_indicationstable_edit->RightColumnClass ?>"><div <?php echo $pres_indicationstable_edit->Contraindications->cellAttributes() ?>>
<span id="el_pres_indicationstable_Contraindications">
<input type="text" data-table="pres_indicationstable" data-field="x_Contraindications" name="x_Contraindications" id="x_Contraindications" placeholder="<?php echo HtmlEncode($pres_indicationstable_edit->Contraindications->getPlaceHolder()) ?>" value="<?php echo $pres_indicationstable_edit->Contraindications->EditValue ?>"<?php echo $pres_indicationstable_edit->Contraindications->editAttributes() ?>>
</span>
<?php echo $pres_indicationstable_edit->Contraindications->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_indicationstable_edit->RecStatus->Visible) { // RecStatus ?>
	<div id="r_RecStatus" class="form-group row">
		<label id="elh_pres_indicationstable_RecStatus" for="x_RecStatus" class="<?php echo $pres_indicationstable_edit->LeftColumnClass ?>"><?php echo $pres_indicationstable_edit->RecStatus->caption() ?><?php echo $pres_indicationstable_edit->RecStatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_indicationstable_edit->RightColumnClass ?>"><div <?php echo $pres_indicationstable_edit->RecStatus->cellAttributes() ?>>
<span id="el_pres_indicationstable_RecStatus">
<input type="text" data-table="pres_indicationstable" data-field="x_RecStatus" name="x_RecStatus" id="x_RecStatus" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_indicationstable_edit->RecStatus->getPlaceHolder()) ?>" value="<?php echo $pres_indicationstable_edit->RecStatus->EditValue ?>"<?php echo $pres_indicationstable_edit->RecStatus->editAttributes() ?>>
</span>
<?php echo $pres_indicationstable_edit->RecStatus->CustomMsg ?></div></div>
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
$pres_indicationstable_edit->terminate();
?>