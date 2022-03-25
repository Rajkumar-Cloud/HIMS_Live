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
$lab_profile_details_search = new lab_profile_details_search();

// Run the page
$lab_profile_details_search->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_profile_details_search->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var flab_profile_detailssearch, currentPageID;
loadjs.ready("head", function() {

	// Form object for search
	<?php if ($lab_profile_details_search->IsModal) { ?>
	flab_profile_detailssearch = currentAdvancedSearchForm = new ew.Form("flab_profile_detailssearch", "search");
	<?php } else { ?>
	flab_profile_detailssearch = currentForm = new ew.Form("flab_profile_detailssearch", "search");
	<?php } ?>
	currentPageID = ew.PAGE_ID = "search";

	// Validate function for search
	flab_profile_detailssearch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_id");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($lab_profile_details_search->id->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_TestOrder");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($lab_profile_details_search->TestOrder->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_TestAmount");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($lab_profile_details_search->TestAmount->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	flab_profile_detailssearch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	flab_profile_detailssearch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	flab_profile_detailssearch.lists["x_SubProfileCode"] = <?php echo $lab_profile_details_search->SubProfileCode->Lookup->toClientList($lab_profile_details_search) ?>;
	flab_profile_detailssearch.lists["x_SubProfileCode"].options = <?php echo JsonEncode($lab_profile_details_search->SubProfileCode->lookupOptions()) ?>;
	flab_profile_detailssearch.lists["x_ProfileTestCode"] = <?php echo $lab_profile_details_search->ProfileTestCode->Lookup->toClientList($lab_profile_details_search) ?>;
	flab_profile_detailssearch.lists["x_ProfileTestCode"].options = <?php echo JsonEncode($lab_profile_details_search->ProfileTestCode->lookupOptions()) ?>;
	loadjs.done("flab_profile_detailssearch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $lab_profile_details_search->showPageHeader(); ?>
<?php
$lab_profile_details_search->showMessage();
?>
<form name="flab_profile_detailssearch" id="flab_profile_detailssearch" class="<?php echo $lab_profile_details_search->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_profile_details">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?php echo (int)$lab_profile_details_search->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($lab_profile_details_search->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label for="x_id" class="<?php echo $lab_profile_details_search->LeftColumnClass ?>"><span id="elh_lab_profile_details_id"><?php echo $lab_profile_details_search->id->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_id" id="z_id" value="=">
</span>
		</label>
		<div class="<?php echo $lab_profile_details_search->RightColumnClass ?>"><div <?php echo $lab_profile_details_search->id->cellAttributes() ?>>
			<span id="el_lab_profile_details_id" class="ew-search-field">
<input type="text" data-table="lab_profile_details" data-field="x_id" name="x_id" id="x_id" placeholder="<?php echo HtmlEncode($lab_profile_details_search->id->getPlaceHolder()) ?>" value="<?php echo $lab_profile_details_search->id->EditValue ?>"<?php echo $lab_profile_details_search->id->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_details_search->ProfileCode->Visible) { // ProfileCode ?>
	<div id="r_ProfileCode" class="form-group row">
		<label for="x_ProfileCode" class="<?php echo $lab_profile_details_search->LeftColumnClass ?>"><span id="elh_lab_profile_details_ProfileCode"><?php echo $lab_profile_details_search->ProfileCode->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ProfileCode" id="z_ProfileCode" value="LIKE">
</span>
		</label>
		<div class="<?php echo $lab_profile_details_search->RightColumnClass ?>"><div <?php echo $lab_profile_details_search->ProfileCode->cellAttributes() ?>>
			<span id="el_lab_profile_details_ProfileCode" class="ew-search-field">
<input type="text" data-table="lab_profile_details" data-field="x_ProfileCode" name="x_ProfileCode" id="x_ProfileCode" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($lab_profile_details_search->ProfileCode->getPlaceHolder()) ?>" value="<?php echo $lab_profile_details_search->ProfileCode->EditValue ?>"<?php echo $lab_profile_details_search->ProfileCode->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_details_search->SubProfileCode->Visible) { // SubProfileCode ?>
	<div id="r_SubProfileCode" class="form-group row">
		<label for="x_SubProfileCode" class="<?php echo $lab_profile_details_search->LeftColumnClass ?>"><span id="elh_lab_profile_details_SubProfileCode"><?php echo $lab_profile_details_search->SubProfileCode->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_SubProfileCode" id="z_SubProfileCode" value="LIKE">
</span>
		</label>
		<div class="<?php echo $lab_profile_details_search->RightColumnClass ?>"><div <?php echo $lab_profile_details_search->SubProfileCode->cellAttributes() ?>>
			<span id="el_lab_profile_details_SubProfileCode" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_SubProfileCode"><?php echo EmptyValue(strval($lab_profile_details_search->SubProfileCode->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $lab_profile_details_search->SubProfileCode->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($lab_profile_details_search->SubProfileCode->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($lab_profile_details_search->SubProfileCode->ReadOnly || $lab_profile_details_search->SubProfileCode->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_SubProfileCode',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $lab_profile_details_search->SubProfileCode->Lookup->getParamTag($lab_profile_details_search, "p_x_SubProfileCode") ?>
<input type="hidden" data-table="lab_profile_details" data-field="x_SubProfileCode" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $lab_profile_details_search->SubProfileCode->displayValueSeparatorAttribute() ?>" name="x_SubProfileCode" id="x_SubProfileCode" value="<?php echo $lab_profile_details_search->SubProfileCode->AdvancedSearch->SearchValue ?>"<?php echo $lab_profile_details_search->SubProfileCode->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_details_search->ProfileTestCode->Visible) { // ProfileTestCode ?>
	<div id="r_ProfileTestCode" class="form-group row">
		<label for="x_ProfileTestCode" class="<?php echo $lab_profile_details_search->LeftColumnClass ?>"><span id="elh_lab_profile_details_ProfileTestCode"><?php echo $lab_profile_details_search->ProfileTestCode->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ProfileTestCode" id="z_ProfileTestCode" value="LIKE">
</span>
		</label>
		<div class="<?php echo $lab_profile_details_search->RightColumnClass ?>"><div <?php echo $lab_profile_details_search->ProfileTestCode->cellAttributes() ?>>
			<span id="el_lab_profile_details_ProfileTestCode" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_ProfileTestCode"><?php echo EmptyValue(strval($lab_profile_details_search->ProfileTestCode->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $lab_profile_details_search->ProfileTestCode->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($lab_profile_details_search->ProfileTestCode->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($lab_profile_details_search->ProfileTestCode->ReadOnly || $lab_profile_details_search->ProfileTestCode->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_ProfileTestCode',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $lab_profile_details_search->ProfileTestCode->Lookup->getParamTag($lab_profile_details_search, "p_x_ProfileTestCode") ?>
<input type="hidden" data-table="lab_profile_details" data-field="x_ProfileTestCode" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $lab_profile_details_search->ProfileTestCode->displayValueSeparatorAttribute() ?>" name="x_ProfileTestCode" id="x_ProfileTestCode" value="<?php echo $lab_profile_details_search->ProfileTestCode->AdvancedSearch->SearchValue ?>"<?php echo $lab_profile_details_search->ProfileTestCode->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_details_search->ProfileSubTestCode->Visible) { // ProfileSubTestCode ?>
	<div id="r_ProfileSubTestCode" class="form-group row">
		<label for="x_ProfileSubTestCode" class="<?php echo $lab_profile_details_search->LeftColumnClass ?>"><span id="elh_lab_profile_details_ProfileSubTestCode"><?php echo $lab_profile_details_search->ProfileSubTestCode->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ProfileSubTestCode" id="z_ProfileSubTestCode" value="LIKE">
</span>
		</label>
		<div class="<?php echo $lab_profile_details_search->RightColumnClass ?>"><div <?php echo $lab_profile_details_search->ProfileSubTestCode->cellAttributes() ?>>
			<span id="el_lab_profile_details_ProfileSubTestCode" class="ew-search-field">
<input type="text" data-table="lab_profile_details" data-field="x_ProfileSubTestCode" name="x_ProfileSubTestCode" id="x_ProfileSubTestCode" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($lab_profile_details_search->ProfileSubTestCode->getPlaceHolder()) ?>" value="<?php echo $lab_profile_details_search->ProfileSubTestCode->EditValue ?>"<?php echo $lab_profile_details_search->ProfileSubTestCode->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_details_search->TestOrder->Visible) { // TestOrder ?>
	<div id="r_TestOrder" class="form-group row">
		<label for="x_TestOrder" class="<?php echo $lab_profile_details_search->LeftColumnClass ?>"><span id="elh_lab_profile_details_TestOrder"><?php echo $lab_profile_details_search->TestOrder->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_TestOrder" id="z_TestOrder" value="=">
</span>
		</label>
		<div class="<?php echo $lab_profile_details_search->RightColumnClass ?>"><div <?php echo $lab_profile_details_search->TestOrder->cellAttributes() ?>>
			<span id="el_lab_profile_details_TestOrder" class="ew-search-field">
<input type="text" data-table="lab_profile_details" data-field="x_TestOrder" name="x_TestOrder" id="x_TestOrder" size="30" placeholder="<?php echo HtmlEncode($lab_profile_details_search->TestOrder->getPlaceHolder()) ?>" value="<?php echo $lab_profile_details_search->TestOrder->EditValue ?>"<?php echo $lab_profile_details_search->TestOrder->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_details_search->TestAmount->Visible) { // TestAmount ?>
	<div id="r_TestAmount" class="form-group row">
		<label for="x_TestAmount" class="<?php echo $lab_profile_details_search->LeftColumnClass ?>"><span id="elh_lab_profile_details_TestAmount"><?php echo $lab_profile_details_search->TestAmount->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_TestAmount" id="z_TestAmount" value="=">
</span>
		</label>
		<div class="<?php echo $lab_profile_details_search->RightColumnClass ?>"><div <?php echo $lab_profile_details_search->TestAmount->cellAttributes() ?>>
			<span id="el_lab_profile_details_TestAmount" class="ew-search-field">
<input type="text" data-table="lab_profile_details" data-field="x_TestAmount" name="x_TestAmount" id="x_TestAmount" size="30" placeholder="<?php echo HtmlEncode($lab_profile_details_search->TestAmount->getPlaceHolder()) ?>" value="<?php echo $lab_profile_details_search->TestAmount->EditValue ?>"<?php echo $lab_profile_details_search->TestAmount->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$lab_profile_details_search->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $lab_profile_details_search->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("Search") ?></button>
<button class="btn btn-default ew-btn" name="btn-reset" id="btn-reset" type="button" onclick="ew.clearForm(this.form);"><?php echo $Language->phrase("Reset") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$lab_profile_details_search->showPageFooter();
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
$lab_profile_details_search->terminate();
?>