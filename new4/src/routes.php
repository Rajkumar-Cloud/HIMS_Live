<?php

namespace PHPMaker2021\HIMS;

use Slim\App;
use Slim\Routing\RouteCollectorProxy;

// Handle Routes
return function (App $app) {
    // employee
    $app->any('/EmployeeList[/{id}]', EmployeeController::class . ':list')->add(PermissionMiddleware::class)->setName('EmployeeList-employee-list'); // list
    $app->any('/EmployeeAdd[/{id}]', EmployeeController::class . ':add')->add(PermissionMiddleware::class)->setName('EmployeeAdd-employee-add'); // add
    $app->any('/EmployeeView[/{id}]', EmployeeController::class . ':view')->add(PermissionMiddleware::class)->setName('EmployeeView-employee-view'); // view
    $app->any('/EmployeeEdit[/{id}]', EmployeeController::class . ':edit')->add(PermissionMiddleware::class)->setName('EmployeeEdit-employee-edit'); // edit
    $app->any('/EmployeeDelete[/{id}]', EmployeeController::class . ':delete')->add(PermissionMiddleware::class)->setName('EmployeeDelete-employee-delete'); // delete
    $app->group(
        '/employee',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', EmployeeController::class . ':list')->add(PermissionMiddleware::class)->setName('employee/list-employee-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', EmployeeController::class . ':add')->add(PermissionMiddleware::class)->setName('employee/add-employee-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', EmployeeController::class . ':view')->add(PermissionMiddleware::class)->setName('employee/view-employee-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', EmployeeController::class . ':edit')->add(PermissionMiddleware::class)->setName('employee/edit-employee-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', EmployeeController::class . ':delete')->add(PermissionMiddleware::class)->setName('employee/delete-employee-delete-2'); // delete
        }
    );

    // employee_address
    $app->any('/EmployeeAddressList[/{id}]', EmployeeAddressController::class . ':list')->add(PermissionMiddleware::class)->setName('EmployeeAddressList-employee_address-list'); // list
    $app->any('/EmployeeAddressAdd[/{id}]', EmployeeAddressController::class . ':add')->add(PermissionMiddleware::class)->setName('EmployeeAddressAdd-employee_address-add'); // add
    $app->any('/EmployeeAddressView[/{id}]', EmployeeAddressController::class . ':view')->add(PermissionMiddleware::class)->setName('EmployeeAddressView-employee_address-view'); // view
    $app->any('/EmployeeAddressEdit[/{id}]', EmployeeAddressController::class . ':edit')->add(PermissionMiddleware::class)->setName('EmployeeAddressEdit-employee_address-edit'); // edit
    $app->any('/EmployeeAddressDelete[/{id}]', EmployeeAddressController::class . ':delete')->add(PermissionMiddleware::class)->setName('EmployeeAddressDelete-employee_address-delete'); // delete
    $app->any('/EmployeeAddressPreview', EmployeeAddressController::class . ':preview')->add(PermissionMiddleware::class)->setName('EmployeeAddressPreview-employee_address-preview'); // preview
    $app->group(
        '/employee_address',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', EmployeeAddressController::class . ':list')->add(PermissionMiddleware::class)->setName('employee_address/list-employee_address-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', EmployeeAddressController::class . ':add')->add(PermissionMiddleware::class)->setName('employee_address/add-employee_address-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', EmployeeAddressController::class . ':view')->add(PermissionMiddleware::class)->setName('employee_address/view-employee_address-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', EmployeeAddressController::class . ':edit')->add(PermissionMiddleware::class)->setName('employee_address/edit-employee_address-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', EmployeeAddressController::class . ':delete')->add(PermissionMiddleware::class)->setName('employee_address/delete-employee_address-delete-2'); // delete
            $group->any('/' . Config("PREVIEW_ACTION") . '', EmployeeAddressController::class . ':preview')->add(PermissionMiddleware::class)->setName('employee_address/preview-employee_address-preview-2'); // preview
        }
    );

    // employee_email
    $app->any('/EmployeeEmailList[/{id}]', EmployeeEmailController::class . ':list')->add(PermissionMiddleware::class)->setName('EmployeeEmailList-employee_email-list'); // list
    $app->any('/EmployeeEmailAdd[/{id}]', EmployeeEmailController::class . ':add')->add(PermissionMiddleware::class)->setName('EmployeeEmailAdd-employee_email-add'); // add
    $app->any('/EmployeeEmailView[/{id}]', EmployeeEmailController::class . ':view')->add(PermissionMiddleware::class)->setName('EmployeeEmailView-employee_email-view'); // view
    $app->any('/EmployeeEmailEdit[/{id}]', EmployeeEmailController::class . ':edit')->add(PermissionMiddleware::class)->setName('EmployeeEmailEdit-employee_email-edit'); // edit
    $app->any('/EmployeeEmailDelete[/{id}]', EmployeeEmailController::class . ':delete')->add(PermissionMiddleware::class)->setName('EmployeeEmailDelete-employee_email-delete'); // delete
    $app->any('/EmployeeEmailPreview', EmployeeEmailController::class . ':preview')->add(PermissionMiddleware::class)->setName('EmployeeEmailPreview-employee_email-preview'); // preview
    $app->group(
        '/employee_email',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', EmployeeEmailController::class . ':list')->add(PermissionMiddleware::class)->setName('employee_email/list-employee_email-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', EmployeeEmailController::class . ':add')->add(PermissionMiddleware::class)->setName('employee_email/add-employee_email-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', EmployeeEmailController::class . ':view')->add(PermissionMiddleware::class)->setName('employee_email/view-employee_email-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', EmployeeEmailController::class . ':edit')->add(PermissionMiddleware::class)->setName('employee_email/edit-employee_email-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', EmployeeEmailController::class . ':delete')->add(PermissionMiddleware::class)->setName('employee_email/delete-employee_email-delete-2'); // delete
            $group->any('/' . Config("PREVIEW_ACTION") . '', EmployeeEmailController::class . ':preview')->add(PermissionMiddleware::class)->setName('employee_email/preview-employee_email-preview-2'); // preview
        }
    );

    // employee_has_degree
    $app->any('/EmployeeHasDegreeList[/{id}]', EmployeeHasDegreeController::class . ':list')->add(PermissionMiddleware::class)->setName('EmployeeHasDegreeList-employee_has_degree-list'); // list
    $app->any('/EmployeeHasDegreeAdd[/{id}]', EmployeeHasDegreeController::class . ':add')->add(PermissionMiddleware::class)->setName('EmployeeHasDegreeAdd-employee_has_degree-add'); // add
    $app->any('/EmployeeHasDegreeView[/{id}]', EmployeeHasDegreeController::class . ':view')->add(PermissionMiddleware::class)->setName('EmployeeHasDegreeView-employee_has_degree-view'); // view
    $app->any('/EmployeeHasDegreeEdit[/{id}]', EmployeeHasDegreeController::class . ':edit')->add(PermissionMiddleware::class)->setName('EmployeeHasDegreeEdit-employee_has_degree-edit'); // edit
    $app->any('/EmployeeHasDegreeDelete[/{id}]', EmployeeHasDegreeController::class . ':delete')->add(PermissionMiddleware::class)->setName('EmployeeHasDegreeDelete-employee_has_degree-delete'); // delete
    $app->any('/EmployeeHasDegreePreview', EmployeeHasDegreeController::class . ':preview')->add(PermissionMiddleware::class)->setName('EmployeeHasDegreePreview-employee_has_degree-preview'); // preview
    $app->group(
        '/employee_has_degree',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', EmployeeHasDegreeController::class . ':list')->add(PermissionMiddleware::class)->setName('employee_has_degree/list-employee_has_degree-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', EmployeeHasDegreeController::class . ':add')->add(PermissionMiddleware::class)->setName('employee_has_degree/add-employee_has_degree-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', EmployeeHasDegreeController::class . ':view')->add(PermissionMiddleware::class)->setName('employee_has_degree/view-employee_has_degree-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', EmployeeHasDegreeController::class . ':edit')->add(PermissionMiddleware::class)->setName('employee_has_degree/edit-employee_has_degree-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', EmployeeHasDegreeController::class . ':delete')->add(PermissionMiddleware::class)->setName('employee_has_degree/delete-employee_has_degree-delete-2'); // delete
            $group->any('/' . Config("PREVIEW_ACTION") . '', EmployeeHasDegreeController::class . ':preview')->add(PermissionMiddleware::class)->setName('employee_has_degree/preview-employee_has_degree-preview-2'); // preview
        }
    );

    // employee_has_experience
    $app->any('/EmployeeHasExperienceList[/{id}]', EmployeeHasExperienceController::class . ':list')->add(PermissionMiddleware::class)->setName('EmployeeHasExperienceList-employee_has_experience-list'); // list
    $app->any('/EmployeeHasExperienceAdd[/{id}]', EmployeeHasExperienceController::class . ':add')->add(PermissionMiddleware::class)->setName('EmployeeHasExperienceAdd-employee_has_experience-add'); // add
    $app->any('/EmployeeHasExperienceView[/{id}]', EmployeeHasExperienceController::class . ':view')->add(PermissionMiddleware::class)->setName('EmployeeHasExperienceView-employee_has_experience-view'); // view
    $app->any('/EmployeeHasExperienceEdit[/{id}]', EmployeeHasExperienceController::class . ':edit')->add(PermissionMiddleware::class)->setName('EmployeeHasExperienceEdit-employee_has_experience-edit'); // edit
    $app->any('/EmployeeHasExperienceDelete[/{id}]', EmployeeHasExperienceController::class . ':delete')->add(PermissionMiddleware::class)->setName('EmployeeHasExperienceDelete-employee_has_experience-delete'); // delete
    $app->any('/EmployeeHasExperiencePreview', EmployeeHasExperienceController::class . ':preview')->add(PermissionMiddleware::class)->setName('EmployeeHasExperiencePreview-employee_has_experience-preview'); // preview
    $app->group(
        '/employee_has_experience',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', EmployeeHasExperienceController::class . ':list')->add(PermissionMiddleware::class)->setName('employee_has_experience/list-employee_has_experience-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', EmployeeHasExperienceController::class . ':add')->add(PermissionMiddleware::class)->setName('employee_has_experience/add-employee_has_experience-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', EmployeeHasExperienceController::class . ':view')->add(PermissionMiddleware::class)->setName('employee_has_experience/view-employee_has_experience-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', EmployeeHasExperienceController::class . ':edit')->add(PermissionMiddleware::class)->setName('employee_has_experience/edit-employee_has_experience-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', EmployeeHasExperienceController::class . ':delete')->add(PermissionMiddleware::class)->setName('employee_has_experience/delete-employee_has_experience-delete-2'); // delete
            $group->any('/' . Config("PREVIEW_ACTION") . '', EmployeeHasExperienceController::class . ':preview')->add(PermissionMiddleware::class)->setName('employee_has_experience/preview-employee_has_experience-preview-2'); // preview
        }
    );

    // employee_telephone
    $app->any('/EmployeeTelephoneList[/{id}]', EmployeeTelephoneController::class . ':list')->add(PermissionMiddleware::class)->setName('EmployeeTelephoneList-employee_telephone-list'); // list
    $app->any('/EmployeeTelephoneAdd[/{id}]', EmployeeTelephoneController::class . ':add')->add(PermissionMiddleware::class)->setName('EmployeeTelephoneAdd-employee_telephone-add'); // add
    $app->any('/EmployeeTelephoneView[/{id}]', EmployeeTelephoneController::class . ':view')->add(PermissionMiddleware::class)->setName('EmployeeTelephoneView-employee_telephone-view'); // view
    $app->any('/EmployeeTelephoneEdit[/{id}]', EmployeeTelephoneController::class . ':edit')->add(PermissionMiddleware::class)->setName('EmployeeTelephoneEdit-employee_telephone-edit'); // edit
    $app->any('/EmployeeTelephoneDelete[/{id}]', EmployeeTelephoneController::class . ':delete')->add(PermissionMiddleware::class)->setName('EmployeeTelephoneDelete-employee_telephone-delete'); // delete
    $app->any('/EmployeeTelephonePreview', EmployeeTelephoneController::class . ':preview')->add(PermissionMiddleware::class)->setName('EmployeeTelephonePreview-employee_telephone-preview'); // preview
    $app->group(
        '/employee_telephone',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', EmployeeTelephoneController::class . ':list')->add(PermissionMiddleware::class)->setName('employee_telephone/list-employee_telephone-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', EmployeeTelephoneController::class . ':add')->add(PermissionMiddleware::class)->setName('employee_telephone/add-employee_telephone-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', EmployeeTelephoneController::class . ':view')->add(PermissionMiddleware::class)->setName('employee_telephone/view-employee_telephone-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', EmployeeTelephoneController::class . ':edit')->add(PermissionMiddleware::class)->setName('employee_telephone/edit-employee_telephone-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', EmployeeTelephoneController::class . ':delete')->add(PermissionMiddleware::class)->setName('employee_telephone/delete-employee_telephone-delete-2'); // delete
            $group->any('/' . Config("PREVIEW_ACTION") . '', EmployeeTelephoneController::class . ':preview')->add(PermissionMiddleware::class)->setName('employee_telephone/preview-employee_telephone-preview-2'); // preview
        }
    );

    // employee_document
    $app->any('/EmployeeDocumentList[/{id}]', EmployeeDocumentController::class . ':list')->add(PermissionMiddleware::class)->setName('EmployeeDocumentList-employee_document-list'); // list
    $app->any('/EmployeeDocumentAdd[/{id}]', EmployeeDocumentController::class . ':add')->add(PermissionMiddleware::class)->setName('EmployeeDocumentAdd-employee_document-add'); // add
    $app->any('/EmployeeDocumentView[/{id}]', EmployeeDocumentController::class . ':view')->add(PermissionMiddleware::class)->setName('EmployeeDocumentView-employee_document-view'); // view
    $app->any('/EmployeeDocumentEdit[/{id}]', EmployeeDocumentController::class . ':edit')->add(PermissionMiddleware::class)->setName('EmployeeDocumentEdit-employee_document-edit'); // edit
    $app->any('/EmployeeDocumentDelete[/{id}]', EmployeeDocumentController::class . ':delete')->add(PermissionMiddleware::class)->setName('EmployeeDocumentDelete-employee_document-delete'); // delete
    $app->any('/EmployeeDocumentPreview', EmployeeDocumentController::class . ':preview')->add(PermissionMiddleware::class)->setName('EmployeeDocumentPreview-employee_document-preview'); // preview
    $app->group(
        '/employee_document',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', EmployeeDocumentController::class . ':list')->add(PermissionMiddleware::class)->setName('employee_document/list-employee_document-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', EmployeeDocumentController::class . ':add')->add(PermissionMiddleware::class)->setName('employee_document/add-employee_document-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', EmployeeDocumentController::class . ':view')->add(PermissionMiddleware::class)->setName('employee_document/view-employee_document-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', EmployeeDocumentController::class . ':edit')->add(PermissionMiddleware::class)->setName('employee_document/edit-employee_document-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', EmployeeDocumentController::class . ':delete')->add(PermissionMiddleware::class)->setName('employee_document/delete-employee_document-delete-2'); // delete
            $group->any('/' . Config("PREVIEW_ACTION") . '', EmployeeDocumentController::class . ':preview')->add(PermissionMiddleware::class)->setName('employee_document/preview-employee_document-preview-2'); // preview
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', HospitalController::class . ':list')->add(PermissionMiddleware::class)->setName('hospital/list-hospital-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', HospitalController::class . ':add')->add(PermissionMiddleware::class)->setName('hospital/add-hospital-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', HospitalController::class . ':view')->add(PermissionMiddleware::class)->setName('hospital/view-hospital-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', HospitalController::class . ':edit')->add(PermissionMiddleware::class)->setName('hospital/edit-hospital-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', HospitalController::class . ':delete')->add(PermissionMiddleware::class)->setName('hospital/delete-hospital-delete-2'); // delete
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', UserLoginController::class . ':list')->add(PermissionMiddleware::class)->setName('user_login/list-user_login-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', UserLoginController::class . ':add')->add(PermissionMiddleware::class)->setName('user_login/add-user_login-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', UserLoginController::class . ':view')->add(PermissionMiddleware::class)->setName('user_login/view-user_login-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', UserLoginController::class . ':edit')->add(PermissionMiddleware::class)->setName('user_login/edit-user_login-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', UserLoginController::class . ':delete')->add(PermissionMiddleware::class)->setName('user_login/delete-user_login-delete-2'); // delete
        }
    );

    // userlevelpermissions
    $app->any('/UserlevelpermissionsList', UserlevelpermissionsController::class . ':list')->add(PermissionMiddleware::class)->setName('UserlevelpermissionsList-userlevelpermissions-list'); // list
    $app->group(
        '/userlevelpermissions',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '', UserlevelpermissionsController::class . ':list')->add(PermissionMiddleware::class)->setName('userlevelpermissions/list-userlevelpermissions-list-2'); // list
        }
    );

    // userlevels
    $app->any('/UserlevelsList[/{id}]', UserlevelsController::class . ':list')->add(PermissionMiddleware::class)->setName('UserlevelsList-userlevels-list'); // list
    $app->any('/UserlevelsAdd[/{id}]', UserlevelsController::class . ':add')->add(PermissionMiddleware::class)->setName('UserlevelsAdd-userlevels-add'); // add
    $app->any('/UserlevelsAddopt', UserlevelsController::class . ':addopt')->add(PermissionMiddleware::class)->setName('UserlevelsAddopt-userlevels-addopt'); // addopt
    $app->any('/UserlevelsView[/{id}]', UserlevelsController::class . ':view')->add(PermissionMiddleware::class)->setName('UserlevelsView-userlevels-view'); // view
    $app->any('/UserlevelsEdit[/{id}]', UserlevelsController::class . ':edit')->add(PermissionMiddleware::class)->setName('UserlevelsEdit-userlevels-edit'); // edit
    $app->any('/UserlevelsDelete[/{id}]', UserlevelsController::class . ':delete')->add(PermissionMiddleware::class)->setName('UserlevelsDelete-userlevels-delete'); // delete
    $app->group(
        '/userlevels',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', UserlevelsController::class . ':list')->add(PermissionMiddleware::class)->setName('userlevels/list-userlevels-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', UserlevelsController::class . ':add')->add(PermissionMiddleware::class)->setName('userlevels/add-userlevels-add-2'); // add
            $group->any('/' . Config("ADDOPT_ACTION") . '', UserlevelsController::class . ':addopt')->add(PermissionMiddleware::class)->setName('userlevels/addopt-userlevels-addopt-2'); // addopt
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', UserlevelsController::class . ':view')->add(PermissionMiddleware::class)->setName('userlevels/view-userlevels-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', UserlevelsController::class . ':edit')->add(PermissionMiddleware::class)->setName('userlevels/edit-userlevels-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', UserlevelsController::class . ':delete')->add(PermissionMiddleware::class)->setName('userlevels/delete-userlevels-delete-2'); // delete
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', SysStatusController::class . ':list')->add(PermissionMiddleware::class)->setName('sys_status/list-sys_status-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', SysStatusController::class . ':add')->add(PermissionMiddleware::class)->setName('sys_status/add-sys_status-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', SysStatusController::class . ':view')->add(PermissionMiddleware::class)->setName('sys_status/view-sys_status-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', SysStatusController::class . ':edit')->add(PermissionMiddleware::class)->setName('sys_status/edit-sys_status-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', SysStatusController::class . ':delete')->add(PermissionMiddleware::class)->setName('sys_status/delete-sys_status-delete-2'); // delete
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', SysGenderController::class . ':list')->add(PermissionMiddleware::class)->setName('sys_gender/list-sys_gender-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', SysGenderController::class . ':add')->add(PermissionMiddleware::class)->setName('sys_gender/add-sys_gender-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', SysGenderController::class . ':view')->add(PermissionMiddleware::class)->setName('sys_gender/view-sys_gender-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', SysGenderController::class . ':edit')->add(PermissionMiddleware::class)->setName('sys_gender/edit-sys_gender-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', SysGenderController::class . ':delete')->add(PermissionMiddleware::class)->setName('sys_gender/delete-sys_gender-delete-2'); // delete
        }
    );

    // sys_tittle
    $app->any('/SysTittleList[/{id}]', SysTittleController::class . ':list')->add(PermissionMiddleware::class)->setName('SysTittleList-sys_tittle-list'); // list
    $app->any('/SysTittleAdd[/{id}]', SysTittleController::class . ':add')->add(PermissionMiddleware::class)->setName('SysTittleAdd-sys_tittle-add'); // add
    $app->any('/SysTittleAddopt', SysTittleController::class . ':addopt')->add(PermissionMiddleware::class)->setName('SysTittleAddopt-sys_tittle-addopt'); // addopt
    $app->any('/SysTittleView[/{id}]', SysTittleController::class . ':view')->add(PermissionMiddleware::class)->setName('SysTittleView-sys_tittle-view'); // view
    $app->any('/SysTittleEdit[/{id}]', SysTittleController::class . ':edit')->add(PermissionMiddleware::class)->setName('SysTittleEdit-sys_tittle-edit'); // edit
    $app->any('/SysTittleDelete[/{id}]', SysTittleController::class . ':delete')->add(PermissionMiddleware::class)->setName('SysTittleDelete-sys_tittle-delete'); // delete
    $app->group(
        '/sys_tittle',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', SysTittleController::class . ':list')->add(PermissionMiddleware::class)->setName('sys_tittle/list-sys_tittle-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', SysTittleController::class . ':add')->add(PermissionMiddleware::class)->setName('sys_tittle/add-sys_tittle-add-2'); // add
            $group->any('/' . Config("ADDOPT_ACTION") . '', SysTittleController::class . ':addopt')->add(PermissionMiddleware::class)->setName('sys_tittle/addopt-sys_tittle-addopt-2'); // addopt
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', SysTittleController::class . ':view')->add(PermissionMiddleware::class)->setName('sys_tittle/view-sys_tittle-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', SysTittleController::class . ':edit')->add(PermissionMiddleware::class)->setName('sys_tittle/edit-sys_tittle-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', SysTittleController::class . ':delete')->add(PermissionMiddleware::class)->setName('sys_tittle/delete-sys_tittle-delete-2'); // delete
        }
    );

    // sys_address_type
    $app->any('/SysAddressTypeList[/{id}]', SysAddressTypeController::class . ':list')->add(PermissionMiddleware::class)->setName('SysAddressTypeList-sys_address_type-list'); // list
    $app->any('/SysAddressTypeAdd[/{id}]', SysAddressTypeController::class . ':add')->add(PermissionMiddleware::class)->setName('SysAddressTypeAdd-sys_address_type-add'); // add
    $app->any('/SysAddressTypeAddopt', SysAddressTypeController::class . ':addopt')->add(PermissionMiddleware::class)->setName('SysAddressTypeAddopt-sys_address_type-addopt'); // addopt
    $app->any('/SysAddressTypeView[/{id}]', SysAddressTypeController::class . ':view')->add(PermissionMiddleware::class)->setName('SysAddressTypeView-sys_address_type-view'); // view
    $app->any('/SysAddressTypeEdit[/{id}]', SysAddressTypeController::class . ':edit')->add(PermissionMiddleware::class)->setName('SysAddressTypeEdit-sys_address_type-edit'); // edit
    $app->any('/SysAddressTypeDelete[/{id}]', SysAddressTypeController::class . ':delete')->add(PermissionMiddleware::class)->setName('SysAddressTypeDelete-sys_address_type-delete'); // delete
    $app->group(
        '/sys_address_type',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', SysAddressTypeController::class . ':list')->add(PermissionMiddleware::class)->setName('sys_address_type/list-sys_address_type-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', SysAddressTypeController::class . ':add')->add(PermissionMiddleware::class)->setName('sys_address_type/add-sys_address_type-add-2'); // add
            $group->any('/' . Config("ADDOPT_ACTION") . '', SysAddressTypeController::class . ':addopt')->add(PermissionMiddleware::class)->setName('sys_address_type/addopt-sys_address_type-addopt-2'); // addopt
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', SysAddressTypeController::class . ':view')->add(PermissionMiddleware::class)->setName('sys_address_type/view-sys_address_type-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', SysAddressTypeController::class . ':edit')->add(PermissionMiddleware::class)->setName('sys_address_type/edit-sys_address_type-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', SysAddressTypeController::class . ':delete')->add(PermissionMiddleware::class)->setName('sys_address_type/delete-sys_address_type-delete-2'); // delete
        }
    );

    // sys_email_type
    $app->any('/SysEmailTypeList[/{id}]', SysEmailTypeController::class . ':list')->add(PermissionMiddleware::class)->setName('SysEmailTypeList-sys_email_type-list'); // list
    $app->any('/SysEmailTypeAdd[/{id}]', SysEmailTypeController::class . ':add')->add(PermissionMiddleware::class)->setName('SysEmailTypeAdd-sys_email_type-add'); // add
    $app->any('/SysEmailTypeAddopt', SysEmailTypeController::class . ':addopt')->add(PermissionMiddleware::class)->setName('SysEmailTypeAddopt-sys_email_type-addopt'); // addopt
    $app->any('/SysEmailTypeView[/{id}]', SysEmailTypeController::class . ':view')->add(PermissionMiddleware::class)->setName('SysEmailTypeView-sys_email_type-view'); // view
    $app->any('/SysEmailTypeEdit[/{id}]', SysEmailTypeController::class . ':edit')->add(PermissionMiddleware::class)->setName('SysEmailTypeEdit-sys_email_type-edit'); // edit
    $app->any('/SysEmailTypeDelete[/{id}]', SysEmailTypeController::class . ':delete')->add(PermissionMiddleware::class)->setName('SysEmailTypeDelete-sys_email_type-delete'); // delete
    $app->group(
        '/sys_email_type',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', SysEmailTypeController::class . ':list')->add(PermissionMiddleware::class)->setName('sys_email_type/list-sys_email_type-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', SysEmailTypeController::class . ':add')->add(PermissionMiddleware::class)->setName('sys_email_type/add-sys_email_type-add-2'); // add
            $group->any('/' . Config("ADDOPT_ACTION") . '', SysEmailTypeController::class . ':addopt')->add(PermissionMiddleware::class)->setName('sys_email_type/addopt-sys_email_type-addopt-2'); // addopt
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', SysEmailTypeController::class . ':view')->add(PermissionMiddleware::class)->setName('sys_email_type/view-sys_email_type-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', SysEmailTypeController::class . ':edit')->add(PermissionMiddleware::class)->setName('sys_email_type/edit-sys_email_type-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', SysEmailTypeController::class . ':delete')->add(PermissionMiddleware::class)->setName('sys_email_type/delete-sys_email_type-delete-2'); // delete
        }
    );

    // sys_tele_type
    $app->any('/SysTeleTypeList[/{id}]', SysTeleTypeController::class . ':list')->add(PermissionMiddleware::class)->setName('SysTeleTypeList-sys_tele_type-list'); // list
    $app->any('/SysTeleTypeAdd[/{id}]', SysTeleTypeController::class . ':add')->add(PermissionMiddleware::class)->setName('SysTeleTypeAdd-sys_tele_type-add'); // add
    $app->any('/SysTeleTypeAddopt', SysTeleTypeController::class . ':addopt')->add(PermissionMiddleware::class)->setName('SysTeleTypeAddopt-sys_tele_type-addopt'); // addopt
    $app->any('/SysTeleTypeView[/{id}]', SysTeleTypeController::class . ':view')->add(PermissionMiddleware::class)->setName('SysTeleTypeView-sys_tele_type-view'); // view
    $app->any('/SysTeleTypeEdit[/{id}]', SysTeleTypeController::class . ':edit')->add(PermissionMiddleware::class)->setName('SysTeleTypeEdit-sys_tele_type-edit'); // edit
    $app->any('/SysTeleTypeDelete[/{id}]', SysTeleTypeController::class . ':delete')->add(PermissionMiddleware::class)->setName('SysTeleTypeDelete-sys_tele_type-delete'); // delete
    $app->group(
        '/sys_tele_type',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', SysTeleTypeController::class . ':list')->add(PermissionMiddleware::class)->setName('sys_tele_type/list-sys_tele_type-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', SysTeleTypeController::class . ':add')->add(PermissionMiddleware::class)->setName('sys_tele_type/add-sys_tele_type-add-2'); // add
            $group->any('/' . Config("ADDOPT_ACTION") . '', SysTeleTypeController::class . ':addopt')->add(PermissionMiddleware::class)->setName('sys_tele_type/addopt-sys_tele_type-addopt-2'); // addopt
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', SysTeleTypeController::class . ':view')->add(PermissionMiddleware::class)->setName('sys_tele_type/view-sys_tele_type-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', SysTeleTypeController::class . ':edit')->add(PermissionMiddleware::class)->setName('sys_tele_type/edit-sys_tele_type-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', SysTeleTypeController::class . ':delete')->add(PermissionMiddleware::class)->setName('sys_tele_type/delete-sys_tele_type-delete-2'); // delete
        }
    );

    // sys_telephone_type
    $app->any('/SysTelephoneTypeList[/{id}]', SysTelephoneTypeController::class . ':list')->add(PermissionMiddleware::class)->setName('SysTelephoneTypeList-sys_telephone_type-list'); // list
    $app->any('/SysTelephoneTypeAdd[/{id}]', SysTelephoneTypeController::class . ':add')->add(PermissionMiddleware::class)->setName('SysTelephoneTypeAdd-sys_telephone_type-add'); // add
    $app->any('/SysTelephoneTypeAddopt', SysTelephoneTypeController::class . ':addopt')->add(PermissionMiddleware::class)->setName('SysTelephoneTypeAddopt-sys_telephone_type-addopt'); // addopt
    $app->any('/SysTelephoneTypeView[/{id}]', SysTelephoneTypeController::class . ':view')->add(PermissionMiddleware::class)->setName('SysTelephoneTypeView-sys_telephone_type-view'); // view
    $app->any('/SysTelephoneTypeEdit[/{id}]', SysTelephoneTypeController::class . ':edit')->add(PermissionMiddleware::class)->setName('SysTelephoneTypeEdit-sys_telephone_type-edit'); // edit
    $app->any('/SysTelephoneTypeDelete[/{id}]', SysTelephoneTypeController::class . ':delete')->add(PermissionMiddleware::class)->setName('SysTelephoneTypeDelete-sys_telephone_type-delete'); // delete
    $app->group(
        '/sys_telephone_type',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', SysTelephoneTypeController::class . ':list')->add(PermissionMiddleware::class)->setName('sys_telephone_type/list-sys_telephone_type-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', SysTelephoneTypeController::class . ':add')->add(PermissionMiddleware::class)->setName('sys_telephone_type/add-sys_telephone_type-add-2'); // add
            $group->any('/' . Config("ADDOPT_ACTION") . '', SysTelephoneTypeController::class . ':addopt')->add(PermissionMiddleware::class)->setName('sys_telephone_type/addopt-sys_telephone_type-addopt-2'); // addopt
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', SysTelephoneTypeController::class . ':view')->add(PermissionMiddleware::class)->setName('sys_telephone_type/view-sys_telephone_type-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', SysTelephoneTypeController::class . ':edit')->add(PermissionMiddleware::class)->setName('sys_telephone_type/edit-sys_telephone_type-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', SysTelephoneTypeController::class . ':delete')->add(PermissionMiddleware::class)->setName('sys_telephone_type/delete-sys_telephone_type-delete-2'); // delete
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', AudittrailController::class . ':list')->add(PermissionMiddleware::class)->setName('audittrail/list-audittrail-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', AudittrailController::class . ':add')->add(PermissionMiddleware::class)->setName('audittrail/add-audittrail-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', AudittrailController::class . ':view')->add(PermissionMiddleware::class)->setName('audittrail/view-audittrail-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', AudittrailController::class . ':edit')->add(PermissionMiddleware::class)->setName('audittrail/edit-audittrail-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', AudittrailController::class . ':delete')->add(PermissionMiddleware::class)->setName('audittrail/delete-audittrail-delete-2'); // delete
        }
    );

    // patient
    $app->any('/PatientList[/{id}]', PatientController::class . ':list')->add(PermissionMiddleware::class)->setName('PatientList-patient-list'); // list
    $app->any('/PatientAdd[/{id}]', PatientController::class . ':add')->add(PermissionMiddleware::class)->setName('PatientAdd-patient-add'); // add
    $app->any('/PatientAddopt', PatientController::class . ':addopt')->add(PermissionMiddleware::class)->setName('PatientAddopt-patient-addopt'); // addopt
    $app->any('/PatientView[/{id}]', PatientController::class . ':view')->add(PermissionMiddleware::class)->setName('PatientView-patient-view'); // view
    $app->any('/PatientEdit[/{id}]', PatientController::class . ':edit')->add(PermissionMiddleware::class)->setName('PatientEdit-patient-edit'); // edit
    $app->any('/PatientSearch', PatientController::class . ':search')->add(PermissionMiddleware::class)->setName('PatientSearch-patient-search'); // search
    $app->group(
        '/patient',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', PatientController::class . ':list')->add(PermissionMiddleware::class)->setName('patient/list-patient-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', PatientController::class . ':add')->add(PermissionMiddleware::class)->setName('patient/add-patient-add-2'); // add
            $group->any('/' . Config("ADDOPT_ACTION") . '', PatientController::class . ':addopt')->add(PermissionMiddleware::class)->setName('patient/addopt-patient-addopt-2'); // addopt
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', PatientController::class . ':view')->add(PermissionMiddleware::class)->setName('patient/view-patient-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', PatientController::class . ':edit')->add(PermissionMiddleware::class)->setName('patient/edit-patient-edit-2'); // edit
            $group->any('/' . Config("SEARCH_ACTION") . '', PatientController::class . ':search')->add(PermissionMiddleware::class)->setName('patient/search-patient-search-2'); // search
        }
    );

    // patient_address
    $app->any('/PatientAddressList[/{id}]', PatientAddressController::class . ':list')->add(PermissionMiddleware::class)->setName('PatientAddressList-patient_address-list'); // list
    $app->any('/PatientAddressAdd[/{id}]', PatientAddressController::class . ':add')->add(PermissionMiddleware::class)->setName('PatientAddressAdd-patient_address-add'); // add
    $app->any('/PatientAddressView[/{id}]', PatientAddressController::class . ':view')->add(PermissionMiddleware::class)->setName('PatientAddressView-patient_address-view'); // view
    $app->any('/PatientAddressEdit[/{id}]', PatientAddressController::class . ':edit')->add(PermissionMiddleware::class)->setName('PatientAddressEdit-patient_address-edit'); // edit
    $app->any('/PatientAddressDelete[/{id}]', PatientAddressController::class . ':delete')->add(PermissionMiddleware::class)->setName('PatientAddressDelete-patient_address-delete'); // delete
    $app->any('/PatientAddressPreview', PatientAddressController::class . ':preview')->add(PermissionMiddleware::class)->setName('PatientAddressPreview-patient_address-preview'); // preview
    $app->group(
        '/patient_address',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', PatientAddressController::class . ':list')->add(PermissionMiddleware::class)->setName('patient_address/list-patient_address-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', PatientAddressController::class . ':add')->add(PermissionMiddleware::class)->setName('patient_address/add-patient_address-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', PatientAddressController::class . ':view')->add(PermissionMiddleware::class)->setName('patient_address/view-patient_address-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', PatientAddressController::class . ':edit')->add(PermissionMiddleware::class)->setName('patient_address/edit-patient_address-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', PatientAddressController::class . ':delete')->add(PermissionMiddleware::class)->setName('patient_address/delete-patient_address-delete-2'); // delete
            $group->any('/' . Config("PREVIEW_ACTION") . '', PatientAddressController::class . ':preview')->add(PermissionMiddleware::class)->setName('patient_address/preview-patient_address-preview-2'); // preview
        }
    );

    // patient_telephone
    $app->any('/PatientTelephoneList[/{id}]', PatientTelephoneController::class . ':list')->add(PermissionMiddleware::class)->setName('PatientTelephoneList-patient_telephone-list'); // list
    $app->any('/PatientTelephoneAdd[/{id}]', PatientTelephoneController::class . ':add')->add(PermissionMiddleware::class)->setName('PatientTelephoneAdd-patient_telephone-add'); // add
    $app->any('/PatientTelephoneView[/{id}]', PatientTelephoneController::class . ':view')->add(PermissionMiddleware::class)->setName('PatientTelephoneView-patient_telephone-view'); // view
    $app->any('/PatientTelephoneEdit[/{id}]', PatientTelephoneController::class . ':edit')->add(PermissionMiddleware::class)->setName('PatientTelephoneEdit-patient_telephone-edit'); // edit
    $app->any('/PatientTelephoneDelete[/{id}]', PatientTelephoneController::class . ':delete')->add(PermissionMiddleware::class)->setName('PatientTelephoneDelete-patient_telephone-delete'); // delete
    $app->any('/PatientTelephonePreview', PatientTelephoneController::class . ':preview')->add(PermissionMiddleware::class)->setName('PatientTelephonePreview-patient_telephone-preview'); // preview
    $app->group(
        '/patient_telephone',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', PatientTelephoneController::class . ':list')->add(PermissionMiddleware::class)->setName('patient_telephone/list-patient_telephone-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', PatientTelephoneController::class . ':add')->add(PermissionMiddleware::class)->setName('patient_telephone/add-patient_telephone-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', PatientTelephoneController::class . ':view')->add(PermissionMiddleware::class)->setName('patient_telephone/view-patient_telephone-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', PatientTelephoneController::class . ':edit')->add(PermissionMiddleware::class)->setName('patient_telephone/edit-patient_telephone-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', PatientTelephoneController::class . ':delete')->add(PermissionMiddleware::class)->setName('patient_telephone/delete-patient_telephone-delete-2'); // delete
            $group->any('/' . Config("PREVIEW_ACTION") . '', PatientTelephoneController::class . ':preview')->add(PermissionMiddleware::class)->setName('patient_telephone/preview-patient_telephone-preview-2'); // preview
        }
    );

    // patient_email
    $app->any('/PatientEmailList[/{id}]', PatientEmailController::class . ':list')->add(PermissionMiddleware::class)->setName('PatientEmailList-patient_email-list'); // list
    $app->any('/PatientEmailAdd[/{id}]', PatientEmailController::class . ':add')->add(PermissionMiddleware::class)->setName('PatientEmailAdd-patient_email-add'); // add
    $app->any('/PatientEmailView[/{id}]', PatientEmailController::class . ':view')->add(PermissionMiddleware::class)->setName('PatientEmailView-patient_email-view'); // view
    $app->any('/PatientEmailEdit[/{id}]', PatientEmailController::class . ':edit')->add(PermissionMiddleware::class)->setName('PatientEmailEdit-patient_email-edit'); // edit
    $app->any('/PatientEmailDelete[/{id}]', PatientEmailController::class . ':delete')->add(PermissionMiddleware::class)->setName('PatientEmailDelete-patient_email-delete'); // delete
    $app->any('/PatientEmailPreview', PatientEmailController::class . ':preview')->add(PermissionMiddleware::class)->setName('PatientEmailPreview-patient_email-preview'); // preview
    $app->group(
        '/patient_email',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', PatientEmailController::class . ':list')->add(PermissionMiddleware::class)->setName('patient_email/list-patient_email-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', PatientEmailController::class . ':add')->add(PermissionMiddleware::class)->setName('patient_email/add-patient_email-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', PatientEmailController::class . ':view')->add(PermissionMiddleware::class)->setName('patient_email/view-patient_email-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', PatientEmailController::class . ':edit')->add(PermissionMiddleware::class)->setName('patient_email/edit-patient_email-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', PatientEmailController::class . ':delete')->add(PermissionMiddleware::class)->setName('patient_email/delete-patient_email-delete-2'); // delete
            $group->any('/' . Config("PREVIEW_ACTION") . '', PatientEmailController::class . ':preview')->add(PermissionMiddleware::class)->setName('patient_email/preview-patient_email-preview-2'); // preview
        }
    );

    // patient_emergency_contact
    $app->any('/PatientEmergencyContactList[/{id}]', PatientEmergencyContactController::class . ':list')->add(PermissionMiddleware::class)->setName('PatientEmergencyContactList-patient_emergency_contact-list'); // list
    $app->any('/PatientEmergencyContactAdd[/{id}]', PatientEmergencyContactController::class . ':add')->add(PermissionMiddleware::class)->setName('PatientEmergencyContactAdd-patient_emergency_contact-add'); // add
    $app->any('/PatientEmergencyContactView[/{id}]', PatientEmergencyContactController::class . ':view')->add(PermissionMiddleware::class)->setName('PatientEmergencyContactView-patient_emergency_contact-view'); // view
    $app->any('/PatientEmergencyContactEdit[/{id}]', PatientEmergencyContactController::class . ':edit')->add(PermissionMiddleware::class)->setName('PatientEmergencyContactEdit-patient_emergency_contact-edit'); // edit
    $app->any('/PatientEmergencyContactDelete[/{id}]', PatientEmergencyContactController::class . ':delete')->add(PermissionMiddleware::class)->setName('PatientEmergencyContactDelete-patient_emergency_contact-delete'); // delete
    $app->any('/PatientEmergencyContactPreview', PatientEmergencyContactController::class . ':preview')->add(PermissionMiddleware::class)->setName('PatientEmergencyContactPreview-patient_emergency_contact-preview'); // preview
    $app->group(
        '/patient_emergency_contact',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', PatientEmergencyContactController::class . ':list')->add(PermissionMiddleware::class)->setName('patient_emergency_contact/list-patient_emergency_contact-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', PatientEmergencyContactController::class . ':add')->add(PermissionMiddleware::class)->setName('patient_emergency_contact/add-patient_emergency_contact-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', PatientEmergencyContactController::class . ':view')->add(PermissionMiddleware::class)->setName('patient_emergency_contact/view-patient_emergency_contact-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', PatientEmergencyContactController::class . ':edit')->add(PermissionMiddleware::class)->setName('patient_emergency_contact/edit-patient_emergency_contact-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', PatientEmergencyContactController::class . ':delete')->add(PermissionMiddleware::class)->setName('patient_emergency_contact/delete-patient_emergency_contact-delete-2'); // delete
            $group->any('/' . Config("PREVIEW_ACTION") . '', PatientEmergencyContactController::class . ':preview')->add(PermissionMiddleware::class)->setName('patient_emergency_contact/preview-patient_emergency_contact-preview-2'); // preview
        }
    );

    // patient_document
    $app->any('/PatientDocumentList[/{id}]', PatientDocumentController::class . ':list')->add(PermissionMiddleware::class)->setName('PatientDocumentList-patient_document-list'); // list
    $app->any('/PatientDocumentAdd[/{id}]', PatientDocumentController::class . ':add')->add(PermissionMiddleware::class)->setName('PatientDocumentAdd-patient_document-add'); // add
    $app->any('/PatientDocumentView[/{id}]', PatientDocumentController::class . ':view')->add(PermissionMiddleware::class)->setName('PatientDocumentView-patient_document-view'); // view
    $app->any('/PatientDocumentEdit[/{id}]', PatientDocumentController::class . ':edit')->add(PermissionMiddleware::class)->setName('PatientDocumentEdit-patient_document-edit'); // edit
    $app->any('/PatientDocumentDelete[/{id}]', PatientDocumentController::class . ':delete')->add(PermissionMiddleware::class)->setName('PatientDocumentDelete-patient_document-delete'); // delete
    $app->any('/PatientDocumentPreview', PatientDocumentController::class . ':preview')->add(PermissionMiddleware::class)->setName('PatientDocumentPreview-patient_document-preview'); // preview
    $app->group(
        '/patient_document',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', PatientDocumentController::class . ':list')->add(PermissionMiddleware::class)->setName('patient_document/list-patient_document-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', PatientDocumentController::class . ':add')->add(PermissionMiddleware::class)->setName('patient_document/add-patient_document-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', PatientDocumentController::class . ':view')->add(PermissionMiddleware::class)->setName('patient_document/view-patient_document-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', PatientDocumentController::class . ':edit')->add(PermissionMiddleware::class)->setName('patient_document/edit-patient_document-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', PatientDocumentController::class . ':delete')->add(PermissionMiddleware::class)->setName('patient_document/delete-patient_document-delete-2'); // delete
            $group->any('/' . Config("PREVIEW_ACTION") . '', PatientDocumentController::class . ':preview')->add(PermissionMiddleware::class)->setName('patient_document/preview-patient_document-preview-2'); // preview
        }
    );

    // mas_degree
    $app->any('/MasDegreeList[/{id}]', MasDegreeController::class . ':list')->add(PermissionMiddleware::class)->setName('MasDegreeList-mas_degree-list'); // list
    $app->any('/MasDegreeAdd[/{id}]', MasDegreeController::class . ':add')->add(PermissionMiddleware::class)->setName('MasDegreeAdd-mas_degree-add'); // add
    $app->any('/MasDegreeAddopt', MasDegreeController::class . ':addopt')->add(PermissionMiddleware::class)->setName('MasDegreeAddopt-mas_degree-addopt'); // addopt
    $app->any('/MasDegreeView[/{id}]', MasDegreeController::class . ':view')->add(PermissionMiddleware::class)->setName('MasDegreeView-mas_degree-view'); // view
    $app->any('/MasDegreeEdit[/{id}]', MasDegreeController::class . ':edit')->add(PermissionMiddleware::class)->setName('MasDegreeEdit-mas_degree-edit'); // edit
    $app->any('/MasDegreeDelete[/{id}]', MasDegreeController::class . ':delete')->add(PermissionMiddleware::class)->setName('MasDegreeDelete-mas_degree-delete'); // delete
    $app->group(
        '/mas_degree',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', MasDegreeController::class . ':list')->add(PermissionMiddleware::class)->setName('mas_degree/list-mas_degree-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', MasDegreeController::class . ':add')->add(PermissionMiddleware::class)->setName('mas_degree/add-mas_degree-add-2'); // add
            $group->any('/' . Config("ADDOPT_ACTION") . '', MasDegreeController::class . ':addopt')->add(PermissionMiddleware::class)->setName('mas_degree/addopt-mas_degree-addopt-2'); // addopt
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', MasDegreeController::class . ':view')->add(PermissionMiddleware::class)->setName('mas_degree/view-mas_degree-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', MasDegreeController::class . ':edit')->add(PermissionMiddleware::class)->setName('mas_degree/edit-mas_degree-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', MasDegreeController::class . ':delete')->add(PermissionMiddleware::class)->setName('mas_degree/delete-mas_degree-delete-2'); // delete
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', MasPharmacyController::class . ':list')->add(PermissionMiddleware::class)->setName('mas_pharmacy/list-mas_pharmacy-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', MasPharmacyController::class . ':add')->add(PermissionMiddleware::class)->setName('mas_pharmacy/add-mas_pharmacy-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', MasPharmacyController::class . ':view')->add(PermissionMiddleware::class)->setName('mas_pharmacy/view-mas_pharmacy-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', MasPharmacyController::class . ':edit')->add(PermissionMiddleware::class)->setName('mas_pharmacy/edit-mas_pharmacy-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', MasPharmacyController::class . ':delete')->add(PermissionMiddleware::class)->setName('mas_pharmacy/delete-mas_pharmacy-delete-2'); // delete
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', MasEmployeeRoleJobDescriptionController::class . ':list')->add(PermissionMiddleware::class)->setName('mas_employee_role_job_description/list-mas_employee_role_job_description-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', MasEmployeeRoleJobDescriptionController::class . ':add')->add(PermissionMiddleware::class)->setName('mas_employee_role_job_description/add-mas_employee_role_job_description-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', MasEmployeeRoleJobDescriptionController::class . ':view')->add(PermissionMiddleware::class)->setName('mas_employee_role_job_description/view-mas_employee_role_job_description-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', MasEmployeeRoleJobDescriptionController::class . ':edit')->add(PermissionMiddleware::class)->setName('mas_employee_role_job_description/edit-mas_employee_role_job_description-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', MasEmployeeRoleJobDescriptionController::class . ':delete')->add(PermissionMiddleware::class)->setName('mas_employee_role_job_description/delete-mas_employee_role_job_description-delete-2'); // delete
        }
    );

    // ip_admission
    $app->any('/IpAdmissionList[/{id}]', IpAdmissionController::class . ':list')->add(PermissionMiddleware::class)->setName('IpAdmissionList-ip_admission-list'); // list
    $app->any('/IpAdmissionAdd[/{id}]', IpAdmissionController::class . ':add')->add(PermissionMiddleware::class)->setName('IpAdmissionAdd-ip_admission-add'); // add
    $app->any('/IpAdmissionView[/{id}]', IpAdmissionController::class . ':view')->add(PermissionMiddleware::class)->setName('IpAdmissionView-ip_admission-view'); // view
    $app->any('/IpAdmissionEdit[/{id}]', IpAdmissionController::class . ':edit')->add(PermissionMiddleware::class)->setName('IpAdmissionEdit-ip_admission-edit'); // edit
    $app->any('/IpAdmissionDelete[/{id}]', IpAdmissionController::class . ':delete')->add(PermissionMiddleware::class)->setName('IpAdmissionDelete-ip_admission-delete'); // delete
    $app->any('/IpAdmissionSearch', IpAdmissionController::class . ':search')->add(PermissionMiddleware::class)->setName('IpAdmissionSearch-ip_admission-search'); // search
    $app->group(
        '/ip_admission',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', IpAdmissionController::class . ':list')->add(PermissionMiddleware::class)->setName('ip_admission/list-ip_admission-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', IpAdmissionController::class . ':add')->add(PermissionMiddleware::class)->setName('ip_admission/add-ip_admission-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', IpAdmissionController::class . ':view')->add(PermissionMiddleware::class)->setName('ip_admission/view-ip_admission-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', IpAdmissionController::class . ':edit')->add(PermissionMiddleware::class)->setName('ip_admission/edit-ip_admission-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', IpAdmissionController::class . ':delete')->add(PermissionMiddleware::class)->setName('ip_admission/delete-ip_admission-delete-2'); // delete
            $group->any('/' . Config("SEARCH_ACTION") . '', IpAdmissionController::class . ':search')->add(PermissionMiddleware::class)->setName('ip_admission/search-ip_admission-search-2'); // search
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', PharmacyController::class . ':list')->add(PermissionMiddleware::class)->setName('pharmacy/list-pharmacy-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', PharmacyController::class . ':add')->add(PermissionMiddleware::class)->setName('pharmacy/add-pharmacy-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', PharmacyController::class . ':view')->add(PermissionMiddleware::class)->setName('pharmacy/view-pharmacy-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', PharmacyController::class . ':edit')->add(PermissionMiddleware::class)->setName('pharmacy/edit-pharmacy-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', PharmacyController::class . ':delete')->add(PermissionMiddleware::class)->setName('pharmacy/delete-pharmacy-delete-2'); // delete
        }
    );

    // pharmacy_services
    $app->any('/PharmacyServicesList[/{id}]', PharmacyServicesController::class . ':list')->add(PermissionMiddleware::class)->setName('PharmacyServicesList-pharmacy_services-list'); // list
    $app->any('/PharmacyServicesAdd[/{id}]', PharmacyServicesController::class . ':add')->add(PermissionMiddleware::class)->setName('PharmacyServicesAdd-pharmacy_services-add'); // add
    $app->any('/PharmacyServicesView[/{id}]', PharmacyServicesController::class . ':view')->add(PermissionMiddleware::class)->setName('PharmacyServicesView-pharmacy_services-view'); // view
    $app->any('/PharmacyServicesEdit[/{id}]', PharmacyServicesController::class . ':edit')->add(PermissionMiddleware::class)->setName('PharmacyServicesEdit-pharmacy_services-edit'); // edit
    $app->any('/PharmacyServicesDelete[/{id}]', PharmacyServicesController::class . ':delete')->add(PermissionMiddleware::class)->setName('PharmacyServicesDelete-pharmacy_services-delete'); // delete
    $app->any('/PharmacyServicesPreview', PharmacyServicesController::class . ':preview')->add(PermissionMiddleware::class)->setName('PharmacyServicesPreview-pharmacy_services-preview'); // preview
    $app->group(
        '/pharmacy_services',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', PharmacyServicesController::class . ':list')->add(PermissionMiddleware::class)->setName('pharmacy_services/list-pharmacy_services-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', PharmacyServicesController::class . ':add')->add(PermissionMiddleware::class)->setName('pharmacy_services/add-pharmacy_services-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', PharmacyServicesController::class . ':view')->add(PermissionMiddleware::class)->setName('pharmacy_services/view-pharmacy_services-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', PharmacyServicesController::class . ':edit')->add(PermissionMiddleware::class)->setName('pharmacy_services/edit-pharmacy_services-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', PharmacyServicesController::class . ':delete')->add(PermissionMiddleware::class)->setName('pharmacy_services/delete-pharmacy_services-delete-2'); // delete
            $group->any('/' . Config("PREVIEW_ACTION") . '', PharmacyServicesController::class . ':preview')->add(PermissionMiddleware::class)->setName('pharmacy_services/preview-pharmacy_services-preview-2'); // preview
        }
    );

    // doctors
    $app->any('/DoctorsList[/{id}]', DoctorsController::class . ':list')->add(PermissionMiddleware::class)->setName('DoctorsList-doctors-list'); // list
    $app->any('/DoctorsAdd[/{id}]', DoctorsController::class . ':add')->add(PermissionMiddleware::class)->setName('DoctorsAdd-doctors-add'); // add
    $app->any('/DoctorsAddopt', DoctorsController::class . ':addopt')->add(PermissionMiddleware::class)->setName('DoctorsAddopt-doctors-addopt'); // addopt
    $app->any('/DoctorsView[/{id}]', DoctorsController::class . ':view')->add(PermissionMiddleware::class)->setName('DoctorsView-doctors-view'); // view
    $app->any('/DoctorsEdit[/{id}]', DoctorsController::class . ':edit')->add(PermissionMiddleware::class)->setName('DoctorsEdit-doctors-edit'); // edit
    $app->any('/DoctorsDelete[/{id}]', DoctorsController::class . ':delete')->add(PermissionMiddleware::class)->setName('DoctorsDelete-doctors-delete'); // delete
    $app->group(
        '/doctors',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', DoctorsController::class . ':list')->add(PermissionMiddleware::class)->setName('doctors/list-doctors-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', DoctorsController::class . ':add')->add(PermissionMiddleware::class)->setName('doctors/add-doctors-add-2'); // add
            $group->any('/' . Config("ADDOPT_ACTION") . '', DoctorsController::class . ':addopt')->add(PermissionMiddleware::class)->setName('doctors/addopt-doctors-addopt-2'); // addopt
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', DoctorsController::class . ':view')->add(PermissionMiddleware::class)->setName('doctors/view-doctors-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', DoctorsController::class . ':edit')->add(PermissionMiddleware::class)->setName('doctors/edit-doctors-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', DoctorsController::class . ':delete')->add(PermissionMiddleware::class)->setName('doctors/delete-doctors-delete-2'); // delete
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', MasCategoryController::class . ':list')->add(PermissionMiddleware::class)->setName('mas_category/list-mas_category-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', MasCategoryController::class . ':add')->add(PermissionMiddleware::class)->setName('mas_category/add-mas_category-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', MasCategoryController::class . ':view')->add(PermissionMiddleware::class)->setName('mas_category/view-mas_category-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', MasCategoryController::class . ':edit')->add(PermissionMiddleware::class)->setName('mas_category/edit-mas_category-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', MasCategoryController::class . ':delete')->add(PermissionMiddleware::class)->setName('mas_category/delete-mas_category-delete-2'); // delete
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', MasClinicaldetailsController::class . ':list')->add(PermissionMiddleware::class)->setName('mas_clinicaldetails/list-mas_clinicaldetails-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', MasClinicaldetailsController::class . ':add')->add(PermissionMiddleware::class)->setName('mas_clinicaldetails/add-mas_clinicaldetails-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', MasClinicaldetailsController::class . ':view')->add(PermissionMiddleware::class)->setName('mas_clinicaldetails/view-mas_clinicaldetails-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', MasClinicaldetailsController::class . ':edit')->add(PermissionMiddleware::class)->setName('mas_clinicaldetails/edit-mas_clinicaldetails-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', MasClinicaldetailsController::class . ':delete')->add(PermissionMiddleware::class)->setName('mas_clinicaldetails/delete-mas_clinicaldetails-delete-2'); // delete
        }
    );

    // mas_document
    $app->any('/MasDocumentList[/{id}]', MasDocumentController::class . ':list')->add(PermissionMiddleware::class)->setName('MasDocumentList-mas_document-list'); // list
    $app->any('/MasDocumentAdd[/{id}]', MasDocumentController::class . ':add')->add(PermissionMiddleware::class)->setName('MasDocumentAdd-mas_document-add'); // add
    $app->any('/MasDocumentAddopt', MasDocumentController::class . ':addopt')->add(PermissionMiddleware::class)->setName('MasDocumentAddopt-mas_document-addopt'); // addopt
    $app->any('/MasDocumentView[/{id}]', MasDocumentController::class . ':view')->add(PermissionMiddleware::class)->setName('MasDocumentView-mas_document-view'); // view
    $app->any('/MasDocumentEdit[/{id}]', MasDocumentController::class . ':edit')->add(PermissionMiddleware::class)->setName('MasDocumentEdit-mas_document-edit'); // edit
    $app->any('/MasDocumentDelete[/{id}]', MasDocumentController::class . ':delete')->add(PermissionMiddleware::class)->setName('MasDocumentDelete-mas_document-delete'); // delete
    $app->group(
        '/mas_document',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', MasDocumentController::class . ':list')->add(PermissionMiddleware::class)->setName('mas_document/list-mas_document-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', MasDocumentController::class . ':add')->add(PermissionMiddleware::class)->setName('mas_document/add-mas_document-add-2'); // add
            $group->any('/' . Config("ADDOPT_ACTION") . '', MasDocumentController::class . ':addopt')->add(PermissionMiddleware::class)->setName('mas_document/addopt-mas_document-addopt-2'); // addopt
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', MasDocumentController::class . ':view')->add(PermissionMiddleware::class)->setName('mas_document/view-mas_document-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', MasDocumentController::class . ':edit')->add(PermissionMiddleware::class)->setName('mas_document/edit-mas_document-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', MasDocumentController::class . ':delete')->add(PermissionMiddleware::class)->setName('mas_document/delete-mas_document-delete-2'); // delete
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', MasModepaymentController::class . ':list')->add(PermissionMiddleware::class)->setName('mas_modepayment/list-mas_modepayment-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', MasModepaymentController::class . ':add')->add(PermissionMiddleware::class)->setName('mas_modepayment/add-mas_modepayment-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', MasModepaymentController::class . ':view')->add(PermissionMiddleware::class)->setName('mas_modepayment/view-mas_modepayment-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', MasModepaymentController::class . ':edit')->add(PermissionMiddleware::class)->setName('mas_modepayment/edit-mas_modepayment-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', MasModepaymentController::class . ':delete')->add(PermissionMiddleware::class)->setName('mas_modepayment/delete-mas_modepayment-delete-2'); // delete
        }
    );

    // mas_reference_type
    $app->any('/MasReferenceTypeList[/{id}]', MasReferenceTypeController::class . ':list')->add(PermissionMiddleware::class)->setName('MasReferenceTypeList-mas_reference_type-list'); // list
    $app->any('/MasReferenceTypeAdd[/{id}]', MasReferenceTypeController::class . ':add')->add(PermissionMiddleware::class)->setName('MasReferenceTypeAdd-mas_reference_type-add'); // add
    $app->any('/MasReferenceTypeAddopt', MasReferenceTypeController::class . ':addopt')->add(PermissionMiddleware::class)->setName('MasReferenceTypeAddopt-mas_reference_type-addopt'); // addopt
    $app->any('/MasReferenceTypeView[/{id}]', MasReferenceTypeController::class . ':view')->add(PermissionMiddleware::class)->setName('MasReferenceTypeView-mas_reference_type-view'); // view
    $app->any('/MasReferenceTypeEdit[/{id}]', MasReferenceTypeController::class . ':edit')->add(PermissionMiddleware::class)->setName('MasReferenceTypeEdit-mas_reference_type-edit'); // edit
    $app->any('/MasReferenceTypeDelete[/{id}]', MasReferenceTypeController::class . ':delete')->add(PermissionMiddleware::class)->setName('MasReferenceTypeDelete-mas_reference_type-delete'); // delete
    $app->group(
        '/mas_reference_type',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', MasReferenceTypeController::class . ':list')->add(PermissionMiddleware::class)->setName('mas_reference_type/list-mas_reference_type-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', MasReferenceTypeController::class . ':add')->add(PermissionMiddleware::class)->setName('mas_reference_type/add-mas_reference_type-add-2'); // add
            $group->any('/' . Config("ADDOPT_ACTION") . '', MasReferenceTypeController::class . ':addopt')->add(PermissionMiddleware::class)->setName('mas_reference_type/addopt-mas_reference_type-addopt-2'); // addopt
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', MasReferenceTypeController::class . ':view')->add(PermissionMiddleware::class)->setName('mas_reference_type/view-mas_reference_type-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', MasReferenceTypeController::class . ':edit')->add(PermissionMiddleware::class)->setName('mas_reference_type/edit-mas_reference_type-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', MasReferenceTypeController::class . ':delete')->add(PermissionMiddleware::class)->setName('mas_reference_type/delete-mas_reference_type-delete-2'); // delete
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', MasPaymentcategoryController::class . ':list')->add(PermissionMiddleware::class)->setName('mas_paymentcategory/list-mas_paymentcategory-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', MasPaymentcategoryController::class . ':add')->add(PermissionMiddleware::class)->setName('mas_paymentcategory/add-mas_paymentcategory-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', MasPaymentcategoryController::class . ':view')->add(PermissionMiddleware::class)->setName('mas_paymentcategory/view-mas_paymentcategory-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', MasPaymentcategoryController::class . ':edit')->add(PermissionMiddleware::class)->setName('mas_paymentcategory/edit-mas_paymentcategory-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', MasPaymentcategoryController::class . ':delete')->add(PermissionMiddleware::class)->setName('mas_paymentcategory/delete-mas_paymentcategory-delete-2'); // delete
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', MasPaymentStatusController::class . ':list')->add(PermissionMiddleware::class)->setName('mas_payment_status/list-mas_payment_status-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', MasPaymentStatusController::class . ':add')->add(PermissionMiddleware::class)->setName('mas_payment_status/add-mas_payment_status-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', MasPaymentStatusController::class . ':view')->add(PermissionMiddleware::class)->setName('mas_payment_status/view-mas_payment_status-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', MasPaymentStatusController::class . ':edit')->add(PermissionMiddleware::class)->setName('mas_payment_status/edit-mas_payment_status-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', MasPaymentStatusController::class . ':delete')->add(PermissionMiddleware::class)->setName('mas_payment_status/delete-mas_payment_status-delete-2'); // delete
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', MasTypeofregsistrationController::class . ':list')->add(PermissionMiddleware::class)->setName('mas_typeofregsistration/list-mas_typeofregsistration-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', MasTypeofregsistrationController::class . ':add')->add(PermissionMiddleware::class)->setName('mas_typeofregsistration/add-mas_typeofregsistration-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', MasTypeofregsistrationController::class . ':view')->add(PermissionMiddleware::class)->setName('mas_typeofregsistration/view-mas_typeofregsistration-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', MasTypeofregsistrationController::class . ':edit')->add(PermissionMiddleware::class)->setName('mas_typeofregsistration/edit-mas_typeofregsistration-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', MasTypeofregsistrationController::class . ':delete')->add(PermissionMiddleware::class)->setName('mas_typeofregsistration/delete-mas_typeofregsistration-delete-2'); // delete
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', MasProcedureController::class . ':list')->add(PermissionMiddleware::class)->setName('mas_procedure/list-mas_procedure-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', MasProcedureController::class . ':add')->add(PermissionMiddleware::class)->setName('mas_procedure/add-mas_procedure-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', MasProcedureController::class . ':view')->add(PermissionMiddleware::class)->setName('mas_procedure/view-mas_procedure-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', MasProcedureController::class . ':edit')->add(PermissionMiddleware::class)->setName('mas_procedure/edit-mas_procedure-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', MasProcedureController::class . ':delete')->add(PermissionMiddleware::class)->setName('mas_procedure/delete-mas_procedure-delete-2'); // delete
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', ReceptionController::class . ':list')->add(PermissionMiddleware::class)->setName('reception/list-reception-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', ReceptionController::class . ':add')->add(PermissionMiddleware::class)->setName('reception/add-reception-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', ReceptionController::class . ':view')->add(PermissionMiddleware::class)->setName('reception/view-reception-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', ReceptionController::class . ':edit')->add(PermissionMiddleware::class)->setName('reception/edit-reception-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', ReceptionController::class . ':delete')->add(PermissionMiddleware::class)->setName('reception/delete-reception-delete-2'); // delete
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
            $group->any('/' . Config("LIST_ACTION") . '[/{Id}]', MasServicesBillingController::class . ':list')->add(PermissionMiddleware::class)->setName('mas_services_billing/list-mas_services_billing-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{Id}]', MasServicesBillingController::class . ':add')->add(PermissionMiddleware::class)->setName('mas_services_billing/add-mas_services_billing-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{Id}]', MasServicesBillingController::class . ':view')->add(PermissionMiddleware::class)->setName('mas_services_billing/view-mas_services_billing-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{Id}]', MasServicesBillingController::class . ':edit')->add(PermissionMiddleware::class)->setName('mas_services_billing/edit-mas_services_billing-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{Id}]', MasServicesBillingController::class . ':delete')->add(PermissionMiddleware::class)->setName('mas_services_billing/delete-mas_services_billing-delete-2'); // delete
        }
    );

    // mas_services_type
    $app->any('/MasServicesTypeList[/{id}]', MasServicesTypeController::class . ':list')->add(PermissionMiddleware::class)->setName('MasServicesTypeList-mas_services_type-list'); // list
    $app->any('/MasServicesTypeAdd[/{id}]', MasServicesTypeController::class . ':add')->add(PermissionMiddleware::class)->setName('MasServicesTypeAdd-mas_services_type-add'); // add
    $app->any('/MasServicesTypeAddopt', MasServicesTypeController::class . ':addopt')->add(PermissionMiddleware::class)->setName('MasServicesTypeAddopt-mas_services_type-addopt'); // addopt
    $app->any('/MasServicesTypeView[/{id}]', MasServicesTypeController::class . ':view')->add(PermissionMiddleware::class)->setName('MasServicesTypeView-mas_services_type-view'); // view
    $app->any('/MasServicesTypeEdit[/{id}]', MasServicesTypeController::class . ':edit')->add(PermissionMiddleware::class)->setName('MasServicesTypeEdit-mas_services_type-edit'); // edit
    $app->any('/MasServicesTypeDelete[/{id}]', MasServicesTypeController::class . ':delete')->add(PermissionMiddleware::class)->setName('MasServicesTypeDelete-mas_services_type-delete'); // delete
    $app->group(
        '/mas_services_type',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', MasServicesTypeController::class . ':list')->add(PermissionMiddleware::class)->setName('mas_services_type/list-mas_services_type-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', MasServicesTypeController::class . ':add')->add(PermissionMiddleware::class)->setName('mas_services_type/add-mas_services_type-add-2'); // add
            $group->any('/' . Config("ADDOPT_ACTION") . '', MasServicesTypeController::class . ':addopt')->add(PermissionMiddleware::class)->setName('mas_services_type/addopt-mas_services_type-addopt-2'); // addopt
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', MasServicesTypeController::class . ':view')->add(PermissionMiddleware::class)->setName('mas_services_type/view-mas_services_type-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', MasServicesTypeController::class . ':edit')->add(PermissionMiddleware::class)->setName('mas_services_type/edit-mas_services_type-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', MasServicesTypeController::class . ':delete')->add(PermissionMiddleware::class)->setName('mas_services_type/delete-mas_services_type-delete-2'); // delete
        }
    );

    // dashboard2
    $app->any('/Dashboard2[/{params:.*}]', Dashboard2Controller::class)->add(PermissionMiddleware::class)->setName('Dashboard2-dashboard2-custom'); // custom

    // mas_billing_department
    $app->any('/MasBillingDepartmentList[/{id}]', MasBillingDepartmentController::class . ':list')->add(PermissionMiddleware::class)->setName('MasBillingDepartmentList-mas_billing_department-list'); // list
    $app->any('/MasBillingDepartmentAdd[/{id}]', MasBillingDepartmentController::class . ':add')->add(PermissionMiddleware::class)->setName('MasBillingDepartmentAdd-mas_billing_department-add'); // add
    $app->any('/MasBillingDepartmentAddopt', MasBillingDepartmentController::class . ':addopt')->add(PermissionMiddleware::class)->setName('MasBillingDepartmentAddopt-mas_billing_department-addopt'); // addopt
    $app->any('/MasBillingDepartmentView[/{id}]', MasBillingDepartmentController::class . ':view')->add(PermissionMiddleware::class)->setName('MasBillingDepartmentView-mas_billing_department-view'); // view
    $app->any('/MasBillingDepartmentEdit[/{id}]', MasBillingDepartmentController::class . ':edit')->add(PermissionMiddleware::class)->setName('MasBillingDepartmentEdit-mas_billing_department-edit'); // edit
    $app->any('/MasBillingDepartmentDelete[/{id}]', MasBillingDepartmentController::class . ':delete')->add(PermissionMiddleware::class)->setName('MasBillingDepartmentDelete-mas_billing_department-delete'); // delete
    $app->group(
        '/mas_billing_department',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', MasBillingDepartmentController::class . ':list')->add(PermissionMiddleware::class)->setName('mas_billing_department/list-mas_billing_department-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', MasBillingDepartmentController::class . ':add')->add(PermissionMiddleware::class)->setName('mas_billing_department/add-mas_billing_department-add-2'); // add
            $group->any('/' . Config("ADDOPT_ACTION") . '', MasBillingDepartmentController::class . ':addopt')->add(PermissionMiddleware::class)->setName('mas_billing_department/addopt-mas_billing_department-addopt-2'); // addopt
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', MasBillingDepartmentController::class . ':view')->add(PermissionMiddleware::class)->setName('mas_billing_department/view-mas_billing_department-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', MasBillingDepartmentController::class . ':edit')->add(PermissionMiddleware::class)->setName('mas_billing_department/edit-mas_billing_department-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', MasBillingDepartmentController::class . ':delete')->add(PermissionMiddleware::class)->setName('mas_billing_department/delete-mas_billing_department-delete-2'); // delete
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', EmployeeRoleJobDescriptionController::class . ':list')->add(PermissionMiddleware::class)->setName('employee_role_job_description/list-employee_role_job_description-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', EmployeeRoleJobDescriptionController::class . ':add')->add(PermissionMiddleware::class)->setName('employee_role_job_description/add-employee_role_job_description-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', EmployeeRoleJobDescriptionController::class . ':view')->add(PermissionMiddleware::class)->setName('employee_role_job_description/view-employee_role_job_description-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', EmployeeRoleJobDescriptionController::class . ':edit')->add(PermissionMiddleware::class)->setName('employee_role_job_description/edit-employee_role_job_description-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', EmployeeRoleJobDescriptionController::class . ':delete')->add(PermissionMiddleware::class)->setName('employee_role_job_description/delete-employee_role_job_description-delete-2'); // delete
        }
    );

    // ivf
    $app->any('/IvfList[/{id}]', IvfController::class . ':list')->add(PermissionMiddleware::class)->setName('IvfList-ivf-list'); // list
    $app->any('/IvfAdd[/{id}]', IvfController::class . ':add')->add(PermissionMiddleware::class)->setName('IvfAdd-ivf-add'); // add
    $app->any('/IvfView[/{id}]', IvfController::class . ':view')->add(PermissionMiddleware::class)->setName('IvfView-ivf-view'); // view
    $app->any('/IvfEdit[/{id}]', IvfController::class . ':edit')->add(PermissionMiddleware::class)->setName('IvfEdit-ivf-edit'); // edit
    $app->any('/IvfDelete[/{id}]', IvfController::class . ':delete')->add(PermissionMiddleware::class)->setName('IvfDelete-ivf-delete'); // delete
    $app->any('/IvfSearch', IvfController::class . ':search')->add(PermissionMiddleware::class)->setName('IvfSearch-ivf-search'); // search
    $app->group(
        '/ivf',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', IvfController::class . ':list')->add(PermissionMiddleware::class)->setName('ivf/list-ivf-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', IvfController::class . ':add')->add(PermissionMiddleware::class)->setName('ivf/add-ivf-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', IvfController::class . ':view')->add(PermissionMiddleware::class)->setName('ivf/view-ivf-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', IvfController::class . ':edit')->add(PermissionMiddleware::class)->setName('ivf/edit-ivf-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', IvfController::class . ':delete')->add(PermissionMiddleware::class)->setName('ivf/delete-ivf-delete-2'); // delete
            $group->any('/' . Config("SEARCH_ACTION") . '', IvfController::class . ':search')->add(PermissionMiddleware::class)->setName('ivf/search-ivf-search-2'); // search
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', IvfArtSummaryController::class . ':list')->add(PermissionMiddleware::class)->setName('ivf_art_summary/list-ivf_art_summary-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', IvfArtSummaryController::class . ':add')->add(PermissionMiddleware::class)->setName('ivf_art_summary/add-ivf_art_summary-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', IvfArtSummaryController::class . ':view')->add(PermissionMiddleware::class)->setName('ivf_art_summary/view-ivf_art_summary-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', IvfArtSummaryController::class . ':edit')->add(PermissionMiddleware::class)->setName('ivf_art_summary/edit-ivf_art_summary-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', IvfArtSummaryController::class . ':delete')->add(PermissionMiddleware::class)->setName('ivf_art_summary/delete-ivf_art_summary-delete-2'); // delete
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', IvfOtherprocedureController::class . ':list')->add(PermissionMiddleware::class)->setName('ivf_otherprocedure/list-ivf_otherprocedure-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', IvfOtherprocedureController::class . ':add')->add(PermissionMiddleware::class)->setName('ivf_otherprocedure/add-ivf_otherprocedure-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', IvfOtherprocedureController::class . ':view')->add(PermissionMiddleware::class)->setName('ivf_otherprocedure/view-ivf_otherprocedure-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', IvfOtherprocedureController::class . ':edit')->add(PermissionMiddleware::class)->setName('ivf_otherprocedure/edit-ivf_otherprocedure-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', IvfOtherprocedureController::class . ':delete')->add(PermissionMiddleware::class)->setName('ivf_otherprocedure/delete-ivf_otherprocedure-delete-2'); // delete
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', IvfVitalsHistoryController::class . ':list')->add(PermissionMiddleware::class)->setName('ivf_vitals_history/list-ivf_vitals_history-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', IvfVitalsHistoryController::class . ':add')->add(PermissionMiddleware::class)->setName('ivf_vitals_history/add-ivf_vitals_history-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', IvfVitalsHistoryController::class . ':view')->add(PermissionMiddleware::class)->setName('ivf_vitals_history/view-ivf_vitals_history-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', IvfVitalsHistoryController::class . ':edit')->add(PermissionMiddleware::class)->setName('ivf_vitals_history/edit-ivf_vitals_history-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', IvfVitalsHistoryController::class . ':delete')->add(PermissionMiddleware::class)->setName('ivf_vitals_history/delete-ivf_vitals_history-delete-2'); // delete
        }
    );

    // ivf_semenanalysisreport
    $app->any('/IvfSemenanalysisreportList[/{id}]', IvfSemenanalysisreportController::class . ':list')->add(PermissionMiddleware::class)->setName('IvfSemenanalysisreportList-ivf_semenanalysisreport-list'); // list
    $app->any('/IvfSemenanalysisreportAdd[/{id}]', IvfSemenanalysisreportController::class . ':add')->add(PermissionMiddleware::class)->setName('IvfSemenanalysisreportAdd-ivf_semenanalysisreport-add'); // add
    $app->any('/IvfSemenanalysisreportView[/{id}]', IvfSemenanalysisreportController::class . ':view')->add(PermissionMiddleware::class)->setName('IvfSemenanalysisreportView-ivf_semenanalysisreport-view'); // view
    $app->any('/IvfSemenanalysisreportEdit[/{id}]', IvfSemenanalysisreportController::class . ':edit')->add(PermissionMiddleware::class)->setName('IvfSemenanalysisreportEdit-ivf_semenanalysisreport-edit'); // edit
    $app->any('/IvfSemenanalysisreportDelete[/{id}]', IvfSemenanalysisreportController::class . ':delete')->add(PermissionMiddleware::class)->setName('IvfSemenanalysisreportDelete-ivf_semenanalysisreport-delete'); // delete
    $app->any('/IvfSemenanalysisreportPreview', IvfSemenanalysisreportController::class . ':preview')->add(PermissionMiddleware::class)->setName('IvfSemenanalysisreportPreview-ivf_semenanalysisreport-preview'); // preview
    $app->group(
        '/ivf_semenanalysisreport',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', IvfSemenanalysisreportController::class . ':list')->add(PermissionMiddleware::class)->setName('ivf_semenanalysisreport/list-ivf_semenanalysisreport-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', IvfSemenanalysisreportController::class . ':add')->add(PermissionMiddleware::class)->setName('ivf_semenanalysisreport/add-ivf_semenanalysisreport-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', IvfSemenanalysisreportController::class . ':view')->add(PermissionMiddleware::class)->setName('ivf_semenanalysisreport/view-ivf_semenanalysisreport-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', IvfSemenanalysisreportController::class . ':edit')->add(PermissionMiddleware::class)->setName('ivf_semenanalysisreport/edit-ivf_semenanalysisreport-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', IvfSemenanalysisreportController::class . ':delete')->add(PermissionMiddleware::class)->setName('ivf_semenanalysisreport/delete-ivf_semenanalysisreport-delete-2'); // delete
            $group->any('/' . Config("PREVIEW_ACTION") . '', IvfSemenanalysisreportController::class . ':preview')->add(PermissionMiddleware::class)->setName('ivf_semenanalysisreport/preview-ivf_semenanalysisreport-preview-2'); // preview
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', PresCategoryallergyController::class . ':list')->add(PermissionMiddleware::class)->setName('pres_categoryallergy/list-pres_categoryallergy-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', PresCategoryallergyController::class . ':add')->add(PermissionMiddleware::class)->setName('pres_categoryallergy/add-pres_categoryallergy-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', PresCategoryallergyController::class . ':view')->add(PermissionMiddleware::class)->setName('pres_categoryallergy/view-pres_categoryallergy-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', PresCategoryallergyController::class . ':edit')->add(PermissionMiddleware::class)->setName('pres_categoryallergy/edit-pres_categoryallergy-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', PresCategoryallergyController::class . ':delete')->add(PermissionMiddleware::class)->setName('pres_categoryallergy/delete-pres_categoryallergy-delete-2'); // delete
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', PresContainerTypeController::class . ':list')->add(PermissionMiddleware::class)->setName('pres_container_type/list-pres_container_type-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', PresContainerTypeController::class . ':add')->add(PermissionMiddleware::class)->setName('pres_container_type/add-pres_container_type-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', PresContainerTypeController::class . ':view')->add(PermissionMiddleware::class)->setName('pres_container_type/view-pres_container_type-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', PresContainerTypeController::class . ':edit')->add(PermissionMiddleware::class)->setName('pres_container_type/edit-pres_container_type-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', PresContainerTypeController::class . ':delete')->add(PermissionMiddleware::class)->setName('pres_container_type/delete-pres_container_type-delete-2'); // delete
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', PresFluidformulationController::class . ':list')->add(PermissionMiddleware::class)->setName('pres_fluidformulation/list-pres_fluidformulation-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', PresFluidformulationController::class . ':add')->add(PermissionMiddleware::class)->setName('pres_fluidformulation/add-pres_fluidformulation-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', PresFluidformulationController::class . ':view')->add(PermissionMiddleware::class)->setName('pres_fluidformulation/view-pres_fluidformulation-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', PresFluidformulationController::class . ':edit')->add(PermissionMiddleware::class)->setName('pres_fluidformulation/edit-pres_fluidformulation-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', PresFluidformulationController::class . ':delete')->add(PermissionMiddleware::class)->setName('pres_fluidformulation/delete-pres_fluidformulation-delete-2'); // delete
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', PresFluidsController::class . ':list')->add(PermissionMiddleware::class)->setName('pres_fluids/list-pres_fluids-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', PresFluidsController::class . ':add')->add(PermissionMiddleware::class)->setName('pres_fluids/add-pres_fluids-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', PresFluidsController::class . ':view')->add(PermissionMiddleware::class)->setName('pres_fluids/view-pres_fluids-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', PresFluidsController::class . ':edit')->add(PermissionMiddleware::class)->setName('pres_fluids/edit-pres_fluids-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', PresFluidsController::class . ':delete')->add(PermissionMiddleware::class)->setName('pres_fluids/delete-pres_fluids-delete-2'); // delete
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', PresFrequenciesController::class . ':list')->add(PermissionMiddleware::class)->setName('pres_frequencies/list-pres_frequencies-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', PresFrequenciesController::class . ':add')->add(PermissionMiddleware::class)->setName('pres_frequencies/add-pres_frequencies-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', PresFrequenciesController::class . ':view')->add(PermissionMiddleware::class)->setName('pres_frequencies/view-pres_frequencies-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', PresFrequenciesController::class . ':edit')->add(PermissionMiddleware::class)->setName('pres_frequencies/edit-pres_frequencies-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', PresFrequenciesController::class . ':delete')->add(PermissionMiddleware::class)->setName('pres_frequencies/delete-pres_frequencies-delete-2'); // delete
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', PresGenericinteractionsController::class . ':list')->add(PermissionMiddleware::class)->setName('pres_genericinteractions/list-pres_genericinteractions-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', PresGenericinteractionsController::class . ':add')->add(PermissionMiddleware::class)->setName('pres_genericinteractions/add-pres_genericinteractions-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', PresGenericinteractionsController::class . ':view')->add(PermissionMiddleware::class)->setName('pres_genericinteractions/view-pres_genericinteractions-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', PresGenericinteractionsController::class . ':edit')->add(PermissionMiddleware::class)->setName('pres_genericinteractions/edit-pres_genericinteractions-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', PresGenericinteractionsController::class . ':delete')->add(PermissionMiddleware::class)->setName('pres_genericinteractions/delete-pres_genericinteractions-delete-2'); // delete
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
            $group->any('/' . Config("LIST_ACTION") . '[/{Sno}]', PresIndicationstableController::class . ':list')->add(PermissionMiddleware::class)->setName('pres_indicationstable/list-pres_indicationstable-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{Sno}]', PresIndicationstableController::class . ':add')->add(PermissionMiddleware::class)->setName('pres_indicationstable/add-pres_indicationstable-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{Sno}]', PresIndicationstableController::class . ':view')->add(PermissionMiddleware::class)->setName('pres_indicationstable/view-pres_indicationstable-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{Sno}]', PresIndicationstableController::class . ':edit')->add(PermissionMiddleware::class)->setName('pres_indicationstable/edit-pres_indicationstable-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{Sno}]', PresIndicationstableController::class . ':delete')->add(PermissionMiddleware::class)->setName('pres_indicationstable/delete-pres_indicationstable-delete-2'); // delete
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', PresQuantityController::class . ':list')->add(PermissionMiddleware::class)->setName('pres_quantity/list-pres_quantity-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', PresQuantityController::class . ':add')->add(PermissionMiddleware::class)->setName('pres_quantity/add-pres_quantity-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', PresQuantityController::class . ':view')->add(PermissionMiddleware::class)->setName('pres_quantity/view-pres_quantity-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', PresQuantityController::class . ':edit')->add(PermissionMiddleware::class)->setName('pres_quantity/edit-pres_quantity-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', PresQuantityController::class . ':delete')->add(PermissionMiddleware::class)->setName('pres_quantity/delete-pres_quantity-delete-2'); // delete
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', PresRestricteddruglistController::class . ':list')->add(PermissionMiddleware::class)->setName('pres_restricteddruglist/list-pres_restricteddruglist-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', PresRestricteddruglistController::class . ':add')->add(PermissionMiddleware::class)->setName('pres_restricteddruglist/add-pres_restricteddruglist-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', PresRestricteddruglistController::class . ':view')->add(PermissionMiddleware::class)->setName('pres_restricteddruglist/view-pres_restricteddruglist-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', PresRestricteddruglistController::class . ':edit')->add(PermissionMiddleware::class)->setName('pres_restricteddruglist/edit-pres_restricteddruglist-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', PresRestricteddruglistController::class . ':delete')->add(PermissionMiddleware::class)->setName('pres_restricteddruglist/delete-pres_restricteddruglist-delete-2'); // delete
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
            $group->any('/' . Config("LIST_ACTION") . '[/{SNo}]', PresRoutesController::class . ':list')->add(PermissionMiddleware::class)->setName('pres_routes/list-pres_routes-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{SNo}]', PresRoutesController::class . ':add')->add(PermissionMiddleware::class)->setName('pres_routes/add-pres_routes-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{SNo}]', PresRoutesController::class . ':view')->add(PermissionMiddleware::class)->setName('pres_routes/view-pres_routes-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{SNo}]', PresRoutesController::class . ':edit')->add(PermissionMiddleware::class)->setName('pres_routes/edit-pres_routes-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{SNo}]', PresRoutesController::class . ':delete')->add(PermissionMiddleware::class)->setName('pres_routes/delete-pres_routes-delete-2'); // delete
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', PresMasGenericController::class . ':list')->add(PermissionMiddleware::class)->setName('pres_mas_generic/list-pres_mas_generic-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', PresMasGenericController::class . ':add')->add(PermissionMiddleware::class)->setName('pres_mas_generic/add-pres_mas_generic-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', PresMasGenericController::class . ':view')->add(PermissionMiddleware::class)->setName('pres_mas_generic/view-pres_mas_generic-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', PresMasGenericController::class . ':edit')->add(PermissionMiddleware::class)->setName('pres_mas_generic/edit-pres_mas_generic-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', PresMasGenericController::class . ':delete')->add(PermissionMiddleware::class)->setName('pres_mas_generic/delete-pres_mas_generic-delete-2'); // delete
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', PresMasUnitController::class . ':list')->add(PermissionMiddleware::class)->setName('pres_mas_unit/list-pres_mas_unit-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', PresMasUnitController::class . ':add')->add(PermissionMiddleware::class)->setName('pres_mas_unit/add-pres_mas_unit-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', PresMasUnitController::class . ':view')->add(PermissionMiddleware::class)->setName('pres_mas_unit/view-pres_mas_unit-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', PresMasUnitController::class . ':edit')->add(PermissionMiddleware::class)->setName('pres_mas_unit/edit-pres_mas_unit-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', PresMasUnitController::class . ':delete')->add(PermissionMiddleware::class)->setName('pres_mas_unit/delete-pres_mas_unit-delete-2'); // delete
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', PresMasFormsController::class . ':list')->add(PermissionMiddleware::class)->setName('pres_mas_forms/list-pres_mas_forms-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', PresMasFormsController::class . ':add')->add(PermissionMiddleware::class)->setName('pres_mas_forms/add-pres_mas_forms-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', PresMasFormsController::class . ':view')->add(PermissionMiddleware::class)->setName('pres_mas_forms/view-pres_mas_forms-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', PresMasFormsController::class . ':edit')->add(PermissionMiddleware::class)->setName('pres_mas_forms/edit-pres_mas_forms-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', PresMasFormsController::class . ':delete')->add(PermissionMiddleware::class)->setName('pres_mas_forms/delete-pres_mas_forms-delete-2'); // delete
        }
    );

    // pres_tradenames_new
    $app->any('/PresTradenamesNewList[/{ID}]', PresTradenamesNewController::class . ':list')->add(PermissionMiddleware::class)->setName('PresTradenamesNewList-pres_tradenames_new-list'); // list
    $app->any('/PresTradenamesNewAdd[/{ID}]', PresTradenamesNewController::class . ':add')->add(PermissionMiddleware::class)->setName('PresTradenamesNewAdd-pres_tradenames_new-add'); // add
    $app->any('/PresTradenamesNewAddopt', PresTradenamesNewController::class . ':addopt')->add(PermissionMiddleware::class)->setName('PresTradenamesNewAddopt-pres_tradenames_new-addopt'); // addopt
    $app->any('/PresTradenamesNewView[/{ID}]', PresTradenamesNewController::class . ':view')->add(PermissionMiddleware::class)->setName('PresTradenamesNewView-pres_tradenames_new-view'); // view
    $app->any('/PresTradenamesNewEdit[/{ID}]', PresTradenamesNewController::class . ':edit')->add(PermissionMiddleware::class)->setName('PresTradenamesNewEdit-pres_tradenames_new-edit'); // edit
    $app->any('/PresTradenamesNewDelete[/{ID}]', PresTradenamesNewController::class . ':delete')->add(PermissionMiddleware::class)->setName('PresTradenamesNewDelete-pres_tradenames_new-delete'); // delete
    $app->group(
        '/pres_tradenames_new',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{ID}]', PresTradenamesNewController::class . ':list')->add(PermissionMiddleware::class)->setName('pres_tradenames_new/list-pres_tradenames_new-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{ID}]', PresTradenamesNewController::class . ':add')->add(PermissionMiddleware::class)->setName('pres_tradenames_new/add-pres_tradenames_new-add-2'); // add
            $group->any('/' . Config("ADDOPT_ACTION") . '', PresTradenamesNewController::class . ':addopt')->add(PermissionMiddleware::class)->setName('pres_tradenames_new/addopt-pres_tradenames_new-addopt-2'); // addopt
            $group->any('/' . Config("VIEW_ACTION") . '[/{ID}]', PresTradenamesNewController::class . ':view')->add(PermissionMiddleware::class)->setName('pres_tradenames_new/view-pres_tradenames_new-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{ID}]', PresTradenamesNewController::class . ':edit')->add(PermissionMiddleware::class)->setName('pres_tradenames_new/edit-pres_tradenames_new-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{ID}]', PresTradenamesNewController::class . ':delete')->add(PermissionMiddleware::class)->setName('pres_tradenames_new/delete-pres_tradenames_new-delete-2'); // delete
        }
    );

    // pres_trade_combination_names_new
    $app->any('/PresTradeCombinationNamesNewList[/{ID}]', PresTradeCombinationNamesNewController::class . ':list')->add(PermissionMiddleware::class)->setName('PresTradeCombinationNamesNewList-pres_trade_combination_names_new-list'); // list
    $app->any('/PresTradeCombinationNamesNewAdd[/{ID}]', PresTradeCombinationNamesNewController::class . ':add')->add(PermissionMiddleware::class)->setName('PresTradeCombinationNamesNewAdd-pres_trade_combination_names_new-add'); // add
    $app->any('/PresTradeCombinationNamesNewView[/{ID}]', PresTradeCombinationNamesNewController::class . ':view')->add(PermissionMiddleware::class)->setName('PresTradeCombinationNamesNewView-pres_trade_combination_names_new-view'); // view
    $app->any('/PresTradeCombinationNamesNewEdit[/{ID}]', PresTradeCombinationNamesNewController::class . ':edit')->add(PermissionMiddleware::class)->setName('PresTradeCombinationNamesNewEdit-pres_trade_combination_names_new-edit'); // edit
    $app->any('/PresTradeCombinationNamesNewDelete[/{ID}]', PresTradeCombinationNamesNewController::class . ':delete')->add(PermissionMiddleware::class)->setName('PresTradeCombinationNamesNewDelete-pres_trade_combination_names_new-delete'); // delete
    $app->any('/PresTradeCombinationNamesNewPreview', PresTradeCombinationNamesNewController::class . ':preview')->add(PermissionMiddleware::class)->setName('PresTradeCombinationNamesNewPreview-pres_trade_combination_names_new-preview'); // preview
    $app->group(
        '/pres_trade_combination_names_new',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{ID}]', PresTradeCombinationNamesNewController::class . ':list')->add(PermissionMiddleware::class)->setName('pres_trade_combination_names_new/list-pres_trade_combination_names_new-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{ID}]', PresTradeCombinationNamesNewController::class . ':add')->add(PermissionMiddleware::class)->setName('pres_trade_combination_names_new/add-pres_trade_combination_names_new-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{ID}]', PresTradeCombinationNamesNewController::class . ':view')->add(PermissionMiddleware::class)->setName('pres_trade_combination_names_new/view-pres_trade_combination_names_new-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{ID}]', PresTradeCombinationNamesNewController::class . ':edit')->add(PermissionMiddleware::class)->setName('pres_trade_combination_names_new/edit-pres_trade_combination_names_new-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{ID}]', PresTradeCombinationNamesNewController::class . ':delete')->add(PermissionMiddleware::class)->setName('pres_trade_combination_names_new/delete-pres_trade_combination_names_new-delete-2'); // delete
            $group->any('/' . Config("PREVIEW_ACTION") . '', PresTradeCombinationNamesNewController::class . ':preview')->add(PermissionMiddleware::class)->setName('pres_trade_combination_names_new/preview-pres_trade_combination_names_new-preview-2'); // preview
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', PresSideeffectTableController::class . ':list')->add(PermissionMiddleware::class)->setName('pres_sideeffect_table/list-pres_sideeffect_table-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', PresSideeffectTableController::class . ':add')->add(PermissionMiddleware::class)->setName('pres_sideeffect_table/add-pres_sideeffect_table-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', PresSideeffectTableController::class . ':view')->add(PermissionMiddleware::class)->setName('pres_sideeffect_table/view-pres_sideeffect_table-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', PresSideeffectTableController::class . ':edit')->add(PermissionMiddleware::class)->setName('pres_sideeffect_table/edit-pres_sideeffect_table-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', PresSideeffectTableController::class . ':delete')->add(PermissionMiddleware::class)->setName('pres_sideeffect_table/delete-pres_sideeffect_table-delete-2'); // delete
        }
    );

    // pres_mas_timeoftaking
    $app->any('/PresMasTimeoftakingList[/{ID}]', PresMasTimeoftakingController::class . ':list')->add(PermissionMiddleware::class)->setName('PresMasTimeoftakingList-pres_mas_timeoftaking-list'); // list
    $app->any('/PresMasTimeoftakingAdd[/{ID}]', PresMasTimeoftakingController::class . ':add')->add(PermissionMiddleware::class)->setName('PresMasTimeoftakingAdd-pres_mas_timeoftaking-add'); // add
    $app->any('/PresMasTimeoftakingAddopt', PresMasTimeoftakingController::class . ':addopt')->add(PermissionMiddleware::class)->setName('PresMasTimeoftakingAddopt-pres_mas_timeoftaking-addopt'); // addopt
    $app->any('/PresMasTimeoftakingView[/{ID}]', PresMasTimeoftakingController::class . ':view')->add(PermissionMiddleware::class)->setName('PresMasTimeoftakingView-pres_mas_timeoftaking-view'); // view
    $app->any('/PresMasTimeoftakingEdit[/{ID}]', PresMasTimeoftakingController::class . ':edit')->add(PermissionMiddleware::class)->setName('PresMasTimeoftakingEdit-pres_mas_timeoftaking-edit'); // edit
    $app->any('/PresMasTimeoftakingDelete[/{ID}]', PresMasTimeoftakingController::class . ':delete')->add(PermissionMiddleware::class)->setName('PresMasTimeoftakingDelete-pres_mas_timeoftaking-delete'); // delete
    $app->group(
        '/pres_mas_timeoftaking',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{ID}]', PresMasTimeoftakingController::class . ':list')->add(PermissionMiddleware::class)->setName('pres_mas_timeoftaking/list-pres_mas_timeoftaking-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{ID}]', PresMasTimeoftakingController::class . ':add')->add(PermissionMiddleware::class)->setName('pres_mas_timeoftaking/add-pres_mas_timeoftaking-add-2'); // add
            $group->any('/' . Config("ADDOPT_ACTION") . '', PresMasTimeoftakingController::class . ':addopt')->add(PermissionMiddleware::class)->setName('pres_mas_timeoftaking/addopt-pres_mas_timeoftaking-addopt-2'); // addopt
            $group->any('/' . Config("VIEW_ACTION") . '[/{ID}]', PresMasTimeoftakingController::class . ':view')->add(PermissionMiddleware::class)->setName('pres_mas_timeoftaking/view-pres_mas_timeoftaking-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{ID}]', PresMasTimeoftakingController::class . ':edit')->add(PermissionMiddleware::class)->setName('pres_mas_timeoftaking/edit-pres_mas_timeoftaking-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{ID}]', PresMasTimeoftakingController::class . ':delete')->add(PermissionMiddleware::class)->setName('pres_mas_timeoftaking/delete-pres_mas_timeoftaking-delete-2'); // delete
        }
    );

    // pres_mas_route
    $app->any('/PresMasRouteList[/{ID}]', PresMasRouteController::class . ':list')->add(PermissionMiddleware::class)->setName('PresMasRouteList-pres_mas_route-list'); // list
    $app->any('/PresMasRouteAdd[/{ID}]', PresMasRouteController::class . ':add')->add(PermissionMiddleware::class)->setName('PresMasRouteAdd-pres_mas_route-add'); // add
    $app->any('/PresMasRouteAddopt', PresMasRouteController::class . ':addopt')->add(PermissionMiddleware::class)->setName('PresMasRouteAddopt-pres_mas_route-addopt'); // addopt
    $app->any('/PresMasRouteView[/{ID}]', PresMasRouteController::class . ':view')->add(PermissionMiddleware::class)->setName('PresMasRouteView-pres_mas_route-view'); // view
    $app->any('/PresMasRouteEdit[/{ID}]', PresMasRouteController::class . ':edit')->add(PermissionMiddleware::class)->setName('PresMasRouteEdit-pres_mas_route-edit'); // edit
    $app->any('/PresMasRouteDelete[/{ID}]', PresMasRouteController::class . ':delete')->add(PermissionMiddleware::class)->setName('PresMasRouteDelete-pres_mas_route-delete'); // delete
    $app->group(
        '/pres_mas_route',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{ID}]', PresMasRouteController::class . ':list')->add(PermissionMiddleware::class)->setName('pres_mas_route/list-pres_mas_route-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{ID}]', PresMasRouteController::class . ':add')->add(PermissionMiddleware::class)->setName('pres_mas_route/add-pres_mas_route-add-2'); // add
            $group->any('/' . Config("ADDOPT_ACTION") . '', PresMasRouteController::class . ':addopt')->add(PermissionMiddleware::class)->setName('pres_mas_route/addopt-pres_mas_route-addopt-2'); // addopt
            $group->any('/' . Config("VIEW_ACTION") . '[/{ID}]', PresMasRouteController::class . ':view')->add(PermissionMiddleware::class)->setName('pres_mas_route/view-pres_mas_route-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{ID}]', PresMasRouteController::class . ':edit')->add(PermissionMiddleware::class)->setName('pres_mas_route/edit-pres_mas_route-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{ID}]', PresMasRouteController::class . ':delete')->add(PermissionMiddleware::class)->setName('pres_mas_route/delete-pres_mas_route-delete-2'); // delete
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', PresMasStatusController::class . ':list')->add(PermissionMiddleware::class)->setName('pres_mas_status/list-pres_mas_status-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', PresMasStatusController::class . ':add')->add(PermissionMiddleware::class)->setName('pres_mas_status/add-pres_mas_status-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', PresMasStatusController::class . ':view')->add(PermissionMiddleware::class)->setName('pres_mas_status/view-pres_mas_status-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', PresMasStatusController::class . ':edit')->add(PermissionMiddleware::class)->setName('pres_mas_status/edit-pres_mas_status-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', PresMasStatusController::class . ':delete')->add(PermissionMiddleware::class)->setName('pres_mas_status/delete-pres_mas_status-delete-2'); // delete
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', PresTradenamesController::class . ':list')->add(PermissionMiddleware::class)->setName('pres_tradenames/list-pres_tradenames-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', PresTradenamesController::class . ':add')->add(PermissionMiddleware::class)->setName('pres_tradenames/add-pres_tradenames-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', PresTradenamesController::class . ':view')->add(PermissionMiddleware::class)->setName('pres_tradenames/view-pres_tradenames-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', PresTradenamesController::class . ':edit')->add(PermissionMiddleware::class)->setName('pres_tradenames/edit-pres_tradenames-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', PresTradenamesController::class . ':delete')->add(PermissionMiddleware::class)->setName('pres_tradenames/delete-pres_tradenames-delete-2'); // delete
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', PresTradeCombinationNamesController::class . ':list')->add(PermissionMiddleware::class)->setName('pres_trade_combination_names/list-pres_trade_combination_names-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', PresTradeCombinationNamesController::class . ':add')->add(PermissionMiddleware::class)->setName('pres_trade_combination_names/add-pres_trade_combination_names-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', PresTradeCombinationNamesController::class . ':view')->add(PermissionMiddleware::class)->setName('pres_trade_combination_names/view-pres_trade_combination_names-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', PresTradeCombinationNamesController::class . ':edit')->add(PermissionMiddleware::class)->setName('pres_trade_combination_names/edit-pres_trade_combination_names-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', PresTradeCombinationNamesController::class . ':delete')->add(PermissionMiddleware::class)->setName('pres_trade_combination_names/delete-pres_trade_combination_names-delete-2'); // delete
        }
    );

    // patient_vitals
    $app->any('/PatientVitalsList[/{id}]', PatientVitalsController::class . ':list')->add(PermissionMiddleware::class)->setName('PatientVitalsList-patient_vitals-list'); // list
    $app->any('/PatientVitalsAdd[/{id}]', PatientVitalsController::class . ':add')->add(PermissionMiddleware::class)->setName('PatientVitalsAdd-patient_vitals-add'); // add
    $app->any('/PatientVitalsView[/{id}]', PatientVitalsController::class . ':view')->add(PermissionMiddleware::class)->setName('PatientVitalsView-patient_vitals-view'); // view
    $app->any('/PatientVitalsEdit[/{id}]', PatientVitalsController::class . ':edit')->add(PermissionMiddleware::class)->setName('PatientVitalsEdit-patient_vitals-edit'); // edit
    $app->any('/PatientVitalsDelete[/{id}]', PatientVitalsController::class . ':delete')->add(PermissionMiddleware::class)->setName('PatientVitalsDelete-patient_vitals-delete'); // delete
    $app->any('/PatientVitalsSearch', PatientVitalsController::class . ':search')->add(PermissionMiddleware::class)->setName('PatientVitalsSearch-patient_vitals-search'); // search
    $app->any('/PatientVitalsPreview', PatientVitalsController::class . ':preview')->add(PermissionMiddleware::class)->setName('PatientVitalsPreview-patient_vitals-preview'); // preview
    $app->group(
        '/patient_vitals',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', PatientVitalsController::class . ':list')->add(PermissionMiddleware::class)->setName('patient_vitals/list-patient_vitals-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', PatientVitalsController::class . ':add')->add(PermissionMiddleware::class)->setName('patient_vitals/add-patient_vitals-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', PatientVitalsController::class . ':view')->add(PermissionMiddleware::class)->setName('patient_vitals/view-patient_vitals-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', PatientVitalsController::class . ':edit')->add(PermissionMiddleware::class)->setName('patient_vitals/edit-patient_vitals-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', PatientVitalsController::class . ':delete')->add(PermissionMiddleware::class)->setName('patient_vitals/delete-patient_vitals-delete-2'); // delete
            $group->any('/' . Config("SEARCH_ACTION") . '', PatientVitalsController::class . ':search')->add(PermissionMiddleware::class)->setName('patient_vitals/search-patient_vitals-search-2'); // search
            $group->any('/' . Config("PREVIEW_ACTION") . '', PatientVitalsController::class . ':preview')->add(PermissionMiddleware::class)->setName('patient_vitals/preview-patient_vitals-preview-2'); // preview
        }
    );

    // patient_opd_follow_up
    $app->any('/PatientOpdFollowUpList[/{id}]', PatientOpdFollowUpController::class . ':list')->add(PermissionMiddleware::class)->setName('PatientOpdFollowUpList-patient_opd_follow_up-list'); // list
    $app->any('/PatientOpdFollowUpAdd[/{id}]', PatientOpdFollowUpController::class . ':add')->add(PermissionMiddleware::class)->setName('PatientOpdFollowUpAdd-patient_opd_follow_up-add'); // add
    $app->any('/PatientOpdFollowUpView[/{id}]', PatientOpdFollowUpController::class . ':view')->add(PermissionMiddleware::class)->setName('PatientOpdFollowUpView-patient_opd_follow_up-view'); // view
    $app->any('/PatientOpdFollowUpEdit[/{id}]', PatientOpdFollowUpController::class . ':edit')->add(PermissionMiddleware::class)->setName('PatientOpdFollowUpEdit-patient_opd_follow_up-edit'); // edit
    $app->any('/PatientOpdFollowUpDelete[/{id}]', PatientOpdFollowUpController::class . ':delete')->add(PermissionMiddleware::class)->setName('PatientOpdFollowUpDelete-patient_opd_follow_up-delete'); // delete
    $app->any('/PatientOpdFollowUpSearch', PatientOpdFollowUpController::class . ':search')->add(PermissionMiddleware::class)->setName('PatientOpdFollowUpSearch-patient_opd_follow_up-search'); // search
    $app->group(
        '/patient_opd_follow_up',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', PatientOpdFollowUpController::class . ':list')->add(PermissionMiddleware::class)->setName('patient_opd_follow_up/list-patient_opd_follow_up-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', PatientOpdFollowUpController::class . ':add')->add(PermissionMiddleware::class)->setName('patient_opd_follow_up/add-patient_opd_follow_up-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', PatientOpdFollowUpController::class . ':view')->add(PermissionMiddleware::class)->setName('patient_opd_follow_up/view-patient_opd_follow_up-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', PatientOpdFollowUpController::class . ':edit')->add(PermissionMiddleware::class)->setName('patient_opd_follow_up/edit-patient_opd_follow_up-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', PatientOpdFollowUpController::class . ':delete')->add(PermissionMiddleware::class)->setName('patient_opd_follow_up/delete-patient_opd_follow_up-delete-2'); // delete
            $group->any('/' . Config("SEARCH_ACTION") . '', PatientOpdFollowUpController::class . ':search')->add(PermissionMiddleware::class)->setName('patient_opd_follow_up/search-patient_opd_follow_up-search-2'); // search
        }
    );

    // patient_history
    $app->any('/PatientHistoryList[/{id}]', PatientHistoryController::class . ':list')->add(PermissionMiddleware::class)->setName('PatientHistoryList-patient_history-list'); // list
    $app->any('/PatientHistoryAdd[/{id}]', PatientHistoryController::class . ':add')->add(PermissionMiddleware::class)->setName('PatientHistoryAdd-patient_history-add'); // add
    $app->any('/PatientHistoryView[/{id}]', PatientHistoryController::class . ':view')->add(PermissionMiddleware::class)->setName('PatientHistoryView-patient_history-view'); // view
    $app->any('/PatientHistoryEdit[/{id}]', PatientHistoryController::class . ':edit')->add(PermissionMiddleware::class)->setName('PatientHistoryEdit-patient_history-edit'); // edit
    $app->any('/PatientHistoryDelete[/{id}]', PatientHistoryController::class . ':delete')->add(PermissionMiddleware::class)->setName('PatientHistoryDelete-patient_history-delete'); // delete
    $app->any('/PatientHistorySearch', PatientHistoryController::class . ':search')->add(PermissionMiddleware::class)->setName('PatientHistorySearch-patient_history-search'); // search
    $app->any('/PatientHistoryPreview', PatientHistoryController::class . ':preview')->add(PermissionMiddleware::class)->setName('PatientHistoryPreview-patient_history-preview'); // preview
    $app->group(
        '/patient_history',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', PatientHistoryController::class . ':list')->add(PermissionMiddleware::class)->setName('patient_history/list-patient_history-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', PatientHistoryController::class . ':add')->add(PermissionMiddleware::class)->setName('patient_history/add-patient_history-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', PatientHistoryController::class . ':view')->add(PermissionMiddleware::class)->setName('patient_history/view-patient_history-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', PatientHistoryController::class . ':edit')->add(PermissionMiddleware::class)->setName('patient_history/edit-patient_history-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', PatientHistoryController::class . ':delete')->add(PermissionMiddleware::class)->setName('patient_history/delete-patient_history-delete-2'); // delete
            $group->any('/' . Config("SEARCH_ACTION") . '', PatientHistoryController::class . ':search')->add(PermissionMiddleware::class)->setName('patient_history/search-patient_history-search-2'); // search
            $group->any('/' . Config("PREVIEW_ACTION") . '', PatientHistoryController::class . ':preview')->add(PermissionMiddleware::class)->setName('patient_history/preview-patient_history-preview-2'); // preview
        }
    );

    // patient_final_diagnosis
    $app->any('/PatientFinalDiagnosisList[/{id}]', PatientFinalDiagnosisController::class . ':list')->add(PermissionMiddleware::class)->setName('PatientFinalDiagnosisList-patient_final_diagnosis-list'); // list
    $app->any('/PatientFinalDiagnosisAdd[/{id}]', PatientFinalDiagnosisController::class . ':add')->add(PermissionMiddleware::class)->setName('PatientFinalDiagnosisAdd-patient_final_diagnosis-add'); // add
    $app->any('/PatientFinalDiagnosisView[/{id}]', PatientFinalDiagnosisController::class . ':view')->add(PermissionMiddleware::class)->setName('PatientFinalDiagnosisView-patient_final_diagnosis-view'); // view
    $app->any('/PatientFinalDiagnosisEdit[/{id}]', PatientFinalDiagnosisController::class . ':edit')->add(PermissionMiddleware::class)->setName('PatientFinalDiagnosisEdit-patient_final_diagnosis-edit'); // edit
    $app->any('/PatientFinalDiagnosisDelete[/{id}]', PatientFinalDiagnosisController::class . ':delete')->add(PermissionMiddleware::class)->setName('PatientFinalDiagnosisDelete-patient_final_diagnosis-delete'); // delete
    $app->any('/PatientFinalDiagnosisPreview', PatientFinalDiagnosisController::class . ':preview')->add(PermissionMiddleware::class)->setName('PatientFinalDiagnosisPreview-patient_final_diagnosis-preview'); // preview
    $app->group(
        '/patient_final_diagnosis',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', PatientFinalDiagnosisController::class . ':list')->add(PermissionMiddleware::class)->setName('patient_final_diagnosis/list-patient_final_diagnosis-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', PatientFinalDiagnosisController::class . ':add')->add(PermissionMiddleware::class)->setName('patient_final_diagnosis/add-patient_final_diagnosis-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', PatientFinalDiagnosisController::class . ':view')->add(PermissionMiddleware::class)->setName('patient_final_diagnosis/view-patient_final_diagnosis-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', PatientFinalDiagnosisController::class . ':edit')->add(PermissionMiddleware::class)->setName('patient_final_diagnosis/edit-patient_final_diagnosis-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', PatientFinalDiagnosisController::class . ':delete')->add(PermissionMiddleware::class)->setName('patient_final_diagnosis/delete-patient_final_diagnosis-delete-2'); // delete
            $group->any('/' . Config("PREVIEW_ACTION") . '', PatientFinalDiagnosisController::class . ':preview')->add(PermissionMiddleware::class)->setName('patient_final_diagnosis/preview-patient_final_diagnosis-preview-2'); // preview
        }
    );

    // patient_follow_up
    $app->any('/PatientFollowUpList[/{id}]', PatientFollowUpController::class . ':list')->add(PermissionMiddleware::class)->setName('PatientFollowUpList-patient_follow_up-list'); // list
    $app->any('/PatientFollowUpAdd[/{id}]', PatientFollowUpController::class . ':add')->add(PermissionMiddleware::class)->setName('PatientFollowUpAdd-patient_follow_up-add'); // add
    $app->any('/PatientFollowUpView[/{id}]', PatientFollowUpController::class . ':view')->add(PermissionMiddleware::class)->setName('PatientFollowUpView-patient_follow_up-view'); // view
    $app->any('/PatientFollowUpEdit[/{id}]', PatientFollowUpController::class . ':edit')->add(PermissionMiddleware::class)->setName('PatientFollowUpEdit-patient_follow_up-edit'); // edit
    $app->any('/PatientFollowUpDelete[/{id}]', PatientFollowUpController::class . ':delete')->add(PermissionMiddleware::class)->setName('PatientFollowUpDelete-patient_follow_up-delete'); // delete
    $app->any('/PatientFollowUpPreview', PatientFollowUpController::class . ':preview')->add(PermissionMiddleware::class)->setName('PatientFollowUpPreview-patient_follow_up-preview'); // preview
    $app->group(
        '/patient_follow_up',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', PatientFollowUpController::class . ':list')->add(PermissionMiddleware::class)->setName('patient_follow_up/list-patient_follow_up-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', PatientFollowUpController::class . ':add')->add(PermissionMiddleware::class)->setName('patient_follow_up/add-patient_follow_up-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', PatientFollowUpController::class . ':view')->add(PermissionMiddleware::class)->setName('patient_follow_up/view-patient_follow_up-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', PatientFollowUpController::class . ':edit')->add(PermissionMiddleware::class)->setName('patient_follow_up/edit-patient_follow_up-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', PatientFollowUpController::class . ':delete')->add(PermissionMiddleware::class)->setName('patient_follow_up/delete-patient_follow_up-delete-2'); // delete
            $group->any('/' . Config("PREVIEW_ACTION") . '', PatientFollowUpController::class . ':preview')->add(PermissionMiddleware::class)->setName('patient_follow_up/preview-patient_follow_up-preview-2'); // preview
        }
    );

    // patient_investigations
    $app->any('/PatientInvestigationsList[/{id}]', PatientInvestigationsController::class . ':list')->add(PermissionMiddleware::class)->setName('PatientInvestigationsList-patient_investigations-list'); // list
    $app->any('/PatientInvestigationsAdd[/{id}]', PatientInvestigationsController::class . ':add')->add(PermissionMiddleware::class)->setName('PatientInvestigationsAdd-patient_investigations-add'); // add
    $app->any('/PatientInvestigationsView[/{id}]', PatientInvestigationsController::class . ':view')->add(PermissionMiddleware::class)->setName('PatientInvestigationsView-patient_investigations-view'); // view
    $app->any('/PatientInvestigationsEdit[/{id}]', PatientInvestigationsController::class . ':edit')->add(PermissionMiddleware::class)->setName('PatientInvestigationsEdit-patient_investigations-edit'); // edit
    $app->any('/PatientInvestigationsDelete[/{id}]', PatientInvestigationsController::class . ':delete')->add(PermissionMiddleware::class)->setName('PatientInvestigationsDelete-patient_investigations-delete'); // delete
    $app->any('/PatientInvestigationsPreview', PatientInvestigationsController::class . ':preview')->add(PermissionMiddleware::class)->setName('PatientInvestigationsPreview-patient_investigations-preview'); // preview
    $app->group(
        '/patient_investigations',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', PatientInvestigationsController::class . ':list')->add(PermissionMiddleware::class)->setName('patient_investigations/list-patient_investigations-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', PatientInvestigationsController::class . ':add')->add(PermissionMiddleware::class)->setName('patient_investigations/add-patient_investigations-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', PatientInvestigationsController::class . ':view')->add(PermissionMiddleware::class)->setName('patient_investigations/view-patient_investigations-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', PatientInvestigationsController::class . ':edit')->add(PermissionMiddleware::class)->setName('patient_investigations/edit-patient_investigations-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', PatientInvestigationsController::class . ':delete')->add(PermissionMiddleware::class)->setName('patient_investigations/delete-patient_investigations-delete-2'); // delete
            $group->any('/' . Config("PREVIEW_ACTION") . '', PatientInvestigationsController::class . ':preview')->add(PermissionMiddleware::class)->setName('patient_investigations/preview-patient_investigations-preview-2'); // preview
        }
    );

    // patient_ot_delivery_register
    $app->any('/PatientOtDeliveryRegisterList[/{id}]', PatientOtDeliveryRegisterController::class . ':list')->add(PermissionMiddleware::class)->setName('PatientOtDeliveryRegisterList-patient_ot_delivery_register-list'); // list
    $app->any('/PatientOtDeliveryRegisterAdd[/{id}]', PatientOtDeliveryRegisterController::class . ':add')->add(PermissionMiddleware::class)->setName('PatientOtDeliveryRegisterAdd-patient_ot_delivery_register-add'); // add
    $app->any('/PatientOtDeliveryRegisterView[/{id}]', PatientOtDeliveryRegisterController::class . ':view')->add(PermissionMiddleware::class)->setName('PatientOtDeliveryRegisterView-patient_ot_delivery_register-view'); // view
    $app->any('/PatientOtDeliveryRegisterEdit[/{id}]', PatientOtDeliveryRegisterController::class . ':edit')->add(PermissionMiddleware::class)->setName('PatientOtDeliveryRegisterEdit-patient_ot_delivery_register-edit'); // edit
    $app->any('/PatientOtDeliveryRegisterDelete[/{id}]', PatientOtDeliveryRegisterController::class . ':delete')->add(PermissionMiddleware::class)->setName('PatientOtDeliveryRegisterDelete-patient_ot_delivery_register-delete'); // delete
    $app->any('/PatientOtDeliveryRegisterPreview', PatientOtDeliveryRegisterController::class . ':preview')->add(PermissionMiddleware::class)->setName('PatientOtDeliveryRegisterPreview-patient_ot_delivery_register-preview'); // preview
    $app->group(
        '/patient_ot_delivery_register',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', PatientOtDeliveryRegisterController::class . ':list')->add(PermissionMiddleware::class)->setName('patient_ot_delivery_register/list-patient_ot_delivery_register-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', PatientOtDeliveryRegisterController::class . ':add')->add(PermissionMiddleware::class)->setName('patient_ot_delivery_register/add-patient_ot_delivery_register-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', PatientOtDeliveryRegisterController::class . ':view')->add(PermissionMiddleware::class)->setName('patient_ot_delivery_register/view-patient_ot_delivery_register-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', PatientOtDeliveryRegisterController::class . ':edit')->add(PermissionMiddleware::class)->setName('patient_ot_delivery_register/edit-patient_ot_delivery_register-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', PatientOtDeliveryRegisterController::class . ':delete')->add(PermissionMiddleware::class)->setName('patient_ot_delivery_register/delete-patient_ot_delivery_register-delete-2'); // delete
            $group->any('/' . Config("PREVIEW_ACTION") . '', PatientOtDeliveryRegisterController::class . ':preview')->add(PermissionMiddleware::class)->setName('patient_ot_delivery_register/preview-patient_ot_delivery_register-preview-2'); // preview
        }
    );

    // patient_prescription
    $app->any('/PatientPrescriptionList[/{id}]', PatientPrescriptionController::class . ':list')->add(PermissionMiddleware::class)->setName('PatientPrescriptionList-patient_prescription-list'); // list
    $app->any('/PatientPrescriptionAdd[/{id}]', PatientPrescriptionController::class . ':add')->add(PermissionMiddleware::class)->setName('PatientPrescriptionAdd-patient_prescription-add'); // add
    $app->any('/PatientPrescriptionView[/{id}]', PatientPrescriptionController::class . ':view')->add(PermissionMiddleware::class)->setName('PatientPrescriptionView-patient_prescription-view'); // view
    $app->any('/PatientPrescriptionEdit[/{id}]', PatientPrescriptionController::class . ':edit')->add(PermissionMiddleware::class)->setName('PatientPrescriptionEdit-patient_prescription-edit'); // edit
    $app->any('/PatientPrescriptionDelete[/{id}]', PatientPrescriptionController::class . ':delete')->add(PermissionMiddleware::class)->setName('PatientPrescriptionDelete-patient_prescription-delete'); // delete
    $app->any('/PatientPrescriptionSearch', PatientPrescriptionController::class . ':search')->add(PermissionMiddleware::class)->setName('PatientPrescriptionSearch-patient_prescription-search'); // search
    $app->any('/PatientPrescriptionPreview', PatientPrescriptionController::class . ':preview')->add(PermissionMiddleware::class)->setName('PatientPrescriptionPreview-patient_prescription-preview'); // preview
    $app->group(
        '/patient_prescription',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', PatientPrescriptionController::class . ':list')->add(PermissionMiddleware::class)->setName('patient_prescription/list-patient_prescription-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', PatientPrescriptionController::class . ':add')->add(PermissionMiddleware::class)->setName('patient_prescription/add-patient_prescription-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', PatientPrescriptionController::class . ':view')->add(PermissionMiddleware::class)->setName('patient_prescription/view-patient_prescription-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', PatientPrescriptionController::class . ':edit')->add(PermissionMiddleware::class)->setName('patient_prescription/edit-patient_prescription-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', PatientPrescriptionController::class . ':delete')->add(PermissionMiddleware::class)->setName('patient_prescription/delete-patient_prescription-delete-2'); // delete
            $group->any('/' . Config("SEARCH_ACTION") . '', PatientPrescriptionController::class . ':search')->add(PermissionMiddleware::class)->setName('patient_prescription/search-patient_prescription-search-2'); // search
            $group->any('/' . Config("PREVIEW_ACTION") . '', PatientPrescriptionController::class . ':preview')->add(PermissionMiddleware::class)->setName('patient_prescription/preview-patient_prescription-preview-2'); // preview
        }
    );

    // patient_provisional_diagnosis
    $app->any('/PatientProvisionalDiagnosisList[/{id}]', PatientProvisionalDiagnosisController::class . ':list')->add(PermissionMiddleware::class)->setName('PatientProvisionalDiagnosisList-patient_provisional_diagnosis-list'); // list
    $app->any('/PatientProvisionalDiagnosisAdd[/{id}]', PatientProvisionalDiagnosisController::class . ':add')->add(PermissionMiddleware::class)->setName('PatientProvisionalDiagnosisAdd-patient_provisional_diagnosis-add'); // add
    $app->any('/PatientProvisionalDiagnosisView[/{id}]', PatientProvisionalDiagnosisController::class . ':view')->add(PermissionMiddleware::class)->setName('PatientProvisionalDiagnosisView-patient_provisional_diagnosis-view'); // view
    $app->any('/PatientProvisionalDiagnosisEdit[/{id}]', PatientProvisionalDiagnosisController::class . ':edit')->add(PermissionMiddleware::class)->setName('PatientProvisionalDiagnosisEdit-patient_provisional_diagnosis-edit'); // edit
    $app->any('/PatientProvisionalDiagnosisDelete[/{id}]', PatientProvisionalDiagnosisController::class . ':delete')->add(PermissionMiddleware::class)->setName('PatientProvisionalDiagnosisDelete-patient_provisional_diagnosis-delete'); // delete
    $app->any('/PatientProvisionalDiagnosisPreview', PatientProvisionalDiagnosisController::class . ':preview')->add(PermissionMiddleware::class)->setName('PatientProvisionalDiagnosisPreview-patient_provisional_diagnosis-preview'); // preview
    $app->group(
        '/patient_provisional_diagnosis',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', PatientProvisionalDiagnosisController::class . ':list')->add(PermissionMiddleware::class)->setName('patient_provisional_diagnosis/list-patient_provisional_diagnosis-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', PatientProvisionalDiagnosisController::class . ':add')->add(PermissionMiddleware::class)->setName('patient_provisional_diagnosis/add-patient_provisional_diagnosis-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', PatientProvisionalDiagnosisController::class . ':view')->add(PermissionMiddleware::class)->setName('patient_provisional_diagnosis/view-patient_provisional_diagnosis-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', PatientProvisionalDiagnosisController::class . ':edit')->add(PermissionMiddleware::class)->setName('patient_provisional_diagnosis/edit-patient_provisional_diagnosis-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', PatientProvisionalDiagnosisController::class . ':delete')->add(PermissionMiddleware::class)->setName('patient_provisional_diagnosis/delete-patient_provisional_diagnosis-delete-2'); // delete
            $group->any('/' . Config("PREVIEW_ACTION") . '', PatientProvisionalDiagnosisController::class . ':preview')->add(PermissionMiddleware::class)->setName('patient_provisional_diagnosis/preview-patient_provisional_diagnosis-preview-2'); // preview
        }
    );

    // patient_services
    $app->any('/PatientServicesList[/{id}]', PatientServicesController::class . ':list')->add(PermissionMiddleware::class)->setName('PatientServicesList-patient_services-list'); // list
    $app->any('/PatientServicesView[/{id}]', PatientServicesController::class . ':view')->add(PermissionMiddleware::class)->setName('PatientServicesView-patient_services-view'); // view
    $app->any('/PatientServicesEdit[/{id}]', PatientServicesController::class . ':edit')->add(PermissionMiddleware::class)->setName('PatientServicesEdit-patient_services-edit'); // edit
    $app->any('/PatientServicesDelete[/{id}]', PatientServicesController::class . ':delete')->add(PermissionMiddleware::class)->setName('PatientServicesDelete-patient_services-delete'); // delete
    $app->any('/PatientServicesSearch', PatientServicesController::class . ':search')->add(PermissionMiddleware::class)->setName('PatientServicesSearch-patient_services-search'); // search
    $app->any('/PatientServicesPreview', PatientServicesController::class . ':preview')->add(PermissionMiddleware::class)->setName('PatientServicesPreview-patient_services-preview'); // preview
    $app->group(
        '/patient_services',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', PatientServicesController::class . ':list')->add(PermissionMiddleware::class)->setName('patient_services/list-patient_services-list-2'); // list
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', PatientServicesController::class . ':view')->add(PermissionMiddleware::class)->setName('patient_services/view-patient_services-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', PatientServicesController::class . ':edit')->add(PermissionMiddleware::class)->setName('patient_services/edit-patient_services-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', PatientServicesController::class . ':delete')->add(PermissionMiddleware::class)->setName('patient_services/delete-patient_services-delete-2'); // delete
            $group->any('/' . Config("SEARCH_ACTION") . '', PatientServicesController::class . ':search')->add(PermissionMiddleware::class)->setName('patient_services/search-patient_services-search-2'); // search
            $group->any('/' . Config("PREVIEW_ACTION") . '', PatientServicesController::class . ':preview')->add(PermissionMiddleware::class)->setName('patient_services/preview-patient_services-preview-2'); // preview
        }
    );

    // patient_insurance
    $app->any('/PatientInsuranceList[/{id}]', PatientInsuranceController::class . ':list')->add(PermissionMiddleware::class)->setName('PatientInsuranceList-patient_insurance-list'); // list
    $app->any('/PatientInsuranceAdd[/{id}]', PatientInsuranceController::class . ':add')->add(PermissionMiddleware::class)->setName('PatientInsuranceAdd-patient_insurance-add'); // add
    $app->any('/PatientInsuranceView[/{id}]', PatientInsuranceController::class . ':view')->add(PermissionMiddleware::class)->setName('PatientInsuranceView-patient_insurance-view'); // view
    $app->any('/PatientInsuranceEdit[/{id}]', PatientInsuranceController::class . ':edit')->add(PermissionMiddleware::class)->setName('PatientInsuranceEdit-patient_insurance-edit'); // edit
    $app->any('/PatientInsuranceDelete[/{id}]', PatientInsuranceController::class . ':delete')->add(PermissionMiddleware::class)->setName('PatientInsuranceDelete-patient_insurance-delete'); // delete
    $app->any('/PatientInsurancePreview', PatientInsuranceController::class . ':preview')->add(PermissionMiddleware::class)->setName('PatientInsurancePreview-patient_insurance-preview'); // preview
    $app->group(
        '/patient_insurance',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', PatientInsuranceController::class . ':list')->add(PermissionMiddleware::class)->setName('patient_insurance/list-patient_insurance-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', PatientInsuranceController::class . ':add')->add(PermissionMiddleware::class)->setName('patient_insurance/add-patient_insurance-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', PatientInsuranceController::class . ':view')->add(PermissionMiddleware::class)->setName('patient_insurance/view-patient_insurance-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', PatientInsuranceController::class . ':edit')->add(PermissionMiddleware::class)->setName('patient_insurance/edit-patient_insurance-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', PatientInsuranceController::class . ':delete')->add(PermissionMiddleware::class)->setName('patient_insurance/delete-patient_insurance-delete-2'); // delete
            $group->any('/' . Config("PREVIEW_ACTION") . '', PatientInsuranceController::class . ':preview')->add(PermissionMiddleware::class)->setName('patient_insurance/preview-patient_insurance-preview-2'); // preview
        }
    );

    // patient_ot_surgery_register
    $app->any('/PatientOtSurgeryRegisterList[/{id}]', PatientOtSurgeryRegisterController::class . ':list')->add(PermissionMiddleware::class)->setName('PatientOtSurgeryRegisterList-patient_ot_surgery_register-list'); // list
    $app->any('/PatientOtSurgeryRegisterAdd[/{id}]', PatientOtSurgeryRegisterController::class . ':add')->add(PermissionMiddleware::class)->setName('PatientOtSurgeryRegisterAdd-patient_ot_surgery_register-add'); // add
    $app->any('/PatientOtSurgeryRegisterView[/{id}]', PatientOtSurgeryRegisterController::class . ':view')->add(PermissionMiddleware::class)->setName('PatientOtSurgeryRegisterView-patient_ot_surgery_register-view'); // view
    $app->any('/PatientOtSurgeryRegisterEdit[/{id}]', PatientOtSurgeryRegisterController::class . ':edit')->add(PermissionMiddleware::class)->setName('PatientOtSurgeryRegisterEdit-patient_ot_surgery_register-edit'); // edit
    $app->any('/PatientOtSurgeryRegisterDelete[/{id}]', PatientOtSurgeryRegisterController::class . ':delete')->add(PermissionMiddleware::class)->setName('PatientOtSurgeryRegisterDelete-patient_ot_surgery_register-delete'); // delete
    $app->any('/PatientOtSurgeryRegisterPreview', PatientOtSurgeryRegisterController::class . ':preview')->add(PermissionMiddleware::class)->setName('PatientOtSurgeryRegisterPreview-patient_ot_surgery_register-preview'); // preview
    $app->group(
        '/patient_ot_surgery_register',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', PatientOtSurgeryRegisterController::class . ':list')->add(PermissionMiddleware::class)->setName('patient_ot_surgery_register/list-patient_ot_surgery_register-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', PatientOtSurgeryRegisterController::class . ':add')->add(PermissionMiddleware::class)->setName('patient_ot_surgery_register/add-patient_ot_surgery_register-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', PatientOtSurgeryRegisterController::class . ':view')->add(PermissionMiddleware::class)->setName('patient_ot_surgery_register/view-patient_ot_surgery_register-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', PatientOtSurgeryRegisterController::class . ':edit')->add(PermissionMiddleware::class)->setName('patient_ot_surgery_register/edit-patient_ot_surgery_register-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', PatientOtSurgeryRegisterController::class . ':delete')->add(PermissionMiddleware::class)->setName('patient_ot_surgery_register/delete-patient_ot_surgery_register-delete-2'); // delete
            $group->any('/' . Config("PREVIEW_ACTION") . '', PatientOtSurgeryRegisterController::class . ':preview')->add(PermissionMiddleware::class)->setName('patient_ot_surgery_register/preview-patient_ot_surgery_register-preview-2'); // preview
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', LabMasSampletypeController::class . ':list')->add(PermissionMiddleware::class)->setName('lab_mas_sampletype/list-lab_mas_sampletype-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', LabMasSampletypeController::class . ':add')->add(PermissionMiddleware::class)->setName('lab_mas_sampletype/add-lab_mas_sampletype-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', LabMasSampletypeController::class . ':view')->add(PermissionMiddleware::class)->setName('lab_mas_sampletype/view-lab_mas_sampletype-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', LabMasSampletypeController::class . ':edit')->add(PermissionMiddleware::class)->setName('lab_mas_sampletype/edit-lab_mas_sampletype-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', LabMasSampletypeController::class . ':delete')->add(PermissionMiddleware::class)->setName('lab_mas_sampletype/delete-lab_mas_sampletype-delete-2'); // delete
        }
    );

    // mas_bloodgroup
    $app->any('/MasBloodgroupList[/{id}]', MasBloodgroupController::class . ':list')->add(PermissionMiddleware::class)->setName('MasBloodgroupList-mas_bloodgroup-list'); // list
    $app->any('/MasBloodgroupAdd[/{id}]', MasBloodgroupController::class . ':add')->add(PermissionMiddleware::class)->setName('MasBloodgroupAdd-mas_bloodgroup-add'); // add
    $app->any('/MasBloodgroupAddopt', MasBloodgroupController::class . ':addopt')->add(PermissionMiddleware::class)->setName('MasBloodgroupAddopt-mas_bloodgroup-addopt'); // addopt
    $app->any('/MasBloodgroupView[/{id}]', MasBloodgroupController::class . ':view')->add(PermissionMiddleware::class)->setName('MasBloodgroupView-mas_bloodgroup-view'); // view
    $app->any('/MasBloodgroupEdit[/{id}]', MasBloodgroupController::class . ':edit')->add(PermissionMiddleware::class)->setName('MasBloodgroupEdit-mas_bloodgroup-edit'); // edit
    $app->any('/MasBloodgroupDelete[/{id}]', MasBloodgroupController::class . ':delete')->add(PermissionMiddleware::class)->setName('MasBloodgroupDelete-mas_bloodgroup-delete'); // delete
    $app->group(
        '/mas_bloodgroup',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', MasBloodgroupController::class . ':list')->add(PermissionMiddleware::class)->setName('mas_bloodgroup/list-mas_bloodgroup-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', MasBloodgroupController::class . ':add')->add(PermissionMiddleware::class)->setName('mas_bloodgroup/add-mas_bloodgroup-add-2'); // add
            $group->any('/' . Config("ADDOPT_ACTION") . '', MasBloodgroupController::class . ':addopt')->add(PermissionMiddleware::class)->setName('mas_bloodgroup/addopt-mas_bloodgroup-addopt-2'); // addopt
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', MasBloodgroupController::class . ':view')->add(PermissionMiddleware::class)->setName('mas_bloodgroup/view-mas_bloodgroup-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', MasBloodgroupController::class . ':edit')->add(PermissionMiddleware::class)->setName('mas_bloodgroup/edit-mas_bloodgroup-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', MasBloodgroupController::class . ':delete')->add(PermissionMiddleware::class)->setName('mas_bloodgroup/delete-mas_bloodgroup-delete-2'); // delete
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', MasJobController::class . ':list')->add(PermissionMiddleware::class)->setName('mas_job/list-mas_job-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', MasJobController::class . ':add')->add(PermissionMiddleware::class)->setName('mas_job/add-mas_job-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', MasJobController::class . ':view')->add(PermissionMiddleware::class)->setName('mas_job/view-mas_job-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', MasJobController::class . ':edit')->add(PermissionMiddleware::class)->setName('mas_job/edit-mas_job-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', MasJobController::class . ':delete')->add(PermissionMiddleware::class)->setName('mas_job/delete-mas_job-delete-2'); // delete
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', MasLanguageController::class . ':list')->add(PermissionMiddleware::class)->setName('mas_language/list-mas_language-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', MasLanguageController::class . ':add')->add(PermissionMiddleware::class)->setName('mas_language/add-mas_language-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', MasLanguageController::class . ':view')->add(PermissionMiddleware::class)->setName('mas_language/view-mas_language-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', MasLanguageController::class . ':edit')->add(PermissionMiddleware::class)->setName('mas_language/edit-mas_language-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', MasLanguageController::class . ':delete')->add(PermissionMiddleware::class)->setName('mas_language/delete-mas_language-delete-2'); // delete
        }
    );

    // view_patient_discharge_summary
    $app->any('/ViewPatientDischargeSummaryList[/{id}]', ViewPatientDischargeSummaryController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewPatientDischargeSummaryList-view_patient_discharge_summary-list'); // list
    $app->any('/ViewPatientDischargeSummaryView[/{id}]', ViewPatientDischargeSummaryController::class . ':view')->add(PermissionMiddleware::class)->setName('ViewPatientDischargeSummaryView-view_patient_discharge_summary-view'); // view
    $app->group(
        '/view_patient_discharge_summary',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', ViewPatientDischargeSummaryController::class . ':list')->add(PermissionMiddleware::class)->setName('view_patient_discharge_summary/list-view_patient_discharge_summary-list-2'); // list
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', ViewPatientDischargeSummaryController::class . ':view')->add(PermissionMiddleware::class)->setName('view_patient_discharge_summary/view-view_patient_discharge_summary-view-2'); // view
        }
    );

    // mas_marital_status
    $app->any('/MasMaritalStatusList[/{id}]', MasMaritalStatusController::class . ':list')->add(PermissionMiddleware::class)->setName('MasMaritalStatusList-mas_marital_status-list'); // list
    $app->any('/MasMaritalStatusAdd[/{id}]', MasMaritalStatusController::class . ':add')->add(PermissionMiddleware::class)->setName('MasMaritalStatusAdd-mas_marital_status-add'); // add
    $app->group(
        '/mas_marital_status',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', MasMaritalStatusController::class . ':list')->add(PermissionMiddleware::class)->setName('mas_marital_status/list-mas_marital_status-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', MasMaritalStatusController::class . ':add')->add(PermissionMiddleware::class)->setName('mas_marital_status/add-mas_marital_status-add-2'); // add
        }
    );

    // view_patient_billing
    $app->any('/ViewPatientBillingList[/{id}]', ViewPatientBillingController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewPatientBillingList-view_patient_billing-list'); // list
    $app->group(
        '/view_patient_billing',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', ViewPatientBillingController::class . ':list')->add(PermissionMiddleware::class)->setName('view_patient_billing/list-view_patient_billing-list-2'); // list
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', MasWhereDidyouHearController::class . ':list')->add(PermissionMiddleware::class)->setName('mas_where_didyou_hear/list-mas_where_didyou_hear-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', MasWhereDidyouHearController::class . ':add')->add(PermissionMiddleware::class)->setName('mas_where_didyou_hear/add-mas_where_didyou_hear-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', MasWhereDidyouHearController::class . ':view')->add(PermissionMiddleware::class)->setName('mas_where_didyou_hear/view-mas_where_didyou_hear-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', MasWhereDidyouHearController::class . ':edit')->add(PermissionMiddleware::class)->setName('mas_where_didyou_hear/edit-mas_where_didyou_hear-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', MasWhereDidyouHearController::class . ':delete')->add(PermissionMiddleware::class)->setName('mas_where_didyou_hear/delete-mas_where_didyou_hear-delete-2'); // delete
        }
    );

    // mas_user_template
    $app->any('/MasUserTemplateList[/{id}]', MasUserTemplateController::class . ':list')->add(PermissionMiddleware::class)->setName('MasUserTemplateList-mas_user_template-list'); // list
    $app->any('/MasUserTemplateAdd[/{id}]', MasUserTemplateController::class . ':add')->add(PermissionMiddleware::class)->setName('MasUserTemplateAdd-mas_user_template-add'); // add
    $app->any('/MasUserTemplateAddopt', MasUserTemplateController::class . ':addopt')->add(PermissionMiddleware::class)->setName('MasUserTemplateAddopt-mas_user_template-addopt'); // addopt
    $app->any('/MasUserTemplateView[/{id}]', MasUserTemplateController::class . ':view')->add(PermissionMiddleware::class)->setName('MasUserTemplateView-mas_user_template-view'); // view
    $app->any('/MasUserTemplateEdit[/{id}]', MasUserTemplateController::class . ':edit')->add(PermissionMiddleware::class)->setName('MasUserTemplateEdit-mas_user_template-edit'); // edit
    $app->any('/MasUserTemplateDelete[/{id}]', MasUserTemplateController::class . ':delete')->add(PermissionMiddleware::class)->setName('MasUserTemplateDelete-mas_user_template-delete'); // delete
    $app->group(
        '/mas_user_template',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', MasUserTemplateController::class . ':list')->add(PermissionMiddleware::class)->setName('mas_user_template/list-mas_user_template-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', MasUserTemplateController::class . ':add')->add(PermissionMiddleware::class)->setName('mas_user_template/add-mas_user_template-add-2'); // add
            $group->any('/' . Config("ADDOPT_ACTION") . '', MasUserTemplateController::class . ':addopt')->add(PermissionMiddleware::class)->setName('mas_user_template/addopt-mas_user_template-addopt-2'); // addopt
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', MasUserTemplateController::class . ':view')->add(PermissionMiddleware::class)->setName('mas_user_template/view-mas_user_template-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', MasUserTemplateController::class . ':edit')->add(PermissionMiddleware::class)->setName('mas_user_template/edit-mas_user_template-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', MasUserTemplateController::class . ':delete')->add(PermissionMiddleware::class)->setName('mas_user_template/delete-mas_user_template-delete-2'); // delete
        }
    );

    // appointment_scheduler2
    $app->any('/AppointmentScheduler2[/{params:.*}]', AppointmentScheduler2Controller::class)->add(PermissionMiddleware::class)->setName('AppointmentScheduler2-appointment_scheduler2-custom'); // custom

    // mas_template_type
    $app->any('/MasTemplateTypeList[/{id}]', MasTemplateTypeController::class . ':list')->add(PermissionMiddleware::class)->setName('MasTemplateTypeList-mas_template_type-list'); // list
    $app->any('/MasTemplateTypeAdd[/{id}]', MasTemplateTypeController::class . ':add')->add(PermissionMiddleware::class)->setName('MasTemplateTypeAdd-mas_template_type-add'); // add
    $app->any('/MasTemplateTypeAddopt', MasTemplateTypeController::class . ':addopt')->add(PermissionMiddleware::class)->setName('MasTemplateTypeAddopt-mas_template_type-addopt'); // addopt
    $app->any('/MasTemplateTypeView[/{id}]', MasTemplateTypeController::class . ':view')->add(PermissionMiddleware::class)->setName('MasTemplateTypeView-mas_template_type-view'); // view
    $app->any('/MasTemplateTypeEdit[/{id}]', MasTemplateTypeController::class . ':edit')->add(PermissionMiddleware::class)->setName('MasTemplateTypeEdit-mas_template_type-edit'); // edit
    $app->any('/MasTemplateTypeDelete[/{id}]', MasTemplateTypeController::class . ':delete')->add(PermissionMiddleware::class)->setName('MasTemplateTypeDelete-mas_template_type-delete'); // delete
    $app->group(
        '/mas_template_type',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', MasTemplateTypeController::class . ':list')->add(PermissionMiddleware::class)->setName('mas_template_type/list-mas_template_type-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', MasTemplateTypeController::class . ':add')->add(PermissionMiddleware::class)->setName('mas_template_type/add-mas_template_type-add-2'); // add
            $group->any('/' . Config("ADDOPT_ACTION") . '', MasTemplateTypeController::class . ':addopt')->add(PermissionMiddleware::class)->setName('mas_template_type/addopt-mas_template_type-addopt-2'); // addopt
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', MasTemplateTypeController::class . ':view')->add(PermissionMiddleware::class)->setName('mas_template_type/view-mas_template_type-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', MasTemplateTypeController::class . ':edit')->add(PermissionMiddleware::class)->setName('mas_template_type/edit-mas_template_type-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', MasTemplateTypeController::class . ':delete')->add(PermissionMiddleware::class)->setName('mas_template_type/delete-mas_template_type-delete-2'); // delete
        }
    );

    // view_follow_up
    $app->any('/ViewFollowUpList[/{id}]', ViewFollowUpController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewFollowUpList-view_follow_up-list'); // list
    $app->group(
        '/view_follow_up',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', ViewFollowUpController::class . ':list')->add(PermissionMiddleware::class)->setName('view_follow_up/list-view_follow_up-list-2'); // list
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', BillingOtherVoucherController::class . ':list')->add(PermissionMiddleware::class)->setName('billing_other_voucher/list-billing_other_voucher-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', BillingOtherVoucherController::class . ':add')->add(PermissionMiddleware::class)->setName('billing_other_voucher/add-billing_other_voucher-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', BillingOtherVoucherController::class . ':view')->add(PermissionMiddleware::class)->setName('billing_other_voucher/view-billing_other_voucher-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', BillingOtherVoucherController::class . ':edit')->add(PermissionMiddleware::class)->setName('billing_other_voucher/edit-billing_other_voucher-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', BillingOtherVoucherController::class . ':delete')->add(PermissionMiddleware::class)->setName('billing_other_voucher/delete-billing_other_voucher-delete-2'); // delete
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', BillingVoucherController::class . ':list')->add(PermissionMiddleware::class)->setName('billing_voucher/list-billing_voucher-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', BillingVoucherController::class . ':add')->add(PermissionMiddleware::class)->setName('billing_voucher/add-billing_voucher-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', BillingVoucherController::class . ':view')->add(PermissionMiddleware::class)->setName('billing_voucher/view-billing_voucher-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', BillingVoucherController::class . ':edit')->add(PermissionMiddleware::class)->setName('billing_voucher/edit-billing_voucher-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', BillingVoucherController::class . ':delete')->add(PermissionMiddleware::class)->setName('billing_voucher/delete-billing_voucher-delete-2'); // delete
        }
    );

    // appointment_scheduler
    $app->any('/AppointmentSchedulerList[/{id}]', AppointmentSchedulerController::class . ':list')->add(PermissionMiddleware::class)->setName('AppointmentSchedulerList-appointment_scheduler-list'); // list
    $app->any('/AppointmentSchedulerAdd[/{id}]', AppointmentSchedulerController::class . ':add')->add(PermissionMiddleware::class)->setName('AppointmentSchedulerAdd-appointment_scheduler-add'); // add
    $app->any('/AppointmentSchedulerView[/{id}]', AppointmentSchedulerController::class . ':view')->add(PermissionMiddleware::class)->setName('AppointmentSchedulerView-appointment_scheduler-view'); // view
    $app->any('/AppointmentSchedulerEdit[/{id}]', AppointmentSchedulerController::class . ':edit')->add(PermissionMiddleware::class)->setName('AppointmentSchedulerEdit-appointment_scheduler-edit'); // edit
    $app->any('/AppointmentSchedulerDelete[/{id}]', AppointmentSchedulerController::class . ':delete')->add(PermissionMiddleware::class)->setName('AppointmentSchedulerDelete-appointment_scheduler-delete'); // delete
    $app->any('/AppointmentSchedulerPreview', AppointmentSchedulerController::class . ':preview')->add(PermissionMiddleware::class)->setName('AppointmentSchedulerPreview-appointment_scheduler-preview'); // preview
    $app->group(
        '/appointment_scheduler',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', AppointmentSchedulerController::class . ':list')->add(PermissionMiddleware::class)->setName('appointment_scheduler/list-appointment_scheduler-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', AppointmentSchedulerController::class . ':add')->add(PermissionMiddleware::class)->setName('appointment_scheduler/add-appointment_scheduler-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', AppointmentSchedulerController::class . ':view')->add(PermissionMiddleware::class)->setName('appointment_scheduler/view-appointment_scheduler-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', AppointmentSchedulerController::class . ':edit')->add(PermissionMiddleware::class)->setName('appointment_scheduler/edit-appointment_scheduler-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', AppointmentSchedulerController::class . ':delete')->add(PermissionMiddleware::class)->setName('appointment_scheduler/delete-appointment_scheduler-delete-2'); // delete
            $group->any('/' . Config("PREVIEW_ACTION") . '', AppointmentSchedulerController::class . ':preview')->add(PermissionMiddleware::class)->setName('appointment_scheduler/preview-appointment_scheduler-preview-2'); // preview
        }
    );

    // view_activity_card
    $app->any('/ViewActivityCardList[/{id}]', ViewActivityCardController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewActivityCardList-view_activity_card-list'); // list
    $app->group(
        '/view_activity_card',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', ViewActivityCardController::class . ':list')->add(PermissionMiddleware::class)->setName('view_activity_card/list-view_activity_card-list-2'); // list
        }
    );

    // activitycard
    $app->any('/Activitycard[/{params:.*}]', ActivitycardController::class)->add(PermissionMiddleware::class)->setName('Activitycard-activitycard-custom'); // custom

    // mas_user_template_prescription
    $app->any('/MasUserTemplatePrescriptionList[/{id}]', MasUserTemplatePrescriptionController::class . ':list')->add(PermissionMiddleware::class)->setName('MasUserTemplatePrescriptionList-mas_user_template_prescription-list'); // list
    $app->any('/MasUserTemplatePrescriptionAdd[/{id}]', MasUserTemplatePrescriptionController::class . ':add')->add(PermissionMiddleware::class)->setName('MasUserTemplatePrescriptionAdd-mas_user_template_prescription-add'); // add
    $app->any('/MasUserTemplatePrescriptionView[/{id}]', MasUserTemplatePrescriptionController::class . ':view')->add(PermissionMiddleware::class)->setName('MasUserTemplatePrescriptionView-mas_user_template_prescription-view'); // view
    $app->any('/MasUserTemplatePrescriptionEdit[/{id}]', MasUserTemplatePrescriptionController::class . ':edit')->add(PermissionMiddleware::class)->setName('MasUserTemplatePrescriptionEdit-mas_user_template_prescription-edit'); // edit
    $app->any('/MasUserTemplatePrescriptionDelete[/{id}]', MasUserTemplatePrescriptionController::class . ':delete')->add(PermissionMiddleware::class)->setName('MasUserTemplatePrescriptionDelete-mas_user_template_prescription-delete'); // delete
    $app->group(
        '/mas_user_template_prescription',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', MasUserTemplatePrescriptionController::class . ':list')->add(PermissionMiddleware::class)->setName('mas_user_template_prescription/list-mas_user_template_prescription-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', MasUserTemplatePrescriptionController::class . ':add')->add(PermissionMiddleware::class)->setName('mas_user_template_prescription/add-mas_user_template_prescription-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', MasUserTemplatePrescriptionController::class . ':view')->add(PermissionMiddleware::class)->setName('mas_user_template_prescription/view-mas_user_template_prescription-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', MasUserTemplatePrescriptionController::class . ':edit')->add(PermissionMiddleware::class)->setName('mas_user_template_prescription/edit-mas_user_template_prescription-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', MasUserTemplatePrescriptionController::class . ':delete')->add(PermissionMiddleware::class)->setName('mas_user_template_prescription/delete-mas_user_template_prescription-delete-2'); // delete
        }
    );

    // mas_template_prescription_type
    $app->any('/MasTemplatePrescriptionTypeList[/{id}]', MasTemplatePrescriptionTypeController::class . ':list')->add(PermissionMiddleware::class)->setName('MasTemplatePrescriptionTypeList-mas_template_prescription_type-list'); // list
    $app->any('/MasTemplatePrescriptionTypeAdd[/{id}]', MasTemplatePrescriptionTypeController::class . ':add')->add(PermissionMiddleware::class)->setName('MasTemplatePrescriptionTypeAdd-mas_template_prescription_type-add'); // add
    $app->any('/MasTemplatePrescriptionTypeAddopt', MasTemplatePrescriptionTypeController::class . ':addopt')->add(PermissionMiddleware::class)->setName('MasTemplatePrescriptionTypeAddopt-mas_template_prescription_type-addopt'); // addopt
    $app->any('/MasTemplatePrescriptionTypeView[/{id}]', MasTemplatePrescriptionTypeController::class . ':view')->add(PermissionMiddleware::class)->setName('MasTemplatePrescriptionTypeView-mas_template_prescription_type-view'); // view
    $app->any('/MasTemplatePrescriptionTypeEdit[/{id}]', MasTemplatePrescriptionTypeController::class . ':edit')->add(PermissionMiddleware::class)->setName('MasTemplatePrescriptionTypeEdit-mas_template_prescription_type-edit'); // edit
    $app->any('/MasTemplatePrescriptionTypeDelete[/{id}]', MasTemplatePrescriptionTypeController::class . ':delete')->add(PermissionMiddleware::class)->setName('MasTemplatePrescriptionTypeDelete-mas_template_prescription_type-delete'); // delete
    $app->group(
        '/mas_template_prescription_type',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', MasTemplatePrescriptionTypeController::class . ':list')->add(PermissionMiddleware::class)->setName('mas_template_prescription_type/list-mas_template_prescription_type-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', MasTemplatePrescriptionTypeController::class . ':add')->add(PermissionMiddleware::class)->setName('mas_template_prescription_type/add-mas_template_prescription_type-add-2'); // add
            $group->any('/' . Config("ADDOPT_ACTION") . '', MasTemplatePrescriptionTypeController::class . ':addopt')->add(PermissionMiddleware::class)->setName('mas_template_prescription_type/addopt-mas_template_prescription_type-addopt-2'); // addopt
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', MasTemplatePrescriptionTypeController::class . ':view')->add(PermissionMiddleware::class)->setName('mas_template_prescription_type/view-mas_template_prescription_type-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', MasTemplatePrescriptionTypeController::class . ':edit')->add(PermissionMiddleware::class)->setName('mas_template_prescription_type/edit-mas_template_prescription_type-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', MasTemplatePrescriptionTypeController::class . ':delete')->add(PermissionMiddleware::class)->setName('mas_template_prescription_type/delete-mas_template_prescription_type-delete-2'); // delete
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', MasActivityCardController::class . ':list')->add(PermissionMiddleware::class)->setName('mas_activity_card/list-mas_activity_card-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', MasActivityCardController::class . ':add')->add(PermissionMiddleware::class)->setName('mas_activity_card/add-mas_activity_card-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', MasActivityCardController::class . ':view')->add(PermissionMiddleware::class)->setName('mas_activity_card/view-mas_activity_card-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', MasActivityCardController::class . ':edit')->add(PermissionMiddleware::class)->setName('mas_activity_card/edit-mas_activity_card-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', MasActivityCardController::class . ':delete')->add(PermissionMiddleware::class)->setName('mas_activity_card/delete-mas_activity_card-delete-2'); // delete
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', SysDaysController::class . ':list')->add(PermissionMiddleware::class)->setName('sys_days/list-sys_days-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', SysDaysController::class . ':add')->add(PermissionMiddleware::class)->setName('sys_days/add-sys_days-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', SysDaysController::class . ':view')->add(PermissionMiddleware::class)->setName('sys_days/view-sys_days-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', SysDaysController::class . ':edit')->add(PermissionMiddleware::class)->setName('sys_days/edit-sys_days-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', SysDaysController::class . ':delete')->add(PermissionMiddleware::class)->setName('sys_days/delete-sys_days-delete-2'); // delete
        }
    );

    // appointment_sch_api
    $app->any('/AppointmentSchApi[/{params:.*}]', AppointmentSchApiController::class)->add(PermissionMiddleware::class)->setName('AppointmentSchApi-appointment_sch_api-custom'); // custom

    // procedurelistcal
    $app->any('/Procedurelistcal[/{params:.*}]', ProcedurelistcalController::class)->add(PermissionMiddleware::class)->setName('Procedurelistcal-procedurelistcal-custom'); // custom

    // view_appointment_scheduler
    $app->any('/ViewAppointmentSchedulerList[/{id}]', ViewAppointmentSchedulerController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewAppointmentSchedulerList-view_appointment_scheduler-list'); // list
    $app->any('/ViewAppointmentSchedulerAdd[/{id}]', ViewAppointmentSchedulerController::class . ':add')->add(PermissionMiddleware::class)->setName('ViewAppointmentSchedulerAdd-view_appointment_scheduler-add'); // add
    $app->any('/ViewAppointmentSchedulerUpdate', ViewAppointmentSchedulerController::class . ':update')->add(PermissionMiddleware::class)->setName('ViewAppointmentSchedulerUpdate-view_appointment_scheduler-update'); // update
    $app->any('/ViewAppointmentSchedulerSearch', ViewAppointmentSchedulerController::class . ':search')->add(PermissionMiddleware::class)->setName('ViewAppointmentSchedulerSearch-view_appointment_scheduler-search'); // search
    $app->group(
        '/view_appointment_scheduler',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', ViewAppointmentSchedulerController::class . ':list')->add(PermissionMiddleware::class)->setName('view_appointment_scheduler/list-view_appointment_scheduler-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', ViewAppointmentSchedulerController::class . ':add')->add(PermissionMiddleware::class)->setName('view_appointment_scheduler/add-view_appointment_scheduler-add-2'); // add
            $group->any('/' . Config("UPDATE_ACTION") . '', ViewAppointmentSchedulerController::class . ':update')->add(PermissionMiddleware::class)->setName('view_appointment_scheduler/update-view_appointment_scheduler-update-2'); // update
            $group->any('/' . Config("SEARCH_ACTION") . '', ViewAppointmentSchedulerController::class . ':search')->add(PermissionMiddleware::class)->setName('view_appointment_scheduler/search-view_appointment_scheduler-search-2'); // search
        }
    );

    // appointment_block_slot
    $app->any('/AppointmentBlockSlotList[/{id}]', AppointmentBlockSlotController::class . ':list')->add(PermissionMiddleware::class)->setName('AppointmentBlockSlotList-appointment_block_slot-list'); // list
    $app->any('/AppointmentBlockSlotAdd[/{id}]', AppointmentBlockSlotController::class . ':add')->add(PermissionMiddleware::class)->setName('AppointmentBlockSlotAdd-appointment_block_slot-add'); // add
    $app->any('/AppointmentBlockSlotView[/{id}]', AppointmentBlockSlotController::class . ':view')->add(PermissionMiddleware::class)->setName('AppointmentBlockSlotView-appointment_block_slot-view'); // view
    $app->any('/AppointmentBlockSlotEdit[/{id}]', AppointmentBlockSlotController::class . ':edit')->add(PermissionMiddleware::class)->setName('AppointmentBlockSlotEdit-appointment_block_slot-edit'); // edit
    $app->any('/AppointmentBlockSlotDelete[/{id}]', AppointmentBlockSlotController::class . ':delete')->add(PermissionMiddleware::class)->setName('AppointmentBlockSlotDelete-appointment_block_slot-delete'); // delete
    $app->group(
        '/appointment_block_slot',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', AppointmentBlockSlotController::class . ':list')->add(PermissionMiddleware::class)->setName('appointment_block_slot/list-appointment_block_slot-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', AppointmentBlockSlotController::class . ':add')->add(PermissionMiddleware::class)->setName('appointment_block_slot/add-appointment_block_slot-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', AppointmentBlockSlotController::class . ':view')->add(PermissionMiddleware::class)->setName('appointment_block_slot/view-appointment_block_slot-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', AppointmentBlockSlotController::class . ':edit')->add(PermissionMiddleware::class)->setName('appointment_block_slot/edit-appointment_block_slot-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', AppointmentBlockSlotController::class . ':delete')->add(PermissionMiddleware::class)->setName('appointment_block_slot/delete-appointment_block_slot-delete-2'); // delete
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', AppointmentReminderController::class . ':list')->add(PermissionMiddleware::class)->setName('appointment_reminder/list-appointment_reminder-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', AppointmentReminderController::class . ':add')->add(PermissionMiddleware::class)->setName('appointment_reminder/add-appointment_reminder-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', AppointmentReminderController::class . ':view')->add(PermissionMiddleware::class)->setName('appointment_reminder/view-appointment_reminder-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', AppointmentReminderController::class . ':edit')->add(PermissionMiddleware::class)->setName('appointment_reminder/edit-appointment_reminder-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', AppointmentReminderController::class . ':delete')->add(PermissionMiddleware::class)->setName('appointment_reminder/delete-appointment_reminder-delete-2'); // delete
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', ReceiptsController::class . ':list')->add(PermissionMiddleware::class)->setName('receipts/list-receipts-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', ReceiptsController::class . ':add')->add(PermissionMiddleware::class)->setName('receipts/add-receipts-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', ReceiptsController::class . ':view')->add(PermissionMiddleware::class)->setName('receipts/view-receipts-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', ReceiptsController::class . ':edit')->add(PermissionMiddleware::class)->setName('receipts/edit-receipts-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', ReceiptsController::class . ':delete')->add(PermissionMiddleware::class)->setName('receipts/delete-receipts-delete-2'); // delete
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', BillingTypeController::class . ':list')->add(PermissionMiddleware::class)->setName('billing_type/list-billing_type-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', BillingTypeController::class . ':add')->add(PermissionMiddleware::class)->setName('billing_type/add-billing_type-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', BillingTypeController::class . ':view')->add(PermissionMiddleware::class)->setName('billing_type/view-billing_type-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', BillingTypeController::class . ':edit')->add(PermissionMiddleware::class)->setName('billing_type/edit-billing_type-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', BillingTypeController::class . ':delete')->add(PermissionMiddleware::class)->setName('billing_type/delete-billing_type-delete-2'); // delete
        }
    );

    // view_patient_discharge_summary_group
    $app->any('/ViewPatientDischargeSummaryGroupList', ViewPatientDischargeSummaryGroupController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewPatientDischargeSummaryGroupList-view_patient_discharge_summary_group-list'); // list
    $app->group(
        '/view_patient_discharge_summary_group',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '', ViewPatientDischargeSummaryGroupController::class . ':list')->add(PermissionMiddleware::class)->setName('view_patient_discharge_summary_group/list-view_patient_discharge_summary_group-list-2'); // list
        }
    );

    // view_opd_follow_up
    $app->any('/ViewOpdFollowUpList[/{id}]', ViewOpdFollowUpController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewOpdFollowUpList-view_opd_follow_up-list'); // list
    $app->any('/ViewOpdFollowUpAdd[/{id}]', ViewOpdFollowUpController::class . ':add')->add(PermissionMiddleware::class)->setName('ViewOpdFollowUpAdd-view_opd_follow_up-add'); // add
    $app->any('/ViewOpdFollowUpView[/{id}]', ViewOpdFollowUpController::class . ':view')->add(PermissionMiddleware::class)->setName('ViewOpdFollowUpView-view_opd_follow_up-view'); // view
    $app->any('/ViewOpdFollowUpEdit[/{id}]', ViewOpdFollowUpController::class . ':edit')->add(PermissionMiddleware::class)->setName('ViewOpdFollowUpEdit-view_opd_follow_up-edit'); // edit
    $app->any('/ViewOpdFollowUpDelete[/{id}]', ViewOpdFollowUpController::class . ':delete')->add(PermissionMiddleware::class)->setName('ViewOpdFollowUpDelete-view_opd_follow_up-delete'); // delete
    $app->group(
        '/view_opd_follow_up',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', ViewOpdFollowUpController::class . ':list')->add(PermissionMiddleware::class)->setName('view_opd_follow_up/list-view_opd_follow_up-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', ViewOpdFollowUpController::class . ':add')->add(PermissionMiddleware::class)->setName('view_opd_follow_up/add-view_opd_follow_up-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', ViewOpdFollowUpController::class . ':view')->add(PermissionMiddleware::class)->setName('view_opd_follow_up/view-view_opd_follow_up-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', ViewOpdFollowUpController::class . ':edit')->add(PermissionMiddleware::class)->setName('view_opd_follow_up/edit-view_opd_follow_up-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', ViewOpdFollowUpController::class . ':delete')->add(PermissionMiddleware::class)->setName('view_opd_follow_up/delete-view_opd_follow_up-delete-2'); // delete
        }
    );

    // ivf_mas_template_type
    $app->any('/IvfMasTemplateTypeList[/{id}]', IvfMasTemplateTypeController::class . ':list')->add(PermissionMiddleware::class)->setName('IvfMasTemplateTypeList-ivf_mas_template_type-list'); // list
    $app->any('/IvfMasTemplateTypeAdd[/{id}]', IvfMasTemplateTypeController::class . ':add')->add(PermissionMiddleware::class)->setName('IvfMasTemplateTypeAdd-ivf_mas_template_type-add'); // add
    $app->any('/IvfMasTemplateTypeAddopt', IvfMasTemplateTypeController::class . ':addopt')->add(PermissionMiddleware::class)->setName('IvfMasTemplateTypeAddopt-ivf_mas_template_type-addopt'); // addopt
    $app->any('/IvfMasTemplateTypeView[/{id}]', IvfMasTemplateTypeController::class . ':view')->add(PermissionMiddleware::class)->setName('IvfMasTemplateTypeView-ivf_mas_template_type-view'); // view
    $app->any('/IvfMasTemplateTypeEdit[/{id}]', IvfMasTemplateTypeController::class . ':edit')->add(PermissionMiddleware::class)->setName('IvfMasTemplateTypeEdit-ivf_mas_template_type-edit'); // edit
    $app->any('/IvfMasTemplateTypeDelete[/{id}]', IvfMasTemplateTypeController::class . ':delete')->add(PermissionMiddleware::class)->setName('IvfMasTemplateTypeDelete-ivf_mas_template_type-delete'); // delete
    $app->group(
        '/ivf_mas_template_type',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', IvfMasTemplateTypeController::class . ':list')->add(PermissionMiddleware::class)->setName('ivf_mas_template_type/list-ivf_mas_template_type-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', IvfMasTemplateTypeController::class . ':add')->add(PermissionMiddleware::class)->setName('ivf_mas_template_type/add-ivf_mas_template_type-add-2'); // add
            $group->any('/' . Config("ADDOPT_ACTION") . '', IvfMasTemplateTypeController::class . ':addopt')->add(PermissionMiddleware::class)->setName('ivf_mas_template_type/addopt-ivf_mas_template_type-addopt-2'); // addopt
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', IvfMasTemplateTypeController::class . ':view')->add(PermissionMiddleware::class)->setName('ivf_mas_template_type/view-ivf_mas_template_type-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', IvfMasTemplateTypeController::class . ':edit')->add(PermissionMiddleware::class)->setName('ivf_mas_template_type/edit-ivf_mas_template_type-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', IvfMasTemplateTypeController::class . ':delete')->add(PermissionMiddleware::class)->setName('ivf_mas_template_type/delete-ivf_mas_template_type-delete-2'); // delete
        }
    );

    // ivf_mas_user_template
    $app->any('/IvfMasUserTemplateList[/{id}]', IvfMasUserTemplateController::class . ':list')->add(PermissionMiddleware::class)->setName('IvfMasUserTemplateList-ivf_mas_user_template-list'); // list
    $app->any('/IvfMasUserTemplateAdd[/{id}]', IvfMasUserTemplateController::class . ':add')->add(PermissionMiddleware::class)->setName('IvfMasUserTemplateAdd-ivf_mas_user_template-add'); // add
    $app->any('/IvfMasUserTemplateAddopt', IvfMasUserTemplateController::class . ':addopt')->add(PermissionMiddleware::class)->setName('IvfMasUserTemplateAddopt-ivf_mas_user_template-addopt'); // addopt
    $app->any('/IvfMasUserTemplateView[/{id}]', IvfMasUserTemplateController::class . ':view')->add(PermissionMiddleware::class)->setName('IvfMasUserTemplateView-ivf_mas_user_template-view'); // view
    $app->any('/IvfMasUserTemplateEdit[/{id}]', IvfMasUserTemplateController::class . ':edit')->add(PermissionMiddleware::class)->setName('IvfMasUserTemplateEdit-ivf_mas_user_template-edit'); // edit
    $app->any('/IvfMasUserTemplateDelete[/{id}]', IvfMasUserTemplateController::class . ':delete')->add(PermissionMiddleware::class)->setName('IvfMasUserTemplateDelete-ivf_mas_user_template-delete'); // delete
    $app->group(
        '/ivf_mas_user_template',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', IvfMasUserTemplateController::class . ':list')->add(PermissionMiddleware::class)->setName('ivf_mas_user_template/list-ivf_mas_user_template-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', IvfMasUserTemplateController::class . ':add')->add(PermissionMiddleware::class)->setName('ivf_mas_user_template/add-ivf_mas_user_template-add-2'); // add
            $group->any('/' . Config("ADDOPT_ACTION") . '', IvfMasUserTemplateController::class . ':addopt')->add(PermissionMiddleware::class)->setName('ivf_mas_user_template/addopt-ivf_mas_user_template-addopt-2'); // addopt
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', IvfMasUserTemplateController::class . ':view')->add(PermissionMiddleware::class)->setName('ivf_mas_user_template/view-ivf_mas_user_template-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', IvfMasUserTemplateController::class . ':edit')->add(PermissionMiddleware::class)->setName('ivf_mas_user_template/edit-ivf_mas_user_template-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', IvfMasUserTemplateController::class . ':delete')->add(PermissionMiddleware::class)->setName('ivf_mas_user_template/delete-ivf_mas_user_template-delete-2'); // delete
        }
    );

    // ivf_stimulation_chart
    $app->any('/IvfStimulationChartList[/{id}]', IvfStimulationChartController::class . ':list')->add(PermissionMiddleware::class)->setName('IvfStimulationChartList-ivf_stimulation_chart-list'); // list
    $app->any('/IvfStimulationChartAdd[/{id}]', IvfStimulationChartController::class . ':add')->add(PermissionMiddleware::class)->setName('IvfStimulationChartAdd-ivf_stimulation_chart-add'); // add
    $app->any('/IvfStimulationChartView[/{id}]', IvfStimulationChartController::class . ':view')->add(PermissionMiddleware::class)->setName('IvfStimulationChartView-ivf_stimulation_chart-view'); // view
    $app->any('/IvfStimulationChartEdit[/{id}]', IvfStimulationChartController::class . ':edit')->add(PermissionMiddleware::class)->setName('IvfStimulationChartEdit-ivf_stimulation_chart-edit'); // edit
    $app->any('/IvfStimulationChartDelete[/{id}]', IvfStimulationChartController::class . ':delete')->add(PermissionMiddleware::class)->setName('IvfStimulationChartDelete-ivf_stimulation_chart-delete'); // delete
    $app->any('/IvfStimulationChartPreview', IvfStimulationChartController::class . ':preview')->add(PermissionMiddleware::class)->setName('IvfStimulationChartPreview-ivf_stimulation_chart-preview'); // preview
    $app->group(
        '/ivf_stimulation_chart',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', IvfStimulationChartController::class . ':list')->add(PermissionMiddleware::class)->setName('ivf_stimulation_chart/list-ivf_stimulation_chart-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', IvfStimulationChartController::class . ':add')->add(PermissionMiddleware::class)->setName('ivf_stimulation_chart/add-ivf_stimulation_chart-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', IvfStimulationChartController::class . ':view')->add(PermissionMiddleware::class)->setName('ivf_stimulation_chart/view-ivf_stimulation_chart-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', IvfStimulationChartController::class . ':edit')->add(PermissionMiddleware::class)->setName('ivf_stimulation_chart/edit-ivf_stimulation_chart-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', IvfStimulationChartController::class . ':delete')->add(PermissionMiddleware::class)->setName('ivf_stimulation_chart/delete-ivf_stimulation_chart-delete-2'); // delete
            $group->any('/' . Config("PREVIEW_ACTION") . '', IvfStimulationChartController::class . ':preview')->add(PermissionMiddleware::class)->setName('ivf_stimulation_chart/preview-ivf_stimulation_chart-preview-2'); // preview
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', IvfEtChartController::class . ':list')->add(PermissionMiddleware::class)->setName('ivf_et_chart/list-ivf_et_chart-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', IvfEtChartController::class . ':add')->add(PermissionMiddleware::class)->setName('ivf_et_chart/add-ivf_et_chart-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', IvfEtChartController::class . ':view')->add(PermissionMiddleware::class)->setName('ivf_et_chart/view-ivf_et_chart-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', IvfEtChartController::class . ':edit')->add(PermissionMiddleware::class)->setName('ivf_et_chart/edit-ivf_et_chart-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', IvfEtChartController::class . ':delete')->add(PermissionMiddleware::class)->setName('ivf_et_chart/delete-ivf_et_chart-delete-2'); // delete
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', IvfOvumPickUpChartController::class . ':list')->add(PermissionMiddleware::class)->setName('ivf_ovum_pick_up_chart/list-ivf_ovum_pick_up_chart-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', IvfOvumPickUpChartController::class . ':add')->add(PermissionMiddleware::class)->setName('ivf_ovum_pick_up_chart/add-ivf_ovum_pick_up_chart-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', IvfOvumPickUpChartController::class . ':view')->add(PermissionMiddleware::class)->setName('ivf_ovum_pick_up_chart/view-ivf_ovum_pick_up_chart-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', IvfOvumPickUpChartController::class . ':edit')->add(PermissionMiddleware::class)->setName('ivf_ovum_pick_up_chart/edit-ivf_ovum_pick_up_chart-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', IvfOvumPickUpChartController::class . ':delete')->add(PermissionMiddleware::class)->setName('ivf_ovum_pick_up_chart/delete-ivf_ovum_pick_up_chart-delete-2'); // delete
        }
    );

    // ivf_embryology_chart
    $app->any('/IvfEmbryologyChartList[/{id}]', IvfEmbryologyChartController::class . ':list')->add(PermissionMiddleware::class)->setName('IvfEmbryologyChartList-ivf_embryology_chart-list'); // list
    $app->any('/IvfEmbryologyChartAdd[/{id}]', IvfEmbryologyChartController::class . ':add')->add(PermissionMiddleware::class)->setName('IvfEmbryologyChartAdd-ivf_embryology_chart-add'); // add
    $app->any('/IvfEmbryologyChartView[/{id}]', IvfEmbryologyChartController::class . ':view')->add(PermissionMiddleware::class)->setName('IvfEmbryologyChartView-ivf_embryology_chart-view'); // view
    $app->any('/IvfEmbryologyChartEdit[/{id}]', IvfEmbryologyChartController::class . ':edit')->add(PermissionMiddleware::class)->setName('IvfEmbryologyChartEdit-ivf_embryology_chart-edit'); // edit
    $app->any('/IvfEmbryologyChartDelete[/{id}]', IvfEmbryologyChartController::class . ':delete')->add(PermissionMiddleware::class)->setName('IvfEmbryologyChartDelete-ivf_embryology_chart-delete'); // delete
    $app->any('/IvfEmbryologyChartPreview', IvfEmbryologyChartController::class . ':preview')->add(PermissionMiddleware::class)->setName('IvfEmbryologyChartPreview-ivf_embryology_chart-preview'); // preview
    $app->group(
        '/ivf_embryology_chart',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', IvfEmbryologyChartController::class . ':list')->add(PermissionMiddleware::class)->setName('ivf_embryology_chart/list-ivf_embryology_chart-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', IvfEmbryologyChartController::class . ':add')->add(PermissionMiddleware::class)->setName('ivf_embryology_chart/add-ivf_embryology_chart-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', IvfEmbryologyChartController::class . ':view')->add(PermissionMiddleware::class)->setName('ivf_embryology_chart/view-ivf_embryology_chart-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', IvfEmbryologyChartController::class . ':edit')->add(PermissionMiddleware::class)->setName('ivf_embryology_chart/edit-ivf_embryology_chart-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', IvfEmbryologyChartController::class . ':delete')->add(PermissionMiddleware::class)->setName('ivf_embryology_chart/delete-ivf_embryology_chart-delete-2'); // delete
            $group->any('/' . Config("PREVIEW_ACTION") . '', IvfEmbryologyChartController::class . ':preview')->add(PermissionMiddleware::class)->setName('ivf_embryology_chart/preview-ivf_embryology_chart-preview-2'); // preview
        }
    );

    // view_ivf_treatment
    $app->any('/ViewIvfTreatmentList[/{id}/{id1}]', ViewIvfTreatmentController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewIvfTreatmentList-view_ivf_treatment-list'); // list
    $app->any('/ViewIvfTreatmentView[/{id}/{id1}]', ViewIvfTreatmentController::class . ':view')->add(PermissionMiddleware::class)->setName('ViewIvfTreatmentView-view_ivf_treatment-view'); // view
    $app->group(
        '/view_ivf_treatment',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}/{id1}]', ViewIvfTreatmentController::class . ':list')->add(PermissionMiddleware::class)->setName('view_ivf_treatment/list-view_ivf_treatment-list-2'); // list
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}/{id1}]', ViewIvfTreatmentController::class . ':view')->add(PermissionMiddleware::class)->setName('view_ivf_treatment/view-view_ivf_treatment-view-2'); // view
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', IvfFollowUpTrackingController::class . ':list')->add(PermissionMiddleware::class)->setName('ivf_follow_up_tracking/list-ivf_follow_up_tracking-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', IvfFollowUpTrackingController::class . ':add')->add(PermissionMiddleware::class)->setName('ivf_follow_up_tracking/add-ivf_follow_up_tracking-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', IvfFollowUpTrackingController::class . ':view')->add(PermissionMiddleware::class)->setName('ivf_follow_up_tracking/view-ivf_follow_up_tracking-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', IvfFollowUpTrackingController::class . ':edit')->add(PermissionMiddleware::class)->setName('ivf_follow_up_tracking/edit-ivf_follow_up_tracking-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', IvfFollowUpTrackingController::class . ':delete')->add(PermissionMiddleware::class)->setName('ivf_follow_up_tracking/delete-ivf_follow_up_tracking-delete-2'); // delete
        }
    );

    // ivf_treatment_plan
    $app->any('/IvfTreatmentPlanList[/{id}]', IvfTreatmentPlanController::class . ':list')->add(PermissionMiddleware::class)->setName('IvfTreatmentPlanList-ivf_treatment_plan-list'); // list
    $app->any('/IvfTreatmentPlanAdd[/{id}]', IvfTreatmentPlanController::class . ':add')->add(PermissionMiddleware::class)->setName('IvfTreatmentPlanAdd-ivf_treatment_plan-add'); // add
    $app->any('/IvfTreatmentPlanView[/{id}]', IvfTreatmentPlanController::class . ':view')->add(PermissionMiddleware::class)->setName('IvfTreatmentPlanView-ivf_treatment_plan-view'); // view
    $app->any('/IvfTreatmentPlanEdit[/{id}]', IvfTreatmentPlanController::class . ':edit')->add(PermissionMiddleware::class)->setName('IvfTreatmentPlanEdit-ivf_treatment_plan-edit'); // edit
    $app->any('/IvfTreatmentPlanDelete[/{id}]', IvfTreatmentPlanController::class . ':delete')->add(PermissionMiddleware::class)->setName('IvfTreatmentPlanDelete-ivf_treatment_plan-delete'); // delete
    $app->any('/IvfTreatmentPlanPreview', IvfTreatmentPlanController::class . ':preview')->add(PermissionMiddleware::class)->setName('IvfTreatmentPlanPreview-ivf_treatment_plan-preview'); // preview
    $app->group(
        '/ivf_treatment_plan',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', IvfTreatmentPlanController::class . ':list')->add(PermissionMiddleware::class)->setName('ivf_treatment_plan/list-ivf_treatment_plan-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', IvfTreatmentPlanController::class . ':add')->add(PermissionMiddleware::class)->setName('ivf_treatment_plan/add-ivf_treatment_plan-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', IvfTreatmentPlanController::class . ':view')->add(PermissionMiddleware::class)->setName('ivf_treatment_plan/view-ivf_treatment_plan-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', IvfTreatmentPlanController::class . ':edit')->add(PermissionMiddleware::class)->setName('ivf_treatment_plan/edit-ivf_treatment_plan-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', IvfTreatmentPlanController::class . ':delete')->add(PermissionMiddleware::class)->setName('ivf_treatment_plan/delete-ivf_treatment_plan-delete-2'); // delete
            $group->any('/' . Config("PREVIEW_ACTION") . '', IvfTreatmentPlanController::class . ':preview')->add(PermissionMiddleware::class)->setName('ivf_treatment_plan/preview-ivf_treatment_plan-preview-2'); // preview
        }
    );

    // ajaxselect
    $app->any('/Ajaxselect[/{params:.*}]', AjaxselectController::class)->add(PermissionMiddleware::class)->setName('Ajaxselect-ajaxselect-custom'); // custom

    // ivf_mas_art_cycle
    $app->any('/IvfMasArtCycleList[/{id}]', IvfMasArtCycleController::class . ':list')->add(PermissionMiddleware::class)->setName('IvfMasArtCycleList-ivf_mas_art_cycle-list'); // list
    $app->any('/IvfMasArtCycleAdd[/{id}]', IvfMasArtCycleController::class . ':add')->add(PermissionMiddleware::class)->setName('IvfMasArtCycleAdd-ivf_mas_art_cycle-add'); // add
    $app->any('/IvfMasArtCycleAddopt', IvfMasArtCycleController::class . ':addopt')->add(PermissionMiddleware::class)->setName('IvfMasArtCycleAddopt-ivf_mas_art_cycle-addopt'); // addopt
    $app->any('/IvfMasArtCycleView[/{id}]', IvfMasArtCycleController::class . ':view')->add(PermissionMiddleware::class)->setName('IvfMasArtCycleView-ivf_mas_art_cycle-view'); // view
    $app->any('/IvfMasArtCycleEdit[/{id}]', IvfMasArtCycleController::class . ':edit')->add(PermissionMiddleware::class)->setName('IvfMasArtCycleEdit-ivf_mas_art_cycle-edit'); // edit
    $app->any('/IvfMasArtCycleDelete[/{id}]', IvfMasArtCycleController::class . ':delete')->add(PermissionMiddleware::class)->setName('IvfMasArtCycleDelete-ivf_mas_art_cycle-delete'); // delete
    $app->group(
        '/ivf_mas_art_cycle',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', IvfMasArtCycleController::class . ':list')->add(PermissionMiddleware::class)->setName('ivf_mas_art_cycle/list-ivf_mas_art_cycle-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', IvfMasArtCycleController::class . ':add')->add(PermissionMiddleware::class)->setName('ivf_mas_art_cycle/add-ivf_mas_art_cycle-add-2'); // add
            $group->any('/' . Config("ADDOPT_ACTION") . '', IvfMasArtCycleController::class . ':addopt')->add(PermissionMiddleware::class)->setName('ivf_mas_art_cycle/addopt-ivf_mas_art_cycle-addopt-2'); // addopt
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', IvfMasArtCycleController::class . ':view')->add(PermissionMiddleware::class)->setName('ivf_mas_art_cycle/view-ivf_mas_art_cycle-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', IvfMasArtCycleController::class . ':edit')->add(PermissionMiddleware::class)->setName('ivf_mas_art_cycle/edit-ivf_mas_art_cycle-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', IvfMasArtCycleController::class . ':delete')->add(PermissionMiddleware::class)->setName('ivf_mas_art_cycle/delete-ivf_mas_art_cycle-delete-2'); // delete
        }
    );

    // FertilityHome
    $app->any('/FertilityHome[/{params:.*}]', FertilityHomeController::class)->add(PermissionMiddleware::class)->setName('FertilityHome-FertilityHome-custom'); // custom

    // treatment
    $app->any('/Treatment[/{params:.*}]', TreatmentController::class)->add(PermissionMiddleware::class)->setName('Treatment-treatment-custom'); // custom

    // thaw
    $app->any('/ThawList[/{id}]', ThawController::class . ':list')->add(PermissionMiddleware::class)->setName('ThawList-thaw-list'); // list
    $app->any('/ThawEdit[/{id}]', ThawController::class . ':edit')->add(PermissionMiddleware::class)->setName('ThawEdit-thaw-edit'); // edit
    $app->any('/ThawUpdate', ThawController::class . ':update')->add(PermissionMiddleware::class)->setName('ThawUpdate-thaw-update'); // update
    $app->group(
        '/thaw',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', ThawController::class . ':list')->add(PermissionMiddleware::class)->setName('thaw/list-thaw-list-2'); // list
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', ThawController::class . ':edit')->add(PermissionMiddleware::class)->setName('thaw/edit-thaw-edit-2'); // edit
            $group->any('/' . Config("UPDATE_ACTION") . '', ThawController::class . ':update')->add(PermissionMiddleware::class)->setName('thaw/update-thaw-update-2'); // update
        }
    );

    // ivf_outcome
    $app->any('/IvfOutcomeList[/{id}]', IvfOutcomeController::class . ':list')->add(PermissionMiddleware::class)->setName('IvfOutcomeList-ivf_outcome-list'); // list
    $app->any('/IvfOutcomeAdd[/{id}]', IvfOutcomeController::class . ':add')->add(PermissionMiddleware::class)->setName('IvfOutcomeAdd-ivf_outcome-add'); // add
    $app->any('/IvfOutcomeView[/{id}]', IvfOutcomeController::class . ':view')->add(PermissionMiddleware::class)->setName('IvfOutcomeView-ivf_outcome-view'); // view
    $app->any('/IvfOutcomeEdit[/{id}]', IvfOutcomeController::class . ':edit')->add(PermissionMiddleware::class)->setName('IvfOutcomeEdit-ivf_outcome-edit'); // edit
    $app->any('/IvfOutcomeDelete[/{id}]', IvfOutcomeController::class . ':delete')->add(PermissionMiddleware::class)->setName('IvfOutcomeDelete-ivf_outcome-delete'); // delete
    $app->any('/IvfOutcomePreview', IvfOutcomeController::class . ':preview')->add(PermissionMiddleware::class)->setName('IvfOutcomePreview-ivf_outcome-preview'); // preview
    $app->group(
        '/ivf_outcome',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', IvfOutcomeController::class . ':list')->add(PermissionMiddleware::class)->setName('ivf_outcome/list-ivf_outcome-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', IvfOutcomeController::class . ':add')->add(PermissionMiddleware::class)->setName('ivf_outcome/add-ivf_outcome-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', IvfOutcomeController::class . ':view')->add(PermissionMiddleware::class)->setName('ivf_outcome/view-ivf_outcome-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', IvfOutcomeController::class . ':edit')->add(PermissionMiddleware::class)->setName('ivf_outcome/edit-ivf_outcome-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', IvfOutcomeController::class . ':delete')->add(PermissionMiddleware::class)->setName('ivf_outcome/delete-ivf_outcome-delete-2'); // delete
            $group->any('/' . Config("PREVIEW_ACTION") . '', IvfOutcomeController::class . ':preview')->add(PermissionMiddleware::class)->setName('ivf_outcome/preview-ivf_outcome-preview-2'); // preview
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', IvfDonorsemendetailsController::class . ':list')->add(PermissionMiddleware::class)->setName('ivf_donorsemendetails/list-ivf_donorsemendetails-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', IvfDonorsemendetailsController::class . ':add')->add(PermissionMiddleware::class)->setName('ivf_donorsemendetails/add-ivf_donorsemendetails-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', IvfDonorsemendetailsController::class . ':view')->add(PermissionMiddleware::class)->setName('ivf_donorsemendetails/view-ivf_donorsemendetails-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', IvfDonorsemendetailsController::class . ':edit')->add(PermissionMiddleware::class)->setName('ivf_donorsemendetails/edit-ivf_donorsemendetails-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', IvfDonorsemendetailsController::class . ':delete')->add(PermissionMiddleware::class)->setName('ivf_donorsemendetails/delete-ivf_donorsemendetails-delete-2'); // delete
        }
    );

    // ivf_oocytedenudation
    $app->any('/IvfOocytedenudationList[/{id}]', IvfOocytedenudationController::class . ':list')->add(PermissionMiddleware::class)->setName('IvfOocytedenudationList-ivf_oocytedenudation-list'); // list
    $app->any('/IvfOocytedenudationAdd[/{id}]', IvfOocytedenudationController::class . ':add')->add(PermissionMiddleware::class)->setName('IvfOocytedenudationAdd-ivf_oocytedenudation-add'); // add
    $app->any('/IvfOocytedenudationView[/{id}]', IvfOocytedenudationController::class . ':view')->add(PermissionMiddleware::class)->setName('IvfOocytedenudationView-ivf_oocytedenudation-view'); // view
    $app->any('/IvfOocytedenudationEdit[/{id}]', IvfOocytedenudationController::class . ':edit')->add(PermissionMiddleware::class)->setName('IvfOocytedenudationEdit-ivf_oocytedenudation-edit'); // edit
    $app->any('/IvfOocytedenudationDelete[/{id}]', IvfOocytedenudationController::class . ':delete')->add(PermissionMiddleware::class)->setName('IvfOocytedenudationDelete-ivf_oocytedenudation-delete'); // delete
    $app->any('/IvfOocytedenudationPreview', IvfOocytedenudationController::class . ':preview')->add(PermissionMiddleware::class)->setName('IvfOocytedenudationPreview-ivf_oocytedenudation-preview'); // preview
    $app->group(
        '/ivf_oocytedenudation',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', IvfOocytedenudationController::class . ':list')->add(PermissionMiddleware::class)->setName('ivf_oocytedenudation/list-ivf_oocytedenudation-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', IvfOocytedenudationController::class . ':add')->add(PermissionMiddleware::class)->setName('ivf_oocytedenudation/add-ivf_oocytedenudation-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', IvfOocytedenudationController::class . ':view')->add(PermissionMiddleware::class)->setName('ivf_oocytedenudation/view-ivf_oocytedenudation-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', IvfOocytedenudationController::class . ':edit')->add(PermissionMiddleware::class)->setName('ivf_oocytedenudation/edit-ivf_oocytedenudation-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', IvfOocytedenudationController::class . ':delete')->add(PermissionMiddleware::class)->setName('ivf_oocytedenudation/delete-ivf_oocytedenudation-delete-2'); // delete
            $group->any('/' . Config("PREVIEW_ACTION") . '', IvfOocytedenudationController::class . ':preview')->add(PermissionMiddleware::class)->setName('ivf_oocytedenudation/preview-ivf_oocytedenudation-preview-2'); // preview
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', IvfOocytedenudationStageController::class . ':list')->add(PermissionMiddleware::class)->setName('ivf_oocytedenudation_stage/list-ivf_oocytedenudation_stage-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', IvfOocytedenudationStageController::class . ':add')->add(PermissionMiddleware::class)->setName('ivf_oocytedenudation_stage/add-ivf_oocytedenudation_stage-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', IvfOocytedenudationStageController::class . ':view')->add(PermissionMiddleware::class)->setName('ivf_oocytedenudation_stage/view-ivf_oocytedenudation_stage-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', IvfOocytedenudationStageController::class . ':edit')->add(PermissionMiddleware::class)->setName('ivf_oocytedenudation_stage/edit-ivf_oocytedenudation_stage-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', IvfOocytedenudationStageController::class . ':delete')->add(PermissionMiddleware::class)->setName('ivf_oocytedenudation_stage/delete-ivf_oocytedenudation_stage-delete-2'); // delete
        }
    );

    // ivf_agency
    $app->any('/IvfAgencyList[/{id}]', IvfAgencyController::class . ':list')->add(PermissionMiddleware::class)->setName('IvfAgencyList-ivf_agency-list'); // list
    $app->any('/IvfAgencyAdd[/{id}]', IvfAgencyController::class . ':add')->add(PermissionMiddleware::class)->setName('IvfAgencyAdd-ivf_agency-add'); // add
    $app->any('/IvfAgencyAddopt', IvfAgencyController::class . ':addopt')->add(PermissionMiddleware::class)->setName('IvfAgencyAddopt-ivf_agency-addopt'); // addopt
    $app->any('/IvfAgencyView[/{id}]', IvfAgencyController::class . ':view')->add(PermissionMiddleware::class)->setName('IvfAgencyView-ivf_agency-view'); // view
    $app->any('/IvfAgencyEdit[/{id}]', IvfAgencyController::class . ':edit')->add(PermissionMiddleware::class)->setName('IvfAgencyEdit-ivf_agency-edit'); // edit
    $app->any('/IvfAgencyDelete[/{id}]', IvfAgencyController::class . ':delete')->add(PermissionMiddleware::class)->setName('IvfAgencyDelete-ivf_agency-delete'); // delete
    $app->group(
        '/ivf_agency',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', IvfAgencyController::class . ':list')->add(PermissionMiddleware::class)->setName('ivf_agency/list-ivf_agency-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', IvfAgencyController::class . ':add')->add(PermissionMiddleware::class)->setName('ivf_agency/add-ivf_agency-add-2'); // add
            $group->any('/' . Config("ADDOPT_ACTION") . '', IvfAgencyController::class . ':addopt')->add(PermissionMiddleware::class)->setName('ivf_agency/addopt-ivf_agency-addopt-2'); // addopt
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', IvfAgencyController::class . ':view')->add(PermissionMiddleware::class)->setName('ivf_agency/view-ivf_agency-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', IvfAgencyController::class . ':edit')->add(PermissionMiddleware::class)->setName('ivf_agency/edit-ivf_agency-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', IvfAgencyController::class . ':delete')->add(PermissionMiddleware::class)->setName('ivf_agency/delete-ivf_agency-delete-2'); // delete
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', IvfVitrificationController::class . ':list')->add(PermissionMiddleware::class)->setName('ivf_vitrification/list-ivf_vitrification-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', IvfVitrificationController::class . ':add')->add(PermissionMiddleware::class)->setName('ivf_vitrification/add-ivf_vitrification-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', IvfVitrificationController::class . ':view')->add(PermissionMiddleware::class)->setName('ivf_vitrification/view-ivf_vitrification-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', IvfVitrificationController::class . ':edit')->add(PermissionMiddleware::class)->setName('ivf_vitrification/edit-ivf_vitrification-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', IvfVitrificationController::class . ':delete')->add(PermissionMiddleware::class)->setName('ivf_vitrification/delete-ivf_vitrification-delete-2'); // delete
        }
    );

    // view_et
    $app->any('/ViewEtList[/{id}]', ViewEtController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewEtList-view_et-list'); // list
    $app->any('/ViewEtUpdate', ViewEtController::class . ':update')->add(PermissionMiddleware::class)->setName('ViewEtUpdate-view_et-update'); // update
    $app->group(
        '/view_et',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', ViewEtController::class . ':list')->add(PermissionMiddleware::class)->setName('view_et/list-view_et-list-2'); // list
            $group->any('/' . Config("UPDATE_ACTION") . '', ViewEtController::class . ':update')->add(PermissionMiddleware::class)->setName('view_et/update-view_et-update-2'); // update
        }
    );

    // view_donor_semen_stock
    $app->any('/ViewDonorSemenStockList', ViewDonorSemenStockController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewDonorSemenStockList-view_donor_semen_stock-list'); // list
    $app->group(
        '/view_donor_semen_stock',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '', ViewDonorSemenStockController::class . ':list')->add(PermissionMiddleware::class)->setName('view_donor_semen_stock/list-view_donor_semen_stock-list-2'); // list
        }
    );

    // view_issuing_semen
    $app->any('/ViewIssuingSemenList[/{id}]', ViewIssuingSemenController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewIssuingSemenList-view_issuing_semen-list'); // list
    $app->group(
        '/view_issuing_semen',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', ViewIssuingSemenController::class . ':list')->add(PermissionMiddleware::class)->setName('view_issuing_semen/list-view_issuing_semen-list-2'); // list
        }
    );

    // view_partner_semenstock
    $app->any('/ViewPartnerSemenstockList', ViewPartnerSemenstockController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewPartnerSemenstockList-view_partner_semenstock-list'); // list
    $app->group(
        '/view_partner_semenstock',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '', ViewPartnerSemenstockController::class . ':list')->add(PermissionMiddleware::class)->setName('view_partner_semenstock/list-view_partner_semenstock-list-2'); // list
        }
    );

    // lab_profile_details
    $app->any('/LabProfileDetailsList[/{id}]', LabProfileDetailsController::class . ':list')->add(PermissionMiddleware::class)->setName('LabProfileDetailsList-lab_profile_details-list'); // list
    $app->any('/LabProfileDetailsAdd[/{id}]', LabProfileDetailsController::class . ':add')->add(PermissionMiddleware::class)->setName('LabProfileDetailsAdd-lab_profile_details-add'); // add
    $app->any('/LabProfileDetailsView[/{id}]', LabProfileDetailsController::class . ':view')->add(PermissionMiddleware::class)->setName('LabProfileDetailsView-lab_profile_details-view'); // view
    $app->any('/LabProfileDetailsEdit[/{id}]', LabProfileDetailsController::class . ':edit')->add(PermissionMiddleware::class)->setName('LabProfileDetailsEdit-lab_profile_details-edit'); // edit
    $app->any('/LabProfileDetailsDelete[/{id}]', LabProfileDetailsController::class . ':delete')->add(PermissionMiddleware::class)->setName('LabProfileDetailsDelete-lab_profile_details-delete'); // delete
    $app->any('/LabProfileDetailsSearch', LabProfileDetailsController::class . ':search')->add(PermissionMiddleware::class)->setName('LabProfileDetailsSearch-lab_profile_details-search'); // search
    $app->any('/LabProfileDetailsPreview', LabProfileDetailsController::class . ':preview')->add(PermissionMiddleware::class)->setName('LabProfileDetailsPreview-lab_profile_details-preview'); // preview
    $app->group(
        '/lab_profile_details',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', LabProfileDetailsController::class . ':list')->add(PermissionMiddleware::class)->setName('lab_profile_details/list-lab_profile_details-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', LabProfileDetailsController::class . ':add')->add(PermissionMiddleware::class)->setName('lab_profile_details/add-lab_profile_details-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', LabProfileDetailsController::class . ':view')->add(PermissionMiddleware::class)->setName('lab_profile_details/view-lab_profile_details-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', LabProfileDetailsController::class . ':edit')->add(PermissionMiddleware::class)->setName('lab_profile_details/edit-lab_profile_details-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', LabProfileDetailsController::class . ':delete')->add(PermissionMiddleware::class)->setName('lab_profile_details/delete-lab_profile_details-delete-2'); // delete
            $group->any('/' . Config("SEARCH_ACTION") . '', LabProfileDetailsController::class . ':search')->add(PermissionMiddleware::class)->setName('lab_profile_details/search-lab_profile_details-search-2'); // search
            $group->any('/' . Config("PREVIEW_ACTION") . '', LabProfileDetailsController::class . ':preview')->add(PermissionMiddleware::class)->setName('lab_profile_details/preview-lab_profile_details-preview-2'); // preview
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', LabProfileMasterController::class . ':list')->add(PermissionMiddleware::class)->setName('lab_profile_master/list-lab_profile_master-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', LabProfileMasterController::class . ':add')->add(PermissionMiddleware::class)->setName('lab_profile_master/add-lab_profile_master-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', LabProfileMasterController::class . ':view')->add(PermissionMiddleware::class)->setName('lab_profile_master/view-lab_profile_master-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', LabProfileMasterController::class . ':edit')->add(PermissionMiddleware::class)->setName('lab_profile_master/edit-lab_profile_master-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', LabProfileMasterController::class . ':delete')->add(PermissionMiddleware::class)->setName('lab_profile_master/delete-lab_profile_master-delete-2'); // delete
        }
    );

    // lab_test_result
    $app->any('/LabTestResultList', LabTestResultController::class . ':list')->add(PermissionMiddleware::class)->setName('LabTestResultList-lab_test_result-list'); // list
    $app->any('/LabTestResultAdd', LabTestResultController::class . ':add')->add(PermissionMiddleware::class)->setName('LabTestResultAdd-lab_test_result-add'); // add
    $app->any('/LabTestResultSearch', LabTestResultController::class . ':search')->add(PermissionMiddleware::class)->setName('LabTestResultSearch-lab_test_result-search'); // search
    $app->group(
        '/lab_test_result',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '', LabTestResultController::class . ':list')->add(PermissionMiddleware::class)->setName('lab_test_result/list-lab_test_result-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '', LabTestResultController::class . ':add')->add(PermissionMiddleware::class)->setName('lab_test_result/add-lab_test_result-add-2'); // add
            $group->any('/' . Config("SEARCH_ACTION") . '', LabTestResultController::class . ':search')->add(PermissionMiddleware::class)->setName('lab_test_result/search-lab_test_result-search-2'); // search
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', LabTestMasterController::class . ':list')->add(PermissionMiddleware::class)->setName('lab_test_master/list-lab_test_master-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', LabTestMasterController::class . ':add')->add(PermissionMiddleware::class)->setName('lab_test_master/add-lab_test_master-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', LabTestMasterController::class . ':view')->add(PermissionMiddleware::class)->setName('lab_test_master/view-lab_test_master-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', LabTestMasterController::class . ':edit')->add(PermissionMiddleware::class)->setName('lab_test_master/edit-lab_test_master-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', LabTestMasterController::class . ':delete')->add(PermissionMiddleware::class)->setName('lab_test_master/delete-lab_test_master-delete-2'); // delete
        }
    );

    // view_patient_services
    $app->any('/ViewPatientServicesList[/{id}]', ViewPatientServicesController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewPatientServicesList-view_patient_services-list'); // list
    $app->any('/ViewPatientServicesAdd[/{id}]', ViewPatientServicesController::class . ':add')->add(PermissionMiddleware::class)->setName('ViewPatientServicesAdd-view_patient_services-add'); // add
    $app->any('/ViewPatientServicesView[/{id}]', ViewPatientServicesController::class . ':view')->add(PermissionMiddleware::class)->setName('ViewPatientServicesView-view_patient_services-view'); // view
    $app->any('/ViewPatientServicesEdit[/{id}]', ViewPatientServicesController::class . ':edit')->add(PermissionMiddleware::class)->setName('ViewPatientServicesEdit-view_patient_services-edit'); // edit
    $app->any('/ViewPatientServicesDelete[/{id}]', ViewPatientServicesController::class . ':delete')->add(PermissionMiddleware::class)->setName('ViewPatientServicesDelete-view_patient_services-delete'); // delete
    $app->any('/ViewPatientServicesPreview', ViewPatientServicesController::class . ':preview')->add(PermissionMiddleware::class)->setName('ViewPatientServicesPreview-view_patient_services-preview'); // preview
    $app->group(
        '/view_patient_services',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', ViewPatientServicesController::class . ':list')->add(PermissionMiddleware::class)->setName('view_patient_services/list-view_patient_services-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', ViewPatientServicesController::class . ':add')->add(PermissionMiddleware::class)->setName('view_patient_services/add-view_patient_services-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', ViewPatientServicesController::class . ':view')->add(PermissionMiddleware::class)->setName('view_patient_services/view-view_patient_services-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', ViewPatientServicesController::class . ':edit')->add(PermissionMiddleware::class)->setName('view_patient_services/edit-view_patient_services-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', ViewPatientServicesController::class . ':delete')->add(PermissionMiddleware::class)->setName('view_patient_services/delete-view_patient_services-delete-2'); // delete
            $group->any('/' . Config("PREVIEW_ACTION") . '', ViewPatientServicesController::class . ':preview')->add(PermissionMiddleware::class)->setName('view_patient_services/preview-view_patient_services-preview-2'); // preview
        }
    );

    // view_billing_voucher
    $app->any('/ViewBillingVoucherList[/{id}]', ViewBillingVoucherController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewBillingVoucherList-view_billing_voucher-list'); // list
    $app->any('/ViewBillingVoucherAdd[/{id}]', ViewBillingVoucherController::class . ':add')->add(PermissionMiddleware::class)->setName('ViewBillingVoucherAdd-view_billing_voucher-add'); // add
    $app->any('/ViewBillingVoucherView[/{id}]', ViewBillingVoucherController::class . ':view')->add(PermissionMiddleware::class)->setName('ViewBillingVoucherView-view_billing_voucher-view'); // view
    $app->any('/ViewBillingVoucherEdit[/{id}]', ViewBillingVoucherController::class . ':edit')->add(PermissionMiddleware::class)->setName('ViewBillingVoucherEdit-view_billing_voucher-edit'); // edit
    $app->any('/ViewBillingVoucherDelete[/{id}]', ViewBillingVoucherController::class . ':delete')->add(PermissionMiddleware::class)->setName('ViewBillingVoucherDelete-view_billing_voucher-delete'); // delete
    $app->any('/ViewBillingVoucherSearch', ViewBillingVoucherController::class . ':search')->add(PermissionMiddleware::class)->setName('ViewBillingVoucherSearch-view_billing_voucher-search'); // search
    $app->group(
        '/view_billing_voucher',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', ViewBillingVoucherController::class . ':list')->add(PermissionMiddleware::class)->setName('view_billing_voucher/list-view_billing_voucher-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', ViewBillingVoucherController::class . ':add')->add(PermissionMiddleware::class)->setName('view_billing_voucher/add-view_billing_voucher-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', ViewBillingVoucherController::class . ':view')->add(PermissionMiddleware::class)->setName('view_billing_voucher/view-view_billing_voucher-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', ViewBillingVoucherController::class . ':edit')->add(PermissionMiddleware::class)->setName('view_billing_voucher/edit-view_billing_voucher-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', ViewBillingVoucherController::class . ':delete')->add(PermissionMiddleware::class)->setName('view_billing_voucher/delete-view_billing_voucher-delete-2'); // delete
            $group->any('/' . Config("SEARCH_ACTION") . '', ViewBillingVoucherController::class . ':search')->add(PermissionMiddleware::class)->setName('view_billing_voucher/search-view_billing_voucher-search-2'); // search
        }
    );

    // view_semenanalysis
    $app->any('/ViewSemenanalysisList[/{id}]', ViewSemenanalysisController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewSemenanalysisList-view_semenanalysis-list'); // list
    $app->any('/ViewSemenanalysisAdd[/{id}]', ViewSemenanalysisController::class . ':add')->add(PermissionMiddleware::class)->setName('ViewSemenanalysisAdd-view_semenanalysis-add'); // add
    $app->any('/ViewSemenanalysisView[/{id}]', ViewSemenanalysisController::class . ':view')->add(PermissionMiddleware::class)->setName('ViewSemenanalysisView-view_semenanalysis-view'); // view
    $app->any('/ViewSemenanalysisEdit[/{id}]', ViewSemenanalysisController::class . ':edit')->add(PermissionMiddleware::class)->setName('ViewSemenanalysisEdit-view_semenanalysis-edit'); // edit
    $app->any('/ViewSemenanalysisDelete[/{id}]', ViewSemenanalysisController::class . ':delete')->add(PermissionMiddleware::class)->setName('ViewSemenanalysisDelete-view_semenanalysis-delete'); // delete
    $app->any('/ViewSemenanalysisSearch', ViewSemenanalysisController::class . ':search')->add(PermissionMiddleware::class)->setName('ViewSemenanalysisSearch-view_semenanalysis-search'); // search
    $app->group(
        '/view_semenanalysis',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', ViewSemenanalysisController::class . ':list')->add(PermissionMiddleware::class)->setName('view_semenanalysis/list-view_semenanalysis-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', ViewSemenanalysisController::class . ':add')->add(PermissionMiddleware::class)->setName('view_semenanalysis/add-view_semenanalysis-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', ViewSemenanalysisController::class . ':view')->add(PermissionMiddleware::class)->setName('view_semenanalysis/view-view_semenanalysis-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', ViewSemenanalysisController::class . ':edit')->add(PermissionMiddleware::class)->setName('view_semenanalysis/edit-view_semenanalysis-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', ViewSemenanalysisController::class . ':delete')->add(PermissionMiddleware::class)->setName('view_semenanalysis/delete-view_semenanalysis-delete-2'); // delete
            $group->any('/' . Config("SEARCH_ACTION") . '', ViewSemenanalysisController::class . ':search')->add(PermissionMiddleware::class)->setName('view_semenanalysis/search-view_semenanalysis-search-2'); // search
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', IvfHistoryMasterController::class . ':list')->add(PermissionMiddleware::class)->setName('ivf_history_master/list-ivf_history_master-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', IvfHistoryMasterController::class . ':add')->add(PermissionMiddleware::class)->setName('ivf_history_master/add-ivf_history_master-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', IvfHistoryMasterController::class . ':view')->add(PermissionMiddleware::class)->setName('ivf_history_master/view-ivf_history_master-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', IvfHistoryMasterController::class . ':edit')->add(PermissionMiddleware::class)->setName('ivf_history_master/edit-ivf_history_master-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', IvfHistoryMasterController::class . ':delete')->add(PermissionMiddleware::class)->setName('ivf_history_master/delete-ivf_history_master-delete-2'); // delete
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', BillingDiscountController::class . ':list')->add(PermissionMiddleware::class)->setName('billing_discount/list-billing_discount-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', BillingDiscountController::class . ':add')->add(PermissionMiddleware::class)->setName('billing_discount/add-billing_discount-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', BillingDiscountController::class . ':view')->add(PermissionMiddleware::class)->setName('billing_discount/view-billing_discount-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', BillingDiscountController::class . ':edit')->add(PermissionMiddleware::class)->setName('billing_discount/edit-billing_discount-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', BillingDiscountController::class . ':delete')->add(PermissionMiddleware::class)->setName('billing_discount/delete-billing_discount-delete-2'); // delete
        }
    );

    // view_lab_resultreleased
    $app->any('/ViewLabResultreleasedList[/{id}]', ViewLabResultreleasedController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewLabResultreleasedList-view_lab_resultreleased-list'); // list
    $app->any('/ViewLabResultreleasedPreview', ViewLabResultreleasedController::class . ':preview')->add(PermissionMiddleware::class)->setName('ViewLabResultreleasedPreview-view_lab_resultreleased-preview'); // preview
    $app->group(
        '/view_lab_resultreleased',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', ViewLabResultreleasedController::class . ':list')->add(PermissionMiddleware::class)->setName('view_lab_resultreleased/list-view_lab_resultreleased-list-2'); // list
            $group->any('/' . Config("PREVIEW_ACTION") . '', ViewLabResultreleasedController::class . ':preview')->add(PermissionMiddleware::class)->setName('view_lab_resultreleased/preview-view_lab_resultreleased-preview-2'); // preview
        }
    );

    // lab_unit_mast
    $app->any('/LabUnitMastList[/{id}]', LabUnitMastController::class . ':list')->add(PermissionMiddleware::class)->setName('LabUnitMastList-lab_unit_mast-list'); // list
    $app->any('/LabUnitMastAdd[/{id}]', LabUnitMastController::class . ':add')->add(PermissionMiddleware::class)->setName('LabUnitMastAdd-lab_unit_mast-add'); // add
    $app->any('/LabUnitMastAddopt', LabUnitMastController::class . ':addopt')->add(PermissionMiddleware::class)->setName('LabUnitMastAddopt-lab_unit_mast-addopt'); // addopt
    $app->any('/LabUnitMastView[/{id}]', LabUnitMastController::class . ':view')->add(PermissionMiddleware::class)->setName('LabUnitMastView-lab_unit_mast-view'); // view
    $app->any('/LabUnitMastEdit[/{id}]', LabUnitMastController::class . ':edit')->add(PermissionMiddleware::class)->setName('LabUnitMastEdit-lab_unit_mast-edit'); // edit
    $app->any('/LabUnitMastDelete[/{id}]', LabUnitMastController::class . ':delete')->add(PermissionMiddleware::class)->setName('LabUnitMastDelete-lab_unit_mast-delete'); // delete
    $app->group(
        '/lab_unit_mast',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', LabUnitMastController::class . ':list')->add(PermissionMiddleware::class)->setName('lab_unit_mast/list-lab_unit_mast-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', LabUnitMastController::class . ':add')->add(PermissionMiddleware::class)->setName('lab_unit_mast/add-lab_unit_mast-add-2'); // add
            $group->any('/' . Config("ADDOPT_ACTION") . '', LabUnitMastController::class . ':addopt')->add(PermissionMiddleware::class)->setName('lab_unit_mast/addopt-lab_unit_mast-addopt-2'); // addopt
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', LabUnitMastController::class . ':view')->add(PermissionMiddleware::class)->setName('lab_unit_mast/view-lab_unit_mast-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', LabUnitMastController::class . ':edit')->add(PermissionMiddleware::class)->setName('lab_unit_mast/edit-lab_unit_mast-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', LabUnitMastController::class . ':delete')->add(PermissionMiddleware::class)->setName('lab_unit_mast/delete-lab_unit_mast-delete-2'); // delete
        }
    );

    // view_lab_services
    $app->any('/ViewLabServicesList[/{id}]', ViewLabServicesController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewLabServicesList-view_lab_services-list'); // list
    $app->any('/ViewLabServicesView[/{id}]', ViewLabServicesController::class . ':view')->add(PermissionMiddleware::class)->setName('ViewLabServicesView-view_lab_services-view'); // view
    $app->any('/ViewLabServicesSearch', ViewLabServicesController::class . ':search')->add(PermissionMiddleware::class)->setName('ViewLabServicesSearch-view_lab_services-search'); // search
    $app->group(
        '/view_lab_services',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', ViewLabServicesController::class . ':list')->add(PermissionMiddleware::class)->setName('view_lab_services/list-view_lab_services-list-2'); // list
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', ViewLabServicesController::class . ':view')->add(PermissionMiddleware::class)->setName('view_lab_services/view-view_lab_services-view-2'); // view
            $group->any('/' . Config("SEARCH_ACTION") . '', ViewLabServicesController::class . ':search')->add(PermissionMiddleware::class)->setName('view_lab_services/search-view_lab_services-search-2'); // search
        }
    );

    // view_lab_print
    $app->any('/ViewLabPrintList[/{id}]', ViewLabPrintController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewLabPrintList-view_lab_print-list'); // list
    $app->any('/ViewLabPrintView[/{id}]', ViewLabPrintController::class . ':view')->add(PermissionMiddleware::class)->setName('ViewLabPrintView-view_lab_print-view'); // view
    $app->any('/ViewLabPrintSearch', ViewLabPrintController::class . ':search')->add(PermissionMiddleware::class)->setName('ViewLabPrintSearch-view_lab_print-search'); // search
    $app->group(
        '/view_lab_print',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', ViewLabPrintController::class . ':list')->add(PermissionMiddleware::class)->setName('view_lab_print/list-view_lab_print-list-2'); // list
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', ViewLabPrintController::class . ':view')->add(PermissionMiddleware::class)->setName('view_lab_print/view-view_lab_print-view-2'); // view
            $group->any('/' . Config("SEARCH_ACTION") . '', ViewLabPrintController::class . ':search')->add(PermissionMiddleware::class)->setName('view_lab_print/search-view_lab_print-search-2'); // search
        }
    );

    // view_labreport_print
    $app->any('/ViewLabreportPrintList[/{id}]', ViewLabreportPrintController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewLabreportPrintList-view_labreport_print-list'); // list
    $app->group(
        '/view_labreport_print',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', ViewLabreportPrintController::class . ':list')->add(PermissionMiddleware::class)->setName('view_labreport_print/list-view_labreport_print-list-2'); // list
        }
    );

    // pharmacy_batchmas
    $app->any('/PharmacyBatchmasList[/{id}]', PharmacyBatchmasController::class . ':list')->add(PermissionMiddleware::class)->setName('PharmacyBatchmasList-pharmacy_batchmas-list'); // list
    $app->any('/PharmacyBatchmasAdd[/{id}]', PharmacyBatchmasController::class . ':add')->add(PermissionMiddleware::class)->setName('PharmacyBatchmasAdd-pharmacy_batchmas-add'); // add
    $app->any('/PharmacyBatchmasView[/{id}]', PharmacyBatchmasController::class . ':view')->add(PermissionMiddleware::class)->setName('PharmacyBatchmasView-pharmacy_batchmas-view'); // view
    $app->any('/PharmacyBatchmasEdit[/{id}]', PharmacyBatchmasController::class . ':edit')->add(PermissionMiddleware::class)->setName('PharmacyBatchmasEdit-pharmacy_batchmas-edit'); // edit
    $app->any('/PharmacyBatchmasDelete[/{id}]', PharmacyBatchmasController::class . ':delete')->add(PermissionMiddleware::class)->setName('PharmacyBatchmasDelete-pharmacy_batchmas-delete'); // delete
    $app->any('/PharmacyBatchmasSearch', PharmacyBatchmasController::class . ':search')->add(PermissionMiddleware::class)->setName('PharmacyBatchmasSearch-pharmacy_batchmas-search'); // search
    $app->group(
        '/pharmacy_batchmas',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', PharmacyBatchmasController::class . ':list')->add(PermissionMiddleware::class)->setName('pharmacy_batchmas/list-pharmacy_batchmas-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', PharmacyBatchmasController::class . ':add')->add(PermissionMiddleware::class)->setName('pharmacy_batchmas/add-pharmacy_batchmas-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', PharmacyBatchmasController::class . ':view')->add(PermissionMiddleware::class)->setName('pharmacy_batchmas/view-pharmacy_batchmas-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', PharmacyBatchmasController::class . ':edit')->add(PermissionMiddleware::class)->setName('pharmacy_batchmas/edit-pharmacy_batchmas-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', PharmacyBatchmasController::class . ':delete')->add(PermissionMiddleware::class)->setName('pharmacy_batchmas/delete-pharmacy_batchmas-delete-2'); // delete
            $group->any('/' . Config("SEARCH_ACTION") . '', PharmacyBatchmasController::class . ':search')->add(PermissionMiddleware::class)->setName('pharmacy_batchmas/search-pharmacy_batchmas-search-2'); // search
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', PharmacyMasterGenericController::class . ':list')->add(PermissionMiddleware::class)->setName('pharmacy_master_generic/list-pharmacy_master_generic-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', PharmacyMasterGenericController::class . ':add')->add(PermissionMiddleware::class)->setName('pharmacy_master_generic/add-pharmacy_master_generic-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', PharmacyMasterGenericController::class . ':view')->add(PermissionMiddleware::class)->setName('pharmacy_master_generic/view-pharmacy_master_generic-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', PharmacyMasterGenericController::class . ':edit')->add(PermissionMiddleware::class)->setName('pharmacy_master_generic/edit-pharmacy_master_generic-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', PharmacyMasterGenericController::class . ':delete')->add(PermissionMiddleware::class)->setName('pharmacy_master_generic/delete-pharmacy_master_generic-delete-2'); // delete
        }
    );

    // pharmacy_pharled
    $app->any('/PharmacyPharledList[/{id}]', PharmacyPharledController::class . ':list')->add(PermissionMiddleware::class)->setName('PharmacyPharledList-pharmacy_pharled-list'); // list
    $app->any('/PharmacyPharledAdd[/{id}]', PharmacyPharledController::class . ':add')->add(PermissionMiddleware::class)->setName('PharmacyPharledAdd-pharmacy_pharled-add'); // add
    $app->any('/PharmacyPharledView[/{id}]', PharmacyPharledController::class . ':view')->add(PermissionMiddleware::class)->setName('PharmacyPharledView-pharmacy_pharled-view'); // view
    $app->any('/PharmacyPharledEdit[/{id}]', PharmacyPharledController::class . ':edit')->add(PermissionMiddleware::class)->setName('PharmacyPharledEdit-pharmacy_pharled-edit'); // edit
    $app->any('/PharmacyPharledDelete[/{id}]', PharmacyPharledController::class . ':delete')->add(PermissionMiddleware::class)->setName('PharmacyPharledDelete-pharmacy_pharled-delete'); // delete
    $app->any('/PharmacyPharledPreview', PharmacyPharledController::class . ':preview')->add(PermissionMiddleware::class)->setName('PharmacyPharledPreview-pharmacy_pharled-preview'); // preview
    $app->group(
        '/pharmacy_pharled',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', PharmacyPharledController::class . ':list')->add(PermissionMiddleware::class)->setName('pharmacy_pharled/list-pharmacy_pharled-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', PharmacyPharledController::class . ':add')->add(PermissionMiddleware::class)->setName('pharmacy_pharled/add-pharmacy_pharled-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', PharmacyPharledController::class . ':view')->add(PermissionMiddleware::class)->setName('pharmacy_pharled/view-pharmacy_pharled-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', PharmacyPharledController::class . ':edit')->add(PermissionMiddleware::class)->setName('pharmacy_pharled/edit-pharmacy_pharled-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', PharmacyPharledController::class . ':delete')->add(PermissionMiddleware::class)->setName('pharmacy_pharled/delete-pharmacy_pharled-delete-2'); // delete
            $group->any('/' . Config("PREVIEW_ACTION") . '', PharmacyPharledController::class . ':preview')->add(PermissionMiddleware::class)->setName('pharmacy_pharled/preview-pharmacy_pharled-preview-2'); // preview
        }
    );

    // pharmacy_storemast
    $app->any('/PharmacyStoremastList[/{id}]', PharmacyStoremastController::class . ':list')->add(PermissionMiddleware::class)->setName('PharmacyStoremastList-pharmacy_storemast-list'); // list
    $app->any('/PharmacyStoremastAdd[/{id}]', PharmacyStoremastController::class . ':add')->add(PermissionMiddleware::class)->setName('PharmacyStoremastAdd-pharmacy_storemast-add'); // add
    $app->any('/PharmacyStoremastAddopt', PharmacyStoremastController::class . ':addopt')->add(PermissionMiddleware::class)->setName('PharmacyStoremastAddopt-pharmacy_storemast-addopt'); // addopt
    $app->any('/PharmacyStoremastView[/{id}]', PharmacyStoremastController::class . ':view')->add(PermissionMiddleware::class)->setName('PharmacyStoremastView-pharmacy_storemast-view'); // view
    $app->any('/PharmacyStoremastEdit[/{id}]', PharmacyStoremastController::class . ':edit')->add(PermissionMiddleware::class)->setName('PharmacyStoremastEdit-pharmacy_storemast-edit'); // edit
    $app->any('/PharmacyStoremastDelete[/{id}]', PharmacyStoremastController::class . ':delete')->add(PermissionMiddleware::class)->setName('PharmacyStoremastDelete-pharmacy_storemast-delete'); // delete
    $app->any('/PharmacyStoremastSearch', PharmacyStoremastController::class . ':search')->add(PermissionMiddleware::class)->setName('PharmacyStoremastSearch-pharmacy_storemast-search'); // search
    $app->group(
        '/pharmacy_storemast',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', PharmacyStoremastController::class . ':list')->add(PermissionMiddleware::class)->setName('pharmacy_storemast/list-pharmacy_storemast-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', PharmacyStoremastController::class . ':add')->add(PermissionMiddleware::class)->setName('pharmacy_storemast/add-pharmacy_storemast-add-2'); // add
            $group->any('/' . Config("ADDOPT_ACTION") . '', PharmacyStoremastController::class . ':addopt')->add(PermissionMiddleware::class)->setName('pharmacy_storemast/addopt-pharmacy_storemast-addopt-2'); // addopt
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', PharmacyStoremastController::class . ':view')->add(PermissionMiddleware::class)->setName('pharmacy_storemast/view-pharmacy_storemast-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', PharmacyStoremastController::class . ':edit')->add(PermissionMiddleware::class)->setName('pharmacy_storemast/edit-pharmacy_storemast-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', PharmacyStoremastController::class . ':delete')->add(PermissionMiddleware::class)->setName('pharmacy_storemast/delete-pharmacy_storemast-delete-2'); // delete
            $group->any('/' . Config("SEARCH_ACTION") . '', PharmacyStoremastController::class . ':search')->add(PermissionMiddleware::class)->setName('pharmacy_storemast/search-pharmacy_storemast-search-2'); // search
        }
    );

    // pharmacy_customers
    $app->any('/PharmacyCustomersList[/{id}]', PharmacyCustomersController::class . ':list')->add(PermissionMiddleware::class)->setName('PharmacyCustomersList-pharmacy_customers-list'); // list
    $app->any('/PharmacyCustomersAdd[/{id}]', PharmacyCustomersController::class . ':add')->add(PermissionMiddleware::class)->setName('PharmacyCustomersAdd-pharmacy_customers-add'); // add
    $app->any('/PharmacyCustomersView[/{id}]', PharmacyCustomersController::class . ':view')->add(PermissionMiddleware::class)->setName('PharmacyCustomersView-pharmacy_customers-view'); // view
    $app->any('/PharmacyCustomersUpdate', PharmacyCustomersController::class . ':update')->add(PermissionMiddleware::class)->setName('PharmacyCustomersUpdate-pharmacy_customers-update'); // update
    $app->any('/PharmacyCustomersDelete[/{id}]', PharmacyCustomersController::class . ':delete')->add(PermissionMiddleware::class)->setName('PharmacyCustomersDelete-pharmacy_customers-delete'); // delete
    $app->group(
        '/pharmacy_customers',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', PharmacyCustomersController::class . ':list')->add(PermissionMiddleware::class)->setName('pharmacy_customers/list-pharmacy_customers-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', PharmacyCustomersController::class . ':add')->add(PermissionMiddleware::class)->setName('pharmacy_customers/add-pharmacy_customers-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', PharmacyCustomersController::class . ':view')->add(PermissionMiddleware::class)->setName('pharmacy_customers/view-pharmacy_customers-view-2'); // view
            $group->any('/' . Config("UPDATE_ACTION") . '', PharmacyCustomersController::class . ':update')->add(PermissionMiddleware::class)->setName('pharmacy_customers/update-pharmacy_customers-update-2'); // update
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', PharmacyCustomersController::class . ':delete')->add(PermissionMiddleware::class)->setName('pharmacy_customers/delete-pharmacy_customers-delete-2'); // delete
        }
    );

    // pharmacy_purchaseorder
    $app->any('/PharmacyPurchaseorderList[/{id}]', PharmacyPurchaseorderController::class . ':list')->add(PermissionMiddleware::class)->setName('PharmacyPurchaseorderList-pharmacy_purchaseorder-list'); // list
    $app->any('/PharmacyPurchaseorderAdd[/{id}]', PharmacyPurchaseorderController::class . ':add')->add(PermissionMiddleware::class)->setName('PharmacyPurchaseorderAdd-pharmacy_purchaseorder-add'); // add
    $app->any('/PharmacyPurchaseorderView[/{id}]', PharmacyPurchaseorderController::class . ':view')->add(PermissionMiddleware::class)->setName('PharmacyPurchaseorderView-pharmacy_purchaseorder-view'); // view
    $app->any('/PharmacyPurchaseorderEdit[/{id}]', PharmacyPurchaseorderController::class . ':edit')->add(PermissionMiddleware::class)->setName('PharmacyPurchaseorderEdit-pharmacy_purchaseorder-edit'); // edit
    $app->any('/PharmacyPurchaseorderDelete[/{id}]', PharmacyPurchaseorderController::class . ':delete')->add(PermissionMiddleware::class)->setName('PharmacyPurchaseorderDelete-pharmacy_purchaseorder-delete'); // delete
    $app->any('/PharmacyPurchaseorderPreview', PharmacyPurchaseorderController::class . ':preview')->add(PermissionMiddleware::class)->setName('PharmacyPurchaseorderPreview-pharmacy_purchaseorder-preview'); // preview
    $app->group(
        '/pharmacy_purchaseorder',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', PharmacyPurchaseorderController::class . ':list')->add(PermissionMiddleware::class)->setName('pharmacy_purchaseorder/list-pharmacy_purchaseorder-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', PharmacyPurchaseorderController::class . ':add')->add(PermissionMiddleware::class)->setName('pharmacy_purchaseorder/add-pharmacy_purchaseorder-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', PharmacyPurchaseorderController::class . ':view')->add(PermissionMiddleware::class)->setName('pharmacy_purchaseorder/view-pharmacy_purchaseorder-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', PharmacyPurchaseorderController::class . ':edit')->add(PermissionMiddleware::class)->setName('pharmacy_purchaseorder/edit-pharmacy_purchaseorder-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', PharmacyPurchaseorderController::class . ':delete')->add(PermissionMiddleware::class)->setName('pharmacy_purchaseorder/delete-pharmacy_purchaseorder-delete-2'); // delete
            $group->any('/' . Config("PREVIEW_ACTION") . '', PharmacyPurchaseorderController::class . ':preview')->add(PermissionMiddleware::class)->setName('pharmacy_purchaseorder/preview-pharmacy_purchaseorder-preview-2'); // preview
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', PharmacyPoController::class . ':list')->add(PermissionMiddleware::class)->setName('pharmacy_po/list-pharmacy_po-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', PharmacyPoController::class . ':add')->add(PermissionMiddleware::class)->setName('pharmacy_po/add-pharmacy_po-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', PharmacyPoController::class . ':view')->add(PermissionMiddleware::class)->setName('pharmacy_po/view-pharmacy_po-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', PharmacyPoController::class . ':edit')->add(PermissionMiddleware::class)->setName('pharmacy_po/edit-pharmacy_po-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', PharmacyPoController::class . ':delete')->add(PermissionMiddleware::class)->setName('pharmacy_po/delete-pharmacy_po-delete-2'); // delete
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', PharmacySuppliersController::class . ':list')->add(PermissionMiddleware::class)->setName('pharmacy_suppliers/list-pharmacy_suppliers-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', PharmacySuppliersController::class . ':add')->add(PermissionMiddleware::class)->setName('pharmacy_suppliers/add-pharmacy_suppliers-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', PharmacySuppliersController::class . ':view')->add(PermissionMiddleware::class)->setName('pharmacy_suppliers/view-pharmacy_suppliers-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', PharmacySuppliersController::class . ':edit')->add(PermissionMiddleware::class)->setName('pharmacy_suppliers/edit-pharmacy_suppliers-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', PharmacySuppliersController::class . ':delete')->add(PermissionMiddleware::class)->setName('pharmacy_suppliers/delete-pharmacy_suppliers-delete-2'); // delete
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
            $group->any('/' . Config("LIST_ACTION") . '[/{ProductCode}]', PharmacyProductsController::class . ':list')->add(PermissionMiddleware::class)->setName('pharmacy_products/list-pharmacy_products-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{ProductCode}]', PharmacyProductsController::class . ':add')->add(PermissionMiddleware::class)->setName('pharmacy_products/add-pharmacy_products-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{ProductCode}]', PharmacyProductsController::class . ':view')->add(PermissionMiddleware::class)->setName('pharmacy_products/view-pharmacy_products-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{ProductCode}]', PharmacyProductsController::class . ':edit')->add(PermissionMiddleware::class)->setName('pharmacy_products/edit-pharmacy_products-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{ProductCode}]', PharmacyProductsController::class . ':delete')->add(PermissionMiddleware::class)->setName('pharmacy_products/delete-pharmacy_products-delete-2'); // delete
        }
    );

    // view_pharmacygrn
    $app->any('/ViewPharmacygrnList[/{id}]', ViewPharmacygrnController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewPharmacygrnList-view_pharmacygrn-list'); // list
    $app->any('/ViewPharmacygrnAdd[/{id}]', ViewPharmacygrnController::class . ':add')->add(PermissionMiddleware::class)->setName('ViewPharmacygrnAdd-view_pharmacygrn-add'); // add
    $app->any('/ViewPharmacygrnView[/{id}]', ViewPharmacygrnController::class . ':view')->add(PermissionMiddleware::class)->setName('ViewPharmacygrnView-view_pharmacygrn-view'); // view
    $app->any('/ViewPharmacygrnEdit[/{id}]', ViewPharmacygrnController::class . ':edit')->add(PermissionMiddleware::class)->setName('ViewPharmacygrnEdit-view_pharmacygrn-edit'); // edit
    $app->any('/ViewPharmacygrnPreview', ViewPharmacygrnController::class . ':preview')->add(PermissionMiddleware::class)->setName('ViewPharmacygrnPreview-view_pharmacygrn-preview'); // preview
    $app->group(
        '/view_pharmacygrn',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', ViewPharmacygrnController::class . ':list')->add(PermissionMiddleware::class)->setName('view_pharmacygrn/list-view_pharmacygrn-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', ViewPharmacygrnController::class . ':add')->add(PermissionMiddleware::class)->setName('view_pharmacygrn/add-view_pharmacygrn-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', ViewPharmacygrnController::class . ':view')->add(PermissionMiddleware::class)->setName('view_pharmacygrn/view-view_pharmacygrn-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', ViewPharmacygrnController::class . ':edit')->add(PermissionMiddleware::class)->setName('view_pharmacygrn/edit-view_pharmacygrn-edit-2'); // edit
            $group->any('/' . Config("PREVIEW_ACTION") . '', ViewPharmacygrnController::class . ':preview')->add(PermissionMiddleware::class)->setName('view_pharmacygrn/preview-view_pharmacygrn-preview-2'); // preview
        }
    );

    // pharmacy_grn
    $app->any('/PharmacyGrnList[/{id}]', PharmacyGrnController::class . ':list')->add(PermissionMiddleware::class)->setName('PharmacyGrnList-pharmacy_grn-list'); // list
    $app->any('/PharmacyGrnAdd[/{id}]', PharmacyGrnController::class . ':add')->add(PermissionMiddleware::class)->setName('PharmacyGrnAdd-pharmacy_grn-add'); // add
    $app->any('/PharmacyGrnView[/{id}]', PharmacyGrnController::class . ':view')->add(PermissionMiddleware::class)->setName('PharmacyGrnView-pharmacy_grn-view'); // view
    $app->any('/PharmacyGrnEdit[/{id}]', PharmacyGrnController::class . ':edit')->add(PermissionMiddleware::class)->setName('PharmacyGrnEdit-pharmacy_grn-edit'); // edit
    $app->any('/PharmacyGrnDelete[/{id}]', PharmacyGrnController::class . ':delete')->add(PermissionMiddleware::class)->setName('PharmacyGrnDelete-pharmacy_grn-delete'); // delete
    $app->any('/PharmacyGrnPreview', PharmacyGrnController::class . ':preview')->add(PermissionMiddleware::class)->setName('PharmacyGrnPreview-pharmacy_grn-preview'); // preview
    $app->group(
        '/pharmacy_grn',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', PharmacyGrnController::class . ':list')->add(PermissionMiddleware::class)->setName('pharmacy_grn/list-pharmacy_grn-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', PharmacyGrnController::class . ':add')->add(PermissionMiddleware::class)->setName('pharmacy_grn/add-pharmacy_grn-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', PharmacyGrnController::class . ':view')->add(PermissionMiddleware::class)->setName('pharmacy_grn/view-pharmacy_grn-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', PharmacyGrnController::class . ':edit')->add(PermissionMiddleware::class)->setName('pharmacy_grn/edit-pharmacy_grn-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', PharmacyGrnController::class . ':delete')->add(PermissionMiddleware::class)->setName('pharmacy_grn/delete-pharmacy_grn-delete-2'); // delete
            $group->any('/' . Config("PREVIEW_ACTION") . '', PharmacyGrnController::class . ':preview')->add(PermissionMiddleware::class)->setName('pharmacy_grn/preview-pharmacy_grn-preview-2'); // preview
        }
    );

    // view_ivf_treatment_plan
    $app->any('/ViewIvfTreatmentPlanList[/{id}]', ViewIvfTreatmentPlanController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewIvfTreatmentPlanList-view_ivf_treatment_plan-list'); // list
    $app->any('/ViewIvfTreatmentPlanAdd[/{id}]', ViewIvfTreatmentPlanController::class . ':add')->add(PermissionMiddleware::class)->setName('ViewIvfTreatmentPlanAdd-view_ivf_treatment_plan-add'); // add
    $app->any('/ViewIvfTreatmentPlanView[/{id}]', ViewIvfTreatmentPlanController::class . ':view')->add(PermissionMiddleware::class)->setName('ViewIvfTreatmentPlanView-view_ivf_treatment_plan-view'); // view
    $app->any('/ViewIvfTreatmentPlanEdit[/{id}]', ViewIvfTreatmentPlanController::class . ':edit')->add(PermissionMiddleware::class)->setName('ViewIvfTreatmentPlanEdit-view_ivf_treatment_plan-edit'); // edit
    $app->any('/ViewIvfTreatmentPlanDelete[/{id}]', ViewIvfTreatmentPlanController::class . ':delete')->add(PermissionMiddleware::class)->setName('ViewIvfTreatmentPlanDelete-view_ivf_treatment_plan-delete'); // delete
    $app->group(
        '/view_ivf_treatment_plan',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', ViewIvfTreatmentPlanController::class . ':list')->add(PermissionMiddleware::class)->setName('view_ivf_treatment_plan/list-view_ivf_treatment_plan-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', ViewIvfTreatmentPlanController::class . ':add')->add(PermissionMiddleware::class)->setName('view_ivf_treatment_plan/add-view_ivf_treatment_plan-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', ViewIvfTreatmentPlanController::class . ':view')->add(PermissionMiddleware::class)->setName('view_ivf_treatment_plan/view-view_ivf_treatment_plan-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', ViewIvfTreatmentPlanController::class . ':edit')->add(PermissionMiddleware::class)->setName('view_ivf_treatment_plan/edit-view_ivf_treatment_plan-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', ViewIvfTreatmentPlanController::class . ':delete')->add(PermissionMiddleware::class)->setName('view_ivf_treatment_plan/delete-view_ivf_treatment_plan-delete-2'); // delete
        }
    );

    // view_barcode_ivf
    $app->any('/ViewBarcodeIvfList[/{id}]', ViewBarcodeIvfController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewBarcodeIvfList-view_barcode_ivf-list'); // list
    $app->any('/ViewBarcodeIvfView[/{id}]', ViewBarcodeIvfController::class . ':view')->add(PermissionMiddleware::class)->setName('ViewBarcodeIvfView-view_barcode_ivf-view'); // view
    $app->group(
        '/view_barcode_ivf',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', ViewBarcodeIvfController::class . ':list')->add(PermissionMiddleware::class)->setName('view_barcode_ivf/list-view_barcode_ivf-list-2'); // list
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', ViewBarcodeIvfController::class . ':view')->add(PermissionMiddleware::class)->setName('view_barcode_ivf/view-view_barcode_ivf-view-2'); // view
        }
    );

    // view_donor_ivf
    $app->any('/ViewDonorIvfList[/{id}]', ViewDonorIvfController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewDonorIvfList-view_donor_ivf-list'); // list
    $app->any('/ViewDonorIvfAdd[/{id}]', ViewDonorIvfController::class . ':add')->add(PermissionMiddleware::class)->setName('ViewDonorIvfAdd-view_donor_ivf-add'); // add
    $app->any('/ViewDonorIvfView[/{id}]', ViewDonorIvfController::class . ':view')->add(PermissionMiddleware::class)->setName('ViewDonorIvfView-view_donor_ivf-view'); // view
    $app->any('/ViewDonorIvfEdit[/{id}]', ViewDonorIvfController::class . ':edit')->add(PermissionMiddleware::class)->setName('ViewDonorIvfEdit-view_donor_ivf-edit'); // edit
    $app->any('/ViewDonorIvfDelete[/{id}]', ViewDonorIvfController::class . ':delete')->add(PermissionMiddleware::class)->setName('ViewDonorIvfDelete-view_donor_ivf-delete'); // delete
    $app->any('/ViewDonorIvfSearch', ViewDonorIvfController::class . ':search')->add(PermissionMiddleware::class)->setName('ViewDonorIvfSearch-view_donor_ivf-search'); // search
    $app->group(
        '/view_donor_ivf',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', ViewDonorIvfController::class . ':list')->add(PermissionMiddleware::class)->setName('view_donor_ivf/list-view_donor_ivf-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', ViewDonorIvfController::class . ':add')->add(PermissionMiddleware::class)->setName('view_donor_ivf/add-view_donor_ivf-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', ViewDonorIvfController::class . ':view')->add(PermissionMiddleware::class)->setName('view_donor_ivf/view-view_donor_ivf-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', ViewDonorIvfController::class . ':edit')->add(PermissionMiddleware::class)->setName('view_donor_ivf/edit-view_donor_ivf-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', ViewDonorIvfController::class . ':delete')->add(PermissionMiddleware::class)->setName('view_donor_ivf/delete-view_donor_ivf-delete-2'); // delete
            $group->any('/' . Config("SEARCH_ACTION") . '', ViewDonorIvfController::class . ':search')->add(PermissionMiddleware::class)->setName('view_donor_ivf/search-view_donor_ivf-search-2'); // search
        }
    );

    // donorivf
    $app->any('/Donorivf[/{params:.*}]', DonorivfController::class)->add(PermissionMiddleware::class)->setName('Donorivf-donorivf-custom'); // custom

    // ivf_semenan_medication
    $app->any('/IvfSemenanMedicationList[/{id}]', IvfSemenanMedicationController::class . ':list')->add(PermissionMiddleware::class)->setName('IvfSemenanMedicationList-ivf_semenan_medication-list'); // list
    $app->any('/IvfSemenanMedicationAdd[/{id}]', IvfSemenanMedicationController::class . ':add')->add(PermissionMiddleware::class)->setName('IvfSemenanMedicationAdd-ivf_semenan_medication-add'); // add
    $app->any('/IvfSemenanMedicationAddopt', IvfSemenanMedicationController::class . ':addopt')->add(PermissionMiddleware::class)->setName('IvfSemenanMedicationAddopt-ivf_semenan_medication-addopt'); // addopt
    $app->any('/IvfSemenanMedicationView[/{id}]', IvfSemenanMedicationController::class . ':view')->add(PermissionMiddleware::class)->setName('IvfSemenanMedicationView-ivf_semenan_medication-view'); // view
    $app->any('/IvfSemenanMedicationEdit[/{id}]', IvfSemenanMedicationController::class . ':edit')->add(PermissionMiddleware::class)->setName('IvfSemenanMedicationEdit-ivf_semenan_medication-edit'); // edit
    $app->any('/IvfSemenanMedicationDelete[/{id}]', IvfSemenanMedicationController::class . ':delete')->add(PermissionMiddleware::class)->setName('IvfSemenanMedicationDelete-ivf_semenan_medication-delete'); // delete
    $app->group(
        '/ivf_semenan_medication',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', IvfSemenanMedicationController::class . ':list')->add(PermissionMiddleware::class)->setName('ivf_semenan_medication/list-ivf_semenan_medication-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', IvfSemenanMedicationController::class . ':add')->add(PermissionMiddleware::class)->setName('ivf_semenan_medication/add-ivf_semenan_medication-add-2'); // add
            $group->any('/' . Config("ADDOPT_ACTION") . '', IvfSemenanMedicationController::class . ':addopt')->add(PermissionMiddleware::class)->setName('ivf_semenan_medication/addopt-ivf_semenan_medication-addopt-2'); // addopt
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', IvfSemenanMedicationController::class . ':view')->add(PermissionMiddleware::class)->setName('ivf_semenan_medication/view-ivf_semenan_medication-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', IvfSemenanMedicationController::class . ':edit')->add(PermissionMiddleware::class)->setName('ivf_semenan_medication/edit-ivf_semenan_medication-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', IvfSemenanMedicationController::class . ':delete')->add(PermissionMiddleware::class)->setName('ivf_semenan_medication/delete-ivf_semenan_medication-delete-2'); // delete
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', HelpController::class . ':list')->add(PermissionMiddleware::class)->setName('help/list-help-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', HelpController::class . ':add')->add(PermissionMiddleware::class)->setName('help/add-help-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', HelpController::class . ':view')->add(PermissionMiddleware::class)->setName('help/view-help-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', HelpController::class . ':edit')->add(PermissionMiddleware::class)->setName('help/edit-help-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', HelpController::class . ':delete')->add(PermissionMiddleware::class)->setName('help/delete-help-delete-2'); // delete
        }
    );

    // view_followups
    $app->any('/ViewFollowupsList[/{id}]', ViewFollowupsController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewFollowupsList-view_followups-list'); // list
    $app->group(
        '/view_followups',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', ViewFollowupsController::class . ':list')->add(PermissionMiddleware::class)->setName('view_followups/list-view_followups-list-2'); // list
        }
    );

    // view_pharmacy_search_product
    $app->any('/ViewPharmacySearchProductList[/{id}]', ViewPharmacySearchProductController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewPharmacySearchProductList-view_pharmacy_search_product-list'); // list
    $app->any('/ViewPharmacySearchProductSearch', ViewPharmacySearchProductController::class . ':search')->add(PermissionMiddleware::class)->setName('ViewPharmacySearchProductSearch-view_pharmacy_search_product-search'); // search
    $app->group(
        '/view_pharmacy_search_product',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', ViewPharmacySearchProductController::class . ':list')->add(PermissionMiddleware::class)->setName('view_pharmacy_search_product/list-view_pharmacy_search_product-list-2'); // list
            $group->any('/' . Config("SEARCH_ACTION") . '', ViewPharmacySearchProductController::class . ':search')->add(PermissionMiddleware::class)->setName('view_pharmacy_search_product/search-view_pharmacy_search_product-search-2'); // search
        }
    );

    // pharmacy_master_genericgrp
    $app->any('/PharmacyMasterGenericgrpList[/{id}]', PharmacyMasterGenericgrpController::class . ':list')->add(PermissionMiddleware::class)->setName('PharmacyMasterGenericgrpList-pharmacy_master_genericgrp-list'); // list
    $app->any('/PharmacyMasterGenericgrpAdd[/{id}]', PharmacyMasterGenericgrpController::class . ':add')->add(PermissionMiddleware::class)->setName('PharmacyMasterGenericgrpAdd-pharmacy_master_genericgrp-add'); // add
    $app->any('/PharmacyMasterGenericgrpView[/{id}]', PharmacyMasterGenericgrpController::class . ':view')->add(PermissionMiddleware::class)->setName('PharmacyMasterGenericgrpView-pharmacy_master_genericgrp-view'); // view
    $app->any('/PharmacyMasterGenericgrpEdit[/{id}]', PharmacyMasterGenericgrpController::class . ':edit')->add(PermissionMiddleware::class)->setName('PharmacyMasterGenericgrpEdit-pharmacy_master_genericgrp-edit'); // edit
    $app->group(
        '/pharmacy_master_genericgrp',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', PharmacyMasterGenericgrpController::class . ':list')->add(PermissionMiddleware::class)->setName('pharmacy_master_genericgrp/list-pharmacy_master_genericgrp-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', PharmacyMasterGenericgrpController::class . ':add')->add(PermissionMiddleware::class)->setName('pharmacy_master_genericgrp/add-pharmacy_master_genericgrp-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', PharmacyMasterGenericgrpController::class . ':view')->add(PermissionMiddleware::class)->setName('pharmacy_master_genericgrp/view-pharmacy_master_genericgrp-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', PharmacyMasterGenericgrpController::class . ':edit')->add(PermissionMiddleware::class)->setName('pharmacy_master_genericgrp/edit-pharmacy_master_genericgrp-edit-2'); // edit
        }
    );

    // pharmacy_master_mfr_master
    $app->any('/PharmacyMasterMfrMasterList[/{id}]', PharmacyMasterMfrMasterController::class . ':list')->add(PermissionMiddleware::class)->setName('PharmacyMasterMfrMasterList-pharmacy_master_mfr_master-list'); // list
    $app->any('/PharmacyMasterMfrMasterAdd[/{id}]', PharmacyMasterMfrMasterController::class . ':add')->add(PermissionMiddleware::class)->setName('PharmacyMasterMfrMasterAdd-pharmacy_master_mfr_master-add'); // add
    $app->any('/PharmacyMasterMfrMasterView[/{id}]', PharmacyMasterMfrMasterController::class . ':view')->add(PermissionMiddleware::class)->setName('PharmacyMasterMfrMasterView-pharmacy_master_mfr_master-view'); // view
    $app->any('/PharmacyMasterMfrMasterEdit[/{id}]', PharmacyMasterMfrMasterController::class . ':edit')->add(PermissionMiddleware::class)->setName('PharmacyMasterMfrMasterEdit-pharmacy_master_mfr_master-edit'); // edit
    $app->group(
        '/pharmacy_master_mfr_master',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', PharmacyMasterMfrMasterController::class . ':list')->add(PermissionMiddleware::class)->setName('pharmacy_master_mfr_master/list-pharmacy_master_mfr_master-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', PharmacyMasterMfrMasterController::class . ':add')->add(PermissionMiddleware::class)->setName('pharmacy_master_mfr_master/add-pharmacy_master_mfr_master-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', PharmacyMasterMfrMasterController::class . ':view')->add(PermissionMiddleware::class)->setName('pharmacy_master_mfr_master/view-pharmacy_master_mfr_master-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', PharmacyMasterMfrMasterController::class . ':edit')->add(PermissionMiddleware::class)->setName('pharmacy_master_mfr_master/edit-pharmacy_master_mfr_master-edit-2'); // edit
        }
    );

    // pharmacy_master_product_similar
    $app->any('/PharmacyMasterProductSimilarList[/{id}]', PharmacyMasterProductSimilarController::class . ':list')->add(PermissionMiddleware::class)->setName('PharmacyMasterProductSimilarList-pharmacy_master_product_similar-list'); // list
    $app->any('/PharmacyMasterProductSimilarAdd[/{id}]', PharmacyMasterProductSimilarController::class . ':add')->add(PermissionMiddleware::class)->setName('PharmacyMasterProductSimilarAdd-pharmacy_master_product_similar-add'); // add
    $app->any('/PharmacyMasterProductSimilarView[/{id}]', PharmacyMasterProductSimilarController::class . ':view')->add(PermissionMiddleware::class)->setName('PharmacyMasterProductSimilarView-pharmacy_master_product_similar-view'); // view
    $app->any('/PharmacyMasterProductSimilarEdit[/{id}]', PharmacyMasterProductSimilarController::class . ':edit')->add(PermissionMiddleware::class)->setName('PharmacyMasterProductSimilarEdit-pharmacy_master_product_similar-edit'); // edit
    $app->group(
        '/pharmacy_master_product_similar',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', PharmacyMasterProductSimilarController::class . ':list')->add(PermissionMiddleware::class)->setName('pharmacy_master_product_similar/list-pharmacy_master_product_similar-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', PharmacyMasterProductSimilarController::class . ':add')->add(PermissionMiddleware::class)->setName('pharmacy_master_product_similar/add-pharmacy_master_product_similar-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', PharmacyMasterProductSimilarController::class . ':view')->add(PermissionMiddleware::class)->setName('pharmacy_master_product_similar/view-pharmacy_master_product_similar-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', PharmacyMasterProductSimilarController::class . ':edit')->add(PermissionMiddleware::class)->setName('pharmacy_master_product_similar/edit-pharmacy_master_product_similar-edit-2'); // edit
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', PharmacyBillingVoucherController::class . ':list')->add(PermissionMiddleware::class)->setName('pharmacy_billing_voucher/list-pharmacy_billing_voucher-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', PharmacyBillingVoucherController::class . ':add')->add(PermissionMiddleware::class)->setName('pharmacy_billing_voucher/add-pharmacy_billing_voucher-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', PharmacyBillingVoucherController::class . ':view')->add(PermissionMiddleware::class)->setName('pharmacy_billing_voucher/view-pharmacy_billing_voucher-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', PharmacyBillingVoucherController::class . ':edit')->add(PermissionMiddleware::class)->setName('pharmacy_billing_voucher/edit-pharmacy_billing_voucher-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', PharmacyBillingVoucherController::class . ':delete')->add(PermissionMiddleware::class)->setName('pharmacy_billing_voucher/delete-pharmacy_billing_voucher-delete-2'); // delete
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', PharmacyBillingTransferController::class . ':list')->add(PermissionMiddleware::class)->setName('pharmacy_billing_transfer/list-pharmacy_billing_transfer-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', PharmacyBillingTransferController::class . ':add')->add(PermissionMiddleware::class)->setName('pharmacy_billing_transfer/add-pharmacy_billing_transfer-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', PharmacyBillingTransferController::class . ':view')->add(PermissionMiddleware::class)->setName('pharmacy_billing_transfer/view-pharmacy_billing_transfer-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', PharmacyBillingTransferController::class . ':edit')->add(PermissionMiddleware::class)->setName('pharmacy_billing_transfer/edit-pharmacy_billing_transfer-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', PharmacyBillingTransferController::class . ':delete')->add(PermissionMiddleware::class)->setName('pharmacy_billing_transfer/delete-pharmacy_billing_transfer-delete-2'); // delete
        }
    );

    // pharmacy_comb_master
    $app->any('/PharmacyCombMasterList[/{id}]', PharmacyCombMasterController::class . ':list')->add(PermissionMiddleware::class)->setName('PharmacyCombMasterList-pharmacy_comb_master-list'); // list
    $app->any('/PharmacyCombMasterAdd[/{id}]', PharmacyCombMasterController::class . ':add')->add(PermissionMiddleware::class)->setName('PharmacyCombMasterAdd-pharmacy_comb_master-add'); // add
    $app->any('/PharmacyCombMasterView[/{id}]', PharmacyCombMasterController::class . ':view')->add(PermissionMiddleware::class)->setName('PharmacyCombMasterView-pharmacy_comb_master-view'); // view
    $app->any('/PharmacyCombMasterEdit[/{id}]', PharmacyCombMasterController::class . ':edit')->add(PermissionMiddleware::class)->setName('PharmacyCombMasterEdit-pharmacy_comb_master-edit'); // edit
    $app->group(
        '/pharmacy_comb_master',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', PharmacyCombMasterController::class . ':list')->add(PermissionMiddleware::class)->setName('pharmacy_comb_master/list-pharmacy_comb_master-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', PharmacyCombMasterController::class . ':add')->add(PermissionMiddleware::class)->setName('pharmacy_comb_master/add-pharmacy_comb_master-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', PharmacyCombMasterController::class . ':view')->add(PermissionMiddleware::class)->setName('pharmacy_comb_master/view-pharmacy_comb_master-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', PharmacyCombMasterController::class . ':edit')->add(PermissionMiddleware::class)->setName('pharmacy_comb_master/edit-pharmacy_comb_master-edit-2'); // edit
        }
    );

    // pharmacy_combination
    $app->any('/PharmacyCombinationList[/{id}]', PharmacyCombinationController::class . ':list')->add(PermissionMiddleware::class)->setName('PharmacyCombinationList-pharmacy_combination-list'); // list
    $app->any('/PharmacyCombinationAdd[/{id}]', PharmacyCombinationController::class . ':add')->add(PermissionMiddleware::class)->setName('PharmacyCombinationAdd-pharmacy_combination-add'); // add
    $app->any('/PharmacyCombinationView[/{id}]', PharmacyCombinationController::class . ':view')->add(PermissionMiddleware::class)->setName('PharmacyCombinationView-pharmacy_combination-view'); // view
    $app->any('/PharmacyCombinationEdit[/{id}]', PharmacyCombinationController::class . ':edit')->add(PermissionMiddleware::class)->setName('PharmacyCombinationEdit-pharmacy_combination-edit'); // edit
    $app->group(
        '/pharmacy_combination',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', PharmacyCombinationController::class . ':list')->add(PermissionMiddleware::class)->setName('pharmacy_combination/list-pharmacy_combination-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', PharmacyCombinationController::class . ':add')->add(PermissionMiddleware::class)->setName('pharmacy_combination/add-pharmacy_combination-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', PharmacyCombinationController::class . ':view')->add(PermissionMiddleware::class)->setName('pharmacy_combination/view-pharmacy_combination-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', PharmacyCombinationController::class . ':edit')->add(PermissionMiddleware::class)->setName('pharmacy_combination/edit-pharmacy_combination-edit-2'); // edit
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', HospitalPharmacyController::class . ':list')->add(PermissionMiddleware::class)->setName('hospital_pharmacy/list-hospital_pharmacy-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', HospitalPharmacyController::class . ':add')->add(PermissionMiddleware::class)->setName('hospital_pharmacy/add-hospital_pharmacy-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', HospitalPharmacyController::class . ':view')->add(PermissionMiddleware::class)->setName('hospital_pharmacy/view-hospital_pharmacy-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', HospitalPharmacyController::class . ':edit')->add(PermissionMiddleware::class)->setName('hospital_pharmacy/edit-hospital_pharmacy-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', HospitalPharmacyController::class . ':delete')->add(PermissionMiddleware::class)->setName('hospital_pharmacy/delete-hospital_pharmacy-delete-2'); // delete
        }
    );

    // view_ip_admission
    $app->any('/ViewIpAdmissionList[/{id}]', ViewIpAdmissionController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewIpAdmissionList-view_ip_admission-list'); // list
    $app->group(
        '/view_ip_admission',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', ViewIpAdmissionController::class . ':list')->add(PermissionMiddleware::class)->setName('view_ip_admission/list-view_ip_admission-list-2'); // list
        }
    );

    // view_ip_billing
    $app->any('/ViewIpBillingList[/{id}]', ViewIpBillingController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewIpBillingList-view_ip_billing-list'); // list
    $app->any('/ViewIpBillingView[/{id}]', ViewIpBillingController::class . ':view')->add(PermissionMiddleware::class)->setName('ViewIpBillingView-view_ip_billing-view'); // view
    $app->any('/ViewIpBillingEdit[/{id}]', ViewIpBillingController::class . ':edit')->add(PermissionMiddleware::class)->setName('ViewIpBillingEdit-view_ip_billing-edit'); // edit
    $app->group(
        '/view_ip_billing',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', ViewIpBillingController::class . ':list')->add(PermissionMiddleware::class)->setName('view_ip_billing/list-view_ip_billing-list-2'); // list
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', ViewIpBillingController::class . ':view')->add(PermissionMiddleware::class)->setName('view_ip_billing/view-view_ip_billing-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', ViewIpBillingController::class . ':edit')->add(PermissionMiddleware::class)->setName('view_ip_billing/edit-view_ip_billing-edit-2'); // edit
        }
    );

    // view_ip_advance
    $app->any('/ViewIpAdvanceList[/{id}]', ViewIpAdvanceController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewIpAdvanceList-view_ip_advance-list'); // list
    $app->any('/ViewIpAdvanceAdd[/{id}]', ViewIpAdvanceController::class . ':add')->add(PermissionMiddleware::class)->setName('ViewIpAdvanceAdd-view_ip_advance-add'); // add
    $app->any('/ViewIpAdvanceView[/{id}]', ViewIpAdvanceController::class . ':view')->add(PermissionMiddleware::class)->setName('ViewIpAdvanceView-view_ip_advance-view'); // view
    $app->any('/ViewIpAdvanceEdit[/{id}]', ViewIpAdvanceController::class . ':edit')->add(PermissionMiddleware::class)->setName('ViewIpAdvanceEdit-view_ip_advance-edit'); // edit
    $app->any('/ViewIpAdvancePreview', ViewIpAdvanceController::class . ':preview')->add(PermissionMiddleware::class)->setName('ViewIpAdvancePreview-view_ip_advance-preview'); // preview
    $app->group(
        '/view_ip_advance',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', ViewIpAdvanceController::class . ':list')->add(PermissionMiddleware::class)->setName('view_ip_advance/list-view_ip_advance-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', ViewIpAdvanceController::class . ':add')->add(PermissionMiddleware::class)->setName('view_ip_advance/add-view_ip_advance-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', ViewIpAdvanceController::class . ':view')->add(PermissionMiddleware::class)->setName('view_ip_advance/view-view_ip_advance-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', ViewIpAdvanceController::class . ':edit')->add(PermissionMiddleware::class)->setName('view_ip_advance/edit-view_ip_advance-edit-2'); // edit
            $group->any('/' . Config("PREVIEW_ACTION") . '', ViewIpAdvanceController::class . ':preview')->add(PermissionMiddleware::class)->setName('view_ip_advance/preview-view_ip_advance-preview-2'); // preview
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', BillingRefundVoucherController::class . ':list')->add(PermissionMiddleware::class)->setName('billing_refund_voucher/list-billing_refund_voucher-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', BillingRefundVoucherController::class . ':add')->add(PermissionMiddleware::class)->setName('billing_refund_voucher/add-billing_refund_voucher-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', BillingRefundVoucherController::class . ':view')->add(PermissionMiddleware::class)->setName('billing_refund_voucher/view-billing_refund_voucher-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', BillingRefundVoucherController::class . ':edit')->add(PermissionMiddleware::class)->setName('billing_refund_voucher/edit-billing_refund_voucher-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', BillingRefundVoucherController::class . ':delete')->add(PermissionMiddleware::class)->setName('billing_refund_voucher/delete-billing_refund_voucher-delete-2'); // delete
        }
    );

    // view_follow_up_tracking
    $app->any('/ViewFollowUpTrackingList', ViewFollowUpTrackingController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewFollowUpTrackingList-view_follow_up_tracking-list'); // list
    $app->group(
        '/view_follow_up_tracking',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '', ViewFollowUpTrackingController::class . ':list')->add(PermissionMiddleware::class)->setName('view_follow_up_tracking/list-view_follow_up_tracking-list-2'); // list
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', DepositdetailsController::class . ':list')->add(PermissionMiddleware::class)->setName('depositdetails/list-depositdetails-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', DepositdetailsController::class . ':add')->add(PermissionMiddleware::class)->setName('depositdetails/add-depositdetails-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', DepositdetailsController::class . ':view')->add(PermissionMiddleware::class)->setName('depositdetails/view-depositdetails-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', DepositdetailsController::class . ':edit')->add(PermissionMiddleware::class)->setName('depositdetails/edit-depositdetails-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', DepositdetailsController::class . ':delete')->add(PermissionMiddleware::class)->setName('depositdetails/delete-depositdetails-delete-2'); // delete
        }
    );

    // bankbranches
    $app->any('/BankbranchesList[/{id}]', BankbranchesController::class . ':list')->add(PermissionMiddleware::class)->setName('BankbranchesList-bankbranches-list'); // list
    $app->any('/BankbranchesAdd[/{id}]', BankbranchesController::class . ':add')->add(PermissionMiddleware::class)->setName('BankbranchesAdd-bankbranches-add'); // add
    $app->any('/BankbranchesAddopt', BankbranchesController::class . ':addopt')->add(PermissionMiddleware::class)->setName('BankbranchesAddopt-bankbranches-addopt'); // addopt
    $app->any('/BankbranchesView[/{id}]', BankbranchesController::class . ':view')->add(PermissionMiddleware::class)->setName('BankbranchesView-bankbranches-view'); // view
    $app->any('/BankbranchesEdit[/{id}]', BankbranchesController::class . ':edit')->add(PermissionMiddleware::class)->setName('BankbranchesEdit-bankbranches-edit'); // edit
    $app->any('/BankbranchesDelete[/{id}]', BankbranchesController::class . ':delete')->add(PermissionMiddleware::class)->setName('BankbranchesDelete-bankbranches-delete'); // delete
    $app->group(
        '/bankbranches',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', BankbranchesController::class . ':list')->add(PermissionMiddleware::class)->setName('bankbranches/list-bankbranches-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', BankbranchesController::class . ':add')->add(PermissionMiddleware::class)->setName('bankbranches/add-bankbranches-add-2'); // add
            $group->any('/' . Config("ADDOPT_ACTION") . '', BankbranchesController::class . ':addopt')->add(PermissionMiddleware::class)->setName('bankbranches/addopt-bankbranches-addopt-2'); // addopt
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', BankbranchesController::class . ':view')->add(PermissionMiddleware::class)->setName('bankbranches/view-bankbranches-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', BankbranchesController::class . ':edit')->add(PermissionMiddleware::class)->setName('bankbranches/edit-bankbranches-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', BankbranchesController::class . ':delete')->add(PermissionMiddleware::class)->setName('bankbranches/delete-bankbranches-delete-2'); // delete
        }
    );

    // banktransferto
    $app->any('/BanktransfertoList[/{id}]', BanktransfertoController::class . ':list')->add(PermissionMiddleware::class)->setName('BanktransfertoList-banktransferto-list'); // list
    $app->any('/BanktransfertoAdd[/{id}]', BanktransfertoController::class . ':add')->add(PermissionMiddleware::class)->setName('BanktransfertoAdd-banktransferto-add'); // add
    $app->any('/BanktransfertoAddopt', BanktransfertoController::class . ':addopt')->add(PermissionMiddleware::class)->setName('BanktransfertoAddopt-banktransferto-addopt'); // addopt
    $app->any('/BanktransfertoView[/{id}]', BanktransfertoController::class . ':view')->add(PermissionMiddleware::class)->setName('BanktransfertoView-banktransferto-view'); // view
    $app->any('/BanktransfertoEdit[/{id}]', BanktransfertoController::class . ':edit')->add(PermissionMiddleware::class)->setName('BanktransfertoEdit-banktransferto-edit'); // edit
    $app->any('/BanktransfertoDelete[/{id}]', BanktransfertoController::class . ':delete')->add(PermissionMiddleware::class)->setName('BanktransfertoDelete-banktransferto-delete'); // delete
    $app->group(
        '/banktransferto',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', BanktransfertoController::class . ':list')->add(PermissionMiddleware::class)->setName('banktransferto/list-banktransferto-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', BanktransfertoController::class . ':add')->add(PermissionMiddleware::class)->setName('banktransferto/add-banktransferto-add-2'); // add
            $group->any('/' . Config("ADDOPT_ACTION") . '', BanktransfertoController::class . ':addopt')->add(PermissionMiddleware::class)->setName('banktransferto/addopt-banktransferto-addopt-2'); // addopt
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', BanktransfertoController::class . ':view')->add(PermissionMiddleware::class)->setName('banktransferto/view-banktransferto-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', BanktransfertoController::class . ':edit')->add(PermissionMiddleware::class)->setName('banktransferto/edit-banktransferto-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', BanktransfertoController::class . ':delete')->add(PermissionMiddleware::class)->setName('banktransferto/delete-banktransferto-delete-2'); // delete
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', HospitalStoreController::class . ':list')->add(PermissionMiddleware::class)->setName('hospital_store/list-hospital_store-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', HospitalStoreController::class . ':add')->add(PermissionMiddleware::class)->setName('hospital_store/add-hospital_store-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', HospitalStoreController::class . ':view')->add(PermissionMiddleware::class)->setName('hospital_store/view-hospital_store-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', HospitalStoreController::class . ':edit')->add(PermissionMiddleware::class)->setName('hospital_store/edit-hospital_store-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', HospitalStoreController::class . ':delete')->add(PermissionMiddleware::class)->setName('hospital_store/delete-hospital_store-delete-2'); // delete
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', StoreIntentIssueController::class . ':list')->add(PermissionMiddleware::class)->setName('store_intent_issue/list-store_intent_issue-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', StoreIntentIssueController::class . ':add')->add(PermissionMiddleware::class)->setName('store_intent_issue/add-store_intent_issue-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', StoreIntentIssueController::class . ':view')->add(PermissionMiddleware::class)->setName('store_intent_issue/view-store_intent_issue-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', StoreIntentIssueController::class . ':edit')->add(PermissionMiddleware::class)->setName('store_intent_issue/edit-store_intent_issue-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', StoreIntentIssueController::class . ':delete')->add(PermissionMiddleware::class)->setName('store_intent_issue/delete-store_intent_issue-delete-2'); // delete
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', StoreStoreledController::class . ':list')->add(PermissionMiddleware::class)->setName('store_storeled/list-store_storeled-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', StoreStoreledController::class . ':add')->add(PermissionMiddleware::class)->setName('store_storeled/add-store_storeled-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', StoreStoreledController::class . ':view')->add(PermissionMiddleware::class)->setName('store_storeled/view-store_storeled-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', StoreStoreledController::class . ':edit')->add(PermissionMiddleware::class)->setName('store_storeled/edit-store_storeled-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', StoreStoreledController::class . ':delete')->add(PermissionMiddleware::class)->setName('store_storeled/delete-store_storeled-delete-2'); // delete
        }
    );

    // store_storemast
    $app->any('/StoreStoremastList[/{id}]', StoreStoremastController::class . ':list')->add(PermissionMiddleware::class)->setName('StoreStoremastList-store_storemast-list'); // list
    $app->any('/StoreStoremastAdd[/{id}]', StoreStoremastController::class . ':add')->add(PermissionMiddleware::class)->setName('StoreStoremastAdd-store_storemast-add'); // add
    $app->any('/StoreStoremastAddopt', StoreStoremastController::class . ':addopt')->add(PermissionMiddleware::class)->setName('StoreStoremastAddopt-store_storemast-addopt'); // addopt
    $app->any('/StoreStoremastView[/{id}]', StoreStoremastController::class . ':view')->add(PermissionMiddleware::class)->setName('StoreStoremastView-store_storemast-view'); // view
    $app->any('/StoreStoremastEdit[/{id}]', StoreStoremastController::class . ':edit')->add(PermissionMiddleware::class)->setName('StoreStoremastEdit-store_storemast-edit'); // edit
    $app->any('/StoreStoremastDelete[/{id}]', StoreStoremastController::class . ':delete')->add(PermissionMiddleware::class)->setName('StoreStoremastDelete-store_storemast-delete'); // delete
    $app->group(
        '/store_storemast',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', StoreStoremastController::class . ':list')->add(PermissionMiddleware::class)->setName('store_storemast/list-store_storemast-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', StoreStoremastController::class . ':add')->add(PermissionMiddleware::class)->setName('store_storemast/add-store_storemast-add-2'); // add
            $group->any('/' . Config("ADDOPT_ACTION") . '', StoreStoremastController::class . ':addopt')->add(PermissionMiddleware::class)->setName('store_storemast/addopt-store_storemast-addopt-2'); // addopt
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', StoreStoremastController::class . ':view')->add(PermissionMiddleware::class)->setName('store_storemast/view-store_storemast-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', StoreStoremastController::class . ':edit')->add(PermissionMiddleware::class)->setName('store_storemast/edit-store_storemast-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', StoreStoremastController::class . ':delete')->add(PermissionMiddleware::class)->setName('store_storemast/delete-store_storemast-delete-2'); // delete
        }
    );

    // store_suppliers
    $app->any('/StoreSuppliersList[/{id}]', StoreSuppliersController::class . ':list')->add(PermissionMiddleware::class)->setName('StoreSuppliersList-store_suppliers-list'); // list
    $app->any('/StoreSuppliersAdd[/{id}]', StoreSuppliersController::class . ':add')->add(PermissionMiddleware::class)->setName('StoreSuppliersAdd-store_suppliers-add'); // add
    $app->any('/StoreSuppliersAddopt', StoreSuppliersController::class . ':addopt')->add(PermissionMiddleware::class)->setName('StoreSuppliersAddopt-store_suppliers-addopt'); // addopt
    $app->any('/StoreSuppliersView[/{id}]', StoreSuppliersController::class . ':view')->add(PermissionMiddleware::class)->setName('StoreSuppliersView-store_suppliers-view'); // view
    $app->any('/StoreSuppliersEdit[/{id}]', StoreSuppliersController::class . ':edit')->add(PermissionMiddleware::class)->setName('StoreSuppliersEdit-store_suppliers-edit'); // edit
    $app->any('/StoreSuppliersDelete[/{id}]', StoreSuppliersController::class . ':delete')->add(PermissionMiddleware::class)->setName('StoreSuppliersDelete-store_suppliers-delete'); // delete
    $app->group(
        '/store_suppliers',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', StoreSuppliersController::class . ':list')->add(PermissionMiddleware::class)->setName('store_suppliers/list-store_suppliers-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', StoreSuppliersController::class . ':add')->add(PermissionMiddleware::class)->setName('store_suppliers/add-store_suppliers-add-2'); // add
            $group->any('/' . Config("ADDOPT_ACTION") . '', StoreSuppliersController::class . ':addopt')->add(PermissionMiddleware::class)->setName('store_suppliers/addopt-store_suppliers-addopt-2'); // addopt
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', StoreSuppliersController::class . ':view')->add(PermissionMiddleware::class)->setName('store_suppliers/view-store_suppliers-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', StoreSuppliersController::class . ':edit')->add(PermissionMiddleware::class)->setName('store_suppliers/edit-store_suppliers-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', StoreSuppliersController::class . ':delete')->add(PermissionMiddleware::class)->setName('store_suppliers/delete-store_suppliers-delete-2'); // delete
        }
    );

    // ivf_stimulation_inj
    $app->any('/IvfStimulationInjList[/{id}]', IvfStimulationInjController::class . ':list')->add(PermissionMiddleware::class)->setName('IvfStimulationInjList-ivf_stimulation_inj-list'); // list
    $app->any('/IvfStimulationInjAdd[/{id}]', IvfStimulationInjController::class . ':add')->add(PermissionMiddleware::class)->setName('IvfStimulationInjAdd-ivf_stimulation_inj-add'); // add
    $app->any('/IvfStimulationInjAddopt', IvfStimulationInjController::class . ':addopt')->add(PermissionMiddleware::class)->setName('IvfStimulationInjAddopt-ivf_stimulation_inj-addopt'); // addopt
    $app->any('/IvfStimulationInjView[/{id}]', IvfStimulationInjController::class . ':view')->add(PermissionMiddleware::class)->setName('IvfStimulationInjView-ivf_stimulation_inj-view'); // view
    $app->any('/IvfStimulationInjEdit[/{id}]', IvfStimulationInjController::class . ':edit')->add(PermissionMiddleware::class)->setName('IvfStimulationInjEdit-ivf_stimulation_inj-edit'); // edit
    $app->any('/IvfStimulationInjDelete[/{id}]', IvfStimulationInjController::class . ':delete')->add(PermissionMiddleware::class)->setName('IvfStimulationInjDelete-ivf_stimulation_inj-delete'); // delete
    $app->group(
        '/ivf_stimulation_inj',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', IvfStimulationInjController::class . ':list')->add(PermissionMiddleware::class)->setName('ivf_stimulation_inj/list-ivf_stimulation_inj-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', IvfStimulationInjController::class . ':add')->add(PermissionMiddleware::class)->setName('ivf_stimulation_inj/add-ivf_stimulation_inj-add-2'); // add
            $group->any('/' . Config("ADDOPT_ACTION") . '', IvfStimulationInjController::class . ':addopt')->add(PermissionMiddleware::class)->setName('ivf_stimulation_inj/addopt-ivf_stimulation_inj-addopt-2'); // addopt
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', IvfStimulationInjController::class . ':view')->add(PermissionMiddleware::class)->setName('ivf_stimulation_inj/view-ivf_stimulation_inj-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', IvfStimulationInjController::class . ':edit')->add(PermissionMiddleware::class)->setName('ivf_stimulation_inj/edit-ivf_stimulation_inj-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', IvfStimulationInjController::class . ':delete')->add(PermissionMiddleware::class)->setName('ivf_stimulation_inj/delete-ivf_stimulation_inj-delete-2'); // delete
        }
    );

    // ivf_stimulation_tablet
    $app->any('/IvfStimulationTabletList[/{id}]', IvfStimulationTabletController::class . ':list')->add(PermissionMiddleware::class)->setName('IvfStimulationTabletList-ivf_stimulation_tablet-list'); // list
    $app->any('/IvfStimulationTabletAdd[/{id}]', IvfStimulationTabletController::class . ':add')->add(PermissionMiddleware::class)->setName('IvfStimulationTabletAdd-ivf_stimulation_tablet-add'); // add
    $app->any('/IvfStimulationTabletAddopt', IvfStimulationTabletController::class . ':addopt')->add(PermissionMiddleware::class)->setName('IvfStimulationTabletAddopt-ivf_stimulation_tablet-addopt'); // addopt
    $app->any('/IvfStimulationTabletView[/{id}]', IvfStimulationTabletController::class . ':view')->add(PermissionMiddleware::class)->setName('IvfStimulationTabletView-ivf_stimulation_tablet-view'); // view
    $app->any('/IvfStimulationTabletEdit[/{id}]', IvfStimulationTabletController::class . ':edit')->add(PermissionMiddleware::class)->setName('IvfStimulationTabletEdit-ivf_stimulation_tablet-edit'); // edit
    $app->any('/IvfStimulationTabletDelete[/{id}]', IvfStimulationTabletController::class . ':delete')->add(PermissionMiddleware::class)->setName('IvfStimulationTabletDelete-ivf_stimulation_tablet-delete'); // delete
    $app->group(
        '/ivf_stimulation_tablet',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', IvfStimulationTabletController::class . ':list')->add(PermissionMiddleware::class)->setName('ivf_stimulation_tablet/list-ivf_stimulation_tablet-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', IvfStimulationTabletController::class . ':add')->add(PermissionMiddleware::class)->setName('ivf_stimulation_tablet/add-ivf_stimulation_tablet-add-2'); // add
            $group->any('/' . Config("ADDOPT_ACTION") . '', IvfStimulationTabletController::class . ':addopt')->add(PermissionMiddleware::class)->setName('ivf_stimulation_tablet/addopt-ivf_stimulation_tablet-addopt-2'); // addopt
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', IvfStimulationTabletController::class . ':view')->add(PermissionMiddleware::class)->setName('ivf_stimulation_tablet/view-ivf_stimulation_tablet-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', IvfStimulationTabletController::class . ':edit')->add(PermissionMiddleware::class)->setName('ivf_stimulation_tablet/edit-ivf_stimulation_tablet-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', IvfStimulationTabletController::class . ':delete')->add(PermissionMiddleware::class)->setName('ivf_stimulation_tablet/delete-ivf_stimulation_tablet-delete-2'); // delete
        }
    );

    // ivf_stimulation_trigger
    $app->any('/IvfStimulationTriggerList[/{id}]', IvfStimulationTriggerController::class . ':list')->add(PermissionMiddleware::class)->setName('IvfStimulationTriggerList-ivf_stimulation_trigger-list'); // list
    $app->any('/IvfStimulationTriggerAdd[/{id}]', IvfStimulationTriggerController::class . ':add')->add(PermissionMiddleware::class)->setName('IvfStimulationTriggerAdd-ivf_stimulation_trigger-add'); // add
    $app->any('/IvfStimulationTriggerAddopt', IvfStimulationTriggerController::class . ':addopt')->add(PermissionMiddleware::class)->setName('IvfStimulationTriggerAddopt-ivf_stimulation_trigger-addopt'); // addopt
    $app->any('/IvfStimulationTriggerView[/{id}]', IvfStimulationTriggerController::class . ':view')->add(PermissionMiddleware::class)->setName('IvfStimulationTriggerView-ivf_stimulation_trigger-view'); // view
    $app->any('/IvfStimulationTriggerEdit[/{id}]', IvfStimulationTriggerController::class . ':edit')->add(PermissionMiddleware::class)->setName('IvfStimulationTriggerEdit-ivf_stimulation_trigger-edit'); // edit
    $app->any('/IvfStimulationTriggerDelete[/{id}]', IvfStimulationTriggerController::class . ':delete')->add(PermissionMiddleware::class)->setName('IvfStimulationTriggerDelete-ivf_stimulation_trigger-delete'); // delete
    $app->group(
        '/ivf_stimulation_trigger',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', IvfStimulationTriggerController::class . ':list')->add(PermissionMiddleware::class)->setName('ivf_stimulation_trigger/list-ivf_stimulation_trigger-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', IvfStimulationTriggerController::class . ':add')->add(PermissionMiddleware::class)->setName('ivf_stimulation_trigger/add-ivf_stimulation_trigger-add-2'); // add
            $group->any('/' . Config("ADDOPT_ACTION") . '', IvfStimulationTriggerController::class . ':addopt')->add(PermissionMiddleware::class)->setName('ivf_stimulation_trigger/addopt-ivf_stimulation_trigger-addopt-2'); // addopt
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', IvfStimulationTriggerController::class . ':view')->add(PermissionMiddleware::class)->setName('ivf_stimulation_trigger/view-ivf_stimulation_trigger-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', IvfStimulationTriggerController::class . ':edit')->add(PermissionMiddleware::class)->setName('ivf_stimulation_trigger/edit-ivf_stimulation_trigger-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', IvfStimulationTriggerController::class . ':delete')->add(PermissionMiddleware::class)->setName('ivf_stimulation_trigger/delete-ivf_stimulation_trigger-delete-2'); // delete
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', DepositPettycashController::class . ':list')->add(PermissionMiddleware::class)->setName('deposit_pettycash/list-deposit_pettycash-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', DepositPettycashController::class . ':add')->add(PermissionMiddleware::class)->setName('deposit_pettycash/add-deposit_pettycash-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', DepositPettycashController::class . ':view')->add(PermissionMiddleware::class)->setName('deposit_pettycash/view-deposit_pettycash-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', DepositPettycashController::class . ':edit')->add(PermissionMiddleware::class)->setName('deposit_pettycash/edit-deposit_pettycash-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', DepositPettycashController::class . ':delete')->add(PermissionMiddleware::class)->setName('deposit_pettycash/delete-deposit_pettycash-delete-2'); // delete
        }
    );

    // deposit_account_head
    $app->any('/DepositAccountHeadList[/{id}]', DepositAccountHeadController::class . ':list')->add(PermissionMiddleware::class)->setName('DepositAccountHeadList-deposit_account_head-list'); // list
    $app->any('/DepositAccountHeadAdd[/{id}]', DepositAccountHeadController::class . ':add')->add(PermissionMiddleware::class)->setName('DepositAccountHeadAdd-deposit_account_head-add'); // add
    $app->any('/DepositAccountHeadAddopt', DepositAccountHeadController::class . ':addopt')->add(PermissionMiddleware::class)->setName('DepositAccountHeadAddopt-deposit_account_head-addopt'); // addopt
    $app->any('/DepositAccountHeadView[/{id}]', DepositAccountHeadController::class . ':view')->add(PermissionMiddleware::class)->setName('DepositAccountHeadView-deposit_account_head-view'); // view
    $app->any('/DepositAccountHeadEdit[/{id}]', DepositAccountHeadController::class . ':edit')->add(PermissionMiddleware::class)->setName('DepositAccountHeadEdit-deposit_account_head-edit'); // edit
    $app->any('/DepositAccountHeadDelete[/{id}]', DepositAccountHeadController::class . ':delete')->add(PermissionMiddleware::class)->setName('DepositAccountHeadDelete-deposit_account_head-delete'); // delete
    $app->group(
        '/deposit_account_head',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', DepositAccountHeadController::class . ':list')->add(PermissionMiddleware::class)->setName('deposit_account_head/list-deposit_account_head-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', DepositAccountHeadController::class . ':add')->add(PermissionMiddleware::class)->setName('deposit_account_head/add-deposit_account_head-add-2'); // add
            $group->any('/' . Config("ADDOPT_ACTION") . '', DepositAccountHeadController::class . ':addopt')->add(PermissionMiddleware::class)->setName('deposit_account_head/addopt-deposit_account_head-addopt-2'); // addopt
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', DepositAccountHeadController::class . ':view')->add(PermissionMiddleware::class)->setName('deposit_account_head/view-deposit_account_head-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', DepositAccountHeadController::class . ':edit')->add(PermissionMiddleware::class)->setName('deposit_account_head/edit-deposit_account_head-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', DepositAccountHeadController::class . ':delete')->add(PermissionMiddleware::class)->setName('deposit_account_head/delete-deposit_account_head-delete-2'); // delete
        }
    );

    // view_ip_patient_admission
    $app->any('/ViewIpPatientAdmissionList[/{id}]', ViewIpPatientAdmissionController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewIpPatientAdmissionList-view_ip_patient_admission-list'); // list
    $app->any('/ViewIpPatientAdmissionAdd[/{id}]', ViewIpPatientAdmissionController::class . ':add')->add(PermissionMiddleware::class)->setName('ViewIpPatientAdmissionAdd-view_ip_patient_admission-add'); // add
    $app->any('/ViewIpPatientAdmissionView[/{id}]', ViewIpPatientAdmissionController::class . ':view')->add(PermissionMiddleware::class)->setName('ViewIpPatientAdmissionView-view_ip_patient_admission-view'); // view
    $app->any('/ViewIpPatientAdmissionEdit[/{id}]', ViewIpPatientAdmissionController::class . ':edit')->add(PermissionMiddleware::class)->setName('ViewIpPatientAdmissionEdit-view_ip_patient_admission-edit'); // edit
    $app->any('/ViewIpPatientAdmissionDelete[/{id}]', ViewIpPatientAdmissionController::class . ':delete')->add(PermissionMiddleware::class)->setName('ViewIpPatientAdmissionDelete-view_ip_patient_admission-delete'); // delete
    $app->any('/ViewIpPatientAdmissionSearch', ViewIpPatientAdmissionController::class . ':search')->add(PermissionMiddleware::class)->setName('ViewIpPatientAdmissionSearch-view_ip_patient_admission-search'); // search
    $app->group(
        '/view_ip_patient_admission',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', ViewIpPatientAdmissionController::class . ':list')->add(PermissionMiddleware::class)->setName('view_ip_patient_admission/list-view_ip_patient_admission-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', ViewIpPatientAdmissionController::class . ':add')->add(PermissionMiddleware::class)->setName('view_ip_patient_admission/add-view_ip_patient_admission-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', ViewIpPatientAdmissionController::class . ':view')->add(PermissionMiddleware::class)->setName('view_ip_patient_admission/view-view_ip_patient_admission-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', ViewIpPatientAdmissionController::class . ':edit')->add(PermissionMiddleware::class)->setName('view_ip_patient_admission/edit-view_ip_patient_admission-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', ViewIpPatientAdmissionController::class . ':delete')->add(PermissionMiddleware::class)->setName('view_ip_patient_admission/delete-view_ip_patient_admission-delete-2'); // delete
            $group->any('/' . Config("SEARCH_ACTION") . '', ViewIpPatientAdmissionController::class . ':search')->add(PermissionMiddleware::class)->setName('view_ip_patient_admission/search-view_ip_patient_admission-search-2'); // search
        }
    );

    // camera
    $app->any('/Camera[/{params:.*}]', CameraController::class)->add(PermissionMiddleware::class)->setName('Camera-camera-custom'); // custom

    // view_pharmacytransfer
    $app->any('/ViewPharmacytransferList[/{id}]', ViewPharmacytransferController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewPharmacytransferList-view_pharmacytransfer-list'); // list
    $app->any('/ViewPharmacytransferAdd[/{id}]', ViewPharmacytransferController::class . ':add')->add(PermissionMiddleware::class)->setName('ViewPharmacytransferAdd-view_pharmacytransfer-add'); // add
    $app->any('/ViewPharmacytransferView[/{id}]', ViewPharmacytransferController::class . ':view')->add(PermissionMiddleware::class)->setName('ViewPharmacytransferView-view_pharmacytransfer-view'); // view
    $app->any('/ViewPharmacytransferEdit[/{id}]', ViewPharmacytransferController::class . ':edit')->add(PermissionMiddleware::class)->setName('ViewPharmacytransferEdit-view_pharmacytransfer-edit'); // edit
    $app->any('/ViewPharmacytransferSearch', ViewPharmacytransferController::class . ':search')->add(PermissionMiddleware::class)->setName('ViewPharmacytransferSearch-view_pharmacytransfer-search'); // search
    $app->any('/ViewPharmacytransferPreview', ViewPharmacytransferController::class . ':preview')->add(PermissionMiddleware::class)->setName('ViewPharmacytransferPreview-view_pharmacytransfer-preview'); // preview
    $app->group(
        '/view_pharmacytransfer',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', ViewPharmacytransferController::class . ':list')->add(PermissionMiddleware::class)->setName('view_pharmacytransfer/list-view_pharmacytransfer-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', ViewPharmacytransferController::class . ':add')->add(PermissionMiddleware::class)->setName('view_pharmacytransfer/add-view_pharmacytransfer-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', ViewPharmacytransferController::class . ':view')->add(PermissionMiddleware::class)->setName('view_pharmacytransfer/view-view_pharmacytransfer-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', ViewPharmacytransferController::class . ':edit')->add(PermissionMiddleware::class)->setName('view_pharmacytransfer/edit-view_pharmacytransfer-edit-2'); // edit
            $group->any('/' . Config("SEARCH_ACTION") . '', ViewPharmacytransferController::class . ':search')->add(PermissionMiddleware::class)->setName('view_pharmacytransfer/search-view_pharmacytransfer-search-2'); // search
            $group->any('/' . Config("PREVIEW_ACTION") . '', ViewPharmacytransferController::class . ':preview')->add(PermissionMiddleware::class)->setName('view_pharmacytransfer/preview-view_pharmacytransfer-preview-2'); // preview
        }
    );

    // view_ip_admission_issue
    $app->any('/ViewIpAdmissionIssueList[/{id}]', ViewIpAdmissionIssueController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewIpAdmissionIssueList-view_ip_admission_issue-list'); // list
    $app->group(
        '/view_ip_admission_issue',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', ViewIpAdmissionIssueController::class . ':list')->add(PermissionMiddleware::class)->setName('view_ip_admission_issue/list-view_ip_admission_issue-list-2'); // list
        }
    );

    // view_ip_admission_prescription
    $app->any('/ViewIpAdmissionPrescriptionList[/{id}]', ViewIpAdmissionPrescriptionController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewIpAdmissionPrescriptionList-view_ip_admission_prescription-list'); // list
    $app->group(
        '/view_ip_admission_prescription',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', ViewIpAdmissionPrescriptionController::class . ':list')->add(PermissionMiddleware::class)->setName('view_ip_admission_prescription/list-view_ip_admission_prescription-list-2'); // list
        }
    );

    // view_ip_admission_services
    $app->any('/ViewIpAdmissionServicesList[/{id}]', ViewIpAdmissionServicesController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewIpAdmissionServicesList-view_ip_admission_services-list'); // list
    $app->group(
        '/view_ip_admission_services',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', ViewIpAdmissionServicesController::class . ':list')->add(PermissionMiddleware::class)->setName('view_ip_admission_services/list-view_ip_admission_services-list-2'); // list
        }
    );

    // view_ip_admission_bill_summary
    $app->any('/ViewIpAdmissionBillSummaryList[/{id}]', ViewIpAdmissionBillSummaryController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewIpAdmissionBillSummaryList-view_ip_admission_bill_summary-list'); // list
    $app->any('/ViewIpAdmissionBillSummaryView[/{id}]', ViewIpAdmissionBillSummaryController::class . ':view')->add(PermissionMiddleware::class)->setName('ViewIpAdmissionBillSummaryView-view_ip_admission_bill_summary-view'); // view
    $app->any('/ViewIpAdmissionBillSummaryEdit[/{id}]', ViewIpAdmissionBillSummaryController::class . ':edit')->add(PermissionMiddleware::class)->setName('ViewIpAdmissionBillSummaryEdit-view_ip_admission_bill_summary-edit'); // edit
    $app->group(
        '/view_ip_admission_bill_summary',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', ViewIpAdmissionBillSummaryController::class . ':list')->add(PermissionMiddleware::class)->setName('view_ip_admission_bill_summary/list-view_ip_admission_bill_summary-list-2'); // list
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', ViewIpAdmissionBillSummaryController::class . ':view')->add(PermissionMiddleware::class)->setName('view_ip_admission_bill_summary/view-view_ip_admission_bill_summary-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', ViewIpAdmissionBillSummaryController::class . ':edit')->add(PermissionMiddleware::class)->setName('view_ip_admission_bill_summary/edit-view_ip_admission_bill_summary-edit-2'); // edit
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', StoreBatchmasController::class . ':list')->add(PermissionMiddleware::class)->setName('store_batchmas/list-store_batchmas-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', StoreBatchmasController::class . ':add')->add(PermissionMiddleware::class)->setName('store_batchmas/add-store_batchmas-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', StoreBatchmasController::class . ':view')->add(PermissionMiddleware::class)->setName('store_batchmas/view-store_batchmas-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', StoreBatchmasController::class . ':edit')->add(PermissionMiddleware::class)->setName('store_batchmas/edit-store_batchmas-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', StoreBatchmasController::class . ':delete')->add(PermissionMiddleware::class)->setName('store_batchmas/delete-store_batchmas-delete-2'); // delete
        }
    );

    // view_item_received
    $app->any('/ViewItemReceivedList[/{id}]', ViewItemReceivedController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewItemReceivedList-view_item_received-list'); // list
    $app->group(
        '/view_item_received',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', ViewItemReceivedController::class . ':list')->add(PermissionMiddleware::class)->setName('view_item_received/list-view_item_received-list-2'); // list
        }
    );

    // view_pharmacy_consumption
    $app->any('/ViewPharmacyConsumptionList[/{id}]', ViewPharmacyConsumptionController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewPharmacyConsumptionList-view_pharmacy_consumption-list'); // list
    $app->any('/ViewPharmacyConsumptionSearch', ViewPharmacyConsumptionController::class . ':search')->add(PermissionMiddleware::class)->setName('ViewPharmacyConsumptionSearch-view_pharmacy_consumption-search'); // search
    $app->group(
        '/view_pharmacy_consumption',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', ViewPharmacyConsumptionController::class . ':list')->add(PermissionMiddleware::class)->setName('view_pharmacy_consumption/list-view_pharmacy_consumption-list-2'); // list
            $group->any('/' . Config("SEARCH_ACTION") . '', ViewPharmacyConsumptionController::class . ':search')->add(PermissionMiddleware::class)->setName('view_pharmacy_consumption/search-view_pharmacy_consumption-search-2'); // search
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', PharmacyPaymentController::class . ':list')->add(PermissionMiddleware::class)->setName('pharmacy_payment/list-pharmacy_payment-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', PharmacyPaymentController::class . ':add')->add(PermissionMiddleware::class)->setName('pharmacy_payment/add-pharmacy_payment-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', PharmacyPaymentController::class . ':view')->add(PermissionMiddleware::class)->setName('pharmacy_payment/view-pharmacy_payment-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', PharmacyPaymentController::class . ':edit')->add(PermissionMiddleware::class)->setName('pharmacy_payment/edit-pharmacy_payment-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', PharmacyPaymentController::class . ':delete')->add(PermissionMiddleware::class)->setName('pharmacy_payment/delete-pharmacy_payment-delete-2'); // delete
        }
    );

    // view_till_search
    $app->any('/ViewTillSearchList', ViewTillSearchController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewTillSearchList-view_till_search-list'); // list
    $app->group(
        '/view_till_search',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '', ViewTillSearchController::class . ':list')->add(PermissionMiddleware::class)->setName('view_till_search/list-view_till_search-list-2'); // list
        }
    );

    // view_billing_voucher_print
    $app->any('/ViewBillingVoucherPrintList[/{id}]', ViewBillingVoucherPrintController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewBillingVoucherPrintList-view_billing_voucher_print-list'); // list
    $app->any('/ViewBillingVoucherPrintAdd[/{id}]', ViewBillingVoucherPrintController::class . ':add')->add(PermissionMiddleware::class)->setName('ViewBillingVoucherPrintAdd-view_billing_voucher_print-add'); // add
    $app->any('/ViewBillingVoucherPrintView[/{id}]', ViewBillingVoucherPrintController::class . ':view')->add(PermissionMiddleware::class)->setName('ViewBillingVoucherPrintView-view_billing_voucher_print-view'); // view
    $app->any('/ViewBillingVoucherPrintEdit[/{id}]', ViewBillingVoucherPrintController::class . ':edit')->add(PermissionMiddleware::class)->setName('ViewBillingVoucherPrintEdit-view_billing_voucher_print-edit'); // edit
    $app->any('/ViewBillingVoucherPrintDelete[/{id}]', ViewBillingVoucherPrintController::class . ':delete')->add(PermissionMiddleware::class)->setName('ViewBillingVoucherPrintDelete-view_billing_voucher_print-delete'); // delete
    $app->group(
        '/view_billing_voucher_print',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', ViewBillingVoucherPrintController::class . ':list')->add(PermissionMiddleware::class)->setName('view_billing_voucher_print/list-view_billing_voucher_print-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', ViewBillingVoucherPrintController::class . ':add')->add(PermissionMiddleware::class)->setName('view_billing_voucher_print/add-view_billing_voucher_print-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', ViewBillingVoucherPrintController::class . ':view')->add(PermissionMiddleware::class)->setName('view_billing_voucher_print/view-view_billing_voucher_print-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', ViewBillingVoucherPrintController::class . ':edit')->add(PermissionMiddleware::class)->setName('view_billing_voucher_print/edit-view_billing_voucher_print-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', ViewBillingVoucherPrintController::class . ':delete')->add(PermissionMiddleware::class)->setName('view_billing_voucher_print/delete-view_billing_voucher_print-delete-2'); // delete
        }
    );

    // view_gst_output
    $app->any('/ViewGstOutputList', ViewGstOutputController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewGstOutputList-view_gst_output-list'); // list
    $app->group(
        '/view_gst_output',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '', ViewGstOutputController::class . ':list')->add(PermissionMiddleware::class)->setName('view_gst_output/list-view_gst_output-list-2'); // list
        }
    );

    // view_pharmacy_movement
    $app->any('/ViewPharmacyMovementList', ViewPharmacyMovementController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewPharmacyMovementList-view_pharmacy_movement-list'); // list
    $app->any('/ViewPharmacyMovementSearch', ViewPharmacyMovementController::class . ':search')->add(PermissionMiddleware::class)->setName('ViewPharmacyMovementSearch-view_pharmacy_movement-search'); // search
    $app->group(
        '/view_pharmacy_movement',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '', ViewPharmacyMovementController::class . ':list')->add(PermissionMiddleware::class)->setName('view_pharmacy_movement/list-view_pharmacy_movement-list-2'); // list
            $group->any('/' . Config("SEARCH_ACTION") . '', ViewPharmacyMovementController::class . ':search')->add(PermissionMiddleware::class)->setName('view_pharmacy_movement/search-view_pharmacy_movement-search-2'); // search
        }
    );

    // view_pharmacy_movement_item
    $app->any('/ViewPharmacyMovementItemList', ViewPharmacyMovementItemController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewPharmacyMovementItemList-view_pharmacy_movement_item-list'); // list
    $app->any('/ViewPharmacyMovementItemSearch', ViewPharmacyMovementItemController::class . ':search')->add(PermissionMiddleware::class)->setName('ViewPharmacyMovementItemSearch-view_pharmacy_movement_item-search'); // search
    $app->any('/ViewPharmacyMovementItemPreview', ViewPharmacyMovementItemController::class . ':preview')->add(PermissionMiddleware::class)->setName('ViewPharmacyMovementItemPreview-view_pharmacy_movement_item-preview'); // preview
    $app->group(
        '/view_pharmacy_movement_item',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '', ViewPharmacyMovementItemController::class . ':list')->add(PermissionMiddleware::class)->setName('view_pharmacy_movement_item/list-view_pharmacy_movement_item-list-2'); // list
            $group->any('/' . Config("SEARCH_ACTION") . '', ViewPharmacyMovementItemController::class . ':search')->add(PermissionMiddleware::class)->setName('view_pharmacy_movement_item/search-view_pharmacy_movement_item-search-2'); // search
            $group->any('/' . Config("PREVIEW_ACTION") . '', ViewPharmacyMovementItemController::class . ':preview')->add(PermissionMiddleware::class)->setName('view_pharmacy_movement_item/preview-view_pharmacy_movement_item-preview-2'); // preview
        }
    );

    // view_pharmacy_sales
    $app->any('/ViewPharmacySalesList', ViewPharmacySalesController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewPharmacySalesList-view_pharmacy_sales-list'); // list
    $app->any('/ViewPharmacySalesSearch', ViewPharmacySalesController::class . ':search')->add(PermissionMiddleware::class)->setName('ViewPharmacySalesSearch-view_pharmacy_sales-search'); // search
    $app->group(
        '/view_pharmacy_sales',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '', ViewPharmacySalesController::class . ':list')->add(PermissionMiddleware::class)->setName('view_pharmacy_sales/list-view_pharmacy_sales-list-2'); // list
            $group->any('/' . Config("SEARCH_ACTION") . '', ViewPharmacySalesController::class . ':search')->add(PermissionMiddleware::class)->setName('view_pharmacy_sales/search-view_pharmacy_sales-search-2'); // search
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', SmsTypeController::class . ':list')->add(PermissionMiddleware::class)->setName('sms_type/list-sms_type-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', SmsTypeController::class . ':add')->add(PermissionMiddleware::class)->setName('sms_type/add-sms_type-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', SmsTypeController::class . ':view')->add(PermissionMiddleware::class)->setName('sms_type/view-sms_type-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', SmsTypeController::class . ':edit')->add(PermissionMiddleware::class)->setName('sms_type/edit-sms_type-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', SmsTypeController::class . ':delete')->add(PermissionMiddleware::class)->setName('sms_type/delete-sms_type-delete-2'); // delete
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', SmsCintentController::class . ':list')->add(PermissionMiddleware::class)->setName('sms_cintent/list-sms_cintent-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', SmsCintentController::class . ':add')->add(PermissionMiddleware::class)->setName('sms_cintent/add-sms_cintent-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', SmsCintentController::class . ':view')->add(PermissionMiddleware::class)->setName('sms_cintent/view-sms_cintent-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', SmsCintentController::class . ':edit')->add(PermissionMiddleware::class)->setName('sms_cintent/edit-sms_cintent-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', SmsCintentController::class . ':delete')->add(PermissionMiddleware::class)->setName('sms_cintent/delete-sms_cintent-delete-2'); // delete
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', PharmacyBillingReturnController::class . ':list')->add(PermissionMiddleware::class)->setName('pharmacy_billing_return/list-pharmacy_billing_return-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', PharmacyBillingReturnController::class . ':add')->add(PermissionMiddleware::class)->setName('pharmacy_billing_return/add-pharmacy_billing_return-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', PharmacyBillingReturnController::class . ':view')->add(PermissionMiddleware::class)->setName('pharmacy_billing_return/view-pharmacy_billing_return-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', PharmacyBillingReturnController::class . ':edit')->add(PermissionMiddleware::class)->setName('pharmacy_billing_return/edit-pharmacy_billing_return-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', PharmacyBillingReturnController::class . ':delete')->add(PermissionMiddleware::class)->setName('pharmacy_billing_return/delete-pharmacy_billing_return-delete-2'); // delete
        }
    );

    // view_pharmacy_pharled_return
    $app->any('/ViewPharmacyPharledReturnList[/{id}]', ViewPharmacyPharledReturnController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewPharmacyPharledReturnList-view_pharmacy_pharled_return-list'); // list
    $app->any('/ViewPharmacyPharledReturnAdd[/{id}]', ViewPharmacyPharledReturnController::class . ':add')->add(PermissionMiddleware::class)->setName('ViewPharmacyPharledReturnAdd-view_pharmacy_pharled_return-add'); // add
    $app->any('/ViewPharmacyPharledReturnView[/{id}]', ViewPharmacyPharledReturnController::class . ':view')->add(PermissionMiddleware::class)->setName('ViewPharmacyPharledReturnView-view_pharmacy_pharled_return-view'); // view
    $app->any('/ViewPharmacyPharledReturnEdit[/{id}]', ViewPharmacyPharledReturnController::class . ':edit')->add(PermissionMiddleware::class)->setName('ViewPharmacyPharledReturnEdit-view_pharmacy_pharled_return-edit'); // edit
    $app->any('/ViewPharmacyPharledReturnDelete[/{id}]', ViewPharmacyPharledReturnController::class . ':delete')->add(PermissionMiddleware::class)->setName('ViewPharmacyPharledReturnDelete-view_pharmacy_pharled_return-delete'); // delete
    $app->any('/ViewPharmacyPharledReturnPreview', ViewPharmacyPharledReturnController::class . ':preview')->add(PermissionMiddleware::class)->setName('ViewPharmacyPharledReturnPreview-view_pharmacy_pharled_return-preview'); // preview
    $app->group(
        '/view_pharmacy_pharled_return',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', ViewPharmacyPharledReturnController::class . ':list')->add(PermissionMiddleware::class)->setName('view_pharmacy_pharled_return/list-view_pharmacy_pharled_return-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', ViewPharmacyPharledReturnController::class . ':add')->add(PermissionMiddleware::class)->setName('view_pharmacy_pharled_return/add-view_pharmacy_pharled_return-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', ViewPharmacyPharledReturnController::class . ':view')->add(PermissionMiddleware::class)->setName('view_pharmacy_pharled_return/view-view_pharmacy_pharled_return-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', ViewPharmacyPharledReturnController::class . ':edit')->add(PermissionMiddleware::class)->setName('view_pharmacy_pharled_return/edit-view_pharmacy_pharled_return-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', ViewPharmacyPharledReturnController::class . ':delete')->add(PermissionMiddleware::class)->setName('view_pharmacy_pharled_return/delete-view_pharmacy_pharled_return-delete-2'); // delete
            $group->any('/' . Config("PREVIEW_ACTION") . '', ViewPharmacyPharledReturnController::class . ':preview')->add(PermissionMiddleware::class)->setName('view_pharmacy_pharled_return/preview-view_pharmacy_pharled_return-preview-2'); // preview
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', PharmacyPurchaseRequestController::class . ':list')->add(PermissionMiddleware::class)->setName('pharmacy_purchase_request/list-pharmacy_purchase_request-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', PharmacyPurchaseRequestController::class . ':add')->add(PermissionMiddleware::class)->setName('pharmacy_purchase_request/add-pharmacy_purchase_request-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', PharmacyPurchaseRequestController::class . ':view')->add(PermissionMiddleware::class)->setName('pharmacy_purchase_request/view-pharmacy_purchase_request-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', PharmacyPurchaseRequestController::class . ':edit')->add(PermissionMiddleware::class)->setName('pharmacy_purchase_request/edit-pharmacy_purchase_request-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', PharmacyPurchaseRequestController::class . ':delete')->add(PermissionMiddleware::class)->setName('pharmacy_purchase_request/delete-pharmacy_purchase_request-delete-2'); // delete
        }
    );

    // pharmacy_purchase_request_items
    $app->any('/PharmacyPurchaseRequestItemsList[/{id}]', PharmacyPurchaseRequestItemsController::class . ':list')->add(PermissionMiddleware::class)->setName('PharmacyPurchaseRequestItemsList-pharmacy_purchase_request_items-list'); // list
    $app->any('/PharmacyPurchaseRequestItemsAdd[/{id}]', PharmacyPurchaseRequestItemsController::class . ':add')->add(PermissionMiddleware::class)->setName('PharmacyPurchaseRequestItemsAdd-pharmacy_purchase_request_items-add'); // add
    $app->any('/PharmacyPurchaseRequestItemsView[/{id}]', PharmacyPurchaseRequestItemsController::class . ':view')->add(PermissionMiddleware::class)->setName('PharmacyPurchaseRequestItemsView-pharmacy_purchase_request_items-view'); // view
    $app->any('/PharmacyPurchaseRequestItemsEdit[/{id}]', PharmacyPurchaseRequestItemsController::class . ':edit')->add(PermissionMiddleware::class)->setName('PharmacyPurchaseRequestItemsEdit-pharmacy_purchase_request_items-edit'); // edit
    $app->any('/PharmacyPurchaseRequestItemsDelete[/{id}]', PharmacyPurchaseRequestItemsController::class . ':delete')->add(PermissionMiddleware::class)->setName('PharmacyPurchaseRequestItemsDelete-pharmacy_purchase_request_items-delete'); // delete
    $app->any('/PharmacyPurchaseRequestItemsPreview', PharmacyPurchaseRequestItemsController::class . ':preview')->add(PermissionMiddleware::class)->setName('PharmacyPurchaseRequestItemsPreview-pharmacy_purchase_request_items-preview'); // preview
    $app->group(
        '/pharmacy_purchase_request_items',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', PharmacyPurchaseRequestItemsController::class . ':list')->add(PermissionMiddleware::class)->setName('pharmacy_purchase_request_items/list-pharmacy_purchase_request_items-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', PharmacyPurchaseRequestItemsController::class . ':add')->add(PermissionMiddleware::class)->setName('pharmacy_purchase_request_items/add-pharmacy_purchase_request_items-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', PharmacyPurchaseRequestItemsController::class . ':view')->add(PermissionMiddleware::class)->setName('pharmacy_purchase_request_items/view-pharmacy_purchase_request_items-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', PharmacyPurchaseRequestItemsController::class . ':edit')->add(PermissionMiddleware::class)->setName('pharmacy_purchase_request_items/edit-pharmacy_purchase_request_items-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', PharmacyPurchaseRequestItemsController::class . ':delete')->add(PermissionMiddleware::class)->setName('pharmacy_purchase_request_items/delete-pharmacy_purchase_request_items-delete-2'); // delete
            $group->any('/' . Config("PREVIEW_ACTION") . '', PharmacyPurchaseRequestItemsController::class . ':preview')->add(PermissionMiddleware::class)->setName('pharmacy_purchase_request_items/preview-pharmacy_purchase_request_items-preview-2'); // preview
        }
    );

    // view_pharmacy_purchase_request_approved
    $app->any('/ViewPharmacyPurchaseRequestApprovedList[/{id}]', ViewPharmacyPurchaseRequestApprovedController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewPharmacyPurchaseRequestApprovedList-view_pharmacy_purchase_request_approved-list'); // list
    $app->any('/ViewPharmacyPurchaseRequestApprovedView[/{id}]', ViewPharmacyPurchaseRequestApprovedController::class . ':view')->add(PermissionMiddleware::class)->setName('ViewPharmacyPurchaseRequestApprovedView-view_pharmacy_purchase_request_approved-view'); // view
    $app->any('/ViewPharmacyPurchaseRequestApprovedEdit[/{id}]', ViewPharmacyPurchaseRequestApprovedController::class . ':edit')->add(PermissionMiddleware::class)->setName('ViewPharmacyPurchaseRequestApprovedEdit-view_pharmacy_purchase_request_approved-edit'); // edit
    $app->any('/ViewPharmacyPurchaseRequestApprovedDelete[/{id}]', ViewPharmacyPurchaseRequestApprovedController::class . ':delete')->add(PermissionMiddleware::class)->setName('ViewPharmacyPurchaseRequestApprovedDelete-view_pharmacy_purchase_request_approved-delete'); // delete
    $app->group(
        '/view_pharmacy_purchase_request_approved',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', ViewPharmacyPurchaseRequestApprovedController::class . ':list')->add(PermissionMiddleware::class)->setName('view_pharmacy_purchase_request_approved/list-view_pharmacy_purchase_request_approved-list-2'); // list
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', ViewPharmacyPurchaseRequestApprovedController::class . ':view')->add(PermissionMiddleware::class)->setName('view_pharmacy_purchase_request_approved/view-view_pharmacy_purchase_request_approved-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', ViewPharmacyPurchaseRequestApprovedController::class . ':edit')->add(PermissionMiddleware::class)->setName('view_pharmacy_purchase_request_approved/edit-view_pharmacy_purchase_request_approved-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', ViewPharmacyPurchaseRequestApprovedController::class . ':delete')->add(PermissionMiddleware::class)->setName('view_pharmacy_purchase_request_approved/delete-view_pharmacy_purchase_request_approved-delete-2'); // delete
        }
    );

    // view_pharmacy_purchase_request_items_approved
    $app->any('/ViewPharmacyPurchaseRequestItemsApprovedList[/{id}]', ViewPharmacyPurchaseRequestItemsApprovedController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewPharmacyPurchaseRequestItemsApprovedList-view_pharmacy_purchase_request_items_approved-list'); // list
    $app->any('/ViewPharmacyPurchaseRequestItemsApprovedView[/{id}]', ViewPharmacyPurchaseRequestItemsApprovedController::class . ':view')->add(PermissionMiddleware::class)->setName('ViewPharmacyPurchaseRequestItemsApprovedView-view_pharmacy_purchase_request_items_approved-view'); // view
    $app->any('/ViewPharmacyPurchaseRequestItemsApprovedEdit[/{id}]', ViewPharmacyPurchaseRequestItemsApprovedController::class . ':edit')->add(PermissionMiddleware::class)->setName('ViewPharmacyPurchaseRequestItemsApprovedEdit-view_pharmacy_purchase_request_items_approved-edit'); // edit
    $app->any('/ViewPharmacyPurchaseRequestItemsApprovedDelete[/{id}]', ViewPharmacyPurchaseRequestItemsApprovedController::class . ':delete')->add(PermissionMiddleware::class)->setName('ViewPharmacyPurchaseRequestItemsApprovedDelete-view_pharmacy_purchase_request_items_approved-delete'); // delete
    $app->any('/ViewPharmacyPurchaseRequestItemsApprovedPreview', ViewPharmacyPurchaseRequestItemsApprovedController::class . ':preview')->add(PermissionMiddleware::class)->setName('ViewPharmacyPurchaseRequestItemsApprovedPreview-view_pharmacy_purchase_request_items_approved-preview'); // preview
    $app->group(
        '/view_pharmacy_purchase_request_items_approved',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', ViewPharmacyPurchaseRequestItemsApprovedController::class . ':list')->add(PermissionMiddleware::class)->setName('view_pharmacy_purchase_request_items_approved/list-view_pharmacy_purchase_request_items_approved-list-2'); // list
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', ViewPharmacyPurchaseRequestItemsApprovedController::class . ':view')->add(PermissionMiddleware::class)->setName('view_pharmacy_purchase_request_items_approved/view-view_pharmacy_purchase_request_items_approved-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', ViewPharmacyPurchaseRequestItemsApprovedController::class . ':edit')->add(PermissionMiddleware::class)->setName('view_pharmacy_purchase_request_items_approved/edit-view_pharmacy_purchase_request_items_approved-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', ViewPharmacyPurchaseRequestItemsApprovedController::class . ':delete')->add(PermissionMiddleware::class)->setName('view_pharmacy_purchase_request_items_approved/delete-view_pharmacy_purchase_request_items_approved-delete-2'); // delete
            $group->any('/' . Config("PREVIEW_ACTION") . '', ViewPharmacyPurchaseRequestItemsApprovedController::class . ':preview')->add(PermissionMiddleware::class)->setName('view_pharmacy_purchase_request_items_approved/preview-view_pharmacy_purchase_request_items_approved-preview-2'); // preview
        }
    );

    // view_pharmacy_purchase_request_items_purchased
    $app->any('/ViewPharmacyPurchaseRequestItemsPurchasedList[/{id}]', ViewPharmacyPurchaseRequestItemsPurchasedController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewPharmacyPurchaseRequestItemsPurchasedList-view_pharmacy_purchase_request_items_purchased-list'); // list
    $app->any('/ViewPharmacyPurchaseRequestItemsPurchasedView[/{id}]', ViewPharmacyPurchaseRequestItemsPurchasedController::class . ':view')->add(PermissionMiddleware::class)->setName('ViewPharmacyPurchaseRequestItemsPurchasedView-view_pharmacy_purchase_request_items_purchased-view'); // view
    $app->any('/ViewPharmacyPurchaseRequestItemsPurchasedEdit[/{id}]', ViewPharmacyPurchaseRequestItemsPurchasedController::class . ':edit')->add(PermissionMiddleware::class)->setName('ViewPharmacyPurchaseRequestItemsPurchasedEdit-view_pharmacy_purchase_request_items_purchased-edit'); // edit
    $app->any('/ViewPharmacyPurchaseRequestItemsPurchasedDelete[/{id}]', ViewPharmacyPurchaseRequestItemsPurchasedController::class . ':delete')->add(PermissionMiddleware::class)->setName('ViewPharmacyPurchaseRequestItemsPurchasedDelete-view_pharmacy_purchase_request_items_purchased-delete'); // delete
    $app->any('/ViewPharmacyPurchaseRequestItemsPurchasedPreview', ViewPharmacyPurchaseRequestItemsPurchasedController::class . ':preview')->add(PermissionMiddleware::class)->setName('ViewPharmacyPurchaseRequestItemsPurchasedPreview-view_pharmacy_purchase_request_items_purchased-preview'); // preview
    $app->group(
        '/view_pharmacy_purchase_request_items_purchased',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', ViewPharmacyPurchaseRequestItemsPurchasedController::class . ':list')->add(PermissionMiddleware::class)->setName('view_pharmacy_purchase_request_items_purchased/list-view_pharmacy_purchase_request_items_purchased-list-2'); // list
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', ViewPharmacyPurchaseRequestItemsPurchasedController::class . ':view')->add(PermissionMiddleware::class)->setName('view_pharmacy_purchase_request_items_purchased/view-view_pharmacy_purchase_request_items_purchased-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', ViewPharmacyPurchaseRequestItemsPurchasedController::class . ':edit')->add(PermissionMiddleware::class)->setName('view_pharmacy_purchase_request_items_purchased/edit-view_pharmacy_purchase_request_items_purchased-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', ViewPharmacyPurchaseRequestItemsPurchasedController::class . ':delete')->add(PermissionMiddleware::class)->setName('view_pharmacy_purchase_request_items_purchased/delete-view_pharmacy_purchase_request_items_purchased-delete-2'); // delete
            $group->any('/' . Config("PREVIEW_ACTION") . '', ViewPharmacyPurchaseRequestItemsPurchasedController::class . ':preview')->add(PermissionMiddleware::class)->setName('view_pharmacy_purchase_request_items_purchased/preview-view_pharmacy_purchase_request_items_purchased-preview-2'); // preview
        }
    );

    // view_pharmacy_purchase_request_purchased
    $app->any('/ViewPharmacyPurchaseRequestPurchasedList[/{id}]', ViewPharmacyPurchaseRequestPurchasedController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewPharmacyPurchaseRequestPurchasedList-view_pharmacy_purchase_request_purchased-list'); // list
    $app->any('/ViewPharmacyPurchaseRequestPurchasedView[/{id}]', ViewPharmacyPurchaseRequestPurchasedController::class . ':view')->add(PermissionMiddleware::class)->setName('ViewPharmacyPurchaseRequestPurchasedView-view_pharmacy_purchase_request_purchased-view'); // view
    $app->any('/ViewPharmacyPurchaseRequestPurchasedEdit[/{id}]', ViewPharmacyPurchaseRequestPurchasedController::class . ':edit')->add(PermissionMiddleware::class)->setName('ViewPharmacyPurchaseRequestPurchasedEdit-view_pharmacy_purchase_request_purchased-edit'); // edit
    $app->any('/ViewPharmacyPurchaseRequestPurchasedDelete[/{id}]', ViewPharmacyPurchaseRequestPurchasedController::class . ':delete')->add(PermissionMiddleware::class)->setName('ViewPharmacyPurchaseRequestPurchasedDelete-view_pharmacy_purchase_request_purchased-delete'); // delete
    $app->group(
        '/view_pharmacy_purchase_request_purchased',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', ViewPharmacyPurchaseRequestPurchasedController::class . ':list')->add(PermissionMiddleware::class)->setName('view_pharmacy_purchase_request_purchased/list-view_pharmacy_purchase_request_purchased-list-2'); // list
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', ViewPharmacyPurchaseRequestPurchasedController::class . ':view')->add(PermissionMiddleware::class)->setName('view_pharmacy_purchase_request_purchased/view-view_pharmacy_purchase_request_purchased-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', ViewPharmacyPurchaseRequestPurchasedController::class . ':edit')->add(PermissionMiddleware::class)->setName('view_pharmacy_purchase_request_purchased/edit-view_pharmacy_purchase_request_purchased-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', ViewPharmacyPurchaseRequestPurchasedController::class . ':delete')->add(PermissionMiddleware::class)->setName('view_pharmacy_purchase_request_purchased/delete-view_pharmacy_purchase_request_purchased-delete-2'); // delete
        }
    );

    // view_dashboard_collection_details
    $app->any('/ViewDashboardCollectionDetailsList', ViewDashboardCollectionDetailsController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewDashboardCollectionDetailsList-view_dashboard_collection_details-list'); // list
    $app->any('/ViewDashboardCollectionDetailsSearch', ViewDashboardCollectionDetailsController::class . ':search')->add(PermissionMiddleware::class)->setName('ViewDashboardCollectionDetailsSearch-view_dashboard_collection_details-search'); // search
    $app->any('/ViewDashboardCollectionDetailsPreview', ViewDashboardCollectionDetailsController::class . ':preview')->add(PermissionMiddleware::class)->setName('ViewDashboardCollectionDetailsPreview-view_dashboard_collection_details-preview'); // preview
    $app->group(
        '/view_dashboard_collection_details',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '', ViewDashboardCollectionDetailsController::class . ':list')->add(PermissionMiddleware::class)->setName('view_dashboard_collection_details/list-view_dashboard_collection_details-list-2'); // list
            $group->any('/' . Config("SEARCH_ACTION") . '', ViewDashboardCollectionDetailsController::class . ':search')->add(PermissionMiddleware::class)->setName('view_dashboard_collection_details/search-view_dashboard_collection_details-search-2'); // search
            $group->any('/' . Config("PREVIEW_ACTION") . '', ViewDashboardCollectionDetailsController::class . ':preview')->add(PermissionMiddleware::class)->setName('view_dashboard_collection_details/preview-view_dashboard_collection_details-preview-2'); // preview
        }
    );

    // view_dashboard_summary_details
    $app->any('/ViewDashboardSummaryDetailsList', ViewDashboardSummaryDetailsController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewDashboardSummaryDetailsList-view_dashboard_summary_details-list'); // list
    $app->group(
        '/view_dashboard_summary_details',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '', ViewDashboardSummaryDetailsController::class . ':list')->add(PermissionMiddleware::class)->setName('view_dashboard_summary_details/list-view_dashboard_summary_details-list-2'); // list
        }
    );

    // view_dashboard_summary_modeofpayment_details
    $app->any('/ViewDashboardSummaryModeofpaymentDetailsList', ViewDashboardSummaryModeofpaymentDetailsController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewDashboardSummaryModeofpaymentDetailsList-view_dashboard_summary_modeofpayment_details-list'); // list
    $app->any('/ViewDashboardSummaryModeofpaymentDetailsPreview', ViewDashboardSummaryModeofpaymentDetailsController::class . ':preview')->add(PermissionMiddleware::class)->setName('ViewDashboardSummaryModeofpaymentDetailsPreview-view_dashboard_summary_modeofpayment_details-preview'); // preview
    $app->group(
        '/view_dashboard_summary_modeofpayment_details',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '', ViewDashboardSummaryModeofpaymentDetailsController::class . ':list')->add(PermissionMiddleware::class)->setName('view_dashboard_summary_modeofpayment_details/list-view_dashboard_summary_modeofpayment_details-list-2'); // list
            $group->any('/' . Config("PREVIEW_ACTION") . '', ViewDashboardSummaryModeofpaymentDetailsController::class . ':preview')->add(PermissionMiddleware::class)->setName('view_dashboard_summary_modeofpayment_details/preview-view_dashboard_summary_modeofpayment_details-preview-2'); // preview
        }
    );

    // view_dashboard_service_details
    $app->any('/ViewDashboardServiceDetailsList[/{vid}]', ViewDashboardServiceDetailsController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewDashboardServiceDetailsList-view_dashboard_service_details-list'); // list
    $app->any('/ViewDashboardServiceDetailsSearch', ViewDashboardServiceDetailsController::class . ':search')->add(PermissionMiddleware::class)->setName('ViewDashboardServiceDetailsSearch-view_dashboard_service_details-search'); // search
    $app->any('/ViewDashboardServiceDetailsPreview', ViewDashboardServiceDetailsController::class . ':preview')->add(PermissionMiddleware::class)->setName('ViewDashboardServiceDetailsPreview-view_dashboard_service_details-preview'); // preview
    $app->group(
        '/view_dashboard_service_details',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{vid}]', ViewDashboardServiceDetailsController::class . ':list')->add(PermissionMiddleware::class)->setName('view_dashboard_service_details/list-view_dashboard_service_details-list-2'); // list
            $group->any('/' . Config("SEARCH_ACTION") . '', ViewDashboardServiceDetailsController::class . ':search')->add(PermissionMiddleware::class)->setName('view_dashboard_service_details/search-view_dashboard_service_details-search-2'); // search
            $group->any('/' . Config("PREVIEW_ACTION") . '', ViewDashboardServiceDetailsController::class . ':preview')->add(PermissionMiddleware::class)->setName('view_dashboard_service_details/preview-view_dashboard_service_details-preview-2'); // preview
        }
    );

    // view_dashboard_service_servicetype
    $app->any('/ViewDashboardServiceServicetypeList', ViewDashboardServiceServicetypeController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewDashboardServiceServicetypeList-view_dashboard_service_servicetype-list'); // list
    $app->any('/ViewDashboardServiceServicetypePreview', ViewDashboardServiceServicetypeController::class . ':preview')->add(PermissionMiddleware::class)->setName('ViewDashboardServiceServicetypePreview-view_dashboard_service_servicetype-preview'); // preview
    $app->group(
        '/view_dashboard_service_servicetype',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '', ViewDashboardServiceServicetypeController::class . ':list')->add(PermissionMiddleware::class)->setName('view_dashboard_service_servicetype/list-view_dashboard_service_servicetype-list-2'); // list
            $group->any('/' . Config("PREVIEW_ACTION") . '', ViewDashboardServiceServicetypeController::class . ':preview')->add(PermissionMiddleware::class)->setName('view_dashboard_service_servicetype/preview-view_dashboard_service_servicetype-preview-2'); // preview
        }
    );

    // view_dashboard_service_summary
    $app->any('/ViewDashboardServiceSummaryList', ViewDashboardServiceSummaryController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewDashboardServiceSummaryList-view_dashboard_service_summary-list'); // list
    $app->group(
        '/view_dashboard_service_summary',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '', ViewDashboardServiceSummaryController::class . ':list')->add(PermissionMiddleware::class)->setName('view_dashboard_service_summary/list-view_dashboard_service_summary-list-2'); // list
        }
    );

    // view_dashboard_patient_details
    $app->any('/ViewDashboardPatientDetailsList[/{PatientID}]', ViewDashboardPatientDetailsController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewDashboardPatientDetailsList-view_dashboard_patient_details-list'); // list
    $app->any('/ViewDashboardPatientDetailsPreview', ViewDashboardPatientDetailsController::class . ':preview')->add(PermissionMiddleware::class)->setName('ViewDashboardPatientDetailsPreview-view_dashboard_patient_details-preview'); // preview
    $app->group(
        '/view_dashboard_patient_details',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{PatientID}]', ViewDashboardPatientDetailsController::class . ':list')->add(PermissionMiddleware::class)->setName('view_dashboard_patient_details/list-view_dashboard_patient_details-list-2'); // list
            $group->any('/' . Config("PREVIEW_ACTION") . '', ViewDashboardPatientDetailsController::class . ':preview')->add(PermissionMiddleware::class)->setName('view_dashboard_patient_details/preview-view_dashboard_patient_details-preview-2'); // preview
        }
    );

    // view_dashboard_patient_summary
    $app->any('/ViewDashboardPatientSummaryList', ViewDashboardPatientSummaryController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewDashboardPatientSummaryList-view_dashboard_patient_summary-list'); // list
    $app->group(
        '/view_dashboard_patient_summary',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '', ViewDashboardPatientSummaryController::class . ':list')->add(PermissionMiddleware::class)->setName('view_dashboard_patient_summary/list-view_dashboard_patient_summary-list-2'); // list
        }
    );

    // view_dashboard_summary_payment_mode
    $app->any('/ViewDashboardSummaryPaymentModeList', ViewDashboardSummaryPaymentModeController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewDashboardSummaryPaymentModeList-view_dashboard_summary_payment_mode-list'); // list
    $app->group(
        '/view_dashboard_summary_payment_mode',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '', ViewDashboardSummaryPaymentModeController::class . ':list')->add(PermissionMiddleware::class)->setName('view_dashboard_summary_payment_mode/list-view_dashboard_summary_payment_mode-list-2'); // list
        }
    );

    // view_billing_transaction
    $app->any('/ViewBillingTransactionList', ViewBillingTransactionController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewBillingTransactionList-view_billing_transaction-list'); // list
    $app->group(
        '/view_billing_transaction',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '', ViewBillingTransactionController::class . ':list')->add(PermissionMiddleware::class)->setName('view_billing_transaction/list-view_billing_transaction-list-2'); // list
        }
    );

    // view_dashboard_service_drwise_summary
    $app->any('/ViewDashboardServiceDrwiseSummaryList', ViewDashboardServiceDrwiseSummaryController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewDashboardServiceDrwiseSummaryList-view_dashboard_service_drwise_summary-list'); // list
    $app->group(
        '/view_dashboard_service_drwise_summary',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '', ViewDashboardServiceDrwiseSummaryController::class . ':list')->add(PermissionMiddleware::class)->setName('view_dashboard_service_drwise_summary/list-view_dashboard_service_drwise_summary-list-2'); // list
        }
    );

    // view_till_search_view2
    $app->any('/ViewTillSearchView2List[/{id}]', ViewTillSearchView2Controller::class . ':list')->add(PermissionMiddleware::class)->setName('ViewTillSearchView2List-view_till_search_view2-list'); // list
    $app->group(
        '/view_till_search_view2',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', ViewTillSearchView2Controller::class . ':list')->add(PermissionMiddleware::class)->setName('view_till_search_view2/list-view_till_search_view2-list-2'); // list
        }
    );

    // ivf_stimulation_gnrh
    $app->any('/IvfStimulationGnrhList[/{id}]', IvfStimulationGnrhController::class . ':list')->add(PermissionMiddleware::class)->setName('IvfStimulationGnrhList-ivf_stimulation_gnrh-list'); // list
    $app->any('/IvfStimulationGnrhAdd[/{id}]', IvfStimulationGnrhController::class . ':add')->add(PermissionMiddleware::class)->setName('IvfStimulationGnrhAdd-ivf_stimulation_gnrh-add'); // add
    $app->any('/IvfStimulationGnrhAddopt', IvfStimulationGnrhController::class . ':addopt')->add(PermissionMiddleware::class)->setName('IvfStimulationGnrhAddopt-ivf_stimulation_gnrh-addopt'); // addopt
    $app->any('/IvfStimulationGnrhView[/{id}]', IvfStimulationGnrhController::class . ':view')->add(PermissionMiddleware::class)->setName('IvfStimulationGnrhView-ivf_stimulation_gnrh-view'); // view
    $app->any('/IvfStimulationGnrhEdit[/{id}]', IvfStimulationGnrhController::class . ':edit')->add(PermissionMiddleware::class)->setName('IvfStimulationGnrhEdit-ivf_stimulation_gnrh-edit'); // edit
    $app->any('/IvfStimulationGnrhDelete[/{id}]', IvfStimulationGnrhController::class . ':delete')->add(PermissionMiddleware::class)->setName('IvfStimulationGnrhDelete-ivf_stimulation_gnrh-delete'); // delete
    $app->group(
        '/ivf_stimulation_gnrh',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', IvfStimulationGnrhController::class . ':list')->add(PermissionMiddleware::class)->setName('ivf_stimulation_gnrh/list-ivf_stimulation_gnrh-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', IvfStimulationGnrhController::class . ':add')->add(PermissionMiddleware::class)->setName('ivf_stimulation_gnrh/add-ivf_stimulation_gnrh-add-2'); // add
            $group->any('/' . Config("ADDOPT_ACTION") . '', IvfStimulationGnrhController::class . ':addopt')->add(PermissionMiddleware::class)->setName('ivf_stimulation_gnrh/addopt-ivf_stimulation_gnrh-addopt-2'); // addopt
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', IvfStimulationGnrhController::class . ':view')->add(PermissionMiddleware::class)->setName('ivf_stimulation_gnrh/view-ivf_stimulation_gnrh-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', IvfStimulationGnrhController::class . ':edit')->add(PermissionMiddleware::class)->setName('ivf_stimulation_gnrh/edit-ivf_stimulation_gnrh-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', IvfStimulationGnrhController::class . ':delete')->add(PermissionMiddleware::class)->setName('ivf_stimulation_gnrh/delete-ivf_stimulation_gnrh-delete-2'); // delete
        }
    );

    // ivf_stimulation_hmg
    $app->any('/IvfStimulationHmgList[/{id}]', IvfStimulationHmgController::class . ':list')->add(PermissionMiddleware::class)->setName('IvfStimulationHmgList-ivf_stimulation_hmg-list'); // list
    $app->any('/IvfStimulationHmgAdd[/{id}]', IvfStimulationHmgController::class . ':add')->add(PermissionMiddleware::class)->setName('IvfStimulationHmgAdd-ivf_stimulation_hmg-add'); // add
    $app->any('/IvfStimulationHmgAddopt', IvfStimulationHmgController::class . ':addopt')->add(PermissionMiddleware::class)->setName('IvfStimulationHmgAddopt-ivf_stimulation_hmg-addopt'); // addopt
    $app->any('/IvfStimulationHmgView[/{id}]', IvfStimulationHmgController::class . ':view')->add(PermissionMiddleware::class)->setName('IvfStimulationHmgView-ivf_stimulation_hmg-view'); // view
    $app->any('/IvfStimulationHmgEdit[/{id}]', IvfStimulationHmgController::class . ':edit')->add(PermissionMiddleware::class)->setName('IvfStimulationHmgEdit-ivf_stimulation_hmg-edit'); // edit
    $app->any('/IvfStimulationHmgDelete[/{id}]', IvfStimulationHmgController::class . ':delete')->add(PermissionMiddleware::class)->setName('IvfStimulationHmgDelete-ivf_stimulation_hmg-delete'); // delete
    $app->group(
        '/ivf_stimulation_hmg',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', IvfStimulationHmgController::class . ':list')->add(PermissionMiddleware::class)->setName('ivf_stimulation_hmg/list-ivf_stimulation_hmg-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', IvfStimulationHmgController::class . ':add')->add(PermissionMiddleware::class)->setName('ivf_stimulation_hmg/add-ivf_stimulation_hmg-add-2'); // add
            $group->any('/' . Config("ADDOPT_ACTION") . '', IvfStimulationHmgController::class . ':addopt')->add(PermissionMiddleware::class)->setName('ivf_stimulation_hmg/addopt-ivf_stimulation_hmg-addopt-2'); // addopt
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', IvfStimulationHmgController::class . ':view')->add(PermissionMiddleware::class)->setName('ivf_stimulation_hmg/view-ivf_stimulation_hmg-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', IvfStimulationHmgController::class . ':edit')->add(PermissionMiddleware::class)->setName('ivf_stimulation_hmg/edit-ivf_stimulation_hmg-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', IvfStimulationHmgController::class . ':delete')->add(PermissionMiddleware::class)->setName('ivf_stimulation_hmg/delete-ivf_stimulation_hmg-delete-2'); // delete
        }
    );

    // ivf_stimulation_rfsh
    $app->any('/IvfStimulationRfshList[/{id}]', IvfStimulationRfshController::class . ':list')->add(PermissionMiddleware::class)->setName('IvfStimulationRfshList-ivf_stimulation_rfsh-list'); // list
    $app->any('/IvfStimulationRfshAdd[/{id}]', IvfStimulationRfshController::class . ':add')->add(PermissionMiddleware::class)->setName('IvfStimulationRfshAdd-ivf_stimulation_rfsh-add'); // add
    $app->any('/IvfStimulationRfshAddopt', IvfStimulationRfshController::class . ':addopt')->add(PermissionMiddleware::class)->setName('IvfStimulationRfshAddopt-ivf_stimulation_rfsh-addopt'); // addopt
    $app->any('/IvfStimulationRfshView[/{id}]', IvfStimulationRfshController::class . ':view')->add(PermissionMiddleware::class)->setName('IvfStimulationRfshView-ivf_stimulation_rfsh-view'); // view
    $app->any('/IvfStimulationRfshEdit[/{id}]', IvfStimulationRfshController::class . ':edit')->add(PermissionMiddleware::class)->setName('IvfStimulationRfshEdit-ivf_stimulation_rfsh-edit'); // edit
    $app->any('/IvfStimulationRfshDelete[/{id}]', IvfStimulationRfshController::class . ':delete')->add(PermissionMiddleware::class)->setName('IvfStimulationRfshDelete-ivf_stimulation_rfsh-delete'); // delete
    $app->group(
        '/ivf_stimulation_rfsh',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', IvfStimulationRfshController::class . ':list')->add(PermissionMiddleware::class)->setName('ivf_stimulation_rfsh/list-ivf_stimulation_rfsh-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', IvfStimulationRfshController::class . ':add')->add(PermissionMiddleware::class)->setName('ivf_stimulation_rfsh/add-ivf_stimulation_rfsh-add-2'); // add
            $group->any('/' . Config("ADDOPT_ACTION") . '', IvfStimulationRfshController::class . ':addopt')->add(PermissionMiddleware::class)->setName('ivf_stimulation_rfsh/addopt-ivf_stimulation_rfsh-addopt-2'); // addopt
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', IvfStimulationRfshController::class . ':view')->add(PermissionMiddleware::class)->setName('ivf_stimulation_rfsh/view-ivf_stimulation_rfsh-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', IvfStimulationRfshController::class . ':edit')->add(PermissionMiddleware::class)->setName('ivf_stimulation_rfsh/edit-ivf_stimulation_rfsh-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', IvfStimulationRfshController::class . ':delete')->add(PermissionMiddleware::class)->setName('ivf_stimulation_rfsh/delete-ivf_stimulation_rfsh-delete-2'); // delete
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', TaskManagementController::class . ':list')->add(PermissionMiddleware::class)->setName('task_management/list-task_management-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', TaskManagementController::class . ':add')->add(PermissionMiddleware::class)->setName('task_management/add-task_management-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', TaskManagementController::class . ':view')->add(PermissionMiddleware::class)->setName('task_management/view-task_management-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', TaskManagementController::class . ':edit')->add(PermissionMiddleware::class)->setName('task_management/edit-task_management-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', TaskManagementController::class . ':delete')->add(PermissionMiddleware::class)->setName('task_management/delete-task_management-delete-2'); // delete
        }
    );

    // view_delivery_registered
    $app->any('/ViewDeliveryRegisteredList[/{PatientID}]', ViewDeliveryRegisteredController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewDeliveryRegisteredList-view_delivery_registered-list'); // list
    $app->group(
        '/view_delivery_registered',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{PatientID}]', ViewDeliveryRegisteredController::class . ':list')->add(PermissionMiddleware::class)->setName('view_delivery_registered/list-view_delivery_registered-list-2'); // list
        }
    );

    // view_icsi_advised
    $app->any('/ViewIcsiAdvisedList[/{PatientID}]', ViewIcsiAdvisedController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewIcsiAdvisedList-view_icsi_advised-list'); // list
    $app->group(
        '/view_icsi_advised',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{PatientID}]', ViewIcsiAdvisedController::class . ':list')->add(PermissionMiddleware::class)->setName('view_icsi_advised/list-view_icsi_advised-list-2'); // list
        }
    );

    // view_next_review_date
    $app->any('/ViewNextReviewDateList', ViewNextReviewDateController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewNextReviewDateList-view_next_review_date-list'); // list
    $app->group(
        '/view_next_review_date',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '', ViewNextReviewDateController::class . ':list')->add(PermissionMiddleware::class)->setName('view_next_review_date/list-view_next_review_date-list-2'); // list
        }
    );

    // BillCollectionReport
    $app->any('/BillCollectionReport[/{params:.*}]', BillCollectionReportController::class)->add(PermissionMiddleware::class)->setName('BillCollectionReport-BillCollectionReport-custom'); // custom

    // CollectionSummary
    $app->any('/CollectionSummary[/{params:.*}]', CollectionSummaryController::class)->add(PermissionMiddleware::class)->setName('CollectionSummary-CollectionSummary-custom'); // custom

    // view_bill_collection_report
    $app->any('/ViewBillCollectionReportList', ViewBillCollectionReportController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewBillCollectionReportList-view_bill_collection_report-list'); // list
    $app->group(
        '/view_bill_collection_report',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '', ViewBillCollectionReportController::class . ':list')->add(PermissionMiddleware::class)->setName('view_bill_collection_report/list-view_bill_collection_report-list-2'); // list
        }
    );

    // view_bill_collection_summary
    $app->any('/ViewBillCollectionSummaryList', ViewBillCollectionSummaryController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewBillCollectionSummaryList-view_bill_collection_summary-list'); // list
    $app->group(
        '/view_bill_collection_summary',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '', ViewBillCollectionSummaryController::class . ':list')->add(PermissionMiddleware::class)->setName('view_bill_collection_summary/list-view_bill_collection_summary-list-2'); // list
        }
    );

    // view_procedure_registered
    $app->any('/ViewProcedureRegisteredList[/{PatientID}]', ViewProcedureRegisteredController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewProcedureRegisteredList-view_procedure_registered-list'); // list
    $app->group(
        '/view_procedure_registered',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{PatientID}]', ViewProcedureRegisteredController::class . ':list')->add(PermissionMiddleware::class)->setName('view_procedure_registered/list-view_procedure_registered-list-2'); // list
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', MonitorTreatmentPlanController::class . ':list')->add(PermissionMiddleware::class)->setName('monitor_treatment_plan/list-monitor_treatment_plan-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', MonitorTreatmentPlanController::class . ':add')->add(PermissionMiddleware::class)->setName('monitor_treatment_plan/add-monitor_treatment_plan-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', MonitorTreatmentPlanController::class . ':view')->add(PermissionMiddleware::class)->setName('monitor_treatment_plan/view-monitor_treatment_plan-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', MonitorTreatmentPlanController::class . ':edit')->add(PermissionMiddleware::class)->setName('monitor_treatment_plan/edit-monitor_treatment_plan-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', MonitorTreatmentPlanController::class . ':delete')->add(PermissionMiddleware::class)->setName('monitor_treatment_plan/delete-monitor_treatment_plan-delete-2'); // delete
        }
    );

    // view_pharmacy_search_product_new
    $app->any('/ViewPharmacySearchProductNewList[/{id}]', ViewPharmacySearchProductNewController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewPharmacySearchProductNewList-view_pharmacy_search_product_new-list'); // list
    $app->group(
        '/view_pharmacy_search_product_new',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', ViewPharmacySearchProductNewController::class . ':list')->add(PermissionMiddleware::class)->setName('view_pharmacy_search_product_new/list-view_pharmacy_search_product_new-list-2'); // list
        }
    );

    // view_iui_excel
    $app->any('/ViewIuiExcelList[/{CoupleID}]', ViewIuiExcelController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewIuiExcelList-view_iui_excel-list'); // list
    $app->any('/ViewIuiExcelSearch', ViewIuiExcelController::class . ':search')->add(PermissionMiddleware::class)->setName('ViewIuiExcelSearch-view_iui_excel-search'); // search
    $app->group(
        '/view_iui_excel',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{CoupleID}]', ViewIuiExcelController::class . ':list')->add(PermissionMiddleware::class)->setName('view_iui_excel/list-view_iui_excel-list-2'); // list
            $group->any('/' . Config("SEARCH_ACTION") . '', ViewIuiExcelController::class . ':search')->add(PermissionMiddleware::class)->setName('view_iui_excel/search-view_iui_excel-search-2'); // search
        }
    );

    // view_lab_service
    $app->any('/ViewLabServiceList[/{Id}]', ViewLabServiceController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewLabServiceList-view_lab_service-list'); // list
    $app->any('/ViewLabServiceAdd[/{Id}]', ViewLabServiceController::class . ':add')->add(PermissionMiddleware::class)->setName('ViewLabServiceAdd-view_lab_service-add'); // add
    $app->any('/ViewLabServiceView[/{Id}]', ViewLabServiceController::class . ':view')->add(PermissionMiddleware::class)->setName('ViewLabServiceView-view_lab_service-view'); // view
    $app->any('/ViewLabServiceEdit[/{Id}]', ViewLabServiceController::class . ':edit')->add(PermissionMiddleware::class)->setName('ViewLabServiceEdit-view_lab_service-edit'); // edit
    $app->any('/ViewLabServiceDelete[/{Id}]', ViewLabServiceController::class . ':delete')->add(PermissionMiddleware::class)->setName('ViewLabServiceDelete-view_lab_service-delete'); // delete
    $app->group(
        '/view_lab_service',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{Id}]', ViewLabServiceController::class . ':list')->add(PermissionMiddleware::class)->setName('view_lab_service/list-view_lab_service-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{Id}]', ViewLabServiceController::class . ':add')->add(PermissionMiddleware::class)->setName('view_lab_service/add-view_lab_service-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{Id}]', ViewLabServiceController::class . ':view')->add(PermissionMiddleware::class)->setName('view_lab_service/view-view_lab_service-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{Id}]', ViewLabServiceController::class . ':edit')->add(PermissionMiddleware::class)->setName('view_lab_service/edit-view_lab_service-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{Id}]', ViewLabServiceController::class . ':delete')->add(PermissionMiddleware::class)->setName('view_lab_service/delete-view_lab_service-delete-2'); // delete
        }
    );

    // view_patient_services_dashboard2
    $app->any('/ViewPatientServicesDashboard2List[/{id}]', ViewPatientServicesDashboard2Controller::class . ':list')->add(PermissionMiddleware::class)->setName('ViewPatientServicesDashboard2List-view_patient_services_dashboard2-list'); // list
    $app->group(
        '/view_patient_services_dashboard2',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', ViewPatientServicesDashboard2Controller::class . ':list')->add(PermissionMiddleware::class)->setName('view_patient_services_dashboard2/list-view_patient_services_dashboard2-list-2'); // list
        }
    );

    // view_find_diff_bills
    $app->any('/ViewFindDiffBillsList', ViewFindDiffBillsController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewFindDiffBillsList-view_find_diff_bills-list'); // list
    $app->group(
        '/view_find_diff_bills',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '', ViewFindDiffBillsController::class . ':list')->add(PermissionMiddleware::class)->setName('view_find_diff_bills/list-view_find_diff_bills-list-2'); // list
        }
    );

    // view_lab_profile
    $app->any('/ViewLabProfileList[/{Id}]', ViewLabProfileController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewLabProfileList-view_lab_profile-list'); // list
    $app->any('/ViewLabProfileAdd[/{Id}]', ViewLabProfileController::class . ':add')->add(PermissionMiddleware::class)->setName('ViewLabProfileAdd-view_lab_profile-add'); // add
    $app->any('/ViewLabProfileView[/{Id}]', ViewLabProfileController::class . ':view')->add(PermissionMiddleware::class)->setName('ViewLabProfileView-view_lab_profile-view'); // view
    $app->any('/ViewLabProfileEdit[/{Id}]', ViewLabProfileController::class . ':edit')->add(PermissionMiddleware::class)->setName('ViewLabProfileEdit-view_lab_profile-edit'); // edit
    $app->any('/ViewLabProfileDelete[/{Id}]', ViewLabProfileController::class . ':delete')->add(PermissionMiddleware::class)->setName('ViewLabProfileDelete-view_lab_profile-delete'); // delete
    $app->group(
        '/view_lab_profile',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{Id}]', ViewLabProfileController::class . ':list')->add(PermissionMiddleware::class)->setName('view_lab_profile/list-view_lab_profile-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{Id}]', ViewLabProfileController::class . ':add')->add(PermissionMiddleware::class)->setName('view_lab_profile/add-view_lab_profile-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{Id}]', ViewLabProfileController::class . ':view')->add(PermissionMiddleware::class)->setName('view_lab_profile/view-view_lab_profile-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{Id}]', ViewLabProfileController::class . ':edit')->add(PermissionMiddleware::class)->setName('view_lab_profile/edit-view_lab_profile-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{Id}]', ViewLabProfileController::class . ':delete')->add(PermissionMiddleware::class)->setName('view_lab_profile/delete-view_lab_profile-delete-2'); // delete
        }
    );

    // view_lab_servicess
    $app->any('/ViewLabServicessList[/{id}]', ViewLabServicessController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewLabServicessList-view_lab_servicess-list'); // list
    $app->any('/ViewLabServicessView[/{id}]', ViewLabServicessController::class . ':view')->add(PermissionMiddleware::class)->setName('ViewLabServicessView-view_lab_servicess-view'); // view
    $app->any('/ViewLabServicessSearch', ViewLabServicessController::class . ':search')->add(PermissionMiddleware::class)->setName('ViewLabServicessSearch-view_lab_servicess-search'); // search
    $app->group(
        '/view_lab_servicess',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', ViewLabServicessController::class . ':list')->add(PermissionMiddleware::class)->setName('view_lab_servicess/list-view_lab_servicess-list-2'); // list
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', ViewLabServicessController::class . ':view')->add(PermissionMiddleware::class)->setName('view_lab_servicess/view-view_lab_servicess-view-2'); // view
            $group->any('/' . Config("SEARCH_ACTION") . '', ViewLabServicessController::class . ':search')->add(PermissionMiddleware::class)->setName('view_lab_servicess/search-view_lab_servicess-search-2'); // search
        }
    );

    // view_lab_resultreleasedd
    $app->any('/ViewLabResultreleaseddList[/{id}]', ViewLabResultreleaseddController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewLabResultreleaseddList-view_lab_resultreleasedd-list'); // list
    $app->any('/ViewLabResultreleaseddPreview', ViewLabResultreleaseddController::class . ':preview')->add(PermissionMiddleware::class)->setName('ViewLabResultreleaseddPreview-view_lab_resultreleasedd-preview'); // preview
    $app->group(
        '/view_lab_resultreleasedd',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', ViewLabResultreleaseddController::class . ':list')->add(PermissionMiddleware::class)->setName('view_lab_resultreleasedd/list-view_lab_resultreleasedd-list-2'); // list
            $group->any('/' . Config("PREVIEW_ACTION") . '', ViewLabResultreleaseddController::class . ':preview')->add(PermissionMiddleware::class)->setName('view_lab_resultreleasedd/preview-view_lab_resultreleasedd-preview-2'); // preview
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}/{PatientID}]', PatientAppController::class . ':list')->add(PermissionMiddleware::class)->setName('patient_app/list-patient_app-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}/{PatientID}]', PatientAppController::class . ':add')->add(PermissionMiddleware::class)->setName('patient_app/add-patient_app-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}/{PatientID}]', PatientAppController::class . ':view')->add(PermissionMiddleware::class)->setName('patient_app/view-patient_app-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}/{PatientID}]', PatientAppController::class . ':edit')->add(PermissionMiddleware::class)->setName('patient_app/edit-patient_app-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}/{PatientID}]', PatientAppController::class . ':delete')->add(PermissionMiddleware::class)->setName('patient_app/delete-patient_app-delete-2'); // delete
        }
    );

    // bulkservice
    $app->any('/Bulkservice[/{params:.*}]', BulkserviceController::class)->add(PermissionMiddleware::class)->setName('Bulkservice-bulkservice-custom'); // custom

    // bulkserviceinsert
    $app->any('/Bulkserviceinsert[/{params:.*}]', BulkserviceinsertController::class)->add(PermissionMiddleware::class)->setName('Bulkserviceinsert-bulkserviceinsert-custom'); // custom

    // mas_lab_services_type
    $app->any('/MasLabServicesTypeList[/{id}]', MasLabServicesTypeController::class . ':list')->add(PermissionMiddleware::class)->setName('MasLabServicesTypeList-mas_lab_services_type-list'); // list
    $app->any('/MasLabServicesTypeAdd[/{id}]', MasLabServicesTypeController::class . ':add')->add(PermissionMiddleware::class)->setName('MasLabServicesTypeAdd-mas_lab_services_type-add'); // add
    $app->any('/MasLabServicesTypeAddopt', MasLabServicesTypeController::class . ':addopt')->add(PermissionMiddleware::class)->setName('MasLabServicesTypeAddopt-mas_lab_services_type-addopt'); // addopt
    $app->any('/MasLabServicesTypeView[/{id}]', MasLabServicesTypeController::class . ':view')->add(PermissionMiddleware::class)->setName('MasLabServicesTypeView-mas_lab_services_type-view'); // view
    $app->any('/MasLabServicesTypeEdit[/{id}]', MasLabServicesTypeController::class . ':edit')->add(PermissionMiddleware::class)->setName('MasLabServicesTypeEdit-mas_lab_services_type-edit'); // edit
    $app->any('/MasLabServicesTypeDelete[/{id}]', MasLabServicesTypeController::class . ':delete')->add(PermissionMiddleware::class)->setName('MasLabServicesTypeDelete-mas_lab_services_type-delete'); // delete
    $app->group(
        '/mas_lab_services_type',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', MasLabServicesTypeController::class . ':list')->add(PermissionMiddleware::class)->setName('mas_lab_services_type/list-mas_lab_services_type-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', MasLabServicesTypeController::class . ':add')->add(PermissionMiddleware::class)->setName('mas_lab_services_type/add-mas_lab_services_type-add-2'); // add
            $group->any('/' . Config("ADDOPT_ACTION") . '', MasLabServicesTypeController::class . ':addopt')->add(PermissionMiddleware::class)->setName('mas_lab_services_type/addopt-mas_lab_services_type-addopt-2'); // addopt
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', MasLabServicesTypeController::class . ':view')->add(PermissionMiddleware::class)->setName('mas_lab_services_type/view-mas_lab_services_type-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', MasLabServicesTypeController::class . ':edit')->add(PermissionMiddleware::class)->setName('mas_lab_services_type/edit-mas_lab_services_type-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', MasLabServicesTypeController::class . ':delete')->add(PermissionMiddleware::class)->setName('mas_lab_services_type/delete-mas_lab_services_type-delete-2'); // delete
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', LabDeptMastController::class . ':list')->add(PermissionMiddleware::class)->setName('lab_dept_mast/list-lab_dept_mast-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', LabDeptMastController::class . ':add')->add(PermissionMiddleware::class)->setName('lab_dept_mast/add-lab_dept_mast-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', LabDeptMastController::class . ':view')->add(PermissionMiddleware::class)->setName('lab_dept_mast/view-lab_dept_mast-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', LabDeptMastController::class . ':edit')->add(PermissionMiddleware::class)->setName('lab_dept_mast/edit-lab_dept_mast-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', LabDeptMastController::class . ':delete')->add(PermissionMiddleware::class)->setName('lab_dept_mast/delete-lab_dept_mast-delete-2'); // delete
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', LabDrugMastController::class . ':list')->add(PermissionMiddleware::class)->setName('lab_drug_mast/list-lab_drug_mast-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', LabDrugMastController::class . ':add')->add(PermissionMiddleware::class)->setName('lab_drug_mast/add-lab_drug_mast-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', LabDrugMastController::class . ':view')->add(PermissionMiddleware::class)->setName('lab_drug_mast/view-lab_drug_mast-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', LabDrugMastController::class . ':edit')->add(PermissionMiddleware::class)->setName('lab_drug_mast/edit-lab_drug_mast-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', LabDrugMastController::class . ':delete')->add(PermissionMiddleware::class)->setName('lab_drug_mast/delete-lab_drug_mast-delete-2'); // delete
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', LabSepcimenMastController::class . ':list')->add(PermissionMiddleware::class)->setName('lab_sepcimen_mast/list-lab_sepcimen_mast-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', LabSepcimenMastController::class . ':add')->add(PermissionMiddleware::class)->setName('lab_sepcimen_mast/add-lab_sepcimen_mast-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', LabSepcimenMastController::class . ':view')->add(PermissionMiddleware::class)->setName('lab_sepcimen_mast/view-lab_sepcimen_mast-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', LabSepcimenMastController::class . ':edit')->add(PermissionMiddleware::class)->setName('lab_sepcimen_mast/edit-lab_sepcimen_mast-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', LabSepcimenMastController::class . ':delete')->add(PermissionMiddleware::class)->setName('lab_sepcimen_mast/delete-lab_sepcimen_mast-delete-2'); // delete
        }
    );

    // view_lab_service_sub
    $app->any('/ViewLabServiceSubList[/{Id}]', ViewLabServiceSubController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewLabServiceSubList-view_lab_service_sub-list'); // list
    $app->any('/ViewLabServiceSubAdd[/{Id}]', ViewLabServiceSubController::class . ':add')->add(PermissionMiddleware::class)->setName('ViewLabServiceSubAdd-view_lab_service_sub-add'); // add
    $app->any('/ViewLabServiceSubView[/{Id}]', ViewLabServiceSubController::class . ':view')->add(PermissionMiddleware::class)->setName('ViewLabServiceSubView-view_lab_service_sub-view'); // view
    $app->any('/ViewLabServiceSubEdit[/{Id}]', ViewLabServiceSubController::class . ':edit')->add(PermissionMiddleware::class)->setName('ViewLabServiceSubEdit-view_lab_service_sub-edit'); // edit
    $app->any('/ViewLabServiceSubDelete[/{Id}]', ViewLabServiceSubController::class . ':delete')->add(PermissionMiddleware::class)->setName('ViewLabServiceSubDelete-view_lab_service_sub-delete'); // delete
    $app->any('/ViewLabServiceSubPreview', ViewLabServiceSubController::class . ':preview')->add(PermissionMiddleware::class)->setName('ViewLabServiceSubPreview-view_lab_service_sub-preview'); // preview
    $app->group(
        '/view_lab_service_sub',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{Id}]', ViewLabServiceSubController::class . ':list')->add(PermissionMiddleware::class)->setName('view_lab_service_sub/list-view_lab_service_sub-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{Id}]', ViewLabServiceSubController::class . ':add')->add(PermissionMiddleware::class)->setName('view_lab_service_sub/add-view_lab_service_sub-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{Id}]', ViewLabServiceSubController::class . ':view')->add(PermissionMiddleware::class)->setName('view_lab_service_sub/view-view_lab_service_sub-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{Id}]', ViewLabServiceSubController::class . ':edit')->add(PermissionMiddleware::class)->setName('view_lab_service_sub/edit-view_lab_service_sub-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{Id}]', ViewLabServiceSubController::class . ':delete')->add(PermissionMiddleware::class)->setName('view_lab_service_sub/delete-view_lab_service_sub-delete-2'); // delete
            $group->any('/' . Config("PREVIEW_ACTION") . '', ViewLabServiceSubController::class . ':preview')->add(PermissionMiddleware::class)->setName('view_lab_service_sub/preview-view_lab_service_sub-preview-2'); // preview
        }
    );

    // view_treatmend_status
    $app->any('/ViewTreatmendStatusList[/{id}/{PatientID}]', ViewTreatmendStatusController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewTreatmendStatusList-view_treatmend_status-list'); // list
    $app->group(
        '/view_treatmend_status',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}/{PatientID}]', ViewTreatmendStatusController::class . ':list')->add(PermissionMiddleware::class)->setName('view_treatmend_status/list-view_treatmend_status-list-2'); // list
        }
    );

    // view_treatment_culture
    $app->any('/ViewTreatmentCultureList', ViewTreatmentCultureController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewTreatmentCultureList-view_treatment_culture-list'); // list
    $app->group(
        '/view_treatment_culture',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '', ViewTreatmentCultureController::class . ':list')->add(PermissionMiddleware::class)->setName('view_treatment_culture/list-view_treatment_culture-list-2'); // list
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', AppointmentPatienttypeeController::class . ':list')->add(PermissionMiddleware::class)->setName('appointment_patienttypee/list-appointment_patienttypee-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', AppointmentPatienttypeeController::class . ':add')->add(PermissionMiddleware::class)->setName('appointment_patienttypee/add-appointment_patienttypee-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', AppointmentPatienttypeeController::class . ':view')->add(PermissionMiddleware::class)->setName('appointment_patienttypee/view-appointment_patienttypee-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', AppointmentPatienttypeeController::class . ':edit')->add(PermissionMiddleware::class)->setName('appointment_patienttypee/edit-appointment_patienttypee-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', AppointmentPatienttypeeController::class . ':delete')->add(PermissionMiddleware::class)->setName('appointment_patienttypee/delete-appointment_patienttypee-delete-2'); // delete
        }
    );

    // view_lab_services_auth
    $app->any('/ViewLabServicesAuthList[/{id}]', ViewLabServicesAuthController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewLabServicesAuthList-view_lab_services_auth-list'); // list
    $app->any('/ViewLabServicesAuthView[/{id}]', ViewLabServicesAuthController::class . ':view')->add(PermissionMiddleware::class)->setName('ViewLabServicesAuthView-view_lab_services_auth-view'); // view
    $app->any('/ViewLabServicesAuthSearch', ViewLabServicesAuthController::class . ':search')->add(PermissionMiddleware::class)->setName('ViewLabServicesAuthSearch-view_lab_services_auth-search'); // search
    $app->group(
        '/view_lab_services_auth',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', ViewLabServicesAuthController::class . ':list')->add(PermissionMiddleware::class)->setName('view_lab_services_auth/list-view_lab_services_auth-list-2'); // list
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', ViewLabServicesAuthController::class . ':view')->add(PermissionMiddleware::class)->setName('view_lab_services_auth/view-view_lab_services_auth-view-2'); // view
            $group->any('/' . Config("SEARCH_ACTION") . '', ViewLabServicesAuthController::class . ':search')->add(PermissionMiddleware::class)->setName('view_lab_services_auth/search-view_lab_services_auth-search-2'); // search
        }
    );

    // view_lab_resultreleased_auth
    $app->any('/ViewLabResultreleasedAuthList[/{id}]', ViewLabResultreleasedAuthController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewLabResultreleasedAuthList-view_lab_resultreleased_auth-list'); // list
    $app->any('/ViewLabResultreleasedAuthPreview', ViewLabResultreleasedAuthController::class . ':preview')->add(PermissionMiddleware::class)->setName('ViewLabResultreleasedAuthPreview-view_lab_resultreleased_auth-preview'); // preview
    $app->group(
        '/view_lab_resultreleased_auth',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', ViewLabResultreleasedAuthController::class . ':list')->add(PermissionMiddleware::class)->setName('view_lab_resultreleased_auth/list-view_lab_resultreleased_auth-list-2'); // list
            $group->any('/' . Config("PREVIEW_ACTION") . '', ViewLabResultreleasedAuthController::class . ':preview')->add(PermissionMiddleware::class)->setName('view_lab_resultreleased_auth/preview-view_lab_resultreleased_auth-preview-2'); // preview
        }
    );

    // patient_an_registration
    $app->any('/PatientAnRegistrationList[/{id}]', PatientAnRegistrationController::class . ':list')->add(PermissionMiddleware::class)->setName('PatientAnRegistrationList-patient_an_registration-list'); // list
    $app->any('/PatientAnRegistrationAdd[/{id}]', PatientAnRegistrationController::class . ':add')->add(PermissionMiddleware::class)->setName('PatientAnRegistrationAdd-patient_an_registration-add'); // add
    $app->any('/PatientAnRegistrationView[/{id}]', PatientAnRegistrationController::class . ':view')->add(PermissionMiddleware::class)->setName('PatientAnRegistrationView-patient_an_registration-view'); // view
    $app->any('/PatientAnRegistrationEdit[/{id}]', PatientAnRegistrationController::class . ':edit')->add(PermissionMiddleware::class)->setName('PatientAnRegistrationEdit-patient_an_registration-edit'); // edit
    $app->any('/PatientAnRegistrationDelete[/{id}]', PatientAnRegistrationController::class . ':delete')->add(PermissionMiddleware::class)->setName('PatientAnRegistrationDelete-patient_an_registration-delete'); // delete
    $app->any('/PatientAnRegistrationPreview', PatientAnRegistrationController::class . ':preview')->add(PermissionMiddleware::class)->setName('PatientAnRegistrationPreview-patient_an_registration-preview'); // preview
    $app->group(
        '/patient_an_registration',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', PatientAnRegistrationController::class . ':list')->add(PermissionMiddleware::class)->setName('patient_an_registration/list-patient_an_registration-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', PatientAnRegistrationController::class . ':add')->add(PermissionMiddleware::class)->setName('patient_an_registration/add-patient_an_registration-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', PatientAnRegistrationController::class . ':view')->add(PermissionMiddleware::class)->setName('patient_an_registration/view-patient_an_registration-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', PatientAnRegistrationController::class . ':edit')->add(PermissionMiddleware::class)->setName('patient_an_registration/edit-patient_an_registration-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', PatientAnRegistrationController::class . ':delete')->add(PermissionMiddleware::class)->setName('patient_an_registration/delete-patient_an_registration-delete-2'); // delete
            $group->any('/' . Config("PREVIEW_ACTION") . '', PatientAnRegistrationController::class . ':preview')->add(PermissionMiddleware::class)->setName('patient_an_registration/preview-patient_an_registration-preview-2'); // preview
        }
    );

    // view_appointment_scheduler_new
    $app->any('/ViewAppointmentSchedulerNewList[/{Id}]', ViewAppointmentSchedulerNewController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewAppointmentSchedulerNewList-view_appointment_scheduler_new-list'); // list
    $app->any('/ViewAppointmentSchedulerNewAdd[/{Id}]', ViewAppointmentSchedulerNewController::class . ':add')->add(PermissionMiddleware::class)->setName('ViewAppointmentSchedulerNewAdd-view_appointment_scheduler_new-add'); // add
    $app->any('/ViewAppointmentSchedulerNewView[/{Id}]', ViewAppointmentSchedulerNewController::class . ':view')->add(PermissionMiddleware::class)->setName('ViewAppointmentSchedulerNewView-view_appointment_scheduler_new-view'); // view
    $app->any('/ViewAppointmentSchedulerNewEdit[/{Id}]', ViewAppointmentSchedulerNewController::class . ':edit')->add(PermissionMiddleware::class)->setName('ViewAppointmentSchedulerNewEdit-view_appointment_scheduler_new-edit'); // edit
    $app->any('/ViewAppointmentSchedulerNewUpdate', ViewAppointmentSchedulerNewController::class . ':update')->add(PermissionMiddleware::class)->setName('ViewAppointmentSchedulerNewUpdate-view_appointment_scheduler_new-update'); // update
    $app->any('/ViewAppointmentSchedulerNewDelete[/{Id}]', ViewAppointmentSchedulerNewController::class . ':delete')->add(PermissionMiddleware::class)->setName('ViewAppointmentSchedulerNewDelete-view_appointment_scheduler_new-delete'); // delete
    $app->any('/ViewAppointmentSchedulerNewSearch', ViewAppointmentSchedulerNewController::class . ':search')->add(PermissionMiddleware::class)->setName('ViewAppointmentSchedulerNewSearch-view_appointment_scheduler_new-search'); // search
    $app->group(
        '/view_appointment_scheduler_new',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{Id}]', ViewAppointmentSchedulerNewController::class . ':list')->add(PermissionMiddleware::class)->setName('view_appointment_scheduler_new/list-view_appointment_scheduler_new-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{Id}]', ViewAppointmentSchedulerNewController::class . ':add')->add(PermissionMiddleware::class)->setName('view_appointment_scheduler_new/add-view_appointment_scheduler_new-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{Id}]', ViewAppointmentSchedulerNewController::class . ':view')->add(PermissionMiddleware::class)->setName('view_appointment_scheduler_new/view-view_appointment_scheduler_new-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{Id}]', ViewAppointmentSchedulerNewController::class . ':edit')->add(PermissionMiddleware::class)->setName('view_appointment_scheduler_new/edit-view_appointment_scheduler_new-edit-2'); // edit
            $group->any('/' . Config("UPDATE_ACTION") . '', ViewAppointmentSchedulerNewController::class . ':update')->add(PermissionMiddleware::class)->setName('view_appointment_scheduler_new/update-view_appointment_scheduler_new-update-2'); // update
            $group->any('/' . Config("DELETE_ACTION") . '[/{Id}]', ViewAppointmentSchedulerNewController::class . ':delete')->add(PermissionMiddleware::class)->setName('view_appointment_scheduler_new/delete-view_appointment_scheduler_new-delete-2'); // delete
            $group->any('/' . Config("SEARCH_ACTION") . '', ViewAppointmentSchedulerNewController::class . ':search')->add(PermissionMiddleware::class)->setName('view_appointment_scheduler_new/search-view_appointment_scheduler_new-search-2'); // search
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', PharmacyBillingIssueController::class . ':list')->add(PermissionMiddleware::class)->setName('pharmacy_billing_issue/list-pharmacy_billing_issue-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', PharmacyBillingIssueController::class . ':add')->add(PermissionMiddleware::class)->setName('pharmacy_billing_issue/add-pharmacy_billing_issue-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', PharmacyBillingIssueController::class . ':view')->add(PermissionMiddleware::class)->setName('pharmacy_billing_issue/view-pharmacy_billing_issue-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', PharmacyBillingIssueController::class . ':edit')->add(PermissionMiddleware::class)->setName('pharmacy_billing_issue/edit-pharmacy_billing_issue-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', PharmacyBillingIssueController::class . ':delete')->add(PermissionMiddleware::class)->setName('pharmacy_billing_issue/delete-pharmacy_billing_issue-delete-2'); // delete
        }
    );

    // view_appointment
    $app->any('/ViewAppointmentList', ViewAppointmentController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewAppointmentList-view_appointment-list'); // list
    $app->group(
        '/view_appointment',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '', ViewAppointmentController::class . ':list')->add(PermissionMiddleware::class)->setName('view_appointment/list-view_appointment-list-2'); // list
        }
    );

    // view_patient_clinical_summary
    $app->any('/ViewPatientClinicalSummaryList[/{id}]', ViewPatientClinicalSummaryController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewPatientClinicalSummaryList-view_patient_clinical_summary-list'); // list
    $app->any('/ViewPatientClinicalSummaryAdd[/{id}]', ViewPatientClinicalSummaryController::class . ':add')->add(PermissionMiddleware::class)->setName('ViewPatientClinicalSummaryAdd-view_patient_clinical_summary-add'); // add
    $app->any('/ViewPatientClinicalSummaryView[/{id}]', ViewPatientClinicalSummaryController::class . ':view')->add(PermissionMiddleware::class)->setName('ViewPatientClinicalSummaryView-view_patient_clinical_summary-view'); // view
    $app->any('/ViewPatientClinicalSummaryEdit[/{id}]', ViewPatientClinicalSummaryController::class . ':edit')->add(PermissionMiddleware::class)->setName('ViewPatientClinicalSummaryEdit-view_patient_clinical_summary-edit'); // edit
    $app->group(
        '/view_patient_clinical_summary',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', ViewPatientClinicalSummaryController::class . ':list')->add(PermissionMiddleware::class)->setName('view_patient_clinical_summary/list-view_patient_clinical_summary-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', ViewPatientClinicalSummaryController::class . ':add')->add(PermissionMiddleware::class)->setName('view_patient_clinical_summary/add-view_patient_clinical_summary-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', ViewPatientClinicalSummaryController::class . ':view')->add(PermissionMiddleware::class)->setName('view_patient_clinical_summary/view-view_patient_clinical_summary-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', ViewPatientClinicalSummaryController::class . ':edit')->add(PermissionMiddleware::class)->setName('view_patient_clinical_summary/edit-view_patient_clinical_summary-edit-2'); // edit
        }
    );

    // view_billing_voucher_voucher
    $app->any('/ViewBillingVoucherVoucherList[/{id}]', ViewBillingVoucherVoucherController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewBillingVoucherVoucherList-view_billing_voucher_voucher-list'); // list
    $app->any('/ViewBillingVoucherVoucherView[/{id}]', ViewBillingVoucherVoucherController::class . ':view')->add(PermissionMiddleware::class)->setName('ViewBillingVoucherVoucherView-view_billing_voucher_voucher-view'); // view
    $app->group(
        '/view_billing_voucher_voucher',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', ViewBillingVoucherVoucherController::class . ':list')->add(PermissionMiddleware::class)->setName('view_billing_voucher_voucher/list-view_billing_voucher_voucher-list-2'); // list
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', ViewBillingVoucherVoucherController::class . ':view')->add(PermissionMiddleware::class)->setName('view_billing_voucher_voucher/view-view_billing_voucher_voucher-view-2'); // view
        }
    );

    // view_ongoing_treatment
    $app->any('/ViewOngoingTreatmentList[/{bid}/{bPatientID}/{id}]', ViewOngoingTreatmentController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewOngoingTreatmentList-view_ongoing_treatment-list'); // list
    $app->group(
        '/view_ongoing_treatment',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{bid}/{bPatientID}/{id}]', ViewOngoingTreatmentController::class . ':list')->add(PermissionMiddleware::class)->setName('view_ongoing_treatment/list-view_ongoing_treatment-list-2'); // list
        }
    );

    // patient_room
    $app->any('/PatientRoomList[/{id}]', PatientRoomController::class . ':list')->add(PermissionMiddleware::class)->setName('PatientRoomList-patient_room-list'); // list
    $app->any('/PatientRoomAdd[/{id}]', PatientRoomController::class . ':add')->add(PermissionMiddleware::class)->setName('PatientRoomAdd-patient_room-add'); // add
    $app->any('/PatientRoomView[/{id}]', PatientRoomController::class . ':view')->add(PermissionMiddleware::class)->setName('PatientRoomView-patient_room-view'); // view
    $app->any('/PatientRoomEdit[/{id}]', PatientRoomController::class . ':edit')->add(PermissionMiddleware::class)->setName('PatientRoomEdit-patient_room-edit'); // edit
    $app->any('/PatientRoomDelete[/{id}]', PatientRoomController::class . ':delete')->add(PermissionMiddleware::class)->setName('PatientRoomDelete-patient_room-delete'); // delete
    $app->any('/PatientRoomPreview', PatientRoomController::class . ':preview')->add(PermissionMiddleware::class)->setName('PatientRoomPreview-patient_room-preview'); // preview
    $app->group(
        '/patient_room',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', PatientRoomController::class . ':list')->add(PermissionMiddleware::class)->setName('patient_room/list-patient_room-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', PatientRoomController::class . ':add')->add(PermissionMiddleware::class)->setName('patient_room/add-patient_room-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', PatientRoomController::class . ':view')->add(PermissionMiddleware::class)->setName('patient_room/view-patient_room-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', PatientRoomController::class . ':edit')->add(PermissionMiddleware::class)->setName('patient_room/edit-patient_room-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', PatientRoomController::class . ':delete')->add(PermissionMiddleware::class)->setName('patient_room/delete-patient_room-delete-2'); // delete
            $group->any('/' . Config("PREVIEW_ACTION") . '', PatientRoomController::class . ':preview')->add(PermissionMiddleware::class)->setName('patient_room/preview-patient_room-preview-2'); // preview
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', RoomMasterController::class . ':list')->add(PermissionMiddleware::class)->setName('room_master/list-room_master-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', RoomMasterController::class . ':add')->add(PermissionMiddleware::class)->setName('room_master/add-room_master-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', RoomMasterController::class . ':view')->add(PermissionMiddleware::class)->setName('room_master/view-room_master-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', RoomMasterController::class . ':edit')->add(PermissionMiddleware::class)->setName('room_master/edit-room_master-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', RoomMasterController::class . ':delete')->add(PermissionMiddleware::class)->setName('room_master/delete-room_master-delete-2'); // delete
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
            $group->any('/' . Config("LIST_ACTION") . '[/{Id}]', RoomTypesController::class . ':list')->add(PermissionMiddleware::class)->setName('room_types/list-room_types-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{Id}]', RoomTypesController::class . ':add')->add(PermissionMiddleware::class)->setName('room_types/add-room_types-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{Id}]', RoomTypesController::class . ':view')->add(PermissionMiddleware::class)->setName('room_types/view-room_types-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{Id}]', RoomTypesController::class . ':edit')->add(PermissionMiddleware::class)->setName('room_types/edit-room_types-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{Id}]', RoomTypesController::class . ':delete')->add(PermissionMiddleware::class)->setName('room_types/delete-room_types-delete-2'); // delete
        }
    );

    // view_doctor_notes
    $app->any('/ViewDoctorNotesList', ViewDoctorNotesController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewDoctorNotesList-view_doctor_notes-list'); // list
    $app->group(
        '/view_doctor_notes',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '', ViewDoctorNotesController::class . ':list')->add(PermissionMiddleware::class)->setName('view_doctor_notes/list-view_doctor_notes-list-2'); // list
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
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', MasterProcedureTreatmentController::class . ':list')->add(PermissionMiddleware::class)->setName('master_procedure_treatment/list-master_procedure_treatment-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', MasterProcedureTreatmentController::class . ':add')->add(PermissionMiddleware::class)->setName('master_procedure_treatment/add-master_procedure_treatment-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', MasterProcedureTreatmentController::class . ':view')->add(PermissionMiddleware::class)->setName('master_procedure_treatment/view-master_procedure_treatment-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', MasterProcedureTreatmentController::class . ':edit')->add(PermissionMiddleware::class)->setName('master_procedure_treatment/edit-master_procedure_treatment-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', MasterProcedureTreatmentController::class . ':delete')->add(PermissionMiddleware::class)->setName('master_procedure_treatment/delete-master_procedure_treatment-delete-2'); // delete
        }
    );

    // view_drug_issue
    $app->any('/ViewDrugIssueList', ViewDrugIssueController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewDrugIssueList-view_drug_issue-list'); // list
    $app->group(
        '/view_drug_issue',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '', ViewDrugIssueController::class . ':list')->add(PermissionMiddleware::class)->setName('view_drug_issue/list-view_drug_issue-list-2'); // list
        }
    );

    // view_drug_issue_op
    $app->any('/ViewDrugIssueOpList', ViewDrugIssueOpController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewDrugIssueOpList-view_drug_issue_op-list'); // list
    $app->group(
        '/view_drug_issue_op',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '', ViewDrugIssueOpController::class . ':list')->add(PermissionMiddleware::class)->setName('view_drug_issue_op/list-view_drug_issue_op-list-2'); // list
        }
    );

    // store_grn
    $app->any('/StoreGrnList[/{id}]', StoreGrnController::class . ':list')->add(PermissionMiddleware::class)->setName('StoreGrnList-store_grn-list'); // list
    $app->any('/StoreGrnAdd[/{id}]', StoreGrnController::class . ':add')->add(PermissionMiddleware::class)->setName('StoreGrnAdd-store_grn-add'); // add
    $app->any('/StoreGrnView[/{id}]', StoreGrnController::class . ':view')->add(PermissionMiddleware::class)->setName('StoreGrnView-store_grn-view'); // view
    $app->any('/StoreGrnEdit[/{id}]', StoreGrnController::class . ':edit')->add(PermissionMiddleware::class)->setName('StoreGrnEdit-store_grn-edit'); // edit
    $app->any('/StoreGrnDelete[/{id}]', StoreGrnController::class . ':delete')->add(PermissionMiddleware::class)->setName('StoreGrnDelete-store_grn-delete'); // delete
    $app->any('/StoreGrnPreview', StoreGrnController::class . ':preview')->add(PermissionMiddleware::class)->setName('StoreGrnPreview-store_grn-preview'); // preview
    $app->group(
        '/store_grn',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', StoreGrnController::class . ':list')->add(PermissionMiddleware::class)->setName('store_grn/list-store_grn-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', StoreGrnController::class . ':add')->add(PermissionMiddleware::class)->setName('store_grn/add-store_grn-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', StoreGrnController::class . ':view')->add(PermissionMiddleware::class)->setName('store_grn/view-store_grn-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', StoreGrnController::class . ':edit')->add(PermissionMiddleware::class)->setName('store_grn/edit-store_grn-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', StoreGrnController::class . ':delete')->add(PermissionMiddleware::class)->setName('store_grn/delete-store_grn-delete-2'); // delete
            $group->any('/' . Config("PREVIEW_ACTION") . '', StoreGrnController::class . ':preview')->add(PermissionMiddleware::class)->setName('store_grn/preview-store_grn-preview-2'); // preview
        }
    );

    // store_purchaseorder
    $app->any('/StorePurchaseorderList[/{id}]', StorePurchaseorderController::class . ':list')->add(PermissionMiddleware::class)->setName('StorePurchaseorderList-store_purchaseorder-list'); // list
    $app->any('/StorePurchaseorderAdd[/{id}]', StorePurchaseorderController::class . ':add')->add(PermissionMiddleware::class)->setName('StorePurchaseorderAdd-store_purchaseorder-add'); // add
    $app->any('/StorePurchaseorderView[/{id}]', StorePurchaseorderController::class . ':view')->add(PermissionMiddleware::class)->setName('StorePurchaseorderView-store_purchaseorder-view'); // view
    $app->any('/StorePurchaseorderEdit[/{id}]', StorePurchaseorderController::class . ':edit')->add(PermissionMiddleware::class)->setName('StorePurchaseorderEdit-store_purchaseorder-edit'); // edit
    $app->any('/StorePurchaseorderDelete[/{id}]', StorePurchaseorderController::class . ':delete')->add(PermissionMiddleware::class)->setName('StorePurchaseorderDelete-store_purchaseorder-delete'); // delete
    $app->group(
        '/store_purchaseorder',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', StorePurchaseorderController::class . ':list')->add(PermissionMiddleware::class)->setName('store_purchaseorder/list-store_purchaseorder-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', StorePurchaseorderController::class . ':add')->add(PermissionMiddleware::class)->setName('store_purchaseorder/add-store_purchaseorder-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', StorePurchaseorderController::class . ':view')->add(PermissionMiddleware::class)->setName('store_purchaseorder/view-store_purchaseorder-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', StorePurchaseorderController::class . ':edit')->add(PermissionMiddleware::class)->setName('store_purchaseorder/edit-store_purchaseorder-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', StorePurchaseorderController::class . ':delete')->add(PermissionMiddleware::class)->setName('store_purchaseorder/delete-store_purchaseorder-delete-2'); // delete
        }
    );

    // view_store_grn
    $app->any('/ViewStoreGrnList[/{id}]', ViewStoreGrnController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewStoreGrnList-view_store_grn-list'); // list
    $app->any('/ViewStoreGrnAdd[/{id}]', ViewStoreGrnController::class . ':add')->add(PermissionMiddleware::class)->setName('ViewStoreGrnAdd-view_store_grn-add'); // add
    $app->any('/ViewStoreGrnView[/{id}]', ViewStoreGrnController::class . ':view')->add(PermissionMiddleware::class)->setName('ViewStoreGrnView-view_store_grn-view'); // view
    $app->any('/ViewStoreGrnEdit[/{id}]', ViewStoreGrnController::class . ':edit')->add(PermissionMiddleware::class)->setName('ViewStoreGrnEdit-view_store_grn-edit'); // edit
    $app->any('/ViewStoreGrnPreview', ViewStoreGrnController::class . ':preview')->add(PermissionMiddleware::class)->setName('ViewStoreGrnPreview-view_store_grn-preview'); // preview
    $app->group(
        '/view_store_grn',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', ViewStoreGrnController::class . ':list')->add(PermissionMiddleware::class)->setName('view_store_grn/list-view_store_grn-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', ViewStoreGrnController::class . ':add')->add(PermissionMiddleware::class)->setName('view_store_grn/add-view_store_grn-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', ViewStoreGrnController::class . ':view')->add(PermissionMiddleware::class)->setName('view_store_grn/view-view_store_grn-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', ViewStoreGrnController::class . ':edit')->add(PermissionMiddleware::class)->setName('view_store_grn/edit-view_store_grn-edit-2'); // edit
            $group->any('/' . Config("PREVIEW_ACTION") . '', ViewStoreGrnController::class . ':preview')->add(PermissionMiddleware::class)->setName('view_store_grn/preview-view_store_grn-preview-2'); // preview
        }
    );

    // store_payment
    $app->any('/StorePaymentList[/{id}]', StorePaymentController::class . ':list')->add(PermissionMiddleware::class)->setName('StorePaymentList-store_payment-list'); // list
    $app->any('/StorePaymentAdd[/{id}]', StorePaymentController::class . ':add')->add(PermissionMiddleware::class)->setName('StorePaymentAdd-store_payment-add'); // add
    $app->any('/StorePaymentView[/{id}]', StorePaymentController::class . ':view')->add(PermissionMiddleware::class)->setName('StorePaymentView-store_payment-view'); // view
    $app->any('/StorePaymentEdit[/{id}]', StorePaymentController::class . ':edit')->add(PermissionMiddleware::class)->setName('StorePaymentEdit-store_payment-edit'); // edit
    $app->any('/StorePaymentDelete[/{id}]', StorePaymentController::class . ':delete')->add(PermissionMiddleware::class)->setName('StorePaymentDelete-store_payment-delete'); // delete
    $app->group(
        '/store_payment',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', StorePaymentController::class . ':list')->add(PermissionMiddleware::class)->setName('store_payment/list-store_payment-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', StorePaymentController::class . ':add')->add(PermissionMiddleware::class)->setName('store_payment/add-store_payment-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', StorePaymentController::class . ':view')->add(PermissionMiddleware::class)->setName('store_payment/view-store_payment-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', StorePaymentController::class . ':edit')->add(PermissionMiddleware::class)->setName('store_payment/edit-store_payment-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', StorePaymentController::class . ':delete')->add(PermissionMiddleware::class)->setName('store_payment/delete-store_payment-delete-2'); // delete
        }
    );

    // view_pharmacy_stock_value
    $app->any('/ViewPharmacyStockValueList[/{id}]', ViewPharmacyStockValueController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewPharmacyStockValueList-view_pharmacy_stock_value-list'); // list
    $app->group(
        '/view_pharmacy_stock_value',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', ViewPharmacyStockValueController::class . ':list')->add(PermissionMiddleware::class)->setName('view_pharmacy_stock_value/list-view_pharmacy_stock_value-list-2'); // list
        }
    );

    // view_pharmacy_last_sale
    $app->any('/ViewPharmacyLastSaleList', ViewPharmacyLastSaleController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewPharmacyLastSaleList-view_pharmacy_last_sale-list'); // list
    $app->group(
        '/view_pharmacy_last_sale',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '', ViewPharmacyLastSaleController::class . ':list')->add(PermissionMiddleware::class)->setName('view_pharmacy_last_sale/list-view_pharmacy_last_sale-list-2'); // list
        }
    );

    // view_pharmacy_non_movement
    $app->any('/ViewPharmacyNonMovementList', ViewPharmacyNonMovementController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewPharmacyNonMovementList-view_pharmacy_non_movement-list'); // list
    $app->group(
        '/view_pharmacy_non_movement',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '', ViewPharmacyNonMovementController::class . ':list')->add(PermissionMiddleware::class)->setName('view_pharmacy_non_movement/list-view_pharmacy_non_movement-list-2'); // list
        }
    );

    // view_pharmacy_pharled
    $app->any('/ViewPharmacyPharledList', ViewPharmacyPharledController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewPharmacyPharledList-view_pharmacy_pharled-list'); // list
    $app->group(
        '/view_pharmacy_pharled',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '', ViewPharmacyPharledController::class . ':list')->add(PermissionMiddleware::class)->setName('view_pharmacy_pharled/list-view_pharmacy_pharled-list-2'); // list
        }
    );

    // view_pharmacy_purchaseorder
    $app->any('/ViewPharmacyPurchaseorderList', ViewPharmacyPurchaseorderController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewPharmacyPurchaseorderList-view_pharmacy_purchaseorder-list'); // list
    $app->group(
        '/view_pharmacy_purchaseorder',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '', ViewPharmacyPurchaseorderController::class . ':list')->add(PermissionMiddleware::class)->setName('view_pharmacy_purchaseorder/list-view_pharmacy_purchaseorder-list-2'); // list
        }
    );

    // hr_benifits
    $app->any('/HrBenifitsList[/{id}]', HrBenifitsController::class . ':list')->add(PermissionMiddleware::class)->setName('HrBenifitsList-hr_benifits-list'); // list
    $app->any('/HrBenifitsAdd[/{id}]', HrBenifitsController::class . ':add')->add(PermissionMiddleware::class)->setName('HrBenifitsAdd-hr_benifits-add'); // add
    $app->any('/HrBenifitsView[/{id}]', HrBenifitsController::class . ':view')->add(PermissionMiddleware::class)->setName('HrBenifitsView-hr_benifits-view'); // view
    $app->any('/HrBenifitsEdit[/{id}]', HrBenifitsController::class . ':edit')->add(PermissionMiddleware::class)->setName('HrBenifitsEdit-hr_benifits-edit'); // edit
    $app->any('/HrBenifitsDelete[/{id}]', HrBenifitsController::class . ':delete')->add(PermissionMiddleware::class)->setName('HrBenifitsDelete-hr_benifits-delete'); // delete
    $app->group(
        '/hr_benifits',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', HrBenifitsController::class . ':list')->add(PermissionMiddleware::class)->setName('hr_benifits/list-hr_benifits-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', HrBenifitsController::class . ':add')->add(PermissionMiddleware::class)->setName('hr_benifits/add-hr_benifits-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', HrBenifitsController::class . ':view')->add(PermissionMiddleware::class)->setName('hr_benifits/view-hr_benifits-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', HrBenifitsController::class . ':edit')->add(PermissionMiddleware::class)->setName('hr_benifits/edit-hr_benifits-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', HrBenifitsController::class . ':delete')->add(PermissionMiddleware::class)->setName('hr_benifits/delete-hr_benifits-delete-2'); // delete
        }
    );

    // hr_clients
    $app->any('/HrClientsList[/{id}]', HrClientsController::class . ':list')->add(PermissionMiddleware::class)->setName('HrClientsList-hr_clients-list'); // list
    $app->any('/HrClientsAdd[/{id}]', HrClientsController::class . ':add')->add(PermissionMiddleware::class)->setName('HrClientsAdd-hr_clients-add'); // add
    $app->any('/HrClientsView[/{id}]', HrClientsController::class . ':view')->add(PermissionMiddleware::class)->setName('HrClientsView-hr_clients-view'); // view
    $app->any('/HrClientsEdit[/{id}]', HrClientsController::class . ':edit')->add(PermissionMiddleware::class)->setName('HrClientsEdit-hr_clients-edit'); // edit
    $app->any('/HrClientsDelete[/{id}]', HrClientsController::class . ':delete')->add(PermissionMiddleware::class)->setName('HrClientsDelete-hr_clients-delete'); // delete
    $app->group(
        '/hr_clients',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', HrClientsController::class . ':list')->add(PermissionMiddleware::class)->setName('hr_clients/list-hr_clients-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', HrClientsController::class . ':add')->add(PermissionMiddleware::class)->setName('hr_clients/add-hr_clients-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', HrClientsController::class . ':view')->add(PermissionMiddleware::class)->setName('hr_clients/view-hr_clients-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', HrClientsController::class . ':edit')->add(PermissionMiddleware::class)->setName('hr_clients/edit-hr_clients-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', HrClientsController::class . ':delete')->add(PermissionMiddleware::class)->setName('hr_clients/delete-hr_clients-delete-2'); // delete
        }
    );

    // hr_companyloans
    $app->any('/HrCompanyloansList[/{id}]', HrCompanyloansController::class . ':list')->add(PermissionMiddleware::class)->setName('HrCompanyloansList-hr_companyloans-list'); // list
    $app->any('/HrCompanyloansAdd[/{id}]', HrCompanyloansController::class . ':add')->add(PermissionMiddleware::class)->setName('HrCompanyloansAdd-hr_companyloans-add'); // add
    $app->any('/HrCompanyloansView[/{id}]', HrCompanyloansController::class . ':view')->add(PermissionMiddleware::class)->setName('HrCompanyloansView-hr_companyloans-view'); // view
    $app->any('/HrCompanyloansEdit[/{id}]', HrCompanyloansController::class . ':edit')->add(PermissionMiddleware::class)->setName('HrCompanyloansEdit-hr_companyloans-edit'); // edit
    $app->any('/HrCompanyloansDelete[/{id}]', HrCompanyloansController::class . ':delete')->add(PermissionMiddleware::class)->setName('HrCompanyloansDelete-hr_companyloans-delete'); // delete
    $app->group(
        '/hr_companyloans',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', HrCompanyloansController::class . ':list')->add(PermissionMiddleware::class)->setName('hr_companyloans/list-hr_companyloans-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', HrCompanyloansController::class . ':add')->add(PermissionMiddleware::class)->setName('hr_companyloans/add-hr_companyloans-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', HrCompanyloansController::class . ':view')->add(PermissionMiddleware::class)->setName('hr_companyloans/view-hr_companyloans-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', HrCompanyloansController::class . ':edit')->add(PermissionMiddleware::class)->setName('hr_companyloans/edit-hr_companyloans-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', HrCompanyloansController::class . ':delete')->add(PermissionMiddleware::class)->setName('hr_companyloans/delete-hr_companyloans-delete-2'); // delete
        }
    );

    // hr_companystructures
    $app->any('/HrCompanystructuresList[/{id}]', HrCompanystructuresController::class . ':list')->add(PermissionMiddleware::class)->setName('HrCompanystructuresList-hr_companystructures-list'); // list
    $app->any('/HrCompanystructuresAdd[/{id}]', HrCompanystructuresController::class . ':add')->add(PermissionMiddleware::class)->setName('HrCompanystructuresAdd-hr_companystructures-add'); // add
    $app->any('/HrCompanystructuresView[/{id}]', HrCompanystructuresController::class . ':view')->add(PermissionMiddleware::class)->setName('HrCompanystructuresView-hr_companystructures-view'); // view
    $app->any('/HrCompanystructuresEdit[/{id}]', HrCompanystructuresController::class . ':edit')->add(PermissionMiddleware::class)->setName('HrCompanystructuresEdit-hr_companystructures-edit'); // edit
    $app->any('/HrCompanystructuresDelete[/{id}]', HrCompanystructuresController::class . ':delete')->add(PermissionMiddleware::class)->setName('HrCompanystructuresDelete-hr_companystructures-delete'); // delete
    $app->group(
        '/hr_companystructures',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', HrCompanystructuresController::class . ':list')->add(PermissionMiddleware::class)->setName('hr_companystructures/list-hr_companystructures-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', HrCompanystructuresController::class . ':add')->add(PermissionMiddleware::class)->setName('hr_companystructures/add-hr_companystructures-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', HrCompanystructuresController::class . ':view')->add(PermissionMiddleware::class)->setName('hr_companystructures/view-hr_companystructures-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', HrCompanystructuresController::class . ':edit')->add(PermissionMiddleware::class)->setName('hr_companystructures/edit-hr_companystructures-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', HrCompanystructuresController::class . ':delete')->add(PermissionMiddleware::class)->setName('hr_companystructures/delete-hr_companystructures-delete-2'); // delete
        }
    );

    // hr_educationlevel
    $app->any('/HrEducationlevelList[/{id}]', HrEducationlevelController::class . ':list')->add(PermissionMiddleware::class)->setName('HrEducationlevelList-hr_educationlevel-list'); // list
    $app->any('/HrEducationlevelAdd[/{id}]', HrEducationlevelController::class . ':add')->add(PermissionMiddleware::class)->setName('HrEducationlevelAdd-hr_educationlevel-add'); // add
    $app->any('/HrEducationlevelView[/{id}]', HrEducationlevelController::class . ':view')->add(PermissionMiddleware::class)->setName('HrEducationlevelView-hr_educationlevel-view'); // view
    $app->any('/HrEducationlevelEdit[/{id}]', HrEducationlevelController::class . ':edit')->add(PermissionMiddleware::class)->setName('HrEducationlevelEdit-hr_educationlevel-edit'); // edit
    $app->any('/HrEducationlevelDelete[/{id}]', HrEducationlevelController::class . ':delete')->add(PermissionMiddleware::class)->setName('HrEducationlevelDelete-hr_educationlevel-delete'); // delete
    $app->group(
        '/hr_educationlevel',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', HrEducationlevelController::class . ':list')->add(PermissionMiddleware::class)->setName('hr_educationlevel/list-hr_educationlevel-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', HrEducationlevelController::class . ':add')->add(PermissionMiddleware::class)->setName('hr_educationlevel/add-hr_educationlevel-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', HrEducationlevelController::class . ':view')->add(PermissionMiddleware::class)->setName('hr_educationlevel/view-hr_educationlevel-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', HrEducationlevelController::class . ':edit')->add(PermissionMiddleware::class)->setName('hr_educationlevel/edit-hr_educationlevel-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', HrEducationlevelController::class . ':delete')->add(PermissionMiddleware::class)->setName('hr_educationlevel/delete-hr_educationlevel-delete-2'); // delete
        }
    );

    // hr_educations
    $app->any('/HrEducationsList[/{id}]', HrEducationsController::class . ':list')->add(PermissionMiddleware::class)->setName('HrEducationsList-hr_educations-list'); // list
    $app->any('/HrEducationsAdd[/{id}]', HrEducationsController::class . ':add')->add(PermissionMiddleware::class)->setName('HrEducationsAdd-hr_educations-add'); // add
    $app->any('/HrEducationsView[/{id}]', HrEducationsController::class . ':view')->add(PermissionMiddleware::class)->setName('HrEducationsView-hr_educations-view'); // view
    $app->any('/HrEducationsEdit[/{id}]', HrEducationsController::class . ':edit')->add(PermissionMiddleware::class)->setName('HrEducationsEdit-hr_educations-edit'); // edit
    $app->any('/HrEducationsDelete[/{id}]', HrEducationsController::class . ':delete')->add(PermissionMiddleware::class)->setName('HrEducationsDelete-hr_educations-delete'); // delete
    $app->group(
        '/hr_educations',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', HrEducationsController::class . ':list')->add(PermissionMiddleware::class)->setName('hr_educations/list-hr_educations-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', HrEducationsController::class . ':add')->add(PermissionMiddleware::class)->setName('hr_educations/add-hr_educations-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', HrEducationsController::class . ':view')->add(PermissionMiddleware::class)->setName('hr_educations/view-hr_educations-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', HrEducationsController::class . ':edit')->add(PermissionMiddleware::class)->setName('hr_educations/edit-hr_educations-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', HrEducationsController::class . ':delete')->add(PermissionMiddleware::class)->setName('hr_educations/delete-hr_educations-delete-2'); // delete
        }
    );

    // hr_employementtype
    $app->any('/HrEmployementtypeList[/{id}]', HrEmployementtypeController::class . ':list')->add(PermissionMiddleware::class)->setName('HrEmployementtypeList-hr_employementtype-list'); // list
    $app->any('/HrEmployementtypeAdd[/{id}]', HrEmployementtypeController::class . ':add')->add(PermissionMiddleware::class)->setName('HrEmployementtypeAdd-hr_employementtype-add'); // add
    $app->any('/HrEmployementtypeView[/{id}]', HrEmployementtypeController::class . ':view')->add(PermissionMiddleware::class)->setName('HrEmployementtypeView-hr_employementtype-view'); // view
    $app->any('/HrEmployementtypeEdit[/{id}]', HrEmployementtypeController::class . ':edit')->add(PermissionMiddleware::class)->setName('HrEmployementtypeEdit-hr_employementtype-edit'); // edit
    $app->any('/HrEmployementtypeDelete[/{id}]', HrEmployementtypeController::class . ':delete')->add(PermissionMiddleware::class)->setName('HrEmployementtypeDelete-hr_employementtype-delete'); // delete
    $app->group(
        '/hr_employementtype',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', HrEmployementtypeController::class . ':list')->add(PermissionMiddleware::class)->setName('hr_employementtype/list-hr_employementtype-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', HrEmployementtypeController::class . ':add')->add(PermissionMiddleware::class)->setName('hr_employementtype/add-hr_employementtype-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', HrEmployementtypeController::class . ':view')->add(PermissionMiddleware::class)->setName('hr_employementtype/view-hr_employementtype-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', HrEmployementtypeController::class . ':edit')->add(PermissionMiddleware::class)->setName('hr_employementtype/edit-hr_employementtype-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', HrEmployementtypeController::class . ':delete')->add(PermissionMiddleware::class)->setName('hr_employementtype/delete-hr_employementtype-delete-2'); // delete
        }
    );

    // hr_ethnicity
    $app->any('/HrEthnicityList[/{id}]', HrEthnicityController::class . ':list')->add(PermissionMiddleware::class)->setName('HrEthnicityList-hr_ethnicity-list'); // list
    $app->any('/HrEthnicityAdd[/{id}]', HrEthnicityController::class . ':add')->add(PermissionMiddleware::class)->setName('HrEthnicityAdd-hr_ethnicity-add'); // add
    $app->any('/HrEthnicityView[/{id}]', HrEthnicityController::class . ':view')->add(PermissionMiddleware::class)->setName('HrEthnicityView-hr_ethnicity-view'); // view
    $app->any('/HrEthnicityEdit[/{id}]', HrEthnicityController::class . ':edit')->add(PermissionMiddleware::class)->setName('HrEthnicityEdit-hr_ethnicity-edit'); // edit
    $app->any('/HrEthnicityDelete[/{id}]', HrEthnicityController::class . ':delete')->add(PermissionMiddleware::class)->setName('HrEthnicityDelete-hr_ethnicity-delete'); // delete
    $app->group(
        '/hr_ethnicity',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', HrEthnicityController::class . ':list')->add(PermissionMiddleware::class)->setName('hr_ethnicity/list-hr_ethnicity-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', HrEthnicityController::class . ':add')->add(PermissionMiddleware::class)->setName('hr_ethnicity/add-hr_ethnicity-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', HrEthnicityController::class . ':view')->add(PermissionMiddleware::class)->setName('hr_ethnicity/view-hr_ethnicity-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', HrEthnicityController::class . ':edit')->add(PermissionMiddleware::class)->setName('hr_ethnicity/edit-hr_ethnicity-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', HrEthnicityController::class . ':delete')->add(PermissionMiddleware::class)->setName('hr_ethnicity/delete-hr_ethnicity-delete-2'); // delete
        }
    );

    // hr_expensescategories
    $app->any('/HrExpensescategoriesList[/{id}]', HrExpensescategoriesController::class . ':list')->add(PermissionMiddleware::class)->setName('HrExpensescategoriesList-hr_expensescategories-list'); // list
    $app->any('/HrExpensescategoriesAdd[/{id}]', HrExpensescategoriesController::class . ':add')->add(PermissionMiddleware::class)->setName('HrExpensescategoriesAdd-hr_expensescategories-add'); // add
    $app->any('/HrExpensescategoriesView[/{id}]', HrExpensescategoriesController::class . ':view')->add(PermissionMiddleware::class)->setName('HrExpensescategoriesView-hr_expensescategories-view'); // view
    $app->any('/HrExpensescategoriesEdit[/{id}]', HrExpensescategoriesController::class . ':edit')->add(PermissionMiddleware::class)->setName('HrExpensescategoriesEdit-hr_expensescategories-edit'); // edit
    $app->any('/HrExpensescategoriesDelete[/{id}]', HrExpensescategoriesController::class . ':delete')->add(PermissionMiddleware::class)->setName('HrExpensescategoriesDelete-hr_expensescategories-delete'); // delete
    $app->group(
        '/hr_expensescategories',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', HrExpensescategoriesController::class . ':list')->add(PermissionMiddleware::class)->setName('hr_expensescategories/list-hr_expensescategories-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', HrExpensescategoriesController::class . ':add')->add(PermissionMiddleware::class)->setName('hr_expensescategories/add-hr_expensescategories-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', HrExpensescategoriesController::class . ':view')->add(PermissionMiddleware::class)->setName('hr_expensescategories/view-hr_expensescategories-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', HrExpensescategoriesController::class . ':edit')->add(PermissionMiddleware::class)->setName('hr_expensescategories/edit-hr_expensescategories-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', HrExpensescategoriesController::class . ':delete')->add(PermissionMiddleware::class)->setName('hr_expensescategories/delete-hr_expensescategories-delete-2'); // delete
        }
    );

    // hr_expensespaymentmethods
    $app->any('/HrExpensespaymentmethodsList[/{id}]', HrExpensespaymentmethodsController::class . ':list')->add(PermissionMiddleware::class)->setName('HrExpensespaymentmethodsList-hr_expensespaymentmethods-list'); // list
    $app->any('/HrExpensespaymentmethodsAdd[/{id}]', HrExpensespaymentmethodsController::class . ':add')->add(PermissionMiddleware::class)->setName('HrExpensespaymentmethodsAdd-hr_expensespaymentmethods-add'); // add
    $app->any('/HrExpensespaymentmethodsView[/{id}]', HrExpensespaymentmethodsController::class . ':view')->add(PermissionMiddleware::class)->setName('HrExpensespaymentmethodsView-hr_expensespaymentmethods-view'); // view
    $app->any('/HrExpensespaymentmethodsEdit[/{id}]', HrExpensespaymentmethodsController::class . ':edit')->add(PermissionMiddleware::class)->setName('HrExpensespaymentmethodsEdit-hr_expensespaymentmethods-edit'); // edit
    $app->any('/HrExpensespaymentmethodsDelete[/{id}]', HrExpensespaymentmethodsController::class . ':delete')->add(PermissionMiddleware::class)->setName('HrExpensespaymentmethodsDelete-hr_expensespaymentmethods-delete'); // delete
    $app->group(
        '/hr_expensespaymentmethods',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', HrExpensespaymentmethodsController::class . ':list')->add(PermissionMiddleware::class)->setName('hr_expensespaymentmethods/list-hr_expensespaymentmethods-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', HrExpensespaymentmethodsController::class . ':add')->add(PermissionMiddleware::class)->setName('hr_expensespaymentmethods/add-hr_expensespaymentmethods-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', HrExpensespaymentmethodsController::class . ':view')->add(PermissionMiddleware::class)->setName('hr_expensespaymentmethods/view-hr_expensespaymentmethods-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', HrExpensespaymentmethodsController::class . ':edit')->add(PermissionMiddleware::class)->setName('hr_expensespaymentmethods/edit-hr_expensespaymentmethods-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', HrExpensespaymentmethodsController::class . ':delete')->add(PermissionMiddleware::class)->setName('hr_expensespaymentmethods/delete-hr_expensespaymentmethods-delete-2'); // delete
        }
    );

    // hr_experiencelevel
    $app->any('/HrExperiencelevelList[/{id}]', HrExperiencelevelController::class . ':list')->add(PermissionMiddleware::class)->setName('HrExperiencelevelList-hr_experiencelevel-list'); // list
    $app->any('/HrExperiencelevelAdd[/{id}]', HrExperiencelevelController::class . ':add')->add(PermissionMiddleware::class)->setName('HrExperiencelevelAdd-hr_experiencelevel-add'); // add
    $app->any('/HrExperiencelevelView[/{id}]', HrExperiencelevelController::class . ':view')->add(PermissionMiddleware::class)->setName('HrExperiencelevelView-hr_experiencelevel-view'); // view
    $app->any('/HrExperiencelevelEdit[/{id}]', HrExperiencelevelController::class . ':edit')->add(PermissionMiddleware::class)->setName('HrExperiencelevelEdit-hr_experiencelevel-edit'); // edit
    $app->any('/HrExperiencelevelDelete[/{id}]', HrExperiencelevelController::class . ':delete')->add(PermissionMiddleware::class)->setName('HrExperiencelevelDelete-hr_experiencelevel-delete'); // delete
    $app->group(
        '/hr_experiencelevel',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', HrExperiencelevelController::class . ':list')->add(PermissionMiddleware::class)->setName('hr_experiencelevel/list-hr_experiencelevel-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', HrExperiencelevelController::class . ':add')->add(PermissionMiddleware::class)->setName('hr_experiencelevel/add-hr_experiencelevel-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', HrExperiencelevelController::class . ':view')->add(PermissionMiddleware::class)->setName('hr_experiencelevel/view-hr_experiencelevel-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', HrExperiencelevelController::class . ':edit')->add(PermissionMiddleware::class)->setName('hr_experiencelevel/edit-hr_experiencelevel-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', HrExperiencelevelController::class . ':delete')->add(PermissionMiddleware::class)->setName('hr_experiencelevel/delete-hr_experiencelevel-delete-2'); // delete
        }
    );

    // hr_holidays
    $app->any('/HrHolidaysList[/{id}]', HrHolidaysController::class . ':list')->add(PermissionMiddleware::class)->setName('HrHolidaysList-hr_holidays-list'); // list
    $app->any('/HrHolidaysAdd[/{id}]', HrHolidaysController::class . ':add')->add(PermissionMiddleware::class)->setName('HrHolidaysAdd-hr_holidays-add'); // add
    $app->any('/HrHolidaysView[/{id}]', HrHolidaysController::class . ':view')->add(PermissionMiddleware::class)->setName('HrHolidaysView-hr_holidays-view'); // view
    $app->any('/HrHolidaysEdit[/{id}]', HrHolidaysController::class . ':edit')->add(PermissionMiddleware::class)->setName('HrHolidaysEdit-hr_holidays-edit'); // edit
    $app->any('/HrHolidaysDelete[/{id}]', HrHolidaysController::class . ':delete')->add(PermissionMiddleware::class)->setName('HrHolidaysDelete-hr_holidays-delete'); // delete
    $app->group(
        '/hr_holidays',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', HrHolidaysController::class . ':list')->add(PermissionMiddleware::class)->setName('hr_holidays/list-hr_holidays-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', HrHolidaysController::class . ':add')->add(PermissionMiddleware::class)->setName('hr_holidays/add-hr_holidays-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', HrHolidaysController::class . ':view')->add(PermissionMiddleware::class)->setName('hr_holidays/view-hr_holidays-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', HrHolidaysController::class . ':edit')->add(PermissionMiddleware::class)->setName('hr_holidays/edit-hr_holidays-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', HrHolidaysController::class . ':delete')->add(PermissionMiddleware::class)->setName('hr_holidays/delete-hr_holidays-delete-2'); // delete
        }
    );

    // hr_immigrationstatus
    $app->any('/HrImmigrationstatusList[/{id}]', HrImmigrationstatusController::class . ':list')->add(PermissionMiddleware::class)->setName('HrImmigrationstatusList-hr_immigrationstatus-list'); // list
    $app->any('/HrImmigrationstatusAdd[/{id}]', HrImmigrationstatusController::class . ':add')->add(PermissionMiddleware::class)->setName('HrImmigrationstatusAdd-hr_immigrationstatus-add'); // add
    $app->any('/HrImmigrationstatusView[/{id}]', HrImmigrationstatusController::class . ':view')->add(PermissionMiddleware::class)->setName('HrImmigrationstatusView-hr_immigrationstatus-view'); // view
    $app->any('/HrImmigrationstatusEdit[/{id}]', HrImmigrationstatusController::class . ':edit')->add(PermissionMiddleware::class)->setName('HrImmigrationstatusEdit-hr_immigrationstatus-edit'); // edit
    $app->any('/HrImmigrationstatusDelete[/{id}]', HrImmigrationstatusController::class . ':delete')->add(PermissionMiddleware::class)->setName('HrImmigrationstatusDelete-hr_immigrationstatus-delete'); // delete
    $app->group(
        '/hr_immigrationstatus',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', HrImmigrationstatusController::class . ':list')->add(PermissionMiddleware::class)->setName('hr_immigrationstatus/list-hr_immigrationstatus-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', HrImmigrationstatusController::class . ':add')->add(PermissionMiddleware::class)->setName('hr_immigrationstatus/add-hr_immigrationstatus-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', HrImmigrationstatusController::class . ':view')->add(PermissionMiddleware::class)->setName('hr_immigrationstatus/view-hr_immigrationstatus-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', HrImmigrationstatusController::class . ':edit')->add(PermissionMiddleware::class)->setName('hr_immigrationstatus/edit-hr_immigrationstatus-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', HrImmigrationstatusController::class . ':delete')->add(PermissionMiddleware::class)->setName('hr_immigrationstatus/delete-hr_immigrationstatus-delete-2'); // delete
        }
    );

    // hr_jobfunction
    $app->any('/HrJobfunctionList[/{id}]', HrJobfunctionController::class . ':list')->add(PermissionMiddleware::class)->setName('HrJobfunctionList-hr_jobfunction-list'); // list
    $app->any('/HrJobfunctionAdd[/{id}]', HrJobfunctionController::class . ':add')->add(PermissionMiddleware::class)->setName('HrJobfunctionAdd-hr_jobfunction-add'); // add
    $app->any('/HrJobfunctionView[/{id}]', HrJobfunctionController::class . ':view')->add(PermissionMiddleware::class)->setName('HrJobfunctionView-hr_jobfunction-view'); // view
    $app->any('/HrJobfunctionEdit[/{id}]', HrJobfunctionController::class . ':edit')->add(PermissionMiddleware::class)->setName('HrJobfunctionEdit-hr_jobfunction-edit'); // edit
    $app->any('/HrJobfunctionDelete[/{id}]', HrJobfunctionController::class . ':delete')->add(PermissionMiddleware::class)->setName('HrJobfunctionDelete-hr_jobfunction-delete'); // delete
    $app->group(
        '/hr_jobfunction',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', HrJobfunctionController::class . ':list')->add(PermissionMiddleware::class)->setName('hr_jobfunction/list-hr_jobfunction-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', HrJobfunctionController::class . ':add')->add(PermissionMiddleware::class)->setName('hr_jobfunction/add-hr_jobfunction-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', HrJobfunctionController::class . ':view')->add(PermissionMiddleware::class)->setName('hr_jobfunction/view-hr_jobfunction-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', HrJobfunctionController::class . ':edit')->add(PermissionMiddleware::class)->setName('hr_jobfunction/edit-hr_jobfunction-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', HrJobfunctionController::class . ':delete')->add(PermissionMiddleware::class)->setName('hr_jobfunction/delete-hr_jobfunction-delete-2'); // delete
        }
    );

    // hr_jobtitles
    $app->any('/HrJobtitlesList[/{id}]', HrJobtitlesController::class . ':list')->add(PermissionMiddleware::class)->setName('HrJobtitlesList-hr_jobtitles-list'); // list
    $app->any('/HrJobtitlesAdd[/{id}]', HrJobtitlesController::class . ':add')->add(PermissionMiddleware::class)->setName('HrJobtitlesAdd-hr_jobtitles-add'); // add
    $app->any('/HrJobtitlesView[/{id}]', HrJobtitlesController::class . ':view')->add(PermissionMiddleware::class)->setName('HrJobtitlesView-hr_jobtitles-view'); // view
    $app->any('/HrJobtitlesEdit[/{id}]', HrJobtitlesController::class . ':edit')->add(PermissionMiddleware::class)->setName('HrJobtitlesEdit-hr_jobtitles-edit'); // edit
    $app->any('/HrJobtitlesDelete[/{id}]', HrJobtitlesController::class . ':delete')->add(PermissionMiddleware::class)->setName('HrJobtitlesDelete-hr_jobtitles-delete'); // delete
    $app->group(
        '/hr_jobtitles',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', HrJobtitlesController::class . ':list')->add(PermissionMiddleware::class)->setName('hr_jobtitles/list-hr_jobtitles-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', HrJobtitlesController::class . ':add')->add(PermissionMiddleware::class)->setName('hr_jobtitles/add-hr_jobtitles-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', HrJobtitlesController::class . ':view')->add(PermissionMiddleware::class)->setName('hr_jobtitles/view-hr_jobtitles-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', HrJobtitlesController::class . ':edit')->add(PermissionMiddleware::class)->setName('hr_jobtitles/edit-hr_jobtitles-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', HrJobtitlesController::class . ':delete')->add(PermissionMiddleware::class)->setName('hr_jobtitles/delete-hr_jobtitles-delete-2'); // delete
        }
    );

    // hr_languages
    $app->any('/HrLanguagesList[/{id}]', HrLanguagesController::class . ':list')->add(PermissionMiddleware::class)->setName('HrLanguagesList-hr_languages-list'); // list
    $app->any('/HrLanguagesAdd[/{id}]', HrLanguagesController::class . ':add')->add(PermissionMiddleware::class)->setName('HrLanguagesAdd-hr_languages-add'); // add
    $app->any('/HrLanguagesView[/{id}]', HrLanguagesController::class . ':view')->add(PermissionMiddleware::class)->setName('HrLanguagesView-hr_languages-view'); // view
    $app->any('/HrLanguagesEdit[/{id}]', HrLanguagesController::class . ':edit')->add(PermissionMiddleware::class)->setName('HrLanguagesEdit-hr_languages-edit'); // edit
    $app->any('/HrLanguagesDelete[/{id}]', HrLanguagesController::class . ':delete')->add(PermissionMiddleware::class)->setName('HrLanguagesDelete-hr_languages-delete'); // delete
    $app->group(
        '/hr_languages',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', HrLanguagesController::class . ':list')->add(PermissionMiddleware::class)->setName('hr_languages/list-hr_languages-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', HrLanguagesController::class . ':add')->add(PermissionMiddleware::class)->setName('hr_languages/add-hr_languages-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', HrLanguagesController::class . ':view')->add(PermissionMiddleware::class)->setName('hr_languages/view-hr_languages-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', HrLanguagesController::class . ':edit')->add(PermissionMiddleware::class)->setName('hr_languages/edit-hr_languages-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', HrLanguagesController::class . ':delete')->add(PermissionMiddleware::class)->setName('hr_languages/delete-hr_languages-delete-2'); // delete
        }
    );

    // hr_leaveperiods
    $app->any('/HrLeaveperiodsList[/{id}]', HrLeaveperiodsController::class . ':list')->add(PermissionMiddleware::class)->setName('HrLeaveperiodsList-hr_leaveperiods-list'); // list
    $app->any('/HrLeaveperiodsAdd[/{id}]', HrLeaveperiodsController::class . ':add')->add(PermissionMiddleware::class)->setName('HrLeaveperiodsAdd-hr_leaveperiods-add'); // add
    $app->any('/HrLeaveperiodsView[/{id}]', HrLeaveperiodsController::class . ':view')->add(PermissionMiddleware::class)->setName('HrLeaveperiodsView-hr_leaveperiods-view'); // view
    $app->any('/HrLeaveperiodsEdit[/{id}]', HrLeaveperiodsController::class . ':edit')->add(PermissionMiddleware::class)->setName('HrLeaveperiodsEdit-hr_leaveperiods-edit'); // edit
    $app->any('/HrLeaveperiodsDelete[/{id}]', HrLeaveperiodsController::class . ':delete')->add(PermissionMiddleware::class)->setName('HrLeaveperiodsDelete-hr_leaveperiods-delete'); // delete
    $app->group(
        '/hr_leaveperiods',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', HrLeaveperiodsController::class . ':list')->add(PermissionMiddleware::class)->setName('hr_leaveperiods/list-hr_leaveperiods-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', HrLeaveperiodsController::class . ':add')->add(PermissionMiddleware::class)->setName('hr_leaveperiods/add-hr_leaveperiods-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', HrLeaveperiodsController::class . ':view')->add(PermissionMiddleware::class)->setName('hr_leaveperiods/view-hr_leaveperiods-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', HrLeaveperiodsController::class . ':edit')->add(PermissionMiddleware::class)->setName('hr_leaveperiods/edit-hr_leaveperiods-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', HrLeaveperiodsController::class . ':delete')->add(PermissionMiddleware::class)->setName('hr_leaveperiods/delete-hr_leaveperiods-delete-2'); // delete
        }
    );

    // hr_leavetypes
    $app->any('/HrLeavetypesList[/{id}]', HrLeavetypesController::class . ':list')->add(PermissionMiddleware::class)->setName('HrLeavetypesList-hr_leavetypes-list'); // list
    $app->any('/HrLeavetypesAdd[/{id}]', HrLeavetypesController::class . ':add')->add(PermissionMiddleware::class)->setName('HrLeavetypesAdd-hr_leavetypes-add'); // add
    $app->any('/HrLeavetypesView[/{id}]', HrLeavetypesController::class . ':view')->add(PermissionMiddleware::class)->setName('HrLeavetypesView-hr_leavetypes-view'); // view
    $app->any('/HrLeavetypesEdit[/{id}]', HrLeavetypesController::class . ':edit')->add(PermissionMiddleware::class)->setName('HrLeavetypesEdit-hr_leavetypes-edit'); // edit
    $app->any('/HrLeavetypesDelete[/{id}]', HrLeavetypesController::class . ':delete')->add(PermissionMiddleware::class)->setName('HrLeavetypesDelete-hr_leavetypes-delete'); // delete
    $app->group(
        '/hr_leavetypes',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', HrLeavetypesController::class . ':list')->add(PermissionMiddleware::class)->setName('hr_leavetypes/list-hr_leavetypes-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', HrLeavetypesController::class . ':add')->add(PermissionMiddleware::class)->setName('hr_leavetypes/add-hr_leavetypes-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', HrLeavetypesController::class . ':view')->add(PermissionMiddleware::class)->setName('hr_leavetypes/view-hr_leavetypes-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', HrLeavetypesController::class . ':edit')->add(PermissionMiddleware::class)->setName('hr_leavetypes/edit-hr_leavetypes-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', HrLeavetypesController::class . ':delete')->add(PermissionMiddleware::class)->setName('hr_leavetypes/delete-hr_leavetypes-delete-2'); // delete
        }
    );

    // hr_payfrequency
    $app->any('/HrPayfrequencyList[/{id}]', HrPayfrequencyController::class . ':list')->add(PermissionMiddleware::class)->setName('HrPayfrequencyList-hr_payfrequency-list'); // list
    $app->any('/HrPayfrequencyAdd[/{id}]', HrPayfrequencyController::class . ':add')->add(PermissionMiddleware::class)->setName('HrPayfrequencyAdd-hr_payfrequency-add'); // add
    $app->any('/HrPayfrequencyView[/{id}]', HrPayfrequencyController::class . ':view')->add(PermissionMiddleware::class)->setName('HrPayfrequencyView-hr_payfrequency-view'); // view
    $app->any('/HrPayfrequencyEdit[/{id}]', HrPayfrequencyController::class . ':edit')->add(PermissionMiddleware::class)->setName('HrPayfrequencyEdit-hr_payfrequency-edit'); // edit
    $app->any('/HrPayfrequencyDelete[/{id}]', HrPayfrequencyController::class . ':delete')->add(PermissionMiddleware::class)->setName('HrPayfrequencyDelete-hr_payfrequency-delete'); // delete
    $app->group(
        '/hr_payfrequency',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', HrPayfrequencyController::class . ':list')->add(PermissionMiddleware::class)->setName('hr_payfrequency/list-hr_payfrequency-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', HrPayfrequencyController::class . ':add')->add(PermissionMiddleware::class)->setName('hr_payfrequency/add-hr_payfrequency-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', HrPayfrequencyController::class . ':view')->add(PermissionMiddleware::class)->setName('hr_payfrequency/view-hr_payfrequency-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', HrPayfrequencyController::class . ':edit')->add(PermissionMiddleware::class)->setName('hr_payfrequency/edit-hr_payfrequency-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', HrPayfrequencyController::class . ':delete')->add(PermissionMiddleware::class)->setName('hr_payfrequency/delete-hr_payfrequency-delete-2'); // delete
        }
    );

    // hr_paygrades
    $app->any('/HrPaygradesList[/{id}]', HrPaygradesController::class . ':list')->add(PermissionMiddleware::class)->setName('HrPaygradesList-hr_paygrades-list'); // list
    $app->any('/HrPaygradesAdd[/{id}]', HrPaygradesController::class . ':add')->add(PermissionMiddleware::class)->setName('HrPaygradesAdd-hr_paygrades-add'); // add
    $app->any('/HrPaygradesView[/{id}]', HrPaygradesController::class . ':view')->add(PermissionMiddleware::class)->setName('HrPaygradesView-hr_paygrades-view'); // view
    $app->any('/HrPaygradesEdit[/{id}]', HrPaygradesController::class . ':edit')->add(PermissionMiddleware::class)->setName('HrPaygradesEdit-hr_paygrades-edit'); // edit
    $app->any('/HrPaygradesDelete[/{id}]', HrPaygradesController::class . ':delete')->add(PermissionMiddleware::class)->setName('HrPaygradesDelete-hr_paygrades-delete'); // delete
    $app->group(
        '/hr_paygrades',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', HrPaygradesController::class . ':list')->add(PermissionMiddleware::class)->setName('hr_paygrades/list-hr_paygrades-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', HrPaygradesController::class . ':add')->add(PermissionMiddleware::class)->setName('hr_paygrades/add-hr_paygrades-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', HrPaygradesController::class . ':view')->add(PermissionMiddleware::class)->setName('hr_paygrades/view-hr_paygrades-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', HrPaygradesController::class . ':edit')->add(PermissionMiddleware::class)->setName('hr_paygrades/edit-hr_paygrades-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', HrPaygradesController::class . ':delete')->add(PermissionMiddleware::class)->setName('hr_paygrades/delete-hr_paygrades-delete-2'); // delete
        }
    );

    // hr_projects
    $app->any('/HrProjectsList[/{id}]', HrProjectsController::class . ':list')->add(PermissionMiddleware::class)->setName('HrProjectsList-hr_projects-list'); // list
    $app->any('/HrProjectsAdd[/{id}]', HrProjectsController::class . ':add')->add(PermissionMiddleware::class)->setName('HrProjectsAdd-hr_projects-add'); // add
    $app->any('/HrProjectsView[/{id}]', HrProjectsController::class . ':view')->add(PermissionMiddleware::class)->setName('HrProjectsView-hr_projects-view'); // view
    $app->any('/HrProjectsEdit[/{id}]', HrProjectsController::class . ':edit')->add(PermissionMiddleware::class)->setName('HrProjectsEdit-hr_projects-edit'); // edit
    $app->any('/HrProjectsDelete[/{id}]', HrProjectsController::class . ':delete')->add(PermissionMiddleware::class)->setName('HrProjectsDelete-hr_projects-delete'); // delete
    $app->group(
        '/hr_projects',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', HrProjectsController::class . ':list')->add(PermissionMiddleware::class)->setName('hr_projects/list-hr_projects-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', HrProjectsController::class . ':add')->add(PermissionMiddleware::class)->setName('hr_projects/add-hr_projects-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', HrProjectsController::class . ':view')->add(PermissionMiddleware::class)->setName('hr_projects/view-hr_projects-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', HrProjectsController::class . ':edit')->add(PermissionMiddleware::class)->setName('hr_projects/edit-hr_projects-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', HrProjectsController::class . ':delete')->add(PermissionMiddleware::class)->setName('hr_projects/delete-hr_projects-delete-2'); // delete
        }
    );

    // hr_salarycomponent
    $app->any('/HrSalarycomponentList[/{id}]', HrSalarycomponentController::class . ':list')->add(PermissionMiddleware::class)->setName('HrSalarycomponentList-hr_salarycomponent-list'); // list
    $app->any('/HrSalarycomponentAdd[/{id}]', HrSalarycomponentController::class . ':add')->add(PermissionMiddleware::class)->setName('HrSalarycomponentAdd-hr_salarycomponent-add'); // add
    $app->any('/HrSalarycomponentView[/{id}]', HrSalarycomponentController::class . ':view')->add(PermissionMiddleware::class)->setName('HrSalarycomponentView-hr_salarycomponent-view'); // view
    $app->any('/HrSalarycomponentEdit[/{id}]', HrSalarycomponentController::class . ':edit')->add(PermissionMiddleware::class)->setName('HrSalarycomponentEdit-hr_salarycomponent-edit'); // edit
    $app->any('/HrSalarycomponentDelete[/{id}]', HrSalarycomponentController::class . ':delete')->add(PermissionMiddleware::class)->setName('HrSalarycomponentDelete-hr_salarycomponent-delete'); // delete
    $app->group(
        '/hr_salarycomponent',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', HrSalarycomponentController::class . ':list')->add(PermissionMiddleware::class)->setName('hr_salarycomponent/list-hr_salarycomponent-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', HrSalarycomponentController::class . ':add')->add(PermissionMiddleware::class)->setName('hr_salarycomponent/add-hr_salarycomponent-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', HrSalarycomponentController::class . ':view')->add(PermissionMiddleware::class)->setName('hr_salarycomponent/view-hr_salarycomponent-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', HrSalarycomponentController::class . ':edit')->add(PermissionMiddleware::class)->setName('hr_salarycomponent/edit-hr_salarycomponent-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', HrSalarycomponentController::class . ':delete')->add(PermissionMiddleware::class)->setName('hr_salarycomponent/delete-hr_salarycomponent-delete-2'); // delete
        }
    );

    // hr_salarycomponenttype
    $app->any('/HrSalarycomponenttypeList[/{id}]', HrSalarycomponenttypeController::class . ':list')->add(PermissionMiddleware::class)->setName('HrSalarycomponenttypeList-hr_salarycomponenttype-list'); // list
    $app->any('/HrSalarycomponenttypeAdd[/{id}]', HrSalarycomponenttypeController::class . ':add')->add(PermissionMiddleware::class)->setName('HrSalarycomponenttypeAdd-hr_salarycomponenttype-add'); // add
    $app->any('/HrSalarycomponenttypeView[/{id}]', HrSalarycomponenttypeController::class . ':view')->add(PermissionMiddleware::class)->setName('HrSalarycomponenttypeView-hr_salarycomponenttype-view'); // view
    $app->any('/HrSalarycomponenttypeEdit[/{id}]', HrSalarycomponenttypeController::class . ':edit')->add(PermissionMiddleware::class)->setName('HrSalarycomponenttypeEdit-hr_salarycomponenttype-edit'); // edit
    $app->any('/HrSalarycomponenttypeDelete[/{id}]', HrSalarycomponenttypeController::class . ':delete')->add(PermissionMiddleware::class)->setName('HrSalarycomponenttypeDelete-hr_salarycomponenttype-delete'); // delete
    $app->group(
        '/hr_salarycomponenttype',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', HrSalarycomponenttypeController::class . ':list')->add(PermissionMiddleware::class)->setName('hr_salarycomponenttype/list-hr_salarycomponenttype-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', HrSalarycomponenttypeController::class . ':add')->add(PermissionMiddleware::class)->setName('hr_salarycomponenttype/add-hr_salarycomponenttype-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', HrSalarycomponenttypeController::class . ':view')->add(PermissionMiddleware::class)->setName('hr_salarycomponenttype/view-hr_salarycomponenttype-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', HrSalarycomponenttypeController::class . ':edit')->add(PermissionMiddleware::class)->setName('hr_salarycomponenttype/edit-hr_salarycomponenttype-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', HrSalarycomponenttypeController::class . ':delete')->add(PermissionMiddleware::class)->setName('hr_salarycomponenttype/delete-hr_salarycomponenttype-delete-2'); // delete
        }
    );

    // hr_skills
    $app->any('/HrSkillsList[/{id}]', HrSkillsController::class . ':list')->add(PermissionMiddleware::class)->setName('HrSkillsList-hr_skills-list'); // list
    $app->any('/HrSkillsAdd[/{id}]', HrSkillsController::class . ':add')->add(PermissionMiddleware::class)->setName('HrSkillsAdd-hr_skills-add'); // add
    $app->any('/HrSkillsView[/{id}]', HrSkillsController::class . ':view')->add(PermissionMiddleware::class)->setName('HrSkillsView-hr_skills-view'); // view
    $app->any('/HrSkillsEdit[/{id}]', HrSkillsController::class . ':edit')->add(PermissionMiddleware::class)->setName('HrSkillsEdit-hr_skills-edit'); // edit
    $app->any('/HrSkillsDelete[/{id}]', HrSkillsController::class . ':delete')->add(PermissionMiddleware::class)->setName('HrSkillsDelete-hr_skills-delete'); // delete
    $app->group(
        '/hr_skills',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', HrSkillsController::class . ':list')->add(PermissionMiddleware::class)->setName('hr_skills/list-hr_skills-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', HrSkillsController::class . ':add')->add(PermissionMiddleware::class)->setName('hr_skills/add-hr_skills-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', HrSkillsController::class . ':view')->add(PermissionMiddleware::class)->setName('hr_skills/view-hr_skills-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', HrSkillsController::class . ':edit')->add(PermissionMiddleware::class)->setName('hr_skills/edit-hr_skills-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', HrSkillsController::class . ':delete')->add(PermissionMiddleware::class)->setName('hr_skills/delete-hr_skills-delete-2'); // delete
        }
    );

    // hr_supportedlanguages
    $app->any('/HrSupportedlanguagesList[/{id}]', HrSupportedlanguagesController::class . ':list')->add(PermissionMiddleware::class)->setName('HrSupportedlanguagesList-hr_supportedlanguages-list'); // list
    $app->any('/HrSupportedlanguagesAdd[/{id}]', HrSupportedlanguagesController::class . ':add')->add(PermissionMiddleware::class)->setName('HrSupportedlanguagesAdd-hr_supportedlanguages-add'); // add
    $app->any('/HrSupportedlanguagesView[/{id}]', HrSupportedlanguagesController::class . ':view')->add(PermissionMiddleware::class)->setName('HrSupportedlanguagesView-hr_supportedlanguages-view'); // view
    $app->any('/HrSupportedlanguagesEdit[/{id}]', HrSupportedlanguagesController::class . ':edit')->add(PermissionMiddleware::class)->setName('HrSupportedlanguagesEdit-hr_supportedlanguages-edit'); // edit
    $app->any('/HrSupportedlanguagesDelete[/{id}]', HrSupportedlanguagesController::class . ':delete')->add(PermissionMiddleware::class)->setName('HrSupportedlanguagesDelete-hr_supportedlanguages-delete'); // delete
    $app->group(
        '/hr_supportedlanguages',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', HrSupportedlanguagesController::class . ':list')->add(PermissionMiddleware::class)->setName('hr_supportedlanguages/list-hr_supportedlanguages-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', HrSupportedlanguagesController::class . ':add')->add(PermissionMiddleware::class)->setName('hr_supportedlanguages/add-hr_supportedlanguages-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', HrSupportedlanguagesController::class . ':view')->add(PermissionMiddleware::class)->setName('hr_supportedlanguages/view-hr_supportedlanguages-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', HrSupportedlanguagesController::class . ':edit')->add(PermissionMiddleware::class)->setName('hr_supportedlanguages/edit-hr_supportedlanguages-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', HrSupportedlanguagesController::class . ':delete')->add(PermissionMiddleware::class)->setName('hr_supportedlanguages/delete-hr_supportedlanguages-delete-2'); // delete
        }
    );

    // sys_certifications
    $app->any('/SysCertificationsList[/{id}]', SysCertificationsController::class . ':list')->add(PermissionMiddleware::class)->setName('SysCertificationsList-sys_certifications-list'); // list
    $app->any('/SysCertificationsAdd[/{id}]', SysCertificationsController::class . ':add')->add(PermissionMiddleware::class)->setName('SysCertificationsAdd-sys_certifications-add'); // add
    $app->any('/SysCertificationsView[/{id}]', SysCertificationsController::class . ':view')->add(PermissionMiddleware::class)->setName('SysCertificationsView-sys_certifications-view'); // view
    $app->any('/SysCertificationsEdit[/{id}]', SysCertificationsController::class . ':edit')->add(PermissionMiddleware::class)->setName('SysCertificationsEdit-sys_certifications-edit'); // edit
    $app->any('/SysCertificationsDelete[/{id}]', SysCertificationsController::class . ':delete')->add(PermissionMiddleware::class)->setName('SysCertificationsDelete-sys_certifications-delete'); // delete
    $app->group(
        '/sys_certifications',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', SysCertificationsController::class . ':list')->add(PermissionMiddleware::class)->setName('sys_certifications/list-sys_certifications-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', SysCertificationsController::class . ':add')->add(PermissionMiddleware::class)->setName('sys_certifications/add-sys_certifications-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', SysCertificationsController::class . ':view')->add(PermissionMiddleware::class)->setName('sys_certifications/view-sys_certifications-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', SysCertificationsController::class . ':edit')->add(PermissionMiddleware::class)->setName('sys_certifications/edit-sys_certifications-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', SysCertificationsController::class . ':delete')->add(PermissionMiddleware::class)->setName('sys_certifications/delete-sys_certifications-delete-2'); // delete
        }
    );

    // sys_country
    $app->any('/SysCountryList[/{id}]', SysCountryController::class . ':list')->add(PermissionMiddleware::class)->setName('SysCountryList-sys_country-list'); // list
    $app->any('/SysCountryAdd[/{id}]', SysCountryController::class . ':add')->add(PermissionMiddleware::class)->setName('SysCountryAdd-sys_country-add'); // add
    $app->any('/SysCountryView[/{id}]', SysCountryController::class . ':view')->add(PermissionMiddleware::class)->setName('SysCountryView-sys_country-view'); // view
    $app->any('/SysCountryEdit[/{id}]', SysCountryController::class . ':edit')->add(PermissionMiddleware::class)->setName('SysCountryEdit-sys_country-edit'); // edit
    $app->any('/SysCountryDelete[/{id}]', SysCountryController::class . ':delete')->add(PermissionMiddleware::class)->setName('SysCountryDelete-sys_country-delete'); // delete
    $app->group(
        '/sys_country',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', SysCountryController::class . ':list')->add(PermissionMiddleware::class)->setName('sys_country/list-sys_country-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', SysCountryController::class . ':add')->add(PermissionMiddleware::class)->setName('sys_country/add-sys_country-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', SysCountryController::class . ':view')->add(PermissionMiddleware::class)->setName('sys_country/view-sys_country-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', SysCountryController::class . ':edit')->add(PermissionMiddleware::class)->setName('sys_country/edit-sys_country-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', SysCountryController::class . ':delete')->add(PermissionMiddleware::class)->setName('sys_country/delete-sys_country-delete-2'); // delete
        }
    );

    // sys_currencytypes
    $app->any('/SysCurrencytypesList[/{id}]', SysCurrencytypesController::class . ':list')->add(PermissionMiddleware::class)->setName('SysCurrencytypesList-sys_currencytypes-list'); // list
    $app->any('/SysCurrencytypesAdd[/{id}]', SysCurrencytypesController::class . ':add')->add(PermissionMiddleware::class)->setName('SysCurrencytypesAdd-sys_currencytypes-add'); // add
    $app->any('/SysCurrencytypesView[/{id}]', SysCurrencytypesController::class . ':view')->add(PermissionMiddleware::class)->setName('SysCurrencytypesView-sys_currencytypes-view'); // view
    $app->any('/SysCurrencytypesEdit[/{id}]', SysCurrencytypesController::class . ':edit')->add(PermissionMiddleware::class)->setName('SysCurrencytypesEdit-sys_currencytypes-edit'); // edit
    $app->any('/SysCurrencytypesDelete[/{id}]', SysCurrencytypesController::class . ':delete')->add(PermissionMiddleware::class)->setName('SysCurrencytypesDelete-sys_currencytypes-delete'); // delete
    $app->group(
        '/sys_currencytypes',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', SysCurrencytypesController::class . ':list')->add(PermissionMiddleware::class)->setName('sys_currencytypes/list-sys_currencytypes-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', SysCurrencytypesController::class . ':add')->add(PermissionMiddleware::class)->setName('sys_currencytypes/add-sys_currencytypes-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', SysCurrencytypesController::class . ':view')->add(PermissionMiddleware::class)->setName('sys_currencytypes/view-sys_currencytypes-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', SysCurrencytypesController::class . ':edit')->add(PermissionMiddleware::class)->setName('sys_currencytypes/edit-sys_currencytypes-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', SysCurrencytypesController::class . ':delete')->add(PermissionMiddleware::class)->setName('sys_currencytypes/delete-sys_currencytypes-delete-2'); // delete
        }
    );

    // sys_nationality
    $app->any('/SysNationalityList[/{id}]', SysNationalityController::class . ':list')->add(PermissionMiddleware::class)->setName('SysNationalityList-sys_nationality-list'); // list
    $app->any('/SysNationalityAdd[/{id}]', SysNationalityController::class . ':add')->add(PermissionMiddleware::class)->setName('SysNationalityAdd-sys_nationality-add'); // add
    $app->any('/SysNationalityView[/{id}]', SysNationalityController::class . ':view')->add(PermissionMiddleware::class)->setName('SysNationalityView-sys_nationality-view'); // view
    $app->any('/SysNationalityEdit[/{id}]', SysNationalityController::class . ':edit')->add(PermissionMiddleware::class)->setName('SysNationalityEdit-sys_nationality-edit'); // edit
    $app->any('/SysNationalityDelete[/{id}]', SysNationalityController::class . ':delete')->add(PermissionMiddleware::class)->setName('SysNationalityDelete-sys_nationality-delete'); // delete
    $app->group(
        '/sys_nationality',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', SysNationalityController::class . ':list')->add(PermissionMiddleware::class)->setName('sys_nationality/list-sys_nationality-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', SysNationalityController::class . ':add')->add(PermissionMiddleware::class)->setName('sys_nationality/add-sys_nationality-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', SysNationalityController::class . ':view')->add(PermissionMiddleware::class)->setName('sys_nationality/view-sys_nationality-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', SysNationalityController::class . ':edit')->add(PermissionMiddleware::class)->setName('sys_nationality/edit-sys_nationality-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', SysNationalityController::class . ':delete')->add(PermissionMiddleware::class)->setName('sys_nationality/delete-sys_nationality-delete-2'); // delete
        }
    );

    // sys_province
    $app->any('/SysProvinceList[/{id}]', SysProvinceController::class . ':list')->add(PermissionMiddleware::class)->setName('SysProvinceList-sys_province-list'); // list
    $app->any('/SysProvinceAdd[/{id}]', SysProvinceController::class . ':add')->add(PermissionMiddleware::class)->setName('SysProvinceAdd-sys_province-add'); // add
    $app->any('/SysProvinceView[/{id}]', SysProvinceController::class . ':view')->add(PermissionMiddleware::class)->setName('SysProvinceView-sys_province-view'); // view
    $app->any('/SysProvinceEdit[/{id}]', SysProvinceController::class . ':edit')->add(PermissionMiddleware::class)->setName('SysProvinceEdit-sys_province-edit'); // edit
    $app->any('/SysProvinceDelete[/{id}]', SysProvinceController::class . ':delete')->add(PermissionMiddleware::class)->setName('SysProvinceDelete-sys_province-delete'); // delete
    $app->group(
        '/sys_province',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', SysProvinceController::class . ':list')->add(PermissionMiddleware::class)->setName('sys_province/list-sys_province-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', SysProvinceController::class . ':add')->add(PermissionMiddleware::class)->setName('sys_province/add-sys_province-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', SysProvinceController::class . ':view')->add(PermissionMiddleware::class)->setName('sys_province/view-sys_province-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', SysProvinceController::class . ':edit')->add(PermissionMiddleware::class)->setName('sys_province/edit-sys_province-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', SysProvinceController::class . ':delete')->add(PermissionMiddleware::class)->setName('sys_province/delete-sys_province-delete-2'); // delete
        }
    );

    // sys_timezones
    $app->any('/SysTimezonesList[/{id}]', SysTimezonesController::class . ':list')->add(PermissionMiddleware::class)->setName('SysTimezonesList-sys_timezones-list'); // list
    $app->any('/SysTimezonesAdd[/{id}]', SysTimezonesController::class . ':add')->add(PermissionMiddleware::class)->setName('SysTimezonesAdd-sys_timezones-add'); // add
    $app->any('/SysTimezonesView[/{id}]', SysTimezonesController::class . ':view')->add(PermissionMiddleware::class)->setName('SysTimezonesView-sys_timezones-view'); // view
    $app->any('/SysTimezonesEdit[/{id}]', SysTimezonesController::class . ':edit')->add(PermissionMiddleware::class)->setName('SysTimezonesEdit-sys_timezones-edit'); // edit
    $app->any('/SysTimezonesDelete[/{id}]', SysTimezonesController::class . ':delete')->add(PermissionMiddleware::class)->setName('SysTimezonesDelete-sys_timezones-delete'); // delete
    $app->group(
        '/sys_timezones',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', SysTimezonesController::class . ':list')->add(PermissionMiddleware::class)->setName('sys_timezones/list-sys_timezones-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', SysTimezonesController::class . ':add')->add(PermissionMiddleware::class)->setName('sys_timezones/add-sys_timezones-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', SysTimezonesController::class . ':view')->add(PermissionMiddleware::class)->setName('sys_timezones/view-sys_timezones-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', SysTimezonesController::class . ':edit')->add(PermissionMiddleware::class)->setName('sys_timezones/edit-sys_timezones-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', SysTimezonesController::class . ':delete')->add(PermissionMiddleware::class)->setName('sys_timezones/delete-sys_timezones-delete-2'); // delete
        }
    );

    // sys_workdays
    $app->any('/SysWorkdaysList[/{id}]', SysWorkdaysController::class . ':list')->add(PermissionMiddleware::class)->setName('SysWorkdaysList-sys_workdays-list'); // list
    $app->any('/SysWorkdaysAdd[/{id}]', SysWorkdaysController::class . ':add')->add(PermissionMiddleware::class)->setName('SysWorkdaysAdd-sys_workdays-add'); // add
    $app->any('/SysWorkdaysView[/{id}]', SysWorkdaysController::class . ':view')->add(PermissionMiddleware::class)->setName('SysWorkdaysView-sys_workdays-view'); // view
    $app->any('/SysWorkdaysEdit[/{id}]', SysWorkdaysController::class . ':edit')->add(PermissionMiddleware::class)->setName('SysWorkdaysEdit-sys_workdays-edit'); // edit
    $app->any('/SysWorkdaysDelete[/{id}]', SysWorkdaysController::class . ':delete')->add(PermissionMiddleware::class)->setName('SysWorkdaysDelete-sys_workdays-delete'); // delete
    $app->group(
        '/sys_workdays',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', SysWorkdaysController::class . ':list')->add(PermissionMiddleware::class)->setName('sys_workdays/list-sys_workdays-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', SysWorkdaysController::class . ':add')->add(PermissionMiddleware::class)->setName('sys_workdays/add-sys_workdays-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', SysWorkdaysController::class . ':view')->add(PermissionMiddleware::class)->setName('sys_workdays/view-sys_workdays-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', SysWorkdaysController::class . ':edit')->add(PermissionMiddleware::class)->setName('sys_workdays/edit-sys_workdays-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', SysWorkdaysController::class . ':delete')->add(PermissionMiddleware::class)->setName('sys_workdays/delete-sys_workdays-delete-2'); // delete
        }
    );

    // employee_attendance
    $app->any('/EmployeeAttendanceList[/{id}]', EmployeeAttendanceController::class . ':list')->add(PermissionMiddleware::class)->setName('EmployeeAttendanceList-employee_attendance-list'); // list
    $app->any('/EmployeeAttendanceAdd[/{id}]', EmployeeAttendanceController::class . ':add')->add(PermissionMiddleware::class)->setName('EmployeeAttendanceAdd-employee_attendance-add'); // add
    $app->any('/EmployeeAttendanceView[/{id}]', EmployeeAttendanceController::class . ':view')->add(PermissionMiddleware::class)->setName('EmployeeAttendanceView-employee_attendance-view'); // view
    $app->any('/EmployeeAttendanceEdit[/{id}]', EmployeeAttendanceController::class . ':edit')->add(PermissionMiddleware::class)->setName('EmployeeAttendanceEdit-employee_attendance-edit'); // edit
    $app->any('/EmployeeAttendanceDelete[/{id}]', EmployeeAttendanceController::class . ':delete')->add(PermissionMiddleware::class)->setName('EmployeeAttendanceDelete-employee_attendance-delete'); // delete
    $app->group(
        '/employee_attendance',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', EmployeeAttendanceController::class . ':list')->add(PermissionMiddleware::class)->setName('employee_attendance/list-employee_attendance-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', EmployeeAttendanceController::class . ':add')->add(PermissionMiddleware::class)->setName('employee_attendance/add-employee_attendance-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', EmployeeAttendanceController::class . ':view')->add(PermissionMiddleware::class)->setName('employee_attendance/view-employee_attendance-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', EmployeeAttendanceController::class . ':edit')->add(PermissionMiddleware::class)->setName('employee_attendance/edit-employee_attendance-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', EmployeeAttendanceController::class . ':delete')->add(PermissionMiddleware::class)->setName('employee_attendance/delete-employee_attendance-delete-2'); // delete
        }
    );

    // employee_attendancesheets
    $app->any('/EmployeeAttendancesheetsList[/{id}]', EmployeeAttendancesheetsController::class . ':list')->add(PermissionMiddleware::class)->setName('EmployeeAttendancesheetsList-employee_attendancesheets-list'); // list
    $app->any('/EmployeeAttendancesheetsAdd[/{id}]', EmployeeAttendancesheetsController::class . ':add')->add(PermissionMiddleware::class)->setName('EmployeeAttendancesheetsAdd-employee_attendancesheets-add'); // add
    $app->any('/EmployeeAttendancesheetsView[/{id}]', EmployeeAttendancesheetsController::class . ':view')->add(PermissionMiddleware::class)->setName('EmployeeAttendancesheetsView-employee_attendancesheets-view'); // view
    $app->any('/EmployeeAttendancesheetsEdit[/{id}]', EmployeeAttendancesheetsController::class . ':edit')->add(PermissionMiddleware::class)->setName('EmployeeAttendancesheetsEdit-employee_attendancesheets-edit'); // edit
    $app->any('/EmployeeAttendancesheetsDelete[/{id}]', EmployeeAttendancesheetsController::class . ':delete')->add(PermissionMiddleware::class)->setName('EmployeeAttendancesheetsDelete-employee_attendancesheets-delete'); // delete
    $app->group(
        '/employee_attendancesheets',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', EmployeeAttendancesheetsController::class . ':list')->add(PermissionMiddleware::class)->setName('employee_attendancesheets/list-employee_attendancesheets-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', EmployeeAttendancesheetsController::class . ':add')->add(PermissionMiddleware::class)->setName('employee_attendancesheets/add-employee_attendancesheets-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', EmployeeAttendancesheetsController::class . ':view')->add(PermissionMiddleware::class)->setName('employee_attendancesheets/view-employee_attendancesheets-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', EmployeeAttendancesheetsController::class . ':edit')->add(PermissionMiddleware::class)->setName('employee_attendancesheets/edit-employee_attendancesheets-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', EmployeeAttendancesheetsController::class . ':delete')->add(PermissionMiddleware::class)->setName('employee_attendancesheets/delete-employee_attendancesheets-delete-2'); // delete
        }
    );

    // employee_certifications
    $app->any('/EmployeeCertificationsList[/{id}]', EmployeeCertificationsController::class . ':list')->add(PermissionMiddleware::class)->setName('EmployeeCertificationsList-employee_certifications-list'); // list
    $app->any('/EmployeeCertificationsAdd[/{id}]', EmployeeCertificationsController::class . ':add')->add(PermissionMiddleware::class)->setName('EmployeeCertificationsAdd-employee_certifications-add'); // add
    $app->any('/EmployeeCertificationsView[/{id}]', EmployeeCertificationsController::class . ':view')->add(PermissionMiddleware::class)->setName('EmployeeCertificationsView-employee_certifications-view'); // view
    $app->any('/EmployeeCertificationsEdit[/{id}]', EmployeeCertificationsController::class . ':edit')->add(PermissionMiddleware::class)->setName('EmployeeCertificationsEdit-employee_certifications-edit'); // edit
    $app->any('/EmployeeCertificationsDelete[/{id}]', EmployeeCertificationsController::class . ':delete')->add(PermissionMiddleware::class)->setName('EmployeeCertificationsDelete-employee_certifications-delete'); // delete
    $app->group(
        '/employee_certifications',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', EmployeeCertificationsController::class . ':list')->add(PermissionMiddleware::class)->setName('employee_certifications/list-employee_certifications-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', EmployeeCertificationsController::class . ':add')->add(PermissionMiddleware::class)->setName('employee_certifications/add-employee_certifications-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', EmployeeCertificationsController::class . ':view')->add(PermissionMiddleware::class)->setName('employee_certifications/view-employee_certifications-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', EmployeeCertificationsController::class . ':edit')->add(PermissionMiddleware::class)->setName('employee_certifications/edit-employee_certifications-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', EmployeeCertificationsController::class . ':delete')->add(PermissionMiddleware::class)->setName('employee_certifications/delete-employee_certifications-delete-2'); // delete
        }
    );

    // employee_company_loans
    $app->any('/EmployeeCompanyLoansList[/{id}]', EmployeeCompanyLoansController::class . ':list')->add(PermissionMiddleware::class)->setName('EmployeeCompanyLoansList-employee_company_loans-list'); // list
    $app->any('/EmployeeCompanyLoansAdd[/{id}]', EmployeeCompanyLoansController::class . ':add')->add(PermissionMiddleware::class)->setName('EmployeeCompanyLoansAdd-employee_company_loans-add'); // add
    $app->any('/EmployeeCompanyLoansView[/{id}]', EmployeeCompanyLoansController::class . ':view')->add(PermissionMiddleware::class)->setName('EmployeeCompanyLoansView-employee_company_loans-view'); // view
    $app->any('/EmployeeCompanyLoansEdit[/{id}]', EmployeeCompanyLoansController::class . ':edit')->add(PermissionMiddleware::class)->setName('EmployeeCompanyLoansEdit-employee_company_loans-edit'); // edit
    $app->any('/EmployeeCompanyLoansDelete[/{id}]', EmployeeCompanyLoansController::class . ':delete')->add(PermissionMiddleware::class)->setName('EmployeeCompanyLoansDelete-employee_company_loans-delete'); // delete
    $app->group(
        '/employee_company_loans',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', EmployeeCompanyLoansController::class . ':list')->add(PermissionMiddleware::class)->setName('employee_company_loans/list-employee_company_loans-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', EmployeeCompanyLoansController::class . ':add')->add(PermissionMiddleware::class)->setName('employee_company_loans/add-employee_company_loans-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', EmployeeCompanyLoansController::class . ':view')->add(PermissionMiddleware::class)->setName('employee_company_loans/view-employee_company_loans-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', EmployeeCompanyLoansController::class . ':edit')->add(PermissionMiddleware::class)->setName('employee_company_loans/edit-employee_company_loans-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', EmployeeCompanyLoansController::class . ':delete')->add(PermissionMiddleware::class)->setName('employee_company_loans/delete-employee_company_loans-delete-2'); // delete
        }
    );

    // employee_dependents
    $app->any('/EmployeeDependentsList[/{id}]', EmployeeDependentsController::class . ':list')->add(PermissionMiddleware::class)->setName('EmployeeDependentsList-employee_dependents-list'); // list
    $app->any('/EmployeeDependentsAdd[/{id}]', EmployeeDependentsController::class . ':add')->add(PermissionMiddleware::class)->setName('EmployeeDependentsAdd-employee_dependents-add'); // add
    $app->any('/EmployeeDependentsView[/{id}]', EmployeeDependentsController::class . ':view')->add(PermissionMiddleware::class)->setName('EmployeeDependentsView-employee_dependents-view'); // view
    $app->any('/EmployeeDependentsEdit[/{id}]', EmployeeDependentsController::class . ':edit')->add(PermissionMiddleware::class)->setName('EmployeeDependentsEdit-employee_dependents-edit'); // edit
    $app->any('/EmployeeDependentsDelete[/{id}]', EmployeeDependentsController::class . ':delete')->add(PermissionMiddleware::class)->setName('EmployeeDependentsDelete-employee_dependents-delete'); // delete
    $app->group(
        '/employee_dependents',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', EmployeeDependentsController::class . ':list')->add(PermissionMiddleware::class)->setName('employee_dependents/list-employee_dependents-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', EmployeeDependentsController::class . ':add')->add(PermissionMiddleware::class)->setName('employee_dependents/add-employee_dependents-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', EmployeeDependentsController::class . ':view')->add(PermissionMiddleware::class)->setName('employee_dependents/view-employee_dependents-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', EmployeeDependentsController::class . ':edit')->add(PermissionMiddleware::class)->setName('employee_dependents/edit-employee_dependents-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', EmployeeDependentsController::class . ':delete')->add(PermissionMiddleware::class)->setName('employee_dependents/delete-employee_dependents-delete-2'); // delete
        }
    );

    // employee_emergency_contacts
    $app->any('/EmployeeEmergencyContactsList[/{id}]', EmployeeEmergencyContactsController::class . ':list')->add(PermissionMiddleware::class)->setName('EmployeeEmergencyContactsList-employee_emergency_contacts-list'); // list
    $app->any('/EmployeeEmergencyContactsAdd[/{id}]', EmployeeEmergencyContactsController::class . ':add')->add(PermissionMiddleware::class)->setName('EmployeeEmergencyContactsAdd-employee_emergency_contacts-add'); // add
    $app->any('/EmployeeEmergencyContactsView[/{id}]', EmployeeEmergencyContactsController::class . ':view')->add(PermissionMiddleware::class)->setName('EmployeeEmergencyContactsView-employee_emergency_contacts-view'); // view
    $app->any('/EmployeeEmergencyContactsEdit[/{id}]', EmployeeEmergencyContactsController::class . ':edit')->add(PermissionMiddleware::class)->setName('EmployeeEmergencyContactsEdit-employee_emergency_contacts-edit'); // edit
    $app->any('/EmployeeEmergencyContactsDelete[/{id}]', EmployeeEmergencyContactsController::class . ':delete')->add(PermissionMiddleware::class)->setName('EmployeeEmergencyContactsDelete-employee_emergency_contacts-delete'); // delete
    $app->group(
        '/employee_emergency_contacts',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', EmployeeEmergencyContactsController::class . ':list')->add(PermissionMiddleware::class)->setName('employee_emergency_contacts/list-employee_emergency_contacts-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', EmployeeEmergencyContactsController::class . ':add')->add(PermissionMiddleware::class)->setName('employee_emergency_contacts/add-employee_emergency_contacts-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', EmployeeEmergencyContactsController::class . ':view')->add(PermissionMiddleware::class)->setName('employee_emergency_contacts/view-employee_emergency_contacts-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', EmployeeEmergencyContactsController::class . ':edit')->add(PermissionMiddleware::class)->setName('employee_emergency_contacts/edit-employee_emergency_contacts-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', EmployeeEmergencyContactsController::class . ':delete')->add(PermissionMiddleware::class)->setName('employee_emergency_contacts/delete-employee_emergency_contacts-delete-2'); // delete
        }
    );

    // employee_immigrationdocuments
    $app->any('/EmployeeImmigrationdocumentsList[/{id}]', EmployeeImmigrationdocumentsController::class . ':list')->add(PermissionMiddleware::class)->setName('EmployeeImmigrationdocumentsList-employee_immigrationdocuments-list'); // list
    $app->any('/EmployeeImmigrationdocumentsAdd[/{id}]', EmployeeImmigrationdocumentsController::class . ':add')->add(PermissionMiddleware::class)->setName('EmployeeImmigrationdocumentsAdd-employee_immigrationdocuments-add'); // add
    $app->any('/EmployeeImmigrationdocumentsView[/{id}]', EmployeeImmigrationdocumentsController::class . ':view')->add(PermissionMiddleware::class)->setName('EmployeeImmigrationdocumentsView-employee_immigrationdocuments-view'); // view
    $app->any('/EmployeeImmigrationdocumentsEdit[/{id}]', EmployeeImmigrationdocumentsController::class . ':edit')->add(PermissionMiddleware::class)->setName('EmployeeImmigrationdocumentsEdit-employee_immigrationdocuments-edit'); // edit
    $app->any('/EmployeeImmigrationdocumentsDelete[/{id}]', EmployeeImmigrationdocumentsController::class . ':delete')->add(PermissionMiddleware::class)->setName('EmployeeImmigrationdocumentsDelete-employee_immigrationdocuments-delete'); // delete
    $app->group(
        '/employee_immigrationdocuments',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', EmployeeImmigrationdocumentsController::class . ':list')->add(PermissionMiddleware::class)->setName('employee_immigrationdocuments/list-employee_immigrationdocuments-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', EmployeeImmigrationdocumentsController::class . ':add')->add(PermissionMiddleware::class)->setName('employee_immigrationdocuments/add-employee_immigrationdocuments-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', EmployeeImmigrationdocumentsController::class . ':view')->add(PermissionMiddleware::class)->setName('employee_immigrationdocuments/view-employee_immigrationdocuments-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', EmployeeImmigrationdocumentsController::class . ':edit')->add(PermissionMiddleware::class)->setName('employee_immigrationdocuments/edit-employee_immigrationdocuments-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', EmployeeImmigrationdocumentsController::class . ':delete')->add(PermissionMiddleware::class)->setName('employee_immigrationdocuments/delete-employee_immigrationdocuments-delete-2'); // delete
        }
    );

    // employee_immigrations
    $app->any('/EmployeeImmigrationsList[/{id}]', EmployeeImmigrationsController::class . ':list')->add(PermissionMiddleware::class)->setName('EmployeeImmigrationsList-employee_immigrations-list'); // list
    $app->any('/EmployeeImmigrationsAdd[/{id}]', EmployeeImmigrationsController::class . ':add')->add(PermissionMiddleware::class)->setName('EmployeeImmigrationsAdd-employee_immigrations-add'); // add
    $app->any('/EmployeeImmigrationsView[/{id}]', EmployeeImmigrationsController::class . ':view')->add(PermissionMiddleware::class)->setName('EmployeeImmigrationsView-employee_immigrations-view'); // view
    $app->any('/EmployeeImmigrationsEdit[/{id}]', EmployeeImmigrationsController::class . ':edit')->add(PermissionMiddleware::class)->setName('EmployeeImmigrationsEdit-employee_immigrations-edit'); // edit
    $app->any('/EmployeeImmigrationsDelete[/{id}]', EmployeeImmigrationsController::class . ':delete')->add(PermissionMiddleware::class)->setName('EmployeeImmigrationsDelete-employee_immigrations-delete'); // delete
    $app->group(
        '/employee_immigrations',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', EmployeeImmigrationsController::class . ':list')->add(PermissionMiddleware::class)->setName('employee_immigrations/list-employee_immigrations-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', EmployeeImmigrationsController::class . ':add')->add(PermissionMiddleware::class)->setName('employee_immigrations/add-employee_immigrations-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', EmployeeImmigrationsController::class . ':view')->add(PermissionMiddleware::class)->setName('employee_immigrations/view-employee_immigrations-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', EmployeeImmigrationsController::class . ':edit')->add(PermissionMiddleware::class)->setName('employee_immigrations/edit-employee_immigrations-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', EmployeeImmigrationsController::class . ':delete')->add(PermissionMiddleware::class)->setName('employee_immigrations/delete-employee_immigrations-delete-2'); // delete
        }
    );

    // employee_languages
    $app->any('/EmployeeLanguagesList[/{id}]', EmployeeLanguagesController::class . ':list')->add(PermissionMiddleware::class)->setName('EmployeeLanguagesList-employee_languages-list'); // list
    $app->any('/EmployeeLanguagesAdd[/{id}]', EmployeeLanguagesController::class . ':add')->add(PermissionMiddleware::class)->setName('EmployeeLanguagesAdd-employee_languages-add'); // add
    $app->any('/EmployeeLanguagesView[/{id}]', EmployeeLanguagesController::class . ':view')->add(PermissionMiddleware::class)->setName('EmployeeLanguagesView-employee_languages-view'); // view
    $app->any('/EmployeeLanguagesEdit[/{id}]', EmployeeLanguagesController::class . ':edit')->add(PermissionMiddleware::class)->setName('EmployeeLanguagesEdit-employee_languages-edit'); // edit
    $app->any('/EmployeeLanguagesDelete[/{id}]', EmployeeLanguagesController::class . ':delete')->add(PermissionMiddleware::class)->setName('EmployeeLanguagesDelete-employee_languages-delete'); // delete
    $app->group(
        '/employee_languages',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', EmployeeLanguagesController::class . ':list')->add(PermissionMiddleware::class)->setName('employee_languages/list-employee_languages-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', EmployeeLanguagesController::class . ':add')->add(PermissionMiddleware::class)->setName('employee_languages/add-employee_languages-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', EmployeeLanguagesController::class . ':view')->add(PermissionMiddleware::class)->setName('employee_languages/view-employee_languages-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', EmployeeLanguagesController::class . ':edit')->add(PermissionMiddleware::class)->setName('employee_languages/edit-employee_languages-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', EmployeeLanguagesController::class . ':delete')->add(PermissionMiddleware::class)->setName('employee_languages/delete-employee_languages-delete-2'); // delete
        }
    );

    // employee_leavedays
    $app->any('/EmployeeLeavedaysList[/{id}]', EmployeeLeavedaysController::class . ':list')->add(PermissionMiddleware::class)->setName('EmployeeLeavedaysList-employee_leavedays-list'); // list
    $app->any('/EmployeeLeavedaysAdd[/{id}]', EmployeeLeavedaysController::class . ':add')->add(PermissionMiddleware::class)->setName('EmployeeLeavedaysAdd-employee_leavedays-add'); // add
    $app->any('/EmployeeLeavedaysView[/{id}]', EmployeeLeavedaysController::class . ':view')->add(PermissionMiddleware::class)->setName('EmployeeLeavedaysView-employee_leavedays-view'); // view
    $app->any('/EmployeeLeavedaysEdit[/{id}]', EmployeeLeavedaysController::class . ':edit')->add(PermissionMiddleware::class)->setName('EmployeeLeavedaysEdit-employee_leavedays-edit'); // edit
    $app->any('/EmployeeLeavedaysDelete[/{id}]', EmployeeLeavedaysController::class . ':delete')->add(PermissionMiddleware::class)->setName('EmployeeLeavedaysDelete-employee_leavedays-delete'); // delete
    $app->group(
        '/employee_leavedays',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', EmployeeLeavedaysController::class . ':list')->add(PermissionMiddleware::class)->setName('employee_leavedays/list-employee_leavedays-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', EmployeeLeavedaysController::class . ':add')->add(PermissionMiddleware::class)->setName('employee_leavedays/add-employee_leavedays-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', EmployeeLeavedaysController::class . ':view')->add(PermissionMiddleware::class)->setName('employee_leavedays/view-employee_leavedays-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', EmployeeLeavedaysController::class . ':edit')->add(PermissionMiddleware::class)->setName('employee_leavedays/edit-employee_leavedays-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', EmployeeLeavedaysController::class . ':delete')->add(PermissionMiddleware::class)->setName('employee_leavedays/delete-employee_leavedays-delete-2'); // delete
        }
    );

    // employee_leaves
    $app->any('/EmployeeLeavesList[/{id}]', EmployeeLeavesController::class . ':list')->add(PermissionMiddleware::class)->setName('EmployeeLeavesList-employee_leaves-list'); // list
    $app->any('/EmployeeLeavesAdd[/{id}]', EmployeeLeavesController::class . ':add')->add(PermissionMiddleware::class)->setName('EmployeeLeavesAdd-employee_leaves-add'); // add
    $app->any('/EmployeeLeavesView[/{id}]', EmployeeLeavesController::class . ':view')->add(PermissionMiddleware::class)->setName('EmployeeLeavesView-employee_leaves-view'); // view
    $app->any('/EmployeeLeavesEdit[/{id}]', EmployeeLeavesController::class . ':edit')->add(PermissionMiddleware::class)->setName('EmployeeLeavesEdit-employee_leaves-edit'); // edit
    $app->any('/EmployeeLeavesDelete[/{id}]', EmployeeLeavesController::class . ':delete')->add(PermissionMiddleware::class)->setName('EmployeeLeavesDelete-employee_leaves-delete'); // delete
    $app->group(
        '/employee_leaves',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', EmployeeLeavesController::class . ':list')->add(PermissionMiddleware::class)->setName('employee_leaves/list-employee_leaves-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', EmployeeLeavesController::class . ':add')->add(PermissionMiddleware::class)->setName('employee_leaves/add-employee_leaves-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', EmployeeLeavesController::class . ':view')->add(PermissionMiddleware::class)->setName('employee_leaves/view-employee_leaves-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', EmployeeLeavesController::class . ':edit')->add(PermissionMiddleware::class)->setName('employee_leaves/edit-employee_leaves-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', EmployeeLeavesController::class . ':delete')->add(PermissionMiddleware::class)->setName('employee_leaves/delete-employee_leaves-delete-2'); // delete
        }
    );

    // employee_overtime
    $app->any('/EmployeeOvertimeList[/{id}]', EmployeeOvertimeController::class . ':list')->add(PermissionMiddleware::class)->setName('EmployeeOvertimeList-employee_overtime-list'); // list
    $app->any('/EmployeeOvertimeAdd[/{id}]', EmployeeOvertimeController::class . ':add')->add(PermissionMiddleware::class)->setName('EmployeeOvertimeAdd-employee_overtime-add'); // add
    $app->any('/EmployeeOvertimeView[/{id}]', EmployeeOvertimeController::class . ':view')->add(PermissionMiddleware::class)->setName('EmployeeOvertimeView-employee_overtime-view'); // view
    $app->any('/EmployeeOvertimeEdit[/{id}]', EmployeeOvertimeController::class . ':edit')->add(PermissionMiddleware::class)->setName('EmployeeOvertimeEdit-employee_overtime-edit'); // edit
    $app->any('/EmployeeOvertimeDelete[/{id}]', EmployeeOvertimeController::class . ':delete')->add(PermissionMiddleware::class)->setName('EmployeeOvertimeDelete-employee_overtime-delete'); // delete
    $app->group(
        '/employee_overtime',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', EmployeeOvertimeController::class . ':list')->add(PermissionMiddleware::class)->setName('employee_overtime/list-employee_overtime-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', EmployeeOvertimeController::class . ':add')->add(PermissionMiddleware::class)->setName('employee_overtime/add-employee_overtime-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', EmployeeOvertimeController::class . ':view')->add(PermissionMiddleware::class)->setName('employee_overtime/view-employee_overtime-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', EmployeeOvertimeController::class . ':edit')->add(PermissionMiddleware::class)->setName('employee_overtime/edit-employee_overtime-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', EmployeeOvertimeController::class . ':delete')->add(PermissionMiddleware::class)->setName('employee_overtime/delete-employee_overtime-delete-2'); // delete
        }
    );

    // employee_permissions
    $app->any('/EmployeePermissionsList[/{id}]', EmployeePermissionsController::class . ':list')->add(PermissionMiddleware::class)->setName('EmployeePermissionsList-employee_permissions-list'); // list
    $app->any('/EmployeePermissionsAdd[/{id}]', EmployeePermissionsController::class . ':add')->add(PermissionMiddleware::class)->setName('EmployeePermissionsAdd-employee_permissions-add'); // add
    $app->any('/EmployeePermissionsView[/{id}]', EmployeePermissionsController::class . ':view')->add(PermissionMiddleware::class)->setName('EmployeePermissionsView-employee_permissions-view'); // view
    $app->any('/EmployeePermissionsEdit[/{id}]', EmployeePermissionsController::class . ':edit')->add(PermissionMiddleware::class)->setName('EmployeePermissionsEdit-employee_permissions-edit'); // edit
    $app->any('/EmployeePermissionsDelete[/{id}]', EmployeePermissionsController::class . ':delete')->add(PermissionMiddleware::class)->setName('EmployeePermissionsDelete-employee_permissions-delete'); // delete
    $app->group(
        '/employee_permissions',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', EmployeePermissionsController::class . ':list')->add(PermissionMiddleware::class)->setName('employee_permissions/list-employee_permissions-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', EmployeePermissionsController::class . ':add')->add(PermissionMiddleware::class)->setName('employee_permissions/add-employee_permissions-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', EmployeePermissionsController::class . ':view')->add(PermissionMiddleware::class)->setName('employee_permissions/view-employee_permissions-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', EmployeePermissionsController::class . ':edit')->add(PermissionMiddleware::class)->setName('employee_permissions/edit-employee_permissions-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', EmployeePermissionsController::class . ':delete')->add(PermissionMiddleware::class)->setName('employee_permissions/delete-employee_permissions-delete-2'); // delete
        }
    );

    // employee_projects
    $app->any('/EmployeeProjectsList[/{id}]', EmployeeProjectsController::class . ':list')->add(PermissionMiddleware::class)->setName('EmployeeProjectsList-employee_projects-list'); // list
    $app->any('/EmployeeProjectsAdd[/{id}]', EmployeeProjectsController::class . ':add')->add(PermissionMiddleware::class)->setName('EmployeeProjectsAdd-employee_projects-add'); // add
    $app->any('/EmployeeProjectsView[/{id}]', EmployeeProjectsController::class . ':view')->add(PermissionMiddleware::class)->setName('EmployeeProjectsView-employee_projects-view'); // view
    $app->any('/EmployeeProjectsEdit[/{id}]', EmployeeProjectsController::class . ':edit')->add(PermissionMiddleware::class)->setName('EmployeeProjectsEdit-employee_projects-edit'); // edit
    $app->any('/EmployeeProjectsDelete[/{id}]', EmployeeProjectsController::class . ':delete')->add(PermissionMiddleware::class)->setName('EmployeeProjectsDelete-employee_projects-delete'); // delete
    $app->group(
        '/employee_projects',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', EmployeeProjectsController::class . ':list')->add(PermissionMiddleware::class)->setName('employee_projects/list-employee_projects-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', EmployeeProjectsController::class . ':add')->add(PermissionMiddleware::class)->setName('employee_projects/add-employee_projects-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', EmployeeProjectsController::class . ':view')->add(PermissionMiddleware::class)->setName('employee_projects/view-employee_projects-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', EmployeeProjectsController::class . ':edit')->add(PermissionMiddleware::class)->setName('employee_projects/edit-employee_projects-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', EmployeeProjectsController::class . ':delete')->add(PermissionMiddleware::class)->setName('employee_projects/delete-employee_projects-delete-2'); // delete
        }
    );

    // employee_salary
    $app->any('/EmployeeSalaryList[/{id}]', EmployeeSalaryController::class . ':list')->add(PermissionMiddleware::class)->setName('EmployeeSalaryList-employee_salary-list'); // list
    $app->any('/EmployeeSalaryAdd[/{id}]', EmployeeSalaryController::class . ':add')->add(PermissionMiddleware::class)->setName('EmployeeSalaryAdd-employee_salary-add'); // add
    $app->any('/EmployeeSalaryView[/{id}]', EmployeeSalaryController::class . ':view')->add(PermissionMiddleware::class)->setName('EmployeeSalaryView-employee_salary-view'); // view
    $app->any('/EmployeeSalaryEdit[/{id}]', EmployeeSalaryController::class . ':edit')->add(PermissionMiddleware::class)->setName('EmployeeSalaryEdit-employee_salary-edit'); // edit
    $app->any('/EmployeeSalaryDelete[/{id}]', EmployeeSalaryController::class . ':delete')->add(PermissionMiddleware::class)->setName('EmployeeSalaryDelete-employee_salary-delete'); // delete
    $app->group(
        '/employee_salary',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', EmployeeSalaryController::class . ':list')->add(PermissionMiddleware::class)->setName('employee_salary/list-employee_salary-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', EmployeeSalaryController::class . ':add')->add(PermissionMiddleware::class)->setName('employee_salary/add-employee_salary-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', EmployeeSalaryController::class . ':view')->add(PermissionMiddleware::class)->setName('employee_salary/view-employee_salary-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', EmployeeSalaryController::class . ':edit')->add(PermissionMiddleware::class)->setName('employee_salary/edit-employee_salary-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', EmployeeSalaryController::class . ':delete')->add(PermissionMiddleware::class)->setName('employee_salary/delete-employee_salary-delete-2'); // delete
        }
    );

    // employee_skills
    $app->any('/EmployeeSkillsList[/{id}]', EmployeeSkillsController::class . ':list')->add(PermissionMiddleware::class)->setName('EmployeeSkillsList-employee_skills-list'); // list
    $app->any('/EmployeeSkillsAdd[/{id}]', EmployeeSkillsController::class . ':add')->add(PermissionMiddleware::class)->setName('EmployeeSkillsAdd-employee_skills-add'); // add
    $app->any('/EmployeeSkillsView[/{id}]', EmployeeSkillsController::class . ':view')->add(PermissionMiddleware::class)->setName('EmployeeSkillsView-employee_skills-view'); // view
    $app->any('/EmployeeSkillsEdit[/{id}]', EmployeeSkillsController::class . ':edit')->add(PermissionMiddleware::class)->setName('EmployeeSkillsEdit-employee_skills-edit'); // edit
    $app->any('/EmployeeSkillsDelete[/{id}]', EmployeeSkillsController::class . ':delete')->add(PermissionMiddleware::class)->setName('EmployeeSkillsDelete-employee_skills-delete'); // delete
    $app->group(
        '/employee_skills',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', EmployeeSkillsController::class . ':list')->add(PermissionMiddleware::class)->setName('employee_skills/list-employee_skills-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', EmployeeSkillsController::class . ':add')->add(PermissionMiddleware::class)->setName('employee_skills/add-employee_skills-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', EmployeeSkillsController::class . ':view')->add(PermissionMiddleware::class)->setName('employee_skills/view-employee_skills-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', EmployeeSkillsController::class . ':edit')->add(PermissionMiddleware::class)->setName('employee_skills/edit-employee_skills-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', EmployeeSkillsController::class . ':delete')->add(PermissionMiddleware::class)->setName('employee_skills/delete-employee_skills-delete-2'); // delete
        }
    );

    // employee_timeentry
    $app->any('/EmployeeTimeentryList[/{id}]', EmployeeTimeentryController::class . ':list')->add(PermissionMiddleware::class)->setName('EmployeeTimeentryList-employee_timeentry-list'); // list
    $app->any('/EmployeeTimeentryAdd[/{id}]', EmployeeTimeentryController::class . ':add')->add(PermissionMiddleware::class)->setName('EmployeeTimeentryAdd-employee_timeentry-add'); // add
    $app->any('/EmployeeTimeentryView[/{id}]', EmployeeTimeentryController::class . ':view')->add(PermissionMiddleware::class)->setName('EmployeeTimeentryView-employee_timeentry-view'); // view
    $app->any('/EmployeeTimeentryEdit[/{id}]', EmployeeTimeentryController::class . ':edit')->add(PermissionMiddleware::class)->setName('EmployeeTimeentryEdit-employee_timeentry-edit'); // edit
    $app->any('/EmployeeTimeentryDelete[/{id}]', EmployeeTimeentryController::class . ':delete')->add(PermissionMiddleware::class)->setName('EmployeeTimeentryDelete-employee_timeentry-delete'); // delete
    $app->group(
        '/employee_timeentry',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', EmployeeTimeentryController::class . ':list')->add(PermissionMiddleware::class)->setName('employee_timeentry/list-employee_timeentry-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', EmployeeTimeentryController::class . ':add')->add(PermissionMiddleware::class)->setName('employee_timeentry/add-employee_timeentry-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', EmployeeTimeentryController::class . ':view')->add(PermissionMiddleware::class)->setName('employee_timeentry/view-employee_timeentry-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', EmployeeTimeentryController::class . ':edit')->add(PermissionMiddleware::class)->setName('employee_timeentry/edit-employee_timeentry-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', EmployeeTimeentryController::class . ':delete')->add(PermissionMiddleware::class)->setName('employee_timeentry/delete-employee_timeentry-delete-2'); // delete
        }
    );

    // employee_timesheets
    $app->any('/EmployeeTimesheetsList[/{id}]', EmployeeTimesheetsController::class . ':list')->add(PermissionMiddleware::class)->setName('EmployeeTimesheetsList-employee_timesheets-list'); // list
    $app->any('/EmployeeTimesheetsAdd[/{id}]', EmployeeTimesheetsController::class . ':add')->add(PermissionMiddleware::class)->setName('EmployeeTimesheetsAdd-employee_timesheets-add'); // add
    $app->any('/EmployeeTimesheetsView[/{id}]', EmployeeTimesheetsController::class . ':view')->add(PermissionMiddleware::class)->setName('EmployeeTimesheetsView-employee_timesheets-view'); // view
    $app->any('/EmployeeTimesheetsEdit[/{id}]', EmployeeTimesheetsController::class . ':edit')->add(PermissionMiddleware::class)->setName('EmployeeTimesheetsEdit-employee_timesheets-edit'); // edit
    $app->any('/EmployeeTimesheetsDelete[/{id}]', EmployeeTimesheetsController::class . ':delete')->add(PermissionMiddleware::class)->setName('EmployeeTimesheetsDelete-employee_timesheets-delete'); // delete
    $app->group(
        '/employee_timesheets',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', EmployeeTimesheetsController::class . ':list')->add(PermissionMiddleware::class)->setName('employee_timesheets/list-employee_timesheets-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', EmployeeTimesheetsController::class . ':add')->add(PermissionMiddleware::class)->setName('employee_timesheets/add-employee_timesheets-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', EmployeeTimesheetsController::class . ':view')->add(PermissionMiddleware::class)->setName('employee_timesheets/view-employee_timesheets-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', EmployeeTimesheetsController::class . ':edit')->add(PermissionMiddleware::class)->setName('employee_timesheets/edit-employee_timesheets-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', EmployeeTimesheetsController::class . ':delete')->add(PermissionMiddleware::class)->setName('employee_timesheets/delete-employee_timesheets-delete-2'); // delete
        }
    );

    // employee_travel_records
    $app->any('/EmployeeTravelRecordsList[/{id}]', EmployeeTravelRecordsController::class . ':list')->add(PermissionMiddleware::class)->setName('EmployeeTravelRecordsList-employee_travel_records-list'); // list
    $app->any('/EmployeeTravelRecordsAdd[/{id}]', EmployeeTravelRecordsController::class . ':add')->add(PermissionMiddleware::class)->setName('EmployeeTravelRecordsAdd-employee_travel_records-add'); // add
    $app->any('/EmployeeTravelRecordsView[/{id}]', EmployeeTravelRecordsController::class . ':view')->add(PermissionMiddleware::class)->setName('EmployeeTravelRecordsView-employee_travel_records-view'); // view
    $app->any('/EmployeeTravelRecordsEdit[/{id}]', EmployeeTravelRecordsController::class . ':edit')->add(PermissionMiddleware::class)->setName('EmployeeTravelRecordsEdit-employee_travel_records-edit'); // edit
    $app->any('/EmployeeTravelRecordsDelete[/{id}]', EmployeeTravelRecordsController::class . ':delete')->add(PermissionMiddleware::class)->setName('EmployeeTravelRecordsDelete-employee_travel_records-delete'); // delete
    $app->group(
        '/employee_travel_records',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', EmployeeTravelRecordsController::class . ':list')->add(PermissionMiddleware::class)->setName('employee_travel_records/list-employee_travel_records-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', EmployeeTravelRecordsController::class . ':add')->add(PermissionMiddleware::class)->setName('employee_travel_records/add-employee_travel_records-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', EmployeeTravelRecordsController::class . ':view')->add(PermissionMiddleware::class)->setName('employee_travel_records/view-employee_travel_records-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', EmployeeTravelRecordsController::class . ':edit')->add(PermissionMiddleware::class)->setName('employee_travel_records/edit-employee_travel_records-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', EmployeeTravelRecordsController::class . ':delete')->add(PermissionMiddleware::class)->setName('employee_travel_records/delete-employee_travel_records-delete-2'); // delete
        }
    );

    // employees_archived
    $app->any('/EmployeesArchivedList[/{id}]', EmployeesArchivedController::class . ':list')->add(PermissionMiddleware::class)->setName('EmployeesArchivedList-employees_archived-list'); // list
    $app->any('/EmployeesArchivedAdd[/{id}]', EmployeesArchivedController::class . ':add')->add(PermissionMiddleware::class)->setName('EmployeesArchivedAdd-employees_archived-add'); // add
    $app->any('/EmployeesArchivedView[/{id}]', EmployeesArchivedController::class . ':view')->add(PermissionMiddleware::class)->setName('EmployeesArchivedView-employees_archived-view'); // view
    $app->any('/EmployeesArchivedEdit[/{id}]', EmployeesArchivedController::class . ':edit')->add(PermissionMiddleware::class)->setName('EmployeesArchivedEdit-employees_archived-edit'); // edit
    $app->any('/EmployeesArchivedDelete[/{id}]', EmployeesArchivedController::class . ':delete')->add(PermissionMiddleware::class)->setName('EmployeesArchivedDelete-employees_archived-delete'); // delete
    $app->group(
        '/employees_archived',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', EmployeesArchivedController::class . ':list')->add(PermissionMiddleware::class)->setName('employees_archived/list-employees_archived-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', EmployeesArchivedController::class . ':add')->add(PermissionMiddleware::class)->setName('employees_archived/add-employees_archived-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', EmployeesArchivedController::class . ':view')->add(PermissionMiddleware::class)->setName('employees_archived/view-employees_archived-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', EmployeesArchivedController::class . ':edit')->add(PermissionMiddleware::class)->setName('employees_archived/edit-employees_archived-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', EmployeesArchivedController::class . ':delete')->add(PermissionMiddleware::class)->setName('employees_archived/delete-employees_archived-delete-2'); // delete
        }
    );

    // employees_payroll
    $app->any('/EmployeesPayrollList[/{id}]', EmployeesPayrollController::class . ':list')->add(PermissionMiddleware::class)->setName('EmployeesPayrollList-employees_payroll-list'); // list
    $app->any('/EmployeesPayrollAdd[/{id}]', EmployeesPayrollController::class . ':add')->add(PermissionMiddleware::class)->setName('EmployeesPayrollAdd-employees_payroll-add'); // add
    $app->any('/EmployeesPayrollView[/{id}]', EmployeesPayrollController::class . ':view')->add(PermissionMiddleware::class)->setName('EmployeesPayrollView-employees_payroll-view'); // view
    $app->any('/EmployeesPayrollEdit[/{id}]', EmployeesPayrollController::class . ':edit')->add(PermissionMiddleware::class)->setName('EmployeesPayrollEdit-employees_payroll-edit'); // edit
    $app->any('/EmployeesPayrollDelete[/{id}]', EmployeesPayrollController::class . ':delete')->add(PermissionMiddleware::class)->setName('EmployeesPayrollDelete-employees_payroll-delete'); // delete
    $app->group(
        '/employees_payroll',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', EmployeesPayrollController::class . ':list')->add(PermissionMiddleware::class)->setName('employees_payroll/list-employees_payroll-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', EmployeesPayrollController::class . ':add')->add(PermissionMiddleware::class)->setName('employees_payroll/add-employees_payroll-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', EmployeesPayrollController::class . ':view')->add(PermissionMiddleware::class)->setName('employees_payroll/view-employees_payroll-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', EmployeesPayrollController::class . ':edit')->add(PermissionMiddleware::class)->setName('employees_payroll/edit-employees_payroll-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', EmployeesPayrollController::class . ':delete')->add(PermissionMiddleware::class)->setName('employees_payroll/delete-employees_payroll-delete-2'); // delete
        }
    );

    // employeetrainingsessions
    $app->any('/EmployeetrainingsessionsList[/{id}]', EmployeetrainingsessionsController::class . ':list')->add(PermissionMiddleware::class)->setName('EmployeetrainingsessionsList-employeetrainingsessions-list'); // list
    $app->any('/EmployeetrainingsessionsAdd[/{id}]', EmployeetrainingsessionsController::class . ':add')->add(PermissionMiddleware::class)->setName('EmployeetrainingsessionsAdd-employeetrainingsessions-add'); // add
    $app->any('/EmployeetrainingsessionsView[/{id}]', EmployeetrainingsessionsController::class . ':view')->add(PermissionMiddleware::class)->setName('EmployeetrainingsessionsView-employeetrainingsessions-view'); // view
    $app->any('/EmployeetrainingsessionsEdit[/{id}]', EmployeetrainingsessionsController::class . ':edit')->add(PermissionMiddleware::class)->setName('EmployeetrainingsessionsEdit-employeetrainingsessions-edit'); // edit
    $app->any('/EmployeetrainingsessionsDelete[/{id}]', EmployeetrainingsessionsController::class . ':delete')->add(PermissionMiddleware::class)->setName('EmployeetrainingsessionsDelete-employeetrainingsessions-delete'); // delete
    $app->group(
        '/employeetrainingsessions',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', EmployeetrainingsessionsController::class . ':list')->add(PermissionMiddleware::class)->setName('employeetrainingsessions/list-employeetrainingsessions-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', EmployeetrainingsessionsController::class . ':add')->add(PermissionMiddleware::class)->setName('employeetrainingsessions/add-employeetrainingsessions-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', EmployeetrainingsessionsController::class . ':view')->add(PermissionMiddleware::class)->setName('employeetrainingsessions/view-employeetrainingsessions-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', EmployeetrainingsessionsController::class . ':edit')->add(PermissionMiddleware::class)->setName('employeetrainingsessions/edit-employeetrainingsessions-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', EmployeetrainingsessionsController::class . ':delete')->add(PermissionMiddleware::class)->setName('employeetrainingsessions/delete-employeetrainingsessions-delete-2'); // delete
        }
    );

    // hr_courses
    $app->any('/HrCoursesList[/{id}]', HrCoursesController::class . ':list')->add(PermissionMiddleware::class)->setName('HrCoursesList-hr_courses-list'); // list
    $app->any('/HrCoursesAdd[/{id}]', HrCoursesController::class . ':add')->add(PermissionMiddleware::class)->setName('HrCoursesAdd-hr_courses-add'); // add
    $app->any('/HrCoursesView[/{id}]', HrCoursesController::class . ':view')->add(PermissionMiddleware::class)->setName('HrCoursesView-hr_courses-view'); // view
    $app->any('/HrCoursesEdit[/{id}]', HrCoursesController::class . ':edit')->add(PermissionMiddleware::class)->setName('HrCoursesEdit-hr_courses-edit'); // edit
    $app->any('/HrCoursesDelete[/{id}]', HrCoursesController::class . ':delete')->add(PermissionMiddleware::class)->setName('HrCoursesDelete-hr_courses-delete'); // delete
    $app->group(
        '/hr_courses',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', HrCoursesController::class . ':list')->add(PermissionMiddleware::class)->setName('hr_courses/list-hr_courses-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', HrCoursesController::class . ':add')->add(PermissionMiddleware::class)->setName('hr_courses/add-hr_courses-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', HrCoursesController::class . ':view')->add(PermissionMiddleware::class)->setName('hr_courses/view-hr_courses-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', HrCoursesController::class . ':edit')->add(PermissionMiddleware::class)->setName('hr_courses/edit-hr_courses-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', HrCoursesController::class . ':delete')->add(PermissionMiddleware::class)->setName('hr_courses/delete-hr_courses-delete-2'); // delete
        }
    );

    // hr_trainingsessions
    $app->any('/HrTrainingsessionsList[/{id}]', HrTrainingsessionsController::class . ':list')->add(PermissionMiddleware::class)->setName('HrTrainingsessionsList-hr_trainingsessions-list'); // list
    $app->any('/HrTrainingsessionsAdd[/{id}]', HrTrainingsessionsController::class . ':add')->add(PermissionMiddleware::class)->setName('HrTrainingsessionsAdd-hr_trainingsessions-add'); // add
    $app->any('/HrTrainingsessionsView[/{id}]', HrTrainingsessionsController::class . ':view')->add(PermissionMiddleware::class)->setName('HrTrainingsessionsView-hr_trainingsessions-view'); // view
    $app->any('/HrTrainingsessionsEdit[/{id}]', HrTrainingsessionsController::class . ':edit')->add(PermissionMiddleware::class)->setName('HrTrainingsessionsEdit-hr_trainingsessions-edit'); // edit
    $app->any('/HrTrainingsessionsDelete[/{id}]', HrTrainingsessionsController::class . ':delete')->add(PermissionMiddleware::class)->setName('HrTrainingsessionsDelete-hr_trainingsessions-delete'); // delete
    $app->group(
        '/hr_trainingsessions',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', HrTrainingsessionsController::class . ':list')->add(PermissionMiddleware::class)->setName('hr_trainingsessions/list-hr_trainingsessions-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', HrTrainingsessionsController::class . ':add')->add(PermissionMiddleware::class)->setName('hr_trainingsessions/add-hr_trainingsessions-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', HrTrainingsessionsController::class . ':view')->add(PermissionMiddleware::class)->setName('hr_trainingsessions/view-hr_trainingsessions-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', HrTrainingsessionsController::class . ':edit')->add(PermissionMiddleware::class)->setName('hr_trainingsessions/edit-hr_trainingsessions-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', HrTrainingsessionsController::class . ':delete')->add(PermissionMiddleware::class)->setName('hr_trainingsessions/delete-hr_trainingsessions-delete-2'); // delete
        }
    );

    // payroll_deductiongroup
    $app->any('/PayrollDeductiongroupList[/{id}]', PayrollDeductiongroupController::class . ':list')->add(PermissionMiddleware::class)->setName('PayrollDeductiongroupList-payroll_deductiongroup-list'); // list
    $app->any('/PayrollDeductiongroupAdd[/{id}]', PayrollDeductiongroupController::class . ':add')->add(PermissionMiddleware::class)->setName('PayrollDeductiongroupAdd-payroll_deductiongroup-add'); // add
    $app->any('/PayrollDeductiongroupView[/{id}]', PayrollDeductiongroupController::class . ':view')->add(PermissionMiddleware::class)->setName('PayrollDeductiongroupView-payroll_deductiongroup-view'); // view
    $app->any('/PayrollDeductiongroupEdit[/{id}]', PayrollDeductiongroupController::class . ':edit')->add(PermissionMiddleware::class)->setName('PayrollDeductiongroupEdit-payroll_deductiongroup-edit'); // edit
    $app->any('/PayrollDeductiongroupDelete[/{id}]', PayrollDeductiongroupController::class . ':delete')->add(PermissionMiddleware::class)->setName('PayrollDeductiongroupDelete-payroll_deductiongroup-delete'); // delete
    $app->group(
        '/payroll_deductiongroup',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', PayrollDeductiongroupController::class . ':list')->add(PermissionMiddleware::class)->setName('payroll_deductiongroup/list-payroll_deductiongroup-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', PayrollDeductiongroupController::class . ':add')->add(PermissionMiddleware::class)->setName('payroll_deductiongroup/add-payroll_deductiongroup-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', PayrollDeductiongroupController::class . ':view')->add(PermissionMiddleware::class)->setName('payroll_deductiongroup/view-payroll_deductiongroup-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', PayrollDeductiongroupController::class . ':edit')->add(PermissionMiddleware::class)->setName('payroll_deductiongroup/edit-payroll_deductiongroup-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', PayrollDeductiongroupController::class . ':delete')->add(PermissionMiddleware::class)->setName('payroll_deductiongroup/delete-payroll_deductiongroup-delete-2'); // delete
        }
    );

    // payroll_overtimecategories
    $app->any('/PayrollOvertimecategoriesList[/{id}]', PayrollOvertimecategoriesController::class . ':list')->add(PermissionMiddleware::class)->setName('PayrollOvertimecategoriesList-payroll_overtimecategories-list'); // list
    $app->any('/PayrollOvertimecategoriesAdd[/{id}]', PayrollOvertimecategoriesController::class . ':add')->add(PermissionMiddleware::class)->setName('PayrollOvertimecategoriesAdd-payroll_overtimecategories-add'); // add
    $app->any('/PayrollOvertimecategoriesView[/{id}]', PayrollOvertimecategoriesController::class . ':view')->add(PermissionMiddleware::class)->setName('PayrollOvertimecategoriesView-payroll_overtimecategories-view'); // view
    $app->any('/PayrollOvertimecategoriesEdit[/{id}]', PayrollOvertimecategoriesController::class . ':edit')->add(PermissionMiddleware::class)->setName('PayrollOvertimecategoriesEdit-payroll_overtimecategories-edit'); // edit
    $app->any('/PayrollOvertimecategoriesDelete[/{id}]', PayrollOvertimecategoriesController::class . ':delete')->add(PermissionMiddleware::class)->setName('PayrollOvertimecategoriesDelete-payroll_overtimecategories-delete'); // delete
    $app->group(
        '/payroll_overtimecategories',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', PayrollOvertimecategoriesController::class . ':list')->add(PermissionMiddleware::class)->setName('payroll_overtimecategories/list-payroll_overtimecategories-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', PayrollOvertimecategoriesController::class . ':add')->add(PermissionMiddleware::class)->setName('payroll_overtimecategories/add-payroll_overtimecategories-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', PayrollOvertimecategoriesController::class . ':view')->add(PermissionMiddleware::class)->setName('payroll_overtimecategories/view-payroll_overtimecategories-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', PayrollOvertimecategoriesController::class . ':edit')->add(PermissionMiddleware::class)->setName('payroll_overtimecategories/edit-payroll_overtimecategories-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', PayrollOvertimecategoriesController::class . ':delete')->add(PermissionMiddleware::class)->setName('payroll_overtimecategories/delete-payroll_overtimecategories-delete-2'); // delete
        }
    );

    // recruitment_applications
    $app->any('/RecruitmentApplicationsList[/{id}]', RecruitmentApplicationsController::class . ':list')->add(PermissionMiddleware::class)->setName('RecruitmentApplicationsList-recruitment_applications-list'); // list
    $app->any('/RecruitmentApplicationsAdd[/{id}]', RecruitmentApplicationsController::class . ':add')->add(PermissionMiddleware::class)->setName('RecruitmentApplicationsAdd-recruitment_applications-add'); // add
    $app->any('/RecruitmentApplicationsView[/{id}]', RecruitmentApplicationsController::class . ':view')->add(PermissionMiddleware::class)->setName('RecruitmentApplicationsView-recruitment_applications-view'); // view
    $app->any('/RecruitmentApplicationsEdit[/{id}]', RecruitmentApplicationsController::class . ':edit')->add(PermissionMiddleware::class)->setName('RecruitmentApplicationsEdit-recruitment_applications-edit'); // edit
    $app->any('/RecruitmentApplicationsDelete[/{id}]', RecruitmentApplicationsController::class . ':delete')->add(PermissionMiddleware::class)->setName('RecruitmentApplicationsDelete-recruitment_applications-delete'); // delete
    $app->group(
        '/recruitment_applications',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', RecruitmentApplicationsController::class . ':list')->add(PermissionMiddleware::class)->setName('recruitment_applications/list-recruitment_applications-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', RecruitmentApplicationsController::class . ':add')->add(PermissionMiddleware::class)->setName('recruitment_applications/add-recruitment_applications-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', RecruitmentApplicationsController::class . ':view')->add(PermissionMiddleware::class)->setName('recruitment_applications/view-recruitment_applications-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', RecruitmentApplicationsController::class . ':edit')->add(PermissionMiddleware::class)->setName('recruitment_applications/edit-recruitment_applications-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', RecruitmentApplicationsController::class . ':delete')->add(PermissionMiddleware::class)->setName('recruitment_applications/delete-recruitment_applications-delete-2'); // delete
        }
    );

    // recruitment_calls
    $app->any('/RecruitmentCallsList[/{id}]', RecruitmentCallsController::class . ':list')->add(PermissionMiddleware::class)->setName('RecruitmentCallsList-recruitment_calls-list'); // list
    $app->any('/RecruitmentCallsAdd[/{id}]', RecruitmentCallsController::class . ':add')->add(PermissionMiddleware::class)->setName('RecruitmentCallsAdd-recruitment_calls-add'); // add
    $app->any('/RecruitmentCallsView[/{id}]', RecruitmentCallsController::class . ':view')->add(PermissionMiddleware::class)->setName('RecruitmentCallsView-recruitment_calls-view'); // view
    $app->any('/RecruitmentCallsEdit[/{id}]', RecruitmentCallsController::class . ':edit')->add(PermissionMiddleware::class)->setName('RecruitmentCallsEdit-recruitment_calls-edit'); // edit
    $app->any('/RecruitmentCallsDelete[/{id}]', RecruitmentCallsController::class . ':delete')->add(PermissionMiddleware::class)->setName('RecruitmentCallsDelete-recruitment_calls-delete'); // delete
    $app->group(
        '/recruitment_calls',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', RecruitmentCallsController::class . ':list')->add(PermissionMiddleware::class)->setName('recruitment_calls/list-recruitment_calls-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', RecruitmentCallsController::class . ':add')->add(PermissionMiddleware::class)->setName('recruitment_calls/add-recruitment_calls-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', RecruitmentCallsController::class . ':view')->add(PermissionMiddleware::class)->setName('recruitment_calls/view-recruitment_calls-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', RecruitmentCallsController::class . ':edit')->add(PermissionMiddleware::class)->setName('recruitment_calls/edit-recruitment_calls-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', RecruitmentCallsController::class . ':delete')->add(PermissionMiddleware::class)->setName('recruitment_calls/delete-recruitment_calls-delete-2'); // delete
        }
    );

    // recruitment_candidates
    $app->any('/RecruitmentCandidatesList[/{id}]', RecruitmentCandidatesController::class . ':list')->add(PermissionMiddleware::class)->setName('RecruitmentCandidatesList-recruitment_candidates-list'); // list
    $app->any('/RecruitmentCandidatesAdd[/{id}]', RecruitmentCandidatesController::class . ':add')->add(PermissionMiddleware::class)->setName('RecruitmentCandidatesAdd-recruitment_candidates-add'); // add
    $app->any('/RecruitmentCandidatesView[/{id}]', RecruitmentCandidatesController::class . ':view')->add(PermissionMiddleware::class)->setName('RecruitmentCandidatesView-recruitment_candidates-view'); // view
    $app->any('/RecruitmentCandidatesEdit[/{id}]', RecruitmentCandidatesController::class . ':edit')->add(PermissionMiddleware::class)->setName('RecruitmentCandidatesEdit-recruitment_candidates-edit'); // edit
    $app->any('/RecruitmentCandidatesDelete[/{id}]', RecruitmentCandidatesController::class . ':delete')->add(PermissionMiddleware::class)->setName('RecruitmentCandidatesDelete-recruitment_candidates-delete'); // delete
    $app->group(
        '/recruitment_candidates',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', RecruitmentCandidatesController::class . ':list')->add(PermissionMiddleware::class)->setName('recruitment_candidates/list-recruitment_candidates-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', RecruitmentCandidatesController::class . ':add')->add(PermissionMiddleware::class)->setName('recruitment_candidates/add-recruitment_candidates-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', RecruitmentCandidatesController::class . ':view')->add(PermissionMiddleware::class)->setName('recruitment_candidates/view-recruitment_candidates-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', RecruitmentCandidatesController::class . ':edit')->add(PermissionMiddleware::class)->setName('recruitment_candidates/edit-recruitment_candidates-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', RecruitmentCandidatesController::class . ':delete')->add(PermissionMiddleware::class)->setName('recruitment_candidates/delete-recruitment_candidates-delete-2'); // delete
        }
    );

    // recruitment_interviews
    $app->any('/RecruitmentInterviewsList[/{id}]', RecruitmentInterviewsController::class . ':list')->add(PermissionMiddleware::class)->setName('RecruitmentInterviewsList-recruitment_interviews-list'); // list
    $app->any('/RecruitmentInterviewsAdd[/{id}]', RecruitmentInterviewsController::class . ':add')->add(PermissionMiddleware::class)->setName('RecruitmentInterviewsAdd-recruitment_interviews-add'); // add
    $app->any('/RecruitmentInterviewsView[/{id}]', RecruitmentInterviewsController::class . ':view')->add(PermissionMiddleware::class)->setName('RecruitmentInterviewsView-recruitment_interviews-view'); // view
    $app->any('/RecruitmentInterviewsEdit[/{id}]', RecruitmentInterviewsController::class . ':edit')->add(PermissionMiddleware::class)->setName('RecruitmentInterviewsEdit-recruitment_interviews-edit'); // edit
    $app->any('/RecruitmentInterviewsDelete[/{id}]', RecruitmentInterviewsController::class . ':delete')->add(PermissionMiddleware::class)->setName('RecruitmentInterviewsDelete-recruitment_interviews-delete'); // delete
    $app->group(
        '/recruitment_interviews',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', RecruitmentInterviewsController::class . ':list')->add(PermissionMiddleware::class)->setName('recruitment_interviews/list-recruitment_interviews-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', RecruitmentInterviewsController::class . ':add')->add(PermissionMiddleware::class)->setName('recruitment_interviews/add-recruitment_interviews-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', RecruitmentInterviewsController::class . ':view')->add(PermissionMiddleware::class)->setName('recruitment_interviews/view-recruitment_interviews-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', RecruitmentInterviewsController::class . ':edit')->add(PermissionMiddleware::class)->setName('recruitment_interviews/edit-recruitment_interviews-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', RecruitmentInterviewsController::class . ':delete')->add(PermissionMiddleware::class)->setName('recruitment_interviews/delete-recruitment_interviews-delete-2'); // delete
        }
    );

    // recruitment_job
    $app->any('/RecruitmentJobList[/{id}]', RecruitmentJobController::class . ':list')->add(PermissionMiddleware::class)->setName('RecruitmentJobList-recruitment_job-list'); // list
    $app->any('/RecruitmentJobAdd[/{id}]', RecruitmentJobController::class . ':add')->add(PermissionMiddleware::class)->setName('RecruitmentJobAdd-recruitment_job-add'); // add
    $app->any('/RecruitmentJobView[/{id}]', RecruitmentJobController::class . ':view')->add(PermissionMiddleware::class)->setName('RecruitmentJobView-recruitment_job-view'); // view
    $app->any('/RecruitmentJobEdit[/{id}]', RecruitmentJobController::class . ':edit')->add(PermissionMiddleware::class)->setName('RecruitmentJobEdit-recruitment_job-edit'); // edit
    $app->any('/RecruitmentJobDelete[/{id}]', RecruitmentJobController::class . ':delete')->add(PermissionMiddleware::class)->setName('RecruitmentJobDelete-recruitment_job-delete'); // delete
    $app->group(
        '/recruitment_job',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', RecruitmentJobController::class . ':list')->add(PermissionMiddleware::class)->setName('recruitment_job/list-recruitment_job-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', RecruitmentJobController::class . ':add')->add(PermissionMiddleware::class)->setName('recruitment_job/add-recruitment_job-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', RecruitmentJobController::class . ':view')->add(PermissionMiddleware::class)->setName('recruitment_job/view-recruitment_job-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', RecruitmentJobController::class . ':edit')->add(PermissionMiddleware::class)->setName('recruitment_job/edit-recruitment_job-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', RecruitmentJobController::class . ':delete')->add(PermissionMiddleware::class)->setName('recruitment_job/delete-recruitment_job-delete-2'); // delete
        }
    );

    // welcome
    $app->any('/Welcome[/{params:.*}]', WelcomeController::class)->add(PermissionMiddleware::class)->setName('Welcome-welcome-custom'); // custom

    // pharmacy_stock_movement
    $app->any('/PharmacyStockMovementList[/{id}]', PharmacyStockMovementController::class . ':list')->add(PermissionMiddleware::class)->setName('PharmacyStockMovementList-pharmacy_stock_movement-list'); // list
    $app->any('/PharmacyStockMovementAdd[/{id}]', PharmacyStockMovementController::class . ':add')->add(PermissionMiddleware::class)->setName('PharmacyStockMovementAdd-pharmacy_stock_movement-add'); // add
    $app->any('/PharmacyStockMovementView[/{id}]', PharmacyStockMovementController::class . ':view')->add(PermissionMiddleware::class)->setName('PharmacyStockMovementView-pharmacy_stock_movement-view'); // view
    $app->any('/PharmacyStockMovementEdit[/{id}]', PharmacyStockMovementController::class . ':edit')->add(PermissionMiddleware::class)->setName('PharmacyStockMovementEdit-pharmacy_stock_movement-edit'); // edit
    $app->any('/PharmacyStockMovementDelete[/{id}]', PharmacyStockMovementController::class . ':delete')->add(PermissionMiddleware::class)->setName('PharmacyStockMovementDelete-pharmacy_stock_movement-delete'); // delete
    $app->group(
        '/pharmacy_stock_movement',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', PharmacyStockMovementController::class . ':list')->add(PermissionMiddleware::class)->setName('pharmacy_stock_movement/list-pharmacy_stock_movement-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', PharmacyStockMovementController::class . ':add')->add(PermissionMiddleware::class)->setName('pharmacy_stock_movement/add-pharmacy_stock_movement-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', PharmacyStockMovementController::class . ':view')->add(PermissionMiddleware::class)->setName('pharmacy_stock_movement/view-pharmacy_stock_movement-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', PharmacyStockMovementController::class . ':edit')->add(PermissionMiddleware::class)->setName('pharmacy_stock_movement/edit-pharmacy_stock_movement-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', PharmacyStockMovementController::class . ':delete')->add(PermissionMiddleware::class)->setName('pharmacy_stock_movement/delete-pharmacy_stock_movement-delete-2'); // delete
        }
    );

    // report_revenue
    $app->any('/ReportRevenueList[/{id}]', ReportRevenueController::class . ':list')->add(PermissionMiddleware::class)->setName('ReportRevenueList-report_revenue-list'); // list
    $app->any('/ReportRevenueView[/{id}]', ReportRevenueController::class . ':view')->add(PermissionMiddleware::class)->setName('ReportRevenueView-report_revenue-view'); // view
    $app->group(
        '/report_revenue',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', ReportRevenueController::class . ':list')->add(PermissionMiddleware::class)->setName('report_revenue/list-report_revenue-list-2'); // list
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', ReportRevenueController::class . ':view')->add(PermissionMiddleware::class)->setName('report_revenue/view-report_revenue-view-2'); // view
        }
    );

    // view_report_revenue
    $app->any('/ViewReportRevenueList', ViewReportRevenueController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewReportRevenueList-view_report_revenue-list'); // list
    $app->group(
        '/view_report_revenue',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '', ViewReportRevenueController::class . ':list')->add(PermissionMiddleware::class)->setName('view_report_revenue/list-view_report_revenue-list-2'); // list
        }
    );

    // crm_contactdetails
    $app->any('/CrmContactdetailsList[/{contactid}]', CrmContactdetailsController::class . ':list')->add(PermissionMiddleware::class)->setName('CrmContactdetailsList-crm_contactdetails-list'); // list
    $app->any('/CrmContactdetailsAdd[/{contactid}]', CrmContactdetailsController::class . ':add')->add(PermissionMiddleware::class)->setName('CrmContactdetailsAdd-crm_contactdetails-add'); // add
    $app->any('/CrmContactdetailsView[/{contactid}]', CrmContactdetailsController::class . ':view')->add(PermissionMiddleware::class)->setName('CrmContactdetailsView-crm_contactdetails-view'); // view
    $app->any('/CrmContactdetailsEdit[/{contactid}]', CrmContactdetailsController::class . ':edit')->add(PermissionMiddleware::class)->setName('CrmContactdetailsEdit-crm_contactdetails-edit'); // edit
    $app->any('/CrmContactdetailsDelete[/{contactid}]', CrmContactdetailsController::class . ':delete')->add(PermissionMiddleware::class)->setName('CrmContactdetailsDelete-crm_contactdetails-delete'); // delete
    $app->group(
        '/crm_contactdetails',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{contactid}]', CrmContactdetailsController::class . ':list')->add(PermissionMiddleware::class)->setName('crm_contactdetails/list-crm_contactdetails-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{contactid}]', CrmContactdetailsController::class . ':add')->add(PermissionMiddleware::class)->setName('crm_contactdetails/add-crm_contactdetails-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{contactid}]', CrmContactdetailsController::class . ':view')->add(PermissionMiddleware::class)->setName('crm_contactdetails/view-crm_contactdetails-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{contactid}]', CrmContactdetailsController::class . ':edit')->add(PermissionMiddleware::class)->setName('crm_contactdetails/edit-crm_contactdetails-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{contactid}]', CrmContactdetailsController::class . ':delete')->add(PermissionMiddleware::class)->setName('crm_contactdetails/delete-crm_contactdetails-delete-2'); // delete
        }
    );

    // crm_contactsubdetails
    $app->any('/CrmContactsubdetailsList[/{contactsubscriptionid}]', CrmContactsubdetailsController::class . ':list')->add(PermissionMiddleware::class)->setName('CrmContactsubdetailsList-crm_contactsubdetails-list'); // list
    $app->any('/CrmContactsubdetailsAdd[/{contactsubscriptionid}]', CrmContactsubdetailsController::class . ':add')->add(PermissionMiddleware::class)->setName('CrmContactsubdetailsAdd-crm_contactsubdetails-add'); // add
    $app->any('/CrmContactsubdetailsView[/{contactsubscriptionid}]', CrmContactsubdetailsController::class . ':view')->add(PermissionMiddleware::class)->setName('CrmContactsubdetailsView-crm_contactsubdetails-view'); // view
    $app->any('/CrmContactsubdetailsEdit[/{contactsubscriptionid}]', CrmContactsubdetailsController::class . ':edit')->add(PermissionMiddleware::class)->setName('CrmContactsubdetailsEdit-crm_contactsubdetails-edit'); // edit
    $app->any('/CrmContactsubdetailsDelete[/{contactsubscriptionid}]', CrmContactsubdetailsController::class . ':delete')->add(PermissionMiddleware::class)->setName('CrmContactsubdetailsDelete-crm_contactsubdetails-delete'); // delete
    $app->group(
        '/crm_contactsubdetails',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{contactsubscriptionid}]', CrmContactsubdetailsController::class . ':list')->add(PermissionMiddleware::class)->setName('crm_contactsubdetails/list-crm_contactsubdetails-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{contactsubscriptionid}]', CrmContactsubdetailsController::class . ':add')->add(PermissionMiddleware::class)->setName('crm_contactsubdetails/add-crm_contactsubdetails-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{contactsubscriptionid}]', CrmContactsubdetailsController::class . ':view')->add(PermissionMiddleware::class)->setName('crm_contactsubdetails/view-crm_contactsubdetails-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{contactsubscriptionid}]', CrmContactsubdetailsController::class . ':edit')->add(PermissionMiddleware::class)->setName('crm_contactsubdetails/edit-crm_contactsubdetails-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{contactsubscriptionid}]', CrmContactsubdetailsController::class . ':delete')->add(PermissionMiddleware::class)->setName('crm_contactsubdetails/delete-crm_contactsubdetails-delete-2'); // delete
        }
    );

    // crm_crmentity
    $app->any('/CrmCrmentityList[/{crmid}]', CrmCrmentityController::class . ':list')->add(PermissionMiddleware::class)->setName('CrmCrmentityList-crm_crmentity-list'); // list
    $app->any('/CrmCrmentityAdd[/{crmid}]', CrmCrmentityController::class . ':add')->add(PermissionMiddleware::class)->setName('CrmCrmentityAdd-crm_crmentity-add'); // add
    $app->any('/CrmCrmentityView[/{crmid}]', CrmCrmentityController::class . ':view')->add(PermissionMiddleware::class)->setName('CrmCrmentityView-crm_crmentity-view'); // view
    $app->any('/CrmCrmentityEdit[/{crmid}]', CrmCrmentityController::class . ':edit')->add(PermissionMiddleware::class)->setName('CrmCrmentityEdit-crm_crmentity-edit'); // edit
    $app->any('/CrmCrmentityDelete[/{crmid}]', CrmCrmentityController::class . ':delete')->add(PermissionMiddleware::class)->setName('CrmCrmentityDelete-crm_crmentity-delete'); // delete
    $app->group(
        '/crm_crmentity',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{crmid}]', CrmCrmentityController::class . ':list')->add(PermissionMiddleware::class)->setName('crm_crmentity/list-crm_crmentity-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{crmid}]', CrmCrmentityController::class . ':add')->add(PermissionMiddleware::class)->setName('crm_crmentity/add-crm_crmentity-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{crmid}]', CrmCrmentityController::class . ':view')->add(PermissionMiddleware::class)->setName('crm_crmentity/view-crm_crmentity-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{crmid}]', CrmCrmentityController::class . ':edit')->add(PermissionMiddleware::class)->setName('crm_crmentity/edit-crm_crmentity-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{crmid}]', CrmCrmentityController::class . ':delete')->add(PermissionMiddleware::class)->setName('crm_crmentity/delete-crm_crmentity-delete-2'); // delete
        }
    );

    // crm_leadaddress
    $app->any('/CrmLeadaddressList[/{leadaddressid}]', CrmLeadaddressController::class . ':list')->add(PermissionMiddleware::class)->setName('CrmLeadaddressList-crm_leadaddress-list'); // list
    $app->any('/CrmLeadaddressAdd[/{leadaddressid}]', CrmLeadaddressController::class . ':add')->add(PermissionMiddleware::class)->setName('CrmLeadaddressAdd-crm_leadaddress-add'); // add
    $app->any('/CrmLeadaddressView[/{leadaddressid}]', CrmLeadaddressController::class . ':view')->add(PermissionMiddleware::class)->setName('CrmLeadaddressView-crm_leadaddress-view'); // view
    $app->any('/CrmLeadaddressEdit[/{leadaddressid}]', CrmLeadaddressController::class . ':edit')->add(PermissionMiddleware::class)->setName('CrmLeadaddressEdit-crm_leadaddress-edit'); // edit
    $app->any('/CrmLeadaddressDelete[/{leadaddressid}]', CrmLeadaddressController::class . ':delete')->add(PermissionMiddleware::class)->setName('CrmLeadaddressDelete-crm_leadaddress-delete'); // delete
    $app->group(
        '/crm_leadaddress',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{leadaddressid}]', CrmLeadaddressController::class . ':list')->add(PermissionMiddleware::class)->setName('crm_leadaddress/list-crm_leadaddress-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{leadaddressid}]', CrmLeadaddressController::class . ':add')->add(PermissionMiddleware::class)->setName('crm_leadaddress/add-crm_leadaddress-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{leadaddressid}]', CrmLeadaddressController::class . ':view')->add(PermissionMiddleware::class)->setName('crm_leadaddress/view-crm_leadaddress-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{leadaddressid}]', CrmLeadaddressController::class . ':edit')->add(PermissionMiddleware::class)->setName('crm_leadaddress/edit-crm_leadaddress-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{leadaddressid}]', CrmLeadaddressController::class . ':delete')->add(PermissionMiddleware::class)->setName('crm_leadaddress/delete-crm_leadaddress-delete-2'); // delete
        }
    );

    // crm_leaddetails
    $app->any('/CrmLeaddetailsList[/{leadid}]', CrmLeaddetailsController::class . ':list')->add(PermissionMiddleware::class)->setName('CrmLeaddetailsList-crm_leaddetails-list'); // list
    $app->any('/CrmLeaddetailsAdd[/{leadid}]', CrmLeaddetailsController::class . ':add')->add(PermissionMiddleware::class)->setName('CrmLeaddetailsAdd-crm_leaddetails-add'); // add
    $app->any('/CrmLeaddetailsView[/{leadid}]', CrmLeaddetailsController::class . ':view')->add(PermissionMiddleware::class)->setName('CrmLeaddetailsView-crm_leaddetails-view'); // view
    $app->any('/CrmLeaddetailsEdit[/{leadid}]', CrmLeaddetailsController::class . ':edit')->add(PermissionMiddleware::class)->setName('CrmLeaddetailsEdit-crm_leaddetails-edit'); // edit
    $app->any('/CrmLeaddetailsDelete[/{leadid}]', CrmLeaddetailsController::class . ':delete')->add(PermissionMiddleware::class)->setName('CrmLeaddetailsDelete-crm_leaddetails-delete'); // delete
    $app->group(
        '/crm_leaddetails',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{leadid}]', CrmLeaddetailsController::class . ':list')->add(PermissionMiddleware::class)->setName('crm_leaddetails/list-crm_leaddetails-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{leadid}]', CrmLeaddetailsController::class . ':add')->add(PermissionMiddleware::class)->setName('crm_leaddetails/add-crm_leaddetails-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{leadid}]', CrmLeaddetailsController::class . ':view')->add(PermissionMiddleware::class)->setName('crm_leaddetails/view-crm_leaddetails-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{leadid}]', CrmLeaddetailsController::class . ':edit')->add(PermissionMiddleware::class)->setName('crm_leaddetails/edit-crm_leaddetails-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{leadid}]', CrmLeaddetailsController::class . ':delete')->add(PermissionMiddleware::class)->setName('crm_leaddetails/delete-crm_leaddetails-delete-2'); // delete
        }
    );

    // crm_leads_relation
    $app->any('/CrmLeadsRelationList[/{leads_relationid}]', CrmLeadsRelationController::class . ':list')->add(PermissionMiddleware::class)->setName('CrmLeadsRelationList-crm_leads_relation-list'); // list
    $app->any('/CrmLeadsRelationAdd[/{leads_relationid}]', CrmLeadsRelationController::class . ':add')->add(PermissionMiddleware::class)->setName('CrmLeadsRelationAdd-crm_leads_relation-add'); // add
    $app->any('/CrmLeadsRelationView[/{leads_relationid}]', CrmLeadsRelationController::class . ':view')->add(PermissionMiddleware::class)->setName('CrmLeadsRelationView-crm_leads_relation-view'); // view
    $app->any('/CrmLeadsRelationEdit[/{leads_relationid}]', CrmLeadsRelationController::class . ':edit')->add(PermissionMiddleware::class)->setName('CrmLeadsRelationEdit-crm_leads_relation-edit'); // edit
    $app->any('/CrmLeadsRelationDelete[/{leads_relationid}]', CrmLeadsRelationController::class . ':delete')->add(PermissionMiddleware::class)->setName('CrmLeadsRelationDelete-crm_leads_relation-delete'); // delete
    $app->group(
        '/crm_leads_relation',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{leads_relationid}]', CrmLeadsRelationController::class . ':list')->add(PermissionMiddleware::class)->setName('crm_leads_relation/list-crm_leads_relation-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{leads_relationid}]', CrmLeadsRelationController::class . ':add')->add(PermissionMiddleware::class)->setName('crm_leads_relation/add-crm_leads_relation-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{leads_relationid}]', CrmLeadsRelationController::class . ':view')->add(PermissionMiddleware::class)->setName('crm_leads_relation/view-crm_leads_relation-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{leads_relationid}]', CrmLeadsRelationController::class . ':edit')->add(PermissionMiddleware::class)->setName('crm_leads_relation/edit-crm_leads_relation-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{leads_relationid}]', CrmLeadsRelationController::class . ':delete')->add(PermissionMiddleware::class)->setName('crm_leads_relation/delete-crm_leads_relation-delete-2'); // delete
        }
    );

    // crm_leadsource
    $app->any('/CrmLeadsourceList[/{leadsourceid}]', CrmLeadsourceController::class . ':list')->add(PermissionMiddleware::class)->setName('CrmLeadsourceList-crm_leadsource-list'); // list
    $app->any('/CrmLeadsourceAdd[/{leadsourceid}]', CrmLeadsourceController::class . ':add')->add(PermissionMiddleware::class)->setName('CrmLeadsourceAdd-crm_leadsource-add'); // add
    $app->any('/CrmLeadsourceView[/{leadsourceid}]', CrmLeadsourceController::class . ':view')->add(PermissionMiddleware::class)->setName('CrmLeadsourceView-crm_leadsource-view'); // view
    $app->any('/CrmLeadsourceEdit[/{leadsourceid}]', CrmLeadsourceController::class . ':edit')->add(PermissionMiddleware::class)->setName('CrmLeadsourceEdit-crm_leadsource-edit'); // edit
    $app->any('/CrmLeadsourceDelete[/{leadsourceid}]', CrmLeadsourceController::class . ':delete')->add(PermissionMiddleware::class)->setName('CrmLeadsourceDelete-crm_leadsource-delete'); // delete
    $app->group(
        '/crm_leadsource',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{leadsourceid}]', CrmLeadsourceController::class . ':list')->add(PermissionMiddleware::class)->setName('crm_leadsource/list-crm_leadsource-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{leadsourceid}]', CrmLeadsourceController::class . ':add')->add(PermissionMiddleware::class)->setName('crm_leadsource/add-crm_leadsource-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{leadsourceid}]', CrmLeadsourceController::class . ':view')->add(PermissionMiddleware::class)->setName('crm_leadsource/view-crm_leadsource-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{leadsourceid}]', CrmLeadsourceController::class . ':edit')->add(PermissionMiddleware::class)->setName('crm_leadsource/edit-crm_leadsource-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{leadsourceid}]', CrmLeadsourceController::class . ':delete')->add(PermissionMiddleware::class)->setName('crm_leadsource/delete-crm_leadsource-delete-2'); // delete
        }
    );

    // crm_leadstatus
    $app->any('/CrmLeadstatusList[/{leadstatusid}]', CrmLeadstatusController::class . ':list')->add(PermissionMiddleware::class)->setName('CrmLeadstatusList-crm_leadstatus-list'); // list
    $app->any('/CrmLeadstatusAdd[/{leadstatusid}]', CrmLeadstatusController::class . ':add')->add(PermissionMiddleware::class)->setName('CrmLeadstatusAdd-crm_leadstatus-add'); // add
    $app->any('/CrmLeadstatusView[/{leadstatusid}]', CrmLeadstatusController::class . ':view')->add(PermissionMiddleware::class)->setName('CrmLeadstatusView-crm_leadstatus-view'); // view
    $app->any('/CrmLeadstatusEdit[/{leadstatusid}]', CrmLeadstatusController::class . ':edit')->add(PermissionMiddleware::class)->setName('CrmLeadstatusEdit-crm_leadstatus-edit'); // edit
    $app->any('/CrmLeadstatusDelete[/{leadstatusid}]', CrmLeadstatusController::class . ':delete')->add(PermissionMiddleware::class)->setName('CrmLeadstatusDelete-crm_leadstatus-delete'); // delete
    $app->group(
        '/crm_leadstatus',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{leadstatusid}]', CrmLeadstatusController::class . ':list')->add(PermissionMiddleware::class)->setName('crm_leadstatus/list-crm_leadstatus-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{leadstatusid}]', CrmLeadstatusController::class . ':add')->add(PermissionMiddleware::class)->setName('crm_leadstatus/add-crm_leadstatus-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{leadstatusid}]', CrmLeadstatusController::class . ':view')->add(PermissionMiddleware::class)->setName('crm_leadstatus/view-crm_leadstatus-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{leadstatusid}]', CrmLeadstatusController::class . ':edit')->add(PermissionMiddleware::class)->setName('crm_leadstatus/edit-crm_leadstatus-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{leadstatusid}]', CrmLeadstatusController::class . ':delete')->add(PermissionMiddleware::class)->setName('crm_leadstatus/delete-crm_leadstatus-delete-2'); // delete
        }
    );

    // crm_leadsubdetails
    $app->any('/CrmLeadsubdetailsList[/{leadsubscriptionid}]', CrmLeadsubdetailsController::class . ':list')->add(PermissionMiddleware::class)->setName('CrmLeadsubdetailsList-crm_leadsubdetails-list'); // list
    $app->any('/CrmLeadsubdetailsAdd[/{leadsubscriptionid}]', CrmLeadsubdetailsController::class . ':add')->add(PermissionMiddleware::class)->setName('CrmLeadsubdetailsAdd-crm_leadsubdetails-add'); // add
    $app->any('/CrmLeadsubdetailsView[/{leadsubscriptionid}]', CrmLeadsubdetailsController::class . ':view')->add(PermissionMiddleware::class)->setName('CrmLeadsubdetailsView-crm_leadsubdetails-view'); // view
    $app->any('/CrmLeadsubdetailsEdit[/{leadsubscriptionid}]', CrmLeadsubdetailsController::class . ':edit')->add(PermissionMiddleware::class)->setName('CrmLeadsubdetailsEdit-crm_leadsubdetails-edit'); // edit
    $app->any('/CrmLeadsubdetailsDelete[/{leadsubscriptionid}]', CrmLeadsubdetailsController::class . ':delete')->add(PermissionMiddleware::class)->setName('CrmLeadsubdetailsDelete-crm_leadsubdetails-delete'); // delete
    $app->group(
        '/crm_leadsubdetails',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{leadsubscriptionid}]', CrmLeadsubdetailsController::class . ':list')->add(PermissionMiddleware::class)->setName('crm_leadsubdetails/list-crm_leadsubdetails-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{leadsubscriptionid}]', CrmLeadsubdetailsController::class . ':add')->add(PermissionMiddleware::class)->setName('crm_leadsubdetails/add-crm_leadsubdetails-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{leadsubscriptionid}]', CrmLeadsubdetailsController::class . ':view')->add(PermissionMiddleware::class)->setName('crm_leadsubdetails/view-crm_leadsubdetails-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{leadsubscriptionid}]', CrmLeadsubdetailsController::class . ':edit')->add(PermissionMiddleware::class)->setName('crm_leadsubdetails/edit-crm_leadsubdetails-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{leadsubscriptionid}]', CrmLeadsubdetailsController::class . ':delete')->add(PermissionMiddleware::class)->setName('crm_leadsubdetails/delete-crm_leadsubdetails-delete-2'); // delete
        }
    );

    // view_pharmacy_stock_movement
    $app->any('/ViewPharmacyStockMovementList[/{id}]', ViewPharmacyStockMovementController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewPharmacyStockMovementList-view_pharmacy_stock_movement-list'); // list
    $app->group(
        '/view_pharmacy_stock_movement',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', ViewPharmacyStockMovementController::class . ':list')->add(PermissionMiddleware::class)->setName('view_pharmacy_stock_movement/list-view_pharmacy_stock_movement-list-2'); // list
        }
    );

    // view_pharmacy_stock_movement_sum
    $app->any('/ViewPharmacyStockMovementSumList', ViewPharmacyStockMovementSumController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewPharmacyStockMovementSumList-view_pharmacy_stock_movement_sum-list'); // list
    $app->group(
        '/view_pharmacy_stock_movement_sum',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '', ViewPharmacyStockMovementSumController::class . ':list')->add(PermissionMiddleware::class)->setName('view_pharmacy_stock_movement_sum/list-view_pharmacy_stock_movement_sum-list-2'); // list
        }
    );

    // home
    $app->any('/Home[/{params:.*}]', HomeController::class)->add(PermissionMiddleware::class)->setName('Home-home-custom'); // custom

    // view_pharmacy_report_purchase_value
    $app->any('/ViewPharmacyReportPurchaseValueList', ViewPharmacyReportPurchaseValueController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewPharmacyReportPurchaseValueList-view_pharmacy_report_purchase_value-list'); // list
    $app->group(
        '/view_pharmacy_report_purchase_value',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '', ViewPharmacyReportPurchaseValueController::class . ':list')->add(PermissionMiddleware::class)->setName('view_pharmacy_report_purchase_value/list-view_pharmacy_report_purchase_value-list-2'); // list
        }
    );

    // view_pharmacy_report_search_product
    $app->any('/ViewPharmacyReportSearchProductList[/{id}]', ViewPharmacyReportSearchProductController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewPharmacyReportSearchProductList-view_pharmacy_report_search_product-list'); // list
    $app->group(
        '/view_pharmacy_report_search_product',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', ViewPharmacyReportSearchProductController::class . ':list')->add(PermissionMiddleware::class)->setName('view_pharmacy_report_search_product/list-view_pharmacy_report_search_product-list-2'); // list
        }
    );

    // view_pharmacy_report_stock_value
    $app->any('/ViewPharmacyReportStockValueList', ViewPharmacyReportStockValueController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewPharmacyReportStockValueList-view_pharmacy_report_stock_value-list'); // list
    $app->group(
        '/view_pharmacy_report_stock_value',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '', ViewPharmacyReportStockValueController::class . ':list')->add(PermissionMiddleware::class)->setName('view_pharmacy_report_stock_value/list-view_pharmacy_report_stock_value-list-2'); // list
        }
    );

    // view_pharmacy_report_supplier_ledger
    $app->any('/ViewPharmacyReportSupplierLedgerList', ViewPharmacyReportSupplierLedgerController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewPharmacyReportSupplierLedgerList-view_pharmacy_report_supplier_ledger-list'); // list
    $app->group(
        '/view_pharmacy_report_supplier_ledger',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '', ViewPharmacyReportSupplierLedgerController::class . ':list')->add(PermissionMiddleware::class)->setName('view_pharmacy_report_supplier_ledger/list-view_pharmacy_report_supplier_ledger-list-2'); // list
        }
    );

    // view_pharmacy_report_supplier_wise_outstanding
    $app->any('/ViewPharmacyReportSupplierWiseOutstandingList', ViewPharmacyReportSupplierWiseOutstandingController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewPharmacyReportSupplierWiseOutstandingList-view_pharmacy_report_supplier_wise_outstanding-list'); // list
    $app->group(
        '/view_pharmacy_report_supplier_wise_outstanding',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '', ViewPharmacyReportSupplierWiseOutstandingController::class . ':list')->add(PermissionMiddleware::class)->setName('view_pharmacy_report_supplier_wise_outstanding/list-view_pharmacy_report_supplier_wise_outstanding-list-2'); // list
        }
    );

    // view_pharmacy_report_earning
    $app->any('/ViewPharmacyReportEarningList', ViewPharmacyReportEarningController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewPharmacyReportEarningList-view_pharmacy_report_earning-list'); // list
    $app->group(
        '/view_pharmacy_report_earning',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '', ViewPharmacyReportEarningController::class . ':list')->add(PermissionMiddleware::class)->setName('view_pharmacy_report_earning/list-view_pharmacy_report_earning-list-2'); // list
        }
    );

    // view_pharmacy_gst_report
    $app->any('/ViewPharmacyGstReportList', ViewPharmacyGstReportController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewPharmacyGstReportList-view_pharmacy_gst_report-list'); // list
    $app->group(
        '/view_pharmacy_gst_report',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '', ViewPharmacyGstReportController::class . ':list')->add(PermissionMiddleware::class)->setName('view_pharmacy_gst_report/list-view_pharmacy_gst_report-list-2'); // list
        }
    );

    // store_billing_transfer
    $app->any('/StoreBillingTransferList[/{id}]', StoreBillingTransferController::class . ':list')->add(PermissionMiddleware::class)->setName('StoreBillingTransferList-store_billing_transfer-list'); // list
    $app->any('/StoreBillingTransferAdd[/{id}]', StoreBillingTransferController::class . ':add')->add(PermissionMiddleware::class)->setName('StoreBillingTransferAdd-store_billing_transfer-add'); // add
    $app->any('/StoreBillingTransferView[/{id}]', StoreBillingTransferController::class . ':view')->add(PermissionMiddleware::class)->setName('StoreBillingTransferView-store_billing_transfer-view'); // view
    $app->any('/StoreBillingTransferEdit[/{id}]', StoreBillingTransferController::class . ':edit')->add(PermissionMiddleware::class)->setName('StoreBillingTransferEdit-store_billing_transfer-edit'); // edit
    $app->any('/StoreBillingTransferDelete[/{id}]', StoreBillingTransferController::class . ':delete')->add(PermissionMiddleware::class)->setName('StoreBillingTransferDelete-store_billing_transfer-delete'); // delete
    $app->group(
        '/store_billing_transfer',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', StoreBillingTransferController::class . ':list')->add(PermissionMiddleware::class)->setName('store_billing_transfer/list-store_billing_transfer-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', StoreBillingTransferController::class . ':add')->add(PermissionMiddleware::class)->setName('store_billing_transfer/add-store_billing_transfer-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', StoreBillingTransferController::class . ':view')->add(PermissionMiddleware::class)->setName('store_billing_transfer/view-store_billing_transfer-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', StoreBillingTransferController::class . ':edit')->add(PermissionMiddleware::class)->setName('store_billing_transfer/edit-store_billing_transfer-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', StoreBillingTransferController::class . ':delete')->add(PermissionMiddleware::class)->setName('store_billing_transfer/delete-store_billing_transfer-delete-2'); // delete
        }
    );

    // view_store_transfer
    $app->any('/ViewStoreTransferList[/{id}]', ViewStoreTransferController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewStoreTransferList-view_store_transfer-list'); // list
    $app->any('/ViewStoreTransferAdd[/{id}]', ViewStoreTransferController::class . ':add')->add(PermissionMiddleware::class)->setName('ViewStoreTransferAdd-view_store_transfer-add'); // add
    $app->any('/ViewStoreTransferView[/{id}]', ViewStoreTransferController::class . ':view')->add(PermissionMiddleware::class)->setName('ViewStoreTransferView-view_store_transfer-view'); // view
    $app->any('/ViewStoreTransferEdit[/{id}]', ViewStoreTransferController::class . ':edit')->add(PermissionMiddleware::class)->setName('ViewStoreTransferEdit-view_store_transfer-edit'); // edit
    $app->any('/ViewStoreTransferSearch', ViewStoreTransferController::class . ':search')->add(PermissionMiddleware::class)->setName('ViewStoreTransferSearch-view_store_transfer-search'); // search
    $app->any('/ViewStoreTransferPreview', ViewStoreTransferController::class . ':preview')->add(PermissionMiddleware::class)->setName('ViewStoreTransferPreview-view_store_transfer-preview'); // preview
    $app->group(
        '/view_store_transfer',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', ViewStoreTransferController::class . ':list')->add(PermissionMiddleware::class)->setName('view_store_transfer/list-view_store_transfer-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', ViewStoreTransferController::class . ':add')->add(PermissionMiddleware::class)->setName('view_store_transfer/add-view_store_transfer-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', ViewStoreTransferController::class . ':view')->add(PermissionMiddleware::class)->setName('view_store_transfer/view-view_store_transfer-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', ViewStoreTransferController::class . ':edit')->add(PermissionMiddleware::class)->setName('view_store_transfer/edit-view_store_transfer-edit-2'); // edit
            $group->any('/' . Config("SEARCH_ACTION") . '', ViewStoreTransferController::class . ':search')->add(PermissionMiddleware::class)->setName('view_store_transfer/search-view_store_transfer-search-2'); // search
            $group->any('/' . Config("PREVIEW_ACTION") . '', ViewStoreTransferController::class . ':preview')->add(PermissionMiddleware::class)->setName('view_store_transfer/preview-view_store_transfer-preview-2'); // preview
        }
    );

    // view_store_search_product
    $app->any('/ViewStoreSearchProductList[/{id}]', ViewStoreSearchProductController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewStoreSearchProductList-view_store_search_product-list'); // list
    $app->group(
        '/view_store_search_product',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', ViewStoreSearchProductController::class . ':list')->add(PermissionMiddleware::class)->setName('view_store_search_product/list-view_store_search_product-list-2'); // list
        }
    );

    // view_gst_issueitem
    $app->any('/ViewGstIssueitemList', ViewGstIssueitemController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewGstIssueitemList-view_gst_issueitem-list'); // list
    $app->group(
        '/view_gst_issueitem',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '', ViewGstIssueitemController::class . ':list')->add(PermissionMiddleware::class)->setName('view_gst_issueitem/list-view_gst_issueitem-list-2'); // list
        }
    );

    // view_pharmacy_billing_voucher
    $app->any('/ViewPharmacyBillingVoucherList[/{id}]', ViewPharmacyBillingVoucherController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewPharmacyBillingVoucherList-view_pharmacy_billing_voucher-list'); // list
    $app->any('/ViewPharmacyBillingVoucherView[/{id}]', ViewPharmacyBillingVoucherController::class . ':view')->add(PermissionMiddleware::class)->setName('ViewPharmacyBillingVoucherView-view_pharmacy_billing_voucher-view'); // view
    $app->group(
        '/view_pharmacy_billing_voucher',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', ViewPharmacyBillingVoucherController::class . ':list')->add(PermissionMiddleware::class)->setName('view_pharmacy_billing_voucher/list-view_pharmacy_billing_voucher-list-2'); // list
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', ViewPharmacyBillingVoucherController::class . ':view')->add(PermissionMiddleware::class)->setName('view_pharmacy_billing_voucher/view-view_pharmacy_billing_voucher-view-2'); // view
        }
    );

    // view_pharmacy_purchaseorder_new
    $app->any('/ViewPharmacyPurchaseorderNewList', ViewPharmacyPurchaseorderNewController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewPharmacyPurchaseorderNewList-view_pharmacy_purchaseorder_new-list'); // list
    $app->group(
        '/view_pharmacy_purchaseorder_new',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '', ViewPharmacyPurchaseorderNewController::class . ':list')->add(PermissionMiddleware::class)->setName('view_pharmacy_purchaseorder_new/list-view_pharmacy_purchaseorder_new-list-2'); // list
        }
    );

    // view_till_search_view_revenew
    $app->any('/ViewTillSearchViewRevenewList[/{id}]', ViewTillSearchViewRevenewController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewTillSearchViewRevenewList-view_till_search_view_revenew-list'); // list
    $app->group(
        '/view_till_search_view_revenew',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', ViewTillSearchViewRevenewController::class . ':list')->add(PermissionMiddleware::class)->setName('view_till_search_view_revenew/list-view_till_search_view_revenew-list-2'); // list
        }
    );

    // view_report_revenue1
    $app->any('/ViewReportRevenue1List', ViewReportRevenue1Controller::class . ':list')->add(PermissionMiddleware::class)->setName('ViewReportRevenue1List-view_report_revenue1-list'); // list
    $app->group(
        '/view_report_revenue1',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '', ViewReportRevenue1Controller::class . ':list')->add(PermissionMiddleware::class)->setName('view_report_revenue1/list-view_report_revenue1-list-2'); // list
        }
    );

    // sms_curl
    $app->any('/SmsCurlList[/{id}]', SmsCurlController::class . ':list')->add(PermissionMiddleware::class)->setName('SmsCurlList-sms_curl-list'); // list
    $app->any('/SmsCurlAdd[/{id}]', SmsCurlController::class . ':add')->add(PermissionMiddleware::class)->setName('SmsCurlAdd-sms_curl-add'); // add
    $app->any('/SmsCurlView[/{id}]', SmsCurlController::class . ':view')->add(PermissionMiddleware::class)->setName('SmsCurlView-sms_curl-view'); // view
    $app->any('/SmsCurlEdit[/{id}]', SmsCurlController::class . ':edit')->add(PermissionMiddleware::class)->setName('SmsCurlEdit-sms_curl-edit'); // edit
    $app->any('/SmsCurlDelete[/{id}]', SmsCurlController::class . ':delete')->add(PermissionMiddleware::class)->setName('SmsCurlDelete-sms_curl-delete'); // delete
    $app->group(
        '/sms_curl',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', SmsCurlController::class . ':list')->add(PermissionMiddleware::class)->setName('sms_curl/list-sms_curl-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', SmsCurlController::class . ':add')->add(PermissionMiddleware::class)->setName('sms_curl/add-sms_curl-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', SmsCurlController::class . ':view')->add(PermissionMiddleware::class)->setName('sms_curl/view-sms_curl-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', SmsCurlController::class . ':edit')->add(PermissionMiddleware::class)->setName('sms_curl/edit-sms_curl-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', SmsCurlController::class . ':delete')->add(PermissionMiddleware::class)->setName('sms_curl/delete-sms_curl-delete-2'); // delete
        }
    );

    // view_vitals_history
    $app->any('/ViewVitalsHistoryList[/{id}]', ViewVitalsHistoryController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewVitalsHistoryList-view_vitals_history-list'); // list
    $app->any('/ViewVitalsHistoryAdd[/{id}]', ViewVitalsHistoryController::class . ':add')->add(PermissionMiddleware::class)->setName('ViewVitalsHistoryAdd-view_vitals_history-add'); // add
    $app->any('/ViewVitalsHistoryView[/{id}]', ViewVitalsHistoryController::class . ':view')->add(PermissionMiddleware::class)->setName('ViewVitalsHistoryView-view_vitals_history-view'); // view
    $app->any('/ViewVitalsHistoryEdit[/{id}]', ViewVitalsHistoryController::class . ':edit')->add(PermissionMiddleware::class)->setName('ViewVitalsHistoryEdit-view_vitals_history-edit'); // edit
    $app->any('/ViewVitalsHistoryDelete[/{id}]', ViewVitalsHistoryController::class . ':delete')->add(PermissionMiddleware::class)->setName('ViewVitalsHistoryDelete-view_vitals_history-delete'); // delete
    $app->group(
        '/view_vitals_history',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', ViewVitalsHistoryController::class . ':list')->add(PermissionMiddleware::class)->setName('view_vitals_history/list-view_vitals_history-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', ViewVitalsHistoryController::class . ':add')->add(PermissionMiddleware::class)->setName('view_vitals_history/add-view_vitals_history-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', ViewVitalsHistoryController::class . ':view')->add(PermissionMiddleware::class)->setName('view_vitals_history/view-view_vitals_history-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', ViewVitalsHistoryController::class . ':edit')->add(PermissionMiddleware::class)->setName('view_vitals_history/edit-view_vitals_history-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', ViewVitalsHistoryController::class . ':delete')->add(PermissionMiddleware::class)->setName('view_vitals_history/delete-view_vitals_history-delete-2'); // delete
        }
    );

    // view_drug_issue_op_h1
    $app->any('/ViewDrugIssueOpH1List', ViewDrugIssueOpH1Controller::class . ':list')->add(PermissionMiddleware::class)->setName('ViewDrugIssueOpH1List-view_drug_issue_op_h1-list'); // list
    $app->group(
        '/view_drug_issue_op_h1',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '', ViewDrugIssueOpH1Controller::class . ':list')->add(PermissionMiddleware::class)->setName('view_drug_issue_op_h1/list-view_drug_issue_op_h1-list-2'); // list
        }
    );

    // view_drug_issue_op_h1_notsch
    $app->any('/ViewDrugIssueOpH1NotschList', ViewDrugIssueOpH1NotschController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewDrugIssueOpH1NotschList-view_drug_issue_op_h1_notsch-list'); // list
    $app->group(
        '/view_drug_issue_op_h1_notsch',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '', ViewDrugIssueOpH1NotschController::class . ':list')->add(PermissionMiddleware::class)->setName('view_drug_issue_op_h1_notsch/list-view_drug_issue_op_h1_notsch-list-2'); // list
        }
    );

    // view_drug_issue_op_notsch
    $app->any('/ViewDrugIssueOpNotschList', ViewDrugIssueOpNotschController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewDrugIssueOpNotschList-view_drug_issue_op_notsch-list'); // list
    $app->group(
        '/view_drug_issue_op_notsch',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '', ViewDrugIssueOpNotschController::class . ':list')->add(PermissionMiddleware::class)->setName('view_drug_issue_op_notsch/list-view_drug_issue_op_notsch-list-2'); // list
        }
    );

    // view_pharmacy_report_stock_value_max
    $app->any('/ViewPharmacyReportStockValueMaxList', ViewPharmacyReportStockValueMaxController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewPharmacyReportStockValueMaxList-view_pharmacy_report_stock_value_max-list'); // list
    $app->group(
        '/view_pharmacy_report_stock_value_max',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '', ViewPharmacyReportStockValueMaxController::class . ':list')->add(PermissionMiddleware::class)->setName('view_pharmacy_report_stock_value_max/list-view_pharmacy_report_stock_value_max-list-2'); // list
        }
    );

    // view_stock_movement
    $app->any('/ViewStockMovementList', ViewStockMovementController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewStockMovementList-view_stock_movement-list'); // list
    $app->group(
        '/view_stock_movement',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '', ViewStockMovementController::class . ':list')->add(PermissionMiddleware::class)->setName('view_stock_movement/list-view_stock_movement-list-2'); // list
        }
    );

    // view1
    $app->any('/View1List', View1Controller::class . ':list')->add(PermissionMiddleware::class)->setName('View1List-view1-list'); // list
    $app->group(
        '/view1',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '', View1Controller::class . ':list')->add(PermissionMiddleware::class)->setName('view1/list-view1-list-2'); // list
        }
    );

    // view_dues
    $app->any('/ViewDuesList[/{id}]', ViewDuesController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewDuesList-view_dues-list'); // list
    $app->group(
        '/view_dues',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', ViewDuesController::class . ':list')->add(PermissionMiddleware::class)->setName('view_dues/list-view_dues-list-2'); // list
        }
    );

    // view_advance_utilize
    $app->any('/ViewAdvanceUtilizeList', ViewAdvanceUtilizeController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewAdvanceUtilizeList-view_advance_utilize-list'); // list
    $app->group(
        '/view_advance_utilize',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '', ViewAdvanceUtilizeController::class . ':list')->add(PermissionMiddleware::class)->setName('view_advance_utilize/list-view_advance_utilize-list-2'); // list
        }
    );

    // view_advance_freezed
    $app->any('/ViewAdvanceFreezedList[/{id}]', ViewAdvanceFreezedController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewAdvanceFreezedList-view_advance_freezed-list'); // list
    $app->any('/ViewAdvanceFreezedView[/{id}]', ViewAdvanceFreezedController::class . ':view')->add(PermissionMiddleware::class)->setName('ViewAdvanceFreezedView-view_advance_freezed-view'); // view
    $app->any('/ViewAdvanceFreezedEdit[/{id}]', ViewAdvanceFreezedController::class . ':edit')->add(PermissionMiddleware::class)->setName('ViewAdvanceFreezedEdit-view_advance_freezed-edit'); // edit
    $app->group(
        '/view_advance_freezed',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', ViewAdvanceFreezedController::class . ':list')->add(PermissionMiddleware::class)->setName('view_advance_freezed/list-view_advance_freezed-list-2'); // list
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', ViewAdvanceFreezedController::class . ':view')->add(PermissionMiddleware::class)->setName('view_advance_freezed/view-view_advance_freezed-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', ViewAdvanceFreezedController::class . ':edit')->add(PermissionMiddleware::class)->setName('view_advance_freezed/edit-view_advance_freezed-edit-2'); // edit
        }
    );

    // view_ivf_oocytedenudation_embryology_chart
    $app->any('/ViewIvfOocytedenudationEmbryologyChartList[/{id}]', ViewIvfOocytedenudationEmbryologyChartController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewIvfOocytedenudationEmbryologyChartList-view_ivf_oocytedenudation_embryology_chart-list'); // list
    $app->any('/ViewIvfOocytedenudationEmbryologyChartAdd[/{id}]', ViewIvfOocytedenudationEmbryologyChartController::class . ':add')->add(PermissionMiddleware::class)->setName('ViewIvfOocytedenudationEmbryologyChartAdd-view_ivf_oocytedenudation_embryology_chart-add'); // add
    $app->any('/ViewIvfOocytedenudationEmbryologyChartView[/{id}]', ViewIvfOocytedenudationEmbryologyChartController::class . ':view')->add(PermissionMiddleware::class)->setName('ViewIvfOocytedenudationEmbryologyChartView-view_ivf_oocytedenudation_embryology_chart-view'); // view
    $app->any('/ViewIvfOocytedenudationEmbryologyChartEdit[/{id}]', ViewIvfOocytedenudationEmbryologyChartController::class . ':edit')->add(PermissionMiddleware::class)->setName('ViewIvfOocytedenudationEmbryologyChartEdit-view_ivf_oocytedenudation_embryology_chart-edit'); // edit
    $app->any('/ViewIvfOocytedenudationEmbryologyChartUpdate', ViewIvfOocytedenudationEmbryologyChartController::class . ':update')->add(PermissionMiddleware::class)->setName('ViewIvfOocytedenudationEmbryologyChartUpdate-view_ivf_oocytedenudation_embryology_chart-update'); // update
    $app->any('/ViewIvfOocytedenudationEmbryologyChartDelete[/{id}]', ViewIvfOocytedenudationEmbryologyChartController::class . ':delete')->add(PermissionMiddleware::class)->setName('ViewIvfOocytedenudationEmbryologyChartDelete-view_ivf_oocytedenudation_embryology_chart-delete'); // delete
    $app->group(
        '/view_ivf_oocytedenudation_embryology_chart',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', ViewIvfOocytedenudationEmbryologyChartController::class . ':list')->add(PermissionMiddleware::class)->setName('view_ivf_oocytedenudation_embryology_chart/list-view_ivf_oocytedenudation_embryology_chart-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', ViewIvfOocytedenudationEmbryologyChartController::class . ':add')->add(PermissionMiddleware::class)->setName('view_ivf_oocytedenudation_embryology_chart/add-view_ivf_oocytedenudation_embryology_chart-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', ViewIvfOocytedenudationEmbryologyChartController::class . ':view')->add(PermissionMiddleware::class)->setName('view_ivf_oocytedenudation_embryology_chart/view-view_ivf_oocytedenudation_embryology_chart-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', ViewIvfOocytedenudationEmbryologyChartController::class . ':edit')->add(PermissionMiddleware::class)->setName('view_ivf_oocytedenudation_embryology_chart/edit-view_ivf_oocytedenudation_embryology_chart-edit-2'); // edit
            $group->any('/' . Config("UPDATE_ACTION") . '', ViewIvfOocytedenudationEmbryologyChartController::class . ':update')->add(PermissionMiddleware::class)->setName('view_ivf_oocytedenudation_embryology_chart/update-view_ivf_oocytedenudation_embryology_chart-update-2'); // update
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', ViewIvfOocytedenudationEmbryologyChartController::class . ':delete')->add(PermissionMiddleware::class)->setName('view_ivf_oocytedenudation_embryology_chart/delete-view_ivf_oocytedenudation_embryology_chart-delete-2'); // delete
        }
    );

    // qaqcrecord_andrology
    $app->any('/QaqcrecordAndrologyList[/{id}]', QaqcrecordAndrologyController::class . ':list')->add(PermissionMiddleware::class)->setName('QaqcrecordAndrologyList-qaqcrecord_andrology-list'); // list
    $app->any('/QaqcrecordAndrologyAdd[/{id}]', QaqcrecordAndrologyController::class . ':add')->add(PermissionMiddleware::class)->setName('QaqcrecordAndrologyAdd-qaqcrecord_andrology-add'); // add
    $app->any('/QaqcrecordAndrologyView[/{id}]', QaqcrecordAndrologyController::class . ':view')->add(PermissionMiddleware::class)->setName('QaqcrecordAndrologyView-qaqcrecord_andrology-view'); // view
    $app->any('/QaqcrecordAndrologyEdit[/{id}]', QaqcrecordAndrologyController::class . ':edit')->add(PermissionMiddleware::class)->setName('QaqcrecordAndrologyEdit-qaqcrecord_andrology-edit'); // edit
    $app->any('/QaqcrecordAndrologyDelete[/{id}]', QaqcrecordAndrologyController::class . ':delete')->add(PermissionMiddleware::class)->setName('QaqcrecordAndrologyDelete-qaqcrecord_andrology-delete'); // delete
    $app->group(
        '/qaqcrecord_andrology',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', QaqcrecordAndrologyController::class . ':list')->add(PermissionMiddleware::class)->setName('qaqcrecord_andrology/list-qaqcrecord_andrology-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', QaqcrecordAndrologyController::class . ':add')->add(PermissionMiddleware::class)->setName('qaqcrecord_andrology/add-qaqcrecord_andrology-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', QaqcrecordAndrologyController::class . ':view')->add(PermissionMiddleware::class)->setName('qaqcrecord_andrology/view-qaqcrecord_andrology-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', QaqcrecordAndrologyController::class . ':edit')->add(PermissionMiddleware::class)->setName('qaqcrecord_andrology/edit-qaqcrecord_andrology-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', QaqcrecordAndrologyController::class . ':delete')->add(PermissionMiddleware::class)->setName('qaqcrecord_andrology/delete-qaqcrecord_andrology-delete-2'); // delete
        }
    );

    // qaqcrecord_endrology
    $app->any('/QaqcrecordEndrologyList[/{id}]', QaqcrecordEndrologyController::class . ':list')->add(PermissionMiddleware::class)->setName('QaqcrecordEndrologyList-qaqcrecord_endrology-list'); // list
    $app->any('/QaqcrecordEndrologyAdd[/{id}]', QaqcrecordEndrologyController::class . ':add')->add(PermissionMiddleware::class)->setName('QaqcrecordEndrologyAdd-qaqcrecord_endrology-add'); // add
    $app->any('/QaqcrecordEndrologyView[/{id}]', QaqcrecordEndrologyController::class . ':view')->add(PermissionMiddleware::class)->setName('QaqcrecordEndrologyView-qaqcrecord_endrology-view'); // view
    $app->any('/QaqcrecordEndrologyEdit[/{id}]', QaqcrecordEndrologyController::class . ':edit')->add(PermissionMiddleware::class)->setName('QaqcrecordEndrologyEdit-qaqcrecord_endrology-edit'); // edit
    $app->any('/QaqcrecordEndrologyDelete[/{id}]', QaqcrecordEndrologyController::class . ':delete')->add(PermissionMiddleware::class)->setName('QaqcrecordEndrologyDelete-qaqcrecord_endrology-delete'); // delete
    $app->group(
        '/qaqcrecord_endrology',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', QaqcrecordEndrologyController::class . ':list')->add(PermissionMiddleware::class)->setName('qaqcrecord_endrology/list-qaqcrecord_endrology-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', QaqcrecordEndrologyController::class . ':add')->add(PermissionMiddleware::class)->setName('qaqcrecord_endrology/add-qaqcrecord_endrology-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', QaqcrecordEndrologyController::class . ':view')->add(PermissionMiddleware::class)->setName('qaqcrecord_endrology/view-qaqcrecord_endrology-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', QaqcrecordEndrologyController::class . ':edit')->add(PermissionMiddleware::class)->setName('qaqcrecord_endrology/edit-qaqcrecord_endrology-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', QaqcrecordEndrologyController::class . ':delete')->add(PermissionMiddleware::class)->setName('qaqcrecord_endrology/delete-qaqcrecord_endrology-delete-2'); // delete
        }
    );

    // view_revenue_report_ip
    $app->any('/ViewRevenueReportIpList', ViewRevenueReportIpController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewRevenueReportIpList-view_revenue_report_ip-list'); // list
    $app->group(
        '/view_revenue_report_ip',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '', ViewRevenueReportIpController::class . ':list')->add(PermissionMiddleware::class)->setName('view_revenue_report_ip/list-view_revenue_report_ip-list-2'); // list
        }
    );

    // view_revenue_report_opd
    $app->any('/ViewRevenueReportOpdList', ViewRevenueReportOpdController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewRevenueReportOpdList-view_revenue_report_opd-list'); // list
    $app->group(
        '/view_revenue_report_opd',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '', ViewRevenueReportOpdController::class . ':list')->add(PermissionMiddleware::class)->setName('view_revenue_report_opd/list-view_revenue_report_opd-list-2'); // list
        }
    );

    // view_revenue_report_pharmacy
    $app->any('/ViewRevenueReportPharmacyList', ViewRevenueReportPharmacyController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewRevenueReportPharmacyList-view_revenue_report_pharmacy-list'); // list
    $app->group(
        '/view_revenue_report_pharmacy',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '', ViewRevenueReportPharmacyController::class . ':list')->add(PermissionMiddleware::class)->setName('view_revenue_report_pharmacy/list-view_revenue_report_pharmacy-list-2'); // list
        }
    );

    // view_item_received_items
    $app->any('/ViewItemReceivedItemsList[/{id}]', ViewItemReceivedItemsController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewItemReceivedItemsList-view_item_received_items-list'); // list
    $app->group(
        '/view_item_received_items',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', ViewItemReceivedItemsController::class . ':list')->add(PermissionMiddleware::class)->setName('view_item_received_items/list-view_item_received_items-list-2'); // list
        }
    );

    // view_pharmacy_search_product_search2
    $app->any('/ViewPharmacySearchProductSearch2List[/{id}]', ViewPharmacySearchProductSearch2Controller::class . ':list')->add(PermissionMiddleware::class)->setName('ViewPharmacySearchProductSearch2List-view_pharmacy_search_product_search2-list'); // list
    $app->group(
        '/view_pharmacy_search_product_search2',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', ViewPharmacySearchProductSearch2Controller::class . ':list')->add(PermissionMiddleware::class)->setName('view_pharmacy_search_product_search2/list-view_pharmacy_search_product_search2-list-2'); // list
        }
    );

    // ipbulkservice
    $app->any('/Ipbulkservice[/{params:.*}]', IpbulkserviceController::class)->add(PermissionMiddleware::class)->setName('Ipbulkservice-ipbulkservice-custom'); // custom

    // ipbulkserviceinsert
    $app->any('/Ipbulkserviceinsert[/{params:.*}]', IpbulkserviceinsertController::class)->add(PermissionMiddleware::class)->setName('Ipbulkserviceinsert-ipbulkserviceinsert-custom'); // custom

    // view_ip_af_billing
    $app->any('/ViewIpAfBillingList[/{id}]', ViewIpAfBillingController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewIpAfBillingList-view_ip_af_billing-list'); // list
    $app->any('/ViewIpAfBillingView[/{id}]', ViewIpAfBillingController::class . ':view')->add(PermissionMiddleware::class)->setName('ViewIpAfBillingView-view_ip_af_billing-view'); // view
    $app->group(
        '/view_ip_af_billing',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', ViewIpAfBillingController::class . ':list')->add(PermissionMiddleware::class)->setName('view_ip_af_billing/list-view_ip_af_billing-list-2'); // list
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', ViewIpAfBillingController::class . ':view')->add(PermissionMiddleware::class)->setName('view_ip_af_billing/view-view_ip_af_billing-view-2'); // view
        }
    );

    // view_template_couple_vitals
    $app->any('/ViewTemplateCoupleVitalsList[/{id}/{hid}]', ViewTemplateCoupleVitalsController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewTemplateCoupleVitalsList-view_template_couple_vitals-list'); // list
    $app->group(
        '/view_template_couple_vitals',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}/{hid}]', ViewTemplateCoupleVitalsController::class . ':list')->add(PermissionMiddleware::class)->setName('view_template_couple_vitals/list-view_template_couple_vitals-list-2'); // list
        }
    );

    // view_template_for_et
    $app->any('/ViewTemplateForEtList[/{id}]', ViewTemplateForEtController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewTemplateForEtList-view_template_for_et-list'); // list
    $app->group(
        '/view_template_for_et',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', ViewTemplateForEtController::class . ':list')->add(PermissionMiddleware::class)->setName('view_template_for_et/list-view_template_for_et-list-2'); // list
        }
    );

    // view_template_for_opu
    $app->any('/ViewTemplateForOpuList[/{id}]', ViewTemplateForOpuController::class . ':list')->add(PermissionMiddleware::class)->setName('ViewTemplateForOpuList-view_template_for_opu-list'); // list
    $app->group(
        '/view_template_for_opu',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', ViewTemplateForOpuController::class . ':list')->add(PermissionMiddleware::class)->setName('view_template_for_opu/list-view_template_for_opu-list-2'); // list
        }
    );

    // error
    $app->any('/error', OthersController::class . ':error')->add(PermissionMiddleware::class)->setName('error');

    // personal_data
    $app->any('/personaldata', OthersController::class . ':personaldata')->add(PermissionMiddleware::class)->setName('personaldata');

    // login
    $app->any('/login', OthersController::class . ':login')->add(PermissionMiddleware::class)->setName('login');

    // reset_password
    $app->any('/resetpassword', OthersController::class . ':resetpassword')->add(PermissionMiddleware::class)->setName('resetpassword');

    // change_password
    $app->any('/changepassword', OthersController::class . ':changepassword')->add(PermissionMiddleware::class)->setName('changepassword');

    // userpriv
    $app->any('/userpriv', OthersController::class . ':userpriv')->add(PermissionMiddleware::class)->setName('userpriv');

    // logout
    $app->any('/logout', OthersController::class . ':logout')->add(PermissionMiddleware::class)->setName('logout');

    // captcha
    $app->any('/captcha[/{page}]', OthersController::class . ':captcha')->add(PermissionMiddleware::class)->setName('captcha');

    // barcode
    $app->any('/barcode', OthersController::class . ':barcode')->add(PermissionMiddleware::class)->setName('barcode');

    // Swagger
    $app->get('/' . Config("SWAGGER_ACTION"), OthersController::class . ':swagger')->setName(Config("SWAGGER_ACTION")); // Swagger

    // Index
    $app->any('/[index]', OthersController::class . ':index')->add(PermissionMiddleware::class)->setName('index');

    // Route Action event
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
