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
$ivf_oocytedenudation_edit = new ivf_oocytedenudation_edit();

// Run the page
$ivf_oocytedenudation_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_oocytedenudation_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fivf_oocytedenudationedit = currentForm = new ew.Form("fivf_oocytedenudationedit", "edit");

// Validate form
fivf_oocytedenudationedit.validate = function() {
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
		<?php if ($ivf_oocytedenudation_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->id->caption(), $ivf_oocytedenudation->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_edit->RIDNo->Required) { ?>
			elm = this.getElements("x" + infix + "_RIDNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->RIDNo->caption(), $ivf_oocytedenudation->RIDNo->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RIDNo");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_oocytedenudation->RIDNo->errorMessage()) ?>");
		<?php if ($ivf_oocytedenudation_edit->Name->Required) { ?>
			elm = this.getElements("x" + infix + "_Name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->Name->caption(), $ivf_oocytedenudation->Name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_edit->ResultDate->Required) { ?>
			elm = this.getElements("x" + infix + "_ResultDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->ResultDate->caption(), $ivf_oocytedenudation->ResultDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ResultDate");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_oocytedenudation->ResultDate->errorMessage()) ?>");
		<?php if ($ivf_oocytedenudation_edit->Surgeon->Required) { ?>
			elm = this.getElements("x" + infix + "_Surgeon");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->Surgeon->caption(), $ivf_oocytedenudation->Surgeon->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_edit->AsstSurgeon->Required) { ?>
			elm = this.getElements("x" + infix + "_AsstSurgeon");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->AsstSurgeon->caption(), $ivf_oocytedenudation->AsstSurgeon->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_edit->Anaesthetist->Required) { ?>
			elm = this.getElements("x" + infix + "_Anaesthetist");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->Anaesthetist->caption(), $ivf_oocytedenudation->Anaesthetist->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_edit->AnaestheiaType->Required) { ?>
			elm = this.getElements("x" + infix + "_AnaestheiaType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->AnaestheiaType->caption(), $ivf_oocytedenudation->AnaestheiaType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_edit->PrimaryEmbryologist->Required) { ?>
			elm = this.getElements("x" + infix + "_PrimaryEmbryologist");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->PrimaryEmbryologist->caption(), $ivf_oocytedenudation->PrimaryEmbryologist->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_edit->SecondaryEmbryologist->Required) { ?>
			elm = this.getElements("x" + infix + "_SecondaryEmbryologist");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->SecondaryEmbryologist->caption(), $ivf_oocytedenudation->SecondaryEmbryologist->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_edit->OPUNotes->Required) { ?>
			elm = this.getElements("x" + infix + "_OPUNotes");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->OPUNotes->caption(), $ivf_oocytedenudation->OPUNotes->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_edit->NoOfFolliclesRight->Required) { ?>
			elm = this.getElements("x" + infix + "_NoOfFolliclesRight");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->NoOfFolliclesRight->caption(), $ivf_oocytedenudation->NoOfFolliclesRight->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_edit->NoOfFolliclesLeft->Required) { ?>
			elm = this.getElements("x" + infix + "_NoOfFolliclesLeft");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->NoOfFolliclesLeft->caption(), $ivf_oocytedenudation->NoOfFolliclesLeft->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_edit->NoOfOocytes->Required) { ?>
			elm = this.getElements("x" + infix + "_NoOfOocytes");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->NoOfOocytes->caption(), $ivf_oocytedenudation->NoOfOocytes->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_edit->RecordOocyteDenudation->Required) { ?>
			elm = this.getElements("x" + infix + "_RecordOocyteDenudation");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->RecordOocyteDenudation->caption(), $ivf_oocytedenudation->RecordOocyteDenudation->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_edit->DateOfDenudation->Required) { ?>
			elm = this.getElements("x" + infix + "_DateOfDenudation");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->DateOfDenudation->caption(), $ivf_oocytedenudation->DateOfDenudation->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DateOfDenudation");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_oocytedenudation->DateOfDenudation->errorMessage()) ?>");
		<?php if ($ivf_oocytedenudation_edit->DenudationDoneBy->Required) { ?>
			elm = this.getElements("x" + infix + "_DenudationDoneBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->DenudationDoneBy->caption(), $ivf_oocytedenudation->DenudationDoneBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_edit->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->status->caption(), $ivf_oocytedenudation->status->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_oocytedenudation->status->errorMessage()) ?>");
		<?php if ($ivf_oocytedenudation_edit->createdby->Required) { ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->createdby->caption(), $ivf_oocytedenudation->createdby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_edit->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->createddatetime->caption(), $ivf_oocytedenudation->createddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_edit->modifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->modifiedby->caption(), $ivf_oocytedenudation->modifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_edit->modifieddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->modifieddatetime->caption(), $ivf_oocytedenudation->modifieddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_edit->TidNo->Required) { ?>
			elm = this.getElements("x" + infix + "_TidNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->TidNo->caption(), $ivf_oocytedenudation->TidNo->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TidNo");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_oocytedenudation->TidNo->errorMessage()) ?>");
		<?php if ($ivf_oocytedenudation_edit->ExpFollicles->Required) { ?>
			elm = this.getElements("x" + infix + "_ExpFollicles");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->ExpFollicles->caption(), $ivf_oocytedenudation->ExpFollicles->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_edit->SecondaryDenudationDoneBy->Required) { ?>
			elm = this.getElements("x" + infix + "_SecondaryDenudationDoneBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->SecondaryDenudationDoneBy->caption(), $ivf_oocytedenudation->SecondaryDenudationDoneBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_edit->patient2->Required) { ?>
			elm = this.getElements("x" + infix + "_patient2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->patient2->caption(), $ivf_oocytedenudation->patient2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_edit->OocytesDonate1->Required) { ?>
			elm = this.getElements("x" + infix + "_OocytesDonate1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->OocytesDonate1->caption(), $ivf_oocytedenudation->OocytesDonate1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_edit->OocytesDonate2->Required) { ?>
			elm = this.getElements("x" + infix + "_OocytesDonate2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->OocytesDonate2->caption(), $ivf_oocytedenudation->OocytesDonate2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_edit->ETDonate->Required) { ?>
			elm = this.getElements("x" + infix + "_ETDonate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->ETDonate->caption(), $ivf_oocytedenudation->ETDonate->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_edit->OocyteOrgin->Required) { ?>
			elm = this.getElements("x" + infix + "_OocyteOrgin");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->OocyteOrgin->caption(), $ivf_oocytedenudation->OocyteOrgin->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_edit->patient1->Required) { ?>
			elm = this.getElements("x" + infix + "_patient1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->patient1->caption(), $ivf_oocytedenudation->patient1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_edit->OocyteType->Required) { ?>
			elm = this.getElements("x" + infix + "_OocyteType[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->OocyteType->caption(), $ivf_oocytedenudation->OocyteType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_edit->MIOocytesDonate1->Required) { ?>
			elm = this.getElements("x" + infix + "_MIOocytesDonate1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->MIOocytesDonate1->caption(), $ivf_oocytedenudation->MIOocytesDonate1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_edit->MIOocytesDonate2->Required) { ?>
			elm = this.getElements("x" + infix + "_MIOocytesDonate2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->MIOocytesDonate2->caption(), $ivf_oocytedenudation->MIOocytesDonate2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_edit->SelfMI->Required) { ?>
			elm = this.getElements("x" + infix + "_SelfMI");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->SelfMI->caption(), $ivf_oocytedenudation->SelfMI->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_edit->SelfMII->Required) { ?>
			elm = this.getElements("x" + infix + "_SelfMII");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->SelfMII->caption(), $ivf_oocytedenudation->SelfMII->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_edit->patient3->Required) { ?>
			elm = this.getElements("x" + infix + "_patient3");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->patient3->caption(), $ivf_oocytedenudation->patient3->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_edit->patient4->Required) { ?>
			elm = this.getElements("x" + infix + "_patient4");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->patient4->caption(), $ivf_oocytedenudation->patient4->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_edit->OocytesDonate3->Required) { ?>
			elm = this.getElements("x" + infix + "_OocytesDonate3");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->OocytesDonate3->caption(), $ivf_oocytedenudation->OocytesDonate3->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_edit->OocytesDonate4->Required) { ?>
			elm = this.getElements("x" + infix + "_OocytesDonate4");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->OocytesDonate4->caption(), $ivf_oocytedenudation->OocytesDonate4->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_edit->MIOocytesDonate3->Required) { ?>
			elm = this.getElements("x" + infix + "_MIOocytesDonate3");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->MIOocytesDonate3->caption(), $ivf_oocytedenudation->MIOocytesDonate3->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_edit->MIOocytesDonate4->Required) { ?>
			elm = this.getElements("x" + infix + "_MIOocytesDonate4");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->MIOocytesDonate4->caption(), $ivf_oocytedenudation->MIOocytesDonate4->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_edit->SelfOocytesMI->Required) { ?>
			elm = this.getElements("x" + infix + "_SelfOocytesMI");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->SelfOocytesMI->caption(), $ivf_oocytedenudation->SelfOocytesMI->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_edit->SelfOocytesMII->Required) { ?>
			elm = this.getElements("x" + infix + "_SelfOocytesMII");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->SelfOocytesMII->caption(), $ivf_oocytedenudation->SelfOocytesMII->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_edit->donor->Required) { ?>
			elm = this.getElements("x" + infix + "_donor");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->donor->caption(), $ivf_oocytedenudation->donor->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_donor");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_oocytedenudation->donor->errorMessage()) ?>");

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
fivf_oocytedenudationedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_oocytedenudationedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fivf_oocytedenudationedit.lists["x_patient2"] = <?php echo $ivf_oocytedenudation_edit->patient2->Lookup->toClientList() ?>;
fivf_oocytedenudationedit.lists["x_patient2"].options = <?php echo JsonEncode($ivf_oocytedenudation_edit->patient2->lookupOptions()) ?>;
fivf_oocytedenudationedit.lists["x_OocyteOrgin"] = <?php echo $ivf_oocytedenudation_edit->OocyteOrgin->Lookup->toClientList() ?>;
fivf_oocytedenudationedit.lists["x_OocyteOrgin"].options = <?php echo JsonEncode($ivf_oocytedenudation_edit->OocyteOrgin->options(FALSE, TRUE)) ?>;
fivf_oocytedenudationedit.lists["x_patient1"] = <?php echo $ivf_oocytedenudation_edit->patient1->Lookup->toClientList() ?>;
fivf_oocytedenudationedit.lists["x_patient1"].options = <?php echo JsonEncode($ivf_oocytedenudation_edit->patient1->lookupOptions()) ?>;
fivf_oocytedenudationedit.lists["x_OocyteType[]"] = <?php echo $ivf_oocytedenudation_edit->OocyteType->Lookup->toClientList() ?>;
fivf_oocytedenudationedit.lists["x_OocyteType[]"].options = <?php echo JsonEncode($ivf_oocytedenudation_edit->OocyteType->options(FALSE, TRUE)) ?>;
fivf_oocytedenudationedit.lists["x_patient3"] = <?php echo $ivf_oocytedenudation_edit->patient3->Lookup->toClientList() ?>;
fivf_oocytedenudationedit.lists["x_patient3"].options = <?php echo JsonEncode($ivf_oocytedenudation_edit->patient3->lookupOptions()) ?>;
fivf_oocytedenudationedit.lists["x_patient4"] = <?php echo $ivf_oocytedenudation_edit->patient4->Lookup->toClientList() ?>;
fivf_oocytedenudationedit.lists["x_patient4"].options = <?php echo JsonEncode($ivf_oocytedenudation_edit->patient4->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $ivf_oocytedenudation_edit->showPageHeader(); ?>
<?php
$ivf_oocytedenudation_edit->showMessage();
?>
<form name="fivf_oocytedenudationedit" id="fivf_oocytedenudationedit" class="<?php echo $ivf_oocytedenudation_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ivf_oocytedenudation_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_oocytedenudation_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_oocytedenudation">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_oocytedenudation_edit->IsModal ?>">
<?php if ($ivf_oocytedenudation->getCurrentMasterTable() == "view_ivf_treatment") { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="view_ivf_treatment">
<input type="hidden" name="fk_id" value="<?php echo $ivf_oocytedenudation->TidNo->getSessionValue() ?>">
<input type="hidden" name="fk_RIDNO" value="<?php echo $ivf_oocytedenudation->RIDNo->getSessionValue() ?>">
<input type="hidden" name="fk_Name" value="<?php echo $ivf_oocytedenudation->Name->getSessionValue() ?>">
<?php } ?>
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($ivf_oocytedenudation->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_ivf_oocytedenudation_id" class="<?php echo $ivf_oocytedenudation_edit->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_id" class="ivf_oocytedenudationedit" type="text/html"><span><?php echo $ivf_oocytedenudation->id->caption() ?><?php echo ($ivf_oocytedenudation->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_oocytedenudation_edit->RightColumnClass ?>"><div<?php echo $ivf_oocytedenudation->id->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_id" class="ivf_oocytedenudationedit" type="text/html">
<span id="el_ivf_oocytedenudation_id">
<span<?php echo $ivf_oocytedenudation->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_oocytedenudation->id->EditValue) ?>"></span>
</span>
</script>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($ivf_oocytedenudation->id->CurrentValue) ?>">
<?php echo $ivf_oocytedenudation->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation->RIDNo->Visible) { // RIDNo ?>
	<div id="r_RIDNo" class="form-group row">
		<label id="elh_ivf_oocytedenudation_RIDNo" for="x_RIDNo" class="<?php echo $ivf_oocytedenudation_edit->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_RIDNo" class="ivf_oocytedenudationedit" type="text/html"><span><?php echo $ivf_oocytedenudation->RIDNo->caption() ?><?php echo ($ivf_oocytedenudation->RIDNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_oocytedenudation_edit->RightColumnClass ?>"><div<?php echo $ivf_oocytedenudation->RIDNo->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RIDNo->getSessionValue() <> "") { ?>
<script id="tpx_ivf_oocytedenudation_RIDNo" class="ivf_oocytedenudationedit" type="text/html">
<span id="el_ivf_oocytedenudation_RIDNo">
<span<?php echo $ivf_oocytedenudation->RIDNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_oocytedenudation->RIDNo->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" id="x_RIDNo" name="x_RIDNo" value="<?php echo HtmlEncode($ivf_oocytedenudation->RIDNo->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx_ivf_oocytedenudation_RIDNo" class="ivf_oocytedenudationedit" type="text/html">
<span id="el_ivf_oocytedenudation_RIDNo">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_RIDNo" name="x_RIDNo" id="x_RIDNo" size="30" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->RIDNo->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->RIDNo->EditValue ?>"<?php echo $ivf_oocytedenudation->RIDNo->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php echo $ivf_oocytedenudation->RIDNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation->Name->Visible) { // Name ?>
	<div id="r_Name" class="form-group row">
		<label id="elh_ivf_oocytedenudation_Name" for="x_Name" class="<?php echo $ivf_oocytedenudation_edit->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_Name" class="ivf_oocytedenudationedit" type="text/html"><span><?php echo $ivf_oocytedenudation->Name->caption() ?><?php echo ($ivf_oocytedenudation->Name->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_oocytedenudation_edit->RightColumnClass ?>"><div<?php echo $ivf_oocytedenudation->Name->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->Name->getSessionValue() <> "") { ?>
<script id="tpx_ivf_oocytedenudation_Name" class="ivf_oocytedenudationedit" type="text/html">
<span id="el_ivf_oocytedenudation_Name">
<span<?php echo $ivf_oocytedenudation->Name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_oocytedenudation->Name->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" id="x_Name" name="x_Name" value="<?php echo HtmlEncode($ivf_oocytedenudation->Name->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx_ivf_oocytedenudation_Name" class="ivf_oocytedenudationedit" type="text/html">
<span id="el_ivf_oocytedenudation_Name">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->Name->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->Name->EditValue ?>"<?php echo $ivf_oocytedenudation->Name->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php echo $ivf_oocytedenudation->Name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation->ResultDate->Visible) { // ResultDate ?>
	<div id="r_ResultDate" class="form-group row">
		<label id="elh_ivf_oocytedenudation_ResultDate" for="x_ResultDate" class="<?php echo $ivf_oocytedenudation_edit->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_ResultDate" class="ivf_oocytedenudationedit" type="text/html"><span><?php echo $ivf_oocytedenudation->ResultDate->caption() ?><?php echo ($ivf_oocytedenudation->ResultDate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_oocytedenudation_edit->RightColumnClass ?>"><div<?php echo $ivf_oocytedenudation->ResultDate->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_ResultDate" class="ivf_oocytedenudationedit" type="text/html">
<span id="el_ivf_oocytedenudation_ResultDate">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_ResultDate" data-format="11" name="x_ResultDate" id="x_ResultDate" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->ResultDate->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->ResultDate->EditValue ?>"<?php echo $ivf_oocytedenudation->ResultDate->editAttributes() ?>>
<?php if (!$ivf_oocytedenudation->ResultDate->ReadOnly && !$ivf_oocytedenudation->ResultDate->Disabled && !isset($ivf_oocytedenudation->ResultDate->EditAttrs["readonly"]) && !isset($ivf_oocytedenudation->ResultDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="ivf_oocytedenudationedit_js">
ew.createDateTimePicker("fivf_oocytedenudationedit", "x_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php echo $ivf_oocytedenudation->ResultDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation->Surgeon->Visible) { // Surgeon ?>
	<div id="r_Surgeon" class="form-group row">
		<label id="elh_ivf_oocytedenudation_Surgeon" for="x_Surgeon" class="<?php echo $ivf_oocytedenudation_edit->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_Surgeon" class="ivf_oocytedenudationedit" type="text/html"><span><?php echo $ivf_oocytedenudation->Surgeon->caption() ?><?php echo ($ivf_oocytedenudation->Surgeon->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_oocytedenudation_edit->RightColumnClass ?>"><div<?php echo $ivf_oocytedenudation->Surgeon->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_Surgeon" class="ivf_oocytedenudationedit" type="text/html">
<span id="el_ivf_oocytedenudation_Surgeon">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_Surgeon" name="x_Surgeon" id="x_Surgeon" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->Surgeon->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->Surgeon->EditValue ?>"<?php echo $ivf_oocytedenudation->Surgeon->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_oocytedenudation->Surgeon->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation->AsstSurgeon->Visible) { // AsstSurgeon ?>
	<div id="r_AsstSurgeon" class="form-group row">
		<label id="elh_ivf_oocytedenudation_AsstSurgeon" for="x_AsstSurgeon" class="<?php echo $ivf_oocytedenudation_edit->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_AsstSurgeon" class="ivf_oocytedenudationedit" type="text/html"><span><?php echo $ivf_oocytedenudation->AsstSurgeon->caption() ?><?php echo ($ivf_oocytedenudation->AsstSurgeon->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_oocytedenudation_edit->RightColumnClass ?>"><div<?php echo $ivf_oocytedenudation->AsstSurgeon->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_AsstSurgeon" class="ivf_oocytedenudationedit" type="text/html">
<span id="el_ivf_oocytedenudation_AsstSurgeon">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_AsstSurgeon" name="x_AsstSurgeon" id="x_AsstSurgeon" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->AsstSurgeon->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->AsstSurgeon->EditValue ?>"<?php echo $ivf_oocytedenudation->AsstSurgeon->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_oocytedenudation->AsstSurgeon->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation->Anaesthetist->Visible) { // Anaesthetist ?>
	<div id="r_Anaesthetist" class="form-group row">
		<label id="elh_ivf_oocytedenudation_Anaesthetist" for="x_Anaesthetist" class="<?php echo $ivf_oocytedenudation_edit->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_Anaesthetist" class="ivf_oocytedenudationedit" type="text/html"><span><?php echo $ivf_oocytedenudation->Anaesthetist->caption() ?><?php echo ($ivf_oocytedenudation->Anaesthetist->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_oocytedenudation_edit->RightColumnClass ?>"><div<?php echo $ivf_oocytedenudation->Anaesthetist->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_Anaesthetist" class="ivf_oocytedenudationedit" type="text/html">
<span id="el_ivf_oocytedenudation_Anaesthetist">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_Anaesthetist" name="x_Anaesthetist" id="x_Anaesthetist" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->Anaesthetist->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->Anaesthetist->EditValue ?>"<?php echo $ivf_oocytedenudation->Anaesthetist->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_oocytedenudation->Anaesthetist->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation->AnaestheiaType->Visible) { // AnaestheiaType ?>
	<div id="r_AnaestheiaType" class="form-group row">
		<label id="elh_ivf_oocytedenudation_AnaestheiaType" for="x_AnaestheiaType" class="<?php echo $ivf_oocytedenudation_edit->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_AnaestheiaType" class="ivf_oocytedenudationedit" type="text/html"><span><?php echo $ivf_oocytedenudation->AnaestheiaType->caption() ?><?php echo ($ivf_oocytedenudation->AnaestheiaType->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_oocytedenudation_edit->RightColumnClass ?>"><div<?php echo $ivf_oocytedenudation->AnaestheiaType->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_AnaestheiaType" class="ivf_oocytedenudationedit" type="text/html">
<span id="el_ivf_oocytedenudation_AnaestheiaType">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_AnaestheiaType" name="x_AnaestheiaType" id="x_AnaestheiaType" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->AnaestheiaType->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->AnaestheiaType->EditValue ?>"<?php echo $ivf_oocytedenudation->AnaestheiaType->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_oocytedenudation->AnaestheiaType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation->PrimaryEmbryologist->Visible) { // PrimaryEmbryologist ?>
	<div id="r_PrimaryEmbryologist" class="form-group row">
		<label id="elh_ivf_oocytedenudation_PrimaryEmbryologist" for="x_PrimaryEmbryologist" class="<?php echo $ivf_oocytedenudation_edit->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_PrimaryEmbryologist" class="ivf_oocytedenudationedit" type="text/html"><span><?php echo $ivf_oocytedenudation->PrimaryEmbryologist->caption() ?><?php echo ($ivf_oocytedenudation->PrimaryEmbryologist->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_oocytedenudation_edit->RightColumnClass ?>"><div<?php echo $ivf_oocytedenudation->PrimaryEmbryologist->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_PrimaryEmbryologist" class="ivf_oocytedenudationedit" type="text/html">
<span id="el_ivf_oocytedenudation_PrimaryEmbryologist">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_PrimaryEmbryologist" name="x_PrimaryEmbryologist" id="x_PrimaryEmbryologist" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->PrimaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->PrimaryEmbryologist->EditValue ?>"<?php echo $ivf_oocytedenudation->PrimaryEmbryologist->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_oocytedenudation->PrimaryEmbryologist->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation->SecondaryEmbryologist->Visible) { // SecondaryEmbryologist ?>
	<div id="r_SecondaryEmbryologist" class="form-group row">
		<label id="elh_ivf_oocytedenudation_SecondaryEmbryologist" for="x_SecondaryEmbryologist" class="<?php echo $ivf_oocytedenudation_edit->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_SecondaryEmbryologist" class="ivf_oocytedenudationedit" type="text/html"><span><?php echo $ivf_oocytedenudation->SecondaryEmbryologist->caption() ?><?php echo ($ivf_oocytedenudation->SecondaryEmbryologist->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_oocytedenudation_edit->RightColumnClass ?>"><div<?php echo $ivf_oocytedenudation->SecondaryEmbryologist->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_SecondaryEmbryologist" class="ivf_oocytedenudationedit" type="text/html">
<span id="el_ivf_oocytedenudation_SecondaryEmbryologist">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_SecondaryEmbryologist" name="x_SecondaryEmbryologist" id="x_SecondaryEmbryologist" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->SecondaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->SecondaryEmbryologist->EditValue ?>"<?php echo $ivf_oocytedenudation->SecondaryEmbryologist->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_oocytedenudation->SecondaryEmbryologist->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation->OPUNotes->Visible) { // OPUNotes ?>
	<div id="r_OPUNotes" class="form-group row">
		<label id="elh_ivf_oocytedenudation_OPUNotes" for="x_OPUNotes" class="<?php echo $ivf_oocytedenudation_edit->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_OPUNotes" class="ivf_oocytedenudationedit" type="text/html"><span><?php echo $ivf_oocytedenudation->OPUNotes->caption() ?><?php echo ($ivf_oocytedenudation->OPUNotes->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_oocytedenudation_edit->RightColumnClass ?>"><div<?php echo $ivf_oocytedenudation->OPUNotes->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_OPUNotes" class="ivf_oocytedenudationedit" type="text/html">
<span id="el_ivf_oocytedenudation_OPUNotes">
<textarea data-table="ivf_oocytedenudation" data-field="x_OPUNotes" name="x_OPUNotes" id="x_OPUNotes" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->OPUNotes->getPlaceHolder()) ?>"<?php echo $ivf_oocytedenudation->OPUNotes->editAttributes() ?>><?php echo $ivf_oocytedenudation->OPUNotes->EditValue ?></textarea>
</span>
</script>
<?php echo $ivf_oocytedenudation->OPUNotes->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation->NoOfFolliclesRight->Visible) { // NoOfFolliclesRight ?>
	<div id="r_NoOfFolliclesRight" class="form-group row">
		<label id="elh_ivf_oocytedenudation_NoOfFolliclesRight" for="x_NoOfFolliclesRight" class="<?php echo $ivf_oocytedenudation_edit->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_NoOfFolliclesRight" class="ivf_oocytedenudationedit" type="text/html"><span><?php echo $ivf_oocytedenudation->NoOfFolliclesRight->caption() ?><?php echo ($ivf_oocytedenudation->NoOfFolliclesRight->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_oocytedenudation_edit->RightColumnClass ?>"><div<?php echo $ivf_oocytedenudation->NoOfFolliclesRight->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_NoOfFolliclesRight" class="ivf_oocytedenudationedit" type="text/html">
<span id="el_ivf_oocytedenudation_NoOfFolliclesRight">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_NoOfFolliclesRight" name="x_NoOfFolliclesRight" id="x_NoOfFolliclesRight" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->NoOfFolliclesRight->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->NoOfFolliclesRight->EditValue ?>"<?php echo $ivf_oocytedenudation->NoOfFolliclesRight->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_oocytedenudation->NoOfFolliclesRight->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation->NoOfFolliclesLeft->Visible) { // NoOfFolliclesLeft ?>
	<div id="r_NoOfFolliclesLeft" class="form-group row">
		<label id="elh_ivf_oocytedenudation_NoOfFolliclesLeft" for="x_NoOfFolliclesLeft" class="<?php echo $ivf_oocytedenudation_edit->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_NoOfFolliclesLeft" class="ivf_oocytedenudationedit" type="text/html"><span><?php echo $ivf_oocytedenudation->NoOfFolliclesLeft->caption() ?><?php echo ($ivf_oocytedenudation->NoOfFolliclesLeft->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_oocytedenudation_edit->RightColumnClass ?>"><div<?php echo $ivf_oocytedenudation->NoOfFolliclesLeft->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_NoOfFolliclesLeft" class="ivf_oocytedenudationedit" type="text/html">
<span id="el_ivf_oocytedenudation_NoOfFolliclesLeft">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_NoOfFolliclesLeft" name="x_NoOfFolliclesLeft" id="x_NoOfFolliclesLeft" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->NoOfFolliclesLeft->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->NoOfFolliclesLeft->EditValue ?>"<?php echo $ivf_oocytedenudation->NoOfFolliclesLeft->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_oocytedenudation->NoOfFolliclesLeft->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation->NoOfOocytes->Visible) { // NoOfOocytes ?>
	<div id="r_NoOfOocytes" class="form-group row">
		<label id="elh_ivf_oocytedenudation_NoOfOocytes" for="x_NoOfOocytes" class="<?php echo $ivf_oocytedenudation_edit->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_NoOfOocytes" class="ivf_oocytedenudationedit" type="text/html"><span><?php echo $ivf_oocytedenudation->NoOfOocytes->caption() ?><?php echo ($ivf_oocytedenudation->NoOfOocytes->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_oocytedenudation_edit->RightColumnClass ?>"><div<?php echo $ivf_oocytedenudation->NoOfOocytes->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_NoOfOocytes" class="ivf_oocytedenudationedit" type="text/html">
<span id="el_ivf_oocytedenudation_NoOfOocytes">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_NoOfOocytes" name="x_NoOfOocytes" id="x_NoOfOocytes" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->NoOfOocytes->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->NoOfOocytes->EditValue ?>"<?php echo $ivf_oocytedenudation->NoOfOocytes->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_oocytedenudation->NoOfOocytes->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation->RecordOocyteDenudation->Visible) { // RecordOocyteDenudation ?>
	<div id="r_RecordOocyteDenudation" class="form-group row">
		<label id="elh_ivf_oocytedenudation_RecordOocyteDenudation" for="x_RecordOocyteDenudation" class="<?php echo $ivf_oocytedenudation_edit->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_RecordOocyteDenudation" class="ivf_oocytedenudationedit" type="text/html"><span><?php echo $ivf_oocytedenudation->RecordOocyteDenudation->caption() ?><?php echo ($ivf_oocytedenudation->RecordOocyteDenudation->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_oocytedenudation_edit->RightColumnClass ?>"><div<?php echo $ivf_oocytedenudation->RecordOocyteDenudation->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_RecordOocyteDenudation" class="ivf_oocytedenudationedit" type="text/html">
<span id="el_ivf_oocytedenudation_RecordOocyteDenudation">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_RecordOocyteDenudation" name="x_RecordOocyteDenudation" id="x_RecordOocyteDenudation" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->RecordOocyteDenudation->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->RecordOocyteDenudation->EditValue ?>"<?php echo $ivf_oocytedenudation->RecordOocyteDenudation->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_oocytedenudation->RecordOocyteDenudation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation->DateOfDenudation->Visible) { // DateOfDenudation ?>
	<div id="r_DateOfDenudation" class="form-group row">
		<label id="elh_ivf_oocytedenudation_DateOfDenudation" for="x_DateOfDenudation" class="<?php echo $ivf_oocytedenudation_edit->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_DateOfDenudation" class="ivf_oocytedenudationedit" type="text/html"><span><?php echo $ivf_oocytedenudation->DateOfDenudation->caption() ?><?php echo ($ivf_oocytedenudation->DateOfDenudation->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_oocytedenudation_edit->RightColumnClass ?>"><div<?php echo $ivf_oocytedenudation->DateOfDenudation->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_DateOfDenudation" class="ivf_oocytedenudationedit" type="text/html">
<span id="el_ivf_oocytedenudation_DateOfDenudation">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_DateOfDenudation" data-format="11" name="x_DateOfDenudation" id="x_DateOfDenudation" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->DateOfDenudation->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->DateOfDenudation->EditValue ?>"<?php echo $ivf_oocytedenudation->DateOfDenudation->editAttributes() ?>>
<?php if (!$ivf_oocytedenudation->DateOfDenudation->ReadOnly && !$ivf_oocytedenudation->DateOfDenudation->Disabled && !isset($ivf_oocytedenudation->DateOfDenudation->EditAttrs["readonly"]) && !isset($ivf_oocytedenudation->DateOfDenudation->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="ivf_oocytedenudationedit_js">
ew.createDateTimePicker("fivf_oocytedenudationedit", "x_DateOfDenudation", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php echo $ivf_oocytedenudation->DateOfDenudation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation->DenudationDoneBy->Visible) { // DenudationDoneBy ?>
	<div id="r_DenudationDoneBy" class="form-group row">
		<label id="elh_ivf_oocytedenudation_DenudationDoneBy" for="x_DenudationDoneBy" class="<?php echo $ivf_oocytedenudation_edit->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_DenudationDoneBy" class="ivf_oocytedenudationedit" type="text/html"><span><?php echo $ivf_oocytedenudation->DenudationDoneBy->caption() ?><?php echo ($ivf_oocytedenudation->DenudationDoneBy->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_oocytedenudation_edit->RightColumnClass ?>"><div<?php echo $ivf_oocytedenudation->DenudationDoneBy->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_DenudationDoneBy" class="ivf_oocytedenudationedit" type="text/html">
<span id="el_ivf_oocytedenudation_DenudationDoneBy">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_DenudationDoneBy" name="x_DenudationDoneBy" id="x_DenudationDoneBy" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->DenudationDoneBy->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->DenudationDoneBy->EditValue ?>"<?php echo $ivf_oocytedenudation->DenudationDoneBy->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_oocytedenudation->DenudationDoneBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_ivf_oocytedenudation_status" for="x_status" class="<?php echo $ivf_oocytedenudation_edit->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_status" class="ivf_oocytedenudationedit" type="text/html"><span><?php echo $ivf_oocytedenudation->status->caption() ?><?php echo ($ivf_oocytedenudation->status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_oocytedenudation_edit->RightColumnClass ?>"><div<?php echo $ivf_oocytedenudation->status->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_status" class="ivf_oocytedenudationedit" type="text/html">
<span id="el_ivf_oocytedenudation_status">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_status" name="x_status" id="x_status" size="30" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->status->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->status->EditValue ?>"<?php echo $ivf_oocytedenudation->status->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_oocytedenudation->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation->TidNo->Visible) { // TidNo ?>
	<div id="r_TidNo" class="form-group row">
		<label id="elh_ivf_oocytedenudation_TidNo" for="x_TidNo" class="<?php echo $ivf_oocytedenudation_edit->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_TidNo" class="ivf_oocytedenudationedit" type="text/html"><span><?php echo $ivf_oocytedenudation->TidNo->caption() ?><?php echo ($ivf_oocytedenudation->TidNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_oocytedenudation_edit->RightColumnClass ?>"><div<?php echo $ivf_oocytedenudation->TidNo->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->TidNo->getSessionValue() <> "") { ?>
<script id="tpx_ivf_oocytedenudation_TidNo" class="ivf_oocytedenudationedit" type="text/html">
<span id="el_ivf_oocytedenudation_TidNo">
<span<?php echo $ivf_oocytedenudation->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_oocytedenudation->TidNo->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" id="x_TidNo" name="x_TidNo" value="<?php echo HtmlEncode($ivf_oocytedenudation->TidNo->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx_ivf_oocytedenudation_TidNo" class="ivf_oocytedenudationedit" type="text/html">
<span id="el_ivf_oocytedenudation_TidNo">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->TidNo->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->TidNo->EditValue ?>"<?php echo $ivf_oocytedenudation->TidNo->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php echo $ivf_oocytedenudation->TidNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation->ExpFollicles->Visible) { // ExpFollicles ?>
	<div id="r_ExpFollicles" class="form-group row">
		<label id="elh_ivf_oocytedenudation_ExpFollicles" for="x_ExpFollicles" class="<?php echo $ivf_oocytedenudation_edit->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_ExpFollicles" class="ivf_oocytedenudationedit" type="text/html"><span><?php echo $ivf_oocytedenudation->ExpFollicles->caption() ?><?php echo ($ivf_oocytedenudation->ExpFollicles->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_oocytedenudation_edit->RightColumnClass ?>"><div<?php echo $ivf_oocytedenudation->ExpFollicles->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_ExpFollicles" class="ivf_oocytedenudationedit" type="text/html">
<span id="el_ivf_oocytedenudation_ExpFollicles">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_ExpFollicles" name="x_ExpFollicles" id="x_ExpFollicles" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->ExpFollicles->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->ExpFollicles->EditValue ?>"<?php echo $ivf_oocytedenudation->ExpFollicles->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_oocytedenudation->ExpFollicles->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation->SecondaryDenudationDoneBy->Visible) { // SecondaryDenudationDoneBy ?>
	<div id="r_SecondaryDenudationDoneBy" class="form-group row">
		<label id="elh_ivf_oocytedenudation_SecondaryDenudationDoneBy" for="x_SecondaryDenudationDoneBy" class="<?php echo $ivf_oocytedenudation_edit->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_SecondaryDenudationDoneBy" class="ivf_oocytedenudationedit" type="text/html"><span><?php echo $ivf_oocytedenudation->SecondaryDenudationDoneBy->caption() ?><?php echo ($ivf_oocytedenudation->SecondaryDenudationDoneBy->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_oocytedenudation_edit->RightColumnClass ?>"><div<?php echo $ivf_oocytedenudation->SecondaryDenudationDoneBy->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_SecondaryDenudationDoneBy" class="ivf_oocytedenudationedit" type="text/html">
<span id="el_ivf_oocytedenudation_SecondaryDenudationDoneBy">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_SecondaryDenudationDoneBy" name="x_SecondaryDenudationDoneBy" id="x_SecondaryDenudationDoneBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->SecondaryDenudationDoneBy->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->SecondaryDenudationDoneBy->EditValue ?>"<?php echo $ivf_oocytedenudation->SecondaryDenudationDoneBy->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_oocytedenudation->SecondaryDenudationDoneBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation->patient2->Visible) { // patient2 ?>
	<div id="r_patient2" class="form-group row">
		<label id="elh_ivf_oocytedenudation_patient2" for="x_patient2" class="<?php echo $ivf_oocytedenudation_edit->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_patient2" class="ivf_oocytedenudationedit" type="text/html"><span><?php echo $ivf_oocytedenudation->patient2->caption() ?><?php echo ($ivf_oocytedenudation->patient2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_oocytedenudation_edit->RightColumnClass ?>"><div<?php echo $ivf_oocytedenudation->patient2->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_patient2" class="ivf_oocytedenudationedit" type="text/html">
<span id="el_ivf_oocytedenudation_patient2">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_patient2"><?php echo strval($ivf_oocytedenudation->patient2->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($ivf_oocytedenudation->patient2->ViewValue) : $ivf_oocytedenudation->patient2->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($ivf_oocytedenudation->patient2->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($ivf_oocytedenudation->patient2->ReadOnly || $ivf_oocytedenudation->patient2->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_patient2',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $ivf_oocytedenudation->patient2->Lookup->getParamTag("p_x_patient2") ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient2" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $ivf_oocytedenudation->patient2->displayValueSeparatorAttribute() ?>" name="x_patient2" id="x_patient2" value="<?php echo $ivf_oocytedenudation->patient2->CurrentValue ?>"<?php echo $ivf_oocytedenudation->patient2->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_oocytedenudation->patient2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation->OocytesDonate1->Visible) { // OocytesDonate1 ?>
	<div id="r_OocytesDonate1" class="form-group row">
		<label id="elh_ivf_oocytedenudation_OocytesDonate1" for="x_OocytesDonate1" class="<?php echo $ivf_oocytedenudation_edit->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_OocytesDonate1" class="ivf_oocytedenudationedit" type="text/html"><span><?php echo $ivf_oocytedenudation->OocytesDonate1->caption() ?><?php echo ($ivf_oocytedenudation->OocytesDonate1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_oocytedenudation_edit->RightColumnClass ?>"><div<?php echo $ivf_oocytedenudation->OocytesDonate1->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_OocytesDonate1" class="ivf_oocytedenudationedit" type="text/html">
<span id="el_ivf_oocytedenudation_OocytesDonate1">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_OocytesDonate1" name="x_OocytesDonate1" id="x_OocytesDonate1" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->OocytesDonate1->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->OocytesDonate1->EditValue ?>"<?php echo $ivf_oocytedenudation->OocytesDonate1->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_oocytedenudation->OocytesDonate1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation->OocytesDonate2->Visible) { // OocytesDonate2 ?>
	<div id="r_OocytesDonate2" class="form-group row">
		<label id="elh_ivf_oocytedenudation_OocytesDonate2" for="x_OocytesDonate2" class="<?php echo $ivf_oocytedenudation_edit->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_OocytesDonate2" class="ivf_oocytedenudationedit" type="text/html"><span><?php echo $ivf_oocytedenudation->OocytesDonate2->caption() ?><?php echo ($ivf_oocytedenudation->OocytesDonate2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_oocytedenudation_edit->RightColumnClass ?>"><div<?php echo $ivf_oocytedenudation->OocytesDonate2->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_OocytesDonate2" class="ivf_oocytedenudationedit" type="text/html">
<span id="el_ivf_oocytedenudation_OocytesDonate2">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_OocytesDonate2" name="x_OocytesDonate2" id="x_OocytesDonate2" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->OocytesDonate2->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->OocytesDonate2->EditValue ?>"<?php echo $ivf_oocytedenudation->OocytesDonate2->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_oocytedenudation->OocytesDonate2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation->ETDonate->Visible) { // ETDonate ?>
	<div id="r_ETDonate" class="form-group row">
		<label id="elh_ivf_oocytedenudation_ETDonate" for="x_ETDonate" class="<?php echo $ivf_oocytedenudation_edit->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_ETDonate" class="ivf_oocytedenudationedit" type="text/html"><span><?php echo $ivf_oocytedenudation->ETDonate->caption() ?><?php echo ($ivf_oocytedenudation->ETDonate->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_oocytedenudation_edit->RightColumnClass ?>"><div<?php echo $ivf_oocytedenudation->ETDonate->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_ETDonate" class="ivf_oocytedenudationedit" type="text/html">
<span id="el_ivf_oocytedenudation_ETDonate">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_ETDonate" name="x_ETDonate" id="x_ETDonate" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->ETDonate->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->ETDonate->EditValue ?>"<?php echo $ivf_oocytedenudation->ETDonate->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_oocytedenudation->ETDonate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation->OocyteOrgin->Visible) { // OocyteOrgin ?>
	<div id="r_OocyteOrgin" class="form-group row">
		<label id="elh_ivf_oocytedenudation_OocyteOrgin" for="x_OocyteOrgin" class="<?php echo $ivf_oocytedenudation_edit->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_OocyteOrgin" class="ivf_oocytedenudationedit" type="text/html"><span><?php echo $ivf_oocytedenudation->OocyteOrgin->caption() ?><?php echo ($ivf_oocytedenudation->OocyteOrgin->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_oocytedenudation_edit->RightColumnClass ?>"><div<?php echo $ivf_oocytedenudation->OocyteOrgin->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_OocyteOrgin" class="ivf_oocytedenudationedit" type="text/html">
<span id="el_ivf_oocytedenudation_OocyteOrgin">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_oocytedenudation" data-field="x_OocyteOrgin" data-value-separator="<?php echo $ivf_oocytedenudation->OocyteOrgin->displayValueSeparatorAttribute() ?>" id="x_OocyteOrgin" name="x_OocyteOrgin"<?php echo $ivf_oocytedenudation->OocyteOrgin->editAttributes() ?>>
		<?php echo $ivf_oocytedenudation->OocyteOrgin->selectOptionListHtml("x_OocyteOrgin") ?>
	</select>
</div>
</span>
</script>
<?php echo $ivf_oocytedenudation->OocyteOrgin->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation->patient1->Visible) { // patient1 ?>
	<div id="r_patient1" class="form-group row">
		<label id="elh_ivf_oocytedenudation_patient1" for="x_patient1" class="<?php echo $ivf_oocytedenudation_edit->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_patient1" class="ivf_oocytedenudationedit" type="text/html"><span><?php echo $ivf_oocytedenudation->patient1->caption() ?><?php echo ($ivf_oocytedenudation->patient1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_oocytedenudation_edit->RightColumnClass ?>"><div<?php echo $ivf_oocytedenudation->patient1->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_patient1" class="ivf_oocytedenudationedit" type="text/html">
<span id="el_ivf_oocytedenudation_patient1">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_patient1"><?php echo strval($ivf_oocytedenudation->patient1->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($ivf_oocytedenudation->patient1->ViewValue) : $ivf_oocytedenudation->patient1->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($ivf_oocytedenudation->patient1->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($ivf_oocytedenudation->patient1->ReadOnly || $ivf_oocytedenudation->patient1->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_patient1',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $ivf_oocytedenudation->patient1->Lookup->getParamTag("p_x_patient1") ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient1" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $ivf_oocytedenudation->patient1->displayValueSeparatorAttribute() ?>" name="x_patient1" id="x_patient1" value="<?php echo $ivf_oocytedenudation->patient1->CurrentValue ?>"<?php echo $ivf_oocytedenudation->patient1->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_oocytedenudation->patient1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation->OocyteType->Visible) { // OocyteType ?>
	<div id="r_OocyteType" class="form-group row">
		<label id="elh_ivf_oocytedenudation_OocyteType" class="<?php echo $ivf_oocytedenudation_edit->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_OocyteType" class="ivf_oocytedenudationedit" type="text/html"><span><?php echo $ivf_oocytedenudation->OocyteType->caption() ?><?php echo ($ivf_oocytedenudation->OocyteType->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_oocytedenudation_edit->RightColumnClass ?>"><div<?php echo $ivf_oocytedenudation->OocyteType->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_OocyteType" class="ivf_oocytedenudationedit" type="text/html">
<span id="el_ivf_oocytedenudation_OocyteType">
<div id="tp_x_OocyteType" class="ew-template"><input type="checkbox" class="form-check-input" data-table="ivf_oocytedenudation" data-field="x_OocyteType" data-value-separator="<?php echo $ivf_oocytedenudation->OocyteType->displayValueSeparatorAttribute() ?>" name="x_OocyteType[]" id="x_OocyteType[]" value="{value}"<?php echo $ivf_oocytedenudation->OocyteType->editAttributes() ?>></div>
<div id="dsl_x_OocyteType" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_oocytedenudation->OocyteType->checkBoxListHtml(FALSE, "x_OocyteType[]") ?>
</div></div>
</span>
</script>
<?php echo $ivf_oocytedenudation->OocyteType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation->MIOocytesDonate1->Visible) { // MIOocytesDonate1 ?>
	<div id="r_MIOocytesDonate1" class="form-group row">
		<label id="elh_ivf_oocytedenudation_MIOocytesDonate1" for="x_MIOocytesDonate1" class="<?php echo $ivf_oocytedenudation_edit->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_MIOocytesDonate1" class="ivf_oocytedenudationedit" type="text/html"><span><?php echo $ivf_oocytedenudation->MIOocytesDonate1->caption() ?><?php echo ($ivf_oocytedenudation->MIOocytesDonate1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_oocytedenudation_edit->RightColumnClass ?>"><div<?php echo $ivf_oocytedenudation->MIOocytesDonate1->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_MIOocytesDonate1" class="ivf_oocytedenudationedit" type="text/html">
<span id="el_ivf_oocytedenudation_MIOocytesDonate1">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate1" name="x_MIOocytesDonate1" id="x_MIOocytesDonate1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->MIOocytesDonate1->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->MIOocytesDonate1->EditValue ?>"<?php echo $ivf_oocytedenudation->MIOocytesDonate1->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_oocytedenudation->MIOocytesDonate1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation->MIOocytesDonate2->Visible) { // MIOocytesDonate2 ?>
	<div id="r_MIOocytesDonate2" class="form-group row">
		<label id="elh_ivf_oocytedenudation_MIOocytesDonate2" for="x_MIOocytesDonate2" class="<?php echo $ivf_oocytedenudation_edit->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_MIOocytesDonate2" class="ivf_oocytedenudationedit" type="text/html"><span><?php echo $ivf_oocytedenudation->MIOocytesDonate2->caption() ?><?php echo ($ivf_oocytedenudation->MIOocytesDonate2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_oocytedenudation_edit->RightColumnClass ?>"><div<?php echo $ivf_oocytedenudation->MIOocytesDonate2->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_MIOocytesDonate2" class="ivf_oocytedenudationedit" type="text/html">
<span id="el_ivf_oocytedenudation_MIOocytesDonate2">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate2" name="x_MIOocytesDonate2" id="x_MIOocytesDonate2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->MIOocytesDonate2->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->MIOocytesDonate2->EditValue ?>"<?php echo $ivf_oocytedenudation->MIOocytesDonate2->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_oocytedenudation->MIOocytesDonate2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation->SelfMI->Visible) { // SelfMI ?>
	<div id="r_SelfMI" class="form-group row">
		<label id="elh_ivf_oocytedenudation_SelfMI" for="x_SelfMI" class="<?php echo $ivf_oocytedenudation_edit->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_SelfMI" class="ivf_oocytedenudationedit" type="text/html"><span><?php echo $ivf_oocytedenudation->SelfMI->caption() ?><?php echo ($ivf_oocytedenudation->SelfMI->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_oocytedenudation_edit->RightColumnClass ?>"><div<?php echo $ivf_oocytedenudation->SelfMI->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_SelfMI" class="ivf_oocytedenudationedit" type="text/html">
<span id="el_ivf_oocytedenudation_SelfMI">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_SelfMI" name="x_SelfMI" id="x_SelfMI" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->SelfMI->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->SelfMI->EditValue ?>"<?php echo $ivf_oocytedenudation->SelfMI->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_oocytedenudation->SelfMI->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation->SelfMII->Visible) { // SelfMII ?>
	<div id="r_SelfMII" class="form-group row">
		<label id="elh_ivf_oocytedenudation_SelfMII" for="x_SelfMII" class="<?php echo $ivf_oocytedenudation_edit->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_SelfMII" class="ivf_oocytedenudationedit" type="text/html"><span><?php echo $ivf_oocytedenudation->SelfMII->caption() ?><?php echo ($ivf_oocytedenudation->SelfMII->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_oocytedenudation_edit->RightColumnClass ?>"><div<?php echo $ivf_oocytedenudation->SelfMII->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_SelfMII" class="ivf_oocytedenudationedit" type="text/html">
<span id="el_ivf_oocytedenudation_SelfMII">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_SelfMII" name="x_SelfMII" id="x_SelfMII" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->SelfMII->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->SelfMII->EditValue ?>"<?php echo $ivf_oocytedenudation->SelfMII->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_oocytedenudation->SelfMII->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation->patient3->Visible) { // patient3 ?>
	<div id="r_patient3" class="form-group row">
		<label id="elh_ivf_oocytedenudation_patient3" for="x_patient3" class="<?php echo $ivf_oocytedenudation_edit->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_patient3" class="ivf_oocytedenudationedit" type="text/html"><span><?php echo $ivf_oocytedenudation->patient3->caption() ?><?php echo ($ivf_oocytedenudation->patient3->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_oocytedenudation_edit->RightColumnClass ?>"><div<?php echo $ivf_oocytedenudation->patient3->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_patient3" class="ivf_oocytedenudationedit" type="text/html">
<span id="el_ivf_oocytedenudation_patient3">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_patient3"><?php echo strval($ivf_oocytedenudation->patient3->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($ivf_oocytedenudation->patient3->ViewValue) : $ivf_oocytedenudation->patient3->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($ivf_oocytedenudation->patient3->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($ivf_oocytedenudation->patient3->ReadOnly || $ivf_oocytedenudation->patient3->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_patient3',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $ivf_oocytedenudation->patient3->Lookup->getParamTag("p_x_patient3") ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient3" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $ivf_oocytedenudation->patient3->displayValueSeparatorAttribute() ?>" name="x_patient3" id="x_patient3" value="<?php echo $ivf_oocytedenudation->patient3->CurrentValue ?>"<?php echo $ivf_oocytedenudation->patient3->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_oocytedenudation->patient3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation->patient4->Visible) { // patient4 ?>
	<div id="r_patient4" class="form-group row">
		<label id="elh_ivf_oocytedenudation_patient4" for="x_patient4" class="<?php echo $ivf_oocytedenudation_edit->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_patient4" class="ivf_oocytedenudationedit" type="text/html"><span><?php echo $ivf_oocytedenudation->patient4->caption() ?><?php echo ($ivf_oocytedenudation->patient4->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_oocytedenudation_edit->RightColumnClass ?>"><div<?php echo $ivf_oocytedenudation->patient4->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_patient4" class="ivf_oocytedenudationedit" type="text/html">
<span id="el_ivf_oocytedenudation_patient4">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_patient4"><?php echo strval($ivf_oocytedenudation->patient4->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($ivf_oocytedenudation->patient4->ViewValue) : $ivf_oocytedenudation->patient4->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($ivf_oocytedenudation->patient4->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($ivf_oocytedenudation->patient4->ReadOnly || $ivf_oocytedenudation->patient4->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_patient4',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $ivf_oocytedenudation->patient4->Lookup->getParamTag("p_x_patient4") ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient4" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $ivf_oocytedenudation->patient4->displayValueSeparatorAttribute() ?>" name="x_patient4" id="x_patient4" value="<?php echo $ivf_oocytedenudation->patient4->CurrentValue ?>"<?php echo $ivf_oocytedenudation->patient4->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_oocytedenudation->patient4->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation->OocytesDonate3->Visible) { // OocytesDonate3 ?>
	<div id="r_OocytesDonate3" class="form-group row">
		<label id="elh_ivf_oocytedenudation_OocytesDonate3" for="x_OocytesDonate3" class="<?php echo $ivf_oocytedenudation_edit->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_OocytesDonate3" class="ivf_oocytedenudationedit" type="text/html"><span><?php echo $ivf_oocytedenudation->OocytesDonate3->caption() ?><?php echo ($ivf_oocytedenudation->OocytesDonate3->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_oocytedenudation_edit->RightColumnClass ?>"><div<?php echo $ivf_oocytedenudation->OocytesDonate3->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_OocytesDonate3" class="ivf_oocytedenudationedit" type="text/html">
<span id="el_ivf_oocytedenudation_OocytesDonate3">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_OocytesDonate3" name="x_OocytesDonate3" id="x_OocytesDonate3" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->OocytesDonate3->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->OocytesDonate3->EditValue ?>"<?php echo $ivf_oocytedenudation->OocytesDonate3->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_oocytedenudation->OocytesDonate3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation->OocytesDonate4->Visible) { // OocytesDonate4 ?>
	<div id="r_OocytesDonate4" class="form-group row">
		<label id="elh_ivf_oocytedenudation_OocytesDonate4" for="x_OocytesDonate4" class="<?php echo $ivf_oocytedenudation_edit->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_OocytesDonate4" class="ivf_oocytedenudationedit" type="text/html"><span><?php echo $ivf_oocytedenudation->OocytesDonate4->caption() ?><?php echo ($ivf_oocytedenudation->OocytesDonate4->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_oocytedenudation_edit->RightColumnClass ?>"><div<?php echo $ivf_oocytedenudation->OocytesDonate4->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_OocytesDonate4" class="ivf_oocytedenudationedit" type="text/html">
<span id="el_ivf_oocytedenudation_OocytesDonate4">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_OocytesDonate4" name="x_OocytesDonate4" id="x_OocytesDonate4" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->OocytesDonate4->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->OocytesDonate4->EditValue ?>"<?php echo $ivf_oocytedenudation->OocytesDonate4->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_oocytedenudation->OocytesDonate4->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation->MIOocytesDonate3->Visible) { // MIOocytesDonate3 ?>
	<div id="r_MIOocytesDonate3" class="form-group row">
		<label id="elh_ivf_oocytedenudation_MIOocytesDonate3" for="x_MIOocytesDonate3" class="<?php echo $ivf_oocytedenudation_edit->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_MIOocytesDonate3" class="ivf_oocytedenudationedit" type="text/html"><span><?php echo $ivf_oocytedenudation->MIOocytesDonate3->caption() ?><?php echo ($ivf_oocytedenudation->MIOocytesDonate3->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_oocytedenudation_edit->RightColumnClass ?>"><div<?php echo $ivf_oocytedenudation->MIOocytesDonate3->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_MIOocytesDonate3" class="ivf_oocytedenudationedit" type="text/html">
<span id="el_ivf_oocytedenudation_MIOocytesDonate3">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate3" name="x_MIOocytesDonate3" id="x_MIOocytesDonate3" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->MIOocytesDonate3->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->MIOocytesDonate3->EditValue ?>"<?php echo $ivf_oocytedenudation->MIOocytesDonate3->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_oocytedenudation->MIOocytesDonate3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation->MIOocytesDonate4->Visible) { // MIOocytesDonate4 ?>
	<div id="r_MIOocytesDonate4" class="form-group row">
		<label id="elh_ivf_oocytedenudation_MIOocytesDonate4" for="x_MIOocytesDonate4" class="<?php echo $ivf_oocytedenudation_edit->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_MIOocytesDonate4" class="ivf_oocytedenudationedit" type="text/html"><span><?php echo $ivf_oocytedenudation->MIOocytesDonate4->caption() ?><?php echo ($ivf_oocytedenudation->MIOocytesDonate4->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_oocytedenudation_edit->RightColumnClass ?>"><div<?php echo $ivf_oocytedenudation->MIOocytesDonate4->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_MIOocytesDonate4" class="ivf_oocytedenudationedit" type="text/html">
<span id="el_ivf_oocytedenudation_MIOocytesDonate4">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate4" name="x_MIOocytesDonate4" id="x_MIOocytesDonate4" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->MIOocytesDonate4->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->MIOocytesDonate4->EditValue ?>"<?php echo $ivf_oocytedenudation->MIOocytesDonate4->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_oocytedenudation->MIOocytesDonate4->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation->SelfOocytesMI->Visible) { // SelfOocytesMI ?>
	<div id="r_SelfOocytesMI" class="form-group row">
		<label id="elh_ivf_oocytedenudation_SelfOocytesMI" for="x_SelfOocytesMI" class="<?php echo $ivf_oocytedenudation_edit->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_SelfOocytesMI" class="ivf_oocytedenudationedit" type="text/html"><span><?php echo $ivf_oocytedenudation->SelfOocytesMI->caption() ?><?php echo ($ivf_oocytedenudation->SelfOocytesMI->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_oocytedenudation_edit->RightColumnClass ?>"><div<?php echo $ivf_oocytedenudation->SelfOocytesMI->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_SelfOocytesMI" class="ivf_oocytedenudationedit" type="text/html">
<span id="el_ivf_oocytedenudation_SelfOocytesMI">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_SelfOocytesMI" name="x_SelfOocytesMI" id="x_SelfOocytesMI" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->SelfOocytesMI->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->SelfOocytesMI->EditValue ?>"<?php echo $ivf_oocytedenudation->SelfOocytesMI->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_oocytedenudation->SelfOocytesMI->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation->SelfOocytesMII->Visible) { // SelfOocytesMII ?>
	<div id="r_SelfOocytesMII" class="form-group row">
		<label id="elh_ivf_oocytedenudation_SelfOocytesMII" for="x_SelfOocytesMII" class="<?php echo $ivf_oocytedenudation_edit->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_SelfOocytesMII" class="ivf_oocytedenudationedit" type="text/html"><span><?php echo $ivf_oocytedenudation->SelfOocytesMII->caption() ?><?php echo ($ivf_oocytedenudation->SelfOocytesMII->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_oocytedenudation_edit->RightColumnClass ?>"><div<?php echo $ivf_oocytedenudation->SelfOocytesMII->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_SelfOocytesMII" class="ivf_oocytedenudationedit" type="text/html">
<span id="el_ivf_oocytedenudation_SelfOocytesMII">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_SelfOocytesMII" name="x_SelfOocytesMII" id="x_SelfOocytesMII" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->SelfOocytesMII->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->SelfOocytesMII->EditValue ?>"<?php echo $ivf_oocytedenudation->SelfOocytesMII->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_oocytedenudation->SelfOocytesMII->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation->donor->Visible) { // donor ?>
	<div id="r_donor" class="form-group row">
		<label id="elh_ivf_oocytedenudation_donor" for="x_donor" class="<?php echo $ivf_oocytedenudation_edit->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_donor" class="ivf_oocytedenudationedit" type="text/html"><span><?php echo $ivf_oocytedenudation->donor->caption() ?><?php echo ($ivf_oocytedenudation->donor->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $ivf_oocytedenudation_edit->RightColumnClass ?>"><div<?php echo $ivf_oocytedenudation->donor->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_donor" class="ivf_oocytedenudationedit" type="text/html">
<span id="el_ivf_oocytedenudation_donor">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_donor" name="x_donor" id="x_donor" size="30" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->donor->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->donor->EditValue ?>"<?php echo $ivf_oocytedenudation->donor->editAttributes() ?>>
</span>
</script>
<?php echo $ivf_oocytedenudation->donor->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_ivf_oocytedenudationedit" class="ew-custom-template"></div>
<script id="tpm_ivf_oocytedenudationedit" type="text/html">
<div id="ct_ivf_oocytedenudation_edit"><style>
	.ew-form:not(.ew-list-form):not(.ew-pager-form), table.ew-master-table.ew-vertical {
		width: 100%;
	}
	.content-wrapper {
		background: #f4f6f9;
	}
	.form-control-plaintext {
		display: unset;
		width: unset;
	}
	.widget-user .widget-user-image {
		position: absolute;
		top: 65px;
		left: 90%;
		margin-left: -45px;
	}
	.widget-user .card-footer {
		padding-top: 0px;
	}
	.card-footer {
		padding: .05rem 0.025rem;
		background-color: rgba(17,17,17,0.03);
		border-top: 0 solid #f4f4f4;
	}
	.widget-user .widget-user-username {
	margin-top: 0;
	margin-bottom: 0px;
	font-size: 18px;
	font-weight: 300;
	text-shadow: 0 1px 1px rgba(0,0,0,0.2);
}
.widget-user .widget-user-image {
	position: absolute;
	top: 5px;
	left: 90%;
	margin-left: -45px;
}
.widget-user .widget-user-header {
	padding: 1rem;
	height: 100px;
	border-top-left-radius: .25rem;
	border-top-right-radius: .25rem;
}
.form-control:not(textarea) {
	width: -webkit-fill-available;
}
.ew-row .ew-cell {
	margin-right: unset;
}
</style>
<?php
$cid = $_GET["fk_id"] ;
$IVFid = $_GET["fk_RIDNO"] ;
$dbhelper = &DbHelper();
$showmaster = $_GET["showmaster"] ;
if( $showmaster=="ivf_treatment_plan")
{
$sql = "SELECT * FROM ganeshkumar_bjhims.view_ivf_treatment where id='".$IVFid."'; ";
$resultst = $dbhelper->ExecuteRows($sql);
$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where id='".$resultst[0]["RIDNO"]."'; ";
$results = $dbhelper->ExecuteRows($sql);
}else{
$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where id='".$IVFid."'; ";
$results = $dbhelper->ExecuteRows($sql);
}
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Male"]."'; ";
$results1 = $dbhelper->ExecuteRows($sql);
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Female"]."'; ";
$results2 = $dbhelper->ExecuteRows($sql);
if($results2[0]["profilePic"] == "")
{
   $PatientProfilePic = "hims\profile-picture.png";
}else{
 $PatientProfilePic = $results2[0]["profilePic"];
}
if($results1[0]["profilePic"] == "")
{
   $PartnerProfilePic = "hims\profile-picture.png";
}else{
 $PartnerProfilePic = $results1[0]["profilePic"];
}
$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_treatment_plan where id='".$cid."'; ";
$resultsB = $dbhelper->ExecuteRows($sql);
?>	
<input type="hidden" id="TidNO" name="TidNO" value="<?php echo $resultst[0]["id"]; ?>">
<input type="hidden" id="RIDNO" name="RIDNO" value="<?php echo $results[0]["id"]; ?>">
<input type="hidden" id="Female" name="Female" value="<?php echo $results[0]["Female"]; ?>">
<div class="row">
<div class="col-md-6">
Couple ID : <?php echo $results[0]["CoupleID"]; ?>
</div>
<div class="col-md-6">
IVF Cycle NO : <?php echo $resultsB[0]["IVFCycleNO"]; ?>
</div>
</div>
<div class="row">
<div class="col-md-6">
			<!-- Widget: user widget style 1 -->
			<div class="card card-widget widget-user">
			  <!-- Add the bg color to the header using any of the bg-* classes -->
			  <div class="widget-user-header bg-warning">
			  	<h4 class="widget-user-username"><span class="ew-cell">Patient Id : <?php echo $results2[0]["PatientID"]; ?></span></h4>
				<h4 class="widget-user-username"><span class="ew-cell">Patient Name : <?php echo $results2[0]["first_name"]; ?></span></h4>
				<h6 class="widget-user-desc"><span class="ew-cell">Gender : <?php echo $results2[0]["gender"]; ?></span></h6>	
				<h6 class="widget-user-desc"><span class="ew-cell">Blood Group : <?php echo $results2[0]["blood_group"]; ?></span></h6>
			  </div>
			  <div class="widget-user-image">
			   		<img id="profilePicturePatient" class="img-circle elevation-2" src='<?php echo "uploads/".$PatientProfilePic; ?>' alt="User Avatar"> 
			  </div>
			  <div class="card-footer">
				<div class="row">
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header"><span class="ew-cell">Age : <?php echo AgeCalculationb($results2[0]["dob"]); ?></span></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header">Mobile : <?php echo $results2[0]["mobile_no"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4">
					<div class="description-block">
					  <h5 class="description-header">Email : <?php echo $results2[0]["PEmail"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				</div>
				<!-- /.row -->
			  </div>
			</div>
			<!-- /.widget-user -->
</div>
<div class="col-md-6">
			<!-- Widget: user widget style 1 -->
			<div class="card card-widget widget-user">
			  <!-- Add the bg color to the header using any of the bg-* classes -->
			  <div class="widget-user-header bg-warning">
			  	<h4 class="widget-user-username"><span class="ew-cell">Partner Id : <?php echo $results1[0]["PatientID"]; ?></span></h4>
				<h4 class="widget-user-username"><span class="ew-cell">Partner Name :<?php echo $results1[0]["first_name"]; ?></span></h4>
				<h6 class="widget-user-desc"><span class="ew-cell">Gender : <?php echo $results1[0]["gender"]; ?></span></h6>	
				<h6 class="widget-user-desc"><span class="ew-cell">Blood Group : <?php echo $results1[0]["blood_group"]; ?></span></h6>
			  </div>
			  <div class="widget-user-image">
			   		<img id="profilePicturePatient" class="img-circle elevation-2" src='<?php echo "uploads/".$PartnerProfilePic; ?>' alt="User Avatar"> 
			  </div>
			  <div class="card-footer">
				<div class="row">
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header"><span class="ew-cell">Age : <?php echo AgeCalculationb($results1[0]["dob"]); ?></span></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header">Mobile : <?php echo $results1[0]["mobile_no"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4">
					<div class="description-block">
					  <h5 class="description-header">Email : <?php echo $results1[0]["PEmail"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				</div>
				<!-- /.row -->
			  </div>
			</div>
			<!-- /.widget-user -->
</div>
</div>
<?php
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_vitals_history where RIDNO='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$VitalsHistory = $dbhelper->ExecuteRows($sql);
	$VitalsHistoryRowCount = count($VitalsHistory);
	if($VitalsHistoryRowCount > 0)
	{
		if($cid == $VitalsHistory[$VitalsHistoryRowCount-1]["TidNo"])
		{
			$VitalsHistoryUrl = "ivf_vitals_historyview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$VitalsHistory[$VitalsHistoryRowCount-1]["id"]."";  // ---- view
		}else{
			$kk = 0;
			for ($x = 0; $x < $VitalsHistoryRowCount; $x++) {
				if($cid == $VitalsHistory[$x]["TidNo"])
				{
					$kk = 1;
					$VitalsHistoryUrl = "ivf_vitals_historyview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$VitalsHistory[$x]["id"]."";  // ---- view
				}
			}
			if($kk == 0)
			{
				$VitalsHistoryUrl = "ivf_vitals_historyadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$VitalsHistory[$VitalsHistoryRowCount-1]["id"]."";
			}
		}
	}else{
		$VitalsHistoryUrl = "ivf_vitals_historyadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}
	$opurl = "view_opd_follow_upadd.php?showmaster=ivf_treatment_plan&fk_Name=".$results2[0]["id"]."&fk_id=".$cid."&fk_RIDNO=".$IVFid."";
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_et_chart where RIDNo='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$ivf_et_chart = $dbhelper->ExecuteRows($sql);
	$Vivf_et_chartRowCount = count($ivf_et_chart);
	if($ivf_et_chart == false)
	{
		$Etcountwarn = "";
		$ivf_et_chartUrl = "ivf_et_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($Vivf_et_chartRowCount > 0)
		{
			$Etcountwarn ='<span class="badge bg-warning">'.$Vivf_et_chartRowCount.'</span>';
			if($cid == $ivf_et_chart[$Vivf_et_chartRowCount-1]["TidNo"])
			{
				$ivf_et_chartUrl = "ivf_et_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivf_et_chart[$Vivf_et_chartRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $Vivf_et_chartRowCount; $x++) {
					if($cid == $ivf_et_chart[$x]["TidNo"])
					{
						$kk = 1;
						$ivf_et_chartUrl = "ivf_et_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivf_et_chart[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivf_et_chartUrl = "ivf_et_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivf_et_chart[$Vivf_et_chartRowCount-1]["id"]."";
				}
			}
		}else{
			$ivf_et_chartUrl = "ivf_et_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}

	//http://localhost:1445/ivf_et_chartadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_art_summary where RIDNo='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$ivfartsummary = $dbhelper->ExecuteRows($sql);
	$ivfartsummaryRowCount = count($ivfartsummary);
	if($ivfartsummary == false)
	{
		$ivfartsummarycountwarn = "";
		$ivfartsummaryUrl = "ivf_art_summaryadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($ivfartsummaryRowCount > 0)
		{
			$ivfartsummarycountwarn ='<span class="badge bg-warning">'.$ivfartsummaryRowCount.'</span>';
			if($cid == $ivfartsummary[$ivfartsummaryRowCount-1]["TidNo"])
			{
				$ivfartsummaryUrl = "ivf_art_summaryview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfartsummary[$ivfartsummaryRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $ivfartsummaryRowCount; $x++) {
					if($cid == $ivfartsummary[$x]["TidNo"])
					{
						$kk = 1;
						$ivfartsummaryUrl = "ivf_art_summaryview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfartsummary[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivfartsummaryUrl = "ivf_art_summaryadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfartsummary[$ivfartsummaryRowCount-1]["id"]."";
				}
			}
		}else{
			$ivfartsummaryUrl = "ivf_art_summaryadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}

  //  http://localhost:1445/ivf_art_summaryadd.php?showmaster=ivf_treatment_plan&fk_id=1&fk_Name=597&fk_RIDNO=11
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_stimulation_chart where RIDNo='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$ivfstimulationchart = $dbhelper->ExecuteRows($sql);
	$ivfstimulationchartRowCount = count($ivfstimulationchart);
	if($ivfstimulationchart == false)
	{
		$ivfstimulationchartwarn = "";
		$ivfstimulationchartUrl = "ivf_stimulation_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($VitalsHistoryRowCount > 0)
		{
			$ivfstimulationchartwarn ='<span class="badge bg-warning">'.$VitalsHistoryRowCount.'</span>';
			if($cid == $ivfstimulationchart[$ivfstimulationchartRowCount-1]["TidNo"])
			{
				$ivfstimulationchartUrl = "ivf_stimulation_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfstimulationchart[$ivfstimulationchartRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $ivfstimulationchartRowCount; $x++) {
					if($cid == $ivfstimulationchart[$x]["TidNo"])
					{
						$kk = 1;
						$ivfstimulationchartUrl = "ivf_stimulation_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfstimulationchart[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivfstimulationchartUrl = "ivf_stimulation_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfstimulationchart[$ivfstimulationchartRowCount-1]["id"]."";
				}
			}
		}else{
			$ivfstimulationchartUrl = "ivf_stimulation_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}

  //  http://localhost:1445/ivf_stimulation_chartadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_semenanalysisreport where RIDNo='".$IVFid."' and PatientName='".$results2[0]["id"]."' ;";
	$ivfsemenanalysisreport = $dbhelper->ExecuteRows($sql);
	$ivfsemenanalysisreportRowCount = count($ivfsemenanalysisreport);
	if($ivfsemenanalysisreport == false)
	{
		$ivfsemenanalysisreportwarn = "";
		$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($ivfsemenanalysisreportRowCount > 0)
		{
			$ivfsemenanalysisreportwarn ='<span class="badge bg-warning">'.$ivfsemenanalysisreportRowCount.'</span>';
			if($cid == $ivfsemenanalysisreport[$ivfsemenanalysisreportRowCount-1]["TidNo"])
			{
				$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfsemenanalysisreport[$ivfsemenanalysisreportRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $ivfsemenanalysisreportRowCount; $x++) {
					if($cid == $ivfsemenanalysisreport[$x]["TidNo"])
					{
						$kk = 1;
						$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfsemenanalysisreport[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfsemenanalysisreport[$ivfsemenanalysisreportRowCount-1]["id"]."";
				}
			}
		}else{
			$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}

  //  http://localhost:1445/ivf_semenanalysisreportadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_ovum_pick_up_chart where RIDNo='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$ivfovumpickupchart = $dbhelper->ExecuteRows($sql);
	$ivfovumpickupchartRowCount = count($ivfovumpickupchart);
	if($ivfovumpickupchart == false)
	{
		$ivfovumpickupchartwarn = "";
		$ivfovumpickupchartUrl = "ivf_ovum_pick_up_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($ivfovumpickupchartRowCount > 0)
		{
			$ivfovumpickupchartwarn ='<span class="badge bg-warning">'.$ivfovumpickupchartRowCount.'</span>';
			if($cid == $ivfovumpickupchart[$ivfovumpickupchartRowCount-1]["TidNo"])
			{
				$ivfovumpickupchartUrl = "ivf_ovum_pick_up_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfovumpickupchart[$ivfovumpickupchartRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $ivfovumpickupchartRowCount; $x++) {
					if($cid == $ivfovumpickupchart[$x]["TidNo"])
					{
						$kk = 1;
						$ivfovumpickupchartUrl = "ivf_ovum_pick_up_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfovumpickupchart[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivfovumpickupchartUrl = "ivf_ovum_pick_up_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfovumpickupchart[$ivfovumpickupchartRowCount-1]["id"]."";
				}
			}
		}else{
			$ivfovumpickupchartUrl = "ivf_ovum_pick_up_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}

   // http://localhost:1445/ivf_ovum_pick_up_chartadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_otherprocedure where RIDNO='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$ivfotherprocedure = $dbhelper->ExecuteRows($sql);
	$ivfotherprocedureRowCount = count($ivfotherprocedure);
	if($ivfotherprocedure == false)
	{
		$ivfotherprocedurewarn = "";
		$ivfotherprocedureUrl = "ivf_otherprocedureadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($ivfotherprocedureRowCount > 0)
		{
			$ivfotherprocedurewarn ='<span class="badge bg-warning">'.$ivfotherprocedureRowCount.'</span>';
			if($cid == $ivfotherprocedure[$ivfotherprocedureRowCount-1]["TidNo"])
			{
				$ivfotherprocedureUrl = "ivf_otherprocedureview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfotherprocedure[$ivfotherprocedureRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $ivfotherprocedureRowCount; $x++) {
					if($cid == $ivfotherprocedure[$x]["TidNo"])
					{
						$kk = 1;
						$ivfotherprocedureUrl = "ivf_otherprocedureview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfotherprocedure[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivfotherprocedureUrl = "ivf_otherprocedureadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfotherprocedure[$ivfotherprocedureRowCount-1]["id"]."";
				}
			}
		}else{
			$ivfotherprocedureUrl = "ivf_otherprocedureadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}

  //  http://localhost:1445/ivf_otherprocedureadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$ivfembryologychartlistUrl = "ivf_embryology_chartlist.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add

	//http://localhost:1445/ivf_embryology_chartlist.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$patientserviceslistUrl = "patient_serviceslist.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";

	//http://localhost:1445/patient_serviceslist.php?showmaster=ivf_treatment_plan&fk_Name=597&fk_RIDNO=11&fk_id=1
	$followupurl = "ivf_follow_up_trackingadd.php?showmaster=ivf_treatment_plan&fk_Name=".$results2[0]["id"]."&fk_id=".$cid."&fk_RIDNO=".$IVFid."";

	//http://localhost:1445/ivf_follow_up_trackingadd.php?showmaster=ivf_treatment_plan&fk_id=1&fk_RIDNO=11&fk_Name=597
	$followupurl = "ivf_follow_up_trackingadd.php?showmaster=ivf_treatment_plan&fk_Name=".$results2[0]["id"]."&fk_id=".$cid."&fk_RIDNO=".$IVFid."";
	$TrPlanurl = "ivf_treatment_planview.php?showdetail=&id=".$cid."&showmaster=ivf&fk_id=".$IVFid."&fk_Female=".$results2[0]["id"]."";

	//http://localhost:1445/ivf_treatment_planview.php?showdetail=&id=1&showmaster=ivf&fk_id=11&fk_Female=597
?>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Ovum Pick Up </h3>
			</div>
			<div class="card-body">
			<table class="ew-table" style="width:100%;">
				<tbody>
					<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_ResultDate"/}}&nbsp;{{include tmpl="#tpx_ivf_oocytedenudation_ResultDate"/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell"></span>
						</td>
					</tr>
					<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_Surgeon"/}}&nbsp;{{include tmpl="#tpx_ivf_oocytedenudation_Surgeon"/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_AsstSurgeon"/}}&nbsp;{{include tmpl="#tpx_ivf_oocytedenudation_AsstSurgeon"/}}</span>
						</td>
					</tr>
					<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_Anaesthetist"/}}&nbsp;{{include tmpl="#tpx_ivf_oocytedenudation_Anaesthetist"/}}</span>
						</td>
						<td style="width:50%">
						{{include tmpl="#tpc_ivf_oocytedenudation_AnaestheiaType"/}}&nbsp;{{include tmpl="#tpx_ivf_oocytedenudation_AnaestheiaType"/}}
						</td>
					</tr>
					<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_PrimaryEmbryologist"/}}&nbsp;{{include tmpl="#tpx_ivf_oocytedenudation_PrimaryEmbryologist"/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_SecondaryEmbryologist"/}}&nbsp;{{include tmpl="#tpx_ivf_oocytedenudation_SecondaryEmbryologist"/}}</span>
						</td>
					</tr>
				</tbody>
			</table>
			<table class="ew-table" style="width:100%;">
				<tbody>
					<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_OPUNotes"/}}&nbsp;{{include tmpl="#tpx_ivf_oocytedenudation_OPUNotes"/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_OocyteOrgin"/}}&nbsp;{{include tmpl="#tpx_ivf_oocytedenudation_OocyteOrgin"/}}</span>
						</td>
					</tr>
				</tbody>
			</table>
			<table class="ew-table" style="width:100%;">
				<tbody>
					<tr>
						<td>
							<span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_ExpFollicles"/}}&nbsp;{{include tmpl="#tpx_ivf_oocytedenudation_ExpFollicles"/}}</span>
						</td>
						<td>
							<span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_NoOfFolliclesRight"/}}&nbsp;{{include tmpl="#tpx_ivf_oocytedenudation_NoOfFolliclesRight"/}}</span>
						</td>
						<td>
							<span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_NoOfFolliclesLeft"/}}&nbsp;{{include tmpl="#tpx_ivf_oocytedenudation_NoOfFolliclesLeft"/}}</span>
						</td>
					</tr>
						<tr>
						<td>
							<span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_NoOfOocytes"/}}&nbsp;{{include tmpl="#tpx_ivf_oocytedenudation_NoOfOocytes"/}}</span>
						</td>
						<td>
							<span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_OocyteType"/}}&nbsp;{{include tmpl="#tpx_ivf_oocytedenudation_OocyteType"/}}</span>
						</td>
						<td>
						</td>
					</tr>
	</tbody>
</table>
			</div>
		</div>
	</div>
</div>
<div class="col-4">
<button type="button" class="btn btn-block btn-success" onclick="ShowDenudationDoneBy()">Record Oocyte Denudation</button>
</div>
<div class="row" id="DateOfDenudationShow">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Oocyte Denudation </h3>
			</div>
			<div class="card-body">  
			<table class="ew-table" style="width:100%;">
				<tbody>
					<tr>
						<td>
							<span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_DateOfDenudation"/}}&nbsp;{{include tmpl="#tpx_ivf_oocytedenudation_DateOfDenudation"/}}</span>
						</td>
						<td>
							<span class="ew-cell"></span>
						</td>
					</tr>
						<tr>
						<td>
							<span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_DenudationDoneBy"/}}&nbsp;{{include tmpl="#tpx_ivf_oocytedenudation_DenudationDoneBy"/}}</span>
						</td>
						<td>
							<span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_SecondaryDenudationDoneBy"/}}&nbsp;{{include tmpl="#tpx_ivf_oocytedenudation_SecondaryDenudationDoneBy"/}}</span>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
</div>
<div class="row" id="SelfOocyteShow">
<div class="row">
<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Self Oocyte  </h3>
			</div>
			<div class="card-body">
						<table class="ew-table" style="width:100%;">
				<tbody>
					<tr><td><span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_SelfOocytesMI"/}}&nbsp;{{include tmpl="#tpx_ivf_oocytedenudation_SelfOocytesMI"/}}</span></td>
					<tr><td><span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_SelfOocytesMII"/}}&nbsp;{{include tmpl="#tpx_ivf_oocytedenudation_SelfOocytesMII"/}}</span></td>
				</tbody>
			</table>
			</div>
		</div>
</div>
<div class="col-6">
</div>
</div>
</div>
<div class="row" id="OocyteDonateToPatientShow">
<div class="row">
<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Oocyte Donate To Patient 1 </h3>
			</div>
			<div class="card-body">
						<table class="ew-table" style="width:100%;">
				<tbody>
					<tr><td><span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_patient1"/}}&nbsp;{{include tmpl="#tpx_ivf_oocytedenudation_patient1"/}}</span></td></tr>
					<tr><td><span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_MIOocytesDonate1"/}}&nbsp;{{include tmpl="#tpx_ivf_oocytedenudation_MIOocytesDonate1"/}}</span></td>
					<tr><td><span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_OocytesDonate1"/}}&nbsp;{{include tmpl="#tpx_ivf_oocytedenudation_OocytesDonate1"/}}</span></td>
				</tbody>
			</table>
			</div>
		</div>
</div>
<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Oocyte Donate To Patient 2 </h3>
			</div>
			<div class="card-body">
						<table class="ew-table" style="width:100%;">
								<tbody>
					<tr><td><span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_patient2"/}}&nbsp;{{include tmpl="#tpx_ivf_oocytedenudation_patient2"/}}</span></td></tr>
					<tr><td><span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_MIOocytesDonate2"/}}&nbsp;{{include tmpl="#tpx_ivf_oocytedenudation_MIOocytesDonate2"/}}</span></td>
					<tr><td><span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_OocytesDonate2"/}}&nbsp;{{include tmpl="#tpx_ivf_oocytedenudation_OocytesDonate2"/}}</span></td>
				</tbody>
			</table>
			</div>
		</div>
</div>			
</div>				
<div class="row">
<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Oocyte Donate To Patient 3 </h3>
			</div>
			<div class="card-body">
						<table class="ew-table" style="width:100%;">
				<tbody>
					<tr><td><span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_patient3"/}}&nbsp;{{include tmpl="#tpx_ivf_oocytedenudation_patient3"/}}</span></td></tr>
					<tr><td><span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_MIOocytesDonate3"/}}&nbsp;{{include tmpl="#tpx_ivf_oocytedenudation_MIOocytesDonate3"/}}</span></td>
					<tr><td><span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_OocytesDonate3"/}}&nbsp;{{include tmpl="#tpx_ivf_oocytedenudation_OocytesDonate3"/}}</span></td>
				</tbody>
			</table>
			</div>
		</div>
</div>
<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Oocyte Donate To Patient 4 </h3>
			</div>
			<div class="card-body">
						<table class="ew-table" style="width:100%;">
								<tbody>
					<tr><td><span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_patient4"/}}&nbsp;{{include tmpl="#tpx_ivf_oocytedenudation_patient4"/}}</span></td></tr>
					<tr><td><span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_MIOocytesDonate4"/}}&nbsp;{{include tmpl="#tpx_ivf_oocytedenudation_MIOocytesDonate4"/}}</span></td>
					<tr><td><span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_OocytesDonate4"/}}&nbsp;{{include tmpl="#tpx_ivf_oocytedenudation_OocytesDonate4"/}}</span></td>
				</tbody>
			</table>
			</div>
		</div>
</div>			
</div>
</div>
		</br>
				<div id="addElement"></div>
	</br>		
	</div>
</div>
	<font size="4" >
<table class="table table-striped ew-table ew-export-table" style="width:40%;">
<tr>
<td><b>Oocyte No</b></td>
<td><b>Stage</b></td>
<td><b>Remarks</b></td>
</tr>
<?php
$cidviddd = $_GET["id"] ;
			$invoiceId = $Page->id->CurrentValue;
						 $patient_id = $Page->PatientId->CurrentValue;
					 $Reception = $Page->Reception->CurrentValue;
$fromdt = date('Y-m-d', strtotime('-1 months'));
$todate = date('Y-m-d', strtotime('+2 months'));
$Drid = $_GET['Drid'];
$dbhelper = &DbHelper();
$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_embryology_chart where DidNO='".$cidviddd."';";
$rs = $dbhelper->LoadRecordset($sql);
while (!$rs->EOF) {
	$row = &$rs->fields;
				$Services =  $row["Day0sino"];
				$ItemCode =  $row["Day0OocyteStage"];
				$Qty = 1; //$row["Services"];
				$Rate =  $row["amount"];
				$SubTotal =  $row["Remarks"];

				//$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td>'.$Qty.'</td><td>'.$Rate.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
				$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
	$rs->MoveNext();
}
echo $hhh;
?>		
</table> 
<br>
<div class="col-4">
<a href="view_ivf_oocytedenudation_embryology_chartlist.php?cmd=search&x_DidNO=<?php echo $cidviddd; ?>" type="button" class="btn btn-block btn-success btn-lg">Edit Oocyte Denudation</a>
</div>
<br>
	  </font>
</div>
</script>
<?php
	if (in_array("ivf_embryology_chart", explode(",", $ivf_oocytedenudation->getCurrentDetailTable())) && $ivf_embryology_chart->DetailEdit) {
?>
<?php if ($ivf_oocytedenudation->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("ivf_embryology_chart", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "ivf_embryology_chartgrid.php" ?>
<?php } ?>
<?php if (!$ivf_oocytedenudation_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $ivf_oocytedenudation_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $ivf_oocytedenudation_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($ivf_oocytedenudation->Rows) ?> };
ew.applyTemplate("tpd_ivf_oocytedenudationedit", "tpm_ivf_oocytedenudationedit", "ivf_oocytedenudationedit", "<?php echo $ivf_oocytedenudation->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.ivf_oocytedenudationedit_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$ivf_oocytedenudation_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");
function ShowDenudationDoneBy()
{
	 document.getElementById("DateOfDenudationShow").style.visibility = "visible";
	 	var tablecount =  document.getElementById("x_NoOfOocytes").value;
var htmldata = "";
 htmldata = htmldata + "<table id='capacitationTable' class='' align='left' border='0' cellpadding='1' cellspacing='1' style='width:60%'>";
 htmldata = htmldata + "<thead id='capacitationTableHead'><tr  style='background-color:#707B7C;color:white;' ><td id='PreCapacitation'>Oocyte No</td>";
 htmldata = htmldata + "<td id='PostCapacitation'>Stage</td><td id='MaxCapacitation'>Remarks</td></tr></thead><tbody>";
for (var i = 1; i <= tablecount; i++){
	htmldata = htmldata + "<tr><td><input type='text' id='OocyteNo"+i+"' name='OocyteNo"+i+"' value='"+i+"'></td>";
	htmldata = htmldata + "<td><select id='Stage"+i+"' name='Stage"+i+"'><option value=''></option><option value='MII'>MII</option><option value='MI'>MI</option><option value='GV'>GV</option><option value='Others'>Others</option></select></td>";
	htmldata = htmldata + "<td><input type='text' id='Remarks"+i+"' name='Remarks"+i+"'></td></tr>";
}
	 htmldata = htmldata + "</tbody></table>";
	var e = document.createElement('div');
	e.innerHTML = htmldata;
	var addelm =  document.getElementById("addElement");
	addelm.innerHTML = "";
	addelm.appendChild(e);
}
</script>
<?php include_once "footer.php" ?>
<?php
$ivf_oocytedenudation_edit->terminate();
?>