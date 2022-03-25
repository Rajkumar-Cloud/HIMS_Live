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
$ivf_add = new ivf_add();

// Run the page
$ivf_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fivfadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fivfadd = currentForm = new ew.Form("fivfadd", "add");

	// Validate form
	fivfadd.validate = function() {
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
			<?php if ($ivf_add->Male->Required) { ?>
				elm = this.getElements("x" + infix + "_Male");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_add->Male->caption(), $ivf_add->Male->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_add->Female->Required) { ?>
				elm = this.getElements("x" + infix + "_Female");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_add->Female->caption(), $ivf_add->Female->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_add->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_add->status->caption(), $ivf_add->status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_add->createdby->Required) { ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_add->createdby->caption(), $ivf_add->createdby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_add->createddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_add->createddatetime->caption(), $ivf_add->createddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_add->malepropic->Required) { ?>
				felm = this.getElements("x" + infix + "_malepropic");
				elm = this.getElements("fn_x" + infix + "_malepropic");
				if (felm && elm && !ew.hasValue(elm))
					return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $ivf_add->malepropic->caption(), $ivf_add->malepropic->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_add->femalepropic->Required) { ?>
				felm = this.getElements("x" + infix + "_femalepropic");
				elm = this.getElements("fn_x" + infix + "_femalepropic");
				if (felm && elm && !ew.hasValue(elm))
					return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $ivf_add->femalepropic->caption(), $ivf_add->femalepropic->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_add->HusbandEducation->Required) { ?>
				elm = this.getElements("x" + infix + "_HusbandEducation");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_add->HusbandEducation->caption(), $ivf_add->HusbandEducation->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_add->WifeEducation->Required) { ?>
				elm = this.getElements("x" + infix + "_WifeEducation");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_add->WifeEducation->caption(), $ivf_add->WifeEducation->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_add->HusbandWorkHours->Required) { ?>
				elm = this.getElements("x" + infix + "_HusbandWorkHours");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_add->HusbandWorkHours->caption(), $ivf_add->HusbandWorkHours->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_add->WifeWorkHours->Required) { ?>
				elm = this.getElements("x" + infix + "_WifeWorkHours");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_add->WifeWorkHours->caption(), $ivf_add->WifeWorkHours->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_add->PatientLanguage->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientLanguage");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_add->PatientLanguage->caption(), $ivf_add->PatientLanguage->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_add->ReferedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_ReferedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_add->ReferedBy->caption(), $ivf_add->ReferedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_add->ReferPhNo->Required) { ?>
				elm = this.getElements("x" + infix + "_ReferPhNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_add->ReferPhNo->caption(), $ivf_add->ReferPhNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_add->WifeCell->Required) { ?>
				elm = this.getElements("x" + infix + "_WifeCell");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_add->WifeCell->caption(), $ivf_add->WifeCell->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_add->HusbandCell->Required) { ?>
				elm = this.getElements("x" + infix + "_HusbandCell");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_add->HusbandCell->caption(), $ivf_add->HusbandCell->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_add->WifeEmail->Required) { ?>
				elm = this.getElements("x" + infix + "_WifeEmail");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_add->WifeEmail->caption(), $ivf_add->WifeEmail->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_add->HusbandEmail->Required) { ?>
				elm = this.getElements("x" + infix + "_HusbandEmail");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_add->HusbandEmail->caption(), $ivf_add->HusbandEmail->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_add->ARTCYCLE->Required) { ?>
				elm = this.getElements("x" + infix + "_ARTCYCLE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_add->ARTCYCLE->caption(), $ivf_add->ARTCYCLE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_add->RESULT->Required) { ?>
				elm = this.getElements("x" + infix + "_RESULT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_add->RESULT->caption(), $ivf_add->RESULT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_add->malepic->Required) { ?>
				elm = this.getElements("x" + infix + "_malepic");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_add->malepic->caption(), $ivf_add->malepic->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_add->femalepic->Required) { ?>
				elm = this.getElements("x" + infix + "_femalepic");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_add->femalepic->caption(), $ivf_add->femalepic->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_add->Mgendar->Required) { ?>
				elm = this.getElements("x" + infix + "_Mgendar");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_add->Mgendar->caption(), $ivf_add->Mgendar->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_add->Fgendar->Required) { ?>
				elm = this.getElements("x" + infix + "_Fgendar");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_add->Fgendar->caption(), $ivf_add->Fgendar->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_add->CoupleID->Required) { ?>
				elm = this.getElements("x" + infix + "_CoupleID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_add->CoupleID->caption(), $ivf_add->CoupleID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_add->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_add->HospID->caption(), $ivf_add->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_add->PatientName->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_add->PatientName->caption(), $ivf_add->PatientName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_add->PatientID->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_add->PatientID->caption(), $ivf_add->PatientID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_add->PartnerName->Required) { ?>
				elm = this.getElements("x" + infix + "_PartnerName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_add->PartnerName->caption(), $ivf_add->PartnerName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_add->PartnerID->Required) { ?>
				elm = this.getElements("x" + infix + "_PartnerID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_add->PartnerID->caption(), $ivf_add->PartnerID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_add->DrID->Required) { ?>
				elm = this.getElements("x" + infix + "_DrID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_add->DrID->caption(), $ivf_add->DrID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_add->DrDepartment->Required) { ?>
				elm = this.getElements("x" + infix + "_DrDepartment");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_add->DrDepartment->caption(), $ivf_add->DrDepartment->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_add->Doctor->Required) { ?>
				elm = this.getElements("x" + infix + "_Doctor");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_add->Doctor->caption(), $ivf_add->Doctor->RequiredErrorMessage)) ?>");
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
	fivfadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fivfadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fivfadd.lists["x_Male"] = <?php echo $ivf_add->Male->Lookup->toClientList($ivf_add) ?>;
	fivfadd.lists["x_Male"].options = <?php echo JsonEncode($ivf_add->Male->lookupOptions()) ?>;
	fivfadd.lists["x_Female"] = <?php echo $ivf_add->Female->Lookup->toClientList($ivf_add) ?>;
	fivfadd.lists["x_Female"].options = <?php echo JsonEncode($ivf_add->Female->lookupOptions()) ?>;
	fivfadd.lists["x_status"] = <?php echo $ivf_add->status->Lookup->toClientList($ivf_add) ?>;
	fivfadd.lists["x_status"].options = <?php echo JsonEncode($ivf_add->status->lookupOptions()) ?>;
	fivfadd.lists["x_ReferedBy"] = <?php echo $ivf_add->ReferedBy->Lookup->toClientList($ivf_add) ?>;
	fivfadd.lists["x_ReferedBy"].options = <?php echo JsonEncode($ivf_add->ReferedBy->lookupOptions()) ?>;
	fivfadd.lists["x_ARTCYCLE"] = <?php echo $ivf_add->ARTCYCLE->Lookup->toClientList($ivf_add) ?>;
	fivfadd.lists["x_ARTCYCLE"].options = <?php echo JsonEncode($ivf_add->ARTCYCLE->options(FALSE, TRUE)) ?>;
	fivfadd.lists["x_RESULT"] = <?php echo $ivf_add->RESULT->Lookup->toClientList($ivf_add) ?>;
	fivfadd.lists["x_RESULT"].options = <?php echo JsonEncode($ivf_add->RESULT->options(FALSE, TRUE)) ?>;
	fivfadd.lists["x_DrID"] = <?php echo $ivf_add->DrID->Lookup->toClientList($ivf_add) ?>;
	fivfadd.lists["x_DrID"].options = <?php echo JsonEncode($ivf_add->DrID->lookupOptions()) ?>;
	loadjs.done("fivfadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $ivf_add->showPageHeader(); ?>
<?php
$ivf_add->showMessage();
?>
<form name="fivfadd" id="fivfadd" class="<?php echo $ivf_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_add->IsModal ?>">
<div class="ew-add-div d-none"><!-- page* -->
<?php if ($ivf_add->Male->Visible) { // Male ?>
	<div id="r_Male" class="form-group row">
		<label id="elh_ivf_Male" for="x_Male" class="<?php echo $ivf_add->LeftColumnClass ?>"><script id="tpc_ivf_Male" type="text/html"><?php echo $ivf_add->Male->caption() ?><?php echo $ivf_add->Male->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_add->RightColumnClass ?>"><div <?php echo $ivf_add->Male->cellAttributes() ?>>
<script id="tpx_ivf_Male" type="text/html"><span id="el_ivf_Male">
<?php $ivf_add->Male->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Male"><?php echo EmptyValue(strval($ivf_add->Male->ViewValue)) ? $Language->phrase("PleaseSelect") : $ivf_add->Male->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($ivf_add->Male->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($ivf_add->Male->ReadOnly || $ivf_add->Male->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Male',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $ivf_add->Male->Lookup->getParamTag($ivf_add, "p_x_Male") ?>
<input type="hidden" data-table="ivf" data-field="x_Male" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $ivf_add->Male->displayValueSeparatorAttribute() ?>" name="x_Male" id="x_Male" value="<?php echo $ivf_add->Male->CurrentValue ?>"<?php echo $ivf_add->Male->editAttributes() ?>>
</span></script>
<?php echo $ivf_add->Male->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_add->Female->Visible) { // Female ?>
	<div id="r_Female" class="form-group row">
		<label id="elh_ivf_Female" for="x_Female" class="<?php echo $ivf_add->LeftColumnClass ?>"><script id="tpc_ivf_Female" type="text/html"><?php echo $ivf_add->Female->caption() ?><?php echo $ivf_add->Female->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_add->RightColumnClass ?>"><div <?php echo $ivf_add->Female->cellAttributes() ?>>
<script id="tpx_ivf_Female" type="text/html"><span id="el_ivf_Female">
<?php $ivf_add->Female->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Female"><?php echo EmptyValue(strval($ivf_add->Female->ViewValue)) ? $Language->phrase("PleaseSelect") : $ivf_add->Female->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($ivf_add->Female->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($ivf_add->Female->ReadOnly || $ivf_add->Female->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Female',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $ivf_add->Female->Lookup->getParamTag($ivf_add, "p_x_Female") ?>
<input type="hidden" data-table="ivf" data-field="x_Female" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $ivf_add->Female->displayValueSeparatorAttribute() ?>" name="x_Female" id="x_Female" value="<?php echo $ivf_add->Female->CurrentValue ?>"<?php echo $ivf_add->Female->editAttributes() ?>>
</span></script>
<?php echo $ivf_add->Female->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_add->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_ivf_status" for="x_status" class="<?php echo $ivf_add->LeftColumnClass ?>"><script id="tpc_ivf_status" type="text/html"><?php echo $ivf_add->status->caption() ?><?php echo $ivf_add->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_add->RightColumnClass ?>"><div <?php echo $ivf_add->status->cellAttributes() ?>>
<script id="tpx_ivf_status" type="text/html"><span id="el_ivf_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf" data-field="x_status" data-value-separator="<?php echo $ivf_add->status->displayValueSeparatorAttribute() ?>" id="x_status" name="x_status"<?php echo $ivf_add->status->editAttributes() ?>>
			<?php echo $ivf_add->status->selectOptionListHtml("x_status") ?>
		</select>
</div>
<?php echo $ivf_add->status->Lookup->getParamTag($ivf_add, "p_x_status") ?>
</span></script>
<?php echo $ivf_add->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_add->malepropic->Visible) { // malepropic ?>
	<div id="r_malepropic" class="form-group row">
		<label id="elh_ivf_malepropic" class="<?php echo $ivf_add->LeftColumnClass ?>"><script id="tpc_ivf_malepropic" type="text/html"><?php echo $ivf_add->malepropic->caption() ?><?php echo $ivf_add->malepropic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_add->RightColumnClass ?>"><div <?php echo $ivf_add->malepropic->cellAttributes() ?>>
<script id="tpx_ivf_malepropic" type="text/html"><span id="el_ivf_malepropic">
<div id="fd_x_malepropic">
<div class="input-group">
	<div class="custom-file">
		<input type="file" class="custom-file-input" title="<?php echo $ivf_add->malepropic->title() ?>" data-table="ivf" data-field="x_malepropic" name="x_malepropic" id="x_malepropic" lang="<?php echo CurrentLanguageID() ?>"<?php echo $ivf_add->malepropic->editAttributes() ?><?php if ($ivf_add->malepropic->ReadOnly || $ivf_add->malepropic->Disabled) echo " disabled"; ?>>
		<label class="custom-file-label ew-file-label" for="x_malepropic"><?php echo $Language->phrase("ChooseFile") ?></label>
	</div>
</div>
<input type="hidden" name="fn_x_malepropic" id= "fn_x_malepropic" value="<?php echo $ivf_add->malepropic->Upload->FileName ?>">
<input type="hidden" name="fa_x_malepropic" id= "fa_x_malepropic" value="0">
<input type="hidden" name="fs_x_malepropic" id= "fs_x_malepropic" value="450">
<input type="hidden" name="fx_x_malepropic" id= "fx_x_malepropic" value="<?php echo $ivf_add->malepropic->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_malepropic" id= "fm_x_malepropic" value="<?php echo $ivf_add->malepropic->UploadMaxFileSize ?>">
</div>
<table id="ft_x_malepropic" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span></script>
<?php echo $ivf_add->malepropic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_add->femalepropic->Visible) { // femalepropic ?>
	<div id="r_femalepropic" class="form-group row">
		<label id="elh_ivf_femalepropic" class="<?php echo $ivf_add->LeftColumnClass ?>"><script id="tpc_ivf_femalepropic" type="text/html"><?php echo $ivf_add->femalepropic->caption() ?><?php echo $ivf_add->femalepropic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_add->RightColumnClass ?>"><div <?php echo $ivf_add->femalepropic->cellAttributes() ?>>
<script id="tpx_ivf_femalepropic" type="text/html"><span id="el_ivf_femalepropic">
<div id="fd_x_femalepropic">
<div class="input-group">
	<div class="custom-file">
		<input type="file" class="custom-file-input" title="<?php echo $ivf_add->femalepropic->title() ?>" data-table="ivf" data-field="x_femalepropic" name="x_femalepropic" id="x_femalepropic" lang="<?php echo CurrentLanguageID() ?>"<?php echo $ivf_add->femalepropic->editAttributes() ?><?php if ($ivf_add->femalepropic->ReadOnly || $ivf_add->femalepropic->Disabled) echo " disabled"; ?>>
		<label class="custom-file-label ew-file-label" for="x_femalepropic"><?php echo $Language->phrase("ChooseFile") ?></label>
	</div>
</div>
<input type="hidden" name="fn_x_femalepropic" id= "fn_x_femalepropic" value="<?php echo $ivf_add->femalepropic->Upload->FileName ?>">
<input type="hidden" name="fa_x_femalepropic" id= "fa_x_femalepropic" value="0">
<input type="hidden" name="fs_x_femalepropic" id= "fs_x_femalepropic" value="450">
<input type="hidden" name="fx_x_femalepropic" id= "fx_x_femalepropic" value="<?php echo $ivf_add->femalepropic->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_femalepropic" id= "fm_x_femalepropic" value="<?php echo $ivf_add->femalepropic->UploadMaxFileSize ?>">
</div>
<table id="ft_x_femalepropic" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span></script>
<?php echo $ivf_add->femalepropic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_add->HusbandEducation->Visible) { // HusbandEducation ?>
	<div id="r_HusbandEducation" class="form-group row">
		<label id="elh_ivf_HusbandEducation" for="x_HusbandEducation" class="<?php echo $ivf_add->LeftColumnClass ?>"><script id="tpc_ivf_HusbandEducation" type="text/html"><?php echo $ivf_add->HusbandEducation->caption() ?><?php echo $ivf_add->HusbandEducation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_add->RightColumnClass ?>"><div <?php echo $ivf_add->HusbandEducation->cellAttributes() ?>>
<script id="tpx_ivf_HusbandEducation" type="text/html"><span id="el_ivf_HusbandEducation">
<input type="text" data-table="ivf" data-field="x_HusbandEducation" name="x_HusbandEducation" id="x_HusbandEducation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_add->HusbandEducation->getPlaceHolder()) ?>" value="<?php echo $ivf_add->HusbandEducation->EditValue ?>"<?php echo $ivf_add->HusbandEducation->editAttributes() ?>>
</span></script>
<?php echo $ivf_add->HusbandEducation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_add->WifeEducation->Visible) { // WifeEducation ?>
	<div id="r_WifeEducation" class="form-group row">
		<label id="elh_ivf_WifeEducation" for="x_WifeEducation" class="<?php echo $ivf_add->LeftColumnClass ?>"><script id="tpc_ivf_WifeEducation" type="text/html"><?php echo $ivf_add->WifeEducation->caption() ?><?php echo $ivf_add->WifeEducation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_add->RightColumnClass ?>"><div <?php echo $ivf_add->WifeEducation->cellAttributes() ?>>
<script id="tpx_ivf_WifeEducation" type="text/html"><span id="el_ivf_WifeEducation">
<input type="text" data-table="ivf" data-field="x_WifeEducation" name="x_WifeEducation" id="x_WifeEducation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_add->WifeEducation->getPlaceHolder()) ?>" value="<?php echo $ivf_add->WifeEducation->EditValue ?>"<?php echo $ivf_add->WifeEducation->editAttributes() ?>>
</span></script>
<?php echo $ivf_add->WifeEducation->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_add->HusbandWorkHours->Visible) { // HusbandWorkHours ?>
	<div id="r_HusbandWorkHours" class="form-group row">
		<label id="elh_ivf_HusbandWorkHours" for="x_HusbandWorkHours" class="<?php echo $ivf_add->LeftColumnClass ?>"><script id="tpc_ivf_HusbandWorkHours" type="text/html"><?php echo $ivf_add->HusbandWorkHours->caption() ?><?php echo $ivf_add->HusbandWorkHours->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_add->RightColumnClass ?>"><div <?php echo $ivf_add->HusbandWorkHours->cellAttributes() ?>>
<script id="tpx_ivf_HusbandWorkHours" type="text/html"><span id="el_ivf_HusbandWorkHours">
<input type="text" data-table="ivf" data-field="x_HusbandWorkHours" name="x_HusbandWorkHours" id="x_HusbandWorkHours" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_add->HusbandWorkHours->getPlaceHolder()) ?>" value="<?php echo $ivf_add->HusbandWorkHours->EditValue ?>"<?php echo $ivf_add->HusbandWorkHours->editAttributes() ?>>
</span></script>
<?php echo $ivf_add->HusbandWorkHours->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_add->WifeWorkHours->Visible) { // WifeWorkHours ?>
	<div id="r_WifeWorkHours" class="form-group row">
		<label id="elh_ivf_WifeWorkHours" for="x_WifeWorkHours" class="<?php echo $ivf_add->LeftColumnClass ?>"><script id="tpc_ivf_WifeWorkHours" type="text/html"><?php echo $ivf_add->WifeWorkHours->caption() ?><?php echo $ivf_add->WifeWorkHours->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_add->RightColumnClass ?>"><div <?php echo $ivf_add->WifeWorkHours->cellAttributes() ?>>
<script id="tpx_ivf_WifeWorkHours" type="text/html"><span id="el_ivf_WifeWorkHours">
<input type="text" data-table="ivf" data-field="x_WifeWorkHours" name="x_WifeWorkHours" id="x_WifeWorkHours" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_add->WifeWorkHours->getPlaceHolder()) ?>" value="<?php echo $ivf_add->WifeWorkHours->EditValue ?>"<?php echo $ivf_add->WifeWorkHours->editAttributes() ?>>
</span></script>
<?php echo $ivf_add->WifeWorkHours->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_add->PatientLanguage->Visible) { // PatientLanguage ?>
	<div id="r_PatientLanguage" class="form-group row">
		<label id="elh_ivf_PatientLanguage" for="x_PatientLanguage" class="<?php echo $ivf_add->LeftColumnClass ?>"><script id="tpc_ivf_PatientLanguage" type="text/html"><?php echo $ivf_add->PatientLanguage->caption() ?><?php echo $ivf_add->PatientLanguage->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_add->RightColumnClass ?>"><div <?php echo $ivf_add->PatientLanguage->cellAttributes() ?>>
<script id="tpx_ivf_PatientLanguage" type="text/html"><span id="el_ivf_PatientLanguage">
<input type="text" data-table="ivf" data-field="x_PatientLanguage" name="x_PatientLanguage" id="x_PatientLanguage" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_add->PatientLanguage->getPlaceHolder()) ?>" value="<?php echo $ivf_add->PatientLanguage->EditValue ?>"<?php echo $ivf_add->PatientLanguage->editAttributes() ?>>
</span></script>
<?php echo $ivf_add->PatientLanguage->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_add->ReferedBy->Visible) { // ReferedBy ?>
	<div id="r_ReferedBy" class="form-group row">
		<label id="elh_ivf_ReferedBy" for="x_ReferedBy" class="<?php echo $ivf_add->LeftColumnClass ?>"><script id="tpc_ivf_ReferedBy" type="text/html"><?php echo $ivf_add->ReferedBy->caption() ?><?php echo $ivf_add->ReferedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_add->RightColumnClass ?>"><div <?php echo $ivf_add->ReferedBy->cellAttributes() ?>>
<script id="tpx_ivf_ReferedBy" type="text/html"><span id="el_ivf_ReferedBy">
<?php $ivf_add->ReferedBy->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_ReferedBy"><?php echo EmptyValue(strval($ivf_add->ReferedBy->ViewValue)) ? $Language->phrase("PleaseSelect") : $ivf_add->ReferedBy->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($ivf_add->ReferedBy->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($ivf_add->ReferedBy->ReadOnly || $ivf_add->ReferedBy->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_ReferedBy',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
		<?php if (AllowAdd(CurrentProjectID() . "mas_reference_type") && !$ivf_add->ReferedBy->ReadOnly) { ?>
		<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_ReferedBy" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_add->ReferedBy->caption() ?>" data-title="<?php echo $ivf_add->ReferedBy->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_ReferedBy',url:'mas_reference_typeaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button>
		<?php } ?>
	</div>
</div>
<?php echo $ivf_add->ReferedBy->Lookup->getParamTag($ivf_add, "p_x_ReferedBy") ?>
<input type="hidden" data-table="ivf" data-field="x_ReferedBy" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $ivf_add->ReferedBy->displayValueSeparatorAttribute() ?>" name="x_ReferedBy" id="x_ReferedBy" value="<?php echo $ivf_add->ReferedBy->CurrentValue ?>"<?php echo $ivf_add->ReferedBy->editAttributes() ?>>
</span></script>
<?php echo $ivf_add->ReferedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_add->ReferPhNo->Visible) { // ReferPhNo ?>
	<div id="r_ReferPhNo" class="form-group row">
		<label id="elh_ivf_ReferPhNo" for="x_ReferPhNo" class="<?php echo $ivf_add->LeftColumnClass ?>"><script id="tpc_ivf_ReferPhNo" type="text/html"><?php echo $ivf_add->ReferPhNo->caption() ?><?php echo $ivf_add->ReferPhNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_add->RightColumnClass ?>"><div <?php echo $ivf_add->ReferPhNo->cellAttributes() ?>>
<script id="tpx_ivf_ReferPhNo" type="text/html"><span id="el_ivf_ReferPhNo">
<input type="text" data-table="ivf" data-field="x_ReferPhNo" name="x_ReferPhNo" id="x_ReferPhNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_add->ReferPhNo->getPlaceHolder()) ?>" value="<?php echo $ivf_add->ReferPhNo->EditValue ?>"<?php echo $ivf_add->ReferPhNo->editAttributes() ?>>
</span></script>
<?php echo $ivf_add->ReferPhNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_add->WifeCell->Visible) { // WifeCell ?>
	<div id="r_WifeCell" class="form-group row">
		<label id="elh_ivf_WifeCell" for="x_WifeCell" class="<?php echo $ivf_add->LeftColumnClass ?>"><script id="tpc_ivf_WifeCell" type="text/html"><?php echo $ivf_add->WifeCell->caption() ?><?php echo $ivf_add->WifeCell->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_add->RightColumnClass ?>"><div <?php echo $ivf_add->WifeCell->cellAttributes() ?>>
<script id="tpx_ivf_WifeCell" type="text/html"><span id="el_ivf_WifeCell">
<input type="text" data-table="ivf" data-field="x_WifeCell" name="x_WifeCell" id="x_WifeCell" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_add->WifeCell->getPlaceHolder()) ?>" value="<?php echo $ivf_add->WifeCell->EditValue ?>"<?php echo $ivf_add->WifeCell->editAttributes() ?>>
</span></script>
<?php echo $ivf_add->WifeCell->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_add->HusbandCell->Visible) { // HusbandCell ?>
	<div id="r_HusbandCell" class="form-group row">
		<label id="elh_ivf_HusbandCell" for="x_HusbandCell" class="<?php echo $ivf_add->LeftColumnClass ?>"><script id="tpc_ivf_HusbandCell" type="text/html"><?php echo $ivf_add->HusbandCell->caption() ?><?php echo $ivf_add->HusbandCell->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_add->RightColumnClass ?>"><div <?php echo $ivf_add->HusbandCell->cellAttributes() ?>>
<script id="tpx_ivf_HusbandCell" type="text/html"><span id="el_ivf_HusbandCell">
<input type="text" data-table="ivf" data-field="x_HusbandCell" name="x_HusbandCell" id="x_HusbandCell" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_add->HusbandCell->getPlaceHolder()) ?>" value="<?php echo $ivf_add->HusbandCell->EditValue ?>"<?php echo $ivf_add->HusbandCell->editAttributes() ?>>
</span></script>
<?php echo $ivf_add->HusbandCell->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_add->WifeEmail->Visible) { // WifeEmail ?>
	<div id="r_WifeEmail" class="form-group row">
		<label id="elh_ivf_WifeEmail" for="x_WifeEmail" class="<?php echo $ivf_add->LeftColumnClass ?>"><script id="tpc_ivf_WifeEmail" type="text/html"><?php echo $ivf_add->WifeEmail->caption() ?><?php echo $ivf_add->WifeEmail->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_add->RightColumnClass ?>"><div <?php echo $ivf_add->WifeEmail->cellAttributes() ?>>
<script id="tpx_ivf_WifeEmail" type="text/html"><span id="el_ivf_WifeEmail">
<input type="text" data-table="ivf" data-field="x_WifeEmail" name="x_WifeEmail" id="x_WifeEmail" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_add->WifeEmail->getPlaceHolder()) ?>" value="<?php echo $ivf_add->WifeEmail->EditValue ?>"<?php echo $ivf_add->WifeEmail->editAttributes() ?>>
</span></script>
<?php echo $ivf_add->WifeEmail->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_add->HusbandEmail->Visible) { // HusbandEmail ?>
	<div id="r_HusbandEmail" class="form-group row">
		<label id="elh_ivf_HusbandEmail" for="x_HusbandEmail" class="<?php echo $ivf_add->LeftColumnClass ?>"><script id="tpc_ivf_HusbandEmail" type="text/html"><?php echo $ivf_add->HusbandEmail->caption() ?><?php echo $ivf_add->HusbandEmail->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_add->RightColumnClass ?>"><div <?php echo $ivf_add->HusbandEmail->cellAttributes() ?>>
<script id="tpx_ivf_HusbandEmail" type="text/html"><span id="el_ivf_HusbandEmail">
<input type="text" data-table="ivf" data-field="x_HusbandEmail" name="x_HusbandEmail" id="x_HusbandEmail" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_add->HusbandEmail->getPlaceHolder()) ?>" value="<?php echo $ivf_add->HusbandEmail->EditValue ?>"<?php echo $ivf_add->HusbandEmail->editAttributes() ?>>
</span></script>
<?php echo $ivf_add->HusbandEmail->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_add->ARTCYCLE->Visible) { // ARTCYCLE ?>
	<div id="r_ARTCYCLE" class="form-group row">
		<label id="elh_ivf_ARTCYCLE" for="x_ARTCYCLE" class="<?php echo $ivf_add->LeftColumnClass ?>"><script id="tpc_ivf_ARTCYCLE" type="text/html"><?php echo $ivf_add->ARTCYCLE->caption() ?><?php echo $ivf_add->ARTCYCLE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_add->RightColumnClass ?>"><div <?php echo $ivf_add->ARTCYCLE->cellAttributes() ?>>
<script id="tpx_ivf_ARTCYCLE" type="text/html"><span id="el_ivf_ARTCYCLE">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf" data-field="x_ARTCYCLE" data-value-separator="<?php echo $ivf_add->ARTCYCLE->displayValueSeparatorAttribute() ?>" id="x_ARTCYCLE" name="x_ARTCYCLE"<?php echo $ivf_add->ARTCYCLE->editAttributes() ?>>
			<?php echo $ivf_add->ARTCYCLE->selectOptionListHtml("x_ARTCYCLE") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_add->ARTCYCLE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_add->RESULT->Visible) { // RESULT ?>
	<div id="r_RESULT" class="form-group row">
		<label id="elh_ivf_RESULT" for="x_RESULT" class="<?php echo $ivf_add->LeftColumnClass ?>"><script id="tpc_ivf_RESULT" type="text/html"><?php echo $ivf_add->RESULT->caption() ?><?php echo $ivf_add->RESULT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_add->RightColumnClass ?>"><div <?php echo $ivf_add->RESULT->cellAttributes() ?>>
<script id="tpx_ivf_RESULT" type="text/html"><span id="el_ivf_RESULT">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf" data-field="x_RESULT" data-value-separator="<?php echo $ivf_add->RESULT->displayValueSeparatorAttribute() ?>" id="x_RESULT" name="x_RESULT"<?php echo $ivf_add->RESULT->editAttributes() ?>>
			<?php echo $ivf_add->RESULT->selectOptionListHtml("x_RESULT") ?>
		</select>
</div>
</span></script>
<?php echo $ivf_add->RESULT->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_add->malepic->Visible) { // malepic ?>
	<div id="r_malepic" class="form-group row">
		<label id="elh_ivf_malepic" for="x_malepic" class="<?php echo $ivf_add->LeftColumnClass ?>"><script id="tpc_ivf_malepic" type="text/html"><?php echo $ivf_add->malepic->caption() ?><?php echo $ivf_add->malepic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_add->RightColumnClass ?>"><div <?php echo $ivf_add->malepic->cellAttributes() ?>>
<script id="tpx_ivf_malepic" type="text/html"><span id="el_ivf_malepic">
<textarea data-table="ivf" data-field="x_malepic" name="x_malepic" id="x_malepic" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_add->malepic->getPlaceHolder()) ?>"<?php echo $ivf_add->malepic->editAttributes() ?>><?php echo $ivf_add->malepic->EditValue ?></textarea>
</span></script>
<?php echo $ivf_add->malepic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_add->femalepic->Visible) { // femalepic ?>
	<div id="r_femalepic" class="form-group row">
		<label id="elh_ivf_femalepic" for="x_femalepic" class="<?php echo $ivf_add->LeftColumnClass ?>"><script id="tpc_ivf_femalepic" type="text/html"><?php echo $ivf_add->femalepic->caption() ?><?php echo $ivf_add->femalepic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_add->RightColumnClass ?>"><div <?php echo $ivf_add->femalepic->cellAttributes() ?>>
<script id="tpx_ivf_femalepic" type="text/html"><span id="el_ivf_femalepic">
<textarea data-table="ivf" data-field="x_femalepic" name="x_femalepic" id="x_femalepic" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_add->femalepic->getPlaceHolder()) ?>"<?php echo $ivf_add->femalepic->editAttributes() ?>><?php echo $ivf_add->femalepic->EditValue ?></textarea>
</span></script>
<?php echo $ivf_add->femalepic->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_add->Mgendar->Visible) { // Mgendar ?>
	<div id="r_Mgendar" class="form-group row">
		<label id="elh_ivf_Mgendar" for="x_Mgendar" class="<?php echo $ivf_add->LeftColumnClass ?>"><script id="tpc_ivf_Mgendar" type="text/html"><?php echo $ivf_add->Mgendar->caption() ?><?php echo $ivf_add->Mgendar->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_add->RightColumnClass ?>"><div <?php echo $ivf_add->Mgendar->cellAttributes() ?>>
<script id="tpx_ivf_Mgendar" type="text/html"><span id="el_ivf_Mgendar">
<textarea data-table="ivf" data-field="x_Mgendar" name="x_Mgendar" id="x_Mgendar" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_add->Mgendar->getPlaceHolder()) ?>"<?php echo $ivf_add->Mgendar->editAttributes() ?>><?php echo $ivf_add->Mgendar->EditValue ?></textarea>
</span></script>
<?php echo $ivf_add->Mgendar->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_add->Fgendar->Visible) { // Fgendar ?>
	<div id="r_Fgendar" class="form-group row">
		<label id="elh_ivf_Fgendar" for="x_Fgendar" class="<?php echo $ivf_add->LeftColumnClass ?>"><script id="tpc_ivf_Fgendar" type="text/html"><?php echo $ivf_add->Fgendar->caption() ?><?php echo $ivf_add->Fgendar->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_add->RightColumnClass ?>"><div <?php echo $ivf_add->Fgendar->cellAttributes() ?>>
<script id="tpx_ivf_Fgendar" type="text/html"><span id="el_ivf_Fgendar">
<textarea data-table="ivf" data-field="x_Fgendar" name="x_Fgendar" id="x_Fgendar" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_add->Fgendar->getPlaceHolder()) ?>"<?php echo $ivf_add->Fgendar->editAttributes() ?>><?php echo $ivf_add->Fgendar->EditValue ?></textarea>
</span></script>
<?php echo $ivf_add->Fgendar->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_add->CoupleID->Visible) { // CoupleID ?>
	<div id="r_CoupleID" class="form-group row">
		<label id="elh_ivf_CoupleID" for="x_CoupleID" class="<?php echo $ivf_add->LeftColumnClass ?>"><script id="tpc_ivf_CoupleID" type="text/html"><?php echo $ivf_add->CoupleID->caption() ?><?php echo $ivf_add->CoupleID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_add->RightColumnClass ?>"><div <?php echo $ivf_add->CoupleID->cellAttributes() ?>>
<script id="tpx_ivf_CoupleID" type="text/html"><span id="el_ivf_CoupleID">
<input type="text" data-table="ivf" data-field="x_CoupleID" name="x_CoupleID" id="x_CoupleID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_add->CoupleID->getPlaceHolder()) ?>" value="<?php echo $ivf_add->CoupleID->EditValue ?>"<?php echo $ivf_add->CoupleID->editAttributes() ?>>
</span></script>
<?php echo $ivf_add->CoupleID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_add->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label id="elh_ivf_PatientName" for="x_PatientName" class="<?php echo $ivf_add->LeftColumnClass ?>"><script id="tpc_ivf_PatientName" type="text/html"><?php echo $ivf_add->PatientName->caption() ?><?php echo $ivf_add->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_add->RightColumnClass ?>"><div <?php echo $ivf_add->PatientName->cellAttributes() ?>>
<script id="tpx_ivf_PatientName" type="text/html"><span id="el_ivf_PatientName">
<input type="text" data-table="ivf" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_add->PatientName->getPlaceHolder()) ?>" value="<?php echo $ivf_add->PatientName->EditValue ?>"<?php echo $ivf_add->PatientName->editAttributes() ?>>
</span></script>
<?php echo $ivf_add->PatientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_add->PatientID->Visible) { // PatientID ?>
	<div id="r_PatientID" class="form-group row">
		<label id="elh_ivf_PatientID" for="x_PatientID" class="<?php echo $ivf_add->LeftColumnClass ?>"><script id="tpc_ivf_PatientID" type="text/html"><?php echo $ivf_add->PatientID->caption() ?><?php echo $ivf_add->PatientID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_add->RightColumnClass ?>"><div <?php echo $ivf_add->PatientID->cellAttributes() ?>>
<script id="tpx_ivf_PatientID" type="text/html"><span id="el_ivf_PatientID">
<input type="text" data-table="ivf" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_add->PatientID->getPlaceHolder()) ?>" value="<?php echo $ivf_add->PatientID->EditValue ?>"<?php echo $ivf_add->PatientID->editAttributes() ?>>
</span></script>
<?php echo $ivf_add->PatientID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_add->PartnerName->Visible) { // PartnerName ?>
	<div id="r_PartnerName" class="form-group row">
		<label id="elh_ivf_PartnerName" for="x_PartnerName" class="<?php echo $ivf_add->LeftColumnClass ?>"><script id="tpc_ivf_PartnerName" type="text/html"><?php echo $ivf_add->PartnerName->caption() ?><?php echo $ivf_add->PartnerName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_add->RightColumnClass ?>"><div <?php echo $ivf_add->PartnerName->cellAttributes() ?>>
<script id="tpx_ivf_PartnerName" type="text/html"><span id="el_ivf_PartnerName">
<input type="text" data-table="ivf" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_add->PartnerName->getPlaceHolder()) ?>" value="<?php echo $ivf_add->PartnerName->EditValue ?>"<?php echo $ivf_add->PartnerName->editAttributes() ?>>
</span></script>
<?php echo $ivf_add->PartnerName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_add->PartnerID->Visible) { // PartnerID ?>
	<div id="r_PartnerID" class="form-group row">
		<label id="elh_ivf_PartnerID" for="x_PartnerID" class="<?php echo $ivf_add->LeftColumnClass ?>"><script id="tpc_ivf_PartnerID" type="text/html"><?php echo $ivf_add->PartnerID->caption() ?><?php echo $ivf_add->PartnerID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_add->RightColumnClass ?>"><div <?php echo $ivf_add->PartnerID->cellAttributes() ?>>
<script id="tpx_ivf_PartnerID" type="text/html"><span id="el_ivf_PartnerID">
<input type="text" data-table="ivf" data-field="x_PartnerID" name="x_PartnerID" id="x_PartnerID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_add->PartnerID->getPlaceHolder()) ?>" value="<?php echo $ivf_add->PartnerID->EditValue ?>"<?php echo $ivf_add->PartnerID->editAttributes() ?>>
</span></script>
<?php echo $ivf_add->PartnerID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_add->DrID->Visible) { // DrID ?>
	<div id="r_DrID" class="form-group row">
		<label id="elh_ivf_DrID" for="x_DrID" class="<?php echo $ivf_add->LeftColumnClass ?>"><script id="tpc_ivf_DrID" type="text/html"><?php echo $ivf_add->DrID->caption() ?><?php echo $ivf_add->DrID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_add->RightColumnClass ?>"><div <?php echo $ivf_add->DrID->cellAttributes() ?>>
<script id="tpx_ivf_DrID" type="text/html"><span id="el_ivf_DrID">
<?php $ivf_add->DrID->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_DrID"><?php echo EmptyValue(strval($ivf_add->DrID->ViewValue)) ? $Language->phrase("PleaseSelect") : $ivf_add->DrID->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($ivf_add->DrID->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($ivf_add->DrID->ReadOnly || $ivf_add->DrID->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_DrID',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $ivf_add->DrID->Lookup->getParamTag($ivf_add, "p_x_DrID") ?>
<input type="hidden" data-table="ivf" data-field="x_DrID" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $ivf_add->DrID->displayValueSeparatorAttribute() ?>" name="x_DrID" id="x_DrID" value="<?php echo $ivf_add->DrID->CurrentValue ?>"<?php echo $ivf_add->DrID->editAttributes() ?>>
</span></script>
<?php echo $ivf_add->DrID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_add->DrDepartment->Visible) { // DrDepartment ?>
	<div id="r_DrDepartment" class="form-group row">
		<label id="elh_ivf_DrDepartment" for="x_DrDepartment" class="<?php echo $ivf_add->LeftColumnClass ?>"><script id="tpc_ivf_DrDepartment" type="text/html"><?php echo $ivf_add->DrDepartment->caption() ?><?php echo $ivf_add->DrDepartment->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_add->RightColumnClass ?>"><div <?php echo $ivf_add->DrDepartment->cellAttributes() ?>>
<script id="tpx_ivf_DrDepartment" type="text/html"><span id="el_ivf_DrDepartment">
<input type="text" data-table="ivf" data-field="x_DrDepartment" name="x_DrDepartment" id="x_DrDepartment" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_add->DrDepartment->getPlaceHolder()) ?>" value="<?php echo $ivf_add->DrDepartment->EditValue ?>"<?php echo $ivf_add->DrDepartment->editAttributes() ?>>
</span></script>
<?php echo $ivf_add->DrDepartment->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($ivf_add->Doctor->Visible) { // Doctor ?>
	<div id="r_Doctor" class="form-group row">
		<label id="elh_ivf_Doctor" for="x_Doctor" class="<?php echo $ivf_add->LeftColumnClass ?>"><script id="tpc_ivf_Doctor" type="text/html"><?php echo $ivf_add->Doctor->caption() ?><?php echo $ivf_add->Doctor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $ivf_add->RightColumnClass ?>"><div <?php echo $ivf_add->Doctor->cellAttributes() ?>>
<script id="tpx_ivf_Doctor" type="text/html"><span id="el_ivf_Doctor">
<input type="text" data-table="ivf" data-field="x_Doctor" name="x_Doctor" id="x_Doctor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_add->Doctor->getPlaceHolder()) ?>" value="<?php echo $ivf_add->Doctor->EditValue ?>"<?php echo $ivf_add->Doctor->editAttributes() ?>>
</span></script>
<?php echo $ivf_add->Doctor->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_ivfadd" class="ew-custom-template"></div>
<script id="tpm_ivfadd" type="text/html">
<div id="ct_ivf_add"><style>
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
				   <div class="ew-row" style="display: none;">
				   {{include tmpl="#tpc_ivf_malepic"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_malepic")/}}
				   {{include tmpl="#tpc_ivf_Mgendar"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_Mgendar")/}}
				   {{include tmpl="#tpc_ivf_PartnerName"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_PartnerName")/}}
				   {{include tmpl="#tpc_ivf_PartnerID"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_PartnerID")/}}
				   {{include tmpl="#tpc_ivf_WifeCell"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_WifeCell")/}}
					<span class="ew-cell">{{include tmpl="#tpc_ivf_malepropic"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_malepropic")/}}</span>
				  </div>
				   <div class="ew-row" style="display: none;">
				   {{include tmpl="#tpc_ivf_femalepic"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_femalepic")/}}
				   {{include tmpl="#tpc_ivf_Fgendar"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_Fgendar")/}}
				   {{include tmpl="#tpc_ivf_PatientName"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_PatientName")/}}
				   {{include tmpl="#tpc_ivf_PatientID"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_PatientID")/}}
				   {{include tmpl="#tpc_ivf_HusbandCell"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_HusbandCell")/}}
					<span class="ew-cell">{{include tmpl="#tpc_ivf_femalepropic"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_femalepropic")/}}</span>
				  </div>
<div class="row">
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Patient</h3>
			</div>
			<div class="card-body card-widget widget-user">
				 <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_Female"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_Female")/}}</span>
				  </div>
			<div class="widget-user-image">
			   		<img style="display: none;" id="femaleprofilePicturePatient" class="img-circle elevation-2" src='<?php echo "uploads/".$results2[0]["profilePic"]; ?>' alt="User Avatar"> 
			  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_WifeEducation"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_WifeEducation")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_WifeWorkHours"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_WifeWorkHours")/}}</span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Partner</h3>
			</div>
			<div class="card-body card-widget widget-user">
				<div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_Male"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_Male")/}}</span>
				  </div>
			<div class="widget-user-image">
			   		<img style="display: none;" id="maleprofilePicturePatient" class="img-circle elevation-2" src="/uploads/hims/profile-picture.png" alt="User Avatar"> 
			  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_HusbandEducation"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_HusbandEducation")/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_HusbandWorkHours"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_HusbandWorkHours")/}}</span>
				  </div>
				  			  <!-- /.card-body -->
			</div>
		</div>				
	</div>
</div>
<table class="ew-table">
	 <tbody>
		 <tr>
		 	<td>{{include tmpl="#tpc_ivf_DrID"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_DrID")/}}</td>
			<td>{{include tmpl="#tpc_ivf_Doctor"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_Doctor")/}}</td>
			<td>{{include tmpl="#tpc_ivf_DrDepartment"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_DrDepartment")/}}</td>
		</tr>
	  </tbody>
</table>
<div class="row">
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Refered By</h3>
			</div>
			<div class="card-body">
 <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_PatientLanguage"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_PatientLanguage")/}}</span>
					<span class="ew-cell">{{include tmpl="#tpc_ivf_ReferedBy"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_ReferedBy")/}}</span>
					<span class="ew-cell">{{include tmpl="#tpc_ivf_ReferPhNo"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_ReferPhNo")/}}</span>
</div>
	</div>
		</div>
	</div>
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title"></h3>
			</div>
			<div class="card-body">
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_status"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_status")/}}</span>
				  </div>
	</div>
		</div>				
	</div>
</div>
</div>
</script>

<?php
	if (in_array("ivf_treatment_plan", explode(",", $ivf->getCurrentDetailTable())) && $ivf_treatment_plan->DetailAdd) {
?>
<?php if ($ivf->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("ivf_treatment_plan", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "ivf_treatment_plangrid.php" ?>
<?php } ?>
<?php if (!$ivf_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $ivf_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $ivf_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($ivf->Rows) ?> };
	ew.applyTemplate("tpd_ivfadd", "tpm_ivfadd", "ivfadd", "<?php echo $ivf->CustomExport ?>", ew.templateData.rows[0]);
	$("script.ivfadd_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$ivf_add->showPageFooter();
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
$ivf_add->terminate();
?>