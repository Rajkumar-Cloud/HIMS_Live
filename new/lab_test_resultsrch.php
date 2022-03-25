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
$lab_test_result_search = new lab_test_result_search();

// Run the page
$lab_test_result_search->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_test_result_search->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var flab_test_resultsearch, currentPageID;
loadjs.ready("head", function() {

	// Form object for search
	<?php if ($lab_test_result_search->IsModal) { ?>
	flab_test_resultsearch = currentAdvancedSearchForm = new ew.Form("flab_test_resultsearch", "search");
	<?php } else { ?>
	flab_test_resultsearch = currentForm = new ew.Form("flab_test_resultsearch", "search");
	<?php } ?>
	currentPageID = ew.PAGE_ID = "search";

	// Validate function for search
	flab_test_resultsearch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_SidDate");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($lab_test_result_search->SidDate->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_ResultDate");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($lab_test_result_search->ResultDate->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_Amount");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($lab_test_result_search->Amount->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_AuthDate");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($lab_test_result_search->AuthDate->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_ResDate");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($lab_test_result_search->ResDate->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_SampleDate");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($lab_test_result_search->SampleDate->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_ReceivedDate");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($lab_test_result_search->ReceivedDate->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_DeptRecvDate");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($lab_test_result_search->DeptRecvDate->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_PrintDate");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($lab_test_result_search->PrintDate->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_Tariff");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($lab_test_result_search->Tariff->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_EDITDATE");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($lab_test_result_search->EDITDATE->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_SAuthDate");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($lab_test_result_search->SAuthDate->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_DispDt");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($lab_test_result_search->DispDt->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_Nos");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($lab_test_result_search->Nos->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_ActualAmt");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($lab_test_result_search->ActualAmt->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_ReadTime");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($lab_test_result_search->ReadTime->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_OutLabAmt");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($lab_test_result_search->OutLabAmt->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_ProductQty");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($lab_test_result_search->ProductQty->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	flab_test_resultsearch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	flab_test_resultsearch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("flab_test_resultsearch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $lab_test_result_search->showPageHeader(); ?>
<?php
$lab_test_result_search->showMessage();
?>
<form name="flab_test_resultsearch" id="flab_test_resultsearch" class="<?php echo $lab_test_result_search->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_test_result">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?php echo (int)$lab_test_result_search->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($lab_test_result_search->Branch->Visible) { // Branch ?>
	<div id="r_Branch" class="form-group row">
		<label for="x_Branch" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_Branch"><?php echo $lab_test_result_search->Branch->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Branch" id="z_Branch" value="LIKE">
</span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div <?php echo $lab_test_result_search->Branch->cellAttributes() ?>>
			<span id="el_lab_test_result_Branch" class="ew-search-field">
<input type="text" data-table="lab_test_result" data-field="x_Branch" name="x_Branch" id="x_Branch" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($lab_test_result_search->Branch->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_search->Branch->EditValue ?>"<?php echo $lab_test_result_search->Branch->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result_search->SidNo->Visible) { // SidNo ?>
	<div id="r_SidNo" class="form-group row">
		<label for="x_SidNo" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_SidNo"><?php echo $lab_test_result_search->SidNo->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_SidNo" id="z_SidNo" value="LIKE">
</span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div <?php echo $lab_test_result_search->SidNo->cellAttributes() ?>>
			<span id="el_lab_test_result_SidNo" class="ew-search-field">
<input type="text" data-table="lab_test_result" data-field="x_SidNo" name="x_SidNo" id="x_SidNo" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($lab_test_result_search->SidNo->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_search->SidNo->EditValue ?>"<?php echo $lab_test_result_search->SidNo->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result_search->SidDate->Visible) { // SidDate ?>
	<div id="r_SidDate" class="form-group row">
		<label for="x_SidDate" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_SidDate"><?php echo $lab_test_result_search->SidDate->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_SidDate" id="z_SidDate" value="=">
</span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div <?php echo $lab_test_result_search->SidDate->cellAttributes() ?>>
			<span id="el_lab_test_result_SidDate" class="ew-search-field">
<input type="text" data-table="lab_test_result" data-field="x_SidDate" name="x_SidDate" id="x_SidDate" placeholder="<?php echo HtmlEncode($lab_test_result_search->SidDate->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_search->SidDate->EditValue ?>"<?php echo $lab_test_result_search->SidDate->editAttributes() ?>>
<?php if (!$lab_test_result_search->SidDate->ReadOnly && !$lab_test_result_search->SidDate->Disabled && !isset($lab_test_result_search->SidDate->EditAttrs["readonly"]) && !isset($lab_test_result_search->SidDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultsearch", "datetimepicker"], function() {
	ew.createDateTimePicker("flab_test_resultsearch", "x_SidDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result_search->TestCd->Visible) { // TestCd ?>
	<div id="r_TestCd" class="form-group row">
		<label for="x_TestCd" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_TestCd"><?php echo $lab_test_result_search->TestCd->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_TestCd" id="z_TestCd" value="LIKE">
</span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div <?php echo $lab_test_result_search->TestCd->cellAttributes() ?>>
			<span id="el_lab_test_result_TestCd" class="ew-search-field">
<input type="text" data-table="lab_test_result" data-field="x_TestCd" name="x_TestCd" id="x_TestCd" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($lab_test_result_search->TestCd->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_search->TestCd->EditValue ?>"<?php echo $lab_test_result_search->TestCd->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result_search->TestSubCd->Visible) { // TestSubCd ?>
	<div id="r_TestSubCd" class="form-group row">
		<label for="x_TestSubCd" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_TestSubCd"><?php echo $lab_test_result_search->TestSubCd->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_TestSubCd" id="z_TestSubCd" value="LIKE">
</span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div <?php echo $lab_test_result_search->TestSubCd->cellAttributes() ?>>
			<span id="el_lab_test_result_TestSubCd" class="ew-search-field">
<input type="text" data-table="lab_test_result" data-field="x_TestSubCd" name="x_TestSubCd" id="x_TestSubCd" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($lab_test_result_search->TestSubCd->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_search->TestSubCd->EditValue ?>"<?php echo $lab_test_result_search->TestSubCd->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result_search->DEptCd->Visible) { // DEptCd ?>
	<div id="r_DEptCd" class="form-group row">
		<label for="x_DEptCd" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_DEptCd"><?php echo $lab_test_result_search->DEptCd->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DEptCd" id="z_DEptCd" value="LIKE">
</span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div <?php echo $lab_test_result_search->DEptCd->cellAttributes() ?>>
			<span id="el_lab_test_result_DEptCd" class="ew-search-field">
<input type="text" data-table="lab_test_result" data-field="x_DEptCd" name="x_DEptCd" id="x_DEptCd" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($lab_test_result_search->DEptCd->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_search->DEptCd->EditValue ?>"<?php echo $lab_test_result_search->DEptCd->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result_search->ProfCd->Visible) { // ProfCd ?>
	<div id="r_ProfCd" class="form-group row">
		<label for="x_ProfCd" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_ProfCd"><?php echo $lab_test_result_search->ProfCd->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ProfCd" id="z_ProfCd" value="LIKE">
</span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div <?php echo $lab_test_result_search->ProfCd->cellAttributes() ?>>
			<span id="el_lab_test_result_ProfCd" class="ew-search-field">
<input type="text" data-table="lab_test_result" data-field="x_ProfCd" name="x_ProfCd" id="x_ProfCd" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($lab_test_result_search->ProfCd->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_search->ProfCd->EditValue ?>"<?php echo $lab_test_result_search->ProfCd->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result_search->LabReport->Visible) { // LabReport ?>
	<div id="r_LabReport" class="form-group row">
		<label for="x_LabReport" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_LabReport"><?php echo $lab_test_result_search->LabReport->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_LabReport" id="z_LabReport" value="LIKE">
</span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div <?php echo $lab_test_result_search->LabReport->cellAttributes() ?>>
			<span id="el_lab_test_result_LabReport" class="ew-search-field">
<input type="text" data-table="lab_test_result" data-field="x_LabReport" name="x_LabReport" id="x_LabReport" size="35" placeholder="<?php echo HtmlEncode($lab_test_result_search->LabReport->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_search->LabReport->EditValue ?>"<?php echo $lab_test_result_search->LabReport->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result_search->ResultDate->Visible) { // ResultDate ?>
	<div id="r_ResultDate" class="form-group row">
		<label for="x_ResultDate" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_ResultDate"><?php echo $lab_test_result_search->ResultDate->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_ResultDate" id="z_ResultDate" value="=">
</span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div <?php echo $lab_test_result_search->ResultDate->cellAttributes() ?>>
			<span id="el_lab_test_result_ResultDate" class="ew-search-field">
<input type="text" data-table="lab_test_result" data-field="x_ResultDate" name="x_ResultDate" id="x_ResultDate" placeholder="<?php echo HtmlEncode($lab_test_result_search->ResultDate->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_search->ResultDate->EditValue ?>"<?php echo $lab_test_result_search->ResultDate->editAttributes() ?>>
<?php if (!$lab_test_result_search->ResultDate->ReadOnly && !$lab_test_result_search->ResultDate->Disabled && !isset($lab_test_result_search->ResultDate->EditAttrs["readonly"]) && !isset($lab_test_result_search->ResultDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultsearch", "datetimepicker"], function() {
	ew.createDateTimePicker("flab_test_resultsearch", "x_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result_search->Comments->Visible) { // Comments ?>
	<div id="r_Comments" class="form-group row">
		<label for="x_Comments" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_Comments"><?php echo $lab_test_result_search->Comments->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Comments" id="z_Comments" value="LIKE">
</span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div <?php echo $lab_test_result_search->Comments->cellAttributes() ?>>
			<span id="el_lab_test_result_Comments" class="ew-search-field">
<input type="text" data-table="lab_test_result" data-field="x_Comments" name="x_Comments" id="x_Comments" size="35" placeholder="<?php echo HtmlEncode($lab_test_result_search->Comments->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_search->Comments->EditValue ?>"<?php echo $lab_test_result_search->Comments->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result_search->Method->Visible) { // Method ?>
	<div id="r_Method" class="form-group row">
		<label for="x_Method" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_Method"><?php echo $lab_test_result_search->Method->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Method" id="z_Method" value="LIKE">
</span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div <?php echo $lab_test_result_search->Method->cellAttributes() ?>>
			<span id="el_lab_test_result_Method" class="ew-search-field">
<input type="text" data-table="lab_test_result" data-field="x_Method" name="x_Method" id="x_Method" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($lab_test_result_search->Method->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_search->Method->EditValue ?>"<?php echo $lab_test_result_search->Method->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result_search->Specimen->Visible) { // Specimen ?>
	<div id="r_Specimen" class="form-group row">
		<label for="x_Specimen" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_Specimen"><?php echo $lab_test_result_search->Specimen->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Specimen" id="z_Specimen" value="LIKE">
</span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div <?php echo $lab_test_result_search->Specimen->cellAttributes() ?>>
			<span id="el_lab_test_result_Specimen" class="ew-search-field">
<input type="text" data-table="lab_test_result" data-field="x_Specimen" name="x_Specimen" id="x_Specimen" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($lab_test_result_search->Specimen->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_search->Specimen->EditValue ?>"<?php echo $lab_test_result_search->Specimen->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result_search->Amount->Visible) { // Amount ?>
	<div id="r_Amount" class="form-group row">
		<label for="x_Amount" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_Amount"><?php echo $lab_test_result_search->Amount->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_Amount" id="z_Amount" value="=">
</span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div <?php echo $lab_test_result_search->Amount->cellAttributes() ?>>
			<span id="el_lab_test_result_Amount" class="ew-search-field">
<input type="text" data-table="lab_test_result" data-field="x_Amount" name="x_Amount" id="x_Amount" size="30" placeholder="<?php echo HtmlEncode($lab_test_result_search->Amount->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_search->Amount->EditValue ?>"<?php echo $lab_test_result_search->Amount->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result_search->ResultBy->Visible) { // ResultBy ?>
	<div id="r_ResultBy" class="form-group row">
		<label for="x_ResultBy" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_ResultBy"><?php echo $lab_test_result_search->ResultBy->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ResultBy" id="z_ResultBy" value="LIKE">
</span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div <?php echo $lab_test_result_search->ResultBy->cellAttributes() ?>>
			<span id="el_lab_test_result_ResultBy" class="ew-search-field">
<input type="text" data-table="lab_test_result" data-field="x_ResultBy" name="x_ResultBy" id="x_ResultBy" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($lab_test_result_search->ResultBy->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_search->ResultBy->EditValue ?>"<?php echo $lab_test_result_search->ResultBy->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result_search->AuthBy->Visible) { // AuthBy ?>
	<div id="r_AuthBy" class="form-group row">
		<label for="x_AuthBy" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_AuthBy"><?php echo $lab_test_result_search->AuthBy->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_AuthBy" id="z_AuthBy" value="LIKE">
</span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div <?php echo $lab_test_result_search->AuthBy->cellAttributes() ?>>
			<span id="el_lab_test_result_AuthBy" class="ew-search-field">
<input type="text" data-table="lab_test_result" data-field="x_AuthBy" name="x_AuthBy" id="x_AuthBy" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($lab_test_result_search->AuthBy->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_search->AuthBy->EditValue ?>"<?php echo $lab_test_result_search->AuthBy->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result_search->AuthDate->Visible) { // AuthDate ?>
	<div id="r_AuthDate" class="form-group row">
		<label for="x_AuthDate" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_AuthDate"><?php echo $lab_test_result_search->AuthDate->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_AuthDate" id="z_AuthDate" value="=">
</span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div <?php echo $lab_test_result_search->AuthDate->cellAttributes() ?>>
			<span id="el_lab_test_result_AuthDate" class="ew-search-field">
<input type="text" data-table="lab_test_result" data-field="x_AuthDate" name="x_AuthDate" id="x_AuthDate" placeholder="<?php echo HtmlEncode($lab_test_result_search->AuthDate->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_search->AuthDate->EditValue ?>"<?php echo $lab_test_result_search->AuthDate->editAttributes() ?>>
<?php if (!$lab_test_result_search->AuthDate->ReadOnly && !$lab_test_result_search->AuthDate->Disabled && !isset($lab_test_result_search->AuthDate->EditAttrs["readonly"]) && !isset($lab_test_result_search->AuthDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultsearch", "datetimepicker"], function() {
	ew.createDateTimePicker("flab_test_resultsearch", "x_AuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result_search->Abnormal->Visible) { // Abnormal ?>
	<div id="r_Abnormal" class="form-group row">
		<label for="x_Abnormal" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_Abnormal"><?php echo $lab_test_result_search->Abnormal->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Abnormal" id="z_Abnormal" value="LIKE">
</span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div <?php echo $lab_test_result_search->Abnormal->cellAttributes() ?>>
			<span id="el_lab_test_result_Abnormal" class="ew-search-field">
<input type="text" data-table="lab_test_result" data-field="x_Abnormal" name="x_Abnormal" id="x_Abnormal" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result_search->Abnormal->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_search->Abnormal->EditValue ?>"<?php echo $lab_test_result_search->Abnormal->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result_search->Printed->Visible) { // Printed ?>
	<div id="r_Printed" class="form-group row">
		<label for="x_Printed" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_Printed"><?php echo $lab_test_result_search->Printed->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Printed" id="z_Printed" value="LIKE">
</span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div <?php echo $lab_test_result_search->Printed->cellAttributes() ?>>
			<span id="el_lab_test_result_Printed" class="ew-search-field">
<input type="text" data-table="lab_test_result" data-field="x_Printed" name="x_Printed" id="x_Printed" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result_search->Printed->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_search->Printed->EditValue ?>"<?php echo $lab_test_result_search->Printed->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result_search->Dispatch->Visible) { // Dispatch ?>
	<div id="r_Dispatch" class="form-group row">
		<label for="x_Dispatch" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_Dispatch"><?php echo $lab_test_result_search->Dispatch->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Dispatch" id="z_Dispatch" value="LIKE">
</span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div <?php echo $lab_test_result_search->Dispatch->cellAttributes() ?>>
			<span id="el_lab_test_result_Dispatch" class="ew-search-field">
<input type="text" data-table="lab_test_result" data-field="x_Dispatch" name="x_Dispatch" id="x_Dispatch" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result_search->Dispatch->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_search->Dispatch->EditValue ?>"<?php echo $lab_test_result_search->Dispatch->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result_search->LOWHIGH->Visible) { // LOWHIGH ?>
	<div id="r_LOWHIGH" class="form-group row">
		<label for="x_LOWHIGH" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_LOWHIGH"><?php echo $lab_test_result_search->LOWHIGH->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_LOWHIGH" id="z_LOWHIGH" value="LIKE">
</span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div <?php echo $lab_test_result_search->LOWHIGH->cellAttributes() ?>>
			<span id="el_lab_test_result_LOWHIGH" class="ew-search-field">
<input type="text" data-table="lab_test_result" data-field="x_LOWHIGH" name="x_LOWHIGH" id="x_LOWHIGH" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result_search->LOWHIGH->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_search->LOWHIGH->EditValue ?>"<?php echo $lab_test_result_search->LOWHIGH->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result_search->RefValue->Visible) { // RefValue ?>
	<div id="r_RefValue" class="form-group row">
		<label for="x_RefValue" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_RefValue"><?php echo $lab_test_result_search->RefValue->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_RefValue" id="z_RefValue" value="LIKE">
</span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div <?php echo $lab_test_result_search->RefValue->cellAttributes() ?>>
			<span id="el_lab_test_result_RefValue" class="ew-search-field">
<input type="text" data-table="lab_test_result" data-field="x_RefValue" name="x_RefValue" id="x_RefValue" size="35" placeholder="<?php echo HtmlEncode($lab_test_result_search->RefValue->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_search->RefValue->EditValue ?>"<?php echo $lab_test_result_search->RefValue->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result_search->Unit->Visible) { // Unit ?>
	<div id="r_Unit" class="form-group row">
		<label for="x_Unit" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_Unit"><?php echo $lab_test_result_search->Unit->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Unit" id="z_Unit" value="LIKE">
</span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div <?php echo $lab_test_result_search->Unit->cellAttributes() ?>>
			<span id="el_lab_test_result_Unit" class="ew-search-field">
<input type="text" data-table="lab_test_result" data-field="x_Unit" name="x_Unit" id="x_Unit" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($lab_test_result_search->Unit->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_search->Unit->EditValue ?>"<?php echo $lab_test_result_search->Unit->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result_search->ResDate->Visible) { // ResDate ?>
	<div id="r_ResDate" class="form-group row">
		<label for="x_ResDate" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_ResDate"><?php echo $lab_test_result_search->ResDate->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_ResDate" id="z_ResDate" value="=">
</span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div <?php echo $lab_test_result_search->ResDate->cellAttributes() ?>>
			<span id="el_lab_test_result_ResDate" class="ew-search-field">
<input type="text" data-table="lab_test_result" data-field="x_ResDate" name="x_ResDate" id="x_ResDate" placeholder="<?php echo HtmlEncode($lab_test_result_search->ResDate->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_search->ResDate->EditValue ?>"<?php echo $lab_test_result_search->ResDate->editAttributes() ?>>
<?php if (!$lab_test_result_search->ResDate->ReadOnly && !$lab_test_result_search->ResDate->Disabled && !isset($lab_test_result_search->ResDate->EditAttrs["readonly"]) && !isset($lab_test_result_search->ResDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultsearch", "datetimepicker"], function() {
	ew.createDateTimePicker("flab_test_resultsearch", "x_ResDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result_search->Pic1->Visible) { // Pic1 ?>
	<div id="r_Pic1" class="form-group row">
		<label for="x_Pic1" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_Pic1"><?php echo $lab_test_result_search->Pic1->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Pic1" id="z_Pic1" value="LIKE">
</span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div <?php echo $lab_test_result_search->Pic1->cellAttributes() ?>>
			<span id="el_lab_test_result_Pic1" class="ew-search-field">
<input type="text" data-table="lab_test_result" data-field="x_Pic1" name="x_Pic1" id="x_Pic1" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($lab_test_result_search->Pic1->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_search->Pic1->EditValue ?>"<?php echo $lab_test_result_search->Pic1->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result_search->Pic2->Visible) { // Pic2 ?>
	<div id="r_Pic2" class="form-group row">
		<label for="x_Pic2" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_Pic2"><?php echo $lab_test_result_search->Pic2->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Pic2" id="z_Pic2" value="LIKE">
</span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div <?php echo $lab_test_result_search->Pic2->cellAttributes() ?>>
			<span id="el_lab_test_result_Pic2" class="ew-search-field">
<input type="text" data-table="lab_test_result" data-field="x_Pic2" name="x_Pic2" id="x_Pic2" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($lab_test_result_search->Pic2->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_search->Pic2->EditValue ?>"<?php echo $lab_test_result_search->Pic2->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result_search->GraphPath->Visible) { // GraphPath ?>
	<div id="r_GraphPath" class="form-group row">
		<label for="x_GraphPath" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_GraphPath"><?php echo $lab_test_result_search->GraphPath->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_GraphPath" id="z_GraphPath" value="LIKE">
</span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div <?php echo $lab_test_result_search->GraphPath->cellAttributes() ?>>
			<span id="el_lab_test_result_GraphPath" class="ew-search-field">
<input type="text" data-table="lab_test_result" data-field="x_GraphPath" name="x_GraphPath" id="x_GraphPath" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($lab_test_result_search->GraphPath->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_search->GraphPath->EditValue ?>"<?php echo $lab_test_result_search->GraphPath->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result_search->SampleDate->Visible) { // SampleDate ?>
	<div id="r_SampleDate" class="form-group row">
		<label for="x_SampleDate" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_SampleDate"><?php echo $lab_test_result_search->SampleDate->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_SampleDate" id="z_SampleDate" value="=">
</span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div <?php echo $lab_test_result_search->SampleDate->cellAttributes() ?>>
			<span id="el_lab_test_result_SampleDate" class="ew-search-field">
<input type="text" data-table="lab_test_result" data-field="x_SampleDate" name="x_SampleDate" id="x_SampleDate" placeholder="<?php echo HtmlEncode($lab_test_result_search->SampleDate->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_search->SampleDate->EditValue ?>"<?php echo $lab_test_result_search->SampleDate->editAttributes() ?>>
<?php if (!$lab_test_result_search->SampleDate->ReadOnly && !$lab_test_result_search->SampleDate->Disabled && !isset($lab_test_result_search->SampleDate->EditAttrs["readonly"]) && !isset($lab_test_result_search->SampleDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultsearch", "datetimepicker"], function() {
	ew.createDateTimePicker("flab_test_resultsearch", "x_SampleDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result_search->SampleUser->Visible) { // SampleUser ?>
	<div id="r_SampleUser" class="form-group row">
		<label for="x_SampleUser" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_SampleUser"><?php echo $lab_test_result_search->SampleUser->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_SampleUser" id="z_SampleUser" value="LIKE">
</span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div <?php echo $lab_test_result_search->SampleUser->cellAttributes() ?>>
			<span id="el_lab_test_result_SampleUser" class="ew-search-field">
<input type="text" data-table="lab_test_result" data-field="x_SampleUser" name="x_SampleUser" id="x_SampleUser" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($lab_test_result_search->SampleUser->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_search->SampleUser->EditValue ?>"<?php echo $lab_test_result_search->SampleUser->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result_search->ReceivedDate->Visible) { // ReceivedDate ?>
	<div id="r_ReceivedDate" class="form-group row">
		<label for="x_ReceivedDate" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_ReceivedDate"><?php echo $lab_test_result_search->ReceivedDate->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_ReceivedDate" id="z_ReceivedDate" value="=">
</span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div <?php echo $lab_test_result_search->ReceivedDate->cellAttributes() ?>>
			<span id="el_lab_test_result_ReceivedDate" class="ew-search-field">
<input type="text" data-table="lab_test_result" data-field="x_ReceivedDate" name="x_ReceivedDate" id="x_ReceivedDate" placeholder="<?php echo HtmlEncode($lab_test_result_search->ReceivedDate->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_search->ReceivedDate->EditValue ?>"<?php echo $lab_test_result_search->ReceivedDate->editAttributes() ?>>
<?php if (!$lab_test_result_search->ReceivedDate->ReadOnly && !$lab_test_result_search->ReceivedDate->Disabled && !isset($lab_test_result_search->ReceivedDate->EditAttrs["readonly"]) && !isset($lab_test_result_search->ReceivedDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultsearch", "datetimepicker"], function() {
	ew.createDateTimePicker("flab_test_resultsearch", "x_ReceivedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result_search->ReceivedUser->Visible) { // ReceivedUser ?>
	<div id="r_ReceivedUser" class="form-group row">
		<label for="x_ReceivedUser" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_ReceivedUser"><?php echo $lab_test_result_search->ReceivedUser->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ReceivedUser" id="z_ReceivedUser" value="LIKE">
</span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div <?php echo $lab_test_result_search->ReceivedUser->cellAttributes() ?>>
			<span id="el_lab_test_result_ReceivedUser" class="ew-search-field">
<input type="text" data-table="lab_test_result" data-field="x_ReceivedUser" name="x_ReceivedUser" id="x_ReceivedUser" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($lab_test_result_search->ReceivedUser->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_search->ReceivedUser->EditValue ?>"<?php echo $lab_test_result_search->ReceivedUser->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result_search->DeptRecvDate->Visible) { // DeptRecvDate ?>
	<div id="r_DeptRecvDate" class="form-group row">
		<label for="x_DeptRecvDate" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_DeptRecvDate"><?php echo $lab_test_result_search->DeptRecvDate->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_DeptRecvDate" id="z_DeptRecvDate" value="=">
</span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div <?php echo $lab_test_result_search->DeptRecvDate->cellAttributes() ?>>
			<span id="el_lab_test_result_DeptRecvDate" class="ew-search-field">
<input type="text" data-table="lab_test_result" data-field="x_DeptRecvDate" name="x_DeptRecvDate" id="x_DeptRecvDate" placeholder="<?php echo HtmlEncode($lab_test_result_search->DeptRecvDate->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_search->DeptRecvDate->EditValue ?>"<?php echo $lab_test_result_search->DeptRecvDate->editAttributes() ?>>
<?php if (!$lab_test_result_search->DeptRecvDate->ReadOnly && !$lab_test_result_search->DeptRecvDate->Disabled && !isset($lab_test_result_search->DeptRecvDate->EditAttrs["readonly"]) && !isset($lab_test_result_search->DeptRecvDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultsearch", "datetimepicker"], function() {
	ew.createDateTimePicker("flab_test_resultsearch", "x_DeptRecvDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result_search->DeptRecvUser->Visible) { // DeptRecvUser ?>
	<div id="r_DeptRecvUser" class="form-group row">
		<label for="x_DeptRecvUser" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_DeptRecvUser"><?php echo $lab_test_result_search->DeptRecvUser->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DeptRecvUser" id="z_DeptRecvUser" value="LIKE">
</span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div <?php echo $lab_test_result_search->DeptRecvUser->cellAttributes() ?>>
			<span id="el_lab_test_result_DeptRecvUser" class="ew-search-field">
<input type="text" data-table="lab_test_result" data-field="x_DeptRecvUser" name="x_DeptRecvUser" id="x_DeptRecvUser" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($lab_test_result_search->DeptRecvUser->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_search->DeptRecvUser->EditValue ?>"<?php echo $lab_test_result_search->DeptRecvUser->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result_search->PrintBy->Visible) { // PrintBy ?>
	<div id="r_PrintBy" class="form-group row">
		<label for="x_PrintBy" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_PrintBy"><?php echo $lab_test_result_search->PrintBy->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PrintBy" id="z_PrintBy" value="LIKE">
</span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div <?php echo $lab_test_result_search->PrintBy->cellAttributes() ?>>
			<span id="el_lab_test_result_PrintBy" class="ew-search-field">
<input type="text" data-table="lab_test_result" data-field="x_PrintBy" name="x_PrintBy" id="x_PrintBy" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($lab_test_result_search->PrintBy->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_search->PrintBy->EditValue ?>"<?php echo $lab_test_result_search->PrintBy->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result_search->PrintDate->Visible) { // PrintDate ?>
	<div id="r_PrintDate" class="form-group row">
		<label for="x_PrintDate" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_PrintDate"><?php echo $lab_test_result_search->PrintDate->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_PrintDate" id="z_PrintDate" value="=">
</span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div <?php echo $lab_test_result_search->PrintDate->cellAttributes() ?>>
			<span id="el_lab_test_result_PrintDate" class="ew-search-field">
<input type="text" data-table="lab_test_result" data-field="x_PrintDate" name="x_PrintDate" id="x_PrintDate" placeholder="<?php echo HtmlEncode($lab_test_result_search->PrintDate->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_search->PrintDate->EditValue ?>"<?php echo $lab_test_result_search->PrintDate->editAttributes() ?>>
<?php if (!$lab_test_result_search->PrintDate->ReadOnly && !$lab_test_result_search->PrintDate->Disabled && !isset($lab_test_result_search->PrintDate->EditAttrs["readonly"]) && !isset($lab_test_result_search->PrintDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultsearch", "datetimepicker"], function() {
	ew.createDateTimePicker("flab_test_resultsearch", "x_PrintDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result_search->MachineCD->Visible) { // MachineCD ?>
	<div id="r_MachineCD" class="form-group row">
		<label for="x_MachineCD" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_MachineCD"><?php echo $lab_test_result_search->MachineCD->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_MachineCD" id="z_MachineCD" value="LIKE">
</span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div <?php echo $lab_test_result_search->MachineCD->cellAttributes() ?>>
			<span id="el_lab_test_result_MachineCD" class="ew-search-field">
<input type="text" data-table="lab_test_result" data-field="x_MachineCD" name="x_MachineCD" id="x_MachineCD" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($lab_test_result_search->MachineCD->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_search->MachineCD->EditValue ?>"<?php echo $lab_test_result_search->MachineCD->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result_search->TestCancel->Visible) { // TestCancel ?>
	<div id="r_TestCancel" class="form-group row">
		<label for="x_TestCancel" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_TestCancel"><?php echo $lab_test_result_search->TestCancel->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_TestCancel" id="z_TestCancel" value="LIKE">
</span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div <?php echo $lab_test_result_search->TestCancel->cellAttributes() ?>>
			<span id="el_lab_test_result_TestCancel" class="ew-search-field">
<input type="text" data-table="lab_test_result" data-field="x_TestCancel" name="x_TestCancel" id="x_TestCancel" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result_search->TestCancel->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_search->TestCancel->EditValue ?>"<?php echo $lab_test_result_search->TestCancel->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result_search->OutSource->Visible) { // OutSource ?>
	<div id="r_OutSource" class="form-group row">
		<label for="x_OutSource" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_OutSource"><?php echo $lab_test_result_search->OutSource->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_OutSource" id="z_OutSource" value="LIKE">
</span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div <?php echo $lab_test_result_search->OutSource->cellAttributes() ?>>
			<span id="el_lab_test_result_OutSource" class="ew-search-field">
<input type="text" data-table="lab_test_result" data-field="x_OutSource" name="x_OutSource" id="x_OutSource" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result_search->OutSource->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_search->OutSource->EditValue ?>"<?php echo $lab_test_result_search->OutSource->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result_search->Tariff->Visible) { // Tariff ?>
	<div id="r_Tariff" class="form-group row">
		<label for="x_Tariff" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_Tariff"><?php echo $lab_test_result_search->Tariff->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_Tariff" id="z_Tariff" value="=">
</span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div <?php echo $lab_test_result_search->Tariff->cellAttributes() ?>>
			<span id="el_lab_test_result_Tariff" class="ew-search-field">
<input type="text" data-table="lab_test_result" data-field="x_Tariff" name="x_Tariff" id="x_Tariff" size="30" placeholder="<?php echo HtmlEncode($lab_test_result_search->Tariff->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_search->Tariff->EditValue ?>"<?php echo $lab_test_result_search->Tariff->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result_search->EDITDATE->Visible) { // EDITDATE ?>
	<div id="r_EDITDATE" class="form-group row">
		<label for="x_EDITDATE" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_EDITDATE"><?php echo $lab_test_result_search->EDITDATE->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_EDITDATE" id="z_EDITDATE" value="=">
</span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div <?php echo $lab_test_result_search->EDITDATE->cellAttributes() ?>>
			<span id="el_lab_test_result_EDITDATE" class="ew-search-field">
<input type="text" data-table="lab_test_result" data-field="x_EDITDATE" name="x_EDITDATE" id="x_EDITDATE" placeholder="<?php echo HtmlEncode($lab_test_result_search->EDITDATE->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_search->EDITDATE->EditValue ?>"<?php echo $lab_test_result_search->EDITDATE->editAttributes() ?>>
<?php if (!$lab_test_result_search->EDITDATE->ReadOnly && !$lab_test_result_search->EDITDATE->Disabled && !isset($lab_test_result_search->EDITDATE->EditAttrs["readonly"]) && !isset($lab_test_result_search->EDITDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultsearch", "datetimepicker"], function() {
	ew.createDateTimePicker("flab_test_resultsearch", "x_EDITDATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result_search->UPLOAD->Visible) { // UPLOAD ?>
	<div id="r_UPLOAD" class="form-group row">
		<label for="x_UPLOAD" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_UPLOAD"><?php echo $lab_test_result_search->UPLOAD->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_UPLOAD" id="z_UPLOAD" value="LIKE">
</span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div <?php echo $lab_test_result_search->UPLOAD->cellAttributes() ?>>
			<span id="el_lab_test_result_UPLOAD" class="ew-search-field">
<input type="text" data-table="lab_test_result" data-field="x_UPLOAD" name="x_UPLOAD" id="x_UPLOAD" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result_search->UPLOAD->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_search->UPLOAD->EditValue ?>"<?php echo $lab_test_result_search->UPLOAD->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result_search->SAuthDate->Visible) { // SAuthDate ?>
	<div id="r_SAuthDate" class="form-group row">
		<label for="x_SAuthDate" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_SAuthDate"><?php echo $lab_test_result_search->SAuthDate->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_SAuthDate" id="z_SAuthDate" value="=">
</span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div <?php echo $lab_test_result_search->SAuthDate->cellAttributes() ?>>
			<span id="el_lab_test_result_SAuthDate" class="ew-search-field">
<input type="text" data-table="lab_test_result" data-field="x_SAuthDate" name="x_SAuthDate" id="x_SAuthDate" placeholder="<?php echo HtmlEncode($lab_test_result_search->SAuthDate->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_search->SAuthDate->EditValue ?>"<?php echo $lab_test_result_search->SAuthDate->editAttributes() ?>>
<?php if (!$lab_test_result_search->SAuthDate->ReadOnly && !$lab_test_result_search->SAuthDate->Disabled && !isset($lab_test_result_search->SAuthDate->EditAttrs["readonly"]) && !isset($lab_test_result_search->SAuthDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultsearch", "datetimepicker"], function() {
	ew.createDateTimePicker("flab_test_resultsearch", "x_SAuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result_search->SAuthBy->Visible) { // SAuthBy ?>
	<div id="r_SAuthBy" class="form-group row">
		<label for="x_SAuthBy" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_SAuthBy"><?php echo $lab_test_result_search->SAuthBy->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_SAuthBy" id="z_SAuthBy" value="LIKE">
</span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div <?php echo $lab_test_result_search->SAuthBy->cellAttributes() ?>>
			<span id="el_lab_test_result_SAuthBy" class="ew-search-field">
<input type="text" data-table="lab_test_result" data-field="x_SAuthBy" name="x_SAuthBy" id="x_SAuthBy" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($lab_test_result_search->SAuthBy->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_search->SAuthBy->EditValue ?>"<?php echo $lab_test_result_search->SAuthBy->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result_search->NoRC->Visible) { // NoRC ?>
	<div id="r_NoRC" class="form-group row">
		<label for="x_NoRC" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_NoRC"><?php echo $lab_test_result_search->NoRC->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_NoRC" id="z_NoRC" value="LIKE">
</span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div <?php echo $lab_test_result_search->NoRC->cellAttributes() ?>>
			<span id="el_lab_test_result_NoRC" class="ew-search-field">
<input type="text" data-table="lab_test_result" data-field="x_NoRC" name="x_NoRC" id="x_NoRC" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result_search->NoRC->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_search->NoRC->EditValue ?>"<?php echo $lab_test_result_search->NoRC->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result_search->DispDt->Visible) { // DispDt ?>
	<div id="r_DispDt" class="form-group row">
		<label for="x_DispDt" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_DispDt"><?php echo $lab_test_result_search->DispDt->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_DispDt" id="z_DispDt" value="=">
</span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div <?php echo $lab_test_result_search->DispDt->cellAttributes() ?>>
			<span id="el_lab_test_result_DispDt" class="ew-search-field">
<input type="text" data-table="lab_test_result" data-field="x_DispDt" name="x_DispDt" id="x_DispDt" placeholder="<?php echo HtmlEncode($lab_test_result_search->DispDt->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_search->DispDt->EditValue ?>"<?php echo $lab_test_result_search->DispDt->editAttributes() ?>>
<?php if (!$lab_test_result_search->DispDt->ReadOnly && !$lab_test_result_search->DispDt->Disabled && !isset($lab_test_result_search->DispDt->EditAttrs["readonly"]) && !isset($lab_test_result_search->DispDt->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultsearch", "datetimepicker"], function() {
	ew.createDateTimePicker("flab_test_resultsearch", "x_DispDt", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result_search->DispUser->Visible) { // DispUser ?>
	<div id="r_DispUser" class="form-group row">
		<label for="x_DispUser" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_DispUser"><?php echo $lab_test_result_search->DispUser->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DispUser" id="z_DispUser" value="LIKE">
</span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div <?php echo $lab_test_result_search->DispUser->cellAttributes() ?>>
			<span id="el_lab_test_result_DispUser" class="ew-search-field">
<input type="text" data-table="lab_test_result" data-field="x_DispUser" name="x_DispUser" id="x_DispUser" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($lab_test_result_search->DispUser->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_search->DispUser->EditValue ?>"<?php echo $lab_test_result_search->DispUser->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result_search->DispRemarks->Visible) { // DispRemarks ?>
	<div id="r_DispRemarks" class="form-group row">
		<label for="x_DispRemarks" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_DispRemarks"><?php echo $lab_test_result_search->DispRemarks->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DispRemarks" id="z_DispRemarks" value="LIKE">
</span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div <?php echo $lab_test_result_search->DispRemarks->cellAttributes() ?>>
			<span id="el_lab_test_result_DispRemarks" class="ew-search-field">
<input type="text" data-table="lab_test_result" data-field="x_DispRemarks" name="x_DispRemarks" id="x_DispRemarks" size="30" maxlength="250" placeholder="<?php echo HtmlEncode($lab_test_result_search->DispRemarks->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_search->DispRemarks->EditValue ?>"<?php echo $lab_test_result_search->DispRemarks->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result_search->DispMode->Visible) { // DispMode ?>
	<div id="r_DispMode" class="form-group row">
		<label for="x_DispMode" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_DispMode"><?php echo $lab_test_result_search->DispMode->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DispMode" id="z_DispMode" value="LIKE">
</span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div <?php echo $lab_test_result_search->DispMode->cellAttributes() ?>>
			<span id="el_lab_test_result_DispMode" class="ew-search-field">
<input type="text" data-table="lab_test_result" data-field="x_DispMode" name="x_DispMode" id="x_DispMode" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($lab_test_result_search->DispMode->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_search->DispMode->EditValue ?>"<?php echo $lab_test_result_search->DispMode->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result_search->ProductCD->Visible) { // ProductCD ?>
	<div id="r_ProductCD" class="form-group row">
		<label for="x_ProductCD" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_ProductCD"><?php echo $lab_test_result_search->ProductCD->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ProductCD" id="z_ProductCD" value="LIKE">
</span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div <?php echo $lab_test_result_search->ProductCD->cellAttributes() ?>>
			<span id="el_lab_test_result_ProductCD" class="ew-search-field">
<input type="text" data-table="lab_test_result" data-field="x_ProductCD" name="x_ProductCD" id="x_ProductCD" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($lab_test_result_search->ProductCD->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_search->ProductCD->EditValue ?>"<?php echo $lab_test_result_search->ProductCD->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result_search->Nos->Visible) { // Nos ?>
	<div id="r_Nos" class="form-group row">
		<label for="x_Nos" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_Nos"><?php echo $lab_test_result_search->Nos->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_Nos" id="z_Nos" value="=">
</span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div <?php echo $lab_test_result_search->Nos->cellAttributes() ?>>
			<span id="el_lab_test_result_Nos" class="ew-search-field">
<input type="text" data-table="lab_test_result" data-field="x_Nos" name="x_Nos" id="x_Nos" size="30" placeholder="<?php echo HtmlEncode($lab_test_result_search->Nos->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_search->Nos->EditValue ?>"<?php echo $lab_test_result_search->Nos->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result_search->WBCPath->Visible) { // WBCPath ?>
	<div id="r_WBCPath" class="form-group row">
		<label for="x_WBCPath" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_WBCPath"><?php echo $lab_test_result_search->WBCPath->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_WBCPath" id="z_WBCPath" value="LIKE">
</span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div <?php echo $lab_test_result_search->WBCPath->cellAttributes() ?>>
			<span id="el_lab_test_result_WBCPath" class="ew-search-field">
<input type="text" data-table="lab_test_result" data-field="x_WBCPath" name="x_WBCPath" id="x_WBCPath" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($lab_test_result_search->WBCPath->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_search->WBCPath->EditValue ?>"<?php echo $lab_test_result_search->WBCPath->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result_search->RBCPath->Visible) { // RBCPath ?>
	<div id="r_RBCPath" class="form-group row">
		<label for="x_RBCPath" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_RBCPath"><?php echo $lab_test_result_search->RBCPath->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_RBCPath" id="z_RBCPath" value="LIKE">
</span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div <?php echo $lab_test_result_search->RBCPath->cellAttributes() ?>>
			<span id="el_lab_test_result_RBCPath" class="ew-search-field">
<input type="text" data-table="lab_test_result" data-field="x_RBCPath" name="x_RBCPath" id="x_RBCPath" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($lab_test_result_search->RBCPath->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_search->RBCPath->EditValue ?>"<?php echo $lab_test_result_search->RBCPath->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result_search->PTPath->Visible) { // PTPath ?>
	<div id="r_PTPath" class="form-group row">
		<label for="x_PTPath" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_PTPath"><?php echo $lab_test_result_search->PTPath->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PTPath" id="z_PTPath" value="LIKE">
</span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div <?php echo $lab_test_result_search->PTPath->cellAttributes() ?>>
			<span id="el_lab_test_result_PTPath" class="ew-search-field">
<input type="text" data-table="lab_test_result" data-field="x_PTPath" name="x_PTPath" id="x_PTPath" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($lab_test_result_search->PTPath->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_search->PTPath->EditValue ?>"<?php echo $lab_test_result_search->PTPath->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result_search->ActualAmt->Visible) { // ActualAmt ?>
	<div id="r_ActualAmt" class="form-group row">
		<label for="x_ActualAmt" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_ActualAmt"><?php echo $lab_test_result_search->ActualAmt->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_ActualAmt" id="z_ActualAmt" value="=">
</span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div <?php echo $lab_test_result_search->ActualAmt->cellAttributes() ?>>
			<span id="el_lab_test_result_ActualAmt" class="ew-search-field">
<input type="text" data-table="lab_test_result" data-field="x_ActualAmt" name="x_ActualAmt" id="x_ActualAmt" size="30" placeholder="<?php echo HtmlEncode($lab_test_result_search->ActualAmt->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_search->ActualAmt->EditValue ?>"<?php echo $lab_test_result_search->ActualAmt->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result_search->NoSign->Visible) { // NoSign ?>
	<div id="r_NoSign" class="form-group row">
		<label for="x_NoSign" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_NoSign"><?php echo $lab_test_result_search->NoSign->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_NoSign" id="z_NoSign" value="LIKE">
</span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div <?php echo $lab_test_result_search->NoSign->cellAttributes() ?>>
			<span id="el_lab_test_result_NoSign" class="ew-search-field">
<input type="text" data-table="lab_test_result" data-field="x_NoSign" name="x_NoSign" id="x_NoSign" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result_search->NoSign->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_search->NoSign->EditValue ?>"<?php echo $lab_test_result_search->NoSign->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result_search->_Barcode->Visible) { // Barcode ?>
	<div id="r__Barcode" class="form-group row">
		<label for="x__Barcode" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result__Barcode"><?php echo $lab_test_result_search->_Barcode->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z__Barcode" id="z__Barcode" value="LIKE">
</span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div <?php echo $lab_test_result_search->_Barcode->cellAttributes() ?>>
			<span id="el_lab_test_result__Barcode" class="ew-search-field">
<input type="text" data-table="lab_test_result" data-field="x__Barcode" name="x__Barcode" id="x__Barcode" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result_search->_Barcode->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_search->_Barcode->EditValue ?>"<?php echo $lab_test_result_search->_Barcode->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result_search->ReadTime->Visible) { // ReadTime ?>
	<div id="r_ReadTime" class="form-group row">
		<label for="x_ReadTime" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_ReadTime"><?php echo $lab_test_result_search->ReadTime->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_ReadTime" id="z_ReadTime" value="=">
</span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div <?php echo $lab_test_result_search->ReadTime->cellAttributes() ?>>
			<span id="el_lab_test_result_ReadTime" class="ew-search-field">
<input type="text" data-table="lab_test_result" data-field="x_ReadTime" name="x_ReadTime" id="x_ReadTime" placeholder="<?php echo HtmlEncode($lab_test_result_search->ReadTime->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_search->ReadTime->EditValue ?>"<?php echo $lab_test_result_search->ReadTime->editAttributes() ?>>
<?php if (!$lab_test_result_search->ReadTime->ReadOnly && !$lab_test_result_search->ReadTime->Disabled && !isset($lab_test_result_search->ReadTime->EditAttrs["readonly"]) && !isset($lab_test_result_search->ReadTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultsearch", "datetimepicker"], function() {
	ew.createDateTimePicker("flab_test_resultsearch", "x_ReadTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result_search->Result->Visible) { // Result ?>
	<div id="r_Result" class="form-group row">
		<label for="x_Result" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_Result"><?php echo $lab_test_result_search->Result->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Result" id="z_Result" value="LIKE">
</span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div <?php echo $lab_test_result_search->Result->cellAttributes() ?>>
			<span id="el_lab_test_result_Result" class="ew-search-field">
<input type="text" data-table="lab_test_result" data-field="x_Result" name="x_Result" id="x_Result" size="35" placeholder="<?php echo HtmlEncode($lab_test_result_search->Result->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_search->Result->EditValue ?>"<?php echo $lab_test_result_search->Result->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result_search->VailID->Visible) { // VailID ?>
	<div id="r_VailID" class="form-group row">
		<label for="x_VailID" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_VailID"><?php echo $lab_test_result_search->VailID->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_VailID" id="z_VailID" value="LIKE">
</span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div <?php echo $lab_test_result_search->VailID->cellAttributes() ?>>
			<span id="el_lab_test_result_VailID" class="ew-search-field">
<input type="text" data-table="lab_test_result" data-field="x_VailID" name="x_VailID" id="x_VailID" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($lab_test_result_search->VailID->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_search->VailID->EditValue ?>"<?php echo $lab_test_result_search->VailID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result_search->ReadMachine->Visible) { // ReadMachine ?>
	<div id="r_ReadMachine" class="form-group row">
		<label for="x_ReadMachine" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_ReadMachine"><?php echo $lab_test_result_search->ReadMachine->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ReadMachine" id="z_ReadMachine" value="LIKE">
</span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div <?php echo $lab_test_result_search->ReadMachine->cellAttributes() ?>>
			<span id="el_lab_test_result_ReadMachine" class="ew-search-field">
<input type="text" data-table="lab_test_result" data-field="x_ReadMachine" name="x_ReadMachine" id="x_ReadMachine" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($lab_test_result_search->ReadMachine->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_search->ReadMachine->EditValue ?>"<?php echo $lab_test_result_search->ReadMachine->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result_search->LabCD->Visible) { // LabCD ?>
	<div id="r_LabCD" class="form-group row">
		<label for="x_LabCD" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_LabCD"><?php echo $lab_test_result_search->LabCD->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_LabCD" id="z_LabCD" value="LIKE">
</span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div <?php echo $lab_test_result_search->LabCD->cellAttributes() ?>>
			<span id="el_lab_test_result_LabCD" class="ew-search-field">
<input type="text" data-table="lab_test_result" data-field="x_LabCD" name="x_LabCD" id="x_LabCD" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($lab_test_result_search->LabCD->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_search->LabCD->EditValue ?>"<?php echo $lab_test_result_search->LabCD->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result_search->OutLabAmt->Visible) { // OutLabAmt ?>
	<div id="r_OutLabAmt" class="form-group row">
		<label for="x_OutLabAmt" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_OutLabAmt"><?php echo $lab_test_result_search->OutLabAmt->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_OutLabAmt" id="z_OutLabAmt" value="=">
</span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div <?php echo $lab_test_result_search->OutLabAmt->cellAttributes() ?>>
			<span id="el_lab_test_result_OutLabAmt" class="ew-search-field">
<input type="text" data-table="lab_test_result" data-field="x_OutLabAmt" name="x_OutLabAmt" id="x_OutLabAmt" size="30" placeholder="<?php echo HtmlEncode($lab_test_result_search->OutLabAmt->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_search->OutLabAmt->EditValue ?>"<?php echo $lab_test_result_search->OutLabAmt->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result_search->ProductQty->Visible) { // ProductQty ?>
	<div id="r_ProductQty" class="form-group row">
		<label for="x_ProductQty" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_ProductQty"><?php echo $lab_test_result_search->ProductQty->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_ProductQty" id="z_ProductQty" value="=">
</span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div <?php echo $lab_test_result_search->ProductQty->cellAttributes() ?>>
			<span id="el_lab_test_result_ProductQty" class="ew-search-field">
<input type="text" data-table="lab_test_result" data-field="x_ProductQty" name="x_ProductQty" id="x_ProductQty" size="30" placeholder="<?php echo HtmlEncode($lab_test_result_search->ProductQty->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_search->ProductQty->EditValue ?>"<?php echo $lab_test_result_search->ProductQty->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result_search->Repeat->Visible) { // Repeat ?>
	<div id="r_Repeat" class="form-group row">
		<label for="x_Repeat" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_Repeat"><?php echo $lab_test_result_search->Repeat->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Repeat" id="z_Repeat" value="LIKE">
</span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div <?php echo $lab_test_result_search->Repeat->cellAttributes() ?>>
			<span id="el_lab_test_result_Repeat" class="ew-search-field">
<input type="text" data-table="lab_test_result" data-field="x_Repeat" name="x_Repeat" id="x_Repeat" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result_search->Repeat->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_search->Repeat->EditValue ?>"<?php echo $lab_test_result_search->Repeat->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result_search->DeptNo->Visible) { // DeptNo ?>
	<div id="r_DeptNo" class="form-group row">
		<label for="x_DeptNo" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_DeptNo"><?php echo $lab_test_result_search->DeptNo->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DeptNo" id="z_DeptNo" value="LIKE">
</span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div <?php echo $lab_test_result_search->DeptNo->cellAttributes() ?>>
			<span id="el_lab_test_result_DeptNo" class="ew-search-field">
<input type="text" data-table="lab_test_result" data-field="x_DeptNo" name="x_DeptNo" id="x_DeptNo" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($lab_test_result_search->DeptNo->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_search->DeptNo->EditValue ?>"<?php echo $lab_test_result_search->DeptNo->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result_search->Desc1->Visible) { // Desc1 ?>
	<div id="r_Desc1" class="form-group row">
		<label for="x_Desc1" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_Desc1"><?php echo $lab_test_result_search->Desc1->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Desc1" id="z_Desc1" value="LIKE">
</span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div <?php echo $lab_test_result_search->Desc1->cellAttributes() ?>>
			<span id="el_lab_test_result_Desc1" class="ew-search-field">
<input type="text" data-table="lab_test_result" data-field="x_Desc1" name="x_Desc1" id="x_Desc1" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($lab_test_result_search->Desc1->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_search->Desc1->EditValue ?>"<?php echo $lab_test_result_search->Desc1->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result_search->Desc2->Visible) { // Desc2 ?>
	<div id="r_Desc2" class="form-group row">
		<label for="x_Desc2" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_Desc2"><?php echo $lab_test_result_search->Desc2->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Desc2" id="z_Desc2" value="LIKE">
</span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div <?php echo $lab_test_result_search->Desc2->cellAttributes() ?>>
			<span id="el_lab_test_result_Desc2" class="ew-search-field">
<input type="text" data-table="lab_test_result" data-field="x_Desc2" name="x_Desc2" id="x_Desc2" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($lab_test_result_search->Desc2->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_search->Desc2->EditValue ?>"<?php echo $lab_test_result_search->Desc2->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result_search->RptResult->Visible) { // RptResult ?>
	<div id="r_RptResult" class="form-group row">
		<label for="x_RptResult" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_RptResult"><?php echo $lab_test_result_search->RptResult->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_RptResult" id="z_RptResult" value="LIKE">
</span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div <?php echo $lab_test_result_search->RptResult->cellAttributes() ?>>
			<span id="el_lab_test_result_RptResult" class="ew-search-field">
<input type="text" data-table="lab_test_result" data-field="x_RptResult" name="x_RptResult" id="x_RptResult" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($lab_test_result_search->RptResult->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_search->RptResult->EditValue ?>"<?php echo $lab_test_result_search->RptResult->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$lab_test_result_search->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $lab_test_result_search->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("Search") ?></button>
<button class="btn btn-default ew-btn" name="btn-reset" id="btn-reset" type="button" onclick="ew.clearForm(this.form);"><?php echo $Language->phrase("Reset") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$lab_test_result_search->showPageFooter();
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
$lab_test_result_search->terminate();
?>