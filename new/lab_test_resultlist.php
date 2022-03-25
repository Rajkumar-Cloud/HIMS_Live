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
<?php include_once "header.php"; ?>
<?php if (!$lab_test_result_list->isExport()) { ?>
<script>
var flab_test_resultlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	flab_test_resultlist = currentForm = new ew.Form("flab_test_resultlist", "list");
	flab_test_resultlist.formKeyCountName = '<?php echo $lab_test_result_list->FormKeyCountName ?>';

	// Validate form
	flab_test_resultlist.validate = function() {
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
			var checkrow = (gridinsert) ? !this.emptyRow(infix) : true;
			if (checkrow) {
				addcnt++;
			<?php if ($lab_test_result_list->Branch->Required) { ?>
				elm = this.getElements("x" + infix + "_Branch");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result_list->Branch->caption(), $lab_test_result_list->Branch->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_result_list->SidNo->Required) { ?>
				elm = this.getElements("x" + infix + "_SidNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result_list->SidNo->caption(), $lab_test_result_list->SidNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_result_list->SidDate->Required) { ?>
				elm = this.getElements("x" + infix + "_SidDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result_list->SidDate->caption(), $lab_test_result_list->SidDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SidDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_test_result_list->SidDate->errorMessage()) ?>");
			<?php if ($lab_test_result_list->TestCd->Required) { ?>
				elm = this.getElements("x" + infix + "_TestCd");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result_list->TestCd->caption(), $lab_test_result_list->TestCd->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_result_list->TestSubCd->Required) { ?>
				elm = this.getElements("x" + infix + "_TestSubCd");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result_list->TestSubCd->caption(), $lab_test_result_list->TestSubCd->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_result_list->DEptCd->Required) { ?>
				elm = this.getElements("x" + infix + "_DEptCd");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result_list->DEptCd->caption(), $lab_test_result_list->DEptCd->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_result_list->ProfCd->Required) { ?>
				elm = this.getElements("x" + infix + "_ProfCd");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result_list->ProfCd->caption(), $lab_test_result_list->ProfCd->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_result_list->ResultDate->Required) { ?>
				elm = this.getElements("x" + infix + "_ResultDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result_list->ResultDate->caption(), $lab_test_result_list->ResultDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ResultDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_test_result_list->ResultDate->errorMessage()) ?>");
			<?php if ($lab_test_result_list->Method->Required) { ?>
				elm = this.getElements("x" + infix + "_Method");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result_list->Method->caption(), $lab_test_result_list->Method->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_result_list->Specimen->Required) { ?>
				elm = this.getElements("x" + infix + "_Specimen");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result_list->Specimen->caption(), $lab_test_result_list->Specimen->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_result_list->Amount->Required) { ?>
				elm = this.getElements("x" + infix + "_Amount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result_list->Amount->caption(), $lab_test_result_list->Amount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Amount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_test_result_list->Amount->errorMessage()) ?>");
			<?php if ($lab_test_result_list->ResultBy->Required) { ?>
				elm = this.getElements("x" + infix + "_ResultBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result_list->ResultBy->caption(), $lab_test_result_list->ResultBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_result_list->AuthBy->Required) { ?>
				elm = this.getElements("x" + infix + "_AuthBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result_list->AuthBy->caption(), $lab_test_result_list->AuthBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_result_list->AuthDate->Required) { ?>
				elm = this.getElements("x" + infix + "_AuthDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result_list->AuthDate->caption(), $lab_test_result_list->AuthDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_AuthDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_test_result_list->AuthDate->errorMessage()) ?>");
			<?php if ($lab_test_result_list->Abnormal->Required) { ?>
				elm = this.getElements("x" + infix + "_Abnormal");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result_list->Abnormal->caption(), $lab_test_result_list->Abnormal->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_result_list->Printed->Required) { ?>
				elm = this.getElements("x" + infix + "_Printed");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result_list->Printed->caption(), $lab_test_result_list->Printed->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_result_list->Dispatch->Required) { ?>
				elm = this.getElements("x" + infix + "_Dispatch");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result_list->Dispatch->caption(), $lab_test_result_list->Dispatch->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_result_list->LOWHIGH->Required) { ?>
				elm = this.getElements("x" + infix + "_LOWHIGH");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result_list->LOWHIGH->caption(), $lab_test_result_list->LOWHIGH->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_result_list->Unit->Required) { ?>
				elm = this.getElements("x" + infix + "_Unit");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result_list->Unit->caption(), $lab_test_result_list->Unit->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_result_list->ResDate->Required) { ?>
				elm = this.getElements("x" + infix + "_ResDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result_list->ResDate->caption(), $lab_test_result_list->ResDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ResDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_test_result_list->ResDate->errorMessage()) ?>");
			<?php if ($lab_test_result_list->Pic1->Required) { ?>
				elm = this.getElements("x" + infix + "_Pic1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result_list->Pic1->caption(), $lab_test_result_list->Pic1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_result_list->Pic2->Required) { ?>
				elm = this.getElements("x" + infix + "_Pic2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result_list->Pic2->caption(), $lab_test_result_list->Pic2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_result_list->GraphPath->Required) { ?>
				elm = this.getElements("x" + infix + "_GraphPath");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result_list->GraphPath->caption(), $lab_test_result_list->GraphPath->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_result_list->SampleDate->Required) { ?>
				elm = this.getElements("x" + infix + "_SampleDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result_list->SampleDate->caption(), $lab_test_result_list->SampleDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SampleDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_test_result_list->SampleDate->errorMessage()) ?>");
			<?php if ($lab_test_result_list->SampleUser->Required) { ?>
				elm = this.getElements("x" + infix + "_SampleUser");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result_list->SampleUser->caption(), $lab_test_result_list->SampleUser->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_result_list->ReceivedDate->Required) { ?>
				elm = this.getElements("x" + infix + "_ReceivedDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result_list->ReceivedDate->caption(), $lab_test_result_list->ReceivedDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ReceivedDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_test_result_list->ReceivedDate->errorMessage()) ?>");
			<?php if ($lab_test_result_list->ReceivedUser->Required) { ?>
				elm = this.getElements("x" + infix + "_ReceivedUser");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result_list->ReceivedUser->caption(), $lab_test_result_list->ReceivedUser->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_result_list->DeptRecvDate->Required) { ?>
				elm = this.getElements("x" + infix + "_DeptRecvDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result_list->DeptRecvDate->caption(), $lab_test_result_list->DeptRecvDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DeptRecvDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_test_result_list->DeptRecvDate->errorMessage()) ?>");
			<?php if ($lab_test_result_list->DeptRecvUser->Required) { ?>
				elm = this.getElements("x" + infix + "_DeptRecvUser");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result_list->DeptRecvUser->caption(), $lab_test_result_list->DeptRecvUser->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_result_list->PrintBy->Required) { ?>
				elm = this.getElements("x" + infix + "_PrintBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result_list->PrintBy->caption(), $lab_test_result_list->PrintBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_result_list->PrintDate->Required) { ?>
				elm = this.getElements("x" + infix + "_PrintDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result_list->PrintDate->caption(), $lab_test_result_list->PrintDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_PrintDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_test_result_list->PrintDate->errorMessage()) ?>");
			<?php if ($lab_test_result_list->MachineCD->Required) { ?>
				elm = this.getElements("x" + infix + "_MachineCD");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result_list->MachineCD->caption(), $lab_test_result_list->MachineCD->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_result_list->TestCancel->Required) { ?>
				elm = this.getElements("x" + infix + "_TestCancel");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result_list->TestCancel->caption(), $lab_test_result_list->TestCancel->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_result_list->OutSource->Required) { ?>
				elm = this.getElements("x" + infix + "_OutSource");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result_list->OutSource->caption(), $lab_test_result_list->OutSource->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_result_list->Tariff->Required) { ?>
				elm = this.getElements("x" + infix + "_Tariff");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result_list->Tariff->caption(), $lab_test_result_list->Tariff->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Tariff");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_test_result_list->Tariff->errorMessage()) ?>");
			<?php if ($lab_test_result_list->EDITDATE->Required) { ?>
				elm = this.getElements("x" + infix + "_EDITDATE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result_list->EDITDATE->caption(), $lab_test_result_list->EDITDATE->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_EDITDATE");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_test_result_list->EDITDATE->errorMessage()) ?>");
			<?php if ($lab_test_result_list->UPLOAD->Required) { ?>
				elm = this.getElements("x" + infix + "_UPLOAD");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result_list->UPLOAD->caption(), $lab_test_result_list->UPLOAD->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_result_list->SAuthDate->Required) { ?>
				elm = this.getElements("x" + infix + "_SAuthDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result_list->SAuthDate->caption(), $lab_test_result_list->SAuthDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SAuthDate");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_test_result_list->SAuthDate->errorMessage()) ?>");
			<?php if ($lab_test_result_list->SAuthBy->Required) { ?>
				elm = this.getElements("x" + infix + "_SAuthBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result_list->SAuthBy->caption(), $lab_test_result_list->SAuthBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_result_list->NoRC->Required) { ?>
				elm = this.getElements("x" + infix + "_NoRC");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result_list->NoRC->caption(), $lab_test_result_list->NoRC->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_result_list->DispDt->Required) { ?>
				elm = this.getElements("x" + infix + "_DispDt");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result_list->DispDt->caption(), $lab_test_result_list->DispDt->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DispDt");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_test_result_list->DispDt->errorMessage()) ?>");
			<?php if ($lab_test_result_list->DispUser->Required) { ?>
				elm = this.getElements("x" + infix + "_DispUser");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result_list->DispUser->caption(), $lab_test_result_list->DispUser->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_result_list->DispRemarks->Required) { ?>
				elm = this.getElements("x" + infix + "_DispRemarks");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result_list->DispRemarks->caption(), $lab_test_result_list->DispRemarks->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_result_list->DispMode->Required) { ?>
				elm = this.getElements("x" + infix + "_DispMode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result_list->DispMode->caption(), $lab_test_result_list->DispMode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_result_list->ProductCD->Required) { ?>
				elm = this.getElements("x" + infix + "_ProductCD");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result_list->ProductCD->caption(), $lab_test_result_list->ProductCD->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_result_list->Nos->Required) { ?>
				elm = this.getElements("x" + infix + "_Nos");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result_list->Nos->caption(), $lab_test_result_list->Nos->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Nos");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_test_result_list->Nos->errorMessage()) ?>");
			<?php if ($lab_test_result_list->WBCPath->Required) { ?>
				elm = this.getElements("x" + infix + "_WBCPath");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result_list->WBCPath->caption(), $lab_test_result_list->WBCPath->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_result_list->RBCPath->Required) { ?>
				elm = this.getElements("x" + infix + "_RBCPath");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result_list->RBCPath->caption(), $lab_test_result_list->RBCPath->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_result_list->PTPath->Required) { ?>
				elm = this.getElements("x" + infix + "_PTPath");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result_list->PTPath->caption(), $lab_test_result_list->PTPath->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_result_list->ActualAmt->Required) { ?>
				elm = this.getElements("x" + infix + "_ActualAmt");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result_list->ActualAmt->caption(), $lab_test_result_list->ActualAmt->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ActualAmt");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_test_result_list->ActualAmt->errorMessage()) ?>");
			<?php if ($lab_test_result_list->NoSign->Required) { ?>
				elm = this.getElements("x" + infix + "_NoSign");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result_list->NoSign->caption(), $lab_test_result_list->NoSign->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_result_list->_Barcode->Required) { ?>
				elm = this.getElements("x" + infix + "__Barcode");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result_list->_Barcode->caption(), $lab_test_result_list->_Barcode->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_result_list->ReadTime->Required) { ?>
				elm = this.getElements("x" + infix + "_ReadTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result_list->ReadTime->caption(), $lab_test_result_list->ReadTime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ReadTime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_test_result_list->ReadTime->errorMessage()) ?>");
			<?php if ($lab_test_result_list->VailID->Required) { ?>
				elm = this.getElements("x" + infix + "_VailID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result_list->VailID->caption(), $lab_test_result_list->VailID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_result_list->ReadMachine->Required) { ?>
				elm = this.getElements("x" + infix + "_ReadMachine");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result_list->ReadMachine->caption(), $lab_test_result_list->ReadMachine->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_result_list->LabCD->Required) { ?>
				elm = this.getElements("x" + infix + "_LabCD");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result_list->LabCD->caption(), $lab_test_result_list->LabCD->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_result_list->OutLabAmt->Required) { ?>
				elm = this.getElements("x" + infix + "_OutLabAmt");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result_list->OutLabAmt->caption(), $lab_test_result_list->OutLabAmt->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_OutLabAmt");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_test_result_list->OutLabAmt->errorMessage()) ?>");
			<?php if ($lab_test_result_list->ProductQty->Required) { ?>
				elm = this.getElements("x" + infix + "_ProductQty");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result_list->ProductQty->caption(), $lab_test_result_list->ProductQty->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ProductQty");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($lab_test_result_list->ProductQty->errorMessage()) ?>");
			<?php if ($lab_test_result_list->Repeat->Required) { ?>
				elm = this.getElements("x" + infix + "_Repeat");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result_list->Repeat->caption(), $lab_test_result_list->Repeat->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_result_list->DeptNo->Required) { ?>
				elm = this.getElements("x" + infix + "_DeptNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result_list->DeptNo->caption(), $lab_test_result_list->DeptNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_result_list->Desc1->Required) { ?>
				elm = this.getElements("x" + infix + "_Desc1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result_list->Desc1->caption(), $lab_test_result_list->Desc1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_result_list->Desc2->Required) { ?>
				elm = this.getElements("x" + infix + "_Desc2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result_list->Desc2->caption(), $lab_test_result_list->Desc2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($lab_test_result_list->RptResult->Required) { ?>
				elm = this.getElements("x" + infix + "_RptResult");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $lab_test_result_list->RptResult->caption(), $lab_test_result_list->RptResult->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
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

	// Form_CustomValidate
	flab_test_resultlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	flab_test_resultlist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("flab_test_resultlist");
});
var flab_test_resultlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	flab_test_resultlistsrch = currentSearchForm = new ew.Form("flab_test_resultlistsrch");

	// Validate function for search
	flab_test_resultlistsrch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_SidDate");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($lab_test_result_list->SidDate->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	flab_test_resultlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	flab_test_resultlistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	// Filters

	flab_test_resultlistsrch.filterList = <?php echo $lab_test_result_list->getFilterList() ?>;
	loadjs.done("flab_test_resultlistsrch");
});
</script>
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
<script>
loadjs.ready("head", function() {
	ew.PREVIEW_PLACEMENT = ew.CSS_FLIP ? "left" : "right";
	ew.PREVIEW_SINGLE_ROW = false;
	ew.PREVIEW_OVERLAY = false;
	loadjs("js/ewpreview.js", "preview");
});
</script>
<script>
ew.ready("head", "js/ewfixedheadertable.js", "fixedheadertable");
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$lab_test_result_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($lab_test_result_list->TotalRecords > 0 && $lab_test_result_list->ExportOptions->visible()) { ?>
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
<?php if (!$lab_test_result_list->isExport() && !$lab_test_result->CurrentAction) { ?>
<form name="flab_test_resultlistsrch" id="flab_test_resultlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="flab_test_resultlistsrch-search-panel" class="<?php echo $lab_test_result_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="lab_test_result">
	<div class="ew-extended-search">
<?php

// Render search row
$lab_test_result->RowType = ROWTYPE_SEARCH;
$lab_test_result->resetAttributes();
$lab_test_result_list->renderRow();
?>
<?php if ($lab_test_result_list->SidNo->Visible) { // SidNo ?>
	<?php
		$lab_test_result_list->SearchColumnCount++;
		if (($lab_test_result_list->SearchColumnCount - 1) % $lab_test_result_list->SearchFieldsPerRow == 0) {
			$lab_test_result_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $lab_test_result_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_SidNo" class="ew-cell form-group">
		<label for="x_SidNo" class="ew-search-caption ew-label"><?php echo $lab_test_result_list->SidNo->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_SidNo" id="z_SidNo" value="LIKE">
</span>
		<span id="el_lab_test_result_SidNo" class="ew-search-field">
<input type="text" data-table="lab_test_result" data-field="x_SidNo" name="x_SidNo" id="x_SidNo" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($lab_test_result_list->SidNo->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->SidNo->EditValue ?>"<?php echo $lab_test_result_list->SidNo->editAttributes() ?>>
</span>
	</div>
	<?php if ($lab_test_result_list->SearchColumnCount % $lab_test_result_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result_list->SidDate->Visible) { // SidDate ?>
	<?php
		$lab_test_result_list->SearchColumnCount++;
		if (($lab_test_result_list->SearchColumnCount - 1) % $lab_test_result_list->SearchFieldsPerRow == 0) {
			$lab_test_result_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $lab_test_result_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_SidDate" class="ew-cell form-group">
		<label for="x_SidDate" class="ew-search-caption ew-label"><?php echo $lab_test_result_list->SidDate->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_SidDate" id="z_SidDate" value="=">
</span>
		<span id="el_lab_test_result_SidDate" class="ew-search-field">
<input type="text" data-table="lab_test_result" data-field="x_SidDate" name="x_SidDate" id="x_SidDate" placeholder="<?php echo HtmlEncode($lab_test_result_list->SidDate->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->SidDate->EditValue ?>"<?php echo $lab_test_result_list->SidDate->editAttributes() ?>>
<?php if (!$lab_test_result_list->SidDate->ReadOnly && !$lab_test_result_list->SidDate->Disabled && !isset($lab_test_result_list->SidDate->EditAttrs["readonly"]) && !isset($lab_test_result_list->SidDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultlistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("flab_test_resultlistsrch", "x_SidDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
	</div>
	<?php if ($lab_test_result_list->SearchColumnCount % $lab_test_result_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($lab_test_result_list->SearchColumnCount % $lab_test_result_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $lab_test_result_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($lab_test_result_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($lab_test_result_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $lab_test_result_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($lab_test_result_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($lab_test_result_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($lab_test_result_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($lab_test_result_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $lab_test_result_list->showPageHeader(); ?>
<?php
$lab_test_result_list->showMessage();
?>
<?php if ($lab_test_result_list->TotalRecords > 0 || $lab_test_result->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($lab_test_result_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> lab_test_result">
<?php if (!$lab_test_result_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$lab_test_result_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $lab_test_result_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $lab_test_result_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="flab_test_resultlist" id="flab_test_resultlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_test_result">
<div id="gmp_lab_test_result" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($lab_test_result_list->TotalRecords > 0 || $lab_test_result_list->isGridEdit()) { ?>
<table id="tbl_lab_test_resultlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$lab_test_result->RowType = ROWTYPE_HEADER;

// Render list options
$lab_test_result_list->renderListOptions();

// Render list options (header, left)
$lab_test_result_list->ListOptions->render("header", "left");
?>
<?php if ($lab_test_result_list->Branch->Visible) { // Branch ?>
	<?php if ($lab_test_result_list->SortUrl($lab_test_result_list->Branch) == "") { ?>
		<th data-name="Branch" class="<?php echo $lab_test_result_list->Branch->headerCellClass() ?>"><div id="elh_lab_test_result_Branch" class="lab_test_result_Branch"><div class="ew-table-header-caption"><?php echo $lab_test_result_list->Branch->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Branch" class="<?php echo $lab_test_result_list->Branch->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_result_list->SortUrl($lab_test_result_list->Branch) ?>', 1);"><div id="elh_lab_test_result_Branch" class="lab_test_result_Branch">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result_list->Branch->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result_list->Branch->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_result_list->Branch->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result_list->SidNo->Visible) { // SidNo ?>
	<?php if ($lab_test_result_list->SortUrl($lab_test_result_list->SidNo) == "") { ?>
		<th data-name="SidNo" class="<?php echo $lab_test_result_list->SidNo->headerCellClass() ?>"><div id="elh_lab_test_result_SidNo" class="lab_test_result_SidNo"><div class="ew-table-header-caption"><?php echo $lab_test_result_list->SidNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SidNo" class="<?php echo $lab_test_result_list->SidNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_result_list->SortUrl($lab_test_result_list->SidNo) ?>', 1);"><div id="elh_lab_test_result_SidNo" class="lab_test_result_SidNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result_list->SidNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result_list->SidNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_result_list->SidNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result_list->SidDate->Visible) { // SidDate ?>
	<?php if ($lab_test_result_list->SortUrl($lab_test_result_list->SidDate) == "") { ?>
		<th data-name="SidDate" class="<?php echo $lab_test_result_list->SidDate->headerCellClass() ?>"><div id="elh_lab_test_result_SidDate" class="lab_test_result_SidDate"><div class="ew-table-header-caption"><?php echo $lab_test_result_list->SidDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SidDate" class="<?php echo $lab_test_result_list->SidDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_result_list->SortUrl($lab_test_result_list->SidDate) ?>', 1);"><div id="elh_lab_test_result_SidDate" class="lab_test_result_SidDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result_list->SidDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result_list->SidDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_result_list->SidDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result_list->TestCd->Visible) { // TestCd ?>
	<?php if ($lab_test_result_list->SortUrl($lab_test_result_list->TestCd) == "") { ?>
		<th data-name="TestCd" class="<?php echo $lab_test_result_list->TestCd->headerCellClass() ?>"><div id="elh_lab_test_result_TestCd" class="lab_test_result_TestCd"><div class="ew-table-header-caption"><?php echo $lab_test_result_list->TestCd->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestCd" class="<?php echo $lab_test_result_list->TestCd->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_result_list->SortUrl($lab_test_result_list->TestCd) ?>', 1);"><div id="elh_lab_test_result_TestCd" class="lab_test_result_TestCd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result_list->TestCd->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result_list->TestCd->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_result_list->TestCd->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result_list->TestSubCd->Visible) { // TestSubCd ?>
	<?php if ($lab_test_result_list->SortUrl($lab_test_result_list->TestSubCd) == "") { ?>
		<th data-name="TestSubCd" class="<?php echo $lab_test_result_list->TestSubCd->headerCellClass() ?>"><div id="elh_lab_test_result_TestSubCd" class="lab_test_result_TestSubCd"><div class="ew-table-header-caption"><?php echo $lab_test_result_list->TestSubCd->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestSubCd" class="<?php echo $lab_test_result_list->TestSubCd->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_result_list->SortUrl($lab_test_result_list->TestSubCd) ?>', 1);"><div id="elh_lab_test_result_TestSubCd" class="lab_test_result_TestSubCd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result_list->TestSubCd->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result_list->TestSubCd->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_result_list->TestSubCd->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result_list->DEptCd->Visible) { // DEptCd ?>
	<?php if ($lab_test_result_list->SortUrl($lab_test_result_list->DEptCd) == "") { ?>
		<th data-name="DEptCd" class="<?php echo $lab_test_result_list->DEptCd->headerCellClass() ?>"><div id="elh_lab_test_result_DEptCd" class="lab_test_result_DEptCd"><div class="ew-table-header-caption"><?php echo $lab_test_result_list->DEptCd->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DEptCd" class="<?php echo $lab_test_result_list->DEptCd->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_result_list->SortUrl($lab_test_result_list->DEptCd) ?>', 1);"><div id="elh_lab_test_result_DEptCd" class="lab_test_result_DEptCd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result_list->DEptCd->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result_list->DEptCd->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_result_list->DEptCd->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result_list->ProfCd->Visible) { // ProfCd ?>
	<?php if ($lab_test_result_list->SortUrl($lab_test_result_list->ProfCd) == "") { ?>
		<th data-name="ProfCd" class="<?php echo $lab_test_result_list->ProfCd->headerCellClass() ?>"><div id="elh_lab_test_result_ProfCd" class="lab_test_result_ProfCd"><div class="ew-table-header-caption"><?php echo $lab_test_result_list->ProfCd->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProfCd" class="<?php echo $lab_test_result_list->ProfCd->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_result_list->SortUrl($lab_test_result_list->ProfCd) ?>', 1);"><div id="elh_lab_test_result_ProfCd" class="lab_test_result_ProfCd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result_list->ProfCd->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result_list->ProfCd->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_result_list->ProfCd->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result_list->ResultDate->Visible) { // ResultDate ?>
	<?php if ($lab_test_result_list->SortUrl($lab_test_result_list->ResultDate) == "") { ?>
		<th data-name="ResultDate" class="<?php echo $lab_test_result_list->ResultDate->headerCellClass() ?>"><div id="elh_lab_test_result_ResultDate" class="lab_test_result_ResultDate"><div class="ew-table-header-caption"><?php echo $lab_test_result_list->ResultDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ResultDate" class="<?php echo $lab_test_result_list->ResultDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_result_list->SortUrl($lab_test_result_list->ResultDate) ?>', 1);"><div id="elh_lab_test_result_ResultDate" class="lab_test_result_ResultDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result_list->ResultDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result_list->ResultDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_result_list->ResultDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result_list->Method->Visible) { // Method ?>
	<?php if ($lab_test_result_list->SortUrl($lab_test_result_list->Method) == "") { ?>
		<th data-name="Method" class="<?php echo $lab_test_result_list->Method->headerCellClass() ?>"><div id="elh_lab_test_result_Method" class="lab_test_result_Method"><div class="ew-table-header-caption"><?php echo $lab_test_result_list->Method->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Method" class="<?php echo $lab_test_result_list->Method->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_result_list->SortUrl($lab_test_result_list->Method) ?>', 1);"><div id="elh_lab_test_result_Method" class="lab_test_result_Method">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result_list->Method->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result_list->Method->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_result_list->Method->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result_list->Specimen->Visible) { // Specimen ?>
	<?php if ($lab_test_result_list->SortUrl($lab_test_result_list->Specimen) == "") { ?>
		<th data-name="Specimen" class="<?php echo $lab_test_result_list->Specimen->headerCellClass() ?>"><div id="elh_lab_test_result_Specimen" class="lab_test_result_Specimen"><div class="ew-table-header-caption"><?php echo $lab_test_result_list->Specimen->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Specimen" class="<?php echo $lab_test_result_list->Specimen->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_result_list->SortUrl($lab_test_result_list->Specimen) ?>', 1);"><div id="elh_lab_test_result_Specimen" class="lab_test_result_Specimen">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result_list->Specimen->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result_list->Specimen->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_result_list->Specimen->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result_list->Amount->Visible) { // Amount ?>
	<?php if ($lab_test_result_list->SortUrl($lab_test_result_list->Amount) == "") { ?>
		<th data-name="Amount" class="<?php echo $lab_test_result_list->Amount->headerCellClass() ?>"><div id="elh_lab_test_result_Amount" class="lab_test_result_Amount"><div class="ew-table-header-caption"><?php echo $lab_test_result_list->Amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Amount" class="<?php echo $lab_test_result_list->Amount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_result_list->SortUrl($lab_test_result_list->Amount) ?>', 1);"><div id="elh_lab_test_result_Amount" class="lab_test_result_Amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result_list->Amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result_list->Amount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_result_list->Amount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result_list->ResultBy->Visible) { // ResultBy ?>
	<?php if ($lab_test_result_list->SortUrl($lab_test_result_list->ResultBy) == "") { ?>
		<th data-name="ResultBy" class="<?php echo $lab_test_result_list->ResultBy->headerCellClass() ?>"><div id="elh_lab_test_result_ResultBy" class="lab_test_result_ResultBy"><div class="ew-table-header-caption"><?php echo $lab_test_result_list->ResultBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ResultBy" class="<?php echo $lab_test_result_list->ResultBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_result_list->SortUrl($lab_test_result_list->ResultBy) ?>', 1);"><div id="elh_lab_test_result_ResultBy" class="lab_test_result_ResultBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result_list->ResultBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result_list->ResultBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_result_list->ResultBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result_list->AuthBy->Visible) { // AuthBy ?>
	<?php if ($lab_test_result_list->SortUrl($lab_test_result_list->AuthBy) == "") { ?>
		<th data-name="AuthBy" class="<?php echo $lab_test_result_list->AuthBy->headerCellClass() ?>"><div id="elh_lab_test_result_AuthBy" class="lab_test_result_AuthBy"><div class="ew-table-header-caption"><?php echo $lab_test_result_list->AuthBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AuthBy" class="<?php echo $lab_test_result_list->AuthBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_result_list->SortUrl($lab_test_result_list->AuthBy) ?>', 1);"><div id="elh_lab_test_result_AuthBy" class="lab_test_result_AuthBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result_list->AuthBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result_list->AuthBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_result_list->AuthBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result_list->AuthDate->Visible) { // AuthDate ?>
	<?php if ($lab_test_result_list->SortUrl($lab_test_result_list->AuthDate) == "") { ?>
		<th data-name="AuthDate" class="<?php echo $lab_test_result_list->AuthDate->headerCellClass() ?>"><div id="elh_lab_test_result_AuthDate" class="lab_test_result_AuthDate"><div class="ew-table-header-caption"><?php echo $lab_test_result_list->AuthDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AuthDate" class="<?php echo $lab_test_result_list->AuthDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_result_list->SortUrl($lab_test_result_list->AuthDate) ?>', 1);"><div id="elh_lab_test_result_AuthDate" class="lab_test_result_AuthDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result_list->AuthDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result_list->AuthDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_result_list->AuthDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result_list->Abnormal->Visible) { // Abnormal ?>
	<?php if ($lab_test_result_list->SortUrl($lab_test_result_list->Abnormal) == "") { ?>
		<th data-name="Abnormal" class="<?php echo $lab_test_result_list->Abnormal->headerCellClass() ?>"><div id="elh_lab_test_result_Abnormal" class="lab_test_result_Abnormal"><div class="ew-table-header-caption"><?php echo $lab_test_result_list->Abnormal->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Abnormal" class="<?php echo $lab_test_result_list->Abnormal->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_result_list->SortUrl($lab_test_result_list->Abnormal) ?>', 1);"><div id="elh_lab_test_result_Abnormal" class="lab_test_result_Abnormal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result_list->Abnormal->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result_list->Abnormal->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_result_list->Abnormal->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result_list->Printed->Visible) { // Printed ?>
	<?php if ($lab_test_result_list->SortUrl($lab_test_result_list->Printed) == "") { ?>
		<th data-name="Printed" class="<?php echo $lab_test_result_list->Printed->headerCellClass() ?>"><div id="elh_lab_test_result_Printed" class="lab_test_result_Printed"><div class="ew-table-header-caption"><?php echo $lab_test_result_list->Printed->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Printed" class="<?php echo $lab_test_result_list->Printed->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_result_list->SortUrl($lab_test_result_list->Printed) ?>', 1);"><div id="elh_lab_test_result_Printed" class="lab_test_result_Printed">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result_list->Printed->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result_list->Printed->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_result_list->Printed->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result_list->Dispatch->Visible) { // Dispatch ?>
	<?php if ($lab_test_result_list->SortUrl($lab_test_result_list->Dispatch) == "") { ?>
		<th data-name="Dispatch" class="<?php echo $lab_test_result_list->Dispatch->headerCellClass() ?>"><div id="elh_lab_test_result_Dispatch" class="lab_test_result_Dispatch"><div class="ew-table-header-caption"><?php echo $lab_test_result_list->Dispatch->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Dispatch" class="<?php echo $lab_test_result_list->Dispatch->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_result_list->SortUrl($lab_test_result_list->Dispatch) ?>', 1);"><div id="elh_lab_test_result_Dispatch" class="lab_test_result_Dispatch">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result_list->Dispatch->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result_list->Dispatch->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_result_list->Dispatch->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result_list->LOWHIGH->Visible) { // LOWHIGH ?>
	<?php if ($lab_test_result_list->SortUrl($lab_test_result_list->LOWHIGH) == "") { ?>
		<th data-name="LOWHIGH" class="<?php echo $lab_test_result_list->LOWHIGH->headerCellClass() ?>"><div id="elh_lab_test_result_LOWHIGH" class="lab_test_result_LOWHIGH"><div class="ew-table-header-caption"><?php echo $lab_test_result_list->LOWHIGH->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LOWHIGH" class="<?php echo $lab_test_result_list->LOWHIGH->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_result_list->SortUrl($lab_test_result_list->LOWHIGH) ?>', 1);"><div id="elh_lab_test_result_LOWHIGH" class="lab_test_result_LOWHIGH">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result_list->LOWHIGH->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result_list->LOWHIGH->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_result_list->LOWHIGH->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result_list->Unit->Visible) { // Unit ?>
	<?php if ($lab_test_result_list->SortUrl($lab_test_result_list->Unit) == "") { ?>
		<th data-name="Unit" class="<?php echo $lab_test_result_list->Unit->headerCellClass() ?>"><div id="elh_lab_test_result_Unit" class="lab_test_result_Unit"><div class="ew-table-header-caption"><?php echo $lab_test_result_list->Unit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Unit" class="<?php echo $lab_test_result_list->Unit->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_result_list->SortUrl($lab_test_result_list->Unit) ?>', 1);"><div id="elh_lab_test_result_Unit" class="lab_test_result_Unit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result_list->Unit->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result_list->Unit->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_result_list->Unit->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result_list->ResDate->Visible) { // ResDate ?>
	<?php if ($lab_test_result_list->SortUrl($lab_test_result_list->ResDate) == "") { ?>
		<th data-name="ResDate" class="<?php echo $lab_test_result_list->ResDate->headerCellClass() ?>"><div id="elh_lab_test_result_ResDate" class="lab_test_result_ResDate"><div class="ew-table-header-caption"><?php echo $lab_test_result_list->ResDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ResDate" class="<?php echo $lab_test_result_list->ResDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_result_list->SortUrl($lab_test_result_list->ResDate) ?>', 1);"><div id="elh_lab_test_result_ResDate" class="lab_test_result_ResDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result_list->ResDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result_list->ResDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_result_list->ResDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result_list->Pic1->Visible) { // Pic1 ?>
	<?php if ($lab_test_result_list->SortUrl($lab_test_result_list->Pic1) == "") { ?>
		<th data-name="Pic1" class="<?php echo $lab_test_result_list->Pic1->headerCellClass() ?>"><div id="elh_lab_test_result_Pic1" class="lab_test_result_Pic1"><div class="ew-table-header-caption"><?php echo $lab_test_result_list->Pic1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pic1" class="<?php echo $lab_test_result_list->Pic1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_result_list->SortUrl($lab_test_result_list->Pic1) ?>', 1);"><div id="elh_lab_test_result_Pic1" class="lab_test_result_Pic1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result_list->Pic1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result_list->Pic1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_result_list->Pic1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result_list->Pic2->Visible) { // Pic2 ?>
	<?php if ($lab_test_result_list->SortUrl($lab_test_result_list->Pic2) == "") { ?>
		<th data-name="Pic2" class="<?php echo $lab_test_result_list->Pic2->headerCellClass() ?>"><div id="elh_lab_test_result_Pic2" class="lab_test_result_Pic2"><div class="ew-table-header-caption"><?php echo $lab_test_result_list->Pic2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pic2" class="<?php echo $lab_test_result_list->Pic2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_result_list->SortUrl($lab_test_result_list->Pic2) ?>', 1);"><div id="elh_lab_test_result_Pic2" class="lab_test_result_Pic2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result_list->Pic2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result_list->Pic2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_result_list->Pic2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result_list->GraphPath->Visible) { // GraphPath ?>
	<?php if ($lab_test_result_list->SortUrl($lab_test_result_list->GraphPath) == "") { ?>
		<th data-name="GraphPath" class="<?php echo $lab_test_result_list->GraphPath->headerCellClass() ?>"><div id="elh_lab_test_result_GraphPath" class="lab_test_result_GraphPath"><div class="ew-table-header-caption"><?php echo $lab_test_result_list->GraphPath->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GraphPath" class="<?php echo $lab_test_result_list->GraphPath->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_result_list->SortUrl($lab_test_result_list->GraphPath) ?>', 1);"><div id="elh_lab_test_result_GraphPath" class="lab_test_result_GraphPath">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result_list->GraphPath->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result_list->GraphPath->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_result_list->GraphPath->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result_list->SampleDate->Visible) { // SampleDate ?>
	<?php if ($lab_test_result_list->SortUrl($lab_test_result_list->SampleDate) == "") { ?>
		<th data-name="SampleDate" class="<?php echo $lab_test_result_list->SampleDate->headerCellClass() ?>"><div id="elh_lab_test_result_SampleDate" class="lab_test_result_SampleDate"><div class="ew-table-header-caption"><?php echo $lab_test_result_list->SampleDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SampleDate" class="<?php echo $lab_test_result_list->SampleDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_result_list->SortUrl($lab_test_result_list->SampleDate) ?>', 1);"><div id="elh_lab_test_result_SampleDate" class="lab_test_result_SampleDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result_list->SampleDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result_list->SampleDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_result_list->SampleDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result_list->SampleUser->Visible) { // SampleUser ?>
	<?php if ($lab_test_result_list->SortUrl($lab_test_result_list->SampleUser) == "") { ?>
		<th data-name="SampleUser" class="<?php echo $lab_test_result_list->SampleUser->headerCellClass() ?>"><div id="elh_lab_test_result_SampleUser" class="lab_test_result_SampleUser"><div class="ew-table-header-caption"><?php echo $lab_test_result_list->SampleUser->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SampleUser" class="<?php echo $lab_test_result_list->SampleUser->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_result_list->SortUrl($lab_test_result_list->SampleUser) ?>', 1);"><div id="elh_lab_test_result_SampleUser" class="lab_test_result_SampleUser">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result_list->SampleUser->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result_list->SampleUser->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_result_list->SampleUser->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result_list->ReceivedDate->Visible) { // ReceivedDate ?>
	<?php if ($lab_test_result_list->SortUrl($lab_test_result_list->ReceivedDate) == "") { ?>
		<th data-name="ReceivedDate" class="<?php echo $lab_test_result_list->ReceivedDate->headerCellClass() ?>"><div id="elh_lab_test_result_ReceivedDate" class="lab_test_result_ReceivedDate"><div class="ew-table-header-caption"><?php echo $lab_test_result_list->ReceivedDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReceivedDate" class="<?php echo $lab_test_result_list->ReceivedDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_result_list->SortUrl($lab_test_result_list->ReceivedDate) ?>', 1);"><div id="elh_lab_test_result_ReceivedDate" class="lab_test_result_ReceivedDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result_list->ReceivedDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result_list->ReceivedDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_result_list->ReceivedDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result_list->ReceivedUser->Visible) { // ReceivedUser ?>
	<?php if ($lab_test_result_list->SortUrl($lab_test_result_list->ReceivedUser) == "") { ?>
		<th data-name="ReceivedUser" class="<?php echo $lab_test_result_list->ReceivedUser->headerCellClass() ?>"><div id="elh_lab_test_result_ReceivedUser" class="lab_test_result_ReceivedUser"><div class="ew-table-header-caption"><?php echo $lab_test_result_list->ReceivedUser->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReceivedUser" class="<?php echo $lab_test_result_list->ReceivedUser->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_result_list->SortUrl($lab_test_result_list->ReceivedUser) ?>', 1);"><div id="elh_lab_test_result_ReceivedUser" class="lab_test_result_ReceivedUser">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result_list->ReceivedUser->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result_list->ReceivedUser->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_result_list->ReceivedUser->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result_list->DeptRecvDate->Visible) { // DeptRecvDate ?>
	<?php if ($lab_test_result_list->SortUrl($lab_test_result_list->DeptRecvDate) == "") { ?>
		<th data-name="DeptRecvDate" class="<?php echo $lab_test_result_list->DeptRecvDate->headerCellClass() ?>"><div id="elh_lab_test_result_DeptRecvDate" class="lab_test_result_DeptRecvDate"><div class="ew-table-header-caption"><?php echo $lab_test_result_list->DeptRecvDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DeptRecvDate" class="<?php echo $lab_test_result_list->DeptRecvDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_result_list->SortUrl($lab_test_result_list->DeptRecvDate) ?>', 1);"><div id="elh_lab_test_result_DeptRecvDate" class="lab_test_result_DeptRecvDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result_list->DeptRecvDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result_list->DeptRecvDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_result_list->DeptRecvDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result_list->DeptRecvUser->Visible) { // DeptRecvUser ?>
	<?php if ($lab_test_result_list->SortUrl($lab_test_result_list->DeptRecvUser) == "") { ?>
		<th data-name="DeptRecvUser" class="<?php echo $lab_test_result_list->DeptRecvUser->headerCellClass() ?>"><div id="elh_lab_test_result_DeptRecvUser" class="lab_test_result_DeptRecvUser"><div class="ew-table-header-caption"><?php echo $lab_test_result_list->DeptRecvUser->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DeptRecvUser" class="<?php echo $lab_test_result_list->DeptRecvUser->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_result_list->SortUrl($lab_test_result_list->DeptRecvUser) ?>', 1);"><div id="elh_lab_test_result_DeptRecvUser" class="lab_test_result_DeptRecvUser">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result_list->DeptRecvUser->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result_list->DeptRecvUser->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_result_list->DeptRecvUser->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result_list->PrintBy->Visible) { // PrintBy ?>
	<?php if ($lab_test_result_list->SortUrl($lab_test_result_list->PrintBy) == "") { ?>
		<th data-name="PrintBy" class="<?php echo $lab_test_result_list->PrintBy->headerCellClass() ?>"><div id="elh_lab_test_result_PrintBy" class="lab_test_result_PrintBy"><div class="ew-table-header-caption"><?php echo $lab_test_result_list->PrintBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrintBy" class="<?php echo $lab_test_result_list->PrintBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_result_list->SortUrl($lab_test_result_list->PrintBy) ?>', 1);"><div id="elh_lab_test_result_PrintBy" class="lab_test_result_PrintBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result_list->PrintBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result_list->PrintBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_result_list->PrintBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result_list->PrintDate->Visible) { // PrintDate ?>
	<?php if ($lab_test_result_list->SortUrl($lab_test_result_list->PrintDate) == "") { ?>
		<th data-name="PrintDate" class="<?php echo $lab_test_result_list->PrintDate->headerCellClass() ?>"><div id="elh_lab_test_result_PrintDate" class="lab_test_result_PrintDate"><div class="ew-table-header-caption"><?php echo $lab_test_result_list->PrintDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrintDate" class="<?php echo $lab_test_result_list->PrintDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_result_list->SortUrl($lab_test_result_list->PrintDate) ?>', 1);"><div id="elh_lab_test_result_PrintDate" class="lab_test_result_PrintDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result_list->PrintDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result_list->PrintDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_result_list->PrintDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result_list->MachineCD->Visible) { // MachineCD ?>
	<?php if ($lab_test_result_list->SortUrl($lab_test_result_list->MachineCD) == "") { ?>
		<th data-name="MachineCD" class="<?php echo $lab_test_result_list->MachineCD->headerCellClass() ?>"><div id="elh_lab_test_result_MachineCD" class="lab_test_result_MachineCD"><div class="ew-table-header-caption"><?php echo $lab_test_result_list->MachineCD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MachineCD" class="<?php echo $lab_test_result_list->MachineCD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_result_list->SortUrl($lab_test_result_list->MachineCD) ?>', 1);"><div id="elh_lab_test_result_MachineCD" class="lab_test_result_MachineCD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result_list->MachineCD->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result_list->MachineCD->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_result_list->MachineCD->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result_list->TestCancel->Visible) { // TestCancel ?>
	<?php if ($lab_test_result_list->SortUrl($lab_test_result_list->TestCancel) == "") { ?>
		<th data-name="TestCancel" class="<?php echo $lab_test_result_list->TestCancel->headerCellClass() ?>"><div id="elh_lab_test_result_TestCancel" class="lab_test_result_TestCancel"><div class="ew-table-header-caption"><?php echo $lab_test_result_list->TestCancel->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TestCancel" class="<?php echo $lab_test_result_list->TestCancel->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_result_list->SortUrl($lab_test_result_list->TestCancel) ?>', 1);"><div id="elh_lab_test_result_TestCancel" class="lab_test_result_TestCancel">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result_list->TestCancel->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result_list->TestCancel->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_result_list->TestCancel->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result_list->OutSource->Visible) { // OutSource ?>
	<?php if ($lab_test_result_list->SortUrl($lab_test_result_list->OutSource) == "") { ?>
		<th data-name="OutSource" class="<?php echo $lab_test_result_list->OutSource->headerCellClass() ?>"><div id="elh_lab_test_result_OutSource" class="lab_test_result_OutSource"><div class="ew-table-header-caption"><?php echo $lab_test_result_list->OutSource->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OutSource" class="<?php echo $lab_test_result_list->OutSource->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_result_list->SortUrl($lab_test_result_list->OutSource) ?>', 1);"><div id="elh_lab_test_result_OutSource" class="lab_test_result_OutSource">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result_list->OutSource->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result_list->OutSource->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_result_list->OutSource->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result_list->Tariff->Visible) { // Tariff ?>
	<?php if ($lab_test_result_list->SortUrl($lab_test_result_list->Tariff) == "") { ?>
		<th data-name="Tariff" class="<?php echo $lab_test_result_list->Tariff->headerCellClass() ?>"><div id="elh_lab_test_result_Tariff" class="lab_test_result_Tariff"><div class="ew-table-header-caption"><?php echo $lab_test_result_list->Tariff->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tariff" class="<?php echo $lab_test_result_list->Tariff->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_result_list->SortUrl($lab_test_result_list->Tariff) ?>', 1);"><div id="elh_lab_test_result_Tariff" class="lab_test_result_Tariff">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result_list->Tariff->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result_list->Tariff->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_result_list->Tariff->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result_list->EDITDATE->Visible) { // EDITDATE ?>
	<?php if ($lab_test_result_list->SortUrl($lab_test_result_list->EDITDATE) == "") { ?>
		<th data-name="EDITDATE" class="<?php echo $lab_test_result_list->EDITDATE->headerCellClass() ?>"><div id="elh_lab_test_result_EDITDATE" class="lab_test_result_EDITDATE"><div class="ew-table-header-caption"><?php echo $lab_test_result_list->EDITDATE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EDITDATE" class="<?php echo $lab_test_result_list->EDITDATE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_result_list->SortUrl($lab_test_result_list->EDITDATE) ?>', 1);"><div id="elh_lab_test_result_EDITDATE" class="lab_test_result_EDITDATE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result_list->EDITDATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result_list->EDITDATE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_result_list->EDITDATE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result_list->UPLOAD->Visible) { // UPLOAD ?>
	<?php if ($lab_test_result_list->SortUrl($lab_test_result_list->UPLOAD) == "") { ?>
		<th data-name="UPLOAD" class="<?php echo $lab_test_result_list->UPLOAD->headerCellClass() ?>"><div id="elh_lab_test_result_UPLOAD" class="lab_test_result_UPLOAD"><div class="ew-table-header-caption"><?php echo $lab_test_result_list->UPLOAD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UPLOAD" class="<?php echo $lab_test_result_list->UPLOAD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_result_list->SortUrl($lab_test_result_list->UPLOAD) ?>', 1);"><div id="elh_lab_test_result_UPLOAD" class="lab_test_result_UPLOAD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result_list->UPLOAD->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result_list->UPLOAD->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_result_list->UPLOAD->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result_list->SAuthDate->Visible) { // SAuthDate ?>
	<?php if ($lab_test_result_list->SortUrl($lab_test_result_list->SAuthDate) == "") { ?>
		<th data-name="SAuthDate" class="<?php echo $lab_test_result_list->SAuthDate->headerCellClass() ?>"><div id="elh_lab_test_result_SAuthDate" class="lab_test_result_SAuthDate"><div class="ew-table-header-caption"><?php echo $lab_test_result_list->SAuthDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SAuthDate" class="<?php echo $lab_test_result_list->SAuthDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_result_list->SortUrl($lab_test_result_list->SAuthDate) ?>', 1);"><div id="elh_lab_test_result_SAuthDate" class="lab_test_result_SAuthDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result_list->SAuthDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result_list->SAuthDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_result_list->SAuthDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result_list->SAuthBy->Visible) { // SAuthBy ?>
	<?php if ($lab_test_result_list->SortUrl($lab_test_result_list->SAuthBy) == "") { ?>
		<th data-name="SAuthBy" class="<?php echo $lab_test_result_list->SAuthBy->headerCellClass() ?>"><div id="elh_lab_test_result_SAuthBy" class="lab_test_result_SAuthBy"><div class="ew-table-header-caption"><?php echo $lab_test_result_list->SAuthBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SAuthBy" class="<?php echo $lab_test_result_list->SAuthBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_result_list->SortUrl($lab_test_result_list->SAuthBy) ?>', 1);"><div id="elh_lab_test_result_SAuthBy" class="lab_test_result_SAuthBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result_list->SAuthBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result_list->SAuthBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_result_list->SAuthBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result_list->NoRC->Visible) { // NoRC ?>
	<?php if ($lab_test_result_list->SortUrl($lab_test_result_list->NoRC) == "") { ?>
		<th data-name="NoRC" class="<?php echo $lab_test_result_list->NoRC->headerCellClass() ?>"><div id="elh_lab_test_result_NoRC" class="lab_test_result_NoRC"><div class="ew-table-header-caption"><?php echo $lab_test_result_list->NoRC->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoRC" class="<?php echo $lab_test_result_list->NoRC->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_result_list->SortUrl($lab_test_result_list->NoRC) ?>', 1);"><div id="elh_lab_test_result_NoRC" class="lab_test_result_NoRC">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result_list->NoRC->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result_list->NoRC->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_result_list->NoRC->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result_list->DispDt->Visible) { // DispDt ?>
	<?php if ($lab_test_result_list->SortUrl($lab_test_result_list->DispDt) == "") { ?>
		<th data-name="DispDt" class="<?php echo $lab_test_result_list->DispDt->headerCellClass() ?>"><div id="elh_lab_test_result_DispDt" class="lab_test_result_DispDt"><div class="ew-table-header-caption"><?php echo $lab_test_result_list->DispDt->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DispDt" class="<?php echo $lab_test_result_list->DispDt->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_result_list->SortUrl($lab_test_result_list->DispDt) ?>', 1);"><div id="elh_lab_test_result_DispDt" class="lab_test_result_DispDt">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result_list->DispDt->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result_list->DispDt->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_result_list->DispDt->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result_list->DispUser->Visible) { // DispUser ?>
	<?php if ($lab_test_result_list->SortUrl($lab_test_result_list->DispUser) == "") { ?>
		<th data-name="DispUser" class="<?php echo $lab_test_result_list->DispUser->headerCellClass() ?>"><div id="elh_lab_test_result_DispUser" class="lab_test_result_DispUser"><div class="ew-table-header-caption"><?php echo $lab_test_result_list->DispUser->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DispUser" class="<?php echo $lab_test_result_list->DispUser->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_result_list->SortUrl($lab_test_result_list->DispUser) ?>', 1);"><div id="elh_lab_test_result_DispUser" class="lab_test_result_DispUser">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result_list->DispUser->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result_list->DispUser->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_result_list->DispUser->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result_list->DispRemarks->Visible) { // DispRemarks ?>
	<?php if ($lab_test_result_list->SortUrl($lab_test_result_list->DispRemarks) == "") { ?>
		<th data-name="DispRemarks" class="<?php echo $lab_test_result_list->DispRemarks->headerCellClass() ?>"><div id="elh_lab_test_result_DispRemarks" class="lab_test_result_DispRemarks"><div class="ew-table-header-caption"><?php echo $lab_test_result_list->DispRemarks->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DispRemarks" class="<?php echo $lab_test_result_list->DispRemarks->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_result_list->SortUrl($lab_test_result_list->DispRemarks) ?>', 1);"><div id="elh_lab_test_result_DispRemarks" class="lab_test_result_DispRemarks">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result_list->DispRemarks->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result_list->DispRemarks->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_result_list->DispRemarks->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result_list->DispMode->Visible) { // DispMode ?>
	<?php if ($lab_test_result_list->SortUrl($lab_test_result_list->DispMode) == "") { ?>
		<th data-name="DispMode" class="<?php echo $lab_test_result_list->DispMode->headerCellClass() ?>"><div id="elh_lab_test_result_DispMode" class="lab_test_result_DispMode"><div class="ew-table-header-caption"><?php echo $lab_test_result_list->DispMode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DispMode" class="<?php echo $lab_test_result_list->DispMode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_result_list->SortUrl($lab_test_result_list->DispMode) ?>', 1);"><div id="elh_lab_test_result_DispMode" class="lab_test_result_DispMode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result_list->DispMode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result_list->DispMode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_result_list->DispMode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result_list->ProductCD->Visible) { // ProductCD ?>
	<?php if ($lab_test_result_list->SortUrl($lab_test_result_list->ProductCD) == "") { ?>
		<th data-name="ProductCD" class="<?php echo $lab_test_result_list->ProductCD->headerCellClass() ?>"><div id="elh_lab_test_result_ProductCD" class="lab_test_result_ProductCD"><div class="ew-table-header-caption"><?php echo $lab_test_result_list->ProductCD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProductCD" class="<?php echo $lab_test_result_list->ProductCD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_result_list->SortUrl($lab_test_result_list->ProductCD) ?>', 1);"><div id="elh_lab_test_result_ProductCD" class="lab_test_result_ProductCD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result_list->ProductCD->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result_list->ProductCD->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_result_list->ProductCD->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result_list->Nos->Visible) { // Nos ?>
	<?php if ($lab_test_result_list->SortUrl($lab_test_result_list->Nos) == "") { ?>
		<th data-name="Nos" class="<?php echo $lab_test_result_list->Nos->headerCellClass() ?>"><div id="elh_lab_test_result_Nos" class="lab_test_result_Nos"><div class="ew-table-header-caption"><?php echo $lab_test_result_list->Nos->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Nos" class="<?php echo $lab_test_result_list->Nos->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_result_list->SortUrl($lab_test_result_list->Nos) ?>', 1);"><div id="elh_lab_test_result_Nos" class="lab_test_result_Nos">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result_list->Nos->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result_list->Nos->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_result_list->Nos->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result_list->WBCPath->Visible) { // WBCPath ?>
	<?php if ($lab_test_result_list->SortUrl($lab_test_result_list->WBCPath) == "") { ?>
		<th data-name="WBCPath" class="<?php echo $lab_test_result_list->WBCPath->headerCellClass() ?>"><div id="elh_lab_test_result_WBCPath" class="lab_test_result_WBCPath"><div class="ew-table-header-caption"><?php echo $lab_test_result_list->WBCPath->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="WBCPath" class="<?php echo $lab_test_result_list->WBCPath->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_result_list->SortUrl($lab_test_result_list->WBCPath) ?>', 1);"><div id="elh_lab_test_result_WBCPath" class="lab_test_result_WBCPath">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result_list->WBCPath->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result_list->WBCPath->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_result_list->WBCPath->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result_list->RBCPath->Visible) { // RBCPath ?>
	<?php if ($lab_test_result_list->SortUrl($lab_test_result_list->RBCPath) == "") { ?>
		<th data-name="RBCPath" class="<?php echo $lab_test_result_list->RBCPath->headerCellClass() ?>"><div id="elh_lab_test_result_RBCPath" class="lab_test_result_RBCPath"><div class="ew-table-header-caption"><?php echo $lab_test_result_list->RBCPath->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RBCPath" class="<?php echo $lab_test_result_list->RBCPath->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_result_list->SortUrl($lab_test_result_list->RBCPath) ?>', 1);"><div id="elh_lab_test_result_RBCPath" class="lab_test_result_RBCPath">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result_list->RBCPath->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result_list->RBCPath->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_result_list->RBCPath->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result_list->PTPath->Visible) { // PTPath ?>
	<?php if ($lab_test_result_list->SortUrl($lab_test_result_list->PTPath) == "") { ?>
		<th data-name="PTPath" class="<?php echo $lab_test_result_list->PTPath->headerCellClass() ?>"><div id="elh_lab_test_result_PTPath" class="lab_test_result_PTPath"><div class="ew-table-header-caption"><?php echo $lab_test_result_list->PTPath->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PTPath" class="<?php echo $lab_test_result_list->PTPath->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_result_list->SortUrl($lab_test_result_list->PTPath) ?>', 1);"><div id="elh_lab_test_result_PTPath" class="lab_test_result_PTPath">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result_list->PTPath->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result_list->PTPath->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_result_list->PTPath->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result_list->ActualAmt->Visible) { // ActualAmt ?>
	<?php if ($lab_test_result_list->SortUrl($lab_test_result_list->ActualAmt) == "") { ?>
		<th data-name="ActualAmt" class="<?php echo $lab_test_result_list->ActualAmt->headerCellClass() ?>"><div id="elh_lab_test_result_ActualAmt" class="lab_test_result_ActualAmt"><div class="ew-table-header-caption"><?php echo $lab_test_result_list->ActualAmt->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ActualAmt" class="<?php echo $lab_test_result_list->ActualAmt->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_result_list->SortUrl($lab_test_result_list->ActualAmt) ?>', 1);"><div id="elh_lab_test_result_ActualAmt" class="lab_test_result_ActualAmt">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result_list->ActualAmt->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result_list->ActualAmt->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_result_list->ActualAmt->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result_list->NoSign->Visible) { // NoSign ?>
	<?php if ($lab_test_result_list->SortUrl($lab_test_result_list->NoSign) == "") { ?>
		<th data-name="NoSign" class="<?php echo $lab_test_result_list->NoSign->headerCellClass() ?>"><div id="elh_lab_test_result_NoSign" class="lab_test_result_NoSign"><div class="ew-table-header-caption"><?php echo $lab_test_result_list->NoSign->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoSign" class="<?php echo $lab_test_result_list->NoSign->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_result_list->SortUrl($lab_test_result_list->NoSign) ?>', 1);"><div id="elh_lab_test_result_NoSign" class="lab_test_result_NoSign">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result_list->NoSign->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result_list->NoSign->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_result_list->NoSign->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result_list->_Barcode->Visible) { // Barcode ?>
	<?php if ($lab_test_result_list->SortUrl($lab_test_result_list->_Barcode) == "") { ?>
		<th data-name="_Barcode" class="<?php echo $lab_test_result_list->_Barcode->headerCellClass() ?>"><div id="elh_lab_test_result__Barcode" class="lab_test_result__Barcode"><div class="ew-table-header-caption"><?php echo $lab_test_result_list->_Barcode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_Barcode" class="<?php echo $lab_test_result_list->_Barcode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_result_list->SortUrl($lab_test_result_list->_Barcode) ?>', 1);"><div id="elh_lab_test_result__Barcode" class="lab_test_result__Barcode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result_list->_Barcode->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result_list->_Barcode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_result_list->_Barcode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result_list->ReadTime->Visible) { // ReadTime ?>
	<?php if ($lab_test_result_list->SortUrl($lab_test_result_list->ReadTime) == "") { ?>
		<th data-name="ReadTime" class="<?php echo $lab_test_result_list->ReadTime->headerCellClass() ?>"><div id="elh_lab_test_result_ReadTime" class="lab_test_result_ReadTime"><div class="ew-table-header-caption"><?php echo $lab_test_result_list->ReadTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReadTime" class="<?php echo $lab_test_result_list->ReadTime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_result_list->SortUrl($lab_test_result_list->ReadTime) ?>', 1);"><div id="elh_lab_test_result_ReadTime" class="lab_test_result_ReadTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result_list->ReadTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result_list->ReadTime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_result_list->ReadTime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result_list->VailID->Visible) { // VailID ?>
	<?php if ($lab_test_result_list->SortUrl($lab_test_result_list->VailID) == "") { ?>
		<th data-name="VailID" class="<?php echo $lab_test_result_list->VailID->headerCellClass() ?>"><div id="elh_lab_test_result_VailID" class="lab_test_result_VailID"><div class="ew-table-header-caption"><?php echo $lab_test_result_list->VailID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="VailID" class="<?php echo $lab_test_result_list->VailID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_result_list->SortUrl($lab_test_result_list->VailID) ?>', 1);"><div id="elh_lab_test_result_VailID" class="lab_test_result_VailID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result_list->VailID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result_list->VailID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_result_list->VailID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result_list->ReadMachine->Visible) { // ReadMachine ?>
	<?php if ($lab_test_result_list->SortUrl($lab_test_result_list->ReadMachine) == "") { ?>
		<th data-name="ReadMachine" class="<?php echo $lab_test_result_list->ReadMachine->headerCellClass() ?>"><div id="elh_lab_test_result_ReadMachine" class="lab_test_result_ReadMachine"><div class="ew-table-header-caption"><?php echo $lab_test_result_list->ReadMachine->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReadMachine" class="<?php echo $lab_test_result_list->ReadMachine->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_result_list->SortUrl($lab_test_result_list->ReadMachine) ?>', 1);"><div id="elh_lab_test_result_ReadMachine" class="lab_test_result_ReadMachine">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result_list->ReadMachine->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result_list->ReadMachine->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_result_list->ReadMachine->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result_list->LabCD->Visible) { // LabCD ?>
	<?php if ($lab_test_result_list->SortUrl($lab_test_result_list->LabCD) == "") { ?>
		<th data-name="LabCD" class="<?php echo $lab_test_result_list->LabCD->headerCellClass() ?>"><div id="elh_lab_test_result_LabCD" class="lab_test_result_LabCD"><div class="ew-table-header-caption"><?php echo $lab_test_result_list->LabCD->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="LabCD" class="<?php echo $lab_test_result_list->LabCD->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_result_list->SortUrl($lab_test_result_list->LabCD) ?>', 1);"><div id="elh_lab_test_result_LabCD" class="lab_test_result_LabCD">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result_list->LabCD->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result_list->LabCD->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_result_list->LabCD->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result_list->OutLabAmt->Visible) { // OutLabAmt ?>
	<?php if ($lab_test_result_list->SortUrl($lab_test_result_list->OutLabAmt) == "") { ?>
		<th data-name="OutLabAmt" class="<?php echo $lab_test_result_list->OutLabAmt->headerCellClass() ?>"><div id="elh_lab_test_result_OutLabAmt" class="lab_test_result_OutLabAmt"><div class="ew-table-header-caption"><?php echo $lab_test_result_list->OutLabAmt->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OutLabAmt" class="<?php echo $lab_test_result_list->OutLabAmt->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_result_list->SortUrl($lab_test_result_list->OutLabAmt) ?>', 1);"><div id="elh_lab_test_result_OutLabAmt" class="lab_test_result_OutLabAmt">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result_list->OutLabAmt->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result_list->OutLabAmt->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_result_list->OutLabAmt->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result_list->ProductQty->Visible) { // ProductQty ?>
	<?php if ($lab_test_result_list->SortUrl($lab_test_result_list->ProductQty) == "") { ?>
		<th data-name="ProductQty" class="<?php echo $lab_test_result_list->ProductQty->headerCellClass() ?>"><div id="elh_lab_test_result_ProductQty" class="lab_test_result_ProductQty"><div class="ew-table-header-caption"><?php echo $lab_test_result_list->ProductQty->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProductQty" class="<?php echo $lab_test_result_list->ProductQty->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_result_list->SortUrl($lab_test_result_list->ProductQty) ?>', 1);"><div id="elh_lab_test_result_ProductQty" class="lab_test_result_ProductQty">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result_list->ProductQty->caption() ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result_list->ProductQty->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_result_list->ProductQty->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result_list->Repeat->Visible) { // Repeat ?>
	<?php if ($lab_test_result_list->SortUrl($lab_test_result_list->Repeat) == "") { ?>
		<th data-name="Repeat" class="<?php echo $lab_test_result_list->Repeat->headerCellClass() ?>"><div id="elh_lab_test_result_Repeat" class="lab_test_result_Repeat"><div class="ew-table-header-caption"><?php echo $lab_test_result_list->Repeat->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Repeat" class="<?php echo $lab_test_result_list->Repeat->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_result_list->SortUrl($lab_test_result_list->Repeat) ?>', 1);"><div id="elh_lab_test_result_Repeat" class="lab_test_result_Repeat">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result_list->Repeat->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result_list->Repeat->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_result_list->Repeat->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result_list->DeptNo->Visible) { // DeptNo ?>
	<?php if ($lab_test_result_list->SortUrl($lab_test_result_list->DeptNo) == "") { ?>
		<th data-name="DeptNo" class="<?php echo $lab_test_result_list->DeptNo->headerCellClass() ?>"><div id="elh_lab_test_result_DeptNo" class="lab_test_result_DeptNo"><div class="ew-table-header-caption"><?php echo $lab_test_result_list->DeptNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DeptNo" class="<?php echo $lab_test_result_list->DeptNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_result_list->SortUrl($lab_test_result_list->DeptNo) ?>', 1);"><div id="elh_lab_test_result_DeptNo" class="lab_test_result_DeptNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result_list->DeptNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result_list->DeptNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_result_list->DeptNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result_list->Desc1->Visible) { // Desc1 ?>
	<?php if ($lab_test_result_list->SortUrl($lab_test_result_list->Desc1) == "") { ?>
		<th data-name="Desc1" class="<?php echo $lab_test_result_list->Desc1->headerCellClass() ?>"><div id="elh_lab_test_result_Desc1" class="lab_test_result_Desc1"><div class="ew-table-header-caption"><?php echo $lab_test_result_list->Desc1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Desc1" class="<?php echo $lab_test_result_list->Desc1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_result_list->SortUrl($lab_test_result_list->Desc1) ?>', 1);"><div id="elh_lab_test_result_Desc1" class="lab_test_result_Desc1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result_list->Desc1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result_list->Desc1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_result_list->Desc1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result_list->Desc2->Visible) { // Desc2 ?>
	<?php if ($lab_test_result_list->SortUrl($lab_test_result_list->Desc2) == "") { ?>
		<th data-name="Desc2" class="<?php echo $lab_test_result_list->Desc2->headerCellClass() ?>"><div id="elh_lab_test_result_Desc2" class="lab_test_result_Desc2"><div class="ew-table-header-caption"><?php echo $lab_test_result_list->Desc2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Desc2" class="<?php echo $lab_test_result_list->Desc2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_result_list->SortUrl($lab_test_result_list->Desc2) ?>', 1);"><div id="elh_lab_test_result_Desc2" class="lab_test_result_Desc2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result_list->Desc2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result_list->Desc2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_result_list->Desc2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($lab_test_result_list->RptResult->Visible) { // RptResult ?>
	<?php if ($lab_test_result_list->SortUrl($lab_test_result_list->RptResult) == "") { ?>
		<th data-name="RptResult" class="<?php echo $lab_test_result_list->RptResult->headerCellClass() ?>"><div id="elh_lab_test_result_RptResult" class="lab_test_result_RptResult"><div class="ew-table-header-caption"><?php echo $lab_test_result_list->RptResult->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RptResult" class="<?php echo $lab_test_result_list->RptResult->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $lab_test_result_list->SortUrl($lab_test_result_list->RptResult) ?>', 1);"><div id="elh_lab_test_result_RptResult" class="lab_test_result_RptResult">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $lab_test_result_list->RptResult->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($lab_test_result_list->RptResult->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($lab_test_result_list->RptResult->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
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
if ($lab_test_result_list->ExportAll && $lab_test_result_list->isExport()) {
	$lab_test_result_list->StopRecord = $lab_test_result_list->TotalRecords;
} else {

	// Set the last record to display
	if ($lab_test_result_list->TotalRecords > $lab_test_result_list->StartRecord + $lab_test_result_list->DisplayRecords - 1)
		$lab_test_result_list->StopRecord = $lab_test_result_list->StartRecord + $lab_test_result_list->DisplayRecords - 1;
	else
		$lab_test_result_list->StopRecord = $lab_test_result_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($lab_test_result->isConfirm() || $lab_test_result_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($lab_test_result_list->FormKeyCountName) && ($lab_test_result_list->isGridAdd() || $lab_test_result_list->isGridEdit() || $lab_test_result->isConfirm())) {
		$lab_test_result_list->KeyCount = $CurrentForm->getValue($lab_test_result_list->FormKeyCountName);
		$lab_test_result_list->StopRecord = $lab_test_result_list->StartRecord + $lab_test_result_list->KeyCount - 1;
	}
}
$lab_test_result_list->RecordCount = $lab_test_result_list->StartRecord - 1;
if ($lab_test_result_list->Recordset && !$lab_test_result_list->Recordset->EOF) {
	$lab_test_result_list->Recordset->moveFirst();
	$selectLimit = $lab_test_result_list->UseSelectLimit;
	if (!$selectLimit && $lab_test_result_list->StartRecord > 1)
		$lab_test_result_list->Recordset->move($lab_test_result_list->StartRecord - 1);
} elseif (!$lab_test_result->AllowAddDeleteRow && $lab_test_result_list->StopRecord == 0) {
	$lab_test_result_list->StopRecord = $lab_test_result->GridAddRowCount;
}

// Initialize aggregate
$lab_test_result->RowType = ROWTYPE_AGGREGATEINIT;
$lab_test_result->resetAttributes();
$lab_test_result_list->renderRow();
if ($lab_test_result_list->isGridAdd())
	$lab_test_result_list->RowIndex = 0;
while ($lab_test_result_list->RecordCount < $lab_test_result_list->StopRecord) {
	$lab_test_result_list->RecordCount++;
	if ($lab_test_result_list->RecordCount >= $lab_test_result_list->StartRecord) {
		$lab_test_result_list->RowCount++;
		if ($lab_test_result_list->isGridAdd() || $lab_test_result_list->isGridEdit() || $lab_test_result->isConfirm()) {
			$lab_test_result_list->RowIndex++;
			$CurrentForm->Index = $lab_test_result_list->RowIndex;
			if ($CurrentForm->hasValue($lab_test_result_list->FormActionName) && ($lab_test_result->isConfirm() || $lab_test_result_list->EventCancelled))
				$lab_test_result_list->RowAction = strval($CurrentForm->getValue($lab_test_result_list->FormActionName));
			elseif ($lab_test_result_list->isGridAdd())
				$lab_test_result_list->RowAction = "insert";
			else
				$lab_test_result_list->RowAction = "";
		}

		// Set up key count
		$lab_test_result_list->KeyCount = $lab_test_result_list->RowIndex;

		// Init row class and style
		$lab_test_result->resetAttributes();
		$lab_test_result->CssClass = "";
		if ($lab_test_result_list->isGridAdd()) {
			$lab_test_result_list->loadRowValues(); // Load default values
		} else {
			$lab_test_result_list->loadRowValues($lab_test_result_list->Recordset); // Load row values
		}
		$lab_test_result->RowType = ROWTYPE_VIEW; // Render view
		if ($lab_test_result_list->isGridAdd()) // Grid add
			$lab_test_result->RowType = ROWTYPE_ADD; // Render add
		if ($lab_test_result_list->isGridAdd() && $lab_test_result->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$lab_test_result_list->restoreCurrentRowFormValues($lab_test_result_list->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$lab_test_result->RowAttrs->merge(["data-rowindex" => $lab_test_result_list->RowCount, "id" => "r" . $lab_test_result_list->RowCount . "_lab_test_result", "data-rowtype" => $lab_test_result->RowType]);

		// Render row
		$lab_test_result_list->renderRow();

		// Render list options
		$lab_test_result_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($lab_test_result_list->RowAction != "delete" && $lab_test_result_list->RowAction != "insertdelete" && !($lab_test_result_list->RowAction == "insert" && $lab_test_result->isConfirm() && $lab_test_result_list->emptyRow())) {
?>
	<tr <?php echo $lab_test_result->rowAttributes() ?>>
<?php

// Render list options (body, left)
$lab_test_result_list->ListOptions->render("body", "left", $lab_test_result_list->RowCount);
?>
	<?php if ($lab_test_result_list->Branch->Visible) { // Branch ?>
		<td data-name="Branch" <?php echo $lab_test_result_list->Branch->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_Branch" class="form-group">
<input type="text" data-table="lab_test_result" data-field="x_Branch" name="x<?php echo $lab_test_result_list->RowIndex ?>_Branch" id="x<?php echo $lab_test_result_list->RowIndex ?>_Branch" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($lab_test_result_list->Branch->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->Branch->EditValue ?>"<?php echo $lab_test_result_list->Branch->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Branch" name="o<?php echo $lab_test_result_list->RowIndex ?>_Branch" id="o<?php echo $lab_test_result_list->RowIndex ?>_Branch" value="<?php echo HtmlEncode($lab_test_result_list->Branch->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_Branch">
<span<?php echo $lab_test_result_list->Branch->viewAttributes() ?>><?php echo $lab_test_result_list->Branch->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->SidNo->Visible) { // SidNo ?>
		<td data-name="SidNo" <?php echo $lab_test_result_list->SidNo->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_SidNo" class="form-group">
<input type="text" data-table="lab_test_result" data-field="x_SidNo" name="x<?php echo $lab_test_result_list->RowIndex ?>_SidNo" id="x<?php echo $lab_test_result_list->RowIndex ?>_SidNo" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($lab_test_result_list->SidNo->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->SidNo->EditValue ?>"<?php echo $lab_test_result_list->SidNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_SidNo" name="o<?php echo $lab_test_result_list->RowIndex ?>_SidNo" id="o<?php echo $lab_test_result_list->RowIndex ?>_SidNo" value="<?php echo HtmlEncode($lab_test_result_list->SidNo->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_SidNo">
<span<?php echo $lab_test_result_list->SidNo->viewAttributes() ?>><?php echo $lab_test_result_list->SidNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->SidDate->Visible) { // SidDate ?>
		<td data-name="SidDate" <?php echo $lab_test_result_list->SidDate->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_SidDate" class="form-group">
<input type="text" data-table="lab_test_result" data-field="x_SidDate" name="x<?php echo $lab_test_result_list->RowIndex ?>_SidDate" id="x<?php echo $lab_test_result_list->RowIndex ?>_SidDate" placeholder="<?php echo HtmlEncode($lab_test_result_list->SidDate->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->SidDate->EditValue ?>"<?php echo $lab_test_result_list->SidDate->editAttributes() ?>>
<?php if (!$lab_test_result_list->SidDate->ReadOnly && !$lab_test_result_list->SidDate->Disabled && !isset($lab_test_result_list->SidDate->EditAttrs["readonly"]) && !isset($lab_test_result_list->SidDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultlist", "datetimepicker"], function() {
	ew.createDateTimePicker("flab_test_resultlist", "x<?php echo $lab_test_result_list->RowIndex ?>_SidDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_SidDate" name="o<?php echo $lab_test_result_list->RowIndex ?>_SidDate" id="o<?php echo $lab_test_result_list->RowIndex ?>_SidDate" value="<?php echo HtmlEncode($lab_test_result_list->SidDate->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_SidDate">
<span<?php echo $lab_test_result_list->SidDate->viewAttributes() ?>><?php echo $lab_test_result_list->SidDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->TestCd->Visible) { // TestCd ?>
		<td data-name="TestCd" <?php echo $lab_test_result_list->TestCd->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_TestCd" class="form-group">
<input type="text" data-table="lab_test_result" data-field="x_TestCd" name="x<?php echo $lab_test_result_list->RowIndex ?>_TestCd" id="x<?php echo $lab_test_result_list->RowIndex ?>_TestCd" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($lab_test_result_list->TestCd->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->TestCd->EditValue ?>"<?php echo $lab_test_result_list->TestCd->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_TestCd" name="o<?php echo $lab_test_result_list->RowIndex ?>_TestCd" id="o<?php echo $lab_test_result_list->RowIndex ?>_TestCd" value="<?php echo HtmlEncode($lab_test_result_list->TestCd->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_TestCd">
<span<?php echo $lab_test_result_list->TestCd->viewAttributes() ?>><?php echo $lab_test_result_list->TestCd->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->TestSubCd->Visible) { // TestSubCd ?>
		<td data-name="TestSubCd" <?php echo $lab_test_result_list->TestSubCd->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_TestSubCd" class="form-group">
<input type="text" data-table="lab_test_result" data-field="x_TestSubCd" name="x<?php echo $lab_test_result_list->RowIndex ?>_TestSubCd" id="x<?php echo $lab_test_result_list->RowIndex ?>_TestSubCd" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($lab_test_result_list->TestSubCd->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->TestSubCd->EditValue ?>"<?php echo $lab_test_result_list->TestSubCd->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_TestSubCd" name="o<?php echo $lab_test_result_list->RowIndex ?>_TestSubCd" id="o<?php echo $lab_test_result_list->RowIndex ?>_TestSubCd" value="<?php echo HtmlEncode($lab_test_result_list->TestSubCd->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_TestSubCd">
<span<?php echo $lab_test_result_list->TestSubCd->viewAttributes() ?>><?php echo $lab_test_result_list->TestSubCd->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->DEptCd->Visible) { // DEptCd ?>
		<td data-name="DEptCd" <?php echo $lab_test_result_list->DEptCd->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_DEptCd" class="form-group">
<input type="text" data-table="lab_test_result" data-field="x_DEptCd" name="x<?php echo $lab_test_result_list->RowIndex ?>_DEptCd" id="x<?php echo $lab_test_result_list->RowIndex ?>_DEptCd" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($lab_test_result_list->DEptCd->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->DEptCd->EditValue ?>"<?php echo $lab_test_result_list->DEptCd->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_DEptCd" name="o<?php echo $lab_test_result_list->RowIndex ?>_DEptCd" id="o<?php echo $lab_test_result_list->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($lab_test_result_list->DEptCd->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_DEptCd">
<span<?php echo $lab_test_result_list->DEptCd->viewAttributes() ?>><?php echo $lab_test_result_list->DEptCd->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->ProfCd->Visible) { // ProfCd ?>
		<td data-name="ProfCd" <?php echo $lab_test_result_list->ProfCd->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_ProfCd" class="form-group">
<input type="text" data-table="lab_test_result" data-field="x_ProfCd" name="x<?php echo $lab_test_result_list->RowIndex ?>_ProfCd" id="x<?php echo $lab_test_result_list->RowIndex ?>_ProfCd" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($lab_test_result_list->ProfCd->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->ProfCd->EditValue ?>"<?php echo $lab_test_result_list->ProfCd->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_ProfCd" name="o<?php echo $lab_test_result_list->RowIndex ?>_ProfCd" id="o<?php echo $lab_test_result_list->RowIndex ?>_ProfCd" value="<?php echo HtmlEncode($lab_test_result_list->ProfCd->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_ProfCd">
<span<?php echo $lab_test_result_list->ProfCd->viewAttributes() ?>><?php echo $lab_test_result_list->ProfCd->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->ResultDate->Visible) { // ResultDate ?>
		<td data-name="ResultDate" <?php echo $lab_test_result_list->ResultDate->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_ResultDate" class="form-group">
<input type="text" data-table="lab_test_result" data-field="x_ResultDate" name="x<?php echo $lab_test_result_list->RowIndex ?>_ResultDate" id="x<?php echo $lab_test_result_list->RowIndex ?>_ResultDate" placeholder="<?php echo HtmlEncode($lab_test_result_list->ResultDate->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->ResultDate->EditValue ?>"<?php echo $lab_test_result_list->ResultDate->editAttributes() ?>>
<?php if (!$lab_test_result_list->ResultDate->ReadOnly && !$lab_test_result_list->ResultDate->Disabled && !isset($lab_test_result_list->ResultDate->EditAttrs["readonly"]) && !isset($lab_test_result_list->ResultDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultlist", "datetimepicker"], function() {
	ew.createDateTimePicker("flab_test_resultlist", "x<?php echo $lab_test_result_list->RowIndex ?>_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_ResultDate" name="o<?php echo $lab_test_result_list->RowIndex ?>_ResultDate" id="o<?php echo $lab_test_result_list->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($lab_test_result_list->ResultDate->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_ResultDate">
<span<?php echo $lab_test_result_list->ResultDate->viewAttributes() ?>><?php echo $lab_test_result_list->ResultDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->Method->Visible) { // Method ?>
		<td data-name="Method" <?php echo $lab_test_result_list->Method->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_Method" class="form-group">
<input type="text" data-table="lab_test_result" data-field="x_Method" name="x<?php echo $lab_test_result_list->RowIndex ?>_Method" id="x<?php echo $lab_test_result_list->RowIndex ?>_Method" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($lab_test_result_list->Method->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->Method->EditValue ?>"<?php echo $lab_test_result_list->Method->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Method" name="o<?php echo $lab_test_result_list->RowIndex ?>_Method" id="o<?php echo $lab_test_result_list->RowIndex ?>_Method" value="<?php echo HtmlEncode($lab_test_result_list->Method->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_Method">
<span<?php echo $lab_test_result_list->Method->viewAttributes() ?>><?php echo $lab_test_result_list->Method->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->Specimen->Visible) { // Specimen ?>
		<td data-name="Specimen" <?php echo $lab_test_result_list->Specimen->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_Specimen" class="form-group">
<input type="text" data-table="lab_test_result" data-field="x_Specimen" name="x<?php echo $lab_test_result_list->RowIndex ?>_Specimen" id="x<?php echo $lab_test_result_list->RowIndex ?>_Specimen" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($lab_test_result_list->Specimen->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->Specimen->EditValue ?>"<?php echo $lab_test_result_list->Specimen->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Specimen" name="o<?php echo $lab_test_result_list->RowIndex ?>_Specimen" id="o<?php echo $lab_test_result_list->RowIndex ?>_Specimen" value="<?php echo HtmlEncode($lab_test_result_list->Specimen->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_Specimen">
<span<?php echo $lab_test_result_list->Specimen->viewAttributes() ?>><?php echo $lab_test_result_list->Specimen->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->Amount->Visible) { // Amount ?>
		<td data-name="Amount" <?php echo $lab_test_result_list->Amount->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_Amount" class="form-group">
<input type="text" data-table="lab_test_result" data-field="x_Amount" name="x<?php echo $lab_test_result_list->RowIndex ?>_Amount" id="x<?php echo $lab_test_result_list->RowIndex ?>_Amount" size="30" placeholder="<?php echo HtmlEncode($lab_test_result_list->Amount->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->Amount->EditValue ?>"<?php echo $lab_test_result_list->Amount->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Amount" name="o<?php echo $lab_test_result_list->RowIndex ?>_Amount" id="o<?php echo $lab_test_result_list->RowIndex ?>_Amount" value="<?php echo HtmlEncode($lab_test_result_list->Amount->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_Amount">
<span<?php echo $lab_test_result_list->Amount->viewAttributes() ?>><?php echo $lab_test_result_list->Amount->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->ResultBy->Visible) { // ResultBy ?>
		<td data-name="ResultBy" <?php echo $lab_test_result_list->ResultBy->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_ResultBy" class="form-group">
<input type="text" data-table="lab_test_result" data-field="x_ResultBy" name="x<?php echo $lab_test_result_list->RowIndex ?>_ResultBy" id="x<?php echo $lab_test_result_list->RowIndex ?>_ResultBy" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($lab_test_result_list->ResultBy->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->ResultBy->EditValue ?>"<?php echo $lab_test_result_list->ResultBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_ResultBy" name="o<?php echo $lab_test_result_list->RowIndex ?>_ResultBy" id="o<?php echo $lab_test_result_list->RowIndex ?>_ResultBy" value="<?php echo HtmlEncode($lab_test_result_list->ResultBy->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_ResultBy">
<span<?php echo $lab_test_result_list->ResultBy->viewAttributes() ?>><?php echo $lab_test_result_list->ResultBy->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->AuthBy->Visible) { // AuthBy ?>
		<td data-name="AuthBy" <?php echo $lab_test_result_list->AuthBy->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_AuthBy" class="form-group">
<input type="text" data-table="lab_test_result" data-field="x_AuthBy" name="x<?php echo $lab_test_result_list->RowIndex ?>_AuthBy" id="x<?php echo $lab_test_result_list->RowIndex ?>_AuthBy" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($lab_test_result_list->AuthBy->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->AuthBy->EditValue ?>"<?php echo $lab_test_result_list->AuthBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_AuthBy" name="o<?php echo $lab_test_result_list->RowIndex ?>_AuthBy" id="o<?php echo $lab_test_result_list->RowIndex ?>_AuthBy" value="<?php echo HtmlEncode($lab_test_result_list->AuthBy->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_AuthBy">
<span<?php echo $lab_test_result_list->AuthBy->viewAttributes() ?>><?php echo $lab_test_result_list->AuthBy->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->AuthDate->Visible) { // AuthDate ?>
		<td data-name="AuthDate" <?php echo $lab_test_result_list->AuthDate->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_AuthDate" class="form-group">
<input type="text" data-table="lab_test_result" data-field="x_AuthDate" name="x<?php echo $lab_test_result_list->RowIndex ?>_AuthDate" id="x<?php echo $lab_test_result_list->RowIndex ?>_AuthDate" placeholder="<?php echo HtmlEncode($lab_test_result_list->AuthDate->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->AuthDate->EditValue ?>"<?php echo $lab_test_result_list->AuthDate->editAttributes() ?>>
<?php if (!$lab_test_result_list->AuthDate->ReadOnly && !$lab_test_result_list->AuthDate->Disabled && !isset($lab_test_result_list->AuthDate->EditAttrs["readonly"]) && !isset($lab_test_result_list->AuthDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultlist", "datetimepicker"], function() {
	ew.createDateTimePicker("flab_test_resultlist", "x<?php echo $lab_test_result_list->RowIndex ?>_AuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_AuthDate" name="o<?php echo $lab_test_result_list->RowIndex ?>_AuthDate" id="o<?php echo $lab_test_result_list->RowIndex ?>_AuthDate" value="<?php echo HtmlEncode($lab_test_result_list->AuthDate->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_AuthDate">
<span<?php echo $lab_test_result_list->AuthDate->viewAttributes() ?>><?php echo $lab_test_result_list->AuthDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->Abnormal->Visible) { // Abnormal ?>
		<td data-name="Abnormal" <?php echo $lab_test_result_list->Abnormal->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_Abnormal" class="form-group">
<input type="text" data-table="lab_test_result" data-field="x_Abnormal" name="x<?php echo $lab_test_result_list->RowIndex ?>_Abnormal" id="x<?php echo $lab_test_result_list->RowIndex ?>_Abnormal" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result_list->Abnormal->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->Abnormal->EditValue ?>"<?php echo $lab_test_result_list->Abnormal->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Abnormal" name="o<?php echo $lab_test_result_list->RowIndex ?>_Abnormal" id="o<?php echo $lab_test_result_list->RowIndex ?>_Abnormal" value="<?php echo HtmlEncode($lab_test_result_list->Abnormal->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_Abnormal">
<span<?php echo $lab_test_result_list->Abnormal->viewAttributes() ?>><?php echo $lab_test_result_list->Abnormal->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->Printed->Visible) { // Printed ?>
		<td data-name="Printed" <?php echo $lab_test_result_list->Printed->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_Printed" class="form-group">
<input type="text" data-table="lab_test_result" data-field="x_Printed" name="x<?php echo $lab_test_result_list->RowIndex ?>_Printed" id="x<?php echo $lab_test_result_list->RowIndex ?>_Printed" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result_list->Printed->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->Printed->EditValue ?>"<?php echo $lab_test_result_list->Printed->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Printed" name="o<?php echo $lab_test_result_list->RowIndex ?>_Printed" id="o<?php echo $lab_test_result_list->RowIndex ?>_Printed" value="<?php echo HtmlEncode($lab_test_result_list->Printed->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_Printed">
<span<?php echo $lab_test_result_list->Printed->viewAttributes() ?>><?php echo $lab_test_result_list->Printed->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->Dispatch->Visible) { // Dispatch ?>
		<td data-name="Dispatch" <?php echo $lab_test_result_list->Dispatch->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_Dispatch" class="form-group">
<input type="text" data-table="lab_test_result" data-field="x_Dispatch" name="x<?php echo $lab_test_result_list->RowIndex ?>_Dispatch" id="x<?php echo $lab_test_result_list->RowIndex ?>_Dispatch" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result_list->Dispatch->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->Dispatch->EditValue ?>"<?php echo $lab_test_result_list->Dispatch->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Dispatch" name="o<?php echo $lab_test_result_list->RowIndex ?>_Dispatch" id="o<?php echo $lab_test_result_list->RowIndex ?>_Dispatch" value="<?php echo HtmlEncode($lab_test_result_list->Dispatch->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_Dispatch">
<span<?php echo $lab_test_result_list->Dispatch->viewAttributes() ?>><?php echo $lab_test_result_list->Dispatch->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->LOWHIGH->Visible) { // LOWHIGH ?>
		<td data-name="LOWHIGH" <?php echo $lab_test_result_list->LOWHIGH->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_LOWHIGH" class="form-group">
<input type="text" data-table="lab_test_result" data-field="x_LOWHIGH" name="x<?php echo $lab_test_result_list->RowIndex ?>_LOWHIGH" id="x<?php echo $lab_test_result_list->RowIndex ?>_LOWHIGH" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result_list->LOWHIGH->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->LOWHIGH->EditValue ?>"<?php echo $lab_test_result_list->LOWHIGH->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_LOWHIGH" name="o<?php echo $lab_test_result_list->RowIndex ?>_LOWHIGH" id="o<?php echo $lab_test_result_list->RowIndex ?>_LOWHIGH" value="<?php echo HtmlEncode($lab_test_result_list->LOWHIGH->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_LOWHIGH">
<span<?php echo $lab_test_result_list->LOWHIGH->viewAttributes() ?>><?php echo $lab_test_result_list->LOWHIGH->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->Unit->Visible) { // Unit ?>
		<td data-name="Unit" <?php echo $lab_test_result_list->Unit->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_Unit" class="form-group">
<input type="text" data-table="lab_test_result" data-field="x_Unit" name="x<?php echo $lab_test_result_list->RowIndex ?>_Unit" id="x<?php echo $lab_test_result_list->RowIndex ?>_Unit" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($lab_test_result_list->Unit->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->Unit->EditValue ?>"<?php echo $lab_test_result_list->Unit->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Unit" name="o<?php echo $lab_test_result_list->RowIndex ?>_Unit" id="o<?php echo $lab_test_result_list->RowIndex ?>_Unit" value="<?php echo HtmlEncode($lab_test_result_list->Unit->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_Unit">
<span<?php echo $lab_test_result_list->Unit->viewAttributes() ?>><?php echo $lab_test_result_list->Unit->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->ResDate->Visible) { // ResDate ?>
		<td data-name="ResDate" <?php echo $lab_test_result_list->ResDate->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_ResDate" class="form-group">
<input type="text" data-table="lab_test_result" data-field="x_ResDate" name="x<?php echo $lab_test_result_list->RowIndex ?>_ResDate" id="x<?php echo $lab_test_result_list->RowIndex ?>_ResDate" placeholder="<?php echo HtmlEncode($lab_test_result_list->ResDate->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->ResDate->EditValue ?>"<?php echo $lab_test_result_list->ResDate->editAttributes() ?>>
<?php if (!$lab_test_result_list->ResDate->ReadOnly && !$lab_test_result_list->ResDate->Disabled && !isset($lab_test_result_list->ResDate->EditAttrs["readonly"]) && !isset($lab_test_result_list->ResDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultlist", "datetimepicker"], function() {
	ew.createDateTimePicker("flab_test_resultlist", "x<?php echo $lab_test_result_list->RowIndex ?>_ResDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_ResDate" name="o<?php echo $lab_test_result_list->RowIndex ?>_ResDate" id="o<?php echo $lab_test_result_list->RowIndex ?>_ResDate" value="<?php echo HtmlEncode($lab_test_result_list->ResDate->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_ResDate">
<span<?php echo $lab_test_result_list->ResDate->viewAttributes() ?>><?php echo $lab_test_result_list->ResDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->Pic1->Visible) { // Pic1 ?>
		<td data-name="Pic1" <?php echo $lab_test_result_list->Pic1->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_Pic1" class="form-group">
<input type="text" data-table="lab_test_result" data-field="x_Pic1" name="x<?php echo $lab_test_result_list->RowIndex ?>_Pic1" id="x<?php echo $lab_test_result_list->RowIndex ?>_Pic1" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($lab_test_result_list->Pic1->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->Pic1->EditValue ?>"<?php echo $lab_test_result_list->Pic1->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Pic1" name="o<?php echo $lab_test_result_list->RowIndex ?>_Pic1" id="o<?php echo $lab_test_result_list->RowIndex ?>_Pic1" value="<?php echo HtmlEncode($lab_test_result_list->Pic1->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_Pic1">
<span<?php echo $lab_test_result_list->Pic1->viewAttributes() ?>><?php echo $lab_test_result_list->Pic1->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->Pic2->Visible) { // Pic2 ?>
		<td data-name="Pic2" <?php echo $lab_test_result_list->Pic2->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_Pic2" class="form-group">
<input type="text" data-table="lab_test_result" data-field="x_Pic2" name="x<?php echo $lab_test_result_list->RowIndex ?>_Pic2" id="x<?php echo $lab_test_result_list->RowIndex ?>_Pic2" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($lab_test_result_list->Pic2->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->Pic2->EditValue ?>"<?php echo $lab_test_result_list->Pic2->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Pic2" name="o<?php echo $lab_test_result_list->RowIndex ?>_Pic2" id="o<?php echo $lab_test_result_list->RowIndex ?>_Pic2" value="<?php echo HtmlEncode($lab_test_result_list->Pic2->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_Pic2">
<span<?php echo $lab_test_result_list->Pic2->viewAttributes() ?>><?php echo $lab_test_result_list->Pic2->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->GraphPath->Visible) { // GraphPath ?>
		<td data-name="GraphPath" <?php echo $lab_test_result_list->GraphPath->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_GraphPath" class="form-group">
<input type="text" data-table="lab_test_result" data-field="x_GraphPath" name="x<?php echo $lab_test_result_list->RowIndex ?>_GraphPath" id="x<?php echo $lab_test_result_list->RowIndex ?>_GraphPath" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($lab_test_result_list->GraphPath->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->GraphPath->EditValue ?>"<?php echo $lab_test_result_list->GraphPath->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_GraphPath" name="o<?php echo $lab_test_result_list->RowIndex ?>_GraphPath" id="o<?php echo $lab_test_result_list->RowIndex ?>_GraphPath" value="<?php echo HtmlEncode($lab_test_result_list->GraphPath->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_GraphPath">
<span<?php echo $lab_test_result_list->GraphPath->viewAttributes() ?>><?php echo $lab_test_result_list->GraphPath->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->SampleDate->Visible) { // SampleDate ?>
		<td data-name="SampleDate" <?php echo $lab_test_result_list->SampleDate->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_SampleDate" class="form-group">
<input type="text" data-table="lab_test_result" data-field="x_SampleDate" name="x<?php echo $lab_test_result_list->RowIndex ?>_SampleDate" id="x<?php echo $lab_test_result_list->RowIndex ?>_SampleDate" placeholder="<?php echo HtmlEncode($lab_test_result_list->SampleDate->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->SampleDate->EditValue ?>"<?php echo $lab_test_result_list->SampleDate->editAttributes() ?>>
<?php if (!$lab_test_result_list->SampleDate->ReadOnly && !$lab_test_result_list->SampleDate->Disabled && !isset($lab_test_result_list->SampleDate->EditAttrs["readonly"]) && !isset($lab_test_result_list->SampleDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultlist", "datetimepicker"], function() {
	ew.createDateTimePicker("flab_test_resultlist", "x<?php echo $lab_test_result_list->RowIndex ?>_SampleDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_SampleDate" name="o<?php echo $lab_test_result_list->RowIndex ?>_SampleDate" id="o<?php echo $lab_test_result_list->RowIndex ?>_SampleDate" value="<?php echo HtmlEncode($lab_test_result_list->SampleDate->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_SampleDate">
<span<?php echo $lab_test_result_list->SampleDate->viewAttributes() ?>><?php echo $lab_test_result_list->SampleDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->SampleUser->Visible) { // SampleUser ?>
		<td data-name="SampleUser" <?php echo $lab_test_result_list->SampleUser->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_SampleUser" class="form-group">
<input type="text" data-table="lab_test_result" data-field="x_SampleUser" name="x<?php echo $lab_test_result_list->RowIndex ?>_SampleUser" id="x<?php echo $lab_test_result_list->RowIndex ?>_SampleUser" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($lab_test_result_list->SampleUser->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->SampleUser->EditValue ?>"<?php echo $lab_test_result_list->SampleUser->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_SampleUser" name="o<?php echo $lab_test_result_list->RowIndex ?>_SampleUser" id="o<?php echo $lab_test_result_list->RowIndex ?>_SampleUser" value="<?php echo HtmlEncode($lab_test_result_list->SampleUser->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_SampleUser">
<span<?php echo $lab_test_result_list->SampleUser->viewAttributes() ?>><?php echo $lab_test_result_list->SampleUser->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->ReceivedDate->Visible) { // ReceivedDate ?>
		<td data-name="ReceivedDate" <?php echo $lab_test_result_list->ReceivedDate->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_ReceivedDate" class="form-group">
<input type="text" data-table="lab_test_result" data-field="x_ReceivedDate" name="x<?php echo $lab_test_result_list->RowIndex ?>_ReceivedDate" id="x<?php echo $lab_test_result_list->RowIndex ?>_ReceivedDate" placeholder="<?php echo HtmlEncode($lab_test_result_list->ReceivedDate->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->ReceivedDate->EditValue ?>"<?php echo $lab_test_result_list->ReceivedDate->editAttributes() ?>>
<?php if (!$lab_test_result_list->ReceivedDate->ReadOnly && !$lab_test_result_list->ReceivedDate->Disabled && !isset($lab_test_result_list->ReceivedDate->EditAttrs["readonly"]) && !isset($lab_test_result_list->ReceivedDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultlist", "datetimepicker"], function() {
	ew.createDateTimePicker("flab_test_resultlist", "x<?php echo $lab_test_result_list->RowIndex ?>_ReceivedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_ReceivedDate" name="o<?php echo $lab_test_result_list->RowIndex ?>_ReceivedDate" id="o<?php echo $lab_test_result_list->RowIndex ?>_ReceivedDate" value="<?php echo HtmlEncode($lab_test_result_list->ReceivedDate->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_ReceivedDate">
<span<?php echo $lab_test_result_list->ReceivedDate->viewAttributes() ?>><?php echo $lab_test_result_list->ReceivedDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->ReceivedUser->Visible) { // ReceivedUser ?>
		<td data-name="ReceivedUser" <?php echo $lab_test_result_list->ReceivedUser->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_ReceivedUser" class="form-group">
<input type="text" data-table="lab_test_result" data-field="x_ReceivedUser" name="x<?php echo $lab_test_result_list->RowIndex ?>_ReceivedUser" id="x<?php echo $lab_test_result_list->RowIndex ?>_ReceivedUser" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($lab_test_result_list->ReceivedUser->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->ReceivedUser->EditValue ?>"<?php echo $lab_test_result_list->ReceivedUser->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_ReceivedUser" name="o<?php echo $lab_test_result_list->RowIndex ?>_ReceivedUser" id="o<?php echo $lab_test_result_list->RowIndex ?>_ReceivedUser" value="<?php echo HtmlEncode($lab_test_result_list->ReceivedUser->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_ReceivedUser">
<span<?php echo $lab_test_result_list->ReceivedUser->viewAttributes() ?>><?php echo $lab_test_result_list->ReceivedUser->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->DeptRecvDate->Visible) { // DeptRecvDate ?>
		<td data-name="DeptRecvDate" <?php echo $lab_test_result_list->DeptRecvDate->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_DeptRecvDate" class="form-group">
<input type="text" data-table="lab_test_result" data-field="x_DeptRecvDate" name="x<?php echo $lab_test_result_list->RowIndex ?>_DeptRecvDate" id="x<?php echo $lab_test_result_list->RowIndex ?>_DeptRecvDate" placeholder="<?php echo HtmlEncode($lab_test_result_list->DeptRecvDate->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->DeptRecvDate->EditValue ?>"<?php echo $lab_test_result_list->DeptRecvDate->editAttributes() ?>>
<?php if (!$lab_test_result_list->DeptRecvDate->ReadOnly && !$lab_test_result_list->DeptRecvDate->Disabled && !isset($lab_test_result_list->DeptRecvDate->EditAttrs["readonly"]) && !isset($lab_test_result_list->DeptRecvDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultlist", "datetimepicker"], function() {
	ew.createDateTimePicker("flab_test_resultlist", "x<?php echo $lab_test_result_list->RowIndex ?>_DeptRecvDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_DeptRecvDate" name="o<?php echo $lab_test_result_list->RowIndex ?>_DeptRecvDate" id="o<?php echo $lab_test_result_list->RowIndex ?>_DeptRecvDate" value="<?php echo HtmlEncode($lab_test_result_list->DeptRecvDate->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_DeptRecvDate">
<span<?php echo $lab_test_result_list->DeptRecvDate->viewAttributes() ?>><?php echo $lab_test_result_list->DeptRecvDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->DeptRecvUser->Visible) { // DeptRecvUser ?>
		<td data-name="DeptRecvUser" <?php echo $lab_test_result_list->DeptRecvUser->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_DeptRecvUser" class="form-group">
<input type="text" data-table="lab_test_result" data-field="x_DeptRecvUser" name="x<?php echo $lab_test_result_list->RowIndex ?>_DeptRecvUser" id="x<?php echo $lab_test_result_list->RowIndex ?>_DeptRecvUser" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($lab_test_result_list->DeptRecvUser->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->DeptRecvUser->EditValue ?>"<?php echo $lab_test_result_list->DeptRecvUser->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_DeptRecvUser" name="o<?php echo $lab_test_result_list->RowIndex ?>_DeptRecvUser" id="o<?php echo $lab_test_result_list->RowIndex ?>_DeptRecvUser" value="<?php echo HtmlEncode($lab_test_result_list->DeptRecvUser->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_DeptRecvUser">
<span<?php echo $lab_test_result_list->DeptRecvUser->viewAttributes() ?>><?php echo $lab_test_result_list->DeptRecvUser->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->PrintBy->Visible) { // PrintBy ?>
		<td data-name="PrintBy" <?php echo $lab_test_result_list->PrintBy->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_PrintBy" class="form-group">
<input type="text" data-table="lab_test_result" data-field="x_PrintBy" name="x<?php echo $lab_test_result_list->RowIndex ?>_PrintBy" id="x<?php echo $lab_test_result_list->RowIndex ?>_PrintBy" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($lab_test_result_list->PrintBy->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->PrintBy->EditValue ?>"<?php echo $lab_test_result_list->PrintBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_PrintBy" name="o<?php echo $lab_test_result_list->RowIndex ?>_PrintBy" id="o<?php echo $lab_test_result_list->RowIndex ?>_PrintBy" value="<?php echo HtmlEncode($lab_test_result_list->PrintBy->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_PrintBy">
<span<?php echo $lab_test_result_list->PrintBy->viewAttributes() ?>><?php echo $lab_test_result_list->PrintBy->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->PrintDate->Visible) { // PrintDate ?>
		<td data-name="PrintDate" <?php echo $lab_test_result_list->PrintDate->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_PrintDate" class="form-group">
<input type="text" data-table="lab_test_result" data-field="x_PrintDate" name="x<?php echo $lab_test_result_list->RowIndex ?>_PrintDate" id="x<?php echo $lab_test_result_list->RowIndex ?>_PrintDate" placeholder="<?php echo HtmlEncode($lab_test_result_list->PrintDate->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->PrintDate->EditValue ?>"<?php echo $lab_test_result_list->PrintDate->editAttributes() ?>>
<?php if (!$lab_test_result_list->PrintDate->ReadOnly && !$lab_test_result_list->PrintDate->Disabled && !isset($lab_test_result_list->PrintDate->EditAttrs["readonly"]) && !isset($lab_test_result_list->PrintDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultlist", "datetimepicker"], function() {
	ew.createDateTimePicker("flab_test_resultlist", "x<?php echo $lab_test_result_list->RowIndex ?>_PrintDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_PrintDate" name="o<?php echo $lab_test_result_list->RowIndex ?>_PrintDate" id="o<?php echo $lab_test_result_list->RowIndex ?>_PrintDate" value="<?php echo HtmlEncode($lab_test_result_list->PrintDate->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_PrintDate">
<span<?php echo $lab_test_result_list->PrintDate->viewAttributes() ?>><?php echo $lab_test_result_list->PrintDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->MachineCD->Visible) { // MachineCD ?>
		<td data-name="MachineCD" <?php echo $lab_test_result_list->MachineCD->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_MachineCD" class="form-group">
<input type="text" data-table="lab_test_result" data-field="x_MachineCD" name="x<?php echo $lab_test_result_list->RowIndex ?>_MachineCD" id="x<?php echo $lab_test_result_list->RowIndex ?>_MachineCD" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($lab_test_result_list->MachineCD->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->MachineCD->EditValue ?>"<?php echo $lab_test_result_list->MachineCD->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_MachineCD" name="o<?php echo $lab_test_result_list->RowIndex ?>_MachineCD" id="o<?php echo $lab_test_result_list->RowIndex ?>_MachineCD" value="<?php echo HtmlEncode($lab_test_result_list->MachineCD->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_MachineCD">
<span<?php echo $lab_test_result_list->MachineCD->viewAttributes() ?>><?php echo $lab_test_result_list->MachineCD->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->TestCancel->Visible) { // TestCancel ?>
		<td data-name="TestCancel" <?php echo $lab_test_result_list->TestCancel->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_TestCancel" class="form-group">
<input type="text" data-table="lab_test_result" data-field="x_TestCancel" name="x<?php echo $lab_test_result_list->RowIndex ?>_TestCancel" id="x<?php echo $lab_test_result_list->RowIndex ?>_TestCancel" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result_list->TestCancel->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->TestCancel->EditValue ?>"<?php echo $lab_test_result_list->TestCancel->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_TestCancel" name="o<?php echo $lab_test_result_list->RowIndex ?>_TestCancel" id="o<?php echo $lab_test_result_list->RowIndex ?>_TestCancel" value="<?php echo HtmlEncode($lab_test_result_list->TestCancel->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_TestCancel">
<span<?php echo $lab_test_result_list->TestCancel->viewAttributes() ?>><?php echo $lab_test_result_list->TestCancel->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->OutSource->Visible) { // OutSource ?>
		<td data-name="OutSource" <?php echo $lab_test_result_list->OutSource->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_OutSource" class="form-group">
<input type="text" data-table="lab_test_result" data-field="x_OutSource" name="x<?php echo $lab_test_result_list->RowIndex ?>_OutSource" id="x<?php echo $lab_test_result_list->RowIndex ?>_OutSource" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result_list->OutSource->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->OutSource->EditValue ?>"<?php echo $lab_test_result_list->OutSource->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_OutSource" name="o<?php echo $lab_test_result_list->RowIndex ?>_OutSource" id="o<?php echo $lab_test_result_list->RowIndex ?>_OutSource" value="<?php echo HtmlEncode($lab_test_result_list->OutSource->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_OutSource">
<span<?php echo $lab_test_result_list->OutSource->viewAttributes() ?>><?php echo $lab_test_result_list->OutSource->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->Tariff->Visible) { // Tariff ?>
		<td data-name="Tariff" <?php echo $lab_test_result_list->Tariff->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_Tariff" class="form-group">
<input type="text" data-table="lab_test_result" data-field="x_Tariff" name="x<?php echo $lab_test_result_list->RowIndex ?>_Tariff" id="x<?php echo $lab_test_result_list->RowIndex ?>_Tariff" size="30" placeholder="<?php echo HtmlEncode($lab_test_result_list->Tariff->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->Tariff->EditValue ?>"<?php echo $lab_test_result_list->Tariff->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Tariff" name="o<?php echo $lab_test_result_list->RowIndex ?>_Tariff" id="o<?php echo $lab_test_result_list->RowIndex ?>_Tariff" value="<?php echo HtmlEncode($lab_test_result_list->Tariff->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_Tariff">
<span<?php echo $lab_test_result_list->Tariff->viewAttributes() ?>><?php echo $lab_test_result_list->Tariff->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->EDITDATE->Visible) { // EDITDATE ?>
		<td data-name="EDITDATE" <?php echo $lab_test_result_list->EDITDATE->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_EDITDATE" class="form-group">
<input type="text" data-table="lab_test_result" data-field="x_EDITDATE" name="x<?php echo $lab_test_result_list->RowIndex ?>_EDITDATE" id="x<?php echo $lab_test_result_list->RowIndex ?>_EDITDATE" placeholder="<?php echo HtmlEncode($lab_test_result_list->EDITDATE->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->EDITDATE->EditValue ?>"<?php echo $lab_test_result_list->EDITDATE->editAttributes() ?>>
<?php if (!$lab_test_result_list->EDITDATE->ReadOnly && !$lab_test_result_list->EDITDATE->Disabled && !isset($lab_test_result_list->EDITDATE->EditAttrs["readonly"]) && !isset($lab_test_result_list->EDITDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultlist", "datetimepicker"], function() {
	ew.createDateTimePicker("flab_test_resultlist", "x<?php echo $lab_test_result_list->RowIndex ?>_EDITDATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_EDITDATE" name="o<?php echo $lab_test_result_list->RowIndex ?>_EDITDATE" id="o<?php echo $lab_test_result_list->RowIndex ?>_EDITDATE" value="<?php echo HtmlEncode($lab_test_result_list->EDITDATE->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_EDITDATE">
<span<?php echo $lab_test_result_list->EDITDATE->viewAttributes() ?>><?php echo $lab_test_result_list->EDITDATE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->UPLOAD->Visible) { // UPLOAD ?>
		<td data-name="UPLOAD" <?php echo $lab_test_result_list->UPLOAD->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_UPLOAD" class="form-group">
<input type="text" data-table="lab_test_result" data-field="x_UPLOAD" name="x<?php echo $lab_test_result_list->RowIndex ?>_UPLOAD" id="x<?php echo $lab_test_result_list->RowIndex ?>_UPLOAD" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result_list->UPLOAD->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->UPLOAD->EditValue ?>"<?php echo $lab_test_result_list->UPLOAD->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_UPLOAD" name="o<?php echo $lab_test_result_list->RowIndex ?>_UPLOAD" id="o<?php echo $lab_test_result_list->RowIndex ?>_UPLOAD" value="<?php echo HtmlEncode($lab_test_result_list->UPLOAD->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_UPLOAD">
<span<?php echo $lab_test_result_list->UPLOAD->viewAttributes() ?>><?php echo $lab_test_result_list->UPLOAD->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->SAuthDate->Visible) { // SAuthDate ?>
		<td data-name="SAuthDate" <?php echo $lab_test_result_list->SAuthDate->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_SAuthDate" class="form-group">
<input type="text" data-table="lab_test_result" data-field="x_SAuthDate" name="x<?php echo $lab_test_result_list->RowIndex ?>_SAuthDate" id="x<?php echo $lab_test_result_list->RowIndex ?>_SAuthDate" placeholder="<?php echo HtmlEncode($lab_test_result_list->SAuthDate->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->SAuthDate->EditValue ?>"<?php echo $lab_test_result_list->SAuthDate->editAttributes() ?>>
<?php if (!$lab_test_result_list->SAuthDate->ReadOnly && !$lab_test_result_list->SAuthDate->Disabled && !isset($lab_test_result_list->SAuthDate->EditAttrs["readonly"]) && !isset($lab_test_result_list->SAuthDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultlist", "datetimepicker"], function() {
	ew.createDateTimePicker("flab_test_resultlist", "x<?php echo $lab_test_result_list->RowIndex ?>_SAuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_SAuthDate" name="o<?php echo $lab_test_result_list->RowIndex ?>_SAuthDate" id="o<?php echo $lab_test_result_list->RowIndex ?>_SAuthDate" value="<?php echo HtmlEncode($lab_test_result_list->SAuthDate->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_SAuthDate">
<span<?php echo $lab_test_result_list->SAuthDate->viewAttributes() ?>><?php echo $lab_test_result_list->SAuthDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->SAuthBy->Visible) { // SAuthBy ?>
		<td data-name="SAuthBy" <?php echo $lab_test_result_list->SAuthBy->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_SAuthBy" class="form-group">
<input type="text" data-table="lab_test_result" data-field="x_SAuthBy" name="x<?php echo $lab_test_result_list->RowIndex ?>_SAuthBy" id="x<?php echo $lab_test_result_list->RowIndex ?>_SAuthBy" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($lab_test_result_list->SAuthBy->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->SAuthBy->EditValue ?>"<?php echo $lab_test_result_list->SAuthBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_SAuthBy" name="o<?php echo $lab_test_result_list->RowIndex ?>_SAuthBy" id="o<?php echo $lab_test_result_list->RowIndex ?>_SAuthBy" value="<?php echo HtmlEncode($lab_test_result_list->SAuthBy->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_SAuthBy">
<span<?php echo $lab_test_result_list->SAuthBy->viewAttributes() ?>><?php echo $lab_test_result_list->SAuthBy->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->NoRC->Visible) { // NoRC ?>
		<td data-name="NoRC" <?php echo $lab_test_result_list->NoRC->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_NoRC" class="form-group">
<input type="text" data-table="lab_test_result" data-field="x_NoRC" name="x<?php echo $lab_test_result_list->RowIndex ?>_NoRC" id="x<?php echo $lab_test_result_list->RowIndex ?>_NoRC" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result_list->NoRC->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->NoRC->EditValue ?>"<?php echo $lab_test_result_list->NoRC->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_NoRC" name="o<?php echo $lab_test_result_list->RowIndex ?>_NoRC" id="o<?php echo $lab_test_result_list->RowIndex ?>_NoRC" value="<?php echo HtmlEncode($lab_test_result_list->NoRC->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_NoRC">
<span<?php echo $lab_test_result_list->NoRC->viewAttributes() ?>><?php echo $lab_test_result_list->NoRC->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->DispDt->Visible) { // DispDt ?>
		<td data-name="DispDt" <?php echo $lab_test_result_list->DispDt->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_DispDt" class="form-group">
<input type="text" data-table="lab_test_result" data-field="x_DispDt" name="x<?php echo $lab_test_result_list->RowIndex ?>_DispDt" id="x<?php echo $lab_test_result_list->RowIndex ?>_DispDt" placeholder="<?php echo HtmlEncode($lab_test_result_list->DispDt->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->DispDt->EditValue ?>"<?php echo $lab_test_result_list->DispDt->editAttributes() ?>>
<?php if (!$lab_test_result_list->DispDt->ReadOnly && !$lab_test_result_list->DispDt->Disabled && !isset($lab_test_result_list->DispDt->EditAttrs["readonly"]) && !isset($lab_test_result_list->DispDt->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultlist", "datetimepicker"], function() {
	ew.createDateTimePicker("flab_test_resultlist", "x<?php echo $lab_test_result_list->RowIndex ?>_DispDt", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_DispDt" name="o<?php echo $lab_test_result_list->RowIndex ?>_DispDt" id="o<?php echo $lab_test_result_list->RowIndex ?>_DispDt" value="<?php echo HtmlEncode($lab_test_result_list->DispDt->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_DispDt">
<span<?php echo $lab_test_result_list->DispDt->viewAttributes() ?>><?php echo $lab_test_result_list->DispDt->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->DispUser->Visible) { // DispUser ?>
		<td data-name="DispUser" <?php echo $lab_test_result_list->DispUser->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_DispUser" class="form-group">
<input type="text" data-table="lab_test_result" data-field="x_DispUser" name="x<?php echo $lab_test_result_list->RowIndex ?>_DispUser" id="x<?php echo $lab_test_result_list->RowIndex ?>_DispUser" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($lab_test_result_list->DispUser->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->DispUser->EditValue ?>"<?php echo $lab_test_result_list->DispUser->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_DispUser" name="o<?php echo $lab_test_result_list->RowIndex ?>_DispUser" id="o<?php echo $lab_test_result_list->RowIndex ?>_DispUser" value="<?php echo HtmlEncode($lab_test_result_list->DispUser->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_DispUser">
<span<?php echo $lab_test_result_list->DispUser->viewAttributes() ?>><?php echo $lab_test_result_list->DispUser->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->DispRemarks->Visible) { // DispRemarks ?>
		<td data-name="DispRemarks" <?php echo $lab_test_result_list->DispRemarks->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_DispRemarks" class="form-group">
<input type="text" data-table="lab_test_result" data-field="x_DispRemarks" name="x<?php echo $lab_test_result_list->RowIndex ?>_DispRemarks" id="x<?php echo $lab_test_result_list->RowIndex ?>_DispRemarks" size="30" maxlength="250" placeholder="<?php echo HtmlEncode($lab_test_result_list->DispRemarks->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->DispRemarks->EditValue ?>"<?php echo $lab_test_result_list->DispRemarks->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_DispRemarks" name="o<?php echo $lab_test_result_list->RowIndex ?>_DispRemarks" id="o<?php echo $lab_test_result_list->RowIndex ?>_DispRemarks" value="<?php echo HtmlEncode($lab_test_result_list->DispRemarks->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_DispRemarks">
<span<?php echo $lab_test_result_list->DispRemarks->viewAttributes() ?>><?php echo $lab_test_result_list->DispRemarks->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->DispMode->Visible) { // DispMode ?>
		<td data-name="DispMode" <?php echo $lab_test_result_list->DispMode->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_DispMode" class="form-group">
<input type="text" data-table="lab_test_result" data-field="x_DispMode" name="x<?php echo $lab_test_result_list->RowIndex ?>_DispMode" id="x<?php echo $lab_test_result_list->RowIndex ?>_DispMode" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($lab_test_result_list->DispMode->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->DispMode->EditValue ?>"<?php echo $lab_test_result_list->DispMode->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_DispMode" name="o<?php echo $lab_test_result_list->RowIndex ?>_DispMode" id="o<?php echo $lab_test_result_list->RowIndex ?>_DispMode" value="<?php echo HtmlEncode($lab_test_result_list->DispMode->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_DispMode">
<span<?php echo $lab_test_result_list->DispMode->viewAttributes() ?>><?php echo $lab_test_result_list->DispMode->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->ProductCD->Visible) { // ProductCD ?>
		<td data-name="ProductCD" <?php echo $lab_test_result_list->ProductCD->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_ProductCD" class="form-group">
<input type="text" data-table="lab_test_result" data-field="x_ProductCD" name="x<?php echo $lab_test_result_list->RowIndex ?>_ProductCD" id="x<?php echo $lab_test_result_list->RowIndex ?>_ProductCD" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($lab_test_result_list->ProductCD->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->ProductCD->EditValue ?>"<?php echo $lab_test_result_list->ProductCD->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_ProductCD" name="o<?php echo $lab_test_result_list->RowIndex ?>_ProductCD" id="o<?php echo $lab_test_result_list->RowIndex ?>_ProductCD" value="<?php echo HtmlEncode($lab_test_result_list->ProductCD->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_ProductCD">
<span<?php echo $lab_test_result_list->ProductCD->viewAttributes() ?>><?php echo $lab_test_result_list->ProductCD->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->Nos->Visible) { // Nos ?>
		<td data-name="Nos" <?php echo $lab_test_result_list->Nos->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_Nos" class="form-group">
<input type="text" data-table="lab_test_result" data-field="x_Nos" name="x<?php echo $lab_test_result_list->RowIndex ?>_Nos" id="x<?php echo $lab_test_result_list->RowIndex ?>_Nos" size="30" placeholder="<?php echo HtmlEncode($lab_test_result_list->Nos->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->Nos->EditValue ?>"<?php echo $lab_test_result_list->Nos->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Nos" name="o<?php echo $lab_test_result_list->RowIndex ?>_Nos" id="o<?php echo $lab_test_result_list->RowIndex ?>_Nos" value="<?php echo HtmlEncode($lab_test_result_list->Nos->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_Nos">
<span<?php echo $lab_test_result_list->Nos->viewAttributes() ?>><?php echo $lab_test_result_list->Nos->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->WBCPath->Visible) { // WBCPath ?>
		<td data-name="WBCPath" <?php echo $lab_test_result_list->WBCPath->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_WBCPath" class="form-group">
<input type="text" data-table="lab_test_result" data-field="x_WBCPath" name="x<?php echo $lab_test_result_list->RowIndex ?>_WBCPath" id="x<?php echo $lab_test_result_list->RowIndex ?>_WBCPath" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($lab_test_result_list->WBCPath->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->WBCPath->EditValue ?>"<?php echo $lab_test_result_list->WBCPath->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_WBCPath" name="o<?php echo $lab_test_result_list->RowIndex ?>_WBCPath" id="o<?php echo $lab_test_result_list->RowIndex ?>_WBCPath" value="<?php echo HtmlEncode($lab_test_result_list->WBCPath->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_WBCPath">
<span<?php echo $lab_test_result_list->WBCPath->viewAttributes() ?>><?php echo $lab_test_result_list->WBCPath->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->RBCPath->Visible) { // RBCPath ?>
		<td data-name="RBCPath" <?php echo $lab_test_result_list->RBCPath->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_RBCPath" class="form-group">
<input type="text" data-table="lab_test_result" data-field="x_RBCPath" name="x<?php echo $lab_test_result_list->RowIndex ?>_RBCPath" id="x<?php echo $lab_test_result_list->RowIndex ?>_RBCPath" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($lab_test_result_list->RBCPath->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->RBCPath->EditValue ?>"<?php echo $lab_test_result_list->RBCPath->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_RBCPath" name="o<?php echo $lab_test_result_list->RowIndex ?>_RBCPath" id="o<?php echo $lab_test_result_list->RowIndex ?>_RBCPath" value="<?php echo HtmlEncode($lab_test_result_list->RBCPath->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_RBCPath">
<span<?php echo $lab_test_result_list->RBCPath->viewAttributes() ?>><?php echo $lab_test_result_list->RBCPath->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->PTPath->Visible) { // PTPath ?>
		<td data-name="PTPath" <?php echo $lab_test_result_list->PTPath->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_PTPath" class="form-group">
<input type="text" data-table="lab_test_result" data-field="x_PTPath" name="x<?php echo $lab_test_result_list->RowIndex ?>_PTPath" id="x<?php echo $lab_test_result_list->RowIndex ?>_PTPath" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($lab_test_result_list->PTPath->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->PTPath->EditValue ?>"<?php echo $lab_test_result_list->PTPath->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_PTPath" name="o<?php echo $lab_test_result_list->RowIndex ?>_PTPath" id="o<?php echo $lab_test_result_list->RowIndex ?>_PTPath" value="<?php echo HtmlEncode($lab_test_result_list->PTPath->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_PTPath">
<span<?php echo $lab_test_result_list->PTPath->viewAttributes() ?>><?php echo $lab_test_result_list->PTPath->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->ActualAmt->Visible) { // ActualAmt ?>
		<td data-name="ActualAmt" <?php echo $lab_test_result_list->ActualAmt->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_ActualAmt" class="form-group">
<input type="text" data-table="lab_test_result" data-field="x_ActualAmt" name="x<?php echo $lab_test_result_list->RowIndex ?>_ActualAmt" id="x<?php echo $lab_test_result_list->RowIndex ?>_ActualAmt" size="30" placeholder="<?php echo HtmlEncode($lab_test_result_list->ActualAmt->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->ActualAmt->EditValue ?>"<?php echo $lab_test_result_list->ActualAmt->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_ActualAmt" name="o<?php echo $lab_test_result_list->RowIndex ?>_ActualAmt" id="o<?php echo $lab_test_result_list->RowIndex ?>_ActualAmt" value="<?php echo HtmlEncode($lab_test_result_list->ActualAmt->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_ActualAmt">
<span<?php echo $lab_test_result_list->ActualAmt->viewAttributes() ?>><?php echo $lab_test_result_list->ActualAmt->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->NoSign->Visible) { // NoSign ?>
		<td data-name="NoSign" <?php echo $lab_test_result_list->NoSign->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_NoSign" class="form-group">
<input type="text" data-table="lab_test_result" data-field="x_NoSign" name="x<?php echo $lab_test_result_list->RowIndex ?>_NoSign" id="x<?php echo $lab_test_result_list->RowIndex ?>_NoSign" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result_list->NoSign->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->NoSign->EditValue ?>"<?php echo $lab_test_result_list->NoSign->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_NoSign" name="o<?php echo $lab_test_result_list->RowIndex ?>_NoSign" id="o<?php echo $lab_test_result_list->RowIndex ?>_NoSign" value="<?php echo HtmlEncode($lab_test_result_list->NoSign->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_NoSign">
<span<?php echo $lab_test_result_list->NoSign->viewAttributes() ?>><?php echo $lab_test_result_list->NoSign->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->_Barcode->Visible) { // Barcode ?>
		<td data-name="_Barcode" <?php echo $lab_test_result_list->_Barcode->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result__Barcode" class="form-group">
<input type="text" data-table="lab_test_result" data-field="x__Barcode" name="x<?php echo $lab_test_result_list->RowIndex ?>__Barcode" id="x<?php echo $lab_test_result_list->RowIndex ?>__Barcode" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result_list->_Barcode->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->_Barcode->EditValue ?>"<?php echo $lab_test_result_list->_Barcode->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x__Barcode" name="o<?php echo $lab_test_result_list->RowIndex ?>__Barcode" id="o<?php echo $lab_test_result_list->RowIndex ?>__Barcode" value="<?php echo HtmlEncode($lab_test_result_list->_Barcode->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result__Barcode">
<span<?php echo $lab_test_result_list->_Barcode->viewAttributes() ?>><?php echo $lab_test_result_list->_Barcode->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->ReadTime->Visible) { // ReadTime ?>
		<td data-name="ReadTime" <?php echo $lab_test_result_list->ReadTime->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_ReadTime" class="form-group">
<input type="text" data-table="lab_test_result" data-field="x_ReadTime" name="x<?php echo $lab_test_result_list->RowIndex ?>_ReadTime" id="x<?php echo $lab_test_result_list->RowIndex ?>_ReadTime" placeholder="<?php echo HtmlEncode($lab_test_result_list->ReadTime->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->ReadTime->EditValue ?>"<?php echo $lab_test_result_list->ReadTime->editAttributes() ?>>
<?php if (!$lab_test_result_list->ReadTime->ReadOnly && !$lab_test_result_list->ReadTime->Disabled && !isset($lab_test_result_list->ReadTime->EditAttrs["readonly"]) && !isset($lab_test_result_list->ReadTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultlist", "datetimepicker"], function() {
	ew.createDateTimePicker("flab_test_resultlist", "x<?php echo $lab_test_result_list->RowIndex ?>_ReadTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_ReadTime" name="o<?php echo $lab_test_result_list->RowIndex ?>_ReadTime" id="o<?php echo $lab_test_result_list->RowIndex ?>_ReadTime" value="<?php echo HtmlEncode($lab_test_result_list->ReadTime->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_ReadTime">
<span<?php echo $lab_test_result_list->ReadTime->viewAttributes() ?>><?php echo $lab_test_result_list->ReadTime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->VailID->Visible) { // VailID ?>
		<td data-name="VailID" <?php echo $lab_test_result_list->VailID->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_VailID" class="form-group">
<input type="text" data-table="lab_test_result" data-field="x_VailID" name="x<?php echo $lab_test_result_list->RowIndex ?>_VailID" id="x<?php echo $lab_test_result_list->RowIndex ?>_VailID" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($lab_test_result_list->VailID->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->VailID->EditValue ?>"<?php echo $lab_test_result_list->VailID->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_VailID" name="o<?php echo $lab_test_result_list->RowIndex ?>_VailID" id="o<?php echo $lab_test_result_list->RowIndex ?>_VailID" value="<?php echo HtmlEncode($lab_test_result_list->VailID->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_VailID">
<span<?php echo $lab_test_result_list->VailID->viewAttributes() ?>><?php echo $lab_test_result_list->VailID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->ReadMachine->Visible) { // ReadMachine ?>
		<td data-name="ReadMachine" <?php echo $lab_test_result_list->ReadMachine->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_ReadMachine" class="form-group">
<input type="text" data-table="lab_test_result" data-field="x_ReadMachine" name="x<?php echo $lab_test_result_list->RowIndex ?>_ReadMachine" id="x<?php echo $lab_test_result_list->RowIndex ?>_ReadMachine" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($lab_test_result_list->ReadMachine->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->ReadMachine->EditValue ?>"<?php echo $lab_test_result_list->ReadMachine->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_ReadMachine" name="o<?php echo $lab_test_result_list->RowIndex ?>_ReadMachine" id="o<?php echo $lab_test_result_list->RowIndex ?>_ReadMachine" value="<?php echo HtmlEncode($lab_test_result_list->ReadMachine->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_ReadMachine">
<span<?php echo $lab_test_result_list->ReadMachine->viewAttributes() ?>><?php echo $lab_test_result_list->ReadMachine->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->LabCD->Visible) { // LabCD ?>
		<td data-name="LabCD" <?php echo $lab_test_result_list->LabCD->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_LabCD" class="form-group">
<input type="text" data-table="lab_test_result" data-field="x_LabCD" name="x<?php echo $lab_test_result_list->RowIndex ?>_LabCD" id="x<?php echo $lab_test_result_list->RowIndex ?>_LabCD" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($lab_test_result_list->LabCD->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->LabCD->EditValue ?>"<?php echo $lab_test_result_list->LabCD->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_LabCD" name="o<?php echo $lab_test_result_list->RowIndex ?>_LabCD" id="o<?php echo $lab_test_result_list->RowIndex ?>_LabCD" value="<?php echo HtmlEncode($lab_test_result_list->LabCD->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_LabCD">
<span<?php echo $lab_test_result_list->LabCD->viewAttributes() ?>><?php echo $lab_test_result_list->LabCD->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->OutLabAmt->Visible) { // OutLabAmt ?>
		<td data-name="OutLabAmt" <?php echo $lab_test_result_list->OutLabAmt->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_OutLabAmt" class="form-group">
<input type="text" data-table="lab_test_result" data-field="x_OutLabAmt" name="x<?php echo $lab_test_result_list->RowIndex ?>_OutLabAmt" id="x<?php echo $lab_test_result_list->RowIndex ?>_OutLabAmt" size="30" placeholder="<?php echo HtmlEncode($lab_test_result_list->OutLabAmt->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->OutLabAmt->EditValue ?>"<?php echo $lab_test_result_list->OutLabAmt->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_OutLabAmt" name="o<?php echo $lab_test_result_list->RowIndex ?>_OutLabAmt" id="o<?php echo $lab_test_result_list->RowIndex ?>_OutLabAmt" value="<?php echo HtmlEncode($lab_test_result_list->OutLabAmt->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_OutLabAmt">
<span<?php echo $lab_test_result_list->OutLabAmt->viewAttributes() ?>><?php echo $lab_test_result_list->OutLabAmt->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->ProductQty->Visible) { // ProductQty ?>
		<td data-name="ProductQty" <?php echo $lab_test_result_list->ProductQty->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_ProductQty" class="form-group">
<input type="text" data-table="lab_test_result" data-field="x_ProductQty" name="x<?php echo $lab_test_result_list->RowIndex ?>_ProductQty" id="x<?php echo $lab_test_result_list->RowIndex ?>_ProductQty" size="30" placeholder="<?php echo HtmlEncode($lab_test_result_list->ProductQty->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->ProductQty->EditValue ?>"<?php echo $lab_test_result_list->ProductQty->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_ProductQty" name="o<?php echo $lab_test_result_list->RowIndex ?>_ProductQty" id="o<?php echo $lab_test_result_list->RowIndex ?>_ProductQty" value="<?php echo HtmlEncode($lab_test_result_list->ProductQty->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_ProductQty">
<span<?php echo $lab_test_result_list->ProductQty->viewAttributes() ?>><?php echo $lab_test_result_list->ProductQty->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->Repeat->Visible) { // Repeat ?>
		<td data-name="Repeat" <?php echo $lab_test_result_list->Repeat->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_Repeat" class="form-group">
<input type="text" data-table="lab_test_result" data-field="x_Repeat" name="x<?php echo $lab_test_result_list->RowIndex ?>_Repeat" id="x<?php echo $lab_test_result_list->RowIndex ?>_Repeat" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result_list->Repeat->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->Repeat->EditValue ?>"<?php echo $lab_test_result_list->Repeat->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Repeat" name="o<?php echo $lab_test_result_list->RowIndex ?>_Repeat" id="o<?php echo $lab_test_result_list->RowIndex ?>_Repeat" value="<?php echo HtmlEncode($lab_test_result_list->Repeat->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_Repeat">
<span<?php echo $lab_test_result_list->Repeat->viewAttributes() ?>><?php echo $lab_test_result_list->Repeat->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->DeptNo->Visible) { // DeptNo ?>
		<td data-name="DeptNo" <?php echo $lab_test_result_list->DeptNo->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_DeptNo" class="form-group">
<input type="text" data-table="lab_test_result" data-field="x_DeptNo" name="x<?php echo $lab_test_result_list->RowIndex ?>_DeptNo" id="x<?php echo $lab_test_result_list->RowIndex ?>_DeptNo" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($lab_test_result_list->DeptNo->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->DeptNo->EditValue ?>"<?php echo $lab_test_result_list->DeptNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_DeptNo" name="o<?php echo $lab_test_result_list->RowIndex ?>_DeptNo" id="o<?php echo $lab_test_result_list->RowIndex ?>_DeptNo" value="<?php echo HtmlEncode($lab_test_result_list->DeptNo->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_DeptNo">
<span<?php echo $lab_test_result_list->DeptNo->viewAttributes() ?>><?php echo $lab_test_result_list->DeptNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->Desc1->Visible) { // Desc1 ?>
		<td data-name="Desc1" <?php echo $lab_test_result_list->Desc1->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_Desc1" class="form-group">
<input type="text" data-table="lab_test_result" data-field="x_Desc1" name="x<?php echo $lab_test_result_list->RowIndex ?>_Desc1" id="x<?php echo $lab_test_result_list->RowIndex ?>_Desc1" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($lab_test_result_list->Desc1->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->Desc1->EditValue ?>"<?php echo $lab_test_result_list->Desc1->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Desc1" name="o<?php echo $lab_test_result_list->RowIndex ?>_Desc1" id="o<?php echo $lab_test_result_list->RowIndex ?>_Desc1" value="<?php echo HtmlEncode($lab_test_result_list->Desc1->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_Desc1">
<span<?php echo $lab_test_result_list->Desc1->viewAttributes() ?>><?php echo $lab_test_result_list->Desc1->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->Desc2->Visible) { // Desc2 ?>
		<td data-name="Desc2" <?php echo $lab_test_result_list->Desc2->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_Desc2" class="form-group">
<input type="text" data-table="lab_test_result" data-field="x_Desc2" name="x<?php echo $lab_test_result_list->RowIndex ?>_Desc2" id="x<?php echo $lab_test_result_list->RowIndex ?>_Desc2" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($lab_test_result_list->Desc2->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->Desc2->EditValue ?>"<?php echo $lab_test_result_list->Desc2->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Desc2" name="o<?php echo $lab_test_result_list->RowIndex ?>_Desc2" id="o<?php echo $lab_test_result_list->RowIndex ?>_Desc2" value="<?php echo HtmlEncode($lab_test_result_list->Desc2->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_Desc2">
<span<?php echo $lab_test_result_list->Desc2->viewAttributes() ?>><?php echo $lab_test_result_list->Desc2->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->RptResult->Visible) { // RptResult ?>
		<td data-name="RptResult" <?php echo $lab_test_result_list->RptResult->cellAttributes() ?>>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_RptResult" class="form-group">
<input type="text" data-table="lab_test_result" data-field="x_RptResult" name="x<?php echo $lab_test_result_list->RowIndex ?>_RptResult" id="x<?php echo $lab_test_result_list->RowIndex ?>_RptResult" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($lab_test_result_list->RptResult->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->RptResult->EditValue ?>"<?php echo $lab_test_result_list->RptResult->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_RptResult" name="o<?php echo $lab_test_result_list->RowIndex ?>_RptResult" id="o<?php echo $lab_test_result_list->RowIndex ?>_RptResult" value="<?php echo HtmlEncode($lab_test_result_list->RptResult->OldValue) ?>">
<?php } ?>
<?php if ($lab_test_result->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $lab_test_result_list->RowCount ?>_lab_test_result_RptResult">
<span<?php echo $lab_test_result_list->RptResult->viewAttributes() ?>><?php echo $lab_test_result_list->RptResult->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$lab_test_result_list->ListOptions->render("body", "right", $lab_test_result_list->RowCount);
?>
	</tr>
<?php if ($lab_test_result->RowType == ROWTYPE_ADD || $lab_test_result->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["flab_test_resultlist", "load"], function() {
	flab_test_resultlist.updateLists(<?php echo $lab_test_result_list->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$lab_test_result_list->isGridAdd())
		if (!$lab_test_result_list->Recordset->EOF)
			$lab_test_result_list->Recordset->moveNext();
}
?>
<?php
	if ($lab_test_result_list->isGridAdd() || $lab_test_result_list->isGridEdit()) {
		$lab_test_result_list->RowIndex = '$rowindex$';
		$lab_test_result_list->loadRowValues();

		// Set row properties
		$lab_test_result->resetAttributes();
		$lab_test_result->RowAttrs->merge(["data-rowindex" => $lab_test_result_list->RowIndex, "id" => "r0_lab_test_result", "data-rowtype" => ROWTYPE_ADD]);
		$lab_test_result->RowAttrs->appendClass("ew-template");
		$lab_test_result->RowType = ROWTYPE_ADD;

		// Render row
		$lab_test_result_list->renderRow();

		// Render list options
		$lab_test_result_list->renderListOptions();
		$lab_test_result_list->StartRowCount = 0;
?>
	<tr <?php echo $lab_test_result->rowAttributes() ?>>
<?php

// Render list options (body, left)
$lab_test_result_list->ListOptions->render("body", "left", $lab_test_result_list->RowIndex);
?>
	<?php if ($lab_test_result_list->Branch->Visible) { // Branch ?>
		<td data-name="Branch">
<span id="el$rowindex$_lab_test_result_Branch" class="form-group lab_test_result_Branch">
<input type="text" data-table="lab_test_result" data-field="x_Branch" name="x<?php echo $lab_test_result_list->RowIndex ?>_Branch" id="x<?php echo $lab_test_result_list->RowIndex ?>_Branch" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($lab_test_result_list->Branch->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->Branch->EditValue ?>"<?php echo $lab_test_result_list->Branch->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Branch" name="o<?php echo $lab_test_result_list->RowIndex ?>_Branch" id="o<?php echo $lab_test_result_list->RowIndex ?>_Branch" value="<?php echo HtmlEncode($lab_test_result_list->Branch->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->SidNo->Visible) { // SidNo ?>
		<td data-name="SidNo">
<span id="el$rowindex$_lab_test_result_SidNo" class="form-group lab_test_result_SidNo">
<input type="text" data-table="lab_test_result" data-field="x_SidNo" name="x<?php echo $lab_test_result_list->RowIndex ?>_SidNo" id="x<?php echo $lab_test_result_list->RowIndex ?>_SidNo" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($lab_test_result_list->SidNo->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->SidNo->EditValue ?>"<?php echo $lab_test_result_list->SidNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_SidNo" name="o<?php echo $lab_test_result_list->RowIndex ?>_SidNo" id="o<?php echo $lab_test_result_list->RowIndex ?>_SidNo" value="<?php echo HtmlEncode($lab_test_result_list->SidNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->SidDate->Visible) { // SidDate ?>
		<td data-name="SidDate">
<span id="el$rowindex$_lab_test_result_SidDate" class="form-group lab_test_result_SidDate">
<input type="text" data-table="lab_test_result" data-field="x_SidDate" name="x<?php echo $lab_test_result_list->RowIndex ?>_SidDate" id="x<?php echo $lab_test_result_list->RowIndex ?>_SidDate" placeholder="<?php echo HtmlEncode($lab_test_result_list->SidDate->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->SidDate->EditValue ?>"<?php echo $lab_test_result_list->SidDate->editAttributes() ?>>
<?php if (!$lab_test_result_list->SidDate->ReadOnly && !$lab_test_result_list->SidDate->Disabled && !isset($lab_test_result_list->SidDate->EditAttrs["readonly"]) && !isset($lab_test_result_list->SidDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultlist", "datetimepicker"], function() {
	ew.createDateTimePicker("flab_test_resultlist", "x<?php echo $lab_test_result_list->RowIndex ?>_SidDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_SidDate" name="o<?php echo $lab_test_result_list->RowIndex ?>_SidDate" id="o<?php echo $lab_test_result_list->RowIndex ?>_SidDate" value="<?php echo HtmlEncode($lab_test_result_list->SidDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->TestCd->Visible) { // TestCd ?>
		<td data-name="TestCd">
<span id="el$rowindex$_lab_test_result_TestCd" class="form-group lab_test_result_TestCd">
<input type="text" data-table="lab_test_result" data-field="x_TestCd" name="x<?php echo $lab_test_result_list->RowIndex ?>_TestCd" id="x<?php echo $lab_test_result_list->RowIndex ?>_TestCd" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($lab_test_result_list->TestCd->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->TestCd->EditValue ?>"<?php echo $lab_test_result_list->TestCd->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_TestCd" name="o<?php echo $lab_test_result_list->RowIndex ?>_TestCd" id="o<?php echo $lab_test_result_list->RowIndex ?>_TestCd" value="<?php echo HtmlEncode($lab_test_result_list->TestCd->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->TestSubCd->Visible) { // TestSubCd ?>
		<td data-name="TestSubCd">
<span id="el$rowindex$_lab_test_result_TestSubCd" class="form-group lab_test_result_TestSubCd">
<input type="text" data-table="lab_test_result" data-field="x_TestSubCd" name="x<?php echo $lab_test_result_list->RowIndex ?>_TestSubCd" id="x<?php echo $lab_test_result_list->RowIndex ?>_TestSubCd" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($lab_test_result_list->TestSubCd->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->TestSubCd->EditValue ?>"<?php echo $lab_test_result_list->TestSubCd->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_TestSubCd" name="o<?php echo $lab_test_result_list->RowIndex ?>_TestSubCd" id="o<?php echo $lab_test_result_list->RowIndex ?>_TestSubCd" value="<?php echo HtmlEncode($lab_test_result_list->TestSubCd->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->DEptCd->Visible) { // DEptCd ?>
		<td data-name="DEptCd">
<span id="el$rowindex$_lab_test_result_DEptCd" class="form-group lab_test_result_DEptCd">
<input type="text" data-table="lab_test_result" data-field="x_DEptCd" name="x<?php echo $lab_test_result_list->RowIndex ?>_DEptCd" id="x<?php echo $lab_test_result_list->RowIndex ?>_DEptCd" size="30" maxlength="2" placeholder="<?php echo HtmlEncode($lab_test_result_list->DEptCd->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->DEptCd->EditValue ?>"<?php echo $lab_test_result_list->DEptCd->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_DEptCd" name="o<?php echo $lab_test_result_list->RowIndex ?>_DEptCd" id="o<?php echo $lab_test_result_list->RowIndex ?>_DEptCd" value="<?php echo HtmlEncode($lab_test_result_list->DEptCd->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->ProfCd->Visible) { // ProfCd ?>
		<td data-name="ProfCd">
<span id="el$rowindex$_lab_test_result_ProfCd" class="form-group lab_test_result_ProfCd">
<input type="text" data-table="lab_test_result" data-field="x_ProfCd" name="x<?php echo $lab_test_result_list->RowIndex ?>_ProfCd" id="x<?php echo $lab_test_result_list->RowIndex ?>_ProfCd" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($lab_test_result_list->ProfCd->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->ProfCd->EditValue ?>"<?php echo $lab_test_result_list->ProfCd->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_ProfCd" name="o<?php echo $lab_test_result_list->RowIndex ?>_ProfCd" id="o<?php echo $lab_test_result_list->RowIndex ?>_ProfCd" value="<?php echo HtmlEncode($lab_test_result_list->ProfCd->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->ResultDate->Visible) { // ResultDate ?>
		<td data-name="ResultDate">
<span id="el$rowindex$_lab_test_result_ResultDate" class="form-group lab_test_result_ResultDate">
<input type="text" data-table="lab_test_result" data-field="x_ResultDate" name="x<?php echo $lab_test_result_list->RowIndex ?>_ResultDate" id="x<?php echo $lab_test_result_list->RowIndex ?>_ResultDate" placeholder="<?php echo HtmlEncode($lab_test_result_list->ResultDate->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->ResultDate->EditValue ?>"<?php echo $lab_test_result_list->ResultDate->editAttributes() ?>>
<?php if (!$lab_test_result_list->ResultDate->ReadOnly && !$lab_test_result_list->ResultDate->Disabled && !isset($lab_test_result_list->ResultDate->EditAttrs["readonly"]) && !isset($lab_test_result_list->ResultDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultlist", "datetimepicker"], function() {
	ew.createDateTimePicker("flab_test_resultlist", "x<?php echo $lab_test_result_list->RowIndex ?>_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_ResultDate" name="o<?php echo $lab_test_result_list->RowIndex ?>_ResultDate" id="o<?php echo $lab_test_result_list->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($lab_test_result_list->ResultDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->Method->Visible) { // Method ?>
		<td data-name="Method">
<span id="el$rowindex$_lab_test_result_Method" class="form-group lab_test_result_Method">
<input type="text" data-table="lab_test_result" data-field="x_Method" name="x<?php echo $lab_test_result_list->RowIndex ?>_Method" id="x<?php echo $lab_test_result_list->RowIndex ?>_Method" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($lab_test_result_list->Method->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->Method->EditValue ?>"<?php echo $lab_test_result_list->Method->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Method" name="o<?php echo $lab_test_result_list->RowIndex ?>_Method" id="o<?php echo $lab_test_result_list->RowIndex ?>_Method" value="<?php echo HtmlEncode($lab_test_result_list->Method->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->Specimen->Visible) { // Specimen ?>
		<td data-name="Specimen">
<span id="el$rowindex$_lab_test_result_Specimen" class="form-group lab_test_result_Specimen">
<input type="text" data-table="lab_test_result" data-field="x_Specimen" name="x<?php echo $lab_test_result_list->RowIndex ?>_Specimen" id="x<?php echo $lab_test_result_list->RowIndex ?>_Specimen" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($lab_test_result_list->Specimen->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->Specimen->EditValue ?>"<?php echo $lab_test_result_list->Specimen->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Specimen" name="o<?php echo $lab_test_result_list->RowIndex ?>_Specimen" id="o<?php echo $lab_test_result_list->RowIndex ?>_Specimen" value="<?php echo HtmlEncode($lab_test_result_list->Specimen->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->Amount->Visible) { // Amount ?>
		<td data-name="Amount">
<span id="el$rowindex$_lab_test_result_Amount" class="form-group lab_test_result_Amount">
<input type="text" data-table="lab_test_result" data-field="x_Amount" name="x<?php echo $lab_test_result_list->RowIndex ?>_Amount" id="x<?php echo $lab_test_result_list->RowIndex ?>_Amount" size="30" placeholder="<?php echo HtmlEncode($lab_test_result_list->Amount->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->Amount->EditValue ?>"<?php echo $lab_test_result_list->Amount->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Amount" name="o<?php echo $lab_test_result_list->RowIndex ?>_Amount" id="o<?php echo $lab_test_result_list->RowIndex ?>_Amount" value="<?php echo HtmlEncode($lab_test_result_list->Amount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->ResultBy->Visible) { // ResultBy ?>
		<td data-name="ResultBy">
<span id="el$rowindex$_lab_test_result_ResultBy" class="form-group lab_test_result_ResultBy">
<input type="text" data-table="lab_test_result" data-field="x_ResultBy" name="x<?php echo $lab_test_result_list->RowIndex ?>_ResultBy" id="x<?php echo $lab_test_result_list->RowIndex ?>_ResultBy" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($lab_test_result_list->ResultBy->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->ResultBy->EditValue ?>"<?php echo $lab_test_result_list->ResultBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_ResultBy" name="o<?php echo $lab_test_result_list->RowIndex ?>_ResultBy" id="o<?php echo $lab_test_result_list->RowIndex ?>_ResultBy" value="<?php echo HtmlEncode($lab_test_result_list->ResultBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->AuthBy->Visible) { // AuthBy ?>
		<td data-name="AuthBy">
<span id="el$rowindex$_lab_test_result_AuthBy" class="form-group lab_test_result_AuthBy">
<input type="text" data-table="lab_test_result" data-field="x_AuthBy" name="x<?php echo $lab_test_result_list->RowIndex ?>_AuthBy" id="x<?php echo $lab_test_result_list->RowIndex ?>_AuthBy" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($lab_test_result_list->AuthBy->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->AuthBy->EditValue ?>"<?php echo $lab_test_result_list->AuthBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_AuthBy" name="o<?php echo $lab_test_result_list->RowIndex ?>_AuthBy" id="o<?php echo $lab_test_result_list->RowIndex ?>_AuthBy" value="<?php echo HtmlEncode($lab_test_result_list->AuthBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->AuthDate->Visible) { // AuthDate ?>
		<td data-name="AuthDate">
<span id="el$rowindex$_lab_test_result_AuthDate" class="form-group lab_test_result_AuthDate">
<input type="text" data-table="lab_test_result" data-field="x_AuthDate" name="x<?php echo $lab_test_result_list->RowIndex ?>_AuthDate" id="x<?php echo $lab_test_result_list->RowIndex ?>_AuthDate" placeholder="<?php echo HtmlEncode($lab_test_result_list->AuthDate->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->AuthDate->EditValue ?>"<?php echo $lab_test_result_list->AuthDate->editAttributes() ?>>
<?php if (!$lab_test_result_list->AuthDate->ReadOnly && !$lab_test_result_list->AuthDate->Disabled && !isset($lab_test_result_list->AuthDate->EditAttrs["readonly"]) && !isset($lab_test_result_list->AuthDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultlist", "datetimepicker"], function() {
	ew.createDateTimePicker("flab_test_resultlist", "x<?php echo $lab_test_result_list->RowIndex ?>_AuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_AuthDate" name="o<?php echo $lab_test_result_list->RowIndex ?>_AuthDate" id="o<?php echo $lab_test_result_list->RowIndex ?>_AuthDate" value="<?php echo HtmlEncode($lab_test_result_list->AuthDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->Abnormal->Visible) { // Abnormal ?>
		<td data-name="Abnormal">
<span id="el$rowindex$_lab_test_result_Abnormal" class="form-group lab_test_result_Abnormal">
<input type="text" data-table="lab_test_result" data-field="x_Abnormal" name="x<?php echo $lab_test_result_list->RowIndex ?>_Abnormal" id="x<?php echo $lab_test_result_list->RowIndex ?>_Abnormal" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result_list->Abnormal->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->Abnormal->EditValue ?>"<?php echo $lab_test_result_list->Abnormal->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Abnormal" name="o<?php echo $lab_test_result_list->RowIndex ?>_Abnormal" id="o<?php echo $lab_test_result_list->RowIndex ?>_Abnormal" value="<?php echo HtmlEncode($lab_test_result_list->Abnormal->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->Printed->Visible) { // Printed ?>
		<td data-name="Printed">
<span id="el$rowindex$_lab_test_result_Printed" class="form-group lab_test_result_Printed">
<input type="text" data-table="lab_test_result" data-field="x_Printed" name="x<?php echo $lab_test_result_list->RowIndex ?>_Printed" id="x<?php echo $lab_test_result_list->RowIndex ?>_Printed" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result_list->Printed->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->Printed->EditValue ?>"<?php echo $lab_test_result_list->Printed->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Printed" name="o<?php echo $lab_test_result_list->RowIndex ?>_Printed" id="o<?php echo $lab_test_result_list->RowIndex ?>_Printed" value="<?php echo HtmlEncode($lab_test_result_list->Printed->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->Dispatch->Visible) { // Dispatch ?>
		<td data-name="Dispatch">
<span id="el$rowindex$_lab_test_result_Dispatch" class="form-group lab_test_result_Dispatch">
<input type="text" data-table="lab_test_result" data-field="x_Dispatch" name="x<?php echo $lab_test_result_list->RowIndex ?>_Dispatch" id="x<?php echo $lab_test_result_list->RowIndex ?>_Dispatch" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result_list->Dispatch->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->Dispatch->EditValue ?>"<?php echo $lab_test_result_list->Dispatch->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Dispatch" name="o<?php echo $lab_test_result_list->RowIndex ?>_Dispatch" id="o<?php echo $lab_test_result_list->RowIndex ?>_Dispatch" value="<?php echo HtmlEncode($lab_test_result_list->Dispatch->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->LOWHIGH->Visible) { // LOWHIGH ?>
		<td data-name="LOWHIGH">
<span id="el$rowindex$_lab_test_result_LOWHIGH" class="form-group lab_test_result_LOWHIGH">
<input type="text" data-table="lab_test_result" data-field="x_LOWHIGH" name="x<?php echo $lab_test_result_list->RowIndex ?>_LOWHIGH" id="x<?php echo $lab_test_result_list->RowIndex ?>_LOWHIGH" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result_list->LOWHIGH->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->LOWHIGH->EditValue ?>"<?php echo $lab_test_result_list->LOWHIGH->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_LOWHIGH" name="o<?php echo $lab_test_result_list->RowIndex ?>_LOWHIGH" id="o<?php echo $lab_test_result_list->RowIndex ?>_LOWHIGH" value="<?php echo HtmlEncode($lab_test_result_list->LOWHIGH->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->Unit->Visible) { // Unit ?>
		<td data-name="Unit">
<span id="el$rowindex$_lab_test_result_Unit" class="form-group lab_test_result_Unit">
<input type="text" data-table="lab_test_result" data-field="x_Unit" name="x<?php echo $lab_test_result_list->RowIndex ?>_Unit" id="x<?php echo $lab_test_result_list->RowIndex ?>_Unit" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($lab_test_result_list->Unit->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->Unit->EditValue ?>"<?php echo $lab_test_result_list->Unit->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Unit" name="o<?php echo $lab_test_result_list->RowIndex ?>_Unit" id="o<?php echo $lab_test_result_list->RowIndex ?>_Unit" value="<?php echo HtmlEncode($lab_test_result_list->Unit->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->ResDate->Visible) { // ResDate ?>
		<td data-name="ResDate">
<span id="el$rowindex$_lab_test_result_ResDate" class="form-group lab_test_result_ResDate">
<input type="text" data-table="lab_test_result" data-field="x_ResDate" name="x<?php echo $lab_test_result_list->RowIndex ?>_ResDate" id="x<?php echo $lab_test_result_list->RowIndex ?>_ResDate" placeholder="<?php echo HtmlEncode($lab_test_result_list->ResDate->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->ResDate->EditValue ?>"<?php echo $lab_test_result_list->ResDate->editAttributes() ?>>
<?php if (!$lab_test_result_list->ResDate->ReadOnly && !$lab_test_result_list->ResDate->Disabled && !isset($lab_test_result_list->ResDate->EditAttrs["readonly"]) && !isset($lab_test_result_list->ResDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultlist", "datetimepicker"], function() {
	ew.createDateTimePicker("flab_test_resultlist", "x<?php echo $lab_test_result_list->RowIndex ?>_ResDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_ResDate" name="o<?php echo $lab_test_result_list->RowIndex ?>_ResDate" id="o<?php echo $lab_test_result_list->RowIndex ?>_ResDate" value="<?php echo HtmlEncode($lab_test_result_list->ResDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->Pic1->Visible) { // Pic1 ?>
		<td data-name="Pic1">
<span id="el$rowindex$_lab_test_result_Pic1" class="form-group lab_test_result_Pic1">
<input type="text" data-table="lab_test_result" data-field="x_Pic1" name="x<?php echo $lab_test_result_list->RowIndex ?>_Pic1" id="x<?php echo $lab_test_result_list->RowIndex ?>_Pic1" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($lab_test_result_list->Pic1->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->Pic1->EditValue ?>"<?php echo $lab_test_result_list->Pic1->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Pic1" name="o<?php echo $lab_test_result_list->RowIndex ?>_Pic1" id="o<?php echo $lab_test_result_list->RowIndex ?>_Pic1" value="<?php echo HtmlEncode($lab_test_result_list->Pic1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->Pic2->Visible) { // Pic2 ?>
		<td data-name="Pic2">
<span id="el$rowindex$_lab_test_result_Pic2" class="form-group lab_test_result_Pic2">
<input type="text" data-table="lab_test_result" data-field="x_Pic2" name="x<?php echo $lab_test_result_list->RowIndex ?>_Pic2" id="x<?php echo $lab_test_result_list->RowIndex ?>_Pic2" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($lab_test_result_list->Pic2->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->Pic2->EditValue ?>"<?php echo $lab_test_result_list->Pic2->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Pic2" name="o<?php echo $lab_test_result_list->RowIndex ?>_Pic2" id="o<?php echo $lab_test_result_list->RowIndex ?>_Pic2" value="<?php echo HtmlEncode($lab_test_result_list->Pic2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->GraphPath->Visible) { // GraphPath ?>
		<td data-name="GraphPath">
<span id="el$rowindex$_lab_test_result_GraphPath" class="form-group lab_test_result_GraphPath">
<input type="text" data-table="lab_test_result" data-field="x_GraphPath" name="x<?php echo $lab_test_result_list->RowIndex ?>_GraphPath" id="x<?php echo $lab_test_result_list->RowIndex ?>_GraphPath" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($lab_test_result_list->GraphPath->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->GraphPath->EditValue ?>"<?php echo $lab_test_result_list->GraphPath->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_GraphPath" name="o<?php echo $lab_test_result_list->RowIndex ?>_GraphPath" id="o<?php echo $lab_test_result_list->RowIndex ?>_GraphPath" value="<?php echo HtmlEncode($lab_test_result_list->GraphPath->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->SampleDate->Visible) { // SampleDate ?>
		<td data-name="SampleDate">
<span id="el$rowindex$_lab_test_result_SampleDate" class="form-group lab_test_result_SampleDate">
<input type="text" data-table="lab_test_result" data-field="x_SampleDate" name="x<?php echo $lab_test_result_list->RowIndex ?>_SampleDate" id="x<?php echo $lab_test_result_list->RowIndex ?>_SampleDate" placeholder="<?php echo HtmlEncode($lab_test_result_list->SampleDate->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->SampleDate->EditValue ?>"<?php echo $lab_test_result_list->SampleDate->editAttributes() ?>>
<?php if (!$lab_test_result_list->SampleDate->ReadOnly && !$lab_test_result_list->SampleDate->Disabled && !isset($lab_test_result_list->SampleDate->EditAttrs["readonly"]) && !isset($lab_test_result_list->SampleDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultlist", "datetimepicker"], function() {
	ew.createDateTimePicker("flab_test_resultlist", "x<?php echo $lab_test_result_list->RowIndex ?>_SampleDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_SampleDate" name="o<?php echo $lab_test_result_list->RowIndex ?>_SampleDate" id="o<?php echo $lab_test_result_list->RowIndex ?>_SampleDate" value="<?php echo HtmlEncode($lab_test_result_list->SampleDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->SampleUser->Visible) { // SampleUser ?>
		<td data-name="SampleUser">
<span id="el$rowindex$_lab_test_result_SampleUser" class="form-group lab_test_result_SampleUser">
<input type="text" data-table="lab_test_result" data-field="x_SampleUser" name="x<?php echo $lab_test_result_list->RowIndex ?>_SampleUser" id="x<?php echo $lab_test_result_list->RowIndex ?>_SampleUser" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($lab_test_result_list->SampleUser->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->SampleUser->EditValue ?>"<?php echo $lab_test_result_list->SampleUser->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_SampleUser" name="o<?php echo $lab_test_result_list->RowIndex ?>_SampleUser" id="o<?php echo $lab_test_result_list->RowIndex ?>_SampleUser" value="<?php echo HtmlEncode($lab_test_result_list->SampleUser->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->ReceivedDate->Visible) { // ReceivedDate ?>
		<td data-name="ReceivedDate">
<span id="el$rowindex$_lab_test_result_ReceivedDate" class="form-group lab_test_result_ReceivedDate">
<input type="text" data-table="lab_test_result" data-field="x_ReceivedDate" name="x<?php echo $lab_test_result_list->RowIndex ?>_ReceivedDate" id="x<?php echo $lab_test_result_list->RowIndex ?>_ReceivedDate" placeholder="<?php echo HtmlEncode($lab_test_result_list->ReceivedDate->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->ReceivedDate->EditValue ?>"<?php echo $lab_test_result_list->ReceivedDate->editAttributes() ?>>
<?php if (!$lab_test_result_list->ReceivedDate->ReadOnly && !$lab_test_result_list->ReceivedDate->Disabled && !isset($lab_test_result_list->ReceivedDate->EditAttrs["readonly"]) && !isset($lab_test_result_list->ReceivedDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultlist", "datetimepicker"], function() {
	ew.createDateTimePicker("flab_test_resultlist", "x<?php echo $lab_test_result_list->RowIndex ?>_ReceivedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_ReceivedDate" name="o<?php echo $lab_test_result_list->RowIndex ?>_ReceivedDate" id="o<?php echo $lab_test_result_list->RowIndex ?>_ReceivedDate" value="<?php echo HtmlEncode($lab_test_result_list->ReceivedDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->ReceivedUser->Visible) { // ReceivedUser ?>
		<td data-name="ReceivedUser">
<span id="el$rowindex$_lab_test_result_ReceivedUser" class="form-group lab_test_result_ReceivedUser">
<input type="text" data-table="lab_test_result" data-field="x_ReceivedUser" name="x<?php echo $lab_test_result_list->RowIndex ?>_ReceivedUser" id="x<?php echo $lab_test_result_list->RowIndex ?>_ReceivedUser" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($lab_test_result_list->ReceivedUser->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->ReceivedUser->EditValue ?>"<?php echo $lab_test_result_list->ReceivedUser->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_ReceivedUser" name="o<?php echo $lab_test_result_list->RowIndex ?>_ReceivedUser" id="o<?php echo $lab_test_result_list->RowIndex ?>_ReceivedUser" value="<?php echo HtmlEncode($lab_test_result_list->ReceivedUser->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->DeptRecvDate->Visible) { // DeptRecvDate ?>
		<td data-name="DeptRecvDate">
<span id="el$rowindex$_lab_test_result_DeptRecvDate" class="form-group lab_test_result_DeptRecvDate">
<input type="text" data-table="lab_test_result" data-field="x_DeptRecvDate" name="x<?php echo $lab_test_result_list->RowIndex ?>_DeptRecvDate" id="x<?php echo $lab_test_result_list->RowIndex ?>_DeptRecvDate" placeholder="<?php echo HtmlEncode($lab_test_result_list->DeptRecvDate->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->DeptRecvDate->EditValue ?>"<?php echo $lab_test_result_list->DeptRecvDate->editAttributes() ?>>
<?php if (!$lab_test_result_list->DeptRecvDate->ReadOnly && !$lab_test_result_list->DeptRecvDate->Disabled && !isset($lab_test_result_list->DeptRecvDate->EditAttrs["readonly"]) && !isset($lab_test_result_list->DeptRecvDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultlist", "datetimepicker"], function() {
	ew.createDateTimePicker("flab_test_resultlist", "x<?php echo $lab_test_result_list->RowIndex ?>_DeptRecvDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_DeptRecvDate" name="o<?php echo $lab_test_result_list->RowIndex ?>_DeptRecvDate" id="o<?php echo $lab_test_result_list->RowIndex ?>_DeptRecvDate" value="<?php echo HtmlEncode($lab_test_result_list->DeptRecvDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->DeptRecvUser->Visible) { // DeptRecvUser ?>
		<td data-name="DeptRecvUser">
<span id="el$rowindex$_lab_test_result_DeptRecvUser" class="form-group lab_test_result_DeptRecvUser">
<input type="text" data-table="lab_test_result" data-field="x_DeptRecvUser" name="x<?php echo $lab_test_result_list->RowIndex ?>_DeptRecvUser" id="x<?php echo $lab_test_result_list->RowIndex ?>_DeptRecvUser" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($lab_test_result_list->DeptRecvUser->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->DeptRecvUser->EditValue ?>"<?php echo $lab_test_result_list->DeptRecvUser->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_DeptRecvUser" name="o<?php echo $lab_test_result_list->RowIndex ?>_DeptRecvUser" id="o<?php echo $lab_test_result_list->RowIndex ?>_DeptRecvUser" value="<?php echo HtmlEncode($lab_test_result_list->DeptRecvUser->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->PrintBy->Visible) { // PrintBy ?>
		<td data-name="PrintBy">
<span id="el$rowindex$_lab_test_result_PrintBy" class="form-group lab_test_result_PrintBy">
<input type="text" data-table="lab_test_result" data-field="x_PrintBy" name="x<?php echo $lab_test_result_list->RowIndex ?>_PrintBy" id="x<?php echo $lab_test_result_list->RowIndex ?>_PrintBy" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($lab_test_result_list->PrintBy->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->PrintBy->EditValue ?>"<?php echo $lab_test_result_list->PrintBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_PrintBy" name="o<?php echo $lab_test_result_list->RowIndex ?>_PrintBy" id="o<?php echo $lab_test_result_list->RowIndex ?>_PrintBy" value="<?php echo HtmlEncode($lab_test_result_list->PrintBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->PrintDate->Visible) { // PrintDate ?>
		<td data-name="PrintDate">
<span id="el$rowindex$_lab_test_result_PrintDate" class="form-group lab_test_result_PrintDate">
<input type="text" data-table="lab_test_result" data-field="x_PrintDate" name="x<?php echo $lab_test_result_list->RowIndex ?>_PrintDate" id="x<?php echo $lab_test_result_list->RowIndex ?>_PrintDate" placeholder="<?php echo HtmlEncode($lab_test_result_list->PrintDate->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->PrintDate->EditValue ?>"<?php echo $lab_test_result_list->PrintDate->editAttributes() ?>>
<?php if (!$lab_test_result_list->PrintDate->ReadOnly && !$lab_test_result_list->PrintDate->Disabled && !isset($lab_test_result_list->PrintDate->EditAttrs["readonly"]) && !isset($lab_test_result_list->PrintDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultlist", "datetimepicker"], function() {
	ew.createDateTimePicker("flab_test_resultlist", "x<?php echo $lab_test_result_list->RowIndex ?>_PrintDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_PrintDate" name="o<?php echo $lab_test_result_list->RowIndex ?>_PrintDate" id="o<?php echo $lab_test_result_list->RowIndex ?>_PrintDate" value="<?php echo HtmlEncode($lab_test_result_list->PrintDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->MachineCD->Visible) { // MachineCD ?>
		<td data-name="MachineCD">
<span id="el$rowindex$_lab_test_result_MachineCD" class="form-group lab_test_result_MachineCD">
<input type="text" data-table="lab_test_result" data-field="x_MachineCD" name="x<?php echo $lab_test_result_list->RowIndex ?>_MachineCD" id="x<?php echo $lab_test_result_list->RowIndex ?>_MachineCD" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($lab_test_result_list->MachineCD->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->MachineCD->EditValue ?>"<?php echo $lab_test_result_list->MachineCD->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_MachineCD" name="o<?php echo $lab_test_result_list->RowIndex ?>_MachineCD" id="o<?php echo $lab_test_result_list->RowIndex ?>_MachineCD" value="<?php echo HtmlEncode($lab_test_result_list->MachineCD->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->TestCancel->Visible) { // TestCancel ?>
		<td data-name="TestCancel">
<span id="el$rowindex$_lab_test_result_TestCancel" class="form-group lab_test_result_TestCancel">
<input type="text" data-table="lab_test_result" data-field="x_TestCancel" name="x<?php echo $lab_test_result_list->RowIndex ?>_TestCancel" id="x<?php echo $lab_test_result_list->RowIndex ?>_TestCancel" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result_list->TestCancel->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->TestCancel->EditValue ?>"<?php echo $lab_test_result_list->TestCancel->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_TestCancel" name="o<?php echo $lab_test_result_list->RowIndex ?>_TestCancel" id="o<?php echo $lab_test_result_list->RowIndex ?>_TestCancel" value="<?php echo HtmlEncode($lab_test_result_list->TestCancel->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->OutSource->Visible) { // OutSource ?>
		<td data-name="OutSource">
<span id="el$rowindex$_lab_test_result_OutSource" class="form-group lab_test_result_OutSource">
<input type="text" data-table="lab_test_result" data-field="x_OutSource" name="x<?php echo $lab_test_result_list->RowIndex ?>_OutSource" id="x<?php echo $lab_test_result_list->RowIndex ?>_OutSource" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result_list->OutSource->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->OutSource->EditValue ?>"<?php echo $lab_test_result_list->OutSource->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_OutSource" name="o<?php echo $lab_test_result_list->RowIndex ?>_OutSource" id="o<?php echo $lab_test_result_list->RowIndex ?>_OutSource" value="<?php echo HtmlEncode($lab_test_result_list->OutSource->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->Tariff->Visible) { // Tariff ?>
		<td data-name="Tariff">
<span id="el$rowindex$_lab_test_result_Tariff" class="form-group lab_test_result_Tariff">
<input type="text" data-table="lab_test_result" data-field="x_Tariff" name="x<?php echo $lab_test_result_list->RowIndex ?>_Tariff" id="x<?php echo $lab_test_result_list->RowIndex ?>_Tariff" size="30" placeholder="<?php echo HtmlEncode($lab_test_result_list->Tariff->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->Tariff->EditValue ?>"<?php echo $lab_test_result_list->Tariff->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Tariff" name="o<?php echo $lab_test_result_list->RowIndex ?>_Tariff" id="o<?php echo $lab_test_result_list->RowIndex ?>_Tariff" value="<?php echo HtmlEncode($lab_test_result_list->Tariff->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->EDITDATE->Visible) { // EDITDATE ?>
		<td data-name="EDITDATE">
<span id="el$rowindex$_lab_test_result_EDITDATE" class="form-group lab_test_result_EDITDATE">
<input type="text" data-table="lab_test_result" data-field="x_EDITDATE" name="x<?php echo $lab_test_result_list->RowIndex ?>_EDITDATE" id="x<?php echo $lab_test_result_list->RowIndex ?>_EDITDATE" placeholder="<?php echo HtmlEncode($lab_test_result_list->EDITDATE->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->EDITDATE->EditValue ?>"<?php echo $lab_test_result_list->EDITDATE->editAttributes() ?>>
<?php if (!$lab_test_result_list->EDITDATE->ReadOnly && !$lab_test_result_list->EDITDATE->Disabled && !isset($lab_test_result_list->EDITDATE->EditAttrs["readonly"]) && !isset($lab_test_result_list->EDITDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultlist", "datetimepicker"], function() {
	ew.createDateTimePicker("flab_test_resultlist", "x<?php echo $lab_test_result_list->RowIndex ?>_EDITDATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_EDITDATE" name="o<?php echo $lab_test_result_list->RowIndex ?>_EDITDATE" id="o<?php echo $lab_test_result_list->RowIndex ?>_EDITDATE" value="<?php echo HtmlEncode($lab_test_result_list->EDITDATE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->UPLOAD->Visible) { // UPLOAD ?>
		<td data-name="UPLOAD">
<span id="el$rowindex$_lab_test_result_UPLOAD" class="form-group lab_test_result_UPLOAD">
<input type="text" data-table="lab_test_result" data-field="x_UPLOAD" name="x<?php echo $lab_test_result_list->RowIndex ?>_UPLOAD" id="x<?php echo $lab_test_result_list->RowIndex ?>_UPLOAD" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result_list->UPLOAD->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->UPLOAD->EditValue ?>"<?php echo $lab_test_result_list->UPLOAD->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_UPLOAD" name="o<?php echo $lab_test_result_list->RowIndex ?>_UPLOAD" id="o<?php echo $lab_test_result_list->RowIndex ?>_UPLOAD" value="<?php echo HtmlEncode($lab_test_result_list->UPLOAD->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->SAuthDate->Visible) { // SAuthDate ?>
		<td data-name="SAuthDate">
<span id="el$rowindex$_lab_test_result_SAuthDate" class="form-group lab_test_result_SAuthDate">
<input type="text" data-table="lab_test_result" data-field="x_SAuthDate" name="x<?php echo $lab_test_result_list->RowIndex ?>_SAuthDate" id="x<?php echo $lab_test_result_list->RowIndex ?>_SAuthDate" placeholder="<?php echo HtmlEncode($lab_test_result_list->SAuthDate->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->SAuthDate->EditValue ?>"<?php echo $lab_test_result_list->SAuthDate->editAttributes() ?>>
<?php if (!$lab_test_result_list->SAuthDate->ReadOnly && !$lab_test_result_list->SAuthDate->Disabled && !isset($lab_test_result_list->SAuthDate->EditAttrs["readonly"]) && !isset($lab_test_result_list->SAuthDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultlist", "datetimepicker"], function() {
	ew.createDateTimePicker("flab_test_resultlist", "x<?php echo $lab_test_result_list->RowIndex ?>_SAuthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_SAuthDate" name="o<?php echo $lab_test_result_list->RowIndex ?>_SAuthDate" id="o<?php echo $lab_test_result_list->RowIndex ?>_SAuthDate" value="<?php echo HtmlEncode($lab_test_result_list->SAuthDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->SAuthBy->Visible) { // SAuthBy ?>
		<td data-name="SAuthBy">
<span id="el$rowindex$_lab_test_result_SAuthBy" class="form-group lab_test_result_SAuthBy">
<input type="text" data-table="lab_test_result" data-field="x_SAuthBy" name="x<?php echo $lab_test_result_list->RowIndex ?>_SAuthBy" id="x<?php echo $lab_test_result_list->RowIndex ?>_SAuthBy" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($lab_test_result_list->SAuthBy->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->SAuthBy->EditValue ?>"<?php echo $lab_test_result_list->SAuthBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_SAuthBy" name="o<?php echo $lab_test_result_list->RowIndex ?>_SAuthBy" id="o<?php echo $lab_test_result_list->RowIndex ?>_SAuthBy" value="<?php echo HtmlEncode($lab_test_result_list->SAuthBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->NoRC->Visible) { // NoRC ?>
		<td data-name="NoRC">
<span id="el$rowindex$_lab_test_result_NoRC" class="form-group lab_test_result_NoRC">
<input type="text" data-table="lab_test_result" data-field="x_NoRC" name="x<?php echo $lab_test_result_list->RowIndex ?>_NoRC" id="x<?php echo $lab_test_result_list->RowIndex ?>_NoRC" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result_list->NoRC->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->NoRC->EditValue ?>"<?php echo $lab_test_result_list->NoRC->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_NoRC" name="o<?php echo $lab_test_result_list->RowIndex ?>_NoRC" id="o<?php echo $lab_test_result_list->RowIndex ?>_NoRC" value="<?php echo HtmlEncode($lab_test_result_list->NoRC->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->DispDt->Visible) { // DispDt ?>
		<td data-name="DispDt">
<span id="el$rowindex$_lab_test_result_DispDt" class="form-group lab_test_result_DispDt">
<input type="text" data-table="lab_test_result" data-field="x_DispDt" name="x<?php echo $lab_test_result_list->RowIndex ?>_DispDt" id="x<?php echo $lab_test_result_list->RowIndex ?>_DispDt" placeholder="<?php echo HtmlEncode($lab_test_result_list->DispDt->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->DispDt->EditValue ?>"<?php echo $lab_test_result_list->DispDt->editAttributes() ?>>
<?php if (!$lab_test_result_list->DispDt->ReadOnly && !$lab_test_result_list->DispDt->Disabled && !isset($lab_test_result_list->DispDt->EditAttrs["readonly"]) && !isset($lab_test_result_list->DispDt->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultlist", "datetimepicker"], function() {
	ew.createDateTimePicker("flab_test_resultlist", "x<?php echo $lab_test_result_list->RowIndex ?>_DispDt", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_DispDt" name="o<?php echo $lab_test_result_list->RowIndex ?>_DispDt" id="o<?php echo $lab_test_result_list->RowIndex ?>_DispDt" value="<?php echo HtmlEncode($lab_test_result_list->DispDt->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->DispUser->Visible) { // DispUser ?>
		<td data-name="DispUser">
<span id="el$rowindex$_lab_test_result_DispUser" class="form-group lab_test_result_DispUser">
<input type="text" data-table="lab_test_result" data-field="x_DispUser" name="x<?php echo $lab_test_result_list->RowIndex ?>_DispUser" id="x<?php echo $lab_test_result_list->RowIndex ?>_DispUser" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($lab_test_result_list->DispUser->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->DispUser->EditValue ?>"<?php echo $lab_test_result_list->DispUser->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_DispUser" name="o<?php echo $lab_test_result_list->RowIndex ?>_DispUser" id="o<?php echo $lab_test_result_list->RowIndex ?>_DispUser" value="<?php echo HtmlEncode($lab_test_result_list->DispUser->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->DispRemarks->Visible) { // DispRemarks ?>
		<td data-name="DispRemarks">
<span id="el$rowindex$_lab_test_result_DispRemarks" class="form-group lab_test_result_DispRemarks">
<input type="text" data-table="lab_test_result" data-field="x_DispRemarks" name="x<?php echo $lab_test_result_list->RowIndex ?>_DispRemarks" id="x<?php echo $lab_test_result_list->RowIndex ?>_DispRemarks" size="30" maxlength="250" placeholder="<?php echo HtmlEncode($lab_test_result_list->DispRemarks->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->DispRemarks->EditValue ?>"<?php echo $lab_test_result_list->DispRemarks->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_DispRemarks" name="o<?php echo $lab_test_result_list->RowIndex ?>_DispRemarks" id="o<?php echo $lab_test_result_list->RowIndex ?>_DispRemarks" value="<?php echo HtmlEncode($lab_test_result_list->DispRemarks->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->DispMode->Visible) { // DispMode ?>
		<td data-name="DispMode">
<span id="el$rowindex$_lab_test_result_DispMode" class="form-group lab_test_result_DispMode">
<input type="text" data-table="lab_test_result" data-field="x_DispMode" name="x<?php echo $lab_test_result_list->RowIndex ?>_DispMode" id="x<?php echo $lab_test_result_list->RowIndex ?>_DispMode" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($lab_test_result_list->DispMode->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->DispMode->EditValue ?>"<?php echo $lab_test_result_list->DispMode->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_DispMode" name="o<?php echo $lab_test_result_list->RowIndex ?>_DispMode" id="o<?php echo $lab_test_result_list->RowIndex ?>_DispMode" value="<?php echo HtmlEncode($lab_test_result_list->DispMode->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->ProductCD->Visible) { // ProductCD ?>
		<td data-name="ProductCD">
<span id="el$rowindex$_lab_test_result_ProductCD" class="form-group lab_test_result_ProductCD">
<input type="text" data-table="lab_test_result" data-field="x_ProductCD" name="x<?php echo $lab_test_result_list->RowIndex ?>_ProductCD" id="x<?php echo $lab_test_result_list->RowIndex ?>_ProductCD" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($lab_test_result_list->ProductCD->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->ProductCD->EditValue ?>"<?php echo $lab_test_result_list->ProductCD->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_ProductCD" name="o<?php echo $lab_test_result_list->RowIndex ?>_ProductCD" id="o<?php echo $lab_test_result_list->RowIndex ?>_ProductCD" value="<?php echo HtmlEncode($lab_test_result_list->ProductCD->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->Nos->Visible) { // Nos ?>
		<td data-name="Nos">
<span id="el$rowindex$_lab_test_result_Nos" class="form-group lab_test_result_Nos">
<input type="text" data-table="lab_test_result" data-field="x_Nos" name="x<?php echo $lab_test_result_list->RowIndex ?>_Nos" id="x<?php echo $lab_test_result_list->RowIndex ?>_Nos" size="30" placeholder="<?php echo HtmlEncode($lab_test_result_list->Nos->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->Nos->EditValue ?>"<?php echo $lab_test_result_list->Nos->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Nos" name="o<?php echo $lab_test_result_list->RowIndex ?>_Nos" id="o<?php echo $lab_test_result_list->RowIndex ?>_Nos" value="<?php echo HtmlEncode($lab_test_result_list->Nos->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->WBCPath->Visible) { // WBCPath ?>
		<td data-name="WBCPath">
<span id="el$rowindex$_lab_test_result_WBCPath" class="form-group lab_test_result_WBCPath">
<input type="text" data-table="lab_test_result" data-field="x_WBCPath" name="x<?php echo $lab_test_result_list->RowIndex ?>_WBCPath" id="x<?php echo $lab_test_result_list->RowIndex ?>_WBCPath" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($lab_test_result_list->WBCPath->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->WBCPath->EditValue ?>"<?php echo $lab_test_result_list->WBCPath->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_WBCPath" name="o<?php echo $lab_test_result_list->RowIndex ?>_WBCPath" id="o<?php echo $lab_test_result_list->RowIndex ?>_WBCPath" value="<?php echo HtmlEncode($lab_test_result_list->WBCPath->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->RBCPath->Visible) { // RBCPath ?>
		<td data-name="RBCPath">
<span id="el$rowindex$_lab_test_result_RBCPath" class="form-group lab_test_result_RBCPath">
<input type="text" data-table="lab_test_result" data-field="x_RBCPath" name="x<?php echo $lab_test_result_list->RowIndex ?>_RBCPath" id="x<?php echo $lab_test_result_list->RowIndex ?>_RBCPath" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($lab_test_result_list->RBCPath->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->RBCPath->EditValue ?>"<?php echo $lab_test_result_list->RBCPath->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_RBCPath" name="o<?php echo $lab_test_result_list->RowIndex ?>_RBCPath" id="o<?php echo $lab_test_result_list->RowIndex ?>_RBCPath" value="<?php echo HtmlEncode($lab_test_result_list->RBCPath->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->PTPath->Visible) { // PTPath ?>
		<td data-name="PTPath">
<span id="el$rowindex$_lab_test_result_PTPath" class="form-group lab_test_result_PTPath">
<input type="text" data-table="lab_test_result" data-field="x_PTPath" name="x<?php echo $lab_test_result_list->RowIndex ?>_PTPath" id="x<?php echo $lab_test_result_list->RowIndex ?>_PTPath" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($lab_test_result_list->PTPath->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->PTPath->EditValue ?>"<?php echo $lab_test_result_list->PTPath->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_PTPath" name="o<?php echo $lab_test_result_list->RowIndex ?>_PTPath" id="o<?php echo $lab_test_result_list->RowIndex ?>_PTPath" value="<?php echo HtmlEncode($lab_test_result_list->PTPath->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->ActualAmt->Visible) { // ActualAmt ?>
		<td data-name="ActualAmt">
<span id="el$rowindex$_lab_test_result_ActualAmt" class="form-group lab_test_result_ActualAmt">
<input type="text" data-table="lab_test_result" data-field="x_ActualAmt" name="x<?php echo $lab_test_result_list->RowIndex ?>_ActualAmt" id="x<?php echo $lab_test_result_list->RowIndex ?>_ActualAmt" size="30" placeholder="<?php echo HtmlEncode($lab_test_result_list->ActualAmt->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->ActualAmt->EditValue ?>"<?php echo $lab_test_result_list->ActualAmt->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_ActualAmt" name="o<?php echo $lab_test_result_list->RowIndex ?>_ActualAmt" id="o<?php echo $lab_test_result_list->RowIndex ?>_ActualAmt" value="<?php echo HtmlEncode($lab_test_result_list->ActualAmt->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->NoSign->Visible) { // NoSign ?>
		<td data-name="NoSign">
<span id="el$rowindex$_lab_test_result_NoSign" class="form-group lab_test_result_NoSign">
<input type="text" data-table="lab_test_result" data-field="x_NoSign" name="x<?php echo $lab_test_result_list->RowIndex ?>_NoSign" id="x<?php echo $lab_test_result_list->RowIndex ?>_NoSign" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result_list->NoSign->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->NoSign->EditValue ?>"<?php echo $lab_test_result_list->NoSign->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_NoSign" name="o<?php echo $lab_test_result_list->RowIndex ?>_NoSign" id="o<?php echo $lab_test_result_list->RowIndex ?>_NoSign" value="<?php echo HtmlEncode($lab_test_result_list->NoSign->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->_Barcode->Visible) { // Barcode ?>
		<td data-name="_Barcode">
<span id="el$rowindex$_lab_test_result__Barcode" class="form-group lab_test_result__Barcode">
<input type="text" data-table="lab_test_result" data-field="x__Barcode" name="x<?php echo $lab_test_result_list->RowIndex ?>__Barcode" id="x<?php echo $lab_test_result_list->RowIndex ?>__Barcode" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result_list->_Barcode->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->_Barcode->EditValue ?>"<?php echo $lab_test_result_list->_Barcode->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x__Barcode" name="o<?php echo $lab_test_result_list->RowIndex ?>__Barcode" id="o<?php echo $lab_test_result_list->RowIndex ?>__Barcode" value="<?php echo HtmlEncode($lab_test_result_list->_Barcode->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->ReadTime->Visible) { // ReadTime ?>
		<td data-name="ReadTime">
<span id="el$rowindex$_lab_test_result_ReadTime" class="form-group lab_test_result_ReadTime">
<input type="text" data-table="lab_test_result" data-field="x_ReadTime" name="x<?php echo $lab_test_result_list->RowIndex ?>_ReadTime" id="x<?php echo $lab_test_result_list->RowIndex ?>_ReadTime" placeholder="<?php echo HtmlEncode($lab_test_result_list->ReadTime->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->ReadTime->EditValue ?>"<?php echo $lab_test_result_list->ReadTime->editAttributes() ?>>
<?php if (!$lab_test_result_list->ReadTime->ReadOnly && !$lab_test_result_list->ReadTime->Disabled && !isset($lab_test_result_list->ReadTime->EditAttrs["readonly"]) && !isset($lab_test_result_list->ReadTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["flab_test_resultlist", "datetimepicker"], function() {
	ew.createDateTimePicker("flab_test_resultlist", "x<?php echo $lab_test_result_list->RowIndex ?>_ReadTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_ReadTime" name="o<?php echo $lab_test_result_list->RowIndex ?>_ReadTime" id="o<?php echo $lab_test_result_list->RowIndex ?>_ReadTime" value="<?php echo HtmlEncode($lab_test_result_list->ReadTime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->VailID->Visible) { // VailID ?>
		<td data-name="VailID">
<span id="el$rowindex$_lab_test_result_VailID" class="form-group lab_test_result_VailID">
<input type="text" data-table="lab_test_result" data-field="x_VailID" name="x<?php echo $lab_test_result_list->RowIndex ?>_VailID" id="x<?php echo $lab_test_result_list->RowIndex ?>_VailID" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($lab_test_result_list->VailID->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->VailID->EditValue ?>"<?php echo $lab_test_result_list->VailID->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_VailID" name="o<?php echo $lab_test_result_list->RowIndex ?>_VailID" id="o<?php echo $lab_test_result_list->RowIndex ?>_VailID" value="<?php echo HtmlEncode($lab_test_result_list->VailID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->ReadMachine->Visible) { // ReadMachine ?>
		<td data-name="ReadMachine">
<span id="el$rowindex$_lab_test_result_ReadMachine" class="form-group lab_test_result_ReadMachine">
<input type="text" data-table="lab_test_result" data-field="x_ReadMachine" name="x<?php echo $lab_test_result_list->RowIndex ?>_ReadMachine" id="x<?php echo $lab_test_result_list->RowIndex ?>_ReadMachine" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($lab_test_result_list->ReadMachine->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->ReadMachine->EditValue ?>"<?php echo $lab_test_result_list->ReadMachine->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_ReadMachine" name="o<?php echo $lab_test_result_list->RowIndex ?>_ReadMachine" id="o<?php echo $lab_test_result_list->RowIndex ?>_ReadMachine" value="<?php echo HtmlEncode($lab_test_result_list->ReadMachine->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->LabCD->Visible) { // LabCD ?>
		<td data-name="LabCD">
<span id="el$rowindex$_lab_test_result_LabCD" class="form-group lab_test_result_LabCD">
<input type="text" data-table="lab_test_result" data-field="x_LabCD" name="x<?php echo $lab_test_result_list->RowIndex ?>_LabCD" id="x<?php echo $lab_test_result_list->RowIndex ?>_LabCD" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($lab_test_result_list->LabCD->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->LabCD->EditValue ?>"<?php echo $lab_test_result_list->LabCD->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_LabCD" name="o<?php echo $lab_test_result_list->RowIndex ?>_LabCD" id="o<?php echo $lab_test_result_list->RowIndex ?>_LabCD" value="<?php echo HtmlEncode($lab_test_result_list->LabCD->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->OutLabAmt->Visible) { // OutLabAmt ?>
		<td data-name="OutLabAmt">
<span id="el$rowindex$_lab_test_result_OutLabAmt" class="form-group lab_test_result_OutLabAmt">
<input type="text" data-table="lab_test_result" data-field="x_OutLabAmt" name="x<?php echo $lab_test_result_list->RowIndex ?>_OutLabAmt" id="x<?php echo $lab_test_result_list->RowIndex ?>_OutLabAmt" size="30" placeholder="<?php echo HtmlEncode($lab_test_result_list->OutLabAmt->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->OutLabAmt->EditValue ?>"<?php echo $lab_test_result_list->OutLabAmt->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_OutLabAmt" name="o<?php echo $lab_test_result_list->RowIndex ?>_OutLabAmt" id="o<?php echo $lab_test_result_list->RowIndex ?>_OutLabAmt" value="<?php echo HtmlEncode($lab_test_result_list->OutLabAmt->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->ProductQty->Visible) { // ProductQty ?>
		<td data-name="ProductQty">
<span id="el$rowindex$_lab_test_result_ProductQty" class="form-group lab_test_result_ProductQty">
<input type="text" data-table="lab_test_result" data-field="x_ProductQty" name="x<?php echo $lab_test_result_list->RowIndex ?>_ProductQty" id="x<?php echo $lab_test_result_list->RowIndex ?>_ProductQty" size="30" placeholder="<?php echo HtmlEncode($lab_test_result_list->ProductQty->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->ProductQty->EditValue ?>"<?php echo $lab_test_result_list->ProductQty->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_ProductQty" name="o<?php echo $lab_test_result_list->RowIndex ?>_ProductQty" id="o<?php echo $lab_test_result_list->RowIndex ?>_ProductQty" value="<?php echo HtmlEncode($lab_test_result_list->ProductQty->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->Repeat->Visible) { // Repeat ?>
		<td data-name="Repeat">
<span id="el$rowindex$_lab_test_result_Repeat" class="form-group lab_test_result_Repeat">
<input type="text" data-table="lab_test_result" data-field="x_Repeat" name="x<?php echo $lab_test_result_list->RowIndex ?>_Repeat" id="x<?php echo $lab_test_result_list->RowIndex ?>_Repeat" size="30" maxlength="1" placeholder="<?php echo HtmlEncode($lab_test_result_list->Repeat->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->Repeat->EditValue ?>"<?php echo $lab_test_result_list->Repeat->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Repeat" name="o<?php echo $lab_test_result_list->RowIndex ?>_Repeat" id="o<?php echo $lab_test_result_list->RowIndex ?>_Repeat" value="<?php echo HtmlEncode($lab_test_result_list->Repeat->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->DeptNo->Visible) { // DeptNo ?>
		<td data-name="DeptNo">
<span id="el$rowindex$_lab_test_result_DeptNo" class="form-group lab_test_result_DeptNo">
<input type="text" data-table="lab_test_result" data-field="x_DeptNo" name="x<?php echo $lab_test_result_list->RowIndex ?>_DeptNo" id="x<?php echo $lab_test_result_list->RowIndex ?>_DeptNo" size="30" maxlength="5" placeholder="<?php echo HtmlEncode($lab_test_result_list->DeptNo->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->DeptNo->EditValue ?>"<?php echo $lab_test_result_list->DeptNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_DeptNo" name="o<?php echo $lab_test_result_list->RowIndex ?>_DeptNo" id="o<?php echo $lab_test_result_list->RowIndex ?>_DeptNo" value="<?php echo HtmlEncode($lab_test_result_list->DeptNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->Desc1->Visible) { // Desc1 ?>
		<td data-name="Desc1">
<span id="el$rowindex$_lab_test_result_Desc1" class="form-group lab_test_result_Desc1">
<input type="text" data-table="lab_test_result" data-field="x_Desc1" name="x<?php echo $lab_test_result_list->RowIndex ?>_Desc1" id="x<?php echo $lab_test_result_list->RowIndex ?>_Desc1" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($lab_test_result_list->Desc1->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->Desc1->EditValue ?>"<?php echo $lab_test_result_list->Desc1->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Desc1" name="o<?php echo $lab_test_result_list->RowIndex ?>_Desc1" id="o<?php echo $lab_test_result_list->RowIndex ?>_Desc1" value="<?php echo HtmlEncode($lab_test_result_list->Desc1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->Desc2->Visible) { // Desc2 ?>
		<td data-name="Desc2">
<span id="el$rowindex$_lab_test_result_Desc2" class="form-group lab_test_result_Desc2">
<input type="text" data-table="lab_test_result" data-field="x_Desc2" name="x<?php echo $lab_test_result_list->RowIndex ?>_Desc2" id="x<?php echo $lab_test_result_list->RowIndex ?>_Desc2" size="30" maxlength="200" placeholder="<?php echo HtmlEncode($lab_test_result_list->Desc2->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->Desc2->EditValue ?>"<?php echo $lab_test_result_list->Desc2->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_Desc2" name="o<?php echo $lab_test_result_list->RowIndex ?>_Desc2" id="o<?php echo $lab_test_result_list->RowIndex ?>_Desc2" value="<?php echo HtmlEncode($lab_test_result_list->Desc2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($lab_test_result_list->RptResult->Visible) { // RptResult ?>
		<td data-name="RptResult">
<span id="el$rowindex$_lab_test_result_RptResult" class="form-group lab_test_result_RptResult">
<input type="text" data-table="lab_test_result" data-field="x_RptResult" name="x<?php echo $lab_test_result_list->RowIndex ?>_RptResult" id="x<?php echo $lab_test_result_list->RowIndex ?>_RptResult" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($lab_test_result_list->RptResult->getPlaceHolder()) ?>" value="<?php echo $lab_test_result_list->RptResult->EditValue ?>"<?php echo $lab_test_result_list->RptResult->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_test_result" data-field="x_RptResult" name="o<?php echo $lab_test_result_list->RowIndex ?>_RptResult" id="o<?php echo $lab_test_result_list->RowIndex ?>_RptResult" value="<?php echo HtmlEncode($lab_test_result_list->RptResult->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$lab_test_result_list->ListOptions->render("body", "right", $lab_test_result_list->RowIndex);
?>
<script>
loadjs.ready(["flab_test_resultlist", "load"], function() {
	flab_test_resultlist.updateLists(<?php echo $lab_test_result_list->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if ($lab_test_result_list->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $lab_test_result_list->FormKeyCountName ?>" id="<?php echo $lab_test_result_list->FormKeyCountName ?>" value="<?php echo $lab_test_result_list->KeyCount ?>">
<?php echo $lab_test_result_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$lab_test_result->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($lab_test_result_list->Recordset)
	$lab_test_result_list->Recordset->Close();
?>
<?php if (!$lab_test_result_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$lab_test_result_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $lab_test_result_list->Pager->render() ?>
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
<?php if ($lab_test_result_list->TotalRecords == 0 && !$lab_test_result->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $lab_test_result_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$lab_test_result_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$lab_test_result_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$lab_test_result->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_lab_test_result",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$lab_test_result_list->terminate();
?>