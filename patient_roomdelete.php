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
$patient_room_delete = new patient_room_delete();

// Run the page
$patient_room_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_room_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fpatient_roomdelete = currentForm = new ew.Form("fpatient_roomdelete", "delete");

// Form_CustomValidate event
fpatient_roomdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_roomdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatient_roomdelete.lists["x_Reception"] = <?php echo $patient_room_delete->Reception->Lookup->toClientList() ?>;
fpatient_roomdelete.lists["x_Reception"].options = <?php echo JsonEncode($patient_room_delete->Reception->lookupOptions()) ?>;
fpatient_roomdelete.lists["x_RoomID"] = <?php echo $patient_room_delete->RoomID->Lookup->toClientList() ?>;
fpatient_roomdelete.lists["x_RoomID"].options = <?php echo JsonEncode($patient_room_delete->RoomID->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $patient_room_delete->showPageHeader(); ?>
<?php
$patient_room_delete->showMessage();
?>
<form name="fpatient_roomdelete" id="fpatient_roomdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_room_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_room_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_room">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($patient_room_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($patient_room->id->Visible) { // id ?>
		<th class="<?php echo $patient_room->id->headerCellClass() ?>"><span id="elh_patient_room_id" class="patient_room_id"><?php echo $patient_room->id->caption() ?></span></th>
<?php } ?>
<?php if ($patient_room->Reception->Visible) { // Reception ?>
		<th class="<?php echo $patient_room->Reception->headerCellClass() ?>"><span id="elh_patient_room_Reception" class="patient_room_Reception"><?php echo $patient_room->Reception->caption() ?></span></th>
<?php } ?>
<?php if ($patient_room->PatientId->Visible) { // PatientId ?>
		<th class="<?php echo $patient_room->PatientId->headerCellClass() ?>"><span id="elh_patient_room_PatientId" class="patient_room_PatientId"><?php echo $patient_room->PatientId->caption() ?></span></th>
<?php } ?>
<?php if ($patient_room->mrnno->Visible) { // mrnno ?>
		<th class="<?php echo $patient_room->mrnno->headerCellClass() ?>"><span id="elh_patient_room_mrnno" class="patient_room_mrnno"><?php echo $patient_room->mrnno->caption() ?></span></th>
<?php } ?>
<?php if ($patient_room->PatientName->Visible) { // PatientName ?>
		<th class="<?php echo $patient_room->PatientName->headerCellClass() ?>"><span id="elh_patient_room_PatientName" class="patient_room_PatientName"><?php echo $patient_room->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($patient_room->Gender->Visible) { // Gender ?>
		<th class="<?php echo $patient_room->Gender->headerCellClass() ?>"><span id="elh_patient_room_Gender" class="patient_room_Gender"><?php echo $patient_room->Gender->caption() ?></span></th>
<?php } ?>
<?php if ($patient_room->RoomID->Visible) { // RoomID ?>
		<th class="<?php echo $patient_room->RoomID->headerCellClass() ?>"><span id="elh_patient_room_RoomID" class="patient_room_RoomID"><?php echo $patient_room->RoomID->caption() ?></span></th>
<?php } ?>
<?php if ($patient_room->RoomNo->Visible) { // RoomNo ?>
		<th class="<?php echo $patient_room->RoomNo->headerCellClass() ?>"><span id="elh_patient_room_RoomNo" class="patient_room_RoomNo"><?php echo $patient_room->RoomNo->caption() ?></span></th>
<?php } ?>
<?php if ($patient_room->RoomType->Visible) { // RoomType ?>
		<th class="<?php echo $patient_room->RoomType->headerCellClass() ?>"><span id="elh_patient_room_RoomType" class="patient_room_RoomType"><?php echo $patient_room->RoomType->caption() ?></span></th>
<?php } ?>
<?php if ($patient_room->SharingRoom->Visible) { // SharingRoom ?>
		<th class="<?php echo $patient_room->SharingRoom->headerCellClass() ?>"><span id="elh_patient_room_SharingRoom" class="patient_room_SharingRoom"><?php echo $patient_room->SharingRoom->caption() ?></span></th>
<?php } ?>
<?php if ($patient_room->Amount->Visible) { // Amount ?>
		<th class="<?php echo $patient_room->Amount->headerCellClass() ?>"><span id="elh_patient_room_Amount" class="patient_room_Amount"><?php echo $patient_room->Amount->caption() ?></span></th>
<?php } ?>
<?php if ($patient_room->Startdatetime->Visible) { // Startdatetime ?>
		<th class="<?php echo $patient_room->Startdatetime->headerCellClass() ?>"><span id="elh_patient_room_Startdatetime" class="patient_room_Startdatetime"><?php echo $patient_room->Startdatetime->caption() ?></span></th>
<?php } ?>
<?php if ($patient_room->Enddatetime->Visible) { // Enddatetime ?>
		<th class="<?php echo $patient_room->Enddatetime->headerCellClass() ?>"><span id="elh_patient_room_Enddatetime" class="patient_room_Enddatetime"><?php echo $patient_room->Enddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($patient_room->DaysHours->Visible) { // DaysHours ?>
		<th class="<?php echo $patient_room->DaysHours->headerCellClass() ?>"><span id="elh_patient_room_DaysHours" class="patient_room_DaysHours"><?php echo $patient_room->DaysHours->caption() ?></span></th>
<?php } ?>
<?php if ($patient_room->Days->Visible) { // Days ?>
		<th class="<?php echo $patient_room->Days->headerCellClass() ?>"><span id="elh_patient_room_Days" class="patient_room_Days"><?php echo $patient_room->Days->caption() ?></span></th>
<?php } ?>
<?php if ($patient_room->Hours->Visible) { // Hours ?>
		<th class="<?php echo $patient_room->Hours->headerCellClass() ?>"><span id="elh_patient_room_Hours" class="patient_room_Hours"><?php echo $patient_room->Hours->caption() ?></span></th>
<?php } ?>
<?php if ($patient_room->TotalAmount->Visible) { // TotalAmount ?>
		<th class="<?php echo $patient_room->TotalAmount->headerCellClass() ?>"><span id="elh_patient_room_TotalAmount" class="patient_room_TotalAmount"><?php echo $patient_room->TotalAmount->caption() ?></span></th>
<?php } ?>
<?php if ($patient_room->PatID->Visible) { // PatID ?>
		<th class="<?php echo $patient_room->PatID->headerCellClass() ?>"><span id="elh_patient_room_PatID" class="patient_room_PatID"><?php echo $patient_room->PatID->caption() ?></span></th>
<?php } ?>
<?php if ($patient_room->MobileNumber->Visible) { // MobileNumber ?>
		<th class="<?php echo $patient_room->MobileNumber->headerCellClass() ?>"><span id="elh_patient_room_MobileNumber" class="patient_room_MobileNumber"><?php echo $patient_room->MobileNumber->caption() ?></span></th>
<?php } ?>
<?php if ($patient_room->HospID->Visible) { // HospID ?>
		<th class="<?php echo $patient_room->HospID->headerCellClass() ?>"><span id="elh_patient_room_HospID" class="patient_room_HospID"><?php echo $patient_room->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($patient_room->status->Visible) { // status ?>
		<th class="<?php echo $patient_room->status->headerCellClass() ?>"><span id="elh_patient_room_status" class="patient_room_status"><?php echo $patient_room->status->caption() ?></span></th>
<?php } ?>
<?php if ($patient_room->createdby->Visible) { // createdby ?>
		<th class="<?php echo $patient_room->createdby->headerCellClass() ?>"><span id="elh_patient_room_createdby" class="patient_room_createdby"><?php echo $patient_room->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($patient_room->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $patient_room->createddatetime->headerCellClass() ?>"><span id="elh_patient_room_createddatetime" class="patient_room_createddatetime"><?php echo $patient_room->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($patient_room->modifiedby->Visible) { // modifiedby ?>
		<th class="<?php echo $patient_room->modifiedby->headerCellClass() ?>"><span id="elh_patient_room_modifiedby" class="patient_room_modifiedby"><?php echo $patient_room->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($patient_room->modifieddatetime->Visible) { // modifieddatetime ?>
		<th class="<?php echo $patient_room->modifieddatetime->headerCellClass() ?>"><span id="elh_patient_room_modifieddatetime" class="patient_room_modifieddatetime"><?php echo $patient_room->modifieddatetime->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$patient_room_delete->RecCnt = 0;
$i = 0;
while (!$patient_room_delete->Recordset->EOF) {
	$patient_room_delete->RecCnt++;
	$patient_room_delete->RowCnt++;

	// Set row properties
	$patient_room->resetAttributes();
	$patient_room->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$patient_room_delete->loadRowValues($patient_room_delete->Recordset);

	// Render row
	$patient_room_delete->renderRow();
?>
	<tr<?php echo $patient_room->rowAttributes() ?>>
<?php if ($patient_room->id->Visible) { // id ?>
		<td<?php echo $patient_room->id->cellAttributes() ?>>
<span id="el<?php echo $patient_room_delete->RowCnt ?>_patient_room_id" class="patient_room_id">
<span<?php echo $patient_room->id->viewAttributes() ?>>
<?php echo $patient_room->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_room->Reception->Visible) { // Reception ?>
		<td<?php echo $patient_room->Reception->cellAttributes() ?>>
<span id="el<?php echo $patient_room_delete->RowCnt ?>_patient_room_Reception" class="patient_room_Reception">
<span<?php echo $patient_room->Reception->viewAttributes() ?>>
<?php echo $patient_room->Reception->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_room->PatientId->Visible) { // PatientId ?>
		<td<?php echo $patient_room->PatientId->cellAttributes() ?>>
<span id="el<?php echo $patient_room_delete->RowCnt ?>_patient_room_PatientId" class="patient_room_PatientId">
<span<?php echo $patient_room->PatientId->viewAttributes() ?>>
<?php echo $patient_room->PatientId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_room->mrnno->Visible) { // mrnno ?>
		<td<?php echo $patient_room->mrnno->cellAttributes() ?>>
<span id="el<?php echo $patient_room_delete->RowCnt ?>_patient_room_mrnno" class="patient_room_mrnno">
<span<?php echo $patient_room->mrnno->viewAttributes() ?>>
<?php echo $patient_room->mrnno->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_room->PatientName->Visible) { // PatientName ?>
		<td<?php echo $patient_room->PatientName->cellAttributes() ?>>
<span id="el<?php echo $patient_room_delete->RowCnt ?>_patient_room_PatientName" class="patient_room_PatientName">
<span<?php echo $patient_room->PatientName->viewAttributes() ?>>
<?php echo $patient_room->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_room->Gender->Visible) { // Gender ?>
		<td<?php echo $patient_room->Gender->cellAttributes() ?>>
<span id="el<?php echo $patient_room_delete->RowCnt ?>_patient_room_Gender" class="patient_room_Gender">
<span<?php echo $patient_room->Gender->viewAttributes() ?>>
<?php echo $patient_room->Gender->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_room->RoomID->Visible) { // RoomID ?>
		<td<?php echo $patient_room->RoomID->cellAttributes() ?>>
<span id="el<?php echo $patient_room_delete->RowCnt ?>_patient_room_RoomID" class="patient_room_RoomID">
<span<?php echo $patient_room->RoomID->viewAttributes() ?>>
<?php echo $patient_room->RoomID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_room->RoomNo->Visible) { // RoomNo ?>
		<td<?php echo $patient_room->RoomNo->cellAttributes() ?>>
<span id="el<?php echo $patient_room_delete->RowCnt ?>_patient_room_RoomNo" class="patient_room_RoomNo">
<span<?php echo $patient_room->RoomNo->viewAttributes() ?>>
<?php echo $patient_room->RoomNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_room->RoomType->Visible) { // RoomType ?>
		<td<?php echo $patient_room->RoomType->cellAttributes() ?>>
<span id="el<?php echo $patient_room_delete->RowCnt ?>_patient_room_RoomType" class="patient_room_RoomType">
<span<?php echo $patient_room->RoomType->viewAttributes() ?>>
<?php echo $patient_room->RoomType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_room->SharingRoom->Visible) { // SharingRoom ?>
		<td<?php echo $patient_room->SharingRoom->cellAttributes() ?>>
<span id="el<?php echo $patient_room_delete->RowCnt ?>_patient_room_SharingRoom" class="patient_room_SharingRoom">
<span<?php echo $patient_room->SharingRoom->viewAttributes() ?>>
<?php echo $patient_room->SharingRoom->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_room->Amount->Visible) { // Amount ?>
		<td<?php echo $patient_room->Amount->cellAttributes() ?>>
<span id="el<?php echo $patient_room_delete->RowCnt ?>_patient_room_Amount" class="patient_room_Amount">
<span<?php echo $patient_room->Amount->viewAttributes() ?>>
<?php echo $patient_room->Amount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_room->Startdatetime->Visible) { // Startdatetime ?>
		<td<?php echo $patient_room->Startdatetime->cellAttributes() ?>>
<span id="el<?php echo $patient_room_delete->RowCnt ?>_patient_room_Startdatetime" class="patient_room_Startdatetime">
<span<?php echo $patient_room->Startdatetime->viewAttributes() ?>>
<?php echo $patient_room->Startdatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_room->Enddatetime->Visible) { // Enddatetime ?>
		<td<?php echo $patient_room->Enddatetime->cellAttributes() ?>>
<span id="el<?php echo $patient_room_delete->RowCnt ?>_patient_room_Enddatetime" class="patient_room_Enddatetime">
<span<?php echo $patient_room->Enddatetime->viewAttributes() ?>>
<?php echo $patient_room->Enddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_room->DaysHours->Visible) { // DaysHours ?>
		<td<?php echo $patient_room->DaysHours->cellAttributes() ?>>
<span id="el<?php echo $patient_room_delete->RowCnt ?>_patient_room_DaysHours" class="patient_room_DaysHours">
<span<?php echo $patient_room->DaysHours->viewAttributes() ?>>
<?php echo $patient_room->DaysHours->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_room->Days->Visible) { // Days ?>
		<td<?php echo $patient_room->Days->cellAttributes() ?>>
<span id="el<?php echo $patient_room_delete->RowCnt ?>_patient_room_Days" class="patient_room_Days">
<span<?php echo $patient_room->Days->viewAttributes() ?>>
<?php echo $patient_room->Days->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_room->Hours->Visible) { // Hours ?>
		<td<?php echo $patient_room->Hours->cellAttributes() ?>>
<span id="el<?php echo $patient_room_delete->RowCnt ?>_patient_room_Hours" class="patient_room_Hours">
<span<?php echo $patient_room->Hours->viewAttributes() ?>>
<?php echo $patient_room->Hours->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_room->TotalAmount->Visible) { // TotalAmount ?>
		<td<?php echo $patient_room->TotalAmount->cellAttributes() ?>>
<span id="el<?php echo $patient_room_delete->RowCnt ?>_patient_room_TotalAmount" class="patient_room_TotalAmount">
<span<?php echo $patient_room->TotalAmount->viewAttributes() ?>>
<?php echo $patient_room->TotalAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_room->PatID->Visible) { // PatID ?>
		<td<?php echo $patient_room->PatID->cellAttributes() ?>>
<span id="el<?php echo $patient_room_delete->RowCnt ?>_patient_room_PatID" class="patient_room_PatID">
<span<?php echo $patient_room->PatID->viewAttributes() ?>>
<?php echo $patient_room->PatID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_room->MobileNumber->Visible) { // MobileNumber ?>
		<td<?php echo $patient_room->MobileNumber->cellAttributes() ?>>
<span id="el<?php echo $patient_room_delete->RowCnt ?>_patient_room_MobileNumber" class="patient_room_MobileNumber">
<span<?php echo $patient_room->MobileNumber->viewAttributes() ?>>
<?php echo $patient_room->MobileNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_room->HospID->Visible) { // HospID ?>
		<td<?php echo $patient_room->HospID->cellAttributes() ?>>
<span id="el<?php echo $patient_room_delete->RowCnt ?>_patient_room_HospID" class="patient_room_HospID">
<span<?php echo $patient_room->HospID->viewAttributes() ?>>
<?php echo $patient_room->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_room->status->Visible) { // status ?>
		<td<?php echo $patient_room->status->cellAttributes() ?>>
<span id="el<?php echo $patient_room_delete->RowCnt ?>_patient_room_status" class="patient_room_status">
<span<?php echo $patient_room->status->viewAttributes() ?>>
<?php echo $patient_room->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_room->createdby->Visible) { // createdby ?>
		<td<?php echo $patient_room->createdby->cellAttributes() ?>>
<span id="el<?php echo $patient_room_delete->RowCnt ?>_patient_room_createdby" class="patient_room_createdby">
<span<?php echo $patient_room->createdby->viewAttributes() ?>>
<?php echo $patient_room->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_room->createddatetime->Visible) { // createddatetime ?>
		<td<?php echo $patient_room->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $patient_room_delete->RowCnt ?>_patient_room_createddatetime" class="patient_room_createddatetime">
<span<?php echo $patient_room->createddatetime->viewAttributes() ?>>
<?php echo $patient_room->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_room->modifiedby->Visible) { // modifiedby ?>
		<td<?php echo $patient_room->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $patient_room_delete->RowCnt ?>_patient_room_modifiedby" class="patient_room_modifiedby">
<span<?php echo $patient_room->modifiedby->viewAttributes() ?>>
<?php echo $patient_room->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_room->modifieddatetime->Visible) { // modifieddatetime ?>
		<td<?php echo $patient_room->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $patient_room_delete->RowCnt ?>_patient_room_modifieddatetime" class="patient_room_modifieddatetime">
<span<?php echo $patient_room->modifieddatetime->viewAttributes() ?>>
<?php echo $patient_room->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$patient_room_delete->Recordset->moveNext();
}
$patient_room_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $patient_room_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$patient_room_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$patient_room_delete->terminate();
?>