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
$lab_test_result_add = new lab_test_result_add();

// Run the page
$lab_test_result_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_test_result_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var flab_test_resultadd = currentForm = new ew.Form("flab_test_resultadd", "add");

// Validate form
flab_test_resultadd.validate = function() {
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
		<?php if ($lab_test_result_add->Branch->Required) { ?>
			elm = this.getElements("x" + infix + "_Branch");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->Branch->caption(), $lab_test_result->Branch->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_add->SidNo->Required) { ?>
			elm = this.getElements("x" + infix + "_SidNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->SidNo->caption(), $lab_test_result->SidNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_add->SidDate->Required) { ?>
			elm = this.getElements("x" + infix + "_SidDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->SidDate->caption(), $lab_test_result->SidDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SidDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($lab_test_result->SidDate->errorMessage()) ?>");
		<?php if ($lab_test_result_add->TestCd->Required) { ?>
			elm = this.getElements("x" + infix + "_TestCd");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->TestCd->caption(), $lab_test_result->TestCd->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_add->TestSubCd->Required) { ?>
			elm = this.getElements("x" + infix + "_TestSubCd");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->TestSubCd->caption(), $lab_test_result->TestSubCd->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_add->DEptCd->Required) { ?>
			elm = this.getElements("x" + infix + "_DEptCd");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->DEptCd->caption(), $lab_test_result->DEptCd->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_add->ProfCd->Required) { ?>
			elm = this.getElements("x" + infix + "_ProfCd");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->ProfCd->caption(), $lab_test_result->ProfCd->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_add->LabReport->Required) { ?>
			elm = this.getElements("x" + infix + "_LabReport");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->LabReport->caption(), $lab_test_result->LabReport->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_add->ResultDate->Required) { ?>
			elm = this.getElements("x" + infix + "_ResultDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->ResultDate->caption(), $lab_test_result->ResultDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ResultDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($lab_test_result->ResultDate->errorMessage()) ?>");
		<?php if ($lab_test_result_add->Comments->Required) { ?>
			elm = this.getElements("x" + infix + "_Comments");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->Comments->caption(), $lab_test_result->Comments->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_add->Method->Required) { ?>
			elm = this.getElements("x" + infix + "_Method");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->Method->caption(), $lab_test_result->Method->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_add->Specimen->Required) { ?>
			elm = this.getElements("x" + infix + "_Specimen");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->Specimen->caption(), $lab_test_result->Specimen->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_add->Amount->Required) { ?>
			elm = this.getElements("x" + infix + "_Amount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->Amount->caption(), $lab_test_result->Amount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Amount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($lab_test_result->Amount->errorMessage()) ?>");
		<?php if ($lab_test_result_add->ResultBy->Required) { ?>
			elm = this.getElements("x" + infix + "_ResultBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->ResultBy->caption(), $lab_test_result->ResultBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_add->AuthBy->Required) { ?>
			elm = this.getElements("x" + infix + "_AuthBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->AuthBy->caption(), $lab_test_result->AuthBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_add->AuthDate->Required) { ?>
			elm = this.getElements("x" + infix + "_AuthDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->AuthDate->caption(), $lab_test_result->AuthDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_AuthDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($lab_test_result->AuthDate->errorMessage()) ?>");
		<?php if ($lab_test_result_add->Abnormal->Required) { ?>
			elm = this.getElements("x" + infix + "_Abnormal");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->Abnormal->caption(), $lab_test_result->Abnormal->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_add->Printed->Required) { ?>
			elm = this.getElements("x" + infix + "_Printed");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->Printed->caption(), $lab_test_result->Printed->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_add->Dispatch->Required) { ?>
			elm = this.getElements("x" + infix + "_Dispatch");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->Dispatch->caption(), $lab_test_result->Dispatch->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_add->LOWHIGH->Required) { ?>
			elm = this.getElements("x" + infix + "_LOWHIGH");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->LOWHIGH->caption(), $lab_test_result->LOWHIGH->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_add->RefValue->Required) { ?>
			elm = this.getElements("x" + infix + "_RefValue");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->RefValue->caption(), $lab_test_result->RefValue->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_add->Unit->Required) { ?>
			elm = this.getElements("x" + infix + "_Unit");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->Unit->caption(), $lab_test_result->Unit->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_add->ResDate->Required) { ?>
			elm = this.getElements("x" + infix + "_ResDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->ResDate->caption(), $lab_test_result->ResDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ResDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($lab_test_result->ResDate->errorMessage()) ?>");
		<?php if ($lab_test_result_add->Pic1->Required) { ?>
			elm = this.getElements("x" + infix + "_Pic1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->Pic1->caption(), $lab_test_result->Pic1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_add->Pic2->Required) { ?>
			elm = this.getElements("x" + infix + "_Pic2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->Pic2->caption(), $lab_test_result->Pic2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_add->GraphPath->Required) { ?>
			elm = this.getElements("x" + infix + "_GraphPath");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->GraphPath->caption(), $lab_test_result->GraphPath->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_add->SampleDate->Required) { ?>
			elm = this.getElements("x" + infix + "_SampleDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->SampleDate->caption(), $lab_test_result->SampleDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SampleDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($lab_test_result->SampleDate->errorMessage()) ?>");
		<?php if ($lab_test_result_add->SampleUser->Required) { ?>
			elm = this.getElements("x" + infix + "_SampleUser");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->SampleUser->caption(), $lab_test_result->SampleUser->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_add->ReceivedDate->Required) { ?>
			elm = this.getElements("x" + infix + "_ReceivedDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->ReceivedDate->caption(), $lab_test_result->ReceivedDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ReceivedDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($lab_test_result->ReceivedDate->errorMessage()) ?>");
		<?php if ($lab_test_result_add->ReceivedUser->Required) { ?>
			elm = this.getElements("x" + infix + "_ReceivedUser");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->ReceivedUser->caption(), $lab_test_result->ReceivedUser->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_add->DeptRecvDate->Required) { ?>
			elm = this.getElements("x" + infix + "_DeptRecvDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->DeptRecvDate->caption(), $lab_test_result->DeptRecvDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DeptRecvDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($lab_test_result->DeptRecvDate->errorMessage()) ?>");
		<?php if ($lab_test_result_add->DeptRecvUser->Required) { ?>
			elm = this.getElements("x" + infix + "_DeptRecvUser");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->DeptRecvUser->caption(), $lab_test_result->DeptRecvUser->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_add->PrintBy->Required) { ?>
			elm = this.getElements("x" + infix + "_PrintBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->PrintBy->caption(), $lab_test_result->PrintBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_add->PrintDate->Required) { ?>
			elm = this.getElements("x" + infix + "_PrintDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->PrintDate->caption(), $lab_test_result->PrintDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PrintDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($lab_test_result->PrintDate->errorMessage()) ?>");
		<?php if ($lab_test_result_add->MachineCD->Required) { ?>
			elm = this.getElements("x" + infix + "_MachineCD");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->MachineCD->caption(), $lab_test_result->MachineCD->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_add->TestCancel->Required) { ?>
			elm = this.getElements("x" + infix + "_TestCancel");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->TestCancel->caption(), $lab_test_result->TestCancel->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_add->OutSource->Required) { ?>
			elm = this.getElements("x" + infix + "_OutSource");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->OutSource->caption(), $lab_test_result->OutSource->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_add->Tariff->Required) { ?>
			elm = this.getElements("x" + infix + "_Tariff");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->Tariff->caption(), $lab_test_result->Tariff->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Tariff");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($lab_test_result->Tariff->errorMessage()) ?>");
		<?php if ($lab_test_result_add->EDITDATE->Required) { ?>
			elm = this.getElements("x" + infix + "_EDITDATE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->EDITDATE->caption(), $lab_test_result->EDITDATE->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_EDITDATE");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($lab_test_result->EDITDATE->errorMessage()) ?>");
		<?php if ($lab_test_result_add->UPLOAD->Required) { ?>
			elm = this.getElements("x" + infix + "_UPLOAD");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->UPLOAD->caption(), $lab_test_result->UPLOAD->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_add->SAuthDate->Required) { ?>
			elm = this.getElements("x" + infix + "_SAuthDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->SAuthDate->caption(), $lab_test_result->SAuthDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SAuthDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($lab_test_result->SAuthDate->errorMessage()) ?>");
		<?php if ($lab_test_result_add->SAuthBy->Required) { ?>
			elm = this.getElements("x" + infix + "_SAuthBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->SAuthBy->caption(), $lab_test_result->SAuthBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_add->NoRC->Required) { ?>
			elm = this.getElements("x" + infix + "_NoRC");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->NoRC->caption(), $lab_test_result->NoRC->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_add->DispDt->Required) { ?>
			elm = this.getElements("x" + infix + "_DispDt");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->DispDt->caption(), $lab_test_result->DispDt->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DispDt");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($lab_test_result->DispDt->errorMessage()) ?>");
		<?php if ($lab_test_result_add->DispUser->Required) { ?>
			elm = this.getElements("x" + infix + "_DispUser");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->DispUser->caption(), $lab_test_result->DispUser->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_add->DispRemarks->Required) { ?>
			elm = this.getElements("x" + infix + "_DispRemarks");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->DispRemarks->caption(), $lab_test_result->DispRemarks->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_add->DispMode->Required) { ?>
			elm = this.getElements("x" + infix + "_DispMode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->DispMode->caption(), $lab_test_result->DispMode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_add->ProductCD->Required) { ?>
			elm = this.getElements("x" + infix + "_ProductCD");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->ProductCD->caption(), $lab_test_result->ProductCD->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_add->Nos->Required) { ?>
			elm = this.getElements("x" + infix + "_Nos");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->Nos->caption(), $lab_test_result->Nos->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Nos");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($lab_test_result->Nos->errorMessage()) ?>");
		<?php if ($lab_test_result_add->WBCPath->Required) { ?>
			elm = this.getElements("x" + infix + "_WBCPath");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->WBCPath->caption(), $lab_test_result->WBCPath->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_add->RBCPath->Required) { ?>
			elm = this.getElements("x" + infix + "_RBCPath");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->RBCPath->caption(), $lab_test_result->RBCPath->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_add->PTPath->Required) { ?>
			elm = this.getElements("x" + infix + "_PTPath");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->PTPath->caption(), $lab_test_result->PTPath->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_add->ActualAmt->Required) { ?>
			elm = this.getElements("x" + infix + "_ActualAmt");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->ActualAmt->caption(), $lab_test_result->ActualAmt->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ActualAmt");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($lab_test_result->ActualAmt->errorMessage()) ?>");
		<?php if ($lab_test_result_add->NoSign->Required) { ?>
			elm = this.getElements("x" + infix + "_NoSign");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->NoSign->caption(), $lab_test_result->NoSign->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_add->_Barcode->Required) { ?>
			elm = this.getElements("x" + infix + "__Barcode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->_Barcode->caption(), $lab_test_result->_Barcode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_add->ReadTime->Required) { ?>
			elm = this.getElements("x" + infix + "_ReadTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->ReadTime->caption(), $lab_test_result->ReadTime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ReadTime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($lab_test_result->ReadTime->errorMessage()) ?>");
		<?php if ($lab_test_result_add->Result->Required) { ?>
			elm = this.getElements("x" + infix + "_Result");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->Result->caption(), $lab_test_result->Result->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_add->VailID->Required) { ?>
			elm = this.getElements("x" + infix + "_VailID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->VailID->caption(), $lab_test_result->VailID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_add->ReadMachine->Required) { ?>
			elm = this.getElements("x" + infix + "_ReadMachine");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->ReadMachine->caption(), $lab_test_result->ReadMachine->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_add->LabCD->Required) { ?>
			elm = this.getElements("x" + infix + "_LabCD");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->LabCD->caption(), $lab_test_result->LabCD->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_add->OutLabAmt->Required) { ?>
			elm = this.getElements("x" + infix + "_OutLabAmt");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->OutLabAmt->caption(), $lab_test_result->OutLabAmt->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_OutLabAmt");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($lab_test_result->OutLabAmt->errorMessage()) ?>");
		<?php if ($lab_test_result_add->ProductQty->Required) { ?>
			elm = this.getElements("x" + infix + "_ProductQty");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->ProductQty->caption(), $lab_test_result->ProductQty->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ProductQty");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($lab_test_result->ProductQty->errorMessage()) ?>");
		<?php if ($lab_test_result_add->Repeat->Required) { ?>
			elm = this.getElements("x" + infix + "_Repeat");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->Repeat->caption(), $lab_test_result->Repeat->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_add->DeptNo->Required) { ?>
			elm = this.getElements("x" + infix + "_DeptNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->DeptNo->caption(), $lab_test_result->DeptNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_add->Desc1->Required) { ?>
			elm = this.getElements("x" + infix + "_Desc1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->Desc1->caption(), $lab_test_result->Desc1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_add->Desc2->Required) { ?>
			elm = this.getElements("x" + infix + "_Desc2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->Desc2->caption(), $lab_test_result->Desc2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_add->RptResult->Required) { ?>
			elm = this.getElements("x" + infix + "_RptResult");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->RptResult->caption(), $lab_test_result->RptResult->RequiredErrorMessage)) ?>");
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
flab_test_resultadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
flab_test_resultadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $lab_test_result_add->showPageHeader(); ?>
<?php
$lab_test_result_add->showMessage();
?>
<form name="flab_test_resultadd" id="flab_test_resultadd" class="<?php echo $lab_test_result_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($lab_test_result_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $lab_test_result_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_test_result">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$lab_test_result_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($lab_test_result->Branch->Visible) { // Branch ?>
	<div id="r_Branch" class="form-group row">
		<label id="elh_lab_test_result_Branch" for="x_Branch" class="<?php echo $lab_test_result_add->LeftColumnClass ?>"><?php echo $lab_test_result->Branch->caption() ?><?php echo ($lab_test_result->Branch->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_result_add->RightColumnClass ?>"><div<?php echo $lab_test_result->Branch->cellAttributes() ?>>
<span id="el_lab_test_result_Branch">
<input type="text" data-table="lab_test_result" data-field="x_Branch" name="x_Branch" id="x_Branch" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($lab_test_result->Branch->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->Branch->EditValue ?>"<?php echo $lab_test_result->Branch->editAttributes() ?>>
</span>
<?php echo $lab_test_result->Branch->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->SidNo->Visible) { // SidNo ?>
	<div id="r_SidNo" class="form-group row">
		<label id="elh_lab_test_result_SidNo" for="x_SidNo" class="<?php echo $lab_test_result_add->LeftColumnClass ?>"><?php echo $lab_test_result->SidNo->caption() ?><?php echo ($lab_test_result->SidNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_result_add->RightColumnClass ?>"><div<?php echo $lab_test_result->SidNo->cellAttributes() ?>>
<span id="el_lab_test_result_SidNo">
<input type="text" data-table="lab_test_result" data-field="x_SidNo" name="x_SidNo" id="x_SidNo" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($lab_test_result->SidNo->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->SidNo->EditValue ?>"<?php echo $lab_test_result->SidNo->editAttributes() ?>>
</span>
<?php echo $lab_test_result->SidNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->SidDate->Visible) { // SidDate ?>
	<div id="r_SidDate" class="form-group row">
		<label id="elh_lab_test_result_SidDate" for="x_SidDate" class="<?php echo $lab_test_result_add->LeftColumnClass ?>"><?php echo $lab_test_result->SidDate->caption() ?><?php echo ($lab_test_result->SidDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_result_add->RightColumnClass ?>"><div<?php echo $lab_test_result->SidDate->cellAttributes() ?>>
<span id="el_lab_test_result_SidDate">
<input type="text" data-table="lab_test_result" data-field="x_SidDate" name="x_SidDate" id="x_SidDate" placeholder="<?php echo HtmlEncode($lab_test_result->SidDate->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->SidDate->EditValue ?>"<?php echo $lab_test_result->SidDate->editAttributes() ?>>
<?php if (!$lab_test_result->SidDate->ReadOnly && !$lab_test_result->SidDate->Disabled && !isset($lab_test_result->SidDate->EditAttrs["readonly"]) && !isset($lab_test_result->SidDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("flab_test_resultadd", "x_SidDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $lab_test_result->SidDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->TestCd->Visible) { // TestCd ?>
	<div id="r_TestCd" class="form-group row">
		<label id="elh_lab_test_result_TestCd" for="x_TestCd" class="<?php echo $lab_test_result_add->LeftColumnClass ?>"><?php echo $lab_test_result->TestCd->caption() ?><?php echo ($lab_test_result->TestCd->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_result_add->RightColumnClass ?>"><div<?php echo $lab_test_result->TestCd->cellAttributes() ?>>
<span id="el_lab_test_result_TestCd">
<input type="text" data-table="lab_test_result" data-field="x_TestCd" name="x_TestCd" id="x_TestCd" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($lab_test_result->TestCd->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->TestCd->EditValue ?>"<?php echo $lab_test_result->TestCd->editAttributes() ?>>
</span>
<?php echo $lab_test_result->TestCd->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->TestSubCd->Visible) { // TestSubCd ?>
	<div id="r_TestSubCd" class="form-group row">
		<label id="elh_lab_test_result_TestSubCd" for="x_TestSubCd" class="<?php echo $lab_test_result_add->LeftColumnClass ?>"><?php echo $lab_test_result->TestSubCd->caption() ?><?php echo ($lab_test_result->TestSubCd->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_result_add->RightColumnClass ?>"><div<?php echo $lab_test_result->TestSubCd->cellAttributes() ?>>
<span id="el_lab_test_result_TestSubCd">
<input type="text" data-table="lab_test_result" data-field="x_TestSubCd" name="x_TestSubCd" id="x_TestSubCd" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($lab_test_result->TestSubCd->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->TestSubCd->EditValue ?>"<?php echo $lab_test_result->TestSubCd->editAttributes() ?>>
</span>
<?php echo $lab_test_result->TestSubCd->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->DEptCd->Visible) { // DEptCd ?>
	<div id="r_DEptCd" class="form-group row">
		<label id="elh_lab_test_result_DEptCd" for="x_DEptCd" class="<?php echo $lab_test_result_add->LeftColumnClass ?>"><?php echo $lab_test_result->DEptCd->caption() ?><?php echo ($lab_test_result->DEptCd->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_result_add->RightColumnClass ?>"><div<?php echo $lab_test_result->DEptCd->cellAttributes() ?>>
<span id="el_lab_test_result_DEptCd">
<input type="text" data-table="lab_test_result" data-field="x_DEptCd" name="x_DEptCd" id="x_DEptCd" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($lab_test_result->DEptCd->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->DEptCd->EditValue ?>"<?php echo $lab_test_result->DEptCd->editAttributes() ?>>
</span>
<?php echo $lab_test_result->DEptCd->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->ProfCd->Visible) { // ProfCd ?>
	<div id="r_ProfCd" class="form-group row">
		<label id="elh_lab_test_result_ProfCd" for="x_ProfCd" class="<?php echo $lab_test_result_add->LeftColumnClass ?>"><?php echo $lab_test_result->ProfCd->caption() ?><?php echo ($lab_test_result->ProfCd->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_result_add->RightColumnClass ?>"><div<?php echo $lab_test_result->ProfCd->cellAttributes() ?>>
<span id="el_lab_test_result_ProfCd">
<input type="text" data-table="lab_test_result" data-field="x_ProfCd" name="x_ProfCd" id="x_ProfCd" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($lab_test_result->ProfCd->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->ProfCd->EditValue ?>"<?php echo $lab_test_result->ProfCd->editAttributes() ?>>
</span>
<?php echo $lab_test_result->ProfCd->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->LabReport->Visible) { // LabReport ?>
	<div id="r_LabReport" class="form-group row">
		<label id="elh_lab_test_result_LabReport" for="x_LabReport" class="<?php echo $lab_test_result_add->LeftColumnClass ?>"><?php echo $lab_test_result->LabReport->caption() ?><?php echo ($lab_test_result->LabReport->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_result_add->RightColumnClass ?>"><div<?php echo $lab_test_result->LabReport->cellAttributes() ?>>
<span id="el_lab_test_result_LabReport">
<textarea data-table="lab_test_result" data-field="x_LabReport" name="x_LabReport" id="x_LabReport" cols="35" rows="4" placeholder="<?php echo HtmlEncode($lab_test_result->LabReport->getPlaceHolder()) ?>"<?php echo $lab_test_result->LabReport->editAttributes() ?>><?php echo $lab_test_result->LabReport->EditValue ?></textarea>
</span>
<?php echo $lab_test_result->LabReport->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->ResultDate->Visible) { // ResultDate ?>
	<div id="r_ResultDate" class="form-group row">
		<label id="elh_lab_test_result_ResultDate" for="x_ResultDate" class="<?php echo $lab_test_result_add->LeftColumnClass ?>"><?php echo $lab_test_result->ResultDate->caption() ?><?php echo ($lab_test_result->ResultDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_result_add->RightColumnClass ?>"><div<?php echo $lab_test_result->ResultDate->cellAttributes() ?>>
<span id="el_lab_test_result_ResultDate">
<input type="text" data-table="lab_test_result" data-field="x_ResultDate" name="x_ResultDate" id="x_ResultDate" placeholder="<?php echo HtmlEncode($lab_test_result->ResultDate->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->ResultDate->EditValue ?>"<?php echo $lab_test_result->ResultDate->editAttributes() ?>>
<?php if (!$lab_test_result->ResultDate->ReadOnly && !$lab_test_result->ResultDate->Disabled && !isset($lab_test_result->ResultDate->EditAttrs["readonly"]) && !isset($lab_test_result->ResultDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("flab_test_resultadd", "x_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $lab_test_result->ResultDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->Comments->Visible) { // Comments ?>
	<div id="r_Comments" class="form-group row">
		<label id="elh_lab_test_result_Comments" for="x_Comments" class="<?php echo $lab_test_result_add->LeftColumnClass ?>"><?php echo $lab_test_result->Comments->caption() ?><?php echo ($lab_test_result->Comments->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_result_add->RightColumnClass ?>"><div<?php echo $lab_test_result->Comments->cellAttributes() ?>>
<span id="el_lab_test_result_Comments">
<textarea data-table="lab_test_result" data-field="x_Comments" name="x_Comments" id="x_Comments" cols="35" rows="4" placeholder="<?php echo HtmlEncode($lab_test_result->Comments->getPlaceHolder()) ?>"<?php echo $lab_test_result->Comments->editAttributes() ?>><?php echo $lab_test_result->Comments->EditValue ?></textarea>
</span>
<?php echo $lab_test_result->Comments->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->Method->Visible) { // Method ?>
	<div id="r_Method" class="form-group row">
		<label id="elh_lab_test_result_Method" for="x_Method" class="<?php echo $lab_test_result_add->LeftColumnClass ?>"><?php echo $lab_test_result->Method->caption() ?><?php echo ($lab_test_result->Method->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_result_add->RightColumnClass ?>"><div<?php echo $lab_test_result->Method->cellAttributes() ?>>
<span id="el_lab_test_result_Method">
<input type="text" data-table="lab_test_result" data-field="x_Method" name="x_Method" id="x_Method" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($lab_test_result->Method->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->Method->EditValue ?>"<?php echo $lab_test_result->Method->editAttributes() ?>>
</span>
<?php echo $lab_test_result->Method->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->Specimen->Visible) { // Specimen ?>
	<div id="r_Specimen" class="form-group row">
		<label id="elh_lab_test_result_Specimen" for="x_Specimen" class="<?php echo $lab_test_result_add->LeftColumnClass ?>"><?php echo $lab_test_result->Specimen->caption() ?><?php echo ($lab_test_result->Specimen->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_result_add->RightColumnClass ?>"><div<?php echo $lab_test_result->Specimen->cellAttributes() ?>>
<span id="el_lab_test_result_Specimen">
<input type="text" data-table="lab_test_result" data-field="x_Specimen" name="x_Specimen" id="x_Specimen" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($lab_test_result->Specimen->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->Specimen->EditValue ?>"<?php echo $lab_test_result->Specimen->editAttributes() ?>>
</span>
<?php echo $lab_test_result->Specimen->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->Amount->Visible) { // Amount ?>
	<div id="r_Amount" class="form-group row">
		<label id="elh_lab_test_result_Amount" for="x_Amount" class="<?php echo $lab_test_result_add->LeftColumnClass ?>"><?php echo $lab_test_result->Amount->caption() ?><?php echo ($lab_test_result->Amount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_result_add->RightColumnClass ?>"><div<?php echo $lab_test_result->Amount->cellAttributes() ?>>
<span id="el_lab_test_result_Amount">
<input type="text" data-table="lab_test_result" data-field="x_Amount" name="x_Amount" id="x_Amount" size="30" placeholder="<?php echo HtmlEncode($lab_test_result->Amount->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->Amount->EditValue ?>"<?php echo $lab_test_result->Amount->editAttributes() ?>>
</span>
<?php echo $lab_test_result->Amount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->ResultBy->Visible) { // ResultBy ?>
	<div id="r_ResultBy" class="form-group row">
		<label id="elh_lab_test_result_ResultBy" for="x_ResultBy" class="<?php echo $lab_test_result_add->LeftColumnClass ?>"><?php echo $lab_test_result->ResultBy->caption() ?><?php echo ($lab_test_result->ResultBy->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_result_add->RightColumnClass ?>"><div<?php echo $lab_test_result->ResultBy->cellAttributes() ?>>
<span id="el_lab_test_result_ResultBy">
<input type="text" data-table="lab_test_result" data-field="x_ResultBy" name="x_ResultBy" id="x_ResultBy" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($lab_test_result->ResultBy->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->ResultBy->EditValue ?>"<?php echo $lab_test_result->ResultBy->editAttributes() ?>>
</span>
<?php echo $lab_test_result->ResultBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->AuthBy->Visible) { // AuthBy ?>
	<div id="r_AuthBy" class="form-group row">
		<label id="elh_lab_test_result_AuthBy" for="x_AuthBy" class="<?php echo $lab_test_result_add->LeftColumnClass ?>"><?php echo $lab_test_result->AuthBy->caption() ?><?php echo ($lab_test_result->AuthBy->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_result_add->RightColumnClass ?>"><div<?php echo $lab_test_result->AuthBy->cellAttributes() ?>>
<span id="el_lab_test_result_AuthBy">
<input type="text" data-table="lab_test_result" data-field="x_AuthBy" name="x_AuthBy" id="x_AuthBy" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($lab_test_result->AuthBy->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->AuthBy->EditValue ?>"<?php echo $lab_test_result->AuthBy->editAttributes() ?>>
</span>
<?php echo $lab_test_result->AuthBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->AuthDate->Visible) { // AuthDate ?>
	<div id="r_AuthDate" class="form-group row">
		<label id="elh_lab_test_result_AuthDate" for="x_AuthDate" class="<?php echo $lab_test_result_add->LeftColumnClass ?>"><?php echo $lab_test_result->AuthDate->caption() ?><?php echo ($lab_test_result->AuthDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_result_add->RightColumnClass ?>"><div<?php echo $lab_test_result->AuthDate->cellAttributes() ?>>
<span id="el_lab_test_result_AuthDate">
<input type="text" data-table="lab_test_result" data-field="x_AuthDate" name="x_AuthDate" id="x_AuthDate" placeholder="<?php echo HtmlEncode($lab_test_result->AuthDate->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->AuthDate->EditValue ?>"<?php echo $lab_test_result->AuthDate->editAttributes() ?>>
<?php if (!$lab_test_result->AuthDate->ReadOnly && !$lab_test_result->AuthDate->Disabled && !isset($lab_test_result->AuthDate->EditAttrs["readonly"]) && !isset($lab_test_result->AuthDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("flab_test_resultadd", "x_AuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $lab_test_result->AuthDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->Abnormal->Visible) { // Abnormal ?>
	<div id="r_Abnormal" class="form-group row">
		<label id="elh_lab_test_result_Abnormal" for="x_Abnormal" class="<?php echo $lab_test_result_add->LeftColumnClass ?>"><?php echo $lab_test_result->Abnormal->caption() ?><?php echo ($lab_test_result->Abnormal->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_result_add->RightColumnClass ?>"><div<?php echo $lab_test_result->Abnormal->cellAttributes() ?>>
<span id="el_lab_test_result_Abnormal">
<input type="text" data-table="lab_test_result" data-field="x_Abnormal" name="x_Abnormal" id="x_Abnormal" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result->Abnormal->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->Abnormal->EditValue ?>"<?php echo $lab_test_result->Abnormal->editAttributes() ?>>
</span>
<?php echo $lab_test_result->Abnormal->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->Printed->Visible) { // Printed ?>
	<div id="r_Printed" class="form-group row">
		<label id="elh_lab_test_result_Printed" for="x_Printed" class="<?php echo $lab_test_result_add->LeftColumnClass ?>"><?php echo $lab_test_result->Printed->caption() ?><?php echo ($lab_test_result->Printed->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_result_add->RightColumnClass ?>"><div<?php echo $lab_test_result->Printed->cellAttributes() ?>>
<span id="el_lab_test_result_Printed">
<input type="text" data-table="lab_test_result" data-field="x_Printed" name="x_Printed" id="x_Printed" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result->Printed->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->Printed->EditValue ?>"<?php echo $lab_test_result->Printed->editAttributes() ?>>
</span>
<?php echo $lab_test_result->Printed->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->Dispatch->Visible) { // Dispatch ?>
	<div id="r_Dispatch" class="form-group row">
		<label id="elh_lab_test_result_Dispatch" for="x_Dispatch" class="<?php echo $lab_test_result_add->LeftColumnClass ?>"><?php echo $lab_test_result->Dispatch->caption() ?><?php echo ($lab_test_result->Dispatch->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_result_add->RightColumnClass ?>"><div<?php echo $lab_test_result->Dispatch->cellAttributes() ?>>
<span id="el_lab_test_result_Dispatch">
<input type="text" data-table="lab_test_result" data-field="x_Dispatch" name="x_Dispatch" id="x_Dispatch" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result->Dispatch->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->Dispatch->EditValue ?>"<?php echo $lab_test_result->Dispatch->editAttributes() ?>>
</span>
<?php echo $lab_test_result->Dispatch->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->LOWHIGH->Visible) { // LOWHIGH ?>
	<div id="r_LOWHIGH" class="form-group row">
		<label id="elh_lab_test_result_LOWHIGH" for="x_LOWHIGH" class="<?php echo $lab_test_result_add->LeftColumnClass ?>"><?php echo $lab_test_result->LOWHIGH->caption() ?><?php echo ($lab_test_result->LOWHIGH->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_result_add->RightColumnClass ?>"><div<?php echo $lab_test_result->LOWHIGH->cellAttributes() ?>>
<span id="el_lab_test_result_LOWHIGH">
<input type="text" data-table="lab_test_result" data-field="x_LOWHIGH" name="x_LOWHIGH" id="x_LOWHIGH" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result->LOWHIGH->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->LOWHIGH->EditValue ?>"<?php echo $lab_test_result->LOWHIGH->editAttributes() ?>>
</span>
<?php echo $lab_test_result->LOWHIGH->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->RefValue->Visible) { // RefValue ?>
	<div id="r_RefValue" class="form-group row">
		<label id="elh_lab_test_result_RefValue" for="x_RefValue" class="<?php echo $lab_test_result_add->LeftColumnClass ?>"><?php echo $lab_test_result->RefValue->caption() ?><?php echo ($lab_test_result->RefValue->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_result_add->RightColumnClass ?>"><div<?php echo $lab_test_result->RefValue->cellAttributes() ?>>
<span id="el_lab_test_result_RefValue">
<textarea data-table="lab_test_result" data-field="x_RefValue" name="x_RefValue" id="x_RefValue" cols="35" rows="4" placeholder="<?php echo HtmlEncode($lab_test_result->RefValue->getPlaceHolder()) ?>"<?php echo $lab_test_result->RefValue->editAttributes() ?>><?php echo $lab_test_result->RefValue->EditValue ?></textarea>
</span>
<?php echo $lab_test_result->RefValue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->Unit->Visible) { // Unit ?>
	<div id="r_Unit" class="form-group row">
		<label id="elh_lab_test_result_Unit" for="x_Unit" class="<?php echo $lab_test_result_add->LeftColumnClass ?>"><?php echo $lab_test_result->Unit->caption() ?><?php echo ($lab_test_result->Unit->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_result_add->RightColumnClass ?>"><div<?php echo $lab_test_result->Unit->cellAttributes() ?>>
<span id="el_lab_test_result_Unit">
<input type="text" data-table="lab_test_result" data-field="x_Unit" name="x_Unit" id="x_Unit" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($lab_test_result->Unit->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->Unit->EditValue ?>"<?php echo $lab_test_result->Unit->editAttributes() ?>>
</span>
<?php echo $lab_test_result->Unit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->ResDate->Visible) { // ResDate ?>
	<div id="r_ResDate" class="form-group row">
		<label id="elh_lab_test_result_ResDate" for="x_ResDate" class="<?php echo $lab_test_result_add->LeftColumnClass ?>"><?php echo $lab_test_result->ResDate->caption() ?><?php echo ($lab_test_result->ResDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_result_add->RightColumnClass ?>"><div<?php echo $lab_test_result->ResDate->cellAttributes() ?>>
<span id="el_lab_test_result_ResDate">
<input type="text" data-table="lab_test_result" data-field="x_ResDate" name="x_ResDate" id="x_ResDate" placeholder="<?php echo HtmlEncode($lab_test_result->ResDate->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->ResDate->EditValue ?>"<?php echo $lab_test_result->ResDate->editAttributes() ?>>
<?php if (!$lab_test_result->ResDate->ReadOnly && !$lab_test_result->ResDate->Disabled && !isset($lab_test_result->ResDate->EditAttrs["readonly"]) && !isset($lab_test_result->ResDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("flab_test_resultadd", "x_ResDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $lab_test_result->ResDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->Pic1->Visible) { // Pic1 ?>
	<div id="r_Pic1" class="form-group row">
		<label id="elh_lab_test_result_Pic1" for="x_Pic1" class="<?php echo $lab_test_result_add->LeftColumnClass ?>"><?php echo $lab_test_result->Pic1->caption() ?><?php echo ($lab_test_result->Pic1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_result_add->RightColumnClass ?>"><div<?php echo $lab_test_result->Pic1->cellAttributes() ?>>
<span id="el_lab_test_result_Pic1">
<input type="text" data-table="lab_test_result" data-field="x_Pic1" name="x_Pic1" id="x_Pic1" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($lab_test_result->Pic1->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->Pic1->EditValue ?>"<?php echo $lab_test_result->Pic1->editAttributes() ?>>
</span>
<?php echo $lab_test_result->Pic1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->Pic2->Visible) { // Pic2 ?>
	<div id="r_Pic2" class="form-group row">
		<label id="elh_lab_test_result_Pic2" for="x_Pic2" class="<?php echo $lab_test_result_add->LeftColumnClass ?>"><?php echo $lab_test_result->Pic2->caption() ?><?php echo ($lab_test_result->Pic2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_result_add->RightColumnClass ?>"><div<?php echo $lab_test_result->Pic2->cellAttributes() ?>>
<span id="el_lab_test_result_Pic2">
<input type="text" data-table="lab_test_result" data-field="x_Pic2" name="x_Pic2" id="x_Pic2" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($lab_test_result->Pic2->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->Pic2->EditValue ?>"<?php echo $lab_test_result->Pic2->editAttributes() ?>>
</span>
<?php echo $lab_test_result->Pic2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->GraphPath->Visible) { // GraphPath ?>
	<div id="r_GraphPath" class="form-group row">
		<label id="elh_lab_test_result_GraphPath" for="x_GraphPath" class="<?php echo $lab_test_result_add->LeftColumnClass ?>"><?php echo $lab_test_result->GraphPath->caption() ?><?php echo ($lab_test_result->GraphPath->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_result_add->RightColumnClass ?>"><div<?php echo $lab_test_result->GraphPath->cellAttributes() ?>>
<span id="el_lab_test_result_GraphPath">
<input type="text" data-table="lab_test_result" data-field="x_GraphPath" name="x_GraphPath" id="x_GraphPath" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($lab_test_result->GraphPath->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->GraphPath->EditValue ?>"<?php echo $lab_test_result->GraphPath->editAttributes() ?>>
</span>
<?php echo $lab_test_result->GraphPath->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->SampleDate->Visible) { // SampleDate ?>
	<div id="r_SampleDate" class="form-group row">
		<label id="elh_lab_test_result_SampleDate" for="x_SampleDate" class="<?php echo $lab_test_result_add->LeftColumnClass ?>"><?php echo $lab_test_result->SampleDate->caption() ?><?php echo ($lab_test_result->SampleDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_result_add->RightColumnClass ?>"><div<?php echo $lab_test_result->SampleDate->cellAttributes() ?>>
<span id="el_lab_test_result_SampleDate">
<input type="text" data-table="lab_test_result" data-field="x_SampleDate" name="x_SampleDate" id="x_SampleDate" placeholder="<?php echo HtmlEncode($lab_test_result->SampleDate->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->SampleDate->EditValue ?>"<?php echo $lab_test_result->SampleDate->editAttributes() ?>>
<?php if (!$lab_test_result->SampleDate->ReadOnly && !$lab_test_result->SampleDate->Disabled && !isset($lab_test_result->SampleDate->EditAttrs["readonly"]) && !isset($lab_test_result->SampleDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("flab_test_resultadd", "x_SampleDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $lab_test_result->SampleDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->SampleUser->Visible) { // SampleUser ?>
	<div id="r_SampleUser" class="form-group row">
		<label id="elh_lab_test_result_SampleUser" for="x_SampleUser" class="<?php echo $lab_test_result_add->LeftColumnClass ?>"><?php echo $lab_test_result->SampleUser->caption() ?><?php echo ($lab_test_result->SampleUser->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_result_add->RightColumnClass ?>"><div<?php echo $lab_test_result->SampleUser->cellAttributes() ?>>
<span id="el_lab_test_result_SampleUser">
<input type="text" data-table="lab_test_result" data-field="x_SampleUser" name="x_SampleUser" id="x_SampleUser" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($lab_test_result->SampleUser->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->SampleUser->EditValue ?>"<?php echo $lab_test_result->SampleUser->editAttributes() ?>>
</span>
<?php echo $lab_test_result->SampleUser->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->ReceivedDate->Visible) { // ReceivedDate ?>
	<div id="r_ReceivedDate" class="form-group row">
		<label id="elh_lab_test_result_ReceivedDate" for="x_ReceivedDate" class="<?php echo $lab_test_result_add->LeftColumnClass ?>"><?php echo $lab_test_result->ReceivedDate->caption() ?><?php echo ($lab_test_result->ReceivedDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_result_add->RightColumnClass ?>"><div<?php echo $lab_test_result->ReceivedDate->cellAttributes() ?>>
<span id="el_lab_test_result_ReceivedDate">
<input type="text" data-table="lab_test_result" data-field="x_ReceivedDate" name="x_ReceivedDate" id="x_ReceivedDate" placeholder="<?php echo HtmlEncode($lab_test_result->ReceivedDate->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->ReceivedDate->EditValue ?>"<?php echo $lab_test_result->ReceivedDate->editAttributes() ?>>
<?php if (!$lab_test_result->ReceivedDate->ReadOnly && !$lab_test_result->ReceivedDate->Disabled && !isset($lab_test_result->ReceivedDate->EditAttrs["readonly"]) && !isset($lab_test_result->ReceivedDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("flab_test_resultadd", "x_ReceivedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $lab_test_result->ReceivedDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->ReceivedUser->Visible) { // ReceivedUser ?>
	<div id="r_ReceivedUser" class="form-group row">
		<label id="elh_lab_test_result_ReceivedUser" for="x_ReceivedUser" class="<?php echo $lab_test_result_add->LeftColumnClass ?>"><?php echo $lab_test_result->ReceivedUser->caption() ?><?php echo ($lab_test_result->ReceivedUser->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_result_add->RightColumnClass ?>"><div<?php echo $lab_test_result->ReceivedUser->cellAttributes() ?>>
<span id="el_lab_test_result_ReceivedUser">
<input type="text" data-table="lab_test_result" data-field="x_ReceivedUser" name="x_ReceivedUser" id="x_ReceivedUser" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($lab_test_result->ReceivedUser->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->ReceivedUser->EditValue ?>"<?php echo $lab_test_result->ReceivedUser->editAttributes() ?>>
</span>
<?php echo $lab_test_result->ReceivedUser->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->DeptRecvDate->Visible) { // DeptRecvDate ?>
	<div id="r_DeptRecvDate" class="form-group row">
		<label id="elh_lab_test_result_DeptRecvDate" for="x_DeptRecvDate" class="<?php echo $lab_test_result_add->LeftColumnClass ?>"><?php echo $lab_test_result->DeptRecvDate->caption() ?><?php echo ($lab_test_result->DeptRecvDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_result_add->RightColumnClass ?>"><div<?php echo $lab_test_result->DeptRecvDate->cellAttributes() ?>>
<span id="el_lab_test_result_DeptRecvDate">
<input type="text" data-table="lab_test_result" data-field="x_DeptRecvDate" name="x_DeptRecvDate" id="x_DeptRecvDate" placeholder="<?php echo HtmlEncode($lab_test_result->DeptRecvDate->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->DeptRecvDate->EditValue ?>"<?php echo $lab_test_result->DeptRecvDate->editAttributes() ?>>
<?php if (!$lab_test_result->DeptRecvDate->ReadOnly && !$lab_test_result->DeptRecvDate->Disabled && !isset($lab_test_result->DeptRecvDate->EditAttrs["readonly"]) && !isset($lab_test_result->DeptRecvDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("flab_test_resultadd", "x_DeptRecvDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $lab_test_result->DeptRecvDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->DeptRecvUser->Visible) { // DeptRecvUser ?>
	<div id="r_DeptRecvUser" class="form-group row">
		<label id="elh_lab_test_result_DeptRecvUser" for="x_DeptRecvUser" class="<?php echo $lab_test_result_add->LeftColumnClass ?>"><?php echo $lab_test_result->DeptRecvUser->caption() ?><?php echo ($lab_test_result->DeptRecvUser->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_result_add->RightColumnClass ?>"><div<?php echo $lab_test_result->DeptRecvUser->cellAttributes() ?>>
<span id="el_lab_test_result_DeptRecvUser">
<input type="text" data-table="lab_test_result" data-field="x_DeptRecvUser" name="x_DeptRecvUser" id="x_DeptRecvUser" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($lab_test_result->DeptRecvUser->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->DeptRecvUser->EditValue ?>"<?php echo $lab_test_result->DeptRecvUser->editAttributes() ?>>
</span>
<?php echo $lab_test_result->DeptRecvUser->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->PrintBy->Visible) { // PrintBy ?>
	<div id="r_PrintBy" class="form-group row">
		<label id="elh_lab_test_result_PrintBy" for="x_PrintBy" class="<?php echo $lab_test_result_add->LeftColumnClass ?>"><?php echo $lab_test_result->PrintBy->caption() ?><?php echo ($lab_test_result->PrintBy->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_result_add->RightColumnClass ?>"><div<?php echo $lab_test_result->PrintBy->cellAttributes() ?>>
<span id="el_lab_test_result_PrintBy">
<input type="text" data-table="lab_test_result" data-field="x_PrintBy" name="x_PrintBy" id="x_PrintBy" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($lab_test_result->PrintBy->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->PrintBy->EditValue ?>"<?php echo $lab_test_result->PrintBy->editAttributes() ?>>
</span>
<?php echo $lab_test_result->PrintBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->PrintDate->Visible) { // PrintDate ?>
	<div id="r_PrintDate" class="form-group row">
		<label id="elh_lab_test_result_PrintDate" for="x_PrintDate" class="<?php echo $lab_test_result_add->LeftColumnClass ?>"><?php echo $lab_test_result->PrintDate->caption() ?><?php echo ($lab_test_result->PrintDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_result_add->RightColumnClass ?>"><div<?php echo $lab_test_result->PrintDate->cellAttributes() ?>>
<span id="el_lab_test_result_PrintDate">
<input type="text" data-table="lab_test_result" data-field="x_PrintDate" name="x_PrintDate" id="x_PrintDate" placeholder="<?php echo HtmlEncode($lab_test_result->PrintDate->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->PrintDate->EditValue ?>"<?php echo $lab_test_result->PrintDate->editAttributes() ?>>
<?php if (!$lab_test_result->PrintDate->ReadOnly && !$lab_test_result->PrintDate->Disabled && !isset($lab_test_result->PrintDate->EditAttrs["readonly"]) && !isset($lab_test_result->PrintDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("flab_test_resultadd", "x_PrintDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $lab_test_result->PrintDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->MachineCD->Visible) { // MachineCD ?>
	<div id="r_MachineCD" class="form-group row">
		<label id="elh_lab_test_result_MachineCD" for="x_MachineCD" class="<?php echo $lab_test_result_add->LeftColumnClass ?>"><?php echo $lab_test_result->MachineCD->caption() ?><?php echo ($lab_test_result->MachineCD->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_result_add->RightColumnClass ?>"><div<?php echo $lab_test_result->MachineCD->cellAttributes() ?>>
<span id="el_lab_test_result_MachineCD">
<input type="text" data-table="lab_test_result" data-field="x_MachineCD" name="x_MachineCD" id="x_MachineCD" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($lab_test_result->MachineCD->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->MachineCD->EditValue ?>"<?php echo $lab_test_result->MachineCD->editAttributes() ?>>
</span>
<?php echo $lab_test_result->MachineCD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->TestCancel->Visible) { // TestCancel ?>
	<div id="r_TestCancel" class="form-group row">
		<label id="elh_lab_test_result_TestCancel" for="x_TestCancel" class="<?php echo $lab_test_result_add->LeftColumnClass ?>"><?php echo $lab_test_result->TestCancel->caption() ?><?php echo ($lab_test_result->TestCancel->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_result_add->RightColumnClass ?>"><div<?php echo $lab_test_result->TestCancel->cellAttributes() ?>>
<span id="el_lab_test_result_TestCancel">
<input type="text" data-table="lab_test_result" data-field="x_TestCancel" name="x_TestCancel" id="x_TestCancel" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result->TestCancel->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->TestCancel->EditValue ?>"<?php echo $lab_test_result->TestCancel->editAttributes() ?>>
</span>
<?php echo $lab_test_result->TestCancel->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->OutSource->Visible) { // OutSource ?>
	<div id="r_OutSource" class="form-group row">
		<label id="elh_lab_test_result_OutSource" for="x_OutSource" class="<?php echo $lab_test_result_add->LeftColumnClass ?>"><?php echo $lab_test_result->OutSource->caption() ?><?php echo ($lab_test_result->OutSource->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_result_add->RightColumnClass ?>"><div<?php echo $lab_test_result->OutSource->cellAttributes() ?>>
<span id="el_lab_test_result_OutSource">
<input type="text" data-table="lab_test_result" data-field="x_OutSource" name="x_OutSource" id="x_OutSource" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result->OutSource->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->OutSource->EditValue ?>"<?php echo $lab_test_result->OutSource->editAttributes() ?>>
</span>
<?php echo $lab_test_result->OutSource->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->Tariff->Visible) { // Tariff ?>
	<div id="r_Tariff" class="form-group row">
		<label id="elh_lab_test_result_Tariff" for="x_Tariff" class="<?php echo $lab_test_result_add->LeftColumnClass ?>"><?php echo $lab_test_result->Tariff->caption() ?><?php echo ($lab_test_result->Tariff->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_result_add->RightColumnClass ?>"><div<?php echo $lab_test_result->Tariff->cellAttributes() ?>>
<span id="el_lab_test_result_Tariff">
<input type="text" data-table="lab_test_result" data-field="x_Tariff" name="x_Tariff" id="x_Tariff" size="30" placeholder="<?php echo HtmlEncode($lab_test_result->Tariff->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->Tariff->EditValue ?>"<?php echo $lab_test_result->Tariff->editAttributes() ?>>
</span>
<?php echo $lab_test_result->Tariff->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->EDITDATE->Visible) { // EDITDATE ?>
	<div id="r_EDITDATE" class="form-group row">
		<label id="elh_lab_test_result_EDITDATE" for="x_EDITDATE" class="<?php echo $lab_test_result_add->LeftColumnClass ?>"><?php echo $lab_test_result->EDITDATE->caption() ?><?php echo ($lab_test_result->EDITDATE->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_result_add->RightColumnClass ?>"><div<?php echo $lab_test_result->EDITDATE->cellAttributes() ?>>
<span id="el_lab_test_result_EDITDATE">
<input type="text" data-table="lab_test_result" data-field="x_EDITDATE" name="x_EDITDATE" id="x_EDITDATE" placeholder="<?php echo HtmlEncode($lab_test_result->EDITDATE->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->EDITDATE->EditValue ?>"<?php echo $lab_test_result->EDITDATE->editAttributes() ?>>
<?php if (!$lab_test_result->EDITDATE->ReadOnly && !$lab_test_result->EDITDATE->Disabled && !isset($lab_test_result->EDITDATE->EditAttrs["readonly"]) && !isset($lab_test_result->EDITDATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("flab_test_resultadd", "x_EDITDATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $lab_test_result->EDITDATE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->UPLOAD->Visible) { // UPLOAD ?>
	<div id="r_UPLOAD" class="form-group row">
		<label id="elh_lab_test_result_UPLOAD" for="x_UPLOAD" class="<?php echo $lab_test_result_add->LeftColumnClass ?>"><?php echo $lab_test_result->UPLOAD->caption() ?><?php echo ($lab_test_result->UPLOAD->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_result_add->RightColumnClass ?>"><div<?php echo $lab_test_result->UPLOAD->cellAttributes() ?>>
<span id="el_lab_test_result_UPLOAD">
<input type="text" data-table="lab_test_result" data-field="x_UPLOAD" name="x_UPLOAD" id="x_UPLOAD" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result->UPLOAD->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->UPLOAD->EditValue ?>"<?php echo $lab_test_result->UPLOAD->editAttributes() ?>>
</span>
<?php echo $lab_test_result->UPLOAD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->SAuthDate->Visible) { // SAuthDate ?>
	<div id="r_SAuthDate" class="form-group row">
		<label id="elh_lab_test_result_SAuthDate" for="x_SAuthDate" class="<?php echo $lab_test_result_add->LeftColumnClass ?>"><?php echo $lab_test_result->SAuthDate->caption() ?><?php echo ($lab_test_result->SAuthDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_result_add->RightColumnClass ?>"><div<?php echo $lab_test_result->SAuthDate->cellAttributes() ?>>
<span id="el_lab_test_result_SAuthDate">
<input type="text" data-table="lab_test_result" data-field="x_SAuthDate" name="x_SAuthDate" id="x_SAuthDate" placeholder="<?php echo HtmlEncode($lab_test_result->SAuthDate->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->SAuthDate->EditValue ?>"<?php echo $lab_test_result->SAuthDate->editAttributes() ?>>
<?php if (!$lab_test_result->SAuthDate->ReadOnly && !$lab_test_result->SAuthDate->Disabled && !isset($lab_test_result->SAuthDate->EditAttrs["readonly"]) && !isset($lab_test_result->SAuthDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("flab_test_resultadd", "x_SAuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $lab_test_result->SAuthDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->SAuthBy->Visible) { // SAuthBy ?>
	<div id="r_SAuthBy" class="form-group row">
		<label id="elh_lab_test_result_SAuthBy" for="x_SAuthBy" class="<?php echo $lab_test_result_add->LeftColumnClass ?>"><?php echo $lab_test_result->SAuthBy->caption() ?><?php echo ($lab_test_result->SAuthBy->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_result_add->RightColumnClass ?>"><div<?php echo $lab_test_result->SAuthBy->cellAttributes() ?>>
<span id="el_lab_test_result_SAuthBy">
<input type="text" data-table="lab_test_result" data-field="x_SAuthBy" name="x_SAuthBy" id="x_SAuthBy" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($lab_test_result->SAuthBy->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->SAuthBy->EditValue ?>"<?php echo $lab_test_result->SAuthBy->editAttributes() ?>>
</span>
<?php echo $lab_test_result->SAuthBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->NoRC->Visible) { // NoRC ?>
	<div id="r_NoRC" class="form-group row">
		<label id="elh_lab_test_result_NoRC" for="x_NoRC" class="<?php echo $lab_test_result_add->LeftColumnClass ?>"><?php echo $lab_test_result->NoRC->caption() ?><?php echo ($lab_test_result->NoRC->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_result_add->RightColumnClass ?>"><div<?php echo $lab_test_result->NoRC->cellAttributes() ?>>
<span id="el_lab_test_result_NoRC">
<input type="text" data-table="lab_test_result" data-field="x_NoRC" name="x_NoRC" id="x_NoRC" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result->NoRC->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->NoRC->EditValue ?>"<?php echo $lab_test_result->NoRC->editAttributes() ?>>
</span>
<?php echo $lab_test_result->NoRC->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->DispDt->Visible) { // DispDt ?>
	<div id="r_DispDt" class="form-group row">
		<label id="elh_lab_test_result_DispDt" for="x_DispDt" class="<?php echo $lab_test_result_add->LeftColumnClass ?>"><?php echo $lab_test_result->DispDt->caption() ?><?php echo ($lab_test_result->DispDt->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_result_add->RightColumnClass ?>"><div<?php echo $lab_test_result->DispDt->cellAttributes() ?>>
<span id="el_lab_test_result_DispDt">
<input type="text" data-table="lab_test_result" data-field="x_DispDt" name="x_DispDt" id="x_DispDt" placeholder="<?php echo HtmlEncode($lab_test_result->DispDt->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->DispDt->EditValue ?>"<?php echo $lab_test_result->DispDt->editAttributes() ?>>
<?php if (!$lab_test_result->DispDt->ReadOnly && !$lab_test_result->DispDt->Disabled && !isset($lab_test_result->DispDt->EditAttrs["readonly"]) && !isset($lab_test_result->DispDt->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("flab_test_resultadd", "x_DispDt", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $lab_test_result->DispDt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->DispUser->Visible) { // DispUser ?>
	<div id="r_DispUser" class="form-group row">
		<label id="elh_lab_test_result_DispUser" for="x_DispUser" class="<?php echo $lab_test_result_add->LeftColumnClass ?>"><?php echo $lab_test_result->DispUser->caption() ?><?php echo ($lab_test_result->DispUser->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_result_add->RightColumnClass ?>"><div<?php echo $lab_test_result->DispUser->cellAttributes() ?>>
<span id="el_lab_test_result_DispUser">
<input type="text" data-table="lab_test_result" data-field="x_DispUser" name="x_DispUser" id="x_DispUser" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($lab_test_result->DispUser->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->DispUser->EditValue ?>"<?php echo $lab_test_result->DispUser->editAttributes() ?>>
</span>
<?php echo $lab_test_result->DispUser->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->DispRemarks->Visible) { // DispRemarks ?>
	<div id="r_DispRemarks" class="form-group row">
		<label id="elh_lab_test_result_DispRemarks" for="x_DispRemarks" class="<?php echo $lab_test_result_add->LeftColumnClass ?>"><?php echo $lab_test_result->DispRemarks->caption() ?><?php echo ($lab_test_result->DispRemarks->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_result_add->RightColumnClass ?>"><div<?php echo $lab_test_result->DispRemarks->cellAttributes() ?>>
<span id="el_lab_test_result_DispRemarks">
<input type="text" data-table="lab_test_result" data-field="x_DispRemarks" name="x_DispRemarks" id="x_DispRemarks" size="30" maxlength="250" placeholder="<?php echo HtmlEncode($lab_test_result->DispRemarks->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->DispRemarks->EditValue ?>"<?php echo $lab_test_result->DispRemarks->editAttributes() ?>>
</span>
<?php echo $lab_test_result->DispRemarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->DispMode->Visible) { // DispMode ?>
	<div id="r_DispMode" class="form-group row">
		<label id="elh_lab_test_result_DispMode" for="x_DispMode" class="<?php echo $lab_test_result_add->LeftColumnClass ?>"><?php echo $lab_test_result->DispMode->caption() ?><?php echo ($lab_test_result->DispMode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_result_add->RightColumnClass ?>"><div<?php echo $lab_test_result->DispMode->cellAttributes() ?>>
<span id="el_lab_test_result_DispMode">
<input type="text" data-table="lab_test_result" data-field="x_DispMode" name="x_DispMode" id="x_DispMode" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($lab_test_result->DispMode->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->DispMode->EditValue ?>"<?php echo $lab_test_result->DispMode->editAttributes() ?>>
</span>
<?php echo $lab_test_result->DispMode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->ProductCD->Visible) { // ProductCD ?>
	<div id="r_ProductCD" class="form-group row">
		<label id="elh_lab_test_result_ProductCD" for="x_ProductCD" class="<?php echo $lab_test_result_add->LeftColumnClass ?>"><?php echo $lab_test_result->ProductCD->caption() ?><?php echo ($lab_test_result->ProductCD->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_result_add->RightColumnClass ?>"><div<?php echo $lab_test_result->ProductCD->cellAttributes() ?>>
<span id="el_lab_test_result_ProductCD">
<input type="text" data-table="lab_test_result" data-field="x_ProductCD" name="x_ProductCD" id="x_ProductCD" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($lab_test_result->ProductCD->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->ProductCD->EditValue ?>"<?php echo $lab_test_result->ProductCD->editAttributes() ?>>
</span>
<?php echo $lab_test_result->ProductCD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->Nos->Visible) { // Nos ?>
	<div id="r_Nos" class="form-group row">
		<label id="elh_lab_test_result_Nos" for="x_Nos" class="<?php echo $lab_test_result_add->LeftColumnClass ?>"><?php echo $lab_test_result->Nos->caption() ?><?php echo ($lab_test_result->Nos->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_result_add->RightColumnClass ?>"><div<?php echo $lab_test_result->Nos->cellAttributes() ?>>
<span id="el_lab_test_result_Nos">
<input type="text" data-table="lab_test_result" data-field="x_Nos" name="x_Nos" id="x_Nos" size="30" placeholder="<?php echo HtmlEncode($lab_test_result->Nos->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->Nos->EditValue ?>"<?php echo $lab_test_result->Nos->editAttributes() ?>>
</span>
<?php echo $lab_test_result->Nos->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->WBCPath->Visible) { // WBCPath ?>
	<div id="r_WBCPath" class="form-group row">
		<label id="elh_lab_test_result_WBCPath" for="x_WBCPath" class="<?php echo $lab_test_result_add->LeftColumnClass ?>"><?php echo $lab_test_result->WBCPath->caption() ?><?php echo ($lab_test_result->WBCPath->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_result_add->RightColumnClass ?>"><div<?php echo $lab_test_result->WBCPath->cellAttributes() ?>>
<span id="el_lab_test_result_WBCPath">
<input type="text" data-table="lab_test_result" data-field="x_WBCPath" name="x_WBCPath" id="x_WBCPath" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($lab_test_result->WBCPath->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->WBCPath->EditValue ?>"<?php echo $lab_test_result->WBCPath->editAttributes() ?>>
</span>
<?php echo $lab_test_result->WBCPath->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->RBCPath->Visible) { // RBCPath ?>
	<div id="r_RBCPath" class="form-group row">
		<label id="elh_lab_test_result_RBCPath" for="x_RBCPath" class="<?php echo $lab_test_result_add->LeftColumnClass ?>"><?php echo $lab_test_result->RBCPath->caption() ?><?php echo ($lab_test_result->RBCPath->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_result_add->RightColumnClass ?>"><div<?php echo $lab_test_result->RBCPath->cellAttributes() ?>>
<span id="el_lab_test_result_RBCPath">
<input type="text" data-table="lab_test_result" data-field="x_RBCPath" name="x_RBCPath" id="x_RBCPath" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($lab_test_result->RBCPath->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->RBCPath->EditValue ?>"<?php echo $lab_test_result->RBCPath->editAttributes() ?>>
</span>
<?php echo $lab_test_result->RBCPath->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->PTPath->Visible) { // PTPath ?>
	<div id="r_PTPath" class="form-group row">
		<label id="elh_lab_test_result_PTPath" for="x_PTPath" class="<?php echo $lab_test_result_add->LeftColumnClass ?>"><?php echo $lab_test_result->PTPath->caption() ?><?php echo ($lab_test_result->PTPath->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_result_add->RightColumnClass ?>"><div<?php echo $lab_test_result->PTPath->cellAttributes() ?>>
<span id="el_lab_test_result_PTPath">
<input type="text" data-table="lab_test_result" data-field="x_PTPath" name="x_PTPath" id="x_PTPath" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($lab_test_result->PTPath->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->PTPath->EditValue ?>"<?php echo $lab_test_result->PTPath->editAttributes() ?>>
</span>
<?php echo $lab_test_result->PTPath->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->ActualAmt->Visible) { // ActualAmt ?>
	<div id="r_ActualAmt" class="form-group row">
		<label id="elh_lab_test_result_ActualAmt" for="x_ActualAmt" class="<?php echo $lab_test_result_add->LeftColumnClass ?>"><?php echo $lab_test_result->ActualAmt->caption() ?><?php echo ($lab_test_result->ActualAmt->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_result_add->RightColumnClass ?>"><div<?php echo $lab_test_result->ActualAmt->cellAttributes() ?>>
<span id="el_lab_test_result_ActualAmt">
<input type="text" data-table="lab_test_result" data-field="x_ActualAmt" name="x_ActualAmt" id="x_ActualAmt" size="30" placeholder="<?php echo HtmlEncode($lab_test_result->ActualAmt->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->ActualAmt->EditValue ?>"<?php echo $lab_test_result->ActualAmt->editAttributes() ?>>
</span>
<?php echo $lab_test_result->ActualAmt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->NoSign->Visible) { // NoSign ?>
	<div id="r_NoSign" class="form-group row">
		<label id="elh_lab_test_result_NoSign" for="x_NoSign" class="<?php echo $lab_test_result_add->LeftColumnClass ?>"><?php echo $lab_test_result->NoSign->caption() ?><?php echo ($lab_test_result->NoSign->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_result_add->RightColumnClass ?>"><div<?php echo $lab_test_result->NoSign->cellAttributes() ?>>
<span id="el_lab_test_result_NoSign">
<input type="text" data-table="lab_test_result" data-field="x_NoSign" name="x_NoSign" id="x_NoSign" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result->NoSign->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->NoSign->EditValue ?>"<?php echo $lab_test_result->NoSign->editAttributes() ?>>
</span>
<?php echo $lab_test_result->NoSign->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->_Barcode->Visible) { // Barcode ?>
	<div id="r__Barcode" class="form-group row">
		<label id="elh_lab_test_result__Barcode" for="x__Barcode" class="<?php echo $lab_test_result_add->LeftColumnClass ?>"><?php echo $lab_test_result->_Barcode->caption() ?><?php echo ($lab_test_result->_Barcode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_result_add->RightColumnClass ?>"><div<?php echo $lab_test_result->_Barcode->cellAttributes() ?>>
<span id="el_lab_test_result__Barcode">
<input type="text" data-table="lab_test_result" data-field="x__Barcode" name="x__Barcode" id="x__Barcode" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result->_Barcode->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->_Barcode->EditValue ?>"<?php echo $lab_test_result->_Barcode->editAttributes() ?>>
</span>
<?php echo $lab_test_result->_Barcode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->ReadTime->Visible) { // ReadTime ?>
	<div id="r_ReadTime" class="form-group row">
		<label id="elh_lab_test_result_ReadTime" for="x_ReadTime" class="<?php echo $lab_test_result_add->LeftColumnClass ?>"><?php echo $lab_test_result->ReadTime->caption() ?><?php echo ($lab_test_result->ReadTime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_result_add->RightColumnClass ?>"><div<?php echo $lab_test_result->ReadTime->cellAttributes() ?>>
<span id="el_lab_test_result_ReadTime">
<input type="text" data-table="lab_test_result" data-field="x_ReadTime" name="x_ReadTime" id="x_ReadTime" placeholder="<?php echo HtmlEncode($lab_test_result->ReadTime->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->ReadTime->EditValue ?>"<?php echo $lab_test_result->ReadTime->editAttributes() ?>>
<?php if (!$lab_test_result->ReadTime->ReadOnly && !$lab_test_result->ReadTime->Disabled && !isset($lab_test_result->ReadTime->EditAttrs["readonly"]) && !isset($lab_test_result->ReadTime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("flab_test_resultadd", "x_ReadTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $lab_test_result->ReadTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->Result->Visible) { // Result ?>
	<div id="r_Result" class="form-group row">
		<label id="elh_lab_test_result_Result" for="x_Result" class="<?php echo $lab_test_result_add->LeftColumnClass ?>"><?php echo $lab_test_result->Result->caption() ?><?php echo ($lab_test_result->Result->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_result_add->RightColumnClass ?>"><div<?php echo $lab_test_result->Result->cellAttributes() ?>>
<span id="el_lab_test_result_Result">
<textarea data-table="lab_test_result" data-field="x_Result" name="x_Result" id="x_Result" cols="35" rows="4" placeholder="<?php echo HtmlEncode($lab_test_result->Result->getPlaceHolder()) ?>"<?php echo $lab_test_result->Result->editAttributes() ?>><?php echo $lab_test_result->Result->EditValue ?></textarea>
</span>
<?php echo $lab_test_result->Result->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->VailID->Visible) { // VailID ?>
	<div id="r_VailID" class="form-group row">
		<label id="elh_lab_test_result_VailID" for="x_VailID" class="<?php echo $lab_test_result_add->LeftColumnClass ?>"><?php echo $lab_test_result->VailID->caption() ?><?php echo ($lab_test_result->VailID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_result_add->RightColumnClass ?>"><div<?php echo $lab_test_result->VailID->cellAttributes() ?>>
<span id="el_lab_test_result_VailID">
<input type="text" data-table="lab_test_result" data-field="x_VailID" name="x_VailID" id="x_VailID" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($lab_test_result->VailID->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->VailID->EditValue ?>"<?php echo $lab_test_result->VailID->editAttributes() ?>>
</span>
<?php echo $lab_test_result->VailID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->ReadMachine->Visible) { // ReadMachine ?>
	<div id="r_ReadMachine" class="form-group row">
		<label id="elh_lab_test_result_ReadMachine" for="x_ReadMachine" class="<?php echo $lab_test_result_add->LeftColumnClass ?>"><?php echo $lab_test_result->ReadMachine->caption() ?><?php echo ($lab_test_result->ReadMachine->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_result_add->RightColumnClass ?>"><div<?php echo $lab_test_result->ReadMachine->cellAttributes() ?>>
<span id="el_lab_test_result_ReadMachine">
<input type="text" data-table="lab_test_result" data-field="x_ReadMachine" name="x_ReadMachine" id="x_ReadMachine" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($lab_test_result->ReadMachine->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->ReadMachine->EditValue ?>"<?php echo $lab_test_result->ReadMachine->editAttributes() ?>>
</span>
<?php echo $lab_test_result->ReadMachine->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->LabCD->Visible) { // LabCD ?>
	<div id="r_LabCD" class="form-group row">
		<label id="elh_lab_test_result_LabCD" for="x_LabCD" class="<?php echo $lab_test_result_add->LeftColumnClass ?>"><?php echo $lab_test_result->LabCD->caption() ?><?php echo ($lab_test_result->LabCD->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_result_add->RightColumnClass ?>"><div<?php echo $lab_test_result->LabCD->cellAttributes() ?>>
<span id="el_lab_test_result_LabCD">
<input type="text" data-table="lab_test_result" data-field="x_LabCD" name="x_LabCD" id="x_LabCD" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($lab_test_result->LabCD->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->LabCD->EditValue ?>"<?php echo $lab_test_result->LabCD->editAttributes() ?>>
</span>
<?php echo $lab_test_result->LabCD->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->OutLabAmt->Visible) { // OutLabAmt ?>
	<div id="r_OutLabAmt" class="form-group row">
		<label id="elh_lab_test_result_OutLabAmt" for="x_OutLabAmt" class="<?php echo $lab_test_result_add->LeftColumnClass ?>"><?php echo $lab_test_result->OutLabAmt->caption() ?><?php echo ($lab_test_result->OutLabAmt->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_result_add->RightColumnClass ?>"><div<?php echo $lab_test_result->OutLabAmt->cellAttributes() ?>>
<span id="el_lab_test_result_OutLabAmt">
<input type="text" data-table="lab_test_result" data-field="x_OutLabAmt" name="x_OutLabAmt" id="x_OutLabAmt" size="30" placeholder="<?php echo HtmlEncode($lab_test_result->OutLabAmt->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->OutLabAmt->EditValue ?>"<?php echo $lab_test_result->OutLabAmt->editAttributes() ?>>
</span>
<?php echo $lab_test_result->OutLabAmt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->ProductQty->Visible) { // ProductQty ?>
	<div id="r_ProductQty" class="form-group row">
		<label id="elh_lab_test_result_ProductQty" for="x_ProductQty" class="<?php echo $lab_test_result_add->LeftColumnClass ?>"><?php echo $lab_test_result->ProductQty->caption() ?><?php echo ($lab_test_result->ProductQty->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_result_add->RightColumnClass ?>"><div<?php echo $lab_test_result->ProductQty->cellAttributes() ?>>
<span id="el_lab_test_result_ProductQty">
<input type="text" data-table="lab_test_result" data-field="x_ProductQty" name="x_ProductQty" id="x_ProductQty" size="30" placeholder="<?php echo HtmlEncode($lab_test_result->ProductQty->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->ProductQty->EditValue ?>"<?php echo $lab_test_result->ProductQty->editAttributes() ?>>
</span>
<?php echo $lab_test_result->ProductQty->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->Repeat->Visible) { // Repeat ?>
	<div id="r_Repeat" class="form-group row">
		<label id="elh_lab_test_result_Repeat" for="x_Repeat" class="<?php echo $lab_test_result_add->LeftColumnClass ?>"><?php echo $lab_test_result->Repeat->caption() ?><?php echo ($lab_test_result->Repeat->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_result_add->RightColumnClass ?>"><div<?php echo $lab_test_result->Repeat->cellAttributes() ?>>
<span id="el_lab_test_result_Repeat">
<input type="text" data-table="lab_test_result" data-field="x_Repeat" name="x_Repeat" id="x_Repeat" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result->Repeat->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->Repeat->EditValue ?>"<?php echo $lab_test_result->Repeat->editAttributes() ?>>
</span>
<?php echo $lab_test_result->Repeat->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->DeptNo->Visible) { // DeptNo ?>
	<div id="r_DeptNo" class="form-group row">
		<label id="elh_lab_test_result_DeptNo" for="x_DeptNo" class="<?php echo $lab_test_result_add->LeftColumnClass ?>"><?php echo $lab_test_result->DeptNo->caption() ?><?php echo ($lab_test_result->DeptNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_result_add->RightColumnClass ?>"><div<?php echo $lab_test_result->DeptNo->cellAttributes() ?>>
<span id="el_lab_test_result_DeptNo">
<input type="text" data-table="lab_test_result" data-field="x_DeptNo" name="x_DeptNo" id="x_DeptNo" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($lab_test_result->DeptNo->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->DeptNo->EditValue ?>"<?php echo $lab_test_result->DeptNo->editAttributes() ?>>
</span>
<?php echo $lab_test_result->DeptNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->Desc1->Visible) { // Desc1 ?>
	<div id="r_Desc1" class="form-group row">
		<label id="elh_lab_test_result_Desc1" for="x_Desc1" class="<?php echo $lab_test_result_add->LeftColumnClass ?>"><?php echo $lab_test_result->Desc1->caption() ?><?php echo ($lab_test_result->Desc1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_result_add->RightColumnClass ?>"><div<?php echo $lab_test_result->Desc1->cellAttributes() ?>>
<span id="el_lab_test_result_Desc1">
<input type="text" data-table="lab_test_result" data-field="x_Desc1" name="x_Desc1" id="x_Desc1" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($lab_test_result->Desc1->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->Desc1->EditValue ?>"<?php echo $lab_test_result->Desc1->editAttributes() ?>>
</span>
<?php echo $lab_test_result->Desc1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->Desc2->Visible) { // Desc2 ?>
	<div id="r_Desc2" class="form-group row">
		<label id="elh_lab_test_result_Desc2" for="x_Desc2" class="<?php echo $lab_test_result_add->LeftColumnClass ?>"><?php echo $lab_test_result->Desc2->caption() ?><?php echo ($lab_test_result->Desc2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_result_add->RightColumnClass ?>"><div<?php echo $lab_test_result->Desc2->cellAttributes() ?>>
<span id="el_lab_test_result_Desc2">
<input type="text" data-table="lab_test_result" data-field="x_Desc2" name="x_Desc2" id="x_Desc2" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($lab_test_result->Desc2->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->Desc2->EditValue ?>"<?php echo $lab_test_result->Desc2->editAttributes() ?>>
</span>
<?php echo $lab_test_result->Desc2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($lab_test_result->RptResult->Visible) { // RptResult ?>
	<div id="r_RptResult" class="form-group row">
		<label id="elh_lab_test_result_RptResult" for="x_RptResult" class="<?php echo $lab_test_result_add->LeftColumnClass ?>"><?php echo $lab_test_result->RptResult->caption() ?><?php echo ($lab_test_result->RptResult->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $lab_test_result_add->RightColumnClass ?>"><div<?php echo $lab_test_result->RptResult->cellAttributes() ?>>
<span id="el_lab_test_result_RptResult">
<input type="text" data-table="lab_test_result" data-field="x_RptResult" name="x_RptResult" id="x_RptResult" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($lab_test_result->RptResult->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->RptResult->EditValue ?>"<?php echo $lab_test_result->RptResult->editAttributes() ?>>
</span>
<?php echo $lab_test_result->RptResult->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$lab_test_result_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $lab_test_result_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $lab_test_result_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$lab_test_result_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$lab_test_result_add->terminate();
?>