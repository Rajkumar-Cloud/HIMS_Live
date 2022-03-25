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
$patient_email_preview = new patient_email_preview();

// Run the page
$patient_email_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_email_preview->Page_Render();
?>
<?php $patient_email_preview->showPageHeader(); ?>
<?php if ($patient_email_preview->TotalRecords > 0) { ?>
<div class="card ew-grid patient_email"><!-- .card -->
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel ew-preview-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$patient_email_preview->renderListOptions();

// Render list options (header, left)
$patient_email_preview->ListOptions->render("header", "left");
?>
<?php if ($patient_email_preview->id->Visible) { // id ?>
	<?php if ($patient_email->SortUrl($patient_email_preview->id) == "") { ?>
		<th class="<?php echo $patient_email_preview->id->headerCellClass() ?>"><?php echo $patient_email_preview->id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_email_preview->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_email_preview->id->Name) ?>" data-sort-order="<?php echo $patient_email_preview->SortField == $patient_email_preview->id->Name && $patient_email_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_email_preview->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_email_preview->SortField == $patient_email_preview->id->Name) { ?><?php if ($patient_email_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_email_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_email_preview->patient_id->Visible) { // patient_id ?>
	<?php if ($patient_email->SortUrl($patient_email_preview->patient_id) == "") { ?>
		<th class="<?php echo $patient_email_preview->patient_id->headerCellClass() ?>"><?php echo $patient_email_preview->patient_id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_email_preview->patient_id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_email_preview->patient_id->Name) ?>" data-sort-order="<?php echo $patient_email_preview->SortField == $patient_email_preview->patient_id->Name && $patient_email_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_email_preview->patient_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_email_preview->SortField == $patient_email_preview->patient_id->Name) { ?><?php if ($patient_email_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_email_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_email_preview->_email->Visible) { // email ?>
	<?php if ($patient_email->SortUrl($patient_email_preview->_email) == "") { ?>
		<th class="<?php echo $patient_email_preview->_email->headerCellClass() ?>"><?php echo $patient_email_preview->_email->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_email_preview->_email->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_email_preview->_email->Name) ?>" data-sort-order="<?php echo $patient_email_preview->SortField == $patient_email_preview->_email->Name && $patient_email_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_email_preview->_email->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_email_preview->SortField == $patient_email_preview->_email->Name) { ?><?php if ($patient_email_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_email_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_email_preview->email_type->Visible) { // email_type ?>
	<?php if ($patient_email->SortUrl($patient_email_preview->email_type) == "") { ?>
		<th class="<?php echo $patient_email_preview->email_type->headerCellClass() ?>"><?php echo $patient_email_preview->email_type->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_email_preview->email_type->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_email_preview->email_type->Name) ?>" data-sort-order="<?php echo $patient_email_preview->SortField == $patient_email_preview->email_type->Name && $patient_email_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_email_preview->email_type->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_email_preview->SortField == $patient_email_preview->email_type->Name) { ?><?php if ($patient_email_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_email_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_email_preview->status->Visible) { // status ?>
	<?php if ($patient_email->SortUrl($patient_email_preview->status) == "") { ?>
		<th class="<?php echo $patient_email_preview->status->headerCellClass() ?>"><?php echo $patient_email_preview->status->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $patient_email_preview->status->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo HtmlEncode($patient_email_preview->status->Name) ?>" data-sort-order="<?php echo $patient_email_preview->SortField == $patient_email_preview->status->Name && $patient_email_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_email_preview->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_email_preview->SortField == $patient_email_preview->status->Name) { ?><?php if ($patient_email_preview->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_email_preview->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$patient_email_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$patient_email_preview->RecCount = 0;
$patient_email_preview->RowCount = 0;
while ($patient_email_preview->Recordset && !$patient_email_preview->Recordset->EOF) {

	// Init row class and style
	$patient_email_preview->RecCount++;
	$patient_email_preview->RowCount++;
	$patient_email_preview->CssStyle = "";
	$patient_email_preview->loadListRowValues($patient_email_preview->Recordset);

	// Render row
	$patient_email->RowType = ROWTYPE_PREVIEW; // Preview record
	$patient_email_preview->resetAttributes();
	$patient_email_preview->renderListRow();

	// Render list options
	$patient_email_preview->renderListOptions();
?>
	<tr <?php echo $patient_email->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_email_preview->ListOptions->render("body", "left", $patient_email_preview->RowCount);
?>
<?php if ($patient_email_preview->id->Visible) { // id ?>
		<!-- id -->
		<td<?php echo $patient_email_preview->id->cellAttributes() ?>>
<span<?php echo $patient_email_preview->id->viewAttributes() ?>><?php echo $patient_email_preview->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_email_preview->patient_id->Visible) { // patient_id ?>
		<!-- patient_id -->
		<td<?php echo $patient_email_preview->patient_id->cellAttributes() ?>>
<span<?php echo $patient_email_preview->patient_id->viewAttributes() ?>><?php echo $patient_email_preview->patient_id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_email_preview->_email->Visible) { // email ?>
		<!-- email -->
		<td<?php echo $patient_email_preview->_email->cellAttributes() ?>>
<span<?php echo $patient_email_preview->_email->viewAttributes() ?>><?php echo $patient_email_preview->_email->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_email_preview->email_type->Visible) { // email_type ?>
		<!-- email_type -->
		<td<?php echo $patient_email_preview->email_type->cellAttributes() ?>>
<span<?php echo $patient_email_preview->email_type->viewAttributes() ?>><?php echo $patient_email_preview->email_type->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($patient_email_preview->status->Visible) { // status ?>
		<!-- status -->
		<td<?php echo $patient_email_preview->status->cellAttributes() ?>>
<span<?php echo $patient_email_preview->status->viewAttributes() ?>><?php echo $patient_email_preview->status->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$patient_email_preview->ListOptions->render("body", "right", $patient_email_preview->RowCount);
?>
	</tr>
<?php
	$patient_email_preview->Recordset->MoveNext();
} // while
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php echo $patient_email_preview->Pager->render() ?>
<?php } else { // No record ?>
<div class="card no-border">
<div class="ew-detail-count"><?php echo $Language->phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($patient_email_preview->OtherOptions as $option)
		$option->render("body");
?>
</div>
<?php if ($patient_email_preview->TotalRecords > 0) { ?>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
<?php } ?>
</div><!-- /.card -->
<?php
$patient_email_preview->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php
if ($patient_email_preview->Recordset)
	$patient_email_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$patient_email_preview->terminate();
?>