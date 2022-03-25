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
$ivf_oocytedenudation_add = new ivf_oocytedenudation_add();

// Run the page
$ivf_oocytedenudation_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_oocytedenudation_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fivf_oocytedenudationadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fivf_oocytedenudationadd = currentForm = new ew.Form("fivf_oocytedenudationadd", "add");

	// Validate form
	fivf_oocytedenudationadd.validate = function() {
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
			<?php if ($ivf_oocytedenudation_add->RIDNo->Required) { ?>
				elm = this.getElements("x" + infix + "_RIDNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_add->RIDNo->caption(), $ivf_oocytedenudation_add->RIDNo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_RIDNo");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_oocytedenudation_add->RIDNo->errorMessage()) ?>");
			<?php if ($ivf_oocytedenudation_add->Name->Required) { ?>
				elm = this.getElements("x" + infix + "_Name");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_add->Name->caption(), $ivf_oocytedenudation_add->Name->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_add->ResultDate->Required) { ?>
				elm = this.getElements("x" + infix + "_ResultDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_add->ResultDate->caption(), $ivf_oocytedenudation_add->ResultDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ResultDate");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_oocytedenudation_add->ResultDate->errorMessage()) ?>");
			<?php if ($ivf_oocytedenudation_add->Surgeon->Required) { ?>
				elm = this.getElements("x" + infix + "_Surgeon");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_add->Surgeon->caption(), $ivf_oocytedenudation_add->Surgeon->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_add->AsstSurgeon->Required) { ?>
				elm = this.getElements("x" + infix + "_AsstSurgeon");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_add->AsstSurgeon->caption(), $ivf_oocytedenudation_add->AsstSurgeon->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_add->Anaesthetist->Required) { ?>
				elm = this.getElements("x" + infix + "_Anaesthetist");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_add->Anaesthetist->caption(), $ivf_oocytedenudation_add->Anaesthetist->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_add->AnaestheiaType->Required) { ?>
				elm = this.getElements("x" + infix + "_AnaestheiaType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_add->AnaestheiaType->caption(), $ivf_oocytedenudation_add->AnaestheiaType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_add->PrimaryEmbryologist->Required) { ?>
				elm = this.getElements("x" + infix + "_PrimaryEmbryologist");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_add->PrimaryEmbryologist->caption(), $ivf_oocytedenudation_add->PrimaryEmbryologist->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_add->SecondaryEmbryologist->Required) { ?>
				elm = this.getElements("x" + infix + "_SecondaryEmbryologist");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_add->SecondaryEmbryologist->caption(), $ivf_oocytedenudation_add->SecondaryEmbryologist->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_add->OPUNotes->Required) { ?>
				elm = this.getElements("x" + infix + "_OPUNotes");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_add->OPUNotes->caption(), $ivf_oocytedenudation_add->OPUNotes->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_add->NoOfFolliclesRight->Required) { ?>
				elm = this.getElements("x" + infix + "_NoOfFolliclesRight");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_add->NoOfFolliclesRight->caption(), $ivf_oocytedenudation_add->NoOfFolliclesRight->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_add->NoOfFolliclesLeft->Required) { ?>
				elm = this.getElements("x" + infix + "_NoOfFolliclesLeft");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_add->NoOfFolliclesLeft->caption(), $ivf_oocytedenudation_add->NoOfFolliclesLeft->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_add->NoOfOocytes->Required) { ?>
				elm = this.getElements("x" + infix + "_NoOfOocytes");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_add->NoOfOocytes->caption(), $ivf_oocytedenudation_add->NoOfOocytes->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_add->RecordOocyteDenudation->Required) { ?>
				elm = this.getElements("x" + infix + "_RecordOocyteDenudation");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_add->RecordOocyteDenudation->caption(), $ivf_oocytedenudation_add->RecordOocyteDenudation->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_add->DateOfDenudation->Required) { ?>
				elm = this.getElements("x" + infix + "_DateOfDenudation");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_add->DateOfDenudation->caption(), $ivf_oocytedenudation_add->DateOfDenudation->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DateOfDenudation");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_oocytedenudation_add->DateOfDenudation->errorMessage()) ?>");
			<?php if ($ivf_oocytedenudation_add->DenudationDoneBy->Required) { ?>
				elm = this.getElements("x" + infix + "_DenudationDoneBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_add->DenudationDoneBy->caption(), $ivf_oocytedenudation_add->DenudationDoneBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_add->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_add->status->caption(), $ivf_oocytedenudation_add->status->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_oocytedenudation_add->status->errorMessage()) ?>");
			<?php if ($ivf_oocytedenudation_add->createdby->Required) { ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_add->createdby->caption(), $ivf_oocytedenudation_add->createdby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_add->createddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_add->createddatetime->caption(), $ivf_oocytedenudation_add->createddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_add->modifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_add->modifiedby->caption(), $ivf_oocytedenudation_add->modifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_add->modifieddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_add->modifieddatetime->caption(), $ivf_oocytedenudation_add->modifieddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_add->TidNo->Required) { ?>
				elm = this.getElements("x" + infix + "_TidNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_add->TidNo->caption(), $ivf_oocytedenudation_add->TidNo->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TidNo");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_oocytedenudation_add->TidNo->errorMessage()) ?>");
			<?php if ($ivf_oocytedenudation_add->ExpFollicles->Required) { ?>
				elm = this.getElements("x" + infix + "_ExpFollicles");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_add->ExpFollicles->caption(), $ivf_oocytedenudation_add->ExpFollicles->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_add->SecondaryDenudationDoneBy->Required) { ?>
				elm = this.getElements("x" + infix + "_SecondaryDenudationDoneBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_add->SecondaryDenudationDoneBy->caption(), $ivf_oocytedenudation_add->SecondaryDenudationDoneBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_add->patient2->Required) { ?>
				elm = this.getElements("x" + infix + "_patient2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_add->patient2->caption(), $ivf_oocytedenudation_add->patient2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_add->OocytesDonate1->Required) { ?>
				elm = this.getElements("x" + infix + "_OocytesDonate1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_add->OocytesDonate1->caption(), $ivf_oocytedenudation_add->OocytesDonate1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_add->OocytesDonate2->Required) { ?>
				elm = this.getElements("x" + infix + "_OocytesDonate2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_add->OocytesDonate2->caption(), $ivf_oocytedenudation_add->OocytesDonate2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_add->ETDonate->Required) { ?>
				elm = this.getElements("x" + infix + "_ETDonate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_add->ETDonate->caption(), $ivf_oocytedenudation_add->ETDonate->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_add->OocyteOrgin->Required) { ?>
				elm = this.getElements("x" + infix + "_OocyteOrgin");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_add->OocyteOrgin->caption(), $ivf_oocytedenudation_add->OocyteOrgin->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_add->patient1->Required) { ?>
				elm = this.getElements("x" + infix + "_patient1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_add->patient1->caption(), $ivf_oocytedenudation_add->patient1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_add->OocyteType->Required) { ?>
				elm = this.getElements("x" + infix + "_OocyteType[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_add->OocyteType->caption(), $ivf_oocytedenudation_add->OocyteType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_add->MIOocytesDonate1->Required) { ?>
				elm = this.getElements("x" + infix + "_MIOocytesDonate1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_add->MIOocytesDonate1->caption(), $ivf_oocytedenudation_add->MIOocytesDonate1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_add->MIOocytesDonate2->Required) { ?>
				elm = this.getElements("x" + infix + "_MIOocytesDonate2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_add->MIOocytesDonate2->caption(), $ivf_oocytedenudation_add->MIOocytesDonate2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_add->SelfMI->Required) { ?>
				elm = this.getElements("x" + infix + "_SelfMI");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_add->SelfMI->caption(), $ivf_oocytedenudation_add->SelfMI->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_add->SelfMII->Required) { ?>
				elm = this.getElements("x" + infix + "_SelfMII");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_add->SelfMII->caption(), $ivf_oocytedenudation_add->SelfMII->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_add->patient3->Required) { ?>
				elm = this.getElements("x" + infix + "_patient3");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_add->patient3->caption(), $ivf_oocytedenudation_add->patient3->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_add->patient4->Required) { ?>
				elm = this.getElements("x" + infix + "_patient4");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_add->patient4->caption(), $ivf_oocytedenudation_add->patient4->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_add->OocytesDonate3->Required) { ?>
				elm = this.getElements("x" + infix + "_OocytesDonate3");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_add->OocytesDonate3->caption(), $ivf_oocytedenudation_add->OocytesDonate3->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_add->OocytesDonate4->Required) { ?>
				elm = this.getElements("x" + infix + "_OocytesDonate4");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_add->OocytesDonate4->caption(), $ivf_oocytedenudation_add->OocytesDonate4->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_add->MIOocytesDonate3->Required) { ?>
				elm = this.getElements("x" + infix + "_MIOocytesDonate3");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_add->MIOocytesDonate3->caption(), $ivf_oocytedenudation_add->MIOocytesDonate3->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_add->MIOocytesDonate4->Required) { ?>
				elm = this.getElements("x" + infix + "_MIOocytesDonate4");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_add->MIOocytesDonate4->caption(), $ivf_oocytedenudation_add->MIOocytesDonate4->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_add->SelfOocytesMI->Required) { ?>
				elm = this.getElements("x" + infix + "_SelfOocytesMI");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_add->SelfOocytesMI->caption(), $ivf_oocytedenudation_add->SelfOocytesMI->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_oocytedenudation_add->SelfOocytesMII->Required) { ?>
				elm = this.getElements("x" + infix + "_SelfOocytesMII");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_oocytedenudation_add->SelfOocytesMII->caption(), $ivf_oocytedenudation_add->SelfOocytesMII->RequiredErrorMessage)) ?>");
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
	fivf_oocytedenudationadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fivf_oocytedenudationadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fivf_oocytedenudationadd.lists["x_patient2"] = <?php echo $ivf_oocytedenudation_add->patient2->Lookup->toClientList($ivf_oocytedenudation_add) ?>;
	fivf_oocytedenudationadd.lists["x_patient2"].options = <?php echo JsonEncode($ivf_oocytedenudation_add->patient2->lookupOptions()) ?>;
	fivf_oocytedenudationadd.lists["x_OocyteOrgin"] = <?php echo $ivf_oocytedenudation_add->OocyteOrgin->Lookup->toClientList($ivf_oocytedenudation_add) ?>;
	fivf_oocytedenudationadd.lists["x_OocyteOrgin"].options = <?php echo JsonEncode($ivf_oocytedenudation_add->OocyteOrgin->options(FALSE, TRUE)) ?>;
	fivf_oocytedenudationadd.lists["x_patient1"] = <?php echo $ivf_oocytedenudation_add->patient1->Lookup->toClientList($ivf_oocytedenudation_add) ?>;
	fivf_oocytedenudationadd.lists["x_patient1"].options = <?php echo JsonEncode($ivf_oocytedenudation_add->patient1->lookupOptions()) ?>;
	fivf_oocytedenudationadd.lists["x_OocyteType[]"] = <?php echo $ivf_oocytedenudation_add->OocyteType->Lookup->toClientList($ivf_oocytedenudation_add) ?>;
	fivf_oocytedenudationadd.lists["x_OocyteType[]"].options = <?php echo JsonEncode($ivf_oocytedenudation_add->OocyteType->options(FALSE, TRUE)) ?>;
	fivf_oocytedenudationadd.lists["x_patient3"] = <?php echo $ivf_oocytedenudation_add->patient3->Lookup->toClientList($ivf_oocytedenudation_add) ?>;
	fivf_oocytedenudationadd.lists["x_patient3"].options = <?php echo JsonEncode($ivf_oocytedenudation_add->patient3->lookupOptions()) ?>;
	fivf_oocytedenudationadd.lists["x_patient4"] = <?php echo $ivf_oocytedenudation_add->patient4->Lookup->toClientList($ivf_oocytedenudation_add) ?>;
	fivf_oocytedenudationadd.lists["x_patient4"].options = <?php echo JsonEncode($ivf_oocytedenudation_add->patient4->lookupOptions()) ?>;
	loadjs.done("fivf_oocytedenudationadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $ivf_oocytedenudation_add->showPageHeader(); ?>
<?php
$ivf_oocytedenudation_add->showMessage();
?>
<form name="fivf_oocytedenudationadd" id="fivf_oocytedenudationadd" class="<?php echo $ivf_oocytedenudation_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_oocytedenudation">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_oocytedenudation_add->IsModal ?>">
<?php if ($ivf_oocytedenudation->getCurrentMasterTable() == "view_ivf_treatment") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="view_ivf_treatment">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($ivf_oocytedenudation_add->TidNo->getSessionValue()) ?>">
<input type="hidden" name="fk_RIDNO" value="<?php echo HtmlEncode($ivf_oocytedenudation_add->RIDNo->getSessionValue()) ?>">
<input type="hidden" name="fk_Name" value="<?php echo HtmlEncode($ivf_oocytedenudation_add->Name->getSessionValue()) ?>">
<?php } ?>
<div class="ew-add-div d-none"><!-- page* -->
<?php if ($ivf_oocytedenudation_add->RIDNo->Visible) { // RIDNo ?>
	<div id="r_RIDNo" class="form-group row">
		<label id="elh_ivf_oocytedenudation_RIDNo" for="x_RIDNo" class="<?php echo $ivf_oocytedenudation_add->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_RIDNo" type="text/html"><?php echo $ivf_oocytedenudation_add->RIDNo->caption() ?><?php echo $ivf_oocytedenudation_add->RIDNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_oocytedenudation_add->RightColumnClass ?>"><div <?php echo $ivf_oocytedenudation_add->RIDNo->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation_add->RIDNo->getSessionValue() != "") { ?>
<script id="tpx_ivf_oocytedenudation_RIDNo" type="text/html"><span id="el_ivf_oocytedenudation_RIDNo">
<span<?php echo $ivf_oocytedenudation_add->RIDNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_oocytedenudation_add->RIDNo->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" id="x_RIDNo" name="x_RIDNo" value="<?php echo HtmlEncode($ivf_oocytedenudation_add->RIDNo->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx_ivf_oocytedenudation_RIDNo" type="text/html"><span id="el_ivf_oocytedenudation_RIDNo">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_RIDNo" name="x_RIDNo" id="x_RIDNo" size="30" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_add->RIDNo->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_add->RIDNo->EditValue ?>"<?php echo $ivf_oocytedenudation_add->RIDNo->editAttributes() ?>>
</span></script>
<?php } ?>
<?php echo $ivf_oocytedenudation_add->RIDNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation_add->Name->Visible) { // Name ?>
	<div id="r_Name" class="form-group row">
		<label id="elh_ivf_oocytedenudation_Name" for="x_Name" class="<?php echo $ivf_oocytedenudation_add->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_Name" type="text/html"><?php echo $ivf_oocytedenudation_add->Name->caption() ?><?php echo $ivf_oocytedenudation_add->Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_oocytedenudation_add->RightColumnClass ?>"><div <?php echo $ivf_oocytedenudation_add->Name->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation_add->Name->getSessionValue() != "") { ?>
<script id="tpx_ivf_oocytedenudation_Name" type="text/html"><span id="el_ivf_oocytedenudation_Name">
<span<?php echo $ivf_oocytedenudation_add->Name->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_oocytedenudation_add->Name->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" id="x_Name" name="x_Name" value="<?php echo HtmlEncode($ivf_oocytedenudation_add->Name->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx_ivf_oocytedenudation_Name" type="text/html"><span id="el_ivf_oocytedenudation_Name">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_add->Name->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_add->Name->EditValue ?>"<?php echo $ivf_oocytedenudation_add->Name->editAttributes() ?>>
</span></script>
<?php } ?>
<?php echo $ivf_oocytedenudation_add->Name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation_add->ResultDate->Visible) { // ResultDate ?>
	<div id="r_ResultDate" class="form-group row">
		<label id="elh_ivf_oocytedenudation_ResultDate" for="x_ResultDate" class="<?php echo $ivf_oocytedenudation_add->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_ResultDate" type="text/html"><?php echo $ivf_oocytedenudation_add->ResultDate->caption() ?><?php echo $ivf_oocytedenudation_add->ResultDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_oocytedenudation_add->RightColumnClass ?>"><div <?php echo $ivf_oocytedenudation_add->ResultDate->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_ResultDate" type="text/html"><span id="el_ivf_oocytedenudation_ResultDate">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_ResultDate" data-format="11" name="x_ResultDate" id="x_ResultDate" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_add->ResultDate->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_add->ResultDate->EditValue ?>"<?php echo $ivf_oocytedenudation_add->ResultDate->editAttributes() ?>>
<?php if (!$ivf_oocytedenudation_add->ResultDate->ReadOnly && !$ivf_oocytedenudation_add->ResultDate->Disabled && !isset($ivf_oocytedenudation_add->ResultDate->EditAttrs["readonly"]) && !isset($ivf_oocytedenudation_add->ResultDate->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_oocytedenudationadd_js">
loadjs.ready(["fivf_oocytedenudationadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_oocytedenudationadd", "x_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php echo $ivf_oocytedenudation_add->ResultDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation_add->Surgeon->Visible) { // Surgeon ?>
	<div id="r_Surgeon" class="form-group row">
		<label id="elh_ivf_oocytedenudation_Surgeon" for="x_Surgeon" class="<?php echo $ivf_oocytedenudation_add->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_Surgeon" type="text/html"><?php echo $ivf_oocytedenudation_add->Surgeon->caption() ?><?php echo $ivf_oocytedenudation_add->Surgeon->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_oocytedenudation_add->RightColumnClass ?>"><div <?php echo $ivf_oocytedenudation_add->Surgeon->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_Surgeon" type="text/html"><span id="el_ivf_oocytedenudation_Surgeon">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_Surgeon" name="x_Surgeon" id="x_Surgeon" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_add->Surgeon->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_add->Surgeon->EditValue ?>"<?php echo $ivf_oocytedenudation_add->Surgeon->editAttributes() ?>>
</span></script>
<?php echo $ivf_oocytedenudation_add->Surgeon->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation_add->AsstSurgeon->Visible) { // AsstSurgeon ?>
	<div id="r_AsstSurgeon" class="form-group row">
		<label id="elh_ivf_oocytedenudation_AsstSurgeon" for="x_AsstSurgeon" class="<?php echo $ivf_oocytedenudation_add->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_AsstSurgeon" type="text/html"><?php echo $ivf_oocytedenudation_add->AsstSurgeon->caption() ?><?php echo $ivf_oocytedenudation_add->AsstSurgeon->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_oocytedenudation_add->RightColumnClass ?>"><div <?php echo $ivf_oocytedenudation_add->AsstSurgeon->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_AsstSurgeon" type="text/html"><span id="el_ivf_oocytedenudation_AsstSurgeon">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_AsstSurgeon" name="x_AsstSurgeon" id="x_AsstSurgeon" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_add->AsstSurgeon->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_add->AsstSurgeon->EditValue ?>"<?php echo $ivf_oocytedenudation_add->AsstSurgeon->editAttributes() ?>>
</span></script>
<?php echo $ivf_oocytedenudation_add->AsstSurgeon->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation_add->Anaesthetist->Visible) { // Anaesthetist ?>
	<div id="r_Anaesthetist" class="form-group row">
		<label id="elh_ivf_oocytedenudation_Anaesthetist" for="x_Anaesthetist" class="<?php echo $ivf_oocytedenudation_add->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_Anaesthetist" type="text/html"><?php echo $ivf_oocytedenudation_add->Anaesthetist->caption() ?><?php echo $ivf_oocytedenudation_add->Anaesthetist->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_oocytedenudation_add->RightColumnClass ?>"><div <?php echo $ivf_oocytedenudation_add->Anaesthetist->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_Anaesthetist" type="text/html"><span id="el_ivf_oocytedenudation_Anaesthetist">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_Anaesthetist" name="x_Anaesthetist" id="x_Anaesthetist" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_add->Anaesthetist->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_add->Anaesthetist->EditValue ?>"<?php echo $ivf_oocytedenudation_add->Anaesthetist->editAttributes() ?>>
</span></script>
<?php echo $ivf_oocytedenudation_add->Anaesthetist->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation_add->AnaestheiaType->Visible) { // AnaestheiaType ?>
	<div id="r_AnaestheiaType" class="form-group row">
		<label id="elh_ivf_oocytedenudation_AnaestheiaType" for="x_AnaestheiaType" class="<?php echo $ivf_oocytedenudation_add->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_AnaestheiaType" type="text/html"><?php echo $ivf_oocytedenudation_add->AnaestheiaType->caption() ?><?php echo $ivf_oocytedenudation_add->AnaestheiaType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_oocytedenudation_add->RightColumnClass ?>"><div <?php echo $ivf_oocytedenudation_add->AnaestheiaType->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_AnaestheiaType" type="text/html"><span id="el_ivf_oocytedenudation_AnaestheiaType">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_AnaestheiaType" name="x_AnaestheiaType" id="x_AnaestheiaType" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_add->AnaestheiaType->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_add->AnaestheiaType->EditValue ?>"<?php echo $ivf_oocytedenudation_add->AnaestheiaType->editAttributes() ?>>
</span></script>
<?php echo $ivf_oocytedenudation_add->AnaestheiaType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation_add->PrimaryEmbryologist->Visible) { // PrimaryEmbryologist ?>
	<div id="r_PrimaryEmbryologist" class="form-group row">
		<label id="elh_ivf_oocytedenudation_PrimaryEmbryologist" for="x_PrimaryEmbryologist" class="<?php echo $ivf_oocytedenudation_add->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_PrimaryEmbryologist" type="text/html"><?php echo $ivf_oocytedenudation_add->PrimaryEmbryologist->caption() ?><?php echo $ivf_oocytedenudation_add->PrimaryEmbryologist->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_oocytedenudation_add->RightColumnClass ?>"><div <?php echo $ivf_oocytedenudation_add->PrimaryEmbryologist->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_PrimaryEmbryologist" type="text/html"><span id="el_ivf_oocytedenudation_PrimaryEmbryologist">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_PrimaryEmbryologist" name="x_PrimaryEmbryologist" id="x_PrimaryEmbryologist" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_add->PrimaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_add->PrimaryEmbryologist->EditValue ?>"<?php echo $ivf_oocytedenudation_add->PrimaryEmbryologist->editAttributes() ?>>
</span></script>
<?php echo $ivf_oocytedenudation_add->PrimaryEmbryologist->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation_add->SecondaryEmbryologist->Visible) { // SecondaryEmbryologist ?>
	<div id="r_SecondaryEmbryologist" class="form-group row">
		<label id="elh_ivf_oocytedenudation_SecondaryEmbryologist" for="x_SecondaryEmbryologist" class="<?php echo $ivf_oocytedenudation_add->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_SecondaryEmbryologist" type="text/html"><?php echo $ivf_oocytedenudation_add->SecondaryEmbryologist->caption() ?><?php echo $ivf_oocytedenudation_add->SecondaryEmbryologist->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_oocytedenudation_add->RightColumnClass ?>"><div <?php echo $ivf_oocytedenudation_add->SecondaryEmbryologist->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_SecondaryEmbryologist" type="text/html"><span id="el_ivf_oocytedenudation_SecondaryEmbryologist">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_SecondaryEmbryologist" name="x_SecondaryEmbryologist" id="x_SecondaryEmbryologist" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_add->SecondaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_add->SecondaryEmbryologist->EditValue ?>"<?php echo $ivf_oocytedenudation_add->SecondaryEmbryologist->editAttributes() ?>>
</span></script>
<?php echo $ivf_oocytedenudation_add->SecondaryEmbryologist->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation_add->OPUNotes->Visible) { // OPUNotes ?>
	<div id="r_OPUNotes" class="form-group row">
		<label id="elh_ivf_oocytedenudation_OPUNotes" for="x_OPUNotes" class="<?php echo $ivf_oocytedenudation_add->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_OPUNotes" type="text/html"><?php echo $ivf_oocytedenudation_add->OPUNotes->caption() ?><?php echo $ivf_oocytedenudation_add->OPUNotes->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_oocytedenudation_add->RightColumnClass ?>"><div <?php echo $ivf_oocytedenudation_add->OPUNotes->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_OPUNotes" type="text/html"><span id="el_ivf_oocytedenudation_OPUNotes">
<textarea data-table="ivf_oocytedenudation" data-field="x_OPUNotes" name="x_OPUNotes" id="x_OPUNotes" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_add->OPUNotes->getPlaceHolder()) ?>"<?php echo $ivf_oocytedenudation_add->OPUNotes->editAttributes() ?>><?php echo $ivf_oocytedenudation_add->OPUNotes->EditValue ?></textarea>
</span></script>
<?php echo $ivf_oocytedenudation_add->OPUNotes->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation_add->NoOfFolliclesRight->Visible) { // NoOfFolliclesRight ?>
	<div id="r_NoOfFolliclesRight" class="form-group row">
		<label id="elh_ivf_oocytedenudation_NoOfFolliclesRight" for="x_NoOfFolliclesRight" class="<?php echo $ivf_oocytedenudation_add->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_NoOfFolliclesRight" type="text/html"><?php echo $ivf_oocytedenudation_add->NoOfFolliclesRight->caption() ?><?php echo $ivf_oocytedenudation_add->NoOfFolliclesRight->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_oocytedenudation_add->RightColumnClass ?>"><div <?php echo $ivf_oocytedenudation_add->NoOfFolliclesRight->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_NoOfFolliclesRight" type="text/html"><span id="el_ivf_oocytedenudation_NoOfFolliclesRight">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_NoOfFolliclesRight" name="x_NoOfFolliclesRight" id="x_NoOfFolliclesRight" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_add->NoOfFolliclesRight->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_add->NoOfFolliclesRight->EditValue ?>"<?php echo $ivf_oocytedenudation_add->NoOfFolliclesRight->editAttributes() ?>>
</span></script>
<?php echo $ivf_oocytedenudation_add->NoOfFolliclesRight->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation_add->NoOfFolliclesLeft->Visible) { // NoOfFolliclesLeft ?>
	<div id="r_NoOfFolliclesLeft" class="form-group row">
		<label id="elh_ivf_oocytedenudation_NoOfFolliclesLeft" for="x_NoOfFolliclesLeft" class="<?php echo $ivf_oocytedenudation_add->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_NoOfFolliclesLeft" type="text/html"><?php echo $ivf_oocytedenudation_add->NoOfFolliclesLeft->caption() ?><?php echo $ivf_oocytedenudation_add->NoOfFolliclesLeft->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_oocytedenudation_add->RightColumnClass ?>"><div <?php echo $ivf_oocytedenudation_add->NoOfFolliclesLeft->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_NoOfFolliclesLeft" type="text/html"><span id="el_ivf_oocytedenudation_NoOfFolliclesLeft">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_NoOfFolliclesLeft" name="x_NoOfFolliclesLeft" id="x_NoOfFolliclesLeft" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_add->NoOfFolliclesLeft->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_add->NoOfFolliclesLeft->EditValue ?>"<?php echo $ivf_oocytedenudation_add->NoOfFolliclesLeft->editAttributes() ?>>
</span></script>
<?php echo $ivf_oocytedenudation_add->NoOfFolliclesLeft->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation_add->NoOfOocytes->Visible) { // NoOfOocytes ?>
	<div id="r_NoOfOocytes" class="form-group row">
		<label id="elh_ivf_oocytedenudation_NoOfOocytes" for="x_NoOfOocytes" class="<?php echo $ivf_oocytedenudation_add->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_NoOfOocytes" type="text/html"><?php echo $ivf_oocytedenudation_add->NoOfOocytes->caption() ?><?php echo $ivf_oocytedenudation_add->NoOfOocytes->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_oocytedenudation_add->RightColumnClass ?>"><div <?php echo $ivf_oocytedenudation_add->NoOfOocytes->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_NoOfOocytes" type="text/html"><span id="el_ivf_oocytedenudation_NoOfOocytes">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_NoOfOocytes" name="x_NoOfOocytes" id="x_NoOfOocytes" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_add->NoOfOocytes->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_add->NoOfOocytes->EditValue ?>"<?php echo $ivf_oocytedenudation_add->NoOfOocytes->editAttributes() ?>>
</span></script>
<?php echo $ivf_oocytedenudation_add->NoOfOocytes->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation_add->RecordOocyteDenudation->Visible) { // RecordOocyteDenudation ?>
	<div id="r_RecordOocyteDenudation" class="form-group row">
		<label id="elh_ivf_oocytedenudation_RecordOocyteDenudation" for="x_RecordOocyteDenudation" class="<?php echo $ivf_oocytedenudation_add->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_RecordOocyteDenudation" type="text/html"><?php echo $ivf_oocytedenudation_add->RecordOocyteDenudation->caption() ?><?php echo $ivf_oocytedenudation_add->RecordOocyteDenudation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_oocytedenudation_add->RightColumnClass ?>"><div <?php echo $ivf_oocytedenudation_add->RecordOocyteDenudation->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_RecordOocyteDenudation" type="text/html"><span id="el_ivf_oocytedenudation_RecordOocyteDenudation">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_RecordOocyteDenudation" name="x_RecordOocyteDenudation" id="x_RecordOocyteDenudation" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_add->RecordOocyteDenudation->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_add->RecordOocyteDenudation->EditValue ?>"<?php echo $ivf_oocytedenudation_add->RecordOocyteDenudation->editAttributes() ?>>
</span></script>
<?php echo $ivf_oocytedenudation_add->RecordOocyteDenudation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation_add->DateOfDenudation->Visible) { // DateOfDenudation ?>
	<div id="r_DateOfDenudation" class="form-group row">
		<label id="elh_ivf_oocytedenudation_DateOfDenudation" for="x_DateOfDenudation" class="<?php echo $ivf_oocytedenudation_add->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_DateOfDenudation" type="text/html"><?php echo $ivf_oocytedenudation_add->DateOfDenudation->caption() ?><?php echo $ivf_oocytedenudation_add->DateOfDenudation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_oocytedenudation_add->RightColumnClass ?>"><div <?php echo $ivf_oocytedenudation_add->DateOfDenudation->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_DateOfDenudation" type="text/html"><span id="el_ivf_oocytedenudation_DateOfDenudation">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_DateOfDenudation" data-format="11" name="x_DateOfDenudation" id="x_DateOfDenudation" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_add->DateOfDenudation->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_add->DateOfDenudation->EditValue ?>"<?php echo $ivf_oocytedenudation_add->DateOfDenudation->editAttributes() ?>>
<?php if (!$ivf_oocytedenudation_add->DateOfDenudation->ReadOnly && !$ivf_oocytedenudation_add->DateOfDenudation->Disabled && !isset($ivf_oocytedenudation_add->DateOfDenudation->EditAttrs["readonly"]) && !isset($ivf_oocytedenudation_add->DateOfDenudation->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="ivf_oocytedenudationadd_js">
loadjs.ready(["fivf_oocytedenudationadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_oocytedenudationadd", "x_DateOfDenudation", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php echo $ivf_oocytedenudation_add->DateOfDenudation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation_add->DenudationDoneBy->Visible) { // DenudationDoneBy ?>
	<div id="r_DenudationDoneBy" class="form-group row">
		<label id="elh_ivf_oocytedenudation_DenudationDoneBy" for="x_DenudationDoneBy" class="<?php echo $ivf_oocytedenudation_add->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_DenudationDoneBy" type="text/html"><?php echo $ivf_oocytedenudation_add->DenudationDoneBy->caption() ?><?php echo $ivf_oocytedenudation_add->DenudationDoneBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_oocytedenudation_add->RightColumnClass ?>"><div <?php echo $ivf_oocytedenudation_add->DenudationDoneBy->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_DenudationDoneBy" type="text/html"><span id="el_ivf_oocytedenudation_DenudationDoneBy">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_DenudationDoneBy" name="x_DenudationDoneBy" id="x_DenudationDoneBy" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_add->DenudationDoneBy->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_add->DenudationDoneBy->EditValue ?>"<?php echo $ivf_oocytedenudation_add->DenudationDoneBy->editAttributes() ?>>
</span></script>
<?php echo $ivf_oocytedenudation_add->DenudationDoneBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation_add->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_ivf_oocytedenudation_status" for="x_status" class="<?php echo $ivf_oocytedenudation_add->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_status" type="text/html"><?php echo $ivf_oocytedenudation_add->status->caption() ?><?php echo $ivf_oocytedenudation_add->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_oocytedenudation_add->RightColumnClass ?>"><div <?php echo $ivf_oocytedenudation_add->status->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_status" type="text/html"><span id="el_ivf_oocytedenudation_status">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_status" name="x_status" id="x_status" size="30" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_add->status->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_add->status->EditValue ?>"<?php echo $ivf_oocytedenudation_add->status->editAttributes() ?>>
</span></script>
<?php echo $ivf_oocytedenudation_add->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation_add->TidNo->Visible) { // TidNo ?>
	<div id="r_TidNo" class="form-group row">
		<label id="elh_ivf_oocytedenudation_TidNo" for="x_TidNo" class="<?php echo $ivf_oocytedenudation_add->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_TidNo" type="text/html"><?php echo $ivf_oocytedenudation_add->TidNo->caption() ?><?php echo $ivf_oocytedenudation_add->TidNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_oocytedenudation_add->RightColumnClass ?>"><div <?php echo $ivf_oocytedenudation_add->TidNo->cellAttributes() ?>>
<?php if ($ivf_oocytedenudation_add->TidNo->getSessionValue() != "") { ?>
<script id="tpx_ivf_oocytedenudation_TidNo" type="text/html"><span id="el_ivf_oocytedenudation_TidNo">
<span<?php echo $ivf_oocytedenudation_add->TidNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_oocytedenudation_add->TidNo->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" id="x_TidNo" name="x_TidNo" value="<?php echo HtmlEncode($ivf_oocytedenudation_add->TidNo->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx_ivf_oocytedenudation_TidNo" type="text/html"><span id="el_ivf_oocytedenudation_TidNo">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_add->TidNo->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_add->TidNo->EditValue ?>"<?php echo $ivf_oocytedenudation_add->TidNo->editAttributes() ?>>
</span></script>
<?php } ?>
<?php echo $ivf_oocytedenudation_add->TidNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation_add->ExpFollicles->Visible) { // ExpFollicles ?>
	<div id="r_ExpFollicles" class="form-group row">
		<label id="elh_ivf_oocytedenudation_ExpFollicles" for="x_ExpFollicles" class="<?php echo $ivf_oocytedenudation_add->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_ExpFollicles" type="text/html"><?php echo $ivf_oocytedenudation_add->ExpFollicles->caption() ?><?php echo $ivf_oocytedenudation_add->ExpFollicles->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_oocytedenudation_add->RightColumnClass ?>"><div <?php echo $ivf_oocytedenudation_add->ExpFollicles->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_ExpFollicles" type="text/html"><span id="el_ivf_oocytedenudation_ExpFollicles">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_ExpFollicles" name="x_ExpFollicles" id="x_ExpFollicles" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_add->ExpFollicles->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_add->ExpFollicles->EditValue ?>"<?php echo $ivf_oocytedenudation_add->ExpFollicles->editAttributes() ?>>
</span></script>
<?php echo $ivf_oocytedenudation_add->ExpFollicles->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation_add->SecondaryDenudationDoneBy->Visible) { // SecondaryDenudationDoneBy ?>
	<div id="r_SecondaryDenudationDoneBy" class="form-group row">
		<label id="elh_ivf_oocytedenudation_SecondaryDenudationDoneBy" for="x_SecondaryDenudationDoneBy" class="<?php echo $ivf_oocytedenudation_add->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_SecondaryDenudationDoneBy" type="text/html"><?php echo $ivf_oocytedenudation_add->SecondaryDenudationDoneBy->caption() ?><?php echo $ivf_oocytedenudation_add->SecondaryDenudationDoneBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_oocytedenudation_add->RightColumnClass ?>"><div <?php echo $ivf_oocytedenudation_add->SecondaryDenudationDoneBy->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_SecondaryDenudationDoneBy" type="text/html"><span id="el_ivf_oocytedenudation_SecondaryDenudationDoneBy">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_SecondaryDenudationDoneBy" name="x_SecondaryDenudationDoneBy" id="x_SecondaryDenudationDoneBy" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_add->SecondaryDenudationDoneBy->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_add->SecondaryDenudationDoneBy->EditValue ?>"<?php echo $ivf_oocytedenudation_add->SecondaryDenudationDoneBy->editAttributes() ?>>
</span></script>
<?php echo $ivf_oocytedenudation_add->SecondaryDenudationDoneBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation_add->patient2->Visible) { // patient2 ?>
	<div id="r_patient2" class="form-group row">
		<label id="elh_ivf_oocytedenudation_patient2" for="x_patient2" class="<?php echo $ivf_oocytedenudation_add->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_patient2" type="text/html"><?php echo $ivf_oocytedenudation_add->patient2->caption() ?><?php echo $ivf_oocytedenudation_add->patient2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_oocytedenudation_add->RightColumnClass ?>"><div <?php echo $ivf_oocytedenudation_add->patient2->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_patient2" type="text/html"><span id="el_ivf_oocytedenudation_patient2">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_patient2"><?php echo EmptyValue(strval($ivf_oocytedenudation_add->patient2->ViewValue)) ? $Language->phrase("PleaseSelect") : $ivf_oocytedenudation_add->patient2->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($ivf_oocytedenudation_add->patient2->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($ivf_oocytedenudation_add->patient2->ReadOnly || $ivf_oocytedenudation_add->patient2->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_patient2',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $ivf_oocytedenudation_add->patient2->Lookup->getParamTag($ivf_oocytedenudation_add, "p_x_patient2") ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient2" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $ivf_oocytedenudation_add->patient2->displayValueSeparatorAttribute() ?>" name="x_patient2" id="x_patient2" value="<?php echo $ivf_oocytedenudation_add->patient2->CurrentValue ?>"<?php echo $ivf_oocytedenudation_add->patient2->editAttributes() ?>>
</span></script>
<?php echo $ivf_oocytedenudation_add->patient2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation_add->OocytesDonate1->Visible) { // OocytesDonate1 ?>
	<div id="r_OocytesDonate1" class="form-group row">
		<label id="elh_ivf_oocytedenudation_OocytesDonate1" for="x_OocytesDonate1" class="<?php echo $ivf_oocytedenudation_add->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_OocytesDonate1" type="text/html"><?php echo $ivf_oocytedenudation_add->OocytesDonate1->caption() ?><?php echo $ivf_oocytedenudation_add->OocytesDonate1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_oocytedenudation_add->RightColumnClass ?>"><div <?php echo $ivf_oocytedenudation_add->OocytesDonate1->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_OocytesDonate1" type="text/html"><span id="el_ivf_oocytedenudation_OocytesDonate1">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_OocytesDonate1" name="x_OocytesDonate1" id="x_OocytesDonate1" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_add->OocytesDonate1->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_add->OocytesDonate1->EditValue ?>"<?php echo $ivf_oocytedenudation_add->OocytesDonate1->editAttributes() ?>>
</span></script>
<?php echo $ivf_oocytedenudation_add->OocytesDonate1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation_add->OocytesDonate2->Visible) { // OocytesDonate2 ?>
	<div id="r_OocytesDonate2" class="form-group row">
		<label id="elh_ivf_oocytedenudation_OocytesDonate2" for="x_OocytesDonate2" class="<?php echo $ivf_oocytedenudation_add->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_OocytesDonate2" type="text/html"><?php echo $ivf_oocytedenudation_add->OocytesDonate2->caption() ?><?php echo $ivf_oocytedenudation_add->OocytesDonate2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_oocytedenudation_add->RightColumnClass ?>"><div <?php echo $ivf_oocytedenudation_add->OocytesDonate2->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_OocytesDonate2" type="text/html"><span id="el_ivf_oocytedenudation_OocytesDonate2">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_OocytesDonate2" name="x_OocytesDonate2" id="x_OocytesDonate2" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_add->OocytesDonate2->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_add->OocytesDonate2->EditValue ?>"<?php echo $ivf_oocytedenudation_add->OocytesDonate2->editAttributes() ?>>
</span></script>
<?php echo $ivf_oocytedenudation_add->OocytesDonate2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation_add->ETDonate->Visible) { // ETDonate ?>
	<div id="r_ETDonate" class="form-group row">
		<label id="elh_ivf_oocytedenudation_ETDonate" for="x_ETDonate" class="<?php echo $ivf_oocytedenudation_add->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_ETDonate" type="text/html"><?php echo $ivf_oocytedenudation_add->ETDonate->caption() ?><?php echo $ivf_oocytedenudation_add->ETDonate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_oocytedenudation_add->RightColumnClass ?>"><div <?php echo $ivf_oocytedenudation_add->ETDonate->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_ETDonate" type="text/html"><span id="el_ivf_oocytedenudation_ETDonate">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_ETDonate" name="x_ETDonate" id="x_ETDonate" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_add->ETDonate->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_add->ETDonate->EditValue ?>"<?php echo $ivf_oocytedenudation_add->ETDonate->editAttributes() ?>>
</span></script>
<?php echo $ivf_oocytedenudation_add->ETDonate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation_add->OocyteOrgin->Visible) { // OocyteOrgin ?>
	<div id="r_OocyteOrgin" class="form-group row">
		<label id="elh_ivf_oocytedenudation_OocyteOrgin" for="x_OocyteOrgin" class="<?php echo $ivf_oocytedenudation_add->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_OocyteOrgin" type="text/html"><?php echo $ivf_oocytedenudation_add->OocyteOrgin->caption() ?><?php echo $ivf_oocytedenudation_add->OocyteOrgin->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_oocytedenudation_add->RightColumnClass ?>"><div <?php echo $ivf_oocytedenudation_add->OocyteOrgin->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_OocyteOrgin" type="text/html"><span id="el_ivf_oocytedenudation_OocyteOrgin">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_oocytedenudation" data-field="x_OocyteOrgin" data-value-separator="<?php echo $ivf_oocytedenudation_add->OocyteOrgin->displayValueSeparatorAttribute() ?>" id="x_OocyteOrgin" name="x_OocyteOrgin"<?php echo $ivf_oocytedenudation_add->OocyteOrgin->editAttributes() ?>>
			<?php echo $ivf_oocytedenudation_add->OocyteOrgin->selectOptionListHtml("x_OocyteOrgin") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_oocytedenudation_add->OocyteOrgin->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation_add->patient1->Visible) { // patient1 ?>
	<div id="r_patient1" class="form-group row">
		<label id="elh_ivf_oocytedenudation_patient1" for="x_patient1" class="<?php echo $ivf_oocytedenudation_add->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_patient1" type="text/html"><?php echo $ivf_oocytedenudation_add->patient1->caption() ?><?php echo $ivf_oocytedenudation_add->patient1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_oocytedenudation_add->RightColumnClass ?>"><div <?php echo $ivf_oocytedenudation_add->patient1->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_patient1" type="text/html"><span id="el_ivf_oocytedenudation_patient1">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_patient1"><?php echo EmptyValue(strval($ivf_oocytedenudation_add->patient1->ViewValue)) ? $Language->phrase("PleaseSelect") : $ivf_oocytedenudation_add->patient1->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($ivf_oocytedenudation_add->patient1->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($ivf_oocytedenudation_add->patient1->ReadOnly || $ivf_oocytedenudation_add->patient1->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_patient1',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $ivf_oocytedenudation_add->patient1->Lookup->getParamTag($ivf_oocytedenudation_add, "p_x_patient1") ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient1" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $ivf_oocytedenudation_add->patient1->displayValueSeparatorAttribute() ?>" name="x_patient1" id="x_patient1" value="<?php echo $ivf_oocytedenudation_add->patient1->CurrentValue ?>"<?php echo $ivf_oocytedenudation_add->patient1->editAttributes() ?>>
</span></script>
<?php echo $ivf_oocytedenudation_add->patient1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation_add->OocyteType->Visible) { // OocyteType ?>
	<div id="r_OocyteType" class="form-group row">
		<label id="elh_ivf_oocytedenudation_OocyteType" class="<?php echo $ivf_oocytedenudation_add->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_OocyteType" type="text/html"><?php echo $ivf_oocytedenudation_add->OocyteType->caption() ?><?php echo $ivf_oocytedenudation_add->OocyteType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_oocytedenudation_add->RightColumnClass ?>"><div <?php echo $ivf_oocytedenudation_add->OocyteType->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_OocyteType" type="text/html"><span id="el_ivf_oocytedenudation_OocyteType">
<div id="tp_x_OocyteType" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="ivf_oocytedenudation" data-field="x_OocyteType" data-value-separator="<?php echo $ivf_oocytedenudation_add->OocyteType->displayValueSeparatorAttribute() ?>" name="x_OocyteType[]" id="x_OocyteType[]" value="{value}"<?php echo $ivf_oocytedenudation_add->OocyteType->editAttributes() ?>></div>
<div id="dsl_x_OocyteType" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_oocytedenudation_add->OocyteType->checkBoxListHtml(FALSE, "x_OocyteType[]") ?>
</div></div>
</span></script>
<?php echo $ivf_oocytedenudation_add->OocyteType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation_add->MIOocytesDonate1->Visible) { // MIOocytesDonate1 ?>
	<div id="r_MIOocytesDonate1" class="form-group row">
		<label id="elh_ivf_oocytedenudation_MIOocytesDonate1" for="x_MIOocytesDonate1" class="<?php echo $ivf_oocytedenudation_add->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_MIOocytesDonate1" type="text/html"><?php echo $ivf_oocytedenudation_add->MIOocytesDonate1->caption() ?><?php echo $ivf_oocytedenudation_add->MIOocytesDonate1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_oocytedenudation_add->RightColumnClass ?>"><div <?php echo $ivf_oocytedenudation_add->MIOocytesDonate1->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_MIOocytesDonate1" type="text/html"><span id="el_ivf_oocytedenudation_MIOocytesDonate1">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate1" name="x_MIOocytesDonate1" id="x_MIOocytesDonate1" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_add->MIOocytesDonate1->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_add->MIOocytesDonate1->EditValue ?>"<?php echo $ivf_oocytedenudation_add->MIOocytesDonate1->editAttributes() ?>>
</span></script>
<?php echo $ivf_oocytedenudation_add->MIOocytesDonate1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation_add->MIOocytesDonate2->Visible) { // MIOocytesDonate2 ?>
	<div id="r_MIOocytesDonate2" class="form-group row">
		<label id="elh_ivf_oocytedenudation_MIOocytesDonate2" for="x_MIOocytesDonate2" class="<?php echo $ivf_oocytedenudation_add->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_MIOocytesDonate2" type="text/html"><?php echo $ivf_oocytedenudation_add->MIOocytesDonate2->caption() ?><?php echo $ivf_oocytedenudation_add->MIOocytesDonate2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_oocytedenudation_add->RightColumnClass ?>"><div <?php echo $ivf_oocytedenudation_add->MIOocytesDonate2->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_MIOocytesDonate2" type="text/html"><span id="el_ivf_oocytedenudation_MIOocytesDonate2">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate2" name="x_MIOocytesDonate2" id="x_MIOocytesDonate2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_add->MIOocytesDonate2->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_add->MIOocytesDonate2->EditValue ?>"<?php echo $ivf_oocytedenudation_add->MIOocytesDonate2->editAttributes() ?>>
</span></script>
<?php echo $ivf_oocytedenudation_add->MIOocytesDonate2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation_add->SelfMI->Visible) { // SelfMI ?>
	<div id="r_SelfMI" class="form-group row">
		<label id="elh_ivf_oocytedenudation_SelfMI" for="x_SelfMI" class="<?php echo $ivf_oocytedenudation_add->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_SelfMI" type="text/html"><?php echo $ivf_oocytedenudation_add->SelfMI->caption() ?><?php echo $ivf_oocytedenudation_add->SelfMI->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_oocytedenudation_add->RightColumnClass ?>"><div <?php echo $ivf_oocytedenudation_add->SelfMI->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_SelfMI" type="text/html"><span id="el_ivf_oocytedenudation_SelfMI">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_SelfMI" name="x_SelfMI" id="x_SelfMI" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_add->SelfMI->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_add->SelfMI->EditValue ?>"<?php echo $ivf_oocytedenudation_add->SelfMI->editAttributes() ?>>
</span></script>
<?php echo $ivf_oocytedenudation_add->SelfMI->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation_add->SelfMII->Visible) { // SelfMII ?>
	<div id="r_SelfMII" class="form-group row">
		<label id="elh_ivf_oocytedenudation_SelfMII" for="x_SelfMII" class="<?php echo $ivf_oocytedenudation_add->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_SelfMII" type="text/html"><?php echo $ivf_oocytedenudation_add->SelfMII->caption() ?><?php echo $ivf_oocytedenudation_add->SelfMII->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_oocytedenudation_add->RightColumnClass ?>"><div <?php echo $ivf_oocytedenudation_add->SelfMII->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_SelfMII" type="text/html"><span id="el_ivf_oocytedenudation_SelfMII">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_SelfMII" name="x_SelfMII" id="x_SelfMII" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_add->SelfMII->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_add->SelfMII->EditValue ?>"<?php echo $ivf_oocytedenudation_add->SelfMII->editAttributes() ?>>
</span></script>
<?php echo $ivf_oocytedenudation_add->SelfMII->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation_add->patient3->Visible) { // patient3 ?>
	<div id="r_patient3" class="form-group row">
		<label id="elh_ivf_oocytedenudation_patient3" for="x_patient3" class="<?php echo $ivf_oocytedenudation_add->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_patient3" type="text/html"><?php echo $ivf_oocytedenudation_add->patient3->caption() ?><?php echo $ivf_oocytedenudation_add->patient3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_oocytedenudation_add->RightColumnClass ?>"><div <?php echo $ivf_oocytedenudation_add->patient3->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_patient3" type="text/html"><span id="el_ivf_oocytedenudation_patient3">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_patient3"><?php echo EmptyValue(strval($ivf_oocytedenudation_add->patient3->ViewValue)) ? $Language->phrase("PleaseSelect") : $ivf_oocytedenudation_add->patient3->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($ivf_oocytedenudation_add->patient3->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($ivf_oocytedenudation_add->patient3->ReadOnly || $ivf_oocytedenudation_add->patient3->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_patient3',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $ivf_oocytedenudation_add->patient3->Lookup->getParamTag($ivf_oocytedenudation_add, "p_x_patient3") ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient3" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $ivf_oocytedenudation_add->patient3->displayValueSeparatorAttribute() ?>" name="x_patient3" id="x_patient3" value="<?php echo $ivf_oocytedenudation_add->patient3->CurrentValue ?>"<?php echo $ivf_oocytedenudation_add->patient3->editAttributes() ?>>
</span></script>
<?php echo $ivf_oocytedenudation_add->patient3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation_add->patient4->Visible) { // patient4 ?>
	<div id="r_patient4" class="form-group row">
		<label id="elh_ivf_oocytedenudation_patient4" for="x_patient4" class="<?php echo $ivf_oocytedenudation_add->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_patient4" type="text/html"><?php echo $ivf_oocytedenudation_add->patient4->caption() ?><?php echo $ivf_oocytedenudation_add->patient4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_oocytedenudation_add->RightColumnClass ?>"><div <?php echo $ivf_oocytedenudation_add->patient4->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_patient4" type="text/html"><span id="el_ivf_oocytedenudation_patient4">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_patient4"><?php echo EmptyValue(strval($ivf_oocytedenudation_add->patient4->ViewValue)) ? $Language->phrase("PleaseSelect") : $ivf_oocytedenudation_add->patient4->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($ivf_oocytedenudation_add->patient4->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($ivf_oocytedenudation_add->patient4->ReadOnly || $ivf_oocytedenudation_add->patient4->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_patient4',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $ivf_oocytedenudation_add->patient4->Lookup->getParamTag($ivf_oocytedenudation_add, "p_x_patient4") ?>
<input type="hidden" data-table="ivf_oocytedenudation" data-field="x_patient4" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $ivf_oocytedenudation_add->patient4->displayValueSeparatorAttribute() ?>" name="x_patient4" id="x_patient4" value="<?php echo $ivf_oocytedenudation_add->patient4->CurrentValue ?>"<?php echo $ivf_oocytedenudation_add->patient4->editAttributes() ?>>
</span></script>
<?php echo $ivf_oocytedenudation_add->patient4->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation_add->OocytesDonate3->Visible) { // OocytesDonate3 ?>
	<div id="r_OocytesDonate3" class="form-group row">
		<label id="elh_ivf_oocytedenudation_OocytesDonate3" for="x_OocytesDonate3" class="<?php echo $ivf_oocytedenudation_add->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_OocytesDonate3" type="text/html"><?php echo $ivf_oocytedenudation_add->OocytesDonate3->caption() ?><?php echo $ivf_oocytedenudation_add->OocytesDonate3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_oocytedenudation_add->RightColumnClass ?>"><div <?php echo $ivf_oocytedenudation_add->OocytesDonate3->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_OocytesDonate3" type="text/html"><span id="el_ivf_oocytedenudation_OocytesDonate3">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_OocytesDonate3" name="x_OocytesDonate3" id="x_OocytesDonate3" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_add->OocytesDonate3->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_add->OocytesDonate3->EditValue ?>"<?php echo $ivf_oocytedenudation_add->OocytesDonate3->editAttributes() ?>>
</span></script>
<?php echo $ivf_oocytedenudation_add->OocytesDonate3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation_add->OocytesDonate4->Visible) { // OocytesDonate4 ?>
	<div id="r_OocytesDonate4" class="form-group row">
		<label id="elh_ivf_oocytedenudation_OocytesDonate4" for="x_OocytesDonate4" class="<?php echo $ivf_oocytedenudation_add->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_OocytesDonate4" type="text/html"><?php echo $ivf_oocytedenudation_add->OocytesDonate4->caption() ?><?php echo $ivf_oocytedenudation_add->OocytesDonate4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_oocytedenudation_add->RightColumnClass ?>"><div <?php echo $ivf_oocytedenudation_add->OocytesDonate4->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_OocytesDonate4" type="text/html"><span id="el_ivf_oocytedenudation_OocytesDonate4">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_OocytesDonate4" name="x_OocytesDonate4" id="x_OocytesDonate4" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_add->OocytesDonate4->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_add->OocytesDonate4->EditValue ?>"<?php echo $ivf_oocytedenudation_add->OocytesDonate4->editAttributes() ?>>
</span></script>
<?php echo $ivf_oocytedenudation_add->OocytesDonate4->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation_add->MIOocytesDonate3->Visible) { // MIOocytesDonate3 ?>
	<div id="r_MIOocytesDonate3" class="form-group row">
		<label id="elh_ivf_oocytedenudation_MIOocytesDonate3" for="x_MIOocytesDonate3" class="<?php echo $ivf_oocytedenudation_add->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_MIOocytesDonate3" type="text/html"><?php echo $ivf_oocytedenudation_add->MIOocytesDonate3->caption() ?><?php echo $ivf_oocytedenudation_add->MIOocytesDonate3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_oocytedenudation_add->RightColumnClass ?>"><div <?php echo $ivf_oocytedenudation_add->MIOocytesDonate3->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_MIOocytesDonate3" type="text/html"><span id="el_ivf_oocytedenudation_MIOocytesDonate3">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate3" name="x_MIOocytesDonate3" id="x_MIOocytesDonate3" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_add->MIOocytesDonate3->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_add->MIOocytesDonate3->EditValue ?>"<?php echo $ivf_oocytedenudation_add->MIOocytesDonate3->editAttributes() ?>>
</span></script>
<?php echo $ivf_oocytedenudation_add->MIOocytesDonate3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation_add->MIOocytesDonate4->Visible) { // MIOocytesDonate4 ?>
	<div id="r_MIOocytesDonate4" class="form-group row">
		<label id="elh_ivf_oocytedenudation_MIOocytesDonate4" for="x_MIOocytesDonate4" class="<?php echo $ivf_oocytedenudation_add->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_MIOocytesDonate4" type="text/html"><?php echo $ivf_oocytedenudation_add->MIOocytesDonate4->caption() ?><?php echo $ivf_oocytedenudation_add->MIOocytesDonate4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_oocytedenudation_add->RightColumnClass ?>"><div <?php echo $ivf_oocytedenudation_add->MIOocytesDonate4->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_MIOocytesDonate4" type="text/html"><span id="el_ivf_oocytedenudation_MIOocytesDonate4">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_MIOocytesDonate4" name="x_MIOocytesDonate4" id="x_MIOocytesDonate4" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_add->MIOocytesDonate4->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_add->MIOocytesDonate4->EditValue ?>"<?php echo $ivf_oocytedenudation_add->MIOocytesDonate4->editAttributes() ?>>
</span></script>
<?php echo $ivf_oocytedenudation_add->MIOocytesDonate4->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation_add->SelfOocytesMI->Visible) { // SelfOocytesMI ?>
	<div id="r_SelfOocytesMI" class="form-group row">
		<label id="elh_ivf_oocytedenudation_SelfOocytesMI" for="x_SelfOocytesMI" class="<?php echo $ivf_oocytedenudation_add->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_SelfOocytesMI" type="text/html"><?php echo $ivf_oocytedenudation_add->SelfOocytesMI->caption() ?><?php echo $ivf_oocytedenudation_add->SelfOocytesMI->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_oocytedenudation_add->RightColumnClass ?>"><div <?php echo $ivf_oocytedenudation_add->SelfOocytesMI->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_SelfOocytesMI" type="text/html"><span id="el_ivf_oocytedenudation_SelfOocytesMI">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_SelfOocytesMI" name="x_SelfOocytesMI" id="x_SelfOocytesMI" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_add->SelfOocytesMI->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_add->SelfOocytesMI->EditValue ?>"<?php echo $ivf_oocytedenudation_add->SelfOocytesMI->editAttributes() ?>>
</span></script>
<?php echo $ivf_oocytedenudation_add->SelfOocytesMI->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_oocytedenudation_add->SelfOocytesMII->Visible) { // SelfOocytesMII ?>
	<div id="r_SelfOocytesMII" class="form-group row">
		<label id="elh_ivf_oocytedenudation_SelfOocytesMII" for="x_SelfOocytesMII" class="<?php echo $ivf_oocytedenudation_add->LeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_SelfOocytesMII" type="text/html"><?php echo $ivf_oocytedenudation_add->SelfOocytesMII->caption() ?><?php echo $ivf_oocytedenudation_add->SelfOocytesMII->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_oocytedenudation_add->RightColumnClass ?>"><div <?php echo $ivf_oocytedenudation_add->SelfOocytesMII->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_SelfOocytesMII" type="text/html"><span id="el_ivf_oocytedenudation_SelfOocytesMII">
<input type="text" data-table="ivf_oocytedenudation" data-field="x_SelfOocytesMII" name="x_SelfOocytesMII" id="x_SelfOocytesMII" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_oocytedenudation_add->SelfOocytesMII->getPlaceHolder()) ?>" value="<?php echo $ivf_oocytedenudation_add->SelfOocytesMII->EditValue ?>"<?php echo $ivf_oocytedenudation_add->SelfOocytesMII->editAttributes() ?>>
</span></script>
<?php echo $ivf_oocytedenudation_add->SelfOocytesMII->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_ivf_oocytedenudationadd" class="ew-custom-template"></div>
<script id="tpm_ivf_oocytedenudationadd" type="text/html">
<div id="ct_ivf_oocytedenudation_add"><style>
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
							<span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_ResultDate"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_oocytedenudation_ResultDate")/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell"></span>
						</td>
					</tr>
					<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_Surgeon"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_oocytedenudation_Surgeon")/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_AsstSurgeon"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_oocytedenudation_AsstSurgeon")/}}</span>
						</td>
					</tr>
					<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_Anaesthetist"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_oocytedenudation_Anaesthetist")/}}</span>
						</td>
						<td style="width:50%">
						{{include tmpl="#tpc_ivf_oocytedenudation_AnaestheiaType"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_oocytedenudation_AnaestheiaType")/}}
						</td>
					</tr>
					<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_PrimaryEmbryologist"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_oocytedenudation_PrimaryEmbryologist")/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_SecondaryEmbryologist"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_oocytedenudation_SecondaryEmbryologist")/}}</span>
						</td>
					</tr>
				</tbody>
			</table>
			<table class="ew-table" style="width:100%;">
				<tbody>
					<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_OPUNotes"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_oocytedenudation_OPUNotes")/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_OocyteOrgin"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_oocytedenudation_OocyteOrgin")/}}</span>
						</td>
					</tr>
				</tbody>
			</table>
			<table class="ew-table" style="width:100%;">
				<tbody>
					<tr>
						<td>
							<span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_ExpFollicles"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_oocytedenudation_ExpFollicles")/}}</span>
						</td>
						<td>
							<span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_NoOfFolliclesRight"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_oocytedenudation_NoOfFolliclesRight")/}}</span>
						</td>
						<td>
							<span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_NoOfFolliclesLeft"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_oocytedenudation_NoOfFolliclesLeft")/}}</span>
						</td>
					</tr>
						<tr>
						<td>
							<span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_NoOfOocytes"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_oocytedenudation_NoOfOocytes")/}}</span>
						</td>
						<td>
							<span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_OocyteType"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_oocytedenudation_OocyteType")/}}</span>
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
							<span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_DateOfDenudation"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_oocytedenudation_DateOfDenudation")/}}</span>
						</td>
						<td>
							<span class="ew-cell"></span>
						</td>
					</tr>
						<tr>
						<td>
							<span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_DenudationDoneBy"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_oocytedenudation_DenudationDoneBy")/}}</span>
						</td>
						<td>
							<span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_SecondaryDenudationDoneBy"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_oocytedenudation_SecondaryDenudationDoneBy")/}}</span>
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
					<tr><td><span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_SelfOocytesMI"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_oocytedenudation_SelfOocytesMI")/}}</span></td>
					<tr><td><span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_SelfOocytesMII"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_oocytedenudation_SelfOocytesMII")/}}</span></td>
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
					<tr><td><span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_patient1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_oocytedenudation_patient1")/}}</span></td></tr>
					<tr><td><span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_MIOocytesDonate1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_oocytedenudation_MIOocytesDonate1")/}}</span></td>
					<tr><td><span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_OocytesDonate1"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_oocytedenudation_OocytesDonate1")/}}</span></td>
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
					<tr><td><span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_patient2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_oocytedenudation_patient2")/}}</span></td></tr>
					<tr><td><span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_MIOocytesDonate2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_oocytedenudation_MIOocytesDonate2")/}}</span></td>
					<tr><td><span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_OocytesDonate2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_oocytedenudation_OocytesDonate2")/}}</span></td>
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
					<tr><td><span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_patient3"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_oocytedenudation_patient3")/}}</span></td></tr>
					<tr><td><span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_MIOocytesDonate3"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_oocytedenudation_MIOocytesDonate3")/}}</span></td>
					<tr><td><span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_OocytesDonate3"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_oocytedenudation_OocytesDonate3")/}}</span></td>
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
					<tr><td><span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_patient4"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_oocytedenudation_patient4")/}}</span></td></tr>
					<tr><td><span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_MIOocytesDonate4"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_oocytedenudation_MIOocytesDonate4")/}}</span></td>
					<tr><td><span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_OocytesDonate4"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_oocytedenudation_OocytesDonate4")/}}</span></td>
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
</div>
</script>

