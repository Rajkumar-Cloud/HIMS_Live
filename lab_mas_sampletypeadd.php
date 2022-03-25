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
$lab_mas_sampletype_add = new lab_mas_sampletype_add();

// Run the page
$lab_mas_sampletype_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_mas_sampletype_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var flab_mas_sampletypeadd = currentForm = new ew.Form("flab_mas_sampletypeadd", "add");

// Validate form
flab_mas_sampletypeadd.validate = function() {
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
		<?php if ($lab_mas_sampletype_add->CATEGORY->Required) { ?>
			elm = this.getElements("x" + infix + "_CATEGORY");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_mas_sampletype->CATEGORY->caption(), $lab_mas_sampletype->CATEGORY->RequiredErrorMessage)) ?>");
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
flab_mas_sampletypeadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
flab_mas_sampletypeadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $lab_mas_sampletype_add->showPageHeader(); ?>
<?php
$lab_mas_sampletype_add->showMessage();
?>
<form name="flab_mas_sampletypeadd" id="flab_mas_sampletypeadd" class="<?php echo $lab_mas_sampletype_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($lab_mas_sampletype_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $lab_mas_sampletype_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_mas_sampletype">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$lab_mas_sampletype_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($lab_mas_sampletype->CATEGORY->Visible) { // CATEGORY ?>
	<div id="r_CATEGORY" class="form-group row">
		<label id="elh_lab_mas_sampletype_CATEGORY" for="x_CATEGORY" class="<?php echo $lab_mas_sampletype_add->LeftColumnClass ?>"><?php echo $lab_mas_sampletype->CATEGORY->caption() ?><?php echo ($lab_mas_sampletype->CATEGORY->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_mas_sampletype_add->RightColumnClass ?>"><div<?php echo $lab_mas_sampletype->CATEGORY->cellAttributes() ?>>
<span id="el_lab_mas_sampletype_CATEGORY">
<input type="text" data-table="lab_mas_sampletype" data-field="x_CATEGORY" name="x_CATEGORY" id="x_CATEGORY" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($lab_mas_sampletype->CATEGORY->getPlaceHolder()) ?>" value="<?php echo $lab_mas_sampletype->CATEGORY->EditValue ?>"<?php echo $lab_mas_sampletype->CATEGORY->editAttributes() ?>>
</span>
<?php echo $lab_mas_sampletype->CATEGORY->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$lab_mas_sampletype_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $lab_mas_sampletype_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $lab_mas_sampletype_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$lab_mas_sampletype_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$lab_mas_sampletype_add->terminate();
?>