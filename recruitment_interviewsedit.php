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
$recruitment_interviews_edit = new recruitment_interviews_edit();

// Run the page
$recruitment_interviews_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$recruitment_interviews_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var frecruitment_interviewsedit = currentForm = new ew.Form("frecruitment_interviewsedit", "edit");

// Validate form
frecruitment_interviewsedit.validate = function() {
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
		<?php if ($recruitment_interviews_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_interviews->id->caption(), $recruitment_interviews->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($recruitment_interviews_edit->job->Required) { ?>
			elm = this.getElements("x" + infix + "_job");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_interviews->job->caption(), $recruitment_interviews->job->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_job");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($recruitment_interviews->job->errorMessage()) ?>");
		<?php if ($recruitment_interviews_edit->candidate->Required) { ?>
			elm = this.getElements("x" + infix + "_candidate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_interviews->candidate->caption(), $recruitment_interviews->candidate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_candidate");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($recruitment_interviews->candidate->errorMessage()) ?>");
		<?php if ($recruitment_interviews_edit->level->Required) { ?>
			elm = this.getElements("x" + infix + "_level");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_interviews->level->caption(), $recruitment_interviews->level->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($recruitment_interviews_edit->created->Required) { ?>
			elm = this.getElements("x" + infix + "_created");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_interviews->created->caption(), $recruitment_interviews->created->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_created");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($recruitment_interviews->created->errorMessage()) ?>");
		<?php if ($recruitment_interviews_edit->updated->Required) { ?>
			elm = this.getElements("x" + infix + "_updated");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_interviews->updated->caption(), $recruitment_interviews->updated->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_updated");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($recruitment_interviews->updated->errorMessage()) ?>");
		<?php if ($recruitment_interviews_edit->scheduled->Required) { ?>
			elm = this.getElements("x" + infix + "_scheduled");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_interviews->scheduled->caption(), $recruitment_interviews->scheduled->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_scheduled");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($recruitment_interviews->scheduled->errorMessage()) ?>");
		<?php if ($recruitment_interviews_edit->location->Required) { ?>
			elm = this.getElements("x" + infix + "_location");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_interviews->location->caption(), $recruitment_interviews->location->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($recruitment_interviews_edit->mapId->Required) { ?>
			elm = this.getElements("x" + infix + "_mapId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_interviews->mapId->caption(), $recruitment_interviews->mapId->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_mapId");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($recruitment_interviews->mapId->errorMessage()) ?>");
		<?php if ($recruitment_interviews_edit->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_interviews->status->caption(), $recruitment_interviews->status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($recruitment_interviews_edit->notes->Required) { ?>
			elm = this.getElements("x" + infix + "_notes");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_interviews->notes->caption(), $recruitment_interviews->notes->RequiredErrorMessage)) ?>");
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
frecruitment_interviewsedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
frecruitment_interviewsedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $recruitment_interviews_edit->showPageHeader(); ?>
<?php
$recruitment_interviews_edit->showMessage();
?>
<form name="frecruitment_interviewsedit" id="frecruitment_interviewsedit" class="<?php echo $recruitment_interviews_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($recruitment_interviews_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $recruitment_interviews_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="recruitment_interviews">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$recruitment_interviews_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($recruitment_interviews->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_recruitment_interviews_id" class="<?php echo $recruitment_interviews_edit->LeftColumnClass ?>"><?php echo $recruitment_interviews->id->caption() ?><?php echo ($recruitment_interviews->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_interviews_edit->RightColumnClass ?>"><div<?php echo $recruitment_interviews->id->cellAttributes() ?>>
<span id="el_recruitment_interviews_id">
<span<?php echo $recruitment_interviews->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($recruitment_interviews->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="recruitment_interviews" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($recruitment_interviews->id->CurrentValue) ?>">
<?php echo $recruitment_interviews->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_interviews->job->Visible) { // job ?>
	<div id="r_job" class="form-group row">
		<label id="elh_recruitment_interviews_job" for="x_job" class="<?php echo $recruitment_interviews_edit->LeftColumnClass ?>"><?php echo $recruitment_interviews->job->caption() ?><?php echo ($recruitment_interviews->job->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_interviews_edit->RightColumnClass ?>"><div<?php echo $recruitment_interviews->job->cellAttributes() ?>>
<span id="el_recruitment_interviews_job">
<input type="text" data-table="recruitment_interviews" data-field="x_job" name="x_job" id="x_job" size="30" placeholder="<?php echo HtmlEncode($recruitment_interviews->job->getPlaceHolder()) ?>" value="<?php echo $recruitment_interviews->job->EditValue ?>"<?php echo $recruitment_interviews->job->editAttributes() ?>>
</span>
<?php echo $recruitment_interviews->job->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_interviews->candidate->Visible) { // candidate ?>
	<div id="r_candidate" class="form-group row">
		<label id="elh_recruitment_interviews_candidate" for="x_candidate" class="<?php echo $recruitment_interviews_edit->LeftColumnClass ?>"><?php echo $recruitment_interviews->candidate->caption() ?><?php echo ($recruitment_interviews->candidate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_interviews_edit->RightColumnClass ?>"><div<?php echo $recruitment_interviews->candidate->cellAttributes() ?>>
<span id="el_recruitment_interviews_candidate">
<input type="text" data-table="recruitment_interviews" data-field="x_candidate" name="x_candidate" id="x_candidate" size="30" placeholder="<?php echo HtmlEncode($recruitment_interviews->candidate->getPlaceHolder()) ?>" value="<?php echo $recruitment_interviews->candidate->EditValue ?>"<?php echo $recruitment_interviews->candidate->editAttributes() ?>>
</span>
<?php echo $recruitment_interviews->candidate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_interviews->level->Visible) { // level ?>
	<div id="r_level" class="form-group row">
		<label id="elh_recruitment_interviews_level" for="x_level" class="<?php echo $recruitment_interviews_edit->LeftColumnClass ?>"><?php echo $recruitment_interviews->level->caption() ?><?php echo ($recruitment_interviews->level->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_interviews_edit->RightColumnClass ?>"><div<?php echo $recruitment_interviews->level->cellAttributes() ?>>
<span id="el_recruitment_interviews_level">
<input type="text" data-table="recruitment_interviews" data-field="x_level" name="x_level" id="x_level" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($recruitment_interviews->level->getPlaceHolder()) ?>" value="<?php echo $recruitment_interviews->level->EditValue ?>"<?php echo $recruitment_interviews->level->editAttributes() ?>>
</span>
<?php echo $recruitment_interviews->level->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_interviews->created->Visible) { // created ?>
	<div id="r_created" class="form-group row">
		<label id="elh_recruitment_interviews_created" for="x_created" class="<?php echo $recruitment_interviews_edit->LeftColumnClass ?>"><?php echo $recruitment_interviews->created->caption() ?><?php echo ($recruitment_interviews->created->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_interviews_edit->RightColumnClass ?>"><div<?php echo $recruitment_interviews->created->cellAttributes() ?>>
<span id="el_recruitment_interviews_created">
<input type="text" data-table="recruitment_interviews" data-field="x_created" name="x_created" id="x_created" placeholder="<?php echo HtmlEncode($recruitment_interviews->created->getPlaceHolder()) ?>" value="<?php echo $recruitment_interviews->created->EditValue ?>"<?php echo $recruitment_interviews->created->editAttributes() ?>>
<?php if (!$recruitment_interviews->created->ReadOnly && !$recruitment_interviews->created->Disabled && !isset($recruitment_interviews->created->EditAttrs["readonly"]) && !isset($recruitment_interviews->created->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("frecruitment_interviewsedit", "x_created", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $recruitment_interviews->created->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_interviews->updated->Visible) { // updated ?>
	<div id="r_updated" class="form-group row">
		<label id="elh_recruitment_interviews_updated" for="x_updated" class="<?php echo $recruitment_interviews_edit->LeftColumnClass ?>"><?php echo $recruitment_interviews->updated->caption() ?><?php echo ($recruitment_interviews->updated->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_interviews_edit->RightColumnClass ?>"><div<?php echo $recruitment_interviews->updated->cellAttributes() ?>>
<span id="el_recruitment_interviews_updated">
<input type="text" data-table="recruitment_interviews" data-field="x_updated" name="x_updated" id="x_updated" placeholder="<?php echo HtmlEncode($recruitment_interviews->updated->getPlaceHolder()) ?>" value="<?php echo $recruitment_interviews->updated->EditValue ?>"<?php echo $recruitment_interviews->updated->editAttributes() ?>>
<?php if (!$recruitment_interviews->updated->ReadOnly && !$recruitment_interviews->updated->Disabled && !isset($recruitment_interviews->updated->EditAttrs["readonly"]) && !isset($recruitment_interviews->updated->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("frecruitment_interviewsedit", "x_updated", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $recruitment_interviews->updated->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_interviews->scheduled->Visible) { // scheduled ?>
	<div id="r_scheduled" class="form-group row">
		<label id="elh_recruitment_interviews_scheduled" for="x_scheduled" class="<?php echo $recruitment_interviews_edit->LeftColumnClass ?>"><?php echo $recruitment_interviews->scheduled->caption() ?><?php echo ($recruitment_interviews->scheduled->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_interviews_edit->RightColumnClass ?>"><div<?php echo $recruitment_interviews->scheduled->cellAttributes() ?>>
<span id="el_recruitment_interviews_scheduled">
<input type="text" data-table="recruitment_interviews" data-field="x_scheduled" name="x_scheduled" id="x_scheduled" placeholder="<?php echo HtmlEncode($recruitment_interviews->scheduled->getPlaceHolder()) ?>" value="<?php echo $recruitment_interviews->scheduled->EditValue ?>"<?php echo $recruitment_interviews->scheduled->editAttributes() ?>>
<?php if (!$recruitment_interviews->scheduled->ReadOnly && !$recruitment_interviews->scheduled->Disabled && !isset($recruitment_interviews->scheduled->EditAttrs["readonly"]) && !isset($recruitment_interviews->scheduled->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("frecruitment_interviewsedit", "x_scheduled", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $recruitment_interviews->scheduled->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_interviews->location->Visible) { // location ?>
	<div id="r_location" class="form-group row">
		<label id="elh_recruitment_interviews_location" for="x_location" class="<?php echo $recruitment_interviews_edit->LeftColumnClass ?>"><?php echo $recruitment_interviews->location->caption() ?><?php echo ($recruitment_interviews->location->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_interviews_edit->RightColumnClass ?>"><div<?php echo $recruitment_interviews->location->cellAttributes() ?>>
<span id="el_recruitment_interviews_location">
<textarea data-table="recruitment_interviews" data-field="x_location" name="x_location" id="x_location" cols="35" rows="4" placeholder="<?php echo HtmlEncode($recruitment_interviews->location->getPlaceHolder()) ?>"<?php echo $recruitment_interviews->location->editAttributes() ?>><?php echo $recruitment_interviews->location->EditValue ?></textarea>
</span>
<?php echo $recruitment_interviews->location->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_interviews->mapId->Visible) { // mapId ?>
	<div id="r_mapId" class="form-group row">
		<label id="elh_recruitment_interviews_mapId" for="x_mapId" class="<?php echo $recruitment_interviews_edit->LeftColumnClass ?>"><?php echo $recruitment_interviews->mapId->caption() ?><?php echo ($recruitment_interviews->mapId->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_interviews_edit->RightColumnClass ?>"><div<?php echo $recruitment_interviews->mapId->cellAttributes() ?>>
<span id="el_recruitment_interviews_mapId">
<input type="text" data-table="recruitment_interviews" data-field="x_mapId" name="x_mapId" id="x_mapId" size="30" placeholder="<?php echo HtmlEncode($recruitment_interviews->mapId->getPlaceHolder()) ?>" value="<?php echo $recruitment_interviews->mapId->EditValue ?>"<?php echo $recruitment_interviews->mapId->editAttributes() ?>>
</span>
<?php echo $recruitment_interviews->mapId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_interviews->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_recruitment_interviews_status" for="x_status" class="<?php echo $recruitment_interviews_edit->LeftColumnClass ?>"><?php echo $recruitment_interviews->status->caption() ?><?php echo ($recruitment_interviews->status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_interviews_edit->RightColumnClass ?>"><div<?php echo $recruitment_interviews->status->cellAttributes() ?>>
<span id="el_recruitment_interviews_status">
<input type="text" data-table="recruitment_interviews" data-field="x_status" name="x_status" id="x_status" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($recruitment_interviews->status->getPlaceHolder()) ?>" value="<?php echo $recruitment_interviews->status->EditValue ?>"<?php echo $recruitment_interviews->status->editAttributes() ?>>
</span>
<?php echo $recruitment_interviews->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_interviews->notes->Visible) { // notes ?>
	<div id="r_notes" class="form-group row">
		<label id="elh_recruitment_interviews_notes" for="x_notes" class="<?php echo $recruitment_interviews_edit->LeftColumnClass ?>"><?php echo $recruitment_interviews->notes->caption() ?><?php echo ($recruitment_interviews->notes->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_interviews_edit->RightColumnClass ?>"><div<?php echo $recruitment_interviews->notes->cellAttributes() ?>>
<span id="el_recruitment_interviews_notes">
<textarea data-table="recruitment_interviews" data-field="x_notes" name="x_notes" id="x_notes" cols="35" rows="4" placeholder="<?php echo HtmlEncode($recruitment_interviews->notes->getPlaceHolder()) ?>"<?php echo $recruitment_interviews->notes->editAttributes() ?>><?php echo $recruitment_interviews->notes->EditValue ?></textarea>
</span>
<?php echo $recruitment_interviews->notes->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$recruitment_interviews_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $recruitment_interviews_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $recruitment_interviews_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$recruitment_interviews_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$recruitment_interviews_edit->terminate();
?>