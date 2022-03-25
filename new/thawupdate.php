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
$thaw_update = new thaw_update();

// Run the page
$thaw_update->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$thaw_update->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fthawupdate, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "update";
	fthawupdate = currentForm = new ew.Form("fthawupdate", "update");

	// Validate form
	fthawupdate.validate = function() {
		if (!this.validateRequired)
			return true; // Ignore validation
		var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
		if ($fobj.find("#confirm").val() == "confirm")
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
			<?php if ($thaw_update->RIDNo->Required) { ?>
				elm = this.getElements("x" + infix + "_RIDNo");
				uelm = this.getElements("u" + infix + "_RIDNo");
				if (uelm && uelm.checked) {
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw_update->RIDNo->caption(), $thaw_update->RIDNo->RequiredErrorMessage)) ?>");
				}
			<?php } ?>
			<?php if ($thaw_update->PatientName->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientName");
				uelm = this.getElements("u" + infix + "_PatientName");
				if (uelm && uelm.checked) {
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw_update->PatientName->caption(), $thaw_update->PatientName->RequiredErrorMessage)) ?>");
				}
			<?php } ?>
			<?php if ($thaw_update->TiDNo->Required) { ?>
				elm = this.getElements("x" + infix + "_TiDNo");
				uelm = this.getElements("u" + infix + "_TiDNo");
				if (uelm && uelm.checked) {
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw_update->TiDNo->caption(), $thaw_update->TiDNo->RequiredErrorMessage)) ?>");
				}
			<?php } ?>
			<?php if ($thaw_update->thawDate->Required) { ?>
				elm = this.getElements("x" + infix + "_thawDate");
				uelm = this.getElements("u" + infix + "_thawDate");
				if (uelm && uelm.checked) {
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw_update->thawDate->caption(), $thaw_update->thawDate->RequiredErrorMessage)) ?>");
				}
			<?php } ?>
				elm = this.getElements("x" + infix + "_thawDate");
				uelm = this.getElements("u" + infix + "_thawDate");
				if (uelm && uelm.checked && elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($thaw_update->thawDate->errorMessage()) ?>");
			<?php if ($thaw_update->thawPrimaryEmbryologist->Required) { ?>
				elm = this.getElements("x" + infix + "_thawPrimaryEmbryologist");
				uelm = this.getElements("u" + infix + "_thawPrimaryEmbryologist");
				if (uelm && uelm.checked) {
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw_update->thawPrimaryEmbryologist->caption(), $thaw_update->thawPrimaryEmbryologist->RequiredErrorMessage)) ?>");
				}
			<?php } ?>
			<?php if ($thaw_update->thawSecondaryEmbryologist->Required) { ?>
				elm = this.getElements("x" + infix + "_thawSecondaryEmbryologist");
				uelm = this.getElements("u" + infix + "_thawSecondaryEmbryologist");
				if (uelm && uelm.checked) {
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw_update->thawSecondaryEmbryologist->caption(), $thaw_update->thawSecondaryEmbryologist->RequiredErrorMessage)) ?>");
				}
			<?php } ?>
			<?php if ($thaw_update->thawReFrozen->Required) { ?>
				elm = this.getElements("x" + infix + "_thawReFrozen");
				uelm = this.getElements("u" + infix + "_thawReFrozen");
				if (uelm && uelm.checked) {
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw_update->thawReFrozen->caption(), $thaw_update->thawReFrozen->RequiredErrorMessage)) ?>");
				}
			<?php } ?>
			<?php if ($thaw_update->vitrificationDate->Required) { ?>
				elm = this.getElements("x" + infix + "_vitrificationDate");
				uelm = this.getElements("u" + infix + "_vitrificationDate");
				if (uelm && uelm.checked) {
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw_update->vitrificationDate->caption(), $thaw_update->vitrificationDate->RequiredErrorMessage)) ?>");
				}
			<?php } ?>
			<?php if ($thaw_update->PrimaryEmbryologist->Required) { ?>
				elm = this.getElements("x" + infix + "_PrimaryEmbryologist");
				uelm = this.getElements("u" + infix + "_PrimaryEmbryologist");
				if (uelm && uelm.checked) {
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw_update->PrimaryEmbryologist->caption(), $thaw_update->PrimaryEmbryologist->RequiredErrorMessage)) ?>");
				}
			<?php } ?>
			<?php if ($thaw_update->SecondaryEmbryologist->Required) { ?>
				elm = this.getElements("x" + infix + "_SecondaryEmbryologist");
				uelm = this.getElements("u" + infix + "_SecondaryEmbryologist");
				if (uelm && uelm.checked) {
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw_update->SecondaryEmbryologist->caption(), $thaw_update->SecondaryEmbryologist->RequiredErrorMessage)) ?>");
				}
			<?php } ?>
			<?php if ($thaw_update->EmbryoNo->Required) { ?>
				elm = this.getElements("x" + infix + "_EmbryoNo");
				uelm = this.getElements("u" + infix + "_EmbryoNo");
				if (uelm && uelm.checked) {
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw_update->EmbryoNo->caption(), $thaw_update->EmbryoNo->RequiredErrorMessage)) ?>");
				}
			<?php } ?>
			<?php if ($thaw_update->FertilisationDate->Required) { ?>
				elm = this.getElements("x" + infix + "_FertilisationDate");
				uelm = this.getElements("u" + infix + "_FertilisationDate");
				if (uelm && uelm.checked) {
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw_update->FertilisationDate->caption(), $thaw_update->FertilisationDate->RequiredErrorMessage)) ?>");
				}
			<?php } ?>
			<?php if ($thaw_update->Day->Required) { ?>
				elm = this.getElements("x" + infix + "_Day");
				uelm = this.getElements("u" + infix + "_Day");
				if (uelm && uelm.checked) {
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw_update->Day->caption(), $thaw_update->Day->RequiredErrorMessage)) ?>");
				}
			<?php } ?>
			<?php if ($thaw_update->Grade->Required) { ?>
				elm = this.getElements("x" + infix + "_Grade");
				uelm = this.getElements("u" + infix + "_Grade");
				if (uelm && uelm.checked) {
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw_update->Grade->caption(), $thaw_update->Grade->RequiredErrorMessage)) ?>");
				}
			<?php } ?>
			<?php if ($thaw_update->Incubator->Required) { ?>
				elm = this.getElements("x" + infix + "_Incubator");
				uelm = this.getElements("u" + infix + "_Incubator");
				if (uelm && uelm.checked) {
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw_update->Incubator->caption(), $thaw_update->Incubator->RequiredErrorMessage)) ?>");
				}
			<?php } ?>
			<?php if ($thaw_update->Tank->Required) { ?>
				elm = this.getElements("x" + infix + "_Tank");
				uelm = this.getElements("u" + infix + "_Tank");
				if (uelm && uelm.checked) {
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw_update->Tank->caption(), $thaw_update->Tank->RequiredErrorMessage)) ?>");
				}
			<?php } ?>
			<?php if ($thaw_update->Canister->Required) { ?>
				elm = this.getElements("x" + infix + "_Canister");
				uelm = this.getElements("u" + infix + "_Canister");
				if (uelm && uelm.checked) {
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw_update->Canister->caption(), $thaw_update->Canister->RequiredErrorMessage)) ?>");
				}
			<?php } ?>
			<?php if ($thaw_update->Gobiet->Required) { ?>
				elm = this.getElements("x" + infix + "_Gobiet");
				uelm = this.getElements("u" + infix + "_Gobiet");
				if (uelm && uelm.checked) {
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw_update->Gobiet->caption(), $thaw_update->Gobiet->RequiredErrorMessage)) ?>");
				}
			<?php } ?>
			<?php if ($thaw_update->CryolockNo->Required) { ?>
				elm = this.getElements("x" + infix + "_CryolockNo");
				uelm = this.getElements("u" + infix + "_CryolockNo");
				if (uelm && uelm.checked) {
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw_update->CryolockNo->caption(), $thaw_update->CryolockNo->RequiredErrorMessage)) ?>");
				}
			<?php } ?>
			<?php if ($thaw_update->CryolockColour->Required) { ?>
				elm = this.getElements("x" + infix + "_CryolockColour");
				uelm = this.getElements("u" + infix + "_CryolockColour");
				if (uelm && uelm.checked) {
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw_update->CryolockColour->caption(), $thaw_update->CryolockColour->RequiredErrorMessage)) ?>");
				}
			<?php } ?>
			<?php if ($thaw_update->Stage->Required) { ?>
				elm = this.getElements("x" + infix + "_Stage");
				uelm = this.getElements("u" + infix + "_Stage");
				if (uelm && uelm.checked) {
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw_update->Stage->caption(), $thaw_update->Stage->RequiredErrorMessage)) ?>");
				}
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
		}
		return true;
	}

	// Form_CustomValidate
	fthawupdate.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fthawupdate.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fthawupdate.lists["x_thawReFrozen"] = <?php echo $thaw_update->thawReFrozen->Lookup->toClientList($thaw_update) ?>;
	fthawupdate.lists["x_thawReFrozen"].options = <?php echo JsonEncode($thaw_update->thawReFrozen->options(FALSE, TRUE)) ?>;
	fthawupdate.lists["x_Day"] = <?php echo $thaw_update->Day->Lookup->toClientList($thaw_update) ?>;
	fthawupdate.lists["x_Day"].options = <?php echo JsonEncode($thaw_update->Day->options(FALSE, TRUE)) ?>;
	fthawupdate.lists["x_Grade"] = <?php echo $thaw_update->Grade->Lookup->toClientList($thaw_update) ?>;
	fthawupdate.lists["x_Grade"].options = <?php echo JsonEncode($thaw_update->Grade->options(FALSE, TRUE)) ?>;
	loadjs.done("fthawupdate");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $thaw_update->showPageHeader(); ?>
