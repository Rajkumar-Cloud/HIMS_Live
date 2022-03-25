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
$ivf_stimulation_inj_add = new ivf_stimulation_inj_add();

// Run the page
$ivf_stimulation_inj_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_stimulation_inj_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fivf_stimulation_injadd = currentForm = new ew.Form("fivf_stimulation_injadd", "add");

// Validate form
fivf_stimulation_injadd.validate = function() {
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
		<?php if ($ivf_stimulation_inj_add->Name->Required) { ?>
			elm = this.getElements("x" + infix + "_Name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_stimulation_inj->Name->caption(), $ivf_stimulation_inj->Name->RequiredErrorMessage)) ?>");
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
fivf_stimulation_injadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_stimulation_injadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $ivf_stimulation_inj_add->showPageHeader(); ?>
<?php
$ivf_stimulation_inj_add->showMessage();
?>
<form name="fivf_stimulation_injadd" id="fivf_stimulation_injadd" class="<?php echo $ivf_stimulation_inj_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ivf_stimulation_inj_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_stimulation_inj_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_stimulation_inj">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_stimulation_inj_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($ivf_stimulation_inj->Name->Visible) { // Name ?>
	<div id="r_Name" class="form-group row">
		<label id="elh_ivf_stimulation_inj_Name" for="x_Name" class="<?php echo $ivf_stimulation_inj_add->LeftColumnClass ?>"><?php echo $ivf_stimulation_inj->Name->caption() ?><?php echo ($ivf_stimulation_inj->Name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $ivf_stimulation_inj_add->RightColumnClass ?>"><div<?php echo $ivf_stimulation_inj->Name->cellAttributes() ?>>
<span id="el_ivf_stimulation_inj_Name">
<input type="text" data-table="ivf_stimulation_inj" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="115" placeholder="<?php echo HtmlEncode($ivf_stimulation_inj->Name->getPlaceHolder()) ?>" value="<?php echo $ivf_stimulation_inj->Name->EditValue ?>"<?php echo $ivf_stimulation_inj->Name->editAttributes() ?>>
</span>
<?php echo $ivf_stimulation_inj->Name->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$ivf_stimulation_inj_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $ivf_stimulation_inj_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $ivf_stimulation_inj_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$ivf_stimulation_inj_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$ivf_stimulation_inj_add->terminate();
?>