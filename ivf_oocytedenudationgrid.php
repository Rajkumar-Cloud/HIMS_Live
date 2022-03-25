<?php
namespace PHPMaker2019\HIMS;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($ivf_oocytedenudation_grid))
	$ivf_oocytedenudation_grid = new ivf_oocytedenudation_grid();

// Run the page
$ivf_oocytedenudation_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_oocytedenudation_grid->Page_Render();
?>
<?php if (!$ivf_oocytedenudation->isExport()) { ?>
<script>

// Form object
var fivf_oocytedenudationgrid = new ew.Form("fivf_oocytedenudationgrid", "grid");
fivf_oocytedenudationgrid.formKeyCountName = '<?php echo $ivf_oocytedenudation_grid->FormKeyCountName ?>';

// Validate form
fivf_oocytedenudationgrid.validate = function() {
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
		<?php if ($ivf_oocytedenudation_grid->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->id->caption(), $ivf_oocytedenudation->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_grid->RIDNo->Required) { ?>
			elm = this.getElements("x" + infix + "_RIDNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->RIDNo->caption(), $ivf_oocytedenudation->RIDNo->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RIDNo");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_oocytedenudation->RIDNo->errorMessage()) ?>");
		<?php if ($ivf_oocytedenudation_grid->Name->Required) { ?>
			elm = this.getElements("x" + infix + "_Name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->Name->caption(), $ivf_oocytedenudation->Name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_grid->ResultDate->Required) { ?>
			elm = this.getElements("x" + infix + "_ResultDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->ResultDate->caption(), $ivf_oocytedenudation->ResultDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ResultDate");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_oocytedenudation->ResultDate->errorMessage()) ?>");
		<?php if ($ivf_oocytedenudation_grid->Surgeon->Required) { ?>
			elm = this.getElements("x" + infix + "_Surgeon");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->Surgeon->caption(), $ivf_oocytedenudation->Surgeon->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_grid->AsstSurgeon->Required) { ?>
			elm = this.getElements("x" + infix + "_AsstSurgeon");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->AsstSurgeon->caption(), $ivf_oocytedenudation->AsstSurgeon->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_grid->Anaesthetist->Required) { ?>
			elm = this.getElements("x" + infix + "_Anaesthetist");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->Anaesthetist->caption(), $ivf_oocytedenudation->Anaesthetist->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_grid->AnaestheiaType->Required) { ?>
			elm = this.getElements("x" + infix + "_AnaestheiaType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->AnaestheiaType->caption(), $ivf_oocytedenudation->AnaestheiaType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_grid->PrimaryEmbryologist->Required) { ?>
			elm = this.getElements("x" + infix + "_PrimaryEmbryologist");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->PrimaryEmbryologist->caption(), $ivf_oocytedenudation->PrimaryEmbryologist->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_grid->SecondaryEmbryologist->Required) { ?>
			elm = this.getElements("x" + infix + "_SecondaryEmbryologist");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->SecondaryEmbryologist->caption(), $ivf_oocytedenudation->SecondaryEmbryologist->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_grid->NoOfFolliclesRight->Required) { ?>
			elm = this.getElements("x" + infix + "_NoOfFolliclesRight");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->NoOfFolliclesRight->caption(), $ivf_oocytedenudation->NoOfFolliclesRight->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_grid->NoOfFolliclesLeft->Required) { ?>
			elm = this.getElements("x" + infix + "_NoOfFolliclesLeft");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->NoOfFolliclesLeft->caption(), $ivf_oocytedenudation->NoOfFolliclesLeft->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_grid->NoOfOocytes->Required) { ?>
			elm = this.getElements("x" + infix + "_NoOfOocytes");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->NoOfOocytes->caption(), $ivf_oocytedenudation->NoOfOocytes->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_grid->RecordOocyteDenudation->Required) { ?>
			elm = this.getElements("x" + infix + "_RecordOocyteDenudation");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->RecordOocyteDenudation->caption(), $ivf_oocytedenudation->RecordOocyteDenudation->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_grid->DateOfDenudation->Required) { ?>
			elm = this.getElements("x" + infix + "_DateOfDenudation");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->DateOfDenudation->caption(), $ivf_oocytedenudation->DateOfDenudation->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DateOfDenudation");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_oocytedenudation->DateOfDenudation->errorMessage()) ?>");
		<?php if ($ivf_oocytedenudation_grid->DenudationDoneBy->Required) { ?>
			elm = this.getElements("x" + infix + "_DenudationDoneBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->DenudationDoneBy->caption(), $ivf_oocytedenudation->DenudationDoneBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_grid->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->status->caption(), $ivf_oocytedenudation->status->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_oocytedenudation->status->errorMessage()) ?>");
		<?php if ($ivf_oocytedenudation_grid->createdby->Required) { ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->createdby->caption(), $ivf_oocytedenudation->createdby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_grid->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->createddatetime->caption(), $ivf_oocytedenudation->createddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_grid->modifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->modifiedby->caption(), $ivf_oocytedenudation->modifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_grid->modifieddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->modifieddatetime->caption(), $ivf_oocytedenudation->modifieddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_grid->TidNo->Required) { ?>
			elm = this.getElements("x" + infix + "_TidNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->TidNo->caption(), $ivf_oocytedenudation->TidNo->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TidNo");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_oocytedenudation->TidNo->errorMessage()) ?>");
		<?php if ($ivf_oocytedenudation_grid->ExpFollicles->Required) { ?>
			elm = this.getElements("x" + infix + "_ExpFollicles");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->ExpFollicles->caption(), $ivf_oocytedenudation->ExpFollicles->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_grid->SecondaryDenudationDoneBy->Required) { ?>
			elm = this.getElements("x" + infix + "_SecondaryDenudationDoneBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->SecondaryDenudationDoneBy->caption(), $ivf_oocytedenudation->SecondaryDenudationDoneBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_grid->OocyteOrgin->Required) { ?>
			elm = this.getElements("x" + infix + "_OocyteOrgin");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->OocyteOrgin->caption(), $ivf_oocytedenudation->OocyteOrgin->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_grid->patient1->Required) { ?>
			elm = this.getElements("x" + infix + "_patient1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->patient1->caption(), $ivf_oocytedenudation->patient1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_grid->OocyteType->Required) { ?>
			elm = this.getElements("x" + infix + "_OocyteType[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->OocyteType->caption(), $ivf_oocytedenudation->OocyteType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_grid->MIOocytesDonate1->Required) { ?>
			elm = this.getElements("x" + infix + "_MIOocytesDonate1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->MIOocytesDonate1->caption(), $ivf_oocytedenudation->MIOocytesDonate1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_grid->MIOocytesDonate2->Required) { ?>
			elm = this.getElements("x" + infix + "_MIOocytesDonate2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->MIOocytesDonate2->caption(), $ivf_oocytedenudation->MIOocytesDonate2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_grid->SelfMI->Required) { ?>
			elm = this.getElements("x" + infix + "_SelfMI");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->SelfMI->caption(), $ivf_oocytedenudation->SelfMI->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_grid->SelfMII->Required) { ?>
			elm = this.getElements("x" + infix + "_SelfMII");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->SelfMII->caption(), $ivf_oocytedenudation->SelfMII->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_grid->patient3->Required) { ?>
			elm = this.getElements("x" + infix + "_patient3");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->patient3->caption(), $ivf_oocytedenudation->patient3->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_grid->patient4->Required) { ?>
			elm = this.getElements("x" + infix + "_patient4");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->patient4->caption(), $ivf_oocytedenudation->patient4->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_grid->OocytesDonate3->Required) { ?>
			elm = this.getElements("x" + infix + "_OocytesDonate3");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->OocytesDonate3->caption(), $ivf_oocytedenudation->OocytesDonate3->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_grid->OocytesDonate4->Required) { ?>
			elm = this.getElements("x" + infix + "_OocytesDonate4");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->OocytesDonate4->caption(), $ivf_oocytedenudation->OocytesDonate4->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_grid->MIOocytesDonate3->Required) { ?>
			elm = this.getElements("x" + infix + "_MIOocytesDonate3");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->MIOocytesDonate3->caption(), $ivf_oocytedenudation->MIOocytesDonate3->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_grid->MIOocytesDonate4->Required) { ?>
			elm = this.getElements("x" + infix + "_MIOocytesDonate4");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->MIOocytesDonate4->caption(), $ivf_oocytedenudation->MIOocytesDonate4->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_grid->SelfOocytesMI->Required) { ?>
			elm = this.getElements("x" + infix + "_SelfOocytesMI");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->SelfOocytesMI->caption(), $ivf_oocytedenudation->SelfOocytesMI->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_grid->SelfOocytesMII->Required) { ?>
			elm = this.getElements("x" + infix + "_SelfOocytesMII");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation->SelfOocytesMII->caption(), $ivf_oocytedenudation->SelfOocytesMII->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_oocytedenudation_grid->donor->Required) { ?>
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
		} // End Grid Add checking
	}
	return true;
}

// Check empty row
fivf_oocytedenudationgrid.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "RIDNo", false)) return false;
	if (ew.valueChanged(fobj, infix, "Name", false)) return false;
	if (ew.valueChanged(fobj, infix, "ResultDate", false)) return false;
	if (ew.valueChanged(fobj, infix, "Surgeon", false)) return false;
	if (ew.valueChanged(fobj, infix, "AsstSurgeon", false)) return false;
	if (ew.valueChanged(fobj, infix, "Anaesthetist", false)) return false;
	if (ew.valueChanged(fobj, infix, "AnaestheiaType", false)) return false;
	if (ew.valueChanged(fobj, infix, "PrimaryEmbryologist", false)) return false;
	if (ew.valueChanged(fobj, infix, "SecondaryEmbryologist", false)) return false;
	if (ew.valueChanged(fobj, infix, "NoOfFolliclesRight", false)) return false;
	if (ew.valueChanged(fobj, infix, "NoOfFolliclesLeft", false)) return false;
	if (ew.valueChanged(fobj, infix, "NoOfOocytes", false)) return false;
	if (ew.valueChanged(fobj, infix, "RecordOocyteDenudation", false)) return false;
	if (ew.valueChanged(fobj, infix, "DateOfDenudation", false)) return false;
	if (ew.valueChanged(fobj, infix, "DenudationDoneBy", false)) return false;
	if (ew.valueChanged(fobj, infix, "status", false)) return false;
	if (ew.valueChanged(fobj, infix, "TidNo", false)) return false;
	if (ew.valueChanged(fobj, infix, "ExpFollicles", false)) return false;
	if (ew.valueChanged(fobj, infix, "SecondaryDenudationDoneBy", false)) return false;
	if (ew.valueChanged(fobj, infix, "OocyteOrgin", false)) return false;
	if (ew.valueChanged(fobj, infix, "patient1", false)) return false;
	if (ew.valueChanged(fobj, infix, "OocyteType[]", false)) return false;
	if (ew.valueChanged(fobj, infix, "MIOocytesDonate1", false)) return false;
	if (ew.valueChanged(fobj, infix, "MIOocytesDonate2", false)) return false;
	if (ew.valueChanged(fobj, infix, "SelfMI", false)) return false;
	if (ew.valueChanged(fobj, infix, "SelfMII", false)) return false;
	if (ew.valueChanged(fobj, infix, "patient3", false)) return false;
	if (ew.valueChanged(fobj, infix, "patient4", false)) return false;
	if (ew.valueChanged(fobj, infix, "OocytesDonate3", false)) return false;
	if (ew.valueChanged(fobj, infix, "OocytesDonate4", false)) return false;
	if (ew.valueChanged(fobj, infix, "MIOocytesDonate3", false)) return false;
	if (ew.valueChanged(fobj, infix, "MIOocytesDonate4", false)) return false;
	if (ew.valueChanged(fobj, infix, "SelfOocytesMI", false)) return false;
	if (ew.valueChanged(fobj, infix, "SelfOocytesMII", false)) return false;
	if (ew.valueChanged(fobj, infix, "donor", false)) return false;
	return true;
}

// Form_CustomValidate event
fivf_oocytedenudationgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_oocytedenudationgrid.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fivf_oocytedenudationgrid.lists["x_OocyteOrgin"] = <?php echo $ivf_oocytedenudation_grid->OocyteOrgin->Lookup->toClientList() ?>;
fivf_oocytedenudationgrid.lists["x_OocyteOrgin"].options = <?php echo JsonEncode($ivf_oocytedenudation_grid->OocyteOrgin->options(FALSE, TRUE)) ?>;
fivf_oocytedenudationgrid.lists["x_patient1"] = <?php echo $ivf_oocytedenudation_grid->patient1->Lookup->toClientList() ?>;
fivf_oocytedenudationgrid.lists["x_patient1"].options = <?php echo JsonEncode($ivf_oocytedenudation_grid->patient1->lookupOptions()) ?>;
fivf_oocytedenudationgrid.lists["x_OocyteType[]"] = <?php echo $ivf_oocytedenudation_grid->OocyteType->Lookup->toClientList() ?>;
fivf_oocytedenudationgrid.lists["x_OocyteType[]"].options = <?php echo JsonEncode($ivf_oocytedenudation_grid->OocyteType->options(FALSE, TRUE)) ?>;
fivf_oocytedenudationgrid.lists["x_patient3"] = <?php echo $ivf_oocytedenudation_grid->patient3->Lookup->toClientList() ?>;
fivf_oocytedenudationgrid.lists["x_patient3"].options = <?php echo JsonEncode($ivf_oocytedenudation_grid->patient3->lookupOptions()) ?>;
fivf_oocytedenudationgrid.lists["x_patient4"] = <?php echo $ivf_oocytedenudation_grid->patient4->Lookup->toClientList() ?>;
fivf_oocytedenudationgrid.lists["x_patient4"].options = <?php echo JsonEncode($ivf_oocytedenudation_grid->patient4->lookupOptions()) ?>;

// Form object for search
</script>
<script src="phpjs/ewscrolltable.js"></script>
<?php } ?>
<?php
$ivf_oocytedenudation_grid->renderOtherOptions();
?>
<?php $ivf_oocytedenudation_grid->showPageHeader(); ?>
<?php
$ivf_oocytedenudation_grid->showMessage();
?>
<?php if ($ivf_oocytedenudation_grid->TotalRecs > 0 || $ivf_oocytedenudation->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($ivf_oocytedenudation_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf_oocytedenudation">
<?php if ($ivf_oocytedenudation_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $ivf_oocytedenudation_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fivf_oocytedenudationgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_ivf_oocytedenudation" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table id="tbl_ivf_oocytedenudationgrid" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$ivf_oocytedenudation_grid->RowType = ROWTYPE_HEADER;

// Render list options
$ivf_oocytedenudation_grid->renderListOptions();

// Render list options (header, left)
$ivf_oocytedenudation_grid->ListOptions->render("header", "left");
?>
<?php if ($ivf_oocytedenudation->id->Visible) { // id ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->id) == "") { ?>
		<th data-name="id" class="<?php echo $ivf_oocytedenudation->id->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_id" class="ivf_oocytedenudation_id"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $ivf_oocytedenudation->id->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_id" class="ivf_oocytedenudation_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->RIDNo->Visible) { // RIDNo ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->RIDNo) == "") { ?>
		<th data-name="RIDNo" class="<?php echo $ivf_oocytedenudation->RIDNo->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_RIDNo" class="ivf_oocytedenudation_RIDNo"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->RIDNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RIDNo" class="<?php echo $ivf_oocytedenudation->RIDNo->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_RIDNo" class="ivf_oocytedenudation_RIDNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->RIDNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->RIDNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->RIDNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->Name->Visible) { // Name ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->Name) == "") { ?>
		<th data-name="Name" class="<?php echo $ivf_oocytedenudation->Name->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_Name" class="ivf_oocytedenudation_Name"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Name" class="<?php echo $ivf_oocytedenudation->Name->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_Name" class="ivf_oocytedenudation_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->Name->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->Name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->Name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->ResultDate->Visible) { // ResultDate ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->ResultDate) == "") { ?>
		<th data-name="ResultDate" class="<?php echo $ivf_oocytedenudation->ResultDate->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_ResultDate" class="ivf_oocytedenudation_ResultDate"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->ResultDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ResultDate" class="<?php echo $ivf_oocytedenudation->ResultDate->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_ResultDate" class="ivf_oocytedenudation_ResultDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->ResultDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->ResultDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->ResultDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->Surgeon->Visible) { // Surgeon ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->Surgeon) == "") { ?>
		<th data-name="Surgeon" class="<?php echo $ivf_oocytedenudation->Surgeon->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_Surgeon" class="ivf_oocytedenudation_Surgeon"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->Surgeon->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Surgeon" class="<?php echo $ivf_oocytedenudation->Surgeon->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_Surgeon" class="ivf_oocytedenudation_Surgeon">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->Surgeon->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->Surgeon->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->Surgeon->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->AsstSurgeon->Visible) { // AsstSurgeon ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->AsstSurgeon) == "") { ?>
		<th data-name="AsstSurgeon" class="<?php echo $ivf_oocytedenudation->AsstSurgeon->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_AsstSurgeon" class="ivf_oocytedenudation_AsstSurgeon"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->AsstSurgeon->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AsstSurgeon" class="<?php echo $ivf_oocytedenudation->AsstSurgeon->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_AsstSurgeon" class="ivf_oocytedenudation_AsstSurgeon">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->AsstSurgeon->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->AsstSurgeon->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->AsstSurgeon->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->Anaesthetist->Visible) { // Anaesthetist ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->Anaesthetist) == "") { ?>
		<th data-name="Anaesthetist" class="<?php echo $ivf_oocytedenudation->Anaesthetist->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_Anaesthetist" class="ivf_oocytedenudation_Anaesthetist"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->Anaesthetist->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Anaesthetist" class="<?php echo $ivf_oocytedenudation->Anaesthetist->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_Anaesthetist" class="ivf_oocytedenudation_Anaesthetist">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->Anaesthetist->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->Anaesthetist->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->Anaesthetist->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->AnaestheiaType->Visible) { // AnaestheiaType ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->AnaestheiaType) == "") { ?>
		<th data-name="AnaestheiaType" class="<?php echo $ivf_oocytedenudation->AnaestheiaType->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_AnaestheiaType" class="ivf_oocytedenudation_AnaestheiaType"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->AnaestheiaType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AnaestheiaType" class="<?php echo $ivf_oocytedenudation->AnaestheiaType->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_AnaestheiaType" class="ivf_oocytedenudation_AnaestheiaType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->AnaestheiaType->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->AnaestheiaType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->AnaestheiaType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->PrimaryEmbryologist->Visible) { // PrimaryEmbryologist ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->PrimaryEmbryologist) == "") { ?>
		<th data-name="PrimaryEmbryologist" class="<?php echo $ivf_oocytedenudation->PrimaryEmbryologist->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_PrimaryEmbryologist" class="ivf_oocytedenudation_PrimaryEmbryologist"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->PrimaryEmbryologist->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrimaryEmbryologist" class="<?php echo $ivf_oocytedenudation->PrimaryEmbryologist->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_PrimaryEmbryologist" class="ivf_oocytedenudation_PrimaryEmbryologist">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->PrimaryEmbryologist->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->PrimaryEmbryologist->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->PrimaryEmbryologist->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->SecondaryEmbryologist->Visible) { // SecondaryEmbryologist ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->SecondaryEmbryologist) == "") { ?>
		<th data-name="SecondaryEmbryologist" class="<?php echo $ivf_oocytedenudation->SecondaryEmbryologist->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_SecondaryEmbryologist" class="ivf_oocytedenudation_SecondaryEmbryologist"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->SecondaryEmbryologist->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SecondaryEmbryologist" class="<?php echo $ivf_oocytedenudation->SecondaryEmbryologist->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_SecondaryEmbryologist" class="ivf_oocytedenudation_SecondaryEmbryologist">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->SecondaryEmbryologist->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->SecondaryEmbryologist->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->SecondaryEmbryologist->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->NoOfFolliclesRight->Visible) { // NoOfFolliclesRight ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->NoOfFolliclesRight) == "") { ?>
		<th data-name="NoOfFolliclesRight" class="<?php echo $ivf_oocytedenudation->NoOfFolliclesRight->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_NoOfFolliclesRight" class="ivf_oocytedenudation_NoOfFolliclesRight"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->NoOfFolliclesRight->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoOfFolliclesRight" class="<?php echo $ivf_oocytedenudation->NoOfFolliclesRight->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_NoOfFolliclesRight" class="ivf_oocytedenudation_NoOfFolliclesRight">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->NoOfFolliclesRight->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->NoOfFolliclesRight->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->NoOfFolliclesRight->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->NoOfFolliclesLeft->Visible) { // NoOfFolliclesLeft ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->NoOfFolliclesLeft) == "") { ?>
		<th data-name="NoOfFolliclesLeft" class="<?php echo $ivf_oocytedenudation->NoOfFolliclesLeft->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_NoOfFolliclesLeft" class="ivf_oocytedenudation_NoOfFolliclesLeft"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->NoOfFolliclesLeft->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoOfFolliclesLeft" class="<?php echo $ivf_oocytedenudation->NoOfFolliclesLeft->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_NoOfFolliclesLeft" class="ivf_oocytedenudation_NoOfFolliclesLeft">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->NoOfFolliclesLeft->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->NoOfFolliclesLeft->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->NoOfFolliclesLeft->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->NoOfOocytes->Visible) { // NoOfOocytes ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->NoOfOocytes) == "") { ?>
		<th data-name="NoOfOocytes" class="<?php echo $ivf_oocytedenudation->NoOfOocytes->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_NoOfOocytes" class="ivf_oocytedenudation_NoOfOocytes"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->NoOfOocytes->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoOfOocytes" class="<?php echo $ivf_oocytedenudation->NoOfOocytes->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_NoOfOocytes" class="ivf_oocytedenudation_NoOfOocytes">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->NoOfOocytes->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->NoOfOocytes->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->NoOfOocytes->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->RecordOocyteDenudation->Visible) { // RecordOocyteDenudation ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->RecordOocyteDenudation) == "") { ?>
		<th data-name="RecordOocyteDenudation" class="<?php echo $ivf_oocytedenudation->RecordOocyteDenudation->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_RecordOocyteDenudation" class="ivf_oocytedenudation_RecordOocyteDenudation"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->RecordOocyteDenudation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RecordOocyteDenudation" class="<?php echo $ivf_oocytedenudation->RecordOocyteDenudation->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_RecordOocyteDenudation" class="ivf_oocytedenudation_RecordOocyteDenudation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->RecordOocyteDenudation->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->RecordOocyteDenudation->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->RecordOocyteDenudation->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->DateOfDenudation->Visible) { // DateOfDenudation ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->DateOfDenudation) == "") { ?>
		<th data-name="DateOfDenudation" class="<?php echo $ivf_oocytedenudation->DateOfDenudation->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_DateOfDenudation" class="ivf_oocytedenudation_DateOfDenudation"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->DateOfDenudation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DateOfDenudation" class="<?php echo $ivf_oocytedenudation->DateOfDenudation->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_DateOfDenudation" class="ivf_oocytedenudation_DateOfDenudation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->DateOfDenudation->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->DateOfDenudation->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->DateOfDenudation->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->DenudationDoneBy->Visible) { // DenudationDoneBy ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->DenudationDoneBy) == "") { ?>
		<th data-name="DenudationDoneBy" class="<?php echo $ivf_oocytedenudation->DenudationDoneBy->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_DenudationDoneBy" class="ivf_oocytedenudation_DenudationDoneBy"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->DenudationDoneBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DenudationDoneBy" class="<?php echo $ivf_oocytedenudation->DenudationDoneBy->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_DenudationDoneBy" class="ivf_oocytedenudation_DenudationDoneBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->DenudationDoneBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->DenudationDoneBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->DenudationDoneBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->status->Visible) { // status ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->status) == "") { ?>
		<th data-name="status" class="<?php echo $ivf_oocytedenudation->status->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_status" class="ivf_oocytedenudation_status"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $ivf_oocytedenudation->status->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_status" class="ivf_oocytedenudation_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->createdby->Visible) { // createdby ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $ivf_oocytedenudation->createdby->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_createdby" class="ivf_oocytedenudation_createdby"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $ivf_oocytedenudation->createdby->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_createdby" class="ivf_oocytedenudation_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->createddatetime->Visible) { // createddatetime ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $ivf_oocytedenudation->createddatetime->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_createddatetime" class="ivf_oocytedenudation_createddatetime"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $ivf_oocytedenudation->createddatetime->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_createddatetime" class="ivf_oocytedenudation_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->modifiedby->Visible) { // modifiedby ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $ivf_oocytedenudation->modifiedby->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_modifiedby" class="ivf_oocytedenudation_modifiedby"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $ivf_oocytedenudation->modifiedby->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_modifiedby" class="ivf_oocytedenudation_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $ivf_oocytedenudation->modifieddatetime->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_modifieddatetime" class="ivf_oocytedenudation_modifieddatetime"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $ivf_oocytedenudation->modifieddatetime->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_modifieddatetime" class="ivf_oocytedenudation_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->TidNo->Visible) { // TidNo ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->TidNo) == "") { ?>
		<th data-name="TidNo" class="<?php echo $ivf_oocytedenudation->TidNo->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_TidNo" class="ivf_oocytedenudation_TidNo"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->TidNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TidNo" class="<?php echo $ivf_oocytedenudation->TidNo->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_TidNo" class="ivf_oocytedenudation_TidNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->TidNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->TidNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->TidNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->ExpFollicles->Visible) { // ExpFollicles ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->ExpFollicles) == "") { ?>
		<th data-name="ExpFollicles" class="<?php echo $ivf_oocytedenudation->ExpFollicles->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_ExpFollicles" class="ivf_oocytedenudation_ExpFollicles"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->ExpFollicles->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ExpFollicles" class="<?php echo $ivf_oocytedenudation->ExpFollicles->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_ExpFollicles" class="ivf_oocytedenudation_ExpFollicles">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->ExpFollicles->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->ExpFollicles->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->ExpFollicles->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->SecondaryDenudationDoneBy->Visible) { // SecondaryDenudationDoneBy ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->SecondaryDenudationDoneBy) == "") { ?>
		<th data-name="SecondaryDenudationDoneBy" class="<?php echo $ivf_oocytedenudation->SecondaryDenudationDoneBy->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_SecondaryDenudationDoneBy" class="ivf_oocytedenudation_SecondaryDenudationDoneBy"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->SecondaryDenudationDoneBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SecondaryDenudationDoneBy" class="<?php echo $ivf_oocytedenudation->SecondaryDenudationDoneBy->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_SecondaryDenudationDoneBy" class="ivf_oocytedenudation_SecondaryDenudationDoneBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->SecondaryDenudationDoneBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->SecondaryDenudationDoneBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->SecondaryDenudationDoneBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->OocyteOrgin->Visible) { // OocyteOrgin ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->OocyteOrgin) == "") { ?>
		<th data-name="OocyteOrgin" class="<?php echo $ivf_oocytedenudation->OocyteOrgin->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_OocyteOrgin" class="ivf_oocytedenudation_OocyteOrgin"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->OocyteOrgin->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OocyteOrgin" class="<?php echo $ivf_oocytedenudation->OocyteOrgin->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_OocyteOrgin" class="ivf_oocytedenudation_OocyteOrgin">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->OocyteOrgin->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->OocyteOrgin->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->OocyteOrgin->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->patient1->Visible) { // patient1 ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->patient1) == "") { ?>
		<th data-name="patient1" class="<?php echo $ivf_oocytedenudation->patient1->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_patient1" class="ivf_oocytedenudation_patient1"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->patient1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patient1" class="<?php echo $ivf_oocytedenudation->patient1->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_patient1" class="ivf_oocytedenudation_patient1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->patient1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->patient1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->patient1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->OocyteType->Visible) { // OocyteType ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->OocyteType) == "") { ?>
		<th data-name="OocyteType" class="<?php echo $ivf_oocytedenudation->OocyteType->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_OocyteType" class="ivf_oocytedenudation_OocyteType"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->OocyteType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OocyteType" class="<?php echo $ivf_oocytedenudation->OocyteType->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_OocyteType" class="ivf_oocytedenudation_OocyteType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->OocyteType->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->OocyteType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->OocyteType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->MIOocytesDonate1->Visible) { // MIOocytesDonate1 ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->MIOocytesDonate1) == "") { ?>
		<th data-name="MIOocytesDonate1" class="<?php echo $ivf_oocytedenudation->MIOocytesDonate1->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_MIOocytesDonate1" class="ivf_oocytedenudation_MIOocytesDonate1"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->MIOocytesDonate1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MIOocytesDonate1" class="<?php echo $ivf_oocytedenudation->MIOocytesDonate1->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_MIOocytesDonate1" class="ivf_oocytedenudation_MIOocytesDonate1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->MIOocytesDonate1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->MIOocytesDonate1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->MIOocytesDonate1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->MIOocytesDonate2->Visible) { // MIOocytesDonate2 ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->MIOocytesDonate2) == "") { ?>
		<th data-name="MIOocytesDonate2" class="<?php echo $ivf_oocytedenudation->MIOocytesDonate2->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_MIOocytesDonate2" class="ivf_oocytedenudation_MIOocytesDonate2"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->MIOocytesDonate2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MIOocytesDonate2" class="<?php echo $ivf_oocytedenudation->MIOocytesDonate2->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_MIOocytesDonate2" class="ivf_oocytedenudation_MIOocytesDonate2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->MIOocytesDonate2->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->MIOocytesDonate2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->MIOocytesDonate2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->SelfMI->Visible) { // SelfMI ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->SelfMI) == "") { ?>
		<th data-name="SelfMI" class="<?php echo $ivf_oocytedenudation->SelfMI->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_SelfMI" class="ivf_oocytedenudation_SelfMI"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->SelfMI->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SelfMI" class="<?php echo $ivf_oocytedenudation->SelfMI->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_SelfMI" class="ivf_oocytedenudation_SelfMI">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->SelfMI->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->SelfMI->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->SelfMI->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->SelfMII->Visible) { // SelfMII ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->SelfMII) == "") { ?>
		<th data-name="SelfMII" class="<?php echo $ivf_oocytedenudation->SelfMII->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_SelfMII" class="ivf_oocytedenudation_SelfMII"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->SelfMII->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SelfMII" class="<?php echo $ivf_oocytedenudation->SelfMII->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_SelfMII" class="ivf_oocytedenudation_SelfMII">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->SelfMII->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->SelfMII->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->SelfMII->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->patient3->Visible) { // patient3 ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->patient3) == "") { ?>
		<th data-name="patient3" class="<?php echo $ivf_oocytedenudation->patient3->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_patient3" class="ivf_oocytedenudation_patient3"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->patient3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patient3" class="<?php echo $ivf_oocytedenudation->patient3->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_patient3" class="ivf_oocytedenudation_patient3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->patient3->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->patient3->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->patient3->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->patient4->Visible) { // patient4 ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->patient4) == "") { ?>
		<th data-name="patient4" class="<?php echo $ivf_oocytedenudation->patient4->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_patient4" class="ivf_oocytedenudation_patient4"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->patient4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patient4" class="<?php echo $ivf_oocytedenudation->patient4->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_patient4" class="ivf_oocytedenudation_patient4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->patient4->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->patient4->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->patient4->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->OocytesDonate3->Visible) { // OocytesDonate3 ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->OocytesDonate3) == "") { ?>
		<th data-name="OocytesDonate3" class="<?php echo $ivf_oocytedenudation->OocytesDonate3->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_OocytesDonate3" class="ivf_oocytedenudation_OocytesDonate3"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->OocytesDonate3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OocytesDonate3" class="<?php echo $ivf_oocytedenudation->OocytesDonate3->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_OocytesDonate3" class="ivf_oocytedenudation_OocytesDonate3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->OocytesDonate3->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->OocytesDonate3->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->OocytesDonate3->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->OocytesDonate4->Visible) { // OocytesDonate4 ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->OocytesDonate4) == "") { ?>
		<th data-name="OocytesDonate4" class="<?php echo $ivf_oocytedenudation->OocytesDonate4->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_OocytesDonate4" class="ivf_oocytedenudation_OocytesDonate4"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->OocytesDonate4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OocytesDonate4" class="<?php echo $ivf_oocytedenudation->OocytesDonate4->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_OocytesDonate4" class="ivf_oocytedenudation_OocytesDonate4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->OocytesDonate4->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->OocytesDonate4->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->OocytesDonate4->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->MIOocytesDonate3->Visible) { // MIOocytesDonate3 ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->MIOocytesDonate3) == "") { ?>
		<th data-name="MIOocytesDonate3" class="<?php echo $ivf_oocytedenudation->MIOocytesDonate3->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_MIOocytesDonate3" class="ivf_oocytedenudation_MIOocytesDonate3"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->MIOocytesDonate3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MIOocytesDonate3" class="<?php echo $ivf_oocytedenudation->MIOocytesDonate3->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_MIOocytesDonate3" class="ivf_oocytedenudation_MIOocytesDonate3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->MIOocytesDonate3->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->MIOocytesDonate3->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->MIOocytesDonate3->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->MIOocytesDonate4->Visible) { // MIOocytesDonate4 ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->MIOocytesDonate4) == "") { ?>
		<th data-name="MIOocytesDonate4" class="<?php echo $ivf_oocytedenudation->MIOocytesDonate4->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_MIOocytesDonate4" class="ivf_oocytedenudation_MIOocytesDonate4"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->MIOocytesDonate4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MIOocytesDonate4" class="<?php echo $ivf_oocytedenudation->MIOocytesDonate4->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_MIOocytesDonate4" class="ivf_oocytedenudation_MIOocytesDonate4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->MIOocytesDonate4->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->MIOocytesDonate4->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->MIOocytesDonate4->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->SelfOocytesMI->Visible) { // SelfOocytesMI ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->SelfOocytesMI) == "") { ?>
		<th data-name="SelfOocytesMI" class="<?php echo $ivf_oocytedenudation->SelfOocytesMI->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_SelfOocytesMI" class="ivf_oocytedenudation_SelfOocytesMI"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->SelfOocytesMI->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SelfOocytesMI" class="<?php echo $ivf_oocytedenudation->SelfOocytesMI->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_SelfOocytesMI" class="ivf_oocytedenudation_SelfOocytesMI">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->SelfOocytesMI->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->SelfOocytesMI->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->SelfOocytesMI->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->SelfOocytesMII->Visible) { // SelfOocytesMII ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->SelfOocytesMII) == "") { ?>
		<th data-name="SelfOocytesMII" class="<?php echo $ivf_oocytedenudation->SelfOocytesMII->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_SelfOocytesMII" class="ivf_oocytedenudation_SelfOocytesMII"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->SelfOocytesMII->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SelfOocytesMII" class="<?php echo $ivf_oocytedenudation->SelfOocytesMII->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_SelfOocytesMII" class="ivf_oocytedenudation_SelfOocytesMII">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->SelfOocytesMII->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->SelfOocytesMII->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->SelfOocytesMII->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->donor->Visible) { // donor ?>
	<?php if ($ivf_oocytedenudation->sortUrl($ivf_oocytedenudation->donor) == "") { ?>
		<th data-name="donor" class="<?php echo $ivf_oocytedenudation->donor->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_donor" class="ivf_oocytedenudation_donor"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->donor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="donor" class="<?php echo $ivf_oocytedenudation->donor->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_donor" class="ivf_oocytedenudation_donor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation->donor->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation->donor->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation->donor->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$ivf_oocytedenudation_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$ivf_oocytedenudation_grid->StartRec = 1;
$ivf_oocytedenudation_grid->StopRec = $ivf_oocytedenudation_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($CurrentForm && $ivf_oocytedenudation_grid->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($ivf_oocytedenudation_grid->FormKeyCountName) && ($ivf_oocytedenudation->isGridAdd() || $ivf_oocytedenudation->isGridEdit() || $ivf_oocytedenudation->isConfirm())) {
		$ivf_oocytedenudation_grid->KeyCount = $CurrentForm->getValue($ivf_oocytedenudation_grid->FormKeyCountName);
		$ivf_oocytedenudation_grid->StopRec = $ivf_oocytedenudation_grid->StartRec + $ivf_oocytedenudation_grid->KeyCount - 1;
	}
}
$ivf_oocytedenudation_grid->RecCnt = $ivf_oocytedenudation_grid->StartRec - 1;
if ($ivf_oocytedenudation_grid->Recordset && !$ivf_oocytedenudation_grid->Recordset->EOF) {
	$ivf_oocytedenudation_grid->Recordset->moveFirst();
	$selectLimit = $ivf_oocytedenudation_grid->UseSelectLimit;
	if (!$selectLimit && $ivf_oocytedenudation_grid->StartRec > 1)
		$ivf_oocytedenudation_grid->Recordset->move($ivf_oocytedenudation_grid->StartRec - 1);
} elseif (!$ivf_oocytedenudation->AllowAddDeleteRow && $ivf_oocytedenudation_grid->StopRec == 0) {
	$ivf_oocytedenudation_grid->StopRec = $ivf_oocytedenudation->GridAddRowCount;
}

// Initialize aggregate
$ivf_oocytedenudation->RowType = ROWTYPE_AGGREGATEINIT;
$ivf_oocytedenudation->resetAttributes();
$ivf_oocytedenudation_grid->renderRow();
if ($ivf_oocytedenudation->isGridAdd())
	$ivf_oocytedenudation_grid->RowIndex = 0;
if ($ivf_oocytedenudation->isGridEdit())
	$ivf_oocytedenudation_grid->RowIndex = 0;
while ($ivf_oocytedenudation_grid->RecCnt < $ivf_oocytedenudation_grid->StopRec) {
	$ivf_oocytedenudation_grid->RecCnt++;
	if ($ivf_oocytedenudation_grid->RecCnt >= $ivf_oocytedenudation_grid->StartRec) {
		$ivf_oocytedenudation_grid->RowCnt++;
		if ($ivf_oocytedenudation->isGridAdd() || $ivf_oocytedenudation->isGridEdit() || $ivf_oocytedenudation->isConfirm()) {
			$ivf_oocytedenudation_grid->RowIndex++;
			$CurrentForm->Index = $ivf_oocytedenudation_grid->RowIndex;
			if ($CurrentForm->hasValue($ivf_oocytedenudation_grid->FormActionName) && $ivf_oocytedenudation_grid->EventCancelled)
				$ivf_oocytedenudation_grid->RowAction = strval($CurrentForm->getValue($ivf_oocytedenudation_grid->FormActionName));
			elseif ($ivf_oocytedenudation->isGridAdd())
				$ivf_oocytedenudation_grid->RowAction = "insert";
			else
				$ivf_oocytedenudation_grid->RowAction = "";
		}

		// Set up key count
		$ivf_oocytedenudation_grid->KeyCount = $ivf_oocytedenudation_grid->RowIndex;

		// Init row class and style
		$ivf_oocytedenudation->resetAttributes();
		$ivf_oocytedenudation->CssClass = "";
		if ($ivf_oocytedenudation->isGridAdd()) {
			if ($ivf_oocytedenudation->CurrentMode == "copy") {
				$ivf_oocytedenudation_grid->loadRowValues($ivf_oocytedenudation_grid->Recordset); // Load row values
				$ivf_oocytedenudation_grid->setRecordKey($ivf_oocytedenudation_grid->RowOldKey, $ivf_oocytedenudation_grid->Recordset); // Set old record key
			} else {
				$ivf_oocytedenudation_grid->loadRowValues(); // Load default values
				$ivf_oocytedenudation_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$ivf_oocytedenudation_grid->loadRowValues($ivf_oocytedenudation_grid->Recordset); // Load row values
		}
		$ivf_oocytedenudation->RowType = ROWTYPE_VIEW; // Render view
		if ($ivf_oocytedenudation->isGridAdd()) // Grid add
			$ivf_oocytedenudation->RowType = ROWTYPE_ADD; // Render add
		if ($ivf_oocytedenudation->isGridAdd() && $ivf_oocytedenudation->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$ivf_oocytedenudation_grid->restoreCurrentRowFormValues($ivf_oocytedenudation_grid->RowIndex); // Restore form values
		if ($ivf_oocytedenudation->isGridEdit()) { // Grid edit
			if ($ivf_oocytedenudation->EventCancelled)
				$ivf_oocytedenudation_grid->restoreCurrentRowFormValues($ivf_oocytedenudation_grid->RowIndex); // Restore form values
			if ($ivf_oocytedenudation_grid->RowAction == "insert")
				$ivf_oocytedenudation->RowType = ROWTYPE_ADD; // Render add
			else
				$ivf_oocytedenudation->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($ivf_oocytedenudation->isGridEdit() && ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT || $ivf_oocytedenudation->RowType == ROWTYPE_ADD) && $ivf_oocytedenudation->EventCancelled) // Update failed
			$ivf_oocytedenudation_grid->restoreCurrentRowFormValues($ivf_oocytedenudation_grid->RowIndex); // Restore form values
		if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) // Edit row
			$ivf_oocytedenudation_grid->EditRowCnt++;
		if ($ivf_oocytedenudation->isConfirm()) // Confirm row
			$ivf_oocytedenudation_grid->restoreCurrentRowFormValues($ivf_oocytedenudation_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$ivf_oocytedenudation->RowAttrs = array_merge($ivf_oocytedenudation->RowAttrs, array('data-rowindex'=>$ivf_oocytedenudation_grid->RowCnt, 'id'=>'r' . $ivf_oocytedenudation_grid->RowCnt . '_ivf_oocytedenudation', 'data-rowtype'=>$ivf_oocytedenudation->RowType));

		// Render row
		$ivf_oocytedenudation_grid->renderRow();

		// Render list options
		$ivf_oocytedenudation_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($ivf_oocytedenudation_grid->RowAction <> "delete" && $ivf_oocytedenudation_grid->RowAction <> "insertdelete" && !($ivf_oocytedenudation_grid->RowAction == "insert" && $ivf_oocytedenudation->isConfirm() && $ivf_oocytedenudation_grid->emptyRow())) {
?>
	<tr<?php echo $ivf_oocytedenudation->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_oocytedenudation_grid->ListOptions->render("body", "left", $ivf_oocytedenudation_grid->RowCnt);
?>
	<?php if ($ivf_oocytedenudation->id->Visible) { // id ?>
		<td data-name="id"<?php echo $ivf_oocytedenudation->id->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_id" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_id" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_oocytedenudation->id->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_id" class="form-group ivf_oocytedenudation_id">
<span<?php echo $ivf_oocytedenudation->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_oocytedenudation->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_id" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_id" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_oocytedenudation->id->CurrentValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_id" class="ivf_oocytedenudation_id">
<span<?php echo $ivf_oocytedenudation->id->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->id->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_id" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_id" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_oocytedenudation->id->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_id" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_id" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_oocytedenudation->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_id" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_id" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_oocytedenudation->id->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_id" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_id" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_oocytedenudation->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->RIDNo->Visible) { // RIDNo ?>
		<td data-name="RIDNo"<?php echo $ivf_oocytedenudation->RIDNo->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($ivf_oocytedenudation->RIDNo->getSessionValue() <> "") { ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_RIDNo" class="form-group ivf_oocytedenudation_RIDNo">
<span<?php echo $ivf_oocytedenudation->RIDNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_oocytedenudation->RIDNo->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RIDNo" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_oocytedenudation->RIDNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_RIDNo" class="form-group ivf_oocytedenudation_RIDNo">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_RIDNo" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RIDNo" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RIDNo" size="30" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->RIDNo->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->RIDNo->EditValue ?>"<?php echo $ivf_oocytedenudation->RIDNo->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_RIDNo" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RIDNo" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_oocytedenudation->RIDNo->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($ivf_oocytedenudation->RIDNo->getSessionValue() <> "") { ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_RIDNo" class="form-group ivf_oocytedenudation_RIDNo">
<span<?php echo $ivf_oocytedenudation->RIDNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_oocytedenudation->RIDNo->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RIDNo" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_oocytedenudation->RIDNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_RIDNo" class="form-group ivf_oocytedenudation_RIDNo">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_RIDNo" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RIDNo" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RIDNo" size="30" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->RIDNo->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->RIDNo->EditValue ?>"<?php echo $ivf_oocytedenudation->RIDNo->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_RIDNo" class="ivf_oocytedenudation_RIDNo">
<span<?php echo $ivf_oocytedenudation->RIDNo->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->RIDNo->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_RIDNo" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RIDNo" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_oocytedenudation->RIDNo->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_RIDNo" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RIDNo" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_oocytedenudation->RIDNo->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_RIDNo" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RIDNo" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_oocytedenudation->RIDNo->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_RIDNo" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RIDNo" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_oocytedenudation->RIDNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->Name->Visible) { // Name ?>
		<td data-name="Name"<?php echo $ivf_oocytedenudation->Name->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($ivf_oocytedenudation->Name->getSessionValue() <> "") { ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_Name" class="form-group ivf_oocytedenudation_Name">
<span<?php echo $ivf_oocytedenudation->Name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_oocytedenudation->Name->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Name" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_oocytedenudation->Name->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_Name" class="form-group ivf_oocytedenudation_Name">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_Name" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Name" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->Name->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->Name->EditValue ?>"<?php echo $ivf_oocytedenudation->Name->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_Name" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Name" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_oocytedenudation->Name->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($ivf_oocytedenudation->Name->getSessionValue() <> "") { ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_Name" class="form-group ivf_oocytedenudation_Name">
<span<?php echo $ivf_oocytedenudation->Name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_oocytedenudation->Name->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Name" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_oocytedenudation->Name->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_Name" class="form-group ivf_oocytedenudation_Name">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_Name" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Name" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->Name->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->Name->EditValue ?>"<?php echo $ivf_oocytedenudation->Name->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_Name" class="ivf_oocytedenudation_Name">
<span<?php echo $ivf_oocytedenudation->Name->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->Name->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_Name" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Name" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_oocytedenudation->Name->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_Name" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Name" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_oocytedenudation->Name->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_Name" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Name" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_oocytedenudation->Name->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_Name" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Name" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_oocytedenudation->Name->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->ResultDate->Visible) { // ResultDate ?>
		<td data-name="ResultDate"<?php echo $ivf_oocytedenudation->ResultDate->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_ResultDate" class="form-group ivf_oocytedenudation_ResultDate">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_ResultDate" data-format="11" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ResultDate" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ResultDate" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->ResultDate->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->ResultDate->EditValue ?>"<?php echo $ivf_oocytedenudation->ResultDate->editAttributes() ?>>
<?php if (!$ivf_oocytedenudation->ResultDate->ReadOnly && !$ivf_oocytedenudation->ResultDate->Disabled && !isset($ivf_oocytedenudation->ResultDate->EditAttrs["readonly"]) && !isset($ivf_oocytedenudation->ResultDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_oocytedenudationgrid", "x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_ResultDate" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ResultDate" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($ivf_oocytedenudation->ResultDate->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_ResultDate" class="form-group ivf_oocytedenudation_ResultDate">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_ResultDate" data-format="11" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ResultDate" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ResultDate" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->ResultDate->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->ResultDate->EditValue ?>"<?php echo $ivf_oocytedenudation->ResultDate->editAttributes() ?>>
<?php if (!$ivf_oocytedenudation->ResultDate->ReadOnly && !$ivf_oocytedenudation->ResultDate->Disabled && !isset($ivf_oocytedenudation->ResultDate->EditAttrs["readonly"]) && !isset($ivf_oocytedenudation->ResultDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_oocytedenudationgrid", "x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_ResultDate" class="ivf_oocytedenudation_ResultDate">
<span<?php echo $ivf_oocytedenudation->ResultDate->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->ResultDate->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_ResultDate" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ResultDate" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($ivf_oocytedenudation->ResultDate->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_ResultDate" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ResultDate" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($ivf_oocytedenudation->ResultDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_ResultDate" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ResultDate" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($ivf_oocytedenudation->ResultDate->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_ResultDate" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ResultDate" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($ivf_oocytedenudation->ResultDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->Surgeon->Visible) { // Surgeon ?>
		<td data-name="Surgeon"<?php echo $ivf_oocytedenudation->Surgeon->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_Surgeon" class="form-group ivf_oocytedenudation_Surgeon">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_Surgeon" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Surgeon" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Surgeon" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->Surgeon->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->Surgeon->EditValue ?>"<?php echo $ivf_oocytedenudation->Surgeon->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_Surgeon" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Surgeon" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Surgeon" value="<?php echo HtmlEncode($ivf_oocytedenudation->Surgeon->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_Surgeon" class="form-group ivf_oocytedenudation_Surgeon">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_Surgeon" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Surgeon" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Surgeon" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->Surgeon->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->Surgeon->EditValue ?>"<?php echo $ivf_oocytedenudation->Surgeon->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_Surgeon" class="ivf_oocytedenudation_Surgeon">
<span<?php echo $ivf_oocytedenudation->Surgeon->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->Surgeon->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_Surgeon" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Surgeon" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Surgeon" value="<?php echo HtmlEncode($ivf_oocytedenudation->Surgeon->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_Surgeon" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Surgeon" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Surgeon" value="<?php echo HtmlEncode($ivf_oocytedenudation->Surgeon->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_Surgeon" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Surgeon" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Surgeon" value="<?php echo HtmlEncode($ivf_oocytedenudation->Surgeon->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_Surgeon" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Surgeon" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Surgeon" value="<?php echo HtmlEncode($ivf_oocytedenudation->Surgeon->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->AsstSurgeon->Visible) { // AsstSurgeon ?>
		<td data-name="AsstSurgeon"<?php echo $ivf_oocytedenudation->AsstSurgeon->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_AsstSurgeon" class="form-group ivf_oocytedenudation_AsstSurgeon">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_AsstSurgeon" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AsstSurgeon" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AsstSurgeon" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->AsstSurgeon->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->AsstSurgeon->EditValue ?>"<?php echo $ivf_oocytedenudation->AsstSurgeon->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_AsstSurgeon" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AsstSurgeon" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AsstSurgeon" value="<?php echo HtmlEncode($ivf_oocytedenudation->AsstSurgeon->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_AsstSurgeon" class="form-group ivf_oocytedenudation_AsstSurgeon">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_AsstSurgeon" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AsstSurgeon" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AsstSurgeon" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->AsstSurgeon->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->AsstSurgeon->EditValue ?>"<?php echo $ivf_oocytedenudation->AsstSurgeon->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_AsstSurgeon" class="ivf_oocytedenudation_AsstSurgeon">
<span<?php echo $ivf_oocytedenudation->AsstSurgeon->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->AsstSurgeon->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_AsstSurgeon" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AsstSurgeon" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AsstSurgeon" value="<?php echo HtmlEncode($ivf_oocytedenudation->AsstSurgeon->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_AsstSurgeon" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AsstSurgeon" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AsstSurgeon" value="<?php echo HtmlEncode($ivf_oocytedenudation->AsstSurgeon->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_AsstSurgeon" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AsstSurgeon" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AsstSurgeon" value="<?php echo HtmlEncode($ivf_oocytedenudation->AsstSurgeon->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_AsstSurgeon" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AsstSurgeon" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AsstSurgeon" value="<?php echo HtmlEncode($ivf_oocytedenudation->AsstSurgeon->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->Anaesthetist->Visible) { // Anaesthetist ?>
		<td data-name="Anaesthetist"<?php echo $ivf_oocytedenudation->Anaesthetist->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_Anaesthetist" class="form-group ivf_oocytedenudation_Anaesthetist">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_Anaesthetist" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Anaesthetist" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Anaesthetist" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->Anaesthetist->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->Anaesthetist->EditValue ?>"<?php echo $ivf_oocytedenudation->Anaesthetist->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_Anaesthetist" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Anaesthetist" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Anaesthetist" value="<?php echo HtmlEncode($ivf_oocytedenudation->Anaesthetist->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_Anaesthetist" class="form-group ivf_oocytedenudation_Anaesthetist">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_Anaesthetist" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Anaesthetist" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Anaesthetist" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->Anaesthetist->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->Anaesthetist->EditValue ?>"<?php echo $ivf_oocytedenudation->Anaesthetist->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_Anaesthetist" class="ivf_oocytedenudation_Anaesthetist">
<span<?php echo $ivf_oocytedenudation->Anaesthetist->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->Anaesthetist->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_Anaesthetist" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Anaesthetist" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Anaesthetist" value="<?php echo HtmlEncode($ivf_oocytedenudation->Anaesthetist->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_Anaesthetist" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Anaesthetist" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Anaesthetist" value="<?php echo HtmlEncode($ivf_oocytedenudation->Anaesthetist->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_Anaesthetist" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Anaesthetist" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Anaesthetist" value="<?php echo HtmlEncode($ivf_oocytedenudation->Anaesthetist->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_Anaesthetist" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Anaesthetist" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Anaesthetist" value="<?php echo HtmlEncode($ivf_oocytedenudation->Anaesthetist->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->AnaestheiaType->Visible) { // AnaestheiaType ?>
		<td data-name="AnaestheiaType"<?php echo $ivf_oocytedenudation->AnaestheiaType->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_AnaestheiaType" class="form-group ivf_oocytedenudation_AnaestheiaType">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_AnaestheiaType" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AnaestheiaType" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AnaestheiaType" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->AnaestheiaType->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->AnaestheiaType->EditValue ?>"<?php echo $ivf_oocytedenudation->AnaestheiaType->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_AnaestheiaType" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AnaestheiaType" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AnaestheiaType" value="<?php echo HtmlEncode($ivf_oocytedenudation->AnaestheiaType->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_AnaestheiaType" class="form-group ivf_oocytedenudation_AnaestheiaType">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_AnaestheiaType" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AnaestheiaType" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AnaestheiaType" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->AnaestheiaType->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->AnaestheiaType->EditValue ?>"<?php echo $ivf_oocytedenudation->AnaestheiaType->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_AnaestheiaType" class="ivf_oocytedenudation_AnaestheiaType">
<span<?php echo $ivf_oocytedenudation->AnaestheiaType->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->AnaestheiaType->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_AnaestheiaType" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AnaestheiaType" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AnaestheiaType" value="<?php echo HtmlEncode($ivf_oocytedenudation->AnaestheiaType->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_AnaestheiaType" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AnaestheiaType" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AnaestheiaType" value="<?php echo HtmlEncode($ivf_oocytedenudation->AnaestheiaType->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_AnaestheiaType" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AnaestheiaType" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AnaestheiaType" value="<?php echo HtmlEncode($ivf_oocytedenudation->AnaestheiaType->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_AnaestheiaType" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AnaestheiaType" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AnaestheiaType" value="<?php echo HtmlEncode($ivf_oocytedenudation->AnaestheiaType->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->PrimaryEmbryologist->Visible) { // PrimaryEmbryologist ?>
		<td data-name="PrimaryEmbryologist"<?php echo $ivf_oocytedenudation->PrimaryEmbryologist->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_PrimaryEmbryologist" class="form-group ivf_oocytedenudation_PrimaryEmbryologist">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_PrimaryEmbryologist" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_PrimaryEmbryologist" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_PrimaryEmbryologist" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->PrimaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->PrimaryEmbryologist->EditValue ?>"<?php echo $ivf_oocytedenudation->PrimaryEmbryologist->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_PrimaryEmbryologist" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_PrimaryEmbryologist" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_PrimaryEmbryologist" value="<?php echo HtmlEncode($ivf_oocytedenudation->PrimaryEmbryologist->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_PrimaryEmbryologist" class="form-group ivf_oocytedenudation_PrimaryEmbryologist">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_PrimaryEmbryologist" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_PrimaryEmbryologist" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_PrimaryEmbryologist" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->PrimaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->PrimaryEmbryologist->EditValue ?>"<?php echo $ivf_oocytedenudation->PrimaryEmbryologist->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_PrimaryEmbryologist" class="ivf_oocytedenudation_PrimaryEmbryologist">
<span<?php echo $ivf_oocytedenudation->PrimaryEmbryologist->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->PrimaryEmbryologist->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_PrimaryEmbryologist" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_PrimaryEmbryologist" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_PrimaryEmbryologist" value="<?php echo HtmlEncode($ivf_oocytedenudation->PrimaryEmbryologist->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_PrimaryEmbryologist" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_PrimaryEmbryologist" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_PrimaryEmbryologist" value="<?php echo HtmlEncode($ivf_oocytedenudation->PrimaryEmbryologist->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_PrimaryEmbryologist" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_PrimaryEmbryologist" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_PrimaryEmbryologist" value="<?php echo HtmlEncode($ivf_oocytedenudation->PrimaryEmbryologist->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_PrimaryEmbryologist" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_PrimaryEmbryologist" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_PrimaryEmbryologist" value="<?php echo HtmlEncode($ivf_oocytedenudation->PrimaryEmbryologist->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->SecondaryEmbryologist->Visible) { // SecondaryEmbryologist ?>
		<td data-name="SecondaryEmbryologist"<?php echo $ivf_oocytedenudation->SecondaryEmbryologist->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_SecondaryEmbryologist" class="form-group ivf_oocytedenudation_SecondaryEmbryologist">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_SecondaryEmbryologist" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryEmbryologist" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryEmbryologist" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->SecondaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->SecondaryEmbryologist->EditValue ?>"<?php echo $ivf_oocytedenudation->SecondaryEmbryologist->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SecondaryEmbryologist" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryEmbryologist" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryEmbryologist" value="<?php echo HtmlEncode($ivf_oocytedenudation->SecondaryEmbryologist->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_SecondaryEmbryologist" class="form-group ivf_oocytedenudation_SecondaryEmbryologist">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_SecondaryEmbryologist" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryEmbryologist" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryEmbryologist" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->SecondaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->SecondaryEmbryologist->EditValue ?>"<?php echo $ivf_oocytedenudation->SecondaryEmbryologist->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_SecondaryEmbryologist" class="ivf_oocytedenudation_SecondaryEmbryologist">
<span<?php echo $ivf_oocytedenudation->SecondaryEmbryologist->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->SecondaryEmbryologist->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SecondaryEmbryologist" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryEmbryologist" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryEmbryologist" value="<?php echo HtmlEncode($ivf_oocytedenudation->SecondaryEmbryologist->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SecondaryEmbryologist" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryEmbryologist" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryEmbryologist" value="<?php echo HtmlEncode($ivf_oocytedenudation->SecondaryEmbryologist->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SecondaryEmbryologist" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryEmbryologist" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryEmbryologist" value="<?php echo HtmlEncode($ivf_oocytedenudation->SecondaryEmbryologist->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SecondaryEmbryologist" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryEmbryologist" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryEmbryologist" value="<?php echo HtmlEncode($ivf_oocytedenudation->SecondaryEmbryologist->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->NoOfFolliclesRight->Visible) { // NoOfFolliclesRight ?>
		<td data-name="NoOfFolliclesRight"<?php echo $ivf_oocytedenudation->NoOfFolliclesRight->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_NoOfFolliclesRight" class="form-group ivf_oocytedenudation_NoOfFolliclesRight">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_NoOfFolliclesRight" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesRight" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesRight" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->NoOfFolliclesRight->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->NoOfFolliclesRight->EditValue ?>"<?php echo $ivf_oocytedenudation->NoOfFolliclesRight->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_NoOfFolliclesRight" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesRight" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesRight" value="<?php echo HtmlEncode($ivf_oocytedenudation->NoOfFolliclesRight->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_NoOfFolliclesRight" class="form-group ivf_oocytedenudation_NoOfFolliclesRight">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_NoOfFolliclesRight" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesRight" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesRight" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->NoOfFolliclesRight->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->NoOfFolliclesRight->EditValue ?>"<?php echo $ivf_oocytedenudation->NoOfFolliclesRight->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_NoOfFolliclesRight" class="ivf_oocytedenudation_NoOfFolliclesRight">
<span<?php echo $ivf_oocytedenudation->NoOfFolliclesRight->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->NoOfFolliclesRight->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_NoOfFolliclesRight" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesRight" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesRight" value="<?php echo HtmlEncode($ivf_oocytedenudation->NoOfFolliclesRight->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_NoOfFolliclesRight" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesRight" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesRight" value="<?php echo HtmlEncode($ivf_oocytedenudation->NoOfFolliclesRight->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_NoOfFolliclesRight" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesRight" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesRight" value="<?php echo HtmlEncode($ivf_oocytedenudation->NoOfFolliclesRight->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_NoOfFolliclesRight" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesRight" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesRight" value="<?php echo HtmlEncode($ivf_oocytedenudation->NoOfFolliclesRight->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->NoOfFolliclesLeft->Visible) { // NoOfFolliclesLeft ?>
		<td data-name="NoOfFolliclesLeft"<?php echo $ivf_oocytedenudation->NoOfFolliclesLeft->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_NoOfFolliclesLeft" class="form-group ivf_oocytedenudation_NoOfFolliclesLeft">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_NoOfFolliclesLeft" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesLeft" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesLeft" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->NoOfFolliclesLeft->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->NoOfFolliclesLeft->EditValue ?>"<?php echo $ivf_oocytedenudation->NoOfFolliclesLeft->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_NoOfFolliclesLeft" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesLeft" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesLeft" value="<?php echo HtmlEncode($ivf_oocytedenudation->NoOfFolliclesLeft->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_NoOfFolliclesLeft" class="form-group ivf_oocytedenudation_NoOfFolliclesLeft">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_NoOfFolliclesLeft" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesLeft" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesLeft" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->NoOfFolliclesLeft->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->NoOfFolliclesLeft->EditValue ?>"<?php echo $ivf_oocytedenudation->NoOfFolliclesLeft->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_NoOfFolliclesLeft" class="ivf_oocytedenudation_NoOfFolliclesLeft">
<span<?php echo $ivf_oocytedenudation->NoOfFolliclesLeft->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->NoOfFolliclesLeft->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_NoOfFolliclesLeft" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesLeft" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesLeft" value="<?php echo HtmlEncode($ivf_oocytedenudation->NoOfFolliclesLeft->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_NoOfFolliclesLeft" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesLeft" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesLeft" value="<?php echo HtmlEncode($ivf_oocytedenudation->NoOfFolliclesLeft->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_NoOfFolliclesLeft" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesLeft" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesLeft" value="<?php echo HtmlEncode($ivf_oocytedenudation->NoOfFolliclesLeft->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_NoOfFolliclesLeft" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesLeft" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesLeft" value="<?php echo HtmlEncode($ivf_oocytedenudation->NoOfFolliclesLeft->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->NoOfOocytes->Visible) { // NoOfOocytes ?>
		<td data-name="NoOfOocytes"<?php echo $ivf_oocytedenudation->NoOfOocytes->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_NoOfOocytes" class="form-group ivf_oocytedenudation_NoOfOocytes">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_NoOfOocytes" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfOocytes" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfOocytes" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->NoOfOocytes->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->NoOfOocytes->EditValue ?>"<?php echo $ivf_oocytedenudation->NoOfOocytes->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_NoOfOocytes" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfOocytes" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfOocytes" value="<?php echo HtmlEncode($ivf_oocytedenudation->NoOfOocytes->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_NoOfOocytes" class="form-group ivf_oocytedenudation_NoOfOocytes">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_NoOfOocytes" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfOocytes" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfOocytes" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->NoOfOocytes->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->NoOfOocytes->EditValue ?>"<?php echo $ivf_oocytedenudation->NoOfOocytes->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_NoOfOocytes" class="ivf_oocytedenudation_NoOfOocytes">
<span<?php echo $ivf_oocytedenudation->NoOfOocytes->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->NoOfOocytes->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_NoOfOocytes" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfOocytes" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfOocytes" value="<?php echo HtmlEncode($ivf_oocytedenudation->NoOfOocytes->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_NoOfOocytes" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfOocytes" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfOocytes" value="<?php echo HtmlEncode($ivf_oocytedenudation->NoOfOocytes->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_NoOfOocytes" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfOocytes" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfOocytes" value="<?php echo HtmlEncode($ivf_oocytedenudation->NoOfOocytes->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_NoOfOocytes" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfOocytes" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfOocytes" value="<?php echo HtmlEncode($ivf_oocytedenudation->NoOfOocytes->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->RecordOocyteDenudation->Visible) { // RecordOocyteDenudation ?>
		<td data-name="RecordOocyteDenudation"<?php echo $ivf_oocytedenudation->RecordOocyteDenudation->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_RecordOocyteDenudation" class="form-group ivf_oocytedenudation_RecordOocyteDenudation">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_RecordOocyteDenudation" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RecordOocyteDenudation" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RecordOocyteDenudation" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->RecordOocyteDenudation->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->RecordOocyteDenudation->EditValue ?>"<?php echo $ivf_oocytedenudation->RecordOocyteDenudation->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_RecordOocyteDenudation" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RecordOocyteDenudation" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RecordOocyteDenudation" value="<?php echo HtmlEncode($ivf_oocytedenudation->RecordOocyteDenudation->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_RecordOocyteDenudation" class="form-group ivf_oocytedenudation_RecordOocyteDenudation">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_RecordOocyteDenudation" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RecordOocyteDenudation" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RecordOocyteDenudation" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->RecordOocyteDenudation->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->RecordOocyteDenudation->EditValue ?>"<?php echo $ivf_oocytedenudation->RecordOocyteDenudation->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_RecordOocyteDenudation" class="ivf_oocytedenudation_RecordOocyteDenudation">
<span<?php echo $ivf_oocytedenudation->RecordOocyteDenudation->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->RecordOocyteDenudation->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_RecordOocyteDenudation" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RecordOocyteDenudation" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RecordOocyteDenudation" value="<?php echo HtmlEncode($ivf_oocytedenudation->RecordOocyteDenudation->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_RecordOocyteDenudation" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RecordOocyteDenudation" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RecordOocyteDenudation" value="<?php echo HtmlEncode($ivf_oocytedenudation->RecordOocyteDenudation->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_RecordOocyteDenudation" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RecordOocyteDenudation" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RecordOocyteDenudation" value="<?php echo HtmlEncode($ivf_oocytedenudation->RecordOocyteDenudation->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_RecordOocyteDenudation" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RecordOocyteDenudation" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RecordOocyteDenudation" value="<?php echo HtmlEncode($ivf_oocytedenudation->RecordOocyteDenudation->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->DateOfDenudation->Visible) { // DateOfDenudation ?>
		<td data-name="DateOfDenudation"<?php echo $ivf_oocytedenudation->DateOfDenudation->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_DateOfDenudation" class="form-group ivf_oocytedenudation_DateOfDenudation">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_DateOfDenudation" data-format="11" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DateOfDenudation" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DateOfDenudation" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->DateOfDenudation->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->DateOfDenudation->EditValue ?>"<?php echo $ivf_oocytedenudation->DateOfDenudation->editAttributes() ?>>
<?php if (!$ivf_oocytedenudation->DateOfDenudation->ReadOnly && !$ivf_oocytedenudation->DateOfDenudation->Disabled && !isset($ivf_oocytedenudation->DateOfDenudation->EditAttrs["readonly"]) && !isset($ivf_oocytedenudation->DateOfDenudation->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_oocytedenudationgrid", "x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DateOfDenudation", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_DateOfDenudation" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DateOfDenudation" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DateOfDenudation" value="<?php echo HtmlEncode($ivf_oocytedenudation->DateOfDenudation->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_DateOfDenudation" class="form-group ivf_oocytedenudation_DateOfDenudation">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_DateOfDenudation" data-format="11" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DateOfDenudation" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DateOfDenudation" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->DateOfDenudation->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->DateOfDenudation->EditValue ?>"<?php echo $ivf_oocytedenudation->DateOfDenudation->editAttributes() ?>>
<?php if (!$ivf_oocytedenudation->DateOfDenudation->ReadOnly && !$ivf_oocytedenudation->DateOfDenudation->Disabled && !isset($ivf_oocytedenudation->DateOfDenudation->EditAttrs["readonly"]) && !isset($ivf_oocytedenudation->DateOfDenudation->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_oocytedenudationgrid", "x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DateOfDenudation", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_DateOfDenudation" class="ivf_oocytedenudation_DateOfDenudation">
<span<?php echo $ivf_oocytedenudation->DateOfDenudation->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->DateOfDenudation->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_DateOfDenudation" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DateOfDenudation" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DateOfDenudation" value="<?php echo HtmlEncode($ivf_oocytedenudation->DateOfDenudation->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_DateOfDenudation" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DateOfDenudation" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DateOfDenudation" value="<?php echo HtmlEncode($ivf_oocytedenudation->DateOfDenudation->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_DateOfDenudation" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DateOfDenudation" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DateOfDenudation" value="<?php echo HtmlEncode($ivf_oocytedenudation->DateOfDenudation->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_DateOfDenudation" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DateOfDenudation" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DateOfDenudation" value="<?php echo HtmlEncode($ivf_oocytedenudation->DateOfDenudation->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->DenudationDoneBy->Visible) { // DenudationDoneBy ?>
		<td data-name="DenudationDoneBy"<?php echo $ivf_oocytedenudation->DenudationDoneBy->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_DenudationDoneBy" class="form-group ivf_oocytedenudation_DenudationDoneBy">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_DenudationDoneBy" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DenudationDoneBy" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DenudationDoneBy" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->DenudationDoneBy->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->DenudationDoneBy->EditValue ?>"<?php echo $ivf_oocytedenudation->DenudationDoneBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_DenudationDoneBy" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DenudationDoneBy" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DenudationDoneBy" value="<?php echo HtmlEncode($ivf_oocytedenudation->DenudationDoneBy->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_DenudationDoneBy" class="form-group ivf_oocytedenudation_DenudationDoneBy">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_DenudationDoneBy" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DenudationDoneBy" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DenudationDoneBy" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->DenudationDoneBy->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->DenudationDoneBy->EditValue ?>"<?php echo $ivf_oocytedenudation->DenudationDoneBy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_DenudationDoneBy" class="ivf_oocytedenudation_DenudationDoneBy">
<span<?php echo $ivf_oocytedenudation->DenudationDoneBy->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->DenudationDoneBy->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_DenudationDoneBy" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DenudationDoneBy" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DenudationDoneBy" value="<?php echo HtmlEncode($ivf_oocytedenudation->DenudationDoneBy->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_DenudationDoneBy" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DenudationDoneBy" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DenudationDoneBy" value="<?php echo HtmlEncode($ivf_oocytedenudation->DenudationDoneBy->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_DenudationDoneBy" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DenudationDoneBy" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DenudationDoneBy" value="<?php echo HtmlEncode($ivf_oocytedenudation->DenudationDoneBy->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_DenudationDoneBy" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DenudationDoneBy" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DenudationDoneBy" value="<?php echo HtmlEncode($ivf_oocytedenudation->DenudationDoneBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->status->Visible) { // status ?>
		<td data-name="status"<?php echo $ivf_oocytedenudation->status->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_status" class="form-group ivf_oocytedenudation_status">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_status" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_status" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_status" size="30" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->status->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->status->EditValue ?>"<?php echo $ivf_oocytedenudation->status->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_status" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_status" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($ivf_oocytedenudation->status->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_status" class="form-group ivf_oocytedenudation_status">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_status" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_status" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_status" size="30" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->status->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->status->EditValue ?>"<?php echo $ivf_oocytedenudation->status->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_status" class="ivf_oocytedenudation_status">
<span<?php echo $ivf_oocytedenudation->status->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->status->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_status" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_status" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($ivf_oocytedenudation->status->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_status" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_status" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($ivf_oocytedenudation->status->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_status" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_status" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($ivf_oocytedenudation->status->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_status" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_status" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($ivf_oocytedenudation->status->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $ivf_oocytedenudation->createdby->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_createdby" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_createdby" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($ivf_oocytedenudation->createdby->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_createdby" class="ivf_oocytedenudation_createdby">
<span<?php echo $ivf_oocytedenudation->createdby->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->createdby->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_createdby" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_createdby" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($ivf_oocytedenudation->createdby->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_createdby" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_createdby" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($ivf_oocytedenudation->createdby->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_createdby" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_createdby" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($ivf_oocytedenudation->createdby->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_createdby" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_createdby" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($ivf_oocytedenudation->createdby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $ivf_oocytedenudation->createddatetime->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_createddatetime" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_createddatetime" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($ivf_oocytedenudation->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_createddatetime" class="ivf_oocytedenudation_createddatetime">
<span<?php echo $ivf_oocytedenudation->createddatetime->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->createddatetime->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_createddatetime" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_createddatetime" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($ivf_oocytedenudation->createddatetime->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_createddatetime" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_createddatetime" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($ivf_oocytedenudation->createddatetime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_createddatetime" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_createddatetime" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($ivf_oocytedenudation->createddatetime->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_createddatetime" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_createddatetime" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($ivf_oocytedenudation->createddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $ivf_oocytedenudation->modifiedby->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_modifiedby" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_modifiedby" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($ivf_oocytedenudation->modifiedby->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_modifiedby" class="ivf_oocytedenudation_modifiedby">
<span<?php echo $ivf_oocytedenudation->modifiedby->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->modifiedby->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_modifiedby" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_modifiedby" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($ivf_oocytedenudation->modifiedby->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_modifiedby" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_modifiedby" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($ivf_oocytedenudation->modifiedby->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_modifiedby" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_modifiedby" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($ivf_oocytedenudation->modifiedby->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_modifiedby" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_modifiedby" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($ivf_oocytedenudation->modifiedby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $ivf_oocytedenudation->modifieddatetime->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_modifieddatetime" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($ivf_oocytedenudation->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_modifieddatetime" class="ivf_oocytedenudation_modifieddatetime">
<span<?php echo $ivf_oocytedenudation->modifieddatetime->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->modifieddatetime->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_modifieddatetime" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($ivf_oocytedenudation->modifieddatetime->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_modifieddatetime" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($ivf_oocytedenudation->modifieddatetime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_modifieddatetime" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_modifieddatetime" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($ivf_oocytedenudation->modifieddatetime->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_modifieddatetime" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_modifieddatetime" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($ivf_oocytedenudation->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo"<?php echo $ivf_oocytedenudation->TidNo->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($ivf_oocytedenudation->TidNo->getSessionValue() <> "") { ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_TidNo" class="form-group ivf_oocytedenudation_TidNo">
<span<?php echo $ivf_oocytedenudation->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_oocytedenudation->TidNo->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_TidNo" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_oocytedenudation->TidNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_TidNo" class="form-group ivf_oocytedenudation_TidNo">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_TidNo" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_TidNo" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_TidNo" size="30" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->TidNo->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->TidNo->EditValue ?>"<?php echo $ivf_oocytedenudation->TidNo->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_TidNo" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_TidNo" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_oocytedenudation->TidNo->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($ivf_oocytedenudation->TidNo->getSessionValue() <> "") { ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_TidNo" class="form-group ivf_oocytedenudation_TidNo">
<span<?php echo $ivf_oocytedenudation->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_oocytedenudation->TidNo->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_TidNo" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_oocytedenudation->TidNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_TidNo" class="form-group ivf_oocytedenudation_TidNo">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_TidNo" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_TidNo" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_TidNo" size="30" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->TidNo->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->TidNo->EditValue ?>"<?php echo $ivf_oocytedenudation->TidNo->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_TidNo" class="ivf_oocytedenudation_TidNo">
<span<?php echo $ivf_oocytedenudation->TidNo->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->TidNo->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_TidNo" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_TidNo" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_oocytedenudation->TidNo->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_TidNo" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_TidNo" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_oocytedenudation->TidNo->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_TidNo" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_TidNo" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_oocytedenudation->TidNo->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_TidNo" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_TidNo" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_oocytedenudation->TidNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->ExpFollicles->Visible) { // ExpFollicles ?>
		<td data-name="ExpFollicles"<?php echo $ivf_oocytedenudation->ExpFollicles->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_ExpFollicles" class="form-group ivf_oocytedenudation_ExpFollicles">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_ExpFollicles" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ExpFollicles" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ExpFollicles" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->ExpFollicles->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->ExpFollicles->EditValue ?>"<?php echo $ivf_oocytedenudation->ExpFollicles->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_ExpFollicles" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ExpFollicles" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ExpFollicles" value="<?php echo HtmlEncode($ivf_oocytedenudation->ExpFollicles->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_ExpFollicles" class="form-group ivf_oocytedenudation_ExpFollicles">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_ExpFollicles" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ExpFollicles" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ExpFollicles" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->ExpFollicles->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->ExpFollicles->EditValue ?>"<?php echo $ivf_oocytedenudation->ExpFollicles->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_ExpFollicles" class="ivf_oocytedenudation_ExpFollicles">
<span<?php echo $ivf_oocytedenudation->ExpFollicles->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->ExpFollicles->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_ExpFollicles" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ExpFollicles" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ExpFollicles" value="<?php echo HtmlEncode($ivf_oocytedenudation->ExpFollicles->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_ExpFollicles" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ExpFollicles" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ExpFollicles" value="<?php echo HtmlEncode($ivf_oocytedenudation->ExpFollicles->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_ExpFollicles" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ExpFollicles" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ExpFollicles" value="<?php echo HtmlEncode($ivf_oocytedenudation->ExpFollicles->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_ExpFollicles" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ExpFollicles" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ExpFollicles" value="<?php echo HtmlEncode($ivf_oocytedenudation->ExpFollicles->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->SecondaryDenudationDoneBy->Visible) { // SecondaryDenudationDoneBy ?>
		<td data-name="SecondaryDenudationDoneBy"<?php echo $ivf_oocytedenudation->SecondaryDenudationDoneBy->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_SecondaryDenudationDoneBy" class="form-group ivf_oocytedenudation_SecondaryDenudationDoneBy">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_SecondaryDenudationDoneBy" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryDenudationDoneBy" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryDenudationDoneBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->SecondaryDenudationDoneBy->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->SecondaryDenudationDoneBy->EditValue ?>"<?php echo $ivf_oocytedenudation->SecondaryDenudationDoneBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SecondaryDenudationDoneBy" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryDenudationDoneBy" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryDenudationDoneBy" value="<?php echo HtmlEncode($ivf_oocytedenudation->SecondaryDenudationDoneBy->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_SecondaryDenudationDoneBy" class="form-group ivf_oocytedenudation_SecondaryDenudationDoneBy">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_SecondaryDenudationDoneBy" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryDenudationDoneBy" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryDenudationDoneBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->SecondaryDenudationDoneBy->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->SecondaryDenudationDoneBy->EditValue ?>"<?php echo $ivf_oocytedenudation->SecondaryDenudationDoneBy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_SecondaryDenudationDoneBy" class="ivf_oocytedenudation_SecondaryDenudationDoneBy">
<span<?php echo $ivf_oocytedenudation->SecondaryDenudationDoneBy->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->SecondaryDenudationDoneBy->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SecondaryDenudationDoneBy" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryDenudationDoneBy" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryDenudationDoneBy" value="<?php echo HtmlEncode($ivf_oocytedenudation->SecondaryDenudationDoneBy->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SecondaryDenudationDoneBy" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryDenudationDoneBy" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryDenudationDoneBy" value="<?php echo HtmlEncode($ivf_oocytedenudation->SecondaryDenudationDoneBy->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SecondaryDenudationDoneBy" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryDenudationDoneBy" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryDenudationDoneBy" value="<?php echo HtmlEncode($ivf_oocytedenudation->SecondaryDenudationDoneBy->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SecondaryDenudationDoneBy" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryDenudationDoneBy" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryDenudationDoneBy" value="<?php echo HtmlEncode($ivf_oocytedenudation->SecondaryDenudationDoneBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->OocyteOrgin->Visible) { // OocyteOrgin ?>
		<td data-name="OocyteOrgin"<?php echo $ivf_oocytedenudation->OocyteOrgin->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_OocyteOrgin" class="form-group ivf_oocytedenudation_OocyteOrgin">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_oocytedenudation" data-field="x_OocyteOrgin" data-value-separator="<?php echo $ivf_oocytedenudation->OocyteOrgin->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteOrgin" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteOrgin"<?php echo $ivf_oocytedenudation->OocyteOrgin->editAttributes() ?>>
		<?php echo $ivf_oocytedenudation->OocyteOrgin->selectOptionListHtml("x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteOrgin") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocyteOrgin" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteOrgin" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteOrgin" value="<?php echo HtmlEncode($ivf_oocytedenudation->OocyteOrgin->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_OocyteOrgin" class="form-group ivf_oocytedenudation_OocyteOrgin">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_oocytedenudation" data-field="x_OocyteOrgin" data-value-separator="<?php echo $ivf_oocytedenudation->OocyteOrgin->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteOrgin" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteOrgin"<?php echo $ivf_oocytedenudation->OocyteOrgin->editAttributes() ?>>
		<?php echo $ivf_oocytedenudation->OocyteOrgin->selectOptionListHtml("x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteOrgin") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_OocyteOrgin" class="ivf_oocytedenudation_OocyteOrgin">
<span<?php echo $ivf_oocytedenudation->OocyteOrgin->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->OocyteOrgin->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocyteOrgin" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteOrgin" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteOrgin" value="<?php echo HtmlEncode($ivf_oocytedenudation->OocyteOrgin->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocyteOrgin" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteOrgin" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteOrgin" value="<?php echo HtmlEncode($ivf_oocytedenudation->OocyteOrgin->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocyteOrgin" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteOrgin" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteOrgin" value="<?php echo HtmlEncode($ivf_oocytedenudation->OocyteOrgin->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocyteOrgin" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteOrgin" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteOrgin" value="<?php echo HtmlEncode($ivf_oocytedenudation->OocyteOrgin->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->patient1->Visible) { // patient1 ?>
		<td data-name="patient1"<?php echo $ivf_oocytedenudation->patient1->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_patient1" class="form-group ivf_oocytedenudation_patient1">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient1"><?php echo strval($ivf_oocytedenudation->patient1->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($ivf_oocytedenudation->patient1->ViewValue) : $ivf_oocytedenudation->patient1->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($ivf_oocytedenudation->patient1->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($ivf_oocytedenudation->patient1->ReadOnly || $ivf_oocytedenudation->patient1->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient1',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $ivf_oocytedenudation->patient1->Lookup->getParamTag("p_x" . $ivf_oocytedenudation_grid->RowIndex . "_patient1") ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient1" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $ivf_oocytedenudation->patient1->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient1" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient1" value="<?php echo $ivf_oocytedenudation->patient1->CurrentValue ?>"<?php echo $ivf_oocytedenudation->patient1->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient1" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient1" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient1" value="<?php echo HtmlEncode($ivf_oocytedenudation->patient1->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_patient1" class="form-group ivf_oocytedenudation_patient1">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient1"><?php echo strval($ivf_oocytedenudation->patient1->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($ivf_oocytedenudation->patient1->ViewValue) : $ivf_oocytedenudation->patient1->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($ivf_oocytedenudation->patient1->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($ivf_oocytedenudation->patient1->ReadOnly || $ivf_oocytedenudation->patient1->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient1',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $ivf_oocytedenudation->patient1->Lookup->getParamTag("p_x" . $ivf_oocytedenudation_grid->RowIndex . "_patient1") ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient1" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $ivf_oocytedenudation->patient1->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient1" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient1" value="<?php echo $ivf_oocytedenudation->patient1->CurrentValue ?>"<?php echo $ivf_oocytedenudation->patient1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_patient1" class="ivf_oocytedenudation_patient1">
<span<?php echo $ivf_oocytedenudation->patient1->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->patient1->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient1" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient1" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient1" value="<?php echo HtmlEncode($ivf_oocytedenudation->patient1->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient1" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient1" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient1" value="<?php echo HtmlEncode($ivf_oocytedenudation->patient1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient1" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient1" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient1" value="<?php echo HtmlEncode($ivf_oocytedenudation->patient1->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient1" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient1" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient1" value="<?php echo HtmlEncode($ivf_oocytedenudation->patient1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->OocyteType->Visible) { // OocyteType ?>
		<td data-name="OocyteType"<?php echo $ivf_oocytedenudation->OocyteType->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_OocyteType" class="form-group ivf_oocytedenudation_OocyteType">
<div id="tp_x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteType" class="ew-template"><input type="checkbox" class="form-check-input" data-table="ivf_oocytedenudation" data-field="x_OocyteType" data-value-separator="<?php echo $ivf_oocytedenudation->OocyteType->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteType[]" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteType[]" value="{value}"<?php echo $ivf_oocytedenudation->OocyteType->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteType" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_oocytedenudation->OocyteType->checkBoxListHtml(FALSE, "x{$ivf_oocytedenudation_grid->RowIndex}_OocyteType[]") ?>
</div></div>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocyteType" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteType[]" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteType[]" value="<?php echo HtmlEncode($ivf_oocytedenudation->OocyteType->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_OocyteType" class="form-group ivf_oocytedenudation_OocyteType">
<div id="tp_x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteType" class="ew-template"><input type="checkbox" class="form-check-input" data-table="ivf_oocytedenudation" data-field="x_OocyteType" data-value-separator="<?php echo $ivf_oocytedenudation->OocyteType->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteType[]" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteType[]" value="{value}"<?php echo $ivf_oocytedenudation->OocyteType->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteType" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_oocytedenudation->OocyteType->checkBoxListHtml(FALSE, "x{$ivf_oocytedenudation_grid->RowIndex}_OocyteType[]") ?>
</div></div>
</span>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_OocyteType" class="ivf_oocytedenudation_OocyteType">
<span<?php echo $ivf_oocytedenudation->OocyteType->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->OocyteType->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocyteType" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteType" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteType" value="<?php echo HtmlEncode($ivf_oocytedenudation->OocyteType->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocyteType" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteType[]" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteType[]" value="<?php echo HtmlEncode($ivf_oocytedenudation->OocyteType->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocyteType" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteType" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteType" value="<?php echo HtmlEncode($ivf_oocytedenudation->OocyteType->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocyteType" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteType[]" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteType[]" value="<?php echo HtmlEncode($ivf_oocytedenudation->OocyteType->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->MIOocytesDonate1->Visible) { // MIOocytesDonate1 ?>
		<td data-name="MIOocytesDonate1"<?php echo $ivf_oocytedenudation->MIOocytesDonate1->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_MIOocytesDonate1" class="form-group ivf_oocytedenudation_MIOocytesDonate1">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate1" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate1" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->MIOocytesDonate1->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->MIOocytesDonate1->EditValue ?>"<?php echo $ivf_oocytedenudation->MIOocytesDonate1->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate1" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate1" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate1" value="<?php echo HtmlEncode($ivf_oocytedenudation->MIOocytesDonate1->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_MIOocytesDonate1" class="form-group ivf_oocytedenudation_MIOocytesDonate1">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate1" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate1" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->MIOocytesDonate1->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->MIOocytesDonate1->EditValue ?>"<?php echo $ivf_oocytedenudation->MIOocytesDonate1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_MIOocytesDonate1" class="ivf_oocytedenudation_MIOocytesDonate1">
<span<?php echo $ivf_oocytedenudation->MIOocytesDonate1->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->MIOocytesDonate1->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate1" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate1" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate1" value="<?php echo HtmlEncode($ivf_oocytedenudation->MIOocytesDonate1->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate1" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate1" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate1" value="<?php echo HtmlEncode($ivf_oocytedenudation->MIOocytesDonate1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate1" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate1" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate1" value="<?php echo HtmlEncode($ivf_oocytedenudation->MIOocytesDonate1->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate1" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate1" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate1" value="<?php echo HtmlEncode($ivf_oocytedenudation->MIOocytesDonate1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->MIOocytesDonate2->Visible) { // MIOocytesDonate2 ?>
		<td data-name="MIOocytesDonate2"<?php echo $ivf_oocytedenudation->MIOocytesDonate2->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_MIOocytesDonate2" class="form-group ivf_oocytedenudation_MIOocytesDonate2">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate2" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate2" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->MIOocytesDonate2->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->MIOocytesDonate2->EditValue ?>"<?php echo $ivf_oocytedenudation->MIOocytesDonate2->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate2" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate2" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate2" value="<?php echo HtmlEncode($ivf_oocytedenudation->MIOocytesDonate2->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_MIOocytesDonate2" class="form-group ivf_oocytedenudation_MIOocytesDonate2">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate2" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate2" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->MIOocytesDonate2->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->MIOocytesDonate2->EditValue ?>"<?php echo $ivf_oocytedenudation->MIOocytesDonate2->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_MIOocytesDonate2" class="ivf_oocytedenudation_MIOocytesDonate2">
<span<?php echo $ivf_oocytedenudation->MIOocytesDonate2->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->MIOocytesDonate2->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate2" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate2" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate2" value="<?php echo HtmlEncode($ivf_oocytedenudation->MIOocytesDonate2->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate2" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate2" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate2" value="<?php echo HtmlEncode($ivf_oocytedenudation->MIOocytesDonate2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate2" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate2" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate2" value="<?php echo HtmlEncode($ivf_oocytedenudation->MIOocytesDonate2->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate2" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate2" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate2" value="<?php echo HtmlEncode($ivf_oocytedenudation->MIOocytesDonate2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->SelfMI->Visible) { // SelfMI ?>
		<td data-name="SelfMI"<?php echo $ivf_oocytedenudation->SelfMI->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_SelfMI" class="form-group ivf_oocytedenudation_SelfMI">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_SelfMI" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMI" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMI" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->SelfMI->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->SelfMI->EditValue ?>"<?php echo $ivf_oocytedenudation->SelfMI->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfMI" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMI" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMI" value="<?php echo HtmlEncode($ivf_oocytedenudation->SelfMI->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_SelfMI" class="form-group ivf_oocytedenudation_SelfMI">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_SelfMI" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMI" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMI" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->SelfMI->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->SelfMI->EditValue ?>"<?php echo $ivf_oocytedenudation->SelfMI->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_SelfMI" class="ivf_oocytedenudation_SelfMI">
<span<?php echo $ivf_oocytedenudation->SelfMI->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->SelfMI->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfMI" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMI" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMI" value="<?php echo HtmlEncode($ivf_oocytedenudation->SelfMI->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfMI" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMI" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMI" value="<?php echo HtmlEncode($ivf_oocytedenudation->SelfMI->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfMI" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMI" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMI" value="<?php echo HtmlEncode($ivf_oocytedenudation->SelfMI->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfMI" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMI" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMI" value="<?php echo HtmlEncode($ivf_oocytedenudation->SelfMI->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->SelfMII->Visible) { // SelfMII ?>
		<td data-name="SelfMII"<?php echo $ivf_oocytedenudation->SelfMII->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_SelfMII" class="form-group ivf_oocytedenudation_SelfMII">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_SelfMII" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMII" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMII" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->SelfMII->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->SelfMII->EditValue ?>"<?php echo $ivf_oocytedenudation->SelfMII->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfMII" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMII" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMII" value="<?php echo HtmlEncode($ivf_oocytedenudation->SelfMII->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_SelfMII" class="form-group ivf_oocytedenudation_SelfMII">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_SelfMII" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMII" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMII" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->SelfMII->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->SelfMII->EditValue ?>"<?php echo $ivf_oocytedenudation->SelfMII->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_SelfMII" class="ivf_oocytedenudation_SelfMII">
<span<?php echo $ivf_oocytedenudation->SelfMII->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->SelfMII->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfMII" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMII" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMII" value="<?php echo HtmlEncode($ivf_oocytedenudation->SelfMII->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfMII" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMII" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMII" value="<?php echo HtmlEncode($ivf_oocytedenudation->SelfMII->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfMII" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMII" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMII" value="<?php echo HtmlEncode($ivf_oocytedenudation->SelfMII->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfMII" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMII" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMII" value="<?php echo HtmlEncode($ivf_oocytedenudation->SelfMII->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->patient3->Visible) { // patient3 ?>
		<td data-name="patient3"<?php echo $ivf_oocytedenudation->patient3->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_patient3" class="form-group ivf_oocytedenudation_patient3">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient3"><?php echo strval($ivf_oocytedenudation->patient3->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($ivf_oocytedenudation->patient3->ViewValue) : $ivf_oocytedenudation->patient3->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($ivf_oocytedenudation->patient3->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($ivf_oocytedenudation->patient3->ReadOnly || $ivf_oocytedenudation->patient3->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient3',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $ivf_oocytedenudation->patient3->Lookup->getParamTag("p_x" . $ivf_oocytedenudation_grid->RowIndex . "_patient3") ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient3" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $ivf_oocytedenudation->patient3->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient3" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient3" value="<?php echo $ivf_oocytedenudation->patient3->CurrentValue ?>"<?php echo $ivf_oocytedenudation->patient3->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient3" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient3" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient3" value="<?php echo HtmlEncode($ivf_oocytedenudation->patient3->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_patient3" class="form-group ivf_oocytedenudation_patient3">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient3"><?php echo strval($ivf_oocytedenudation->patient3->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($ivf_oocytedenudation->patient3->ViewValue) : $ivf_oocytedenudation->patient3->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($ivf_oocytedenudation->patient3->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($ivf_oocytedenudation->patient3->ReadOnly || $ivf_oocytedenudation->patient3->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient3',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $ivf_oocytedenudation->patient3->Lookup->getParamTag("p_x" . $ivf_oocytedenudation_grid->RowIndex . "_patient3") ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient3" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $ivf_oocytedenudation->patient3->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient3" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient3" value="<?php echo $ivf_oocytedenudation->patient3->CurrentValue ?>"<?php echo $ivf_oocytedenudation->patient3->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_patient3" class="ivf_oocytedenudation_patient3">
<span<?php echo $ivf_oocytedenudation->patient3->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->patient3->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient3" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient3" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient3" value="<?php echo HtmlEncode($ivf_oocytedenudation->patient3->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient3" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient3" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient3" value="<?php echo HtmlEncode($ivf_oocytedenudation->patient3->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient3" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient3" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient3" value="<?php echo HtmlEncode($ivf_oocytedenudation->patient3->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient3" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient3" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient3" value="<?php echo HtmlEncode($ivf_oocytedenudation->patient3->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->patient4->Visible) { // patient4 ?>
		<td data-name="patient4"<?php echo $ivf_oocytedenudation->patient4->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_patient4" class="form-group ivf_oocytedenudation_patient4">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient4"><?php echo strval($ivf_oocytedenudation->patient4->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($ivf_oocytedenudation->patient4->ViewValue) : $ivf_oocytedenudation->patient4->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($ivf_oocytedenudation->patient4->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($ivf_oocytedenudation->patient4->ReadOnly || $ivf_oocytedenudation->patient4->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient4',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $ivf_oocytedenudation->patient4->Lookup->getParamTag("p_x" . $ivf_oocytedenudation_grid->RowIndex . "_patient4") ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient4" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $ivf_oocytedenudation->patient4->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient4" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient4" value="<?php echo $ivf_oocytedenudation->patient4->CurrentValue ?>"<?php echo $ivf_oocytedenudation->patient4->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient4" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient4" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient4" value="<?php echo HtmlEncode($ivf_oocytedenudation->patient4->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_patient4" class="form-group ivf_oocytedenudation_patient4">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient4"><?php echo strval($ivf_oocytedenudation->patient4->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($ivf_oocytedenudation->patient4->ViewValue) : $ivf_oocytedenudation->patient4->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($ivf_oocytedenudation->patient4->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($ivf_oocytedenudation->patient4->ReadOnly || $ivf_oocytedenudation->patient4->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient4',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $ivf_oocytedenudation->patient4->Lookup->getParamTag("p_x" . $ivf_oocytedenudation_grid->RowIndex . "_patient4") ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient4" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $ivf_oocytedenudation->patient4->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient4" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient4" value="<?php echo $ivf_oocytedenudation->patient4->CurrentValue ?>"<?php echo $ivf_oocytedenudation->patient4->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_patient4" class="ivf_oocytedenudation_patient4">
<span<?php echo $ivf_oocytedenudation->patient4->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->patient4->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient4" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient4" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient4" value="<?php echo HtmlEncode($ivf_oocytedenudation->patient4->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient4" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient4" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient4" value="<?php echo HtmlEncode($ivf_oocytedenudation->patient4->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient4" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient4" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient4" value="<?php echo HtmlEncode($ivf_oocytedenudation->patient4->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient4" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient4" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient4" value="<?php echo HtmlEncode($ivf_oocytedenudation->patient4->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->OocytesDonate3->Visible) { // OocytesDonate3 ?>
		<td data-name="OocytesDonate3"<?php echo $ivf_oocytedenudation->OocytesDonate3->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_OocytesDonate3" class="form-group ivf_oocytedenudation_OocytesDonate3">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_OocytesDonate3" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate3" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate3" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->OocytesDonate3->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->OocytesDonate3->EditValue ?>"<?php echo $ivf_oocytedenudation->OocytesDonate3->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocytesDonate3" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate3" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate3" value="<?php echo HtmlEncode($ivf_oocytedenudation->OocytesDonate3->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_OocytesDonate3" class="form-group ivf_oocytedenudation_OocytesDonate3">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_OocytesDonate3" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate3" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate3" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->OocytesDonate3->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->OocytesDonate3->EditValue ?>"<?php echo $ivf_oocytedenudation->OocytesDonate3->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_OocytesDonate3" class="ivf_oocytedenudation_OocytesDonate3">
<span<?php echo $ivf_oocytedenudation->OocytesDonate3->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->OocytesDonate3->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocytesDonate3" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate3" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate3" value="<?php echo HtmlEncode($ivf_oocytedenudation->OocytesDonate3->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocytesDonate3" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate3" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate3" value="<?php echo HtmlEncode($ivf_oocytedenudation->OocytesDonate3->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocytesDonate3" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate3" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate3" value="<?php echo HtmlEncode($ivf_oocytedenudation->OocytesDonate3->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocytesDonate3" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate3" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate3" value="<?php echo HtmlEncode($ivf_oocytedenudation->OocytesDonate3->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->OocytesDonate4->Visible) { // OocytesDonate4 ?>
		<td data-name="OocytesDonate4"<?php echo $ivf_oocytedenudation->OocytesDonate4->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_OocytesDonate4" class="form-group ivf_oocytedenudation_OocytesDonate4">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_OocytesDonate4" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate4" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate4" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->OocytesDonate4->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->OocytesDonate4->EditValue ?>"<?php echo $ivf_oocytedenudation->OocytesDonate4->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocytesDonate4" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate4" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate4" value="<?php echo HtmlEncode($ivf_oocytedenudation->OocytesDonate4->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_OocytesDonate4" class="form-group ivf_oocytedenudation_OocytesDonate4">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_OocytesDonate4" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate4" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate4" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->OocytesDonate4->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->OocytesDonate4->EditValue ?>"<?php echo $ivf_oocytedenudation->OocytesDonate4->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_OocytesDonate4" class="ivf_oocytedenudation_OocytesDonate4">
<span<?php echo $ivf_oocytedenudation->OocytesDonate4->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->OocytesDonate4->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocytesDonate4" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate4" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate4" value="<?php echo HtmlEncode($ivf_oocytedenudation->OocytesDonate4->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocytesDonate4" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate4" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate4" value="<?php echo HtmlEncode($ivf_oocytedenudation->OocytesDonate4->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocytesDonate4" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate4" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate4" value="<?php echo HtmlEncode($ivf_oocytedenudation->OocytesDonate4->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocytesDonate4" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate4" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate4" value="<?php echo HtmlEncode($ivf_oocytedenudation->OocytesDonate4->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->MIOocytesDonate3->Visible) { // MIOocytesDonate3 ?>
		<td data-name="MIOocytesDonate3"<?php echo $ivf_oocytedenudation->MIOocytesDonate3->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_MIOocytesDonate3" class="form-group ivf_oocytedenudation_MIOocytesDonate3">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate3" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate3" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate3" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->MIOocytesDonate3->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->MIOocytesDonate3->EditValue ?>"<?php echo $ivf_oocytedenudation->MIOocytesDonate3->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate3" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate3" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate3" value="<?php echo HtmlEncode($ivf_oocytedenudation->MIOocytesDonate3->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_MIOocytesDonate3" class="form-group ivf_oocytedenudation_MIOocytesDonate3">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate3" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate3" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate3" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->MIOocytesDonate3->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->MIOocytesDonate3->EditValue ?>"<?php echo $ivf_oocytedenudation->MIOocytesDonate3->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_MIOocytesDonate3" class="ivf_oocytedenudation_MIOocytesDonate3">
<span<?php echo $ivf_oocytedenudation->MIOocytesDonate3->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->MIOocytesDonate3->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate3" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate3" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate3" value="<?php echo HtmlEncode($ivf_oocytedenudation->MIOocytesDonate3->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate3" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate3" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate3" value="<?php echo HtmlEncode($ivf_oocytedenudation->MIOocytesDonate3->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate3" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate3" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate3" value="<?php echo HtmlEncode($ivf_oocytedenudation->MIOocytesDonate3->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate3" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate3" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate3" value="<?php echo HtmlEncode($ivf_oocytedenudation->MIOocytesDonate3->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->MIOocytesDonate4->Visible) { // MIOocytesDonate4 ?>
		<td data-name="MIOocytesDonate4"<?php echo $ivf_oocytedenudation->MIOocytesDonate4->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_MIOocytesDonate4" class="form-group ivf_oocytedenudation_MIOocytesDonate4">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate4" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate4" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate4" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->MIOocytesDonate4->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->MIOocytesDonate4->EditValue ?>"<?php echo $ivf_oocytedenudation->MIOocytesDonate4->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate4" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate4" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate4" value="<?php echo HtmlEncode($ivf_oocytedenudation->MIOocytesDonate4->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_MIOocytesDonate4" class="form-group ivf_oocytedenudation_MIOocytesDonate4">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate4" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate4" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate4" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->MIOocytesDonate4->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->MIOocytesDonate4->EditValue ?>"<?php echo $ivf_oocytedenudation->MIOocytesDonate4->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_MIOocytesDonate4" class="ivf_oocytedenudation_MIOocytesDonate4">
<span<?php echo $ivf_oocytedenudation->MIOocytesDonate4->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->MIOocytesDonate4->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate4" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate4" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate4" value="<?php echo HtmlEncode($ivf_oocytedenudation->MIOocytesDonate4->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate4" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate4" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate4" value="<?php echo HtmlEncode($ivf_oocytedenudation->MIOocytesDonate4->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate4" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate4" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate4" value="<?php echo HtmlEncode($ivf_oocytedenudation->MIOocytesDonate4->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate4" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate4" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate4" value="<?php echo HtmlEncode($ivf_oocytedenudation->MIOocytesDonate4->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->SelfOocytesMI->Visible) { // SelfOocytesMI ?>
		<td data-name="SelfOocytesMI"<?php echo $ivf_oocytedenudation->SelfOocytesMI->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_SelfOocytesMI" class="form-group ivf_oocytedenudation_SelfOocytesMI">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_SelfOocytesMI" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMI" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMI" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->SelfOocytesMI->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->SelfOocytesMI->EditValue ?>"<?php echo $ivf_oocytedenudation->SelfOocytesMI->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfOocytesMI" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMI" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMI" value="<?php echo HtmlEncode($ivf_oocytedenudation->SelfOocytesMI->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_SelfOocytesMI" class="form-group ivf_oocytedenudation_SelfOocytesMI">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_SelfOocytesMI" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMI" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMI" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->SelfOocytesMI->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->SelfOocytesMI->EditValue ?>"<?php echo $ivf_oocytedenudation->SelfOocytesMI->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_SelfOocytesMI" class="ivf_oocytedenudation_SelfOocytesMI">
<span<?php echo $ivf_oocytedenudation->SelfOocytesMI->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->SelfOocytesMI->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfOocytesMI" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMI" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMI" value="<?php echo HtmlEncode($ivf_oocytedenudation->SelfOocytesMI->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfOocytesMI" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMI" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMI" value="<?php echo HtmlEncode($ivf_oocytedenudation->SelfOocytesMI->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfOocytesMI" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMI" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMI" value="<?php echo HtmlEncode($ivf_oocytedenudation->SelfOocytesMI->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfOocytesMI" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMI" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMI" value="<?php echo HtmlEncode($ivf_oocytedenudation->SelfOocytesMI->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->SelfOocytesMII->Visible) { // SelfOocytesMII ?>
		<td data-name="SelfOocytesMII"<?php echo $ivf_oocytedenudation->SelfOocytesMII->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_SelfOocytesMII" class="form-group ivf_oocytedenudation_SelfOocytesMII">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_SelfOocytesMII" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMII" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMII" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->SelfOocytesMII->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->SelfOocytesMII->EditValue ?>"<?php echo $ivf_oocytedenudation->SelfOocytesMII->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfOocytesMII" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMII" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMII" value="<?php echo HtmlEncode($ivf_oocytedenudation->SelfOocytesMII->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_SelfOocytesMII" class="form-group ivf_oocytedenudation_SelfOocytesMII">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_SelfOocytesMII" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMII" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMII" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->SelfOocytesMII->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->SelfOocytesMII->EditValue ?>"<?php echo $ivf_oocytedenudation->SelfOocytesMII->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_SelfOocytesMII" class="ivf_oocytedenudation_SelfOocytesMII">
<span<?php echo $ivf_oocytedenudation->SelfOocytesMII->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->SelfOocytesMII->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfOocytesMII" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMII" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMII" value="<?php echo HtmlEncode($ivf_oocytedenudation->SelfOocytesMII->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfOocytesMII" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMII" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMII" value="<?php echo HtmlEncode($ivf_oocytedenudation->SelfOocytesMII->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfOocytesMII" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMII" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMII" value="<?php echo HtmlEncode($ivf_oocytedenudation->SelfOocytesMII->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfOocytesMII" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMII" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMII" value="<?php echo HtmlEncode($ivf_oocytedenudation->SelfOocytesMII->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->donor->Visible) { // donor ?>
		<td data-name="donor"<?php echo $ivf_oocytedenudation->donor->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_donor" class="form-group ivf_oocytedenudation_donor">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_donor" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_donor" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_donor" size="30" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->donor->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->donor->EditValue ?>"<?php echo $ivf_oocytedenudation->donor->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_donor" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_donor" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_donor" value="<?php echo HtmlEncode($ivf_oocytedenudation->donor->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_donor" class="form-group ivf_oocytedenudation_donor">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_donor" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_donor" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_donor" size="30" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->donor->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->donor->EditValue ?>"<?php echo $ivf_oocytedenudation->donor->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCnt ?>_ivf_oocytedenudation_donor" class="ivf_oocytedenudation_donor">
<span<?php echo $ivf_oocytedenudation->donor->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->donor->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_donor" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_donor" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_donor" value="<?php echo HtmlEncode($ivf_oocytedenudation->donor->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_donor" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_donor" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_donor" value="<?php echo HtmlEncode($ivf_oocytedenudation->donor->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_donor" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_donor" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_donor" value="<?php echo HtmlEncode($ivf_oocytedenudation->donor->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_donor" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_donor" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_donor" value="<?php echo HtmlEncode($ivf_oocytedenudation->donor->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_oocytedenudation_grid->ListOptions->render("body", "right", $ivf_oocytedenudation_grid->RowCnt);
?>
	</tr>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD || $ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { ?>
<script>
fivf_oocytedenudationgrid.updateLists(<?php echo $ivf_oocytedenudation_grid->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$ivf_oocytedenudation->isGridAdd() || $ivf_oocytedenudation->CurrentMode == "copy")
		if (!$ivf_oocytedenudation_grid->Recordset->EOF)
			$ivf_oocytedenudation_grid->Recordset->moveNext();
}
?>
<?php
	if ($ivf_oocytedenudation->CurrentMode == "add" || $ivf_oocytedenudation->CurrentMode == "copy" || $ivf_oocytedenudation->CurrentMode == "edit") {
		$ivf_oocytedenudation_grid->RowIndex = '$rowindex$';
		$ivf_oocytedenudation_grid->loadRowValues();

		// Set row properties
		$ivf_oocytedenudation->resetAttributes();
		$ivf_oocytedenudation->RowAttrs = array_merge($ivf_oocytedenudation->RowAttrs, array('data-rowindex'=>$ivf_oocytedenudation_grid->RowIndex, 'id'=>'r0_ivf_oocytedenudation', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($ivf_oocytedenudation->RowAttrs["class"], "ew-template");
		$ivf_oocytedenudation->RowType = ROWTYPE_ADD;

		// Render row
		$ivf_oocytedenudation_grid->renderRow();

		// Render list options
		$ivf_oocytedenudation_grid->renderListOptions();
		$ivf_oocytedenudation_grid->StartRowCnt = 0;
?>
	<tr<?php echo $ivf_oocytedenudation->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_oocytedenudation_grid->ListOptions->render("body", "left", $ivf_oocytedenudation_grid->RowIndex);
?>
	<?php if ($ivf_oocytedenudation->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_id" class="form-group ivf_oocytedenudation_id">
<span<?php echo $ivf_oocytedenudation->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_oocytedenudation->id->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_id" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_id" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_oocytedenudation->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_id" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_id" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_oocytedenudation->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->RIDNo->Visible) { // RIDNo ?>
		<td data-name="RIDNo">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<?php if ($ivf_oocytedenudation->RIDNo->getSessionValue() <> "") { ?>
<span id="el$rowindex$_ivf_oocytedenudation_RIDNo" class="form-group ivf_oocytedenudation_RIDNo">
<span<?php echo $ivf_oocytedenudation->RIDNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_oocytedenudation->RIDNo->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RIDNo" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_oocytedenudation->RIDNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_RIDNo" class="form-group ivf_oocytedenudation_RIDNo">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_RIDNo" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RIDNo" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RIDNo" size="30" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->RIDNo->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->RIDNo->EditValue ?>"<?php echo $ivf_oocytedenudation->RIDNo->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_RIDNo" class="form-group ivf_oocytedenudation_RIDNo">
<span<?php echo $ivf_oocytedenudation->RIDNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_oocytedenudation->RIDNo->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_RIDNo" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RIDNo" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_oocytedenudation->RIDNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_RIDNo" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RIDNo" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_oocytedenudation->RIDNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->Name->Visible) { // Name ?>
		<td data-name="Name">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<?php if ($ivf_oocytedenudation->Name->getSessionValue() <> "") { ?>
<span id="el$rowindex$_ivf_oocytedenudation_Name" class="form-group ivf_oocytedenudation_Name">
<span<?php echo $ivf_oocytedenudation->Name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_oocytedenudation->Name->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Name" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_oocytedenudation->Name->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_Name" class="form-group ivf_oocytedenudation_Name">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_Name" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Name" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->Name->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->Name->EditValue ?>"<?php echo $ivf_oocytedenudation->Name->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_Name" class="form-group ivf_oocytedenudation_Name">
<span<?php echo $ivf_oocytedenudation->Name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_oocytedenudation->Name->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_Name" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Name" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_oocytedenudation->Name->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_Name" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Name" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_oocytedenudation->Name->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->ResultDate->Visible) { // ResultDate ?>
		<td data-name="ResultDate">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_ResultDate" class="form-group ivf_oocytedenudation_ResultDate">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_ResultDate" data-format="11" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ResultDate" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ResultDate" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->ResultDate->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->ResultDate->EditValue ?>"<?php echo $ivf_oocytedenudation->ResultDate->editAttributes() ?>>
<?php if (!$ivf_oocytedenudation->ResultDate->ReadOnly && !$ivf_oocytedenudation->ResultDate->Disabled && !isset($ivf_oocytedenudation->ResultDate->EditAttrs["readonly"]) && !isset($ivf_oocytedenudation->ResultDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_oocytedenudationgrid", "x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_ResultDate" class="form-group ivf_oocytedenudation_ResultDate">
<span<?php echo $ivf_oocytedenudation->ResultDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_oocytedenudation->ResultDate->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_ResultDate" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ResultDate" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($ivf_oocytedenudation->ResultDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_ResultDate" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ResultDate" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($ivf_oocytedenudation->ResultDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->Surgeon->Visible) { // Surgeon ?>
		<td data-name="Surgeon">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_Surgeon" class="form-group ivf_oocytedenudation_Surgeon">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_Surgeon" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Surgeon" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Surgeon" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->Surgeon->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->Surgeon->EditValue ?>"<?php echo $ivf_oocytedenudation->Surgeon->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_Surgeon" class="form-group ivf_oocytedenudation_Surgeon">
<span<?php echo $ivf_oocytedenudation->Surgeon->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_oocytedenudation->Surgeon->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_Surgeon" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Surgeon" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Surgeon" value="<?php echo HtmlEncode($ivf_oocytedenudation->Surgeon->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_Surgeon" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Surgeon" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Surgeon" value="<?php echo HtmlEncode($ivf_oocytedenudation->Surgeon->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->AsstSurgeon->Visible) { // AsstSurgeon ?>
		<td data-name="AsstSurgeon">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_AsstSurgeon" class="form-group ivf_oocytedenudation_AsstSurgeon">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_AsstSurgeon" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AsstSurgeon" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AsstSurgeon" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->AsstSurgeon->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->AsstSurgeon->EditValue ?>"<?php echo $ivf_oocytedenudation->AsstSurgeon->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_AsstSurgeon" class="form-group ivf_oocytedenudation_AsstSurgeon">
<span<?php echo $ivf_oocytedenudation->AsstSurgeon->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_oocytedenudation->AsstSurgeon->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_AsstSurgeon" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AsstSurgeon" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AsstSurgeon" value="<?php echo HtmlEncode($ivf_oocytedenudation->AsstSurgeon->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_AsstSurgeon" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AsstSurgeon" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AsstSurgeon" value="<?php echo HtmlEncode($ivf_oocytedenudation->AsstSurgeon->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->Anaesthetist->Visible) { // Anaesthetist ?>
		<td data-name="Anaesthetist">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_Anaesthetist" class="form-group ivf_oocytedenudation_Anaesthetist">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_Anaesthetist" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Anaesthetist" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Anaesthetist" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->Anaesthetist->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->Anaesthetist->EditValue ?>"<?php echo $ivf_oocytedenudation->Anaesthetist->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_Anaesthetist" class="form-group ivf_oocytedenudation_Anaesthetist">
<span<?php echo $ivf_oocytedenudation->Anaesthetist->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_oocytedenudation->Anaesthetist->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_Anaesthetist" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Anaesthetist" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Anaesthetist" value="<?php echo HtmlEncode($ivf_oocytedenudation->Anaesthetist->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_Anaesthetist" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Anaesthetist" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Anaesthetist" value="<?php echo HtmlEncode($ivf_oocytedenudation->Anaesthetist->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->AnaestheiaType->Visible) { // AnaestheiaType ?>
		<td data-name="AnaestheiaType">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_AnaestheiaType" class="form-group ivf_oocytedenudation_AnaestheiaType">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_AnaestheiaType" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AnaestheiaType" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AnaestheiaType" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->AnaestheiaType->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->AnaestheiaType->EditValue ?>"<?php echo $ivf_oocytedenudation->AnaestheiaType->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_AnaestheiaType" class="form-group ivf_oocytedenudation_AnaestheiaType">
<span<?php echo $ivf_oocytedenudation->AnaestheiaType->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_oocytedenudation->AnaestheiaType->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_AnaestheiaType" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AnaestheiaType" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AnaestheiaType" value="<?php echo HtmlEncode($ivf_oocytedenudation->AnaestheiaType->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_AnaestheiaType" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AnaestheiaType" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AnaestheiaType" value="<?php echo HtmlEncode($ivf_oocytedenudation->AnaestheiaType->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->PrimaryEmbryologist->Visible) { // PrimaryEmbryologist ?>
		<td data-name="PrimaryEmbryologist">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_PrimaryEmbryologist" class="form-group ivf_oocytedenudation_PrimaryEmbryologist">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_PrimaryEmbryologist" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_PrimaryEmbryologist" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_PrimaryEmbryologist" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->PrimaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->PrimaryEmbryologist->EditValue ?>"<?php echo $ivf_oocytedenudation->PrimaryEmbryologist->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_PrimaryEmbryologist" class="form-group ivf_oocytedenudation_PrimaryEmbryologist">
<span<?php echo $ivf_oocytedenudation->PrimaryEmbryologist->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_oocytedenudation->PrimaryEmbryologist->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_PrimaryEmbryologist" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_PrimaryEmbryologist" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_PrimaryEmbryologist" value="<?php echo HtmlEncode($ivf_oocytedenudation->PrimaryEmbryologist->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_PrimaryEmbryologist" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_PrimaryEmbryologist" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_PrimaryEmbryologist" value="<?php echo HtmlEncode($ivf_oocytedenudation->PrimaryEmbryologist->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->SecondaryEmbryologist->Visible) { // SecondaryEmbryologist ?>
		<td data-name="SecondaryEmbryologist">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_SecondaryEmbryologist" class="form-group ivf_oocytedenudation_SecondaryEmbryologist">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_SecondaryEmbryologist" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryEmbryologist" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryEmbryologist" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->SecondaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->SecondaryEmbryologist->EditValue ?>"<?php echo $ivf_oocytedenudation->SecondaryEmbryologist->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_SecondaryEmbryologist" class="form-group ivf_oocytedenudation_SecondaryEmbryologist">
<span<?php echo $ivf_oocytedenudation->SecondaryEmbryologist->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_oocytedenudation->SecondaryEmbryologist->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SecondaryEmbryologist" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryEmbryologist" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryEmbryologist" value="<?php echo HtmlEncode($ivf_oocytedenudation->SecondaryEmbryologist->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SecondaryEmbryologist" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryEmbryologist" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryEmbryologist" value="<?php echo HtmlEncode($ivf_oocytedenudation->SecondaryEmbryologist->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->NoOfFolliclesRight->Visible) { // NoOfFolliclesRight ?>
		<td data-name="NoOfFolliclesRight">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_NoOfFolliclesRight" class="form-group ivf_oocytedenudation_NoOfFolliclesRight">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_NoOfFolliclesRight" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesRight" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesRight" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->NoOfFolliclesRight->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->NoOfFolliclesRight->EditValue ?>"<?php echo $ivf_oocytedenudation->NoOfFolliclesRight->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_NoOfFolliclesRight" class="form-group ivf_oocytedenudation_NoOfFolliclesRight">
<span<?php echo $ivf_oocytedenudation->NoOfFolliclesRight->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_oocytedenudation->NoOfFolliclesRight->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_NoOfFolliclesRight" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesRight" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesRight" value="<?php echo HtmlEncode($ivf_oocytedenudation->NoOfFolliclesRight->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_NoOfFolliclesRight" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesRight" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesRight" value="<?php echo HtmlEncode($ivf_oocytedenudation->NoOfFolliclesRight->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->NoOfFolliclesLeft->Visible) { // NoOfFolliclesLeft ?>
		<td data-name="NoOfFolliclesLeft">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_NoOfFolliclesLeft" class="form-group ivf_oocytedenudation_NoOfFolliclesLeft">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_NoOfFolliclesLeft" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesLeft" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesLeft" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->NoOfFolliclesLeft->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->NoOfFolliclesLeft->EditValue ?>"<?php echo $ivf_oocytedenudation->NoOfFolliclesLeft->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_NoOfFolliclesLeft" class="form-group ivf_oocytedenudation_NoOfFolliclesLeft">
<span<?php echo $ivf_oocytedenudation->NoOfFolliclesLeft->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_oocytedenudation->NoOfFolliclesLeft->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_NoOfFolliclesLeft" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesLeft" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesLeft" value="<?php echo HtmlEncode($ivf_oocytedenudation->NoOfFolliclesLeft->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_NoOfFolliclesLeft" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesLeft" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesLeft" value="<?php echo HtmlEncode($ivf_oocytedenudation->NoOfFolliclesLeft->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->NoOfOocytes->Visible) { // NoOfOocytes ?>
		<td data-name="NoOfOocytes">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_NoOfOocytes" class="form-group ivf_oocytedenudation_NoOfOocytes">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_NoOfOocytes" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfOocytes" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfOocytes" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->NoOfOocytes->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->NoOfOocytes->EditValue ?>"<?php echo $ivf_oocytedenudation->NoOfOocytes->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_NoOfOocytes" class="form-group ivf_oocytedenudation_NoOfOocytes">
<span<?php echo $ivf_oocytedenudation->NoOfOocytes->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_oocytedenudation->NoOfOocytes->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_NoOfOocytes" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfOocytes" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfOocytes" value="<?php echo HtmlEncode($ivf_oocytedenudation->NoOfOocytes->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_NoOfOocytes" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfOocytes" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfOocytes" value="<?php echo HtmlEncode($ivf_oocytedenudation->NoOfOocytes->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->RecordOocyteDenudation->Visible) { // RecordOocyteDenudation ?>
		<td data-name="RecordOocyteDenudation">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_RecordOocyteDenudation" class="form-group ivf_oocytedenudation_RecordOocyteDenudation">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_RecordOocyteDenudation" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RecordOocyteDenudation" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RecordOocyteDenudation" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->RecordOocyteDenudation->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->RecordOocyteDenudation->EditValue ?>"<?php echo $ivf_oocytedenudation->RecordOocyteDenudation->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_RecordOocyteDenudation" class="form-group ivf_oocytedenudation_RecordOocyteDenudation">
<span<?php echo $ivf_oocytedenudation->RecordOocyteDenudation->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_oocytedenudation->RecordOocyteDenudation->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_RecordOocyteDenudation" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RecordOocyteDenudation" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RecordOocyteDenudation" value="<?php echo HtmlEncode($ivf_oocytedenudation->RecordOocyteDenudation->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_RecordOocyteDenudation" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RecordOocyteDenudation" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RecordOocyteDenudation" value="<?php echo HtmlEncode($ivf_oocytedenudation->RecordOocyteDenudation->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->DateOfDenudation->Visible) { // DateOfDenudation ?>
		<td data-name="DateOfDenudation">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_DateOfDenudation" class="form-group ivf_oocytedenudation_DateOfDenudation">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_DateOfDenudation" data-format="11" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DateOfDenudation" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DateOfDenudation" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->DateOfDenudation->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->DateOfDenudation->EditValue ?>"<?php echo $ivf_oocytedenudation->DateOfDenudation->editAttributes() ?>>
<?php if (!$ivf_oocytedenudation->DateOfDenudation->ReadOnly && !$ivf_oocytedenudation->DateOfDenudation->Disabled && !isset($ivf_oocytedenudation->DateOfDenudation->EditAttrs["readonly"]) && !isset($ivf_oocytedenudation->DateOfDenudation->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_oocytedenudationgrid", "x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DateOfDenudation", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_DateOfDenudation" class="form-group ivf_oocytedenudation_DateOfDenudation">
<span<?php echo $ivf_oocytedenudation->DateOfDenudation->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_oocytedenudation->DateOfDenudation->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_DateOfDenudation" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DateOfDenudation" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DateOfDenudation" value="<?php echo HtmlEncode($ivf_oocytedenudation->DateOfDenudation->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_DateOfDenudation" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DateOfDenudation" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DateOfDenudation" value="<?php echo HtmlEncode($ivf_oocytedenudation->DateOfDenudation->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->DenudationDoneBy->Visible) { // DenudationDoneBy ?>
		<td data-name="DenudationDoneBy">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_DenudationDoneBy" class="form-group ivf_oocytedenudation_DenudationDoneBy">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_DenudationDoneBy" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DenudationDoneBy" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DenudationDoneBy" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->DenudationDoneBy->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->DenudationDoneBy->EditValue ?>"<?php echo $ivf_oocytedenudation->DenudationDoneBy->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_DenudationDoneBy" class="form-group ivf_oocytedenudation_DenudationDoneBy">
<span<?php echo $ivf_oocytedenudation->DenudationDoneBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_oocytedenudation->DenudationDoneBy->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_DenudationDoneBy" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DenudationDoneBy" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DenudationDoneBy" value="<?php echo HtmlEncode($ivf_oocytedenudation->DenudationDoneBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_DenudationDoneBy" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DenudationDoneBy" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DenudationDoneBy" value="<?php echo HtmlEncode($ivf_oocytedenudation->DenudationDoneBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->status->Visible) { // status ?>
		<td data-name="status">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_status" class="form-group ivf_oocytedenudation_status">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_status" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_status" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_status" size="30" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->status->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->status->EditValue ?>"<?php echo $ivf_oocytedenudation->status->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_status" class="form-group ivf_oocytedenudation_status">
<span<?php echo $ivf_oocytedenudation->status->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_oocytedenudation->status->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_status" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_status" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($ivf_oocytedenudation->status->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_status" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_status" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($ivf_oocytedenudation->status->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->createdby->Visible) { // createdby ?>
		<td data-name="createdby">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_createdby" class="form-group ivf_oocytedenudation_createdby">
<span<?php echo $ivf_oocytedenudation->createdby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_oocytedenudation->createdby->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_createdby" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_createdby" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($ivf_oocytedenudation->createdby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_createdby" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_createdby" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($ivf_oocytedenudation->createdby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_createddatetime" class="form-group ivf_oocytedenudation_createddatetime">
<span<?php echo $ivf_oocytedenudation->createddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_oocytedenudation->createddatetime->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_createddatetime" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_createddatetime" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($ivf_oocytedenudation->createddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_createddatetime" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_createddatetime" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($ivf_oocytedenudation->createddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_modifiedby" class="form-group ivf_oocytedenudation_modifiedby">
<span<?php echo $ivf_oocytedenudation->modifiedby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_oocytedenudation->modifiedby->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_modifiedby" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_modifiedby" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($ivf_oocytedenudation->modifiedby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_modifiedby" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_modifiedby" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($ivf_oocytedenudation->modifiedby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_modifieddatetime" class="form-group ivf_oocytedenudation_modifieddatetime">
<span<?php echo $ivf_oocytedenudation->modifieddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_oocytedenudation->modifieddatetime->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_modifieddatetime" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($ivf_oocytedenudation->modifieddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_modifieddatetime" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($ivf_oocytedenudation->modifieddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<?php if ($ivf_oocytedenudation->TidNo->getSessionValue() <> "") { ?>
<span id="el$rowindex$_ivf_oocytedenudation_TidNo" class="form-group ivf_oocytedenudation_TidNo">
<span<?php echo $ivf_oocytedenudation->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_oocytedenudation->TidNo->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_TidNo" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_oocytedenudation->TidNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_TidNo" class="form-group ivf_oocytedenudation_TidNo">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_TidNo" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_TidNo" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_TidNo" size="30" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->TidNo->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->TidNo->EditValue ?>"<?php echo $ivf_oocytedenudation->TidNo->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_TidNo" class="form-group ivf_oocytedenudation_TidNo">
<span<?php echo $ivf_oocytedenudation->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_oocytedenudation->TidNo->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_TidNo" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_TidNo" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_oocytedenudation->TidNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_TidNo" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_TidNo" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_oocytedenudation->TidNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->ExpFollicles->Visible) { // ExpFollicles ?>
		<td data-name="ExpFollicles">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_ExpFollicles" class="form-group ivf_oocytedenudation_ExpFollicles">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_ExpFollicles" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ExpFollicles" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ExpFollicles" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->ExpFollicles->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->ExpFollicles->EditValue ?>"<?php echo $ivf_oocytedenudation->ExpFollicles->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_ExpFollicles" class="form-group ivf_oocytedenudation_ExpFollicles">
<span<?php echo $ivf_oocytedenudation->ExpFollicles->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_oocytedenudation->ExpFollicles->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_ExpFollicles" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ExpFollicles" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ExpFollicles" value="<?php echo HtmlEncode($ivf_oocytedenudation->ExpFollicles->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_ExpFollicles" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ExpFollicles" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ExpFollicles" value="<?php echo HtmlEncode($ivf_oocytedenudation->ExpFollicles->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->SecondaryDenudationDoneBy->Visible) { // SecondaryDenudationDoneBy ?>
		<td data-name="SecondaryDenudationDoneBy">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_SecondaryDenudationDoneBy" class="form-group ivf_oocytedenudation_SecondaryDenudationDoneBy">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_SecondaryDenudationDoneBy" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryDenudationDoneBy" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryDenudationDoneBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->SecondaryDenudationDoneBy->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->SecondaryDenudationDoneBy->EditValue ?>"<?php echo $ivf_oocytedenudation->SecondaryDenudationDoneBy->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_SecondaryDenudationDoneBy" class="form-group ivf_oocytedenudation_SecondaryDenudationDoneBy">
<span<?php echo $ivf_oocytedenudation->SecondaryDenudationDoneBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_oocytedenudation->SecondaryDenudationDoneBy->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SecondaryDenudationDoneBy" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryDenudationDoneBy" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryDenudationDoneBy" value="<?php echo HtmlEncode($ivf_oocytedenudation->SecondaryDenudationDoneBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SecondaryDenudationDoneBy" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryDenudationDoneBy" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryDenudationDoneBy" value="<?php echo HtmlEncode($ivf_oocytedenudation->SecondaryDenudationDoneBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->OocyteOrgin->Visible) { // OocyteOrgin ?>
		<td data-name="OocyteOrgin">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_OocyteOrgin" class="form-group ivf_oocytedenudation_OocyteOrgin">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_oocytedenudation" data-field="x_OocyteOrgin" data-value-separator="<?php echo $ivf_oocytedenudation->OocyteOrgin->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteOrgin" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteOrgin"<?php echo $ivf_oocytedenudation->OocyteOrgin->editAttributes() ?>>
		<?php echo $ivf_oocytedenudation->OocyteOrgin->selectOptionListHtml("x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteOrgin") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_OocyteOrgin" class="form-group ivf_oocytedenudation_OocyteOrgin">
<span<?php echo $ivf_oocytedenudation->OocyteOrgin->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_oocytedenudation->OocyteOrgin->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocyteOrgin" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteOrgin" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteOrgin" value="<?php echo HtmlEncode($ivf_oocytedenudation->OocyteOrgin->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocyteOrgin" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteOrgin" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteOrgin" value="<?php echo HtmlEncode($ivf_oocytedenudation->OocyteOrgin->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->patient1->Visible) { // patient1 ?>
		<td data-name="patient1">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_patient1" class="form-group ivf_oocytedenudation_patient1">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient1"><?php echo strval($ivf_oocytedenudation->patient1->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($ivf_oocytedenudation->patient1->ViewValue) : $ivf_oocytedenudation->patient1->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($ivf_oocytedenudation->patient1->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($ivf_oocytedenudation->patient1->ReadOnly || $ivf_oocytedenudation->patient1->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient1',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $ivf_oocytedenudation->patient1->Lookup->getParamTag("p_x" . $ivf_oocytedenudation_grid->RowIndex . "_patient1") ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient1" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $ivf_oocytedenudation->patient1->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient1" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient1" value="<?php echo $ivf_oocytedenudation->patient1->CurrentValue ?>"<?php echo $ivf_oocytedenudation->patient1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_patient1" class="form-group ivf_oocytedenudation_patient1">
<span<?php echo $ivf_oocytedenudation->patient1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_oocytedenudation->patient1->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient1" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient1" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient1" value="<?php echo HtmlEncode($ivf_oocytedenudation->patient1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient1" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient1" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient1" value="<?php echo HtmlEncode($ivf_oocytedenudation->patient1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->OocyteType->Visible) { // OocyteType ?>
		<td data-name="OocyteType">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_OocyteType" class="form-group ivf_oocytedenudation_OocyteType">
<div id="tp_x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteType" class="ew-template"><input type="checkbox" class="form-check-input" data-table="ivf_oocytedenudation" data-field="x_OocyteType" data-value-separator="<?php echo $ivf_oocytedenudation->OocyteType->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteType[]" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteType[]" value="{value}"<?php echo $ivf_oocytedenudation->OocyteType->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteType" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_oocytedenudation->OocyteType->checkBoxListHtml(FALSE, "x{$ivf_oocytedenudation_grid->RowIndex}_OocyteType[]") ?>
</div></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_OocyteType" class="form-group ivf_oocytedenudation_OocyteType">
<span<?php echo $ivf_oocytedenudation->OocyteType->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_oocytedenudation->OocyteType->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocyteType" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteType" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteType" value="<?php echo HtmlEncode($ivf_oocytedenudation->OocyteType->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocyteType" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteType[]" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteType[]" value="<?php echo HtmlEncode($ivf_oocytedenudation->OocyteType->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->MIOocytesDonate1->Visible) { // MIOocytesDonate1 ?>
		<td data-name="MIOocytesDonate1">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_MIOocytesDonate1" class="form-group ivf_oocytedenudation_MIOocytesDonate1">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate1" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate1" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->MIOocytesDonate1->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->MIOocytesDonate1->EditValue ?>"<?php echo $ivf_oocytedenudation->MIOocytesDonate1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_MIOocytesDonate1" class="form-group ivf_oocytedenudation_MIOocytesDonate1">
<span<?php echo $ivf_oocytedenudation->MIOocytesDonate1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_oocytedenudation->MIOocytesDonate1->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate1" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate1" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate1" value="<?php echo HtmlEncode($ivf_oocytedenudation->MIOocytesDonate1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate1" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate1" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate1" value="<?php echo HtmlEncode($ivf_oocytedenudation->MIOocytesDonate1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->MIOocytesDonate2->Visible) { // MIOocytesDonate2 ?>
		<td data-name="MIOocytesDonate2">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_MIOocytesDonate2" class="form-group ivf_oocytedenudation_MIOocytesDonate2">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate2" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate2" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->MIOocytesDonate2->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->MIOocytesDonate2->EditValue ?>"<?php echo $ivf_oocytedenudation->MIOocytesDonate2->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_MIOocytesDonate2" class="form-group ivf_oocytedenudation_MIOocytesDonate2">
<span<?php echo $ivf_oocytedenudation->MIOocytesDonate2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_oocytedenudation->MIOocytesDonate2->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate2" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate2" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate2" value="<?php echo HtmlEncode($ivf_oocytedenudation->MIOocytesDonate2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate2" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate2" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate2" value="<?php echo HtmlEncode($ivf_oocytedenudation->MIOocytesDonate2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->SelfMI->Visible) { // SelfMI ?>
		<td data-name="SelfMI">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_SelfMI" class="form-group ivf_oocytedenudation_SelfMI">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_SelfMI" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMI" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMI" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->SelfMI->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->SelfMI->EditValue ?>"<?php echo $ivf_oocytedenudation->SelfMI->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_SelfMI" class="form-group ivf_oocytedenudation_SelfMI">
<span<?php echo $ivf_oocytedenudation->SelfMI->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_oocytedenudation->SelfMI->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfMI" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMI" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMI" value="<?php echo HtmlEncode($ivf_oocytedenudation->SelfMI->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfMI" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMI" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMI" value="<?php echo HtmlEncode($ivf_oocytedenudation->SelfMI->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->SelfMII->Visible) { // SelfMII ?>
		<td data-name="SelfMII">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_SelfMII" class="form-group ivf_oocytedenudation_SelfMII">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_SelfMII" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMII" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMII" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->SelfMII->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->SelfMII->EditValue ?>"<?php echo $ivf_oocytedenudation->SelfMII->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_SelfMII" class="form-group ivf_oocytedenudation_SelfMII">
<span<?php echo $ivf_oocytedenudation->SelfMII->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_oocytedenudation->SelfMII->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfMII" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMII" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMII" value="<?php echo HtmlEncode($ivf_oocytedenudation->SelfMII->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfMII" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMII" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMII" value="<?php echo HtmlEncode($ivf_oocytedenudation->SelfMII->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->patient3->Visible) { // patient3 ?>
		<td data-name="patient3">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_patient3" class="form-group ivf_oocytedenudation_patient3">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient3"><?php echo strval($ivf_oocytedenudation->patient3->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($ivf_oocytedenudation->patient3->ViewValue) : $ivf_oocytedenudation->patient3->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($ivf_oocytedenudation->patient3->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($ivf_oocytedenudation->patient3->ReadOnly || $ivf_oocytedenudation->patient3->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient3',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $ivf_oocytedenudation->patient3->Lookup->getParamTag("p_x" . $ivf_oocytedenudation_grid->RowIndex . "_patient3") ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient3" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $ivf_oocytedenudation->patient3->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient3" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient3" value="<?php echo $ivf_oocytedenudation->patient3->CurrentValue ?>"<?php echo $ivf_oocytedenudation->patient3->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_patient3" class="form-group ivf_oocytedenudation_patient3">
<span<?php echo $ivf_oocytedenudation->patient3->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_oocytedenudation->patient3->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient3" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient3" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient3" value="<?php echo HtmlEncode($ivf_oocytedenudation->patient3->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient3" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient3" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient3" value="<?php echo HtmlEncode($ivf_oocytedenudation->patient3->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->patient4->Visible) { // patient4 ?>
		<td data-name="patient4">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_patient4" class="form-group ivf_oocytedenudation_patient4">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient4"><?php echo strval($ivf_oocytedenudation->patient4->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($ivf_oocytedenudation->patient4->ViewValue) : $ivf_oocytedenudation->patient4->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($ivf_oocytedenudation->patient4->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($ivf_oocytedenudation->patient4->ReadOnly || $ivf_oocytedenudation->patient4->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient4',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $ivf_oocytedenudation->patient4->Lookup->getParamTag("p_x" . $ivf_oocytedenudation_grid->RowIndex . "_patient4") ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient4" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $ivf_oocytedenudation->patient4->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient4" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient4" value="<?php echo $ivf_oocytedenudation->patient4->CurrentValue ?>"<?php echo $ivf_oocytedenudation->patient4->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_patient4" class="form-group ivf_oocytedenudation_patient4">
<span<?php echo $ivf_oocytedenudation->patient4->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_oocytedenudation->patient4->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient4" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient4" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient4" value="<?php echo HtmlEncode($ivf_oocytedenudation->patient4->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient4" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient4" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient4" value="<?php echo HtmlEncode($ivf_oocytedenudation->patient4->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->OocytesDonate3->Visible) { // OocytesDonate3 ?>
		<td data-name="OocytesDonate3">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_OocytesDonate3" class="form-group ivf_oocytedenudation_OocytesDonate3">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_OocytesDonate3" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate3" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate3" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->OocytesDonate3->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->OocytesDonate3->EditValue ?>"<?php echo $ivf_oocytedenudation->OocytesDonate3->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_OocytesDonate3" class="form-group ivf_oocytedenudation_OocytesDonate3">
<span<?php echo $ivf_oocytedenudation->OocytesDonate3->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_oocytedenudation->OocytesDonate3->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocytesDonate3" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate3" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate3" value="<?php echo HtmlEncode($ivf_oocytedenudation->OocytesDonate3->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocytesDonate3" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate3" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate3" value="<?php echo HtmlEncode($ivf_oocytedenudation->OocytesDonate3->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->OocytesDonate4->Visible) { // OocytesDonate4 ?>
		<td data-name="OocytesDonate4">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_OocytesDonate4" class="form-group ivf_oocytedenudation_OocytesDonate4">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_OocytesDonate4" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate4" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate4" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->OocytesDonate4->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->OocytesDonate4->EditValue ?>"<?php echo $ivf_oocytedenudation->OocytesDonate4->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_OocytesDonate4" class="form-group ivf_oocytedenudation_OocytesDonate4">
<span<?php echo $ivf_oocytedenudation->OocytesDonate4->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_oocytedenudation->OocytesDonate4->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocytesDonate4" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate4" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate4" value="<?php echo HtmlEncode($ivf_oocytedenudation->OocytesDonate4->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocytesDonate4" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate4" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate4" value="<?php echo HtmlEncode($ivf_oocytedenudation->OocytesDonate4->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->MIOocytesDonate3->Visible) { // MIOocytesDonate3 ?>
		<td data-name="MIOocytesDonate3">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_MIOocytesDonate3" class="form-group ivf_oocytedenudation_MIOocytesDonate3">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate3" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate3" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate3" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->MIOocytesDonate3->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->MIOocytesDonate3->EditValue ?>"<?php echo $ivf_oocytedenudation->MIOocytesDonate3->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_MIOocytesDonate3" class="form-group ivf_oocytedenudation_MIOocytesDonate3">
<span<?php echo $ivf_oocytedenudation->MIOocytesDonate3->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_oocytedenudation->MIOocytesDonate3->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate3" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate3" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate3" value="<?php echo HtmlEncode($ivf_oocytedenudation->MIOocytesDonate3->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate3" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate3" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate3" value="<?php echo HtmlEncode($ivf_oocytedenudation->MIOocytesDonate3->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->MIOocytesDonate4->Visible) { // MIOocytesDonate4 ?>
		<td data-name="MIOocytesDonate4">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_MIOocytesDonate4" class="form-group ivf_oocytedenudation_MIOocytesDonate4">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate4" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate4" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate4" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->MIOocytesDonate4->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->MIOocytesDonate4->EditValue ?>"<?php echo $ivf_oocytedenudation->MIOocytesDonate4->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_MIOocytesDonate4" class="form-group ivf_oocytedenudation_MIOocytesDonate4">
<span<?php echo $ivf_oocytedenudation->MIOocytesDonate4->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_oocytedenudation->MIOocytesDonate4->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate4" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate4" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate4" value="<?php echo HtmlEncode($ivf_oocytedenudation->MIOocytesDonate4->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate4" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate4" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate4" value="<?php echo HtmlEncode($ivf_oocytedenudation->MIOocytesDonate4->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->SelfOocytesMI->Visible) { // SelfOocytesMI ?>
		<td data-name="SelfOocytesMI">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_SelfOocytesMI" class="form-group ivf_oocytedenudation_SelfOocytesMI">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_SelfOocytesMI" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMI" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMI" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->SelfOocytesMI->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->SelfOocytesMI->EditValue ?>"<?php echo $ivf_oocytedenudation->SelfOocytesMI->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_SelfOocytesMI" class="form-group ivf_oocytedenudation_SelfOocytesMI">
<span<?php echo $ivf_oocytedenudation->SelfOocytesMI->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_oocytedenudation->SelfOocytesMI->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfOocytesMI" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMI" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMI" value="<?php echo HtmlEncode($ivf_oocytedenudation->SelfOocytesMI->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfOocytesMI" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMI" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMI" value="<?php echo HtmlEncode($ivf_oocytedenudation->SelfOocytesMI->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->SelfOocytesMII->Visible) { // SelfOocytesMII ?>
		<td data-name="SelfOocytesMII">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_SelfOocytesMII" class="form-group ivf_oocytedenudation_SelfOocytesMII">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_SelfOocytesMII" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMII" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMII" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->SelfOocytesMII->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->SelfOocytesMII->EditValue ?>"<?php echo $ivf_oocytedenudation->SelfOocytesMII->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_SelfOocytesMII" class="form-group ivf_oocytedenudation_SelfOocytesMII">
<span<?php echo $ivf_oocytedenudation->SelfOocytesMII->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_oocytedenudation->SelfOocytesMII->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfOocytesMII" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMII" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMII" value="<?php echo HtmlEncode($ivf_oocytedenudation->SelfOocytesMII->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfOocytesMII" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMII" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMII" value="<?php echo HtmlEncode($ivf_oocytedenudation->SelfOocytesMII->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation->donor->Visible) { // donor ?>
		<td data-name="donor">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_donor" class="form-group ivf_oocytedenudation_donor">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_donor" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_donor" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_donor" size="30" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation->donor->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation->donor->EditValue ?>"<?php echo $ivf_oocytedenudation->donor->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_donor" class="form-group ivf_oocytedenudation_donor">
<span<?php echo $ivf_oocytedenudation->donor->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_oocytedenudation->donor->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_donor" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_donor" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_donor" value="<?php echo HtmlEncode($ivf_oocytedenudation->donor->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_donor" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_donor" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_donor" value="<?php echo HtmlEncode($ivf_oocytedenudation->donor->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_oocytedenudation_grid->ListOptions->render("body", "right", $ivf_oocytedenudation_grid->RowIndex);
?>
<script>
fivf_oocytedenudationgrid.updateLists(<?php echo $ivf_oocytedenudation_grid->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php if ($ivf_oocytedenudation->CurrentMode == "add" || $ivf_oocytedenudation->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $ivf_oocytedenudation_grid->FormKeyCountName ?>" id="<?php echo $ivf_oocytedenudation_grid->FormKeyCountName ?>" value="<?php echo $ivf_oocytedenudation_grid->KeyCount ?>">
<?php echo $ivf_oocytedenudation_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $ivf_oocytedenudation_grid->FormKeyCountName ?>" id="<?php echo $ivf_oocytedenudation_grid->FormKeyCountName ?>" value="<?php echo $ivf_oocytedenudation_grid->KeyCount ?>">
<?php echo $ivf_oocytedenudation_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fivf_oocytedenudationgrid">
</div><!-- /.ew-grid-middle-panel -->
<?php

// Close recordset
if ($ivf_oocytedenudation_grid->Recordset)
	$ivf_oocytedenudation_grid->Recordset->Close();
?>
</div>
<?php if ($ivf_oocytedenudation_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $ivf_oocytedenudation_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($ivf_oocytedenudation_grid->TotalRecs == 0 && !$ivf_oocytedenudation->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $ivf_oocytedenudation_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$ivf_oocytedenudation_grid->terminate();
?>
<?php if (!$ivf_oocytedenudation->isExport()) { ?>
<script>
ew.scrollableTable("gmp_ivf_oocytedenudation", "95%", "");
</script>
<?php } ?>