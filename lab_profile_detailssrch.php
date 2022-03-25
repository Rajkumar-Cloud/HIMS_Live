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
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "search";
<?php if ($lab_profile_details_search->IsModal) { ?>
var flab_profile_detailssearch = currentAdvancedSearchForm = new ew.Form("flab_profile_detailssearch", "search");
<?php } else { ?>
var flab_profile_detailssearch = currentForm = new ew.Form("flab_profile_detailssearch", "search");
<?php } ?>

// Form_CustomValidate event
flab_profile_detailssearch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
flab_profile_detailssearch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
flab_profile_detailssearch.lists["x_SubProfileCode"] = <?php echo $lab_profile_details_search->SubProfileCode->Lookup->toClientList() ?>;
flab_profile_detailssearch.lists["x_SubProfileCode"].options = <?php echo JsonEncode($lab_profile_details_search->SubProfileCode->lookupOptions()) ?>;
flab_profile_detailssearch.lists["x_ProfileTestCode"] = <?php echo $lab_profile_details_search->ProfileTestCode->Lookup->toClientList() ?>;
flab_profile_detailssearch.lists["x_ProfileTestCode"].options = <?php echo JsonEncode($lab_profile_details_search->ProfileTestCode->lookupOptions()) ?>;

// Form object for search
// Validate function for search

