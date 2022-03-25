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
$view_et_update = new view_et_update();

// Run the page
$view_et_update->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_et_update->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fview_etupdate, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "update";
	fview_etupdate = currentForm = new ew.Form("fview_etupdate", "update");

	// Validate form
	fview_etupdate.validate = function() {
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
			<?php if ($view_et_update->RIDNo->Required) { ?>
				elm = this.getElements("x" + infix + "_RIDNo");
				uelm = this.getElements("u" + infix + "_RIDNo");
				if (uelm && uelm.checked) {
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_et_update->RIDNo->caption(), $view_et_update->RIDNo->RequiredErrorMessage)) ?>");
				}
			<?php } ?>
			<?php if ($view_et_update->PatientName->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientName");
				uelm = this.getElements("u" + infix + "_PatientName");
				if (uelm && uelm.checked) {
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_et_update->PatientName->caption(), $view_et_update->PatientName->RequiredErrorMessage)) ?>");
				}
			<?php } ?>
			<?php if ($view_et_update->TiDNo->Required) { ?>
				elm = this.getElements("x" + infix + "_TiDNo");
				uelm = this.getElements("u" + infix + "_TiDNo");
				if (uelm && uelm.checked) {
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_et_update->TiDNo->caption(), $view_et_update->TiDNo->RequiredErrorMessage)) ?>");
				}
			<?php } ?>
			<?php if ($view_et_update->EmbryoNo->Required) { ?>
				elm = this.getElements("x" + infix + "_EmbryoNo");
				uelm = this.getElements("u" + infix + "_EmbryoNo");
				if (uelm && uelm.checked) {
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_et_update->EmbryoNo->caption(), $view_et_update->EmbryoNo->RequiredErrorMessage)) ?>");
				}
			<?php } ?>
			<?php if ($view_et_update->Stage->Required) { ?>
				elm = this.getElements("x" + infix + "_Stage");
				uelm = this.getElements("u" + infix + "_Stage");
				if (uelm && uelm.checked) {
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_et_update->Stage->caption(), $view_et_update->Stage->RequiredErrorMessage)) ?>");
				}
			<?php } ?>
			<?php if ($view_et_update->FertilisationDate->Required) { ?>
				elm = this.getElements("x" + infix + "_FertilisationDate");
				uelm = this.getElements("u" + infix + "_FertilisationDate");
				if (uelm && uelm.checked) {
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_et_update->FertilisationDate->caption(), $view_et_update->FertilisationDate->RequiredErrorMessage)) ?>");
				}
			<?php } ?>
			<?php if ($view_et_update->Day->Required) { ?>
				elm = this.getElements("x" + infix + "_Day");
				uelm = this.getElements("u" + infix + "_Day");
				if (uelm && uelm.checked) {
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_et_update->Day->caption(), $view_et_update->Day->RequiredErrorMessage)) ?>");
				}
			<?php } ?>
			<?php if ($view_et_update->Grade->Required) { ?>
				elm = this.getElements("x" + infix + "_Grade");
				uelm = this.getElements("u" + infix + "_Grade");
				if (uelm && uelm.checked) {
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_et_update->Grade->caption(), $view_et_update->Grade->RequiredErrorMessage)) ?>");
				}
			<?php } ?>
			<?php if ($view_et_update->Incubator->Required) { ?>
				elm = this.getElements("x" + infix + "_Incubator");
				uelm = this.getElements("u" + infix + "_Incubator");
				if (uelm && uelm.checked) {
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_et_update->Incubator->caption(), $view_et_update->Incubator->RequiredErrorMessage)) ?>");
				}
			<?php } ?>
			<?php if ($view_et_update->Catheter->Required) { ?>
				elm = this.getElements("x" + infix + "_Catheter");
				uelm = this.getElements("u" + infix + "_Catheter");
				if (uelm && uelm.checked) {
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_et_update->Catheter->caption(), $view_et_update->Catheter->RequiredErrorMessage)) ?>");
				}
			<?php } ?>
			<?php if ($view_et_update->Difficulty->Required) { ?>
				elm = this.getElements("x" + infix + "_Difficulty");
				uelm = this.getElements("u" + infix + "_Difficulty");
				if (uelm && uelm.checked) {
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_et_update->Difficulty->caption(), $view_et_update->Difficulty->RequiredErrorMessage)) ?>");
				}
			<?php } ?>
			<?php if ($view_et_update->Easy->Required) { ?>
				elm = this.getElements("x" + infix + "_Easy[]");
				uelm = this.getElements("u" + infix + "_Easy");
				if (uelm && uelm.checked) {
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_et_update->Easy->caption(), $view_et_update->Easy->RequiredErrorMessage)) ?>");
				}
			<?php } ?>
			<?php if ($view_et_update->Comments->Required) { ?>
				elm = this.getElements("x" + infix + "_Comments");
				uelm = this.getElements("u" + infix + "_Comments");
				if (uelm && uelm.checked) {
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_et_update->Comments->caption(), $view_et_update->Comments->RequiredErrorMessage)) ?>");
				}
			<?php } ?>
			<?php if ($view_et_update->Doctor->Required) { ?>
				elm = this.getElements("x" + infix + "_Doctor");
				uelm = this.getElements("u" + infix + "_Doctor");
				if (uelm && uelm.checked) {
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_et_update->Doctor->caption(), $view_et_update->Doctor->RequiredErrorMessage)) ?>");
				}
			<?php } ?>
			<?php if ($view_et_update->Embryologist->Required) { ?>
				elm = this.getElements("x" + infix + "_Embryologist");
				uelm = this.getElements("u" + infix + "_Embryologist");
				if (uelm && uelm.checked) {
					if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
						return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $view_et_update->Embryologist->caption(), $view_et_update->Embryologist->RequiredErrorMessage)) ?>");
				}
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
		}
		return true;
	}

	// Form_CustomValidate
	fview_etupdate.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fview_etupdate.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fview_etupdate.lists["x_Day"] = <?php echo $view_et_update->Day->Lookup->toClientList($view_et_update) ?>;
	fview_etupdate.lists["x_Day"].options = <?php echo JsonEncode($view_et_update->Day->options(FALSE, TRUE)) ?>;
	fview_etupdate.lists["x_Grade"] = <?php echo $view_et_update->Grade->Lookup->toClientList($view_et_update) ?>;
	fview_etupdate.lists["x_Grade"].options = <?php echo JsonEncode($view_et_update->Grade->options(FALSE, TRUE)) ?>;
	fview_etupdate.lists["x_Difficulty"] = <?php echo $view_et_update->Difficulty->Lookup->toClientList($view_et_update) ?>;
	fview_etupdate.lists["x_Difficulty"].options = <?php echo JsonEncode($view_et_update->Difficulty->options(FALSE, TRUE)) ?>;
	fview_etupdate.lists["x_Easy[]"] = <?php echo $view_et_update->Easy->Lookup->toClientList($view_et_update) ?>;
	fview_etupdate.lists["x_Easy[]"].options = <?php echo JsonEncode($view_et_update->Easy->options(FALSE, TRUE)) ?>;
	loadjs.done("fview_etupdate");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $view_et_update->showPageHeader(); ?>
