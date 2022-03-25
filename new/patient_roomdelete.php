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
<?php include_once "header.php"; ?>
<script>
var fpatient_roomdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fpatient_roomdelete = currentForm = new ew.Form("fpatient_roomdelete", "delete");
	loadjs.done("fpatient_roomdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $patient_room_delete->showPageHeader(); ?>
<?php
$patient_room_delete->showMessage();
?>
<form name="fpatient_roomdelete" id="fpatient_roomdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_room">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($patient_room_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($patient_room_delete->id->Visible) { // id ?>
		<th class="<?php echo $patient_room_delete->id->headerCellClass() ?>"><span id="elh_patient_room_id" class="patient_room_id"><?php echo $patient_room_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($patient_room_delete->Reception->Visible) { // Reception ?>
		<th class="<?php echo $patient_room_delete->Reception->headerCellClass() ?>"><span id="elh_patient_room_Reception" class="patient_room_Reception"><?php echo $patient_room_delete->Reception->caption() ?></span></th>
<?php } ?>
<?php if ($patient_room_delete->PatientId->Visible) { // PatientId ?>
		<th class="<?php echo $patient_room_delete->PatientId->headerCellClass() ?>"><span id="elh_patient_room_PatientId" class="patient_room_PatientId"><?php echo $patient_room_delete->PatientId->caption() ?></span></th>
<?php } ?>
<?php if ($patient_room_delete->mrnno->Visible) { // mrnno ?>
		<th class="<?php echo $patient_room_delete->mrnno->headerCellClass() ?>"><span id="elh_patient_room_mrnno" class="patient_room_mrnno"><?php echo $patient_room_delete->mrnno->caption() ?></span></th>
<?php } ?>
<?php if ($patient_room_delete->PatientName->Visible) { // PatientName ?>
		<th class="<?php echo $patient_room_delete->PatientName->headerCellClass() ?>"><span id="elh_patient_room_PatientName" class="patient_room_PatientName"><?php echo $patient_room_delete->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($patient_room_delete->Gender->Visible) { // Gender ?>
		<th class="<?php echo $patient_room_delete->Gender->headerCellClass() ?>"><span id="elh_patient_room_Gender" class="patient_room_Gender"><?php echo $patient_room_delete->Gender->caption() ?></span></th>
<?php } ?>
<?php if ($patient_room_delete->RoomID->Visible) { // RoomID ?>
		<th class="<?php echo $patient_room_delete->RoomID->headerCellClass() ?>"><span id="elh_patient_room_RoomID" class="patient_room_RoomID"><?php echo $patient_room_delete->RoomID->caption() ?></span></th>
<?php } ?>
<?php if ($patient_room_delete->RoomNo->Visible) { // RoomNo ?>
		<th class="<?php echo $patient_room_delete->RoomNo->headerCellClass() ?>"><span id="elh_patient_room_RoomNo" class="patient_room_RoomNo"><?php echo $patient_room_delete->RoomNo->caption() ?></span></th>
<?php } ?>
<?php if ($patient_room_delete->RoomType->Visible) { // RoomType ?>
		<th class="<?php echo $patient_room_delete->RoomType->headerCellClass() ?>"><span id="elh_patient_room_RoomType" class="patient_room_RoomType"><?php echo $patient_room_delete->RoomType->caption() ?></span></th>
<?php } ?>
<?php if ($patient_room_delete->SharingRoom->Visible) { // SharingRoom ?>
		<th class="<?php echo $patient_room_delete->SharingRoom->headerCellClass() ?>"><span id="elh_patient_room_SharingRoom" class="patient_room_SharingRoom"><?php echo $patient_room_delete->SharingRoom->caption() ?></span></th>
<?php } ?>
<?php if ($patient_room_delete->Amount->Visible) { // Amount ?>
		<th class="<?php echo $patient_room_delete->Amount->headerCellClass() ?>"><span id="elh_patient_room_Amount" class="patient_room_Amount"><?php echo $patient_room_delete->Amount->caption() ?></span></th>
<?php } ?>
<?php if ($patient_room_delete->Startdatetime->Visible) { // Startdatetime ?>
		<th class="<?php echo $patient_room_delete->Startdatetime->headerCellClass() ?>"><span id="elh_patient_room_Startdatetime" class="patient_room_Startdatetime"><?php echo $patient_room_delete->Startdatetime->caption() ?></span></th>
<?php } ?>
<?php if ($patient_room_delete->Enddatetime->Visible) { // Enddatetime ?>
		<th class="<?php echo $patient_room_delete->Enddatetime->headerCellClass() ?>"><span id="elh_patient_room_Enddatetime" class="patient_room_Enddatetime"><?php echo $patient_room_delete->Enddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($patient_room_delete->DaysHours->Visible) { // DaysHours ?>
		<th class="<?php echo $patient_room_delete->DaysHours->headerCellClass() ?>"><span id="elh_patient_room_DaysHours" class="patient_room_DaysHours"><?php echo $patient_room_delete->DaysHours->caption() ?></span></th>
<?php } ?>
<?php if ($patient_room_delete->Days->Visible) { // Days ?>
		<th class="<?php echo $patient_room_delete->Days->headerCellClass() ?>"><span id="elh_patient_room_Days" class="patient_room_Days"><?php echo $patient_room_delete->Days->caption() ?></span></th>
<?php } ?>
<?php if ($patient_room_delete->Hours->Visible) { // Hours ?>
		<th class="<?php echo $patient_room_delete->Hours->headerCellClass() ?>"><span id="elh_patient_room_Hours" class="patient_room_Hours"><?php echo $patient_room_delete->Hours->caption() ?></span></th>
<?php } ?>
<?php if ($patient_room_delete->TotalAmount->Visible) { // TotalAmount ?>
		<th class="<?php echo $patient_room_delete->TotalAmount->headerCellClass() ?>"><span id="elh_patient_room_TotalAmount" class="patient_room_TotalAmount"><?php echo $patient_room_delete->TotalAmount->caption() ?></span></th>
<?php } ?>
<?php if ($patient_room_delete->PatID->Visible) { // PatID ?>
		<th class="<?php echo $patient_room_delete->PatID->headerCellClass() ?>"><span id="elh_patient_room_PatID" class="patient_room_PatID"><?php echo $patient_room_delete->PatID->caption() ?></span></th>
<?php } ?>
<?php if ($patient_room_delete->MobileNumber->Visible) { // MobileNumber ?>
		<th class="<?php echo $patient_room_delete->MobileNumber->headerCellClass() ?>"><span id="elh_patient_room_MobileNumber" class="patient_room_MobileNumber"><?php echo $patient_room_delete->MobileNumber->caption() ?></span></th>
<?php } ?>
<?php if ($patient_room_delete->HospID->Visible) { // HospID ?>
		<th class="<?php echo $patient_room_delete->HospID->headerCellClass() ?>"><span id="elh_patient_room_HospID" class="patient_room_HospID"><?php echo $patient_room_delete->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($patient_room_delete->status->Visible) { // status ?>
		<th class="<?php echo $patient_room_delete->status->headerCellClass() ?>"><span id="elh_patient_room_status" class="patient_room_status"><?php echo $patient_room_delete->status->caption() ?></span></th>
<?php } ?>
<?php if ($patient_room_delete->createdby->Visible) { // createdby ?>
		<th class="<?php echo $patient_room_delete->createdby->headerCellClass() ?>"><span id="elh_patient_room_createdby" class="patient_room_createdby"><?php echo $patient_room_delete->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($patient_room_delete->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $patient_room_delete->createddatetime->headerCellClass() ?>"><span id="elh_patient_room_createddatetime" class="patient_room_createddatetime"><?php echo $patient_room_delete->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($patient_room_delete->modifiedby->Visible) { // modifiedby ?>
		<th class="<?php echo $patient_room_delete->modifiedby->headerCellClass() ?>"><span id="elh_patient_room_modifiedby" class="patient_room_modifiedby"><?php echo $patient_room_delete->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($patient_room_delete->modifieddatetime->Visible) { // modifieddatetime ?>
		<th class="<?php echo $patient_room_delete->modifieddatetime->headerCellClass() ?>"><span id="elh_patient_room_modifieddatetime" class="patient_room_modifieddatetime"><?php echo $patient_room_delete->modifieddatetime->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$patient_room_delete->RecordCount = 0;
$i = 0;
while (!$patient_room_delete->Recordset->EOF) {
	$patient_room_delete->RecordCount++;
	$patient_room_delete->RowCount++;

	// Set row properties
	$patient_room->resetAttributes();
	$patient_room->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$patient_room_delete->loadRowValues($patient_room_delete->Recordset);

	// Render row
	$patient_room_delete->renderRow();
?>
	<tr <?php echo $patient_room->rowAttributes() ?>>
<?php if ($patient_room_delete->id->Visible) { // id ?>
		<td <?php echo $patient_room_delete->id->cellAttributes() ?>>
<span id="el<?php echo $patient_room_delete->RowCount ?>_patient_room_id" class="patient_room_id">
<span<?php echo $patient_room_delete->id->viewAttributes() ?>><?php echo $patient_room_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_room_delete->Reception->Visible) { // Reception ?>
		<td <?php echo $patient_room_delete->Reception->cellAttributes() ?>>
<span id="el<?php echo $patient_room_delete->RowCount ?>_patient_room_Reception" class="patient_room_Reception">
<span<?php echo $patient_room_delete->Reception->viewAttributes() ?>><?php echo $patient_room_delete->Reception->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_room_delete->PatientId->Visible) { // PatientId ?>
		<td <?php echo $patient_room_delete->PatientId->cellAttributes() ?>>
<span id="el<?php echo $patient_room_delete->RowCount ?>_patient_room_PatientId" class="patient_room_PatientId">
<span<?php echo $patient_room_delete->PatientId->viewAttributes() ?>><?php echo $patient_room_delete->PatientId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_room_delete->mrnno->Visible) { // mrnno ?>
		<td <?php echo $patient_room_delete->mrnno->cellAttributes() ?>>
<span id="el<?php echo $patient_room_delete->RowCount ?>_patient_room_mrnno" class="patient_room_mrnno">
<span<?php echo $patient_room_delete->mrnno->viewAttributes() ?>><?php echo $patient_room_delete->mrnno->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_room_delete->PatientName->Visible) { // PatientName ?>
		<td <?php echo $patient_room_delete->PatientName->cellAttributes() ?>>
<span id="el<?php echo $patient_room_delete->RowCount ?>_patient_room_PatientName" class="patient_room_PatientName">
<span<?php echo $patient_room_delete->PatientName->viewAttributes() ?>><?php echo $patient_room_delete->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_room_delete->Gender->Visible) { // Gender ?>
		<td <?php echo $patient_room_delete->Gender->cellAttributes() ?>>
<span id="el<?php echo $patient_room_delete->RowCount ?>_patient_room_Gender" class="patient_room_Gender">
<span<?php echo $patient_room_delete->Gender->viewAttributes() ?>><?php echo $patient_room_delete->Gender->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_room_delete->RoomID->Visible) { // RoomID ?>
		<td <?php echo $patient_room_delete->RoomID->cellAttributes() ?>>
<span id="el<?php echo $patient_room_delete->RowCount ?>_patient_room_RoomID" class="patient_room_RoomID">
<span<?php echo $patient_room_delete->RoomID->viewAttributes() ?>><?php echo $patient_room_delete->RoomID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_room_delete->RoomNo->Visible) { // RoomNo ?>
		<td <?php echo $patient_room_delete->RoomNo->cellAttributes() ?>>
<span id="el<?php echo $patient_room_delete->RowCount ?>_patient_room_RoomNo" class="patient_room_RoomNo">
<span<?php echo $patient_room_delete->RoomNo->viewAttributes() ?>><?php echo $patient_room_delete->RoomNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_room_delete->RoomType->Visible) { // RoomType ?>
		<td <?php echo $patient_room_delete->RoomType->cellAttributes() ?>>
<span id="el<?php echo $patient_room_delete->RowCount ?>_patient_room_RoomType" class="patient_room_RoomType">
<span<?php echo $patient_room_delete->RoomType->viewAttributes() ?>><?php echo $patient_room_delete->RoomType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_room_delete->SharingRoom->Visible) { // SharingRoom ?>
		<td <?php echo $patient_room_delete->SharingRoom->cellAttributes() ?>>
<span id="el<?php echo $patient_room_delete->RowCount ?>_patient_room_SharingRoom" class="patient_room_SharingRoom">
<span<?php echo $patient_room_delete->SharingRoom->viewAttributes() ?>><?php echo $patient_room_delete->SharingRoom->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_room_delete->Amount->Visible) { // Amount ?>
		<td <?php echo $patient_room_delete->Amount->cellAttributes() ?>>
<span id="el<?php echo $patient_room_delete->RowCount ?>_patient_room_Amount" class="patient_room_Amount">
<span<?php echo $patient_room_delete->Amount->viewAttributes() ?>><?php echo $patient_room_delete->Amount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_room_delete->Startdatetime->Visible) { // Startdatetime ?>
		<td <?php echo $patient_room_delete->Startdatetime->cellAttributes() ?>>
<span id="el<?php echo $patient_room_delete->RowCount ?>_patient_room_Startdatetime" class="patient_room_Startdatetime">
<span<?php echo $patient_room_delete->Startdatetime->viewAttributes() ?>><?php echo $patient_room_delete->Startdatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_room_delete->Enddatetime->Visible) { // Enddatetime ?>
		<td <?php echo $patient_room_delete->Enddatetime->cellAttributes() ?>>
<span id="el<?php echo $patient_room_delete->RowCount ?>_patient_room_Enddatetime" class="patient_room_Enddatetime">
<span<?php echo $patient_room_delete->Enddatetime->viewAttributes() ?>><?php echo $patient_room_delete->Enddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_room_delete->DaysHours->Visible) { // DaysHours ?>
		<td <?php echo $patient_room_delete->DaysHours->cellAttributes() ?>>
<span id="el<?php echo $patient_room_delete->RowCount ?>_patient_room_DaysHours" class="patient_room_DaysHours">
<span<?php echo $patient_room_delete->DaysHours->viewAttributes() ?>><?php echo $patient_room_delete->DaysHours->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_room_delete->Days->Visible) { // Days ?>
		<td <?php echo $patient_room_delete->Days->cellAttributes() ?>>
<span id="el<?php echo $patient_room_delete->RowCount ?>_patient_room_Days" class="patient_room_Days">
<span<?php echo $patient_room_delete->Days->viewAttributes() ?>><?php echo $patient_room_delete->Days->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_room_delete->Hours->Visible) { // Hours ?>
		<td <?php echo $patient_room_delete->Hours->cellAttributes() ?>>
<span id="el<?php echo $patient_room_delete->RowCount ?>_patient_room_Hours" class="patient_room_Hours">
<span<?php echo $patient_room_delete->Hours->viewAttributes() ?>><?php echo $patient_room_delete->Hours->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_room_delete->TotalAmount->Visible) { // TotalAmount ?>
		<td <?php echo $patient_room_delete->TotalAmount->cellAttributes() ?>>
<span id="el<?php echo $patient_room_delete->RowCount ?>_patient_room_TotalAmount" class="patient_room_TotalAmount">
<span<?php echo $patient_room_delete->TotalAmount->viewAttributes() ?>><?php echo $patient_room_delete->TotalAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_room_delete->PatID->Visible) { // PatID ?>
		<td <?php echo $patient_room_delete->PatID->cellAttributes() ?>>
<span id="el<?php echo $patient_room_delete->RowCount ?>_patient_room_PatID" class="patient_room_PatID">
<span<?php echo $patient_room_delete->PatID->viewAttributes() ?>><?php echo $patient_room_delete->PatID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_room_delete->MobileNumber->Visible) { // MobileNumber ?>
		<td <?php echo $patient_room_delete->MobileNumber->cellAttributes() ?>>
<span id="el<?php echo $patient_room_delete->RowCount ?>_patient_room_MobileNumber" class="patient_room_MobileNumber">
<span<?php echo $patient_room_delete->MobileNumber->viewAttributes() ?>><?php echo $patient_room_delete->MobileNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_room_delete->HospID->Visible) { // HospID ?>
		<td <?php echo $patient_room_delete->HospID->cellAttributes() ?>>
<span id="el<?php echo $patient_room_delete->RowCount ?>_patient_room_HospID" class="patient_room_HospID">
<span<?php echo $patient_room_delete->HospID->viewAttributes() ?>><?php echo $patient_room_delete->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_room_delete->status->Visible) { // status ?>
		<td <?php echo $patient_room_delete->status->cellAttributes() ?>>
<span id="el<?php echo $patient_room_delete->RowCount ?>_patient_room_status" class="patient_room_status">
<span<?php echo $patient_room_delete->status->viewAttributes() ?>><?php echo $patient_room_delete->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_room_delete->createdby->Visible) { // createdby ?>
		<td <?php echo $patient_room_delete->createdby->cellAttributes() ?>>
<span id="el<?php echo $patient_room_delete->RowCount ?>_patient_room_createdby" class="patient_room_createdby">
<span<?php echo $patient_room_delete->createdby->viewAttributes() ?>><?php echo $patient_room_delete->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_room_delete->createddatetime->Visible) { // createddatetime ?>
		<td <?php echo $patient_room_delete->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $patient_room_delete->RowCount ?>_patient_room_createddatetime" class="patient_room_createddatetime">
<span<?php echo $patient_room_delete->createddatetime->viewAttributes() ?>><?php echo $patient_room_delete->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_room_delete->modifiedby->Visible) { // modifiedby ?>
		<td <?php echo $patient_room_delete->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $patient_room_delete->RowCount ?>_patient_room_modifiedby" class="patient_room_modifiedby">
<span<?php echo $patient_room_delete->modifiedby->viewAttributes() ?>><?php echo $patient_room_delete->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_room_delete->modifieddatetime->Visible) { // modifieddatetime ?>
		<td <?php echo $patient_room_delete->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $patient_room_delete->RowCount ?>_patient_room_modifieddatetime" class="patient_room_modifieddatetime">
<span<?php echo $patient_room_delete->modifieddatetime->viewAttributes() ?>><?php echo $patient_room_delete->modifieddatetime->getViewValue() ?></span>
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
$patient_room_delete->terminate();
?>