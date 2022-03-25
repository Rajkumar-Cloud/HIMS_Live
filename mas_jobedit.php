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
$mas_job_edit = new mas_job_edit();

// Run the page
$mas_job_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_job_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fmas_jobedit = currentForm = new ew.Form("fmas_jobedit", "edit");

// Validate form
fmas_jobedit.validate = function() {
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
		<?php if ($mas_job_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_job->id->caption(), $mas_job->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($mas_job_edit->Job->Required) { ?>
			elm = this.getElements("x" + infix + "_Job");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $mas_job->Job->caption(), $mas_job->Job->RequiredErrorMessage)) ?>");
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
fmas_jobedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fmas_jobedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $mas_job_edit->showPageHeader(); ?>
<?php
$mas_job_edit->showMessage();
?>
<form name="fmas_jobedit" id="fmas_jobedit" class="<?php echo $mas_job_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($mas_job_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $mas_job_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_job">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$mas_job_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($mas_job->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_mas_job_id" class="<?php echo $mas_job_edit->LeftColumnClass ?>"><?php echo $mas_job->id->caption() ?><?php echo ($mas_job->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_job_edit->RightColumnClass ?>"><div<?php echo $mas_job->id->cellAttributes() ?>>
<span id="el_mas_job_id">
<span<?php echo $mas_job->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($mas_job->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="mas_job" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($mas_job->id->CurrentValue) ?>">
<?php echo $mas_job->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($mas_job->Job->Visible) { // Job ?>
	<div id="r_Job" class="form-group row">
		<label id="elh_mas_job_Job" for="x_Job" class="<?php echo $mas_job_edit->LeftColumnClass ?>"><?php echo $mas_job->Job->caption() ?><?php echo ($mas_job->Job->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $mas_job_edit->RightColumnClass ?>"><div<?php echo $mas_job->Job->cellAttributes() ?>>
<span id="el_mas_job_Job">
<input type="text" data-table="mas_job" data-field="x_Job" name="x_Job" id="x_Job" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($mas_job->Job->getPlaceHolder()) ?>" value="<?php echo $mas_job->Job->EditValue ?>"<?php echo $mas_job->Job->editAttributes() ?>>
</span>
<?php echo $mas_job->Job->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$mas_job_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $mas_job_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $mas_job_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$mas_job_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$mas_job_edit->terminate();
?>