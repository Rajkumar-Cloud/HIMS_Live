<?php
namespace PHPMaker2020\HIMS;
?>
<?php if ($view_pharmacy_purchase_request_purchased->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_view_pharmacy_purchase_request_purchasedmaster" class="table ew-view-table ew-master-table ew-vertical d-none">
	<tbody>
<?php if ($view_pharmacy_purchase_request_purchased->id->Visible) { // id ?>
		<tr id="r_id">
			<td class="<?php echo $view_pharmacy_purchase_request_purchased->TableLeftColumnClass ?>"><script id="tpc_view_pharmacy_purchase_request_purchased_id" type="text/html"><?php echo $view_pharmacy_purchase_request_purchased->id->caption() ?></script></td>
			<td <?php echo $view_pharmacy_purchase_request_purchased->id->cellAttributes() ?>>
<script id="tpx_view_pharmacy_purchase_request_purchased_id" type="text/html"><span id="el_view_pharmacy_purchase_request_purchased_id">
<span<?php echo $view_pharmacy_purchase_request_purchased->id->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_purchased->id->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased->DT->Visible) { // DT ?>
		<tr id="r_DT">
			<td class="<?php echo $view_pharmacy_purchase_request_purchased->TableLeftColumnClass ?>"><script id="tpc_view_pharmacy_purchase_request_purchased_DT" type="text/html"><?php echo $view_pharmacy_purchase_request_purchased->DT->caption() ?></script></td>
			<td <?php echo $view_pharmacy_purchase_request_purchased->DT->cellAttributes() ?>>
<script id="tpx_view_pharmacy_purchase_request_purchased_DT" type="text/html"><span id="el_view_pharmacy_purchase_request_purchased_DT">
<span<?php echo $view_pharmacy_purchase_request_purchased->DT->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_purchased->DT->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased->EmployeeName->Visible) { // EmployeeName ?>
		<tr id="r_EmployeeName">
			<td class="<?php echo $view_pharmacy_purchase_request_purchased->TableLeftColumnClass ?>"><script id="tpc_view_pharmacy_purchase_request_purchased_EmployeeName" type="text/html"><?php echo $view_pharmacy_purchase_request_purchased->EmployeeName->caption() ?></script></td>
			<td <?php echo $view_pharmacy_purchase_request_purchased->EmployeeName->cellAttributes() ?>>
<script id="tpx_view_pharmacy_purchase_request_purchased_EmployeeName" type="text/html"><span id="el_view_pharmacy_purchase_request_purchased_EmployeeName">
<span<?php echo $view_pharmacy_purchase_request_purchased->EmployeeName->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_purchased->EmployeeName->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased->Department->Visible) { // Department ?>
		<tr id="r_Department">
			<td class="<?php echo $view_pharmacy_purchase_request_purchased->TableLeftColumnClass ?>"><script id="tpc_view_pharmacy_purchase_request_purchased_Department" type="text/html"><?php echo $view_pharmacy_purchase_request_purchased->Department->caption() ?></script></td>
			<td <?php echo $view_pharmacy_purchase_request_purchased->Department->cellAttributes() ?>>
<script id="tpx_view_pharmacy_purchase_request_purchased_Department" type="text/html"><span id="el_view_pharmacy_purchase_request_purchased_Department">
<span<?php echo $view_pharmacy_purchase_request_purchased->Department->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_purchased->Department->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased->ApprovedStatus->Visible) { // ApprovedStatus ?>
		<tr id="r_ApprovedStatus">
			<td class="<?php echo $view_pharmacy_purchase_request_purchased->TableLeftColumnClass ?>"><script id="tpc_view_pharmacy_purchase_request_purchased_ApprovedStatus" type="text/html"><?php echo $view_pharmacy_purchase_request_purchased->ApprovedStatus->caption() ?></script></td>
			<td <?php echo $view_pharmacy_purchase_request_purchased->ApprovedStatus->cellAttributes() ?>>
<script id="tpx_view_pharmacy_purchase_request_purchased_ApprovedStatus" type="text/html"><span id="el_view_pharmacy_purchase_request_purchased_ApprovedStatus">
<span<?php echo $view_pharmacy_purchase_request_purchased->ApprovedStatus->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_purchased->ApprovedStatus->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased->PurchaseStatus->Visible) { // PurchaseStatus ?>
		<tr id="r_PurchaseStatus">
			<td class="<?php echo $view_pharmacy_purchase_request_purchased->TableLeftColumnClass ?>"><script id="tpc_view_pharmacy_purchase_request_purchased_PurchaseStatus" type="text/html"><?php echo $view_pharmacy_purchase_request_purchased->PurchaseStatus->caption() ?></script></td>
			<td <?php echo $view_pharmacy_purchase_request_purchased->PurchaseStatus->cellAttributes() ?>>
<script id="tpx_view_pharmacy_purchase_request_purchased_PurchaseStatus" type="text/html"><span id="el_view_pharmacy_purchase_request_purchased_PurchaseStatus">
<span<?php echo $view_pharmacy_purchase_request_purchased->PurchaseStatus->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_purchased->PurchaseStatus->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased->HospID->Visible) { // HospID ?>
		<tr id="r_HospID">
			<td class="<?php echo $view_pharmacy_purchase_request_purchased->TableLeftColumnClass ?>"><script id="tpc_view_pharmacy_purchase_request_purchased_HospID" type="text/html"><?php echo $view_pharmacy_purchase_request_purchased->HospID->caption() ?></script></td>
			<td <?php echo $view_pharmacy_purchase_request_purchased->HospID->cellAttributes() ?>>
<script id="tpx_view_pharmacy_purchase_request_purchased_HospID" type="text/html"><span id="el_view_pharmacy_purchase_request_purchased_HospID">
<span<?php echo $view_pharmacy_purchase_request_purchased->HospID->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_purchased->HospID->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased->createdby->Visible) { // createdby ?>
		<tr id="r_createdby">
			<td class="<?php echo $view_pharmacy_purchase_request_purchased->TableLeftColumnClass ?>"><script id="tpc_view_pharmacy_purchase_request_purchased_createdby" type="text/html"><?php echo $view_pharmacy_purchase_request_purchased->createdby->caption() ?></script></td>
			<td <?php echo $view_pharmacy_purchase_request_purchased->createdby->cellAttributes() ?>>
<script id="tpx_view_pharmacy_purchase_request_purchased_createdby" type="text/html"><span id="el_view_pharmacy_purchase_request_purchased_createdby">
<span<?php echo $view_pharmacy_purchase_request_purchased->createdby->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_purchased->createdby->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased->createddatetime->Visible) { // createddatetime ?>
		<tr id="r_createddatetime">
			<td class="<?php echo $view_pharmacy_purchase_request_purchased->TableLeftColumnClass ?>"><script id="tpc_view_pharmacy_purchase_request_purchased_createddatetime" type="text/html"><?php echo $view_pharmacy_purchase_request_purchased->createddatetime->caption() ?></script></td>
			<td <?php echo $view_pharmacy_purchase_request_purchased->createddatetime->cellAttributes() ?>>
<script id="tpx_view_pharmacy_purchase_request_purchased_createddatetime" type="text/html"><span id="el_view_pharmacy_purchase_request_purchased_createddatetime">
<span<?php echo $view_pharmacy_purchase_request_purchased->createddatetime->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_purchased->createddatetime->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased->modifiedby->Visible) { // modifiedby ?>
		<tr id="r_modifiedby">
			<td class="<?php echo $view_pharmacy_purchase_request_purchased->TableLeftColumnClass ?>"><script id="tpc_view_pharmacy_purchase_request_purchased_modifiedby" type="text/html"><?php echo $view_pharmacy_purchase_request_purchased->modifiedby->caption() ?></script></td>
			<td <?php echo $view_pharmacy_purchase_request_purchased->modifiedby->cellAttributes() ?>>
<script id="tpx_view_pharmacy_purchase_request_purchased_modifiedby" type="text/html"><span id="el_view_pharmacy_purchase_request_purchased_modifiedby">
<span<?php echo $view_pharmacy_purchase_request_purchased->modifiedby->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_purchased->modifiedby->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased->modifieddatetime->Visible) { // modifieddatetime ?>
		<tr id="r_modifieddatetime">
			<td class="<?php echo $view_pharmacy_purchase_request_purchased->TableLeftColumnClass ?>"><script id="tpc_view_pharmacy_purchase_request_purchased_modifieddatetime" type="text/html"><?php echo $view_pharmacy_purchase_request_purchased->modifieddatetime->caption() ?></script></td>
			<td <?php echo $view_pharmacy_purchase_request_purchased->modifieddatetime->cellAttributes() ?>>
<script id="tpx_view_pharmacy_purchase_request_purchased_modifieddatetime" type="text/html"><span id="el_view_pharmacy_purchase_request_purchased_modifieddatetime">
<span<?php echo $view_pharmacy_purchase_request_purchased->modifieddatetime->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_purchased->modifieddatetime->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased->BRCODE->Visible) { // BRCODE ?>
		<tr id="r_BRCODE">
			<td class="<?php echo $view_pharmacy_purchase_request_purchased->TableLeftColumnClass ?>"><script id="tpc_view_pharmacy_purchase_request_purchased_BRCODE" type="text/html"><?php echo $view_pharmacy_purchase_request_purchased->BRCODE->caption() ?></script></td>
			<td <?php echo $view_pharmacy_purchase_request_purchased->BRCODE->cellAttributes() ?>>
<script id="tpx_view_pharmacy_purchase_request_purchased_BRCODE" type="text/html"><span id="el_view_pharmacy_purchase_request_purchased_BRCODE">
<span<?php echo $view_pharmacy_purchase_request_purchased->BRCODE->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_purchased->BRCODE->getViewValue() ?></span>
</span></script>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<div id="tpd_view_pharmacy_purchase_request_purchasedmaster" class="ew-custom-template"></div>
<script id="tpm_view_pharmacy_purchase_request_purchasedmaster" type="text/html">
<div id="ct_view_pharmacy_purchase_request_purchased_master"><style>
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
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}
#customers tr:nth-child(even){background-color: #f2f2f2;}
#customers tr:hover {background-color: #ddd;}
#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
<input id="createdbyId" name="createdbyId" type="hidden" value="<?php echo CurrentUserName(); ?>">
<input id="HospIDId" name="HospIDId" type="hidden" value="<?php echo HospitalID(); ?>">
<div class="row">
	<div class="col-4">
		<h3 class="card-title">{{include tmpl="#tpc_view_pharmacy_purchase_request_purchased_EmployeeName"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_pharmacy_purchase_request_purchased_EmployeeName")/}}</h3>
	</div>
		<div class="col-4">
		<h3 class="card-title">{{include tmpl="#tpc_view_pharmacy_purchase_request_purchased_Department"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_pharmacy_purchase_request_purchased_Department")/}}</h3>
	</div>
		<div class="col-4">
		<h3 class="card-title">{{include tmpl="#tpc_view_pharmacy_purchase_request_purchased_DT"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_pharmacy_purchase_request_purchased_DT")/}}</h3>
	</div>
</div>
<div class="row">
	<div class="col-4">
		<h3 class="card-title">{{include tmpl="#tpc_view_pharmacy_purchase_request_purchased_ApprovedStatus"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_pharmacy_purchase_request_purchased_ApprovedStatus")/}}</h3>
	</div>
	<div class="col-4">
		<h3 class="card-title">{{include tmpl="#tpc_view_pharmacy_purchase_request_purchased_PurchaseStatus"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_pharmacy_purchase_request_purchased_PurchaseStatus")/}}</h3>
	</div>
</div>
</div>
</script>

<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($view_pharmacy_purchase_request_purchased->Rows) ?> };
	ew.applyTemplate("tpd_view_pharmacy_purchase_request_purchasedmaster", "tpm_view_pharmacy_purchase_request_purchasedmaster", "view_pharmacy_purchase_request_purchasedmaster", "<?php echo $view_pharmacy_purchase_request_purchased->CustomExport ?>", ew.templateData.rows[0]);
	$("script.view_pharmacy_purchase_request_purchasedmaster_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php } ?>