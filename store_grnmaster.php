<?php
namespace PHPMaker2019\HIMS;
?>
<?php if ($store_grn->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_store_grnmaster" class="table ew-view-table ew-master-table ew-vertical d-none">
	<tbody>
<?php if ($store_grn->id->Visible) { // id ?>
		<tr id="r_id">
			<td class="<?php echo $store_grn->TableLeftColumnClass ?>"><script id="tpc_store_grn_id" class="store_grnmaster" type="text/html"><span><?php echo $store_grn->id->caption() ?></span></script></td>
			<td<?php echo $store_grn->id->cellAttributes() ?>>
<script id="tpx_store_grn_id" class="store_grnmaster" type="text/html">
<span id="el_store_grn_id">
<span<?php echo $store_grn->id->viewAttributes() ?>>
<?php echo $store_grn->id->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($store_grn->GRNNO->Visible) { // GRNNO ?>
		<tr id="r_GRNNO">
			<td class="<?php echo $store_grn->TableLeftColumnClass ?>"><script id="tpc_store_grn_GRNNO" class="store_grnmaster" type="text/html"><span><?php echo $store_grn->GRNNO->caption() ?></span></script></td>
			<td<?php echo $store_grn->GRNNO->cellAttributes() ?>>
<script id="tpx_store_grn_GRNNO" class="store_grnmaster" type="text/html">
<span id="el_store_grn_GRNNO">
<span<?php echo $store_grn->GRNNO->viewAttributes() ?>>
<?php echo $store_grn->GRNNO->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($store_grn->DT->Visible) { // DT ?>
		<tr id="r_DT">
			<td class="<?php echo $store_grn->TableLeftColumnClass ?>"><script id="tpc_store_grn_DT" class="store_grnmaster" type="text/html"><span><?php echo $store_grn->DT->caption() ?></span></script></td>
			<td<?php echo $store_grn->DT->cellAttributes() ?>>
<script id="tpx_store_grn_DT" class="store_grnmaster" type="text/html">
<span id="el_store_grn_DT">
<span<?php echo $store_grn->DT->viewAttributes() ?>>
<?php echo $store_grn->DT->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($store_grn->Customername->Visible) { // Customername ?>
		<tr id="r_Customername">
			<td class="<?php echo $store_grn->TableLeftColumnClass ?>"><script id="tpc_store_grn_Customername" class="store_grnmaster" type="text/html"><span><?php echo $store_grn->Customername->caption() ?></span></script></td>
			<td<?php echo $store_grn->Customername->cellAttributes() ?>>
<script id="tpx_store_grn_Customername" class="store_grnmaster" type="text/html">
<span id="el_store_grn_Customername">
<span<?php echo $store_grn->Customername->viewAttributes() ?>>
<?php echo $store_grn->Customername->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($store_grn->State->Visible) { // State ?>
		<tr id="r_State">
			<td class="<?php echo $store_grn->TableLeftColumnClass ?>"><script id="tpc_store_grn_State" class="store_grnmaster" type="text/html"><span><?php echo $store_grn->State->caption() ?></span></script></td>
			<td<?php echo $store_grn->State->cellAttributes() ?>>
<script id="tpx_store_grn_State" class="store_grnmaster" type="text/html">
<span id="el_store_grn_State">
<span<?php echo $store_grn->State->viewAttributes() ?>>
<?php echo $store_grn->State->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($store_grn->Pincode->Visible) { // Pincode ?>
		<tr id="r_Pincode">
			<td class="<?php echo $store_grn->TableLeftColumnClass ?>"><script id="tpc_store_grn_Pincode" class="store_grnmaster" type="text/html"><span><?php echo $store_grn->Pincode->caption() ?></span></script></td>
			<td<?php echo $store_grn->Pincode->cellAttributes() ?>>
<script id="tpx_store_grn_Pincode" class="store_grnmaster" type="text/html">
<span id="el_store_grn_Pincode">
<span<?php echo $store_grn->Pincode->viewAttributes() ?>>
<?php echo $store_grn->Pincode->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($store_grn->Phone->Visible) { // Phone ?>
		<tr id="r_Phone">
			<td class="<?php echo $store_grn->TableLeftColumnClass ?>"><script id="tpc_store_grn_Phone" class="store_grnmaster" type="text/html"><span><?php echo $store_grn->Phone->caption() ?></span></script></td>
			<td<?php echo $store_grn->Phone->cellAttributes() ?>>
<script id="tpx_store_grn_Phone" class="store_grnmaster" type="text/html">
<span id="el_store_grn_Phone">
<span<?php echo $store_grn->Phone->viewAttributes() ?>>
<?php echo $store_grn->Phone->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($store_grn->BILLNO->Visible) { // BILLNO ?>
		<tr id="r_BILLNO">
			<td class="<?php echo $store_grn->TableLeftColumnClass ?>"><script id="tpc_store_grn_BILLNO" class="store_grnmaster" type="text/html"><span><?php echo $store_grn->BILLNO->caption() ?></span></script></td>
			<td<?php echo $store_grn->BILLNO->cellAttributes() ?>>
<script id="tpx_store_grn_BILLNO" class="store_grnmaster" type="text/html">
<span id="el_store_grn_BILLNO">
<span<?php echo $store_grn->BILLNO->viewAttributes() ?>>
<?php echo $store_grn->BILLNO->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($store_grn->BILLDT->Visible) { // BILLDT ?>
		<tr id="r_BILLDT">
			<td class="<?php echo $store_grn->TableLeftColumnClass ?>"><script id="tpc_store_grn_BILLDT" class="store_grnmaster" type="text/html"><span><?php echo $store_grn->BILLDT->caption() ?></span></script></td>
			<td<?php echo $store_grn->BILLDT->cellAttributes() ?>>
<script id="tpx_store_grn_BILLDT" class="store_grnmaster" type="text/html">
<span id="el_store_grn_BILLDT">
<span<?php echo $store_grn->BILLDT->viewAttributes() ?>>
<?php echo $store_grn->BILLDT->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($store_grn->BillTotalValue->Visible) { // BillTotalValue ?>
		<tr id="r_BillTotalValue">
			<td class="<?php echo $store_grn->TableLeftColumnClass ?>"><script id="tpc_store_grn_BillTotalValue" class="store_grnmaster" type="text/html"><span><?php echo $store_grn->BillTotalValue->caption() ?></span></script></td>
			<td<?php echo $store_grn->BillTotalValue->cellAttributes() ?>>
<script id="tpx_store_grn_BillTotalValue" class="store_grnmaster" type="text/html">
<span id="el_store_grn_BillTotalValue">
<span<?php echo $store_grn->BillTotalValue->viewAttributes() ?>>
<?php echo $store_grn->BillTotalValue->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($store_grn->GRNTotalValue->Visible) { // GRNTotalValue ?>
		<tr id="r_GRNTotalValue">
			<td class="<?php echo $store_grn->TableLeftColumnClass ?>"><script id="tpc_store_grn_GRNTotalValue" class="store_grnmaster" type="text/html"><span><?php echo $store_grn->GRNTotalValue->caption() ?></span></script></td>
			<td<?php echo $store_grn->GRNTotalValue->cellAttributes() ?>>
<script id="tpx_store_grn_GRNTotalValue" class="store_grnmaster" type="text/html">
<span id="el_store_grn_GRNTotalValue">
<span<?php echo $store_grn->GRNTotalValue->viewAttributes() ?>>
<?php echo $store_grn->GRNTotalValue->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($store_grn->BillDiscount->Visible) { // BillDiscount ?>
		<tr id="r_BillDiscount">
			<td class="<?php echo $store_grn->TableLeftColumnClass ?>"><script id="tpc_store_grn_BillDiscount" class="store_grnmaster" type="text/html"><span><?php echo $store_grn->BillDiscount->caption() ?></span></script></td>
			<td<?php echo $store_grn->BillDiscount->cellAttributes() ?>>
<script id="tpx_store_grn_BillDiscount" class="store_grnmaster" type="text/html">
<span id="el_store_grn_BillDiscount">
<span<?php echo $store_grn->BillDiscount->viewAttributes() ?>>
<?php echo $store_grn->BillDiscount->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($store_grn->GrnValue->Visible) { // GrnValue ?>
		<tr id="r_GrnValue">
			<td class="<?php echo $store_grn->TableLeftColumnClass ?>"><script id="tpc_store_grn_GrnValue" class="store_grnmaster" type="text/html"><span><?php echo $store_grn->GrnValue->caption() ?></span></script></td>
			<td<?php echo $store_grn->GrnValue->cellAttributes() ?>>
<script id="tpx_store_grn_GrnValue" class="store_grnmaster" type="text/html">
<span id="el_store_grn_GrnValue">
<span<?php echo $store_grn->GrnValue->viewAttributes() ?>>
<?php echo $store_grn->GrnValue->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($store_grn->Pid->Visible) { // Pid ?>
		<tr id="r_Pid">
			<td class="<?php echo $store_grn->TableLeftColumnClass ?>"><script id="tpc_store_grn_Pid" class="store_grnmaster" type="text/html"><span><?php echo $store_grn->Pid->caption() ?></span></script></td>
			<td<?php echo $store_grn->Pid->cellAttributes() ?>>
<script id="tpx_store_grn_Pid" class="store_grnmaster" type="text/html">
<span id="el_store_grn_Pid">
<span<?php echo $store_grn->Pid->viewAttributes() ?>>
<?php echo $store_grn->Pid->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($store_grn->PaymentNo->Visible) { // PaymentNo ?>
		<tr id="r_PaymentNo">
			<td class="<?php echo $store_grn->TableLeftColumnClass ?>"><script id="tpc_store_grn_PaymentNo" class="store_grnmaster" type="text/html"><span><?php echo $store_grn->PaymentNo->caption() ?></span></script></td>
			<td<?php echo $store_grn->PaymentNo->cellAttributes() ?>>
<script id="tpx_store_grn_PaymentNo" class="store_grnmaster" type="text/html">
<span id="el_store_grn_PaymentNo">
<span<?php echo $store_grn->PaymentNo->viewAttributes() ?>>
<?php echo $store_grn->PaymentNo->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($store_grn->PaymentStatus->Visible) { // PaymentStatus ?>
		<tr id="r_PaymentStatus">
			<td class="<?php echo $store_grn->TableLeftColumnClass ?>"><script id="tpc_store_grn_PaymentStatus" class="store_grnmaster" type="text/html"><span><?php echo $store_grn->PaymentStatus->caption() ?></span></script></td>
			<td<?php echo $store_grn->PaymentStatus->cellAttributes() ?>>
<script id="tpx_store_grn_PaymentStatus" class="store_grnmaster" type="text/html">
<span id="el_store_grn_PaymentStatus">
<span<?php echo $store_grn->PaymentStatus->viewAttributes() ?>>
<?php echo $store_grn->PaymentStatus->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($store_grn->PaidAmount->Visible) { // PaidAmount ?>
		<tr id="r_PaidAmount">
			<td class="<?php echo $store_grn->TableLeftColumnClass ?>"><script id="tpc_store_grn_PaidAmount" class="store_grnmaster" type="text/html"><span><?php echo $store_grn->PaidAmount->caption() ?></span></script></td>
			<td<?php echo $store_grn->PaidAmount->cellAttributes() ?>>
<script id="tpx_store_grn_PaidAmount" class="store_grnmaster" type="text/html">
<span id="el_store_grn_PaidAmount">
<span<?php echo $store_grn->PaidAmount->viewAttributes() ?>>
<?php echo $store_grn->PaidAmount->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($store_grn->StoreID->Visible) { // StoreID ?>
		<tr id="r_StoreID">
			<td class="<?php echo $store_grn->TableLeftColumnClass ?>"><script id="tpc_store_grn_StoreID" class="store_grnmaster" type="text/html"><span><?php echo $store_grn->StoreID->caption() ?></span></script></td>
			<td<?php echo $store_grn->StoreID->cellAttributes() ?>>
<script id="tpx_store_grn_StoreID" class="store_grnmaster" type="text/html">
<span id="el_store_grn_StoreID">
<span<?php echo $store_grn->StoreID->viewAttributes() ?>>
<?php echo $store_grn->StoreID->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<div id="tpd_store_grnmaster" class="ew-custom-template"></div>
<script id="tpm_store_grnmaster" type="text/html">
<div id="ct_store_grn_master"><style>
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
<div class="row">
	<div class="col-4">
		<h3 class="card-title">{{include tmpl="#tpc_store_grn_GRNNO"/}}&nbsp;{{include tmpl="#tpx_store_grn_GRNNO"/}}</h3>
	</div>
</div>
<div id="divCheckbox" style="display: none;">{{include tmpl="#tpc_store_grn_pharmacy_pocol"/}}&nbsp;{{include tmpl="#tpx_store_grn_pharmacy_pocol"/}}</div>
<div class="row">
	<div class="col-4">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Supplier</h3>
			</div>
			<div class="card-body">
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_grn_BRCODE"/}}&nbsp;{{include tmpl="#tpx_store_grn_BRCODE"/}}</span>
				  </div>
				 <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_grn_PC"/}}&nbsp;{{include tmpl="#tpx_store_grn_PC"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_grn_DT"/}}&nbsp;{{include tmpl="#tpx_store_grn_DT"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_grn_YM"/}}&nbsp;{{include tmpl="#tpx_store_grn_YM"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_grn_Customercode"/}}&nbsp;{{include tmpl="#tpx_store_grn_Customercode"/}}</span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_grn_Customername"/}}&nbsp;{{include tmpl="#tpx_store_grn_Customername"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_grn_BILLDT"/}}&nbsp;{{include tmpl="#tpx_store_grn_BILLDT"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_grn_BILLNO"/}}&nbsp;{{include tmpl="#tpx_store_grn_BILLNO"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_grn_BillTotalValue"/}}&nbsp;{{include tmpl="#tpx_store_grn_BillTotalValue"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_grn_BillUpload"/}}&nbsp;{{include tmpl="#tpx_store_grn_BillUpload"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_grn_Remarks"/}}&nbsp;{{include tmpl="#tpx_store_grn_Remarks"/}}</span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
	<div class="col-8">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Details</h3>
			</div>
			<div class="card-body">
				   <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_grn_Address1"/}}&nbsp;{{include tmpl="#tpx_store_grn_Address1"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_grn_Address2"/}}&nbsp;{{include tmpl="#tpx_store_grn_Address2"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_grn_Address3"/}}&nbsp;{{include tmpl="#tpx_store_grn_Address3"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_grn_State"/}}&nbsp;{{include tmpl="#tpx_store_grn_State"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_grn_Pincode"/}}&nbsp;{{include tmpl="#tpx_store_grn_Pincode"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_grn_Fax"/}}&nbsp;{{include tmpl="#tpx_store_grn_Fax"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_grn_Phone"/}}&nbsp;{{include tmpl="#tpx_store_grn_Phone"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_grn_GRNTotalValue"/}}&nbsp;{{include tmpl="#tpx_store_grn_GRNTotalValue"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_grn_TransPort"/}}&nbsp;{{include tmpl="#tpx_store_grn_TransPort"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_grn_AnyOther"/}}&nbsp;{{include tmpl="#tpx_store_grn_AnyOther"/}}</span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_grn_BillDiscount"/}}&nbsp;{{include tmpl="#tpx_store_grn_BillDiscount"/}}</span>
				  </div>
				  <div hidden class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_store_grn_GrnValue"/}}&nbsp;{{include tmpl="#tpx_store_grn_GrnValue"/}}</span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>				
	</div>
</div>
</div>
</script>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($store_grn->Rows) ?> };
ew.applyTemplate("tpd_store_grnmaster", "tpm_store_grnmaster", "store_grnmaster", "<?php echo $store_grn->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.store_grnmaster_js").each(function(){ew.addScript(this.text);});
</script>
<?php } ?>