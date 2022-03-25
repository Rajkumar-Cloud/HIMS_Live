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
$patient_final_diagnosis_preview = new patient_final_diagnosis_preview();

// Run the page
$patient_final_diagnosis_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_final_diagnosis_preview->Page_Render();
?>
<?php $patient_final_diagnosis_preview->showPageHeader(); ?>
<?php if ($patient_final_diagnosis_preview->TotalRecords > 0) { ?>
<div class="card ew-grid patient_final_diagnosis"><!-- .card -->
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel ew-preview-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$patient_final_diagnosis_preview->renderListOptions();

// Render list options (header, left)
$patient_final_diagnosis_preview->ListOptions->render("header", "left");
?>
<?php if ($patient_final_diagnosis_preview->id->Visible) { // id ?>
	<?php if ($patient_final_diagnosis->SortUrl($patient_final_diagnosis_preview->id) == "") { ?>
		<th class="<?php echo $patient_final_diagnosis_preview->id->headerCellClass() ?>"><?php echo $patient_final_diagnosis_preview->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_final_diagnosis_preview->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_final_diagnosis_preview->id->Name) ?>" data-sort-order="<?php echo $patient_final_diagnosis_preview->SortField == $patient_final_diagnosis_preview->id->Name && $patient_final_diagnosis_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_final_diagnosis_preview->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_final_diagnosis_preview->SortField == $patient_final_diagnosis_preview->id->Name) { ?><?php if ($patient_final_diagnosis_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_final_diagnosis_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_final_diagnosis_preview->PatID->Visible) { // PatID ?>
	<?php if ($patient_final_diagnosis->SortUrl($patient_final_diagnosis_preview->PatID) == "") { ?>
		<th class="<?php echo $patient_final_diagnosis_preview->PatID->headerCellClass() ?>"><?php echo $patient_final_diagnosis_preview->PatID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_final_diagnosis_preview->PatID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_final_diagnosis_preview->PatID->Name) ?>" data-sort-order="<?php echo $patient_final_diagnosis_preview->SortField == $patient_final_diagnosis_preview->PatID->Name && $patient_final_diagnosis_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_final_diagnosis_preview->PatID->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_final_diagnosis_preview->SortField == $patient_final_diagnosis_preview->PatID->Name) { ?><?php if ($patient_final_diagnosis_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_final_diagnosis_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_final_diagnosis_preview->PatientName->Visible) { // PatientName ?>
	<?php if ($patient_final_diagnosis->SortUrl($patient_final_diagnosis_preview->PatientName) == "") { ?>
		<th class="<?php echo $patient_final_diagnosis_preview->PatientName->headerCellClass() ?>"><?php echo $patient_final_diagnosis_preview->PatientName->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_final_diagnosis_preview->PatientName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_final_diagnosis_preview->PatientName->Name) ?>" data-sort-order="<?php echo $patient_final_diagnosis_preview->SortField == $patient_final_diagnosis_preview->PatientName->Name && $patient_final_diagnosis_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_final_diagnosis_preview->PatientName->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_final_diagnosis_preview->SortField == $patient_final_diagnosis_preview->PatientName->Name) { ?><?php if ($patient_final_diagnosis_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_final_diagnosis_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_final_diagnosis_preview->mrnno->Visible) { // mrnno ?>
	<?php if ($patient_final_diagnosis->SortUrl($patient_final_diagnosis_preview->mrnno) == "") { ?>
		<th class="<?php echo $patient_final_diagnosis_preview->mrnno->headerCellClass() ?>"><?php echo $patient_final_diagnosis_preview->mrnno->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_final_diagnosis_preview->mrnno->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_final_diagnosis_preview->mrnno->Name) ?>" data-sort-order="<?php echo $patient_final_diagnosis_preview->SortField == $patient_final_diagnosis_preview->mrnno->Name && $patient_final_diagnosis_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_final_diagnosis_preview->mrnno->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_final_diagnosis_preview->SortField == $patient_final_diagnosis_preview->mrnno->Name) { ?><?php if ($patient_final_diagnosis_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_final_diagnosis_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_final_diagnosis_preview->MobileNumber->Visible) { // MobileNumber ?>
	<?php if ($patient_final_diagnosis->SortUrl($patient_final_diagnosis_preview->MobileNumber) == "") { ?>
		<th class="<?php echo $patient_final_diagnosis_preview->MobileNumber->headerCellClass() ?>"><?php echo $patient_final_diagnosis_preview->MobileNumber->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_final_diagnosis_preview->MobileNumber->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_final_diagnosis_preview->MobileNumber->Name) ?>" data-sort-order="<?php echo $patient_final_diagnosis_preview->SortField == $patient_final_diagnosis_preview->MobileNumber->Name && $patient_final_diagnosis_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_final_diagnosis_preview->MobileNumber->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_final_diagnosis_preview->SortField == $patient_final_diagnosis_preview->MobileNumber->Name) { ?><?php if ($patient_final_diagnosis_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_final_diagnosis_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_final_diagnosis_preview->Age->Visible) { // Age ?>
	<?php if ($patient_final_diagnosis->SortUrl($patient_final_diagnosis_preview->Age) == "") { ?>
		<th class="<?php echo $patient_final_diagnosis_preview->Age->headerCellClass() ?>"><?php echo $patient_final_diagnosis_preview->Age->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_final_diagnosis_preview->Age->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_final_diagnosis_preview->Age->Name) ?>" data-sort-order="<?php echo $patient_final_diagnosis_preview->SortField == $patient_final_diagnosis_preview->Age->Name && $patient_final_diagnosis_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_final_diagnosis_preview->Age->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_final_diagnosis_preview->SortField == $patient_final_diagnosis_preview->Age->Name) { ?><?php if ($patient_final_diagnosis_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_final_diagnosis_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_final_diagnosis_preview->Gender->Visible) { // Gender ?>
	<?php if ($patient_final_diagnosis->SortUrl($patient_final_diagnosis_preview->Gender) == "") { ?>
		<th class="<?php echo $patient_final_diagnosis_preview->Gender->headerCellClass() ?>"><?php echo $patient_final_diagnosis_preview->Gender->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_final_diagnosis_preview->Gender->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_final_diagnosis_preview->Gender->Name) ?>" data-sort-order="<?php echo $patient_final_diagnosis_preview->SortField == $patient_final_diagnosis_preview->Gender->Name && $patient_final_diagnosis_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_final_diagnosis_preview->Gender->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_final_diagnosis_preview->SortField == $patient_final_diagnosis_preview->Gender->Name) { ?><?php if ($patient_final_diagnosis_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_final_diagnosis_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_final_diagnosis_preview->PatientId->Visible) { // PatientId ?>
	<?php if ($patient_final_diagnosis->SortUrl($patient_final_diagnosis_preview->PatientId) == "") { ?>
		<th class="<?php echo $patient_final_diagnosis_preview->PatientId->headerCellClass() ?>"><?php echo $patient_final_diagnosis_preview->PatientId->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_final_diagnosis_preview->PatientId->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_final_diagnosis_preview->PatientId->Name) ?>" data-sort-order="<?php echo $patient_final_diagnosis_preview->SortField == $patient_final_diagnosis_preview->PatientId->Name && $patient_final_diagnosis_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_final_diagnosis_preview->PatientId->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_final_diagnosis_preview->SortField == $patient_final_diagnosis_preview->PatientId->Name) { ?><?php if ($patient_final_diagnosis_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_final_diagnosis_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_final_diagnosis_preview->Reception->Visible) { // Reception ?>
	<?php if ($patient_final_diagnosis->SortUrl($patient_final_diagnosis_preview->Reception) == "") { ?>
		<th class="<?php echo $patient_final_diagnosis_preview->Reception->headerCellClass() ?>"><?php echo $patient_final_diagnosis_preview->Reception->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_final_diagnosis_preview->Reception->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_final_diagnosis_preview->Reception->Name) ?>" data-sort-order="<?php echo $patient_final_diagnosis_preview->SortField == $patient_final_diagnosis_preview->Reception->Name && $patient_final_diagnosis_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_final_diagnosis_preview->Reception->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_final_diagnosis_preview->SortField == $patient_final_diagnosis_preview->Reception->Name) { ?><?php if ($patient_final_diagnosis_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_final_diagnosis_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_final_diagnosis_preview->HospID->Visible) { // HospID ?>
	<?php if ($patient_final_diagnosis->SortUrl($patient_final_diagnosis_preview->HospID) == "") { ?>
		<th class="<?php echo $patient_final_diagnosis_preview->HospID->headerCellClass() ?>"><?php echo $patient_final_diagnosis_preview->HospID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_final_diagnosis_preview->HospID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_final_diagnosis_preview->HospID->Name) ?>" data-sort-order="<?php echo $patient_final_diagnosis_preview->SortField == $patient_final_diagnosis_preview->HospID->Name && $patient_final_diagnosis_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_final_diagnosis_preview->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_final_diagnosis_preview->SortField == $patient_final_diagnosis_preview->HospID->Name) { ?><?php if ($patient_final_diagnosis_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_final_diagnosis_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$patient_final_diagnosis_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$patient_final_diagnosis_preview->RecCount = 0;
$patient_final_diagnosis_preview->RowCount = 0;
while ($patient_final_diagnosis_preview->Recordset && !$patient_final_diagnosis_preview->Recordset->EOF) {

	// Init row class and style
	$patient_final_diagnosis_preview->RecCount++;
	$patient_final_diagnosis_preview->RowCount++;
	$patient_final_diagnosis_preview->CssStyle = "";
	$patient_final_diagnosis_preview->loadListRowValues($patient_final_diagnosis_preview->Recordset);

	// Render row
	$patient_final_diagnosis->RowType = ROWTYPE_PREVIEW; // Preview record
	$patient_final_diagnosis_preview->resetAttributes();
	$patient_final_diagnosis_preview->renderListRow();

	// Render list options
	$patient_final_diagnosis_preview->renderListOptions();
?>
	<tr <?php echo $patient_final_diagnosis->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_final_diagnosis_preview->ListOptions->render("body", "left", $patient_final_diagnosis_preview->RowCount);
?>
<?php if ($patient_final_diagnosis_preview->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $patient_final_diagnosis_preview->id->cellAttributes() ?>>
<span<?php echo $patient_final_diagnosis_preview->id->viewAttributes() ?>><?php echo $patient_final_diagnosis_preview->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_final_diagnosis_preview->PatID->Visible) { // PatID ?>
		<!-- PatID -->
		<td<?php echo $patient_final_diagnosis_preview->PatID->cellAttributes() ?>>
<span<?php echo $patient_final_diagnosis_preview->PatID->viewAttributes() ?>><?php echo $patient_final_diagnosis_preview->PatID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_final_diagnosis_preview->PatientName->Visible) { // PatientName ?>
		<!-- PatientName -->
		<td<?php echo $patient_final_diagnosis_preview->PatientName->cellAttributes() ?>>
<span<?php echo $patient_final_diagnosis_preview->PatientName->viewAttributes() ?>><?php echo $patient_final_diagnosis_preview->PatientName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_final_diagnosis_preview->mrnno->Visible) { // mrnno ?>
		<!-- mrnno -->
		<td<?php echo $patient_final_diagnosis_preview->mrnno->cellAttributes() ?>>
<span<?php echo $patient_final_diagnosis_preview->mrnno->viewAttributes() ?>><?php echo $patient_final_diagnosis_preview->mrnno->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_final_diagnosis_preview->MobileNumber->Visible) { // MobileNumber ?>
		<!-- MobileNumber -->
		<td<?php echo $patient_final_diagnosis_preview->MobileNumber->cellAttributes() ?>>
<span<?php echo $patient_final_diagnosis_preview->MobileNumber->viewAttributes() ?>><?php echo $patient_final_diagnosis_preview->MobileNumber->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_final_diagnosis_preview->Age->Visible) { // Age ?>
		<!-- Age -->
		<td<?php echo $patient_final_diagnosis_preview->Age->cellAttributes() ?>>
<span<?php echo $patient_final_diagnosis_preview->Age->viewAttributes() ?>><?php echo $patient_final_diagnosis_preview->Age->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_final_diagnosis_preview->Gender->Visible) { // Gender ?>
		<!-- Gender -->
		<td<?php echo $patient_final_diagnosis_preview->Gender->cellAttributes() ?>>
<span<?php echo $patient_final_diagnosis_preview->Gender->viewAttributes() ?>><?php echo $patient_final_diagnosis_preview->Gender->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_final_diagnosis_preview->PatientId->Visible) { // PatientId ?>
		<!-- PatientId -->
		<td<?php echo $patient_final_diagnosis_preview->PatientId->cellAttributes() ?>>
<span<?php echo $patient_final_diagnosis_preview->PatientId->viewAttributes() ?>><?php echo $patient_final_diagnosis_preview->PatientId->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_final_diagnosis_preview->Reception->Visible) { // Reception ?>
		<!-- Reception -->
		<td<?php echo $patient_final_diagnosis_preview->Reception->cellAttributes() ?>>
<span<?php echo $patient_final_diagnosis_preview->Reception->viewAttributes() ?>><?php echo $patient_final_diagnosis_preview->Reception->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_final_diagnosis_preview->HospID->Visible) { // HospID ?>
		<!-- HospID -->
		<td<?php echo $patient_final_diagnosis_preview->HospID->cellAttributes() ?>>
<span<?php echo $patient_final_diagnosis_preview->HospID->viewAttributes() ?>><?php echo $patient_final_diagnosis_preview->HospID->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$patient_final_diagnosis_preview->ListOptions->render("body", "right", $patient_final_diagnosis_preview->RowCount);
?>
	</tr>
<?php
	$patient_final_diagnosis_preview->Recordset->MoveNext();
} // while
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php echo $patient_final_diagnosis_preview->Pager->render() ?>
<?php } else { // No record ?>
<div class="card no-border">
<div class="ew-detail-count"><?php echo $Language->phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($patient_final_diagnosis_preview->OtherOptions as $option)
		$option->render("body");
?>
</div>
<?php if ($patient_final_diagnosis_preview->TotalRecords > 0) { ?>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
<?php } ?>
</div><!-- /.card -->
<?php
$patient_final_diagnosis_preview->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php
if ($patient_final_diagnosis_preview->Recordset)
	$patient_final_diagnosis_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$patient_final_diagnosis_preview->terminate();
?>