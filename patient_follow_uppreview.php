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
WriteHeader(FALSE, "utf-8");

// Create page object
$patient_follow_up_preview = new patient_follow_up_preview();

// Run the page
$patient_follow_up_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_follow_up_preview->Page_Render();
?>
<?php $patient_follow_up_preview->showPageHeader(); ?>
<div class="card ew-grid patient_follow_up"><!-- .card -->
<?php if ($patient_follow_up_preview->TotalRecs > 0) { ?>
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$patient_follow_up_preview->renderListOptions();

// Render list options (header, left)
$patient_follow_up_preview->ListOptions->render("header", "left");
?>
<?php if ($patient_follow_up->id->Visible) { // id ?>
	<?php if ($patient_follow_up->SortUrl($patient_follow_up->id) == "") { ?>
		<th class="<?php echo $patient_follow_up->id->headerCellClass() ?>"><?php echo $patient_follow_up->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_follow_up->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_follow_up->id->Name ?>" data-sort-order="<?php echo $patient_follow_up_preview->SortField == $patient_follow_up->id->Name && $patient_follow_up_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_follow_up->id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_follow_up_preview->SortField == $patient_follow_up->id->Name) { ?><?php if ($patient_follow_up_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_follow_up_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_follow_up->PatID->Visible) { // PatID ?>
	<?php if ($patient_follow_up->SortUrl($patient_follow_up->PatID) == "") { ?>
		<th class="<?php echo $patient_follow_up->PatID->headerCellClass() ?>"><?php echo $patient_follow_up->PatID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_follow_up->PatID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_follow_up->PatID->Name ?>" data-sort-order="<?php echo $patient_follow_up_preview->SortField == $patient_follow_up->PatID->Name && $patient_follow_up_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_follow_up->PatID->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_follow_up_preview->SortField == $patient_follow_up->PatID->Name) { ?><?php if ($patient_follow_up_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_follow_up_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_follow_up->PatientName->Visible) { // PatientName ?>
	<?php if ($patient_follow_up->SortUrl($patient_follow_up->PatientName) == "") { ?>
		<th class="<?php echo $patient_follow_up->PatientName->headerCellClass() ?>"><?php echo $patient_follow_up->PatientName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_follow_up->PatientName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_follow_up->PatientName->Name ?>" data-sort-order="<?php echo $patient_follow_up_preview->SortField == $patient_follow_up->PatientName->Name && $patient_follow_up_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_follow_up->PatientName->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_follow_up_preview->SortField == $patient_follow_up->PatientName->Name) { ?><?php if ($patient_follow_up_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_follow_up_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_follow_up->MobileNumber->Visible) { // MobileNumber ?>
	<?php if ($patient_follow_up->SortUrl($patient_follow_up->MobileNumber) == "") { ?>
		<th class="<?php echo $patient_follow_up->MobileNumber->headerCellClass() ?>"><?php echo $patient_follow_up->MobileNumber->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_follow_up->MobileNumber->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_follow_up->MobileNumber->Name ?>" data-sort-order="<?php echo $patient_follow_up_preview->SortField == $patient_follow_up->MobileNumber->Name && $patient_follow_up_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_follow_up->MobileNumber->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_follow_up_preview->SortField == $patient_follow_up->MobileNumber->Name) { ?><?php if ($patient_follow_up_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_follow_up_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_follow_up->mrnno->Visible) { // mrnno ?>
	<?php if ($patient_follow_up->SortUrl($patient_follow_up->mrnno) == "") { ?>
		<th class="<?php echo $patient_follow_up->mrnno->headerCellClass() ?>"><?php echo $patient_follow_up->mrnno->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_follow_up->mrnno->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_follow_up->mrnno->Name ?>" data-sort-order="<?php echo $patient_follow_up_preview->SortField == $patient_follow_up->mrnno->Name && $patient_follow_up_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_follow_up->mrnno->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_follow_up_preview->SortField == $patient_follow_up->mrnno->Name) { ?><?php if ($patient_follow_up_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_follow_up_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_follow_up->BP->Visible) { // BP ?>
	<?php if ($patient_follow_up->SortUrl($patient_follow_up->BP) == "") { ?>
		<th class="<?php echo $patient_follow_up->BP->headerCellClass() ?>"><?php echo $patient_follow_up->BP->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_follow_up->BP->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_follow_up->BP->Name ?>" data-sort-order="<?php echo $patient_follow_up_preview->SortField == $patient_follow_up->BP->Name && $patient_follow_up_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_follow_up->BP->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_follow_up_preview->SortField == $patient_follow_up->BP->Name) { ?><?php if ($patient_follow_up_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_follow_up_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_follow_up->Pulse->Visible) { // Pulse ?>
	<?php if ($patient_follow_up->SortUrl($patient_follow_up->Pulse) == "") { ?>
		<th class="<?php echo $patient_follow_up->Pulse->headerCellClass() ?>"><?php echo $patient_follow_up->Pulse->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_follow_up->Pulse->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_follow_up->Pulse->Name ?>" data-sort-order="<?php echo $patient_follow_up_preview->SortField == $patient_follow_up->Pulse->Name && $patient_follow_up_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_follow_up->Pulse->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_follow_up_preview->SortField == $patient_follow_up->Pulse->Name) { ?><?php if ($patient_follow_up_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_follow_up_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_follow_up->Resp->Visible) { // Resp ?>
	<?php if ($patient_follow_up->SortUrl($patient_follow_up->Resp) == "") { ?>
		<th class="<?php echo $patient_follow_up->Resp->headerCellClass() ?>"><?php echo $patient_follow_up->Resp->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_follow_up->Resp->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_follow_up->Resp->Name ?>" data-sort-order="<?php echo $patient_follow_up_preview->SortField == $patient_follow_up->Resp->Name && $patient_follow_up_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_follow_up->Resp->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_follow_up_preview->SortField == $patient_follow_up->Resp->Name) { ?><?php if ($patient_follow_up_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_follow_up_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_follow_up->SPO2->Visible) { // SPO2 ?>
	<?php if ($patient_follow_up->SortUrl($patient_follow_up->SPO2) == "") { ?>
		<th class="<?php echo $patient_follow_up->SPO2->headerCellClass() ?>"><?php echo $patient_follow_up->SPO2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_follow_up->SPO2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_follow_up->SPO2->Name ?>" data-sort-order="<?php echo $patient_follow_up_preview->SortField == $patient_follow_up->SPO2->Name && $patient_follow_up_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_follow_up->SPO2->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_follow_up_preview->SortField == $patient_follow_up->SPO2->Name) { ?><?php if ($patient_follow_up_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_follow_up_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_follow_up->NextReviewDate->Visible) { // NextReviewDate ?>
	<?php if ($patient_follow_up->SortUrl($patient_follow_up->NextReviewDate) == "") { ?>
		<th class="<?php echo $patient_follow_up->NextReviewDate->headerCellClass() ?>"><?php echo $patient_follow_up->NextReviewDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_follow_up->NextReviewDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_follow_up->NextReviewDate->Name ?>" data-sort-order="<?php echo $patient_follow_up_preview->SortField == $patient_follow_up->NextReviewDate->Name && $patient_follow_up_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_follow_up->NextReviewDate->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_follow_up_preview->SortField == $patient_follow_up->NextReviewDate->Name) { ?><?php if ($patient_follow_up_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_follow_up_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_follow_up->Age->Visible) { // Age ?>
	<?php if ($patient_follow_up->SortUrl($patient_follow_up->Age) == "") { ?>
		<th class="<?php echo $patient_follow_up->Age->headerCellClass() ?>"><?php echo $patient_follow_up->Age->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_follow_up->Age->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_follow_up->Age->Name ?>" data-sort-order="<?php echo $patient_follow_up_preview->SortField == $patient_follow_up->Age->Name && $patient_follow_up_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_follow_up->Age->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_follow_up_preview->SortField == $patient_follow_up->Age->Name) { ?><?php if ($patient_follow_up_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_follow_up_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_follow_up->Gender->Visible) { // Gender ?>
	<?php if ($patient_follow_up->SortUrl($patient_follow_up->Gender) == "") { ?>
		<th class="<?php echo $patient_follow_up->Gender->headerCellClass() ?>"><?php echo $patient_follow_up->Gender->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_follow_up->Gender->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_follow_up->Gender->Name ?>" data-sort-order="<?php echo $patient_follow_up_preview->SortField == $patient_follow_up->Gender->Name && $patient_follow_up_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_follow_up->Gender->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_follow_up_preview->SortField == $patient_follow_up->Gender->Name) { ?><?php if ($patient_follow_up_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_follow_up_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_follow_up->HospID->Visible) { // HospID ?>
	<?php if ($patient_follow_up->SortUrl($patient_follow_up->HospID) == "") { ?>
		<th class="<?php echo $patient_follow_up->HospID->headerCellClass() ?>"><?php echo $patient_follow_up->HospID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_follow_up->HospID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_follow_up->HospID->Name ?>" data-sort-order="<?php echo $patient_follow_up_preview->SortField == $patient_follow_up->HospID->Name && $patient_follow_up_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_follow_up->HospID->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_follow_up_preview->SortField == $patient_follow_up->HospID->Name) { ?><?php if ($patient_follow_up_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_follow_up_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_follow_up->Reception->Visible) { // Reception ?>
	<?php if ($patient_follow_up->SortUrl($patient_follow_up->Reception) == "") { ?>
		<th class="<?php echo $patient_follow_up->Reception->headerCellClass() ?>"><?php echo $patient_follow_up->Reception->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_follow_up->Reception->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_follow_up->Reception->Name ?>" data-sort-order="<?php echo $patient_follow_up_preview->SortField == $patient_follow_up->Reception->Name && $patient_follow_up_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_follow_up->Reception->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_follow_up_preview->SortField == $patient_follow_up->Reception->Name) { ?><?php if ($patient_follow_up_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_follow_up_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_follow_up->PatientId->Visible) { // PatientId ?>
	<?php if ($patient_follow_up->SortUrl($patient_follow_up->PatientId) == "") { ?>
		<th class="<?php echo $patient_follow_up->PatientId->headerCellClass() ?>"><?php echo $patient_follow_up->PatientId->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_follow_up->PatientId->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $patient_follow_up->PatientId->Name ?>" data-sort-order="<?php echo $patient_follow_up_preview->SortField == $patient_follow_up->PatientId->Name && $patient_follow_up_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $patient_follow_up->PatientId->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($patient_follow_up_preview->SortField == $patient_follow_up->PatientId->Name) { ?><?php if ($patient_follow_up_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($patient_follow_up_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$patient_follow_up_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$patient_follow_up_preview->RecCount = 0;
$patient_follow_up_preview->RowCnt = 0;
while ($patient_follow_up_preview->Recordset && !$patient_follow_up_preview->Recordset->EOF) {

	// Init row class and style
	$patient_follow_up_preview->RecCount++;
	$patient_follow_up_preview->RowCnt++;
	$patient_follow_up_preview->CssStyle = "";
	$patient_follow_up_preview->loadListRowValues($patient_follow_up_preview->Recordset);

	// Render row
	$patient_follow_up_preview->RowType = ROWTYPE_PREVIEW; // Preview record
	$patient_follow_up_preview->resetAttributes();
	$patient_follow_up_preview->renderListRow();

	// Render list options
	$patient_follow_up_preview->renderListOptions();
?>
	<tr<?php echo $patient_follow_up_preview->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_follow_up_preview->ListOptions->render("body", "left", $patient_follow_up_preview->RowCnt);
?>
<?php if ($patient_follow_up->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $patient_follow_up->id->cellAttributes() ?>>
<span<?php echo $patient_follow_up->id->viewAttributes() ?>>
<?php echo $patient_follow_up->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_follow_up->PatID->Visible) { // PatID ?>
		<!-- PatID -->
		<td<?php echo $patient_follow_up->PatID->cellAttributes() ?>>
<span<?php echo $patient_follow_up->PatID->viewAttributes() ?>>
<?php echo $patient_follow_up->PatID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_follow_up->PatientName->Visible) { // PatientName ?>
		<!-- PatientName -->
		<td<?php echo $patient_follow_up->PatientName->cellAttributes() ?>>
<span<?php echo $patient_follow_up->PatientName->viewAttributes() ?>>
<?php echo $patient_follow_up->PatientName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_follow_up->MobileNumber->Visible) { // MobileNumber ?>
		<!-- MobileNumber -->
		<td<?php echo $patient_follow_up->MobileNumber->cellAttributes() ?>>
<span<?php echo $patient_follow_up->MobileNumber->viewAttributes() ?>>
<?php echo $patient_follow_up->MobileNumber->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_follow_up->mrnno->Visible) { // mrnno ?>
		<!-- mrnno -->
		<td<?php echo $patient_follow_up->mrnno->cellAttributes() ?>>
<span<?php echo $patient_follow_up->mrnno->viewAttributes() ?>>
<?php echo $patient_follow_up->mrnno->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_follow_up->BP->Visible) { // BP ?>
		<!-- BP -->
		<td<?php echo $patient_follow_up->BP->cellAttributes() ?>>
<span<?php echo $patient_follow_up->BP->viewAttributes() ?>>
<?php echo $patient_follow_up->BP->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_follow_up->Pulse->Visible) { // Pulse ?>
		<!-- Pulse -->
		<td<?php echo $patient_follow_up->Pulse->cellAttributes() ?>>
<span<?php echo $patient_follow_up->Pulse->viewAttributes() ?>>
<?php echo $patient_follow_up->Pulse->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_follow_up->Resp->Visible) { // Resp ?>
		<!-- Resp -->
		<td<?php echo $patient_follow_up->Resp->cellAttributes() ?>>
<span<?php echo $patient_follow_up->Resp->viewAttributes() ?>>
<?php echo $patient_follow_up->Resp->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_follow_up->SPO2->Visible) { // SPO2 ?>
		<!-- SPO2 -->
		<td<?php echo $patient_follow_up->SPO2->cellAttributes() ?>>
<span<?php echo $patient_follow_up->SPO2->viewAttributes() ?>>
<?php echo $patient_follow_up->SPO2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_follow_up->NextReviewDate->Visible) { // NextReviewDate ?>
		<!-- NextReviewDate -->
		<td<?php echo $patient_follow_up->NextReviewDate->cellAttributes() ?>>
<span<?php echo $patient_follow_up->NextReviewDate->viewAttributes() ?>>
<?php echo $patient_follow_up->NextReviewDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_follow_up->Age->Visible) { // Age ?>
		<!-- Age -->
		<td<?php echo $patient_follow_up->Age->cellAttributes() ?>>
<span<?php echo $patient_follow_up->Age->viewAttributes() ?>>
<?php echo $patient_follow_up->Age->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_follow_up->Gender->Visible) { // Gender ?>
		<!-- Gender -->
		<td<?php echo $patient_follow_up->Gender->cellAttributes() ?>>
<span<?php echo $patient_follow_up->Gender->viewAttributes() ?>>
<?php echo $patient_follow_up->Gender->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_follow_up->HospID->Visible) { // HospID ?>
		<!-- HospID -->
		<td<?php echo $patient_follow_up->HospID->cellAttributes() ?>>
<span<?php echo $patient_follow_up->HospID->viewAttributes() ?>>
<?php echo $patient_follow_up->HospID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_follow_up->Reception->Visible) { // Reception ?>
		<!-- Reception -->
		<td<?php echo $patient_follow_up->Reception->cellAttributes() ?>>
<span<?php echo $patient_follow_up->Reception->viewAttributes() ?>>
<?php echo $patient_follow_up->Reception->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_follow_up->PatientId->Visible) { // PatientId ?>
		<!-- PatientId -->
		<td<?php echo $patient_follow_up->PatientId->cellAttributes() ?>>
<span<?php echo $patient_follow_up->PatientId->viewAttributes() ?>>
<?php echo $patient_follow_up->PatientId->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$patient_follow_up_preview->ListOptions->render("body", "right", $patient_follow_up_preview->RowCnt);
?>
	</tr>
<?php
	$patient_follow_up_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<?php } ?>
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php if ($patient_follow_up_preview->TotalRecs > 0) { ?>
<?php if (!isset($patient_follow_up_preview->Pager)) $patient_follow_up_preview->Pager = new PrevNextPager($patient_follow_up_preview->StartRec, $patient_follow_up_preview->DisplayRecs, $patient_follow_up_preview->TotalRecs) ?>
<?php if ($patient_follow_up_preview->Pager->RecordCount > 0 && $patient_follow_up_preview->Pager->Visible) { ?>
<div class="ew-pager"><div class="ew-prev-next"><div class="btn-group btn-group-sm ew-btn-group">
<!--first page button-->
	<?php if ($patient_follow_up_preview->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" data-start="<?php echo $patient_follow_up_preview->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($patient_follow_up_preview->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" data-start="<?php echo $patient_follow_up_preview->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
<!--next page button-->
	<?php if ($patient_follow_up_preview->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" data-start="<?php echo $patient_follow_up_preview->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($patient_follow_up_preview->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" data-start="<?php echo $patient_follow_up_preview->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div></div></div>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $patient_follow_up_preview->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $patient_follow_up_preview->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $patient_follow_up_preview->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php } else { ?>
<div class="ew-detail-count"><?php echo $Language->Phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($patient_follow_up_preview->OtherOptions as &$option)
		$option->render("body");
?>
</div>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
</div><!-- /.card -->
<?php
$patient_follow_up_preview->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php
if ($patient_follow_up_preview->Recordset)
	$patient_follow_up_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$patient_follow_up_preview->terminate();
?>