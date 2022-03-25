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
$view_dashboard_patient_details_preview = new view_dashboard_patient_details_preview();

// Run the page
$view_dashboard_patient_details_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_dashboard_patient_details_preview->Page_Render();
?>
<?php $view_dashboard_patient_details_preview->showPageHeader(); ?>
<?php if ($view_dashboard_patient_details_preview->TotalRecords > 0) { ?>
<div class="card ew-grid view_dashboard_patient_details"><!-- .card -->
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel ew-preview-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$view_dashboard_patient_details_preview->renderListOptions();

// Render list options (header, left)
$view_dashboard_patient_details_preview->ListOptions->render("header", "left");
?>
<?php if ($view_dashboard_patient_details_preview->PatientID->Visible) { // PatientID ?>
	<?php if ($view_dashboard_patient_details->SortUrl($view_dashboard_patient_details_preview->PatientID) == "") { ?>
		<th class="<?php echo $view_dashboard_patient_details_preview->PatientID->headerCellClass() ?>"><?php echo $view_dashboard_patient_details_preview->PatientID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_patient_details_preview->PatientID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_dashboard_patient_details_preview->PatientID->Name) ?>" data-sort-order="<?php echo $view_dashboard_patient_details_preview->SortField == $view_dashboard_patient_details_preview->PatientID->Name && $view_dashboard_patient_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_patient_details_preview->PatientID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_patient_details_preview->SortField == $view_dashboard_patient_details_preview->PatientID->Name) { ?><?php if ($view_dashboard_patient_details_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_patient_details_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_patient_details_preview->first_name->Visible) { // first_name ?>
	<?php if ($view_dashboard_patient_details->SortUrl($view_dashboard_patient_details_preview->first_name) == "") { ?>
		<th class="<?php echo $view_dashboard_patient_details_preview->first_name->headerCellClass() ?>"><?php echo $view_dashboard_patient_details_preview->first_name->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_patient_details_preview->first_name->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_dashboard_patient_details_preview->first_name->Name) ?>" data-sort-order="<?php echo $view_dashboard_patient_details_preview->SortField == $view_dashboard_patient_details_preview->first_name->Name && $view_dashboard_patient_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_patient_details_preview->first_name->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_patient_details_preview->SortField == $view_dashboard_patient_details_preview->first_name->Name) { ?><?php if ($view_dashboard_patient_details_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_patient_details_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_patient_details_preview->mobile_no->Visible) { // mobile_no ?>
	<?php if ($view_dashboard_patient_details->SortUrl($view_dashboard_patient_details_preview->mobile_no) == "") { ?>
		<th class="<?php echo $view_dashboard_patient_details_preview->mobile_no->headerCellClass() ?>"><?php echo $view_dashboard_patient_details_preview->mobile_no->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_patient_details_preview->mobile_no->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_dashboard_patient_details_preview->mobile_no->Name) ?>" data-sort-order="<?php echo $view_dashboard_patient_details_preview->SortField == $view_dashboard_patient_details_preview->mobile_no->Name && $view_dashboard_patient_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_patient_details_preview->mobile_no->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_patient_details_preview->SortField == $view_dashboard_patient_details_preview->mobile_no->Name) { ?><?php if ($view_dashboard_patient_details_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_patient_details_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_patient_details_preview->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
	<?php if ($view_dashboard_patient_details->SortUrl($view_dashboard_patient_details_preview->ReferA4TreatingConsultant) == "") { ?>
		<th class="<?php echo $view_dashboard_patient_details_preview->ReferA4TreatingConsultant->headerCellClass() ?>"><?php echo $view_dashboard_patient_details_preview->ReferA4TreatingConsultant->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_patient_details_preview->ReferA4TreatingConsultant->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_dashboard_patient_details_preview->ReferA4TreatingConsultant->Name) ?>" data-sort-order="<?php echo $view_dashboard_patient_details_preview->SortField == $view_dashboard_patient_details_preview->ReferA4TreatingConsultant->Name && $view_dashboard_patient_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_patient_details_preview->ReferA4TreatingConsultant->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_patient_details_preview->SortField == $view_dashboard_patient_details_preview->ReferA4TreatingConsultant->Name) { ?><?php if ($view_dashboard_patient_details_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_patient_details_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_patient_details_preview->Patient_Language->Visible) { // Patient_Language ?>
	<?php if ($view_dashboard_patient_details->SortUrl($view_dashboard_patient_details_preview->Patient_Language) == "") { ?>
		<th class="<?php echo $view_dashboard_patient_details_preview->Patient_Language->headerCellClass() ?>"><?php echo $view_dashboard_patient_details_preview->Patient_Language->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_patient_details_preview->Patient_Language->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_dashboard_patient_details_preview->Patient_Language->Name) ?>" data-sort-order="<?php echo $view_dashboard_patient_details_preview->SortField == $view_dashboard_patient_details_preview->Patient_Language->Name && $view_dashboard_patient_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_patient_details_preview->Patient_Language->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_patient_details_preview->SortField == $view_dashboard_patient_details_preview->Patient_Language->Name) { ?><?php if ($view_dashboard_patient_details_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_patient_details_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_patient_details_preview->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
	<?php if ($view_dashboard_patient_details->SortUrl($view_dashboard_patient_details_preview->WhereDidYouHear) == "") { ?>
		<th class="<?php echo $view_dashboard_patient_details_preview->WhereDidYouHear->headerCellClass() ?>"><?php echo $view_dashboard_patient_details_preview->WhereDidYouHear->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_patient_details_preview->WhereDidYouHear->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_dashboard_patient_details_preview->WhereDidYouHear->Name) ?>" data-sort-order="<?php echo $view_dashboard_patient_details_preview->SortField == $view_dashboard_patient_details_preview->WhereDidYouHear->Name && $view_dashboard_patient_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_patient_details_preview->WhereDidYouHear->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_patient_details_preview->SortField == $view_dashboard_patient_details_preview->WhereDidYouHear->Name) { ?><?php if ($view_dashboard_patient_details_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_patient_details_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_patient_details_preview->HospID->Visible) { // HospID ?>
	<?php if ($view_dashboard_patient_details->SortUrl($view_dashboard_patient_details_preview->HospID) == "") { ?>
		<th class="<?php echo $view_dashboard_patient_details_preview->HospID->headerCellClass() ?>"><?php echo $view_dashboard_patient_details_preview->HospID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_patient_details_preview->HospID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_dashboard_patient_details_preview->HospID->Name) ?>" data-sort-order="<?php echo $view_dashboard_patient_details_preview->SortField == $view_dashboard_patient_details_preview->HospID->Name && $view_dashboard_patient_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_patient_details_preview->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_patient_details_preview->SortField == $view_dashboard_patient_details_preview->HospID->Name) { ?><?php if ($view_dashboard_patient_details_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_patient_details_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_patient_details_preview->createdDate->Visible) { // createdDate ?>
	<?php if ($view_dashboard_patient_details->SortUrl($view_dashboard_patient_details_preview->createdDate) == "") { ?>
		<th class="<?php echo $view_dashboard_patient_details_preview->createdDate->headerCellClass() ?>"><?php echo $view_dashboard_patient_details_preview->createdDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_patient_details_preview->createdDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($view_dashboard_patient_details_preview->createdDate->Name) ?>" data-sort-order="<?php echo $view_dashboard_patient_details_preview->SortField == $view_dashboard_patient_details_preview->createdDate->Name && $view_dashboard_patient_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_dashboard_patient_details_preview->createdDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_dashboard_patient_details_preview->SortField == $view_dashboard_patient_details_preview->createdDate->Name) { ?><?php if ($view_dashboard_patient_details_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_dashboard_patient_details_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_dashboard_patient_details_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$view_dashboard_patient_details_preview->RecCount = 0;
$view_dashboard_patient_details_preview->RowCount = 0;
while ($view_dashboard_patient_details_preview->Recordset && !$view_dashboard_patient_details_preview->Recordset->EOF) {

	// Init row class and style
	$view_dashboard_patient_details_preview->RecCount++;
	$view_dashboard_patient_details_preview->RowCount++;
	$view_dashboard_patient_details_preview->CssStyle = "";
	$view_dashboard_patient_details_preview->loadListRowValues($view_dashboard_patient_details_preview->Recordset);

	// Render row
	$view_dashboard_patient_details->RowType = ROWTYPE_PREVIEW; // Preview record
	$view_dashboard_patient_details_preview->resetAttributes();
	$view_dashboard_patient_details_preview->renderListRow();

	// Render list options
	$view_dashboard_patient_details_preview->renderListOptions();
?>
	<tr <?php echo $view_dashboard_patient_details->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_dashboard_patient_details_preview->ListOptions->render("body", "left", $view_dashboard_patient_details_preview->RowCount);
?>
<?php if ($view_dashboard_patient_details_preview->PatientID->Visible) { // PatientID ?>
		<!-- PatientID -->
		<td<?php echo $view_dashboard_patient_details_preview->PatientID->cellAttributes() ?>>
<span<?php echo $view_dashboard_patient_details_preview->PatientID->viewAttributes() ?>><?php echo $view_dashboard_patient_details_preview->PatientID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_patient_details_preview->first_name->Visible) { // first_name ?>
		<!-- first_name -->
		<td<?php echo $view_dashboard_patient_details_preview->first_name->cellAttributes() ?>>
<span<?php echo $view_dashboard_patient_details_preview->first_name->viewAttributes() ?>><?php echo $view_dashboard_patient_details_preview->first_name->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_patient_details_preview->mobile_no->Visible) { // mobile_no ?>
		<!-- mobile_no -->
		<td<?php echo $view_dashboard_patient_details_preview->mobile_no->cellAttributes() ?>>
<span<?php echo $view_dashboard_patient_details_preview->mobile_no->viewAttributes() ?>><?php echo $view_dashboard_patient_details_preview->mobile_no->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_patient_details_preview->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
		<!-- ReferA4TreatingConsultant -->
		<td<?php echo $view_dashboard_patient_details_preview->ReferA4TreatingConsultant->cellAttributes() ?>>
<span<?php echo $view_dashboard_patient_details_preview->ReferA4TreatingConsultant->viewAttributes() ?>><?php echo $view_dashboard_patient_details_preview->ReferA4TreatingConsultant->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_patient_details_preview->Patient_Language->Visible) { // Patient_Language ?>
		<!-- Patient_Language -->
		<td<?php echo $view_dashboard_patient_details_preview->Patient_Language->cellAttributes() ?>>
<span<?php echo $view_dashboard_patient_details_preview->Patient_Language->viewAttributes() ?>><?php echo $view_dashboard_patient_details_preview->Patient_Language->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_patient_details_preview->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
		<!-- WhereDidYouHear -->
		<td<?php echo $view_dashboard_patient_details_preview->WhereDidYouHear->cellAttributes() ?>>
<span<?php echo $view_dashboard_patient_details_preview->WhereDidYouHear->viewAttributes() ?>><?php echo $view_dashboard_patient_details_preview->WhereDidYouHear->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_patient_details_preview->HospID->Visible) { // HospID ?>
		<!-- HospID -->
		<td<?php echo $view_dashboard_patient_details_preview->HospID->cellAttributes() ?>>
<span<?php echo $view_dashboard_patient_details_preview->HospID->viewAttributes() ?>><?php echo $view_dashboard_patient_details_preview->HospID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_patient_details_preview->createdDate->Visible) { // createdDate ?>
		<!-- createdDate -->
		<td<?php echo $view_dashboard_patient_details_preview->createdDate->cellAttributes() ?>>
<span<?php echo $view_dashboard_patient_details_preview->createdDate->viewAttributes() ?>><?php echo $view_dashboard_patient_details_preview->createdDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$view_dashboard_patient_details_preview->ListOptions->render("body", "right", $view_dashboard_patient_details_preview->RowCount);
?>
	</tr>
<?php
	$view_dashboard_patient_details_preview->Recordset->MoveNext();
} // while
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php echo $view_dashboard_patient_details_preview->Pager->render() ?>
<?php } else { // No record ?>
<div class="card no-border">
<div class="ew-detail-count"><?php echo $Language->phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($view_dashboard_patient_details_preview->OtherOptions as $option)
		$option->render("body");
?>
</div>
<?php if ($view_dashboard_patient_details_preview->TotalRecords > 0) { ?>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
<?php } ?>
</div><!-- /.card -->
<?php
$view_dashboard_patient_details_preview->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php
if ($view_dashboard_patient_details_preview->Recordset)
	$view_dashboard_patient_details_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$view_dashboard_patient_details_preview->terminate();
?>