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
$test_master_add = new test_master_add();

// Run the page
$test_master_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$test_master_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var ftest_masteradd = currentForm = new ew.Form("ftest_masteradd", "add");

// Validate form
ftest_masteradd.validate = function() {
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
		<?php if ($test_master_add->MainDeptCd->Required) { ?>
			elm = this.getElements("x" + infix + "_MainDeptCd");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $test_master->MainDeptCd->caption(), $test_master->MainDeptCd->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($test_master_add->DeptCd->Required) { ?>
			elm = this.getElements("x" + infix + "_DeptCd");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $test_master->DeptCd->caption(), $test_master->DeptCd->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($test_master_add->TestCd->Required) { ?>
			elm = this.getElements("x" + infix + "_TestCd");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $test_master->TestCd->caption(), $test_master->TestCd->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($test_master_add->TestSubCd->Required) { ?>
			elm = this.getElements("x" + infix + "_TestSubCd");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $test_master->TestSubCd->caption(), $test_master->TestSubCd->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($test_master_add->TestName->Required) { ?>
			elm = this.getElements("x" + infix + "_TestName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $test_master->TestName->caption(), $test_master->TestName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($test_master_add->XrayPart->Required) { ?>
			elm = this.getElements("x" + infix + "_XrayPart");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $test_master->XrayPart->caption(), $test_master->XrayPart->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($test_master_add->Method->Required) { ?>
			elm = this.getElements("x" + infix + "_Method");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $test_master->Method->caption(), $test_master->Method->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($test_master_add->Order->Required) { ?>
			elm = this.getElements("x" + infix + "_Order");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $test_master->Order->caption(), $test_master->Order->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Order");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($test_master->Order->errorMessage()) ?>");
		<?php if ($test_master_add->Form->Required) { ?>
			elm = this.getElements("x" + infix + "_Form");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $test_master->Form->caption(), $test_master->Form->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($test_master_add->Amt->Required) { ?>
			elm = this.getElements("x" + infix + "_Amt");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $test_master->Amt->caption(), $test_master->Amt->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Amt");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($test_master->Amt->errorMessage()) ?>");
		<?php if ($test_master_add->SplAmt->Required) { ?>
			elm = this.getElements("x" + infix + "_SplAmt");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $test_master->SplAmt->caption(), $test_master->SplAmt->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SplAmt");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($test_master->SplAmt->errorMessage()) ?>");
		<?php if ($test_master_add->ResType->Required) { ?>
			elm = this.getElements("x" + infix + "_ResType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $test_master->ResType->caption(), $test_master->ResType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($test_master_add->UnitCD->Required) { ?>
			elm = this.getElements("x" + infix + "_UnitCD");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $test_master->UnitCD->caption(), $test_master->UnitCD->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($test_master_add->RefValue->Required) { ?>
			elm = this.getElements("x" + infix + "_RefValue");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $test_master->RefValue->caption(), $test_master->RefValue->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($test_master_add->Sample->Required) { ?>
			elm = this.getElements("x" + infix + "_Sample");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $test_master->Sample->caption(), $test_master->Sample->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($test_master_add->NoD->Required) { ?>
			elm = this.getElements("x" + infix + "_NoD");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $test_master->NoD->caption(), $test_master->NoD->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_NoD");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($test_master->NoD->errorMessage()) ?>");
		<?php if ($test_master_add->BillOrder->Required) { ?>
			elm = this.getElements("x" + infix + "_BillOrder");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $test_master->BillOrder->caption(), $test_master->BillOrder->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_BillOrder");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($test_master->BillOrder->errorMessage()) ?>");
		<?php if ($test_master_add->Formula->Required) { ?>
			elm = this.getElements("x" + infix + "_Formula");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $test_master->Formula->caption(), $test_master->Formula->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($test_master_add->Inactive->Required) { ?>
			elm = this.getElements("x" + infix + "_Inactive");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $test_master->Inactive->caption(), $test_master->Inactive->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($test_master_add->ReagentAmt->Required) { ?>
			elm = this.getElements("x" + infix + "_ReagentAmt");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $test_master->ReagentAmt->caption(), $test_master->ReagentAmt->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ReagentAmt");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($test_master->ReagentAmt->errorMessage()) ?>");
		<?php if ($test_master_add->LabAmt->Required) { ?>
			elm = this.getElements("x" + infix + "_LabAmt");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $test_master->LabAmt->caption(), $test_master->LabAmt->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_LabAmt");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($test_master->LabAmt->errorMessage()) ?>");
		<?php if ($test_master_add->RefAmt->Required) { ?>
			elm = this.getElements("x" + infix + "_RefAmt");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $test_master->RefAmt->caption(), $test_master->RefAmt->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RefAmt");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($test_master->RefAmt->errorMessage()) ?>");
		<?php if ($test_master_add->CreFrom->Required) { ?>
			elm = this.getElements("x" + infix + "_CreFrom");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $test_master->CreFrom->caption(), $test_master->CreFrom->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_CreFrom");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($test_master->CreFrom->errorMessage()) ?>");
		<?php if ($test_master_add->CreTo->Required) { ?>
			elm = this.getElements("x" + infix + "_CreTo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $test_master->CreTo->caption(), $test_master->CreTo->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_CreTo");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($test_master->CreTo->errorMessage()) ?>");
		<?php if ($test_master_add->Note->Required) { ?>
			elm = this.getElements("x" + infix + "_Note");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $test_master->Note->caption(), $test_master->Note->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($test_master_add->Sun->Required) { ?>
			elm = this.getElements("x" + infix + "_Sun");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $test_master->Sun->caption(), $test_master->Sun->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($test_master_add->Mon->Required) { ?>
			elm = this.getElements("x" + infix + "_Mon");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $test_master->Mon->caption(), $test_master->Mon->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($test_master_add->Tue->Required) { ?>
			elm = this.getElements("x" + infix + "_Tue");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $test_master->Tue->caption(), $test_master->Tue->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($test_master_add->Wed->Required) { ?>
			elm = this.getElements("x" + infix + "_Wed");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $test_master->Wed->caption(), $test_master->Wed->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($test_master_add->Thi->Required) { ?>
			elm = this.getElements("x" + infix + "_Thi");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $test_master->Thi->caption(), $test_master->Thi->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($test_master_add->Fri->Required) { ?>
			elm = this.getElements("x" + infix + "_Fri");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $test_master->Fri->caption(), $test_master->Fri->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($test_master_add->Sat->Required) { ?>
			elm = this.getElements("x" + infix + "_Sat");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $test_master->Sat->caption(), $test_master->Sat->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($test_master_add->Days->Required) { ?>
			elm = this.getElements("x" + infix + "_Days");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $test_master->Days->caption(), $test_master->Days->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Days");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($test_master->Days->errorMessage()) ?>");
		<?php if ($test_master_add->Cutoff->Required) { ?>
			elm = this.getElements("x" + infix + "_Cutoff");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $test_master->Cutoff->caption(), $test_master->Cutoff->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($test_master_add->FontBold->Required) { ?>
			elm = this.getElements("x" + infix + "_FontBold");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $test_master->FontBold->caption(), $test_master->FontBold->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($test_master_add->TestHeading->Required) { ?>
			elm = this.getElements("x" + infix + "_TestHeading");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $test_master->TestHeading->caption(), $test_master->TestHeading->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($test_master_add->Outsource->Required) { ?>
			elm = this.getElements("x" + infix + "_Outsource");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $test_master->Outsource->caption(), $test_master->Outsource->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($test_master_add->NoResult->Required) { ?>
			elm = this.getElements("x" + infix + "_NoResult");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $test_master->NoResult->caption(), $test_master->NoResult->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($test_master_add->GraphLow->Required) { ?>
			elm = this.getElements("x" + infix + "_GraphLow");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $test_master->GraphLow->caption(), $test_master->GraphLow->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_GraphLow");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($test_master->GraphLow->errorMessage()) ?>");
		<?php if ($test_master_add->GraphHigh->Required) { ?>
			elm = this.getElements("x" + infix + "_GraphHigh");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $test_master->GraphHigh->caption(), $test_master->GraphHigh->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_GraphHigh");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($test_master->GraphHigh->errorMessage()) ?>");
		<?php if ($test_master_add->CollSample->Required) { ?>
			elm = this.getElements("x" + infix + "_CollSample");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $test_master->CollSample->caption(), $test_master->CollSample->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($test_master_add->ProcessTime->Required) { ?>
			elm = this.getElements("x" + infix + "_ProcessTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $test_master->ProcessTime->caption(), $test_master->ProcessTime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($test_master_add->TamilName->Required) { ?>
			elm = this.getElements("x" + infix + "_TamilName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $test_master->TamilName->caption(), $test_master->TamilName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($test_master_add->ShortName->Required) { ?>
			elm = this.getElements("x" + infix + "_ShortName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $test_master->ShortName->caption(), $test_master->ShortName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($test_master_add->Individual->Required) { ?>
			elm = this.getElements("x" + infix + "_Individual");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $test_master->Individual->caption(), $test_master->Individual->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($test_master_add->PrevAmt->Required) { ?>
			elm = this.getElements("x" + infix + "_PrevAmt");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $test_master->PrevAmt->caption(), $test_master->PrevAmt->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PrevAmt");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($test_master->PrevAmt->errorMessage()) ?>");
		<?php if ($test_master_add->PrevSplAmt->Required) { ?>
			elm = this.getElements("x" + infix + "_PrevSplAmt");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $test_master->PrevSplAmt->caption(), $test_master->PrevSplAmt->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PrevSplAmt");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($test_master->PrevSplAmt->errorMessage()) ?>");
		<?php if ($test_master_add->Remarks->Required) { ?>
			elm = this.getElements("x" + infix + "_Remarks");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $test_master->Remarks->caption(), $test_master->Remarks->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($test_master_add->EditDate->Required) { ?>
			elm = this.getElements("x" + infix + "_EditDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $test_master->EditDate->caption(), $test_master->EditDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_EditDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($test_master->EditDate->errorMessage()) ?>");
		<?php if ($test_master_add->BillName->Required) { ?>
			elm = this.getElements("x" + infix + "_BillName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $test_master->BillName->caption(), $test_master->BillName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($test_master_add->ActualAmt->Required) { ?>
			elm = this.getElements("x" + infix + "_ActualAmt");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $test_master->ActualAmt->caption(), $test_master->ActualAmt->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ActualAmt");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($test_master->ActualAmt->errorMessage()) ?>");
		<?php if ($test_master_add->HISCD->Required) { ?>
			elm = this.getElements("x" + infix + "_HISCD");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $test_master->HISCD->caption(), $test_master->HISCD->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($test_master_add->PriceList->Required) { ?>
			elm = this.getElements("x" + infix + "_PriceList");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $test_master->PriceList->caption(), $test_master->PriceList->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($test_master_add->IPAmt->Required) { ?>
			elm = this.getElements("x" + infix + "_IPAmt");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $test_master->IPAmt->caption(), $test_master->IPAmt->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_IPAmt");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($test_master->IPAmt->errorMessage()) ?>");
		<?php if ($test_master_add->InsAmt->Required) { ?>
			elm = this.getElements("x" + infix + "_InsAmt");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $test_master->InsAmt->caption(), $test_master->InsAmt->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_InsAmt");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($test_master->InsAmt->errorMessage()) ?>");
		<?php if ($test_master_add->ManualCD->Required) { ?>
			elm = this.getElements("x" + infix + "_ManualCD");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $test_master->ManualCD->caption(), $test_master->ManualCD->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($test_master_add->Free->Required) { ?>
			elm = this.getElements("x" + infix + "_Free");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $test_master->Free->caption(), $test_master->Free->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($test_master_add->AutoAuth->Required) { ?>
			elm = this.getElements("x" + infix + "_AutoAuth");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $test_master->AutoAuth->caption(), $test_master->AutoAuth->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($test_master_add->ProductCD->Required) { ?>
			elm = this.getElements("x" + infix + "_ProductCD");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $test_master->ProductCD->caption(), $test_master->ProductCD->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($test_master_add->Inventory->Required) { ?>
			elm = this.getElements("x" + infix + "_Inventory");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $test_master->Inventory->caption(), $test_master->Inventory->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($test_master_add->IntimateTest->Required) { ?>
			elm = this.getElements("x" + infix + "_IntimateTest");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $test_master->IntimateTest->caption(), $test_master->IntimateTest->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($test_master_add->Manual->Required) { ?>
			elm = this.getElements("x" + infix + "_Manual");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $test_master->Manual->caption(), $test_master->Manual->RequiredErrorMessage)) ?>");
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
ftest_masteradd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ftest_masteradd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $test_master_add->showPageHeader(); ?>
<?php
$test_master_add->showMessage();
?>
<form name="ftest_masteradd" id="ftest_masteradd" class="<?php echo $test_master_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($test_master_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $test_master_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="test_master">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$test_master_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($test_master->MainDeptCd->Visible) { // MainDeptCd ?>
	<div id="r_MainDeptCd" class="form-group row">
		<label id="elh_test_master_MainDeptCd" for="x_MainDeptCd" class="<?php echo $test_master_add->LeftColumnClass ?>"><?php echo $test_master->MainDeptCd->caption() ?><?php echo ($test_master->MainDeptCd->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $test_master_add->RightColumnClass ?>"><div<?php echo $test_master->MainDeptCd->cellAttributes() ?>>
<span id="el_test_master_MainDeptCd">
<input type="text" data-table="test_master" data-field="x_MainDeptCd" name="x_MainDeptCd" id="x_MainDeptCd" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($test_master->MainDeptCd->getPlaceHolder()) ?>" value="<?php echo $test_master->MainDeptCd->EditValue ?>"<?php echo $test_master->MainDeptCd->editAttributes() ?>>
</span>
<?php echo $test_master->MainDeptCd->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($test_master->DeptCd->Visible) { // DeptCd ?>
	<div id="r_DeptCd" class="form-group row">
		<label id="elh_test_master_DeptCd" for="x_DeptCd" class="<?php echo $test_master_add->LeftColumnClass ?>"><?php echo $test_master->DeptCd->caption() ?><?php echo ($test_master->DeptCd->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $test_master_add->RightColumnClass ?>"><div<?php echo $test_master->DeptCd->cellAttributes() ?>>
<span id="el_test_master_DeptCd">
<input type="text" data-table="test_master" data-field="x_DeptCd" name="x_DeptCd" id="x_DeptCd" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($test_master->DeptCd->getPlaceHolder()) ?>" value="<?php echo $test_master->DeptCd->EditValue ?>"<?php echo $test_master->DeptCd->editAttributes() ?>>
</span>
<?php echo $test_master->DeptCd->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($test_master->TestCd->Visible) { // TestCd ?>
	<div id="r_TestCd" class="form-group row">
		<label id="elh_test_master_TestCd" for="x_TestCd" class="<?php echo $test_master_add->LeftColumnClass ?>"><?php echo $test_master->TestCd->caption() ?><?php echo ($test_master->TestCd->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $test_master_add->RightColumnClass ?>"><div<?php echo $test_master->TestCd->cellAttributes() ?>>
<span id="el_test_master_TestCd">
<input type="text" data-table="test_master" data-field="x_TestCd" name="x_TestCd" id="x_TestCd" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($test_master->TestCd->getPlaceHolder()) ?>" value="<?php echo $test_master->TestCd->EditValue ?>"<?php echo $test_master->TestCd->editAttributes() ?>>
</span>
<?php echo $test_master->TestCd->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($test_master->TestSubCd->Visible) { // TestSubCd ?>
	<div id="r_TestSubCd" class="form-group row">
		<label id="elh_test_master_TestSubCd" for="x_TestSubCd" class="<?php echo $test_master_add->LeftColumnClass ?>"><?php echo $test_master->TestSubCd->caption() ?><?php echo ($test_master->TestSubCd->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $test_master_add->RightColumnClass ?>"><div<?php echo $test_master->TestSubCd->cellAttributes() ?>>
<span id="el_test_master_TestSubCd">
<input type="text" data-table="test_master" data-field="x_TestSubCd" name="x_TestSubCd" id="x_TestSubCd" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($test_master->TestSubCd->getPlaceHolder()) ?>" value="<?php echo $test_master->TestSubCd->EditValue ?>"<?php echo $test_master->TestSubCd->editAttributes() ?>>
</span>
<?php echo $test_master->TestSubCd->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($test_master->TestName->Visible) { // TestName ?>
	<div id="r_TestName" class="form-group row">
		<label id="elh_test_master_TestName" for="x_TestName" class="<?php echo $test_master_add->LeftColumnClass ?>"><?php echo $test_master->TestName->caption() ?><?php echo ($test_master->TestName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $test_master_add->RightColumnClass ?>"><div<?php echo $test_master->TestName->cellAttributes() ?>>
<span id="el_test_master_TestName">
<input type="text" data-table="test_master" data-field="x_TestName" name="x_TestName" id="x_TestName" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($test_master->TestName->getPlaceHolder()) ?>" value="<?php echo $test_master->TestName->EditValue ?>"<?php echo $test_master->TestName->editAttributes() ?>>
</span>
<?php echo $test_master->TestName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($test_master->XrayPart->Visible) { // XrayPart ?>
	<div id="r_XrayPart" class="form-group row">
		<label id="elh_test_master_XrayPart" for="x_XrayPart" class="<?php echo $test_master_add->LeftColumnClass ?>"><?php echo $test_master->XrayPart->caption() ?><?php echo ($test_master->XrayPart->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $test_master_add->RightColumnClass ?>"><div<?php echo $test_master->XrayPart->cellAttributes() ?>>
<span id="el_test_master_XrayPart">
<input type="text" data-table="test_master" data-field="x_XrayPart" name="x_XrayPart" id="x_XrayPart" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($test_master->XrayPart->getPlaceHolder()) ?>" value="<?php echo $test_master->XrayPart->EditValue ?>"<?php echo $test_master->XrayPart->editAttributes() ?>>
</span>
<?php echo $test_master->XrayPart->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($test_master->Method->Visible) { // Method ?>
	<div id="r_Method" class="form-group row">
		<label id="elh_test_master_Method" for="x_Method" class="<?php echo $test_master_add->LeftColumnClass ?>"><?php echo $test_master->Method->caption() ?><?php echo ($test_master->Method->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $test_master_add->RightColumnClass ?>"><div<?php echo $test_master->Method->cellAttributes() ?>>
<span id="el_test_master_Method">
<input type="text" data-table="test_master" data-field="x_Method" name="x_Method" id="x_Method" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($test_master->Method->getPlaceHolder()) ?>" value="<?php echo $test_master->Method->EditValue ?>"<?php echo $test_master->Method->editAttributes() ?>>
</span>
<?php echo $test_master->Method->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($test_master->Order->Visible) { // Order ?>
	<div id="r_Order" class="form-group row">
		<label id="elh_test_master_Order" for="x_Order" class="<?php echo $test_master_add->LeftColumnClass ?>"><?php echo $test_master->Order->caption() ?><?php echo ($test_master->Order->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $test_master_add->RightColumnClass ?>"><div<?php echo $test_master->Order->cellAttributes() ?>>
<span id="el_test_master_Order">
<input type="text" data-table="test_master" data-field="x_Order" name="x_Order" id="x_Order" size="30" placeholder="<?php echo HtmlEncode($test_master->Order->getPlaceHolder()) ?>" value="<?php echo $test_master->Order->EditValue ?>"<?php echo $test_master->Order->editAttributes() ?>>
</span>
<?php echo $test_master->Order->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($test_master->Form->Visible) { // Form ?>
	<div id="r_Form" class="form-group row">
		<label id="elh_test_master_Form" for="x_Form" class="<?php echo $test_master_add->LeftColumnClass ?>"><?php echo $test_master->Form->caption() ?><?php echo ($test_master->Form->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $test_master_add->RightColumnClass ?>"><div<?php echo $test_master->Form->cellAttributes() ?>>
<span id="el_test_master_Form">
<input type="text" data-table="test_master" data-field="x_Form" name="x_Form" id="x_Form" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($test_master->Form->getPlaceHolder()) ?>" value="<?php echo $test_master->Form->EditValue ?>"<?php echo $test_master->Form->editAttributes() ?>>
</span>
<?php echo $test_master->Form->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($test_master->Amt->Visible) { // Amt ?>
	<div id="r_Amt" class="form-group row">
		<label id="elh_test_master_Amt" for="x_Amt" class="<?php echo $test_master_add->LeftColumnClass ?>"><?php echo $test_master->Amt->caption() ?><?php echo ($test_master->Amt->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $test_master_add->RightColumnClass ?>"><div<?php echo $test_master->Amt->cellAttributes() ?>>
<span id="el_test_master_Amt">
<input type="text" data-table="test_master" data-field="x_Amt" name="x_Amt" id="x_Amt" size="30" placeholder="<?php echo HtmlEncode($test_master->Amt->getPlaceHolder()) ?>" value="<?php echo $test_master->Amt->EditValue ?>"<?php echo $test_master->Amt->editAttributes() ?>>
</span>
<?php echo $test_master->Amt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($test_master->SplAmt->Visible) { // SplAmt ?>
	<div id="r_SplAmt" class="form-group row">
		<label id="elh_test_master_SplAmt" for="x_SplAmt" class="<?php echo $test_master_add->LeftColumnClass ?>"><?php echo $test_master->SplAmt->caption() ?><?php echo ($test_master->SplAmt->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $test_master_add->RightColumnClass ?>"><div<?php echo $test_master->SplAmt->cellAttributes() ?>>
<span id="el_test_master_SplAmt">
<input type="text" data-table="test_master" data-field="x_SplAmt" name="x_SplAmt" id="x_SplAmt" size="30" placeholder="<?php echo HtmlEncode($test_master->SplAmt->getPlaceHolder()) ?>" value="<?php echo $test_master->SplAmt->EditValue ?>"<?php echo $test_master->SplAmt->editAttributes() ?>>
</span>
<?php echo $test_master->SplAmt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($test_master->ResType->Visible) { // ResType ?>
	<div id="r_ResType" class="form-group row">
		<label id="elh_test_master_ResType" for="x_ResType" class="<?php echo $test_master_add->LeftColumnClass ?>"><?php echo $test_master->ResType->caption() ?><?php echo ($test_master->ResType->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $test_master_add->RightColumnClass ?>"><div<?php echo $test_master->ResType->cellAttributes() ?>>
<span id="el_test_master_ResType">
<input type="text" data-table="test_master" data-field="x_ResType" name="x_ResType" id="x_ResType" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($test_master->ResType->getPlaceHolder()) ?>" value="<?php echo $test_master->ResType->EditValue ?>"<?php echo $test_master->ResType->editAttributes() ?>>
</span>
<?php echo $test_master->ResType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($test_master->UnitCD->Visible) { // UnitCD ?>
	<div id="r_UnitCD" class="form-group row">
		<label id="elh_test_master_UnitCD" for="x_UnitCD" class="<?php echo $test_master_add->LeftColumnClass ?>"><?php echo $test_master->UnitCD->caption() ?><?php echo ($test_master->UnitCD->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $test_master_add->RightColumnClass ?>"><div<?php echo $test_master->UnitCD->cellAttributes() ?>>
<span id="el_test_master_UnitCD">
<input type="text" data-table="test_master" data-field="x_UnitCD" name="x_UnitCD" id="x_UnitCD" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($test_master->UnitCD->getPlaceHolder()) ?>" value="<?php echo $test_master->UnitCD->EditValue ?>"<?php echo $test_master->UnitCD->editAttributes() ?>>
</span>
<?php echo $test_master->UnitCD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($test_master->RefValue->Visible) { // RefValue ?>
	<div id="r_RefValue" class="form-group row">
		<label id="elh_test_master_RefValue" for="x_RefValue" class="<?php echo $test_master_add->LeftColumnClass ?>"><?php echo $test_master->RefValue->caption() ?><?php echo ($test_master->RefValue->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $test_master_add->RightColumnClass ?>"><div<?php echo $test_master->RefValue->cellAttributes() ?>>
<span id="el_test_master_RefValue">
<textarea data-table="test_master" data-field="x_RefValue" name="x_RefValue" id="x_RefValue" cols="35" rows="4" placeholder="<?php echo HtmlEncode($test_master->RefValue->getPlaceHolder()) ?>"<?php echo $test_master->RefValue->editAttributes() ?>><?php echo $test_master->RefValue->EditValue ?></textarea>
</span>
<?php echo $test_master->RefValue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($test_master->Sample->Visible) { // Sample ?>
	<div id="r_Sample" class="form-group row">
		<label id="elh_test_master_Sample" for="x_Sample" class="<?php echo $test_master_add->LeftColumnClass ?>"><?php echo $test_master->Sample->caption() ?><?php echo ($test_master->Sample->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $test_master_add->RightColumnClass ?>"><div<?php echo $test_master->Sample->cellAttributes() ?>>
<span id="el_test_master_Sample">
<input type="text" data-table="test_master" data-field="x_Sample" name="x_Sample" id="x_Sample" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($test_master->Sample->getPlaceHolder()) ?>" value="<?php echo $test_master->Sample->EditValue ?>"<?php echo $test_master->Sample->editAttributes() ?>>
</span>
<?php echo $test_master->Sample->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($test_master->NoD->Visible) { // NoD ?>
	<div id="r_NoD" class="form-group row">
		<label id="elh_test_master_NoD" for="x_NoD" class="<?php echo $test_master_add->LeftColumnClass ?>"><?php echo $test_master->NoD->caption() ?><?php echo ($test_master->NoD->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $test_master_add->RightColumnClass ?>"><div<?php echo $test_master->NoD->cellAttributes() ?>>
<span id="el_test_master_NoD">
<input type="text" data-table="test_master" data-field="x_NoD" name="x_NoD" id="x_NoD" size="30" placeholder="<?php echo HtmlEncode($test_master->NoD->getPlaceHolder()) ?>" value="<?php echo $test_master->NoD->EditValue ?>"<?php echo $test_master->NoD->editAttributes() ?>>
</span>
<?php echo $test_master->NoD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($test_master->BillOrder->Visible) { // BillOrder ?>
	<div id="r_BillOrder" class="form-group row">
		<label id="elh_test_master_BillOrder" for="x_BillOrder" class="<?php echo $test_master_add->LeftColumnClass ?>"><?php echo $test_master->BillOrder->caption() ?><?php echo ($test_master->BillOrder->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $test_master_add->RightColumnClass ?>"><div<?php echo $test_master->BillOrder->cellAttributes() ?>>
<span id="el_test_master_BillOrder">
<input type="text" data-table="test_master" data-field="x_BillOrder" name="x_BillOrder" id="x_BillOrder" size="30" placeholder="<?php echo HtmlEncode($test_master->BillOrder->getPlaceHolder()) ?>" value="<?php echo $test_master->BillOrder->EditValue ?>"<?php echo $test_master->BillOrder->editAttributes() ?>>
</span>
<?php echo $test_master->BillOrder->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($test_master->Formula->Visible) { // Formula ?>
	<div id="r_Formula" class="form-group row">
		<label id="elh_test_master_Formula" for="x_Formula" class="<?php echo $test_master_add->LeftColumnClass ?>"><?php echo $test_master->Formula->caption() ?><?php echo ($test_master->Formula->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $test_master_add->RightColumnClass ?>"><div<?php echo $test_master->Formula->cellAttributes() ?>>
<span id="el_test_master_Formula">
<textarea data-table="test_master" data-field="x_Formula" name="x_Formula" id="x_Formula" cols="35" rows="4" placeholder="<?php echo HtmlEncode($test_master->Formula->getPlaceHolder()) ?>"<?php echo $test_master->Formula->editAttributes() ?>><?php echo $test_master->Formula->EditValue ?></textarea>
</span>
<?php echo $test_master->Formula->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($test_master->Inactive->Visible) { // Inactive ?>
	<div id="r_Inactive" class="form-group row">
		<label id="elh_test_master_Inactive" for="x_Inactive" class="<?php echo $test_master_add->LeftColumnClass ?>"><?php echo $test_master->Inactive->caption() ?><?php echo ($test_master->Inactive->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $test_master_add->RightColumnClass ?>"><div<?php echo $test_master->Inactive->cellAttributes() ?>>
<span id="el_test_master_Inactive">
<input type="text" data-table="test_master" data-field="x_Inactive" name="x_Inactive" id="x_Inactive" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($test_master->Inactive->getPlaceHolder()) ?>" value="<?php echo $test_master->Inactive->EditValue ?>"<?php echo $test_master->Inactive->editAttributes() ?>>
</span>
<?php echo $test_master->Inactive->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($test_master->ReagentAmt->Visible) { // ReagentAmt ?>
	<div id="r_ReagentAmt" class="form-group row">
		<label id="elh_test_master_ReagentAmt" for="x_ReagentAmt" class="<?php echo $test_master_add->LeftColumnClass ?>"><?php echo $test_master->ReagentAmt->caption() ?><?php echo ($test_master->ReagentAmt->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $test_master_add->RightColumnClass ?>"><div<?php echo $test_master->ReagentAmt->cellAttributes() ?>>
<span id="el_test_master_ReagentAmt">
<input type="text" data-table="test_master" data-field="x_ReagentAmt" name="x_ReagentAmt" id="x_ReagentAmt" size="30" placeholder="<?php echo HtmlEncode($test_master->ReagentAmt->getPlaceHolder()) ?>" value="<?php echo $test_master->ReagentAmt->EditValue ?>"<?php echo $test_master->ReagentAmt->editAttributes() ?>>
</span>
<?php echo $test_master->ReagentAmt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($test_master->LabAmt->Visible) { // LabAmt ?>
	<div id="r_LabAmt" class="form-group row">
		<label id="elh_test_master_LabAmt" for="x_LabAmt" class="<?php echo $test_master_add->LeftColumnClass ?>"><?php echo $test_master->LabAmt->caption() ?><?php echo ($test_master->LabAmt->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $test_master_add->RightColumnClass ?>"><div<?php echo $test_master->LabAmt->cellAttributes() ?>>
<span id="el_test_master_LabAmt">
<input type="text" data-table="test_master" data-field="x_LabAmt" name="x_LabAmt" id="x_LabAmt" size="30" placeholder="<?php echo HtmlEncode($test_master->LabAmt->getPlaceHolder()) ?>" value="<?php echo $test_master->LabAmt->EditValue ?>"<?php echo $test_master->LabAmt->editAttributes() ?>>
</span>
<?php echo $test_master->LabAmt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($test_master->RefAmt->Visible) { // RefAmt ?>
	<div id="r_RefAmt" class="form-group row">
		<label id="elh_test_master_RefAmt" for="x_RefAmt" class="<?php echo $test_master_add->LeftColumnClass ?>"><?php echo $test_master->RefAmt->caption() ?><?php echo ($test_master->RefAmt->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $test_master_add->RightColumnClass ?>"><div<?php echo $test_master->RefAmt->cellAttributes() ?>>
<span id="el_test_master_RefAmt">
<input type="text" data-table="test_master" data-field="x_RefAmt" name="x_RefAmt" id="x_RefAmt" size="30" placeholder="<?php echo HtmlEncode($test_master->RefAmt->getPlaceHolder()) ?>" value="<?php echo $test_master->RefAmt->EditValue ?>"<?php echo $test_master->RefAmt->editAttributes() ?>>
</span>
<?php echo $test_master->RefAmt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($test_master->CreFrom->Visible) { // CreFrom ?>
	<div id="r_CreFrom" class="form-group row">
		<label id="elh_test_master_CreFrom" for="x_CreFrom" class="<?php echo $test_master_add->LeftColumnClass ?>"><?php echo $test_master->CreFrom->caption() ?><?php echo ($test_master->CreFrom->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $test_master_add->RightColumnClass ?>"><div<?php echo $test_master->CreFrom->cellAttributes() ?>>
<span id="el_test_master_CreFrom">
<input type="text" data-table="test_master" data-field="x_CreFrom" name="x_CreFrom" id="x_CreFrom" size="30" placeholder="<?php echo HtmlEncode($test_master->CreFrom->getPlaceHolder()) ?>" value="<?php echo $test_master->CreFrom->EditValue ?>"<?php echo $test_master->CreFrom->editAttributes() ?>>
</span>
<?php echo $test_master->CreFrom->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($test_master->CreTo->Visible) { // CreTo ?>
	<div id="r_CreTo" class="form-group row">
		<label id="elh_test_master_CreTo" for="x_CreTo" class="<?php echo $test_master_add->LeftColumnClass ?>"><?php echo $test_master->CreTo->caption() ?><?php echo ($test_master->CreTo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $test_master_add->RightColumnClass ?>"><div<?php echo $test_master->CreTo->cellAttributes() ?>>
<span id="el_test_master_CreTo">
<input type="text" data-table="test_master" data-field="x_CreTo" name="x_CreTo" id="x_CreTo" size="30" placeholder="<?php echo HtmlEncode($test_master->CreTo->getPlaceHolder()) ?>" value="<?php echo $test_master->CreTo->EditValue ?>"<?php echo $test_master->CreTo->editAttributes() ?>>
</span>
<?php echo $test_master->CreTo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($test_master->Note->Visible) { // Note ?>
	<div id="r_Note" class="form-group row">
		<label id="elh_test_master_Note" for="x_Note" class="<?php echo $test_master_add->LeftColumnClass ?>"><?php echo $test_master->Note->caption() ?><?php echo ($test_master->Note->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $test_master_add->RightColumnClass ?>"><div<?php echo $test_master->Note->cellAttributes() ?>>
<span id="el_test_master_Note">
<textarea data-table="test_master" data-field="x_Note" name="x_Note" id="x_Note" cols="35" rows="4" placeholder="<?php echo HtmlEncode($test_master->Note->getPlaceHolder()) ?>"<?php echo $test_master->Note->editAttributes() ?>><?php echo $test_master->Note->EditValue ?></textarea>
</span>
<?php echo $test_master->Note->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($test_master->Sun->Visible) { // Sun ?>
	<div id="r_Sun" class="form-group row">
		<label id="elh_test_master_Sun" for="x_Sun" class="<?php echo $test_master_add->LeftColumnClass ?>"><?php echo $test_master->Sun->caption() ?><?php echo ($test_master->Sun->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $test_master_add->RightColumnClass ?>"><div<?php echo $test_master->Sun->cellAttributes() ?>>
<span id="el_test_master_Sun">
<input type="text" data-table="test_master" data-field="x_Sun" name="x_Sun" id="x_Sun" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($test_master->Sun->getPlaceHolder()) ?>" value="<?php echo $test_master->Sun->EditValue ?>"<?php echo $test_master->Sun->editAttributes() ?>>
</span>
<?php echo $test_master->Sun->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($test_master->Mon->Visible) { // Mon ?>
	<div id="r_Mon" class="form-group row">
		<label id="elh_test_master_Mon" for="x_Mon" class="<?php echo $test_master_add->LeftColumnClass ?>"><?php echo $test_master->Mon->caption() ?><?php echo ($test_master->Mon->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $test_master_add->RightColumnClass ?>"><div<?php echo $test_master->Mon->cellAttributes() ?>>
<span id="el_test_master_Mon">
<input type="text" data-table="test_master" data-field="x_Mon" name="x_Mon" id="x_Mon" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($test_master->Mon->getPlaceHolder()) ?>" value="<?php echo $test_master->Mon->EditValue ?>"<?php echo $test_master->Mon->editAttributes() ?>>
</span>
<?php echo $test_master->Mon->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($test_master->Tue->Visible) { // Tue ?>
	<div id="r_Tue" class="form-group row">
		<label id="elh_test_master_Tue" for="x_Tue" class="<?php echo $test_master_add->LeftColumnClass ?>"><?php echo $test_master->Tue->caption() ?><?php echo ($test_master->Tue->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $test_master_add->RightColumnClass ?>"><div<?php echo $test_master->Tue->cellAttributes() ?>>
<span id="el_test_master_Tue">
<input type="text" data-table="test_master" data-field="x_Tue" name="x_Tue" id="x_Tue" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($test_master->Tue->getPlaceHolder()) ?>" value="<?php echo $test_master->Tue->EditValue ?>"<?php echo $test_master->Tue->editAttributes() ?>>
</span>
<?php echo $test_master->Tue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($test_master->Wed->Visible) { // Wed ?>
	<div id="r_Wed" class="form-group row">
		<label id="elh_test_master_Wed" for="x_Wed" class="<?php echo $test_master_add->LeftColumnClass ?>"><?php echo $test_master->Wed->caption() ?><?php echo ($test_master->Wed->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $test_master_add->RightColumnClass ?>"><div<?php echo $test_master->Wed->cellAttributes() ?>>
<span id="el_test_master_Wed">
<input type="text" data-table="test_master" data-field="x_Wed" name="x_Wed" id="x_Wed" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($test_master->Wed->getPlaceHolder()) ?>" value="<?php echo $test_master->Wed->EditValue ?>"<?php echo $test_master->Wed->editAttributes() ?>>
</span>
<?php echo $test_master->Wed->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($test_master->Thi->Visible) { // Thi ?>
	<div id="r_Thi" class="form-group row">
		<label id="elh_test_master_Thi" for="x_Thi" class="<?php echo $test_master_add->LeftColumnClass ?>"><?php echo $test_master->Thi->caption() ?><?php echo ($test_master->Thi->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $test_master_add->RightColumnClass ?>"><div<?php echo $test_master->Thi->cellAttributes() ?>>
<span id="el_test_master_Thi">
<input type="text" data-table="test_master" data-field="x_Thi" name="x_Thi" id="x_Thi" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($test_master->Thi->getPlaceHolder()) ?>" value="<?php echo $test_master->Thi->EditValue ?>"<?php echo $test_master->Thi->editAttributes() ?>>
</span>
<?php echo $test_master->Thi->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($test_master->Fri->Visible) { // Fri ?>
	<div id="r_Fri" class="form-group row">
		<label id="elh_test_master_Fri" for="x_Fri" class="<?php echo $test_master_add->LeftColumnClass ?>"><?php echo $test_master->Fri->caption() ?><?php echo ($test_master->Fri->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $test_master_add->RightColumnClass ?>"><div<?php echo $test_master->Fri->cellAttributes() ?>>
<span id="el_test_master_Fri">
<input type="text" data-table="test_master" data-field="x_Fri" name="x_Fri" id="x_Fri" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($test_master->Fri->getPlaceHolder()) ?>" value="<?php echo $test_master->Fri->EditValue ?>"<?php echo $test_master->Fri->editAttributes() ?>>
</span>
<?php echo $test_master->Fri->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($test_master->Sat->Visible) { // Sat ?>
	<div id="r_Sat" class="form-group row">
		<label id="elh_test_master_Sat" for="x_Sat" class="<?php echo $test_master_add->LeftColumnClass ?>"><?php echo $test_master->Sat->caption() ?><?php echo ($test_master->Sat->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $test_master_add->RightColumnClass ?>"><div<?php echo $test_master->Sat->cellAttributes() ?>>
<span id="el_test_master_Sat">
<input type="text" data-table="test_master" data-field="x_Sat" name="x_Sat" id="x_Sat" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($test_master->Sat->getPlaceHolder()) ?>" value="<?php echo $test_master->Sat->EditValue ?>"<?php echo $test_master->Sat->editAttributes() ?>>
</span>
<?php echo $test_master->Sat->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($test_master->Days->Visible) { // Days ?>
	<div id="r_Days" class="form-group row">
		<label id="elh_test_master_Days" for="x_Days" class="<?php echo $test_master_add->LeftColumnClass ?>"><?php echo $test_master->Days->caption() ?><?php echo ($test_master->Days->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $test_master_add->RightColumnClass ?>"><div<?php echo $test_master->Days->cellAttributes() ?>>
<span id="el_test_master_Days">
<input type="text" data-table="test_master" data-field="x_Days" name="x_Days" id="x_Days" size="30" placeholder="<?php echo HtmlEncode($test_master->Days->getPlaceHolder()) ?>" value="<?php echo $test_master->Days->EditValue ?>"<?php echo $test_master->Days->editAttributes() ?>>
</span>
<?php echo $test_master->Days->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($test_master->Cutoff->Visible) { // Cutoff ?>
	<div id="r_Cutoff" class="form-group row">
		<label id="elh_test_master_Cutoff" for="x_Cutoff" class="<?php echo $test_master_add->LeftColumnClass ?>"><?php echo $test_master->Cutoff->caption() ?><?php echo ($test_master->Cutoff->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $test_master_add->RightColumnClass ?>"><div<?php echo $test_master->Cutoff->cellAttributes() ?>>
<span id="el_test_master_Cutoff">
<input type="text" data-table="test_master" data-field="x_Cutoff" name="x_Cutoff" id="x_Cutoff" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($test_master->Cutoff->getPlaceHolder()) ?>" value="<?php echo $test_master->Cutoff->EditValue ?>"<?php echo $test_master->Cutoff->editAttributes() ?>>
</span>
<?php echo $test_master->Cutoff->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($test_master->FontBold->Visible) { // FontBold ?>
	<div id="r_FontBold" class="form-group row">
		<label id="elh_test_master_FontBold" for="x_FontBold" class="<?php echo $test_master_add->LeftColumnClass ?>"><?php echo $test_master->FontBold->caption() ?><?php echo ($test_master->FontBold->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $test_master_add->RightColumnClass ?>"><div<?php echo $test_master->FontBold->cellAttributes() ?>>
<span id="el_test_master_FontBold">
<input type="text" data-table="test_master" data-field="x_FontBold" name="x_FontBold" id="x_FontBold" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($test_master->FontBold->getPlaceHolder()) ?>" value="<?php echo $test_master->FontBold->EditValue ?>"<?php echo $test_master->FontBold->editAttributes() ?>>
</span>
<?php echo $test_master->FontBold->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($test_master->TestHeading->Visible) { // TestHeading ?>
	<div id="r_TestHeading" class="form-group row">
		<label id="elh_test_master_TestHeading" for="x_TestHeading" class="<?php echo $test_master_add->LeftColumnClass ?>"><?php echo $test_master->TestHeading->caption() ?><?php echo ($test_master->TestHeading->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $test_master_add->RightColumnClass ?>"><div<?php echo $test_master->TestHeading->cellAttributes() ?>>
<span id="el_test_master_TestHeading">
<input type="text" data-table="test_master" data-field="x_TestHeading" name="x_TestHeading" id="x_TestHeading" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($test_master->TestHeading->getPlaceHolder()) ?>" value="<?php echo $test_master->TestHeading->EditValue ?>"<?php echo $test_master->TestHeading->editAttributes() ?>>
</span>
<?php echo $test_master->TestHeading->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($test_master->Outsource->Visible) { // Outsource ?>
	<div id="r_Outsource" class="form-group row">
		<label id="elh_test_master_Outsource" for="x_Outsource" class="<?php echo $test_master_add->LeftColumnClass ?>"><?php echo $test_master->Outsource->caption() ?><?php echo ($test_master->Outsource->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $test_master_add->RightColumnClass ?>"><div<?php echo $test_master->Outsource->cellAttributes() ?>>
<span id="el_test_master_Outsource">
<input type="text" data-table="test_master" data-field="x_Outsource" name="x_Outsource" id="x_Outsource" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($test_master->Outsource->getPlaceHolder()) ?>" value="<?php echo $test_master->Outsource->EditValue ?>"<?php echo $test_master->Outsource->editAttributes() ?>>
</span>
<?php echo $test_master->Outsource->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($test_master->NoResult->Visible) { // NoResult ?>
	<div id="r_NoResult" class="form-group row">
		<label id="elh_test_master_NoResult" for="x_NoResult" class="<?php echo $test_master_add->LeftColumnClass ?>"><?php echo $test_master->NoResult->caption() ?><?php echo ($test_master->NoResult->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $test_master_add->RightColumnClass ?>"><div<?php echo $test_master->NoResult->cellAttributes() ?>>
<span id="el_test_master_NoResult">
<input type="text" data-table="test_master" data-field="x_NoResult" name="x_NoResult" id="x_NoResult" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($test_master->NoResult->getPlaceHolder()) ?>" value="<?php echo $test_master->NoResult->EditValue ?>"<?php echo $test_master->NoResult->editAttributes() ?>>
</span>
<?php echo $test_master->NoResult->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($test_master->GraphLow->Visible) { // GraphLow ?>
	<div id="r_GraphLow" class="form-group row">
		<label id="elh_test_master_GraphLow" for="x_GraphLow" class="<?php echo $test_master_add->LeftColumnClass ?>"><?php echo $test_master->GraphLow->caption() ?><?php echo ($test_master->GraphLow->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $test_master_add->RightColumnClass ?>"><div<?php echo $test_master->GraphLow->cellAttributes() ?>>
<span id="el_test_master_GraphLow">
<input type="text" data-table="test_master" data-field="x_GraphLow" name="x_GraphLow" id="x_GraphLow" size="30" placeholder="<?php echo HtmlEncode($test_master->GraphLow->getPlaceHolder()) ?>" value="<?php echo $test_master->GraphLow->EditValue ?>"<?php echo $test_master->GraphLow->editAttributes() ?>>
</span>
<?php echo $test_master->GraphLow->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($test_master->GraphHigh->Visible) { // GraphHigh ?>
	<div id="r_GraphHigh" class="form-group row">
		<label id="elh_test_master_GraphHigh" for="x_GraphHigh" class="<?php echo $test_master_add->LeftColumnClass ?>"><?php echo $test_master->GraphHigh->caption() ?><?php echo ($test_master->GraphHigh->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $test_master_add->RightColumnClass ?>"><div<?php echo $test_master->GraphHigh->cellAttributes() ?>>
<span id="el_test_master_GraphHigh">
<input type="text" data-table="test_master" data-field="x_GraphHigh" name="x_GraphHigh" id="x_GraphHigh" size="30" placeholder="<?php echo HtmlEncode($test_master->GraphHigh->getPlaceHolder()) ?>" value="<?php echo $test_master->GraphHigh->EditValue ?>"<?php echo $test_master->GraphHigh->editAttributes() ?>>
</span>
<?php echo $test_master->GraphHigh->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($test_master->CollSample->Visible) { // CollSample ?>
	<div id="r_CollSample" class="form-group row">
		<label id="elh_test_master_CollSample" for="x_CollSample" class="<?php echo $test_master_add->LeftColumnClass ?>"><?php echo $test_master->CollSample->caption() ?><?php echo ($test_master->CollSample->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $test_master_add->RightColumnClass ?>"><div<?php echo $test_master->CollSample->cellAttributes() ?>>
<span id="el_test_master_CollSample">
<input type="text" data-table="test_master" data-field="x_CollSample" name="x_CollSample" id="x_CollSample" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($test_master->CollSample->getPlaceHolder()) ?>" value="<?php echo $test_master->CollSample->EditValue ?>"<?php echo $test_master->CollSample->editAttributes() ?>>
</span>
<?php echo $test_master->CollSample->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($test_master->ProcessTime->Visible) { // ProcessTime ?>
	<div id="r_ProcessTime" class="form-group row">
		<label id="elh_test_master_ProcessTime" for="x_ProcessTime" class="<?php echo $test_master_add->LeftColumnClass ?>"><?php echo $test_master->ProcessTime->caption() ?><?php echo ($test_master->ProcessTime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $test_master_add->RightColumnClass ?>"><div<?php echo $test_master->ProcessTime->cellAttributes() ?>>
<span id="el_test_master_ProcessTime">
<input type="text" data-table="test_master" data-field="x_ProcessTime" name="x_ProcessTime" id="x_ProcessTime" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($test_master->ProcessTime->getPlaceHolder()) ?>" value="<?php echo $test_master->ProcessTime->EditValue ?>"<?php echo $test_master->ProcessTime->editAttributes() ?>>
</span>
<?php echo $test_master->ProcessTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($test_master->TamilName->Visible) { // TamilName ?>
	<div id="r_TamilName" class="form-group row">
		<label id="elh_test_master_TamilName" for="x_TamilName" class="<?php echo $test_master_add->LeftColumnClass ?>"><?php echo $test_master->TamilName->caption() ?><?php echo ($test_master->TamilName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $test_master_add->RightColumnClass ?>"><div<?php echo $test_master->TamilName->cellAttributes() ?>>
<span id="el_test_master_TamilName">
<input type="text" data-table="test_master" data-field="x_TamilName" name="x_TamilName" id="x_TamilName" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($test_master->TamilName->getPlaceHolder()) ?>" value="<?php echo $test_master->TamilName->EditValue ?>"<?php echo $test_master->TamilName->editAttributes() ?>>
</span>
<?php echo $test_master->TamilName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($test_master->ShortName->Visible) { // ShortName ?>
	<div id="r_ShortName" class="form-group row">
		<label id="elh_test_master_ShortName" for="x_ShortName" class="<?php echo $test_master_add->LeftColumnClass ?>"><?php echo $test_master->ShortName->caption() ?><?php echo ($test_master->ShortName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $test_master_add->RightColumnClass ?>"><div<?php echo $test_master->ShortName->cellAttributes() ?>>
<span id="el_test_master_ShortName">
<input type="text" data-table="test_master" data-field="x_ShortName" name="x_ShortName" id="x_ShortName" size="30" maxlength="7" placeholder="<?php echo HtmlEncode($test_master->ShortName->getPlaceHolder()) ?>" value="<?php echo $test_master->ShortName->EditValue ?>"<?php echo $test_master->ShortName->editAttributes() ?>>
</span>
<?php echo $test_master->ShortName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($test_master->Individual->Visible) { // Individual ?>
	<div id="r_Individual" class="form-group row">
		<label id="elh_test_master_Individual" for="x_Individual" class="<?php echo $test_master_add->LeftColumnClass ?>"><?php echo $test_master->Individual->caption() ?><?php echo ($test_master->Individual->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $test_master_add->RightColumnClass ?>"><div<?php echo $test_master->Individual->cellAttributes() ?>>
<span id="el_test_master_Individual">
<input type="text" data-table="test_master" data-field="x_Individual" name="x_Individual" id="x_Individual" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($test_master->Individual->getPlaceHolder()) ?>" value="<?php echo $test_master->Individual->EditValue ?>"<?php echo $test_master->Individual->editAttributes() ?>>
</span>
<?php echo $test_master->Individual->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($test_master->PrevAmt->Visible) { // PrevAmt ?>
	<div id="r_PrevAmt" class="form-group row">
		<label id="elh_test_master_PrevAmt" for="x_PrevAmt" class="<?php echo $test_master_add->LeftColumnClass ?>"><?php echo $test_master->PrevAmt->caption() ?><?php echo ($test_master->PrevAmt->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $test_master_add->RightColumnClass ?>"><div<?php echo $test_master->PrevAmt->cellAttributes() ?>>
<span id="el_test_master_PrevAmt">
<input type="text" data-table="test_master" data-field="x_PrevAmt" name="x_PrevAmt" id="x_PrevAmt" size="30" placeholder="<?php echo HtmlEncode($test_master->PrevAmt->getPlaceHolder()) ?>" value="<?php echo $test_master->PrevAmt->EditValue ?>"<?php echo $test_master->PrevAmt->editAttributes() ?>>
</span>
<?php echo $test_master->PrevAmt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($test_master->PrevSplAmt->Visible) { // PrevSplAmt ?>
	<div id="r_PrevSplAmt" class="form-group row">
		<label id="elh_test_master_PrevSplAmt" for="x_PrevSplAmt" class="<?php echo $test_master_add->LeftColumnClass ?>"><?php echo $test_master->PrevSplAmt->caption() ?><?php echo ($test_master->PrevSplAmt->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $test_master_add->RightColumnClass ?>"><div<?php echo $test_master->PrevSplAmt->cellAttributes() ?>>
<span id="el_test_master_PrevSplAmt">
<input type="text" data-table="test_master" data-field="x_PrevSplAmt" name="x_PrevSplAmt" id="x_PrevSplAmt" size="30" placeholder="<?php echo HtmlEncode($test_master->PrevSplAmt->getPlaceHolder()) ?>" value="<?php echo $test_master->PrevSplAmt->EditValue ?>"<?php echo $test_master->PrevSplAmt->editAttributes() ?>>
</span>
<?php echo $test_master->PrevSplAmt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($test_master->Remarks->Visible) { // Remarks ?>
	<div id="r_Remarks" class="form-group row">
		<label id="elh_test_master_Remarks" for="x_Remarks" class="<?php echo $test_master_add->LeftColumnClass ?>"><?php echo $test_master->Remarks->caption() ?><?php echo ($test_master->Remarks->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $test_master_add->RightColumnClass ?>"><div<?php echo $test_master->Remarks->cellAttributes() ?>>
<span id="el_test_master_Remarks">
<textarea data-table="test_master" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" cols="35" rows="4" placeholder="<?php echo HtmlEncode($test_master->Remarks->getPlaceHolder()) ?>"<?php echo $test_master->Remarks->editAttributes() ?>><?php echo $test_master->Remarks->EditValue ?></textarea>
</span>
<?php echo $test_master->Remarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($test_master->EditDate->Visible) { // EditDate ?>
	<div id="r_EditDate" class="form-group row">
		<label id="elh_test_master_EditDate" for="x_EditDate" class="<?php echo $test_master_add->LeftColumnClass ?>"><?php echo $test_master->EditDate->caption() ?><?php echo ($test_master->EditDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $test_master_add->RightColumnClass ?>"><div<?php echo $test_master->EditDate->cellAttributes() ?>>
<span id="el_test_master_EditDate">
<input type="text" data-table="test_master" data-field="x_EditDate" name="x_EditDate" id="x_EditDate" placeholder="<?php echo HtmlEncode($test_master->EditDate->getPlaceHolder()) ?>" value="<?php echo $test_master->EditDate->EditValue ?>"<?php echo $test_master->EditDate->editAttributes() ?>>
<?php if (!$test_master->EditDate->ReadOnly && !$test_master->EditDate->Disabled && !isset($test_master->EditDate->EditAttrs["readonly"]) && !isset($test_master->EditDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("ftest_masteradd", "x_EditDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $test_master->EditDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($test_master->BillName->Visible) { // BillName ?>
	<div id="r_BillName" class="form-group row">
		<label id="elh_test_master_BillName" for="x_BillName" class="<?php echo $test_master_add->LeftColumnClass ?>"><?php echo $test_master->BillName->caption() ?><?php echo ($test_master->BillName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $test_master_add->RightColumnClass ?>"><div<?php echo $test_master->BillName->cellAttributes() ?>>
<span id="el_test_master_BillName">
<input type="text" data-table="test_master" data-field="x_BillName" name="x_BillName" id="x_BillName" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($test_master->BillName->getPlaceHolder()) ?>" value="<?php echo $test_master->BillName->EditValue ?>"<?php echo $test_master->BillName->editAttributes() ?>>
</span>
<?php echo $test_master->BillName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($test_master->ActualAmt->Visible) { // ActualAmt ?>
	<div id="r_ActualAmt" class="form-group row">
		<label id="elh_test_master_ActualAmt" for="x_ActualAmt" class="<?php echo $test_master_add->LeftColumnClass ?>"><?php echo $test_master->ActualAmt->caption() ?><?php echo ($test_master->ActualAmt->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $test_master_add->RightColumnClass ?>"><div<?php echo $test_master->ActualAmt->cellAttributes() ?>>
<span id="el_test_master_ActualAmt">
<input type="text" data-table="test_master" data-field="x_ActualAmt" name="x_ActualAmt" id="x_ActualAmt" size="30" placeholder="<?php echo HtmlEncode($test_master->ActualAmt->getPlaceHolder()) ?>" value="<?php echo $test_master->ActualAmt->EditValue ?>"<?php echo $test_master->ActualAmt->editAttributes() ?>>
</span>
<?php echo $test_master->ActualAmt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($test_master->HISCD->Visible) { // HISCD ?>
	<div id="r_HISCD" class="form-group row">
		<label id="elh_test_master_HISCD" for="x_HISCD" class="<?php echo $test_master_add->LeftColumnClass ?>"><?php echo $test_master->HISCD->caption() ?><?php echo ($test_master->HISCD->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $test_master_add->RightColumnClass ?>"><div<?php echo $test_master->HISCD->cellAttributes() ?>>
<span id="el_test_master_HISCD">
<input type="text" data-table="test_master" data-field="x_HISCD" name="x_HISCD" id="x_HISCD" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($test_master->HISCD->getPlaceHolder()) ?>" value="<?php echo $test_master->HISCD->EditValue ?>"<?php echo $test_master->HISCD->editAttributes() ?>>
</span>
<?php echo $test_master->HISCD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($test_master->PriceList->Visible) { // PriceList ?>
	<div id="r_PriceList" class="form-group row">
		<label id="elh_test_master_PriceList" for="x_PriceList" class="<?php echo $test_master_add->LeftColumnClass ?>"><?php echo $test_master->PriceList->caption() ?><?php echo ($test_master->PriceList->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $test_master_add->RightColumnClass ?>"><div<?php echo $test_master->PriceList->cellAttributes() ?>>
<span id="el_test_master_PriceList">
<input type="text" data-table="test_master" data-field="x_PriceList" name="x_PriceList" id="x_PriceList" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($test_master->PriceList->getPlaceHolder()) ?>" value="<?php echo $test_master->PriceList->EditValue ?>"<?php echo $test_master->PriceList->editAttributes() ?>>
</span>
<?php echo $test_master->PriceList->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($test_master->IPAmt->Visible) { // IPAmt ?>
	<div id="r_IPAmt" class="form-group row">
		<label id="elh_test_master_IPAmt" for="x_IPAmt" class="<?php echo $test_master_add->LeftColumnClass ?>"><?php echo $test_master->IPAmt->caption() ?><?php echo ($test_master->IPAmt->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $test_master_add->RightColumnClass ?>"><div<?php echo $test_master->IPAmt->cellAttributes() ?>>
<span id="el_test_master_IPAmt">
<input type="text" data-table="test_master" data-field="x_IPAmt" name="x_IPAmt" id="x_IPAmt" size="30" placeholder="<?php echo HtmlEncode($test_master->IPAmt->getPlaceHolder()) ?>" value="<?php echo $test_master->IPAmt->EditValue ?>"<?php echo $test_master->IPAmt->editAttributes() ?>>
</span>
<?php echo $test_master->IPAmt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($test_master->InsAmt->Visible) { // InsAmt ?>
	<div id="r_InsAmt" class="form-group row">
		<label id="elh_test_master_InsAmt" for="x_InsAmt" class="<?php echo $test_master_add->LeftColumnClass ?>"><?php echo $test_master->InsAmt->caption() ?><?php echo ($test_master->InsAmt->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $test_master_add->RightColumnClass ?>"><div<?php echo $test_master->InsAmt->cellAttributes() ?>>
<span id="el_test_master_InsAmt">
<input type="text" data-table="test_master" data-field="x_InsAmt" name="x_InsAmt" id="x_InsAmt" size="30" placeholder="<?php echo HtmlEncode($test_master->InsAmt->getPlaceHolder()) ?>" value="<?php echo $test_master->InsAmt->EditValue ?>"<?php echo $test_master->InsAmt->editAttributes() ?>>
</span>
<?php echo $test_master->InsAmt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($test_master->ManualCD->Visible) { // ManualCD ?>
	<div id="r_ManualCD" class="form-group row">
		<label id="elh_test_master_ManualCD" for="x_ManualCD" class="<?php echo $test_master_add->LeftColumnClass ?>"><?php echo $test_master->ManualCD->caption() ?><?php echo ($test_master->ManualCD->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $test_master_add->RightColumnClass ?>"><div<?php echo $test_master->ManualCD->cellAttributes() ?>>
<span id="el_test_master_ManualCD">
<input type="text" data-table="test_master" data-field="x_ManualCD" name="x_ManualCD" id="x_ManualCD" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($test_master->ManualCD->getPlaceHolder()) ?>" value="<?php echo $test_master->ManualCD->EditValue ?>"<?php echo $test_master->ManualCD->editAttributes() ?>>
</span>
<?php echo $test_master->ManualCD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($test_master->Free->Visible) { // Free ?>
	<div id="r_Free" class="form-group row">
		<label id="elh_test_master_Free" for="x_Free" class="<?php echo $test_master_add->LeftColumnClass ?>"><?php echo $test_master->Free->caption() ?><?php echo ($test_master->Free->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $test_master_add->RightColumnClass ?>"><div<?php echo $test_master->Free->cellAttributes() ?>>
<span id="el_test_master_Free">
<input type="text" data-table="test_master" data-field="x_Free" name="x_Free" id="x_Free" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($test_master->Free->getPlaceHolder()) ?>" value="<?php echo $test_master->Free->EditValue ?>"<?php echo $test_master->Free->editAttributes() ?>>
</span>
<?php echo $test_master->Free->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($test_master->AutoAuth->Visible) { // AutoAuth ?>
	<div id="r_AutoAuth" class="form-group row">
		<label id="elh_test_master_AutoAuth" for="x_AutoAuth" class="<?php echo $test_master_add->LeftColumnClass ?>"><?php echo $test_master->AutoAuth->caption() ?><?php echo ($test_master->AutoAuth->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $test_master_add->RightColumnClass ?>"><div<?php echo $test_master->AutoAuth->cellAttributes() ?>>
<span id="el_test_master_AutoAuth">
<input type="text" data-table="test_master" data-field="x_AutoAuth" name="x_AutoAuth" id="x_AutoAuth" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($test_master->AutoAuth->getPlaceHolder()) ?>" value="<?php echo $test_master->AutoAuth->EditValue ?>"<?php echo $test_master->AutoAuth->editAttributes() ?>>
</span>
<?php echo $test_master->AutoAuth->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($test_master->ProductCD->Visible) { // ProductCD ?>
	<div id="r_ProductCD" class="form-group row">
		<label id="elh_test_master_ProductCD" for="x_ProductCD" class="<?php echo $test_master_add->LeftColumnClass ?>"><?php echo $test_master->ProductCD->caption() ?><?php echo ($test_master->ProductCD->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $test_master_add->RightColumnClass ?>"><div<?php echo $test_master->ProductCD->cellAttributes() ?>>
<span id="el_test_master_ProductCD">
<input type="text" data-table="test_master" data-field="x_ProductCD" name="x_ProductCD" id="x_ProductCD" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($test_master->ProductCD->getPlaceHolder()) ?>" value="<?php echo $test_master->ProductCD->EditValue ?>"<?php echo $test_master->ProductCD->editAttributes() ?>>
</span>
<?php echo $test_master->ProductCD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($test_master->Inventory->Visible) { // Inventory ?>
	<div id="r_Inventory" class="form-group row">
		<label id="elh_test_master_Inventory" for="x_Inventory" class="<?php echo $test_master_add->LeftColumnClass ?>"><?php echo $test_master->Inventory->caption() ?><?php echo ($test_master->Inventory->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $test_master_add->RightColumnClass ?>"><div<?php echo $test_master->Inventory->cellAttributes() ?>>
<span id="el_test_master_Inventory">
<input type="text" data-table="test_master" data-field="x_Inventory" name="x_Inventory" id="x_Inventory" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($test_master->Inventory->getPlaceHolder()) ?>" value="<?php echo $test_master->Inventory->EditValue ?>"<?php echo $test_master->Inventory->editAttributes() ?>>
</span>
<?php echo $test_master->Inventory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($test_master->IntimateTest->Visible) { // IntimateTest ?>
	<div id="r_IntimateTest" class="form-group row">
		<label id="elh_test_master_IntimateTest" for="x_IntimateTest" class="<?php echo $test_master_add->LeftColumnClass ?>"><?php echo $test_master->IntimateTest->caption() ?><?php echo ($test_master->IntimateTest->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $test_master_add->RightColumnClass ?>"><div<?php echo $test_master->IntimateTest->cellAttributes() ?>>
<span id="el_test_master_IntimateTest">
<input type="text" data-table="test_master" data-field="x_IntimateTest" name="x_IntimateTest" id="x_IntimateTest" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($test_master->IntimateTest->getPlaceHolder()) ?>" value="<?php echo $test_master->IntimateTest->EditValue ?>"<?php echo $test_master->IntimateTest->editAttributes() ?>>
</span>
<?php echo $test_master->IntimateTest->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($test_master->Manual->Visible) { // Manual ?>
	<div id="r_Manual" class="form-group row">
		<label id="elh_test_master_Manual" for="x_Manual" class="<?php echo $test_master_add->LeftColumnClass ?>"><?php echo $test_master->Manual->caption() ?><?php echo ($test_master->Manual->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $test_master_add->RightColumnClass ?>"><div<?php echo $test_master->Manual->cellAttributes() ?>>
<span id="el_test_master_Manual">
<input type="text" data-table="test_master" data-field="x_Manual" name="x_Manual" id="x_Manual" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($test_master->Manual->getPlaceHolder()) ?>" value="<?php echo $test_master->Manual->EditValue ?>"<?php echo $test_master->Manual->editAttributes() ?>>
</span>
<?php echo $test_master->Manual->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$test_master_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $test_master_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $test_master_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$test_master_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$test_master_add->terminate();
?>