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
$lab_sub_test_master_add = new lab_sub_test_master_add();

// Run the page
$lab_sub_test_master_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_sub_test_master_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var flab_sub_test_masteradd = currentForm = new ew.Form("flab_sub_test_masteradd", "add");

// Validate form
flab_sub_test_masteradd.validate = function() {
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
		<?php if ($lab_sub_test_master_add->TestMasterID->Required) { ?>
			elm = this.getElements("x" + infix + "_TestMasterID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_sub_test_master->TestMasterID->caption(), $lab_sub_test_master->TestMasterID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TestMasterID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($lab_sub_test_master->TestMasterID->errorMessage()) ?>");
		<?php if ($lab_sub_test_master_add->SubTestName->Required) { ?>
			elm = this.getElements("x" + infix + "_SubTestName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_sub_test_master->SubTestName->caption(), $lab_sub_test_master->SubTestName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_sub_test_master_add->TestOrder->Required) { ?>
			elm = this.getElements("x" + infix + "_TestOrder");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_sub_test_master->TestOrder->caption(), $lab_sub_test_master->TestOrder->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TestOrder");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($lab_sub_test_master->TestOrder->errorMessage()) ?>");
		<?php if ($lab_sub_test_master_add->NormalRange->Required) { ?>
			elm = this.getElements("x" + infix + "_NormalRange");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_sub_test_master->NormalRange->caption(), $lab_sub_test_master->NormalRange->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_sub_test_master_add->Created->Required) { ?>
			elm = this.getElements("x" + infix + "_Created");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_sub_test_master->Created->caption(), $lab_sub_test_master->Created->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_sub_test_master_add->CreatedBy->Required) { ?>
			elm = this.getElements("x" + infix + "_CreatedBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_sub_test_master->CreatedBy->caption(), $lab_sub_test_master->CreatedBy->RequiredErrorMessage)) ?>");
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
flab_sub_test_masteradd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
flab_sub_test_masteradd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
flab_sub_test_masteradd.lists["x_SubTestName"] = <?php echo $lab_sub_test_master_add->SubTestName->Lookup->toClientList() ?>;
flab_sub_test_masteradd.lists["x_SubTestName"].options = <?php echo JsonEncode($lab_sub_test_master_add->SubTestName->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $lab_sub_test_master_add->showPageHeader(); ?>
<?php
$lab_sub_test_master_add->showMessage();
?>
<form name="flab_sub_test_masteradd" id="flab_sub_test_masteradd" class="<?php echo $lab_sub_test_master_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($lab_sub_test_master_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $lab_sub_test_master_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_sub_test_master">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$lab_sub_test_master_add->IsModal ?>">
<?php if ($lab_sub_test_master->getCurrentMasterTable() == "lab_test_master") { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="lab_test_master">
<input type="hidden" name="fk_id" value="<?php echo $lab_sub_test_master->TestMasterID->getSessionValue() ?>">
<?php } ?>
<div class="ew-add-div"><!-- page* -->
<?php if ($lab_sub_test_master->TestMasterID->Visible) { // TestMasterID ?>
	<div id="r_TestMasterID" class="form-group row">
		<label id="elh_lab_sub_test_master_TestMasterID" for="x_TestMasterID" class="<?php echo $lab_sub_test_master_add->LeftColumnClass ?>"><?php echo $lab_sub_test_master->TestMasterID->caption() ?><?php echo ($lab_sub_test_master->TestMasterID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_sub_test_master_add->RightColumnClass ?>"><div<?php echo $lab_sub_test_master->TestMasterID->cellAttributes() ?>>
<?php if ($lab_sub_test_master->TestMasterID->getSessionValue() <> "") { ?>
<span id="el_lab_sub_test_master_TestMasterID">
<span<?php echo $lab_sub_test_master->TestMasterID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($lab_sub_test_master->TestMasterID->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x_TestMasterID" name="x_TestMasterID" value="<?php echo HtmlEncode($lab_sub_test_master->TestMasterID->CurrentValue) ?>">
<?php } else { ?>
<span id="el_lab_sub_test_master_TestMasterID">
<input type="text" data-table="lab_sub_test_master" data-field="x_TestMasterID" name="x_TestMasterID" id="x_TestMasterID" size="30" placeholder="<?php echo HtmlEncode($lab_sub_test_master->TestMasterID->getPlaceHolder()) ?>" value="<?php echo $lab_sub_test_master->TestMasterID->EditValue ?>"<?php echo $lab_sub_test_master->TestMasterID->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $lab_sub_test_master->TestMasterID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_sub_test_master->SubTestName->Visible) { // SubTestName ?>
	<div id="r_SubTestName" class="form-group row">
		<label id="elh_lab_sub_test_master_SubTestName" for="x_SubTestName" class="<?php echo $lab_sub_test_master_add->LeftColumnClass ?>"><?php echo $lab_sub_test_master->SubTestName->caption() ?><?php echo ($lab_sub_test_master->SubTestName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_sub_test_master_add->RightColumnClass ?>"><div<?php echo $lab_sub_test_master->SubTestName->cellAttributes() ?>>
<span id="el_lab_sub_test_master_SubTestName">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="lab_sub_test_master" data-field="x_SubTestName" data-value-separator="<?php echo $lab_sub_test_master->SubTestName->displayValueSeparatorAttribute() ?>" id="x_SubTestName" name="x_SubTestName"<?php echo $lab_sub_test_master->SubTestName->editAttributes() ?>>
		<?php echo $lab_sub_test_master->SubTestName->selectOptionListHtml("x_SubTestName") ?>
	</select>
</div>
<?php echo $lab_sub_test_master->SubTestName->Lookup->getParamTag("p_x_SubTestName") ?>
</span>
<?php echo $lab_sub_test_master->SubTestName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_sub_test_master->TestOrder->Visible) { // TestOrder ?>
	<div id="r_TestOrder" class="form-group row">
		<label id="elh_lab_sub_test_master_TestOrder" for="x_TestOrder" class="<?php echo $lab_sub_test_master_add->LeftColumnClass ?>"><?php echo $lab_sub_test_master->TestOrder->caption() ?><?php echo ($lab_sub_test_master->TestOrder->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_sub_test_master_add->RightColumnClass ?>"><div<?php echo $lab_sub_test_master->TestOrder->cellAttributes() ?>>
<span id="el_lab_sub_test_master_TestOrder">
<input type="text" data-table="lab_sub_test_master" data-field="x_TestOrder" name="x_TestOrder" id="x_TestOrder" size="30" placeholder="<?php echo HtmlEncode($lab_sub_test_master->TestOrder->getPlaceHolder()) ?>" value="<?php echo $lab_sub_test_master->TestOrder->EditValue ?>"<?php echo $lab_sub_test_master->TestOrder->editAttributes() ?>>
</span>
<?php echo $lab_sub_test_master->TestOrder->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_sub_test_master->NormalRange->Visible) { // NormalRange ?>
	<div id="r_NormalRange" class="form-group row">
		<label id="elh_lab_sub_test_master_NormalRange" for="x_NormalRange" class="<?php echo $lab_sub_test_master_add->LeftColumnClass ?>"><?php echo $lab_sub_test_master->NormalRange->caption() ?><?php echo ($lab_sub_test_master->NormalRange->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_sub_test_master_add->RightColumnClass ?>"><div<?php echo $lab_sub_test_master->NormalRange->cellAttributes() ?>>
<span id="el_lab_sub_test_master_NormalRange">
<input type="text" data-table="lab_sub_test_master" data-field="x_NormalRange" name="x_NormalRange" id="x_NormalRange" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($lab_sub_test_master->NormalRange->getPlaceHolder()) ?>" value="<?php echo $lab_sub_test_master->NormalRange->EditValue ?>"<?php echo $lab_sub_test_master->NormalRange->editAttributes() ?>>
</span>
<?php echo $lab_sub_test_master->NormalRange->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$lab_sub_test_master_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $lab_sub_test_master_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $lab_sub_test_master_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$lab_sub_test_master_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$lab_sub_test_master_add->terminate();
?>