flab_profile_detailssearch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_id");
	if (elm && !ew.checkInteger(elm.value))
		return this.onError(elm, "<?php echo JsEncode($lab_profile_details->id->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_TestOrder");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($lab_profile_details->TestOrder->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_TestAmount");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($lab_profile_details->TestAmount->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $lab_profile_details_search->showPageHeader(); ?>
<?php
$lab_profile_details_search->showMessage();
?>
<form name="flab_profile_detailssearch" id="flab_profile_detailssearch" class="<?php echo $lab_profile_details_search->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($lab_profile_details_search->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $lab_profile_details_search->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_profile_details">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?php echo (int)$lab_profile_details_search->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($lab_profile_details->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label for="x_id" class="<?php echo $lab_profile_details_search->LeftColumnClass ?>"><span id="elh_lab_profile_details_id"><?php echo $lab_profile_details->id->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_id" id="z_id" value="="></span>
		</label>
		<div class="<?php echo $lab_profile_details_search->RightColumnClass ?>"><div<?php echo $lab_profile_details->id->cellAttributes() ?>>
			<span id="el_lab_profile_details_id">
<input type="text" data-table="lab_profile_details" data-field="x_id" name="x_id" id="x_id" placeholder="<?php echo HtmlEncode($lab_profile_details->id->getPlaceHolder()) ?>" value="<?php echo $lab_profile_details->id->EditValue ?>"<?php echo $lab_profile_details->id->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_details->ProfileCode->Visible) { // ProfileCode ?>
	<div id="r_ProfileCode" class="form-group row">
		<label for="x_ProfileCode" class="<?php echo $lab_profile_details_search->LeftColumnClass ?>"><span id="elh_lab_profile_details_ProfileCode"><?php echo $lab_profile_details->ProfileCode->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_ProfileCode" id="z_ProfileCode" value="LIKE"></span>
		</label>
		<div class="<?php echo $lab_profile_details_search->RightColumnClass ?>"><div<?php echo $lab_profile_details->ProfileCode->cellAttributes() ?>>
			<span id="el_lab_profile_details_ProfileCode">
<input type="text" data-table="lab_profile_details" data-field="x_ProfileCode" name="x_ProfileCode" id="x_ProfileCode" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($lab_profile_details->ProfileCode->getPlaceHolder()) ?>" value="<?php echo $lab_profile_details->ProfileCode->EditValue ?>"<?php echo $lab_profile_details->ProfileCode->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_details->SubProfileCode->Visible) { // SubProfileCode ?>
	<div id="r_SubProfileCode" class="form-group row">
		<label for="x_SubProfileCode" class="<?php echo $lab_profile_details_search->LeftColumnClass ?>"><span id="elh_lab_profile_details_SubProfileCode"><?php echo $lab_profile_details->SubProfileCode->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_SubProfileCode" id="z_SubProfileCode" value="LIKE"></span>
		</label>
		<div class="<?php echo $lab_profile_details_search->RightColumnClass ?>"><div<?php echo $lab_profile_details->SubProfileCode->cellAttributes() ?>>
			<span id="el_lab_profile_details_SubProfileCode">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_SubProfileCode"><?php echo strval($lab_profile_details->SubProfileCode->AdvancedSearch->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($lab_profile_details->SubProfileCode->AdvancedSearch->ViewValue) : $lab_profile_details->SubProfileCode->AdvancedSearch->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($lab_profile_details->SubProfileCode->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($lab_profile_details->SubProfileCode->ReadOnly || $lab_profile_details->SubProfileCode->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_SubProfileCode',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $lab_profile_details->SubProfileCode->Lookup->getParamTag("p_x_SubProfileCode") ?>
<input type="hidden" data-table="lab_profile_details" data-field="x_SubProfileCode" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $lab_profile_details->SubProfileCode->displayValueSeparatorAttribute() ?>" name="x_SubProfileCode" id="x_SubProfileCode" value="<?php echo $lab_profile_details->SubProfileCode->AdvancedSearch->SearchValue ?>"<?php echo $lab_profile_details->SubProfileCode->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_details->ProfileTestCode->Visible) { // ProfileTestCode ?>
	<div id="r_ProfileTestCode" class="form-group row">
		<label for="x_ProfileTestCode" class="<?php echo $lab_profile_details_search->LeftColumnClass ?>"><span id="elh_lab_profile_details_ProfileTestCode"><?php echo $lab_profile_details->ProfileTestCode->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_ProfileTestCode" id="z_ProfileTestCode" value="LIKE"></span>
		</label>
		<div class="<?php echo $lab_profile_details_search->RightColumnClass ?>"><div<?php echo $lab_profile_details->ProfileTestCode->cellAttributes() ?>>
			<span id="el_lab_profile_details_ProfileTestCode">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_ProfileTestCode"><?php echo strval($lab_profile_details->ProfileTestCode->AdvancedSearch->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($lab_profile_details->ProfileTestCode->AdvancedSearch->ViewValue) : $lab_profile_details->ProfileTestCode->AdvancedSearch->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($lab_profile_details->ProfileTestCode->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($lab_profile_details->ProfileTestCode->ReadOnly || $lab_profile_details->ProfileTestCode->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_ProfileTestCode',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $lab_profile_details->ProfileTestCode->Lookup->getParamTag("p_x_ProfileTestCode") ?>
<input type="hidden" data-table="lab_profile_details" data-field="x_ProfileTestCode" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $lab_profile_details->ProfileTestCode->displayValueSeparatorAttribute() ?>" name="x_ProfileTestCode" id="x_ProfileTestCode" value="<?php echo $lab_profile_details->ProfileTestCode->AdvancedSearch->SearchValue ?>"<?php echo $lab_profile_details->ProfileTestCode->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_details->ProfileSubTestCode->Visible) { // ProfileSubTestCode ?>
	<div id="r_ProfileSubTestCode" class="form-group row">
		<label for="x_ProfileSubTestCode" class="<?php echo $lab_profile_details_search->LeftColumnClass ?>"><span id="elh_lab_profile_details_ProfileSubTestCode"><?php echo $lab_profile_details->ProfileSubTestCode->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_ProfileSubTestCode" id="z_ProfileSubTestCode" value="LIKE"></span>
		</label>
		<div class="<?php echo $lab_profile_details_search->RightColumnClass ?>"><div<?php echo $lab_profile_details->ProfileSubTestCode->cellAttributes() ?>>
			<span id="el_lab_profile_details_ProfileSubTestCode">
<input type="text" data-table="lab_profile_details" data-field="x_ProfileSubTestCode" name="x_ProfileSubTestCode" id="x_ProfileSubTestCode" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($lab_profile_details->ProfileSubTestCode->getPlaceHolder()) ?>" value="<?php echo $lab_profile_details->ProfileSubTestCode->EditValue ?>"<?php echo $lab_profile_details->ProfileSubTestCode->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_details->TestOrder->Visible) { // TestOrder ?>
	<div id="r_TestOrder" class="form-group row">
		<label for="x_TestOrder" class="<?php echo $lab_profile_details_search->LeftColumnClass ?>"><span id="elh_lab_profile_details_TestOrder"><?php echo $lab_profile_details->TestOrder->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_TestOrder" id="z_TestOrder" value="="></span>
		</label>
		<div class="<?php echo $lab_profile_details_search->RightColumnClass ?>"><div<?php echo $lab_profile_details->TestOrder->cellAttributes() ?>>
			<span id="el_lab_profile_details_TestOrder">
<input type="text" data-table="lab_profile_details" data-field="x_TestOrder" name="x_TestOrder" id="x_TestOrder" size="30" placeholder="<?php echo HtmlEncode($lab_profile_details->TestOrder->getPlaceHolder()) ?>" value="<?php echo $lab_profile_details->TestOrder->EditValue ?>"<?php echo $lab_profile_details->TestOrder->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_profile_details->TestAmount->Visible) { // TestAmount ?>
	<div id="r_TestAmount" class="form-group row">
		<label for="x_TestAmount" class="<?php echo $lab_profile_details_search->LeftColumnClass ?>"><span id="elh_lab_profile_details_TestAmount"><?php echo $lab_profile_details->TestAmount->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_TestAmount" id="z_TestAmount" value="="></span>
		</label>
		<div class="<?php echo $lab_profile_details_search->RightColumnClass ?>"><div<?php echo $lab_profile_details->TestAmount->cellAttributes() ?>>
			<span id="el_lab_profile_details_TestAmount">
<input type="text" data-table="lab_profile_details" data-field="x_TestAmount" name="x_TestAmount" id="x_TestAmount" size="30" placeholder="<?php echo HtmlEncode($lab_profile_details->TestAmount->getPlaceHolder()) ?>" value="<?php echo $lab_profile_details->TestAmount->EditValue ?>"<?php echo $lab_profile_details->TestAmount->editAttributes() ?>>
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
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$lab_profile_details_search->terminate();
?>