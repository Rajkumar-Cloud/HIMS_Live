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
$patient_room_edit = new patient_room_edit();

// Run the page
$patient_room_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_room_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpatient_roomedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fpatient_roomedit = currentForm = new ew.Form("fpatient_roomedit", "edit");

	// Validate form
	fpatient_roomedit.validate = function() {
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
			<?php if ($patient_room_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room_edit->id->caption(), $patient_room_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_room_edit->Reception->Required) { ?>
				elm = this.getElements("x" + infix + "_Reception");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room_edit->Reception->caption(), $patient_room_edit->Reception->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_room_edit->PatientId->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room_edit->PatientId->caption(), $patient_room_edit->PatientId->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_room_edit->mrnno->Required) { ?>
				elm = this.getElements("x" + infix + "_mrnno");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room_edit->mrnno->caption(), $patient_room_edit->mrnno->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_room_edit->PatientName->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room_edit->PatientName->caption(), $patient_room_edit->PatientName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_room_edit->Gender->Required) { ?>
				elm = this.getElements("x" + infix + "_Gender");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room_edit->Gender->caption(), $patient_room_edit->Gender->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_room_edit->RoomID->Required) { ?>
				elm = this.getElements("x" + infix + "_RoomID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room_edit->RoomID->caption(), $patient_room_edit->RoomID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_room_edit->RoomNo->Required) { ?>
				elm = this.getElements("x" + infix + "_RoomNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room_edit->RoomNo->caption(), $patient_room_edit->RoomNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_room_edit->RoomType->Required) { ?>
				elm = this.getElements("x" + infix + "_RoomType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room_edit->RoomType->caption(), $patient_room_edit->RoomType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_room_edit->SharingRoom->Required) { ?>
				elm = this.getElements("x" + infix + "_SharingRoom");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room_edit->SharingRoom->caption(), $patient_room_edit->SharingRoom->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_room_edit->Amount->Required) { ?>
				elm = this.getElements("x" + infix + "_Amount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room_edit->Amount->caption(), $patient_room_edit->Amount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Amount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_room_edit->Amount->errorMessage()) ?>");
			<?php if ($patient_room_edit->Startdatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_Startdatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room_edit->Startdatetime->caption(), $patient_room_edit->Startdatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Startdatetime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_room_edit->Startdatetime->errorMessage()) ?>");
			<?php if ($patient_room_edit->Enddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_Enddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room_edit->Enddatetime->caption(), $patient_room_edit->Enddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Enddatetime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_room_edit->Enddatetime->errorMessage()) ?>");
			<?php if ($patient_room_edit->DaysHours->Required) { ?>
				elm = this.getElements("x" + infix + "_DaysHours");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room_edit->DaysHours->caption(), $patient_room_edit->DaysHours->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_room_edit->Days->Required) { ?>
				elm = this.getElements("x" + infix + "_Days");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room_edit->Days->caption(), $patient_room_edit->Days->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Days");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_room_edit->Days->errorMessage()) ?>");
			<?php if ($patient_room_edit->Hours->Required) { ?>
				elm = this.getElements("x" + infix + "_Hours");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room_edit->Hours->caption(), $patient_room_edit->Hours->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Hours");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_room_edit->Hours->errorMessage()) ?>");
			<?php if ($patient_room_edit->TotalAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_TotalAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room_edit->TotalAmount->caption(), $patient_room_edit->TotalAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TotalAmount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_room_edit->TotalAmount->errorMessage()) ?>");
			<?php if ($patient_room_edit->PatID->Required) { ?>
				elm = this.getElements("x" + infix + "_PatID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room_edit->PatID->caption(), $patient_room_edit->PatID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_room_edit->MobileNumber->Required) { ?>
				elm = this.getElements("x" + infix + "_MobileNumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room_edit->MobileNumber->caption(), $patient_room_edit->MobileNumber->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_room_edit->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room_edit->HospID->caption(), $patient_room_edit->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_room_edit->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room_edit->status->caption(), $patient_room_edit->status->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_room_edit->status->errorMessage()) ?>");
			<?php if ($patient_room_edit->modifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room_edit->modifiedby->caption(), $patient_room_edit->modifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_room_edit->modifieddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room_edit->modifieddatetime->caption(), $patient_room_edit->modifieddatetime->RequiredErrorMessage)) ?>");
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
	fpatient_roomedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpatient_roomedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpatient_roomedit.lists["x_RoomID"] = <?php echo $patient_room_edit->RoomID->Lookup->toClientList($patient_room_edit) ?>;
	fpatient_roomedit.lists["x_RoomID"].options = <?php echo JsonEncode($patient_room_edit->RoomID->lookupOptions()) ?>;
	loadjs.done("fpatient_roomedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $patient_room_edit->showPageHeader(); ?>
<?php
$patient_room_edit->showMessage();
?>
<form name="fpatient_roomedit" id="fpatient_roomedit" class="<?php echo $patient_room_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_room">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$patient_room_edit->IsModal ?>">
<?php if ($patient_room->getCurrentMasterTable() == "ip_admission") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="ip_admission">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($patient_room_edit->Reception->getSessionValue()) ?>">
<input type="hidden" name="fk_mrnNo" value="<?php echo HtmlEncode($patient_room_edit->mrnno->getSessionValue()) ?>">
<input type="hidden" name="fk_patient_id" value="<?php echo HtmlEncode($patient_room_edit->PatID->getSessionValue()) ?>">
<?php } ?>
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($patient_room_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_patient_room_id" class="<?php echo $patient_room_edit->LeftColumnClass ?>"><script id="tpc_patient_room_id" type="text/html"><?php echo $patient_room_edit->id->caption() ?><?php echo $patient_room_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_room_edit->RightColumnClass ?>"><div <?php echo $patient_room_edit->id->cellAttributes() ?>>
<script id="tpx_patient_room_id" type="text/html"><span id="el_patient_room_id">
<span<?php echo $patient_room_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_room_edit->id->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="patient_room" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($patient_room_edit->id->CurrentValue) ?>">
<?php echo $patient_room_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_room_edit->Reception->Visible) { // Reception ?>
	<div id="r_Reception" class="form-group row">
		<label id="elh_patient_room_Reception" for="x_Reception" class="<?php echo $patient_room_edit->LeftColumnClass ?>"><script id="tpc_patient_room_Reception" type="text/html"><?php echo $patient_room_edit->Reception->caption() ?><?php echo $patient_room_edit->Reception->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_room_edit->RightColumnClass ?>"><div <?php echo $patient_room_edit->Reception->cellAttributes() ?>>
<script id="tpx_patient_room_Reception" type="text/html"><span id="el_patient_room_Reception">
<span<?php echo $patient_room_edit->Reception->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_room_edit->Reception->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="patient_room" data-field="x_Reception" name="x_Reception" id="x_Reception" value="<?php echo HtmlEncode($patient_room_edit->Reception->CurrentValue) ?>">
<?php echo $patient_room_edit->Reception->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_room_edit->PatientId->Visible) { // PatientId ?>
	<div id="r_PatientId" class="form-group row">
		<label id="elh_patient_room_PatientId" for="x_PatientId" class="<?php echo $patient_room_edit->LeftColumnClass ?>"><script id="tpc_patient_room_PatientId" type="text/html"><?php echo $patient_room_edit->PatientId->caption() ?><?php echo $patient_room_edit->PatientId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_room_edit->RightColumnClass ?>"><div <?php echo $patient_room_edit->PatientId->cellAttributes() ?>>
<script id="tpx_patient_room_PatientId" type="text/html"><span id="el_patient_room_PatientId">
<span<?php echo $patient_room_edit->PatientId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_room_edit->PatientId->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="patient_room" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" value="<?php echo HtmlEncode($patient_room_edit->PatientId->CurrentValue) ?>">
<?php echo $patient_room_edit->PatientId->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_room_edit->mrnno->Visible) { // mrnno ?>
	<div id="r_mrnno" class="form-group row">
		<label id="elh_patient_room_mrnno" for="x_mrnno" class="<?php echo $patient_room_edit->LeftColumnClass ?>"><script id="tpc_patient_room_mrnno" type="text/html"><?php echo $patient_room_edit->mrnno->caption() ?><?php echo $patient_room_edit->mrnno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_room_edit->RightColumnClass ?>"><div <?php echo $patient_room_edit->mrnno->cellAttributes() ?>>
<script id="tpx_patient_room_mrnno" type="text/html"><span id="el_patient_room_mrnno">
<span<?php echo $patient_room_edit->mrnno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_room_edit->mrnno->EditValue)) ?>"></span>
</span></script>
<input type="hidden" data-table="patient_room" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" value="<?php echo HtmlEncode($patient_room_edit->mrnno->CurrentValue) ?>">
<?php echo $patient_room_edit->mrnno->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_room_edit->PatientName->Visible) { // PatientName ?>
	<div id="r_PatientName" class="form-group row">
		<label id="elh_patient_room_PatientName" for="x_PatientName" class="<?php echo $patient_room_edit->LeftColumnClass ?>"><script id="tpc_patient_room_PatientName" type="text/html"><?php echo $patient_room_edit->PatientName->caption() ?><?php echo $patient_room_edit->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_room_edit->RightColumnClass ?>"><div <?php echo $patient_room_edit->PatientName->cellAttributes() ?>>
<script id="tpx_patient_room_PatientName" type="text/html"><span id="el_patient_room_PatientName">
<input type="text" data-table="patient_room" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_room_edit->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_room_edit->PatientName->EditValue ?>"<?php echo $patient_room_edit->PatientName->editAttributes() ?>>
</span></script>
<?php echo $patient_room_edit->PatientName->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_room_edit->Gender->Visible) { // Gender ?>
	<div id="r_Gender" class="form-group row">
		<label id="elh_patient_room_Gender" for="x_Gender" class="<?php echo $patient_room_edit->LeftColumnClass ?>"><script id="tpc_patient_room_Gender" type="text/html"><?php echo $patient_room_edit->Gender->caption() ?><?php echo $patient_room_edit->Gender->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_room_edit->RightColumnClass ?>"><div <?php echo $patient_room_edit->Gender->cellAttributes() ?>>
<script id="tpx_patient_room_Gender" type="text/html"><span id="el_patient_room_Gender">
<input type="text" data-table="patient_room" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_room_edit->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_room_edit->Gender->EditValue ?>"<?php echo $patient_room_edit->Gender->editAttributes() ?>>
</span></script>
<?php echo $patient_room_edit->Gender->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_room_edit->RoomID->Visible) { // RoomID ?>
	<div id="r_RoomID" class="form-group row">
		<label id="elh_patient_room_RoomID" for="x_RoomID" class="<?php echo $patient_room_edit->LeftColumnClass ?>"><script id="tpc_patient_room_RoomID" type="text/html"><?php echo $patient_room_edit->RoomID->caption() ?><?php echo $patient_room_edit->RoomID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_room_edit->RightColumnClass ?>"><div <?php echo $patient_room_edit->RoomID->cellAttributes() ?>>
<script id="tpx_patient_room_RoomID" type="text/html"><span id="el_patient_room_RoomID">
<?php $patient_room_edit->RoomID->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_RoomID"><?php echo EmptyValue(strval($patient_room_edit->RoomID->ViewValue)) ? $Language->phrase("PleaseSelect") : $patient_room_edit->RoomID->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_room_edit->RoomID->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($patient_room_edit->RoomID->ReadOnly || $patient_room_edit->RoomID->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_RoomID',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $patient_room_edit->RoomID->Lookup->getParamTag($patient_room_edit, "p_x_RoomID") ?>
<input type="hidden" data-table="patient_room" data-field="x_RoomID" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_room_edit->RoomID->displayValueSeparatorAttribute() ?>" name="x_RoomID" id="x_RoomID" value="<?php echo $patient_room_edit->RoomID->CurrentValue ?>"<?php echo $patient_room_edit->RoomID->editAttributes() ?>>
</span></script>
<?php echo $patient_room_edit->RoomID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_room_edit->RoomNo->Visible) { // RoomNo ?>
	<div id="r_RoomNo" class="form-group row">
		<label id="elh_patient_room_RoomNo" for="x_RoomNo" class="<?php echo $patient_room_edit->LeftColumnClass ?>"><script id="tpc_patient_room_RoomNo" type="text/html"><?php echo $patient_room_edit->RoomNo->caption() ?><?php echo $patient_room_edit->RoomNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_room_edit->RightColumnClass ?>"><div <?php echo $patient_room_edit->RoomNo->cellAttributes() ?>>
<script id="tpx_patient_room_RoomNo" type="text/html"><span id="el_patient_room_RoomNo">
<input type="text" data-table="patient_room" data-field="x_RoomNo" name="x_RoomNo" id="x_RoomNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_room_edit->RoomNo->getPlaceHolder()) ?>" value="<?php echo $patient_room_edit->RoomNo->EditValue ?>"<?php echo $patient_room_edit->RoomNo->editAttributes() ?>>
</span></script>
<?php echo $patient_room_edit->RoomNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_room_edit->RoomType->Visible) { // RoomType ?>
	<div id="r_RoomType" class="form-group row">
		<label id="elh_patient_room_RoomType" for="x_RoomType" class="<?php echo $patient_room_edit->LeftColumnClass ?>"><script id="tpc_patient_room_RoomType" type="text/html"><?php echo $patient_room_edit->RoomType->caption() ?><?php echo $patient_room_edit->RoomType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_room_edit->RightColumnClass ?>"><div <?php echo $patient_room_edit->RoomType->cellAttributes() ?>>
<script id="tpx_patient_room_RoomType" type="text/html"><span id="el_patient_room_RoomType">
<input type="text" data-table="patient_room" data-field="x_RoomType" name="x_RoomType" id="x_RoomType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_room_edit->RoomType->getPlaceHolder()) ?>" value="<?php echo $patient_room_edit->RoomType->EditValue ?>"<?php echo $patient_room_edit->RoomType->editAttributes() ?>>
</span></script>
<?php echo $patient_room_edit->RoomType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_room_edit->SharingRoom->Visible) { // SharingRoom ?>
	<div id="r_SharingRoom" class="form-group row">
		<label id="elh_patient_room_SharingRoom" for="x_SharingRoom" class="<?php echo $patient_room_edit->LeftColumnClass ?>"><script id="tpc_patient_room_SharingRoom" type="text/html"><?php echo $patient_room_edit->SharingRoom->caption() ?><?php echo $patient_room_edit->SharingRoom->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_room_edit->RightColumnClass ?>"><div <?php echo $patient_room_edit->SharingRoom->cellAttributes() ?>>
<script id="tpx_patient_room_SharingRoom" type="text/html"><span id="el_patient_room_SharingRoom">
<input type="text" data-table="patient_room" data-field="x_SharingRoom" name="x_SharingRoom" id="x_SharingRoom" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_room_edit->SharingRoom->getPlaceHolder()) ?>" value="<?php echo $patient_room_edit->SharingRoom->EditValue ?>"<?php echo $patient_room_edit->SharingRoom->editAttributes() ?>>
</span></script>
<?php echo $patient_room_edit->SharingRoom->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_room_edit->Amount->Visible) { // Amount ?>
	<div id="r_Amount" class="form-group row">
		<label id="elh_patient_room_Amount" for="x_Amount" class="<?php echo $patient_room_edit->LeftColumnClass ?>"><script id="tpc_patient_room_Amount" type="text/html"><?php echo $patient_room_edit->Amount->caption() ?><?php echo $patient_room_edit->Amount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_room_edit->RightColumnClass ?>"><div <?php echo $patient_room_edit->Amount->cellAttributes() ?>>
<script id="tpx_patient_room_Amount" type="text/html"><span id="el_patient_room_Amount">
<input type="text" data-table="patient_room" data-field="x_Amount" name="x_Amount" id="x_Amount" size="30" placeholder="<?php echo HtmlEncode($patient_room_edit->Amount->getPlaceHolder()) ?>" value="<?php echo $patient_room_edit->Amount->EditValue ?>"<?php echo $patient_room_edit->Amount->editAttributes() ?>>
</span></script>
<?php echo $patient_room_edit->Amount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_room_edit->Startdatetime->Visible) { // Startdatetime ?>
	<div id="r_Startdatetime" class="form-group row">
		<label id="elh_patient_room_Startdatetime" for="x_Startdatetime" class="<?php echo $patient_room_edit->LeftColumnClass ?>"><script id="tpc_patient_room_Startdatetime" type="text/html"><?php echo $patient_room_edit->Startdatetime->caption() ?><?php echo $patient_room_edit->Startdatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_room_edit->RightColumnClass ?>"><div <?php echo $patient_room_edit->Startdatetime->cellAttributes() ?>>
<script id="tpx_patient_room_Startdatetime" type="text/html"><span id="el_patient_room_Startdatetime">
<input type="text" data-table="patient_room" data-field="x_Startdatetime" name="x_Startdatetime" id="x_Startdatetime" placeholder="<?php echo HtmlEncode($patient_room_edit->Startdatetime->getPlaceHolder()) ?>" value="<?php echo $patient_room_edit->Startdatetime->EditValue ?>"<?php echo $patient_room_edit->Startdatetime->editAttributes() ?>>
<?php if (!$patient_room_edit->Startdatetime->ReadOnly && !$patient_room_edit->Startdatetime->Disabled && !isset($patient_room_edit->Startdatetime->EditAttrs["readonly"]) && !isset($patient_room_edit->Startdatetime->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_roomedit_js">
loadjs.ready(["fpatient_roomedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_roomedit", "x_Startdatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php echo $patient_room_edit->Startdatetime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_room_edit->Enddatetime->Visible) { // Enddatetime ?>
	<div id="r_Enddatetime" class="form-group row">
		<label id="elh_patient_room_Enddatetime" for="x_Enddatetime" class="<?php echo $patient_room_edit->LeftColumnClass ?>"><script id="tpc_patient_room_Enddatetime" type="text/html"><?php echo $patient_room_edit->Enddatetime->caption() ?><?php echo $patient_room_edit->Enddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_room_edit->RightColumnClass ?>"><div <?php echo $patient_room_edit->Enddatetime->cellAttributes() ?>>
<script id="tpx_patient_room_Enddatetime" type="text/html"><span id="el_patient_room_Enddatetime">
<input type="text" data-table="patient_room" data-field="x_Enddatetime" name="x_Enddatetime" id="x_Enddatetime" placeholder="<?php echo HtmlEncode($patient_room_edit->Enddatetime->getPlaceHolder()) ?>" value="<?php echo $patient_room_edit->Enddatetime->EditValue ?>"<?php echo $patient_room_edit->Enddatetime->editAttributes() ?>>
<?php if (!$patient_room_edit->Enddatetime->ReadOnly && !$patient_room_edit->Enddatetime->Disabled && !isset($patient_room_edit->Enddatetime->EditAttrs["readonly"]) && !isset($patient_room_edit->Enddatetime->EditAttrs["disabled"])) { ?>
<?php } ?>
</span></script>
<script type="text/html" class="patient_roomedit_js">
loadjs.ready(["fpatient_roomedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_roomedit", "x_Enddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php echo $patient_room_edit->Enddatetime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_room_edit->DaysHours->Visible) { // DaysHours ?>
	<div id="r_DaysHours" class="form-group row">
		<label id="elh_patient_room_DaysHours" for="x_DaysHours" class="<?php echo $patient_room_edit->LeftColumnClass ?>"><script id="tpc_patient_room_DaysHours" type="text/html"><?php echo $patient_room_edit->DaysHours->caption() ?><?php echo $patient_room_edit->DaysHours->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_room_edit->RightColumnClass ?>"><div <?php echo $patient_room_edit->DaysHours->cellAttributes() ?>>
<script id="tpx_patient_room_DaysHours" type="text/html"><span id="el_patient_room_DaysHours">
<input type="text" data-table="patient_room" data-field="x_DaysHours" name="x_DaysHours" id="x_DaysHours" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_room_edit->DaysHours->getPlaceHolder()) ?>" value="<?php echo $patient_room_edit->DaysHours->EditValue ?>"<?php echo $patient_room_edit->DaysHours->editAttributes() ?>>
</span></script>
<?php echo $patient_room_edit->DaysHours->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_room_edit->Days->Visible) { // Days ?>
	<div id="r_Days" class="form-group row">
		<label id="elh_patient_room_Days" for="x_Days" class="<?php echo $patient_room_edit->LeftColumnClass ?>"><script id="tpc_patient_room_Days" type="text/html"><?php echo $patient_room_edit->Days->caption() ?><?php echo $patient_room_edit->Days->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_room_edit->RightColumnClass ?>"><div <?php echo $patient_room_edit->Days->cellAttributes() ?>>
<script id="tpx_patient_room_Days" type="text/html"><span id="el_patient_room_Days">
<input type="text" data-table="patient_room" data-field="x_Days" name="x_Days" id="x_Days" size="30" placeholder="<?php echo HtmlEncode($patient_room_edit->Days->getPlaceHolder()) ?>" value="<?php echo $patient_room_edit->Days->EditValue ?>"<?php echo $patient_room_edit->Days->editAttributes() ?>>
</span></script>
<?php echo $patient_room_edit->Days->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_room_edit->Hours->Visible) { // Hours ?>
	<div id="r_Hours" class="form-group row">
		<label id="elh_patient_room_Hours" for="x_Hours" class="<?php echo $patient_room_edit->LeftColumnClass ?>"><script id="tpc_patient_room_Hours" type="text/html"><?php echo $patient_room_edit->Hours->caption() ?><?php echo $patient_room_edit->Hours->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_room_edit->RightColumnClass ?>"><div <?php echo $patient_room_edit->Hours->cellAttributes() ?>>
<script id="tpx_patient_room_Hours" type="text/html"><span id="el_patient_room_Hours">
<input type="text" data-table="patient_room" data-field="x_Hours" name="x_Hours" id="x_Hours" size="30" placeholder="<?php echo HtmlEncode($patient_room_edit->Hours->getPlaceHolder()) ?>" value="<?php echo $patient_room_edit->Hours->EditValue ?>"<?php echo $patient_room_edit->Hours->editAttributes() ?>>
</span></script>
<?php echo $patient_room_edit->Hours->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_room_edit->TotalAmount->Visible) { // TotalAmount ?>
	<div id="r_TotalAmount" class="form-group row">
		<label id="elh_patient_room_TotalAmount" for="x_TotalAmount" class="<?php echo $patient_room_edit->LeftColumnClass ?>"><script id="tpc_patient_room_TotalAmount" type="text/html"><?php echo $patient_room_edit->TotalAmount->caption() ?><?php echo $patient_room_edit->TotalAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_room_edit->RightColumnClass ?>"><div <?php echo $patient_room_edit->TotalAmount->cellAttributes() ?>>
<script id="tpx_patient_room_TotalAmount" type="text/html"><span id="el_patient_room_TotalAmount">
<input type="text" data-table="patient_room" data-field="x_TotalAmount" name="x_TotalAmount" id="x_TotalAmount" size="30" placeholder="<?php echo HtmlEncode($patient_room_edit->TotalAmount->getPlaceHolder()) ?>" value="<?php echo $patient_room_edit->TotalAmount->EditValue ?>"<?php echo $patient_room_edit->TotalAmount->editAttributes() ?>>
</span></script>
<?php echo $patient_room_edit->TotalAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_room_edit->PatID->Visible) { // PatID ?>
	<div id="r_PatID" class="form-group row">
		<label id="elh_patient_room_PatID" for="x_PatID" class="<?php echo $patient_room_edit->LeftColumnClass ?>"><script id="tpc_patient_room_PatID" type="text/html"><?php echo $patient_room_edit->PatID->caption() ?><?php echo $patient_room_edit->PatID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_room_edit->RightColumnClass ?>"><div <?php echo $patient_room_edit->PatID->cellAttributes() ?>>
<?php if ($patient_room_edit->PatID->getSessionValue() != "") { ?>
<script id="tpx_patient_room_PatID" type="text/html"><span id="el_patient_room_PatID">
<span<?php echo $patient_room_edit->PatID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_room_edit->PatID->ViewValue)) ?>"></span>
</span></script>
<input type="hidden" id="x_PatID" name="x_PatID" value="<?php echo HtmlEncode($patient_room_edit->PatID->CurrentValue) ?>">
<?php } else { ?>
<script id="tpx_patient_room_PatID" type="text/html"><span id="el_patient_room_PatID">
<input type="text" data-table="patient_room" data-field="x_PatID" name="x_PatID" id="x_PatID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_room_edit->PatID->getPlaceHolder()) ?>" value="<?php echo $patient_room_edit->PatID->EditValue ?>"<?php echo $patient_room_edit->PatID->editAttributes() ?>>
</span></script>
<?php } ?>
<?php echo $patient_room_edit->PatID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_room_edit->MobileNumber->Visible) { // MobileNumber ?>
	<div id="r_MobileNumber" class="form-group row">
		<label id="elh_patient_room_MobileNumber" for="x_MobileNumber" class="<?php echo $patient_room_edit->LeftColumnClass ?>"><script id="tpc_patient_room_MobileNumber" type="text/html"><?php echo $patient_room_edit->MobileNumber->caption() ?><?php echo $patient_room_edit->MobileNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_room_edit->RightColumnClass ?>"><div <?php echo $patient_room_edit->MobileNumber->cellAttributes() ?>>
<script id="tpx_patient_room_MobileNumber" type="text/html"><span id="el_patient_room_MobileNumber">
<input type="text" data-table="patient_room" data-field="x_MobileNumber" name="x_MobileNumber" id="x_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_room_edit->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $patient_room_edit->MobileNumber->EditValue ?>"<?php echo $patient_room_edit->MobileNumber->editAttributes() ?>>
</span></script>
<?php echo $patient_room_edit->MobileNumber->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($patient_room_edit->status->Visible) { // status ?>
	<div id="r_status" class="form-group row">
		<label id="elh_patient_room_status" for="x_status" class="<?php echo $patient_room_edit->LeftColumnClass ?>"><script id="tpc_patient_room_status" type="text/html"><?php echo $patient_room_edit->status->caption() ?><?php echo $patient_room_edit->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></script></label>
		<div class="<?php echo $patient_room_edit->RightColumnClass ?>"><div <?php echo $patient_room_edit->status->cellAttributes() ?>>
<script id="tpx_patient_room_status" type="text/html"><span id="el_patient_room_status">
<input type="text" data-table="patient_room" data-field="x_status" name="x_status" id="x_status" size="30" placeholder="<?php echo HtmlEncode($patient_room_edit->status->getPlaceHolder()) ?>" value="<?php echo $patient_room_edit->status->EditValue ?>"<?php echo $patient_room_edit->status->editAttributes() ?>>
</span></script>
<?php echo $patient_room_edit->status->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_patient_roomedit" class="ew-custom-template"></div>
<script id="tpm_patient_roomedit" type="text/html">
<div id="ct_patient_room_edit"><style>
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
	if($Tid == "")
	{
		$vviid = $_GET["id"] ;
		$sql = "SELECT * FROM ganeshkumar_bjhims.patient_final_diagnosis where id='".$vviid."'; ";
		$resuVi = $dbhelper->ExecuteRows($sql);
		$Tid = $resuVi[0]["PatientId"];
		$fk_mrnNo = $resuVi[0]["mrnno"];
	}
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
<div hidden>
<p id="PPatientSearch" hidden>{{include tmpl="#tpc_patient_room_Reception"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_room_Reception")/}}</p>
</div>
<p id="profilePic" hidden>{{include tmpl=~getTemplate("#tpx_profilePic")/}}</p>
<p id="SurfaceArea" hidden>{{include tmpl=~getTemplate("#tpx_SurfaceArea")/}}</p>
<p id="BodyMassIndex" hidden>{{include tmpl=~getTemplate("#tpx_BodyMassIndex")/}}</p>
<p id="idmrnnokk" hidden>{{include tmpl="#tpc_patient_room_mrnno"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_room_mrnno")/}}</p>
<div hidden>
  <p>{{include tmpl="#tpc_patient_room_Reception"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_room_Reception")/}}</p> 
  <p>{{include tmpl="#tpc_patient_room_PatientId"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_room_PatientId")/}}</p> 
  <p>{{include tmpl="#tpc_patient_room_PatientName"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_room_PatientName")/}}</p> 
  <p>{{include tmpl=~getTemplate("#tpx_Age")/}}</p> 
  <p>{{include tmpl="#tpc_patient_room_Gender"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_room_Gender")/}}</p>
  <p>{{include tmpl="#tpc_patient_room_PatID"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_room_PatID")/}}</p>
  <p>{{include tmpl="#tpc_patient_room_MobileNumber"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_room_MobileNumber")/}}</p> 
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
{{include tmpl=~getTemplate("#tpx_FinalDiagnosisTemplate")/}}
<div class="row">
 		<div class="col-lg-12">
			<div class="card bg-info" style="color:#ac3973;">             
			  <div class="card-body">
			  {{include tmpl=~getTemplate("#tpx_FinalDiagnosis")/}}
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
{{include tmpl=~getTemplate("#tpx_TreatmentsTemplate")/}}
<div class="row">
 		<div class="col-lg-12">
			<div class="card bg-info" style="color:#8a8a5c;">             
			  <div class="card-body">
			  {{include tmpl=~getTemplate("#tpx_Treatments")/}}
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>	
</div>
</script>

<?php if (!$patient_room_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $patient_room_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $patient_room_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($patient_room->Rows) ?> };
	ew.applyTemplate("tpd_patient_roomedit", "tpm_patient_roomedit", "patient_roomedit", "<?php echo $patient_room->CustomExport ?>", ew.templateData.rows[0]);
	$("script.patient_roomedit_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$patient_room_edit->showPageFooter();
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
$patient_room_edit->terminate();
?>