<?php
$thaw_update->showMessage();
?>
<form name="fthawupdate" id="fthawupdate" class="<?php echo $thaw_update->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="thaw">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$thaw_update->IsModal ?>">
<?php foreach ($thaw_update->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div id="tbl_thawupdate" class="ew-update-div"><!-- page -->
	<div class="custom-control custom-checkbox">
		<input type="checkbox" class="custom-control-input" name="u" id="u" onclick="ew.selectAll(this);"><label class="custom-control-label" for="u"><?php echo $Language->phrase("UpdateSelectAll") ?></label>
	</div>
<?php if ($thaw_update->thawDate->Visible) { // thawDate ?>
	<div id="r_thawDate" class="form-group row">
		<label for="x_thawDate" class="<?php echo $thaw_update->LeftColumnClass ?>"><div class="custom-control custom-checkbox">
<input type="checkbox" name="u_thawDate" id="u_thawDate" class="custom-control-input ew-multi-select" value="1"<?php echo $thaw_update->thawDate->MultiUpdate == "1" ? " checked" : "" ?>>
<label class="custom-control-label" for="u_thawDate"><?php echo $thaw_update->thawDate->caption() ?></label></div></label>
		<div class="<?php echo $thaw_update->RightColumnClass ?>"><div <?php echo $thaw_update->thawDate->cellAttributes() ?>>
<span id="el_thaw_thawDate">
<input type="text" data-table="thaw" data-field="x_thawDate" name="x_thawDate" id="x_thawDate" placeholder="<?php echo HtmlEncode($thaw_update->thawDate->getPlaceHolder()) ?>" value="<?php echo $thaw_update->thawDate->EditValue ?>"<?php echo $thaw_update->thawDate->editAttributes() ?>>
<?php if (!$thaw_update->thawDate->ReadOnly && !$thaw_update->thawDate->Disabled && !isset($thaw_update->thawDate->EditAttrs["readonly"]) && !isset($thaw_update->thawDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fthawupdate", "datetimepicker"], function() {
	ew.createDateTimePicker("fthawupdate", "x_thawDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $thaw_update->thawDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($thaw_update->thawPrimaryEmbryologist->Visible) { // thawPrimaryEmbryologist ?>
	<div id="r_thawPrimaryEmbryologist" class="form-group row">
		<label for="x_thawPrimaryEmbryologist" class="<?php echo $thaw_update->LeftColumnClass ?>"><div class="custom-control custom-checkbox">
<input type="checkbox" name="u_thawPrimaryEmbryologist" id="u_thawPrimaryEmbryologist" class="custom-control-input ew-multi-select" value="1"<?php echo $thaw_update->thawPrimaryEmbryologist->MultiUpdate == "1" ? " checked" : "" ?>>
<label class="custom-control-label" for="u_thawPrimaryEmbryologist"><?php echo $thaw_update->thawPrimaryEmbryologist->caption() ?></label></div></label>
		<div class="<?php echo $thaw_update->RightColumnClass ?>"><div <?php echo $thaw_update->thawPrimaryEmbryologist->cellAttributes() ?>>
<span id="el_thaw_thawPrimaryEmbryologist">
<input type="text" data-table="thaw" data-field="x_thawPrimaryEmbryologist" name="x_thawPrimaryEmbryologist" id="x_thawPrimaryEmbryologist" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($thaw_update->thawPrimaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $thaw_update->thawPrimaryEmbryologist->EditValue ?>"<?php echo $thaw_update->thawPrimaryEmbryologist->editAttributes() ?>>
</span>
<?php echo $thaw_update->thawPrimaryEmbryologist->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($thaw_update->thawSecondaryEmbryologist->Visible) { // thawSecondaryEmbryologist ?>
	<div id="r_thawSecondaryEmbryologist" class="form-group row">
		<label for="x_thawSecondaryEmbryologist" class="<?php echo $thaw_update->LeftColumnClass ?>"><div class="custom-control custom-checkbox">
<input type="checkbox" name="u_thawSecondaryEmbryologist" id="u_thawSecondaryEmbryologist" class="custom-control-input ew-multi-select" value="1"<?php echo $thaw_update->thawSecondaryEmbryologist->MultiUpdate == "1" ? " checked" : "" ?>>
<label class="custom-control-label" for="u_thawSecondaryEmbryologist"><?php echo $thaw_update->thawSecondaryEmbryologist->caption() ?></label></div></label>
		<div class="<?php echo $thaw_update->RightColumnClass ?>"><div <?php echo $thaw_update->thawSecondaryEmbryologist->cellAttributes() ?>>
<span id="el_thaw_thawSecondaryEmbryologist">
<input type="text" data-table="thaw" data-field="x_thawSecondaryEmbryologist" name="x_thawSecondaryEmbryologist" id="x_thawSecondaryEmbryologist" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($thaw_update->thawSecondaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $thaw_update->thawSecondaryEmbryologist->EditValue ?>"<?php echo $thaw_update->thawSecondaryEmbryologist->editAttributes() ?>>
</span>
<?php echo $thaw_update->thawSecondaryEmbryologist->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($thaw_update->thawReFrozen->Visible) { // thawReFrozen ?>
	<div id="r_thawReFrozen" class="form-group row">
		<label for="x_thawReFrozen" class="<?php echo $thaw_update->LeftColumnClass ?>"><div class="custom-control custom-checkbox">
<input type="checkbox" name="u_thawReFrozen" id="u_thawReFrozen" class="custom-control-input ew-multi-select" value="1"<?php echo $thaw_update->thawReFrozen->MultiUpdate == "1" ? " checked" : "" ?>>
<label class="custom-control-label" for="u_thawReFrozen"><?php echo $thaw_update->thawReFrozen->caption() ?></label></div></label>
		<div class="<?php echo $thaw_update->RightColumnClass ?>"><div <?php echo $thaw_update->thawReFrozen->cellAttributes() ?>>
<span id="el_thaw_thawReFrozen">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="thaw" data-field="x_thawReFrozen" data-value-separator="<?php echo $thaw_update->thawReFrozen->displayValueSeparatorAttribute() ?>" id="x_thawReFrozen" name="x_thawReFrozen"<?php echo $thaw_update->thawReFrozen->editAttributes() ?>>
			<?php echo $thaw_update->thawReFrozen->selectOptionListHtml("x_thawReFrozen") ?>
		</select>
</div>
</span>
<?php echo $thaw_update->thawReFrozen->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page -->
<?php if (!$thaw_update->IsModal) { ?>
	<div class="form-group row"><!-- buttons .form-group -->
		<div class="<?php echo $thaw_update->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("UpdateBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $thaw_update->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
		</div><!-- /buttons offset -->
	</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$thaw_update->showPageFooter();
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
$thaw_update->terminate();
?>