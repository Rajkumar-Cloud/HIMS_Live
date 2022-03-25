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
$patient_room_add = new patient_room_add();

// Run the page
$patient_room_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_room_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fpatient_roomadd = currentForm = new ew.Form("fpatient_roomadd", "add");

// Validate form
fpatient_roomadd.validate = function() {
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
		<?php if ($patient_room_add->Reception->Required) { ?>
			elm = this.getElements("x" + infix + "_Reception");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room->Reception->caption(), $patient_room->Reception->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_room_add->PatientId->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room->PatientId->caption(), $patient_room->PatientId->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PatientId");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_room->PatientId->errorMessage()) ?>");
		<?php if ($patient_room_add->mrnno->Required) { ?>
			elm = this.getElements("x" + infix + "_mrnno");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room->mrnno->caption(), $patient_room->mrnno->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_room_add->PatientName->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room->PatientName->caption(), $patient_room->PatientName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_room_add->Gender->Required) { ?>
			elm = this.getElements("x" + infix + "_Gender");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room->Gender->caption(), $patient_room->Gender->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_room_add->RoomID->Required) { ?>
			elm = this.getElements("x" + infix + "_RoomID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room->RoomID->caption(), $patient_room->RoomID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_room_add->RoomNo->Required) { ?>
			elm = this.getElements("x" + infix + "_RoomNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room->RoomNo->caption(), $patient_room->RoomNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_room_add->RoomType->Required) { ?>
			elm = this.getElements("x" + infix + "_RoomType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room->RoomType->caption(), $patient_room->RoomType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_room_add->SharingRoom->Required) { ?>
			elm = this.getElements("x" + infix + "_SharingRoom");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room->SharingRoom->caption(), $patient_room->SharingRoom->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_room_add->Amount->Required) { ?>
			elm = this.getElements("x" + infix + "_Amount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room->Amount->caption(), $patient_room->Amount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Amount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_room->Amount->errorMessage()) ?>");
		<?php if ($patient_room_add->Startdatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_Startdatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room->Startdatetime->caption(), $patient_room->Startdatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Startdatetime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_room->Startdatetime->errorMessage()) ?>");
		<?php if ($patient_room_add->Enddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_Enddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room->Enddatetime->caption(), $patient_room->Enddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Enddatetime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_room->Enddatetime->errorMessage()) ?>");
		<?php if ($patient_room_add->DaysHours->Required) { ?>
			elm = this.getElements("x" + infix + "_DaysHours");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room->DaysHours->caption(), $patient_room->DaysHours->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_room_add->Days->Required) { ?>
			elm = this.getElements("x" + infix + "_Days");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room->Days->caption(), $patient_room->Days->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Days");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_room->Days->errorMessage()) ?>");
		<?php if ($patient_room_add->Hours->Required) { ?>
			elm = this.getElements("x" + infix + "_Hours");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room->Hours->caption(), $patient_room->Hours->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Hours");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_room->Hours->errorMessage()) ?>");
		<?php if ($patient_room_add->TotalAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_TotalAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room->TotalAmount->caption(), $patient_room->TotalAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TotalAmount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_room->TotalAmount->errorMessage()) ?>");
		<?php if ($patient_room_add->PatID->Required) { ?>
			elm = this.getElements("x" + infix + "_PatID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room->PatID->caption(), $patient_room->PatID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_room_add->MobileNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_MobileNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room->MobileNumber->caption(), $patient_room->MobileNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_room_add->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room->HospID->caption(), $patient_room->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_room_add->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room->status->caption(), $patient_room->status->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_room->status->errorMessage()) ?>");
		<?php if ($patient_room_add->createdby->Required) { ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room->createdby->caption(), $patient_room->createdby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_room_add->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room->createddatetime->caption(), $patient_room->createddatetime->RequiredErrorMessage)) ?>");
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
fpatient_roomadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_roomadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatient_roomadd.lists["x_Reception"] = <?php echo $patient_room_add->Reception->Lookup->toClientList() ?>;
fpatient_roomadd.lists["x_Reception"].options = <?php echo JsonEncode($patient_room_add->Reception->lookupOptions()) ?>;
fpatient_roomadd.lists["x_RoomID"] = <?php echo $patient_room_add->RoomID->Lookup->toClientList() ?>;
fpatient_roomadd.lists["x_RoomID"].options = <?php echo JsonEncode($patient_room_add->RoomID->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $patient_room_add->showPageHeader(); ?>
<?php
$patient_room_add->showMessage();
?>
<form name="fpatient_roomadd" id="fpatient_roomadd" class="<?php echo $patient_room_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_room_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_room_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_room">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$patient_room_add->IsModal ?>">
<?php if ($patient_room->getCurrentMasterTable() == "ip_admission") { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="ip_admission">
<input type="hidden" name="fk_id" value="<?php echo $patient_room->Reception->getSessionValue() ?>">
<input type="hidden" name="fk_mrnNo" value="<?php echo $patient_room->mrnno->getSessionValue() ?>">
<input type="hidden" name="fk_patient_id" value="<?php echo $patient_room->PatID->getSessionValue() ?>">
<?php } ?>
<div class="ew-add-div d-none"><!-- page* -->
<?php if ($patient_room->Reception->Visible) { // Reception ?>
	<div id="r_Reception" class="form-group row">
		<label id="elh_patient_room_Reception" for="x_Reception" class="<?php echo $patient_room_add->LeftColumnClass ?>"><script id="tpc_patient_room_Reception" class="patient_roomadd" type="text/html"><span><?php echo $patient_room->Reception->caption() ?><?php echo ($patient_room->Reception->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_room_add->RightColumnClass ?>"><div<?php echo $patient_room->Reception->cellAttributes() ?>>
<?php if ($patient_room->Reception->getSessionValue() <> "") { ?>
<script id="tpx_patient_room_Reception" class="patient_roomadd" type="text/html">
<span id="el_patient_room_Reception">
<span<?php echo $patient_room->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_room->Reception->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" id="x_Reception" name="x_Reception" value="<?php echo HtmlEncode($patient_room->Reception->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx_patient_room_Reception" class="patient_roomadd" type="text/html">
<span id="el_patient_room_Reception">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Reception"><?php echo strval($patient_room->Reception->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($patient_room->Reception->ViewValue) : $patient_room->Reception->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_room->Reception->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($patient_room->Reception->ReadOnly || $patient_room->Reception->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_Reception',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $patient_room->Reception->Lookup->getParamTag("p_x_Reception") ?>
<input type="hidden" data-table="patient_room" data-field="x_Reception" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_room->Reception->displayValueSeparatorAttribute() ?>" name="x_Reception" id="x_Reception" value="<?php echo $patient_room->Reception->CurrentValue ?>"<?php echo $patient_room->Reception->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php echo $patient_room->Reception->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_room->PatientId->Visible) { // PatientId ?>
	<div id="r_PatientId" class="form-group row">
		<label id="elh_patient_room_PatientId" for="x_PatientId" class="<?php echo $patient_room_add->LeftColumnClass ?>"><script id="tpc_patient_room_PatientId" class="patient_roomadd" type="text/html"><span><?php echo $patient_room->PatientId->caption() ?><?php echo ($patient_room->PatientId->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_room_add->RightColumnClass ?>"><div<?php echo $patient_room->PatientId->cellAttributes() ?>>
<script id="tpx_patient_room_PatientId" class="patient_roomadd" type="text/html">
<span id="el_patient_room_PatientId">
<input type="text" data-table="patient_room" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" placeholder="<?php echo HtmlEncode($patient_room->PatientId->getPlaceHolder()) ?>" value="<?php echo $patient_room->PatientId->EditValue ?>"<?php echo $patient_room->PatientId->editAttributes() ?>>
</span>
</script>
<?php echo $patient_room->PatientId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_room->mrnno->Visible) { // mrnno ?>
	<div id="r_mrnno" class="form-group row">
		<label id="elh_patient_room_mrnno" for="x_mrnno" class="<?php echo $patient_room_add->LeftColumnClass ?>"><script id="tpc_patient_room_mrnno" class="patient_roomadd" type="text/html"><span><?php echo $patient_room->mrnno->caption() ?><?php echo ($patient_room->mrnno->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_room_add->RightColumnClass ?>"><div<?php echo $patient_room->mrnno->cellAttributes() ?>>
<?php if ($patient_room->mrnno->getSessionValue() <> "") { ?>
<script id="tpx_patient_room_mrnno" class="patient_roomadd" type="text/html">
<span id="el_patient_room_mrnno">
<span<?php echo $patient_room->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_room->mrnno->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" id="x_mrnno" name="x_mrnno" value="<?php echo HtmlEncode($patient_room->mrnno->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx_patient_room_mrnno" class="patient_roomadd" type="text/html">
<span id="el_patient_room_mrnno">
<input type="text" data-table="patient_room" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_room->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_room->mrnno->EditValue ?>"<?php echo $patient_room->mrnno->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php echo $patient_room->mrnno->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_room->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label id="elh_patient_room_PatientName" for="x_PatientName" class="<?php echo $patient_room_add->LeftColumnClass ?>"><script id="tpc_patient_room_PatientName" class="patient_roomadd" type="text/html"><span><?php echo $patient_room->PatientName->caption() ?><?php echo ($patient_room->PatientName->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_room_add->RightColumnClass ?>"><div<?php echo $patient_room->PatientName->cellAttributes() ?>>
<script id="tpx_patient_room_PatientName" class="patient_roomadd" type="text/html">
<span id="el_patient_room_PatientName">
<input type="text" data-table="patient_room" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_room->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_room->PatientName->EditValue ?>"<?php echo $patient_room->PatientName->editAttributes() ?>>
</span>
</script>
<?php echo $patient_room->PatientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_room->Gender->Visible) { // Gender ?>
	<div id="r_Gender" class="form-group row">
		<label id="elh_patient_room_Gender" for="x_Gender" class="<?php echo $patient_room_add->LeftColumnClass ?>"><script id="tpc_patient_room_Gender" class="patient_roomadd" type="text/html"><span><?php echo $patient_room->Gender->caption() ?><?php echo ($patient_room->Gender->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_room_add->RightColumnClass ?>"><div<?php echo $patient_room->Gender->cellAttributes() ?>>
<script id="tpx_patient_room_Gender" class="patient_roomadd" type="text/html">
<span id="el_patient_room_Gender">
<input type="text" data-table="patient_room" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_room->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_room->Gender->EditValue ?>"<?php echo $patient_room->Gender->editAttributes() ?>>
</span>
</script>
<?php echo $patient_room->Gender->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_room->RoomID->Visible) { // RoomID ?>
	<div id="r_RoomID" class="form-group row">
		<label id="elh_patient_room_RoomID" for="x_RoomID" class="<?php echo $patient_room_add->LeftColumnClass ?>"><script id="tpc_patient_room_RoomID" class="patient_roomadd" type="text/html"><span><?php echo $patient_room->RoomID->caption() ?><?php echo ($patient_room->RoomID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_room_add->RightColumnClass ?>"><div<?php echo $patient_room->RoomID->cellAttributes() ?>>
<script id="tpx_patient_room_RoomID" class="patient_roomadd" type="text/html">
<span id="el_patient_room_RoomID">
<?php $patient_room->RoomID->EditAttrs["onchange"] = "ew.autoFill(this);" . @$patient_room->RoomID->EditAttrs["onchange"]; ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_RoomID"><?php echo strval($patient_room->RoomID->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($patient_room->RoomID->ViewValue) : $patient_room->RoomID->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_room->RoomID->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($patient_room->RoomID->ReadOnly || $patient_room->RoomID->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x_RoomID',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $patient_room->RoomID->Lookup->getParamTag("p_x_RoomID") ?>
<input type="hidden" data-table="patient_room" data-field="x_RoomID" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_room->RoomID->displayValueSeparatorAttribute() ?>" name="x_RoomID" id="x_RoomID" value="<?php echo $patient_room->RoomID->CurrentValue ?>"<?php echo $patient_room->RoomID->editAttributes() ?>>
</span>
</script>
<?php echo $patient_room->RoomID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_room->RoomNo->Visible) { // RoomNo ?>
	<div id="r_RoomNo" class="form-group row">
		<label id="elh_patient_room_RoomNo" for="x_RoomNo" class="<?php echo $patient_room_add->LeftColumnClass ?>"><script id="tpc_patient_room_RoomNo" class="patient_roomadd" type="text/html"><span><?php echo $patient_room->RoomNo->caption() ?><?php echo ($patient_room->RoomNo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_room_add->RightColumnClass ?>"><div<?php echo $patient_room->RoomNo->cellAttributes() ?>>
<script id="tpx_patient_room_RoomNo" class="patient_roomadd" type="text/html">
<span id="el_patient_room_RoomNo">
<input type="text" data-table="patient_room" data-field="x_RoomNo" name="x_RoomNo" id="x_RoomNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_room->RoomNo->getPlaceHolder()) ?>" value="<?php echo $patient_room->RoomNo->EditValue ?>"<?php echo $patient_room->RoomNo->editAttributes() ?>>
</span>
</script>
<?php echo $patient_room->RoomNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_room->RoomType->Visible) { // RoomType ?>
	<div id="r_RoomType" class="form-group row">
		<label id="elh_patient_room_RoomType" for="x_RoomType" class="<?php echo $patient_room_add->LeftColumnClass ?>"><script id="tpc_patient_room_RoomType" class="patient_roomadd" type="text/html"><span><?php echo $patient_room->RoomType->caption() ?><?php echo ($patient_room->RoomType->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_room_add->RightColumnClass ?>"><div<?php echo $patient_room->RoomType->cellAttributes() ?>>
<script id="tpx_patient_room_RoomType" class="patient_roomadd" type="text/html">
<span id="el_patient_room_RoomType">
<input type="text" data-table="patient_room" data-field="x_RoomType" name="x_RoomType" id="x_RoomType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_room->RoomType->getPlaceHolder()) ?>" value="<?php echo $patient_room->RoomType->EditValue ?>"<?php echo $patient_room->RoomType->editAttributes() ?>>
</span>
</script>
<?php echo $patient_room->RoomType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_room->SharingRoom->Visible) { // SharingRoom ?>
	<div id="r_SharingRoom" class="form-group row">
		<label id="elh_patient_room_SharingRoom" for="x_SharingRoom" class="<?php echo $patient_room_add->LeftColumnClass ?>"><script id="tpc_patient_room_SharingRoom" class="patient_roomadd" type="text/html"><span><?php echo $patient_room->SharingRoom->caption() ?><?php echo ($patient_room->SharingRoom->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_room_add->RightColumnClass ?>"><div<?php echo $patient_room->SharingRoom->cellAttributes() ?>>
<script id="tpx_patient_room_SharingRoom" class="patient_roomadd" type="text/html">
<span id="el_patient_room_SharingRoom">
<input type="text" data-table="patient_room" data-field="x_SharingRoom" name="x_SharingRoom" id="x_SharingRoom" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_room->SharingRoom->getPlaceHolder()) ?>" value="<?php echo $patient_room->SharingRoom->EditValue ?>"<?php echo $patient_room->SharingRoom->editAttributes() ?>>
</span>
</script>
<?php echo $patient_room->SharingRoom->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_room->Amount->Visible) { // Amount ?>
	<div id="r_Amount" class="form-group row">
		<label id="elh_patient_room_Amount" for="x_Amount" class="<?php echo $patient_room_add->LeftColumnClass ?>"><script id="tpc_patient_room_Amount" class="patient_roomadd" type="text/html"><span><?php echo $patient_room->Amount->caption() ?><?php echo ($patient_room->Amount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_room_add->RightColumnClass ?>"><div<?php echo $patient_room->Amount->cellAttributes() ?>>
<script id="tpx_patient_room_Amount" class="patient_roomadd" type="text/html">
<span id="el_patient_room_Amount">
<input type="text" data-table="patient_room" data-field="x_Amount" name="x_Amount" id="x_Amount" size="30" placeholder="<?php echo HtmlEncode($patient_room->Amount->getPlaceHolder()) ?>" value="<?php echo $patient_room->Amount->EditValue ?>"<?php echo $patient_room->Amount->editAttributes() ?>>
</span>
</script>
<?php echo $patient_room->Amount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_room->Startdatetime->Visible) { // Startdatetime ?>
	<div id="r_Startdatetime" class="form-group row">
		<label id="elh_patient_room_Startdatetime" for="x_Startdatetime" class="<?php echo $patient_room_add->LeftColumnClass ?>"><script id="tpc_patient_room_Startdatetime" class="patient_roomadd" type="text/html"><span><?php echo $patient_room->Startdatetime->caption() ?><?php echo ($patient_room->Startdatetime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_room_add->RightColumnClass ?>"><div<?php echo $patient_room->Startdatetime->cellAttributes() ?>>
<script id="tpx_patient_room_Startdatetime" class="patient_roomadd" type="text/html">
<span id="el_patient_room_Startdatetime">
<input type="text" data-table="patient_room" data-field="x_Startdatetime" name="x_Startdatetime" id="x_Startdatetime" placeholder="<?php echo HtmlEncode($patient_room->Startdatetime->getPlaceHolder()) ?>" value="<?php echo $patient_room->Startdatetime->EditValue ?>"<?php echo $patient_room->Startdatetime->editAttributes() ?>>
<?php if (!$patient_room->Startdatetime->ReadOnly && !$patient_room->Startdatetime->Disabled && !isset($patient_room->Startdatetime->EditAttrs["readonly"]) && !isset($patient_room->Startdatetime->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_roomadd_js">
ew.createDateTimePicker("fpatient_roomadd", "x_Startdatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php echo $patient_room->Startdatetime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_room->Enddatetime->Visible) { // Enddatetime ?>
	<div id="r_Enddatetime" class="form-group row">
		<label id="elh_patient_room_Enddatetime" for="x_Enddatetime" class="<?php echo $patient_room_add->LeftColumnClass ?>"><script id="tpc_patient_room_Enddatetime" class="patient_roomadd" type="text/html"><span><?php echo $patient_room->Enddatetime->caption() ?><?php echo ($patient_room->Enddatetime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_room_add->RightColumnClass ?>"><div<?php echo $patient_room->Enddatetime->cellAttributes() ?>>
<script id="tpx_patient_room_Enddatetime" class="patient_roomadd" type="text/html">
<span id="el_patient_room_Enddatetime">
<input type="text" data-table="patient_room" data-field="x_Enddatetime" name="x_Enddatetime" id="x_Enddatetime" placeholder="<?php echo HtmlEncode($patient_room->Enddatetime->getPlaceHolder()) ?>" value="<?php echo $patient_room->Enddatetime->EditValue ?>"<?php echo $patient_room->Enddatetime->editAttributes() ?>>
<?php if (!$patient_room->Enddatetime->ReadOnly && !$patient_room->Enddatetime->Disabled && !isset($patient_room->Enddatetime->EditAttrs["readonly"]) && !isset($patient_room->Enddatetime->EditAttrs["disabled"])) { ?>
<?php } ?>
</span>
</script>
<script type="text/html" class="patient_roomadd_js">
ew.createDateTimePicker("fpatient_roomadd", "x_Enddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php echo $patient_room->Enddatetime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_room->DaysHours->Visible) { // DaysHours ?>
	<div id="r_DaysHours" class="form-group row">
		<label id="elh_patient_room_DaysHours" for="x_DaysHours" class="<?php echo $patient_room_add->LeftColumnClass ?>"><script id="tpc_patient_room_DaysHours" class="patient_roomadd" type="text/html"><span><?php echo $patient_room->DaysHours->caption() ?><?php echo ($patient_room->DaysHours->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_room_add->RightColumnClass ?>"><div<?php echo $patient_room->DaysHours->cellAttributes() ?>>
<script id="tpx_patient_room_DaysHours" class="patient_roomadd" type="text/html">
<span id="el_patient_room_DaysHours">
<input type="text" data-table="patient_room" data-field="x_DaysHours" name="x_DaysHours" id="x_DaysHours" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_room->DaysHours->getPlaceHolder()) ?>" value="<?php echo $patient_room->DaysHours->EditValue ?>"<?php echo $patient_room->DaysHours->editAttributes() ?>>
</span>
</script>
<?php echo $patient_room->DaysHours->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_room->Days->Visible) { // Days ?>
	<div id="r_Days" class="form-group row">
		<label id="elh_patient_room_Days" for="x_Days" class="<?php echo $patient_room_add->LeftColumnClass ?>"><script id="tpc_patient_room_Days" class="patient_roomadd" type="text/html"><span><?php echo $patient_room->Days->caption() ?><?php echo ($patient_room->Days->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_room_add->RightColumnClass ?>"><div<?php echo $patient_room->Days->cellAttributes() ?>>
<script id="tpx_patient_room_Days" class="patient_roomadd" type="text/html">
<span id="el_patient_room_Days">
<input type="text" data-table="patient_room" data-field="x_Days" name="x_Days" id="x_Days" size="30" placeholder="<?php echo HtmlEncode($patient_room->Days->getPlaceHolder()) ?>" value="<?php echo $patient_room->Days->EditValue ?>"<?php echo $patient_room->Days->editAttributes() ?>>
</span>
</script>
<?php echo $patient_room->Days->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_room->Hours->Visible) { // Hours ?>
	<div id="r_Hours" class="form-group row">
		<label id="elh_patient_room_Hours" for="x_Hours" class="<?php echo $patient_room_add->LeftColumnClass ?>"><script id="tpc_patient_room_Hours" class="patient_roomadd" type="text/html"><span><?php echo $patient_room->Hours->caption() ?><?php echo ($patient_room->Hours->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_room_add->RightColumnClass ?>"><div<?php echo $patient_room->Hours->cellAttributes() ?>>
<script id="tpx_patient_room_Hours" class="patient_roomadd" type="text/html">
<span id="el_patient_room_Hours">
<input type="text" data-table="patient_room" data-field="x_Hours" name="x_Hours" id="x_Hours" size="30" placeholder="<?php echo HtmlEncode($patient_room->Hours->getPlaceHolder()) ?>" value="<?php echo $patient_room->Hours->EditValue ?>"<?php echo $patient_room->Hours->editAttributes() ?>>
</span>
</script>
<?php echo $patient_room->Hours->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_room->TotalAmount->Visible) { // TotalAmount ?>
	<div id="r_TotalAmount" class="form-group row">
		<label id="elh_patient_room_TotalAmount" for="x_TotalAmount" class="<?php echo $patient_room_add->LeftColumnClass ?>"><script id="tpc_patient_room_TotalAmount" class="patient_roomadd" type="text/html"><span><?php echo $patient_room->TotalAmount->caption() ?><?php echo ($patient_room->TotalAmount->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_room_add->RightColumnClass ?>"><div<?php echo $patient_room->TotalAmount->cellAttributes() ?>>
<script id="tpx_patient_room_TotalAmount" class="patient_roomadd" type="text/html">
<span id="el_patient_room_TotalAmount">
<input type="text" data-table="patient_room" data-field="x_TotalAmount" name="x_TotalAmount" id="x_TotalAmount" size="30" placeholder="<?php echo HtmlEncode($patient_room->TotalAmount->getPlaceHolder()) ?>" value="<?php echo $patient_room->TotalAmount->EditValue ?>"<?php echo $patient_room->TotalAmount->editAttributes() ?>>
</span>
</script>
<?php echo $patient_room->TotalAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_room->PatID->Visible) { // PatID ?>
	<div id="r_PatID" class="form-group row">
		<label id="elh_patient_room_PatID" for="x_PatID" class="<?php echo $patient_room_add->LeftColumnClass ?>"><script id="tpc_patient_room_PatID" class="patient_roomadd" type="text/html"><span><?php echo $patient_room->PatID->caption() ?><?php echo ($patient_room->PatID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_room_add->RightColumnClass ?>"><div<?php echo $patient_room->PatID->cellAttributes() ?>>
<?php if ($patient_room->PatID->getSessionValue() <> "") { ?>
<script id="tpx_patient_room_PatID" class="patient_roomadd" type="text/html">
<span id="el_patient_room_PatID">
<span<?php echo $patient_room->PatID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_room->PatID->ViewValue) ?>"></span>
</span>
</script>
<input type="hidden" id="x_PatID" name="x_PatID" value="<?php echo HtmlEncode($patient_room->PatID->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx_patient_room_PatID" class="patient_roomadd" type="text/html">
<span id="el_patient_room_PatID">
<input type="text" data-table="patient_room" data-field="x_PatID" name="x_PatID" id="x_PatID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_room->PatID->getPlaceHolder()) ?>" value="<?php echo $patient_room->PatID->EditValue ?>"<?php echo $patient_room->PatID->editAttributes() ?>>
</span>
</script>
<?php } ?>
<?php echo $patient_room->PatID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_room->MobileNumber->Visible) { // MobileNumber ?>
	<div id="r_MobileNumber" class="form-group row">
		<label id="elh_patient_room_MobileNumber" for="x_MobileNumber" class="<?php echo $patient_room_add->LeftColumnClass ?>"><script id="tpc_patient_room_MobileNumber" class="patient_roomadd" type="text/html"><span><?php echo $patient_room->MobileNumber->caption() ?><?php echo ($patient_room->MobileNumber->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_room_add->RightColumnClass ?>"><div<?php echo $patient_room->MobileNumber->cellAttributes() ?>>
<script id="tpx_patient_room_MobileNumber" class="patient_roomadd" type="text/html">
<span id="el_patient_room_MobileNumber">
<input type="text" data-table="patient_room" data-field="x_MobileNumber" name="x_MobileNumber" id="x_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_room->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $patient_room->MobileNumber->EditValue ?>"<?php echo $patient_room->MobileNumber->editAttributes() ?>>
</span>
</script>
<?php echo $patient_room->MobileNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_room->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_patient_room_status" for="x_status" class="<?php echo $patient_room_add->LeftColumnClass ?>"><script id="tpc_patient_room_status" class="patient_roomadd" type="text/html"><span><?php echo $patient_room->status->caption() ?><?php echo ($patient_room->status->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></span></script></label>
		<div class="<?php echo $patient_room_add->RightColumnClass ?>"><div<?php echo $patient_room->status->cellAttributes() ?>>
<script id="tpx_patient_room_status" class="patient_roomadd" type="text/html">
<span id="el_patient_room_status">
<input type="text" data-table="patient_room" data-field="x_status" name="x_status" id="x_status" size="30" placeholder="<?php echo HtmlEncode($patient_room->status->getPlaceHolder()) ?>" value="<?php echo $patient_room->status->EditValue ?>"<?php echo $patient_room->status->editAttributes() ?>>
</span>
</script>
<?php echo $patient_room->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_patient_roomadd" class="ew-custom-template"></div>
<script id="tpm_patient_roomadd" type="text/html">
<div id="ct_patient_room_add"><style>
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
</style>
	<?php
	$fk_id = $_GET["fk_id"] ;
	$fk_patient_id = $_GET["fk_patient_id"] ;
	$fk_mrnNo = $_GET["fk_mrnNo"] ;
	$dbhelper = &DbHelper();
	$Tid = $_GET["fk_patient_id"] ;
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$Tid."'; ";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["profilePic"] == "")
	{
		$PatientProfilePic = "hims\profile-picture.png";
	}else{
		$PatientProfilePic = $results1[0]["profilePic"];
	}
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$Tid."'; ";
	$results1 = $dbhelper->ExecuteRows($sql);
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$Tid."'; ";
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
	?>
{{include tmpl="#tpc_patient_room_Reception"/}}&nbsp;{{include tmpl="#tpx_patient_room_Reception"/}}	
<p id="profilePic" hidden>{{include tmpl="#tpx_profilePic"/}}</p>
<p id="SurfaceArea" hidden>{{include tmpl="#tpx_SurfaceArea"/}}</p>
<p id="BodyMassIndex" hidden>{{include tmpl="#tpx_BodyMassIndex"/}}</p>
<p id="idmrnnokk" hidden>{{include tmpl="#tpc_patient_room_mrnno"/}}&nbsp;{{include tmpl="#tpx_patient_room_mrnno"/}}</p>
<div hidden>
  <p>{{include tmpl="#tpc_patient_room_Reception"/}}&nbsp;{{include tmpl="#tpx_patient_room_Reception"/}}</p> 
  <p>{{include tmpl="#tpc_patient_room_PatientId"/}}&nbsp;{{include tmpl="#tpx_patient_room_PatientId"/}}</p> 
  <p>{{include tmpl="#tpc_patient_room_PatientName"/}}&nbsp;{{include tmpl="#tpx_patient_room_PatientName"/}}</p> 
  <p>{{include tmpl="#tpx_Age"/}}</p> 
  <p>{{include tmpl="#tpc_patient_room_Gender"/}}&nbsp;{{include tmpl="#tpx_patient_room_Gender"/}}</p>
  <p>{{include tmpl="#tpc_patient_room_PatID"/}}&nbsp;{{include tmpl="#tpx_patient_room_PatID"/}}</p>
  <p>{{include tmpl="#tpc_patient_room_MobileNumber"/}}&nbsp;{{include tmpl="#tpx_patient_room_MobileNumber"/}}</p> 
</div>
	<div class="row">
<div id="patientdataview" class="col-md-12">
			<!-- Widget: user widget style 1 -->
			<div class="card card-widget widget-user">
			  <!-- Add the bg color to the header using any of the bg-* classes -->
			  <div class="widget-user-header bg-warning">
			  	<h4 class="widget-user-username"><span id="SemPatientId" class="ew-cell">Patient Id : <?php echo $results2[0]["PatientID"]; ?></span></h4>
				<h4 class="widget-user-username"><span id="SemPatientPatientName" class="ew-cell">Patient Name : <?php echo $results2[0]["first_name"]; ?></span></h4>
				<h6 class="widget-user-desc"><span id="SemPatientGender" class="ew-cell">Gender : <?php echo $results2[0]["gender"]; ?></span></h6>	
				<h6 class="widget-user-desc"><span id="SemPatientBloodGroup" class="ew-cell">Blood Group : <?php echo $results2[0]["blood_group"]; ?></span></h6>
			  </div>
			  <div class="widget-user-image">
			   		<img id="profilePicturePatient"  class="img-circle elevation-2" src='<?php echo "uploads/".$PatientProfilePic; ?>' alt="User Avatar"> 
			  </div>
			  <div class="card-footer">
				<div class="row">
				<div class="col-sm-4">
					<div class="description-block">
					  <h5 id="SemPatientEmail" class="description-header">MRN No : <?php echo $fk_mrnNo; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header"><span id="SemPatientAge" class="ew-cell">Age : <?php echo AgeCalculationb($results2[0]["dob"]); ?></span></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 id="SemPatientMobile" class="description-header">Mobile : <?php echo $results2[0]["mobile_no"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				</div>
				<!-- /.row -->
			  </div>
			</div>
			<!-- /.widget-user -->
</div>
</div>
<div class="row">
 		<div class="col-lg-12">
			<div class="card bg-info" style="color:#ac3973;">             
			  <div class="card-body">
			  	<table  style="width: 100%;"  class="ew-table">
			  			<tbody>
			  				<tr>
			  					<td>{{include tmpl="#tpc_patient_room_RoomID"/}}&nbsp;{{include tmpl="#tpx_patient_room_RoomID"/}}</td>
			  					<td>{{include tmpl="#tpc_patient_room_RoomNo"/}}&nbsp;{{include tmpl="#tpx_patient_room_RoomNo"/}}</td>
			  				</tr>
			  				<tr>
			  					<td>{{include tmpl="#tpc_patient_room_RoomType"/}}&nbsp;{{include tmpl="#tpx_patient_room_RoomType"/}}</td>
			  					<td>{{include tmpl="#tpc_patient_room_SharingRoom"/}}&nbsp;{{include tmpl="#tpx_patient_room_SharingRoom"/}}</td>
			  				</tr>
			  				<tr>
			  					<td></td>
			  					<td>&#x20B9; {{include tmpl="#tpc_patient_room_Amount"/}}&nbsp;{{include tmpl="#tpx_patient_room_Amount"/}}</td>
			  				</tr>
			  			</tbody>
			  		</table>
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
<div class="row">
 		<div class="col-lg-12">
			<div class="card bg-info" style="color:#8a8a5c;">             
			  <div class="card-body">
			 	<table  style="width: 100%;"  class="ew-table">
			  			<tbody>
			  				<tr>
			  					<td>{{include tmpl="#tpc_patient_room_Startdatetime"/}}&nbsp;{{include tmpl="#tpx_patient_room_Startdatetime"/}}</td>
			  					<td>{{include tmpl="#tpc_patient_room_Enddatetime"/}}&nbsp;{{include tmpl="#tpx_patient_room_Enddatetime"/}}</td>
			  				</tr>
			  				<tr>
			  					<td>{{include tmpl="#tpc_patient_room_Days"/}}&nbsp;{{include tmpl="#tpx_patient_room_Days"/}}</td>
			  					<td>{{include tmpl="#tpc_patient_room_Hours"/}}&nbsp;{{include tmpl="#tpx_patient_room_Hours"/}}</td>
			  				</tr>
			  				<tr>
			  					<td>{{include tmpl="#tpc_patient_room_DaysHours"/}}&nbsp;{{include tmpl="#tpx_patient_room_DaysHours"/}}</td>
			  					<td>&#x20B9; {{include tmpl="#tpc_patient_room_TotalAmount"/}}&nbsp;{{include tmpl="#tpx_patient_room_TotalAmount"/}}</td>
			  				</tr>
			  			</tbody>
			  		</table>
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>	
</div>
</script>
<?php if (!$patient_room_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $patient_room_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $patient_room_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($patient_room->Rows) ?> };
ew.applyTemplate("tpd_patient_roomadd", "tpm_patient_roomadd", "patient_roomadd", "<?php echo $patient_room->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.patient_roomadd_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$patient_room_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$patient_room_add->terminate();
?>