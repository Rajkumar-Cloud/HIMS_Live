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
$patient_history_preview = new patient_history_preview();

// Run the page
$patient_history_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_history_preview->Page_Render();
?>
<?php $patient_history_preview->showPageHeader(); ?>
<?php if ($patient_history_preview->TotalRecords > 0) { ?>
<div class="card ew-grid patient_history"><!-- .card -->
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel ew-preview-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$patient_history_preview->renderListOptions();

// Render list options (header, left)
$patient_history_preview->ListOptions->render("header", "left");
?>
<?php if ($patient_history_preview->id->Visible) { // id ?>
	<?php if ($patient_history->SortUrl($patient_history_preview->id) == "") { ?>
		<th class="<?php echo $patient_history_preview->id->headerCellClass() ?>"><?php echo $patient_history_preview->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_history_preview->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_history_preview->id->Name) ?>" data-sort-order="<?php echo $patient_history_preview->SortField == $patient_history_preview->id->Name && $patient_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_history_preview->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_history_preview->SortField == $patient_history_preview->id->Name) { ?><?php if ($patient_history_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_history_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_history_preview->mrnno->Visible) { // mrnno ?>
	<?php if ($patient_history->SortUrl($patient_history_preview->mrnno) == "") { ?>
		<th class="<?php echo $patient_history_preview->mrnno->headerCellClass() ?>"><?php echo $patient_history_preview->mrnno->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_history_preview->mrnno->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_history_preview->mrnno->Name) ?>" data-sort-order="<?php echo $patient_history_preview->SortField == $patient_history_preview->mrnno->Name && $patient_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_history_preview->mrnno->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_history_preview->SortField == $patient_history_preview->mrnno->Name) { ?><?php if ($patient_history_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_history_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_history_preview->PatientName->Visible) { // PatientName ?>
	<?php if ($patient_history->SortUrl($patient_history_preview->PatientName) == "") { ?>
		<th class="<?php echo $patient_history_preview->PatientName->headerCellClass() ?>"><?php echo $patient_history_preview->PatientName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_history_preview->PatientName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_history_preview->PatientName->Name) ?>" data-sort-order="<?php echo $patient_history_preview->SortField == $patient_history_preview->PatientName->Name && $patient_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_history_preview->PatientName->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_history_preview->SortField == $patient_history_preview->PatientName->Name) { ?><?php if ($patient_history_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_history_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_history_preview->PatientId->Visible) { // PatientId ?>
	<?php if ($patient_history->SortUrl($patient_history_preview->PatientId) == "") { ?>
		<th class="<?php echo $patient_history_preview->PatientId->headerCellClass() ?>"><?php echo $patient_history_preview->PatientId->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_history_preview->PatientId->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_history_preview->PatientId->Name) ?>" data-sort-order="<?php echo $patient_history_preview->SortField == $patient_history_preview->PatientId->Name && $patient_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_history_preview->PatientId->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_history_preview->SortField == $patient_history_preview->PatientId->Name) { ?><?php if ($patient_history_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_history_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_history_preview->MobileNumber->Visible) { // MobileNumber ?>
	<?php if ($patient_history->SortUrl($patient_history_preview->MobileNumber) == "") { ?>
		<th class="<?php echo $patient_history_preview->MobileNumber->headerCellClass() ?>"><?php echo $patient_history_preview->MobileNumber->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_history_preview->MobileNumber->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_history_preview->MobileNumber->Name) ?>" data-sort-order="<?php echo $patient_history_preview->SortField == $patient_history_preview->MobileNumber->Name && $patient_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_history_preview->MobileNumber->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_history_preview->SortField == $patient_history_preview->MobileNumber->Name) { ?><?php if ($patient_history_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_history_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_history_preview->MaritalHistory->Visible) { // MaritalHistory ?>
	<?php if ($patient_history->SortUrl($patient_history_preview->MaritalHistory) == "") { ?>
		<th class="<?php echo $patient_history_preview->MaritalHistory->headerCellClass() ?>"><?php echo $patient_history_preview->MaritalHistory->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_history_preview->MaritalHistory->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_history_preview->MaritalHistory->Name) ?>" data-sort-order="<?php echo $patient_history_preview->SortField == $patient_history_preview->MaritalHistory->Name && $patient_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_history_preview->MaritalHistory->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_history_preview->SortField == $patient_history_preview->MaritalHistory->Name) { ?><?php if ($patient_history_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_history_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_history_preview->MenstrualHistory->Visible) { // MenstrualHistory ?>
	<?php if ($patient_history->SortUrl($patient_history_preview->MenstrualHistory) == "") { ?>
		<th class="<?php echo $patient_history_preview->MenstrualHistory->headerCellClass() ?>"><?php echo $patient_history_preview->MenstrualHistory->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_history_preview->MenstrualHistory->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_history_preview->MenstrualHistory->Name) ?>" data-sort-order="<?php echo $patient_history_preview->SortField == $patient_history_preview->MenstrualHistory->Name && $patient_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_history_preview->MenstrualHistory->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_history_preview->SortField == $patient_history_preview->MenstrualHistory->Name) { ?><?php if ($patient_history_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_history_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_history_preview->ObstetricHistory->Visible) { // ObstetricHistory ?>
	<?php if ($patient_history->SortUrl($patient_history_preview->ObstetricHistory) == "") { ?>
		<th class="<?php echo $patient_history_preview->ObstetricHistory->headerCellClass() ?>"><?php echo $patient_history_preview->ObstetricHistory->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_history_preview->ObstetricHistory->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_history_preview->ObstetricHistory->Name) ?>" data-sort-order="<?php echo $patient_history_preview->SortField == $patient_history_preview->ObstetricHistory->Name && $patient_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_history_preview->ObstetricHistory->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_history_preview->SortField == $patient_history_preview->ObstetricHistory->Name) { ?><?php if ($patient_history_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_history_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_history_preview->Age->Visible) { // Age ?>
	<?php if ($patient_history->SortUrl($patient_history_preview->Age) == "") { ?>
		<th class="<?php echo $patient_history_preview->Age->headerCellClass() ?>"><?php echo $patient_history_preview->Age->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_history_preview->Age->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_history_preview->Age->Name) ?>" data-sort-order="<?php echo $patient_history_preview->SortField == $patient_history_preview->Age->Name && $patient_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_history_preview->Age->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_history_preview->SortField == $patient_history_preview->Age->Name) { ?><?php if ($patient_history_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_history_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_history_preview->Gender->Visible) { // Gender ?>
	<?php if ($patient_history->SortUrl($patient_history_preview->Gender) == "") { ?>
		<th class="<?php echo $patient_history_preview->Gender->headerCellClass() ?>"><?php echo $patient_history_preview->Gender->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_history_preview->Gender->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_history_preview->Gender->Name) ?>" data-sort-order="<?php echo $patient_history_preview->SortField == $patient_history_preview->Gender->Name && $patient_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_history_preview->Gender->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_history_preview->SortField == $patient_history_preview->Gender->Name) { ?><?php if ($patient_history_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_history_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_history_preview->PatID->Visible) { // PatID ?>
	<?php if ($patient_history->SortUrl($patient_history_preview->PatID) == "") { ?>
		<th class="<?php echo $patient_history_preview->PatID->headerCellClass() ?>"><?php echo $patient_history_preview->PatID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_history_preview->PatID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_history_preview->PatID->Name) ?>" data-sort-order="<?php echo $patient_history_preview->SortField == $patient_history_preview->PatID->Name && $patient_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_history_preview->PatID->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_history_preview->SortField == $patient_history_preview->PatID->Name) { ?><?php if ($patient_history_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_history_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_history_preview->Reception->Visible) { // Reception ?>
	<?php if ($patient_history->SortUrl($patient_history_preview->Reception) == "") { ?>
		<th class="<?php echo $patient_history_preview->Reception->headerCellClass() ?>"><?php echo $patient_history_preview->Reception->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_history_preview->Reception->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_history_preview->Reception->Name) ?>" data-sort-order="<?php echo $patient_history_preview->SortField == $patient_history_preview->Reception->Name && $patient_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_history_preview->Reception->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_history_preview->SortField == $patient_history_preview->Reception->Name) { ?><?php if ($patient_history_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_history_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_history_preview->HospID->Visible) { // HospID ?>
	<?php if ($patient_history->SortUrl($patient_history_preview->HospID) == "") { ?>
		<th class="<?php echo $patient_history_preview->HospID->headerCellClass() ?>"><?php echo $patient_history_preview->HospID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_history_preview->HospID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_history_preview->HospID->Name) ?>" data-sort-order="<?php echo $patient_history_preview->SortField == $patient_history_preview->HospID->Name && $patient_history_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_history_preview->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_history_preview->SortField == $patient_history_preview->HospID->Name) { ?><?php if ($patient_history_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_history_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$patient_history_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$patient_history_preview->RecCount = 0;
$patient_history_preview->RowCount = 0;
while ($patient_history_preview->Recordset && !$patient_history_preview->Recordset->EOF) {

	// Init row class and style
	$patient_history_preview->RecCount++;
	$patient_history_preview->RowCount++;
	$patient_history_preview->CssStyle = "";
	$patient_history_preview->loadListRowValues($patient_history_preview->Recordset);

	// Render row
	$patient_history->RowType = ROWTYPE_PREVIEW; // Preview record
	$patient_history_preview->resetAttributes();
	$patient_history_preview->renderListRow();

	// Render list options
	$patient_history_preview->renderListOptions();
?>
	<tr <?php echo $patient_history->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_history_preview->ListOptions->render("body", "left", $patient_history_preview->RowCount);
?>
<?php if ($patient_history_preview->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $patient_history_preview->id->cellAttributes() ?>>
<span<?php echo $patient_history_preview->id->viewAttributes() ?>><?php echo $patient_history_preview->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_history_preview->mrnno->Visible) { // mrnno ?>
		<!-- mrnno -->
		<td<?php echo $patient_history_preview->mrnno->cellAttributes() ?>>
<span<?php echo $patient_history_preview->mrnno->viewAttributes() ?>><?php echo $patient_history_preview->mrnno->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_history_preview->PatientName->Visible) { // PatientName ?>
		<!-- PatientName -->
		<td<?php echo $patient_history_preview->PatientName->cellAttributes() ?>>
<span<?php echo $patient_history_preview->PatientName->viewAttributes() ?>><?php echo $patient_history_preview->PatientName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_history_preview->PatientId->Visible) { // PatientId ?>
		<!-- PatientId -->
		<td<?php echo $patient_history_preview->PatientId->cellAttributes() ?>>
<span<?php echo $patient_history_preview->PatientId->viewAttributes() ?>><?php echo $patient_history_preview->PatientId->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_history_preview->MobileNumber->Visible) { // MobileNumber ?>
		<!-- MobileNumber -->
		<td<?php echo $patient_history_preview->MobileNumber->cellAttributes() ?>>
<span<?php echo $patient_history_preview->MobileNumber->viewAttributes() ?>><?php echo $patient_history_preview->MobileNumber->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_history_preview->MaritalHistory->Visible) { // MaritalHistory ?>
		<!-- MaritalHistory -->
		<td<?php echo $patient_history_preview->MaritalHistory->cellAttributes() ?>>
<span<?php echo $patient_history_preview->MaritalHistory->viewAttributes() ?>><?php echo $patient_history_preview->MaritalHistory->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_history_preview->MenstrualHistory->Visible) { // MenstrualHistory ?>
		<!-- MenstrualHistory -->
		<td<?php echo $patient_history_preview->MenstrualHistory->cellAttributes() ?>>
<span<?php echo $patient_history_preview->MenstrualHistory->viewAttributes() ?>><?php echo $patient_history_preview->MenstrualHistory->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_history_preview->ObstetricHistory->Visible) { // ObstetricHistory ?>
		<!-- ObstetricHistory -->
		<td<?php echo $patient_history_preview->ObstetricHistory->cellAttributes() ?>>
<span<?php echo $patient_history_preview->ObstetricHistory->viewAttributes() ?>><?php echo $patient_history_preview->ObstetricHistory->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_history_preview->Age->Visible) { // Age ?>
		<!-- Age -->
		<td<?php echo $patient_history_preview->Age->cellAttributes() ?>>
<span<?php echo $patient_history_preview->Age->viewAttributes() ?>><?php echo $patient_history_preview->Age->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_history_preview->Gender->Visible) { // Gender ?>
		<!-- Gender -->
		<td<?php echo $patient_history_preview->Gender->cellAttributes() ?>>
<span<?php echo $patient_history_preview->Gender->viewAttributes() ?>><?php echo $patient_history_preview->Gender->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_history_preview->PatID->Visible) { // PatID ?>
		<!-- PatID -->
		<td<?php echo $patient_history_preview->PatID->cellAttributes() ?>>
<span<?php echo $patient_history_preview->PatID->viewAttributes() ?>><?php echo $patient_history_preview->PatID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_history_preview->Reception->Visible) { // Reception ?>
		<!-- Reception -->
		<td<?php echo $patient_history_preview->Reception->cellAttributes() ?>>
<span<?php echo $patient_history_preview->Reception->viewAttributes() ?>><?php echo $patient_history_preview->Reception->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_history_preview->HospID->Visible) { // HospID ?>
		<!-- HospID -->
		<td<?php echo $patient_history_preview->HospID->cellAttributes() ?>>
<span<?php echo $patient_history_preview->HospID->viewAttributes() ?>><?php echo $patient_history_preview->HospID->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$patient_history_preview->ListOptions->render("body", "right", $patient_history_preview->RowCount);
?>
	</tr>
<?php
	$patient_history_preview->Recordset->MoveNext();
} // while
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php echo $patient_history_preview->Pager->render() ?>
<?php } else { // No record ?>
<div class="card no-border">
<div class="ew-detail-count"><?php echo $Language->phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($patient_history_preview->OtherOptions as $option)
		$option->render("body");
?>
</div>
<?php if ($patient_history_preview->TotalRecords > 0) { ?>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
<?php } ?>
</div><!-- /.card -->
<?php
$patient_history_preview->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php
if ($patient_history_preview->Recordset)
	$patient_history_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$patient_history_preview->terminate();
?>