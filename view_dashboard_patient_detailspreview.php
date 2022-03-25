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
<div class="card ew-grid view_dashboard_patient_details"><!-- .card -->
<?php if ($view_dashboard_patient_details_preview->TotalRecs > 0) { ?>
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$view_dashboard_patient_details_preview->renderListOptions();

// Render list options (header, left)
$view_dashboard_patient_details_preview->ListOptions->render("header", "left");
?>
<?php if ($view_dashboard_patient_details->PatientID->Visible) { // PatientID ?>
	<?php if ($view_dashboard_patient_details->SortUrl($view_dashboard_patient_details->PatientID) == "") { ?>
		<th class="<?php echo $view_dashboard_patient_details->PatientID->headerCellClass() ?>"><?php echo $view_dashboard_patient_details->PatientID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_patient_details->PatientID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_dashboard_patient_details->PatientID->Name ?>" data-sort-order="<?php echo $view_dashboard_patient_details_preview->SortField == $view_dashboard_patient_details->PatientID->Name && $view_dashboard_patient_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_dashboard_patient_details->PatientID->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_dashboard_patient_details_preview->SortField == $view_dashboard_patient_details->PatientID->Name) { ?><?php if ($view_dashboard_patient_details_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_dashboard_patient_details_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_patient_details->first_name->Visible) { // first_name ?>
	<?php if ($view_dashboard_patient_details->SortUrl($view_dashboard_patient_details->first_name) == "") { ?>
		<th class="<?php echo $view_dashboard_patient_details->first_name->headerCellClass() ?>"><?php echo $view_dashboard_patient_details->first_name->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_patient_details->first_name->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_dashboard_patient_details->first_name->Name ?>" data-sort-order="<?php echo $view_dashboard_patient_details_preview->SortField == $view_dashboard_patient_details->first_name->Name && $view_dashboard_patient_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_dashboard_patient_details->first_name->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_dashboard_patient_details_preview->SortField == $view_dashboard_patient_details->first_name->Name) { ?><?php if ($view_dashboard_patient_details_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_dashboard_patient_details_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_patient_details->mobile_no->Visible) { // mobile_no ?>
	<?php if ($view_dashboard_patient_details->SortUrl($view_dashboard_patient_details->mobile_no) == "") { ?>
		<th class="<?php echo $view_dashboard_patient_details->mobile_no->headerCellClass() ?>"><?php echo $view_dashboard_patient_details->mobile_no->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_patient_details->mobile_no->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_dashboard_patient_details->mobile_no->Name ?>" data-sort-order="<?php echo $view_dashboard_patient_details_preview->SortField == $view_dashboard_patient_details->mobile_no->Name && $view_dashboard_patient_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_dashboard_patient_details->mobile_no->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_dashboard_patient_details_preview->SortField == $view_dashboard_patient_details->mobile_no->Name) { ?><?php if ($view_dashboard_patient_details_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_dashboard_patient_details_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_patient_details->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
	<?php if ($view_dashboard_patient_details->SortUrl($view_dashboard_patient_details->ReferA4TreatingConsultant) == "") { ?>
		<th class="<?php echo $view_dashboard_patient_details->ReferA4TreatingConsultant->headerCellClass() ?>"><?php echo $view_dashboard_patient_details->ReferA4TreatingConsultant->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_patient_details->ReferA4TreatingConsultant->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_dashboard_patient_details->ReferA4TreatingConsultant->Name ?>" data-sort-order="<?php echo $view_dashboard_patient_details_preview->SortField == $view_dashboard_patient_details->ReferA4TreatingConsultant->Name && $view_dashboard_patient_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_dashboard_patient_details->ReferA4TreatingConsultant->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_dashboard_patient_details_preview->SortField == $view_dashboard_patient_details->ReferA4TreatingConsultant->Name) { ?><?php if ($view_dashboard_patient_details_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_dashboard_patient_details_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_patient_details->Patient_Language->Visible) { // Patient_Language ?>
	<?php if ($view_dashboard_patient_details->SortUrl($view_dashboard_patient_details->Patient_Language) == "") { ?>
		<th class="<?php echo $view_dashboard_patient_details->Patient_Language->headerCellClass() ?>"><?php echo $view_dashboard_patient_details->Patient_Language->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_patient_details->Patient_Language->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_dashboard_patient_details->Patient_Language->Name ?>" data-sort-order="<?php echo $view_dashboard_patient_details_preview->SortField == $view_dashboard_patient_details->Patient_Language->Name && $view_dashboard_patient_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_dashboard_patient_details->Patient_Language->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_dashboard_patient_details_preview->SortField == $view_dashboard_patient_details->Patient_Language->Name) { ?><?php if ($view_dashboard_patient_details_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_dashboard_patient_details_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_patient_details->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
	<?php if ($view_dashboard_patient_details->SortUrl($view_dashboard_patient_details->WhereDidYouHear) == "") { ?>
		<th class="<?php echo $view_dashboard_patient_details->WhereDidYouHear->headerCellClass() ?>"><?php echo $view_dashboard_patient_details->WhereDidYouHear->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_patient_details->WhereDidYouHear->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_dashboard_patient_details->WhereDidYouHear->Name ?>" data-sort-order="<?php echo $view_dashboard_patient_details_preview->SortField == $view_dashboard_patient_details->WhereDidYouHear->Name && $view_dashboard_patient_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_dashboard_patient_details->WhereDidYouHear->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_dashboard_patient_details_preview->SortField == $view_dashboard_patient_details->WhereDidYouHear->Name) { ?><?php if ($view_dashboard_patient_details_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_dashboard_patient_details_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_patient_details->HospID->Visible) { // HospID ?>
	<?php if ($view_dashboard_patient_details->SortUrl($view_dashboard_patient_details->HospID) == "") { ?>
		<th class="<?php echo $view_dashboard_patient_details->HospID->headerCellClass() ?>"><?php echo $view_dashboard_patient_details->HospID->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_patient_details->HospID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_dashboard_patient_details->HospID->Name ?>" data-sort-order="<?php echo $view_dashboard_patient_details_preview->SortField == $view_dashboard_patient_details->HospID->Name && $view_dashboard_patient_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_dashboard_patient_details->HospID->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_dashboard_patient_details_preview->SortField == $view_dashboard_patient_details->HospID->Name) { ?><?php if ($view_dashboard_patient_details_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_dashboard_patient_details_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_dashboard_patient_details->createdDate->Visible) { // createdDate ?>
	<?php if ($view_dashboard_patient_details->SortUrl($view_dashboard_patient_details->createdDate) == "") { ?>
		<th class="<?php echo $view_dashboard_patient_details->createdDate->headerCellClass() ?>"><?php echo $view_dashboard_patient_details->createdDate->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $view_dashboard_patient_details->createdDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $view_dashboard_patient_details->createdDate->Name ?>" data-sort-order="<?php echo $view_dashboard_patient_details_preview->SortField == $view_dashboard_patient_details->createdDate->Name && $view_dashboard_patient_details_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $view_dashboard_patient_details->createdDate->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($view_dashboard_patient_details_preview->SortField == $view_dashboard_patient_details->createdDate->Name) { ?><?php if ($view_dashboard_patient_details_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($view_dashboard_patient_details_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
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
$view_dashboard_patient_details_preview->RowCnt = 0;
while ($view_dashboard_patient_details_preview->Recordset && !$view_dashboard_patient_details_preview->Recordset->EOF) {

	// Init row class and style
	$view_dashboard_patient_details_preview->RecCount++;
	$view_dashboard_patient_details_preview->RowCnt++;
	$view_dashboard_patient_details_preview->CssStyle = "";
	$view_dashboard_patient_details_preview->loadListRowValues($view_dashboard_patient_details_preview->Recordset);

	// Render row
	$view_dashboard_patient_details_preview->RowType = ROWTYPE_PREVIEW; // Preview record
	$view_dashboard_patient_details_preview->resetAttributes();
	$view_dashboard_patient_details_preview->renderListRow();

	// Render list options
	$view_dashboard_patient_details_preview->renderListOptions();
?>
	<tr<?php echo $view_dashboard_patient_details_preview->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_dashboard_patient_details_preview->ListOptions->render("body", "left", $view_dashboard_patient_details_preview->RowCnt);
?>
<?php if ($view_dashboard_patient_details->PatientID->Visible) { // PatientID ?>
		<!-- PatientID -->
		<td<?php echo $view_dashboard_patient_details->PatientID->cellAttributes() ?>>
<span<?php echo $view_dashboard_patient_details->PatientID->viewAttributes() ?>>
<?php echo $view_dashboard_patient_details->PatientID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_patient_details->first_name->Visible) { // first_name ?>
		<!-- first_name -->
		<td<?php echo $view_dashboard_patient_details->first_name->cellAttributes() ?>>
<span<?php echo $view_dashboard_patient_details->first_name->viewAttributes() ?>>
<?php echo $view_dashboard_patient_details->first_name->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_patient_details->mobile_no->Visible) { // mobile_no ?>
		<!-- mobile_no -->
		<td<?php echo $view_dashboard_patient_details->mobile_no->cellAttributes() ?>>
<span<?php echo $view_dashboard_patient_details->mobile_no->viewAttributes() ?>>
<?php echo $view_dashboard_patient_details->mobile_no->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_patient_details->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
		<!-- ReferA4TreatingConsultant -->
		<td<?php echo $view_dashboard_patient_details->ReferA4TreatingConsultant->cellAttributes() ?>>
<span<?php echo $view_dashboard_patient_details->ReferA4TreatingConsultant->viewAttributes() ?>>
<?php echo $view_dashboard_patient_details->ReferA4TreatingConsultant->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_patient_details->Patient_Language->Visible) { // Patient_Language ?>
		<!-- Patient_Language -->
		<td<?php echo $view_dashboard_patient_details->Patient_Language->cellAttributes() ?>>
<span<?php echo $view_dashboard_patient_details->Patient_Language->viewAttributes() ?>>
<?php echo $view_dashboard_patient_details->Patient_Language->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_patient_details->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
		<!-- WhereDidYouHear -->
		<td<?php echo $view_dashboard_patient_details->WhereDidYouHear->cellAttributes() ?>>
<span<?php echo $view_dashboard_patient_details->WhereDidYouHear->viewAttributes() ?>>
<?php echo $view_dashboard_patient_details->WhereDidYouHear->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_patient_details->HospID->Visible) { // HospID ?>
		<!-- HospID -->
		<td<?php echo $view_dashboard_patient_details->HospID->cellAttributes() ?>>
<span<?php echo $view_dashboard_patient_details->HospID->viewAttributes() ?>>
<?php echo $view_dashboard_patient_details->HospID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($view_dashboard_patient_details->createdDate->Visible) { // createdDate ?>
		<!-- createdDate -->
		<td<?php echo $view_dashboard_patient_details->createdDate->cellAttributes() ?>>
<span<?php echo $view_dashboard_patient_details->createdDate->viewAttributes() ?>>
<?php echo $view_dashboard_patient_details->createdDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$view_dashboard_patient_details_preview->ListOptions->render("body", "right", $view_dashboard_patient_details_preview->RowCnt);
?>
	</tr>
<?php
	$view_dashboard_patient_details_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<?php } ?>
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php if ($view_dashboard_patient_details_preview->TotalRecs > 0) { ?>
<?php if (!isset($view_dashboard_patient_details_preview->Pager)) $view_dashboard_patient_details_preview->Pager = new PrevNextPager($view_dashboard_patient_details_preview->StartRec, $view_dashboard_patient_details_preview->DisplayRecs, $view_dashboard_patient_details_preview->TotalRecs) ?>
<?php if ($view_dashboard_patient_details_preview->Pager->RecordCount > 0 && $view_dashboard_patient_details_preview->Pager->Visible) { ?>
<div class="ew-pager"><div class="ew-prev-next"><div class="btn-group btn-group-sm ew-btn-group">
<!--first page button-->
	<?php if ($view_dashboard_patient_details_preview->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" data-start="<?php echo $view_dashboard_patient_details_preview->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($view_dashboard_patient_details_preview->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" data-start="<?php echo $view_dashboard_patient_details_preview->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
<!--next page button-->
	<?php if ($view_dashboard_patient_details_preview->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" data-start="<?php echo $view_dashboard_patient_details_preview->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($view_dashboard_patient_details_preview->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" data-start="<?php echo $view_dashboard_patient_details_preview->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div></div></div>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_dashboard_patient_details_preview->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_dashboard_patient_details_preview->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_dashboard_patient_details_preview->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php } else { ?>
<div class="ew-detail-count"><?php echo $Language->Phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($view_dashboard_patient_details_preview->OtherOptions as &$option)
		$option->render("body");
?>
</div>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
</div><!-- /.card -->
<?php
$view_dashboard_patient_details_preview->showPageFooter();
if (DEBUG_ENABLED)
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