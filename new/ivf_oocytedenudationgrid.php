<?php
namespace PHPMaker2020\HIMS;

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
<?php if (!$ivf_oocytedenudation_grid->isExport()) { ?>
<script>
var fivf_oocytedenudationgrid, currentPageID;
loadjs.ready("head", function() {

	// Form object
	fivf_oocytedenudationgrid = new ew.Form("fivf_oocytedenudationgrid", "grid");
	fivf_oocytedenudationgrid.formKeyCountName = '<?php echo $ivf_oocytedenudation_grid->FormKeyCountName ?>';

	// Validate form
	fivf_oocytedenudationgrid.validate = function() {
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
			<?php if ($ivf_oocytedenudation_grid->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_grid->id->caption(), $ivf_oocytedenudation_grid->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_grid->RIDNo->Required) { ?>
				elm = this.getElements("x" + infix + "_RIDNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_grid->RIDNo->caption(), $ivf_oocytedenudation_grid->RIDNo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RIDNo");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_oocytedenudation_grid->RIDNo->errorMessage()) ?>");
			<?php if ($ivf_oocytedenudation_grid->Name->Required) { ?>
				elm = this.getElements("x" + infix + "_Name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_grid->Name->caption(), $ivf_oocytedenudation_grid->Name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_grid->ResultDate->Required) { ?>
				elm = this.getElements("x" + infix + "_ResultDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_grid->ResultDate->caption(), $ivf_oocytedenudation_grid->ResultDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ResultDate");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_oocytedenudation_grid->ResultDate->errorMessage()) ?>");
			<?php if ($ivf_oocytedenudation_grid->Surgeon->Required) { ?>
				elm = this.getElements("x" + infix + "_Surgeon");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_grid->Surgeon->caption(), $ivf_oocytedenudation_grid->Surgeon->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_grid->AsstSurgeon->Required) { ?>
				elm = this.getElements("x" + infix + "_AsstSurgeon");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_grid->AsstSurgeon->caption(), $ivf_oocytedenudation_grid->AsstSurgeon->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_grid->Anaesthetist->Required) { ?>
				elm = this.getElements("x" + infix + "_Anaesthetist");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_grid->Anaesthetist->caption(), $ivf_oocytedenudation_grid->Anaesthetist->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_grid->AnaestheiaType->Required) { ?>
				elm = this.getElements("x" + infix + "_AnaestheiaType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_grid->AnaestheiaType->caption(), $ivf_oocytedenudation_grid->AnaestheiaType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_grid->PrimaryEmbryologist->Required) { ?>
				elm = this.getElements("x" + infix + "_PrimaryEmbryologist");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_grid->PrimaryEmbryologist->caption(), $ivf_oocytedenudation_grid->PrimaryEmbryologist->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_grid->SecondaryEmbryologist->Required) { ?>
				elm = this.getElements("x" + infix + "_SecondaryEmbryologist");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_grid->SecondaryEmbryologist->caption(), $ivf_oocytedenudation_grid->SecondaryEmbryologist->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_grid->NoOfFolliclesRight->Required) { ?>
				elm = this.getElements("x" + infix + "_NoOfFolliclesRight");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_grid->NoOfFolliclesRight->caption(), $ivf_oocytedenudation_grid->NoOfFolliclesRight->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_grid->NoOfFolliclesLeft->Required) { ?>
				elm = this.getElements("x" + infix + "_NoOfFolliclesLeft");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_grid->NoOfFolliclesLeft->caption(), $ivf_oocytedenudation_grid->NoOfFolliclesLeft->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_grid->NoOfOocytes->Required) { ?>
				elm = this.getElements("x" + infix + "_NoOfOocytes");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_grid->NoOfOocytes->caption(), $ivf_oocytedenudation_grid->NoOfOocytes->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_grid->RecordOocyteDenudation->Required) { ?>
				elm = this.getElements("x" + infix + "_RecordOocyteDenudation");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_grid->RecordOocyteDenudation->caption(), $ivf_oocytedenudation_grid->RecordOocyteDenudation->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_grid->DateOfDenudation->Required) { ?>
				elm = this.getElements("x" + infix + "_DateOfDenudation");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_grid->DateOfDenudation->caption(), $ivf_oocytedenudation_grid->DateOfDenudation->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DateOfDenudation");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_oocytedenudation_grid->DateOfDenudation->errorMessage()) ?>");
			<?php if ($ivf_oocytedenudation_grid->DenudationDoneBy->Required) { ?>
				elm = this.getElements("x" + infix + "_DenudationDoneBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_grid->DenudationDoneBy->caption(), $ivf_oocytedenudation_grid->DenudationDoneBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_grid->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_grid->status->caption(), $ivf_oocytedenudation_grid->status->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_oocytedenudation_grid->status->errorMessage()) ?>");
			<?php if ($ivf_oocytedenudation_grid->createdby->Required) { ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_grid->createdby->caption(), $ivf_oocytedenudation_grid->createdby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_grid->createddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_grid->createddatetime->caption(), $ivf_oocytedenudation_grid->createddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_grid->modifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_grid->modifiedby->caption(), $ivf_oocytedenudation_grid->modifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_grid->modifieddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_grid->modifieddatetime->caption(), $ivf_oocytedenudation_grid->modifieddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_grid->TidNo->Required) { ?>
				elm = this.getElements("x" + infix + "_TidNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_grid->TidNo->caption(), $ivf_oocytedenudation_grid->TidNo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TidNo");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_oocytedenudation_grid->TidNo->errorMessage()) ?>");
			<?php if ($ivf_oocytedenudation_grid->ExpFollicles->Required) { ?>
				elm = this.getElements("x" + infix + "_ExpFollicles");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_grid->ExpFollicles->caption(), $ivf_oocytedenudation_grid->ExpFollicles->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_grid->SecondaryDenudationDoneBy->Required) { ?>
				elm = this.getElements("x" + infix + "_SecondaryDenudationDoneBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_grid->SecondaryDenudationDoneBy->caption(), $ivf_oocytedenudation_grid->SecondaryDenudationDoneBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_grid->OocyteOrgin->Required) { ?>
				elm = this.getElements("x" + infix + "_OocyteOrgin");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_grid->OocyteOrgin->caption(), $ivf_oocytedenudation_grid->OocyteOrgin->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_grid->patient1->Required) { ?>
				elm = this.getElements("x" + infix + "_patient1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_grid->patient1->caption(), $ivf_oocytedenudation_grid->patient1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_grid->OocyteType->Required) { ?>
				elm = this.getElements("x" + infix + "_OocyteType[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_grid->OocyteType->caption(), $ivf_oocytedenudation_grid->OocyteType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_grid->MIOocytesDonate1->Required) { ?>
				elm = this.getElements("x" + infix + "_MIOocytesDonate1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_grid->MIOocytesDonate1->caption(), $ivf_oocytedenudation_grid->MIOocytesDonate1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_grid->MIOocytesDonate2->Required) { ?>
				elm = this.getElements("x" + infix + "_MIOocytesDonate2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_grid->MIOocytesDonate2->caption(), $ivf_oocytedenudation_grid->MIOocytesDonate2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_grid->SelfMI->Required) { ?>
				elm = this.getElements("x" + infix + "_SelfMI");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_grid->SelfMI->caption(), $ivf_oocytedenudation_grid->SelfMI->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_grid->SelfMII->Required) { ?>
				elm = this.getElements("x" + infix + "_SelfMII");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_grid->SelfMII->caption(), $ivf_oocytedenudation_grid->SelfMII->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_grid->patient3->Required) { ?>
				elm = this.getElements("x" + infix + "_patient3");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_grid->patient3->caption(), $ivf_oocytedenudation_grid->patient3->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_grid->patient4->Required) { ?>
				elm = this.getElements("x" + infix + "_patient4");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_grid->patient4->caption(), $ivf_oocytedenudation_grid->patient4->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_grid->OocytesDonate3->Required) { ?>
				elm = this.getElements("x" + infix + "_OocytesDonate3");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_grid->OocytesDonate3->caption(), $ivf_oocytedenudation_grid->OocytesDonate3->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_grid->OocytesDonate4->Required) { ?>
				elm = this.getElements("x" + infix + "_OocytesDonate4");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_grid->OocytesDonate4->caption(), $ivf_oocytedenudation_grid->OocytesDonate4->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_grid->MIOocytesDonate3->Required) { ?>
				elm = this.getElements("x" + infix + "_MIOocytesDonate3");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_grid->MIOocytesDonate3->caption(), $ivf_oocytedenudation_grid->MIOocytesDonate3->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_grid->MIOocytesDonate4->Required) { ?>
				elm = this.getElements("x" + infix + "_MIOocytesDonate4");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_grid->MIOocytesDonate4->caption(), $ivf_oocytedenudation_grid->MIOocytesDonate4->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_grid->SelfOocytesMI->Required) { ?>
				elm = this.getElements("x" + infix + "_SelfOocytesMI");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_grid->SelfOocytesMI->caption(), $ivf_oocytedenudation_grid->SelfOocytesMI->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_grid->SelfOocytesMII->Required) { ?>
				elm = this.getElements("x" + infix + "_SelfOocytesMII");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_grid->SelfOocytesMII->caption(), $ivf_oocytedenudation_grid->SelfOocytesMII->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
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
		return true;
	}

	// Form_CustomValidate
	fivf_oocytedenudationgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fivf_oocytedenudationgrid.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fivf_oocytedenudationgrid.lists["x_OocyteOrgin"] = <?php echo $ivf_oocytedenudation_grid->OocyteOrgin->Lookup->toClientList($ivf_oocytedenudation_grid) ?>;
	fivf_oocytedenudationgrid.lists["x_OocyteOrgin"].options = <?php echo JsonEncode($ivf_oocytedenudation_grid->OocyteOrgin->options(FALSE, TRUE)) ?>;
	fivf_oocytedenudationgrid.lists["x_patient1"] = <?php echo $ivf_oocytedenudation_grid->patient1->Lookup->toClientList($ivf_oocytedenudation_grid) ?>;
	fivf_oocytedenudationgrid.lists["x_patient1"].options = <?php echo JsonEncode($ivf_oocytedenudation_grid->patient1->lookupOptions()) ?>;
	fivf_oocytedenudationgrid.lists["x_OocyteType[]"] = <?php echo $ivf_oocytedenudation_grid->OocyteType->Lookup->toClientList($ivf_oocytedenudation_grid) ?>;
	fivf_oocytedenudationgrid.lists["x_OocyteType[]"].options = <?php echo JsonEncode($ivf_oocytedenudation_grid->OocyteType->options(FALSE, TRUE)) ?>;
	fivf_oocytedenudationgrid.lists["x_patient3"] = <?php echo $ivf_oocytedenudation_grid->patient3->Lookup->toClientList($ivf_oocytedenudation_grid) ?>;
	fivf_oocytedenudationgrid.lists["x_patient3"].options = <?php echo JsonEncode($ivf_oocytedenudation_grid->patient3->lookupOptions()) ?>;
	fivf_oocytedenudationgrid.lists["x_patient4"] = <?php echo $ivf_oocytedenudation_grid->patient4->Lookup->toClientList($ivf_oocytedenudation_grid) ?>;
	fivf_oocytedenudationgrid.lists["x_patient4"].options = <?php echo JsonEncode($ivf_oocytedenudation_grid->patient4->lookupOptions()) ?>;
	loadjs.done("fivf_oocytedenudationgrid");
});
</script>
<script>
ew.ready("head", "js/ewfixedheadertable.js", "fixedheadertable");
</script>
<?php } ?>
<?php
$ivf_oocytedenudation_grid->renderOtherOptions();
?>
<?php if ($ivf_oocytedenudation_grid->TotalRecords > 0 || $ivf_oocytedenudation->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($ivf_oocytedenudation_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf_oocytedenudation">
<?php if ($ivf_oocytedenudation_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $ivf_oocytedenudation_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fivf_oocytedenudationgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_ivf_oocytedenudation" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_ivf_oocytedenudationgrid" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$ivf_oocytedenudation->RowType = ROWTYPE_HEADER;

// Render list options
$ivf_oocytedenudation_grid->renderListOptions();

// Render list options (header, left)
$ivf_oocytedenudation_grid->ListOptions->render("header", "left");
?>
<?php if ($ivf_oocytedenudation_grid->id->Visible) { // id ?>
	<?php if ($ivf_oocytedenudation_grid->SortUrl($ivf_oocytedenudation_grid->id) == "") { ?>
		<th data-name="id" class="<?php echo $ivf_oocytedenudation_grid->id->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_id" class="ivf_oocytedenudation_id"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $ivf_oocytedenudation_grid->id->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_id" class="ivf_oocytedenudation_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_grid->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_grid->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_grid->RIDNo->Visible) { // RIDNo ?>
	<?php if ($ivf_oocytedenudation_grid->SortUrl($ivf_oocytedenudation_grid->RIDNo) == "") { ?>
		<th data-name="RIDNo" class="<?php echo $ivf_oocytedenudation_grid->RIDNo->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_RIDNo" class="ivf_oocytedenudation_RIDNo"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->RIDNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RIDNo" class="<?php echo $ivf_oocytedenudation_grid->RIDNo->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_RIDNo" class="ivf_oocytedenudation_RIDNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->RIDNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_grid->RIDNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_grid->RIDNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_grid->Name->Visible) { // Name ?>
	<?php if ($ivf_oocytedenudation_grid->SortUrl($ivf_oocytedenudation_grid->Name) == "") { ?>
		<th data-name="Name" class="<?php echo $ivf_oocytedenudation_grid->Name->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_Name" class="ivf_oocytedenudation_Name"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Name" class="<?php echo $ivf_oocytedenudation_grid->Name->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_Name" class="ivf_oocytedenudation_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->Name->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_grid->Name->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_grid->Name->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_grid->ResultDate->Visible) { // ResultDate ?>
	<?php if ($ivf_oocytedenudation_grid->SortUrl($ivf_oocytedenudation_grid->ResultDate) == "") { ?>
		<th data-name="ResultDate" class="<?php echo $ivf_oocytedenudation_grid->ResultDate->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_ResultDate" class="ivf_oocytedenudation_ResultDate"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->ResultDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ResultDate" class="<?php echo $ivf_oocytedenudation_grid->ResultDate->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_ResultDate" class="ivf_oocytedenudation_ResultDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->ResultDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_grid->ResultDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_grid->ResultDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_grid->Surgeon->Visible) { // Surgeon ?>
	<?php if ($ivf_oocytedenudation_grid->SortUrl($ivf_oocytedenudation_grid->Surgeon) == "") { ?>
		<th data-name="Surgeon" class="<?php echo $ivf_oocytedenudation_grid->Surgeon->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_Surgeon" class="ivf_oocytedenudation_Surgeon"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->Surgeon->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Surgeon" class="<?php echo $ivf_oocytedenudation_grid->Surgeon->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_Surgeon" class="ivf_oocytedenudation_Surgeon">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->Surgeon->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_grid->Surgeon->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_grid->Surgeon->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_grid->AsstSurgeon->Visible) { // AsstSurgeon ?>
	<?php if ($ivf_oocytedenudation_grid->SortUrl($ivf_oocytedenudation_grid->AsstSurgeon) == "") { ?>
		<th data-name="AsstSurgeon" class="<?php echo $ivf_oocytedenudation_grid->AsstSurgeon->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_AsstSurgeon" class="ivf_oocytedenudation_AsstSurgeon"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->AsstSurgeon->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AsstSurgeon" class="<?php echo $ivf_oocytedenudation_grid->AsstSurgeon->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_AsstSurgeon" class="ivf_oocytedenudation_AsstSurgeon">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->AsstSurgeon->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_grid->AsstSurgeon->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_grid->AsstSurgeon->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_grid->Anaesthetist->Visible) { // Anaesthetist ?>
	<?php if ($ivf_oocytedenudation_grid->SortUrl($ivf_oocytedenudation_grid->Anaesthetist) == "") { ?>
		<th data-name="Anaesthetist" class="<?php echo $ivf_oocytedenudation_grid->Anaesthetist->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_Anaesthetist" class="ivf_oocytedenudation_Anaesthetist"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->Anaesthetist->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Anaesthetist" class="<?php echo $ivf_oocytedenudation_grid->Anaesthetist->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_Anaesthetist" class="ivf_oocytedenudation_Anaesthetist">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->Anaesthetist->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_grid->Anaesthetist->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_grid->Anaesthetist->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_grid->AnaestheiaType->Visible) { // AnaestheiaType ?>
	<?php if ($ivf_oocytedenudation_grid->SortUrl($ivf_oocytedenudation_grid->AnaestheiaType) == "") { ?>
		<th data-name="AnaestheiaType" class="<?php echo $ivf_oocytedenudation_grid->AnaestheiaType->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_AnaestheiaType" class="ivf_oocytedenudation_AnaestheiaType"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->AnaestheiaType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AnaestheiaType" class="<?php echo $ivf_oocytedenudation_grid->AnaestheiaType->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_AnaestheiaType" class="ivf_oocytedenudation_AnaestheiaType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->AnaestheiaType->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_grid->AnaestheiaType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_grid->AnaestheiaType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_grid->PrimaryEmbryologist->Visible) { // PrimaryEmbryologist ?>
	<?php if ($ivf_oocytedenudation_grid->SortUrl($ivf_oocytedenudation_grid->PrimaryEmbryologist) == "") { ?>
		<th data-name="PrimaryEmbryologist" class="<?php echo $ivf_oocytedenudation_grid->PrimaryEmbryologist->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_PrimaryEmbryologist" class="ivf_oocytedenudation_PrimaryEmbryologist"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->PrimaryEmbryologist->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrimaryEmbryologist" class="<?php echo $ivf_oocytedenudation_grid->PrimaryEmbryologist->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_PrimaryEmbryologist" class="ivf_oocytedenudation_PrimaryEmbryologist">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->PrimaryEmbryologist->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_grid->PrimaryEmbryologist->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_grid->PrimaryEmbryologist->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_grid->SecondaryEmbryologist->Visible) { // SecondaryEmbryologist ?>
	<?php if ($ivf_oocytedenudation_grid->SortUrl($ivf_oocytedenudation_grid->SecondaryEmbryologist) == "") { ?>
		<th data-name="SecondaryEmbryologist" class="<?php echo $ivf_oocytedenudation_grid->SecondaryEmbryologist->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_SecondaryEmbryologist" class="ivf_oocytedenudation_SecondaryEmbryologist"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->SecondaryEmbryologist->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SecondaryEmbryologist" class="<?php echo $ivf_oocytedenudation_grid->SecondaryEmbryologist->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_SecondaryEmbryologist" class="ivf_oocytedenudation_SecondaryEmbryologist">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->SecondaryEmbryologist->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_grid->SecondaryEmbryologist->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_grid->SecondaryEmbryologist->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_grid->NoOfFolliclesRight->Visible) { // NoOfFolliclesRight ?>
	<?php if ($ivf_oocytedenudation_grid->SortUrl($ivf_oocytedenudation_grid->NoOfFolliclesRight) == "") { ?>
		<th data-name="NoOfFolliclesRight" class="<?php echo $ivf_oocytedenudation_grid->NoOfFolliclesRight->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_NoOfFolliclesRight" class="ivf_oocytedenudation_NoOfFolliclesRight"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->NoOfFolliclesRight->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoOfFolliclesRight" class="<?php echo $ivf_oocytedenudation_grid->NoOfFolliclesRight->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_NoOfFolliclesRight" class="ivf_oocytedenudation_NoOfFolliclesRight">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->NoOfFolliclesRight->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_grid->NoOfFolliclesRight->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_grid->NoOfFolliclesRight->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_grid->NoOfFolliclesLeft->Visible) { // NoOfFolliclesLeft ?>
	<?php if ($ivf_oocytedenudation_grid->SortUrl($ivf_oocytedenudation_grid->NoOfFolliclesLeft) == "") { ?>
		<th data-name="NoOfFolliclesLeft" class="<?php echo $ivf_oocytedenudation_grid->NoOfFolliclesLeft->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_NoOfFolliclesLeft" class="ivf_oocytedenudation_NoOfFolliclesLeft"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->NoOfFolliclesLeft->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoOfFolliclesLeft" class="<?php echo $ivf_oocytedenudation_grid->NoOfFolliclesLeft->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_NoOfFolliclesLeft" class="ivf_oocytedenudation_NoOfFolliclesLeft">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->NoOfFolliclesLeft->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_grid->NoOfFolliclesLeft->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_grid->NoOfFolliclesLeft->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_grid->NoOfOocytes->Visible) { // NoOfOocytes ?>
	<?php if ($ivf_oocytedenudation_grid->SortUrl($ivf_oocytedenudation_grid->NoOfOocytes) == "") { ?>
		<th data-name="NoOfOocytes" class="<?php echo $ivf_oocytedenudation_grid->NoOfOocytes->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_NoOfOocytes" class="ivf_oocytedenudation_NoOfOocytes"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->NoOfOocytes->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoOfOocytes" class="<?php echo $ivf_oocytedenudation_grid->NoOfOocytes->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_NoOfOocytes" class="ivf_oocytedenudation_NoOfOocytes">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->NoOfOocytes->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_grid->NoOfOocytes->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_grid->NoOfOocytes->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_grid->RecordOocyteDenudation->Visible) { // RecordOocyteDenudation ?>
	<?php if ($ivf_oocytedenudation_grid->SortUrl($ivf_oocytedenudation_grid->RecordOocyteDenudation) == "") { ?>
		<th data-name="RecordOocyteDenudation" class="<?php echo $ivf_oocytedenudation_grid->RecordOocyteDenudation->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_RecordOocyteDenudation" class="ivf_oocytedenudation_RecordOocyteDenudation"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->RecordOocyteDenudation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RecordOocyteDenudation" class="<?php echo $ivf_oocytedenudation_grid->RecordOocyteDenudation->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_RecordOocyteDenudation" class="ivf_oocytedenudation_RecordOocyteDenudation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->RecordOocyteDenudation->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_grid->RecordOocyteDenudation->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_grid->RecordOocyteDenudation->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_grid->DateOfDenudation->Visible) { // DateOfDenudation ?>
	<?php if ($ivf_oocytedenudation_grid->SortUrl($ivf_oocytedenudation_grid->DateOfDenudation) == "") { ?>
		<th data-name="DateOfDenudation" class="<?php echo $ivf_oocytedenudation_grid->DateOfDenudation->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_DateOfDenudation" class="ivf_oocytedenudation_DateOfDenudation"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->DateOfDenudation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DateOfDenudation" class="<?php echo $ivf_oocytedenudation_grid->DateOfDenudation->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_DateOfDenudation" class="ivf_oocytedenudation_DateOfDenudation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->DateOfDenudation->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_grid->DateOfDenudation->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_grid->DateOfDenudation->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_grid->DenudationDoneBy->Visible) { // DenudationDoneBy ?>
	<?php if ($ivf_oocytedenudation_grid->SortUrl($ivf_oocytedenudation_grid->DenudationDoneBy) == "") { ?>
		<th data-name="DenudationDoneBy" class="<?php echo $ivf_oocytedenudation_grid->DenudationDoneBy->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_DenudationDoneBy" class="ivf_oocytedenudation_DenudationDoneBy"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->DenudationDoneBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DenudationDoneBy" class="<?php echo $ivf_oocytedenudation_grid->DenudationDoneBy->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_DenudationDoneBy" class="ivf_oocytedenudation_DenudationDoneBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->DenudationDoneBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_grid->DenudationDoneBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_grid->DenudationDoneBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_grid->status->Visible) { // status ?>
	<?php if ($ivf_oocytedenudation_grid->SortUrl($ivf_oocytedenudation_grid->status) == "") { ?>
		<th data-name="status" class="<?php echo $ivf_oocytedenudation_grid->status->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_status" class="ivf_oocytedenudation_status"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $ivf_oocytedenudation_grid->status->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_status" class="ivf_oocytedenudation_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_grid->status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_grid->status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_grid->createdby->Visible) { // createdby ?>
	<?php if ($ivf_oocytedenudation_grid->SortUrl($ivf_oocytedenudation_grid->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $ivf_oocytedenudation_grid->createdby->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_createdby" class="ivf_oocytedenudation_createdby"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $ivf_oocytedenudation_grid->createdby->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_createdby" class="ivf_oocytedenudation_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_grid->createdby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_grid->createdby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_grid->createddatetime->Visible) { // createddatetime ?>
	<?php if ($ivf_oocytedenudation_grid->SortUrl($ivf_oocytedenudation_grid->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $ivf_oocytedenudation_grid->createddatetime->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_createddatetime" class="ivf_oocytedenudation_createddatetime"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $ivf_oocytedenudation_grid->createddatetime->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_createddatetime" class="ivf_oocytedenudation_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_grid->createddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_grid->createddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_grid->modifiedby->Visible) { // modifiedby ?>
	<?php if ($ivf_oocytedenudation_grid->SortUrl($ivf_oocytedenudation_grid->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $ivf_oocytedenudation_grid->modifiedby->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_modifiedby" class="ivf_oocytedenudation_modifiedby"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $ivf_oocytedenudation_grid->modifiedby->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_modifiedby" class="ivf_oocytedenudation_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_grid->modifiedby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_grid->modifiedby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_grid->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($ivf_oocytedenudation_grid->SortUrl($ivf_oocytedenudation_grid->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $ivf_oocytedenudation_grid->modifieddatetime->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_modifieddatetime" class="ivf_oocytedenudation_modifieddatetime"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $ivf_oocytedenudation_grid->modifieddatetime->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_modifieddatetime" class="ivf_oocytedenudation_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_grid->modifieddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_grid->modifieddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_grid->TidNo->Visible) { // TidNo ?>
	<?php if ($ivf_oocytedenudation_grid->SortUrl($ivf_oocytedenudation_grid->TidNo) == "") { ?>
		<th data-name="TidNo" class="<?php echo $ivf_oocytedenudation_grid->TidNo->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_TidNo" class="ivf_oocytedenudation_TidNo"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->TidNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TidNo" class="<?php echo $ivf_oocytedenudation_grid->TidNo->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_TidNo" class="ivf_oocytedenudation_TidNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->TidNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_grid->TidNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_grid->TidNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_grid->ExpFollicles->Visible) { // ExpFollicles ?>
	<?php if ($ivf_oocytedenudation_grid->SortUrl($ivf_oocytedenudation_grid->ExpFollicles) == "") { ?>
		<th data-name="ExpFollicles" class="<?php echo $ivf_oocytedenudation_grid->ExpFollicles->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_ExpFollicles" class="ivf_oocytedenudation_ExpFollicles"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->ExpFollicles->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ExpFollicles" class="<?php echo $ivf_oocytedenudation_grid->ExpFollicles->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_ExpFollicles" class="ivf_oocytedenudation_ExpFollicles">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->ExpFollicles->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_grid->ExpFollicles->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_grid->ExpFollicles->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_grid->SecondaryDenudationDoneBy->Visible) { // SecondaryDenudationDoneBy ?>
	<?php if ($ivf_oocytedenudation_grid->SortUrl($ivf_oocytedenudation_grid->SecondaryDenudationDoneBy) == "") { ?>
		<th data-name="SecondaryDenudationDoneBy" class="<?php echo $ivf_oocytedenudation_grid->SecondaryDenudationDoneBy->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_SecondaryDenudationDoneBy" class="ivf_oocytedenudation_SecondaryDenudationDoneBy"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->SecondaryDenudationDoneBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SecondaryDenudationDoneBy" class="<?php echo $ivf_oocytedenudation_grid->SecondaryDenudationDoneBy->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_SecondaryDenudationDoneBy" class="ivf_oocytedenudation_SecondaryDenudationDoneBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->SecondaryDenudationDoneBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_grid->SecondaryDenudationDoneBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_grid->SecondaryDenudationDoneBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_grid->OocyteOrgin->Visible) { // OocyteOrgin ?>
	<?php if ($ivf_oocytedenudation_grid->SortUrl($ivf_oocytedenudation_grid->OocyteOrgin) == "") { ?>
		<th data-name="OocyteOrgin" class="<?php echo $ivf_oocytedenudation_grid->OocyteOrgin->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_OocyteOrgin" class="ivf_oocytedenudation_OocyteOrgin"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->OocyteOrgin->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OocyteOrgin" class="<?php echo $ivf_oocytedenudation_grid->OocyteOrgin->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_OocyteOrgin" class="ivf_oocytedenudation_OocyteOrgin">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->OocyteOrgin->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_grid->OocyteOrgin->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_grid->OocyteOrgin->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_grid->patient1->Visible) { // patient1 ?>
	<?php if ($ivf_oocytedenudation_grid->SortUrl($ivf_oocytedenudation_grid->patient1) == "") { ?>
		<th data-name="patient1" class="<?php echo $ivf_oocytedenudation_grid->patient1->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_patient1" class="ivf_oocytedenudation_patient1"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->patient1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patient1" class="<?php echo $ivf_oocytedenudation_grid->patient1->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_patient1" class="ivf_oocytedenudation_patient1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->patient1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_grid->patient1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_grid->patient1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_grid->OocyteType->Visible) { // OocyteType ?>
	<?php if ($ivf_oocytedenudation_grid->SortUrl($ivf_oocytedenudation_grid->OocyteType) == "") { ?>
		<th data-name="OocyteType" class="<?php echo $ivf_oocytedenudation_grid->OocyteType->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_OocyteType" class="ivf_oocytedenudation_OocyteType"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->OocyteType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OocyteType" class="<?php echo $ivf_oocytedenudation_grid->OocyteType->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_OocyteType" class="ivf_oocytedenudation_OocyteType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->OocyteType->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_grid->OocyteType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_grid->OocyteType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_grid->MIOocytesDonate1->Visible) { // MIOocytesDonate1 ?>
	<?php if ($ivf_oocytedenudation_grid->SortUrl($ivf_oocytedenudation_grid->MIOocytesDonate1) == "") { ?>
		<th data-name="MIOocytesDonate1" class="<?php echo $ivf_oocytedenudation_grid->MIOocytesDonate1->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_MIOocytesDonate1" class="ivf_oocytedenudation_MIOocytesDonate1"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->MIOocytesDonate1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MIOocytesDonate1" class="<?php echo $ivf_oocytedenudation_grid->MIOocytesDonate1->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_MIOocytesDonate1" class="ivf_oocytedenudation_MIOocytesDonate1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->MIOocytesDonate1->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_grid->MIOocytesDonate1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_grid->MIOocytesDonate1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_grid->MIOocytesDonate2->Visible) { // MIOocytesDonate2 ?>
	<?php if ($ivf_oocytedenudation_grid->SortUrl($ivf_oocytedenudation_grid->MIOocytesDonate2) == "") { ?>
		<th data-name="MIOocytesDonate2" class="<?php echo $ivf_oocytedenudation_grid->MIOocytesDonate2->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_MIOocytesDonate2" class="ivf_oocytedenudation_MIOocytesDonate2"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->MIOocytesDonate2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MIOocytesDonate2" class="<?php echo $ivf_oocytedenudation_grid->MIOocytesDonate2->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_MIOocytesDonate2" class="ivf_oocytedenudation_MIOocytesDonate2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->MIOocytesDonate2->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_grid->MIOocytesDonate2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_grid->MIOocytesDonate2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_grid->SelfMI->Visible) { // SelfMI ?>
	<?php if ($ivf_oocytedenudation_grid->SortUrl($ivf_oocytedenudation_grid->SelfMI) == "") { ?>
		<th data-name="SelfMI" class="<?php echo $ivf_oocytedenudation_grid->SelfMI->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_SelfMI" class="ivf_oocytedenudation_SelfMI"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->SelfMI->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SelfMI" class="<?php echo $ivf_oocytedenudation_grid->SelfMI->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_SelfMI" class="ivf_oocytedenudation_SelfMI">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->SelfMI->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_grid->SelfMI->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_grid->SelfMI->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_grid->SelfMII->Visible) { // SelfMII ?>
	<?php if ($ivf_oocytedenudation_grid->SortUrl($ivf_oocytedenudation_grid->SelfMII) == "") { ?>
		<th data-name="SelfMII" class="<?php echo $ivf_oocytedenudation_grid->SelfMII->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_SelfMII" class="ivf_oocytedenudation_SelfMII"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->SelfMII->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SelfMII" class="<?php echo $ivf_oocytedenudation_grid->SelfMII->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_SelfMII" class="ivf_oocytedenudation_SelfMII">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->SelfMII->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_grid->SelfMII->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_grid->SelfMII->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_grid->patient3->Visible) { // patient3 ?>
	<?php if ($ivf_oocytedenudation_grid->SortUrl($ivf_oocytedenudation_grid->patient3) == "") { ?>
		<th data-name="patient3" class="<?php echo $ivf_oocytedenudation_grid->patient3->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_patient3" class="ivf_oocytedenudation_patient3"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->patient3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patient3" class="<?php echo $ivf_oocytedenudation_grid->patient3->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_patient3" class="ivf_oocytedenudation_patient3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->patient3->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_grid->patient3->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_grid->patient3->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_grid->patient4->Visible) { // patient4 ?>
	<?php if ($ivf_oocytedenudation_grid->SortUrl($ivf_oocytedenudation_grid->patient4) == "") { ?>
		<th data-name="patient4" class="<?php echo $ivf_oocytedenudation_grid->patient4->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_patient4" class="ivf_oocytedenudation_patient4"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->patient4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patient4" class="<?php echo $ivf_oocytedenudation_grid->patient4->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_patient4" class="ivf_oocytedenudation_patient4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->patient4->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_grid->patient4->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_grid->patient4->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_grid->OocytesDonate3->Visible) { // OocytesDonate3 ?>
	<?php if ($ivf_oocytedenudation_grid->SortUrl($ivf_oocytedenudation_grid->OocytesDonate3) == "") { ?>
		<th data-name="OocytesDonate3" class="<?php echo $ivf_oocytedenudation_grid->OocytesDonate3->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_OocytesDonate3" class="ivf_oocytedenudation_OocytesDonate3"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->OocytesDonate3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OocytesDonate3" class="<?php echo $ivf_oocytedenudation_grid->OocytesDonate3->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_OocytesDonate3" class="ivf_oocytedenudation_OocytesDonate3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->OocytesDonate3->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_grid->OocytesDonate3->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_grid->OocytesDonate3->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_grid->OocytesDonate4->Visible) { // OocytesDonate4 ?>
	<?php if ($ivf_oocytedenudation_grid->SortUrl($ivf_oocytedenudation_grid->OocytesDonate4) == "") { ?>
		<th data-name="OocytesDonate4" class="<?php echo $ivf_oocytedenudation_grid->OocytesDonate4->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_OocytesDonate4" class="ivf_oocytedenudation_OocytesDonate4"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->OocytesDonate4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OocytesDonate4" class="<?php echo $ivf_oocytedenudation_grid->OocytesDonate4->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_OocytesDonate4" class="ivf_oocytedenudation_OocytesDonate4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->OocytesDonate4->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_grid->OocytesDonate4->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_grid->OocytesDonate4->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_grid->MIOocytesDonate3->Visible) { // MIOocytesDonate3 ?>
	<?php if ($ivf_oocytedenudation_grid->SortUrl($ivf_oocytedenudation_grid->MIOocytesDonate3) == "") { ?>
		<th data-name="MIOocytesDonate3" class="<?php echo $ivf_oocytedenudation_grid->MIOocytesDonate3->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_MIOocytesDonate3" class="ivf_oocytedenudation_MIOocytesDonate3"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->MIOocytesDonate3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MIOocytesDonate3" class="<?php echo $ivf_oocytedenudation_grid->MIOocytesDonate3->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_MIOocytesDonate3" class="ivf_oocytedenudation_MIOocytesDonate3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->MIOocytesDonate3->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_grid->MIOocytesDonate3->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_grid->MIOocytesDonate3->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_grid->MIOocytesDonate4->Visible) { // MIOocytesDonate4 ?>
	<?php if ($ivf_oocytedenudation_grid->SortUrl($ivf_oocytedenudation_grid->MIOocytesDonate4) == "") { ?>
		<th data-name="MIOocytesDonate4" class="<?php echo $ivf_oocytedenudation_grid->MIOocytesDonate4->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_MIOocytesDonate4" class="ivf_oocytedenudation_MIOocytesDonate4"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->MIOocytesDonate4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MIOocytesDonate4" class="<?php echo $ivf_oocytedenudation_grid->MIOocytesDonate4->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_MIOocytesDonate4" class="ivf_oocytedenudation_MIOocytesDonate4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->MIOocytesDonate4->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_grid->MIOocytesDonate4->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_grid->MIOocytesDonate4->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_grid->SelfOocytesMI->Visible) { // SelfOocytesMI ?>
	<?php if ($ivf_oocytedenudation_grid->SortUrl($ivf_oocytedenudation_grid->SelfOocytesMI) == "") { ?>
		<th data-name="SelfOocytesMI" class="<?php echo $ivf_oocytedenudation_grid->SelfOocytesMI->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_SelfOocytesMI" class="ivf_oocytedenudation_SelfOocytesMI"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->SelfOocytesMI->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SelfOocytesMI" class="<?php echo $ivf_oocytedenudation_grid->SelfOocytesMI->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_SelfOocytesMI" class="ivf_oocytedenudation_SelfOocytesMI">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->SelfOocytesMI->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_grid->SelfOocytesMI->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_grid->SelfOocytesMI->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation_grid->SelfOocytesMII->Visible) { // SelfOocytesMII ?>
	<?php if ($ivf_oocytedenudation_grid->SortUrl($ivf_oocytedenudation_grid->SelfOocytesMII) == "") { ?>
		<th data-name="SelfOocytesMII" class="<?php echo $ivf_oocytedenudation_grid->SelfOocytesMII->headerCellClass() ?>"><div id="elh_ivf_oocytedenudation_SelfOocytesMII" class="ivf_oocytedenudation_SelfOocytesMII"><div class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->SelfOocytesMII->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SelfOocytesMII" class="<?php echo $ivf_oocytedenudation_grid->SelfOocytesMII->headerCellClass() ?>"><div><div id="elh_ivf_oocytedenudation_SelfOocytesMII" class="ivf_oocytedenudation_SelfOocytesMII">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_oocytedenudation_grid->SelfOocytesMII->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_oocytedenudation_grid->SelfOocytesMII->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_oocytedenudation_grid->SelfOocytesMII->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
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
$ivf_oocytedenudation_grid->StartRecord = 1;
$ivf_oocytedenudation_grid->StopRecord = $ivf_oocytedenudation_grid->TotalRecords; // Show all records

// Restore number of post back records
if ($CurrentForm && ($ivf_oocytedenudation->isConfirm() || $ivf_oocytedenudation_grid->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($ivf_oocytedenudation_grid->FormKeyCountName) && ($ivf_oocytedenudation_grid->isGridAdd() || $ivf_oocytedenudation_grid->isGridEdit() || $ivf_oocytedenudation->isConfirm())) {
		$ivf_oocytedenudation_grid->KeyCount = $CurrentForm->getValue($ivf_oocytedenudation_grid->FormKeyCountName);
		$ivf_oocytedenudation_grid->StopRecord = $ivf_oocytedenudation_grid->StartRecord + $ivf_oocytedenudation_grid->KeyCount - 1;
	}
}
$ivf_oocytedenudation_grid->RecordCount = $ivf_oocytedenudation_grid->StartRecord - 1;
if ($ivf_oocytedenudation_grid->Recordset && !$ivf_oocytedenudation_grid->Recordset->EOF) {
	$ivf_oocytedenudation_grid->Recordset->moveFirst();
	$selectLimit = $ivf_oocytedenudation_grid->UseSelectLimit;
	if (!$selectLimit && $ivf_oocytedenudation_grid->StartRecord > 1)
		$ivf_oocytedenudation_grid->Recordset->move($ivf_oocytedenudation_grid->StartRecord - 1);
} elseif (!$ivf_oocytedenudation->AllowAddDeleteRow && $ivf_oocytedenudation_grid->StopRecord == 0) {
	$ivf_oocytedenudation_grid->StopRecord = $ivf_oocytedenudation->GridAddRowCount;
}

// Initialize aggregate
$ivf_oocytedenudation->RowType = ROWTYPE_AGGREGATEINIT;
$ivf_oocytedenudation->resetAttributes();
$ivf_oocytedenudation_grid->renderRow();
if ($ivf_oocytedenudation_grid->isGridAdd())
	$ivf_oocytedenudation_grid->RowIndex = 0;
if ($ivf_oocytedenudation_grid->isGridEdit())
	$ivf_oocytedenudation_grid->RowIndex = 0;
while ($ivf_oocytedenudation_grid->RecordCount < $ivf_oocytedenudation_grid->StopRecord) {
	$ivf_oocytedenudation_grid->RecordCount++;
	if ($ivf_oocytedenudation_grid->RecordCount >= $ivf_oocytedenudation_grid->StartRecord) {
		$ivf_oocytedenudation_grid->RowCount++;
		if ($ivf_oocytedenudation_grid->isGridAdd() || $ivf_oocytedenudation_grid->isGridEdit() || $ivf_oocytedenudation->isConfirm()) {
			$ivf_oocytedenudation_grid->RowIndex++;
			$CurrentForm->Index = $ivf_oocytedenudation_grid->RowIndex;
			if ($CurrentForm->hasValue($ivf_oocytedenudation_grid->FormActionName) && ($ivf_oocytedenudation->isConfirm() || $ivf_oocytedenudation_grid->EventCancelled))
				$ivf_oocytedenudation_grid->RowAction = strval($CurrentForm->getValue($ivf_oocytedenudation_grid->FormActionName));
			elseif ($ivf_oocytedenudation_grid->isGridAdd())
				$ivf_oocytedenudation_grid->RowAction = "insert";
			else
				$ivf_oocytedenudation_grid->RowAction = "";
		}

		// Set up key count
		$ivf_oocytedenudation_grid->KeyCount = $ivf_oocytedenudation_grid->RowIndex;

		// Init row class and style
		$ivf_oocytedenudation->resetAttributes();
		$ivf_oocytedenudation->CssClass = "";
		if ($ivf_oocytedenudation_grid->isGridAdd()) {
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
		if ($ivf_oocytedenudation_grid->isGridAdd()) // Grid add
			$ivf_oocytedenudation->RowType = ROWTYPE_ADD; // Render add
		if ($ivf_oocytedenudation_grid->isGridAdd() && $ivf_oocytedenudation->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$ivf_oocytedenudation_grid->restoreCurrentRowFormValues($ivf_oocytedenudation_grid->RowIndex); // Restore form values
		if ($ivf_oocytedenudation_grid->isGridEdit()) { // Grid edit
			if ($ivf_oocytedenudation->EventCancelled)
				$ivf_oocytedenudation_grid->restoreCurrentRowFormValues($ivf_oocytedenudation_grid->RowIndex); // Restore form values
			if ($ivf_oocytedenudation_grid->RowAction == "insert")
				$ivf_oocytedenudation->RowType = ROWTYPE_ADD; // Render add
			else
				$ivf_oocytedenudation->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($ivf_oocytedenudation_grid->isGridEdit() && ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT || $ivf_oocytedenudation->RowType == ROWTYPE_ADD) && $ivf_oocytedenudation->EventCancelled) // Update failed
			$ivf_oocytedenudation_grid->restoreCurrentRowFormValues($ivf_oocytedenudation_grid->RowIndex); // Restore form values
		if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) // Edit row
			$ivf_oocytedenudation_grid->EditRowCount++;
		if ($ivf_oocytedenudation->isConfirm()) // Confirm row
			$ivf_oocytedenudation_grid->restoreCurrentRowFormValues($ivf_oocytedenudation_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$ivf_oocytedenudation->RowAttrs->merge(["data-rowindex" => $ivf_oocytedenudation_grid->RowCount, "id" => "r" . $ivf_oocytedenudation_grid->RowCount . "_ivf_oocytedenudation", "data-rowtype" => $ivf_oocytedenudation->RowType]);

		// Render row
		$ivf_oocytedenudation_grid->renderRow();

		// Render list options
		$ivf_oocytedenudation_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($ivf_oocytedenudation_grid->RowAction != "delete" && $ivf_oocytedenudation_grid->RowAction != "insertdelete" && !($ivf_oocytedenudation_grid->RowAction == "insert" && $ivf_oocytedenudation->isConfirm() && $ivf_oocytedenudation_grid->emptyRow())) {
?>
	<tr <?php echo $ivf_oocytedenudation->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_oocytedenudation_grid->ListOptions->render("body", "left", $ivf_oocytedenudation_grid->RowCount);
?>
	<?php if ($ivf_oocytedenudation_grid->id->Visible) { // id ?>
		<td data-name="id" <?php echo $ivf_oocytedenudation_grid->id->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_id" class="form-group"></span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_id" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_id" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->id->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_id" class="form-group">
<span<?php echo $ivf_oocytedenudation_grid->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_oocytedenudation_grid->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_id" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_id" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->id->CurrentValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_id">
<span<?php echo $ivf_oocytedenudation_grid->id->viewAttributes() ?>><?php echo $ivf_oocytedenudation_grid->id->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_id" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_id" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->id->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_id" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_id" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_id" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_id" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->id->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_id" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_id" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->RIDNo->Visible) { // RIDNo ?>
		<td data-name="RIDNo" <?php echo $ivf_oocytedenudation_grid->RIDNo->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($ivf_oocytedenudation_grid->RIDNo->getSessionValue() != "") { ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_RIDNo" class="form-group">
<span<?php echo $ivf_oocytedenudation_grid->RIDNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_oocytedenudation_grid->RIDNo->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RIDNo" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->RIDNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_RIDNo" class="form-group">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_RIDNo" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RIDNo" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RIDNo" size="30" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->RIDNo->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->RIDNo->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->RIDNo->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_RIDNo" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RIDNo" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->RIDNo->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($ivf_oocytedenudation_grid->RIDNo->getSessionValue() != "") { ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_RIDNo" class="form-group">
<span<?php echo $ivf_oocytedenudation_grid->RIDNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_oocytedenudation_grid->RIDNo->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RIDNo" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->RIDNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_RIDNo" class="form-group">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_RIDNo" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RIDNo" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RIDNo" size="30" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->RIDNo->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->RIDNo->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->RIDNo->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_RIDNo">
<span<?php echo $ivf_oocytedenudation_grid->RIDNo->viewAttributes() ?>><?php echo $ivf_oocytedenudation_grid->RIDNo->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_RIDNo" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RIDNo" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->RIDNo->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_RIDNo" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RIDNo" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->RIDNo->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_RIDNo" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RIDNo" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->RIDNo->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_RIDNo" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RIDNo" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->RIDNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->Name->Visible) { // Name ?>
		<td data-name="Name" <?php echo $ivf_oocytedenudation_grid->Name->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($ivf_oocytedenudation_grid->Name->getSessionValue() != "") { ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_Name" class="form-group">
<span<?php echo $ivf_oocytedenudation_grid->Name->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_oocytedenudation_grid->Name->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Name" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->Name->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_Name" class="form-group">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_Name" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Name" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->Name->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->Name->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->Name->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_Name" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Name" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->Name->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($ivf_oocytedenudation_grid->Name->getSessionValue() != "") { ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_Name" class="form-group">
<span<?php echo $ivf_oocytedenudation_grid->Name->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_oocytedenudation_grid->Name->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Name" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->Name->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_Name" class="form-group">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_Name" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Name" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->Name->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->Name->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->Name->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_Name">
<span<?php echo $ivf_oocytedenudation_grid->Name->viewAttributes() ?>><?php echo $ivf_oocytedenudation_grid->Name->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_Name" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Name" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->Name->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_Name" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Name" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->Name->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_Name" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Name" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->Name->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_Name" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Name" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->Name->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->ResultDate->Visible) { // ResultDate ?>
		<td data-name="ResultDate" <?php echo $ivf_oocytedenudation_grid->ResultDate->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_ResultDate" class="form-group">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_ResultDate" data-format="11" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ResultDate" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ResultDate" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->ResultDate->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->ResultDate->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->ResultDate->editAttributes() ?>>
<?php if (!$ivf_oocytedenudation_grid->ResultDate->ReadOnly && !$ivf_oocytedenudation_grid->ResultDate->Disabled && !isset($ivf_oocytedenudation_grid->ResultDate->EditAttrs["readonly"]) && !isset($ivf_oocytedenudation_grid->ResultDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_oocytedenudationgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_oocytedenudationgrid", "x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_ResultDate" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ResultDate" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->ResultDate->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_ResultDate" class="form-group">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_ResultDate" data-format="11" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ResultDate" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ResultDate" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->ResultDate->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->ResultDate->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->ResultDate->editAttributes() ?>>
<?php if (!$ivf_oocytedenudation_grid->ResultDate->ReadOnly && !$ivf_oocytedenudation_grid->ResultDate->Disabled && !isset($ivf_oocytedenudation_grid->ResultDate->EditAttrs["readonly"]) && !isset($ivf_oocytedenudation_grid->ResultDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_oocytedenudationgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_oocytedenudationgrid", "x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_ResultDate">
<span<?php echo $ivf_oocytedenudation_grid->ResultDate->viewAttributes() ?>><?php echo $ivf_oocytedenudation_grid->ResultDate->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_ResultDate" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ResultDate" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->ResultDate->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_ResultDate" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ResultDate" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->ResultDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_ResultDate" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ResultDate" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->ResultDate->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_ResultDate" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ResultDate" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->ResultDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->Surgeon->Visible) { // Surgeon ?>
		<td data-name="Surgeon" <?php echo $ivf_oocytedenudation_grid->Surgeon->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_Surgeon" class="form-group">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_Surgeon" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Surgeon" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Surgeon" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->Surgeon->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->Surgeon->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->Surgeon->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_Surgeon" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Surgeon" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Surgeon" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->Surgeon->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_Surgeon" class="form-group">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_Surgeon" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Surgeon" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Surgeon" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->Surgeon->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->Surgeon->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->Surgeon->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_Surgeon">
<span<?php echo $ivf_oocytedenudation_grid->Surgeon->viewAttributes() ?>><?php echo $ivf_oocytedenudation_grid->Surgeon->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_Surgeon" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Surgeon" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Surgeon" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->Surgeon->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_Surgeon" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Surgeon" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Surgeon" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->Surgeon->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_Surgeon" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Surgeon" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Surgeon" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->Surgeon->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_Surgeon" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Surgeon" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Surgeon" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->Surgeon->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->AsstSurgeon->Visible) { // AsstSurgeon ?>
		<td data-name="AsstSurgeon" <?php echo $ivf_oocytedenudation_grid->AsstSurgeon->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_AsstSurgeon" class="form-group">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_AsstSurgeon" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AsstSurgeon" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AsstSurgeon" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->AsstSurgeon->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->AsstSurgeon->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->AsstSurgeon->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_AsstSurgeon" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AsstSurgeon" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AsstSurgeon" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->AsstSurgeon->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_AsstSurgeon" class="form-group">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_AsstSurgeon" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AsstSurgeon" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AsstSurgeon" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->AsstSurgeon->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->AsstSurgeon->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->AsstSurgeon->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_AsstSurgeon">
<span<?php echo $ivf_oocytedenudation_grid->AsstSurgeon->viewAttributes() ?>><?php echo $ivf_oocytedenudation_grid->AsstSurgeon->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_AsstSurgeon" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AsstSurgeon" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AsstSurgeon" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->AsstSurgeon->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_AsstSurgeon" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AsstSurgeon" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AsstSurgeon" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->AsstSurgeon->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_AsstSurgeon" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AsstSurgeon" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AsstSurgeon" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->AsstSurgeon->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_AsstSurgeon" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AsstSurgeon" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AsstSurgeon" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->AsstSurgeon->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->Anaesthetist->Visible) { // Anaesthetist ?>
		<td data-name="Anaesthetist" <?php echo $ivf_oocytedenudation_grid->Anaesthetist->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_Anaesthetist" class="form-group">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_Anaesthetist" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Anaesthetist" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Anaesthetist" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->Anaesthetist->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->Anaesthetist->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->Anaesthetist->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_Anaesthetist" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Anaesthetist" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Anaesthetist" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->Anaesthetist->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_Anaesthetist" class="form-group">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_Anaesthetist" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Anaesthetist" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Anaesthetist" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->Anaesthetist->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->Anaesthetist->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->Anaesthetist->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_Anaesthetist">
<span<?php echo $ivf_oocytedenudation_grid->Anaesthetist->viewAttributes() ?>><?php echo $ivf_oocytedenudation_grid->Anaesthetist->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_Anaesthetist" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Anaesthetist" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Anaesthetist" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->Anaesthetist->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_Anaesthetist" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Anaesthetist" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Anaesthetist" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->Anaesthetist->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_Anaesthetist" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Anaesthetist" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Anaesthetist" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->Anaesthetist->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_Anaesthetist" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Anaesthetist" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Anaesthetist" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->Anaesthetist->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->AnaestheiaType->Visible) { // AnaestheiaType ?>
		<td data-name="AnaestheiaType" <?php echo $ivf_oocytedenudation_grid->AnaestheiaType->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_AnaestheiaType" class="form-group">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_AnaestheiaType" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AnaestheiaType" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AnaestheiaType" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->AnaestheiaType->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->AnaestheiaType->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->AnaestheiaType->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_AnaestheiaType" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AnaestheiaType" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AnaestheiaType" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->AnaestheiaType->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_AnaestheiaType" class="form-group">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_AnaestheiaType" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AnaestheiaType" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AnaestheiaType" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->AnaestheiaType->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->AnaestheiaType->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->AnaestheiaType->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_AnaestheiaType">
<span<?php echo $ivf_oocytedenudation_grid->AnaestheiaType->viewAttributes() ?>><?php echo $ivf_oocytedenudation_grid->AnaestheiaType->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_AnaestheiaType" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AnaestheiaType" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AnaestheiaType" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->AnaestheiaType->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_AnaestheiaType" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AnaestheiaType" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AnaestheiaType" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->AnaestheiaType->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_AnaestheiaType" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AnaestheiaType" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AnaestheiaType" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->AnaestheiaType->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_AnaestheiaType" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AnaestheiaType" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AnaestheiaType" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->AnaestheiaType->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->PrimaryEmbryologist->Visible) { // PrimaryEmbryologist ?>
		<td data-name="PrimaryEmbryologist" <?php echo $ivf_oocytedenudation_grid->PrimaryEmbryologist->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_PrimaryEmbryologist" class="form-group">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_PrimaryEmbryologist" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_PrimaryEmbryologist" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_PrimaryEmbryologist" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->PrimaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->PrimaryEmbryologist->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->PrimaryEmbryologist->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_PrimaryEmbryologist" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_PrimaryEmbryologist" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_PrimaryEmbryologist" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->PrimaryEmbryologist->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_PrimaryEmbryologist" class="form-group">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_PrimaryEmbryologist" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_PrimaryEmbryologist" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_PrimaryEmbryologist" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->PrimaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->PrimaryEmbryologist->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->PrimaryEmbryologist->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_PrimaryEmbryologist">
<span<?php echo $ivf_oocytedenudation_grid->PrimaryEmbryologist->viewAttributes() ?>><?php echo $ivf_oocytedenudation_grid->PrimaryEmbryologist->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_PrimaryEmbryologist" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_PrimaryEmbryologist" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_PrimaryEmbryologist" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->PrimaryEmbryologist->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_PrimaryEmbryologist" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_PrimaryEmbryologist" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_PrimaryEmbryologist" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->PrimaryEmbryologist->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_PrimaryEmbryologist" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_PrimaryEmbryologist" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_PrimaryEmbryologist" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->PrimaryEmbryologist->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_PrimaryEmbryologist" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_PrimaryEmbryologist" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_PrimaryEmbryologist" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->PrimaryEmbryologist->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->SecondaryEmbryologist->Visible) { // SecondaryEmbryologist ?>
		<td data-name="SecondaryEmbryologist" <?php echo $ivf_oocytedenudation_grid->SecondaryEmbryologist->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_SecondaryEmbryologist" class="form-group">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_SecondaryEmbryologist" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryEmbryologist" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryEmbryologist" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->SecondaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->SecondaryEmbryologist->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->SecondaryEmbryologist->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SecondaryEmbryologist" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryEmbryologist" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryEmbryologist" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->SecondaryEmbryologist->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_SecondaryEmbryologist" class="form-group">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_SecondaryEmbryologist" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryEmbryologist" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryEmbryologist" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->SecondaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->SecondaryEmbryologist->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->SecondaryEmbryologist->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_SecondaryEmbryologist">
<span<?php echo $ivf_oocytedenudation_grid->SecondaryEmbryologist->viewAttributes() ?>><?php echo $ivf_oocytedenudation_grid->SecondaryEmbryologist->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SecondaryEmbryologist" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryEmbryologist" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryEmbryologist" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->SecondaryEmbryologist->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SecondaryEmbryologist" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryEmbryologist" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryEmbryologist" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->SecondaryEmbryologist->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SecondaryEmbryologist" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryEmbryologist" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryEmbryologist" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->SecondaryEmbryologist->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SecondaryEmbryologist" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryEmbryologist" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryEmbryologist" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->SecondaryEmbryologist->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->NoOfFolliclesRight->Visible) { // NoOfFolliclesRight ?>
		<td data-name="NoOfFolliclesRight" <?php echo $ivf_oocytedenudation_grid->NoOfFolliclesRight->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_NoOfFolliclesRight" class="form-group">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_NoOfFolliclesRight" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesRight" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesRight" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->NoOfFolliclesRight->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->NoOfFolliclesRight->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->NoOfFolliclesRight->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_NoOfFolliclesRight" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesRight" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesRight" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->NoOfFolliclesRight->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_NoOfFolliclesRight" class="form-group">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_NoOfFolliclesRight" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesRight" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesRight" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->NoOfFolliclesRight->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->NoOfFolliclesRight->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->NoOfFolliclesRight->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_NoOfFolliclesRight">
<span<?php echo $ivf_oocytedenudation_grid->NoOfFolliclesRight->viewAttributes() ?>><?php echo $ivf_oocytedenudation_grid->NoOfFolliclesRight->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_NoOfFolliclesRight" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesRight" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesRight" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->NoOfFolliclesRight->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_NoOfFolliclesRight" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesRight" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesRight" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->NoOfFolliclesRight->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_NoOfFolliclesRight" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesRight" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesRight" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->NoOfFolliclesRight->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_NoOfFolliclesRight" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesRight" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesRight" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->NoOfFolliclesRight->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->NoOfFolliclesLeft->Visible) { // NoOfFolliclesLeft ?>
		<td data-name="NoOfFolliclesLeft" <?php echo $ivf_oocytedenudation_grid->NoOfFolliclesLeft->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_NoOfFolliclesLeft" class="form-group">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_NoOfFolliclesLeft" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesLeft" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesLeft" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->NoOfFolliclesLeft->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->NoOfFolliclesLeft->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->NoOfFolliclesLeft->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_NoOfFolliclesLeft" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesLeft" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesLeft" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->NoOfFolliclesLeft->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_NoOfFolliclesLeft" class="form-group">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_NoOfFolliclesLeft" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesLeft" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesLeft" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->NoOfFolliclesLeft->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->NoOfFolliclesLeft->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->NoOfFolliclesLeft->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_NoOfFolliclesLeft">
<span<?php echo $ivf_oocytedenudation_grid->NoOfFolliclesLeft->viewAttributes() ?>><?php echo $ivf_oocytedenudation_grid->NoOfFolliclesLeft->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_NoOfFolliclesLeft" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesLeft" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesLeft" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->NoOfFolliclesLeft->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_NoOfFolliclesLeft" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesLeft" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesLeft" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->NoOfFolliclesLeft->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_NoOfFolliclesLeft" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesLeft" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesLeft" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->NoOfFolliclesLeft->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_NoOfFolliclesLeft" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesLeft" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesLeft" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->NoOfFolliclesLeft->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->NoOfOocytes->Visible) { // NoOfOocytes ?>
		<td data-name="NoOfOocytes" <?php echo $ivf_oocytedenudation_grid->NoOfOocytes->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_NoOfOocytes" class="form-group">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_NoOfOocytes" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfOocytes" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfOocytes" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->NoOfOocytes->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->NoOfOocytes->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->NoOfOocytes->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_NoOfOocytes" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfOocytes" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfOocytes" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->NoOfOocytes->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_NoOfOocytes" class="form-group">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_NoOfOocytes" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfOocytes" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfOocytes" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->NoOfOocytes->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->NoOfOocytes->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->NoOfOocytes->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_NoOfOocytes">
<span<?php echo $ivf_oocytedenudation_grid->NoOfOocytes->viewAttributes() ?>><?php echo $ivf_oocytedenudation_grid->NoOfOocytes->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_NoOfOocytes" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfOocytes" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfOocytes" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->NoOfOocytes->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_NoOfOocytes" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfOocytes" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfOocytes" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->NoOfOocytes->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_NoOfOocytes" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfOocytes" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfOocytes" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->NoOfOocytes->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_NoOfOocytes" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfOocytes" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfOocytes" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->NoOfOocytes->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->RecordOocyteDenudation->Visible) { // RecordOocyteDenudation ?>
		<td data-name="RecordOocyteDenudation" <?php echo $ivf_oocytedenudation_grid->RecordOocyteDenudation->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_RecordOocyteDenudation" class="form-group">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_RecordOocyteDenudation" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RecordOocyteDenudation" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RecordOocyteDenudation" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->RecordOocyteDenudation->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->RecordOocyteDenudation->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->RecordOocyteDenudation->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_RecordOocyteDenudation" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RecordOocyteDenudation" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RecordOocyteDenudation" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->RecordOocyteDenudation->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_RecordOocyteDenudation" class="form-group">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_RecordOocyteDenudation" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RecordOocyteDenudation" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RecordOocyteDenudation" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->RecordOocyteDenudation->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->RecordOocyteDenudation->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->RecordOocyteDenudation->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_RecordOocyteDenudation">
<span<?php echo $ivf_oocytedenudation_grid->RecordOocyteDenudation->viewAttributes() ?>><?php echo $ivf_oocytedenudation_grid->RecordOocyteDenudation->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_RecordOocyteDenudation" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RecordOocyteDenudation" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RecordOocyteDenudation" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->RecordOocyteDenudation->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_RecordOocyteDenudation" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RecordOocyteDenudation" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RecordOocyteDenudation" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->RecordOocyteDenudation->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_RecordOocyteDenudation" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RecordOocyteDenudation" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RecordOocyteDenudation" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->RecordOocyteDenudation->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_RecordOocyteDenudation" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RecordOocyteDenudation" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RecordOocyteDenudation" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->RecordOocyteDenudation->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->DateOfDenudation->Visible) { // DateOfDenudation ?>
		<td data-name="DateOfDenudation" <?php echo $ivf_oocytedenudation_grid->DateOfDenudation->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_DateOfDenudation" class="form-group">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_DateOfDenudation" data-format="11" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DateOfDenudation" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DateOfDenudation" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->DateOfDenudation->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->DateOfDenudation->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->DateOfDenudation->editAttributes() ?>>
<?php if (!$ivf_oocytedenudation_grid->DateOfDenudation->ReadOnly && !$ivf_oocytedenudation_grid->DateOfDenudation->Disabled && !isset($ivf_oocytedenudation_grid->DateOfDenudation->EditAttrs["readonly"]) && !isset($ivf_oocytedenudation_grid->DateOfDenudation->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_oocytedenudationgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_oocytedenudationgrid", "x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DateOfDenudation", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_DateOfDenudation" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DateOfDenudation" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DateOfDenudation" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->DateOfDenudation->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_DateOfDenudation" class="form-group">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_DateOfDenudation" data-format="11" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DateOfDenudation" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DateOfDenudation" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->DateOfDenudation->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->DateOfDenudation->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->DateOfDenudation->editAttributes() ?>>
<?php if (!$ivf_oocytedenudation_grid->DateOfDenudation->ReadOnly && !$ivf_oocytedenudation_grid->DateOfDenudation->Disabled && !isset($ivf_oocytedenudation_grid->DateOfDenudation->EditAttrs["readonly"]) && !isset($ivf_oocytedenudation_grid->DateOfDenudation->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_oocytedenudationgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_oocytedenudationgrid", "x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DateOfDenudation", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_DateOfDenudation">
<span<?php echo $ivf_oocytedenudation_grid->DateOfDenudation->viewAttributes() ?>><?php echo $ivf_oocytedenudation_grid->DateOfDenudation->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_DateOfDenudation" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DateOfDenudation" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DateOfDenudation" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->DateOfDenudation->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_DateOfDenudation" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DateOfDenudation" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DateOfDenudation" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->DateOfDenudation->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_DateOfDenudation" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DateOfDenudation" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DateOfDenudation" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->DateOfDenudation->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_DateOfDenudation" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DateOfDenudation" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DateOfDenudation" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->DateOfDenudation->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->DenudationDoneBy->Visible) { // DenudationDoneBy ?>
		<td data-name="DenudationDoneBy" <?php echo $ivf_oocytedenudation_grid->DenudationDoneBy->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_DenudationDoneBy" class="form-group">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_DenudationDoneBy" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DenudationDoneBy" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DenudationDoneBy" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->DenudationDoneBy->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->DenudationDoneBy->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->DenudationDoneBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_DenudationDoneBy" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DenudationDoneBy" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DenudationDoneBy" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->DenudationDoneBy->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_DenudationDoneBy" class="form-group">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_DenudationDoneBy" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DenudationDoneBy" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DenudationDoneBy" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->DenudationDoneBy->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->DenudationDoneBy->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->DenudationDoneBy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_DenudationDoneBy">
<span<?php echo $ivf_oocytedenudation_grid->DenudationDoneBy->viewAttributes() ?>><?php echo $ivf_oocytedenudation_grid->DenudationDoneBy->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_DenudationDoneBy" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DenudationDoneBy" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DenudationDoneBy" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->DenudationDoneBy->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_DenudationDoneBy" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DenudationDoneBy" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DenudationDoneBy" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->DenudationDoneBy->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_DenudationDoneBy" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DenudationDoneBy" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DenudationDoneBy" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->DenudationDoneBy->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_DenudationDoneBy" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DenudationDoneBy" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DenudationDoneBy" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->DenudationDoneBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->status->Visible) { // status ?>
		<td data-name="status" <?php echo $ivf_oocytedenudation_grid->status->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_status" class="form-group">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_status" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_status" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_status" size="30" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->status->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->status->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->status->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_status" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_status" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->status->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_status" class="form-group">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_status" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_status" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_status" size="30" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->status->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->status->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->status->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_status">
<span<?php echo $ivf_oocytedenudation_grid->status->viewAttributes() ?>><?php echo $ivf_oocytedenudation_grid->status->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_status" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_status" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->status->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_status" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_status" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->status->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_status" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_status" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->status->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_status" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_status" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->status->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->createdby->Visible) { // createdby ?>
		<td data-name="createdby" <?php echo $ivf_oocytedenudation_grid->createdby->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_createdby" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_createdby" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->createdby->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_createdby">
<span<?php echo $ivf_oocytedenudation_grid->createdby->viewAttributes() ?>><?php echo $ivf_oocytedenudation_grid->createdby->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_createdby" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_createdby" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->createdby->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_createdby" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_createdby" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->createdby->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_createdby" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_createdby" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->createdby->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_createdby" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_createdby" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->createdby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" <?php echo $ivf_oocytedenudation_grid->createddatetime->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_createddatetime" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_createddatetime" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_createddatetime">
<span<?php echo $ivf_oocytedenudation_grid->createddatetime->viewAttributes() ?>><?php echo $ivf_oocytedenudation_grid->createddatetime->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_createddatetime" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_createddatetime" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->createddatetime->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_createddatetime" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_createddatetime" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->createddatetime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_createddatetime" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_createddatetime" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->createddatetime->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_createddatetime" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_createddatetime" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->createddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby" <?php echo $ivf_oocytedenudation_grid->modifiedby->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_modifiedby" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_modifiedby" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->modifiedby->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_modifiedby">
<span<?php echo $ivf_oocytedenudation_grid->modifiedby->viewAttributes() ?>><?php echo $ivf_oocytedenudation_grid->modifiedby->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_modifiedby" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_modifiedby" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->modifiedby->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_modifiedby" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_modifiedby" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->modifiedby->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_modifiedby" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_modifiedby" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->modifiedby->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_modifiedby" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_modifiedby" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->modifiedby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime" <?php echo $ivf_oocytedenudation_grid->modifieddatetime->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_modifieddatetime" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_modifieddatetime">
<span<?php echo $ivf_oocytedenudation_grid->modifieddatetime->viewAttributes() ?>><?php echo $ivf_oocytedenudation_grid->modifieddatetime->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_modifieddatetime" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->modifieddatetime->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_modifieddatetime" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->modifieddatetime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_modifieddatetime" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_modifieddatetime" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->modifieddatetime->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_modifieddatetime" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_modifieddatetime" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo" <?php echo $ivf_oocytedenudation_grid->TidNo->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($ivf_oocytedenudation_grid->TidNo->getSessionValue() != "") { ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_TidNo" class="form-group">
<span<?php echo $ivf_oocytedenudation_grid->TidNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_oocytedenudation_grid->TidNo->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_TidNo" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->TidNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_TidNo" class="form-group">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_TidNo" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_TidNo" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_TidNo" size="30" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->TidNo->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->TidNo->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->TidNo->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_TidNo" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_TidNo" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->TidNo->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($ivf_oocytedenudation_grid->TidNo->getSessionValue() != "") { ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_TidNo" class="form-group">
<span<?php echo $ivf_oocytedenudation_grid->TidNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_oocytedenudation_grid->TidNo->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_TidNo" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->TidNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_TidNo" class="form-group">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_TidNo" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_TidNo" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_TidNo" size="30" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->TidNo->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->TidNo->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->TidNo->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_TidNo">
<span<?php echo $ivf_oocytedenudation_grid->TidNo->viewAttributes() ?>><?php echo $ivf_oocytedenudation_grid->TidNo->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_TidNo" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_TidNo" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->TidNo->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_TidNo" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_TidNo" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->TidNo->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_TidNo" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_TidNo" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->TidNo->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_TidNo" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_TidNo" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->TidNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->ExpFollicles->Visible) { // ExpFollicles ?>
		<td data-name="ExpFollicles" <?php echo $ivf_oocytedenudation_grid->ExpFollicles->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_ExpFollicles" class="form-group">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_ExpFollicles" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ExpFollicles" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ExpFollicles" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->ExpFollicles->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->ExpFollicles->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->ExpFollicles->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_ExpFollicles" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ExpFollicles" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ExpFollicles" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->ExpFollicles->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_ExpFollicles" class="form-group">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_ExpFollicles" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ExpFollicles" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ExpFollicles" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->ExpFollicles->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->ExpFollicles->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->ExpFollicles->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_ExpFollicles">
<span<?php echo $ivf_oocytedenudation_grid->ExpFollicles->viewAttributes() ?>><?php echo $ivf_oocytedenudation_grid->ExpFollicles->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_ExpFollicles" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ExpFollicles" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ExpFollicles" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->ExpFollicles->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_ExpFollicles" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ExpFollicles" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ExpFollicles" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->ExpFollicles->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_ExpFollicles" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ExpFollicles" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ExpFollicles" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->ExpFollicles->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_ExpFollicles" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ExpFollicles" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ExpFollicles" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->ExpFollicles->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->SecondaryDenudationDoneBy->Visible) { // SecondaryDenudationDoneBy ?>
		<td data-name="SecondaryDenudationDoneBy" <?php echo $ivf_oocytedenudation_grid->SecondaryDenudationDoneBy->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_SecondaryDenudationDoneBy" class="form-group">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_SecondaryDenudationDoneBy" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryDenudationDoneBy" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryDenudationDoneBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->SecondaryDenudationDoneBy->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->SecondaryDenudationDoneBy->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->SecondaryDenudationDoneBy->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SecondaryDenudationDoneBy" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryDenudationDoneBy" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryDenudationDoneBy" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->SecondaryDenudationDoneBy->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_SecondaryDenudationDoneBy" class="form-group">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_SecondaryDenudationDoneBy" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryDenudationDoneBy" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryDenudationDoneBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->SecondaryDenudationDoneBy->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->SecondaryDenudationDoneBy->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->SecondaryDenudationDoneBy->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_SecondaryDenudationDoneBy">
<span<?php echo $ivf_oocytedenudation_grid->SecondaryDenudationDoneBy->viewAttributes() ?>><?php echo $ivf_oocytedenudation_grid->SecondaryDenudationDoneBy->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SecondaryDenudationDoneBy" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryDenudationDoneBy" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryDenudationDoneBy" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->SecondaryDenudationDoneBy->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SecondaryDenudationDoneBy" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryDenudationDoneBy" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryDenudationDoneBy" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->SecondaryDenudationDoneBy->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SecondaryDenudationDoneBy" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryDenudationDoneBy" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryDenudationDoneBy" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->SecondaryDenudationDoneBy->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SecondaryDenudationDoneBy" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryDenudationDoneBy" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryDenudationDoneBy" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->SecondaryDenudationDoneBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->OocyteOrgin->Visible) { // OocyteOrgin ?>
		<td data-name="OocyteOrgin" <?php echo $ivf_oocytedenudation_grid->OocyteOrgin->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_OocyteOrgin" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_oocytedenudation" data-field="x_OocyteOrgin" data-value-separator="<?php echo $ivf_oocytedenudation_grid->OocyteOrgin->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteOrgin" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteOrgin"<?php echo $ivf_oocytedenudation_grid->OocyteOrgin->editAttributes() ?>>
			<?php echo $ivf_oocytedenudation_grid->OocyteOrgin->selectOptionListHtml("x{$ivf_oocytedenudation_grid->RowIndex}_OocyteOrgin") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocyteOrgin" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteOrgin" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteOrgin" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->OocyteOrgin->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_OocyteOrgin" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_oocytedenudation" data-field="x_OocyteOrgin" data-value-separator="<?php echo $ivf_oocytedenudation_grid->OocyteOrgin->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteOrgin" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteOrgin"<?php echo $ivf_oocytedenudation_grid->OocyteOrgin->editAttributes() ?>>
			<?php echo $ivf_oocytedenudation_grid->OocyteOrgin->selectOptionListHtml("x{$ivf_oocytedenudation_grid->RowIndex}_OocyteOrgin") ?>
		</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_OocyteOrgin">
<span<?php echo $ivf_oocytedenudation_grid->OocyteOrgin->viewAttributes() ?>><?php echo $ivf_oocytedenudation_grid->OocyteOrgin->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocyteOrgin" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteOrgin" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteOrgin" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->OocyteOrgin->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocyteOrgin" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteOrgin" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteOrgin" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->OocyteOrgin->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocyteOrgin" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteOrgin" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteOrgin" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->OocyteOrgin->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocyteOrgin" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteOrgin" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteOrgin" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->OocyteOrgin->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->patient1->Visible) { // patient1 ?>
		<td data-name="patient1" <?php echo $ivf_oocytedenudation_grid->patient1->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_patient1" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient1"><?php echo EmptyValue(strval($ivf_oocytedenudation_grid->patient1->ViewValue)) ? $Language->phrase("PleaseSelect") : $ivf_oocytedenudation_grid->patient1->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($ivf_oocytedenudation_grid->patient1->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($ivf_oocytedenudation_grid->patient1->ReadOnly || $ivf_oocytedenudation_grid->patient1->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient1',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $ivf_oocytedenudation_grid->patient1->Lookup->getParamTag($ivf_oocytedenudation_grid, "p_x" . $ivf_oocytedenudation_grid->RowIndex . "_patient1") ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient1" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $ivf_oocytedenudation_grid->patient1->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient1" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient1" value="<?php echo $ivf_oocytedenudation_grid->patient1->CurrentValue ?>"<?php echo $ivf_oocytedenudation_grid->patient1->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient1" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient1" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient1" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->patient1->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_patient1" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient1"><?php echo EmptyValue(strval($ivf_oocytedenudation_grid->patient1->ViewValue)) ? $Language->phrase("PleaseSelect") : $ivf_oocytedenudation_grid->patient1->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($ivf_oocytedenudation_grid->patient1->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($ivf_oocytedenudation_grid->patient1->ReadOnly || $ivf_oocytedenudation_grid->patient1->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient1',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $ivf_oocytedenudation_grid->patient1->Lookup->getParamTag($ivf_oocytedenudation_grid, "p_x" . $ivf_oocytedenudation_grid->RowIndex . "_patient1") ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient1" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $ivf_oocytedenudation_grid->patient1->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient1" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient1" value="<?php echo $ivf_oocytedenudation_grid->patient1->CurrentValue ?>"<?php echo $ivf_oocytedenudation_grid->patient1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_patient1">
<span<?php echo $ivf_oocytedenudation_grid->patient1->viewAttributes() ?>><?php echo $ivf_oocytedenudation_grid->patient1->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient1" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient1" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient1" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->patient1->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient1" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient1" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient1" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->patient1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient1" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient1" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient1" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->patient1->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient1" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient1" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient1" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->patient1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->OocyteType->Visible) { // OocyteType ?>
		<td data-name="OocyteType" <?php echo $ivf_oocytedenudation_grid->OocyteType->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_OocyteType" class="form-group">
<div id="tp_x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteType" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="ivf_oocytedenudation" data-field="x_OocyteType" data-value-separator="<?php echo $ivf_oocytedenudation_grid->OocyteType->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteType[]" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteType[]" value="{value}"<?php echo $ivf_oocytedenudation_grid->OocyteType->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteType" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_oocytedenudation_grid->OocyteType->checkBoxListHtml(FALSE, "x{$ivf_oocytedenudation_grid->RowIndex}_OocyteType[]") ?>
</div></div>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocyteType" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteType[]" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteType[]" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->OocyteType->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_OocyteType" class="form-group">
<div id="tp_x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteType" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="ivf_oocytedenudation" data-field="x_OocyteType" data-value-separator="<?php echo $ivf_oocytedenudation_grid->OocyteType->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteType[]" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteType[]" value="{value}"<?php echo $ivf_oocytedenudation_grid->OocyteType->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteType" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_oocytedenudation_grid->OocyteType->checkBoxListHtml(FALSE, "x{$ivf_oocytedenudation_grid->RowIndex}_OocyteType[]") ?>
</div></div>
</span>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_OocyteType">
<span<?php echo $ivf_oocytedenudation_grid->OocyteType->viewAttributes() ?>><?php echo $ivf_oocytedenudation_grid->OocyteType->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocyteType" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteType" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteType" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->OocyteType->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocyteType" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteType[]" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteType[]" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->OocyteType->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocyteType" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteType" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteType" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->OocyteType->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocyteType" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteType[]" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteType[]" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->OocyteType->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->MIOocytesDonate1->Visible) { // MIOocytesDonate1 ?>
		<td data-name="MIOocytesDonate1" <?php echo $ivf_oocytedenudation_grid->MIOocytesDonate1->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_MIOocytesDonate1" class="form-group">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate1" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate1" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->MIOocytesDonate1->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->MIOocytesDonate1->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->MIOocytesDonate1->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate1" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate1" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate1" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->MIOocytesDonate1->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_MIOocytesDonate1" class="form-group">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate1" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate1" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->MIOocytesDonate1->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->MIOocytesDonate1->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->MIOocytesDonate1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_MIOocytesDonate1">
<span<?php echo $ivf_oocytedenudation_grid->MIOocytesDonate1->viewAttributes() ?>><?php echo $ivf_oocytedenudation_grid->MIOocytesDonate1->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate1" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate1" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate1" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->MIOocytesDonate1->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate1" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate1" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate1" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->MIOocytesDonate1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate1" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate1" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate1" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->MIOocytesDonate1->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate1" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate1" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate1" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->MIOocytesDonate1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->MIOocytesDonate2->Visible) { // MIOocytesDonate2 ?>
		<td data-name="MIOocytesDonate2" <?php echo $ivf_oocytedenudation_grid->MIOocytesDonate2->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_MIOocytesDonate2" class="form-group">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate2" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate2" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->MIOocytesDonate2->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->MIOocytesDonate2->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->MIOocytesDonate2->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate2" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate2" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate2" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->MIOocytesDonate2->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_MIOocytesDonate2" class="form-group">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate2" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate2" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->MIOocytesDonate2->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->MIOocytesDonate2->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->MIOocytesDonate2->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_MIOocytesDonate2">
<span<?php echo $ivf_oocytedenudation_grid->MIOocytesDonate2->viewAttributes() ?>><?php echo $ivf_oocytedenudation_grid->MIOocytesDonate2->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate2" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate2" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate2" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->MIOocytesDonate2->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate2" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate2" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate2" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->MIOocytesDonate2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate2" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate2" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate2" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->MIOocytesDonate2->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate2" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate2" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate2" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->MIOocytesDonate2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->SelfMI->Visible) { // SelfMI ?>
		<td data-name="SelfMI" <?php echo $ivf_oocytedenudation_grid->SelfMI->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_SelfMI" class="form-group">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_SelfMI" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMI" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMI" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->SelfMI->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->SelfMI->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->SelfMI->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfMI" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMI" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMI" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->SelfMI->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_SelfMI" class="form-group">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_SelfMI" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMI" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMI" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->SelfMI->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->SelfMI->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->SelfMI->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_SelfMI">
<span<?php echo $ivf_oocytedenudation_grid->SelfMI->viewAttributes() ?>><?php echo $ivf_oocytedenudation_grid->SelfMI->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfMI" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMI" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMI" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->SelfMI->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfMI" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMI" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMI" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->SelfMI->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfMI" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMI" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMI" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->SelfMI->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfMI" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMI" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMI" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->SelfMI->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->SelfMII->Visible) { // SelfMII ?>
		<td data-name="SelfMII" <?php echo $ivf_oocytedenudation_grid->SelfMII->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_SelfMII" class="form-group">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_SelfMII" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMII" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMII" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->SelfMII->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->SelfMII->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->SelfMII->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfMII" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMII" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMII" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->SelfMII->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_SelfMII" class="form-group">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_SelfMII" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMII" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMII" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->SelfMII->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->SelfMII->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->SelfMII->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_SelfMII">
<span<?php echo $ivf_oocytedenudation_grid->SelfMII->viewAttributes() ?>><?php echo $ivf_oocytedenudation_grid->SelfMII->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfMII" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMII" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMII" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->SelfMII->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfMII" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMII" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMII" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->SelfMII->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfMII" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMII" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMII" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->SelfMII->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfMII" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMII" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMII" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->SelfMII->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->patient3->Visible) { // patient3 ?>
		<td data-name="patient3" <?php echo $ivf_oocytedenudation_grid->patient3->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_patient3" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient3"><?php echo EmptyValue(strval($ivf_oocytedenudation_grid->patient3->ViewValue)) ? $Language->phrase("PleaseSelect") : $ivf_oocytedenudation_grid->patient3->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($ivf_oocytedenudation_grid->patient3->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($ivf_oocytedenudation_grid->patient3->ReadOnly || $ivf_oocytedenudation_grid->patient3->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient3',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $ivf_oocytedenudation_grid->patient3->Lookup->getParamTag($ivf_oocytedenudation_grid, "p_x" . $ivf_oocytedenudation_grid->RowIndex . "_patient3") ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient3" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $ivf_oocytedenudation_grid->patient3->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient3" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient3" value="<?php echo $ivf_oocytedenudation_grid->patient3->CurrentValue ?>"<?php echo $ivf_oocytedenudation_grid->patient3->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient3" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient3" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient3" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->patient3->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_patient3" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient3"><?php echo EmptyValue(strval($ivf_oocytedenudation_grid->patient3->ViewValue)) ? $Language->phrase("PleaseSelect") : $ivf_oocytedenudation_grid->patient3->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($ivf_oocytedenudation_grid->patient3->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($ivf_oocytedenudation_grid->patient3->ReadOnly || $ivf_oocytedenudation_grid->patient3->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient3',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $ivf_oocytedenudation_grid->patient3->Lookup->getParamTag($ivf_oocytedenudation_grid, "p_x" . $ivf_oocytedenudation_grid->RowIndex . "_patient3") ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient3" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $ivf_oocytedenudation_grid->patient3->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient3" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient3" value="<?php echo $ivf_oocytedenudation_grid->patient3->CurrentValue ?>"<?php echo $ivf_oocytedenudation_grid->patient3->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_patient3">
<span<?php echo $ivf_oocytedenudation_grid->patient3->viewAttributes() ?>><?php echo $ivf_oocytedenudation_grid->patient3->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient3" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient3" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient3" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->patient3->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient3" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient3" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient3" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->patient3->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient3" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient3" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient3" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->patient3->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient3" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient3" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient3" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->patient3->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->patient4->Visible) { // patient4 ?>
		<td data-name="patient4" <?php echo $ivf_oocytedenudation_grid->patient4->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_patient4" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient4"><?php echo EmptyValue(strval($ivf_oocytedenudation_grid->patient4->ViewValue)) ? $Language->phrase("PleaseSelect") : $ivf_oocytedenudation_grid->patient4->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($ivf_oocytedenudation_grid->patient4->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($ivf_oocytedenudation_grid->patient4->ReadOnly || $ivf_oocytedenudation_grid->patient4->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient4',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $ivf_oocytedenudation_grid->patient4->Lookup->getParamTag($ivf_oocytedenudation_grid, "p_x" . $ivf_oocytedenudation_grid->RowIndex . "_patient4") ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient4" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $ivf_oocytedenudation_grid->patient4->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient4" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient4" value="<?php echo $ivf_oocytedenudation_grid->patient4->CurrentValue ?>"<?php echo $ivf_oocytedenudation_grid->patient4->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient4" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient4" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient4" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->patient4->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_patient4" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient4"><?php echo EmptyValue(strval($ivf_oocytedenudation_grid->patient4->ViewValue)) ? $Language->phrase("PleaseSelect") : $ivf_oocytedenudation_grid->patient4->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($ivf_oocytedenudation_grid->patient4->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($ivf_oocytedenudation_grid->patient4->ReadOnly || $ivf_oocytedenudation_grid->patient4->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient4',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $ivf_oocytedenudation_grid->patient4->Lookup->getParamTag($ivf_oocytedenudation_grid, "p_x" . $ivf_oocytedenudation_grid->RowIndex . "_patient4") ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient4" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $ivf_oocytedenudation_grid->patient4->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient4" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient4" value="<?php echo $ivf_oocytedenudation_grid->patient4->CurrentValue ?>"<?php echo $ivf_oocytedenudation_grid->patient4->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_patient4">
<span<?php echo $ivf_oocytedenudation_grid->patient4->viewAttributes() ?>><?php echo $ivf_oocytedenudation_grid->patient4->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient4" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient4" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient4" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->patient4->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient4" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient4" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient4" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->patient4->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient4" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient4" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient4" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->patient4->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient4" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient4" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient4" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->patient4->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->OocytesDonate3->Visible) { // OocytesDonate3 ?>
		<td data-name="OocytesDonate3" <?php echo $ivf_oocytedenudation_grid->OocytesDonate3->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_OocytesDonate3" class="form-group">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_OocytesDonate3" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate3" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate3" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->OocytesDonate3->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->OocytesDonate3->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->OocytesDonate3->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocytesDonate3" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate3" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate3" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->OocytesDonate3->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_OocytesDonate3" class="form-group">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_OocytesDonate3" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate3" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate3" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->OocytesDonate3->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->OocytesDonate3->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->OocytesDonate3->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_OocytesDonate3">
<span<?php echo $ivf_oocytedenudation_grid->OocytesDonate3->viewAttributes() ?>><?php echo $ivf_oocytedenudation_grid->OocytesDonate3->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocytesDonate3" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate3" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate3" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->OocytesDonate3->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocytesDonate3" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate3" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate3" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->OocytesDonate3->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocytesDonate3" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate3" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate3" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->OocytesDonate3->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocytesDonate3" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate3" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate3" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->OocytesDonate3->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->OocytesDonate4->Visible) { // OocytesDonate4 ?>
		<td data-name="OocytesDonate4" <?php echo $ivf_oocytedenudation_grid->OocytesDonate4->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_OocytesDonate4" class="form-group">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_OocytesDonate4" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate4" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate4" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->OocytesDonate4->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->OocytesDonate4->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->OocytesDonate4->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocytesDonate4" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate4" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate4" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->OocytesDonate4->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_OocytesDonate4" class="form-group">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_OocytesDonate4" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate4" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate4" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->OocytesDonate4->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->OocytesDonate4->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->OocytesDonate4->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_OocytesDonate4">
<span<?php echo $ivf_oocytedenudation_grid->OocytesDonate4->viewAttributes() ?>><?php echo $ivf_oocytedenudation_grid->OocytesDonate4->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocytesDonate4" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate4" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate4" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->OocytesDonate4->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocytesDonate4" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate4" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate4" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->OocytesDonate4->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocytesDonate4" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate4" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate4" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->OocytesDonate4->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocytesDonate4" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate4" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate4" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->OocytesDonate4->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->MIOocytesDonate3->Visible) { // MIOocytesDonate3 ?>
		<td data-name="MIOocytesDonate3" <?php echo $ivf_oocytedenudation_grid->MIOocytesDonate3->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_MIOocytesDonate3" class="form-group">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate3" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate3" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate3" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->MIOocytesDonate3->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->MIOocytesDonate3->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->MIOocytesDonate3->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate3" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate3" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate3" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->MIOocytesDonate3->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_MIOocytesDonate3" class="form-group">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate3" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate3" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate3" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->MIOocytesDonate3->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->MIOocytesDonate3->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->MIOocytesDonate3->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_MIOocytesDonate3">
<span<?php echo $ivf_oocytedenudation_grid->MIOocytesDonate3->viewAttributes() ?>><?php echo $ivf_oocytedenudation_grid->MIOocytesDonate3->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate3" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate3" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate3" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->MIOocytesDonate3->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate3" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate3" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate3" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->MIOocytesDonate3->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate3" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate3" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate3" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->MIOocytesDonate3->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate3" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate3" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate3" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->MIOocytesDonate3->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->MIOocytesDonate4->Visible) { // MIOocytesDonate4 ?>
		<td data-name="MIOocytesDonate4" <?php echo $ivf_oocytedenudation_grid->MIOocytesDonate4->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_MIOocytesDonate4" class="form-group">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate4" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate4" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate4" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->MIOocytesDonate4->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->MIOocytesDonate4->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->MIOocytesDonate4->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate4" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate4" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate4" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->MIOocytesDonate4->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_MIOocytesDonate4" class="form-group">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate4" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate4" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate4" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->MIOocytesDonate4->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->MIOocytesDonate4->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->MIOocytesDonate4->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_MIOocytesDonate4">
<span<?php echo $ivf_oocytedenudation_grid->MIOocytesDonate4->viewAttributes() ?>><?php echo $ivf_oocytedenudation_grid->MIOocytesDonate4->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate4" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate4" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate4" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->MIOocytesDonate4->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate4" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate4" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate4" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->MIOocytesDonate4->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate4" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate4" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate4" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->MIOocytesDonate4->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate4" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate4" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate4" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->MIOocytesDonate4->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->SelfOocytesMI->Visible) { // SelfOocytesMI ?>
		<td data-name="SelfOocytesMI" <?php echo $ivf_oocytedenudation_grid->SelfOocytesMI->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_SelfOocytesMI" class="form-group">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_SelfOocytesMI" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMI" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMI" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->SelfOocytesMI->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->SelfOocytesMI->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->SelfOocytesMI->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfOocytesMI" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMI" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMI" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->SelfOocytesMI->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_SelfOocytesMI" class="form-group">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_SelfOocytesMI" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMI" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMI" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->SelfOocytesMI->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->SelfOocytesMI->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->SelfOocytesMI->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_SelfOocytesMI">
<span<?php echo $ivf_oocytedenudation_grid->SelfOocytesMI->viewAttributes() ?>><?php echo $ivf_oocytedenudation_grid->SelfOocytesMI->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfOocytesMI" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMI" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMI" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->SelfOocytesMI->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfOocytesMI" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMI" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMI" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->SelfOocytesMI->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfOocytesMI" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMI" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMI" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->SelfOocytesMI->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfOocytesMI" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMI" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMI" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->SelfOocytesMI->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->SelfOocytesMII->Visible) { // SelfOocytesMII ?>
		<td data-name="SelfOocytesMII" <?php echo $ivf_oocytedenudation_grid->SelfOocytesMII->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_SelfOocytesMII" class="form-group">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_SelfOocytesMII" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMII" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMII" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->SelfOocytesMII->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->SelfOocytesMII->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->SelfOocytesMII->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfOocytesMII" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMII" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMII" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->SelfOocytesMII->OldValue) ?>">
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_SelfOocytesMII" class="form-group">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_SelfOocytesMII" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMII" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMII" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->SelfOocytesMII->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->SelfOocytesMII->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->SelfOocytesMII->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_oocytedenudation_grid->RowCount ?>_ivf_oocytedenudation_SelfOocytesMII">
<span<?php echo $ivf_oocytedenudation_grid->SelfOocytesMII->viewAttributes() ?>><?php echo $ivf_oocytedenudation_grid->SelfOocytesMII->getViewValue() ?></span>
</span>
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfOocytesMII" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMII" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMII" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->SelfOocytesMII->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfOocytesMII" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMII" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMII" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->SelfOocytesMII->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfOocytesMII" name="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMII" id="fivf_oocytedenudationgrid$x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMII" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->SelfOocytesMII->FormValue) ?>">
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfOocytesMII" name="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMII" id="fivf_oocytedenudationgrid$o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMII" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->SelfOocytesMII->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_oocytedenudation_grid->ListOptions->render("body", "right", $ivf_oocytedenudation_grid->RowCount);
?>
	</tr>
<?php if ($ivf_oocytedenudation->RowType == ROWTYPE_ADD || $ivf_oocytedenudation->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fivf_oocytedenudationgrid", "load"], function() {
	fivf_oocytedenudationgrid.updateLists(<?php echo $ivf_oocytedenudation_grid->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$ivf_oocytedenudation_grid->isGridAdd() || $ivf_oocytedenudation->CurrentMode == "copy")
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
		$ivf_oocytedenudation->RowAttrs->merge(["data-rowindex" => $ivf_oocytedenudation_grid->RowIndex, "id" => "r0_ivf_oocytedenudation", "data-rowtype" => ROWTYPE_ADD]);
		$ivf_oocytedenudation->RowAttrs->appendClass("ew-template");
		$ivf_oocytedenudation->RowType = ROWTYPE_ADD;

		// Render row
		$ivf_oocytedenudation_grid->renderRow();

		// Render list options
		$ivf_oocytedenudation_grid->renderListOptions();
		$ivf_oocytedenudation_grid->StartRowCount = 0;
?>
	<tr <?php echo $ivf_oocytedenudation->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_oocytedenudation_grid->ListOptions->render("body", "left", $ivf_oocytedenudation_grid->RowIndex);
?>
	<?php if ($ivf_oocytedenudation_grid->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_id" class="form-group ivf_oocytedenudation_id"></span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_id" class="form-group ivf_oocytedenudation_id">
<span<?php echo $ivf_oocytedenudation_grid->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_oocytedenudation_grid->id->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_id" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_id" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_id" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_id" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->RIDNo->Visible) { // RIDNo ?>
		<td data-name="RIDNo">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<?php if ($ivf_oocytedenudation_grid->RIDNo->getSessionValue() != "") { ?>
<span id="el$rowindex$_ivf_oocytedenudation_RIDNo" class="form-group ivf_oocytedenudation_RIDNo">
<span<?php echo $ivf_oocytedenudation_grid->RIDNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_oocytedenudation_grid->RIDNo->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RIDNo" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->RIDNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_RIDNo" class="form-group ivf_oocytedenudation_RIDNo">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_RIDNo" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RIDNo" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RIDNo" size="30" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->RIDNo->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->RIDNo->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->RIDNo->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_RIDNo" class="form-group ivf_oocytedenudation_RIDNo">
<span<?php echo $ivf_oocytedenudation_grid->RIDNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_oocytedenudation_grid->RIDNo->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_RIDNo" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RIDNo" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->RIDNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_RIDNo" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RIDNo" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->RIDNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->Name->Visible) { // Name ?>
		<td data-name="Name">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<?php if ($ivf_oocytedenudation_grid->Name->getSessionValue() != "") { ?>
<span id="el$rowindex$_ivf_oocytedenudation_Name" class="form-group ivf_oocytedenudation_Name">
<span<?php echo $ivf_oocytedenudation_grid->Name->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_oocytedenudation_grid->Name->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Name" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->Name->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_Name" class="form-group ivf_oocytedenudation_Name">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_Name" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Name" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->Name->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->Name->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->Name->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_Name" class="form-group ivf_oocytedenudation_Name">
<span<?php echo $ivf_oocytedenudation_grid->Name->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_oocytedenudation_grid->Name->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_Name" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Name" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->Name->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_Name" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Name" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->Name->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->ResultDate->Visible) { // ResultDate ?>
		<td data-name="ResultDate">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_ResultDate" class="form-group ivf_oocytedenudation_ResultDate">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_ResultDate" data-format="11" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ResultDate" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ResultDate" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->ResultDate->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->ResultDate->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->ResultDate->editAttributes() ?>>
<?php if (!$ivf_oocytedenudation_grid->ResultDate->ReadOnly && !$ivf_oocytedenudation_grid->ResultDate->Disabled && !isset($ivf_oocytedenudation_grid->ResultDate->EditAttrs["readonly"]) && !isset($ivf_oocytedenudation_grid->ResultDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_oocytedenudationgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_oocytedenudationgrid", "x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_ResultDate" class="form-group ivf_oocytedenudation_ResultDate">
<span<?php echo $ivf_oocytedenudation_grid->ResultDate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_oocytedenudation_grid->ResultDate->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_ResultDate" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ResultDate" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->ResultDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_ResultDate" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ResultDate" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ResultDate" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->ResultDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->Surgeon->Visible) { // Surgeon ?>
		<td data-name="Surgeon">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_Surgeon" class="form-group ivf_oocytedenudation_Surgeon">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_Surgeon" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Surgeon" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Surgeon" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->Surgeon->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->Surgeon->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->Surgeon->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_Surgeon" class="form-group ivf_oocytedenudation_Surgeon">
<span<?php echo $ivf_oocytedenudation_grid->Surgeon->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_oocytedenudation_grid->Surgeon->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_Surgeon" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Surgeon" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Surgeon" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->Surgeon->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_Surgeon" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Surgeon" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Surgeon" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->Surgeon->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->AsstSurgeon->Visible) { // AsstSurgeon ?>
		<td data-name="AsstSurgeon">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_AsstSurgeon" class="form-group ivf_oocytedenudation_AsstSurgeon">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_AsstSurgeon" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AsstSurgeon" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AsstSurgeon" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->AsstSurgeon->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->AsstSurgeon->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->AsstSurgeon->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_AsstSurgeon" class="form-group ivf_oocytedenudation_AsstSurgeon">
<span<?php echo $ivf_oocytedenudation_grid->AsstSurgeon->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_oocytedenudation_grid->AsstSurgeon->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_AsstSurgeon" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AsstSurgeon" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AsstSurgeon" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->AsstSurgeon->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_AsstSurgeon" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AsstSurgeon" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AsstSurgeon" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->AsstSurgeon->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->Anaesthetist->Visible) { // Anaesthetist ?>
		<td data-name="Anaesthetist">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_Anaesthetist" class="form-group ivf_oocytedenudation_Anaesthetist">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_Anaesthetist" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Anaesthetist" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Anaesthetist" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->Anaesthetist->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->Anaesthetist->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->Anaesthetist->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_Anaesthetist" class="form-group ivf_oocytedenudation_Anaesthetist">
<span<?php echo $ivf_oocytedenudation_grid->Anaesthetist->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_oocytedenudation_grid->Anaesthetist->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_Anaesthetist" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Anaesthetist" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Anaesthetist" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->Anaesthetist->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_Anaesthetist" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Anaesthetist" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_Anaesthetist" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->Anaesthetist->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->AnaestheiaType->Visible) { // AnaestheiaType ?>
		<td data-name="AnaestheiaType">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_AnaestheiaType" class="form-group ivf_oocytedenudation_AnaestheiaType">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_AnaestheiaType" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AnaestheiaType" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AnaestheiaType" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->AnaestheiaType->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->AnaestheiaType->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->AnaestheiaType->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_AnaestheiaType" class="form-group ivf_oocytedenudation_AnaestheiaType">
<span<?php echo $ivf_oocytedenudation_grid->AnaestheiaType->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_oocytedenudation_grid->AnaestheiaType->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_AnaestheiaType" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AnaestheiaType" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AnaestheiaType" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->AnaestheiaType->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_AnaestheiaType" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AnaestheiaType" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_AnaestheiaType" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->AnaestheiaType->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->PrimaryEmbryologist->Visible) { // PrimaryEmbryologist ?>
		<td data-name="PrimaryEmbryologist">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_PrimaryEmbryologist" class="form-group ivf_oocytedenudation_PrimaryEmbryologist">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_PrimaryEmbryologist" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_PrimaryEmbryologist" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_PrimaryEmbryologist" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->PrimaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->PrimaryEmbryologist->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->PrimaryEmbryologist->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_PrimaryEmbryologist" class="form-group ivf_oocytedenudation_PrimaryEmbryologist">
<span<?php echo $ivf_oocytedenudation_grid->PrimaryEmbryologist->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_oocytedenudation_grid->PrimaryEmbryologist->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_PrimaryEmbryologist" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_PrimaryEmbryologist" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_PrimaryEmbryologist" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->PrimaryEmbryologist->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_PrimaryEmbryologist" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_PrimaryEmbryologist" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_PrimaryEmbryologist" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->PrimaryEmbryologist->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->SecondaryEmbryologist->Visible) { // SecondaryEmbryologist ?>
		<td data-name="SecondaryEmbryologist">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_SecondaryEmbryologist" class="form-group ivf_oocytedenudation_SecondaryEmbryologist">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_SecondaryEmbryologist" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryEmbryologist" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryEmbryologist" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->SecondaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->SecondaryEmbryologist->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->SecondaryEmbryologist->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_SecondaryEmbryologist" class="form-group ivf_oocytedenudation_SecondaryEmbryologist">
<span<?php echo $ivf_oocytedenudation_grid->SecondaryEmbryologist->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_oocytedenudation_grid->SecondaryEmbryologist->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SecondaryEmbryologist" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryEmbryologist" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryEmbryologist" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->SecondaryEmbryologist->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SecondaryEmbryologist" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryEmbryologist" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryEmbryologist" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->SecondaryEmbryologist->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->NoOfFolliclesRight->Visible) { // NoOfFolliclesRight ?>
		<td data-name="NoOfFolliclesRight">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_NoOfFolliclesRight" class="form-group ivf_oocytedenudation_NoOfFolliclesRight">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_NoOfFolliclesRight" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesRight" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesRight" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->NoOfFolliclesRight->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->NoOfFolliclesRight->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->NoOfFolliclesRight->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_NoOfFolliclesRight" class="form-group ivf_oocytedenudation_NoOfFolliclesRight">
<span<?php echo $ivf_oocytedenudation_grid->NoOfFolliclesRight->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_oocytedenudation_grid->NoOfFolliclesRight->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_NoOfFolliclesRight" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesRight" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesRight" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->NoOfFolliclesRight->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_NoOfFolliclesRight" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesRight" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesRight" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->NoOfFolliclesRight->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->NoOfFolliclesLeft->Visible) { // NoOfFolliclesLeft ?>
		<td data-name="NoOfFolliclesLeft">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_NoOfFolliclesLeft" class="form-group ivf_oocytedenudation_NoOfFolliclesLeft">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_NoOfFolliclesLeft" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesLeft" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesLeft" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->NoOfFolliclesLeft->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->NoOfFolliclesLeft->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->NoOfFolliclesLeft->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_NoOfFolliclesLeft" class="form-group ivf_oocytedenudation_NoOfFolliclesLeft">
<span<?php echo $ivf_oocytedenudation_grid->NoOfFolliclesLeft->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_oocytedenudation_grid->NoOfFolliclesLeft->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_NoOfFolliclesLeft" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesLeft" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesLeft" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->NoOfFolliclesLeft->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_NoOfFolliclesLeft" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesLeft" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfFolliclesLeft" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->NoOfFolliclesLeft->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->NoOfOocytes->Visible) { // NoOfOocytes ?>
		<td data-name="NoOfOocytes">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_NoOfOocytes" class="form-group ivf_oocytedenudation_NoOfOocytes">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_NoOfOocytes" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfOocytes" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfOocytes" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->NoOfOocytes->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->NoOfOocytes->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->NoOfOocytes->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_NoOfOocytes" class="form-group ivf_oocytedenudation_NoOfOocytes">
<span<?php echo $ivf_oocytedenudation_grid->NoOfOocytes->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_oocytedenudation_grid->NoOfOocytes->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_NoOfOocytes" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfOocytes" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfOocytes" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->NoOfOocytes->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_NoOfOocytes" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfOocytes" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_NoOfOocytes" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->NoOfOocytes->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->RecordOocyteDenudation->Visible) { // RecordOocyteDenudation ?>
		<td data-name="RecordOocyteDenudation">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_RecordOocyteDenudation" class="form-group ivf_oocytedenudation_RecordOocyteDenudation">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_RecordOocyteDenudation" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RecordOocyteDenudation" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RecordOocyteDenudation" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->RecordOocyteDenudation->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->RecordOocyteDenudation->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->RecordOocyteDenudation->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_RecordOocyteDenudation" class="form-group ivf_oocytedenudation_RecordOocyteDenudation">
<span<?php echo $ivf_oocytedenudation_grid->RecordOocyteDenudation->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_oocytedenudation_grid->RecordOocyteDenudation->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_RecordOocyteDenudation" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RecordOocyteDenudation" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RecordOocyteDenudation" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->RecordOocyteDenudation->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_RecordOocyteDenudation" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RecordOocyteDenudation" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_RecordOocyteDenudation" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->RecordOocyteDenudation->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->DateOfDenudation->Visible) { // DateOfDenudation ?>
		<td data-name="DateOfDenudation">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_DateOfDenudation" class="form-group ivf_oocytedenudation_DateOfDenudation">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_DateOfDenudation" data-format="11" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DateOfDenudation" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DateOfDenudation" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->DateOfDenudation->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->DateOfDenudation->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->DateOfDenudation->editAttributes() ?>>
<?php if (!$ivf_oocytedenudation_grid->DateOfDenudation->ReadOnly && !$ivf_oocytedenudation_grid->DateOfDenudation->Disabled && !isset($ivf_oocytedenudation_grid->DateOfDenudation->EditAttrs["readonly"]) && !isset($ivf_oocytedenudation_grid->DateOfDenudation->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_oocytedenudationgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_oocytedenudationgrid", "x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DateOfDenudation", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_DateOfDenudation" class="form-group ivf_oocytedenudation_DateOfDenudation">
<span<?php echo $ivf_oocytedenudation_grid->DateOfDenudation->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_oocytedenudation_grid->DateOfDenudation->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_DateOfDenudation" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DateOfDenudation" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DateOfDenudation" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->DateOfDenudation->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_DateOfDenudation" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DateOfDenudation" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DateOfDenudation" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->DateOfDenudation->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->DenudationDoneBy->Visible) { // DenudationDoneBy ?>
		<td data-name="DenudationDoneBy">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_DenudationDoneBy" class="form-group ivf_oocytedenudation_DenudationDoneBy">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_DenudationDoneBy" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DenudationDoneBy" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DenudationDoneBy" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->DenudationDoneBy->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->DenudationDoneBy->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->DenudationDoneBy->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_DenudationDoneBy" class="form-group ivf_oocytedenudation_DenudationDoneBy">
<span<?php echo $ivf_oocytedenudation_grid->DenudationDoneBy->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_oocytedenudation_grid->DenudationDoneBy->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_DenudationDoneBy" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DenudationDoneBy" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DenudationDoneBy" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->DenudationDoneBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_DenudationDoneBy" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DenudationDoneBy" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_DenudationDoneBy" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->DenudationDoneBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->status->Visible) { // status ?>
		<td data-name="status">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_status" class="form-group ivf_oocytedenudation_status">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_status" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_status" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_status" size="30" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->status->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->status->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->status->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_status" class="form-group ivf_oocytedenudation_status">
<span<?php echo $ivf_oocytedenudation_grid->status->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_oocytedenudation_grid->status->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_status" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_status" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->status->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_status" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_status" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->status->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->createdby->Visible) { // createdby ?>
		<td data-name="createdby">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_createdby" class="form-group ivf_oocytedenudation_createdby">
<span<?php echo $ivf_oocytedenudation_grid->createdby->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_oocytedenudation_grid->createdby->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_createdby" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_createdby" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->createdby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_createdby" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_createdby" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->createdby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_createddatetime" class="form-group ivf_oocytedenudation_createddatetime">
<span<?php echo $ivf_oocytedenudation_grid->createddatetime->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_oocytedenudation_grid->createddatetime->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_createddatetime" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_createddatetime" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->createddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_createddatetime" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_createddatetime" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->createddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_modifiedby" class="form-group ivf_oocytedenudation_modifiedby">
<span<?php echo $ivf_oocytedenudation_grid->modifiedby->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_oocytedenudation_grid->modifiedby->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_modifiedby" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_modifiedby" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->modifiedby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_modifiedby" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_modifiedby" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->modifiedby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_modifieddatetime" class="form-group ivf_oocytedenudation_modifieddatetime">
<span<?php echo $ivf_oocytedenudation_grid->modifieddatetime->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_oocytedenudation_grid->modifieddatetime->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_modifieddatetime" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->modifieddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_modifieddatetime" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->modifieddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<?php if ($ivf_oocytedenudation_grid->TidNo->getSessionValue() != "") { ?>
<span id="el$rowindex$_ivf_oocytedenudation_TidNo" class="form-group ivf_oocytedenudation_TidNo">
<span<?php echo $ivf_oocytedenudation_grid->TidNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_oocytedenudation_grid->TidNo->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_TidNo" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->TidNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_TidNo" class="form-group ivf_oocytedenudation_TidNo">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_TidNo" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_TidNo" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_TidNo" size="30" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->TidNo->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->TidNo->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->TidNo->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_TidNo" class="form-group ivf_oocytedenudation_TidNo">
<span<?php echo $ivf_oocytedenudation_grid->TidNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_oocytedenudation_grid->TidNo->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_TidNo" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_TidNo" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->TidNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_TidNo" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_TidNo" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->TidNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->ExpFollicles->Visible) { // ExpFollicles ?>
		<td data-name="ExpFollicles">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_ExpFollicles" class="form-group ivf_oocytedenudation_ExpFollicles">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_ExpFollicles" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ExpFollicles" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ExpFollicles" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->ExpFollicles->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->ExpFollicles->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->ExpFollicles->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_ExpFollicles" class="form-group ivf_oocytedenudation_ExpFollicles">
<span<?php echo $ivf_oocytedenudation_grid->ExpFollicles->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_oocytedenudation_grid->ExpFollicles->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_ExpFollicles" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ExpFollicles" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ExpFollicles" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->ExpFollicles->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_ExpFollicles" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ExpFollicles" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_ExpFollicles" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->ExpFollicles->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->SecondaryDenudationDoneBy->Visible) { // SecondaryDenudationDoneBy ?>
		<td data-name="SecondaryDenudationDoneBy">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_SecondaryDenudationDoneBy" class="form-group ivf_oocytedenudation_SecondaryDenudationDoneBy">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_SecondaryDenudationDoneBy" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryDenudationDoneBy" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryDenudationDoneBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->SecondaryDenudationDoneBy->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->SecondaryDenudationDoneBy->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->SecondaryDenudationDoneBy->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_SecondaryDenudationDoneBy" class="form-group ivf_oocytedenudation_SecondaryDenudationDoneBy">
<span<?php echo $ivf_oocytedenudation_grid->SecondaryDenudationDoneBy->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_oocytedenudation_grid->SecondaryDenudationDoneBy->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SecondaryDenudationDoneBy" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryDenudationDoneBy" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryDenudationDoneBy" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->SecondaryDenudationDoneBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SecondaryDenudationDoneBy" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryDenudationDoneBy" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SecondaryDenudationDoneBy" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->SecondaryDenudationDoneBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->OocyteOrgin->Visible) { // OocyteOrgin ?>
		<td data-name="OocyteOrgin">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_OocyteOrgin" class="form-group ivf_oocytedenudation_OocyteOrgin">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_oocytedenudation" data-field="x_OocyteOrgin" data-value-separator="<?php echo $ivf_oocytedenudation_grid->OocyteOrgin->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteOrgin" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteOrgin"<?php echo $ivf_oocytedenudation_grid->OocyteOrgin->editAttributes() ?>>
			<?php echo $ivf_oocytedenudation_grid->OocyteOrgin->selectOptionListHtml("x{$ivf_oocytedenudation_grid->RowIndex}_OocyteOrgin") ?>
		</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_OocyteOrgin" class="form-group ivf_oocytedenudation_OocyteOrgin">
<span<?php echo $ivf_oocytedenudation_grid->OocyteOrgin->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_oocytedenudation_grid->OocyteOrgin->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocyteOrgin" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteOrgin" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteOrgin" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->OocyteOrgin->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocyteOrgin" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteOrgin" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteOrgin" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->OocyteOrgin->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->patient1->Visible) { // patient1 ?>
		<td data-name="patient1">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_patient1" class="form-group ivf_oocytedenudation_patient1">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient1"><?php echo EmptyValue(strval($ivf_oocytedenudation_grid->patient1->ViewValue)) ? $Language->phrase("PleaseSelect") : $ivf_oocytedenudation_grid->patient1->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($ivf_oocytedenudation_grid->patient1->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($ivf_oocytedenudation_grid->patient1->ReadOnly || $ivf_oocytedenudation_grid->patient1->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient1',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $ivf_oocytedenudation_grid->patient1->Lookup->getParamTag($ivf_oocytedenudation_grid, "p_x" . $ivf_oocytedenudation_grid->RowIndex . "_patient1") ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient1" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $ivf_oocytedenudation_grid->patient1->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient1" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient1" value="<?php echo $ivf_oocytedenudation_grid->patient1->CurrentValue ?>"<?php echo $ivf_oocytedenudation_grid->patient1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_patient1" class="form-group ivf_oocytedenudation_patient1">
<span<?php echo $ivf_oocytedenudation_grid->patient1->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_oocytedenudation_grid->patient1->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient1" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient1" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient1" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->patient1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient1" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient1" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient1" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->patient1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->OocyteType->Visible) { // OocyteType ?>
		<td data-name="OocyteType">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_OocyteType" class="form-group ivf_oocytedenudation_OocyteType">
<div id="tp_x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteType" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="ivf_oocytedenudation" data-field="x_OocyteType" data-value-separator="<?php echo $ivf_oocytedenudation_grid->OocyteType->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteType[]" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteType[]" value="{value}"<?php echo $ivf_oocytedenudation_grid->OocyteType->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteType" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_oocytedenudation_grid->OocyteType->checkBoxListHtml(FALSE, "x{$ivf_oocytedenudation_grid->RowIndex}_OocyteType[]") ?>
</div></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_OocyteType" class="form-group ivf_oocytedenudation_OocyteType">
<span<?php echo $ivf_oocytedenudation_grid->OocyteType->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_oocytedenudation_grid->OocyteType->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocyteType" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteType" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteType" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->OocyteType->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocyteType" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteType[]" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocyteType[]" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->OocyteType->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->MIOocytesDonate1->Visible) { // MIOocytesDonate1 ?>
		<td data-name="MIOocytesDonate1">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_MIOocytesDonate1" class="form-group ivf_oocytedenudation_MIOocytesDonate1">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate1" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate1" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->MIOocytesDonate1->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->MIOocytesDonate1->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->MIOocytesDonate1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_MIOocytesDonate1" class="form-group ivf_oocytedenudation_MIOocytesDonate1">
<span<?php echo $ivf_oocytedenudation_grid->MIOocytesDonate1->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_oocytedenudation_grid->MIOocytesDonate1->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate1" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate1" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate1" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->MIOocytesDonate1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate1" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate1" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate1" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->MIOocytesDonate1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->MIOocytesDonate2->Visible) { // MIOocytesDonate2 ?>
		<td data-name="MIOocytesDonate2">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_MIOocytesDonate2" class="form-group ivf_oocytedenudation_MIOocytesDonate2">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate2" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate2" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->MIOocytesDonate2->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->MIOocytesDonate2->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->MIOocytesDonate2->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_MIOocytesDonate2" class="form-group ivf_oocytedenudation_MIOocytesDonate2">
<span<?php echo $ivf_oocytedenudation_grid->MIOocytesDonate2->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_oocytedenudation_grid->MIOocytesDonate2->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate2" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate2" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate2" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->MIOocytesDonate2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate2" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate2" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate2" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->MIOocytesDonate2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->SelfMI->Visible) { // SelfMI ?>
		<td data-name="SelfMI">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_SelfMI" class="form-group ivf_oocytedenudation_SelfMI">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_SelfMI" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMI" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMI" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->SelfMI->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->SelfMI->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->SelfMI->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_SelfMI" class="form-group ivf_oocytedenudation_SelfMI">
<span<?php echo $ivf_oocytedenudation_grid->SelfMI->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_oocytedenudation_grid->SelfMI->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfMI" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMI" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMI" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->SelfMI->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfMI" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMI" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMI" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->SelfMI->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->SelfMII->Visible) { // SelfMII ?>
		<td data-name="SelfMII">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_SelfMII" class="form-group ivf_oocytedenudation_SelfMII">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_SelfMII" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMII" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMII" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->SelfMII->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->SelfMII->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->SelfMII->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_SelfMII" class="form-group ivf_oocytedenudation_SelfMII">
<span<?php echo $ivf_oocytedenudation_grid->SelfMII->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_oocytedenudation_grid->SelfMII->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfMII" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMII" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMII" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->SelfMII->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfMII" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMII" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfMII" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->SelfMII->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->patient3->Visible) { // patient3 ?>
		<td data-name="patient3">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_patient3" class="form-group ivf_oocytedenudation_patient3">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient3"><?php echo EmptyValue(strval($ivf_oocytedenudation_grid->patient3->ViewValue)) ? $Language->phrase("PleaseSelect") : $ivf_oocytedenudation_grid->patient3->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($ivf_oocytedenudation_grid->patient3->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($ivf_oocytedenudation_grid->patient3->ReadOnly || $ivf_oocytedenudation_grid->patient3->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient3',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $ivf_oocytedenudation_grid->patient3->Lookup->getParamTag($ivf_oocytedenudation_grid, "p_x" . $ivf_oocytedenudation_grid->RowIndex . "_patient3") ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient3" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $ivf_oocytedenudation_grid->patient3->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient3" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient3" value="<?php echo $ivf_oocytedenudation_grid->patient3->CurrentValue ?>"<?php echo $ivf_oocytedenudation_grid->patient3->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_patient3" class="form-group ivf_oocytedenudation_patient3">
<span<?php echo $ivf_oocytedenudation_grid->patient3->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_oocytedenudation_grid->patient3->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient3" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient3" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient3" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->patient3->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient3" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient3" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient3" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->patient3->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->patient4->Visible) { // patient4 ?>
		<td data-name="patient4">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_patient4" class="form-group ivf_oocytedenudation_patient4">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient4"><?php echo EmptyValue(strval($ivf_oocytedenudation_grid->patient4->ViewValue)) ? $Language->phrase("PleaseSelect") : $ivf_oocytedenudation_grid->patient4->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($ivf_oocytedenudation_grid->patient4->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($ivf_oocytedenudation_grid->patient4->ReadOnly || $ivf_oocytedenudation_grid->patient4->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient4',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $ivf_oocytedenudation_grid->patient4->Lookup->getParamTag($ivf_oocytedenudation_grid, "p_x" . $ivf_oocytedenudation_grid->RowIndex . "_patient4") ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient4" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $ivf_oocytedenudation_grid->patient4->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient4" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient4" value="<?php echo $ivf_oocytedenudation_grid->patient4->CurrentValue ?>"<?php echo $ivf_oocytedenudation_grid->patient4->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_patient4" class="form-group ivf_oocytedenudation_patient4">
<span<?php echo $ivf_oocytedenudation_grid->patient4->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_oocytedenudation_grid->patient4->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient4" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient4" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient4" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->patient4->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient4" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient4" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_patient4" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->patient4->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->OocytesDonate3->Visible) { // OocytesDonate3 ?>
		<td data-name="OocytesDonate3">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_OocytesDonate3" class="form-group ivf_oocytedenudation_OocytesDonate3">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_OocytesDonate3" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate3" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate3" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->OocytesDonate3->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->OocytesDonate3->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->OocytesDonate3->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_OocytesDonate3" class="form-group ivf_oocytedenudation_OocytesDonate3">
<span<?php echo $ivf_oocytedenudation_grid->OocytesDonate3->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_oocytedenudation_grid->OocytesDonate3->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocytesDonate3" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate3" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate3" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->OocytesDonate3->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocytesDonate3" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate3" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate3" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->OocytesDonate3->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->OocytesDonate4->Visible) { // OocytesDonate4 ?>
		<td data-name="OocytesDonate4">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_OocytesDonate4" class="form-group ivf_oocytedenudation_OocytesDonate4">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_OocytesDonate4" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate4" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate4" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->OocytesDonate4->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->OocytesDonate4->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->OocytesDonate4->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_OocytesDonate4" class="form-group ivf_oocytedenudation_OocytesDonate4">
<span<?php echo $ivf_oocytedenudation_grid->OocytesDonate4->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_oocytedenudation_grid->OocytesDonate4->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocytesDonate4" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate4" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate4" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->OocytesDonate4->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_OocytesDonate4" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate4" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_OocytesDonate4" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->OocytesDonate4->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->MIOocytesDonate3->Visible) { // MIOocytesDonate3 ?>
		<td data-name="MIOocytesDonate3">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_MIOocytesDonate3" class="form-group ivf_oocytedenudation_MIOocytesDonate3">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate3" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate3" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate3" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->MIOocytesDonate3->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->MIOocytesDonate3->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->MIOocytesDonate3->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_MIOocytesDonate3" class="form-group ivf_oocytedenudation_MIOocytesDonate3">
<span<?php echo $ivf_oocytedenudation_grid->MIOocytesDonate3->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_oocytedenudation_grid->MIOocytesDonate3->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate3" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate3" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate3" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->MIOocytesDonate3->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate3" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate3" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate3" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->MIOocytesDonate3->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->MIOocytesDonate4->Visible) { // MIOocytesDonate4 ?>
		<td data-name="MIOocytesDonate4">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_MIOocytesDonate4" class="form-group ivf_oocytedenudation_MIOocytesDonate4">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate4" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate4" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate4" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->MIOocytesDonate4->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->MIOocytesDonate4->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->MIOocytesDonate4->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_MIOocytesDonate4" class="form-group ivf_oocytedenudation_MIOocytesDonate4">
<span<?php echo $ivf_oocytedenudation_grid->MIOocytesDonate4->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_oocytedenudation_grid->MIOocytesDonate4->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate4" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate4" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate4" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->MIOocytesDonate4->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate4" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate4" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_MIOocytesDonate4" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->MIOocytesDonate4->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->SelfOocytesMI->Visible) { // SelfOocytesMI ?>
		<td data-name="SelfOocytesMI">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_SelfOocytesMI" class="form-group ivf_oocytedenudation_SelfOocytesMI">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_SelfOocytesMI" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMI" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMI" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->SelfOocytesMI->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->SelfOocytesMI->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->SelfOocytesMI->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_SelfOocytesMI" class="form-group ivf_oocytedenudation_SelfOocytesMI">
<span<?php echo $ivf_oocytedenudation_grid->SelfOocytesMI->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_oocytedenudation_grid->SelfOocytesMI->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfOocytesMI" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMI" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMI" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->SelfOocytesMI->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfOocytesMI" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMI" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMI" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->SelfOocytesMI->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_oocytedenudation_grid->SelfOocytesMII->Visible) { // SelfOocytesMII ?>
		<td data-name="SelfOocytesMII">
<?php if (!$ivf_oocytedenudation->isConfirm()) { ?>
<span id="el$rowindex$_ivf_oocytedenudation_SelfOocytesMII" class="form-group ivf_oocytedenudation_SelfOocytesMII">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_SelfOocytesMII" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMII" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMII" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_grid->SelfOocytesMII->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_grid->SelfOocytesMII->EditValue ?>"<?php echo $ivf_oocytedenudation_grid->SelfOocytesMII->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_oocytedenudation_SelfOocytesMII" class="form-group ivf_oocytedenudation_SelfOocytesMII">
<span<?php echo $ivf_oocytedenudation_grid->SelfOocytesMII->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_oocytedenudation_grid->SelfOocytesMII->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfOocytesMII" name="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMII" id="x<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMII" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->SelfOocytesMII->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_SelfOocytesMII" name="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMII" id="o<?php echo $ivf_oocytedenudation_grid->RowIndex ?>_SelfOocytesMII" value="<?php echo HtmlEncode($ivf_oocytedenudation_grid->SelfOocytesMII->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_oocytedenudation_grid->ListOptions->render("body", "right", $ivf_oocytedenudation_grid->RowIndex);
?>
<script>
loadjs.ready(["fivf_oocytedenudationgrid", "load"], function() {
	fivf_oocytedenudationgrid.updateLists(<?php echo $ivf_oocytedenudation_grid->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
</table><!-- /.ew-table -->
</div><!-- /.ew-grid-middle-panel -->
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
</div><!-- /.ew-list-form -->
<?php

// Close recordset
if ($ivf_oocytedenudation_grid->Recordset)
	$ivf_oocytedenudation_grid->Recordset->Close();
?>
<?php if ($ivf_oocytedenudation_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $ivf_oocytedenudation_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($ivf_oocytedenudation_grid->TotalRecords == 0 && !$ivf_oocytedenudation->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $ivf_oocytedenudation_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php if (!$ivf_oocytedenudation_grid->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$ivf_oocytedenudation->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_ivf_oocytedenudation",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php
$ivf_oocytedenudation_grid->terminate();
?>