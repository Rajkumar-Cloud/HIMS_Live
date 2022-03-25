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
$recruitment_applications_edit = new recruitment_applications_edit();

// Run the page
$recruitment_applications_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$recruitment_applications_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var frecruitment_applicationsedit = currentForm = new ew.Form("frecruitment_applicationsedit", "edit");

// Validate form
frecruitment_applicationsedit.validate = function() {
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
		<?php if ($recruitment_applications_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_applications->id->caption(), $recruitment_applications->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($recruitment_applications_edit->job->Required) { ?>
			elm = this.getElements("x" + infix + "_job");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_applications->job->caption(), $recruitment_applications->job->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_job");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($recruitment_applications->job->errorMessage()) ?>");
		<?php if ($recruitment_applications_edit->candidate->Required) { ?>
			elm = this.getElements("x" + infix + "_candidate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_applications->candidate->caption(), $recruitment_applications->candidate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_candidate");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($recruitment_applications->candidate->errorMessage()) ?>");
		<?php if ($recruitment_applications_edit->created->Required) { ?>
			elm = this.getElements("x" + infix + "_created");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_applications->created->caption(), $recruitment_applications->created->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_created");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($recruitment_applications->created->errorMessage()) ?>");
		<?php if ($recruitment_applications_edit->referredByEmail->Required) { ?>
			elm = this.getElements("x" + infix + "_referredByEmail");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_applications->referredByEmail->caption(), $recruitment_applications->referredByEmail->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($recruitment_applications_edit->notes->Required) { ?>
			elm = this.getElements("x" + infix + "_notes");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_applications->notes->caption(), $recruitment_applications->notes->RequiredErrorMessage)) ?>");
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
frecruitment_applicationsedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
frecruitment_applicationsedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $recruitment_applications_edit->showPageHeader(); ?>
<?php
$recruitment_applications_edit->showMessage();
?>
<form name="frecruitment_applicationsedit" id="frecruitment_applicationsedit" class="<?php echo $recruitment_applications_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($recruitment_applications_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $recruitment_applications_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="recruitment_applications">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$recruitment_applications_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($recruitment_applications->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_recruitment_applications_id" class="<?php echo $recruitment_applications_edit->LeftColumnClass ?>"><?php echo $recruitment_applications->id->caption() ?><?php echo ($recruitment_applications->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_applications_edit->RightColumnClass ?>"><div<?php echo $recruitment_applications->id->cellAttributes() ?>>
<span id="el_recruitment_applications_id">
<span<?php echo $recruitment_applications->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($recruitment_applications->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="recruitment_applications" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($recruitment_applications->id->CurrentValue) ?>">
<?php echo $recruitment_applications->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_applications->job->Visible) { // job ?>
	<div id="r_job" class="form-group row">
		<label id="elh_recruitment_applications_job" for="x_job" class="<?php echo $recruitment_applications_edit->LeftColumnClass ?>"><?php echo $recruitment_applications->job->caption() ?><?php echo ($recruitment_applications->job->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_applications_edit->RightColumnClass ?>"><div<?php echo $recruitment_applications->job->cellAttributes() ?>>
<span id="el_recruitment_applications_job">
<input type="text" data-table="recruitment_applications" data-field="x_job" name="x_job" id="x_job" size="30" placeholder="<?php echo HtmlEncode($recruitment_applications->job->getPlaceHolder()) ?>" value="<?php echo $recruitment_applications->job->EditValue ?>"<?php echo $recruitment_applications->job->editAttributes() ?>>
</span>
<?php echo $recruitment_applications->job->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_applications->candidate->Visible) { // candidate ?>
	<div id="r_candidate" class="form-group row">
		<label id="elh_recruitment_applications_candidate" for="x_candidate" class="<?php echo $recruitment_applications_edit->LeftColumnClass ?>"><?php echo $recruitment_applications->candidate->caption() ?><?php echo ($recruitment_applications->candidate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_applications_edit->RightColumnClass ?>"><div<?php echo $recruitment_applications->candidate->cellAttributes() ?>>
<span id="el_recruitment_applications_candidate">
<input type="text" data-table="recruitment_applications" data-field="x_candidate" name="x_candidate" id="x_candidate" size="30" placeholder="<?php echo HtmlEncode($recruitment_applications->candidate->getPlaceHolder()) ?>" value="<?php echo $recruitment_applications->candidate->EditValue ?>"<?php echo $recruitment_applications->candidate->editAttributes() ?>>
</span>
<?php echo $recruitment_applications->candidate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_applications->created->Visible) { // created ?>
	<div id="r_created" class="form-group row">
		<label id="elh_recruitment_applications_created" for="x_created" class="<?php echo $recruitment_applications_edit->LeftColumnClass ?>"><?php echo $recruitment_applications->created->caption() ?><?php echo ($recruitment_applications->created->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_applications_edit->RightColumnClass ?>"><div<?php echo $recruitment_applications->created->cellAttributes() ?>>
<span id="el_recruitment_applications_created">
<input type="text" data-table="recruitment_applications" data-field="x_created" name="x_created" id="x_created" placeholder="<?php echo HtmlEncode($recruitment_applications->created->getPlaceHolder()) ?>" value="<?php echo $recruitment_applications->created->EditValue ?>"<?php echo $recruitment_applications->created->editAttributes() ?>>
<?php if (!$recruitment_applications->created->ReadOnly && !$recruitment_applications->created->Disabled && !isset($recruitment_applications->created->EditAttrs["readonly"]) && !isset($recruitment_applications->created->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("frecruitment_applicationsedit", "x_created", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $recruitment_applications->created->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_applications->referredByEmail->Visible) { // referredByEmail ?>
	<div id="r_referredByEmail" class="form-group row">
		<label id="elh_recruitment_applications_referredByEmail" for="x_referredByEmail" class="<?php echo $recruitment_applications_edit->LeftColumnClass ?>"><?php echo $recruitment_applications->referredByEmail->caption() ?><?php echo ($recruitment_applications->referredByEmail->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_applications_edit->RightColumnClass ?>"><div<?php echo $recruitment_applications->referredByEmail->cellAttributes() ?>>
<span id="el_recruitment_applications_referredByEmail">
<input type="text" data-table="recruitment_applications" data-field="x_referredByEmail" name="x_referredByEmail" id="x_referredByEmail" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($recruitment_applications->referredByEmail->getPlaceHolder()) ?>" value="<?php echo $recruitment_applications->referredByEmail->EditValue ?>"<?php echo $recruitment_applications->referredByEmail->editAttributes() ?>>
</span>
<?php echo $recruitment_applications->referredByEmail->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_applications->notes->Visible) { // notes ?>
	<div id="r_notes" class="form-group row">
		<label id="elh_recruitment_applications_notes" for="x_notes" class="<?php echo $recruitment_applications_edit->LeftColumnClass ?>"><?php echo $recruitment_applications->notes->caption() ?><?php echo ($recruitment_applications->notes->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_applications_edit->RightColumnClass ?>"><div<?php echo $recruitment_applications->notes->cellAttributes() ?>>
<span id="el_recruitment_applications_notes">
<textarea data-table="recruitment_applications" data-field="x_notes" name="x_notes" id="x_notes" cols="35" rows="4" placeholder="<?php echo HtmlEncode($recruitment_applications->notes->getPlaceHolder()) ?>"<?php echo $recruitment_applications->notes->editAttributes() ?>><?php echo $recruitment_applications->notes->EditValue ?></textarea>
</span>
<?php echo $recruitment_applications->notes->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$recruitment_applications_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $recruitment_applications_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $recruitment_applications_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$recruitment_applications_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$recruitment_applications_edit->terminate();
?>