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
$lab_test_master_add = new lab_test_master_add();

// Run the page
$lab_test_master_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_test_master_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var flab_test_masteradd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	flab_test_masteradd = currentForm = new ew.Form("flab_test_masteradd", "add");

	// Validate form
	flab_test_masteradd.validate = function() {
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
			<?php if ($lab_test_master_add->MainDeptCd->Required) { ?>
				elm = this.getElements("x" + infix + "_MainDeptCd");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_add->MainDeptCd->caption(), $lab_test_master_add->MainDeptCd->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_add->DeptCd->Required) { ?>
				elm = this.getElements("x" + infix + "_DeptCd");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_add->DeptCd->caption(), $lab_test_master_add->DeptCd->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_add->TestCd->Required) { ?>
				elm = this.getElements("x" + infix + "_TestCd");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_add->TestCd->caption(), $lab_test_master_add->TestCd->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_add->TestSubCd->Required) { ?>
				elm = this.getElements("x" + infix + "_TestSubCd");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_add->TestSubCd->caption(), $lab_test_master_add->TestSubCd->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_add->TestName->Required) { ?>
				elm = this.getElements("x" + infix + "_TestName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_add->TestName->caption(), $lab_test_master_add->TestName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_add->XrayPart->Required) { ?>
				elm = this.getElements("x" + infix + "_XrayPart");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_add->XrayPart->caption(), $lab_test_master_add->XrayPart->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_add->Method->Required) { ?>
				elm = this.getElements("x" + infix + "_Method");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_add->Method->caption(), $lab_test_master_add->Method->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_add->Order->Required) { ?>
				elm = this.getElements("x" + infix + "_Order");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_add->Order->caption(), $lab_test_master_add->Order->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Order");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_test_master_add->Order->errorMessage()) ?>");
			<?php if ($lab_test_master_add->Form->Required) { ?>
				elm = this.getElements("x" + infix + "_Form");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_add->Form->caption(), $lab_test_master_add->Form->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_add->Amt->Required) { ?>
				elm = this.getElements("x" + infix + "_Amt");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_add->Amt->caption(), $lab_test_master_add->Amt->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Amt");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_test_master_add->Amt->errorMessage()) ?>");
			<?php if ($lab_test_master_add->SplAmt->Required) { ?>
				elm = this.getElements("x" + infix + "_SplAmt");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_add->SplAmt->caption(), $lab_test_master_add->SplAmt->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SplAmt");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_test_master_add->SplAmt->errorMessage()) ?>");
			<?php if ($lab_test_master_add->ResType->Required) { ?>
				elm = this.getElements("x" + infix + "_ResType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_add->ResType->caption(), $lab_test_master_add->ResType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_add->UnitCD->Required) { ?>
				elm = this.getElements("x" + infix + "_UnitCD");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_add->UnitCD->caption(), $lab_test_master_add->UnitCD->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_add->RefValue->Required) { ?>
				elm = this.getElements("x" + infix + "_RefValue");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_add->RefValue->caption(), $lab_test_master_add->RefValue->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_add->Sample->Required) { ?>
				elm = this.getElements("x" + infix + "_Sample");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_add->Sample->caption(), $lab_test_master_add->Sample->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_add->NoD->Required) { ?>
				elm = this.getElements("x" + infix + "_NoD");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_add->NoD->caption(), $lab_test_master_add->NoD->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_NoD");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_test_master_add->NoD->errorMessage()) ?>");
			<?php if ($lab_test_master_add->BillOrder->Required) { ?>
				elm = this.getElements("x" + infix + "_BillOrder");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_add->BillOrder->caption(), $lab_test_master_add->BillOrder->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BillOrder");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_test_master_add->BillOrder->errorMessage()) ?>");
			<?php if ($lab_test_master_add->Formula->Required) { ?>
				elm = this.getElements("x" + infix + "_Formula");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_add->Formula->caption(), $lab_test_master_add->Formula->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_add->Inactive->Required) { ?>
				elm = this.getElements("x" + infix + "_Inactive");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_add->Inactive->caption(), $lab_test_master_add->Inactive->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_add->ReagentAmt->Required) { ?>
				elm = this.getElements("x" + infix + "_ReagentAmt");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_add->ReagentAmt->caption(), $lab_test_master_add->ReagentAmt->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ReagentAmt");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_test_master_add->ReagentAmt->errorMessage()) ?>");
			<?php if ($lab_test_master_add->LabAmt->Required) { ?>
				elm = this.getElements("x" + infix + "_LabAmt");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_add->LabAmt->caption(), $lab_test_master_add->LabAmt->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_LabAmt");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_test_master_add->LabAmt->errorMessage()) ?>");
			<?php if ($lab_test_master_add->RefAmt->Required) { ?>
				elm = this.getElements("x" + infix + "_RefAmt");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_add->RefAmt->caption(), $lab_test_master_add->RefAmt->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RefAmt");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_test_master_add->RefAmt->errorMessage()) ?>");
			<?php if ($lab_test_master_add->CreFrom->Required) { ?>
				elm = this.getElements("x" + infix + "_CreFrom");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_add->CreFrom->caption(), $lab_test_master_add->CreFrom->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_CreFrom");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_test_master_add->CreFrom->errorMessage()) ?>");
			<?php if ($lab_test_master_add->CreTo->Required) { ?>
				elm = this.getElements("x" + infix + "_CreTo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_add->CreTo->caption(), $lab_test_master_add->CreTo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_CreTo");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_test_master_add->CreTo->errorMessage()) ?>");
			<?php if ($lab_test_master_add->Note->Required) { ?>
				elm = this.getElements("x" + infix + "_Note");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_add->Note->caption(), $lab_test_master_add->Note->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_add->Sun->Required) { ?>
				elm = this.getElements("x" + infix + "_Sun");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_add->Sun->caption(), $lab_test_master_add->Sun->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_add->Mon->Required) { ?>
				elm = this.getElements("x" + infix + "_Mon");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_add->Mon->caption(), $lab_test_master_add->Mon->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_add->Tue->Required) { ?>
				elm = this.getElements("x" + infix + "_Tue");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_add->Tue->caption(), $lab_test_master_add->Tue->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_add->Wed->Required) { ?>
				elm = this.getElements("x" + infix + "_Wed");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_add->Wed->caption(), $lab_test_master_add->Wed->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_add->Thi->Required) { ?>
				elm = this.getElements("x" + infix + "_Thi");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_add->Thi->caption(), $lab_test_master_add->Thi->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_add->Fri->Required) { ?>
				elm = this.getElements("x" + infix + "_Fri");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_add->Fri->caption(), $lab_test_master_add->Fri->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_add->Sat->Required) { ?>
				elm = this.getElements("x" + infix + "_Sat");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_add->Sat->caption(), $lab_test_master_add->Sat->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_add->Days->Required) { ?>
				elm = this.getElements("x" + infix + "_Days");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_add->Days->caption(), $lab_test_master_add->Days->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Days");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_test_master_add->Days->errorMessage()) ?>");
			<?php if ($lab_test_master_add->Cutoff->Required) { ?>
				elm = this.getElements("x" + infix + "_Cutoff");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_add->Cutoff->caption(), $lab_test_master_add->Cutoff->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_add->FontBold->Required) { ?>
				elm = this.getElements("x" + infix + "_FontBold");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_add->FontBold->caption(), $lab_test_master_add->FontBold->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_add->TestHeading->Required) { ?>
				elm = this.getElements("x" + infix + "_TestHeading");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_add->TestHeading->caption(), $lab_test_master_add->TestHeading->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_add->Outsource->Required) { ?>
				elm = this.getElements("x" + infix + "_Outsource");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_add->Outsource->caption(), $lab_test_master_add->Outsource->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_add->NoResult->Required) { ?>
				elm = this.getElements("x" + infix + "_NoResult");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_add->NoResult->caption(), $lab_test_master_add->NoResult->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_add->GraphLow->Required) { ?>
				elm = this.getElements("x" + infix + "_GraphLow");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_add->GraphLow->caption(), $lab_test_master_add->GraphLow->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_GraphLow");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_test_master_add->GraphLow->errorMessage()) ?>");
			<?php if ($lab_test_master_add->GraphHigh->Required) { ?>
				elm = this.getElements("x" + infix + "_GraphHigh");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_add->GraphHigh->caption(), $lab_test_master_add->GraphHigh->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_GraphHigh");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_test_master_add->GraphHigh->errorMessage()) ?>");
			<?php if ($lab_test_master_add->CollSample->Required) { ?>
				elm = this.getElements("x" + infix + "_CollSample");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_add->CollSample->caption(), $lab_test_master_add->CollSample->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_add->ProcessTime->Required) { ?>
				elm = this.getElements("x" + infix + "_ProcessTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_add->ProcessTime->caption(), $lab_test_master_add->ProcessTime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_add->TamilName->Required) { ?>
				elm = this.getElements("x" + infix + "_TamilName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_add->TamilName->caption(), $lab_test_master_add->TamilName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_add->ShortName->Required) { ?>
				elm = this.getElements("x" + infix + "_ShortName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_add->ShortName->caption(), $lab_test_master_add->ShortName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_add->Individual->Required) { ?>
				elm = this.getElements("x" + infix + "_Individual");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_add->Individual->caption(), $lab_test_master_add->Individual->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_add->PrevAmt->Required) { ?>
				elm = this.getElements("x" + infix + "_PrevAmt");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_add->PrevAmt->caption(), $lab_test_master_add->PrevAmt->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PrevAmt");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_test_master_add->PrevAmt->errorMessage()) ?>");
			<?php if ($lab_test_master_add->PrevSplAmt->Required) { ?>
				elm = this.getElements("x" + infix + "_PrevSplAmt");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_add->PrevSplAmt->caption(), $lab_test_master_add->PrevSplAmt->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PrevSplAmt");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_test_master_add->PrevSplAmt->errorMessage()) ?>");
			<?php if ($lab_test_master_add->Remarks->Required) { ?>
				elm = this.getElements("x" + infix + "_Remarks");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_add->Remarks->caption(), $lab_test_master_add->Remarks->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_add->EditDate->Required) { ?>
				elm = this.getElements("x" + infix + "_EditDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_add->EditDate->caption(), $lab_test_master_add->EditDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_EditDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_test_master_add->EditDate->errorMessage()) ?>");
			<?php if ($lab_test_master_add->BillName->Required) { ?>
				elm = this.getElements("x" + infix + "_BillName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_add->BillName->caption(), $lab_test_master_add->BillName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_add->ActualAmt->Required) { ?>
				elm = this.getElements("x" + infix + "_ActualAmt");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_add->ActualAmt->caption(), $lab_test_master_add->ActualAmt->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ActualAmt");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_test_master_add->ActualAmt->errorMessage()) ?>");
			<?php if ($lab_test_master_add->HISCD->Required) { ?>
				elm = this.getElements("x" + infix + "_HISCD");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_add->HISCD->caption(), $lab_test_master_add->HISCD->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_add->PriceList->Required) { ?>
				elm = this.getElements("x" + infix + "_PriceList");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_add->PriceList->caption(), $lab_test_master_add->PriceList->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_add->IPAmt->Required) { ?>
				elm = this.getElements("x" + infix + "_IPAmt");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_add->IPAmt->caption(), $lab_test_master_add->IPAmt->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_IPAmt");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_test_master_add->IPAmt->errorMessage()) ?>");
			<?php if ($lab_test_master_add->InsAmt->Required) { ?>
				elm = this.getElements("x" + infix + "_InsAmt");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_add->InsAmt->caption(), $lab_test_master_add->InsAmt->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_InsAmt");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_test_master_add->InsAmt->errorMessage()) ?>");
			<?php if ($lab_test_master_add->ManualCD->Required) { ?>
				elm = this.getElements("x" + infix + "_ManualCD");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_add->ManualCD->caption(), $lab_test_master_add->ManualCD->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_add->Free->Required) { ?>
				elm = this.getElements("x" + infix + "_Free");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_add->Free->caption(), $lab_test_master_add->Free->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_add->AutoAuth->Required) { ?>
				elm = this.getElements("x" + infix + "_AutoAuth");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_add->AutoAuth->caption(), $lab_test_master_add->AutoAuth->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_add->ProductCD->Required) { ?>
				elm = this.getElements("x" + infix + "_ProductCD");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_add->ProductCD->caption(), $lab_test_master_add->ProductCD->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_add->Inventory->Required) { ?>
				elm = this.getElements("x" + infix + "_Inventory");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_add->Inventory->caption(), $lab_test_master_add->Inventory->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_add->IntimateTest->Required) { ?>
				elm = this.getElements("x" + infix + "_IntimateTest");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_add->IntimateTest->caption(), $lab_test_master_add->IntimateTest->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_add->Manual->Required) { ?>
				elm = this.getElements("x" + infix + "_Manual");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_add->Manual->caption(), $lab_test_master_add->Manual->RequiredErrorMessage)) ?>");
			<?php } ?>

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
	flab_test_masteradd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	flab_test_masteradd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("flab_test_masteradd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $lab_test_master_add->showPageHeader(); ?>
<?php
$lab_test_master_add->showMessage();
?>
<form name="flab_test_masteradd" id="flab_test_masteradd" class="<?php echo $lab_test_master_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_test_master">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$lab_test_master_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($lab_test_master_add->MainDeptCd->Visible) { // MainDeptCd ?>
	<div id="r_MainDeptCd" class="form-group row">
		<label id="elh_lab_test_master_MainDeptCd" for="x_MainDeptCd" class="<?php echo $lab_test_master_add->LeftColumnClass ?>"><?php echo $lab_test_master_add->MainDeptCd->caption() ?><?php echo $lab_test_master_add->MainDeptCd->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_add->RightColumnClass ?>"><div <?php echo $lab_test_master_add->MainDeptCd->cellAttributes() ?>>
<span id="el_lab_test_master_MainDeptCd">
<input type="text" data-table="lab_test_master" data-field="x_MainDeptCd" name="x_MainDeptCd" id="x_MainDeptCd" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($lab_test_master_add->MainDeptCd->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_add->MainDeptCd->EditValue ?>"<?php echo $lab_test_master_add->MainDeptCd->editAttributes() ?>>
</span>
<?php echo $lab_test_master_add->MainDeptCd->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_add->DeptCd->Visible) { // DeptCd ?>
	<div id="r_DeptCd" class="form-group row">
		<label id="elh_lab_test_master_DeptCd" for="x_DeptCd" class="<?php echo $lab_test_master_add->LeftColumnClass ?>"><?php echo $lab_test_master_add->DeptCd->caption() ?><?php echo $lab_test_master_add->DeptCd->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_add->RightColumnClass ?>"><div <?php echo $lab_test_master_add->DeptCd->cellAttributes() ?>>
<span id="el_lab_test_master_DeptCd">
<input type="text" data-table="lab_test_master" data-field="x_DeptCd" name="x_DeptCd" id="x_DeptCd" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($lab_test_master_add->DeptCd->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_add->DeptCd->EditValue ?>"<?php echo $lab_test_master_add->DeptCd->editAttributes() ?>>
</span>
<?php echo $lab_test_master_add->DeptCd->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_add->TestCd->Visible) { // TestCd ?>
	<div id="r_TestCd" class="form-group row">
		<label id="elh_lab_test_master_TestCd" for="x_TestCd" class="<?php echo $lab_test_master_add->LeftColumnClass ?>"><?php echo $lab_test_master_add->TestCd->caption() ?><?php echo $lab_test_master_add->TestCd->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_add->RightColumnClass ?>"><div <?php echo $lab_test_master_add->TestCd->cellAttributes() ?>>
<span id="el_lab_test_master_TestCd">
<input type="text" data-table="lab_test_master" data-field="x_TestCd" name="x_TestCd" id="x_TestCd" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($lab_test_master_add->TestCd->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_add->TestCd->EditValue ?>"<?php echo $lab_test_master_add->TestCd->editAttributes() ?>>
</span>
<?php echo $lab_test_master_add->TestCd->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_add->TestSubCd->Visible) { // TestSubCd ?>
	<div id="r_TestSubCd" class="form-group row">
		<label id="elh_lab_test_master_TestSubCd" for="x_TestSubCd" class="<?php echo $lab_test_master_add->LeftColumnClass ?>"><?php echo $lab_test_master_add->TestSubCd->caption() ?><?php echo $lab_test_master_add->TestSubCd->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_add->RightColumnClass ?>"><div <?php echo $lab_test_master_add->TestSubCd->cellAttributes() ?>>
<span id="el_lab_test_master_TestSubCd">
<input type="text" data-table="lab_test_master" data-field="x_TestSubCd" name="x_TestSubCd" id="x_TestSubCd" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($lab_test_master_add->TestSubCd->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_add->TestSubCd->EditValue ?>"<?php echo $lab_test_master_add->TestSubCd->editAttributes() ?>>
</span>
<?php echo $lab_test_master_add->TestSubCd->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_add->TestName->Visible) { // TestName ?>
	<div id="r_TestName" class="form-group row">
		<label id="elh_lab_test_master_TestName" for="x_TestName" class="<?php echo $lab_test_master_add->LeftColumnClass ?>"><?php echo $lab_test_master_add->TestName->caption() ?><?php echo $lab_test_master_add->TestName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_add->RightColumnClass ?>"><div <?php echo $lab_test_master_add->TestName->cellAttributes() ?>>
<span id="el_lab_test_master_TestName">
<input type="text" data-table="lab_test_master" data-field="x_TestName" name="x_TestName" id="x_TestName" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($lab_test_master_add->TestName->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_add->TestName->EditValue ?>"<?php echo $lab_test_master_add->TestName->editAttributes() ?>>
</span>
<?php echo $lab_test_master_add->TestName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_add->XrayPart->Visible) { // XrayPart ?>
	<div id="r_XrayPart" class="form-group row">
		<label id="elh_lab_test_master_XrayPart" for="x_XrayPart" class="<?php echo $lab_test_master_add->LeftColumnClass ?>"><?php echo $lab_test_master_add->XrayPart->caption() ?><?php echo $lab_test_master_add->XrayPart->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_add->RightColumnClass ?>"><div <?php echo $lab_test_master_add->XrayPart->cellAttributes() ?>>
<span id="el_lab_test_master_XrayPart">
<input type="text" data-table="lab_test_master" data-field="x_XrayPart" name="x_XrayPart" id="x_XrayPart" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($lab_test_master_add->XrayPart->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_add->XrayPart->EditValue ?>"<?php echo $lab_test_master_add->XrayPart->editAttributes() ?>>
</span>
<?php echo $lab_test_master_add->XrayPart->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_add->Method->Visible) { // Method ?>
	<div id="r_Method" class="form-group row">
		<label id="elh_lab_test_master_Method" for="x_Method" class="<?php echo $lab_test_master_add->LeftColumnClass ?>"><?php echo $lab_test_master_add->Method->caption() ?><?php echo $lab_test_master_add->Method->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_add->RightColumnClass ?>"><div <?php echo $lab_test_master_add->Method->cellAttributes() ?>>
<span id="el_lab_test_master_Method">
<input type="text" data-table="lab_test_master" data-field="x_Method" name="x_Method" id="x_Method" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($lab_test_master_add->Method->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_add->Method->EditValue ?>"<?php echo $lab_test_master_add->Method->editAttributes() ?>>
</span>
<?php echo $lab_test_master_add->Method->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_add->Order->Visible) { // Order ?>
	<div id="r_Order" class="form-group row">
		<label id="elh_lab_test_master_Order" for="x_Order" class="<?php echo $lab_test_master_add->LeftColumnClass ?>"><?php echo $lab_test_master_add->Order->caption() ?><?php echo $lab_test_master_add->Order->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_add->RightColumnClass ?>"><div <?php echo $lab_test_master_add->Order->cellAttributes() ?>>
<span id="el_lab_test_master_Order">
<input type="text" data-table="lab_test_master" data-field="x_Order" name="x_Order" id="x_Order" size="30" placeholder="<?php echo HtmlEncode($lab_test_master_add->Order->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_add->Order->EditValue ?>"<?php echo $lab_test_master_add->Order->editAttributes() ?>>
</span>
<?php echo $lab_test_master_add->Order->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_add->Form->Visible) { // Form ?>
	<div id="r_Form" class="form-group row">
		<label id="elh_lab_test_master_Form" for="x_Form" class="<?php echo $lab_test_master_add->LeftColumnClass ?>"><?php echo $lab_test_master_add->Form->caption() ?><?php echo $lab_test_master_add->Form->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_add->RightColumnClass ?>"><div <?php echo $lab_test_master_add->Form->cellAttributes() ?>>
<span id="el_lab_test_master_Form">
<input type="text" data-table="lab_test_master" data-field="x_Form" name="x_Form" id="x_Form" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($lab_test_master_add->Form->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_add->Form->EditValue ?>"<?php echo $lab_test_master_add->Form->editAttributes() ?>>
</span>
<?php echo $lab_test_master_add->Form->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_add->Amt->Visible) { // Amt ?>
	<div id="r_Amt" class="form-group row">
		<label id="elh_lab_test_master_Amt" for="x_Amt" class="<?php echo $lab_test_master_add->LeftColumnClass ?>"><?php echo $lab_test_master_add->Amt->caption() ?><?php echo $lab_test_master_add->Amt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_add->RightColumnClass ?>"><div <?php echo $lab_test_master_add->Amt->cellAttributes() ?>>
<span id="el_lab_test_master_Amt">
<input type="text" data-table="lab_test_master" data-field="x_Amt" name="x_Amt" id="x_Amt" size="30" placeholder="<?php echo HtmlEncode($lab_test_master_add->Amt->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_add->Amt->EditValue ?>"<?php echo $lab_test_master_add->Amt->editAttributes() ?>>
</span>
<?php echo $lab_test_master_add->Amt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_add->SplAmt->Visible) { // SplAmt ?>
	<div id="r_SplAmt" class="form-group row">
		<label id="elh_lab_test_master_SplAmt" for="x_SplAmt" class="<?php echo $lab_test_master_add->LeftColumnClass ?>"><?php echo $lab_test_master_add->SplAmt->caption() ?><?php echo $lab_test_master_add->SplAmt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_add->RightColumnClass ?>"><div <?php echo $lab_test_master_add->SplAmt->cellAttributes() ?>>
<span id="el_lab_test_master_SplAmt">
<input type="text" data-table="lab_test_master" data-field="x_SplAmt" name="x_SplAmt" id="x_SplAmt" size="30" placeholder="<?php echo HtmlEncode($lab_test_master_add->SplAmt->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_add->SplAmt->EditValue ?>"<?php echo $lab_test_master_add->SplAmt->editAttributes() ?>>
</span>
<?php echo $lab_test_master_add->SplAmt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_add->ResType->Visible) { // ResType ?>
	<div id="r_ResType" class="form-group row">
		<label id="elh_lab_test_master_ResType" for="x_ResType" class="<?php echo $lab_test_master_add->LeftColumnClass ?>"><?php echo $lab_test_master_add->ResType->caption() ?><?php echo $lab_test_master_add->ResType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_add->RightColumnClass ?>"><div <?php echo $lab_test_master_add->ResType->cellAttributes() ?>>
<span id="el_lab_test_master_ResType">
<input type="text" data-table="lab_test_master" data-field="x_ResType" name="x_ResType" id="x_ResType" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($lab_test_master_add->ResType->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_add->ResType->EditValue ?>"<?php echo $lab_test_master_add->ResType->editAttributes() ?>>
</span>
<?php echo $lab_test_master_add->ResType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_add->UnitCD->Visible) { // UnitCD ?>
	<div id="r_UnitCD" class="form-group row">
		<label id="elh_lab_test_master_UnitCD" for="x_UnitCD" class="<?php echo $lab_test_master_add->LeftColumnClass ?>"><?php echo $lab_test_master_add->UnitCD->caption() ?><?php echo $lab_test_master_add->UnitCD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_add->RightColumnClass ?>"><div <?php echo $lab_test_master_add->UnitCD->cellAttributes() ?>>
<span id="el_lab_test_master_UnitCD">
<input type="text" data-table="lab_test_master" data-field="x_UnitCD" name="x_UnitCD" id="x_UnitCD" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($lab_test_master_add->UnitCD->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_add->UnitCD->EditValue ?>"<?php echo $lab_test_master_add->UnitCD->editAttributes() ?>>
</span>
<?php echo $lab_test_master_add->UnitCD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_add->RefValue->Visible) { // RefValue ?>
	<div id="r_RefValue" class="form-group row">
		<label id="elh_lab_test_master_RefValue" for="x_RefValue" class="<?php echo $lab_test_master_add->LeftColumnClass ?>"><?php echo $lab_test_master_add->RefValue->caption() ?><?php echo $lab_test_master_add->RefValue->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_add->RightColumnClass ?>"><div <?php echo $lab_test_master_add->RefValue->cellAttributes() ?>>
<span id="el_lab_test_master_RefValue">
<textarea data-table="lab_test_master" data-field="x_RefValue" name="x_RefValue" id="x_RefValue" cols="35" rows="4" placeholder="<?php echo HtmlEncode($lab_test_master_add->RefValue->getPlaceHolder()) ?>"<?php echo $lab_test_master_add->RefValue->editAttributes() ?>><?php echo $lab_test_master_add->RefValue->EditValue ?></textarea>
</span>
<?php echo $lab_test_master_add->RefValue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_add->Sample->Visible) { // Sample ?>
	<div id="r_Sample" class="form-group row">
		<label id="elh_lab_test_master_Sample" for="x_Sample" class="<?php echo $lab_test_master_add->LeftColumnClass ?>"><?php echo $lab_test_master_add->Sample->caption() ?><?php echo $lab_test_master_add->Sample->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_add->RightColumnClass ?>"><div <?php echo $lab_test_master_add->Sample->cellAttributes() ?>>
<span id="el_lab_test_master_Sample">
<input type="text" data-table="lab_test_master" data-field="x_Sample" name="x_Sample" id="x_Sample" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($lab_test_master_add->Sample->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_add->Sample->EditValue ?>"<?php echo $lab_test_master_add->Sample->editAttributes() ?>>
</span>
<?php echo $lab_test_master_add->Sample->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_add->NoD->Visible) { // NoD ?>
	<div id="r_NoD" class="form-group row">
		<label id="elh_lab_test_master_NoD" for="x_NoD" class="<?php echo $lab_test_master_add->LeftColumnClass ?>"><?php echo $lab_test_master_add->NoD->caption() ?><?php echo $lab_test_master_add->NoD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_add->RightColumnClass ?>"><div <?php echo $lab_test_master_add->NoD->cellAttributes() ?>>
<span id="el_lab_test_master_NoD">
<input type="text" data-table="lab_test_master" data-field="x_NoD" name="x_NoD" id="x_NoD" size="30" placeholder="<?php echo HtmlEncode($lab_test_master_add->NoD->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_add->NoD->EditValue ?>"<?php echo $lab_test_master_add->NoD->editAttributes() ?>>
</span>
<?php echo $lab_test_master_add->NoD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_add->BillOrder->Visible) { // BillOrder ?>
	<div id="r_BillOrder" class="form-group row">
		<label id="elh_lab_test_master_BillOrder" for="x_BillOrder" class="<?php echo $lab_test_master_add->LeftColumnClass ?>"><?php echo $lab_test_master_add->BillOrder->caption() ?><?php echo $lab_test_master_add->BillOrder->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_add->RightColumnClass ?>"><div <?php echo $lab_test_master_add->BillOrder->cellAttributes() ?>>
<span id="el_lab_test_master_BillOrder">
<input type="text" data-table="lab_test_master" data-field="x_BillOrder" name="x_BillOrder" id="x_BillOrder" size="30" placeholder="<?php echo HtmlEncode($lab_test_master_add->BillOrder->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_add->BillOrder->EditValue ?>"<?php echo $lab_test_master_add->BillOrder->editAttributes() ?>>
</span>
<?php echo $lab_test_master_add->BillOrder->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_add->Formula->Visible) { // Formula ?>
	<div id="r_Formula" class="form-group row">
		<label id="elh_lab_test_master_Formula" for="x_Formula" class="<?php echo $lab_test_master_add->LeftColumnClass ?>"><?php echo $lab_test_master_add->Formula->caption() ?><?php echo $lab_test_master_add->Formula->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_add->RightColumnClass ?>"><div <?php echo $lab_test_master_add->Formula->cellAttributes() ?>>
<span id="el_lab_test_master_Formula">
<textarea data-table="lab_test_master" data-field="x_Formula" name="x_Formula" id="x_Formula" cols="35" rows="4" placeholder="<?php echo HtmlEncode($lab_test_master_add->Formula->getPlaceHolder()) ?>"<?php echo $lab_test_master_add->Formula->editAttributes() ?>><?php echo $lab_test_master_add->Formula->EditValue ?></textarea>
</span>
<?php echo $lab_test_master_add->Formula->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_add->Inactive->Visible) { // Inactive ?>
	<div id="r_Inactive" class="form-group row">
		<label id="elh_lab_test_master_Inactive" for="x_Inactive" class="<?php echo $lab_test_master_add->LeftColumnClass ?>"><?php echo $lab_test_master_add->Inactive->caption() ?><?php echo $lab_test_master_add->Inactive->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_add->RightColumnClass ?>"><div <?php echo $lab_test_master_add->Inactive->cellAttributes() ?>>
<span id="el_lab_test_master_Inactive">
<input type="text" data-table="lab_test_master" data-field="x_Inactive" name="x_Inactive" id="x_Inactive" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_master_add->Inactive->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_add->Inactive->EditValue ?>"<?php echo $lab_test_master_add->Inactive->editAttributes() ?>>
</span>
<?php echo $lab_test_master_add->Inactive->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_add->ReagentAmt->Visible) { // ReagentAmt ?>
	<div id="r_ReagentAmt" class="form-group row">
		<label id="elh_lab_test_master_ReagentAmt" for="x_ReagentAmt" class="<?php echo $lab_test_master_add->LeftColumnClass ?>"><?php echo $lab_test_master_add->ReagentAmt->caption() ?><?php echo $lab_test_master_add->ReagentAmt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_add->RightColumnClass ?>"><div <?php echo $lab_test_master_add->ReagentAmt->cellAttributes() ?>>
<span id="el_lab_test_master_ReagentAmt">
<input type="text" data-table="lab_test_master" data-field="x_ReagentAmt" name="x_ReagentAmt" id="x_ReagentAmt" size="30" placeholder="<?php echo HtmlEncode($lab_test_master_add->ReagentAmt->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_add->ReagentAmt->EditValue ?>"<?php echo $lab_test_master_add->ReagentAmt->editAttributes() ?>>
</span>
<?php echo $lab_test_master_add->ReagentAmt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_add->LabAmt->Visible) { // LabAmt ?>
	<div id="r_LabAmt" class="form-group row">
		<label id="elh_lab_test_master_LabAmt" for="x_LabAmt" class="<?php echo $lab_test_master_add->LeftColumnClass ?>"><?php echo $lab_test_master_add->LabAmt->caption() ?><?php echo $lab_test_master_add->LabAmt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_add->RightColumnClass ?>"><div <?php echo $lab_test_master_add->LabAmt->cellAttributes() ?>>
<span id="el_lab_test_master_LabAmt">
<input type="text" data-table="lab_test_master" data-field="x_LabAmt" name="x_LabAmt" id="x_LabAmt" size="30" placeholder="<?php echo HtmlEncode($lab_test_master_add->LabAmt->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_add->LabAmt->EditValue ?>"<?php echo $lab_test_master_add->LabAmt->editAttributes() ?>>
</span>
<?php echo $lab_test_master_add->LabAmt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_add->RefAmt->Visible) { // RefAmt ?>
	<div id="r_RefAmt" class="form-group row">
		<label id="elh_lab_test_master_RefAmt" for="x_RefAmt" class="<?php echo $lab_test_master_add->LeftColumnClass ?>"><?php echo $lab_test_master_add->RefAmt->caption() ?><?php echo $lab_test_master_add->RefAmt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_add->RightColumnClass ?>"><div <?php echo $lab_test_master_add->RefAmt->cellAttributes() ?>>
<span id="el_lab_test_master_RefAmt">
<input type="text" data-table="lab_test_master" data-field="x_RefAmt" name="x_RefAmt" id="x_RefAmt" size="30" placeholder="<?php echo HtmlEncode($lab_test_master_add->RefAmt->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_add->RefAmt->EditValue ?>"<?php echo $lab_test_master_add->RefAmt->editAttributes() ?>>
</span>
<?php echo $lab_test_master_add->RefAmt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_add->CreFrom->Visible) { // CreFrom ?>
	<div id="r_CreFrom" class="form-group row">
		<label id="elh_lab_test_master_CreFrom" for="x_CreFrom" class="<?php echo $lab_test_master_add->LeftColumnClass ?>"><?php echo $lab_test_master_add->CreFrom->caption() ?><?php echo $lab_test_master_add->CreFrom->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_add->RightColumnClass ?>"><div <?php echo $lab_test_master_add->CreFrom->cellAttributes() ?>>
<span id="el_lab_test_master_CreFrom">
<input type="text" data-table="lab_test_master" data-field="x_CreFrom" name="x_CreFrom" id="x_CreFrom" size="30" placeholder="<?php echo HtmlEncode($lab_test_master_add->CreFrom->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_add->CreFrom->EditValue ?>"<?php echo $lab_test_master_add->CreFrom->editAttributes() ?>>
</span>
<?php echo $lab_test_master_add->CreFrom->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_add->CreTo->Visible) { // CreTo ?>
	<div id="r_CreTo" class="form-group row">
		<label id="elh_lab_test_master_CreTo" for="x_CreTo" class="<?php echo $lab_test_master_add->LeftColumnClass ?>"><?php echo $lab_test_master_add->CreTo->caption() ?><?php echo $lab_test_master_add->CreTo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_add->RightColumnClass ?>"><div <?php echo $lab_test_master_add->CreTo->cellAttributes() ?>>
<span id="el_lab_test_master_CreTo">
<input type="text" data-table="lab_test_master" data-field="x_CreTo" name="x_CreTo" id="x_CreTo" size="30" placeholder="<?php echo HtmlEncode($lab_test_master_add->CreTo->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_add->CreTo->EditValue ?>"<?php echo $lab_test_master_add->CreTo->editAttributes() ?>>
</span>
<?php echo $lab_test_master_add->CreTo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_add->Note->Visible) { // Note ?>
	<div id="r_Note" class="form-group row">
		<label id="elh_lab_test_master_Note" for="x_Note" class="<?php echo $lab_test_master_add->LeftColumnClass ?>"><?php echo $lab_test_master_add->Note->caption() ?><?php echo $lab_test_master_add->Note->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_add->RightColumnClass ?>"><div <?php echo $lab_test_master_add->Note->cellAttributes() ?>>
<span id="el_lab_test_master_Note">
<textarea data-table="lab_test_master" data-field="x_Note" name="x_Note" id="x_Note" cols="35" rows="4" placeholder="<?php echo HtmlEncode($lab_test_master_add->Note->getPlaceHolder()) ?>"<?php echo $lab_test_master_add->Note->editAttributes() ?>><?php echo $lab_test_master_add->Note->EditValue ?></textarea>
</span>
<?php echo $lab_test_master_add->Note->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_add->Sun->Visible) { // Sun ?>
	<div id="r_Sun" class="form-group row">
		<label id="elh_lab_test_master_Sun" for="x_Sun" class="<?php echo $lab_test_master_add->LeftColumnClass ?>"><?php echo $lab_test_master_add->Sun->caption() ?><?php echo $lab_test_master_add->Sun->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_add->RightColumnClass ?>"><div <?php echo $lab_test_master_add->Sun->cellAttributes() ?>>
<span id="el_lab_test_master_Sun">
<input type="text" data-table="lab_test_master" data-field="x_Sun" name="x_Sun" id="x_Sun" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_master_add->Sun->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_add->Sun->EditValue ?>"<?php echo $lab_test_master_add->Sun->editAttributes() ?>>
</span>
<?php echo $lab_test_master_add->Sun->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_add->Mon->Visible) { // Mon ?>
	<div id="r_Mon" class="form-group row">
		<label id="elh_lab_test_master_Mon" for="x_Mon" class="<?php echo $lab_test_master_add->LeftColumnClass ?>"><?php echo $lab_test_master_add->Mon->caption() ?><?php echo $lab_test_master_add->Mon->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_add->RightColumnClass ?>"><div <?php echo $lab_test_master_add->Mon->cellAttributes() ?>>
<span id="el_lab_test_master_Mon">
<input type="text" data-table="lab_test_master" data-field="x_Mon" name="x_Mon" id="x_Mon" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_master_add->Mon->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_add->Mon->EditValue ?>"<?php echo $lab_test_master_add->Mon->editAttributes() ?>>
</span>
<?php echo $lab_test_master_add->Mon->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_add->Tue->Visible) { // Tue ?>
	<div id="r_Tue" class="form-group row">
		<label id="elh_lab_test_master_Tue" for="x_Tue" class="<?php echo $lab_test_master_add->LeftColumnClass ?>"><?php echo $lab_test_master_add->Tue->caption() ?><?php echo $lab_test_master_add->Tue->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_add->RightColumnClass ?>"><div <?php echo $lab_test_master_add->Tue->cellAttributes() ?>>
<span id="el_lab_test_master_Tue">
<input type="text" data-table="lab_test_master" data-field="x_Tue" name="x_Tue" id="x_Tue" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_master_add->Tue->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_add->Tue->EditValue ?>"<?php echo $lab_test_master_add->Tue->editAttributes() ?>>
</span>
<?php echo $lab_test_master_add->Tue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_add->Wed->Visible) { // Wed ?>
	<div id="r_Wed" class="form-group row">
		<label id="elh_lab_test_master_Wed" for="x_Wed" class="<?php echo $lab_test_master_add->LeftColumnClass ?>"><?php echo $lab_test_master_add->Wed->caption() ?><?php echo $lab_test_master_add->Wed->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_add->RightColumnClass ?>"><div <?php echo $lab_test_master_add->Wed->cellAttributes() ?>>
<span id="el_lab_test_master_Wed">
<input type="text" data-table="lab_test_master" data-field="x_Wed" name="x_Wed" id="x_Wed" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_master_add->Wed->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_add->Wed->EditValue ?>"<?php echo $lab_test_master_add->Wed->editAttributes() ?>>
</span>
<?php echo $lab_test_master_add->Wed->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_add->Thi->Visible) { // Thi ?>
	<div id="r_Thi" class="form-group row">
		<label id="elh_lab_test_master_Thi" for="x_Thi" class="<?php echo $lab_test_master_add->LeftColumnClass ?>"><?php echo $lab_test_master_add->Thi->caption() ?><?php echo $lab_test_master_add->Thi->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_add->RightColumnClass ?>"><div <?php echo $lab_test_master_add->Thi->cellAttributes() ?>>
<span id="el_lab_test_master_Thi">
<input type="text" data-table="lab_test_master" data-field="x_Thi" name="x_Thi" id="x_Thi" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_master_add->Thi->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_add->Thi->EditValue ?>"<?php echo $lab_test_master_add->Thi->editAttributes() ?>>
</span>
<?php echo $lab_test_master_add->Thi->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_add->Fri->Visible) { // Fri ?>
	<div id="r_Fri" class="form-group row">
		<label id="elh_lab_test_master_Fri" for="x_Fri" class="<?php echo $lab_test_master_add->LeftColumnClass ?>"><?php echo $lab_test_master_add->Fri->caption() ?><?php echo $lab_test_master_add->Fri->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_add->RightColumnClass ?>"><div <?php echo $lab_test_master_add->Fri->cellAttributes() ?>>
<span id="el_lab_test_master_Fri">
<input type="text" data-table="lab_test_master" data-field="x_Fri" name="x_Fri" id="x_Fri" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_master_add->Fri->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_add->Fri->EditValue ?>"<?php echo $lab_test_master_add->Fri->editAttributes() ?>>
</span>
<?php echo $lab_test_master_add->Fri->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_add->Sat->Visible) { // Sat ?>
	<div id="r_Sat" class="form-group row">
		<label id="elh_lab_test_master_Sat" for="x_Sat" class="<?php echo $lab_test_master_add->LeftColumnClass ?>"><?php echo $lab_test_master_add->Sat->caption() ?><?php echo $lab_test_master_add->Sat->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_add->RightColumnClass ?>"><div <?php echo $lab_test_master_add->Sat->cellAttributes() ?>>
<span id="el_lab_test_master_Sat">
<input type="text" data-table="lab_test_master" data-field="x_Sat" name="x_Sat" id="x_Sat" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_master_add->Sat->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_add->Sat->EditValue ?>"<?php echo $lab_test_master_add->Sat->editAttributes() ?>>
</span>
<?php echo $lab_test_master_add->Sat->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_add->Days->Visible) { // Days ?>
	<div id="r_Days" class="form-group row">
		<label id="elh_lab_test_master_Days" for="x_Days" class="<?php echo $lab_test_master_add->LeftColumnClass ?>"><?php echo $lab_test_master_add->Days->caption() ?><?php echo $lab_test_master_add->Days->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_add->RightColumnClass ?>"><div <?php echo $lab_test_master_add->Days->cellAttributes() ?>>
<span id="el_lab_test_master_Days">
<input type="text" data-table="lab_test_master" data-field="x_Days" name="x_Days" id="x_Days" size="30" placeholder="<?php echo HtmlEncode($lab_test_master_add->Days->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_add->Days->EditValue ?>"<?php echo $lab_test_master_add->Days->editAttributes() ?>>
</span>
<?php echo $lab_test_master_add->Days->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_add->Cutoff->Visible) { // Cutoff ?>
	<div id="r_Cutoff" class="form-group row">
		<label id="elh_lab_test_master_Cutoff" for="x_Cutoff" class="<?php echo $lab_test_master_add->LeftColumnClass ?>"><?php echo $lab_test_master_add->Cutoff->caption() ?><?php echo $lab_test_master_add->Cutoff->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_add->RightColumnClass ?>"><div <?php echo $lab_test_master_add->Cutoff->cellAttributes() ?>>
<span id="el_lab_test_master_Cutoff">
<input type="text" data-table="lab_test_master" data-field="x_Cutoff" name="x_Cutoff" id="x_Cutoff" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($lab_test_master_add->Cutoff->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_add->Cutoff->EditValue ?>"<?php echo $lab_test_master_add->Cutoff->editAttributes() ?>>
</span>
<?php echo $lab_test_master_add->Cutoff->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_add->FontBold->Visible) { // FontBold ?>
	<div id="r_FontBold" class="form-group row">
		<label id="elh_lab_test_master_FontBold" for="x_FontBold" class="<?php echo $lab_test_master_add->LeftColumnClass ?>"><?php echo $lab_test_master_add->FontBold->caption() ?><?php echo $lab_test_master_add->FontBold->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_add->RightColumnClass ?>"><div <?php echo $lab_test_master_add->FontBold->cellAttributes() ?>>
<span id="el_lab_test_master_FontBold">
<input type="text" data-table="lab_test_master" data-field="x_FontBold" name="x_FontBold" id="x_FontBold" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_master_add->FontBold->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_add->FontBold->EditValue ?>"<?php echo $lab_test_master_add->FontBold->editAttributes() ?>>
</span>
<?php echo $lab_test_master_add->FontBold->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_add->TestHeading->Visible) { // TestHeading ?>
	<div id="r_TestHeading" class="form-group row">
		<label id="elh_lab_test_master_TestHeading" for="x_TestHeading" class="<?php echo $lab_test_master_add->LeftColumnClass ?>"><?php echo $lab_test_master_add->TestHeading->caption() ?><?php echo $lab_test_master_add->TestHeading->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_add->RightColumnClass ?>"><div <?php echo $lab_test_master_add->TestHeading->cellAttributes() ?>>
<span id="el_lab_test_master_TestHeading">
<input type="text" data-table="lab_test_master" data-field="x_TestHeading" name="x_TestHeading" id="x_TestHeading" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_master_add->TestHeading->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_add->TestHeading->EditValue ?>"<?php echo $lab_test_master_add->TestHeading->editAttributes() ?>>
</span>
<?php echo $lab_test_master_add->TestHeading->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_add->Outsource->Visible) { // Outsource ?>
	<div id="r_Outsource" class="form-group row">
		<label id="elh_lab_test_master_Outsource" for="x_Outsource" class="<?php echo $lab_test_master_add->LeftColumnClass ?>"><?php echo $lab_test_master_add->Outsource->caption() ?><?php echo $lab_test_master_add->Outsource->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_add->RightColumnClass ?>"><div <?php echo $lab_test_master_add->Outsource->cellAttributes() ?>>
<span id="el_lab_test_master_Outsource">
<input type="text" data-table="lab_test_master" data-field="x_Outsource" name="x_Outsource" id="x_Outsource" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_master_add->Outsource->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_add->Outsource->EditValue ?>"<?php echo $lab_test_master_add->Outsource->editAttributes() ?>>
</span>
<?php echo $lab_test_master_add->Outsource->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_add->NoResult->Visible) { // NoResult ?>
	<div id="r_NoResult" class="form-group row">
		<label id="elh_lab_test_master_NoResult" for="x_NoResult" class="<?php echo $lab_test_master_add->LeftColumnClass ?>"><?php echo $lab_test_master_add->NoResult->caption() ?><?php echo $lab_test_master_add->NoResult->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_add->RightColumnClass ?>"><div <?php echo $lab_test_master_add->NoResult->cellAttributes() ?>>
<span id="el_lab_test_master_NoResult">
<input type="text" data-table="lab_test_master" data-field="x_NoResult" name="x_NoResult" id="x_NoResult" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_master_add->NoResult->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_add->NoResult->EditValue ?>"<?php echo $lab_test_master_add->NoResult->editAttributes() ?>>
</span>
<?php echo $lab_test_master_add->NoResult->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_add->GraphLow->Visible) { // GraphLow ?>
	<div id="r_GraphLow" class="form-group row">
		<label id="elh_lab_test_master_GraphLow" for="x_GraphLow" class="<?php echo $lab_test_master_add->LeftColumnClass ?>"><?php echo $lab_test_master_add->GraphLow->caption() ?><?php echo $lab_test_master_add->GraphLow->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_add->RightColumnClass ?>"><div <?php echo $lab_test_master_add->GraphLow->cellAttributes() ?>>
<span id="el_lab_test_master_GraphLow">
<input type="text" data-table="lab_test_master" data-field="x_GraphLow" name="x_GraphLow" id="x_GraphLow" size="30" placeholder="<?php echo HtmlEncode($lab_test_master_add->GraphLow->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_add->GraphLow->EditValue ?>"<?php echo $lab_test_master_add->GraphLow->editAttributes() ?>>
</span>
<?php echo $lab_test_master_add->GraphLow->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_add->GraphHigh->Visible) { // GraphHigh ?>
	<div id="r_GraphHigh" class="form-group row">
		<label id="elh_lab_test_master_GraphHigh" for="x_GraphHigh" class="<?php echo $lab_test_master_add->LeftColumnClass ?>"><?php echo $lab_test_master_add->GraphHigh->caption() ?><?php echo $lab_test_master_add->GraphHigh->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_add->RightColumnClass ?>"><div <?php echo $lab_test_master_add->GraphHigh->cellAttributes() ?>>
<span id="el_lab_test_master_GraphHigh">
<input type="text" data-table="lab_test_master" data-field="x_GraphHigh" name="x_GraphHigh" id="x_GraphHigh" size="30" placeholder="<?php echo HtmlEncode($lab_test_master_add->GraphHigh->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_add->GraphHigh->EditValue ?>"<?php echo $lab_test_master_add->GraphHigh->editAttributes() ?>>
</span>
<?php echo $lab_test_master_add->GraphHigh->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_add->CollSample->Visible) { // CollSample ?>
	<div id="r_CollSample" class="form-group row">
		<label id="elh_lab_test_master_CollSample" for="x_CollSample" class="<?php echo $lab_test_master_add->LeftColumnClass ?>"><?php echo $lab_test_master_add->CollSample->caption() ?><?php echo $lab_test_master_add->CollSample->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_add->RightColumnClass ?>"><div <?php echo $lab_test_master_add->CollSample->cellAttributes() ?>>
<span id="el_lab_test_master_CollSample">
<input type="text" data-table="lab_test_master" data-field="x_CollSample" name="x_CollSample" id="x_CollSample" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($lab_test_master_add->CollSample->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_add->CollSample->EditValue ?>"<?php echo $lab_test_master_add->CollSample->editAttributes() ?>>
</span>
<?php echo $lab_test_master_add->CollSample->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_add->ProcessTime->Visible) { // ProcessTime ?>
	<div id="r_ProcessTime" class="form-group row">
		<label id="elh_lab_test_master_ProcessTime" for="x_ProcessTime" class="<?php echo $lab_test_master_add->LeftColumnClass ?>"><?php echo $lab_test_master_add->ProcessTime->caption() ?><?php echo $lab_test_master_add->ProcessTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_add->RightColumnClass ?>"><div <?php echo $lab_test_master_add->ProcessTime->cellAttributes() ?>>
<span id="el_lab_test_master_ProcessTime">
<input type="text" data-table="lab_test_master" data-field="x_ProcessTime" name="x_ProcessTime" id="x_ProcessTime" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($lab_test_master_add->ProcessTime->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_add->ProcessTime->EditValue ?>"<?php echo $lab_test_master_add->ProcessTime->editAttributes() ?>>
</span>
<?php echo $lab_test_master_add->ProcessTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_add->TamilName->Visible) { // TamilName ?>
	<div id="r_TamilName" class="form-group row">
		<label id="elh_lab_test_master_TamilName" for="x_TamilName" class="<?php echo $lab_test_master_add->LeftColumnClass ?>"><?php echo $lab_test_master_add->TamilName->caption() ?><?php echo $lab_test_master_add->TamilName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_add->RightColumnClass ?>"><div <?php echo $lab_test_master_add->TamilName->cellAttributes() ?>>
<span id="el_lab_test_master_TamilName">
<input type="text" data-table="lab_test_master" data-field="x_TamilName" name="x_TamilName" id="x_TamilName" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($lab_test_master_add->TamilName->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_add->TamilName->EditValue ?>"<?php echo $lab_test_master_add->TamilName->editAttributes() ?>>
</span>
<?php echo $lab_test_master_add->TamilName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_add->ShortName->Visible) { // ShortName ?>
	<div id="r_ShortName" class="form-group row">
		<label id="elh_lab_test_master_ShortName" for="x_ShortName" class="<?php echo $lab_test_master_add->LeftColumnClass ?>"><?php echo $lab_test_master_add->ShortName->caption() ?><?php echo $lab_test_master_add->ShortName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_add->RightColumnClass ?>"><div <?php echo $lab_test_master_add->ShortName->cellAttributes() ?>>
<span id="el_lab_test_master_ShortName">
<input type="text" data-table="lab_test_master" data-field="x_ShortName" name="x_ShortName" id="x_ShortName" size="30" maxlength="7" placeholder="<?php echo HtmlEncode($lab_test_master_add->ShortName->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_add->ShortName->EditValue ?>"<?php echo $lab_test_master_add->ShortName->editAttributes() ?>>
</span>
<?php echo $lab_test_master_add->ShortName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_add->Individual->Visible) { // Individual ?>
	<div id="r_Individual" class="form-group row">
		<label id="elh_lab_test_master_Individual" for="x_Individual" class="<?php echo $lab_test_master_add->LeftColumnClass ?>"><?php echo $lab_test_master_add->Individual->caption() ?><?php echo $lab_test_master_add->Individual->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_add->RightColumnClass ?>"><div <?php echo $lab_test_master_add->Individual->cellAttributes() ?>>
<span id="el_lab_test_master_Individual">
<input type="text" data-table="lab_test_master" data-field="x_Individual" name="x_Individual" id="x_Individual" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_master_add->Individual->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_add->Individual->EditValue ?>"<?php echo $lab_test_master_add->Individual->editAttributes() ?>>
</span>
<?php echo $lab_test_master_add->Individual->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_add->PrevAmt->Visible) { // PrevAmt ?>
	<div id="r_PrevAmt" class="form-group row">
		<label id="elh_lab_test_master_PrevAmt" for="x_PrevAmt" class="<?php echo $lab_test_master_add->LeftColumnClass ?>"><?php echo $lab_test_master_add->PrevAmt->caption() ?><?php echo $lab_test_master_add->PrevAmt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_add->RightColumnClass ?>"><div <?php echo $lab_test_master_add->PrevAmt->cellAttributes() ?>>
<span id="el_lab_test_master_PrevAmt">
<input type="text" data-table="lab_test_master" data-field="x_PrevAmt" name="x_PrevAmt" id="x_PrevAmt" size="30" placeholder="<?php echo HtmlEncode($lab_test_master_add->PrevAmt->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_add->PrevAmt->EditValue ?>"<?php echo $lab_test_master_add->PrevAmt->editAttributes() ?>>
</span>
<?php echo $lab_test_master_add->PrevAmt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_add->PrevSplAmt->Visible) { // PrevSplAmt ?>
	<div id="r_PrevSplAmt" class="form-group row">
		<label id="elh_lab_test_master_PrevSplAmt" for="x_PrevSplAmt" class="<?php echo $lab_test_master_add->LeftColumnClass ?>"><?php echo $lab_test_master_add->PrevSplAmt->caption() ?><?php echo $lab_test_master_add->PrevSplAmt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_add->RightColumnClass ?>"><div <?php echo $lab_test_master_add->PrevSplAmt->cellAttributes() ?>>
<span id="el_lab_test_master_PrevSplAmt">
<input type="text" data-table="lab_test_master" data-field="x_PrevSplAmt" name="x_PrevSplAmt" id="x_PrevSplAmt" size="30" placeholder="<?php echo HtmlEncode($lab_test_master_add->PrevSplAmt->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_add->PrevSplAmt->EditValue ?>"<?php echo $lab_test_master_add->PrevSplAmt->editAttributes() ?>>
</span>
<?php echo $lab_test_master_add->PrevSplAmt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_add->Remarks->Visible) { // Remarks ?>
	<div id="r_Remarks" class="form-group row">
		<label id="elh_lab_test_master_Remarks" for="x_Remarks" class="<?php echo $lab_test_master_add->LeftColumnClass ?>"><?php echo $lab_test_master_add->Remarks->caption() ?><?php echo $lab_test_master_add->Remarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_add->RightColumnClass ?>"><div <?php echo $lab_test_master_add->Remarks->cellAttributes() ?>>
<span id="el_lab_test_master_Remarks">
<textarea data-table="lab_test_master" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" cols="35" rows="4" placeholder="<?php echo HtmlEncode($lab_test_master_add->Remarks->getPlaceHolder()) ?>"<?php echo $lab_test_master_add->Remarks->editAttributes() ?>><?php echo $lab_test_master_add->Remarks->EditValue ?></textarea>
</span>
<?php echo $lab_test_master_add->Remarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_add->EditDate->Visible) { // EditDate ?>
	<div id="r_EditDate" class="form-group row">
		<label id="elh_lab_test_master_EditDate" for="x_EditDate" class="<?php echo $lab_test_master_add->LeftColumnClass ?>"><?php echo $lab_test_master_add->EditDate->caption() ?><?php echo $lab_test_master_add->EditDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_add->RightColumnClass ?>"><div <?php echo $lab_test_master_add->EditDate->cellAttributes() ?>>
<span id="el_lab_test_master_EditDate">
<input type="text" data-table="lab_test_master" data-field="x_EditDate" name="x_EditDate" id="x_EditDate" placeholder="<?php echo HtmlEncode($lab_test_master_add->EditDate->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_add->EditDate->EditValue ?>"<?php echo $lab_test_master_add->EditDate->editAttributes() ?>>
<?php if (!$lab_test_master_add->EditDate->ReadOnly && !$lab_test_master_add->EditDate->Disabled && !isset($lab_test_master_add->EditDate->EditAttrs["readonly"]) && !isset($lab_test_master_add->EditDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_masteradd", "datetimepicker"], function() {
	ew.createDateTimePicker("flab_test_masteradd", "x_EditDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $lab_test_master_add->EditDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_add->BillName->Visible) { // BillName ?>
	<div id="r_BillName" class="form-group row">
		<label id="elh_lab_test_master_BillName" for="x_BillName" class="<?php echo $lab_test_master_add->LeftColumnClass ?>"><?php echo $lab_test_master_add->BillName->caption() ?><?php echo $lab_test_master_add->BillName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_add->RightColumnClass ?>"><div <?php echo $lab_test_master_add->BillName->cellAttributes() ?>>
<span id="el_lab_test_master_BillName">
<input type="text" data-table="lab_test_master" data-field="x_BillName" name="x_BillName" id="x_BillName" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($lab_test_master_add->BillName->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_add->BillName->EditValue ?>"<?php echo $lab_test_master_add->BillName->editAttributes() ?>>
</span>
<?php echo $lab_test_master_add->BillName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_add->ActualAmt->Visible) { // ActualAmt ?>
	<div id="r_ActualAmt" class="form-group row">
		<label id="elh_lab_test_master_ActualAmt" for="x_ActualAmt" class="<?php echo $lab_test_master_add->LeftColumnClass ?>"><?php echo $lab_test_master_add->ActualAmt->caption() ?><?php echo $lab_test_master_add->ActualAmt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_add->RightColumnClass ?>"><div <?php echo $lab_test_master_add->ActualAmt->cellAttributes() ?>>
<span id="el_lab_test_master_ActualAmt">
<input type="text" data-table="lab_test_master" data-field="x_ActualAmt" name="x_ActualAmt" id="x_ActualAmt" size="30" placeholder="<?php echo HtmlEncode($lab_test_master_add->ActualAmt->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_add->ActualAmt->EditValue ?>"<?php echo $lab_test_master_add->ActualAmt->editAttributes() ?>>
</span>
<?php echo $lab_test_master_add->ActualAmt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_add->HISCD->Visible) { // HISCD ?>
	<div id="r_HISCD" class="form-group row">
		<label id="elh_lab_test_master_HISCD" for="x_HISCD" class="<?php echo $lab_test_master_add->LeftColumnClass ?>"><?php echo $lab_test_master_add->HISCD->caption() ?><?php echo $lab_test_master_add->HISCD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_add->RightColumnClass ?>"><div <?php echo $lab_test_master_add->HISCD->cellAttributes() ?>>
<span id="el_lab_test_master_HISCD">
<input type="text" data-table="lab_test_master" data-field="x_HISCD" name="x_HISCD" id="x_HISCD" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($lab_test_master_add->HISCD->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_add->HISCD->EditValue ?>"<?php echo $lab_test_master_add->HISCD->editAttributes() ?>>
</span>
<?php echo $lab_test_master_add->HISCD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_add->PriceList->Visible) { // PriceList ?>
	<div id="r_PriceList" class="form-group row">
		<label id="elh_lab_test_master_PriceList" for="x_PriceList" class="<?php echo $lab_test_master_add->LeftColumnClass ?>"><?php echo $lab_test_master_add->PriceList->caption() ?><?php echo $lab_test_master_add->PriceList->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_add->RightColumnClass ?>"><div <?php echo $lab_test_master_add->PriceList->cellAttributes() ?>>
<span id="el_lab_test_master_PriceList">
<input type="text" data-table="lab_test_master" data-field="x_PriceList" name="x_PriceList" id="x_PriceList" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_master_add->PriceList->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_add->PriceList->EditValue ?>"<?php echo $lab_test_master_add->PriceList->editAttributes() ?>>
</span>
<?php echo $lab_test_master_add->PriceList->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_add->IPAmt->Visible) { // IPAmt ?>
	<div id="r_IPAmt" class="form-group row">
		<label id="elh_lab_test_master_IPAmt" for="x_IPAmt" class="<?php echo $lab_test_master_add->LeftColumnClass ?>"><?php echo $lab_test_master_add->IPAmt->caption() ?><?php echo $lab_test_master_add->IPAmt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_add->RightColumnClass ?>"><div <?php echo $lab_test_master_add->IPAmt->cellAttributes() ?>>
<span id="el_lab_test_master_IPAmt">
<input type="text" data-table="lab_test_master" data-field="x_IPAmt" name="x_IPAmt" id="x_IPAmt" size="30" placeholder="<?php echo HtmlEncode($lab_test_master_add->IPAmt->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_add->IPAmt->EditValue ?>"<?php echo $lab_test_master_add->IPAmt->editAttributes() ?>>
</span>
<?php echo $lab_test_master_add->IPAmt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_add->InsAmt->Visible) { // InsAmt ?>
	<div id="r_InsAmt" class="form-group row">
		<label id="elh_lab_test_master_InsAmt" for="x_InsAmt" class="<?php echo $lab_test_master_add->LeftColumnClass ?>"><?php echo $lab_test_master_add->InsAmt->caption() ?><?php echo $lab_test_master_add->InsAmt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_add->RightColumnClass ?>"><div <?php echo $lab_test_master_add->InsAmt->cellAttributes() ?>>
<span id="el_lab_test_master_InsAmt">
<input type="text" data-table="lab_test_master" data-field="x_InsAmt" name="x_InsAmt" id="x_InsAmt" size="30" placeholder="<?php echo HtmlEncode($lab_test_master_add->InsAmt->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_add->InsAmt->EditValue ?>"<?php echo $lab_test_master_add->InsAmt->editAttributes() ?>>
</span>
<?php echo $lab_test_master_add->InsAmt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_add->ManualCD->Visible) { // ManualCD ?>
	<div id="r_ManualCD" class="form-group row">
		<label id="elh_lab_test_master_ManualCD" for="x_ManualCD" class="<?php echo $lab_test_master_add->LeftColumnClass ?>"><?php echo $lab_test_master_add->ManualCD->caption() ?><?php echo $lab_test_master_add->ManualCD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_add->RightColumnClass ?>"><div <?php echo $lab_test_master_add->ManualCD->cellAttributes() ?>>
<span id="el_lab_test_master_ManualCD">
<input type="text" data-table="lab_test_master" data-field="x_ManualCD" name="x_ManualCD" id="x_ManualCD" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($lab_test_master_add->ManualCD->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_add->ManualCD->EditValue ?>"<?php echo $lab_test_master_add->ManualCD->editAttributes() ?>>
</span>
<?php echo $lab_test_master_add->ManualCD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_add->Free->Visible) { // Free ?>
	<div id="r_Free" class="form-group row">
		<label id="elh_lab_test_master_Free" for="x_Free" class="<?php echo $lab_test_master_add->LeftColumnClass ?>"><?php echo $lab_test_master_add->Free->caption() ?><?php echo $lab_test_master_add->Free->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_add->RightColumnClass ?>"><div <?php echo $lab_test_master_add->Free->cellAttributes() ?>>
<span id="el_lab_test_master_Free">
<input type="text" data-table="lab_test_master" data-field="x_Free" name="x_Free" id="x_Free" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_master_add->Free->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_add->Free->EditValue ?>"<?php echo $lab_test_master_add->Free->editAttributes() ?>>
</span>
<?php echo $lab_test_master_add->Free->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_add->AutoAuth->Visible) { // AutoAuth ?>
	<div id="r_AutoAuth" class="form-group row">
		<label id="elh_lab_test_master_AutoAuth" for="x_AutoAuth" class="<?php echo $lab_test_master_add->LeftColumnClass ?>"><?php echo $lab_test_master_add->AutoAuth->caption() ?><?php echo $lab_test_master_add->AutoAuth->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_add->RightColumnClass ?>"><div <?php echo $lab_test_master_add->AutoAuth->cellAttributes() ?>>
<span id="el_lab_test_master_AutoAuth">
<input type="text" data-table="lab_test_master" data-field="x_AutoAuth" name="x_AutoAuth" id="x_AutoAuth" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_master_add->AutoAuth->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_add->AutoAuth->EditValue ?>"<?php echo $lab_test_master_add->AutoAuth->editAttributes() ?>>
</span>
<?php echo $lab_test_master_add->AutoAuth->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_add->ProductCD->Visible) { // ProductCD ?>
	<div id="r_ProductCD" class="form-group row">
		<label id="elh_lab_test_master_ProductCD" for="x_ProductCD" class="<?php echo $lab_test_master_add->LeftColumnClass ?>"><?php echo $lab_test_master_add->ProductCD->caption() ?><?php echo $lab_test_master_add->ProductCD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_add->RightColumnClass ?>"><div <?php echo $lab_test_master_add->ProductCD->cellAttributes() ?>>
<span id="el_lab_test_master_ProductCD">
<input type="text" data-table="lab_test_master" data-field="x_ProductCD" name="x_ProductCD" id="x_ProductCD" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($lab_test_master_add->ProductCD->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_add->ProductCD->EditValue ?>"<?php echo $lab_test_master_add->ProductCD->editAttributes() ?>>
</span>
<?php echo $lab_test_master_add->ProductCD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_add->Inventory->Visible) { // Inventory ?>
	<div id="r_Inventory" class="form-group row">
		<label id="elh_lab_test_master_Inventory" for="x_Inventory" class="<?php echo $lab_test_master_add->LeftColumnClass ?>"><?php echo $lab_test_master_add->Inventory->caption() ?><?php echo $lab_test_master_add->Inventory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_add->RightColumnClass ?>"><div <?php echo $lab_test_master_add->Inventory->cellAttributes() ?>>
<span id="el_lab_test_master_Inventory">
<input type="text" data-table="lab_test_master" data-field="x_Inventory" name="x_Inventory" id="x_Inventory" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_master_add->Inventory->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_add->Inventory->EditValue ?>"<?php echo $lab_test_master_add->Inventory->editAttributes() ?>>
</span>
<?php echo $lab_test_master_add->Inventory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_add->IntimateTest->Visible) { // IntimateTest ?>
	<div id="r_IntimateTest" class="form-group row">
		<label id="elh_lab_test_master_IntimateTest" for="x_IntimateTest" class="<?php echo $lab_test_master_add->LeftColumnClass ?>"><?php echo $lab_test_master_add->IntimateTest->caption() ?><?php echo $lab_test_master_add->IntimateTest->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_add->RightColumnClass ?>"><div <?php echo $lab_test_master_add->IntimateTest->cellAttributes() ?>>
<span id="el_lab_test_master_IntimateTest">
<input type="text" data-table="lab_test_master" data-field="x_IntimateTest" name="x_IntimateTest" id="x_IntimateTest" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_master_add->IntimateTest->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_add->IntimateTest->EditValue ?>"<?php echo $lab_test_master_add->IntimateTest->editAttributes() ?>>
</span>
<?php echo $lab_test_master_add->IntimateTest->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_add->Manual->Visible) { // Manual ?>
	<div id="r_Manual" class="form-group row">
		<label id="elh_lab_test_master_Manual" for="x_Manual" class="<?php echo $lab_test_master_add->LeftColumnClass ?>"><?php echo $lab_test_master_add->Manual->caption() ?><?php echo $lab_test_master_add->Manual->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_add->RightColumnClass ?>"><div <?php echo $lab_test_master_add->Manual->cellAttributes() ?>>
<span id="el_lab_test_master_Manual">
<input type="text" data-table="lab_test_master" data-field="x_Manual" name="x_Manual" id="x_Manual" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_master_add->Manual->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_add->Manual->EditValue ?>"<?php echo $lab_test_master_add->Manual->editAttributes() ?>>
</span>
<?php echo $lab_test_master_add->Manual->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$lab_test_master_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $lab_test_master_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $lab_test_master_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$lab_test_master_add->showPageFooter();
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
$lab_test_master_add->terminate();
?>