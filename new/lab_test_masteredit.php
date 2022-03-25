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
$lab_test_master_edit = new lab_test_master_edit();

// Run the page
$lab_test_master_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_test_master_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var flab_test_masteredit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	flab_test_masteredit = currentForm = new ew.Form("flab_test_masteredit", "edit");

	// Validate form
	flab_test_masteredit.validate = function() {
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
			<?php if ($lab_test_master_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_edit->id->caption(), $lab_test_master_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_edit->MainDeptCd->Required) { ?>
				elm = this.getElements("x" + infix + "_MainDeptCd");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_edit->MainDeptCd->caption(), $lab_test_master_edit->MainDeptCd->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_edit->DeptCd->Required) { ?>
				elm = this.getElements("x" + infix + "_DeptCd");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_edit->DeptCd->caption(), $lab_test_master_edit->DeptCd->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_edit->TestCd->Required) { ?>
				elm = this.getElements("x" + infix + "_TestCd");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_edit->TestCd->caption(), $lab_test_master_edit->TestCd->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_edit->TestSubCd->Required) { ?>
				elm = this.getElements("x" + infix + "_TestSubCd");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_edit->TestSubCd->caption(), $lab_test_master_edit->TestSubCd->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_edit->TestName->Required) { ?>
				elm = this.getElements("x" + infix + "_TestName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_edit->TestName->caption(), $lab_test_master_edit->TestName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_edit->XrayPart->Required) { ?>
				elm = this.getElements("x" + infix + "_XrayPart");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_edit->XrayPart->caption(), $lab_test_master_edit->XrayPart->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_edit->Method->Required) { ?>
				elm = this.getElements("x" + infix + "_Method");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_edit->Method->caption(), $lab_test_master_edit->Method->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_edit->Order->Required) { ?>
				elm = this.getElements("x" + infix + "_Order");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_edit->Order->caption(), $lab_test_master_edit->Order->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Order");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_test_master_edit->Order->errorMessage()) ?>");
			<?php if ($lab_test_master_edit->Form->Required) { ?>
				elm = this.getElements("x" + infix + "_Form");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_edit->Form->caption(), $lab_test_master_edit->Form->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_edit->Amt->Required) { ?>
				elm = this.getElements("x" + infix + "_Amt");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_edit->Amt->caption(), $lab_test_master_edit->Amt->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Amt");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_test_master_edit->Amt->errorMessage()) ?>");
			<?php if ($lab_test_master_edit->SplAmt->Required) { ?>
				elm = this.getElements("x" + infix + "_SplAmt");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_edit->SplAmt->caption(), $lab_test_master_edit->SplAmt->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SplAmt");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_test_master_edit->SplAmt->errorMessage()) ?>");
			<?php if ($lab_test_master_edit->ResType->Required) { ?>
				elm = this.getElements("x" + infix + "_ResType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_edit->ResType->caption(), $lab_test_master_edit->ResType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_edit->UnitCD->Required) { ?>
				elm = this.getElements("x" + infix + "_UnitCD");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_edit->UnitCD->caption(), $lab_test_master_edit->UnitCD->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_edit->RefValue->Required) { ?>
				elm = this.getElements("x" + infix + "_RefValue");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_edit->RefValue->caption(), $lab_test_master_edit->RefValue->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_edit->Sample->Required) { ?>
				elm = this.getElements("x" + infix + "_Sample");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_edit->Sample->caption(), $lab_test_master_edit->Sample->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_edit->NoD->Required) { ?>
				elm = this.getElements("x" + infix + "_NoD");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_edit->NoD->caption(), $lab_test_master_edit->NoD->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_NoD");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_test_master_edit->NoD->errorMessage()) ?>");
			<?php if ($lab_test_master_edit->BillOrder->Required) { ?>
				elm = this.getElements("x" + infix + "_BillOrder");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_edit->BillOrder->caption(), $lab_test_master_edit->BillOrder->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_BillOrder");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_test_master_edit->BillOrder->errorMessage()) ?>");
			<?php if ($lab_test_master_edit->Formula->Required) { ?>
				elm = this.getElements("x" + infix + "_Formula");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_edit->Formula->caption(), $lab_test_master_edit->Formula->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_edit->Inactive->Required) { ?>
				elm = this.getElements("x" + infix + "_Inactive");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_edit->Inactive->caption(), $lab_test_master_edit->Inactive->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_edit->ReagentAmt->Required) { ?>
				elm = this.getElements("x" + infix + "_ReagentAmt");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_edit->ReagentAmt->caption(), $lab_test_master_edit->ReagentAmt->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ReagentAmt");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_test_master_edit->ReagentAmt->errorMessage()) ?>");
			<?php if ($lab_test_master_edit->LabAmt->Required) { ?>
				elm = this.getElements("x" + infix + "_LabAmt");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_edit->LabAmt->caption(), $lab_test_master_edit->LabAmt->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_LabAmt");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_test_master_edit->LabAmt->errorMessage()) ?>");
			<?php if ($lab_test_master_edit->RefAmt->Required) { ?>
				elm = this.getElements("x" + infix + "_RefAmt");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_edit->RefAmt->caption(), $lab_test_master_edit->RefAmt->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RefAmt");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_test_master_edit->RefAmt->errorMessage()) ?>");
			<?php if ($lab_test_master_edit->CreFrom->Required) { ?>
				elm = this.getElements("x" + infix + "_CreFrom");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_edit->CreFrom->caption(), $lab_test_master_edit->CreFrom->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_CreFrom");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_test_master_edit->CreFrom->errorMessage()) ?>");
			<?php if ($lab_test_master_edit->CreTo->Required) { ?>
				elm = this.getElements("x" + infix + "_CreTo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_edit->CreTo->caption(), $lab_test_master_edit->CreTo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_CreTo");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_test_master_edit->CreTo->errorMessage()) ?>");
			<?php if ($lab_test_master_edit->Note->Required) { ?>
				elm = this.getElements("x" + infix + "_Note");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_edit->Note->caption(), $lab_test_master_edit->Note->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_edit->Sun->Required) { ?>
				elm = this.getElements("x" + infix + "_Sun");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_edit->Sun->caption(), $lab_test_master_edit->Sun->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_edit->Mon->Required) { ?>
				elm = this.getElements("x" + infix + "_Mon");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_edit->Mon->caption(), $lab_test_master_edit->Mon->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_edit->Tue->Required) { ?>
				elm = this.getElements("x" + infix + "_Tue");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_edit->Tue->caption(), $lab_test_master_edit->Tue->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_edit->Wed->Required) { ?>
				elm = this.getElements("x" + infix + "_Wed");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_edit->Wed->caption(), $lab_test_master_edit->Wed->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_edit->Thi->Required) { ?>
				elm = this.getElements("x" + infix + "_Thi");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_edit->Thi->caption(), $lab_test_master_edit->Thi->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_edit->Fri->Required) { ?>
				elm = this.getElements("x" + infix + "_Fri");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_edit->Fri->caption(), $lab_test_master_edit->Fri->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_edit->Sat->Required) { ?>
				elm = this.getElements("x" + infix + "_Sat");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_edit->Sat->caption(), $lab_test_master_edit->Sat->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_edit->Days->Required) { ?>
				elm = this.getElements("x" + infix + "_Days");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_edit->Days->caption(), $lab_test_master_edit->Days->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Days");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_test_master_edit->Days->errorMessage()) ?>");
			<?php if ($lab_test_master_edit->Cutoff->Required) { ?>
				elm = this.getElements("x" + infix + "_Cutoff");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_edit->Cutoff->caption(), $lab_test_master_edit->Cutoff->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_edit->FontBold->Required) { ?>
				elm = this.getElements("x" + infix + "_FontBold");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_edit->FontBold->caption(), $lab_test_master_edit->FontBold->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_edit->TestHeading->Required) { ?>
				elm = this.getElements("x" + infix + "_TestHeading");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_edit->TestHeading->caption(), $lab_test_master_edit->TestHeading->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_edit->Outsource->Required) { ?>
				elm = this.getElements("x" + infix + "_Outsource");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_edit->Outsource->caption(), $lab_test_master_edit->Outsource->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_edit->NoResult->Required) { ?>
				elm = this.getElements("x" + infix + "_NoResult");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_edit->NoResult->caption(), $lab_test_master_edit->NoResult->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_edit->GraphLow->Required) { ?>
				elm = this.getElements("x" + infix + "_GraphLow");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_edit->GraphLow->caption(), $lab_test_master_edit->GraphLow->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_GraphLow");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_test_master_edit->GraphLow->errorMessage()) ?>");
			<?php if ($lab_test_master_edit->GraphHigh->Required) { ?>
				elm = this.getElements("x" + infix + "_GraphHigh");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_edit->GraphHigh->caption(), $lab_test_master_edit->GraphHigh->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_GraphHigh");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_test_master_edit->GraphHigh->errorMessage()) ?>");
			<?php if ($lab_test_master_edit->CollSample->Required) { ?>
				elm = this.getElements("x" + infix + "_CollSample");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_edit->CollSample->caption(), $lab_test_master_edit->CollSample->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_edit->ProcessTime->Required) { ?>
				elm = this.getElements("x" + infix + "_ProcessTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_edit->ProcessTime->caption(), $lab_test_master_edit->ProcessTime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_edit->TamilName->Required) { ?>
				elm = this.getElements("x" + infix + "_TamilName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_edit->TamilName->caption(), $lab_test_master_edit->TamilName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_edit->ShortName->Required) { ?>
				elm = this.getElements("x" + infix + "_ShortName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_edit->ShortName->caption(), $lab_test_master_edit->ShortName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_edit->Individual->Required) { ?>
				elm = this.getElements("x" + infix + "_Individual");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_edit->Individual->caption(), $lab_test_master_edit->Individual->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_edit->PrevAmt->Required) { ?>
				elm = this.getElements("x" + infix + "_PrevAmt");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_edit->PrevAmt->caption(), $lab_test_master_edit->PrevAmt->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PrevAmt");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_test_master_edit->PrevAmt->errorMessage()) ?>");
			<?php if ($lab_test_master_edit->PrevSplAmt->Required) { ?>
				elm = this.getElements("x" + infix + "_PrevSplAmt");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_edit->PrevSplAmt->caption(), $lab_test_master_edit->PrevSplAmt->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PrevSplAmt");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_test_master_edit->PrevSplAmt->errorMessage()) ?>");
			<?php if ($lab_test_master_edit->Remarks->Required) { ?>
				elm = this.getElements("x" + infix + "_Remarks");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_edit->Remarks->caption(), $lab_test_master_edit->Remarks->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_edit->EditDate->Required) { ?>
				elm = this.getElements("x" + infix + "_EditDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_edit->EditDate->caption(), $lab_test_master_edit->EditDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_EditDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_test_master_edit->EditDate->errorMessage()) ?>");
			<?php if ($lab_test_master_edit->BillName->Required) { ?>
				elm = this.getElements("x" + infix + "_BillName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_edit->BillName->caption(), $lab_test_master_edit->BillName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_edit->ActualAmt->Required) { ?>
				elm = this.getElements("x" + infix + "_ActualAmt");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_edit->ActualAmt->caption(), $lab_test_master_edit->ActualAmt->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ActualAmt");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_test_master_edit->ActualAmt->errorMessage()) ?>");
			<?php if ($lab_test_master_edit->HISCD->Required) { ?>
				elm = this.getElements("x" + infix + "_HISCD");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_edit->HISCD->caption(), $lab_test_master_edit->HISCD->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_edit->PriceList->Required) { ?>
				elm = this.getElements("x" + infix + "_PriceList");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_edit->PriceList->caption(), $lab_test_master_edit->PriceList->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_edit->IPAmt->Required) { ?>
				elm = this.getElements("x" + infix + "_IPAmt");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_edit->IPAmt->caption(), $lab_test_master_edit->IPAmt->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_IPAmt");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_test_master_edit->IPAmt->errorMessage()) ?>");
			<?php if ($lab_test_master_edit->InsAmt->Required) { ?>
				elm = this.getElements("x" + infix + "_InsAmt");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_edit->InsAmt->caption(), $lab_test_master_edit->InsAmt->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_InsAmt");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_test_master_edit->InsAmt->errorMessage()) ?>");
			<?php if ($lab_test_master_edit->ManualCD->Required) { ?>
				elm = this.getElements("x" + infix + "_ManualCD");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_edit->ManualCD->caption(), $lab_test_master_edit->ManualCD->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_edit->Free->Required) { ?>
				elm = this.getElements("x" + infix + "_Free");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_edit->Free->caption(), $lab_test_master_edit->Free->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_edit->AutoAuth->Required) { ?>
				elm = this.getElements("x" + infix + "_AutoAuth");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_edit->AutoAuth->caption(), $lab_test_master_edit->AutoAuth->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_edit->ProductCD->Required) { ?>
				elm = this.getElements("x" + infix + "_ProductCD");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_edit->ProductCD->caption(), $lab_test_master_edit->ProductCD->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_edit->Inventory->Required) { ?>
				elm = this.getElements("x" + infix + "_Inventory");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_edit->Inventory->caption(), $lab_test_master_edit->Inventory->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_edit->IntimateTest->Required) { ?>
				elm = this.getElements("x" + infix + "_IntimateTest");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_edit->IntimateTest->caption(), $lab_test_master_edit->IntimateTest->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_master_edit->Manual->Required) { ?>
				elm = this.getElements("x" + infix + "_Manual");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_master_edit->Manual->caption(), $lab_test_master_edit->Manual->RequiredErrorMessage)) ?>");
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
	flab_test_masteredit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	flab_test_masteredit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("flab_test_masteredit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $lab_test_master_edit->showPageHeader(); ?>
<?php
$lab_test_master_edit->showMessage();
?>
<form name="flab_test_masteredit" id="flab_test_masteredit" class="<?php echo $lab_test_master_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_test_master">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$lab_test_master_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($lab_test_master_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_lab_test_master_id" class="<?php echo $lab_test_master_edit->LeftColumnClass ?>"><?php echo $lab_test_master_edit->id->caption() ?><?php echo $lab_test_master_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_edit->RightColumnClass ?>"><div <?php echo $lab_test_master_edit->id->cellAttributes() ?>>
<span id="el_lab_test_master_id">
<span<?php echo $lab_test_master_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($lab_test_master_edit->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="lab_test_master" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($lab_test_master_edit->id->CurrentValue) ?>">
<?php echo $lab_test_master_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_edit->MainDeptCd->Visible) { // MainDeptCd ?>
	<div id="r_MainDeptCd" class="form-group row">
		<label id="elh_lab_test_master_MainDeptCd" for="x_MainDeptCd" class="<?php echo $lab_test_master_edit->LeftColumnClass ?>"><?php echo $lab_test_master_edit->MainDeptCd->caption() ?><?php echo $lab_test_master_edit->MainDeptCd->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_edit->RightColumnClass ?>"><div <?php echo $lab_test_master_edit->MainDeptCd->cellAttributes() ?>>
<span id="el_lab_test_master_MainDeptCd">
<input type="text" data-table="lab_test_master" data-field="x_MainDeptCd" name="x_MainDeptCd" id="x_MainDeptCd" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($lab_test_master_edit->MainDeptCd->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_edit->MainDeptCd->EditValue ?>"<?php echo $lab_test_master_edit->MainDeptCd->editAttributes() ?>>
</span>
<?php echo $lab_test_master_edit->MainDeptCd->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_edit->DeptCd->Visible) { // DeptCd ?>
	<div id="r_DeptCd" class="form-group row">
		<label id="elh_lab_test_master_DeptCd" for="x_DeptCd" class="<?php echo $lab_test_master_edit->LeftColumnClass ?>"><?php echo $lab_test_master_edit->DeptCd->caption() ?><?php echo $lab_test_master_edit->DeptCd->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_edit->RightColumnClass ?>"><div <?php echo $lab_test_master_edit->DeptCd->cellAttributes() ?>>
<span id="el_lab_test_master_DeptCd">
<input type="text" data-table="lab_test_master" data-field="x_DeptCd" name="x_DeptCd" id="x_DeptCd" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($lab_test_master_edit->DeptCd->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_edit->DeptCd->EditValue ?>"<?php echo $lab_test_master_edit->DeptCd->editAttributes() ?>>
</span>
<?php echo $lab_test_master_edit->DeptCd->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_edit->TestCd->Visible) { // TestCd ?>
	<div id="r_TestCd" class="form-group row">
		<label id="elh_lab_test_master_TestCd" for="x_TestCd" class="<?php echo $lab_test_master_edit->LeftColumnClass ?>"><?php echo $lab_test_master_edit->TestCd->caption() ?><?php echo $lab_test_master_edit->TestCd->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_edit->RightColumnClass ?>"><div <?php echo $lab_test_master_edit->TestCd->cellAttributes() ?>>
<span id="el_lab_test_master_TestCd">
<input type="text" data-table="lab_test_master" data-field="x_TestCd" name="x_TestCd" id="x_TestCd" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($lab_test_master_edit->TestCd->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_edit->TestCd->EditValue ?>"<?php echo $lab_test_master_edit->TestCd->editAttributes() ?>>
</span>
<?php echo $lab_test_master_edit->TestCd->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_edit->TestSubCd->Visible) { // TestSubCd ?>
	<div id="r_TestSubCd" class="form-group row">
		<label id="elh_lab_test_master_TestSubCd" for="x_TestSubCd" class="<?php echo $lab_test_master_edit->LeftColumnClass ?>"><?php echo $lab_test_master_edit->TestSubCd->caption() ?><?php echo $lab_test_master_edit->TestSubCd->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_edit->RightColumnClass ?>"><div <?php echo $lab_test_master_edit->TestSubCd->cellAttributes() ?>>
<span id="el_lab_test_master_TestSubCd">
<input type="text" data-table="lab_test_master" data-field="x_TestSubCd" name="x_TestSubCd" id="x_TestSubCd" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($lab_test_master_edit->TestSubCd->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_edit->TestSubCd->EditValue ?>"<?php echo $lab_test_master_edit->TestSubCd->editAttributes() ?>>
</span>
<?php echo $lab_test_master_edit->TestSubCd->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_edit->TestName->Visible) { // TestName ?>
	<div id="r_TestName" class="form-group row">
		<label id="elh_lab_test_master_TestName" for="x_TestName" class="<?php echo $lab_test_master_edit->LeftColumnClass ?>"><?php echo $lab_test_master_edit->TestName->caption() ?><?php echo $lab_test_master_edit->TestName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_edit->RightColumnClass ?>"><div <?php echo $lab_test_master_edit->TestName->cellAttributes() ?>>
<span id="el_lab_test_master_TestName">
<input type="text" data-table="lab_test_master" data-field="x_TestName" name="x_TestName" id="x_TestName" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($lab_test_master_edit->TestName->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_edit->TestName->EditValue ?>"<?php echo $lab_test_master_edit->TestName->editAttributes() ?>>
</span>
<?php echo $lab_test_master_edit->TestName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_edit->XrayPart->Visible) { // XrayPart ?>
	<div id="r_XrayPart" class="form-group row">
		<label id="elh_lab_test_master_XrayPart" for="x_XrayPart" class="<?php echo $lab_test_master_edit->LeftColumnClass ?>"><?php echo $lab_test_master_edit->XrayPart->caption() ?><?php echo $lab_test_master_edit->XrayPart->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_edit->RightColumnClass ?>"><div <?php echo $lab_test_master_edit->XrayPart->cellAttributes() ?>>
<span id="el_lab_test_master_XrayPart">
<input type="text" data-table="lab_test_master" data-field="x_XrayPart" name="x_XrayPart" id="x_XrayPart" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($lab_test_master_edit->XrayPart->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_edit->XrayPart->EditValue ?>"<?php echo $lab_test_master_edit->XrayPart->editAttributes() ?>>
</span>
<?php echo $lab_test_master_edit->XrayPart->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_edit->Method->Visible) { // Method ?>
	<div id="r_Method" class="form-group row">
		<label id="elh_lab_test_master_Method" for="x_Method" class="<?php echo $lab_test_master_edit->LeftColumnClass ?>"><?php echo $lab_test_master_edit->Method->caption() ?><?php echo $lab_test_master_edit->Method->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_edit->RightColumnClass ?>"><div <?php echo $lab_test_master_edit->Method->cellAttributes() ?>>
<span id="el_lab_test_master_Method">
<input type="text" data-table="lab_test_master" data-field="x_Method" name="x_Method" id="x_Method" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($lab_test_master_edit->Method->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_edit->Method->EditValue ?>"<?php echo $lab_test_master_edit->Method->editAttributes() ?>>
</span>
<?php echo $lab_test_master_edit->Method->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_edit->Order->Visible) { // Order ?>
	<div id="r_Order" class="form-group row">
		<label id="elh_lab_test_master_Order" for="x_Order" class="<?php echo $lab_test_master_edit->LeftColumnClass ?>"><?php echo $lab_test_master_edit->Order->caption() ?><?php echo $lab_test_master_edit->Order->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_edit->RightColumnClass ?>"><div <?php echo $lab_test_master_edit->Order->cellAttributes() ?>>
<span id="el_lab_test_master_Order">
<input type="text" data-table="lab_test_master" data-field="x_Order" name="x_Order" id="x_Order" size="30" placeholder="<?php echo HtmlEncode($lab_test_master_edit->Order->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_edit->Order->EditValue ?>"<?php echo $lab_test_master_edit->Order->editAttributes() ?>>
</span>
<?php echo $lab_test_master_edit->Order->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_edit->Form->Visible) { // Form ?>
	<div id="r_Form" class="form-group row">
		<label id="elh_lab_test_master_Form" for="x_Form" class="<?php echo $lab_test_master_edit->LeftColumnClass ?>"><?php echo $lab_test_master_edit->Form->caption() ?><?php echo $lab_test_master_edit->Form->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_edit->RightColumnClass ?>"><div <?php echo $lab_test_master_edit->Form->cellAttributes() ?>>
<span id="el_lab_test_master_Form">
<input type="text" data-table="lab_test_master" data-field="x_Form" name="x_Form" id="x_Form" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($lab_test_master_edit->Form->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_edit->Form->EditValue ?>"<?php echo $lab_test_master_edit->Form->editAttributes() ?>>
</span>
<?php echo $lab_test_master_edit->Form->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_edit->Amt->Visible) { // Amt ?>
	<div id="r_Amt" class="form-group row">
		<label id="elh_lab_test_master_Amt" for="x_Amt" class="<?php echo $lab_test_master_edit->LeftColumnClass ?>"><?php echo $lab_test_master_edit->Amt->caption() ?><?php echo $lab_test_master_edit->Amt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_edit->RightColumnClass ?>"><div <?php echo $lab_test_master_edit->Amt->cellAttributes() ?>>
<span id="el_lab_test_master_Amt">
<input type="text" data-table="lab_test_master" data-field="x_Amt" name="x_Amt" id="x_Amt" size="30" placeholder="<?php echo HtmlEncode($lab_test_master_edit->Amt->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_edit->Amt->EditValue ?>"<?php echo $lab_test_master_edit->Amt->editAttributes() ?>>
</span>
<?php echo $lab_test_master_edit->Amt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_edit->SplAmt->Visible) { // SplAmt ?>
	<div id="r_SplAmt" class="form-group row">
		<label id="elh_lab_test_master_SplAmt" for="x_SplAmt" class="<?php echo $lab_test_master_edit->LeftColumnClass ?>"><?php echo $lab_test_master_edit->SplAmt->caption() ?><?php echo $lab_test_master_edit->SplAmt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_edit->RightColumnClass ?>"><div <?php echo $lab_test_master_edit->SplAmt->cellAttributes() ?>>
<span id="el_lab_test_master_SplAmt">
<input type="text" data-table="lab_test_master" data-field="x_SplAmt" name="x_SplAmt" id="x_SplAmt" size="30" placeholder="<?php echo HtmlEncode($lab_test_master_edit->SplAmt->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_edit->SplAmt->EditValue ?>"<?php echo $lab_test_master_edit->SplAmt->editAttributes() ?>>
</span>
<?php echo $lab_test_master_edit->SplAmt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_edit->ResType->Visible) { // ResType ?>
	<div id="r_ResType" class="form-group row">
		<label id="elh_lab_test_master_ResType" for="x_ResType" class="<?php echo $lab_test_master_edit->LeftColumnClass ?>"><?php echo $lab_test_master_edit->ResType->caption() ?><?php echo $lab_test_master_edit->ResType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_edit->RightColumnClass ?>"><div <?php echo $lab_test_master_edit->ResType->cellAttributes() ?>>
<span id="el_lab_test_master_ResType">
<input type="text" data-table="lab_test_master" data-field="x_ResType" name="x_ResType" id="x_ResType" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($lab_test_master_edit->ResType->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_edit->ResType->EditValue ?>"<?php echo $lab_test_master_edit->ResType->editAttributes() ?>>
</span>
<?php echo $lab_test_master_edit->ResType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_edit->UnitCD->Visible) { // UnitCD ?>
	<div id="r_UnitCD" class="form-group row">
		<label id="elh_lab_test_master_UnitCD" for="x_UnitCD" class="<?php echo $lab_test_master_edit->LeftColumnClass ?>"><?php echo $lab_test_master_edit->UnitCD->caption() ?><?php echo $lab_test_master_edit->UnitCD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_edit->RightColumnClass ?>"><div <?php echo $lab_test_master_edit->UnitCD->cellAttributes() ?>>
<span id="el_lab_test_master_UnitCD">
<input type="text" data-table="lab_test_master" data-field="x_UnitCD" name="x_UnitCD" id="x_UnitCD" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($lab_test_master_edit->UnitCD->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_edit->UnitCD->EditValue ?>"<?php echo $lab_test_master_edit->UnitCD->editAttributes() ?>>
</span>
<?php echo $lab_test_master_edit->UnitCD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_edit->RefValue->Visible) { // RefValue ?>
	<div id="r_RefValue" class="form-group row">
		<label id="elh_lab_test_master_RefValue" for="x_RefValue" class="<?php echo $lab_test_master_edit->LeftColumnClass ?>"><?php echo $lab_test_master_edit->RefValue->caption() ?><?php echo $lab_test_master_edit->RefValue->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_edit->RightColumnClass ?>"><div <?php echo $lab_test_master_edit->RefValue->cellAttributes() ?>>
<span id="el_lab_test_master_RefValue">
<textarea data-table="lab_test_master" data-field="x_RefValue" name="x_RefValue" id="x_RefValue" cols="35" rows="4" placeholder="<?php echo HtmlEncode($lab_test_master_edit->RefValue->getPlaceHolder()) ?>"<?php echo $lab_test_master_edit->RefValue->editAttributes() ?>><?php echo $lab_test_master_edit->RefValue->EditValue ?></textarea>
</span>
<?php echo $lab_test_master_edit->RefValue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_edit->Sample->Visible) { // Sample ?>
	<div id="r_Sample" class="form-group row">
		<label id="elh_lab_test_master_Sample" for="x_Sample" class="<?php echo $lab_test_master_edit->LeftColumnClass ?>"><?php echo $lab_test_master_edit->Sample->caption() ?><?php echo $lab_test_master_edit->Sample->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_edit->RightColumnClass ?>"><div <?php echo $lab_test_master_edit->Sample->cellAttributes() ?>>
<span id="el_lab_test_master_Sample">
<input type="text" data-table="lab_test_master" data-field="x_Sample" name="x_Sample" id="x_Sample" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($lab_test_master_edit->Sample->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_edit->Sample->EditValue ?>"<?php echo $lab_test_master_edit->Sample->editAttributes() ?>>
</span>
<?php echo $lab_test_master_edit->Sample->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_edit->NoD->Visible) { // NoD ?>
	<div id="r_NoD" class="form-group row">
		<label id="elh_lab_test_master_NoD" for="x_NoD" class="<?php echo $lab_test_master_edit->LeftColumnClass ?>"><?php echo $lab_test_master_edit->NoD->caption() ?><?php echo $lab_test_master_edit->NoD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_edit->RightColumnClass ?>"><div <?php echo $lab_test_master_edit->NoD->cellAttributes() ?>>
<span id="el_lab_test_master_NoD">
<input type="text" data-table="lab_test_master" data-field="x_NoD" name="x_NoD" id="x_NoD" size="30" placeholder="<?php echo HtmlEncode($lab_test_master_edit->NoD->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_edit->NoD->EditValue ?>"<?php echo $lab_test_master_edit->NoD->editAttributes() ?>>
</span>
<?php echo $lab_test_master_edit->NoD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_edit->BillOrder->Visible) { // BillOrder ?>
	<div id="r_BillOrder" class="form-group row">
		<label id="elh_lab_test_master_BillOrder" for="x_BillOrder" class="<?php echo $lab_test_master_edit->LeftColumnClass ?>"><?php echo $lab_test_master_edit->BillOrder->caption() ?><?php echo $lab_test_master_edit->BillOrder->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_edit->RightColumnClass ?>"><div <?php echo $lab_test_master_edit->BillOrder->cellAttributes() ?>>
<span id="el_lab_test_master_BillOrder">
<input type="text" data-table="lab_test_master" data-field="x_BillOrder" name="x_BillOrder" id="x_BillOrder" size="30" placeholder="<?php echo HtmlEncode($lab_test_master_edit->BillOrder->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_edit->BillOrder->EditValue ?>"<?php echo $lab_test_master_edit->BillOrder->editAttributes() ?>>
</span>
<?php echo $lab_test_master_edit->BillOrder->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_edit->Formula->Visible) { // Formula ?>
	<div id="r_Formula" class="form-group row">
		<label id="elh_lab_test_master_Formula" for="x_Formula" class="<?php echo $lab_test_master_edit->LeftColumnClass ?>"><?php echo $lab_test_master_edit->Formula->caption() ?><?php echo $lab_test_master_edit->Formula->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_edit->RightColumnClass ?>"><div <?php echo $lab_test_master_edit->Formula->cellAttributes() ?>>
<span id="el_lab_test_master_Formula">
<textarea data-table="lab_test_master" data-field="x_Formula" name="x_Formula" id="x_Formula" cols="35" rows="4" placeholder="<?php echo HtmlEncode($lab_test_master_edit->Formula->getPlaceHolder()) ?>"<?php echo $lab_test_master_edit->Formula->editAttributes() ?>><?php echo $lab_test_master_edit->Formula->EditValue ?></textarea>
</span>
<?php echo $lab_test_master_edit->Formula->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_edit->Inactive->Visible) { // Inactive ?>
	<div id="r_Inactive" class="form-group row">
		<label id="elh_lab_test_master_Inactive" for="x_Inactive" class="<?php echo $lab_test_master_edit->LeftColumnClass ?>"><?php echo $lab_test_master_edit->Inactive->caption() ?><?php echo $lab_test_master_edit->Inactive->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_edit->RightColumnClass ?>"><div <?php echo $lab_test_master_edit->Inactive->cellAttributes() ?>>
<span id="el_lab_test_master_Inactive">
<input type="text" data-table="lab_test_master" data-field="x_Inactive" name="x_Inactive" id="x_Inactive" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_master_edit->Inactive->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_edit->Inactive->EditValue ?>"<?php echo $lab_test_master_edit->Inactive->editAttributes() ?>>
</span>
<?php echo $lab_test_master_edit->Inactive->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_edit->ReagentAmt->Visible) { // ReagentAmt ?>
	<div id="r_ReagentAmt" class="form-group row">
		<label id="elh_lab_test_master_ReagentAmt" for="x_ReagentAmt" class="<?php echo $lab_test_master_edit->LeftColumnClass ?>"><?php echo $lab_test_master_edit->ReagentAmt->caption() ?><?php echo $lab_test_master_edit->ReagentAmt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_edit->RightColumnClass ?>"><div <?php echo $lab_test_master_edit->ReagentAmt->cellAttributes() ?>>
<span id="el_lab_test_master_ReagentAmt">
<input type="text" data-table="lab_test_master" data-field="x_ReagentAmt" name="x_ReagentAmt" id="x_ReagentAmt" size="30" placeholder="<?php echo HtmlEncode($lab_test_master_edit->ReagentAmt->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_edit->ReagentAmt->EditValue ?>"<?php echo $lab_test_master_edit->ReagentAmt->editAttributes() ?>>
</span>
<?php echo $lab_test_master_edit->ReagentAmt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_edit->LabAmt->Visible) { // LabAmt ?>
	<div id="r_LabAmt" class="form-group row">
		<label id="elh_lab_test_master_LabAmt" for="x_LabAmt" class="<?php echo $lab_test_master_edit->LeftColumnClass ?>"><?php echo $lab_test_master_edit->LabAmt->caption() ?><?php echo $lab_test_master_edit->LabAmt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_edit->RightColumnClass ?>"><div <?php echo $lab_test_master_edit->LabAmt->cellAttributes() ?>>
<span id="el_lab_test_master_LabAmt">
<input type="text" data-table="lab_test_master" data-field="x_LabAmt" name="x_LabAmt" id="x_LabAmt" size="30" placeholder="<?php echo HtmlEncode($lab_test_master_edit->LabAmt->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_edit->LabAmt->EditValue ?>"<?php echo $lab_test_master_edit->LabAmt->editAttributes() ?>>
</span>
<?php echo $lab_test_master_edit->LabAmt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_edit->RefAmt->Visible) { // RefAmt ?>
	<div id="r_RefAmt" class="form-group row">
		<label id="elh_lab_test_master_RefAmt" for="x_RefAmt" class="<?php echo $lab_test_master_edit->LeftColumnClass ?>"><?php echo $lab_test_master_edit->RefAmt->caption() ?><?php echo $lab_test_master_edit->RefAmt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_edit->RightColumnClass ?>"><div <?php echo $lab_test_master_edit->RefAmt->cellAttributes() ?>>
<span id="el_lab_test_master_RefAmt">
<input type="text" data-table="lab_test_master" data-field="x_RefAmt" name="x_RefAmt" id="x_RefAmt" size="30" placeholder="<?php echo HtmlEncode($lab_test_master_edit->RefAmt->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_edit->RefAmt->EditValue ?>"<?php echo $lab_test_master_edit->RefAmt->editAttributes() ?>>
</span>
<?php echo $lab_test_master_edit->RefAmt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_edit->CreFrom->Visible) { // CreFrom ?>
	<div id="r_CreFrom" class="form-group row">
		<label id="elh_lab_test_master_CreFrom" for="x_CreFrom" class="<?php echo $lab_test_master_edit->LeftColumnClass ?>"><?php echo $lab_test_master_edit->CreFrom->caption() ?><?php echo $lab_test_master_edit->CreFrom->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_edit->RightColumnClass ?>"><div <?php echo $lab_test_master_edit->CreFrom->cellAttributes() ?>>
<span id="el_lab_test_master_CreFrom">
<input type="text" data-table="lab_test_master" data-field="x_CreFrom" name="x_CreFrom" id="x_CreFrom" size="30" placeholder="<?php echo HtmlEncode($lab_test_master_edit->CreFrom->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_edit->CreFrom->EditValue ?>"<?php echo $lab_test_master_edit->CreFrom->editAttributes() ?>>
</span>
<?php echo $lab_test_master_edit->CreFrom->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_edit->CreTo->Visible) { // CreTo ?>
	<div id="r_CreTo" class="form-group row">
		<label id="elh_lab_test_master_CreTo" for="x_CreTo" class="<?php echo $lab_test_master_edit->LeftColumnClass ?>"><?php echo $lab_test_master_edit->CreTo->caption() ?><?php echo $lab_test_master_edit->CreTo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_edit->RightColumnClass ?>"><div <?php echo $lab_test_master_edit->CreTo->cellAttributes() ?>>
<span id="el_lab_test_master_CreTo">
<input type="text" data-table="lab_test_master" data-field="x_CreTo" name="x_CreTo" id="x_CreTo" size="30" placeholder="<?php echo HtmlEncode($lab_test_master_edit->CreTo->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_edit->CreTo->EditValue ?>"<?php echo $lab_test_master_edit->CreTo->editAttributes() ?>>
</span>
<?php echo $lab_test_master_edit->CreTo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_edit->Note->Visible) { // Note ?>
	<div id="r_Note" class="form-group row">
		<label id="elh_lab_test_master_Note" for="x_Note" class="<?php echo $lab_test_master_edit->LeftColumnClass ?>"><?php echo $lab_test_master_edit->Note->caption() ?><?php echo $lab_test_master_edit->Note->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_edit->RightColumnClass ?>"><div <?php echo $lab_test_master_edit->Note->cellAttributes() ?>>
<span id="el_lab_test_master_Note">
<textarea data-table="lab_test_master" data-field="x_Note" name="x_Note" id="x_Note" cols="35" rows="4" placeholder="<?php echo HtmlEncode($lab_test_master_edit->Note->getPlaceHolder()) ?>"<?php echo $lab_test_master_edit->Note->editAttributes() ?>><?php echo $lab_test_master_edit->Note->EditValue ?></textarea>
</span>
<?php echo $lab_test_master_edit->Note->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_edit->Sun->Visible) { // Sun ?>
	<div id="r_Sun" class="form-group row">
		<label id="elh_lab_test_master_Sun" for="x_Sun" class="<?php echo $lab_test_master_edit->LeftColumnClass ?>"><?php echo $lab_test_master_edit->Sun->caption() ?><?php echo $lab_test_master_edit->Sun->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_edit->RightColumnClass ?>"><div <?php echo $lab_test_master_edit->Sun->cellAttributes() ?>>
<span id="el_lab_test_master_Sun">
<input type="text" data-table="lab_test_master" data-field="x_Sun" name="x_Sun" id="x_Sun" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_master_edit->Sun->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_edit->Sun->EditValue ?>"<?php echo $lab_test_master_edit->Sun->editAttributes() ?>>
</span>
<?php echo $lab_test_master_edit->Sun->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_edit->Mon->Visible) { // Mon ?>
	<div id="r_Mon" class="form-group row">
		<label id="elh_lab_test_master_Mon" for="x_Mon" class="<?php echo $lab_test_master_edit->LeftColumnClass ?>"><?php echo $lab_test_master_edit->Mon->caption() ?><?php echo $lab_test_master_edit->Mon->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_edit->RightColumnClass ?>"><div <?php echo $lab_test_master_edit->Mon->cellAttributes() ?>>
<span id="el_lab_test_master_Mon">
<input type="text" data-table="lab_test_master" data-field="x_Mon" name="x_Mon" id="x_Mon" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_master_edit->Mon->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_edit->Mon->EditValue ?>"<?php echo $lab_test_master_edit->Mon->editAttributes() ?>>
</span>
<?php echo $lab_test_master_edit->Mon->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_edit->Tue->Visible) { // Tue ?>
	<div id="r_Tue" class="form-group row">
		<label id="elh_lab_test_master_Tue" for="x_Tue" class="<?php echo $lab_test_master_edit->LeftColumnClass ?>"><?php echo $lab_test_master_edit->Tue->caption() ?><?php echo $lab_test_master_edit->Tue->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_edit->RightColumnClass ?>"><div <?php echo $lab_test_master_edit->Tue->cellAttributes() ?>>
<span id="el_lab_test_master_Tue">
<input type="text" data-table="lab_test_master" data-field="x_Tue" name="x_Tue" id="x_Tue" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_master_edit->Tue->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_edit->Tue->EditValue ?>"<?php echo $lab_test_master_edit->Tue->editAttributes() ?>>
</span>
<?php echo $lab_test_master_edit->Tue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_edit->Wed->Visible) { // Wed ?>
	<div id="r_Wed" class="form-group row">
		<label id="elh_lab_test_master_Wed" for="x_Wed" class="<?php echo $lab_test_master_edit->LeftColumnClass ?>"><?php echo $lab_test_master_edit->Wed->caption() ?><?php echo $lab_test_master_edit->Wed->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_edit->RightColumnClass ?>"><div <?php echo $lab_test_master_edit->Wed->cellAttributes() ?>>
<span id="el_lab_test_master_Wed">
<input type="text" data-table="lab_test_master" data-field="x_Wed" name="x_Wed" id="x_Wed" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_master_edit->Wed->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_edit->Wed->EditValue ?>"<?php echo $lab_test_master_edit->Wed->editAttributes() ?>>
</span>
<?php echo $lab_test_master_edit->Wed->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_edit->Thi->Visible) { // Thi ?>
	<div id="r_Thi" class="form-group row">
		<label id="elh_lab_test_master_Thi" for="x_Thi" class="<?php echo $lab_test_master_edit->LeftColumnClass ?>"><?php echo $lab_test_master_edit->Thi->caption() ?><?php echo $lab_test_master_edit->Thi->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_edit->RightColumnClass ?>"><div <?php echo $lab_test_master_edit->Thi->cellAttributes() ?>>
<span id="el_lab_test_master_Thi">
<input type="text" data-table="lab_test_master" data-field="x_Thi" name="x_Thi" id="x_Thi" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_master_edit->Thi->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_edit->Thi->EditValue ?>"<?php echo $lab_test_master_edit->Thi->editAttributes() ?>>
</span>
<?php echo $lab_test_master_edit->Thi->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_edit->Fri->Visible) { // Fri ?>
	<div id="r_Fri" class="form-group row">
		<label id="elh_lab_test_master_Fri" for="x_Fri" class="<?php echo $lab_test_master_edit->LeftColumnClass ?>"><?php echo $lab_test_master_edit->Fri->caption() ?><?php echo $lab_test_master_edit->Fri->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_edit->RightColumnClass ?>"><div <?php echo $lab_test_master_edit->Fri->cellAttributes() ?>>
<span id="el_lab_test_master_Fri">
<input type="text" data-table="lab_test_master" data-field="x_Fri" name="x_Fri" id="x_Fri" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_master_edit->Fri->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_edit->Fri->EditValue ?>"<?php echo $lab_test_master_edit->Fri->editAttributes() ?>>
</span>
<?php echo $lab_test_master_edit->Fri->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_edit->Sat->Visible) { // Sat ?>
	<div id="r_Sat" class="form-group row">
		<label id="elh_lab_test_master_Sat" for="x_Sat" class="<?php echo $lab_test_master_edit->LeftColumnClass ?>"><?php echo $lab_test_master_edit->Sat->caption() ?><?php echo $lab_test_master_edit->Sat->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_edit->RightColumnClass ?>"><div <?php echo $lab_test_master_edit->Sat->cellAttributes() ?>>
<span id="el_lab_test_master_Sat">
<input type="text" data-table="lab_test_master" data-field="x_Sat" name="x_Sat" id="x_Sat" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_master_edit->Sat->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_edit->Sat->EditValue ?>"<?php echo $lab_test_master_edit->Sat->editAttributes() ?>>
</span>
<?php echo $lab_test_master_edit->Sat->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_edit->Days->Visible) { // Days ?>
	<div id="r_Days" class="form-group row">
		<label id="elh_lab_test_master_Days" for="x_Days" class="<?php echo $lab_test_master_edit->LeftColumnClass ?>"><?php echo $lab_test_master_edit->Days->caption() ?><?php echo $lab_test_master_edit->Days->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_edit->RightColumnClass ?>"><div <?php echo $lab_test_master_edit->Days->cellAttributes() ?>>
<span id="el_lab_test_master_Days">
<input type="text" data-table="lab_test_master" data-field="x_Days" name="x_Days" id="x_Days" size="30" placeholder="<?php echo HtmlEncode($lab_test_master_edit->Days->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_edit->Days->EditValue ?>"<?php echo $lab_test_master_edit->Days->editAttributes() ?>>
</span>
<?php echo $lab_test_master_edit->Days->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_edit->Cutoff->Visible) { // Cutoff ?>
	<div id="r_Cutoff" class="form-group row">
		<label id="elh_lab_test_master_Cutoff" for="x_Cutoff" class="<?php echo $lab_test_master_edit->LeftColumnClass ?>"><?php echo $lab_test_master_edit->Cutoff->caption() ?><?php echo $lab_test_master_edit->Cutoff->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_edit->RightColumnClass ?>"><div <?php echo $lab_test_master_edit->Cutoff->cellAttributes() ?>>
<span id="el_lab_test_master_Cutoff">
<input type="text" data-table="lab_test_master" data-field="x_Cutoff" name="x_Cutoff" id="x_Cutoff" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($lab_test_master_edit->Cutoff->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_edit->Cutoff->EditValue ?>"<?php echo $lab_test_master_edit->Cutoff->editAttributes() ?>>
</span>
<?php echo $lab_test_master_edit->Cutoff->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_edit->FontBold->Visible) { // FontBold ?>
	<div id="r_FontBold" class="form-group row">
		<label id="elh_lab_test_master_FontBold" for="x_FontBold" class="<?php echo $lab_test_master_edit->LeftColumnClass ?>"><?php echo $lab_test_master_edit->FontBold->caption() ?><?php echo $lab_test_master_edit->FontBold->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_edit->RightColumnClass ?>"><div <?php echo $lab_test_master_edit->FontBold->cellAttributes() ?>>
<span id="el_lab_test_master_FontBold">
<input type="text" data-table="lab_test_master" data-field="x_FontBold" name="x_FontBold" id="x_FontBold" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_master_edit->FontBold->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_edit->FontBold->EditValue ?>"<?php echo $lab_test_master_edit->FontBold->editAttributes() ?>>
</span>
<?php echo $lab_test_master_edit->FontBold->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_edit->TestHeading->Visible) { // TestHeading ?>
	<div id="r_TestHeading" class="form-group row">
		<label id="elh_lab_test_master_TestHeading" for="x_TestHeading" class="<?php echo $lab_test_master_edit->LeftColumnClass ?>"><?php echo $lab_test_master_edit->TestHeading->caption() ?><?php echo $lab_test_master_edit->TestHeading->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_edit->RightColumnClass ?>"><div <?php echo $lab_test_master_edit->TestHeading->cellAttributes() ?>>
<span id="el_lab_test_master_TestHeading">
<input type="text" data-table="lab_test_master" data-field="x_TestHeading" name="x_TestHeading" id="x_TestHeading" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_master_edit->TestHeading->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_edit->TestHeading->EditValue ?>"<?php echo $lab_test_master_edit->TestHeading->editAttributes() ?>>
</span>
<?php echo $lab_test_master_edit->TestHeading->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_edit->Outsource->Visible) { // Outsource ?>
	<div id="r_Outsource" class="form-group row">
		<label id="elh_lab_test_master_Outsource" for="x_Outsource" class="<?php echo $lab_test_master_edit->LeftColumnClass ?>"><?php echo $lab_test_master_edit->Outsource->caption() ?><?php echo $lab_test_master_edit->Outsource->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_edit->RightColumnClass ?>"><div <?php echo $lab_test_master_edit->Outsource->cellAttributes() ?>>
<span id="el_lab_test_master_Outsource">
<input type="text" data-table="lab_test_master" data-field="x_Outsource" name="x_Outsource" id="x_Outsource" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_master_edit->Outsource->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_edit->Outsource->EditValue ?>"<?php echo $lab_test_master_edit->Outsource->editAttributes() ?>>
</span>
<?php echo $lab_test_master_edit->Outsource->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_edit->NoResult->Visible) { // NoResult ?>
	<div id="r_NoResult" class="form-group row">
		<label id="elh_lab_test_master_NoResult" for="x_NoResult" class="<?php echo $lab_test_master_edit->LeftColumnClass ?>"><?php echo $lab_test_master_edit->NoResult->caption() ?><?php echo $lab_test_master_edit->NoResult->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_edit->RightColumnClass ?>"><div <?php echo $lab_test_master_edit->NoResult->cellAttributes() ?>>
<span id="el_lab_test_master_NoResult">
<input type="text" data-table="lab_test_master" data-field="x_NoResult" name="x_NoResult" id="x_NoResult" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_master_edit->NoResult->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_edit->NoResult->EditValue ?>"<?php echo $lab_test_master_edit->NoResult->editAttributes() ?>>
</span>
<?php echo $lab_test_master_edit->NoResult->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_edit->GraphLow->Visible) { // GraphLow ?>
	<div id="r_GraphLow" class="form-group row">
		<label id="elh_lab_test_master_GraphLow" for="x_GraphLow" class="<?php echo $lab_test_master_edit->LeftColumnClass ?>"><?php echo $lab_test_master_edit->GraphLow->caption() ?><?php echo $lab_test_master_edit->GraphLow->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_edit->RightColumnClass ?>"><div <?php echo $lab_test_master_edit->GraphLow->cellAttributes() ?>>
<span id="el_lab_test_master_GraphLow">
<input type="text" data-table="lab_test_master" data-field="x_GraphLow" name="x_GraphLow" id="x_GraphLow" size="30" placeholder="<?php echo HtmlEncode($lab_test_master_edit->GraphLow->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_edit->GraphLow->EditValue ?>"<?php echo $lab_test_master_edit->GraphLow->editAttributes() ?>>
</span>
<?php echo $lab_test_master_edit->GraphLow->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_edit->GraphHigh->Visible) { // GraphHigh ?>
	<div id="r_GraphHigh" class="form-group row">
		<label id="elh_lab_test_master_GraphHigh" for="x_GraphHigh" class="<?php echo $lab_test_master_edit->LeftColumnClass ?>"><?php echo $lab_test_master_edit->GraphHigh->caption() ?><?php echo $lab_test_master_edit->GraphHigh->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_edit->RightColumnClass ?>"><div <?php echo $lab_test_master_edit->GraphHigh->cellAttributes() ?>>
<span id="el_lab_test_master_GraphHigh">
<input type="text" data-table="lab_test_master" data-field="x_GraphHigh" name="x_GraphHigh" id="x_GraphHigh" size="30" placeholder="<?php echo HtmlEncode($lab_test_master_edit->GraphHigh->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_edit->GraphHigh->EditValue ?>"<?php echo $lab_test_master_edit->GraphHigh->editAttributes() ?>>
</span>
<?php echo $lab_test_master_edit->GraphHigh->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_edit->CollSample->Visible) { // CollSample ?>
	<div id="r_CollSample" class="form-group row">
		<label id="elh_lab_test_master_CollSample" for="x_CollSample" class="<?php echo $lab_test_master_edit->LeftColumnClass ?>"><?php echo $lab_test_master_edit->CollSample->caption() ?><?php echo $lab_test_master_edit->CollSample->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_edit->RightColumnClass ?>"><div <?php echo $lab_test_master_edit->CollSample->cellAttributes() ?>>
<span id="el_lab_test_master_CollSample">
<input type="text" data-table="lab_test_master" data-field="x_CollSample" name="x_CollSample" id="x_CollSample" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($lab_test_master_edit->CollSample->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_edit->CollSample->EditValue ?>"<?php echo $lab_test_master_edit->CollSample->editAttributes() ?>>
</span>
<?php echo $lab_test_master_edit->CollSample->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_edit->ProcessTime->Visible) { // ProcessTime ?>
	<div id="r_ProcessTime" class="form-group row">
		<label id="elh_lab_test_master_ProcessTime" for="x_ProcessTime" class="<?php echo $lab_test_master_edit->LeftColumnClass ?>"><?php echo $lab_test_master_edit->ProcessTime->caption() ?><?php echo $lab_test_master_edit->ProcessTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_edit->RightColumnClass ?>"><div <?php echo $lab_test_master_edit->ProcessTime->cellAttributes() ?>>
<span id="el_lab_test_master_ProcessTime">
<input type="text" data-table="lab_test_master" data-field="x_ProcessTime" name="x_ProcessTime" id="x_ProcessTime" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($lab_test_master_edit->ProcessTime->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_edit->ProcessTime->EditValue ?>"<?php echo $lab_test_master_edit->ProcessTime->editAttributes() ?>>
</span>
<?php echo $lab_test_master_edit->ProcessTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_edit->TamilName->Visible) { // TamilName ?>
	<div id="r_TamilName" class="form-group row">
		<label id="elh_lab_test_master_TamilName" for="x_TamilName" class="<?php echo $lab_test_master_edit->LeftColumnClass ?>"><?php echo $lab_test_master_edit->TamilName->caption() ?><?php echo $lab_test_master_edit->TamilName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_edit->RightColumnClass ?>"><div <?php echo $lab_test_master_edit->TamilName->cellAttributes() ?>>
<span id="el_lab_test_master_TamilName">
<input type="text" data-table="lab_test_master" data-field="x_TamilName" name="x_TamilName" id="x_TamilName" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($lab_test_master_edit->TamilName->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_edit->TamilName->EditValue ?>"<?php echo $lab_test_master_edit->TamilName->editAttributes() ?>>
</span>
<?php echo $lab_test_master_edit->TamilName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_edit->ShortName->Visible) { // ShortName ?>
	<div id="r_ShortName" class="form-group row">
		<label id="elh_lab_test_master_ShortName" for="x_ShortName" class="<?php echo $lab_test_master_edit->LeftColumnClass ?>"><?php echo $lab_test_master_edit->ShortName->caption() ?><?php echo $lab_test_master_edit->ShortName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_edit->RightColumnClass ?>"><div <?php echo $lab_test_master_edit->ShortName->cellAttributes() ?>>
<span id="el_lab_test_master_ShortName">
<input type="text" data-table="lab_test_master" data-field="x_ShortName" name="x_ShortName" id="x_ShortName" size="30" maxlength="7" placeholder="<?php echo HtmlEncode($lab_test_master_edit->ShortName->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_edit->ShortName->EditValue ?>"<?php echo $lab_test_master_edit->ShortName->editAttributes() ?>>
</span>
<?php echo $lab_test_master_edit->ShortName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_edit->Individual->Visible) { // Individual ?>
	<div id="r_Individual" class="form-group row">
		<label id="elh_lab_test_master_Individual" for="x_Individual" class="<?php echo $lab_test_master_edit->LeftColumnClass ?>"><?php echo $lab_test_master_edit->Individual->caption() ?><?php echo $lab_test_master_edit->Individual->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_edit->RightColumnClass ?>"><div <?php echo $lab_test_master_edit->Individual->cellAttributes() ?>>
<span id="el_lab_test_master_Individual">
<input type="text" data-table="lab_test_master" data-field="x_Individual" name="x_Individual" id="x_Individual" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_master_edit->Individual->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_edit->Individual->EditValue ?>"<?php echo $lab_test_master_edit->Individual->editAttributes() ?>>
</span>
<?php echo $lab_test_master_edit->Individual->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_edit->PrevAmt->Visible) { // PrevAmt ?>
	<div id="r_PrevAmt" class="form-group row">
		<label id="elh_lab_test_master_PrevAmt" for="x_PrevAmt" class="<?php echo $lab_test_master_edit->LeftColumnClass ?>"><?php echo $lab_test_master_edit->PrevAmt->caption() ?><?php echo $lab_test_master_edit->PrevAmt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_edit->RightColumnClass ?>"><div <?php echo $lab_test_master_edit->PrevAmt->cellAttributes() ?>>
<span id="el_lab_test_master_PrevAmt">
<input type="text" data-table="lab_test_master" data-field="x_PrevAmt" name="x_PrevAmt" id="x_PrevAmt" size="30" placeholder="<?php echo HtmlEncode($lab_test_master_edit->PrevAmt->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_edit->PrevAmt->EditValue ?>"<?php echo $lab_test_master_edit->PrevAmt->editAttributes() ?>>
</span>
<?php echo $lab_test_master_edit->PrevAmt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_edit->PrevSplAmt->Visible) { // PrevSplAmt ?>
	<div id="r_PrevSplAmt" class="form-group row">
		<label id="elh_lab_test_master_PrevSplAmt" for="x_PrevSplAmt" class="<?php echo $lab_test_master_edit->LeftColumnClass ?>"><?php echo $lab_test_master_edit->PrevSplAmt->caption() ?><?php echo $lab_test_master_edit->PrevSplAmt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_edit->RightColumnClass ?>"><div <?php echo $lab_test_master_edit->PrevSplAmt->cellAttributes() ?>>
<span id="el_lab_test_master_PrevSplAmt">
<input type="text" data-table="lab_test_master" data-field="x_PrevSplAmt" name="x_PrevSplAmt" id="x_PrevSplAmt" size="30" placeholder="<?php echo HtmlEncode($lab_test_master_edit->PrevSplAmt->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_edit->PrevSplAmt->EditValue ?>"<?php echo $lab_test_master_edit->PrevSplAmt->editAttributes() ?>>
</span>
<?php echo $lab_test_master_edit->PrevSplAmt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_edit->Remarks->Visible) { // Remarks ?>
	<div id="r_Remarks" class="form-group row">
		<label id="elh_lab_test_master_Remarks" for="x_Remarks" class="<?php echo $lab_test_master_edit->LeftColumnClass ?>"><?php echo $lab_test_master_edit->Remarks->caption() ?><?php echo $lab_test_master_edit->Remarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_edit->RightColumnClass ?>"><div <?php echo $lab_test_master_edit->Remarks->cellAttributes() ?>>
<span id="el_lab_test_master_Remarks">
<textarea data-table="lab_test_master" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" cols="35" rows="4" placeholder="<?php echo HtmlEncode($lab_test_master_edit->Remarks->getPlaceHolder()) ?>"<?php echo $lab_test_master_edit->Remarks->editAttributes() ?>><?php echo $lab_test_master_edit->Remarks->EditValue ?></textarea>
</span>
<?php echo $lab_test_master_edit->Remarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_edit->EditDate->Visible) { // EditDate ?>
	<div id="r_EditDate" class="form-group row">
		<label id="elh_lab_test_master_EditDate" for="x_EditDate" class="<?php echo $lab_test_master_edit->LeftColumnClass ?>"><?php echo $lab_test_master_edit->EditDate->caption() ?><?php echo $lab_test_master_edit->EditDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_edit->RightColumnClass ?>"><div <?php echo $lab_test_master_edit->EditDate->cellAttributes() ?>>
<span id="el_lab_test_master_EditDate">
<input type="text" data-table="lab_test_master" data-field="x_EditDate" name="x_EditDate" id="x_EditDate" placeholder="<?php echo HtmlEncode($lab_test_master_edit->EditDate->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_edit->EditDate->EditValue ?>"<?php echo $lab_test_master_edit->EditDate->editAttributes() ?>>
<?php if (!$lab_test_master_edit->EditDate->ReadOnly && !$lab_test_master_edit->EditDate->Disabled && !isset($lab_test_master_edit->EditDate->EditAttrs["readonly"]) && !isset($lab_test_master_edit->EditDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_masteredit", "datetimepicker"], function() {
	ew.createDateTimePicker("flab_test_masteredit", "x_EditDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $lab_test_master_edit->EditDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_edit->BillName->Visible) { // BillName ?>
	<div id="r_BillName" class="form-group row">
		<label id="elh_lab_test_master_BillName" for="x_BillName" class="<?php echo $lab_test_master_edit->LeftColumnClass ?>"><?php echo $lab_test_master_edit->BillName->caption() ?><?php echo $lab_test_master_edit->BillName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_edit->RightColumnClass ?>"><div <?php echo $lab_test_master_edit->BillName->cellAttributes() ?>>
<span id="el_lab_test_master_BillName">
<input type="text" data-table="lab_test_master" data-field="x_BillName" name="x_BillName" id="x_BillName" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($lab_test_master_edit->BillName->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_edit->BillName->EditValue ?>"<?php echo $lab_test_master_edit->BillName->editAttributes() ?>>
</span>
<?php echo $lab_test_master_edit->BillName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_edit->ActualAmt->Visible) { // ActualAmt ?>
	<div id="r_ActualAmt" class="form-group row">
		<label id="elh_lab_test_master_ActualAmt" for="x_ActualAmt" class="<?php echo $lab_test_master_edit->LeftColumnClass ?>"><?php echo $lab_test_master_edit->ActualAmt->caption() ?><?php echo $lab_test_master_edit->ActualAmt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_edit->RightColumnClass ?>"><div <?php echo $lab_test_master_edit->ActualAmt->cellAttributes() ?>>
<span id="el_lab_test_master_ActualAmt">
<input type="text" data-table="lab_test_master" data-field="x_ActualAmt" name="x_ActualAmt" id="x_ActualAmt" size="30" placeholder="<?php echo HtmlEncode($lab_test_master_edit->ActualAmt->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_edit->ActualAmt->EditValue ?>"<?php echo $lab_test_master_edit->ActualAmt->editAttributes() ?>>
</span>
<?php echo $lab_test_master_edit->ActualAmt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_edit->HISCD->Visible) { // HISCD ?>
	<div id="r_HISCD" class="form-group row">
		<label id="elh_lab_test_master_HISCD" for="x_HISCD" class="<?php echo $lab_test_master_edit->LeftColumnClass ?>"><?php echo $lab_test_master_edit->HISCD->caption() ?><?php echo $lab_test_master_edit->HISCD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_edit->RightColumnClass ?>"><div <?php echo $lab_test_master_edit->HISCD->cellAttributes() ?>>
<span id="el_lab_test_master_HISCD">
<input type="text" data-table="lab_test_master" data-field="x_HISCD" name="x_HISCD" id="x_HISCD" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($lab_test_master_edit->HISCD->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_edit->HISCD->EditValue ?>"<?php echo $lab_test_master_edit->HISCD->editAttributes() ?>>
</span>
<?php echo $lab_test_master_edit->HISCD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_edit->PriceList->Visible) { // PriceList ?>
	<div id="r_PriceList" class="form-group row">
		<label id="elh_lab_test_master_PriceList" for="x_PriceList" class="<?php echo $lab_test_master_edit->LeftColumnClass ?>"><?php echo $lab_test_master_edit->PriceList->caption() ?><?php echo $lab_test_master_edit->PriceList->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_edit->RightColumnClass ?>"><div <?php echo $lab_test_master_edit->PriceList->cellAttributes() ?>>
<span id="el_lab_test_master_PriceList">
<input type="text" data-table="lab_test_master" data-field="x_PriceList" name="x_PriceList" id="x_PriceList" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_master_edit->PriceList->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_edit->PriceList->EditValue ?>"<?php echo $lab_test_master_edit->PriceList->editAttributes() ?>>
</span>
<?php echo $lab_test_master_edit->PriceList->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_edit->IPAmt->Visible) { // IPAmt ?>
	<div id="r_IPAmt" class="form-group row">
		<label id="elh_lab_test_master_IPAmt" for="x_IPAmt" class="<?php echo $lab_test_master_edit->LeftColumnClass ?>"><?php echo $lab_test_master_edit->IPAmt->caption() ?><?php echo $lab_test_master_edit->IPAmt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_edit->RightColumnClass ?>"><div <?php echo $lab_test_master_edit->IPAmt->cellAttributes() ?>>
<span id="el_lab_test_master_IPAmt">
<input type="text" data-table="lab_test_master" data-field="x_IPAmt" name="x_IPAmt" id="x_IPAmt" size="30" placeholder="<?php echo HtmlEncode($lab_test_master_edit->IPAmt->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_edit->IPAmt->EditValue ?>"<?php echo $lab_test_master_edit->IPAmt->editAttributes() ?>>
</span>
<?php echo $lab_test_master_edit->IPAmt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_edit->InsAmt->Visible) { // InsAmt ?>
	<div id="r_InsAmt" class="form-group row">
		<label id="elh_lab_test_master_InsAmt" for="x_InsAmt" class="<?php echo $lab_test_master_edit->LeftColumnClass ?>"><?php echo $lab_test_master_edit->InsAmt->caption() ?><?php echo $lab_test_master_edit->InsAmt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_edit->RightColumnClass ?>"><div <?php echo $lab_test_master_edit->InsAmt->cellAttributes() ?>>
<span id="el_lab_test_master_InsAmt">
<input type="text" data-table="lab_test_master" data-field="x_InsAmt" name="x_InsAmt" id="x_InsAmt" size="30" placeholder="<?php echo HtmlEncode($lab_test_master_edit->InsAmt->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_edit->InsAmt->EditValue ?>"<?php echo $lab_test_master_edit->InsAmt->editAttributes() ?>>
</span>
<?php echo $lab_test_master_edit->InsAmt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_edit->ManualCD->Visible) { // ManualCD ?>
	<div id="r_ManualCD" class="form-group row">
		<label id="elh_lab_test_master_ManualCD" for="x_ManualCD" class="<?php echo $lab_test_master_edit->LeftColumnClass ?>"><?php echo $lab_test_master_edit->ManualCD->caption() ?><?php echo $lab_test_master_edit->ManualCD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_edit->RightColumnClass ?>"><div <?php echo $lab_test_master_edit->ManualCD->cellAttributes() ?>>
<span id="el_lab_test_master_ManualCD">
<input type="text" data-table="lab_test_master" data-field="x_ManualCD" name="x_ManualCD" id="x_ManualCD" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($lab_test_master_edit->ManualCD->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_edit->ManualCD->EditValue ?>"<?php echo $lab_test_master_edit->ManualCD->editAttributes() ?>>
</span>
<?php echo $lab_test_master_edit->ManualCD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_edit->Free->Visible) { // Free ?>
	<div id="r_Free" class="form-group row">
		<label id="elh_lab_test_master_Free" for="x_Free" class="<?php echo $lab_test_master_edit->LeftColumnClass ?>"><?php echo $lab_test_master_edit->Free->caption() ?><?php echo $lab_test_master_edit->Free->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_edit->RightColumnClass ?>"><div <?php echo $lab_test_master_edit->Free->cellAttributes() ?>>
<span id="el_lab_test_master_Free">
<input type="text" data-table="lab_test_master" data-field="x_Free" name="x_Free" id="x_Free" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_master_edit->Free->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_edit->Free->EditValue ?>"<?php echo $lab_test_master_edit->Free->editAttributes() ?>>
</span>
<?php echo $lab_test_master_edit->Free->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_edit->AutoAuth->Visible) { // AutoAuth ?>
	<div id="r_AutoAuth" class="form-group row">
		<label id="elh_lab_test_master_AutoAuth" for="x_AutoAuth" class="<?php echo $lab_test_master_edit->LeftColumnClass ?>"><?php echo $lab_test_master_edit->AutoAuth->caption() ?><?php echo $lab_test_master_edit->AutoAuth->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_edit->RightColumnClass ?>"><div <?php echo $lab_test_master_edit->AutoAuth->cellAttributes() ?>>
<span id="el_lab_test_master_AutoAuth">
<input type="text" data-table="lab_test_master" data-field="x_AutoAuth" name="x_AutoAuth" id="x_AutoAuth" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_master_edit->AutoAuth->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_edit->AutoAuth->EditValue ?>"<?php echo $lab_test_master_edit->AutoAuth->editAttributes() ?>>
</span>
<?php echo $lab_test_master_edit->AutoAuth->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_edit->ProductCD->Visible) { // ProductCD ?>
	<div id="r_ProductCD" class="form-group row">
		<label id="elh_lab_test_master_ProductCD" for="x_ProductCD" class="<?php echo $lab_test_master_edit->LeftColumnClass ?>"><?php echo $lab_test_master_edit->ProductCD->caption() ?><?php echo $lab_test_master_edit->ProductCD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_edit->RightColumnClass ?>"><div <?php echo $lab_test_master_edit->ProductCD->cellAttributes() ?>>
<span id="el_lab_test_master_ProductCD">
<input type="text" data-table="lab_test_master" data-field="x_ProductCD" name="x_ProductCD" id="x_ProductCD" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($lab_test_master_edit->ProductCD->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_edit->ProductCD->EditValue ?>"<?php echo $lab_test_master_edit->ProductCD->editAttributes() ?>>
</span>
<?php echo $lab_test_master_edit->ProductCD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_edit->Inventory->Visible) { // Inventory ?>
	<div id="r_Inventory" class="form-group row">
		<label id="elh_lab_test_master_Inventory" for="x_Inventory" class="<?php echo $lab_test_master_edit->LeftColumnClass ?>"><?php echo $lab_test_master_edit->Inventory->caption() ?><?php echo $lab_test_master_edit->Inventory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_edit->RightColumnClass ?>"><div <?php echo $lab_test_master_edit->Inventory->cellAttributes() ?>>
<span id="el_lab_test_master_Inventory">
<input type="text" data-table="lab_test_master" data-field="x_Inventory" name="x_Inventory" id="x_Inventory" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_master_edit->Inventory->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_edit->Inventory->EditValue ?>"<?php echo $lab_test_master_edit->Inventory->editAttributes() ?>>
</span>
<?php echo $lab_test_master_edit->Inventory->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_edit->IntimateTest->Visible) { // IntimateTest ?>
	<div id="r_IntimateTest" class="form-group row">
		<label id="elh_lab_test_master_IntimateTest" for="x_IntimateTest" class="<?php echo $lab_test_master_edit->LeftColumnClass ?>"><?php echo $lab_test_master_edit->IntimateTest->caption() ?><?php echo $lab_test_master_edit->IntimateTest->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_edit->RightColumnClass ?>"><div <?php echo $lab_test_master_edit->IntimateTest->cellAttributes() ?>>
<span id="el_lab_test_master_IntimateTest">
<input type="text" data-table="lab_test_master" data-field="x_IntimateTest" name="x_IntimateTest" id="x_IntimateTest" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_master_edit->IntimateTest->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_edit->IntimateTest->EditValue ?>"<?php echo $lab_test_master_edit->IntimateTest->editAttributes() ?>>
</span>
<?php echo $lab_test_master_edit->IntimateTest->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_master_edit->Manual->Visible) { // Manual ?>
	<div id="r_Manual" class="form-group row">
		<label id="elh_lab_test_master_Manual" for="x_Manual" class="<?php echo $lab_test_master_edit->LeftColumnClass ?>"><?php echo $lab_test_master_edit->Manual->caption() ?><?php echo $lab_test_master_edit->Manual->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_master_edit->RightColumnClass ?>"><div <?php echo $lab_test_master_edit->Manual->cellAttributes() ?>>
<span id="el_lab_test_master_Manual">
<input type="text" data-table="lab_test_master" data-field="x_Manual" name="x_Manual" id="x_Manual" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_master_edit->Manual->getPlaceHolder()) ?>" value="<?php echo $lab_test_master_edit->Manual->EditValue ?>"<?php echo $lab_test_master_edit->Manual->editAttributes() ?>>
</span>
<?php echo $lab_test_master_edit->Manual->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$lab_test_master_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $lab_test_master_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $lab_test_master_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$lab_test_master_edit->showPageFooter();
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
$lab_test_master_edit->terminate();
?>