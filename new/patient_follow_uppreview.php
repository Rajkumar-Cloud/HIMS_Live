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
<?php if ($patient_follow_up_preview->TotalRecords > 0) { ?>
<div class="card ew-grid patient_follow_up"><!-- .card -->
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel ew-preview-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$patient_follow_up_preview->renderListOptions();

// Render list options (header, left)
$patient_follow_up_preview->ListOptions->render("header", "left");
?>
<?php if ($patient_follow_up_preview->id->Visible) { // id ?>
	<?php if ($patient_follow_up->SortUrl($patient_follow_up_preview->id) == "") { ?>
		<th class="<?php echo $patient_follow_up_preview->id->headerCellClass() ?>"><?php echo $patient_follow_up_preview->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_follow_up_preview->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_follow_up_preview->id->Name) ?>" data-sort-order="<?php echo $patient_follow_up_preview->SortField == $patient_follow_up_preview->id->Name && $patient_follow_up_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_follow_up_preview->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_follow_up_preview->SortField == $patient_follow_up_preview->id->Name) { ?><?php if ($patient_follow_up_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_follow_up_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_follow_up_preview->PatID->Visible) { // PatID ?>
	<?php if ($patient_follow_up->SortUrl($patient_follow_up_preview->PatID) == "") { ?>
		<th class="<?php echo $patient_follow_up_preview->PatID->headerCellClass() ?>"><?php echo $patient_follow_up_preview->PatID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_follow_up_preview->PatID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_follow_up_preview->PatID->Name) ?>" data-sort-order="<?php echo $patient_follow_up_preview->SortField == $patient_follow_up_preview->PatID->Name && $patient_follow_up_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_follow_up_preview->PatID->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_follow_up_preview->SortField == $patient_follow_up_preview->PatID->Name) { ?><?php if ($patient_follow_up_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_follow_up_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_follow_up_preview->PatientName->Visible) { // PatientName ?>
	<?php if ($patient_follow_up->SortUrl($patient_follow_up_preview->PatientName) == "") { ?>
		<th class="<?php echo $patient_follow_up_preview->PatientName->headerCellClass() ?>"><?php echo $patient_follow_up_preview->PatientName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_follow_up_preview->PatientName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_follow_up_preview->PatientName->Name) ?>" data-sort-order="<?php echo $patient_follow_up_preview->SortField == $patient_follow_up_preview->PatientName->Name && $patient_follow_up_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_follow_up_preview->PatientName->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_follow_up_preview->SortField == $patient_follow_up_preview->PatientName->Name) { ?><?php if ($patient_follow_up_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_follow_up_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_follow_up_preview->MobileNumber->Visible) { // MobileNumber ?>
	<?php if ($patient_follow_up->SortUrl($patient_follow_up_preview->MobileNumber) == "") { ?>
		<th class="<?php echo $patient_follow_up_preview->MobileNumber->headerCellClass() ?>"><?php echo $patient_follow_up_preview->MobileNumber->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_follow_up_preview->MobileNumber->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_follow_up_preview->MobileNumber->Name) ?>" data-sort-order="<?php echo $patient_follow_up_preview->SortField == $patient_follow_up_preview->MobileNumber->Name && $patient_follow_up_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_follow_up_preview->MobileNumber->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_follow_up_preview->SortField == $patient_follow_up_preview->MobileNumber->Name) { ?><?php if ($patient_follow_up_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_follow_up_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_follow_up_preview->mrnno->Visible) { // mrnno ?>
	<?php if ($patient_follow_up->SortUrl($patient_follow_up_preview->mrnno) == "") { ?>
		<th class="<?php echo $patient_follow_up_preview->mrnno->headerCellClass() ?>"><?php echo $patient_follow_up_preview->mrnno->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_follow_up_preview->mrnno->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_follow_up_preview->mrnno->Name) ?>" data-sort-order="<?php echo $patient_follow_up_preview->SortField == $patient_follow_up_preview->mrnno->Name && $patient_follow_up_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_follow_up_preview->mrnno->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_follow_up_preview->SortField == $patient_follow_up_preview->mrnno->Name) { ?><?php if ($patient_follow_up_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_follow_up_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_follow_up_preview->BP->Visible) { // BP ?>
	<?php if ($patient_follow_up->SortUrl($patient_follow_up_preview->BP) == "") { ?>
		<th class="<?php echo $patient_follow_up_preview->BP->headerCellClass() ?>"><?php echo $patient_follow_up_preview->BP->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_follow_up_preview->BP->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_follow_up_preview->BP->Name) ?>" data-sort-order="<?php echo $patient_follow_up_preview->SortField == $patient_follow_up_preview->BP->Name && $patient_follow_up_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_follow_up_preview->BP->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_follow_up_preview->SortField == $patient_follow_up_preview->BP->Name) { ?><?php if ($patient_follow_up_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_follow_up_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_follow_up_preview->Pulse->Visible) { // Pulse ?>
	<?php if ($patient_follow_up->SortUrl($patient_follow_up_preview->Pulse) == "") { ?>
		<th class="<?php echo $patient_follow_up_preview->Pulse->headerCellClass() ?>"><?php echo $patient_follow_up_preview->Pulse->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_follow_up_preview->Pulse->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_follow_up_preview->Pulse->Name) ?>" data-sort-order="<?php echo $patient_follow_up_preview->SortField == $patient_follow_up_preview->Pulse->Name && $patient_follow_up_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_follow_up_preview->Pulse->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_follow_up_preview->SortField == $patient_follow_up_preview->Pulse->Name) { ?><?php if ($patient_follow_up_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_follow_up_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_follow_up_preview->Resp->Visible) { // Resp ?>
	<?php if ($patient_follow_up->SortUrl($patient_follow_up_preview->Resp) == "") { ?>
		<th class="<?php echo $patient_follow_up_preview->Resp->headerCellClass() ?>"><?php echo $patient_follow_up_preview->Resp->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_follow_up_preview->Resp->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_follow_up_preview->Resp->Name) ?>" data-sort-order="<?php echo $patient_follow_up_preview->SortField == $patient_follow_up_preview->Resp->Name && $patient_follow_up_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_follow_up_preview->Resp->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_follow_up_preview->SortField == $patient_follow_up_preview->Resp->Name) { ?><?php if ($patient_follow_up_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_follow_up_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_follow_up_preview->SPO2->Visible) { // SPO2 ?>
	<?php if ($patient_follow_up->SortUrl($patient_follow_up_preview->SPO2) == "") { ?>
		<th class="<?php echo $patient_follow_up_preview->SPO2->headerCellClass() ?>"><?php echo $patient_follow_up_preview->SPO2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_follow_up_preview->SPO2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_follow_up_preview->SPO2->Name) ?>" data-sort-order="<?php echo $patient_follow_up_preview->SortField == $patient_follow_up_preview->SPO2->Name && $patient_follow_up_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_follow_up_preview->SPO2->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_follow_up_preview->SortField == $patient_follow_up_preview->SPO2->Name) { ?><?php if ($patient_follow_up_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_follow_up_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_follow_up_preview->NextReviewDate->Visible) { // NextReviewDate ?>
	<?php if ($patient_follow_up->SortUrl($patient_follow_up_preview->NextReviewDate) == "") { ?>
		<th class="<?php echo $patient_follow_up_preview->NextReviewDate->headerCellClass() ?>"><?php echo $patient_follow_up_preview->NextReviewDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_follow_up_preview->NextReviewDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_follow_up_preview->NextReviewDate->Name) ?>" data-sort-order="<?php echo $patient_follow_up_preview->SortField == $patient_follow_up_preview->NextReviewDate->Name && $patient_follow_up_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_follow_up_preview->NextReviewDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_follow_up_preview->SortField == $patient_follow_up_preview->NextReviewDate->Name) { ?><?php if ($patient_follow_up_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_follow_up_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_follow_up_preview->Age->Visible) { // Age ?>
	<?php if ($patient_follow_up->SortUrl($patient_follow_up_preview->Age) == "") { ?>
		<th class="<?php echo $patient_follow_up_preview->Age->headerCellClass() ?>"><?php echo $patient_follow_up_preview->Age->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_follow_up_preview->Age->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_follow_up_preview->Age->Name) ?>" data-sort-order="<?php echo $patient_follow_up_preview->SortField == $patient_follow_up_preview->Age->Name && $patient_follow_up_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_follow_up_preview->Age->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_follow_up_preview->SortField == $patient_follow_up_preview->Age->Name) { ?><?php if ($patient_follow_up_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_follow_up_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_follow_up_preview->Gender->Visible) { // Gender ?>
	<?php if ($patient_follow_up->SortUrl($patient_follow_up_preview->Gender) == "") { ?>
		<th class="<?php echo $patient_follow_up_preview->Gender->headerCellClass() ?>"><?php echo $patient_follow_up_preview->Gender->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_follow_up_preview->Gender->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_follow_up_preview->Gender->Name) ?>" data-sort-order="<?php echo $patient_follow_up_preview->SortField == $patient_follow_up_preview->Gender->Name && $patient_follow_up_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_follow_up_preview->Gender->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_follow_up_preview->SortField == $patient_follow_up_preview->Gender->Name) { ?><?php if ($patient_follow_up_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_follow_up_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_follow_up_preview->HospID->Visible) { // HospID ?>
	<?php if ($patient_follow_up->SortUrl($patient_follow_up_preview->HospID) == "") { ?>
		<th class="<?php echo $patient_follow_up_preview->HospID->headerCellClass() ?>"><?php echo $patient_follow_up_preview->HospID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_follow_up_preview->HospID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_follow_up_preview->HospID->Name) ?>" data-sort-order="<?php echo $patient_follow_up_preview->SortField == $patient_follow_up_preview->HospID->Name && $patient_follow_up_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_follow_up_preview->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_follow_up_preview->SortField == $patient_follow_up_preview->HospID->Name) { ?><?php if ($patient_follow_up_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_follow_up_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_follow_up_preview->Reception->Visible) { // Reception ?>
	<?php if ($patient_follow_up->SortUrl($patient_follow_up_preview->Reception) == "") { ?>
		<th class="<?php echo $patient_follow_up_preview->Reception->headerCellClass() ?>"><?php echo $patient_follow_up_preview->Reception->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_follow_up_preview->Reception->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_follow_up_preview->Reception->Name) ?>" data-sort-order="<?php echo $patient_follow_up_preview->SortField == $patient_follow_up_preview->Reception->Name && $patient_follow_up_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_follow_up_preview->Reception->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_follow_up_preview->SortField == $patient_follow_up_preview->Reception->Name) { ?><?php if ($patient_follow_up_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_follow_up_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_follow_up_preview->PatientId->Visible) { // PatientId ?>
	<?php if ($patient_follow_up->SortUrl($patient_follow_up_preview->PatientId) == "") { ?>
		<th class="<?php echo $patient_follow_up_preview->PatientId->headerCellClass() ?>"><?php echo $patient_follow_up_preview->PatientId->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_follow_up_preview->PatientId->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_follow_up_preview->PatientId->Name) ?>" data-sort-order="<?php echo $patient_follow_up_preview->SortField == $patient_follow_up_preview->PatientId->Name && $patient_follow_up_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_follow_up_preview->PatientId->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_follow_up_preview->SortField == $patient_follow_up_preview->PatientId->Name) { ?><?php if ($patient_follow_up_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_follow_up_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
$patient_follow_up_preview->RowCount = 0;
while ($patient_follow_up_preview->Recordset && !$patient_follow_up_preview->Recordset->EOF) {

	// Init row class and style
	$patient_follow_up_preview->RecCount++;
	$patient_follow_up_preview->RowCount++;
	$patient_follow_up_preview->CssStyle = "";
	$patient_follow_up_preview->loadListRowValues($patient_follow_up_preview->Recordset);

	// Render row
	$patient_follow_up->RowType = ROWTYPE_PREVIEW; // Preview record
	$patient_follow_up_preview->resetAttributes();
	$patient_follow_up_preview->renderListRow();

	// Render list options
	$patient_follow_up_preview->renderListOptions();
?>
	<tr <?php echo $patient_follow_up->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_follow_up_preview->ListOptions->render("body", "left", $patient_follow_up_preview->RowCount);
?>
<?php if ($patient_follow_up_preview->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $patient_follow_up_preview->id->cellAttributes() ?>>
<span<?php echo $patient_follow_up_preview->id->viewAttributes() ?>><?php echo $patient_follow_up_preview->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_follow_up_preview->PatID->Visible) { // PatID ?>
		<!-- PatID -->
		<td<?php echo $patient_follow_up_preview->PatID->cellAttributes() ?>>
<span<?php echo $patient_follow_up_preview->PatID->viewAttributes() ?>><?php echo $patient_follow_up_preview->PatID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_follow_up_preview->PatientName->Visible) { // PatientName ?>
		<!-- PatientName -->
		<td<?php echo $patient_follow_up_preview->PatientName->cellAttributes() ?>>
<span<?php echo $patient_follow_up_preview->PatientName->viewAttributes() ?>><?php echo $patient_follow_up_preview->PatientName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_follow_up_preview->MobileNumber->Visible) { // MobileNumber ?>
		<!-- MobileNumber -->
		<td<?php echo $patient_follow_up_preview->MobileNumber->cellAttributes() ?>>
<span<?php echo $patient_follow_up_preview->MobileNumber->viewAttributes() ?>><?php echo $patient_follow_up_preview->MobileNumber->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_follow_up_preview->mrnno->Visible) { // mrnno ?>
		<!-- mrnno -->
		<td<?php echo $patient_follow_up_preview->mrnno->cellAttributes() ?>>
<span<?php echo $patient_follow_up_preview->mrnno->viewAttributes() ?>><?php echo $patient_follow_up_preview->mrnno->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_follow_up_preview->BP->Visible) { // BP ?>
		<!-- BP -->
		<td<?php echo $patient_follow_up_preview->BP->cellAttributes() ?>>
<span<?php echo $patient_follow_up_preview->BP->viewAttributes() ?>><?php echo $patient_follow_up_preview->BP->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_follow_up_preview->Pulse->Visible) { // Pulse ?>
		<!-- Pulse -->
		<td<?php echo $patient_follow_up_preview->Pulse->cellAttributes() ?>>
<span<?php echo $patient_follow_up_preview->Pulse->viewAttributes() ?>><?php echo $patient_follow_up_preview->Pulse->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_follow_up_preview->Resp->Visible) { // Resp ?>
		<!-- Resp -->
		<td<?php echo $patient_follow_up_preview->Resp->cellAttributes() ?>>
<span<?php echo $patient_follow_up_preview->Resp->viewAttributes() ?>><?php echo $patient_follow_up_preview->Resp->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_follow_up_preview->SPO2->Visible) { // SPO2 ?>
		<!-- SPO2 -->
		<td<?php echo $patient_follow_up_preview->SPO2->cellAttributes() ?>>
<span<?php echo $patient_follow_up_preview->SPO2->viewAttributes() ?>><?php echo $patient_follow_up_preview->SPO2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_follow_up_preview->NextReviewDate->Visible) { // NextReviewDate ?>
		<!-- NextReviewDate -->
		<td<?php echo $patient_follow_up_preview->NextReviewDate->cellAttributes() ?>>
<span<?php echo $patient_follow_up_preview->NextReviewDate->viewAttributes() ?>><?php echo $patient_follow_up_preview->NextReviewDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_follow_up_preview->Age->Visible) { // Age ?>
		<!-- Age -->
		<td<?php echo $patient_follow_up_preview->Age->cellAttributes() ?>>
<span<?php echo $patient_follow_up_preview->Age->viewAttributes() ?>><?php echo $patient_follow_up_preview->Age->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_follow_up_preview->Gender->Visible) { // Gender ?>
		<!-- Gender -->
		<td<?php echo $patient_follow_up_preview->Gender->cellAttributes() ?>>
<span<?php echo $patient_follow_up_preview->Gender->viewAttributes() ?>><?php echo $patient_follow_up_preview->Gender->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_follow_up_preview->HospID->Visible) { // HospID ?>
		<!-- HospID -->
		<td<?php echo $patient_follow_up_preview->HospID->cellAttributes() ?>>
<span<?php echo $patient_follow_up_preview->HospID->viewAttributes() ?>><?php echo $patient_follow_up_preview->HospID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_follow_up_preview->Reception->Visible) { // Reception ?>
		<!-- Reception -->
		<td<?php echo $patient_follow_up_preview->Reception->cellAttributes() ?>>
<span<?php echo $patient_follow_up_preview->Reception->viewAttributes() ?>><?php echo $patient_follow_up_preview->Reception->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_follow_up_preview->PatientId->Visible) { // PatientId ?>
		<!-- PatientId -->
		<td<?php echo $patient_follow_up_preview->PatientId->cellAttributes() ?>>
<span<?php echo $patient_follow_up_preview->PatientId->viewAttributes() ?>><?php echo $patient_follow_up_preview->PatientId->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$patient_follow_up_preview->ListOptions->render("body", "right", $patient_follow_up_preview->RowCount);
?>
	</tr>
<?php
	$patient_follow_up_preview->Recordset->MoveNext();
} // while
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php echo $patient_follow_up_preview->Pager->render() ?>
<?php } else { // No record ?>
<div class="card no-border">
<div class="ew-detail-count"><?php echo $Language->phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($patient_follow_up_preview->OtherOptions as $option)
		$option->render("body");
?>
</div>
<?php if ($patient_follow_up_preview->TotalRecords > 0) { ?>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
<?php } ?>
</div><!-- /.card -->
<?php
$patient_follow_up_preview->showPageFooter();
if (Config("DEBUG"))
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