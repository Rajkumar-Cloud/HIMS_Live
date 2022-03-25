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
$lab_profile_details_add = new lab_profile_details_add();

// Run the page
$lab_profile_details_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_profile_details_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var flab_profile_detailsadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	flab_profile_detailsadd = currentForm = new ew.Form("flab_profile_detailsadd", "add");

	// Validate form
	flab_profile_detailsadd.validate = function() {
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
			<?php if ($lab_profile_details_add->ProfileCode->Required) { ?>
				elm = this.getElements("x" + infix + "_ProfileCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_details_add->ProfileCode->caption(), $lab_profile_details_add->ProfileCode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_profile_details_add->SubProfileCode->Required) { ?>
				elm = this.getElements("x" + infix + "_SubProfileCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_details_add->SubProfileCode->caption(), $lab_profile_details_add->SubProfileCode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_profile_details_add->ProfileTestCode->Required) { ?>
				elm = this.getElements("x" + infix + "_ProfileTestCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_details_add->ProfileTestCode->caption(), $lab_profile_details_add->ProfileTestCode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_profile_details_add->ProfileSubTestCode->Required) { ?>
				elm = this.getElements("x" + infix + "_ProfileSubTestCode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_details_add->ProfileSubTestCode->caption(), $lab_profile_details_add->ProfileSubTestCode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_profile_details_add->TestOrder->Required) { ?>
				elm = this.getElements("x" + infix + "_TestOrder");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_details_add->TestOrder->caption(), $lab_profile_details_add->TestOrder->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TestOrder");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_profile_details_add->TestOrder->errorMessage()) ?>");
			<?php if ($lab_profile_details_add->TestAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_TestAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_profile_details_add->TestAmount->caption(), $lab_profile_details_add->TestAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TestAmount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_profile_details_add->TestAmount->errorMessage()) ?>");

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
	flab_profile_detailsadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	flab_profile_detailsadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	flab_profile_detailsadd.lists["x_SubProfileCode"] = <?php echo $lab_profile_details_add->SubProfileCode->Lookup->toClientList($lab_profile_details_add) ?>;
	flab_profile_detailsadd.lists["x_SubProfileCode"].options = <?php echo JsonEncode($lab_profile_details_add->SubProfileCode->lookupOptions()) ?>;
	flab_profile_detailsadd.lists["x_ProfileTestCode"] = <?php echo $lab_profile_details_add->ProfileTestCode->Lookup->toClientList($lab_profile_details_add) ?>;
	flab_profile_detailsadd.lists["x_ProfileTestCode"].options = <?php echo JsonEncode($lab_profile_details_add->ProfileTestCode->lookupOptions()) ?>;
	loadjs.done("flab_profile_detailsadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $lab_profile_details_add->showPageHeader(); ?>
<?php
$lab_profile_details_add->showMessage();
?>
<form name="flab_profile_detailsadd" id="flab_profile_detailsadd" class="<?php echo $lab_profile_details_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_profile_details">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$lab_profile_details_add->IsModal ?>">
<?php if ($lab_profile_details->getCurrentMasterTable() == "view_lab_profile") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="view_lab_profile">
<input type="hidden" name="fk_CODE" value="<?php echo HtmlEncode($lab_profile_details_add->ProfileCode->getSessionValue()) ?>">
<?php } ?>
<div class="ew-add-div"><!-- page* -->
<?php if ($lab_profile_details_add->ProfileCode->Visible) { // ProfileCode ?>
	<div id="r_ProfileCode" class="form-group row">
		<label id="elh_lab_profile_details_ProfileCode" for="x_ProfileCode" class="<?php echo $lab_profile_details_add->LeftColumnClass ?>"><?php echo $lab_profile_details_add->ProfileCode->caption() ?><?php echo $lab_profile_details_add->ProfileCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_profile_details_add->RightColumnClass ?>"><div <?php echo $lab_profile_details_add->ProfileCode->cellAttributes() ?>>
<?php if ($lab_profile_details_add->ProfileCode->getSessionValue() != "") { ?>
<span id="el_lab_profile_details_ProfileCode">
<span<?php echo $lab_profile_details_add->ProfileCode->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($lab_profile_details_add->ProfileCode->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x_ProfileCode" name="x_ProfileCode" value="<?php echo HtmlEncode($lab_profile_details_add->ProfileCode->CurrentValue) ?>">
<?php } else { ?>
<span id="el_lab_profile_details_ProfileCode">
<input type="text" data-table="lab_profile_details" data-field="x_ProfileCode" name="x_ProfileCode" id="x_ProfileCode" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($lab_profile_details_add->ProfileCode->getPlaceHolder()) ?>" value="<?php echo $lab_profile_details_add->ProfileCode->EditValue ?>"<?php echo $lab_profile_details_add->ProfileCode->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $lab_profile_details_add->ProfileCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_details_add->SubProfileCode->Visible) { // SubProfileCode ?>
	<div id="r_SubProfileCode" class="form-group row">
		<label id="elh_lab_profile_details_SubProfileCode" for="x_SubProfileCode" class="<?php echo $lab_profile_details_add->LeftColumnClass ?>"><?php echo $lab_profile_details_add->SubProfileCode->caption() ?><?php echo $lab_profile_details_add->SubProfileCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_profile_details_add->RightColumnClass ?>"><div <?php echo $lab_profile_details_add->SubProfileCode->cellAttributes() ?>>
<span id="el_lab_profile_details_SubProfileCode">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_SubProfileCode"><?php echo EmptyValue(strval($lab_profile_details_add->SubProfileCode->ViewValue)) ? $Language->phrase("PleaseSelect") : $lab_profile_details_add->SubProfileCode->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($lab_profile_details_add->SubProfileCode->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($lab_profile_details_add->SubProfileCode->ReadOnly || $lab_profile_details_add->SubProfileCode->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_SubProfileCode',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $lab_profile_details_add->SubProfileCode->Lookup->getParamTag($lab_profile_details_add, "p_x_SubProfileCode") ?>
<input type="hidden" data-table="lab_profile_details" data-field="x_SubProfileCode" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $lab_profile_details_add->SubProfileCode->displayValueSeparatorAttribute() ?>" name="x_SubProfileCode" id="x_SubProfileCode" value="<?php echo $lab_profile_details_add->SubProfileCode->CurrentValue ?>"<?php echo $lab_profile_details_add->SubProfileCode->editAttributes() ?>>
</span>
<?php echo $lab_profile_details_add->SubProfileCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_details_add->ProfileTestCode->Visible) { // ProfileTestCode ?>
	<div id="r_ProfileTestCode" class="form-group row">
		<label id="elh_lab_profile_details_ProfileTestCode" for="x_ProfileTestCode" class="<?php echo $lab_profile_details_add->LeftColumnClass ?>"><?php echo $lab_profile_details_add->ProfileTestCode->caption() ?><?php echo $lab_profile_details_add->ProfileTestCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_profile_details_add->RightColumnClass ?>"><div <?php echo $lab_profile_details_add->ProfileTestCode->cellAttributes() ?>>
<span id="el_lab_profile_details_ProfileTestCode">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_ProfileTestCode"><?php echo EmptyValue(strval($lab_profile_details_add->ProfileTestCode->ViewValue)) ? $Language->phrase("PleaseSelect") : $lab_profile_details_add->ProfileTestCode->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($lab_profile_details_add->ProfileTestCode->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($lab_profile_details_add->ProfileTestCode->ReadOnly || $lab_profile_details_add->ProfileTestCode->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_ProfileTestCode',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $lab_profile_details_add->ProfileTestCode->Lookup->getParamTag($lab_profile_details_add, "p_x_ProfileTestCode") ?>
<input type="hidden" data-table="lab_profile_details" data-field="x_ProfileTestCode" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $lab_profile_details_add->ProfileTestCode->displayValueSeparatorAttribute() ?>" name="x_ProfileTestCode" id="x_ProfileTestCode" value="<?php echo $lab_profile_details_add->ProfileTestCode->CurrentValue ?>"<?php echo $lab_profile_details_add->ProfileTestCode->editAttributes() ?>>
</span>
<?php echo $lab_profile_details_add->ProfileTestCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_details_add->ProfileSubTestCode->Visible) { // ProfileSubTestCode ?>
	<div id="r_ProfileSubTestCode" class="form-group row">
		<label id="elh_lab_profile_details_ProfileSubTestCode" for="x_ProfileSubTestCode" class="<?php echo $lab_profile_details_add->LeftColumnClass ?>"><?php echo $lab_profile_details_add->ProfileSubTestCode->caption() ?><?php echo $lab_profile_details_add->ProfileSubTestCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_profile_details_add->RightColumnClass ?>"><div <?php echo $lab_profile_details_add->ProfileSubTestCode->cellAttributes() ?>>
<span id="el_lab_profile_details_ProfileSubTestCode">
<input type="text" data-table="lab_profile_details" data-field="x_ProfileSubTestCode" name="x_ProfileSubTestCode" id="x_ProfileSubTestCode" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($lab_profile_details_add->ProfileSubTestCode->getPlaceHolder()) ?>" value="<?php echo $lab_profile_details_add->ProfileSubTestCode->EditValue ?>"<?php echo $lab_profile_details_add->ProfileSubTestCode->editAttributes() ?>>
</span>
<?php echo $lab_profile_details_add->ProfileSubTestCode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_details_add->TestOrder->Visible) { // TestOrder ?>
	<div id="r_TestOrder" class="form-group row">
		<label id="elh_lab_profile_details_TestOrder" for="x_TestOrder" class="<?php echo $lab_profile_details_add->LeftColumnClass ?>"><?php echo $lab_profile_details_add->TestOrder->caption() ?><?php echo $lab_profile_details_add->TestOrder->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_profile_details_add->RightColumnClass ?>"><div <?php echo $lab_profile_details_add->TestOrder->cellAttributes() ?>>
<span id="el_lab_profile_details_TestOrder">
<input type="text" data-table="lab_profile_details" data-field="x_TestOrder" name="x_TestOrder" id="x_TestOrder" size="30" placeholder="<?php echo HtmlEncode($lab_profile_details_add->TestOrder->getPlaceHolder()) ?>" value="<?php echo $lab_profile_details_add->TestOrder->EditValue ?>"<?php echo $lab_profile_details_add->TestOrder->editAttributes() ?>>
</span>
<?php echo $lab_profile_details_add->TestOrder->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_details_add->TestAmount->Visible) { // TestAmount ?>
	<div id="r_TestAmount" class="form-group row">
		<label id="elh_lab_profile_details_TestAmount" for="x_TestAmount" class="<?php echo $lab_profile_details_add->LeftColumnClass ?>"><?php echo $lab_profile_details_add->TestAmount->caption() ?><?php echo $lab_profile_details_add->TestAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_profile_details_add->RightColumnClass ?>"><div <?php echo $lab_profile_details_add->TestAmount->cellAttributes() ?>>
<span id="el_lab_profile_details_TestAmount">
<input type="text" data-table="lab_profile_details" data-field="x_TestAmount" name="x_TestAmount" id="x_TestAmount" size="30" placeholder="<?php echo HtmlEncode($lab_profile_details_add->TestAmount->getPlaceHolder()) ?>" value="<?php echo $lab_profile_details_add->TestAmount->EditValue ?>"<?php echo $lab_profile_details_add->TestAmount->editAttributes() ?>>
</span>
<?php echo $lab_profile_details_add->TestAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$lab_profile_details_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $lab_profile_details_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $lab_profile_details_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$lab_profile_details_add->showPageFooter();
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
$lab_profile_details_add->terminate();
?>