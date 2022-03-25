<?php
namespace PHPMaker2019\HIMS;
?>
<?php if ($ivf_oocytedenudation->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_ivf_oocytedenudationmaster" class="table ew-view-table ew-master-table ew-vertical d-none">
	<tbody>
<?php if ($ivf_oocytedenudation->id->Visible) { // id ?>
		<tr id="r_id">
			<td class="<?php echo $ivf_oocytedenudation->TableLeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_id" class="ivf_oocytedenudationmaster" type="text/html"><span><?php echo $ivf_oocytedenudation->id->caption() ?></span></script></td>
			<td<?php echo $ivf_oocytedenudation->id->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_id" class="ivf_oocytedenudationmaster" type="text/html">
<span id="el_ivf_oocytedenudation_id">
<span<?php echo $ivf_oocytedenudation->id->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->id->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->RIDNo->Visible) { // RIDNo ?>
		<tr id="r_RIDNo">
			<td class="<?php echo $ivf_oocytedenudation->TableLeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_RIDNo" class="ivf_oocytedenudationmaster" type="text/html"><span><?php echo $ivf_oocytedenudation->RIDNo->caption() ?></span></script></td>
			<td<?php echo $ivf_oocytedenudation->RIDNo->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_RIDNo" class="ivf_oocytedenudationmaster" type="text/html">
<span id="el_ivf_oocytedenudation_RIDNo">
<span<?php echo $ivf_oocytedenudation->RIDNo->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->RIDNo->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->Name->Visible) { // Name ?>
		<tr id="r_Name">
			<td class="<?php echo $ivf_oocytedenudation->TableLeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_Name" class="ivf_oocytedenudationmaster" type="text/html"><span><?php echo $ivf_oocytedenudation->Name->caption() ?></span></script></td>
			<td<?php echo $ivf_oocytedenudation->Name->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_Name" class="ivf_oocytedenudationmaster" type="text/html">
<span id="el_ivf_oocytedenudation_Name">
<span<?php echo $ivf_oocytedenudation->Name->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->Name->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->ResultDate->Visible) { // ResultDate ?>
		<tr id="r_ResultDate">
			<td class="<?php echo $ivf_oocytedenudation->TableLeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_ResultDate" class="ivf_oocytedenudationmaster" type="text/html"><span><?php echo $ivf_oocytedenudation->ResultDate->caption() ?></span></script></td>
			<td<?php echo $ivf_oocytedenudation->ResultDate->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_ResultDate" class="ivf_oocytedenudationmaster" type="text/html">
<span id="el_ivf_oocytedenudation_ResultDate">
<span<?php echo $ivf_oocytedenudation->ResultDate->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->ResultDate->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->Surgeon->Visible) { // Surgeon ?>
		<tr id="r_Surgeon">
			<td class="<?php echo $ivf_oocytedenudation->TableLeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_Surgeon" class="ivf_oocytedenudationmaster" type="text/html"><span><?php echo $ivf_oocytedenudation->Surgeon->caption() ?></span></script></td>
			<td<?php echo $ivf_oocytedenudation->Surgeon->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_Surgeon" class="ivf_oocytedenudationmaster" type="text/html">
<span id="el_ivf_oocytedenudation_Surgeon">
<span<?php echo $ivf_oocytedenudation->Surgeon->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->Surgeon->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->AsstSurgeon->Visible) { // AsstSurgeon ?>
		<tr id="r_AsstSurgeon">
			<td class="<?php echo $ivf_oocytedenudation->TableLeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_AsstSurgeon" class="ivf_oocytedenudationmaster" type="text/html"><span><?php echo $ivf_oocytedenudation->AsstSurgeon->caption() ?></span></script></td>
			<td<?php echo $ivf_oocytedenudation->AsstSurgeon->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_AsstSurgeon" class="ivf_oocytedenudationmaster" type="text/html">
<span id="el_ivf_oocytedenudation_AsstSurgeon">
<span<?php echo $ivf_oocytedenudation->AsstSurgeon->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->AsstSurgeon->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->Anaesthetist->Visible) { // Anaesthetist ?>
		<tr id="r_Anaesthetist">
			<td class="<?php echo $ivf_oocytedenudation->TableLeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_Anaesthetist" class="ivf_oocytedenudationmaster" type="text/html"><span><?php echo $ivf_oocytedenudation->Anaesthetist->caption() ?></span></script></td>
			<td<?php echo $ivf_oocytedenudation->Anaesthetist->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_Anaesthetist" class="ivf_oocytedenudationmaster" type="text/html">
<span id="el_ivf_oocytedenudation_Anaesthetist">
<span<?php echo $ivf_oocytedenudation->Anaesthetist->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->Anaesthetist->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->AnaestheiaType->Visible) { // AnaestheiaType ?>
		<tr id="r_AnaestheiaType">
			<td class="<?php echo $ivf_oocytedenudation->TableLeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_AnaestheiaType" class="ivf_oocytedenudationmaster" type="text/html"><span><?php echo $ivf_oocytedenudation->AnaestheiaType->caption() ?></span></script></td>
			<td<?php echo $ivf_oocytedenudation->AnaestheiaType->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_AnaestheiaType" class="ivf_oocytedenudationmaster" type="text/html">
<span id="el_ivf_oocytedenudation_AnaestheiaType">
<span<?php echo $ivf_oocytedenudation->AnaestheiaType->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->AnaestheiaType->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->PrimaryEmbryologist->Visible) { // PrimaryEmbryologist ?>
		<tr id="r_PrimaryEmbryologist">
			<td class="<?php echo $ivf_oocytedenudation->TableLeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_PrimaryEmbryologist" class="ivf_oocytedenudationmaster" type="text/html"><span><?php echo $ivf_oocytedenudation->PrimaryEmbryologist->caption() ?></span></script></td>
			<td<?php echo $ivf_oocytedenudation->PrimaryEmbryologist->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_PrimaryEmbryologist" class="ivf_oocytedenudationmaster" type="text/html">
<span id="el_ivf_oocytedenudation_PrimaryEmbryologist">
<span<?php echo $ivf_oocytedenudation->PrimaryEmbryologist->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->PrimaryEmbryologist->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->SecondaryEmbryologist->Visible) { // SecondaryEmbryologist ?>
		<tr id="r_SecondaryEmbryologist">
			<td class="<?php echo $ivf_oocytedenudation->TableLeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_SecondaryEmbryologist" class="ivf_oocytedenudationmaster" type="text/html"><span><?php echo $ivf_oocytedenudation->SecondaryEmbryologist->caption() ?></span></script></td>
			<td<?php echo $ivf_oocytedenudation->SecondaryEmbryologist->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_SecondaryEmbryologist" class="ivf_oocytedenudationmaster" type="text/html">
<span id="el_ivf_oocytedenudation_SecondaryEmbryologist">
<span<?php echo $ivf_oocytedenudation->SecondaryEmbryologist->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->SecondaryEmbryologist->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->NoOfFolliclesRight->Visible) { // NoOfFolliclesRight ?>
		<tr id="r_NoOfFolliclesRight">
			<td class="<?php echo $ivf_oocytedenudation->TableLeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_NoOfFolliclesRight" class="ivf_oocytedenudationmaster" type="text/html"><span><?php echo $ivf_oocytedenudation->NoOfFolliclesRight->caption() ?></span></script></td>
			<td<?php echo $ivf_oocytedenudation->NoOfFolliclesRight->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_NoOfFolliclesRight" class="ivf_oocytedenudationmaster" type="text/html">
<span id="el_ivf_oocytedenudation_NoOfFolliclesRight">
<span<?php echo $ivf_oocytedenudation->NoOfFolliclesRight->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->NoOfFolliclesRight->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->NoOfFolliclesLeft->Visible) { // NoOfFolliclesLeft ?>
		<tr id="r_NoOfFolliclesLeft">
			<td class="<?php echo $ivf_oocytedenudation->TableLeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_NoOfFolliclesLeft" class="ivf_oocytedenudationmaster" type="text/html"><span><?php echo $ivf_oocytedenudation->NoOfFolliclesLeft->caption() ?></span></script></td>
			<td<?php echo $ivf_oocytedenudation->NoOfFolliclesLeft->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_NoOfFolliclesLeft" class="ivf_oocytedenudationmaster" type="text/html">
<span id="el_ivf_oocytedenudation_NoOfFolliclesLeft">
<span<?php echo $ivf_oocytedenudation->NoOfFolliclesLeft->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->NoOfFolliclesLeft->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->NoOfOocytes->Visible) { // NoOfOocytes ?>
		<tr id="r_NoOfOocytes">
			<td class="<?php echo $ivf_oocytedenudation->TableLeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_NoOfOocytes" class="ivf_oocytedenudationmaster" type="text/html"><span><?php echo $ivf_oocytedenudation->NoOfOocytes->caption() ?></span></script></td>
			<td<?php echo $ivf_oocytedenudation->NoOfOocytes->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_NoOfOocytes" class="ivf_oocytedenudationmaster" type="text/html">
<span id="el_ivf_oocytedenudation_NoOfOocytes">
<span<?php echo $ivf_oocytedenudation->NoOfOocytes->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->NoOfOocytes->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->RecordOocyteDenudation->Visible) { // RecordOocyteDenudation ?>
		<tr id="r_RecordOocyteDenudation">
			<td class="<?php echo $ivf_oocytedenudation->TableLeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_RecordOocyteDenudation" class="ivf_oocytedenudationmaster" type="text/html"><span><?php echo $ivf_oocytedenudation->RecordOocyteDenudation->caption() ?></span></script></td>
			<td<?php echo $ivf_oocytedenudation->RecordOocyteDenudation->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_RecordOocyteDenudation" class="ivf_oocytedenudationmaster" type="text/html">
<span id="el_ivf_oocytedenudation_RecordOocyteDenudation">
<span<?php echo $ivf_oocytedenudation->RecordOocyteDenudation->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->RecordOocyteDenudation->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->DateOfDenudation->Visible) { // DateOfDenudation ?>
		<tr id="r_DateOfDenudation">
			<td class="<?php echo $ivf_oocytedenudation->TableLeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_DateOfDenudation" class="ivf_oocytedenudationmaster" type="text/html"><span><?php echo $ivf_oocytedenudation->DateOfDenudation->caption() ?></span></script></td>
			<td<?php echo $ivf_oocytedenudation->DateOfDenudation->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_DateOfDenudation" class="ivf_oocytedenudationmaster" type="text/html">
<span id="el_ivf_oocytedenudation_DateOfDenudation">
<span<?php echo $ivf_oocytedenudation->DateOfDenudation->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->DateOfDenudation->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->DenudationDoneBy->Visible) { // DenudationDoneBy ?>
		<tr id="r_DenudationDoneBy">
			<td class="<?php echo $ivf_oocytedenudation->TableLeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_DenudationDoneBy" class="ivf_oocytedenudationmaster" type="text/html"><span><?php echo $ivf_oocytedenudation->DenudationDoneBy->caption() ?></span></script></td>
			<td<?php echo $ivf_oocytedenudation->DenudationDoneBy->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_DenudationDoneBy" class="ivf_oocytedenudationmaster" type="text/html">
<span id="el_ivf_oocytedenudation_DenudationDoneBy">
<span<?php echo $ivf_oocytedenudation->DenudationDoneBy->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->DenudationDoneBy->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->status->Visible) { // status ?>
		<tr id="r_status">
			<td class="<?php echo $ivf_oocytedenudation->TableLeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_status" class="ivf_oocytedenudationmaster" type="text/html"><span><?php echo $ivf_oocytedenudation->status->caption() ?></span></script></td>
			<td<?php echo $ivf_oocytedenudation->status->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_status" class="ivf_oocytedenudationmaster" type="text/html">
<span id="el_ivf_oocytedenudation_status">
<span<?php echo $ivf_oocytedenudation->status->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->status->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->createdby->Visible) { // createdby ?>
		<tr id="r_createdby">
			<td class="<?php echo $ivf_oocytedenudation->TableLeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_createdby" class="ivf_oocytedenudationmaster" type="text/html"><span><?php echo $ivf_oocytedenudation->createdby->caption() ?></span></script></td>
			<td<?php echo $ivf_oocytedenudation->createdby->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_createdby" class="ivf_oocytedenudationmaster" type="text/html">
<span id="el_ivf_oocytedenudation_createdby">
<span<?php echo $ivf_oocytedenudation->createdby->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->createdby->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->createddatetime->Visible) { // createddatetime ?>
		<tr id="r_createddatetime">
			<td class="<?php echo $ivf_oocytedenudation->TableLeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_createddatetime" class="ivf_oocytedenudationmaster" type="text/html"><span><?php echo $ivf_oocytedenudation->createddatetime->caption() ?></span></script></td>
			<td<?php echo $ivf_oocytedenudation->createddatetime->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_createddatetime" class="ivf_oocytedenudationmaster" type="text/html">
<span id="el_ivf_oocytedenudation_createddatetime">
<span<?php echo $ivf_oocytedenudation->createddatetime->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->createddatetime->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->modifiedby->Visible) { // modifiedby ?>
		<tr id="r_modifiedby">
			<td class="<?php echo $ivf_oocytedenudation->TableLeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_modifiedby" class="ivf_oocytedenudationmaster" type="text/html"><span><?php echo $ivf_oocytedenudation->modifiedby->caption() ?></span></script></td>
			<td<?php echo $ivf_oocytedenudation->modifiedby->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_modifiedby" class="ivf_oocytedenudationmaster" type="text/html">
<span id="el_ivf_oocytedenudation_modifiedby">
<span<?php echo $ivf_oocytedenudation->modifiedby->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->modifiedby->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->modifieddatetime->Visible) { // modifieddatetime ?>
		<tr id="r_modifieddatetime">
			<td class="<?php echo $ivf_oocytedenudation->TableLeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_modifieddatetime" class="ivf_oocytedenudationmaster" type="text/html"><span><?php echo $ivf_oocytedenudation->modifieddatetime->caption() ?></span></script></td>
			<td<?php echo $ivf_oocytedenudation->modifieddatetime->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_modifieddatetime" class="ivf_oocytedenudationmaster" type="text/html">
<span id="el_ivf_oocytedenudation_modifieddatetime">
<span<?php echo $ivf_oocytedenudation->modifieddatetime->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->modifieddatetime->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->TidNo->Visible) { // TidNo ?>
		<tr id="r_TidNo">
			<td class="<?php echo $ivf_oocytedenudation->TableLeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_TidNo" class="ivf_oocytedenudationmaster" type="text/html"><span><?php echo $ivf_oocytedenudation->TidNo->caption() ?></span></script></td>
			<td<?php echo $ivf_oocytedenudation->TidNo->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_TidNo" class="ivf_oocytedenudationmaster" type="text/html">
<span id="el_ivf_oocytedenudation_TidNo">
<span<?php echo $ivf_oocytedenudation->TidNo->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->TidNo->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->ExpFollicles->Visible) { // ExpFollicles ?>
		<tr id="r_ExpFollicles">
			<td class="<?php echo $ivf_oocytedenudation->TableLeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_ExpFollicles" class="ivf_oocytedenudationmaster" type="text/html"><span><?php echo $ivf_oocytedenudation->ExpFollicles->caption() ?></span></script></td>
			<td<?php echo $ivf_oocytedenudation->ExpFollicles->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_ExpFollicles" class="ivf_oocytedenudationmaster" type="text/html">
<span id="el_ivf_oocytedenudation_ExpFollicles">
<span<?php echo $ivf_oocytedenudation->ExpFollicles->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->ExpFollicles->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->SecondaryDenudationDoneBy->Visible) { // SecondaryDenudationDoneBy ?>
		<tr id="r_SecondaryDenudationDoneBy">
			<td class="<?php echo $ivf_oocytedenudation->TableLeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_SecondaryDenudationDoneBy" class="ivf_oocytedenudationmaster" type="text/html"><span><?php echo $ivf_oocytedenudation->SecondaryDenudationDoneBy->caption() ?></span></script></td>
			<td<?php echo $ivf_oocytedenudation->SecondaryDenudationDoneBy->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_SecondaryDenudationDoneBy" class="ivf_oocytedenudationmaster" type="text/html">
<span id="el_ivf_oocytedenudation_SecondaryDenudationDoneBy">
<span<?php echo $ivf_oocytedenudation->SecondaryDenudationDoneBy->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->SecondaryDenudationDoneBy->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->OocyteOrgin->Visible) { // OocyteOrgin ?>
		<tr id="r_OocyteOrgin">
			<td class="<?php echo $ivf_oocytedenudation->TableLeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_OocyteOrgin" class="ivf_oocytedenudationmaster" type="text/html"><span><?php echo $ivf_oocytedenudation->OocyteOrgin->caption() ?></span></script></td>
			<td<?php echo $ivf_oocytedenudation->OocyteOrgin->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_OocyteOrgin" class="ivf_oocytedenudationmaster" type="text/html">
<span id="el_ivf_oocytedenudation_OocyteOrgin">
<span<?php echo $ivf_oocytedenudation->OocyteOrgin->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->OocyteOrgin->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->patient1->Visible) { // patient1 ?>
		<tr id="r_patient1">
			<td class="<?php echo $ivf_oocytedenudation->TableLeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_patient1" class="ivf_oocytedenudationmaster" type="text/html"><span><?php echo $ivf_oocytedenudation->patient1->caption() ?></span></script></td>
			<td<?php echo $ivf_oocytedenudation->patient1->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_patient1" class="ivf_oocytedenudationmaster" type="text/html">
<span id="el_ivf_oocytedenudation_patient1">
<span<?php echo $ivf_oocytedenudation->patient1->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->patient1->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->OocyteType->Visible) { // OocyteType ?>
		<tr id="r_OocyteType">
			<td class="<?php echo $ivf_oocytedenudation->TableLeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_OocyteType" class="ivf_oocytedenudationmaster" type="text/html"><span><?php echo $ivf_oocytedenudation->OocyteType->caption() ?></span></script></td>
			<td<?php echo $ivf_oocytedenudation->OocyteType->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_OocyteType" class="ivf_oocytedenudationmaster" type="text/html">
<span id="el_ivf_oocytedenudation_OocyteType">
<span<?php echo $ivf_oocytedenudation->OocyteType->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->OocyteType->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->MIOocytesDonate1->Visible) { // MIOocytesDonate1 ?>
		<tr id="r_MIOocytesDonate1">
			<td class="<?php echo $ivf_oocytedenudation->TableLeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_MIOocytesDonate1" class="ivf_oocytedenudationmaster" type="text/html"><span><?php echo $ivf_oocytedenudation->MIOocytesDonate1->caption() ?></span></script></td>
			<td<?php echo $ivf_oocytedenudation->MIOocytesDonate1->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_MIOocytesDonate1" class="ivf_oocytedenudationmaster" type="text/html">
<span id="el_ivf_oocytedenudation_MIOocytesDonate1">
<span<?php echo $ivf_oocytedenudation->MIOocytesDonate1->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->MIOocytesDonate1->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->MIOocytesDonate2->Visible) { // MIOocytesDonate2 ?>
		<tr id="r_MIOocytesDonate2">
			<td class="<?php echo $ivf_oocytedenudation->TableLeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_MIOocytesDonate2" class="ivf_oocytedenudationmaster" type="text/html"><span><?php echo $ivf_oocytedenudation->MIOocytesDonate2->caption() ?></span></script></td>
			<td<?php echo $ivf_oocytedenudation->MIOocytesDonate2->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_MIOocytesDonate2" class="ivf_oocytedenudationmaster" type="text/html">
<span id="el_ivf_oocytedenudation_MIOocytesDonate2">
<span<?php echo $ivf_oocytedenudation->MIOocytesDonate2->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->MIOocytesDonate2->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->SelfMI->Visible) { // SelfMI ?>
		<tr id="r_SelfMI">
			<td class="<?php echo $ivf_oocytedenudation->TableLeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_SelfMI" class="ivf_oocytedenudationmaster" type="text/html"><span><?php echo $ivf_oocytedenudation->SelfMI->caption() ?></span></script></td>
			<td<?php echo $ivf_oocytedenudation->SelfMI->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_SelfMI" class="ivf_oocytedenudationmaster" type="text/html">
<span id="el_ivf_oocytedenudation_SelfMI">
<span<?php echo $ivf_oocytedenudation->SelfMI->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->SelfMI->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->SelfMII->Visible) { // SelfMII ?>
		<tr id="r_SelfMII">
			<td class="<?php echo $ivf_oocytedenudation->TableLeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_SelfMII" class="ivf_oocytedenudationmaster" type="text/html"><span><?php echo $ivf_oocytedenudation->SelfMII->caption() ?></span></script></td>
			<td<?php echo $ivf_oocytedenudation->SelfMII->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_SelfMII" class="ivf_oocytedenudationmaster" type="text/html">
<span id="el_ivf_oocytedenudation_SelfMII">
<span<?php echo $ivf_oocytedenudation->SelfMII->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->SelfMII->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->patient3->Visible) { // patient3 ?>
		<tr id="r_patient3">
			<td class="<?php echo $ivf_oocytedenudation->TableLeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_patient3" class="ivf_oocytedenudationmaster" type="text/html"><span><?php echo $ivf_oocytedenudation->patient3->caption() ?></span></script></td>
			<td<?php echo $ivf_oocytedenudation->patient3->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_patient3" class="ivf_oocytedenudationmaster" type="text/html">
<span id="el_ivf_oocytedenudation_patient3">
<span<?php echo $ivf_oocytedenudation->patient3->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->patient3->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->patient4->Visible) { // patient4 ?>
		<tr id="r_patient4">
			<td class="<?php echo $ivf_oocytedenudation->TableLeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_patient4" class="ivf_oocytedenudationmaster" type="text/html"><span><?php echo $ivf_oocytedenudation->patient4->caption() ?></span></script></td>
			<td<?php echo $ivf_oocytedenudation->patient4->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_patient4" class="ivf_oocytedenudationmaster" type="text/html">
<span id="el_ivf_oocytedenudation_patient4">
<span<?php echo $ivf_oocytedenudation->patient4->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->patient4->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->OocytesDonate3->Visible) { // OocytesDonate3 ?>
		<tr id="r_OocytesDonate3">
			<td class="<?php echo $ivf_oocytedenudation->TableLeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_OocytesDonate3" class="ivf_oocytedenudationmaster" type="text/html"><span><?php echo $ivf_oocytedenudation->OocytesDonate3->caption() ?></span></script></td>
			<td<?php echo $ivf_oocytedenudation->OocytesDonate3->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_OocytesDonate3" class="ivf_oocytedenudationmaster" type="text/html">
<span id="el_ivf_oocytedenudation_OocytesDonate3">
<span<?php echo $ivf_oocytedenudation->OocytesDonate3->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->OocytesDonate3->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->OocytesDonate4->Visible) { // OocytesDonate4 ?>
		<tr id="r_OocytesDonate4">
			<td class="<?php echo $ivf_oocytedenudation->TableLeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_OocytesDonate4" class="ivf_oocytedenudationmaster" type="text/html"><span><?php echo $ivf_oocytedenudation->OocytesDonate4->caption() ?></span></script></td>
			<td<?php echo $ivf_oocytedenudation->OocytesDonate4->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_OocytesDonate4" class="ivf_oocytedenudationmaster" type="text/html">
<span id="el_ivf_oocytedenudation_OocytesDonate4">
<span<?php echo $ivf_oocytedenudation->OocytesDonate4->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->OocytesDonate4->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->MIOocytesDonate3->Visible) { // MIOocytesDonate3 ?>
		<tr id="r_MIOocytesDonate3">
			<td class="<?php echo $ivf_oocytedenudation->TableLeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_MIOocytesDonate3" class="ivf_oocytedenudationmaster" type="text/html"><span><?php echo $ivf_oocytedenudation->MIOocytesDonate3->caption() ?></span></script></td>
			<td<?php echo $ivf_oocytedenudation->MIOocytesDonate3->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_MIOocytesDonate3" class="ivf_oocytedenudationmaster" type="text/html">
<span id="el_ivf_oocytedenudation_MIOocytesDonate3">
<span<?php echo $ivf_oocytedenudation->MIOocytesDonate3->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->MIOocytesDonate3->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->MIOocytesDonate4->Visible) { // MIOocytesDonate4 ?>
		<tr id="r_MIOocytesDonate4">
			<td class="<?php echo $ivf_oocytedenudation->TableLeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_MIOocytesDonate4" class="ivf_oocytedenudationmaster" type="text/html"><span><?php echo $ivf_oocytedenudation->MIOocytesDonate4->caption() ?></span></script></td>
			<td<?php echo $ivf_oocytedenudation->MIOocytesDonate4->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_MIOocytesDonate4" class="ivf_oocytedenudationmaster" type="text/html">
<span id="el_ivf_oocytedenudation_MIOocytesDonate4">
<span<?php echo $ivf_oocytedenudation->MIOocytesDonate4->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->MIOocytesDonate4->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->SelfOocytesMI->Visible) { // SelfOocytesMI ?>
		<tr id="r_SelfOocytesMI">
			<td class="<?php echo $ivf_oocytedenudation->TableLeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_SelfOocytesMI" class="ivf_oocytedenudationmaster" type="text/html"><span><?php echo $ivf_oocytedenudation->SelfOocytesMI->caption() ?></span></script></td>
			<td<?php echo $ivf_oocytedenudation->SelfOocytesMI->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_SelfOocytesMI" class="ivf_oocytedenudationmaster" type="text/html">
<span id="el_ivf_oocytedenudation_SelfOocytesMI">
<span<?php echo $ivf_oocytedenudation->SelfOocytesMI->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->SelfOocytesMI->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->SelfOocytesMII->Visible) { // SelfOocytesMII ?>
		<tr id="r_SelfOocytesMII">
			<td class="<?php echo $ivf_oocytedenudation->TableLeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_SelfOocytesMII" class="ivf_oocytedenudationmaster" type="text/html"><span><?php echo $ivf_oocytedenudation->SelfOocytesMII->caption() ?></span></script></td>
			<td<?php echo $ivf_oocytedenudation->SelfOocytesMII->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_SelfOocytesMII" class="ivf_oocytedenudationmaster" type="text/html">
<span id="el_ivf_oocytedenudation_SelfOocytesMII">
<span<?php echo $ivf_oocytedenudation->SelfOocytesMII->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->SelfOocytesMII->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf_oocytedenudation->donor->Visible) { // donor ?>
		<tr id="r_donor">
			<td class="<?php echo $ivf_oocytedenudation->TableLeftColumnClass ?>"><script id="tpc_ivf_oocytedenudation_donor" class="ivf_oocytedenudationmaster" type="text/html"><span><?php echo $ivf_oocytedenudation->donor->caption() ?></span></script></td>
			<td<?php echo $ivf_oocytedenudation->donor->cellAttributes() ?>>
<script id="tpx_ivf_oocytedenudation_donor" class="ivf_oocytedenudationmaster" type="text/html">
<span id="el_ivf_oocytedenudation_donor">
<span<?php echo $ivf_oocytedenudation->donor->viewAttributes() ?>>
<?php echo $ivf_oocytedenudation->donor->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<div id="tpd_ivf_oocytedenudationmaster" class="ew-custom-template"></div>
<script id="tpm_ivf_oocytedenudationmaster" type="text/html">
<div id="ct_ivf_oocytedenudation_master"><style>
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
<?php
$cid = $_GET["fk_id"] ;
$IVFid = $_GET["fk_RIDNO"] ;
$dbhelper = &DbHelper();
$showmaster = $_GET["showmaster"] ;
if( $showmaster=="ivf_treatment_plan")
{
$sql = "SELECT * FROM ganeshkumar_bjhims.view_ivf_treatment where id='".$IVFid."'; ";
$resultst = $dbhelper->ExecuteRows($sql);
$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where id='".$resultst[0]["RIDNO"]."'; ";
$results = $dbhelper->ExecuteRows($sql);
}else{
$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where id='".$IVFid."'; ";
$results = $dbhelper->ExecuteRows($sql);
}
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Male"]."'; ";
$results1 = $dbhelper->ExecuteRows($sql);
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Female"]."'; ";
$results2 = $dbhelper->ExecuteRows($sql);
if($results2[0]["profilePic"] == "")
{
   $PatientProfilePic = "hims\profile-picture.png";
}else{
 $PatientProfilePic = $results2[0]["profilePic"];
}
if($results1[0]["profilePic"] == "")
{
   $PartnerProfilePic = "hims\profile-picture.png";
}else{
 $PartnerProfilePic = $results1[0]["profilePic"];
}
$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_treatment_plan where id='".$cid."'; ";
$resultsB = $dbhelper->ExecuteRows($sql);
?>	
<input type="hidden" id="TidNO" name="TidNO" value="<?php echo $resultst[0]["id"]; ?>">
<input type="hidden" id="RIDNO" name="RIDNO" value="<?php echo $results[0]["id"]; ?>">
<input type="hidden" id="Female" name="Female" value="<?php echo $results[0]["Female"]; ?>">
<div class="row">
<div class="col-md-6">
Couple ID : <?php echo $results[0]["CoupleID"]; ?>
</div>
<div class="col-md-6">
IVF Cycle NO : <?php echo $resultsB[0]["IVFCycleNO"]; ?>
</div>
</div>
<div class="row">
<div class="col-md-6">
			<!-- Widget: user widget style 1 -->
			<div class="card card-widget widget-user">
			  <!-- Add the bg color to the header using any of the bg-* classes -->
			  <div class="widget-user-header bg-warning">
			  	<h4 class="widget-user-username"><span class="ew-cell">Patient Id : <?php echo $results2[0]["PatientID"]; ?></span></h4>
				<h4 class="widget-user-username"><span class="ew-cell">Patient Name : <?php echo $results2[0]["first_name"]; ?></span></h4>
				<h6 class="widget-user-desc"><span class="ew-cell">Gender : <?php echo $results2[0]["gender"]; ?></span></h6>	
				<h6 class="widget-user-desc"><span class="ew-cell">Blood Group : <?php echo $results2[0]["blood_group"]; ?></span></h6>
			  </div>
			  <div class="widget-user-image">
			   		<img id="profilePicturePatient" class="img-circle elevation-2" src='<?php echo "uploads/".$PatientProfilePic; ?>' alt="User Avatar"> 
			  </div>
			  <div class="card-footer">
				<div class="row">
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header"><span class="ew-cell">Age : <?php echo AgeCalculationb($results2[0]["dob"]); ?></span></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header">Mobile : <?php echo $results2[0]["mobile_no"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4">
					<div class="description-block">
					  <h5 class="description-header">Email : <?php echo $results2[0]["PEmail"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				</div>
				<!-- /.row -->
			  </div>
			</div>
			<!-- /.widget-user -->
</div>
<div class="col-md-6">
			<!-- Widget: user widget style 1 -->
			<div class="card card-widget widget-user">
			  <!-- Add the bg color to the header using any of the bg-* classes -->
			  <div class="widget-user-header bg-warning">
			  	<h4 class="widget-user-username"><span class="ew-cell">Partner Id : <?php echo $results1[0]["PatientID"]; ?></span></h4>
				<h4 class="widget-user-username"><span class="ew-cell">Partner Name :<?php echo $results1[0]["first_name"]; ?></span></h4>
				<h6 class="widget-user-desc"><span class="ew-cell">Gender : <?php echo $results1[0]["gender"]; ?></span></h6>	
				<h6 class="widget-user-desc"><span class="ew-cell">Blood Group : <?php echo $results1[0]["blood_group"]; ?></span></h6>
			  </div>
			  <div class="widget-user-image">
			   		<img id="profilePicturePatient" class="img-circle elevation-2" src='<?php echo "uploads/".$PartnerProfilePic; ?>' alt="User Avatar"> 
			  </div>
			  <div class="card-footer">
				<div class="row">
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header"><span class="ew-cell">Age : <?php echo AgeCalculationb($results1[0]["dob"]); ?></span></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header">Mobile : <?php echo $results1[0]["mobile_no"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4">
					<div class="description-block">
					  <h5 class="description-header">Email : <?php echo $results1[0]["PEmail"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				</div>
				<!-- /.row -->
			  </div>
			</div>
			<!-- /.widget-user -->
</div>
</div>
<div id="OvumPickUpHide">
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Ovum Pick Up </h3>
			</div>
			<div class="card-body">
			<table class="ew-table" style="width:100%;">
				<tbody>
					<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_ResultDate"/}}&nbsp;{{include tmpl="#tpx_ivf_oocytedenudation_ResultDate"/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell"></span>
						</td>
					</tr>
					<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_Surgeon"/}}&nbsp;{{include tmpl="#tpx_ivf_oocytedenudation_Surgeon"/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_AsstSurgeon"/}}&nbsp;{{include tmpl="#tpx_ivf_oocytedenudation_AsstSurgeon"/}}</span>
						</td>
					</tr>
					<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_Anaesthetist"/}}&nbsp;{{include tmpl="#tpx_ivf_oocytedenudation_Anaesthetist"/}}</span>
						</td>
						<td style="width:50%">
						{{include tmpl="#tpc_ivf_oocytedenudation_AnaestheiaType"/}}&nbsp;{{include tmpl="#tpx_ivf_oocytedenudation_AnaestheiaType"/}}
						</td>
					</tr>
					<tr>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_PrimaryEmbryologist"/}}&nbsp;{{include tmpl="#tpx_ivf_oocytedenudation_PrimaryEmbryologist"/}}</span>
						</td>
						<td style="width:50%">
							<span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_SecondaryEmbryologist"/}}&nbsp;{{include tmpl="#tpx_ivf_oocytedenudation_SecondaryEmbryologist"/}}</span>
						</td>
					</tr>
				</tbody>
			</table>
			<table class="ew-table" style="width:100%;">
				<tbody>
					<tr>
						<td style="width:50%">
							<span class="ew-cell"></span>
						</td>
					</tr>
				</tbody>
			</table>
			<table class="ew-table" style="width:100%;">
				<tbody>
					<tr>
						<td>
							<span class="ew-cell">No Of Follicles</span>
						</td>
						<td>
							<span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_NoOfFolliclesRight"/}}&nbsp;{{include tmpl="#tpx_ivf_oocytedenudation_NoOfFolliclesRight"/}}</span>
						</td>
						<td>
							<span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_NoOfFolliclesLeft"/}}&nbsp;{{include tmpl="#tpx_ivf_oocytedenudation_NoOfFolliclesLeft"/}}</span>
						</td>
					</tr>
						<tr>
						<td>
							<span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_NoOfOocytes"/}}&nbsp;{{include tmpl="#tpx_ivf_oocytedenudation_NoOfOocytes"/}}</span>
						</td>
						<td>
						</td>
												<td>
						</td>
					</tr>
	</tbody>
</table>
			</div>
		</div>
	</div>
</div>
<div class="col-4">
<button type="button" class="btn btn-block btn-success" onclick="ShowDenudationDoneBy()">Record Oocyte Denudation</button>
</div>
<div class="row" id="DateOfDenudationShow">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Record Oocyte Denudation </h3>
			</div>
			<div class="card-body">  
			<table class="ew-table" style="width:100%;">
				<tbody>
					<tr>
						<td>
							<span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_DateOfDenudation"/}}&nbsp;{{include tmpl="#tpx_ivf_oocytedenudation_DateOfDenudation"/}}</span>
						</td>
						<td>
							<span class="ew-cell">{{include tmpl="#tpc_ivf_oocytedenudation_DenudationDoneBy"/}}&nbsp;{{include tmpl="#tpx_ivf_oocytedenudation_DenudationDoneBy"/}}</span>
						</td>
					</tr>
				</tbody>
			</table>														  
			</div>
		</div>
	</div>
</div>
</div>
</div>
</script>
<script type="text/html" class="ivf_oocytedenudationmaster_js">

function ShowDenudationDoneBy()
{
	 document.getElementById("DateOfDenudationShow").style.visibility = "visible";
}
</script>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($ivf_oocytedenudation->Rows) ?> };
ew.applyTemplate("tpd_ivf_oocytedenudationmaster", "tpm_ivf_oocytedenudationmaster", "ivf_oocytedenudationmaster", "<?php echo $ivf_oocytedenudation->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.ivf_oocytedenudationmaster_js").each(function(){ew.addScript(this.text);});
</script>
<?php } ?>