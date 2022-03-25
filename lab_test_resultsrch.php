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
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "search";
<?php if ($lab_test_result_search->IsModal) { ?>
var flab_test_resultsearch = currentAdvancedSearchForm = new ew.Form("flab_test_resultsearch", "search");
<?php } else { ?>
var flab_test_resultsearch = currentForm = new ew.Form("flab_test_resultsearch", "search");
<?php } ?>

// Form_CustomValidate event
flab_test_resultsearch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
flab_test_resultsearch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search
// Validate function for search

flab_test_resultsearch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_SidDate");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($lab_test_result->SidDate->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_ResultDate");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($lab_test_result->ResultDate->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_Amount");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($lab_test_result->Amount->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_AuthDate");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($lab_test_result->AuthDate->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_ResDate");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($lab_test_result->ResDate->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_SampleDate");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($lab_test_result->SampleDate->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_ReceivedDate");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($lab_test_result->ReceivedDate->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_DeptRecvDate");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($lab_test_result->DeptRecvDate->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_PrintDate");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($lab_test_result->PrintDate->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_Tariff");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($lab_test_result->Tariff->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_EDITDATE");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($lab_test_result->EDITDATE->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_SAuthDate");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($lab_test_result->SAuthDate->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_DispDt");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($lab_test_result->DispDt->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_Nos");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($lab_test_result->Nos->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_ActualAmt");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($lab_test_result->ActualAmt->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_ReadTime");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($lab_test_result->ReadTime->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_OutLabAmt");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($lab_test_result->OutLabAmt->errorMessage()) ?>");
	elm = this.getElements("x" + infix + "_ProductQty");
	if (elm && !ew.checkNumber(elm.value))
		return this.onError(elm, "<?php echo JsEncode($lab_test_result->ProductQty->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $lab_test_result_search->showPageHeader(); ?>
<?php
$lab_test_result_search->showMessage();
?>
<form name="flab_test_resultsearch" id="flab_test_resultsearch" class="<?php echo $lab_test_result_search->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($lab_test_result_search->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $lab_test_result_search->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_test_result">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?php echo (int)$lab_test_result_search->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($lab_test_result->Branch->Visible) { // Branch ?>
	<div id="r_Branch" class="form-group row">
		<label for="x_Branch" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_Branch"><?php echo $lab_test_result->Branch->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Branch" id="z_Branch" value="LIKE"></span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div<?php echo $lab_test_result->Branch->cellAttributes() ?>>
			<span id="el_lab_test_result_Branch">
<input type="text" data-table="lab_test_result" data-field="x_Branch" name="x_Branch" id="x_Branch" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($lab_test_result->Branch->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->Branch->EditValue ?>"<?php echo $lab_test_result->Branch->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->SidNo->Visible) { // SidNo ?>
	<div id="r_SidNo" class="form-group row">
		<label for="x_SidNo" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_SidNo"><?php echo $lab_test_result->SidNo->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_SidNo" id="z_SidNo" value="LIKE"></span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div<?php echo $lab_test_result->SidNo->cellAttributes() ?>>
			<span id="el_lab_test_result_SidNo">
<input type="text" data-table="lab_test_result" data-field="x_SidNo" name="x_SidNo" id="x_SidNo" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($lab_test_result->SidNo->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->SidNo->EditValue ?>"<?php echo $lab_test_result->SidNo->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->SidDate->Visible) { // SidDate ?>
	<div id="r_SidDate" class="form-group row">
		<label for="x_SidDate" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_SidDate"><?php echo $lab_test_result->SidDate->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_SidDate" id="z_SidDate" value="="></span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div<?php echo $lab_test_result->SidDate->cellAttributes() ?>>
			<span id="el_lab_test_result_SidDate">
<input type="text" data-table="lab_test_result" data-field="x_SidDate" name="x_SidDate" id="x_SidDate" placeholder="<?php echo HtmlEncode($lab_test_result->SidDate->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->SidDate->EditValue ?>"<?php echo $lab_test_result->SidDate->editAttributes() ?>>
<?php if (!$lab_test_result->SidDate->ReadOnly && !$lab_test_result->SidDate->Disabled && !isset($lab_test_result->SidDate->EditAttrs["readonly"]) && !isset($lab_test_result->SidDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("flab_test_resultsearch", "x_SidDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->TestCd->Visible) { // TestCd ?>
	<div id="r_TestCd" class="form-group row">
		<label for="x_TestCd" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_TestCd"><?php echo $lab_test_result->TestCd->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_TestCd" id="z_TestCd" value="LIKE"></span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div<?php echo $lab_test_result->TestCd->cellAttributes() ?>>
			<span id="el_lab_test_result_TestCd">
<input type="text" data-table="lab_test_result" data-field="x_TestCd" name="x_TestCd" id="x_TestCd" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($lab_test_result->TestCd->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->TestCd->EditValue ?>"<?php echo $lab_test_result->TestCd->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->TestSubCd->Visible) { // TestSubCd ?>
	<div id="r_TestSubCd" class="form-group row">
		<label for="x_TestSubCd" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_TestSubCd"><?php echo $lab_test_result->TestSubCd->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_TestSubCd" id="z_TestSubCd" value="LIKE"></span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div<?php echo $lab_test_result->TestSubCd->cellAttributes() ?>>
			<span id="el_lab_test_result_TestSubCd">
<input type="text" data-table="lab_test_result" data-field="x_TestSubCd" name="x_TestSubCd" id="x_TestSubCd" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($lab_test_result->TestSubCd->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->TestSubCd->EditValue ?>"<?php echo $lab_test_result->TestSubCd->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->DEptCd->Visible) { // DEptCd ?>
	<div id="r_DEptCd" class="form-group row">
		<label for="x_DEptCd" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_DEptCd"><?php echo $lab_test_result->DEptCd->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_DEptCd" id="z_DEptCd" value="LIKE"></span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div<?php echo $lab_test_result->DEptCd->cellAttributes() ?>>
			<span id="el_lab_test_result_DEptCd">
<input type="text" data-table="lab_test_result" data-field="x_DEptCd" name="x_DEptCd" id="x_DEptCd" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($lab_test_result->DEptCd->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->DEptCd->EditValue ?>"<?php echo $lab_test_result->DEptCd->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->ProfCd->Visible) { // ProfCd ?>
	<div id="r_ProfCd" class="form-group row">
		<label for="x_ProfCd" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_ProfCd"><?php echo $lab_test_result->ProfCd->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_ProfCd" id="z_ProfCd" value="LIKE"></span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div<?php echo $lab_test_result->ProfCd->cellAttributes() ?>>
			<span id="el_lab_test_result_ProfCd">
<input type="text" data-table="lab_test_result" data-field="x_ProfCd" name="x_ProfCd" id="x_ProfCd" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($lab_test_result->ProfCd->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->ProfCd->EditValue ?>"<?php echo $lab_test_result->ProfCd->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->LabReport->Visible) { // LabReport ?>
	<div id="r_LabReport" class="form-group row">
		<label for="x_LabReport" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_LabReport"><?php echo $lab_test_result->LabReport->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_LabReport" id="z_LabReport" value="LIKE"></span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div<?php echo $lab_test_result->LabReport->cellAttributes() ?>>
			<span id="el_lab_test_result_LabReport">
<input type="text" data-table="lab_test_result" data-field="x_LabReport" name="x_LabReport" id="x_LabReport" size="35" placeholder="<?php echo HtmlEncode($lab_test_result->LabReport->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->LabReport->EditValue ?>"<?php echo $lab_test_result->LabReport->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->ResultDate->Visible) { // ResultDate ?>
	<div id="r_ResultDate" class="form-group row">
		<label for="x_ResultDate" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_ResultDate"><?php echo $lab_test_result->ResultDate->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_ResultDate" id="z_ResultDate" value="="></span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div<?php echo $lab_test_result->ResultDate->cellAttributes() ?>>
			<span id="el_lab_test_result_ResultDate">
<input type="text" data-table="lab_test_result" data-field="x_ResultDate" name="x_ResultDate" id="x_ResultDate" placeholder="<?php echo HtmlEncode($lab_test_result->ResultDate->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->ResultDate->EditValue ?>"<?php echo $lab_test_result->ResultDate->editAttributes() ?>>
<?php if (!$lab_test_result->ResultDate->ReadOnly && !$lab_test_result->ResultDate->Disabled && !isset($lab_test_result->ResultDate->EditAttrs["readonly"]) && !isset($lab_test_result->ResultDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("flab_test_resultsearch", "x_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->Comments->Visible) { // Comments ?>
	<div id="r_Comments" class="form-group row">
		<label for="x_Comments" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_Comments"><?php echo $lab_test_result->Comments->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Comments" id="z_Comments" value="LIKE"></span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div<?php echo $lab_test_result->Comments->cellAttributes() ?>>
			<span id="el_lab_test_result_Comments">
<input type="text" data-table="lab_test_result" data-field="x_Comments" name="x_Comments" id="x_Comments" size="35" placeholder="<?php echo HtmlEncode($lab_test_result->Comments->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->Comments->EditValue ?>"<?php echo $lab_test_result->Comments->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->Method->Visible) { // Method ?>
	<div id="r_Method" class="form-group row">
		<label for="x_Method" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_Method"><?php echo $lab_test_result->Method->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Method" id="z_Method" value="LIKE"></span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div<?php echo $lab_test_result->Method->cellAttributes() ?>>
			<span id="el_lab_test_result_Method">
<input type="text" data-table="lab_test_result" data-field="x_Method" name="x_Method" id="x_Method" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($lab_test_result->Method->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->Method->EditValue ?>"<?php echo $lab_test_result->Method->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->Specimen->Visible) { // Specimen ?>
	<div id="r_Specimen" class="form-group row">
		<label for="x_Specimen" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_Specimen"><?php echo $lab_test_result->Specimen->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Specimen" id="z_Specimen" value="LIKE"></span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div<?php echo $lab_test_result->Specimen->cellAttributes() ?>>
			<span id="el_lab_test_result_Specimen">
<input type="text" data-table="lab_test_result" data-field="x_Specimen" name="x_Specimen" id="x_Specimen" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($lab_test_result->Specimen->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->Specimen->EditValue ?>"<?php echo $lab_test_result->Specimen->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->Amount->Visible) { // Amount ?>
	<div id="r_Amount" class="form-group row">
		<label for="x_Amount" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_Amount"><?php echo $lab_test_result->Amount->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_Amount" id="z_Amount" value="="></span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div<?php echo $lab_test_result->Amount->cellAttributes() ?>>
			<span id="el_lab_test_result_Amount">
<input type="text" data-table="lab_test_result" data-field="x_Amount" name="x_Amount" id="x_Amount" size="30" placeholder="<?php echo HtmlEncode($lab_test_result->Amount->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->Amount->EditValue ?>"<?php echo $lab_test_result->Amount->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->ResultBy->Visible) { // ResultBy ?>
	<div id="r_ResultBy" class="form-group row">
		<label for="x_ResultBy" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_ResultBy"><?php echo $lab_test_result->ResultBy->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_ResultBy" id="z_ResultBy" value="LIKE"></span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div<?php echo $lab_test_result->ResultBy->cellAttributes() ?>>
			<span id="el_lab_test_result_ResultBy">
<input type="text" data-table="lab_test_result" data-field="x_ResultBy" name="x_ResultBy" id="x_ResultBy" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($lab_test_result->ResultBy->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->ResultBy->EditValue ?>"<?php echo $lab_test_result->ResultBy->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->AuthBy->Visible) { // AuthBy ?>
	<div id="r_AuthBy" class="form-group row">
		<label for="x_AuthBy" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_AuthBy"><?php echo $lab_test_result->AuthBy->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_AuthBy" id="z_AuthBy" value="LIKE"></span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div<?php echo $lab_test_result->AuthBy->cellAttributes() ?>>
			<span id="el_lab_test_result_AuthBy">
<input type="text" data-table="lab_test_result" data-field="x_AuthBy" name="x_AuthBy" id="x_AuthBy" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($lab_test_result->AuthBy->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->AuthBy->EditValue ?>"<?php echo $lab_test_result->AuthBy->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->AuthDate->Visible) { // AuthDate ?>
	<div id="r_AuthDate" class="form-group row">
		<label for="x_AuthDate" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_AuthDate"><?php echo $lab_test_result->AuthDate->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_AuthDate" id="z_AuthDate" value="="></span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div<?php echo $lab_test_result->AuthDate->cellAttributes() ?>>
			<span id="el_lab_test_result_AuthDate">
<input type="text" data-table="lab_test_result" data-field="x_AuthDate" name="x_AuthDate" id="x_AuthDate" placeholder="<?php echo HtmlEncode($lab_test_result->AuthDate->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->AuthDate->EditValue ?>"<?php echo $lab_test_result->AuthDate->editAttributes() ?>>
<?php if (!$lab_test_result->AuthDate->ReadOnly && !$lab_test_result->AuthDate->Disabled && !isset($lab_test_result->AuthDate->EditAttrs["readonly"]) && !isset($lab_test_result->AuthDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("flab_test_resultsearch", "x_AuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->Abnormal->Visible) { // Abnormal ?>
	<div id="r_Abnormal" class="form-group row">
		<label for="x_Abnormal" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_Abnormal"><?php echo $lab_test_result->Abnormal->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Abnormal" id="z_Abnormal" value="LIKE"></span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div<?php echo $lab_test_result->Abnormal->cellAttributes() ?>>
			<span id="el_lab_test_result_Abnormal">
<input type="text" data-table="lab_test_result" data-field="x_Abnormal" name="x_Abnormal" id="x_Abnormal" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result->Abnormal->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->Abnormal->EditValue ?>"<?php echo $lab_test_result->Abnormal->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->Printed->Visible) { // Printed ?>
	<div id="r_Printed" class="form-group row">
		<label for="x_Printed" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_Printed"><?php echo $lab_test_result->Printed->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Printed" id="z_Printed" value="LIKE"></span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div<?php echo $lab_test_result->Printed->cellAttributes() ?>>
			<span id="el_lab_test_result_Printed">
<input type="text" data-table="lab_test_result" data-field="x_Printed" name="x_Printed" id="x_Printed" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result->Printed->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->Printed->EditValue ?>"<?php echo $lab_test_result->Printed->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->Dispatch->Visible) { // Dispatch ?>
	<div id="r_Dispatch" class="form-group row">
		<label for="x_Dispatch" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_Dispatch"><?php echo $lab_test_result->Dispatch->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Dispatch" id="z_Dispatch" value="LIKE"></span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div<?php echo $lab_test_result->Dispatch->cellAttributes() ?>>
			<span id="el_lab_test_result_Dispatch">
<input type="text" data-table="lab_test_result" data-field="x_Dispatch" name="x_Dispatch" id="x_Dispatch" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result->Dispatch->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->Dispatch->EditValue ?>"<?php echo $lab_test_result->Dispatch->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->LOWHIGH->Visible) { // LOWHIGH ?>
	<div id="r_LOWHIGH" class="form-group row">
		<label for="x_LOWHIGH" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_LOWHIGH"><?php echo $lab_test_result->LOWHIGH->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_LOWHIGH" id="z_LOWHIGH" value="LIKE"></span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div<?php echo $lab_test_result->LOWHIGH->cellAttributes() ?>>
			<span id="el_lab_test_result_LOWHIGH">
<input type="text" data-table="lab_test_result" data-field="x_LOWHIGH" name="x_LOWHIGH" id="x_LOWHIGH" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result->LOWHIGH->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->LOWHIGH->EditValue ?>"<?php echo $lab_test_result->LOWHIGH->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->RefValue->Visible) { // RefValue ?>
	<div id="r_RefValue" class="form-group row">
		<label for="x_RefValue" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_RefValue"><?php echo $lab_test_result->RefValue->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_RefValue" id="z_RefValue" value="LIKE"></span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div<?php echo $lab_test_result->RefValue->cellAttributes() ?>>
			<span id="el_lab_test_result_RefValue">
<input type="text" data-table="lab_test_result" data-field="x_RefValue" name="x_RefValue" id="x_RefValue" size="35" placeholder="<?php echo HtmlEncode($lab_test_result->RefValue->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->RefValue->EditValue ?>"<?php echo $lab_test_result->RefValue->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->Unit->Visible) { // Unit ?>
	<div id="r_Unit" class="form-group row">
		<label for="x_Unit" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_Unit"><?php echo $lab_test_result->Unit->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Unit" id="z_Unit" value="LIKE"></span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div<?php echo $lab_test_result->Unit->cellAttributes() ?>>
			<span id="el_lab_test_result_Unit">
<input type="text" data-table="lab_test_result" data-field="x_Unit" name="x_Unit" id="x_Unit" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($lab_test_result->Unit->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->Unit->EditValue ?>"<?php echo $lab_test_result->Unit->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->ResDate->Visible) { // ResDate ?>
	<div id="r_ResDate" class="form-group row">
		<label for="x_ResDate" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_ResDate"><?php echo $lab_test_result->ResDate->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_ResDate" id="z_ResDate" value="="></span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div<?php echo $lab_test_result->ResDate->cellAttributes() ?>>
			<span id="el_lab_test_result_ResDate">
<input type="text" data-table="lab_test_result" data-field="x_ResDate" name="x_ResDate" id="x_ResDate" placeholder="<?php echo HtmlEncode($lab_test_result->ResDate->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->ResDate->EditValue ?>"<?php echo $lab_test_result->ResDate->editAttributes() ?>>
<?php if (!$lab_test_result->ResDate->ReadOnly && !$lab_test_result->ResDate->Disabled && !isset($lab_test_result->ResDate->EditAttrs["readonly"]) && !isset($lab_test_result->ResDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("flab_test_resultsearch", "x_ResDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->Pic1->Visible) { // Pic1 ?>
	<div id="r_Pic1" class="form-group row">
		<label for="x_Pic1" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_Pic1"><?php echo $lab_test_result->Pic1->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Pic1" id="z_Pic1" value="LIKE"></span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div<?php echo $lab_test_result->Pic1->cellAttributes() ?>>
			<span id="el_lab_test_result_Pic1">
<input type="text" data-table="lab_test_result" data-field="x_Pic1" name="x_Pic1" id="x_Pic1" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($lab_test_result->Pic1->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->Pic1->EditValue ?>"<?php echo $lab_test_result->Pic1->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->Pic2->Visible) { // Pic2 ?>
	<div id="r_Pic2" class="form-group row">
		<label for="x_Pic2" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_Pic2"><?php echo $lab_test_result->Pic2->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Pic2" id="z_Pic2" value="LIKE"></span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div<?php echo $lab_test_result->Pic2->cellAttributes() ?>>
			<span id="el_lab_test_result_Pic2">
<input type="text" data-table="lab_test_result" data-field="x_Pic2" name="x_Pic2" id="x_Pic2" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($lab_test_result->Pic2->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->Pic2->EditValue ?>"<?php echo $lab_test_result->Pic2->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->GraphPath->Visible) { // GraphPath ?>
	<div id="r_GraphPath" class="form-group row">
		<label for="x_GraphPath" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_GraphPath"><?php echo $lab_test_result->GraphPath->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_GraphPath" id="z_GraphPath" value="LIKE"></span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div<?php echo $lab_test_result->GraphPath->cellAttributes() ?>>
			<span id="el_lab_test_result_GraphPath">
<input type="text" data-table="lab_test_result" data-field="x_GraphPath" name="x_GraphPath" id="x_GraphPath" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($lab_test_result->GraphPath->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->GraphPath->EditValue ?>"<?php echo $lab_test_result->GraphPath->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->SampleDate->Visible) { // SampleDate ?>
	<div id="r_SampleDate" class="form-group row">
		<label for="x_SampleDate" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_SampleDate"><?php echo $lab_test_result->SampleDate->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_SampleDate" id="z_SampleDate" value="="></span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div<?php echo $lab_test_result->SampleDate->cellAttributes() ?>>
			<span id="el_lab_test_result_SampleDate">
<input type="text" data-table="lab_test_result" data-field="x_SampleDate" name="x_SampleDate" id="x_SampleDate" placeholder="<?php echo HtmlEncode($lab_test_result->SampleDate->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->SampleDate->EditValue ?>"<?php echo $lab_test_result->SampleDate->editAttributes() ?>>
<?php if (!$lab_test_result->SampleDate->ReadOnly && !$lab_test_result->SampleDate->Disabled && !isset($lab_test_result->SampleDate->EditAttrs["readonly"]) && !isset($lab_test_result->SampleDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("flab_test_resultsearch", "x_SampleDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->SampleUser->Visible) { // SampleUser ?>
	<div id="r_SampleUser" class="form-group row">
		<label for="x_SampleUser" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_SampleUser"><?php echo $lab_test_result->SampleUser->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_SampleUser" id="z_SampleUser" value="LIKE"></span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div<?php echo $lab_test_result->SampleUser->cellAttributes() ?>>
			<span id="el_lab_test_result_SampleUser">
<input type="text" data-table="lab_test_result" data-field="x_SampleUser" name="x_SampleUser" id="x_SampleUser" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($lab_test_result->SampleUser->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->SampleUser->EditValue ?>"<?php echo $lab_test_result->SampleUser->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->ReceivedDate->Visible) { // ReceivedDate ?>
	<div id="r_ReceivedDate" class="form-group row">
		<label for="x_ReceivedDate" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_ReceivedDate"><?php echo $lab_test_result->ReceivedDate->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_ReceivedDate" id="z_ReceivedDate" value="="></span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div<?php echo $lab_test_result->ReceivedDate->cellAttributes() ?>>
			<span id="el_lab_test_result_ReceivedDate">
<input type="text" data-table="lab_test_result" data-field="x_ReceivedDate" name="x_ReceivedDate" id="x_ReceivedDate" placeholder="<?php echo HtmlEncode($lab_test_result->ReceivedDate->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->ReceivedDate->EditValue ?>"<?php echo $lab_test_result->ReceivedDate->editAttributes() ?>>
<?php if (!$lab_test_result->ReceivedDate->ReadOnly && !$lab_test_result->ReceivedDate->Disabled && !isset($lab_test_result->ReceivedDate->EditAttrs["readonly"]) && !isset($lab_test_result->ReceivedDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("flab_test_resultsearch", "x_ReceivedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->ReceivedUser->Visible) { // ReceivedUser ?>
	<div id="r_ReceivedUser" class="form-group row">
		<label for="x_ReceivedUser" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_ReceivedUser"><?php echo $lab_test_result->ReceivedUser->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_ReceivedUser" id="z_ReceivedUser" value="LIKE"></span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div<?php echo $lab_test_result->ReceivedUser->cellAttributes() ?>>
			<span id="el_lab_test_result_ReceivedUser">
<input type="text" data-table="lab_test_result" data-field="x_ReceivedUser" name="x_ReceivedUser" id="x_ReceivedUser" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($lab_test_result->ReceivedUser->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->ReceivedUser->EditValue ?>"<?php echo $lab_test_result->ReceivedUser->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->DeptRecvDate->Visible) { // DeptRecvDate ?>
	<div id="r_DeptRecvDate" class="form-group row">
		<label for="x_DeptRecvDate" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_DeptRecvDate"><?php echo $lab_test_result->DeptRecvDate->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_DeptRecvDate" id="z_DeptRecvDate" value="="></span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div<?php echo $lab_test_result->DeptRecvDate->cellAttributes() ?>>
			<span id="el_lab_test_result_DeptRecvDate">
<input type="text" data-table="lab_test_result" data-field="x_DeptRecvDate" name="x_DeptRecvDate" id="x_DeptRecvDate" placeholder="<?php echo HtmlEncode($lab_test_result->DeptRecvDate->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->DeptRecvDate->EditValue ?>"<?php echo $lab_test_result->DeptRecvDate->editAttributes() ?>>
<?php if (!$lab_test_result->DeptRecvDate->ReadOnly && !$lab_test_result->DeptRecvDate->Disabled && !isset($lab_test_result->DeptRecvDate->EditAttrs["readonly"]) && !isset($lab_test_result->DeptRecvDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("flab_test_resultsearch", "x_DeptRecvDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->DeptRecvUser->Visible) { // DeptRecvUser ?>
	<div id="r_DeptRecvUser" class="form-group row">
		<label for="x_DeptRecvUser" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_DeptRecvUser"><?php echo $lab_test_result->DeptRecvUser->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_DeptRecvUser" id="z_DeptRecvUser" value="LIKE"></span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div<?php echo $lab_test_result->DeptRecvUser->cellAttributes() ?>>
			<span id="el_lab_test_result_DeptRecvUser">
<input type="text" data-table="lab_test_result" data-field="x_DeptRecvUser" name="x_DeptRecvUser" id="x_DeptRecvUser" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($lab_test_result->DeptRecvUser->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->DeptRecvUser->EditValue ?>"<?php echo $lab_test_result->DeptRecvUser->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->PrintBy->Visible) { // PrintBy ?>
	<div id="r_PrintBy" class="form-group row">
		<label for="x_PrintBy" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_PrintBy"><?php echo $lab_test_result->PrintBy->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PrintBy" id="z_PrintBy" value="LIKE"></span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div<?php echo $lab_test_result->PrintBy->cellAttributes() ?>>
			<span id="el_lab_test_result_PrintBy">
<input type="text" data-table="lab_test_result" data-field="x_PrintBy" name="x_PrintBy" id="x_PrintBy" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($lab_test_result->PrintBy->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->PrintBy->EditValue ?>"<?php echo $lab_test_result->PrintBy->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->PrintDate->Visible) { // PrintDate ?>
	<div id="r_PrintDate" class="form-group row">
		<label for="x_PrintDate" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_PrintDate"><?php echo $lab_test_result->PrintDate->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_PrintDate" id="z_PrintDate" value="="></span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div<?php echo $lab_test_result->PrintDate->cellAttributes() ?>>
			<span id="el_lab_test_result_PrintDate">
<input type="text" data-table="lab_test_result" data-field="x_PrintDate" name="x_PrintDate" id="x_PrintDate" placeholder="<?php echo HtmlEncode($lab_test_result->PrintDate->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->PrintDate->EditValue ?>"<?php echo $lab_test_result->PrintDate->editAttributes() ?>>
<?php if (!$lab_test_result->PrintDate->ReadOnly && !$lab_test_result->PrintDate->Disabled && !isset($lab_test_result->PrintDate->EditAttrs["readonly"]) && !isset($lab_test_result->PrintDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("flab_test_resultsearch", "x_PrintDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->MachineCD->Visible) { // MachineCD ?>
	<div id="r_MachineCD" class="form-group row">
		<label for="x_MachineCD" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_MachineCD"><?php echo $lab_test_result->MachineCD->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_MachineCD" id="z_MachineCD" value="LIKE"></span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div<?php echo $lab_test_result->MachineCD->cellAttributes() ?>>
			<span id="el_lab_test_result_MachineCD">
<input type="text" data-table="lab_test_result" data-field="x_MachineCD" name="x_MachineCD" id="x_MachineCD" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($lab_test_result->MachineCD->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->MachineCD->EditValue ?>"<?php echo $lab_test_result->MachineCD->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->TestCancel->Visible) { // TestCancel ?>
	<div id="r_TestCancel" class="form-group row">
		<label for="x_TestCancel" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_TestCancel"><?php echo $lab_test_result->TestCancel->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_TestCancel" id="z_TestCancel" value="LIKE"></span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div<?php echo $lab_test_result->TestCancel->cellAttributes() ?>>
			<span id="el_lab_test_result_TestCancel">
<input type="text" data-table="lab_test_result" data-field="x_TestCancel" name="x_TestCancel" id="x_TestCancel" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result->TestCancel->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->TestCancel->EditValue ?>"<?php echo $lab_test_result->TestCancel->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->OutSource->Visible) { // OutSource ?>
	<div id="r_OutSource" class="form-group row">
		<label for="x_OutSource" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_OutSource"><?php echo $lab_test_result->OutSource->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_OutSource" id="z_OutSource" value="LIKE"></span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div<?php echo $lab_test_result->OutSource->cellAttributes() ?>>
			<span id="el_lab_test_result_OutSource">
<input type="text" data-table="lab_test_result" data-field="x_OutSource" name="x_OutSource" id="x_OutSource" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result->OutSource->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->OutSource->EditValue ?>"<?php echo $lab_test_result->OutSource->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->Tariff->Visible) { // Tariff ?>
	<div id="r_Tariff" class="form-group row">
		<label for="x_Tariff" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_Tariff"><?php echo $lab_test_result->Tariff->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_Tariff" id="z_Tariff" value="="></span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div<?php echo $lab_test_result->Tariff->cellAttributes() ?>>
			<span id="el_lab_test_result_Tariff">
<input type="text" data-table="lab_test_result" data-field="x_Tariff" name="x_Tariff" id="x_Tariff" size="30" placeholder="<?php echo HtmlEncode($lab_test_result->Tariff->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->Tariff->EditValue ?>"<?php echo $lab_test_result->Tariff->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->EDITDATE->Visible) { // EDITDATE ?>
	<div id="r_EDITDATE" class="form-group row">
		<label for="x_EDITDATE" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_EDITDATE"><?php echo $lab_test_result->EDITDATE->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_EDITDATE" id="z_EDITDATE" value="="></span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div<?php echo $lab_test_result->EDITDATE->cellAttributes() ?>>
			<span id="el_lab_test_result_EDITDATE">
<input type="text" data-table="lab_test_result" data-field="x_EDITDATE" name="x_EDITDATE" id="x_EDITDATE" placeholder="<?php echo HtmlEncode($lab_test_result->EDITDATE->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->EDITDATE->EditValue ?>"<?php echo $lab_test_result->EDITDATE->editAttributes() ?>>
<?php if (!$lab_test_result->EDITDATE->ReadOnly && !$lab_test_result->EDITDATE->Disabled && !isset($lab_test_result->EDITDATE->EditAttrs["readonly"]) && !isset($lab_test_result->EDITDATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("flab_test_resultsearch", "x_EDITDATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->UPLOAD->Visible) { // UPLOAD ?>
	<div id="r_UPLOAD" class="form-group row">
		<label for="x_UPLOAD" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_UPLOAD"><?php echo $lab_test_result->UPLOAD->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_UPLOAD" id="z_UPLOAD" value="LIKE"></span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div<?php echo $lab_test_result->UPLOAD->cellAttributes() ?>>
			<span id="el_lab_test_result_UPLOAD">
<input type="text" data-table="lab_test_result" data-field="x_UPLOAD" name="x_UPLOAD" id="x_UPLOAD" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result->UPLOAD->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->UPLOAD->EditValue ?>"<?php echo $lab_test_result->UPLOAD->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->SAuthDate->Visible) { // SAuthDate ?>
	<div id="r_SAuthDate" class="form-group row">
		<label for="x_SAuthDate" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_SAuthDate"><?php echo $lab_test_result->SAuthDate->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_SAuthDate" id="z_SAuthDate" value="="></span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div<?php echo $lab_test_result->SAuthDate->cellAttributes() ?>>
			<span id="el_lab_test_result_SAuthDate">
<input type="text" data-table="lab_test_result" data-field="x_SAuthDate" name="x_SAuthDate" id="x_SAuthDate" placeholder="<?php echo HtmlEncode($lab_test_result->SAuthDate->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->SAuthDate->EditValue ?>"<?php echo $lab_test_result->SAuthDate->editAttributes() ?>>
<?php if (!$lab_test_result->SAuthDate->ReadOnly && !$lab_test_result->SAuthDate->Disabled && !isset($lab_test_result->SAuthDate->EditAttrs["readonly"]) && !isset($lab_test_result->SAuthDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("flab_test_resultsearch", "x_SAuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->SAuthBy->Visible) { // SAuthBy ?>
	<div id="r_SAuthBy" class="form-group row">
		<label for="x_SAuthBy" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_SAuthBy"><?php echo $lab_test_result->SAuthBy->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_SAuthBy" id="z_SAuthBy" value="LIKE"></span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div<?php echo $lab_test_result->SAuthBy->cellAttributes() ?>>
			<span id="el_lab_test_result_SAuthBy">
<input type="text" data-table="lab_test_result" data-field="x_SAuthBy" name="x_SAuthBy" id="x_SAuthBy" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($lab_test_result->SAuthBy->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->SAuthBy->EditValue ?>"<?php echo $lab_test_result->SAuthBy->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->NoRC->Visible) { // NoRC ?>
	<div id="r_NoRC" class="form-group row">
		<label for="x_NoRC" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_NoRC"><?php echo $lab_test_result->NoRC->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_NoRC" id="z_NoRC" value="LIKE"></span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div<?php echo $lab_test_result->NoRC->cellAttributes() ?>>
			<span id="el_lab_test_result_NoRC">
<input type="text" data-table="lab_test_result" data-field="x_NoRC" name="x_NoRC" id="x_NoRC" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result->NoRC->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->NoRC->EditValue ?>"<?php echo $lab_test_result->NoRC->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->DispDt->Visible) { // DispDt ?>
	<div id="r_DispDt" class="form-group row">
		<label for="x_DispDt" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_DispDt"><?php echo $lab_test_result->DispDt->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_DispDt" id="z_DispDt" value="="></span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div<?php echo $lab_test_result->DispDt->cellAttributes() ?>>
			<span id="el_lab_test_result_DispDt">
<input type="text" data-table="lab_test_result" data-field="x_DispDt" name="x_DispDt" id="x_DispDt" placeholder="<?php echo HtmlEncode($lab_test_result->DispDt->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->DispDt->EditValue ?>"<?php echo $lab_test_result->DispDt->editAttributes() ?>>
<?php if (!$lab_test_result->DispDt->ReadOnly && !$lab_test_result->DispDt->Disabled && !isset($lab_test_result->DispDt->EditAttrs["readonly"]) && !isset($lab_test_result->DispDt->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("flab_test_resultsearch", "x_DispDt", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->DispUser->Visible) { // DispUser ?>
	<div id="r_DispUser" class="form-group row">
		<label for="x_DispUser" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_DispUser"><?php echo $lab_test_result->DispUser->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_DispUser" id="z_DispUser" value="LIKE"></span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div<?php echo $lab_test_result->DispUser->cellAttributes() ?>>
			<span id="el_lab_test_result_DispUser">
<input type="text" data-table="lab_test_result" data-field="x_DispUser" name="x_DispUser" id="x_DispUser" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($lab_test_result->DispUser->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->DispUser->EditValue ?>"<?php echo $lab_test_result->DispUser->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->DispRemarks->Visible) { // DispRemarks ?>
	<div id="r_DispRemarks" class="form-group row">
		<label for="x_DispRemarks" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_DispRemarks"><?php echo $lab_test_result->DispRemarks->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_DispRemarks" id="z_DispRemarks" value="LIKE"></span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div<?php echo $lab_test_result->DispRemarks->cellAttributes() ?>>
			<span id="el_lab_test_result_DispRemarks">
<input type="text" data-table="lab_test_result" data-field="x_DispRemarks" name="x_DispRemarks" id="x_DispRemarks" size="30" maxlength="250" placeholder="<?php echo HtmlEncode($lab_test_result->DispRemarks->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->DispRemarks->EditValue ?>"<?php echo $lab_test_result->DispRemarks->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->DispMode->Visible) { // DispMode ?>
	<div id="r_DispMode" class="form-group row">
		<label for="x_DispMode" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_DispMode"><?php echo $lab_test_result->DispMode->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_DispMode" id="z_DispMode" value="LIKE"></span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div<?php echo $lab_test_result->DispMode->cellAttributes() ?>>
			<span id="el_lab_test_result_DispMode">
<input type="text" data-table="lab_test_result" data-field="x_DispMode" name="x_DispMode" id="x_DispMode" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($lab_test_result->DispMode->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->DispMode->EditValue ?>"<?php echo $lab_test_result->DispMode->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->ProductCD->Visible) { // ProductCD ?>
	<div id="r_ProductCD" class="form-group row">
		<label for="x_ProductCD" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_ProductCD"><?php echo $lab_test_result->ProductCD->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_ProductCD" id="z_ProductCD" value="LIKE"></span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div<?php echo $lab_test_result->ProductCD->cellAttributes() ?>>
			<span id="el_lab_test_result_ProductCD">
<input type="text" data-table="lab_test_result" data-field="x_ProductCD" name="x_ProductCD" id="x_ProductCD" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($lab_test_result->ProductCD->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->ProductCD->EditValue ?>"<?php echo $lab_test_result->ProductCD->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->Nos->Visible) { // Nos ?>
	<div id="r_Nos" class="form-group row">
		<label for="x_Nos" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_Nos"><?php echo $lab_test_result->Nos->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_Nos" id="z_Nos" value="="></span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div<?php echo $lab_test_result->Nos->cellAttributes() ?>>
			<span id="el_lab_test_result_Nos">
<input type="text" data-table="lab_test_result" data-field="x_Nos" name="x_Nos" id="x_Nos" size="30" placeholder="<?php echo HtmlEncode($lab_test_result->Nos->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->Nos->EditValue ?>"<?php echo $lab_test_result->Nos->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->WBCPath->Visible) { // WBCPath ?>
	<div id="r_WBCPath" class="form-group row">
		<label for="x_WBCPath" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_WBCPath"><?php echo $lab_test_result->WBCPath->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_WBCPath" id="z_WBCPath" value="LIKE"></span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div<?php echo $lab_test_result->WBCPath->cellAttributes() ?>>
			<span id="el_lab_test_result_WBCPath">
<input type="text" data-table="lab_test_result" data-field="x_WBCPath" name="x_WBCPath" id="x_WBCPath" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($lab_test_result->WBCPath->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->WBCPath->EditValue ?>"<?php echo $lab_test_result->WBCPath->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->RBCPath->Visible) { // RBCPath ?>
	<div id="r_RBCPath" class="form-group row">
		<label for="x_RBCPath" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_RBCPath"><?php echo $lab_test_result->RBCPath->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_RBCPath" id="z_RBCPath" value="LIKE"></span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div<?php echo $lab_test_result->RBCPath->cellAttributes() ?>>
			<span id="el_lab_test_result_RBCPath">
<input type="text" data-table="lab_test_result" data-field="x_RBCPath" name="x_RBCPath" id="x_RBCPath" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($lab_test_result->RBCPath->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->RBCPath->EditValue ?>"<?php echo $lab_test_result->RBCPath->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->PTPath->Visible) { // PTPath ?>
	<div id="r_PTPath" class="form-group row">
		<label for="x_PTPath" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_PTPath"><?php echo $lab_test_result->PTPath->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_PTPath" id="z_PTPath" value="LIKE"></span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div<?php echo $lab_test_result->PTPath->cellAttributes() ?>>
			<span id="el_lab_test_result_PTPath">
<input type="text" data-table="lab_test_result" data-field="x_PTPath" name="x_PTPath" id="x_PTPath" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($lab_test_result->PTPath->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->PTPath->EditValue ?>"<?php echo $lab_test_result->PTPath->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->ActualAmt->Visible) { // ActualAmt ?>
	<div id="r_ActualAmt" class="form-group row">
		<label for="x_ActualAmt" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_ActualAmt"><?php echo $lab_test_result->ActualAmt->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_ActualAmt" id="z_ActualAmt" value="="></span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div<?php echo $lab_test_result->ActualAmt->cellAttributes() ?>>
			<span id="el_lab_test_result_ActualAmt">
<input type="text" data-table="lab_test_result" data-field="x_ActualAmt" name="x_ActualAmt" id="x_ActualAmt" size="30" placeholder="<?php echo HtmlEncode($lab_test_result->ActualAmt->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->ActualAmt->EditValue ?>"<?php echo $lab_test_result->ActualAmt->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->NoSign->Visible) { // NoSign ?>
	<div id="r_NoSign" class="form-group row">
		<label for="x_NoSign" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_NoSign"><?php echo $lab_test_result->NoSign->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_NoSign" id="z_NoSign" value="LIKE"></span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div<?php echo $lab_test_result->NoSign->cellAttributes() ?>>
			<span id="el_lab_test_result_NoSign">
<input type="text" data-table="lab_test_result" data-field="x_NoSign" name="x_NoSign" id="x_NoSign" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result->NoSign->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->NoSign->EditValue ?>"<?php echo $lab_test_result->NoSign->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->_Barcode->Visible) { // Barcode ?>
	<div id="r__Barcode" class="form-group row">
		<label for="x__Barcode" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result__Barcode"><?php echo $lab_test_result->_Barcode->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z__Barcode" id="z__Barcode" value="LIKE"></span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div<?php echo $lab_test_result->_Barcode->cellAttributes() ?>>
			<span id="el_lab_test_result__Barcode">
<input type="text" data-table="lab_test_result" data-field="x__Barcode" name="x__Barcode" id="x__Barcode" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result->_Barcode->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->_Barcode->EditValue ?>"<?php echo $lab_test_result->_Barcode->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->ReadTime->Visible) { // ReadTime ?>
	<div id="r_ReadTime" class="form-group row">
		<label for="x_ReadTime" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_ReadTime"><?php echo $lab_test_result->ReadTime->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_ReadTime" id="z_ReadTime" value="="></span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div<?php echo $lab_test_result->ReadTime->cellAttributes() ?>>
			<span id="el_lab_test_result_ReadTime">
<input type="text" data-table="lab_test_result" data-field="x_ReadTime" name="x_ReadTime" id="x_ReadTime" placeholder="<?php echo HtmlEncode($lab_test_result->ReadTime->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->ReadTime->EditValue ?>"<?php echo $lab_test_result->ReadTime->editAttributes() ?>>
<?php if (!$lab_test_result->ReadTime->ReadOnly && !$lab_test_result->ReadTime->Disabled && !isset($lab_test_result->ReadTime->EditAttrs["readonly"]) && !isset($lab_test_result->ReadTime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("flab_test_resultsearch", "x_ReadTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->Result->Visible) { // Result ?>
	<div id="r_Result" class="form-group row">
		<label for="x_Result" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_Result"><?php echo $lab_test_result->Result->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Result" id="z_Result" value="LIKE"></span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div<?php echo $lab_test_result->Result->cellAttributes() ?>>
			<span id="el_lab_test_result_Result">
<input type="text" data-table="lab_test_result" data-field="x_Result" name="x_Result" id="x_Result" size="35" placeholder="<?php echo HtmlEncode($lab_test_result->Result->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->Result->EditValue ?>"<?php echo $lab_test_result->Result->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->VailID->Visible) { // VailID ?>
	<div id="r_VailID" class="form-group row">
		<label for="x_VailID" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_VailID"><?php echo $lab_test_result->VailID->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_VailID" id="z_VailID" value="LIKE"></span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div<?php echo $lab_test_result->VailID->cellAttributes() ?>>
			<span id="el_lab_test_result_VailID">
<input type="text" data-table="lab_test_result" data-field="x_VailID" name="x_VailID" id="x_VailID" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($lab_test_result->VailID->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->VailID->EditValue ?>"<?php echo $lab_test_result->VailID->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->ReadMachine->Visible) { // ReadMachine ?>
	<div id="r_ReadMachine" class="form-group row">
		<label for="x_ReadMachine" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_ReadMachine"><?php echo $lab_test_result->ReadMachine->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_ReadMachine" id="z_ReadMachine" value="LIKE"></span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div<?php echo $lab_test_result->ReadMachine->cellAttributes() ?>>
			<span id="el_lab_test_result_ReadMachine">
<input type="text" data-table="lab_test_result" data-field="x_ReadMachine" name="x_ReadMachine" id="x_ReadMachine" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($lab_test_result->ReadMachine->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->ReadMachine->EditValue ?>"<?php echo $lab_test_result->ReadMachine->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->LabCD->Visible) { // LabCD ?>
	<div id="r_LabCD" class="form-group row">
		<label for="x_LabCD" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_LabCD"><?php echo $lab_test_result->LabCD->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_LabCD" id="z_LabCD" value="LIKE"></span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div<?php echo $lab_test_result->LabCD->cellAttributes() ?>>
			<span id="el_lab_test_result_LabCD">
<input type="text" data-table="lab_test_result" data-field="x_LabCD" name="x_LabCD" id="x_LabCD" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($lab_test_result->LabCD->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->LabCD->EditValue ?>"<?php echo $lab_test_result->LabCD->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->OutLabAmt->Visible) { // OutLabAmt ?>
	<div id="r_OutLabAmt" class="form-group row">
		<label for="x_OutLabAmt" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_OutLabAmt"><?php echo $lab_test_result->OutLabAmt->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_OutLabAmt" id="z_OutLabAmt" value="="></span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div<?php echo $lab_test_result->OutLabAmt->cellAttributes() ?>>
			<span id="el_lab_test_result_OutLabAmt">
<input type="text" data-table="lab_test_result" data-field="x_OutLabAmt" name="x_OutLabAmt" id="x_OutLabAmt" size="30" placeholder="<?php echo HtmlEncode($lab_test_result->OutLabAmt->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->OutLabAmt->EditValue ?>"<?php echo $lab_test_result->OutLabAmt->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->ProductQty->Visible) { // ProductQty ?>
	<div id="r_ProductQty" class="form-group row">
		<label for="x_ProductQty" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_ProductQty"><?php echo $lab_test_result->ProductQty->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_ProductQty" id="z_ProductQty" value="="></span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div<?php echo $lab_test_result->ProductQty->cellAttributes() ?>>
			<span id="el_lab_test_result_ProductQty">
<input type="text" data-table="lab_test_result" data-field="x_ProductQty" name="x_ProductQty" id="x_ProductQty" size="30" placeholder="<?php echo HtmlEncode($lab_test_result->ProductQty->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->ProductQty->EditValue ?>"<?php echo $lab_test_result->ProductQty->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->Repeat->Visible) { // Repeat ?>
	<div id="r_Repeat" class="form-group row">
		<label for="x_Repeat" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_Repeat"><?php echo $lab_test_result->Repeat->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Repeat" id="z_Repeat" value="LIKE"></span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div<?php echo $lab_test_result->Repeat->cellAttributes() ?>>
			<span id="el_lab_test_result_Repeat">
<input type="text" data-table="lab_test_result" data-field="x_Repeat" name="x_Repeat" id="x_Repeat" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result->Repeat->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->Repeat->EditValue ?>"<?php echo $lab_test_result->Repeat->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->DeptNo->Visible) { // DeptNo ?>
	<div id="r_DeptNo" class="form-group row">
		<label for="x_DeptNo" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_DeptNo"><?php echo $lab_test_result->DeptNo->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_DeptNo" id="z_DeptNo" value="LIKE"></span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div<?php echo $lab_test_result->DeptNo->cellAttributes() ?>>
			<span id="el_lab_test_result_DeptNo">
<input type="text" data-table="lab_test_result" data-field="x_DeptNo" name="x_DeptNo" id="x_DeptNo" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($lab_test_result->DeptNo->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->DeptNo->EditValue ?>"<?php echo $lab_test_result->DeptNo->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->Desc1->Visible) { // Desc1 ?>
	<div id="r_Desc1" class="form-group row">
		<label for="x_Desc1" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_Desc1"><?php echo $lab_test_result->Desc1->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Desc1" id="z_Desc1" value="LIKE"></span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div<?php echo $lab_test_result->Desc1->cellAttributes() ?>>
			<span id="el_lab_test_result_Desc1">
<input type="text" data-table="lab_test_result" data-field="x_Desc1" name="x_Desc1" id="x_Desc1" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($lab_test_result->Desc1->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->Desc1->EditValue ?>"<?php echo $lab_test_result->Desc1->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->Desc2->Visible) { // Desc2 ?>
	<div id="r_Desc2" class="form-group row">
		<label for="x_Desc2" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_Desc2"><?php echo $lab_test_result->Desc2->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_Desc2" id="z_Desc2" value="LIKE"></span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div<?php echo $lab_test_result->Desc2->cellAttributes() ?>>
			<span id="el_lab_test_result_Desc2">
<input type="text" data-table="lab_test_result" data-field="x_Desc2" name="x_Desc2" id="x_Desc2" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($lab_test_result->Desc2->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->Desc2->EditValue ?>"<?php echo $lab_test_result->Desc2->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->RptResult->Visible) { // RptResult ?>
	<div id="r_RptResult" class="form-group row">
		<label for="x_RptResult" class="<?php echo $lab_test_result_search->LeftColumnClass ?>"><span id="elh_lab_test_result_RptResult"><?php echo $lab_test_result->RptResult->caption() ?></span>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_RptResult" id="z_RptResult" value="LIKE"></span>
		</label>
		<div class="<?php echo $lab_test_result_search->RightColumnClass ?>"><div<?php echo $lab_test_result->RptResult->cellAttributes() ?>>
			<span id="el_lab_test_result_RptResult">
<input type="text" data-table="lab_test_result" data-field="x_RptResult" name="x_RptResult" id="x_RptResult" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($lab_test_result->RptResult->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->RptResult->EditValue ?>"<?php echo $lab_test_result->RptResult->editAttributes() ?>>
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
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$lab_test_result_search->terminate();
?>