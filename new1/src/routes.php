<?php

namespace PHPMaker2021\project3;

use Slim\App;
use Slim\Routing\RouteCollectorProxy;

// Handle Routes
return function (App $app) {
    // appointment_block_slot
    $app->any('/AppointmentBlockSlotList[/{id}]', AppointmentBlockSlotController::class . ':list')->add(PermissionMiddleware::class)->setName('AppointmentBlockSlotList-appointment_block_slot-list'); // list
    $app->any('/AppointmentBlockSlotAdd[/{id}]', AppointmentBlockSlotController::class . ':add')->add(PermissionMiddleware::class)->setName('AppointmentBlockSlotAdd-appointment_block_slot-add'); // add
    $app->any('/AppointmentBlockSlotView[/{id}]', AppointmentBlockSlotController::class . ':view')->add(PermissionMiddleware::class)->setName('AppointmentBlockSlotView-appointment_block_slot-view'); // view
    $app->any('/AppointmentBlockSlotEdit[/{id}]', AppointmentBlockSlotController::class . ':edit')->add(PermissionMiddleware::class)->setName('AppointmentBlockSlotEdit-appointment_block_slot-edit'); // edit
    $app->any('/AppointmentBlockSlotDelete[/{id}]', AppointmentBlockSlotController::class . ':delete')->add(PermissionMiddleware::class)->setName('AppointmentBlockSlotDelete-appointment_block_slot-delete'); // delete
    $app->group(
        '/appointment_block_slot',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', AppointmentBlockSlotController::class . ':list')->add(PermissionMiddleware::class)->setName('appointment_block_slot/list-appointment_block_slot-list-2'); // list
            $group->any('/add[/{id}]', AppointmentBlockSlotController::class . ':add')->add(PermissionMiddleware::class)->setName('appointment_block_slot/add-appointment_block_slot-add-2'); // add
            $group->any('/view[/{id}]', AppointmentBlockSlotController::class . ':view')->add(PermissionMiddleware::class)->setName('appointment_block_slot/view-appointment_block_slot-view-2'); // view
            $group->any('/edit[/{id}]', AppointmentBlockSlotController::class . ':edit')->add(PermissionMiddleware::class)->setName('appointment_block_slot/edit-appointment_block_slot-edit-2'); // edit
            $group->any('/delete[/{id}]', AppointmentBlockSlotController::class . ':delete')->add(PermissionMiddleware::class)->setName('appointment_block_slot/delete-appointment_block_slot-delete-2'); // delete
        }
    );

    // appointment_patienttypee
    $app->any('/AppointmentPatienttypeeList[/{id}]', AppointmentPatienttypeeController::class . ':list')->add(PermissionMiddleware::class)->setName('AppointmentPatienttypeeList-appointment_patienttypee-list'); // list
    $app->any('/AppointmentPatienttypeeAdd[/{id}]', AppointmentPatienttypeeController::class . ':add')->add(PermissionMiddleware::class)->setName('AppointmentPatienttypeeAdd-appointment_patienttypee-add'); // add
    $app->any('/AppointmentPatienttypeeView[/{id}]', AppointmentPatienttypeeController::class . ':view')->add(PermissionMiddleware::class)->setName('AppointmentPatienttypeeView-appointment_patienttypee-view'); // view
    $app->any('/AppointmentPatienttypeeEdit[/{id}]', AppointmentPatienttypeeController::class . ':edit')->add(PermissionMiddleware::class)->setName('AppointmentPatienttypeeEdit-appointment_patienttypee-edit'); // edit
    $app->any('/AppointmentPatienttypeeDelete[/{id}]', AppointmentPatienttypeeController::class . ':delete')->add(PermissionMiddleware::class)->setName('AppointmentPatienttypeeDelete-appointment_patienttypee-delete'); // delete
    $app->group(
        '/appointment_patienttypee',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', AppointmentPatienttypeeController::class . ':list')->add(PermissionMiddleware::class)->setName('appointment_patienttypee/list-appointment_patienttypee-list-2'); // list
            $group->any('/add[/{id}]', AppointmentPatienttypeeController::class . ':add')->add(PermissionMiddleware::class)->setName('appointment_patienttypee/add-appointment_patienttypee-add-2'); // add
            $group->any('/view[/{id}]', AppointmentPatienttypeeController::class . ':view')->add(PermissionMiddleware::class)->setName('appointment_patienttypee/view-appointment_patienttypee-view-2'); // view
            $group->any('/edit[/{id}]', AppointmentPatienttypeeController::class . ':edit')->add(PermissionMiddleware::class)->setName('appointment_patienttypee/edit-appointment_patienttypee-edit-2'); // edit
            $group->any('/delete[/{id}]', AppointmentPatienttypeeController::class . ':delete')->add(PermissionMiddleware::class)->setName('appointment_patienttypee/delete-appointment_patienttypee-delete-2'); // delete
        }
    );

    // appointment_reminder
    $app->any('/AppointmentReminderList[/{id}]', AppointmentReminderController::class . ':list')->add(PermissionMiddleware::class)->setName('AppointmentReminderList-appointment_reminder-list'); // list
    $app->any('/AppointmentReminderAdd[/{id}]', AppointmentReminderController::class . ':add')->add(PermissionMiddleware::class)->setName('AppointmentReminderAdd-appointment_reminder-add'); // add
    $app->any('/AppointmentReminderView[/{id}]', AppointmentReminderController::class . ':view')->add(PermissionMiddleware::class)->setName('AppointmentReminderView-appointment_reminder-view'); // view
    $app->any('/AppointmentReminderEdit[/{id}]', AppointmentReminderController::class . ':edit')->add(PermissionMiddleware::class)->setName('AppointmentReminderEdit-appointment_reminder-edit'); // edit
    $app->any('/AppointmentReminderDelete[/{id}]', AppointmentReminderController::class . ':delete')->add(PermissionMiddleware::class)->setName('AppointmentReminderDelete-appointment_reminder-delete'); // delete
    $app->group(
        '/appointment_reminder',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', AppointmentReminderController::class . ':list')->add(PermissionMiddleware::class)->setName('appointment_reminder/list-appointment_reminder-list-2'); // list
            $group->any('/add[/{id}]', AppointmentReminderController::class . ':add')->add(PermissionMiddleware::class)->setName('appointment_reminder/add-appointment_reminder-add-2'); // add
            $group->any('/view[/{id}]', AppointmentReminderController::class . ':view')->add(PermissionMiddleware::class)->setName('appointment_reminder/view-appointment_reminder-view-2'); // view
            $group->any('/edit[/{id}]', AppointmentReminderController::class . ':edit')->add(PermissionMiddleware::class)->setName('appointment_reminder/edit-appointment_reminder-edit-2'); // edit
            $group->any('/delete[/{id}]', AppointmentReminderController::class . ':delete')->add(PermissionMiddleware::class)->setName('appointment_reminder/delete-appointment_reminder-delete-2'); // delete
        }
    );

    // appointment_scheduler
    $app->any('/AppointmentSchedulerList[/{id}]', AppointmentSchedulerController::class . ':list')->add(PermissionMiddleware::class)->setName('AppointmentSchedulerList-appointment_scheduler-list'); // list
    $app->any('/AppointmentSchedulerAdd[/{id}]', AppointmentSchedulerController::class . ':add')->add(PermissionMiddleware::class)->setName('AppointmentSchedulerAdd-appointment_scheduler-add'); // add
    $app->any('/AppointmentSchedulerView[/{id}]', AppointmentSchedulerController::class . ':view')->add(PermissionMiddleware::class)->setName('AppointmentSchedulerView-appointment_scheduler-view'); // view
    $app->any('/AppointmentSchedulerEdit[/{id}]', AppointmentSchedulerController::class . ':edit')->add(PermissionMiddleware::class)->setName('AppointmentSchedulerEdit-appointment_scheduler-edit'); // edit
    $app->any('/AppointmentSchedulerDelete[/{id}]', AppointmentSchedulerController::class . ':delete')->add(PermissionMiddleware::class)->setName('AppointmentSchedulerDelete-appointment_scheduler-delete'); // delete
    $app->group(
        '/appointment_scheduler',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', AppointmentSchedulerController::class . ':list')->add(PermissionMiddleware::class)->setName('appointment_scheduler/list-appointment_scheduler-list-2'); // list
            $group->any('/add[/{id}]', AppointmentSchedulerController::class . ':add')->add(PermissionMiddleware::class)->setName('appointment_scheduler/add-appointment_scheduler-add-2'); // add
            $group->any('/view[/{id}]', AppointmentSchedulerController::class . ':view')->add(PermissionMiddleware::class)->setName('appointment_scheduler/view-appointment_scheduler-view-2'); // view
            $group->any('/edit[/{id}]', AppointmentSchedulerController::class . ':edit')->add(PermissionMiddleware::class)->setName('appointment_scheduler/edit-appointment_scheduler-edit-2'); // edit
            $group->any('/delete[/{id}]', AppointmentSchedulerController::class . ':delete')->add(PermissionMiddleware::class)->setName('appointment_scheduler/delete-appointment_scheduler-delete-2'); // delete
        }
    );

    // audittrail
    $app->any('/AudittrailList[/{id}]', AudittrailController::class . ':list')->add(PermissionMiddleware::class)->setName('AudittrailList-audittrail-list'); // list
    $app->any('/AudittrailAdd[/{id}]', AudittrailController::class . ':add')->add(PermissionMiddleware::class)->setName('AudittrailAdd-audittrail-add'); // add
    $app->any('/AudittrailView[/{id}]', AudittrailController::class . ':view')->add(PermissionMiddleware::class)->setName('AudittrailView-audittrail-view'); // view
    $app->any('/AudittrailEdit[/{id}]', AudittrailController::class . ':edit')->add(PermissionMiddleware::class)->setName('AudittrailEdit-audittrail-edit'); // edit
    $app->any('/AudittrailDelete[/{id}]', AudittrailController::class . ':delete')->add(PermissionMiddleware::class)->setName('AudittrailDelete-audittrail-delete'); // delete
    $app->group(
        '/audittrail',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', AudittrailController::class . ':list')->add(PermissionMiddleware::class)->setName('audittrail/list-audittrail-list-2'); // list
            $group->any('/add[/{id}]', AudittrailController::class . ':add')->add(PermissionMiddleware::class)->setName('audittrail/add-audittrail-add-2'); // add
            $group->any('/view[/{id}]', AudittrailController::class . ':view')->add(PermissionMiddleware::class)->setName('audittrail/view-audittrail-view-2'); // view
            $group->any('/edit[/{id}]', AudittrailController::class . ':edit')->add(PermissionMiddleware::class)->setName('audittrail/edit-audittrail-edit-2'); // edit
            $group->any('/delete[/{id}]', AudittrailController::class . ':delete')->add(PermissionMiddleware::class)->setName('audittrail/delete-audittrail-delete-2'); // delete
        }
    );

    // bankbranches
    $app->any('/BankbranchesList[/{id}]', BankbranchesController::class . ':list')->add(PermissionMiddleware::class)->setName('BankbranchesList-bankbranches-list'); // list
    $app->any('/BankbranchesAdd[/{id}]', BankbranchesController::class . ':add')->add(PermissionMiddleware::class)->setName('BankbranchesAdd-bankbranches-add'); // add
    $app->any('/BankbranchesView[/{id}]', BankbranchesController::class . ':view')->add(PermissionMiddleware::class)->setName('BankbranchesView-bankbranches-view'); // view
    $app->any('/BankbranchesEdit[/{id}]', BankbranchesController::class . ':edit')->add(PermissionMiddleware::class)->setName('BankbranchesEdit-bankbranches-edit'); // edit
    $app->any('/BankbranchesDelete[/{id}]', BankbranchesController::class . ':delete')->add(PermissionMiddleware::class)->setName('BankbranchesDelete-bankbranches-delete'); // delete
    $app->group(
        '/bankbranches',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', BankbranchesController::class . ':list')->add(PermissionMiddleware::class)->setName('bankbranches/list-bankbranches-list-2'); // list
            $group->any('/add[/{id}]', BankbranchesController::class . ':add')->add(PermissionMiddleware::class)->setName('bankbranches/add-bankbranches-add-2'); // add
            $group->any('/view[/{id}]', BankbranchesController::class . ':view')->add(PermissionMiddleware::class)->setName('bankbranches/view-bankbranches-view-2'); // view
            $group->any('/edit[/{id}]', BankbranchesController::class . ':edit')->add(PermissionMiddleware::class)->setName('bankbranches/edit-bankbranches-edit-2'); // edit
            $group->any('/delete[/{id}]', BankbranchesController::class . ':delete')->add(PermissionMiddleware::class)->setName('bankbranches/delete-bankbranches-delete-2'); // delete
        }
    );

    // banktransferto
    $app->any('/BanktransfertoList[/{id}]', BanktransfertoController::class . ':list')->add(PermissionMiddleware::class)->setName('BanktransfertoList-banktransferto-list'); // list
    $app->any('/BanktransfertoAdd[/{id}]', BanktransfertoController::class . ':add')->add(PermissionMiddleware::class)->setName('BanktransfertoAdd-banktransferto-add'); // add
    $app->any('/BanktransfertoView[/{id}]', BanktransfertoController::class . ':view')->add(PermissionMiddleware::class)->setName('BanktransfertoView-banktransferto-view'); // view
    $app->any('/BanktransfertoEdit[/{id}]', BanktransfertoController::class . ':edit')->add(PermissionMiddleware::class)->setName('BanktransfertoEdit-banktransferto-edit'); // edit
    $app->any('/BanktransfertoDelete[/{id}]', BanktransfertoController::class . ':delete')->add(PermissionMiddleware::class)->setName('BanktransfertoDelete-banktransferto-delete'); // delete
    $app->group(
        '/banktransferto',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', BanktransfertoController::class . ':list')->add(PermissionMiddleware::class)->setName('banktransferto/list-banktransferto-list-2'); // list
            $group->any('/add[/{id}]', BanktransfertoController::class . ':add')->add(PermissionMiddleware::class)->setName('banktransferto/add-banktransferto-add-2'); // add
            $group->any('/view[/{id}]', BanktransfertoController::class . ':view')->add(PermissionMiddleware::class)->setName('banktransferto/view-banktransferto-view-2'); // view
            $group->any('/edit[/{id}]', BanktransfertoController::class . ':edit')->add(PermissionMiddleware::class)->setName('banktransferto/edit-banktransferto-edit-2'); // edit
            $group->any('/delete[/{id}]', BanktransfertoController::class . ':delete')->add(PermissionMiddleware::class)->setName('banktransferto/delete-banktransferto-delete-2'); // delete
        }
    );

    // billing_discount
    $app->any('/BillingDiscountList[/{id}]', BillingDiscountController::class . ':list')->add(PermissionMiddleware::class)->setName('BillingDiscountList-billing_discount-list'); // list
    $app->any('/BillingDiscountAdd[/{id}]', BillingDiscountController::class . ':add')->add(PermissionMiddleware::class)->setName('BillingDiscountAdd-billing_discount-add'); // add
    $app->any('/BillingDiscountView[/{id}]', BillingDiscountController::class . ':view')->add(PermissionMiddleware::class)->setName('BillingDiscountView-billing_discount-view'); // view
    $app->any('/BillingDiscountEdit[/{id}]', BillingDiscountController::class . ':edit')->add(PermissionMiddleware::class)->setName('BillingDiscountEdit-billing_discount-edit'); // edit
    $app->any('/BillingDiscountDelete[/{id}]', BillingDiscountController::class . ':delete')->add(PermissionMiddleware::class)->setName('BillingDiscountDelete-billing_discount-delete'); // delete
    $app->group(
        '/billing_discount',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', BillingDiscountController::class . ':list')->add(PermissionMiddleware::class)->setName('billing_discount/list-billing_discount-list-2'); // list
            $group->any('/add[/{id}]', BillingDiscountController::class . ':add')->add(PermissionMiddleware::class)->setName('billing_discount/add-billing_discount-add-2'); // add
            $group->any('/view[/{id}]', BillingDiscountController::class . ':view')->add(PermissionMiddleware::class)->setName('billing_discount/view-billing_discount-view-2'); // view
            $group->any('/edit[/{id}]', BillingDiscountController::class . ':edit')->add(PermissionMiddleware::class)->setName('billing_discount/edit-billing_discount-edit-2'); // edit
            $group->any('/delete[/{id}]', BillingDiscountController::class . ':delete')->add(PermissionMiddleware::class)->setName('billing_discount/delete-billing_discount-delete-2'); // delete
        }
    );

    // billing_other_voucher
    $app->any('/BillingOtherVoucherList[/{id}]', BillingOtherVoucherController::class . ':list')->add(PermissionMiddleware::class)->setName('BillingOtherVoucherList-billing_other_voucher-list'); // list
    $app->any('/BillingOtherVoucherAdd[/{id}]', BillingOtherVoucherController::class . ':add')->add(PermissionMiddleware::class)->setName('BillingOtherVoucherAdd-billing_other_voucher-add'); // add
    $app->any('/BillingOtherVoucherView[/{id}]', BillingOtherVoucherController::class . ':view')->add(PermissionMiddleware::class)->setName('BillingOtherVoucherView-billing_other_voucher-view'); // view
    $app->any('/BillingOtherVoucherEdit[/{id}]', BillingOtherVoucherController::class . ':edit')->add(PermissionMiddleware::class)->setName('BillingOtherVoucherEdit-billing_other_voucher-edit'); // edit
    $app->any('/BillingOtherVoucherDelete[/{id}]', BillingOtherVoucherController::class . ':delete')->add(PermissionMiddleware::class)->setName('BillingOtherVoucherDelete-billing_other_voucher-delete'); // delete
    $app->group(
        '/billing_other_voucher',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', BillingOtherVoucherController::class . ':list')->add(PermissionMiddleware::class)->setName('billing_other_voucher/list-billing_other_voucher-list-2'); // list
            $group->any('/add[/{id}]', BillingOtherVoucherController::class . ':add')->add(PermissionMiddleware::class)->setName('billing_other_voucher/add-billing_other_voucher-add-2'); // add
            $group->any('/view[/{id}]', BillingOtherVoucherController::class . ':view')->add(PermissionMiddleware::class)->setName('billing_other_voucher/view-billing_other_voucher-view-2'); // view
            $group->any('/edit[/{id}]', BillingOtherVoucherController::class . ':edit')->add(PermissionMiddleware::class)->setName('billing_other_voucher/edit-billing_other_voucher-edit-2'); // edit
            $group->any('/delete[/{id}]', BillingOtherVoucherController::class . ':delete')->add(PermissionMiddleware::class)->setName('billing_other_voucher/delete-billing_other_voucher-delete-2'); // delete
        }
    );

    // billing_refund_voucher
    $app->any('/BillingRefundVoucherList[/{id}]', BillingRefundVoucherController::class . ':list')->add(PermissionMiddleware::class)->setName('BillingRefundVoucherList-billing_refund_voucher-list'); // list
    $app->any('/BillingRefundVoucherAdd[/{id}]', BillingRefundVoucherController::class . ':add')->add(PermissionMiddleware::class)->setName('BillingRefundVoucherAdd-billing_refund_voucher-add'); // add
    $app->any('/BillingRefundVoucherView[/{id}]', BillingRefundVoucherController::class . ':view')->add(PermissionMiddleware::class)->setName('BillingRefundVoucherView-billing_refund_voucher-view'); // view
    $app->any('/BillingRefundVoucherEdit[/{id}]', BillingRefundVoucherController::class . ':edit')->add(PermissionMiddleware::class)->setName('BillingRefundVoucherEdit-billing_refund_voucher-edit'); // edit
    $app->any('/BillingRefundVoucherDelete[/{id}]', BillingRefundVoucherController::class . ':delete')->add(PermissionMiddleware::class)->setName('BillingRefundVoucherDelete-billing_refund_voucher-delete'); // delete
    $app->group(
        '/billing_refund_voucher',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', BillingRefundVoucherController::class . ':list')->add(PermissionMiddleware::class)->setName('billing_refund_voucher/list-billing_refund_voucher-list-2'); // list
            $group->any('/add[/{id}]', BillingRefundVoucherController::class . ':add')->add(PermissionMiddleware::class)->setName('billing_refund_voucher/add-billing_refund_voucher-add-2'); // add
            $group->any('/view[/{id}]', BillingRefundVoucherController::class . ':view')->add(PermissionMiddleware::class)->setName('billing_refund_voucher/view-billing_refund_voucher-view-2'); // view
            $group->any('/edit[/{id}]', BillingRefundVoucherController::class . ':edit')->add(PermissionMiddleware::class)->setName('billing_refund_voucher/edit-billing_refund_voucher-edit-2'); // edit
            $group->any('/delete[/{id}]', BillingRefundVoucherController::class . ':delete')->add(PermissionMiddleware::class)->setName('billing_refund_voucher/delete-billing_refund_voucher-delete-2'); // delete
        }
    );

    // billing_type
    $app->any('/BillingTypeList[/{id}]', BillingTypeController::class . ':list')->add(PermissionMiddleware::class)->setName('BillingTypeList-billing_type-list'); // list
    $app->any('/BillingTypeAdd[/{id}]', BillingTypeController::class . ':add')->add(PermissionMiddleware::class)->setName('BillingTypeAdd-billing_type-add'); // add
    $app->any('/BillingTypeView[/{id}]', BillingTypeController::class . ':view')->add(PermissionMiddleware::class)->setName('BillingTypeView-billing_type-view'); // view
    $app->any('/BillingTypeEdit[/{id}]', BillingTypeController::class . ':edit')->add(PermissionMiddleware::class)->setName('BillingTypeEdit-billing_type-edit'); // edit
    $app->any('/BillingTypeDelete[/{id}]', BillingTypeController::class . ':delete')->add(PermissionMiddleware::class)->setName('BillingTypeDelete-billing_type-delete'); // delete
    $app->group(
        '/billing_type',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', BillingTypeController::class . ':list')->add(PermissionMiddleware::class)->setName('billing_type/list-billing_type-list-2'); // list
            $group->any('/add[/{id}]', BillingTypeController::class . ':add')->add(PermissionMiddleware::class)->setName('billing_type/add-billing_type-add-2'); // add
            $group->any('/view[/{id}]', BillingTypeController::class . ':view')->add(PermissionMiddleware::class)->setName('billing_type/view-billing_type-view-2'); // view
            $group->any('/edit[/{id}]', BillingTypeController::class . ':edit')->add(PermissionMiddleware::class)->setName('billing_type/edit-billing_type-edit-2'); // edit
            $group->any('/delete[/{id}]', BillingTypeController::class . ':delete')->add(PermissionMiddleware::class)->setName('billing_type/delete-billing_type-delete-2'); // delete
        }
    );

    // billing_voucher
    $app->any('/BillingVoucherList[/{id}]', BillingVoucherController::class . ':list')->add(PermissionMiddleware::class)->setName('BillingVoucherList-billing_voucher-list'); // list
    $app->any('/BillingVoucherAdd[/{id}]', BillingVoucherController::class . ':add')->add(PermissionMiddleware::class)->setName('BillingVoucherAdd-billing_voucher-add'); // add
    $app->any('/BillingVoucherView[/{id}]', BillingVoucherController::class . ':view')->add(PermissionMiddleware::class)->setName('BillingVoucherView-billing_voucher-view'); // view
    $app->any('/BillingVoucherEdit[/{id}]', BillingVoucherController::class . ':edit')->add(PermissionMiddleware::class)->setName('BillingVoucherEdit-billing_voucher-edit'); // edit
    $app->any('/BillingVoucherDelete[/{id}]', BillingVoucherController::class . ':delete')->add(PermissionMiddleware::class)->setName('BillingVoucherDelete-billing_voucher-delete'); // delete
    $app->group(
        '/billing_voucher',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', BillingVoucherController::class . ':list')->add(PermissionMiddleware::class)->setName('billing_voucher/list-billing_voucher-list-2'); // list
            $group->any('/add[/{id}]', BillingVoucherController::class . ':add')->add(PermissionMiddleware::class)->setName('billing_voucher/add-billing_voucher-add-2'); // add
            $group->any('/view[/{id}]', BillingVoucherController::class . ':view')->add(PermissionMiddleware::class)->setName('billing_voucher/view-billing_voucher-view-2'); // view
            $group->any('/edit[/{id}]', BillingVoucherController::class . ':edit')->add(PermissionMiddleware::class)->setName('billing_voucher/edit-billing_voucher-edit-2'); // edit
            $group->any('/delete[/{id}]', BillingVoucherController::class . ':delete')->add(PermissionMiddleware::class)->setName('billing_voucher/delete-billing_voucher-delete-2'); // delete
        }
    );

    // deposit_account_head
    $app->any('/DepositAccountHeadList[/{id}]', DepositAccountHeadController::class . ':list')->add(PermissionMiddleware::class)->setName('DepositAccountHeadList-deposit_account_head-list'); // list
    $app->any('/DepositAccountHeadAdd[/{id}]', DepositAccountHeadController::class . ':add')->add(PermissionMiddleware::class)->setName('DepositAccountHeadAdd-deposit_account_head-add'); // add
    $app->any('/DepositAccountHeadView[/{id}]', DepositAccountHeadController::class . ':view')->add(PermissionMiddleware::class)->setName('DepositAccountHeadView-deposit_account_head-view'); // view
    $app->any('/DepositAccountHeadEdit[/{id}]', DepositAccountHeadController::class . ':edit')->add(PermissionMiddleware::class)->setName('DepositAccountHeadEdit-deposit_account_head-edit'); // edit
    $app->any('/DepositAccountHeadDelete[/{id}]', DepositAccountHeadController::class . ':delete')->add(PermissionMiddleware::class)->setName('DepositAccountHeadDelete-deposit_account_head-delete'); // delete
    $app->group(
        '/deposit_account_head',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', DepositAccountHeadController::class . ':list')->add(PermissionMiddleware::class)->setName('deposit_account_head/list-deposit_account_head-list-2'); // list
            $group->any('/add[/{id}]', DepositAccountHeadController::class . ':add')->add(PermissionMiddleware::class)->setName('deposit_account_head/add-deposit_account_head-add-2'); // add
            $group->any('/view[/{id}]', DepositAccountHeadController::class . ':view')->add(PermissionMiddleware::class)->setName('deposit_account_head/view-deposit_account_head-view-2'); // view
            $group->any('/edit[/{id}]', DepositAccountHeadController::class . ':edit')->add(PermissionMiddleware::class)->setName('deposit_account_head/edit-deposit_account_head-edit-2'); // edit
            $group->any('/delete[/{id}]', DepositAccountHeadController::class . ':delete')->add(PermissionMiddleware::class)->setName('deposit_account_head/delete-deposit_account_head-delete-2'); // delete
        }
    );

    // deposit_pettycash
    $app->any('/DepositPettycashList[/{id}]', DepositPettycashController::class . ':list')->add(PermissionMiddleware::class)->setName('DepositPettycashList-deposit_pettycash-list'); // list
    $app->any('/DepositPettycashAdd[/{id}]', DepositPettycashController::class . ':add')->add(PermissionMiddleware::class)->setName('DepositPettycashAdd-deposit_pettycash-add'); // add
    $app->any('/DepositPettycashView[/{id}]', DepositPettycashController::class . ':view')->add(PermissionMiddleware::class)->setName('DepositPettycashView-deposit_pettycash-view'); // view
    $app->any('/DepositPettycashEdit[/{id}]', DepositPettycashController::class . ':edit')->add(PermissionMiddleware::class)->setName('DepositPettycashEdit-deposit_pettycash-edit'); // edit
    $app->any('/DepositPettycashDelete[/{id}]', DepositPettycashController::class . ':delete')->add(PermissionMiddleware::class)->setName('DepositPettycashDelete-deposit_pettycash-delete'); // delete
    $app->group(
        '/deposit_pettycash',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', DepositPettycashController::class . ':list')->add(PermissionMiddleware::class)->setName('deposit_pettycash/list-deposit_pettycash-list-2'); // list
            $group->any('/add[/{id}]', DepositPettycashController::class . ':add')->add(PermissionMiddleware::class)->setName('deposit_pettycash/add-deposit_pettycash-add-2'); // add
            $group->any('/view[/{id}]', DepositPettycashController::class . ':view')->add(PermissionMiddleware::class)->setName('deposit_pettycash/view-deposit_pettycash-view-2'); // view
            $group->any('/edit[/{id}]', DepositPettycashController::class . ':edit')->add(PermissionMiddleware::class)->setName('deposit_pettycash/edit-deposit_pettycash-edit-2'); // edit
            $group->any('/delete[/{id}]', DepositPettycashController::class . ':delete')->add(PermissionMiddleware::class)->setName('deposit_pettycash/delete-deposit_pettycash-delete-2'); // delete
        }
    );

    // depositdetails
    $app->any('/DepositdetailsList[/{id}]', DepositdetailsController::class . ':list')->add(PermissionMiddleware::class)->setName('DepositdetailsList-depositdetails-list'); // list
    $app->any('/DepositdetailsAdd[/{id}]', DepositdetailsController::class . ':add')->add(PermissionMiddleware::class)->setName('DepositdetailsAdd-depositdetails-add'); // add
    $app->any('/DepositdetailsView[/{id}]', DepositdetailsController::class . ':view')->add(PermissionMiddleware::class)->setName('DepositdetailsView-depositdetails-view'); // view
    $app->any('/DepositdetailsEdit[/{id}]', DepositdetailsController::class . ':edit')->add(PermissionMiddleware::class)->setName('DepositdetailsEdit-depositdetails-edit'); // edit
    $app->any('/DepositdetailsDelete[/{id}]', DepositdetailsController::class . ':delete')->add(PermissionMiddleware::class)->setName('DepositdetailsDelete-depositdetails-delete'); // delete
    $app->group(
        '/depositdetails',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', DepositdetailsController::class . ':list')->add(PermissionMiddleware::class)->setName('depositdetails/list-depositdetails-list-2'); // list
            $group->any('/add[/{id}]', DepositdetailsController::class . ':add')->add(PermissionMiddleware::class)->setName('depositdetails/add-depositdetails-add-2'); // add
            $group->any('/view[/{id}]', DepositdetailsController::class . ':view')->add(PermissionMiddleware::class)->setName('depositdetails/view-depositdetails-view-2'); // view
            $group->any('/edit[/{id}]', DepositdetailsController::class . ':edit')->add(PermissionMiddleware::class)->setName('depositdetails/edit-depositdetails-edit-2'); // edit
            $group->any('/delete[/{id}]', DepositdetailsController::class . ':delete')->add(PermissionMiddleware::class)->setName('depositdetails/delete-depositdetails-delete-2'); // delete
        }
    );

    // doctors
    $app->any('/DoctorsList[/{id}]', DoctorsController::class . ':list')->add(PermissionMiddleware::class)->setName('DoctorsList-doctors-list'); // list
    $app->any('/DoctorsAdd[/{id}]', DoctorsController::class . ':add')->add(PermissionMiddleware::class)->setName('DoctorsAdd-doctors-add'); // add
    $app->any('/DoctorsView[/{id}]', DoctorsController::class . ':view')->add(PermissionMiddleware::class)->setName('DoctorsView-doctors-view'); // view
    $app->any('/DoctorsEdit[/{id}]', DoctorsController::class . ':edit')->add(PermissionMiddleware::class)->setName('DoctorsEdit-doctors-edit'); // edit
    $app->any('/DoctorsDelete[/{id}]', DoctorsController::class . ':delete')->add(PermissionMiddleware::class)->setName('DoctorsDelete-doctors-delete'); // delete
    $app->group(
        '/doctors',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', DoctorsController::class . ':list')->add(PermissionMiddleware::class)->setName('doctors/list-doctors-list-2'); // list
            $group->any('/add[/{id}]', DoctorsController::class . ':add')->add(PermissionMiddleware::class)->setName('doctors/add-doctors-add-2'); // add
            $group->any('/view[/{id}]', DoctorsController::class . ':view')->add(PermissionMiddleware::class)->setName('doctors/view-doctors-view-2'); // view
            $group->any('/edit[/{id}]', DoctorsController::class . ':edit')->add(PermissionMiddleware::class)->setName('doctors/edit-doctors-edit-2'); // edit
            $group->any('/delete[/{id}]', DoctorsController::class . ':delete')->add(PermissionMiddleware::class)->setName('doctors/delete-doctors-delete-2'); // delete
        }
    );

    // employee
    $app->any('/EmployeeList[/{id}]', EmployeeController::class . ':list')->add(PermissionMiddleware::class)->setName('EmployeeList-employee-list'); // list
    $app->any('/EmployeeAdd[/{id}]', EmployeeController::class . ':add')->add(PermissionMiddleware::class)->setName('EmployeeAdd-employee-add'); // add
    $app->any('/EmployeeView[/{id}]', EmployeeController::class . ':view')->add(PermissionMiddleware::class)->setName('EmployeeView-employee-view'); // view
    $app->any('/EmployeeEdit[/{id}]', EmployeeController::class . ':edit')->add(PermissionMiddleware::class)->setName('EmployeeEdit-employee-edit'); // edit
    $app->any('/EmployeeDelete[/{id}]', EmployeeController::class . ':delete')->add(PermissionMiddleware::class)->setName('EmployeeDelete-employee-delete'); // delete
    $app->group(
        '/employee',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', EmployeeController::class . ':list')->add(PermissionMiddleware::class)->setName('employee/list-employee-list-2'); // list
            $group->any('/add[/{id}]', EmployeeController::class . ':add')->add(PermissionMiddleware::class)->setName('employee/add-employee-add-2'); // add
            $group->any('/view[/{id}]', EmployeeController::class . ':view')->add(PermissionMiddleware::class)->setName('employee/view-employee-view-2'); // view
            $group->any('/edit[/{id}]', EmployeeController::class . ':edit')->add(PermissionMiddleware::class)->setName('employee/edit-employee-edit-2'); // edit
            $group->any('/delete[/{id}]', EmployeeController::class . ':delete')->add(PermissionMiddleware::class)->setName('employee/delete-employee-delete-2'); // delete
        }
    );

    // employee_address
    $app->any('/EmployeeAddressList[/{id}]', EmployeeAddressController::class . ':list')->add(PermissionMiddleware::class)->setName('EmployeeAddressList-employee_address-list'); // list
    $app->any('/EmployeeAddressAdd[/{id}]', EmployeeAddressController::class . ':add')->add(PermissionMiddleware::class)->setName('EmployeeAddressAdd-employee_address-add'); // add
    $app->any('/EmployeeAddressView[/{id}]', EmployeeAddressController::class . ':view')->add(PermissionMiddleware::class)->setName('EmployeeAddressView-employee_address-view'); // view
    $app->any('/EmployeeAddressEdit[/{id}]', EmployeeAddressController::class . ':edit')->add(PermissionMiddleware::class)->setName('EmployeeAddressEdit-employee_address-edit'); // edit
    $app->any('/EmployeeAddressDelete[/{id}]', EmployeeAddressController::class . ':delete')->add(PermissionMiddleware::class)->setName('EmployeeAddressDelete-employee_address-delete'); // delete
    $app->group(
        '/employee_address',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', EmployeeAddressController::class . ':list')->add(PermissionMiddleware::class)->setName('employee_address/list-employee_address-list-2'); // list
            $group->any('/add[/{id}]', EmployeeAddressController::class . ':add')->add(PermissionMiddleware::class)->setName('employee_address/add-employee_address-add-2'); // add
            $group->any('/view[/{id}]', EmployeeAddressController::class . ':view')->add(PermissionMiddleware::class)->setName('employee_address/view-employee_address-view-2'); // view
            $group->any('/edit[/{id}]', EmployeeAddressController::class . ':edit')->add(PermissionMiddleware::class)->setName('employee_address/edit-employee_address-edit-2'); // edit
            $group->any('/delete[/{id}]', EmployeeAddressController::class . ':delete')->add(PermissionMiddleware::class)->setName('employee_address/delete-employee_address-delete-2'); // delete
        }
    );

    // employee_document
    $app->any('/EmployeeDocumentList[/{id}]', EmployeeDocumentController::class . ':list')->add(PermissionMiddleware::class)->setName('EmployeeDocumentList-employee_document-list'); // list
    $app->any('/EmployeeDocumentAdd[/{id}]', EmployeeDocumentController::class . ':add')->add(PermissionMiddleware::class)->setName('EmployeeDocumentAdd-employee_document-add'); // add
    $app->any('/EmployeeDocumentView[/{id}]', EmployeeDocumentController::class . ':view')->add(PermissionMiddleware::class)->setName('EmployeeDocumentView-employee_document-view'); // view
    $app->any('/EmployeeDocumentEdit[/{id}]', EmployeeDocumentController::class . ':edit')->add(PermissionMiddleware::class)->setName('EmployeeDocumentEdit-employee_document-edit'); // edit
    $app->any('/EmployeeDocumentDelete[/{id}]', EmployeeDocumentController::class . ':delete')->add(PermissionMiddleware::class)->setName('EmployeeDocumentDelete-employee_document-delete'); // delete
    $app->group(
        '/employee_document',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', EmployeeDocumentController::class . ':list')->add(PermissionMiddleware::class)->setName('employee_document/list-employee_document-list-2'); // list
            $group->any('/add[/{id}]', EmployeeDocumentController::class . ':add')->add(PermissionMiddleware::class)->setName('employee_document/add-employee_document-add-2'); // add
            $group->any('/view[/{id}]', EmployeeDocumentController::class . ':view')->add(PermissionMiddleware::class)->setName('employee_document/view-employee_document-view-2'); // view
            $group->any('/edit[/{id}]', EmployeeDocumentController::class . ':edit')->add(PermissionMiddleware::class)->setName('employee_document/edit-employee_document-edit-2'); // edit
            $group->any('/delete[/{id}]', EmployeeDocumentController::class . ':delete')->add(PermissionMiddleware::class)->setName('employee_document/delete-employee_document-delete-2'); // delete
        }
    );

    // employee_email
    $app->any('/EmployeeEmailList[/{id}]', EmployeeEmailController::class . ':list')->add(PermissionMiddleware::class)->setName('EmployeeEmailList-employee_email-list'); // list
    $app->any('/EmployeeEmailAdd[/{id}]', EmployeeEmailController::class . ':add')->add(PermissionMiddleware::class)->setName('EmployeeEmailAdd-employee_email-add'); // add
    $app->any('/EmployeeEmailView[/{id}]', EmployeeEmailController::class . ':view')->add(PermissionMiddleware::class)->setName('EmployeeEmailView-employee_email-view'); // view
    $app->any('/EmployeeEmailEdit[/{id}]', EmployeeEmailController::class . ':edit')->add(PermissionMiddleware::class)->setName('EmployeeEmailEdit-employee_email-edit'); // edit
    $app->any('/EmployeeEmailDelete[/{id}]', EmployeeEmailController::class . ':delete')->add(PermissionMiddleware::class)->setName('EmployeeEmailDelete-employee_email-delete'); // delete
    $app->group(
        '/employee_email',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', EmployeeEmailController::class . ':list')->add(PermissionMiddleware::class)->setName('employee_email/list-employee_email-list-2'); // list
            $group->any('/add[/{id}]', EmployeeEmailController::class . ':add')->add(PermissionMiddleware::class)->setName('employee_email/add-employee_email-add-2'); // add
            $group->any('/view[/{id}]', EmployeeEmailController::class . ':view')->add(PermissionMiddleware::class)->setName('employee_email/view-employee_email-view-2'); // view
            $group->any('/edit[/{id}]', EmployeeEmailController::class . ':edit')->add(PermissionMiddleware::class)->setName('employee_email/edit-employee_email-edit-2'); // edit
            $group->any('/delete[/{id}]', EmployeeEmailController::class . ':delete')->add(PermissionMiddleware::class)->setName('employee_email/delete-employee_email-delete-2'); // delete
        }
    );

    // employee_has_degree
    $app->any('/EmployeeHasDegreeList[/{id}]', EmployeeHasDegreeController::class . ':list')->add(PermissionMiddleware::class)->setName('EmployeeHasDegreeList-employee_has_degree-list'); // list
    $app->any('/EmployeeHasDegreeAdd[/{id}]', EmployeeHasDegreeController::class . ':add')->add(PermissionMiddleware::class)->setName('EmployeeHasDegreeAdd-employee_has_degree-add'); // add
    $app->any('/EmployeeHasDegreeView[/{id}]', EmployeeHasDegreeController::class . ':view')->add(PermissionMiddleware::class)->setName('EmployeeHasDegreeView-employee_has_degree-view'); // view
    $app->any('/EmployeeHasDegreeEdit[/{id}]', EmployeeHasDegreeController::class . ':edit')->add(PermissionMiddleware::class)->setName('EmployeeHasDegreeEdit-employee_has_degree-edit'); // edit
    $app->any('/EmployeeHasDegreeDelete[/{id}]', EmployeeHasDegreeController::class . ':delete')->add(PermissionMiddleware::class)->setName('EmployeeHasDegreeDelete-employee_has_degree-delete'); // delete
    $app->group(
        '/employee_has_degree',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', EmployeeHasDegreeController::class . ':list')->add(PermissionMiddleware::class)->setName('employee_has_degree/list-employee_has_degree-list-2'); // list
            $group->any('/add[/{id}]', EmployeeHasDegreeController::class . ':add')->add(PermissionMiddleware::class)->setName('employee_has_degree/add-employee_has_degree-add-2'); // add
            $group->any('/view[/{id}]', EmployeeHasDegreeController::class . ':view')->add(PermissionMiddleware::class)->setName('employee_has_degree/view-employee_has_degree-view-2'); // view
            $group->any('/edit[/{id}]', EmployeeHasDegreeController::class . ':edit')->add(PermissionMiddleware::class)->setName('employee_has_degree/edit-employee_has_degree-edit-2'); // edit
            $group->any('/delete[/{id}]', EmployeeHasDegreeController::class . ':delete')->add(PermissionMiddleware::class)->setName('employee_has_degree/delete-employee_has_degree-delete-2'); // delete
        }
    );

    // employee_has_experience
    $app->any('/EmployeeHasExperienceList[/{id}]', EmployeeHasExperienceController::class . ':list')->add(PermissionMiddleware::class)->setName('EmployeeHasExperienceList-employee_has_experience-list'); // list
    $app->any('/EmployeeHasExperienceAdd[/{id}]', EmployeeHasExperienceController::class . ':add')->add(PermissionMiddleware::class)->setName('EmployeeHasExperienceAdd-employee_has_experience-add'); // add
    $app->any('/EmployeeHasExperienceView[/{id}]', EmployeeHasExperienceController::class . ':view')->add(PermissionMiddleware::class)->setName('EmployeeHasExperienceView-employee_has_experience-view'); // view
    $app->any('/EmployeeHasExperienceEdit[/{id}]', EmployeeHasExperienceController::class . ':edit')->add(PermissionMiddleware::class)->setName('EmployeeHasExperienceEdit-employee_has_experience-edit'); // edit
    $app->any('/EmployeeHasExperienceDelete[/{id}]', EmployeeHasExperienceController::class . ':delete')->add(PermissionMiddleware::class)->setName('EmployeeHasExperienceDelete-employee_has_experience-delete'); // delete
    $app->group(
        '/employee_has_experience',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', EmployeeHasExperienceController::class . ':list')->add(PermissionMiddleware::class)->setName('employee_has_experience/list-employee_has_experience-list-2'); // list
            $group->any('/add[/{id}]', EmployeeHasExperienceController::class . ':add')->add(PermissionMiddleware::class)->setName('employee_has_experience/add-employee_has_experience-add-2'); // add
            $group->any('/view[/{id}]', EmployeeHasExperienceController::class . ':view')->add(PermissionMiddleware::class)->setName('employee_has_experience/view-employee_has_experience-view-2'); // view
            $group->any('/edit[/{id}]', EmployeeHasExperienceController::class . ':edit')->add(PermissionMiddleware::class)->setName('employee_has_experience/edit-employee_has_experience-edit-2'); // edit
            $group->any('/delete[/{id}]', EmployeeHasExperienceController::class . ':delete')->add(PermissionMiddleware::class)->setName('employee_has_experience/delete-employee_has_experience-delete-2'); // delete
        }
    );

    // employee_role_job_description
    $app->any('/EmployeeRoleJobDescriptionList[/{id}]', EmployeeRoleJobDescriptionController::class . ':list')->add(PermissionMiddleware::class)->setName('EmployeeRoleJobDescriptionList-employee_role_job_description-list'); // list
    $app->any('/EmployeeRoleJobDescriptionAdd[/{id}]', EmployeeRoleJobDescriptionController::class . ':add')->add(PermissionMiddleware::class)->setName('EmployeeRoleJobDescriptionAdd-employee_role_job_description-add'); // add
    $app->any('/EmployeeRoleJobDescriptionView[/{id}]', EmployeeRoleJobDescriptionController::class . ':view')->add(PermissionMiddleware::class)->setName('EmployeeRoleJobDescriptionView-employee_role_job_description-view'); // view
    $app->any('/EmployeeRoleJobDescriptionEdit[/{id}]', EmployeeRoleJobDescriptionController::class . ':edit')->add(PermissionMiddleware::class)->setName('EmployeeRoleJobDescriptionEdit-employee_role_job_description-edit'); // edit
    $app->any('/EmployeeRoleJobDescriptionDelete[/{id}]', EmployeeRoleJobDescriptionController::class . ':delete')->add(PermissionMiddleware::class)->setName('EmployeeRoleJobDescriptionDelete-employee_role_job_description-delete'); // delete
    $app->group(
        '/employee_role_job_description',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', EmployeeRoleJobDescriptionController::class . ':list')->add(PermissionMiddleware::class)->setName('employee_role_job_description/list-employee_role_job_description-list-2'); // list
            $group->any('/add[/{id}]', EmployeeRoleJobDescriptionController::class . ':add')->add(PermissionMiddleware::class)->setName('employee_role_job_description/add-employee_role_job_description-add-2'); // add
            $group->any('/view[/{id}]', EmployeeRoleJobDescriptionController::class . ':view')->add(PermissionMiddleware::class)->setName('employee_role_job_description/view-employee_role_job_description-view-2'); // view
            $group->any('/edit[/{id}]', EmployeeRoleJobDescriptionController::class . ':edit')->add(PermissionMiddleware::class)->setName('employee_role_job_description/edit-employee_role_job_description-edit-2'); // edit
            $group->any('/delete[/{id}]', EmployeeRoleJobDescriptionController::class . ':delete')->add(PermissionMiddleware::class)->setName('employee_role_job_description/delete-employee_role_job_description-delete-2'); // delete
        }
    );

    // employee_telephone
    $app->any('/EmployeeTelephoneList[/{id}]', EmployeeTelephoneController::class . ':list')->add(PermissionMiddleware::class)->setName('EmployeeTelephoneList-employee_telephone-list'); // list
    $app->any('/EmployeeTelephoneAdd[/{id}]', EmployeeTelephoneController::class . ':add')->add(PermissionMiddleware::class)->setName('EmployeeTelephoneAdd-employee_telephone-add'); // add
    $app->any('/EmployeeTelephoneView[/{id}]', EmployeeTelephoneController::class . ':view')->add(PermissionMiddleware::class)->setName('EmployeeTelephoneView-employee_telephone-view'); // view
    $app->any('/EmployeeTelephoneEdit[/{id}]', EmployeeTelephoneController::class . ':edit')->add(PermissionMiddleware::class)->setName('EmployeeTelephoneEdit-employee_telephone-edit'); // edit
    $app->any('/EmployeeTelephoneDelete[/{id}]', EmployeeTelephoneController::class . ':delete')->add(PermissionMiddleware::class)->setName('EmployeeTelephoneDelete-employee_telephone-delete'); // delete
    $app->group(
        '/employee_telephone',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', EmployeeTelephoneController::class . ':list')->add(PermissionMiddleware::class)->setName('employee_telephone/list-employee_telephone-list-2'); // list
            $group->any('/add[/{id}]', EmployeeTelephoneController::class . ':add')->add(PermissionMiddleware::class)->setName('employee_telephone/add-employee_telephone-add-2'); // add
            $group->any('/view[/{id}]', EmployeeTelephoneController::class . ':view')->add(PermissionMiddleware::class)->setName('employee_telephone/view-employee_telephone-view-2'); // view
            $group->any('/edit[/{id}]', EmployeeTelephoneController::class . ':edit')->add(PermissionMiddleware::class)->setName('employee_telephone/edit-employee_telephone-edit-2'); // edit
            $group->any('/delete[/{id}]', EmployeeTelephoneController::class . ':delete')->add(PermissionMiddleware::class)->setName('employee_telephone/delete-employee_telephone-delete-2'); // delete
        }
    );

    // help
    $app->any('/HelpList[/{id}]', HelpController::class . ':list')->add(PermissionMiddleware::class)->setName('HelpList-help-list'); // list
    $app->any('/HelpAdd[/{id}]', HelpController::class . ':add')->add(PermissionMiddleware::class)->setName('HelpAdd-help-add'); // add
    $app->any('/HelpView[/{id}]', HelpController::class . ':view')->add(PermissionMiddleware::class)->setName('HelpView-help-view'); // view
    $app->any('/HelpEdit[/{id}]', HelpController::class . ':edit')->add(PermissionMiddleware::class)->setName('HelpEdit-help-edit'); // edit
    $app->any('/HelpDelete[/{id}]', HelpController::class . ':delete')->add(PermissionMiddleware::class)->setName('HelpDelete-help-delete'); // delete
    $app->group(
        '/help',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', HelpController::class . ':list')->add(PermissionMiddleware::class)->setName('help/list-help-list-2'); // list
            $group->any('/add[/{id}]', HelpController::class . ':add')->add(PermissionMiddleware::class)->setName('help/add-help-add-2'); // add
            $group->any('/view[/{id}]', HelpController::class . ':view')->add(PermissionMiddleware::class)->setName('help/view-help-view-2'); // view
            $group->any('/edit[/{id}]', HelpController::class . ':edit')->add(PermissionMiddleware::class)->setName('help/edit-help-edit-2'); // edit
            $group->any('/delete[/{id}]', HelpController::class . ':delete')->add(PermissionMiddleware::class)->setName('help/delete-help-delete-2'); // delete
        }
    );

    // hospital
    $app->any('/HospitalList[/{id}]', HospitalController::class . ':list')->add(PermissionMiddleware::class)->setName('HospitalList-hospital-list'); // list
    $app->any('/HospitalAdd[/{id}]', HospitalController::class . ':add')->add(PermissionMiddleware::class)->setName('HospitalAdd-hospital-add'); // add
    $app->any('/HospitalView[/{id}]', HospitalController::class . ':view')->add(PermissionMiddleware::class)->setName('HospitalView-hospital-view'); // view
    $app->any('/HospitalEdit[/{id}]', HospitalController::class . ':edit')->add(PermissionMiddleware::class)->setName('HospitalEdit-hospital-edit'); // edit
    $app->any('/HospitalDelete[/{id}]', HospitalController::class . ':delete')->add(PermissionMiddleware::class)->setName('HospitalDelete-hospital-delete'); // delete
    $app->group(
        '/hospital',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', HospitalController::class . ':list')->add(PermissionMiddleware::class)->setName('hospital/list-hospital-list-2'); // list
            $group->any('/add[/{id}]', HospitalController::class . ':add')->add(PermissionMiddleware::class)->setName('hospital/add-hospital-add-2'); // add
            $group->any('/view[/{id}]', HospitalController::class . ':view')->add(PermissionMiddleware::class)->setName('hospital/view-hospital-view-2'); // view
            $group->any('/edit[/{id}]', HospitalController::class . ':edit')->add(PermissionMiddleware::class)->setName('hospital/edit-hospital-edit-2'); // edit
            $group->any('/delete[/{id}]', HospitalController::class . ':delete')->add(PermissionMiddleware::class)->setName('hospital/delete-hospital-delete-2'); // delete
        }
    );

    // hospital_pharmacy
    $app->any('/HospitalPharmacyList[/{id}]', HospitalPharmacyController::class . ':list')->add(PermissionMiddleware::class)->setName('HospitalPharmacyList-hospital_pharmacy-list'); // list
    $app->any('/HospitalPharmacyAdd[/{id}]', HospitalPharmacyController::class . ':add')->add(PermissionMiddleware::class)->setName('HospitalPharmacyAdd-hospital_pharmacy-add'); // add
    $app->any('/HospitalPharmacyView[/{id}]', HospitalPharmacyController::class . ':view')->add(PermissionMiddleware::class)->setName('HospitalPharmacyView-hospital_pharmacy-view'); // view
    $app->any('/HospitalPharmacyEdit[/{id}]', HospitalPharmacyController::class . ':edit')->add(PermissionMiddleware::class)->setName('HospitalPharmacyEdit-hospital_pharmacy-edit'); // edit
    $app->any('/HospitalPharmacyDelete[/{id}]', HospitalPharmacyController::class . ':delete')->add(PermissionMiddleware::class)->setName('HospitalPharmacyDelete-hospital_pharmacy-delete'); // delete
    $app->group(
        '/hospital_pharmacy',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', HospitalPharmacyController::class . ':list')->add(PermissionMiddleware::class)->setName('hospital_pharmacy/list-hospital_pharmacy-list-2'); // list
            $group->any('/add[/{id}]', HospitalPharmacyController::class . ':add')->add(PermissionMiddleware::class)->setName('hospital_pharmacy/add-hospital_pharmacy-add-2'); // add
            $group->any('/view[/{id}]', HospitalPharmacyController::class . ':view')->add(PermissionMiddleware::class)->setName('hospital_pharmacy/view-hospital_pharmacy-view-2'); // view
            $group->any('/edit[/{id}]', HospitalPharmacyController::class . ':edit')->add(PermissionMiddleware::class)->setName('hospital_pharmacy/edit-hospital_pharmacy-edit-2'); // edit
            $group->any('/delete[/{id}]', HospitalPharmacyController::class . ':delete')->add(PermissionMiddleware::class)->setName('hospital_pharmacy/delete-hospital_pharmacy-delete-2'); // delete
        }
    );

    // hospital_store
    $app->any('/HospitalStoreList[/{id}]', HospitalStoreController::class . ':list')->add(PermissionMiddleware::class)->setName('HospitalStoreList-hospital_store-list'); // list
    $app->any('/HospitalStoreAdd[/{id}]', HospitalStoreController::class . ':add')->add(PermissionMiddleware::class)->setName('HospitalStoreAdd-hospital_store-add'); // add
    $app->any('/HospitalStoreView[/{id}]', HospitalStoreController::class . ':view')->add(PermissionMiddleware::class)->setName('HospitalStoreView-hospital_store-view'); // view
    $app->any('/HospitalStoreEdit[/{id}]', HospitalStoreController::class . ':edit')->add(PermissionMiddleware::class)->setName('HospitalStoreEdit-hospital_store-edit'); // edit
    $app->any('/HospitalStoreDelete[/{id}]', HospitalStoreController::class . ':delete')->add(PermissionMiddleware::class)->setName('HospitalStoreDelete-hospital_store-delete'); // delete
    $app->group(
        '/hospital_store',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', HospitalStoreController::class . ':list')->add(PermissionMiddleware::class)->setName('hospital_store/list-hospital_store-list-2'); // list
            $group->any('/add[/{id}]', HospitalStoreController::class . ':add')->add(PermissionMiddleware::class)->setName('hospital_store/add-hospital_store-add-2'); // add
            $group->any('/view[/{id}]', HospitalStoreController::class . ':view')->add(PermissionMiddleware::class)->setName('hospital_store/view-hospital_store-view-2'); // view
            $group->any('/edit[/{id}]', HospitalStoreController::class . ':edit')->add(PermissionMiddleware::class)->setName('hospital_store/edit-hospital_store-edit-2'); // edit
            $group->any('/delete[/{id}]', HospitalStoreController::class . ':delete')->add(PermissionMiddleware::class)->setName('hospital_store/delete-hospital_store-delete-2'); // delete
        }
    );

    // ip_admission
    $app->any('/IpAdmissionList[/{id}]', IpAdmissionController::class . ':list')->add(PermissionMiddleware::class)->setName('IpAdmissionList-ip_admission-list'); // list
    $app->any('/IpAdmissionAdd[/{id}]', IpAdmissionController::class . ':add')->add(PermissionMiddleware::class)->setName('IpAdmissionAdd-ip_admission-add'); // add
    $app->any('/IpAdmissionView[/{id}]', IpAdmissionController::class . ':view')->add(PermissionMiddleware::class)->setName('IpAdmissionView-ip_admission-view'); // view
    $app->any('/IpAdmissionEdit[/{id}]', IpAdmissionController::class . ':edit')->add(PermissionMiddleware::class)->setName('IpAdmissionEdit-ip_admission-edit'); // edit
    $app->any('/IpAdmissionDelete[/{id}]', IpAdmissionController::class . ':delete')->add(PermissionMiddleware::class)->setName('IpAdmissionDelete-ip_admission-delete'); // delete
    $app->group(
        '/ip_admission',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', IpAdmissionController::class . ':list')->add(PermissionMiddleware::class)->setName('ip_admission/list-ip_admission-list-2'); // list
            $group->any('/add[/{id}]', IpAdmissionController::class . ':add')->add(PermissionMiddleware::class)->setName('ip_admission/add-ip_admission-add-2'); // add
            $group->any('/view[/{id}]', IpAdmissionController::class . ':view')->add(PermissionMiddleware::class)->setName('ip_admission/view-ip_admission-view-2'); // view
            $group->any('/edit[/{id}]', IpAdmissionController::class . ':edit')->add(PermissionMiddleware::class)->setName('ip_admission/edit-ip_admission-edit-2'); // edit
            $group->any('/delete[/{id}]', IpAdmissionController::class . ':delete')->add(PermissionMiddleware::class)->setName('ip_admission/delete-ip_admission-delete-2'); // delete
        }
    );

    // ivf
    $app->any('/IvfList[/{id}]', IvfController::class . ':list')->add(PermissionMiddleware::class)->setName('IvfList-ivf-list'); // list
    $app->any('/IvfAdd[/{id}]', IvfController::class . ':add')->add(PermissionMiddleware::class)->setName('IvfAdd-ivf-add'); // add
    $app->any('/IvfView[/{id}]', IvfController::class . ':view')->add(PermissionMiddleware::class)->setName('IvfView-ivf-view'); // view
    $app->any('/IvfEdit[/{id}]', IvfController::class . ':edit')->add(PermissionMiddleware::class)->setName('IvfEdit-ivf-edit'); // edit
    $app->any('/IvfDelete[/{id}]', IvfController::class . ':delete')->add(PermissionMiddleware::class)->setName('IvfDelete-ivf-delete'); // delete
    $app->group(
        '/ivf',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', IvfController::class . ':list')->add(PermissionMiddleware::class)->setName('ivf/list-ivf-list-2'); // list
            $group->any('/add[/{id}]', IvfController::class . ':add')->add(PermissionMiddleware::class)->setName('ivf/add-ivf-add-2'); // add
            $group->any('/view[/{id}]', IvfController::class . ':view')->add(PermissionMiddleware::class)->setName('ivf/view-ivf-view-2'); // view
            $group->any('/edit[/{id}]', IvfController::class . ':edit')->add(PermissionMiddleware::class)->setName('ivf/edit-ivf-edit-2'); // edit
            $group->any('/delete[/{id}]', IvfController::class . ':delete')->add(PermissionMiddleware::class)->setName('ivf/delete-ivf-delete-2'); // delete
        }
    );

    // ivf_agency
    $app->any('/IvfAgencyList[/{id}]', IvfAgencyController::class . ':list')->add(PermissionMiddleware::class)->setName('IvfAgencyList-ivf_agency-list'); // list
    $app->any('/IvfAgencyAdd[/{id}]', IvfAgencyController::class . ':add')->add(PermissionMiddleware::class)->setName('IvfAgencyAdd-ivf_agency-add'); // add
    $app->any('/IvfAgencyView[/{id}]', IvfAgencyController::class . ':view')->add(PermissionMiddleware::class)->setName('IvfAgencyView-ivf_agency-view'); // view
    $app->any('/IvfAgencyEdit[/{id}]', IvfAgencyController::class . ':edit')->add(PermissionMiddleware::class)->setName('IvfAgencyEdit-ivf_agency-edit'); // edit
    $app->any('/IvfAgencyDelete[/{id}]', IvfAgencyController::class . ':delete')->add(PermissionMiddleware::class)->setName('IvfAgencyDelete-ivf_agency-delete'); // delete
    $app->group(
        '/ivf_agency',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', IvfAgencyController::class . ':list')->add(PermissionMiddleware::class)->setName('ivf_agency/list-ivf_agency-list-2'); // list
            $group->any('/add[/{id}]', IvfAgencyController::class . ':add')->add(PermissionMiddleware::class)->setName('ivf_agency/add-ivf_agency-add-2'); // add
            $group->any('/view[/{id}]', IvfAgencyController::class . ':view')->add(PermissionMiddleware::class)->setName('ivf_agency/view-ivf_agency-view-2'); // view
            $group->any('/edit[/{id}]', IvfAgencyController::class . ':edit')->add(PermissionMiddleware::class)->setName('ivf_agency/edit-ivf_agency-edit-2'); // edit
            $group->any('/delete[/{id}]', IvfAgencyController::class . ':delete')->add(PermissionMiddleware::class)->setName('ivf_agency/delete-ivf_agency-delete-2'); // delete
        }
    );

    // ivf_art_summary
    $app->any('/IvfArtSummaryList[/{id}]', IvfArtSummaryController::class . ':list')->add(PermissionMiddleware::class)->setName('IvfArtSummaryList-ivf_art_summary-list'); // list
    $app->any('/IvfArtSummaryAdd[/{id}]', IvfArtSummaryController::class . ':add')->add(PermissionMiddleware::class)->setName('IvfArtSummaryAdd-ivf_art_summary-add'); // add
    $app->any('/IvfArtSummaryView[/{id}]', IvfArtSummaryController::class . ':view')->add(PermissionMiddleware::class)->setName('IvfArtSummaryView-ivf_art_summary-view'); // view
    $app->any('/IvfArtSummaryEdit[/{id}]', IvfArtSummaryController::class . ':edit')->add(PermissionMiddleware::class)->setName('IvfArtSummaryEdit-ivf_art_summary-edit'); // edit
    $app->any('/IvfArtSummaryDelete[/{id}]', IvfArtSummaryController::class . ':delete')->add(PermissionMiddleware::class)->setName('IvfArtSummaryDelete-ivf_art_summary-delete'); // delete
    $app->group(
        '/ivf_art_summary',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', IvfArtSummaryController::class . ':list')->add(PermissionMiddleware::class)->setName('ivf_art_summary/list-ivf_art_summary-list-2'); // list
            $group->any('/add[/{id}]', IvfArtSummaryController::class . ':add')->add(PermissionMiddleware::class)->setName('ivf_art_summary/add-ivf_art_summary-add-2'); // add
            $group->any('/view[/{id}]', IvfArtSummaryController::class . ':view')->add(PermissionMiddleware::class)->setName('ivf_art_summary/view-ivf_art_summary-view-2'); // view
            $group->any('/edit[/{id}]', IvfArtSummaryController::class . ':edit')->add(PermissionMiddleware::class)->setName('ivf_art_summary/edit-ivf_art_summary-edit-2'); // edit
            $group->any('/delete[/{id}]', IvfArtSummaryController::class . ':delete')->add(PermissionMiddleware::class)->setName('ivf_art_summary/delete-ivf_art_summary-delete-2'); // delete
        }
    );

    // ivf_donorsemendetails
    $app->any('/IvfDonorsemendetailsList[/{id}]', IvfDonorsemendetailsController::class . ':list')->add(PermissionMiddleware::class)->setName('IvfDonorsemendetailsList-ivf_donorsemendetails-list'); // list
    $app->any('/IvfDonorsemendetailsAdd[/{id}]', IvfDonorsemendetailsController::class . ':add')->add(PermissionMiddleware::class)->setName('IvfDonorsemendetailsAdd-ivf_donorsemendetails-add'); // add
    $app->any('/IvfDonorsemendetailsView[/{id}]', IvfDonorsemendetailsController::class . ':view')->add(PermissionMiddleware::class)->setName('IvfDonorsemendetailsView-ivf_donorsemendetails-view'); // view
    $app->any('/IvfDonorsemendetailsEdit[/{id}]', IvfDonorsemendetailsController::class . ':edit')->add(PermissionMiddleware::class)->setName('IvfDonorsemendetailsEdit-ivf_donorsemendetails-edit'); // edit
    $app->any('/IvfDonorsemendetailsDelete[/{id}]', IvfDonorsemendetailsController::class . ':delete')->add(PermissionMiddleware::class)->setName('IvfDonorsemendetailsDelete-ivf_donorsemendetails-delete'); // delete
    $app->group(
        '/ivf_donorsemendetails',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', IvfDonorsemendetailsController::class . ':list')->add(PermissionMiddleware::class)->setName('ivf_donorsemendetails/list-ivf_donorsemendetails-list-2'); // list
            $group->any('/add[/{id}]', IvfDonorsemendetailsController::class . ':add')->add(PermissionMiddleware::class)->setName('ivf_donorsemendetails/add-ivf_donorsemendetails-add-2'); // add
            $group->any('/view[/{id}]', IvfDonorsemendetailsController::class . ':view')->add(PermissionMiddleware::class)->setName('ivf_donorsemendetails/view-ivf_donorsemendetails-view-2'); // view
            $group->any('/edit[/{id}]', IvfDonorsemendetailsController::class . ':edit')->add(PermissionMiddleware::class)->setName('ivf_donorsemendetails/edit-ivf_donorsemendetails-edit-2'); // edit
            $group->any('/delete[/{id}]', IvfDonorsemendetailsController::class . ':delete')->add(PermissionMiddleware::class)->setName('ivf_donorsemendetails/delete-ivf_donorsemendetails-delete-2'); // delete
        }
    );

    // ivf_embryology_chart
    $app->any('/IvfEmbryologyChartList[/{id}]', IvfEmbryologyChartController::class . ':list')->add(PermissionMiddleware::class)->setName('IvfEmbryologyChartList-ivf_embryology_chart-list'); // list
    $app->any('/IvfEmbryologyChartAdd[/{id}]', IvfEmbryologyChartController::class . ':add')->add(PermissionMiddleware::class)->setName('IvfEmbryologyChartAdd-ivf_embryology_chart-add'); // add
    $app->any('/IvfEmbryologyChartView[/{id}]', IvfEmbryologyChartController::class . ':view')->add(PermissionMiddleware::class)->setName('IvfEmbryologyChartView-ivf_embryology_chart-view'); // view
    $app->any('/IvfEmbryologyChartEdit[/{id}]', IvfEmbryologyChartController::class . ':edit')->add(PermissionMiddleware::class)->setName('IvfEmbryologyChartEdit-ivf_embryology_chart-edit'); // edit
    $app->any('/IvfEmbryologyChartDelete[/{id}]', IvfEmbryologyChartController::class . ':delete')->add(PermissionMiddleware::class)->setName('IvfEmbryologyChartDelete-ivf_embryology_chart-delete'); // delete
    $app->group(
        '/ivf_embryology_chart',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', IvfEmbryologyChartController::class . ':list')->add(PermissionMiddleware::class)->setName('ivf_embryology_chart/list-ivf_embryology_chart-list-2'); // list
            $group->any('/add[/{id}]', IvfEmbryologyChartController::class . ':add')->add(PermissionMiddleware::class)->setName('ivf_embryology_chart/add-ivf_embryology_chart-add-2'); // add
            $group->any('/view[/{id}]', IvfEmbryologyChartController::class . ':view')->add(PermissionMiddleware::class)->setName('ivf_embryology_chart/view-ivf_embryology_chart-view-2'); // view
            $group->any('/edit[/{id}]', IvfEmbryologyChartController::class . ':edit')->add(PermissionMiddleware::class)->setName('ivf_embryology_chart/edit-ivf_embryology_chart-edit-2'); // edit
            $group->any('/delete[/{id}]', IvfEmbryologyChartController::class . ':delete')->add(PermissionMiddleware::class)->setName('ivf_embryology_chart/delete-ivf_embryology_chart-delete-2'); // delete
        }
    );

    // ivf_et_chart
    $app->any('/IvfEtChartList[/{id}]', IvfEtChartController::class . ':list')->add(PermissionMiddleware::class)->setName('IvfEtChartList-ivf_et_chart-list'); // list
    $app->any('/IvfEtChartAdd[/{id}]', IvfEtChartController::class . ':add')->add(PermissionMiddleware::class)->setName('IvfEtChartAdd-ivf_et_chart-add'); // add
    $app->any('/IvfEtChartView[/{id}]', IvfEtChartController::class . ':view')->add(PermissionMiddleware::class)->setName('IvfEtChartView-ivf_et_chart-view'); // view
    $app->any('/IvfEtChartEdit[/{id}]', IvfEtChartController::class . ':edit')->add(PermissionMiddleware::class)->setName('IvfEtChartEdit-ivf_et_chart-edit'); // edit
    $app->any('/IvfEtChartDelete[/{id}]', IvfEtChartController::class . ':delete')->add(PermissionMiddleware::class)->setName('IvfEtChartDelete-ivf_et_chart-delete'); // delete
    $app->group(
        '/ivf_et_chart',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', IvfEtChartController::class . ':list')->add(PermissionMiddleware::class)->setName('ivf_et_chart/list-ivf_et_chart-list-2'); // list
            $group->any('/add[/{id}]', IvfEtChartController::class . ':add')->add(PermissionMiddleware::class)->setName('ivf_et_chart/add-ivf_et_chart-add-2'); // add
            $group->any('/view[/{id}]', IvfEtChartController::class . ':view')->add(PermissionMiddleware::class)->setName('ivf_et_chart/view-ivf_et_chart-view-2'); // view
            $group->any('/edit[/{id}]', IvfEtChartController::class . ':edit')->add(PermissionMiddleware::class)->setName('ivf_et_chart/edit-ivf_et_chart-edit-2'); // edit
            $group->any('/delete[/{id}]', IvfEtChartController::class . ':delete')->add(PermissionMiddleware::class)->setName('ivf_et_chart/delete-ivf_et_chart-delete-2'); // delete
        }
    );

    // ivf_follow_up_tracking
    $app->any('/IvfFollowUpTrackingList[/{id}]', IvfFollowUpTrackingController::class . ':list')->add(PermissionMiddleware::class)->setName('IvfFollowUpTrackingList-ivf_follow_up_tracking-list'); // list
    $app->any('/IvfFollowUpTrackingAdd[/{id}]', IvfFollowUpTrackingController::class . ':add')->add(PermissionMiddleware::class)->setName('IvfFollowUpTrackingAdd-ivf_follow_up_tracking-add'); // add
    $app->any('/IvfFollowUpTrackingView[/{id}]', IvfFollowUpTrackingController::class . ':view')->add(PermissionMiddleware::class)->setName('IvfFollowUpTrackingView-ivf_follow_up_tracking-view'); // view
    $app->any('/IvfFollowUpTrackingEdit[/{id}]', IvfFollowUpTrackingController::class . ':edit')->add(PermissionMiddleware::class)->setName('IvfFollowUpTrackingEdit-ivf_follow_up_tracking-edit'); // edit
    $app->any('/IvfFollowUpTrackingDelete[/{id}]', IvfFollowUpTrackingController::class . ':delete')->add(PermissionMiddleware::class)->setName('IvfFollowUpTrackingDelete-ivf_follow_up_tracking-delete'); // delete
    $app->group(
        '/ivf_follow_up_tracking',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', IvfFollowUpTrackingController::class . ':list')->add(PermissionMiddleware::class)->setName('ivf_follow_up_tracking/list-ivf_follow_up_tracking-list-2'); // list
            $group->any('/add[/{id}]', IvfFollowUpTrackingController::class . ':add')->add(PermissionMiddleware::class)->setName('ivf_follow_up_tracking/add-ivf_follow_up_tracking-add-2'); // add
            $group->any('/view[/{id}]', IvfFollowUpTrackingController::class . ':view')->add(PermissionMiddleware::class)->setName('ivf_follow_up_tracking/view-ivf_follow_up_tracking-view-2'); // view
            $group->any('/edit[/{id}]', IvfFollowUpTrackingController::class . ':edit')->add(PermissionMiddleware::class)->setName('ivf_follow_up_tracking/edit-ivf_follow_up_tracking-edit-2'); // edit
            $group->any('/delete[/{id}]', IvfFollowUpTrackingController::class . ':delete')->add(PermissionMiddleware::class)->setName('ivf_follow_up_tracking/delete-ivf_follow_up_tracking-delete-2'); // delete
        }
    );

    // ivf_history_master
    $app->any('/IvfHistoryMasterList[/{id}]', IvfHistoryMasterController::class . ':list')->add(PermissionMiddleware::class)->setName('IvfHistoryMasterList-ivf_history_master-list'); // list
    $app->any('/IvfHistoryMasterAdd[/{id}]', IvfHistoryMasterController::class . ':add')->add(PermissionMiddleware::class)->setName('IvfHistoryMasterAdd-ivf_history_master-add'); // add
    $app->any('/IvfHistoryMasterView[/{id}]', IvfHistoryMasterController::class . ':view')->add(PermissionMiddleware::class)->setName('IvfHistoryMasterView-ivf_history_master-view'); // view
    $app->any('/IvfHistoryMasterEdit[/{id}]', IvfHistoryMasterController::class . ':edit')->add(PermissionMiddleware::class)->setName('IvfHistoryMasterEdit-ivf_history_master-edit'); // edit
    $app->any('/IvfHistoryMasterDelete[/{id}]', IvfHistoryMasterController::class . ':delete')->add(PermissionMiddleware::class)->setName('IvfHistoryMasterDelete-ivf_history_master-delete'); // delete
    $app->group(
        '/ivf_history_master',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', IvfHistoryMasterController::class . ':list')->add(PermissionMiddleware::class)->setName('ivf_history_master/list-ivf_history_master-list-2'); // list
            $group->any('/add[/{id}]', IvfHistoryMasterController::class . ':add')->add(PermissionMiddleware::class)->setName('ivf_history_master/add-ivf_history_master-add-2'); // add
            $group->any('/view[/{id}]', IvfHistoryMasterController::class . ':view')->add(PermissionMiddleware::class)->setName('ivf_history_master/view-ivf_history_master-view-2'); // view
            $group->any('/edit[/{id}]', IvfHistoryMasterController::class . ':edit')->add(PermissionMiddleware::class)->setName('ivf_history_master/edit-ivf_history_master-edit-2'); // edit
            $group->any('/delete[/{id}]', IvfHistoryMasterController::class . ':delete')->add(PermissionMiddleware::class)->setName('ivf_history_master/delete-ivf_history_master-delete-2'); // delete
        }
    );

    // ivf_mas_art_cycle
    $app->any('/IvfMasArtCycleList[/{id}]', IvfMasArtCycleController::class . ':list')->add(PermissionMiddleware::class)->setName('IvfMasArtCycleList-ivf_mas_art_cycle-list'); // list
    $app->any('/IvfMasArtCycleAdd[/{id}]', IvfMasArtCycleController::class . ':add')->add(PermissionMiddleware::class)->setName('IvfMasArtCycleAdd-ivf_mas_art_cycle-add'); // add
    $app->any('/IvfMasArtCycleView[/{id}]', IvfMasArtCycleController::class . ':view')->add(PermissionMiddleware::class)->setName('IvfMasArtCycleView-ivf_mas_art_cycle-view'); // view
    $app->any('/IvfMasArtCycleEdit[/{id}]', IvfMasArtCycleController::class . ':edit')->add(PermissionMiddleware::class)->setName('IvfMasArtCycleEdit-ivf_mas_art_cycle-edit'); // edit
    $app->any('/IvfMasArtCycleDelete[/{id}]', IvfMasArtCycleController::class . ':delete')->add(PermissionMiddleware::class)->setName('IvfMasArtCycleDelete-ivf_mas_art_cycle-delete'); // delete
    $app->group(
        '/ivf_mas_art_cycle',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', IvfMasArtCycleController::class . ':list')->add(PermissionMiddleware::class)->setName('ivf_mas_art_cycle/list-ivf_mas_art_cycle-list-2'); // list
            $group->any('/add[/{id}]', IvfMasArtCycleController::class . ':add')->add(PermissionMiddleware::class)->setName('ivf_mas_art_cycle/add-ivf_mas_art_cycle-add-2'); // add
            $group->any('/view[/{id}]', IvfMasArtCycleController::class . ':view')->add(PermissionMiddleware::class)->setName('ivf_mas_art_cycle/view-ivf_mas_art_cycle-view-2'); // view
            $group->any('/edit[/{id}]', IvfMasArtCycleController::class . ':edit')->add(PermissionMiddleware::class)->setName('ivf_mas_art_cycle/edit-ivf_mas_art_cycle-edit-2'); // edit
            $group->any('/delete[/{id}]', IvfMasArtCycleController::class . ':delete')->add(PermissionMiddleware::class)->setName('ivf_mas_art_cycle/delete-ivf_mas_art_cycle-delete-2'); // delete
        }
    );

    // ivf_mas_template_type
    $app->any('/IvfMasTemplateTypeList[/{id}]', IvfMasTemplateTypeController::class . ':list')->add(PermissionMiddleware::class)->setName('IvfMasTemplateTypeList-ivf_mas_template_type-list'); // list
    $app->any('/IvfMasTemplateTypeAdd[/{id}]', IvfMasTemplateTypeController::class . ':add')->add(PermissionMiddleware::class)->setName('IvfMasTemplateTypeAdd-ivf_mas_template_type-add'); // add
    $app->any('/IvfMasTemplateTypeView[/{id}]', IvfMasTemplateTypeController::class . ':view')->add(PermissionMiddleware::class)->setName('IvfMasTemplateTypeView-ivf_mas_template_type-view'); // view
    $app->any('/IvfMasTemplateTypeEdit[/{id}]', IvfMasTemplateTypeController::class . ':edit')->add(PermissionMiddleware::class)->setName('IvfMasTemplateTypeEdit-ivf_mas_template_type-edit'); // edit
    $app->any('/IvfMasTemplateTypeDelete[/{id}]', IvfMasTemplateTypeController::class . ':delete')->add(PermissionMiddleware::class)->setName('IvfMasTemplateTypeDelete-ivf_mas_template_type-delete'); // delete
    $app->group(
        '/ivf_mas_template_type',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', IvfMasTemplateTypeController::class . ':list')->add(PermissionMiddleware::class)->setName('ivf_mas_template_type/list-ivf_mas_template_type-list-2'); // list
            $group->any('/add[/{id}]', IvfMasTemplateTypeController::class . ':add')->add(PermissionMiddleware::class)->setName('ivf_mas_template_type/add-ivf_mas_template_type-add-2'); // add
            $group->any('/view[/{id}]', IvfMasTemplateTypeController::class . ':view')->add(PermissionMiddleware::class)->setName('ivf_mas_template_type/view-ivf_mas_template_type-view-2'); // view
            $group->any('/edit[/{id}]', IvfMasTemplateTypeController::class . ':edit')->add(PermissionMiddleware::class)->setName('ivf_mas_template_type/edit-ivf_mas_template_type-edit-2'); // edit
            $group->any('/delete[/{id}]', IvfMasTemplateTypeController::class . ':delete')->add(PermissionMiddleware::class)->setName('ivf_mas_template_type/delete-ivf_mas_template_type-delete-2'); // delete
        }
    );

    // ivf_mas_user_template
    $app->any('/IvfMasUserTemplateList[/{id}]', IvfMasUserTemplateController::class . ':list')->add(PermissionMiddleware::class)->setName('IvfMasUserTemplateList-ivf_mas_user_template-list'); // list
    $app->any('/IvfMasUserTemplateAdd[/{id}]', IvfMasUserTemplateController::class . ':add')->add(PermissionMiddleware::class)->setName('IvfMasUserTemplateAdd-ivf_mas_user_template-add'); // add
    $app->any('/IvfMasUserTemplateView[/{id}]', IvfMasUserTemplateController::class . ':view')->add(PermissionMiddleware::class)->setName('IvfMasUserTemplateView-ivf_mas_user_template-view'); // view
    $app->any('/IvfMasUserTemplateEdit[/{id}]', IvfMasUserTemplateController::class . ':edit')->add(PermissionMiddleware::class)->setName('IvfMasUserTemplateEdit-ivf_mas_user_template-edit'); // edit
    $app->any('/IvfMasUserTemplateDelete[/{id}]', IvfMasUserTemplateController::class . ':delete')->add(PermissionMiddleware::class)->setName('IvfMasUserTemplateDelete-ivf_mas_user_template-delete'); // delete
    $app->group(
        '/ivf_mas_user_template',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', IvfMasUserTemplateController::class . ':list')->add(PermissionMiddleware::class)->setName('ivf_mas_user_template/list-ivf_mas_user_template-list-2'); // list
            $group->any('/add[/{id}]', IvfMasUserTemplateController::class . ':add')->add(PermissionMiddleware::class)->setName('ivf_mas_user_template/add-ivf_mas_user_template-add-2'); // add
            $group->any('/view[/{id}]', IvfMasUserTemplateController::class . ':view')->add(PermissionMiddleware::class)->setName('ivf_mas_user_template/view-ivf_mas_user_template-view-2'); // view
            $group->any('/edit[/{id}]', IvfMasUserTemplateController::class . ':edit')->add(PermissionMiddleware::class)->setName('ivf_mas_user_template/edit-ivf_mas_user_template-edit-2'); // edit
            $group->any('/delete[/{id}]', IvfMasUserTemplateController::class . ':delete')->add(PermissionMiddleware::class)->setName('ivf_mas_user_template/delete-ivf_mas_user_template-delete-2'); // delete
        }
    );

    // ivf_oocytedenudation
    $app->any('/IvfOocytedenudationList[/{id}]', IvfOocytedenudationController::class . ':list')->add(PermissionMiddleware::class)->setName('IvfOocytedenudationList-ivf_oocytedenudation-list'); // list
    $app->any('/IvfOocytedenudationAdd[/{id}]', IvfOocytedenudationController::class . ':add')->add(PermissionMiddleware::class)->setName('IvfOocytedenudationAdd-ivf_oocytedenudation-add'); // add
    $app->any('/IvfOocytedenudationView[/{id}]', IvfOocytedenudationController::class . ':view')->add(PermissionMiddleware::class)->setName('IvfOocytedenudationView-ivf_oocytedenudation-view'); // view
    $app->any('/IvfOocytedenudationEdit[/{id}]', IvfOocytedenudationController::class . ':edit')->add(PermissionMiddleware::class)->setName('IvfOocytedenudationEdit-ivf_oocytedenudation-edit'); // edit
    $app->any('/IvfOocytedenudationDelete[/{id}]', IvfOocytedenudationController::class . ':delete')->add(PermissionMiddleware::class)->setName('IvfOocytedenudationDelete-ivf_oocytedenudation-delete'); // delete
    $app->group(
        '/ivf_oocytedenudation',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', IvfOocytedenudationController::class . ':list')->add(PermissionMiddleware::class)->setName('ivf_oocytedenudation/list-ivf_oocytedenudation-list-2'); // list
            $group->any('/add[/{id}]', IvfOocytedenudationController::class . ':add')->add(PermissionMiddleware::class)->setName('ivf_oocytedenudation/add-ivf_oocytedenudation-add-2'); // add
            $group->any('/view[/{id}]', IvfOocytedenudationController::class . ':view')->add(PermissionMiddleware::class)->setName('ivf_oocytedenudation/view-ivf_oocytedenudation-view-2'); // view
            $group->any('/edit[/{id}]', IvfOocytedenudationController::class . ':edit')->add(PermissionMiddleware::class)->setName('ivf_oocytedenudation/edit-ivf_oocytedenudation-edit-2'); // edit
            $group->any('/delete[/{id}]', IvfOocytedenudationController::class . ':delete')->add(PermissionMiddleware::class)->setName('ivf_oocytedenudation/delete-ivf_oocytedenudation-delete-2'); // delete
        }
    );

    // ivf_oocytedenudation_stage
    $app->any('/IvfOocytedenudationStageList[/{id}]', IvfOocytedenudationStageController::class . ':list')->add(PermissionMiddleware::class)->setName('IvfOocytedenudationStageList-ivf_oocytedenudation_stage-list'); // list
    $app->any('/IvfOocytedenudationStageAdd[/{id}]', IvfOocytedenudationStageController::class . ':add')->add(PermissionMiddleware::class)->setName('IvfOocytedenudationStageAdd-ivf_oocytedenudation_stage-add'); // add
    $app->any('/IvfOocytedenudationStageView[/{id}]', IvfOocytedenudationStageController::class . ':view')->add(PermissionMiddleware::class)->setName('IvfOocytedenudationStageView-ivf_oocytedenudation_stage-view'); // view
    $app->any('/IvfOocytedenudationStageEdit[/{id}]', IvfOocytedenudationStageController::class . ':edit')->add(PermissionMiddleware::class)->setName('IvfOocytedenudationStageEdit-ivf_oocytedenudation_stage-edit'); // edit
    $app->any('/IvfOocytedenudationStageDelete[/{id}]', IvfOocytedenudationStageController::class . ':delete')->add(PermissionMiddleware::class)->setName('IvfOocytedenudationStageDelete-ivf_oocytedenudation_stage-delete'); // delete
    $app->group(
        '/ivf_oocytedenudation_stage',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', IvfOocytedenudationStageController::class . ':list')->add(PermissionMiddleware::class)->setName('ivf_oocytedenudation_stage/list-ivf_oocytedenudation_stage-list-2'); // list
            $group->any('/add[/{id}]', IvfOocytedenudationStageController::class . ':add')->add(PermissionMiddleware::class)->setName('ivf_oocytedenudation_stage/add-ivf_oocytedenudation_stage-add-2'); // add
            $group->any('/view[/{id}]', IvfOocytedenudationStageController::class . ':view')->add(PermissionMiddleware::class)->setName('ivf_oocytedenudation_stage/view-ivf_oocytedenudation_stage-view-2'); // view
            $group->any('/edit[/{id}]', IvfOocytedenudationStageController::class . ':edit')->add(PermissionMiddleware::class)->setName('ivf_oocytedenudation_stage/edit-ivf_oocytedenudation_stage-edit-2'); // edit
            $group->any('/delete[/{id}]', IvfOocytedenudationStageController::class . ':delete')->add(PermissionMiddleware::class)->setName('ivf_oocytedenudation_stage/delete-ivf_oocytedenudation_stage-delete-2'); // delete
        }
    );

    // ivf_otherprocedure
    $app->any('/IvfOtherprocedureList[/{id}]', IvfOtherprocedureController::class . ':list')->add(PermissionMiddleware::class)->setName('IvfOtherprocedureList-ivf_otherprocedure-list'); // list
    $app->any('/IvfOtherprocedureAdd[/{id}]', IvfOtherprocedureController::class . ':add')->add(PermissionMiddleware::class)->setName('IvfOtherprocedureAdd-ivf_otherprocedure-add'); // add
    $app->any('/IvfOtherprocedureView[/{id}]', IvfOtherprocedureController::class . ':view')->add(PermissionMiddleware::class)->setName('IvfOtherprocedureView-ivf_otherprocedure-view'); // view
    $app->any('/IvfOtherprocedureEdit[/{id}]', IvfOtherprocedureController::class . ':edit')->add(PermissionMiddleware::class)->setName('IvfOtherprocedureEdit-ivf_otherprocedure-edit'); // edit
    $app->any('/IvfOtherprocedureDelete[/{id}]', IvfOtherprocedureController::class . ':delete')->add(PermissionMiddleware::class)->setName('IvfOtherprocedureDelete-ivf_otherprocedure-delete'); // delete
    $app->group(
        '/ivf_otherprocedure',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', IvfOtherprocedureController::class . ':list')->add(PermissionMiddleware::class)->setName('ivf_otherprocedure/list-ivf_otherprocedure-list-2'); // list
            $group->any('/add[/{id}]', IvfOtherprocedureController::class . ':add')->add(PermissionMiddleware::class)->setName('ivf_otherprocedure/add-ivf_otherprocedure-add-2'); // add
            $group->any('/view[/{id}]', IvfOtherprocedureController::class . ':view')->add(PermissionMiddleware::class)->setName('ivf_otherprocedure/view-ivf_otherprocedure-view-2'); // view
            $group->any('/edit[/{id}]', IvfOtherprocedureController::class . ':edit')->add(PermissionMiddleware::class)->setName('ivf_otherprocedure/edit-ivf_otherprocedure-edit-2'); // edit
            $group->any('/delete[/{id}]', IvfOtherprocedureController::class . ':delete')->add(PermissionMiddleware::class)->setName('ivf_otherprocedure/delete-ivf_otherprocedure-delete-2'); // delete
        }
    );

    // ivf_outcome
    $app->any('/IvfOutcomeList[/{id}]', IvfOutcomeController::class . ':list')->add(PermissionMiddleware::class)->setName('IvfOutcomeList-ivf_outcome-list'); // list
    $app->any('/IvfOutcomeAdd[/{id}]', IvfOutcomeController::class . ':add')->add(PermissionMiddleware::class)->setName('IvfOutcomeAdd-ivf_outcome-add'); // add
    $app->any('/IvfOutcomeView[/{id}]', IvfOutcomeController::class . ':view')->add(PermissionMiddleware::class)->setName('IvfOutcomeView-ivf_outcome-view'); // view
    $app->any('/IvfOutcomeEdit[/{id}]', IvfOutcomeController::class . ':edit')->add(PermissionMiddleware::class)->setName('IvfOutcomeEdit-ivf_outcome-edit'); // edit
    $app->any('/IvfOutcomeDelete[/{id}]', IvfOutcomeController::class . ':delete')->add(PermissionMiddleware::class)->setName('IvfOutcomeDelete-ivf_outcome-delete'); // delete
    $app->group(
        '/ivf_outcome',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', IvfOutcomeController::class . ':list')->add(PermissionMiddleware::class)->setName('ivf_outcome/list-ivf_outcome-list-2'); // list
            $group->any('/add[/{id}]', IvfOutcomeController::class . ':add')->add(PermissionMiddleware::class)->setName('ivf_outcome/add-ivf_outcome-add-2'); // add
            $group->any('/view[/{id}]', IvfOutcomeController::class . ':view')->add(PermissionMiddleware::class)->setName('ivf_outcome/view-ivf_outcome-view-2'); // view
            $group->any('/edit[/{id}]', IvfOutcomeController::class . ':edit')->add(PermissionMiddleware::class)->setName('ivf_outcome/edit-ivf_outcome-edit-2'); // edit
            $group->any('/delete[/{id}]', IvfOutcomeController::class . ':delete')->add(PermissionMiddleware::class)->setName('ivf_outcome/delete-ivf_outcome-delete-2'); // delete
        }
    );

    // ivf_ovum_pick_up_chart
    $app->any('/IvfOvumPickUpChartList[/{id}]', IvfOvumPickUpChartController::class . ':list')->add(PermissionMiddleware::class)->setName('IvfOvumPickUpChartList-ivf_ovum_pick_up_chart-list'); // list
    $app->any('/IvfOvumPickUpChartAdd[/{id}]', IvfOvumPickUpChartController::class . ':add')->add(PermissionMiddleware::class)->setName('IvfOvumPickUpChartAdd-ivf_ovum_pick_up_chart-add'); // add
    $app->any('/IvfOvumPickUpChartView[/{id}]', IvfOvumPickUpChartController::class . ':view')->add(PermissionMiddleware::class)->setName('IvfOvumPickUpChartView-ivf_ovum_pick_up_chart-view'); // view
    $app->any('/IvfOvumPickUpChartEdit[/{id}]', IvfOvumPickUpChartController::class . ':edit')->add(PermissionMiddleware::class)->setName('IvfOvumPickUpChartEdit-ivf_ovum_pick_up_chart-edit'); // edit
    $app->any('/IvfOvumPickUpChartDelete[/{id}]', IvfOvumPickUpChartController::class . ':delete')->add(PermissionMiddleware::class)->setName('IvfOvumPickUpChartDelete-ivf_ovum_pick_up_chart-delete'); // delete
    $app->group(
        '/ivf_ovum_pick_up_chart',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', IvfOvumPickUpChartController::class . ':list')->add(PermissionMiddleware::class)->setName('ivf_ovum_pick_up_chart/list-ivf_ovum_pick_up_chart-list-2'); // list
            $group->any('/add[/{id}]', IvfOvumPickUpChartController::class . ':add')->add(PermissionMiddleware::class)->setName('ivf_ovum_pick_up_chart/add-ivf_ovum_pick_up_chart-add-2'); // add
            $group->any('/view[/{id}]', IvfOvumPickUpChartController::class . ':view')->add(PermissionMiddleware::class)->setName('ivf_ovum_pick_up_chart/view-ivf_ovum_pick_up_chart-view-2'); // view
            $group->any('/edit[/{id}]', IvfOvumPickUpChartController::class . ':edit')->add(PermissionMiddleware::class)->setName('ivf_ovum_pick_up_chart/edit-ivf_ovum_pick_up_chart-edit-2'); // edit
            $group->any('/delete[/{id}]', IvfOvumPickUpChartController::class . ':delete')->add(PermissionMiddleware::class)->setName('ivf_ovum_pick_up_chart/delete-ivf_ovum_pick_up_chart-delete-2'); // delete
        }
    );

    // ivf_semenan_medication
    $app->any('/IvfSemenanMedicationList[/{id}]', IvfSemenanMedicationController::class . ':list')->add(PermissionMiddleware::class)->setName('IvfSemenanMedicationList-ivf_semenan_medication-list'); // list
    $app->any('/IvfSemenanMedicationAdd[/{id}]', IvfSemenanMedicationController::class . ':add')->add(PermissionMiddleware::class)->setName('IvfSemenanMedicationAdd-ivf_semenan_medication-add'); // add
    $app->any('/IvfSemenanMedicationView[/{id}]', IvfSemenanMedicationController::class . ':view')->add(PermissionMiddleware::class)->setName('IvfSemenanMedicationView-ivf_semenan_medication-view'); // view
    $app->any('/IvfSemenanMedicationEdit[/{id}]', IvfSemenanMedicationController::class . ':edit')->add(PermissionMiddleware::class)->setName('IvfSemenanMedicationEdit-ivf_semenan_medication-edit'); // edit
    $app->any('/IvfSemenanMedicationDelete[/{id}]', IvfSemenanMedicationController::class . ':delete')->add(PermissionMiddleware::class)->setName('IvfSemenanMedicationDelete-ivf_semenan_medication-delete'); // delete
    $app->group(
        '/ivf_semenan_medication',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', IvfSemenanMedicationController::class . ':list')->add(PermissionMiddleware::class)->setName('ivf_semenan_medication/list-ivf_semenan_medication-list-2'); // list
            $group->any('/add[/{id}]', IvfSemenanMedicationController::class . ':add')->add(PermissionMiddleware::class)->setName('ivf_semenan_medication/add-ivf_semenan_medication-add-2'); // add
            $group->any('/view[/{id}]', IvfSemenanMedicationController::class . ':view')->add(PermissionMiddleware::class)->setName('ivf_semenan_medication/view-ivf_semenan_medication-view-2'); // view
            $group->any('/edit[/{id}]', IvfSemenanMedicationController::class . ':edit')->add(PermissionMiddleware::class)->setName('ivf_semenan_medication/edit-ivf_semenan_medication-edit-2'); // edit
            $group->any('/delete[/{id}]', IvfSemenanMedicationController::class . ':delete')->add(PermissionMiddleware::class)->setName('ivf_semenan_medication/delete-ivf_semenan_medication-delete-2'); // delete
        }
    );

    // ivf_semenanalysisreport
    $app->any('/IvfSemenanalysisreportList[/{id}]', IvfSemenanalysisreportController::class . ':list')->add(PermissionMiddleware::class)->setName('IvfSemenanalysisreportList-ivf_semenanalysisreport-list'); // list
    $app->any('/IvfSemenanalysisreportAdd[/{id}]', IvfSemenanalysisreportController::class . ':add')->add(PermissionMiddleware::class)->setName('IvfSemenanalysisreportAdd-ivf_semenanalysisreport-add'); // add
    $app->any('/IvfSemenanalysisreportView[/{id}]', IvfSemenanalysisreportController::class . ':view')->add(PermissionMiddleware::class)->setName('IvfSemenanalysisreportView-ivf_semenanalysisreport-view'); // view
    $app->any('/IvfSemenanalysisreportEdit[/{id}]', IvfSemenanalysisreportController::class . ':edit')->add(PermissionMiddleware::class)->setName('IvfSemenanalysisreportEdit-ivf_semenanalysisreport-edit'); // edit
    $app->any('/IvfSemenanalysisreportDelete[/{id}]', IvfSemenanalysisreportController::class . ':delete')->add(PermissionMiddleware::class)->setName('IvfSemenanalysisreportDelete-ivf_semenanalysisreport-delete'); // delete
    $app->group(
        '/ivf_semenanalysisreport',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', IvfSemenanalysisreportController::class . ':list')->add(PermissionMiddleware::class)->setName('ivf_semenanalysisreport/list-ivf_semenanalysisreport-list-2'); // list
            $group->any('/add[/{id}]', IvfSemenanalysisreportController::class . ':add')->add(PermissionMiddleware::class)->setName('ivf_semenanalysisreport/add-ivf_semenanalysisreport-add-2'); // add
            $group->any('/view[/{id}]', IvfSemenanalysisreportController::class . ':view')->add(PermissionMiddleware::class)->setName('ivf_semenanalysisreport/view-ivf_semenanalysisreport-view-2'); // view
            $group->any('/edit[/{id}]', IvfSemenanalysisreportController::class . ':edit')->add(PermissionMiddleware::class)->setName('ivf_semenanalysisreport/edit-ivf_semenanalysisreport-edit-2'); // edit
            $group->any('/delete[/{id}]', IvfSemenanalysisreportController::class . ':delete')->add(PermissionMiddleware::class)->setName('ivf_semenanalysisreport/delete-ivf_semenanalysisreport-delete-2'); // delete
        }
    );

    // ivf_stimulation_chart
    $app->any('/IvfStimulationChartList[/{id}]', IvfStimulationChartController::class . ':list')->add(PermissionMiddleware::class)->setName('IvfStimulationChartList-ivf_stimulation_chart-list'); // list
    $app->any('/IvfStimulationChartAdd[/{id}]', IvfStimulationChartController::class . ':add')->add(PermissionMiddleware::class)->setName('IvfStimulationChartAdd-ivf_stimulation_chart-add'); // add
    $app->any('/IvfStimulationChartView[/{id}]', IvfStimulationChartController::class . ':view')->add(PermissionMiddleware::class)->setName('IvfStimulationChartView-ivf_stimulation_chart-view'); // view
    $app->any('/IvfStimulationChartEdit[/{id}]', IvfStimulationChartController::class . ':edit')->add(PermissionMiddleware::class)->setName('IvfStimulationChartEdit-ivf_stimulation_chart-edit'); // edit
    $app->any('/IvfStimulationChartDelete[/{id}]', IvfStimulationChartController::class . ':delete')->add(PermissionMiddleware::class)->setName('IvfStimulationChartDelete-ivf_stimulation_chart-delete'); // delete
    $app->group(
        '/ivf_stimulation_chart',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', IvfStimulationChartController::class . ':list')->add(PermissionMiddleware::class)->setName('ivf_stimulation_chart/list-ivf_stimulation_chart-list-2'); // list
            $group->any('/add[/{id}]', IvfStimulationChartController::class . ':add')->add(PermissionMiddleware::class)->setName('ivf_stimulation_chart/add-ivf_stimulation_chart-add-2'); // add
            $group->any('/view[/{id}]', IvfStimulationChartController::class . ':view')->add(PermissionMiddleware::class)->setName('ivf_stimulation_chart/view-ivf_stimulation_chart-view-2'); // view
            $group->any('/edit[/{id}]', IvfStimulationChartController::class . ':edit')->add(PermissionMiddleware::class)->setName('ivf_stimulation_chart/edit-ivf_stimulation_chart-edit-2'); // edit
            $group->any('/delete[/{id}]', IvfStimulationChartController::class . ':delete')->add(PermissionMiddleware::class)->setName('ivf_stimulation_chart/delete-ivf_stimulation_chart-delete-2'); // delete
        }
    );

    // ivf_stimulation_gnrh
    $app->any('/IvfStimulationGnrhList[/{id}]', IvfStimulationGnrhController::class . ':list')->add(PermissionMiddleware::class)->setName('IvfStimulationGnrhList-ivf_stimulation_gnrh-list'); // list
    $app->any('/IvfStimulationGnrhAdd[/{id}]', IvfStimulationGnrhController::class . ':add')->add(PermissionMiddleware::class)->setName('IvfStimulationGnrhAdd-ivf_stimulation_gnrh-add'); // add
    $app->any('/IvfStimulationGnrhView[/{id}]', IvfStimulationGnrhController::class . ':view')->add(PermissionMiddleware::class)->setName('IvfStimulationGnrhView-ivf_stimulation_gnrh-view'); // view
    $app->any('/IvfStimulationGnrhEdit[/{id}]', IvfStimulationGnrhController::class . ':edit')->add(PermissionMiddleware::class)->setName('IvfStimulationGnrhEdit-ivf_stimulation_gnrh-edit'); // edit
    $app->any('/IvfStimulationGnrhDelete[/{id}]', IvfStimulationGnrhController::class . ':delete')->add(PermissionMiddleware::class)->setName('IvfStimulationGnrhDelete-ivf_stimulation_gnrh-delete'); // delete
    $app->group(
        '/ivf_stimulation_gnrh',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', IvfStimulationGnrhController::class . ':list')->add(PermissionMiddleware::class)->setName('ivf_stimulation_gnrh/list-ivf_stimulation_gnrh-list-2'); // list
            $group->any('/add[/{id}]', IvfStimulationGnrhController::class . ':add')->add(PermissionMiddleware::class)->setName('ivf_stimulation_gnrh/add-ivf_stimulation_gnrh-add-2'); // add
            $group->any('/view[/{id}]', IvfStimulationGnrhController::class . ':view')->add(PermissionMiddleware::class)->setName('ivf_stimulation_gnrh/view-ivf_stimulation_gnrh-view-2'); // view
            $group->any('/edit[/{id}]', IvfStimulationGnrhController::class . ':edit')->add(PermissionMiddleware::class)->setName('ivf_stimulation_gnrh/edit-ivf_stimulation_gnrh-edit-2'); // edit
            $group->any('/delete[/{id}]', IvfStimulationGnrhController::class . ':delete')->add(PermissionMiddleware::class)->setName('ivf_stimulation_gnrh/delete-ivf_stimulation_gnrh-delete-2'); // delete
        }
    );

    // ivf_stimulation_hmg
    $app->any('/IvfStimulationHmgList[/{id}]', IvfStimulationHmgController::class . ':list')->add(PermissionMiddleware::class)->setName('IvfStimulationHmgList-ivf_stimulation_hmg-list'); // list
    $app->any('/IvfStimulationHmgAdd[/{id}]', IvfStimulationHmgController::class . ':add')->add(PermissionMiddleware::class)->setName('IvfStimulationHmgAdd-ivf_stimulation_hmg-add'); // add
    $app->any('/IvfStimulationHmgView[/{id}]', IvfStimulationHmgController::class . ':view')->add(PermissionMiddleware::class)->setName('IvfStimulationHmgView-ivf_stimulation_hmg-view'); // view
    $app->any('/IvfStimulationHmgEdit[/{id}]', IvfStimulationHmgController::class . ':edit')->add(PermissionMiddleware::class)->setName('IvfStimulationHmgEdit-ivf_stimulation_hmg-edit'); // edit
    $app->any('/IvfStimulationHmgDelete[/{id}]', IvfStimulationHmgController::class . ':delete')->add(PermissionMiddleware::class)->setName('IvfStimulationHmgDelete-ivf_stimulation_hmg-delete'); // delete
    $app->group(
        '/ivf_stimulation_hmg',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', IvfStimulationHmgController::class . ':list')->add(PermissionMiddleware::class)->setName('ivf_stimulation_hmg/list-ivf_stimulation_hmg-list-2'); // list
            $group->any('/add[/{id}]', IvfStimulationHmgController::class . ':add')->add(PermissionMiddleware::class)->setName('ivf_stimulation_hmg/add-ivf_stimulation_hmg-add-2'); // add
            $group->any('/view[/{id}]', IvfStimulationHmgController::class . ':view')->add(PermissionMiddleware::class)->setName('ivf_stimulation_hmg/view-ivf_stimulation_hmg-view-2'); // view
            $group->any('/edit[/{id}]', IvfStimulationHmgController::class . ':edit')->add(PermissionMiddleware::class)->setName('ivf_stimulation_hmg/edit-ivf_stimulation_hmg-edit-2'); // edit
            $group->any('/delete[/{id}]', IvfStimulationHmgController::class . ':delete')->add(PermissionMiddleware::class)->setName('ivf_stimulation_hmg/delete-ivf_stimulation_hmg-delete-2'); // delete
        }
    );

    // ivf_stimulation_inj
    $app->any('/IvfStimulationInjList[/{id}]', IvfStimulationInjController::class . ':list')->add(PermissionMiddleware::class)->setName('IvfStimulationInjList-ivf_stimulation_inj-list'); // list
    $app->any('/IvfStimulationInjAdd[/{id}]', IvfStimulationInjController::class . ':add')->add(PermissionMiddleware::class)->setName('IvfStimulationInjAdd-ivf_stimulation_inj-add'); // add
    $app->any('/IvfStimulationInjView[/{id}]', IvfStimulationInjController::class . ':view')->add(PermissionMiddleware::class)->setName('IvfStimulationInjView-ivf_stimulation_inj-view'); // view
    $app->any('/IvfStimulationInjEdit[/{id}]', IvfStimulationInjController::class . ':edit')->add(PermissionMiddleware::class)->setName('IvfStimulationInjEdit-ivf_stimulation_inj-edit'); // edit
    $app->any('/IvfStimulationInjDelete[/{id}]', IvfStimulationInjController::class . ':delete')->add(PermissionMiddleware::class)->setName('IvfStimulationInjDelete-ivf_stimulation_inj-delete'); // delete
    $app->group(
        '/ivf_stimulation_inj',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', IvfStimulationInjController::class . ':list')->add(PermissionMiddleware::class)->setName('ivf_stimulation_inj/list-ivf_stimulation_inj-list-2'); // list
            $group->any('/add[/{id}]', IvfStimulationInjController::class . ':add')->add(PermissionMiddleware::class)->setName('ivf_stimulation_inj/add-ivf_stimulation_inj-add-2'); // add
            $group->any('/view[/{id}]', IvfStimulationInjController::class . ':view')->add(PermissionMiddleware::class)->setName('ivf_stimulation_inj/view-ivf_stimulation_inj-view-2'); // view
            $group->any('/edit[/{id}]', IvfStimulationInjController::class . ':edit')->add(PermissionMiddleware::class)->setName('ivf_stimulation_inj/edit-ivf_stimulation_inj-edit-2'); // edit
            $group->any('/delete[/{id}]', IvfStimulationInjController::class . ':delete')->add(PermissionMiddleware::class)->setName('ivf_stimulation_inj/delete-ivf_stimulation_inj-delete-2'); // delete
        }
    );

    // ivf_stimulation_rfsh
    $app->any('/IvfStimulationRfshList[/{id}]', IvfStimulationRfshController::class . ':list')->add(PermissionMiddleware::class)->setName('IvfStimulationRfshList-ivf_stimulation_rfsh-list'); // list
    $app->any('/IvfStimulationRfshAdd[/{id}]', IvfStimulationRfshController::class . ':add')->add(PermissionMiddleware::class)->setName('IvfStimulationRfshAdd-ivf_stimulation_rfsh-add'); // add
    $app->any('/IvfStimulationRfshView[/{id}]', IvfStimulationRfshController::class . ':view')->add(PermissionMiddleware::class)->setName('IvfStimulationRfshView-ivf_stimulation_rfsh-view'); // view
    $app->any('/IvfStimulationRfshEdit[/{id}]', IvfStimulationRfshController::class . ':edit')->add(PermissionMiddleware::class)->setName('IvfStimulationRfshEdit-ivf_stimulation_rfsh-edit'); // edit
    $app->any('/IvfStimulationRfshDelete[/{id}]', IvfStimulationRfshController::class . ':delete')->add(PermissionMiddleware::class)->setName('IvfStimulationRfshDelete-ivf_stimulation_rfsh-delete'); // delete
    $app->group(
        '/ivf_stimulation_rfsh',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', IvfStimulationRfshController::class . ':list')->add(PermissionMiddleware::class)->setName('ivf_stimulation_rfsh/list-ivf_stimulation_rfsh-list-2'); // list
            $group->any('/add[/{id}]', IvfStimulationRfshController::class . ':add')->add(PermissionMiddleware::class)->setName('ivf_stimulation_rfsh/add-ivf_stimulation_rfsh-add-2'); // add
            $group->any('/view[/{id}]', IvfStimulationRfshController::class . ':view')->add(PermissionMiddleware::class)->setName('ivf_stimulation_rfsh/view-ivf_stimulation_rfsh-view-2'); // view
            $group->any('/edit[/{id}]', IvfStimulationRfshController::class . ':edit')->add(PermissionMiddleware::class)->setName('ivf_stimulation_rfsh/edit-ivf_stimulation_rfsh-edit-2'); // edit
            $group->any('/delete[/{id}]', IvfStimulationRfshController::class . ':delete')->add(PermissionMiddleware::class)->setName('ivf_stimulation_rfsh/delete-ivf_stimulation_rfsh-delete-2'); // delete
        }
    );

    // ivf_stimulation_tablet
    $app->any('/IvfStimulationTabletList[/{id}]', IvfStimulationTabletController::class . ':list')->add(PermissionMiddleware::class)->setName('IvfStimulationTabletList-ivf_stimulation_tablet-list'); // list
    $app->any('/IvfStimulationTabletAdd[/{id}]', IvfStimulationTabletController::class . ':add')->add(PermissionMiddleware::class)->setName('IvfStimulationTabletAdd-ivf_stimulation_tablet-add'); // add
    $app->any('/IvfStimulationTabletView[/{id}]', IvfStimulationTabletController::class . ':view')->add(PermissionMiddleware::class)->setName('IvfStimulationTabletView-ivf_stimulation_tablet-view'); // view
    $app->any('/IvfStimulationTabletEdit[/{id}]', IvfStimulationTabletController::class . ':edit')->add(PermissionMiddleware::class)->setName('IvfStimulationTabletEdit-ivf_stimulation_tablet-edit'); // edit
    $app->any('/IvfStimulationTabletDelete[/{id}]', IvfStimulationTabletController::class . ':delete')->add(PermissionMiddleware::class)->setName('IvfStimulationTabletDelete-ivf_stimulation_tablet-delete'); // delete
    $app->group(
        '/ivf_stimulation_tablet',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', IvfStimulationTabletController::class . ':list')->add(PermissionMiddleware::class)->setName('ivf_stimulation_tablet/list-ivf_stimulation_tablet-list-2'); // list
            $group->any('/add[/{id}]', IvfStimulationTabletController::class . ':add')->add(PermissionMiddleware::class)->setName('ivf_stimulation_tablet/add-ivf_stimulation_tablet-add-2'); // add
            $group->any('/view[/{id}]', IvfStimulationTabletController::class . ':view')->add(PermissionMiddleware::class)->setName('ivf_stimulation_tablet/view-ivf_stimulation_tablet-view-2'); // view
            $group->any('/edit[/{id}]', IvfStimulationTabletController::class . ':edit')->add(PermissionMiddleware::class)->setName('ivf_stimulation_tablet/edit-ivf_stimulation_tablet-edit-2'); // edit
            $group->any('/delete[/{id}]', IvfStimulationTabletController::class . ':delete')->add(PermissionMiddleware::class)->setName('ivf_stimulation_tablet/delete-ivf_stimulation_tablet-delete-2'); // delete
        }
    );

    // ivf_stimulation_trigger
    $app->any('/IvfStimulationTriggerList[/{id}]', IvfStimulationTriggerController::class . ':list')->add(PermissionMiddleware::class)->setName('IvfStimulationTriggerList-ivf_stimulation_trigger-list'); // list
    $app->any('/IvfStimulationTriggerAdd[/{id}]', IvfStimulationTriggerController::class . ':add')->add(PermissionMiddleware::class)->setName('IvfStimulationTriggerAdd-ivf_stimulation_trigger-add'); // add
    $app->any('/IvfStimulationTriggerView[/{id}]', IvfStimulationTriggerController::class . ':view')->add(PermissionMiddleware::class)->setName('IvfStimulationTriggerView-ivf_stimulation_trigger-view'); // view
    $app->any('/IvfStimulationTriggerEdit[/{id}]', IvfStimulationTriggerController::class . ':edit')->add(PermissionMiddleware::class)->setName('IvfStimulationTriggerEdit-ivf_stimulation_trigger-edit'); // edit
    $app->any('/IvfStimulationTriggerDelete[/{id}]', IvfStimulationTriggerController::class . ':delete')->add(PermissionMiddleware::class)->setName('IvfStimulationTriggerDelete-ivf_stimulation_trigger-delete'); // delete
    $app->group(
        '/ivf_stimulation_trigger',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', IvfStimulationTriggerController::class . ':list')->add(PermissionMiddleware::class)->setName('ivf_stimulation_trigger/list-ivf_stimulation_trigger-list-2'); // list
            $group->any('/add[/{id}]', IvfStimulationTriggerController::class . ':add')->add(PermissionMiddleware::class)->setName('ivf_stimulation_trigger/add-ivf_stimulation_trigger-add-2'); // add
            $group->any('/view[/{id}]', IvfStimulationTriggerController::class . ':view')->add(PermissionMiddleware::class)->setName('ivf_stimulation_trigger/view-ivf_stimulation_trigger-view-2'); // view
            $group->any('/edit[/{id}]', IvfStimulationTriggerController::class . ':edit')->add(PermissionMiddleware::class)->setName('ivf_stimulation_trigger/edit-ivf_stimulation_trigger-edit-2'); // edit
            $group->any('/delete[/{id}]', IvfStimulationTriggerController::class . ':delete')->add(PermissionMiddleware::class)->setName('ivf_stimulation_trigger/delete-ivf_stimulation_trigger-delete-2'); // delete
        }
    );

    // ivf_treatment_plan
    $app->any('/IvfTreatmentPlanList[/{id}]', IvfTreatmentPlanController::class . ':list')->add(PermissionMiddleware::class)->setName('IvfTreatmentPlanList-ivf_treatment_plan-list'); // list
    $app->any('/IvfTreatmentPlanAdd[/{id}]', IvfTreatmentPlanController::class . ':add')->add(PermissionMiddleware::class)->setName('IvfTreatmentPlanAdd-ivf_treatment_plan-add'); // add
    $app->any('/IvfTreatmentPlanView[/{id}]', IvfTreatmentPlanController::class . ':view')->add(PermissionMiddleware::class)->setName('IvfTreatmentPlanView-ivf_treatment_plan-view'); // view
    $app->any('/IvfTreatmentPlanEdit[/{id}]', IvfTreatmentPlanController::class . ':edit')->add(PermissionMiddleware::class)->setName('IvfTreatmentPlanEdit-ivf_treatment_plan-edit'); // edit
    $app->any('/IvfTreatmentPlanDelete[/{id}]', IvfTreatmentPlanController::class . ':delete')->add(PermissionMiddleware::class)->setName('IvfTreatmentPlanDelete-ivf_treatment_plan-delete'); // delete
    $app->group(
        '/ivf_treatment_plan',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', IvfTreatmentPlanController::class . ':list')->add(PermissionMiddleware::class)->setName('ivf_treatment_plan/list-ivf_treatment_plan-list-2'); // list
            $group->any('/add[/{id}]', IvfTreatmentPlanController::class . ':add')->add(PermissionMiddleware::class)->setName('ivf_treatment_plan/add-ivf_treatment_plan-add-2'); // add
            $group->any('/view[/{id}]', IvfTreatmentPlanController::class . ':view')->add(PermissionMiddleware::class)->setName('ivf_treatment_plan/view-ivf_treatment_plan-view-2'); // view
            $group->any('/edit[/{id}]', IvfTreatmentPlanController::class . ':edit')->add(PermissionMiddleware::class)->setName('ivf_treatment_plan/edit-ivf_treatment_plan-edit-2'); // edit
            $group->any('/delete[/{id}]', IvfTreatmentPlanController::class . ':delete')->add(PermissionMiddleware::class)->setName('ivf_treatment_plan/delete-ivf_treatment_plan-delete-2'); // delete
        }
    );

    // ivf_vitals_history
    $app->any('/IvfVitalsHistoryList[/{id}]', IvfVitalsHistoryController::class . ':list')->add(PermissionMiddleware::class)->setName('IvfVitalsHistoryList-ivf_vitals_history-list'); // list
    $app->any('/IvfVitalsHistoryAdd[/{id}]', IvfVitalsHistoryController::class . ':add')->add(PermissionMiddleware::class)->setName('IvfVitalsHistoryAdd-ivf_vitals_history-add'); // add
    $app->any('/IvfVitalsHistoryView[/{id}]', IvfVitalsHistoryController::class . ':view')->add(PermissionMiddleware::class)->setName('IvfVitalsHistoryView-ivf_vitals_history-view'); // view
    $app->any('/IvfVitalsHistoryEdit[/{id}]', IvfVitalsHistoryController::class . ':edit')->add(PermissionMiddleware::class)->setName('IvfVitalsHistoryEdit-ivf_vitals_history-edit'); // edit
    $app->any('/IvfVitalsHistoryDelete[/{id}]', IvfVitalsHistoryController::class . ':delete')->add(PermissionMiddleware::class)->setName('IvfVitalsHistoryDelete-ivf_vitals_history-delete'); // delete
    $app->group(
        '/ivf_vitals_history',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', IvfVitalsHistoryController::class . ':list')->add(PermissionMiddleware::class)->setName('ivf_vitals_history/list-ivf_vitals_history-list-2'); // list
            $group->any('/add[/{id}]', IvfVitalsHistoryController::class . ':add')->add(PermissionMiddleware::class)->setName('ivf_vitals_history/add-ivf_vitals_history-add-2'); // add
            $group->any('/view[/{id}]', IvfVitalsHistoryController::class . ':view')->add(PermissionMiddleware::class)->setName('ivf_vitals_history/view-ivf_vitals_history-view-2'); // view
            $group->any('/edit[/{id}]', IvfVitalsHistoryController::class . ':edit')->add(PermissionMiddleware::class)->setName('ivf_vitals_history/edit-ivf_vitals_history-edit-2'); // edit
            $group->any('/delete[/{id}]', IvfVitalsHistoryController::class . ':delete')->add(PermissionMiddleware::class)->setName('ivf_vitals_history/delete-ivf_vitals_history-delete-2'); // delete
        }
    );

    // ivf_vitrification
    $app->any('/IvfVitrificationList[/{id}]', IvfVitrificationController::class . ':list')->add(PermissionMiddleware::class)->setName('IvfVitrificationList-ivf_vitrification-list'); // list
    $app->any('/IvfVitrificationAdd[/{id}]', IvfVitrificationController::class . ':add')->add(PermissionMiddleware::class)->setName('IvfVitrificationAdd-ivf_vitrification-add'); // add
    $app->any('/IvfVitrificationView[/{id}]', IvfVitrificationController::class . ':view')->add(PermissionMiddleware::class)->setName('IvfVitrificationView-ivf_vitrification-view'); // view
    $app->any('/IvfVitrificationEdit[/{id}]', IvfVitrificationController::class . ':edit')->add(PermissionMiddleware::class)->setName('IvfVitrificationEdit-ivf_vitrification-edit'); // edit
    $app->any('/IvfVitrificationDelete[/{id}]', IvfVitrificationController::class . ':delete')->add(PermissionMiddleware::class)->setName('IvfVitrificationDelete-ivf_vitrification-delete'); // delete
    $app->group(
        '/ivf_vitrification',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', IvfVitrificationController::class . ':list')->add(PermissionMiddleware::class)->setName('ivf_vitrification/list-ivf_vitrification-list-2'); // list
            $group->any('/add[/{id}]', IvfVitrificationController::class . ':add')->add(PermissionMiddleware::class)->setName('ivf_vitrification/add-ivf_vitrification-add-2'); // add
            $group->any('/view[/{id}]', IvfVitrificationController::class . ':view')->add(PermissionMiddleware::class)->setName('ivf_vitrification/view-ivf_vitrification-view-2'); // view
            $group->any('/edit[/{id}]', IvfVitrificationController::class . ':edit')->add(PermissionMiddleware::class)->setName('ivf_vitrification/edit-ivf_vitrification-edit-2'); // edit
            $group->any('/delete[/{id}]', IvfVitrificationController::class . ':delete')->add(PermissionMiddleware::class)->setName('ivf_vitrification/delete-ivf_vitrification-delete-2'); // delete
        }
    );

    // lab_dept_mast
    $app->any('/LabDeptMastList[/{id}]', LabDeptMastController::class . ':list')->add(PermissionMiddleware::class)->setName('LabDeptMastList-lab_dept_mast-list'); // list
    $app->any('/LabDeptMastAdd[/{id}]', LabDeptMastController::class . ':add')->add(PermissionMiddleware::class)->setName('LabDeptMastAdd-lab_dept_mast-add'); // add
    $app->any('/LabDeptMastView[/{id}]', LabDeptMastController::class . ':view')->add(PermissionMiddleware::class)->setName('LabDeptMastView-lab_dept_mast-view'); // view
    $app->any('/LabDeptMastEdit[/{id}]', LabDeptMastController::class . ':edit')->add(PermissionMiddleware::class)->setName('LabDeptMastEdit-lab_dept_mast-edit'); // edit
    $app->any('/LabDeptMastDelete[/{id}]', LabDeptMastController::class . ':delete')->add(PermissionMiddleware::class)->setName('LabDeptMastDelete-lab_dept_mast-delete'); // delete
    $app->group(
        '/lab_dept_mast',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', LabDeptMastController::class . ':list')->add(PermissionMiddleware::class)->setName('lab_dept_mast/list-lab_dept_mast-list-2'); // list
            $group->any('/add[/{id}]', LabDeptMastController::class . ':add')->add(PermissionMiddleware::class)->setName('lab_dept_mast/add-lab_dept_mast-add-2'); // add
            $group->any('/view[/{id}]', LabDeptMastController::class . ':view')->add(PermissionMiddleware::class)->setName('lab_dept_mast/view-lab_dept_mast-view-2'); // view
            $group->any('/edit[/{id}]', LabDeptMastController::class . ':edit')->add(PermissionMiddleware::class)->setName('lab_dept_mast/edit-lab_dept_mast-edit-2'); // edit
            $group->any('/delete[/{id}]', LabDeptMastController::class . ':delete')->add(PermissionMiddleware::class)->setName('lab_dept_mast/delete-lab_dept_mast-delete-2'); // delete
        }
    );

    // lab_drug_mast
    $app->any('/LabDrugMastList[/{id}]', LabDrugMastController::class . ':list')->add(PermissionMiddleware::class)->setName('LabDrugMastList-lab_drug_mast-list'); // list
    $app->any('/LabDrugMastAdd[/{id}]', LabDrugMastController::class . ':add')->add(PermissionMiddleware::class)->setName('LabDrugMastAdd-lab_drug_mast-add'); // add
    $app->any('/LabDrugMastView[/{id}]', LabDrugMastController::class . ':view')->add(PermissionMiddleware::class)->setName('LabDrugMastView-lab_drug_mast-view'); // view
    $app->any('/LabDrugMastEdit[/{id}]', LabDrugMastController::class . ':edit')->add(PermissionMiddleware::class)->setName('LabDrugMastEdit-lab_drug_mast-edit'); // edit
    $app->any('/LabDrugMastDelete[/{id}]', LabDrugMastController::class . ':delete')->add(PermissionMiddleware::class)->setName('LabDrugMastDelete-lab_drug_mast-delete'); // delete
    $app->group(
        '/lab_drug_mast',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', LabDrugMastController::class . ':list')->add(PermissionMiddleware::class)->setName('lab_drug_mast/list-lab_drug_mast-list-2'); // list
            $group->any('/add[/{id}]', LabDrugMastController::class . ':add')->add(PermissionMiddleware::class)->setName('lab_drug_mast/add-lab_drug_mast-add-2'); // add
            $group->any('/view[/{id}]', LabDrugMastController::class . ':view')->add(PermissionMiddleware::class)->setName('lab_drug_mast/view-lab_drug_mast-view-2'); // view
            $group->any('/edit[/{id}]', LabDrugMastController::class . ':edit')->add(PermissionMiddleware::class)->setName('lab_drug_mast/edit-lab_drug_mast-edit-2'); // edit
            $group->any('/delete[/{id}]', LabDrugMastController::class . ':delete')->add(PermissionMiddleware::class)->setName('lab_drug_mast/delete-lab_drug_mast-delete-2'); // delete
        }
    );

    // lab_mas_sampletype
    $app->any('/LabMasSampletypeList[/{id}]', LabMasSampletypeController::class . ':list')->add(PermissionMiddleware::class)->setName('LabMasSampletypeList-lab_mas_sampletype-list'); // list
    $app->any('/LabMasSampletypeAdd[/{id}]', LabMasSampletypeController::class . ':add')->add(PermissionMiddleware::class)->setName('LabMasSampletypeAdd-lab_mas_sampletype-add'); // add
    $app->any('/LabMasSampletypeView[/{id}]', LabMasSampletypeController::class . ':view')->add(PermissionMiddleware::class)->setName('LabMasSampletypeView-lab_mas_sampletype-view'); // view
    $app->any('/LabMasSampletypeEdit[/{id}]', LabMasSampletypeController::class . ':edit')->add(PermissionMiddleware::class)->setName('LabMasSampletypeEdit-lab_mas_sampletype-edit'); // edit
    $app->any('/LabMasSampletypeDelete[/{id}]', LabMasSampletypeController::class . ':delete')->add(PermissionMiddleware::class)->setName('LabMasSampletypeDelete-lab_mas_sampletype-delete'); // delete
    $app->group(
        '/lab_mas_sampletype',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', LabMasSampletypeController::class . ':list')->add(PermissionMiddleware::class)->setName('lab_mas_sampletype/list-lab_mas_sampletype-list-2'); // list
            $group->any('/add[/{id}]', LabMasSampletypeController::class . ':add')->add(PermissionMiddleware::class)->setName('lab_mas_sampletype/add-lab_mas_sampletype-add-2'); // add
            $group->any('/view[/{id}]', LabMasSampletypeController::class . ':view')->add(PermissionMiddleware::class)->setName('lab_mas_sampletype/view-lab_mas_sampletype-view-2'); // view
            $group->any('/edit[/{id}]', LabMasSampletypeController::class . ':edit')->add(PermissionMiddleware::class)->setName('lab_mas_sampletype/edit-lab_mas_sampletype-edit-2'); // edit
            $group->any('/delete[/{id}]', LabMasSampletypeController::class . ':delete')->add(PermissionMiddleware::class)->setName('lab_mas_sampletype/delete-lab_mas_sampletype-delete-2'); // delete
        }
    );

    // lab_profile_details
    $app->any('/LabProfileDetailsList[/{id}]', LabProfileDetailsController::class . ':list')->add(PermissionMiddleware::class)->setName('LabProfileDetailsList-lab_profile_details-list'); // list
    $app->any('/LabProfileDetailsAdd[/{id}]', LabProfileDetailsController::class . ':add')->add(PermissionMiddleware::class)->setName('LabProfileDetailsAdd-lab_profile_details-add'); // add
    $app->any('/LabProfileDetailsView[/{id}]', LabProfileDetailsController::class . ':view')->add(PermissionMiddleware::class)->setName('LabProfileDetailsView-lab_profile_details-view'); // view
    $app->any('/LabProfileDetailsEdit[/{id}]', LabProfileDetailsController::class . ':edit')->add(PermissionMiddleware::class)->setName('LabProfileDetailsEdit-lab_profile_details-edit'); // edit
    $app->any('/LabProfileDetailsDelete[/{id}]', LabProfileDetailsController::class . ':delete')->add(PermissionMiddleware::class)->setName('LabProfileDetailsDelete-lab_profile_details-delete'); // delete
    $app->group(
        '/lab_profile_details',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', LabProfileDetailsController::class . ':list')->add(PermissionMiddleware::class)->setName('lab_profile_details/list-lab_profile_details-list-2'); // list
            $group->any('/add[/{id}]', LabProfileDetailsController::class . ':add')->add(PermissionMiddleware::class)->setName('lab_profile_details/add-lab_profile_details-add-2'); // add
            $group->any('/view[/{id}]', LabProfileDetailsController::class . ':view')->add(PermissionMiddleware::class)->setName('lab_profile_details/view-lab_profile_details-view-2'); // view
            $group->any('/edit[/{id}]', LabProfileDetailsController::class . ':edit')->add(PermissionMiddleware::class)->setName('lab_profile_details/edit-lab_profile_details-edit-2'); // edit
            $group->any('/delete[/{id}]', LabProfileDetailsController::class . ':delete')->add(PermissionMiddleware::class)->setName('lab_profile_details/delete-lab_profile_details-delete-2'); // delete
        }
    );

    // lab_profile_master
    $app->any('/LabProfileMasterList[/{id}]', LabProfileMasterController::class . ':list')->add(PermissionMiddleware::class)->setName('LabProfileMasterList-lab_profile_master-list'); // list
    $app->any('/LabProfileMasterAdd[/{id}]', LabProfileMasterController::class . ':add')->add(PermissionMiddleware::class)->setName('LabProfileMasterAdd-lab_profile_master-add'); // add
    $app->any('/LabProfileMasterView[/{id}]', LabProfileMasterController::class . ':view')->add(PermissionMiddleware::class)->setName('LabProfileMasterView-lab_profile_master-view'); // view
    $app->any('/LabProfileMasterEdit[/{id}]', LabProfileMasterController::class . ':edit')->add(PermissionMiddleware::class)->setName('LabProfileMasterEdit-lab_profile_master-edit'); // edit
    $app->any('/LabProfileMasterDelete[/{id}]', LabProfileMasterController::class . ':delete')->add(PermissionMiddleware::class)->setName('LabProfileMasterDelete-lab_profile_master-delete'); // delete
    $app->group(
        '/lab_profile_master',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', LabProfileMasterController::class . ':list')->add(PermissionMiddleware::class)->setName('lab_profile_master/list-lab_profile_master-list-2'); // list
            $group->any('/add[/{id}]', LabProfileMasterController::class . ':add')->add(PermissionMiddleware::class)->setName('lab_profile_master/add-lab_profile_master-add-2'); // add
            $group->any('/view[/{id}]', LabProfileMasterController::class . ':view')->add(PermissionMiddleware::class)->setName('lab_profile_master/view-lab_profile_master-view-2'); // view
            $group->any('/edit[/{id}]', LabProfileMasterController::class . ':edit')->add(PermissionMiddleware::class)->setName('lab_profile_master/edit-lab_profile_master-edit-2'); // edit
            $group->any('/delete[/{id}]', LabProfileMasterController::class . ':delete')->add(PermissionMiddleware::class)->setName('lab_profile_master/delete-lab_profile_master-delete-2'); // delete
        }
    );

    // lab_sepcimen_mast
    $app->any('/LabSepcimenMastList[/{id}]', LabSepcimenMastController::class . ':list')->add(PermissionMiddleware::class)->setName('LabSepcimenMastList-lab_sepcimen_mast-list'); // list
    $app->any('/LabSepcimenMastAdd[/{id}]', LabSepcimenMastController::class . ':add')->add(PermissionMiddleware::class)->setName('LabSepcimenMastAdd-lab_sepcimen_mast-add'); // add
    $app->any('/LabSepcimenMastView[/{id}]', LabSepcimenMastController::class . ':view')->add(PermissionMiddleware::class)->setName('LabSepcimenMastView-lab_sepcimen_mast-view'); // view
    $app->any('/LabSepcimenMastEdit[/{id}]', LabSepcimenMastController::class . ':edit')->add(PermissionMiddleware::class)->setName('LabSepcimenMastEdit-lab_sepcimen_mast-edit'); // edit
    $app->any('/LabSepcimenMastDelete[/{id}]', LabSepcimenMastController::class . ':delete')->add(PermissionMiddleware::class)->setName('LabSepcimenMastDelete-lab_sepcimen_mast-delete'); // delete
    $app->group(
        '/lab_sepcimen_mast',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', LabSepcimenMastController::class . ':list')->add(PermissionMiddleware::class)->setName('lab_sepcimen_mast/list-lab_sepcimen_mast-list-2'); // list
            $group->any('/add[/{id}]', LabSepcimenMastController::class . ':add')->add(PermissionMiddleware::class)->setName('lab_sepcimen_mast/add-lab_sepcimen_mast-add-2'); // add
            $group->any('/view[/{id}]', LabSepcimenMastController::class . ':view')->add(PermissionMiddleware::class)->setName('lab_sepcimen_mast/view-lab_sepcimen_mast-view-2'); // view
            $group->any('/edit[/{id}]', LabSepcimenMastController::class . ':edit')->add(PermissionMiddleware::class)->setName('lab_sepcimen_mast/edit-lab_sepcimen_mast-edit-2'); // edit
            $group->any('/delete[/{id}]', LabSepcimenMastController::class . ':delete')->add(PermissionMiddleware::class)->setName('lab_sepcimen_mast/delete-lab_sepcimen_mast-delete-2'); // delete
        }
    );

    // lab_test_master
    $app->any('/LabTestMasterList[/{id}]', LabTestMasterController::class . ':list')->add(PermissionMiddleware::class)->setName('LabTestMasterList-lab_test_master-list'); // list
    $app->any('/LabTestMasterAdd[/{id}]', LabTestMasterController::class . ':add')->add(PermissionMiddleware::class)->setName('LabTestMasterAdd-lab_test_master-add'); // add
    $app->any('/LabTestMasterView[/{id}]', LabTestMasterController::class . ':view')->add(PermissionMiddleware::class)->setName('LabTestMasterView-lab_test_master-view'); // view
    $app->any('/LabTestMasterEdit[/{id}]', LabTestMasterController::class . ':edit')->add(PermissionMiddleware::class)->setName('LabTestMasterEdit-lab_test_master-edit'); // edit
    $app->any('/LabTestMasterDelete[/{id}]', LabTestMasterController::class . ':delete')->add(PermissionMiddleware::class)->setName('LabTestMasterDelete-lab_test_master-delete'); // delete
    $app->group(
        '/lab_test_master',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', LabTestMasterController::class . ':list')->add(PermissionMiddleware::class)->setName('lab_test_master/list-lab_test_master-list-2'); // list
            $group->any('/add[/{id}]', LabTestMasterController::class . ':add')->add(PermissionMiddleware::class)->setName('lab_test_master/add-lab_test_master-add-2'); // add
            $group->any('/view[/{id}]', LabTestMasterController::class . ':view')->add(PermissionMiddleware::class)->setName('lab_test_master/view-lab_test_master-view-2'); // view
            $group->any('/edit[/{id}]', LabTestMasterController::class . ':edit')->add(PermissionMiddleware::class)->setName('lab_test_master/edit-lab_test_master-edit-2'); // edit
            $group->any('/delete[/{id}]', LabTestMasterController::class . ':delete')->add(PermissionMiddleware::class)->setName('lab_test_master/delete-lab_test_master-delete-2'); // delete
        }
    );

    // lab_test_result
    $app->any('/LabTestResultList', LabTestResultController::class . ':list')->add(PermissionMiddleware::class)->setName('LabTestResultList-lab_test_result-list'); // list
    $app->group(
        '/lab_test_result',
        function (RouteCollectorProxy $group) {
            $group->any('/list', LabTestResultController::class . ':list')->add(PermissionMiddleware::class)->setName('lab_test_result/list-lab_test_result-list-2'); // list
        }
    );

    // lab_unit_mast
    $app->any('/LabUnitMastList[/{id}]', LabUnitMastController::class . ':list')->add(PermissionMiddleware::class)->setName('LabUnitMastList-lab_unit_mast-list'); // list
    $app->any('/LabUnitMastAdd[/{id}]', LabUnitMastController::class . ':add')->add(PermissionMiddleware::class)->setName('LabUnitMastAdd-lab_unit_mast-add'); // add
    $app->any('/LabUnitMastView[/{id}]', LabUnitMastController::class . ':view')->add(PermissionMiddleware::class)->setName('LabUnitMastView-lab_unit_mast-view'); // view
    $app->any('/LabUnitMastEdit[/{id}]', LabUnitMastController::class . ':edit')->add(PermissionMiddleware::class)->setName('LabUnitMastEdit-lab_unit_mast-edit'); // edit
    $app->any('/LabUnitMastDelete[/{id}]', LabUnitMastController::class . ':delete')->add(PermissionMiddleware::class)->setName('LabUnitMastDelete-lab_unit_mast-delete'); // delete
    $app->group(
        '/lab_unit_mast',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', LabUnitMastController::class . ':list')->add(PermissionMiddleware::class)->setName('lab_unit_mast/list-lab_unit_mast-list-2'); // list
            $group->any('/add[/{id}]', LabUnitMastController::class . ':add')->add(PermissionMiddleware::class)->setName('lab_unit_mast/add-lab_unit_mast-add-2'); // add
            $group->any('/view[/{id}]', LabUnitMastController::class . ':view')->add(PermissionMiddleware::class)->setName('lab_unit_mast/view-lab_unit_mast-view-2'); // view
            $group->any('/edit[/{id}]', LabUnitMastController::class . ':edit')->add(PermissionMiddleware::class)->setName('lab_unit_mast/edit-lab_unit_mast-edit-2'); // edit
            $group->any('/delete[/{id}]', LabUnitMastController::class . ':delete')->add(PermissionMiddleware::class)->setName('lab_unit_mast/delete-lab_unit_mast-delete-2'); // delete
        }
    );

    // mas_activity_card
    $app->any('/MasActivityCardList[/{id}]', MasActivityCardController::class . ':list')->add(PermissionMiddleware::class)->setName('MasActivityCardList-mas_activity_card-list'); // list
    $app->any('/MasActivityCardAdd[/{id}]', MasActivityCardController::class . ':add')->add(PermissionMiddleware::class)->setName('MasActivityCardAdd-mas_activity_card-add'); // add
    $app->any('/MasActivityCardView[/{id}]', MasActivityCardController::class . ':view')->add(PermissionMiddleware::class)->setName('MasActivityCardView-mas_activity_card-view'); // view
    $app->any('/MasActivityCardEdit[/{id}]', MasActivityCardController::class . ':edit')->add(PermissionMiddleware::class)->setName('MasActivityCardEdit-mas_activity_card-edit'); // edit
    $app->any('/MasActivityCardDelete[/{id}]', MasActivityCardController::class . ':delete')->add(PermissionMiddleware::class)->setName('MasActivityCardDelete-mas_activity_card-delete'); // delete
    $app->group(
        '/mas_activity_card',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', MasActivityCardController::class . ':list')->add(PermissionMiddleware::class)->setName('mas_activity_card/list-mas_activity_card-list-2'); // list
            $group->any('/add[/{id}]', MasActivityCardController::class . ':add')->add(PermissionMiddleware::class)->setName('mas_activity_card/add-mas_activity_card-add-2'); // add
            $group->any('/view[/{id}]', MasActivityCardController::class . ':view')->add(PermissionMiddleware::class)->setName('mas_activity_card/view-mas_activity_card-view-2'); // view
            $group->any('/edit[/{id}]', MasActivityCardController::class . ':edit')->add(PermissionMiddleware::class)->setName('mas_activity_card/edit-mas_activity_card-edit-2'); // edit
            $group->any('/delete[/{id}]', MasActivityCardController::class . ':delete')->add(PermissionMiddleware::class)->setName('mas_activity_card/delete-mas_activity_card-delete-2'); // delete
        }
    );

    // mas_billing_department
    $app->any('/MasBillingDepartmentList[/{id}]', MasBillingDepartmentController::class . ':list')->add(PermissionMiddleware::class)->setName('MasBillingDepartmentList-mas_billing_department-list'); // list
    $app->any('/MasBillingDepartmentAdd[/{id}]', MasBillingDepartmentController::class . ':add')->add(PermissionMiddleware::class)->setName('MasBillingDepartmentAdd-mas_billing_department-add'); // add
    $app->any('/MasBillingDepartmentView[/{id}]', MasBillingDepartmentController::class . ':view')->add(PermissionMiddleware::class)->setName('MasBillingDepartmentView-mas_billing_department-view'); // view
    $app->any('/MasBillingDepartmentEdit[/{id}]', MasBillingDepartmentController::class . ':edit')->add(PermissionMiddleware::class)->setName('MasBillingDepartmentEdit-mas_billing_department-edit'); // edit
    $app->any('/MasBillingDepartmentDelete[/{id}]', MasBillingDepartmentController::class . ':delete')->add(PermissionMiddleware::class)->setName('MasBillingDepartmentDelete-mas_billing_department-delete'); // delete
    $app->group(
        '/mas_billing_department',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', MasBillingDepartmentController::class . ':list')->add(PermissionMiddleware::class)->setName('mas_billing_department/list-mas_billing_department-list-2'); // list
            $group->any('/add[/{id}]', MasBillingDepartmentController::class . ':add')->add(PermissionMiddleware::class)->setName('mas_billing_department/add-mas_billing_department-add-2'); // add
            $group->any('/view[/{id}]', MasBillingDepartmentController::class . ':view')->add(PermissionMiddleware::class)->setName('mas_billing_department/view-mas_billing_department-view-2'); // view
            $group->any('/edit[/{id}]', MasBillingDepartmentController::class . ':edit')->add(PermissionMiddleware::class)->setName('mas_billing_department/edit-mas_billing_department-edit-2'); // edit
            $group->any('/delete[/{id}]', MasBillingDepartmentController::class . ':delete')->add(PermissionMiddleware::class)->setName('mas_billing_department/delete-mas_billing_department-delete-2'); // delete
        }
    );

    // mas_bloodgroup
    $app->any('/MasBloodgroupList[/{id}]', MasBloodgroupController::class . ':list')->add(PermissionMiddleware::class)->setName('MasBloodgroupList-mas_bloodgroup-list'); // list
    $app->any('/MasBloodgroupAdd[/{id}]', MasBloodgroupController::class . ':add')->add(PermissionMiddleware::class)->setName('MasBloodgroupAdd-mas_bloodgroup-add'); // add
    $app->any('/MasBloodgroupView[/{id}]', MasBloodgroupController::class . ':view')->add(PermissionMiddleware::class)->setName('MasBloodgroupView-mas_bloodgroup-view'); // view
    $app->any('/MasBloodgroupEdit[/{id}]', MasBloodgroupController::class . ':edit')->add(PermissionMiddleware::class)->setName('MasBloodgroupEdit-mas_bloodgroup-edit'); // edit
    $app->any('/MasBloodgroupDelete[/{id}]', MasBloodgroupController::class . ':delete')->add(PermissionMiddleware::class)->setName('MasBloodgroupDelete-mas_bloodgroup-delete'); // delete
    $app->group(
        '/mas_bloodgroup',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', MasBloodgroupController::class . ':list')->add(PermissionMiddleware::class)->setName('mas_bloodgroup/list-mas_bloodgroup-list-2'); // list
            $group->any('/add[/{id}]', MasBloodgroupController::class . ':add')->add(PermissionMiddleware::class)->setName('mas_bloodgroup/add-mas_bloodgroup-add-2'); // add
            $group->any('/view[/{id}]', MasBloodgroupController::class . ':view')->add(PermissionMiddleware::class)->setName('mas_bloodgroup/view-mas_bloodgroup-view-2'); // view
            $group->any('/edit[/{id}]', MasBloodgroupController::class . ':edit')->add(PermissionMiddleware::class)->setName('mas_bloodgroup/edit-mas_bloodgroup-edit-2'); // edit
            $group->any('/delete[/{id}]', MasBloodgroupController::class . ':delete')->add(PermissionMiddleware::class)->setName('mas_bloodgroup/delete-mas_bloodgroup-delete-2'); // delete
        }
    );

    // mas_category
    $app->any('/MasCategoryList[/{id}]', MasCategoryController::class . ':list')->add(PermissionMiddleware::class)->setName('MasCategoryList-mas_category-list'); // list
    $app->any('/MasCategoryAdd[/{id}]', MasCategoryController::class . ':add')->add(PermissionMiddleware::class)->setName('MasCategoryAdd-mas_category-add'); // add
    $app->any('/MasCategoryView[/{id}]', MasCategoryController::class . ':view')->add(PermissionMiddleware::class)->setName('MasCategoryView-mas_category-view'); // view
    $app->any('/MasCategoryEdit[/{id}]', MasCategoryController::class . ':edit')->add(PermissionMiddleware::class)->setName('MasCategoryEdit-mas_category-edit'); // edit
    $app->any('/MasCategoryDelete[/{id}]', MasCategoryController::class . ':delete')->add(PermissionMiddleware::class)->setName('MasCategoryDelete-mas_category-delete'); // delete
    $app->group(
        '/mas_category',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', MasCategoryController::class . ':list')->add(PermissionMiddleware::class)->setName('mas_category/list-mas_category-list-2'); // list
            $group->any('/add[/{id}]', MasCategoryController::class . ':add')->add(PermissionMiddleware::class)->setName('mas_category/add-mas_category-add-2'); // add
            $group->any('/view[/{id}]', MasCategoryController::class . ':view')->add(PermissionMiddleware::class)->setName('mas_category/view-mas_category-view-2'); // view
            $group->any('/edit[/{id}]', MasCategoryController::class . ':edit')->add(PermissionMiddleware::class)->setName('mas_category/edit-mas_category-edit-2'); // edit
            $group->any('/delete[/{id}]', MasCategoryController::class . ':delete')->add(PermissionMiddleware::class)->setName('mas_category/delete-mas_category-delete-2'); // delete
        }
    );

    // mas_clinicaldetails
    $app->any('/MasClinicaldetailsList[/{id}]', MasClinicaldetailsController::class . ':list')->add(PermissionMiddleware::class)->setName('MasClinicaldetailsList-mas_clinicaldetails-list'); // list
    $app->any('/MasClinicaldetailsAdd[/{id}]', MasClinicaldetailsController::class . ':add')->add(PermissionMiddleware::class)->setName('MasClinicaldetailsAdd-mas_clinicaldetails-add'); // add
    $app->any('/MasClinicaldetailsView[/{id}]', MasClinicaldetailsController::class . ':view')->add(PermissionMiddleware::class)->setName('MasClinicaldetailsView-mas_clinicaldetails-view'); // view
    $app->any('/MasClinicaldetailsEdit[/{id}]', MasClinicaldetailsController::class . ':edit')->add(PermissionMiddleware::class)->setName('MasClinicaldetailsEdit-mas_clinicaldetails-edit'); // edit
    $app->any('/MasClinicaldetailsDelete[/{id}]', MasClinicaldetailsController::class . ':delete')->add(PermissionMiddleware::class)->setName('MasClinicaldetailsDelete-mas_clinicaldetails-delete'); // delete
    $app->group(
        '/mas_clinicaldetails',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', MasClinicaldetailsController::class . ':list')->add(PermissionMiddleware::class)->setName('mas_clinicaldetails/list-mas_clinicaldetails-list-2'); // list
            $group->any('/add[/{id}]', MasClinicaldetailsController::class . ':add')->add(PermissionMiddleware::class)->setName('mas_clinicaldetails/add-mas_clinicaldetails-add-2'); // add
            $group->any('/view[/{id}]', MasClinicaldetailsController::class . ':view')->add(PermissionMiddleware::class)->setName('mas_clinicaldetails/view-mas_clinicaldetails-view-2'); // view
            $group->any('/edit[/{id}]', MasClinicaldetailsController::class . ':edit')->add(PermissionMiddleware::class)->setName('mas_clinicaldetails/edit-mas_clinicaldetails-edit-2'); // edit
            $group->any('/delete[/{id}]', MasClinicaldetailsController::class . ':delete')->add(PermissionMiddleware::class)->setName('mas_clinicaldetails/delete-mas_clinicaldetails-delete-2'); // delete
        }
    );

    // mas_degree
    $app->any('/MasDegreeList[/{id}]', MasDegreeController::class . ':list')->add(PermissionMiddleware::class)->setName('MasDegreeList-mas_degree-list'); // list
    $app->any('/MasDegreeAdd[/{id}]', MasDegreeController::class . ':add')->add(PermissionMiddleware::class)->setName('MasDegreeAdd-mas_degree-add'); // add
    $app->any('/MasDegreeView[/{id}]', MasDegreeController::class . ':view')->add(PermissionMiddleware::class)->setName('MasDegreeView-mas_degree-view'); // view
    $app->any('/MasDegreeEdit[/{id}]', MasDegreeController::class . ':edit')->add(PermissionMiddleware::class)->setName('MasDegreeEdit-mas_degree-edit'); // edit
    $app->any('/MasDegreeDelete[/{id}]', MasDegreeController::class . ':delete')->add(PermissionMiddleware::class)->setName('MasDegreeDelete-mas_degree-delete'); // delete
    $app->group(
        '/mas_degree',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', MasDegreeController::class . ':list')->add(PermissionMiddleware::class)->setName('mas_degree/list-mas_degree-list-2'); // list
            $group->any('/add[/{id}]', MasDegreeController::class . ':add')->add(PermissionMiddleware::class)->setName('mas_degree/add-mas_degree-add-2'); // add
            $group->any('/view[/{id}]', MasDegreeController::class . ':view')->add(PermissionMiddleware::class)->setName('mas_degree/view-mas_degree-view-2'); // view
            $group->any('/edit[/{id}]', MasDegreeController::class . ':edit')->add(PermissionMiddleware::class)->setName('mas_degree/edit-mas_degree-edit-2'); // edit
            $group->any('/delete[/{id}]', MasDegreeController::class . ':delete')->add(PermissionMiddleware::class)->setName('mas_degree/delete-mas_degree-delete-2'); // delete
        }
    );

    // mas_document
    $app->any('/MasDocumentList[/{id}]', MasDocumentController::class . ':list')->add(PermissionMiddleware::class)->setName('MasDocumentList-mas_document-list'); // list
    $app->any('/MasDocumentAdd[/{id}]', MasDocumentController::class . ':add')->add(PermissionMiddleware::class)->setName('MasDocumentAdd-mas_document-add'); // add
    $app->any('/MasDocumentView[/{id}]', MasDocumentController::class . ':view')->add(PermissionMiddleware::class)->setName('MasDocumentView-mas_document-view'); // view
    $app->any('/MasDocumentEdit[/{id}]', MasDocumentController::class . ':edit')->add(PermissionMiddleware::class)->setName('MasDocumentEdit-mas_document-edit'); // edit
    $app->any('/MasDocumentDelete[/{id}]', MasDocumentController::class . ':delete')->add(PermissionMiddleware::class)->setName('MasDocumentDelete-mas_document-delete'); // delete
    $app->group(
        '/mas_document',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', MasDocumentController::class . ':list')->add(PermissionMiddleware::class)->setName('mas_document/list-mas_document-list-2'); // list
            $group->any('/add[/{id}]', MasDocumentController::class . ':add')->add(PermissionMiddleware::class)->setName('mas_document/add-mas_document-add-2'); // add
            $group->any('/view[/{id}]', MasDocumentController::class . ':view')->add(PermissionMiddleware::class)->setName('mas_document/view-mas_document-view-2'); // view
            $group->any('/edit[/{id}]', MasDocumentController::class . ':edit')->add(PermissionMiddleware::class)->setName('mas_document/edit-mas_document-edit-2'); // edit
            $group->any('/delete[/{id}]', MasDocumentController::class . ':delete')->add(PermissionMiddleware::class)->setName('mas_document/delete-mas_document-delete-2'); // delete
        }
    );

    // mas_employee_role_job_description
    $app->any('/MasEmployeeRoleJobDescriptionList[/{id}]', MasEmployeeRoleJobDescriptionController::class . ':list')->add(PermissionMiddleware::class)->setName('MasEmployeeRoleJobDescriptionList-mas_employee_role_job_description-list'); // list
    $app->any('/MasEmployeeRoleJobDescriptionAdd[/{id}]', MasEmployeeRoleJobDescriptionController::class . ':add')->add(PermissionMiddleware::class)->setName('MasEmployeeRoleJobDescriptionAdd-mas_employee_role_job_description-add'); // add
    $app->any('/MasEmployeeRoleJobDescriptionView[/{id}]', MasEmployeeRoleJobDescriptionController::class . ':view')->add(PermissionMiddleware::class)->setName('MasEmployeeRoleJobDescriptionView-mas_employee_role_job_description-view'); // view
    $app->any('/MasEmployeeRoleJobDescriptionEdit[/{id}]', MasEmployeeRoleJobDescriptionController::class . ':edit')->add(PermissionMiddleware::class)->setName('MasEmployeeRoleJobDescriptionEdit-mas_employee_role_job_description-edit'); // edit
    $app->any('/MasEmployeeRoleJobDescriptionDelete[/{id}]', MasEmployeeRoleJobDescriptionController::class . ':delete')->add(PermissionMiddleware::class)->setName('MasEmployeeRoleJobDescriptionDelete-mas_employee_role_job_description-delete'); // delete
    $app->group(
        '/mas_employee_role_job_description',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', MasEmployeeRoleJobDescriptionController::class . ':list')->add(PermissionMiddleware::class)->setName('mas_employee_role_job_description/list-mas_employee_role_job_description-list-2'); // list
            $group->any('/add[/{id}]', MasEmployeeRoleJobDescriptionController::class . ':add')->add(PermissionMiddleware::class)->setName('mas_employee_role_job_description/add-mas_employee_role_job_description-add-2'); // add
            $group->any('/view[/{id}]', MasEmployeeRoleJobDescriptionController::class . ':view')->add(PermissionMiddleware::class)->setName('mas_employee_role_job_description/view-mas_employee_role_job_description-view-2'); // view
            $group->any('/edit[/{id}]', MasEmployeeRoleJobDescriptionController::class . ':edit')->add(PermissionMiddleware::class)->setName('mas_employee_role_job_description/edit-mas_employee_role_job_description-edit-2'); // edit
            $group->any('/delete[/{id}]', MasEmployeeRoleJobDescriptionController::class . ':delete')->add(PermissionMiddleware::class)->setName('mas_employee_role_job_description/delete-mas_employee_role_job_description-delete-2'); // delete
        }
    );

    // mas_job
    $app->any('/MasJobList[/{id}]', MasJobController::class . ':list')->add(PermissionMiddleware::class)->setName('MasJobList-mas_job-list'); // list
    $app->any('/MasJobAdd[/{id}]', MasJobController::class . ':add')->add(PermissionMiddleware::class)->setName('MasJobAdd-mas_job-add'); // add
    $app->any('/MasJobView[/{id}]', MasJobController::class . ':view')->add(PermissionMiddleware::class)->setName('MasJobView-mas_job-view'); // view
    $app->any('/MasJobEdit[/{id}]', MasJobController::class . ':edit')->add(PermissionMiddleware::class)->setName('MasJobEdit-mas_job-edit'); // edit
    $app->any('/MasJobDelete[/{id}]', MasJobController::class . ':delete')->add(PermissionMiddleware::class)->setName('MasJobDelete-mas_job-delete'); // delete
    $app->group(
        '/mas_job',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', MasJobController::class . ':list')->add(PermissionMiddleware::class)->setName('mas_job/list-mas_job-list-2'); // list
            $group->any('/add[/{id}]', MasJobController::class . ':add')->add(PermissionMiddleware::class)->setName('mas_job/add-mas_job-add-2'); // add
            $group->any('/view[/{id}]', MasJobController::class . ':view')->add(PermissionMiddleware::class)->setName('mas_job/view-mas_job-view-2'); // view
            $group->any('/edit[/{id}]', MasJobController::class . ':edit')->add(PermissionMiddleware::class)->setName('mas_job/edit-mas_job-edit-2'); // edit
            $group->any('/delete[/{id}]', MasJobController::class . ':delete')->add(PermissionMiddleware::class)->setName('mas_job/delete-mas_job-delete-2'); // delete
        }
    );

    // mas_lab_services_type
    $app->any('/MasLabServicesTypeList[/{id}]', MasLabServicesTypeController::class . ':list')->add(PermissionMiddleware::class)->setName('MasLabServicesTypeList-mas_lab_services_type-list'); // list
    $app->any('/MasLabServicesTypeAdd[/{id}]', MasLabServicesTypeController::class . ':add')->add(PermissionMiddleware::class)->setName('MasLabServicesTypeAdd-mas_lab_services_type-add'); // add
    $app->any('/MasLabServicesTypeView[/{id}]', MasLabServicesTypeController::class . ':view')->add(PermissionMiddleware::class)->setName('MasLabServicesTypeView-mas_lab_services_type-view'); // view
    $app->any('/MasLabServicesTypeEdit[/{id}]', MasLabServicesTypeController::class . ':edit')->add(PermissionMiddleware::class)->setName('MasLabServicesTypeEdit-mas_lab_services_type-edit'); // edit
    $app->any('/MasLabServicesTypeDelete[/{id}]', MasLabServicesTypeController::class . ':delete')->add(PermissionMiddleware::class)->setName('MasLabServicesTypeDelete-mas_lab_services_type-delete'); // delete
    $app->group(
        '/mas_lab_services_type',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', MasLabServicesTypeController::class . ':list')->add(PermissionMiddleware::class)->setName('mas_lab_services_type/list-mas_lab_services_type-list-2'); // list
            $group->any('/add[/{id}]', MasLabServicesTypeController::class . ':add')->add(PermissionMiddleware::class)->setName('mas_lab_services_type/add-mas_lab_services_type-add-2'); // add
            $group->any('/view[/{id}]', MasLabServicesTypeController::class . ':view')->add(PermissionMiddleware::class)->setName('mas_lab_services_type/view-mas_lab_services_type-view-2'); // view
            $group->any('/edit[/{id}]', MasLabServicesTypeController::class . ':edit')->add(PermissionMiddleware::class)->setName('mas_lab_services_type/edit-mas_lab_services_type-edit-2'); // edit
            $group->any('/delete[/{id}]', MasLabServicesTypeController::class . ':delete')->add(PermissionMiddleware::class)->setName('mas_lab_services_type/delete-mas_lab_services_type-delete-2'); // delete
        }
    );

    // mas_language
    $app->any('/MasLanguageList[/{id}]', MasLanguageController::class . ':list')->add(PermissionMiddleware::class)->setName('MasLanguageList-mas_language-list'); // list
    $app->any('/MasLanguageAdd[/{id}]', MasLanguageController::class . ':add')->add(PermissionMiddleware::class)->setName('MasLanguageAdd-mas_language-add'); // add
    $app->any('/MasLanguageView[/{id}]', MasLanguageController::class . ':view')->add(PermissionMiddleware::class)->setName('MasLanguageView-mas_language-view'); // view
    $app->any('/MasLanguageEdit[/{id}]', MasLanguageController::class . ':edit')->add(PermissionMiddleware::class)->setName('MasLanguageEdit-mas_language-edit'); // edit
    $app->any('/MasLanguageDelete[/{id}]', MasLanguageController::class . ':delete')->add(PermissionMiddleware::class)->setName('MasLanguageDelete-mas_language-delete'); // delete
    $app->group(
        '/mas_language',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', MasLanguageController::class . ':list')->add(PermissionMiddleware::class)->setName('mas_language/list-mas_language-list-2'); // list
            $group->any('/add[/{id}]', MasLanguageController::class . ':add')->add(PermissionMiddleware::class)->setName('mas_language/add-mas_language-add-2'); // add
            $group->any('/view[/{id}]', MasLanguageController::class . ':view')->add(PermissionMiddleware::class)->setName('mas_language/view-mas_language-view-2'); // view
            $group->any('/edit[/{id}]', MasLanguageController::class . ':edit')->add(PermissionMiddleware::class)->setName('mas_language/edit-mas_language-edit-2'); // edit
            $group->any('/delete[/{id}]', MasLanguageController::class . ':delete')->add(PermissionMiddleware::class)->setName('mas_language/delete-mas_language-delete-2'); // delete
        }
    );

    // mas_marital_status
    $app->any('/MasMaritalStatusList[/{id}]', MasMaritalStatusController::class . ':list')->add(PermissionMiddleware::class)->setName('MasMaritalStatusList-mas_marital_status-list'); // list
    $app->any('/MasMaritalStatusAdd[/{id}]', MasMaritalStatusController::class . ':add')->add(PermissionMiddleware::class)->setName('MasMaritalStatusAdd-mas_marital_status-add'); // add
    $app->any('/MasMaritalStatusView[/{id}]', MasMaritalStatusController::class . ':view')->add(PermissionMiddleware::class)->setName('MasMaritalStatusView-mas_marital_status-view'); // view
    $app->any('/MasMaritalStatusEdit[/{id}]', MasMaritalStatusController::class . ':edit')->add(PermissionMiddleware::class)->setName('MasMaritalStatusEdit-mas_marital_status-edit'); // edit
    $app->any('/MasMaritalStatusDelete[/{id}]', MasMaritalStatusController::class . ':delete')->add(PermissionMiddleware::class)->setName('MasMaritalStatusDelete-mas_marital_status-delete'); // delete
    $app->group(
        '/mas_marital_status',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', MasMaritalStatusController::class . ':list')->add(PermissionMiddleware::class)->setName('mas_marital_status/list-mas_marital_status-list-2'); // list
            $group->any('/add[/{id}]', MasMaritalStatusController::class . ':add')->add(PermissionMiddleware::class)->setName('mas_marital_status/add-mas_marital_status-add-2'); // add
            $group->any('/view[/{id}]', MasMaritalStatusController::class . ':view')->add(PermissionMiddleware::class)->setName('mas_marital_status/view-mas_marital_status-view-2'); // view
            $group->any('/edit[/{id}]', MasMaritalStatusController::class . ':edit')->add(PermissionMiddleware::class)->setName('mas_marital_status/edit-mas_marital_status-edit-2'); // edit
            $group->any('/delete[/{id}]', MasMaritalStatusController::class . ':delete')->add(PermissionMiddleware::class)->setName('mas_marital_status/delete-mas_marital_status-delete-2'); // delete
        }
    );

    // mas_modepayment
    $app->any('/MasModepaymentList[/{id}]', MasModepaymentController::class . ':list')->add(PermissionMiddleware::class)->setName('MasModepaymentList-mas_modepayment-list'); // list
    $app->any('/MasModepaymentAdd[/{id}]', MasModepaymentController::class . ':add')->add(PermissionMiddleware::class)->setName('MasModepaymentAdd-mas_modepayment-add'); // add
    $app->any('/MasModepaymentView[/{id}]', MasModepaymentController::class . ':view')->add(PermissionMiddleware::class)->setName('MasModepaymentView-mas_modepayment-view'); // view
    $app->any('/MasModepaymentEdit[/{id}]', MasModepaymentController::class . ':edit')->add(PermissionMiddleware::class)->setName('MasModepaymentEdit-mas_modepayment-edit'); // edit
    $app->any('/MasModepaymentDelete[/{id}]', MasModepaymentController::class . ':delete')->add(PermissionMiddleware::class)->setName('MasModepaymentDelete-mas_modepayment-delete'); // delete
    $app->group(
        '/mas_modepayment',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', MasModepaymentController::class . ':list')->add(PermissionMiddleware::class)->setName('mas_modepayment/list-mas_modepayment-list-2'); // list
            $group->any('/add[/{id}]', MasModepaymentController::class . ':add')->add(PermissionMiddleware::class)->setName('mas_modepayment/add-mas_modepayment-add-2'); // add
            $group->any('/view[/{id}]', MasModepaymentController::class . ':view')->add(PermissionMiddleware::class)->setName('mas_modepayment/view-mas_modepayment-view-2'); // view
            $group->any('/edit[/{id}]', MasModepaymentController::class . ':edit')->add(PermissionMiddleware::class)->setName('mas_modepayment/edit-mas_modepayment-edit-2'); // edit
            $group->any('/delete[/{id}]', MasModepaymentController::class . ':delete')->add(PermissionMiddleware::class)->setName('mas_modepayment/delete-mas_modepayment-delete-2'); // delete
        }
    );

    // mas_payment_status
    $app->any('/MasPaymentStatusList[/{id}]', MasPaymentStatusController::class . ':list')->add(PermissionMiddleware::class)->setName('MasPaymentStatusList-mas_payment_status-list'); // list
    $app->any('/MasPaymentStatusAdd[/{id}]', MasPaymentStatusController::class . ':add')->add(PermissionMiddleware::class)->setName('MasPaymentStatusAdd-mas_payment_status-add'); // add
    $app->any('/MasPaymentStatusView[/{id}]', MasPaymentStatusController::class . ':view')->add(PermissionMiddleware::class)->setName('MasPaymentStatusView-mas_payment_status-view'); // view
    $app->any('/MasPaymentStatusEdit[/{id}]', MasPaymentStatusController::class . ':edit')->add(PermissionMiddleware::class)->setName('MasPaymentStatusEdit-mas_payment_status-edit'); // edit
    $app->any('/MasPaymentStatusDelete[/{id}]', MasPaymentStatusController::class . ':delete')->add(PermissionMiddleware::class)->setName('MasPaymentStatusDelete-mas_payment_status-delete'); // delete
    $app->group(
        '/mas_payment_status',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', MasPaymentStatusController::class . ':list')->add(PermissionMiddleware::class)->setName('mas_payment_status/list-mas_payment_status-list-2'); // list
            $group->any('/add[/{id}]', MasPaymentStatusController::class . ':add')->add(PermissionMiddleware::class)->setName('mas_payment_status/add-mas_payment_status-add-2'); // add
            $group->any('/view[/{id}]', MasPaymentStatusController::class . ':view')->add(PermissionMiddleware::class)->setName('mas_payment_status/view-mas_payment_status-view-2'); // view
            $group->any('/edit[/{id}]', MasPaymentStatusController::class . ':edit')->add(PermissionMiddleware::class)->setName('mas_payment_status/edit-mas_payment_status-edit-2'); // edit
            $group->any('/delete[/{id}]', MasPaymentStatusController::class . ':delete')->add(PermissionMiddleware::class)->setName('mas_payment_status/delete-mas_payment_status-delete-2'); // delete
        }
    );

    // mas_paymentcategory
    $app->any('/MasPaymentcategoryList[/{id}]', MasPaymentcategoryController::class . ':list')->add(PermissionMiddleware::class)->setName('MasPaymentcategoryList-mas_paymentcategory-list'); // list
    $app->any('/MasPaymentcategoryAdd[/{id}]', MasPaymentcategoryController::class . ':add')->add(PermissionMiddleware::class)->setName('MasPaymentcategoryAdd-mas_paymentcategory-add'); // add
    $app->any('/MasPaymentcategoryView[/{id}]', MasPaymentcategoryController::class . ':view')->add(PermissionMiddleware::class)->setName('MasPaymentcategoryView-mas_paymentcategory-view'); // view
    $app->any('/MasPaymentcategoryEdit[/{id}]', MasPaymentcategoryController::class . ':edit')->add(PermissionMiddleware::class)->setName('MasPaymentcategoryEdit-mas_paymentcategory-edit'); // edit
    $app->any('/MasPaymentcategoryDelete[/{id}]', MasPaymentcategoryController::class . ':delete')->add(PermissionMiddleware::class)->setName('MasPaymentcategoryDelete-mas_paymentcategory-delete'); // delete
    $app->group(
        '/mas_paymentcategory',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', MasPaymentcategoryController::class . ':list')->add(PermissionMiddleware::class)->setName('mas_paymentcategory/list-mas_paymentcategory-list-2'); // list
            $group->any('/add[/{id}]', MasPaymentcategoryController::class . ':add')->add(PermissionMiddleware::class)->setName('mas_paymentcategory/add-mas_paymentcategory-add-2'); // add
            $group->any('/view[/{id}]', MasPaymentcategoryController::class . ':view')->add(PermissionMiddleware::class)->setName('mas_paymentcategory/view-mas_paymentcategory-view-2'); // view
            $group->any('/edit[/{id}]', MasPaymentcategoryController::class . ':edit')->add(PermissionMiddleware::class)->setName('mas_paymentcategory/edit-mas_paymentcategory-edit-2'); // edit
            $group->any('/delete[/{id}]', MasPaymentcategoryController::class . ':delete')->add(PermissionMiddleware::class)->setName('mas_paymentcategory/delete-mas_paymentcategory-delete-2'); // delete
        }
    );

    // mas_pharmacy
    $app->any('/MasPharmacyList[/{id}]', MasPharmacyController::class . ':list')->add(PermissionMiddleware::class)->setName('MasPharmacyList-mas_pharmacy-list'); // list
    $app->any('/MasPharmacyAdd[/{id}]', MasPharmacyController::class . ':add')->add(PermissionMiddleware::class)->setName('MasPharmacyAdd-mas_pharmacy-add'); // add
    $app->any('/MasPharmacyView[/{id}]', MasPharmacyController::class . ':view')->add(PermissionMiddleware::class)->setName('MasPharmacyView-mas_pharmacy-view'); // view
    $app->any('/MasPharmacyEdit[/{id}]', MasPharmacyController::class . ':edit')->add(PermissionMiddleware::class)->setName('MasPharmacyEdit-mas_pharmacy-edit'); // edit
    $app->any('/MasPharmacyDelete[/{id}]', MasPharmacyController::class . ':delete')->add(PermissionMiddleware::class)->setName('MasPharmacyDelete-mas_pharmacy-delete'); // delete
    $app->group(
        '/mas_pharmacy',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', MasPharmacyController::class . ':list')->add(PermissionMiddleware::class)->setName('mas_pharmacy/list-mas_pharmacy-list-2'); // list
            $group->any('/add[/{id}]', MasPharmacyController::class . ':add')->add(PermissionMiddleware::class)->setName('mas_pharmacy/add-mas_pharmacy-add-2'); // add
            $group->any('/view[/{id}]', MasPharmacyController::class . ':view')->add(PermissionMiddleware::class)->setName('mas_pharmacy/view-mas_pharmacy-view-2'); // view
            $group->any('/edit[/{id}]', MasPharmacyController::class . ':edit')->add(PermissionMiddleware::class)->setName('mas_pharmacy/edit-mas_pharmacy-edit-2'); // edit
            $group->any('/delete[/{id}]', MasPharmacyController::class . ':delete')->add(PermissionMiddleware::class)->setName('mas_pharmacy/delete-mas_pharmacy-delete-2'); // delete
        }
    );

    // mas_procedure
    $app->any('/MasProcedureList[/{id}]', MasProcedureController::class . ':list')->add(PermissionMiddleware::class)->setName('MasProcedureList-mas_procedure-list'); // list
    $app->any('/MasProcedureAdd[/{id}]', MasProcedureController::class . ':add')->add(PermissionMiddleware::class)->setName('MasProcedureAdd-mas_procedure-add'); // add
    $app->any('/MasProcedureView[/{id}]', MasProcedureController::class . ':view')->add(PermissionMiddleware::class)->setName('MasProcedureView-mas_procedure-view'); // view
    $app->any('/MasProcedureEdit[/{id}]', MasProcedureController::class . ':edit')->add(PermissionMiddleware::class)->setName('MasProcedureEdit-mas_procedure-edit'); // edit
    $app->any('/MasProcedureDelete[/{id}]', MasProcedureController::class . ':delete')->add(PermissionMiddleware::class)->setName('MasProcedureDelete-mas_procedure-delete'); // delete
    $app->group(
        '/mas_procedure',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', MasProcedureController::class . ':list')->add(PermissionMiddleware::class)->setName('mas_procedure/list-mas_procedure-list-2'); // list
            $group->any('/add[/{id}]', MasProcedureController::class . ':add')->add(PermissionMiddleware::class)->setName('mas_procedure/add-mas_procedure-add-2'); // add
            $group->any('/view[/{id}]', MasProcedureController::class . ':view')->add(PermissionMiddleware::class)->setName('mas_procedure/view-mas_procedure-view-2'); // view
            $group->any('/edit[/{id}]', MasProcedureController::class . ':edit')->add(PermissionMiddleware::class)->setName('mas_procedure/edit-mas_procedure-edit-2'); // edit
            $group->any('/delete[/{id}]', MasProcedureController::class . ':delete')->add(PermissionMiddleware::class)->setName('mas_procedure/delete-mas_procedure-delete-2'); // delete
        }
    );

    // mas_reference_type
    $app->any('/MasReferenceTypeList[/{id}]', MasReferenceTypeController::class . ':list')->add(PermissionMiddleware::class)->setName('MasReferenceTypeList-mas_reference_type-list'); // list
    $app->any('/MasReferenceTypeAdd[/{id}]', MasReferenceTypeController::class . ':add')->add(PermissionMiddleware::class)->setName('MasReferenceTypeAdd-mas_reference_type-add'); // add
    $app->any('/MasReferenceTypeView[/{id}]', MasReferenceTypeController::class . ':view')->add(PermissionMiddleware::class)->setName('MasReferenceTypeView-mas_reference_type-view'); // view
    $app->any('/MasReferenceTypeEdit[/{id}]', MasReferenceTypeController::class . ':edit')->add(PermissionMiddleware::class)->setName('MasReferenceTypeEdit-mas_reference_type-edit'); // edit
    $app->any('/MasReferenceTypeDelete[/{id}]', MasReferenceTypeController::class . ':delete')->add(PermissionMiddleware::class)->setName('MasReferenceTypeDelete-mas_reference_type-delete'); // delete
    $app->group(
        '/mas_reference_type',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', MasReferenceTypeController::class . ':list')->add(PermissionMiddleware::class)->setName('mas_reference_type/list-mas_reference_type-list-2'); // list
            $group->any('/add[/{id}]', MasReferenceTypeController::class . ':add')->add(PermissionMiddleware::class)->setName('mas_reference_type/add-mas_reference_type-add-2'); // add
            $group->any('/view[/{id}]', MasReferenceTypeController::class . ':view')->add(PermissionMiddleware::class)->setName('mas_reference_type/view-mas_reference_type-view-2'); // view
            $group->any('/edit[/{id}]', MasReferenceTypeController::class . ':edit')->add(PermissionMiddleware::class)->setName('mas_reference_type/edit-mas_reference_type-edit-2'); // edit
            $group->any('/delete[/{id}]', MasReferenceTypeController::class . ':delete')->add(PermissionMiddleware::class)->setName('mas_reference_type/delete-mas_reference_type-delete-2'); // delete
        }
    );

    // mas_services_billing
    $app->any('/MasServicesBillingList[/{Id}]', MasServicesBillingController::class . ':list')->add(PermissionMiddleware::class)->setName('MasServicesBillingList-mas_services_billing-list'); // list
    $app->any('/MasServicesBillingAdd[/{Id}]', MasServicesBillingController::class . ':add')->add(PermissionMiddleware::class)->setName('MasServicesBillingAdd-mas_services_billing-add'); // add
    $app->any('/MasServicesBillingView[/{Id}]', MasServicesBillingController::class . ':view')->add(PermissionMiddleware::class)->setName('MasServicesBillingView-mas_services_billing-view'); // view
    $app->any('/MasServicesBillingEdit[/{Id}]', MasServicesBillingController::class . ':edit')->add(PermissionMiddleware::class)->setName('MasServicesBillingEdit-mas_services_billing-edit'); // edit
    $app->any('/MasServicesBillingDelete[/{Id}]', MasServicesBillingController::class . ':delete')->add(PermissionMiddleware::class)->setName('MasServicesBillingDelete-mas_services_billing-delete'); // delete
    $app->group(
        '/mas_services_billing',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{Id}]', MasServicesBillingController::class . ':list')->add(PermissionMiddleware::class)->setName('mas_services_billing/list-mas_services_billing-list-2'); // list
            $group->any('/add[/{Id}]', MasServicesBillingController::class . ':add')->add(PermissionMiddleware::class)->setName('mas_services_billing/add-mas_services_billing-add-2'); // add
            $group->any('/view[/{Id}]', MasServicesBillingController::class . ':view')->add(PermissionMiddleware::class)->setName('mas_services_billing/view-mas_services_billing-view-2'); // view
            $group->any('/edit[/{Id}]', MasServicesBillingController::class . ':edit')->add(PermissionMiddleware::class)->setName('mas_services_billing/edit-mas_services_billing-edit-2'); // edit
            $group->any('/delete[/{Id}]', MasServicesBillingController::class . ':delete')->add(PermissionMiddleware::class)->setName('mas_services_billing/delete-mas_services_billing-delete-2'); // delete
        }
    );

    // mas_services_type
    $app->any('/MasServicesTypeList[/{id}]', MasServicesTypeController::class . ':list')->add(PermissionMiddleware::class)->setName('MasServicesTypeList-mas_services_type-list'); // list
    $app->any('/MasServicesTypeAdd[/{id}]', MasServicesTypeController::class . ':add')->add(PermissionMiddleware::class)->setName('MasServicesTypeAdd-mas_services_type-add'); // add
    $app->any('/MasServicesTypeView[/{id}]', MasServicesTypeController::class . ':view')->add(PermissionMiddleware::class)->setName('MasServicesTypeView-mas_services_type-view'); // view
    $app->any('/MasServicesTypeEdit[/{id}]', MasServicesTypeController::class . ':edit')->add(PermissionMiddleware::class)->setName('MasServicesTypeEdit-mas_services_type-edit'); // edit
    $app->any('/MasServicesTypeDelete[/{id}]', MasServicesTypeController::class . ':delete')->add(PermissionMiddleware::class)->setName('MasServicesTypeDelete-mas_services_type-delete'); // delete
    $app->group(
        '/mas_services_type',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', MasServicesTypeController::class . ':list')->add(PermissionMiddleware::class)->setName('mas_services_type/list-mas_services_type-list-2'); // list
            $group->any('/add[/{id}]', MasServicesTypeController::class . ':add')->add(PermissionMiddleware::class)->setName('mas_services_type/add-mas_services_type-add-2'); // add
            $group->any('/view[/{id}]', MasServicesTypeController::class . ':view')->add(PermissionMiddleware::class)->setName('mas_services_type/view-mas_services_type-view-2'); // view
            $group->any('/edit[/{id}]', MasServicesTypeController::class . ':edit')->add(PermissionMiddleware::class)->setName('mas_services_type/edit-mas_services_type-edit-2'); // edit
            $group->any('/delete[/{id}]', MasServicesTypeController::class . ':delete')->add(PermissionMiddleware::class)->setName('mas_services_type/delete-mas_services_type-delete-2'); // delete
        }
    );

    // mas_template_prescription_type
    $app->any('/MasTemplatePrescriptionTypeList[/{id}]', MasTemplatePrescriptionTypeController::class . ':list')->add(PermissionMiddleware::class)->setName('MasTemplatePrescriptionTypeList-mas_template_prescription_type-list'); // list
    $app->any('/MasTemplatePrescriptionTypeAdd[/{id}]', MasTemplatePrescriptionTypeController::class . ':add')->add(PermissionMiddleware::class)->setName('MasTemplatePrescriptionTypeAdd-mas_template_prescription_type-add'); // add
    $app->any('/MasTemplatePrescriptionTypeView[/{id}]', MasTemplatePrescriptionTypeController::class . ':view')->add(PermissionMiddleware::class)->setName('MasTemplatePrescriptionTypeView-mas_template_prescription_type-view'); // view
    $app->any('/MasTemplatePrescriptionTypeEdit[/{id}]', MasTemplatePrescriptionTypeController::class . ':edit')->add(PermissionMiddleware::class)->setName('MasTemplatePrescriptionTypeEdit-mas_template_prescription_type-edit'); // edit
    $app->any('/MasTemplatePrescriptionTypeDelete[/{id}]', MasTemplatePrescriptionTypeController::class . ':delete')->add(PermissionMiddleware::class)->setName('MasTemplatePrescriptionTypeDelete-mas_template_prescription_type-delete'); // delete
    $app->group(
        '/mas_template_prescription_type',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', MasTemplatePrescriptionTypeController::class . ':list')->add(PermissionMiddleware::class)->setName('mas_template_prescription_type/list-mas_template_prescription_type-list-2'); // list
            $group->any('/add[/{id}]', MasTemplatePrescriptionTypeController::class . ':add')->add(PermissionMiddleware::class)->setName('mas_template_prescription_type/add-mas_template_prescription_type-add-2'); // add
            $group->any('/view[/{id}]', MasTemplatePrescriptionTypeController::class . ':view')->add(PermissionMiddleware::class)->setName('mas_template_prescription_type/view-mas_template_prescription_type-view-2'); // view
            $group->any('/edit[/{id}]', MasTemplatePrescriptionTypeController::class . ':edit')->add(PermissionMiddleware::class)->setName('mas_template_prescription_type/edit-mas_template_prescription_type-edit-2'); // edit
            $group->any('/delete[/{id}]', MasTemplatePrescriptionTypeController::class . ':delete')->add(PermissionMiddleware::class)->setName('mas_template_prescription_type/delete-mas_template_prescription_type-delete-2'); // delete
        }
    );

    // mas_template_type
    $app->any('/MasTemplateTypeList[/{id}]', MasTemplateTypeController::class . ':list')->add(PermissionMiddleware::class)->setName('MasTemplateTypeList-mas_template_type-list'); // list
    $app->any('/MasTemplateTypeAdd[/{id}]', MasTemplateTypeController::class . ':add')->add(PermissionMiddleware::class)->setName('MasTemplateTypeAdd-mas_template_type-add'); // add
    $app->any('/MasTemplateTypeView[/{id}]', MasTemplateTypeController::class . ':view')->add(PermissionMiddleware::class)->setName('MasTemplateTypeView-mas_template_type-view'); // view
    $app->any('/MasTemplateTypeEdit[/{id}]', MasTemplateTypeController::class . ':edit')->add(PermissionMiddleware::class)->setName('MasTemplateTypeEdit-mas_template_type-edit'); // edit
    $app->any('/MasTemplateTypeDelete[/{id}]', MasTemplateTypeController::class . ':delete')->add(PermissionMiddleware::class)->setName('MasTemplateTypeDelete-mas_template_type-delete'); // delete
    $app->group(
        '/mas_template_type',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', MasTemplateTypeController::class . ':list')->add(PermissionMiddleware::class)->setName('mas_template_type/list-mas_template_type-list-2'); // list
            $group->any('/add[/{id}]', MasTemplateTypeController::class . ':add')->add(PermissionMiddleware::class)->setName('mas_template_type/add-mas_template_type-add-2'); // add
            $group->any('/view[/{id}]', MasTemplateTypeController::class . ':view')->add(PermissionMiddleware::class)->setName('mas_template_type/view-mas_template_type-view-2'); // view
            $group->any('/edit[/{id}]', MasTemplateTypeController::class . ':edit')->add(PermissionMiddleware::class)->setName('mas_template_type/edit-mas_template_type-edit-2'); // edit
            $group->any('/delete[/{id}]', MasTemplateTypeController::class . ':delete')->add(PermissionMiddleware::class)->setName('mas_template_type/delete-mas_template_type-delete-2'); // delete
        }
    );

    // mas_typeofregsistration
    $app->any('/MasTypeofregsistrationList[/{id}]', MasTypeofregsistrationController::class . ':list')->add(PermissionMiddleware::class)->setName('MasTypeofregsistrationList-mas_typeofregsistration-list'); // list
    $app->any('/MasTypeofregsistrationAdd[/{id}]', MasTypeofregsistrationController::class . ':add')->add(PermissionMiddleware::class)->setName('MasTypeofregsistrationAdd-mas_typeofregsistration-add'); // add
    $app->any('/MasTypeofregsistrationView[/{id}]', MasTypeofregsistrationController::class . ':view')->add(PermissionMiddleware::class)->setName('MasTypeofregsistrationView-mas_typeofregsistration-view'); // view
    $app->any('/MasTypeofregsistrationEdit[/{id}]', MasTypeofregsistrationController::class . ':edit')->add(PermissionMiddleware::class)->setName('MasTypeofregsistrationEdit-mas_typeofregsistration-edit'); // edit
    $app->any('/MasTypeofregsistrationDelete[/{id}]', MasTypeofregsistrationController::class . ':delete')->add(PermissionMiddleware::class)->setName('MasTypeofregsistrationDelete-mas_typeofregsistration-delete'); // delete
    $app->group(
        '/mas_typeofregsistration',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', MasTypeofregsistrationController::class . ':list')->add(PermissionMiddleware::class)->setName('mas_typeofregsistration/list-mas_typeofregsistration-list-2'); // list
            $group->any('/add[/{id}]', MasTypeofregsistrationController::class . ':add')->add(PermissionMiddleware::class)->setName('mas_typeofregsistration/add-mas_typeofregsistration-add-2'); // add
            $group->any('/view[/{id}]', MasTypeofregsistrationController::class . ':view')->add(PermissionMiddleware::class)->setName('mas_typeofregsistration/view-mas_typeofregsistration-view-2'); // view
            $group->any('/edit[/{id}]', MasTypeofregsistrationController::class . ':edit')->add(PermissionMiddleware::class)->setName('mas_typeofregsistration/edit-mas_typeofregsistration-edit-2'); // edit
            $group->any('/delete[/{id}]', MasTypeofregsistrationController::class . ':delete')->add(PermissionMiddleware::class)->setName('mas_typeofregsistration/delete-mas_typeofregsistration-delete-2'); // delete
        }
    );

    // mas_user_template
    $app->any('/MasUserTemplateList[/{id}]', MasUserTemplateController::class . ':list')->add(PermissionMiddleware::class)->setName('MasUserTemplateList-mas_user_template-list'); // list
    $app->any('/MasUserTemplateAdd[/{id}]', MasUserTemplateController::class . ':add')->add(PermissionMiddleware::class)->setName('MasUserTemplateAdd-mas_user_template-add'); // add
    $app->any('/MasUserTemplateView[/{id}]', MasUserTemplateController::class . ':view')->add(PermissionMiddleware::class)->setName('MasUserTemplateView-mas_user_template-view'); // view
    $app->any('/MasUserTemplateEdit[/{id}]', MasUserTemplateController::class . ':edit')->add(PermissionMiddleware::class)->setName('MasUserTemplateEdit-mas_user_template-edit'); // edit
    $app->any('/MasUserTemplateDelete[/{id}]', MasUserTemplateController::class . ':delete')->add(PermissionMiddleware::class)->setName('MasUserTemplateDelete-mas_user_template-delete'); // delete
    $app->group(
        '/mas_user_template',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', MasUserTemplateController::class . ':list')->add(PermissionMiddleware::class)->setName('mas_user_template/list-mas_user_template-list-2'); // list
            $group->any('/add[/{id}]', MasUserTemplateController::class . ':add')->add(PermissionMiddleware::class)->setName('mas_user_template/add-mas_user_template-add-2'); // add
            $group->any('/view[/{id}]', MasUserTemplateController::class . ':view')->add(PermissionMiddleware::class)->setName('mas_user_template/view-mas_user_template-view-2'); // view
            $group->any('/edit[/{id}]', MasUserTemplateController::class . ':edit')->add(PermissionMiddleware::class)->setName('mas_user_template/edit-mas_user_template-edit-2'); // edit
            $group->any('/delete[/{id}]', MasUserTemplateController::class . ':delete')->add(PermissionMiddleware::class)->setName('mas_user_template/delete-mas_user_template-delete-2'); // delete
        }
    );

    // mas_user_template_prescription
    $app->any('/MasUserTemplatePrescriptionList[/{id}]', MasUserTemplatePrescriptionController::class . ':list')->add(PermissionMiddleware::class)->setName('MasUserTemplatePrescriptionList-mas_user_template_prescription-list'); // list
    $app->any('/MasUserTemplatePrescriptionAdd[/{id}]', MasUserTemplatePrescriptionController::class . ':add')->add(PermissionMiddleware::class)->setName('MasUserTemplatePrescriptionAdd-mas_user_template_prescription-add'); // add
    $app->any('/MasUserTemplatePrescriptionView[/{id}]', MasUserTemplatePrescriptionController::class . ':view')->add(PermissionMiddleware::class)->setName('MasUserTemplatePrescriptionView-mas_user_template_prescription-view'); // view
    $app->any('/MasUserTemplatePrescriptionEdit[/{id}]', MasUserTemplatePrescriptionController::class . ':edit')->add(PermissionMiddleware::class)->setName('MasUserTemplatePrescriptionEdit-mas_user_template_prescription-edit'); // edit
    $app->any('/MasUserTemplatePrescriptionDelete[/{id}]', MasUserTemplatePrescriptionController::class . ':delete')->add(PermissionMiddleware::class)->setName('MasUserTemplatePrescriptionDelete-mas_user_template_prescription-delete'); // delete
    $app->group(
        '/mas_user_template_prescription',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', MasUserTemplatePrescriptionController::class . ':list')->add(PermissionMiddleware::class)->setName('mas_user_template_prescription/list-mas_user_template_prescription-list-2'); // list
            $group->any('/add[/{id}]', MasUserTemplatePrescriptionController::class . ':add')->add(PermissionMiddleware::class)->setName('mas_user_template_prescription/add-mas_user_template_prescription-add-2'); // add
            $group->any('/view[/{id}]', MasUserTemplatePrescriptionController::class . ':view')->add(PermissionMiddleware::class)->setName('mas_user_template_prescription/view-mas_user_template_prescription-view-2'); // view
            $group->any('/edit[/{id}]', MasUserTemplatePrescriptionController::class . ':edit')->add(PermissionMiddleware::class)->setName('mas_user_template_prescription/edit-mas_user_template_prescription-edit-2'); // edit
            $group->any('/delete[/{id}]', MasUserTemplatePrescriptionController::class . ':delete')->add(PermissionMiddleware::class)->setName('mas_user_template_prescription/delete-mas_user_template_prescription-delete-2'); // delete
        }
    );

    // mas_where_didyou_hear
    $app->any('/MasWhereDidyouHearList[/{id}]', MasWhereDidyouHearController::class . ':list')->add(PermissionMiddleware::class)->setName('MasWhereDidyouHearList-mas_where_didyou_hear-list'); // list
    $app->any('/MasWhereDidyouHearAdd[/{id}]', MasWhereDidyouHearController::class . ':add')->add(PermissionMiddleware::class)->setName('MasWhereDidyouHearAdd-mas_where_didyou_hear-add'); // add
    $app->any('/MasWhereDidyouHearView[/{id}]', MasWhereDidyouHearController::class . ':view')->add(PermissionMiddleware::class)->setName('MasWhereDidyouHearView-mas_where_didyou_hear-view'); // view
    $app->any('/MasWhereDidyouHearEdit[/{id}]', MasWhereDidyouHearController::class . ':edit')->add(PermissionMiddleware::class)->setName('MasWhereDidyouHearEdit-mas_where_didyou_hear-edit'); // edit
    $app->any('/MasWhereDidyouHearDelete[/{id}]', MasWhereDidyouHearController::class . ':delete')->add(PermissionMiddleware::class)->setName('MasWhereDidyouHearDelete-mas_where_didyou_hear-delete'); // delete
    $app->group(
        '/mas_where_didyou_hear',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', MasWhereDidyouHearController::class . ':list')->add(PermissionMiddleware::class)->setName('mas_where_didyou_hear/list-mas_where_didyou_hear-list-2'); // list
            $group->any('/add[/{id}]', MasWhereDidyouHearController::class . ':add')->add(PermissionMiddleware::class)->setName('mas_where_didyou_hear/add-mas_where_didyou_hear-add-2'); // add
            $group->any('/view[/{id}]', MasWhereDidyouHearController::class . ':view')->add(PermissionMiddleware::class)->setName('mas_where_didyou_hear/view-mas_where_didyou_hear-view-2'); // view
            $group->any('/edit[/{id}]', MasWhereDidyouHearController::class . ':edit')->add(PermissionMiddleware::class)->setName('mas_where_didyou_hear/edit-mas_where_didyou_hear-edit-2'); // edit
            $group->any('/delete[/{id}]', MasWhereDidyouHearController::class . ':delete')->add(PermissionMiddleware::class)->setName('mas_where_didyou_hear/delete-mas_where_didyou_hear-delete-2'); // delete
        }
    );

    // master_procedure_treatment
    $app->any('/MasterProcedureTreatmentList[/{id}]', MasterProcedureTreatmentController::class . ':list')->add(PermissionMiddleware::class)->setName('MasterProcedureTreatmentList-master_procedure_treatment-list'); // list
    $app->any('/MasterProcedureTreatmentAdd[/{id}]', MasterProcedureTreatmentController::class . ':add')->add(PermissionMiddleware::class)->setName('MasterProcedureTreatmentAdd-master_procedure_treatment-add'); // add
    $app->any('/MasterProcedureTreatmentView[/{id}]', MasterProcedureTreatmentController::class . ':view')->add(PermissionMiddleware::class)->setName('MasterProcedureTreatmentView-master_procedure_treatment-view'); // view
    $app->any('/MasterProcedureTreatmentEdit[/{id}]', MasterProcedureTreatmentController::class . ':edit')->add(PermissionMiddleware::class)->setName('MasterProcedureTreatmentEdit-master_procedure_treatment-edit'); // edit
    $app->any('/MasterProcedureTreatmentDelete[/{id}]', MasterProcedureTreatmentController::class . ':delete')->add(PermissionMiddleware::class)->setName('MasterProcedureTreatmentDelete-master_procedure_treatment-delete'); // delete
    $app->group(
        '/master_procedure_treatment',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', MasterProcedureTreatmentController::class . ':list')->add(PermissionMiddleware::class)->setName('master_procedure_treatment/list-master_procedure_treatment-list-2'); // list
            $group->any('/add[/{id}]', MasterProcedureTreatmentController::class . ':add')->add(PermissionMiddleware::class)->setName('master_procedure_treatment/add-master_procedure_treatment-add-2'); // add
            $group->any('/view[/{id}]', MasterProcedureTreatmentController::class . ':view')->add(PermissionMiddleware::class)->setName('master_procedure_treatment/view-master_procedure_treatment-view-2'); // view
            $group->any('/edit[/{id}]', MasterProcedureTreatmentController::class . ':edit')->add(PermissionMiddleware::class)->setName('master_procedure_treatment/edit-master_procedure_treatment-edit-2'); // edit
            $group->any('/delete[/{id}]', MasterProcedureTreatmentController::class . ':delete')->add(PermissionMiddleware::class)->setName('master_procedure_treatment/delete-master_procedure_treatment-delete-2'); // delete
        }
    );

    // monitor_treatment_plan
    $app->any('/MonitorTreatmentPlanList[/{id}]', MonitorTreatmentPlanController::class . ':list')->add(PermissionMiddleware::class)->setName('MonitorTreatmentPlanList-monitor_treatment_plan-list'); // list
    $app->any('/MonitorTreatmentPlanAdd[/{id}]', MonitorTreatmentPlanController::class . ':add')->add(PermissionMiddleware::class)->setName('MonitorTreatmentPlanAdd-monitor_treatment_plan-add'); // add
    $app->any('/MonitorTreatmentPlanView[/{id}]', MonitorTreatmentPlanController::class . ':view')->add(PermissionMiddleware::class)->setName('MonitorTreatmentPlanView-monitor_treatment_plan-view'); // view
    $app->any('/MonitorTreatmentPlanEdit[/{id}]', MonitorTreatmentPlanController::class . ':edit')->add(PermissionMiddleware::class)->setName('MonitorTreatmentPlanEdit-monitor_treatment_plan-edit'); // edit
    $app->any('/MonitorTreatmentPlanDelete[/{id}]', MonitorTreatmentPlanController::class . ':delete')->add(PermissionMiddleware::class)->setName('MonitorTreatmentPlanDelete-monitor_treatment_plan-delete'); // delete
    $app->group(
        '/monitor_treatment_plan',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', MonitorTreatmentPlanController::class . ':list')->add(PermissionMiddleware::class)->setName('monitor_treatment_plan/list-monitor_treatment_plan-list-2'); // list
            $group->any('/add[/{id}]', MonitorTreatmentPlanController::class . ':add')->add(PermissionMiddleware::class)->setName('monitor_treatment_plan/add-monitor_treatment_plan-add-2'); // add
            $group->any('/view[/{id}]', MonitorTreatmentPlanController::class . ':view')->add(PermissionMiddleware::class)->setName('monitor_treatment_plan/view-monitor_treatment_plan-view-2'); // view
            $group->any('/edit[/{id}]', MonitorTreatmentPlanController::class . ':edit')->add(PermissionMiddleware::class)->setName('monitor_treatment_plan/edit-monitor_treatment_plan-edit-2'); // edit
            $group->any('/delete[/{id}]', MonitorTreatmentPlanController::class . ':delete')->add(PermissionMiddleware::class)->setName('monitor_treatment_plan/delete-monitor_treatment_plan-delete-2'); // delete
        }
    );

    // patient
    $app->any('/PatientList[/{id}/{PatientID}]', PatientController::class . ':list')->add(PermissionMiddleware::class)->setName('PatientList-patient-list'); // list
    $app->any('/PatientAdd[/{id}/{PatientID}]', PatientController::class . ':add')->add(PermissionMiddleware::class)->setName('PatientAdd-patient-add'); // add
    $app->any('/PatientView[/{id}/{PatientID}]', PatientController::class . ':view')->add(PermissionMiddleware::class)->setName('PatientView-patient-view'); // view
    $app->any('/PatientEdit[/{id}/{PatientID}]', PatientController::class . ':edit')->add(PermissionMiddleware::class)->setName('PatientEdit-patient-edit'); // edit
    $app->any('/PatientDelete[/{id}/{PatientID}]', PatientController::class . ':delete')->add(PermissionMiddleware::class)->setName('PatientDelete-patient-delete'); // delete
    $app->group(
        '/patient',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}/{PatientID}]', PatientController::class . ':list')->add(PermissionMiddleware::class)->setName('patient/list-patient-list-2'); // list
            $group->any('/add[/{id}/{PatientID}]', PatientController::class . ':add')->add(PermissionMiddleware::class)->setName('patient/add-patient-add-2'); // add
            $group->any('/view[/{id}/{PatientID}]', PatientController::class . ':view')->add(PermissionMiddleware::class)->setName('patient/view-patient-view-2'); // view
            $group->any('/edit[/{id}/{PatientID}]', PatientController::class . ':edit')->add(PermissionMiddleware::class)->setName('patient/edit-patient-edit-2'); // edit
            $group->any('/delete[/{id}/{PatientID}]', PatientController::class . ':delete')->add(PermissionMiddleware::class)->setName('patient/delete-patient-delete-2'); // delete
        }
    );

    // patient_address
    $app->any('/PatientAddressList[/{id}]', PatientAddressController::class . ':list')->add(PermissionMiddleware::class)->setName('PatientAddressList-patient_address-list'); // list
    $app->any('/PatientAddressAdd[/{id}]', PatientAddressController::class . ':add')->add(PermissionMiddleware::class)->setName('PatientAddressAdd-patient_address-add'); // add
    $app->any('/PatientAddressView[/{id}]', PatientAddressController::class . ':view')->add(PermissionMiddleware::class)->setName('PatientAddressView-patient_address-view'); // view
    $app->any('/PatientAddressEdit[/{id}]', PatientAddressController::class . ':edit')->add(PermissionMiddleware::class)->setName('PatientAddressEdit-patient_address-edit'); // edit
    $app->any('/PatientAddressDelete[/{id}]', PatientAddressController::class . ':delete')->add(PermissionMiddleware::class)->setName('PatientAddressDelete-patient_address-delete'); // delete
    $app->group(
        '/patient_address',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', PatientAddressController::class . ':list')->add(PermissionMiddleware::class)->setName('patient_address/list-patient_address-list-2'); // list
            $group->any('/add[/{id}]', PatientAddressController::class . ':add')->add(PermissionMiddleware::class)->setName('patient_address/add-patient_address-add-2'); // add
            $group->any('/view[/{id}]', PatientAddressController::class . ':view')->add(PermissionMiddleware::class)->setName('patient_address/view-patient_address-view-2'); // view
            $group->any('/edit[/{id}]', PatientAddressController::class . ':edit')->add(PermissionMiddleware::class)->setName('patient_address/edit-patient_address-edit-2'); // edit
            $group->any('/delete[/{id}]', PatientAddressController::class . ':delete')->add(PermissionMiddleware::class)->setName('patient_address/delete-patient_address-delete-2'); // delete
        }
    );

    // patient_an_registration
    $app->any('/PatientAnRegistrationList[/{id}]', PatientAnRegistrationController::class . ':list')->add(PermissionMiddleware::class)->setName('PatientAnRegistrationList-patient_an_registration-list'); // list
    $app->any('/PatientAnRegistrationAdd[/{id}]', PatientAnRegistrationController::class . ':add')->add(PermissionMiddleware::class)->setName('PatientAnRegistrationAdd-patient_an_registration-add'); // add
    $app->any('/PatientAnRegistrationView[/{id}]', PatientAnRegistrationController::class . ':view')->add(PermissionMiddleware::class)->setName('PatientAnRegistrationView-patient_an_registration-view'); // view
    $app->any('/PatientAnRegistrationEdit[/{id}]', PatientAnRegistrationController::class . ':edit')->add(PermissionMiddleware::class)->setName('PatientAnRegistrationEdit-patient_an_registration-edit'); // edit
    $app->any('/PatientAnRegistrationDelete[/{id}]', PatientAnRegistrationController::class . ':delete')->add(PermissionMiddleware::class)->setName('PatientAnRegistrationDelete-patient_an_registration-delete'); // delete
    $app->group(
        '/patient_an_registration',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', PatientAnRegistrationController::class . ':list')->add(PermissionMiddleware::class)->setName('patient_an_registration/list-patient_an_registration-list-2'); // list
            $group->any('/add[/{id}]', PatientAnRegistrationController::class . ':add')->add(PermissionMiddleware::class)->setName('patient_an_registration/add-patient_an_registration-add-2'); // add
            $group->any('/view[/{id}]', PatientAnRegistrationController::class . ':view')->add(PermissionMiddleware::class)->setName('patient_an_registration/view-patient_an_registration-view-2'); // view
            $group->any('/edit[/{id}]', PatientAnRegistrationController::class . ':edit')->add(PermissionMiddleware::class)->setName('patient_an_registration/edit-patient_an_registration-edit-2'); // edit
            $group->any('/delete[/{id}]', PatientAnRegistrationController::class . ':delete')->add(PermissionMiddleware::class)->setName('patient_an_registration/delete-patient_an_registration-delete-2'); // delete
        }
    );

    // patient_app
    $app->any('/PatientAppList[/{id}/{PatientID}]', PatientAppController::class . ':list')->add(PermissionMiddleware::class)->setName('PatientAppList-patient_app-list'); // list
    $app->any('/PatientAppAdd[/{id}/{PatientID}]', PatientAppController::class . ':add')->add(PermissionMiddleware::class)->setName('PatientAppAdd-patient_app-add'); // add
    $app->any('/PatientAppView[/{id}/{PatientID}]', PatientAppController::class . ':view')->add(PermissionMiddleware::class)->setName('PatientAppView-patient_app-view'); // view
    $app->any('/PatientAppEdit[/{id}/{PatientID}]', PatientAppController::class . ':edit')->add(PermissionMiddleware::class)->setName('PatientAppEdit-patient_app-edit'); // edit
    $app->any('/PatientAppDelete[/{id}/{PatientID}]', PatientAppController::class . ':delete')->add(PermissionMiddleware::class)->setName('PatientAppDelete-patient_app-delete'); // delete
    $app->group(
        '/patient_app',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}/{PatientID}]', PatientAppController::class . ':list')->add(PermissionMiddleware::class)->setName('patient_app/list-patient_app-list-2'); // list
            $group->any('/add[/{id}/{PatientID}]', PatientAppController::class . ':add')->add(PermissionMiddleware::class)->setName('patient_app/add-patient_app-add-2'); // add
            $group->any('/view[/{id}/{PatientID}]', PatientAppController::class . ':view')->add(PermissionMiddleware::class)->setName('patient_app/view-patient_app-view-2'); // view
            $group->any('/edit[/{id}/{PatientID}]', PatientAppController::class . ':edit')->add(PermissionMiddleware::class)->setName('patient_app/edit-patient_app-edit-2'); // edit
            $group->any('/delete[/{id}/{PatientID}]', PatientAppController::class . ':delete')->add(PermissionMiddleware::class)->setName('patient_app/delete-patient_app-delete-2'); // delete
        }
    );

    // patient_document
    $app->any('/PatientDocumentList[/{id}]', PatientDocumentController::class . ':list')->add(PermissionMiddleware::class)->setName('PatientDocumentList-patient_document-list'); // list
    $app->any('/PatientDocumentAdd[/{id}]', PatientDocumentController::class . ':add')->add(PermissionMiddleware::class)->setName('PatientDocumentAdd-patient_document-add'); // add
    $app->any('/PatientDocumentView[/{id}]', PatientDocumentController::class . ':view')->add(PermissionMiddleware::class)->setName('PatientDocumentView-patient_document-view'); // view
    $app->any('/PatientDocumentEdit[/{id}]', PatientDocumentController::class . ':edit')->add(PermissionMiddleware::class)->setName('PatientDocumentEdit-patient_document-edit'); // edit
    $app->any('/PatientDocumentDelete[/{id}]', PatientDocumentController::class . ':delete')->add(PermissionMiddleware::class)->setName('PatientDocumentDelete-patient_document-delete'); // delete
    $app->group(
        '/patient_document',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', PatientDocumentController::class . ':list')->add(PermissionMiddleware::class)->setName('patient_document/list-patient_document-list-2'); // list
            $group->any('/add[/{id}]', PatientDocumentController::class . ':add')->add(PermissionMiddleware::class)->setName('patient_document/add-patient_document-add-2'); // add
            $group->any('/view[/{id}]', PatientDocumentController::class . ':view')->add(PermissionMiddleware::class)->setName('patient_document/view-patient_document-view-2'); // view
            $group->any('/edit[/{id}]', PatientDocumentController::class . ':edit')->add(PermissionMiddleware::class)->setName('patient_document/edit-patient_document-edit-2'); // edit
            $group->any('/delete[/{id}]', PatientDocumentController::class . ':delete')->add(PermissionMiddleware::class)->setName('patient_document/delete-patient_document-delete-2'); // delete
        }
    );

    // patient_email
    $app->any('/PatientEmailList[/{id}]', PatientEmailController::class . ':list')->add(PermissionMiddleware::class)->setName('PatientEmailList-patient_email-list'); // list
    $app->any('/PatientEmailAdd[/{id}]', PatientEmailController::class . ':add')->add(PermissionMiddleware::class)->setName('PatientEmailAdd-patient_email-add'); // add
    $app->any('/PatientEmailView[/{id}]', PatientEmailController::class . ':view')->add(PermissionMiddleware::class)->setName('PatientEmailView-patient_email-view'); // view
    $app->any('/PatientEmailEdit[/{id}]', PatientEmailController::class . ':edit')->add(PermissionMiddleware::class)->setName('PatientEmailEdit-patient_email-edit'); // edit
    $app->any('/PatientEmailDelete[/{id}]', PatientEmailController::class . ':delete')->add(PermissionMiddleware::class)->setName('PatientEmailDelete-patient_email-delete'); // delete
    $app->group(
        '/patient_email',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', PatientEmailController::class . ':list')->add(PermissionMiddleware::class)->setName('patient_email/list-patient_email-list-2'); // list
            $group->any('/add[/{id}]', PatientEmailController::class . ':add')->add(PermissionMiddleware::class)->setName('patient_email/add-patient_email-add-2'); // add
            $group->any('/view[/{id}]', PatientEmailController::class . ':view')->add(PermissionMiddleware::class)->setName('patient_email/view-patient_email-view-2'); // view
            $group->any('/edit[/{id}]', PatientEmailController::class . ':edit')->add(PermissionMiddleware::class)->setName('patient_email/edit-patient_email-edit-2'); // edit
            $group->any('/delete[/{id}]', PatientEmailController::class . ':delete')->add(PermissionMiddleware::class)->setName('patient_email/delete-patient_email-delete-2'); // delete
        }
    );

    // patient_emergency_contact
    $app->any('/PatientEmergencyContactList[/{id}]', PatientEmergencyContactController::class . ':list')->add(PermissionMiddleware::class)->setName('PatientEmergencyContactList-patient_emergency_contact-list'); // list
    $app->any('/PatientEmergencyContactAdd[/{id}]', PatientEmergencyContactController::class . ':add')->add(PermissionMiddleware::class)->setName('PatientEmergencyContactAdd-patient_emergency_contact-add'); // add
    $app->any('/PatientEmergencyContactView[/{id}]', PatientEmergencyContactController::class . ':view')->add(PermissionMiddleware::class)->setName('PatientEmergencyContactView-patient_emergency_contact-view'); // view
    $app->any('/PatientEmergencyContactEdit[/{id}]', PatientEmergencyContactController::class . ':edit')->add(PermissionMiddleware::class)->setName('PatientEmergencyContactEdit-patient_emergency_contact-edit'); // edit
    $app->any('/PatientEmergencyContactDelete[/{id}]', PatientEmergencyContactController::class . ':delete')->add(PermissionMiddleware::class)->setName('PatientEmergencyContactDelete-patient_emergency_contact-delete'); // delete
    $app->group(
        '/patient_emergency_contact',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', PatientEmergencyContactController::class . ':list')->add(PermissionMiddleware::class)->setName('patient_emergency_contact/list-patient_emergency_contact-list-2'); // list
            $group->any('/add[/{id}]', PatientEmergencyContactController::class . ':add')->add(PermissionMiddleware::class)->setName('patient_emergency_contact/add-patient_emergency_contact-add-2'); // add
            $group->any('/view[/{id}]', PatientEmergencyContactController::class . ':view')->add(PermissionMiddleware::class)->setName('patient_emergency_contact/view-patient_emergency_contact-view-2'); // view
            $group->any('/edit[/{id}]', PatientEmergencyContactController::class . ':edit')->add(PermissionMiddleware::class)->setName('patient_emergency_contact/edit-patient_emergency_contact-edit-2'); // edit
            $group->any('/delete[/{id}]', PatientEmergencyContactController::class . ':delete')->add(PermissionMiddleware::class)->setName('patient_emergency_contact/delete-patient_emergency_contact-delete-2'); // delete
        }
    );

    // patient_final_diagnosis
    $app->any('/PatientFinalDiagnosisList[/{id}]', PatientFinalDiagnosisController::class . ':list')->add(PermissionMiddleware::class)->setName('PatientFinalDiagnosisList-patient_final_diagnosis-list'); // list
    $app->any('/PatientFinalDiagnosisAdd[/{id}]', PatientFinalDiagnosisController::class . ':add')->add(PermissionMiddleware::class)->setName('PatientFinalDiagnosisAdd-patient_final_diagnosis-add'); // add
    $app->any('/PatientFinalDiagnosisView[/{id}]', PatientFinalDiagnosisController::class . ':view')->add(PermissionMiddleware::class)->setName('PatientFinalDiagnosisView-patient_final_diagnosis-view'); // view
    $app->any('/PatientFinalDiagnosisEdit[/{id}]', PatientFinalDiagnosisController::class . ':edit')->add(PermissionMiddleware::class)->setName('PatientFinalDiagnosisEdit-patient_final_diagnosis-edit'); // edit
    $app->any('/PatientFinalDiagnosisDelete[/{id}]', PatientFinalDiagnosisController::class . ':delete')->add(PermissionMiddleware::class)->setName('PatientFinalDiagnosisDelete-patient_final_diagnosis-delete'); // delete
    $app->group(
        '/patient_final_diagnosis',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', PatientFinalDiagnosisController::class . ':list')->add(PermissionMiddleware::class)->setName('patient_final_diagnosis/list-patient_final_diagnosis-list-2'); // list
            $group->any('/add[/{id}]', PatientFinalDiagnosisController::class . ':add')->add(PermissionMiddleware::class)->setName('patient_final_diagnosis/add-patient_final_diagnosis-add-2'); // add
            $group->any('/view[/{id}]', PatientFinalDiagnosisController::class . ':view')->add(PermissionMiddleware::class)->setName('patient_final_diagnosis/view-patient_final_diagnosis-view-2'); // view
            $group->any('/edit[/{id}]', PatientFinalDiagnosisController::class . ':edit')->add(PermissionMiddleware::class)->setName('patient_final_diagnosis/edit-patient_final_diagnosis-edit-2'); // edit
            $group->any('/delete[/{id}]', PatientFinalDiagnosisController::class . ':delete')->add(PermissionMiddleware::class)->setName('patient_final_diagnosis/delete-patient_final_diagnosis-delete-2'); // delete
        }
    );

    // patient_follow_up
    $app->any('/PatientFollowUpList[/{id}]', PatientFollowUpController::class . ':list')->add(PermissionMiddleware::class)->setName('PatientFollowUpList-patient_follow_up-list'); // list
    $app->any('/PatientFollowUpAdd[/{id}]', PatientFollowUpController::class . ':add')->add(PermissionMiddleware::class)->setName('PatientFollowUpAdd-patient_follow_up-add'); // add
    $app->any('/PatientFollowUpView[/{id}]', PatientFollowUpController::class . ':view')->add(PermissionMiddleware::class)->setName('PatientFollowUpView-patient_follow_up-view'); // view
    $app->any('/PatientFollowUpEdit[/{id}]', PatientFollowUpController::class . ':edit')->add(PermissionMiddleware::class)->setName('PatientFollowUpEdit-patient_follow_up-edit'); // edit
    $app->any('/PatientFollowUpDelete[/{id}]', PatientFollowUpController::class . ':delete')->add(PermissionMiddleware::class)->setName('PatientFollowUpDelete-patient_follow_up-delete'); // delete
    $app->group(
        '/patient_follow_up',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', PatientFollowUpController::class . ':list')->add(PermissionMiddleware::class)->setName('patient_follow_up/list-patient_follow_up-list-2'); // list
            $group->any('/add[/{id}]', PatientFollowUpController::class . ':add')->add(PermissionMiddleware::class)->setName('patient_follow_up/add-patient_follow_up-add-2'); // add
            $group->any('/view[/{id}]', PatientFollowUpController::class . ':view')->add(PermissionMiddleware::class)->setName('patient_follow_up/view-patient_follow_up-view-2'); // view
            $group->any('/edit[/{id}]', PatientFollowUpController::class . ':edit')->add(PermissionMiddleware::class)->setName('patient_follow_up/edit-patient_follow_up-edit-2'); // edit
            $group->any('/delete[/{id}]', PatientFollowUpController::class . ':delete')->add(PermissionMiddleware::class)->setName('patient_follow_up/delete-patient_follow_up-delete-2'); // delete
        }
    );

    // patient_history
    $app->any('/PatientHistoryList[/{id}]', PatientHistoryController::class . ':list')->add(PermissionMiddleware::class)->setName('PatientHistoryList-patient_history-list'); // list
    $app->any('/PatientHistoryAdd[/{id}]', PatientHistoryController::class . ':add')->add(PermissionMiddleware::class)->setName('PatientHistoryAdd-patient_history-add'); // add
    $app->any('/PatientHistoryView[/{id}]', PatientHistoryController::class . ':view')->add(PermissionMiddleware::class)->setName('PatientHistoryView-patient_history-view'); // view
    $app->any('/PatientHistoryEdit[/{id}]', PatientHistoryController::class . ':edit')->add(PermissionMiddleware::class)->setName('PatientHistoryEdit-patient_history-edit'); // edit
    $app->any('/PatientHistoryDelete[/{id}]', PatientHistoryController::class . ':delete')->add(PermissionMiddleware::class)->setName('PatientHistoryDelete-patient_history-delete'); // delete
    $app->group(
        '/patient_history',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', PatientHistoryController::class . ':list')->add(PermissionMiddleware::class)->setName('patient_history/list-patient_history-list-2'); // list
            $group->any('/add[/{id}]', PatientHistoryController::class . ':add')->add(PermissionMiddleware::class)->setName('patient_history/add-patient_history-add-2'); // add
            $group->any('/view[/{id}]', PatientHistoryController::class . ':view')->add(PermissionMiddleware::class)->setName('patient_history/view-patient_history-view-2'); // view
            $group->any('/edit[/{id}]', PatientHistoryController::class . ':edit')->add(PermissionMiddleware::class)->setName('patient_history/edit-patient_history-edit-2'); // edit
            $group->any('/delete[/{id}]', PatientHistoryController::class . ':delete')->add(PermissionMiddleware::class)->setName('patient_history/delete-patient_history-delete-2'); // delete
        }
    );

    // patient_insurance
    $app->any('/PatientInsuranceList[/{id}]', PatientInsuranceController::class . ':list')->add(PermissionMiddleware::class)->setName('PatientInsuranceList-patient_insurance-list'); // list
    $app->any('/PatientInsuranceAdd[/{id}]', PatientInsuranceController::class . ':add')->add(PermissionMiddleware::class)->setName('PatientInsuranceAdd-patient_insurance-add'); // add
    $app->any('/PatientInsuranceView[/{id}]', PatientInsuranceController::class . ':view')->add(PermissionMiddleware::class)->setName('PatientInsuranceView-patient_insurance-view'); // view
    $app->any('/PatientInsuranceEdit[/{id}]', PatientInsuranceController::class . ':edit')->add(PermissionMiddleware::class)->setName('PatientInsuranceEdit-patient_insurance-edit'); // edit
    $app->any('/PatientInsuranceDelete[/{id}]', PatientInsuranceController::class . ':delete')->add(PermissionMiddleware::class)->setName('PatientInsuranceDelete-patient_insurance-delete'); // delete
    $app->group(
        '/patient_insurance',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', PatientInsuranceController::class . ':list')->add(PermissionMiddleware::class)->setName('patient_insurance/list-patient_insurance-list-2'); // list
            $group->any('/add[/{id}]', PatientInsuranceController::class . ':add')->add(PermissionMiddleware::class)->setName('patient_insurance/add-patient_insurance-add-2'); // add
            $group->any('/view[/{id}]', PatientInsuranceController::class . ':view')->add(PermissionMiddleware::class)->setName('patient_insurance/view-patient_insurance-view-2'); // view
            $group->any('/edit[/{id}]', PatientInsuranceController::class . ':edit')->add(PermissionMiddleware::class)->setName('patient_insurance/edit-patient_insurance-edit-2'); // edit
            $group->any('/delete[/{id}]', PatientInsuranceController::class . ':delete')->add(PermissionMiddleware::class)->setName('patient_insurance/delete-patient_insurance-delete-2'); // delete
        }
    );

    // patient_investigations
    $app->any('/PatientInvestigationsList[/{id}]', PatientInvestigationsController::class . ':list')->add(PermissionMiddleware::class)->setName('PatientInvestigationsList-patient_investigations-list'); // list
    $app->any('/PatientInvestigationsAdd[/{id}]', PatientInvestigationsController::class . ':add')->add(PermissionMiddleware::class)->setName('PatientInvestigationsAdd-patient_investigations-add'); // add
    $app->any('/PatientInvestigationsView[/{id}]', PatientInvestigationsController::class . ':view')->add(PermissionMiddleware::class)->setName('PatientInvestigationsView-patient_investigations-view'); // view
    $app->any('/PatientInvestigationsEdit[/{id}]', PatientInvestigationsController::class . ':edit')->add(PermissionMiddleware::class)->setName('PatientInvestigationsEdit-patient_investigations-edit'); // edit
    $app->any('/PatientInvestigationsDelete[/{id}]', PatientInvestigationsController::class . ':delete')->add(PermissionMiddleware::class)->setName('PatientInvestigationsDelete-patient_investigations-delete'); // delete
    $app->group(
        '/patient_investigations',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', PatientInvestigationsController::class . ':list')->add(PermissionMiddleware::class)->setName('patient_investigations/list-patient_investigations-list-2'); // list
            $group->any('/add[/{id}]', PatientInvestigationsController::class . ':add')->add(PermissionMiddleware::class)->setName('patient_investigations/add-patient_investigations-add-2'); // add
            $group->any('/view[/{id}]', PatientInvestigationsController::class . ':view')->add(PermissionMiddleware::class)->setName('patient_investigations/view-patient_investigations-view-2'); // view
            $group->any('/edit[/{id}]', PatientInvestigationsController::class . ':edit')->add(PermissionMiddleware::class)->setName('patient_investigations/edit-patient_investigations-edit-2'); // edit
            $group->any('/delete[/{id}]', PatientInvestigationsController::class . ':delete')->add(PermissionMiddleware::class)->setName('patient_investigations/delete-patient_investigations-delete-2'); // delete
        }
    );

    // patient_opd_follow_up
    $app->any('/PatientOpdFollowUpList[/{id}]', PatientOpdFollowUpController::class . ':list')->add(PermissionMiddleware::class)->setName('PatientOpdFollowUpList-patient_opd_follow_up-list'); // list
    $app->any('/PatientOpdFollowUpAdd[/{id}]', PatientOpdFollowUpController::class . ':add')->add(PermissionMiddleware::class)->setName('PatientOpdFollowUpAdd-patient_opd_follow_up-add'); // add
    $app->any('/PatientOpdFollowUpView[/{id}]', PatientOpdFollowUpController::class . ':view')->add(PermissionMiddleware::class)->setName('PatientOpdFollowUpView-patient_opd_follow_up-view'); // view
    $app->any('/PatientOpdFollowUpEdit[/{id}]', PatientOpdFollowUpController::class . ':edit')->add(PermissionMiddleware::class)->setName('PatientOpdFollowUpEdit-patient_opd_follow_up-edit'); // edit
    $app->any('/PatientOpdFollowUpDelete[/{id}]', PatientOpdFollowUpController::class . ':delete')->add(PermissionMiddleware::class)->setName('PatientOpdFollowUpDelete-patient_opd_follow_up-delete'); // delete
    $app->group(
        '/patient_opd_follow_up',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', PatientOpdFollowUpController::class . ':list')->add(PermissionMiddleware::class)->setName('patient_opd_follow_up/list-patient_opd_follow_up-list-2'); // list
            $group->any('/add[/{id}]', PatientOpdFollowUpController::class . ':add')->add(PermissionMiddleware::class)->setName('patient_opd_follow_up/add-patient_opd_follow_up-add-2'); // add
            $group->any('/view[/{id}]', PatientOpdFollowUpController::class . ':view')->add(PermissionMiddleware::class)->setName('patient_opd_follow_up/view-patient_opd_follow_up-view-2'); // view
            $group->any('/edit[/{id}]', PatientOpdFollowUpController::class . ':edit')->add(PermissionMiddleware::class)->setName('patient_opd_follow_up/edit-patient_opd_follow_up-edit-2'); // edit
            $group->any('/delete[/{id}]', PatientOpdFollowUpController::class . ':delete')->add(PermissionMiddleware::class)->setName('patient_opd_follow_up/delete-patient_opd_follow_up-delete-2'); // delete
        }
    );

    // patient_ot_delivery_register
    $app->any('/PatientOtDeliveryRegisterList[/{id}]', PatientOtDeliveryRegisterController::class . ':list')->add(PermissionMiddleware::class)->setName('PatientOtDeliveryRegisterList-patient_ot_delivery_register-list'); // list
    $app->any('/PatientOtDeliveryRegisterAdd[/{id}]', PatientOtDeliveryRegisterController::class . ':add')->add(PermissionMiddleware::class)->setName('PatientOtDeliveryRegisterAdd-patient_ot_delivery_register-add'); // add
    $app->any('/PatientOtDeliveryRegisterView[/{id}]', PatientOtDeliveryRegisterController::class . ':view')->add(PermissionMiddleware::class)->setName('PatientOtDeliveryRegisterView-patient_ot_delivery_register-view'); // view
    $app->any('/PatientOtDeliveryRegisterEdit[/{id}]', PatientOtDeliveryRegisterController::class . ':edit')->add(PermissionMiddleware::class)->setName('PatientOtDeliveryRegisterEdit-patient_ot_delivery_register-edit'); // edit
    $app->any('/PatientOtDeliveryRegisterDelete[/{id}]', PatientOtDeliveryRegisterController::class . ':delete')->add(PermissionMiddleware::class)->setName('PatientOtDeliveryRegisterDelete-patient_ot_delivery_register-delete'); // delete
    $app->group(
        '/patient_ot_delivery_register',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', PatientOtDeliveryRegisterController::class . ':list')->add(PermissionMiddleware::class)->setName('patient_ot_delivery_register/list-patient_ot_delivery_register-list-2'); // list
            $group->any('/add[/{id}]', PatientOtDeliveryRegisterController::class . ':add')->add(PermissionMiddleware::class)->setName('patient_ot_delivery_register/add-patient_ot_delivery_register-add-2'); // add
            $group->any('/view[/{id}]', PatientOtDeliveryRegisterController::class . ':view')->add(PermissionMiddleware::class)->setName('patient_ot_delivery_register/view-patient_ot_delivery_register-view-2'); // view
            $group->any('/edit[/{id}]', PatientOtDeliveryRegisterController::class . ':edit')->add(PermissionMiddleware::class)->setName('patient_ot_delivery_register/edit-patient_ot_delivery_register-edit-2'); // edit
            $group->any('/delete[/{id}]', PatientOtDeliveryRegisterController::class . ':delete')->add(PermissionMiddleware::class)->setName('patient_ot_delivery_register/delete-patient_ot_delivery_register-delete-2'); // delete
        }
    );

    // patient_ot_surgery_register
    $app->any('/PatientOtSurgeryRegisterList[/{id}]', PatientOtSurgeryRegisterController::class . ':list')->add(PermissionMiddleware::class)->setName('PatientOtSurgeryRegisterList-patient_ot_surgery_register-list'); // list
    $app->any('/PatientOtSurgeryRegisterAdd[/{id}]', PatientOtSurgeryRegisterController::class . ':add')->add(PermissionMiddleware::class)->setName('PatientOtSurgeryRegisterAdd-patient_ot_surgery_register-add'); // add
    $app->any('/PatientOtSurgeryRegisterView[/{id}]', PatientOtSurgeryRegisterController::class . ':view')->add(PermissionMiddleware::class)->setName('PatientOtSurgeryRegisterView-patient_ot_surgery_register-view'); // view
    $app->any('/PatientOtSurgeryRegisterEdit[/{id}]', PatientOtSurgeryRegisterController::class . ':edit')->add(PermissionMiddleware::class)->setName('PatientOtSurgeryRegisterEdit-patient_ot_surgery_register-edit'); // edit
    $app->any('/PatientOtSurgeryRegisterDelete[/{id}]', PatientOtSurgeryRegisterController::class . ':delete')->add(PermissionMiddleware::class)->setName('PatientOtSurgeryRegisterDelete-patient_ot_surgery_register-delete'); // delete
    $app->group(
        '/patient_ot_surgery_register',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', PatientOtSurgeryRegisterController::class . ':list')->add(PermissionMiddleware::class)->setName('patient_ot_surgery_register/list-patient_ot_surgery_register-list-2'); // list
            $group->any('/add[/{id}]', PatientOtSurgeryRegisterController::class . ':add')->add(PermissionMiddleware::class)->setName('patient_ot_surgery_register/add-patient_ot_surgery_register-add-2'); // add
            $group->any('/view[/{id}]', PatientOtSurgeryRegisterController::class . ':view')->add(PermissionMiddleware::class)->setName('patient_ot_surgery_register/view-patient_ot_surgery_register-view-2'); // view
            $group->any('/edit[/{id}]', PatientOtSurgeryRegisterController::class . ':edit')->add(PermissionMiddleware::class)->setName('patient_ot_surgery_register/edit-patient_ot_surgery_register-edit-2'); // edit
            $group->any('/delete[/{id}]', PatientOtSurgeryRegisterController::class . ':delete')->add(PermissionMiddleware::class)->setName('patient_ot_surgery_register/delete-patient_ot_surgery_register-delete-2'); // delete
        }
    );

    // patient_prescription
    $app->any('/PatientPrescriptionList[/{id}]', PatientPrescriptionController::class . ':list')->add(PermissionMiddleware::class)->setName('PatientPrescriptionList-patient_prescription-list'); // list
    $app->any('/PatientPrescriptionAdd[/{id}]', PatientPrescriptionController::class . ':add')->add(PermissionMiddleware::class)->setName('PatientPrescriptionAdd-patient_prescription-add'); // add
    $app->any('/PatientPrescriptionView[/{id}]', PatientPrescriptionController::class . ':view')->add(PermissionMiddleware::class)->setName('PatientPrescriptionView-patient_prescription-view'); // view
    $app->any('/PatientPrescriptionEdit[/{id}]', PatientPrescriptionController::class . ':edit')->add(PermissionMiddleware::class)->setName('PatientPrescriptionEdit-patient_prescription-edit'); // edit
    $app->any('/PatientPrescriptionDelete[/{id}]', PatientPrescriptionController::class . ':delete')->add(PermissionMiddleware::class)->setName('PatientPrescriptionDelete-patient_prescription-delete'); // delete
    $app->group(
        '/patient_prescription',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', PatientPrescriptionController::class . ':list')->add(PermissionMiddleware::class)->setName('patient_prescription/list-patient_prescription-list-2'); // list
            $group->any('/add[/{id}]', PatientPrescriptionController::class . ':add')->add(PermissionMiddleware::class)->setName('patient_prescription/add-patient_prescription-add-2'); // add
            $group->any('/view[/{id}]', PatientPrescriptionController::class . ':view')->add(PermissionMiddleware::class)->setName('patient_prescription/view-patient_prescription-view-2'); // view
            $group->any('/edit[/{id}]', PatientPrescriptionController::class . ':edit')->add(PermissionMiddleware::class)->setName('patient_prescription/edit-patient_prescription-edit-2'); // edit
            $group->any('/delete[/{id}]', PatientPrescriptionController::class . ':delete')->add(PermissionMiddleware::class)->setName('patient_prescription/delete-patient_prescription-delete-2'); // delete
        }
    );

    // patient_provisional_diagnosis
    $app->any('/PatientProvisionalDiagnosisList[/{id}]', PatientProvisionalDiagnosisController::class . ':list')->add(PermissionMiddleware::class)->setName('PatientProvisionalDiagnosisList-patient_provisional_diagnosis-list'); // list
    $app->any('/PatientProvisionalDiagnosisAdd[/{id}]', PatientProvisionalDiagnosisController::class . ':add')->add(PermissionMiddleware::class)->setName('PatientProvisionalDiagnosisAdd-patient_provisional_diagnosis-add'); // add
    $app->any('/PatientProvisionalDiagnosisView[/{id}]', PatientProvisionalDiagnosisController::class . ':view')->add(PermissionMiddleware::class)->setName('PatientProvisionalDiagnosisView-patient_provisional_diagnosis-view'); // view
    $app->any('/PatientProvisionalDiagnosisEdit[/{id}]', PatientProvisionalDiagnosisController::class . ':edit')->add(PermissionMiddleware::class)->setName('PatientProvisionalDiagnosisEdit-patient_provisional_diagnosis-edit'); // edit
    $app->any('/PatientProvisionalDiagnosisDelete[/{id}]', PatientProvisionalDiagnosisController::class . ':delete')->add(PermissionMiddleware::class)->setName('PatientProvisionalDiagnosisDelete-patient_provisional_diagnosis-delete'); // delete
    $app->group(
        '/patient_provisional_diagnosis',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', PatientProvisionalDiagnosisController::class . ':list')->add(PermissionMiddleware::class)->setName('patient_provisional_diagnosis/list-patient_provisional_diagnosis-list-2'); // list
            $group->any('/add[/{id}]', PatientProvisionalDiagnosisController::class . ':add')->add(PermissionMiddleware::class)->setName('patient_provisional_diagnosis/add-patient_provisional_diagnosis-add-2'); // add
            $group->any('/view[/{id}]', PatientProvisionalDiagnosisController::class . ':view')->add(PermissionMiddleware::class)->setName('patient_provisional_diagnosis/view-patient_provisional_diagnosis-view-2'); // view
            $group->any('/edit[/{id}]', PatientProvisionalDiagnosisController::class . ':edit')->add(PermissionMiddleware::class)->setName('patient_provisional_diagnosis/edit-patient_provisional_diagnosis-edit-2'); // edit
            $group->any('/delete[/{id}]', PatientProvisionalDiagnosisController::class . ':delete')->add(PermissionMiddleware::class)->setName('patient_provisional_diagnosis/delete-patient_provisional_diagnosis-delete-2'); // delete
        }
    );

    // patient_room
    $app->any('/PatientRoomList[/{id}]', PatientRoomController::class . ':list')->add(PermissionMiddleware::class)->setName('PatientRoomList-patient_room-list'); // list
    $app->any('/PatientRoomAdd[/{id}]', PatientRoomController::class . ':add')->add(PermissionMiddleware::class)->setName('PatientRoomAdd-patient_room-add'); // add
    $app->any('/PatientRoomView[/{id}]', PatientRoomController::class . ':view')->add(PermissionMiddleware::class)->setName('PatientRoomView-patient_room-view'); // view
    $app->any('/PatientRoomEdit[/{id}]', PatientRoomController::class . ':edit')->add(PermissionMiddleware::class)->setName('PatientRoomEdit-patient_room-edit'); // edit
    $app->any('/PatientRoomDelete[/{id}]', PatientRoomController::class . ':delete')->add(PermissionMiddleware::class)->setName('PatientRoomDelete-patient_room-delete'); // delete
    $app->group(
        '/patient_room',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', PatientRoomController::class . ':list')->add(PermissionMiddleware::class)->setName('patient_room/list-patient_room-list-2'); // list
            $group->any('/add[/{id}]', PatientRoomController::class . ':add')->add(PermissionMiddleware::class)->setName('patient_room/add-patient_room-add-2'); // add
            $group->any('/view[/{id}]', PatientRoomController::class . ':view')->add(PermissionMiddleware::class)->setName('patient_room/view-patient_room-view-2'); // view
            $group->any('/edit[/{id}]', PatientRoomController::class . ':edit')->add(PermissionMiddleware::class)->setName('patient_room/edit-patient_room-edit-2'); // edit
            $group->any('/delete[/{id}]', PatientRoomController::class . ':delete')->add(PermissionMiddleware::class)->setName('patient_room/delete-patient_room-delete-2'); // delete
        }
    );

    // patient_services
    $app->any('/PatientServicesList[/{id}]', PatientServicesController::class . ':list')->add(PermissionMiddleware::class)->setName('PatientServicesList-patient_services-list'); // list
    $app->any('/PatientServicesAdd[/{id}]', PatientServicesController::class . ':add')->add(PermissionMiddleware::class)->setName('PatientServicesAdd-patient_services-add'); // add
    $app->any('/PatientServicesView[/{id}]', PatientServicesController::class . ':view')->add(PermissionMiddleware::class)->setName('PatientServicesView-patient_services-view'); // view
    $app->any('/PatientServicesEdit[/{id}]', PatientServicesController::class . ':edit')->add(PermissionMiddleware::class)->setName('PatientServicesEdit-patient_services-edit'); // edit
    $app->any('/PatientServicesDelete[/{id}]', PatientServicesController::class . ':delete')->add(PermissionMiddleware::class)->setName('PatientServicesDelete-patient_services-delete'); // delete
    $app->group(
        '/patient_services',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', PatientServicesController::class . ':list')->add(PermissionMiddleware::class)->setName('patient_services/list-patient_services-list-2'); // list
            $group->any('/add[/{id}]', PatientServicesController::class . ':add')->add(PermissionMiddleware::class)->setName('patient_services/add-patient_services-add-2'); // add
            $group->any('/view[/{id}]', PatientServicesController::class . ':view')->add(PermissionMiddleware::class)->setName('patient_services/view-patient_services-view-2'); // view
            $group->any('/edit[/{id}]', PatientServicesController::class . ':edit')->add(PermissionMiddleware::class)->setName('patient_services/edit-patient_services-edit-2'); // edit
            $group->any('/delete[/{id}]', PatientServicesController::class . ':delete')->add(PermissionMiddleware::class)->setName('patient_services/delete-patient_services-delete-2'); // delete
        }
    );

    // patient_telephone
    $app->any('/PatientTelephoneList[/{id}]', PatientTelephoneController::class . ':list')->add(PermissionMiddleware::class)->setName('PatientTelephoneList-patient_telephone-list'); // list
    $app->any('/PatientTelephoneAdd[/{id}]', PatientTelephoneController::class . ':add')->add(PermissionMiddleware::class)->setName('PatientTelephoneAdd-patient_telephone-add'); // add
    $app->any('/PatientTelephoneView[/{id}]', PatientTelephoneController::class . ':view')->add(PermissionMiddleware::class)->setName('PatientTelephoneView-patient_telephone-view'); // view
    $app->any('/PatientTelephoneEdit[/{id}]', PatientTelephoneController::class . ':edit')->add(PermissionMiddleware::class)->setName('PatientTelephoneEdit-patient_telephone-edit'); // edit
    $app->any('/PatientTelephoneDelete[/{id}]', PatientTelephoneController::class . ':delete')->add(PermissionMiddleware::class)->setName('PatientTelephoneDelete-patient_telephone-delete'); // delete
    $app->group(
        '/patient_telephone',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', PatientTelephoneController::class . ':list')->add(PermissionMiddleware::class)->setName('patient_telephone/list-patient_telephone-list-2'); // list
            $group->any('/add[/{id}]', PatientTelephoneController::class . ':add')->add(PermissionMiddleware::class)->setName('patient_telephone/add-patient_telephone-add-2'); // add
            $group->any('/view[/{id}]', PatientTelephoneController::class . ':view')->add(PermissionMiddleware::class)->setName('patient_telephone/view-patient_telephone-view-2'); // view
            $group->any('/edit[/{id}]', PatientTelephoneController::class . ':edit')->add(PermissionMiddleware::class)->setName('patient_telephone/edit-patient_telephone-edit-2'); // edit
            $group->any('/delete[/{id}]', PatientTelephoneController::class . ':delete')->add(PermissionMiddleware::class)->setName('patient_telephone/delete-patient_telephone-delete-2'); // delete
        }
    );

    // patient_vitals
    $app->any('/PatientVitalsList[/{id}]', PatientVitalsController::class . ':list')->add(PermissionMiddleware::class)->setName('PatientVitalsList-patient_vitals-list'); // list
    $app->any('/PatientVitalsAdd[/{id}]', PatientVitalsController::class . ':add')->add(PermissionMiddleware::class)->setName('PatientVitalsAdd-patient_vitals-add'); // add
    $app->any('/PatientVitalsView[/{id}]', PatientVitalsController::class . ':view')->add(PermissionMiddleware::class)->setName('PatientVitalsView-patient_vitals-view'); // view
    $app->any('/PatientVitalsEdit[/{id}]', PatientVitalsController::class . ':edit')->add(PermissionMiddleware::class)->setName('PatientVitalsEdit-patient_vitals-edit'); // edit
    $app->any('/PatientVitalsDelete[/{id}]', PatientVitalsController::class . ':delete')->add(PermissionMiddleware::class)->setName('PatientVitalsDelete-patient_vitals-delete'); // delete
    $app->group(
        '/patient_vitals',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', PatientVitalsController::class . ':list')->add(PermissionMiddleware::class)->setName('patient_vitals/list-patient_vitals-list-2'); // list
            $group->any('/add[/{id}]', PatientVitalsController::class . ':add')->add(PermissionMiddleware::class)->setName('patient_vitals/add-patient_vitals-add-2'); // add
            $group->any('/view[/{id}]', PatientVitalsController::class . ':view')->add(PermissionMiddleware::class)->setName('patient_vitals/view-patient_vitals-view-2'); // view
            $group->any('/edit[/{id}]', PatientVitalsController::class . ':edit')->add(PermissionMiddleware::class)->setName('patient_vitals/edit-patient_vitals-edit-2'); // edit
            $group->any('/delete[/{id}]', PatientVitalsController::class . ':delete')->add(PermissionMiddleware::class)->setName('patient_vitals/delete-patient_vitals-delete-2'); // delete
        }
    );

    // pharmacy
    $app->any('/PharmacyList[/{id}]', PharmacyController::class . ':list')->add(PermissionMiddleware::class)->setName('PharmacyList-pharmacy-list'); // list
    $app->any('/PharmacyAdd[/{id}]', PharmacyController::class . ':add')->add(PermissionMiddleware::class)->setName('PharmacyAdd-pharmacy-add'); // add
    $app->any('/PharmacyView[/{id}]', PharmacyController::class . ':view')->add(PermissionMiddleware::class)->setName('PharmacyView-pharmacy-view'); // view
    $app->any('/PharmacyEdit[/{id}]', PharmacyController::class . ':edit')->add(PermissionMiddleware::class)->setName('PharmacyEdit-pharmacy-edit'); // edit
    $app->any('/PharmacyDelete[/{id}]', PharmacyController::class . ':delete')->add(PermissionMiddleware::class)->setName('PharmacyDelete-pharmacy-delete'); // delete
    $app->group(
        '/pharmacy',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', PharmacyController::class . ':list')->add(PermissionMiddleware::class)->setName('pharmacy/list-pharmacy-list-2'); // list
            $group->any('/add[/{id}]', PharmacyController::class . ':add')->add(PermissionMiddleware::class)->setName('pharmacy/add-pharmacy-add-2'); // add
            $group->any('/view[/{id}]', PharmacyController::class . ':view')->add(PermissionMiddleware::class)->setName('pharmacy/view-pharmacy-view-2'); // view
            $group->any('/edit[/{id}]', PharmacyController::class . ':edit')->add(PermissionMiddleware::class)->setName('pharmacy/edit-pharmacy-edit-2'); // edit
            $group->any('/delete[/{id}]', PharmacyController::class . ':delete')->add(PermissionMiddleware::class)->setName('pharmacy/delete-pharmacy-delete-2'); // delete
        }
    );

    // pharmacy_batchmas
    $app->any('/PharmacyBatchmasList[/{id}]', PharmacyBatchmasController::class . ':list')->add(PermissionMiddleware::class)->setName('PharmacyBatchmasList-pharmacy_batchmas-list'); // list
    $app->any('/PharmacyBatchmasAdd[/{id}]', PharmacyBatchmasController::class . ':add')->add(PermissionMiddleware::class)->setName('PharmacyBatchmasAdd-pharmacy_batchmas-add'); // add
    $app->any('/PharmacyBatchmasView[/{id}]', PharmacyBatchmasController::class . ':view')->add(PermissionMiddleware::class)->setName('PharmacyBatchmasView-pharmacy_batchmas-view'); // view
    $app->any('/PharmacyBatchmasEdit[/{id}]', PharmacyBatchmasController::class . ':edit')->add(PermissionMiddleware::class)->setName('PharmacyBatchmasEdit-pharmacy_batchmas-edit'); // edit
    $app->any('/PharmacyBatchmasDelete[/{id}]', PharmacyBatchmasController::class . ':delete')->add(PermissionMiddleware::class)->setName('PharmacyBatchmasDelete-pharmacy_batchmas-delete'); // delete
    $app->group(
        '/pharmacy_batchmas',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', PharmacyBatchmasController::class . ':list')->add(PermissionMiddleware::class)->setName('pharmacy_batchmas/list-pharmacy_batchmas-list-2'); // list
            $group->any('/add[/{id}]', PharmacyBatchmasController::class . ':add')->add(PermissionMiddleware::class)->setName('pharmacy_batchmas/add-pharmacy_batchmas-add-2'); // add
            $group->any('/view[/{id}]', PharmacyBatchmasController::class . ':view')->add(PermissionMiddleware::class)->setName('pharmacy_batchmas/view-pharmacy_batchmas-view-2'); // view
            $group->any('/edit[/{id}]', PharmacyBatchmasController::class . ':edit')->add(PermissionMiddleware::class)->setName('pharmacy_batchmas/edit-pharmacy_batchmas-edit-2'); // edit
            $group->any('/delete[/{id}]', PharmacyBatchmasController::class . ':delete')->add(PermissionMiddleware::class)->setName('pharmacy_batchmas/delete-pharmacy_batchmas-delete-2'); // delete
        }
    );

    // pharmacy_billing_issue
    $app->any('/PharmacyBillingIssueList[/{id}]', PharmacyBillingIssueController::class . ':list')->add(PermissionMiddleware::class)->setName('PharmacyBillingIssueList-pharmacy_billing_issue-list'); // list
    $app->any('/PharmacyBillingIssueAdd[/{id}]', PharmacyBillingIssueController::class . ':add')->add(PermissionMiddleware::class)->setName('PharmacyBillingIssueAdd-pharmacy_billing_issue-add'); // add
    $app->any('/PharmacyBillingIssueView[/{id}]', PharmacyBillingIssueController::class . ':view')->add(PermissionMiddleware::class)->setName('PharmacyBillingIssueView-pharmacy_billing_issue-view'); // view
    $app->any('/PharmacyBillingIssueEdit[/{id}]', PharmacyBillingIssueController::class . ':edit')->add(PermissionMiddleware::class)->setName('PharmacyBillingIssueEdit-pharmacy_billing_issue-edit'); // edit
    $app->any('/PharmacyBillingIssueDelete[/{id}]', PharmacyBillingIssueController::class . ':delete')->add(PermissionMiddleware::class)->setName('PharmacyBillingIssueDelete-pharmacy_billing_issue-delete'); // delete
    $app->group(
        '/pharmacy_billing_issue',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', PharmacyBillingIssueController::class . ':list')->add(PermissionMiddleware::class)->setName('pharmacy_billing_issue/list-pharmacy_billing_issue-list-2'); // list
            $group->any('/add[/{id}]', PharmacyBillingIssueController::class . ':add')->add(PermissionMiddleware::class)->setName('pharmacy_billing_issue/add-pharmacy_billing_issue-add-2'); // add
            $group->any('/view[/{id}]', PharmacyBillingIssueController::class . ':view')->add(PermissionMiddleware::class)->setName('pharmacy_billing_issue/view-pharmacy_billing_issue-view-2'); // view
            $group->any('/edit[/{id}]', PharmacyBillingIssueController::class . ':edit')->add(PermissionMiddleware::class)->setName('pharmacy_billing_issue/edit-pharmacy_billing_issue-edit-2'); // edit
            $group->any('/delete[/{id}]', PharmacyBillingIssueController::class . ':delete')->add(PermissionMiddleware::class)->setName('pharmacy_billing_issue/delete-pharmacy_billing_issue-delete-2'); // delete
        }
    );

    // pharmacy_billing_return
    $app->any('/PharmacyBillingReturnList[/{id}]', PharmacyBillingReturnController::class . ':list')->add(PermissionMiddleware::class)->setName('PharmacyBillingReturnList-pharmacy_billing_return-list'); // list
    $app->any('/PharmacyBillingReturnAdd[/{id}]', PharmacyBillingReturnController::class . ':add')->add(PermissionMiddleware::class)->setName('PharmacyBillingReturnAdd-pharmacy_billing_return-add'); // add
    $app->any('/PharmacyBillingReturnView[/{id}]', PharmacyBillingReturnController::class . ':view')->add(PermissionMiddleware::class)->setName('PharmacyBillingReturnView-pharmacy_billing_return-view'); // view
    $app->any('/PharmacyBillingReturnEdit[/{id}]', PharmacyBillingReturnController::class . ':edit')->add(PermissionMiddleware::class)->setName('PharmacyBillingReturnEdit-pharmacy_billing_return-edit'); // edit
    $app->any('/PharmacyBillingReturnDelete[/{id}]', PharmacyBillingReturnController::class . ':delete')->add(PermissionMiddleware::class)->setName('PharmacyBillingReturnDelete-pharmacy_billing_return-delete'); // delete
    $app->group(
        '/pharmacy_billing_return',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', PharmacyBillingReturnController::class . ':list')->add(PermissionMiddleware::class)->setName('pharmacy_billing_return/list-pharmacy_billing_return-list-2'); // list
            $group->any('/add[/{id}]', PharmacyBillingReturnController::class . ':add')->add(PermissionMiddleware::class)->setName('pharmacy_billing_return/add-pharmacy_billing_return-add-2'); // add
            $group->any('/view[/{id}]', PharmacyBillingReturnController::class . ':view')->add(PermissionMiddleware::class)->setName('pharmacy_billing_return/view-pharmacy_billing_return-view-2'); // view
            $group->any('/edit[/{id}]', PharmacyBillingReturnController::class . ':edit')->add(PermissionMiddleware::class)->setName('pharmacy_billing_return/edit-pharmacy_billing_return-edit-2'); // edit
            $group->any('/delete[/{id}]', PharmacyBillingReturnController::class . ':delete')->add(PermissionMiddleware::class)->setName('pharmacy_billing_return/delete-pharmacy_billing_return-delete-2'); // delete
        }
    );

    // pharmacy_billing_transfer
    $app->any('/PharmacyBillingTransferList[/{id}]', PharmacyBillingTransferController::class . ':list')->add(PermissionMiddleware::class)->setName('PharmacyBillingTransferList-pharmacy_billing_transfer-list'); // list
    $app->any('/PharmacyBillingTransferAdd[/{id}]', PharmacyBillingTransferController::class . ':add')->add(PermissionMiddleware::class)->setName('PharmacyBillingTransferAdd-pharmacy_billing_transfer-add'); // add
    $app->any('/PharmacyBillingTransferView[/{id}]', PharmacyBillingTransferController::class . ':view')->add(PermissionMiddleware::class)->setName('PharmacyBillingTransferView-pharmacy_billing_transfer-view'); // view
    $app->any('/PharmacyBillingTransferEdit[/{id}]', PharmacyBillingTransferController::class . ':edit')->add(PermissionMiddleware::class)->setName('PharmacyBillingTransferEdit-pharmacy_billing_transfer-edit'); // edit
    $app->any('/PharmacyBillingTransferDelete[/{id}]', PharmacyBillingTransferController::class . ':delete')->add(PermissionMiddleware::class)->setName('PharmacyBillingTransferDelete-pharmacy_billing_transfer-delete'); // delete
    $app->group(
        '/pharmacy_billing_transfer',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', PharmacyBillingTransferController::class . ':list')->add(PermissionMiddleware::class)->setName('pharmacy_billing_transfer/list-pharmacy_billing_transfer-list-2'); // list
            $group->any('/add[/{id}]', PharmacyBillingTransferController::class . ':add')->add(PermissionMiddleware::class)->setName('pharmacy_billing_transfer/add-pharmacy_billing_transfer-add-2'); // add
            $group->any('/view[/{id}]', PharmacyBillingTransferController::class . ':view')->add(PermissionMiddleware::class)->setName('pharmacy_billing_transfer/view-pharmacy_billing_transfer-view-2'); // view
            $group->any('/edit[/{id}]', PharmacyBillingTransferController::class . ':edit')->add(PermissionMiddleware::class)->setName('pharmacy_billing_transfer/edit-pharmacy_billing_transfer-edit-2'); // edit
            $group->any('/delete[/{id}]', PharmacyBillingTransferController::class . ':delete')->add(PermissionMiddleware::class)->setName('pharmacy_billing_transfer/delete-pharmacy_billing_transfer-delete-2'); // delete
        }
    );

    // pharmacy_billing_voucher
    $app->any('/PharmacyBillingVoucherList[/{id}]', PharmacyBillingVoucherController::class . ':list')->add(PermissionMiddleware::class)->setName('PharmacyBillingVoucherList-pharmacy_billing_voucher-list'); // list
    $app->any('/PharmacyBillingVoucherAdd[/{id}]', PharmacyBillingVoucherController::class . ':add')->add(PermissionMiddleware::class)->setName('PharmacyBillingVoucherAdd-pharmacy_billing_voucher-add'); // add
    $app->any('/PharmacyBillingVoucherView[/{id}]', PharmacyBillingVoucherController::class . ':view')->add(PermissionMiddleware::class)->setName('PharmacyBillingVoucherView-pharmacy_billing_voucher-view'); // view
    $app->any('/PharmacyBillingVoucherEdit[/{id}]', PharmacyBillingVoucherController::class . ':edit')->add(PermissionMiddleware::class)->setName('PharmacyBillingVoucherEdit-pharmacy_billing_voucher-edit'); // edit
    $app->any('/PharmacyBillingVoucherDelete[/{id}]', PharmacyBillingVoucherController::class . ':delete')->add(PermissionMiddleware::class)->setName('PharmacyBillingVoucherDelete-pharmacy_billing_voucher-delete'); // delete
    $app->group(
        '/pharmacy_billing_voucher',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', PharmacyBillingVoucherController::class . ':list')->add(PermissionMiddleware::class)->setName('pharmacy_billing_voucher/list-pharmacy_billing_voucher-list-2'); // list
            $group->any('/add[/{id}]', PharmacyBillingVoucherController::class . ':add')->add(PermissionMiddleware::class)->setName('pharmacy_billing_voucher/add-pharmacy_billing_voucher-add-2'); // add
            $group->any('/view[/{id}]', PharmacyBillingVoucherController::class . ':view')->add(PermissionMiddleware::class)->setName('pharmacy_billing_voucher/view-pharmacy_billing_voucher-view-2'); // view
            $group->any('/edit[/{id}]', PharmacyBillingVoucherController::class . ':edit')->add(PermissionMiddleware::class)->setName('pharmacy_billing_voucher/edit-pharmacy_billing_voucher-edit-2'); // edit
            $group->any('/delete[/{id}]', PharmacyBillingVoucherController::class . ':delete')->add(PermissionMiddleware::class)->setName('pharmacy_billing_voucher/delete-pharmacy_billing_voucher-delete-2'); // delete
        }
    );

    // pharmacy_comb_master
    $app->any('/PharmacyCombMasterList[/{id}]', PharmacyCombMasterController::class . ':list')->add(PermissionMiddleware::class)->setName('PharmacyCombMasterList-pharmacy_comb_master-list'); // list
    $app->any('/PharmacyCombMasterAdd[/{id}]', PharmacyCombMasterController::class . ':add')->add(PermissionMiddleware::class)->setName('PharmacyCombMasterAdd-pharmacy_comb_master-add'); // add
    $app->any('/PharmacyCombMasterView[/{id}]', PharmacyCombMasterController::class . ':view')->add(PermissionMiddleware::class)->setName('PharmacyCombMasterView-pharmacy_comb_master-view'); // view
    $app->any('/PharmacyCombMasterEdit[/{id}]', PharmacyCombMasterController::class . ':edit')->add(PermissionMiddleware::class)->setName('PharmacyCombMasterEdit-pharmacy_comb_master-edit'); // edit
    $app->any('/PharmacyCombMasterDelete[/{id}]', PharmacyCombMasterController::class . ':delete')->add(PermissionMiddleware::class)->setName('PharmacyCombMasterDelete-pharmacy_comb_master-delete'); // delete
    $app->group(
        '/pharmacy_comb_master',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', PharmacyCombMasterController::class . ':list')->add(PermissionMiddleware::class)->setName('pharmacy_comb_master/list-pharmacy_comb_master-list-2'); // list
            $group->any('/add[/{id}]', PharmacyCombMasterController::class . ':add')->add(PermissionMiddleware::class)->setName('pharmacy_comb_master/add-pharmacy_comb_master-add-2'); // add
            $group->any('/view[/{id}]', PharmacyCombMasterController::class . ':view')->add(PermissionMiddleware::class)->setName('pharmacy_comb_master/view-pharmacy_comb_master-view-2'); // view
            $group->any('/edit[/{id}]', PharmacyCombMasterController::class . ':edit')->add(PermissionMiddleware::class)->setName('pharmacy_comb_master/edit-pharmacy_comb_master-edit-2'); // edit
            $group->any('/delete[/{id}]', PharmacyCombMasterController::class . ':delete')->add(PermissionMiddleware::class)->setName('pharmacy_comb_master/delete-pharmacy_comb_master-delete-2'); // delete
        }
    );

    // pharmacy_combination
    $app->any('/PharmacyCombinationList[/{id}]', PharmacyCombinationController::class . ':list')->add(PermissionMiddleware::class)->setName('PharmacyCombinationList-pharmacy_combination-list'); // list
    $app->any('/PharmacyCombinationAdd[/{id}]', PharmacyCombinationController::class . ':add')->add(PermissionMiddleware::class)->setName('PharmacyCombinationAdd-pharmacy_combination-add'); // add
    $app->any('/PharmacyCombinationView[/{id}]', PharmacyCombinationController::class . ':view')->add(PermissionMiddleware::class)->setName('PharmacyCombinationView-pharmacy_combination-view'); // view
    $app->any('/PharmacyCombinationEdit[/{id}]', PharmacyCombinationController::class . ':edit')->add(PermissionMiddleware::class)->setName('PharmacyCombinationEdit-pharmacy_combination-edit'); // edit
    $app->any('/PharmacyCombinationDelete[/{id}]', PharmacyCombinationController::class . ':delete')->add(PermissionMiddleware::class)->setName('PharmacyCombinationDelete-pharmacy_combination-delete'); // delete
    $app->group(
        '/pharmacy_combination',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', PharmacyCombinationController::class . ':list')->add(PermissionMiddleware::class)->setName('pharmacy_combination/list-pharmacy_combination-list-2'); // list
            $group->any('/add[/{id}]', PharmacyCombinationController::class . ':add')->add(PermissionMiddleware::class)->setName('pharmacy_combination/add-pharmacy_combination-add-2'); // add
            $group->any('/view[/{id}]', PharmacyCombinationController::class . ':view')->add(PermissionMiddleware::class)->setName('pharmacy_combination/view-pharmacy_combination-view-2'); // view
            $group->any('/edit[/{id}]', PharmacyCombinationController::class . ':edit')->add(PermissionMiddleware::class)->setName('pharmacy_combination/edit-pharmacy_combination-edit-2'); // edit
            $group->any('/delete[/{id}]', PharmacyCombinationController::class . ':delete')->add(PermissionMiddleware::class)->setName('pharmacy_combination/delete-pharmacy_combination-delete-2'); // delete
        }
    );

    // pharmacy_customers
    $app->any('/PharmacyCustomersList[/{id}]', PharmacyCustomersController::class . ':list')->add(PermissionMiddleware::class)->setName('PharmacyCustomersList-pharmacy_customers-list'); // list
    $app->any('/PharmacyCustomersAdd[/{id}]', PharmacyCustomersController::class . ':add')->add(PermissionMiddleware::class)->setName('PharmacyCustomersAdd-pharmacy_customers-add'); // add
    $app->any('/PharmacyCustomersView[/{id}]', PharmacyCustomersController::class . ':view')->add(PermissionMiddleware::class)->setName('PharmacyCustomersView-pharmacy_customers-view'); // view
    $app->any('/PharmacyCustomersEdit[/{id}]', PharmacyCustomersController::class . ':edit')->add(PermissionMiddleware::class)->setName('PharmacyCustomersEdit-pharmacy_customers-edit'); // edit
    $app->any('/PharmacyCustomersDelete[/{id}]', PharmacyCustomersController::class . ':delete')->add(PermissionMiddleware::class)->setName('PharmacyCustomersDelete-pharmacy_customers-delete'); // delete
    $app->group(
        '/pharmacy_customers',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', PharmacyCustomersController::class . ':list')->add(PermissionMiddleware::class)->setName('pharmacy_customers/list-pharmacy_customers-list-2'); // list
            $group->any('/add[/{id}]', PharmacyCustomersController::class . ':add')->add(PermissionMiddleware::class)->setName('pharmacy_customers/add-pharmacy_customers-add-2'); // add
            $group->any('/view[/{id}]', PharmacyCustomersController::class . ':view')->add(PermissionMiddleware::class)->setName('pharmacy_customers/view-pharmacy_customers-view-2'); // view
            $group->any('/edit[/{id}]', PharmacyCustomersController::class . ':edit')->add(PermissionMiddleware::class)->setName('pharmacy_customers/edit-pharmacy_customers-edit-2'); // edit
            $group->any('/delete[/{id}]', PharmacyCustomersController::class . ':delete')->add(PermissionMiddleware::class)->setName('pharmacy_customers/delete-pharmacy_customers-delete-2'); // delete
        }
    );

    // pharmacy_grn
    $app->any('/PharmacyGrnList[/{id}]', PharmacyGrnController::class . ':list')->add(PermissionMiddleware::class)->setName('PharmacyGrnList-pharmacy_grn-list'); // list
    $app->any('/PharmacyGrnAdd[/{id}]', PharmacyGrnController::class . ':add')->add(PermissionMiddleware::class)->setName('PharmacyGrnAdd-pharmacy_grn-add'); // add
    $app->any('/PharmacyGrnView[/{id}]', PharmacyGrnController::class . ':view')->add(PermissionMiddleware::class)->setName('PharmacyGrnView-pharmacy_grn-view'); // view
    $app->any('/PharmacyGrnEdit[/{id}]', PharmacyGrnController::class . ':edit')->add(PermissionMiddleware::class)->setName('PharmacyGrnEdit-pharmacy_grn-edit'); // edit
    $app->any('/PharmacyGrnDelete[/{id}]', PharmacyGrnController::class . ':delete')->add(PermissionMiddleware::class)->setName('PharmacyGrnDelete-pharmacy_grn-delete'); // delete
    $app->group(
        '/pharmacy_grn',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', PharmacyGrnController::class . ':list')->add(PermissionMiddleware::class)->setName('pharmacy_grn/list-pharmacy_grn-list-2'); // list
            $group->any('/add[/{id}]', PharmacyGrnController::class . ':add')->add(PermissionMiddleware::class)->setName('pharmacy_grn/add-pharmacy_grn-add-2'); // add
            $group->any('/view[/{id}]', PharmacyGrnController::class . ':view')->add(PermissionMiddleware::class)->setName('pharmacy_grn/view-pharmacy_grn-view-2'); // view
            $group->any('/edit[/{id}]', PharmacyGrnController::class . ':edit')->add(PermissionMiddleware::class)->setName('pharmacy_grn/edit-pharmacy_grn-edit-2'); // edit
            $group->any('/delete[/{id}]', PharmacyGrnController::class . ':delete')->add(PermissionMiddleware::class)->setName('pharmacy_grn/delete-pharmacy_grn-delete-2'); // delete
        }
    );

    // pharmacy_master_generic
    $app->any('/PharmacyMasterGenericList[/{id}]', PharmacyMasterGenericController::class . ':list')->add(PermissionMiddleware::class)->setName('PharmacyMasterGenericList-pharmacy_master_generic-list'); // list
    $app->any('/PharmacyMasterGenericAdd[/{id}]', PharmacyMasterGenericController::class . ':add')->add(PermissionMiddleware::class)->setName('PharmacyMasterGenericAdd-pharmacy_master_generic-add'); // add
    $app->any('/PharmacyMasterGenericView[/{id}]', PharmacyMasterGenericController::class . ':view')->add(PermissionMiddleware::class)->setName('PharmacyMasterGenericView-pharmacy_master_generic-view'); // view
    $app->any('/PharmacyMasterGenericEdit[/{id}]', PharmacyMasterGenericController::class . ':edit')->add(PermissionMiddleware::class)->setName('PharmacyMasterGenericEdit-pharmacy_master_generic-edit'); // edit
    $app->any('/PharmacyMasterGenericDelete[/{id}]', PharmacyMasterGenericController::class . ':delete')->add(PermissionMiddleware::class)->setName('PharmacyMasterGenericDelete-pharmacy_master_generic-delete'); // delete
    $app->group(
        '/pharmacy_master_generic',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', PharmacyMasterGenericController::class . ':list')->add(PermissionMiddleware::class)->setName('pharmacy_master_generic/list-pharmacy_master_generic-list-2'); // list
            $group->any('/add[/{id}]', PharmacyMasterGenericController::class . ':add')->add(PermissionMiddleware::class)->setName('pharmacy_master_generic/add-pharmacy_master_generic-add-2'); // add
            $group->any('/view[/{id}]', PharmacyMasterGenericController::class . ':view')->add(PermissionMiddleware::class)->setName('pharmacy_master_generic/view-pharmacy_master_generic-view-2'); // view
            $group->any('/edit[/{id}]', PharmacyMasterGenericController::class . ':edit')->add(PermissionMiddleware::class)->setName('pharmacy_master_generic/edit-pharmacy_master_generic-edit-2'); // edit
            $group->any('/delete[/{id}]', PharmacyMasterGenericController::class . ':delete')->add(PermissionMiddleware::class)->setName('pharmacy_master_generic/delete-pharmacy_master_generic-delete-2'); // delete
        }
    );

    // pharmacy_master_genericgrp
    $app->any('/PharmacyMasterGenericgrpList[/{id}]', PharmacyMasterGenericgrpController::class . ':list')->add(PermissionMiddleware::class)->setName('PharmacyMasterGenericgrpList-pharmacy_master_genericgrp-list'); // list
    $app->any('/PharmacyMasterGenericgrpAdd[/{id}]', PharmacyMasterGenericgrpController::class . ':add')->add(PermissionMiddleware::class)->setName('PharmacyMasterGenericgrpAdd-pharmacy_master_genericgrp-add'); // add
    $app->any('/PharmacyMasterGenericgrpView[/{id}]', PharmacyMasterGenericgrpController::class . ':view')->add(PermissionMiddleware::class)->setName('PharmacyMasterGenericgrpView-pharmacy_master_genericgrp-view'); // view
    $app->any('/PharmacyMasterGenericgrpEdit[/{id}]', PharmacyMasterGenericgrpController::class . ':edit')->add(PermissionMiddleware::class)->setName('PharmacyMasterGenericgrpEdit-pharmacy_master_genericgrp-edit'); // edit
    $app->any('/PharmacyMasterGenericgrpDelete[/{id}]', PharmacyMasterGenericgrpController::class . ':delete')->add(PermissionMiddleware::class)->setName('PharmacyMasterGenericgrpDelete-pharmacy_master_genericgrp-delete'); // delete
    $app->group(
        '/pharmacy_master_genericgrp',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', PharmacyMasterGenericgrpController::class . ':list')->add(PermissionMiddleware::class)->setName('pharmacy_master_genericgrp/list-pharmacy_master_genericgrp-list-2'); // list
            $group->any('/add[/{id}]', PharmacyMasterGenericgrpController::class . ':add')->add(PermissionMiddleware::class)->setName('pharmacy_master_genericgrp/add-pharmacy_master_genericgrp-add-2'); // add
            $group->any('/view[/{id}]', PharmacyMasterGenericgrpController::class . ':view')->add(PermissionMiddleware::class)->setName('pharmacy_master_genericgrp/view-pharmacy_master_genericgrp-view-2'); // view
            $group->any('/edit[/{id}]', PharmacyMasterGenericgrpController::class . ':edit')->add(PermissionMiddleware::class)->setName('pharmacy_master_genericgrp/edit-pharmacy_master_genericgrp-edit-2'); // edit
            $group->any('/delete[/{id}]', PharmacyMasterGenericgrpController::class . ':delete')->add(PermissionMiddleware::class)->setName('pharmacy_master_genericgrp/delete-pharmacy_master_genericgrp-delete-2'); // delete
        }
    );

    // pharmacy_master_mfr_master
    $app->any('/PharmacyMasterMfrMasterList[/{id}]', PharmacyMasterMfrMasterController::class . ':list')->add(PermissionMiddleware::class)->setName('PharmacyMasterMfrMasterList-pharmacy_master_mfr_master-list'); // list
    $app->any('/PharmacyMasterMfrMasterAdd[/{id}]', PharmacyMasterMfrMasterController::class . ':add')->add(PermissionMiddleware::class)->setName('PharmacyMasterMfrMasterAdd-pharmacy_master_mfr_master-add'); // add
    $app->any('/PharmacyMasterMfrMasterView[/{id}]', PharmacyMasterMfrMasterController::class . ':view')->add(PermissionMiddleware::class)->setName('PharmacyMasterMfrMasterView-pharmacy_master_mfr_master-view'); // view
    $app->any('/PharmacyMasterMfrMasterEdit[/{id}]', PharmacyMasterMfrMasterController::class . ':edit')->add(PermissionMiddleware::class)->setName('PharmacyMasterMfrMasterEdit-pharmacy_master_mfr_master-edit'); // edit
    $app->any('/PharmacyMasterMfrMasterDelete[/{id}]', PharmacyMasterMfrMasterController::class . ':delete')->add(PermissionMiddleware::class)->setName('PharmacyMasterMfrMasterDelete-pharmacy_master_mfr_master-delete'); // delete
    $app->group(
        '/pharmacy_master_mfr_master',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', PharmacyMasterMfrMasterController::class . ':list')->add(PermissionMiddleware::class)->setName('pharmacy_master_mfr_master/list-pharmacy_master_mfr_master-list-2'); // list
            $group->any('/add[/{id}]', PharmacyMasterMfrMasterController::class . ':add')->add(PermissionMiddleware::class)->setName('pharmacy_master_mfr_master/add-pharmacy_master_mfr_master-add-2'); // add
            $group->any('/view[/{id}]', PharmacyMasterMfrMasterController::class . ':view')->add(PermissionMiddleware::class)->setName('pharmacy_master_mfr_master/view-pharmacy_master_mfr_master-view-2'); // view
            $group->any('/edit[/{id}]', PharmacyMasterMfrMasterController::class . ':edit')->add(PermissionMiddleware::class)->setName('pharmacy_master_mfr_master/edit-pharmacy_master_mfr_master-edit-2'); // edit
            $group->any('/delete[/{id}]', PharmacyMasterMfrMasterController::class . ':delete')->add(PermissionMiddleware::class)->setName('pharmacy_master_mfr_master/delete-pharmacy_master_mfr_master-delete-2'); // delete
        }
    );

    // pharmacy_master_product_similar
    $app->any('/PharmacyMasterProductSimilarList[/{id}]', PharmacyMasterProductSimilarController::class . ':list')->add(PermissionMiddleware::class)->setName('PharmacyMasterProductSimilarList-pharmacy_master_product_similar-list'); // list
    $app->any('/PharmacyMasterProductSimilarAdd[/{id}]', PharmacyMasterProductSimilarController::class . ':add')->add(PermissionMiddleware::class)->setName('PharmacyMasterProductSimilarAdd-pharmacy_master_product_similar-add'); // add
    $app->any('/PharmacyMasterProductSimilarView[/{id}]', PharmacyMasterProductSimilarController::class . ':view')->add(PermissionMiddleware::class)->setName('PharmacyMasterProductSimilarView-pharmacy_master_product_similar-view'); // view
    $app->any('/PharmacyMasterProductSimilarEdit[/{id}]', PharmacyMasterProductSimilarController::class . ':edit')->add(PermissionMiddleware::class)->setName('PharmacyMasterProductSimilarEdit-pharmacy_master_product_similar-edit'); // edit
    $app->any('/PharmacyMasterProductSimilarDelete[/{id}]', PharmacyMasterProductSimilarController::class . ':delete')->add(PermissionMiddleware::class)->setName('PharmacyMasterProductSimilarDelete-pharmacy_master_product_similar-delete'); // delete
    $app->group(
        '/pharmacy_master_product_similar',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', PharmacyMasterProductSimilarController::class . ':list')->add(PermissionMiddleware::class)->setName('pharmacy_master_product_similar/list-pharmacy_master_product_similar-list-2'); // list
            $group->any('/add[/{id}]', PharmacyMasterProductSimilarController::class . ':add')->add(PermissionMiddleware::class)->setName('pharmacy_master_product_similar/add-pharmacy_master_product_similar-add-2'); // add
            $group->any('/view[/{id}]', PharmacyMasterProductSimilarController::class . ':view')->add(PermissionMiddleware::class)->setName('pharmacy_master_product_similar/view-pharmacy_master_product_similar-view-2'); // view
            $group->any('/edit[/{id}]', PharmacyMasterProductSimilarController::class . ':edit')->add(PermissionMiddleware::class)->setName('pharmacy_master_product_similar/edit-pharmacy_master_product_similar-edit-2'); // edit
            $group->any('/delete[/{id}]', PharmacyMasterProductSimilarController::class . ':delete')->add(PermissionMiddleware::class)->setName('pharmacy_master_product_similar/delete-pharmacy_master_product_similar-delete-2'); // delete
        }
    );

    // pharmacy_payment
    $app->any('/PharmacyPaymentList[/{id}]', PharmacyPaymentController::class . ':list')->add(PermissionMiddleware::class)->setName('PharmacyPaymentList-pharmacy_payment-list'); // list
    $app->any('/PharmacyPaymentAdd[/{id}]', PharmacyPaymentController::class . ':add')->add(PermissionMiddleware::class)->setName('PharmacyPaymentAdd-pharmacy_payment-add'); // add
    $app->any('/PharmacyPaymentView[/{id}]', PharmacyPaymentController::class . ':view')->add(PermissionMiddleware::class)->setName('PharmacyPaymentView-pharmacy_payment-view'); // view
    $app->any('/PharmacyPaymentEdit[/{id}]', PharmacyPaymentController::class . ':edit')->add(PermissionMiddleware::class)->setName('PharmacyPaymentEdit-pharmacy_payment-edit'); // edit
    $app->any('/PharmacyPaymentDelete[/{id}]', PharmacyPaymentController::class . ':delete')->add(PermissionMiddleware::class)->setName('PharmacyPaymentDelete-pharmacy_payment-delete'); // delete
    $app->group(
        '/pharmacy_payment',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', PharmacyPaymentController::class . ':list')->add(PermissionMiddleware::class)->setName('pharmacy_payment/list-pharmacy_payment-list-2'); // list
            $group->any('/add[/{id}]', PharmacyPaymentController::class . ':add')->add(PermissionMiddleware::class)->setName('pharmacy_payment/add-pharmacy_payment-add-2'); // add
            $group->any('/view[/{id}]', PharmacyPaymentController::class . ':view')->add(PermissionMiddleware::class)->setName('pharmacy_payment/view-pharmacy_payment-view-2'); // view
            $group->any('/edit[/{id}]', PharmacyPaymentController::class . ':edit')->add(PermissionMiddleware::class)->setName('pharmacy_payment/edit-pharmacy_payment-edit-2'); // edit
            $group->any('/delete[/{id}]', PharmacyPaymentController::class . ':delete')->add(PermissionMiddleware::class)->setName('pharmacy_payment/delete-pharmacy_payment-delete-2'); // delete
        }
    );

    // pharmacy_pharled
    $app->any('/PharmacyPharledList[/{id}]', PharmacyPharledController::class . ':list')->add(PermissionMiddleware::class)->setName('PharmacyPharledList-pharmacy_pharled-list'); // list
    $app->any('/PharmacyPharledAdd[/{id}]', PharmacyPharledController::class . ':add')->add(PermissionMiddleware::class)->setName('PharmacyPharledAdd-pharmacy_pharled-add'); // add
    $app->any('/PharmacyPharledView[/{id}]', PharmacyPharledController::class . ':view')->add(PermissionMiddleware::class)->setName('PharmacyPharledView-pharmacy_pharled-view'); // view
    $app->any('/PharmacyPharledEdit[/{id}]', PharmacyPharledController::class . ':edit')->add(PermissionMiddleware::class)->setName('PharmacyPharledEdit-pharmacy_pharled-edit'); // edit
    $app->any('/PharmacyPharledDelete[/{id}]', PharmacyPharledController::class . ':delete')->add(PermissionMiddleware::class)->setName('PharmacyPharledDelete-pharmacy_pharled-delete'); // delete
    $app->group(
        '/pharmacy_pharled',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', PharmacyPharledController::class . ':list')->add(PermissionMiddleware::class)->setName('pharmacy_pharled/list-pharmacy_pharled-list-2'); // list
            $group->any('/add[/{id}]', PharmacyPharledController::class . ':add')->add(PermissionMiddleware::class)->setName('pharmacy_pharled/add-pharmacy_pharled-add-2'); // add
            $group->any('/view[/{id}]', PharmacyPharledController::class . ':view')->add(PermissionMiddleware::class)->setName('pharmacy_pharled/view-pharmacy_pharled-view-2'); // view
            $group->any('/edit[/{id}]', PharmacyPharledController::class . ':edit')->add(PermissionMiddleware::class)->setName('pharmacy_pharled/edit-pharmacy_pharled-edit-2'); // edit
            $group->any('/delete[/{id}]', PharmacyPharledController::class . ':delete')->add(PermissionMiddleware::class)->setName('pharmacy_pharled/delete-pharmacy_pharled-delete-2'); // delete
        }
    );

    // pharmacy_po
    $app->any('/PharmacyPoList[/{id}]', PharmacyPoController::class . ':list')->add(PermissionMiddleware::class)->setName('PharmacyPoList-pharmacy_po-list'); // list
    $app->any('/PharmacyPoAdd[/{id}]', PharmacyPoController::class . ':add')->add(PermissionMiddleware::class)->setName('PharmacyPoAdd-pharmacy_po-add'); // add
    $app->any('/PharmacyPoView[/{id}]', PharmacyPoController::class . ':view')->add(PermissionMiddleware::class)->setName('PharmacyPoView-pharmacy_po-view'); // view
    $app->any('/PharmacyPoEdit[/{id}]', PharmacyPoController::class . ':edit')->add(PermissionMiddleware::class)->setName('PharmacyPoEdit-pharmacy_po-edit'); // edit
    $app->any('/PharmacyPoDelete[/{id}]', PharmacyPoController::class . ':delete')->add(PermissionMiddleware::class)->setName('PharmacyPoDelete-pharmacy_po-delete'); // delete
    $app->group(
        '/pharmacy_po',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', PharmacyPoController::class . ':list')->add(PermissionMiddleware::class)->setName('pharmacy_po/list-pharmacy_po-list-2'); // list
            $group->any('/add[/{id}]', PharmacyPoController::class . ':add')->add(PermissionMiddleware::class)->setName('pharmacy_po/add-pharmacy_po-add-2'); // add
            $group->any('/view[/{id}]', PharmacyPoController::class . ':view')->add(PermissionMiddleware::class)->setName('pharmacy_po/view-pharmacy_po-view-2'); // view
            $group->any('/edit[/{id}]', PharmacyPoController::class . ':edit')->add(PermissionMiddleware::class)->setName('pharmacy_po/edit-pharmacy_po-edit-2'); // edit
            $group->any('/delete[/{id}]', PharmacyPoController::class . ':delete')->add(PermissionMiddleware::class)->setName('pharmacy_po/delete-pharmacy_po-delete-2'); // delete
        }
    );

    // pharmacy_products
    $app->any('/PharmacyProductsList[/{ProductCode}]', PharmacyProductsController::class . ':list')->add(PermissionMiddleware::class)->setName('PharmacyProductsList-pharmacy_products-list'); // list
    $app->any('/PharmacyProductsAdd[/{ProductCode}]', PharmacyProductsController::class . ':add')->add(PermissionMiddleware::class)->setName('PharmacyProductsAdd-pharmacy_products-add'); // add
    $app->any('/PharmacyProductsView[/{ProductCode}]', PharmacyProductsController::class . ':view')->add(PermissionMiddleware::class)->setName('PharmacyProductsView-pharmacy_products-view'); // view
    $app->any('/PharmacyProductsEdit[/{ProductCode}]', PharmacyProductsController::class . ':edit')->add(PermissionMiddleware::class)->setName('PharmacyProductsEdit-pharmacy_products-edit'); // edit
    $app->any('/PharmacyProductsDelete[/{ProductCode}]', PharmacyProductsController::class . ':delete')->add(PermissionMiddleware::class)->setName('PharmacyProductsDelete-pharmacy_products-delete'); // delete
    $app->group(
        '/pharmacy_products',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{ProductCode}]', PharmacyProductsController::class . ':list')->add(PermissionMiddleware::class)->setName('pharmacy_products/list-pharmacy_products-list-2'); // list
            $group->any('/add[/{ProductCode}]', PharmacyProductsController::class . ':add')->add(PermissionMiddleware::class)->setName('pharmacy_products/add-pharmacy_products-add-2'); // add
            $group->any('/view[/{ProductCode}]', PharmacyProductsController::class . ':view')->add(PermissionMiddleware::class)->setName('pharmacy_products/view-pharmacy_products-view-2'); // view
            $group->any('/edit[/{ProductCode}]', PharmacyProductsController::class . ':edit')->add(PermissionMiddleware::class)->setName('pharmacy_products/edit-pharmacy_products-edit-2'); // edit
            $group->any('/delete[/{ProductCode}]', PharmacyProductsController::class . ':delete')->add(PermissionMiddleware::class)->setName('pharmacy_products/delete-pharmacy_products-delete-2'); // delete
        }
    );

    // pharmacy_purchase_request
    $app->any('/PharmacyPurchaseRequestList[/{id}]', PharmacyPurchaseRequestController::class . ':list')->add(PermissionMiddleware::class)->setName('PharmacyPurchaseRequestList-pharmacy_purchase_request-list'); // list
    $app->any('/PharmacyPurchaseRequestAdd[/{id}]', PharmacyPurchaseRequestController::class . ':add')->add(PermissionMiddleware::class)->setName('PharmacyPurchaseRequestAdd-pharmacy_purchase_request-add'); // add
    $app->any('/PharmacyPurchaseRequestView[/{id}]', PharmacyPurchaseRequestController::class . ':view')->add(PermissionMiddleware::class)->setName('PharmacyPurchaseRequestView-pharmacy_purchase_request-view'); // view
    $app->any('/PharmacyPurchaseRequestEdit[/{id}]', PharmacyPurchaseRequestController::class . ':edit')->add(PermissionMiddleware::class)->setName('PharmacyPurchaseRequestEdit-pharmacy_purchase_request-edit'); // edit
    $app->any('/PharmacyPurchaseRequestDelete[/{id}]', PharmacyPurchaseRequestController::class . ':delete')->add(PermissionMiddleware::class)->setName('PharmacyPurchaseRequestDelete-pharmacy_purchase_request-delete'); // delete
    $app->group(
        '/pharmacy_purchase_request',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', PharmacyPurchaseRequestController::class . ':list')->add(PermissionMiddleware::class)->setName('pharmacy_purchase_request/list-pharmacy_purchase_request-list-2'); // list
            $group->any('/add[/{id}]', PharmacyPurchaseRequestController::class . ':add')->add(PermissionMiddleware::class)->setName('pharmacy_purchase_request/add-pharmacy_purchase_request-add-2'); // add
            $group->any('/view[/{id}]', PharmacyPurchaseRequestController::class . ':view')->add(PermissionMiddleware::class)->setName('pharmacy_purchase_request/view-pharmacy_purchase_request-view-2'); // view
            $group->any('/edit[/{id}]', PharmacyPurchaseRequestController::class . ':edit')->add(PermissionMiddleware::class)->setName('pharmacy_purchase_request/edit-pharmacy_purchase_request-edit-2'); // edit
            $group->any('/delete[/{id}]', PharmacyPurchaseRequestController::class . ':delete')->add(PermissionMiddleware::class)->setName('pharmacy_purchase_request/delete-pharmacy_purchase_request-delete-2'); // delete
        }
    );

    // pharmacy_purchase_request_items
    $app->any('/PharmacyPurchaseRequestItemsList[/{id}]', PharmacyPurchaseRequestItemsController::class . ':list')->add(PermissionMiddleware::class)->setName('PharmacyPurchaseRequestItemsList-pharmacy_purchase_request_items-list'); // list
    $app->any('/PharmacyPurchaseRequestItemsAdd[/{id}]', PharmacyPurchaseRequestItemsController::class . ':add')->add(PermissionMiddleware::class)->setName('PharmacyPurchaseRequestItemsAdd-pharmacy_purchase_request_items-add'); // add
    $app->any('/PharmacyPurchaseRequestItemsView[/{id}]', PharmacyPurchaseRequestItemsController::class . ':view')->add(PermissionMiddleware::class)->setName('PharmacyPurchaseRequestItemsView-pharmacy_purchase_request_items-view'); // view
    $app->any('/PharmacyPurchaseRequestItemsEdit[/{id}]', PharmacyPurchaseRequestItemsController::class . ':edit')->add(PermissionMiddleware::class)->setName('PharmacyPurchaseRequestItemsEdit-pharmacy_purchase_request_items-edit'); // edit
    $app->any('/PharmacyPurchaseRequestItemsDelete[/{id}]', PharmacyPurchaseRequestItemsController::class . ':delete')->add(PermissionMiddleware::class)->setName('PharmacyPurchaseRequestItemsDelete-pharmacy_purchase_request_items-delete'); // delete
    $app->group(
        '/pharmacy_purchase_request_items',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', PharmacyPurchaseRequestItemsController::class . ':list')->add(PermissionMiddleware::class)->setName('pharmacy_purchase_request_items/list-pharmacy_purchase_request_items-list-2'); // list
            $group->any('/add[/{id}]', PharmacyPurchaseRequestItemsController::class . ':add')->add(PermissionMiddleware::class)->setName('pharmacy_purchase_request_items/add-pharmacy_purchase_request_items-add-2'); // add
            $group->any('/view[/{id}]', PharmacyPurchaseRequestItemsController::class . ':view')->add(PermissionMiddleware::class)->setName('pharmacy_purchase_request_items/view-pharmacy_purchase_request_items-view-2'); // view
            $group->any('/edit[/{id}]', PharmacyPurchaseRequestItemsController::class . ':edit')->add(PermissionMiddleware::class)->setName('pharmacy_purchase_request_items/edit-pharmacy_purchase_request_items-edit-2'); // edit
            $group->any('/delete[/{id}]', PharmacyPurchaseRequestItemsController::class . ':delete')->add(PermissionMiddleware::class)->setName('pharmacy_purchase_request_items/delete-pharmacy_purchase_request_items-delete-2'); // delete
        }
    );

    // pharmacy_purchaseorder
    $app->any('/PharmacyPurchaseorderList[/{id}]', PharmacyPurchaseorderController::class . ':list')->add(PermissionMiddleware::class)->setName('PharmacyPurchaseorderList-pharmacy_purchaseorder-list'); // list
    $app->any('/PharmacyPurchaseorderAdd[/{id}]', PharmacyPurchaseorderController::class . ':add')->add(PermissionMiddleware::class)->setName('PharmacyPurchaseorderAdd-pharmacy_purchaseorder-add'); // add
    $app->any('/PharmacyPurchaseorderView[/{id}]', PharmacyPurchaseorderController::class . ':view')->add(PermissionMiddleware::class)->setName('PharmacyPurchaseorderView-pharmacy_purchaseorder-view'); // view
    $app->any('/PharmacyPurchaseorderEdit[/{id}]', PharmacyPurchaseorderController::class . ':edit')->add(PermissionMiddleware::class)->setName('PharmacyPurchaseorderEdit-pharmacy_purchaseorder-edit'); // edit
    $app->any('/PharmacyPurchaseorderDelete[/{id}]', PharmacyPurchaseorderController::class . ':delete')->add(PermissionMiddleware::class)->setName('PharmacyPurchaseorderDelete-pharmacy_purchaseorder-delete'); // delete
    $app->group(
        '/pharmacy_purchaseorder',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', PharmacyPurchaseorderController::class . ':list')->add(PermissionMiddleware::class)->setName('pharmacy_purchaseorder/list-pharmacy_purchaseorder-list-2'); // list
            $group->any('/add[/{id}]', PharmacyPurchaseorderController::class . ':add')->add(PermissionMiddleware::class)->setName('pharmacy_purchaseorder/add-pharmacy_purchaseorder-add-2'); // add
            $group->any('/view[/{id}]', PharmacyPurchaseorderController::class . ':view')->add(PermissionMiddleware::class)->setName('pharmacy_purchaseorder/view-pharmacy_purchaseorder-view-2'); // view
            $group->any('/edit[/{id}]', PharmacyPurchaseorderController::class . ':edit')->add(PermissionMiddleware::class)->setName('pharmacy_purchaseorder/edit-pharmacy_purchaseorder-edit-2'); // edit
            $group->any('/delete[/{id}]', PharmacyPurchaseorderController::class . ':delete')->add(PermissionMiddleware::class)->setName('pharmacy_purchaseorder/delete-pharmacy_purchaseorder-delete-2'); // delete
        }
    );

    // pharmacy_services
    $app->any('/PharmacyServicesList[/{id}]', PharmacyServicesController::class . ':list')->add(PermissionMiddleware::class)->setName('PharmacyServicesList-pharmacy_services-list'); // list
    $app->any('/PharmacyServicesAdd[/{id}]', PharmacyServicesController::class . ':add')->add(PermissionMiddleware::class)->setName('PharmacyServicesAdd-pharmacy_services-add'); // add
    $app->any('/PharmacyServicesView[/{id}]', PharmacyServicesController::class . ':view')->add(PermissionMiddleware::class)->setName('PharmacyServicesView-pharmacy_services-view'); // view
    $app->any('/PharmacyServicesEdit[/{id}]', PharmacyServicesController::class . ':edit')->add(PermissionMiddleware::class)->setName('PharmacyServicesEdit-pharmacy_services-edit'); // edit
    $app->any('/PharmacyServicesDelete[/{id}]', PharmacyServicesController::class . ':delete')->add(PermissionMiddleware::class)->setName('PharmacyServicesDelete-pharmacy_services-delete'); // delete
    $app->group(
        '/pharmacy_services',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', PharmacyServicesController::class . ':list')->add(PermissionMiddleware::class)->setName('pharmacy_services/list-pharmacy_services-list-2'); // list
            $group->any('/add[/{id}]', PharmacyServicesController::class . ':add')->add(PermissionMiddleware::class)->setName('pharmacy_services/add-pharmacy_services-add-2'); // add
            $group->any('/view[/{id}]', PharmacyServicesController::class . ':view')->add(PermissionMiddleware::class)->setName('pharmacy_services/view-pharmacy_services-view-2'); // view
            $group->any('/edit[/{id}]', PharmacyServicesController::class . ':edit')->add(PermissionMiddleware::class)->setName('pharmacy_services/edit-pharmacy_services-edit-2'); // edit
            $group->any('/delete[/{id}]', PharmacyServicesController::class . ':delete')->add(PermissionMiddleware::class)->setName('pharmacy_services/delete-pharmacy_services-delete-2'); // delete
        }
    );

    // pharmacy_storemast
    $app->any('/PharmacyStoremastList[/{id}]', PharmacyStoremastController::class . ':list')->add(PermissionMiddleware::class)->setName('PharmacyStoremastList-pharmacy_storemast-list'); // list
    $app->any('/PharmacyStoremastAdd[/{id}]', PharmacyStoremastController::class . ':add')->add(PermissionMiddleware::class)->setName('PharmacyStoremastAdd-pharmacy_storemast-add'); // add
    $app->any('/PharmacyStoremastView[/{id}]', PharmacyStoremastController::class . ':view')->add(PermissionMiddleware::class)->setName('PharmacyStoremastView-pharmacy_storemast-view'); // view
    $app->any('/PharmacyStoremastEdit[/{id}]', PharmacyStoremastController::class . ':edit')->add(PermissionMiddleware::class)->setName('PharmacyStoremastEdit-pharmacy_storemast-edit'); // edit
    $app->any('/PharmacyStoremastDelete[/{id}]', PharmacyStoremastController::class . ':delete')->add(PermissionMiddleware::class)->setName('PharmacyStoremastDelete-pharmacy_storemast-delete'); // delete
    $app->group(
        '/pharmacy_storemast',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', PharmacyStoremastController::class . ':list')->add(PermissionMiddleware::class)->setName('pharmacy_storemast/list-pharmacy_storemast-list-2'); // list
            $group->any('/add[/{id}]', PharmacyStoremastController::class . ':add')->add(PermissionMiddleware::class)->setName('pharmacy_storemast/add-pharmacy_storemast-add-2'); // add
            $group->any('/view[/{id}]', PharmacyStoremastController::class . ':view')->add(PermissionMiddleware::class)->setName('pharmacy_storemast/view-pharmacy_storemast-view-2'); // view
            $group->any('/edit[/{id}]', PharmacyStoremastController::class . ':edit')->add(PermissionMiddleware::class)->setName('pharmacy_storemast/edit-pharmacy_storemast-edit-2'); // edit
            $group->any('/delete[/{id}]', PharmacyStoremastController::class . ':delete')->add(PermissionMiddleware::class)->setName('pharmacy_storemast/delete-pharmacy_storemast-delete-2'); // delete
        }
    );

    // pharmacy_suppliers
    $app->any('/PharmacySuppliersList[/{id}]', PharmacySuppliersController::class . ':list')->add(PermissionMiddleware::class)->setName('PharmacySuppliersList-pharmacy_suppliers-list'); // list
    $app->any('/PharmacySuppliersAdd[/{id}]', PharmacySuppliersController::class . ':add')->add(PermissionMiddleware::class)->setName('PharmacySuppliersAdd-pharmacy_suppliers-add'); // add
    $app->any('/PharmacySuppliersView[/{id}]', PharmacySuppliersController::class . ':view')->add(PermissionMiddleware::class)->setName('PharmacySuppliersView-pharmacy_suppliers-view'); // view
    $app->any('/PharmacySuppliersEdit[/{id}]', PharmacySuppliersController::class . ':edit')->add(PermissionMiddleware::class)->setName('PharmacySuppliersEdit-pharmacy_suppliers-edit'); // edit
    $app->any('/PharmacySuppliersDelete[/{id}]', PharmacySuppliersController::class . ':delete')->add(PermissionMiddleware::class)->setName('PharmacySuppliersDelete-pharmacy_suppliers-delete'); // delete
    $app->group(
        '/pharmacy_suppliers',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', PharmacySuppliersController::class . ':list')->add(PermissionMiddleware::class)->setName('pharmacy_suppliers/list-pharmacy_suppliers-list-2'); // list
            $group->any('/add[/{id}]', PharmacySuppliersController::class . ':add')->add(PermissionMiddleware::class)->setName('pharmacy_suppliers/add-pharmacy_suppliers-add-2'); // add
            $group->any('/view[/{id}]', PharmacySuppliersController::class . ':view')->add(PermissionMiddleware::class)->setName('pharmacy_suppliers/view-pharmacy_suppliers-view-2'); // view
            $group->any('/edit[/{id}]', PharmacySuppliersController::class . ':edit')->add(PermissionMiddleware::class)->setName('pharmacy_suppliers/edit-pharmacy_suppliers-edit-2'); // edit
            $group->any('/delete[/{id}]', PharmacySuppliersController::class . ':delete')->add(PermissionMiddleware::class)->setName('pharmacy_suppliers/delete-pharmacy_suppliers-delete-2'); // delete
        }
    );

    // pres_categoryallergy
    $app->any('/PresCategoryallergyList[/{id}]', PresCategoryallergyController::class . ':list')->add(PermissionMiddleware::class)->setName('PresCategoryallergyList-pres_categoryallergy-list'); // list
    $app->any('/PresCategoryallergyAdd[/{id}]', PresCategoryallergyController::class . ':add')->add(PermissionMiddleware::class)->setName('PresCategoryallergyAdd-pres_categoryallergy-add'); // add
    $app->any('/PresCategoryallergyView[/{id}]', PresCategoryallergyController::class . ':view')->add(PermissionMiddleware::class)->setName('PresCategoryallergyView-pres_categoryallergy-view'); // view
    $app->any('/PresCategoryallergyEdit[/{id}]', PresCategoryallergyController::class . ':edit')->add(PermissionMiddleware::class)->setName('PresCategoryallergyEdit-pres_categoryallergy-edit'); // edit
    $app->any('/PresCategoryallergyDelete[/{id}]', PresCategoryallergyController::class . ':delete')->add(PermissionMiddleware::class)->setName('PresCategoryallergyDelete-pres_categoryallergy-delete'); // delete
    $app->group(
        '/pres_categoryallergy',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', PresCategoryallergyController::class . ':list')->add(PermissionMiddleware::class)->setName('pres_categoryallergy/list-pres_categoryallergy-list-2'); // list
            $group->any('/add[/{id}]', PresCategoryallergyController::class . ':add')->add(PermissionMiddleware::class)->setName('pres_categoryallergy/add-pres_categoryallergy-add-2'); // add
            $group->any('/view[/{id}]', PresCategoryallergyController::class . ':view')->add(PermissionMiddleware::class)->setName('pres_categoryallergy/view-pres_categoryallergy-view-2'); // view
            $group->any('/edit[/{id}]', PresCategoryallergyController::class . ':edit')->add(PermissionMiddleware::class)->setName('pres_categoryallergy/edit-pres_categoryallergy-edit-2'); // edit
            $group->any('/delete[/{id}]', PresCategoryallergyController::class . ':delete')->add(PermissionMiddleware::class)->setName('pres_categoryallergy/delete-pres_categoryallergy-delete-2'); // delete
        }
    );

    // pres_container_type
    $app->any('/PresContainerTypeList[/{id}]', PresContainerTypeController::class . ':list')->add(PermissionMiddleware::class)->setName('PresContainerTypeList-pres_container_type-list'); // list
    $app->any('/PresContainerTypeAdd[/{id}]', PresContainerTypeController::class . ':add')->add(PermissionMiddleware::class)->setName('PresContainerTypeAdd-pres_container_type-add'); // add
    $app->any('/PresContainerTypeView[/{id}]', PresContainerTypeController::class . ':view')->add(PermissionMiddleware::class)->setName('PresContainerTypeView-pres_container_type-view'); // view
    $app->any('/PresContainerTypeEdit[/{id}]', PresContainerTypeController::class . ':edit')->add(PermissionMiddleware::class)->setName('PresContainerTypeEdit-pres_container_type-edit'); // edit
    $app->any('/PresContainerTypeDelete[/{id}]', PresContainerTypeController::class . ':delete')->add(PermissionMiddleware::class)->setName('PresContainerTypeDelete-pres_container_type-delete'); // delete
    $app->group(
        '/pres_container_type',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', PresContainerTypeController::class . ':list')->add(PermissionMiddleware::class)->setName('pres_container_type/list-pres_container_type-list-2'); // list
            $group->any('/add[/{id}]', PresContainerTypeController::class . ':add')->add(PermissionMiddleware::class)->setName('pres_container_type/add-pres_container_type-add-2'); // add
            $group->any('/view[/{id}]', PresContainerTypeController::class . ':view')->add(PermissionMiddleware::class)->setName('pres_container_type/view-pres_container_type-view-2'); // view
            $group->any('/edit[/{id}]', PresContainerTypeController::class . ':edit')->add(PermissionMiddleware::class)->setName('pres_container_type/edit-pres_container_type-edit-2'); // edit
            $group->any('/delete[/{id}]', PresContainerTypeController::class . ':delete')->add(PermissionMiddleware::class)->setName('pres_container_type/delete-pres_container_type-delete-2'); // delete
        }
    );

    // pres_fluidformulation
    $app->any('/PresFluidformulationList[/{id}]', PresFluidformulationController::class . ':list')->add(PermissionMiddleware::class)->setName('PresFluidformulationList-pres_fluidformulation-list'); // list
    $app->any('/PresFluidformulationAdd[/{id}]', PresFluidformulationController::class . ':add')->add(PermissionMiddleware::class)->setName('PresFluidformulationAdd-pres_fluidformulation-add'); // add
    $app->any('/PresFluidformulationView[/{id}]', PresFluidformulationController::class . ':view')->add(PermissionMiddleware::class)->setName('PresFluidformulationView-pres_fluidformulation-view'); // view
    $app->any('/PresFluidformulationEdit[/{id}]', PresFluidformulationController::class . ':edit')->add(PermissionMiddleware::class)->setName('PresFluidformulationEdit-pres_fluidformulation-edit'); // edit
    $app->any('/PresFluidformulationDelete[/{id}]', PresFluidformulationController::class . ':delete')->add(PermissionMiddleware::class)->setName('PresFluidformulationDelete-pres_fluidformulation-delete'); // delete
    $app->group(
        '/pres_fluidformulation',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', PresFluidformulationController::class . ':list')->add(PermissionMiddleware::class)->setName('pres_fluidformulation/list-pres_fluidformulation-list-2'); // list
            $group->any('/add[/{id}]', PresFluidformulationController::class . ':add')->add(PermissionMiddleware::class)->setName('pres_fluidformulation/add-pres_fluidformulation-add-2'); // add
            $group->any('/view[/{id}]', PresFluidformulationController::class . ':view')->add(PermissionMiddleware::class)->setName('pres_fluidformulation/view-pres_fluidformulation-view-2'); // view
            $group->any('/edit[/{id}]', PresFluidformulationController::class . ':edit')->add(PermissionMiddleware::class)->setName('pres_fluidformulation/edit-pres_fluidformulation-edit-2'); // edit
            $group->any('/delete[/{id}]', PresFluidformulationController::class . ':delete')->add(PermissionMiddleware::class)->setName('pres_fluidformulation/delete-pres_fluidformulation-delete-2'); // delete
        }
    );

    // pres_fluids
    $app->any('/PresFluidsList[/{id}]', PresFluidsController::class . ':list')->add(PermissionMiddleware::class)->setName('PresFluidsList-pres_fluids-list'); // list
    $app->any('/PresFluidsAdd[/{id}]', PresFluidsController::class . ':add')->add(PermissionMiddleware::class)->setName('PresFluidsAdd-pres_fluids-add'); // add
    $app->any('/PresFluidsView[/{id}]', PresFluidsController::class . ':view')->add(PermissionMiddleware::class)->setName('PresFluidsView-pres_fluids-view'); // view
    $app->any('/PresFluidsEdit[/{id}]', PresFluidsController::class . ':edit')->add(PermissionMiddleware::class)->setName('PresFluidsEdit-pres_fluids-edit'); // edit
    $app->any('/PresFluidsDelete[/{id}]', PresFluidsController::class . ':delete')->add(PermissionMiddleware::class)->setName('PresFluidsDelete-pres_fluids-delete'); // delete
    $app->group(
        '/pres_fluids',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', PresFluidsController::class . ':list')->add(PermissionMiddleware::class)->setName('pres_fluids/list-pres_fluids-list-2'); // list
            $group->any('/add[/{id}]', PresFluidsController::class . ':add')->add(PermissionMiddleware::class)->setName('pres_fluids/add-pres_fluids-add-2'); // add
            $group->any('/view[/{id}]', PresFluidsController::class . ':view')->add(PermissionMiddleware::class)->setName('pres_fluids/view-pres_fluids-view-2'); // view
            $group->any('/edit[/{id}]', PresFluidsController::class . ':edit')->add(PermissionMiddleware::class)->setName('pres_fluids/edit-pres_fluids-edit-2'); // edit
            $group->any('/delete[/{id}]', PresFluidsController::class . ':delete')->add(PermissionMiddleware::class)->setName('pres_fluids/delete-pres_fluids-delete-2'); // delete
        }
    );

    // pres_frequencies
    $app->any('/PresFrequenciesList[/{id}]', PresFrequenciesController::class . ':list')->add(PermissionMiddleware::class)->setName('PresFrequenciesList-pres_frequencies-list'); // list
    $app->any('/PresFrequenciesAdd[/{id}]', PresFrequenciesController::class . ':add')->add(PermissionMiddleware::class)->setName('PresFrequenciesAdd-pres_frequencies-add'); // add
    $app->any('/PresFrequenciesView[/{id}]', PresFrequenciesController::class . ':view')->add(PermissionMiddleware::class)->setName('PresFrequenciesView-pres_frequencies-view'); // view
    $app->any('/PresFrequenciesEdit[/{id}]', PresFrequenciesController::class . ':edit')->add(PermissionMiddleware::class)->setName('PresFrequenciesEdit-pres_frequencies-edit'); // edit
    $app->any('/PresFrequenciesDelete[/{id}]', PresFrequenciesController::class . ':delete')->add(PermissionMiddleware::class)->setName('PresFrequenciesDelete-pres_frequencies-delete'); // delete
    $app->group(
        '/pres_frequencies',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', PresFrequenciesController::class . ':list')->add(PermissionMiddleware::class)->setName('pres_frequencies/list-pres_frequencies-list-2'); // list
            $group->any('/add[/{id}]', PresFrequenciesController::class . ':add')->add(PermissionMiddleware::class)->setName('pres_frequencies/add-pres_frequencies-add-2'); // add
            $group->any('/view[/{id}]', PresFrequenciesController::class . ':view')->add(PermissionMiddleware::class)->setName('pres_frequencies/view-pres_frequencies-view-2'); // view
            $group->any('/edit[/{id}]', PresFrequenciesController::class . ':edit')->add(PermissionMiddleware::class)->setName('pres_frequencies/edit-pres_frequencies-edit-2'); // edit
            $group->any('/delete[/{id}]', PresFrequenciesController::class . ':delete')->add(PermissionMiddleware::class)->setName('pres_frequencies/delete-pres_frequencies-delete-2'); // delete
        }
    );

    // pres_genericinteractions
    $app->any('/PresGenericinteractionsList[/{id}]', PresGenericinteractionsController::class . ':list')->add(PermissionMiddleware::class)->setName('PresGenericinteractionsList-pres_genericinteractions-list'); // list
    $app->any('/PresGenericinteractionsAdd[/{id}]', PresGenericinteractionsController::class . ':add')->add(PermissionMiddleware::class)->setName('PresGenericinteractionsAdd-pres_genericinteractions-add'); // add
    $app->any('/PresGenericinteractionsView[/{id}]', PresGenericinteractionsController::class . ':view')->add(PermissionMiddleware::class)->setName('PresGenericinteractionsView-pres_genericinteractions-view'); // view
    $app->any('/PresGenericinteractionsEdit[/{id}]', PresGenericinteractionsController::class . ':edit')->add(PermissionMiddleware::class)->setName('PresGenericinteractionsEdit-pres_genericinteractions-edit'); // edit
    $app->any('/PresGenericinteractionsDelete[/{id}]', PresGenericinteractionsController::class . ':delete')->add(PermissionMiddleware::class)->setName('PresGenericinteractionsDelete-pres_genericinteractions-delete'); // delete
    $app->group(
        '/pres_genericinteractions',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', PresGenericinteractionsController::class . ':list')->add(PermissionMiddleware::class)->setName('pres_genericinteractions/list-pres_genericinteractions-list-2'); // list
            $group->any('/add[/{id}]', PresGenericinteractionsController::class . ':add')->add(PermissionMiddleware::class)->setName('pres_genericinteractions/add-pres_genericinteractions-add-2'); // add
            $group->any('/view[/{id}]', PresGenericinteractionsController::class . ':view')->add(PermissionMiddleware::class)->setName('pres_genericinteractions/view-pres_genericinteractions-view-2'); // view
            $group->any('/edit[/{id}]', PresGenericinteractionsController::class . ':edit')->add(PermissionMiddleware::class)->setName('pres_genericinteractions/edit-pres_genericinteractions-edit-2'); // edit
            $group->any('/delete[/{id}]', PresGenericinteractionsController::class . ':delete')->add(PermissionMiddleware::class)->setName('pres_genericinteractions/delete-pres_genericinteractions-delete-2'); // delete
        }
    );

    // pres_indicationstable
    $app->any('/PresIndicationstableList[/{Sno}]', PresIndicationstableController::class . ':list')->add(PermissionMiddleware::class)->setName('PresIndicationstableList-pres_indicationstable-list'); // list
    $app->any('/PresIndicationstableAdd[/{Sno}]', PresIndicationstableController::class . ':add')->add(PermissionMiddleware::class)->setName('PresIndicationstableAdd-pres_indicationstable-add'); // add
    $app->any('/PresIndicationstableView[/{Sno}]', PresIndicationstableController::class . ':view')->add(PermissionMiddleware::class)->setName('PresIndicationstableView-pres_indicationstable-view'); // view
    $app->any('/PresIndicationstableEdit[/{Sno}]', PresIndicationstableController::class . ':edit')->add(PermissionMiddleware::class)->setName('PresIndicationstableEdit-pres_indicationstable-edit'); // edit
    $app->any('/PresIndicationstableDelete[/{Sno}]', PresIndicationstableController::class . ':delete')->add(PermissionMiddleware::class)->setName('PresIndicationstableDelete-pres_indicationstable-delete'); // delete
    $app->group(
        '/pres_indicationstable',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{Sno}]', PresIndicationstableController::class . ':list')->add(PermissionMiddleware::class)->setName('pres_indicationstable/list-pres_indicationstable-list-2'); // list
            $group->any('/add[/{Sno}]', PresIndicationstableController::class . ':add')->add(PermissionMiddleware::class)->setName('pres_indicationstable/add-pres_indicationstable-add-2'); // add
            $group->any('/view[/{Sno}]', PresIndicationstableController::class . ':view')->add(PermissionMiddleware::class)->setName('pres_indicationstable/view-pres_indicationstable-view-2'); // view
            $group->any('/edit[/{Sno}]', PresIndicationstableController::class . ':edit')->add(PermissionMiddleware::class)->setName('pres_indicationstable/edit-pres_indicationstable-edit-2'); // edit
            $group->any('/delete[/{Sno}]', PresIndicationstableController::class . ':delete')->add(PermissionMiddleware::class)->setName('pres_indicationstable/delete-pres_indicationstable-delete-2'); // delete
        }
    );

    // pres_mas_forms
    $app->any('/PresMasFormsList[/{id}]', PresMasFormsController::class . ':list')->add(PermissionMiddleware::class)->setName('PresMasFormsList-pres_mas_forms-list'); // list
    $app->any('/PresMasFormsAdd[/{id}]', PresMasFormsController::class . ':add')->add(PermissionMiddleware::class)->setName('PresMasFormsAdd-pres_mas_forms-add'); // add
    $app->any('/PresMasFormsView[/{id}]', PresMasFormsController::class . ':view')->add(PermissionMiddleware::class)->setName('PresMasFormsView-pres_mas_forms-view'); // view
    $app->any('/PresMasFormsEdit[/{id}]', PresMasFormsController::class . ':edit')->add(PermissionMiddleware::class)->setName('PresMasFormsEdit-pres_mas_forms-edit'); // edit
    $app->any('/PresMasFormsDelete[/{id}]', PresMasFormsController::class . ':delete')->add(PermissionMiddleware::class)->setName('PresMasFormsDelete-pres_mas_forms-delete'); // delete
    $app->group(
        '/pres_mas_forms',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', PresMasFormsController::class . ':list')->add(PermissionMiddleware::class)->setName('pres_mas_forms/list-pres_mas_forms-list-2'); // list
            $group->any('/add[/{id}]', PresMasFormsController::class . ':add')->add(PermissionMiddleware::class)->setName('pres_mas_forms/add-pres_mas_forms-add-2'); // add
            $group->any('/view[/{id}]', PresMasFormsController::class . ':view')->add(PermissionMiddleware::class)->setName('pres_mas_forms/view-pres_mas_forms-view-2'); // view
            $group->any('/edit[/{id}]', PresMasFormsController::class . ':edit')->add(PermissionMiddleware::class)->setName('pres_mas_forms/edit-pres_mas_forms-edit-2'); // edit
            $group->any('/delete[/{id}]', PresMasFormsController::class . ':delete')->add(PermissionMiddleware::class)->setName('pres_mas_forms/delete-pres_mas_forms-delete-2'); // delete
        }
    );

    // pres_mas_generic
    $app->any('/PresMasGenericList[/{id}]', PresMasGenericController::class . ':list')->add(PermissionMiddleware::class)->setName('PresMasGenericList-pres_mas_generic-list'); // list
    $app->any('/PresMasGenericAdd[/{id}]', PresMasGenericController::class . ':add')->add(PermissionMiddleware::class)->setName('PresMasGenericAdd-pres_mas_generic-add'); // add
    $app->any('/PresMasGenericView[/{id}]', PresMasGenericController::class . ':view')->add(PermissionMiddleware::class)->setName('PresMasGenericView-pres_mas_generic-view'); // view
    $app->any('/PresMasGenericEdit[/{id}]', PresMasGenericController::class . ':edit')->add(PermissionMiddleware::class)->setName('PresMasGenericEdit-pres_mas_generic-edit'); // edit
    $app->any('/PresMasGenericDelete[/{id}]', PresMasGenericController::class . ':delete')->add(PermissionMiddleware::class)->setName('PresMasGenericDelete-pres_mas_generic-delete'); // delete
    $app->group(
        '/pres_mas_generic',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', PresMasGenericController::class . ':list')->add(PermissionMiddleware::class)->setName('pres_mas_generic/list-pres_mas_generic-list-2'); // list
            $group->any('/add[/{id}]', PresMasGenericController::class . ':add')->add(PermissionMiddleware::class)->setName('pres_mas_generic/add-pres_mas_generic-add-2'); // add
            $group->any('/view[/{id}]', PresMasGenericController::class . ':view')->add(PermissionMiddleware::class)->setName('pres_mas_generic/view-pres_mas_generic-view-2'); // view
            $group->any('/edit[/{id}]', PresMasGenericController::class . ':edit')->add(PermissionMiddleware::class)->setName('pres_mas_generic/edit-pres_mas_generic-edit-2'); // edit
            $group->any('/delete[/{id}]', PresMasGenericController::class . ':delete')->add(PermissionMiddleware::class)->setName('pres_mas_generic/delete-pres_mas_generic-delete-2'); // delete
        }
    );

    // pres_mas_route
    $app->any('/PresMasRouteList[/{ID}]', PresMasRouteController::class . ':list')->add(PermissionMiddleware::class)->setName('PresMasRouteList-pres_mas_route-list'); // list
    $app->any('/PresMasRouteAdd[/{ID}]', PresMasRouteController::class . ':add')->add(PermissionMiddleware::class)->setName('PresMasRouteAdd-pres_mas_route-add'); // add
    $app->any('/PresMasRouteView[/{ID}]', PresMasRouteController::class . ':view')->add(PermissionMiddleware::class)->setName('PresMasRouteView-pres_mas_route-view'); // view
    $app->any('/PresMasRouteEdit[/{ID}]', PresMasRouteController::class . ':edit')->add(PermissionMiddleware::class)->setName('PresMasRouteEdit-pres_mas_route-edit'); // edit
    $app->any('/PresMasRouteDelete[/{ID}]', PresMasRouteController::class . ':delete')->add(PermissionMiddleware::class)->setName('PresMasRouteDelete-pres_mas_route-delete'); // delete
    $app->group(
        '/pres_mas_route',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{ID}]', PresMasRouteController::class . ':list')->add(PermissionMiddleware::class)->setName('pres_mas_route/list-pres_mas_route-list-2'); // list
            $group->any('/add[/{ID}]', PresMasRouteController::class . ':add')->add(PermissionMiddleware::class)->setName('pres_mas_route/add-pres_mas_route-add-2'); // add
            $group->any('/view[/{ID}]', PresMasRouteController::class . ':view')->add(PermissionMiddleware::class)->setName('pres_mas_route/view-pres_mas_route-view-2'); // view
            $group->any('/edit[/{ID}]', PresMasRouteController::class . ':edit')->add(PermissionMiddleware::class)->setName('pres_mas_route/edit-pres_mas_route-edit-2'); // edit
            $group->any('/delete[/{ID}]', PresMasRouteController::class . ':delete')->add(PermissionMiddleware::class)->setName('pres_mas_route/delete-pres_mas_route-delete-2'); // delete
        }
    );

    // pres_mas_status
    $app->any('/PresMasStatusList[/{id}]', PresMasStatusController::class . ':list')->add(PermissionMiddleware::class)->setName('PresMasStatusList-pres_mas_status-list'); // list
    $app->any('/PresMasStatusAdd[/{id}]', PresMasStatusController::class . ':add')->add(PermissionMiddleware::class)->setName('PresMasStatusAdd-pres_mas_status-add'); // add
    $app->any('/PresMasStatusView[/{id}]', PresMasStatusController::class . ':view')->add(PermissionMiddleware::class)->setName('PresMasStatusView-pres_mas_status-view'); // view
    $app->any('/PresMasStatusEdit[/{id}]', PresMasStatusController::class . ':edit')->add(PermissionMiddleware::class)->setName('PresMasStatusEdit-pres_mas_status-edit'); // edit
    $app->any('/PresMasStatusDelete[/{id}]', PresMasStatusController::class . ':delete')->add(PermissionMiddleware::class)->setName('PresMasStatusDelete-pres_mas_status-delete'); // delete
    $app->group(
        '/pres_mas_status',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', PresMasStatusController::class . ':list')->add(PermissionMiddleware::class)->setName('pres_mas_status/list-pres_mas_status-list-2'); // list
            $group->any('/add[/{id}]', PresMasStatusController::class . ':add')->add(PermissionMiddleware::class)->setName('pres_mas_status/add-pres_mas_status-add-2'); // add
            $group->any('/view[/{id}]', PresMasStatusController::class . ':view')->add(PermissionMiddleware::class)->setName('pres_mas_status/view-pres_mas_status-view-2'); // view
            $group->any('/edit[/{id}]', PresMasStatusController::class . ':edit')->add(PermissionMiddleware::class)->setName('pres_mas_status/edit-pres_mas_status-edit-2'); // edit
            $group->any('/delete[/{id}]', PresMasStatusController::class . ':delete')->add(PermissionMiddleware::class)->setName('pres_mas_status/delete-pres_mas_status-delete-2'); // delete
        }
    );

    // pres_mas_timeoftaking
    $app->any('/PresMasTimeoftakingList[/{ID}]', PresMasTimeoftakingController::class . ':list')->add(PermissionMiddleware::class)->setName('PresMasTimeoftakingList-pres_mas_timeoftaking-list'); // list
    $app->any('/PresMasTimeoftakingAdd[/{ID}]', PresMasTimeoftakingController::class . ':add')->add(PermissionMiddleware::class)->setName('PresMasTimeoftakingAdd-pres_mas_timeoftaking-add'); // add
    $app->any('/PresMasTimeoftakingView[/{ID}]', PresMasTimeoftakingController::class . ':view')->add(PermissionMiddleware::class)->setName('PresMasTimeoftakingView-pres_mas_timeoftaking-view'); // view
    $app->any('/PresMasTimeoftakingEdit[/{ID}]', PresMasTimeoftakingController::class . ':edit')->add(PermissionMiddleware::class)->setName('PresMasTimeoftakingEdit-pres_mas_timeoftaking-edit'); // edit
    $app->any('/PresMasTimeoftakingDelete[/{ID}]', PresMasTimeoftakingController::class . ':delete')->add(PermissionMiddleware::class)->setName('PresMasTimeoftakingDelete-pres_mas_timeoftaking-delete'); // delete
    $app->group(
        '/pres_mas_timeoftaking',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{ID}]', PresMasTimeoftakingController::class . ':list')->add(PermissionMiddleware::class)->setName('pres_mas_timeoftaking/list-pres_mas_timeoftaking-list-2'); // list
            $group->any('/add[/{ID}]', PresMasTimeoftakingController::class . ':add')->add(PermissionMiddleware::class)->setName('pres_mas_timeoftaking/add-pres_mas_timeoftaking-add-2'); // add
            $group->any('/view[/{ID}]', PresMasTimeoftakingController::class . ':view')->add(PermissionMiddleware::class)->setName('pres_mas_timeoftaking/view-pres_mas_timeoftaking-view-2'); // view
            $group->any('/edit[/{ID}]', PresMasTimeoftakingController::class . ':edit')->add(PermissionMiddleware::class)->setName('pres_mas_timeoftaking/edit-pres_mas_timeoftaking-edit-2'); // edit
            $group->any('/delete[/{ID}]', PresMasTimeoftakingController::class . ':delete')->add(PermissionMiddleware::class)->setName('pres_mas_timeoftaking/delete-pres_mas_timeoftaking-delete-2'); // delete
        }
    );

    // pres_mas_unit
    $app->any('/PresMasUnitList[/{id}]', PresMasUnitController::class . ':list')->add(PermissionMiddleware::class)->setName('PresMasUnitList-pres_mas_unit-list'); // list
    $app->any('/PresMasUnitAdd[/{id}]', PresMasUnitController::class . ':add')->add(PermissionMiddleware::class)->setName('PresMasUnitAdd-pres_mas_unit-add'); // add
    $app->any('/PresMasUnitView[/{id}]', PresMasUnitController::class . ':view')->add(PermissionMiddleware::class)->setName('PresMasUnitView-pres_mas_unit-view'); // view
    $app->any('/PresMasUnitEdit[/{id}]', PresMasUnitController::class . ':edit')->add(PermissionMiddleware::class)->setName('PresMasUnitEdit-pres_mas_unit-edit'); // edit
    $app->any('/PresMasUnitDelete[/{id}]', PresMasUnitController::class . ':delete')->add(PermissionMiddleware::class)->setName('PresMasUnitDelete-pres_mas_unit-delete'); // delete
    $app->group(
        '/pres_mas_unit',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', PresMasUnitController::class . ':list')->add(PermissionMiddleware::class)->setName('pres_mas_unit/list-pres_mas_unit-list-2'); // list
            $group->any('/add[/{id}]', PresMasUnitController::class . ':add')->add(PermissionMiddleware::class)->setName('pres_mas_unit/add-pres_mas_unit-add-2'); // add
            $group->any('/view[/{id}]', PresMasUnitController::class . ':view')->add(PermissionMiddleware::class)->setName('pres_mas_unit/view-pres_mas_unit-view-2'); // view
            $group->any('/edit[/{id}]', PresMasUnitController::class . ':edit')->add(PermissionMiddleware::class)->setName('pres_mas_unit/edit-pres_mas_unit-edit-2'); // edit
            $group->any('/delete[/{id}]', PresMasUnitController::class . ':delete')->add(PermissionMiddleware::class)->setName('pres_mas_unit/delete-pres_mas_unit-delete-2'); // delete
        }
    );

    // pres_quantity
    $app->any('/PresQuantityList[/{id}]', PresQuantityController::class . ':list')->add(PermissionMiddleware::class)->setName('PresQuantityList-pres_quantity-list'); // list
    $app->any('/PresQuantityAdd[/{id}]', PresQuantityController::class . ':add')->add(PermissionMiddleware::class)->setName('PresQuantityAdd-pres_quantity-add'); // add
    $app->any('/PresQuantityView[/{id}]', PresQuantityController::class . ':view')->add(PermissionMiddleware::class)->setName('PresQuantityView-pres_quantity-view'); // view
    $app->any('/PresQuantityEdit[/{id}]', PresQuantityController::class . ':edit')->add(PermissionMiddleware::class)->setName('PresQuantityEdit-pres_quantity-edit'); // edit
    $app->any('/PresQuantityDelete[/{id}]', PresQuantityController::class . ':delete')->add(PermissionMiddleware::class)->setName('PresQuantityDelete-pres_quantity-delete'); // delete
    $app->group(
        '/pres_quantity',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', PresQuantityController::class . ':list')->add(PermissionMiddleware::class)->setName('pres_quantity/list-pres_quantity-list-2'); // list
            $group->any('/add[/{id}]', PresQuantityController::class . ':add')->add(PermissionMiddleware::class)->setName('pres_quantity/add-pres_quantity-add-2'); // add
            $group->any('/view[/{id}]', PresQuantityController::class . ':view')->add(PermissionMiddleware::class)->setName('pres_quantity/view-pres_quantity-view-2'); // view
            $group->any('/edit[/{id}]', PresQuantityController::class . ':edit')->add(PermissionMiddleware::class)->setName('pres_quantity/edit-pres_quantity-edit-2'); // edit
            $group->any('/delete[/{id}]', PresQuantityController::class . ':delete')->add(PermissionMiddleware::class)->setName('pres_quantity/delete-pres_quantity-delete-2'); // delete
        }
    );

    // pres_restricteddruglist
    $app->any('/PresRestricteddruglistList[/{id}]', PresRestricteddruglistController::class . ':list')->add(PermissionMiddleware::class)->setName('PresRestricteddruglistList-pres_restricteddruglist-list'); // list
    $app->any('/PresRestricteddruglistAdd[/{id}]', PresRestricteddruglistController::class . ':add')->add(PermissionMiddleware::class)->setName('PresRestricteddruglistAdd-pres_restricteddruglist-add'); // add
    $app->any('/PresRestricteddruglistView[/{id}]', PresRestricteddruglistController::class . ':view')->add(PermissionMiddleware::class)->setName('PresRestricteddruglistView-pres_restricteddruglist-view'); // view
    $app->any('/PresRestricteddruglistEdit[/{id}]', PresRestricteddruglistController::class . ':edit')->add(PermissionMiddleware::class)->setName('PresRestricteddruglistEdit-pres_restricteddruglist-edit'); // edit
    $app->any('/PresRestricteddruglistDelete[/{id}]', PresRestricteddruglistController::class . ':delete')->add(PermissionMiddleware::class)->setName('PresRestricteddruglistDelete-pres_restricteddruglist-delete'); // delete
    $app->group(
        '/pres_restricteddruglist',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', PresRestricteddruglistController::class . ':list')->add(PermissionMiddleware::class)->setName('pres_restricteddruglist/list-pres_restricteddruglist-list-2'); // list
            $group->any('/add[/{id}]', PresRestricteddruglistController::class . ':add')->add(PermissionMiddleware::class)->setName('pres_restricteddruglist/add-pres_restricteddruglist-add-2'); // add
            $group->any('/view[/{id}]', PresRestricteddruglistController::class . ':view')->add(PermissionMiddleware::class)->setName('pres_restricteddruglist/view-pres_restricteddruglist-view-2'); // view
            $group->any('/edit[/{id}]', PresRestricteddruglistController::class . ':edit')->add(PermissionMiddleware::class)->setName('pres_restricteddruglist/edit-pres_restricteddruglist-edit-2'); // edit
            $group->any('/delete[/{id}]', PresRestricteddruglistController::class . ':delete')->add(PermissionMiddleware::class)->setName('pres_restricteddruglist/delete-pres_restricteddruglist-delete-2'); // delete
        }
    );

    // pres_routes
    $app->any('/PresRoutesList[/{SNo}]', PresRoutesController::class . ':list')->add(PermissionMiddleware::class)->setName('PresRoutesList-pres_routes-list'); // list
    $app->any('/PresRoutesAdd[/{SNo}]', PresRoutesController::class . ':add')->add(PermissionMiddleware::class)->setName('PresRoutesAdd-pres_routes-add'); // add
    $app->any('/PresRoutesView[/{SNo}]', PresRoutesController::class . ':view')->add(PermissionMiddleware::class)->setName('PresRoutesView-pres_routes-view'); // view
    $app->any('/PresRoutesEdit[/{SNo}]', PresRoutesController::class . ':edit')->add(PermissionMiddleware::class)->setName('PresRoutesEdit-pres_routes-edit'); // edit
    $app->any('/PresRoutesDelete[/{SNo}]', PresRoutesController::class . ':delete')->add(PermissionMiddleware::class)->setName('PresRoutesDelete-pres_routes-delete'); // delete
    $app->group(
        '/pres_routes',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{SNo}]', PresRoutesController::class . ':list')->add(PermissionMiddleware::class)->setName('pres_routes/list-pres_routes-list-2'); // list
            $group->any('/add[/{SNo}]', PresRoutesController::class . ':add')->add(PermissionMiddleware::class)->setName('pres_routes/add-pres_routes-add-2'); // add
            $group->any('/view[/{SNo}]', PresRoutesController::class . ':view')->add(PermissionMiddleware::class)->setName('pres_routes/view-pres_routes-view-2'); // view
            $group->any('/edit[/{SNo}]', PresRoutesController::class . ':edit')->add(PermissionMiddleware::class)->setName('pres_routes/edit-pres_routes-edit-2'); // edit
            $group->any('/delete[/{SNo}]', PresRoutesController::class . ':delete')->add(PermissionMiddleware::class)->setName('pres_routes/delete-pres_routes-delete-2'); // delete
        }
    );

    // pres_sideeffect_table
    $app->any('/PresSideeffectTableList[/{id}]', PresSideeffectTableController::class . ':list')->add(PermissionMiddleware::class)->setName('PresSideeffectTableList-pres_sideeffect_table-list'); // list
    $app->any('/PresSideeffectTableAdd[/{id}]', PresSideeffectTableController::class . ':add')->add(PermissionMiddleware::class)->setName('PresSideeffectTableAdd-pres_sideeffect_table-add'); // add
    $app->any('/PresSideeffectTableView[/{id}]', PresSideeffectTableController::class . ':view')->add(PermissionMiddleware::class)->setName('PresSideeffectTableView-pres_sideeffect_table-view'); // view
    $app->any('/PresSideeffectTableEdit[/{id}]', PresSideeffectTableController::class . ':edit')->add(PermissionMiddleware::class)->setName('PresSideeffectTableEdit-pres_sideeffect_table-edit'); // edit
    $app->any('/PresSideeffectTableDelete[/{id}]', PresSideeffectTableController::class . ':delete')->add(PermissionMiddleware::class)->setName('PresSideeffectTableDelete-pres_sideeffect_table-delete'); // delete
    $app->group(
        '/pres_sideeffect_table',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', PresSideeffectTableController::class . ':list')->add(PermissionMiddleware::class)->setName('pres_sideeffect_table/list-pres_sideeffect_table-list-2'); // list
            $group->any('/add[/{id}]', PresSideeffectTableController::class . ':add')->add(PermissionMiddleware::class)->setName('pres_sideeffect_table/add-pres_sideeffect_table-add-2'); // add
            $group->any('/view[/{id}]', PresSideeffectTableController::class . ':view')->add(PermissionMiddleware::class)->setName('pres_sideeffect_table/view-pres_sideeffect_table-view-2'); // view
            $group->any('/edit[/{id}]', PresSideeffectTableController::class . ':edit')->add(PermissionMiddleware::class)->setName('pres_sideeffect_table/edit-pres_sideeffect_table-edit-2'); // edit
            $group->any('/delete[/{id}]', PresSideeffectTableController::class . ':delete')->add(PermissionMiddleware::class)->setName('pres_sideeffect_table/delete-pres_sideeffect_table-delete-2'); // delete
        }
    );

    // pres_trade_combination_names
    $app->any('/PresTradeCombinationNamesList[/{id}]', PresTradeCombinationNamesController::class . ':list')->add(PermissionMiddleware::class)->setName('PresTradeCombinationNamesList-pres_trade_combination_names-list'); // list
    $app->any('/PresTradeCombinationNamesAdd[/{id}]', PresTradeCombinationNamesController::class . ':add')->add(PermissionMiddleware::class)->setName('PresTradeCombinationNamesAdd-pres_trade_combination_names-add'); // add
    $app->any('/PresTradeCombinationNamesView[/{id}]', PresTradeCombinationNamesController::class . ':view')->add(PermissionMiddleware::class)->setName('PresTradeCombinationNamesView-pres_trade_combination_names-view'); // view
    $app->any('/PresTradeCombinationNamesEdit[/{id}]', PresTradeCombinationNamesController::class . ':edit')->add(PermissionMiddleware::class)->setName('PresTradeCombinationNamesEdit-pres_trade_combination_names-edit'); // edit
    $app->any('/PresTradeCombinationNamesDelete[/{id}]', PresTradeCombinationNamesController::class . ':delete')->add(PermissionMiddleware::class)->setName('PresTradeCombinationNamesDelete-pres_trade_combination_names-delete'); // delete
    $app->group(
        '/pres_trade_combination_names',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', PresTradeCombinationNamesController::class . ':list')->add(PermissionMiddleware::class)->setName('pres_trade_combination_names/list-pres_trade_combination_names-list-2'); // list
            $group->any('/add[/{id}]', PresTradeCombinationNamesController::class . ':add')->add(PermissionMiddleware::class)->setName('pres_trade_combination_names/add-pres_trade_combination_names-add-2'); // add
            $group->any('/view[/{id}]', PresTradeCombinationNamesController::class . ':view')->add(PermissionMiddleware::class)->setName('pres_trade_combination_names/view-pres_trade_combination_names-view-2'); // view
            $group->any('/edit[/{id}]', PresTradeCombinationNamesController::class . ':edit')->add(PermissionMiddleware::class)->setName('pres_trade_combination_names/edit-pres_trade_combination_names-edit-2'); // edit
            $group->any('/delete[/{id}]', PresTradeCombinationNamesController::class . ':delete')->add(PermissionMiddleware::class)->setName('pres_trade_combination_names/delete-pres_trade_combination_names-delete-2'); // delete
        }
    );

    // pres_trade_combination_names_new
    $app->any('/PresTradeCombinationNamesNewList[/{ID}]', PresTradeCombinationNamesNewController::class . ':list')->add(PermissionMiddleware::class)->setName('PresTradeCombinationNamesNewList-pres_trade_combination_names_new-list'); // list
    $app->any('/PresTradeCombinationNamesNewAdd[/{ID}]', PresTradeCombinationNamesNewController::class . ':add')->add(PermissionMiddleware::class)->setName('PresTradeCombinationNamesNewAdd-pres_trade_combination_names_new-add'); // add
    $app->any('/PresTradeCombinationNamesNewView[/{ID}]', PresTradeCombinationNamesNewController::class . ':view')->add(PermissionMiddleware::class)->setName('PresTradeCombinationNamesNewView-pres_trade_combination_names_new-view'); // view
    $app->any('/PresTradeCombinationNamesNewEdit[/{ID}]', PresTradeCombinationNamesNewController::class . ':edit')->add(PermissionMiddleware::class)->setName('PresTradeCombinationNamesNewEdit-pres_trade_combination_names_new-edit'); // edit
    $app->any('/PresTradeCombinationNamesNewDelete[/{ID}]', PresTradeCombinationNamesNewController::class . ':delete')->add(PermissionMiddleware::class)->setName('PresTradeCombinationNamesNewDelete-pres_trade_combination_names_new-delete'); // delete
    $app->group(
        '/pres_trade_combination_names_new',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{ID}]', PresTradeCombinationNamesNewController::class . ':list')->add(PermissionMiddleware::class)->setName('pres_trade_combination_names_new/list-pres_trade_combination_names_new-list-2'); // list
            $group->any('/add[/{ID}]', PresTradeCombinationNamesNewController::class . ':add')->add(PermissionMiddleware::class)->setName('pres_trade_combination_names_new/add-pres_trade_combination_names_new-add-2'); // add
            $group->any('/view[/{ID}]', PresTradeCombinationNamesNewController::class . ':view')->add(PermissionMiddleware::class)->setName('pres_trade_combination_names_new/view-pres_trade_combination_names_new-view-2'); // view
            $group->any('/edit[/{ID}]', PresTradeCombinationNamesNewController::class . ':edit')->add(PermissionMiddleware::class)->setName('pres_trade_combination_names_new/edit-pres_trade_combination_names_new-edit-2'); // edit
            $group->any('/delete[/{ID}]', PresTradeCombinationNamesNewController::class . ':delete')->add(PermissionMiddleware::class)->setName('pres_trade_combination_names_new/delete-pres_trade_combination_names_new-delete-2'); // delete
        }
    );

    // pres_tradenames
    $app->any('/PresTradenamesList[/{id}]', PresTradenamesController::class . ':list')->add(PermissionMiddleware::class)->setName('PresTradenamesList-pres_tradenames-list'); // list
    $app->any('/PresTradenamesAdd[/{id}]', PresTradenamesController::class . ':add')->add(PermissionMiddleware::class)->setName('PresTradenamesAdd-pres_tradenames-add'); // add
    $app->any('/PresTradenamesView[/{id}]', PresTradenamesController::class . ':view')->add(PermissionMiddleware::class)->setName('PresTradenamesView-pres_tradenames-view'); // view
    $app->any('/PresTradenamesEdit[/{id}]', PresTradenamesController::class . ':edit')->add(PermissionMiddleware::class)->setName('PresTradenamesEdit-pres_tradenames-edit'); // edit
    $app->any('/PresTradenamesDelete[/{id}]', PresTradenamesController::class . ':delete')->add(PermissionMiddleware::class)->setName('PresTradenamesDelete-pres_tradenames-delete'); // delete
    $app->group(
        '/pres_tradenames',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', PresTradenamesController::class . ':list')->add(PermissionMiddleware::class)->setName('pres_tradenames/list-pres_tradenames-list-2'); // list
            $group->any('/add[/{id}]', PresTradenamesController::class . ':add')->add(PermissionMiddleware::class)->setName('pres_tradenames/add-pres_tradenames-add-2'); // add
            $group->any('/view[/{id}]', PresTradenamesController::class . ':view')->add(PermissionMiddleware::class)->setName('pres_tradenames/view-pres_tradenames-view-2'); // view
            $group->any('/edit[/{id}]', PresTradenamesController::class . ':edit')->add(PermissionMiddleware::class)->setName('pres_tradenames/edit-pres_tradenames-edit-2'); // edit
            $group->any('/delete[/{id}]', PresTradenamesController::class . ':delete')->add(PermissionMiddleware::class)->setName('pres_tradenames/delete-pres_tradenames-delete-2'); // delete
        }
    );

    // pres_tradenames_new
    $app->any('/PresTradenamesNewList[/{ID}]', PresTradenamesNewController::class . ':list')->add(PermissionMiddleware::class)->setName('PresTradenamesNewList-pres_tradenames_new-list'); // list
    $app->any('/PresTradenamesNewAdd[/{ID}]', PresTradenamesNewController::class . ':add')->add(PermissionMiddleware::class)->setName('PresTradenamesNewAdd-pres_tradenames_new-add'); // add
    $app->any('/PresTradenamesNewView[/{ID}]', PresTradenamesNewController::class . ':view')->add(PermissionMiddleware::class)->setName('PresTradenamesNewView-pres_tradenames_new-view'); // view
    $app->any('/PresTradenamesNewEdit[/{ID}]', PresTradenamesNewController::class . ':edit')->add(PermissionMiddleware::class)->setName('PresTradenamesNewEdit-pres_tradenames_new-edit'); // edit
    $app->any('/PresTradenamesNewDelete[/{ID}]', PresTradenamesNewController::class . ':delete')->add(PermissionMiddleware::class)->setName('PresTradenamesNewDelete-pres_tradenames_new-delete'); // delete
    $app->group(
        '/pres_tradenames_new',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{ID}]', PresTradenamesNewController::class . ':list')->add(PermissionMiddleware::class)->setName('pres_tradenames_new/list-pres_tradenames_new-list-2'); // list
            $group->any('/add[/{ID}]', PresTradenamesNewController::class . ':add')->add(PermissionMiddleware::class)->setName('pres_tradenames_new/add-pres_tradenames_new-add-2'); // add
            $group->any('/view[/{ID}]', PresTradenamesNewController::class . ':view')->add(PermissionMiddleware::class)->setName('pres_tradenames_new/view-pres_tradenames_new-view-2'); // view
            $group->any('/edit[/{ID}]', PresTradenamesNewController::class . ':edit')->add(PermissionMiddleware::class)->setName('pres_tradenames_new/edit-pres_tradenames_new-edit-2'); // edit
            $group->any('/delete[/{ID}]', PresTradenamesNewController::class . ':delete')->add(PermissionMiddleware::class)->setName('pres_tradenames_new/delete-pres_tradenames_new-delete-2'); // delete
        }
    );

    // receipts
    $app->any('/ReceiptsList[/{id}]', ReceiptsController::class . ':list')->add(PermissionMiddleware::class)->setName('ReceiptsList-receipts-list'); // list
    $app->any('/ReceiptsAdd[/{id}]', ReceiptsController::class . ':add')->add(PermissionMiddleware::class)->setName('ReceiptsAdd-receipts-add'); // add
    $app->any('/ReceiptsView[/{id}]', ReceiptsController::class . ':view')->add(PermissionMiddleware::class)->setName('ReceiptsView-receipts-view'); // view
    $app->any('/ReceiptsEdit[/{id}]', ReceiptsController::class . ':edit')->add(PermissionMiddleware::class)->setName('ReceiptsEdit-receipts-edit'); // edit
    $app->any('/ReceiptsDelete[/{id}]', ReceiptsController::class . ':delete')->add(PermissionMiddleware::class)->setName('ReceiptsDelete-receipts-delete'); // delete
    $app->group(
        '/receipts',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', ReceiptsController::class . ':list')->add(PermissionMiddleware::class)->setName('receipts/list-receipts-list-2'); // list
            $group->any('/add[/{id}]', ReceiptsController::class . ':add')->add(PermissionMiddleware::class)->setName('receipts/add-receipts-add-2'); // add
            $group->any('/view[/{id}]', ReceiptsController::class . ':view')->add(PermissionMiddleware::class)->setName('receipts/view-receipts-view-2'); // view
            $group->any('/edit[/{id}]', ReceiptsController::class . ':edit')->add(PermissionMiddleware::class)->setName('receipts/edit-receipts-edit-2'); // edit
            $group->any('/delete[/{id}]', ReceiptsController::class . ':delete')->add(PermissionMiddleware::class)->setName('receipts/delete-receipts-delete-2'); // delete
        }
    );

    // reception
    $app->any('/ReceptionList[/{id}]', ReceptionController::class . ':list')->add(PermissionMiddleware::class)->setName('ReceptionList-reception-list'); // list
    $app->any('/ReceptionAdd[/{id}]', ReceptionController::class . ':add')->add(PermissionMiddleware::class)->setName('ReceptionAdd-reception-add'); // add
    $app->any('/ReceptionView[/{id}]', ReceptionController::class . ':view')->add(PermissionMiddleware::class)->setName('ReceptionView-reception-view'); // view
    $app->any('/ReceptionEdit[/{id}]', ReceptionController::class . ':edit')->add(PermissionMiddleware::class)->setName('ReceptionEdit-reception-edit'); // edit
    $app->any('/ReceptionDelete[/{id}]', ReceptionController::class . ':delete')->add(PermissionMiddleware::class)->setName('ReceptionDelete-reception-delete'); // delete
    $app->group(
        '/reception',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', ReceptionController::class . ':list')->add(PermissionMiddleware::class)->setName('reception/list-reception-list-2'); // list
            $group->any('/add[/{id}]', ReceptionController::class . ':add')->add(PermissionMiddleware::class)->setName('reception/add-reception-add-2'); // add
            $group->any('/view[/{id}]', ReceptionController::class . ':view')->add(PermissionMiddleware::class)->setName('reception/view-reception-view-2'); // view
            $group->any('/edit[/{id}]', ReceptionController::class . ':edit')->add(PermissionMiddleware::class)->setName('reception/edit-reception-edit-2'); // edit
            $group->any('/delete[/{id}]', ReceptionController::class . ':delete')->add(PermissionMiddleware::class)->setName('reception/delete-reception-delete-2'); // delete
        }
    );

    // room_master
    $app->any('/RoomMasterList[/{id}]', RoomMasterController::class . ':list')->add(PermissionMiddleware::class)->setName('RoomMasterList-room_master-list'); // list
    $app->any('/RoomMasterAdd[/{id}]', RoomMasterController::class . ':add')->add(PermissionMiddleware::class)->setName('RoomMasterAdd-room_master-add'); // add
    $app->any('/RoomMasterView[/{id}]', RoomMasterController::class . ':view')->add(PermissionMiddleware::class)->setName('RoomMasterView-room_master-view'); // view
    $app->any('/RoomMasterEdit[/{id}]', RoomMasterController::class . ':edit')->add(PermissionMiddleware::class)->setName('RoomMasterEdit-room_master-edit'); // edit
    $app->any('/RoomMasterDelete[/{id}]', RoomMasterController::class . ':delete')->add(PermissionMiddleware::class)->setName('RoomMasterDelete-room_master-delete'); // delete
    $app->group(
        '/room_master',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', RoomMasterController::class . ':list')->add(PermissionMiddleware::class)->setName('room_master/list-room_master-list-2'); // list
            $group->any('/add[/{id}]', RoomMasterController::class . ':add')->add(PermissionMiddleware::class)->setName('room_master/add-room_master-add-2'); // add
            $group->any('/view[/{id}]', RoomMasterController::class . ':view')->add(PermissionMiddleware::class)->setName('room_master/view-room_master-view-2'); // view
            $group->any('/edit[/{id}]', RoomMasterController::class . ':edit')->add(PermissionMiddleware::class)->setName('room_master/edit-room_master-edit-2'); // edit
            $group->any('/delete[/{id}]', RoomMasterController::class . ':delete')->add(PermissionMiddleware::class)->setName('room_master/delete-room_master-delete-2'); // delete
        }
    );

    // room_types
    $app->any('/RoomTypesList[/{Id}]', RoomTypesController::class . ':list')->add(PermissionMiddleware::class)->setName('RoomTypesList-room_types-list'); // list
    $app->any('/RoomTypesAdd[/{Id}]', RoomTypesController::class . ':add')->add(PermissionMiddleware::class)->setName('RoomTypesAdd-room_types-add'); // add
    $app->any('/RoomTypesView[/{Id}]', RoomTypesController::class . ':view')->add(PermissionMiddleware::class)->setName('RoomTypesView-room_types-view'); // view
    $app->any('/RoomTypesEdit[/{Id}]', RoomTypesController::class . ':edit')->add(PermissionMiddleware::class)->setName('RoomTypesEdit-room_types-edit'); // edit
    $app->any('/RoomTypesDelete[/{Id}]', RoomTypesController::class . ':delete')->add(PermissionMiddleware::class)->setName('RoomTypesDelete-room_types-delete'); // delete
    $app->group(
        '/room_types',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{Id}]', RoomTypesController::class . ':list')->add(PermissionMiddleware::class)->setName('room_types/list-room_types-list-2'); // list
            $group->any('/add[/{Id}]', RoomTypesController::class . ':add')->add(PermissionMiddleware::class)->setName('room_types/add-room_types-add-2'); // add
            $group->any('/view[/{Id}]', RoomTypesController::class . ':view')->add(PermissionMiddleware::class)->setName('room_types/view-room_types-view-2'); // view
            $group->any('/edit[/{Id}]', RoomTypesController::class . ':edit')->add(PermissionMiddleware::class)->setName('room_types/edit-room_types-edit-2'); // edit
            $group->any('/delete[/{Id}]', RoomTypesController::class . ':delete')->add(PermissionMiddleware::class)->setName('room_types/delete-room_types-delete-2'); // delete
        }
    );

    // sms_cintent
    $app->any('/SmsCintentList[/{id}]', SmsCintentController::class . ':list')->add(PermissionMiddleware::class)->setName('SmsCintentList-sms_cintent-list'); // list
    $app->any('/SmsCintentAdd[/{id}]', SmsCintentController::class . ':add')->add(PermissionMiddleware::class)->setName('SmsCintentAdd-sms_cintent-add'); // add
    $app->any('/SmsCintentView[/{id}]', SmsCintentController::class . ':view')->add(PermissionMiddleware::class)->setName('SmsCintentView-sms_cintent-view'); // view
    $app->any('/SmsCintentEdit[/{id}]', SmsCintentController::class . ':edit')->add(PermissionMiddleware::class)->setName('SmsCintentEdit-sms_cintent-edit'); // edit
    $app->any('/SmsCintentDelete[/{id}]', SmsCintentController::class . ':delete')->add(PermissionMiddleware::class)->setName('SmsCintentDelete-sms_cintent-delete'); // delete
    $app->group(
        '/sms_cintent',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', SmsCintentController::class . ':list')->add(PermissionMiddleware::class)->setName('sms_cintent/list-sms_cintent-list-2'); // list
            $group->any('/add[/{id}]', SmsCintentController::class . ':add')->add(PermissionMiddleware::class)->setName('sms_cintent/add-sms_cintent-add-2'); // add
            $group->any('/view[/{id}]', SmsCintentController::class . ':view')->add(PermissionMiddleware::class)->setName('sms_cintent/view-sms_cintent-view-2'); // view
            $group->any('/edit[/{id}]', SmsCintentController::class . ':edit')->add(PermissionMiddleware::class)->setName('sms_cintent/edit-sms_cintent-edit-2'); // edit
            $group->any('/delete[/{id}]', SmsCintentController::class . ':delete')->add(PermissionMiddleware::class)->setName('sms_cintent/delete-sms_cintent-delete-2'); // delete
        }
    );

    // sms_type
    $app->any('/SmsTypeList[/{id}]', SmsTypeController::class . ':list')->add(PermissionMiddleware::class)->setName('SmsTypeList-sms_type-list'); // list
    $app->any('/SmsTypeAdd[/{id}]', SmsTypeController::class . ':add')->add(PermissionMiddleware::class)->setName('SmsTypeAdd-sms_type-add'); // add
    $app->any('/SmsTypeView[/{id}]', SmsTypeController::class . ':view')->add(PermissionMiddleware::class)->setName('SmsTypeView-sms_type-view'); // view
    $app->any('/SmsTypeEdit[/{id}]', SmsTypeController::class . ':edit')->add(PermissionMiddleware::class)->setName('SmsTypeEdit-sms_type-edit'); // edit
    $app->any('/SmsTypeDelete[/{id}]', SmsTypeController::class . ':delete')->add(PermissionMiddleware::class)->setName('SmsTypeDelete-sms_type-delete'); // delete
    $app->group(
        '/sms_type',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', SmsTypeController::class . ':list')->add(PermissionMiddleware::class)->setName('sms_type/list-sms_type-list-2'); // list
            $group->any('/add[/{id}]', SmsTypeController::class . ':add')->add(PermissionMiddleware::class)->setName('sms_type/add-sms_type-add-2'); // add
            $group->any('/view[/{id}]', SmsTypeController::class . ':view')->add(PermissionMiddleware::class)->setName('sms_type/view-sms_type-view-2'); // view
            $group->any('/edit[/{id}]', SmsTypeController::class . ':edit')->add(PermissionMiddleware::class)->setName('sms_type/edit-sms_type-edit-2'); // edit
            $group->any('/delete[/{id}]', SmsTypeController::class . ':delete')->add(PermissionMiddleware::class)->setName('sms_type/delete-sms_type-delete-2'); // delete
        }
    );

    // store_batchmas
    $app->any('/StoreBatchmasList[/{id}]', StoreBatchmasController::class . ':list')->add(PermissionMiddleware::class)->setName('StoreBatchmasList-store_batchmas-list'); // list
    $app->any('/StoreBatchmasAdd[/{id}]', StoreBatchmasController::class . ':add')->add(PermissionMiddleware::class)->setName('StoreBatchmasAdd-store_batchmas-add'); // add
    $app->any('/StoreBatchmasView[/{id}]', StoreBatchmasController::class . ':view')->add(PermissionMiddleware::class)->setName('StoreBatchmasView-store_batchmas-view'); // view
    $app->any('/StoreBatchmasEdit[/{id}]', StoreBatchmasController::class . ':edit')->add(PermissionMiddleware::class)->setName('StoreBatchmasEdit-store_batchmas-edit'); // edit
    $app->any('/StoreBatchmasDelete[/{id}]', StoreBatchmasController::class . ':delete')->add(PermissionMiddleware::class)->setName('StoreBatchmasDelete-store_batchmas-delete'); // delete
    $app->group(
        '/store_batchmas',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', StoreBatchmasController::class . ':list')->add(PermissionMiddleware::class)->setName('store_batchmas/list-store_batchmas-list-2'); // list
            $group->any('/add[/{id}]', StoreBatchmasController::class . ':add')->add(PermissionMiddleware::class)->setName('store_batchmas/add-store_batchmas-add-2'); // add
            $group->any('/view[/{id}]', StoreBatchmasController::class . ':view')->add(PermissionMiddleware::class)->setName('store_batchmas/view-store_batchmas-view-2'); // view
            $group->any('/edit[/{id}]', StoreBatchmasController::class . ':edit')->add(PermissionMiddleware::class)->setName('store_batchmas/edit-store_batchmas-edit-2'); // edit
            $group->any('/delete[/{id}]', StoreBatchmasController::class . ':delete')->add(PermissionMiddleware::class)->setName('store_batchmas/delete-store_batchmas-delete-2'); // delete
        }
    );

    // store_intent_issue
    $app->any('/StoreIntentIssueList[/{id}]', StoreIntentIssueController::class . ':list')->add(PermissionMiddleware::class)->setName('StoreIntentIssueList-store_intent_issue-list'); // list
    $app->any('/StoreIntentIssueAdd[/{id}]', StoreIntentIssueController::class . ':add')->add(PermissionMiddleware::class)->setName('StoreIntentIssueAdd-store_intent_issue-add'); // add
    $app->any('/StoreIntentIssueView[/{id}]', StoreIntentIssueController::class . ':view')->add(PermissionMiddleware::class)->setName('StoreIntentIssueView-store_intent_issue-view'); // view
    $app->any('/StoreIntentIssueEdit[/{id}]', StoreIntentIssueController::class . ':edit')->add(PermissionMiddleware::class)->setName('StoreIntentIssueEdit-store_intent_issue-edit'); // edit
    $app->any('/StoreIntentIssueDelete[/{id}]', StoreIntentIssueController::class . ':delete')->add(PermissionMiddleware::class)->setName('StoreIntentIssueDelete-store_intent_issue-delete'); // delete
    $app->group(
        '/store_intent_issue',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', StoreIntentIssueController::class . ':list')->add(PermissionMiddleware::class)->setName('store_intent_issue/list-store_intent_issue-list-2'); // list
            $group->any('/add[/{id}]', StoreIntentIssueController::class . ':add')->add(PermissionMiddleware::class)->setName('store_intent_issue/add-store_intent_issue-add-2'); // add
            $group->any('/view[/{id}]', StoreIntentIssueController::class . ':view')->add(PermissionMiddleware::class)->setName('store_intent_issue/view-store_intent_issue-view-2'); // view
            $group->any('/edit[/{id}]', StoreIntentIssueController::class . ':edit')->add(PermissionMiddleware::class)->setName('store_intent_issue/edit-store_intent_issue-edit-2'); // edit
            $group->any('/delete[/{id}]', StoreIntentIssueController::class . ':delete')->add(PermissionMiddleware::class)->setName('store_intent_issue/delete-store_intent_issue-delete-2'); // delete
        }
    );

    // store_storeled
    $app->any('/StoreStoreledList[/{id}]', StoreStoreledController::class . ':list')->add(PermissionMiddleware::class)->setName('StoreStoreledList-store_storeled-list'); // list
    $app->any('/StoreStoreledAdd[/{id}]', StoreStoreledController::class . ':add')->add(PermissionMiddleware::class)->setName('StoreStoreledAdd-store_storeled-add'); // add
    $app->any('/StoreStoreledView[/{id}]', StoreStoreledController::class . ':view')->add(PermissionMiddleware::class)->setName('StoreStoreledView-store_storeled-view'); // view
    $app->any('/StoreStoreledEdit[/{id}]', StoreStoreledController::class . ':edit')->add(PermissionMiddleware::class)->setName('StoreStoreledEdit-store_storeled-edit'); // edit
    $app->any('/StoreStoreledDelete[/{id}]', StoreStoreledController::class . ':delete')->add(PermissionMiddleware::class)->setName('StoreStoreledDelete-store_storeled-delete'); // delete
    $app->group(
        '/store_storeled',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', StoreStoreledController::class . ':list')->add(PermissionMiddleware::class)->setName('store_storeled/list-store_storeled-list-2'); // list
            $group->any('/add[/{id}]', StoreStoreledController::class . ':add')->add(PermissionMiddleware::class)->setName('store_storeled/add-store_storeled-add-2'); // add
            $group->any('/view[/{id}]', StoreStoreledController::class . ':view')->add(PermissionMiddleware::class)->setName('store_storeled/view-store_storeled-view-2'); // view
            $group->any('/edit[/{id}]', StoreStoreledController::class . ':edit')->add(PermissionMiddleware::class)->setName('store_storeled/edit-store_storeled-edit-2'); // edit
            $group->any('/delete[/{id}]', StoreStoreledController::class . ':delete')->add(PermissionMiddleware::class)->setName('store_storeled/delete-store_storeled-delete-2'); // delete
        }
    );

    // store_storemast
    $app->any('/StoreStoremastList[/{id}]', StoreStoremastController::class . ':list')->add(PermissionMiddleware::class)->setName('StoreStoremastList-store_storemast-list'); // list
    $app->any('/StoreStoremastAdd[/{id}]', StoreStoremastController::class . ':add')->add(PermissionMiddleware::class)->setName('StoreStoremastAdd-store_storemast-add'); // add
    $app->any('/StoreStoremastView[/{id}]', StoreStoremastController::class . ':view')->add(PermissionMiddleware::class)->setName('StoreStoremastView-store_storemast-view'); // view
    $app->any('/StoreStoremastEdit[/{id}]', StoreStoremastController::class . ':edit')->add(PermissionMiddleware::class)->setName('StoreStoremastEdit-store_storemast-edit'); // edit
    $app->any('/StoreStoremastDelete[/{id}]', StoreStoremastController::class . ':delete')->add(PermissionMiddleware::class)->setName('StoreStoremastDelete-store_storemast-delete'); // delete
    $app->group(
        '/store_storemast',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', StoreStoremastController::class . ':list')->add(PermissionMiddleware::class)->setName('store_storemast/list-store_storemast-list-2'); // list
            $group->any('/add[/{id}]', StoreStoremastController::class . ':add')->add(PermissionMiddleware::class)->setName('store_storemast/add-store_storemast-add-2'); // add
            $group->any('/view[/{id}]', StoreStoremastController::class . ':view')->add(PermissionMiddleware::class)->setName('store_storemast/view-store_storemast-view-2'); // view
            $group->any('/edit[/{id}]', StoreStoremastController::class . ':edit')->add(PermissionMiddleware::class)->setName('store_storemast/edit-store_storemast-edit-2'); // edit
            $group->any('/delete[/{id}]', StoreStoremastController::class . ':delete')->add(PermissionMiddleware::class)->setName('store_storemast/delete-store_storemast-delete-2'); // delete
        }
    );

    // store_suppliers
    $app->any('/StoreSuppliersList[/{id}]', StoreSuppliersController::class . ':list')->add(PermissionMiddleware::class)->setName('StoreSuppliersList-store_suppliers-list'); // list
    $app->any('/StoreSuppliersAdd[/{id}]', StoreSuppliersController::class . ':add')->add(PermissionMiddleware::class)->setName('StoreSuppliersAdd-store_suppliers-add'); // add
    $app->any('/StoreSuppliersView[/{id}]', StoreSuppliersController::class . ':view')->add(PermissionMiddleware::class)->setName('StoreSuppliersView-store_suppliers-view'); // view
    $app->any('/StoreSuppliersEdit[/{id}]', StoreSuppliersController::class . ':edit')->add(PermissionMiddleware::class)->setName('StoreSuppliersEdit-store_suppliers-edit'); // edit
    $app->any('/StoreSuppliersDelete[/{id}]', StoreSuppliersController::class . ':delete')->add(PermissionMiddleware::class)->setName('StoreSuppliersDelete-store_suppliers-delete'); // delete
    $app->group(
        '/store_suppliers',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', StoreSuppliersController::class . ':list')->add(PermissionMiddleware::class)->setName('store_suppliers/list-store_suppliers-list-2'); // list
            $group->any('/add[/{id}]', StoreSuppliersController::class . ':add')->add(PermissionMiddleware::class)->setName('store_suppliers/add-store_suppliers-add-2'); // add
            $group->any('/view[/{id}]', StoreSuppliersController::class . ':view')->add(PermissionMiddleware::class)->setName('store_suppliers/view-store_suppliers-view-2'); // view
            $group->any('/edit[/{id}]', StoreSuppliersController::class . ':edit')->add(PermissionMiddleware::class)->setName('store_suppliers/edit-store_suppliers-edit-2'); // edit
            $group->any('/delete[/{id}]', StoreSuppliersController::class . ':delete')->add(PermissionMiddleware::class)->setName('store_suppliers/delete-store_suppliers-delete-2'); // delete
        }
    );

    // sys_address_type
    $app->any('/SysAddressTypeList[/{id}]', SysAddressTypeController::class . ':list')->add(PermissionMiddleware::class)->setName('SysAddressTypeList-sys_address_type-list'); // list
    $app->any('/SysAddressTypeAdd[/{id}]', SysAddressTypeController::class . ':add')->add(PermissionMiddleware::class)->setName('SysAddressTypeAdd-sys_address_type-add'); // add
    $app->any('/SysAddressTypeView[/{id}]', SysAddressTypeController::class . ':view')->add(PermissionMiddleware::class)->setName('SysAddressTypeView-sys_address_type-view'); // view
    $app->any('/SysAddressTypeEdit[/{id}]', SysAddressTypeController::class . ':edit')->add(PermissionMiddleware::class)->setName('SysAddressTypeEdit-sys_address_type-edit'); // edit
    $app->any('/SysAddressTypeDelete[/{id}]', SysAddressTypeController::class . ':delete')->add(PermissionMiddleware::class)->setName('SysAddressTypeDelete-sys_address_type-delete'); // delete
    $app->group(
        '/sys_address_type',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', SysAddressTypeController::class . ':list')->add(PermissionMiddleware::class)->setName('sys_address_type/list-sys_address_type-list-2'); // list
            $group->any('/add[/{id}]', SysAddressTypeController::class . ':add')->add(PermissionMiddleware::class)->setName('sys_address_type/add-sys_address_type-add-2'); // add
            $group->any('/view[/{id}]', SysAddressTypeController::class . ':view')->add(PermissionMiddleware::class)->setName('sys_address_type/view-sys_address_type-view-2'); // view
            $group->any('/edit[/{id}]', SysAddressTypeController::class . ':edit')->add(PermissionMiddleware::class)->setName('sys_address_type/edit-sys_address_type-edit-2'); // edit
            $group->any('/delete[/{id}]', SysAddressTypeController::class . ':delete')->add(PermissionMiddleware::class)->setName('sys_address_type/delete-sys_address_type-delete-2'); // delete
        }
    );

    // sys_days
    $app->any('/SysDaysList[/{id}]', SysDaysController::class . ':list')->add(PermissionMiddleware::class)->setName('SysDaysList-sys_days-list'); // list
    $app->any('/SysDaysAdd[/{id}]', SysDaysController::class . ':add')->add(PermissionMiddleware::class)->setName('SysDaysAdd-sys_days-add'); // add
    $app->any('/SysDaysView[/{id}]', SysDaysController::class . ':view')->add(PermissionMiddleware::class)->setName('SysDaysView-sys_days-view'); // view
    $app->any('/SysDaysEdit[/{id}]', SysDaysController::class . ':edit')->add(PermissionMiddleware::class)->setName('SysDaysEdit-sys_days-edit'); // edit
    $app->any('/SysDaysDelete[/{id}]', SysDaysController::class . ':delete')->add(PermissionMiddleware::class)->setName('SysDaysDelete-sys_days-delete'); // delete
    $app->group(
        '/sys_days',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', SysDaysController::class . ':list')->add(PermissionMiddleware::class)->setName('sys_days/list-sys_days-list-2'); // list
            $group->any('/add[/{id}]', SysDaysController::class . ':add')->add(PermissionMiddleware::class)->setName('sys_days/add-sys_days-add-2'); // add
            $group->any('/view[/{id}]', SysDaysController::class . ':view')->add(PermissionMiddleware::class)->setName('sys_days/view-sys_days-view-2'); // view
            $group->any('/edit[/{id}]', SysDaysController::class . ':edit')->add(PermissionMiddleware::class)->setName('sys_days/edit-sys_days-edit-2'); // edit
            $group->any('/delete[/{id}]', SysDaysController::class . ':delete')->add(PermissionMiddleware::class)->setName('sys_days/delete-sys_days-delete-2'); // delete
        }
    );

    // sys_email_type
    $app->any('/SysEmailTypeList[/{id}]', SysEmailTypeController::class . ':list')->add(PermissionMiddleware::class)->setName('SysEmailTypeList-sys_email_type-list'); // list
    $app->any('/SysEmailTypeAdd[/{id}]', SysEmailTypeController::class . ':add')->add(PermissionMiddleware::class)->setName('SysEmailTypeAdd-sys_email_type-add'); // add
    $app->any('/SysEmailTypeView[/{id}]', SysEmailTypeController::class . ':view')->add(PermissionMiddleware::class)->setName('SysEmailTypeView-sys_email_type-view'); // view
    $app->any('/SysEmailTypeEdit[/{id}]', SysEmailTypeController::class . ':edit')->add(PermissionMiddleware::class)->setName('SysEmailTypeEdit-sys_email_type-edit'); // edit
    $app->any('/SysEmailTypeDelete[/{id}]', SysEmailTypeController::class . ':delete')->add(PermissionMiddleware::class)->setName('SysEmailTypeDelete-sys_email_type-delete'); // delete
    $app->group(
        '/sys_email_type',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', SysEmailTypeController::class . ':list')->add(PermissionMiddleware::class)->setName('sys_email_type/list-sys_email_type-list-2'); // list
            $group->any('/add[/{id}]', SysEmailTypeController::class . ':add')->add(PermissionMiddleware::class)->setName('sys_email_type/add-sys_email_type-add-2'); // add
            $group->any('/view[/{id}]', SysEmailTypeController::class . ':view')->add(PermissionMiddleware::class)->setName('sys_email_type/view-sys_email_type-view-2'); // view
            $group->any('/edit[/{id}]', SysEmailTypeController::class . ':edit')->add(PermissionMiddleware::class)->setName('sys_email_type/edit-sys_email_type-edit-2'); // edit
            $group->any('/delete[/{id}]', SysEmailTypeController::class . ':delete')->add(PermissionMiddleware::class)->setName('sys_email_type/delete-sys_email_type-delete-2'); // delete
        }
    );

    // sys_gender
    $app->any('/SysGenderList[/{id}]', SysGenderController::class . ':list')->add(PermissionMiddleware::class)->setName('SysGenderList-sys_gender-list'); // list
    $app->any('/SysGenderAdd[/{id}]', SysGenderController::class . ':add')->add(PermissionMiddleware::class)->setName('SysGenderAdd-sys_gender-add'); // add
    $app->any('/SysGenderView[/{id}]', SysGenderController::class . ':view')->add(PermissionMiddleware::class)->setName('SysGenderView-sys_gender-view'); // view
    $app->any('/SysGenderEdit[/{id}]', SysGenderController::class . ':edit')->add(PermissionMiddleware::class)->setName('SysGenderEdit-sys_gender-edit'); // edit
    $app->any('/SysGenderDelete[/{id}]', SysGenderController::class . ':delete')->add(PermissionMiddleware::class)->setName('SysGenderDelete-sys_gender-delete'); // delete
    $app->group(
        '/sys_gender',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', SysGenderController::class . ':list')->add(PermissionMiddleware::class)->setName('sys_gender/list-sys_gender-list-2'); // list
            $group->any('/add[/{id}]', SysGenderController::class . ':add')->add(PermissionMiddleware::class)->setName('sys_gender/add-sys_gender-add-2'); // add
            $group->any('/view[/{id}]', SysGenderController::class . ':view')->add(PermissionMiddleware::class)->setName('sys_gender/view-sys_gender-view-2'); // view
            $group->any('/edit[/{id}]', SysGenderController::class . ':edit')->add(PermissionMiddleware::class)->setName('sys_gender/edit-sys_gender-edit-2'); // edit
            $group->any('/delete[/{id}]', SysGenderController::class . ':delete')->add(PermissionMiddleware::class)->setName('sys_gender/delete-sys_gender-delete-2'); // delete
        }
    );

    // sys_status
    $app->any('/SysStatusList[/{id}]', SysStatusController::class . ':list')->add(PermissionMiddleware::class)->setName('SysStatusList-sys_status-list'); // list
    $app->any('/SysStatusAdd[/{id}]', SysStatusController::class . ':add')->add(PermissionMiddleware::class)->setName('SysStatusAdd-sys_status-add'); // add
    $app->any('/SysStatusView[/{id}]', SysStatusController::class . ':view')->add(PermissionMiddleware::class)->setName('SysStatusView-sys_status-view'); // view
    $app->any('/SysStatusEdit[/{id}]', SysStatusController::class . ':edit')->add(PermissionMiddleware::class)->setName('SysStatusEdit-sys_status-edit'); // edit
    $app->any('/SysStatusDelete[/{id}]', SysStatusController::class . ':delete')->add(PermissionMiddleware::class)->setName('SysStatusDelete-sys_status-delete'); // delete
    $app->group(
        '/sys_status',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', SysStatusController::class . ':list')->add(PermissionMiddleware::class)->setName('sys_status/list-sys_status-list-2'); // list
            $group->any('/add[/{id}]', SysStatusController::class . ':add')->add(PermissionMiddleware::class)->setName('sys_status/add-sys_status-add-2'); // add
            $group->any('/view[/{id}]', SysStatusController::class . ':view')->add(PermissionMiddleware::class)->setName('sys_status/view-sys_status-view-2'); // view
            $group->any('/edit[/{id}]', SysStatusController::class . ':edit')->add(PermissionMiddleware::class)->setName('sys_status/edit-sys_status-edit-2'); // edit
            $group->any('/delete[/{id}]', SysStatusController::class . ':delete')->add(PermissionMiddleware::class)->setName('sys_status/delete-sys_status-delete-2'); // delete
        }
    );

    // sys_tele_type
    $app->any('/SysTeleTypeList[/{id}]', SysTeleTypeController::class . ':list')->add(PermissionMiddleware::class)->setName('SysTeleTypeList-sys_tele_type-list'); // list
    $app->any('/SysTeleTypeAdd[/{id}]', SysTeleTypeController::class . ':add')->add(PermissionMiddleware::class)->setName('SysTeleTypeAdd-sys_tele_type-add'); // add
    $app->any('/SysTeleTypeView[/{id}]', SysTeleTypeController::class . ':view')->add(PermissionMiddleware::class)->setName('SysTeleTypeView-sys_tele_type-view'); // view
    $app->any('/SysTeleTypeEdit[/{id}]', SysTeleTypeController::class . ':edit')->add(PermissionMiddleware::class)->setName('SysTeleTypeEdit-sys_tele_type-edit'); // edit
    $app->any('/SysTeleTypeDelete[/{id}]', SysTeleTypeController::class . ':delete')->add(PermissionMiddleware::class)->setName('SysTeleTypeDelete-sys_tele_type-delete'); // delete
    $app->group(
        '/sys_tele_type',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', SysTeleTypeController::class . ':list')->add(PermissionMiddleware::class)->setName('sys_tele_type/list-sys_tele_type-list-2'); // list
            $group->any('/add[/{id}]', SysTeleTypeController::class . ':add')->add(PermissionMiddleware::class)->setName('sys_tele_type/add-sys_tele_type-add-2'); // add
            $group->any('/view[/{id}]', SysTeleTypeController::class . ':view')->add(PermissionMiddleware::class)->setName('sys_tele_type/view-sys_tele_type-view-2'); // view
            $group->any('/edit[/{id}]', SysTeleTypeController::class . ':edit')->add(PermissionMiddleware::class)->setName('sys_tele_type/edit-sys_tele_type-edit-2'); // edit
            $group->any('/delete[/{id}]', SysTeleTypeController::class . ':delete')->add(PermissionMiddleware::class)->setName('sys_tele_type/delete-sys_tele_type-delete-2'); // delete
        }
    );

    // sys_telephone_type
    $app->any('/SysTelephoneTypeList[/{id}]', SysTelephoneTypeController::class . ':list')->add(PermissionMiddleware::class)->setName('SysTelephoneTypeList-sys_telephone_type-list'); // list
    $app->any('/SysTelephoneTypeAdd[/{id}]', SysTelephoneTypeController::class . ':add')->add(PermissionMiddleware::class)->setName('SysTelephoneTypeAdd-sys_telephone_type-add'); // add
    $app->any('/SysTelephoneTypeView[/{id}]', SysTelephoneTypeController::class . ':view')->add(PermissionMiddleware::class)->setName('SysTelephoneTypeView-sys_telephone_type-view'); // view
    $app->any('/SysTelephoneTypeEdit[/{id}]', SysTelephoneTypeController::class . ':edit')->add(PermissionMiddleware::class)->setName('SysTelephoneTypeEdit-sys_telephone_type-edit'); // edit
    $app->any('/SysTelephoneTypeDelete[/{id}]', SysTelephoneTypeController::class . ':delete')->add(PermissionMiddleware::class)->setName('SysTelephoneTypeDelete-sys_telephone_type-delete'); // delete
    $app->group(
        '/sys_telephone_type',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', SysTelephoneTypeController::class . ':list')->add(PermissionMiddleware::class)->setName('sys_telephone_type/list-sys_telephone_type-list-2'); // list
            $group->any('/add[/{id}]', SysTelephoneTypeController::class . ':add')->add(PermissionMiddleware::class)->setName('sys_telephone_type/add-sys_telephone_type-add-2'); // add
            $group->any('/view[/{id}]', SysTelephoneTypeController::class . ':view')->add(PermissionMiddleware::class)->setName('sys_telephone_type/view-sys_telephone_type-view-2'); // view
            $group->any('/edit[/{id}]', SysTelephoneTypeController::class . ':edit')->add(PermissionMiddleware::class)->setName('sys_telephone_type/edit-sys_telephone_type-edit-2'); // edit
            $group->any('/delete[/{id}]', SysTelephoneTypeController::class . ':delete')->add(PermissionMiddleware::class)->setName('sys_telephone_type/delete-sys_telephone_type-delete-2'); // delete
        }
    );

    // sys_tittle
    $app->any('/SysTittleList[/{id}]', SysTittleController::class . ':list')->add(PermissionMiddleware::class)->setName('SysTittleList-sys_tittle-list'); // list
    $app->any('/SysTittleAdd[/{id}]', SysTittleController::class . ':add')->add(PermissionMiddleware::class)->setName('SysTittleAdd-sys_tittle-add'); // add
    $app->any('/SysTittleView[/{id}]', SysTittleController::class . ':view')->add(PermissionMiddleware::class)->setName('SysTittleView-sys_tittle-view'); // view
    $app->any('/SysTittleEdit[/{id}]', SysTittleController::class . ':edit')->add(PermissionMiddleware::class)->setName('SysTittleEdit-sys_tittle-edit'); // edit
    $app->any('/SysTittleDelete[/{id}]', SysTittleController::class . ':delete')->add(PermissionMiddleware::class)->setName('SysTittleDelete-sys_tittle-delete'); // delete
    $app->group(
        '/sys_tittle',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', SysTittleController::class . ':list')->add(PermissionMiddleware::class)->setName('sys_tittle/list-sys_tittle-list-2'); // list
            $group->any('/add[/{id}]', SysTittleController::class . ':add')->add(PermissionMiddleware::class)->setName('sys_tittle/add-sys_tittle-add-2'); // add
            $group->any('/view[/{id}]', SysTittleController::class . ':view')->add(PermissionMiddleware::class)->setName('sys_tittle/view-sys_tittle-view-2'); // view
            $group->any('/edit[/{id}]', SysTittleController::class . ':edit')->add(PermissionMiddleware::class)->setName('sys_tittle/edit-sys_tittle-edit-2'); // edit
            $group->any('/delete[/{id}]', SysTittleController::class . ':delete')->add(PermissionMiddleware::class)->setName('sys_tittle/delete-sys_tittle-delete-2'); // delete
        }
    );

    // task_management
    $app->any('/TaskManagementList[/{id}]', TaskManagementController::class . ':list')->add(PermissionMiddleware::class)->setName('TaskManagementList-task_management-list'); // list
    $app->any('/TaskManagementAdd[/{id}]', TaskManagementController::class . ':add')->add(PermissionMiddleware::class)->setName('TaskManagementAdd-task_management-add'); // add
    $app->any('/TaskManagementView[/{id}]', TaskManagementController::class . ':view')->add(PermissionMiddleware::class)->setName('TaskManagementView-task_management-view'); // view
    $app->any('/TaskManagementEdit[/{id}]', TaskManagementController::class . ':edit')->add(PermissionMiddleware::class)->setName('TaskManagementEdit-task_management-edit'); // edit
    $app->any('/TaskManagementDelete[/{id}]', TaskManagementController::class . ':delete')->add(PermissionMiddleware::class)->setName('TaskManagementDelete-task_management-delete'); // delete
    $app->group(
        '/task_management',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', TaskManagementController::class . ':list')->add(PermissionMiddleware::class)->setName('task_management/list-task_management-list-2'); // list
            $group->any('/add[/{id}]', TaskManagementController::class . ':add')->add(PermissionMiddleware::class)->setName('task_management/add-task_management-add-2'); // add
            $group->any('/view[/{id}]', TaskManagementController::class . ':view')->add(PermissionMiddleware::class)->setName('task_management/view-task_management-view-2'); // view
            $group->any('/edit[/{id}]', TaskManagementController::class . ':edit')->add(PermissionMiddleware::class)->setName('task_management/edit-task_management-edit-2'); // edit
            $group->any('/delete[/{id}]', TaskManagementController::class . ':delete')->add(PermissionMiddleware::class)->setName('task_management/delete-task_management-delete-2'); // delete
        }
    );

    // thaw
    $app->any('/ThawList[/{id}]', ThawController::class . ':list')->add(PermissionMiddleware::class)->setName('ThawList-thaw-list'); // list
    $app->group(
        '/thaw',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', ThawController::class . ':list')->add(PermissionMiddleware::class)->setName('thaw/list-thaw-list-2'); // list
        }
    );

    // user_login
    $app->any('/UserLoginList[/{id}]', UserLoginController::class . ':list')->add(PermissionMiddleware::class)->setName('UserLoginList-user_login-list'); // list
    $app->any('/UserLoginAdd[/{id}]', UserLoginController::class . ':add')->add(PermissionMiddleware::class)->setName('UserLoginAdd-user_login-add'); // add
    $app->any('/UserLoginView[/{id}]', UserLoginController::class . ':view')->add(PermissionMiddleware::class)->setName('UserLoginView-user_login-view'); // view
    $app->any('/UserLoginEdit[/{id}]', UserLoginController::class . ':edit')->add(PermissionMiddleware::class)->setName('UserLoginEdit-user_login-edit'); // edit
    $app->any('/UserLoginDelete[/{id}]', UserLoginController::class . ':delete')->add(PermissionMiddleware::class)->setName('UserLoginDelete-user_login-delete'); // delete
    $app->group(
        '/user_login',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', UserLoginController::class . ':list')->add(PermissionMiddleware::class)->setName('user_login/list-user_login-list-2'); // list
            $group->any('/add[/{id}]', UserLoginController::class . ':add')->add(PermissionMiddleware::class)->setName('user_login/add-user_login-add-2'); // add
            $group->any('/view[/{id}]', UserLoginController::class . ':view')->add(PermissionMiddleware::class)->setName('user_login/view-user_login-view-2'); // view
            $group->any('/edit[/{id}]', UserLoginController::class . ':edit')->add(PermissionMiddleware::class)->setName('user_login/edit-user_login-edit-2'); // edit
            $group->any('/delete[/{id}]', UserLoginController::class . ':delete')->add(PermissionMiddleware::class)->setName('user_login/delete-user_login-delete-2'); // delete
        }
    );

    // userlevelpermissions
    $app->any('/UserlevelpermissionsList', UserlevelpermissionsController::class . ':list')->add(PermissionMiddleware::class)->setName('UserlevelpermissionsList-userlevelpermissions-list'); // list
    $app->group(
        '/userlevelpermissions',
        function (RouteCollectorProxy $group) {
            $group->any('/list', UserlevelpermissionsController::class . ':list')->add(PermissionMiddleware::class)->setName('userlevelpermissions/list-userlevelpermissions-list-2'); // list
        }
    );

    // userlevels
    $app->any('/UserlevelsList[/{id}]', UserlevelsController::class . ':list')->add(PermissionMiddleware::class)->setName('UserlevelsList-userlevels-list'); // list
    $app->any('/UserlevelsAdd[/{id}]', UserlevelsController::class . ':add')->add(PermissionMiddleware::class)->setName('UserlevelsAdd-userlevels-add'); // add
    $app->any('/UserlevelsView[/{id}]', UserlevelsController::class . ':view')->add(PermissionMiddleware::class)->setName('UserlevelsView-userlevels-view'); // view
    $app->any('/UserlevelsEdit[/{id}]', UserlevelsController::class . ':edit')->add(PermissionMiddleware::class)->setName('UserlevelsEdit-userlevels-edit'); // edit
    $app->any('/UserlevelsDelete[/{id}]', UserlevelsController::class . ':delete')->add(PermissionMiddleware::class)->setName('UserlevelsDelete-userlevels-delete'); // delete
    $app->group(
        '/userlevels',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', UserlevelsController::class . ':list')->add(PermissionMiddleware::class)->setName('userlevels/list-userlevels-list-2'); // list
            $group->any('/add[/{id}]', UserlevelsController::class . ':add')->add(PermissionMiddleware::class)->setName('userlevels/add-userlevels-add-2'); // add
            $group->any('/view[/{id}]', UserlevelsController::class . ':view')->add(PermissionMiddleware::class)->setName('userlevels/view-userlevels-view-2'); // view
            $group->any('/edit[/{id}]', UserlevelsController::class . ':edit')->add(PermissionMiddleware::class)->setName('userlevels/edit-userlevels-edit-2'); // edit
            $group->any('/delete[/{id}]', UserlevelsController::class . ':delete')->add(PermissionMiddleware::class)->setName('userlevels/delete-userlevels-delete-2'); // delete
        }
    );

    // view_activity_card
    $app->any('/ViewActivityCardList[/{id}]', ViewActivityCardController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewActivityCardList-view_activity_card-list'); // list
    $app->group(
        '/view_activity_card',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', ViewActivityCardController::class . ':list')->add(PermissionMiddleware::class)->setName('view_activity_card/list-view_activity_card-list-2'); // list
        }
    );

    // view_appointment
    $app->any('/ViewAppointmentList', ViewAppointmentController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewAppointmentList-view_appointment-list'); // list
    $app->group(
        '/view_appointment',
        function (RouteCollectorProxy $group) {
            $group->any('/list', ViewAppointmentController::class . ':list')->add(PermissionMiddleware::class)->setName('view_appointment/list-view_appointment-list-2'); // list
        }
    );

    // view_appointment_scheduler
    $app->any('/ViewAppointmentSchedulerList[/{id}]', ViewAppointmentSchedulerController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewAppointmentSchedulerList-view_appointment_scheduler-list'); // list
    $app->group(
        '/view_appointment_scheduler',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', ViewAppointmentSchedulerController::class . ':list')->add(PermissionMiddleware::class)->setName('view_appointment_scheduler/list-view_appointment_scheduler-list-2'); // list
        }
    );

    // view_appointment_scheduler_new
    $app->any('/ViewAppointmentSchedulerNewList[/{Id}]', ViewAppointmentSchedulerNewController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewAppointmentSchedulerNewList-view_appointment_scheduler_new-list'); // list
    $app->group(
        '/view_appointment_scheduler_new',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{Id}]', ViewAppointmentSchedulerNewController::class . ':list')->add(PermissionMiddleware::class)->setName('view_appointment_scheduler_new/list-view_appointment_scheduler_new-list-2'); // list
        }
    );

    // view_barcode_ivf
    $app->any('/ViewBarcodeIvfList[/{id}]', ViewBarcodeIvfController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewBarcodeIvfList-view_barcode_ivf-list'); // list
    $app->group(
        '/view_barcode_ivf',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', ViewBarcodeIvfController::class . ':list')->add(PermissionMiddleware::class)->setName('view_barcode_ivf/list-view_barcode_ivf-list-2'); // list
        }
    );

    // view_bill_collection_report
    $app->any('/ViewBillCollectionReportList', ViewBillCollectionReportController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewBillCollectionReportList-view_bill_collection_report-list'); // list
    $app->group(
        '/view_bill_collection_report',
        function (RouteCollectorProxy $group) {
            $group->any('/list', ViewBillCollectionReportController::class . ':list')->add(PermissionMiddleware::class)->setName('view_bill_collection_report/list-view_bill_collection_report-list-2'); // list
        }
    );

    // view_bill_collection_summary
    $app->any('/ViewBillCollectionSummaryList', ViewBillCollectionSummaryController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewBillCollectionSummaryList-view_bill_collection_summary-list'); // list
    $app->group(
        '/view_bill_collection_summary',
        function (RouteCollectorProxy $group) {
            $group->any('/list', ViewBillCollectionSummaryController::class . ':list')->add(PermissionMiddleware::class)->setName('view_bill_collection_summary/list-view_bill_collection_summary-list-2'); // list
        }
    );

    // view_billing_transaction
    $app->any('/ViewBillingTransactionList', ViewBillingTransactionController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewBillingTransactionList-view_billing_transaction-list'); // list
    $app->group(
        '/view_billing_transaction',
        function (RouteCollectorProxy $group) {
            $group->any('/list', ViewBillingTransactionController::class . ':list')->add(PermissionMiddleware::class)->setName('view_billing_transaction/list-view_billing_transaction-list-2'); // list
        }
    );

    // view_billing_voucher
    $app->any('/ViewBillingVoucherList[/{id}]', ViewBillingVoucherController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewBillingVoucherList-view_billing_voucher-list'); // list
    $app->group(
        '/view_billing_voucher',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', ViewBillingVoucherController::class . ':list')->add(PermissionMiddleware::class)->setName('view_billing_voucher/list-view_billing_voucher-list-2'); // list
        }
    );

    // view_billing_voucher_print
    $app->any('/ViewBillingVoucherPrintList[/{id}]', ViewBillingVoucherPrintController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewBillingVoucherPrintList-view_billing_voucher_print-list'); // list
    $app->group(
        '/view_billing_voucher_print',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', ViewBillingVoucherPrintController::class . ':list')->add(PermissionMiddleware::class)->setName('view_billing_voucher_print/list-view_billing_voucher_print-list-2'); // list
        }
    );

    // view_billing_voucher_voucher
    $app->any('/ViewBillingVoucherVoucherList[/{id}]', ViewBillingVoucherVoucherController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewBillingVoucherVoucherList-view_billing_voucher_voucher-list'); // list
    $app->group(
        '/view_billing_voucher_voucher',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', ViewBillingVoucherVoucherController::class . ':list')->add(PermissionMiddleware::class)->setName('view_billing_voucher_voucher/list-view_billing_voucher_voucher-list-2'); // list
        }
    );

    // view_dash_billing_voucher
    $app->any('/ViewDashBillingVoucherList[/{id}]', ViewDashBillingVoucherController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewDashBillingVoucherList-view_dash_billing_voucher-list'); // list
    $app->group(
        '/view_dash_billing_voucher',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', ViewDashBillingVoucherController::class . ':list')->add(PermissionMiddleware::class)->setName('view_dash_billing_voucher/list-view_dash_billing_voucher-list-2'); // list
        }
    );

    // view_dashboard_collection_details
    $app->any('/ViewDashboardCollectionDetailsList', ViewDashboardCollectionDetailsController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewDashboardCollectionDetailsList-view_dashboard_collection_details-list'); // list
    $app->group(
        '/view_dashboard_collection_details',
        function (RouteCollectorProxy $group) {
            $group->any('/list', ViewDashboardCollectionDetailsController::class . ':list')->add(PermissionMiddleware::class)->setName('view_dashboard_collection_details/list-view_dashboard_collection_details-list-2'); // list
        }
    );

    // view_dashboard_patient_details
    $app->any('/ViewDashboardPatientDetailsList[/{PatientID}]', ViewDashboardPatientDetailsController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewDashboardPatientDetailsList-view_dashboard_patient_details-list'); // list
    $app->group(
        '/view_dashboard_patient_details',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{PatientID}]', ViewDashboardPatientDetailsController::class . ':list')->add(PermissionMiddleware::class)->setName('view_dashboard_patient_details/list-view_dashboard_patient_details-list-2'); // list
        }
    );

    // view_dashboard_patient_summary
    $app->any('/ViewDashboardPatientSummaryList', ViewDashboardPatientSummaryController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewDashboardPatientSummaryList-view_dashboard_patient_summary-list'); // list
    $app->group(
        '/view_dashboard_patient_summary',
        function (RouteCollectorProxy $group) {
            $group->any('/list', ViewDashboardPatientSummaryController::class . ':list')->add(PermissionMiddleware::class)->setName('view_dashboard_patient_summary/list-view_dashboard_patient_summary-list-2'); // list
        }
    );

    // view_dashboard_service_count
    $app->any('/ViewDashboardServiceCountList', ViewDashboardServiceCountController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewDashboardServiceCountList-view_dashboard_service_count-list'); // list
    $app->group(
        '/view_dashboard_service_count',
        function (RouteCollectorProxy $group) {
            $group->any('/list', ViewDashboardServiceCountController::class . ':list')->add(PermissionMiddleware::class)->setName('view_dashboard_service_count/list-view_dashboard_service_count-list-2'); // list
        }
    );

    // view_dashboard_service_details
    $app->any('/ViewDashboardServiceDetailsList', ViewDashboardServiceDetailsController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewDashboardServiceDetailsList-view_dashboard_service_details-list'); // list
    $app->group(
        '/view_dashboard_service_details',
        function (RouteCollectorProxy $group) {
            $group->any('/list', ViewDashboardServiceDetailsController::class . ':list')->add(PermissionMiddleware::class)->setName('view_dashboard_service_details/list-view_dashboard_service_details-list-2'); // list
        }
    );

    // view_dashboard_service_drwise_summary
    $app->any('/ViewDashboardServiceDrwiseSummaryList', ViewDashboardServiceDrwiseSummaryController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewDashboardServiceDrwiseSummaryList-view_dashboard_service_drwise_summary-list'); // list
    $app->group(
        '/view_dashboard_service_drwise_summary',
        function (RouteCollectorProxy $group) {
            $group->any('/list', ViewDashboardServiceDrwiseSummaryController::class . ':list')->add(PermissionMiddleware::class)->setName('view_dashboard_service_drwise_summary/list-view_dashboard_service_drwise_summary-list-2'); // list
        }
    );

    // view_dashboard_service_servicetype
    $app->any('/ViewDashboardServiceServicetypeList', ViewDashboardServiceServicetypeController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewDashboardServiceServicetypeList-view_dashboard_service_servicetype-list'); // list
    $app->group(
        '/view_dashboard_service_servicetype',
        function (RouteCollectorProxy $group) {
            $group->any('/list', ViewDashboardServiceServicetypeController::class . ':list')->add(PermissionMiddleware::class)->setName('view_dashboard_service_servicetype/list-view_dashboard_service_servicetype-list-2'); // list
        }
    );

    // view_dashboard_service_summary
    $app->any('/ViewDashboardServiceSummaryList', ViewDashboardServiceSummaryController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewDashboardServiceSummaryList-view_dashboard_service_summary-list'); // list
    $app->group(
        '/view_dashboard_service_summary',
        function (RouteCollectorProxy $group) {
            $group->any('/list', ViewDashboardServiceSummaryController::class . ':list')->add(PermissionMiddleware::class)->setName('view_dashboard_service_summary/list-view_dashboard_service_summary-list-2'); // list
        }
    );

    // view_dashboard_summary_details
    $app->any('/ViewDashboardSummaryDetailsList', ViewDashboardSummaryDetailsController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewDashboardSummaryDetailsList-view_dashboard_summary_details-list'); // list
    $app->group(
        '/view_dashboard_summary_details',
        function (RouteCollectorProxy $group) {
            $group->any('/list', ViewDashboardSummaryDetailsController::class . ':list')->add(PermissionMiddleware::class)->setName('view_dashboard_summary_details/list-view_dashboard_summary_details-list-2'); // list
        }
    );

    // view_dashboard_summary_modeofpayment_details
    $app->any('/ViewDashboardSummaryModeofpaymentDetailsList', ViewDashboardSummaryModeofpaymentDetailsController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewDashboardSummaryModeofpaymentDetailsList-view_dashboard_summary_modeofpayment_details-list'); // list
    $app->group(
        '/view_dashboard_summary_modeofpayment_details',
        function (RouteCollectorProxy $group) {
            $group->any('/list', ViewDashboardSummaryModeofpaymentDetailsController::class . ':list')->add(PermissionMiddleware::class)->setName('view_dashboard_summary_modeofpayment_details/list-view_dashboard_summary_modeofpayment_details-list-2'); // list
        }
    );

    // view_dashboard_summary_payment_mode
    $app->any('/ViewDashboardSummaryPaymentModeList', ViewDashboardSummaryPaymentModeController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewDashboardSummaryPaymentModeList-view_dashboard_summary_payment_mode-list'); // list
    $app->group(
        '/view_dashboard_summary_payment_mode',
        function (RouteCollectorProxy $group) {
            $group->any('/list', ViewDashboardSummaryPaymentModeController::class . ':list')->add(PermissionMiddleware::class)->setName('view_dashboard_summary_payment_mode/list-view_dashboard_summary_payment_mode-list-2'); // list
        }
    );

    // view_delivery_registered
    $app->any('/ViewDeliveryRegisteredList[/{PatientID}]', ViewDeliveryRegisteredController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewDeliveryRegisteredList-view_delivery_registered-list'); // list
    $app->group(
        '/view_delivery_registered',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{PatientID}]', ViewDeliveryRegisteredController::class . ':list')->add(PermissionMiddleware::class)->setName('view_delivery_registered/list-view_delivery_registered-list-2'); // list
        }
    );

    // view_doctor_notes
    $app->any('/ViewDoctorNotesList', ViewDoctorNotesController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewDoctorNotesList-view_doctor_notes-list'); // list
    $app->group(
        '/view_doctor_notes',
        function (RouteCollectorProxy $group) {
            $group->any('/list', ViewDoctorNotesController::class . ':list')->add(PermissionMiddleware::class)->setName('view_doctor_notes/list-view_doctor_notes-list-2'); // list
        }
    );

    // view_donor_ivf
    $app->any('/ViewDonorIvfList[/{id}]', ViewDonorIvfController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewDonorIvfList-view_donor_ivf-list'); // list
    $app->group(
        '/view_donor_ivf',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', ViewDonorIvfController::class . ':list')->add(PermissionMiddleware::class)->setName('view_donor_ivf/list-view_donor_ivf-list-2'); // list
        }
    );

    // view_donor_semen_stock
    $app->any('/ViewDonorSemenStockList', ViewDonorSemenStockController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewDonorSemenStockList-view_donor_semen_stock-list'); // list
    $app->group(
        '/view_donor_semen_stock',
        function (RouteCollectorProxy $group) {
            $group->any('/list', ViewDonorSemenStockController::class . ':list')->add(PermissionMiddleware::class)->setName('view_donor_semen_stock/list-view_donor_semen_stock-list-2'); // list
        }
    );

    // view_duplicate_patientid
    $app->any('/ViewDuplicatePatientidList', ViewDuplicatePatientidController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewDuplicatePatientidList-view_duplicate_patientid-list'); // list
    $app->group(
        '/view_duplicate_patientid',
        function (RouteCollectorProxy $group) {
            $group->any('/list', ViewDuplicatePatientidController::class . ':list')->add(PermissionMiddleware::class)->setName('view_duplicate_patientid/list-view_duplicate_patientid-list-2'); // list
        }
    );

    // view_et
    $app->any('/ViewEtList[/{id}]', ViewEtController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewEtList-view_et-list'); // list
    $app->group(
        '/view_et',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', ViewEtController::class . ':list')->add(PermissionMiddleware::class)->setName('view_et/list-view_et-list-2'); // list
        }
    );

    // view_find_diff_bills
    $app->any('/ViewFindDiffBillsList', ViewFindDiffBillsController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewFindDiffBillsList-view_find_diff_bills-list'); // list
    $app->group(
        '/view_find_diff_bills',
        function (RouteCollectorProxy $group) {
            $group->any('/list', ViewFindDiffBillsController::class . ':list')->add(PermissionMiddleware::class)->setName('view_find_diff_bills/list-view_find_diff_bills-list-2'); // list
        }
    );

    // view_follow_up
    $app->any('/ViewFollowUpList[/{id}]', ViewFollowUpController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewFollowUpList-view_follow_up-list'); // list
    $app->group(
        '/view_follow_up',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', ViewFollowUpController::class . ':list')->add(PermissionMiddleware::class)->setName('view_follow_up/list-view_follow_up-list-2'); // list
        }
    );

    // view_follow_up_tracking
    $app->any('/ViewFollowUpTrackingList', ViewFollowUpTrackingController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewFollowUpTrackingList-view_follow_up_tracking-list'); // list
    $app->group(
        '/view_follow_up_tracking',
        function (RouteCollectorProxy $group) {
            $group->any('/list', ViewFollowUpTrackingController::class . ':list')->add(PermissionMiddleware::class)->setName('view_follow_up_tracking/list-view_follow_up_tracking-list-2'); // list
        }
    );

    // view_followups
    $app->any('/ViewFollowupsList[/{id}/{PatientID}]', ViewFollowupsController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewFollowupsList-view_followups-list'); // list
    $app->group(
        '/view_followups',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}/{PatientID}]', ViewFollowupsController::class . ':list')->add(PermissionMiddleware::class)->setName('view_followups/list-view_followups-list-2'); // list
        }
    );

    // view_gst_output
    $app->any('/ViewGstOutputList', ViewGstOutputController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewGstOutputList-view_gst_output-list'); // list
    $app->group(
        '/view_gst_output',
        function (RouteCollectorProxy $group) {
            $group->any('/list', ViewGstOutputController::class . ':list')->add(PermissionMiddleware::class)->setName('view_gst_output/list-view_gst_output-list-2'); // list
        }
    );

    // view_icsi_advised
    $app->any('/ViewIcsiAdvisedList[/{PatientID}]', ViewIcsiAdvisedController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewIcsiAdvisedList-view_icsi_advised-list'); // list
    $app->group(
        '/view_icsi_advised',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{PatientID}]', ViewIcsiAdvisedController::class . ':list')->add(PermissionMiddleware::class)->setName('view_icsi_advised/list-view_icsi_advised-list-2'); // list
        }
    );

    // view_ip_admission
    $app->any('/ViewIpAdmissionList[/{id}]', ViewIpAdmissionController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewIpAdmissionList-view_ip_admission-list'); // list
    $app->group(
        '/view_ip_admission',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', ViewIpAdmissionController::class . ':list')->add(PermissionMiddleware::class)->setName('view_ip_admission/list-view_ip_admission-list-2'); // list
        }
    );

    // view_ip_admission_bill_summary
    $app->any('/ViewIpAdmissionBillSummaryList[/{id}]', ViewIpAdmissionBillSummaryController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewIpAdmissionBillSummaryList-view_ip_admission_bill_summary-list'); // list
    $app->group(
        '/view_ip_admission_bill_summary',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', ViewIpAdmissionBillSummaryController::class . ':list')->add(PermissionMiddleware::class)->setName('view_ip_admission_bill_summary/list-view_ip_admission_bill_summary-list-2'); // list
        }
    );

    // view_ip_admission_issue
    $app->any('/ViewIpAdmissionIssueList[/{id}]', ViewIpAdmissionIssueController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewIpAdmissionIssueList-view_ip_admission_issue-list'); // list
    $app->group(
        '/view_ip_admission_issue',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', ViewIpAdmissionIssueController::class . ':list')->add(PermissionMiddleware::class)->setName('view_ip_admission_issue/list-view_ip_admission_issue-list-2'); // list
        }
    );

    // view_ip_admission_prescription
    $app->any('/ViewIpAdmissionPrescriptionList[/{id}]', ViewIpAdmissionPrescriptionController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewIpAdmissionPrescriptionList-view_ip_admission_prescription-list'); // list
    $app->group(
        '/view_ip_admission_prescription',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', ViewIpAdmissionPrescriptionController::class . ':list')->add(PermissionMiddleware::class)->setName('view_ip_admission_prescription/list-view_ip_admission_prescription-list-2'); // list
        }
    );

    // view_ip_admission_services
    $app->any('/ViewIpAdmissionServicesList[/{id}]', ViewIpAdmissionServicesController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewIpAdmissionServicesList-view_ip_admission_services-list'); // list
    $app->group(
        '/view_ip_admission_services',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', ViewIpAdmissionServicesController::class . ':list')->add(PermissionMiddleware::class)->setName('view_ip_admission_services/list-view_ip_admission_services-list-2'); // list
        }
    );

    // view_ip_advance
    $app->any('/ViewIpAdvanceList[/{id}]', ViewIpAdvanceController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewIpAdvanceList-view_ip_advance-list'); // list
    $app->group(
        '/view_ip_advance',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', ViewIpAdvanceController::class . ':list')->add(PermissionMiddleware::class)->setName('view_ip_advance/list-view_ip_advance-list-2'); // list
        }
    );

    // view_ip_billing
    $app->any('/ViewIpBillingList[/{id}]', ViewIpBillingController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewIpBillingList-view_ip_billing-list'); // list
    $app->group(
        '/view_ip_billing',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', ViewIpBillingController::class . ':list')->add(PermissionMiddleware::class)->setName('view_ip_billing/list-view_ip_billing-list-2'); // list
        }
    );

    // view_ip_patient_admission
    $app->any('/ViewIpPatientAdmissionList[/{id}]', ViewIpPatientAdmissionController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewIpPatientAdmissionList-view_ip_patient_admission-list'); // list
    $app->group(
        '/view_ip_patient_admission',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', ViewIpPatientAdmissionController::class . ':list')->add(PermissionMiddleware::class)->setName('view_ip_patient_admission/list-view_ip_patient_admission-list-2'); // list
        }
    );

    // view_issuing_semen
    $app->any('/ViewIssuingSemenList[/{id}]', ViewIssuingSemenController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewIssuingSemenList-view_issuing_semen-list'); // list
    $app->group(
        '/view_issuing_semen',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', ViewIssuingSemenController::class . ':list')->add(PermissionMiddleware::class)->setName('view_issuing_semen/list-view_issuing_semen-list-2'); // list
        }
    );

    // view_item_received
    $app->any('/ViewItemReceivedList[/{id}]', ViewItemReceivedController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewItemReceivedList-view_item_received-list'); // list
    $app->group(
        '/view_item_received',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', ViewItemReceivedController::class . ':list')->add(PermissionMiddleware::class)->setName('view_item_received/list-view_item_received-list-2'); // list
        }
    );

    // view_iui_excel
    $app->any('/ViewIuiExcelList[/{CoupleID}]', ViewIuiExcelController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewIuiExcelList-view_iui_excel-list'); // list
    $app->group(
        '/view_iui_excel',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{CoupleID}]', ViewIuiExcelController::class . ':list')->add(PermissionMiddleware::class)->setName('view_iui_excel/list-view_iui_excel-list-2'); // list
        }
    );

    // view_ivf_treatment
    $app->any('/ViewIvfTreatmentList[/{id}/{id1}]', ViewIvfTreatmentController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewIvfTreatmentList-view_ivf_treatment-list'); // list
    $app->group(
        '/view_ivf_treatment',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}/{id1}]', ViewIvfTreatmentController::class . ':list')->add(PermissionMiddleware::class)->setName('view_ivf_treatment/list-view_ivf_treatment-list-2'); // list
        }
    );

    // view_ivf_treatment_plan
    $app->any('/ViewIvfTreatmentPlanList[/{id}]', ViewIvfTreatmentPlanController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewIvfTreatmentPlanList-view_ivf_treatment_plan-list'); // list
    $app->group(
        '/view_ivf_treatment_plan',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', ViewIvfTreatmentPlanController::class . ':list')->add(PermissionMiddleware::class)->setName('view_ivf_treatment_plan/list-view_ivf_treatment_plan-list-2'); // list
        }
    );

    // view_lab_print
    $app->any('/ViewLabPrintList[/{id}]', ViewLabPrintController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewLabPrintList-view_lab_print-list'); // list
    $app->group(
        '/view_lab_print',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', ViewLabPrintController::class . ':list')->add(PermissionMiddleware::class)->setName('view_lab_print/list-view_lab_print-list-2'); // list
        }
    );

    // view_lab_profile
    $app->any('/ViewLabProfileList[/{Id}]', ViewLabProfileController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewLabProfileList-view_lab_profile-list'); // list
    $app->group(
        '/view_lab_profile',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{Id}]', ViewLabProfileController::class . ':list')->add(PermissionMiddleware::class)->setName('view_lab_profile/list-view_lab_profile-list-2'); // list
        }
    );

    // view_lab_resultreleased
    $app->any('/ViewLabResultreleasedList[/{id}]', ViewLabResultreleasedController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewLabResultreleasedList-view_lab_resultreleased-list'); // list
    $app->group(
        '/view_lab_resultreleased',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', ViewLabResultreleasedController::class . ':list')->add(PermissionMiddleware::class)->setName('view_lab_resultreleased/list-view_lab_resultreleased-list-2'); // list
        }
    );

    // view_lab_resultreleased_auth
    $app->any('/ViewLabResultreleasedAuthList[/{id}]', ViewLabResultreleasedAuthController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewLabResultreleasedAuthList-view_lab_resultreleased_auth-list'); // list
    $app->group(
        '/view_lab_resultreleased_auth',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', ViewLabResultreleasedAuthController::class . ':list')->add(PermissionMiddleware::class)->setName('view_lab_resultreleased_auth/list-view_lab_resultreleased_auth-list-2'); // list
        }
    );

    // view_lab_resultreleasedd
    $app->any('/ViewLabResultreleaseddList[/{id}]', ViewLabResultreleaseddController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewLabResultreleaseddList-view_lab_resultreleasedd-list'); // list
    $app->group(
        '/view_lab_resultreleasedd',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', ViewLabResultreleaseddController::class . ':list')->add(PermissionMiddleware::class)->setName('view_lab_resultreleasedd/list-view_lab_resultreleasedd-list-2'); // list
        }
    );

    // view_lab_service
    $app->any('/ViewLabServiceList[/{Id}]', ViewLabServiceController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewLabServiceList-view_lab_service-list'); // list
    $app->group(
        '/view_lab_service',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{Id}]', ViewLabServiceController::class . ':list')->add(PermissionMiddleware::class)->setName('view_lab_service/list-view_lab_service-list-2'); // list
        }
    );

    // view_lab_service_sub
    $app->any('/ViewLabServiceSubList[/{Id}]', ViewLabServiceSubController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewLabServiceSubList-view_lab_service_sub-list'); // list
    $app->group(
        '/view_lab_service_sub',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{Id}]', ViewLabServiceSubController::class . ':list')->add(PermissionMiddleware::class)->setName('view_lab_service_sub/list-view_lab_service_sub-list-2'); // list
        }
    );

    // view_lab_services
    $app->any('/ViewLabServicesList[/{id}]', ViewLabServicesController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewLabServicesList-view_lab_services-list'); // list
    $app->group(
        '/view_lab_services',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', ViewLabServicesController::class . ':list')->add(PermissionMiddleware::class)->setName('view_lab_services/list-view_lab_services-list-2'); // list
        }
    );

    // view_lab_services_auth
    $app->any('/ViewLabServicesAuthList[/{id}]', ViewLabServicesAuthController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewLabServicesAuthList-view_lab_services_auth-list'); // list
    $app->group(
        '/view_lab_services_auth',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', ViewLabServicesAuthController::class . ':list')->add(PermissionMiddleware::class)->setName('view_lab_services_auth/list-view_lab_services_auth-list-2'); // list
        }
    );

    // view_lab_servicess
    $app->any('/ViewLabServicessList[/{id}]', ViewLabServicessController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewLabServicessList-view_lab_servicess-list'); // list
    $app->group(
        '/view_lab_servicess',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', ViewLabServicessController::class . ':list')->add(PermissionMiddleware::class)->setName('view_lab_servicess/list-view_lab_servicess-list-2'); // list
        }
    );

    // view_labreport_print
    $app->any('/ViewLabreportPrintList[/{id}]', ViewLabreportPrintController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewLabreportPrintList-view_labreport_print-list'); // list
    $app->group(
        '/view_labreport_print',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', ViewLabreportPrintController::class . ':list')->add(PermissionMiddleware::class)->setName('view_labreport_print/list-view_labreport_print-list-2'); // list
        }
    );

    // view_next_review_date
    $app->any('/ViewNextReviewDateList', ViewNextReviewDateController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewNextReviewDateList-view_next_review_date-list'); // list
    $app->group(
        '/view_next_review_date',
        function (RouteCollectorProxy $group) {
            $group->any('/list', ViewNextReviewDateController::class . ':list')->add(PermissionMiddleware::class)->setName('view_next_review_date/list-view_next_review_date-list-2'); // list
        }
    );

    // view_ongoing_treatment
    $app->any('/ViewOngoingTreatmentList[/{bid}/{bPatientID}/{id}]', ViewOngoingTreatmentController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewOngoingTreatmentList-view_ongoing_treatment-list'); // list
    $app->group(
        '/view_ongoing_treatment',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{bid}/{bPatientID}/{id}]', ViewOngoingTreatmentController::class . ':list')->add(PermissionMiddleware::class)->setName('view_ongoing_treatment/list-view_ongoing_treatment-list-2'); // list
        }
    );

    // view_opd_follow_up
    $app->any('/ViewOpdFollowUpList[/{id}]', ViewOpdFollowUpController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewOpdFollowUpList-view_opd_follow_up-list'); // list
    $app->group(
        '/view_opd_follow_up',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', ViewOpdFollowUpController::class . ':list')->add(PermissionMiddleware::class)->setName('view_opd_follow_up/list-view_opd_follow_up-list-2'); // list
        }
    );

    // view_partner_semenstock
    $app->any('/ViewPartnerSemenstockList', ViewPartnerSemenstockController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewPartnerSemenstockList-view_partner_semenstock-list'); // list
    $app->group(
        '/view_partner_semenstock',
        function (RouteCollectorProxy $group) {
            $group->any('/list', ViewPartnerSemenstockController::class . ':list')->add(PermissionMiddleware::class)->setName('view_partner_semenstock/list-view_partner_semenstock-list-2'); // list
        }
    );

    // view_patient_billing
    $app->any('/ViewPatientBillingList[/{id}]', ViewPatientBillingController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewPatientBillingList-view_patient_billing-list'); // list
    $app->group(
        '/view_patient_billing',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', ViewPatientBillingController::class . ':list')->add(PermissionMiddleware::class)->setName('view_patient_billing/list-view_patient_billing-list-2'); // list
        }
    );

    // view_patient_clinical_summary
    $app->any('/ViewPatientClinicalSummaryList', ViewPatientClinicalSummaryController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewPatientClinicalSummaryList-view_patient_clinical_summary-list'); // list
    $app->group(
        '/view_patient_clinical_summary',
        function (RouteCollectorProxy $group) {
            $group->any('/list', ViewPatientClinicalSummaryController::class . ':list')->add(PermissionMiddleware::class)->setName('view_patient_clinical_summary/list-view_patient_clinical_summary-list-2'); // list
        }
    );

    // view_patient_discharge_summary
    $app->any('/ViewPatientDischargeSummaryList', ViewPatientDischargeSummaryController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewPatientDischargeSummaryList-view_patient_discharge_summary-list'); // list
    $app->group(
        '/view_patient_discharge_summary',
        function (RouteCollectorProxy $group) {
            $group->any('/list', ViewPatientDischargeSummaryController::class . ':list')->add(PermissionMiddleware::class)->setName('view_patient_discharge_summary/list-view_patient_discharge_summary-list-2'); // list
        }
    );

    // view_patient_discharge_summary_group
    $app->any('/ViewPatientDischargeSummaryGroupList', ViewPatientDischargeSummaryGroupController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewPatientDischargeSummaryGroupList-view_patient_discharge_summary_group-list'); // list
    $app->group(
        '/view_patient_discharge_summary_group',
        function (RouteCollectorProxy $group) {
            $group->any('/list', ViewPatientDischargeSummaryGroupController::class . ':list')->add(PermissionMiddleware::class)->setName('view_patient_discharge_summary_group/list-view_patient_discharge_summary_group-list-2'); // list
        }
    );

    // view_patient_history
    $app->any('/ViewPatientHistoryList[/{id}]', ViewPatientHistoryController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewPatientHistoryList-view_patient_history-list'); // list
    $app->group(
        '/view_patient_history',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', ViewPatientHistoryController::class . ':list')->add(PermissionMiddleware::class)->setName('view_patient_history/list-view_patient_history-list-2'); // list
        }
    );

    // view_patient_services
    $app->any('/ViewPatientServicesList[/{id}]', ViewPatientServicesController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewPatientServicesList-view_patient_services-list'); // list
    $app->group(
        '/view_patient_services',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', ViewPatientServicesController::class . ':list')->add(PermissionMiddleware::class)->setName('view_patient_services/list-view_patient_services-list-2'); // list
        }
    );

    // view_patient_services_dashboard
    $app->any('/ViewPatientServicesDashboardList[/{id}]', ViewPatientServicesDashboardController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewPatientServicesDashboardList-view_patient_services_dashboard-list'); // list
    $app->group(
        '/view_patient_services_dashboard',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', ViewPatientServicesDashboardController::class . ':list')->add(PermissionMiddleware::class)->setName('view_patient_services_dashboard/list-view_patient_services_dashboard-list-2'); // list
        }
    );

    // view_patient_vitals
    $app->any('/ViewPatientVitalsList[/{id}]', ViewPatientVitalsController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewPatientVitalsList-view_patient_vitals-list'); // list
    $app->group(
        '/view_patient_vitals',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', ViewPatientVitalsController::class . ':list')->add(PermissionMiddleware::class)->setName('view_patient_vitals/list-view_patient_vitals-list-2'); // list
        }
    );

    // view_pharmacy_consumption
    $app->any('/ViewPharmacyConsumptionList[/{id}]', ViewPharmacyConsumptionController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewPharmacyConsumptionList-view_pharmacy_consumption-list'); // list
    $app->group(
        '/view_pharmacy_consumption',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', ViewPharmacyConsumptionController::class . ':list')->add(PermissionMiddleware::class)->setName('view_pharmacy_consumption/list-view_pharmacy_consumption-list-2'); // list
        }
    );

    // view_pharmacy_movement
    $app->any('/ViewPharmacyMovementList', ViewPharmacyMovementController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewPharmacyMovementList-view_pharmacy_movement-list'); // list
    $app->group(
        '/view_pharmacy_movement',
        function (RouteCollectorProxy $group) {
            $group->any('/list', ViewPharmacyMovementController::class . ':list')->add(PermissionMiddleware::class)->setName('view_pharmacy_movement/list-view_pharmacy_movement-list-2'); // list
        }
    );

    // view_pharmacy_movement_item
    $app->any('/ViewPharmacyMovementItemList', ViewPharmacyMovementItemController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewPharmacyMovementItemList-view_pharmacy_movement_item-list'); // list
    $app->group(
        '/view_pharmacy_movement_item',
        function (RouteCollectorProxy $group) {
            $group->any('/list', ViewPharmacyMovementItemController::class . ':list')->add(PermissionMiddleware::class)->setName('view_pharmacy_movement_item/list-view_pharmacy_movement_item-list-2'); // list
        }
    );

    // view_pharmacy_pharled_return
    $app->any('/ViewPharmacyPharledReturnList[/{id}]', ViewPharmacyPharledReturnController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewPharmacyPharledReturnList-view_pharmacy_pharled_return-list'); // list
    $app->group(
        '/view_pharmacy_pharled_return',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', ViewPharmacyPharledReturnController::class . ':list')->add(PermissionMiddleware::class)->setName('view_pharmacy_pharled_return/list-view_pharmacy_pharled_return-list-2'); // list
        }
    );

    // view_pharmacy_purchase_request_approved
    $app->any('/ViewPharmacyPurchaseRequestApprovedList[/{id}]', ViewPharmacyPurchaseRequestApprovedController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewPharmacyPurchaseRequestApprovedList-view_pharmacy_purchase_request_approved-list'); // list
    $app->group(
        '/view_pharmacy_purchase_request_approved',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', ViewPharmacyPurchaseRequestApprovedController::class . ':list')->add(PermissionMiddleware::class)->setName('view_pharmacy_purchase_request_approved/list-view_pharmacy_purchase_request_approved-list-2'); // list
        }
    );

    // view_pharmacy_purchase_request_items_approved
    $app->any('/ViewPharmacyPurchaseRequestItemsApprovedList[/{id}]', ViewPharmacyPurchaseRequestItemsApprovedController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewPharmacyPurchaseRequestItemsApprovedList-view_pharmacy_purchase_request_items_approved-list'); // list
    $app->group(
        '/view_pharmacy_purchase_request_items_approved',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', ViewPharmacyPurchaseRequestItemsApprovedController::class . ':list')->add(PermissionMiddleware::class)->setName('view_pharmacy_purchase_request_items_approved/list-view_pharmacy_purchase_request_items_approved-list-2'); // list
        }
    );

    // view_pharmacy_purchase_request_items_purchased
    $app->any('/ViewPharmacyPurchaseRequestItemsPurchasedList[/{id}]', ViewPharmacyPurchaseRequestItemsPurchasedController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewPharmacyPurchaseRequestItemsPurchasedList-view_pharmacy_purchase_request_items_purchased-list'); // list
    $app->group(
        '/view_pharmacy_purchase_request_items_purchased',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', ViewPharmacyPurchaseRequestItemsPurchasedController::class . ':list')->add(PermissionMiddleware::class)->setName('view_pharmacy_purchase_request_items_purchased/list-view_pharmacy_purchase_request_items_purchased-list-2'); // list
        }
    );

    // view_pharmacy_purchase_request_purchased
    $app->any('/ViewPharmacyPurchaseRequestPurchasedList[/{id}]', ViewPharmacyPurchaseRequestPurchasedController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewPharmacyPurchaseRequestPurchasedList-view_pharmacy_purchase_request_purchased-list'); // list
    $app->group(
        '/view_pharmacy_purchase_request_purchased',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', ViewPharmacyPurchaseRequestPurchasedController::class . ':list')->add(PermissionMiddleware::class)->setName('view_pharmacy_purchase_request_purchased/list-view_pharmacy_purchase_request_purchased-list-2'); // list
        }
    );

    // view_pharmacy_sales
    $app->any('/ViewPharmacySalesList', ViewPharmacySalesController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewPharmacySalesList-view_pharmacy_sales-list'); // list
    $app->group(
        '/view_pharmacy_sales',
        function (RouteCollectorProxy $group) {
            $group->any('/list', ViewPharmacySalesController::class . ':list')->add(PermissionMiddleware::class)->setName('view_pharmacy_sales/list-view_pharmacy_sales-list-2'); // list
        }
    );

    // view_pharmacy_search_product
    $app->any('/ViewPharmacySearchProductList[/{id}]', ViewPharmacySearchProductController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewPharmacySearchProductList-view_pharmacy_search_product-list'); // list
    $app->group(
        '/view_pharmacy_search_product',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', ViewPharmacySearchProductController::class . ':list')->add(PermissionMiddleware::class)->setName('view_pharmacy_search_product/list-view_pharmacy_search_product-list-2'); // list
        }
    );

    // view_pharmacy_search_product_new
    $app->any('/ViewPharmacySearchProductNewList[/{id}]', ViewPharmacySearchProductNewController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewPharmacySearchProductNewList-view_pharmacy_search_product_new-list'); // list
    $app->group(
        '/view_pharmacy_search_product_new',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', ViewPharmacySearchProductNewController::class . ':list')->add(PermissionMiddleware::class)->setName('view_pharmacy_search_product_new/list-view_pharmacy_search_product_new-list-2'); // list
        }
    );

    // view_pharmacygrn
    $app->any('/ViewPharmacygrnList[/{id}]', ViewPharmacygrnController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewPharmacygrnList-view_pharmacygrn-list'); // list
    $app->group(
        '/view_pharmacygrn',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', ViewPharmacygrnController::class . ':list')->add(PermissionMiddleware::class)->setName('view_pharmacygrn/list-view_pharmacygrn-list-2'); // list
        }
    );

    // view_pharmacytransfer
    $app->any('/ViewPharmacytransferList[/{id}]', ViewPharmacytransferController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewPharmacytransferList-view_pharmacytransfer-list'); // list
    $app->group(
        '/view_pharmacytransfer',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', ViewPharmacytransferController::class . ':list')->add(PermissionMiddleware::class)->setName('view_pharmacytransfer/list-view_pharmacytransfer-list-2'); // list
        }
    );

    // view_procedure_registered
    $app->any('/ViewProcedureRegisteredList[/{PatientID}]', ViewProcedureRegisteredController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewProcedureRegisteredList-view_procedure_registered-list'); // list
    $app->group(
        '/view_procedure_registered',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{PatientID}]', ViewProcedureRegisteredController::class . ':list')->add(PermissionMiddleware::class)->setName('view_procedure_registered/list-view_procedure_registered-list-2'); // list
        }
    );

    // view_semenanalysis
    $app->any('/ViewSemenanalysisList[/{id}]', ViewSemenanalysisController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewSemenanalysisList-view_semenanalysis-list'); // list
    $app->group(
        '/view_semenanalysis',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', ViewSemenanalysisController::class . ':list')->add(PermissionMiddleware::class)->setName('view_semenanalysis/list-view_semenanalysis-list-2'); // list
        }
    );

    // view_till_search
    $app->any('/ViewTillSearchList', ViewTillSearchController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewTillSearchList-view_till_search-list'); // list
    $app->group(
        '/view_till_search',
        function (RouteCollectorProxy $group) {
            $group->any('/list', ViewTillSearchController::class . ':list')->add(PermissionMiddleware::class)->setName('view_till_search/list-view_till_search-list-2'); // list
        }
    );

    // view_till_search_view
    $app->any('/ViewTillSearchViewList[/{id}]', ViewTillSearchViewController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewTillSearchViewList-view_till_search_view-list'); // list
    $app->group(
        '/view_till_search_view',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}]', ViewTillSearchViewController::class . ':list')->add(PermissionMiddleware::class)->setName('view_till_search_view/list-view_till_search_view-list-2'); // list
        }
    );

    // view_treatmend_status
    $app->any('/ViewTreatmendStatusList[/{id}/{PatientID}]', ViewTreatmendStatusController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewTreatmendStatusList-view_treatmend_status-list'); // list
    $app->group(
        '/view_treatmend_status',
        function (RouteCollectorProxy $group) {
            $group->any('/list[/{id}/{PatientID}]', ViewTreatmendStatusController::class . ':list')->add(PermissionMiddleware::class)->setName('view_treatmend_status/list-view_treatmend_status-list-2'); // list
        }
    );

    // view_treatment_culture
    $app->any('/ViewTreatmentCultureList', ViewTreatmentCultureController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewTreatmentCultureList-view_treatment_culture-list'); // list
    $app->group(
        '/view_treatment_culture',
        function (RouteCollectorProxy $group) {
            $group->any('/list', ViewTreatmentCultureController::class . ':list')->add(PermissionMiddleware::class)->setName('view_treatment_culture/list-view_treatment_culture-list-2'); // list
        }
    );

    // error
    $app->any('/error', OthersController::class . ':error')->add(PermissionMiddleware::class)->setName('error');

    // Index
    $app->any('/[index]', OthersController::class . ':index')->setName('index');
    if (function_exists(PROJECT_NAMESPACE . "Route_Action")) {
        Route_Action($app);
    }

    /**
     * Catch-all route to serve a 404 Not Found page if none of the routes match
     * NOTE: Make sure this route is defined last.
     */
    $app->map(
        ['GET', 'POST', 'PUT', 'DELETE', 'PATCH'],
        '/{routes:.+}',
        function ($request, $response, $params) {
            $error = [
                "statusCode" => "404",
                "error" => [
                    "class" => "text-warning",
                    "type" => Container("language")->phrase("Error"),
                    "description" => str_replace("%p", $params["routes"], Container("language")->phrase("PageNotFound")),
                ],
            ];
            Container("flash")->addMessage("error", $error);
            return $response->withStatus(302)->withHeader("Location", GetUrl("error")); // Redirect to error page
        }
    );
};
