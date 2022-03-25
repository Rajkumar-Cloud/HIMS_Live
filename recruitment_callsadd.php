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
$recruitment_calls_add = new recruitment_calls_add();

// Run the page
$recruitment_calls_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$recruitment_calls_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var frecruitment_callsadd = currentForm = new ew.Form("frecruitment_callsadd", "add");

// Validate form
frecruitment_callsadd.validate = function() {
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
		<?php if ($recruitment_calls_add->job->Required) { ?>
			elm = this.getElements("x" + infix + "_job");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_calls->job->caption(), $recruitment_calls->job->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_job");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($recruitment_calls->job->errorMessage()) ?>");
		<?php if ($recruitment_calls_add->candidate->Required) { ?>
			elm = this.getElements("x" + infix + "_candidate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_calls->candidate->caption(), $recruitment_calls->candidate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_candidate");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($recruitment_calls->candidate->errorMessage()) ?>");
		<?php if ($recruitment_calls_add->phone->Required) { ?>
			elm = this.getElements("x" + infix + "_phone");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_calls->phone->caption(), $recruitment_calls->phone->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($recruitment_calls_add->created->Required) { ?>
			elm = this.getElements("x" + infix + "_created");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_calls->created->caption(), $recruitment_calls->created->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_created");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($recruitment_calls->created->errorMessage()) ?>");
		<?php if ($recruitment_calls_add->updated->Required) { ?>
			elm = this.getElements("x" + infix + "_updated");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_calls->updated->caption(), $recruitment_calls->updated->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_updated");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($recruitment_calls->updated->errorMessage()) ?>");
		<?php if ($recruitment_calls_add->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_calls->status->caption(), $recruitment_calls->status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($recruitment_calls_add->notes->Required) { ?>
			elm = this.getElements("x" + infix + "_notes");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $recruitment_calls->notes->caption(), $recruitment_calls->notes->RequiredErrorMessage)) ?>");
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
frecruitment_callsadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
frecruitment_callsadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $recruitment_calls_add->showPageHeader(); ?>
<?php
$recruitment_calls_add->showMessage();
?>
<form name="frecruitment_callsadd" id="frecruitment_callsadd" class="<?php echo $recruitment_calls_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($recruitment_calls_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $recruitment_calls_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="recruitment_calls">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$recruitment_calls_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($recruitment_calls->job->Visible) { // job ?>
	<div id="r_job" class="form-group row">
		<label id="elh_recruitment_calls_job" for="x_job" class="<?php echo $recruitment_calls_add->LeftColumnClass ?>"><?php echo $recruitment_calls->job->caption() ?><?php echo ($recruitment_calls->job->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_calls_add->RightColumnClass ?>"><div<?php echo $recruitment_calls->job->cellAttributes() ?>>
<span id="el_recruitment_calls_job">
<input type="text" data-table="recruitment_calls" data-field="x_job" name="x_job" id="x_job" size="30" placeholder="<?php echo HtmlEncode($recruitment_calls->job->getPlaceHolder()) ?>" value="<?php echo $recruitment_calls->job->EditValue ?>"<?php echo $recruitment_calls->job->editAttributes() ?>>
</span>
<?php echo $recruitment_calls->job->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_calls->candidate->Visible) { // candidate ?>
	<div id="r_candidate" class="form-group row">
		<label id="elh_recruitment_calls_candidate" for="x_candidate" class="<?php echo $recruitment_calls_add->LeftColumnClass ?>"><?php echo $recruitment_calls->candidate->caption() ?><?php echo ($recruitment_calls->candidate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_calls_add->RightColumnClass ?>"><div<?php echo $recruitment_calls->candidate->cellAttributes() ?>>
<span id="el_recruitment_calls_candidate">
<input type="text" data-table="recruitment_calls" data-field="x_candidate" name="x_candidate" id="x_candidate" size="30" placeholder="<?php echo HtmlEncode($recruitment_calls->candidate->getPlaceHolder()) ?>" value="<?php echo $recruitment_calls->candidate->EditValue ?>"<?php echo $recruitment_calls->candidate->editAttributes() ?>>
</span>
<?php echo $recruitment_calls->candidate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_calls->phone->Visible) { // phone ?>
	<div id="r_phone" class="form-group row">
		<label id="elh_recruitment_calls_phone" for="x_phone" class="<?php echo $recruitment_calls_add->LeftColumnClass ?>"><?php echo $recruitment_calls->phone->caption() ?><?php echo ($recruitment_calls->phone->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_calls_add->RightColumnClass ?>"><div<?php echo $recruitment_calls->phone->cellAttributes() ?>>
<span id="el_recruitment_calls_phone">
<input type="text" data-table="recruitment_calls" data-field="x_phone" name="x_phone" id="x_phone" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($recruitment_calls->phone->getPlaceHolder()) ?>" value="<?php echo $recruitment_calls->phone->EditValue ?>"<?php echo $recruitment_calls->phone->editAttributes() ?>>
</span>
<?php echo $recruitment_calls->phone->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_calls->created->Visible) { // created ?>
	<div id="r_created" class="form-group row">
		<label id="elh_recruitment_calls_created" for="x_created" class="<?php echo $recruitment_calls_add->LeftColumnClass ?>"><?php echo $recruitment_calls->created->caption() ?><?php echo ($recruitment_calls->created->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_calls_add->RightColumnClass ?>"><div<?php echo $recruitment_calls->created->cellAttributes() ?>>
<span id="el_recruitment_calls_created">
<input type="text" data-table="recruitment_calls" data-field="x_created" name="x_created" id="x_created" placeholder="<?php echo HtmlEncode($recruitment_calls->created->getPlaceHolder()) ?>" value="<?php echo $recruitment_calls->created->EditValue ?>"<?php echo $recruitment_calls->created->editAttributes() ?>>
<?php if (!$recruitment_calls->created->ReadOnly && !$recruitment_calls->created->Disabled && !isset($recruitment_calls->created->EditAttrs["readonly"]) && !isset($recruitment_calls->created->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("frecruitment_callsadd", "x_created", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $recruitment_calls->created->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_calls->updated->Visible) { // updated ?>
	<div id="r_updated" class="form-group row">
		<label id="elh_recruitment_calls_updated" for="x_updated" class="<?php echo $recruitment_calls_add->LeftColumnClass ?>"><?php echo $recruitment_calls->updated->caption() ?><?php echo ($recruitment_calls->updated->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_calls_add->RightColumnClass ?>"><div<?php echo $recruitment_calls->updated->cellAttributes() ?>>
<span id="el_recruitment_calls_updated">
<input type="text" data-table="recruitment_calls" data-field="x_updated" name="x_updated" id="x_updated" placeholder="<?php echo HtmlEncode($recruitment_calls->updated->getPlaceHolder()) ?>" value="<?php echo $recruitment_calls->updated->EditValue ?>"<?php echo $recruitment_calls->updated->editAttributes() ?>>
<?php if (!$recruitment_calls->updated->ReadOnly && !$recruitment_calls->updated->Disabled && !isset($recruitment_calls->updated->EditAttrs["readonly"]) && !isset($recruitment_calls->updated->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("frecruitment_callsadd", "x_updated", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $recruitment_calls->updated->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_calls->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_recruitment_calls_status" for="x_status" class="<?php echo $recruitment_calls_add->LeftColumnClass ?>"><?php echo $recruitment_calls->status->caption() ?><?php echo ($recruitment_calls->status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_calls_add->RightColumnClass ?>"><div<?php echo $recruitment_calls->status->cellAttributes() ?>>
<span id="el_recruitment_calls_status">
<input type="text" data-table="recruitment_calls" data-field="x_status" name="x_status" id="x_status" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($recruitment_calls->status->getPlaceHolder()) ?>" value="<?php echo $recruitment_calls->status->EditValue ?>"<?php echo $recruitment_calls->status->editAttributes() ?>>
</span>
<?php echo $recruitment_calls->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($recruitment_calls->notes->Visible) { // notes ?>
	<div id="r_notes" class="form-group row">
		<label id="elh_recruitment_calls_notes" for="x_notes" class="<?php echo $recruitment_calls_add->LeftColumnClass ?>"><?php echo $recruitment_calls->notes->caption() ?><?php echo ($recruitment_calls->notes->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $recruitment_calls_add->RightColumnClass ?>"><div<?php echo $recruitment_calls->notes->cellAttributes() ?>>
<span id="el_recruitment_calls_notes">
<textarea data-table="recruitment_calls" data-field="x_notes" name="x_notes" id="x_notes" cols="35" rows="4" placeholder="<?php echo HtmlEncode($recruitment_calls->notes->getPlaceHolder()) ?>"<?php echo $recruitment_calls->notes->editAttributes() ?>><?php echo $recruitment_calls->notes->EditValue ?></textarea>
</span>
<?php echo $recruitment_calls->notes->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$recruitment_calls_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $recruitment_calls_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $recruitment_calls_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$recruitment_calls_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$recruitment_calls_add->terminate();
?>