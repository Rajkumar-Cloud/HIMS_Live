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
$thaw_edit = new thaw_edit();

// Run the page
$thaw_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$thaw_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fthawedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fthawedit = currentForm = new ew.Form("fthawedit", "edit");

	// Validate form
	fthawedit.validate = function() {
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
			<?php if ($thaw_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw_edit->id->caption(), $thaw_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($thaw_edit->RIDNo->Required) { ?>
				elm = this.getElements("x" + infix + "_RIDNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw_edit->RIDNo->caption(), $thaw_edit->RIDNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($thaw_edit->PatientName->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw_edit->PatientName->caption(), $thaw_edit->PatientName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($thaw_edit->TiDNo->Required) { ?>
				elm = this.getElements("x" + infix + "_TiDNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw_edit->TiDNo->caption(), $thaw_edit->TiDNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($thaw_edit->thawDate->Required) { ?>
				elm = this.getElements("x" + infix + "_thawDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw_edit->thawDate->caption(), $thaw_edit->thawDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_thawDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($thaw_edit->thawDate->errorMessage()) ?>");
			<?php if ($thaw_edit->thawPrimaryEmbryologist->Required) { ?>
				elm = this.getElements("x" + infix + "_thawPrimaryEmbryologist");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw_edit->thawPrimaryEmbryologist->caption(), $thaw_edit->thawPrimaryEmbryologist->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($thaw_edit->thawSecondaryEmbryologist->Required) { ?>
				elm = this.getElements("x" + infix + "_thawSecondaryEmbryologist");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw_edit->thawSecondaryEmbryologist->caption(), $thaw_edit->thawSecondaryEmbryologist->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($thaw_edit->thawReFrozen->Required) { ?>
				elm = this.getElements("x" + infix + "_thawReFrozen");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw_edit->thawReFrozen->caption(), $thaw_edit->thawReFrozen->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($thaw_edit->vitrificationDate->Required) { ?>
				elm = this.getElements("x" + infix + "_vitrificationDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw_edit->vitrificationDate->caption(), $thaw_edit->vitrificationDate->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($thaw_edit->PrimaryEmbryologist->Required) { ?>
				elm = this.getElements("x" + infix + "_PrimaryEmbryologist");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw_edit->PrimaryEmbryologist->caption(), $thaw_edit->PrimaryEmbryologist->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($thaw_edit->SecondaryEmbryologist->Required) { ?>
				elm = this.getElements("x" + infix + "_SecondaryEmbryologist");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw_edit->SecondaryEmbryologist->caption(), $thaw_edit->SecondaryEmbryologist->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($thaw_edit->EmbryoNo->Required) { ?>
				elm = this.getElements("x" + infix + "_EmbryoNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw_edit->EmbryoNo->caption(), $thaw_edit->EmbryoNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($thaw_edit->FertilisationDate->Required) { ?>
				elm = this.getElements("x" + infix + "_FertilisationDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw_edit->FertilisationDate->caption(), $thaw_edit->FertilisationDate->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($thaw_edit->Day->Required) { ?>
				elm = this.getElements("x" + infix + "_Day");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw_edit->Day->caption(), $thaw_edit->Day->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($thaw_edit->Grade->Required) { ?>
				elm = this.getElements("x" + infix + "_Grade");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw_edit->Grade->caption(), $thaw_edit->Grade->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($thaw_edit->Incubator->Required) { ?>
				elm = this.getElements("x" + infix + "_Incubator");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw_edit->Incubator->caption(), $thaw_edit->Incubator->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($thaw_edit->Tank->Required) { ?>
				elm = this.getElements("x" + infix + "_Tank");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw_edit->Tank->caption(), $thaw_edit->Tank->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($thaw_edit->Canister->Required) { ?>
				elm = this.getElements("x" + infix + "_Canister");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw_edit->Canister->caption(), $thaw_edit->Canister->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($thaw_edit->Gobiet->Required) { ?>
				elm = this.getElements("x" + infix + "_Gobiet");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw_edit->Gobiet->caption(), $thaw_edit->Gobiet->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($thaw_edit->CryolockNo->Required) { ?>
				elm = this.getElements("x" + infix + "_CryolockNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw_edit->CryolockNo->caption(), $thaw_edit->CryolockNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($thaw_edit->CryolockColour->Required) { ?>
				elm = this.getElements("x" + infix + "_CryolockColour");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw_edit->CryolockColour->caption(), $thaw_edit->CryolockColour->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($thaw_edit->Stage->Required) { ?>
				elm = this.getElements("x" + infix + "_Stage");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $thaw_edit->Stage->caption(), $thaw_edit->Stage->RequiredErrorMessage)) ?>");
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
	fthawedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fthawedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fthawedit.lists["x_thawReFrozen"] = <?php echo $thaw_edit->thawReFrozen->Lookup->toClientList($thaw_edit) ?>;
	fthawedit.lists["x_thawReFrozen"].options = <?php echo JsonEncode($thaw_edit->thawReFrozen->options(FALSE, TRUE)) ?>;
	loadjs.done("fthawedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $thaw_edit->showPageHeader(); ?>
<?php
$thaw_edit->showMessage();
?>
<form name="fthawedit" id="fthawedit" class="<?php echo $thaw_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="thaw">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$thaw_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($thaw_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_thaw_id" class="<?php echo $thaw_edit->LeftColumnClass ?>"><?php echo $thaw_edit->id->caption() ?><?php echo $thaw_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $thaw_edit->RightColumnClass ?>"><div <?php echo $thaw_edit->id->cellAttributes() ?>>
<span id="el_thaw_id">
<span<?php echo $thaw_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($thaw_edit->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="thaw" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($thaw_edit->id->CurrentValue) ?>">
<?php echo $thaw_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($thaw_edit->RIDNo->Visible) { // RIDNo ?>
	<div id="r_RIDNo" class="form-group row">
		<label id="elh_thaw_RIDNo" for="x_RIDNo" class="<?php echo $thaw_edit->LeftColumnClass ?>"><?php echo $thaw_edit->RIDNo->caption() ?><?php echo $thaw_edit->RIDNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $thaw_edit->RightColumnClass ?>"><div <?php echo $thaw_edit->RIDNo->cellAttributes() ?>>
<span id="el_thaw_RIDNo">
<span<?php echo $thaw_edit->RIDNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($thaw_edit->RIDNo->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="thaw" data-field="x_RIDNo" name="x_RIDNo" id="x_RIDNo" value="<?php echo HtmlEncode($thaw_edit->RIDNo->CurrentValue) ?>">
<?php echo $thaw_edit->RIDNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($thaw_edit->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label id="elh_thaw_PatientName" for="x_PatientName" class="<?php echo $thaw_edit->LeftColumnClass ?>"><?php echo $thaw_edit->PatientName->caption() ?><?php echo $thaw_edit->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $thaw_edit->RightColumnClass ?>"><div <?php echo $thaw_edit->PatientName->cellAttributes() ?>>
<span id="el_thaw_PatientName">
<span<?php echo $thaw_edit->PatientName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($thaw_edit->PatientName->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="thaw" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" value="<?php echo HtmlEncode($thaw_edit->PatientName->CurrentValue) ?>">
<?php echo $thaw_edit->PatientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($thaw_edit->TiDNo->Visible) { // TiDNo ?>
	<div id="r_TiDNo" class="form-group row">
		<label id="elh_thaw_TiDNo" for="x_TiDNo" class="<?php echo $thaw_edit->LeftColumnClass ?>"><?php echo $thaw_edit->TiDNo->caption() ?><?php echo $thaw_edit->TiDNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $thaw_edit->RightColumnClass ?>"><div <?php echo $thaw_edit->TiDNo->cellAttributes() ?>>
<span id="el_thaw_TiDNo">
<span<?php echo $thaw_edit->TiDNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($thaw_edit->TiDNo->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="thaw" data-field="x_TiDNo" name="x_TiDNo" id="x_TiDNo" value="<?php echo HtmlEncode($thaw_edit->TiDNo->CurrentValue) ?>">
<?php echo $thaw_edit->TiDNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($thaw_edit->thawDate->Visible) { // thawDate ?>
	<div id="r_thawDate" class="form-group row">
		<label id="elh_thaw_thawDate" for="x_thawDate" class="<?php echo $thaw_edit->LeftColumnClass ?>"><?php echo $thaw_edit->thawDate->caption() ?><?php echo $thaw_edit->thawDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $thaw_edit->RightColumnClass ?>"><div <?php echo $thaw_edit->thawDate->cellAttributes() ?>>
<span id="el_thaw_thawDate">
<input type="text" data-table="thaw" data-field="x_thawDate" name="x_thawDate" id="x_thawDate" placeholder="<?php echo HtmlEncode($thaw_edit->thawDate->getPlaceHolder()) ?>" value="<?php echo $thaw_edit->thawDate->EditValue ?>"<?php echo $thaw_edit->thawDate->editAttributes() ?>>
<?php if (!$thaw_edit->thawDate->ReadOnly && !$thaw_edit->thawDate->Disabled && !isset($thaw_edit->thawDate->EditAttrs["readonly"]) && !isset($thaw_edit->thawDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fthawedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fthawedit", "x_thawDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $thaw_edit->thawDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($thaw_edit->thawPrimaryEmbryologist->Visible) { // thawPrimaryEmbryologist ?>
	<div id="r_thawPrimaryEmbryologist" class="form-group row">
		<label id="elh_thaw_thawPrimaryEmbryologist" for="x_thawPrimaryEmbryologist" class="<?php echo $thaw_edit->LeftColumnClass ?>"><?php echo $thaw_edit->thawPrimaryEmbryologist->caption() ?><?php echo $thaw_edit->thawPrimaryEmbryologist->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $thaw_edit->RightColumnClass ?>"><div <?php echo $thaw_edit->thawPrimaryEmbryologist->cellAttributes() ?>>
<span id="el_thaw_thawPrimaryEmbryologist">
<input type="text" data-table="thaw" data-field="x_thawPrimaryEmbryologist" name="x_thawPrimaryEmbryologist" id="x_thawPrimaryEmbryologist" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($thaw_edit->thawPrimaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $thaw_edit->thawPrimaryEmbryologist->EditValue ?>"<?php echo $thaw_edit->thawPrimaryEmbryologist->editAttributes() ?>>
</span>
<?php echo $thaw_edit->thawPrimaryEmbryologist->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($thaw_edit->thawSecondaryEmbryologist->Visible) { // thawSecondaryEmbryologist ?>
	<div id="r_thawSecondaryEmbryologist" class="form-group row">
		<label id="elh_thaw_thawSecondaryEmbryologist" for="x_thawSecondaryEmbryologist" class="<?php echo $thaw_edit->LeftColumnClass ?>"><?php echo $thaw_edit->thawSecondaryEmbryologist->caption() ?><?php echo $thaw_edit->thawSecondaryEmbryologist->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $thaw_edit->RightColumnClass ?>"><div <?php echo $thaw_edit->thawSecondaryEmbryologist->cellAttributes() ?>>
<span id="el_thaw_thawSecondaryEmbryologist">
<input type="text" data-table="thaw" data-field="x_thawSecondaryEmbryologist" name="x_thawSecondaryEmbryologist" id="x_thawSecondaryEmbryologist" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($thaw_edit->thawSecondaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $thaw_edit->thawSecondaryEmbryologist->EditValue ?>"<?php echo $thaw_edit->thawSecondaryEmbryologist->editAttributes() ?>>
</span>
<?php echo $thaw_edit->thawSecondaryEmbryologist->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($thaw_edit->thawReFrozen->Visible) { // thawReFrozen ?>
	<div id="r_thawReFrozen" class="form-group row">
		<label id="elh_thaw_thawReFrozen" for="x_thawReFrozen" class="<?php echo $thaw_edit->LeftColumnClass ?>"><?php echo $thaw_edit->thawReFrozen->caption() ?><?php echo $thaw_edit->thawReFrozen->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $thaw_edit->RightColumnClass ?>"><div <?php echo $thaw_edit->thawReFrozen->cellAttributes() ?>>
<span id="el_thaw_thawReFrozen">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="thaw" data-field="x_thawReFrozen" data-value-separator="<?php echo $thaw_edit->thawReFrozen->displayValueSeparatorAttribute() ?>" id="x_thawReFrozen" name="x_thawReFrozen"<?php echo $thaw_edit->thawReFrozen->editAttributes() ?>>
			<?php echo $thaw_edit->thawReFrozen->selectOptionListHtml("x_thawReFrozen") ?>
		</select>
</div>
</span>
<?php echo $thaw_edit->thawReFrozen->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($thaw_edit->vitrificationDate->Visible) { // vitrificationDate ?>
	<div id="r_vitrificationDate" class="form-group row">
		<label id="elh_thaw_vitrificationDate" for="x_vitrificationDate" class="<?php echo $thaw_edit->LeftColumnClass ?>"><?php echo $thaw_edit->vitrificationDate->caption() ?><?php echo $thaw_edit->vitrificationDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $thaw_edit->RightColumnClass ?>"><div <?php echo $thaw_edit->vitrificationDate->cellAttributes() ?>>
<span id="el_thaw_vitrificationDate">
<span<?php echo $thaw_edit->vitrificationDate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($thaw_edit->vitrificationDate->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="thaw" data-field="x_vitrificationDate" name="x_vitrificationDate" id="x_vitrificationDate" value="<?php echo HtmlEncode($thaw_edit->vitrificationDate->CurrentValue) ?>">
<?php echo $thaw_edit->vitrificationDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($thaw_edit->PrimaryEmbryologist->Visible) { // PrimaryEmbryologist ?>
	<div id="r_PrimaryEmbryologist" class="form-group row">
		<label id="elh_thaw_PrimaryEmbryologist" for="x_PrimaryEmbryologist" class="<?php echo $thaw_edit->LeftColumnClass ?>"><?php echo $thaw_edit->PrimaryEmbryologist->caption() ?><?php echo $thaw_edit->PrimaryEmbryologist->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $thaw_edit->RightColumnClass ?>"><div <?php echo $thaw_edit->PrimaryEmbryologist->cellAttributes() ?>>
<span id="el_thaw_PrimaryEmbryologist">
<span<?php echo $thaw_edit->PrimaryEmbryologist->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($thaw_edit->PrimaryEmbryologist->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="thaw" data-field="x_PrimaryEmbryologist" name="x_PrimaryEmbryologist" id="x_PrimaryEmbryologist" value="<?php echo HtmlEncode($thaw_edit->PrimaryEmbryologist->CurrentValue) ?>">
<?php echo $thaw_edit->PrimaryEmbryologist->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($thaw_edit->SecondaryEmbryologist->Visible) { // SecondaryEmbryologist ?>
	<div id="r_SecondaryEmbryologist" class="form-group row">
		<label id="elh_thaw_SecondaryEmbryologist" for="x_SecondaryEmbryologist" class="<?php echo $thaw_edit->LeftColumnClass ?>"><?php echo $thaw_edit->SecondaryEmbryologist->caption() ?><?php echo $thaw_edit->SecondaryEmbryologist->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $thaw_edit->RightColumnClass ?>"><div <?php echo $thaw_edit->SecondaryEmbryologist->cellAttributes() ?>>
<span id="el_thaw_SecondaryEmbryologist">
<span<?php echo $thaw_edit->SecondaryEmbryologist->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($thaw_edit->SecondaryEmbryologist->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="thaw" data-field="x_SecondaryEmbryologist" name="x_SecondaryEmbryologist" id="x_SecondaryEmbryologist" value="<?php echo HtmlEncode($thaw_edit->SecondaryEmbryologist->CurrentValue) ?>">
<?php echo $thaw_edit->SecondaryEmbryologist->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($thaw_edit->EmbryoNo->Visible) { // EmbryoNo ?>
	<div id="r_EmbryoNo" class="form-group row">
		<label id="elh_thaw_EmbryoNo" for="x_EmbryoNo" class="<?php echo $thaw_edit->LeftColumnClass ?>"><?php echo $thaw_edit->EmbryoNo->caption() ?><?php echo $thaw_edit->EmbryoNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $thaw_edit->RightColumnClass ?>"><div <?php echo $thaw_edit->EmbryoNo->cellAttributes() ?>>
<span id="el_thaw_EmbryoNo">
<span<?php echo $thaw_edit->EmbryoNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($thaw_edit->EmbryoNo->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="thaw" data-field="x_EmbryoNo" name="x_EmbryoNo" id="x_EmbryoNo" value="<?php echo HtmlEncode($thaw_edit->EmbryoNo->CurrentValue) ?>">
<?php echo $thaw_edit->EmbryoNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($thaw_edit->FertilisationDate->Visible) { // FertilisationDate ?>
	<div id="r_FertilisationDate" class="form-group row">
		<label id="elh_thaw_FertilisationDate" for="x_FertilisationDate" class="<?php echo $thaw_edit->LeftColumnClass ?>"><?php echo $thaw_edit->FertilisationDate->caption() ?><?php echo $thaw_edit->FertilisationDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $thaw_edit->RightColumnClass ?>"><div <?php echo $thaw_edit->FertilisationDate->cellAttributes() ?>>
<span id="el_thaw_FertilisationDate">
<span<?php echo $thaw_edit->FertilisationDate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($thaw_edit->FertilisationDate->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="thaw" data-field="x_FertilisationDate" name="x_FertilisationDate" id="x_FertilisationDate" value="<?php echo HtmlEncode($thaw_edit->FertilisationDate->CurrentValue) ?>">
<?php echo $thaw_edit->FertilisationDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($thaw_edit->Day->Visible) { // Day ?>
	<div id="r_Day" class="form-group row">
		<label id="elh_thaw_Day" for="x_Day" class="<?php echo $thaw_edit->LeftColumnClass ?>"><?php echo $thaw_edit->Day->caption() ?><?php echo $thaw_edit->Day->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $thaw_edit->RightColumnClass ?>"><div <?php echo $thaw_edit->Day->cellAttributes() ?>>
<span id="el_thaw_Day">
<span<?php echo $thaw_edit->Day->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($thaw_edit->Day->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="thaw" data-field="x_Day" name="x_Day" id="x_Day" value="<?php echo HtmlEncode($thaw_edit->Day->CurrentValue) ?>">
<?php echo $thaw_edit->Day->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($thaw_edit->Grade->Visible) { // Grade ?>
	<div id="r_Grade" class="form-group row">
		<label id="elh_thaw_Grade" for="x_Grade" class="<?php echo $thaw_edit->LeftColumnClass ?>"><?php echo $thaw_edit->Grade->caption() ?><?php echo $thaw_edit->Grade->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $thaw_edit->RightColumnClass ?>"><div <?php echo $thaw_edit->Grade->cellAttributes() ?>>
<span id="el_thaw_Grade">
<span<?php echo $thaw_edit->Grade->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($thaw_edit->Grade->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="thaw" data-field="x_Grade" name="x_Grade" id="x_Grade" value="<?php echo HtmlEncode($thaw_edit->Grade->CurrentValue) ?>">
<?php echo $thaw_edit->Grade->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($thaw_edit->Incubator->Visible) { // Incubator ?>
	<div id="r_Incubator" class="form-group row">
		<label id="elh_thaw_Incubator" for="x_Incubator" class="<?php echo $thaw_edit->LeftColumnClass ?>"><?php echo $thaw_edit->Incubator->caption() ?><?php echo $thaw_edit->Incubator->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $thaw_edit->RightColumnClass ?>"><div <?php echo $thaw_edit->Incubator->cellAttributes() ?>>
<span id="el_thaw_Incubator">
<span<?php echo $thaw_edit->Incubator->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($thaw_edit->Incubator->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="thaw" data-field="x_Incubator" name="x_Incubator" id="x_Incubator" value="<?php echo HtmlEncode($thaw_edit->Incubator->CurrentValue) ?>">
<?php echo $thaw_edit->Incubator->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($thaw_edit->Tank->Visible) { // Tank ?>
	<div id="r_Tank" class="form-group row">
		<label id="elh_thaw_Tank" for="x_Tank" class="<?php echo $thaw_edit->LeftColumnClass ?>"><?php echo $thaw_edit->Tank->caption() ?><?php echo $thaw_edit->Tank->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $thaw_edit->RightColumnClass ?>"><div <?php echo $thaw_edit->Tank->cellAttributes() ?>>
<span id="el_thaw_Tank">
<span<?php echo $thaw_edit->Tank->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($thaw_edit->Tank->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="thaw" data-field="x_Tank" name="x_Tank" id="x_Tank" value="<?php echo HtmlEncode($thaw_edit->Tank->CurrentValue) ?>">
<?php echo $thaw_edit->Tank->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($thaw_edit->Canister->Visible) { // Canister ?>
	<div id="r_Canister" class="form-group row">
		<label id="elh_thaw_Canister" for="x_Canister" class="<?php echo $thaw_edit->LeftColumnClass ?>"><?php echo $thaw_edit->Canister->caption() ?><?php echo $thaw_edit->Canister->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $thaw_edit->RightColumnClass ?>"><div <?php echo $thaw_edit->Canister->cellAttributes() ?>>
<span id="el_thaw_Canister">
<span<?php echo $thaw_edit->Canister->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($thaw_edit->Canister->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="thaw" data-field="x_Canister" name="x_Canister" id="x_Canister" value="<?php echo HtmlEncode($thaw_edit->Canister->CurrentValue) ?>">
<?php echo $thaw_edit->Canister->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($thaw_edit->Gobiet->Visible) { // Gobiet ?>
	<div id="r_Gobiet" class="form-group row">
		<label id="elh_thaw_Gobiet" for="x_Gobiet" class="<?php echo $thaw_edit->LeftColumnClass ?>"><?php echo $thaw_edit->Gobiet->caption() ?><?php echo $thaw_edit->Gobiet->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $thaw_edit->RightColumnClass ?>"><div <?php echo $thaw_edit->Gobiet->cellAttributes() ?>>
<span id="el_thaw_Gobiet">
<span<?php echo $thaw_edit->Gobiet->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($thaw_edit->Gobiet->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="thaw" data-field="x_Gobiet" name="x_Gobiet" id="x_Gobiet" value="<?php echo HtmlEncode($thaw_edit->Gobiet->CurrentValue) ?>">
<?php echo $thaw_edit->Gobiet->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($thaw_edit->CryolockNo->Visible) { // CryolockNo ?>
	<div id="r_CryolockNo" class="form-group row">
		<label id="elh_thaw_CryolockNo" for="x_CryolockNo" class="<?php echo $thaw_edit->LeftColumnClass ?>"><?php echo $thaw_edit->CryolockNo->caption() ?><?php echo $thaw_edit->CryolockNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $thaw_edit->RightColumnClass ?>"><div <?php echo $thaw_edit->CryolockNo->cellAttributes() ?>>
<span id="el_thaw_CryolockNo">
<span<?php echo $thaw_edit->CryolockNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($thaw_edit->CryolockNo->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="thaw" data-field="x_CryolockNo" name="x_CryolockNo" id="x_CryolockNo" value="<?php echo HtmlEncode($thaw_edit->CryolockNo->CurrentValue) ?>">
<?php echo $thaw_edit->CryolockNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($thaw_edit->CryolockColour->Visible) { // CryolockColour ?>
	<div id="r_CryolockColour" class="form-group row">
		<label id="elh_thaw_CryolockColour" for="x_CryolockColour" class="<?php echo $thaw_edit->LeftColumnClass ?>"><?php echo $thaw_edit->CryolockColour->caption() ?><?php echo $thaw_edit->CryolockColour->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $thaw_edit->RightColumnClass ?>"><div <?php echo $thaw_edit->CryolockColour->cellAttributes() ?>>
<span id="el_thaw_CryolockColour">
<span<?php echo $thaw_edit->CryolockColour->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($thaw_edit->CryolockColour->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="thaw" data-field="x_CryolockColour" name="x_CryolockColour" id="x_CryolockColour" value="<?php echo HtmlEncode($thaw_edit->CryolockColour->CurrentValue) ?>">
<?php echo $thaw_edit->CryolockColour->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($thaw_edit->Stage->Visible) { // Stage ?>
	<div id="r_Stage" class="form-group row">
		<label id="elh_thaw_Stage" for="x_Stage" class="<?php echo $thaw_edit->LeftColumnClass ?>"><?php echo $thaw_edit->Stage->caption() ?><?php echo $thaw_edit->Stage->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $thaw_edit->RightColumnClass ?>"><div <?php echo $thaw_edit->Stage->cellAttributes() ?>>
<span id="el_thaw_Stage">
<span<?php echo $thaw_edit->Stage->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($thaw_edit->Stage->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="thaw" data-field="x_Stage" name="x_Stage" id="x_Stage" value="<?php echo HtmlEncode($thaw_edit->Stage->CurrentValue) ?>">
<?php echo $thaw_edit->Stage->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$thaw_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $thaw_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $thaw_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$thaw_edit->showPageFooter();
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
$thaw_edit->terminate();
?>