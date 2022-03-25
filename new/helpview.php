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
$help_view = new help_view();

// Run the page
$help_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$help_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$help_view->isExport()) { ?>
<script>
var fhelpview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fhelpview = currentForm = new ew.Form("fhelpview", "view");
	loadjs.done("fhelpview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$help_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $help_view->ExportOptions->render("body") ?>
<?php $help_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $help_view->showPageHeader(); ?>
<?php
$help_view->showMessage();
?>
<form name="fhelpview" id="fhelpview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="help">
<input type="hidden" name="modal" value="<?php echo (int)$help_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($help_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $help_view->TableLeftColumnClass ?>"><span id="elh_help_id"><script id="tpc_help_id" type="text/html"><?php echo $help_view->id->caption() ?></script></span></td>
		<td data-name="id" <?php echo $help_view->id->cellAttributes() ?>>
<script id="tpx_help_id" type="text/html"><span id="el_help_id">
<span<?php echo $help_view->id->viewAttributes() ?>><?php echo $help_view->id->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($help_view->Tittle->Visible) { // Tittle ?>
	<tr id="r_Tittle">
		<td class="<?php echo $help_view->TableLeftColumnClass ?>"><span id="elh_help_Tittle"><script id="tpc_help_Tittle" type="text/html"><?php echo $help_view->Tittle->caption() ?></script></span></td>
		<td data-name="Tittle" <?php echo $help_view->Tittle->cellAttributes() ?>>
<script id="tpx_help_Tittle" type="text/html"><span id="el_help_Tittle">
<span<?php echo $help_view->Tittle->viewAttributes() ?>><?php echo $help_view->Tittle->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($help_view->Description->Visible) { // Description ?>
	<tr id="r_Description">
		<td class="<?php echo $help_view->TableLeftColumnClass ?>"><span id="elh_help_Description"><script id="tpc_help_Description" type="text/html"><?php echo $help_view->Description->caption() ?></script></span></td>
		<td data-name="Description" <?php echo $help_view->Description->cellAttributes() ?>>
<script id="tpx_help_Description" type="text/html"><span id="el_help_Description">
<span<?php echo $help_view->Description->viewAttributes() ?>><?php echo $help_view->Description->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($help_view->orderid->Visible) { // orderid ?>
	<tr id="r_orderid">
		<td class="<?php echo $help_view->TableLeftColumnClass ?>"><span id="elh_help_orderid"><script id="tpc_help_orderid" type="text/html"><?php echo $help_view->orderid->caption() ?></script></span></td>
		<td data-name="orderid" <?php echo $help_view->orderid->cellAttributes() ?>>
<script id="tpx_help_orderid" type="text/html"><span id="el_help_orderid">
<span<?php echo $help_view->orderid->viewAttributes() ?>><?php echo $help_view->orderid->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
</table>
<div id="tpd_helpview" class="ew-custom-template"></div>
<script id="tpm_helpview" type="text/html">
<div id="ct_help_view"><style>
	.ew-form:not(.ew-list-form):not(.ew-pager-form), table.ew-master-table.ew-vertical {
		width: 100%;
	}
	.content-wrapper {
		background: #f4f6f9;
	}
	.form-control-plaintext {
		display: unset;
		width: unset;
	}
	.widget-user .widget-user-image {
		position: absolute;
		top: 65px;
		left: 90%;
		margin-left: -45px;
	}
	.widget-user .card-footer {
		padding-top: 0px;
	}
	.card-footer {
		padding: .05rem 0.025rem;
		background-color: rgba(17,17,17,0.03);
		border-top: 0 solid #f4f4f4;
	}
	.widget-user .widget-user-username {
	margin-top: 0;
	margin-bottom: 0px;
	font-size: 18px;
	font-weight: 300;
	text-shadow: 0 1px 1px rgba(0,0,0,0.2);
}
.widget-user .widget-user-image {
	position: absolute;
	top: 5px;
	left: 90%;
	margin-left: -45px;
}
.widget-user .widget-user-header {
	padding: 1rem;
	height: 100px;
	border-top-left-radius: .25rem;
	border-top-right-radius: .25rem;
}
.form-control:not(textarea) {
	width: -webkit-fill-available;
}
.ew-row .ew-cell {
	margin-right: unset;
}
</style>
{{include tmpl="#tpc_help_Description"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_help_Description")/}}
</div>
</script>

</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($help->Rows) ?> };
	ew.applyTemplate("tpd_helpview", "tpm_helpview", "helpview", "<?php echo $help->CustomExport ?>", ew.templateData.rows[0]);
	$("script.helpview_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$help_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$help_view->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$help_view->terminate();
?>