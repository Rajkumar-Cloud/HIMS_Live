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
$lab_test_result_list = new lab_test_result_list();

// Run the page
$lab_test_result_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_test_result_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$lab_test_result->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var flab_test_resultlist = currentForm = new ew.Form("flab_test_resultlist", "list");
flab_test_resultlist.formKeyCountName = '<?php echo $lab_test_result_list->FormKeyCountName ?>';

// Validate form
flab_test_resultlist.validate = function() {
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
		var checkrow = (gridinsert) ? !this.emptyRow(infix) : true;
		if (checkrow) {
			addcnt++;
		<?php if ($lab_test_result_list->Branch->Required) { ?>
			elm = this.getElements("x" + infix + "_Branch");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->Branch->caption(), $lab_test_result->Branch->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_list->SidNo->Required) { ?>
			elm = this.getElements("x" + infix + "_SidNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->SidNo->caption(), $lab_test_result->SidNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_list->SidDate->Required) { ?>
			elm = this.getElements("x" + infix + "_SidDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->SidDate->caption(), $lab_test_result->SidDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SidDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($lab_test_result->SidDate->errorMessage()) ?>");
		<?php if ($lab_test_result_list->TestCd->Required) { ?>
			elm = this.getElements("x" + infix + "_TestCd");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->TestCd->caption(), $lab_test_result->TestCd->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_list->TestSubCd->Required) { ?>
			elm = this.getElements("x" + infix + "_TestSubCd");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->TestSubCd->caption(), $lab_test_result->TestSubCd->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_list->DEptCd->Required) { ?>
			elm = this.getElements("x" + infix + "_DEptCd");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->DEptCd->caption(), $lab_test_result->DEptCd->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_list->ProfCd->Required) { ?>
			elm = this.getElements("x" + infix + "_ProfCd");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->ProfCd->caption(), $lab_test_result->ProfCd->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_list->ResultDate->Required) { ?>
			elm = this.getElements("x" + infix + "_ResultDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->ResultDate->caption(), $lab_test_result->ResultDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ResultDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($lab_test_result->ResultDate->errorMessage()) ?>");
		<?php if ($lab_test_result_list->Method->Required) { ?>
			elm = this.getElements("x" + infix + "_Method");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->Method->caption(), $lab_test_result->Method->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_list->Specimen->Required) { ?>
			elm = this.getElements("x" + infix + "_Specimen");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->Specimen->caption(), $lab_test_result->Specimen->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_list->Amount->Required) { ?>
			elm = this.getElements("x" + infix + "_Amount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->Amount->caption(), $lab_test_result->Amount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Amount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($lab_test_result->Amount->errorMessage()) ?>");
		<?php if ($lab_test_result_list->ResultBy->Required) { ?>
			elm = this.getElements("x" + infix + "_ResultBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->ResultBy->caption(), $lab_test_result->ResultBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_list->AuthBy->Required) { ?>
			elm = this.getElements("x" + infix + "_AuthBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->AuthBy->caption(), $lab_test_result->AuthBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_list->AuthDate->Required) { ?>
			elm = this.getElements("x" + infix + "_AuthDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->AuthDate->caption(), $lab_test_result->AuthDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_AuthDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($lab_test_result->AuthDate->errorMessage()) ?>");
		<?php if ($lab_test_result_list->Abnormal->Required) { ?>
			elm = this.getElements("x" + infix + "_Abnormal");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->Abnormal->caption(), $lab_test_result->Abnormal->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_list->Printed->Required) { ?>
			elm = this.getElements("x" + infix + "_Printed");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->Printed->caption(), $lab_test_result->Printed->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_list->Dispatch->Required) { ?>
			elm = this.getElements("x" + infix + "_Dispatch");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->Dispatch->caption(), $lab_test_result->Dispatch->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_list->LOWHIGH->Required) { ?>
			elm = this.getElements("x" + infix + "_LOWHIGH");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->LOWHIGH->caption(), $lab_test_result->LOWHIGH->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_list->Unit->Required) { ?>
			elm = this.getElements("x" + infix + "_Unit");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->Unit->caption(), $lab_test_result->Unit->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_list->ResDate->Required) { ?>
			elm = this.getElements("x" + infix + "_ResDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->ResDate->caption(), $lab_test_result->ResDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ResDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($lab_test_result->ResDate->errorMessage()) ?>");
		<?php if ($lab_test_result_list->Pic1->Required) { ?>
			elm = this.getElements("x" + infix + "_Pic1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->Pic1->caption(), $lab_test_result->Pic1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_list->Pic2->Required) { ?>
			elm = this.getElements("x" + infix + "_Pic2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->Pic2->caption(), $lab_test_result->Pic2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_list->GraphPath->Required) { ?>
			elm = this.getElements("x" + infix + "_GraphPath");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->GraphPath->caption(), $lab_test_result->GraphPath->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_list->SampleDate->Required) { ?>
			elm = this.getElements("x" + infix + "_SampleDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->SampleDate->caption(), $lab_test_result->SampleDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SampleDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($lab_test_result->SampleDate->errorMessage()) ?>");
		<?php if ($lab_test_result_list->SampleUser->Required) { ?>
			elm = this.getElements("x" + infix + "_SampleUser");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->SampleUser->caption(), $lab_test_result->SampleUser->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_list->ReceivedDate->Required) { ?>
			elm = this.getElements("x" + infix + "_ReceivedDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->ReceivedDate->caption(), $lab_test_result->ReceivedDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ReceivedDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($lab_test_result->ReceivedDate->errorMessage()) ?>");
		<?php if ($lab_test_result_list->ReceivedUser->Required) { ?>
			elm = this.getElements("x" + infix + "_ReceivedUser");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->ReceivedUser->caption(), $lab_test_result->ReceivedUser->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_list->DeptRecvDate->Required) { ?>
			elm = this.getElements("x" + infix + "_DeptRecvDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->DeptRecvDate->caption(), $lab_test_result->DeptRecvDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DeptRecvDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($lab_test_result->DeptRecvDate->errorMessage()) ?>");
		<?php if ($lab_test_result_list->DeptRecvUser->Required) { ?>
			elm = this.getElements("x" + infix + "_DeptRecvUser");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->DeptRecvUser->caption(), $lab_test_result->DeptRecvUser->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_list->PrintBy->Required) { ?>
			elm = this.getElements("x" + infix + "_PrintBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->PrintBy->caption(), $lab_test_result->PrintBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_list->PrintDate->Required) { ?>
			elm = this.getElements("x" + infix + "_PrintDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->PrintDate->caption(), $lab_test_result->PrintDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PrintDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($lab_test_result->PrintDate->errorMessage()) ?>");
		<?php if ($lab_test_result_list->MachineCD->Required) { ?>
			elm = this.getElements("x" + infix + "_MachineCD");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->MachineCD->caption(), $lab_test_result->MachineCD->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_list->TestCancel->Required) { ?>
			elm = this.getElements("x" + infix + "_TestCancel");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->TestCancel->caption(), $lab_test_result->TestCancel->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_list->OutSource->Required) { ?>
			elm = this.getElements("x" + infix + "_OutSource");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->OutSource->caption(), $lab_test_result->OutSource->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_list->Tariff->Required) { ?>
			elm = this.getElements("x" + infix + "_Tariff");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->Tariff->caption(), $lab_test_result->Tariff->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Tariff");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($lab_test_result->Tariff->errorMessage()) ?>");
		<?php if ($lab_test_result_list->EDITDATE->Required) { ?>
			elm = this.getElements("x" + infix + "_EDITDATE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->EDITDATE->caption(), $lab_test_result->EDITDATE->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_EDITDATE");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($lab_test_result->EDITDATE->errorMessage()) ?>");
		<?php if ($lab_test_result_list->UPLOAD->Required) { ?>
			elm = this.getElements("x" + infix + "_UPLOAD");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->UPLOAD->caption(), $lab_test_result->UPLOAD->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_list->SAuthDate->Required) { ?>
			elm = this.getElements("x" + infix + "_SAuthDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->SAuthDate->caption(), $lab_test_result->SAuthDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SAuthDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($lab_test_result->SAuthDate->errorMessage()) ?>");
		<?php if ($lab_test_result_list->SAuthBy->Required) { ?>
			elm = this.getElements("x" + infix + "_SAuthBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->SAuthBy->caption(), $lab_test_result->SAuthBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_list->NoRC->Required) { ?>
			elm = this.getElements("x" + infix + "_NoRC");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->NoRC->caption(), $lab_test_result->NoRC->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_list->DispDt->Required) { ?>
			elm = this.getElements("x" + infix + "_DispDt");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->DispDt->caption(), $lab_test_result->DispDt->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DispDt");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($lab_test_result->DispDt->errorMessage()) ?>");
		<?php if ($lab_test_result_list->DispUser->Required) { ?>
			elm = this.getElements("x" + infix + "_DispUser");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->DispUser->caption(), $lab_test_result->DispUser->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_list->DispRemarks->Required) { ?>
			elm = this.getElements("x" + infix + "_DispRemarks");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->DispRemarks->caption(), $lab_test_result->DispRemarks->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_list->DispMode->Required) { ?>
			elm = this.getElements("x" + infix + "_DispMode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->DispMode->caption(), $lab_test_result->DispMode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_list->ProductCD->Required) { ?>
			elm = this.getElements("x" + infix + "_ProductCD");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->ProductCD->caption(), $lab_test_result->ProductCD->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_list->Nos->Required) { ?>
			elm = this.getElements("x" + infix + "_Nos");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->Nos->caption(), $lab_test_result->Nos->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Nos");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($lab_test_result->Nos->errorMessage()) ?>");
		<?php if ($lab_test_result_list->WBCPath->Required) { ?>
			elm = this.getElements("x" + infix + "_WBCPath");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->WBCPath->caption(), $lab_test_result->WBCPath->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_list->RBCPath->Required) { ?>
			elm = this.getElements("x" + infix + "_RBCPath");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->RBCPath->caption(), $lab_test_result->RBCPath->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_list->PTPath->Required) { ?>
			elm = this.getElements("x" + infix + "_PTPath");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->PTPath->caption(), $lab_test_result->PTPath->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_list->ActualAmt->Required) { ?>
			elm = this.getElements("x" + infix + "_ActualAmt");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->ActualAmt->caption(), $lab_test_result->ActualAmt->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ActualAmt");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($lab_test_result->ActualAmt->errorMessage()) ?>");
		<?php if ($lab_test_result_list->NoSign->Required) { ?>
			elm = this.getElements("x" + infix + "_NoSign");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->NoSign->caption(), $lab_test_result->NoSign->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_list->_Barcode->Required) { ?>
			elm = this.getElements("x" + infix + "__Barcode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->_Barcode->caption(), $lab_test_result->_Barcode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_list->ReadTime->Required) { ?>
			elm = this.getElements("x" + infix + "_ReadTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->ReadTime->caption(), $lab_test_result->ReadTime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ReadTime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($lab_test_result->ReadTime->errorMessage()) ?>");
		<?php if ($lab_test_result_list->VailID->Required) { ?>
			elm = this.getElements("x" + infix + "_VailID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->VailID->caption(), $lab_test_result->VailID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_list->ReadMachine->Required) { ?>
			elm = this.getElements("x" + infix + "_ReadMachine");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->ReadMachine->caption(), $lab_test_result->ReadMachine->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_list->LabCD->Required) { ?>
			elm = this.getElements("x" + infix + "_LabCD");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->LabCD->caption(), $lab_test_result->LabCD->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_list->OutLabAmt->Required) { ?>
			elm = this.getElements("x" + infix + "_OutLabAmt");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->OutLabAmt->caption(), $lab_test_result->OutLabAmt->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_OutLabAmt");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($lab_test_result->OutLabAmt->errorMessage()) ?>");
		<?php if ($lab_test_result_list->ProductQty->Required) { ?>
			elm = this.getElements("x" + infix + "_ProductQty");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->ProductQty->caption(), $lab_test_result->ProductQty->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ProductQty");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($lab_test_result->ProductQty->errorMessage()) ?>");
		<?php if ($lab_test_result_list->Repeat->Required) { ?>
			elm = this.getElements("x" + infix + "_Repeat");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->Repeat->caption(), $lab_test_result->Repeat->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_list->DeptNo->Required) { ?>
			elm = this.getElements("x" + infix + "_DeptNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->DeptNo->caption(), $lab_test_result->DeptNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_list->Desc1->Required) { ?>
			elm = this.getElements("x" + infix + "_Desc1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->Desc1->caption(), $lab_test_result->Desc1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_list->Desc2->Required) { ?>
			elm = this.getElements("x" + infix + "_Desc2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->Desc2->caption(), $lab_test_result->Desc2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($lab_test_result_list->RptResult->Required) { ?>
			elm = this.getElements("x" + infix + "_RptResult");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result->RptResult->caption(), $lab_test_result->RptResult->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
		} // End Grid Add checking
	}
	if (gridinsert && addcnt == 0) { // No row added
		ew.alert(ew.language.phrase("NoAddRecord"));
		return false;
	}
	return true;
}

// Check empty row
flab_test_resultlist.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "Branch", false)) return false;
	if (ew.valueChanged(fobj, infix, "SidNo", false)) return false;
	if (ew.valueChanged(fobj, infix, "SidDate", false)) return false;
	if (ew.valueChanged(fobj, infix, "TestCd", false)) return false;
	if (ew.valueChanged(fobj, infix, "TestSubCd", false)) return false;
	if (ew.valueChanged(fobj, infix, "DEptCd", false)) return false;
	if (ew.valueChanged(fobj, infix, "ProfCd", false)) return false;
	if (ew.valueChanged(fobj, infix, "ResultDate", false)) return false;
	if (ew.valueChanged(fobj, infix, "Method", false)) return false;
	if (ew.valueChanged(fobj, infix, "Specimen", false)) return false;
	if (ew.valueChanged(fobj, infix, "Amount", false)) return false;
	if (ew.valueChanged(fobj, infix, "ResultBy", false)) return false;
	if (ew.valueChanged(fobj, infix, "AuthBy", false)) return false;
	if (ew.valueChanged(fobj, infix, "AuthDate", false)) return false;
	if (ew.valueChanged(fobj, infix, "Abnormal", false)) return false;
	if (ew.valueChanged(fobj, infix, "Printed", false)) return false;
	if (ew.valueChanged(fobj, infix, "Dispatch", false)) return false;
	if (ew.valueChanged(fobj, infix, "LOWHIGH", false)) return false;
	if (ew.valueChanged(fobj, infix, "Unit", false)) return false;
	if (ew.valueChanged(fobj, infix, "ResDate", false)) return false;
	if (ew.valueChanged(fobj, infix, "Pic1", false)) return false;
	if (ew.valueChanged(fobj, infix, "Pic2", false)) return false;
	if (ew.valueChanged(fobj, infix, "GraphPath", false)) return false;
	if (ew.valueChanged(fobj, infix, "SampleDate", false)) return false;
	if (ew.valueChanged(fobj, infix, "SampleUser", false)) return false;
	if (ew.valueChanged(fobj, infix, "ReceivedDate", false)) return false;
	if (ew.valueChanged(fobj, infix, "ReceivedUser", false)) return false;
	if (ew.valueChanged(fobj, infix, "DeptRecvDate", false)) return false;
	if (ew.valueChanged(fobj, infix, "DeptRecvUser", false)) return false;
	if (ew.valueChanged(fobj, infix, "PrintBy", false)) return false;
	if (ew.valueChanged(fobj, infix, "PrintDate", false)) return false;
	if (ew.valueChanged(fobj, infix, "MachineCD", false)) return false;
	if (ew.valueChanged(fobj, infix, "TestCancel", false)) return false;
	if (ew.valueChanged(fobj, infix, "OutSource", false)) return false;
	if (ew.valueChanged(fobj, infix, "Tariff", false)) return false;
	if (ew.valueChanged(fobj, infix, "EDITDATE", false)) return false;
	if (ew.valueChanged(fobj, infix, "UPLOAD", false)) return false;
	if (ew.valueChanged(fobj, infix, "SAuthDate", false)) return false;
	if (ew.valueChanged(fobj, infix, "SAuthBy", false)) return false;
	if (ew.valueChanged(fobj, infix, "NoRC", false)) return false;
	if (ew.valueChanged(fobj, infix, "DispDt", false)) return false;
	if (ew.valueChanged(fobj, infix, "DispUser", false)) return false;
	if (ew.valueChanged(fobj, infix, "DispRemarks", false)) return false;
	if (ew.valueChanged(fobj, infix, "DispMode", false)) return false;
	if (ew.valueChanged(fobj, infix, "ProductCD", false)) return false;
	if (ew.valueChanged(fobj, infix, "Nos", false)) return false;
	if (ew.valueChanged(fobj, infix, "WBCPath", false)) return false;
	if (ew.valueChanged(fobj, infix, "RBCPath", false)) return false;
	if (ew.valueChanged(fobj, infix, "PTPath", false)) return false;
	if (ew.valueChanged(fobj, infix, "ActualAmt", false)) return false;
	if (ew.valueChanged(fobj, infix, "NoSign", false)) return false;
	if (ew.valueChanged(fobj, infix, "_Barcode", false)) return false;
	if (ew.valueChanged(fobj, infix, "ReadTime", false)) return false;
	if (ew.valueChanged(fobj, infix, "VailID", false)) return false;
	if (ew.valueChanged(fobj, infix, "ReadMachine", false)) return false;
	if (ew.valueChanged(fobj, infix, "LabCD", false)) return false;
	if (ew.valueChanged(fobj, infix, "OutLabAmt", false)) return false;
	if (ew.valueChanged(fobj, infix, "ProductQty", false)) return false;
	if (ew.valueChanged(fobj, infix, "Repeat", false)) return false;
	if (ew.valueChanged(fobj, infix, "DeptNo", false)) return false;
	if (ew.valueChanged(fobj, infix, "Desc1", false)) return false;
	if (ew.valueChanged(fobj, infix, "Desc2", false)) return false;
	if (ew.valueChanged(fobj, infix, "RptResult", false)) return false;
	return true;
}

// Form_CustomValidate event
flab_test_resultlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
flab_test_resultlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var flab_test_resultlistsrch = currentSearchForm = new ew.Form("flab_test_resultlistsrch");

// Validate function for search
flab_test_resultlistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";
	elm = this.getElements("x" + infix + "_SidDate");
	if (elm && !ew.checkDateDef(elm.value))
		return this.onError(elm, "<?php echo JsEncode($lab_test_result->SidDate->errorMessage()) ?>");

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
flab_test_resultlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
flab_test_resultlistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Filters

flab_test_resultlistsrch.filterList = <?php echo $lab_test_result_list->getFilterList() ?>;
</script>
<script src="phpjs/ewscrolltable.js"></script>
<style type="text/css">
.ew-table-preview-row { /* main table preview row color */
	background-color: #FFFFFF; /* preview row color */
}
.ew-table-preview-row .ew-grid {
	display: table;
}
</style>
<div id="ew-preview" class="d-none"><!-- preview -->
	<div class="ew-nav-tabs"><!-- .ew-nav-tabs -->
		<ul class="nav nav-tabs"></ul>
		<div class="tab-content"><!-- .tab-content -->
			<div class="tab-pane fade active show"></div>
		</div><!-- /.tab-content -->
	</div><!-- /.ew-nav-tabs -->
</div><!-- /preview -->
<script src="phpjs/ewpreview.js"></script>
<script>
ew.PREVIEW_PLACEMENT = ew.CSS_FLIP ? "left" : "right";
ew.PREVIEW_SINGLE_ROW = false;
ew.PREVIEW_OVERLAY = false;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$lab_test_result->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($lab_test_result_list->TotalRecs > 0 && $lab_test_result_list->ExportOptions->visible()) { ?>
<?php $lab_test_result_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($lab_test_result_list->ImportOptions->visible()) { ?>
<?php $lab_test_result_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($lab_test_result_list->SearchOptions->visible()) { ?>
<?php $lab_test_result_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($lab_test_result_list->FilterOptions->visible()) { ?>
<?php $lab_test_result_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$lab_test_result_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$lab_test_result->isExport() && !$lab_test_result->CurrentAction) { ?>
<form name="flab_test_resultlistsrch" id="flab_test_resultlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($lab_test_result_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="flab_test_resultlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="lab_test_result">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$lab_test_result_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$lab_test_result->RowType = ROWTYPE_SEARCH;

// Render row
$lab_test_result->resetAttributes();
$lab_test_result_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($lab_test_result->SidNo->Visible) { // SidNo ?>
	<div id="xsc_SidNo" class="ew-cell form-group">
		<label for="x_SidNo" class="ew-search-caption ew-label"><?php echo $lab_test_result->SidNo->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_SidNo" id="z_SidNo" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="lab_test_result" data-field="x_SidNo" name="x_SidNo" id="x_SidNo" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($lab_test_result->SidNo->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->SidNo->EditValue ?>"<?php echo $lab_test_result->SidNo->editAttributes() ?>>
</span>
	</div>
<?php } ?>
<?php if ($lab_test_result->SidDate->Visible) { // SidDate ?>
	<div id="xsc_SidDate" class="ew-cell form-group">
		<label for="x_SidDate" class="ew-search-caption ew-label"><?php echo $lab_test_result->SidDate->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_SidDate" id="z_SidDate" value="="></span>
		<span class="ew-search-field">
<input type="text" data-table="lab_test_result" data-field="x_SidDate" name="x_SidDate" id="x_SidDate" placeholder="<?php echo HtmlEncode($lab_test_result->SidDate->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->SidDate->EditValue ?>"<?php echo $lab_test_result->SidDate->editAttributes() ?>>
<?php if (!$lab_test_result->SidDate->ReadOnly && !$lab_test_result->SidDate->Disabled && !isset($lab_test_result->SidDate->EditAttrs["readonly"]) && !isset($lab_test_result->SidDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("flab_test_resultlistsrch", "x_SidDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($lab_test_result_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($lab_test_result_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $lab_test_result_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($lab_test_result_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($lab_test_result_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($lab_test_result_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($lab_test_result_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $lab_test_result_list->showPageHeader(); ?>
<?php
$lab_test_result_list->showMessage();
?>
<?php if ($lab_test_result_list->TotalRecs > 0 || $lab_test_result->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($lab_test_result_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> lab_test_result">
<?php if (!$lab_test_result->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$lab_test_result->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($lab_test_result_list->Pager)) $lab_test_result_list->Pager = new NumericPager($lab_test_result_list->StartRec, $lab_test_result_list->DisplayRecs, $lab_test_result_list->TotalRecs, $lab_test_result_list->RecRange, $lab_test_result_list->AutoHidePager) ?>
<?php if ($lab_test_result_list->Pager->RecordCount > 0 && $lab_test_result_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($lab_test_result_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_test_result_list->pageUrl() ?>start=<?php echo $lab_test_result_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($lab_test_result_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_test_result_list->pageUrl() ?>start=<?php echo $lab_test_result_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($lab_test_result_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $lab_test_result_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($lab_test_result_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_test_result_list->pageUrl() ?>start=<?php echo $lab_test_result_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($lab_test_result_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_test_result_list->pageUrl() ?>start=<?php echo $lab_test_result_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($lab_test_result_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $lab_test_result_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $lab_test_result_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $lab_test_result_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($lab_test_result_list->TotalRecs > 0 && (!$lab_test_result_list->AutoHidePageSizeSelector || $lab_test_result_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="lab_test_result">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($lab_test_result_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($lab_test_result_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($lab_test_result_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($lab_test_result_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($lab_test_result_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($lab_test_result_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($lab_test_result->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $lab_test_result_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="flab_test_resultlist" id="flab_test_resultlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($lab_test_result_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $lab_test_result_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_test_result">
<div id="gmp_lab_test_result" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($lab_test_result_list->TotalRecs > 0 || $lab_test_result->isGridEdit()) { ?>
<table id="tbl_lab_test_resultlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$lab_test_result_list->RowType = ROWTYPE_HEADER;

// Render list options
$lab_test_result_list->renderListOptions();

// Render list options (header, left)
$lab_test_result_list->ListOptions->render("header", "left");
?>
<?php if ($lab_test_result->Branch->Visible) { // Branch ?>
	<?php if ($lab_test_result->sortUrl($lab_test_result->Branch) == "") { ?>
		<th data-name="Branch" class="<?php echo $lab_test_result->Branch->headerCellClass() ?>"><div id="elh_lab_test_result_Branch" class="lab_test_result_Branch"><div class="ew-table-header-caption"><?php echo $lab_test_result->Branch->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Branch" class="<?php echo $lab_test_result->Branch->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_result->SortUrl($lab_test_result->Branch) ?>',1);"><div id="elh_lab_test_result_Branch" class="lab_test_result_Branch">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result->Branch->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result->Branch->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_result->Branch->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result->SidNo->Visible) { // SidNo ?>
	<?php if ($lab_test_result->sortUrl($lab_test_result->SidNo) == "") { ?>
		<th data-name="SidNo" class="<?php echo $lab_test_result->SidNo->headerCellClass() ?>"><div id="elh_lab_test_result_SidNo" class="lab_test_result_SidNo"><div class="ew-table-header-caption"><?php echo $lab_test_result->SidNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SidNo" class="<?php echo $lab_test_result->SidNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_result->SortUrl($lab_test_result->SidNo) ?>',1);"><div id="elh_lab_test_result_SidNo" class="lab_test_result_SidNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result->SidNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result->SidNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_result->SidNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result->SidDate->Visible) { // SidDate ?>
	<?php if ($lab_test_result->sortUrl($lab_test_result->SidDate) == "") { ?>
		<th data-name="SidDate" class="<?php echo $lab_test_result->SidDate->headerCellClass() ?>"><div id="elh_lab_test_result_SidDate" class="lab_test_result_SidDate"><div class="ew-table-header-caption"><?php echo $lab_test_result->SidDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SidDate" class="<?php echo $lab_test_result->SidDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_result->SortUrl($lab_test_result->SidDate) ?>',1);"><div id="elh_lab_test_result_SidDate" class="lab_test_result_SidDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result->SidDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result->SidDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_result->SidDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result->TestCd->Visible) { // TestCd ?>
	<?php if ($lab_test_result->sortUrl($lab_test_result->TestCd) == "") { ?>
		<th data-name="TestCd" class="<?php echo $lab_test_result->TestCd->headerCellClass() ?>"><div id="elh_lab_test_result_TestCd" class="lab_test_result_TestCd"><div class="ew-table-header-caption"><?php echo $lab_test_result->TestCd->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestCd" class="<?php echo $lab_test_result->TestCd->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_result->SortUrl($lab_test_result->TestCd) ?>',1);"><div id="elh_lab_test_result_TestCd" class="lab_test_result_TestCd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result->TestCd->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result->TestCd->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_result->TestCd->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result->TestSubCd->Visible) { // TestSubCd ?>
	<?php if ($lab_test_result->sortUrl($lab_test_result->TestSubCd) == "") { ?>
		<th data-name="TestSubCd" class="<?php echo $lab_test_result->TestSubCd->headerCellClass() ?>"><div id="elh_lab_test_result_TestSubCd" class="lab_test_result_TestSubCd"><div class="ew-table-header-caption"><?php echo $lab_test_result->TestSubCd->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestSubCd" class="<?php echo $lab_test_result->TestSubCd->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_result->SortUrl($lab_test_result->TestSubCd) ?>',1);"><div id="elh_lab_test_result_TestSubCd" class="lab_test_result_TestSubCd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result->TestSubCd->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result->TestSubCd->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_result->TestSubCd->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result->DEptCd->Visible) { // DEptCd ?>
	<?php if ($lab_test_result->sortUrl($lab_test_result->DEptCd) == "") { ?>
		<th data-name="DEptCd" class="<?php echo $lab_test_result->DEptCd->headerCellClass() ?>"><div id="elh_lab_test_result_DEptCd" class="lab_test_result_DEptCd"><div class="ew-table-header-caption"><?php echo $lab_test_result->DEptCd->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DEptCd" class="<?php echo $lab_test_result->DEptCd->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_result->SortUrl($lab_test_result->DEptCd) ?>',1);"><div id="elh_lab_test_result_DEptCd" class="lab_test_result_DEptCd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result->DEptCd->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result->DEptCd->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_result->DEptCd->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result->ProfCd->Visible) { // ProfCd ?>
	<?php if ($lab_test_result->sortUrl($lab_test_result->ProfCd) == "") { ?>
		<th data-name="ProfCd" class="<?php echo $lab_test_result->ProfCd->headerCellClass() ?>"><div id="elh_lab_test_result_ProfCd" class="lab_test_result_ProfCd"><div class="ew-table-header-caption"><?php echo $lab_test_result->ProfCd->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProfCd" class="<?php echo $lab_test_result->ProfCd->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_result->SortUrl($lab_test_result->ProfCd) ?>',1);"><div id="elh_lab_test_result_ProfCd" class="lab_test_result_ProfCd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result->ProfCd->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result->ProfCd->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_result->ProfCd->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result->ResultDate->Visible) { // ResultDate ?>
	<?php if ($lab_test_result->sortUrl($lab_test_result->ResultDate) == "") { ?>
		<th data-name="ResultDate" class="<?php echo $lab_test_result->ResultDate->headerCellClass() ?>"><div id="elh_lab_test_result_ResultDate" class="lab_test_result_ResultDate"><div class="ew-table-header-caption"><?php echo $lab_test_result->ResultDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ResultDate" class="<?php echo $lab_test_result->ResultDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_result->SortUrl($lab_test_result->ResultDate) ?>',1);"><div id="elh_lab_test_result_ResultDate" class="lab_test_result_ResultDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result->ResultDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result->ResultDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_result->ResultDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result->Method->Visible) { // Method ?>
	<?php if ($lab_test_result->sortUrl($lab_test_result->Method) == "") { ?>
		<th data-name="Method" class="<?php echo $lab_test_result->Method->headerCellClass() ?>"><div id="elh_lab_test_result_Method" class="lab_test_result_Method"><div class="ew-table-header-caption"><?php echo $lab_test_result->Method->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Method" class="<?php echo $lab_test_result->Method->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_result->SortUrl($lab_test_result->Method) ?>',1);"><div id="elh_lab_test_result_Method" class="lab_test_result_Method">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result->Method->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result->Method->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_result->Method->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result->Specimen->Visible) { // Specimen ?>
	<?php if ($lab_test_result->sortUrl($lab_test_result->Specimen) == "") { ?>
		<th data-name="Specimen" class="<?php echo $lab_test_result->Specimen->headerCellClass() ?>"><div id="elh_lab_test_result_Specimen" class="lab_test_result_Specimen"><div class="ew-table-header-caption"><?php echo $lab_test_result->Specimen->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Specimen" class="<?php echo $lab_test_result->Specimen->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_result->SortUrl($lab_test_result->Specimen) ?>',1);"><div id="elh_lab_test_result_Specimen" class="lab_test_result_Specimen">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result->Specimen->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result->Specimen->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_result->Specimen->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result->Amount->Visible) { // Amount ?>
	<?php if ($lab_test_result->sortUrl($lab_test_result->Amount) == "") { ?>
		<th data-name="Amount" class="<?php echo $lab_test_result->Amount->headerCellClass() ?>"><div id="elh_lab_test_result_Amount" class="lab_test_result_Amount"><div class="ew-table-header-caption"><?php echo $lab_test_result->Amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Amount" class="<?php echo $lab_test_result->Amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_result->SortUrl($lab_test_result->Amount) ?>',1);"><div id="elh_lab_test_result_Amount" class="lab_test_result_Amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result->Amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result->Amount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_result->Amount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result->ResultBy->Visible) { // ResultBy ?>
	<?php if ($lab_test_result->sortUrl($lab_test_result->ResultBy) == "") { ?>
		<th data-name="ResultBy" class="<?php echo $lab_test_result->ResultBy->headerCellClass() ?>"><div id="elh_lab_test_result_ResultBy" class="lab_test_result_ResultBy"><div class="ew-table-header-caption"><?php echo $lab_test_result->ResultBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ResultBy" class="<?php echo $lab_test_result->ResultBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_result->SortUrl($lab_test_result->ResultBy) ?>',1);"><div id="elh_lab_test_result_ResultBy" class="lab_test_result_ResultBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result->ResultBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result->ResultBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_result->ResultBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result->AuthBy->Visible) { // AuthBy ?>
	<?php if ($lab_test_result->sortUrl($lab_test_result->AuthBy) == "") { ?>
		<th data-name="AuthBy" class="<?php echo $lab_test_result->AuthBy->headerCellClass() ?>"><div id="elh_lab_test_result_AuthBy" class="lab_test_result_AuthBy"><div class="ew-table-header-caption"><?php echo $lab_test_result->AuthBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AuthBy" class="<?php echo $lab_test_result->AuthBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_result->SortUrl($lab_test_result->AuthBy) ?>',1);"><div id="elh_lab_test_result_AuthBy" class="lab_test_result_AuthBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result->AuthBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result->AuthBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_result->AuthBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result->AuthDate->Visible) { // AuthDate ?>
	<?php if ($lab_test_result->sortUrl($lab_test_result->AuthDate) == "") { ?>
		<th data-name="AuthDate" class="<?php echo $lab_test_result->AuthDate->headerCellClass() ?>"><div id="elh_lab_test_result_AuthDate" class="lab_test_result_AuthDate"><div class="ew-table-header-caption"><?php echo $lab_test_result->AuthDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AuthDate" class="<?php echo $lab_test_result->AuthDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_result->SortUrl($lab_test_result->AuthDate) ?>',1);"><div id="elh_lab_test_result_AuthDate" class="lab_test_result_AuthDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result->AuthDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result->AuthDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_result->AuthDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result->Abnormal->Visible) { // Abnormal ?>
	<?php if ($lab_test_result->sortUrl($lab_test_result->Abnormal) == "") { ?>
		<th data-name="Abnormal" class="<?php echo $lab_test_result->Abnormal->headerCellClass() ?>"><div id="elh_lab_test_result_Abnormal" class="lab_test_result_Abnormal"><div class="ew-table-header-caption"><?php echo $lab_test_result->Abnormal->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Abnormal" class="<?php echo $lab_test_result->Abnormal->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_result->SortUrl($lab_test_result->Abnormal) ?>',1);"><div id="elh_lab_test_result_Abnormal" class="lab_test_result_Abnormal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result->Abnormal->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result->Abnormal->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_result->Abnormal->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result->Printed->Visible) { // Printed ?>
	<?php if ($lab_test_result->sortUrl($lab_test_result->Printed) == "") { ?>
		<th data-name="Printed" class="<?php echo $lab_test_result->Printed->headerCellClass() ?>"><div id="elh_lab_test_result_Printed" class="lab_test_result_Printed"><div class="ew-table-header-caption"><?php echo $lab_test_result->Printed->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Printed" class="<?php echo $lab_test_result->Printed->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_result->SortUrl($lab_test_result->Printed) ?>',1);"><div id="elh_lab_test_result_Printed" class="lab_test_result_Printed">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result->Printed->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result->Printed->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_result->Printed->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result->Dispatch->Visible) { // Dispatch ?>
	<?php if ($lab_test_result->sortUrl($lab_test_result->Dispatch) == "") { ?>
		<th data-name="Dispatch" class="<?php echo $lab_test_result->Dispatch->headerCellClass() ?>"><div id="elh_lab_test_result_Dispatch" class="lab_test_result_Dispatch"><div class="ew-table-header-caption"><?php echo $lab_test_result->Dispatch->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Dispatch" class="<?php echo $lab_test_result->Dispatch->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_result->SortUrl($lab_test_result->Dispatch) ?>',1);"><div id="elh_lab_test_result_Dispatch" class="lab_test_result_Dispatch">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result->Dispatch->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result->Dispatch->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_result->Dispatch->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result->LOWHIGH->Visible) { // LOWHIGH ?>
	<?php if ($lab_test_result->sortUrl($lab_test_result->LOWHIGH) == "") { ?>
		<th data-name="LOWHIGH" class="<?php echo $lab_test_result->LOWHIGH->headerCellClass() ?>"><div id="elh_lab_test_result_LOWHIGH" class="lab_test_result_LOWHIGH"><div class="ew-table-header-caption"><?php echo $lab_test_result->LOWHIGH->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LOWHIGH" class="<?php echo $lab_test_result->LOWHIGH->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_result->SortUrl($lab_test_result->LOWHIGH) ?>',1);"><div id="elh_lab_test_result_LOWHIGH" class="lab_test_result_LOWHIGH">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result->LOWHIGH->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result->LOWHIGH->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_result->LOWHIGH->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result->Unit->Visible) { // Unit ?>
	<?php if ($lab_test_result->sortUrl($lab_test_result->Unit) == "") { ?>
		<th data-name="Unit" class="<?php echo $lab_test_result->Unit->headerCellClass() ?>"><div id="elh_lab_test_result_Unit" class="lab_test_result_Unit"><div class="ew-table-header-caption"><?php echo $lab_test_result->Unit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Unit" class="<?php echo $lab_test_result->Unit->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_result->SortUrl($lab_test_result->Unit) ?>',1);"><div id="elh_lab_test_result_Unit" class="lab_test_result_Unit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result->Unit->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result->Unit->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_result->Unit->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result->ResDate->Visible) { // ResDate ?>
	<?php if ($lab_test_result->sortUrl($lab_test_result->ResDate) == "") { ?>
		<th data-name="ResDate" class="<?php echo $lab_test_result->ResDate->headerCellClass() ?>"><div id="elh_lab_test_result_ResDate" class="lab_test_result_ResDate"><div class="ew-table-header-caption"><?php echo $lab_test_result->ResDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ResDate" class="<?php echo $lab_test_result->ResDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_result->SortUrl($lab_test_result->ResDate) ?>',1);"><div id="elh_lab_test_result_ResDate" class="lab_test_result_ResDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result->ResDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result->ResDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_result->ResDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result->Pic1->Visible) { // Pic1 ?>
	<?php if ($lab_test_result->sortUrl($lab_test_result->Pic1) == "") { ?>
		<th data-name="Pic1" class="<?php echo $lab_test_result->Pic1->headerCellClass() ?>"><div id="elh_lab_test_result_Pic1" class="lab_test_result_Pic1"><div class="ew-table-header-caption"><?php echo $lab_test_result->Pic1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pic1" class="<?php echo $lab_test_result->Pic1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_result->SortUrl($lab_test_result->Pic1) ?>',1);"><div id="elh_lab_test_result_Pic1" class="lab_test_result_Pic1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result->Pic1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result->Pic1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_result->Pic1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result->Pic2->Visible) { // Pic2 ?>
	<?php if ($lab_test_result->sortUrl($lab_test_result->Pic2) == "") { ?>
		<th data-name="Pic2" class="<?php echo $lab_test_result->Pic2->headerCellClass() ?>"><div id="elh_lab_test_result_Pic2" class="lab_test_result_Pic2"><div class="ew-table-header-caption"><?php echo $lab_test_result->Pic2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pic2" class="<?php echo $lab_test_result->Pic2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_result->SortUrl($lab_test_result->Pic2) ?>',1);"><div id="elh_lab_test_result_Pic2" class="lab_test_result_Pic2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result->Pic2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result->Pic2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_result->Pic2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result->GraphPath->Visible) { // GraphPath ?>
	<?php if ($lab_test_result->sortUrl($lab_test_result->GraphPath) == "") { ?>
		<th data-name="GraphPath" class="<?php echo $lab_test_result->GraphPath->headerCellClass() ?>"><div id="elh_lab_test_result_GraphPath" class="lab_test_result_GraphPath"><div class="ew-table-header-caption"><?php echo $lab_test_result->GraphPath->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GraphPath" class="<?php echo $lab_test_result->GraphPath->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_result->SortUrl($lab_test_result->GraphPath) ?>',1);"><div id="elh_lab_test_result_GraphPath" class="lab_test_result_GraphPath">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result->GraphPath->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result->GraphPath->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_result->GraphPath->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result->SampleDate->Visible) { // SampleDate ?>
	<?php if ($lab_test_result->sortUrl($lab_test_result->SampleDate) == "") { ?>
		<th data-name="SampleDate" class="<?php echo $lab_test_result->SampleDate->headerCellClass() ?>"><div id="elh_lab_test_result_SampleDate" class="lab_test_result_SampleDate"><div class="ew-table-header-caption"><?php echo $lab_test_result->SampleDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SampleDate" class="<?php echo $lab_test_result->SampleDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_result->SortUrl($lab_test_result->SampleDate) ?>',1);"><div id="elh_lab_test_result_SampleDate" class="lab_test_result_SampleDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result->SampleDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result->SampleDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_result->SampleDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result->SampleUser->Visible) { // SampleUser ?>
	<?php if ($lab_test_result->sortUrl($lab_test_result->SampleUser) == "") { ?>
		<th data-name="SampleUser" class="<?php echo $lab_test_result->SampleUser->headerCellClass() ?>"><div id="elh_lab_test_result_SampleUser" class="lab_test_result_SampleUser"><div class="ew-table-header-caption"><?php echo $lab_test_result->SampleUser->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SampleUser" class="<?php echo $lab_test_result->SampleUser->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_result->SortUrl($lab_test_result->SampleUser) ?>',1);"><div id="elh_lab_test_result_SampleUser" class="lab_test_result_SampleUser">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result->SampleUser->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result->SampleUser->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_result->SampleUser->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result->ReceivedDate->Visible) { // ReceivedDate ?>
	<?php if ($lab_test_result->sortUrl($lab_test_result->ReceivedDate) == "") { ?>
		<th data-name="ReceivedDate" class="<?php echo $lab_test_result->ReceivedDate->headerCellClass() ?>"><div id="elh_lab_test_result_ReceivedDate" class="lab_test_result_ReceivedDate"><div class="ew-table-header-caption"><?php echo $lab_test_result->ReceivedDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReceivedDate" class="<?php echo $lab_test_result->ReceivedDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_result->SortUrl($lab_test_result->ReceivedDate) ?>',1);"><div id="elh_lab_test_result_ReceivedDate" class="lab_test_result_ReceivedDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result->ReceivedDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result->ReceivedDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_result->ReceivedDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result->ReceivedUser->Visible) { // ReceivedUser ?>
	<?php if ($lab_test_result->sortUrl($lab_test_result->ReceivedUser) == "") { ?>
		<th data-name="ReceivedUser" class="<?php echo $lab_test_result->ReceivedUser->headerCellClass() ?>"><div id="elh_lab_test_result_ReceivedUser" class="lab_test_result_ReceivedUser"><div class="ew-table-header-caption"><?php echo $lab_test_result->ReceivedUser->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReceivedUser" class="<?php echo $lab_test_result->ReceivedUser->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_result->SortUrl($lab_test_result->ReceivedUser) ?>',1);"><div id="elh_lab_test_result_ReceivedUser" class="lab_test_result_ReceivedUser">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result->ReceivedUser->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result->ReceivedUser->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_result->ReceivedUser->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result->DeptRecvDate->Visible) { // DeptRecvDate ?>
	<?php if ($lab_test_result->sortUrl($lab_test_result->DeptRecvDate) == "") { ?>
		<th data-name="DeptRecvDate" class="<?php echo $lab_test_result->DeptRecvDate->headerCellClass() ?>"><div id="elh_lab_test_result_DeptRecvDate" class="lab_test_result_DeptRecvDate"><div class="ew-table-header-caption"><?php echo $lab_test_result->DeptRecvDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DeptRecvDate" class="<?php echo $lab_test_result->DeptRecvDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_result->SortUrl($lab_test_result->DeptRecvDate) ?>',1);"><div id="elh_lab_test_result_DeptRecvDate" class="lab_test_result_DeptRecvDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result->DeptRecvDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result->DeptRecvDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_result->DeptRecvDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result->DeptRecvUser->Visible) { // DeptRecvUser ?>
	<?php if ($lab_test_result->sortUrl($lab_test_result->DeptRecvUser) == "") { ?>
		<th data-name="DeptRecvUser" class="<?php echo $lab_test_result->DeptRecvUser->headerCellClass() ?>"><div id="elh_lab_test_result_DeptRecvUser" class="lab_test_result_DeptRecvUser"><div class="ew-table-header-caption"><?php echo $lab_test_result->DeptRecvUser->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DeptRecvUser" class="<?php echo $lab_test_result->DeptRecvUser->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_result->SortUrl($lab_test_result->DeptRecvUser) ?>',1);"><div id="elh_lab_test_result_DeptRecvUser" class="lab_test_result_DeptRecvUser">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result->DeptRecvUser->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result->DeptRecvUser->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_result->DeptRecvUser->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result->PrintBy->Visible) { // PrintBy ?>
	<?php if ($lab_test_result->sortUrl($lab_test_result->PrintBy) == "") { ?>
		<th data-name="PrintBy" class="<?php echo $lab_test_result->PrintBy->headerCellClass() ?>"><div id="elh_lab_test_result_PrintBy" class="lab_test_result_PrintBy"><div class="ew-table-header-caption"><?php echo $lab_test_result->PrintBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrintBy" class="<?php echo $lab_test_result->PrintBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_result->SortUrl($lab_test_result->PrintBy) ?>',1);"><div id="elh_lab_test_result_PrintBy" class="lab_test_result_PrintBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result->PrintBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result->PrintBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_result->PrintBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result->PrintDate->Visible) { // PrintDate ?>
	<?php if ($lab_test_result->sortUrl($lab_test_result->PrintDate) == "") { ?>
		<th data-name="PrintDate" class="<?php echo $lab_test_result->PrintDate->headerCellClass() ?>"><div id="elh_lab_test_result_PrintDate" class="lab_test_result_PrintDate"><div class="ew-table-header-caption"><?php echo $lab_test_result->PrintDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrintDate" class="<?php echo $lab_test_result->PrintDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_result->SortUrl($lab_test_result->PrintDate) ?>',1);"><div id="elh_lab_test_result_PrintDate" class="lab_test_result_PrintDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result->PrintDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result->PrintDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_result->PrintDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result->MachineCD->Visible) { // MachineCD ?>
	<?php if ($lab_test_result->sortUrl($lab_test_result->MachineCD) == "") { ?>
		<th data-name="MachineCD" class="<?php echo $lab_test_result->MachineCD->headerCellClass() ?>"><div id="elh_lab_test_result_MachineCD" class="lab_test_result_MachineCD"><div class="ew-table-header-caption"><?php echo $lab_test_result->MachineCD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MachineCD" class="<?php echo $lab_test_result->MachineCD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_result->SortUrl($lab_test_result->MachineCD) ?>',1);"><div id="elh_lab_test_result_MachineCD" class="lab_test_result_MachineCD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result->MachineCD->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result->MachineCD->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_result->MachineCD->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result->TestCancel->Visible) { // TestCancel ?>
	<?php if ($lab_test_result->sortUrl($lab_test_result->TestCancel) == "") { ?>
		<th data-name="TestCancel" class="<?php echo $lab_test_result->TestCancel->headerCellClass() ?>"><div id="elh_lab_test_result_TestCancel" class="lab_test_result_TestCancel"><div class="ew-table-header-caption"><?php echo $lab_test_result->TestCancel->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestCancel" class="<?php echo $lab_test_result->TestCancel->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_result->SortUrl($lab_test_result->TestCancel) ?>',1);"><div id="elh_lab_test_result_TestCancel" class="lab_test_result_TestCancel">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result->TestCancel->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result->TestCancel->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_result->TestCancel->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result->OutSource->Visible) { // OutSource ?>
	<?php if ($lab_test_result->sortUrl($lab_test_result->OutSource) == "") { ?>
		<th data-name="OutSource" class="<?php echo $lab_test_result->OutSource->headerCellClass() ?>"><div id="elh_lab_test_result_OutSource" class="lab_test_result_OutSource"><div class="ew-table-header-caption"><?php echo $lab_test_result->OutSource->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OutSource" class="<?php echo $lab_test_result->OutSource->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_result->SortUrl($lab_test_result->OutSource) ?>',1);"><div id="elh_lab_test_result_OutSource" class="lab_test_result_OutSource">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result->OutSource->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result->OutSource->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_result->OutSource->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result->Tariff->Visible) { // Tariff ?>
	<?php if ($lab_test_result->sortUrl($lab_test_result->Tariff) == "") { ?>
		<th data-name="Tariff" class="<?php echo $lab_test_result->Tariff->headerCellClass() ?>"><div id="elh_lab_test_result_Tariff" class="lab_test_result_Tariff"><div class="ew-table-header-caption"><?php echo $lab_test_result->Tariff->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tariff" class="<?php echo $lab_test_result->Tariff->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_result->SortUrl($lab_test_result->Tariff) ?>',1);"><div id="elh_lab_test_result_Tariff" class="lab_test_result_Tariff">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result->Tariff->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result->Tariff->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_result->Tariff->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result->EDITDATE->Visible) { // EDITDATE ?>
	<?php if ($lab_test_result->sortUrl($lab_test_result->EDITDATE) == "") { ?>
		<th data-name="EDITDATE" class="<?php echo $lab_test_result->EDITDATE->headerCellClass() ?>"><div id="elh_lab_test_result_EDITDATE" class="lab_test_result_EDITDATE"><div class="ew-table-header-caption"><?php echo $lab_test_result->EDITDATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EDITDATE" class="<?php echo $lab_test_result->EDITDATE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_result->SortUrl($lab_test_result->EDITDATE) ?>',1);"><div id="elh_lab_test_result_EDITDATE" class="lab_test_result_EDITDATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result->EDITDATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result->EDITDATE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_result->EDITDATE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result->UPLOAD->Visible) { // UPLOAD ?>
	<?php if ($lab_test_result->sortUrl($lab_test_result->UPLOAD) == "") { ?>
		<th data-name="UPLOAD" class="<?php echo $lab_test_result->UPLOAD->headerCellClass() ?>"><div id="elh_lab_test_result_UPLOAD" class="lab_test_result_UPLOAD"><div class="ew-table-header-caption"><?php echo $lab_test_result->UPLOAD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UPLOAD" class="<?php echo $lab_test_result->UPLOAD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_result->SortUrl($lab_test_result->UPLOAD) ?>',1);"><div id="elh_lab_test_result_UPLOAD" class="lab_test_result_UPLOAD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result->UPLOAD->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result->UPLOAD->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_result->UPLOAD->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result->SAuthDate->Visible) { // SAuthDate ?>
	<?php if ($lab_test_result->sortUrl($lab_test_result->SAuthDate) == "") { ?>
		<th data-name="SAuthDate" class="<?php echo $lab_test_result->SAuthDate->headerCellClass() ?>"><div id="elh_lab_test_result_SAuthDate" class="lab_test_result_SAuthDate"><div class="ew-table-header-caption"><?php echo $lab_test_result->SAuthDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SAuthDate" class="<?php echo $lab_test_result->SAuthDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_result->SortUrl($lab_test_result->SAuthDate) ?>',1);"><div id="elh_lab_test_result_SAuthDate" class="lab_test_result_SAuthDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result->SAuthDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result->SAuthDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_result->SAuthDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result->SAuthBy->Visible) { // SAuthBy ?>
	<?php if ($lab_test_result->sortUrl($lab_test_result->SAuthBy) == "") { ?>
		<th data-name="SAuthBy" class="<?php echo $lab_test_result->SAuthBy->headerCellClass() ?>"><div id="elh_lab_test_result_SAuthBy" class="lab_test_result_SAuthBy"><div class="ew-table-header-caption"><?php echo $lab_test_result->SAuthBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SAuthBy" class="<?php echo $lab_test_result->SAuthBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_result->SortUrl($lab_test_result->SAuthBy) ?>',1);"><div id="elh_lab_test_result_SAuthBy" class="lab_test_result_SAuthBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result->SAuthBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result->SAuthBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_result->SAuthBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result->NoRC->Visible) { // NoRC ?>
	<?php if ($lab_test_result->sortUrl($lab_test_result->NoRC) == "") { ?>
		<th data-name="NoRC" class="<?php echo $lab_test_result->NoRC->headerCellClass() ?>"><div id="elh_lab_test_result_NoRC" class="lab_test_result_NoRC"><div class="ew-table-header-caption"><?php echo $lab_test_result->NoRC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoRC" class="<?php echo $lab_test_result->NoRC->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_result->SortUrl($lab_test_result->NoRC) ?>',1);"><div id="elh_lab_test_result_NoRC" class="lab_test_result_NoRC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result->NoRC->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result->NoRC->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_result->NoRC->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result->DispDt->Visible) { // DispDt ?>
	<?php if ($lab_test_result->sortUrl($lab_test_result->DispDt) == "") { ?>
		<th data-name="DispDt" class="<?php echo $lab_test_result->DispDt->headerCellClass() ?>"><div id="elh_lab_test_result_DispDt" class="lab_test_result_DispDt"><div class="ew-table-header-caption"><?php echo $lab_test_result->DispDt->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DispDt" class="<?php echo $lab_test_result->DispDt->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_result->SortUrl($lab_test_result->DispDt) ?>',1);"><div id="elh_lab_test_result_DispDt" class="lab_test_result_DispDt">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result->DispDt->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result->DispDt->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_result->DispDt->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result->DispUser->Visible) { // DispUser ?>
	<?php if ($lab_test_result->sortUrl($lab_test_result->DispUser) == "") { ?>
		<th data-name="DispUser" class="<?php echo $lab_test_result->DispUser->headerCellClass() ?>"><div id="elh_lab_test_result_DispUser" class="lab_test_result_DispUser"><div class="ew-table-header-caption"><?php echo $lab_test_result->DispUser->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DispUser" class="<?php echo $lab_test_result->DispUser->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_result->SortUrl($lab_test_result->DispUser) ?>',1);"><div id="elh_lab_test_result_DispUser" class="lab_test_result_DispUser">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result->DispUser->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result->DispUser->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_result->DispUser->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result->DispRemarks->Visible) { // DispRemarks ?>
	<?php if ($lab_test_result->sortUrl($lab_test_result->DispRemarks) == "") { ?>
		<th data-name="DispRemarks" class="<?php echo $lab_test_result->DispRemarks->headerCellClass() ?>"><div id="elh_lab_test_result_DispRemarks" class="lab_test_result_DispRemarks"><div class="ew-table-header-caption"><?php echo $lab_test_result->DispRemarks->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DispRemarks" class="<?php echo $lab_test_result->DispRemarks->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_result->SortUrl($lab_test_result->DispRemarks) ?>',1);"><div id="elh_lab_test_result_DispRemarks" class="lab_test_result_DispRemarks">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result->DispRemarks->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result->DispRemarks->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_result->DispRemarks->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result->DispMode->Visible) { // DispMode ?>
	<?php if ($lab_test_result->sortUrl($lab_test_result->DispMode) == "") { ?>
		<th data-name="DispMode" class="<?php echo $lab_test_result->DispMode->headerCellClass() ?>"><div id="elh_lab_test_result_DispMode" class="lab_test_result_DispMode"><div class="ew-table-header-caption"><?php echo $lab_test_result->DispMode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DispMode" class="<?php echo $lab_test_result->DispMode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_result->SortUrl($lab_test_result->DispMode) ?>',1);"><div id="elh_lab_test_result_DispMode" class="lab_test_result_DispMode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result->DispMode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result->DispMode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_result->DispMode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result->ProductCD->Visible) { // ProductCD ?>
	<?php if ($lab_test_result->sortUrl($lab_test_result->ProductCD) == "") { ?>
		<th data-name="ProductCD" class="<?php echo $lab_test_result->ProductCD->headerCellClass() ?>"><div id="elh_lab_test_result_ProductCD" class="lab_test_result_ProductCD"><div class="ew-table-header-caption"><?php echo $lab_test_result->ProductCD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProductCD" class="<?php echo $lab_test_result->ProductCD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_result->SortUrl($lab_test_result->ProductCD) ?>',1);"><div id="elh_lab_test_result_ProductCD" class="lab_test_result_ProductCD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result->ProductCD->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result->ProductCD->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_result->ProductCD->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result->Nos->Visible) { // Nos ?>
	<?php if ($lab_test_result->sortUrl($lab_test_result->Nos) == "") { ?>
		<th data-name="Nos" class="<?php echo $lab_test_result->Nos->headerCellClass() ?>"><div id="elh_lab_test_result_Nos" class="lab_test_result_Nos"><div class="ew-table-header-caption"><?php echo $lab_test_result->Nos->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Nos" class="<?php echo $lab_test_result->Nos->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_result->SortUrl($lab_test_result->Nos) ?>',1);"><div id="elh_lab_test_result_Nos" class="lab_test_result_Nos">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result->Nos->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result->Nos->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_result->Nos->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result->WBCPath->Visible) { // WBCPath ?>
	<?php if ($lab_test_result->sortUrl($lab_test_result->WBCPath) == "") { ?>
		<th data-name="WBCPath" class="<?php echo $lab_test_result->WBCPath->headerCellClass() ?>"><div id="elh_lab_test_result_WBCPath" class="lab_test_result_WBCPath"><div class="ew-table-header-caption"><?php echo $lab_test_result->WBCPath->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="WBCPath" class="<?php echo $lab_test_result->WBCPath->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_result->SortUrl($lab_test_result->WBCPath) ?>',1);"><div id="elh_lab_test_result_WBCPath" class="lab_test_result_WBCPath">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result->WBCPath->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result->WBCPath->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_result->WBCPath->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result->RBCPath->Visible) { // RBCPath ?>
	<?php if ($lab_test_result->sortUrl($lab_test_result->RBCPath) == "") { ?>
		<th data-name="RBCPath" class="<?php echo $lab_test_result->RBCPath->headerCellClass() ?>"><div id="elh_lab_test_result_RBCPath" class="lab_test_result_RBCPath"><div class="ew-table-header-caption"><?php echo $lab_test_result->RBCPath->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RBCPath" class="<?php echo $lab_test_result->RBCPath->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_result->SortUrl($lab_test_result->RBCPath) ?>',1);"><div id="elh_lab_test_result_RBCPath" class="lab_test_result_RBCPath">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result->RBCPath->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result->RBCPath->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_result->RBCPath->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result->PTPath->Visible) { // PTPath ?>
	<?php if ($lab_test_result->sortUrl($lab_test_result->PTPath) == "") { ?>
		<th data-name="PTPath" class="<?php echo $lab_test_result->PTPath->headerCellClass() ?>"><div id="elh_lab_test_result_PTPath" class="lab_test_result_PTPath"><div class="ew-table-header-caption"><?php echo $lab_test_result->PTPath->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PTPath" class="<?php echo $lab_test_result->PTPath->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_result->SortUrl($lab_test_result->PTPath) ?>',1);"><div id="elh_lab_test_result_PTPath" class="lab_test_result_PTPath">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result->PTPath->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result->PTPath->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_result->PTPath->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result->ActualAmt->Visible) { // ActualAmt ?>
	<?php if ($lab_test_result->sortUrl($lab_test_result->ActualAmt) == "") { ?>
		<th data-name="ActualAmt" class="<?php echo $lab_test_result->ActualAmt->headerCellClass() ?>"><div id="elh_lab_test_result_ActualAmt" class="lab_test_result_ActualAmt"><div class="ew-table-header-caption"><?php echo $lab_test_result->ActualAmt->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ActualAmt" class="<?php echo $lab_test_result->ActualAmt->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_result->SortUrl($lab_test_result->ActualAmt) ?>',1);"><div id="elh_lab_test_result_ActualAmt" class="lab_test_result_ActualAmt">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result->ActualAmt->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result->ActualAmt->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_result->ActualAmt->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result->NoSign->Visible) { // NoSign ?>
	<?php if ($lab_test_result->sortUrl($lab_test_result->NoSign) == "") { ?>
		<th data-name="NoSign" class="<?php echo $lab_test_result->NoSign->headerCellClass() ?>"><div id="elh_lab_test_result_NoSign" class="lab_test_result_NoSign"><div class="ew-table-header-caption"><?php echo $lab_test_result->NoSign->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoSign" class="<?php echo $lab_test_result->NoSign->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_result->SortUrl($lab_test_result->NoSign) ?>',1);"><div id="elh_lab_test_result_NoSign" class="lab_test_result_NoSign">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result->NoSign->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result->NoSign->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_result->NoSign->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result->_Barcode->Visible) { // Barcode ?>
	<?php if ($lab_test_result->sortUrl($lab_test_result->_Barcode) == "") { ?>
		<th data-name="_Barcode" class="<?php echo $lab_test_result->_Barcode->headerCellClass() ?>"><div id="elh_lab_test_result__Barcode" class="lab_test_result__Barcode"><div class="ew-table-header-caption"><?php echo $lab_test_result->_Barcode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_Barcode" class="<?php echo $lab_test_result->_Barcode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_result->SortUrl($lab_test_result->_Barcode) ?>',1);"><div id="elh_lab_test_result__Barcode" class="lab_test_result__Barcode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result->_Barcode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result->_Barcode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_result->_Barcode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result->ReadTime->Visible) { // ReadTime ?>
	<?php if ($lab_test_result->sortUrl($lab_test_result->ReadTime) == "") { ?>
		<th data-name="ReadTime" class="<?php echo $lab_test_result->ReadTime->headerCellClass() ?>"><div id="elh_lab_test_result_ReadTime" class="lab_test_result_ReadTime"><div class="ew-table-header-caption"><?php echo $lab_test_result->ReadTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReadTime" class="<?php echo $lab_test_result->ReadTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_result->SortUrl($lab_test_result->ReadTime) ?>',1);"><div id="elh_lab_test_result_ReadTime" class="lab_test_result_ReadTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result->ReadTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result->ReadTime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_result->ReadTime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result->VailID->Visible) { // VailID ?>
	<?php if ($lab_test_result->sortUrl($lab_test_result->VailID) == "") { ?>
		<th data-name="VailID" class="<?php echo $lab_test_result->VailID->headerCellClass() ?>"><div id="elh_lab_test_result_VailID" class="lab_test_result_VailID"><div class="ew-table-header-caption"><?php echo $lab_test_result->VailID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="VailID" class="<?php echo $lab_test_result->VailID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_result->SortUrl($lab_test_result->VailID) ?>',1);"><div id="elh_lab_test_result_VailID" class="lab_test_result_VailID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result->VailID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result->VailID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_result->VailID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result->ReadMachine->Visible) { // ReadMachine ?>
	<?php if ($lab_test_result->sortUrl($lab_test_result->ReadMachine) == "") { ?>
		<th data-name="ReadMachine" class="<?php echo $lab_test_result->ReadMachine->headerCellClass() ?>"><div id="elh_lab_test_result_ReadMachine" class="lab_test_result_ReadMachine"><div class="ew-table-header-caption"><?php echo $lab_test_result->ReadMachine->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReadMachine" class="<?php echo $lab_test_result->ReadMachine->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_result->SortUrl($lab_test_result->ReadMachine) ?>',1);"><div id="elh_lab_test_result_ReadMachine" class="lab_test_result_ReadMachine">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result->ReadMachine->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result->ReadMachine->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_result->ReadMachine->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result->LabCD->Visible) { // LabCD ?>
	<?php if ($lab_test_result->sortUrl($lab_test_result->LabCD) == "") { ?>
		<th data-name="LabCD" class="<?php echo $lab_test_result->LabCD->headerCellClass() ?>"><div id="elh_lab_test_result_LabCD" class="lab_test_result_LabCD"><div class="ew-table-header-caption"><?php echo $lab_test_result->LabCD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LabCD" class="<?php echo $lab_test_result->LabCD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_result->SortUrl($lab_test_result->LabCD) ?>',1);"><div id="elh_lab_test_result_LabCD" class="lab_test_result_LabCD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result->LabCD->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result->LabCD->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_result->LabCD->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result->OutLabAmt->Visible) { // OutLabAmt ?>
	<?php if ($lab_test_result->sortUrl($lab_test_result->OutLabAmt) == "") { ?>
		<th data-name="OutLabAmt" class="<?php echo $lab_test_result->OutLabAmt->headerCellClass() ?>"><div id="elh_lab_test_result_OutLabAmt" class="lab_test_result_OutLabAmt"><div class="ew-table-header-caption"><?php echo $lab_test_result->OutLabAmt->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OutLabAmt" class="<?php echo $lab_test_result->OutLabAmt->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_result->SortUrl($lab_test_result->OutLabAmt) ?>',1);"><div id="elh_lab_test_result_OutLabAmt" class="lab_test_result_OutLabAmt">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result->OutLabAmt->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result->OutLabAmt->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_result->OutLabAmt->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result->ProductQty->Visible) { // ProductQty ?>
	<?php if ($lab_test_result->sortUrl($lab_test_result->ProductQty) == "") { ?>
		<th data-name="ProductQty" class="<?php echo $lab_test_result->ProductQty->headerCellClass() ?>"><div id="elh_lab_test_result_ProductQty" class="lab_test_result_ProductQty"><div class="ew-table-header-caption"><?php echo $lab_test_result->ProductQty->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProductQty" class="<?php echo $lab_test_result->ProductQty->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_result->SortUrl($lab_test_result->ProductQty) ?>',1);"><div id="elh_lab_test_result_ProductQty" class="lab_test_result_ProductQty">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result->ProductQty->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result->ProductQty->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_result->ProductQty->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result->Repeat->Visible) { // Repeat ?>
	<?php if ($lab_test_result->sortUrl($lab_test_result->Repeat) == "") { ?>
		<th data-name="Repeat" class="<?php echo $lab_test_result->Repeat->headerCellClass() ?>"><div id="elh_lab_test_result_Repeat" class="lab_test_result_Repeat"><div class="ew-table-header-caption"><?php echo $lab_test_result->Repeat->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Repeat" class="<?php echo $lab_test_result->Repeat->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_result->SortUrl($lab_test_result->Repeat) ?>',1);"><div id="elh_lab_test_result_Repeat" class="lab_test_result_Repeat">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result->Repeat->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result->Repeat->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_result->Repeat->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result->DeptNo->Visible) { // DeptNo ?>
	<?php if ($lab_test_result->sortUrl($lab_test_result->DeptNo) == "") { ?>
		<th data-name="DeptNo" class="<?php echo $lab_test_result->DeptNo->headerCellClass() ?>"><div id="elh_lab_test_result_DeptNo" class="lab_test_result_DeptNo"><div class="ew-table-header-caption"><?php echo $lab_test_result->DeptNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DeptNo" class="<?php echo $lab_test_result->DeptNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_result->SortUrl($lab_test_result->DeptNo) ?>',1);"><div id="elh_lab_test_result_DeptNo" class="lab_test_result_DeptNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result->DeptNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result->DeptNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_result->DeptNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result->Desc1->Visible) { // Desc1 ?>
	<?php if ($lab_test_result->sortUrl($lab_test_result->Desc1) == "") { ?>
		<th data-name="Desc1" class="<?php echo $lab_test_result->Desc1->headerCellClass() ?>"><div id="elh_lab_test_result_Desc1" class="lab_test_result_Desc1"><div class="ew-table-header-caption"><?php echo $lab_test_result->Desc1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Desc1" class="<?php echo $lab_test_result->Desc1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_result->SortUrl($lab_test_result->Desc1) ?>',1);"><div id="elh_lab_test_result_Desc1" class="lab_test_result_Desc1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result->Desc1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result->Desc1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_result->Desc1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result->Desc2->Visible) { // Desc2 ?>
	<?php if ($lab_test_result->sortUrl($lab_test_result->Desc2) == "") { ?>
		<th data-name="Desc2" class="<?php echo $lab_test_result->Desc2->headerCellClass() ?>"><div id="elh_lab_test_result_Desc2" class="lab_test_result_Desc2"><div class="ew-table-header-caption"><?php echo $lab_test_result->Desc2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Desc2" class="<?php echo $lab_test_result->Desc2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_result->SortUrl($lab_test_result->Desc2) ?>',1);"><div id="elh_lab_test_result_Desc2" class="lab_test_result_Desc2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result->Desc2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result->Desc2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_result->Desc2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result->RptResult->Visible) { // RptResult ?>
	<?php if ($lab_test_result->sortUrl($lab_test_result->RptResult) == "") { ?>
		<th data-name="RptResult" class="<?php echo $lab_test_result->RptResult->headerCellClass() ?>"><div id="elh_lab_test_result_RptResult" class="lab_test_result_RptResult"><div class="ew-table-header-caption"><?php echo $lab_test_result->RptResult->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RptResult" class="<?php echo $lab_test_result->RptResult->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $lab_test_result->SortUrl($lab_test_result->RptResult) ?>',1);"><div id="elh_lab_test_result_RptResult" class="lab_test_result_RptResult">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result->RptResult->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result->RptResult->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($lab_test_result->RptResult->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$lab_test_result_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($lab_test_result->ExportAll && $lab_test_result->isExport()) {
	$lab_test_result_list->StopRec = $lab_test_result_list->TotalRecs;
} else {

	// Set the last record to display
	if ($lab_test_result_list->TotalRecs > $lab_test_result_list->StartRec + $lab_test_result_list->DisplayRecs - 1)
		$lab_test_result_list->StopRec = $lab_test_result_list->StartRec + $lab_test_result_list->DisplayRecs - 1;
	else
		$lab_test_result_list->StopRec = $lab_test_result_list->TotalRecs;
}

// Restore number of post back records
if ($CurrentForm && $lab_test_result_list->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($lab_test_result_list->FormKeyCountName) && ($lab_test_result->isGridAdd() || $lab_test_result->isGridEdit() || $lab_test_result->isConfirm())) {
		$lab_test_result_list->KeyCount = $CurrentForm->getValue($lab_test_result_list->FormKeyCountName);
		$lab_test_result_list->StopRec = $lab_test_result_list->StartRec + $lab_test_result_list->KeyCount - 1;
	}
}
$lab_test_result_list->RecCnt = $lab_test_result_list->StartRec - 1;
if ($lab_test_result_list->Recordset && !$lab_test_result_list->Recordset->EOF) {
	$lab_test_result_list->Recordset->moveFirst();
	$selectLimit = $lab_test_result_list->UseSelectLimit;
	if (!$selectLimit && $lab_test_result_list->StartRec > 1)
		$lab_test_result_list->Recordset->move($lab_test_result_list->StartRec - 1);
} elseif (!$lab_test_result->AllowAddDeleteRow && $lab_test_result_list->StopRec == 0) {
	$lab_test_result_list->StopRec = $lab_test_result->GridAddRowCount;
}

// Initialize aggregate
$lab_test_result->RowType = ROWTYPE_AGGREGATEINIT;
$lab_test_result->resetAttributes();
$lab_test_result_list->renderRow();
if ($lab_test_result->isGridAdd())
	$lab_test_result_list->RowIndex = 0;
while ($lab_test_result_list->RecCnt < $lab_test_result_list->StopRec) {
	$lab_test_result_list->RecCnt++;
	if ($lab_test_result_list->RecCnt >= $lab_test_result_list->StartRec) {
		$lab_test_result_list->RowCnt++;
		if ($lab_test_result->isGridAdd() || $lab_test_result->isGridEdit() || $lab_test_result->isConfirm()) {
			$lab_test_result_list->RowIndex++;
			$CurrentForm->Index = $lab_test_result_list->RowIndex;
			if ($CurrentForm->hasValue($lab_test_result_list->FormActionName) && $lab_test_result_list->EventCancelled)
				$lab_test_result_list->RowAction = strval($CurrentForm->getValue($lab_test_result_list->FormActionName));
			elseif ($lab_test_result->isGridAdd())
				$lab_test_result_list->RowAction = "insert";
			else
				$lab_test_result_list->RowAction = "";
		}

		// Set up key count
		$lab_test_result_list->KeyCount = $lab_test_result_list->RowIndex;

		// Init row class and style
		$lab_test_result->resetAttributes();
		$lab_test_result->CssClass = "";
		if ($lab_test_result->isGridAdd()) {
			$lab_test_result_list->loadRowValues(); // Load default values
		} else {
			$lab_test_result_list->loadRowValues($lab_test_result_list->Recordset); // Load row values
		}
		$lab_test_result->RowType = ROWTYPE_VIEW; // Render view
		if ($lab_test_result->isGridAdd()) // Grid add
			$lab_test_result->RowType = ROWTYPE_ADD; // Render add
		if ($lab_test_result->isGridAdd() && $lab_test_result->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$lab_test_result_list->restoreCurrentRowFormValues($lab_test_result_list->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$lab_test_result->RowAttrs = array_merge($lab_test_result->RowAttrs, array('data-rowindex'=>$lab_test_result_list->RowCnt, 'id'=>'r' . $lab_test_result_list->RowCnt . '_lab_test_result', 'data-rowtype'=>$lab_test_result->RowType));

		// Render row
		$lab_test_result_list->renderRow();

		// Render list options
		$lab_test_result_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($lab_test_result_list->RowAction <> "delete" && $lab_test_result_list->RowAction <> "insertdelete" && !($lab_test_result_list->RowAction == "insert" && $lab_test_result->isConfirm() && $lab_test_result_list->emptyRow())) {
?>
	<tr<?php echo $lab_test_result->rowAttributes() ?>>
<?php

// Render list options (body, left)
$lab_test_result_list->ListOptions->render("body", "left", $lab_test_result_list->RowCnt);
?>
	<?php if ($lab_test_result->Branch->Visible) { // Branch ?>
		<td data-name="Branch"<?php echo $lab_test_result->Branch->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_Branch" class="form-group lab_test_result_Branch">
<input type="text" data-table="lab_test_result" data-field="x_Branch" name="x<?php echo $lab_test_result_list->RowIndex ?>_Branch" id="x<?php echo $lab_test_result_list->RowIndex ?>_Branch" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($lab_test_result->Branch->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->Branch->EditValue ?>"<?php echo $lab_test_result->Branch->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Branch" name="o<?php echo $lab_test_result_list->RowIndex ?>_Branch" id="o<?php echo $lab_test_result_list->RowIndex ?>_Branch" value="<?php echo HtmlEncode($lab_test_result->Branch->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_Branch" class="lab_test_result_Branch">
<span<?php echo $lab_test_result->Branch->viewAttributes() ?>>
<?php echo $lab_test_result->Branch->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result->SidNo->Visible) { // SidNo ?>
		<td data-name="SidNo"<?php echo $lab_test_result->SidNo->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_SidNo" class="form-group lab_test_result_SidNo">
<input type="text" data-table="lab_test_result" data-field="x_SidNo" name="x<?php echo $lab_test_result_list->RowIndex ?>_SidNo" id="x<?php echo $lab_test_result_list->RowIndex ?>_SidNo" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($lab_test_result->SidNo->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->SidNo->EditValue ?>"<?php echo $lab_test_result->SidNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_SidNo" name="o<?php echo $lab_test_result_list->RowIndex ?>_SidNo" id="o<?php echo $lab_test_result_list->RowIndex ?>_SidNo" value="<?php echo HtmlEncode($lab_test_result->SidNo->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_SidNo" class="lab_test_result_SidNo">
<span<?php echo $lab_test_result->SidNo->viewAttributes() ?>>
<?php echo $lab_test_result->SidNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result->SidDate->Visible) { // SidDate ?>
		<td data-name="SidDate"<?php echo $lab_test_result->SidDate->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_SidDate" class="form-group lab_test_result_SidDate">
<input type="text" data-table="lab_test_result" data-field="x_SidDate" name="x<?php echo $lab_test_result_list->RowIndex ?>_SidDate" id="x<?php echo $lab_test_result_list->RowIndex ?>_SidDate" placeholder="<?php echo HtmlEncode($lab_test_result->SidDate->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->SidDate->EditValue ?>"<?php echo $lab_test_result->SidDate->editAttributes() ?>>
<?php if (!$lab_test_result->SidDate->ReadOnly && !$lab_test_result->SidDate->Disabled && !isset($lab_test_result->SidDate->EditAttrs["readonly"]) && !isset($lab_test_result->SidDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("flab_test_resultlist", "x<?php echo $lab_test_result_list->RowIndex ?>_SidDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_SidDate" name="o<?php echo $lab_test_result_list->RowIndex ?>_SidDate" id="o<?php echo $lab_test_result_list->RowIndex ?>_SidDate" value="<?php echo HtmlEncode($lab_test_result->SidDate->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_SidDate" class="lab_test_result_SidDate">
<span<?php echo $lab_test_result->SidDate->viewAttributes() ?>>
<?php echo $lab_test_result->SidDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result->TestCd->Visible) { // TestCd ?>
		<td data-name="TestCd"<?php echo $lab_test_result->TestCd->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_TestCd" class="form-group lab_test_result_TestCd">
<input type="text" data-table="lab_test_result" data-field="x_TestCd" name="x<?php echo $lab_test_result_list->RowIndex ?>_TestCd" id="x<?php echo $lab_test_result_list->RowIndex ?>_TestCd" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($lab_test_result->TestCd->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->TestCd->EditValue ?>"<?php echo $lab_test_result->TestCd->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_TestCd" name="o<?php echo $lab_test_result_list->RowIndex ?>_TestCd" id="o<?php echo $lab_test_result_list->RowIndex ?>_TestCd" value="<?php echo HtmlEncode($lab_test_result->TestCd->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_TestCd" class="lab_test_result_TestCd">
<span<?php echo $lab_test_result->TestCd->viewAttributes() ?>>
<?php echo $lab_test_result->TestCd->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result->TestSubCd->Visible) { // TestSubCd ?>
		<td data-name="TestSubCd"<?php echo $lab_test_result->TestSubCd->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_TestSubCd" class="form-group lab_test_result_TestSubCd">
<input type="text" data-table="lab_test_result" data-field="x_TestSubCd" name="x<?php echo $lab_test_result_list->RowIndex ?>_TestSubCd" id="x<?php echo $lab_test_result_list->RowIndex ?>_TestSubCd" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($lab_test_result->TestSubCd->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->TestSubCd->EditValue ?>"<?php echo $lab_test_result->TestSubCd->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_TestSubCd" name="o<?php echo $lab_test_result_list->RowIndex ?>_TestSubCd" id="o<?php echo $lab_test_result_list->RowIndex ?>_TestSubCd" value="<?php echo HtmlEncode($lab_test_result->TestSubCd->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_TestSubCd" class="lab_test_result_TestSubCd">
<span<?php echo $lab_test_result->TestSubCd->viewAttributes() ?>>
<?php echo $lab_test_result->TestSubCd->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result->DEptCd->Visible) { // DEptCd ?>
		<td data-name="DEptCd"<?php echo $lab_test_result->DEptCd->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_DEptCd" class="form-group lab_test_result_DEptCd">
<input type="text" data-table="lab_test_result" data-field="x_DEptCd" name="x<?php echo $lab_test_result_list->RowIndex ?>_DEptCd" id="x<?php echo $lab_test_result_list->RowIndex ?>_DEptCd" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($lab_test_result->DEptCd->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->DEptCd->EditValue ?>"<?php echo $lab_test_result->DEptCd->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_DEptCd" name="o<?php echo $lab_test_result_list->RowIndex ?>_DEptCd" id="o<?php echo $lab_test_result_list->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($lab_test_result->DEptCd->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_DEptCd" class="lab_test_result_DEptCd">
<span<?php echo $lab_test_result->DEptCd->viewAttributes() ?>>
<?php echo $lab_test_result->DEptCd->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result->ProfCd->Visible) { // ProfCd ?>
		<td data-name="ProfCd"<?php echo $lab_test_result->ProfCd->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_ProfCd" class="form-group lab_test_result_ProfCd">
<input type="text" data-table="lab_test_result" data-field="x_ProfCd" name="x<?php echo $lab_test_result_list->RowIndex ?>_ProfCd" id="x<?php echo $lab_test_result_list->RowIndex ?>_ProfCd" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($lab_test_result->ProfCd->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->ProfCd->EditValue ?>"<?php echo $lab_test_result->ProfCd->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_ProfCd" name="o<?php echo $lab_test_result_list->RowIndex ?>_ProfCd" id="o<?php echo $lab_test_result_list->RowIndex ?>_ProfCd" value="<?php echo HtmlEncode($lab_test_result->ProfCd->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_ProfCd" class="lab_test_result_ProfCd">
<span<?php echo $lab_test_result->ProfCd->viewAttributes() ?>>
<?php echo $lab_test_result->ProfCd->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result->ResultDate->Visible) { // ResultDate ?>
		<td data-name="ResultDate"<?php echo $lab_test_result->ResultDate->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_ResultDate" class="form-group lab_test_result_ResultDate">
<input type="text" data-table="lab_test_result" data-field="x_ResultDate" name="x<?php echo $lab_test_result_list->RowIndex ?>_ResultDate" id="x<?php echo $lab_test_result_list->RowIndex ?>_ResultDate" placeholder="<?php echo HtmlEncode($lab_test_result->ResultDate->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->ResultDate->EditValue ?>"<?php echo $lab_test_result->ResultDate->editAttributes() ?>>
<?php if (!$lab_test_result->ResultDate->ReadOnly && !$lab_test_result->ResultDate->Disabled && !isset($lab_test_result->ResultDate->EditAttrs["readonly"]) && !isset($lab_test_result->ResultDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("flab_test_resultlist", "x<?php echo $lab_test_result_list->RowIndex ?>_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_ResultDate" name="o<?php echo $lab_test_result_list->RowIndex ?>_ResultDate" id="o<?php echo $lab_test_result_list->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($lab_test_result->ResultDate->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_ResultDate" class="lab_test_result_ResultDate">
<span<?php echo $lab_test_result->ResultDate->viewAttributes() ?>>
<?php echo $lab_test_result->ResultDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result->Method->Visible) { // Method ?>
		<td data-name="Method"<?php echo $lab_test_result->Method->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_Method" class="form-group lab_test_result_Method">
<input type="text" data-table="lab_test_result" data-field="x_Method" name="x<?php echo $lab_test_result_list->RowIndex ?>_Method" id="x<?php echo $lab_test_result_list->RowIndex ?>_Method" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($lab_test_result->Method->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->Method->EditValue ?>"<?php echo $lab_test_result->Method->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Method" name="o<?php echo $lab_test_result_list->RowIndex ?>_Method" id="o<?php echo $lab_test_result_list->RowIndex ?>_Method" value="<?php echo HtmlEncode($lab_test_result->Method->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_Method" class="lab_test_result_Method">
<span<?php echo $lab_test_result->Method->viewAttributes() ?>>
<?php echo $lab_test_result->Method->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result->Specimen->Visible) { // Specimen ?>
		<td data-name="Specimen"<?php echo $lab_test_result->Specimen->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_Specimen" class="form-group lab_test_result_Specimen">
<input type="text" data-table="lab_test_result" data-field="x_Specimen" name="x<?php echo $lab_test_result_list->RowIndex ?>_Specimen" id="x<?php echo $lab_test_result_list->RowIndex ?>_Specimen" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($lab_test_result->Specimen->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->Specimen->EditValue ?>"<?php echo $lab_test_result->Specimen->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Specimen" name="o<?php echo $lab_test_result_list->RowIndex ?>_Specimen" id="o<?php echo $lab_test_result_list->RowIndex ?>_Specimen" value="<?php echo HtmlEncode($lab_test_result->Specimen->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_Specimen" class="lab_test_result_Specimen">
<span<?php echo $lab_test_result->Specimen->viewAttributes() ?>>
<?php echo $lab_test_result->Specimen->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result->Amount->Visible) { // Amount ?>
		<td data-name="Amount"<?php echo $lab_test_result->Amount->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_Amount" class="form-group lab_test_result_Amount">
<input type="text" data-table="lab_test_result" data-field="x_Amount" name="x<?php echo $lab_test_result_list->RowIndex ?>_Amount" id="x<?php echo $lab_test_result_list->RowIndex ?>_Amount" size="30" placeholder="<?php echo HtmlEncode($lab_test_result->Amount->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->Amount->EditValue ?>"<?php echo $lab_test_result->Amount->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Amount" name="o<?php echo $lab_test_result_list->RowIndex ?>_Amount" id="o<?php echo $lab_test_result_list->RowIndex ?>_Amount" value="<?php echo HtmlEncode($lab_test_result->Amount->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_Amount" class="lab_test_result_Amount">
<span<?php echo $lab_test_result->Amount->viewAttributes() ?>>
<?php echo $lab_test_result->Amount->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result->ResultBy->Visible) { // ResultBy ?>
		<td data-name="ResultBy"<?php echo $lab_test_result->ResultBy->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_ResultBy" class="form-group lab_test_result_ResultBy">
<input type="text" data-table="lab_test_result" data-field="x_ResultBy" name="x<?php echo $lab_test_result_list->RowIndex ?>_ResultBy" id="x<?php echo $lab_test_result_list->RowIndex ?>_ResultBy" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($lab_test_result->ResultBy->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->ResultBy->EditValue ?>"<?php echo $lab_test_result->ResultBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_ResultBy" name="o<?php echo $lab_test_result_list->RowIndex ?>_ResultBy" id="o<?php echo $lab_test_result_list->RowIndex ?>_ResultBy" value="<?php echo HtmlEncode($lab_test_result->ResultBy->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_ResultBy" class="lab_test_result_ResultBy">
<span<?php echo $lab_test_result->ResultBy->viewAttributes() ?>>
<?php echo $lab_test_result->ResultBy->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result->AuthBy->Visible) { // AuthBy ?>
		<td data-name="AuthBy"<?php echo $lab_test_result->AuthBy->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_AuthBy" class="form-group lab_test_result_AuthBy">
<input type="text" data-table="lab_test_result" data-field="x_AuthBy" name="x<?php echo $lab_test_result_list->RowIndex ?>_AuthBy" id="x<?php echo $lab_test_result_list->RowIndex ?>_AuthBy" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($lab_test_result->AuthBy->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->AuthBy->EditValue ?>"<?php echo $lab_test_result->AuthBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_AuthBy" name="o<?php echo $lab_test_result_list->RowIndex ?>_AuthBy" id="o<?php echo $lab_test_result_list->RowIndex ?>_AuthBy" value="<?php echo HtmlEncode($lab_test_result->AuthBy->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_AuthBy" class="lab_test_result_AuthBy">
<span<?php echo $lab_test_result->AuthBy->viewAttributes() ?>>
<?php echo $lab_test_result->AuthBy->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result->AuthDate->Visible) { // AuthDate ?>
		<td data-name="AuthDate"<?php echo $lab_test_result->AuthDate->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_AuthDate" class="form-group lab_test_result_AuthDate">
<input type="text" data-table="lab_test_result" data-field="x_AuthDate" name="x<?php echo $lab_test_result_list->RowIndex ?>_AuthDate" id="x<?php echo $lab_test_result_list->RowIndex ?>_AuthDate" placeholder="<?php echo HtmlEncode($lab_test_result->AuthDate->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->AuthDate->EditValue ?>"<?php echo $lab_test_result->AuthDate->editAttributes() ?>>
<?php if (!$lab_test_result->AuthDate->ReadOnly && !$lab_test_result->AuthDate->Disabled && !isset($lab_test_result->AuthDate->EditAttrs["readonly"]) && !isset($lab_test_result->AuthDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("flab_test_resultlist", "x<?php echo $lab_test_result_list->RowIndex ?>_AuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_AuthDate" name="o<?php echo $lab_test_result_list->RowIndex ?>_AuthDate" id="o<?php echo $lab_test_result_list->RowIndex ?>_AuthDate" value="<?php echo HtmlEncode($lab_test_result->AuthDate->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_AuthDate" class="lab_test_result_AuthDate">
<span<?php echo $lab_test_result->AuthDate->viewAttributes() ?>>
<?php echo $lab_test_result->AuthDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result->Abnormal->Visible) { // Abnormal ?>
		<td data-name="Abnormal"<?php echo $lab_test_result->Abnormal->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_Abnormal" class="form-group lab_test_result_Abnormal">
<input type="text" data-table="lab_test_result" data-field="x_Abnormal" name="x<?php echo $lab_test_result_list->RowIndex ?>_Abnormal" id="x<?php echo $lab_test_result_list->RowIndex ?>_Abnormal" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result->Abnormal->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->Abnormal->EditValue ?>"<?php echo $lab_test_result->Abnormal->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Abnormal" name="o<?php echo $lab_test_result_list->RowIndex ?>_Abnormal" id="o<?php echo $lab_test_result_list->RowIndex ?>_Abnormal" value="<?php echo HtmlEncode($lab_test_result->Abnormal->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_Abnormal" class="lab_test_result_Abnormal">
<span<?php echo $lab_test_result->Abnormal->viewAttributes() ?>>
<?php echo $lab_test_result->Abnormal->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result->Printed->Visible) { // Printed ?>
		<td data-name="Printed"<?php echo $lab_test_result->Printed->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_Printed" class="form-group lab_test_result_Printed">
<input type="text" data-table="lab_test_result" data-field="x_Printed" name="x<?php echo $lab_test_result_list->RowIndex ?>_Printed" id="x<?php echo $lab_test_result_list->RowIndex ?>_Printed" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result->Printed->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->Printed->EditValue ?>"<?php echo $lab_test_result->Printed->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Printed" name="o<?php echo $lab_test_result_list->RowIndex ?>_Printed" id="o<?php echo $lab_test_result_list->RowIndex ?>_Printed" value="<?php echo HtmlEncode($lab_test_result->Printed->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_Printed" class="lab_test_result_Printed">
<span<?php echo $lab_test_result->Printed->viewAttributes() ?>>
<?php echo $lab_test_result->Printed->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result->Dispatch->Visible) { // Dispatch ?>
		<td data-name="Dispatch"<?php echo $lab_test_result->Dispatch->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_Dispatch" class="form-group lab_test_result_Dispatch">
<input type="text" data-table="lab_test_result" data-field="x_Dispatch" name="x<?php echo $lab_test_result_list->RowIndex ?>_Dispatch" id="x<?php echo $lab_test_result_list->RowIndex ?>_Dispatch" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result->Dispatch->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->Dispatch->EditValue ?>"<?php echo $lab_test_result->Dispatch->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Dispatch" name="o<?php echo $lab_test_result_list->RowIndex ?>_Dispatch" id="o<?php echo $lab_test_result_list->RowIndex ?>_Dispatch" value="<?php echo HtmlEncode($lab_test_result->Dispatch->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_Dispatch" class="lab_test_result_Dispatch">
<span<?php echo $lab_test_result->Dispatch->viewAttributes() ?>>
<?php echo $lab_test_result->Dispatch->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result->LOWHIGH->Visible) { // LOWHIGH ?>
		<td data-name="LOWHIGH"<?php echo $lab_test_result->LOWHIGH->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_LOWHIGH" class="form-group lab_test_result_LOWHIGH">
<input type="text" data-table="lab_test_result" data-field="x_LOWHIGH" name="x<?php echo $lab_test_result_list->RowIndex ?>_LOWHIGH" id="x<?php echo $lab_test_result_list->RowIndex ?>_LOWHIGH" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result->LOWHIGH->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->LOWHIGH->EditValue ?>"<?php echo $lab_test_result->LOWHIGH->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_LOWHIGH" name="o<?php echo $lab_test_result_list->RowIndex ?>_LOWHIGH" id="o<?php echo $lab_test_result_list->RowIndex ?>_LOWHIGH" value="<?php echo HtmlEncode($lab_test_result->LOWHIGH->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_LOWHIGH" class="lab_test_result_LOWHIGH">
<span<?php echo $lab_test_result->LOWHIGH->viewAttributes() ?>>
<?php echo $lab_test_result->LOWHIGH->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result->Unit->Visible) { // Unit ?>
		<td data-name="Unit"<?php echo $lab_test_result->Unit->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_Unit" class="form-group lab_test_result_Unit">
<input type="text" data-table="lab_test_result" data-field="x_Unit" name="x<?php echo $lab_test_result_list->RowIndex ?>_Unit" id="x<?php echo $lab_test_result_list->RowIndex ?>_Unit" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($lab_test_result->Unit->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->Unit->EditValue ?>"<?php echo $lab_test_result->Unit->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Unit" name="o<?php echo $lab_test_result_list->RowIndex ?>_Unit" id="o<?php echo $lab_test_result_list->RowIndex ?>_Unit" value="<?php echo HtmlEncode($lab_test_result->Unit->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_Unit" class="lab_test_result_Unit">
<span<?php echo $lab_test_result->Unit->viewAttributes() ?>>
<?php echo $lab_test_result->Unit->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result->ResDate->Visible) { // ResDate ?>
		<td data-name="ResDate"<?php echo $lab_test_result->ResDate->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_ResDate" class="form-group lab_test_result_ResDate">
<input type="text" data-table="lab_test_result" data-field="x_ResDate" name="x<?php echo $lab_test_result_list->RowIndex ?>_ResDate" id="x<?php echo $lab_test_result_list->RowIndex ?>_ResDate" placeholder="<?php echo HtmlEncode($lab_test_result->ResDate->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->ResDate->EditValue ?>"<?php echo $lab_test_result->ResDate->editAttributes() ?>>
<?php if (!$lab_test_result->ResDate->ReadOnly && !$lab_test_result->ResDate->Disabled && !isset($lab_test_result->ResDate->EditAttrs["readonly"]) && !isset($lab_test_result->ResDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("flab_test_resultlist", "x<?php echo $lab_test_result_list->RowIndex ?>_ResDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_ResDate" name="o<?php echo $lab_test_result_list->RowIndex ?>_ResDate" id="o<?php echo $lab_test_result_list->RowIndex ?>_ResDate" value="<?php echo HtmlEncode($lab_test_result->ResDate->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_ResDate" class="lab_test_result_ResDate">
<span<?php echo $lab_test_result->ResDate->viewAttributes() ?>>
<?php echo $lab_test_result->ResDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result->Pic1->Visible) { // Pic1 ?>
		<td data-name="Pic1"<?php echo $lab_test_result->Pic1->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_Pic1" class="form-group lab_test_result_Pic1">
<input type="text" data-table="lab_test_result" data-field="x_Pic1" name="x<?php echo $lab_test_result_list->RowIndex ?>_Pic1" id="x<?php echo $lab_test_result_list->RowIndex ?>_Pic1" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($lab_test_result->Pic1->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->Pic1->EditValue ?>"<?php echo $lab_test_result->Pic1->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Pic1" name="o<?php echo $lab_test_result_list->RowIndex ?>_Pic1" id="o<?php echo $lab_test_result_list->RowIndex ?>_Pic1" value="<?php echo HtmlEncode($lab_test_result->Pic1->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_Pic1" class="lab_test_result_Pic1">
<span<?php echo $lab_test_result->Pic1->viewAttributes() ?>>
<?php echo $lab_test_result->Pic1->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result->Pic2->Visible) { // Pic2 ?>
		<td data-name="Pic2"<?php echo $lab_test_result->Pic2->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_Pic2" class="form-group lab_test_result_Pic2">
<input type="text" data-table="lab_test_result" data-field="x_Pic2" name="x<?php echo $lab_test_result_list->RowIndex ?>_Pic2" id="x<?php echo $lab_test_result_list->RowIndex ?>_Pic2" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($lab_test_result->Pic2->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->Pic2->EditValue ?>"<?php echo $lab_test_result->Pic2->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Pic2" name="o<?php echo $lab_test_result_list->RowIndex ?>_Pic2" id="o<?php echo $lab_test_result_list->RowIndex ?>_Pic2" value="<?php echo HtmlEncode($lab_test_result->Pic2->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_Pic2" class="lab_test_result_Pic2">
<span<?php echo $lab_test_result->Pic2->viewAttributes() ?>>
<?php echo $lab_test_result->Pic2->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result->GraphPath->Visible) { // GraphPath ?>
		<td data-name="GraphPath"<?php echo $lab_test_result->GraphPath->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_GraphPath" class="form-group lab_test_result_GraphPath">
<input type="text" data-table="lab_test_result" data-field="x_GraphPath" name="x<?php echo $lab_test_result_list->RowIndex ?>_GraphPath" id="x<?php echo $lab_test_result_list->RowIndex ?>_GraphPath" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($lab_test_result->GraphPath->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->GraphPath->EditValue ?>"<?php echo $lab_test_result->GraphPath->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_GraphPath" name="o<?php echo $lab_test_result_list->RowIndex ?>_GraphPath" id="o<?php echo $lab_test_result_list->RowIndex ?>_GraphPath" value="<?php echo HtmlEncode($lab_test_result->GraphPath->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_GraphPath" class="lab_test_result_GraphPath">
<span<?php echo $lab_test_result->GraphPath->viewAttributes() ?>>
<?php echo $lab_test_result->GraphPath->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result->SampleDate->Visible) { // SampleDate ?>
		<td data-name="SampleDate"<?php echo $lab_test_result->SampleDate->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_SampleDate" class="form-group lab_test_result_SampleDate">
<input type="text" data-table="lab_test_result" data-field="x_SampleDate" name="x<?php echo $lab_test_result_list->RowIndex ?>_SampleDate" id="x<?php echo $lab_test_result_list->RowIndex ?>_SampleDate" placeholder="<?php echo HtmlEncode($lab_test_result->SampleDate->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->SampleDate->EditValue ?>"<?php echo $lab_test_result->SampleDate->editAttributes() ?>>
<?php if (!$lab_test_result->SampleDate->ReadOnly && !$lab_test_result->SampleDate->Disabled && !isset($lab_test_result->SampleDate->EditAttrs["readonly"]) && !isset($lab_test_result->SampleDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("flab_test_resultlist", "x<?php echo $lab_test_result_list->RowIndex ?>_SampleDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_SampleDate" name="o<?php echo $lab_test_result_list->RowIndex ?>_SampleDate" id="o<?php echo $lab_test_result_list->RowIndex ?>_SampleDate" value="<?php echo HtmlEncode($lab_test_result->SampleDate->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_SampleDate" class="lab_test_result_SampleDate">
<span<?php echo $lab_test_result->SampleDate->viewAttributes() ?>>
<?php echo $lab_test_result->SampleDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result->SampleUser->Visible) { // SampleUser ?>
		<td data-name="SampleUser"<?php echo $lab_test_result->SampleUser->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_SampleUser" class="form-group lab_test_result_SampleUser">
<input type="text" data-table="lab_test_result" data-field="x_SampleUser" name="x<?php echo $lab_test_result_list->RowIndex ?>_SampleUser" id="x<?php echo $lab_test_result_list->RowIndex ?>_SampleUser" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($lab_test_result->SampleUser->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->SampleUser->EditValue ?>"<?php echo $lab_test_result->SampleUser->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_SampleUser" name="o<?php echo $lab_test_result_list->RowIndex ?>_SampleUser" id="o<?php echo $lab_test_result_list->RowIndex ?>_SampleUser" value="<?php echo HtmlEncode($lab_test_result->SampleUser->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_SampleUser" class="lab_test_result_SampleUser">
<span<?php echo $lab_test_result->SampleUser->viewAttributes() ?>>
<?php echo $lab_test_result->SampleUser->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result->ReceivedDate->Visible) { // ReceivedDate ?>
		<td data-name="ReceivedDate"<?php echo $lab_test_result->ReceivedDate->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_ReceivedDate" class="form-group lab_test_result_ReceivedDate">
<input type="text" data-table="lab_test_result" data-field="x_ReceivedDate" name="x<?php echo $lab_test_result_list->RowIndex ?>_ReceivedDate" id="x<?php echo $lab_test_result_list->RowIndex ?>_ReceivedDate" placeholder="<?php echo HtmlEncode($lab_test_result->ReceivedDate->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->ReceivedDate->EditValue ?>"<?php echo $lab_test_result->ReceivedDate->editAttributes() ?>>
<?php if (!$lab_test_result->ReceivedDate->ReadOnly && !$lab_test_result->ReceivedDate->Disabled && !isset($lab_test_result->ReceivedDate->EditAttrs["readonly"]) && !isset($lab_test_result->ReceivedDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("flab_test_resultlist", "x<?php echo $lab_test_result_list->RowIndex ?>_ReceivedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_ReceivedDate" name="o<?php echo $lab_test_result_list->RowIndex ?>_ReceivedDate" id="o<?php echo $lab_test_result_list->RowIndex ?>_ReceivedDate" value="<?php echo HtmlEncode($lab_test_result->ReceivedDate->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_ReceivedDate" class="lab_test_result_ReceivedDate">
<span<?php echo $lab_test_result->ReceivedDate->viewAttributes() ?>>
<?php echo $lab_test_result->ReceivedDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result->ReceivedUser->Visible) { // ReceivedUser ?>
		<td data-name="ReceivedUser"<?php echo $lab_test_result->ReceivedUser->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_ReceivedUser" class="form-group lab_test_result_ReceivedUser">
<input type="text" data-table="lab_test_result" data-field="x_ReceivedUser" name="x<?php echo $lab_test_result_list->RowIndex ?>_ReceivedUser" id="x<?php echo $lab_test_result_list->RowIndex ?>_ReceivedUser" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($lab_test_result->ReceivedUser->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->ReceivedUser->EditValue ?>"<?php echo $lab_test_result->ReceivedUser->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_ReceivedUser" name="o<?php echo $lab_test_result_list->RowIndex ?>_ReceivedUser" id="o<?php echo $lab_test_result_list->RowIndex ?>_ReceivedUser" value="<?php echo HtmlEncode($lab_test_result->ReceivedUser->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_ReceivedUser" class="lab_test_result_ReceivedUser">
<span<?php echo $lab_test_result->ReceivedUser->viewAttributes() ?>>
<?php echo $lab_test_result->ReceivedUser->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result->DeptRecvDate->Visible) { // DeptRecvDate ?>
		<td data-name="DeptRecvDate"<?php echo $lab_test_result->DeptRecvDate->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_DeptRecvDate" class="form-group lab_test_result_DeptRecvDate">
<input type="text" data-table="lab_test_result" data-field="x_DeptRecvDate" name="x<?php echo $lab_test_result_list->RowIndex ?>_DeptRecvDate" id="x<?php echo $lab_test_result_list->RowIndex ?>_DeptRecvDate" placeholder="<?php echo HtmlEncode($lab_test_result->DeptRecvDate->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->DeptRecvDate->EditValue ?>"<?php echo $lab_test_result->DeptRecvDate->editAttributes() ?>>
<?php if (!$lab_test_result->DeptRecvDate->ReadOnly && !$lab_test_result->DeptRecvDate->Disabled && !isset($lab_test_result->DeptRecvDate->EditAttrs["readonly"]) && !isset($lab_test_result->DeptRecvDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("flab_test_resultlist", "x<?php echo $lab_test_result_list->RowIndex ?>_DeptRecvDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_DeptRecvDate" name="o<?php echo $lab_test_result_list->RowIndex ?>_DeptRecvDate" id="o<?php echo $lab_test_result_list->RowIndex ?>_DeptRecvDate" value="<?php echo HtmlEncode($lab_test_result->DeptRecvDate->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_DeptRecvDate" class="lab_test_result_DeptRecvDate">
<span<?php echo $lab_test_result->DeptRecvDate->viewAttributes() ?>>
<?php echo $lab_test_result->DeptRecvDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result->DeptRecvUser->Visible) { // DeptRecvUser ?>
		<td data-name="DeptRecvUser"<?php echo $lab_test_result->DeptRecvUser->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_DeptRecvUser" class="form-group lab_test_result_DeptRecvUser">
<input type="text" data-table="lab_test_result" data-field="x_DeptRecvUser" name="x<?php echo $lab_test_result_list->RowIndex ?>_DeptRecvUser" id="x<?php echo $lab_test_result_list->RowIndex ?>_DeptRecvUser" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($lab_test_result->DeptRecvUser->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->DeptRecvUser->EditValue ?>"<?php echo $lab_test_result->DeptRecvUser->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_DeptRecvUser" name="o<?php echo $lab_test_result_list->RowIndex ?>_DeptRecvUser" id="o<?php echo $lab_test_result_list->RowIndex ?>_DeptRecvUser" value="<?php echo HtmlEncode($lab_test_result->DeptRecvUser->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_DeptRecvUser" class="lab_test_result_DeptRecvUser">
<span<?php echo $lab_test_result->DeptRecvUser->viewAttributes() ?>>
<?php echo $lab_test_result->DeptRecvUser->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result->PrintBy->Visible) { // PrintBy ?>
		<td data-name="PrintBy"<?php echo $lab_test_result->PrintBy->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_PrintBy" class="form-group lab_test_result_PrintBy">
<input type="text" data-table="lab_test_result" data-field="x_PrintBy" name="x<?php echo $lab_test_result_list->RowIndex ?>_PrintBy" id="x<?php echo $lab_test_result_list->RowIndex ?>_PrintBy" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($lab_test_result->PrintBy->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->PrintBy->EditValue ?>"<?php echo $lab_test_result->PrintBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_PrintBy" name="o<?php echo $lab_test_result_list->RowIndex ?>_PrintBy" id="o<?php echo $lab_test_result_list->RowIndex ?>_PrintBy" value="<?php echo HtmlEncode($lab_test_result->PrintBy->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_PrintBy" class="lab_test_result_PrintBy">
<span<?php echo $lab_test_result->PrintBy->viewAttributes() ?>>
<?php echo $lab_test_result->PrintBy->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result->PrintDate->Visible) { // PrintDate ?>
		<td data-name="PrintDate"<?php echo $lab_test_result->PrintDate->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_PrintDate" class="form-group lab_test_result_PrintDate">
<input type="text" data-table="lab_test_result" data-field="x_PrintDate" name="x<?php echo $lab_test_result_list->RowIndex ?>_PrintDate" id="x<?php echo $lab_test_result_list->RowIndex ?>_PrintDate" placeholder="<?php echo HtmlEncode($lab_test_result->PrintDate->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->PrintDate->EditValue ?>"<?php echo $lab_test_result->PrintDate->editAttributes() ?>>
<?php if (!$lab_test_result->PrintDate->ReadOnly && !$lab_test_result->PrintDate->Disabled && !isset($lab_test_result->PrintDate->EditAttrs["readonly"]) && !isset($lab_test_result->PrintDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("flab_test_resultlist", "x<?php echo $lab_test_result_list->RowIndex ?>_PrintDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_PrintDate" name="o<?php echo $lab_test_result_list->RowIndex ?>_PrintDate" id="o<?php echo $lab_test_result_list->RowIndex ?>_PrintDate" value="<?php echo HtmlEncode($lab_test_result->PrintDate->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_PrintDate" class="lab_test_result_PrintDate">
<span<?php echo $lab_test_result->PrintDate->viewAttributes() ?>>
<?php echo $lab_test_result->PrintDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result->MachineCD->Visible) { // MachineCD ?>
		<td data-name="MachineCD"<?php echo $lab_test_result->MachineCD->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_MachineCD" class="form-group lab_test_result_MachineCD">
<input type="text" data-table="lab_test_result" data-field="x_MachineCD" name="x<?php echo $lab_test_result_list->RowIndex ?>_MachineCD" id="x<?php echo $lab_test_result_list->RowIndex ?>_MachineCD" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($lab_test_result->MachineCD->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->MachineCD->EditValue ?>"<?php echo $lab_test_result->MachineCD->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_MachineCD" name="o<?php echo $lab_test_result_list->RowIndex ?>_MachineCD" id="o<?php echo $lab_test_result_list->RowIndex ?>_MachineCD" value="<?php echo HtmlEncode($lab_test_result->MachineCD->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_MachineCD" class="lab_test_result_MachineCD">
<span<?php echo $lab_test_result->MachineCD->viewAttributes() ?>>
<?php echo $lab_test_result->MachineCD->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result->TestCancel->Visible) { // TestCancel ?>
		<td data-name="TestCancel"<?php echo $lab_test_result->TestCancel->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_TestCancel" class="form-group lab_test_result_TestCancel">
<input type="text" data-table="lab_test_result" data-field="x_TestCancel" name="x<?php echo $lab_test_result_list->RowIndex ?>_TestCancel" id="x<?php echo $lab_test_result_list->RowIndex ?>_TestCancel" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result->TestCancel->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->TestCancel->EditValue ?>"<?php echo $lab_test_result->TestCancel->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_TestCancel" name="o<?php echo $lab_test_result_list->RowIndex ?>_TestCancel" id="o<?php echo $lab_test_result_list->RowIndex ?>_TestCancel" value="<?php echo HtmlEncode($lab_test_result->TestCancel->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_TestCancel" class="lab_test_result_TestCancel">
<span<?php echo $lab_test_result->TestCancel->viewAttributes() ?>>
<?php echo $lab_test_result->TestCancel->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result->OutSource->Visible) { // OutSource ?>
		<td data-name="OutSource"<?php echo $lab_test_result->OutSource->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_OutSource" class="form-group lab_test_result_OutSource">
<input type="text" data-table="lab_test_result" data-field="x_OutSource" name="x<?php echo $lab_test_result_list->RowIndex ?>_OutSource" id="x<?php echo $lab_test_result_list->RowIndex ?>_OutSource" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result->OutSource->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->OutSource->EditValue ?>"<?php echo $lab_test_result->OutSource->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_OutSource" name="o<?php echo $lab_test_result_list->RowIndex ?>_OutSource" id="o<?php echo $lab_test_result_list->RowIndex ?>_OutSource" value="<?php echo HtmlEncode($lab_test_result->OutSource->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_OutSource" class="lab_test_result_OutSource">
<span<?php echo $lab_test_result->OutSource->viewAttributes() ?>>
<?php echo $lab_test_result->OutSource->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result->Tariff->Visible) { // Tariff ?>
		<td data-name="Tariff"<?php echo $lab_test_result->Tariff->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_Tariff" class="form-group lab_test_result_Tariff">
<input type="text" data-table="lab_test_result" data-field="x_Tariff" name="x<?php echo $lab_test_result_list->RowIndex ?>_Tariff" id="x<?php echo $lab_test_result_list->RowIndex ?>_Tariff" size="30" placeholder="<?php echo HtmlEncode($lab_test_result->Tariff->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->Tariff->EditValue ?>"<?php echo $lab_test_result->Tariff->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Tariff" name="o<?php echo $lab_test_result_list->RowIndex ?>_Tariff" id="o<?php echo $lab_test_result_list->RowIndex ?>_Tariff" value="<?php echo HtmlEncode($lab_test_result->Tariff->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_Tariff" class="lab_test_result_Tariff">
<span<?php echo $lab_test_result->Tariff->viewAttributes() ?>>
<?php echo $lab_test_result->Tariff->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result->EDITDATE->Visible) { // EDITDATE ?>
		<td data-name="EDITDATE"<?php echo $lab_test_result->EDITDATE->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_EDITDATE" class="form-group lab_test_result_EDITDATE">
<input type="text" data-table="lab_test_result" data-field="x_EDITDATE" name="x<?php echo $lab_test_result_list->RowIndex ?>_EDITDATE" id="x<?php echo $lab_test_result_list->RowIndex ?>_EDITDATE" placeholder="<?php echo HtmlEncode($lab_test_result->EDITDATE->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->EDITDATE->EditValue ?>"<?php echo $lab_test_result->EDITDATE->editAttributes() ?>>
<?php if (!$lab_test_result->EDITDATE->ReadOnly && !$lab_test_result->EDITDATE->Disabled && !isset($lab_test_result->EDITDATE->EditAttrs["readonly"]) && !isset($lab_test_result->EDITDATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("flab_test_resultlist", "x<?php echo $lab_test_result_list->RowIndex ?>_EDITDATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_EDITDATE" name="o<?php echo $lab_test_result_list->RowIndex ?>_EDITDATE" id="o<?php echo $lab_test_result_list->RowIndex ?>_EDITDATE" value="<?php echo HtmlEncode($lab_test_result->EDITDATE->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_EDITDATE" class="lab_test_result_EDITDATE">
<span<?php echo $lab_test_result->EDITDATE->viewAttributes() ?>>
<?php echo $lab_test_result->EDITDATE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result->UPLOAD->Visible) { // UPLOAD ?>
		<td data-name="UPLOAD"<?php echo $lab_test_result->UPLOAD->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_UPLOAD" class="form-group lab_test_result_UPLOAD">
<input type="text" data-table="lab_test_result" data-field="x_UPLOAD" name="x<?php echo $lab_test_result_list->RowIndex ?>_UPLOAD" id="x<?php echo $lab_test_result_list->RowIndex ?>_UPLOAD" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result->UPLOAD->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->UPLOAD->EditValue ?>"<?php echo $lab_test_result->UPLOAD->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_UPLOAD" name="o<?php echo $lab_test_result_list->RowIndex ?>_UPLOAD" id="o<?php echo $lab_test_result_list->RowIndex ?>_UPLOAD" value="<?php echo HtmlEncode($lab_test_result->UPLOAD->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_UPLOAD" class="lab_test_result_UPLOAD">
<span<?php echo $lab_test_result->UPLOAD->viewAttributes() ?>>
<?php echo $lab_test_result->UPLOAD->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result->SAuthDate->Visible) { // SAuthDate ?>
		<td data-name="SAuthDate"<?php echo $lab_test_result->SAuthDate->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_SAuthDate" class="form-group lab_test_result_SAuthDate">
<input type="text" data-table="lab_test_result" data-field="x_SAuthDate" name="x<?php echo $lab_test_result_list->RowIndex ?>_SAuthDate" id="x<?php echo $lab_test_result_list->RowIndex ?>_SAuthDate" placeholder="<?php echo HtmlEncode($lab_test_result->SAuthDate->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->SAuthDate->EditValue ?>"<?php echo $lab_test_result->SAuthDate->editAttributes() ?>>
<?php if (!$lab_test_result->SAuthDate->ReadOnly && !$lab_test_result->SAuthDate->Disabled && !isset($lab_test_result->SAuthDate->EditAttrs["readonly"]) && !isset($lab_test_result->SAuthDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("flab_test_resultlist", "x<?php echo $lab_test_result_list->RowIndex ?>_SAuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_SAuthDate" name="o<?php echo $lab_test_result_list->RowIndex ?>_SAuthDate" id="o<?php echo $lab_test_result_list->RowIndex ?>_SAuthDate" value="<?php echo HtmlEncode($lab_test_result->SAuthDate->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_SAuthDate" class="lab_test_result_SAuthDate">
<span<?php echo $lab_test_result->SAuthDate->viewAttributes() ?>>
<?php echo $lab_test_result->SAuthDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result->SAuthBy->Visible) { // SAuthBy ?>
		<td data-name="SAuthBy"<?php echo $lab_test_result->SAuthBy->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_SAuthBy" class="form-group lab_test_result_SAuthBy">
<input type="text" data-table="lab_test_result" data-field="x_SAuthBy" name="x<?php echo $lab_test_result_list->RowIndex ?>_SAuthBy" id="x<?php echo $lab_test_result_list->RowIndex ?>_SAuthBy" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($lab_test_result->SAuthBy->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->SAuthBy->EditValue ?>"<?php echo $lab_test_result->SAuthBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_SAuthBy" name="o<?php echo $lab_test_result_list->RowIndex ?>_SAuthBy" id="o<?php echo $lab_test_result_list->RowIndex ?>_SAuthBy" value="<?php echo HtmlEncode($lab_test_result->SAuthBy->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_SAuthBy" class="lab_test_result_SAuthBy">
<span<?php echo $lab_test_result->SAuthBy->viewAttributes() ?>>
<?php echo $lab_test_result->SAuthBy->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result->NoRC->Visible) { // NoRC ?>
		<td data-name="NoRC"<?php echo $lab_test_result->NoRC->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_NoRC" class="form-group lab_test_result_NoRC">
<input type="text" data-table="lab_test_result" data-field="x_NoRC" name="x<?php echo $lab_test_result_list->RowIndex ?>_NoRC" id="x<?php echo $lab_test_result_list->RowIndex ?>_NoRC" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result->NoRC->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->NoRC->EditValue ?>"<?php echo $lab_test_result->NoRC->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_NoRC" name="o<?php echo $lab_test_result_list->RowIndex ?>_NoRC" id="o<?php echo $lab_test_result_list->RowIndex ?>_NoRC" value="<?php echo HtmlEncode($lab_test_result->NoRC->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_NoRC" class="lab_test_result_NoRC">
<span<?php echo $lab_test_result->NoRC->viewAttributes() ?>>
<?php echo $lab_test_result->NoRC->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result->DispDt->Visible) { // DispDt ?>
		<td data-name="DispDt"<?php echo $lab_test_result->DispDt->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_DispDt" class="form-group lab_test_result_DispDt">
<input type="text" data-table="lab_test_result" data-field="x_DispDt" name="x<?php echo $lab_test_result_list->RowIndex ?>_DispDt" id="x<?php echo $lab_test_result_list->RowIndex ?>_DispDt" placeholder="<?php echo HtmlEncode($lab_test_result->DispDt->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->DispDt->EditValue ?>"<?php echo $lab_test_result->DispDt->editAttributes() ?>>
<?php if (!$lab_test_result->DispDt->ReadOnly && !$lab_test_result->DispDt->Disabled && !isset($lab_test_result->DispDt->EditAttrs["readonly"]) && !isset($lab_test_result->DispDt->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("flab_test_resultlist", "x<?php echo $lab_test_result_list->RowIndex ?>_DispDt", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_DispDt" name="o<?php echo $lab_test_result_list->RowIndex ?>_DispDt" id="o<?php echo $lab_test_result_list->RowIndex ?>_DispDt" value="<?php echo HtmlEncode($lab_test_result->DispDt->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_DispDt" class="lab_test_result_DispDt">
<span<?php echo $lab_test_result->DispDt->viewAttributes() ?>>
<?php echo $lab_test_result->DispDt->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result->DispUser->Visible) { // DispUser ?>
		<td data-name="DispUser"<?php echo $lab_test_result->DispUser->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_DispUser" class="form-group lab_test_result_DispUser">
<input type="text" data-table="lab_test_result" data-field="x_DispUser" name="x<?php echo $lab_test_result_list->RowIndex ?>_DispUser" id="x<?php echo $lab_test_result_list->RowIndex ?>_DispUser" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($lab_test_result->DispUser->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->DispUser->EditValue ?>"<?php echo $lab_test_result->DispUser->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_DispUser" name="o<?php echo $lab_test_result_list->RowIndex ?>_DispUser" id="o<?php echo $lab_test_result_list->RowIndex ?>_DispUser" value="<?php echo HtmlEncode($lab_test_result->DispUser->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_DispUser" class="lab_test_result_DispUser">
<span<?php echo $lab_test_result->DispUser->viewAttributes() ?>>
<?php echo $lab_test_result->DispUser->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result->DispRemarks->Visible) { // DispRemarks ?>
		<td data-name="DispRemarks"<?php echo $lab_test_result->DispRemarks->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_DispRemarks" class="form-group lab_test_result_DispRemarks">
<input type="text" data-table="lab_test_result" data-field="x_DispRemarks" name="x<?php echo $lab_test_result_list->RowIndex ?>_DispRemarks" id="x<?php echo $lab_test_result_list->RowIndex ?>_DispRemarks" size="30" maxlength="250" placeholder="<?php echo HtmlEncode($lab_test_result->DispRemarks->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->DispRemarks->EditValue ?>"<?php echo $lab_test_result->DispRemarks->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_DispRemarks" name="o<?php echo $lab_test_result_list->RowIndex ?>_DispRemarks" id="o<?php echo $lab_test_result_list->RowIndex ?>_DispRemarks" value="<?php echo HtmlEncode($lab_test_result->DispRemarks->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_DispRemarks" class="lab_test_result_DispRemarks">
<span<?php echo $lab_test_result->DispRemarks->viewAttributes() ?>>
<?php echo $lab_test_result->DispRemarks->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result->DispMode->Visible) { // DispMode ?>
		<td data-name="DispMode"<?php echo $lab_test_result->DispMode->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_DispMode" class="form-group lab_test_result_DispMode">
<input type="text" data-table="lab_test_result" data-field="x_DispMode" name="x<?php echo $lab_test_result_list->RowIndex ?>_DispMode" id="x<?php echo $lab_test_result_list->RowIndex ?>_DispMode" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($lab_test_result->DispMode->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->DispMode->EditValue ?>"<?php echo $lab_test_result->DispMode->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_DispMode" name="o<?php echo $lab_test_result_list->RowIndex ?>_DispMode" id="o<?php echo $lab_test_result_list->RowIndex ?>_DispMode" value="<?php echo HtmlEncode($lab_test_result->DispMode->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_DispMode" class="lab_test_result_DispMode">
<span<?php echo $lab_test_result->DispMode->viewAttributes() ?>>
<?php echo $lab_test_result->DispMode->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result->ProductCD->Visible) { // ProductCD ?>
		<td data-name="ProductCD"<?php echo $lab_test_result->ProductCD->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_ProductCD" class="form-group lab_test_result_ProductCD">
<input type="text" data-table="lab_test_result" data-field="x_ProductCD" name="x<?php echo $lab_test_result_list->RowIndex ?>_ProductCD" id="x<?php echo $lab_test_result_list->RowIndex ?>_ProductCD" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($lab_test_result->ProductCD->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->ProductCD->EditValue ?>"<?php echo $lab_test_result->ProductCD->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_ProductCD" name="o<?php echo $lab_test_result_list->RowIndex ?>_ProductCD" id="o<?php echo $lab_test_result_list->RowIndex ?>_ProductCD" value="<?php echo HtmlEncode($lab_test_result->ProductCD->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_ProductCD" class="lab_test_result_ProductCD">
<span<?php echo $lab_test_result->ProductCD->viewAttributes() ?>>
<?php echo $lab_test_result->ProductCD->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result->Nos->Visible) { // Nos ?>
		<td data-name="Nos"<?php echo $lab_test_result->Nos->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_Nos" class="form-group lab_test_result_Nos">
<input type="text" data-table="lab_test_result" data-field="x_Nos" name="x<?php echo $lab_test_result_list->RowIndex ?>_Nos" id="x<?php echo $lab_test_result_list->RowIndex ?>_Nos" size="30" placeholder="<?php echo HtmlEncode($lab_test_result->Nos->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->Nos->EditValue ?>"<?php echo $lab_test_result->Nos->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Nos" name="o<?php echo $lab_test_result_list->RowIndex ?>_Nos" id="o<?php echo $lab_test_result_list->RowIndex ?>_Nos" value="<?php echo HtmlEncode($lab_test_result->Nos->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_Nos" class="lab_test_result_Nos">
<span<?php echo $lab_test_result->Nos->viewAttributes() ?>>
<?php echo $lab_test_result->Nos->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result->WBCPath->Visible) { // WBCPath ?>
		<td data-name="WBCPath"<?php echo $lab_test_result->WBCPath->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_WBCPath" class="form-group lab_test_result_WBCPath">
<input type="text" data-table="lab_test_result" data-field="x_WBCPath" name="x<?php echo $lab_test_result_list->RowIndex ?>_WBCPath" id="x<?php echo $lab_test_result_list->RowIndex ?>_WBCPath" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($lab_test_result->WBCPath->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->WBCPath->EditValue ?>"<?php echo $lab_test_result->WBCPath->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_WBCPath" name="o<?php echo $lab_test_result_list->RowIndex ?>_WBCPath" id="o<?php echo $lab_test_result_list->RowIndex ?>_WBCPath" value="<?php echo HtmlEncode($lab_test_result->WBCPath->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_WBCPath" class="lab_test_result_WBCPath">
<span<?php echo $lab_test_result->WBCPath->viewAttributes() ?>>
<?php echo $lab_test_result->WBCPath->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result->RBCPath->Visible) { // RBCPath ?>
		<td data-name="RBCPath"<?php echo $lab_test_result->RBCPath->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_RBCPath" class="form-group lab_test_result_RBCPath">
<input type="text" data-table="lab_test_result" data-field="x_RBCPath" name="x<?php echo $lab_test_result_list->RowIndex ?>_RBCPath" id="x<?php echo $lab_test_result_list->RowIndex ?>_RBCPath" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($lab_test_result->RBCPath->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->RBCPath->EditValue ?>"<?php echo $lab_test_result->RBCPath->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_RBCPath" name="o<?php echo $lab_test_result_list->RowIndex ?>_RBCPath" id="o<?php echo $lab_test_result_list->RowIndex ?>_RBCPath" value="<?php echo HtmlEncode($lab_test_result->RBCPath->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_RBCPath" class="lab_test_result_RBCPath">
<span<?php echo $lab_test_result->RBCPath->viewAttributes() ?>>
<?php echo $lab_test_result->RBCPath->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result->PTPath->Visible) { // PTPath ?>
		<td data-name="PTPath"<?php echo $lab_test_result->PTPath->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_PTPath" class="form-group lab_test_result_PTPath">
<input type="text" data-table="lab_test_result" data-field="x_PTPath" name="x<?php echo $lab_test_result_list->RowIndex ?>_PTPath" id="x<?php echo $lab_test_result_list->RowIndex ?>_PTPath" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($lab_test_result->PTPath->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->PTPath->EditValue ?>"<?php echo $lab_test_result->PTPath->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_PTPath" name="o<?php echo $lab_test_result_list->RowIndex ?>_PTPath" id="o<?php echo $lab_test_result_list->RowIndex ?>_PTPath" value="<?php echo HtmlEncode($lab_test_result->PTPath->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_PTPath" class="lab_test_result_PTPath">
<span<?php echo $lab_test_result->PTPath->viewAttributes() ?>>
<?php echo $lab_test_result->PTPath->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result->ActualAmt->Visible) { // ActualAmt ?>
		<td data-name="ActualAmt"<?php echo $lab_test_result->ActualAmt->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_ActualAmt" class="form-group lab_test_result_ActualAmt">
<input type="text" data-table="lab_test_result" data-field="x_ActualAmt" name="x<?php echo $lab_test_result_list->RowIndex ?>_ActualAmt" id="x<?php echo $lab_test_result_list->RowIndex ?>_ActualAmt" size="30" placeholder="<?php echo HtmlEncode($lab_test_result->ActualAmt->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->ActualAmt->EditValue ?>"<?php echo $lab_test_result->ActualAmt->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_ActualAmt" name="o<?php echo $lab_test_result_list->RowIndex ?>_ActualAmt" id="o<?php echo $lab_test_result_list->RowIndex ?>_ActualAmt" value="<?php echo HtmlEncode($lab_test_result->ActualAmt->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_ActualAmt" class="lab_test_result_ActualAmt">
<span<?php echo $lab_test_result->ActualAmt->viewAttributes() ?>>
<?php echo $lab_test_result->ActualAmt->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result->NoSign->Visible) { // NoSign ?>
		<td data-name="NoSign"<?php echo $lab_test_result->NoSign->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_NoSign" class="form-group lab_test_result_NoSign">
<input type="text" data-table="lab_test_result" data-field="x_NoSign" name="x<?php echo $lab_test_result_list->RowIndex ?>_NoSign" id="x<?php echo $lab_test_result_list->RowIndex ?>_NoSign" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result->NoSign->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->NoSign->EditValue ?>"<?php echo $lab_test_result->NoSign->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_NoSign" name="o<?php echo $lab_test_result_list->RowIndex ?>_NoSign" id="o<?php echo $lab_test_result_list->RowIndex ?>_NoSign" value="<?php echo HtmlEncode($lab_test_result->NoSign->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_NoSign" class="lab_test_result_NoSign">
<span<?php echo $lab_test_result->NoSign->viewAttributes() ?>>
<?php echo $lab_test_result->NoSign->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result->_Barcode->Visible) { // Barcode ?>
		<td data-name="_Barcode"<?php echo $lab_test_result->_Barcode->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result__Barcode" class="form-group lab_test_result__Barcode">
<input type="text" data-table="lab_test_result" data-field="x__Barcode" name="x<?php echo $lab_test_result_list->RowIndex ?>__Barcode" id="x<?php echo $lab_test_result_list->RowIndex ?>__Barcode" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result->_Barcode->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->_Barcode->EditValue ?>"<?php echo $lab_test_result->_Barcode->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x__Barcode" name="o<?php echo $lab_test_result_list->RowIndex ?>__Barcode" id="o<?php echo $lab_test_result_list->RowIndex ?>__Barcode" value="<?php echo HtmlEncode($lab_test_result->_Barcode->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result__Barcode" class="lab_test_result__Barcode">
<span<?php echo $lab_test_result->_Barcode->viewAttributes() ?>>
<?php echo $lab_test_result->_Barcode->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result->ReadTime->Visible) { // ReadTime ?>
		<td data-name="ReadTime"<?php echo $lab_test_result->ReadTime->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_ReadTime" class="form-group lab_test_result_ReadTime">
<input type="text" data-table="lab_test_result" data-field="x_ReadTime" name="x<?php echo $lab_test_result_list->RowIndex ?>_ReadTime" id="x<?php echo $lab_test_result_list->RowIndex ?>_ReadTime" placeholder="<?php echo HtmlEncode($lab_test_result->ReadTime->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->ReadTime->EditValue ?>"<?php echo $lab_test_result->ReadTime->editAttributes() ?>>
<?php if (!$lab_test_result->ReadTime->ReadOnly && !$lab_test_result->ReadTime->Disabled && !isset($lab_test_result->ReadTime->EditAttrs["readonly"]) && !isset($lab_test_result->ReadTime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("flab_test_resultlist", "x<?php echo $lab_test_result_list->RowIndex ?>_ReadTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_ReadTime" name="o<?php echo $lab_test_result_list->RowIndex ?>_ReadTime" id="o<?php echo $lab_test_result_list->RowIndex ?>_ReadTime" value="<?php echo HtmlEncode($lab_test_result->ReadTime->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_ReadTime" class="lab_test_result_ReadTime">
<span<?php echo $lab_test_result->ReadTime->viewAttributes() ?>>
<?php echo $lab_test_result->ReadTime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result->VailID->Visible) { // VailID ?>
		<td data-name="VailID"<?php echo $lab_test_result->VailID->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_VailID" class="form-group lab_test_result_VailID">
<input type="text" data-table="lab_test_result" data-field="x_VailID" name="x<?php echo $lab_test_result_list->RowIndex ?>_VailID" id="x<?php echo $lab_test_result_list->RowIndex ?>_VailID" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($lab_test_result->VailID->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->VailID->EditValue ?>"<?php echo $lab_test_result->VailID->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_VailID" name="o<?php echo $lab_test_result_list->RowIndex ?>_VailID" id="o<?php echo $lab_test_result_list->RowIndex ?>_VailID" value="<?php echo HtmlEncode($lab_test_result->VailID->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_VailID" class="lab_test_result_VailID">
<span<?php echo $lab_test_result->VailID->viewAttributes() ?>>
<?php echo $lab_test_result->VailID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result->ReadMachine->Visible) { // ReadMachine ?>
		<td data-name="ReadMachine"<?php echo $lab_test_result->ReadMachine->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_ReadMachine" class="form-group lab_test_result_ReadMachine">
<input type="text" data-table="lab_test_result" data-field="x_ReadMachine" name="x<?php echo $lab_test_result_list->RowIndex ?>_ReadMachine" id="x<?php echo $lab_test_result_list->RowIndex ?>_ReadMachine" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($lab_test_result->ReadMachine->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->ReadMachine->EditValue ?>"<?php echo $lab_test_result->ReadMachine->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_ReadMachine" name="o<?php echo $lab_test_result_list->RowIndex ?>_ReadMachine" id="o<?php echo $lab_test_result_list->RowIndex ?>_ReadMachine" value="<?php echo HtmlEncode($lab_test_result->ReadMachine->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_ReadMachine" class="lab_test_result_ReadMachine">
<span<?php echo $lab_test_result->ReadMachine->viewAttributes() ?>>
<?php echo $lab_test_result->ReadMachine->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result->LabCD->Visible) { // LabCD ?>
		<td data-name="LabCD"<?php echo $lab_test_result->LabCD->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_LabCD" class="form-group lab_test_result_LabCD">
<input type="text" data-table="lab_test_result" data-field="x_LabCD" name="x<?php echo $lab_test_result_list->RowIndex ?>_LabCD" id="x<?php echo $lab_test_result_list->RowIndex ?>_LabCD" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($lab_test_result->LabCD->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->LabCD->EditValue ?>"<?php echo $lab_test_result->LabCD->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_LabCD" name="o<?php echo $lab_test_result_list->RowIndex ?>_LabCD" id="o<?php echo $lab_test_result_list->RowIndex ?>_LabCD" value="<?php echo HtmlEncode($lab_test_result->LabCD->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_LabCD" class="lab_test_result_LabCD">
<span<?php echo $lab_test_result->LabCD->viewAttributes() ?>>
<?php echo $lab_test_result->LabCD->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result->OutLabAmt->Visible) { // OutLabAmt ?>
		<td data-name="OutLabAmt"<?php echo $lab_test_result->OutLabAmt->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_OutLabAmt" class="form-group lab_test_result_OutLabAmt">
<input type="text" data-table="lab_test_result" data-field="x_OutLabAmt" name="x<?php echo $lab_test_result_list->RowIndex ?>_OutLabAmt" id="x<?php echo $lab_test_result_list->RowIndex ?>_OutLabAmt" size="30" placeholder="<?php echo HtmlEncode($lab_test_result->OutLabAmt->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->OutLabAmt->EditValue ?>"<?php echo $lab_test_result->OutLabAmt->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_OutLabAmt" name="o<?php echo $lab_test_result_list->RowIndex ?>_OutLabAmt" id="o<?php echo $lab_test_result_list->RowIndex ?>_OutLabAmt" value="<?php echo HtmlEncode($lab_test_result->OutLabAmt->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_OutLabAmt" class="lab_test_result_OutLabAmt">
<span<?php echo $lab_test_result->OutLabAmt->viewAttributes() ?>>
<?php echo $lab_test_result->OutLabAmt->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result->ProductQty->Visible) { // ProductQty ?>
		<td data-name="ProductQty"<?php echo $lab_test_result->ProductQty->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_ProductQty" class="form-group lab_test_result_ProductQty">
<input type="text" data-table="lab_test_result" data-field="x_ProductQty" name="x<?php echo $lab_test_result_list->RowIndex ?>_ProductQty" id="x<?php echo $lab_test_result_list->RowIndex ?>_ProductQty" size="30" placeholder="<?php echo HtmlEncode($lab_test_result->ProductQty->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->ProductQty->EditValue ?>"<?php echo $lab_test_result->ProductQty->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_ProductQty" name="o<?php echo $lab_test_result_list->RowIndex ?>_ProductQty" id="o<?php echo $lab_test_result_list->RowIndex ?>_ProductQty" value="<?php echo HtmlEncode($lab_test_result->ProductQty->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_ProductQty" class="lab_test_result_ProductQty">
<span<?php echo $lab_test_result->ProductQty->viewAttributes() ?>>
<?php echo $lab_test_result->ProductQty->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result->Repeat->Visible) { // Repeat ?>
		<td data-name="Repeat"<?php echo $lab_test_result->Repeat->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_Repeat" class="form-group lab_test_result_Repeat">
<input type="text" data-table="lab_test_result" data-field="x_Repeat" name="x<?php echo $lab_test_result_list->RowIndex ?>_Repeat" id="x<?php echo $lab_test_result_list->RowIndex ?>_Repeat" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result->Repeat->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->Repeat->EditValue ?>"<?php echo $lab_test_result->Repeat->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Repeat" name="o<?php echo $lab_test_result_list->RowIndex ?>_Repeat" id="o<?php echo $lab_test_result_list->RowIndex ?>_Repeat" value="<?php echo HtmlEncode($lab_test_result->Repeat->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_Repeat" class="lab_test_result_Repeat">
<span<?php echo $lab_test_result->Repeat->viewAttributes() ?>>
<?php echo $lab_test_result->Repeat->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result->DeptNo->Visible) { // DeptNo ?>
		<td data-name="DeptNo"<?php echo $lab_test_result->DeptNo->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_DeptNo" class="form-group lab_test_result_DeptNo">
<input type="text" data-table="lab_test_result" data-field="x_DeptNo" name="x<?php echo $lab_test_result_list->RowIndex ?>_DeptNo" id="x<?php echo $lab_test_result_list->RowIndex ?>_DeptNo" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($lab_test_result->DeptNo->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->DeptNo->EditValue ?>"<?php echo $lab_test_result->DeptNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_DeptNo" name="o<?php echo $lab_test_result_list->RowIndex ?>_DeptNo" id="o<?php echo $lab_test_result_list->RowIndex ?>_DeptNo" value="<?php echo HtmlEncode($lab_test_result->DeptNo->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_DeptNo" class="lab_test_result_DeptNo">
<span<?php echo $lab_test_result->DeptNo->viewAttributes() ?>>
<?php echo $lab_test_result->DeptNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result->Desc1->Visible) { // Desc1 ?>
		<td data-name="Desc1"<?php echo $lab_test_result->Desc1->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_Desc1" class="form-group lab_test_result_Desc1">
<input type="text" data-table="lab_test_result" data-field="x_Desc1" name="x<?php echo $lab_test_result_list->RowIndex ?>_Desc1" id="x<?php echo $lab_test_result_list->RowIndex ?>_Desc1" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($lab_test_result->Desc1->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->Desc1->EditValue ?>"<?php echo $lab_test_result->Desc1->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Desc1" name="o<?php echo $lab_test_result_list->RowIndex ?>_Desc1" id="o<?php echo $lab_test_result_list->RowIndex ?>_Desc1" value="<?php echo HtmlEncode($lab_test_result->Desc1->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_Desc1" class="lab_test_result_Desc1">
<span<?php echo $lab_test_result->Desc1->viewAttributes() ?>>
<?php echo $lab_test_result->Desc1->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result->Desc2->Visible) { // Desc2 ?>
		<td data-name="Desc2"<?php echo $lab_test_result->Desc2->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_Desc2" class="form-group lab_test_result_Desc2">
<input type="text" data-table="lab_test_result" data-field="x_Desc2" name="x<?php echo $lab_test_result_list->RowIndex ?>_Desc2" id="x<?php echo $lab_test_result_list->RowIndex ?>_Desc2" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($lab_test_result->Desc2->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->Desc2->EditValue ?>"<?php echo $lab_test_result->Desc2->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Desc2" name="o<?php echo $lab_test_result_list->RowIndex ?>_Desc2" id="o<?php echo $lab_test_result_list->RowIndex ?>_Desc2" value="<?php echo HtmlEncode($lab_test_result->Desc2->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_Desc2" class="lab_test_result_Desc2">
<span<?php echo $lab_test_result->Desc2->viewAttributes() ?>>
<?php echo $lab_test_result->Desc2->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result->RptResult->Visible) { // RptResult ?>
		<td data-name="RptResult"<?php echo $lab_test_result->RptResult->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_RptResult" class="form-group lab_test_result_RptResult">
<input type="text" data-table="lab_test_result" data-field="x_RptResult" name="x<?php echo $lab_test_result_list->RowIndex ?>_RptResult" id="x<?php echo $lab_test_result_list->RowIndex ?>_RptResult" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($lab_test_result->RptResult->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->RptResult->EditValue ?>"<?php echo $lab_test_result->RptResult->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_RptResult" name="o<?php echo $lab_test_result_list->RowIndex ?>_RptResult" id="o<?php echo $lab_test_result_list->RowIndex ?>_RptResult" value="<?php echo HtmlEncode($lab_test_result->RptResult->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCnt ?>_lab_test_result_RptResult" class="lab_test_result_RptResult">
<span<?php echo $lab_test_result->RptResult->viewAttributes() ?>>
<?php echo $lab_test_result->RptResult->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$lab_test_result_list->ListOptions->render("body", "right", $lab_test_result_list->RowCnt);
?>
	</tr>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD || $lab_test_result->RowType == ROWTYPE_EDIT) { ?>
<script>
flab_test_resultlist.updateLists(<?php echo $lab_test_result_list->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$lab_test_result->isGridAdd())
		if (!$lab_test_result_list->Recordset->EOF)
			$lab_test_result_list->Recordset->moveNext();
}
?>
<?php
	if ($lab_test_result->isGridAdd() || $lab_test_result->isGridEdit()) {
		$lab_test_result_list->RowIndex = '$rowindex$';
		$lab_test_result_list->loadRowValues();

		// Set row properties
		$lab_test_result->resetAttributes();
		$lab_test_result->RowAttrs = array_merge($lab_test_result->RowAttrs, array('data-rowindex'=>$lab_test_result_list->RowIndex, 'id'=>'r0_lab_test_result', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($lab_test_result->RowAttrs["class"], "ew-template");
		$lab_test_result->RowType = ROWTYPE_ADD;

		// Render row
		$lab_test_result_list->renderRow();

		// Render list options
		$lab_test_result_list->renderListOptions();
		$lab_test_result_list->StartRowCnt = 0;
?>
	<tr<?php echo $lab_test_result->rowAttributes() ?>>
<?php

// Render list options (body, left)
$lab_test_result_list->ListOptions->render("body", "left", $lab_test_result_list->RowIndex);
?>
	<?php if ($lab_test_result->Branch->Visible) { // Branch ?>
		<td data-name="Branch">
<span id="el$rowindex$_lab_test_result_Branch" class="form-group lab_test_result_Branch">
<input type="text" data-table="lab_test_result" data-field="x_Branch" name="x<?php echo $lab_test_result_list->RowIndex ?>_Branch" id="x<?php echo $lab_test_result_list->RowIndex ?>_Branch" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($lab_test_result->Branch->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->Branch->EditValue ?>"<?php echo $lab_test_result->Branch->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Branch" name="o<?php echo $lab_test_result_list->RowIndex ?>_Branch" id="o<?php echo $lab_test_result_list->RowIndex ?>_Branch" value="<?php echo HtmlEncode($lab_test_result->Branch->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result->SidNo->Visible) { // SidNo ?>
		<td data-name="SidNo">
<span id="el$rowindex$_lab_test_result_SidNo" class="form-group lab_test_result_SidNo">
<input type="text" data-table="lab_test_result" data-field="x_SidNo" name="x<?php echo $lab_test_result_list->RowIndex ?>_SidNo" id="x<?php echo $lab_test_result_list->RowIndex ?>_SidNo" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($lab_test_result->SidNo->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->SidNo->EditValue ?>"<?php echo $lab_test_result->SidNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_SidNo" name="o<?php echo $lab_test_result_list->RowIndex ?>_SidNo" id="o<?php echo $lab_test_result_list->RowIndex ?>_SidNo" value="<?php echo HtmlEncode($lab_test_result->SidNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result->SidDate->Visible) { // SidDate ?>
		<td data-name="SidDate">
<span id="el$rowindex$_lab_test_result_SidDate" class="form-group lab_test_result_SidDate">
<input type="text" data-table="lab_test_result" data-field="x_SidDate" name="x<?php echo $lab_test_result_list->RowIndex ?>_SidDate" id="x<?php echo $lab_test_result_list->RowIndex ?>_SidDate" placeholder="<?php echo HtmlEncode($lab_test_result->SidDate->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->SidDate->EditValue ?>"<?php echo $lab_test_result->SidDate->editAttributes() ?>>
<?php if (!$lab_test_result->SidDate->ReadOnly && !$lab_test_result->SidDate->Disabled && !isset($lab_test_result->SidDate->EditAttrs["readonly"]) && !isset($lab_test_result->SidDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("flab_test_resultlist", "x<?php echo $lab_test_result_list->RowIndex ?>_SidDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_SidDate" name="o<?php echo $lab_test_result_list->RowIndex ?>_SidDate" id="o<?php echo $lab_test_result_list->RowIndex ?>_SidDate" value="<?php echo HtmlEncode($lab_test_result->SidDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result->TestCd->Visible) { // TestCd ?>
		<td data-name="TestCd">
<span id="el$rowindex$_lab_test_result_TestCd" class="form-group lab_test_result_TestCd">
<input type="text" data-table="lab_test_result" data-field="x_TestCd" name="x<?php echo $lab_test_result_list->RowIndex ?>_TestCd" id="x<?php echo $lab_test_result_list->RowIndex ?>_TestCd" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($lab_test_result->TestCd->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->TestCd->EditValue ?>"<?php echo $lab_test_result->TestCd->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_TestCd" name="o<?php echo $lab_test_result_list->RowIndex ?>_TestCd" id="o<?php echo $lab_test_result_list->RowIndex ?>_TestCd" value="<?php echo HtmlEncode($lab_test_result->TestCd->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result->TestSubCd->Visible) { // TestSubCd ?>
		<td data-name="TestSubCd">
<span id="el$rowindex$_lab_test_result_TestSubCd" class="form-group lab_test_result_TestSubCd">
<input type="text" data-table="lab_test_result" data-field="x_TestSubCd" name="x<?php echo $lab_test_result_list->RowIndex ?>_TestSubCd" id="x<?php echo $lab_test_result_list->RowIndex ?>_TestSubCd" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($lab_test_result->TestSubCd->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->TestSubCd->EditValue ?>"<?php echo $lab_test_result->TestSubCd->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_TestSubCd" name="o<?php echo $lab_test_result_list->RowIndex ?>_TestSubCd" id="o<?php echo $lab_test_result_list->RowIndex ?>_TestSubCd" value="<?php echo HtmlEncode($lab_test_result->TestSubCd->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result->DEptCd->Visible) { // DEptCd ?>
		<td data-name="DEptCd">
<span id="el$rowindex$_lab_test_result_DEptCd" class="form-group lab_test_result_DEptCd">
<input type="text" data-table="lab_test_result" data-field="x_DEptCd" name="x<?php echo $lab_test_result_list->RowIndex ?>_DEptCd" id="x<?php echo $lab_test_result_list->RowIndex ?>_DEptCd" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($lab_test_result->DEptCd->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->DEptCd->EditValue ?>"<?php echo $lab_test_result->DEptCd->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_DEptCd" name="o<?php echo $lab_test_result_list->RowIndex ?>_DEptCd" id="o<?php echo $lab_test_result_list->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($lab_test_result->DEptCd->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result->ProfCd->Visible) { // ProfCd ?>
		<td data-name="ProfCd">
<span id="el$rowindex$_lab_test_result_ProfCd" class="form-group lab_test_result_ProfCd">
<input type="text" data-table="lab_test_result" data-field="x_ProfCd" name="x<?php echo $lab_test_result_list->RowIndex ?>_ProfCd" id="x<?php echo $lab_test_result_list->RowIndex ?>_ProfCd" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($lab_test_result->ProfCd->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->ProfCd->EditValue ?>"<?php echo $lab_test_result->ProfCd->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_ProfCd" name="o<?php echo $lab_test_result_list->RowIndex ?>_ProfCd" id="o<?php echo $lab_test_result_list->RowIndex ?>_ProfCd" value="<?php echo HtmlEncode($lab_test_result->ProfCd->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result->ResultDate->Visible) { // ResultDate ?>
		<td data-name="ResultDate">
<span id="el$rowindex$_lab_test_result_ResultDate" class="form-group lab_test_result_ResultDate">
<input type="text" data-table="lab_test_result" data-field="x_ResultDate" name="x<?php echo $lab_test_result_list->RowIndex ?>_ResultDate" id="x<?php echo $lab_test_result_list->RowIndex ?>_ResultDate" placeholder="<?php echo HtmlEncode($lab_test_result->ResultDate->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->ResultDate->EditValue ?>"<?php echo $lab_test_result->ResultDate->editAttributes() ?>>
<?php if (!$lab_test_result->ResultDate->ReadOnly && !$lab_test_result->ResultDate->Disabled && !isset($lab_test_result->ResultDate->EditAttrs["readonly"]) && !isset($lab_test_result->ResultDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("flab_test_resultlist", "x<?php echo $lab_test_result_list->RowIndex ?>_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_ResultDate" name="o<?php echo $lab_test_result_list->RowIndex ?>_ResultDate" id="o<?php echo $lab_test_result_list->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($lab_test_result->ResultDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result->Method->Visible) { // Method ?>
		<td data-name="Method">
<span id="el$rowindex$_lab_test_result_Method" class="form-group lab_test_result_Method">
<input type="text" data-table="lab_test_result" data-field="x_Method" name="x<?php echo $lab_test_result_list->RowIndex ?>_Method" id="x<?php echo $lab_test_result_list->RowIndex ?>_Method" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($lab_test_result->Method->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->Method->EditValue ?>"<?php echo $lab_test_result->Method->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Method" name="o<?php echo $lab_test_result_list->RowIndex ?>_Method" id="o<?php echo $lab_test_result_list->RowIndex ?>_Method" value="<?php echo HtmlEncode($lab_test_result->Method->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result->Specimen->Visible) { // Specimen ?>
		<td data-name="Specimen">
<span id="el$rowindex$_lab_test_result_Specimen" class="form-group lab_test_result_Specimen">
<input type="text" data-table="lab_test_result" data-field="x_Specimen" name="x<?php echo $lab_test_result_list->RowIndex ?>_Specimen" id="x<?php echo $lab_test_result_list->RowIndex ?>_Specimen" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($lab_test_result->Specimen->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->Specimen->EditValue ?>"<?php echo $lab_test_result->Specimen->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Specimen" name="o<?php echo $lab_test_result_list->RowIndex ?>_Specimen" id="o<?php echo $lab_test_result_list->RowIndex ?>_Specimen" value="<?php echo HtmlEncode($lab_test_result->Specimen->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result->Amount->Visible) { // Amount ?>
		<td data-name="Amount">
<span id="el$rowindex$_lab_test_result_Amount" class="form-group lab_test_result_Amount">
<input type="text" data-table="lab_test_result" data-field="x_Amount" name="x<?php echo $lab_test_result_list->RowIndex ?>_Amount" id="x<?php echo $lab_test_result_list->RowIndex ?>_Amount" size="30" placeholder="<?php echo HtmlEncode($lab_test_result->Amount->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->Amount->EditValue ?>"<?php echo $lab_test_result->Amount->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Amount" name="o<?php echo $lab_test_result_list->RowIndex ?>_Amount" id="o<?php echo $lab_test_result_list->RowIndex ?>_Amount" value="<?php echo HtmlEncode($lab_test_result->Amount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result->ResultBy->Visible) { // ResultBy ?>
		<td data-name="ResultBy">
<span id="el$rowindex$_lab_test_result_ResultBy" class="form-group lab_test_result_ResultBy">
<input type="text" data-table="lab_test_result" data-field="x_ResultBy" name="x<?php echo $lab_test_result_list->RowIndex ?>_ResultBy" id="x<?php echo $lab_test_result_list->RowIndex ?>_ResultBy" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($lab_test_result->ResultBy->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->ResultBy->EditValue ?>"<?php echo $lab_test_result->ResultBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_ResultBy" name="o<?php echo $lab_test_result_list->RowIndex ?>_ResultBy" id="o<?php echo $lab_test_result_list->RowIndex ?>_ResultBy" value="<?php echo HtmlEncode($lab_test_result->ResultBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result->AuthBy->Visible) { // AuthBy ?>
		<td data-name="AuthBy">
<span id="el$rowindex$_lab_test_result_AuthBy" class="form-group lab_test_result_AuthBy">
<input type="text" data-table="lab_test_result" data-field="x_AuthBy" name="x<?php echo $lab_test_result_list->RowIndex ?>_AuthBy" id="x<?php echo $lab_test_result_list->RowIndex ?>_AuthBy" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($lab_test_result->AuthBy->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->AuthBy->EditValue ?>"<?php echo $lab_test_result->AuthBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_AuthBy" name="o<?php echo $lab_test_result_list->RowIndex ?>_AuthBy" id="o<?php echo $lab_test_result_list->RowIndex ?>_AuthBy" value="<?php echo HtmlEncode($lab_test_result->AuthBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result->AuthDate->Visible) { // AuthDate ?>
		<td data-name="AuthDate">
<span id="el$rowindex$_lab_test_result_AuthDate" class="form-group lab_test_result_AuthDate">
<input type="text" data-table="lab_test_result" data-field="x_AuthDate" name="x<?php echo $lab_test_result_list->RowIndex ?>_AuthDate" id="x<?php echo $lab_test_result_list->RowIndex ?>_AuthDate" placeholder="<?php echo HtmlEncode($lab_test_result->AuthDate->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->AuthDate->EditValue ?>"<?php echo $lab_test_result->AuthDate->editAttributes() ?>>
<?php if (!$lab_test_result->AuthDate->ReadOnly && !$lab_test_result->AuthDate->Disabled && !isset($lab_test_result->AuthDate->EditAttrs["readonly"]) && !isset($lab_test_result->AuthDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("flab_test_resultlist", "x<?php echo $lab_test_result_list->RowIndex ?>_AuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_AuthDate" name="o<?php echo $lab_test_result_list->RowIndex ?>_AuthDate" id="o<?php echo $lab_test_result_list->RowIndex ?>_AuthDate" value="<?php echo HtmlEncode($lab_test_result->AuthDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result->Abnormal->Visible) { // Abnormal ?>
		<td data-name="Abnormal">
<span id="el$rowindex$_lab_test_result_Abnormal" class="form-group lab_test_result_Abnormal">
<input type="text" data-table="lab_test_result" data-field="x_Abnormal" name="x<?php echo $lab_test_result_list->RowIndex ?>_Abnormal" id="x<?php echo $lab_test_result_list->RowIndex ?>_Abnormal" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result->Abnormal->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->Abnormal->EditValue ?>"<?php echo $lab_test_result->Abnormal->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Abnormal" name="o<?php echo $lab_test_result_list->RowIndex ?>_Abnormal" id="o<?php echo $lab_test_result_list->RowIndex ?>_Abnormal" value="<?php echo HtmlEncode($lab_test_result->Abnormal->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result->Printed->Visible) { // Printed ?>
		<td data-name="Printed">
<span id="el$rowindex$_lab_test_result_Printed" class="form-group lab_test_result_Printed">
<input type="text" data-table="lab_test_result" data-field="x_Printed" name="x<?php echo $lab_test_result_list->RowIndex ?>_Printed" id="x<?php echo $lab_test_result_list->RowIndex ?>_Printed" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result->Printed->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->Printed->EditValue ?>"<?php echo $lab_test_result->Printed->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Printed" name="o<?php echo $lab_test_result_list->RowIndex ?>_Printed" id="o<?php echo $lab_test_result_list->RowIndex ?>_Printed" value="<?php echo HtmlEncode($lab_test_result->Printed->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result->Dispatch->Visible) { // Dispatch ?>
		<td data-name="Dispatch">
<span id="el$rowindex$_lab_test_result_Dispatch" class="form-group lab_test_result_Dispatch">
<input type="text" data-table="lab_test_result" data-field="x_Dispatch" name="x<?php echo $lab_test_result_list->RowIndex ?>_Dispatch" id="x<?php echo $lab_test_result_list->RowIndex ?>_Dispatch" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result->Dispatch->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->Dispatch->EditValue ?>"<?php echo $lab_test_result->Dispatch->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Dispatch" name="o<?php echo $lab_test_result_list->RowIndex ?>_Dispatch" id="o<?php echo $lab_test_result_list->RowIndex ?>_Dispatch" value="<?php echo HtmlEncode($lab_test_result->Dispatch->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result->LOWHIGH->Visible) { // LOWHIGH ?>
		<td data-name="LOWHIGH">
<span id="el$rowindex$_lab_test_result_LOWHIGH" class="form-group lab_test_result_LOWHIGH">
<input type="text" data-table="lab_test_result" data-field="x_LOWHIGH" name="x<?php echo $lab_test_result_list->RowIndex ?>_LOWHIGH" id="x<?php echo $lab_test_result_list->RowIndex ?>_LOWHIGH" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result->LOWHIGH->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->LOWHIGH->EditValue ?>"<?php echo $lab_test_result->LOWHIGH->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_LOWHIGH" name="o<?php echo $lab_test_result_list->RowIndex ?>_LOWHIGH" id="o<?php echo $lab_test_result_list->RowIndex ?>_LOWHIGH" value="<?php echo HtmlEncode($lab_test_result->LOWHIGH->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result->Unit->Visible) { // Unit ?>
		<td data-name="Unit">
<span id="el$rowindex$_lab_test_result_Unit" class="form-group lab_test_result_Unit">
<input type="text" data-table="lab_test_result" data-field="x_Unit" name="x<?php echo $lab_test_result_list->RowIndex ?>_Unit" id="x<?php echo $lab_test_result_list->RowIndex ?>_Unit" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($lab_test_result->Unit->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->Unit->EditValue ?>"<?php echo $lab_test_result->Unit->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Unit" name="o<?php echo $lab_test_result_list->RowIndex ?>_Unit" id="o<?php echo $lab_test_result_list->RowIndex ?>_Unit" value="<?php echo HtmlEncode($lab_test_result->Unit->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result->ResDate->Visible) { // ResDate ?>
		<td data-name="ResDate">
<span id="el$rowindex$_lab_test_result_ResDate" class="form-group lab_test_result_ResDate">
<input type="text" data-table="lab_test_result" data-field="x_ResDate" name="x<?php echo $lab_test_result_list->RowIndex ?>_ResDate" id="x<?php echo $lab_test_result_list->RowIndex ?>_ResDate" placeholder="<?php echo HtmlEncode($lab_test_result->ResDate->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->ResDate->EditValue ?>"<?php echo $lab_test_result->ResDate->editAttributes() ?>>
<?php if (!$lab_test_result->ResDate->ReadOnly && !$lab_test_result->ResDate->Disabled && !isset($lab_test_result->ResDate->EditAttrs["readonly"]) && !isset($lab_test_result->ResDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("flab_test_resultlist", "x<?php echo $lab_test_result_list->RowIndex ?>_ResDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_ResDate" name="o<?php echo $lab_test_result_list->RowIndex ?>_ResDate" id="o<?php echo $lab_test_result_list->RowIndex ?>_ResDate" value="<?php echo HtmlEncode($lab_test_result->ResDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result->Pic1->Visible) { // Pic1 ?>
		<td data-name="Pic1">
<span id="el$rowindex$_lab_test_result_Pic1" class="form-group lab_test_result_Pic1">
<input type="text" data-table="lab_test_result" data-field="x_Pic1" name="x<?php echo $lab_test_result_list->RowIndex ?>_Pic1" id="x<?php echo $lab_test_result_list->RowIndex ?>_Pic1" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($lab_test_result->Pic1->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->Pic1->EditValue ?>"<?php echo $lab_test_result->Pic1->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Pic1" name="o<?php echo $lab_test_result_list->RowIndex ?>_Pic1" id="o<?php echo $lab_test_result_list->RowIndex ?>_Pic1" value="<?php echo HtmlEncode($lab_test_result->Pic1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result->Pic2->Visible) { // Pic2 ?>
		<td data-name="Pic2">
<span id="el$rowindex$_lab_test_result_Pic2" class="form-group lab_test_result_Pic2">
<input type="text" data-table="lab_test_result" data-field="x_Pic2" name="x<?php echo $lab_test_result_list->RowIndex ?>_Pic2" id="x<?php echo $lab_test_result_list->RowIndex ?>_Pic2" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($lab_test_result->Pic2->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->Pic2->EditValue ?>"<?php echo $lab_test_result->Pic2->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Pic2" name="o<?php echo $lab_test_result_list->RowIndex ?>_Pic2" id="o<?php echo $lab_test_result_list->RowIndex ?>_Pic2" value="<?php echo HtmlEncode($lab_test_result->Pic2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result->GraphPath->Visible) { // GraphPath ?>
		<td data-name="GraphPath">
<span id="el$rowindex$_lab_test_result_GraphPath" class="form-group lab_test_result_GraphPath">
<input type="text" data-table="lab_test_result" data-field="x_GraphPath" name="x<?php echo $lab_test_result_list->RowIndex ?>_GraphPath" id="x<?php echo $lab_test_result_list->RowIndex ?>_GraphPath" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($lab_test_result->GraphPath->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->GraphPath->EditValue ?>"<?php echo $lab_test_result->GraphPath->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_GraphPath" name="o<?php echo $lab_test_result_list->RowIndex ?>_GraphPath" id="o<?php echo $lab_test_result_list->RowIndex ?>_GraphPath" value="<?php echo HtmlEncode($lab_test_result->GraphPath->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result->SampleDate->Visible) { // SampleDate ?>
		<td data-name="SampleDate">
<span id="el$rowindex$_lab_test_result_SampleDate" class="form-group lab_test_result_SampleDate">
<input type="text" data-table="lab_test_result" data-field="x_SampleDate" name="x<?php echo $lab_test_result_list->RowIndex ?>_SampleDate" id="x<?php echo $lab_test_result_list->RowIndex ?>_SampleDate" placeholder="<?php echo HtmlEncode($lab_test_result->SampleDate->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->SampleDate->EditValue ?>"<?php echo $lab_test_result->SampleDate->editAttributes() ?>>
<?php if (!$lab_test_result->SampleDate->ReadOnly && !$lab_test_result->SampleDate->Disabled && !isset($lab_test_result->SampleDate->EditAttrs["readonly"]) && !isset($lab_test_result->SampleDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("flab_test_resultlist", "x<?php echo $lab_test_result_list->RowIndex ?>_SampleDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_SampleDate" name="o<?php echo $lab_test_result_list->RowIndex ?>_SampleDate" id="o<?php echo $lab_test_result_list->RowIndex ?>_SampleDate" value="<?php echo HtmlEncode($lab_test_result->SampleDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result->SampleUser->Visible) { // SampleUser ?>
		<td data-name="SampleUser">
<span id="el$rowindex$_lab_test_result_SampleUser" class="form-group lab_test_result_SampleUser">
<input type="text" data-table="lab_test_result" data-field="x_SampleUser" name="x<?php echo $lab_test_result_list->RowIndex ?>_SampleUser" id="x<?php echo $lab_test_result_list->RowIndex ?>_SampleUser" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($lab_test_result->SampleUser->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->SampleUser->EditValue ?>"<?php echo $lab_test_result->SampleUser->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_SampleUser" name="o<?php echo $lab_test_result_list->RowIndex ?>_SampleUser" id="o<?php echo $lab_test_result_list->RowIndex ?>_SampleUser" value="<?php echo HtmlEncode($lab_test_result->SampleUser->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result->ReceivedDate->Visible) { // ReceivedDate ?>
		<td data-name="ReceivedDate">
<span id="el$rowindex$_lab_test_result_ReceivedDate" class="form-group lab_test_result_ReceivedDate">
<input type="text" data-table="lab_test_result" data-field="x_ReceivedDate" name="x<?php echo $lab_test_result_list->RowIndex ?>_ReceivedDate" id="x<?php echo $lab_test_result_list->RowIndex ?>_ReceivedDate" placeholder="<?php echo HtmlEncode($lab_test_result->ReceivedDate->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->ReceivedDate->EditValue ?>"<?php echo $lab_test_result->ReceivedDate->editAttributes() ?>>
<?php if (!$lab_test_result->ReceivedDate->ReadOnly && !$lab_test_result->ReceivedDate->Disabled && !isset($lab_test_result->ReceivedDate->EditAttrs["readonly"]) && !isset($lab_test_result->ReceivedDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("flab_test_resultlist", "x<?php echo $lab_test_result_list->RowIndex ?>_ReceivedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_ReceivedDate" name="o<?php echo $lab_test_result_list->RowIndex ?>_ReceivedDate" id="o<?php echo $lab_test_result_list->RowIndex ?>_ReceivedDate" value="<?php echo HtmlEncode($lab_test_result->ReceivedDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result->ReceivedUser->Visible) { // ReceivedUser ?>
		<td data-name="ReceivedUser">
<span id="el$rowindex$_lab_test_result_ReceivedUser" class="form-group lab_test_result_ReceivedUser">
<input type="text" data-table="lab_test_result" data-field="x_ReceivedUser" name="x<?php echo $lab_test_result_list->RowIndex ?>_ReceivedUser" id="x<?php echo $lab_test_result_list->RowIndex ?>_ReceivedUser" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($lab_test_result->ReceivedUser->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->ReceivedUser->EditValue ?>"<?php echo $lab_test_result->ReceivedUser->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_ReceivedUser" name="o<?php echo $lab_test_result_list->RowIndex ?>_ReceivedUser" id="o<?php echo $lab_test_result_list->RowIndex ?>_ReceivedUser" value="<?php echo HtmlEncode($lab_test_result->ReceivedUser->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result->DeptRecvDate->Visible) { // DeptRecvDate ?>
		<td data-name="DeptRecvDate">
<span id="el$rowindex$_lab_test_result_DeptRecvDate" class="form-group lab_test_result_DeptRecvDate">
<input type="text" data-table="lab_test_result" data-field="x_DeptRecvDate" name="x<?php echo $lab_test_result_list->RowIndex ?>_DeptRecvDate" id="x<?php echo $lab_test_result_list->RowIndex ?>_DeptRecvDate" placeholder="<?php echo HtmlEncode($lab_test_result->DeptRecvDate->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->DeptRecvDate->EditValue ?>"<?php echo $lab_test_result->DeptRecvDate->editAttributes() ?>>
<?php if (!$lab_test_result->DeptRecvDate->ReadOnly && !$lab_test_result->DeptRecvDate->Disabled && !isset($lab_test_result->DeptRecvDate->EditAttrs["readonly"]) && !isset($lab_test_result->DeptRecvDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("flab_test_resultlist", "x<?php echo $lab_test_result_list->RowIndex ?>_DeptRecvDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_DeptRecvDate" name="o<?php echo $lab_test_result_list->RowIndex ?>_DeptRecvDate" id="o<?php echo $lab_test_result_list->RowIndex ?>_DeptRecvDate" value="<?php echo HtmlEncode($lab_test_result->DeptRecvDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result->DeptRecvUser->Visible) { // DeptRecvUser ?>
		<td data-name="DeptRecvUser">
<span id="el$rowindex$_lab_test_result_DeptRecvUser" class="form-group lab_test_result_DeptRecvUser">
<input type="text" data-table="lab_test_result" data-field="x_DeptRecvUser" name="x<?php echo $lab_test_result_list->RowIndex ?>_DeptRecvUser" id="x<?php echo $lab_test_result_list->RowIndex ?>_DeptRecvUser" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($lab_test_result->DeptRecvUser->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->DeptRecvUser->EditValue ?>"<?php echo $lab_test_result->DeptRecvUser->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_DeptRecvUser" name="o<?php echo $lab_test_result_list->RowIndex ?>_DeptRecvUser" id="o<?php echo $lab_test_result_list->RowIndex ?>_DeptRecvUser" value="<?php echo HtmlEncode($lab_test_result->DeptRecvUser->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result->PrintBy->Visible) { // PrintBy ?>
		<td data-name="PrintBy">
<span id="el$rowindex$_lab_test_result_PrintBy" class="form-group lab_test_result_PrintBy">
<input type="text" data-table="lab_test_result" data-field="x_PrintBy" name="x<?php echo $lab_test_result_list->RowIndex ?>_PrintBy" id="x<?php echo $lab_test_result_list->RowIndex ?>_PrintBy" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($lab_test_result->PrintBy->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->PrintBy->EditValue ?>"<?php echo $lab_test_result->PrintBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_PrintBy" name="o<?php echo $lab_test_result_list->RowIndex ?>_PrintBy" id="o<?php echo $lab_test_result_list->RowIndex ?>_PrintBy" value="<?php echo HtmlEncode($lab_test_result->PrintBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result->PrintDate->Visible) { // PrintDate ?>
		<td data-name="PrintDate">
<span id="el$rowindex$_lab_test_result_PrintDate" class="form-group lab_test_result_PrintDate">
<input type="text" data-table="lab_test_result" data-field="x_PrintDate" name="x<?php echo $lab_test_result_list->RowIndex ?>_PrintDate" id="x<?php echo $lab_test_result_list->RowIndex ?>_PrintDate" placeholder="<?php echo HtmlEncode($lab_test_result->PrintDate->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->PrintDate->EditValue ?>"<?php echo $lab_test_result->PrintDate->editAttributes() ?>>
<?php if (!$lab_test_result->PrintDate->ReadOnly && !$lab_test_result->PrintDate->Disabled && !isset($lab_test_result->PrintDate->EditAttrs["readonly"]) && !isset($lab_test_result->PrintDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("flab_test_resultlist", "x<?php echo $lab_test_result_list->RowIndex ?>_PrintDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_PrintDate" name="o<?php echo $lab_test_result_list->RowIndex ?>_PrintDate" id="o<?php echo $lab_test_result_list->RowIndex ?>_PrintDate" value="<?php echo HtmlEncode($lab_test_result->PrintDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result->MachineCD->Visible) { // MachineCD ?>
		<td data-name="MachineCD">
<span id="el$rowindex$_lab_test_result_MachineCD" class="form-group lab_test_result_MachineCD">
<input type="text" data-table="lab_test_result" data-field="x_MachineCD" name="x<?php echo $lab_test_result_list->RowIndex ?>_MachineCD" id="x<?php echo $lab_test_result_list->RowIndex ?>_MachineCD" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($lab_test_result->MachineCD->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->MachineCD->EditValue ?>"<?php echo $lab_test_result->MachineCD->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_MachineCD" name="o<?php echo $lab_test_result_list->RowIndex ?>_MachineCD" id="o<?php echo $lab_test_result_list->RowIndex ?>_MachineCD" value="<?php echo HtmlEncode($lab_test_result->MachineCD->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result->TestCancel->Visible) { // TestCancel ?>
		<td data-name="TestCancel">
<span id="el$rowindex$_lab_test_result_TestCancel" class="form-group lab_test_result_TestCancel">
<input type="text" data-table="lab_test_result" data-field="x_TestCancel" name="x<?php echo $lab_test_result_list->RowIndex ?>_TestCancel" id="x<?php echo $lab_test_result_list->RowIndex ?>_TestCancel" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result->TestCancel->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->TestCancel->EditValue ?>"<?php echo $lab_test_result->TestCancel->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_TestCancel" name="o<?php echo $lab_test_result_list->RowIndex ?>_TestCancel" id="o<?php echo $lab_test_result_list->RowIndex ?>_TestCancel" value="<?php echo HtmlEncode($lab_test_result->TestCancel->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result->OutSource->Visible) { // OutSource ?>
		<td data-name="OutSource">
<span id="el$rowindex$_lab_test_result_OutSource" class="form-group lab_test_result_OutSource">
<input type="text" data-table="lab_test_result" data-field="x_OutSource" name="x<?php echo $lab_test_result_list->RowIndex ?>_OutSource" id="x<?php echo $lab_test_result_list->RowIndex ?>_OutSource" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result->OutSource->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->OutSource->EditValue ?>"<?php echo $lab_test_result->OutSource->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_OutSource" name="o<?php echo $lab_test_result_list->RowIndex ?>_OutSource" id="o<?php echo $lab_test_result_list->RowIndex ?>_OutSource" value="<?php echo HtmlEncode($lab_test_result->OutSource->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result->Tariff->Visible) { // Tariff ?>
		<td data-name="Tariff">
<span id="el$rowindex$_lab_test_result_Tariff" class="form-group lab_test_result_Tariff">
<input type="text" data-table="lab_test_result" data-field="x_Tariff" name="x<?php echo $lab_test_result_list->RowIndex ?>_Tariff" id="x<?php echo $lab_test_result_list->RowIndex ?>_Tariff" size="30" placeholder="<?php echo HtmlEncode($lab_test_result->Tariff->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->Tariff->EditValue ?>"<?php echo $lab_test_result->Tariff->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Tariff" name="o<?php echo $lab_test_result_list->RowIndex ?>_Tariff" id="o<?php echo $lab_test_result_list->RowIndex ?>_Tariff" value="<?php echo HtmlEncode($lab_test_result->Tariff->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result->EDITDATE->Visible) { // EDITDATE ?>
		<td data-name="EDITDATE">
<span id="el$rowindex$_lab_test_result_EDITDATE" class="form-group lab_test_result_EDITDATE">
<input type="text" data-table="lab_test_result" data-field="x_EDITDATE" name="x<?php echo $lab_test_result_list->RowIndex ?>_EDITDATE" id="x<?php echo $lab_test_result_list->RowIndex ?>_EDITDATE" placeholder="<?php echo HtmlEncode($lab_test_result->EDITDATE->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->EDITDATE->EditValue ?>"<?php echo $lab_test_result->EDITDATE->editAttributes() ?>>
<?php if (!$lab_test_result->EDITDATE->ReadOnly && !$lab_test_result->EDITDATE->Disabled && !isset($lab_test_result->EDITDATE->EditAttrs["readonly"]) && !isset($lab_test_result->EDITDATE->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("flab_test_resultlist", "x<?php echo $lab_test_result_list->RowIndex ?>_EDITDATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_EDITDATE" name="o<?php echo $lab_test_result_list->RowIndex ?>_EDITDATE" id="o<?php echo $lab_test_result_list->RowIndex ?>_EDITDATE" value="<?php echo HtmlEncode($lab_test_result->EDITDATE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result->UPLOAD->Visible) { // UPLOAD ?>
		<td data-name="UPLOAD">
<span id="el$rowindex$_lab_test_result_UPLOAD" class="form-group lab_test_result_UPLOAD">
<input type="text" data-table="lab_test_result" data-field="x_UPLOAD" name="x<?php echo $lab_test_result_list->RowIndex ?>_UPLOAD" id="x<?php echo $lab_test_result_list->RowIndex ?>_UPLOAD" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result->UPLOAD->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->UPLOAD->EditValue ?>"<?php echo $lab_test_result->UPLOAD->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_UPLOAD" name="o<?php echo $lab_test_result_list->RowIndex ?>_UPLOAD" id="o<?php echo $lab_test_result_list->RowIndex ?>_UPLOAD" value="<?php echo HtmlEncode($lab_test_result->UPLOAD->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result->SAuthDate->Visible) { // SAuthDate ?>
		<td data-name="SAuthDate">
<span id="el$rowindex$_lab_test_result_SAuthDate" class="form-group lab_test_result_SAuthDate">
<input type="text" data-table="lab_test_result" data-field="x_SAuthDate" name="x<?php echo $lab_test_result_list->RowIndex ?>_SAuthDate" id="x<?php echo $lab_test_result_list->RowIndex ?>_SAuthDate" placeholder="<?php echo HtmlEncode($lab_test_result->SAuthDate->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->SAuthDate->EditValue ?>"<?php echo $lab_test_result->SAuthDate->editAttributes() ?>>
<?php if (!$lab_test_result->SAuthDate->ReadOnly && !$lab_test_result->SAuthDate->Disabled && !isset($lab_test_result->SAuthDate->EditAttrs["readonly"]) && !isset($lab_test_result->SAuthDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("flab_test_resultlist", "x<?php echo $lab_test_result_list->RowIndex ?>_SAuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_SAuthDate" name="o<?php echo $lab_test_result_list->RowIndex ?>_SAuthDate" id="o<?php echo $lab_test_result_list->RowIndex ?>_SAuthDate" value="<?php echo HtmlEncode($lab_test_result->SAuthDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result->SAuthBy->Visible) { // SAuthBy ?>
		<td data-name="SAuthBy">
<span id="el$rowindex$_lab_test_result_SAuthBy" class="form-group lab_test_result_SAuthBy">
<input type="text" data-table="lab_test_result" data-field="x_SAuthBy" name="x<?php echo $lab_test_result_list->RowIndex ?>_SAuthBy" id="x<?php echo $lab_test_result_list->RowIndex ?>_SAuthBy" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($lab_test_result->SAuthBy->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->SAuthBy->EditValue ?>"<?php echo $lab_test_result->SAuthBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_SAuthBy" name="o<?php echo $lab_test_result_list->RowIndex ?>_SAuthBy" id="o<?php echo $lab_test_result_list->RowIndex ?>_SAuthBy" value="<?php echo HtmlEncode($lab_test_result->SAuthBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result->NoRC->Visible) { // NoRC ?>
		<td data-name="NoRC">
<span id="el$rowindex$_lab_test_result_NoRC" class="form-group lab_test_result_NoRC">
<input type="text" data-table="lab_test_result" data-field="x_NoRC" name="x<?php echo $lab_test_result_list->RowIndex ?>_NoRC" id="x<?php echo $lab_test_result_list->RowIndex ?>_NoRC" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result->NoRC->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->NoRC->EditValue ?>"<?php echo $lab_test_result->NoRC->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_NoRC" name="o<?php echo $lab_test_result_list->RowIndex ?>_NoRC" id="o<?php echo $lab_test_result_list->RowIndex ?>_NoRC" value="<?php echo HtmlEncode($lab_test_result->NoRC->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result->DispDt->Visible) { // DispDt ?>
		<td data-name="DispDt">
<span id="el$rowindex$_lab_test_result_DispDt" class="form-group lab_test_result_DispDt">
<input type="text" data-table="lab_test_result" data-field="x_DispDt" name="x<?php echo $lab_test_result_list->RowIndex ?>_DispDt" id="x<?php echo $lab_test_result_list->RowIndex ?>_DispDt" placeholder="<?php echo HtmlEncode($lab_test_result->DispDt->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->DispDt->EditValue ?>"<?php echo $lab_test_result->DispDt->editAttributes() ?>>
<?php if (!$lab_test_result->DispDt->ReadOnly && !$lab_test_result->DispDt->Disabled && !isset($lab_test_result->DispDt->EditAttrs["readonly"]) && !isset($lab_test_result->DispDt->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("flab_test_resultlist", "x<?php echo $lab_test_result_list->RowIndex ?>_DispDt", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_DispDt" name="o<?php echo $lab_test_result_list->RowIndex ?>_DispDt" id="o<?php echo $lab_test_result_list->RowIndex ?>_DispDt" value="<?php echo HtmlEncode($lab_test_result->DispDt->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result->DispUser->Visible) { // DispUser ?>
		<td data-name="DispUser">
<span id="el$rowindex$_lab_test_result_DispUser" class="form-group lab_test_result_DispUser">
<input type="text" data-table="lab_test_result" data-field="x_DispUser" name="x<?php echo $lab_test_result_list->RowIndex ?>_DispUser" id="x<?php echo $lab_test_result_list->RowIndex ?>_DispUser" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($lab_test_result->DispUser->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->DispUser->EditValue ?>"<?php echo $lab_test_result->DispUser->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_DispUser" name="o<?php echo $lab_test_result_list->RowIndex ?>_DispUser" id="o<?php echo $lab_test_result_list->RowIndex ?>_DispUser" value="<?php echo HtmlEncode($lab_test_result->DispUser->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result->DispRemarks->Visible) { // DispRemarks ?>
		<td data-name="DispRemarks">
<span id="el$rowindex$_lab_test_result_DispRemarks" class="form-group lab_test_result_DispRemarks">
<input type="text" data-table="lab_test_result" data-field="x_DispRemarks" name="x<?php echo $lab_test_result_list->RowIndex ?>_DispRemarks" id="x<?php echo $lab_test_result_list->RowIndex ?>_DispRemarks" size="30" maxlength="250" placeholder="<?php echo HtmlEncode($lab_test_result->DispRemarks->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->DispRemarks->EditValue ?>"<?php echo $lab_test_result->DispRemarks->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_DispRemarks" name="o<?php echo $lab_test_result_list->RowIndex ?>_DispRemarks" id="o<?php echo $lab_test_result_list->RowIndex ?>_DispRemarks" value="<?php echo HtmlEncode($lab_test_result->DispRemarks->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result->DispMode->Visible) { // DispMode ?>
		<td data-name="DispMode">
<span id="el$rowindex$_lab_test_result_DispMode" class="form-group lab_test_result_DispMode">
<input type="text" data-table="lab_test_result" data-field="x_DispMode" name="x<?php echo $lab_test_result_list->RowIndex ?>_DispMode" id="x<?php echo $lab_test_result_list->RowIndex ?>_DispMode" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($lab_test_result->DispMode->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->DispMode->EditValue ?>"<?php echo $lab_test_result->DispMode->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_DispMode" name="o<?php echo $lab_test_result_list->RowIndex ?>_DispMode" id="o<?php echo $lab_test_result_list->RowIndex ?>_DispMode" value="<?php echo HtmlEncode($lab_test_result->DispMode->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result->ProductCD->Visible) { // ProductCD ?>
		<td data-name="ProductCD">
<span id="el$rowindex$_lab_test_result_ProductCD" class="form-group lab_test_result_ProductCD">
<input type="text" data-table="lab_test_result" data-field="x_ProductCD" name="x<?php echo $lab_test_result_list->RowIndex ?>_ProductCD" id="x<?php echo $lab_test_result_list->RowIndex ?>_ProductCD" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($lab_test_result->ProductCD->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->ProductCD->EditValue ?>"<?php echo $lab_test_result->ProductCD->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_ProductCD" name="o<?php echo $lab_test_result_list->RowIndex ?>_ProductCD" id="o<?php echo $lab_test_result_list->RowIndex ?>_ProductCD" value="<?php echo HtmlEncode($lab_test_result->ProductCD->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result->Nos->Visible) { // Nos ?>
		<td data-name="Nos">
<span id="el$rowindex$_lab_test_result_Nos" class="form-group lab_test_result_Nos">
<input type="text" data-table="lab_test_result" data-field="x_Nos" name="x<?php echo $lab_test_result_list->RowIndex ?>_Nos" id="x<?php echo $lab_test_result_list->RowIndex ?>_Nos" size="30" placeholder="<?php echo HtmlEncode($lab_test_result->Nos->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->Nos->EditValue ?>"<?php echo $lab_test_result->Nos->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Nos" name="o<?php echo $lab_test_result_list->RowIndex ?>_Nos" id="o<?php echo $lab_test_result_list->RowIndex ?>_Nos" value="<?php echo HtmlEncode($lab_test_result->Nos->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result->WBCPath->Visible) { // WBCPath ?>
		<td data-name="WBCPath">
<span id="el$rowindex$_lab_test_result_WBCPath" class="form-group lab_test_result_WBCPath">
<input type="text" data-table="lab_test_result" data-field="x_WBCPath" name="x<?php echo $lab_test_result_list->RowIndex ?>_WBCPath" id="x<?php echo $lab_test_result_list->RowIndex ?>_WBCPath" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($lab_test_result->WBCPath->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->WBCPath->EditValue ?>"<?php echo $lab_test_result->WBCPath->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_WBCPath" name="o<?php echo $lab_test_result_list->RowIndex ?>_WBCPath" id="o<?php echo $lab_test_result_list->RowIndex ?>_WBCPath" value="<?php echo HtmlEncode($lab_test_result->WBCPath->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result->RBCPath->Visible) { // RBCPath ?>
		<td data-name="RBCPath">
<span id="el$rowindex$_lab_test_result_RBCPath" class="form-group lab_test_result_RBCPath">
<input type="text" data-table="lab_test_result" data-field="x_RBCPath" name="x<?php echo $lab_test_result_list->RowIndex ?>_RBCPath" id="x<?php echo $lab_test_result_list->RowIndex ?>_RBCPath" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($lab_test_result->RBCPath->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->RBCPath->EditValue ?>"<?php echo $lab_test_result->RBCPath->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_RBCPath" name="o<?php echo $lab_test_result_list->RowIndex ?>_RBCPath" id="o<?php echo $lab_test_result_list->RowIndex ?>_RBCPath" value="<?php echo HtmlEncode($lab_test_result->RBCPath->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result->PTPath->Visible) { // PTPath ?>
		<td data-name="PTPath">
<span id="el$rowindex$_lab_test_result_PTPath" class="form-group lab_test_result_PTPath">
<input type="text" data-table="lab_test_result" data-field="x_PTPath" name="x<?php echo $lab_test_result_list->RowIndex ?>_PTPath" id="x<?php echo $lab_test_result_list->RowIndex ?>_PTPath" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($lab_test_result->PTPath->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->PTPath->EditValue ?>"<?php echo $lab_test_result->PTPath->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_PTPath" name="o<?php echo $lab_test_result_list->RowIndex ?>_PTPath" id="o<?php echo $lab_test_result_list->RowIndex ?>_PTPath" value="<?php echo HtmlEncode($lab_test_result->PTPath->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result->ActualAmt->Visible) { // ActualAmt ?>
		<td data-name="ActualAmt">
<span id="el$rowindex$_lab_test_result_ActualAmt" class="form-group lab_test_result_ActualAmt">
<input type="text" data-table="lab_test_result" data-field="x_ActualAmt" name="x<?php echo $lab_test_result_list->RowIndex ?>_ActualAmt" id="x<?php echo $lab_test_result_list->RowIndex ?>_ActualAmt" size="30" placeholder="<?php echo HtmlEncode($lab_test_result->ActualAmt->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->ActualAmt->EditValue ?>"<?php echo $lab_test_result->ActualAmt->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_ActualAmt" name="o<?php echo $lab_test_result_list->RowIndex ?>_ActualAmt" id="o<?php echo $lab_test_result_list->RowIndex ?>_ActualAmt" value="<?php echo HtmlEncode($lab_test_result->ActualAmt->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result->NoSign->Visible) { // NoSign ?>
		<td data-name="NoSign">
<span id="el$rowindex$_lab_test_result_NoSign" class="form-group lab_test_result_NoSign">
<input type="text" data-table="lab_test_result" data-field="x_NoSign" name="x<?php echo $lab_test_result_list->RowIndex ?>_NoSign" id="x<?php echo $lab_test_result_list->RowIndex ?>_NoSign" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result->NoSign->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->NoSign->EditValue ?>"<?php echo $lab_test_result->NoSign->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_NoSign" name="o<?php echo $lab_test_result_list->RowIndex ?>_NoSign" id="o<?php echo $lab_test_result_list->RowIndex ?>_NoSign" value="<?php echo HtmlEncode($lab_test_result->NoSign->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result->_Barcode->Visible) { // Barcode ?>
		<td data-name="_Barcode">
<span id="el$rowindex$_lab_test_result__Barcode" class="form-group lab_test_result__Barcode">
<input type="text" data-table="lab_test_result" data-field="x__Barcode" name="x<?php echo $lab_test_result_list->RowIndex ?>__Barcode" id="x<?php echo $lab_test_result_list->RowIndex ?>__Barcode" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result->_Barcode->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->_Barcode->EditValue ?>"<?php echo $lab_test_result->_Barcode->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x__Barcode" name="o<?php echo $lab_test_result_list->RowIndex ?>__Barcode" id="o<?php echo $lab_test_result_list->RowIndex ?>__Barcode" value="<?php echo HtmlEncode($lab_test_result->_Barcode->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result->ReadTime->Visible) { // ReadTime ?>
		<td data-name="ReadTime">
<span id="el$rowindex$_lab_test_result_ReadTime" class="form-group lab_test_result_ReadTime">
<input type="text" data-table="lab_test_result" data-field="x_ReadTime" name="x<?php echo $lab_test_result_list->RowIndex ?>_ReadTime" id="x<?php echo $lab_test_result_list->RowIndex ?>_ReadTime" placeholder="<?php echo HtmlEncode($lab_test_result->ReadTime->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->ReadTime->EditValue ?>"<?php echo $lab_test_result->ReadTime->editAttributes() ?>>
<?php if (!$lab_test_result->ReadTime->ReadOnly && !$lab_test_result->ReadTime->Disabled && !isset($lab_test_result->ReadTime->EditAttrs["readonly"]) && !isset($lab_test_result->ReadTime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("flab_test_resultlist", "x<?php echo $lab_test_result_list->RowIndex ?>_ReadTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_ReadTime" name="o<?php echo $lab_test_result_list->RowIndex ?>_ReadTime" id="o<?php echo $lab_test_result_list->RowIndex ?>_ReadTime" value="<?php echo HtmlEncode($lab_test_result->ReadTime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result->VailID->Visible) { // VailID ?>
		<td data-name="VailID">
<span id="el$rowindex$_lab_test_result_VailID" class="form-group lab_test_result_VailID">
<input type="text" data-table="lab_test_result" data-field="x_VailID" name="x<?php echo $lab_test_result_list->RowIndex ?>_VailID" id="x<?php echo $lab_test_result_list->RowIndex ?>_VailID" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($lab_test_result->VailID->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->VailID->EditValue ?>"<?php echo $lab_test_result->VailID->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_VailID" name="o<?php echo $lab_test_result_list->RowIndex ?>_VailID" id="o<?php echo $lab_test_result_list->RowIndex ?>_VailID" value="<?php echo HtmlEncode($lab_test_result->VailID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result->ReadMachine->Visible) { // ReadMachine ?>
		<td data-name="ReadMachine">
<span id="el$rowindex$_lab_test_result_ReadMachine" class="form-group lab_test_result_ReadMachine">
<input type="text" data-table="lab_test_result" data-field="x_ReadMachine" name="x<?php echo $lab_test_result_list->RowIndex ?>_ReadMachine" id="x<?php echo $lab_test_result_list->RowIndex ?>_ReadMachine" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($lab_test_result->ReadMachine->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->ReadMachine->EditValue ?>"<?php echo $lab_test_result->ReadMachine->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_ReadMachine" name="o<?php echo $lab_test_result_list->RowIndex ?>_ReadMachine" id="o<?php echo $lab_test_result_list->RowIndex ?>_ReadMachine" value="<?php echo HtmlEncode($lab_test_result->ReadMachine->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result->LabCD->Visible) { // LabCD ?>
		<td data-name="LabCD">
<span id="el$rowindex$_lab_test_result_LabCD" class="form-group lab_test_result_LabCD">
<input type="text" data-table="lab_test_result" data-field="x_LabCD" name="x<?php echo $lab_test_result_list->RowIndex ?>_LabCD" id="x<?php echo $lab_test_result_list->RowIndex ?>_LabCD" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($lab_test_result->LabCD->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->LabCD->EditValue ?>"<?php echo $lab_test_result->LabCD->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_LabCD" name="o<?php echo $lab_test_result_list->RowIndex ?>_LabCD" id="o<?php echo $lab_test_result_list->RowIndex ?>_LabCD" value="<?php echo HtmlEncode($lab_test_result->LabCD->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result->OutLabAmt->Visible) { // OutLabAmt ?>
		<td data-name="OutLabAmt">
<span id="el$rowindex$_lab_test_result_OutLabAmt" class="form-group lab_test_result_OutLabAmt">
<input type="text" data-table="lab_test_result" data-field="x_OutLabAmt" name="x<?php echo $lab_test_result_list->RowIndex ?>_OutLabAmt" id="x<?php echo $lab_test_result_list->RowIndex ?>_OutLabAmt" size="30" placeholder="<?php echo HtmlEncode($lab_test_result->OutLabAmt->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->OutLabAmt->EditValue ?>"<?php echo $lab_test_result->OutLabAmt->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_OutLabAmt" name="o<?php echo $lab_test_result_list->RowIndex ?>_OutLabAmt" id="o<?php echo $lab_test_result_list->RowIndex ?>_OutLabAmt" value="<?php echo HtmlEncode($lab_test_result->OutLabAmt->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result->ProductQty->Visible) { // ProductQty ?>
		<td data-name="ProductQty">
<span id="el$rowindex$_lab_test_result_ProductQty" class="form-group lab_test_result_ProductQty">
<input type="text" data-table="lab_test_result" data-field="x_ProductQty" name="x<?php echo $lab_test_result_list->RowIndex ?>_ProductQty" id="x<?php echo $lab_test_result_list->RowIndex ?>_ProductQty" size="30" placeholder="<?php echo HtmlEncode($lab_test_result->ProductQty->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->ProductQty->EditValue ?>"<?php echo $lab_test_result->ProductQty->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_ProductQty" name="o<?php echo $lab_test_result_list->RowIndex ?>_ProductQty" id="o<?php echo $lab_test_result_list->RowIndex ?>_ProductQty" value="<?php echo HtmlEncode($lab_test_result->ProductQty->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result->Repeat->Visible) { // Repeat ?>
		<td data-name="Repeat">
<span id="el$rowindex$_lab_test_result_Repeat" class="form-group lab_test_result_Repeat">
<input type="text" data-table="lab_test_result" data-field="x_Repeat" name="x<?php echo $lab_test_result_list->RowIndex ?>_Repeat" id="x<?php echo $lab_test_result_list->RowIndex ?>_Repeat" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result->Repeat->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->Repeat->EditValue ?>"<?php echo $lab_test_result->Repeat->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Repeat" name="o<?php echo $lab_test_result_list->RowIndex ?>_Repeat" id="o<?php echo $lab_test_result_list->RowIndex ?>_Repeat" value="<?php echo HtmlEncode($lab_test_result->Repeat->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result->DeptNo->Visible) { // DeptNo ?>
		<td data-name="DeptNo">
<span id="el$rowindex$_lab_test_result_DeptNo" class="form-group lab_test_result_DeptNo">
<input type="text" data-table="lab_test_result" data-field="x_DeptNo" name="x<?php echo $lab_test_result_list->RowIndex ?>_DeptNo" id="x<?php echo $lab_test_result_list->RowIndex ?>_DeptNo" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($lab_test_result->DeptNo->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->DeptNo->EditValue ?>"<?php echo $lab_test_result->DeptNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_DeptNo" name="o<?php echo $lab_test_result_list->RowIndex ?>_DeptNo" id="o<?php echo $lab_test_result_list->RowIndex ?>_DeptNo" value="<?php echo HtmlEncode($lab_test_result->DeptNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result->Desc1->Visible) { // Desc1 ?>
		<td data-name="Desc1">
<span id="el$rowindex$_lab_test_result_Desc1" class="form-group lab_test_result_Desc1">
<input type="text" data-table="lab_test_result" data-field="x_Desc1" name="x<?php echo $lab_test_result_list->RowIndex ?>_Desc1" id="x<?php echo $lab_test_result_list->RowIndex ?>_Desc1" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($lab_test_result->Desc1->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->Desc1->EditValue ?>"<?php echo $lab_test_result->Desc1->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Desc1" name="o<?php echo $lab_test_result_list->RowIndex ?>_Desc1" id="o<?php echo $lab_test_result_list->RowIndex ?>_Desc1" value="<?php echo HtmlEncode($lab_test_result->Desc1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result->Desc2->Visible) { // Desc2 ?>
		<td data-name="Desc2">
<span id="el$rowindex$_lab_test_result_Desc2" class="form-group lab_test_result_Desc2">
<input type="text" data-table="lab_test_result" data-field="x_Desc2" name="x<?php echo $lab_test_result_list->RowIndex ?>_Desc2" id="x<?php echo $lab_test_result_list->RowIndex ?>_Desc2" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($lab_test_result->Desc2->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->Desc2->EditValue ?>"<?php echo $lab_test_result->Desc2->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Desc2" name="o<?php echo $lab_test_result_list->RowIndex ?>_Desc2" id="o<?php echo $lab_test_result_list->RowIndex ?>_Desc2" value="<?php echo HtmlEncode($lab_test_result->Desc2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result->RptResult->Visible) { // RptResult ?>
		<td data-name="RptResult">
<span id="el$rowindex$_lab_test_result_RptResult" class="form-group lab_test_result_RptResult">
<input type="text" data-table="lab_test_result" data-field="x_RptResult" name="x<?php echo $lab_test_result_list->RowIndex ?>_RptResult" id="x<?php echo $lab_test_result_list->RowIndex ?>_RptResult" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($lab_test_result->RptResult->getPlaceHolder()) ?>" value="<?php echo $lab_test_result->RptResult->EditValue ?>"<?php echo $lab_test_result->RptResult->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_RptResult" name="o<?php echo $lab_test_result_list->RowIndex ?>_RptResult" id="o<?php echo $lab_test_result_list->RowIndex ?>_RptResult" value="<?php echo HtmlEncode($lab_test_result->RptResult->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$lab_test_result_list->ListOptions->render("body", "right", $lab_test_result_list->RowIndex);
?>
<script>
flab_test_resultlist.updateLists(<?php echo $lab_test_result_list->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if ($lab_test_result->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $lab_test_result_list->FormKeyCountName ?>" id="<?php echo $lab_test_result_list->FormKeyCountName ?>" value="<?php echo $lab_test_result_list->KeyCount ?>">
<?php echo $lab_test_result_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$lab_test_result->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($lab_test_result_list->Recordset)
	$lab_test_result_list->Recordset->Close();
?>
<?php if (!$lab_test_result->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$lab_test_result->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($lab_test_result_list->Pager)) $lab_test_result_list->Pager = new NumericPager($lab_test_result_list->StartRec, $lab_test_result_list->DisplayRecs, $lab_test_result_list->TotalRecs, $lab_test_result_list->RecRange, $lab_test_result_list->AutoHidePager) ?>
<?php if ($lab_test_result_list->Pager->RecordCount > 0 && $lab_test_result_list->Pager->Visible) { ?>
<div class="ew-pager">
<div class="ew-numeric-page"><ul class="pagination">
	<?php if ($lab_test_result_list->Pager->FirstButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_test_result_list->pageUrl() ?>start=<?php echo $lab_test_result_list->Pager->FirstButton->Start ?>"><?php echo $Language->Phrase("PagerFirst") ?></a></li>
	<?php } ?>
	<?php if ($lab_test_result_list->Pager->PrevButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_test_result_list->pageUrl() ?>start=<?php echo $lab_test_result_list->Pager->PrevButton->Start ?>"><?php echo $Language->Phrase("PagerPrevious") ?></a></li>
	<?php } ?>
	<?php foreach ($lab_test_result_list->Pager->Items as $pagerItem) { ?>
		<li class="page-item<?php if (!$pagerItem->Enabled) { ?> active<?php } ?>"><a class="page-link" href="<?php if ($pagerItem->Enabled) { echo $lab_test_result_list->pageUrl() . "start=" . $pagerItem->Start; } else { echo "#"; } ?>"><?php echo $pagerItem->Text ?></a></li>
	<?php } ?>
	<?php if ($lab_test_result_list->Pager->NextButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_test_result_list->pageUrl() ?>start=<?php echo $lab_test_result_list->Pager->NextButton->Start ?>"><?php echo $Language->Phrase("PagerNext") ?></a></li>
	<?php } ?>
	<?php if ($lab_test_result_list->Pager->LastButton->Enabled) { ?>
	<li class="page-item"><a class="page-link" href="<?php echo $lab_test_result_list->pageUrl() ?>start=<?php echo $lab_test_result_list->Pager->LastButton->Start ?>"><?php echo $Language->Phrase("PagerLast") ?></a></li>
	<?php } ?>
</ul></div>
</div>
<?php } ?>
<?php if ($lab_test_result_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $lab_test_result_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $lab_test_result_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $lab_test_result_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($lab_test_result_list->TotalRecs > 0 && (!$lab_test_result_list->AutoHidePageSizeSelector || $lab_test_result_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="lab_test_result">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="20"<?php if ($lab_test_result_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="40"<?php if ($lab_test_result_list->DisplayRecs == 40) { ?> selected<?php } ?>>40</option>
<option value="60"<?php if ($lab_test_result_list->DisplayRecs == 60) { ?> selected<?php } ?>>60</option>
<option value="100"<?php if ($lab_test_result_list->DisplayRecs == 100) { ?> selected<?php } ?>>100</option>
<option value="500"<?php if ($lab_test_result_list->DisplayRecs == 500) { ?> selected<?php } ?>>500</option>
<option value="1000"<?php if ($lab_test_result_list->DisplayRecs == 1000) { ?> selected<?php } ?>>1000</option>
<option value="ALL"<?php if ($lab_test_result->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $lab_test_result_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($lab_test_result_list->TotalRecs == 0 && !$lab_test_result->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $lab_test_result_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$lab_test_result_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$lab_test_result->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php if (!$lab_test_result->isExport()) { ?>
<script>
ew.scrollableTable("gmp_lab_test_result", "95%", "");
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$lab_test_result_list->terminate();
?>