<?php
	if (in_array("ivf_embryology_chart", explode(",", $ivf_oocytedenudation->getCurrentDetailTable())) && $ivf_embryology_chart->DetailAdd) {
?>
<?php if ($ivf_oocytedenudation->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("ivf_embryology_chart", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "ivf_embryology_chartgrid.php" ?>
<?php } ?>
<?php if (!$ivf_oocytedenudation_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $ivf_oocytedenudation_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $ivf_oocytedenudation_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($ivf_oocytedenudation->Rows) ?> };
	ew.applyTemplate("tpd_ivf_oocytedenudationadd", "tpm_ivf_oocytedenudationadd", "ivf_oocytedenudationadd", "<?php echo $ivf_oocytedenudation->CustomExport ?>", ew.templateData.rows[0]);
	$("script.ivf_oocytedenudationadd_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$ivf_oocytedenudation_add->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// document.write("page loaded");

	</script>
	<style>
	.input-group>.form-control.ew-lookup-text {
		width: 90%;
	}
	.ew-lookup-text {
		height: calc(1.9575rem + 2px);
		width: 100%;
	}
	</style>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<script>
	var selfPatient = 'No' ;
	var donorPatient = 'No' ;
	$("input[name='x_OocyteType[]']").click(function() { // Field2 has multiple inputs (checkboxes) so they should be selected by name
		if (this.checked == true) { // If checked
			if(this.value == 'Self')
			{
				selfPatient = 'Yes' ;
			}
			if(this.value == 'Donate')
			{
				donorPatient = 'Yes';
			}
		} else { 
			if(this.value == 'Self')
			{
				selfPatient = 'No' ;
			}
			if(this.value == 'Donate')
			{
				donorPatient = 'No';
			}
		}
	 document.getElementById("DateOfDenudationShow").style.visibility = "hidden";
	});
	 document.getElementById("DateOfDenudationShow").style.visibility = "hidden";
	 document.getElementById("SelfOocyteShow").style.display = 'none';
	 document.getElementById("OocyteDonateToPatientShow").style.display = 'none';
	 	document.getElementById("x_SelfOocytesMI").value = 0;
		document.getElementById("x_SelfOocytesMII").value = 0;
		document.getElementById("x_MIOocytesDonate1").value = 0;
		document.getElementById("x_OocytesDonate1").value = 0;
		document.getElementById("x_MIOocytesDonate2").value = 0;
		document.getElementById("x_OocytesDonate2").value = 0;
		document.getElementById("x_MIOocytesDonate3").value = 0;
		document.getElementById("x_OocytesDonate3").value = 0;
		document.getElementById("x_MIOocytesDonate4").value = 0;
		document.getElementById("x_OocytesDonate4").value = 0;

	function ShowDenudationDoneBy()
	{
		if(selfPatient == 'No' &&  donorPatient == 'No')
		{
			Swal.fire(
				'Self or Donor ?',
				'Please Select Self or Donor from check box ...',
				'question'
			)
			Return;
		}
		 document.getElementById("DateOfDenudationShow").style.visibility = "visible";
		 if(donorPatient == 'Yes' )
		 {
		 	document.getElementById("OocyteDonateToPatientShow").style.display = 'block';
		 	if(selfPatient == 'Yes' )
		 	{
		 		document.getElementById("SelfOocyteShow").style.display = 'block';
		 	}else{
		 		document.getElementById("SelfOocyteShow").style.display = 'none';
		 		document.getElementById("x_SelfOocytesMI").value = 0;
		 	    document.getElementById("x_SelfOocytesMII").value = 0;
		 	}
		 }else{
		 	document.getElementById("OocyteDonateToPatientShow").style.display = 'none';
		 		document.getElementById("SelfOocyteShow").style.display = 'none';
		 		document.getElementById("x_SelfOocytesMI").value = 0;
		 	    document.getElementById("x_SelfOocytesMII").value = 0;
		document.getElementById("x_MIOocytesDonate1").value = 0;
		document.getElementById("x_OocytesDonate1").value = 0;
		document.getElementById("x_MIOocytesDonate2").value = 0;
		document.getElementById("x_OocytesDonate2").value = 0;
		document.getElementById("x_MIOocytesDonate3").value = 0;
		document.getElementById("x_OocytesDonate3").value = 0;
		document.getElementById("x_MIOocytesDonate4").value = 0;
		document.getElementById("x_OocytesDonate4").value = 0;
		 }
		 var tablecount =  document.getElementById("x_NoOfOocytes").value;
		 var htmldata = "";
		 htmldata = htmldata + "<table id='capacitationTable' class='' align='left' border='0' cellpadding='1' cellspacing='1' style='width:100%'>";
		 htmldata = htmldata + "<thead id='capacitationTableHead'><tr  style='background-color:#707B7C;color:white;' ><td id='PreCapacitation'>Oocyte No</td>";
		 htmldata = htmldata + "<td id='PostCapacitation'>Stage</td><td id='OocyteType'>Oocyte Type</td>";
		 htmldata = htmldata + "<td id='PostCapacitation'>Patient ID</td><td id='MaxCapacitation'>Remarks</td></tr></thead><tbody>";
		 for (var i = 1; i <= tablecount; i++){
			htmldata = htmldata + "<tr><td><input type='text' id='OocyteNo"+i+"' name='OocyteNo"+i+"' value='"+i+"'></td>";
			htmldata = htmldata + "<td><select onchange='myStageFunction(this)' id='Stage"+i+"' name='Stage"+i+"'><option value=''></option><option value='MII'>MII</option><option value='MI'>MI</option><option value='GV'>GV</option><option value='Others'>Others</option></select></td>";
			htmldata = htmldata + "<td><input type='text' id='OocyteType"+i+"' name='OocyteType"+i+"'></td>";
			htmldata = htmldata + "<td><input type='text' id='PatientID"+i+"' name='PatientID"+i+"'></td>";
			htmldata = htmldata + "<td><input type='text' id='Remarks"+i+"' name='Remarks"+i+"'></td></tr>";
		}
		htmldata = htmldata + "</tbody></table>";
		var e = document.createElement('div');
		e.innerHTML = htmldata;
		var addelm =  document.getElementById("addElement");
		addelm.innerHTML = "";
		addelm.appendChild(e);
	}

	function myStageFunction(selItm)
	{

		// alert("hhhhhhhhhhhhhhh");
		var tablecount =  document.getElementById("x_NoOfOocytes").value;
		var SelfMI =  document.getElementById("x_SelfOocytesMI").value;
		var SelfMII =  document.getElementById("x_SelfOocytesMII").value;
		var PatMI1 =  document.getElementById("x_MIOocytesDonate1").value;
		var PatMII1 =  document.getElementById("x_OocytesDonate1").value;
		var PatMI2 =  document.getElementById("x_MIOocytesDonate2").value;
		var PatMII2 =  document.getElementById("x_OocytesDonate2").value;
		var PatMI3 =  document.getElementById("x_MIOocytesDonate3").value;
		var PatMII3 =  document.getElementById("x_OocytesDonate3").value;
		var PatMI4 =  document.getElementById("x_MIOocytesDonate4").value;
		var PatMII4 =  document.getElementById("x_OocytesDonate4").value;
		var patient1val =  document.getElementById("lu_x_patient1");
		var patient2val =  document.getElementById("lu_x_patient2");
		var patient3val =  document.getElementById("lu_x_patient3");
		var patient4val =  document.getElementById("lu_x_patient4");
		var patient1 =  patient1val.innerText.split(',');
		var patient2 =  patient2val.innerText.split(',');
		var patient3 =  patient3val.innerText.split(',');
		var patient4 =  patient4val.innerText.split(',');
		var totMI = 0;
		var totMII = 0;
		 if(donorPatient != 'Yes' )
		 {
		 	SelfMI = tablecount;
		 	SelfMII = tablecount;
		 }
		for (var i = 1; i <= tablecount; i++){
			var Stage =  document.getElementById("Stage" + i).value;
			if(Stage == 'MI')
			{
				totMI = totMI + 1;
						if(  parseInt(totMI) <= parseInt(SelfMI))
						{
							document.getElementById("OocyteType" + i).value = 'Self';
							document.getElementById("PatientID" + i).value = '<?php echo $results2[0]["id"]; ?>';
						}
						if( parseInt(SelfMI) < parseInt(totMI) &&   parseInt(totMI) <= (parseInt(SelfMI) + parseInt(PatMI1)))
						{
							document.getElementById("OocyteType" + i).value = 'Recipient 1';
							document.getElementById("PatientID" + i).value = patient1[3];
						}
						if( (parseInt(SelfMI) + parseInt(PatMI1)) < parseInt(totMI) && parseInt(totMI) <= (parseInt(SelfMI) + parseInt(PatMI1) + parseInt(PatMI2)))
						{
							document.getElementById("OocyteType" + i).value = 'Recipient 2';
							document.getElementById("PatientID" + i).value = patient2[3];
						}
						if( (parseInt(SelfMI) + parseInt(PatMI1) + parseInt(PatMI2)) < parseInt(totMI) && parseInt(totMI) <= (parseInt(SelfMI) + parseInt(PatMI1) + parseInt(PatMI2) + parseInt(PatMI3)))
						{
							document.getElementById("OocyteType" + i).value = 'Recipient 3';
							document.getElementById("PatientID" + i).value = patient3[3];
						}
						if( (parseInt(SelfMI)+ parseInt(PatMI1) + parseInt(PatMI2) + parseInt(PatMI3)) < parseInt(totMI) && parseInt(totMI) <= (parseInt(SelfMI)  + parseInt(PatMI1) + parseInt(PatMI2) + parseInt(PatMI3) + parseInt(PatMI4)))
						{
							document.getElementById("OocyteType" + i).value = 'Recipient 4';
							document.getElementById("PatientID" + i).value = patient4[3];
						}
			}
			if(Stage == 'MII')
			{
				totMII = totMII + 1;
						if(  parseInt(totMII) <= parseInt(SelfMII))
						{
							document.getElementById("OocyteType" + i).value = 'Self';
							document.getElementById("PatientID" + i).value = '<?php echo $results2[0]["id"]; ?>';
						}
						if( parseInt(SelfMII) < parseInt(totMII) &&   parseInt(totMII) <= (parseInt(SelfMII) + parseInt(PatMII1)))
						{
							document.getElementById("OocyteType" + i).value = 'Recipient 1';
							document.getElementById("PatientID" + i).value = patient1[3];
						}
						if( (parseInt(SelfMII) + parseInt(PatMII1)) < parseInt(totMII) && parseInt(totMII) <= (parseInt(SelfMII) + parseInt(PatMII1) + parseInt(PatMII2)))
						{
							document.getElementById("OocyteType" + i).value = 'Recipient 2';
							document.getElementById("PatientID" + i).value = patient2[3];
						}
						if( (parseInt(SelfMII) + parseInt(PatMII1) + parseInt(PatMII2)) < parseInt(totMII) && parseInt(totMII) <= (parseInt(SelfMII) + parseInt(PatMII1) + parseInt(PatMII2) + parseInt(PatMII3)))
						{
							document.getElementById("OocyteType" + i).value = 'Recipient 3';
							document.getElementById("PatientID" + i).value = patient3[3];
						}
						if( (parseInt(SelfMII)+ parseInt(PatMII1) + parseInt(PatMII2) + parseInt(PatMII3)) < parseInt(totMII) && parseInt(totMII) <= (parseInt(SelfMII)  + parseInt(PatMII1) + parseInt(PatMII2) + parseInt(PatMII3) + parseInt(PatMII4)))
						{
							document.getElementById("OocyteType" + i).value = 'Recipient 4';
							document.getElementById("PatientID" + i).value = patient4[3];
						}
			}
		}
	}
	</script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<script>
});
</script>
<?php include_once "footer.php"; ?>
<?php
$ivf_oocytedenudation_add->terminate();
?>