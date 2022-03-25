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
$pres_indicationstable_add = new pres_indicationstable_add();

// Run the page
$pres_indicationstable_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_indicationstable_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpres_indicationstableadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fpres_indicationstableadd = currentForm = new ew.Form("fpres_indicationstableadd", "add");

	// Validate form
	fpres_indicationstableadd.validate = function() {
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
			<?php if ($pres_indicationstable_add->Genericname->Required) { ?>
				elm = this.getElements("x" + infix + "_Genericname");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_indicationstable_add->Genericname->caption(), $pres_indicationstable_add->Genericname->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_indicationstable_add->Indications->Required) { ?>
				elm = this.getElements("x" + infix + "_Indications");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_indicationstable_add->Indications->caption(), $pres_indicationstable_add->Indications->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_indicationstable_add->Category->Required) { ?>
				elm = this.getElements("x" + infix + "_Category");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_indicationstable_add->Category->caption(), $pres_indicationstable_add->Category->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_indicationstable_add->Min_Age->Required) { ?>
				elm = this.getElements("x" + infix + "_Min_Age");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_indicationstable_add->Min_Age->caption(), $pres_indicationstable_add->Min_Age->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Min_Age");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pres_indicationstable_add->Min_Age->errorMessage()) ?>");
			<?php if ($pres_indicationstable_add->Min_Days->Required) { ?>
				elm = this.getElements("x" + infix + "_Min_Days");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_indicationstable_add->Min_Days->caption(), $pres_indicationstable_add->Min_Days->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_indicationstable_add->Max_Age->Required) { ?>
				elm = this.getElements("x" + infix + "_Max_Age");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_indicationstable_add->Max_Age->caption(), $pres_indicationstable_add->Max_Age->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Max_Age");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pres_indicationstable_add->Max_Age->errorMessage()) ?>");
			<?php if ($pres_indicationstable_add->Max_Days->Required) { ?>
				elm = this.getElements("x" + infix + "_Max_Days");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_indicationstable_add->Max_Days->caption(), $pres_indicationstable_add->Max_Days->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_indicationstable_add->_Route->Required) { ?>
				elm = this.getElements("x" + infix + "__Route");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_indicationstable_add->_Route->caption(), $pres_indicationstable_add->_Route->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_indicationstable_add->Form->Required) { ?>
				elm = this.getElements("x" + infix + "_Form");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_indicationstable_add->Form->caption(), $pres_indicationstable_add->Form->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_indicationstable_add->Min_Dose_Val->Required) { ?>
				elm = this.getElements("x" + infix + "_Min_Dose_Val");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_indicationstable_add->Min_Dose_Val->caption(), $pres_indicationstable_add->Min_Dose_Val->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Min_Dose_Val");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pres_indicationstable_add->Min_Dose_Val->errorMessage()) ?>");
			<?php if ($pres_indicationstable_add->Min_Dose_Unit->Required) { ?>
				elm = this.getElements("x" + infix + "_Min_Dose_Unit");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_indicationstable_add->Min_Dose_Unit->caption(), $pres_indicationstable_add->Min_Dose_Unit->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_indicationstable_add->Max_Dose_Val->Required) { ?>
				elm = this.getElements("x" + infix + "_Max_Dose_Val");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_indicationstable_add->Max_Dose_Val->caption(), $pres_indicationstable_add->Max_Dose_Val->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Max_Dose_Val");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pres_indicationstable_add->Max_Dose_Val->errorMessage()) ?>");
			<?php if ($pres_indicationstable_add->Max_Dose_Unit->Required) { ?>
				elm = this.getElements("x" + infix + "_Max_Dose_Unit");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_indicationstable_add->Max_Dose_Unit->caption(), $pres_indicationstable_add->Max_Dose_Unit->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_indicationstable_add->Frequency->Required) { ?>
				elm = this.getElements("x" + infix + "_Frequency");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_indicationstable_add->Frequency->caption(), $pres_indicationstable_add->Frequency->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_indicationstable_add->Duration->Required) { ?>
				elm = this.getElements("x" + infix + "_Duration");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_indicationstable_add->Duration->caption(), $pres_indicationstable_add->Duration->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Duration");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($pres_indicationstable_add->Duration->errorMessage()) ?>");
			<?php if ($pres_indicationstable_add->DWMY->Required) { ?>
				elm = this.getElements("x" + infix + "_DWMY");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_indicationstable_add->DWMY->caption(), $pres_indicationstable_add->DWMY->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_indicationstable_add->Contraindications->Required) { ?>
				elm = this.getElements("x" + infix + "_Contraindications");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_indicationstable_add->Contraindications->caption(), $pres_indicationstable_add->Contraindications->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($pres_indicationstable_add->RecStatus->Required) { ?>
				elm = this.getElements("x" + infix + "_RecStatus");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $pres_indicationstable_add->RecStatus->caption(), $pres_indicationstable_add->RecStatus->RequiredErrorMessage)) ?>");
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
	fpres_indicationstableadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpres_indicationstableadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fpres_indicationstableadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pres_indicationstable_add->showPageHeader(); ?>
<?php
$pres_indicationstable_add->showMessage();
?>
<form name="fpres_indicationstableadd" id="fpres_indicationstableadd" class="<?php echo $pres_indicationstable_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_indicationstable">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$pres_indicationstable_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($pres_indicationstable_add->Genericname->Visible) { // Genericname ?>
	<div id="r_Genericname" class="form-group row">
		<label id="elh_pres_indicationstable_Genericname" for="x_Genericname" class="<?php echo $pres_indicationstable_add->LeftColumnClass ?>"><?php echo $pres_indicationstable_add->Genericname->caption() ?><?php echo $pres_indicationstable_add->Genericname->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_indicationstable_add->RightColumnClass ?>"><div <?php echo $pres_indicationstable_add->Genericname->cellAttributes() ?>>
<span id="el_pres_indicationstable_Genericname">
<input type="text" data-table="pres_indicationstable" data-field="x_Genericname" name="x_Genericname" id="x_Genericname" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($pres_indicationstable_add->Genericname->getPlaceHolder()) ?>" value="<?php echo $pres_indicationstable_add->Genericname->EditValue ?>"<?php echo $pres_indicationstable_add->Genericname->editAttributes() ?>>
</span>
<?php echo $pres_indicationstable_add->Genericname->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_indicationstable_add->Indications->Visible) { // Indications ?>
	<div id="r_Indications" class="form-group row">
		<label id="elh_pres_indicationstable_Indications" for="x_Indications" class="<?php echo $pres_indicationstable_add->LeftColumnClass ?>"><?php echo $pres_indicationstable_add->Indications->caption() ?><?php echo $pres_indicationstable_add->Indications->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_indicationstable_add->RightColumnClass ?>"><div <?php echo $pres_indicationstable_add->Indications->cellAttributes() ?>>
<span id="el_pres_indicationstable_Indications">
<input type="text" data-table="pres_indicationstable" data-field="x_Indications" name="x_Indications" id="x_Indications" placeholder="<?php echo HtmlEncode($pres_indicationstable_add->Indications->getPlaceHolder()) ?>" value="<?php echo $pres_indicationstable_add->Indications->EditValue ?>"<?php echo $pres_indicationstable_add->Indications->editAttributes() ?>>
</span>
<?php echo $pres_indicationstable_add->Indications->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_indicationstable_add->Category->Visible) { // Category ?>
	<div id="r_Category" class="form-group row">
		<label id="elh_pres_indicationstable_Category" for="x_Category" class="<?php echo $pres_indicationstable_add->LeftColumnClass ?>"><?php echo $pres_indicationstable_add->Category->caption() ?><?php echo $pres_indicationstable_add->Category->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_indicationstable_add->RightColumnClass ?>"><div <?php echo $pres_indicationstable_add->Category->cellAttributes() ?>>
<span id="el_pres_indicationstable_Category">
<input type="text" data-table="pres_indicationstable" data-field="x_Category" name="x_Category" id="x_Category" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_indicationstable_add->Category->getPlaceHolder()) ?>" value="<?php echo $pres_indicationstable_add->Category->EditValue ?>"<?php echo $pres_indicationstable_add->Category->editAttributes() ?>>
</span>
<?php echo $pres_indicationstable_add->Category->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_indicationstable_add->Min_Age->Visible) { // Min_Age ?>
	<div id="r_Min_Age" class="form-group row">
		<label id="elh_pres_indicationstable_Min_Age" for="x_Min_Age" class="<?php echo $pres_indicationstable_add->LeftColumnClass ?>"><?php echo $pres_indicationstable_add->Min_Age->caption() ?><?php echo $pres_indicationstable_add->Min_Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_indicationstable_add->RightColumnClass ?>"><div <?php echo $pres_indicationstable_add->Min_Age->cellAttributes() ?>>
<span id="el_pres_indicationstable_Min_Age">
<input type="text" data-table="pres_indicationstable" data-field="x_Min_Age" name="x_Min_Age" id="x_Min_Age" size="30" placeholder="<?php echo HtmlEncode($pres_indicationstable_add->Min_Age->getPlaceHolder()) ?>" value="<?php echo $pres_indicationstable_add->Min_Age->EditValue ?>"<?php echo $pres_indicationstable_add->Min_Age->editAttributes() ?>>
</span>
<?php echo $pres_indicationstable_add->Min_Age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_indicationstable_add->Min_Days->Visible) { // Min_Days ?>
	<div id="r_Min_Days" class="form-group row">
		<label id="elh_pres_indicationstable_Min_Days" for="x_Min_Days" class="<?php echo $pres_indicationstable_add->LeftColumnClass ?>"><?php echo $pres_indicationstable_add->Min_Days->caption() ?><?php echo $pres_indicationstable_add->Min_Days->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_indicationstable_add->RightColumnClass ?>"><div <?php echo $pres_indicationstable_add->Min_Days->cellAttributes() ?>>
<span id="el_pres_indicationstable_Min_Days">
<input type="text" data-table="pres_indicationstable" data-field="x_Min_Days" name="x_Min_Days" id="x_Min_Days" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_indicationstable_add->Min_Days->getPlaceHolder()) ?>" value="<?php echo $pres_indicationstable_add->Min_Days->EditValue ?>"<?php echo $pres_indicationstable_add->Min_Days->editAttributes() ?>>
</span>
<?php echo $pres_indicationstable_add->Min_Days->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_indicationstable_add->Max_Age->Visible) { // Max_Age ?>
	<div id="r_Max_Age" class="form-group row">
		<label id="elh_pres_indicationstable_Max_Age" for="x_Max_Age" class="<?php echo $pres_indicationstable_add->LeftColumnClass ?>"><?php echo $pres_indicationstable_add->Max_Age->caption() ?><?php echo $pres_indicationstable_add->Max_Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_indicationstable_add->RightColumnClass ?>"><div <?php echo $pres_indicationstable_add->Max_Age->cellAttributes() ?>>
<span id="el_pres_indicationstable_Max_Age">
<input type="text" data-table="pres_indicationstable" data-field="x_Max_Age" name="x_Max_Age" id="x_Max_Age" size="30" placeholder="<?php echo HtmlEncode($pres_indicationstable_add->Max_Age->getPlaceHolder()) ?>" value="<?php echo $pres_indicationstable_add->Max_Age->EditValue ?>"<?php echo $pres_indicationstable_add->Max_Age->editAttributes() ?>>
</span>
<?php echo $pres_indicationstable_add->Max_Age->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_indicationstable_add->Max_Days->Visible) { // Max_Days ?>
	<div id="r_Max_Days" class="form-group row">
		<label id="elh_pres_indicationstable_Max_Days" for="x_Max_Days" class="<?php echo $pres_indicationstable_add->LeftColumnClass ?>"><?php echo $pres_indicationstable_add->Max_Days->caption() ?><?php echo $pres_indicationstable_add->Max_Days->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_indicationstable_add->RightColumnClass ?>"><div <?php echo $pres_indicationstable_add->Max_Days->cellAttributes() ?>>
<span id="el_pres_indicationstable_Max_Days">
<input type="text" data-table="pres_indicationstable" data-field="x_Max_Days" name="x_Max_Days" id="x_Max_Days" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_indicationstable_add->Max_Days->getPlaceHolder()) ?>" value="<?php echo $pres_indicationstable_add->Max_Days->EditValue ?>"<?php echo $pres_indicationstable_add->Max_Days->editAttributes() ?>>
</span>
<?php echo $pres_indicationstable_add->Max_Days->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_indicationstable_add->_Route->Visible) { // Route ?>
	<div id="r__Route" class="form-group row">
		<label id="elh_pres_indicationstable__Route" for="x__Route" class="<?php echo $pres_indicationstable_add->LeftColumnClass ?>"><?php echo $pres_indicationstable_add->_Route->caption() ?><?php echo $pres_indicationstable_add->_Route->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_indicationstable_add->RightColumnClass ?>"><div <?php echo $pres_indicationstable_add->_Route->cellAttributes() ?>>
<span id="el_pres_indicationstable__Route">
<input type="text" data-table="pres_indicationstable" data-field="x__Route" name="x__Route" id="x__Route" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_indicationstable_add->_Route->getPlaceHolder()) ?>" value="<?php echo $pres_indicationstable_add->_Route->EditValue ?>"<?php echo $pres_indicationstable_add->_Route->editAttributes() ?>>
</span>
<?php echo $pres_indicationstable_add->_Route->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_indicationstable_add->Form->Visible) { // Form ?>
	<div id="r_Form" class="form-group row">
		<label id="elh_pres_indicationstable_Form" for="x_Form" class="<?php echo $pres_indicationstable_add->LeftColumnClass ?>"><?php echo $pres_indicationstable_add->Form->caption() ?><?php echo $pres_indicationstable_add->Form->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_indicationstable_add->RightColumnClass ?>"><div <?php echo $pres_indicationstable_add->Form->cellAttributes() ?>>
<span id="el_pres_indicationstable_Form">
<input type="text" data-table="pres_indicationstable" data-field="x_Form" name="x_Form" id="x_Form" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_indicationstable_add->Form->getPlaceHolder()) ?>" value="<?php echo $pres_indicationstable_add->Form->EditValue ?>"<?php echo $pres_indicationstable_add->Form->editAttributes() ?>>
</span>
<?php echo $pres_indicationstable_add->Form->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_indicationstable_add->Min_Dose_Val->Visible) { // Min_Dose_Val ?>
	<div id="r_Min_Dose_Val" class="form-group row">
		<label id="elh_pres_indicationstable_Min_Dose_Val" for="x_Min_Dose_Val" class="<?php echo $pres_indicationstable_add->LeftColumnClass ?>"><?php echo $pres_indicationstable_add->Min_Dose_Val->caption() ?><?php echo $pres_indicationstable_add->Min_Dose_Val->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_indicationstable_add->RightColumnClass ?>"><div <?php echo $pres_indicationstable_add->Min_Dose_Val->cellAttributes() ?>>
<span id="el_pres_indicationstable_Min_Dose_Val">
<input type="text" data-table="pres_indicationstable" data-field="x_Min_Dose_Val" name="x_Min_Dose_Val" id="x_Min_Dose_Val" size="30" placeholder="<?php echo HtmlEncode($pres_indicationstable_add->Min_Dose_Val->getPlaceHolder()) ?>" value="<?php echo $pres_indicationstable_add->Min_Dose_Val->EditValue ?>"<?php echo $pres_indicationstable_add->Min_Dose_Val->editAttributes() ?>>
</span>
<?php echo $pres_indicationstable_add->Min_Dose_Val->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_indicationstable_add->Min_Dose_Unit->Visible) { // Min_Dose_Unit ?>
	<div id="r_Min_Dose_Unit" class="form-group row">
		<label id="elh_pres_indicationstable_Min_Dose_Unit" for="x_Min_Dose_Unit" class="<?php echo $pres_indicationstable_add->LeftColumnClass ?>"><?php echo $pres_indicationstable_add->Min_Dose_Unit->caption() ?><?php echo $pres_indicationstable_add->Min_Dose_Unit->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_indicationstable_add->RightColumnClass ?>"><div <?php echo $pres_indicationstable_add->Min_Dose_Unit->cellAttributes() ?>>
<span id="el_pres_indicationstable_Min_Dose_Unit">
<input type="text" data-table="pres_indicationstable" data-field="x_Min_Dose_Unit" name="x_Min_Dose_Unit" id="x_Min_Dose_Unit" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_indicationstable_add->Min_Dose_Unit->getPlaceHolder()) ?>" value="<?php echo $pres_indicationstable_add->Min_Dose_Unit->EditValue ?>"<?php echo $pres_indicationstable_add->Min_Dose_Unit->editAttributes() ?>>
</span>
<?php echo $pres_indicationstable_add->Min_Dose_Unit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_indicationstable_add->Max_Dose_Val->Visible) { // Max_Dose_Val ?>
	<div id="r_Max_Dose_Val" class="form-group row">
		<label id="elh_pres_indicationstable_Max_Dose_Val" for="x_Max_Dose_Val" class="<?php echo $pres_indicationstable_add->LeftColumnClass ?>"><?php echo $pres_indicationstable_add->Max_Dose_Val->caption() ?><?php echo $pres_indicationstable_add->Max_Dose_Val->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_indicationstable_add->RightColumnClass ?>"><div <?php echo $pres_indicationstable_add->Max_Dose_Val->cellAttributes() ?>>
<span id="el_pres_indicationstable_Max_Dose_Val">
<input type="text" data-table="pres_indicationstable" data-field="x_Max_Dose_Val" name="x_Max_Dose_Val" id="x_Max_Dose_Val" size="30" placeholder="<?php echo HtmlEncode($pres_indicationstable_add->Max_Dose_Val->getPlaceHolder()) ?>" value="<?php echo $pres_indicationstable_add->Max_Dose_Val->EditValue ?>"<?php echo $pres_indicationstable_add->Max_Dose_Val->editAttributes() ?>>
</span>
<?php echo $pres_indicationstable_add->Max_Dose_Val->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_indicationstable_add->Max_Dose_Unit->Visible) { // Max_Dose_Unit ?>
	<div id="r_Max_Dose_Unit" class="form-group row">
		<label id="elh_pres_indicationstable_Max_Dose_Unit" for="x_Max_Dose_Unit" class="<?php echo $pres_indicationstable_add->LeftColumnClass ?>"><?php echo $pres_indicationstable_add->Max_Dose_Unit->caption() ?><?php echo $pres_indicationstable_add->Max_Dose_Unit->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_indicationstable_add->RightColumnClass ?>"><div <?php echo $pres_indicationstable_add->Max_Dose_Unit->cellAttributes() ?>>
<span id="el_pres_indicationstable_Max_Dose_Unit">
<input type="text" data-table="pres_indicationstable" data-field="x_Max_Dose_Unit" name="x_Max_Dose_Unit" id="x_Max_Dose_Unit" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_indicationstable_add->Max_Dose_Unit->getPlaceHolder()) ?>" value="<?php echo $pres_indicationstable_add->Max_Dose_Unit->EditValue ?>"<?php echo $pres_indicationstable_add->Max_Dose_Unit->editAttributes() ?>>
</span>
<?php echo $pres_indicationstable_add->Max_Dose_Unit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_indicationstable_add->Frequency->Visible) { // Frequency ?>
	<div id="r_Frequency" class="form-group row">
		<label id="elh_pres_indicationstable_Frequency" for="x_Frequency" class="<?php echo $pres_indicationstable_add->LeftColumnClass ?>"><?php echo $pres_indicationstable_add->Frequency->caption() ?><?php echo $pres_indicationstable_add->Frequency->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_indicationstable_add->RightColumnClass ?>"><div <?php echo $pres_indicationstable_add->Frequency->cellAttributes() ?>>
<span id="el_pres_indicationstable_Frequency">
<input type="text" data-table="pres_indicationstable" data-field="x_Frequency" name="x_Frequency" id="x_Frequency" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_indicationstable_add->Frequency->getPlaceHolder()) ?>" value="<?php echo $pres_indicationstable_add->Frequency->EditValue ?>"<?php echo $pres_indicationstable_add->Frequency->editAttributes() ?>>
</span>
<?php echo $pres_indicationstable_add->Frequency->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_indicationstable_add->Duration->Visible) { // Duration ?>
	<div id="r_Duration" class="form-group row">
		<label id="elh_pres_indicationstable_Duration" for="x_Duration" class="<?php echo $pres_indicationstable_add->LeftColumnClass ?>"><?php echo $pres_indicationstable_add->Duration->caption() ?><?php echo $pres_indicationstable_add->Duration->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_indicationstable_add->RightColumnClass ?>"><div <?php echo $pres_indicationstable_add->Duration->cellAttributes() ?>>
<span id="el_pres_indicationstable_Duration">
<input type="text" data-table="pres_indicationstable" data-field="x_Duration" name="x_Duration" id="x_Duration" size="30" placeholder="<?php echo HtmlEncode($pres_indicationstable_add->Duration->getPlaceHolder()) ?>" value="<?php echo $pres_indicationstable_add->Duration->EditValue ?>"<?php echo $pres_indicationstable_add->Duration->editAttributes() ?>>
</span>
<?php echo $pres_indicationstable_add->Duration->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_indicationstable_add->DWMY->Visible) { // DWMY ?>
	<div id="r_DWMY" class="form-group row">
		<label id="elh_pres_indicationstable_DWMY" for="x_DWMY" class="<?php echo $pres_indicationstable_add->LeftColumnClass ?>"><?php echo $pres_indicationstable_add->DWMY->caption() ?><?php echo $pres_indicationstable_add->DWMY->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_indicationstable_add->RightColumnClass ?>"><div <?php echo $pres_indicationstable_add->DWMY->cellAttributes() ?>>
<span id="el_pres_indicationstable_DWMY">
<input type="text" data-table="pres_indicationstable" data-field="x_DWMY" name="x_DWMY" id="x_DWMY" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_indicationstable_add->DWMY->getPlaceHolder()) ?>" value="<?php echo $pres_indicationstable_add->DWMY->EditValue ?>"<?php echo $pres_indicationstable_add->DWMY->editAttributes() ?>>
</span>
<?php echo $pres_indicationstable_add->DWMY->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_indicationstable_add->Contraindications->Visible) { // Contraindications ?>
	<div id="r_Contraindications" class="form-group row">
		<label id="elh_pres_indicationstable_Contraindications" for="x_Contraindications" class="<?php echo $pres_indicationstable_add->LeftColumnClass ?>"><?php echo $pres_indicationstable_add->Contraindications->caption() ?><?php echo $pres_indicationstable_add->Contraindications->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_indicationstable_add->RightColumnClass ?>"><div <?php echo $pres_indicationstable_add->Contraindications->cellAttributes() ?>>
<span id="el_pres_indicationstable_Contraindications">
<input type="text" data-table="pres_indicationstable" data-field="x_Contraindications" name="x_Contraindications" id="x_Contraindications" placeholder="<?php echo HtmlEncode($pres_indicationstable_add->Contraindications->getPlaceHolder()) ?>" value="<?php echo $pres_indicationstable_add->Contraindications->EditValue ?>"<?php echo $pres_indicationstable_add->Contraindications->editAttributes() ?>>
</span>
<?php echo $pres_indicationstable_add->Contraindications->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($pres_indicationstable_add->RecStatus->Visible) { // RecStatus ?>
	<div id="r_RecStatus" class="form-group row">
		<label id="elh_pres_indicationstable_RecStatus" for="x_RecStatus" class="<?php echo $pres_indicationstable_add->LeftColumnClass ?>"><?php echo $pres_indicationstable_add->RecStatus->caption() ?><?php echo $pres_indicationstable_add->RecStatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $pres_indicationstable_add->RightColumnClass ?>"><div <?php echo $pres_indicationstable_add->RecStatus->cellAttributes() ?>>
<span id="el_pres_indicationstable_RecStatus">
<input type="text" data-table="pres_indicationstable" data-field="x_RecStatus" name="x_RecStatus" id="x_RecStatus" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($pres_indicationstable_add->RecStatus->getPlaceHolder()) ?>" value="<?php echo $pres_indicationstable_add->RecStatus->EditValue ?>"<?php echo $pres_indicationstable_add->RecStatus->editAttributes() ?>>
</span>
<?php echo $pres_indicationstable_add->RecStatus->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$pres_indicationstable_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $pres_indicationstable_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pres_indicationstable_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$pres_indicationstable_add->showPageFooter();
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
$pres_indicationstable_add->terminate();
?>