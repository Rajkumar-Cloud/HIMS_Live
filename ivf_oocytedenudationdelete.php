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
$ivf_oocytedenudation_delete = new ivf_oocytedenudation_delete();

// Run the page
$ivf_oocytedenudation_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_oocytedenudation_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fivf_oocytedenudationdelete = currentForm = new ew.Form("fivf_oocytedenudationdelete", "delete");

// Form_CustomValidate event
fivf_oocytedenudationdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_oocytedenudationdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fivf_oocytedenudationdelete.lists["x_OocyteOrgin"] = <?php echo $ivf_oocytedenudation_delete->OocyteOrgin->Lookup->toClientList() ?>;
fivf_oocytedenudationdelete.lists["x_OocyteOrgin"].options = <?php echo JsonEncode($ivf_oocytedenudation_delete->OocyteOrgin->options(FALSE, TRUE)) ?>;
fivf_oocytedenudationdelete.lists["x_patient1"] = <?php echo $ivf_oocytedenudation_delete->patient1->Lookup->toClientList() ?>;
fivf_oocytedenudationdelete.lists["x_patient1"].options = <?php echo JsonEncode($ivf_oocytedenudation_delete->patient1->lookupOptions()) ?>;
fivf_oocytedenudationdelete.lists["x_OocyteType[]"] = <?php echo $ivf_oocytedenudation_delete->OocyteType->Lookup->toClientList() ?>;
fivf_oocytedenudationdelete.lists["x_OocyteType[]"].options = <?php echo JsonEncode($ivf_oocytedenudation_delete->OocyteType->options(FALSE, TRUE)) ?>;
fivf_oocytedenudationdelete.lists["x_patient3"] = <?php echo $ivf_oocytedenudation_delete->patient3->Lookup->toClientList() ?>;
fivf_oocytedenudationdelete.lists["x_patient3"].options = <?php echo JsonEncode($ivf_oocytedenudation_delete->patient3->lookupOptions()) ?>;
fivf_oocytedenudationdelete.lists["x_patient4"] = <?php echo $ivf_oocytedenudation_delete->patient4->Lookup->toClientList() ?>;
fivf_oocytedenudationdelete.lists["x_patient4"].options = <?php echo JsonEncode($ivf_oocytedenudation_delete->patient4->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $ivf_oocytedenudation_delete->showPageHeader(); ?>
<?php
$ivf_oocytedenudation_delete->showMessage();
?>
<form name="fivf_oocytedenudationdelete" id="fivf_oocytedenudationdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ivf_oocytedenudation_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_oocytedenudation_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_oocytedenudation">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($ivf_oocytedenudation_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($ivf_oocytedenudation->id->Visible) { // id ?>
		<th class="<?php echo $ivf_oocytedenudation->id->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_id" class="ivf_oocytedenudation_id"><?php echo $ivf_oocytedenudation->id->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation->RIDNo->Visible) { // RIDNo ?>
		<th class="<?php echo $ivf_oocytedenudation->RIDNo->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_RIDNo" class="ivf_oocytedenudation_RIDNo"><?php echo $ivf_oocytedenudation->RIDNo->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation->Name->Visible) { // Name ?>
		<th class="<?php echo $ivf_oocytedenudation->Name->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_Name" class="ivf_oocytedenudation_Name"><?php echo $ivf_oocytedenudation->Name->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation->ResultDate->Visible) { // ResultDate ?>
		<th class="<?php echo $ivf_oocytedenudation->ResultDate->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_ResultDate" class="ivf_oocytedenudation_ResultDate"><?php echo $ivf_oocytedenudation->ResultDate->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation->Surgeon->Visible) { // Surgeon ?>
		<th class="<?php echo $ivf_oocytedenudation->Surgeon->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_Surgeon" class="ivf_oocytedenudation_Surgeon"><?php echo $ivf_oocytedenudation->Surgeon->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation->AsstSurgeon->Visible) { // AsstSurgeon ?>
		<th class="<?php echo $ivf_oocytedenudation->AsstSurgeon->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_AsstSurgeon" class="ivf_oocytedenudation_AsstSurgeon"><?php echo $ivf_oocytedenudation->AsstSurgeon->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation->Anaesthetist->Visible) { // Anaesthetist ?>
		<th class="<?php echo $ivf_oocytedenudation->Anaesthetist->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_Anaesthetist" class="ivf_oocytedenudation_Anaesthetist"><?php echo $ivf_oocytedenudation->Anaesthetist->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation->AnaestheiaType->Visible) { // AnaestheiaType ?>
		<th class="<?php echo $ivf_oocytedenudation->AnaestheiaType->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_AnaestheiaType" class="ivf_oocytedenudation_AnaestheiaType"><?php echo $ivf_oocytedenudation->AnaestheiaType->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation->PrimaryEmbryologist->Visible) { // PrimaryEmbryologist ?>
		<th class="<?php echo $ivf_oocytedenudation->PrimaryEmbryologist->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_PrimaryEmbryologist" class="ivf_oocytedenudation_PrimaryEmbryologist"><?php echo $ivf_oocytedenudation->PrimaryEmbryologist->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation->SecondaryEmbryologist->Visible) { // SecondaryEmbryologist ?>
		<th class="<?php echo $ivf_oocytedenudation->SecondaryEmbryologist->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_SecondaryEmbryologist" class="ivf_oocytedenudation_SecondaryEmbryologist"><?php echo $ivf_oocytedenudation->SecondaryEmbryologist->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation->NoOfFolliclesRight->Visible) { // NoOfFolliclesRight ?>
		<th class="<?php echo $ivf_oocytedenudation->NoOfFolliclesRight->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_NoOfFolliclesRight" class="ivf_oocytedenudation_NoOfFolliclesRight"><?php echo $ivf_oocytedenudation->NoOfFolliclesRight->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation->NoOfFolliclesLeft->Visible) { // NoOfFolliclesLeft ?>
		<th class="<?php echo $ivf_oocytedenudation->NoOfFolliclesLeft->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_NoOfFolliclesLeft" class="ivf_oocytedenudation_NoOfFolliclesLeft"><?php echo $ivf_oocytedenudation->NoOfFolliclesLeft->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation->NoOfOocytes->Visible) { // NoOfOocytes ?>
		<th class="<?php echo $ivf_oocytedenudation->NoOfOocytes->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_NoOfOocytes" class="ivf_oocytedenudation_NoOfOocytes"><?php echo $ivf_oocytedenudation->NoOfOocytes->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation->RecordOocyteDenudation->Visible) { // RecordOocyteDenudation ?>
		<th class="<?php echo $ivf_oocytedenudation->RecordOocyteDenudation->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_RecordOocyteDenudation" class="ivf_oocytedenudation_RecordOocyteDenudation"><?php echo $ivf_oocytedenudation->RecordOocyteDenudation->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation->DateOfDenudation->Visible) { // DateOfDenudation ?>
		<th class="<?php echo $ivf_oocytedenudation->DateOfDenudation->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_DateOfDenudation" class="ivf_oocytedenudation_DateOfDenudation"><?php echo $ivf_oocytedenudation->DateOfDenudation->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation->DenudationDoneBy->Visible) { // DenudationDoneBy ?>
		<th class="<?php echo $ivf_oocytedenudation->DenudationDoneBy->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_DenudationDoneBy" class="ivf_oocytedenudation_DenudationDoneBy"><?php echo $ivf_oocytedenudation->DenudationDoneBy->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation->status->Visible) { // status ?>
		<th class="<?php echo $ivf_oocytedenudation->status->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_status" class="ivf_oocytedenudation_status"><?php echo $ivf_oocytedenudation->status->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation->createdby->Visible) { // createdby ?>
		<th class="<?php echo $ivf_oocytedenudation->createdby->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_createdby" class="ivf_oocytedenudation_createdby"><?php echo $ivf_oocytedenudation->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $ivf_oocytedenudation->createddatetime->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_createddatetime" class="ivf_oocytedenudation_createddatetime"><?php echo $ivf_oocytedenudation->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation->modifiedby->Visible) { // modifiedby ?>
		<th class="<?php echo $ivf_oocytedenudation->modifiedby->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_modifiedby" class="ivf_oocytedenudation_modifiedby"><?php echo $ivf_oocytedenudation->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation->modifieddatetime->Visible) { // modifieddatetime ?>
		<th class="<?php echo $ivf_oocytedenudation->modifieddatetime->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_modifieddatetime" class="ivf_oocytedenudation_modifieddatetime"><?php echo $ivf_oocytedenudation->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation->TidNo->Visible) { // TidNo ?>
		<th class="<?php echo $ivf_oocytedenudation->TidNo->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_TidNo" class="ivf_oocytedenudation_TidNo"><?php echo $ivf_oocytedenudation->TidNo->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation->ExpFollicles->Visible) { // ExpFollicles ?>
		<th class="<?php echo $ivf_oocytedenudation->ExpFollicles->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_ExpFollicles" class="ivf_oocytedenudation_ExpFollicles"><?php echo $ivf_oocytedenudation->ExpFollicles->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation->SecondaryDenudationDoneBy->Visible) { // SecondaryDenudationDoneBy ?>
		<th class="<?php echo $ivf_oocytedenudation->SecondaryDenudationDoneBy->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_SecondaryDenudationDoneBy" class="ivf_oocytedenudation_SecondaryDenudationDoneBy"><?php echo $ivf_oocytedenudation->SecondaryDenudationDoneBy->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation->OocyteOrgin->Visible) { // OocyteOrgin ?>
		<th class="<?php echo $ivf_oocytedenudation->OocyteOrgin->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_OocyteOrgin" class="ivf_oocytedenudation_OocyteOrgin"><?php echo $ivf_oocytedenudation->OocyteOrgin->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation->patient1->Visible) { // patient1 ?>
		<th class="<?php echo $ivf_oocytedenudation->patient1->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_patient1" class="ivf_oocytedenudation_patient1"><?php echo $ivf_oocytedenudation->patient1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation->OocyteType->Visible) { // OocyteType ?>
		<th class="<?php echo $ivf_oocytedenudation->OocyteType->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_OocyteType" class="ivf_oocytedenudation_OocyteType"><?php echo $ivf_oocytedenudation->OocyteType->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation->MIOocytesDonate1->Visible) { // MIOocytesDonate1 ?>
		<th class="<?php echo $ivf_oocytedenudation->MIOocytesDonate1->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_MIOocytesDonate1" class="ivf_oocytedenudation_MIOocytesDonate1"><?php echo $ivf_oocytedenudation->MIOocytesDonate1->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation->MIOocytesDonate2->Visible) { // MIOocytesDonate2 ?>
		<th class="<?php echo $ivf_oocytedenudation->MIOocytesDonate2->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_MIOocytesDonate2" class="ivf_oocytedenudation_MIOocytesDonate2"><?php echo $ivf_oocytedenudation->MIOocytesDonate2->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation->SelfMI->Visible) { // SelfMI ?>
		<th class="<?php echo $ivf_oocytedenudation->SelfMI->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_SelfMI" class="ivf_oocytedenudation_SelfMI"><?php echo $ivf_oocytedenudation->SelfMI->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation->SelfMII->Visible) { // SelfMII ?>
		<th class="<?php echo $ivf_oocytedenudation->SelfMII->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_SelfMII" class="ivf_oocytedenudation_SelfMII"><?php echo $ivf_oocytedenudation->SelfMII->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation->patient3->Visible) { // patient3 ?>
		<th class="<?php echo $ivf_oocytedenudation->patient3->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_patient3" class="ivf_oocytedenudation_patient3"><?php echo $ivf_oocytedenudation->patient3->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation->patient4->Visible) { // patient4 ?>
		<th class="<?php echo $ivf_oocytedenudation->patient4->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_patient4" class="ivf_oocytedenudation_patient4"><?php echo $ivf_oocytedenudation->patient4->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation->OocytesDonate3->Visible) { // OocytesDonate3 ?>
		<th class="<?php echo $ivf_oocytedenudation->OocytesDonate3->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_OocytesDonate3" class="ivf_oocytedenudation_OocytesDonate3"><?php echo $ivf_oocytedenudation->OocytesDonate3->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation->OocytesDonate4->Visible) { // OocytesDonate4 ?>
		<th class="<?php echo $ivf_oocytedenudation->OocytesDonate4->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_OocytesDonate4" class="ivf_oocytedenudation_OocytesDonate4"><?php echo $ivf_oocytedenudation->OocytesDonate4->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation->MIOocytesDonate3->Visible) { // MIOocytesDonate3 ?>
		<th class="<?php echo $ivf_oocytedenudation->MIOocytesDonate3->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_MIOocytesDonate3" class="ivf_oocytedenudation_MIOocytesDonate3"><?php echo $ivf_oocytedenudation->MIOocytesDonate3->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation->MIOocytesDonate4->Visible) { // MIOocytesDonate4 ?>
		<th class="<?php echo $ivf_oocytedenudation->MIOocytesDonate4->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_MIOocytesDonate4" class="ivf_oocytedenudation_MIOocytesDonate4"><?php echo $ivf_oocytedenudation->MIOocytesDonate4->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation->SelfOocytesMI->Visible) { // SelfOocytesMI ?>
		<th class="<?php echo $ivf_oocytedenudation->SelfOocytesMI->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_SelfOocytesMI" class="ivf_oocytedenudation_SelfOocytesMI"><?php echo $ivf_oocytedenudation->SelfOocytesMI->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation->SelfOocytesMII->Visible) { // SelfOocytesMII ?>
		<th class="<?php echo $ivf_oocytedenudation->SelfOocytesMII->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_SelfOocytesMII" class="ivf_oocytedenudation_SelfOocytesMII"><?php echo $ivf_oocytedenudation->SelfOocytesMII->caption() ?></span></th>
<?php } ?>
<?php if ($ivf_oocytedenudation->donor->Visible) { // donor ?>
		<th class="<?php echo $ivf_oocytedenudation->donor->headerCellClass() ?>"><span id="elh_ivf_oocytedenudation_donor" class="ivf_oocytedenudation_donor"><?php echo $ivf_oocytedenudation->donor->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$ivf_oocytedenudation_delete->RecCnt = 0;
$i = 0;
while (!$ivf_oocytedenudation_delete->Recordset->EOF) {
	$ivf_oocytedenudation_delete->RecCnt++;
	$ivf_oocytedenudation_delete->RowCnt++;

	// Set row properties
	$ivf_oocytedenudation->resetAttributes();
	$ivf_oocytedenudation->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$ivf_oocytedenudation_delete->loadRowValues($ivf_oocytedenudation_delete->Recordset);

	// Render row
	$ivf_oocytedenudation_delete->renderRow();
?>
	<tr<?php echo $ivf_oocytedenudation->rowAttributes() ?>>
<?php if ($ivf_oocytedenudation->id->Visible) { // id ?>
		<td<?php echo $ivf_oocytedenudation->id->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCnt ?>_ivf_oocytedenudation_id" class="ivf_oocytedenudation_id">
<span<?php echo $ivf_oocytedenudation->id->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->RIDNo->Visible) { // RIDNo ?>
		<td<?php echo $ivf_oocytedenudation->RIDNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCnt ?>_ivf_oocytedenudation_RIDNo" class="ivf_oocytedenudation_RIDNo">
<span<?php echo $ivf_oocytedenudation->RIDNo->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->RIDNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->Name->Visible) { // Name ?>
		<td<?php echo $ivf_oocytedenudation->Name->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCnt ?>_ivf_oocytedenudation_Name" class="ivf_oocytedenudation_Name">
<span<?php echo $ivf_oocytedenudation->Name->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->ResultDate->Visible) { // ResultDate ?>
		<td<?php echo $ivf_oocytedenudation->ResultDate->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCnt ?>_ivf_oocytedenudation_ResultDate" class="ivf_oocytedenudation_ResultDate">
<span<?php echo $ivf_oocytedenudation->ResultDate->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->ResultDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->Surgeon->Visible) { // Surgeon ?>
		<td<?php echo $ivf_oocytedenudation->Surgeon->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCnt ?>_ivf_oocytedenudation_Surgeon" class="ivf_oocytedenudation_Surgeon">
<span<?php echo $ivf_oocytedenudation->Surgeon->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->Surgeon->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->AsstSurgeon->Visible) { // AsstSurgeon ?>
		<td<?php echo $ivf_oocytedenudation->AsstSurgeon->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCnt ?>_ivf_oocytedenudation_AsstSurgeon" class="ivf_oocytedenudation_AsstSurgeon">
<span<?php echo $ivf_oocytedenudation->AsstSurgeon->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->AsstSurgeon->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->Anaesthetist->Visible) { // Anaesthetist ?>
		<td<?php echo $ivf_oocytedenudation->Anaesthetist->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCnt ?>_ivf_oocytedenudation_Anaesthetist" class="ivf_oocytedenudation_Anaesthetist">
<span<?php echo $ivf_oocytedenudation->Anaesthetist->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->Anaesthetist->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->AnaestheiaType->Visible) { // AnaestheiaType ?>
		<td<?php echo $ivf_oocytedenudation->AnaestheiaType->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCnt ?>_ivf_oocytedenudation_AnaestheiaType" class="ivf_oocytedenudation_AnaestheiaType">
<span<?php echo $ivf_oocytedenudation->AnaestheiaType->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->AnaestheiaType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->PrimaryEmbryologist->Visible) { // PrimaryEmbryologist ?>
		<td<?php echo $ivf_oocytedenudation->PrimaryEmbryologist->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCnt ?>_ivf_oocytedenudation_PrimaryEmbryologist" class="ivf_oocytedenudation_PrimaryEmbryologist">
<span<?php echo $ivf_oocytedenudation->PrimaryEmbryologist->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->PrimaryEmbryologist->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->SecondaryEmbryologist->Visible) { // SecondaryEmbryologist ?>
		<td<?php echo $ivf_oocytedenudation->SecondaryEmbryologist->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCnt ?>_ivf_oocytedenudation_SecondaryEmbryologist" class="ivf_oocytedenudation_SecondaryEmbryologist">
<span<?php echo $ivf_oocytedenudation->SecondaryEmbryologist->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->SecondaryEmbryologist->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->NoOfFolliclesRight->Visible) { // NoOfFolliclesRight ?>
		<td<?php echo $ivf_oocytedenudation->NoOfFolliclesRight->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCnt ?>_ivf_oocytedenudation_NoOfFolliclesRight" class="ivf_oocytedenudation_NoOfFolliclesRight">
<span<?php echo $ivf_oocytedenudation->NoOfFolliclesRight->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->NoOfFolliclesRight->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->NoOfFolliclesLeft->Visible) { // NoOfFolliclesLeft ?>
		<td<?php echo $ivf_oocytedenudation->NoOfFolliclesLeft->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCnt ?>_ivf_oocytedenudation_NoOfFolliclesLeft" class="ivf_oocytedenudation_NoOfFolliclesLeft">
<span<?php echo $ivf_oocytedenudation->NoOfFolliclesLeft->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->NoOfFolliclesLeft->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->NoOfOocytes->Visible) { // NoOfOocytes ?>
		<td<?php echo $ivf_oocytedenudation->NoOfOocytes->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCnt ?>_ivf_oocytedenudation_NoOfOocytes" class="ivf_oocytedenudation_NoOfOocytes">
<span<?php echo $ivf_oocytedenudation->NoOfOocytes->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->NoOfOocytes->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->RecordOocyteDenudation->Visible) { // RecordOocyteDenudation ?>
		<td<?php echo $ivf_oocytedenudation->RecordOocyteDenudation->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCnt ?>_ivf_oocytedenudation_RecordOocyteDenudation" class="ivf_oocytedenudation_RecordOocyteDenudation">
<span<?php echo $ivf_oocytedenudation->RecordOocyteDenudation->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->RecordOocyteDenudation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->DateOfDenudation->Visible) { // DateOfDenudation ?>
		<td<?php echo $ivf_oocytedenudation->DateOfDenudation->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCnt ?>_ivf_oocytedenudation_DateOfDenudation" class="ivf_oocytedenudation_DateOfDenudation">
<span<?php echo $ivf_oocytedenudation->DateOfDenudation->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->DateOfDenudation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->DenudationDoneBy->Visible) { // DenudationDoneBy ?>
		<td<?php echo $ivf_oocytedenudation->DenudationDoneBy->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCnt ?>_ivf_oocytedenudation_DenudationDoneBy" class="ivf_oocytedenudation_DenudationDoneBy">
<span<?php echo $ivf_oocytedenudation->DenudationDoneBy->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->DenudationDoneBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->status->Visible) { // status ?>
		<td<?php echo $ivf_oocytedenudation->status->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCnt ?>_ivf_oocytedenudation_status" class="ivf_oocytedenudation_status">
<span<?php echo $ivf_oocytedenudation->status->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->createdby->Visible) { // createdby ?>
		<td<?php echo $ivf_oocytedenudation->createdby->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCnt ?>_ivf_oocytedenudation_createdby" class="ivf_oocytedenudation_createdby">
<span<?php echo $ivf_oocytedenudation->createdby->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->createddatetime->Visible) { // createddatetime ?>
		<td<?php echo $ivf_oocytedenudation->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCnt ?>_ivf_oocytedenudation_createddatetime" class="ivf_oocytedenudation_createddatetime">
<span<?php echo $ivf_oocytedenudation->createddatetime->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->modifiedby->Visible) { // modifiedby ?>
		<td<?php echo $ivf_oocytedenudation->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCnt ?>_ivf_oocytedenudation_modifiedby" class="ivf_oocytedenudation_modifiedby">
<span<?php echo $ivf_oocytedenudation->modifiedby->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->modifieddatetime->Visible) { // modifieddatetime ?>
		<td<?php echo $ivf_oocytedenudation->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCnt ?>_ivf_oocytedenudation_modifieddatetime" class="ivf_oocytedenudation_modifieddatetime">
<span<?php echo $ivf_oocytedenudation->modifieddatetime->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->TidNo->Visible) { // TidNo ?>
		<td<?php echo $ivf_oocytedenudation->TidNo->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCnt ?>_ivf_oocytedenudation_TidNo" class="ivf_oocytedenudation_TidNo">
<span<?php echo $ivf_oocytedenudation->TidNo->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->TidNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->ExpFollicles->Visible) { // ExpFollicles ?>
		<td<?php echo $ivf_oocytedenudation->ExpFollicles->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCnt ?>_ivf_oocytedenudation_ExpFollicles" class="ivf_oocytedenudation_ExpFollicles">
<span<?php echo $ivf_oocytedenudation->ExpFollicles->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->ExpFollicles->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->SecondaryDenudationDoneBy->Visible) { // SecondaryDenudationDoneBy ?>
		<td<?php echo $ivf_oocytedenudation->SecondaryDenudationDoneBy->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCnt ?>_ivf_oocytedenudation_SecondaryDenudationDoneBy" class="ivf_oocytedenudation_SecondaryDenudationDoneBy">
<span<?php echo $ivf_oocytedenudation->SecondaryDenudationDoneBy->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->SecondaryDenudationDoneBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->OocyteOrgin->Visible) { // OocyteOrgin ?>
		<td<?php echo $ivf_oocytedenudation->OocyteOrgin->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCnt ?>_ivf_oocytedenudation_OocyteOrgin" class="ivf_oocytedenudation_OocyteOrgin">
<span<?php echo $ivf_oocytedenudation->OocyteOrgin->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->OocyteOrgin->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->patient1->Visible) { // patient1 ?>
		<td<?php echo $ivf_oocytedenudation->patient1->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCnt ?>_ivf_oocytedenudation_patient1" class="ivf_oocytedenudation_patient1">
<span<?php echo $ivf_oocytedenudation->patient1->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->patient1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->OocyteType->Visible) { // OocyteType ?>
		<td<?php echo $ivf_oocytedenudation->OocyteType->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCnt ?>_ivf_oocytedenudation_OocyteType" class="ivf_oocytedenudation_OocyteType">
<span<?php echo $ivf_oocytedenudation->OocyteType->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->OocyteType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->MIOocytesDonate1->Visible) { // MIOocytesDonate1 ?>
		<td<?php echo $ivf_oocytedenudation->MIOocytesDonate1->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCnt ?>_ivf_oocytedenudation_MIOocytesDonate1" class="ivf_oocytedenudation_MIOocytesDonate1">
<span<?php echo $ivf_oocytedenudation->MIOocytesDonate1->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->MIOocytesDonate1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->MIOocytesDonate2->Visible) { // MIOocytesDonate2 ?>
		<td<?php echo $ivf_oocytedenudation->MIOocytesDonate2->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCnt ?>_ivf_oocytedenudation_MIOocytesDonate2" class="ivf_oocytedenudation_MIOocytesDonate2">
<span<?php echo $ivf_oocytedenudation->MIOocytesDonate2->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->MIOocytesDonate2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->SelfMI->Visible) { // SelfMI ?>
		<td<?php echo $ivf_oocytedenudation->SelfMI->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCnt ?>_ivf_oocytedenudation_SelfMI" class="ivf_oocytedenudation_SelfMI">
<span<?php echo $ivf_oocytedenudation->SelfMI->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->SelfMI->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->SelfMII->Visible) { // SelfMII ?>
		<td<?php echo $ivf_oocytedenudation->SelfMII->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCnt ?>_ivf_oocytedenudation_SelfMII" class="ivf_oocytedenudation_SelfMII">
<span<?php echo $ivf_oocytedenudation->SelfMII->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->SelfMII->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->patient3->Visible) { // patient3 ?>
		<td<?php echo $ivf_oocytedenudation->patient3->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCnt ?>_ivf_oocytedenudation_patient3" class="ivf_oocytedenudation_patient3">
<span<?php echo $ivf_oocytedenudation->patient3->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->patient3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->patient4->Visible) { // patient4 ?>
		<td<?php echo $ivf_oocytedenudation->patient4->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCnt ?>_ivf_oocytedenudation_patient4" class="ivf_oocytedenudation_patient4">
<span<?php echo $ivf_oocytedenudation->patient4->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->patient4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->OocytesDonate3->Visible) { // OocytesDonate3 ?>
		<td<?php echo $ivf_oocytedenudation->OocytesDonate3->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCnt ?>_ivf_oocytedenudation_OocytesDonate3" class="ivf_oocytedenudation_OocytesDonate3">
<span<?php echo $ivf_oocytedenudation->OocytesDonate3->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->OocytesDonate3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->OocytesDonate4->Visible) { // OocytesDonate4 ?>
		<td<?php echo $ivf_oocytedenudation->OocytesDonate4->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCnt ?>_ivf_oocytedenudation_OocytesDonate4" class="ivf_oocytedenudation_OocytesDonate4">
<span<?php echo $ivf_oocytedenudation->OocytesDonate4->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->OocytesDonate4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->MIOocytesDonate3->Visible) { // MIOocytesDonate3 ?>
		<td<?php echo $ivf_oocytedenudation->MIOocytesDonate3->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCnt ?>_ivf_oocytedenudation_MIOocytesDonate3" class="ivf_oocytedenudation_MIOocytesDonate3">
<span<?php echo $ivf_oocytedenudation->MIOocytesDonate3->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->MIOocytesDonate3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->MIOocytesDonate4->Visible) { // MIOocytesDonate4 ?>
		<td<?php echo $ivf_oocytedenudation->MIOocytesDonate4->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCnt ?>_ivf_oocytedenudation_MIOocytesDonate4" class="ivf_oocytedenudation_MIOocytesDonate4">
<span<?php echo $ivf_oocytedenudation->MIOocytesDonate4->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->MIOocytesDonate4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->SelfOocytesMI->Visible) { // SelfOocytesMI ?>
		<td<?php echo $ivf_oocytedenudation->SelfOocytesMI->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCnt ?>_ivf_oocytedenudation_SelfOocytesMI" class="ivf_oocytedenudation_SelfOocytesMI">
<span<?php echo $ivf_oocytedenudation->SelfOocytesMI->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->SelfOocytesMI->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->SelfOocytesMII->Visible) { // SelfOocytesMII ?>
		<td<?php echo $ivf_oocytedenudation->SelfOocytesMII->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCnt ?>_ivf_oocytedenudation_SelfOocytesMII" class="ivf_oocytedenudation_SelfOocytesMII">
<span<?php echo $ivf_oocytedenudation->SelfOocytesMII->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->SelfOocytesMII->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($ivf_oocytedenudation->donor->Visible) { // donor ?>
		<td<?php echo $ivf_oocytedenudation->donor->cellAttributes() ?>>
<span id="el<?php echo $ivf_oocytedenudation_delete->RowCnt ?>_ivf_oocytedenudation_donor" class="ivf_oocytedenudation_donor">
<span<?php echo $ivf_oocytedenudation->donor->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->donor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$ivf_oocytedenudation_delete->Recordset->moveNext();
}
$ivf_oocytedenudation_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $ivf_oocytedenudation_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$ivf_oocytedenudation_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$ivf_oocytedenudation_delete->terminate();
?>