<?php
$view_et_update->showMessage();
?>
<form name="fview_etupdate" id="fview_etupdate" class="<?php echo $view_et_update->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_et">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$view_et_update->IsModal ?>">
<?php foreach ($view_et_update->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div id="tbl_view_etupdate" class="ew-update-div"><!-- page -->
	<div class="custom-control custom-checkbox">
		<input type="checkbox" class="custom-control-input" name="u" id="u" onclick="ew.selectAll(this);"><label class="custom-control-label" for="u"><?php echo $Language->phrase("UpdateSelectAll") ?></label>
	</div>
<?php if ($view_et_update->Catheter->Visible) { // Catheter ?>
	<div id="r_Catheter" class="form-group row">
		<label for="x_Catheter" class="<?php echo $view_et_update->LeftColumnClass ?>"><div class="custom-control custom-checkbox">
<input type="checkbox" name="u_Catheter" id="u_Catheter" class="custom-control-input ew-multi-select" value="1"<?php echo $view_et_update->Catheter->MultiUpdate == "1" ? " checked" : "" ?>>
<label class="custom-control-label" for="u_Catheter"><?php echo $view_et_update->Catheter->caption() ?></label></div></label>
		<div class="<?php echo $view_et_update->RightColumnClass ?>"><div <?php echo $view_et_update->Catheter->cellAttributes() ?>>
<span id="el_view_et_Catheter">
<input type="text" data-table="view_et" data-field="x_Catheter" name="x_Catheter" id="x_Catheter" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_et_update->Catheter->getPlaceHolder()) ?>" value="<?php echo $view_et_update->Catheter->EditValue ?>"<?php echo $view_et_update->Catheter->editAttributes() ?>>
</span>
<?php echo $view_et_update->Catheter->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_et_update->Difficulty->Visible) { // Difficulty ?>
	<div id="r_Difficulty" class="form-group row">
		<label for="x_Difficulty" class="<?php echo $view_et_update->LeftColumnClass ?>"><div class="custom-control custom-checkbox">
<input type="checkbox" name="u_Difficulty" id="u_Difficulty" class="custom-control-input ew-multi-select" value="1"<?php echo $view_et_update->Difficulty->MultiUpdate == "1" ? " checked" : "" ?>>
<label class="custom-control-label" for="u_Difficulty"><?php echo $view_et_update->Difficulty->caption() ?></label></div></label>
		<div class="<?php echo $view_et_update->RightColumnClass ?>"><div <?php echo $view_et_update->Difficulty->cellAttributes() ?>>
<span id="el_view_et_Difficulty">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="view_et" data-field="x_Difficulty" data-value-separator="<?php echo $view_et_update->Difficulty->displayValueSeparatorAttribute() ?>" id="x_Difficulty" name="x_Difficulty"<?php echo $view_et_update->Difficulty->editAttributes() ?>>
			<?php echo $view_et_update->Difficulty->selectOptionListHtml("x_Difficulty") ?>
		</select>
</div>
</span>
<?php echo $view_et_update->Difficulty->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_et_update->Easy->Visible) { // Easy ?>
	<div id="r_Easy" class="form-group row">
		<label class="<?php echo $view_et_update->LeftColumnClass ?>"><div class="custom-control custom-checkbox">
<input type="checkbox" name="u_Easy" id="u_Easy" class="custom-control-input ew-multi-select" value="1"<?php echo $view_et_update->Easy->MultiUpdate == "1" ? " checked" : "" ?>>
<label class="custom-control-label" for="u_Easy"><?php echo $view_et_update->Easy->caption() ?></label></div></label>
		<div class="<?php echo $view_et_update->RightColumnClass ?>"><div <?php echo $view_et_update->Easy->cellAttributes() ?>>
<span id="el_view_et_Easy">
<div id="tp_x_Easy" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="view_et" data-field="x_Easy" data-value-separator="<?php echo $view_et_update->Easy->displayValueSeparatorAttribute() ?>" name="x_Easy[]" id="x_Easy[]" value="{value}"<?php echo $view_et_update->Easy->editAttributes() ?>></div>
<div id="dsl_x_Easy" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $view_et_update->Easy->checkBoxListHtml(FALSE, "x_Easy[]") ?>
</div></div>
</span>
<?php echo $view_et_update->Easy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_et_update->Comments->Visible) { // Comments ?>
	<div id="r_Comments" class="form-group row">
		<label for="x_Comments" class="<?php echo $view_et_update->LeftColumnClass ?>"><div class="custom-control custom-checkbox">
<input type="checkbox" name="u_Comments" id="u_Comments" class="custom-control-input ew-multi-select" value="1"<?php echo $view_et_update->Comments->MultiUpdate == "1" ? " checked" : "" ?>>
<label class="custom-control-label" for="u_Comments"><?php echo $view_et_update->Comments->caption() ?></label></div></label>
		<div class="<?php echo $view_et_update->RightColumnClass ?>"><div <?php echo $view_et_update->Comments->cellAttributes() ?>>
<span id="el_view_et_Comments">
<input type="text" data-table="view_et" data-field="x_Comments" name="x_Comments" id="x_Comments" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_et_update->Comments->getPlaceHolder()) ?>" value="<?php echo $view_et_update->Comments->EditValue ?>"<?php echo $view_et_update->Comments->editAttributes() ?>>
</span>
<?php echo $view_et_update->Comments->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_et_update->Doctor->Visible) { // Doctor ?>
	<div id="r_Doctor" class="form-group row">
		<label for="x_Doctor" class="<?php echo $view_et_update->LeftColumnClass ?>"><div class="custom-control custom-checkbox">
<input type="checkbox" name="u_Doctor" id="u_Doctor" class="custom-control-input ew-multi-select" value="1"<?php echo $view_et_update->Doctor->MultiUpdate == "1" ? " checked" : "" ?>>
<label class="custom-control-label" for="u_Doctor"><?php echo $view_et_update->Doctor->caption() ?></label></div></label>
		<div class="<?php echo $view_et_update->RightColumnClass ?>"><div <?php echo $view_et_update->Doctor->cellAttributes() ?>>
<span id="el_view_et_Doctor">
<input type="text" data-table="view_et" data-field="x_Doctor" name="x_Doctor" id="x_Doctor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_et_update->Doctor->getPlaceHolder()) ?>" value="<?php echo $view_et_update->Doctor->EditValue ?>"<?php echo $view_et_update->Doctor->editAttributes() ?>>
</span>
<?php echo $view_et_update->Doctor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($view_et_update->Embryologist->Visible) { // Embryologist ?>
	<div id="r_Embryologist" class="form-group row">
		<label for="x_Embryologist" class="<?php echo $view_et_update->LeftColumnClass ?>"><div class="custom-control custom-checkbox">
<input type="checkbox" name="u_Embryologist" id="u_Embryologist" class="custom-control-input ew-multi-select" value="1"<?php echo $view_et_update->Embryologist->MultiUpdate == "1" ? " checked" : "" ?>>
<label class="custom-control-label" for="u_Embryologist"><?php echo $view_et_update->Embryologist->caption() ?></label></div></label>
		<div class="<?php echo $view_et_update->RightColumnClass ?>"><div <?php echo $view_et_update->Embryologist->cellAttributes() ?>>
<span id="el_view_et_Embryologist">
<input type="text" data-table="view_et" data-field="x_Embryologist" name="x_Embryologist" id="x_Embryologist" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($view_et_update->Embryologist->getPlaceHolder()) ?>" value="<?php echo $view_et_update->Embryologist->EditValue ?>"<?php echo $view_et_update->Embryologist->editAttributes() ?>>
</span>
<?php echo $view_et_update->Embryologist->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page -->
<?php if (!$view_et_update->IsModal) { ?>
	<div class="form-group row"><!-- buttons .form-group -->
		<div class="<?php echo $view_et_update->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("UpdateBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $view_et_update->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
		</div><!-- /buttons offset -->
	</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$view_et_update->showPageFooter();
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
$view_et_update->terminate();
?>