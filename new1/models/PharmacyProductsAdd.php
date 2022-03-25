<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class PharmacyProductsAdd extends PharmacyProducts
{
    // Page ID
    public $PageID = "add";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'pharmacy_products';

    // Page object name
    public $PageObjName = "PharmacyProductsAdd";

    // Rendering View
    public $RenderingView = false;

    // Custom template
    public $UseCustomTemplate = false;

    // Page headings
    public $Heading = "";
    public $Subheading = "";
    public $PageHeader;
    public $PageFooter;

    // Page terminated
    private $terminated = false;

    // Page heading
    public function pageHeading()
    {
        global $Language;
        if ($this->Heading != "") {
            return $this->Heading;
        }
        if (method_exists($this, "tableCaption")) {
            return $this->tableCaption();
        }
        return "";
    }

    // Page subheading
    public function pageSubheading()
    {
        global $Language;
        if ($this->Subheading != "") {
            return $this->Subheading;
        }
        if ($this->TableName) {
            return $Language->phrase($this->PageID);
        }
        return "";
    }

    // Page name
    public function pageName()
    {
        return CurrentPageName();
    }

    // Page URL
    public function pageUrl()
    {
        $url = ScriptName() . "?";
        if ($this->UseTokenInUrl) {
            $url .= "t=" . $this->TableVar . "&"; // Add page token
        }
        return $url;
    }

    // Messages
    private $message = "";
    private $failureMessage = "";
    private $successMessage = "";
    private $warningMessage = "";

    // Get message
    public function getMessage()
    {
        return $_SESSION[SESSION_MESSAGE] ?? $this->message;
    }

    // Set message
    public function setMessage($v)
    {
        AddMessage($this->message, $v);
        $_SESSION[SESSION_MESSAGE] = $this->message;
    }

    // Get failure message
    public function getFailureMessage()
    {
        return $_SESSION[SESSION_FAILURE_MESSAGE] ?? $this->failureMessage;
    }

    // Set failure message
    public function setFailureMessage($v)
    {
        AddMessage($this->failureMessage, $v);
        $_SESSION[SESSION_FAILURE_MESSAGE] = $this->failureMessage;
    }

    // Get success message
    public function getSuccessMessage()
    {
        return $_SESSION[SESSION_SUCCESS_MESSAGE] ?? $this->successMessage;
    }

    // Set success message
    public function setSuccessMessage($v)
    {
        AddMessage($this->successMessage, $v);
        $_SESSION[SESSION_SUCCESS_MESSAGE] = $this->successMessage;
    }

    // Get warning message
    public function getWarningMessage()
    {
        return $_SESSION[SESSION_WARNING_MESSAGE] ?? $this->warningMessage;
    }

    // Set warning message
    public function setWarningMessage($v)
    {
        AddMessage($this->warningMessage, $v);
        $_SESSION[SESSION_WARNING_MESSAGE] = $this->warningMessage;
    }

    // Clear message
    public function clearMessage()
    {
        $this->message = "";
        $_SESSION[SESSION_MESSAGE] = "";
    }

    // Clear failure message
    public function clearFailureMessage()
    {
        $this->failureMessage = "";
        $_SESSION[SESSION_FAILURE_MESSAGE] = "";
    }

    // Clear success message
    public function clearSuccessMessage()
    {
        $this->successMessage = "";
        $_SESSION[SESSION_SUCCESS_MESSAGE] = "";
    }

    // Clear warning message
    public function clearWarningMessage()
    {
        $this->warningMessage = "";
        $_SESSION[SESSION_WARNING_MESSAGE] = "";
    }

    // Clear messages
    public function clearMessages()
    {
        $this->clearMessage();
        $this->clearFailureMessage();
        $this->clearSuccessMessage();
        $this->clearWarningMessage();
    }

    // Show message
    public function showMessage()
    {
        $hidden = true;
        $html = "";
        // Message
        $message = $this->getMessage();
        if (method_exists($this, "messageShowing")) {
            $this->messageShowing($message, "");
        }
        if ($message != "") { // Message in Session, display
            if (!$hidden) {
                $message = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $message;
            }
            $html .= '<div class="alert alert-info alert-dismissible ew-info"><i class="icon fas fa-info"></i>' . $message . '</div>';
            $_SESSION[SESSION_MESSAGE] = ""; // Clear message in Session
        }
        // Warning message
        $warningMessage = $this->getWarningMessage();
        if (method_exists($this, "messageShowing")) {
            $this->messageShowing($warningMessage, "warning");
        }
        if ($warningMessage != "") { // Message in Session, display
            if (!$hidden) {
                $warningMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $warningMessage;
            }
            $html .= '<div class="alert alert-warning alert-dismissible ew-warning"><i class="icon fas fa-exclamation"></i>' . $warningMessage . '</div>';
            $_SESSION[SESSION_WARNING_MESSAGE] = ""; // Clear message in Session
        }
        // Success message
        $successMessage = $this->getSuccessMessage();
        if (method_exists($this, "messageShowing")) {
            $this->messageShowing($successMessage, "success");
        }
        if ($successMessage != "") { // Message in Session, display
            if (!$hidden) {
                $successMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $successMessage;
            }
            $html .= '<div class="alert alert-success alert-dismissible ew-success"><i class="icon fas fa-check"></i>' . $successMessage . '</div>';
            $_SESSION[SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
        }
        // Failure message
        $errorMessage = $this->getFailureMessage();
        if (method_exists($this, "messageShowing")) {
            $this->messageShowing($errorMessage, "failure");
        }
        if ($errorMessage != "") { // Message in Session, display
            if (!$hidden) {
                $errorMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $errorMessage;
            }
            $html .= '<div class="alert alert-danger alert-dismissible ew-error"><i class="icon fas fa-ban"></i>' . $errorMessage . '</div>';
            $_SESSION[SESSION_FAILURE_MESSAGE] = ""; // Clear message in Session
        }
        echo '<div class="ew-message-dialog' . ($hidden ? ' d-none' : '') . '">' . $html . '</div>';
    }

    // Get message as array
    public function getMessages()
    {
        $ar = [];
        // Message
        $message = $this->getMessage();
        if ($message != "") { // Message in Session, display
            $ar["message"] = $message;
            $_SESSION[SESSION_MESSAGE] = ""; // Clear message in Session
        }
        // Warning message
        $warningMessage = $this->getWarningMessage();
        if ($warningMessage != "") { // Message in Session, display
            $ar["warningMessage"] = $warningMessage;
            $_SESSION[SESSION_WARNING_MESSAGE] = ""; // Clear message in Session
        }
        // Success message
        $successMessage = $this->getSuccessMessage();
        if ($successMessage != "") { // Message in Session, display
            $ar["successMessage"] = $successMessage;
            $_SESSION[SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
        }
        // Failure message
        $failureMessage = $this->getFailureMessage();
        if ($failureMessage != "") { // Message in Session, display
            $ar["failureMessage"] = $failureMessage;
            $_SESSION[SESSION_FAILURE_MESSAGE] = ""; // Clear message in Session
        }
        return $ar;
    }

    // Show Page Header
    public function showPageHeader()
    {
        $header = $this->PageHeader;
        $this->pageDataRendering($header);
        if ($header != "") { // Header exists, display
            echo '<p id="ew-page-header">' . $header . '</p>';
        }
    }

    // Show Page Footer
    public function showPageFooter()
    {
        $footer = $this->PageFooter;
        $this->pageDataRendered($footer);
        if ($footer != "") { // Footer exists, display
            echo '<p id="ew-page-footer">' . $footer . '</p>';
        }
    }

    // Validate page request
    protected function isPageRequest()
    {
        global $CurrentForm;
        if ($this->UseTokenInUrl) {
            if ($CurrentForm) {
                return ($this->TableVar == $CurrentForm->getValue("t"));
            }
            if (Get("t") !== null) {
                return ($this->TableVar == Get("t"));
            }
        }
        return true;
    }

    // Constructor
    public function __construct()
    {
        global $Language, $DashboardReport, $DebugTimer;

        // Initialize
        $GLOBALS["Page"] = &$this;
        $this->TokenTimeout = SessionTimeoutTime();

        // Language object
        $Language = Container("language");

        // Parent constuctor
        parent::__construct();

        // Table object (pharmacy_products)
        if (!isset($GLOBALS["pharmacy_products"]) || get_class($GLOBALS["pharmacy_products"]) == PROJECT_NAMESPACE . "pharmacy_products") {
            $GLOBALS["pharmacy_products"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'pharmacy_products');
        }

        // Start timer
        $DebugTimer = Container("timer");

        // Debug message
        LoadDebugMessage();

        // Open connection
        $GLOBALS["Conn"] = $GLOBALS["Conn"] ?? $this->getConnection();
    }

    // Get content from stream
    public function getContents($stream = null): string
    {
        global $Response;
        return is_object($Response) ? $Response->getBody() : ob_get_clean();
    }

    // Is terminated
    public function isTerminated()
    {
        return $this->terminated;
    }

    /**
     * Terminate page
     *
     * @param string $url URL for direction
     * @return void
     */
    public function terminate($url = "")
    {
        if ($this->terminated) {
            return;
        }
        global $ExportFileName, $TempImages, $DashboardReport;

        // Page is terminated
        $this->terminated = true;

         // Page Unload event
        if (method_exists($this, "pageUnload")) {
            $this->pageUnload();
        }

        // Global Page Unloaded event (in userfn*.php)
        Page_Unloaded();

        // Export
        if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
            $content = $this->getContents();
            if ($ExportFileName == "") {
                $ExportFileName = $this->TableVar;
            }
            $class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
            if (class_exists($class)) {
                $doc = new $class(Container("pharmacy_products"));
                $doc->Text = @$content;
                if ($this->isExport("email")) {
                    echo $this->exportEmail($doc->Text);
                } else {
                    $doc->export();
                }
                DeleteTempImages(); // Delete temp images
                return;
            }
        }
        if (!IsApi() && method_exists($this, "pageRedirecting")) {
            $this->pageRedirecting($url);
        }

        // Close connection
        CloseConnections();

        // Return for API
        if (IsApi()) {
            $res = $url === true;
            if (!$res) { // Show error
                WriteJson(array_merge(["success" => false], $this->getMessages()));
            }
            return;
        }

        // Go to URL if specified
        if ($url != "") {
            if (!Config("DEBUG") && ob_get_length()) {
                ob_end_clean();
            }

            // Handle modal response
            if ($this->IsModal) { // Show as modal
                $row = ["url" => GetUrl($url), "modal" => "1"];
                $pageName = GetPageName($url);
                if ($pageName != $this->getListUrl()) { // Not List page
                    $row["caption"] = $this->getModalCaption($pageName);
                    if ($pageName == "PharmacyProductsView") {
                        $row["view"] = "1";
                    }
                } else { // List page should not be shown as modal => error
                    $row["error"] = $this->getFailureMessage();
                    $this->clearFailureMessage();
                }
                WriteJson($row);
            } else {
                SaveDebugMessage();
                Redirect(GetUrl($url));
            }
        }
        return; // Return to controller
    }

    // Get records from recordset
    protected function getRecordsFromRecordset($rs, $current = false)
    {
        $rows = [];
        if (is_object($rs)) { // Recordset
            while ($rs && !$rs->EOF) {
                $this->loadRowValues($rs); // Set up DbValue/CurrentValue
                $row = $this->getRecordFromArray($rs->fields);
                if ($current) {
                    return $row;
                } else {
                    $rows[] = $row;
                }
                $rs->moveNext();
            }
        } elseif (is_array($rs)) {
            foreach ($rs as $ar) {
                $row = $this->getRecordFromArray($ar);
                if ($current) {
                    return $row;
                } else {
                    $rows[] = $row;
                }
            }
        }
        return $rows;
    }

    // Get record from array
    protected function getRecordFromArray($ar)
    {
        $row = [];
        if (is_array($ar)) {
            foreach ($ar as $fldname => $val) {
                if (array_key_exists($fldname, $this->Fields) && ($this->Fields[$fldname]->Visible || $this->Fields[$fldname]->IsPrimaryKey)) { // Primary key or Visible
                    $fld = &$this->Fields[$fldname];
                    if ($fld->HtmlTag == "FILE") { // Upload field
                        if (EmptyValue($val)) {
                            $row[$fldname] = null;
                        } else {
                            if ($fld->DataType == DATATYPE_BLOB) {
                                $url = FullUrl(GetApiUrl(Config("API_FILE_ACTION") .
                                    "/" . $fld->TableVar . "/" . $fld->Param . "/" . rawurlencode($this->getRecordKeyValue($ar))));
                                $row[$fldname] = ["type" => ContentType($val), "url" => $url, "name" => $fld->Param . ContentExtension($val)];
                            } elseif (!$fld->UploadMultiple || !ContainsString($val, Config("MULTIPLE_UPLOAD_SEPARATOR"))) { // Single file
                                $url = FullUrl(GetApiUrl(Config("API_FILE_ACTION") .
                                    "/" . $fld->TableVar . "/" . Encrypt($fld->physicalUploadPath() . $val)));
                                $row[$fldname] = ["type" => MimeContentType($val), "url" => $url, "name" => $val];
                            } else { // Multiple files
                                $files = explode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $val);
                                $ar = [];
                                foreach ($files as $file) {
                                    $url = FullUrl(GetApiUrl(Config("API_FILE_ACTION") .
                                        "/" . $fld->TableVar . "/" . Encrypt($fld->physicalUploadPath() . $file)));
                                    if (!EmptyValue($file)) {
                                        $ar[] = ["type" => MimeContentType($file), "url" => $url, "name" => $file];
                                    }
                                }
                                $row[$fldname] = $ar;
                            }
                        }
                    } else {
                        $row[$fldname] = $val;
                    }
                }
            }
        }
        return $row;
    }

    // Get record key value from array
    protected function getRecordKeyValue($ar)
    {
        $key = "";
        if (is_array($ar)) {
            $key .= @$ar['ProductCode'];
        }
        return $key;
    }

    /**
     * Hide fields for add/edit
     *
     * @return void
     */
    protected function hideFieldsForAddEdit()
    {
        if ($this->isAdd() || $this->isCopy() || $this->isGridAdd()) {
            $this->ProductCode->Visible = false;
        }
    }

    // Lookup data
    public function lookup()
    {
        global $Language, $Security;

        // Get lookup object
        $fieldName = Post("field");
        if (!array_key_exists($fieldName, $this->Fields)) {
            return false;
        }
        $lookupField = $this->Fields[$fieldName];
        $lookup = $lookupField->Lookup;
        if ($lookup === null) {
            return false;
        }

        // Get lookup parameters
        $lookupType = Post("ajax", "unknown");
        $pageSize = -1;
        $offset = -1;
        $searchValue = "";
        if (SameText($lookupType, "modal")) {
            $searchValue = Post("sv", "");
            $pageSize = Post("recperpage", 10);
            $offset = Post("start", 0);
        } elseif (SameText($lookupType, "autosuggest")) {
            $searchValue = Param("q", "");
            $pageSize = Param("n", -1);
            $pageSize = is_numeric($pageSize) ? (int)$pageSize : -1;
            if ($pageSize <= 0) {
                $pageSize = Config("AUTO_SUGGEST_MAX_ENTRIES");
            }
            $start = Param("start", -1);
            $start = is_numeric($start) ? (int)$start : -1;
            $page = Param("page", -1);
            $page = is_numeric($page) ? (int)$page : -1;
            $offset = $start >= 0 ? $start : ($page > 0 && $pageSize > 0 ? ($page - 1) * $pageSize : 0);
        }
        $userSelect = Decrypt(Post("s", ""));
        $userFilter = Decrypt(Post("f", ""));
        $userOrderBy = Decrypt(Post("o", ""));
        $keys = Post("keys");
        $lookup->LookupType = $lookupType; // Lookup type
        if ($keys !== null) { // Selected records from modal
            if (is_array($keys)) {
                $keys = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $keys);
            }
            $lookup->FilterFields = []; // Skip parent fields if any
            $lookup->FilterValues[] = $keys; // Lookup values
            $pageSize = -1; // Show all records
        } else { // Lookup values
            $lookup->FilterValues[] = Post("v0", Post("lookupValue", ""));
        }
        $cnt = is_array($lookup->FilterFields) ? count($lookup->FilterFields) : 0;
        for ($i = 1; $i <= $cnt; $i++) {
            $lookup->FilterValues[] = Post("v" . $i, "");
        }
        $lookup->SearchValue = $searchValue;
        $lookup->PageSize = $pageSize;
        $lookup->Offset = $offset;
        if ($userSelect != "") {
            $lookup->UserSelect = $userSelect;
        }
        if ($userFilter != "") {
            $lookup->UserFilter = $userFilter;
        }
        if ($userOrderBy != "") {
            $lookup->UserOrderBy = $userOrderBy;
        }
        $lookup->toJson($this); // Use settings from current page
    }
    public $FormClassName = "ew-horizontal ew-form ew-add-form";
    public $IsModal = false;
    public $IsMobileOrModal = false;
    public $DbMasterFilter = "";
    public $DbDetailFilter = "";
    public $StartRecord;
    public $Priv = 0;
    public $OldRecordset;
    public $CopyRecord;

    /**
     * Page run
     *
     * @return void
     */
    public function run()
    {
        global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $CurrentForm,
            $SkipHeaderFooter;

        // Is modal
        $this->IsModal = Param("modal") == "1";

        // Create form object
        $CurrentForm = new HttpForm();
        $this->CurrentAction = Param("action"); // Set up current action
        $this->ProductCode->Visible = false;
        $this->ProductName->setVisibility();
        $this->DivisionCode->setVisibility();
        $this->ManufacturerCode->setVisibility();
        $this->SupplierCode->setVisibility();
        $this->AlternateSupplierCodes->setVisibility();
        $this->AlternateProductCode->setVisibility();
        $this->UniversalProductCode->setVisibility();
        $this->BookProductCode->setVisibility();
        $this->OldCode->setVisibility();
        $this->ProtectedProducts->setVisibility();
        $this->ProductFullName->setVisibility();
        $this->UnitOfMeasure->setVisibility();
        $this->UnitDescription->setVisibility();
        $this->BulkDescription->setVisibility();
        $this->BarCodeDescription->setVisibility();
        $this->PackageInformation->setVisibility();
        $this->PackageId->setVisibility();
        $this->Weight->setVisibility();
        $this->AllowFractions->setVisibility();
        $this->MinimumStockLevel->setVisibility();
        $this->MaximumStockLevel->setVisibility();
        $this->ReorderLevel->setVisibility();
        $this->MinMaxRatio->setVisibility();
        $this->AutoMinMaxRatio->setVisibility();
        $this->ScheduleCode->setVisibility();
        $this->RopRatio->setVisibility();
        $this->MRP->setVisibility();
        $this->PurchasePrice->setVisibility();
        $this->PurchaseUnit->setVisibility();
        $this->PurchaseTaxCode->setVisibility();
        $this->AllowDirectInward->setVisibility();
        $this->SalePrice->setVisibility();
        $this->SaleUnit->setVisibility();
        $this->SalesTaxCode->setVisibility();
        $this->StockReceived->setVisibility();
        $this->TotalStock->setVisibility();
        $this->StockType->setVisibility();
        $this->StockCheckDate->setVisibility();
        $this->StockAdjustmentDate->setVisibility();
        $this->Remarks->setVisibility();
        $this->CostCentre->setVisibility();
        $this->ProductType->setVisibility();
        $this->TaxAmount->setVisibility();
        $this->TaxId->setVisibility();
        $this->ResaleTaxApplicable->setVisibility();
        $this->CstOtherTax->setVisibility();
        $this->TotalTax->setVisibility();
        $this->ItemCost->setVisibility();
        $this->ExpiryDate->setVisibility();
        $this->BatchDescription->setVisibility();
        $this->FreeScheme->setVisibility();
        $this->CashDiscountEligibility->setVisibility();
        $this->DiscountPerAllowInBill->setVisibility();
        $this->Discount->setVisibility();
        $this->TotalAmount->setVisibility();
        $this->StandardMargin->setVisibility();
        $this->Margin->setVisibility();
        $this->MarginId->setVisibility();
        $this->ExpectedMargin->setVisibility();
        $this->SurchargeBeforeTax->setVisibility();
        $this->SurchargeAfterTax->setVisibility();
        $this->TempOrderNo->setVisibility();
        $this->TempOrderDate->setVisibility();
        $this->OrderUnit->setVisibility();
        $this->OrderQuantity->setVisibility();
        $this->MarkForOrder->setVisibility();
        $this->OrderAllId->setVisibility();
        $this->CalculateOrderQty->setVisibility();
        $this->SubLocation->setVisibility();
        $this->CategoryCode->setVisibility();
        $this->SubCategory->setVisibility();
        $this->FlexCategoryCode->setVisibility();
        $this->ABCSaleQty->setVisibility();
        $this->ABCSaleValue->setVisibility();
        $this->ConvertionFactor->setVisibility();
        $this->ConvertionUnitDesc->setVisibility();
        $this->TransactionId->setVisibility();
        $this->SoldProductId->setVisibility();
        $this->WantedBookId->setVisibility();
        $this->AllId->setVisibility();
        $this->BatchAndExpiryCompulsory->setVisibility();
        $this->BatchStockForWantedBook->setVisibility();
        $this->UnitBasedBilling->setVisibility();
        $this->DoNotCheckStock->setVisibility();
        $this->AcceptRate->setVisibility();
        $this->PriceLevel->setVisibility();
        $this->LastQuotePrice->setVisibility();
        $this->PriceChange->setVisibility();
        $this->CommodityCode->setVisibility();
        $this->InstitutePrice->setVisibility();
        $this->CtrlOrDCtrlProduct->setVisibility();
        $this->ImportedDate->setVisibility();
        $this->IsImported->setVisibility();
        $this->FileName->setVisibility();
        $this->LPName->setVisibility();
        $this->GodownNumber->setVisibility();
        $this->CreationDate->setVisibility();
        $this->CreatedbyUser->setVisibility();
        $this->ModifiedDate->setVisibility();
        $this->ModifiedbyUser->setVisibility();
        $this->isActive->setVisibility();
        $this->AllowExpiryClaim->setVisibility();
        $this->BrandCode->setVisibility();
        $this->FreeSchemeBasedon->setVisibility();
        $this->DoNotCheckCostInBill->setVisibility();
        $this->ProductGroupCode->setVisibility();
        $this->ProductStrengthCode->setVisibility();
        $this->PackingCode->setVisibility();
        $this->ComputedMinStock->setVisibility();
        $this->ComputedMaxStock->setVisibility();
        $this->ProductRemark->setVisibility();
        $this->ProductDrugCode->setVisibility();
        $this->IsMatrixProduct->setVisibility();
        $this->AttributeCount1->setVisibility();
        $this->AttributeCount2->setVisibility();
        $this->AttributeCount3->setVisibility();
        $this->AttributeCount4->setVisibility();
        $this->AttributeCount5->setVisibility();
        $this->DefaultDiscountPercentage->setVisibility();
        $this->DonotPrintBarcode->setVisibility();
        $this->ProductLevelDiscount->setVisibility();
        $this->Markup->setVisibility();
        $this->MarkDown->setVisibility();
        $this->ReworkSalePrice->setVisibility();
        $this->MultipleInput->setVisibility();
        $this->LpPackageInformation->setVisibility();
        $this->AllowNegativeStock->setVisibility();
        $this->OrderDate->setVisibility();
        $this->OrderTime->setVisibility();
        $this->RateGroupCode->setVisibility();
        $this->ConversionCaseLot->setVisibility();
        $this->ShippingLot->setVisibility();
        $this->AllowExpiryReplacement->setVisibility();
        $this->NoOfMonthExpiryAllowed->setVisibility();
        $this->ProductDiscountEligibility->setVisibility();
        $this->ScheduleTypeCode->setVisibility();
        $this->AIOCDProductCode->setVisibility();
        $this->FreeQuantity->setVisibility();
        $this->DiscountType->setVisibility();
        $this->DiscountValue->setVisibility();
        $this->HasProductOrderAttribute->setVisibility();
        $this->FirstPODate->setVisibility();
        $this->SaleprcieAndMrpCalcPercent->setVisibility();
        $this->IsGiftVoucherProducts->setVisibility();
        $this->AcceptRange4SerialNumber->setVisibility();
        $this->GiftVoucherDenomination->setVisibility();
        $this->Subclasscode->setVisibility();
        $this->BarCodeFromWeighingMachine->setVisibility();
        $this->CheckCostInReturn->setVisibility();
        $this->FrequentSaleProduct->setVisibility();
        $this->RateType->setVisibility();
        $this->TouchscreenName->setVisibility();
        $this->FreeType->setVisibility();
        $this->LooseQtyasNewBatch->setVisibility();
        $this->AllowSlabBilling->setVisibility();
        $this->ProductTypeForProduction->setVisibility();
        $this->RecipeCode->setVisibility();
        $this->DefaultUnitType->setVisibility();
        $this->PIstatus->setVisibility();
        $this->LastPiConfirmedDate->setVisibility();
        $this->BarCodeDesign->setVisibility();
        $this->AcceptRemarksInBill->setVisibility();
        $this->Classification->setVisibility();
        $this->TimeSlot->setVisibility();
        $this->IsBundle->setVisibility();
        $this->ColorCode->setVisibility();
        $this->GenderCode->setVisibility();
        $this->SizeCode->setVisibility();
        $this->GiftCard->setVisibility();
        $this->ToonLabel->setVisibility();
        $this->GarmentType->setVisibility();
        $this->AgeGroup->setVisibility();
        $this->Season->setVisibility();
        $this->DailyStockEntry->setVisibility();
        $this->ModifierApplicable->setVisibility();
        $this->ModifierType->setVisibility();
        $this->AcceptZeroRate->setVisibility();
        $this->ExciseDutyCode->setVisibility();
        $this->IndentProductGroupCode->setVisibility();
        $this->IsMultiBatch->setVisibility();
        $this->IsSingleBatch->setVisibility();
        $this->MarkUpRate1->setVisibility();
        $this->MarkDownRate1->setVisibility();
        $this->MarkUpRate2->setVisibility();
        $this->MarkDownRate2->setVisibility();
        $this->_Yield->setVisibility();
        $this->RefProductCode->setVisibility();
        $this->Volume->setVisibility();
        $this->MeasurementID->setVisibility();
        $this->CountryCode->setVisibility();
        $this->AcceptWMQty->setVisibility();
        $this->SingleBatchBasedOnRate->setVisibility();
        $this->TenderNo->setVisibility();
        $this->SingleBillMaximumSoldQtyFiled->setVisibility();
        $this->Strength1->setVisibility();
        $this->Strength2->setVisibility();
        $this->Strength3->setVisibility();
        $this->Strength4->setVisibility();
        $this->Strength5->setVisibility();
        $this->IngredientCode1->setVisibility();
        $this->IngredientCode2->setVisibility();
        $this->IngredientCode3->setVisibility();
        $this->IngredientCode4->setVisibility();
        $this->IngredientCode5->setVisibility();
        $this->OrderType->setVisibility();
        $this->StockUOM->setVisibility();
        $this->PriceUOM->setVisibility();
        $this->DefaultSaleUOM->setVisibility();
        $this->DefaultPurchaseUOM->setVisibility();
        $this->ReportingUOM->setVisibility();
        $this->LastPurchasedUOM->setVisibility();
        $this->TreatmentCodes->setVisibility();
        $this->InsuranceType->setVisibility();
        $this->CoverageGroupCodes->setVisibility();
        $this->MultipleUOM->setVisibility();
        $this->SalePriceComputation->setVisibility();
        $this->StockCorrection->setVisibility();
        $this->LBTPercentage->setVisibility();
        $this->SalesCommission->setVisibility();
        $this->LockedStock->setVisibility();
        $this->MinMaxUOM->setVisibility();
        $this->ExpiryMfrDateFormat->setVisibility();
        $this->ProductLifeTime->setVisibility();
        $this->IsCombo->setVisibility();
        $this->ComboTypeCode->setVisibility();
        $this->AttributeCount6->setVisibility();
        $this->AttributeCount7->setVisibility();
        $this->AttributeCount8->setVisibility();
        $this->AttributeCount9->setVisibility();
        $this->AttributeCount10->setVisibility();
        $this->LabourCharge->setVisibility();
        $this->AffectOtherCharge->setVisibility();
        $this->DosageInfo->setVisibility();
        $this->DosageType->setVisibility();
        $this->DefaultIndentUOM->setVisibility();
        $this->PromoTag->setVisibility();
        $this->BillLevelPromoTag->setVisibility();
        $this->IsMRPProduct->setVisibility();
        $this->MrpList->setVisibility();
        $this->AlternateSaleUOM->setVisibility();
        $this->FreeUOM->setVisibility();
        $this->MarketedCode->setVisibility();
        $this->MinimumSalePrice->setVisibility();
        $this->PRate1->setVisibility();
        $this->PRate2->setVisibility();
        $this->LPItemCost->setVisibility();
        $this->FixedItemCost->setVisibility();
        $this->HSNId->setVisibility();
        $this->TaxInclusive->setVisibility();
        $this->EligibleforWarranty->setVisibility();
        $this->NoofMonthsWarranty->setVisibility();
        $this->ComputeTaxonCost->setVisibility();
        $this->HasEmptyBottleTrack->setVisibility();
        $this->EmptyBottleReferenceCode->setVisibility();
        $this->AdditionalCESSAmount->setVisibility();
        $this->EmptyBottleRate->setVisibility();
        $this->hideFieldsForAddEdit();

        // Do not use lookup cache
        $this->setUseLookupCache(false);

        // Global Page Loading event (in userfn*.php)
        Page_Loading();

        // Page Load event
        if (method_exists($this, "pageLoad")) {
            $this->pageLoad();
        }

        // Set up lookup cache

        // Check modal
        if ($this->IsModal) {
            $SkipHeaderFooter = true;
        }
        $this->IsMobileOrModal = IsMobile() || $this->IsModal;
        $this->FormClassName = "ew-form ew-add-form ew-horizontal";
        $postBack = false;

        // Set up current action
        if (IsApi()) {
            $this->CurrentAction = "insert"; // Add record directly
            $postBack = true;
        } elseif (Post("action") !== null) {
            $this->CurrentAction = Post("action"); // Get form action
            $postBack = true;
        } else {
            // Load key values from QueryString
            $this->CopyRecord = true;
            if (($keyValue = Get("ProductCode") ?? Route("ProductCode")) !== null) {
                $this->ProductCode->setQueryStringValue($keyValue);
                $this->setKey("ProductCode", $this->ProductCode->CurrentValue); // Set up key
            } else {
                $this->setKey("ProductCode", ""); // Clear key
                $this->CopyRecord = false;
            }
            if ($this->CopyRecord) {
                $this->CurrentAction = "copy"; // Copy record
            } else {
                $this->CurrentAction = "show"; // Display blank record
            }
        }

        // Load old record / default values
        $loaded = $this->loadOldRecord();

        // Load form values
        if ($postBack) {
            $this->loadFormValues(); // Load form values
        }

        // Validate form if post back
        if ($postBack) {
            if (!$this->validateForm()) {
                $this->EventCancelled = true; // Event cancelled
                $this->restoreFormValues(); // Restore form values
                if (IsApi()) {
                    $this->terminate();
                    return;
                } else {
                    $this->CurrentAction = "show"; // Form error, reset action
                }
            }
        }

        // Perform current action
        switch ($this->CurrentAction) {
            case "copy": // Copy an existing record
                if (!$loaded) { // Record not loaded
                    if ($this->getFailureMessage() == "") {
                        $this->setFailureMessage($Language->phrase("NoRecord")); // No record found
                    }
                    $this->terminate("PharmacyProductsList"); // No matching record, return to list
                    return;
                }
                break;
            case "insert": // Add new record
                $this->SendEmail = true; // Send email on add success
                if ($this->addRow($this->OldRecordset)) { // Add successful
                    if ($this->getSuccessMessage() == "" && Post("addopt") != "1") { // Skip success message for addopt (done in JavaScript)
                        $this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
                    }
                    $returnUrl = $this->getReturnUrl();
                    if (GetPageName($returnUrl) == "PharmacyProductsList") {
                        $returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
                    } elseif (GetPageName($returnUrl) == "PharmacyProductsView") {
                        $returnUrl = $this->getViewUrl(); // View page, return to View page with keyurl directly
                    }
                    if (IsApi()) { // Return to caller
                        $this->terminate(true);
                        return;
                    } else {
                        $this->terminate($returnUrl);
                        return;
                    }
                } elseif (IsApi()) { // API request, return
                    $this->terminate();
                    return;
                } else {
                    $this->EventCancelled = true; // Event cancelled
                    $this->restoreFormValues(); // Add failed, restore form values
                }
        }

        // Set up Breadcrumb
        $this->setupBreadcrumb();

        // Render row based on row type
        $this->RowType = ROWTYPE_ADD; // Render add type

        // Render row
        $this->resetAttributes();
        $this->renderRow();

        // Set LoginStatus / Page_Rendering / Page_Render
        if (!IsApi() && !$this->isTerminated()) {
            // Pass table and field properties to client side
            $this->toClientVar(["tableCaption"], ["caption", "Required", "IsInvalid", "Raw"]);

            // Pass login status to client side
            SetClientVar("login", LoginStatus());

            // Global Page Rendering event (in userfn*.php)
            Page_Rendering();

            // Page Rendering event
            if (method_exists($this, "pageRender")) {
                $this->pageRender();
            }
        }
    }

    // Get upload files
    protected function getUploadFiles()
    {
        global $CurrentForm, $Language;
    }

    // Load default values
    protected function loadDefaultValues()
    {
        $this->ProductCode->CurrentValue = null;
        $this->ProductCode->OldValue = $this->ProductCode->CurrentValue;
        $this->ProductName->CurrentValue = null;
        $this->ProductName->OldValue = $this->ProductName->CurrentValue;
        $this->DivisionCode->CurrentValue = null;
        $this->DivisionCode->OldValue = $this->DivisionCode->CurrentValue;
        $this->ManufacturerCode->CurrentValue = null;
        $this->ManufacturerCode->OldValue = $this->ManufacturerCode->CurrentValue;
        $this->SupplierCode->CurrentValue = null;
        $this->SupplierCode->OldValue = $this->SupplierCode->CurrentValue;
        $this->AlternateSupplierCodes->CurrentValue = null;
        $this->AlternateSupplierCodes->OldValue = $this->AlternateSupplierCodes->CurrentValue;
        $this->AlternateProductCode->CurrentValue = null;
        $this->AlternateProductCode->OldValue = $this->AlternateProductCode->CurrentValue;
        $this->UniversalProductCode->CurrentValue = null;
        $this->UniversalProductCode->OldValue = $this->UniversalProductCode->CurrentValue;
        $this->BookProductCode->CurrentValue = null;
        $this->BookProductCode->OldValue = $this->BookProductCode->CurrentValue;
        $this->OldCode->CurrentValue = null;
        $this->OldCode->OldValue = $this->OldCode->CurrentValue;
        $this->ProtectedProducts->CurrentValue = null;
        $this->ProtectedProducts->OldValue = $this->ProtectedProducts->CurrentValue;
        $this->ProductFullName->CurrentValue = null;
        $this->ProductFullName->OldValue = $this->ProductFullName->CurrentValue;
        $this->UnitOfMeasure->CurrentValue = null;
        $this->UnitOfMeasure->OldValue = $this->UnitOfMeasure->CurrentValue;
        $this->UnitDescription->CurrentValue = null;
        $this->UnitDescription->OldValue = $this->UnitDescription->CurrentValue;
        $this->BulkDescription->CurrentValue = null;
        $this->BulkDescription->OldValue = $this->BulkDescription->CurrentValue;
        $this->BarCodeDescription->CurrentValue = null;
        $this->BarCodeDescription->OldValue = $this->BarCodeDescription->CurrentValue;
        $this->PackageInformation->CurrentValue = null;
        $this->PackageInformation->OldValue = $this->PackageInformation->CurrentValue;
        $this->PackageId->CurrentValue = null;
        $this->PackageId->OldValue = $this->PackageId->CurrentValue;
        $this->Weight->CurrentValue = null;
        $this->Weight->OldValue = $this->Weight->CurrentValue;
        $this->AllowFractions->CurrentValue = null;
        $this->AllowFractions->OldValue = $this->AllowFractions->CurrentValue;
        $this->MinimumStockLevel->CurrentValue = null;
        $this->MinimumStockLevel->OldValue = $this->MinimumStockLevel->CurrentValue;
        $this->MaximumStockLevel->CurrentValue = null;
        $this->MaximumStockLevel->OldValue = $this->MaximumStockLevel->CurrentValue;
        $this->ReorderLevel->CurrentValue = null;
        $this->ReorderLevel->OldValue = $this->ReorderLevel->CurrentValue;
        $this->MinMaxRatio->CurrentValue = null;
        $this->MinMaxRatio->OldValue = $this->MinMaxRatio->CurrentValue;
        $this->AutoMinMaxRatio->CurrentValue = null;
        $this->AutoMinMaxRatio->OldValue = $this->AutoMinMaxRatio->CurrentValue;
        $this->ScheduleCode->CurrentValue = null;
        $this->ScheduleCode->OldValue = $this->ScheduleCode->CurrentValue;
        $this->RopRatio->CurrentValue = null;
        $this->RopRatio->OldValue = $this->RopRatio->CurrentValue;
        $this->MRP->CurrentValue = null;
        $this->MRP->OldValue = $this->MRP->CurrentValue;
        $this->PurchasePrice->CurrentValue = null;
        $this->PurchasePrice->OldValue = $this->PurchasePrice->CurrentValue;
        $this->PurchaseUnit->CurrentValue = null;
        $this->PurchaseUnit->OldValue = $this->PurchaseUnit->CurrentValue;
        $this->PurchaseTaxCode->CurrentValue = null;
        $this->PurchaseTaxCode->OldValue = $this->PurchaseTaxCode->CurrentValue;
        $this->AllowDirectInward->CurrentValue = null;
        $this->AllowDirectInward->OldValue = $this->AllowDirectInward->CurrentValue;
        $this->SalePrice->CurrentValue = null;
        $this->SalePrice->OldValue = $this->SalePrice->CurrentValue;
        $this->SaleUnit->CurrentValue = null;
        $this->SaleUnit->OldValue = $this->SaleUnit->CurrentValue;
        $this->SalesTaxCode->CurrentValue = null;
        $this->SalesTaxCode->OldValue = $this->SalesTaxCode->CurrentValue;
        $this->StockReceived->CurrentValue = null;
        $this->StockReceived->OldValue = $this->StockReceived->CurrentValue;
        $this->TotalStock->CurrentValue = null;
        $this->TotalStock->OldValue = $this->TotalStock->CurrentValue;
        $this->StockType->CurrentValue = null;
        $this->StockType->OldValue = $this->StockType->CurrentValue;
        $this->StockCheckDate->CurrentValue = null;
        $this->StockCheckDate->OldValue = $this->StockCheckDate->CurrentValue;
        $this->StockAdjustmentDate->CurrentValue = null;
        $this->StockAdjustmentDate->OldValue = $this->StockAdjustmentDate->CurrentValue;
        $this->Remarks->CurrentValue = null;
        $this->Remarks->OldValue = $this->Remarks->CurrentValue;
        $this->CostCentre->CurrentValue = null;
        $this->CostCentre->OldValue = $this->CostCentre->CurrentValue;
        $this->ProductType->CurrentValue = null;
        $this->ProductType->OldValue = $this->ProductType->CurrentValue;
        $this->TaxAmount->CurrentValue = null;
        $this->TaxAmount->OldValue = $this->TaxAmount->CurrentValue;
        $this->TaxId->CurrentValue = null;
        $this->TaxId->OldValue = $this->TaxId->CurrentValue;
        $this->ResaleTaxApplicable->CurrentValue = null;
        $this->ResaleTaxApplicable->OldValue = $this->ResaleTaxApplicable->CurrentValue;
        $this->CstOtherTax->CurrentValue = null;
        $this->CstOtherTax->OldValue = $this->CstOtherTax->CurrentValue;
        $this->TotalTax->CurrentValue = null;
        $this->TotalTax->OldValue = $this->TotalTax->CurrentValue;
        $this->ItemCost->CurrentValue = null;
        $this->ItemCost->OldValue = $this->ItemCost->CurrentValue;
        $this->ExpiryDate->CurrentValue = null;
        $this->ExpiryDate->OldValue = $this->ExpiryDate->CurrentValue;
        $this->BatchDescription->CurrentValue = null;
        $this->BatchDescription->OldValue = $this->BatchDescription->CurrentValue;
        $this->FreeScheme->CurrentValue = null;
        $this->FreeScheme->OldValue = $this->FreeScheme->CurrentValue;
        $this->CashDiscountEligibility->CurrentValue = null;
        $this->CashDiscountEligibility->OldValue = $this->CashDiscountEligibility->CurrentValue;
        $this->DiscountPerAllowInBill->CurrentValue = null;
        $this->DiscountPerAllowInBill->OldValue = $this->DiscountPerAllowInBill->CurrentValue;
        $this->Discount->CurrentValue = null;
        $this->Discount->OldValue = $this->Discount->CurrentValue;
        $this->TotalAmount->CurrentValue = null;
        $this->TotalAmount->OldValue = $this->TotalAmount->CurrentValue;
        $this->StandardMargin->CurrentValue = null;
        $this->StandardMargin->OldValue = $this->StandardMargin->CurrentValue;
        $this->Margin->CurrentValue = null;
        $this->Margin->OldValue = $this->Margin->CurrentValue;
        $this->MarginId->CurrentValue = null;
        $this->MarginId->OldValue = $this->MarginId->CurrentValue;
        $this->ExpectedMargin->CurrentValue = null;
        $this->ExpectedMargin->OldValue = $this->ExpectedMargin->CurrentValue;
        $this->SurchargeBeforeTax->CurrentValue = null;
        $this->SurchargeBeforeTax->OldValue = $this->SurchargeBeforeTax->CurrentValue;
        $this->SurchargeAfterTax->CurrentValue = null;
        $this->SurchargeAfterTax->OldValue = $this->SurchargeAfterTax->CurrentValue;
        $this->TempOrderNo->CurrentValue = null;
        $this->TempOrderNo->OldValue = $this->TempOrderNo->CurrentValue;
        $this->TempOrderDate->CurrentValue = null;
        $this->TempOrderDate->OldValue = $this->TempOrderDate->CurrentValue;
        $this->OrderUnit->CurrentValue = null;
        $this->OrderUnit->OldValue = $this->OrderUnit->CurrentValue;
        $this->OrderQuantity->CurrentValue = null;
        $this->OrderQuantity->OldValue = $this->OrderQuantity->CurrentValue;
        $this->MarkForOrder->CurrentValue = null;
        $this->MarkForOrder->OldValue = $this->MarkForOrder->CurrentValue;
        $this->OrderAllId->CurrentValue = null;
        $this->OrderAllId->OldValue = $this->OrderAllId->CurrentValue;
        $this->CalculateOrderQty->CurrentValue = null;
        $this->CalculateOrderQty->OldValue = $this->CalculateOrderQty->CurrentValue;
        $this->SubLocation->CurrentValue = null;
        $this->SubLocation->OldValue = $this->SubLocation->CurrentValue;
        $this->CategoryCode->CurrentValue = null;
        $this->CategoryCode->OldValue = $this->CategoryCode->CurrentValue;
        $this->SubCategory->CurrentValue = null;
        $this->SubCategory->OldValue = $this->SubCategory->CurrentValue;
        $this->FlexCategoryCode->CurrentValue = null;
        $this->FlexCategoryCode->OldValue = $this->FlexCategoryCode->CurrentValue;
        $this->ABCSaleQty->CurrentValue = null;
        $this->ABCSaleQty->OldValue = $this->ABCSaleQty->CurrentValue;
        $this->ABCSaleValue->CurrentValue = null;
        $this->ABCSaleValue->OldValue = $this->ABCSaleValue->CurrentValue;
        $this->ConvertionFactor->CurrentValue = null;
        $this->ConvertionFactor->OldValue = $this->ConvertionFactor->CurrentValue;
        $this->ConvertionUnitDesc->CurrentValue = null;
        $this->ConvertionUnitDesc->OldValue = $this->ConvertionUnitDesc->CurrentValue;
        $this->TransactionId->CurrentValue = null;
        $this->TransactionId->OldValue = $this->TransactionId->CurrentValue;
        $this->SoldProductId->CurrentValue = null;
        $this->SoldProductId->OldValue = $this->SoldProductId->CurrentValue;
        $this->WantedBookId->CurrentValue = null;
        $this->WantedBookId->OldValue = $this->WantedBookId->CurrentValue;
        $this->AllId->CurrentValue = null;
        $this->AllId->OldValue = $this->AllId->CurrentValue;
        $this->BatchAndExpiryCompulsory->CurrentValue = null;
        $this->BatchAndExpiryCompulsory->OldValue = $this->BatchAndExpiryCompulsory->CurrentValue;
        $this->BatchStockForWantedBook->CurrentValue = null;
        $this->BatchStockForWantedBook->OldValue = $this->BatchStockForWantedBook->CurrentValue;
        $this->UnitBasedBilling->CurrentValue = null;
        $this->UnitBasedBilling->OldValue = $this->UnitBasedBilling->CurrentValue;
        $this->DoNotCheckStock->CurrentValue = null;
        $this->DoNotCheckStock->OldValue = $this->DoNotCheckStock->CurrentValue;
        $this->AcceptRate->CurrentValue = null;
        $this->AcceptRate->OldValue = $this->AcceptRate->CurrentValue;
        $this->PriceLevel->CurrentValue = null;
        $this->PriceLevel->OldValue = $this->PriceLevel->CurrentValue;
        $this->LastQuotePrice->CurrentValue = null;
        $this->LastQuotePrice->OldValue = $this->LastQuotePrice->CurrentValue;
        $this->PriceChange->CurrentValue = null;
        $this->PriceChange->OldValue = $this->PriceChange->CurrentValue;
        $this->CommodityCode->CurrentValue = null;
        $this->CommodityCode->OldValue = $this->CommodityCode->CurrentValue;
        $this->InstitutePrice->CurrentValue = null;
        $this->InstitutePrice->OldValue = $this->InstitutePrice->CurrentValue;
        $this->CtrlOrDCtrlProduct->CurrentValue = null;
        $this->CtrlOrDCtrlProduct->OldValue = $this->CtrlOrDCtrlProduct->CurrentValue;
        $this->ImportedDate->CurrentValue = null;
        $this->ImportedDate->OldValue = $this->ImportedDate->CurrentValue;
        $this->IsImported->CurrentValue = null;
        $this->IsImported->OldValue = $this->IsImported->CurrentValue;
        $this->FileName->CurrentValue = null;
        $this->FileName->OldValue = $this->FileName->CurrentValue;
        $this->LPName->CurrentValue = null;
        $this->LPName->OldValue = $this->LPName->CurrentValue;
        $this->GodownNumber->CurrentValue = null;
        $this->GodownNumber->OldValue = $this->GodownNumber->CurrentValue;
        $this->CreationDate->CurrentValue = null;
        $this->CreationDate->OldValue = $this->CreationDate->CurrentValue;
        $this->CreatedbyUser->CurrentValue = null;
        $this->CreatedbyUser->OldValue = $this->CreatedbyUser->CurrentValue;
        $this->ModifiedDate->CurrentValue = null;
        $this->ModifiedDate->OldValue = $this->ModifiedDate->CurrentValue;
        $this->ModifiedbyUser->CurrentValue = null;
        $this->ModifiedbyUser->OldValue = $this->ModifiedbyUser->CurrentValue;
        $this->isActive->CurrentValue = null;
        $this->isActive->OldValue = $this->isActive->CurrentValue;
        $this->AllowExpiryClaim->CurrentValue = null;
        $this->AllowExpiryClaim->OldValue = $this->AllowExpiryClaim->CurrentValue;
        $this->BrandCode->CurrentValue = null;
        $this->BrandCode->OldValue = $this->BrandCode->CurrentValue;
        $this->FreeSchemeBasedon->CurrentValue = null;
        $this->FreeSchemeBasedon->OldValue = $this->FreeSchemeBasedon->CurrentValue;
        $this->DoNotCheckCostInBill->CurrentValue = null;
        $this->DoNotCheckCostInBill->OldValue = $this->DoNotCheckCostInBill->CurrentValue;
        $this->ProductGroupCode->CurrentValue = null;
        $this->ProductGroupCode->OldValue = $this->ProductGroupCode->CurrentValue;
        $this->ProductStrengthCode->CurrentValue = null;
        $this->ProductStrengthCode->OldValue = $this->ProductStrengthCode->CurrentValue;
        $this->PackingCode->CurrentValue = null;
        $this->PackingCode->OldValue = $this->PackingCode->CurrentValue;
        $this->ComputedMinStock->CurrentValue = null;
        $this->ComputedMinStock->OldValue = $this->ComputedMinStock->CurrentValue;
        $this->ComputedMaxStock->CurrentValue = null;
        $this->ComputedMaxStock->OldValue = $this->ComputedMaxStock->CurrentValue;
        $this->ProductRemark->CurrentValue = null;
        $this->ProductRemark->OldValue = $this->ProductRemark->CurrentValue;
        $this->ProductDrugCode->CurrentValue = null;
        $this->ProductDrugCode->OldValue = $this->ProductDrugCode->CurrentValue;
        $this->IsMatrixProduct->CurrentValue = null;
        $this->IsMatrixProduct->OldValue = $this->IsMatrixProduct->CurrentValue;
        $this->AttributeCount1->CurrentValue = null;
        $this->AttributeCount1->OldValue = $this->AttributeCount1->CurrentValue;
        $this->AttributeCount2->CurrentValue = null;
        $this->AttributeCount2->OldValue = $this->AttributeCount2->CurrentValue;
        $this->AttributeCount3->CurrentValue = null;
        $this->AttributeCount3->OldValue = $this->AttributeCount3->CurrentValue;
        $this->AttributeCount4->CurrentValue = null;
        $this->AttributeCount4->OldValue = $this->AttributeCount4->CurrentValue;
        $this->AttributeCount5->CurrentValue = null;
        $this->AttributeCount5->OldValue = $this->AttributeCount5->CurrentValue;
        $this->DefaultDiscountPercentage->CurrentValue = null;
        $this->DefaultDiscountPercentage->OldValue = $this->DefaultDiscountPercentage->CurrentValue;
        $this->DonotPrintBarcode->CurrentValue = null;
        $this->DonotPrintBarcode->OldValue = $this->DonotPrintBarcode->CurrentValue;
        $this->ProductLevelDiscount->CurrentValue = null;
        $this->ProductLevelDiscount->OldValue = $this->ProductLevelDiscount->CurrentValue;
        $this->Markup->CurrentValue = null;
        $this->Markup->OldValue = $this->Markup->CurrentValue;
        $this->MarkDown->CurrentValue = null;
        $this->MarkDown->OldValue = $this->MarkDown->CurrentValue;
        $this->ReworkSalePrice->CurrentValue = null;
        $this->ReworkSalePrice->OldValue = $this->ReworkSalePrice->CurrentValue;
        $this->MultipleInput->CurrentValue = null;
        $this->MultipleInput->OldValue = $this->MultipleInput->CurrentValue;
        $this->LpPackageInformation->CurrentValue = null;
        $this->LpPackageInformation->OldValue = $this->LpPackageInformation->CurrentValue;
        $this->AllowNegativeStock->CurrentValue = null;
        $this->AllowNegativeStock->OldValue = $this->AllowNegativeStock->CurrentValue;
        $this->OrderDate->CurrentValue = null;
        $this->OrderDate->OldValue = $this->OrderDate->CurrentValue;
        $this->OrderTime->CurrentValue = null;
        $this->OrderTime->OldValue = $this->OrderTime->CurrentValue;
        $this->RateGroupCode->CurrentValue = null;
        $this->RateGroupCode->OldValue = $this->RateGroupCode->CurrentValue;
        $this->ConversionCaseLot->CurrentValue = null;
        $this->ConversionCaseLot->OldValue = $this->ConversionCaseLot->CurrentValue;
        $this->ShippingLot->CurrentValue = null;
        $this->ShippingLot->OldValue = $this->ShippingLot->CurrentValue;
        $this->AllowExpiryReplacement->CurrentValue = null;
        $this->AllowExpiryReplacement->OldValue = $this->AllowExpiryReplacement->CurrentValue;
        $this->NoOfMonthExpiryAllowed->CurrentValue = null;
        $this->NoOfMonthExpiryAllowed->OldValue = $this->NoOfMonthExpiryAllowed->CurrentValue;
        $this->ProductDiscountEligibility->CurrentValue = null;
        $this->ProductDiscountEligibility->OldValue = $this->ProductDiscountEligibility->CurrentValue;
        $this->ScheduleTypeCode->CurrentValue = null;
        $this->ScheduleTypeCode->OldValue = $this->ScheduleTypeCode->CurrentValue;
        $this->AIOCDProductCode->CurrentValue = null;
        $this->AIOCDProductCode->OldValue = $this->AIOCDProductCode->CurrentValue;
        $this->FreeQuantity->CurrentValue = null;
        $this->FreeQuantity->OldValue = $this->FreeQuantity->CurrentValue;
        $this->DiscountType->CurrentValue = null;
        $this->DiscountType->OldValue = $this->DiscountType->CurrentValue;
        $this->DiscountValue->CurrentValue = null;
        $this->DiscountValue->OldValue = $this->DiscountValue->CurrentValue;
        $this->HasProductOrderAttribute->CurrentValue = null;
        $this->HasProductOrderAttribute->OldValue = $this->HasProductOrderAttribute->CurrentValue;
        $this->FirstPODate->CurrentValue = null;
        $this->FirstPODate->OldValue = $this->FirstPODate->CurrentValue;
        $this->SaleprcieAndMrpCalcPercent->CurrentValue = null;
        $this->SaleprcieAndMrpCalcPercent->OldValue = $this->SaleprcieAndMrpCalcPercent->CurrentValue;
        $this->IsGiftVoucherProducts->CurrentValue = null;
        $this->IsGiftVoucherProducts->OldValue = $this->IsGiftVoucherProducts->CurrentValue;
        $this->AcceptRange4SerialNumber->CurrentValue = null;
        $this->AcceptRange4SerialNumber->OldValue = $this->AcceptRange4SerialNumber->CurrentValue;
        $this->GiftVoucherDenomination->CurrentValue = null;
        $this->GiftVoucherDenomination->OldValue = $this->GiftVoucherDenomination->CurrentValue;
        $this->Subclasscode->CurrentValue = null;
        $this->Subclasscode->OldValue = $this->Subclasscode->CurrentValue;
        $this->BarCodeFromWeighingMachine->CurrentValue = null;
        $this->BarCodeFromWeighingMachine->OldValue = $this->BarCodeFromWeighingMachine->CurrentValue;
        $this->CheckCostInReturn->CurrentValue = null;
        $this->CheckCostInReturn->OldValue = $this->CheckCostInReturn->CurrentValue;
        $this->FrequentSaleProduct->CurrentValue = null;
        $this->FrequentSaleProduct->OldValue = $this->FrequentSaleProduct->CurrentValue;
        $this->RateType->CurrentValue = null;
        $this->RateType->OldValue = $this->RateType->CurrentValue;
        $this->TouchscreenName->CurrentValue = null;
        $this->TouchscreenName->OldValue = $this->TouchscreenName->CurrentValue;
        $this->FreeType->CurrentValue = null;
        $this->FreeType->OldValue = $this->FreeType->CurrentValue;
        $this->LooseQtyasNewBatch->CurrentValue = null;
        $this->LooseQtyasNewBatch->OldValue = $this->LooseQtyasNewBatch->CurrentValue;
        $this->AllowSlabBilling->CurrentValue = null;
        $this->AllowSlabBilling->OldValue = $this->AllowSlabBilling->CurrentValue;
        $this->ProductTypeForProduction->CurrentValue = null;
        $this->ProductTypeForProduction->OldValue = $this->ProductTypeForProduction->CurrentValue;
        $this->RecipeCode->CurrentValue = null;
        $this->RecipeCode->OldValue = $this->RecipeCode->CurrentValue;
        $this->DefaultUnitType->CurrentValue = null;
        $this->DefaultUnitType->OldValue = $this->DefaultUnitType->CurrentValue;
        $this->PIstatus->CurrentValue = null;
        $this->PIstatus->OldValue = $this->PIstatus->CurrentValue;
        $this->LastPiConfirmedDate->CurrentValue = null;
        $this->LastPiConfirmedDate->OldValue = $this->LastPiConfirmedDate->CurrentValue;
        $this->BarCodeDesign->CurrentValue = null;
        $this->BarCodeDesign->OldValue = $this->BarCodeDesign->CurrentValue;
        $this->AcceptRemarksInBill->CurrentValue = null;
        $this->AcceptRemarksInBill->OldValue = $this->AcceptRemarksInBill->CurrentValue;
        $this->Classification->CurrentValue = null;
        $this->Classification->OldValue = $this->Classification->CurrentValue;
        $this->TimeSlot->CurrentValue = null;
        $this->TimeSlot->OldValue = $this->TimeSlot->CurrentValue;
        $this->IsBundle->CurrentValue = null;
        $this->IsBundle->OldValue = $this->IsBundle->CurrentValue;
        $this->ColorCode->CurrentValue = null;
        $this->ColorCode->OldValue = $this->ColorCode->CurrentValue;
        $this->GenderCode->CurrentValue = null;
        $this->GenderCode->OldValue = $this->GenderCode->CurrentValue;
        $this->SizeCode->CurrentValue = null;
        $this->SizeCode->OldValue = $this->SizeCode->CurrentValue;
        $this->GiftCard->CurrentValue = null;
        $this->GiftCard->OldValue = $this->GiftCard->CurrentValue;
        $this->ToonLabel->CurrentValue = null;
        $this->ToonLabel->OldValue = $this->ToonLabel->CurrentValue;
        $this->GarmentType->CurrentValue = null;
        $this->GarmentType->OldValue = $this->GarmentType->CurrentValue;
        $this->AgeGroup->CurrentValue = null;
        $this->AgeGroup->OldValue = $this->AgeGroup->CurrentValue;
        $this->Season->CurrentValue = null;
        $this->Season->OldValue = $this->Season->CurrentValue;
        $this->DailyStockEntry->CurrentValue = null;
        $this->DailyStockEntry->OldValue = $this->DailyStockEntry->CurrentValue;
        $this->ModifierApplicable->CurrentValue = null;
        $this->ModifierApplicable->OldValue = $this->ModifierApplicable->CurrentValue;
        $this->ModifierType->CurrentValue = null;
        $this->ModifierType->OldValue = $this->ModifierType->CurrentValue;
        $this->AcceptZeroRate->CurrentValue = null;
        $this->AcceptZeroRate->OldValue = $this->AcceptZeroRate->CurrentValue;
        $this->ExciseDutyCode->CurrentValue = null;
        $this->ExciseDutyCode->OldValue = $this->ExciseDutyCode->CurrentValue;
        $this->IndentProductGroupCode->CurrentValue = null;
        $this->IndentProductGroupCode->OldValue = $this->IndentProductGroupCode->CurrentValue;
        $this->IsMultiBatch->CurrentValue = null;
        $this->IsMultiBatch->OldValue = $this->IsMultiBatch->CurrentValue;
        $this->IsSingleBatch->CurrentValue = null;
        $this->IsSingleBatch->OldValue = $this->IsSingleBatch->CurrentValue;
        $this->MarkUpRate1->CurrentValue = null;
        $this->MarkUpRate1->OldValue = $this->MarkUpRate1->CurrentValue;
        $this->MarkDownRate1->CurrentValue = null;
        $this->MarkDownRate1->OldValue = $this->MarkDownRate1->CurrentValue;
        $this->MarkUpRate2->CurrentValue = null;
        $this->MarkUpRate2->OldValue = $this->MarkUpRate2->CurrentValue;
        $this->MarkDownRate2->CurrentValue = null;
        $this->MarkDownRate2->OldValue = $this->MarkDownRate2->CurrentValue;
        $this->_Yield->CurrentValue = null;
        $this->_Yield->OldValue = $this->_Yield->CurrentValue;
        $this->RefProductCode->CurrentValue = null;
        $this->RefProductCode->OldValue = $this->RefProductCode->CurrentValue;
        $this->Volume->CurrentValue = null;
        $this->Volume->OldValue = $this->Volume->CurrentValue;
        $this->MeasurementID->CurrentValue = null;
        $this->MeasurementID->OldValue = $this->MeasurementID->CurrentValue;
        $this->CountryCode->CurrentValue = null;
        $this->CountryCode->OldValue = $this->CountryCode->CurrentValue;
        $this->AcceptWMQty->CurrentValue = null;
        $this->AcceptWMQty->OldValue = $this->AcceptWMQty->CurrentValue;
        $this->SingleBatchBasedOnRate->CurrentValue = null;
        $this->SingleBatchBasedOnRate->OldValue = $this->SingleBatchBasedOnRate->CurrentValue;
        $this->TenderNo->CurrentValue = null;
        $this->TenderNo->OldValue = $this->TenderNo->CurrentValue;
        $this->SingleBillMaximumSoldQtyFiled->CurrentValue = null;
        $this->SingleBillMaximumSoldQtyFiled->OldValue = $this->SingleBillMaximumSoldQtyFiled->CurrentValue;
        $this->Strength1->CurrentValue = null;
        $this->Strength1->OldValue = $this->Strength1->CurrentValue;
        $this->Strength2->CurrentValue = null;
        $this->Strength2->OldValue = $this->Strength2->CurrentValue;
        $this->Strength3->CurrentValue = null;
        $this->Strength3->OldValue = $this->Strength3->CurrentValue;
        $this->Strength4->CurrentValue = null;
        $this->Strength4->OldValue = $this->Strength4->CurrentValue;
        $this->Strength5->CurrentValue = null;
        $this->Strength5->OldValue = $this->Strength5->CurrentValue;
        $this->IngredientCode1->CurrentValue = null;
        $this->IngredientCode1->OldValue = $this->IngredientCode1->CurrentValue;
        $this->IngredientCode2->CurrentValue = null;
        $this->IngredientCode2->OldValue = $this->IngredientCode2->CurrentValue;
        $this->IngredientCode3->CurrentValue = null;
        $this->IngredientCode3->OldValue = $this->IngredientCode3->CurrentValue;
        $this->IngredientCode4->CurrentValue = null;
        $this->IngredientCode4->OldValue = $this->IngredientCode4->CurrentValue;
        $this->IngredientCode5->CurrentValue = null;
        $this->IngredientCode5->OldValue = $this->IngredientCode5->CurrentValue;
        $this->OrderType->CurrentValue = null;
        $this->OrderType->OldValue = $this->OrderType->CurrentValue;
        $this->StockUOM->CurrentValue = null;
        $this->StockUOM->OldValue = $this->StockUOM->CurrentValue;
        $this->PriceUOM->CurrentValue = null;
        $this->PriceUOM->OldValue = $this->PriceUOM->CurrentValue;
        $this->DefaultSaleUOM->CurrentValue = null;
        $this->DefaultSaleUOM->OldValue = $this->DefaultSaleUOM->CurrentValue;
        $this->DefaultPurchaseUOM->CurrentValue = null;
        $this->DefaultPurchaseUOM->OldValue = $this->DefaultPurchaseUOM->CurrentValue;
        $this->ReportingUOM->CurrentValue = null;
        $this->ReportingUOM->OldValue = $this->ReportingUOM->CurrentValue;
        $this->LastPurchasedUOM->CurrentValue = null;
        $this->LastPurchasedUOM->OldValue = $this->LastPurchasedUOM->CurrentValue;
        $this->TreatmentCodes->CurrentValue = null;
        $this->TreatmentCodes->OldValue = $this->TreatmentCodes->CurrentValue;
        $this->InsuranceType->CurrentValue = null;
        $this->InsuranceType->OldValue = $this->InsuranceType->CurrentValue;
        $this->CoverageGroupCodes->CurrentValue = null;
        $this->CoverageGroupCodes->OldValue = $this->CoverageGroupCodes->CurrentValue;
        $this->MultipleUOM->CurrentValue = null;
        $this->MultipleUOM->OldValue = $this->MultipleUOM->CurrentValue;
        $this->SalePriceComputation->CurrentValue = null;
        $this->SalePriceComputation->OldValue = $this->SalePriceComputation->CurrentValue;
        $this->StockCorrection->CurrentValue = null;
        $this->StockCorrection->OldValue = $this->StockCorrection->CurrentValue;
        $this->LBTPercentage->CurrentValue = null;
        $this->LBTPercentage->OldValue = $this->LBTPercentage->CurrentValue;
        $this->SalesCommission->CurrentValue = null;
        $this->SalesCommission->OldValue = $this->SalesCommission->CurrentValue;
        $this->LockedStock->CurrentValue = null;
        $this->LockedStock->OldValue = $this->LockedStock->CurrentValue;
        $this->MinMaxUOM->CurrentValue = null;
        $this->MinMaxUOM->OldValue = $this->MinMaxUOM->CurrentValue;
        $this->ExpiryMfrDateFormat->CurrentValue = null;
        $this->ExpiryMfrDateFormat->OldValue = $this->ExpiryMfrDateFormat->CurrentValue;
        $this->ProductLifeTime->CurrentValue = null;
        $this->ProductLifeTime->OldValue = $this->ProductLifeTime->CurrentValue;
        $this->IsCombo->CurrentValue = null;
        $this->IsCombo->OldValue = $this->IsCombo->CurrentValue;
        $this->ComboTypeCode->CurrentValue = null;
        $this->ComboTypeCode->OldValue = $this->ComboTypeCode->CurrentValue;
        $this->AttributeCount6->CurrentValue = null;
        $this->AttributeCount6->OldValue = $this->AttributeCount6->CurrentValue;
        $this->AttributeCount7->CurrentValue = null;
        $this->AttributeCount7->OldValue = $this->AttributeCount7->CurrentValue;
        $this->AttributeCount8->CurrentValue = null;
        $this->AttributeCount8->OldValue = $this->AttributeCount8->CurrentValue;
        $this->AttributeCount9->CurrentValue = null;
        $this->AttributeCount9->OldValue = $this->AttributeCount9->CurrentValue;
        $this->AttributeCount10->CurrentValue = null;
        $this->AttributeCount10->OldValue = $this->AttributeCount10->CurrentValue;
        $this->LabourCharge->CurrentValue = null;
        $this->LabourCharge->OldValue = $this->LabourCharge->CurrentValue;
        $this->AffectOtherCharge->CurrentValue = null;
        $this->AffectOtherCharge->OldValue = $this->AffectOtherCharge->CurrentValue;
        $this->DosageInfo->CurrentValue = null;
        $this->DosageInfo->OldValue = $this->DosageInfo->CurrentValue;
        $this->DosageType->CurrentValue = null;
        $this->DosageType->OldValue = $this->DosageType->CurrentValue;
        $this->DefaultIndentUOM->CurrentValue = null;
        $this->DefaultIndentUOM->OldValue = $this->DefaultIndentUOM->CurrentValue;
        $this->PromoTag->CurrentValue = null;
        $this->PromoTag->OldValue = $this->PromoTag->CurrentValue;
        $this->BillLevelPromoTag->CurrentValue = null;
        $this->BillLevelPromoTag->OldValue = $this->BillLevelPromoTag->CurrentValue;
        $this->IsMRPProduct->CurrentValue = null;
        $this->IsMRPProduct->OldValue = $this->IsMRPProduct->CurrentValue;
        $this->MrpList->CurrentValue = null;
        $this->MrpList->OldValue = $this->MrpList->CurrentValue;
        $this->AlternateSaleUOM->CurrentValue = null;
        $this->AlternateSaleUOM->OldValue = $this->AlternateSaleUOM->CurrentValue;
        $this->FreeUOM->CurrentValue = null;
        $this->FreeUOM->OldValue = $this->FreeUOM->CurrentValue;
        $this->MarketedCode->CurrentValue = null;
        $this->MarketedCode->OldValue = $this->MarketedCode->CurrentValue;
        $this->MinimumSalePrice->CurrentValue = null;
        $this->MinimumSalePrice->OldValue = $this->MinimumSalePrice->CurrentValue;
        $this->PRate1->CurrentValue = null;
        $this->PRate1->OldValue = $this->PRate1->CurrentValue;
        $this->PRate2->CurrentValue = null;
        $this->PRate2->OldValue = $this->PRate2->CurrentValue;
        $this->LPItemCost->CurrentValue = null;
        $this->LPItemCost->OldValue = $this->LPItemCost->CurrentValue;
        $this->FixedItemCost->CurrentValue = null;
        $this->FixedItemCost->OldValue = $this->FixedItemCost->CurrentValue;
        $this->HSNId->CurrentValue = null;
        $this->HSNId->OldValue = $this->HSNId->CurrentValue;
        $this->TaxInclusive->CurrentValue = null;
        $this->TaxInclusive->OldValue = $this->TaxInclusive->CurrentValue;
        $this->EligibleforWarranty->CurrentValue = null;
        $this->EligibleforWarranty->OldValue = $this->EligibleforWarranty->CurrentValue;
        $this->NoofMonthsWarranty->CurrentValue = null;
        $this->NoofMonthsWarranty->OldValue = $this->NoofMonthsWarranty->CurrentValue;
        $this->ComputeTaxonCost->CurrentValue = null;
        $this->ComputeTaxonCost->OldValue = $this->ComputeTaxonCost->CurrentValue;
        $this->HasEmptyBottleTrack->CurrentValue = null;
        $this->HasEmptyBottleTrack->OldValue = $this->HasEmptyBottleTrack->CurrentValue;
        $this->EmptyBottleReferenceCode->CurrentValue = null;
        $this->EmptyBottleReferenceCode->OldValue = $this->EmptyBottleReferenceCode->CurrentValue;
        $this->AdditionalCESSAmount->CurrentValue = null;
        $this->AdditionalCESSAmount->OldValue = $this->AdditionalCESSAmount->CurrentValue;
        $this->EmptyBottleRate->CurrentValue = null;
        $this->EmptyBottleRate->OldValue = $this->EmptyBottleRate->CurrentValue;
    }

    // Load form values
    protected function loadFormValues()
    {
        // Load from form
        global $CurrentForm;

        // Check field name 'ProductName' first before field var 'x_ProductName'
        $val = $CurrentForm->hasValue("ProductName") ? $CurrentForm->getValue("ProductName") : $CurrentForm->getValue("x_ProductName");
        if (!$this->ProductName->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ProductName->Visible = false; // Disable update for API request
            } else {
                $this->ProductName->setFormValue($val);
            }
        }

        // Check field name 'DivisionCode' first before field var 'x_DivisionCode'
        $val = $CurrentForm->hasValue("DivisionCode") ? $CurrentForm->getValue("DivisionCode") : $CurrentForm->getValue("x_DivisionCode");
        if (!$this->DivisionCode->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DivisionCode->Visible = false; // Disable update for API request
            } else {
                $this->DivisionCode->setFormValue($val);
            }
        }

        // Check field name 'ManufacturerCode' first before field var 'x_ManufacturerCode'
        $val = $CurrentForm->hasValue("ManufacturerCode") ? $CurrentForm->getValue("ManufacturerCode") : $CurrentForm->getValue("x_ManufacturerCode");
        if (!$this->ManufacturerCode->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ManufacturerCode->Visible = false; // Disable update for API request
            } else {
                $this->ManufacturerCode->setFormValue($val);
            }
        }

        // Check field name 'SupplierCode' first before field var 'x_SupplierCode'
        $val = $CurrentForm->hasValue("SupplierCode") ? $CurrentForm->getValue("SupplierCode") : $CurrentForm->getValue("x_SupplierCode");
        if (!$this->SupplierCode->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SupplierCode->Visible = false; // Disable update for API request
            } else {
                $this->SupplierCode->setFormValue($val);
            }
        }

        // Check field name 'AlternateSupplierCodes' first before field var 'x_AlternateSupplierCodes'
        $val = $CurrentForm->hasValue("AlternateSupplierCodes") ? $CurrentForm->getValue("AlternateSupplierCodes") : $CurrentForm->getValue("x_AlternateSupplierCodes");
        if (!$this->AlternateSupplierCodes->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AlternateSupplierCodes->Visible = false; // Disable update for API request
            } else {
                $this->AlternateSupplierCodes->setFormValue($val);
            }
        }

        // Check field name 'AlternateProductCode' first before field var 'x_AlternateProductCode'
        $val = $CurrentForm->hasValue("AlternateProductCode") ? $CurrentForm->getValue("AlternateProductCode") : $CurrentForm->getValue("x_AlternateProductCode");
        if (!$this->AlternateProductCode->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AlternateProductCode->Visible = false; // Disable update for API request
            } else {
                $this->AlternateProductCode->setFormValue($val);
            }
        }

        // Check field name 'UniversalProductCode' first before field var 'x_UniversalProductCode'
        $val = $CurrentForm->hasValue("UniversalProductCode") ? $CurrentForm->getValue("UniversalProductCode") : $CurrentForm->getValue("x_UniversalProductCode");
        if (!$this->UniversalProductCode->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->UniversalProductCode->Visible = false; // Disable update for API request
            } else {
                $this->UniversalProductCode->setFormValue($val);
            }
        }

        // Check field name 'BookProductCode' first before field var 'x_BookProductCode'
        $val = $CurrentForm->hasValue("BookProductCode") ? $CurrentForm->getValue("BookProductCode") : $CurrentForm->getValue("x_BookProductCode");
        if (!$this->BookProductCode->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BookProductCode->Visible = false; // Disable update for API request
            } else {
                $this->BookProductCode->setFormValue($val);
            }
        }

        // Check field name 'OldCode' first before field var 'x_OldCode'
        $val = $CurrentForm->hasValue("OldCode") ? $CurrentForm->getValue("OldCode") : $CurrentForm->getValue("x_OldCode");
        if (!$this->OldCode->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->OldCode->Visible = false; // Disable update for API request
            } else {
                $this->OldCode->setFormValue($val);
            }
        }

        // Check field name 'ProtectedProducts' first before field var 'x_ProtectedProducts'
        $val = $CurrentForm->hasValue("ProtectedProducts") ? $CurrentForm->getValue("ProtectedProducts") : $CurrentForm->getValue("x_ProtectedProducts");
        if (!$this->ProtectedProducts->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ProtectedProducts->Visible = false; // Disable update for API request
            } else {
                $this->ProtectedProducts->setFormValue($val);
            }
        }

        // Check field name 'ProductFullName' first before field var 'x_ProductFullName'
        $val = $CurrentForm->hasValue("ProductFullName") ? $CurrentForm->getValue("ProductFullName") : $CurrentForm->getValue("x_ProductFullName");
        if (!$this->ProductFullName->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ProductFullName->Visible = false; // Disable update for API request
            } else {
                $this->ProductFullName->setFormValue($val);
            }
        }

        // Check field name 'UnitOfMeasure' first before field var 'x_UnitOfMeasure'
        $val = $CurrentForm->hasValue("UnitOfMeasure") ? $CurrentForm->getValue("UnitOfMeasure") : $CurrentForm->getValue("x_UnitOfMeasure");
        if (!$this->UnitOfMeasure->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->UnitOfMeasure->Visible = false; // Disable update for API request
            } else {
                $this->UnitOfMeasure->setFormValue($val);
            }
        }

        // Check field name 'UnitDescription' first before field var 'x_UnitDescription'
        $val = $CurrentForm->hasValue("UnitDescription") ? $CurrentForm->getValue("UnitDescription") : $CurrentForm->getValue("x_UnitDescription");
        if (!$this->UnitDescription->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->UnitDescription->Visible = false; // Disable update for API request
            } else {
                $this->UnitDescription->setFormValue($val);
            }
        }

        // Check field name 'BulkDescription' first before field var 'x_BulkDescription'
        $val = $CurrentForm->hasValue("BulkDescription") ? $CurrentForm->getValue("BulkDescription") : $CurrentForm->getValue("x_BulkDescription");
        if (!$this->BulkDescription->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BulkDescription->Visible = false; // Disable update for API request
            } else {
                $this->BulkDescription->setFormValue($val);
            }
        }

        // Check field name 'BarCodeDescription' first before field var 'x_BarCodeDescription'
        $val = $CurrentForm->hasValue("BarCodeDescription") ? $CurrentForm->getValue("BarCodeDescription") : $CurrentForm->getValue("x_BarCodeDescription");
        if (!$this->BarCodeDescription->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BarCodeDescription->Visible = false; // Disable update for API request
            } else {
                $this->BarCodeDescription->setFormValue($val);
            }
        }

        // Check field name 'PackageInformation' first before field var 'x_PackageInformation'
        $val = $CurrentForm->hasValue("PackageInformation") ? $CurrentForm->getValue("PackageInformation") : $CurrentForm->getValue("x_PackageInformation");
        if (!$this->PackageInformation->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PackageInformation->Visible = false; // Disable update for API request
            } else {
                $this->PackageInformation->setFormValue($val);
            }
        }

        // Check field name 'PackageId' first before field var 'x_PackageId'
        $val = $CurrentForm->hasValue("PackageId") ? $CurrentForm->getValue("PackageId") : $CurrentForm->getValue("x_PackageId");
        if (!$this->PackageId->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PackageId->Visible = false; // Disable update for API request
            } else {
                $this->PackageId->setFormValue($val);
            }
        }

        // Check field name 'Weight' first before field var 'x_Weight'
        $val = $CurrentForm->hasValue("Weight") ? $CurrentForm->getValue("Weight") : $CurrentForm->getValue("x_Weight");
        if (!$this->Weight->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Weight->Visible = false; // Disable update for API request
            } else {
                $this->Weight->setFormValue($val);
            }
        }

        // Check field name 'AllowFractions' first before field var 'x_AllowFractions'
        $val = $CurrentForm->hasValue("AllowFractions") ? $CurrentForm->getValue("AllowFractions") : $CurrentForm->getValue("x_AllowFractions");
        if (!$this->AllowFractions->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AllowFractions->Visible = false; // Disable update for API request
            } else {
                $this->AllowFractions->setFormValue($val);
            }
        }

        // Check field name 'MinimumStockLevel' first before field var 'x_MinimumStockLevel'
        $val = $CurrentForm->hasValue("MinimumStockLevel") ? $CurrentForm->getValue("MinimumStockLevel") : $CurrentForm->getValue("x_MinimumStockLevel");
        if (!$this->MinimumStockLevel->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->MinimumStockLevel->Visible = false; // Disable update for API request
            } else {
                $this->MinimumStockLevel->setFormValue($val);
            }
        }

        // Check field name 'MaximumStockLevel' first before field var 'x_MaximumStockLevel'
        $val = $CurrentForm->hasValue("MaximumStockLevel") ? $CurrentForm->getValue("MaximumStockLevel") : $CurrentForm->getValue("x_MaximumStockLevel");
        if (!$this->MaximumStockLevel->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->MaximumStockLevel->Visible = false; // Disable update for API request
            } else {
                $this->MaximumStockLevel->setFormValue($val);
            }
        }

        // Check field name 'ReorderLevel' first before field var 'x_ReorderLevel'
        $val = $CurrentForm->hasValue("ReorderLevel") ? $CurrentForm->getValue("ReorderLevel") : $CurrentForm->getValue("x_ReorderLevel");
        if (!$this->ReorderLevel->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ReorderLevel->Visible = false; // Disable update for API request
            } else {
                $this->ReorderLevel->setFormValue($val);
            }
        }

        // Check field name 'MinMaxRatio' first before field var 'x_MinMaxRatio'
        $val = $CurrentForm->hasValue("MinMaxRatio") ? $CurrentForm->getValue("MinMaxRatio") : $CurrentForm->getValue("x_MinMaxRatio");
        if (!$this->MinMaxRatio->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->MinMaxRatio->Visible = false; // Disable update for API request
            } else {
                $this->MinMaxRatio->setFormValue($val);
            }
        }

        // Check field name 'AutoMinMaxRatio' first before field var 'x_AutoMinMaxRatio'
        $val = $CurrentForm->hasValue("AutoMinMaxRatio") ? $CurrentForm->getValue("AutoMinMaxRatio") : $CurrentForm->getValue("x_AutoMinMaxRatio");
        if (!$this->AutoMinMaxRatio->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AutoMinMaxRatio->Visible = false; // Disable update for API request
            } else {
                $this->AutoMinMaxRatio->setFormValue($val);
            }
        }

        // Check field name 'ScheduleCode' first before field var 'x_ScheduleCode'
        $val = $CurrentForm->hasValue("ScheduleCode") ? $CurrentForm->getValue("ScheduleCode") : $CurrentForm->getValue("x_ScheduleCode");
        if (!$this->ScheduleCode->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ScheduleCode->Visible = false; // Disable update for API request
            } else {
                $this->ScheduleCode->setFormValue($val);
            }
        }

        // Check field name 'RopRatio' first before field var 'x_RopRatio'
        $val = $CurrentForm->hasValue("RopRatio") ? $CurrentForm->getValue("RopRatio") : $CurrentForm->getValue("x_RopRatio");
        if (!$this->RopRatio->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RopRatio->Visible = false; // Disable update for API request
            } else {
                $this->RopRatio->setFormValue($val);
            }
        }

        // Check field name 'MRP' first before field var 'x_MRP'
        $val = $CurrentForm->hasValue("MRP") ? $CurrentForm->getValue("MRP") : $CurrentForm->getValue("x_MRP");
        if (!$this->MRP->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->MRP->Visible = false; // Disable update for API request
            } else {
                $this->MRP->setFormValue($val);
            }
        }

        // Check field name 'PurchasePrice' first before field var 'x_PurchasePrice'
        $val = $CurrentForm->hasValue("PurchasePrice") ? $CurrentForm->getValue("PurchasePrice") : $CurrentForm->getValue("x_PurchasePrice");
        if (!$this->PurchasePrice->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PurchasePrice->Visible = false; // Disable update for API request
            } else {
                $this->PurchasePrice->setFormValue($val);
            }
        }

        // Check field name 'PurchaseUnit' first before field var 'x_PurchaseUnit'
        $val = $CurrentForm->hasValue("PurchaseUnit") ? $CurrentForm->getValue("PurchaseUnit") : $CurrentForm->getValue("x_PurchaseUnit");
        if (!$this->PurchaseUnit->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PurchaseUnit->Visible = false; // Disable update for API request
            } else {
                $this->PurchaseUnit->setFormValue($val);
            }
        }

        // Check field name 'PurchaseTaxCode' first before field var 'x_PurchaseTaxCode'
        $val = $CurrentForm->hasValue("PurchaseTaxCode") ? $CurrentForm->getValue("PurchaseTaxCode") : $CurrentForm->getValue("x_PurchaseTaxCode");
        if (!$this->PurchaseTaxCode->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PurchaseTaxCode->Visible = false; // Disable update for API request
            } else {
                $this->PurchaseTaxCode->setFormValue($val);
            }
        }

        // Check field name 'AllowDirectInward' first before field var 'x_AllowDirectInward'
        $val = $CurrentForm->hasValue("AllowDirectInward") ? $CurrentForm->getValue("AllowDirectInward") : $CurrentForm->getValue("x_AllowDirectInward");
        if (!$this->AllowDirectInward->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AllowDirectInward->Visible = false; // Disable update for API request
            } else {
                $this->AllowDirectInward->setFormValue($val);
            }
        }

        // Check field name 'SalePrice' first before field var 'x_SalePrice'
        $val = $CurrentForm->hasValue("SalePrice") ? $CurrentForm->getValue("SalePrice") : $CurrentForm->getValue("x_SalePrice");
        if (!$this->SalePrice->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SalePrice->Visible = false; // Disable update for API request
            } else {
                $this->SalePrice->setFormValue($val);
            }
        }

        // Check field name 'SaleUnit' first before field var 'x_SaleUnit'
        $val = $CurrentForm->hasValue("SaleUnit") ? $CurrentForm->getValue("SaleUnit") : $CurrentForm->getValue("x_SaleUnit");
        if (!$this->SaleUnit->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SaleUnit->Visible = false; // Disable update for API request
            } else {
                $this->SaleUnit->setFormValue($val);
            }
        }

        // Check field name 'SalesTaxCode' first before field var 'x_SalesTaxCode'
        $val = $CurrentForm->hasValue("SalesTaxCode") ? $CurrentForm->getValue("SalesTaxCode") : $CurrentForm->getValue("x_SalesTaxCode");
        if (!$this->SalesTaxCode->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SalesTaxCode->Visible = false; // Disable update for API request
            } else {
                $this->SalesTaxCode->setFormValue($val);
            }
        }

        // Check field name 'StockReceived' first before field var 'x_StockReceived'
        $val = $CurrentForm->hasValue("StockReceived") ? $CurrentForm->getValue("StockReceived") : $CurrentForm->getValue("x_StockReceived");
        if (!$this->StockReceived->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->StockReceived->Visible = false; // Disable update for API request
            } else {
                $this->StockReceived->setFormValue($val);
            }
        }

        // Check field name 'TotalStock' first before field var 'x_TotalStock'
        $val = $CurrentForm->hasValue("TotalStock") ? $CurrentForm->getValue("TotalStock") : $CurrentForm->getValue("x_TotalStock");
        if (!$this->TotalStock->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TotalStock->Visible = false; // Disable update for API request
            } else {
                $this->TotalStock->setFormValue($val);
            }
        }

        // Check field name 'StockType' first before field var 'x_StockType'
        $val = $CurrentForm->hasValue("StockType") ? $CurrentForm->getValue("StockType") : $CurrentForm->getValue("x_StockType");
        if (!$this->StockType->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->StockType->Visible = false; // Disable update for API request
            } else {
                $this->StockType->setFormValue($val);
            }
        }

        // Check field name 'StockCheckDate' first before field var 'x_StockCheckDate'
        $val = $CurrentForm->hasValue("StockCheckDate") ? $CurrentForm->getValue("StockCheckDate") : $CurrentForm->getValue("x_StockCheckDate");
        if (!$this->StockCheckDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->StockCheckDate->Visible = false; // Disable update for API request
            } else {
                $this->StockCheckDate->setFormValue($val);
            }
            $this->StockCheckDate->CurrentValue = UnFormatDateTime($this->StockCheckDate->CurrentValue, 0);
        }

        // Check field name 'StockAdjustmentDate' first before field var 'x_StockAdjustmentDate'
        $val = $CurrentForm->hasValue("StockAdjustmentDate") ? $CurrentForm->getValue("StockAdjustmentDate") : $CurrentForm->getValue("x_StockAdjustmentDate");
        if (!$this->StockAdjustmentDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->StockAdjustmentDate->Visible = false; // Disable update for API request
            } else {
                $this->StockAdjustmentDate->setFormValue($val);
            }
            $this->StockAdjustmentDate->CurrentValue = UnFormatDateTime($this->StockAdjustmentDate->CurrentValue, 0);
        }

        // Check field name 'Remarks' first before field var 'x_Remarks'
        $val = $CurrentForm->hasValue("Remarks") ? $CurrentForm->getValue("Remarks") : $CurrentForm->getValue("x_Remarks");
        if (!$this->Remarks->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Remarks->Visible = false; // Disable update for API request
            } else {
                $this->Remarks->setFormValue($val);
            }
        }

        // Check field name 'CostCentre' first before field var 'x_CostCentre'
        $val = $CurrentForm->hasValue("CostCentre") ? $CurrentForm->getValue("CostCentre") : $CurrentForm->getValue("x_CostCentre");
        if (!$this->CostCentre->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CostCentre->Visible = false; // Disable update for API request
            } else {
                $this->CostCentre->setFormValue($val);
            }
        }

        // Check field name 'ProductType' first before field var 'x_ProductType'
        $val = $CurrentForm->hasValue("ProductType") ? $CurrentForm->getValue("ProductType") : $CurrentForm->getValue("x_ProductType");
        if (!$this->ProductType->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ProductType->Visible = false; // Disable update for API request
            } else {
                $this->ProductType->setFormValue($val);
            }
        }

        // Check field name 'TaxAmount' first before field var 'x_TaxAmount'
        $val = $CurrentForm->hasValue("TaxAmount") ? $CurrentForm->getValue("TaxAmount") : $CurrentForm->getValue("x_TaxAmount");
        if (!$this->TaxAmount->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TaxAmount->Visible = false; // Disable update for API request
            } else {
                $this->TaxAmount->setFormValue($val);
            }
        }

        // Check field name 'TaxId' first before field var 'x_TaxId'
        $val = $CurrentForm->hasValue("TaxId") ? $CurrentForm->getValue("TaxId") : $CurrentForm->getValue("x_TaxId");
        if (!$this->TaxId->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TaxId->Visible = false; // Disable update for API request
            } else {
                $this->TaxId->setFormValue($val);
            }
        }

        // Check field name 'ResaleTaxApplicable' first before field var 'x_ResaleTaxApplicable'
        $val = $CurrentForm->hasValue("ResaleTaxApplicable") ? $CurrentForm->getValue("ResaleTaxApplicable") : $CurrentForm->getValue("x_ResaleTaxApplicable");
        if (!$this->ResaleTaxApplicable->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ResaleTaxApplicable->Visible = false; // Disable update for API request
            } else {
                $this->ResaleTaxApplicable->setFormValue($val);
            }
        }

        // Check field name 'CstOtherTax' first before field var 'x_CstOtherTax'
        $val = $CurrentForm->hasValue("CstOtherTax") ? $CurrentForm->getValue("CstOtherTax") : $CurrentForm->getValue("x_CstOtherTax");
        if (!$this->CstOtherTax->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CstOtherTax->Visible = false; // Disable update for API request
            } else {
                $this->CstOtherTax->setFormValue($val);
            }
        }

        // Check field name 'TotalTax' first before field var 'x_TotalTax'
        $val = $CurrentForm->hasValue("TotalTax") ? $CurrentForm->getValue("TotalTax") : $CurrentForm->getValue("x_TotalTax");
        if (!$this->TotalTax->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TotalTax->Visible = false; // Disable update for API request
            } else {
                $this->TotalTax->setFormValue($val);
            }
        }

        // Check field name 'ItemCost' first before field var 'x_ItemCost'
        $val = $CurrentForm->hasValue("ItemCost") ? $CurrentForm->getValue("ItemCost") : $CurrentForm->getValue("x_ItemCost");
        if (!$this->ItemCost->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ItemCost->Visible = false; // Disable update for API request
            } else {
                $this->ItemCost->setFormValue($val);
            }
        }

        // Check field name 'ExpiryDate' first before field var 'x_ExpiryDate'
        $val = $CurrentForm->hasValue("ExpiryDate") ? $CurrentForm->getValue("ExpiryDate") : $CurrentForm->getValue("x_ExpiryDate");
        if (!$this->ExpiryDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ExpiryDate->Visible = false; // Disable update for API request
            } else {
                $this->ExpiryDate->setFormValue($val);
            }
            $this->ExpiryDate->CurrentValue = UnFormatDateTime($this->ExpiryDate->CurrentValue, 0);
        }

        // Check field name 'BatchDescription' first before field var 'x_BatchDescription'
        $val = $CurrentForm->hasValue("BatchDescription") ? $CurrentForm->getValue("BatchDescription") : $CurrentForm->getValue("x_BatchDescription");
        if (!$this->BatchDescription->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BatchDescription->Visible = false; // Disable update for API request
            } else {
                $this->BatchDescription->setFormValue($val);
            }
        }

        // Check field name 'FreeScheme' first before field var 'x_FreeScheme'
        $val = $CurrentForm->hasValue("FreeScheme") ? $CurrentForm->getValue("FreeScheme") : $CurrentForm->getValue("x_FreeScheme");
        if (!$this->FreeScheme->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->FreeScheme->Visible = false; // Disable update for API request
            } else {
                $this->FreeScheme->setFormValue($val);
            }
        }

        // Check field name 'CashDiscountEligibility' first before field var 'x_CashDiscountEligibility'
        $val = $CurrentForm->hasValue("CashDiscountEligibility") ? $CurrentForm->getValue("CashDiscountEligibility") : $CurrentForm->getValue("x_CashDiscountEligibility");
        if (!$this->CashDiscountEligibility->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CashDiscountEligibility->Visible = false; // Disable update for API request
            } else {
                $this->CashDiscountEligibility->setFormValue($val);
            }
        }

        // Check field name 'DiscountPerAllowInBill' first before field var 'x_DiscountPerAllowInBill'
        $val = $CurrentForm->hasValue("DiscountPerAllowInBill") ? $CurrentForm->getValue("DiscountPerAllowInBill") : $CurrentForm->getValue("x_DiscountPerAllowInBill");
        if (!$this->DiscountPerAllowInBill->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DiscountPerAllowInBill->Visible = false; // Disable update for API request
            } else {
                $this->DiscountPerAllowInBill->setFormValue($val);
            }
        }

        // Check field name 'Discount' first before field var 'x_Discount'
        $val = $CurrentForm->hasValue("Discount") ? $CurrentForm->getValue("Discount") : $CurrentForm->getValue("x_Discount");
        if (!$this->Discount->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Discount->Visible = false; // Disable update for API request
            } else {
                $this->Discount->setFormValue($val);
            }
        }

        // Check field name 'TotalAmount' first before field var 'x_TotalAmount'
        $val = $CurrentForm->hasValue("TotalAmount") ? $CurrentForm->getValue("TotalAmount") : $CurrentForm->getValue("x_TotalAmount");
        if (!$this->TotalAmount->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TotalAmount->Visible = false; // Disable update for API request
            } else {
                $this->TotalAmount->setFormValue($val);
            }
        }

        // Check field name 'StandardMargin' first before field var 'x_StandardMargin'
        $val = $CurrentForm->hasValue("StandardMargin") ? $CurrentForm->getValue("StandardMargin") : $CurrentForm->getValue("x_StandardMargin");
        if (!$this->StandardMargin->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->StandardMargin->Visible = false; // Disable update for API request
            } else {
                $this->StandardMargin->setFormValue($val);
            }
        }

        // Check field name 'Margin' first before field var 'x_Margin'
        $val = $CurrentForm->hasValue("Margin") ? $CurrentForm->getValue("Margin") : $CurrentForm->getValue("x_Margin");
        if (!$this->Margin->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Margin->Visible = false; // Disable update for API request
            } else {
                $this->Margin->setFormValue($val);
            }
        }

        // Check field name 'MarginId' first before field var 'x_MarginId'
        $val = $CurrentForm->hasValue("MarginId") ? $CurrentForm->getValue("MarginId") : $CurrentForm->getValue("x_MarginId");
        if (!$this->MarginId->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->MarginId->Visible = false; // Disable update for API request
            } else {
                $this->MarginId->setFormValue($val);
            }
        }

        // Check field name 'ExpectedMargin' first before field var 'x_ExpectedMargin'
        $val = $CurrentForm->hasValue("ExpectedMargin") ? $CurrentForm->getValue("ExpectedMargin") : $CurrentForm->getValue("x_ExpectedMargin");
        if (!$this->ExpectedMargin->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ExpectedMargin->Visible = false; // Disable update for API request
            } else {
                $this->ExpectedMargin->setFormValue($val);
            }
        }

        // Check field name 'SurchargeBeforeTax' first before field var 'x_SurchargeBeforeTax'
        $val = $CurrentForm->hasValue("SurchargeBeforeTax") ? $CurrentForm->getValue("SurchargeBeforeTax") : $CurrentForm->getValue("x_SurchargeBeforeTax");
        if (!$this->SurchargeBeforeTax->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SurchargeBeforeTax->Visible = false; // Disable update for API request
            } else {
                $this->SurchargeBeforeTax->setFormValue($val);
            }
        }

        // Check field name 'SurchargeAfterTax' first before field var 'x_SurchargeAfterTax'
        $val = $CurrentForm->hasValue("SurchargeAfterTax") ? $CurrentForm->getValue("SurchargeAfterTax") : $CurrentForm->getValue("x_SurchargeAfterTax");
        if (!$this->SurchargeAfterTax->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SurchargeAfterTax->Visible = false; // Disable update for API request
            } else {
                $this->SurchargeAfterTax->setFormValue($val);
            }
        }

        // Check field name 'TempOrderNo' first before field var 'x_TempOrderNo'
        $val = $CurrentForm->hasValue("TempOrderNo") ? $CurrentForm->getValue("TempOrderNo") : $CurrentForm->getValue("x_TempOrderNo");
        if (!$this->TempOrderNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TempOrderNo->Visible = false; // Disable update for API request
            } else {
                $this->TempOrderNo->setFormValue($val);
            }
        }

        // Check field name 'TempOrderDate' first before field var 'x_TempOrderDate'
        $val = $CurrentForm->hasValue("TempOrderDate") ? $CurrentForm->getValue("TempOrderDate") : $CurrentForm->getValue("x_TempOrderDate");
        if (!$this->TempOrderDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TempOrderDate->Visible = false; // Disable update for API request
            } else {
                $this->TempOrderDate->setFormValue($val);
            }
            $this->TempOrderDate->CurrentValue = UnFormatDateTime($this->TempOrderDate->CurrentValue, 0);
        }

        // Check field name 'OrderUnit' first before field var 'x_OrderUnit'
        $val = $CurrentForm->hasValue("OrderUnit") ? $CurrentForm->getValue("OrderUnit") : $CurrentForm->getValue("x_OrderUnit");
        if (!$this->OrderUnit->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->OrderUnit->Visible = false; // Disable update for API request
            } else {
                $this->OrderUnit->setFormValue($val);
            }
        }

        // Check field name 'OrderQuantity' first before field var 'x_OrderQuantity'
        $val = $CurrentForm->hasValue("OrderQuantity") ? $CurrentForm->getValue("OrderQuantity") : $CurrentForm->getValue("x_OrderQuantity");
        if (!$this->OrderQuantity->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->OrderQuantity->Visible = false; // Disable update for API request
            } else {
                $this->OrderQuantity->setFormValue($val);
            }
        }

        // Check field name 'MarkForOrder' first before field var 'x_MarkForOrder'
        $val = $CurrentForm->hasValue("MarkForOrder") ? $CurrentForm->getValue("MarkForOrder") : $CurrentForm->getValue("x_MarkForOrder");
        if (!$this->MarkForOrder->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->MarkForOrder->Visible = false; // Disable update for API request
            } else {
                $this->MarkForOrder->setFormValue($val);
            }
        }

        // Check field name 'OrderAllId' first before field var 'x_OrderAllId'
        $val = $CurrentForm->hasValue("OrderAllId") ? $CurrentForm->getValue("OrderAllId") : $CurrentForm->getValue("x_OrderAllId");
        if (!$this->OrderAllId->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->OrderAllId->Visible = false; // Disable update for API request
            } else {
                $this->OrderAllId->setFormValue($val);
            }
        }

        // Check field name 'CalculateOrderQty' first before field var 'x_CalculateOrderQty'
        $val = $CurrentForm->hasValue("CalculateOrderQty") ? $CurrentForm->getValue("CalculateOrderQty") : $CurrentForm->getValue("x_CalculateOrderQty");
        if (!$this->CalculateOrderQty->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CalculateOrderQty->Visible = false; // Disable update for API request
            } else {
                $this->CalculateOrderQty->setFormValue($val);
            }
        }

        // Check field name 'SubLocation' first before field var 'x_SubLocation'
        $val = $CurrentForm->hasValue("SubLocation") ? $CurrentForm->getValue("SubLocation") : $CurrentForm->getValue("x_SubLocation");
        if (!$this->SubLocation->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SubLocation->Visible = false; // Disable update for API request
            } else {
                $this->SubLocation->setFormValue($val);
            }
        }

        // Check field name 'CategoryCode' first before field var 'x_CategoryCode'
        $val = $CurrentForm->hasValue("CategoryCode") ? $CurrentForm->getValue("CategoryCode") : $CurrentForm->getValue("x_CategoryCode");
        if (!$this->CategoryCode->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CategoryCode->Visible = false; // Disable update for API request
            } else {
                $this->CategoryCode->setFormValue($val);
            }
        }

        // Check field name 'SubCategory' first before field var 'x_SubCategory'
        $val = $CurrentForm->hasValue("SubCategory") ? $CurrentForm->getValue("SubCategory") : $CurrentForm->getValue("x_SubCategory");
        if (!$this->SubCategory->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SubCategory->Visible = false; // Disable update for API request
            } else {
                $this->SubCategory->setFormValue($val);
            }
        }

        // Check field name 'FlexCategoryCode' first before field var 'x_FlexCategoryCode'
        $val = $CurrentForm->hasValue("FlexCategoryCode") ? $CurrentForm->getValue("FlexCategoryCode") : $CurrentForm->getValue("x_FlexCategoryCode");
        if (!$this->FlexCategoryCode->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->FlexCategoryCode->Visible = false; // Disable update for API request
            } else {
                $this->FlexCategoryCode->setFormValue($val);
            }
        }

        // Check field name 'ABCSaleQty' first before field var 'x_ABCSaleQty'
        $val = $CurrentForm->hasValue("ABCSaleQty") ? $CurrentForm->getValue("ABCSaleQty") : $CurrentForm->getValue("x_ABCSaleQty");
        if (!$this->ABCSaleQty->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ABCSaleQty->Visible = false; // Disable update for API request
            } else {
                $this->ABCSaleQty->setFormValue($val);
            }
        }

        // Check field name 'ABCSaleValue' first before field var 'x_ABCSaleValue'
        $val = $CurrentForm->hasValue("ABCSaleValue") ? $CurrentForm->getValue("ABCSaleValue") : $CurrentForm->getValue("x_ABCSaleValue");
        if (!$this->ABCSaleValue->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ABCSaleValue->Visible = false; // Disable update for API request
            } else {
                $this->ABCSaleValue->setFormValue($val);
            }
        }

        // Check field name 'ConvertionFactor' first before field var 'x_ConvertionFactor'
        $val = $CurrentForm->hasValue("ConvertionFactor") ? $CurrentForm->getValue("ConvertionFactor") : $CurrentForm->getValue("x_ConvertionFactor");
        if (!$this->ConvertionFactor->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ConvertionFactor->Visible = false; // Disable update for API request
            } else {
                $this->ConvertionFactor->setFormValue($val);
            }
        }

        // Check field name 'ConvertionUnitDesc' first before field var 'x_ConvertionUnitDesc'
        $val = $CurrentForm->hasValue("ConvertionUnitDesc") ? $CurrentForm->getValue("ConvertionUnitDesc") : $CurrentForm->getValue("x_ConvertionUnitDesc");
        if (!$this->ConvertionUnitDesc->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ConvertionUnitDesc->Visible = false; // Disable update for API request
            } else {
                $this->ConvertionUnitDesc->setFormValue($val);
            }
        }

        // Check field name 'TransactionId' first before field var 'x_TransactionId'
        $val = $CurrentForm->hasValue("TransactionId") ? $CurrentForm->getValue("TransactionId") : $CurrentForm->getValue("x_TransactionId");
        if (!$this->TransactionId->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TransactionId->Visible = false; // Disable update for API request
            } else {
                $this->TransactionId->setFormValue($val);
            }
        }

        // Check field name 'SoldProductId' first before field var 'x_SoldProductId'
        $val = $CurrentForm->hasValue("SoldProductId") ? $CurrentForm->getValue("SoldProductId") : $CurrentForm->getValue("x_SoldProductId");
        if (!$this->SoldProductId->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SoldProductId->Visible = false; // Disable update for API request
            } else {
                $this->SoldProductId->setFormValue($val);
            }
        }

        // Check field name 'WantedBookId' first before field var 'x_WantedBookId'
        $val = $CurrentForm->hasValue("WantedBookId") ? $CurrentForm->getValue("WantedBookId") : $CurrentForm->getValue("x_WantedBookId");
        if (!$this->WantedBookId->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->WantedBookId->Visible = false; // Disable update for API request
            } else {
                $this->WantedBookId->setFormValue($val);
            }
        }

        // Check field name 'AllId' first before field var 'x_AllId'
        $val = $CurrentForm->hasValue("AllId") ? $CurrentForm->getValue("AllId") : $CurrentForm->getValue("x_AllId");
        if (!$this->AllId->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AllId->Visible = false; // Disable update for API request
            } else {
                $this->AllId->setFormValue($val);
            }
        }

        // Check field name 'BatchAndExpiryCompulsory' first before field var 'x_BatchAndExpiryCompulsory'
        $val = $CurrentForm->hasValue("BatchAndExpiryCompulsory") ? $CurrentForm->getValue("BatchAndExpiryCompulsory") : $CurrentForm->getValue("x_BatchAndExpiryCompulsory");
        if (!$this->BatchAndExpiryCompulsory->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BatchAndExpiryCompulsory->Visible = false; // Disable update for API request
            } else {
                $this->BatchAndExpiryCompulsory->setFormValue($val);
            }
        }

        // Check field name 'BatchStockForWantedBook' first before field var 'x_BatchStockForWantedBook'
        $val = $CurrentForm->hasValue("BatchStockForWantedBook") ? $CurrentForm->getValue("BatchStockForWantedBook") : $CurrentForm->getValue("x_BatchStockForWantedBook");
        if (!$this->BatchStockForWantedBook->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BatchStockForWantedBook->Visible = false; // Disable update for API request
            } else {
                $this->BatchStockForWantedBook->setFormValue($val);
            }
        }

        // Check field name 'UnitBasedBilling' first before field var 'x_UnitBasedBilling'
        $val = $CurrentForm->hasValue("UnitBasedBilling") ? $CurrentForm->getValue("UnitBasedBilling") : $CurrentForm->getValue("x_UnitBasedBilling");
        if (!$this->UnitBasedBilling->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->UnitBasedBilling->Visible = false; // Disable update for API request
            } else {
                $this->UnitBasedBilling->setFormValue($val);
            }
        }

        // Check field name 'DoNotCheckStock' first before field var 'x_DoNotCheckStock'
        $val = $CurrentForm->hasValue("DoNotCheckStock") ? $CurrentForm->getValue("DoNotCheckStock") : $CurrentForm->getValue("x_DoNotCheckStock");
        if (!$this->DoNotCheckStock->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DoNotCheckStock->Visible = false; // Disable update for API request
            } else {
                $this->DoNotCheckStock->setFormValue($val);
            }
        }

        // Check field name 'AcceptRate' first before field var 'x_AcceptRate'
        $val = $CurrentForm->hasValue("AcceptRate") ? $CurrentForm->getValue("AcceptRate") : $CurrentForm->getValue("x_AcceptRate");
        if (!$this->AcceptRate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AcceptRate->Visible = false; // Disable update for API request
            } else {
                $this->AcceptRate->setFormValue($val);
            }
        }

        // Check field name 'PriceLevel' first before field var 'x_PriceLevel'
        $val = $CurrentForm->hasValue("PriceLevel") ? $CurrentForm->getValue("PriceLevel") : $CurrentForm->getValue("x_PriceLevel");
        if (!$this->PriceLevel->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PriceLevel->Visible = false; // Disable update for API request
            } else {
                $this->PriceLevel->setFormValue($val);
            }
        }

        // Check field name 'LastQuotePrice' first before field var 'x_LastQuotePrice'
        $val = $CurrentForm->hasValue("LastQuotePrice") ? $CurrentForm->getValue("LastQuotePrice") : $CurrentForm->getValue("x_LastQuotePrice");
        if (!$this->LastQuotePrice->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->LastQuotePrice->Visible = false; // Disable update for API request
            } else {
                $this->LastQuotePrice->setFormValue($val);
            }
        }

        // Check field name 'PriceChange' first before field var 'x_PriceChange'
        $val = $CurrentForm->hasValue("PriceChange") ? $CurrentForm->getValue("PriceChange") : $CurrentForm->getValue("x_PriceChange");
        if (!$this->PriceChange->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PriceChange->Visible = false; // Disable update for API request
            } else {
                $this->PriceChange->setFormValue($val);
            }
        }

        // Check field name 'CommodityCode' first before field var 'x_CommodityCode'
        $val = $CurrentForm->hasValue("CommodityCode") ? $CurrentForm->getValue("CommodityCode") : $CurrentForm->getValue("x_CommodityCode");
        if (!$this->CommodityCode->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CommodityCode->Visible = false; // Disable update for API request
            } else {
                $this->CommodityCode->setFormValue($val);
            }
        }

        // Check field name 'InstitutePrice' first before field var 'x_InstitutePrice'
        $val = $CurrentForm->hasValue("InstitutePrice") ? $CurrentForm->getValue("InstitutePrice") : $CurrentForm->getValue("x_InstitutePrice");
        if (!$this->InstitutePrice->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->InstitutePrice->Visible = false; // Disable update for API request
            } else {
                $this->InstitutePrice->setFormValue($val);
            }
        }

        // Check field name 'CtrlOrDCtrlProduct' first before field var 'x_CtrlOrDCtrlProduct'
        $val = $CurrentForm->hasValue("CtrlOrDCtrlProduct") ? $CurrentForm->getValue("CtrlOrDCtrlProduct") : $CurrentForm->getValue("x_CtrlOrDCtrlProduct");
        if (!$this->CtrlOrDCtrlProduct->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CtrlOrDCtrlProduct->Visible = false; // Disable update for API request
            } else {
                $this->CtrlOrDCtrlProduct->setFormValue($val);
            }
        }

        // Check field name 'ImportedDate' first before field var 'x_ImportedDate'
        $val = $CurrentForm->hasValue("ImportedDate") ? $CurrentForm->getValue("ImportedDate") : $CurrentForm->getValue("x_ImportedDate");
        if (!$this->ImportedDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ImportedDate->Visible = false; // Disable update for API request
            } else {
                $this->ImportedDate->setFormValue($val);
            }
            $this->ImportedDate->CurrentValue = UnFormatDateTime($this->ImportedDate->CurrentValue, 0);
        }

        // Check field name 'IsImported' first before field var 'x_IsImported'
        $val = $CurrentForm->hasValue("IsImported") ? $CurrentForm->getValue("IsImported") : $CurrentForm->getValue("x_IsImported");
        if (!$this->IsImported->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->IsImported->Visible = false; // Disable update for API request
            } else {
                $this->IsImported->setFormValue($val);
            }
        }

        // Check field name 'FileName' first before field var 'x_FileName'
        $val = $CurrentForm->hasValue("FileName") ? $CurrentForm->getValue("FileName") : $CurrentForm->getValue("x_FileName");
        if (!$this->FileName->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->FileName->Visible = false; // Disable update for API request
            } else {
                $this->FileName->setFormValue($val);
            }
        }

        // Check field name 'LPName' first before field var 'x_LPName'
        $val = $CurrentForm->hasValue("LPName") ? $CurrentForm->getValue("LPName") : $CurrentForm->getValue("x_LPName");
        if (!$this->LPName->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->LPName->Visible = false; // Disable update for API request
            } else {
                $this->LPName->setFormValue($val);
            }
        }

        // Check field name 'GodownNumber' first before field var 'x_GodownNumber'
        $val = $CurrentForm->hasValue("GodownNumber") ? $CurrentForm->getValue("GodownNumber") : $CurrentForm->getValue("x_GodownNumber");
        if (!$this->GodownNumber->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->GodownNumber->Visible = false; // Disable update for API request
            } else {
                $this->GodownNumber->setFormValue($val);
            }
        }

        // Check field name 'CreationDate' first before field var 'x_CreationDate'
        $val = $CurrentForm->hasValue("CreationDate") ? $CurrentForm->getValue("CreationDate") : $CurrentForm->getValue("x_CreationDate");
        if (!$this->CreationDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CreationDate->Visible = false; // Disable update for API request
            } else {
                $this->CreationDate->setFormValue($val);
            }
            $this->CreationDate->CurrentValue = UnFormatDateTime($this->CreationDate->CurrentValue, 0);
        }

        // Check field name 'CreatedbyUser' first before field var 'x_CreatedbyUser'
        $val = $CurrentForm->hasValue("CreatedbyUser") ? $CurrentForm->getValue("CreatedbyUser") : $CurrentForm->getValue("x_CreatedbyUser");
        if (!$this->CreatedbyUser->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CreatedbyUser->Visible = false; // Disable update for API request
            } else {
                $this->CreatedbyUser->setFormValue($val);
            }
        }

        // Check field name 'ModifiedDate' first before field var 'x_ModifiedDate'
        $val = $CurrentForm->hasValue("ModifiedDate") ? $CurrentForm->getValue("ModifiedDate") : $CurrentForm->getValue("x_ModifiedDate");
        if (!$this->ModifiedDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ModifiedDate->Visible = false; // Disable update for API request
            } else {
                $this->ModifiedDate->setFormValue($val);
            }
            $this->ModifiedDate->CurrentValue = UnFormatDateTime($this->ModifiedDate->CurrentValue, 0);
        }

        // Check field name 'ModifiedbyUser' first before field var 'x_ModifiedbyUser'
        $val = $CurrentForm->hasValue("ModifiedbyUser") ? $CurrentForm->getValue("ModifiedbyUser") : $CurrentForm->getValue("x_ModifiedbyUser");
        if (!$this->ModifiedbyUser->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ModifiedbyUser->Visible = false; // Disable update for API request
            } else {
                $this->ModifiedbyUser->setFormValue($val);
            }
        }

        // Check field name 'isActive' first before field var 'x_isActive'
        $val = $CurrentForm->hasValue("isActive") ? $CurrentForm->getValue("isActive") : $CurrentForm->getValue("x_isActive");
        if (!$this->isActive->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->isActive->Visible = false; // Disable update for API request
            } else {
                $this->isActive->setFormValue($val);
            }
        }

        // Check field name 'AllowExpiryClaim' first before field var 'x_AllowExpiryClaim'
        $val = $CurrentForm->hasValue("AllowExpiryClaim") ? $CurrentForm->getValue("AllowExpiryClaim") : $CurrentForm->getValue("x_AllowExpiryClaim");
        if (!$this->AllowExpiryClaim->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AllowExpiryClaim->Visible = false; // Disable update for API request
            } else {
                $this->AllowExpiryClaim->setFormValue($val);
            }
        }

        // Check field name 'BrandCode' first before field var 'x_BrandCode'
        $val = $CurrentForm->hasValue("BrandCode") ? $CurrentForm->getValue("BrandCode") : $CurrentForm->getValue("x_BrandCode");
        if (!$this->BrandCode->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BrandCode->Visible = false; // Disable update for API request
            } else {
                $this->BrandCode->setFormValue($val);
            }
        }

        // Check field name 'FreeSchemeBasedon' first before field var 'x_FreeSchemeBasedon'
        $val = $CurrentForm->hasValue("FreeSchemeBasedon") ? $CurrentForm->getValue("FreeSchemeBasedon") : $CurrentForm->getValue("x_FreeSchemeBasedon");
        if (!$this->FreeSchemeBasedon->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->FreeSchemeBasedon->Visible = false; // Disable update for API request
            } else {
                $this->FreeSchemeBasedon->setFormValue($val);
            }
        }

        // Check field name 'DoNotCheckCostInBill' first before field var 'x_DoNotCheckCostInBill'
        $val = $CurrentForm->hasValue("DoNotCheckCostInBill") ? $CurrentForm->getValue("DoNotCheckCostInBill") : $CurrentForm->getValue("x_DoNotCheckCostInBill");
        if (!$this->DoNotCheckCostInBill->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DoNotCheckCostInBill->Visible = false; // Disable update for API request
            } else {
                $this->DoNotCheckCostInBill->setFormValue($val);
            }
        }

        // Check field name 'ProductGroupCode' first before field var 'x_ProductGroupCode'
        $val = $CurrentForm->hasValue("ProductGroupCode") ? $CurrentForm->getValue("ProductGroupCode") : $CurrentForm->getValue("x_ProductGroupCode");
        if (!$this->ProductGroupCode->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ProductGroupCode->Visible = false; // Disable update for API request
            } else {
                $this->ProductGroupCode->setFormValue($val);
            }
        }

        // Check field name 'ProductStrengthCode' first before field var 'x_ProductStrengthCode'
        $val = $CurrentForm->hasValue("ProductStrengthCode") ? $CurrentForm->getValue("ProductStrengthCode") : $CurrentForm->getValue("x_ProductStrengthCode");
        if (!$this->ProductStrengthCode->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ProductStrengthCode->Visible = false; // Disable update for API request
            } else {
                $this->ProductStrengthCode->setFormValue($val);
            }
        }

        // Check field name 'PackingCode' first before field var 'x_PackingCode'
        $val = $CurrentForm->hasValue("PackingCode") ? $CurrentForm->getValue("PackingCode") : $CurrentForm->getValue("x_PackingCode");
        if (!$this->PackingCode->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PackingCode->Visible = false; // Disable update for API request
            } else {
                $this->PackingCode->setFormValue($val);
            }
        }

        // Check field name 'ComputedMinStock' first before field var 'x_ComputedMinStock'
        $val = $CurrentForm->hasValue("ComputedMinStock") ? $CurrentForm->getValue("ComputedMinStock") : $CurrentForm->getValue("x_ComputedMinStock");
        if (!$this->ComputedMinStock->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ComputedMinStock->Visible = false; // Disable update for API request
            } else {
                $this->ComputedMinStock->setFormValue($val);
            }
        }

        // Check field name 'ComputedMaxStock' first before field var 'x_ComputedMaxStock'
        $val = $CurrentForm->hasValue("ComputedMaxStock") ? $CurrentForm->getValue("ComputedMaxStock") : $CurrentForm->getValue("x_ComputedMaxStock");
        if (!$this->ComputedMaxStock->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ComputedMaxStock->Visible = false; // Disable update for API request
            } else {
                $this->ComputedMaxStock->setFormValue($val);
            }
        }

        // Check field name 'ProductRemark' first before field var 'x_ProductRemark'
        $val = $CurrentForm->hasValue("ProductRemark") ? $CurrentForm->getValue("ProductRemark") : $CurrentForm->getValue("x_ProductRemark");
        if (!$this->ProductRemark->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ProductRemark->Visible = false; // Disable update for API request
            } else {
                $this->ProductRemark->setFormValue($val);
            }
        }

        // Check field name 'ProductDrugCode' first before field var 'x_ProductDrugCode'
        $val = $CurrentForm->hasValue("ProductDrugCode") ? $CurrentForm->getValue("ProductDrugCode") : $CurrentForm->getValue("x_ProductDrugCode");
        if (!$this->ProductDrugCode->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ProductDrugCode->Visible = false; // Disable update for API request
            } else {
                $this->ProductDrugCode->setFormValue($val);
            }
        }

        // Check field name 'IsMatrixProduct' first before field var 'x_IsMatrixProduct'
        $val = $CurrentForm->hasValue("IsMatrixProduct") ? $CurrentForm->getValue("IsMatrixProduct") : $CurrentForm->getValue("x_IsMatrixProduct");
        if (!$this->IsMatrixProduct->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->IsMatrixProduct->Visible = false; // Disable update for API request
            } else {
                $this->IsMatrixProduct->setFormValue($val);
            }
        }

        // Check field name 'AttributeCount1' first before field var 'x_AttributeCount1'
        $val = $CurrentForm->hasValue("AttributeCount1") ? $CurrentForm->getValue("AttributeCount1") : $CurrentForm->getValue("x_AttributeCount1");
        if (!$this->AttributeCount1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AttributeCount1->Visible = false; // Disable update for API request
            } else {
                $this->AttributeCount1->setFormValue($val);
            }
        }

        // Check field name 'AttributeCount2' first before field var 'x_AttributeCount2'
        $val = $CurrentForm->hasValue("AttributeCount2") ? $CurrentForm->getValue("AttributeCount2") : $CurrentForm->getValue("x_AttributeCount2");
        if (!$this->AttributeCount2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AttributeCount2->Visible = false; // Disable update for API request
            } else {
                $this->AttributeCount2->setFormValue($val);
            }
        }

        // Check field name 'AttributeCount3' first before field var 'x_AttributeCount3'
        $val = $CurrentForm->hasValue("AttributeCount3") ? $CurrentForm->getValue("AttributeCount3") : $CurrentForm->getValue("x_AttributeCount3");
        if (!$this->AttributeCount3->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AttributeCount3->Visible = false; // Disable update for API request
            } else {
                $this->AttributeCount3->setFormValue($val);
            }
        }

        // Check field name 'AttributeCount4' first before field var 'x_AttributeCount4'
        $val = $CurrentForm->hasValue("AttributeCount4") ? $CurrentForm->getValue("AttributeCount4") : $CurrentForm->getValue("x_AttributeCount4");
        if (!$this->AttributeCount4->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AttributeCount4->Visible = false; // Disable update for API request
            } else {
                $this->AttributeCount4->setFormValue($val);
            }
        }

        // Check field name 'AttributeCount5' first before field var 'x_AttributeCount5'
        $val = $CurrentForm->hasValue("AttributeCount5") ? $CurrentForm->getValue("AttributeCount5") : $CurrentForm->getValue("x_AttributeCount5");
        if (!$this->AttributeCount5->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AttributeCount5->Visible = false; // Disable update for API request
            } else {
                $this->AttributeCount5->setFormValue($val);
            }
        }

        // Check field name 'DefaultDiscountPercentage' first before field var 'x_DefaultDiscountPercentage'
        $val = $CurrentForm->hasValue("DefaultDiscountPercentage") ? $CurrentForm->getValue("DefaultDiscountPercentage") : $CurrentForm->getValue("x_DefaultDiscountPercentage");
        if (!$this->DefaultDiscountPercentage->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DefaultDiscountPercentage->Visible = false; // Disable update for API request
            } else {
                $this->DefaultDiscountPercentage->setFormValue($val);
            }
        }

        // Check field name 'DonotPrintBarcode' first before field var 'x_DonotPrintBarcode'
        $val = $CurrentForm->hasValue("DonotPrintBarcode") ? $CurrentForm->getValue("DonotPrintBarcode") : $CurrentForm->getValue("x_DonotPrintBarcode");
        if (!$this->DonotPrintBarcode->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DonotPrintBarcode->Visible = false; // Disable update for API request
            } else {
                $this->DonotPrintBarcode->setFormValue($val);
            }
        }

        // Check field name 'ProductLevelDiscount' first before field var 'x_ProductLevelDiscount'
        $val = $CurrentForm->hasValue("ProductLevelDiscount") ? $CurrentForm->getValue("ProductLevelDiscount") : $CurrentForm->getValue("x_ProductLevelDiscount");
        if (!$this->ProductLevelDiscount->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ProductLevelDiscount->Visible = false; // Disable update for API request
            } else {
                $this->ProductLevelDiscount->setFormValue($val);
            }
        }

        // Check field name 'Markup' first before field var 'x_Markup'
        $val = $CurrentForm->hasValue("Markup") ? $CurrentForm->getValue("Markup") : $CurrentForm->getValue("x_Markup");
        if (!$this->Markup->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Markup->Visible = false; // Disable update for API request
            } else {
                $this->Markup->setFormValue($val);
            }
        }

        // Check field name 'MarkDown' first before field var 'x_MarkDown'
        $val = $CurrentForm->hasValue("MarkDown") ? $CurrentForm->getValue("MarkDown") : $CurrentForm->getValue("x_MarkDown");
        if (!$this->MarkDown->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->MarkDown->Visible = false; // Disable update for API request
            } else {
                $this->MarkDown->setFormValue($val);
            }
        }

        // Check field name 'ReworkSalePrice' first before field var 'x_ReworkSalePrice'
        $val = $CurrentForm->hasValue("ReworkSalePrice") ? $CurrentForm->getValue("ReworkSalePrice") : $CurrentForm->getValue("x_ReworkSalePrice");
        if (!$this->ReworkSalePrice->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ReworkSalePrice->Visible = false; // Disable update for API request
            } else {
                $this->ReworkSalePrice->setFormValue($val);
            }
        }

        // Check field name 'MultipleInput' first before field var 'x_MultipleInput'
        $val = $CurrentForm->hasValue("MultipleInput") ? $CurrentForm->getValue("MultipleInput") : $CurrentForm->getValue("x_MultipleInput");
        if (!$this->MultipleInput->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->MultipleInput->Visible = false; // Disable update for API request
            } else {
                $this->MultipleInput->setFormValue($val);
            }
        }

        // Check field name 'LpPackageInformation' first before field var 'x_LpPackageInformation'
        $val = $CurrentForm->hasValue("LpPackageInformation") ? $CurrentForm->getValue("LpPackageInformation") : $CurrentForm->getValue("x_LpPackageInformation");
        if (!$this->LpPackageInformation->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->LpPackageInformation->Visible = false; // Disable update for API request
            } else {
                $this->LpPackageInformation->setFormValue($val);
            }
        }

        // Check field name 'AllowNegativeStock' first before field var 'x_AllowNegativeStock'
        $val = $CurrentForm->hasValue("AllowNegativeStock") ? $CurrentForm->getValue("AllowNegativeStock") : $CurrentForm->getValue("x_AllowNegativeStock");
        if (!$this->AllowNegativeStock->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AllowNegativeStock->Visible = false; // Disable update for API request
            } else {
                $this->AllowNegativeStock->setFormValue($val);
            }
        }

        // Check field name 'OrderDate' first before field var 'x_OrderDate'
        $val = $CurrentForm->hasValue("OrderDate") ? $CurrentForm->getValue("OrderDate") : $CurrentForm->getValue("x_OrderDate");
        if (!$this->OrderDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->OrderDate->Visible = false; // Disable update for API request
            } else {
                $this->OrderDate->setFormValue($val);
            }
            $this->OrderDate->CurrentValue = UnFormatDateTime($this->OrderDate->CurrentValue, 0);
        }

        // Check field name 'OrderTime' first before field var 'x_OrderTime'
        $val = $CurrentForm->hasValue("OrderTime") ? $CurrentForm->getValue("OrderTime") : $CurrentForm->getValue("x_OrderTime");
        if (!$this->OrderTime->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->OrderTime->Visible = false; // Disable update for API request
            } else {
                $this->OrderTime->setFormValue($val);
            }
            $this->OrderTime->CurrentValue = UnFormatDateTime($this->OrderTime->CurrentValue, 0);
        }

        // Check field name 'RateGroupCode' first before field var 'x_RateGroupCode'
        $val = $CurrentForm->hasValue("RateGroupCode") ? $CurrentForm->getValue("RateGroupCode") : $CurrentForm->getValue("x_RateGroupCode");
        if (!$this->RateGroupCode->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RateGroupCode->Visible = false; // Disable update for API request
            } else {
                $this->RateGroupCode->setFormValue($val);
            }
        }

        // Check field name 'ConversionCaseLot' first before field var 'x_ConversionCaseLot'
        $val = $CurrentForm->hasValue("ConversionCaseLot") ? $CurrentForm->getValue("ConversionCaseLot") : $CurrentForm->getValue("x_ConversionCaseLot");
        if (!$this->ConversionCaseLot->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ConversionCaseLot->Visible = false; // Disable update for API request
            } else {
                $this->ConversionCaseLot->setFormValue($val);
            }
        }

        // Check field name 'ShippingLot' first before field var 'x_ShippingLot'
        $val = $CurrentForm->hasValue("ShippingLot") ? $CurrentForm->getValue("ShippingLot") : $CurrentForm->getValue("x_ShippingLot");
        if (!$this->ShippingLot->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ShippingLot->Visible = false; // Disable update for API request
            } else {
                $this->ShippingLot->setFormValue($val);
            }
        }

        // Check field name 'AllowExpiryReplacement' first before field var 'x_AllowExpiryReplacement'
        $val = $CurrentForm->hasValue("AllowExpiryReplacement") ? $CurrentForm->getValue("AllowExpiryReplacement") : $CurrentForm->getValue("x_AllowExpiryReplacement");
        if (!$this->AllowExpiryReplacement->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AllowExpiryReplacement->Visible = false; // Disable update for API request
            } else {
                $this->AllowExpiryReplacement->setFormValue($val);
            }
        }

        // Check field name 'NoOfMonthExpiryAllowed' first before field var 'x_NoOfMonthExpiryAllowed'
        $val = $CurrentForm->hasValue("NoOfMonthExpiryAllowed") ? $CurrentForm->getValue("NoOfMonthExpiryAllowed") : $CurrentForm->getValue("x_NoOfMonthExpiryAllowed");
        if (!$this->NoOfMonthExpiryAllowed->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->NoOfMonthExpiryAllowed->Visible = false; // Disable update for API request
            } else {
                $this->NoOfMonthExpiryAllowed->setFormValue($val);
            }
        }

        // Check field name 'ProductDiscountEligibility' first before field var 'x_ProductDiscountEligibility'
        $val = $CurrentForm->hasValue("ProductDiscountEligibility") ? $CurrentForm->getValue("ProductDiscountEligibility") : $CurrentForm->getValue("x_ProductDiscountEligibility");
        if (!$this->ProductDiscountEligibility->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ProductDiscountEligibility->Visible = false; // Disable update for API request
            } else {
                $this->ProductDiscountEligibility->setFormValue($val);
            }
        }

        // Check field name 'ScheduleTypeCode' first before field var 'x_ScheduleTypeCode'
        $val = $CurrentForm->hasValue("ScheduleTypeCode") ? $CurrentForm->getValue("ScheduleTypeCode") : $CurrentForm->getValue("x_ScheduleTypeCode");
        if (!$this->ScheduleTypeCode->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ScheduleTypeCode->Visible = false; // Disable update for API request
            } else {
                $this->ScheduleTypeCode->setFormValue($val);
            }
        }

        // Check field name 'AIOCDProductCode' first before field var 'x_AIOCDProductCode'
        $val = $CurrentForm->hasValue("AIOCDProductCode") ? $CurrentForm->getValue("AIOCDProductCode") : $CurrentForm->getValue("x_AIOCDProductCode");
        if (!$this->AIOCDProductCode->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AIOCDProductCode->Visible = false; // Disable update for API request
            } else {
                $this->AIOCDProductCode->setFormValue($val);
            }
        }

        // Check field name 'FreeQuantity' first before field var 'x_FreeQuantity'
        $val = $CurrentForm->hasValue("FreeQuantity") ? $CurrentForm->getValue("FreeQuantity") : $CurrentForm->getValue("x_FreeQuantity");
        if (!$this->FreeQuantity->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->FreeQuantity->Visible = false; // Disable update for API request
            } else {
                $this->FreeQuantity->setFormValue($val);
            }
        }

        // Check field name 'DiscountType' first before field var 'x_DiscountType'
        $val = $CurrentForm->hasValue("DiscountType") ? $CurrentForm->getValue("DiscountType") : $CurrentForm->getValue("x_DiscountType");
        if (!$this->DiscountType->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DiscountType->Visible = false; // Disable update for API request
            } else {
                $this->DiscountType->setFormValue($val);
            }
        }

        // Check field name 'DiscountValue' first before field var 'x_DiscountValue'
        $val = $CurrentForm->hasValue("DiscountValue") ? $CurrentForm->getValue("DiscountValue") : $CurrentForm->getValue("x_DiscountValue");
        if (!$this->DiscountValue->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DiscountValue->Visible = false; // Disable update for API request
            } else {
                $this->DiscountValue->setFormValue($val);
            }
        }

        // Check field name 'HasProductOrderAttribute' first before field var 'x_HasProductOrderAttribute'
        $val = $CurrentForm->hasValue("HasProductOrderAttribute") ? $CurrentForm->getValue("HasProductOrderAttribute") : $CurrentForm->getValue("x_HasProductOrderAttribute");
        if (!$this->HasProductOrderAttribute->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->HasProductOrderAttribute->Visible = false; // Disable update for API request
            } else {
                $this->HasProductOrderAttribute->setFormValue($val);
            }
        }

        // Check field name 'FirstPODate' first before field var 'x_FirstPODate'
        $val = $CurrentForm->hasValue("FirstPODate") ? $CurrentForm->getValue("FirstPODate") : $CurrentForm->getValue("x_FirstPODate");
        if (!$this->FirstPODate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->FirstPODate->Visible = false; // Disable update for API request
            } else {
                $this->FirstPODate->setFormValue($val);
            }
            $this->FirstPODate->CurrentValue = UnFormatDateTime($this->FirstPODate->CurrentValue, 0);
        }

        // Check field name 'SaleprcieAndMrpCalcPercent' first before field var 'x_SaleprcieAndMrpCalcPercent'
        $val = $CurrentForm->hasValue("SaleprcieAndMrpCalcPercent") ? $CurrentForm->getValue("SaleprcieAndMrpCalcPercent") : $CurrentForm->getValue("x_SaleprcieAndMrpCalcPercent");
        if (!$this->SaleprcieAndMrpCalcPercent->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SaleprcieAndMrpCalcPercent->Visible = false; // Disable update for API request
            } else {
                $this->SaleprcieAndMrpCalcPercent->setFormValue($val);
            }
        }

        // Check field name 'IsGiftVoucherProducts' first before field var 'x_IsGiftVoucherProducts'
        $val = $CurrentForm->hasValue("IsGiftVoucherProducts") ? $CurrentForm->getValue("IsGiftVoucherProducts") : $CurrentForm->getValue("x_IsGiftVoucherProducts");
        if (!$this->IsGiftVoucherProducts->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->IsGiftVoucherProducts->Visible = false; // Disable update for API request
            } else {
                $this->IsGiftVoucherProducts->setFormValue($val);
            }
        }

        // Check field name 'AcceptRange4SerialNumber' first before field var 'x_AcceptRange4SerialNumber'
        $val = $CurrentForm->hasValue("AcceptRange4SerialNumber") ? $CurrentForm->getValue("AcceptRange4SerialNumber") : $CurrentForm->getValue("x_AcceptRange4SerialNumber");
        if (!$this->AcceptRange4SerialNumber->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AcceptRange4SerialNumber->Visible = false; // Disable update for API request
            } else {
                $this->AcceptRange4SerialNumber->setFormValue($val);
            }
        }

        // Check field name 'GiftVoucherDenomination' first before field var 'x_GiftVoucherDenomination'
        $val = $CurrentForm->hasValue("GiftVoucherDenomination") ? $CurrentForm->getValue("GiftVoucherDenomination") : $CurrentForm->getValue("x_GiftVoucherDenomination");
        if (!$this->GiftVoucherDenomination->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->GiftVoucherDenomination->Visible = false; // Disable update for API request
            } else {
                $this->GiftVoucherDenomination->setFormValue($val);
            }
        }

        // Check field name 'Subclasscode' first before field var 'x_Subclasscode'
        $val = $CurrentForm->hasValue("Subclasscode") ? $CurrentForm->getValue("Subclasscode") : $CurrentForm->getValue("x_Subclasscode");
        if (!$this->Subclasscode->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Subclasscode->Visible = false; // Disable update for API request
            } else {
                $this->Subclasscode->setFormValue($val);
            }
        }

        // Check field name 'BarCodeFromWeighingMachine' first before field var 'x_BarCodeFromWeighingMachine'
        $val = $CurrentForm->hasValue("BarCodeFromWeighingMachine") ? $CurrentForm->getValue("BarCodeFromWeighingMachine") : $CurrentForm->getValue("x_BarCodeFromWeighingMachine");
        if (!$this->BarCodeFromWeighingMachine->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BarCodeFromWeighingMachine->Visible = false; // Disable update for API request
            } else {
                $this->BarCodeFromWeighingMachine->setFormValue($val);
            }
        }

        // Check field name 'CheckCostInReturn' first before field var 'x_CheckCostInReturn'
        $val = $CurrentForm->hasValue("CheckCostInReturn") ? $CurrentForm->getValue("CheckCostInReturn") : $CurrentForm->getValue("x_CheckCostInReturn");
        if (!$this->CheckCostInReturn->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CheckCostInReturn->Visible = false; // Disable update for API request
            } else {
                $this->CheckCostInReturn->setFormValue($val);
            }
        }

        // Check field name 'FrequentSaleProduct' first before field var 'x_FrequentSaleProduct'
        $val = $CurrentForm->hasValue("FrequentSaleProduct") ? $CurrentForm->getValue("FrequentSaleProduct") : $CurrentForm->getValue("x_FrequentSaleProduct");
        if (!$this->FrequentSaleProduct->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->FrequentSaleProduct->Visible = false; // Disable update for API request
            } else {
                $this->FrequentSaleProduct->setFormValue($val);
            }
        }

        // Check field name 'RateType' first before field var 'x_RateType'
        $val = $CurrentForm->hasValue("RateType") ? $CurrentForm->getValue("RateType") : $CurrentForm->getValue("x_RateType");
        if (!$this->RateType->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RateType->Visible = false; // Disable update for API request
            } else {
                $this->RateType->setFormValue($val);
            }
        }

        // Check field name 'TouchscreenName' first before field var 'x_TouchscreenName'
        $val = $CurrentForm->hasValue("TouchscreenName") ? $CurrentForm->getValue("TouchscreenName") : $CurrentForm->getValue("x_TouchscreenName");
        if (!$this->TouchscreenName->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TouchscreenName->Visible = false; // Disable update for API request
            } else {
                $this->TouchscreenName->setFormValue($val);
            }
        }

        // Check field name 'FreeType' first before field var 'x_FreeType'
        $val = $CurrentForm->hasValue("FreeType") ? $CurrentForm->getValue("FreeType") : $CurrentForm->getValue("x_FreeType");
        if (!$this->FreeType->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->FreeType->Visible = false; // Disable update for API request
            } else {
                $this->FreeType->setFormValue($val);
            }
        }

        // Check field name 'LooseQtyasNewBatch' first before field var 'x_LooseQtyasNewBatch'
        $val = $CurrentForm->hasValue("LooseQtyasNewBatch") ? $CurrentForm->getValue("LooseQtyasNewBatch") : $CurrentForm->getValue("x_LooseQtyasNewBatch");
        if (!$this->LooseQtyasNewBatch->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->LooseQtyasNewBatch->Visible = false; // Disable update for API request
            } else {
                $this->LooseQtyasNewBatch->setFormValue($val);
            }
        }

        // Check field name 'AllowSlabBilling' first before field var 'x_AllowSlabBilling'
        $val = $CurrentForm->hasValue("AllowSlabBilling") ? $CurrentForm->getValue("AllowSlabBilling") : $CurrentForm->getValue("x_AllowSlabBilling");
        if (!$this->AllowSlabBilling->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AllowSlabBilling->Visible = false; // Disable update for API request
            } else {
                $this->AllowSlabBilling->setFormValue($val);
            }
        }

        // Check field name 'ProductTypeForProduction' first before field var 'x_ProductTypeForProduction'
        $val = $CurrentForm->hasValue("ProductTypeForProduction") ? $CurrentForm->getValue("ProductTypeForProduction") : $CurrentForm->getValue("x_ProductTypeForProduction");
        if (!$this->ProductTypeForProduction->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ProductTypeForProduction->Visible = false; // Disable update for API request
            } else {
                $this->ProductTypeForProduction->setFormValue($val);
            }
        }

        // Check field name 'RecipeCode' first before field var 'x_RecipeCode'
        $val = $CurrentForm->hasValue("RecipeCode") ? $CurrentForm->getValue("RecipeCode") : $CurrentForm->getValue("x_RecipeCode");
        if (!$this->RecipeCode->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RecipeCode->Visible = false; // Disable update for API request
            } else {
                $this->RecipeCode->setFormValue($val);
            }
        }

        // Check field name 'DefaultUnitType' first before field var 'x_DefaultUnitType'
        $val = $CurrentForm->hasValue("DefaultUnitType") ? $CurrentForm->getValue("DefaultUnitType") : $CurrentForm->getValue("x_DefaultUnitType");
        if (!$this->DefaultUnitType->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DefaultUnitType->Visible = false; // Disable update for API request
            } else {
                $this->DefaultUnitType->setFormValue($val);
            }
        }

        // Check field name 'PIstatus' first before field var 'x_PIstatus'
        $val = $CurrentForm->hasValue("PIstatus") ? $CurrentForm->getValue("PIstatus") : $CurrentForm->getValue("x_PIstatus");
        if (!$this->PIstatus->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PIstatus->Visible = false; // Disable update for API request
            } else {
                $this->PIstatus->setFormValue($val);
            }
        }

        // Check field name 'LastPiConfirmedDate' first before field var 'x_LastPiConfirmedDate'
        $val = $CurrentForm->hasValue("LastPiConfirmedDate") ? $CurrentForm->getValue("LastPiConfirmedDate") : $CurrentForm->getValue("x_LastPiConfirmedDate");
        if (!$this->LastPiConfirmedDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->LastPiConfirmedDate->Visible = false; // Disable update for API request
            } else {
                $this->LastPiConfirmedDate->setFormValue($val);
            }
            $this->LastPiConfirmedDate->CurrentValue = UnFormatDateTime($this->LastPiConfirmedDate->CurrentValue, 0);
        }

        // Check field name 'BarCodeDesign' first before field var 'x_BarCodeDesign'
        $val = $CurrentForm->hasValue("BarCodeDesign") ? $CurrentForm->getValue("BarCodeDesign") : $CurrentForm->getValue("x_BarCodeDesign");
        if (!$this->BarCodeDesign->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BarCodeDesign->Visible = false; // Disable update for API request
            } else {
                $this->BarCodeDesign->setFormValue($val);
            }
        }

        // Check field name 'AcceptRemarksInBill' first before field var 'x_AcceptRemarksInBill'
        $val = $CurrentForm->hasValue("AcceptRemarksInBill") ? $CurrentForm->getValue("AcceptRemarksInBill") : $CurrentForm->getValue("x_AcceptRemarksInBill");
        if (!$this->AcceptRemarksInBill->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AcceptRemarksInBill->Visible = false; // Disable update for API request
            } else {
                $this->AcceptRemarksInBill->setFormValue($val);
            }
        }

        // Check field name 'Classification' first before field var 'x_Classification'
        $val = $CurrentForm->hasValue("Classification") ? $CurrentForm->getValue("Classification") : $CurrentForm->getValue("x_Classification");
        if (!$this->Classification->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Classification->Visible = false; // Disable update for API request
            } else {
                $this->Classification->setFormValue($val);
            }
        }

        // Check field name 'TimeSlot' first before field var 'x_TimeSlot'
        $val = $CurrentForm->hasValue("TimeSlot") ? $CurrentForm->getValue("TimeSlot") : $CurrentForm->getValue("x_TimeSlot");
        if (!$this->TimeSlot->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TimeSlot->Visible = false; // Disable update for API request
            } else {
                $this->TimeSlot->setFormValue($val);
            }
        }

        // Check field name 'IsBundle' first before field var 'x_IsBundle'
        $val = $CurrentForm->hasValue("IsBundle") ? $CurrentForm->getValue("IsBundle") : $CurrentForm->getValue("x_IsBundle");
        if (!$this->IsBundle->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->IsBundle->Visible = false; // Disable update for API request
            } else {
                $this->IsBundle->setFormValue($val);
            }
        }

        // Check field name 'ColorCode' first before field var 'x_ColorCode'
        $val = $CurrentForm->hasValue("ColorCode") ? $CurrentForm->getValue("ColorCode") : $CurrentForm->getValue("x_ColorCode");
        if (!$this->ColorCode->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ColorCode->Visible = false; // Disable update for API request
            } else {
                $this->ColorCode->setFormValue($val);
            }
        }

        // Check field name 'GenderCode' first before field var 'x_GenderCode'
        $val = $CurrentForm->hasValue("GenderCode") ? $CurrentForm->getValue("GenderCode") : $CurrentForm->getValue("x_GenderCode");
        if (!$this->GenderCode->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->GenderCode->Visible = false; // Disable update for API request
            } else {
                $this->GenderCode->setFormValue($val);
            }
        }

        // Check field name 'SizeCode' first before field var 'x_SizeCode'
        $val = $CurrentForm->hasValue("SizeCode") ? $CurrentForm->getValue("SizeCode") : $CurrentForm->getValue("x_SizeCode");
        if (!$this->SizeCode->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SizeCode->Visible = false; // Disable update for API request
            } else {
                $this->SizeCode->setFormValue($val);
            }
        }

        // Check field name 'GiftCard' first before field var 'x_GiftCard'
        $val = $CurrentForm->hasValue("GiftCard") ? $CurrentForm->getValue("GiftCard") : $CurrentForm->getValue("x_GiftCard");
        if (!$this->GiftCard->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->GiftCard->Visible = false; // Disable update for API request
            } else {
                $this->GiftCard->setFormValue($val);
            }
        }

        // Check field name 'ToonLabel' first before field var 'x_ToonLabel'
        $val = $CurrentForm->hasValue("ToonLabel") ? $CurrentForm->getValue("ToonLabel") : $CurrentForm->getValue("x_ToonLabel");
        if (!$this->ToonLabel->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ToonLabel->Visible = false; // Disable update for API request
            } else {
                $this->ToonLabel->setFormValue($val);
            }
        }

        // Check field name 'GarmentType' first before field var 'x_GarmentType'
        $val = $CurrentForm->hasValue("GarmentType") ? $CurrentForm->getValue("GarmentType") : $CurrentForm->getValue("x_GarmentType");
        if (!$this->GarmentType->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->GarmentType->Visible = false; // Disable update for API request
            } else {
                $this->GarmentType->setFormValue($val);
            }
        }

        // Check field name 'AgeGroup' first before field var 'x_AgeGroup'
        $val = $CurrentForm->hasValue("AgeGroup") ? $CurrentForm->getValue("AgeGroup") : $CurrentForm->getValue("x_AgeGroup");
        if (!$this->AgeGroup->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AgeGroup->Visible = false; // Disable update for API request
            } else {
                $this->AgeGroup->setFormValue($val);
            }
        }

        // Check field name 'Season' first before field var 'x_Season'
        $val = $CurrentForm->hasValue("Season") ? $CurrentForm->getValue("Season") : $CurrentForm->getValue("x_Season");
        if (!$this->Season->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Season->Visible = false; // Disable update for API request
            } else {
                $this->Season->setFormValue($val);
            }
        }

        // Check field name 'DailyStockEntry' first before field var 'x_DailyStockEntry'
        $val = $CurrentForm->hasValue("DailyStockEntry") ? $CurrentForm->getValue("DailyStockEntry") : $CurrentForm->getValue("x_DailyStockEntry");
        if (!$this->DailyStockEntry->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DailyStockEntry->Visible = false; // Disable update for API request
            } else {
                $this->DailyStockEntry->setFormValue($val);
            }
        }

        // Check field name 'ModifierApplicable' first before field var 'x_ModifierApplicable'
        $val = $CurrentForm->hasValue("ModifierApplicable") ? $CurrentForm->getValue("ModifierApplicable") : $CurrentForm->getValue("x_ModifierApplicable");
        if (!$this->ModifierApplicable->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ModifierApplicable->Visible = false; // Disable update for API request
            } else {
                $this->ModifierApplicable->setFormValue($val);
            }
        }

        // Check field name 'ModifierType' first before field var 'x_ModifierType'
        $val = $CurrentForm->hasValue("ModifierType") ? $CurrentForm->getValue("ModifierType") : $CurrentForm->getValue("x_ModifierType");
        if (!$this->ModifierType->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ModifierType->Visible = false; // Disable update for API request
            } else {
                $this->ModifierType->setFormValue($val);
            }
        }

        // Check field name 'AcceptZeroRate' first before field var 'x_AcceptZeroRate'
        $val = $CurrentForm->hasValue("AcceptZeroRate") ? $CurrentForm->getValue("AcceptZeroRate") : $CurrentForm->getValue("x_AcceptZeroRate");
        if (!$this->AcceptZeroRate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AcceptZeroRate->Visible = false; // Disable update for API request
            } else {
                $this->AcceptZeroRate->setFormValue($val);
            }
        }

        // Check field name 'ExciseDutyCode' first before field var 'x_ExciseDutyCode'
        $val = $CurrentForm->hasValue("ExciseDutyCode") ? $CurrentForm->getValue("ExciseDutyCode") : $CurrentForm->getValue("x_ExciseDutyCode");
        if (!$this->ExciseDutyCode->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ExciseDutyCode->Visible = false; // Disable update for API request
            } else {
                $this->ExciseDutyCode->setFormValue($val);
            }
        }

        // Check field name 'IndentProductGroupCode' first before field var 'x_IndentProductGroupCode'
        $val = $CurrentForm->hasValue("IndentProductGroupCode") ? $CurrentForm->getValue("IndentProductGroupCode") : $CurrentForm->getValue("x_IndentProductGroupCode");
        if (!$this->IndentProductGroupCode->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->IndentProductGroupCode->Visible = false; // Disable update for API request
            } else {
                $this->IndentProductGroupCode->setFormValue($val);
            }
        }

        // Check field name 'IsMultiBatch' first before field var 'x_IsMultiBatch'
        $val = $CurrentForm->hasValue("IsMultiBatch") ? $CurrentForm->getValue("IsMultiBatch") : $CurrentForm->getValue("x_IsMultiBatch");
        if (!$this->IsMultiBatch->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->IsMultiBatch->Visible = false; // Disable update for API request
            } else {
                $this->IsMultiBatch->setFormValue($val);
            }
        }

        // Check field name 'IsSingleBatch' first before field var 'x_IsSingleBatch'
        $val = $CurrentForm->hasValue("IsSingleBatch") ? $CurrentForm->getValue("IsSingleBatch") : $CurrentForm->getValue("x_IsSingleBatch");
        if (!$this->IsSingleBatch->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->IsSingleBatch->Visible = false; // Disable update for API request
            } else {
                $this->IsSingleBatch->setFormValue($val);
            }
        }

        // Check field name 'MarkUpRate1' first before field var 'x_MarkUpRate1'
        $val = $CurrentForm->hasValue("MarkUpRate1") ? $CurrentForm->getValue("MarkUpRate1") : $CurrentForm->getValue("x_MarkUpRate1");
        if (!$this->MarkUpRate1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->MarkUpRate1->Visible = false; // Disable update for API request
            } else {
                $this->MarkUpRate1->setFormValue($val);
            }
        }

        // Check field name 'MarkDownRate1' first before field var 'x_MarkDownRate1'
        $val = $CurrentForm->hasValue("MarkDownRate1") ? $CurrentForm->getValue("MarkDownRate1") : $CurrentForm->getValue("x_MarkDownRate1");
        if (!$this->MarkDownRate1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->MarkDownRate1->Visible = false; // Disable update for API request
            } else {
                $this->MarkDownRate1->setFormValue($val);
            }
        }

        // Check field name 'MarkUpRate2' first before field var 'x_MarkUpRate2'
        $val = $CurrentForm->hasValue("MarkUpRate2") ? $CurrentForm->getValue("MarkUpRate2") : $CurrentForm->getValue("x_MarkUpRate2");
        if (!$this->MarkUpRate2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->MarkUpRate2->Visible = false; // Disable update for API request
            } else {
                $this->MarkUpRate2->setFormValue($val);
            }
        }

        // Check field name 'MarkDownRate2' first before field var 'x_MarkDownRate2'
        $val = $CurrentForm->hasValue("MarkDownRate2") ? $CurrentForm->getValue("MarkDownRate2") : $CurrentForm->getValue("x_MarkDownRate2");
        if (!$this->MarkDownRate2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->MarkDownRate2->Visible = false; // Disable update for API request
            } else {
                $this->MarkDownRate2->setFormValue($val);
            }
        }

        // Check field name 'Yield' first before field var 'x__Yield'
        $val = $CurrentForm->hasValue("Yield") ? $CurrentForm->getValue("Yield") : $CurrentForm->getValue("x__Yield");
        if (!$this->_Yield->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->_Yield->Visible = false; // Disable update for API request
            } else {
                $this->_Yield->setFormValue($val);
            }
        }

        // Check field name 'RefProductCode' first before field var 'x_RefProductCode'
        $val = $CurrentForm->hasValue("RefProductCode") ? $CurrentForm->getValue("RefProductCode") : $CurrentForm->getValue("x_RefProductCode");
        if (!$this->RefProductCode->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RefProductCode->Visible = false; // Disable update for API request
            } else {
                $this->RefProductCode->setFormValue($val);
            }
        }

        // Check field name 'Volume' first before field var 'x_Volume'
        $val = $CurrentForm->hasValue("Volume") ? $CurrentForm->getValue("Volume") : $CurrentForm->getValue("x_Volume");
        if (!$this->Volume->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Volume->Visible = false; // Disable update for API request
            } else {
                $this->Volume->setFormValue($val);
            }
        }

        // Check field name 'MeasurementID' first before field var 'x_MeasurementID'
        $val = $CurrentForm->hasValue("MeasurementID") ? $CurrentForm->getValue("MeasurementID") : $CurrentForm->getValue("x_MeasurementID");
        if (!$this->MeasurementID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->MeasurementID->Visible = false; // Disable update for API request
            } else {
                $this->MeasurementID->setFormValue($val);
            }
        }

        // Check field name 'CountryCode' first before field var 'x_CountryCode'
        $val = $CurrentForm->hasValue("CountryCode") ? $CurrentForm->getValue("CountryCode") : $CurrentForm->getValue("x_CountryCode");
        if (!$this->CountryCode->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CountryCode->Visible = false; // Disable update for API request
            } else {
                $this->CountryCode->setFormValue($val);
            }
        }

        // Check field name 'AcceptWMQty' first before field var 'x_AcceptWMQty'
        $val = $CurrentForm->hasValue("AcceptWMQty") ? $CurrentForm->getValue("AcceptWMQty") : $CurrentForm->getValue("x_AcceptWMQty");
        if (!$this->AcceptWMQty->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AcceptWMQty->Visible = false; // Disable update for API request
            } else {
                $this->AcceptWMQty->setFormValue($val);
            }
        }

        // Check field name 'SingleBatchBasedOnRate' first before field var 'x_SingleBatchBasedOnRate'
        $val = $CurrentForm->hasValue("SingleBatchBasedOnRate") ? $CurrentForm->getValue("SingleBatchBasedOnRate") : $CurrentForm->getValue("x_SingleBatchBasedOnRate");
        if (!$this->SingleBatchBasedOnRate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SingleBatchBasedOnRate->Visible = false; // Disable update for API request
            } else {
                $this->SingleBatchBasedOnRate->setFormValue($val);
            }
        }

        // Check field name 'TenderNo' first before field var 'x_TenderNo'
        $val = $CurrentForm->hasValue("TenderNo") ? $CurrentForm->getValue("TenderNo") : $CurrentForm->getValue("x_TenderNo");
        if (!$this->TenderNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TenderNo->Visible = false; // Disable update for API request
            } else {
                $this->TenderNo->setFormValue($val);
            }
        }

        // Check field name 'SingleBillMaximumSoldQtyFiled' first before field var 'x_SingleBillMaximumSoldQtyFiled'
        $val = $CurrentForm->hasValue("SingleBillMaximumSoldQtyFiled") ? $CurrentForm->getValue("SingleBillMaximumSoldQtyFiled") : $CurrentForm->getValue("x_SingleBillMaximumSoldQtyFiled");
        if (!$this->SingleBillMaximumSoldQtyFiled->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SingleBillMaximumSoldQtyFiled->Visible = false; // Disable update for API request
            } else {
                $this->SingleBillMaximumSoldQtyFiled->setFormValue($val);
            }
        }

        // Check field name 'Strength1' first before field var 'x_Strength1'
        $val = $CurrentForm->hasValue("Strength1") ? $CurrentForm->getValue("Strength1") : $CurrentForm->getValue("x_Strength1");
        if (!$this->Strength1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Strength1->Visible = false; // Disable update for API request
            } else {
                $this->Strength1->setFormValue($val);
            }
        }

        // Check field name 'Strength2' first before field var 'x_Strength2'
        $val = $CurrentForm->hasValue("Strength2") ? $CurrentForm->getValue("Strength2") : $CurrentForm->getValue("x_Strength2");
        if (!$this->Strength2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Strength2->Visible = false; // Disable update for API request
            } else {
                $this->Strength2->setFormValue($val);
            }
        }

        // Check field name 'Strength3' first before field var 'x_Strength3'
        $val = $CurrentForm->hasValue("Strength3") ? $CurrentForm->getValue("Strength3") : $CurrentForm->getValue("x_Strength3");
        if (!$this->Strength3->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Strength3->Visible = false; // Disable update for API request
            } else {
                $this->Strength3->setFormValue($val);
            }
        }

        // Check field name 'Strength4' first before field var 'x_Strength4'
        $val = $CurrentForm->hasValue("Strength4") ? $CurrentForm->getValue("Strength4") : $CurrentForm->getValue("x_Strength4");
        if (!$this->Strength4->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Strength4->Visible = false; // Disable update for API request
            } else {
                $this->Strength4->setFormValue($val);
            }
        }

        // Check field name 'Strength5' first before field var 'x_Strength5'
        $val = $CurrentForm->hasValue("Strength5") ? $CurrentForm->getValue("Strength5") : $CurrentForm->getValue("x_Strength5");
        if (!$this->Strength5->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Strength5->Visible = false; // Disable update for API request
            } else {
                $this->Strength5->setFormValue($val);
            }
        }

        // Check field name 'IngredientCode1' first before field var 'x_IngredientCode1'
        $val = $CurrentForm->hasValue("IngredientCode1") ? $CurrentForm->getValue("IngredientCode1") : $CurrentForm->getValue("x_IngredientCode1");
        if (!$this->IngredientCode1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->IngredientCode1->Visible = false; // Disable update for API request
            } else {
                $this->IngredientCode1->setFormValue($val);
            }
        }

        // Check field name 'IngredientCode2' first before field var 'x_IngredientCode2'
        $val = $CurrentForm->hasValue("IngredientCode2") ? $CurrentForm->getValue("IngredientCode2") : $CurrentForm->getValue("x_IngredientCode2");
        if (!$this->IngredientCode2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->IngredientCode2->Visible = false; // Disable update for API request
            } else {
                $this->IngredientCode2->setFormValue($val);
            }
        }

        // Check field name 'IngredientCode3' first before field var 'x_IngredientCode3'
        $val = $CurrentForm->hasValue("IngredientCode3") ? $CurrentForm->getValue("IngredientCode3") : $CurrentForm->getValue("x_IngredientCode3");
        if (!$this->IngredientCode3->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->IngredientCode3->Visible = false; // Disable update for API request
            } else {
                $this->IngredientCode3->setFormValue($val);
            }
        }

        // Check field name 'IngredientCode4' first before field var 'x_IngredientCode4'
        $val = $CurrentForm->hasValue("IngredientCode4") ? $CurrentForm->getValue("IngredientCode4") : $CurrentForm->getValue("x_IngredientCode4");
        if (!$this->IngredientCode4->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->IngredientCode4->Visible = false; // Disable update for API request
            } else {
                $this->IngredientCode4->setFormValue($val);
            }
        }

        // Check field name 'IngredientCode5' first before field var 'x_IngredientCode5'
        $val = $CurrentForm->hasValue("IngredientCode5") ? $CurrentForm->getValue("IngredientCode5") : $CurrentForm->getValue("x_IngredientCode5");
        if (!$this->IngredientCode5->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->IngredientCode5->Visible = false; // Disable update for API request
            } else {
                $this->IngredientCode5->setFormValue($val);
            }
        }

        // Check field name 'OrderType' first before field var 'x_OrderType'
        $val = $CurrentForm->hasValue("OrderType") ? $CurrentForm->getValue("OrderType") : $CurrentForm->getValue("x_OrderType");
        if (!$this->OrderType->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->OrderType->Visible = false; // Disable update for API request
            } else {
                $this->OrderType->setFormValue($val);
            }
        }

        // Check field name 'StockUOM' first before field var 'x_StockUOM'
        $val = $CurrentForm->hasValue("StockUOM") ? $CurrentForm->getValue("StockUOM") : $CurrentForm->getValue("x_StockUOM");
        if (!$this->StockUOM->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->StockUOM->Visible = false; // Disable update for API request
            } else {
                $this->StockUOM->setFormValue($val);
            }
        }

        // Check field name 'PriceUOM' first before field var 'x_PriceUOM'
        $val = $CurrentForm->hasValue("PriceUOM") ? $CurrentForm->getValue("PriceUOM") : $CurrentForm->getValue("x_PriceUOM");
        if (!$this->PriceUOM->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PriceUOM->Visible = false; // Disable update for API request
            } else {
                $this->PriceUOM->setFormValue($val);
            }
        }

        // Check field name 'DefaultSaleUOM' first before field var 'x_DefaultSaleUOM'
        $val = $CurrentForm->hasValue("DefaultSaleUOM") ? $CurrentForm->getValue("DefaultSaleUOM") : $CurrentForm->getValue("x_DefaultSaleUOM");
        if (!$this->DefaultSaleUOM->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DefaultSaleUOM->Visible = false; // Disable update for API request
            } else {
                $this->DefaultSaleUOM->setFormValue($val);
            }
        }

        // Check field name 'DefaultPurchaseUOM' first before field var 'x_DefaultPurchaseUOM'
        $val = $CurrentForm->hasValue("DefaultPurchaseUOM") ? $CurrentForm->getValue("DefaultPurchaseUOM") : $CurrentForm->getValue("x_DefaultPurchaseUOM");
        if (!$this->DefaultPurchaseUOM->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DefaultPurchaseUOM->Visible = false; // Disable update for API request
            } else {
                $this->DefaultPurchaseUOM->setFormValue($val);
            }
        }

        // Check field name 'ReportingUOM' first before field var 'x_ReportingUOM'
        $val = $CurrentForm->hasValue("ReportingUOM") ? $CurrentForm->getValue("ReportingUOM") : $CurrentForm->getValue("x_ReportingUOM");
        if (!$this->ReportingUOM->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ReportingUOM->Visible = false; // Disable update for API request
            } else {
                $this->ReportingUOM->setFormValue($val);
            }
        }

        // Check field name 'LastPurchasedUOM' first before field var 'x_LastPurchasedUOM'
        $val = $CurrentForm->hasValue("LastPurchasedUOM") ? $CurrentForm->getValue("LastPurchasedUOM") : $CurrentForm->getValue("x_LastPurchasedUOM");
        if (!$this->LastPurchasedUOM->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->LastPurchasedUOM->Visible = false; // Disable update for API request
            } else {
                $this->LastPurchasedUOM->setFormValue($val);
            }
        }

        // Check field name 'TreatmentCodes' first before field var 'x_TreatmentCodes'
        $val = $CurrentForm->hasValue("TreatmentCodes") ? $CurrentForm->getValue("TreatmentCodes") : $CurrentForm->getValue("x_TreatmentCodes");
        if (!$this->TreatmentCodes->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TreatmentCodes->Visible = false; // Disable update for API request
            } else {
                $this->TreatmentCodes->setFormValue($val);
            }
        }

        // Check field name 'InsuranceType' first before field var 'x_InsuranceType'
        $val = $CurrentForm->hasValue("InsuranceType") ? $CurrentForm->getValue("InsuranceType") : $CurrentForm->getValue("x_InsuranceType");
        if (!$this->InsuranceType->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->InsuranceType->Visible = false; // Disable update for API request
            } else {
                $this->InsuranceType->setFormValue($val);
            }
        }

        // Check field name 'CoverageGroupCodes' first before field var 'x_CoverageGroupCodes'
        $val = $CurrentForm->hasValue("CoverageGroupCodes") ? $CurrentForm->getValue("CoverageGroupCodes") : $CurrentForm->getValue("x_CoverageGroupCodes");
        if (!$this->CoverageGroupCodes->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CoverageGroupCodes->Visible = false; // Disable update for API request
            } else {
                $this->CoverageGroupCodes->setFormValue($val);
            }
        }

        // Check field name 'MultipleUOM' first before field var 'x_MultipleUOM'
        $val = $CurrentForm->hasValue("MultipleUOM") ? $CurrentForm->getValue("MultipleUOM") : $CurrentForm->getValue("x_MultipleUOM");
        if (!$this->MultipleUOM->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->MultipleUOM->Visible = false; // Disable update for API request
            } else {
                $this->MultipleUOM->setFormValue($val);
            }
        }

        // Check field name 'SalePriceComputation' first before field var 'x_SalePriceComputation'
        $val = $CurrentForm->hasValue("SalePriceComputation") ? $CurrentForm->getValue("SalePriceComputation") : $CurrentForm->getValue("x_SalePriceComputation");
        if (!$this->SalePriceComputation->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SalePriceComputation->Visible = false; // Disable update for API request
            } else {
                $this->SalePriceComputation->setFormValue($val);
            }
        }

        // Check field name 'StockCorrection' first before field var 'x_StockCorrection'
        $val = $CurrentForm->hasValue("StockCorrection") ? $CurrentForm->getValue("StockCorrection") : $CurrentForm->getValue("x_StockCorrection");
        if (!$this->StockCorrection->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->StockCorrection->Visible = false; // Disable update for API request
            } else {
                $this->StockCorrection->setFormValue($val);
            }
        }

        // Check field name 'LBTPercentage' first before field var 'x_LBTPercentage'
        $val = $CurrentForm->hasValue("LBTPercentage") ? $CurrentForm->getValue("LBTPercentage") : $CurrentForm->getValue("x_LBTPercentage");
        if (!$this->LBTPercentage->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->LBTPercentage->Visible = false; // Disable update for API request
            } else {
                $this->LBTPercentage->setFormValue($val);
            }
        }

        // Check field name 'SalesCommission' first before field var 'x_SalesCommission'
        $val = $CurrentForm->hasValue("SalesCommission") ? $CurrentForm->getValue("SalesCommission") : $CurrentForm->getValue("x_SalesCommission");
        if (!$this->SalesCommission->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SalesCommission->Visible = false; // Disable update for API request
            } else {
                $this->SalesCommission->setFormValue($val);
            }
        }

        // Check field name 'LockedStock' first before field var 'x_LockedStock'
        $val = $CurrentForm->hasValue("LockedStock") ? $CurrentForm->getValue("LockedStock") : $CurrentForm->getValue("x_LockedStock");
        if (!$this->LockedStock->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->LockedStock->Visible = false; // Disable update for API request
            } else {
                $this->LockedStock->setFormValue($val);
            }
        }

        // Check field name 'MinMaxUOM' first before field var 'x_MinMaxUOM'
        $val = $CurrentForm->hasValue("MinMaxUOM") ? $CurrentForm->getValue("MinMaxUOM") : $CurrentForm->getValue("x_MinMaxUOM");
        if (!$this->MinMaxUOM->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->MinMaxUOM->Visible = false; // Disable update for API request
            } else {
                $this->MinMaxUOM->setFormValue($val);
            }
        }

        // Check field name 'ExpiryMfrDateFormat' first before field var 'x_ExpiryMfrDateFormat'
        $val = $CurrentForm->hasValue("ExpiryMfrDateFormat") ? $CurrentForm->getValue("ExpiryMfrDateFormat") : $CurrentForm->getValue("x_ExpiryMfrDateFormat");
        if (!$this->ExpiryMfrDateFormat->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ExpiryMfrDateFormat->Visible = false; // Disable update for API request
            } else {
                $this->ExpiryMfrDateFormat->setFormValue($val);
            }
        }

        // Check field name 'ProductLifeTime' first before field var 'x_ProductLifeTime'
        $val = $CurrentForm->hasValue("ProductLifeTime") ? $CurrentForm->getValue("ProductLifeTime") : $CurrentForm->getValue("x_ProductLifeTime");
        if (!$this->ProductLifeTime->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ProductLifeTime->Visible = false; // Disable update for API request
            } else {
                $this->ProductLifeTime->setFormValue($val);
            }
        }

        // Check field name 'IsCombo' first before field var 'x_IsCombo'
        $val = $CurrentForm->hasValue("IsCombo") ? $CurrentForm->getValue("IsCombo") : $CurrentForm->getValue("x_IsCombo");
        if (!$this->IsCombo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->IsCombo->Visible = false; // Disable update for API request
            } else {
                $this->IsCombo->setFormValue($val);
            }
        }

        // Check field name 'ComboTypeCode' first before field var 'x_ComboTypeCode'
        $val = $CurrentForm->hasValue("ComboTypeCode") ? $CurrentForm->getValue("ComboTypeCode") : $CurrentForm->getValue("x_ComboTypeCode");
        if (!$this->ComboTypeCode->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ComboTypeCode->Visible = false; // Disable update for API request
            } else {
                $this->ComboTypeCode->setFormValue($val);
            }
        }

        // Check field name 'AttributeCount6' first before field var 'x_AttributeCount6'
        $val = $CurrentForm->hasValue("AttributeCount6") ? $CurrentForm->getValue("AttributeCount6") : $CurrentForm->getValue("x_AttributeCount6");
        if (!$this->AttributeCount6->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AttributeCount6->Visible = false; // Disable update for API request
            } else {
                $this->AttributeCount6->setFormValue($val);
            }
        }

        // Check field name 'AttributeCount7' first before field var 'x_AttributeCount7'
        $val = $CurrentForm->hasValue("AttributeCount7") ? $CurrentForm->getValue("AttributeCount7") : $CurrentForm->getValue("x_AttributeCount7");
        if (!$this->AttributeCount7->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AttributeCount7->Visible = false; // Disable update for API request
            } else {
                $this->AttributeCount7->setFormValue($val);
            }
        }

        // Check field name 'AttributeCount8' first before field var 'x_AttributeCount8'
        $val = $CurrentForm->hasValue("AttributeCount8") ? $CurrentForm->getValue("AttributeCount8") : $CurrentForm->getValue("x_AttributeCount8");
        if (!$this->AttributeCount8->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AttributeCount8->Visible = false; // Disable update for API request
            } else {
                $this->AttributeCount8->setFormValue($val);
            }
        }

        // Check field name 'AttributeCount9' first before field var 'x_AttributeCount9'
        $val = $CurrentForm->hasValue("AttributeCount9") ? $CurrentForm->getValue("AttributeCount9") : $CurrentForm->getValue("x_AttributeCount9");
        if (!$this->AttributeCount9->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AttributeCount9->Visible = false; // Disable update for API request
            } else {
                $this->AttributeCount9->setFormValue($val);
            }
        }

        // Check field name 'AttributeCount10' first before field var 'x_AttributeCount10'
        $val = $CurrentForm->hasValue("AttributeCount10") ? $CurrentForm->getValue("AttributeCount10") : $CurrentForm->getValue("x_AttributeCount10");
        if (!$this->AttributeCount10->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AttributeCount10->Visible = false; // Disable update for API request
            } else {
                $this->AttributeCount10->setFormValue($val);
            }
        }

        // Check field name 'LabourCharge' first before field var 'x_LabourCharge'
        $val = $CurrentForm->hasValue("LabourCharge") ? $CurrentForm->getValue("LabourCharge") : $CurrentForm->getValue("x_LabourCharge");
        if (!$this->LabourCharge->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->LabourCharge->Visible = false; // Disable update for API request
            } else {
                $this->LabourCharge->setFormValue($val);
            }
        }

        // Check field name 'AffectOtherCharge' first before field var 'x_AffectOtherCharge'
        $val = $CurrentForm->hasValue("AffectOtherCharge") ? $CurrentForm->getValue("AffectOtherCharge") : $CurrentForm->getValue("x_AffectOtherCharge");
        if (!$this->AffectOtherCharge->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AffectOtherCharge->Visible = false; // Disable update for API request
            } else {
                $this->AffectOtherCharge->setFormValue($val);
            }
        }

        // Check field name 'DosageInfo' first before field var 'x_DosageInfo'
        $val = $CurrentForm->hasValue("DosageInfo") ? $CurrentForm->getValue("DosageInfo") : $CurrentForm->getValue("x_DosageInfo");
        if (!$this->DosageInfo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DosageInfo->Visible = false; // Disable update for API request
            } else {
                $this->DosageInfo->setFormValue($val);
            }
        }

        // Check field name 'DosageType' first before field var 'x_DosageType'
        $val = $CurrentForm->hasValue("DosageType") ? $CurrentForm->getValue("DosageType") : $CurrentForm->getValue("x_DosageType");
        if (!$this->DosageType->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DosageType->Visible = false; // Disable update for API request
            } else {
                $this->DosageType->setFormValue($val);
            }
        }

        // Check field name 'DefaultIndentUOM' first before field var 'x_DefaultIndentUOM'
        $val = $CurrentForm->hasValue("DefaultIndentUOM") ? $CurrentForm->getValue("DefaultIndentUOM") : $CurrentForm->getValue("x_DefaultIndentUOM");
        if (!$this->DefaultIndentUOM->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DefaultIndentUOM->Visible = false; // Disable update for API request
            } else {
                $this->DefaultIndentUOM->setFormValue($val);
            }
        }

        // Check field name 'PromoTag' first before field var 'x_PromoTag'
        $val = $CurrentForm->hasValue("PromoTag") ? $CurrentForm->getValue("PromoTag") : $CurrentForm->getValue("x_PromoTag");
        if (!$this->PromoTag->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PromoTag->Visible = false; // Disable update for API request
            } else {
                $this->PromoTag->setFormValue($val);
            }
        }

        // Check field name 'BillLevelPromoTag' first before field var 'x_BillLevelPromoTag'
        $val = $CurrentForm->hasValue("BillLevelPromoTag") ? $CurrentForm->getValue("BillLevelPromoTag") : $CurrentForm->getValue("x_BillLevelPromoTag");
        if (!$this->BillLevelPromoTag->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BillLevelPromoTag->Visible = false; // Disable update for API request
            } else {
                $this->BillLevelPromoTag->setFormValue($val);
            }
        }

        // Check field name 'IsMRPProduct' first before field var 'x_IsMRPProduct'
        $val = $CurrentForm->hasValue("IsMRPProduct") ? $CurrentForm->getValue("IsMRPProduct") : $CurrentForm->getValue("x_IsMRPProduct");
        if (!$this->IsMRPProduct->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->IsMRPProduct->Visible = false; // Disable update for API request
            } else {
                $this->IsMRPProduct->setFormValue($val);
            }
        }

        // Check field name 'MrpList' first before field var 'x_MrpList'
        $val = $CurrentForm->hasValue("MrpList") ? $CurrentForm->getValue("MrpList") : $CurrentForm->getValue("x_MrpList");
        if (!$this->MrpList->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->MrpList->Visible = false; // Disable update for API request
            } else {
                $this->MrpList->setFormValue($val);
            }
        }

        // Check field name 'AlternateSaleUOM' first before field var 'x_AlternateSaleUOM'
        $val = $CurrentForm->hasValue("AlternateSaleUOM") ? $CurrentForm->getValue("AlternateSaleUOM") : $CurrentForm->getValue("x_AlternateSaleUOM");
        if (!$this->AlternateSaleUOM->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AlternateSaleUOM->Visible = false; // Disable update for API request
            } else {
                $this->AlternateSaleUOM->setFormValue($val);
            }
        }

        // Check field name 'FreeUOM' first before field var 'x_FreeUOM'
        $val = $CurrentForm->hasValue("FreeUOM") ? $CurrentForm->getValue("FreeUOM") : $CurrentForm->getValue("x_FreeUOM");
        if (!$this->FreeUOM->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->FreeUOM->Visible = false; // Disable update for API request
            } else {
                $this->FreeUOM->setFormValue($val);
            }
        }

        // Check field name 'MarketedCode' first before field var 'x_MarketedCode'
        $val = $CurrentForm->hasValue("MarketedCode") ? $CurrentForm->getValue("MarketedCode") : $CurrentForm->getValue("x_MarketedCode");
        if (!$this->MarketedCode->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->MarketedCode->Visible = false; // Disable update for API request
            } else {
                $this->MarketedCode->setFormValue($val);
            }
        }

        // Check field name 'MinimumSalePrice' first before field var 'x_MinimumSalePrice'
        $val = $CurrentForm->hasValue("MinimumSalePrice") ? $CurrentForm->getValue("MinimumSalePrice") : $CurrentForm->getValue("x_MinimumSalePrice");
        if (!$this->MinimumSalePrice->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->MinimumSalePrice->Visible = false; // Disable update for API request
            } else {
                $this->MinimumSalePrice->setFormValue($val);
            }
        }

        // Check field name 'PRate1' first before field var 'x_PRate1'
        $val = $CurrentForm->hasValue("PRate1") ? $CurrentForm->getValue("PRate1") : $CurrentForm->getValue("x_PRate1");
        if (!$this->PRate1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PRate1->Visible = false; // Disable update for API request
            } else {
                $this->PRate1->setFormValue($val);
            }
        }

        // Check field name 'PRate2' first before field var 'x_PRate2'
        $val = $CurrentForm->hasValue("PRate2") ? $CurrentForm->getValue("PRate2") : $CurrentForm->getValue("x_PRate2");
        if (!$this->PRate2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PRate2->Visible = false; // Disable update for API request
            } else {
                $this->PRate2->setFormValue($val);
            }
        }

        // Check field name 'LPItemCost' first before field var 'x_LPItemCost'
        $val = $CurrentForm->hasValue("LPItemCost") ? $CurrentForm->getValue("LPItemCost") : $CurrentForm->getValue("x_LPItemCost");
        if (!$this->LPItemCost->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->LPItemCost->Visible = false; // Disable update for API request
            } else {
                $this->LPItemCost->setFormValue($val);
            }
        }

        // Check field name 'FixedItemCost' first before field var 'x_FixedItemCost'
        $val = $CurrentForm->hasValue("FixedItemCost") ? $CurrentForm->getValue("FixedItemCost") : $CurrentForm->getValue("x_FixedItemCost");
        if (!$this->FixedItemCost->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->FixedItemCost->Visible = false; // Disable update for API request
            } else {
                $this->FixedItemCost->setFormValue($val);
            }
        }

        // Check field name 'HSNId' first before field var 'x_HSNId'
        $val = $CurrentForm->hasValue("HSNId") ? $CurrentForm->getValue("HSNId") : $CurrentForm->getValue("x_HSNId");
        if (!$this->HSNId->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->HSNId->Visible = false; // Disable update for API request
            } else {
                $this->HSNId->setFormValue($val);
            }
        }

        // Check field name 'TaxInclusive' first before field var 'x_TaxInclusive'
        $val = $CurrentForm->hasValue("TaxInclusive") ? $CurrentForm->getValue("TaxInclusive") : $CurrentForm->getValue("x_TaxInclusive");
        if (!$this->TaxInclusive->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TaxInclusive->Visible = false; // Disable update for API request
            } else {
                $this->TaxInclusive->setFormValue($val);
            }
        }

        // Check field name 'EligibleforWarranty' first before field var 'x_EligibleforWarranty'
        $val = $CurrentForm->hasValue("EligibleforWarranty") ? $CurrentForm->getValue("EligibleforWarranty") : $CurrentForm->getValue("x_EligibleforWarranty");
        if (!$this->EligibleforWarranty->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->EligibleforWarranty->Visible = false; // Disable update for API request
            } else {
                $this->EligibleforWarranty->setFormValue($val);
            }
        }

        // Check field name 'NoofMonthsWarranty' first before field var 'x_NoofMonthsWarranty'
        $val = $CurrentForm->hasValue("NoofMonthsWarranty") ? $CurrentForm->getValue("NoofMonthsWarranty") : $CurrentForm->getValue("x_NoofMonthsWarranty");
        if (!$this->NoofMonthsWarranty->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->NoofMonthsWarranty->Visible = false; // Disable update for API request
            } else {
                $this->NoofMonthsWarranty->setFormValue($val);
            }
        }

        // Check field name 'ComputeTaxonCost' first before field var 'x_ComputeTaxonCost'
        $val = $CurrentForm->hasValue("ComputeTaxonCost") ? $CurrentForm->getValue("ComputeTaxonCost") : $CurrentForm->getValue("x_ComputeTaxonCost");
        if (!$this->ComputeTaxonCost->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ComputeTaxonCost->Visible = false; // Disable update for API request
            } else {
                $this->ComputeTaxonCost->setFormValue($val);
            }
        }

        // Check field name 'HasEmptyBottleTrack' first before field var 'x_HasEmptyBottleTrack'
        $val = $CurrentForm->hasValue("HasEmptyBottleTrack") ? $CurrentForm->getValue("HasEmptyBottleTrack") : $CurrentForm->getValue("x_HasEmptyBottleTrack");
        if (!$this->HasEmptyBottleTrack->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->HasEmptyBottleTrack->Visible = false; // Disable update for API request
            } else {
                $this->HasEmptyBottleTrack->setFormValue($val);
            }
        }

        // Check field name 'EmptyBottleReferenceCode' first before field var 'x_EmptyBottleReferenceCode'
        $val = $CurrentForm->hasValue("EmptyBottleReferenceCode") ? $CurrentForm->getValue("EmptyBottleReferenceCode") : $CurrentForm->getValue("x_EmptyBottleReferenceCode");
        if (!$this->EmptyBottleReferenceCode->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->EmptyBottleReferenceCode->Visible = false; // Disable update for API request
            } else {
                $this->EmptyBottleReferenceCode->setFormValue($val);
            }
        }

        // Check field name 'AdditionalCESSAmount' first before field var 'x_AdditionalCESSAmount'
        $val = $CurrentForm->hasValue("AdditionalCESSAmount") ? $CurrentForm->getValue("AdditionalCESSAmount") : $CurrentForm->getValue("x_AdditionalCESSAmount");
        if (!$this->AdditionalCESSAmount->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AdditionalCESSAmount->Visible = false; // Disable update for API request
            } else {
                $this->AdditionalCESSAmount->setFormValue($val);
            }
        }

        // Check field name 'EmptyBottleRate' first before field var 'x_EmptyBottleRate'
        $val = $CurrentForm->hasValue("EmptyBottleRate") ? $CurrentForm->getValue("EmptyBottleRate") : $CurrentForm->getValue("x_EmptyBottleRate");
        if (!$this->EmptyBottleRate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->EmptyBottleRate->Visible = false; // Disable update for API request
            } else {
                $this->EmptyBottleRate->setFormValue($val);
            }
        }

        // Check field name 'ProductCode' first before field var 'x_ProductCode'
        $val = $CurrentForm->hasValue("ProductCode") ? $CurrentForm->getValue("ProductCode") : $CurrentForm->getValue("x_ProductCode");
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->ProductName->CurrentValue = $this->ProductName->FormValue;
        $this->DivisionCode->CurrentValue = $this->DivisionCode->FormValue;
        $this->ManufacturerCode->CurrentValue = $this->ManufacturerCode->FormValue;
        $this->SupplierCode->CurrentValue = $this->SupplierCode->FormValue;
        $this->AlternateSupplierCodes->CurrentValue = $this->AlternateSupplierCodes->FormValue;
        $this->AlternateProductCode->CurrentValue = $this->AlternateProductCode->FormValue;
        $this->UniversalProductCode->CurrentValue = $this->UniversalProductCode->FormValue;
        $this->BookProductCode->CurrentValue = $this->BookProductCode->FormValue;
        $this->OldCode->CurrentValue = $this->OldCode->FormValue;
        $this->ProtectedProducts->CurrentValue = $this->ProtectedProducts->FormValue;
        $this->ProductFullName->CurrentValue = $this->ProductFullName->FormValue;
        $this->UnitOfMeasure->CurrentValue = $this->UnitOfMeasure->FormValue;
        $this->UnitDescription->CurrentValue = $this->UnitDescription->FormValue;
        $this->BulkDescription->CurrentValue = $this->BulkDescription->FormValue;
        $this->BarCodeDescription->CurrentValue = $this->BarCodeDescription->FormValue;
        $this->PackageInformation->CurrentValue = $this->PackageInformation->FormValue;
        $this->PackageId->CurrentValue = $this->PackageId->FormValue;
        $this->Weight->CurrentValue = $this->Weight->FormValue;
        $this->AllowFractions->CurrentValue = $this->AllowFractions->FormValue;
        $this->MinimumStockLevel->CurrentValue = $this->MinimumStockLevel->FormValue;
        $this->MaximumStockLevel->CurrentValue = $this->MaximumStockLevel->FormValue;
        $this->ReorderLevel->CurrentValue = $this->ReorderLevel->FormValue;
        $this->MinMaxRatio->CurrentValue = $this->MinMaxRatio->FormValue;
        $this->AutoMinMaxRatio->CurrentValue = $this->AutoMinMaxRatio->FormValue;
        $this->ScheduleCode->CurrentValue = $this->ScheduleCode->FormValue;
        $this->RopRatio->CurrentValue = $this->RopRatio->FormValue;
        $this->MRP->CurrentValue = $this->MRP->FormValue;
        $this->PurchasePrice->CurrentValue = $this->PurchasePrice->FormValue;
        $this->PurchaseUnit->CurrentValue = $this->PurchaseUnit->FormValue;
        $this->PurchaseTaxCode->CurrentValue = $this->PurchaseTaxCode->FormValue;
        $this->AllowDirectInward->CurrentValue = $this->AllowDirectInward->FormValue;
        $this->SalePrice->CurrentValue = $this->SalePrice->FormValue;
        $this->SaleUnit->CurrentValue = $this->SaleUnit->FormValue;
        $this->SalesTaxCode->CurrentValue = $this->SalesTaxCode->FormValue;
        $this->StockReceived->CurrentValue = $this->StockReceived->FormValue;
        $this->TotalStock->CurrentValue = $this->TotalStock->FormValue;
        $this->StockType->CurrentValue = $this->StockType->FormValue;
        $this->StockCheckDate->CurrentValue = $this->StockCheckDate->FormValue;
        $this->StockCheckDate->CurrentValue = UnFormatDateTime($this->StockCheckDate->CurrentValue, 0);
        $this->StockAdjustmentDate->CurrentValue = $this->StockAdjustmentDate->FormValue;
        $this->StockAdjustmentDate->CurrentValue = UnFormatDateTime($this->StockAdjustmentDate->CurrentValue, 0);
        $this->Remarks->CurrentValue = $this->Remarks->FormValue;
        $this->CostCentre->CurrentValue = $this->CostCentre->FormValue;
        $this->ProductType->CurrentValue = $this->ProductType->FormValue;
        $this->TaxAmount->CurrentValue = $this->TaxAmount->FormValue;
        $this->TaxId->CurrentValue = $this->TaxId->FormValue;
        $this->ResaleTaxApplicable->CurrentValue = $this->ResaleTaxApplicable->FormValue;
        $this->CstOtherTax->CurrentValue = $this->CstOtherTax->FormValue;
        $this->TotalTax->CurrentValue = $this->TotalTax->FormValue;
        $this->ItemCost->CurrentValue = $this->ItemCost->FormValue;
        $this->ExpiryDate->CurrentValue = $this->ExpiryDate->FormValue;
        $this->ExpiryDate->CurrentValue = UnFormatDateTime($this->ExpiryDate->CurrentValue, 0);
        $this->BatchDescription->CurrentValue = $this->BatchDescription->FormValue;
        $this->FreeScheme->CurrentValue = $this->FreeScheme->FormValue;
        $this->CashDiscountEligibility->CurrentValue = $this->CashDiscountEligibility->FormValue;
        $this->DiscountPerAllowInBill->CurrentValue = $this->DiscountPerAllowInBill->FormValue;
        $this->Discount->CurrentValue = $this->Discount->FormValue;
        $this->TotalAmount->CurrentValue = $this->TotalAmount->FormValue;
        $this->StandardMargin->CurrentValue = $this->StandardMargin->FormValue;
        $this->Margin->CurrentValue = $this->Margin->FormValue;
        $this->MarginId->CurrentValue = $this->MarginId->FormValue;
        $this->ExpectedMargin->CurrentValue = $this->ExpectedMargin->FormValue;
        $this->SurchargeBeforeTax->CurrentValue = $this->SurchargeBeforeTax->FormValue;
        $this->SurchargeAfterTax->CurrentValue = $this->SurchargeAfterTax->FormValue;
        $this->TempOrderNo->CurrentValue = $this->TempOrderNo->FormValue;
        $this->TempOrderDate->CurrentValue = $this->TempOrderDate->FormValue;
        $this->TempOrderDate->CurrentValue = UnFormatDateTime($this->TempOrderDate->CurrentValue, 0);
        $this->OrderUnit->CurrentValue = $this->OrderUnit->FormValue;
        $this->OrderQuantity->CurrentValue = $this->OrderQuantity->FormValue;
        $this->MarkForOrder->CurrentValue = $this->MarkForOrder->FormValue;
        $this->OrderAllId->CurrentValue = $this->OrderAllId->FormValue;
        $this->CalculateOrderQty->CurrentValue = $this->CalculateOrderQty->FormValue;
        $this->SubLocation->CurrentValue = $this->SubLocation->FormValue;
        $this->CategoryCode->CurrentValue = $this->CategoryCode->FormValue;
        $this->SubCategory->CurrentValue = $this->SubCategory->FormValue;
        $this->FlexCategoryCode->CurrentValue = $this->FlexCategoryCode->FormValue;
        $this->ABCSaleQty->CurrentValue = $this->ABCSaleQty->FormValue;
        $this->ABCSaleValue->CurrentValue = $this->ABCSaleValue->FormValue;
        $this->ConvertionFactor->CurrentValue = $this->ConvertionFactor->FormValue;
        $this->ConvertionUnitDesc->CurrentValue = $this->ConvertionUnitDesc->FormValue;
        $this->TransactionId->CurrentValue = $this->TransactionId->FormValue;
        $this->SoldProductId->CurrentValue = $this->SoldProductId->FormValue;
        $this->WantedBookId->CurrentValue = $this->WantedBookId->FormValue;
        $this->AllId->CurrentValue = $this->AllId->FormValue;
        $this->BatchAndExpiryCompulsory->CurrentValue = $this->BatchAndExpiryCompulsory->FormValue;
        $this->BatchStockForWantedBook->CurrentValue = $this->BatchStockForWantedBook->FormValue;
        $this->UnitBasedBilling->CurrentValue = $this->UnitBasedBilling->FormValue;
        $this->DoNotCheckStock->CurrentValue = $this->DoNotCheckStock->FormValue;
        $this->AcceptRate->CurrentValue = $this->AcceptRate->FormValue;
        $this->PriceLevel->CurrentValue = $this->PriceLevel->FormValue;
        $this->LastQuotePrice->CurrentValue = $this->LastQuotePrice->FormValue;
        $this->PriceChange->CurrentValue = $this->PriceChange->FormValue;
        $this->CommodityCode->CurrentValue = $this->CommodityCode->FormValue;
        $this->InstitutePrice->CurrentValue = $this->InstitutePrice->FormValue;
        $this->CtrlOrDCtrlProduct->CurrentValue = $this->CtrlOrDCtrlProduct->FormValue;
        $this->ImportedDate->CurrentValue = $this->ImportedDate->FormValue;
        $this->ImportedDate->CurrentValue = UnFormatDateTime($this->ImportedDate->CurrentValue, 0);
        $this->IsImported->CurrentValue = $this->IsImported->FormValue;
        $this->FileName->CurrentValue = $this->FileName->FormValue;
        $this->LPName->CurrentValue = $this->LPName->FormValue;
        $this->GodownNumber->CurrentValue = $this->GodownNumber->FormValue;
        $this->CreationDate->CurrentValue = $this->CreationDate->FormValue;
        $this->CreationDate->CurrentValue = UnFormatDateTime($this->CreationDate->CurrentValue, 0);
        $this->CreatedbyUser->CurrentValue = $this->CreatedbyUser->FormValue;
        $this->ModifiedDate->CurrentValue = $this->ModifiedDate->FormValue;
        $this->ModifiedDate->CurrentValue = UnFormatDateTime($this->ModifiedDate->CurrentValue, 0);
        $this->ModifiedbyUser->CurrentValue = $this->ModifiedbyUser->FormValue;
        $this->isActive->CurrentValue = $this->isActive->FormValue;
        $this->AllowExpiryClaim->CurrentValue = $this->AllowExpiryClaim->FormValue;
        $this->BrandCode->CurrentValue = $this->BrandCode->FormValue;
        $this->FreeSchemeBasedon->CurrentValue = $this->FreeSchemeBasedon->FormValue;
        $this->DoNotCheckCostInBill->CurrentValue = $this->DoNotCheckCostInBill->FormValue;
        $this->ProductGroupCode->CurrentValue = $this->ProductGroupCode->FormValue;
        $this->ProductStrengthCode->CurrentValue = $this->ProductStrengthCode->FormValue;
        $this->PackingCode->CurrentValue = $this->PackingCode->FormValue;
        $this->ComputedMinStock->CurrentValue = $this->ComputedMinStock->FormValue;
        $this->ComputedMaxStock->CurrentValue = $this->ComputedMaxStock->FormValue;
        $this->ProductRemark->CurrentValue = $this->ProductRemark->FormValue;
        $this->ProductDrugCode->CurrentValue = $this->ProductDrugCode->FormValue;
        $this->IsMatrixProduct->CurrentValue = $this->IsMatrixProduct->FormValue;
        $this->AttributeCount1->CurrentValue = $this->AttributeCount1->FormValue;
        $this->AttributeCount2->CurrentValue = $this->AttributeCount2->FormValue;
        $this->AttributeCount3->CurrentValue = $this->AttributeCount3->FormValue;
        $this->AttributeCount4->CurrentValue = $this->AttributeCount4->FormValue;
        $this->AttributeCount5->CurrentValue = $this->AttributeCount5->FormValue;
        $this->DefaultDiscountPercentage->CurrentValue = $this->DefaultDiscountPercentage->FormValue;
        $this->DonotPrintBarcode->CurrentValue = $this->DonotPrintBarcode->FormValue;
        $this->ProductLevelDiscount->CurrentValue = $this->ProductLevelDiscount->FormValue;
        $this->Markup->CurrentValue = $this->Markup->FormValue;
        $this->MarkDown->CurrentValue = $this->MarkDown->FormValue;
        $this->ReworkSalePrice->CurrentValue = $this->ReworkSalePrice->FormValue;
        $this->MultipleInput->CurrentValue = $this->MultipleInput->FormValue;
        $this->LpPackageInformation->CurrentValue = $this->LpPackageInformation->FormValue;
        $this->AllowNegativeStock->CurrentValue = $this->AllowNegativeStock->FormValue;
        $this->OrderDate->CurrentValue = $this->OrderDate->FormValue;
        $this->OrderDate->CurrentValue = UnFormatDateTime($this->OrderDate->CurrentValue, 0);
        $this->OrderTime->CurrentValue = $this->OrderTime->FormValue;
        $this->OrderTime->CurrentValue = UnFormatDateTime($this->OrderTime->CurrentValue, 0);
        $this->RateGroupCode->CurrentValue = $this->RateGroupCode->FormValue;
        $this->ConversionCaseLot->CurrentValue = $this->ConversionCaseLot->FormValue;
        $this->ShippingLot->CurrentValue = $this->ShippingLot->FormValue;
        $this->AllowExpiryReplacement->CurrentValue = $this->AllowExpiryReplacement->FormValue;
        $this->NoOfMonthExpiryAllowed->CurrentValue = $this->NoOfMonthExpiryAllowed->FormValue;
        $this->ProductDiscountEligibility->CurrentValue = $this->ProductDiscountEligibility->FormValue;
        $this->ScheduleTypeCode->CurrentValue = $this->ScheduleTypeCode->FormValue;
        $this->AIOCDProductCode->CurrentValue = $this->AIOCDProductCode->FormValue;
        $this->FreeQuantity->CurrentValue = $this->FreeQuantity->FormValue;
        $this->DiscountType->CurrentValue = $this->DiscountType->FormValue;
        $this->DiscountValue->CurrentValue = $this->DiscountValue->FormValue;
        $this->HasProductOrderAttribute->CurrentValue = $this->HasProductOrderAttribute->FormValue;
        $this->FirstPODate->CurrentValue = $this->FirstPODate->FormValue;
        $this->FirstPODate->CurrentValue = UnFormatDateTime($this->FirstPODate->CurrentValue, 0);
        $this->SaleprcieAndMrpCalcPercent->CurrentValue = $this->SaleprcieAndMrpCalcPercent->FormValue;
        $this->IsGiftVoucherProducts->CurrentValue = $this->IsGiftVoucherProducts->FormValue;
        $this->AcceptRange4SerialNumber->CurrentValue = $this->AcceptRange4SerialNumber->FormValue;
        $this->GiftVoucherDenomination->CurrentValue = $this->GiftVoucherDenomination->FormValue;
        $this->Subclasscode->CurrentValue = $this->Subclasscode->FormValue;
        $this->BarCodeFromWeighingMachine->CurrentValue = $this->BarCodeFromWeighingMachine->FormValue;
        $this->CheckCostInReturn->CurrentValue = $this->CheckCostInReturn->FormValue;
        $this->FrequentSaleProduct->CurrentValue = $this->FrequentSaleProduct->FormValue;
        $this->RateType->CurrentValue = $this->RateType->FormValue;
        $this->TouchscreenName->CurrentValue = $this->TouchscreenName->FormValue;
        $this->FreeType->CurrentValue = $this->FreeType->FormValue;
        $this->LooseQtyasNewBatch->CurrentValue = $this->LooseQtyasNewBatch->FormValue;
        $this->AllowSlabBilling->CurrentValue = $this->AllowSlabBilling->FormValue;
        $this->ProductTypeForProduction->CurrentValue = $this->ProductTypeForProduction->FormValue;
        $this->RecipeCode->CurrentValue = $this->RecipeCode->FormValue;
        $this->DefaultUnitType->CurrentValue = $this->DefaultUnitType->FormValue;
        $this->PIstatus->CurrentValue = $this->PIstatus->FormValue;
        $this->LastPiConfirmedDate->CurrentValue = $this->LastPiConfirmedDate->FormValue;
        $this->LastPiConfirmedDate->CurrentValue = UnFormatDateTime($this->LastPiConfirmedDate->CurrentValue, 0);
        $this->BarCodeDesign->CurrentValue = $this->BarCodeDesign->FormValue;
        $this->AcceptRemarksInBill->CurrentValue = $this->AcceptRemarksInBill->FormValue;
        $this->Classification->CurrentValue = $this->Classification->FormValue;
        $this->TimeSlot->CurrentValue = $this->TimeSlot->FormValue;
        $this->IsBundle->CurrentValue = $this->IsBundle->FormValue;
        $this->ColorCode->CurrentValue = $this->ColorCode->FormValue;
        $this->GenderCode->CurrentValue = $this->GenderCode->FormValue;
        $this->SizeCode->CurrentValue = $this->SizeCode->FormValue;
        $this->GiftCard->CurrentValue = $this->GiftCard->FormValue;
        $this->ToonLabel->CurrentValue = $this->ToonLabel->FormValue;
        $this->GarmentType->CurrentValue = $this->GarmentType->FormValue;
        $this->AgeGroup->CurrentValue = $this->AgeGroup->FormValue;
        $this->Season->CurrentValue = $this->Season->FormValue;
        $this->DailyStockEntry->CurrentValue = $this->DailyStockEntry->FormValue;
        $this->ModifierApplicable->CurrentValue = $this->ModifierApplicable->FormValue;
        $this->ModifierType->CurrentValue = $this->ModifierType->FormValue;
        $this->AcceptZeroRate->CurrentValue = $this->AcceptZeroRate->FormValue;
        $this->ExciseDutyCode->CurrentValue = $this->ExciseDutyCode->FormValue;
        $this->IndentProductGroupCode->CurrentValue = $this->IndentProductGroupCode->FormValue;
        $this->IsMultiBatch->CurrentValue = $this->IsMultiBatch->FormValue;
        $this->IsSingleBatch->CurrentValue = $this->IsSingleBatch->FormValue;
        $this->MarkUpRate1->CurrentValue = $this->MarkUpRate1->FormValue;
        $this->MarkDownRate1->CurrentValue = $this->MarkDownRate1->FormValue;
        $this->MarkUpRate2->CurrentValue = $this->MarkUpRate2->FormValue;
        $this->MarkDownRate2->CurrentValue = $this->MarkDownRate2->FormValue;
        $this->_Yield->CurrentValue = $this->_Yield->FormValue;
        $this->RefProductCode->CurrentValue = $this->RefProductCode->FormValue;
        $this->Volume->CurrentValue = $this->Volume->FormValue;
        $this->MeasurementID->CurrentValue = $this->MeasurementID->FormValue;
        $this->CountryCode->CurrentValue = $this->CountryCode->FormValue;
        $this->AcceptWMQty->CurrentValue = $this->AcceptWMQty->FormValue;
        $this->SingleBatchBasedOnRate->CurrentValue = $this->SingleBatchBasedOnRate->FormValue;
        $this->TenderNo->CurrentValue = $this->TenderNo->FormValue;
        $this->SingleBillMaximumSoldQtyFiled->CurrentValue = $this->SingleBillMaximumSoldQtyFiled->FormValue;
        $this->Strength1->CurrentValue = $this->Strength1->FormValue;
        $this->Strength2->CurrentValue = $this->Strength2->FormValue;
        $this->Strength3->CurrentValue = $this->Strength3->FormValue;
        $this->Strength4->CurrentValue = $this->Strength4->FormValue;
        $this->Strength5->CurrentValue = $this->Strength5->FormValue;
        $this->IngredientCode1->CurrentValue = $this->IngredientCode1->FormValue;
        $this->IngredientCode2->CurrentValue = $this->IngredientCode2->FormValue;
        $this->IngredientCode3->CurrentValue = $this->IngredientCode3->FormValue;
        $this->IngredientCode4->CurrentValue = $this->IngredientCode4->FormValue;
        $this->IngredientCode5->CurrentValue = $this->IngredientCode5->FormValue;
        $this->OrderType->CurrentValue = $this->OrderType->FormValue;
        $this->StockUOM->CurrentValue = $this->StockUOM->FormValue;
        $this->PriceUOM->CurrentValue = $this->PriceUOM->FormValue;
        $this->DefaultSaleUOM->CurrentValue = $this->DefaultSaleUOM->FormValue;
        $this->DefaultPurchaseUOM->CurrentValue = $this->DefaultPurchaseUOM->FormValue;
        $this->ReportingUOM->CurrentValue = $this->ReportingUOM->FormValue;
        $this->LastPurchasedUOM->CurrentValue = $this->LastPurchasedUOM->FormValue;
        $this->TreatmentCodes->CurrentValue = $this->TreatmentCodes->FormValue;
        $this->InsuranceType->CurrentValue = $this->InsuranceType->FormValue;
        $this->CoverageGroupCodes->CurrentValue = $this->CoverageGroupCodes->FormValue;
        $this->MultipleUOM->CurrentValue = $this->MultipleUOM->FormValue;
        $this->SalePriceComputation->CurrentValue = $this->SalePriceComputation->FormValue;
        $this->StockCorrection->CurrentValue = $this->StockCorrection->FormValue;
        $this->LBTPercentage->CurrentValue = $this->LBTPercentage->FormValue;
        $this->SalesCommission->CurrentValue = $this->SalesCommission->FormValue;
        $this->LockedStock->CurrentValue = $this->LockedStock->FormValue;
        $this->MinMaxUOM->CurrentValue = $this->MinMaxUOM->FormValue;
        $this->ExpiryMfrDateFormat->CurrentValue = $this->ExpiryMfrDateFormat->FormValue;
        $this->ProductLifeTime->CurrentValue = $this->ProductLifeTime->FormValue;
        $this->IsCombo->CurrentValue = $this->IsCombo->FormValue;
        $this->ComboTypeCode->CurrentValue = $this->ComboTypeCode->FormValue;
        $this->AttributeCount6->CurrentValue = $this->AttributeCount6->FormValue;
        $this->AttributeCount7->CurrentValue = $this->AttributeCount7->FormValue;
        $this->AttributeCount8->CurrentValue = $this->AttributeCount8->FormValue;
        $this->AttributeCount9->CurrentValue = $this->AttributeCount9->FormValue;
        $this->AttributeCount10->CurrentValue = $this->AttributeCount10->FormValue;
        $this->LabourCharge->CurrentValue = $this->LabourCharge->FormValue;
        $this->AffectOtherCharge->CurrentValue = $this->AffectOtherCharge->FormValue;
        $this->DosageInfo->CurrentValue = $this->DosageInfo->FormValue;
        $this->DosageType->CurrentValue = $this->DosageType->FormValue;
        $this->DefaultIndentUOM->CurrentValue = $this->DefaultIndentUOM->FormValue;
        $this->PromoTag->CurrentValue = $this->PromoTag->FormValue;
        $this->BillLevelPromoTag->CurrentValue = $this->BillLevelPromoTag->FormValue;
        $this->IsMRPProduct->CurrentValue = $this->IsMRPProduct->FormValue;
        $this->MrpList->CurrentValue = $this->MrpList->FormValue;
        $this->AlternateSaleUOM->CurrentValue = $this->AlternateSaleUOM->FormValue;
        $this->FreeUOM->CurrentValue = $this->FreeUOM->FormValue;
        $this->MarketedCode->CurrentValue = $this->MarketedCode->FormValue;
        $this->MinimumSalePrice->CurrentValue = $this->MinimumSalePrice->FormValue;
        $this->PRate1->CurrentValue = $this->PRate1->FormValue;
        $this->PRate2->CurrentValue = $this->PRate2->FormValue;
        $this->LPItemCost->CurrentValue = $this->LPItemCost->FormValue;
        $this->FixedItemCost->CurrentValue = $this->FixedItemCost->FormValue;
        $this->HSNId->CurrentValue = $this->HSNId->FormValue;
        $this->TaxInclusive->CurrentValue = $this->TaxInclusive->FormValue;
        $this->EligibleforWarranty->CurrentValue = $this->EligibleforWarranty->FormValue;
        $this->NoofMonthsWarranty->CurrentValue = $this->NoofMonthsWarranty->FormValue;
        $this->ComputeTaxonCost->CurrentValue = $this->ComputeTaxonCost->FormValue;
        $this->HasEmptyBottleTrack->CurrentValue = $this->HasEmptyBottleTrack->FormValue;
        $this->EmptyBottleReferenceCode->CurrentValue = $this->EmptyBottleReferenceCode->FormValue;
        $this->AdditionalCESSAmount->CurrentValue = $this->AdditionalCESSAmount->FormValue;
        $this->EmptyBottleRate->CurrentValue = $this->EmptyBottleRate->FormValue;
    }

    /**
     * Load row based on key values
     *
     * @return void
     */
    public function loadRow()
    {
        global $Security, $Language;
        $filter = $this->getRecordFilter();

        // Call Row Selecting event
        $this->rowSelecting($filter);

        // Load SQL based on filter
        $this->CurrentFilter = $filter;
        $sql = $this->getCurrentSql();
        $conn = $this->getConnection();
        $res = false;
        $row = $conn->fetchAssoc($sql);
        if ($row) {
            $res = true;
            $this->loadRowValues($row); // Load row values
        }
        return $res;
    }

    /**
     * Load row values from recordset or record
     *
     * @param Recordset|array $rs Record
     * @return void
     */
    public function loadRowValues($rs = null)
    {
        if (is_array($rs)) {
            $row = $rs;
        } elseif ($rs && property_exists($rs, "fields")) { // Recordset
            $row = $rs->fields;
        } else {
            $row = $this->newRow();
        }

        // Call Row Selected event
        $this->rowSelected($row);
        if (!$rs) {
            return;
        }
        $this->ProductCode->setDbValue($row['ProductCode']);
        $this->ProductName->setDbValue($row['ProductName']);
        $this->DivisionCode->setDbValue($row['DivisionCode']);
        $this->ManufacturerCode->setDbValue($row['ManufacturerCode']);
        $this->SupplierCode->setDbValue($row['SupplierCode']);
        $this->AlternateSupplierCodes->setDbValue($row['AlternateSupplierCodes']);
        $this->AlternateProductCode->setDbValue($row['AlternateProductCode']);
        $this->UniversalProductCode->setDbValue($row['UniversalProductCode']);
        $this->BookProductCode->setDbValue($row['BookProductCode']);
        $this->OldCode->setDbValue($row['OldCode']);
        $this->ProtectedProducts->setDbValue($row['ProtectedProducts']);
        $this->ProductFullName->setDbValue($row['ProductFullName']);
        $this->UnitOfMeasure->setDbValue($row['UnitOfMeasure']);
        $this->UnitDescription->setDbValue($row['UnitDescription']);
        $this->BulkDescription->setDbValue($row['BulkDescription']);
        $this->BarCodeDescription->setDbValue($row['BarCodeDescription']);
        $this->PackageInformation->setDbValue($row['PackageInformation']);
        $this->PackageId->setDbValue($row['PackageId']);
        $this->Weight->setDbValue($row['Weight']);
        $this->AllowFractions->setDbValue($row['AllowFractions']);
        $this->MinimumStockLevel->setDbValue($row['MinimumStockLevel']);
        $this->MaximumStockLevel->setDbValue($row['MaximumStockLevel']);
        $this->ReorderLevel->setDbValue($row['ReorderLevel']);
        $this->MinMaxRatio->setDbValue($row['MinMaxRatio']);
        $this->AutoMinMaxRatio->setDbValue($row['AutoMinMaxRatio']);
        $this->ScheduleCode->setDbValue($row['ScheduleCode']);
        $this->RopRatio->setDbValue($row['RopRatio']);
        $this->MRP->setDbValue($row['MRP']);
        $this->PurchasePrice->setDbValue($row['PurchasePrice']);
        $this->PurchaseUnit->setDbValue($row['PurchaseUnit']);
        $this->PurchaseTaxCode->setDbValue($row['PurchaseTaxCode']);
        $this->AllowDirectInward->setDbValue($row['AllowDirectInward']);
        $this->SalePrice->setDbValue($row['SalePrice']);
        $this->SaleUnit->setDbValue($row['SaleUnit']);
        $this->SalesTaxCode->setDbValue($row['SalesTaxCode']);
        $this->StockReceived->setDbValue($row['StockReceived']);
        $this->TotalStock->setDbValue($row['TotalStock']);
        $this->StockType->setDbValue($row['StockType']);
        $this->StockCheckDate->setDbValue($row['StockCheckDate']);
        $this->StockAdjustmentDate->setDbValue($row['StockAdjustmentDate']);
        $this->Remarks->setDbValue($row['Remarks']);
        $this->CostCentre->setDbValue($row['CostCentre']);
        $this->ProductType->setDbValue($row['ProductType']);
        $this->TaxAmount->setDbValue($row['TaxAmount']);
        $this->TaxId->setDbValue($row['TaxId']);
        $this->ResaleTaxApplicable->setDbValue($row['ResaleTaxApplicable']);
        $this->CstOtherTax->setDbValue($row['CstOtherTax']);
        $this->TotalTax->setDbValue($row['TotalTax']);
        $this->ItemCost->setDbValue($row['ItemCost']);
        $this->ExpiryDate->setDbValue($row['ExpiryDate']);
        $this->BatchDescription->setDbValue($row['BatchDescription']);
        $this->FreeScheme->setDbValue($row['FreeScheme']);
        $this->CashDiscountEligibility->setDbValue($row['CashDiscountEligibility']);
        $this->DiscountPerAllowInBill->setDbValue($row['DiscountPerAllowInBill']);
        $this->Discount->setDbValue($row['Discount']);
        $this->TotalAmount->setDbValue($row['TotalAmount']);
        $this->StandardMargin->setDbValue($row['StandardMargin']);
        $this->Margin->setDbValue($row['Margin']);
        $this->MarginId->setDbValue($row['MarginId']);
        $this->ExpectedMargin->setDbValue($row['ExpectedMargin']);
        $this->SurchargeBeforeTax->setDbValue($row['SurchargeBeforeTax']);
        $this->SurchargeAfterTax->setDbValue($row['SurchargeAfterTax']);
        $this->TempOrderNo->setDbValue($row['TempOrderNo']);
        $this->TempOrderDate->setDbValue($row['TempOrderDate']);
        $this->OrderUnit->setDbValue($row['OrderUnit']);
        $this->OrderQuantity->setDbValue($row['OrderQuantity']);
        $this->MarkForOrder->setDbValue($row['MarkForOrder']);
        $this->OrderAllId->setDbValue($row['OrderAllId']);
        $this->CalculateOrderQty->setDbValue($row['CalculateOrderQty']);
        $this->SubLocation->setDbValue($row['SubLocation']);
        $this->CategoryCode->setDbValue($row['CategoryCode']);
        $this->SubCategory->setDbValue($row['SubCategory']);
        $this->FlexCategoryCode->setDbValue($row['FlexCategoryCode']);
        $this->ABCSaleQty->setDbValue($row['ABCSaleQty']);
        $this->ABCSaleValue->setDbValue($row['ABCSaleValue']);
        $this->ConvertionFactor->setDbValue($row['ConvertionFactor']);
        $this->ConvertionUnitDesc->setDbValue($row['ConvertionUnitDesc']);
        $this->TransactionId->setDbValue($row['TransactionId']);
        $this->SoldProductId->setDbValue($row['SoldProductId']);
        $this->WantedBookId->setDbValue($row['WantedBookId']);
        $this->AllId->setDbValue($row['AllId']);
        $this->BatchAndExpiryCompulsory->setDbValue($row['BatchAndExpiryCompulsory']);
        $this->BatchStockForWantedBook->setDbValue($row['BatchStockForWantedBook']);
        $this->UnitBasedBilling->setDbValue($row['UnitBasedBilling']);
        $this->DoNotCheckStock->setDbValue($row['DoNotCheckStock']);
        $this->AcceptRate->setDbValue($row['AcceptRate']);
        $this->PriceLevel->setDbValue($row['PriceLevel']);
        $this->LastQuotePrice->setDbValue($row['LastQuotePrice']);
        $this->PriceChange->setDbValue($row['PriceChange']);
        $this->CommodityCode->setDbValue($row['CommodityCode']);
        $this->InstitutePrice->setDbValue($row['InstitutePrice']);
        $this->CtrlOrDCtrlProduct->setDbValue($row['CtrlOrDCtrlProduct']);
        $this->ImportedDate->setDbValue($row['ImportedDate']);
        $this->IsImported->setDbValue($row['IsImported']);
        $this->FileName->setDbValue($row['FileName']);
        $this->LPName->setDbValue($row['LPName']);
        $this->GodownNumber->setDbValue($row['GodownNumber']);
        $this->CreationDate->setDbValue($row['CreationDate']);
        $this->CreatedbyUser->setDbValue($row['CreatedbyUser']);
        $this->ModifiedDate->setDbValue($row['ModifiedDate']);
        $this->ModifiedbyUser->setDbValue($row['ModifiedbyUser']);
        $this->isActive->setDbValue($row['isActive']);
        $this->AllowExpiryClaim->setDbValue($row['AllowExpiryClaim']);
        $this->BrandCode->setDbValue($row['BrandCode']);
        $this->FreeSchemeBasedon->setDbValue($row['FreeSchemeBasedon']);
        $this->DoNotCheckCostInBill->setDbValue($row['DoNotCheckCostInBill']);
        $this->ProductGroupCode->setDbValue($row['ProductGroupCode']);
        $this->ProductStrengthCode->setDbValue($row['ProductStrengthCode']);
        $this->PackingCode->setDbValue($row['PackingCode']);
        $this->ComputedMinStock->setDbValue($row['ComputedMinStock']);
        $this->ComputedMaxStock->setDbValue($row['ComputedMaxStock']);
        $this->ProductRemark->setDbValue($row['ProductRemark']);
        $this->ProductDrugCode->setDbValue($row['ProductDrugCode']);
        $this->IsMatrixProduct->setDbValue($row['IsMatrixProduct']);
        $this->AttributeCount1->setDbValue($row['AttributeCount1']);
        $this->AttributeCount2->setDbValue($row['AttributeCount2']);
        $this->AttributeCount3->setDbValue($row['AttributeCount3']);
        $this->AttributeCount4->setDbValue($row['AttributeCount4']);
        $this->AttributeCount5->setDbValue($row['AttributeCount5']);
        $this->DefaultDiscountPercentage->setDbValue($row['DefaultDiscountPercentage']);
        $this->DonotPrintBarcode->setDbValue($row['DonotPrintBarcode']);
        $this->ProductLevelDiscount->setDbValue($row['ProductLevelDiscount']);
        $this->Markup->setDbValue($row['Markup']);
        $this->MarkDown->setDbValue($row['MarkDown']);
        $this->ReworkSalePrice->setDbValue($row['ReworkSalePrice']);
        $this->MultipleInput->setDbValue($row['MultipleInput']);
        $this->LpPackageInformation->setDbValue($row['LpPackageInformation']);
        $this->AllowNegativeStock->setDbValue($row['AllowNegativeStock']);
        $this->OrderDate->setDbValue($row['OrderDate']);
        $this->OrderTime->setDbValue($row['OrderTime']);
        $this->RateGroupCode->setDbValue($row['RateGroupCode']);
        $this->ConversionCaseLot->setDbValue($row['ConversionCaseLot']);
        $this->ShippingLot->setDbValue($row['ShippingLot']);
        $this->AllowExpiryReplacement->setDbValue($row['AllowExpiryReplacement']);
        $this->NoOfMonthExpiryAllowed->setDbValue($row['NoOfMonthExpiryAllowed']);
        $this->ProductDiscountEligibility->setDbValue($row['ProductDiscountEligibility']);
        $this->ScheduleTypeCode->setDbValue($row['ScheduleTypeCode']);
        $this->AIOCDProductCode->setDbValue($row['AIOCDProductCode']);
        $this->FreeQuantity->setDbValue($row['FreeQuantity']);
        $this->DiscountType->setDbValue($row['DiscountType']);
        $this->DiscountValue->setDbValue($row['DiscountValue']);
        $this->HasProductOrderAttribute->setDbValue($row['HasProductOrderAttribute']);
        $this->FirstPODate->setDbValue($row['FirstPODate']);
        $this->SaleprcieAndMrpCalcPercent->setDbValue($row['SaleprcieAndMrpCalcPercent']);
        $this->IsGiftVoucherProducts->setDbValue($row['IsGiftVoucherProducts']);
        $this->AcceptRange4SerialNumber->setDbValue($row['AcceptRange4SerialNumber']);
        $this->GiftVoucherDenomination->setDbValue($row['GiftVoucherDenomination']);
        $this->Subclasscode->setDbValue($row['Subclasscode']);
        $this->BarCodeFromWeighingMachine->setDbValue($row['BarCodeFromWeighingMachine']);
        $this->CheckCostInReturn->setDbValue($row['CheckCostInReturn']);
        $this->FrequentSaleProduct->setDbValue($row['FrequentSaleProduct']);
        $this->RateType->setDbValue($row['RateType']);
        $this->TouchscreenName->setDbValue($row['TouchscreenName']);
        $this->FreeType->setDbValue($row['FreeType']);
        $this->LooseQtyasNewBatch->setDbValue($row['LooseQtyasNewBatch']);
        $this->AllowSlabBilling->setDbValue($row['AllowSlabBilling']);
        $this->ProductTypeForProduction->setDbValue($row['ProductTypeForProduction']);
        $this->RecipeCode->setDbValue($row['RecipeCode']);
        $this->DefaultUnitType->setDbValue($row['DefaultUnitType']);
        $this->PIstatus->setDbValue($row['PIstatus']);
        $this->LastPiConfirmedDate->setDbValue($row['LastPiConfirmedDate']);
        $this->BarCodeDesign->setDbValue($row['BarCodeDesign']);
        $this->AcceptRemarksInBill->setDbValue($row['AcceptRemarksInBill']);
        $this->Classification->setDbValue($row['Classification']);
        $this->TimeSlot->setDbValue($row['TimeSlot']);
        $this->IsBundle->setDbValue($row['IsBundle']);
        $this->ColorCode->setDbValue($row['ColorCode']);
        $this->GenderCode->setDbValue($row['GenderCode']);
        $this->SizeCode->setDbValue($row['SizeCode']);
        $this->GiftCard->setDbValue($row['GiftCard']);
        $this->ToonLabel->setDbValue($row['ToonLabel']);
        $this->GarmentType->setDbValue($row['GarmentType']);
        $this->AgeGroup->setDbValue($row['AgeGroup']);
        $this->Season->setDbValue($row['Season']);
        $this->DailyStockEntry->setDbValue($row['DailyStockEntry']);
        $this->ModifierApplicable->setDbValue($row['ModifierApplicable']);
        $this->ModifierType->setDbValue($row['ModifierType']);
        $this->AcceptZeroRate->setDbValue($row['AcceptZeroRate']);
        $this->ExciseDutyCode->setDbValue($row['ExciseDutyCode']);
        $this->IndentProductGroupCode->setDbValue($row['IndentProductGroupCode']);
        $this->IsMultiBatch->setDbValue($row['IsMultiBatch']);
        $this->IsSingleBatch->setDbValue($row['IsSingleBatch']);
        $this->MarkUpRate1->setDbValue($row['MarkUpRate1']);
        $this->MarkDownRate1->setDbValue($row['MarkDownRate1']);
        $this->MarkUpRate2->setDbValue($row['MarkUpRate2']);
        $this->MarkDownRate2->setDbValue($row['MarkDownRate2']);
        $this->_Yield->setDbValue($row['Yield']);
        $this->RefProductCode->setDbValue($row['RefProductCode']);
        $this->Volume->setDbValue($row['Volume']);
        $this->MeasurementID->setDbValue($row['MeasurementID']);
        $this->CountryCode->setDbValue($row['CountryCode']);
        $this->AcceptWMQty->setDbValue($row['AcceptWMQty']);
        $this->SingleBatchBasedOnRate->setDbValue($row['SingleBatchBasedOnRate']);
        $this->TenderNo->setDbValue($row['TenderNo']);
        $this->SingleBillMaximumSoldQtyFiled->setDbValue($row['SingleBillMaximumSoldQtyFiled']);
        $this->Strength1->setDbValue($row['Strength1']);
        $this->Strength2->setDbValue($row['Strength2']);
        $this->Strength3->setDbValue($row['Strength3']);
        $this->Strength4->setDbValue($row['Strength4']);
        $this->Strength5->setDbValue($row['Strength5']);
        $this->IngredientCode1->setDbValue($row['IngredientCode1']);
        $this->IngredientCode2->setDbValue($row['IngredientCode2']);
        $this->IngredientCode3->setDbValue($row['IngredientCode3']);
        $this->IngredientCode4->setDbValue($row['IngredientCode4']);
        $this->IngredientCode5->setDbValue($row['IngredientCode5']);
        $this->OrderType->setDbValue($row['OrderType']);
        $this->StockUOM->setDbValue($row['StockUOM']);
        $this->PriceUOM->setDbValue($row['PriceUOM']);
        $this->DefaultSaleUOM->setDbValue($row['DefaultSaleUOM']);
        $this->DefaultPurchaseUOM->setDbValue($row['DefaultPurchaseUOM']);
        $this->ReportingUOM->setDbValue($row['ReportingUOM']);
        $this->LastPurchasedUOM->setDbValue($row['LastPurchasedUOM']);
        $this->TreatmentCodes->setDbValue($row['TreatmentCodes']);
        $this->InsuranceType->setDbValue($row['InsuranceType']);
        $this->CoverageGroupCodes->setDbValue($row['CoverageGroupCodes']);
        $this->MultipleUOM->setDbValue($row['MultipleUOM']);
        $this->SalePriceComputation->setDbValue($row['SalePriceComputation']);
        $this->StockCorrection->setDbValue($row['StockCorrection']);
        $this->LBTPercentage->setDbValue($row['LBTPercentage']);
        $this->SalesCommission->setDbValue($row['SalesCommission']);
        $this->LockedStock->setDbValue($row['LockedStock']);
        $this->MinMaxUOM->setDbValue($row['MinMaxUOM']);
        $this->ExpiryMfrDateFormat->setDbValue($row['ExpiryMfrDateFormat']);
        $this->ProductLifeTime->setDbValue($row['ProductLifeTime']);
        $this->IsCombo->setDbValue($row['IsCombo']);
        $this->ComboTypeCode->setDbValue($row['ComboTypeCode']);
        $this->AttributeCount6->setDbValue($row['AttributeCount6']);
        $this->AttributeCount7->setDbValue($row['AttributeCount7']);
        $this->AttributeCount8->setDbValue($row['AttributeCount8']);
        $this->AttributeCount9->setDbValue($row['AttributeCount9']);
        $this->AttributeCount10->setDbValue($row['AttributeCount10']);
        $this->LabourCharge->setDbValue($row['LabourCharge']);
        $this->AffectOtherCharge->setDbValue($row['AffectOtherCharge']);
        $this->DosageInfo->setDbValue($row['DosageInfo']);
        $this->DosageType->setDbValue($row['DosageType']);
        $this->DefaultIndentUOM->setDbValue($row['DefaultIndentUOM']);
        $this->PromoTag->setDbValue($row['PromoTag']);
        $this->BillLevelPromoTag->setDbValue($row['BillLevelPromoTag']);
        $this->IsMRPProduct->setDbValue($row['IsMRPProduct']);
        $this->MrpList->setDbValue($row['MrpList']);
        $this->AlternateSaleUOM->setDbValue($row['AlternateSaleUOM']);
        $this->FreeUOM->setDbValue($row['FreeUOM']);
        $this->MarketedCode->setDbValue($row['MarketedCode']);
        $this->MinimumSalePrice->setDbValue($row['MinimumSalePrice']);
        $this->PRate1->setDbValue($row['PRate1']);
        $this->PRate2->setDbValue($row['PRate2']);
        $this->LPItemCost->setDbValue($row['LPItemCost']);
        $this->FixedItemCost->setDbValue($row['FixedItemCost']);
        $this->HSNId->setDbValue($row['HSNId']);
        $this->TaxInclusive->setDbValue($row['TaxInclusive']);
        $this->EligibleforWarranty->setDbValue($row['EligibleforWarranty']);
        $this->NoofMonthsWarranty->setDbValue($row['NoofMonthsWarranty']);
        $this->ComputeTaxonCost->setDbValue($row['ComputeTaxonCost']);
        $this->HasEmptyBottleTrack->setDbValue($row['HasEmptyBottleTrack']);
        $this->EmptyBottleReferenceCode->setDbValue($row['EmptyBottleReferenceCode']);
        $this->AdditionalCESSAmount->setDbValue($row['AdditionalCESSAmount']);
        $this->EmptyBottleRate->setDbValue($row['EmptyBottleRate']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $this->loadDefaultValues();
        $row = [];
        $row['ProductCode'] = $this->ProductCode->CurrentValue;
        $row['ProductName'] = $this->ProductName->CurrentValue;
        $row['DivisionCode'] = $this->DivisionCode->CurrentValue;
        $row['ManufacturerCode'] = $this->ManufacturerCode->CurrentValue;
        $row['SupplierCode'] = $this->SupplierCode->CurrentValue;
        $row['AlternateSupplierCodes'] = $this->AlternateSupplierCodes->CurrentValue;
        $row['AlternateProductCode'] = $this->AlternateProductCode->CurrentValue;
        $row['UniversalProductCode'] = $this->UniversalProductCode->CurrentValue;
        $row['BookProductCode'] = $this->BookProductCode->CurrentValue;
        $row['OldCode'] = $this->OldCode->CurrentValue;
        $row['ProtectedProducts'] = $this->ProtectedProducts->CurrentValue;
        $row['ProductFullName'] = $this->ProductFullName->CurrentValue;
        $row['UnitOfMeasure'] = $this->UnitOfMeasure->CurrentValue;
        $row['UnitDescription'] = $this->UnitDescription->CurrentValue;
        $row['BulkDescription'] = $this->BulkDescription->CurrentValue;
        $row['BarCodeDescription'] = $this->BarCodeDescription->CurrentValue;
        $row['PackageInformation'] = $this->PackageInformation->CurrentValue;
        $row['PackageId'] = $this->PackageId->CurrentValue;
        $row['Weight'] = $this->Weight->CurrentValue;
        $row['AllowFractions'] = $this->AllowFractions->CurrentValue;
        $row['MinimumStockLevel'] = $this->MinimumStockLevel->CurrentValue;
        $row['MaximumStockLevel'] = $this->MaximumStockLevel->CurrentValue;
        $row['ReorderLevel'] = $this->ReorderLevel->CurrentValue;
        $row['MinMaxRatio'] = $this->MinMaxRatio->CurrentValue;
        $row['AutoMinMaxRatio'] = $this->AutoMinMaxRatio->CurrentValue;
        $row['ScheduleCode'] = $this->ScheduleCode->CurrentValue;
        $row['RopRatio'] = $this->RopRatio->CurrentValue;
        $row['MRP'] = $this->MRP->CurrentValue;
        $row['PurchasePrice'] = $this->PurchasePrice->CurrentValue;
        $row['PurchaseUnit'] = $this->PurchaseUnit->CurrentValue;
        $row['PurchaseTaxCode'] = $this->PurchaseTaxCode->CurrentValue;
        $row['AllowDirectInward'] = $this->AllowDirectInward->CurrentValue;
        $row['SalePrice'] = $this->SalePrice->CurrentValue;
        $row['SaleUnit'] = $this->SaleUnit->CurrentValue;
        $row['SalesTaxCode'] = $this->SalesTaxCode->CurrentValue;
        $row['StockReceived'] = $this->StockReceived->CurrentValue;
        $row['TotalStock'] = $this->TotalStock->CurrentValue;
        $row['StockType'] = $this->StockType->CurrentValue;
        $row['StockCheckDate'] = $this->StockCheckDate->CurrentValue;
        $row['StockAdjustmentDate'] = $this->StockAdjustmentDate->CurrentValue;
        $row['Remarks'] = $this->Remarks->CurrentValue;
        $row['CostCentre'] = $this->CostCentre->CurrentValue;
        $row['ProductType'] = $this->ProductType->CurrentValue;
        $row['TaxAmount'] = $this->TaxAmount->CurrentValue;
        $row['TaxId'] = $this->TaxId->CurrentValue;
        $row['ResaleTaxApplicable'] = $this->ResaleTaxApplicable->CurrentValue;
        $row['CstOtherTax'] = $this->CstOtherTax->CurrentValue;
        $row['TotalTax'] = $this->TotalTax->CurrentValue;
        $row['ItemCost'] = $this->ItemCost->CurrentValue;
        $row['ExpiryDate'] = $this->ExpiryDate->CurrentValue;
        $row['BatchDescription'] = $this->BatchDescription->CurrentValue;
        $row['FreeScheme'] = $this->FreeScheme->CurrentValue;
        $row['CashDiscountEligibility'] = $this->CashDiscountEligibility->CurrentValue;
        $row['DiscountPerAllowInBill'] = $this->DiscountPerAllowInBill->CurrentValue;
        $row['Discount'] = $this->Discount->CurrentValue;
        $row['TotalAmount'] = $this->TotalAmount->CurrentValue;
        $row['StandardMargin'] = $this->StandardMargin->CurrentValue;
        $row['Margin'] = $this->Margin->CurrentValue;
        $row['MarginId'] = $this->MarginId->CurrentValue;
        $row['ExpectedMargin'] = $this->ExpectedMargin->CurrentValue;
        $row['SurchargeBeforeTax'] = $this->SurchargeBeforeTax->CurrentValue;
        $row['SurchargeAfterTax'] = $this->SurchargeAfterTax->CurrentValue;
        $row['TempOrderNo'] = $this->TempOrderNo->CurrentValue;
        $row['TempOrderDate'] = $this->TempOrderDate->CurrentValue;
        $row['OrderUnit'] = $this->OrderUnit->CurrentValue;
        $row['OrderQuantity'] = $this->OrderQuantity->CurrentValue;
        $row['MarkForOrder'] = $this->MarkForOrder->CurrentValue;
        $row['OrderAllId'] = $this->OrderAllId->CurrentValue;
        $row['CalculateOrderQty'] = $this->CalculateOrderQty->CurrentValue;
        $row['SubLocation'] = $this->SubLocation->CurrentValue;
        $row['CategoryCode'] = $this->CategoryCode->CurrentValue;
        $row['SubCategory'] = $this->SubCategory->CurrentValue;
        $row['FlexCategoryCode'] = $this->FlexCategoryCode->CurrentValue;
        $row['ABCSaleQty'] = $this->ABCSaleQty->CurrentValue;
        $row['ABCSaleValue'] = $this->ABCSaleValue->CurrentValue;
        $row['ConvertionFactor'] = $this->ConvertionFactor->CurrentValue;
        $row['ConvertionUnitDesc'] = $this->ConvertionUnitDesc->CurrentValue;
        $row['TransactionId'] = $this->TransactionId->CurrentValue;
        $row['SoldProductId'] = $this->SoldProductId->CurrentValue;
        $row['WantedBookId'] = $this->WantedBookId->CurrentValue;
        $row['AllId'] = $this->AllId->CurrentValue;
        $row['BatchAndExpiryCompulsory'] = $this->BatchAndExpiryCompulsory->CurrentValue;
        $row['BatchStockForWantedBook'] = $this->BatchStockForWantedBook->CurrentValue;
        $row['UnitBasedBilling'] = $this->UnitBasedBilling->CurrentValue;
        $row['DoNotCheckStock'] = $this->DoNotCheckStock->CurrentValue;
        $row['AcceptRate'] = $this->AcceptRate->CurrentValue;
        $row['PriceLevel'] = $this->PriceLevel->CurrentValue;
        $row['LastQuotePrice'] = $this->LastQuotePrice->CurrentValue;
        $row['PriceChange'] = $this->PriceChange->CurrentValue;
        $row['CommodityCode'] = $this->CommodityCode->CurrentValue;
        $row['InstitutePrice'] = $this->InstitutePrice->CurrentValue;
        $row['CtrlOrDCtrlProduct'] = $this->CtrlOrDCtrlProduct->CurrentValue;
        $row['ImportedDate'] = $this->ImportedDate->CurrentValue;
        $row['IsImported'] = $this->IsImported->CurrentValue;
        $row['FileName'] = $this->FileName->CurrentValue;
        $row['LPName'] = $this->LPName->CurrentValue;
        $row['GodownNumber'] = $this->GodownNumber->CurrentValue;
        $row['CreationDate'] = $this->CreationDate->CurrentValue;
        $row['CreatedbyUser'] = $this->CreatedbyUser->CurrentValue;
        $row['ModifiedDate'] = $this->ModifiedDate->CurrentValue;
        $row['ModifiedbyUser'] = $this->ModifiedbyUser->CurrentValue;
        $row['isActive'] = $this->isActive->CurrentValue;
        $row['AllowExpiryClaim'] = $this->AllowExpiryClaim->CurrentValue;
        $row['BrandCode'] = $this->BrandCode->CurrentValue;
        $row['FreeSchemeBasedon'] = $this->FreeSchemeBasedon->CurrentValue;
        $row['DoNotCheckCostInBill'] = $this->DoNotCheckCostInBill->CurrentValue;
        $row['ProductGroupCode'] = $this->ProductGroupCode->CurrentValue;
        $row['ProductStrengthCode'] = $this->ProductStrengthCode->CurrentValue;
        $row['PackingCode'] = $this->PackingCode->CurrentValue;
        $row['ComputedMinStock'] = $this->ComputedMinStock->CurrentValue;
        $row['ComputedMaxStock'] = $this->ComputedMaxStock->CurrentValue;
        $row['ProductRemark'] = $this->ProductRemark->CurrentValue;
        $row['ProductDrugCode'] = $this->ProductDrugCode->CurrentValue;
        $row['IsMatrixProduct'] = $this->IsMatrixProduct->CurrentValue;
        $row['AttributeCount1'] = $this->AttributeCount1->CurrentValue;
        $row['AttributeCount2'] = $this->AttributeCount2->CurrentValue;
        $row['AttributeCount3'] = $this->AttributeCount3->CurrentValue;
        $row['AttributeCount4'] = $this->AttributeCount4->CurrentValue;
        $row['AttributeCount5'] = $this->AttributeCount5->CurrentValue;
        $row['DefaultDiscountPercentage'] = $this->DefaultDiscountPercentage->CurrentValue;
        $row['DonotPrintBarcode'] = $this->DonotPrintBarcode->CurrentValue;
        $row['ProductLevelDiscount'] = $this->ProductLevelDiscount->CurrentValue;
        $row['Markup'] = $this->Markup->CurrentValue;
        $row['MarkDown'] = $this->MarkDown->CurrentValue;
        $row['ReworkSalePrice'] = $this->ReworkSalePrice->CurrentValue;
        $row['MultipleInput'] = $this->MultipleInput->CurrentValue;
        $row['LpPackageInformation'] = $this->LpPackageInformation->CurrentValue;
        $row['AllowNegativeStock'] = $this->AllowNegativeStock->CurrentValue;
        $row['OrderDate'] = $this->OrderDate->CurrentValue;
        $row['OrderTime'] = $this->OrderTime->CurrentValue;
        $row['RateGroupCode'] = $this->RateGroupCode->CurrentValue;
        $row['ConversionCaseLot'] = $this->ConversionCaseLot->CurrentValue;
        $row['ShippingLot'] = $this->ShippingLot->CurrentValue;
        $row['AllowExpiryReplacement'] = $this->AllowExpiryReplacement->CurrentValue;
        $row['NoOfMonthExpiryAllowed'] = $this->NoOfMonthExpiryAllowed->CurrentValue;
        $row['ProductDiscountEligibility'] = $this->ProductDiscountEligibility->CurrentValue;
        $row['ScheduleTypeCode'] = $this->ScheduleTypeCode->CurrentValue;
        $row['AIOCDProductCode'] = $this->AIOCDProductCode->CurrentValue;
        $row['FreeQuantity'] = $this->FreeQuantity->CurrentValue;
        $row['DiscountType'] = $this->DiscountType->CurrentValue;
        $row['DiscountValue'] = $this->DiscountValue->CurrentValue;
        $row['HasProductOrderAttribute'] = $this->HasProductOrderAttribute->CurrentValue;
        $row['FirstPODate'] = $this->FirstPODate->CurrentValue;
        $row['SaleprcieAndMrpCalcPercent'] = $this->SaleprcieAndMrpCalcPercent->CurrentValue;
        $row['IsGiftVoucherProducts'] = $this->IsGiftVoucherProducts->CurrentValue;
        $row['AcceptRange4SerialNumber'] = $this->AcceptRange4SerialNumber->CurrentValue;
        $row['GiftVoucherDenomination'] = $this->GiftVoucherDenomination->CurrentValue;
        $row['Subclasscode'] = $this->Subclasscode->CurrentValue;
        $row['BarCodeFromWeighingMachine'] = $this->BarCodeFromWeighingMachine->CurrentValue;
        $row['CheckCostInReturn'] = $this->CheckCostInReturn->CurrentValue;
        $row['FrequentSaleProduct'] = $this->FrequentSaleProduct->CurrentValue;
        $row['RateType'] = $this->RateType->CurrentValue;
        $row['TouchscreenName'] = $this->TouchscreenName->CurrentValue;
        $row['FreeType'] = $this->FreeType->CurrentValue;
        $row['LooseQtyasNewBatch'] = $this->LooseQtyasNewBatch->CurrentValue;
        $row['AllowSlabBilling'] = $this->AllowSlabBilling->CurrentValue;
        $row['ProductTypeForProduction'] = $this->ProductTypeForProduction->CurrentValue;
        $row['RecipeCode'] = $this->RecipeCode->CurrentValue;
        $row['DefaultUnitType'] = $this->DefaultUnitType->CurrentValue;
        $row['PIstatus'] = $this->PIstatus->CurrentValue;
        $row['LastPiConfirmedDate'] = $this->LastPiConfirmedDate->CurrentValue;
        $row['BarCodeDesign'] = $this->BarCodeDesign->CurrentValue;
        $row['AcceptRemarksInBill'] = $this->AcceptRemarksInBill->CurrentValue;
        $row['Classification'] = $this->Classification->CurrentValue;
        $row['TimeSlot'] = $this->TimeSlot->CurrentValue;
        $row['IsBundle'] = $this->IsBundle->CurrentValue;
        $row['ColorCode'] = $this->ColorCode->CurrentValue;
        $row['GenderCode'] = $this->GenderCode->CurrentValue;
        $row['SizeCode'] = $this->SizeCode->CurrentValue;
        $row['GiftCard'] = $this->GiftCard->CurrentValue;
        $row['ToonLabel'] = $this->ToonLabel->CurrentValue;
        $row['GarmentType'] = $this->GarmentType->CurrentValue;
        $row['AgeGroup'] = $this->AgeGroup->CurrentValue;
        $row['Season'] = $this->Season->CurrentValue;
        $row['DailyStockEntry'] = $this->DailyStockEntry->CurrentValue;
        $row['ModifierApplicable'] = $this->ModifierApplicable->CurrentValue;
        $row['ModifierType'] = $this->ModifierType->CurrentValue;
        $row['AcceptZeroRate'] = $this->AcceptZeroRate->CurrentValue;
        $row['ExciseDutyCode'] = $this->ExciseDutyCode->CurrentValue;
        $row['IndentProductGroupCode'] = $this->IndentProductGroupCode->CurrentValue;
        $row['IsMultiBatch'] = $this->IsMultiBatch->CurrentValue;
        $row['IsSingleBatch'] = $this->IsSingleBatch->CurrentValue;
        $row['MarkUpRate1'] = $this->MarkUpRate1->CurrentValue;
        $row['MarkDownRate1'] = $this->MarkDownRate1->CurrentValue;
        $row['MarkUpRate2'] = $this->MarkUpRate2->CurrentValue;
        $row['MarkDownRate2'] = $this->MarkDownRate2->CurrentValue;
        $row['Yield'] = $this->_Yield->CurrentValue;
        $row['RefProductCode'] = $this->RefProductCode->CurrentValue;
        $row['Volume'] = $this->Volume->CurrentValue;
        $row['MeasurementID'] = $this->MeasurementID->CurrentValue;
        $row['CountryCode'] = $this->CountryCode->CurrentValue;
        $row['AcceptWMQty'] = $this->AcceptWMQty->CurrentValue;
        $row['SingleBatchBasedOnRate'] = $this->SingleBatchBasedOnRate->CurrentValue;
        $row['TenderNo'] = $this->TenderNo->CurrentValue;
        $row['SingleBillMaximumSoldQtyFiled'] = $this->SingleBillMaximumSoldQtyFiled->CurrentValue;
        $row['Strength1'] = $this->Strength1->CurrentValue;
        $row['Strength2'] = $this->Strength2->CurrentValue;
        $row['Strength3'] = $this->Strength3->CurrentValue;
        $row['Strength4'] = $this->Strength4->CurrentValue;
        $row['Strength5'] = $this->Strength5->CurrentValue;
        $row['IngredientCode1'] = $this->IngredientCode1->CurrentValue;
        $row['IngredientCode2'] = $this->IngredientCode2->CurrentValue;
        $row['IngredientCode3'] = $this->IngredientCode3->CurrentValue;
        $row['IngredientCode4'] = $this->IngredientCode4->CurrentValue;
        $row['IngredientCode5'] = $this->IngredientCode5->CurrentValue;
        $row['OrderType'] = $this->OrderType->CurrentValue;
        $row['StockUOM'] = $this->StockUOM->CurrentValue;
        $row['PriceUOM'] = $this->PriceUOM->CurrentValue;
        $row['DefaultSaleUOM'] = $this->DefaultSaleUOM->CurrentValue;
        $row['DefaultPurchaseUOM'] = $this->DefaultPurchaseUOM->CurrentValue;
        $row['ReportingUOM'] = $this->ReportingUOM->CurrentValue;
        $row['LastPurchasedUOM'] = $this->LastPurchasedUOM->CurrentValue;
        $row['TreatmentCodes'] = $this->TreatmentCodes->CurrentValue;
        $row['InsuranceType'] = $this->InsuranceType->CurrentValue;
        $row['CoverageGroupCodes'] = $this->CoverageGroupCodes->CurrentValue;
        $row['MultipleUOM'] = $this->MultipleUOM->CurrentValue;
        $row['SalePriceComputation'] = $this->SalePriceComputation->CurrentValue;
        $row['StockCorrection'] = $this->StockCorrection->CurrentValue;
        $row['LBTPercentage'] = $this->LBTPercentage->CurrentValue;
        $row['SalesCommission'] = $this->SalesCommission->CurrentValue;
        $row['LockedStock'] = $this->LockedStock->CurrentValue;
        $row['MinMaxUOM'] = $this->MinMaxUOM->CurrentValue;
        $row['ExpiryMfrDateFormat'] = $this->ExpiryMfrDateFormat->CurrentValue;
        $row['ProductLifeTime'] = $this->ProductLifeTime->CurrentValue;
        $row['IsCombo'] = $this->IsCombo->CurrentValue;
        $row['ComboTypeCode'] = $this->ComboTypeCode->CurrentValue;
        $row['AttributeCount6'] = $this->AttributeCount6->CurrentValue;
        $row['AttributeCount7'] = $this->AttributeCount7->CurrentValue;
        $row['AttributeCount8'] = $this->AttributeCount8->CurrentValue;
        $row['AttributeCount9'] = $this->AttributeCount9->CurrentValue;
        $row['AttributeCount10'] = $this->AttributeCount10->CurrentValue;
        $row['LabourCharge'] = $this->LabourCharge->CurrentValue;
        $row['AffectOtherCharge'] = $this->AffectOtherCharge->CurrentValue;
        $row['DosageInfo'] = $this->DosageInfo->CurrentValue;
        $row['DosageType'] = $this->DosageType->CurrentValue;
        $row['DefaultIndentUOM'] = $this->DefaultIndentUOM->CurrentValue;
        $row['PromoTag'] = $this->PromoTag->CurrentValue;
        $row['BillLevelPromoTag'] = $this->BillLevelPromoTag->CurrentValue;
        $row['IsMRPProduct'] = $this->IsMRPProduct->CurrentValue;
        $row['MrpList'] = $this->MrpList->CurrentValue;
        $row['AlternateSaleUOM'] = $this->AlternateSaleUOM->CurrentValue;
        $row['FreeUOM'] = $this->FreeUOM->CurrentValue;
        $row['MarketedCode'] = $this->MarketedCode->CurrentValue;
        $row['MinimumSalePrice'] = $this->MinimumSalePrice->CurrentValue;
        $row['PRate1'] = $this->PRate1->CurrentValue;
        $row['PRate2'] = $this->PRate2->CurrentValue;
        $row['LPItemCost'] = $this->LPItemCost->CurrentValue;
        $row['FixedItemCost'] = $this->FixedItemCost->CurrentValue;
        $row['HSNId'] = $this->HSNId->CurrentValue;
        $row['TaxInclusive'] = $this->TaxInclusive->CurrentValue;
        $row['EligibleforWarranty'] = $this->EligibleforWarranty->CurrentValue;
        $row['NoofMonthsWarranty'] = $this->NoofMonthsWarranty->CurrentValue;
        $row['ComputeTaxonCost'] = $this->ComputeTaxonCost->CurrentValue;
        $row['HasEmptyBottleTrack'] = $this->HasEmptyBottleTrack->CurrentValue;
        $row['EmptyBottleReferenceCode'] = $this->EmptyBottleReferenceCode->CurrentValue;
        $row['AdditionalCESSAmount'] = $this->AdditionalCESSAmount->CurrentValue;
        $row['EmptyBottleRate'] = $this->EmptyBottleRate->CurrentValue;
        return $row;
    }

    // Load old record
    protected function loadOldRecord()
    {
        // Load key values from Session
        $validKey = true;
        if (strval($this->getKey("ProductCode")) != "") {
            $this->ProductCode->OldValue = $this->getKey("ProductCode"); // ProductCode
        } else {
            $validKey = false;
        }

        // Load old record
        $this->OldRecordset = null;
        if ($validKey) {
            $this->CurrentFilter = $this->getRecordFilter();
            $sql = $this->getCurrentSql();
            $conn = $this->getConnection();
            $this->OldRecordset = LoadRecordset($sql, $conn);
        }
        $this->loadRowValues($this->OldRecordset); // Load row values
        return $validKey;
    }

    // Render row values based on field settings
    public function renderRow()
    {
        global $Security, $Language, $CurrentLanguage;

        // Initialize URLs

        // Convert decimal values if posted back
        if ($this->Weight->FormValue == $this->Weight->CurrentValue && is_numeric(ConvertToFloatString($this->Weight->CurrentValue))) {
            $this->Weight->CurrentValue = ConvertToFloatString($this->Weight->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->MinimumStockLevel->FormValue == $this->MinimumStockLevel->CurrentValue && is_numeric(ConvertToFloatString($this->MinimumStockLevel->CurrentValue))) {
            $this->MinimumStockLevel->CurrentValue = ConvertToFloatString($this->MinimumStockLevel->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->MaximumStockLevel->FormValue == $this->MaximumStockLevel->CurrentValue && is_numeric(ConvertToFloatString($this->MaximumStockLevel->CurrentValue))) {
            $this->MaximumStockLevel->CurrentValue = ConvertToFloatString($this->MaximumStockLevel->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->ReorderLevel->FormValue == $this->ReorderLevel->CurrentValue && is_numeric(ConvertToFloatString($this->ReorderLevel->CurrentValue))) {
            $this->ReorderLevel->CurrentValue = ConvertToFloatString($this->ReorderLevel->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->MinMaxRatio->FormValue == $this->MinMaxRatio->CurrentValue && is_numeric(ConvertToFloatString($this->MinMaxRatio->CurrentValue))) {
            $this->MinMaxRatio->CurrentValue = ConvertToFloatString($this->MinMaxRatio->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->AutoMinMaxRatio->FormValue == $this->AutoMinMaxRatio->CurrentValue && is_numeric(ConvertToFloatString($this->AutoMinMaxRatio->CurrentValue))) {
            $this->AutoMinMaxRatio->CurrentValue = ConvertToFloatString($this->AutoMinMaxRatio->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->RopRatio->FormValue == $this->RopRatio->CurrentValue && is_numeric(ConvertToFloatString($this->RopRatio->CurrentValue))) {
            $this->RopRatio->CurrentValue = ConvertToFloatString($this->RopRatio->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->MRP->FormValue == $this->MRP->CurrentValue && is_numeric(ConvertToFloatString($this->MRP->CurrentValue))) {
            $this->MRP->CurrentValue = ConvertToFloatString($this->MRP->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->PurchasePrice->FormValue == $this->PurchasePrice->CurrentValue && is_numeric(ConvertToFloatString($this->PurchasePrice->CurrentValue))) {
            $this->PurchasePrice->CurrentValue = ConvertToFloatString($this->PurchasePrice->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->PurchaseUnit->FormValue == $this->PurchaseUnit->CurrentValue && is_numeric(ConvertToFloatString($this->PurchaseUnit->CurrentValue))) {
            $this->PurchaseUnit->CurrentValue = ConvertToFloatString($this->PurchaseUnit->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->SalePrice->FormValue == $this->SalePrice->CurrentValue && is_numeric(ConvertToFloatString($this->SalePrice->CurrentValue))) {
            $this->SalePrice->CurrentValue = ConvertToFloatString($this->SalePrice->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->SaleUnit->FormValue == $this->SaleUnit->CurrentValue && is_numeric(ConvertToFloatString($this->SaleUnit->CurrentValue))) {
            $this->SaleUnit->CurrentValue = ConvertToFloatString($this->SaleUnit->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->StockReceived->FormValue == $this->StockReceived->CurrentValue && is_numeric(ConvertToFloatString($this->StockReceived->CurrentValue))) {
            $this->StockReceived->CurrentValue = ConvertToFloatString($this->StockReceived->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->TotalStock->FormValue == $this->TotalStock->CurrentValue && is_numeric(ConvertToFloatString($this->TotalStock->CurrentValue))) {
            $this->TotalStock->CurrentValue = ConvertToFloatString($this->TotalStock->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->TaxAmount->FormValue == $this->TaxAmount->CurrentValue && is_numeric(ConvertToFloatString($this->TaxAmount->CurrentValue))) {
            $this->TaxAmount->CurrentValue = ConvertToFloatString($this->TaxAmount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->TotalTax->FormValue == $this->TotalTax->CurrentValue && is_numeric(ConvertToFloatString($this->TotalTax->CurrentValue))) {
            $this->TotalTax->CurrentValue = ConvertToFloatString($this->TotalTax->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->ItemCost->FormValue == $this->ItemCost->CurrentValue && is_numeric(ConvertToFloatString($this->ItemCost->CurrentValue))) {
            $this->ItemCost->CurrentValue = ConvertToFloatString($this->ItemCost->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->DiscountPerAllowInBill->FormValue == $this->DiscountPerAllowInBill->CurrentValue && is_numeric(ConvertToFloatString($this->DiscountPerAllowInBill->CurrentValue))) {
            $this->DiscountPerAllowInBill->CurrentValue = ConvertToFloatString($this->DiscountPerAllowInBill->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->Discount->FormValue == $this->Discount->CurrentValue && is_numeric(ConvertToFloatString($this->Discount->CurrentValue))) {
            $this->Discount->CurrentValue = ConvertToFloatString($this->Discount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->TotalAmount->FormValue == $this->TotalAmount->CurrentValue && is_numeric(ConvertToFloatString($this->TotalAmount->CurrentValue))) {
            $this->TotalAmount->CurrentValue = ConvertToFloatString($this->TotalAmount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->StandardMargin->FormValue == $this->StandardMargin->CurrentValue && is_numeric(ConvertToFloatString($this->StandardMargin->CurrentValue))) {
            $this->StandardMargin->CurrentValue = ConvertToFloatString($this->StandardMargin->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->Margin->FormValue == $this->Margin->CurrentValue && is_numeric(ConvertToFloatString($this->Margin->CurrentValue))) {
            $this->Margin->CurrentValue = ConvertToFloatString($this->Margin->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->ExpectedMargin->FormValue == $this->ExpectedMargin->CurrentValue && is_numeric(ConvertToFloatString($this->ExpectedMargin->CurrentValue))) {
            $this->ExpectedMargin->CurrentValue = ConvertToFloatString($this->ExpectedMargin->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->SurchargeBeforeTax->FormValue == $this->SurchargeBeforeTax->CurrentValue && is_numeric(ConvertToFloatString($this->SurchargeBeforeTax->CurrentValue))) {
            $this->SurchargeBeforeTax->CurrentValue = ConvertToFloatString($this->SurchargeBeforeTax->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->SurchargeAfterTax->FormValue == $this->SurchargeAfterTax->CurrentValue && is_numeric(ConvertToFloatString($this->SurchargeAfterTax->CurrentValue))) {
            $this->SurchargeAfterTax->CurrentValue = ConvertToFloatString($this->SurchargeAfterTax->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->OrderUnit->FormValue == $this->OrderUnit->CurrentValue && is_numeric(ConvertToFloatString($this->OrderUnit->CurrentValue))) {
            $this->OrderUnit->CurrentValue = ConvertToFloatString($this->OrderUnit->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->OrderQuantity->FormValue == $this->OrderQuantity->CurrentValue && is_numeric(ConvertToFloatString($this->OrderQuantity->CurrentValue))) {
            $this->OrderQuantity->CurrentValue = ConvertToFloatString($this->OrderQuantity->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->CalculateOrderQty->FormValue == $this->CalculateOrderQty->CurrentValue && is_numeric(ConvertToFloatString($this->CalculateOrderQty->CurrentValue))) {
            $this->CalculateOrderQty->CurrentValue = ConvertToFloatString($this->CalculateOrderQty->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->ABCSaleQty->FormValue == $this->ABCSaleQty->CurrentValue && is_numeric(ConvertToFloatString($this->ABCSaleQty->CurrentValue))) {
            $this->ABCSaleQty->CurrentValue = ConvertToFloatString($this->ABCSaleQty->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->ABCSaleValue->FormValue == $this->ABCSaleValue->CurrentValue && is_numeric(ConvertToFloatString($this->ABCSaleValue->CurrentValue))) {
            $this->ABCSaleValue->CurrentValue = ConvertToFloatString($this->ABCSaleValue->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->LastQuotePrice->FormValue == $this->LastQuotePrice->CurrentValue && is_numeric(ConvertToFloatString($this->LastQuotePrice->CurrentValue))) {
            $this->LastQuotePrice->CurrentValue = ConvertToFloatString($this->LastQuotePrice->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->PriceChange->FormValue == $this->PriceChange->CurrentValue && is_numeric(ConvertToFloatString($this->PriceChange->CurrentValue))) {
            $this->PriceChange->CurrentValue = ConvertToFloatString($this->PriceChange->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->InstitutePrice->FormValue == $this->InstitutePrice->CurrentValue && is_numeric(ConvertToFloatString($this->InstitutePrice->CurrentValue))) {
            $this->InstitutePrice->CurrentValue = ConvertToFloatString($this->InstitutePrice->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->ComputedMinStock->FormValue == $this->ComputedMinStock->CurrentValue && is_numeric(ConvertToFloatString($this->ComputedMinStock->CurrentValue))) {
            $this->ComputedMinStock->CurrentValue = ConvertToFloatString($this->ComputedMinStock->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->ComputedMaxStock->FormValue == $this->ComputedMaxStock->CurrentValue && is_numeric(ConvertToFloatString($this->ComputedMaxStock->CurrentValue))) {
            $this->ComputedMaxStock->CurrentValue = ConvertToFloatString($this->ComputedMaxStock->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->DefaultDiscountPercentage->FormValue == $this->DefaultDiscountPercentage->CurrentValue && is_numeric(ConvertToFloatString($this->DefaultDiscountPercentage->CurrentValue))) {
            $this->DefaultDiscountPercentage->CurrentValue = ConvertToFloatString($this->DefaultDiscountPercentage->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->Markup->FormValue == $this->Markup->CurrentValue && is_numeric(ConvertToFloatString($this->Markup->CurrentValue))) {
            $this->Markup->CurrentValue = ConvertToFloatString($this->Markup->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->MarkDown->FormValue == $this->MarkDown->CurrentValue && is_numeric(ConvertToFloatString($this->MarkDown->CurrentValue))) {
            $this->MarkDown->CurrentValue = ConvertToFloatString($this->MarkDown->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->FreeQuantity->FormValue == $this->FreeQuantity->CurrentValue && is_numeric(ConvertToFloatString($this->FreeQuantity->CurrentValue))) {
            $this->FreeQuantity->CurrentValue = ConvertToFloatString($this->FreeQuantity->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->DiscountValue->FormValue == $this->DiscountValue->CurrentValue && is_numeric(ConvertToFloatString($this->DiscountValue->CurrentValue))) {
            $this->DiscountValue->CurrentValue = ConvertToFloatString($this->DiscountValue->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->SaleprcieAndMrpCalcPercent->FormValue == $this->SaleprcieAndMrpCalcPercent->CurrentValue && is_numeric(ConvertToFloatString($this->SaleprcieAndMrpCalcPercent->CurrentValue))) {
            $this->SaleprcieAndMrpCalcPercent->CurrentValue = ConvertToFloatString($this->SaleprcieAndMrpCalcPercent->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->MarkUpRate1->FormValue == $this->MarkUpRate1->CurrentValue && is_numeric(ConvertToFloatString($this->MarkUpRate1->CurrentValue))) {
            $this->MarkUpRate1->CurrentValue = ConvertToFloatString($this->MarkUpRate1->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->MarkDownRate1->FormValue == $this->MarkDownRate1->CurrentValue && is_numeric(ConvertToFloatString($this->MarkDownRate1->CurrentValue))) {
            $this->MarkDownRate1->CurrentValue = ConvertToFloatString($this->MarkDownRate1->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->MarkUpRate2->FormValue == $this->MarkUpRate2->CurrentValue && is_numeric(ConvertToFloatString($this->MarkUpRate2->CurrentValue))) {
            $this->MarkUpRate2->CurrentValue = ConvertToFloatString($this->MarkUpRate2->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->MarkDownRate2->FormValue == $this->MarkDownRate2->CurrentValue && is_numeric(ConvertToFloatString($this->MarkDownRate2->CurrentValue))) {
            $this->MarkDownRate2->CurrentValue = ConvertToFloatString($this->MarkDownRate2->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->_Yield->FormValue == $this->_Yield->CurrentValue && is_numeric(ConvertToFloatString($this->_Yield->CurrentValue))) {
            $this->_Yield->CurrentValue = ConvertToFloatString($this->_Yield->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->Volume->FormValue == $this->Volume->CurrentValue && is_numeric(ConvertToFloatString($this->Volume->CurrentValue))) {
            $this->Volume->CurrentValue = ConvertToFloatString($this->Volume->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->SingleBillMaximumSoldQtyFiled->FormValue == $this->SingleBillMaximumSoldQtyFiled->CurrentValue && is_numeric(ConvertToFloatString($this->SingleBillMaximumSoldQtyFiled->CurrentValue))) {
            $this->SingleBillMaximumSoldQtyFiled->CurrentValue = ConvertToFloatString($this->SingleBillMaximumSoldQtyFiled->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->LBTPercentage->FormValue == $this->LBTPercentage->CurrentValue && is_numeric(ConvertToFloatString($this->LBTPercentage->CurrentValue))) {
            $this->LBTPercentage->CurrentValue = ConvertToFloatString($this->LBTPercentage->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->SalesCommission->FormValue == $this->SalesCommission->CurrentValue && is_numeric(ConvertToFloatString($this->SalesCommission->CurrentValue))) {
            $this->SalesCommission->CurrentValue = ConvertToFloatString($this->SalesCommission->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->LockedStock->FormValue == $this->LockedStock->CurrentValue && is_numeric(ConvertToFloatString($this->LockedStock->CurrentValue))) {
            $this->LockedStock->CurrentValue = ConvertToFloatString($this->LockedStock->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->LabourCharge->FormValue == $this->LabourCharge->CurrentValue && is_numeric(ConvertToFloatString($this->LabourCharge->CurrentValue))) {
            $this->LabourCharge->CurrentValue = ConvertToFloatString($this->LabourCharge->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->MinimumSalePrice->FormValue == $this->MinimumSalePrice->CurrentValue && is_numeric(ConvertToFloatString($this->MinimumSalePrice->CurrentValue))) {
            $this->MinimumSalePrice->CurrentValue = ConvertToFloatString($this->MinimumSalePrice->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->PRate1->FormValue == $this->PRate1->CurrentValue && is_numeric(ConvertToFloatString($this->PRate1->CurrentValue))) {
            $this->PRate1->CurrentValue = ConvertToFloatString($this->PRate1->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->PRate2->FormValue == $this->PRate2->CurrentValue && is_numeric(ConvertToFloatString($this->PRate2->CurrentValue))) {
            $this->PRate2->CurrentValue = ConvertToFloatString($this->PRate2->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->LPItemCost->FormValue == $this->LPItemCost->CurrentValue && is_numeric(ConvertToFloatString($this->LPItemCost->CurrentValue))) {
            $this->LPItemCost->CurrentValue = ConvertToFloatString($this->LPItemCost->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->FixedItemCost->FormValue == $this->FixedItemCost->CurrentValue && is_numeric(ConvertToFloatString($this->FixedItemCost->CurrentValue))) {
            $this->FixedItemCost->CurrentValue = ConvertToFloatString($this->FixedItemCost->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->AdditionalCESSAmount->FormValue == $this->AdditionalCESSAmount->CurrentValue && is_numeric(ConvertToFloatString($this->AdditionalCESSAmount->CurrentValue))) {
            $this->AdditionalCESSAmount->CurrentValue = ConvertToFloatString($this->AdditionalCESSAmount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->EmptyBottleRate->FormValue == $this->EmptyBottleRate->CurrentValue && is_numeric(ConvertToFloatString($this->EmptyBottleRate->CurrentValue))) {
            $this->EmptyBottleRate->CurrentValue = ConvertToFloatString($this->EmptyBottleRate->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // ProductCode

        // ProductName

        // DivisionCode

        // ManufacturerCode

        // SupplierCode

        // AlternateSupplierCodes

        // AlternateProductCode

        // UniversalProductCode

        // BookProductCode

        // OldCode

        // ProtectedProducts

        // ProductFullName

        // UnitOfMeasure

        // UnitDescription

        // BulkDescription

        // BarCodeDescription

        // PackageInformation

        // PackageId

        // Weight

        // AllowFractions

        // MinimumStockLevel

        // MaximumStockLevel

        // ReorderLevel

        // MinMaxRatio

        // AutoMinMaxRatio

        // ScheduleCode

        // RopRatio

        // MRP

        // PurchasePrice

        // PurchaseUnit

        // PurchaseTaxCode

        // AllowDirectInward

        // SalePrice

        // SaleUnit

        // SalesTaxCode

        // StockReceived

        // TotalStock

        // StockType

        // StockCheckDate

        // StockAdjustmentDate

        // Remarks

        // CostCentre

        // ProductType

        // TaxAmount

        // TaxId

        // ResaleTaxApplicable

        // CstOtherTax

        // TotalTax

        // ItemCost

        // ExpiryDate

        // BatchDescription

        // FreeScheme

        // CashDiscountEligibility

        // DiscountPerAllowInBill

        // Discount

        // TotalAmount

        // StandardMargin

        // Margin

        // MarginId

        // ExpectedMargin

        // SurchargeBeforeTax

        // SurchargeAfterTax

        // TempOrderNo

        // TempOrderDate

        // OrderUnit

        // OrderQuantity

        // MarkForOrder

        // OrderAllId

        // CalculateOrderQty

        // SubLocation

        // CategoryCode

        // SubCategory

        // FlexCategoryCode

        // ABCSaleQty

        // ABCSaleValue

        // ConvertionFactor

        // ConvertionUnitDesc

        // TransactionId

        // SoldProductId

        // WantedBookId

        // AllId

        // BatchAndExpiryCompulsory

        // BatchStockForWantedBook

        // UnitBasedBilling

        // DoNotCheckStock

        // AcceptRate

        // PriceLevel

        // LastQuotePrice

        // PriceChange

        // CommodityCode

        // InstitutePrice

        // CtrlOrDCtrlProduct

        // ImportedDate

        // IsImported

        // FileName

        // LPName

        // GodownNumber

        // CreationDate

        // CreatedbyUser

        // ModifiedDate

        // ModifiedbyUser

        // isActive

        // AllowExpiryClaim

        // BrandCode

        // FreeSchemeBasedon

        // DoNotCheckCostInBill

        // ProductGroupCode

        // ProductStrengthCode

        // PackingCode

        // ComputedMinStock

        // ComputedMaxStock

        // ProductRemark

        // ProductDrugCode

        // IsMatrixProduct

        // AttributeCount1

        // AttributeCount2

        // AttributeCount3

        // AttributeCount4

        // AttributeCount5

        // DefaultDiscountPercentage

        // DonotPrintBarcode

        // ProductLevelDiscount

        // Markup

        // MarkDown

        // ReworkSalePrice

        // MultipleInput

        // LpPackageInformation

        // AllowNegativeStock

        // OrderDate

        // OrderTime

        // RateGroupCode

        // ConversionCaseLot

        // ShippingLot

        // AllowExpiryReplacement

        // NoOfMonthExpiryAllowed

        // ProductDiscountEligibility

        // ScheduleTypeCode

        // AIOCDProductCode

        // FreeQuantity

        // DiscountType

        // DiscountValue

        // HasProductOrderAttribute

        // FirstPODate

        // SaleprcieAndMrpCalcPercent

        // IsGiftVoucherProducts

        // AcceptRange4SerialNumber

        // GiftVoucherDenomination

        // Subclasscode

        // BarCodeFromWeighingMachine

        // CheckCostInReturn

        // FrequentSaleProduct

        // RateType

        // TouchscreenName

        // FreeType

        // LooseQtyasNewBatch

        // AllowSlabBilling

        // ProductTypeForProduction

        // RecipeCode

        // DefaultUnitType

        // PIstatus

        // LastPiConfirmedDate

        // BarCodeDesign

        // AcceptRemarksInBill

        // Classification

        // TimeSlot

        // IsBundle

        // ColorCode

        // GenderCode

        // SizeCode

        // GiftCard

        // ToonLabel

        // GarmentType

        // AgeGroup

        // Season

        // DailyStockEntry

        // ModifierApplicable

        // ModifierType

        // AcceptZeroRate

        // ExciseDutyCode

        // IndentProductGroupCode

        // IsMultiBatch

        // IsSingleBatch

        // MarkUpRate1

        // MarkDownRate1

        // MarkUpRate2

        // MarkDownRate2

        // Yield

        // RefProductCode

        // Volume

        // MeasurementID

        // CountryCode

        // AcceptWMQty

        // SingleBatchBasedOnRate

        // TenderNo

        // SingleBillMaximumSoldQtyFiled

        // Strength1

        // Strength2

        // Strength3

        // Strength4

        // Strength5

        // IngredientCode1

        // IngredientCode2

        // IngredientCode3

        // IngredientCode4

        // IngredientCode5

        // OrderType

        // StockUOM

        // PriceUOM

        // DefaultSaleUOM

        // DefaultPurchaseUOM

        // ReportingUOM

        // LastPurchasedUOM

        // TreatmentCodes

        // InsuranceType

        // CoverageGroupCodes

        // MultipleUOM

        // SalePriceComputation

        // StockCorrection

        // LBTPercentage

        // SalesCommission

        // LockedStock

        // MinMaxUOM

        // ExpiryMfrDateFormat

        // ProductLifeTime

        // IsCombo

        // ComboTypeCode

        // AttributeCount6

        // AttributeCount7

        // AttributeCount8

        // AttributeCount9

        // AttributeCount10

        // LabourCharge

        // AffectOtherCharge

        // DosageInfo

        // DosageType

        // DefaultIndentUOM

        // PromoTag

        // BillLevelPromoTag

        // IsMRPProduct

        // MrpList

        // AlternateSaleUOM

        // FreeUOM

        // MarketedCode

        // MinimumSalePrice

        // PRate1

        // PRate2

        // LPItemCost

        // FixedItemCost

        // HSNId

        // TaxInclusive

        // EligibleforWarranty

        // NoofMonthsWarranty

        // ComputeTaxonCost

        // HasEmptyBottleTrack

        // EmptyBottleReferenceCode

        // AdditionalCESSAmount

        // EmptyBottleRate
        if ($this->RowType == ROWTYPE_VIEW) {
            // ProductCode
            $this->ProductCode->ViewValue = $this->ProductCode->CurrentValue;
            $this->ProductCode->ViewCustomAttributes = "";

            // ProductName
            $this->ProductName->ViewValue = $this->ProductName->CurrentValue;
            $this->ProductName->ViewCustomAttributes = "";

            // DivisionCode
            $this->DivisionCode->ViewValue = $this->DivisionCode->CurrentValue;
            $this->DivisionCode->ViewCustomAttributes = "";

            // ManufacturerCode
            $this->ManufacturerCode->ViewValue = $this->ManufacturerCode->CurrentValue;
            $this->ManufacturerCode->ViewCustomAttributes = "";

            // SupplierCode
            $this->SupplierCode->ViewValue = $this->SupplierCode->CurrentValue;
            $this->SupplierCode->ViewCustomAttributes = "";

            // AlternateSupplierCodes
            $this->AlternateSupplierCodes->ViewValue = $this->AlternateSupplierCodes->CurrentValue;
            $this->AlternateSupplierCodes->ViewCustomAttributes = "";

            // AlternateProductCode
            $this->AlternateProductCode->ViewValue = $this->AlternateProductCode->CurrentValue;
            $this->AlternateProductCode->ViewCustomAttributes = "";

            // UniversalProductCode
            $this->UniversalProductCode->ViewValue = $this->UniversalProductCode->CurrentValue;
            $this->UniversalProductCode->ViewValue = FormatNumber($this->UniversalProductCode->ViewValue, 0, -2, -2, -2);
            $this->UniversalProductCode->ViewCustomAttributes = "";

            // BookProductCode
            $this->BookProductCode->ViewValue = $this->BookProductCode->CurrentValue;
            $this->BookProductCode->ViewValue = FormatNumber($this->BookProductCode->ViewValue, 0, -2, -2, -2);
            $this->BookProductCode->ViewCustomAttributes = "";

            // OldCode
            $this->OldCode->ViewValue = $this->OldCode->CurrentValue;
            $this->OldCode->ViewCustomAttributes = "";

            // ProtectedProducts
            $this->ProtectedProducts->ViewValue = $this->ProtectedProducts->CurrentValue;
            $this->ProtectedProducts->ViewValue = FormatNumber($this->ProtectedProducts->ViewValue, 0, -2, -2, -2);
            $this->ProtectedProducts->ViewCustomAttributes = "";

            // ProductFullName
            $this->ProductFullName->ViewValue = $this->ProductFullName->CurrentValue;
            $this->ProductFullName->ViewCustomAttributes = "";

            // UnitOfMeasure
            $this->UnitOfMeasure->ViewValue = $this->UnitOfMeasure->CurrentValue;
            $this->UnitOfMeasure->ViewValue = FormatNumber($this->UnitOfMeasure->ViewValue, 0, -2, -2, -2);
            $this->UnitOfMeasure->ViewCustomAttributes = "";

            // UnitDescription
            $this->UnitDescription->ViewValue = $this->UnitDescription->CurrentValue;
            $this->UnitDescription->ViewCustomAttributes = "";

            // BulkDescription
            $this->BulkDescription->ViewValue = $this->BulkDescription->CurrentValue;
            $this->BulkDescription->ViewCustomAttributes = "";

            // BarCodeDescription
            $this->BarCodeDescription->ViewValue = $this->BarCodeDescription->CurrentValue;
            $this->BarCodeDescription->ViewCustomAttributes = "";

            // PackageInformation
            $this->PackageInformation->ViewValue = $this->PackageInformation->CurrentValue;
            $this->PackageInformation->ViewCustomAttributes = "";

            // PackageId
            $this->PackageId->ViewValue = $this->PackageId->CurrentValue;
            $this->PackageId->ViewValue = FormatNumber($this->PackageId->ViewValue, 0, -2, -2, -2);
            $this->PackageId->ViewCustomAttributes = "";

            // Weight
            $this->Weight->ViewValue = $this->Weight->CurrentValue;
            $this->Weight->ViewValue = FormatNumber($this->Weight->ViewValue, 2, -2, -2, -2);
            $this->Weight->ViewCustomAttributes = "";

            // AllowFractions
            $this->AllowFractions->ViewValue = $this->AllowFractions->CurrentValue;
            $this->AllowFractions->ViewValue = FormatNumber($this->AllowFractions->ViewValue, 0, -2, -2, -2);
            $this->AllowFractions->ViewCustomAttributes = "";

            // MinimumStockLevel
            $this->MinimumStockLevel->ViewValue = $this->MinimumStockLevel->CurrentValue;
            $this->MinimumStockLevel->ViewValue = FormatNumber($this->MinimumStockLevel->ViewValue, 2, -2, -2, -2);
            $this->MinimumStockLevel->ViewCustomAttributes = "";

            // MaximumStockLevel
            $this->MaximumStockLevel->ViewValue = $this->MaximumStockLevel->CurrentValue;
            $this->MaximumStockLevel->ViewValue = FormatNumber($this->MaximumStockLevel->ViewValue, 2, -2, -2, -2);
            $this->MaximumStockLevel->ViewCustomAttributes = "";

            // ReorderLevel
            $this->ReorderLevel->ViewValue = $this->ReorderLevel->CurrentValue;
            $this->ReorderLevel->ViewValue = FormatNumber($this->ReorderLevel->ViewValue, 2, -2, -2, -2);
            $this->ReorderLevel->ViewCustomAttributes = "";

            // MinMaxRatio
            $this->MinMaxRatio->ViewValue = $this->MinMaxRatio->CurrentValue;
            $this->MinMaxRatio->ViewValue = FormatNumber($this->MinMaxRatio->ViewValue, 2, -2, -2, -2);
            $this->MinMaxRatio->ViewCustomAttributes = "";

            // AutoMinMaxRatio
            $this->AutoMinMaxRatio->ViewValue = $this->AutoMinMaxRatio->CurrentValue;
            $this->AutoMinMaxRatio->ViewValue = FormatNumber($this->AutoMinMaxRatio->ViewValue, 2, -2, -2, -2);
            $this->AutoMinMaxRatio->ViewCustomAttributes = "";

            // ScheduleCode
            $this->ScheduleCode->ViewValue = $this->ScheduleCode->CurrentValue;
            $this->ScheduleCode->ViewValue = FormatNumber($this->ScheduleCode->ViewValue, 0, -2, -2, -2);
            $this->ScheduleCode->ViewCustomAttributes = "";

            // RopRatio
            $this->RopRatio->ViewValue = $this->RopRatio->CurrentValue;
            $this->RopRatio->ViewValue = FormatNumber($this->RopRatio->ViewValue, 2, -2, -2, -2);
            $this->RopRatio->ViewCustomAttributes = "";

            // MRP
            $this->MRP->ViewValue = $this->MRP->CurrentValue;
            $this->MRP->ViewValue = FormatNumber($this->MRP->ViewValue, 2, -2, -2, -2);
            $this->MRP->ViewCustomAttributes = "";

            // PurchasePrice
            $this->PurchasePrice->ViewValue = $this->PurchasePrice->CurrentValue;
            $this->PurchasePrice->ViewValue = FormatNumber($this->PurchasePrice->ViewValue, 2, -2, -2, -2);
            $this->PurchasePrice->ViewCustomAttributes = "";

            // PurchaseUnit
            $this->PurchaseUnit->ViewValue = $this->PurchaseUnit->CurrentValue;
            $this->PurchaseUnit->ViewValue = FormatNumber($this->PurchaseUnit->ViewValue, 2, -2, -2, -2);
            $this->PurchaseUnit->ViewCustomAttributes = "";

            // PurchaseTaxCode
            $this->PurchaseTaxCode->ViewValue = $this->PurchaseTaxCode->CurrentValue;
            $this->PurchaseTaxCode->ViewValue = FormatNumber($this->PurchaseTaxCode->ViewValue, 0, -2, -2, -2);
            $this->PurchaseTaxCode->ViewCustomAttributes = "";

            // AllowDirectInward
            $this->AllowDirectInward->ViewValue = $this->AllowDirectInward->CurrentValue;
            $this->AllowDirectInward->ViewValue = FormatNumber($this->AllowDirectInward->ViewValue, 0, -2, -2, -2);
            $this->AllowDirectInward->ViewCustomAttributes = "";

            // SalePrice
            $this->SalePrice->ViewValue = $this->SalePrice->CurrentValue;
            $this->SalePrice->ViewValue = FormatNumber($this->SalePrice->ViewValue, 2, -2, -2, -2);
            $this->SalePrice->ViewCustomAttributes = "";

            // SaleUnit
            $this->SaleUnit->ViewValue = $this->SaleUnit->CurrentValue;
            $this->SaleUnit->ViewValue = FormatNumber($this->SaleUnit->ViewValue, 2, -2, -2, -2);
            $this->SaleUnit->ViewCustomAttributes = "";

            // SalesTaxCode
            $this->SalesTaxCode->ViewValue = $this->SalesTaxCode->CurrentValue;
            $this->SalesTaxCode->ViewValue = FormatNumber($this->SalesTaxCode->ViewValue, 0, -2, -2, -2);
            $this->SalesTaxCode->ViewCustomAttributes = "";

            // StockReceived
            $this->StockReceived->ViewValue = $this->StockReceived->CurrentValue;
            $this->StockReceived->ViewValue = FormatNumber($this->StockReceived->ViewValue, 2, -2, -2, -2);
            $this->StockReceived->ViewCustomAttributes = "";

            // TotalStock
            $this->TotalStock->ViewValue = $this->TotalStock->CurrentValue;
            $this->TotalStock->ViewValue = FormatNumber($this->TotalStock->ViewValue, 2, -2, -2, -2);
            $this->TotalStock->ViewCustomAttributes = "";

            // StockType
            $this->StockType->ViewValue = $this->StockType->CurrentValue;
            $this->StockType->ViewValue = FormatNumber($this->StockType->ViewValue, 0, -2, -2, -2);
            $this->StockType->ViewCustomAttributes = "";

            // StockCheckDate
            $this->StockCheckDate->ViewValue = $this->StockCheckDate->CurrentValue;
            $this->StockCheckDate->ViewValue = FormatDateTime($this->StockCheckDate->ViewValue, 0);
            $this->StockCheckDate->ViewCustomAttributes = "";

            // StockAdjustmentDate
            $this->StockAdjustmentDate->ViewValue = $this->StockAdjustmentDate->CurrentValue;
            $this->StockAdjustmentDate->ViewValue = FormatDateTime($this->StockAdjustmentDate->ViewValue, 0);
            $this->StockAdjustmentDate->ViewCustomAttributes = "";

            // Remarks
            $this->Remarks->ViewValue = $this->Remarks->CurrentValue;
            $this->Remarks->ViewCustomAttributes = "";

            // CostCentre
            $this->CostCentre->ViewValue = $this->CostCentre->CurrentValue;
            $this->CostCentre->ViewValue = FormatNumber($this->CostCentre->ViewValue, 0, -2, -2, -2);
            $this->CostCentre->ViewCustomAttributes = "";

            // ProductType
            $this->ProductType->ViewValue = $this->ProductType->CurrentValue;
            $this->ProductType->ViewValue = FormatNumber($this->ProductType->ViewValue, 0, -2, -2, -2);
            $this->ProductType->ViewCustomAttributes = "";

            // TaxAmount
            $this->TaxAmount->ViewValue = $this->TaxAmount->CurrentValue;
            $this->TaxAmount->ViewValue = FormatNumber($this->TaxAmount->ViewValue, 2, -2, -2, -2);
            $this->TaxAmount->ViewCustomAttributes = "";

            // TaxId
            $this->TaxId->ViewValue = $this->TaxId->CurrentValue;
            $this->TaxId->ViewValue = FormatNumber($this->TaxId->ViewValue, 0, -2, -2, -2);
            $this->TaxId->ViewCustomAttributes = "";

            // ResaleTaxApplicable
            $this->ResaleTaxApplicable->ViewValue = $this->ResaleTaxApplicable->CurrentValue;
            $this->ResaleTaxApplicable->ViewValue = FormatNumber($this->ResaleTaxApplicable->ViewValue, 0, -2, -2, -2);
            $this->ResaleTaxApplicable->ViewCustomAttributes = "";

            // CstOtherTax
            $this->CstOtherTax->ViewValue = $this->CstOtherTax->CurrentValue;
            $this->CstOtherTax->ViewCustomAttributes = "";

            // TotalTax
            $this->TotalTax->ViewValue = $this->TotalTax->CurrentValue;
            $this->TotalTax->ViewValue = FormatNumber($this->TotalTax->ViewValue, 2, -2, -2, -2);
            $this->TotalTax->ViewCustomAttributes = "";

            // ItemCost
            $this->ItemCost->ViewValue = $this->ItemCost->CurrentValue;
            $this->ItemCost->ViewValue = FormatNumber($this->ItemCost->ViewValue, 2, -2, -2, -2);
            $this->ItemCost->ViewCustomAttributes = "";

            // ExpiryDate
            $this->ExpiryDate->ViewValue = $this->ExpiryDate->CurrentValue;
            $this->ExpiryDate->ViewValue = FormatDateTime($this->ExpiryDate->ViewValue, 0);
            $this->ExpiryDate->ViewCustomAttributes = "";

            // BatchDescription
            $this->BatchDescription->ViewValue = $this->BatchDescription->CurrentValue;
            $this->BatchDescription->ViewCustomAttributes = "";

            // FreeScheme
            $this->FreeScheme->ViewValue = $this->FreeScheme->CurrentValue;
            $this->FreeScheme->ViewValue = FormatNumber($this->FreeScheme->ViewValue, 0, -2, -2, -2);
            $this->FreeScheme->ViewCustomAttributes = "";

            // CashDiscountEligibility
            $this->CashDiscountEligibility->ViewValue = $this->CashDiscountEligibility->CurrentValue;
            $this->CashDiscountEligibility->ViewValue = FormatNumber($this->CashDiscountEligibility->ViewValue, 0, -2, -2, -2);
            $this->CashDiscountEligibility->ViewCustomAttributes = "";

            // DiscountPerAllowInBill
            $this->DiscountPerAllowInBill->ViewValue = $this->DiscountPerAllowInBill->CurrentValue;
            $this->DiscountPerAllowInBill->ViewValue = FormatNumber($this->DiscountPerAllowInBill->ViewValue, 2, -2, -2, -2);
            $this->DiscountPerAllowInBill->ViewCustomAttributes = "";

            // Discount
            $this->Discount->ViewValue = $this->Discount->CurrentValue;
            $this->Discount->ViewValue = FormatNumber($this->Discount->ViewValue, 2, -2, -2, -2);
            $this->Discount->ViewCustomAttributes = "";

            // TotalAmount
            $this->TotalAmount->ViewValue = $this->TotalAmount->CurrentValue;
            $this->TotalAmount->ViewValue = FormatNumber($this->TotalAmount->ViewValue, 2, -2, -2, -2);
            $this->TotalAmount->ViewCustomAttributes = "";

            // StandardMargin
            $this->StandardMargin->ViewValue = $this->StandardMargin->CurrentValue;
            $this->StandardMargin->ViewValue = FormatNumber($this->StandardMargin->ViewValue, 2, -2, -2, -2);
            $this->StandardMargin->ViewCustomAttributes = "";

            // Margin
            $this->Margin->ViewValue = $this->Margin->CurrentValue;
            $this->Margin->ViewValue = FormatNumber($this->Margin->ViewValue, 2, -2, -2, -2);
            $this->Margin->ViewCustomAttributes = "";

            // MarginId
            $this->MarginId->ViewValue = $this->MarginId->CurrentValue;
            $this->MarginId->ViewValue = FormatNumber($this->MarginId->ViewValue, 0, -2, -2, -2);
            $this->MarginId->ViewCustomAttributes = "";

            // ExpectedMargin
            $this->ExpectedMargin->ViewValue = $this->ExpectedMargin->CurrentValue;
            $this->ExpectedMargin->ViewValue = FormatNumber($this->ExpectedMargin->ViewValue, 2, -2, -2, -2);
            $this->ExpectedMargin->ViewCustomAttributes = "";

            // SurchargeBeforeTax
            $this->SurchargeBeforeTax->ViewValue = $this->SurchargeBeforeTax->CurrentValue;
            $this->SurchargeBeforeTax->ViewValue = FormatNumber($this->SurchargeBeforeTax->ViewValue, 2, -2, -2, -2);
            $this->SurchargeBeforeTax->ViewCustomAttributes = "";

            // SurchargeAfterTax
            $this->SurchargeAfterTax->ViewValue = $this->SurchargeAfterTax->CurrentValue;
            $this->SurchargeAfterTax->ViewValue = FormatNumber($this->SurchargeAfterTax->ViewValue, 2, -2, -2, -2);
            $this->SurchargeAfterTax->ViewCustomAttributes = "";

            // TempOrderNo
            $this->TempOrderNo->ViewValue = $this->TempOrderNo->CurrentValue;
            $this->TempOrderNo->ViewValue = FormatNumber($this->TempOrderNo->ViewValue, 0, -2, -2, -2);
            $this->TempOrderNo->ViewCustomAttributes = "";

            // TempOrderDate
            $this->TempOrderDate->ViewValue = $this->TempOrderDate->CurrentValue;
            $this->TempOrderDate->ViewValue = FormatDateTime($this->TempOrderDate->ViewValue, 0);
            $this->TempOrderDate->ViewCustomAttributes = "";

            // OrderUnit
            $this->OrderUnit->ViewValue = $this->OrderUnit->CurrentValue;
            $this->OrderUnit->ViewValue = FormatNumber($this->OrderUnit->ViewValue, 2, -2, -2, -2);
            $this->OrderUnit->ViewCustomAttributes = "";

            // OrderQuantity
            $this->OrderQuantity->ViewValue = $this->OrderQuantity->CurrentValue;
            $this->OrderQuantity->ViewValue = FormatNumber($this->OrderQuantity->ViewValue, 2, -2, -2, -2);
            $this->OrderQuantity->ViewCustomAttributes = "";

            // MarkForOrder
            $this->MarkForOrder->ViewValue = $this->MarkForOrder->CurrentValue;
            $this->MarkForOrder->ViewValue = FormatNumber($this->MarkForOrder->ViewValue, 0, -2, -2, -2);
            $this->MarkForOrder->ViewCustomAttributes = "";

            // OrderAllId
            $this->OrderAllId->ViewValue = $this->OrderAllId->CurrentValue;
            $this->OrderAllId->ViewValue = FormatNumber($this->OrderAllId->ViewValue, 0, -2, -2, -2);
            $this->OrderAllId->ViewCustomAttributes = "";

            // CalculateOrderQty
            $this->CalculateOrderQty->ViewValue = $this->CalculateOrderQty->CurrentValue;
            $this->CalculateOrderQty->ViewValue = FormatNumber($this->CalculateOrderQty->ViewValue, 2, -2, -2, -2);
            $this->CalculateOrderQty->ViewCustomAttributes = "";

            // SubLocation
            $this->SubLocation->ViewValue = $this->SubLocation->CurrentValue;
            $this->SubLocation->ViewCustomAttributes = "";

            // CategoryCode
            $this->CategoryCode->ViewValue = $this->CategoryCode->CurrentValue;
            $this->CategoryCode->ViewCustomAttributes = "";

            // SubCategory
            $this->SubCategory->ViewValue = $this->SubCategory->CurrentValue;
            $this->SubCategory->ViewCustomAttributes = "";

            // FlexCategoryCode
            $this->FlexCategoryCode->ViewValue = $this->FlexCategoryCode->CurrentValue;
            $this->FlexCategoryCode->ViewValue = FormatNumber($this->FlexCategoryCode->ViewValue, 0, -2, -2, -2);
            $this->FlexCategoryCode->ViewCustomAttributes = "";

            // ABCSaleQty
            $this->ABCSaleQty->ViewValue = $this->ABCSaleQty->CurrentValue;
            $this->ABCSaleQty->ViewValue = FormatNumber($this->ABCSaleQty->ViewValue, 2, -2, -2, -2);
            $this->ABCSaleQty->ViewCustomAttributes = "";

            // ABCSaleValue
            $this->ABCSaleValue->ViewValue = $this->ABCSaleValue->CurrentValue;
            $this->ABCSaleValue->ViewValue = FormatNumber($this->ABCSaleValue->ViewValue, 2, -2, -2, -2);
            $this->ABCSaleValue->ViewCustomAttributes = "";

            // ConvertionFactor
            $this->ConvertionFactor->ViewValue = $this->ConvertionFactor->CurrentValue;
            $this->ConvertionFactor->ViewValue = FormatNumber($this->ConvertionFactor->ViewValue, 0, -2, -2, -2);
            $this->ConvertionFactor->ViewCustomAttributes = "";

            // ConvertionUnitDesc
            $this->ConvertionUnitDesc->ViewValue = $this->ConvertionUnitDesc->CurrentValue;
            $this->ConvertionUnitDesc->ViewCustomAttributes = "";

            // TransactionId
            $this->TransactionId->ViewValue = $this->TransactionId->CurrentValue;
            $this->TransactionId->ViewValue = FormatNumber($this->TransactionId->ViewValue, 0, -2, -2, -2);
            $this->TransactionId->ViewCustomAttributes = "";

            // SoldProductId
            $this->SoldProductId->ViewValue = $this->SoldProductId->CurrentValue;
            $this->SoldProductId->ViewValue = FormatNumber($this->SoldProductId->ViewValue, 0, -2, -2, -2);
            $this->SoldProductId->ViewCustomAttributes = "";

            // WantedBookId
            $this->WantedBookId->ViewValue = $this->WantedBookId->CurrentValue;
            $this->WantedBookId->ViewValue = FormatNumber($this->WantedBookId->ViewValue, 0, -2, -2, -2);
            $this->WantedBookId->ViewCustomAttributes = "";

            // AllId
            $this->AllId->ViewValue = $this->AllId->CurrentValue;
            $this->AllId->ViewValue = FormatNumber($this->AllId->ViewValue, 0, -2, -2, -2);
            $this->AllId->ViewCustomAttributes = "";

            // BatchAndExpiryCompulsory
            $this->BatchAndExpiryCompulsory->ViewValue = $this->BatchAndExpiryCompulsory->CurrentValue;
            $this->BatchAndExpiryCompulsory->ViewValue = FormatNumber($this->BatchAndExpiryCompulsory->ViewValue, 0, -2, -2, -2);
            $this->BatchAndExpiryCompulsory->ViewCustomAttributes = "";

            // BatchStockForWantedBook
            $this->BatchStockForWantedBook->ViewValue = $this->BatchStockForWantedBook->CurrentValue;
            $this->BatchStockForWantedBook->ViewValue = FormatNumber($this->BatchStockForWantedBook->ViewValue, 0, -2, -2, -2);
            $this->BatchStockForWantedBook->ViewCustomAttributes = "";

            // UnitBasedBilling
            $this->UnitBasedBilling->ViewValue = $this->UnitBasedBilling->CurrentValue;
            $this->UnitBasedBilling->ViewValue = FormatNumber($this->UnitBasedBilling->ViewValue, 0, -2, -2, -2);
            $this->UnitBasedBilling->ViewCustomAttributes = "";

            // DoNotCheckStock
            $this->DoNotCheckStock->ViewValue = $this->DoNotCheckStock->CurrentValue;
            $this->DoNotCheckStock->ViewValue = FormatNumber($this->DoNotCheckStock->ViewValue, 0, -2, -2, -2);
            $this->DoNotCheckStock->ViewCustomAttributes = "";

            // AcceptRate
            $this->AcceptRate->ViewValue = $this->AcceptRate->CurrentValue;
            $this->AcceptRate->ViewValue = FormatNumber($this->AcceptRate->ViewValue, 0, -2, -2, -2);
            $this->AcceptRate->ViewCustomAttributes = "";

            // PriceLevel
            $this->PriceLevel->ViewValue = $this->PriceLevel->CurrentValue;
            $this->PriceLevel->ViewValue = FormatNumber($this->PriceLevel->ViewValue, 0, -2, -2, -2);
            $this->PriceLevel->ViewCustomAttributes = "";

            // LastQuotePrice
            $this->LastQuotePrice->ViewValue = $this->LastQuotePrice->CurrentValue;
            $this->LastQuotePrice->ViewValue = FormatNumber($this->LastQuotePrice->ViewValue, 2, -2, -2, -2);
            $this->LastQuotePrice->ViewCustomAttributes = "";

            // PriceChange
            $this->PriceChange->ViewValue = $this->PriceChange->CurrentValue;
            $this->PriceChange->ViewValue = FormatNumber($this->PriceChange->ViewValue, 2, -2, -2, -2);
            $this->PriceChange->ViewCustomAttributes = "";

            // CommodityCode
            $this->CommodityCode->ViewValue = $this->CommodityCode->CurrentValue;
            $this->CommodityCode->ViewCustomAttributes = "";

            // InstitutePrice
            $this->InstitutePrice->ViewValue = $this->InstitutePrice->CurrentValue;
            $this->InstitutePrice->ViewValue = FormatNumber($this->InstitutePrice->ViewValue, 2, -2, -2, -2);
            $this->InstitutePrice->ViewCustomAttributes = "";

            // CtrlOrDCtrlProduct
            $this->CtrlOrDCtrlProduct->ViewValue = $this->CtrlOrDCtrlProduct->CurrentValue;
            $this->CtrlOrDCtrlProduct->ViewValue = FormatNumber($this->CtrlOrDCtrlProduct->ViewValue, 0, -2, -2, -2);
            $this->CtrlOrDCtrlProduct->ViewCustomAttributes = "";

            // ImportedDate
            $this->ImportedDate->ViewValue = $this->ImportedDate->CurrentValue;
            $this->ImportedDate->ViewValue = FormatDateTime($this->ImportedDate->ViewValue, 0);
            $this->ImportedDate->ViewCustomAttributes = "";

            // IsImported
            $this->IsImported->ViewValue = $this->IsImported->CurrentValue;
            $this->IsImported->ViewValue = FormatNumber($this->IsImported->ViewValue, 0, -2, -2, -2);
            $this->IsImported->ViewCustomAttributes = "";

            // FileName
            $this->FileName->ViewValue = $this->FileName->CurrentValue;
            $this->FileName->ViewCustomAttributes = "";

            // LPName
            $this->LPName->ViewValue = $this->LPName->CurrentValue;
            $this->LPName->ViewCustomAttributes = "";

            // GodownNumber
            $this->GodownNumber->ViewValue = $this->GodownNumber->CurrentValue;
            $this->GodownNumber->ViewValue = FormatNumber($this->GodownNumber->ViewValue, 0, -2, -2, -2);
            $this->GodownNumber->ViewCustomAttributes = "";

            // CreationDate
            $this->CreationDate->ViewValue = $this->CreationDate->CurrentValue;
            $this->CreationDate->ViewValue = FormatDateTime($this->CreationDate->ViewValue, 0);
            $this->CreationDate->ViewCustomAttributes = "";

            // CreatedbyUser
            $this->CreatedbyUser->ViewValue = $this->CreatedbyUser->CurrentValue;
            $this->CreatedbyUser->ViewCustomAttributes = "";

            // ModifiedDate
            $this->ModifiedDate->ViewValue = $this->ModifiedDate->CurrentValue;
            $this->ModifiedDate->ViewValue = FormatDateTime($this->ModifiedDate->ViewValue, 0);
            $this->ModifiedDate->ViewCustomAttributes = "";

            // ModifiedbyUser
            $this->ModifiedbyUser->ViewValue = $this->ModifiedbyUser->CurrentValue;
            $this->ModifiedbyUser->ViewCustomAttributes = "";

            // isActive
            $this->isActive->ViewValue = $this->isActive->CurrentValue;
            $this->isActive->ViewValue = FormatNumber($this->isActive->ViewValue, 0, -2, -2, -2);
            $this->isActive->ViewCustomAttributes = "";

            // AllowExpiryClaim
            $this->AllowExpiryClaim->ViewValue = $this->AllowExpiryClaim->CurrentValue;
            $this->AllowExpiryClaim->ViewValue = FormatNumber($this->AllowExpiryClaim->ViewValue, 0, -2, -2, -2);
            $this->AllowExpiryClaim->ViewCustomAttributes = "";

            // BrandCode
            $this->BrandCode->ViewValue = $this->BrandCode->CurrentValue;
            $this->BrandCode->ViewValue = FormatNumber($this->BrandCode->ViewValue, 0, -2, -2, -2);
            $this->BrandCode->ViewCustomAttributes = "";

            // FreeSchemeBasedon
            $this->FreeSchemeBasedon->ViewValue = $this->FreeSchemeBasedon->CurrentValue;
            $this->FreeSchemeBasedon->ViewValue = FormatNumber($this->FreeSchemeBasedon->ViewValue, 0, -2, -2, -2);
            $this->FreeSchemeBasedon->ViewCustomAttributes = "";

            // DoNotCheckCostInBill
            $this->DoNotCheckCostInBill->ViewValue = $this->DoNotCheckCostInBill->CurrentValue;
            $this->DoNotCheckCostInBill->ViewValue = FormatNumber($this->DoNotCheckCostInBill->ViewValue, 0, -2, -2, -2);
            $this->DoNotCheckCostInBill->ViewCustomAttributes = "";

            // ProductGroupCode
            $this->ProductGroupCode->ViewValue = $this->ProductGroupCode->CurrentValue;
            $this->ProductGroupCode->ViewValue = FormatNumber($this->ProductGroupCode->ViewValue, 0, -2, -2, -2);
            $this->ProductGroupCode->ViewCustomAttributes = "";

            // ProductStrengthCode
            $this->ProductStrengthCode->ViewValue = $this->ProductStrengthCode->CurrentValue;
            $this->ProductStrengthCode->ViewValue = FormatNumber($this->ProductStrengthCode->ViewValue, 0, -2, -2, -2);
            $this->ProductStrengthCode->ViewCustomAttributes = "";

            // PackingCode
            $this->PackingCode->ViewValue = $this->PackingCode->CurrentValue;
            $this->PackingCode->ViewValue = FormatNumber($this->PackingCode->ViewValue, 0, -2, -2, -2);
            $this->PackingCode->ViewCustomAttributes = "";

            // ComputedMinStock
            $this->ComputedMinStock->ViewValue = $this->ComputedMinStock->CurrentValue;
            $this->ComputedMinStock->ViewValue = FormatNumber($this->ComputedMinStock->ViewValue, 2, -2, -2, -2);
            $this->ComputedMinStock->ViewCustomAttributes = "";

            // ComputedMaxStock
            $this->ComputedMaxStock->ViewValue = $this->ComputedMaxStock->CurrentValue;
            $this->ComputedMaxStock->ViewValue = FormatNumber($this->ComputedMaxStock->ViewValue, 2, -2, -2, -2);
            $this->ComputedMaxStock->ViewCustomAttributes = "";

            // ProductRemark
            $this->ProductRemark->ViewValue = $this->ProductRemark->CurrentValue;
            $this->ProductRemark->ViewValue = FormatNumber($this->ProductRemark->ViewValue, 0, -2, -2, -2);
            $this->ProductRemark->ViewCustomAttributes = "";

            // ProductDrugCode
            $this->ProductDrugCode->ViewValue = $this->ProductDrugCode->CurrentValue;
            $this->ProductDrugCode->ViewValue = FormatNumber($this->ProductDrugCode->ViewValue, 0, -2, -2, -2);
            $this->ProductDrugCode->ViewCustomAttributes = "";

            // IsMatrixProduct
            $this->IsMatrixProduct->ViewValue = $this->IsMatrixProduct->CurrentValue;
            $this->IsMatrixProduct->ViewValue = FormatNumber($this->IsMatrixProduct->ViewValue, 0, -2, -2, -2);
            $this->IsMatrixProduct->ViewCustomAttributes = "";

            // AttributeCount1
            $this->AttributeCount1->ViewValue = $this->AttributeCount1->CurrentValue;
            $this->AttributeCount1->ViewValue = FormatNumber($this->AttributeCount1->ViewValue, 0, -2, -2, -2);
            $this->AttributeCount1->ViewCustomAttributes = "";

            // AttributeCount2
            $this->AttributeCount2->ViewValue = $this->AttributeCount2->CurrentValue;
            $this->AttributeCount2->ViewValue = FormatNumber($this->AttributeCount2->ViewValue, 0, -2, -2, -2);
            $this->AttributeCount2->ViewCustomAttributes = "";

            // AttributeCount3
            $this->AttributeCount3->ViewValue = $this->AttributeCount3->CurrentValue;
            $this->AttributeCount3->ViewValue = FormatNumber($this->AttributeCount3->ViewValue, 0, -2, -2, -2);
            $this->AttributeCount3->ViewCustomAttributes = "";

            // AttributeCount4
            $this->AttributeCount4->ViewValue = $this->AttributeCount4->CurrentValue;
            $this->AttributeCount4->ViewValue = FormatNumber($this->AttributeCount4->ViewValue, 0, -2, -2, -2);
            $this->AttributeCount4->ViewCustomAttributes = "";

            // AttributeCount5
            $this->AttributeCount5->ViewValue = $this->AttributeCount5->CurrentValue;
            $this->AttributeCount5->ViewValue = FormatNumber($this->AttributeCount5->ViewValue, 0, -2, -2, -2);
            $this->AttributeCount5->ViewCustomAttributes = "";

            // DefaultDiscountPercentage
            $this->DefaultDiscountPercentage->ViewValue = $this->DefaultDiscountPercentage->CurrentValue;
            $this->DefaultDiscountPercentage->ViewValue = FormatNumber($this->DefaultDiscountPercentage->ViewValue, 2, -2, -2, -2);
            $this->DefaultDiscountPercentage->ViewCustomAttributes = "";

            // DonotPrintBarcode
            $this->DonotPrintBarcode->ViewValue = $this->DonotPrintBarcode->CurrentValue;
            $this->DonotPrintBarcode->ViewValue = FormatNumber($this->DonotPrintBarcode->ViewValue, 0, -2, -2, -2);
            $this->DonotPrintBarcode->ViewCustomAttributes = "";

            // ProductLevelDiscount
            $this->ProductLevelDiscount->ViewValue = $this->ProductLevelDiscount->CurrentValue;
            $this->ProductLevelDiscount->ViewValue = FormatNumber($this->ProductLevelDiscount->ViewValue, 0, -2, -2, -2);
            $this->ProductLevelDiscount->ViewCustomAttributes = "";

            // Markup
            $this->Markup->ViewValue = $this->Markup->CurrentValue;
            $this->Markup->ViewValue = FormatNumber($this->Markup->ViewValue, 2, -2, -2, -2);
            $this->Markup->ViewCustomAttributes = "";

            // MarkDown
            $this->MarkDown->ViewValue = $this->MarkDown->CurrentValue;
            $this->MarkDown->ViewValue = FormatNumber($this->MarkDown->ViewValue, 2, -2, -2, -2);
            $this->MarkDown->ViewCustomAttributes = "";

            // ReworkSalePrice
            $this->ReworkSalePrice->ViewValue = $this->ReworkSalePrice->CurrentValue;
            $this->ReworkSalePrice->ViewValue = FormatNumber($this->ReworkSalePrice->ViewValue, 0, -2, -2, -2);
            $this->ReworkSalePrice->ViewCustomAttributes = "";

            // MultipleInput
            $this->MultipleInput->ViewValue = $this->MultipleInput->CurrentValue;
            $this->MultipleInput->ViewValue = FormatNumber($this->MultipleInput->ViewValue, 0, -2, -2, -2);
            $this->MultipleInput->ViewCustomAttributes = "";

            // LpPackageInformation
            $this->LpPackageInformation->ViewValue = $this->LpPackageInformation->CurrentValue;
            $this->LpPackageInformation->ViewCustomAttributes = "";

            // AllowNegativeStock
            $this->AllowNegativeStock->ViewValue = $this->AllowNegativeStock->CurrentValue;
            $this->AllowNegativeStock->ViewValue = FormatNumber($this->AllowNegativeStock->ViewValue, 0, -2, -2, -2);
            $this->AllowNegativeStock->ViewCustomAttributes = "";

            // OrderDate
            $this->OrderDate->ViewValue = $this->OrderDate->CurrentValue;
            $this->OrderDate->ViewValue = FormatDateTime($this->OrderDate->ViewValue, 0);
            $this->OrderDate->ViewCustomAttributes = "";

            // OrderTime
            $this->OrderTime->ViewValue = $this->OrderTime->CurrentValue;
            $this->OrderTime->ViewValue = FormatDateTime($this->OrderTime->ViewValue, 0);
            $this->OrderTime->ViewCustomAttributes = "";

            // RateGroupCode
            $this->RateGroupCode->ViewValue = $this->RateGroupCode->CurrentValue;
            $this->RateGroupCode->ViewValue = FormatNumber($this->RateGroupCode->ViewValue, 0, -2, -2, -2);
            $this->RateGroupCode->ViewCustomAttributes = "";

            // ConversionCaseLot
            $this->ConversionCaseLot->ViewValue = $this->ConversionCaseLot->CurrentValue;
            $this->ConversionCaseLot->ViewValue = FormatNumber($this->ConversionCaseLot->ViewValue, 0, -2, -2, -2);
            $this->ConversionCaseLot->ViewCustomAttributes = "";

            // ShippingLot
            $this->ShippingLot->ViewValue = $this->ShippingLot->CurrentValue;
            $this->ShippingLot->ViewCustomAttributes = "";

            // AllowExpiryReplacement
            $this->AllowExpiryReplacement->ViewValue = $this->AllowExpiryReplacement->CurrentValue;
            $this->AllowExpiryReplacement->ViewValue = FormatNumber($this->AllowExpiryReplacement->ViewValue, 0, -2, -2, -2);
            $this->AllowExpiryReplacement->ViewCustomAttributes = "";

            // NoOfMonthExpiryAllowed
            $this->NoOfMonthExpiryAllowed->ViewValue = $this->NoOfMonthExpiryAllowed->CurrentValue;
            $this->NoOfMonthExpiryAllowed->ViewValue = FormatNumber($this->NoOfMonthExpiryAllowed->ViewValue, 0, -2, -2, -2);
            $this->NoOfMonthExpiryAllowed->ViewCustomAttributes = "";

            // ProductDiscountEligibility
            $this->ProductDiscountEligibility->ViewValue = $this->ProductDiscountEligibility->CurrentValue;
            $this->ProductDiscountEligibility->ViewValue = FormatNumber($this->ProductDiscountEligibility->ViewValue, 0, -2, -2, -2);
            $this->ProductDiscountEligibility->ViewCustomAttributes = "";

            // ScheduleTypeCode
            $this->ScheduleTypeCode->ViewValue = $this->ScheduleTypeCode->CurrentValue;
            $this->ScheduleTypeCode->ViewValue = FormatNumber($this->ScheduleTypeCode->ViewValue, 0, -2, -2, -2);
            $this->ScheduleTypeCode->ViewCustomAttributes = "";

            // AIOCDProductCode
            $this->AIOCDProductCode->ViewValue = $this->AIOCDProductCode->CurrentValue;
            $this->AIOCDProductCode->ViewCustomAttributes = "";

            // FreeQuantity
            $this->FreeQuantity->ViewValue = $this->FreeQuantity->CurrentValue;
            $this->FreeQuantity->ViewValue = FormatNumber($this->FreeQuantity->ViewValue, 2, -2, -2, -2);
            $this->FreeQuantity->ViewCustomAttributes = "";

            // DiscountType
            $this->DiscountType->ViewValue = $this->DiscountType->CurrentValue;
            $this->DiscountType->ViewValue = FormatNumber($this->DiscountType->ViewValue, 0, -2, -2, -2);
            $this->DiscountType->ViewCustomAttributes = "";

            // DiscountValue
            $this->DiscountValue->ViewValue = $this->DiscountValue->CurrentValue;
            $this->DiscountValue->ViewValue = FormatNumber($this->DiscountValue->ViewValue, 2, -2, -2, -2);
            $this->DiscountValue->ViewCustomAttributes = "";

            // HasProductOrderAttribute
            $this->HasProductOrderAttribute->ViewValue = $this->HasProductOrderAttribute->CurrentValue;
            $this->HasProductOrderAttribute->ViewValue = FormatNumber($this->HasProductOrderAttribute->ViewValue, 0, -2, -2, -2);
            $this->HasProductOrderAttribute->ViewCustomAttributes = "";

            // FirstPODate
            $this->FirstPODate->ViewValue = $this->FirstPODate->CurrentValue;
            $this->FirstPODate->ViewValue = FormatDateTime($this->FirstPODate->ViewValue, 0);
            $this->FirstPODate->ViewCustomAttributes = "";

            // SaleprcieAndMrpCalcPercent
            $this->SaleprcieAndMrpCalcPercent->ViewValue = $this->SaleprcieAndMrpCalcPercent->CurrentValue;
            $this->SaleprcieAndMrpCalcPercent->ViewValue = FormatNumber($this->SaleprcieAndMrpCalcPercent->ViewValue, 2, -2, -2, -2);
            $this->SaleprcieAndMrpCalcPercent->ViewCustomAttributes = "";

            // IsGiftVoucherProducts
            $this->IsGiftVoucherProducts->ViewValue = $this->IsGiftVoucherProducts->CurrentValue;
            $this->IsGiftVoucherProducts->ViewValue = FormatNumber($this->IsGiftVoucherProducts->ViewValue, 0, -2, -2, -2);
            $this->IsGiftVoucherProducts->ViewCustomAttributes = "";

            // AcceptRange4SerialNumber
            $this->AcceptRange4SerialNumber->ViewValue = $this->AcceptRange4SerialNumber->CurrentValue;
            $this->AcceptRange4SerialNumber->ViewValue = FormatNumber($this->AcceptRange4SerialNumber->ViewValue, 0, -2, -2, -2);
            $this->AcceptRange4SerialNumber->ViewCustomAttributes = "";

            // GiftVoucherDenomination
            $this->GiftVoucherDenomination->ViewValue = $this->GiftVoucherDenomination->CurrentValue;
            $this->GiftVoucherDenomination->ViewValue = FormatNumber($this->GiftVoucherDenomination->ViewValue, 0, -2, -2, -2);
            $this->GiftVoucherDenomination->ViewCustomAttributes = "";

            // Subclasscode
            $this->Subclasscode->ViewValue = $this->Subclasscode->CurrentValue;
            $this->Subclasscode->ViewCustomAttributes = "";

            // BarCodeFromWeighingMachine
            $this->BarCodeFromWeighingMachine->ViewValue = $this->BarCodeFromWeighingMachine->CurrentValue;
            $this->BarCodeFromWeighingMachine->ViewValue = FormatNumber($this->BarCodeFromWeighingMachine->ViewValue, 0, -2, -2, -2);
            $this->BarCodeFromWeighingMachine->ViewCustomAttributes = "";

            // CheckCostInReturn
            $this->CheckCostInReturn->ViewValue = $this->CheckCostInReturn->CurrentValue;
            $this->CheckCostInReturn->ViewValue = FormatNumber($this->CheckCostInReturn->ViewValue, 0, -2, -2, -2);
            $this->CheckCostInReturn->ViewCustomAttributes = "";

            // FrequentSaleProduct
            $this->FrequentSaleProduct->ViewValue = $this->FrequentSaleProduct->CurrentValue;
            $this->FrequentSaleProduct->ViewValue = FormatNumber($this->FrequentSaleProduct->ViewValue, 0, -2, -2, -2);
            $this->FrequentSaleProduct->ViewCustomAttributes = "";

            // RateType
            $this->RateType->ViewValue = $this->RateType->CurrentValue;
            $this->RateType->ViewValue = FormatNumber($this->RateType->ViewValue, 0, -2, -2, -2);
            $this->RateType->ViewCustomAttributes = "";

            // TouchscreenName
            $this->TouchscreenName->ViewValue = $this->TouchscreenName->CurrentValue;
            $this->TouchscreenName->ViewCustomAttributes = "";

            // FreeType
            $this->FreeType->ViewValue = $this->FreeType->CurrentValue;
            $this->FreeType->ViewValue = FormatNumber($this->FreeType->ViewValue, 0, -2, -2, -2);
            $this->FreeType->ViewCustomAttributes = "";

            // LooseQtyasNewBatch
            $this->LooseQtyasNewBatch->ViewValue = $this->LooseQtyasNewBatch->CurrentValue;
            $this->LooseQtyasNewBatch->ViewValue = FormatNumber($this->LooseQtyasNewBatch->ViewValue, 0, -2, -2, -2);
            $this->LooseQtyasNewBatch->ViewCustomAttributes = "";

            // AllowSlabBilling
            $this->AllowSlabBilling->ViewValue = $this->AllowSlabBilling->CurrentValue;
            $this->AllowSlabBilling->ViewValue = FormatNumber($this->AllowSlabBilling->ViewValue, 0, -2, -2, -2);
            $this->AllowSlabBilling->ViewCustomAttributes = "";

            // ProductTypeForProduction
            $this->ProductTypeForProduction->ViewValue = $this->ProductTypeForProduction->CurrentValue;
            $this->ProductTypeForProduction->ViewValue = FormatNumber($this->ProductTypeForProduction->ViewValue, 0, -2, -2, -2);
            $this->ProductTypeForProduction->ViewCustomAttributes = "";

            // RecipeCode
            $this->RecipeCode->ViewValue = $this->RecipeCode->CurrentValue;
            $this->RecipeCode->ViewValue = FormatNumber($this->RecipeCode->ViewValue, 0, -2, -2, -2);
            $this->RecipeCode->ViewCustomAttributes = "";

            // DefaultUnitType
            $this->DefaultUnitType->ViewValue = $this->DefaultUnitType->CurrentValue;
            $this->DefaultUnitType->ViewValue = FormatNumber($this->DefaultUnitType->ViewValue, 0, -2, -2, -2);
            $this->DefaultUnitType->ViewCustomAttributes = "";

            // PIstatus
            $this->PIstatus->ViewValue = $this->PIstatus->CurrentValue;
            $this->PIstatus->ViewValue = FormatNumber($this->PIstatus->ViewValue, 0, -2, -2, -2);
            $this->PIstatus->ViewCustomAttributes = "";

            // LastPiConfirmedDate
            $this->LastPiConfirmedDate->ViewValue = $this->LastPiConfirmedDate->CurrentValue;
            $this->LastPiConfirmedDate->ViewValue = FormatDateTime($this->LastPiConfirmedDate->ViewValue, 0);
            $this->LastPiConfirmedDate->ViewCustomAttributes = "";

            // BarCodeDesign
            $this->BarCodeDesign->ViewValue = $this->BarCodeDesign->CurrentValue;
            $this->BarCodeDesign->ViewCustomAttributes = "";

            // AcceptRemarksInBill
            $this->AcceptRemarksInBill->ViewValue = $this->AcceptRemarksInBill->CurrentValue;
            $this->AcceptRemarksInBill->ViewValue = FormatNumber($this->AcceptRemarksInBill->ViewValue, 0, -2, -2, -2);
            $this->AcceptRemarksInBill->ViewCustomAttributes = "";

            // Classification
            $this->Classification->ViewValue = $this->Classification->CurrentValue;
            $this->Classification->ViewValue = FormatNumber($this->Classification->ViewValue, 0, -2, -2, -2);
            $this->Classification->ViewCustomAttributes = "";

            // TimeSlot
            $this->TimeSlot->ViewValue = $this->TimeSlot->CurrentValue;
            $this->TimeSlot->ViewValue = FormatNumber($this->TimeSlot->ViewValue, 0, -2, -2, -2);
            $this->TimeSlot->ViewCustomAttributes = "";

            // IsBundle
            $this->IsBundle->ViewValue = $this->IsBundle->CurrentValue;
            $this->IsBundle->ViewValue = FormatNumber($this->IsBundle->ViewValue, 0, -2, -2, -2);
            $this->IsBundle->ViewCustomAttributes = "";

            // ColorCode
            $this->ColorCode->ViewValue = $this->ColorCode->CurrentValue;
            $this->ColorCode->ViewValue = FormatNumber($this->ColorCode->ViewValue, 0, -2, -2, -2);
            $this->ColorCode->ViewCustomAttributes = "";

            // GenderCode
            $this->GenderCode->ViewValue = $this->GenderCode->CurrentValue;
            $this->GenderCode->ViewValue = FormatNumber($this->GenderCode->ViewValue, 0, -2, -2, -2);
            $this->GenderCode->ViewCustomAttributes = "";

            // SizeCode
            $this->SizeCode->ViewValue = $this->SizeCode->CurrentValue;
            $this->SizeCode->ViewValue = FormatNumber($this->SizeCode->ViewValue, 0, -2, -2, -2);
            $this->SizeCode->ViewCustomAttributes = "";

            // GiftCard
            $this->GiftCard->ViewValue = $this->GiftCard->CurrentValue;
            $this->GiftCard->ViewValue = FormatNumber($this->GiftCard->ViewValue, 0, -2, -2, -2);
            $this->GiftCard->ViewCustomAttributes = "";

            // ToonLabel
            $this->ToonLabel->ViewValue = $this->ToonLabel->CurrentValue;
            $this->ToonLabel->ViewValue = FormatNumber($this->ToonLabel->ViewValue, 0, -2, -2, -2);
            $this->ToonLabel->ViewCustomAttributes = "";

            // GarmentType
            $this->GarmentType->ViewValue = $this->GarmentType->CurrentValue;
            $this->GarmentType->ViewValue = FormatNumber($this->GarmentType->ViewValue, 0, -2, -2, -2);
            $this->GarmentType->ViewCustomAttributes = "";

            // AgeGroup
            $this->AgeGroup->ViewValue = $this->AgeGroup->CurrentValue;
            $this->AgeGroup->ViewValue = FormatNumber($this->AgeGroup->ViewValue, 0, -2, -2, -2);
            $this->AgeGroup->ViewCustomAttributes = "";

            // Season
            $this->Season->ViewValue = $this->Season->CurrentValue;
            $this->Season->ViewValue = FormatNumber($this->Season->ViewValue, 0, -2, -2, -2);
            $this->Season->ViewCustomAttributes = "";

            // DailyStockEntry
            $this->DailyStockEntry->ViewValue = $this->DailyStockEntry->CurrentValue;
            $this->DailyStockEntry->ViewValue = FormatNumber($this->DailyStockEntry->ViewValue, 0, -2, -2, -2);
            $this->DailyStockEntry->ViewCustomAttributes = "";

            // ModifierApplicable
            $this->ModifierApplicable->ViewValue = $this->ModifierApplicable->CurrentValue;
            $this->ModifierApplicable->ViewValue = FormatNumber($this->ModifierApplicable->ViewValue, 0, -2, -2, -2);
            $this->ModifierApplicable->ViewCustomAttributes = "";

            // ModifierType
            $this->ModifierType->ViewValue = $this->ModifierType->CurrentValue;
            $this->ModifierType->ViewValue = FormatNumber($this->ModifierType->ViewValue, 0, -2, -2, -2);
            $this->ModifierType->ViewCustomAttributes = "";

            // AcceptZeroRate
            $this->AcceptZeroRate->ViewValue = $this->AcceptZeroRate->CurrentValue;
            $this->AcceptZeroRate->ViewValue = FormatNumber($this->AcceptZeroRate->ViewValue, 0, -2, -2, -2);
            $this->AcceptZeroRate->ViewCustomAttributes = "";

            // ExciseDutyCode
            $this->ExciseDutyCode->ViewValue = $this->ExciseDutyCode->CurrentValue;
            $this->ExciseDutyCode->ViewValue = FormatNumber($this->ExciseDutyCode->ViewValue, 0, -2, -2, -2);
            $this->ExciseDutyCode->ViewCustomAttributes = "";

            // IndentProductGroupCode
            $this->IndentProductGroupCode->ViewValue = $this->IndentProductGroupCode->CurrentValue;
            $this->IndentProductGroupCode->ViewValue = FormatNumber($this->IndentProductGroupCode->ViewValue, 0, -2, -2, -2);
            $this->IndentProductGroupCode->ViewCustomAttributes = "";

            // IsMultiBatch
            $this->IsMultiBatch->ViewValue = $this->IsMultiBatch->CurrentValue;
            $this->IsMultiBatch->ViewValue = FormatNumber($this->IsMultiBatch->ViewValue, 0, -2, -2, -2);
            $this->IsMultiBatch->ViewCustomAttributes = "";

            // IsSingleBatch
            $this->IsSingleBatch->ViewValue = $this->IsSingleBatch->CurrentValue;
            $this->IsSingleBatch->ViewValue = FormatNumber($this->IsSingleBatch->ViewValue, 0, -2, -2, -2);
            $this->IsSingleBatch->ViewCustomAttributes = "";

            // MarkUpRate1
            $this->MarkUpRate1->ViewValue = $this->MarkUpRate1->CurrentValue;
            $this->MarkUpRate1->ViewValue = FormatNumber($this->MarkUpRate1->ViewValue, 2, -2, -2, -2);
            $this->MarkUpRate1->ViewCustomAttributes = "";

            // MarkDownRate1
            $this->MarkDownRate1->ViewValue = $this->MarkDownRate1->CurrentValue;
            $this->MarkDownRate1->ViewValue = FormatNumber($this->MarkDownRate1->ViewValue, 2, -2, -2, -2);
            $this->MarkDownRate1->ViewCustomAttributes = "";

            // MarkUpRate2
            $this->MarkUpRate2->ViewValue = $this->MarkUpRate2->CurrentValue;
            $this->MarkUpRate2->ViewValue = FormatNumber($this->MarkUpRate2->ViewValue, 2, -2, -2, -2);
            $this->MarkUpRate2->ViewCustomAttributes = "";

            // MarkDownRate2
            $this->MarkDownRate2->ViewValue = $this->MarkDownRate2->CurrentValue;
            $this->MarkDownRate2->ViewValue = FormatNumber($this->MarkDownRate2->ViewValue, 2, -2, -2, -2);
            $this->MarkDownRate2->ViewCustomAttributes = "";

            // Yield
            $this->_Yield->ViewValue = $this->_Yield->CurrentValue;
            $this->_Yield->ViewValue = FormatNumber($this->_Yield->ViewValue, 2, -2, -2, -2);
            $this->_Yield->ViewCustomAttributes = "";

            // RefProductCode
            $this->RefProductCode->ViewValue = $this->RefProductCode->CurrentValue;
            $this->RefProductCode->ViewValue = FormatNumber($this->RefProductCode->ViewValue, 0, -2, -2, -2);
            $this->RefProductCode->ViewCustomAttributes = "";

            // Volume
            $this->Volume->ViewValue = $this->Volume->CurrentValue;
            $this->Volume->ViewValue = FormatNumber($this->Volume->ViewValue, 2, -2, -2, -2);
            $this->Volume->ViewCustomAttributes = "";

            // MeasurementID
            $this->MeasurementID->ViewValue = $this->MeasurementID->CurrentValue;
            $this->MeasurementID->ViewValue = FormatNumber($this->MeasurementID->ViewValue, 0, -2, -2, -2);
            $this->MeasurementID->ViewCustomAttributes = "";

            // CountryCode
            $this->CountryCode->ViewValue = $this->CountryCode->CurrentValue;
            $this->CountryCode->ViewValue = FormatNumber($this->CountryCode->ViewValue, 0, -2, -2, -2);
            $this->CountryCode->ViewCustomAttributes = "";

            // AcceptWMQty
            $this->AcceptWMQty->ViewValue = $this->AcceptWMQty->CurrentValue;
            $this->AcceptWMQty->ViewValue = FormatNumber($this->AcceptWMQty->ViewValue, 0, -2, -2, -2);
            $this->AcceptWMQty->ViewCustomAttributes = "";

            // SingleBatchBasedOnRate
            $this->SingleBatchBasedOnRate->ViewValue = $this->SingleBatchBasedOnRate->CurrentValue;
            $this->SingleBatchBasedOnRate->ViewValue = FormatNumber($this->SingleBatchBasedOnRate->ViewValue, 0, -2, -2, -2);
            $this->SingleBatchBasedOnRate->ViewCustomAttributes = "";

            // TenderNo
            $this->TenderNo->ViewValue = $this->TenderNo->CurrentValue;
            $this->TenderNo->ViewCustomAttributes = "";

            // SingleBillMaximumSoldQtyFiled
            $this->SingleBillMaximumSoldQtyFiled->ViewValue = $this->SingleBillMaximumSoldQtyFiled->CurrentValue;
            $this->SingleBillMaximumSoldQtyFiled->ViewValue = FormatNumber($this->SingleBillMaximumSoldQtyFiled->ViewValue, 2, -2, -2, -2);
            $this->SingleBillMaximumSoldQtyFiled->ViewCustomAttributes = "";

            // Strength1
            $this->Strength1->ViewValue = $this->Strength1->CurrentValue;
            $this->Strength1->ViewCustomAttributes = "";

            // Strength2
            $this->Strength2->ViewValue = $this->Strength2->CurrentValue;
            $this->Strength2->ViewCustomAttributes = "";

            // Strength3
            $this->Strength3->ViewValue = $this->Strength3->CurrentValue;
            $this->Strength3->ViewCustomAttributes = "";

            // Strength4
            $this->Strength4->ViewValue = $this->Strength4->CurrentValue;
            $this->Strength4->ViewCustomAttributes = "";

            // Strength5
            $this->Strength5->ViewValue = $this->Strength5->CurrentValue;
            $this->Strength5->ViewCustomAttributes = "";

            // IngredientCode1
            $this->IngredientCode1->ViewValue = $this->IngredientCode1->CurrentValue;
            $this->IngredientCode1->ViewValue = FormatNumber($this->IngredientCode1->ViewValue, 0, -2, -2, -2);
            $this->IngredientCode1->ViewCustomAttributes = "";

            // IngredientCode2
            $this->IngredientCode2->ViewValue = $this->IngredientCode2->CurrentValue;
            $this->IngredientCode2->ViewValue = FormatNumber($this->IngredientCode2->ViewValue, 0, -2, -2, -2);
            $this->IngredientCode2->ViewCustomAttributes = "";

            // IngredientCode3
            $this->IngredientCode3->ViewValue = $this->IngredientCode3->CurrentValue;
            $this->IngredientCode3->ViewValue = FormatNumber($this->IngredientCode3->ViewValue, 0, -2, -2, -2);
            $this->IngredientCode3->ViewCustomAttributes = "";

            // IngredientCode4
            $this->IngredientCode4->ViewValue = $this->IngredientCode4->CurrentValue;
            $this->IngredientCode4->ViewValue = FormatNumber($this->IngredientCode4->ViewValue, 0, -2, -2, -2);
            $this->IngredientCode4->ViewCustomAttributes = "";

            // IngredientCode5
            $this->IngredientCode5->ViewValue = $this->IngredientCode5->CurrentValue;
            $this->IngredientCode5->ViewValue = FormatNumber($this->IngredientCode5->ViewValue, 0, -2, -2, -2);
            $this->IngredientCode5->ViewCustomAttributes = "";

            // OrderType
            $this->OrderType->ViewValue = $this->OrderType->CurrentValue;
            $this->OrderType->ViewValue = FormatNumber($this->OrderType->ViewValue, 0, -2, -2, -2);
            $this->OrderType->ViewCustomAttributes = "";

            // StockUOM
            $this->StockUOM->ViewValue = $this->StockUOM->CurrentValue;
            $this->StockUOM->ViewValue = FormatNumber($this->StockUOM->ViewValue, 0, -2, -2, -2);
            $this->StockUOM->ViewCustomAttributes = "";

            // PriceUOM
            $this->PriceUOM->ViewValue = $this->PriceUOM->CurrentValue;
            $this->PriceUOM->ViewValue = FormatNumber($this->PriceUOM->ViewValue, 0, -2, -2, -2);
            $this->PriceUOM->ViewCustomAttributes = "";

            // DefaultSaleUOM
            $this->DefaultSaleUOM->ViewValue = $this->DefaultSaleUOM->CurrentValue;
            $this->DefaultSaleUOM->ViewValue = FormatNumber($this->DefaultSaleUOM->ViewValue, 0, -2, -2, -2);
            $this->DefaultSaleUOM->ViewCustomAttributes = "";

            // DefaultPurchaseUOM
            $this->DefaultPurchaseUOM->ViewValue = $this->DefaultPurchaseUOM->CurrentValue;
            $this->DefaultPurchaseUOM->ViewValue = FormatNumber($this->DefaultPurchaseUOM->ViewValue, 0, -2, -2, -2);
            $this->DefaultPurchaseUOM->ViewCustomAttributes = "";

            // ReportingUOM
            $this->ReportingUOM->ViewValue = $this->ReportingUOM->CurrentValue;
            $this->ReportingUOM->ViewValue = FormatNumber($this->ReportingUOM->ViewValue, 0, -2, -2, -2);
            $this->ReportingUOM->ViewCustomAttributes = "";

            // LastPurchasedUOM
            $this->LastPurchasedUOM->ViewValue = $this->LastPurchasedUOM->CurrentValue;
            $this->LastPurchasedUOM->ViewValue = FormatNumber($this->LastPurchasedUOM->ViewValue, 0, -2, -2, -2);
            $this->LastPurchasedUOM->ViewCustomAttributes = "";

            // TreatmentCodes
            $this->TreatmentCodes->ViewValue = $this->TreatmentCodes->CurrentValue;
            $this->TreatmentCodes->ViewCustomAttributes = "";

            // InsuranceType
            $this->InsuranceType->ViewValue = $this->InsuranceType->CurrentValue;
            $this->InsuranceType->ViewValue = FormatNumber($this->InsuranceType->ViewValue, 0, -2, -2, -2);
            $this->InsuranceType->ViewCustomAttributes = "";

            // CoverageGroupCodes
            $this->CoverageGroupCodes->ViewValue = $this->CoverageGroupCodes->CurrentValue;
            $this->CoverageGroupCodes->ViewCustomAttributes = "";

            // MultipleUOM
            $this->MultipleUOM->ViewValue = $this->MultipleUOM->CurrentValue;
            $this->MultipleUOM->ViewValue = FormatNumber($this->MultipleUOM->ViewValue, 0, -2, -2, -2);
            $this->MultipleUOM->ViewCustomAttributes = "";

            // SalePriceComputation
            $this->SalePriceComputation->ViewValue = $this->SalePriceComputation->CurrentValue;
            $this->SalePriceComputation->ViewValue = FormatNumber($this->SalePriceComputation->ViewValue, 0, -2, -2, -2);
            $this->SalePriceComputation->ViewCustomAttributes = "";

            // StockCorrection
            $this->StockCorrection->ViewValue = $this->StockCorrection->CurrentValue;
            $this->StockCorrection->ViewValue = FormatNumber($this->StockCorrection->ViewValue, 0, -2, -2, -2);
            $this->StockCorrection->ViewCustomAttributes = "";

            // LBTPercentage
            $this->LBTPercentage->ViewValue = $this->LBTPercentage->CurrentValue;
            $this->LBTPercentage->ViewValue = FormatNumber($this->LBTPercentage->ViewValue, 2, -2, -2, -2);
            $this->LBTPercentage->ViewCustomAttributes = "";

            // SalesCommission
            $this->SalesCommission->ViewValue = $this->SalesCommission->CurrentValue;
            $this->SalesCommission->ViewValue = FormatNumber($this->SalesCommission->ViewValue, 2, -2, -2, -2);
            $this->SalesCommission->ViewCustomAttributes = "";

            // LockedStock
            $this->LockedStock->ViewValue = $this->LockedStock->CurrentValue;
            $this->LockedStock->ViewValue = FormatNumber($this->LockedStock->ViewValue, 2, -2, -2, -2);
            $this->LockedStock->ViewCustomAttributes = "";

            // MinMaxUOM
            $this->MinMaxUOM->ViewValue = $this->MinMaxUOM->CurrentValue;
            $this->MinMaxUOM->ViewValue = FormatNumber($this->MinMaxUOM->ViewValue, 0, -2, -2, -2);
            $this->MinMaxUOM->ViewCustomAttributes = "";

            // ExpiryMfrDateFormat
            $this->ExpiryMfrDateFormat->ViewValue = $this->ExpiryMfrDateFormat->CurrentValue;
            $this->ExpiryMfrDateFormat->ViewValue = FormatNumber($this->ExpiryMfrDateFormat->ViewValue, 0, -2, -2, -2);
            $this->ExpiryMfrDateFormat->ViewCustomAttributes = "";

            // ProductLifeTime
            $this->ProductLifeTime->ViewValue = $this->ProductLifeTime->CurrentValue;
            $this->ProductLifeTime->ViewValue = FormatNumber($this->ProductLifeTime->ViewValue, 0, -2, -2, -2);
            $this->ProductLifeTime->ViewCustomAttributes = "";

            // IsCombo
            $this->IsCombo->ViewValue = $this->IsCombo->CurrentValue;
            $this->IsCombo->ViewValue = FormatNumber($this->IsCombo->ViewValue, 0, -2, -2, -2);
            $this->IsCombo->ViewCustomAttributes = "";

            // ComboTypeCode
            $this->ComboTypeCode->ViewValue = $this->ComboTypeCode->CurrentValue;
            $this->ComboTypeCode->ViewValue = FormatNumber($this->ComboTypeCode->ViewValue, 0, -2, -2, -2);
            $this->ComboTypeCode->ViewCustomAttributes = "";

            // AttributeCount6
            $this->AttributeCount6->ViewValue = $this->AttributeCount6->CurrentValue;
            $this->AttributeCount6->ViewValue = FormatNumber($this->AttributeCount6->ViewValue, 0, -2, -2, -2);
            $this->AttributeCount6->ViewCustomAttributes = "";

            // AttributeCount7
            $this->AttributeCount7->ViewValue = $this->AttributeCount7->CurrentValue;
            $this->AttributeCount7->ViewValue = FormatNumber($this->AttributeCount7->ViewValue, 0, -2, -2, -2);
            $this->AttributeCount7->ViewCustomAttributes = "";

            // AttributeCount8
            $this->AttributeCount8->ViewValue = $this->AttributeCount8->CurrentValue;
            $this->AttributeCount8->ViewValue = FormatNumber($this->AttributeCount8->ViewValue, 0, -2, -2, -2);
            $this->AttributeCount8->ViewCustomAttributes = "";

            // AttributeCount9
            $this->AttributeCount9->ViewValue = $this->AttributeCount9->CurrentValue;
            $this->AttributeCount9->ViewValue = FormatNumber($this->AttributeCount9->ViewValue, 0, -2, -2, -2);
            $this->AttributeCount9->ViewCustomAttributes = "";

            // AttributeCount10
            $this->AttributeCount10->ViewValue = $this->AttributeCount10->CurrentValue;
            $this->AttributeCount10->ViewValue = FormatNumber($this->AttributeCount10->ViewValue, 0, -2, -2, -2);
            $this->AttributeCount10->ViewCustomAttributes = "";

            // LabourCharge
            $this->LabourCharge->ViewValue = $this->LabourCharge->CurrentValue;
            $this->LabourCharge->ViewValue = FormatNumber($this->LabourCharge->ViewValue, 2, -2, -2, -2);
            $this->LabourCharge->ViewCustomAttributes = "";

            // AffectOtherCharge
            $this->AffectOtherCharge->ViewValue = $this->AffectOtherCharge->CurrentValue;
            $this->AffectOtherCharge->ViewValue = FormatNumber($this->AffectOtherCharge->ViewValue, 0, -2, -2, -2);
            $this->AffectOtherCharge->ViewCustomAttributes = "";

            // DosageInfo
            $this->DosageInfo->ViewValue = $this->DosageInfo->CurrentValue;
            $this->DosageInfo->ViewCustomAttributes = "";

            // DosageType
            $this->DosageType->ViewValue = $this->DosageType->CurrentValue;
            $this->DosageType->ViewValue = FormatNumber($this->DosageType->ViewValue, 0, -2, -2, -2);
            $this->DosageType->ViewCustomAttributes = "";

            // DefaultIndentUOM
            $this->DefaultIndentUOM->ViewValue = $this->DefaultIndentUOM->CurrentValue;
            $this->DefaultIndentUOM->ViewValue = FormatNumber($this->DefaultIndentUOM->ViewValue, 0, -2, -2, -2);
            $this->DefaultIndentUOM->ViewCustomAttributes = "";

            // PromoTag
            $this->PromoTag->ViewValue = $this->PromoTag->CurrentValue;
            $this->PromoTag->ViewValue = FormatNumber($this->PromoTag->ViewValue, 0, -2, -2, -2);
            $this->PromoTag->ViewCustomAttributes = "";

            // BillLevelPromoTag
            $this->BillLevelPromoTag->ViewValue = $this->BillLevelPromoTag->CurrentValue;
            $this->BillLevelPromoTag->ViewValue = FormatNumber($this->BillLevelPromoTag->ViewValue, 0, -2, -2, -2);
            $this->BillLevelPromoTag->ViewCustomAttributes = "";

            // IsMRPProduct
            $this->IsMRPProduct->ViewValue = $this->IsMRPProduct->CurrentValue;
            $this->IsMRPProduct->ViewValue = FormatNumber($this->IsMRPProduct->ViewValue, 0, -2, -2, -2);
            $this->IsMRPProduct->ViewCustomAttributes = "";

            // MrpList
            $this->MrpList->ViewValue = $this->MrpList->CurrentValue;
            $this->MrpList->ViewCustomAttributes = "";

            // AlternateSaleUOM
            $this->AlternateSaleUOM->ViewValue = $this->AlternateSaleUOM->CurrentValue;
            $this->AlternateSaleUOM->ViewValue = FormatNumber($this->AlternateSaleUOM->ViewValue, 0, -2, -2, -2);
            $this->AlternateSaleUOM->ViewCustomAttributes = "";

            // FreeUOM
            $this->FreeUOM->ViewValue = $this->FreeUOM->CurrentValue;
            $this->FreeUOM->ViewValue = FormatNumber($this->FreeUOM->ViewValue, 0, -2, -2, -2);
            $this->FreeUOM->ViewCustomAttributes = "";

            // MarketedCode
            $this->MarketedCode->ViewValue = $this->MarketedCode->CurrentValue;
            $this->MarketedCode->ViewCustomAttributes = "";

            // MinimumSalePrice
            $this->MinimumSalePrice->ViewValue = $this->MinimumSalePrice->CurrentValue;
            $this->MinimumSalePrice->ViewValue = FormatNumber($this->MinimumSalePrice->ViewValue, 2, -2, -2, -2);
            $this->MinimumSalePrice->ViewCustomAttributes = "";

            // PRate1
            $this->PRate1->ViewValue = $this->PRate1->CurrentValue;
            $this->PRate1->ViewValue = FormatNumber($this->PRate1->ViewValue, 2, -2, -2, -2);
            $this->PRate1->ViewCustomAttributes = "";

            // PRate2
            $this->PRate2->ViewValue = $this->PRate2->CurrentValue;
            $this->PRate2->ViewValue = FormatNumber($this->PRate2->ViewValue, 2, -2, -2, -2);
            $this->PRate2->ViewCustomAttributes = "";

            // LPItemCost
            $this->LPItemCost->ViewValue = $this->LPItemCost->CurrentValue;
            $this->LPItemCost->ViewValue = FormatNumber($this->LPItemCost->ViewValue, 2, -2, -2, -2);
            $this->LPItemCost->ViewCustomAttributes = "";

            // FixedItemCost
            $this->FixedItemCost->ViewValue = $this->FixedItemCost->CurrentValue;
            $this->FixedItemCost->ViewValue = FormatNumber($this->FixedItemCost->ViewValue, 2, -2, -2, -2);
            $this->FixedItemCost->ViewCustomAttributes = "";

            // HSNId
            $this->HSNId->ViewValue = $this->HSNId->CurrentValue;
            $this->HSNId->ViewValue = FormatNumber($this->HSNId->ViewValue, 0, -2, -2, -2);
            $this->HSNId->ViewCustomAttributes = "";

            // TaxInclusive
            $this->TaxInclusive->ViewValue = $this->TaxInclusive->CurrentValue;
            $this->TaxInclusive->ViewValue = FormatNumber($this->TaxInclusive->ViewValue, 0, -2, -2, -2);
            $this->TaxInclusive->ViewCustomAttributes = "";

            // EligibleforWarranty
            $this->EligibleforWarranty->ViewValue = $this->EligibleforWarranty->CurrentValue;
            $this->EligibleforWarranty->ViewValue = FormatNumber($this->EligibleforWarranty->ViewValue, 0, -2, -2, -2);
            $this->EligibleforWarranty->ViewCustomAttributes = "";

            // NoofMonthsWarranty
            $this->NoofMonthsWarranty->ViewValue = $this->NoofMonthsWarranty->CurrentValue;
            $this->NoofMonthsWarranty->ViewValue = FormatNumber($this->NoofMonthsWarranty->ViewValue, 0, -2, -2, -2);
            $this->NoofMonthsWarranty->ViewCustomAttributes = "";

            // ComputeTaxonCost
            $this->ComputeTaxonCost->ViewValue = $this->ComputeTaxonCost->CurrentValue;
            $this->ComputeTaxonCost->ViewValue = FormatNumber($this->ComputeTaxonCost->ViewValue, 0, -2, -2, -2);
            $this->ComputeTaxonCost->ViewCustomAttributes = "";

            // HasEmptyBottleTrack
            $this->HasEmptyBottleTrack->ViewValue = $this->HasEmptyBottleTrack->CurrentValue;
            $this->HasEmptyBottleTrack->ViewValue = FormatNumber($this->HasEmptyBottleTrack->ViewValue, 0, -2, -2, -2);
            $this->HasEmptyBottleTrack->ViewCustomAttributes = "";

            // EmptyBottleReferenceCode
            $this->EmptyBottleReferenceCode->ViewValue = $this->EmptyBottleReferenceCode->CurrentValue;
            $this->EmptyBottleReferenceCode->ViewValue = FormatNumber($this->EmptyBottleReferenceCode->ViewValue, 0, -2, -2, -2);
            $this->EmptyBottleReferenceCode->ViewCustomAttributes = "";

            // AdditionalCESSAmount
            $this->AdditionalCESSAmount->ViewValue = $this->AdditionalCESSAmount->CurrentValue;
            $this->AdditionalCESSAmount->ViewValue = FormatNumber($this->AdditionalCESSAmount->ViewValue, 2, -2, -2, -2);
            $this->AdditionalCESSAmount->ViewCustomAttributes = "";

            // EmptyBottleRate
            $this->EmptyBottleRate->ViewValue = $this->EmptyBottleRate->CurrentValue;
            $this->EmptyBottleRate->ViewValue = FormatNumber($this->EmptyBottleRate->ViewValue, 2, -2, -2, -2);
            $this->EmptyBottleRate->ViewCustomAttributes = "";

            // ProductName
            $this->ProductName->LinkCustomAttributes = "";
            $this->ProductName->HrefValue = "";
            $this->ProductName->TooltipValue = "";

            // DivisionCode
            $this->DivisionCode->LinkCustomAttributes = "";
            $this->DivisionCode->HrefValue = "";
            $this->DivisionCode->TooltipValue = "";

            // ManufacturerCode
            $this->ManufacturerCode->LinkCustomAttributes = "";
            $this->ManufacturerCode->HrefValue = "";
            $this->ManufacturerCode->TooltipValue = "";

            // SupplierCode
            $this->SupplierCode->LinkCustomAttributes = "";
            $this->SupplierCode->HrefValue = "";
            $this->SupplierCode->TooltipValue = "";

            // AlternateSupplierCodes
            $this->AlternateSupplierCodes->LinkCustomAttributes = "";
            $this->AlternateSupplierCodes->HrefValue = "";
            $this->AlternateSupplierCodes->TooltipValue = "";

            // AlternateProductCode
            $this->AlternateProductCode->LinkCustomAttributes = "";
            $this->AlternateProductCode->HrefValue = "";
            $this->AlternateProductCode->TooltipValue = "";

            // UniversalProductCode
            $this->UniversalProductCode->LinkCustomAttributes = "";
            $this->UniversalProductCode->HrefValue = "";
            $this->UniversalProductCode->TooltipValue = "";

            // BookProductCode
            $this->BookProductCode->LinkCustomAttributes = "";
            $this->BookProductCode->HrefValue = "";
            $this->BookProductCode->TooltipValue = "";

            // OldCode
            $this->OldCode->LinkCustomAttributes = "";
            $this->OldCode->HrefValue = "";
            $this->OldCode->TooltipValue = "";

            // ProtectedProducts
            $this->ProtectedProducts->LinkCustomAttributes = "";
            $this->ProtectedProducts->HrefValue = "";
            $this->ProtectedProducts->TooltipValue = "";

            // ProductFullName
            $this->ProductFullName->LinkCustomAttributes = "";
            $this->ProductFullName->HrefValue = "";
            $this->ProductFullName->TooltipValue = "";

            // UnitOfMeasure
            $this->UnitOfMeasure->LinkCustomAttributes = "";
            $this->UnitOfMeasure->HrefValue = "";
            $this->UnitOfMeasure->TooltipValue = "";

            // UnitDescription
            $this->UnitDescription->LinkCustomAttributes = "";
            $this->UnitDescription->HrefValue = "";
            $this->UnitDescription->TooltipValue = "";

            // BulkDescription
            $this->BulkDescription->LinkCustomAttributes = "";
            $this->BulkDescription->HrefValue = "";
            $this->BulkDescription->TooltipValue = "";

            // BarCodeDescription
            $this->BarCodeDescription->LinkCustomAttributes = "";
            $this->BarCodeDescription->HrefValue = "";
            $this->BarCodeDescription->TooltipValue = "";

            // PackageInformation
            $this->PackageInformation->LinkCustomAttributes = "";
            $this->PackageInformation->HrefValue = "";
            $this->PackageInformation->TooltipValue = "";

            // PackageId
            $this->PackageId->LinkCustomAttributes = "";
            $this->PackageId->HrefValue = "";
            $this->PackageId->TooltipValue = "";

            // Weight
            $this->Weight->LinkCustomAttributes = "";
            $this->Weight->HrefValue = "";
            $this->Weight->TooltipValue = "";

            // AllowFractions
            $this->AllowFractions->LinkCustomAttributes = "";
            $this->AllowFractions->HrefValue = "";
            $this->AllowFractions->TooltipValue = "";

            // MinimumStockLevel
            $this->MinimumStockLevel->LinkCustomAttributes = "";
            $this->MinimumStockLevel->HrefValue = "";
            $this->MinimumStockLevel->TooltipValue = "";

            // MaximumStockLevel
            $this->MaximumStockLevel->LinkCustomAttributes = "";
            $this->MaximumStockLevel->HrefValue = "";
            $this->MaximumStockLevel->TooltipValue = "";

            // ReorderLevel
            $this->ReorderLevel->LinkCustomAttributes = "";
            $this->ReorderLevel->HrefValue = "";
            $this->ReorderLevel->TooltipValue = "";

            // MinMaxRatio
            $this->MinMaxRatio->LinkCustomAttributes = "";
            $this->MinMaxRatio->HrefValue = "";
            $this->MinMaxRatio->TooltipValue = "";

            // AutoMinMaxRatio
            $this->AutoMinMaxRatio->LinkCustomAttributes = "";
            $this->AutoMinMaxRatio->HrefValue = "";
            $this->AutoMinMaxRatio->TooltipValue = "";

            // ScheduleCode
            $this->ScheduleCode->LinkCustomAttributes = "";
            $this->ScheduleCode->HrefValue = "";
            $this->ScheduleCode->TooltipValue = "";

            // RopRatio
            $this->RopRatio->LinkCustomAttributes = "";
            $this->RopRatio->HrefValue = "";
            $this->RopRatio->TooltipValue = "";

            // MRP
            $this->MRP->LinkCustomAttributes = "";
            $this->MRP->HrefValue = "";
            $this->MRP->TooltipValue = "";

            // PurchasePrice
            $this->PurchasePrice->LinkCustomAttributes = "";
            $this->PurchasePrice->HrefValue = "";
            $this->PurchasePrice->TooltipValue = "";

            // PurchaseUnit
            $this->PurchaseUnit->LinkCustomAttributes = "";
            $this->PurchaseUnit->HrefValue = "";
            $this->PurchaseUnit->TooltipValue = "";

            // PurchaseTaxCode
            $this->PurchaseTaxCode->LinkCustomAttributes = "";
            $this->PurchaseTaxCode->HrefValue = "";
            $this->PurchaseTaxCode->TooltipValue = "";

            // AllowDirectInward
            $this->AllowDirectInward->LinkCustomAttributes = "";
            $this->AllowDirectInward->HrefValue = "";
            $this->AllowDirectInward->TooltipValue = "";

            // SalePrice
            $this->SalePrice->LinkCustomAttributes = "";
            $this->SalePrice->HrefValue = "";
            $this->SalePrice->TooltipValue = "";

            // SaleUnit
            $this->SaleUnit->LinkCustomAttributes = "";
            $this->SaleUnit->HrefValue = "";
            $this->SaleUnit->TooltipValue = "";

            // SalesTaxCode
            $this->SalesTaxCode->LinkCustomAttributes = "";
            $this->SalesTaxCode->HrefValue = "";
            $this->SalesTaxCode->TooltipValue = "";

            // StockReceived
            $this->StockReceived->LinkCustomAttributes = "";
            $this->StockReceived->HrefValue = "";
            $this->StockReceived->TooltipValue = "";

            // TotalStock
            $this->TotalStock->LinkCustomAttributes = "";
            $this->TotalStock->HrefValue = "";
            $this->TotalStock->TooltipValue = "";

            // StockType
            $this->StockType->LinkCustomAttributes = "";
            $this->StockType->HrefValue = "";
            $this->StockType->TooltipValue = "";

            // StockCheckDate
            $this->StockCheckDate->LinkCustomAttributes = "";
            $this->StockCheckDate->HrefValue = "";
            $this->StockCheckDate->TooltipValue = "";

            // StockAdjustmentDate
            $this->StockAdjustmentDate->LinkCustomAttributes = "";
            $this->StockAdjustmentDate->HrefValue = "";
            $this->StockAdjustmentDate->TooltipValue = "";

            // Remarks
            $this->Remarks->LinkCustomAttributes = "";
            $this->Remarks->HrefValue = "";
            $this->Remarks->TooltipValue = "";

            // CostCentre
            $this->CostCentre->LinkCustomAttributes = "";
            $this->CostCentre->HrefValue = "";
            $this->CostCentre->TooltipValue = "";

            // ProductType
            $this->ProductType->LinkCustomAttributes = "";
            $this->ProductType->HrefValue = "";
            $this->ProductType->TooltipValue = "";

            // TaxAmount
            $this->TaxAmount->LinkCustomAttributes = "";
            $this->TaxAmount->HrefValue = "";
            $this->TaxAmount->TooltipValue = "";

            // TaxId
            $this->TaxId->LinkCustomAttributes = "";
            $this->TaxId->HrefValue = "";
            $this->TaxId->TooltipValue = "";

            // ResaleTaxApplicable
            $this->ResaleTaxApplicable->LinkCustomAttributes = "";
            $this->ResaleTaxApplicable->HrefValue = "";
            $this->ResaleTaxApplicable->TooltipValue = "";

            // CstOtherTax
            $this->CstOtherTax->LinkCustomAttributes = "";
            $this->CstOtherTax->HrefValue = "";
            $this->CstOtherTax->TooltipValue = "";

            // TotalTax
            $this->TotalTax->LinkCustomAttributes = "";
            $this->TotalTax->HrefValue = "";
            $this->TotalTax->TooltipValue = "";

            // ItemCost
            $this->ItemCost->LinkCustomAttributes = "";
            $this->ItemCost->HrefValue = "";
            $this->ItemCost->TooltipValue = "";

            // ExpiryDate
            $this->ExpiryDate->LinkCustomAttributes = "";
            $this->ExpiryDate->HrefValue = "";
            $this->ExpiryDate->TooltipValue = "";

            // BatchDescription
            $this->BatchDescription->LinkCustomAttributes = "";
            $this->BatchDescription->HrefValue = "";
            $this->BatchDescription->TooltipValue = "";

            // FreeScheme
            $this->FreeScheme->LinkCustomAttributes = "";
            $this->FreeScheme->HrefValue = "";
            $this->FreeScheme->TooltipValue = "";

            // CashDiscountEligibility
            $this->CashDiscountEligibility->LinkCustomAttributes = "";
            $this->CashDiscountEligibility->HrefValue = "";
            $this->CashDiscountEligibility->TooltipValue = "";

            // DiscountPerAllowInBill
            $this->DiscountPerAllowInBill->LinkCustomAttributes = "";
            $this->DiscountPerAllowInBill->HrefValue = "";
            $this->DiscountPerAllowInBill->TooltipValue = "";

            // Discount
            $this->Discount->LinkCustomAttributes = "";
            $this->Discount->HrefValue = "";
            $this->Discount->TooltipValue = "";

            // TotalAmount
            $this->TotalAmount->LinkCustomAttributes = "";
            $this->TotalAmount->HrefValue = "";
            $this->TotalAmount->TooltipValue = "";

            // StandardMargin
            $this->StandardMargin->LinkCustomAttributes = "";
            $this->StandardMargin->HrefValue = "";
            $this->StandardMargin->TooltipValue = "";

            // Margin
            $this->Margin->LinkCustomAttributes = "";
            $this->Margin->HrefValue = "";
            $this->Margin->TooltipValue = "";

            // MarginId
            $this->MarginId->LinkCustomAttributes = "";
            $this->MarginId->HrefValue = "";
            $this->MarginId->TooltipValue = "";

            // ExpectedMargin
            $this->ExpectedMargin->LinkCustomAttributes = "";
            $this->ExpectedMargin->HrefValue = "";
            $this->ExpectedMargin->TooltipValue = "";

            // SurchargeBeforeTax
            $this->SurchargeBeforeTax->LinkCustomAttributes = "";
            $this->SurchargeBeforeTax->HrefValue = "";
            $this->SurchargeBeforeTax->TooltipValue = "";

            // SurchargeAfterTax
            $this->SurchargeAfterTax->LinkCustomAttributes = "";
            $this->SurchargeAfterTax->HrefValue = "";
            $this->SurchargeAfterTax->TooltipValue = "";

            // TempOrderNo
            $this->TempOrderNo->LinkCustomAttributes = "";
            $this->TempOrderNo->HrefValue = "";
            $this->TempOrderNo->TooltipValue = "";

            // TempOrderDate
            $this->TempOrderDate->LinkCustomAttributes = "";
            $this->TempOrderDate->HrefValue = "";
            $this->TempOrderDate->TooltipValue = "";

            // OrderUnit
            $this->OrderUnit->LinkCustomAttributes = "";
            $this->OrderUnit->HrefValue = "";
            $this->OrderUnit->TooltipValue = "";

            // OrderQuantity
            $this->OrderQuantity->LinkCustomAttributes = "";
            $this->OrderQuantity->HrefValue = "";
            $this->OrderQuantity->TooltipValue = "";

            // MarkForOrder
            $this->MarkForOrder->LinkCustomAttributes = "";
            $this->MarkForOrder->HrefValue = "";
            $this->MarkForOrder->TooltipValue = "";

            // OrderAllId
            $this->OrderAllId->LinkCustomAttributes = "";
            $this->OrderAllId->HrefValue = "";
            $this->OrderAllId->TooltipValue = "";

            // CalculateOrderQty
            $this->CalculateOrderQty->LinkCustomAttributes = "";
            $this->CalculateOrderQty->HrefValue = "";
            $this->CalculateOrderQty->TooltipValue = "";

            // SubLocation
            $this->SubLocation->LinkCustomAttributes = "";
            $this->SubLocation->HrefValue = "";
            $this->SubLocation->TooltipValue = "";

            // CategoryCode
            $this->CategoryCode->LinkCustomAttributes = "";
            $this->CategoryCode->HrefValue = "";
            $this->CategoryCode->TooltipValue = "";

            // SubCategory
            $this->SubCategory->LinkCustomAttributes = "";
            $this->SubCategory->HrefValue = "";
            $this->SubCategory->TooltipValue = "";

            // FlexCategoryCode
            $this->FlexCategoryCode->LinkCustomAttributes = "";
            $this->FlexCategoryCode->HrefValue = "";
            $this->FlexCategoryCode->TooltipValue = "";

            // ABCSaleQty
            $this->ABCSaleQty->LinkCustomAttributes = "";
            $this->ABCSaleQty->HrefValue = "";
            $this->ABCSaleQty->TooltipValue = "";

            // ABCSaleValue
            $this->ABCSaleValue->LinkCustomAttributes = "";
            $this->ABCSaleValue->HrefValue = "";
            $this->ABCSaleValue->TooltipValue = "";

            // ConvertionFactor
            $this->ConvertionFactor->LinkCustomAttributes = "";
            $this->ConvertionFactor->HrefValue = "";
            $this->ConvertionFactor->TooltipValue = "";

            // ConvertionUnitDesc
            $this->ConvertionUnitDesc->LinkCustomAttributes = "";
            $this->ConvertionUnitDesc->HrefValue = "";
            $this->ConvertionUnitDesc->TooltipValue = "";

            // TransactionId
            $this->TransactionId->LinkCustomAttributes = "";
            $this->TransactionId->HrefValue = "";
            $this->TransactionId->TooltipValue = "";

            // SoldProductId
            $this->SoldProductId->LinkCustomAttributes = "";
            $this->SoldProductId->HrefValue = "";
            $this->SoldProductId->TooltipValue = "";

            // WantedBookId
            $this->WantedBookId->LinkCustomAttributes = "";
            $this->WantedBookId->HrefValue = "";
            $this->WantedBookId->TooltipValue = "";

            // AllId
            $this->AllId->LinkCustomAttributes = "";
            $this->AllId->HrefValue = "";
            $this->AllId->TooltipValue = "";

            // BatchAndExpiryCompulsory
            $this->BatchAndExpiryCompulsory->LinkCustomAttributes = "";
            $this->BatchAndExpiryCompulsory->HrefValue = "";
            $this->BatchAndExpiryCompulsory->TooltipValue = "";

            // BatchStockForWantedBook
            $this->BatchStockForWantedBook->LinkCustomAttributes = "";
            $this->BatchStockForWantedBook->HrefValue = "";
            $this->BatchStockForWantedBook->TooltipValue = "";

            // UnitBasedBilling
            $this->UnitBasedBilling->LinkCustomAttributes = "";
            $this->UnitBasedBilling->HrefValue = "";
            $this->UnitBasedBilling->TooltipValue = "";

            // DoNotCheckStock
            $this->DoNotCheckStock->LinkCustomAttributes = "";
            $this->DoNotCheckStock->HrefValue = "";
            $this->DoNotCheckStock->TooltipValue = "";

            // AcceptRate
            $this->AcceptRate->LinkCustomAttributes = "";
            $this->AcceptRate->HrefValue = "";
            $this->AcceptRate->TooltipValue = "";

            // PriceLevel
            $this->PriceLevel->LinkCustomAttributes = "";
            $this->PriceLevel->HrefValue = "";
            $this->PriceLevel->TooltipValue = "";

            // LastQuotePrice
            $this->LastQuotePrice->LinkCustomAttributes = "";
            $this->LastQuotePrice->HrefValue = "";
            $this->LastQuotePrice->TooltipValue = "";

            // PriceChange
            $this->PriceChange->LinkCustomAttributes = "";
            $this->PriceChange->HrefValue = "";
            $this->PriceChange->TooltipValue = "";

            // CommodityCode
            $this->CommodityCode->LinkCustomAttributes = "";
            $this->CommodityCode->HrefValue = "";
            $this->CommodityCode->TooltipValue = "";

            // InstitutePrice
            $this->InstitutePrice->LinkCustomAttributes = "";
            $this->InstitutePrice->HrefValue = "";
            $this->InstitutePrice->TooltipValue = "";

            // CtrlOrDCtrlProduct
            $this->CtrlOrDCtrlProduct->LinkCustomAttributes = "";
            $this->CtrlOrDCtrlProduct->HrefValue = "";
            $this->CtrlOrDCtrlProduct->TooltipValue = "";

            // ImportedDate
            $this->ImportedDate->LinkCustomAttributes = "";
            $this->ImportedDate->HrefValue = "";
            $this->ImportedDate->TooltipValue = "";

            // IsImported
            $this->IsImported->LinkCustomAttributes = "";
            $this->IsImported->HrefValue = "";
            $this->IsImported->TooltipValue = "";

            // FileName
            $this->FileName->LinkCustomAttributes = "";
            $this->FileName->HrefValue = "";
            $this->FileName->TooltipValue = "";

            // LPName
            $this->LPName->LinkCustomAttributes = "";
            $this->LPName->HrefValue = "";
            $this->LPName->TooltipValue = "";

            // GodownNumber
            $this->GodownNumber->LinkCustomAttributes = "";
            $this->GodownNumber->HrefValue = "";
            $this->GodownNumber->TooltipValue = "";

            // CreationDate
            $this->CreationDate->LinkCustomAttributes = "";
            $this->CreationDate->HrefValue = "";
            $this->CreationDate->TooltipValue = "";

            // CreatedbyUser
            $this->CreatedbyUser->LinkCustomAttributes = "";
            $this->CreatedbyUser->HrefValue = "";
            $this->CreatedbyUser->TooltipValue = "";

            // ModifiedDate
            $this->ModifiedDate->LinkCustomAttributes = "";
            $this->ModifiedDate->HrefValue = "";
            $this->ModifiedDate->TooltipValue = "";

            // ModifiedbyUser
            $this->ModifiedbyUser->LinkCustomAttributes = "";
            $this->ModifiedbyUser->HrefValue = "";
            $this->ModifiedbyUser->TooltipValue = "";

            // isActive
            $this->isActive->LinkCustomAttributes = "";
            $this->isActive->HrefValue = "";
            $this->isActive->TooltipValue = "";

            // AllowExpiryClaim
            $this->AllowExpiryClaim->LinkCustomAttributes = "";
            $this->AllowExpiryClaim->HrefValue = "";
            $this->AllowExpiryClaim->TooltipValue = "";

            // BrandCode
            $this->BrandCode->LinkCustomAttributes = "";
            $this->BrandCode->HrefValue = "";
            $this->BrandCode->TooltipValue = "";

            // FreeSchemeBasedon
            $this->FreeSchemeBasedon->LinkCustomAttributes = "";
            $this->FreeSchemeBasedon->HrefValue = "";
            $this->FreeSchemeBasedon->TooltipValue = "";

            // DoNotCheckCostInBill
            $this->DoNotCheckCostInBill->LinkCustomAttributes = "";
            $this->DoNotCheckCostInBill->HrefValue = "";
            $this->DoNotCheckCostInBill->TooltipValue = "";

            // ProductGroupCode
            $this->ProductGroupCode->LinkCustomAttributes = "";
            $this->ProductGroupCode->HrefValue = "";
            $this->ProductGroupCode->TooltipValue = "";

            // ProductStrengthCode
            $this->ProductStrengthCode->LinkCustomAttributes = "";
            $this->ProductStrengthCode->HrefValue = "";
            $this->ProductStrengthCode->TooltipValue = "";

            // PackingCode
            $this->PackingCode->LinkCustomAttributes = "";
            $this->PackingCode->HrefValue = "";
            $this->PackingCode->TooltipValue = "";

            // ComputedMinStock
            $this->ComputedMinStock->LinkCustomAttributes = "";
            $this->ComputedMinStock->HrefValue = "";
            $this->ComputedMinStock->TooltipValue = "";

            // ComputedMaxStock
            $this->ComputedMaxStock->LinkCustomAttributes = "";
            $this->ComputedMaxStock->HrefValue = "";
            $this->ComputedMaxStock->TooltipValue = "";

            // ProductRemark
            $this->ProductRemark->LinkCustomAttributes = "";
            $this->ProductRemark->HrefValue = "";
            $this->ProductRemark->TooltipValue = "";

            // ProductDrugCode
            $this->ProductDrugCode->LinkCustomAttributes = "";
            $this->ProductDrugCode->HrefValue = "";
            $this->ProductDrugCode->TooltipValue = "";

            // IsMatrixProduct
            $this->IsMatrixProduct->LinkCustomAttributes = "";
            $this->IsMatrixProduct->HrefValue = "";
            $this->IsMatrixProduct->TooltipValue = "";

            // AttributeCount1
            $this->AttributeCount1->LinkCustomAttributes = "";
            $this->AttributeCount1->HrefValue = "";
            $this->AttributeCount1->TooltipValue = "";

            // AttributeCount2
            $this->AttributeCount2->LinkCustomAttributes = "";
            $this->AttributeCount2->HrefValue = "";
            $this->AttributeCount2->TooltipValue = "";

            // AttributeCount3
            $this->AttributeCount3->LinkCustomAttributes = "";
            $this->AttributeCount3->HrefValue = "";
            $this->AttributeCount3->TooltipValue = "";

            // AttributeCount4
            $this->AttributeCount4->LinkCustomAttributes = "";
            $this->AttributeCount4->HrefValue = "";
            $this->AttributeCount4->TooltipValue = "";

            // AttributeCount5
            $this->AttributeCount5->LinkCustomAttributes = "";
            $this->AttributeCount5->HrefValue = "";
            $this->AttributeCount5->TooltipValue = "";

            // DefaultDiscountPercentage
            $this->DefaultDiscountPercentage->LinkCustomAttributes = "";
            $this->DefaultDiscountPercentage->HrefValue = "";
            $this->DefaultDiscountPercentage->TooltipValue = "";

            // DonotPrintBarcode
            $this->DonotPrintBarcode->LinkCustomAttributes = "";
            $this->DonotPrintBarcode->HrefValue = "";
            $this->DonotPrintBarcode->TooltipValue = "";

            // ProductLevelDiscount
            $this->ProductLevelDiscount->LinkCustomAttributes = "";
            $this->ProductLevelDiscount->HrefValue = "";
            $this->ProductLevelDiscount->TooltipValue = "";

            // Markup
            $this->Markup->LinkCustomAttributes = "";
            $this->Markup->HrefValue = "";
            $this->Markup->TooltipValue = "";

            // MarkDown
            $this->MarkDown->LinkCustomAttributes = "";
            $this->MarkDown->HrefValue = "";
            $this->MarkDown->TooltipValue = "";

            // ReworkSalePrice
            $this->ReworkSalePrice->LinkCustomAttributes = "";
            $this->ReworkSalePrice->HrefValue = "";
            $this->ReworkSalePrice->TooltipValue = "";

            // MultipleInput
            $this->MultipleInput->LinkCustomAttributes = "";
            $this->MultipleInput->HrefValue = "";
            $this->MultipleInput->TooltipValue = "";

            // LpPackageInformation
            $this->LpPackageInformation->LinkCustomAttributes = "";
            $this->LpPackageInformation->HrefValue = "";
            $this->LpPackageInformation->TooltipValue = "";

            // AllowNegativeStock
            $this->AllowNegativeStock->LinkCustomAttributes = "";
            $this->AllowNegativeStock->HrefValue = "";
            $this->AllowNegativeStock->TooltipValue = "";

            // OrderDate
            $this->OrderDate->LinkCustomAttributes = "";
            $this->OrderDate->HrefValue = "";
            $this->OrderDate->TooltipValue = "";

            // OrderTime
            $this->OrderTime->LinkCustomAttributes = "";
            $this->OrderTime->HrefValue = "";
            $this->OrderTime->TooltipValue = "";

            // RateGroupCode
            $this->RateGroupCode->LinkCustomAttributes = "";
            $this->RateGroupCode->HrefValue = "";
            $this->RateGroupCode->TooltipValue = "";

            // ConversionCaseLot
            $this->ConversionCaseLot->LinkCustomAttributes = "";
            $this->ConversionCaseLot->HrefValue = "";
            $this->ConversionCaseLot->TooltipValue = "";

            // ShippingLot
            $this->ShippingLot->LinkCustomAttributes = "";
            $this->ShippingLot->HrefValue = "";
            $this->ShippingLot->TooltipValue = "";

            // AllowExpiryReplacement
            $this->AllowExpiryReplacement->LinkCustomAttributes = "";
            $this->AllowExpiryReplacement->HrefValue = "";
            $this->AllowExpiryReplacement->TooltipValue = "";

            // NoOfMonthExpiryAllowed
            $this->NoOfMonthExpiryAllowed->LinkCustomAttributes = "";
            $this->NoOfMonthExpiryAllowed->HrefValue = "";
            $this->NoOfMonthExpiryAllowed->TooltipValue = "";

            // ProductDiscountEligibility
            $this->ProductDiscountEligibility->LinkCustomAttributes = "";
            $this->ProductDiscountEligibility->HrefValue = "";
            $this->ProductDiscountEligibility->TooltipValue = "";

            // ScheduleTypeCode
            $this->ScheduleTypeCode->LinkCustomAttributes = "";
            $this->ScheduleTypeCode->HrefValue = "";
            $this->ScheduleTypeCode->TooltipValue = "";

            // AIOCDProductCode
            $this->AIOCDProductCode->LinkCustomAttributes = "";
            $this->AIOCDProductCode->HrefValue = "";
            $this->AIOCDProductCode->TooltipValue = "";

            // FreeQuantity
            $this->FreeQuantity->LinkCustomAttributes = "";
            $this->FreeQuantity->HrefValue = "";
            $this->FreeQuantity->TooltipValue = "";

            // DiscountType
            $this->DiscountType->LinkCustomAttributes = "";
            $this->DiscountType->HrefValue = "";
            $this->DiscountType->TooltipValue = "";

            // DiscountValue
            $this->DiscountValue->LinkCustomAttributes = "";
            $this->DiscountValue->HrefValue = "";
            $this->DiscountValue->TooltipValue = "";

            // HasProductOrderAttribute
            $this->HasProductOrderAttribute->LinkCustomAttributes = "";
            $this->HasProductOrderAttribute->HrefValue = "";
            $this->HasProductOrderAttribute->TooltipValue = "";

            // FirstPODate
            $this->FirstPODate->LinkCustomAttributes = "";
            $this->FirstPODate->HrefValue = "";
            $this->FirstPODate->TooltipValue = "";

            // SaleprcieAndMrpCalcPercent
            $this->SaleprcieAndMrpCalcPercent->LinkCustomAttributes = "";
            $this->SaleprcieAndMrpCalcPercent->HrefValue = "";
            $this->SaleprcieAndMrpCalcPercent->TooltipValue = "";

            // IsGiftVoucherProducts
            $this->IsGiftVoucherProducts->LinkCustomAttributes = "";
            $this->IsGiftVoucherProducts->HrefValue = "";
            $this->IsGiftVoucherProducts->TooltipValue = "";

            // AcceptRange4SerialNumber
            $this->AcceptRange4SerialNumber->LinkCustomAttributes = "";
            $this->AcceptRange4SerialNumber->HrefValue = "";
            $this->AcceptRange4SerialNumber->TooltipValue = "";

            // GiftVoucherDenomination
            $this->GiftVoucherDenomination->LinkCustomAttributes = "";
            $this->GiftVoucherDenomination->HrefValue = "";
            $this->GiftVoucherDenomination->TooltipValue = "";

            // Subclasscode
            $this->Subclasscode->LinkCustomAttributes = "";
            $this->Subclasscode->HrefValue = "";
            $this->Subclasscode->TooltipValue = "";

            // BarCodeFromWeighingMachine
            $this->BarCodeFromWeighingMachine->LinkCustomAttributes = "";
            $this->BarCodeFromWeighingMachine->HrefValue = "";
            $this->BarCodeFromWeighingMachine->TooltipValue = "";

            // CheckCostInReturn
            $this->CheckCostInReturn->LinkCustomAttributes = "";
            $this->CheckCostInReturn->HrefValue = "";
            $this->CheckCostInReturn->TooltipValue = "";

            // FrequentSaleProduct
            $this->FrequentSaleProduct->LinkCustomAttributes = "";
            $this->FrequentSaleProduct->HrefValue = "";
            $this->FrequentSaleProduct->TooltipValue = "";

            // RateType
            $this->RateType->LinkCustomAttributes = "";
            $this->RateType->HrefValue = "";
            $this->RateType->TooltipValue = "";

            // TouchscreenName
            $this->TouchscreenName->LinkCustomAttributes = "";
            $this->TouchscreenName->HrefValue = "";
            $this->TouchscreenName->TooltipValue = "";

            // FreeType
            $this->FreeType->LinkCustomAttributes = "";
            $this->FreeType->HrefValue = "";
            $this->FreeType->TooltipValue = "";

            // LooseQtyasNewBatch
            $this->LooseQtyasNewBatch->LinkCustomAttributes = "";
            $this->LooseQtyasNewBatch->HrefValue = "";
            $this->LooseQtyasNewBatch->TooltipValue = "";

            // AllowSlabBilling
            $this->AllowSlabBilling->LinkCustomAttributes = "";
            $this->AllowSlabBilling->HrefValue = "";
            $this->AllowSlabBilling->TooltipValue = "";

            // ProductTypeForProduction
            $this->ProductTypeForProduction->LinkCustomAttributes = "";
            $this->ProductTypeForProduction->HrefValue = "";
            $this->ProductTypeForProduction->TooltipValue = "";

            // RecipeCode
            $this->RecipeCode->LinkCustomAttributes = "";
            $this->RecipeCode->HrefValue = "";
            $this->RecipeCode->TooltipValue = "";

            // DefaultUnitType
            $this->DefaultUnitType->LinkCustomAttributes = "";
            $this->DefaultUnitType->HrefValue = "";
            $this->DefaultUnitType->TooltipValue = "";

            // PIstatus
            $this->PIstatus->LinkCustomAttributes = "";
            $this->PIstatus->HrefValue = "";
            $this->PIstatus->TooltipValue = "";

            // LastPiConfirmedDate
            $this->LastPiConfirmedDate->LinkCustomAttributes = "";
            $this->LastPiConfirmedDate->HrefValue = "";
            $this->LastPiConfirmedDate->TooltipValue = "";

            // BarCodeDesign
            $this->BarCodeDesign->LinkCustomAttributes = "";
            $this->BarCodeDesign->HrefValue = "";
            $this->BarCodeDesign->TooltipValue = "";

            // AcceptRemarksInBill
            $this->AcceptRemarksInBill->LinkCustomAttributes = "";
            $this->AcceptRemarksInBill->HrefValue = "";
            $this->AcceptRemarksInBill->TooltipValue = "";

            // Classification
            $this->Classification->LinkCustomAttributes = "";
            $this->Classification->HrefValue = "";
            $this->Classification->TooltipValue = "";

            // TimeSlot
            $this->TimeSlot->LinkCustomAttributes = "";
            $this->TimeSlot->HrefValue = "";
            $this->TimeSlot->TooltipValue = "";

            // IsBundle
            $this->IsBundle->LinkCustomAttributes = "";
            $this->IsBundle->HrefValue = "";
            $this->IsBundle->TooltipValue = "";

            // ColorCode
            $this->ColorCode->LinkCustomAttributes = "";
            $this->ColorCode->HrefValue = "";
            $this->ColorCode->TooltipValue = "";

            // GenderCode
            $this->GenderCode->LinkCustomAttributes = "";
            $this->GenderCode->HrefValue = "";
            $this->GenderCode->TooltipValue = "";

            // SizeCode
            $this->SizeCode->LinkCustomAttributes = "";
            $this->SizeCode->HrefValue = "";
            $this->SizeCode->TooltipValue = "";

            // GiftCard
            $this->GiftCard->LinkCustomAttributes = "";
            $this->GiftCard->HrefValue = "";
            $this->GiftCard->TooltipValue = "";

            // ToonLabel
            $this->ToonLabel->LinkCustomAttributes = "";
            $this->ToonLabel->HrefValue = "";
            $this->ToonLabel->TooltipValue = "";

            // GarmentType
            $this->GarmentType->LinkCustomAttributes = "";
            $this->GarmentType->HrefValue = "";
            $this->GarmentType->TooltipValue = "";

            // AgeGroup
            $this->AgeGroup->LinkCustomAttributes = "";
            $this->AgeGroup->HrefValue = "";
            $this->AgeGroup->TooltipValue = "";

            // Season
            $this->Season->LinkCustomAttributes = "";
            $this->Season->HrefValue = "";
            $this->Season->TooltipValue = "";

            // DailyStockEntry
            $this->DailyStockEntry->LinkCustomAttributes = "";
            $this->DailyStockEntry->HrefValue = "";
            $this->DailyStockEntry->TooltipValue = "";

            // ModifierApplicable
            $this->ModifierApplicable->LinkCustomAttributes = "";
            $this->ModifierApplicable->HrefValue = "";
            $this->ModifierApplicable->TooltipValue = "";

            // ModifierType
            $this->ModifierType->LinkCustomAttributes = "";
            $this->ModifierType->HrefValue = "";
            $this->ModifierType->TooltipValue = "";

            // AcceptZeroRate
            $this->AcceptZeroRate->LinkCustomAttributes = "";
            $this->AcceptZeroRate->HrefValue = "";
            $this->AcceptZeroRate->TooltipValue = "";

            // ExciseDutyCode
            $this->ExciseDutyCode->LinkCustomAttributes = "";
            $this->ExciseDutyCode->HrefValue = "";
            $this->ExciseDutyCode->TooltipValue = "";

            // IndentProductGroupCode
            $this->IndentProductGroupCode->LinkCustomAttributes = "";
            $this->IndentProductGroupCode->HrefValue = "";
            $this->IndentProductGroupCode->TooltipValue = "";

            // IsMultiBatch
            $this->IsMultiBatch->LinkCustomAttributes = "";
            $this->IsMultiBatch->HrefValue = "";
            $this->IsMultiBatch->TooltipValue = "";

            // IsSingleBatch
            $this->IsSingleBatch->LinkCustomAttributes = "";
            $this->IsSingleBatch->HrefValue = "";
            $this->IsSingleBatch->TooltipValue = "";

            // MarkUpRate1
            $this->MarkUpRate1->LinkCustomAttributes = "";
            $this->MarkUpRate1->HrefValue = "";
            $this->MarkUpRate1->TooltipValue = "";

            // MarkDownRate1
            $this->MarkDownRate1->LinkCustomAttributes = "";
            $this->MarkDownRate1->HrefValue = "";
            $this->MarkDownRate1->TooltipValue = "";

            // MarkUpRate2
            $this->MarkUpRate2->LinkCustomAttributes = "";
            $this->MarkUpRate2->HrefValue = "";
            $this->MarkUpRate2->TooltipValue = "";

            // MarkDownRate2
            $this->MarkDownRate2->LinkCustomAttributes = "";
            $this->MarkDownRate2->HrefValue = "";
            $this->MarkDownRate2->TooltipValue = "";

            // Yield
            $this->_Yield->LinkCustomAttributes = "";
            $this->_Yield->HrefValue = "";
            $this->_Yield->TooltipValue = "";

            // RefProductCode
            $this->RefProductCode->LinkCustomAttributes = "";
            $this->RefProductCode->HrefValue = "";
            $this->RefProductCode->TooltipValue = "";

            // Volume
            $this->Volume->LinkCustomAttributes = "";
            $this->Volume->HrefValue = "";
            $this->Volume->TooltipValue = "";

            // MeasurementID
            $this->MeasurementID->LinkCustomAttributes = "";
            $this->MeasurementID->HrefValue = "";
            $this->MeasurementID->TooltipValue = "";

            // CountryCode
            $this->CountryCode->LinkCustomAttributes = "";
            $this->CountryCode->HrefValue = "";
            $this->CountryCode->TooltipValue = "";

            // AcceptWMQty
            $this->AcceptWMQty->LinkCustomAttributes = "";
            $this->AcceptWMQty->HrefValue = "";
            $this->AcceptWMQty->TooltipValue = "";

            // SingleBatchBasedOnRate
            $this->SingleBatchBasedOnRate->LinkCustomAttributes = "";
            $this->SingleBatchBasedOnRate->HrefValue = "";
            $this->SingleBatchBasedOnRate->TooltipValue = "";

            // TenderNo
            $this->TenderNo->LinkCustomAttributes = "";
            $this->TenderNo->HrefValue = "";
            $this->TenderNo->TooltipValue = "";

            // SingleBillMaximumSoldQtyFiled
            $this->SingleBillMaximumSoldQtyFiled->LinkCustomAttributes = "";
            $this->SingleBillMaximumSoldQtyFiled->HrefValue = "";
            $this->SingleBillMaximumSoldQtyFiled->TooltipValue = "";

            // Strength1
            $this->Strength1->LinkCustomAttributes = "";
            $this->Strength1->HrefValue = "";
            $this->Strength1->TooltipValue = "";

            // Strength2
            $this->Strength2->LinkCustomAttributes = "";
            $this->Strength2->HrefValue = "";
            $this->Strength2->TooltipValue = "";

            // Strength3
            $this->Strength3->LinkCustomAttributes = "";
            $this->Strength3->HrefValue = "";
            $this->Strength3->TooltipValue = "";

            // Strength4
            $this->Strength4->LinkCustomAttributes = "";
            $this->Strength4->HrefValue = "";
            $this->Strength4->TooltipValue = "";

            // Strength5
            $this->Strength5->LinkCustomAttributes = "";
            $this->Strength5->HrefValue = "";
            $this->Strength5->TooltipValue = "";

            // IngredientCode1
            $this->IngredientCode1->LinkCustomAttributes = "";
            $this->IngredientCode1->HrefValue = "";
            $this->IngredientCode1->TooltipValue = "";

            // IngredientCode2
            $this->IngredientCode2->LinkCustomAttributes = "";
            $this->IngredientCode2->HrefValue = "";
            $this->IngredientCode2->TooltipValue = "";

            // IngredientCode3
            $this->IngredientCode3->LinkCustomAttributes = "";
            $this->IngredientCode3->HrefValue = "";
            $this->IngredientCode3->TooltipValue = "";

            // IngredientCode4
            $this->IngredientCode4->LinkCustomAttributes = "";
            $this->IngredientCode4->HrefValue = "";
            $this->IngredientCode4->TooltipValue = "";

            // IngredientCode5
            $this->IngredientCode5->LinkCustomAttributes = "";
            $this->IngredientCode5->HrefValue = "";
            $this->IngredientCode5->TooltipValue = "";

            // OrderType
            $this->OrderType->LinkCustomAttributes = "";
            $this->OrderType->HrefValue = "";
            $this->OrderType->TooltipValue = "";

            // StockUOM
            $this->StockUOM->LinkCustomAttributes = "";
            $this->StockUOM->HrefValue = "";
            $this->StockUOM->TooltipValue = "";

            // PriceUOM
            $this->PriceUOM->LinkCustomAttributes = "";
            $this->PriceUOM->HrefValue = "";
            $this->PriceUOM->TooltipValue = "";

            // DefaultSaleUOM
            $this->DefaultSaleUOM->LinkCustomAttributes = "";
            $this->DefaultSaleUOM->HrefValue = "";
            $this->DefaultSaleUOM->TooltipValue = "";

            // DefaultPurchaseUOM
            $this->DefaultPurchaseUOM->LinkCustomAttributes = "";
            $this->DefaultPurchaseUOM->HrefValue = "";
            $this->DefaultPurchaseUOM->TooltipValue = "";

            // ReportingUOM
            $this->ReportingUOM->LinkCustomAttributes = "";
            $this->ReportingUOM->HrefValue = "";
            $this->ReportingUOM->TooltipValue = "";

            // LastPurchasedUOM
            $this->LastPurchasedUOM->LinkCustomAttributes = "";
            $this->LastPurchasedUOM->HrefValue = "";
            $this->LastPurchasedUOM->TooltipValue = "";

            // TreatmentCodes
            $this->TreatmentCodes->LinkCustomAttributes = "";
            $this->TreatmentCodes->HrefValue = "";
            $this->TreatmentCodes->TooltipValue = "";

            // InsuranceType
            $this->InsuranceType->LinkCustomAttributes = "";
            $this->InsuranceType->HrefValue = "";
            $this->InsuranceType->TooltipValue = "";

            // CoverageGroupCodes
            $this->CoverageGroupCodes->LinkCustomAttributes = "";
            $this->CoverageGroupCodes->HrefValue = "";
            $this->CoverageGroupCodes->TooltipValue = "";

            // MultipleUOM
            $this->MultipleUOM->LinkCustomAttributes = "";
            $this->MultipleUOM->HrefValue = "";
            $this->MultipleUOM->TooltipValue = "";

            // SalePriceComputation
            $this->SalePriceComputation->LinkCustomAttributes = "";
            $this->SalePriceComputation->HrefValue = "";
            $this->SalePriceComputation->TooltipValue = "";

            // StockCorrection
            $this->StockCorrection->LinkCustomAttributes = "";
            $this->StockCorrection->HrefValue = "";
            $this->StockCorrection->TooltipValue = "";

            // LBTPercentage
            $this->LBTPercentage->LinkCustomAttributes = "";
            $this->LBTPercentage->HrefValue = "";
            $this->LBTPercentage->TooltipValue = "";

            // SalesCommission
            $this->SalesCommission->LinkCustomAttributes = "";
            $this->SalesCommission->HrefValue = "";
            $this->SalesCommission->TooltipValue = "";

            // LockedStock
            $this->LockedStock->LinkCustomAttributes = "";
            $this->LockedStock->HrefValue = "";
            $this->LockedStock->TooltipValue = "";

            // MinMaxUOM
            $this->MinMaxUOM->LinkCustomAttributes = "";
            $this->MinMaxUOM->HrefValue = "";
            $this->MinMaxUOM->TooltipValue = "";

            // ExpiryMfrDateFormat
            $this->ExpiryMfrDateFormat->LinkCustomAttributes = "";
            $this->ExpiryMfrDateFormat->HrefValue = "";
            $this->ExpiryMfrDateFormat->TooltipValue = "";

            // ProductLifeTime
            $this->ProductLifeTime->LinkCustomAttributes = "";
            $this->ProductLifeTime->HrefValue = "";
            $this->ProductLifeTime->TooltipValue = "";

            // IsCombo
            $this->IsCombo->LinkCustomAttributes = "";
            $this->IsCombo->HrefValue = "";
            $this->IsCombo->TooltipValue = "";

            // ComboTypeCode
            $this->ComboTypeCode->LinkCustomAttributes = "";
            $this->ComboTypeCode->HrefValue = "";
            $this->ComboTypeCode->TooltipValue = "";

            // AttributeCount6
            $this->AttributeCount6->LinkCustomAttributes = "";
            $this->AttributeCount6->HrefValue = "";
            $this->AttributeCount6->TooltipValue = "";

            // AttributeCount7
            $this->AttributeCount7->LinkCustomAttributes = "";
            $this->AttributeCount7->HrefValue = "";
            $this->AttributeCount7->TooltipValue = "";

            // AttributeCount8
            $this->AttributeCount8->LinkCustomAttributes = "";
            $this->AttributeCount8->HrefValue = "";
            $this->AttributeCount8->TooltipValue = "";

            // AttributeCount9
            $this->AttributeCount9->LinkCustomAttributes = "";
            $this->AttributeCount9->HrefValue = "";
            $this->AttributeCount9->TooltipValue = "";

            // AttributeCount10
            $this->AttributeCount10->LinkCustomAttributes = "";
            $this->AttributeCount10->HrefValue = "";
            $this->AttributeCount10->TooltipValue = "";

            // LabourCharge
            $this->LabourCharge->LinkCustomAttributes = "";
            $this->LabourCharge->HrefValue = "";
            $this->LabourCharge->TooltipValue = "";

            // AffectOtherCharge
            $this->AffectOtherCharge->LinkCustomAttributes = "";
            $this->AffectOtherCharge->HrefValue = "";
            $this->AffectOtherCharge->TooltipValue = "";

            // DosageInfo
            $this->DosageInfo->LinkCustomAttributes = "";
            $this->DosageInfo->HrefValue = "";
            $this->DosageInfo->TooltipValue = "";

            // DosageType
            $this->DosageType->LinkCustomAttributes = "";
            $this->DosageType->HrefValue = "";
            $this->DosageType->TooltipValue = "";

            // DefaultIndentUOM
            $this->DefaultIndentUOM->LinkCustomAttributes = "";
            $this->DefaultIndentUOM->HrefValue = "";
            $this->DefaultIndentUOM->TooltipValue = "";

            // PromoTag
            $this->PromoTag->LinkCustomAttributes = "";
            $this->PromoTag->HrefValue = "";
            $this->PromoTag->TooltipValue = "";

            // BillLevelPromoTag
            $this->BillLevelPromoTag->LinkCustomAttributes = "";
            $this->BillLevelPromoTag->HrefValue = "";
            $this->BillLevelPromoTag->TooltipValue = "";

            // IsMRPProduct
            $this->IsMRPProduct->LinkCustomAttributes = "";
            $this->IsMRPProduct->HrefValue = "";
            $this->IsMRPProduct->TooltipValue = "";

            // MrpList
            $this->MrpList->LinkCustomAttributes = "";
            $this->MrpList->HrefValue = "";
            $this->MrpList->TooltipValue = "";

            // AlternateSaleUOM
            $this->AlternateSaleUOM->LinkCustomAttributes = "";
            $this->AlternateSaleUOM->HrefValue = "";
            $this->AlternateSaleUOM->TooltipValue = "";

            // FreeUOM
            $this->FreeUOM->LinkCustomAttributes = "";
            $this->FreeUOM->HrefValue = "";
            $this->FreeUOM->TooltipValue = "";

            // MarketedCode
            $this->MarketedCode->LinkCustomAttributes = "";
            $this->MarketedCode->HrefValue = "";
            $this->MarketedCode->TooltipValue = "";

            // MinimumSalePrice
            $this->MinimumSalePrice->LinkCustomAttributes = "";
            $this->MinimumSalePrice->HrefValue = "";
            $this->MinimumSalePrice->TooltipValue = "";

            // PRate1
            $this->PRate1->LinkCustomAttributes = "";
            $this->PRate1->HrefValue = "";
            $this->PRate1->TooltipValue = "";

            // PRate2
            $this->PRate2->LinkCustomAttributes = "";
            $this->PRate2->HrefValue = "";
            $this->PRate2->TooltipValue = "";

            // LPItemCost
            $this->LPItemCost->LinkCustomAttributes = "";
            $this->LPItemCost->HrefValue = "";
            $this->LPItemCost->TooltipValue = "";

            // FixedItemCost
            $this->FixedItemCost->LinkCustomAttributes = "";
            $this->FixedItemCost->HrefValue = "";
            $this->FixedItemCost->TooltipValue = "";

            // HSNId
            $this->HSNId->LinkCustomAttributes = "";
            $this->HSNId->HrefValue = "";
            $this->HSNId->TooltipValue = "";

            // TaxInclusive
            $this->TaxInclusive->LinkCustomAttributes = "";
            $this->TaxInclusive->HrefValue = "";
            $this->TaxInclusive->TooltipValue = "";

            // EligibleforWarranty
            $this->EligibleforWarranty->LinkCustomAttributes = "";
            $this->EligibleforWarranty->HrefValue = "";
            $this->EligibleforWarranty->TooltipValue = "";

            // NoofMonthsWarranty
            $this->NoofMonthsWarranty->LinkCustomAttributes = "";
            $this->NoofMonthsWarranty->HrefValue = "";
            $this->NoofMonthsWarranty->TooltipValue = "";

            // ComputeTaxonCost
            $this->ComputeTaxonCost->LinkCustomAttributes = "";
            $this->ComputeTaxonCost->HrefValue = "";
            $this->ComputeTaxonCost->TooltipValue = "";

            // HasEmptyBottleTrack
            $this->HasEmptyBottleTrack->LinkCustomAttributes = "";
            $this->HasEmptyBottleTrack->HrefValue = "";
            $this->HasEmptyBottleTrack->TooltipValue = "";

            // EmptyBottleReferenceCode
            $this->EmptyBottleReferenceCode->LinkCustomAttributes = "";
            $this->EmptyBottleReferenceCode->HrefValue = "";
            $this->EmptyBottleReferenceCode->TooltipValue = "";

            // AdditionalCESSAmount
            $this->AdditionalCESSAmount->LinkCustomAttributes = "";
            $this->AdditionalCESSAmount->HrefValue = "";
            $this->AdditionalCESSAmount->TooltipValue = "";

            // EmptyBottleRate
            $this->EmptyBottleRate->LinkCustomAttributes = "";
            $this->EmptyBottleRate->HrefValue = "";
            $this->EmptyBottleRate->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_ADD) {
            // ProductName
            $this->ProductName->EditAttrs["class"] = "form-control";
            $this->ProductName->EditCustomAttributes = "";
            if (!$this->ProductName->Raw) {
                $this->ProductName->CurrentValue = HtmlDecode($this->ProductName->CurrentValue);
            }
            $this->ProductName->EditValue = HtmlEncode($this->ProductName->CurrentValue);
            $this->ProductName->PlaceHolder = RemoveHtml($this->ProductName->caption());

            // DivisionCode
            $this->DivisionCode->EditAttrs["class"] = "form-control";
            $this->DivisionCode->EditCustomAttributes = "";
            if (!$this->DivisionCode->Raw) {
                $this->DivisionCode->CurrentValue = HtmlDecode($this->DivisionCode->CurrentValue);
            }
            $this->DivisionCode->EditValue = HtmlEncode($this->DivisionCode->CurrentValue);
            $this->DivisionCode->PlaceHolder = RemoveHtml($this->DivisionCode->caption());

            // ManufacturerCode
            $this->ManufacturerCode->EditAttrs["class"] = "form-control";
            $this->ManufacturerCode->EditCustomAttributes = "";
            if (!$this->ManufacturerCode->Raw) {
                $this->ManufacturerCode->CurrentValue = HtmlDecode($this->ManufacturerCode->CurrentValue);
            }
            $this->ManufacturerCode->EditValue = HtmlEncode($this->ManufacturerCode->CurrentValue);
            $this->ManufacturerCode->PlaceHolder = RemoveHtml($this->ManufacturerCode->caption());

            // SupplierCode
            $this->SupplierCode->EditAttrs["class"] = "form-control";
            $this->SupplierCode->EditCustomAttributes = "";
            if (!$this->SupplierCode->Raw) {
                $this->SupplierCode->CurrentValue = HtmlDecode($this->SupplierCode->CurrentValue);
            }
            $this->SupplierCode->EditValue = HtmlEncode($this->SupplierCode->CurrentValue);
            $this->SupplierCode->PlaceHolder = RemoveHtml($this->SupplierCode->caption());

            // AlternateSupplierCodes
            $this->AlternateSupplierCodes->EditAttrs["class"] = "form-control";
            $this->AlternateSupplierCodes->EditCustomAttributes = "";
            if (!$this->AlternateSupplierCodes->Raw) {
                $this->AlternateSupplierCodes->CurrentValue = HtmlDecode($this->AlternateSupplierCodes->CurrentValue);
            }
            $this->AlternateSupplierCodes->EditValue = HtmlEncode($this->AlternateSupplierCodes->CurrentValue);
            $this->AlternateSupplierCodes->PlaceHolder = RemoveHtml($this->AlternateSupplierCodes->caption());

            // AlternateProductCode
            $this->AlternateProductCode->EditAttrs["class"] = "form-control";
            $this->AlternateProductCode->EditCustomAttributes = "";
            if (!$this->AlternateProductCode->Raw) {
                $this->AlternateProductCode->CurrentValue = HtmlDecode($this->AlternateProductCode->CurrentValue);
            }
            $this->AlternateProductCode->EditValue = HtmlEncode($this->AlternateProductCode->CurrentValue);
            $this->AlternateProductCode->PlaceHolder = RemoveHtml($this->AlternateProductCode->caption());

            // UniversalProductCode
            $this->UniversalProductCode->EditAttrs["class"] = "form-control";
            $this->UniversalProductCode->EditCustomAttributes = "";
            $this->UniversalProductCode->EditValue = HtmlEncode($this->UniversalProductCode->CurrentValue);
            $this->UniversalProductCode->PlaceHolder = RemoveHtml($this->UniversalProductCode->caption());

            // BookProductCode
            $this->BookProductCode->EditAttrs["class"] = "form-control";
            $this->BookProductCode->EditCustomAttributes = "";
            $this->BookProductCode->EditValue = HtmlEncode($this->BookProductCode->CurrentValue);
            $this->BookProductCode->PlaceHolder = RemoveHtml($this->BookProductCode->caption());

            // OldCode
            $this->OldCode->EditAttrs["class"] = "form-control";
            $this->OldCode->EditCustomAttributes = "";
            if (!$this->OldCode->Raw) {
                $this->OldCode->CurrentValue = HtmlDecode($this->OldCode->CurrentValue);
            }
            $this->OldCode->EditValue = HtmlEncode($this->OldCode->CurrentValue);
            $this->OldCode->PlaceHolder = RemoveHtml($this->OldCode->caption());

            // ProtectedProducts
            $this->ProtectedProducts->EditAttrs["class"] = "form-control";
            $this->ProtectedProducts->EditCustomAttributes = "";
            $this->ProtectedProducts->EditValue = HtmlEncode($this->ProtectedProducts->CurrentValue);
            $this->ProtectedProducts->PlaceHolder = RemoveHtml($this->ProtectedProducts->caption());

            // ProductFullName
            $this->ProductFullName->EditAttrs["class"] = "form-control";
            $this->ProductFullName->EditCustomAttributes = "";
            if (!$this->ProductFullName->Raw) {
                $this->ProductFullName->CurrentValue = HtmlDecode($this->ProductFullName->CurrentValue);
            }
            $this->ProductFullName->EditValue = HtmlEncode($this->ProductFullName->CurrentValue);
            $this->ProductFullName->PlaceHolder = RemoveHtml($this->ProductFullName->caption());

            // UnitOfMeasure
            $this->UnitOfMeasure->EditAttrs["class"] = "form-control";
            $this->UnitOfMeasure->EditCustomAttributes = "";
            $this->UnitOfMeasure->EditValue = HtmlEncode($this->UnitOfMeasure->CurrentValue);
            $this->UnitOfMeasure->PlaceHolder = RemoveHtml($this->UnitOfMeasure->caption());

            // UnitDescription
            $this->UnitDescription->EditAttrs["class"] = "form-control";
            $this->UnitDescription->EditCustomAttributes = "";
            if (!$this->UnitDescription->Raw) {
                $this->UnitDescription->CurrentValue = HtmlDecode($this->UnitDescription->CurrentValue);
            }
            $this->UnitDescription->EditValue = HtmlEncode($this->UnitDescription->CurrentValue);
            $this->UnitDescription->PlaceHolder = RemoveHtml($this->UnitDescription->caption());

            // BulkDescription
            $this->BulkDescription->EditAttrs["class"] = "form-control";
            $this->BulkDescription->EditCustomAttributes = "";
            if (!$this->BulkDescription->Raw) {
                $this->BulkDescription->CurrentValue = HtmlDecode($this->BulkDescription->CurrentValue);
            }
            $this->BulkDescription->EditValue = HtmlEncode($this->BulkDescription->CurrentValue);
            $this->BulkDescription->PlaceHolder = RemoveHtml($this->BulkDescription->caption());

            // BarCodeDescription
            $this->BarCodeDescription->EditAttrs["class"] = "form-control";
            $this->BarCodeDescription->EditCustomAttributes = "";
            if (!$this->BarCodeDescription->Raw) {
                $this->BarCodeDescription->CurrentValue = HtmlDecode($this->BarCodeDescription->CurrentValue);
            }
            $this->BarCodeDescription->EditValue = HtmlEncode($this->BarCodeDescription->CurrentValue);
            $this->BarCodeDescription->PlaceHolder = RemoveHtml($this->BarCodeDescription->caption());

            // PackageInformation
            $this->PackageInformation->EditAttrs["class"] = "form-control";
            $this->PackageInformation->EditCustomAttributes = "";
            if (!$this->PackageInformation->Raw) {
                $this->PackageInformation->CurrentValue = HtmlDecode($this->PackageInformation->CurrentValue);
            }
            $this->PackageInformation->EditValue = HtmlEncode($this->PackageInformation->CurrentValue);
            $this->PackageInformation->PlaceHolder = RemoveHtml($this->PackageInformation->caption());

            // PackageId
            $this->PackageId->EditAttrs["class"] = "form-control";
            $this->PackageId->EditCustomAttributes = "";
            $this->PackageId->EditValue = HtmlEncode($this->PackageId->CurrentValue);
            $this->PackageId->PlaceHolder = RemoveHtml($this->PackageId->caption());

            // Weight
            $this->Weight->EditAttrs["class"] = "form-control";
            $this->Weight->EditCustomAttributes = "";
            $this->Weight->EditValue = HtmlEncode($this->Weight->CurrentValue);
            $this->Weight->PlaceHolder = RemoveHtml($this->Weight->caption());
            if (strval($this->Weight->EditValue) != "" && is_numeric($this->Weight->EditValue)) {
                $this->Weight->EditValue = FormatNumber($this->Weight->EditValue, -2, -2, -2, -2);
            }

            // AllowFractions
            $this->AllowFractions->EditAttrs["class"] = "form-control";
            $this->AllowFractions->EditCustomAttributes = "";
            $this->AllowFractions->EditValue = HtmlEncode($this->AllowFractions->CurrentValue);
            $this->AllowFractions->PlaceHolder = RemoveHtml($this->AllowFractions->caption());

            // MinimumStockLevel
            $this->MinimumStockLevel->EditAttrs["class"] = "form-control";
            $this->MinimumStockLevel->EditCustomAttributes = "";
            $this->MinimumStockLevel->EditValue = HtmlEncode($this->MinimumStockLevel->CurrentValue);
            $this->MinimumStockLevel->PlaceHolder = RemoveHtml($this->MinimumStockLevel->caption());
            if (strval($this->MinimumStockLevel->EditValue) != "" && is_numeric($this->MinimumStockLevel->EditValue)) {
                $this->MinimumStockLevel->EditValue = FormatNumber($this->MinimumStockLevel->EditValue, -2, -2, -2, -2);
            }

            // MaximumStockLevel
            $this->MaximumStockLevel->EditAttrs["class"] = "form-control";
            $this->MaximumStockLevel->EditCustomAttributes = "";
            $this->MaximumStockLevel->EditValue = HtmlEncode($this->MaximumStockLevel->CurrentValue);
            $this->MaximumStockLevel->PlaceHolder = RemoveHtml($this->MaximumStockLevel->caption());
            if (strval($this->MaximumStockLevel->EditValue) != "" && is_numeric($this->MaximumStockLevel->EditValue)) {
                $this->MaximumStockLevel->EditValue = FormatNumber($this->MaximumStockLevel->EditValue, -2, -2, -2, -2);
            }

            // ReorderLevel
            $this->ReorderLevel->EditAttrs["class"] = "form-control";
            $this->ReorderLevel->EditCustomAttributes = "";
            $this->ReorderLevel->EditValue = HtmlEncode($this->ReorderLevel->CurrentValue);
            $this->ReorderLevel->PlaceHolder = RemoveHtml($this->ReorderLevel->caption());
            if (strval($this->ReorderLevel->EditValue) != "" && is_numeric($this->ReorderLevel->EditValue)) {
                $this->ReorderLevel->EditValue = FormatNumber($this->ReorderLevel->EditValue, -2, -2, -2, -2);
            }

            // MinMaxRatio
            $this->MinMaxRatio->EditAttrs["class"] = "form-control";
            $this->MinMaxRatio->EditCustomAttributes = "";
            $this->MinMaxRatio->EditValue = HtmlEncode($this->MinMaxRatio->CurrentValue);
            $this->MinMaxRatio->PlaceHolder = RemoveHtml($this->MinMaxRatio->caption());
            if (strval($this->MinMaxRatio->EditValue) != "" && is_numeric($this->MinMaxRatio->EditValue)) {
                $this->MinMaxRatio->EditValue = FormatNumber($this->MinMaxRatio->EditValue, -2, -2, -2, -2);
            }

            // AutoMinMaxRatio
            $this->AutoMinMaxRatio->EditAttrs["class"] = "form-control";
            $this->AutoMinMaxRatio->EditCustomAttributes = "";
            $this->AutoMinMaxRatio->EditValue = HtmlEncode($this->AutoMinMaxRatio->CurrentValue);
            $this->AutoMinMaxRatio->PlaceHolder = RemoveHtml($this->AutoMinMaxRatio->caption());
            if (strval($this->AutoMinMaxRatio->EditValue) != "" && is_numeric($this->AutoMinMaxRatio->EditValue)) {
                $this->AutoMinMaxRatio->EditValue = FormatNumber($this->AutoMinMaxRatio->EditValue, -2, -2, -2, -2);
            }

            // ScheduleCode
            $this->ScheduleCode->EditAttrs["class"] = "form-control";
            $this->ScheduleCode->EditCustomAttributes = "";
            $this->ScheduleCode->EditValue = HtmlEncode($this->ScheduleCode->CurrentValue);
            $this->ScheduleCode->PlaceHolder = RemoveHtml($this->ScheduleCode->caption());

            // RopRatio
            $this->RopRatio->EditAttrs["class"] = "form-control";
            $this->RopRatio->EditCustomAttributes = "";
            $this->RopRatio->EditValue = HtmlEncode($this->RopRatio->CurrentValue);
            $this->RopRatio->PlaceHolder = RemoveHtml($this->RopRatio->caption());
            if (strval($this->RopRatio->EditValue) != "" && is_numeric($this->RopRatio->EditValue)) {
                $this->RopRatio->EditValue = FormatNumber($this->RopRatio->EditValue, -2, -2, -2, -2);
            }

            // MRP
            $this->MRP->EditAttrs["class"] = "form-control";
            $this->MRP->EditCustomAttributes = "";
            $this->MRP->EditValue = HtmlEncode($this->MRP->CurrentValue);
            $this->MRP->PlaceHolder = RemoveHtml($this->MRP->caption());
            if (strval($this->MRP->EditValue) != "" && is_numeric($this->MRP->EditValue)) {
                $this->MRP->EditValue = FormatNumber($this->MRP->EditValue, -2, -2, -2, -2);
            }

            // PurchasePrice
            $this->PurchasePrice->EditAttrs["class"] = "form-control";
            $this->PurchasePrice->EditCustomAttributes = "";
            $this->PurchasePrice->EditValue = HtmlEncode($this->PurchasePrice->CurrentValue);
            $this->PurchasePrice->PlaceHolder = RemoveHtml($this->PurchasePrice->caption());
            if (strval($this->PurchasePrice->EditValue) != "" && is_numeric($this->PurchasePrice->EditValue)) {
                $this->PurchasePrice->EditValue = FormatNumber($this->PurchasePrice->EditValue, -2, -2, -2, -2);
            }

            // PurchaseUnit
            $this->PurchaseUnit->EditAttrs["class"] = "form-control";
            $this->PurchaseUnit->EditCustomAttributes = "";
            $this->PurchaseUnit->EditValue = HtmlEncode($this->PurchaseUnit->CurrentValue);
            $this->PurchaseUnit->PlaceHolder = RemoveHtml($this->PurchaseUnit->caption());
            if (strval($this->PurchaseUnit->EditValue) != "" && is_numeric($this->PurchaseUnit->EditValue)) {
                $this->PurchaseUnit->EditValue = FormatNumber($this->PurchaseUnit->EditValue, -2, -2, -2, -2);
            }

            // PurchaseTaxCode
            $this->PurchaseTaxCode->EditAttrs["class"] = "form-control";
            $this->PurchaseTaxCode->EditCustomAttributes = "";
            $this->PurchaseTaxCode->EditValue = HtmlEncode($this->PurchaseTaxCode->CurrentValue);
            $this->PurchaseTaxCode->PlaceHolder = RemoveHtml($this->PurchaseTaxCode->caption());

            // AllowDirectInward
            $this->AllowDirectInward->EditAttrs["class"] = "form-control";
            $this->AllowDirectInward->EditCustomAttributes = "";
            $this->AllowDirectInward->EditValue = HtmlEncode($this->AllowDirectInward->CurrentValue);
            $this->AllowDirectInward->PlaceHolder = RemoveHtml($this->AllowDirectInward->caption());

            // SalePrice
            $this->SalePrice->EditAttrs["class"] = "form-control";
            $this->SalePrice->EditCustomAttributes = "";
            $this->SalePrice->EditValue = HtmlEncode($this->SalePrice->CurrentValue);
            $this->SalePrice->PlaceHolder = RemoveHtml($this->SalePrice->caption());
            if (strval($this->SalePrice->EditValue) != "" && is_numeric($this->SalePrice->EditValue)) {
                $this->SalePrice->EditValue = FormatNumber($this->SalePrice->EditValue, -2, -2, -2, -2);
            }

            // SaleUnit
            $this->SaleUnit->EditAttrs["class"] = "form-control";
            $this->SaleUnit->EditCustomAttributes = "";
            $this->SaleUnit->EditValue = HtmlEncode($this->SaleUnit->CurrentValue);
            $this->SaleUnit->PlaceHolder = RemoveHtml($this->SaleUnit->caption());
            if (strval($this->SaleUnit->EditValue) != "" && is_numeric($this->SaleUnit->EditValue)) {
                $this->SaleUnit->EditValue = FormatNumber($this->SaleUnit->EditValue, -2, -2, -2, -2);
            }

            // SalesTaxCode
            $this->SalesTaxCode->EditAttrs["class"] = "form-control";
            $this->SalesTaxCode->EditCustomAttributes = "";
            $this->SalesTaxCode->EditValue = HtmlEncode($this->SalesTaxCode->CurrentValue);
            $this->SalesTaxCode->PlaceHolder = RemoveHtml($this->SalesTaxCode->caption());

            // StockReceived
            $this->StockReceived->EditAttrs["class"] = "form-control";
            $this->StockReceived->EditCustomAttributes = "";
            $this->StockReceived->EditValue = HtmlEncode($this->StockReceived->CurrentValue);
            $this->StockReceived->PlaceHolder = RemoveHtml($this->StockReceived->caption());
            if (strval($this->StockReceived->EditValue) != "" && is_numeric($this->StockReceived->EditValue)) {
                $this->StockReceived->EditValue = FormatNumber($this->StockReceived->EditValue, -2, -2, -2, -2);
            }

            // TotalStock
            $this->TotalStock->EditAttrs["class"] = "form-control";
            $this->TotalStock->EditCustomAttributes = "";
            $this->TotalStock->EditValue = HtmlEncode($this->TotalStock->CurrentValue);
            $this->TotalStock->PlaceHolder = RemoveHtml($this->TotalStock->caption());
            if (strval($this->TotalStock->EditValue) != "" && is_numeric($this->TotalStock->EditValue)) {
                $this->TotalStock->EditValue = FormatNumber($this->TotalStock->EditValue, -2, -2, -2, -2);
            }

            // StockType
            $this->StockType->EditAttrs["class"] = "form-control";
            $this->StockType->EditCustomAttributes = "";
            $this->StockType->EditValue = HtmlEncode($this->StockType->CurrentValue);
            $this->StockType->PlaceHolder = RemoveHtml($this->StockType->caption());

            // StockCheckDate
            $this->StockCheckDate->EditAttrs["class"] = "form-control";
            $this->StockCheckDate->EditCustomAttributes = "";
            $this->StockCheckDate->EditValue = HtmlEncode(FormatDateTime($this->StockCheckDate->CurrentValue, 8));
            $this->StockCheckDate->PlaceHolder = RemoveHtml($this->StockCheckDate->caption());

            // StockAdjustmentDate
            $this->StockAdjustmentDate->EditAttrs["class"] = "form-control";
            $this->StockAdjustmentDate->EditCustomAttributes = "";
            $this->StockAdjustmentDate->EditValue = HtmlEncode(FormatDateTime($this->StockAdjustmentDate->CurrentValue, 8));
            $this->StockAdjustmentDate->PlaceHolder = RemoveHtml($this->StockAdjustmentDate->caption());

            // Remarks
            $this->Remarks->EditAttrs["class"] = "form-control";
            $this->Remarks->EditCustomAttributes = "";
            if (!$this->Remarks->Raw) {
                $this->Remarks->CurrentValue = HtmlDecode($this->Remarks->CurrentValue);
            }
            $this->Remarks->EditValue = HtmlEncode($this->Remarks->CurrentValue);
            $this->Remarks->PlaceHolder = RemoveHtml($this->Remarks->caption());

            // CostCentre
            $this->CostCentre->EditAttrs["class"] = "form-control";
            $this->CostCentre->EditCustomAttributes = "";
            $this->CostCentre->EditValue = HtmlEncode($this->CostCentre->CurrentValue);
            $this->CostCentre->PlaceHolder = RemoveHtml($this->CostCentre->caption());

            // ProductType
            $this->ProductType->EditAttrs["class"] = "form-control";
            $this->ProductType->EditCustomAttributes = "";
            $this->ProductType->EditValue = HtmlEncode($this->ProductType->CurrentValue);
            $this->ProductType->PlaceHolder = RemoveHtml($this->ProductType->caption());

            // TaxAmount
            $this->TaxAmount->EditAttrs["class"] = "form-control";
            $this->TaxAmount->EditCustomAttributes = "";
            $this->TaxAmount->EditValue = HtmlEncode($this->TaxAmount->CurrentValue);
            $this->TaxAmount->PlaceHolder = RemoveHtml($this->TaxAmount->caption());
            if (strval($this->TaxAmount->EditValue) != "" && is_numeric($this->TaxAmount->EditValue)) {
                $this->TaxAmount->EditValue = FormatNumber($this->TaxAmount->EditValue, -2, -2, -2, -2);
            }

            // TaxId
            $this->TaxId->EditAttrs["class"] = "form-control";
            $this->TaxId->EditCustomAttributes = "";
            $this->TaxId->EditValue = HtmlEncode($this->TaxId->CurrentValue);
            $this->TaxId->PlaceHolder = RemoveHtml($this->TaxId->caption());

            // ResaleTaxApplicable
            $this->ResaleTaxApplicable->EditAttrs["class"] = "form-control";
            $this->ResaleTaxApplicable->EditCustomAttributes = "";
            $this->ResaleTaxApplicable->EditValue = HtmlEncode($this->ResaleTaxApplicable->CurrentValue);
            $this->ResaleTaxApplicable->PlaceHolder = RemoveHtml($this->ResaleTaxApplicable->caption());

            // CstOtherTax
            $this->CstOtherTax->EditAttrs["class"] = "form-control";
            $this->CstOtherTax->EditCustomAttributes = "";
            if (!$this->CstOtherTax->Raw) {
                $this->CstOtherTax->CurrentValue = HtmlDecode($this->CstOtherTax->CurrentValue);
            }
            $this->CstOtherTax->EditValue = HtmlEncode($this->CstOtherTax->CurrentValue);
            $this->CstOtherTax->PlaceHolder = RemoveHtml($this->CstOtherTax->caption());

            // TotalTax
            $this->TotalTax->EditAttrs["class"] = "form-control";
            $this->TotalTax->EditCustomAttributes = "";
            $this->TotalTax->EditValue = HtmlEncode($this->TotalTax->CurrentValue);
            $this->TotalTax->PlaceHolder = RemoveHtml($this->TotalTax->caption());
            if (strval($this->TotalTax->EditValue) != "" && is_numeric($this->TotalTax->EditValue)) {
                $this->TotalTax->EditValue = FormatNumber($this->TotalTax->EditValue, -2, -2, -2, -2);
            }

            // ItemCost
            $this->ItemCost->EditAttrs["class"] = "form-control";
            $this->ItemCost->EditCustomAttributes = "";
            $this->ItemCost->EditValue = HtmlEncode($this->ItemCost->CurrentValue);
            $this->ItemCost->PlaceHolder = RemoveHtml($this->ItemCost->caption());
            if (strval($this->ItemCost->EditValue) != "" && is_numeric($this->ItemCost->EditValue)) {
                $this->ItemCost->EditValue = FormatNumber($this->ItemCost->EditValue, -2, -2, -2, -2);
            }

            // ExpiryDate
            $this->ExpiryDate->EditAttrs["class"] = "form-control";
            $this->ExpiryDate->EditCustomAttributes = "";
            $this->ExpiryDate->EditValue = HtmlEncode(FormatDateTime($this->ExpiryDate->CurrentValue, 8));
            $this->ExpiryDate->PlaceHolder = RemoveHtml($this->ExpiryDate->caption());

            // BatchDescription
            $this->BatchDescription->EditAttrs["class"] = "form-control";
            $this->BatchDescription->EditCustomAttributes = "";
            if (!$this->BatchDescription->Raw) {
                $this->BatchDescription->CurrentValue = HtmlDecode($this->BatchDescription->CurrentValue);
            }
            $this->BatchDescription->EditValue = HtmlEncode($this->BatchDescription->CurrentValue);
            $this->BatchDescription->PlaceHolder = RemoveHtml($this->BatchDescription->caption());

            // FreeScheme
            $this->FreeScheme->EditAttrs["class"] = "form-control";
            $this->FreeScheme->EditCustomAttributes = "";
            $this->FreeScheme->EditValue = HtmlEncode($this->FreeScheme->CurrentValue);
            $this->FreeScheme->PlaceHolder = RemoveHtml($this->FreeScheme->caption());

            // CashDiscountEligibility
            $this->CashDiscountEligibility->EditAttrs["class"] = "form-control";
            $this->CashDiscountEligibility->EditCustomAttributes = "";
            $this->CashDiscountEligibility->EditValue = HtmlEncode($this->CashDiscountEligibility->CurrentValue);
            $this->CashDiscountEligibility->PlaceHolder = RemoveHtml($this->CashDiscountEligibility->caption());

            // DiscountPerAllowInBill
            $this->DiscountPerAllowInBill->EditAttrs["class"] = "form-control";
            $this->DiscountPerAllowInBill->EditCustomAttributes = "";
            $this->DiscountPerAllowInBill->EditValue = HtmlEncode($this->DiscountPerAllowInBill->CurrentValue);
            $this->DiscountPerAllowInBill->PlaceHolder = RemoveHtml($this->DiscountPerAllowInBill->caption());
            if (strval($this->DiscountPerAllowInBill->EditValue) != "" && is_numeric($this->DiscountPerAllowInBill->EditValue)) {
                $this->DiscountPerAllowInBill->EditValue = FormatNumber($this->DiscountPerAllowInBill->EditValue, -2, -2, -2, -2);
            }

            // Discount
            $this->Discount->EditAttrs["class"] = "form-control";
            $this->Discount->EditCustomAttributes = "";
            $this->Discount->EditValue = HtmlEncode($this->Discount->CurrentValue);
            $this->Discount->PlaceHolder = RemoveHtml($this->Discount->caption());
            if (strval($this->Discount->EditValue) != "" && is_numeric($this->Discount->EditValue)) {
                $this->Discount->EditValue = FormatNumber($this->Discount->EditValue, -2, -2, -2, -2);
            }

            // TotalAmount
            $this->TotalAmount->EditAttrs["class"] = "form-control";
            $this->TotalAmount->EditCustomAttributes = "";
            $this->TotalAmount->EditValue = HtmlEncode($this->TotalAmount->CurrentValue);
            $this->TotalAmount->PlaceHolder = RemoveHtml($this->TotalAmount->caption());
            if (strval($this->TotalAmount->EditValue) != "" && is_numeric($this->TotalAmount->EditValue)) {
                $this->TotalAmount->EditValue = FormatNumber($this->TotalAmount->EditValue, -2, -2, -2, -2);
            }

            // StandardMargin
            $this->StandardMargin->EditAttrs["class"] = "form-control";
            $this->StandardMargin->EditCustomAttributes = "";
            $this->StandardMargin->EditValue = HtmlEncode($this->StandardMargin->CurrentValue);
            $this->StandardMargin->PlaceHolder = RemoveHtml($this->StandardMargin->caption());
            if (strval($this->StandardMargin->EditValue) != "" && is_numeric($this->StandardMargin->EditValue)) {
                $this->StandardMargin->EditValue = FormatNumber($this->StandardMargin->EditValue, -2, -2, -2, -2);
            }

            // Margin
            $this->Margin->EditAttrs["class"] = "form-control";
            $this->Margin->EditCustomAttributes = "";
            $this->Margin->EditValue = HtmlEncode($this->Margin->CurrentValue);
            $this->Margin->PlaceHolder = RemoveHtml($this->Margin->caption());
            if (strval($this->Margin->EditValue) != "" && is_numeric($this->Margin->EditValue)) {
                $this->Margin->EditValue = FormatNumber($this->Margin->EditValue, -2, -2, -2, -2);
            }

            // MarginId
            $this->MarginId->EditAttrs["class"] = "form-control";
            $this->MarginId->EditCustomAttributes = "";
            $this->MarginId->EditValue = HtmlEncode($this->MarginId->CurrentValue);
            $this->MarginId->PlaceHolder = RemoveHtml($this->MarginId->caption());

            // ExpectedMargin
            $this->ExpectedMargin->EditAttrs["class"] = "form-control";
            $this->ExpectedMargin->EditCustomAttributes = "";
            $this->ExpectedMargin->EditValue = HtmlEncode($this->ExpectedMargin->CurrentValue);
            $this->ExpectedMargin->PlaceHolder = RemoveHtml($this->ExpectedMargin->caption());
            if (strval($this->ExpectedMargin->EditValue) != "" && is_numeric($this->ExpectedMargin->EditValue)) {
                $this->ExpectedMargin->EditValue = FormatNumber($this->ExpectedMargin->EditValue, -2, -2, -2, -2);
            }

            // SurchargeBeforeTax
            $this->SurchargeBeforeTax->EditAttrs["class"] = "form-control";
            $this->SurchargeBeforeTax->EditCustomAttributes = "";
            $this->SurchargeBeforeTax->EditValue = HtmlEncode($this->SurchargeBeforeTax->CurrentValue);
            $this->SurchargeBeforeTax->PlaceHolder = RemoveHtml($this->SurchargeBeforeTax->caption());
            if (strval($this->SurchargeBeforeTax->EditValue) != "" && is_numeric($this->SurchargeBeforeTax->EditValue)) {
                $this->SurchargeBeforeTax->EditValue = FormatNumber($this->SurchargeBeforeTax->EditValue, -2, -2, -2, -2);
            }

            // SurchargeAfterTax
            $this->SurchargeAfterTax->EditAttrs["class"] = "form-control";
            $this->SurchargeAfterTax->EditCustomAttributes = "";
            $this->SurchargeAfterTax->EditValue = HtmlEncode($this->SurchargeAfterTax->CurrentValue);
            $this->SurchargeAfterTax->PlaceHolder = RemoveHtml($this->SurchargeAfterTax->caption());
            if (strval($this->SurchargeAfterTax->EditValue) != "" && is_numeric($this->SurchargeAfterTax->EditValue)) {
                $this->SurchargeAfterTax->EditValue = FormatNumber($this->SurchargeAfterTax->EditValue, -2, -2, -2, -2);
            }

            // TempOrderNo
            $this->TempOrderNo->EditAttrs["class"] = "form-control";
            $this->TempOrderNo->EditCustomAttributes = "";
            $this->TempOrderNo->EditValue = HtmlEncode($this->TempOrderNo->CurrentValue);
            $this->TempOrderNo->PlaceHolder = RemoveHtml($this->TempOrderNo->caption());

            // TempOrderDate
            $this->TempOrderDate->EditAttrs["class"] = "form-control";
            $this->TempOrderDate->EditCustomAttributes = "";
            $this->TempOrderDate->EditValue = HtmlEncode(FormatDateTime($this->TempOrderDate->CurrentValue, 8));
            $this->TempOrderDate->PlaceHolder = RemoveHtml($this->TempOrderDate->caption());

            // OrderUnit
            $this->OrderUnit->EditAttrs["class"] = "form-control";
            $this->OrderUnit->EditCustomAttributes = "";
            $this->OrderUnit->EditValue = HtmlEncode($this->OrderUnit->CurrentValue);
            $this->OrderUnit->PlaceHolder = RemoveHtml($this->OrderUnit->caption());
            if (strval($this->OrderUnit->EditValue) != "" && is_numeric($this->OrderUnit->EditValue)) {
                $this->OrderUnit->EditValue = FormatNumber($this->OrderUnit->EditValue, -2, -2, -2, -2);
            }

            // OrderQuantity
            $this->OrderQuantity->EditAttrs["class"] = "form-control";
            $this->OrderQuantity->EditCustomAttributes = "";
            $this->OrderQuantity->EditValue = HtmlEncode($this->OrderQuantity->CurrentValue);
            $this->OrderQuantity->PlaceHolder = RemoveHtml($this->OrderQuantity->caption());
            if (strval($this->OrderQuantity->EditValue) != "" && is_numeric($this->OrderQuantity->EditValue)) {
                $this->OrderQuantity->EditValue = FormatNumber($this->OrderQuantity->EditValue, -2, -2, -2, -2);
            }

            // MarkForOrder
            $this->MarkForOrder->EditAttrs["class"] = "form-control";
            $this->MarkForOrder->EditCustomAttributes = "";
            $this->MarkForOrder->EditValue = HtmlEncode($this->MarkForOrder->CurrentValue);
            $this->MarkForOrder->PlaceHolder = RemoveHtml($this->MarkForOrder->caption());

            // OrderAllId
            $this->OrderAllId->EditAttrs["class"] = "form-control";
            $this->OrderAllId->EditCustomAttributes = "";
            $this->OrderAllId->EditValue = HtmlEncode($this->OrderAllId->CurrentValue);
            $this->OrderAllId->PlaceHolder = RemoveHtml($this->OrderAllId->caption());

            // CalculateOrderQty
            $this->CalculateOrderQty->EditAttrs["class"] = "form-control";
            $this->CalculateOrderQty->EditCustomAttributes = "";
            $this->CalculateOrderQty->EditValue = HtmlEncode($this->CalculateOrderQty->CurrentValue);
            $this->CalculateOrderQty->PlaceHolder = RemoveHtml($this->CalculateOrderQty->caption());
            if (strval($this->CalculateOrderQty->EditValue) != "" && is_numeric($this->CalculateOrderQty->EditValue)) {
                $this->CalculateOrderQty->EditValue = FormatNumber($this->CalculateOrderQty->EditValue, -2, -2, -2, -2);
            }

            // SubLocation
            $this->SubLocation->EditAttrs["class"] = "form-control";
            $this->SubLocation->EditCustomAttributes = "";
            if (!$this->SubLocation->Raw) {
                $this->SubLocation->CurrentValue = HtmlDecode($this->SubLocation->CurrentValue);
            }
            $this->SubLocation->EditValue = HtmlEncode($this->SubLocation->CurrentValue);
            $this->SubLocation->PlaceHolder = RemoveHtml($this->SubLocation->caption());

            // CategoryCode
            $this->CategoryCode->EditAttrs["class"] = "form-control";
            $this->CategoryCode->EditCustomAttributes = "";
            if (!$this->CategoryCode->Raw) {
                $this->CategoryCode->CurrentValue = HtmlDecode($this->CategoryCode->CurrentValue);
            }
            $this->CategoryCode->EditValue = HtmlEncode($this->CategoryCode->CurrentValue);
            $this->CategoryCode->PlaceHolder = RemoveHtml($this->CategoryCode->caption());

            // SubCategory
            $this->SubCategory->EditAttrs["class"] = "form-control";
            $this->SubCategory->EditCustomAttributes = "";
            if (!$this->SubCategory->Raw) {
                $this->SubCategory->CurrentValue = HtmlDecode($this->SubCategory->CurrentValue);
            }
            $this->SubCategory->EditValue = HtmlEncode($this->SubCategory->CurrentValue);
            $this->SubCategory->PlaceHolder = RemoveHtml($this->SubCategory->caption());

            // FlexCategoryCode
            $this->FlexCategoryCode->EditAttrs["class"] = "form-control";
            $this->FlexCategoryCode->EditCustomAttributes = "";
            $this->FlexCategoryCode->EditValue = HtmlEncode($this->FlexCategoryCode->CurrentValue);
            $this->FlexCategoryCode->PlaceHolder = RemoveHtml($this->FlexCategoryCode->caption());

            // ABCSaleQty
            $this->ABCSaleQty->EditAttrs["class"] = "form-control";
            $this->ABCSaleQty->EditCustomAttributes = "";
            $this->ABCSaleQty->EditValue = HtmlEncode($this->ABCSaleQty->CurrentValue);
            $this->ABCSaleQty->PlaceHolder = RemoveHtml($this->ABCSaleQty->caption());
            if (strval($this->ABCSaleQty->EditValue) != "" && is_numeric($this->ABCSaleQty->EditValue)) {
                $this->ABCSaleQty->EditValue = FormatNumber($this->ABCSaleQty->EditValue, -2, -2, -2, -2);
            }

            // ABCSaleValue
            $this->ABCSaleValue->EditAttrs["class"] = "form-control";
            $this->ABCSaleValue->EditCustomAttributes = "";
            $this->ABCSaleValue->EditValue = HtmlEncode($this->ABCSaleValue->CurrentValue);
            $this->ABCSaleValue->PlaceHolder = RemoveHtml($this->ABCSaleValue->caption());
            if (strval($this->ABCSaleValue->EditValue) != "" && is_numeric($this->ABCSaleValue->EditValue)) {
                $this->ABCSaleValue->EditValue = FormatNumber($this->ABCSaleValue->EditValue, -2, -2, -2, -2);
            }

            // ConvertionFactor
            $this->ConvertionFactor->EditAttrs["class"] = "form-control";
            $this->ConvertionFactor->EditCustomAttributes = "";
            $this->ConvertionFactor->EditValue = HtmlEncode($this->ConvertionFactor->CurrentValue);
            $this->ConvertionFactor->PlaceHolder = RemoveHtml($this->ConvertionFactor->caption());

            // ConvertionUnitDesc
            $this->ConvertionUnitDesc->EditAttrs["class"] = "form-control";
            $this->ConvertionUnitDesc->EditCustomAttributes = "";
            if (!$this->ConvertionUnitDesc->Raw) {
                $this->ConvertionUnitDesc->CurrentValue = HtmlDecode($this->ConvertionUnitDesc->CurrentValue);
            }
            $this->ConvertionUnitDesc->EditValue = HtmlEncode($this->ConvertionUnitDesc->CurrentValue);
            $this->ConvertionUnitDesc->PlaceHolder = RemoveHtml($this->ConvertionUnitDesc->caption());

            // TransactionId
            $this->TransactionId->EditAttrs["class"] = "form-control";
            $this->TransactionId->EditCustomAttributes = "";
            $this->TransactionId->EditValue = HtmlEncode($this->TransactionId->CurrentValue);
            $this->TransactionId->PlaceHolder = RemoveHtml($this->TransactionId->caption());

            // SoldProductId
            $this->SoldProductId->EditAttrs["class"] = "form-control";
            $this->SoldProductId->EditCustomAttributes = "";
            $this->SoldProductId->EditValue = HtmlEncode($this->SoldProductId->CurrentValue);
            $this->SoldProductId->PlaceHolder = RemoveHtml($this->SoldProductId->caption());

            // WantedBookId
            $this->WantedBookId->EditAttrs["class"] = "form-control";
            $this->WantedBookId->EditCustomAttributes = "";
            $this->WantedBookId->EditValue = HtmlEncode($this->WantedBookId->CurrentValue);
            $this->WantedBookId->PlaceHolder = RemoveHtml($this->WantedBookId->caption());

            // AllId
            $this->AllId->EditAttrs["class"] = "form-control";
            $this->AllId->EditCustomAttributes = "";
            $this->AllId->EditValue = HtmlEncode($this->AllId->CurrentValue);
            $this->AllId->PlaceHolder = RemoveHtml($this->AllId->caption());

            // BatchAndExpiryCompulsory
            $this->BatchAndExpiryCompulsory->EditAttrs["class"] = "form-control";
            $this->BatchAndExpiryCompulsory->EditCustomAttributes = "";
            $this->BatchAndExpiryCompulsory->EditValue = HtmlEncode($this->BatchAndExpiryCompulsory->CurrentValue);
            $this->BatchAndExpiryCompulsory->PlaceHolder = RemoveHtml($this->BatchAndExpiryCompulsory->caption());

            // BatchStockForWantedBook
            $this->BatchStockForWantedBook->EditAttrs["class"] = "form-control";
            $this->BatchStockForWantedBook->EditCustomAttributes = "";
            $this->BatchStockForWantedBook->EditValue = HtmlEncode($this->BatchStockForWantedBook->CurrentValue);
            $this->BatchStockForWantedBook->PlaceHolder = RemoveHtml($this->BatchStockForWantedBook->caption());

            // UnitBasedBilling
            $this->UnitBasedBilling->EditAttrs["class"] = "form-control";
            $this->UnitBasedBilling->EditCustomAttributes = "";
            $this->UnitBasedBilling->EditValue = HtmlEncode($this->UnitBasedBilling->CurrentValue);
            $this->UnitBasedBilling->PlaceHolder = RemoveHtml($this->UnitBasedBilling->caption());

            // DoNotCheckStock
            $this->DoNotCheckStock->EditAttrs["class"] = "form-control";
            $this->DoNotCheckStock->EditCustomAttributes = "";
            $this->DoNotCheckStock->EditValue = HtmlEncode($this->DoNotCheckStock->CurrentValue);
            $this->DoNotCheckStock->PlaceHolder = RemoveHtml($this->DoNotCheckStock->caption());

            // AcceptRate
            $this->AcceptRate->EditAttrs["class"] = "form-control";
            $this->AcceptRate->EditCustomAttributes = "";
            $this->AcceptRate->EditValue = HtmlEncode($this->AcceptRate->CurrentValue);
            $this->AcceptRate->PlaceHolder = RemoveHtml($this->AcceptRate->caption());

            // PriceLevel
            $this->PriceLevel->EditAttrs["class"] = "form-control";
            $this->PriceLevel->EditCustomAttributes = "";
            $this->PriceLevel->EditValue = HtmlEncode($this->PriceLevel->CurrentValue);
            $this->PriceLevel->PlaceHolder = RemoveHtml($this->PriceLevel->caption());

            // LastQuotePrice
            $this->LastQuotePrice->EditAttrs["class"] = "form-control";
            $this->LastQuotePrice->EditCustomAttributes = "";
            $this->LastQuotePrice->EditValue = HtmlEncode($this->LastQuotePrice->CurrentValue);
            $this->LastQuotePrice->PlaceHolder = RemoveHtml($this->LastQuotePrice->caption());
            if (strval($this->LastQuotePrice->EditValue) != "" && is_numeric($this->LastQuotePrice->EditValue)) {
                $this->LastQuotePrice->EditValue = FormatNumber($this->LastQuotePrice->EditValue, -2, -2, -2, -2);
            }

            // PriceChange
            $this->PriceChange->EditAttrs["class"] = "form-control";
            $this->PriceChange->EditCustomAttributes = "";
            $this->PriceChange->EditValue = HtmlEncode($this->PriceChange->CurrentValue);
            $this->PriceChange->PlaceHolder = RemoveHtml($this->PriceChange->caption());
            if (strval($this->PriceChange->EditValue) != "" && is_numeric($this->PriceChange->EditValue)) {
                $this->PriceChange->EditValue = FormatNumber($this->PriceChange->EditValue, -2, -2, -2, -2);
            }

            // CommodityCode
            $this->CommodityCode->EditAttrs["class"] = "form-control";
            $this->CommodityCode->EditCustomAttributes = "";
            if (!$this->CommodityCode->Raw) {
                $this->CommodityCode->CurrentValue = HtmlDecode($this->CommodityCode->CurrentValue);
            }
            $this->CommodityCode->EditValue = HtmlEncode($this->CommodityCode->CurrentValue);
            $this->CommodityCode->PlaceHolder = RemoveHtml($this->CommodityCode->caption());

            // InstitutePrice
            $this->InstitutePrice->EditAttrs["class"] = "form-control";
            $this->InstitutePrice->EditCustomAttributes = "";
            $this->InstitutePrice->EditValue = HtmlEncode($this->InstitutePrice->CurrentValue);
            $this->InstitutePrice->PlaceHolder = RemoveHtml($this->InstitutePrice->caption());
            if (strval($this->InstitutePrice->EditValue) != "" && is_numeric($this->InstitutePrice->EditValue)) {
                $this->InstitutePrice->EditValue = FormatNumber($this->InstitutePrice->EditValue, -2, -2, -2, -2);
            }

            // CtrlOrDCtrlProduct
            $this->CtrlOrDCtrlProduct->EditAttrs["class"] = "form-control";
            $this->CtrlOrDCtrlProduct->EditCustomAttributes = "";
            $this->CtrlOrDCtrlProduct->EditValue = HtmlEncode($this->CtrlOrDCtrlProduct->CurrentValue);
            $this->CtrlOrDCtrlProduct->PlaceHolder = RemoveHtml($this->CtrlOrDCtrlProduct->caption());

            // ImportedDate
            $this->ImportedDate->EditAttrs["class"] = "form-control";
            $this->ImportedDate->EditCustomAttributes = "";
            $this->ImportedDate->EditValue = HtmlEncode(FormatDateTime($this->ImportedDate->CurrentValue, 8));
            $this->ImportedDate->PlaceHolder = RemoveHtml($this->ImportedDate->caption());

            // IsImported
            $this->IsImported->EditAttrs["class"] = "form-control";
            $this->IsImported->EditCustomAttributes = "";
            $this->IsImported->EditValue = HtmlEncode($this->IsImported->CurrentValue);
            $this->IsImported->PlaceHolder = RemoveHtml($this->IsImported->caption());

            // FileName
            $this->FileName->EditAttrs["class"] = "form-control";
            $this->FileName->EditCustomAttributes = "";
            if (!$this->FileName->Raw) {
                $this->FileName->CurrentValue = HtmlDecode($this->FileName->CurrentValue);
            }
            $this->FileName->EditValue = HtmlEncode($this->FileName->CurrentValue);
            $this->FileName->PlaceHolder = RemoveHtml($this->FileName->caption());

            // LPName
            $this->LPName->EditAttrs["class"] = "form-control";
            $this->LPName->EditCustomAttributes = "";
            $this->LPName->EditValue = HtmlEncode($this->LPName->CurrentValue);
            $this->LPName->PlaceHolder = RemoveHtml($this->LPName->caption());

            // GodownNumber
            $this->GodownNumber->EditAttrs["class"] = "form-control";
            $this->GodownNumber->EditCustomAttributes = "";
            $this->GodownNumber->EditValue = HtmlEncode($this->GodownNumber->CurrentValue);
            $this->GodownNumber->PlaceHolder = RemoveHtml($this->GodownNumber->caption());

            // CreationDate
            $this->CreationDate->EditAttrs["class"] = "form-control";
            $this->CreationDate->EditCustomAttributes = "";
            $this->CreationDate->EditValue = HtmlEncode(FormatDateTime($this->CreationDate->CurrentValue, 8));
            $this->CreationDate->PlaceHolder = RemoveHtml($this->CreationDate->caption());

            // CreatedbyUser
            $this->CreatedbyUser->EditAttrs["class"] = "form-control";
            $this->CreatedbyUser->EditCustomAttributes = "";
            if (!$this->CreatedbyUser->Raw) {
                $this->CreatedbyUser->CurrentValue = HtmlDecode($this->CreatedbyUser->CurrentValue);
            }
            $this->CreatedbyUser->EditValue = HtmlEncode($this->CreatedbyUser->CurrentValue);
            $this->CreatedbyUser->PlaceHolder = RemoveHtml($this->CreatedbyUser->caption());

            // ModifiedDate
            $this->ModifiedDate->EditAttrs["class"] = "form-control";
            $this->ModifiedDate->EditCustomAttributes = "";
            $this->ModifiedDate->EditValue = HtmlEncode(FormatDateTime($this->ModifiedDate->CurrentValue, 8));
            $this->ModifiedDate->PlaceHolder = RemoveHtml($this->ModifiedDate->caption());

            // ModifiedbyUser
            $this->ModifiedbyUser->EditAttrs["class"] = "form-control";
            $this->ModifiedbyUser->EditCustomAttributes = "";
            if (!$this->ModifiedbyUser->Raw) {
                $this->ModifiedbyUser->CurrentValue = HtmlDecode($this->ModifiedbyUser->CurrentValue);
            }
            $this->ModifiedbyUser->EditValue = HtmlEncode($this->ModifiedbyUser->CurrentValue);
            $this->ModifiedbyUser->PlaceHolder = RemoveHtml($this->ModifiedbyUser->caption());

            // isActive
            $this->isActive->EditAttrs["class"] = "form-control";
            $this->isActive->EditCustomAttributes = "";
            $this->isActive->EditValue = HtmlEncode($this->isActive->CurrentValue);
            $this->isActive->PlaceHolder = RemoveHtml($this->isActive->caption());

            // AllowExpiryClaim
            $this->AllowExpiryClaim->EditAttrs["class"] = "form-control";
            $this->AllowExpiryClaim->EditCustomAttributes = "";
            $this->AllowExpiryClaim->EditValue = HtmlEncode($this->AllowExpiryClaim->CurrentValue);
            $this->AllowExpiryClaim->PlaceHolder = RemoveHtml($this->AllowExpiryClaim->caption());

            // BrandCode
            $this->BrandCode->EditAttrs["class"] = "form-control";
            $this->BrandCode->EditCustomAttributes = "";
            $this->BrandCode->EditValue = HtmlEncode($this->BrandCode->CurrentValue);
            $this->BrandCode->PlaceHolder = RemoveHtml($this->BrandCode->caption());

            // FreeSchemeBasedon
            $this->FreeSchemeBasedon->EditAttrs["class"] = "form-control";
            $this->FreeSchemeBasedon->EditCustomAttributes = "";
            $this->FreeSchemeBasedon->EditValue = HtmlEncode($this->FreeSchemeBasedon->CurrentValue);
            $this->FreeSchemeBasedon->PlaceHolder = RemoveHtml($this->FreeSchemeBasedon->caption());

            // DoNotCheckCostInBill
            $this->DoNotCheckCostInBill->EditAttrs["class"] = "form-control";
            $this->DoNotCheckCostInBill->EditCustomAttributes = "";
            $this->DoNotCheckCostInBill->EditValue = HtmlEncode($this->DoNotCheckCostInBill->CurrentValue);
            $this->DoNotCheckCostInBill->PlaceHolder = RemoveHtml($this->DoNotCheckCostInBill->caption());

            // ProductGroupCode
            $this->ProductGroupCode->EditAttrs["class"] = "form-control";
            $this->ProductGroupCode->EditCustomAttributes = "";
            $this->ProductGroupCode->EditValue = HtmlEncode($this->ProductGroupCode->CurrentValue);
            $this->ProductGroupCode->PlaceHolder = RemoveHtml($this->ProductGroupCode->caption());

            // ProductStrengthCode
            $this->ProductStrengthCode->EditAttrs["class"] = "form-control";
            $this->ProductStrengthCode->EditCustomAttributes = "";
            $this->ProductStrengthCode->EditValue = HtmlEncode($this->ProductStrengthCode->CurrentValue);
            $this->ProductStrengthCode->PlaceHolder = RemoveHtml($this->ProductStrengthCode->caption());

            // PackingCode
            $this->PackingCode->EditAttrs["class"] = "form-control";
            $this->PackingCode->EditCustomAttributes = "";
            $this->PackingCode->EditValue = HtmlEncode($this->PackingCode->CurrentValue);
            $this->PackingCode->PlaceHolder = RemoveHtml($this->PackingCode->caption());

            // ComputedMinStock
            $this->ComputedMinStock->EditAttrs["class"] = "form-control";
            $this->ComputedMinStock->EditCustomAttributes = "";
            $this->ComputedMinStock->EditValue = HtmlEncode($this->ComputedMinStock->CurrentValue);
            $this->ComputedMinStock->PlaceHolder = RemoveHtml($this->ComputedMinStock->caption());
            if (strval($this->ComputedMinStock->EditValue) != "" && is_numeric($this->ComputedMinStock->EditValue)) {
                $this->ComputedMinStock->EditValue = FormatNumber($this->ComputedMinStock->EditValue, -2, -2, -2, -2);
            }

            // ComputedMaxStock
            $this->ComputedMaxStock->EditAttrs["class"] = "form-control";
            $this->ComputedMaxStock->EditCustomAttributes = "";
            $this->ComputedMaxStock->EditValue = HtmlEncode($this->ComputedMaxStock->CurrentValue);
            $this->ComputedMaxStock->PlaceHolder = RemoveHtml($this->ComputedMaxStock->caption());
            if (strval($this->ComputedMaxStock->EditValue) != "" && is_numeric($this->ComputedMaxStock->EditValue)) {
                $this->ComputedMaxStock->EditValue = FormatNumber($this->ComputedMaxStock->EditValue, -2, -2, -2, -2);
            }

            // ProductRemark
            $this->ProductRemark->EditAttrs["class"] = "form-control";
            $this->ProductRemark->EditCustomAttributes = "";
            $this->ProductRemark->EditValue = HtmlEncode($this->ProductRemark->CurrentValue);
            $this->ProductRemark->PlaceHolder = RemoveHtml($this->ProductRemark->caption());

            // ProductDrugCode
            $this->ProductDrugCode->EditAttrs["class"] = "form-control";
            $this->ProductDrugCode->EditCustomAttributes = "";
            $this->ProductDrugCode->EditValue = HtmlEncode($this->ProductDrugCode->CurrentValue);
            $this->ProductDrugCode->PlaceHolder = RemoveHtml($this->ProductDrugCode->caption());

            // IsMatrixProduct
            $this->IsMatrixProduct->EditAttrs["class"] = "form-control";
            $this->IsMatrixProduct->EditCustomAttributes = "";
            $this->IsMatrixProduct->EditValue = HtmlEncode($this->IsMatrixProduct->CurrentValue);
            $this->IsMatrixProduct->PlaceHolder = RemoveHtml($this->IsMatrixProduct->caption());

            // AttributeCount1
            $this->AttributeCount1->EditAttrs["class"] = "form-control";
            $this->AttributeCount1->EditCustomAttributes = "";
            $this->AttributeCount1->EditValue = HtmlEncode($this->AttributeCount1->CurrentValue);
            $this->AttributeCount1->PlaceHolder = RemoveHtml($this->AttributeCount1->caption());

            // AttributeCount2
            $this->AttributeCount2->EditAttrs["class"] = "form-control";
            $this->AttributeCount2->EditCustomAttributes = "";
            $this->AttributeCount2->EditValue = HtmlEncode($this->AttributeCount2->CurrentValue);
            $this->AttributeCount2->PlaceHolder = RemoveHtml($this->AttributeCount2->caption());

            // AttributeCount3
            $this->AttributeCount3->EditAttrs["class"] = "form-control";
            $this->AttributeCount3->EditCustomAttributes = "";
            $this->AttributeCount3->EditValue = HtmlEncode($this->AttributeCount3->CurrentValue);
            $this->AttributeCount3->PlaceHolder = RemoveHtml($this->AttributeCount3->caption());

            // AttributeCount4
            $this->AttributeCount4->EditAttrs["class"] = "form-control";
            $this->AttributeCount4->EditCustomAttributes = "";
            $this->AttributeCount4->EditValue = HtmlEncode($this->AttributeCount4->CurrentValue);
            $this->AttributeCount4->PlaceHolder = RemoveHtml($this->AttributeCount4->caption());

            // AttributeCount5
            $this->AttributeCount5->EditAttrs["class"] = "form-control";
            $this->AttributeCount5->EditCustomAttributes = "";
            $this->AttributeCount5->EditValue = HtmlEncode($this->AttributeCount5->CurrentValue);
            $this->AttributeCount5->PlaceHolder = RemoveHtml($this->AttributeCount5->caption());

            // DefaultDiscountPercentage
            $this->DefaultDiscountPercentage->EditAttrs["class"] = "form-control";
            $this->DefaultDiscountPercentage->EditCustomAttributes = "";
            $this->DefaultDiscountPercentage->EditValue = HtmlEncode($this->DefaultDiscountPercentage->CurrentValue);
            $this->DefaultDiscountPercentage->PlaceHolder = RemoveHtml($this->DefaultDiscountPercentage->caption());
            if (strval($this->DefaultDiscountPercentage->EditValue) != "" && is_numeric($this->DefaultDiscountPercentage->EditValue)) {
                $this->DefaultDiscountPercentage->EditValue = FormatNumber($this->DefaultDiscountPercentage->EditValue, -2, -2, -2, -2);
            }

            // DonotPrintBarcode
            $this->DonotPrintBarcode->EditAttrs["class"] = "form-control";
            $this->DonotPrintBarcode->EditCustomAttributes = "";
            $this->DonotPrintBarcode->EditValue = HtmlEncode($this->DonotPrintBarcode->CurrentValue);
            $this->DonotPrintBarcode->PlaceHolder = RemoveHtml($this->DonotPrintBarcode->caption());

            // ProductLevelDiscount
            $this->ProductLevelDiscount->EditAttrs["class"] = "form-control";
            $this->ProductLevelDiscount->EditCustomAttributes = "";
            $this->ProductLevelDiscount->EditValue = HtmlEncode($this->ProductLevelDiscount->CurrentValue);
            $this->ProductLevelDiscount->PlaceHolder = RemoveHtml($this->ProductLevelDiscount->caption());

            // Markup
            $this->Markup->EditAttrs["class"] = "form-control";
            $this->Markup->EditCustomAttributes = "";
            $this->Markup->EditValue = HtmlEncode($this->Markup->CurrentValue);
            $this->Markup->PlaceHolder = RemoveHtml($this->Markup->caption());
            if (strval($this->Markup->EditValue) != "" && is_numeric($this->Markup->EditValue)) {
                $this->Markup->EditValue = FormatNumber($this->Markup->EditValue, -2, -2, -2, -2);
            }

            // MarkDown
            $this->MarkDown->EditAttrs["class"] = "form-control";
            $this->MarkDown->EditCustomAttributes = "";
            $this->MarkDown->EditValue = HtmlEncode($this->MarkDown->CurrentValue);
            $this->MarkDown->PlaceHolder = RemoveHtml($this->MarkDown->caption());
            if (strval($this->MarkDown->EditValue) != "" && is_numeric($this->MarkDown->EditValue)) {
                $this->MarkDown->EditValue = FormatNumber($this->MarkDown->EditValue, -2, -2, -2, -2);
            }

            // ReworkSalePrice
            $this->ReworkSalePrice->EditAttrs["class"] = "form-control";
            $this->ReworkSalePrice->EditCustomAttributes = "";
            $this->ReworkSalePrice->EditValue = HtmlEncode($this->ReworkSalePrice->CurrentValue);
            $this->ReworkSalePrice->PlaceHolder = RemoveHtml($this->ReworkSalePrice->caption());

            // MultipleInput
            $this->MultipleInput->EditAttrs["class"] = "form-control";
            $this->MultipleInput->EditCustomAttributes = "";
            $this->MultipleInput->EditValue = HtmlEncode($this->MultipleInput->CurrentValue);
            $this->MultipleInput->PlaceHolder = RemoveHtml($this->MultipleInput->caption());

            // LpPackageInformation
            $this->LpPackageInformation->EditAttrs["class"] = "form-control";
            $this->LpPackageInformation->EditCustomAttributes = "";
            if (!$this->LpPackageInformation->Raw) {
                $this->LpPackageInformation->CurrentValue = HtmlDecode($this->LpPackageInformation->CurrentValue);
            }
            $this->LpPackageInformation->EditValue = HtmlEncode($this->LpPackageInformation->CurrentValue);
            $this->LpPackageInformation->PlaceHolder = RemoveHtml($this->LpPackageInformation->caption());

            // AllowNegativeStock
            $this->AllowNegativeStock->EditAttrs["class"] = "form-control";
            $this->AllowNegativeStock->EditCustomAttributes = "";
            $this->AllowNegativeStock->EditValue = HtmlEncode($this->AllowNegativeStock->CurrentValue);
            $this->AllowNegativeStock->PlaceHolder = RemoveHtml($this->AllowNegativeStock->caption());

            // OrderDate
            $this->OrderDate->EditAttrs["class"] = "form-control";
            $this->OrderDate->EditCustomAttributes = "";
            $this->OrderDate->EditValue = HtmlEncode(FormatDateTime($this->OrderDate->CurrentValue, 8));
            $this->OrderDate->PlaceHolder = RemoveHtml($this->OrderDate->caption());

            // OrderTime
            $this->OrderTime->EditAttrs["class"] = "form-control";
            $this->OrderTime->EditCustomAttributes = "";
            $this->OrderTime->EditValue = HtmlEncode(FormatDateTime($this->OrderTime->CurrentValue, 8));
            $this->OrderTime->PlaceHolder = RemoveHtml($this->OrderTime->caption());

            // RateGroupCode
            $this->RateGroupCode->EditAttrs["class"] = "form-control";
            $this->RateGroupCode->EditCustomAttributes = "";
            $this->RateGroupCode->EditValue = HtmlEncode($this->RateGroupCode->CurrentValue);
            $this->RateGroupCode->PlaceHolder = RemoveHtml($this->RateGroupCode->caption());

            // ConversionCaseLot
            $this->ConversionCaseLot->EditAttrs["class"] = "form-control";
            $this->ConversionCaseLot->EditCustomAttributes = "";
            $this->ConversionCaseLot->EditValue = HtmlEncode($this->ConversionCaseLot->CurrentValue);
            $this->ConversionCaseLot->PlaceHolder = RemoveHtml($this->ConversionCaseLot->caption());

            // ShippingLot
            $this->ShippingLot->EditAttrs["class"] = "form-control";
            $this->ShippingLot->EditCustomAttributes = "";
            if (!$this->ShippingLot->Raw) {
                $this->ShippingLot->CurrentValue = HtmlDecode($this->ShippingLot->CurrentValue);
            }
            $this->ShippingLot->EditValue = HtmlEncode($this->ShippingLot->CurrentValue);
            $this->ShippingLot->PlaceHolder = RemoveHtml($this->ShippingLot->caption());

            // AllowExpiryReplacement
            $this->AllowExpiryReplacement->EditAttrs["class"] = "form-control";
            $this->AllowExpiryReplacement->EditCustomAttributes = "";
            $this->AllowExpiryReplacement->EditValue = HtmlEncode($this->AllowExpiryReplacement->CurrentValue);
            $this->AllowExpiryReplacement->PlaceHolder = RemoveHtml($this->AllowExpiryReplacement->caption());

            // NoOfMonthExpiryAllowed
            $this->NoOfMonthExpiryAllowed->EditAttrs["class"] = "form-control";
            $this->NoOfMonthExpiryAllowed->EditCustomAttributes = "";
            $this->NoOfMonthExpiryAllowed->EditValue = HtmlEncode($this->NoOfMonthExpiryAllowed->CurrentValue);
            $this->NoOfMonthExpiryAllowed->PlaceHolder = RemoveHtml($this->NoOfMonthExpiryAllowed->caption());

            // ProductDiscountEligibility
            $this->ProductDiscountEligibility->EditAttrs["class"] = "form-control";
            $this->ProductDiscountEligibility->EditCustomAttributes = "";
            $this->ProductDiscountEligibility->EditValue = HtmlEncode($this->ProductDiscountEligibility->CurrentValue);
            $this->ProductDiscountEligibility->PlaceHolder = RemoveHtml($this->ProductDiscountEligibility->caption());

            // ScheduleTypeCode
            $this->ScheduleTypeCode->EditAttrs["class"] = "form-control";
            $this->ScheduleTypeCode->EditCustomAttributes = "";
            $this->ScheduleTypeCode->EditValue = HtmlEncode($this->ScheduleTypeCode->CurrentValue);
            $this->ScheduleTypeCode->PlaceHolder = RemoveHtml($this->ScheduleTypeCode->caption());

            // AIOCDProductCode
            $this->AIOCDProductCode->EditAttrs["class"] = "form-control";
            $this->AIOCDProductCode->EditCustomAttributes = "";
            if (!$this->AIOCDProductCode->Raw) {
                $this->AIOCDProductCode->CurrentValue = HtmlDecode($this->AIOCDProductCode->CurrentValue);
            }
            $this->AIOCDProductCode->EditValue = HtmlEncode($this->AIOCDProductCode->CurrentValue);
            $this->AIOCDProductCode->PlaceHolder = RemoveHtml($this->AIOCDProductCode->caption());

            // FreeQuantity
            $this->FreeQuantity->EditAttrs["class"] = "form-control";
            $this->FreeQuantity->EditCustomAttributes = "";
            $this->FreeQuantity->EditValue = HtmlEncode($this->FreeQuantity->CurrentValue);
            $this->FreeQuantity->PlaceHolder = RemoveHtml($this->FreeQuantity->caption());
            if (strval($this->FreeQuantity->EditValue) != "" && is_numeric($this->FreeQuantity->EditValue)) {
                $this->FreeQuantity->EditValue = FormatNumber($this->FreeQuantity->EditValue, -2, -2, -2, -2);
            }

            // DiscountType
            $this->DiscountType->EditAttrs["class"] = "form-control";
            $this->DiscountType->EditCustomAttributes = "";
            $this->DiscountType->EditValue = HtmlEncode($this->DiscountType->CurrentValue);
            $this->DiscountType->PlaceHolder = RemoveHtml($this->DiscountType->caption());

            // DiscountValue
            $this->DiscountValue->EditAttrs["class"] = "form-control";
            $this->DiscountValue->EditCustomAttributes = "";
            $this->DiscountValue->EditValue = HtmlEncode($this->DiscountValue->CurrentValue);
            $this->DiscountValue->PlaceHolder = RemoveHtml($this->DiscountValue->caption());
            if (strval($this->DiscountValue->EditValue) != "" && is_numeric($this->DiscountValue->EditValue)) {
                $this->DiscountValue->EditValue = FormatNumber($this->DiscountValue->EditValue, -2, -2, -2, -2);
            }

            // HasProductOrderAttribute
            $this->HasProductOrderAttribute->EditAttrs["class"] = "form-control";
            $this->HasProductOrderAttribute->EditCustomAttributes = "";
            $this->HasProductOrderAttribute->EditValue = HtmlEncode($this->HasProductOrderAttribute->CurrentValue);
            $this->HasProductOrderAttribute->PlaceHolder = RemoveHtml($this->HasProductOrderAttribute->caption());

            // FirstPODate
            $this->FirstPODate->EditAttrs["class"] = "form-control";
            $this->FirstPODate->EditCustomAttributes = "";
            $this->FirstPODate->EditValue = HtmlEncode(FormatDateTime($this->FirstPODate->CurrentValue, 8));
            $this->FirstPODate->PlaceHolder = RemoveHtml($this->FirstPODate->caption());

            // SaleprcieAndMrpCalcPercent
            $this->SaleprcieAndMrpCalcPercent->EditAttrs["class"] = "form-control";
            $this->SaleprcieAndMrpCalcPercent->EditCustomAttributes = "";
            $this->SaleprcieAndMrpCalcPercent->EditValue = HtmlEncode($this->SaleprcieAndMrpCalcPercent->CurrentValue);
            $this->SaleprcieAndMrpCalcPercent->PlaceHolder = RemoveHtml($this->SaleprcieAndMrpCalcPercent->caption());
            if (strval($this->SaleprcieAndMrpCalcPercent->EditValue) != "" && is_numeric($this->SaleprcieAndMrpCalcPercent->EditValue)) {
                $this->SaleprcieAndMrpCalcPercent->EditValue = FormatNumber($this->SaleprcieAndMrpCalcPercent->EditValue, -2, -2, -2, -2);
            }

            // IsGiftVoucherProducts
            $this->IsGiftVoucherProducts->EditAttrs["class"] = "form-control";
            $this->IsGiftVoucherProducts->EditCustomAttributes = "";
            $this->IsGiftVoucherProducts->EditValue = HtmlEncode($this->IsGiftVoucherProducts->CurrentValue);
            $this->IsGiftVoucherProducts->PlaceHolder = RemoveHtml($this->IsGiftVoucherProducts->caption());

            // AcceptRange4SerialNumber
            $this->AcceptRange4SerialNumber->EditAttrs["class"] = "form-control";
            $this->AcceptRange4SerialNumber->EditCustomAttributes = "";
            $this->AcceptRange4SerialNumber->EditValue = HtmlEncode($this->AcceptRange4SerialNumber->CurrentValue);
            $this->AcceptRange4SerialNumber->PlaceHolder = RemoveHtml($this->AcceptRange4SerialNumber->caption());

            // GiftVoucherDenomination
            $this->GiftVoucherDenomination->EditAttrs["class"] = "form-control";
            $this->GiftVoucherDenomination->EditCustomAttributes = "";
            $this->GiftVoucherDenomination->EditValue = HtmlEncode($this->GiftVoucherDenomination->CurrentValue);
            $this->GiftVoucherDenomination->PlaceHolder = RemoveHtml($this->GiftVoucherDenomination->caption());

            // Subclasscode
            $this->Subclasscode->EditAttrs["class"] = "form-control";
            $this->Subclasscode->EditCustomAttributes = "";
            if (!$this->Subclasscode->Raw) {
                $this->Subclasscode->CurrentValue = HtmlDecode($this->Subclasscode->CurrentValue);
            }
            $this->Subclasscode->EditValue = HtmlEncode($this->Subclasscode->CurrentValue);
            $this->Subclasscode->PlaceHolder = RemoveHtml($this->Subclasscode->caption());

            // BarCodeFromWeighingMachine
            $this->BarCodeFromWeighingMachine->EditAttrs["class"] = "form-control";
            $this->BarCodeFromWeighingMachine->EditCustomAttributes = "";
            $this->BarCodeFromWeighingMachine->EditValue = HtmlEncode($this->BarCodeFromWeighingMachine->CurrentValue);
            $this->BarCodeFromWeighingMachine->PlaceHolder = RemoveHtml($this->BarCodeFromWeighingMachine->caption());

            // CheckCostInReturn
            $this->CheckCostInReturn->EditAttrs["class"] = "form-control";
            $this->CheckCostInReturn->EditCustomAttributes = "";
            $this->CheckCostInReturn->EditValue = HtmlEncode($this->CheckCostInReturn->CurrentValue);
            $this->CheckCostInReturn->PlaceHolder = RemoveHtml($this->CheckCostInReturn->caption());

            // FrequentSaleProduct
            $this->FrequentSaleProduct->EditAttrs["class"] = "form-control";
            $this->FrequentSaleProduct->EditCustomAttributes = "";
            $this->FrequentSaleProduct->EditValue = HtmlEncode($this->FrequentSaleProduct->CurrentValue);
            $this->FrequentSaleProduct->PlaceHolder = RemoveHtml($this->FrequentSaleProduct->caption());

            // RateType
            $this->RateType->EditAttrs["class"] = "form-control";
            $this->RateType->EditCustomAttributes = "";
            $this->RateType->EditValue = HtmlEncode($this->RateType->CurrentValue);
            $this->RateType->PlaceHolder = RemoveHtml($this->RateType->caption());

            // TouchscreenName
            $this->TouchscreenName->EditAttrs["class"] = "form-control";
            $this->TouchscreenName->EditCustomAttributes = "";
            if (!$this->TouchscreenName->Raw) {
                $this->TouchscreenName->CurrentValue = HtmlDecode($this->TouchscreenName->CurrentValue);
            }
            $this->TouchscreenName->EditValue = HtmlEncode($this->TouchscreenName->CurrentValue);
            $this->TouchscreenName->PlaceHolder = RemoveHtml($this->TouchscreenName->caption());

            // FreeType
            $this->FreeType->EditAttrs["class"] = "form-control";
            $this->FreeType->EditCustomAttributes = "";
            $this->FreeType->EditValue = HtmlEncode($this->FreeType->CurrentValue);
            $this->FreeType->PlaceHolder = RemoveHtml($this->FreeType->caption());

            // LooseQtyasNewBatch
            $this->LooseQtyasNewBatch->EditAttrs["class"] = "form-control";
            $this->LooseQtyasNewBatch->EditCustomAttributes = "";
            $this->LooseQtyasNewBatch->EditValue = HtmlEncode($this->LooseQtyasNewBatch->CurrentValue);
            $this->LooseQtyasNewBatch->PlaceHolder = RemoveHtml($this->LooseQtyasNewBatch->caption());

            // AllowSlabBilling
            $this->AllowSlabBilling->EditAttrs["class"] = "form-control";
            $this->AllowSlabBilling->EditCustomAttributes = "";
            $this->AllowSlabBilling->EditValue = HtmlEncode($this->AllowSlabBilling->CurrentValue);
            $this->AllowSlabBilling->PlaceHolder = RemoveHtml($this->AllowSlabBilling->caption());

            // ProductTypeForProduction
            $this->ProductTypeForProduction->EditAttrs["class"] = "form-control";
            $this->ProductTypeForProduction->EditCustomAttributes = "";
            $this->ProductTypeForProduction->EditValue = HtmlEncode($this->ProductTypeForProduction->CurrentValue);
            $this->ProductTypeForProduction->PlaceHolder = RemoveHtml($this->ProductTypeForProduction->caption());

            // RecipeCode
            $this->RecipeCode->EditAttrs["class"] = "form-control";
            $this->RecipeCode->EditCustomAttributes = "";
            $this->RecipeCode->EditValue = HtmlEncode($this->RecipeCode->CurrentValue);
            $this->RecipeCode->PlaceHolder = RemoveHtml($this->RecipeCode->caption());

            // DefaultUnitType
            $this->DefaultUnitType->EditAttrs["class"] = "form-control";
            $this->DefaultUnitType->EditCustomAttributes = "";
            $this->DefaultUnitType->EditValue = HtmlEncode($this->DefaultUnitType->CurrentValue);
            $this->DefaultUnitType->PlaceHolder = RemoveHtml($this->DefaultUnitType->caption());

            // PIstatus
            $this->PIstatus->EditAttrs["class"] = "form-control";
            $this->PIstatus->EditCustomAttributes = "";
            $this->PIstatus->EditValue = HtmlEncode($this->PIstatus->CurrentValue);
            $this->PIstatus->PlaceHolder = RemoveHtml($this->PIstatus->caption());

            // LastPiConfirmedDate
            $this->LastPiConfirmedDate->EditAttrs["class"] = "form-control";
            $this->LastPiConfirmedDate->EditCustomAttributes = "";
            $this->LastPiConfirmedDate->EditValue = HtmlEncode(FormatDateTime($this->LastPiConfirmedDate->CurrentValue, 8));
            $this->LastPiConfirmedDate->PlaceHolder = RemoveHtml($this->LastPiConfirmedDate->caption());

            // BarCodeDesign
            $this->BarCodeDesign->EditAttrs["class"] = "form-control";
            $this->BarCodeDesign->EditCustomAttributes = "";
            if (!$this->BarCodeDesign->Raw) {
                $this->BarCodeDesign->CurrentValue = HtmlDecode($this->BarCodeDesign->CurrentValue);
            }
            $this->BarCodeDesign->EditValue = HtmlEncode($this->BarCodeDesign->CurrentValue);
            $this->BarCodeDesign->PlaceHolder = RemoveHtml($this->BarCodeDesign->caption());

            // AcceptRemarksInBill
            $this->AcceptRemarksInBill->EditAttrs["class"] = "form-control";
            $this->AcceptRemarksInBill->EditCustomAttributes = "";
            $this->AcceptRemarksInBill->EditValue = HtmlEncode($this->AcceptRemarksInBill->CurrentValue);
            $this->AcceptRemarksInBill->PlaceHolder = RemoveHtml($this->AcceptRemarksInBill->caption());

            // Classification
            $this->Classification->EditAttrs["class"] = "form-control";
            $this->Classification->EditCustomAttributes = "";
            $this->Classification->EditValue = HtmlEncode($this->Classification->CurrentValue);
            $this->Classification->PlaceHolder = RemoveHtml($this->Classification->caption());

            // TimeSlot
            $this->TimeSlot->EditAttrs["class"] = "form-control";
            $this->TimeSlot->EditCustomAttributes = "";
            $this->TimeSlot->EditValue = HtmlEncode($this->TimeSlot->CurrentValue);
            $this->TimeSlot->PlaceHolder = RemoveHtml($this->TimeSlot->caption());

            // IsBundle
            $this->IsBundle->EditAttrs["class"] = "form-control";
            $this->IsBundle->EditCustomAttributes = "";
            $this->IsBundle->EditValue = HtmlEncode($this->IsBundle->CurrentValue);
            $this->IsBundle->PlaceHolder = RemoveHtml($this->IsBundle->caption());

            // ColorCode
            $this->ColorCode->EditAttrs["class"] = "form-control";
            $this->ColorCode->EditCustomAttributes = "";
            $this->ColorCode->EditValue = HtmlEncode($this->ColorCode->CurrentValue);
            $this->ColorCode->PlaceHolder = RemoveHtml($this->ColorCode->caption());

            // GenderCode
            $this->GenderCode->EditAttrs["class"] = "form-control";
            $this->GenderCode->EditCustomAttributes = "";
            $this->GenderCode->EditValue = HtmlEncode($this->GenderCode->CurrentValue);
            $this->GenderCode->PlaceHolder = RemoveHtml($this->GenderCode->caption());

            // SizeCode
            $this->SizeCode->EditAttrs["class"] = "form-control";
            $this->SizeCode->EditCustomAttributes = "";
            $this->SizeCode->EditValue = HtmlEncode($this->SizeCode->CurrentValue);
            $this->SizeCode->PlaceHolder = RemoveHtml($this->SizeCode->caption());

            // GiftCard
            $this->GiftCard->EditAttrs["class"] = "form-control";
            $this->GiftCard->EditCustomAttributes = "";
            $this->GiftCard->EditValue = HtmlEncode($this->GiftCard->CurrentValue);
            $this->GiftCard->PlaceHolder = RemoveHtml($this->GiftCard->caption());

            // ToonLabel
            $this->ToonLabel->EditAttrs["class"] = "form-control";
            $this->ToonLabel->EditCustomAttributes = "";
            $this->ToonLabel->EditValue = HtmlEncode($this->ToonLabel->CurrentValue);
            $this->ToonLabel->PlaceHolder = RemoveHtml($this->ToonLabel->caption());

            // GarmentType
            $this->GarmentType->EditAttrs["class"] = "form-control";
            $this->GarmentType->EditCustomAttributes = "";
            $this->GarmentType->EditValue = HtmlEncode($this->GarmentType->CurrentValue);
            $this->GarmentType->PlaceHolder = RemoveHtml($this->GarmentType->caption());

            // AgeGroup
            $this->AgeGroup->EditAttrs["class"] = "form-control";
            $this->AgeGroup->EditCustomAttributes = "";
            $this->AgeGroup->EditValue = HtmlEncode($this->AgeGroup->CurrentValue);
            $this->AgeGroup->PlaceHolder = RemoveHtml($this->AgeGroup->caption());

            // Season
            $this->Season->EditAttrs["class"] = "form-control";
            $this->Season->EditCustomAttributes = "";
            $this->Season->EditValue = HtmlEncode($this->Season->CurrentValue);
            $this->Season->PlaceHolder = RemoveHtml($this->Season->caption());

            // DailyStockEntry
            $this->DailyStockEntry->EditAttrs["class"] = "form-control";
            $this->DailyStockEntry->EditCustomAttributes = "";
            $this->DailyStockEntry->EditValue = HtmlEncode($this->DailyStockEntry->CurrentValue);
            $this->DailyStockEntry->PlaceHolder = RemoveHtml($this->DailyStockEntry->caption());

            // ModifierApplicable
            $this->ModifierApplicable->EditAttrs["class"] = "form-control";
            $this->ModifierApplicable->EditCustomAttributes = "";
            $this->ModifierApplicable->EditValue = HtmlEncode($this->ModifierApplicable->CurrentValue);
            $this->ModifierApplicable->PlaceHolder = RemoveHtml($this->ModifierApplicable->caption());

            // ModifierType
            $this->ModifierType->EditAttrs["class"] = "form-control";
            $this->ModifierType->EditCustomAttributes = "";
            $this->ModifierType->EditValue = HtmlEncode($this->ModifierType->CurrentValue);
            $this->ModifierType->PlaceHolder = RemoveHtml($this->ModifierType->caption());

            // AcceptZeroRate
            $this->AcceptZeroRate->EditAttrs["class"] = "form-control";
            $this->AcceptZeroRate->EditCustomAttributes = "";
            $this->AcceptZeroRate->EditValue = HtmlEncode($this->AcceptZeroRate->CurrentValue);
            $this->AcceptZeroRate->PlaceHolder = RemoveHtml($this->AcceptZeroRate->caption());

            // ExciseDutyCode
            $this->ExciseDutyCode->EditAttrs["class"] = "form-control";
            $this->ExciseDutyCode->EditCustomAttributes = "";
            $this->ExciseDutyCode->EditValue = HtmlEncode($this->ExciseDutyCode->CurrentValue);
            $this->ExciseDutyCode->PlaceHolder = RemoveHtml($this->ExciseDutyCode->caption());

            // IndentProductGroupCode
            $this->IndentProductGroupCode->EditAttrs["class"] = "form-control";
            $this->IndentProductGroupCode->EditCustomAttributes = "";
            $this->IndentProductGroupCode->EditValue = HtmlEncode($this->IndentProductGroupCode->CurrentValue);
            $this->IndentProductGroupCode->PlaceHolder = RemoveHtml($this->IndentProductGroupCode->caption());

            // IsMultiBatch
            $this->IsMultiBatch->EditAttrs["class"] = "form-control";
            $this->IsMultiBatch->EditCustomAttributes = "";
            $this->IsMultiBatch->EditValue = HtmlEncode($this->IsMultiBatch->CurrentValue);
            $this->IsMultiBatch->PlaceHolder = RemoveHtml($this->IsMultiBatch->caption());

            // IsSingleBatch
            $this->IsSingleBatch->EditAttrs["class"] = "form-control";
            $this->IsSingleBatch->EditCustomAttributes = "";
            $this->IsSingleBatch->EditValue = HtmlEncode($this->IsSingleBatch->CurrentValue);
            $this->IsSingleBatch->PlaceHolder = RemoveHtml($this->IsSingleBatch->caption());

            // MarkUpRate1
            $this->MarkUpRate1->EditAttrs["class"] = "form-control";
            $this->MarkUpRate1->EditCustomAttributes = "";
            $this->MarkUpRate1->EditValue = HtmlEncode($this->MarkUpRate1->CurrentValue);
            $this->MarkUpRate1->PlaceHolder = RemoveHtml($this->MarkUpRate1->caption());
            if (strval($this->MarkUpRate1->EditValue) != "" && is_numeric($this->MarkUpRate1->EditValue)) {
                $this->MarkUpRate1->EditValue = FormatNumber($this->MarkUpRate1->EditValue, -2, -2, -2, -2);
            }

            // MarkDownRate1
            $this->MarkDownRate1->EditAttrs["class"] = "form-control";
            $this->MarkDownRate1->EditCustomAttributes = "";
            $this->MarkDownRate1->EditValue = HtmlEncode($this->MarkDownRate1->CurrentValue);
            $this->MarkDownRate1->PlaceHolder = RemoveHtml($this->MarkDownRate1->caption());
            if (strval($this->MarkDownRate1->EditValue) != "" && is_numeric($this->MarkDownRate1->EditValue)) {
                $this->MarkDownRate1->EditValue = FormatNumber($this->MarkDownRate1->EditValue, -2, -2, -2, -2);
            }

            // MarkUpRate2
            $this->MarkUpRate2->EditAttrs["class"] = "form-control";
            $this->MarkUpRate2->EditCustomAttributes = "";
            $this->MarkUpRate2->EditValue = HtmlEncode($this->MarkUpRate2->CurrentValue);
            $this->MarkUpRate2->PlaceHolder = RemoveHtml($this->MarkUpRate2->caption());
            if (strval($this->MarkUpRate2->EditValue) != "" && is_numeric($this->MarkUpRate2->EditValue)) {
                $this->MarkUpRate2->EditValue = FormatNumber($this->MarkUpRate2->EditValue, -2, -2, -2, -2);
            }

            // MarkDownRate2
            $this->MarkDownRate2->EditAttrs["class"] = "form-control";
            $this->MarkDownRate2->EditCustomAttributes = "";
            $this->MarkDownRate2->EditValue = HtmlEncode($this->MarkDownRate2->CurrentValue);
            $this->MarkDownRate2->PlaceHolder = RemoveHtml($this->MarkDownRate2->caption());
            if (strval($this->MarkDownRate2->EditValue) != "" && is_numeric($this->MarkDownRate2->EditValue)) {
                $this->MarkDownRate2->EditValue = FormatNumber($this->MarkDownRate2->EditValue, -2, -2, -2, -2);
            }

            // Yield
            $this->_Yield->EditAttrs["class"] = "form-control";
            $this->_Yield->EditCustomAttributes = "";
            $this->_Yield->EditValue = HtmlEncode($this->_Yield->CurrentValue);
            $this->_Yield->PlaceHolder = RemoveHtml($this->_Yield->caption());
            if (strval($this->_Yield->EditValue) != "" && is_numeric($this->_Yield->EditValue)) {
                $this->_Yield->EditValue = FormatNumber($this->_Yield->EditValue, -2, -2, -2, -2);
            }

            // RefProductCode
            $this->RefProductCode->EditAttrs["class"] = "form-control";
            $this->RefProductCode->EditCustomAttributes = "";
            $this->RefProductCode->EditValue = HtmlEncode($this->RefProductCode->CurrentValue);
            $this->RefProductCode->PlaceHolder = RemoveHtml($this->RefProductCode->caption());

            // Volume
            $this->Volume->EditAttrs["class"] = "form-control";
            $this->Volume->EditCustomAttributes = "";
            $this->Volume->EditValue = HtmlEncode($this->Volume->CurrentValue);
            $this->Volume->PlaceHolder = RemoveHtml($this->Volume->caption());
            if (strval($this->Volume->EditValue) != "" && is_numeric($this->Volume->EditValue)) {
                $this->Volume->EditValue = FormatNumber($this->Volume->EditValue, -2, -2, -2, -2);
            }

            // MeasurementID
            $this->MeasurementID->EditAttrs["class"] = "form-control";
            $this->MeasurementID->EditCustomAttributes = "";
            $this->MeasurementID->EditValue = HtmlEncode($this->MeasurementID->CurrentValue);
            $this->MeasurementID->PlaceHolder = RemoveHtml($this->MeasurementID->caption());

            // CountryCode
            $this->CountryCode->EditAttrs["class"] = "form-control";
            $this->CountryCode->EditCustomAttributes = "";
            $this->CountryCode->EditValue = HtmlEncode($this->CountryCode->CurrentValue);
            $this->CountryCode->PlaceHolder = RemoveHtml($this->CountryCode->caption());

            // AcceptWMQty
            $this->AcceptWMQty->EditAttrs["class"] = "form-control";
            $this->AcceptWMQty->EditCustomAttributes = "";
            $this->AcceptWMQty->EditValue = HtmlEncode($this->AcceptWMQty->CurrentValue);
            $this->AcceptWMQty->PlaceHolder = RemoveHtml($this->AcceptWMQty->caption());

            // SingleBatchBasedOnRate
            $this->SingleBatchBasedOnRate->EditAttrs["class"] = "form-control";
            $this->SingleBatchBasedOnRate->EditCustomAttributes = "";
            $this->SingleBatchBasedOnRate->EditValue = HtmlEncode($this->SingleBatchBasedOnRate->CurrentValue);
            $this->SingleBatchBasedOnRate->PlaceHolder = RemoveHtml($this->SingleBatchBasedOnRate->caption());

            // TenderNo
            $this->TenderNo->EditAttrs["class"] = "form-control";
            $this->TenderNo->EditCustomAttributes = "";
            if (!$this->TenderNo->Raw) {
                $this->TenderNo->CurrentValue = HtmlDecode($this->TenderNo->CurrentValue);
            }
            $this->TenderNo->EditValue = HtmlEncode($this->TenderNo->CurrentValue);
            $this->TenderNo->PlaceHolder = RemoveHtml($this->TenderNo->caption());

            // SingleBillMaximumSoldQtyFiled
            $this->SingleBillMaximumSoldQtyFiled->EditAttrs["class"] = "form-control";
            $this->SingleBillMaximumSoldQtyFiled->EditCustomAttributes = "";
            $this->SingleBillMaximumSoldQtyFiled->EditValue = HtmlEncode($this->SingleBillMaximumSoldQtyFiled->CurrentValue);
            $this->SingleBillMaximumSoldQtyFiled->PlaceHolder = RemoveHtml($this->SingleBillMaximumSoldQtyFiled->caption());
            if (strval($this->SingleBillMaximumSoldQtyFiled->EditValue) != "" && is_numeric($this->SingleBillMaximumSoldQtyFiled->EditValue)) {
                $this->SingleBillMaximumSoldQtyFiled->EditValue = FormatNumber($this->SingleBillMaximumSoldQtyFiled->EditValue, -2, -2, -2, -2);
            }

            // Strength1
            $this->Strength1->EditAttrs["class"] = "form-control";
            $this->Strength1->EditCustomAttributes = "";
            if (!$this->Strength1->Raw) {
                $this->Strength1->CurrentValue = HtmlDecode($this->Strength1->CurrentValue);
            }
            $this->Strength1->EditValue = HtmlEncode($this->Strength1->CurrentValue);
            $this->Strength1->PlaceHolder = RemoveHtml($this->Strength1->caption());

            // Strength2
            $this->Strength2->EditAttrs["class"] = "form-control";
            $this->Strength2->EditCustomAttributes = "";
            if (!$this->Strength2->Raw) {
                $this->Strength2->CurrentValue = HtmlDecode($this->Strength2->CurrentValue);
            }
            $this->Strength2->EditValue = HtmlEncode($this->Strength2->CurrentValue);
            $this->Strength2->PlaceHolder = RemoveHtml($this->Strength2->caption());

            // Strength3
            $this->Strength3->EditAttrs["class"] = "form-control";
            $this->Strength3->EditCustomAttributes = "";
            if (!$this->Strength3->Raw) {
                $this->Strength3->CurrentValue = HtmlDecode($this->Strength3->CurrentValue);
            }
            $this->Strength3->EditValue = HtmlEncode($this->Strength3->CurrentValue);
            $this->Strength3->PlaceHolder = RemoveHtml($this->Strength3->caption());

            // Strength4
            $this->Strength4->EditAttrs["class"] = "form-control";
            $this->Strength4->EditCustomAttributes = "";
            if (!$this->Strength4->Raw) {
                $this->Strength4->CurrentValue = HtmlDecode($this->Strength4->CurrentValue);
            }
            $this->Strength4->EditValue = HtmlEncode($this->Strength4->CurrentValue);
            $this->Strength4->PlaceHolder = RemoveHtml($this->Strength4->caption());

            // Strength5
            $this->Strength5->EditAttrs["class"] = "form-control";
            $this->Strength5->EditCustomAttributes = "";
            if (!$this->Strength5->Raw) {
                $this->Strength5->CurrentValue = HtmlDecode($this->Strength5->CurrentValue);
            }
            $this->Strength5->EditValue = HtmlEncode($this->Strength5->CurrentValue);
            $this->Strength5->PlaceHolder = RemoveHtml($this->Strength5->caption());

            // IngredientCode1
            $this->IngredientCode1->EditAttrs["class"] = "form-control";
            $this->IngredientCode1->EditCustomAttributes = "";
            $this->IngredientCode1->EditValue = HtmlEncode($this->IngredientCode1->CurrentValue);
            $this->IngredientCode1->PlaceHolder = RemoveHtml($this->IngredientCode1->caption());

            // IngredientCode2
            $this->IngredientCode2->EditAttrs["class"] = "form-control";
            $this->IngredientCode2->EditCustomAttributes = "";
            $this->IngredientCode2->EditValue = HtmlEncode($this->IngredientCode2->CurrentValue);
            $this->IngredientCode2->PlaceHolder = RemoveHtml($this->IngredientCode2->caption());

            // IngredientCode3
            $this->IngredientCode3->EditAttrs["class"] = "form-control";
            $this->IngredientCode3->EditCustomAttributes = "";
            $this->IngredientCode3->EditValue = HtmlEncode($this->IngredientCode3->CurrentValue);
            $this->IngredientCode3->PlaceHolder = RemoveHtml($this->IngredientCode3->caption());

            // IngredientCode4
            $this->IngredientCode4->EditAttrs["class"] = "form-control";
            $this->IngredientCode4->EditCustomAttributes = "";
            $this->IngredientCode4->EditValue = HtmlEncode($this->IngredientCode4->CurrentValue);
            $this->IngredientCode4->PlaceHolder = RemoveHtml($this->IngredientCode4->caption());

            // IngredientCode5
            $this->IngredientCode5->EditAttrs["class"] = "form-control";
            $this->IngredientCode5->EditCustomAttributes = "";
            $this->IngredientCode5->EditValue = HtmlEncode($this->IngredientCode5->CurrentValue);
            $this->IngredientCode5->PlaceHolder = RemoveHtml($this->IngredientCode5->caption());

            // OrderType
            $this->OrderType->EditAttrs["class"] = "form-control";
            $this->OrderType->EditCustomAttributes = "";
            $this->OrderType->EditValue = HtmlEncode($this->OrderType->CurrentValue);
            $this->OrderType->PlaceHolder = RemoveHtml($this->OrderType->caption());

            // StockUOM
            $this->StockUOM->EditAttrs["class"] = "form-control";
            $this->StockUOM->EditCustomAttributes = "";
            $this->StockUOM->EditValue = HtmlEncode($this->StockUOM->CurrentValue);
            $this->StockUOM->PlaceHolder = RemoveHtml($this->StockUOM->caption());

            // PriceUOM
            $this->PriceUOM->EditAttrs["class"] = "form-control";
            $this->PriceUOM->EditCustomAttributes = "";
            $this->PriceUOM->EditValue = HtmlEncode($this->PriceUOM->CurrentValue);
            $this->PriceUOM->PlaceHolder = RemoveHtml($this->PriceUOM->caption());

            // DefaultSaleUOM
            $this->DefaultSaleUOM->EditAttrs["class"] = "form-control";
            $this->DefaultSaleUOM->EditCustomAttributes = "";
            $this->DefaultSaleUOM->EditValue = HtmlEncode($this->DefaultSaleUOM->CurrentValue);
            $this->DefaultSaleUOM->PlaceHolder = RemoveHtml($this->DefaultSaleUOM->caption());

            // DefaultPurchaseUOM
            $this->DefaultPurchaseUOM->EditAttrs["class"] = "form-control";
            $this->DefaultPurchaseUOM->EditCustomAttributes = "";
            $this->DefaultPurchaseUOM->EditValue = HtmlEncode($this->DefaultPurchaseUOM->CurrentValue);
            $this->DefaultPurchaseUOM->PlaceHolder = RemoveHtml($this->DefaultPurchaseUOM->caption());

            // ReportingUOM
            $this->ReportingUOM->EditAttrs["class"] = "form-control";
            $this->ReportingUOM->EditCustomAttributes = "";
            $this->ReportingUOM->EditValue = HtmlEncode($this->ReportingUOM->CurrentValue);
            $this->ReportingUOM->PlaceHolder = RemoveHtml($this->ReportingUOM->caption());

            // LastPurchasedUOM
            $this->LastPurchasedUOM->EditAttrs["class"] = "form-control";
            $this->LastPurchasedUOM->EditCustomAttributes = "";
            $this->LastPurchasedUOM->EditValue = HtmlEncode($this->LastPurchasedUOM->CurrentValue);
            $this->LastPurchasedUOM->PlaceHolder = RemoveHtml($this->LastPurchasedUOM->caption());

            // TreatmentCodes
            $this->TreatmentCodes->EditAttrs["class"] = "form-control";
            $this->TreatmentCodes->EditCustomAttributes = "";
            if (!$this->TreatmentCodes->Raw) {
                $this->TreatmentCodes->CurrentValue = HtmlDecode($this->TreatmentCodes->CurrentValue);
            }
            $this->TreatmentCodes->EditValue = HtmlEncode($this->TreatmentCodes->CurrentValue);
            $this->TreatmentCodes->PlaceHolder = RemoveHtml($this->TreatmentCodes->caption());

            // InsuranceType
            $this->InsuranceType->EditAttrs["class"] = "form-control";
            $this->InsuranceType->EditCustomAttributes = "";
            $this->InsuranceType->EditValue = HtmlEncode($this->InsuranceType->CurrentValue);
            $this->InsuranceType->PlaceHolder = RemoveHtml($this->InsuranceType->caption());

            // CoverageGroupCodes
            $this->CoverageGroupCodes->EditAttrs["class"] = "form-control";
            $this->CoverageGroupCodes->EditCustomAttributes = "";
            if (!$this->CoverageGroupCodes->Raw) {
                $this->CoverageGroupCodes->CurrentValue = HtmlDecode($this->CoverageGroupCodes->CurrentValue);
            }
            $this->CoverageGroupCodes->EditValue = HtmlEncode($this->CoverageGroupCodes->CurrentValue);
            $this->CoverageGroupCodes->PlaceHolder = RemoveHtml($this->CoverageGroupCodes->caption());

            // MultipleUOM
            $this->MultipleUOM->EditAttrs["class"] = "form-control";
            $this->MultipleUOM->EditCustomAttributes = "";
            $this->MultipleUOM->EditValue = HtmlEncode($this->MultipleUOM->CurrentValue);
            $this->MultipleUOM->PlaceHolder = RemoveHtml($this->MultipleUOM->caption());

            // SalePriceComputation
            $this->SalePriceComputation->EditAttrs["class"] = "form-control";
            $this->SalePriceComputation->EditCustomAttributes = "";
            $this->SalePriceComputation->EditValue = HtmlEncode($this->SalePriceComputation->CurrentValue);
            $this->SalePriceComputation->PlaceHolder = RemoveHtml($this->SalePriceComputation->caption());

            // StockCorrection
            $this->StockCorrection->EditAttrs["class"] = "form-control";
            $this->StockCorrection->EditCustomAttributes = "";
            $this->StockCorrection->EditValue = HtmlEncode($this->StockCorrection->CurrentValue);
            $this->StockCorrection->PlaceHolder = RemoveHtml($this->StockCorrection->caption());

            // LBTPercentage
            $this->LBTPercentage->EditAttrs["class"] = "form-control";
            $this->LBTPercentage->EditCustomAttributes = "";
            $this->LBTPercentage->EditValue = HtmlEncode($this->LBTPercentage->CurrentValue);
            $this->LBTPercentage->PlaceHolder = RemoveHtml($this->LBTPercentage->caption());
            if (strval($this->LBTPercentage->EditValue) != "" && is_numeric($this->LBTPercentage->EditValue)) {
                $this->LBTPercentage->EditValue = FormatNumber($this->LBTPercentage->EditValue, -2, -2, -2, -2);
            }

            // SalesCommission
            $this->SalesCommission->EditAttrs["class"] = "form-control";
            $this->SalesCommission->EditCustomAttributes = "";
            $this->SalesCommission->EditValue = HtmlEncode($this->SalesCommission->CurrentValue);
            $this->SalesCommission->PlaceHolder = RemoveHtml($this->SalesCommission->caption());
            if (strval($this->SalesCommission->EditValue) != "" && is_numeric($this->SalesCommission->EditValue)) {
                $this->SalesCommission->EditValue = FormatNumber($this->SalesCommission->EditValue, -2, -2, -2, -2);
            }

            // LockedStock
            $this->LockedStock->EditAttrs["class"] = "form-control";
            $this->LockedStock->EditCustomAttributes = "";
            $this->LockedStock->EditValue = HtmlEncode($this->LockedStock->CurrentValue);
            $this->LockedStock->PlaceHolder = RemoveHtml($this->LockedStock->caption());
            if (strval($this->LockedStock->EditValue) != "" && is_numeric($this->LockedStock->EditValue)) {
                $this->LockedStock->EditValue = FormatNumber($this->LockedStock->EditValue, -2, -2, -2, -2);
            }

            // MinMaxUOM
            $this->MinMaxUOM->EditAttrs["class"] = "form-control";
            $this->MinMaxUOM->EditCustomAttributes = "";
            $this->MinMaxUOM->EditValue = HtmlEncode($this->MinMaxUOM->CurrentValue);
            $this->MinMaxUOM->PlaceHolder = RemoveHtml($this->MinMaxUOM->caption());

            // ExpiryMfrDateFormat
            $this->ExpiryMfrDateFormat->EditAttrs["class"] = "form-control";
            $this->ExpiryMfrDateFormat->EditCustomAttributes = "";
            $this->ExpiryMfrDateFormat->EditValue = HtmlEncode($this->ExpiryMfrDateFormat->CurrentValue);
            $this->ExpiryMfrDateFormat->PlaceHolder = RemoveHtml($this->ExpiryMfrDateFormat->caption());

            // ProductLifeTime
            $this->ProductLifeTime->EditAttrs["class"] = "form-control";
            $this->ProductLifeTime->EditCustomAttributes = "";
            $this->ProductLifeTime->EditValue = HtmlEncode($this->ProductLifeTime->CurrentValue);
            $this->ProductLifeTime->PlaceHolder = RemoveHtml($this->ProductLifeTime->caption());

            // IsCombo
            $this->IsCombo->EditAttrs["class"] = "form-control";
            $this->IsCombo->EditCustomAttributes = "";
            $this->IsCombo->EditValue = HtmlEncode($this->IsCombo->CurrentValue);
            $this->IsCombo->PlaceHolder = RemoveHtml($this->IsCombo->caption());

            // ComboTypeCode
            $this->ComboTypeCode->EditAttrs["class"] = "form-control";
            $this->ComboTypeCode->EditCustomAttributes = "";
            $this->ComboTypeCode->EditValue = HtmlEncode($this->ComboTypeCode->CurrentValue);
            $this->ComboTypeCode->PlaceHolder = RemoveHtml($this->ComboTypeCode->caption());

            // AttributeCount6
            $this->AttributeCount6->EditAttrs["class"] = "form-control";
            $this->AttributeCount6->EditCustomAttributes = "";
            $this->AttributeCount6->EditValue = HtmlEncode($this->AttributeCount6->CurrentValue);
            $this->AttributeCount6->PlaceHolder = RemoveHtml($this->AttributeCount6->caption());

            // AttributeCount7
            $this->AttributeCount7->EditAttrs["class"] = "form-control";
            $this->AttributeCount7->EditCustomAttributes = "";
            $this->AttributeCount7->EditValue = HtmlEncode($this->AttributeCount7->CurrentValue);
            $this->AttributeCount7->PlaceHolder = RemoveHtml($this->AttributeCount7->caption());

            // AttributeCount8
            $this->AttributeCount8->EditAttrs["class"] = "form-control";
            $this->AttributeCount8->EditCustomAttributes = "";
            $this->AttributeCount8->EditValue = HtmlEncode($this->AttributeCount8->CurrentValue);
            $this->AttributeCount8->PlaceHolder = RemoveHtml($this->AttributeCount8->caption());

            // AttributeCount9
            $this->AttributeCount9->EditAttrs["class"] = "form-control";
            $this->AttributeCount9->EditCustomAttributes = "";
            $this->AttributeCount9->EditValue = HtmlEncode($this->AttributeCount9->CurrentValue);
            $this->AttributeCount9->PlaceHolder = RemoveHtml($this->AttributeCount9->caption());

            // AttributeCount10
            $this->AttributeCount10->EditAttrs["class"] = "form-control";
            $this->AttributeCount10->EditCustomAttributes = "";
            $this->AttributeCount10->EditValue = HtmlEncode($this->AttributeCount10->CurrentValue);
            $this->AttributeCount10->PlaceHolder = RemoveHtml($this->AttributeCount10->caption());

            // LabourCharge
            $this->LabourCharge->EditAttrs["class"] = "form-control";
            $this->LabourCharge->EditCustomAttributes = "";
            $this->LabourCharge->EditValue = HtmlEncode($this->LabourCharge->CurrentValue);
            $this->LabourCharge->PlaceHolder = RemoveHtml($this->LabourCharge->caption());
            if (strval($this->LabourCharge->EditValue) != "" && is_numeric($this->LabourCharge->EditValue)) {
                $this->LabourCharge->EditValue = FormatNumber($this->LabourCharge->EditValue, -2, -2, -2, -2);
            }

            // AffectOtherCharge
            $this->AffectOtherCharge->EditAttrs["class"] = "form-control";
            $this->AffectOtherCharge->EditCustomAttributes = "";
            $this->AffectOtherCharge->EditValue = HtmlEncode($this->AffectOtherCharge->CurrentValue);
            $this->AffectOtherCharge->PlaceHolder = RemoveHtml($this->AffectOtherCharge->caption());

            // DosageInfo
            $this->DosageInfo->EditAttrs["class"] = "form-control";
            $this->DosageInfo->EditCustomAttributes = "";
            if (!$this->DosageInfo->Raw) {
                $this->DosageInfo->CurrentValue = HtmlDecode($this->DosageInfo->CurrentValue);
            }
            $this->DosageInfo->EditValue = HtmlEncode($this->DosageInfo->CurrentValue);
            $this->DosageInfo->PlaceHolder = RemoveHtml($this->DosageInfo->caption());

            // DosageType
            $this->DosageType->EditAttrs["class"] = "form-control";
            $this->DosageType->EditCustomAttributes = "";
            $this->DosageType->EditValue = HtmlEncode($this->DosageType->CurrentValue);
            $this->DosageType->PlaceHolder = RemoveHtml($this->DosageType->caption());

            // DefaultIndentUOM
            $this->DefaultIndentUOM->EditAttrs["class"] = "form-control";
            $this->DefaultIndentUOM->EditCustomAttributes = "";
            $this->DefaultIndentUOM->EditValue = HtmlEncode($this->DefaultIndentUOM->CurrentValue);
            $this->DefaultIndentUOM->PlaceHolder = RemoveHtml($this->DefaultIndentUOM->caption());

            // PromoTag
            $this->PromoTag->EditAttrs["class"] = "form-control";
            $this->PromoTag->EditCustomAttributes = "";
            $this->PromoTag->EditValue = HtmlEncode($this->PromoTag->CurrentValue);
            $this->PromoTag->PlaceHolder = RemoveHtml($this->PromoTag->caption());

            // BillLevelPromoTag
            $this->BillLevelPromoTag->EditAttrs["class"] = "form-control";
            $this->BillLevelPromoTag->EditCustomAttributes = "";
            $this->BillLevelPromoTag->EditValue = HtmlEncode($this->BillLevelPromoTag->CurrentValue);
            $this->BillLevelPromoTag->PlaceHolder = RemoveHtml($this->BillLevelPromoTag->caption());

            // IsMRPProduct
            $this->IsMRPProduct->EditAttrs["class"] = "form-control";
            $this->IsMRPProduct->EditCustomAttributes = "";
            $this->IsMRPProduct->EditValue = HtmlEncode($this->IsMRPProduct->CurrentValue);
            $this->IsMRPProduct->PlaceHolder = RemoveHtml($this->IsMRPProduct->caption());

            // MrpList
            $this->MrpList->EditAttrs["class"] = "form-control";
            $this->MrpList->EditCustomAttributes = "";
            $this->MrpList->EditValue = HtmlEncode($this->MrpList->CurrentValue);
            $this->MrpList->PlaceHolder = RemoveHtml($this->MrpList->caption());

            // AlternateSaleUOM
            $this->AlternateSaleUOM->EditAttrs["class"] = "form-control";
            $this->AlternateSaleUOM->EditCustomAttributes = "";
            $this->AlternateSaleUOM->EditValue = HtmlEncode($this->AlternateSaleUOM->CurrentValue);
            $this->AlternateSaleUOM->PlaceHolder = RemoveHtml($this->AlternateSaleUOM->caption());

            // FreeUOM
            $this->FreeUOM->EditAttrs["class"] = "form-control";
            $this->FreeUOM->EditCustomAttributes = "";
            $this->FreeUOM->EditValue = HtmlEncode($this->FreeUOM->CurrentValue);
            $this->FreeUOM->PlaceHolder = RemoveHtml($this->FreeUOM->caption());

            // MarketedCode
            $this->MarketedCode->EditAttrs["class"] = "form-control";
            $this->MarketedCode->EditCustomAttributes = "";
            if (!$this->MarketedCode->Raw) {
                $this->MarketedCode->CurrentValue = HtmlDecode($this->MarketedCode->CurrentValue);
            }
            $this->MarketedCode->EditValue = HtmlEncode($this->MarketedCode->CurrentValue);
            $this->MarketedCode->PlaceHolder = RemoveHtml($this->MarketedCode->caption());

            // MinimumSalePrice
            $this->MinimumSalePrice->EditAttrs["class"] = "form-control";
            $this->MinimumSalePrice->EditCustomAttributes = "";
            $this->MinimumSalePrice->EditValue = HtmlEncode($this->MinimumSalePrice->CurrentValue);
            $this->MinimumSalePrice->PlaceHolder = RemoveHtml($this->MinimumSalePrice->caption());
            if (strval($this->MinimumSalePrice->EditValue) != "" && is_numeric($this->MinimumSalePrice->EditValue)) {
                $this->MinimumSalePrice->EditValue = FormatNumber($this->MinimumSalePrice->EditValue, -2, -2, -2, -2);
            }

            // PRate1
            $this->PRate1->EditAttrs["class"] = "form-control";
            $this->PRate1->EditCustomAttributes = "";
            $this->PRate1->EditValue = HtmlEncode($this->PRate1->CurrentValue);
            $this->PRate1->PlaceHolder = RemoveHtml($this->PRate1->caption());
            if (strval($this->PRate1->EditValue) != "" && is_numeric($this->PRate1->EditValue)) {
                $this->PRate1->EditValue = FormatNumber($this->PRate1->EditValue, -2, -2, -2, -2);
            }

            // PRate2
            $this->PRate2->EditAttrs["class"] = "form-control";
            $this->PRate2->EditCustomAttributes = "";
            $this->PRate2->EditValue = HtmlEncode($this->PRate2->CurrentValue);
            $this->PRate2->PlaceHolder = RemoveHtml($this->PRate2->caption());
            if (strval($this->PRate2->EditValue) != "" && is_numeric($this->PRate2->EditValue)) {
                $this->PRate2->EditValue = FormatNumber($this->PRate2->EditValue, -2, -2, -2, -2);
            }

            // LPItemCost
            $this->LPItemCost->EditAttrs["class"] = "form-control";
            $this->LPItemCost->EditCustomAttributes = "";
            $this->LPItemCost->EditValue = HtmlEncode($this->LPItemCost->CurrentValue);
            $this->LPItemCost->PlaceHolder = RemoveHtml($this->LPItemCost->caption());
            if (strval($this->LPItemCost->EditValue) != "" && is_numeric($this->LPItemCost->EditValue)) {
                $this->LPItemCost->EditValue = FormatNumber($this->LPItemCost->EditValue, -2, -2, -2, -2);
            }

            // FixedItemCost
            $this->FixedItemCost->EditAttrs["class"] = "form-control";
            $this->FixedItemCost->EditCustomAttributes = "";
            $this->FixedItemCost->EditValue = HtmlEncode($this->FixedItemCost->CurrentValue);
            $this->FixedItemCost->PlaceHolder = RemoveHtml($this->FixedItemCost->caption());
            if (strval($this->FixedItemCost->EditValue) != "" && is_numeric($this->FixedItemCost->EditValue)) {
                $this->FixedItemCost->EditValue = FormatNumber($this->FixedItemCost->EditValue, -2, -2, -2, -2);
            }

            // HSNId
            $this->HSNId->EditAttrs["class"] = "form-control";
            $this->HSNId->EditCustomAttributes = "";
            $this->HSNId->EditValue = HtmlEncode($this->HSNId->CurrentValue);
            $this->HSNId->PlaceHolder = RemoveHtml($this->HSNId->caption());

            // TaxInclusive
            $this->TaxInclusive->EditAttrs["class"] = "form-control";
            $this->TaxInclusive->EditCustomAttributes = "";
            $this->TaxInclusive->EditValue = HtmlEncode($this->TaxInclusive->CurrentValue);
            $this->TaxInclusive->PlaceHolder = RemoveHtml($this->TaxInclusive->caption());

            // EligibleforWarranty
            $this->EligibleforWarranty->EditAttrs["class"] = "form-control";
            $this->EligibleforWarranty->EditCustomAttributes = "";
            $this->EligibleforWarranty->EditValue = HtmlEncode($this->EligibleforWarranty->CurrentValue);
            $this->EligibleforWarranty->PlaceHolder = RemoveHtml($this->EligibleforWarranty->caption());

            // NoofMonthsWarranty
            $this->NoofMonthsWarranty->EditAttrs["class"] = "form-control";
            $this->NoofMonthsWarranty->EditCustomAttributes = "";
            $this->NoofMonthsWarranty->EditValue = HtmlEncode($this->NoofMonthsWarranty->CurrentValue);
            $this->NoofMonthsWarranty->PlaceHolder = RemoveHtml($this->NoofMonthsWarranty->caption());

            // ComputeTaxonCost
            $this->ComputeTaxonCost->EditAttrs["class"] = "form-control";
            $this->ComputeTaxonCost->EditCustomAttributes = "";
            $this->ComputeTaxonCost->EditValue = HtmlEncode($this->ComputeTaxonCost->CurrentValue);
            $this->ComputeTaxonCost->PlaceHolder = RemoveHtml($this->ComputeTaxonCost->caption());

            // HasEmptyBottleTrack
            $this->HasEmptyBottleTrack->EditAttrs["class"] = "form-control";
            $this->HasEmptyBottleTrack->EditCustomAttributes = "";
            $this->HasEmptyBottleTrack->EditValue = HtmlEncode($this->HasEmptyBottleTrack->CurrentValue);
            $this->HasEmptyBottleTrack->PlaceHolder = RemoveHtml($this->HasEmptyBottleTrack->caption());

            // EmptyBottleReferenceCode
            $this->EmptyBottleReferenceCode->EditAttrs["class"] = "form-control";
            $this->EmptyBottleReferenceCode->EditCustomAttributes = "";
            $this->EmptyBottleReferenceCode->EditValue = HtmlEncode($this->EmptyBottleReferenceCode->CurrentValue);
            $this->EmptyBottleReferenceCode->PlaceHolder = RemoveHtml($this->EmptyBottleReferenceCode->caption());

            // AdditionalCESSAmount
            $this->AdditionalCESSAmount->EditAttrs["class"] = "form-control";
            $this->AdditionalCESSAmount->EditCustomAttributes = "";
            $this->AdditionalCESSAmount->EditValue = HtmlEncode($this->AdditionalCESSAmount->CurrentValue);
            $this->AdditionalCESSAmount->PlaceHolder = RemoveHtml($this->AdditionalCESSAmount->caption());
            if (strval($this->AdditionalCESSAmount->EditValue) != "" && is_numeric($this->AdditionalCESSAmount->EditValue)) {
                $this->AdditionalCESSAmount->EditValue = FormatNumber($this->AdditionalCESSAmount->EditValue, -2, -2, -2, -2);
            }

            // EmptyBottleRate
            $this->EmptyBottleRate->EditAttrs["class"] = "form-control";
            $this->EmptyBottleRate->EditCustomAttributes = "";
            $this->EmptyBottleRate->EditValue = HtmlEncode($this->EmptyBottleRate->CurrentValue);
            $this->EmptyBottleRate->PlaceHolder = RemoveHtml($this->EmptyBottleRate->caption());
            if (strval($this->EmptyBottleRate->EditValue) != "" && is_numeric($this->EmptyBottleRate->EditValue)) {
                $this->EmptyBottleRate->EditValue = FormatNumber($this->EmptyBottleRate->EditValue, -2, -2, -2, -2);
            }

            // Add refer script

            // ProductName
            $this->ProductName->LinkCustomAttributes = "";
            $this->ProductName->HrefValue = "";

            // DivisionCode
            $this->DivisionCode->LinkCustomAttributes = "";
            $this->DivisionCode->HrefValue = "";

            // ManufacturerCode
            $this->ManufacturerCode->LinkCustomAttributes = "";
            $this->ManufacturerCode->HrefValue = "";

            // SupplierCode
            $this->SupplierCode->LinkCustomAttributes = "";
            $this->SupplierCode->HrefValue = "";

            // AlternateSupplierCodes
            $this->AlternateSupplierCodes->LinkCustomAttributes = "";
            $this->AlternateSupplierCodes->HrefValue = "";

            // AlternateProductCode
            $this->AlternateProductCode->LinkCustomAttributes = "";
            $this->AlternateProductCode->HrefValue = "";

            // UniversalProductCode
            $this->UniversalProductCode->LinkCustomAttributes = "";
            $this->UniversalProductCode->HrefValue = "";

            // BookProductCode
            $this->BookProductCode->LinkCustomAttributes = "";
            $this->BookProductCode->HrefValue = "";

            // OldCode
            $this->OldCode->LinkCustomAttributes = "";
            $this->OldCode->HrefValue = "";

            // ProtectedProducts
            $this->ProtectedProducts->LinkCustomAttributes = "";
            $this->ProtectedProducts->HrefValue = "";

            // ProductFullName
            $this->ProductFullName->LinkCustomAttributes = "";
            $this->ProductFullName->HrefValue = "";

            // UnitOfMeasure
            $this->UnitOfMeasure->LinkCustomAttributes = "";
            $this->UnitOfMeasure->HrefValue = "";

            // UnitDescription
            $this->UnitDescription->LinkCustomAttributes = "";
            $this->UnitDescription->HrefValue = "";

            // BulkDescription
            $this->BulkDescription->LinkCustomAttributes = "";
            $this->BulkDescription->HrefValue = "";

            // BarCodeDescription
            $this->BarCodeDescription->LinkCustomAttributes = "";
            $this->BarCodeDescription->HrefValue = "";

            // PackageInformation
            $this->PackageInformation->LinkCustomAttributes = "";
            $this->PackageInformation->HrefValue = "";

            // PackageId
            $this->PackageId->LinkCustomAttributes = "";
            $this->PackageId->HrefValue = "";

            // Weight
            $this->Weight->LinkCustomAttributes = "";
            $this->Weight->HrefValue = "";

            // AllowFractions
            $this->AllowFractions->LinkCustomAttributes = "";
            $this->AllowFractions->HrefValue = "";

            // MinimumStockLevel
            $this->MinimumStockLevel->LinkCustomAttributes = "";
            $this->MinimumStockLevel->HrefValue = "";

            // MaximumStockLevel
            $this->MaximumStockLevel->LinkCustomAttributes = "";
            $this->MaximumStockLevel->HrefValue = "";

            // ReorderLevel
            $this->ReorderLevel->LinkCustomAttributes = "";
            $this->ReorderLevel->HrefValue = "";

            // MinMaxRatio
            $this->MinMaxRatio->LinkCustomAttributes = "";
            $this->MinMaxRatio->HrefValue = "";

            // AutoMinMaxRatio
            $this->AutoMinMaxRatio->LinkCustomAttributes = "";
            $this->AutoMinMaxRatio->HrefValue = "";

            // ScheduleCode
            $this->ScheduleCode->LinkCustomAttributes = "";
            $this->ScheduleCode->HrefValue = "";

            // RopRatio
            $this->RopRatio->LinkCustomAttributes = "";
            $this->RopRatio->HrefValue = "";

            // MRP
            $this->MRP->LinkCustomAttributes = "";
            $this->MRP->HrefValue = "";

            // PurchasePrice
            $this->PurchasePrice->LinkCustomAttributes = "";
            $this->PurchasePrice->HrefValue = "";

            // PurchaseUnit
            $this->PurchaseUnit->LinkCustomAttributes = "";
            $this->PurchaseUnit->HrefValue = "";

            // PurchaseTaxCode
            $this->PurchaseTaxCode->LinkCustomAttributes = "";
            $this->PurchaseTaxCode->HrefValue = "";

            // AllowDirectInward
            $this->AllowDirectInward->LinkCustomAttributes = "";
            $this->AllowDirectInward->HrefValue = "";

            // SalePrice
            $this->SalePrice->LinkCustomAttributes = "";
            $this->SalePrice->HrefValue = "";

            // SaleUnit
            $this->SaleUnit->LinkCustomAttributes = "";
            $this->SaleUnit->HrefValue = "";

            // SalesTaxCode
            $this->SalesTaxCode->LinkCustomAttributes = "";
            $this->SalesTaxCode->HrefValue = "";

            // StockReceived
            $this->StockReceived->LinkCustomAttributes = "";
            $this->StockReceived->HrefValue = "";

            // TotalStock
            $this->TotalStock->LinkCustomAttributes = "";
            $this->TotalStock->HrefValue = "";

            // StockType
            $this->StockType->LinkCustomAttributes = "";
            $this->StockType->HrefValue = "";

            // StockCheckDate
            $this->StockCheckDate->LinkCustomAttributes = "";
            $this->StockCheckDate->HrefValue = "";

            // StockAdjustmentDate
            $this->StockAdjustmentDate->LinkCustomAttributes = "";
            $this->StockAdjustmentDate->HrefValue = "";

            // Remarks
            $this->Remarks->LinkCustomAttributes = "";
            $this->Remarks->HrefValue = "";

            // CostCentre
            $this->CostCentre->LinkCustomAttributes = "";
            $this->CostCentre->HrefValue = "";

            // ProductType
            $this->ProductType->LinkCustomAttributes = "";
            $this->ProductType->HrefValue = "";

            // TaxAmount
            $this->TaxAmount->LinkCustomAttributes = "";
            $this->TaxAmount->HrefValue = "";

            // TaxId
            $this->TaxId->LinkCustomAttributes = "";
            $this->TaxId->HrefValue = "";

            // ResaleTaxApplicable
            $this->ResaleTaxApplicable->LinkCustomAttributes = "";
            $this->ResaleTaxApplicable->HrefValue = "";

            // CstOtherTax
            $this->CstOtherTax->LinkCustomAttributes = "";
            $this->CstOtherTax->HrefValue = "";

            // TotalTax
            $this->TotalTax->LinkCustomAttributes = "";
            $this->TotalTax->HrefValue = "";

            // ItemCost
            $this->ItemCost->LinkCustomAttributes = "";
            $this->ItemCost->HrefValue = "";

            // ExpiryDate
            $this->ExpiryDate->LinkCustomAttributes = "";
            $this->ExpiryDate->HrefValue = "";

            // BatchDescription
            $this->BatchDescription->LinkCustomAttributes = "";
            $this->BatchDescription->HrefValue = "";

            // FreeScheme
            $this->FreeScheme->LinkCustomAttributes = "";
            $this->FreeScheme->HrefValue = "";

            // CashDiscountEligibility
            $this->CashDiscountEligibility->LinkCustomAttributes = "";
            $this->CashDiscountEligibility->HrefValue = "";

            // DiscountPerAllowInBill
            $this->DiscountPerAllowInBill->LinkCustomAttributes = "";
            $this->DiscountPerAllowInBill->HrefValue = "";

            // Discount
            $this->Discount->LinkCustomAttributes = "";
            $this->Discount->HrefValue = "";

            // TotalAmount
            $this->TotalAmount->LinkCustomAttributes = "";
            $this->TotalAmount->HrefValue = "";

            // StandardMargin
            $this->StandardMargin->LinkCustomAttributes = "";
            $this->StandardMargin->HrefValue = "";

            // Margin
            $this->Margin->LinkCustomAttributes = "";
            $this->Margin->HrefValue = "";

            // MarginId
            $this->MarginId->LinkCustomAttributes = "";
            $this->MarginId->HrefValue = "";

            // ExpectedMargin
            $this->ExpectedMargin->LinkCustomAttributes = "";
            $this->ExpectedMargin->HrefValue = "";

            // SurchargeBeforeTax
            $this->SurchargeBeforeTax->LinkCustomAttributes = "";
            $this->SurchargeBeforeTax->HrefValue = "";

            // SurchargeAfterTax
            $this->SurchargeAfterTax->LinkCustomAttributes = "";
            $this->SurchargeAfterTax->HrefValue = "";

            // TempOrderNo
            $this->TempOrderNo->LinkCustomAttributes = "";
            $this->TempOrderNo->HrefValue = "";

            // TempOrderDate
            $this->TempOrderDate->LinkCustomAttributes = "";
            $this->TempOrderDate->HrefValue = "";

            // OrderUnit
            $this->OrderUnit->LinkCustomAttributes = "";
            $this->OrderUnit->HrefValue = "";

            // OrderQuantity
            $this->OrderQuantity->LinkCustomAttributes = "";
            $this->OrderQuantity->HrefValue = "";

            // MarkForOrder
            $this->MarkForOrder->LinkCustomAttributes = "";
            $this->MarkForOrder->HrefValue = "";

            // OrderAllId
            $this->OrderAllId->LinkCustomAttributes = "";
            $this->OrderAllId->HrefValue = "";

            // CalculateOrderQty
            $this->CalculateOrderQty->LinkCustomAttributes = "";
            $this->CalculateOrderQty->HrefValue = "";

            // SubLocation
            $this->SubLocation->LinkCustomAttributes = "";
            $this->SubLocation->HrefValue = "";

            // CategoryCode
            $this->CategoryCode->LinkCustomAttributes = "";
            $this->CategoryCode->HrefValue = "";

            // SubCategory
            $this->SubCategory->LinkCustomAttributes = "";
            $this->SubCategory->HrefValue = "";

            // FlexCategoryCode
            $this->FlexCategoryCode->LinkCustomAttributes = "";
            $this->FlexCategoryCode->HrefValue = "";

            // ABCSaleQty
            $this->ABCSaleQty->LinkCustomAttributes = "";
            $this->ABCSaleQty->HrefValue = "";

            // ABCSaleValue
            $this->ABCSaleValue->LinkCustomAttributes = "";
            $this->ABCSaleValue->HrefValue = "";

            // ConvertionFactor
            $this->ConvertionFactor->LinkCustomAttributes = "";
            $this->ConvertionFactor->HrefValue = "";

            // ConvertionUnitDesc
            $this->ConvertionUnitDesc->LinkCustomAttributes = "";
            $this->ConvertionUnitDesc->HrefValue = "";

            // TransactionId
            $this->TransactionId->LinkCustomAttributes = "";
            $this->TransactionId->HrefValue = "";

            // SoldProductId
            $this->SoldProductId->LinkCustomAttributes = "";
            $this->SoldProductId->HrefValue = "";

            // WantedBookId
            $this->WantedBookId->LinkCustomAttributes = "";
            $this->WantedBookId->HrefValue = "";

            // AllId
            $this->AllId->LinkCustomAttributes = "";
            $this->AllId->HrefValue = "";

            // BatchAndExpiryCompulsory
            $this->BatchAndExpiryCompulsory->LinkCustomAttributes = "";
            $this->BatchAndExpiryCompulsory->HrefValue = "";

            // BatchStockForWantedBook
            $this->BatchStockForWantedBook->LinkCustomAttributes = "";
            $this->BatchStockForWantedBook->HrefValue = "";

            // UnitBasedBilling
            $this->UnitBasedBilling->LinkCustomAttributes = "";
            $this->UnitBasedBilling->HrefValue = "";

            // DoNotCheckStock
            $this->DoNotCheckStock->LinkCustomAttributes = "";
            $this->DoNotCheckStock->HrefValue = "";

            // AcceptRate
            $this->AcceptRate->LinkCustomAttributes = "";
            $this->AcceptRate->HrefValue = "";

            // PriceLevel
            $this->PriceLevel->LinkCustomAttributes = "";
            $this->PriceLevel->HrefValue = "";

            // LastQuotePrice
            $this->LastQuotePrice->LinkCustomAttributes = "";
            $this->LastQuotePrice->HrefValue = "";

            // PriceChange
            $this->PriceChange->LinkCustomAttributes = "";
            $this->PriceChange->HrefValue = "";

            // CommodityCode
            $this->CommodityCode->LinkCustomAttributes = "";
            $this->CommodityCode->HrefValue = "";

            // InstitutePrice
            $this->InstitutePrice->LinkCustomAttributes = "";
            $this->InstitutePrice->HrefValue = "";

            // CtrlOrDCtrlProduct
            $this->CtrlOrDCtrlProduct->LinkCustomAttributes = "";
            $this->CtrlOrDCtrlProduct->HrefValue = "";

            // ImportedDate
            $this->ImportedDate->LinkCustomAttributes = "";
            $this->ImportedDate->HrefValue = "";

            // IsImported
            $this->IsImported->LinkCustomAttributes = "";
            $this->IsImported->HrefValue = "";

            // FileName
            $this->FileName->LinkCustomAttributes = "";
            $this->FileName->HrefValue = "";

            // LPName
            $this->LPName->LinkCustomAttributes = "";
            $this->LPName->HrefValue = "";

            // GodownNumber
            $this->GodownNumber->LinkCustomAttributes = "";
            $this->GodownNumber->HrefValue = "";

            // CreationDate
            $this->CreationDate->LinkCustomAttributes = "";
            $this->CreationDate->HrefValue = "";

            // CreatedbyUser
            $this->CreatedbyUser->LinkCustomAttributes = "";
            $this->CreatedbyUser->HrefValue = "";

            // ModifiedDate
            $this->ModifiedDate->LinkCustomAttributes = "";
            $this->ModifiedDate->HrefValue = "";

            // ModifiedbyUser
            $this->ModifiedbyUser->LinkCustomAttributes = "";
            $this->ModifiedbyUser->HrefValue = "";

            // isActive
            $this->isActive->LinkCustomAttributes = "";
            $this->isActive->HrefValue = "";

            // AllowExpiryClaim
            $this->AllowExpiryClaim->LinkCustomAttributes = "";
            $this->AllowExpiryClaim->HrefValue = "";

            // BrandCode
            $this->BrandCode->LinkCustomAttributes = "";
            $this->BrandCode->HrefValue = "";

            // FreeSchemeBasedon
            $this->FreeSchemeBasedon->LinkCustomAttributes = "";
            $this->FreeSchemeBasedon->HrefValue = "";

            // DoNotCheckCostInBill
            $this->DoNotCheckCostInBill->LinkCustomAttributes = "";
            $this->DoNotCheckCostInBill->HrefValue = "";

            // ProductGroupCode
            $this->ProductGroupCode->LinkCustomAttributes = "";
            $this->ProductGroupCode->HrefValue = "";

            // ProductStrengthCode
            $this->ProductStrengthCode->LinkCustomAttributes = "";
            $this->ProductStrengthCode->HrefValue = "";

            // PackingCode
            $this->PackingCode->LinkCustomAttributes = "";
            $this->PackingCode->HrefValue = "";

            // ComputedMinStock
            $this->ComputedMinStock->LinkCustomAttributes = "";
            $this->ComputedMinStock->HrefValue = "";

            // ComputedMaxStock
            $this->ComputedMaxStock->LinkCustomAttributes = "";
            $this->ComputedMaxStock->HrefValue = "";

            // ProductRemark
            $this->ProductRemark->LinkCustomAttributes = "";
            $this->ProductRemark->HrefValue = "";

            // ProductDrugCode
            $this->ProductDrugCode->LinkCustomAttributes = "";
            $this->ProductDrugCode->HrefValue = "";

            // IsMatrixProduct
            $this->IsMatrixProduct->LinkCustomAttributes = "";
            $this->IsMatrixProduct->HrefValue = "";

            // AttributeCount1
            $this->AttributeCount1->LinkCustomAttributes = "";
            $this->AttributeCount1->HrefValue = "";

            // AttributeCount2
            $this->AttributeCount2->LinkCustomAttributes = "";
            $this->AttributeCount2->HrefValue = "";

            // AttributeCount3
            $this->AttributeCount3->LinkCustomAttributes = "";
            $this->AttributeCount3->HrefValue = "";

            // AttributeCount4
            $this->AttributeCount4->LinkCustomAttributes = "";
            $this->AttributeCount4->HrefValue = "";

            // AttributeCount5
            $this->AttributeCount5->LinkCustomAttributes = "";
            $this->AttributeCount5->HrefValue = "";

            // DefaultDiscountPercentage
            $this->DefaultDiscountPercentage->LinkCustomAttributes = "";
            $this->DefaultDiscountPercentage->HrefValue = "";

            // DonotPrintBarcode
            $this->DonotPrintBarcode->LinkCustomAttributes = "";
            $this->DonotPrintBarcode->HrefValue = "";

            // ProductLevelDiscount
            $this->ProductLevelDiscount->LinkCustomAttributes = "";
            $this->ProductLevelDiscount->HrefValue = "";

            // Markup
            $this->Markup->LinkCustomAttributes = "";
            $this->Markup->HrefValue = "";

            // MarkDown
            $this->MarkDown->LinkCustomAttributes = "";
            $this->MarkDown->HrefValue = "";

            // ReworkSalePrice
            $this->ReworkSalePrice->LinkCustomAttributes = "";
            $this->ReworkSalePrice->HrefValue = "";

            // MultipleInput
            $this->MultipleInput->LinkCustomAttributes = "";
            $this->MultipleInput->HrefValue = "";

            // LpPackageInformation
            $this->LpPackageInformation->LinkCustomAttributes = "";
            $this->LpPackageInformation->HrefValue = "";

            // AllowNegativeStock
            $this->AllowNegativeStock->LinkCustomAttributes = "";
            $this->AllowNegativeStock->HrefValue = "";

            // OrderDate
            $this->OrderDate->LinkCustomAttributes = "";
            $this->OrderDate->HrefValue = "";

            // OrderTime
            $this->OrderTime->LinkCustomAttributes = "";
            $this->OrderTime->HrefValue = "";

            // RateGroupCode
            $this->RateGroupCode->LinkCustomAttributes = "";
            $this->RateGroupCode->HrefValue = "";

            // ConversionCaseLot
            $this->ConversionCaseLot->LinkCustomAttributes = "";
            $this->ConversionCaseLot->HrefValue = "";

            // ShippingLot
            $this->ShippingLot->LinkCustomAttributes = "";
            $this->ShippingLot->HrefValue = "";

            // AllowExpiryReplacement
            $this->AllowExpiryReplacement->LinkCustomAttributes = "";
            $this->AllowExpiryReplacement->HrefValue = "";

            // NoOfMonthExpiryAllowed
            $this->NoOfMonthExpiryAllowed->LinkCustomAttributes = "";
            $this->NoOfMonthExpiryAllowed->HrefValue = "";

            // ProductDiscountEligibility
            $this->ProductDiscountEligibility->LinkCustomAttributes = "";
            $this->ProductDiscountEligibility->HrefValue = "";

            // ScheduleTypeCode
            $this->ScheduleTypeCode->LinkCustomAttributes = "";
            $this->ScheduleTypeCode->HrefValue = "";

            // AIOCDProductCode
            $this->AIOCDProductCode->LinkCustomAttributes = "";
            $this->AIOCDProductCode->HrefValue = "";

            // FreeQuantity
            $this->FreeQuantity->LinkCustomAttributes = "";
            $this->FreeQuantity->HrefValue = "";

            // DiscountType
            $this->DiscountType->LinkCustomAttributes = "";
            $this->DiscountType->HrefValue = "";

            // DiscountValue
            $this->DiscountValue->LinkCustomAttributes = "";
            $this->DiscountValue->HrefValue = "";

            // HasProductOrderAttribute
            $this->HasProductOrderAttribute->LinkCustomAttributes = "";
            $this->HasProductOrderAttribute->HrefValue = "";

            // FirstPODate
            $this->FirstPODate->LinkCustomAttributes = "";
            $this->FirstPODate->HrefValue = "";

            // SaleprcieAndMrpCalcPercent
            $this->SaleprcieAndMrpCalcPercent->LinkCustomAttributes = "";
            $this->SaleprcieAndMrpCalcPercent->HrefValue = "";

            // IsGiftVoucherProducts
            $this->IsGiftVoucherProducts->LinkCustomAttributes = "";
            $this->IsGiftVoucherProducts->HrefValue = "";

            // AcceptRange4SerialNumber
            $this->AcceptRange4SerialNumber->LinkCustomAttributes = "";
            $this->AcceptRange4SerialNumber->HrefValue = "";

            // GiftVoucherDenomination
            $this->GiftVoucherDenomination->LinkCustomAttributes = "";
            $this->GiftVoucherDenomination->HrefValue = "";

            // Subclasscode
            $this->Subclasscode->LinkCustomAttributes = "";
            $this->Subclasscode->HrefValue = "";

            // BarCodeFromWeighingMachine
            $this->BarCodeFromWeighingMachine->LinkCustomAttributes = "";
            $this->BarCodeFromWeighingMachine->HrefValue = "";

            // CheckCostInReturn
            $this->CheckCostInReturn->LinkCustomAttributes = "";
            $this->CheckCostInReturn->HrefValue = "";

            // FrequentSaleProduct
            $this->FrequentSaleProduct->LinkCustomAttributes = "";
            $this->FrequentSaleProduct->HrefValue = "";

            // RateType
            $this->RateType->LinkCustomAttributes = "";
            $this->RateType->HrefValue = "";

            // TouchscreenName
            $this->TouchscreenName->LinkCustomAttributes = "";
            $this->TouchscreenName->HrefValue = "";

            // FreeType
            $this->FreeType->LinkCustomAttributes = "";
            $this->FreeType->HrefValue = "";

            // LooseQtyasNewBatch
            $this->LooseQtyasNewBatch->LinkCustomAttributes = "";
            $this->LooseQtyasNewBatch->HrefValue = "";

            // AllowSlabBilling
            $this->AllowSlabBilling->LinkCustomAttributes = "";
            $this->AllowSlabBilling->HrefValue = "";

            // ProductTypeForProduction
            $this->ProductTypeForProduction->LinkCustomAttributes = "";
            $this->ProductTypeForProduction->HrefValue = "";

            // RecipeCode
            $this->RecipeCode->LinkCustomAttributes = "";
            $this->RecipeCode->HrefValue = "";

            // DefaultUnitType
            $this->DefaultUnitType->LinkCustomAttributes = "";
            $this->DefaultUnitType->HrefValue = "";

            // PIstatus
            $this->PIstatus->LinkCustomAttributes = "";
            $this->PIstatus->HrefValue = "";

            // LastPiConfirmedDate
            $this->LastPiConfirmedDate->LinkCustomAttributes = "";
            $this->LastPiConfirmedDate->HrefValue = "";

            // BarCodeDesign
            $this->BarCodeDesign->LinkCustomAttributes = "";
            $this->BarCodeDesign->HrefValue = "";

            // AcceptRemarksInBill
            $this->AcceptRemarksInBill->LinkCustomAttributes = "";
            $this->AcceptRemarksInBill->HrefValue = "";

            // Classification
            $this->Classification->LinkCustomAttributes = "";
            $this->Classification->HrefValue = "";

            // TimeSlot
            $this->TimeSlot->LinkCustomAttributes = "";
            $this->TimeSlot->HrefValue = "";

            // IsBundle
            $this->IsBundle->LinkCustomAttributes = "";
            $this->IsBundle->HrefValue = "";

            // ColorCode
            $this->ColorCode->LinkCustomAttributes = "";
            $this->ColorCode->HrefValue = "";

            // GenderCode
            $this->GenderCode->LinkCustomAttributes = "";
            $this->GenderCode->HrefValue = "";

            // SizeCode
            $this->SizeCode->LinkCustomAttributes = "";
            $this->SizeCode->HrefValue = "";

            // GiftCard
            $this->GiftCard->LinkCustomAttributes = "";
            $this->GiftCard->HrefValue = "";

            // ToonLabel
            $this->ToonLabel->LinkCustomAttributes = "";
            $this->ToonLabel->HrefValue = "";

            // GarmentType
            $this->GarmentType->LinkCustomAttributes = "";
            $this->GarmentType->HrefValue = "";

            // AgeGroup
            $this->AgeGroup->LinkCustomAttributes = "";
            $this->AgeGroup->HrefValue = "";

            // Season
            $this->Season->LinkCustomAttributes = "";
            $this->Season->HrefValue = "";

            // DailyStockEntry
            $this->DailyStockEntry->LinkCustomAttributes = "";
            $this->DailyStockEntry->HrefValue = "";

            // ModifierApplicable
            $this->ModifierApplicable->LinkCustomAttributes = "";
            $this->ModifierApplicable->HrefValue = "";

            // ModifierType
            $this->ModifierType->LinkCustomAttributes = "";
            $this->ModifierType->HrefValue = "";

            // AcceptZeroRate
            $this->AcceptZeroRate->LinkCustomAttributes = "";
            $this->AcceptZeroRate->HrefValue = "";

            // ExciseDutyCode
            $this->ExciseDutyCode->LinkCustomAttributes = "";
            $this->ExciseDutyCode->HrefValue = "";

            // IndentProductGroupCode
            $this->IndentProductGroupCode->LinkCustomAttributes = "";
            $this->IndentProductGroupCode->HrefValue = "";

            // IsMultiBatch
            $this->IsMultiBatch->LinkCustomAttributes = "";
            $this->IsMultiBatch->HrefValue = "";

            // IsSingleBatch
            $this->IsSingleBatch->LinkCustomAttributes = "";
            $this->IsSingleBatch->HrefValue = "";

            // MarkUpRate1
            $this->MarkUpRate1->LinkCustomAttributes = "";
            $this->MarkUpRate1->HrefValue = "";

            // MarkDownRate1
            $this->MarkDownRate1->LinkCustomAttributes = "";
            $this->MarkDownRate1->HrefValue = "";

            // MarkUpRate2
            $this->MarkUpRate2->LinkCustomAttributes = "";
            $this->MarkUpRate2->HrefValue = "";

            // MarkDownRate2
            $this->MarkDownRate2->LinkCustomAttributes = "";
            $this->MarkDownRate2->HrefValue = "";

            // Yield
            $this->_Yield->LinkCustomAttributes = "";
            $this->_Yield->HrefValue = "";

            // RefProductCode
            $this->RefProductCode->LinkCustomAttributes = "";
            $this->RefProductCode->HrefValue = "";

            // Volume
            $this->Volume->LinkCustomAttributes = "";
            $this->Volume->HrefValue = "";

            // MeasurementID
            $this->MeasurementID->LinkCustomAttributes = "";
            $this->MeasurementID->HrefValue = "";

            // CountryCode
            $this->CountryCode->LinkCustomAttributes = "";
            $this->CountryCode->HrefValue = "";

            // AcceptWMQty
            $this->AcceptWMQty->LinkCustomAttributes = "";
            $this->AcceptWMQty->HrefValue = "";

            // SingleBatchBasedOnRate
            $this->SingleBatchBasedOnRate->LinkCustomAttributes = "";
            $this->SingleBatchBasedOnRate->HrefValue = "";

            // TenderNo
            $this->TenderNo->LinkCustomAttributes = "";
            $this->TenderNo->HrefValue = "";

            // SingleBillMaximumSoldQtyFiled
            $this->SingleBillMaximumSoldQtyFiled->LinkCustomAttributes = "";
            $this->SingleBillMaximumSoldQtyFiled->HrefValue = "";

            // Strength1
            $this->Strength1->LinkCustomAttributes = "";
            $this->Strength1->HrefValue = "";

            // Strength2
            $this->Strength2->LinkCustomAttributes = "";
            $this->Strength2->HrefValue = "";

            // Strength3
            $this->Strength3->LinkCustomAttributes = "";
            $this->Strength3->HrefValue = "";

            // Strength4
            $this->Strength4->LinkCustomAttributes = "";
            $this->Strength4->HrefValue = "";

            // Strength5
            $this->Strength5->LinkCustomAttributes = "";
            $this->Strength5->HrefValue = "";

            // IngredientCode1
            $this->IngredientCode1->LinkCustomAttributes = "";
            $this->IngredientCode1->HrefValue = "";

            // IngredientCode2
            $this->IngredientCode2->LinkCustomAttributes = "";
            $this->IngredientCode2->HrefValue = "";

            // IngredientCode3
            $this->IngredientCode3->LinkCustomAttributes = "";
            $this->IngredientCode3->HrefValue = "";

            // IngredientCode4
            $this->IngredientCode4->LinkCustomAttributes = "";
            $this->IngredientCode4->HrefValue = "";

            // IngredientCode5
            $this->IngredientCode5->LinkCustomAttributes = "";
            $this->IngredientCode5->HrefValue = "";

            // OrderType
            $this->OrderType->LinkCustomAttributes = "";
            $this->OrderType->HrefValue = "";

            // StockUOM
            $this->StockUOM->LinkCustomAttributes = "";
            $this->StockUOM->HrefValue = "";

            // PriceUOM
            $this->PriceUOM->LinkCustomAttributes = "";
            $this->PriceUOM->HrefValue = "";

            // DefaultSaleUOM
            $this->DefaultSaleUOM->LinkCustomAttributes = "";
            $this->DefaultSaleUOM->HrefValue = "";

            // DefaultPurchaseUOM
            $this->DefaultPurchaseUOM->LinkCustomAttributes = "";
            $this->DefaultPurchaseUOM->HrefValue = "";

            // ReportingUOM
            $this->ReportingUOM->LinkCustomAttributes = "";
            $this->ReportingUOM->HrefValue = "";

            // LastPurchasedUOM
            $this->LastPurchasedUOM->LinkCustomAttributes = "";
            $this->LastPurchasedUOM->HrefValue = "";

            // TreatmentCodes
            $this->TreatmentCodes->LinkCustomAttributes = "";
            $this->TreatmentCodes->HrefValue = "";

            // InsuranceType
            $this->InsuranceType->LinkCustomAttributes = "";
            $this->InsuranceType->HrefValue = "";

            // CoverageGroupCodes
            $this->CoverageGroupCodes->LinkCustomAttributes = "";
            $this->CoverageGroupCodes->HrefValue = "";

            // MultipleUOM
            $this->MultipleUOM->LinkCustomAttributes = "";
            $this->MultipleUOM->HrefValue = "";

            // SalePriceComputation
            $this->SalePriceComputation->LinkCustomAttributes = "";
            $this->SalePriceComputation->HrefValue = "";

            // StockCorrection
            $this->StockCorrection->LinkCustomAttributes = "";
            $this->StockCorrection->HrefValue = "";

            // LBTPercentage
            $this->LBTPercentage->LinkCustomAttributes = "";
            $this->LBTPercentage->HrefValue = "";

            // SalesCommission
            $this->SalesCommission->LinkCustomAttributes = "";
            $this->SalesCommission->HrefValue = "";

            // LockedStock
            $this->LockedStock->LinkCustomAttributes = "";
            $this->LockedStock->HrefValue = "";

            // MinMaxUOM
            $this->MinMaxUOM->LinkCustomAttributes = "";
            $this->MinMaxUOM->HrefValue = "";

            // ExpiryMfrDateFormat
            $this->ExpiryMfrDateFormat->LinkCustomAttributes = "";
            $this->ExpiryMfrDateFormat->HrefValue = "";

            // ProductLifeTime
            $this->ProductLifeTime->LinkCustomAttributes = "";
            $this->ProductLifeTime->HrefValue = "";

            // IsCombo
            $this->IsCombo->LinkCustomAttributes = "";
            $this->IsCombo->HrefValue = "";

            // ComboTypeCode
            $this->ComboTypeCode->LinkCustomAttributes = "";
            $this->ComboTypeCode->HrefValue = "";

            // AttributeCount6
            $this->AttributeCount6->LinkCustomAttributes = "";
            $this->AttributeCount6->HrefValue = "";

            // AttributeCount7
            $this->AttributeCount7->LinkCustomAttributes = "";
            $this->AttributeCount7->HrefValue = "";

            // AttributeCount8
            $this->AttributeCount8->LinkCustomAttributes = "";
            $this->AttributeCount8->HrefValue = "";

            // AttributeCount9
            $this->AttributeCount9->LinkCustomAttributes = "";
            $this->AttributeCount9->HrefValue = "";

            // AttributeCount10
            $this->AttributeCount10->LinkCustomAttributes = "";
            $this->AttributeCount10->HrefValue = "";

            // LabourCharge
            $this->LabourCharge->LinkCustomAttributes = "";
            $this->LabourCharge->HrefValue = "";

            // AffectOtherCharge
            $this->AffectOtherCharge->LinkCustomAttributes = "";
            $this->AffectOtherCharge->HrefValue = "";

            // DosageInfo
            $this->DosageInfo->LinkCustomAttributes = "";
            $this->DosageInfo->HrefValue = "";

            // DosageType
            $this->DosageType->LinkCustomAttributes = "";
            $this->DosageType->HrefValue = "";

            // DefaultIndentUOM
            $this->DefaultIndentUOM->LinkCustomAttributes = "";
            $this->DefaultIndentUOM->HrefValue = "";

            // PromoTag
            $this->PromoTag->LinkCustomAttributes = "";
            $this->PromoTag->HrefValue = "";

            // BillLevelPromoTag
            $this->BillLevelPromoTag->LinkCustomAttributes = "";
            $this->BillLevelPromoTag->HrefValue = "";

            // IsMRPProduct
            $this->IsMRPProduct->LinkCustomAttributes = "";
            $this->IsMRPProduct->HrefValue = "";

            // MrpList
            $this->MrpList->LinkCustomAttributes = "";
            $this->MrpList->HrefValue = "";

            // AlternateSaleUOM
            $this->AlternateSaleUOM->LinkCustomAttributes = "";
            $this->AlternateSaleUOM->HrefValue = "";

            // FreeUOM
            $this->FreeUOM->LinkCustomAttributes = "";
            $this->FreeUOM->HrefValue = "";

            // MarketedCode
            $this->MarketedCode->LinkCustomAttributes = "";
            $this->MarketedCode->HrefValue = "";

            // MinimumSalePrice
            $this->MinimumSalePrice->LinkCustomAttributes = "";
            $this->MinimumSalePrice->HrefValue = "";

            // PRate1
            $this->PRate1->LinkCustomAttributes = "";
            $this->PRate1->HrefValue = "";

            // PRate2
            $this->PRate2->LinkCustomAttributes = "";
            $this->PRate2->HrefValue = "";

            // LPItemCost
            $this->LPItemCost->LinkCustomAttributes = "";
            $this->LPItemCost->HrefValue = "";

            // FixedItemCost
            $this->FixedItemCost->LinkCustomAttributes = "";
            $this->FixedItemCost->HrefValue = "";

            // HSNId
            $this->HSNId->LinkCustomAttributes = "";
            $this->HSNId->HrefValue = "";

            // TaxInclusive
            $this->TaxInclusive->LinkCustomAttributes = "";
            $this->TaxInclusive->HrefValue = "";

            // EligibleforWarranty
            $this->EligibleforWarranty->LinkCustomAttributes = "";
            $this->EligibleforWarranty->HrefValue = "";

            // NoofMonthsWarranty
            $this->NoofMonthsWarranty->LinkCustomAttributes = "";
            $this->NoofMonthsWarranty->HrefValue = "";

            // ComputeTaxonCost
            $this->ComputeTaxonCost->LinkCustomAttributes = "";
            $this->ComputeTaxonCost->HrefValue = "";

            // HasEmptyBottleTrack
            $this->HasEmptyBottleTrack->LinkCustomAttributes = "";
            $this->HasEmptyBottleTrack->HrefValue = "";

            // EmptyBottleReferenceCode
            $this->EmptyBottleReferenceCode->LinkCustomAttributes = "";
            $this->EmptyBottleReferenceCode->HrefValue = "";

            // AdditionalCESSAmount
            $this->AdditionalCESSAmount->LinkCustomAttributes = "";
            $this->AdditionalCESSAmount->HrefValue = "";

            // EmptyBottleRate
            $this->EmptyBottleRate->LinkCustomAttributes = "";
            $this->EmptyBottleRate->HrefValue = "";
        }
        if ($this->RowType == ROWTYPE_ADD || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_SEARCH) { // Add/Edit/Search row
            $this->setupFieldTitles();
        }

        // Call Row Rendered event
        if ($this->RowType != ROWTYPE_AGGREGATEINIT) {
            $this->rowRendered();
        }
    }

    // Validate form
    protected function validateForm()
    {
        global $Language;

        // Check if validation required
        if (!Config("SERVER_VALIDATE")) {
            return true;
        }
        if ($this->ProductName->Required) {
            if (!$this->ProductName->IsDetailKey && EmptyValue($this->ProductName->FormValue)) {
                $this->ProductName->addErrorMessage(str_replace("%s", $this->ProductName->caption(), $this->ProductName->RequiredErrorMessage));
            }
        }
        if ($this->DivisionCode->Required) {
            if (!$this->DivisionCode->IsDetailKey && EmptyValue($this->DivisionCode->FormValue)) {
                $this->DivisionCode->addErrorMessage(str_replace("%s", $this->DivisionCode->caption(), $this->DivisionCode->RequiredErrorMessage));
            }
        }
        if ($this->ManufacturerCode->Required) {
            if (!$this->ManufacturerCode->IsDetailKey && EmptyValue($this->ManufacturerCode->FormValue)) {
                $this->ManufacturerCode->addErrorMessage(str_replace("%s", $this->ManufacturerCode->caption(), $this->ManufacturerCode->RequiredErrorMessage));
            }
        }
        if ($this->SupplierCode->Required) {
            if (!$this->SupplierCode->IsDetailKey && EmptyValue($this->SupplierCode->FormValue)) {
                $this->SupplierCode->addErrorMessage(str_replace("%s", $this->SupplierCode->caption(), $this->SupplierCode->RequiredErrorMessage));
            }
        }
        if ($this->AlternateSupplierCodes->Required) {
            if (!$this->AlternateSupplierCodes->IsDetailKey && EmptyValue($this->AlternateSupplierCodes->FormValue)) {
                $this->AlternateSupplierCodes->addErrorMessage(str_replace("%s", $this->AlternateSupplierCodes->caption(), $this->AlternateSupplierCodes->RequiredErrorMessage));
            }
        }
        if ($this->AlternateProductCode->Required) {
            if (!$this->AlternateProductCode->IsDetailKey && EmptyValue($this->AlternateProductCode->FormValue)) {
                $this->AlternateProductCode->addErrorMessage(str_replace("%s", $this->AlternateProductCode->caption(), $this->AlternateProductCode->RequiredErrorMessage));
            }
        }
        if ($this->UniversalProductCode->Required) {
            if (!$this->UniversalProductCode->IsDetailKey && EmptyValue($this->UniversalProductCode->FormValue)) {
                $this->UniversalProductCode->addErrorMessage(str_replace("%s", $this->UniversalProductCode->caption(), $this->UniversalProductCode->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->UniversalProductCode->FormValue)) {
            $this->UniversalProductCode->addErrorMessage($this->UniversalProductCode->getErrorMessage(false));
        }
        if ($this->BookProductCode->Required) {
            if (!$this->BookProductCode->IsDetailKey && EmptyValue($this->BookProductCode->FormValue)) {
                $this->BookProductCode->addErrorMessage(str_replace("%s", $this->BookProductCode->caption(), $this->BookProductCode->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->BookProductCode->FormValue)) {
            $this->BookProductCode->addErrorMessage($this->BookProductCode->getErrorMessage(false));
        }
        if ($this->OldCode->Required) {
            if (!$this->OldCode->IsDetailKey && EmptyValue($this->OldCode->FormValue)) {
                $this->OldCode->addErrorMessage(str_replace("%s", $this->OldCode->caption(), $this->OldCode->RequiredErrorMessage));
            }
        }
        if ($this->ProtectedProducts->Required) {
            if (!$this->ProtectedProducts->IsDetailKey && EmptyValue($this->ProtectedProducts->FormValue)) {
                $this->ProtectedProducts->addErrorMessage(str_replace("%s", $this->ProtectedProducts->caption(), $this->ProtectedProducts->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->ProtectedProducts->FormValue)) {
            $this->ProtectedProducts->addErrorMessage($this->ProtectedProducts->getErrorMessage(false));
        }
        if ($this->ProductFullName->Required) {
            if (!$this->ProductFullName->IsDetailKey && EmptyValue($this->ProductFullName->FormValue)) {
                $this->ProductFullName->addErrorMessage(str_replace("%s", $this->ProductFullName->caption(), $this->ProductFullName->RequiredErrorMessage));
            }
        }
        if ($this->UnitOfMeasure->Required) {
            if (!$this->UnitOfMeasure->IsDetailKey && EmptyValue($this->UnitOfMeasure->FormValue)) {
                $this->UnitOfMeasure->addErrorMessage(str_replace("%s", $this->UnitOfMeasure->caption(), $this->UnitOfMeasure->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->UnitOfMeasure->FormValue)) {
            $this->UnitOfMeasure->addErrorMessage($this->UnitOfMeasure->getErrorMessage(false));
        }
        if ($this->UnitDescription->Required) {
            if (!$this->UnitDescription->IsDetailKey && EmptyValue($this->UnitDescription->FormValue)) {
                $this->UnitDescription->addErrorMessage(str_replace("%s", $this->UnitDescription->caption(), $this->UnitDescription->RequiredErrorMessage));
            }
        }
        if ($this->BulkDescription->Required) {
            if (!$this->BulkDescription->IsDetailKey && EmptyValue($this->BulkDescription->FormValue)) {
                $this->BulkDescription->addErrorMessage(str_replace("%s", $this->BulkDescription->caption(), $this->BulkDescription->RequiredErrorMessage));
            }
        }
        if ($this->BarCodeDescription->Required) {
            if (!$this->BarCodeDescription->IsDetailKey && EmptyValue($this->BarCodeDescription->FormValue)) {
                $this->BarCodeDescription->addErrorMessage(str_replace("%s", $this->BarCodeDescription->caption(), $this->BarCodeDescription->RequiredErrorMessage));
            }
        }
        if ($this->PackageInformation->Required) {
            if (!$this->PackageInformation->IsDetailKey && EmptyValue($this->PackageInformation->FormValue)) {
                $this->PackageInformation->addErrorMessage(str_replace("%s", $this->PackageInformation->caption(), $this->PackageInformation->RequiredErrorMessage));
            }
        }
        if ($this->PackageId->Required) {
            if (!$this->PackageId->IsDetailKey && EmptyValue($this->PackageId->FormValue)) {
                $this->PackageId->addErrorMessage(str_replace("%s", $this->PackageId->caption(), $this->PackageId->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->PackageId->FormValue)) {
            $this->PackageId->addErrorMessage($this->PackageId->getErrorMessage(false));
        }
        if ($this->Weight->Required) {
            if (!$this->Weight->IsDetailKey && EmptyValue($this->Weight->FormValue)) {
                $this->Weight->addErrorMessage(str_replace("%s", $this->Weight->caption(), $this->Weight->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->Weight->FormValue)) {
            $this->Weight->addErrorMessage($this->Weight->getErrorMessage(false));
        }
        if ($this->AllowFractions->Required) {
            if (!$this->AllowFractions->IsDetailKey && EmptyValue($this->AllowFractions->FormValue)) {
                $this->AllowFractions->addErrorMessage(str_replace("%s", $this->AllowFractions->caption(), $this->AllowFractions->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->AllowFractions->FormValue)) {
            $this->AllowFractions->addErrorMessage($this->AllowFractions->getErrorMessage(false));
        }
        if ($this->MinimumStockLevel->Required) {
            if (!$this->MinimumStockLevel->IsDetailKey && EmptyValue($this->MinimumStockLevel->FormValue)) {
                $this->MinimumStockLevel->addErrorMessage(str_replace("%s", $this->MinimumStockLevel->caption(), $this->MinimumStockLevel->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->MinimumStockLevel->FormValue)) {
            $this->MinimumStockLevel->addErrorMessage($this->MinimumStockLevel->getErrorMessage(false));
        }
        if ($this->MaximumStockLevel->Required) {
            if (!$this->MaximumStockLevel->IsDetailKey && EmptyValue($this->MaximumStockLevel->FormValue)) {
                $this->MaximumStockLevel->addErrorMessage(str_replace("%s", $this->MaximumStockLevel->caption(), $this->MaximumStockLevel->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->MaximumStockLevel->FormValue)) {
            $this->MaximumStockLevel->addErrorMessage($this->MaximumStockLevel->getErrorMessage(false));
        }
        if ($this->ReorderLevel->Required) {
            if (!$this->ReorderLevel->IsDetailKey && EmptyValue($this->ReorderLevel->FormValue)) {
                $this->ReorderLevel->addErrorMessage(str_replace("%s", $this->ReorderLevel->caption(), $this->ReorderLevel->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->ReorderLevel->FormValue)) {
            $this->ReorderLevel->addErrorMessage($this->ReorderLevel->getErrorMessage(false));
        }
        if ($this->MinMaxRatio->Required) {
            if (!$this->MinMaxRatio->IsDetailKey && EmptyValue($this->MinMaxRatio->FormValue)) {
                $this->MinMaxRatio->addErrorMessage(str_replace("%s", $this->MinMaxRatio->caption(), $this->MinMaxRatio->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->MinMaxRatio->FormValue)) {
            $this->MinMaxRatio->addErrorMessage($this->MinMaxRatio->getErrorMessage(false));
        }
        if ($this->AutoMinMaxRatio->Required) {
            if (!$this->AutoMinMaxRatio->IsDetailKey && EmptyValue($this->AutoMinMaxRatio->FormValue)) {
                $this->AutoMinMaxRatio->addErrorMessage(str_replace("%s", $this->AutoMinMaxRatio->caption(), $this->AutoMinMaxRatio->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->AutoMinMaxRatio->FormValue)) {
            $this->AutoMinMaxRatio->addErrorMessage($this->AutoMinMaxRatio->getErrorMessage(false));
        }
        if ($this->ScheduleCode->Required) {
            if (!$this->ScheduleCode->IsDetailKey && EmptyValue($this->ScheduleCode->FormValue)) {
                $this->ScheduleCode->addErrorMessage(str_replace("%s", $this->ScheduleCode->caption(), $this->ScheduleCode->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->ScheduleCode->FormValue)) {
            $this->ScheduleCode->addErrorMessage($this->ScheduleCode->getErrorMessage(false));
        }
        if ($this->RopRatio->Required) {
            if (!$this->RopRatio->IsDetailKey && EmptyValue($this->RopRatio->FormValue)) {
                $this->RopRatio->addErrorMessage(str_replace("%s", $this->RopRatio->caption(), $this->RopRatio->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->RopRatio->FormValue)) {
            $this->RopRatio->addErrorMessage($this->RopRatio->getErrorMessage(false));
        }
        if ($this->MRP->Required) {
            if (!$this->MRP->IsDetailKey && EmptyValue($this->MRP->FormValue)) {
                $this->MRP->addErrorMessage(str_replace("%s", $this->MRP->caption(), $this->MRP->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->MRP->FormValue)) {
            $this->MRP->addErrorMessage($this->MRP->getErrorMessage(false));
        }
        if ($this->PurchasePrice->Required) {
            if (!$this->PurchasePrice->IsDetailKey && EmptyValue($this->PurchasePrice->FormValue)) {
                $this->PurchasePrice->addErrorMessage(str_replace("%s", $this->PurchasePrice->caption(), $this->PurchasePrice->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->PurchasePrice->FormValue)) {
            $this->PurchasePrice->addErrorMessage($this->PurchasePrice->getErrorMessage(false));
        }
        if ($this->PurchaseUnit->Required) {
            if (!$this->PurchaseUnit->IsDetailKey && EmptyValue($this->PurchaseUnit->FormValue)) {
                $this->PurchaseUnit->addErrorMessage(str_replace("%s", $this->PurchaseUnit->caption(), $this->PurchaseUnit->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->PurchaseUnit->FormValue)) {
            $this->PurchaseUnit->addErrorMessage($this->PurchaseUnit->getErrorMessage(false));
        }
        if ($this->PurchaseTaxCode->Required) {
            if (!$this->PurchaseTaxCode->IsDetailKey && EmptyValue($this->PurchaseTaxCode->FormValue)) {
                $this->PurchaseTaxCode->addErrorMessage(str_replace("%s", $this->PurchaseTaxCode->caption(), $this->PurchaseTaxCode->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->PurchaseTaxCode->FormValue)) {
            $this->PurchaseTaxCode->addErrorMessage($this->PurchaseTaxCode->getErrorMessage(false));
        }
        if ($this->AllowDirectInward->Required) {
            if (!$this->AllowDirectInward->IsDetailKey && EmptyValue($this->AllowDirectInward->FormValue)) {
                $this->AllowDirectInward->addErrorMessage(str_replace("%s", $this->AllowDirectInward->caption(), $this->AllowDirectInward->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->AllowDirectInward->FormValue)) {
            $this->AllowDirectInward->addErrorMessage($this->AllowDirectInward->getErrorMessage(false));
        }
        if ($this->SalePrice->Required) {
            if (!$this->SalePrice->IsDetailKey && EmptyValue($this->SalePrice->FormValue)) {
                $this->SalePrice->addErrorMessage(str_replace("%s", $this->SalePrice->caption(), $this->SalePrice->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->SalePrice->FormValue)) {
            $this->SalePrice->addErrorMessage($this->SalePrice->getErrorMessage(false));
        }
        if ($this->SaleUnit->Required) {
            if (!$this->SaleUnit->IsDetailKey && EmptyValue($this->SaleUnit->FormValue)) {
                $this->SaleUnit->addErrorMessage(str_replace("%s", $this->SaleUnit->caption(), $this->SaleUnit->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->SaleUnit->FormValue)) {
            $this->SaleUnit->addErrorMessage($this->SaleUnit->getErrorMessage(false));
        }
        if ($this->SalesTaxCode->Required) {
            if (!$this->SalesTaxCode->IsDetailKey && EmptyValue($this->SalesTaxCode->FormValue)) {
                $this->SalesTaxCode->addErrorMessage(str_replace("%s", $this->SalesTaxCode->caption(), $this->SalesTaxCode->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->SalesTaxCode->FormValue)) {
            $this->SalesTaxCode->addErrorMessage($this->SalesTaxCode->getErrorMessage(false));
        }
        if ($this->StockReceived->Required) {
            if (!$this->StockReceived->IsDetailKey && EmptyValue($this->StockReceived->FormValue)) {
                $this->StockReceived->addErrorMessage(str_replace("%s", $this->StockReceived->caption(), $this->StockReceived->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->StockReceived->FormValue)) {
            $this->StockReceived->addErrorMessage($this->StockReceived->getErrorMessage(false));
        }
        if ($this->TotalStock->Required) {
            if (!$this->TotalStock->IsDetailKey && EmptyValue($this->TotalStock->FormValue)) {
                $this->TotalStock->addErrorMessage(str_replace("%s", $this->TotalStock->caption(), $this->TotalStock->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->TotalStock->FormValue)) {
            $this->TotalStock->addErrorMessage($this->TotalStock->getErrorMessage(false));
        }
        if ($this->StockType->Required) {
            if (!$this->StockType->IsDetailKey && EmptyValue($this->StockType->FormValue)) {
                $this->StockType->addErrorMessage(str_replace("%s", $this->StockType->caption(), $this->StockType->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->StockType->FormValue)) {
            $this->StockType->addErrorMessage($this->StockType->getErrorMessage(false));
        }
        if ($this->StockCheckDate->Required) {
            if (!$this->StockCheckDate->IsDetailKey && EmptyValue($this->StockCheckDate->FormValue)) {
                $this->StockCheckDate->addErrorMessage(str_replace("%s", $this->StockCheckDate->caption(), $this->StockCheckDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->StockCheckDate->FormValue)) {
            $this->StockCheckDate->addErrorMessage($this->StockCheckDate->getErrorMessage(false));
        }
        if ($this->StockAdjustmentDate->Required) {
            if (!$this->StockAdjustmentDate->IsDetailKey && EmptyValue($this->StockAdjustmentDate->FormValue)) {
                $this->StockAdjustmentDate->addErrorMessage(str_replace("%s", $this->StockAdjustmentDate->caption(), $this->StockAdjustmentDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->StockAdjustmentDate->FormValue)) {
            $this->StockAdjustmentDate->addErrorMessage($this->StockAdjustmentDate->getErrorMessage(false));
        }
        if ($this->Remarks->Required) {
            if (!$this->Remarks->IsDetailKey && EmptyValue($this->Remarks->FormValue)) {
                $this->Remarks->addErrorMessage(str_replace("%s", $this->Remarks->caption(), $this->Remarks->RequiredErrorMessage));
            }
        }
        if ($this->CostCentre->Required) {
            if (!$this->CostCentre->IsDetailKey && EmptyValue($this->CostCentre->FormValue)) {
                $this->CostCentre->addErrorMessage(str_replace("%s", $this->CostCentre->caption(), $this->CostCentre->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->CostCentre->FormValue)) {
            $this->CostCentre->addErrorMessage($this->CostCentre->getErrorMessage(false));
        }
        if ($this->ProductType->Required) {
            if (!$this->ProductType->IsDetailKey && EmptyValue($this->ProductType->FormValue)) {
                $this->ProductType->addErrorMessage(str_replace("%s", $this->ProductType->caption(), $this->ProductType->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->ProductType->FormValue)) {
            $this->ProductType->addErrorMessage($this->ProductType->getErrorMessage(false));
        }
        if ($this->TaxAmount->Required) {
            if (!$this->TaxAmount->IsDetailKey && EmptyValue($this->TaxAmount->FormValue)) {
                $this->TaxAmount->addErrorMessage(str_replace("%s", $this->TaxAmount->caption(), $this->TaxAmount->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->TaxAmount->FormValue)) {
            $this->TaxAmount->addErrorMessage($this->TaxAmount->getErrorMessage(false));
        }
        if ($this->TaxId->Required) {
            if (!$this->TaxId->IsDetailKey && EmptyValue($this->TaxId->FormValue)) {
                $this->TaxId->addErrorMessage(str_replace("%s", $this->TaxId->caption(), $this->TaxId->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->TaxId->FormValue)) {
            $this->TaxId->addErrorMessage($this->TaxId->getErrorMessage(false));
        }
        if ($this->ResaleTaxApplicable->Required) {
            if (!$this->ResaleTaxApplicable->IsDetailKey && EmptyValue($this->ResaleTaxApplicable->FormValue)) {
                $this->ResaleTaxApplicable->addErrorMessage(str_replace("%s", $this->ResaleTaxApplicable->caption(), $this->ResaleTaxApplicable->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->ResaleTaxApplicable->FormValue)) {
            $this->ResaleTaxApplicable->addErrorMessage($this->ResaleTaxApplicable->getErrorMessage(false));
        }
        if ($this->CstOtherTax->Required) {
            if (!$this->CstOtherTax->IsDetailKey && EmptyValue($this->CstOtherTax->FormValue)) {
                $this->CstOtherTax->addErrorMessage(str_replace("%s", $this->CstOtherTax->caption(), $this->CstOtherTax->RequiredErrorMessage));
            }
        }
        if ($this->TotalTax->Required) {
            if (!$this->TotalTax->IsDetailKey && EmptyValue($this->TotalTax->FormValue)) {
                $this->TotalTax->addErrorMessage(str_replace("%s", $this->TotalTax->caption(), $this->TotalTax->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->TotalTax->FormValue)) {
            $this->TotalTax->addErrorMessage($this->TotalTax->getErrorMessage(false));
        }
        if ($this->ItemCost->Required) {
            if (!$this->ItemCost->IsDetailKey && EmptyValue($this->ItemCost->FormValue)) {
                $this->ItemCost->addErrorMessage(str_replace("%s", $this->ItemCost->caption(), $this->ItemCost->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->ItemCost->FormValue)) {
            $this->ItemCost->addErrorMessage($this->ItemCost->getErrorMessage(false));
        }
        if ($this->ExpiryDate->Required) {
            if (!$this->ExpiryDate->IsDetailKey && EmptyValue($this->ExpiryDate->FormValue)) {
                $this->ExpiryDate->addErrorMessage(str_replace("%s", $this->ExpiryDate->caption(), $this->ExpiryDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->ExpiryDate->FormValue)) {
            $this->ExpiryDate->addErrorMessage($this->ExpiryDate->getErrorMessage(false));
        }
        if ($this->BatchDescription->Required) {
            if (!$this->BatchDescription->IsDetailKey && EmptyValue($this->BatchDescription->FormValue)) {
                $this->BatchDescription->addErrorMessage(str_replace("%s", $this->BatchDescription->caption(), $this->BatchDescription->RequiredErrorMessage));
            }
        }
        if ($this->FreeScheme->Required) {
            if (!$this->FreeScheme->IsDetailKey && EmptyValue($this->FreeScheme->FormValue)) {
                $this->FreeScheme->addErrorMessage(str_replace("%s", $this->FreeScheme->caption(), $this->FreeScheme->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->FreeScheme->FormValue)) {
            $this->FreeScheme->addErrorMessage($this->FreeScheme->getErrorMessage(false));
        }
        if ($this->CashDiscountEligibility->Required) {
            if (!$this->CashDiscountEligibility->IsDetailKey && EmptyValue($this->CashDiscountEligibility->FormValue)) {
                $this->CashDiscountEligibility->addErrorMessage(str_replace("%s", $this->CashDiscountEligibility->caption(), $this->CashDiscountEligibility->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->CashDiscountEligibility->FormValue)) {
            $this->CashDiscountEligibility->addErrorMessage($this->CashDiscountEligibility->getErrorMessage(false));
        }
        if ($this->DiscountPerAllowInBill->Required) {
            if (!$this->DiscountPerAllowInBill->IsDetailKey && EmptyValue($this->DiscountPerAllowInBill->FormValue)) {
                $this->DiscountPerAllowInBill->addErrorMessage(str_replace("%s", $this->DiscountPerAllowInBill->caption(), $this->DiscountPerAllowInBill->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->DiscountPerAllowInBill->FormValue)) {
            $this->DiscountPerAllowInBill->addErrorMessage($this->DiscountPerAllowInBill->getErrorMessage(false));
        }
        if ($this->Discount->Required) {
            if (!$this->Discount->IsDetailKey && EmptyValue($this->Discount->FormValue)) {
                $this->Discount->addErrorMessage(str_replace("%s", $this->Discount->caption(), $this->Discount->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->Discount->FormValue)) {
            $this->Discount->addErrorMessage($this->Discount->getErrorMessage(false));
        }
        if ($this->TotalAmount->Required) {
            if (!$this->TotalAmount->IsDetailKey && EmptyValue($this->TotalAmount->FormValue)) {
                $this->TotalAmount->addErrorMessage(str_replace("%s", $this->TotalAmount->caption(), $this->TotalAmount->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->TotalAmount->FormValue)) {
            $this->TotalAmount->addErrorMessage($this->TotalAmount->getErrorMessage(false));
        }
        if ($this->StandardMargin->Required) {
            if (!$this->StandardMargin->IsDetailKey && EmptyValue($this->StandardMargin->FormValue)) {
                $this->StandardMargin->addErrorMessage(str_replace("%s", $this->StandardMargin->caption(), $this->StandardMargin->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->StandardMargin->FormValue)) {
            $this->StandardMargin->addErrorMessage($this->StandardMargin->getErrorMessage(false));
        }
        if ($this->Margin->Required) {
            if (!$this->Margin->IsDetailKey && EmptyValue($this->Margin->FormValue)) {
                $this->Margin->addErrorMessage(str_replace("%s", $this->Margin->caption(), $this->Margin->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->Margin->FormValue)) {
            $this->Margin->addErrorMessage($this->Margin->getErrorMessage(false));
        }
        if ($this->MarginId->Required) {
            if (!$this->MarginId->IsDetailKey && EmptyValue($this->MarginId->FormValue)) {
                $this->MarginId->addErrorMessage(str_replace("%s", $this->MarginId->caption(), $this->MarginId->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->MarginId->FormValue)) {
            $this->MarginId->addErrorMessage($this->MarginId->getErrorMessage(false));
        }
        if ($this->ExpectedMargin->Required) {
            if (!$this->ExpectedMargin->IsDetailKey && EmptyValue($this->ExpectedMargin->FormValue)) {
                $this->ExpectedMargin->addErrorMessage(str_replace("%s", $this->ExpectedMargin->caption(), $this->ExpectedMargin->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->ExpectedMargin->FormValue)) {
            $this->ExpectedMargin->addErrorMessage($this->ExpectedMargin->getErrorMessage(false));
        }
        if ($this->SurchargeBeforeTax->Required) {
            if (!$this->SurchargeBeforeTax->IsDetailKey && EmptyValue($this->SurchargeBeforeTax->FormValue)) {
                $this->SurchargeBeforeTax->addErrorMessage(str_replace("%s", $this->SurchargeBeforeTax->caption(), $this->SurchargeBeforeTax->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->SurchargeBeforeTax->FormValue)) {
            $this->SurchargeBeforeTax->addErrorMessage($this->SurchargeBeforeTax->getErrorMessage(false));
        }
        if ($this->SurchargeAfterTax->Required) {
            if (!$this->SurchargeAfterTax->IsDetailKey && EmptyValue($this->SurchargeAfterTax->FormValue)) {
                $this->SurchargeAfterTax->addErrorMessage(str_replace("%s", $this->SurchargeAfterTax->caption(), $this->SurchargeAfterTax->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->SurchargeAfterTax->FormValue)) {
            $this->SurchargeAfterTax->addErrorMessage($this->SurchargeAfterTax->getErrorMessage(false));
        }
        if ($this->TempOrderNo->Required) {
            if (!$this->TempOrderNo->IsDetailKey && EmptyValue($this->TempOrderNo->FormValue)) {
                $this->TempOrderNo->addErrorMessage(str_replace("%s", $this->TempOrderNo->caption(), $this->TempOrderNo->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->TempOrderNo->FormValue)) {
            $this->TempOrderNo->addErrorMessage($this->TempOrderNo->getErrorMessage(false));
        }
        if ($this->TempOrderDate->Required) {
            if (!$this->TempOrderDate->IsDetailKey && EmptyValue($this->TempOrderDate->FormValue)) {
                $this->TempOrderDate->addErrorMessage(str_replace("%s", $this->TempOrderDate->caption(), $this->TempOrderDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->TempOrderDate->FormValue)) {
            $this->TempOrderDate->addErrorMessage($this->TempOrderDate->getErrorMessage(false));
        }
        if ($this->OrderUnit->Required) {
            if (!$this->OrderUnit->IsDetailKey && EmptyValue($this->OrderUnit->FormValue)) {
                $this->OrderUnit->addErrorMessage(str_replace("%s", $this->OrderUnit->caption(), $this->OrderUnit->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->OrderUnit->FormValue)) {
            $this->OrderUnit->addErrorMessage($this->OrderUnit->getErrorMessage(false));
        }
        if ($this->OrderQuantity->Required) {
            if (!$this->OrderQuantity->IsDetailKey && EmptyValue($this->OrderQuantity->FormValue)) {
                $this->OrderQuantity->addErrorMessage(str_replace("%s", $this->OrderQuantity->caption(), $this->OrderQuantity->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->OrderQuantity->FormValue)) {
            $this->OrderQuantity->addErrorMessage($this->OrderQuantity->getErrorMessage(false));
        }
        if ($this->MarkForOrder->Required) {
            if (!$this->MarkForOrder->IsDetailKey && EmptyValue($this->MarkForOrder->FormValue)) {
                $this->MarkForOrder->addErrorMessage(str_replace("%s", $this->MarkForOrder->caption(), $this->MarkForOrder->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->MarkForOrder->FormValue)) {
            $this->MarkForOrder->addErrorMessage($this->MarkForOrder->getErrorMessage(false));
        }
        if ($this->OrderAllId->Required) {
            if (!$this->OrderAllId->IsDetailKey && EmptyValue($this->OrderAllId->FormValue)) {
                $this->OrderAllId->addErrorMessage(str_replace("%s", $this->OrderAllId->caption(), $this->OrderAllId->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->OrderAllId->FormValue)) {
            $this->OrderAllId->addErrorMessage($this->OrderAllId->getErrorMessage(false));
        }
        if ($this->CalculateOrderQty->Required) {
            if (!$this->CalculateOrderQty->IsDetailKey && EmptyValue($this->CalculateOrderQty->FormValue)) {
                $this->CalculateOrderQty->addErrorMessage(str_replace("%s", $this->CalculateOrderQty->caption(), $this->CalculateOrderQty->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->CalculateOrderQty->FormValue)) {
            $this->CalculateOrderQty->addErrorMessage($this->CalculateOrderQty->getErrorMessage(false));
        }
        if ($this->SubLocation->Required) {
            if (!$this->SubLocation->IsDetailKey && EmptyValue($this->SubLocation->FormValue)) {
                $this->SubLocation->addErrorMessage(str_replace("%s", $this->SubLocation->caption(), $this->SubLocation->RequiredErrorMessage));
            }
        }
        if ($this->CategoryCode->Required) {
            if (!$this->CategoryCode->IsDetailKey && EmptyValue($this->CategoryCode->FormValue)) {
                $this->CategoryCode->addErrorMessage(str_replace("%s", $this->CategoryCode->caption(), $this->CategoryCode->RequiredErrorMessage));
            }
        }
        if ($this->SubCategory->Required) {
            if (!$this->SubCategory->IsDetailKey && EmptyValue($this->SubCategory->FormValue)) {
                $this->SubCategory->addErrorMessage(str_replace("%s", $this->SubCategory->caption(), $this->SubCategory->RequiredErrorMessage));
            }
        }
        if ($this->FlexCategoryCode->Required) {
            if (!$this->FlexCategoryCode->IsDetailKey && EmptyValue($this->FlexCategoryCode->FormValue)) {
                $this->FlexCategoryCode->addErrorMessage(str_replace("%s", $this->FlexCategoryCode->caption(), $this->FlexCategoryCode->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->FlexCategoryCode->FormValue)) {
            $this->FlexCategoryCode->addErrorMessage($this->FlexCategoryCode->getErrorMessage(false));
        }
        if ($this->ABCSaleQty->Required) {
            if (!$this->ABCSaleQty->IsDetailKey && EmptyValue($this->ABCSaleQty->FormValue)) {
                $this->ABCSaleQty->addErrorMessage(str_replace("%s", $this->ABCSaleQty->caption(), $this->ABCSaleQty->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->ABCSaleQty->FormValue)) {
            $this->ABCSaleQty->addErrorMessage($this->ABCSaleQty->getErrorMessage(false));
        }
        if ($this->ABCSaleValue->Required) {
            if (!$this->ABCSaleValue->IsDetailKey && EmptyValue($this->ABCSaleValue->FormValue)) {
                $this->ABCSaleValue->addErrorMessage(str_replace("%s", $this->ABCSaleValue->caption(), $this->ABCSaleValue->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->ABCSaleValue->FormValue)) {
            $this->ABCSaleValue->addErrorMessage($this->ABCSaleValue->getErrorMessage(false));
        }
        if ($this->ConvertionFactor->Required) {
            if (!$this->ConvertionFactor->IsDetailKey && EmptyValue($this->ConvertionFactor->FormValue)) {
                $this->ConvertionFactor->addErrorMessage(str_replace("%s", $this->ConvertionFactor->caption(), $this->ConvertionFactor->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->ConvertionFactor->FormValue)) {
            $this->ConvertionFactor->addErrorMessage($this->ConvertionFactor->getErrorMessage(false));
        }
        if ($this->ConvertionUnitDesc->Required) {
            if (!$this->ConvertionUnitDesc->IsDetailKey && EmptyValue($this->ConvertionUnitDesc->FormValue)) {
                $this->ConvertionUnitDesc->addErrorMessage(str_replace("%s", $this->ConvertionUnitDesc->caption(), $this->ConvertionUnitDesc->RequiredErrorMessage));
            }
        }
        if ($this->TransactionId->Required) {
            if (!$this->TransactionId->IsDetailKey && EmptyValue($this->TransactionId->FormValue)) {
                $this->TransactionId->addErrorMessage(str_replace("%s", $this->TransactionId->caption(), $this->TransactionId->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->TransactionId->FormValue)) {
            $this->TransactionId->addErrorMessage($this->TransactionId->getErrorMessage(false));
        }
        if ($this->SoldProductId->Required) {
            if (!$this->SoldProductId->IsDetailKey && EmptyValue($this->SoldProductId->FormValue)) {
                $this->SoldProductId->addErrorMessage(str_replace("%s", $this->SoldProductId->caption(), $this->SoldProductId->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->SoldProductId->FormValue)) {
            $this->SoldProductId->addErrorMessage($this->SoldProductId->getErrorMessage(false));
        }
        if ($this->WantedBookId->Required) {
            if (!$this->WantedBookId->IsDetailKey && EmptyValue($this->WantedBookId->FormValue)) {
                $this->WantedBookId->addErrorMessage(str_replace("%s", $this->WantedBookId->caption(), $this->WantedBookId->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->WantedBookId->FormValue)) {
            $this->WantedBookId->addErrorMessage($this->WantedBookId->getErrorMessage(false));
        }
        if ($this->AllId->Required) {
            if (!$this->AllId->IsDetailKey && EmptyValue($this->AllId->FormValue)) {
                $this->AllId->addErrorMessage(str_replace("%s", $this->AllId->caption(), $this->AllId->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->AllId->FormValue)) {
            $this->AllId->addErrorMessage($this->AllId->getErrorMessage(false));
        }
        if ($this->BatchAndExpiryCompulsory->Required) {
            if (!$this->BatchAndExpiryCompulsory->IsDetailKey && EmptyValue($this->BatchAndExpiryCompulsory->FormValue)) {
                $this->BatchAndExpiryCompulsory->addErrorMessage(str_replace("%s", $this->BatchAndExpiryCompulsory->caption(), $this->BatchAndExpiryCompulsory->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->BatchAndExpiryCompulsory->FormValue)) {
            $this->BatchAndExpiryCompulsory->addErrorMessage($this->BatchAndExpiryCompulsory->getErrorMessage(false));
        }
        if ($this->BatchStockForWantedBook->Required) {
            if (!$this->BatchStockForWantedBook->IsDetailKey && EmptyValue($this->BatchStockForWantedBook->FormValue)) {
                $this->BatchStockForWantedBook->addErrorMessage(str_replace("%s", $this->BatchStockForWantedBook->caption(), $this->BatchStockForWantedBook->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->BatchStockForWantedBook->FormValue)) {
            $this->BatchStockForWantedBook->addErrorMessage($this->BatchStockForWantedBook->getErrorMessage(false));
        }
        if ($this->UnitBasedBilling->Required) {
            if (!$this->UnitBasedBilling->IsDetailKey && EmptyValue($this->UnitBasedBilling->FormValue)) {
                $this->UnitBasedBilling->addErrorMessage(str_replace("%s", $this->UnitBasedBilling->caption(), $this->UnitBasedBilling->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->UnitBasedBilling->FormValue)) {
            $this->UnitBasedBilling->addErrorMessage($this->UnitBasedBilling->getErrorMessage(false));
        }
        if ($this->DoNotCheckStock->Required) {
            if (!$this->DoNotCheckStock->IsDetailKey && EmptyValue($this->DoNotCheckStock->FormValue)) {
                $this->DoNotCheckStock->addErrorMessage(str_replace("%s", $this->DoNotCheckStock->caption(), $this->DoNotCheckStock->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->DoNotCheckStock->FormValue)) {
            $this->DoNotCheckStock->addErrorMessage($this->DoNotCheckStock->getErrorMessage(false));
        }
        if ($this->AcceptRate->Required) {
            if (!$this->AcceptRate->IsDetailKey && EmptyValue($this->AcceptRate->FormValue)) {
                $this->AcceptRate->addErrorMessage(str_replace("%s", $this->AcceptRate->caption(), $this->AcceptRate->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->AcceptRate->FormValue)) {
            $this->AcceptRate->addErrorMessage($this->AcceptRate->getErrorMessage(false));
        }
        if ($this->PriceLevel->Required) {
            if (!$this->PriceLevel->IsDetailKey && EmptyValue($this->PriceLevel->FormValue)) {
                $this->PriceLevel->addErrorMessage(str_replace("%s", $this->PriceLevel->caption(), $this->PriceLevel->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->PriceLevel->FormValue)) {
            $this->PriceLevel->addErrorMessage($this->PriceLevel->getErrorMessage(false));
        }
        if ($this->LastQuotePrice->Required) {
            if (!$this->LastQuotePrice->IsDetailKey && EmptyValue($this->LastQuotePrice->FormValue)) {
                $this->LastQuotePrice->addErrorMessage(str_replace("%s", $this->LastQuotePrice->caption(), $this->LastQuotePrice->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->LastQuotePrice->FormValue)) {
            $this->LastQuotePrice->addErrorMessage($this->LastQuotePrice->getErrorMessage(false));
        }
        if ($this->PriceChange->Required) {
            if (!$this->PriceChange->IsDetailKey && EmptyValue($this->PriceChange->FormValue)) {
                $this->PriceChange->addErrorMessage(str_replace("%s", $this->PriceChange->caption(), $this->PriceChange->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->PriceChange->FormValue)) {
            $this->PriceChange->addErrorMessage($this->PriceChange->getErrorMessage(false));
        }
        if ($this->CommodityCode->Required) {
            if (!$this->CommodityCode->IsDetailKey && EmptyValue($this->CommodityCode->FormValue)) {
                $this->CommodityCode->addErrorMessage(str_replace("%s", $this->CommodityCode->caption(), $this->CommodityCode->RequiredErrorMessage));
            }
        }
        if ($this->InstitutePrice->Required) {
            if (!$this->InstitutePrice->IsDetailKey && EmptyValue($this->InstitutePrice->FormValue)) {
                $this->InstitutePrice->addErrorMessage(str_replace("%s", $this->InstitutePrice->caption(), $this->InstitutePrice->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->InstitutePrice->FormValue)) {
            $this->InstitutePrice->addErrorMessage($this->InstitutePrice->getErrorMessage(false));
        }
        if ($this->CtrlOrDCtrlProduct->Required) {
            if (!$this->CtrlOrDCtrlProduct->IsDetailKey && EmptyValue($this->CtrlOrDCtrlProduct->FormValue)) {
                $this->CtrlOrDCtrlProduct->addErrorMessage(str_replace("%s", $this->CtrlOrDCtrlProduct->caption(), $this->CtrlOrDCtrlProduct->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->CtrlOrDCtrlProduct->FormValue)) {
            $this->CtrlOrDCtrlProduct->addErrorMessage($this->CtrlOrDCtrlProduct->getErrorMessage(false));
        }
        if ($this->ImportedDate->Required) {
            if (!$this->ImportedDate->IsDetailKey && EmptyValue($this->ImportedDate->FormValue)) {
                $this->ImportedDate->addErrorMessage(str_replace("%s", $this->ImportedDate->caption(), $this->ImportedDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->ImportedDate->FormValue)) {
            $this->ImportedDate->addErrorMessage($this->ImportedDate->getErrorMessage(false));
        }
        if ($this->IsImported->Required) {
            if (!$this->IsImported->IsDetailKey && EmptyValue($this->IsImported->FormValue)) {
                $this->IsImported->addErrorMessage(str_replace("%s", $this->IsImported->caption(), $this->IsImported->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->IsImported->FormValue)) {
            $this->IsImported->addErrorMessage($this->IsImported->getErrorMessage(false));
        }
        if ($this->FileName->Required) {
            if (!$this->FileName->IsDetailKey && EmptyValue($this->FileName->FormValue)) {
                $this->FileName->addErrorMessage(str_replace("%s", $this->FileName->caption(), $this->FileName->RequiredErrorMessage));
            }
        }
        if ($this->LPName->Required) {
            if (!$this->LPName->IsDetailKey && EmptyValue($this->LPName->FormValue)) {
                $this->LPName->addErrorMessage(str_replace("%s", $this->LPName->caption(), $this->LPName->RequiredErrorMessage));
            }
        }
        if ($this->GodownNumber->Required) {
            if (!$this->GodownNumber->IsDetailKey && EmptyValue($this->GodownNumber->FormValue)) {
                $this->GodownNumber->addErrorMessage(str_replace("%s", $this->GodownNumber->caption(), $this->GodownNumber->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->GodownNumber->FormValue)) {
            $this->GodownNumber->addErrorMessage($this->GodownNumber->getErrorMessage(false));
        }
        if ($this->CreationDate->Required) {
            if (!$this->CreationDate->IsDetailKey && EmptyValue($this->CreationDate->FormValue)) {
                $this->CreationDate->addErrorMessage(str_replace("%s", $this->CreationDate->caption(), $this->CreationDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->CreationDate->FormValue)) {
            $this->CreationDate->addErrorMessage($this->CreationDate->getErrorMessage(false));
        }
        if ($this->CreatedbyUser->Required) {
            if (!$this->CreatedbyUser->IsDetailKey && EmptyValue($this->CreatedbyUser->FormValue)) {
                $this->CreatedbyUser->addErrorMessage(str_replace("%s", $this->CreatedbyUser->caption(), $this->CreatedbyUser->RequiredErrorMessage));
            }
        }
        if ($this->ModifiedDate->Required) {
            if (!$this->ModifiedDate->IsDetailKey && EmptyValue($this->ModifiedDate->FormValue)) {
                $this->ModifiedDate->addErrorMessage(str_replace("%s", $this->ModifiedDate->caption(), $this->ModifiedDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->ModifiedDate->FormValue)) {
            $this->ModifiedDate->addErrorMessage($this->ModifiedDate->getErrorMessage(false));
        }
        if ($this->ModifiedbyUser->Required) {
            if (!$this->ModifiedbyUser->IsDetailKey && EmptyValue($this->ModifiedbyUser->FormValue)) {
                $this->ModifiedbyUser->addErrorMessage(str_replace("%s", $this->ModifiedbyUser->caption(), $this->ModifiedbyUser->RequiredErrorMessage));
            }
        }
        if ($this->isActive->Required) {
            if (!$this->isActive->IsDetailKey && EmptyValue($this->isActive->FormValue)) {
                $this->isActive->addErrorMessage(str_replace("%s", $this->isActive->caption(), $this->isActive->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->isActive->FormValue)) {
            $this->isActive->addErrorMessage($this->isActive->getErrorMessage(false));
        }
        if ($this->AllowExpiryClaim->Required) {
            if (!$this->AllowExpiryClaim->IsDetailKey && EmptyValue($this->AllowExpiryClaim->FormValue)) {
                $this->AllowExpiryClaim->addErrorMessage(str_replace("%s", $this->AllowExpiryClaim->caption(), $this->AllowExpiryClaim->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->AllowExpiryClaim->FormValue)) {
            $this->AllowExpiryClaim->addErrorMessage($this->AllowExpiryClaim->getErrorMessage(false));
        }
        if ($this->BrandCode->Required) {
            if (!$this->BrandCode->IsDetailKey && EmptyValue($this->BrandCode->FormValue)) {
                $this->BrandCode->addErrorMessage(str_replace("%s", $this->BrandCode->caption(), $this->BrandCode->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->BrandCode->FormValue)) {
            $this->BrandCode->addErrorMessage($this->BrandCode->getErrorMessage(false));
        }
        if ($this->FreeSchemeBasedon->Required) {
            if (!$this->FreeSchemeBasedon->IsDetailKey && EmptyValue($this->FreeSchemeBasedon->FormValue)) {
                $this->FreeSchemeBasedon->addErrorMessage(str_replace("%s", $this->FreeSchemeBasedon->caption(), $this->FreeSchemeBasedon->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->FreeSchemeBasedon->FormValue)) {
            $this->FreeSchemeBasedon->addErrorMessage($this->FreeSchemeBasedon->getErrorMessage(false));
        }
        if ($this->DoNotCheckCostInBill->Required) {
            if (!$this->DoNotCheckCostInBill->IsDetailKey && EmptyValue($this->DoNotCheckCostInBill->FormValue)) {
                $this->DoNotCheckCostInBill->addErrorMessage(str_replace("%s", $this->DoNotCheckCostInBill->caption(), $this->DoNotCheckCostInBill->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->DoNotCheckCostInBill->FormValue)) {
            $this->DoNotCheckCostInBill->addErrorMessage($this->DoNotCheckCostInBill->getErrorMessage(false));
        }
        if ($this->ProductGroupCode->Required) {
            if (!$this->ProductGroupCode->IsDetailKey && EmptyValue($this->ProductGroupCode->FormValue)) {
                $this->ProductGroupCode->addErrorMessage(str_replace("%s", $this->ProductGroupCode->caption(), $this->ProductGroupCode->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->ProductGroupCode->FormValue)) {
            $this->ProductGroupCode->addErrorMessage($this->ProductGroupCode->getErrorMessage(false));
        }
        if ($this->ProductStrengthCode->Required) {
            if (!$this->ProductStrengthCode->IsDetailKey && EmptyValue($this->ProductStrengthCode->FormValue)) {
                $this->ProductStrengthCode->addErrorMessage(str_replace("%s", $this->ProductStrengthCode->caption(), $this->ProductStrengthCode->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->ProductStrengthCode->FormValue)) {
            $this->ProductStrengthCode->addErrorMessage($this->ProductStrengthCode->getErrorMessage(false));
        }
        if ($this->PackingCode->Required) {
            if (!$this->PackingCode->IsDetailKey && EmptyValue($this->PackingCode->FormValue)) {
                $this->PackingCode->addErrorMessage(str_replace("%s", $this->PackingCode->caption(), $this->PackingCode->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->PackingCode->FormValue)) {
            $this->PackingCode->addErrorMessage($this->PackingCode->getErrorMessage(false));
        }
        if ($this->ComputedMinStock->Required) {
            if (!$this->ComputedMinStock->IsDetailKey && EmptyValue($this->ComputedMinStock->FormValue)) {
                $this->ComputedMinStock->addErrorMessage(str_replace("%s", $this->ComputedMinStock->caption(), $this->ComputedMinStock->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->ComputedMinStock->FormValue)) {
            $this->ComputedMinStock->addErrorMessage($this->ComputedMinStock->getErrorMessage(false));
        }
        if ($this->ComputedMaxStock->Required) {
            if (!$this->ComputedMaxStock->IsDetailKey && EmptyValue($this->ComputedMaxStock->FormValue)) {
                $this->ComputedMaxStock->addErrorMessage(str_replace("%s", $this->ComputedMaxStock->caption(), $this->ComputedMaxStock->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->ComputedMaxStock->FormValue)) {
            $this->ComputedMaxStock->addErrorMessage($this->ComputedMaxStock->getErrorMessage(false));
        }
        if ($this->ProductRemark->Required) {
            if (!$this->ProductRemark->IsDetailKey && EmptyValue($this->ProductRemark->FormValue)) {
                $this->ProductRemark->addErrorMessage(str_replace("%s", $this->ProductRemark->caption(), $this->ProductRemark->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->ProductRemark->FormValue)) {
            $this->ProductRemark->addErrorMessage($this->ProductRemark->getErrorMessage(false));
        }
        if ($this->ProductDrugCode->Required) {
            if (!$this->ProductDrugCode->IsDetailKey && EmptyValue($this->ProductDrugCode->FormValue)) {
                $this->ProductDrugCode->addErrorMessage(str_replace("%s", $this->ProductDrugCode->caption(), $this->ProductDrugCode->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->ProductDrugCode->FormValue)) {
            $this->ProductDrugCode->addErrorMessage($this->ProductDrugCode->getErrorMessage(false));
        }
        if ($this->IsMatrixProduct->Required) {
            if (!$this->IsMatrixProduct->IsDetailKey && EmptyValue($this->IsMatrixProduct->FormValue)) {
                $this->IsMatrixProduct->addErrorMessage(str_replace("%s", $this->IsMatrixProduct->caption(), $this->IsMatrixProduct->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->IsMatrixProduct->FormValue)) {
            $this->IsMatrixProduct->addErrorMessage($this->IsMatrixProduct->getErrorMessage(false));
        }
        if ($this->AttributeCount1->Required) {
            if (!$this->AttributeCount1->IsDetailKey && EmptyValue($this->AttributeCount1->FormValue)) {
                $this->AttributeCount1->addErrorMessage(str_replace("%s", $this->AttributeCount1->caption(), $this->AttributeCount1->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->AttributeCount1->FormValue)) {
            $this->AttributeCount1->addErrorMessage($this->AttributeCount1->getErrorMessage(false));
        }
        if ($this->AttributeCount2->Required) {
            if (!$this->AttributeCount2->IsDetailKey && EmptyValue($this->AttributeCount2->FormValue)) {
                $this->AttributeCount2->addErrorMessage(str_replace("%s", $this->AttributeCount2->caption(), $this->AttributeCount2->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->AttributeCount2->FormValue)) {
            $this->AttributeCount2->addErrorMessage($this->AttributeCount2->getErrorMessage(false));
        }
        if ($this->AttributeCount3->Required) {
            if (!$this->AttributeCount3->IsDetailKey && EmptyValue($this->AttributeCount3->FormValue)) {
                $this->AttributeCount3->addErrorMessage(str_replace("%s", $this->AttributeCount3->caption(), $this->AttributeCount3->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->AttributeCount3->FormValue)) {
            $this->AttributeCount3->addErrorMessage($this->AttributeCount3->getErrorMessage(false));
        }
        if ($this->AttributeCount4->Required) {
            if (!$this->AttributeCount4->IsDetailKey && EmptyValue($this->AttributeCount4->FormValue)) {
                $this->AttributeCount4->addErrorMessage(str_replace("%s", $this->AttributeCount4->caption(), $this->AttributeCount4->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->AttributeCount4->FormValue)) {
            $this->AttributeCount4->addErrorMessage($this->AttributeCount4->getErrorMessage(false));
        }
        if ($this->AttributeCount5->Required) {
            if (!$this->AttributeCount5->IsDetailKey && EmptyValue($this->AttributeCount5->FormValue)) {
                $this->AttributeCount5->addErrorMessage(str_replace("%s", $this->AttributeCount5->caption(), $this->AttributeCount5->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->AttributeCount5->FormValue)) {
            $this->AttributeCount5->addErrorMessage($this->AttributeCount5->getErrorMessage(false));
        }
        if ($this->DefaultDiscountPercentage->Required) {
            if (!$this->DefaultDiscountPercentage->IsDetailKey && EmptyValue($this->DefaultDiscountPercentage->FormValue)) {
                $this->DefaultDiscountPercentage->addErrorMessage(str_replace("%s", $this->DefaultDiscountPercentage->caption(), $this->DefaultDiscountPercentage->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->DefaultDiscountPercentage->FormValue)) {
            $this->DefaultDiscountPercentage->addErrorMessage($this->DefaultDiscountPercentage->getErrorMessage(false));
        }
        if ($this->DonotPrintBarcode->Required) {
            if (!$this->DonotPrintBarcode->IsDetailKey && EmptyValue($this->DonotPrintBarcode->FormValue)) {
                $this->DonotPrintBarcode->addErrorMessage(str_replace("%s", $this->DonotPrintBarcode->caption(), $this->DonotPrintBarcode->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->DonotPrintBarcode->FormValue)) {
            $this->DonotPrintBarcode->addErrorMessage($this->DonotPrintBarcode->getErrorMessage(false));
        }
        if ($this->ProductLevelDiscount->Required) {
            if (!$this->ProductLevelDiscount->IsDetailKey && EmptyValue($this->ProductLevelDiscount->FormValue)) {
                $this->ProductLevelDiscount->addErrorMessage(str_replace("%s", $this->ProductLevelDiscount->caption(), $this->ProductLevelDiscount->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->ProductLevelDiscount->FormValue)) {
            $this->ProductLevelDiscount->addErrorMessage($this->ProductLevelDiscount->getErrorMessage(false));
        }
        if ($this->Markup->Required) {
            if (!$this->Markup->IsDetailKey && EmptyValue($this->Markup->FormValue)) {
                $this->Markup->addErrorMessage(str_replace("%s", $this->Markup->caption(), $this->Markup->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->Markup->FormValue)) {
            $this->Markup->addErrorMessage($this->Markup->getErrorMessage(false));
        }
        if ($this->MarkDown->Required) {
            if (!$this->MarkDown->IsDetailKey && EmptyValue($this->MarkDown->FormValue)) {
                $this->MarkDown->addErrorMessage(str_replace("%s", $this->MarkDown->caption(), $this->MarkDown->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->MarkDown->FormValue)) {
            $this->MarkDown->addErrorMessage($this->MarkDown->getErrorMessage(false));
        }
        if ($this->ReworkSalePrice->Required) {
            if (!$this->ReworkSalePrice->IsDetailKey && EmptyValue($this->ReworkSalePrice->FormValue)) {
                $this->ReworkSalePrice->addErrorMessage(str_replace("%s", $this->ReworkSalePrice->caption(), $this->ReworkSalePrice->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->ReworkSalePrice->FormValue)) {
            $this->ReworkSalePrice->addErrorMessage($this->ReworkSalePrice->getErrorMessage(false));
        }
        if ($this->MultipleInput->Required) {
            if (!$this->MultipleInput->IsDetailKey && EmptyValue($this->MultipleInput->FormValue)) {
                $this->MultipleInput->addErrorMessage(str_replace("%s", $this->MultipleInput->caption(), $this->MultipleInput->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->MultipleInput->FormValue)) {
            $this->MultipleInput->addErrorMessage($this->MultipleInput->getErrorMessage(false));
        }
        if ($this->LpPackageInformation->Required) {
            if (!$this->LpPackageInformation->IsDetailKey && EmptyValue($this->LpPackageInformation->FormValue)) {
                $this->LpPackageInformation->addErrorMessage(str_replace("%s", $this->LpPackageInformation->caption(), $this->LpPackageInformation->RequiredErrorMessage));
            }
        }
        if ($this->AllowNegativeStock->Required) {
            if (!$this->AllowNegativeStock->IsDetailKey && EmptyValue($this->AllowNegativeStock->FormValue)) {
                $this->AllowNegativeStock->addErrorMessage(str_replace("%s", $this->AllowNegativeStock->caption(), $this->AllowNegativeStock->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->AllowNegativeStock->FormValue)) {
            $this->AllowNegativeStock->addErrorMessage($this->AllowNegativeStock->getErrorMessage(false));
        }
        if ($this->OrderDate->Required) {
            if (!$this->OrderDate->IsDetailKey && EmptyValue($this->OrderDate->FormValue)) {
                $this->OrderDate->addErrorMessage(str_replace("%s", $this->OrderDate->caption(), $this->OrderDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->OrderDate->FormValue)) {
            $this->OrderDate->addErrorMessage($this->OrderDate->getErrorMessage(false));
        }
        if ($this->OrderTime->Required) {
            if (!$this->OrderTime->IsDetailKey && EmptyValue($this->OrderTime->FormValue)) {
                $this->OrderTime->addErrorMessage(str_replace("%s", $this->OrderTime->caption(), $this->OrderTime->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->OrderTime->FormValue)) {
            $this->OrderTime->addErrorMessage($this->OrderTime->getErrorMessage(false));
        }
        if ($this->RateGroupCode->Required) {
            if (!$this->RateGroupCode->IsDetailKey && EmptyValue($this->RateGroupCode->FormValue)) {
                $this->RateGroupCode->addErrorMessage(str_replace("%s", $this->RateGroupCode->caption(), $this->RateGroupCode->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->RateGroupCode->FormValue)) {
            $this->RateGroupCode->addErrorMessage($this->RateGroupCode->getErrorMessage(false));
        }
        if ($this->ConversionCaseLot->Required) {
            if (!$this->ConversionCaseLot->IsDetailKey && EmptyValue($this->ConversionCaseLot->FormValue)) {
                $this->ConversionCaseLot->addErrorMessage(str_replace("%s", $this->ConversionCaseLot->caption(), $this->ConversionCaseLot->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->ConversionCaseLot->FormValue)) {
            $this->ConversionCaseLot->addErrorMessage($this->ConversionCaseLot->getErrorMessage(false));
        }
        if ($this->ShippingLot->Required) {
            if (!$this->ShippingLot->IsDetailKey && EmptyValue($this->ShippingLot->FormValue)) {
                $this->ShippingLot->addErrorMessage(str_replace("%s", $this->ShippingLot->caption(), $this->ShippingLot->RequiredErrorMessage));
            }
        }
        if ($this->AllowExpiryReplacement->Required) {
            if (!$this->AllowExpiryReplacement->IsDetailKey && EmptyValue($this->AllowExpiryReplacement->FormValue)) {
                $this->AllowExpiryReplacement->addErrorMessage(str_replace("%s", $this->AllowExpiryReplacement->caption(), $this->AllowExpiryReplacement->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->AllowExpiryReplacement->FormValue)) {
            $this->AllowExpiryReplacement->addErrorMessage($this->AllowExpiryReplacement->getErrorMessage(false));
        }
        if ($this->NoOfMonthExpiryAllowed->Required) {
            if (!$this->NoOfMonthExpiryAllowed->IsDetailKey && EmptyValue($this->NoOfMonthExpiryAllowed->FormValue)) {
                $this->NoOfMonthExpiryAllowed->addErrorMessage(str_replace("%s", $this->NoOfMonthExpiryAllowed->caption(), $this->NoOfMonthExpiryAllowed->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->NoOfMonthExpiryAllowed->FormValue)) {
            $this->NoOfMonthExpiryAllowed->addErrorMessage($this->NoOfMonthExpiryAllowed->getErrorMessage(false));
        }
        if ($this->ProductDiscountEligibility->Required) {
            if (!$this->ProductDiscountEligibility->IsDetailKey && EmptyValue($this->ProductDiscountEligibility->FormValue)) {
                $this->ProductDiscountEligibility->addErrorMessage(str_replace("%s", $this->ProductDiscountEligibility->caption(), $this->ProductDiscountEligibility->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->ProductDiscountEligibility->FormValue)) {
            $this->ProductDiscountEligibility->addErrorMessage($this->ProductDiscountEligibility->getErrorMessage(false));
        }
        if ($this->ScheduleTypeCode->Required) {
            if (!$this->ScheduleTypeCode->IsDetailKey && EmptyValue($this->ScheduleTypeCode->FormValue)) {
                $this->ScheduleTypeCode->addErrorMessage(str_replace("%s", $this->ScheduleTypeCode->caption(), $this->ScheduleTypeCode->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->ScheduleTypeCode->FormValue)) {
            $this->ScheduleTypeCode->addErrorMessage($this->ScheduleTypeCode->getErrorMessage(false));
        }
        if ($this->AIOCDProductCode->Required) {
            if (!$this->AIOCDProductCode->IsDetailKey && EmptyValue($this->AIOCDProductCode->FormValue)) {
                $this->AIOCDProductCode->addErrorMessage(str_replace("%s", $this->AIOCDProductCode->caption(), $this->AIOCDProductCode->RequiredErrorMessage));
            }
        }
        if ($this->FreeQuantity->Required) {
            if (!$this->FreeQuantity->IsDetailKey && EmptyValue($this->FreeQuantity->FormValue)) {
                $this->FreeQuantity->addErrorMessage(str_replace("%s", $this->FreeQuantity->caption(), $this->FreeQuantity->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->FreeQuantity->FormValue)) {
            $this->FreeQuantity->addErrorMessage($this->FreeQuantity->getErrorMessage(false));
        }
        if ($this->DiscountType->Required) {
            if (!$this->DiscountType->IsDetailKey && EmptyValue($this->DiscountType->FormValue)) {
                $this->DiscountType->addErrorMessage(str_replace("%s", $this->DiscountType->caption(), $this->DiscountType->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->DiscountType->FormValue)) {
            $this->DiscountType->addErrorMessage($this->DiscountType->getErrorMessage(false));
        }
        if ($this->DiscountValue->Required) {
            if (!$this->DiscountValue->IsDetailKey && EmptyValue($this->DiscountValue->FormValue)) {
                $this->DiscountValue->addErrorMessage(str_replace("%s", $this->DiscountValue->caption(), $this->DiscountValue->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->DiscountValue->FormValue)) {
            $this->DiscountValue->addErrorMessage($this->DiscountValue->getErrorMessage(false));
        }
        if ($this->HasProductOrderAttribute->Required) {
            if (!$this->HasProductOrderAttribute->IsDetailKey && EmptyValue($this->HasProductOrderAttribute->FormValue)) {
                $this->HasProductOrderAttribute->addErrorMessage(str_replace("%s", $this->HasProductOrderAttribute->caption(), $this->HasProductOrderAttribute->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->HasProductOrderAttribute->FormValue)) {
            $this->HasProductOrderAttribute->addErrorMessage($this->HasProductOrderAttribute->getErrorMessage(false));
        }
        if ($this->FirstPODate->Required) {
            if (!$this->FirstPODate->IsDetailKey && EmptyValue($this->FirstPODate->FormValue)) {
                $this->FirstPODate->addErrorMessage(str_replace("%s", $this->FirstPODate->caption(), $this->FirstPODate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->FirstPODate->FormValue)) {
            $this->FirstPODate->addErrorMessage($this->FirstPODate->getErrorMessage(false));
        }
        if ($this->SaleprcieAndMrpCalcPercent->Required) {
            if (!$this->SaleprcieAndMrpCalcPercent->IsDetailKey && EmptyValue($this->SaleprcieAndMrpCalcPercent->FormValue)) {
                $this->SaleprcieAndMrpCalcPercent->addErrorMessage(str_replace("%s", $this->SaleprcieAndMrpCalcPercent->caption(), $this->SaleprcieAndMrpCalcPercent->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->SaleprcieAndMrpCalcPercent->FormValue)) {
            $this->SaleprcieAndMrpCalcPercent->addErrorMessage($this->SaleprcieAndMrpCalcPercent->getErrorMessage(false));
        }
        if ($this->IsGiftVoucherProducts->Required) {
            if (!$this->IsGiftVoucherProducts->IsDetailKey && EmptyValue($this->IsGiftVoucherProducts->FormValue)) {
                $this->IsGiftVoucherProducts->addErrorMessage(str_replace("%s", $this->IsGiftVoucherProducts->caption(), $this->IsGiftVoucherProducts->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->IsGiftVoucherProducts->FormValue)) {
            $this->IsGiftVoucherProducts->addErrorMessage($this->IsGiftVoucherProducts->getErrorMessage(false));
        }
        if ($this->AcceptRange4SerialNumber->Required) {
            if (!$this->AcceptRange4SerialNumber->IsDetailKey && EmptyValue($this->AcceptRange4SerialNumber->FormValue)) {
                $this->AcceptRange4SerialNumber->addErrorMessage(str_replace("%s", $this->AcceptRange4SerialNumber->caption(), $this->AcceptRange4SerialNumber->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->AcceptRange4SerialNumber->FormValue)) {
            $this->AcceptRange4SerialNumber->addErrorMessage($this->AcceptRange4SerialNumber->getErrorMessage(false));
        }
        if ($this->GiftVoucherDenomination->Required) {
            if (!$this->GiftVoucherDenomination->IsDetailKey && EmptyValue($this->GiftVoucherDenomination->FormValue)) {
                $this->GiftVoucherDenomination->addErrorMessage(str_replace("%s", $this->GiftVoucherDenomination->caption(), $this->GiftVoucherDenomination->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->GiftVoucherDenomination->FormValue)) {
            $this->GiftVoucherDenomination->addErrorMessage($this->GiftVoucherDenomination->getErrorMessage(false));
        }
        if ($this->Subclasscode->Required) {
            if (!$this->Subclasscode->IsDetailKey && EmptyValue($this->Subclasscode->FormValue)) {
                $this->Subclasscode->addErrorMessage(str_replace("%s", $this->Subclasscode->caption(), $this->Subclasscode->RequiredErrorMessage));
            }
        }
        if ($this->BarCodeFromWeighingMachine->Required) {
            if (!$this->BarCodeFromWeighingMachine->IsDetailKey && EmptyValue($this->BarCodeFromWeighingMachine->FormValue)) {
                $this->BarCodeFromWeighingMachine->addErrorMessage(str_replace("%s", $this->BarCodeFromWeighingMachine->caption(), $this->BarCodeFromWeighingMachine->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->BarCodeFromWeighingMachine->FormValue)) {
            $this->BarCodeFromWeighingMachine->addErrorMessage($this->BarCodeFromWeighingMachine->getErrorMessage(false));
        }
        if ($this->CheckCostInReturn->Required) {
            if (!$this->CheckCostInReturn->IsDetailKey && EmptyValue($this->CheckCostInReturn->FormValue)) {
                $this->CheckCostInReturn->addErrorMessage(str_replace("%s", $this->CheckCostInReturn->caption(), $this->CheckCostInReturn->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->CheckCostInReturn->FormValue)) {
            $this->CheckCostInReturn->addErrorMessage($this->CheckCostInReturn->getErrorMessage(false));
        }
        if ($this->FrequentSaleProduct->Required) {
            if (!$this->FrequentSaleProduct->IsDetailKey && EmptyValue($this->FrequentSaleProduct->FormValue)) {
                $this->FrequentSaleProduct->addErrorMessage(str_replace("%s", $this->FrequentSaleProduct->caption(), $this->FrequentSaleProduct->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->FrequentSaleProduct->FormValue)) {
            $this->FrequentSaleProduct->addErrorMessage($this->FrequentSaleProduct->getErrorMessage(false));
        }
        if ($this->RateType->Required) {
            if (!$this->RateType->IsDetailKey && EmptyValue($this->RateType->FormValue)) {
                $this->RateType->addErrorMessage(str_replace("%s", $this->RateType->caption(), $this->RateType->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->RateType->FormValue)) {
            $this->RateType->addErrorMessage($this->RateType->getErrorMessage(false));
        }
        if ($this->TouchscreenName->Required) {
            if (!$this->TouchscreenName->IsDetailKey && EmptyValue($this->TouchscreenName->FormValue)) {
                $this->TouchscreenName->addErrorMessage(str_replace("%s", $this->TouchscreenName->caption(), $this->TouchscreenName->RequiredErrorMessage));
            }
        }
        if ($this->FreeType->Required) {
            if (!$this->FreeType->IsDetailKey && EmptyValue($this->FreeType->FormValue)) {
                $this->FreeType->addErrorMessage(str_replace("%s", $this->FreeType->caption(), $this->FreeType->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->FreeType->FormValue)) {
            $this->FreeType->addErrorMessage($this->FreeType->getErrorMessage(false));
        }
        if ($this->LooseQtyasNewBatch->Required) {
            if (!$this->LooseQtyasNewBatch->IsDetailKey && EmptyValue($this->LooseQtyasNewBatch->FormValue)) {
                $this->LooseQtyasNewBatch->addErrorMessage(str_replace("%s", $this->LooseQtyasNewBatch->caption(), $this->LooseQtyasNewBatch->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->LooseQtyasNewBatch->FormValue)) {
            $this->LooseQtyasNewBatch->addErrorMessage($this->LooseQtyasNewBatch->getErrorMessage(false));
        }
        if ($this->AllowSlabBilling->Required) {
            if (!$this->AllowSlabBilling->IsDetailKey && EmptyValue($this->AllowSlabBilling->FormValue)) {
                $this->AllowSlabBilling->addErrorMessage(str_replace("%s", $this->AllowSlabBilling->caption(), $this->AllowSlabBilling->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->AllowSlabBilling->FormValue)) {
            $this->AllowSlabBilling->addErrorMessage($this->AllowSlabBilling->getErrorMessage(false));
        }
        if ($this->ProductTypeForProduction->Required) {
            if (!$this->ProductTypeForProduction->IsDetailKey && EmptyValue($this->ProductTypeForProduction->FormValue)) {
                $this->ProductTypeForProduction->addErrorMessage(str_replace("%s", $this->ProductTypeForProduction->caption(), $this->ProductTypeForProduction->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->ProductTypeForProduction->FormValue)) {
            $this->ProductTypeForProduction->addErrorMessage($this->ProductTypeForProduction->getErrorMessage(false));
        }
        if ($this->RecipeCode->Required) {
            if (!$this->RecipeCode->IsDetailKey && EmptyValue($this->RecipeCode->FormValue)) {
                $this->RecipeCode->addErrorMessage(str_replace("%s", $this->RecipeCode->caption(), $this->RecipeCode->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->RecipeCode->FormValue)) {
            $this->RecipeCode->addErrorMessage($this->RecipeCode->getErrorMessage(false));
        }
        if ($this->DefaultUnitType->Required) {
            if (!$this->DefaultUnitType->IsDetailKey && EmptyValue($this->DefaultUnitType->FormValue)) {
                $this->DefaultUnitType->addErrorMessage(str_replace("%s", $this->DefaultUnitType->caption(), $this->DefaultUnitType->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->DefaultUnitType->FormValue)) {
            $this->DefaultUnitType->addErrorMessage($this->DefaultUnitType->getErrorMessage(false));
        }
        if ($this->PIstatus->Required) {
            if (!$this->PIstatus->IsDetailKey && EmptyValue($this->PIstatus->FormValue)) {
                $this->PIstatus->addErrorMessage(str_replace("%s", $this->PIstatus->caption(), $this->PIstatus->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->PIstatus->FormValue)) {
            $this->PIstatus->addErrorMessage($this->PIstatus->getErrorMessage(false));
        }
        if ($this->LastPiConfirmedDate->Required) {
            if (!$this->LastPiConfirmedDate->IsDetailKey && EmptyValue($this->LastPiConfirmedDate->FormValue)) {
                $this->LastPiConfirmedDate->addErrorMessage(str_replace("%s", $this->LastPiConfirmedDate->caption(), $this->LastPiConfirmedDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->LastPiConfirmedDate->FormValue)) {
            $this->LastPiConfirmedDate->addErrorMessage($this->LastPiConfirmedDate->getErrorMessage(false));
        }
        if ($this->BarCodeDesign->Required) {
            if (!$this->BarCodeDesign->IsDetailKey && EmptyValue($this->BarCodeDesign->FormValue)) {
                $this->BarCodeDesign->addErrorMessage(str_replace("%s", $this->BarCodeDesign->caption(), $this->BarCodeDesign->RequiredErrorMessage));
            }
        }
        if ($this->AcceptRemarksInBill->Required) {
            if (!$this->AcceptRemarksInBill->IsDetailKey && EmptyValue($this->AcceptRemarksInBill->FormValue)) {
                $this->AcceptRemarksInBill->addErrorMessage(str_replace("%s", $this->AcceptRemarksInBill->caption(), $this->AcceptRemarksInBill->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->AcceptRemarksInBill->FormValue)) {
            $this->AcceptRemarksInBill->addErrorMessage($this->AcceptRemarksInBill->getErrorMessage(false));
        }
        if ($this->Classification->Required) {
            if (!$this->Classification->IsDetailKey && EmptyValue($this->Classification->FormValue)) {
                $this->Classification->addErrorMessage(str_replace("%s", $this->Classification->caption(), $this->Classification->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->Classification->FormValue)) {
            $this->Classification->addErrorMessage($this->Classification->getErrorMessage(false));
        }
        if ($this->TimeSlot->Required) {
            if (!$this->TimeSlot->IsDetailKey && EmptyValue($this->TimeSlot->FormValue)) {
                $this->TimeSlot->addErrorMessage(str_replace("%s", $this->TimeSlot->caption(), $this->TimeSlot->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->TimeSlot->FormValue)) {
            $this->TimeSlot->addErrorMessage($this->TimeSlot->getErrorMessage(false));
        }
        if ($this->IsBundle->Required) {
            if (!$this->IsBundle->IsDetailKey && EmptyValue($this->IsBundle->FormValue)) {
                $this->IsBundle->addErrorMessage(str_replace("%s", $this->IsBundle->caption(), $this->IsBundle->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->IsBundle->FormValue)) {
            $this->IsBundle->addErrorMessage($this->IsBundle->getErrorMessage(false));
        }
        if ($this->ColorCode->Required) {
            if (!$this->ColorCode->IsDetailKey && EmptyValue($this->ColorCode->FormValue)) {
                $this->ColorCode->addErrorMessage(str_replace("%s", $this->ColorCode->caption(), $this->ColorCode->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->ColorCode->FormValue)) {
            $this->ColorCode->addErrorMessage($this->ColorCode->getErrorMessage(false));
        }
        if ($this->GenderCode->Required) {
            if (!$this->GenderCode->IsDetailKey && EmptyValue($this->GenderCode->FormValue)) {
                $this->GenderCode->addErrorMessage(str_replace("%s", $this->GenderCode->caption(), $this->GenderCode->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->GenderCode->FormValue)) {
            $this->GenderCode->addErrorMessage($this->GenderCode->getErrorMessage(false));
        }
        if ($this->SizeCode->Required) {
            if (!$this->SizeCode->IsDetailKey && EmptyValue($this->SizeCode->FormValue)) {
                $this->SizeCode->addErrorMessage(str_replace("%s", $this->SizeCode->caption(), $this->SizeCode->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->SizeCode->FormValue)) {
            $this->SizeCode->addErrorMessage($this->SizeCode->getErrorMessage(false));
        }
        if ($this->GiftCard->Required) {
            if (!$this->GiftCard->IsDetailKey && EmptyValue($this->GiftCard->FormValue)) {
                $this->GiftCard->addErrorMessage(str_replace("%s", $this->GiftCard->caption(), $this->GiftCard->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->GiftCard->FormValue)) {
            $this->GiftCard->addErrorMessage($this->GiftCard->getErrorMessage(false));
        }
        if ($this->ToonLabel->Required) {
            if (!$this->ToonLabel->IsDetailKey && EmptyValue($this->ToonLabel->FormValue)) {
                $this->ToonLabel->addErrorMessage(str_replace("%s", $this->ToonLabel->caption(), $this->ToonLabel->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->ToonLabel->FormValue)) {
            $this->ToonLabel->addErrorMessage($this->ToonLabel->getErrorMessage(false));
        }
        if ($this->GarmentType->Required) {
            if (!$this->GarmentType->IsDetailKey && EmptyValue($this->GarmentType->FormValue)) {
                $this->GarmentType->addErrorMessage(str_replace("%s", $this->GarmentType->caption(), $this->GarmentType->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->GarmentType->FormValue)) {
            $this->GarmentType->addErrorMessage($this->GarmentType->getErrorMessage(false));
        }
        if ($this->AgeGroup->Required) {
            if (!$this->AgeGroup->IsDetailKey && EmptyValue($this->AgeGroup->FormValue)) {
                $this->AgeGroup->addErrorMessage(str_replace("%s", $this->AgeGroup->caption(), $this->AgeGroup->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->AgeGroup->FormValue)) {
            $this->AgeGroup->addErrorMessage($this->AgeGroup->getErrorMessage(false));
        }
        if ($this->Season->Required) {
            if (!$this->Season->IsDetailKey && EmptyValue($this->Season->FormValue)) {
                $this->Season->addErrorMessage(str_replace("%s", $this->Season->caption(), $this->Season->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->Season->FormValue)) {
            $this->Season->addErrorMessage($this->Season->getErrorMessage(false));
        }
        if ($this->DailyStockEntry->Required) {
            if (!$this->DailyStockEntry->IsDetailKey && EmptyValue($this->DailyStockEntry->FormValue)) {
                $this->DailyStockEntry->addErrorMessage(str_replace("%s", $this->DailyStockEntry->caption(), $this->DailyStockEntry->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->DailyStockEntry->FormValue)) {
            $this->DailyStockEntry->addErrorMessage($this->DailyStockEntry->getErrorMessage(false));
        }
        if ($this->ModifierApplicable->Required) {
            if (!$this->ModifierApplicable->IsDetailKey && EmptyValue($this->ModifierApplicable->FormValue)) {
                $this->ModifierApplicable->addErrorMessage(str_replace("%s", $this->ModifierApplicable->caption(), $this->ModifierApplicable->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->ModifierApplicable->FormValue)) {
            $this->ModifierApplicable->addErrorMessage($this->ModifierApplicable->getErrorMessage(false));
        }
        if ($this->ModifierType->Required) {
            if (!$this->ModifierType->IsDetailKey && EmptyValue($this->ModifierType->FormValue)) {
                $this->ModifierType->addErrorMessage(str_replace("%s", $this->ModifierType->caption(), $this->ModifierType->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->ModifierType->FormValue)) {
            $this->ModifierType->addErrorMessage($this->ModifierType->getErrorMessage(false));
        }
        if ($this->AcceptZeroRate->Required) {
            if (!$this->AcceptZeroRate->IsDetailKey && EmptyValue($this->AcceptZeroRate->FormValue)) {
                $this->AcceptZeroRate->addErrorMessage(str_replace("%s", $this->AcceptZeroRate->caption(), $this->AcceptZeroRate->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->AcceptZeroRate->FormValue)) {
            $this->AcceptZeroRate->addErrorMessage($this->AcceptZeroRate->getErrorMessage(false));
        }
        if ($this->ExciseDutyCode->Required) {
            if (!$this->ExciseDutyCode->IsDetailKey && EmptyValue($this->ExciseDutyCode->FormValue)) {
                $this->ExciseDutyCode->addErrorMessage(str_replace("%s", $this->ExciseDutyCode->caption(), $this->ExciseDutyCode->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->ExciseDutyCode->FormValue)) {
            $this->ExciseDutyCode->addErrorMessage($this->ExciseDutyCode->getErrorMessage(false));
        }
        if ($this->IndentProductGroupCode->Required) {
            if (!$this->IndentProductGroupCode->IsDetailKey && EmptyValue($this->IndentProductGroupCode->FormValue)) {
                $this->IndentProductGroupCode->addErrorMessage(str_replace("%s", $this->IndentProductGroupCode->caption(), $this->IndentProductGroupCode->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->IndentProductGroupCode->FormValue)) {
            $this->IndentProductGroupCode->addErrorMessage($this->IndentProductGroupCode->getErrorMessage(false));
        }
        if ($this->IsMultiBatch->Required) {
            if (!$this->IsMultiBatch->IsDetailKey && EmptyValue($this->IsMultiBatch->FormValue)) {
                $this->IsMultiBatch->addErrorMessage(str_replace("%s", $this->IsMultiBatch->caption(), $this->IsMultiBatch->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->IsMultiBatch->FormValue)) {
            $this->IsMultiBatch->addErrorMessage($this->IsMultiBatch->getErrorMessage(false));
        }
        if ($this->IsSingleBatch->Required) {
            if (!$this->IsSingleBatch->IsDetailKey && EmptyValue($this->IsSingleBatch->FormValue)) {
                $this->IsSingleBatch->addErrorMessage(str_replace("%s", $this->IsSingleBatch->caption(), $this->IsSingleBatch->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->IsSingleBatch->FormValue)) {
            $this->IsSingleBatch->addErrorMessage($this->IsSingleBatch->getErrorMessage(false));
        }
        if ($this->MarkUpRate1->Required) {
            if (!$this->MarkUpRate1->IsDetailKey && EmptyValue($this->MarkUpRate1->FormValue)) {
                $this->MarkUpRate1->addErrorMessage(str_replace("%s", $this->MarkUpRate1->caption(), $this->MarkUpRate1->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->MarkUpRate1->FormValue)) {
            $this->MarkUpRate1->addErrorMessage($this->MarkUpRate1->getErrorMessage(false));
        }
        if ($this->MarkDownRate1->Required) {
            if (!$this->MarkDownRate1->IsDetailKey && EmptyValue($this->MarkDownRate1->FormValue)) {
                $this->MarkDownRate1->addErrorMessage(str_replace("%s", $this->MarkDownRate1->caption(), $this->MarkDownRate1->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->MarkDownRate1->FormValue)) {
            $this->MarkDownRate1->addErrorMessage($this->MarkDownRate1->getErrorMessage(false));
        }
        if ($this->MarkUpRate2->Required) {
            if (!$this->MarkUpRate2->IsDetailKey && EmptyValue($this->MarkUpRate2->FormValue)) {
                $this->MarkUpRate2->addErrorMessage(str_replace("%s", $this->MarkUpRate2->caption(), $this->MarkUpRate2->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->MarkUpRate2->FormValue)) {
            $this->MarkUpRate2->addErrorMessage($this->MarkUpRate2->getErrorMessage(false));
        }
        if ($this->MarkDownRate2->Required) {
            if (!$this->MarkDownRate2->IsDetailKey && EmptyValue($this->MarkDownRate2->FormValue)) {
                $this->MarkDownRate2->addErrorMessage(str_replace("%s", $this->MarkDownRate2->caption(), $this->MarkDownRate2->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->MarkDownRate2->FormValue)) {
            $this->MarkDownRate2->addErrorMessage($this->MarkDownRate2->getErrorMessage(false));
        }
        if ($this->_Yield->Required) {
            if (!$this->_Yield->IsDetailKey && EmptyValue($this->_Yield->FormValue)) {
                $this->_Yield->addErrorMessage(str_replace("%s", $this->_Yield->caption(), $this->_Yield->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->_Yield->FormValue)) {
            $this->_Yield->addErrorMessage($this->_Yield->getErrorMessage(false));
        }
        if ($this->RefProductCode->Required) {
            if (!$this->RefProductCode->IsDetailKey && EmptyValue($this->RefProductCode->FormValue)) {
                $this->RefProductCode->addErrorMessage(str_replace("%s", $this->RefProductCode->caption(), $this->RefProductCode->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->RefProductCode->FormValue)) {
            $this->RefProductCode->addErrorMessage($this->RefProductCode->getErrorMessage(false));
        }
        if ($this->Volume->Required) {
            if (!$this->Volume->IsDetailKey && EmptyValue($this->Volume->FormValue)) {
                $this->Volume->addErrorMessage(str_replace("%s", $this->Volume->caption(), $this->Volume->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->Volume->FormValue)) {
            $this->Volume->addErrorMessage($this->Volume->getErrorMessage(false));
        }
        if ($this->MeasurementID->Required) {
            if (!$this->MeasurementID->IsDetailKey && EmptyValue($this->MeasurementID->FormValue)) {
                $this->MeasurementID->addErrorMessage(str_replace("%s", $this->MeasurementID->caption(), $this->MeasurementID->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->MeasurementID->FormValue)) {
            $this->MeasurementID->addErrorMessage($this->MeasurementID->getErrorMessage(false));
        }
        if ($this->CountryCode->Required) {
            if (!$this->CountryCode->IsDetailKey && EmptyValue($this->CountryCode->FormValue)) {
                $this->CountryCode->addErrorMessage(str_replace("%s", $this->CountryCode->caption(), $this->CountryCode->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->CountryCode->FormValue)) {
            $this->CountryCode->addErrorMessage($this->CountryCode->getErrorMessage(false));
        }
        if ($this->AcceptWMQty->Required) {
            if (!$this->AcceptWMQty->IsDetailKey && EmptyValue($this->AcceptWMQty->FormValue)) {
                $this->AcceptWMQty->addErrorMessage(str_replace("%s", $this->AcceptWMQty->caption(), $this->AcceptWMQty->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->AcceptWMQty->FormValue)) {
            $this->AcceptWMQty->addErrorMessage($this->AcceptWMQty->getErrorMessage(false));
        }
        if ($this->SingleBatchBasedOnRate->Required) {
            if (!$this->SingleBatchBasedOnRate->IsDetailKey && EmptyValue($this->SingleBatchBasedOnRate->FormValue)) {
                $this->SingleBatchBasedOnRate->addErrorMessage(str_replace("%s", $this->SingleBatchBasedOnRate->caption(), $this->SingleBatchBasedOnRate->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->SingleBatchBasedOnRate->FormValue)) {
            $this->SingleBatchBasedOnRate->addErrorMessage($this->SingleBatchBasedOnRate->getErrorMessage(false));
        }
        if ($this->TenderNo->Required) {
            if (!$this->TenderNo->IsDetailKey && EmptyValue($this->TenderNo->FormValue)) {
                $this->TenderNo->addErrorMessage(str_replace("%s", $this->TenderNo->caption(), $this->TenderNo->RequiredErrorMessage));
            }
        }
        if ($this->SingleBillMaximumSoldQtyFiled->Required) {
            if (!$this->SingleBillMaximumSoldQtyFiled->IsDetailKey && EmptyValue($this->SingleBillMaximumSoldQtyFiled->FormValue)) {
                $this->SingleBillMaximumSoldQtyFiled->addErrorMessage(str_replace("%s", $this->SingleBillMaximumSoldQtyFiled->caption(), $this->SingleBillMaximumSoldQtyFiled->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->SingleBillMaximumSoldQtyFiled->FormValue)) {
            $this->SingleBillMaximumSoldQtyFiled->addErrorMessage($this->SingleBillMaximumSoldQtyFiled->getErrorMessage(false));
        }
        if ($this->Strength1->Required) {
            if (!$this->Strength1->IsDetailKey && EmptyValue($this->Strength1->FormValue)) {
                $this->Strength1->addErrorMessage(str_replace("%s", $this->Strength1->caption(), $this->Strength1->RequiredErrorMessage));
            }
        }
        if ($this->Strength2->Required) {
            if (!$this->Strength2->IsDetailKey && EmptyValue($this->Strength2->FormValue)) {
                $this->Strength2->addErrorMessage(str_replace("%s", $this->Strength2->caption(), $this->Strength2->RequiredErrorMessage));
            }
        }
        if ($this->Strength3->Required) {
            if (!$this->Strength3->IsDetailKey && EmptyValue($this->Strength3->FormValue)) {
                $this->Strength3->addErrorMessage(str_replace("%s", $this->Strength3->caption(), $this->Strength3->RequiredErrorMessage));
            }
        }
        if ($this->Strength4->Required) {
            if (!$this->Strength4->IsDetailKey && EmptyValue($this->Strength4->FormValue)) {
                $this->Strength4->addErrorMessage(str_replace("%s", $this->Strength4->caption(), $this->Strength4->RequiredErrorMessage));
            }
        }
        if ($this->Strength5->Required) {
            if (!$this->Strength5->IsDetailKey && EmptyValue($this->Strength5->FormValue)) {
                $this->Strength5->addErrorMessage(str_replace("%s", $this->Strength5->caption(), $this->Strength5->RequiredErrorMessage));
            }
        }
        if ($this->IngredientCode1->Required) {
            if (!$this->IngredientCode1->IsDetailKey && EmptyValue($this->IngredientCode1->FormValue)) {
                $this->IngredientCode1->addErrorMessage(str_replace("%s", $this->IngredientCode1->caption(), $this->IngredientCode1->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->IngredientCode1->FormValue)) {
            $this->IngredientCode1->addErrorMessage($this->IngredientCode1->getErrorMessage(false));
        }
        if ($this->IngredientCode2->Required) {
            if (!$this->IngredientCode2->IsDetailKey && EmptyValue($this->IngredientCode2->FormValue)) {
                $this->IngredientCode2->addErrorMessage(str_replace("%s", $this->IngredientCode2->caption(), $this->IngredientCode2->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->IngredientCode2->FormValue)) {
            $this->IngredientCode2->addErrorMessage($this->IngredientCode2->getErrorMessage(false));
        }
        if ($this->IngredientCode3->Required) {
            if (!$this->IngredientCode3->IsDetailKey && EmptyValue($this->IngredientCode3->FormValue)) {
                $this->IngredientCode3->addErrorMessage(str_replace("%s", $this->IngredientCode3->caption(), $this->IngredientCode3->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->IngredientCode3->FormValue)) {
            $this->IngredientCode3->addErrorMessage($this->IngredientCode3->getErrorMessage(false));
        }
        if ($this->IngredientCode4->Required) {
            if (!$this->IngredientCode4->IsDetailKey && EmptyValue($this->IngredientCode4->FormValue)) {
                $this->IngredientCode4->addErrorMessage(str_replace("%s", $this->IngredientCode4->caption(), $this->IngredientCode4->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->IngredientCode4->FormValue)) {
            $this->IngredientCode4->addErrorMessage($this->IngredientCode4->getErrorMessage(false));
        }
        if ($this->IngredientCode5->Required) {
            if (!$this->IngredientCode5->IsDetailKey && EmptyValue($this->IngredientCode5->FormValue)) {
                $this->IngredientCode5->addErrorMessage(str_replace("%s", $this->IngredientCode5->caption(), $this->IngredientCode5->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->IngredientCode5->FormValue)) {
            $this->IngredientCode5->addErrorMessage($this->IngredientCode5->getErrorMessage(false));
        }
        if ($this->OrderType->Required) {
            if (!$this->OrderType->IsDetailKey && EmptyValue($this->OrderType->FormValue)) {
                $this->OrderType->addErrorMessage(str_replace("%s", $this->OrderType->caption(), $this->OrderType->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->OrderType->FormValue)) {
            $this->OrderType->addErrorMessage($this->OrderType->getErrorMessage(false));
        }
        if ($this->StockUOM->Required) {
            if (!$this->StockUOM->IsDetailKey && EmptyValue($this->StockUOM->FormValue)) {
                $this->StockUOM->addErrorMessage(str_replace("%s", $this->StockUOM->caption(), $this->StockUOM->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->StockUOM->FormValue)) {
            $this->StockUOM->addErrorMessage($this->StockUOM->getErrorMessage(false));
        }
        if ($this->PriceUOM->Required) {
            if (!$this->PriceUOM->IsDetailKey && EmptyValue($this->PriceUOM->FormValue)) {
                $this->PriceUOM->addErrorMessage(str_replace("%s", $this->PriceUOM->caption(), $this->PriceUOM->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->PriceUOM->FormValue)) {
            $this->PriceUOM->addErrorMessage($this->PriceUOM->getErrorMessage(false));
        }
        if ($this->DefaultSaleUOM->Required) {
            if (!$this->DefaultSaleUOM->IsDetailKey && EmptyValue($this->DefaultSaleUOM->FormValue)) {
                $this->DefaultSaleUOM->addErrorMessage(str_replace("%s", $this->DefaultSaleUOM->caption(), $this->DefaultSaleUOM->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->DefaultSaleUOM->FormValue)) {
            $this->DefaultSaleUOM->addErrorMessage($this->DefaultSaleUOM->getErrorMessage(false));
        }
        if ($this->DefaultPurchaseUOM->Required) {
            if (!$this->DefaultPurchaseUOM->IsDetailKey && EmptyValue($this->DefaultPurchaseUOM->FormValue)) {
                $this->DefaultPurchaseUOM->addErrorMessage(str_replace("%s", $this->DefaultPurchaseUOM->caption(), $this->DefaultPurchaseUOM->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->DefaultPurchaseUOM->FormValue)) {
            $this->DefaultPurchaseUOM->addErrorMessage($this->DefaultPurchaseUOM->getErrorMessage(false));
        }
        if ($this->ReportingUOM->Required) {
            if (!$this->ReportingUOM->IsDetailKey && EmptyValue($this->ReportingUOM->FormValue)) {
                $this->ReportingUOM->addErrorMessage(str_replace("%s", $this->ReportingUOM->caption(), $this->ReportingUOM->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->ReportingUOM->FormValue)) {
            $this->ReportingUOM->addErrorMessage($this->ReportingUOM->getErrorMessage(false));
        }
        if ($this->LastPurchasedUOM->Required) {
            if (!$this->LastPurchasedUOM->IsDetailKey && EmptyValue($this->LastPurchasedUOM->FormValue)) {
                $this->LastPurchasedUOM->addErrorMessage(str_replace("%s", $this->LastPurchasedUOM->caption(), $this->LastPurchasedUOM->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->LastPurchasedUOM->FormValue)) {
            $this->LastPurchasedUOM->addErrorMessage($this->LastPurchasedUOM->getErrorMessage(false));
        }
        if ($this->TreatmentCodes->Required) {
            if (!$this->TreatmentCodes->IsDetailKey && EmptyValue($this->TreatmentCodes->FormValue)) {
                $this->TreatmentCodes->addErrorMessage(str_replace("%s", $this->TreatmentCodes->caption(), $this->TreatmentCodes->RequiredErrorMessage));
            }
        }
        if ($this->InsuranceType->Required) {
            if (!$this->InsuranceType->IsDetailKey && EmptyValue($this->InsuranceType->FormValue)) {
                $this->InsuranceType->addErrorMessage(str_replace("%s", $this->InsuranceType->caption(), $this->InsuranceType->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->InsuranceType->FormValue)) {
            $this->InsuranceType->addErrorMessage($this->InsuranceType->getErrorMessage(false));
        }
        if ($this->CoverageGroupCodes->Required) {
            if (!$this->CoverageGroupCodes->IsDetailKey && EmptyValue($this->CoverageGroupCodes->FormValue)) {
                $this->CoverageGroupCodes->addErrorMessage(str_replace("%s", $this->CoverageGroupCodes->caption(), $this->CoverageGroupCodes->RequiredErrorMessage));
            }
        }
        if ($this->MultipleUOM->Required) {
            if (!$this->MultipleUOM->IsDetailKey && EmptyValue($this->MultipleUOM->FormValue)) {
                $this->MultipleUOM->addErrorMessage(str_replace("%s", $this->MultipleUOM->caption(), $this->MultipleUOM->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->MultipleUOM->FormValue)) {
            $this->MultipleUOM->addErrorMessage($this->MultipleUOM->getErrorMessage(false));
        }
        if ($this->SalePriceComputation->Required) {
            if (!$this->SalePriceComputation->IsDetailKey && EmptyValue($this->SalePriceComputation->FormValue)) {
                $this->SalePriceComputation->addErrorMessage(str_replace("%s", $this->SalePriceComputation->caption(), $this->SalePriceComputation->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->SalePriceComputation->FormValue)) {
            $this->SalePriceComputation->addErrorMessage($this->SalePriceComputation->getErrorMessage(false));
        }
        if ($this->StockCorrection->Required) {
            if (!$this->StockCorrection->IsDetailKey && EmptyValue($this->StockCorrection->FormValue)) {
                $this->StockCorrection->addErrorMessage(str_replace("%s", $this->StockCorrection->caption(), $this->StockCorrection->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->StockCorrection->FormValue)) {
            $this->StockCorrection->addErrorMessage($this->StockCorrection->getErrorMessage(false));
        }
        if ($this->LBTPercentage->Required) {
            if (!$this->LBTPercentage->IsDetailKey && EmptyValue($this->LBTPercentage->FormValue)) {
                $this->LBTPercentage->addErrorMessage(str_replace("%s", $this->LBTPercentage->caption(), $this->LBTPercentage->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->LBTPercentage->FormValue)) {
            $this->LBTPercentage->addErrorMessage($this->LBTPercentage->getErrorMessage(false));
        }
        if ($this->SalesCommission->Required) {
            if (!$this->SalesCommission->IsDetailKey && EmptyValue($this->SalesCommission->FormValue)) {
                $this->SalesCommission->addErrorMessage(str_replace("%s", $this->SalesCommission->caption(), $this->SalesCommission->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->SalesCommission->FormValue)) {
            $this->SalesCommission->addErrorMessage($this->SalesCommission->getErrorMessage(false));
        }
        if ($this->LockedStock->Required) {
            if (!$this->LockedStock->IsDetailKey && EmptyValue($this->LockedStock->FormValue)) {
                $this->LockedStock->addErrorMessage(str_replace("%s", $this->LockedStock->caption(), $this->LockedStock->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->LockedStock->FormValue)) {
            $this->LockedStock->addErrorMessage($this->LockedStock->getErrorMessage(false));
        }
        if ($this->MinMaxUOM->Required) {
            if (!$this->MinMaxUOM->IsDetailKey && EmptyValue($this->MinMaxUOM->FormValue)) {
                $this->MinMaxUOM->addErrorMessage(str_replace("%s", $this->MinMaxUOM->caption(), $this->MinMaxUOM->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->MinMaxUOM->FormValue)) {
            $this->MinMaxUOM->addErrorMessage($this->MinMaxUOM->getErrorMessage(false));
        }
        if ($this->ExpiryMfrDateFormat->Required) {
            if (!$this->ExpiryMfrDateFormat->IsDetailKey && EmptyValue($this->ExpiryMfrDateFormat->FormValue)) {
                $this->ExpiryMfrDateFormat->addErrorMessage(str_replace("%s", $this->ExpiryMfrDateFormat->caption(), $this->ExpiryMfrDateFormat->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->ExpiryMfrDateFormat->FormValue)) {
            $this->ExpiryMfrDateFormat->addErrorMessage($this->ExpiryMfrDateFormat->getErrorMessage(false));
        }
        if ($this->ProductLifeTime->Required) {
            if (!$this->ProductLifeTime->IsDetailKey && EmptyValue($this->ProductLifeTime->FormValue)) {
                $this->ProductLifeTime->addErrorMessage(str_replace("%s", $this->ProductLifeTime->caption(), $this->ProductLifeTime->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->ProductLifeTime->FormValue)) {
            $this->ProductLifeTime->addErrorMessage($this->ProductLifeTime->getErrorMessage(false));
        }
        if ($this->IsCombo->Required) {
            if (!$this->IsCombo->IsDetailKey && EmptyValue($this->IsCombo->FormValue)) {
                $this->IsCombo->addErrorMessage(str_replace("%s", $this->IsCombo->caption(), $this->IsCombo->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->IsCombo->FormValue)) {
            $this->IsCombo->addErrorMessage($this->IsCombo->getErrorMessage(false));
        }
        if ($this->ComboTypeCode->Required) {
            if (!$this->ComboTypeCode->IsDetailKey && EmptyValue($this->ComboTypeCode->FormValue)) {
                $this->ComboTypeCode->addErrorMessage(str_replace("%s", $this->ComboTypeCode->caption(), $this->ComboTypeCode->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->ComboTypeCode->FormValue)) {
            $this->ComboTypeCode->addErrorMessage($this->ComboTypeCode->getErrorMessage(false));
        }
        if ($this->AttributeCount6->Required) {
            if (!$this->AttributeCount6->IsDetailKey && EmptyValue($this->AttributeCount6->FormValue)) {
                $this->AttributeCount6->addErrorMessage(str_replace("%s", $this->AttributeCount6->caption(), $this->AttributeCount6->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->AttributeCount6->FormValue)) {
            $this->AttributeCount6->addErrorMessage($this->AttributeCount6->getErrorMessage(false));
        }
        if ($this->AttributeCount7->Required) {
            if (!$this->AttributeCount7->IsDetailKey && EmptyValue($this->AttributeCount7->FormValue)) {
                $this->AttributeCount7->addErrorMessage(str_replace("%s", $this->AttributeCount7->caption(), $this->AttributeCount7->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->AttributeCount7->FormValue)) {
            $this->AttributeCount7->addErrorMessage($this->AttributeCount7->getErrorMessage(false));
        }
        if ($this->AttributeCount8->Required) {
            if (!$this->AttributeCount8->IsDetailKey && EmptyValue($this->AttributeCount8->FormValue)) {
                $this->AttributeCount8->addErrorMessage(str_replace("%s", $this->AttributeCount8->caption(), $this->AttributeCount8->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->AttributeCount8->FormValue)) {
            $this->AttributeCount8->addErrorMessage($this->AttributeCount8->getErrorMessage(false));
        }
        if ($this->AttributeCount9->Required) {
            if (!$this->AttributeCount9->IsDetailKey && EmptyValue($this->AttributeCount9->FormValue)) {
                $this->AttributeCount9->addErrorMessage(str_replace("%s", $this->AttributeCount9->caption(), $this->AttributeCount9->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->AttributeCount9->FormValue)) {
            $this->AttributeCount9->addErrorMessage($this->AttributeCount9->getErrorMessage(false));
        }
        if ($this->AttributeCount10->Required) {
            if (!$this->AttributeCount10->IsDetailKey && EmptyValue($this->AttributeCount10->FormValue)) {
                $this->AttributeCount10->addErrorMessage(str_replace("%s", $this->AttributeCount10->caption(), $this->AttributeCount10->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->AttributeCount10->FormValue)) {
            $this->AttributeCount10->addErrorMessage($this->AttributeCount10->getErrorMessage(false));
        }
        if ($this->LabourCharge->Required) {
            if (!$this->LabourCharge->IsDetailKey && EmptyValue($this->LabourCharge->FormValue)) {
                $this->LabourCharge->addErrorMessage(str_replace("%s", $this->LabourCharge->caption(), $this->LabourCharge->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->LabourCharge->FormValue)) {
            $this->LabourCharge->addErrorMessage($this->LabourCharge->getErrorMessage(false));
        }
        if ($this->AffectOtherCharge->Required) {
            if (!$this->AffectOtherCharge->IsDetailKey && EmptyValue($this->AffectOtherCharge->FormValue)) {
                $this->AffectOtherCharge->addErrorMessage(str_replace("%s", $this->AffectOtherCharge->caption(), $this->AffectOtherCharge->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->AffectOtherCharge->FormValue)) {
            $this->AffectOtherCharge->addErrorMessage($this->AffectOtherCharge->getErrorMessage(false));
        }
        if ($this->DosageInfo->Required) {
            if (!$this->DosageInfo->IsDetailKey && EmptyValue($this->DosageInfo->FormValue)) {
                $this->DosageInfo->addErrorMessage(str_replace("%s", $this->DosageInfo->caption(), $this->DosageInfo->RequiredErrorMessage));
            }
        }
        if ($this->DosageType->Required) {
            if (!$this->DosageType->IsDetailKey && EmptyValue($this->DosageType->FormValue)) {
                $this->DosageType->addErrorMessage(str_replace("%s", $this->DosageType->caption(), $this->DosageType->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->DosageType->FormValue)) {
            $this->DosageType->addErrorMessage($this->DosageType->getErrorMessage(false));
        }
        if ($this->DefaultIndentUOM->Required) {
            if (!$this->DefaultIndentUOM->IsDetailKey && EmptyValue($this->DefaultIndentUOM->FormValue)) {
                $this->DefaultIndentUOM->addErrorMessage(str_replace("%s", $this->DefaultIndentUOM->caption(), $this->DefaultIndentUOM->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->DefaultIndentUOM->FormValue)) {
            $this->DefaultIndentUOM->addErrorMessage($this->DefaultIndentUOM->getErrorMessage(false));
        }
        if ($this->PromoTag->Required) {
            if (!$this->PromoTag->IsDetailKey && EmptyValue($this->PromoTag->FormValue)) {
                $this->PromoTag->addErrorMessage(str_replace("%s", $this->PromoTag->caption(), $this->PromoTag->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->PromoTag->FormValue)) {
            $this->PromoTag->addErrorMessage($this->PromoTag->getErrorMessage(false));
        }
        if ($this->BillLevelPromoTag->Required) {
            if (!$this->BillLevelPromoTag->IsDetailKey && EmptyValue($this->BillLevelPromoTag->FormValue)) {
                $this->BillLevelPromoTag->addErrorMessage(str_replace("%s", $this->BillLevelPromoTag->caption(), $this->BillLevelPromoTag->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->BillLevelPromoTag->FormValue)) {
            $this->BillLevelPromoTag->addErrorMessage($this->BillLevelPromoTag->getErrorMessage(false));
        }
        if ($this->IsMRPProduct->Required) {
            if (!$this->IsMRPProduct->IsDetailKey && EmptyValue($this->IsMRPProduct->FormValue)) {
                $this->IsMRPProduct->addErrorMessage(str_replace("%s", $this->IsMRPProduct->caption(), $this->IsMRPProduct->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->IsMRPProduct->FormValue)) {
            $this->IsMRPProduct->addErrorMessage($this->IsMRPProduct->getErrorMessage(false));
        }
        if ($this->MrpList->Required) {
            if (!$this->MrpList->IsDetailKey && EmptyValue($this->MrpList->FormValue)) {
                $this->MrpList->addErrorMessage(str_replace("%s", $this->MrpList->caption(), $this->MrpList->RequiredErrorMessage));
            }
        }
        if ($this->AlternateSaleUOM->Required) {
            if (!$this->AlternateSaleUOM->IsDetailKey && EmptyValue($this->AlternateSaleUOM->FormValue)) {
                $this->AlternateSaleUOM->addErrorMessage(str_replace("%s", $this->AlternateSaleUOM->caption(), $this->AlternateSaleUOM->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->AlternateSaleUOM->FormValue)) {
            $this->AlternateSaleUOM->addErrorMessage($this->AlternateSaleUOM->getErrorMessage(false));
        }
        if ($this->FreeUOM->Required) {
            if (!$this->FreeUOM->IsDetailKey && EmptyValue($this->FreeUOM->FormValue)) {
                $this->FreeUOM->addErrorMessage(str_replace("%s", $this->FreeUOM->caption(), $this->FreeUOM->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->FreeUOM->FormValue)) {
            $this->FreeUOM->addErrorMessage($this->FreeUOM->getErrorMessage(false));
        }
        if ($this->MarketedCode->Required) {
            if (!$this->MarketedCode->IsDetailKey && EmptyValue($this->MarketedCode->FormValue)) {
                $this->MarketedCode->addErrorMessage(str_replace("%s", $this->MarketedCode->caption(), $this->MarketedCode->RequiredErrorMessage));
            }
        }
        if ($this->MinimumSalePrice->Required) {
            if (!$this->MinimumSalePrice->IsDetailKey && EmptyValue($this->MinimumSalePrice->FormValue)) {
                $this->MinimumSalePrice->addErrorMessage(str_replace("%s", $this->MinimumSalePrice->caption(), $this->MinimumSalePrice->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->MinimumSalePrice->FormValue)) {
            $this->MinimumSalePrice->addErrorMessage($this->MinimumSalePrice->getErrorMessage(false));
        }
        if ($this->PRate1->Required) {
            if (!$this->PRate1->IsDetailKey && EmptyValue($this->PRate1->FormValue)) {
                $this->PRate1->addErrorMessage(str_replace("%s", $this->PRate1->caption(), $this->PRate1->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->PRate1->FormValue)) {
            $this->PRate1->addErrorMessage($this->PRate1->getErrorMessage(false));
        }
        if ($this->PRate2->Required) {
            if (!$this->PRate2->IsDetailKey && EmptyValue($this->PRate2->FormValue)) {
                $this->PRate2->addErrorMessage(str_replace("%s", $this->PRate2->caption(), $this->PRate2->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->PRate2->FormValue)) {
            $this->PRate2->addErrorMessage($this->PRate2->getErrorMessage(false));
        }
        if ($this->LPItemCost->Required) {
            if (!$this->LPItemCost->IsDetailKey && EmptyValue($this->LPItemCost->FormValue)) {
                $this->LPItemCost->addErrorMessage(str_replace("%s", $this->LPItemCost->caption(), $this->LPItemCost->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->LPItemCost->FormValue)) {
            $this->LPItemCost->addErrorMessage($this->LPItemCost->getErrorMessage(false));
        }
        if ($this->FixedItemCost->Required) {
            if (!$this->FixedItemCost->IsDetailKey && EmptyValue($this->FixedItemCost->FormValue)) {
                $this->FixedItemCost->addErrorMessage(str_replace("%s", $this->FixedItemCost->caption(), $this->FixedItemCost->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->FixedItemCost->FormValue)) {
            $this->FixedItemCost->addErrorMessage($this->FixedItemCost->getErrorMessage(false));
        }
        if ($this->HSNId->Required) {
            if (!$this->HSNId->IsDetailKey && EmptyValue($this->HSNId->FormValue)) {
                $this->HSNId->addErrorMessage(str_replace("%s", $this->HSNId->caption(), $this->HSNId->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->HSNId->FormValue)) {
            $this->HSNId->addErrorMessage($this->HSNId->getErrorMessage(false));
        }
        if ($this->TaxInclusive->Required) {
            if (!$this->TaxInclusive->IsDetailKey && EmptyValue($this->TaxInclusive->FormValue)) {
                $this->TaxInclusive->addErrorMessage(str_replace("%s", $this->TaxInclusive->caption(), $this->TaxInclusive->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->TaxInclusive->FormValue)) {
            $this->TaxInclusive->addErrorMessage($this->TaxInclusive->getErrorMessage(false));
        }
        if ($this->EligibleforWarranty->Required) {
            if (!$this->EligibleforWarranty->IsDetailKey && EmptyValue($this->EligibleforWarranty->FormValue)) {
                $this->EligibleforWarranty->addErrorMessage(str_replace("%s", $this->EligibleforWarranty->caption(), $this->EligibleforWarranty->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->EligibleforWarranty->FormValue)) {
            $this->EligibleforWarranty->addErrorMessage($this->EligibleforWarranty->getErrorMessage(false));
        }
        if ($this->NoofMonthsWarranty->Required) {
            if (!$this->NoofMonthsWarranty->IsDetailKey && EmptyValue($this->NoofMonthsWarranty->FormValue)) {
                $this->NoofMonthsWarranty->addErrorMessage(str_replace("%s", $this->NoofMonthsWarranty->caption(), $this->NoofMonthsWarranty->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->NoofMonthsWarranty->FormValue)) {
            $this->NoofMonthsWarranty->addErrorMessage($this->NoofMonthsWarranty->getErrorMessage(false));
        }
        if ($this->ComputeTaxonCost->Required) {
            if (!$this->ComputeTaxonCost->IsDetailKey && EmptyValue($this->ComputeTaxonCost->FormValue)) {
                $this->ComputeTaxonCost->addErrorMessage(str_replace("%s", $this->ComputeTaxonCost->caption(), $this->ComputeTaxonCost->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->ComputeTaxonCost->FormValue)) {
            $this->ComputeTaxonCost->addErrorMessage($this->ComputeTaxonCost->getErrorMessage(false));
        }
        if ($this->HasEmptyBottleTrack->Required) {
            if (!$this->HasEmptyBottleTrack->IsDetailKey && EmptyValue($this->HasEmptyBottleTrack->FormValue)) {
                $this->HasEmptyBottleTrack->addErrorMessage(str_replace("%s", $this->HasEmptyBottleTrack->caption(), $this->HasEmptyBottleTrack->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->HasEmptyBottleTrack->FormValue)) {
            $this->HasEmptyBottleTrack->addErrorMessage($this->HasEmptyBottleTrack->getErrorMessage(false));
        }
        if ($this->EmptyBottleReferenceCode->Required) {
            if (!$this->EmptyBottleReferenceCode->IsDetailKey && EmptyValue($this->EmptyBottleReferenceCode->FormValue)) {
                $this->EmptyBottleReferenceCode->addErrorMessage(str_replace("%s", $this->EmptyBottleReferenceCode->caption(), $this->EmptyBottleReferenceCode->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->EmptyBottleReferenceCode->FormValue)) {
            $this->EmptyBottleReferenceCode->addErrorMessage($this->EmptyBottleReferenceCode->getErrorMessage(false));
        }
        if ($this->AdditionalCESSAmount->Required) {
            if (!$this->AdditionalCESSAmount->IsDetailKey && EmptyValue($this->AdditionalCESSAmount->FormValue)) {
                $this->AdditionalCESSAmount->addErrorMessage(str_replace("%s", $this->AdditionalCESSAmount->caption(), $this->AdditionalCESSAmount->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->AdditionalCESSAmount->FormValue)) {
            $this->AdditionalCESSAmount->addErrorMessage($this->AdditionalCESSAmount->getErrorMessage(false));
        }
        if ($this->EmptyBottleRate->Required) {
            if (!$this->EmptyBottleRate->IsDetailKey && EmptyValue($this->EmptyBottleRate->FormValue)) {
                $this->EmptyBottleRate->addErrorMessage(str_replace("%s", $this->EmptyBottleRate->caption(), $this->EmptyBottleRate->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->EmptyBottleRate->FormValue)) {
            $this->EmptyBottleRate->addErrorMessage($this->EmptyBottleRate->getErrorMessage(false));
        }

        // Return validate result
        $validateForm = !$this->hasInvalidFields();

        // Call Form_CustomValidate event
        $formCustomError = "";
        $validateForm = $validateForm && $this->formCustomValidate($formCustomError);
        if ($formCustomError != "") {
            $this->setFailureMessage($formCustomError);
        }
        return $validateForm;
    }

    // Add record
    protected function addRow($rsold = null)
    {
        global $Language, $Security;
        $conn = $this->getConnection();

        // Load db values from rsold
        $this->loadDbValues($rsold);
        if ($rsold) {
        }
        $rsnew = [];

        // ProductName
        $this->ProductName->setDbValueDef($rsnew, $this->ProductName->CurrentValue, null, false);

        // DivisionCode
        $this->DivisionCode->setDbValueDef($rsnew, $this->DivisionCode->CurrentValue, null, false);

        // ManufacturerCode
        $this->ManufacturerCode->setDbValueDef($rsnew, $this->ManufacturerCode->CurrentValue, null, false);

        // SupplierCode
        $this->SupplierCode->setDbValueDef($rsnew, $this->SupplierCode->CurrentValue, null, false);

        // AlternateSupplierCodes
        $this->AlternateSupplierCodes->setDbValueDef($rsnew, $this->AlternateSupplierCodes->CurrentValue, null, false);

        // AlternateProductCode
        $this->AlternateProductCode->setDbValueDef($rsnew, $this->AlternateProductCode->CurrentValue, null, false);

        // UniversalProductCode
        $this->UniversalProductCode->setDbValueDef($rsnew, $this->UniversalProductCode->CurrentValue, null, false);

        // BookProductCode
        $this->BookProductCode->setDbValueDef($rsnew, $this->BookProductCode->CurrentValue, null, false);

        // OldCode
        $this->OldCode->setDbValueDef($rsnew, $this->OldCode->CurrentValue, null, false);

        // ProtectedProducts
        $this->ProtectedProducts->setDbValueDef($rsnew, $this->ProtectedProducts->CurrentValue, null, false);

        // ProductFullName
        $this->ProductFullName->setDbValueDef($rsnew, $this->ProductFullName->CurrentValue, null, false);

        // UnitOfMeasure
        $this->UnitOfMeasure->setDbValueDef($rsnew, $this->UnitOfMeasure->CurrentValue, null, false);

        // UnitDescription
        $this->UnitDescription->setDbValueDef($rsnew, $this->UnitDescription->CurrentValue, null, false);

        // BulkDescription
        $this->BulkDescription->setDbValueDef($rsnew, $this->BulkDescription->CurrentValue, null, false);

        // BarCodeDescription
        $this->BarCodeDescription->setDbValueDef($rsnew, $this->BarCodeDescription->CurrentValue, null, false);

        // PackageInformation
        $this->PackageInformation->setDbValueDef($rsnew, $this->PackageInformation->CurrentValue, null, false);

        // PackageId
        $this->PackageId->setDbValueDef($rsnew, $this->PackageId->CurrentValue, null, false);

        // Weight
        $this->Weight->setDbValueDef($rsnew, $this->Weight->CurrentValue, null, false);

        // AllowFractions
        $this->AllowFractions->setDbValueDef($rsnew, $this->AllowFractions->CurrentValue, null, false);

        // MinimumStockLevel
        $this->MinimumStockLevel->setDbValueDef($rsnew, $this->MinimumStockLevel->CurrentValue, null, false);

        // MaximumStockLevel
        $this->MaximumStockLevel->setDbValueDef($rsnew, $this->MaximumStockLevel->CurrentValue, null, false);

        // ReorderLevel
        $this->ReorderLevel->setDbValueDef($rsnew, $this->ReorderLevel->CurrentValue, null, false);

        // MinMaxRatio
        $this->MinMaxRatio->setDbValueDef($rsnew, $this->MinMaxRatio->CurrentValue, null, false);

        // AutoMinMaxRatio
        $this->AutoMinMaxRatio->setDbValueDef($rsnew, $this->AutoMinMaxRatio->CurrentValue, null, false);

        // ScheduleCode
        $this->ScheduleCode->setDbValueDef($rsnew, $this->ScheduleCode->CurrentValue, null, false);

        // RopRatio
        $this->RopRatio->setDbValueDef($rsnew, $this->RopRatio->CurrentValue, null, false);

        // MRP
        $this->MRP->setDbValueDef($rsnew, $this->MRP->CurrentValue, null, false);

        // PurchasePrice
        $this->PurchasePrice->setDbValueDef($rsnew, $this->PurchasePrice->CurrentValue, null, false);

        // PurchaseUnit
        $this->PurchaseUnit->setDbValueDef($rsnew, $this->PurchaseUnit->CurrentValue, null, false);

        // PurchaseTaxCode
        $this->PurchaseTaxCode->setDbValueDef($rsnew, $this->PurchaseTaxCode->CurrentValue, null, false);

        // AllowDirectInward
        $this->AllowDirectInward->setDbValueDef($rsnew, $this->AllowDirectInward->CurrentValue, null, false);

        // SalePrice
        $this->SalePrice->setDbValueDef($rsnew, $this->SalePrice->CurrentValue, null, false);

        // SaleUnit
        $this->SaleUnit->setDbValueDef($rsnew, $this->SaleUnit->CurrentValue, null, false);

        // SalesTaxCode
        $this->SalesTaxCode->setDbValueDef($rsnew, $this->SalesTaxCode->CurrentValue, null, false);

        // StockReceived
        $this->StockReceived->setDbValueDef($rsnew, $this->StockReceived->CurrentValue, null, false);

        // TotalStock
        $this->TotalStock->setDbValueDef($rsnew, $this->TotalStock->CurrentValue, null, false);

        // StockType
        $this->StockType->setDbValueDef($rsnew, $this->StockType->CurrentValue, null, false);

        // StockCheckDate
        $this->StockCheckDate->setDbValueDef($rsnew, UnFormatDateTime($this->StockCheckDate->CurrentValue, 0), null, false);

        // StockAdjustmentDate
        $this->StockAdjustmentDate->setDbValueDef($rsnew, UnFormatDateTime($this->StockAdjustmentDate->CurrentValue, 0), null, false);

        // Remarks
        $this->Remarks->setDbValueDef($rsnew, $this->Remarks->CurrentValue, null, false);

        // CostCentre
        $this->CostCentre->setDbValueDef($rsnew, $this->CostCentre->CurrentValue, null, false);

        // ProductType
        $this->ProductType->setDbValueDef($rsnew, $this->ProductType->CurrentValue, null, false);

        // TaxAmount
        $this->TaxAmount->setDbValueDef($rsnew, $this->TaxAmount->CurrentValue, null, false);

        // TaxId
        $this->TaxId->setDbValueDef($rsnew, $this->TaxId->CurrentValue, null, false);

        // ResaleTaxApplicable
        $this->ResaleTaxApplicable->setDbValueDef($rsnew, $this->ResaleTaxApplicable->CurrentValue, null, false);

        // CstOtherTax
        $this->CstOtherTax->setDbValueDef($rsnew, $this->CstOtherTax->CurrentValue, null, false);

        // TotalTax
        $this->TotalTax->setDbValueDef($rsnew, $this->TotalTax->CurrentValue, null, false);

        // ItemCost
        $this->ItemCost->setDbValueDef($rsnew, $this->ItemCost->CurrentValue, null, false);

        // ExpiryDate
        $this->ExpiryDate->setDbValueDef($rsnew, UnFormatDateTime($this->ExpiryDate->CurrentValue, 0), null, false);

        // BatchDescription
        $this->BatchDescription->setDbValueDef($rsnew, $this->BatchDescription->CurrentValue, null, false);

        // FreeScheme
        $this->FreeScheme->setDbValueDef($rsnew, $this->FreeScheme->CurrentValue, null, false);

        // CashDiscountEligibility
        $this->CashDiscountEligibility->setDbValueDef($rsnew, $this->CashDiscountEligibility->CurrentValue, null, false);

        // DiscountPerAllowInBill
        $this->DiscountPerAllowInBill->setDbValueDef($rsnew, $this->DiscountPerAllowInBill->CurrentValue, null, false);

        // Discount
        $this->Discount->setDbValueDef($rsnew, $this->Discount->CurrentValue, null, false);

        // TotalAmount
        $this->TotalAmount->setDbValueDef($rsnew, $this->TotalAmount->CurrentValue, null, false);

        // StandardMargin
        $this->StandardMargin->setDbValueDef($rsnew, $this->StandardMargin->CurrentValue, null, false);

        // Margin
        $this->Margin->setDbValueDef($rsnew, $this->Margin->CurrentValue, null, false);

        // MarginId
        $this->MarginId->setDbValueDef($rsnew, $this->MarginId->CurrentValue, null, false);

        // ExpectedMargin
        $this->ExpectedMargin->setDbValueDef($rsnew, $this->ExpectedMargin->CurrentValue, null, false);

        // SurchargeBeforeTax
        $this->SurchargeBeforeTax->setDbValueDef($rsnew, $this->SurchargeBeforeTax->CurrentValue, null, false);

        // SurchargeAfterTax
        $this->SurchargeAfterTax->setDbValueDef($rsnew, $this->SurchargeAfterTax->CurrentValue, null, false);

        // TempOrderNo
        $this->TempOrderNo->setDbValueDef($rsnew, $this->TempOrderNo->CurrentValue, null, false);

        // TempOrderDate
        $this->TempOrderDate->setDbValueDef($rsnew, UnFormatDateTime($this->TempOrderDate->CurrentValue, 0), null, false);

        // OrderUnit
        $this->OrderUnit->setDbValueDef($rsnew, $this->OrderUnit->CurrentValue, null, false);

        // OrderQuantity
        $this->OrderQuantity->setDbValueDef($rsnew, $this->OrderQuantity->CurrentValue, null, false);

        // MarkForOrder
        $this->MarkForOrder->setDbValueDef($rsnew, $this->MarkForOrder->CurrentValue, null, false);

        // OrderAllId
        $this->OrderAllId->setDbValueDef($rsnew, $this->OrderAllId->CurrentValue, null, false);

        // CalculateOrderQty
        $this->CalculateOrderQty->setDbValueDef($rsnew, $this->CalculateOrderQty->CurrentValue, null, false);

        // SubLocation
        $this->SubLocation->setDbValueDef($rsnew, $this->SubLocation->CurrentValue, null, false);

        // CategoryCode
        $this->CategoryCode->setDbValueDef($rsnew, $this->CategoryCode->CurrentValue, null, false);

        // SubCategory
        $this->SubCategory->setDbValueDef($rsnew, $this->SubCategory->CurrentValue, null, false);

        // FlexCategoryCode
        $this->FlexCategoryCode->setDbValueDef($rsnew, $this->FlexCategoryCode->CurrentValue, null, false);

        // ABCSaleQty
        $this->ABCSaleQty->setDbValueDef($rsnew, $this->ABCSaleQty->CurrentValue, null, false);

        // ABCSaleValue
        $this->ABCSaleValue->setDbValueDef($rsnew, $this->ABCSaleValue->CurrentValue, null, false);

        // ConvertionFactor
        $this->ConvertionFactor->setDbValueDef($rsnew, $this->ConvertionFactor->CurrentValue, 0, false);

        // ConvertionUnitDesc
        $this->ConvertionUnitDesc->setDbValueDef($rsnew, $this->ConvertionUnitDesc->CurrentValue, null, false);

        // TransactionId
        $this->TransactionId->setDbValueDef($rsnew, $this->TransactionId->CurrentValue, null, false);

        // SoldProductId
        $this->SoldProductId->setDbValueDef($rsnew, $this->SoldProductId->CurrentValue, null, false);

        // WantedBookId
        $this->WantedBookId->setDbValueDef($rsnew, $this->WantedBookId->CurrentValue, null, false);

        // AllId
        $this->AllId->setDbValueDef($rsnew, $this->AllId->CurrentValue, null, false);

        // BatchAndExpiryCompulsory
        $this->BatchAndExpiryCompulsory->setDbValueDef($rsnew, $this->BatchAndExpiryCompulsory->CurrentValue, null, false);

        // BatchStockForWantedBook
        $this->BatchStockForWantedBook->setDbValueDef($rsnew, $this->BatchStockForWantedBook->CurrentValue, null, false);

        // UnitBasedBilling
        $this->UnitBasedBilling->setDbValueDef($rsnew, $this->UnitBasedBilling->CurrentValue, null, false);

        // DoNotCheckStock
        $this->DoNotCheckStock->setDbValueDef($rsnew, $this->DoNotCheckStock->CurrentValue, null, false);

        // AcceptRate
        $this->AcceptRate->setDbValueDef($rsnew, $this->AcceptRate->CurrentValue, null, false);

        // PriceLevel
        $this->PriceLevel->setDbValueDef($rsnew, $this->PriceLevel->CurrentValue, null, false);

        // LastQuotePrice
        $this->LastQuotePrice->setDbValueDef($rsnew, $this->LastQuotePrice->CurrentValue, null, false);

        // PriceChange
        $this->PriceChange->setDbValueDef($rsnew, $this->PriceChange->CurrentValue, null, false);

        // CommodityCode
        $this->CommodityCode->setDbValueDef($rsnew, $this->CommodityCode->CurrentValue, null, false);

        // InstitutePrice
        $this->InstitutePrice->setDbValueDef($rsnew, $this->InstitutePrice->CurrentValue, null, false);

        // CtrlOrDCtrlProduct
        $this->CtrlOrDCtrlProduct->setDbValueDef($rsnew, $this->CtrlOrDCtrlProduct->CurrentValue, null, false);

        // ImportedDate
        $this->ImportedDate->setDbValueDef($rsnew, UnFormatDateTime($this->ImportedDate->CurrentValue, 0), null, false);

        // IsImported
        $this->IsImported->setDbValueDef($rsnew, $this->IsImported->CurrentValue, null, false);

        // FileName
        $this->FileName->setDbValueDef($rsnew, $this->FileName->CurrentValue, null, false);

        // LPName
        $this->LPName->setDbValueDef($rsnew, $this->LPName->CurrentValue, null, false);

        // GodownNumber
        $this->GodownNumber->setDbValueDef($rsnew, $this->GodownNumber->CurrentValue, null, false);

        // CreationDate
        $this->CreationDate->setDbValueDef($rsnew, UnFormatDateTime($this->CreationDate->CurrentValue, 0), null, false);

        // CreatedbyUser
        $this->CreatedbyUser->setDbValueDef($rsnew, $this->CreatedbyUser->CurrentValue, null, false);

        // ModifiedDate
        $this->ModifiedDate->setDbValueDef($rsnew, UnFormatDateTime($this->ModifiedDate->CurrentValue, 0), null, false);

        // ModifiedbyUser
        $this->ModifiedbyUser->setDbValueDef($rsnew, $this->ModifiedbyUser->CurrentValue, null, false);

        // isActive
        $this->isActive->setDbValueDef($rsnew, $this->isActive->CurrentValue, null, false);

        // AllowExpiryClaim
        $this->AllowExpiryClaim->setDbValueDef($rsnew, $this->AllowExpiryClaim->CurrentValue, null, false);

        // BrandCode
        $this->BrandCode->setDbValueDef($rsnew, $this->BrandCode->CurrentValue, null, false);

        // FreeSchemeBasedon
        $this->FreeSchemeBasedon->setDbValueDef($rsnew, $this->FreeSchemeBasedon->CurrentValue, null, false);

        // DoNotCheckCostInBill
        $this->DoNotCheckCostInBill->setDbValueDef($rsnew, $this->DoNotCheckCostInBill->CurrentValue, null, false);

        // ProductGroupCode
        $this->ProductGroupCode->setDbValueDef($rsnew, $this->ProductGroupCode->CurrentValue, null, false);

        // ProductStrengthCode
        $this->ProductStrengthCode->setDbValueDef($rsnew, $this->ProductStrengthCode->CurrentValue, null, false);

        // PackingCode
        $this->PackingCode->setDbValueDef($rsnew, $this->PackingCode->CurrentValue, null, false);

        // ComputedMinStock
        $this->ComputedMinStock->setDbValueDef($rsnew, $this->ComputedMinStock->CurrentValue, null, false);

        // ComputedMaxStock
        $this->ComputedMaxStock->setDbValueDef($rsnew, $this->ComputedMaxStock->CurrentValue, null, false);

        // ProductRemark
        $this->ProductRemark->setDbValueDef($rsnew, $this->ProductRemark->CurrentValue, null, false);

        // ProductDrugCode
        $this->ProductDrugCode->setDbValueDef($rsnew, $this->ProductDrugCode->CurrentValue, null, false);

        // IsMatrixProduct
        $this->IsMatrixProduct->setDbValueDef($rsnew, $this->IsMatrixProduct->CurrentValue, null, false);

        // AttributeCount1
        $this->AttributeCount1->setDbValueDef($rsnew, $this->AttributeCount1->CurrentValue, null, false);

        // AttributeCount2
        $this->AttributeCount2->setDbValueDef($rsnew, $this->AttributeCount2->CurrentValue, null, false);

        // AttributeCount3
        $this->AttributeCount3->setDbValueDef($rsnew, $this->AttributeCount3->CurrentValue, null, false);

        // AttributeCount4
        $this->AttributeCount4->setDbValueDef($rsnew, $this->AttributeCount4->CurrentValue, null, false);

        // AttributeCount5
        $this->AttributeCount5->setDbValueDef($rsnew, $this->AttributeCount5->CurrentValue, null, false);

        // DefaultDiscountPercentage
        $this->DefaultDiscountPercentage->setDbValueDef($rsnew, $this->DefaultDiscountPercentage->CurrentValue, null, false);

        // DonotPrintBarcode
        $this->DonotPrintBarcode->setDbValueDef($rsnew, $this->DonotPrintBarcode->CurrentValue, null, false);

        // ProductLevelDiscount
        $this->ProductLevelDiscount->setDbValueDef($rsnew, $this->ProductLevelDiscount->CurrentValue, null, false);

        // Markup
        $this->Markup->setDbValueDef($rsnew, $this->Markup->CurrentValue, null, false);

        // MarkDown
        $this->MarkDown->setDbValueDef($rsnew, $this->MarkDown->CurrentValue, null, false);

        // ReworkSalePrice
        $this->ReworkSalePrice->setDbValueDef($rsnew, $this->ReworkSalePrice->CurrentValue, null, false);

        // MultipleInput
        $this->MultipleInput->setDbValueDef($rsnew, $this->MultipleInput->CurrentValue, null, false);

        // LpPackageInformation
        $this->LpPackageInformation->setDbValueDef($rsnew, $this->LpPackageInformation->CurrentValue, null, false);

        // AllowNegativeStock
        $this->AllowNegativeStock->setDbValueDef($rsnew, $this->AllowNegativeStock->CurrentValue, null, false);

        // OrderDate
        $this->OrderDate->setDbValueDef($rsnew, UnFormatDateTime($this->OrderDate->CurrentValue, 0), null, false);

        // OrderTime
        $this->OrderTime->setDbValueDef($rsnew, UnFormatDateTime($this->OrderTime->CurrentValue, 0), null, false);

        // RateGroupCode
        $this->RateGroupCode->setDbValueDef($rsnew, $this->RateGroupCode->CurrentValue, null, false);

        // ConversionCaseLot
        $this->ConversionCaseLot->setDbValueDef($rsnew, $this->ConversionCaseLot->CurrentValue, null, false);

        // ShippingLot
        $this->ShippingLot->setDbValueDef($rsnew, $this->ShippingLot->CurrentValue, null, false);

        // AllowExpiryReplacement
        $this->AllowExpiryReplacement->setDbValueDef($rsnew, $this->AllowExpiryReplacement->CurrentValue, 0, false);

        // NoOfMonthExpiryAllowed
        $this->NoOfMonthExpiryAllowed->setDbValueDef($rsnew, $this->NoOfMonthExpiryAllowed->CurrentValue, null, false);

        // ProductDiscountEligibility
        $this->ProductDiscountEligibility->setDbValueDef($rsnew, $this->ProductDiscountEligibility->CurrentValue, null, false);

        // ScheduleTypeCode
        $this->ScheduleTypeCode->setDbValueDef($rsnew, $this->ScheduleTypeCode->CurrentValue, null, false);

        // AIOCDProductCode
        $this->AIOCDProductCode->setDbValueDef($rsnew, $this->AIOCDProductCode->CurrentValue, null, false);

        // FreeQuantity
        $this->FreeQuantity->setDbValueDef($rsnew, $this->FreeQuantity->CurrentValue, null, false);

        // DiscountType
        $this->DiscountType->setDbValueDef($rsnew, $this->DiscountType->CurrentValue, null, false);

        // DiscountValue
        $this->DiscountValue->setDbValueDef($rsnew, $this->DiscountValue->CurrentValue, null, false);

        // HasProductOrderAttribute
        $this->HasProductOrderAttribute->setDbValueDef($rsnew, $this->HasProductOrderAttribute->CurrentValue, null, false);

        // FirstPODate
        $this->FirstPODate->setDbValueDef($rsnew, UnFormatDateTime($this->FirstPODate->CurrentValue, 0), null, false);

        // SaleprcieAndMrpCalcPercent
        $this->SaleprcieAndMrpCalcPercent->setDbValueDef($rsnew, $this->SaleprcieAndMrpCalcPercent->CurrentValue, 0, false);

        // IsGiftVoucherProducts
        $this->IsGiftVoucherProducts->setDbValueDef($rsnew, $this->IsGiftVoucherProducts->CurrentValue, null, false);

        // AcceptRange4SerialNumber
        $this->AcceptRange4SerialNumber->setDbValueDef($rsnew, $this->AcceptRange4SerialNumber->CurrentValue, null, false);

        // GiftVoucherDenomination
        $this->GiftVoucherDenomination->setDbValueDef($rsnew, $this->GiftVoucherDenomination->CurrentValue, null, false);

        // Subclasscode
        $this->Subclasscode->setDbValueDef($rsnew, $this->Subclasscode->CurrentValue, null, false);

        // BarCodeFromWeighingMachine
        $this->BarCodeFromWeighingMachine->setDbValueDef($rsnew, $this->BarCodeFromWeighingMachine->CurrentValue, null, false);

        // CheckCostInReturn
        $this->CheckCostInReturn->setDbValueDef($rsnew, $this->CheckCostInReturn->CurrentValue, null, false);

        // FrequentSaleProduct
        $this->FrequentSaleProduct->setDbValueDef($rsnew, $this->FrequentSaleProduct->CurrentValue, null, false);

        // RateType
        $this->RateType->setDbValueDef($rsnew, $this->RateType->CurrentValue, null, false);

        // TouchscreenName
        $this->TouchscreenName->setDbValueDef($rsnew, $this->TouchscreenName->CurrentValue, null, false);

        // FreeType
        $this->FreeType->setDbValueDef($rsnew, $this->FreeType->CurrentValue, null, false);

        // LooseQtyasNewBatch
        $this->LooseQtyasNewBatch->setDbValueDef($rsnew, $this->LooseQtyasNewBatch->CurrentValue, null, false);

        // AllowSlabBilling
        $this->AllowSlabBilling->setDbValueDef($rsnew, $this->AllowSlabBilling->CurrentValue, null, false);

        // ProductTypeForProduction
        $this->ProductTypeForProduction->setDbValueDef($rsnew, $this->ProductTypeForProduction->CurrentValue, null, false);

        // RecipeCode
        $this->RecipeCode->setDbValueDef($rsnew, $this->RecipeCode->CurrentValue, null, false);

        // DefaultUnitType
        $this->DefaultUnitType->setDbValueDef($rsnew, $this->DefaultUnitType->CurrentValue, null, false);

        // PIstatus
        $this->PIstatus->setDbValueDef($rsnew, $this->PIstatus->CurrentValue, null, false);

        // LastPiConfirmedDate
        $this->LastPiConfirmedDate->setDbValueDef($rsnew, UnFormatDateTime($this->LastPiConfirmedDate->CurrentValue, 0), null, false);

        // BarCodeDesign
        $this->BarCodeDesign->setDbValueDef($rsnew, $this->BarCodeDesign->CurrentValue, null, false);

        // AcceptRemarksInBill
        $this->AcceptRemarksInBill->setDbValueDef($rsnew, $this->AcceptRemarksInBill->CurrentValue, null, false);

        // Classification
        $this->Classification->setDbValueDef($rsnew, $this->Classification->CurrentValue, null, false);

        // TimeSlot
        $this->TimeSlot->setDbValueDef($rsnew, $this->TimeSlot->CurrentValue, null, false);

        // IsBundle
        $this->IsBundle->setDbValueDef($rsnew, $this->IsBundle->CurrentValue, null, false);

        // ColorCode
        $this->ColorCode->setDbValueDef($rsnew, $this->ColorCode->CurrentValue, null, false);

        // GenderCode
        $this->GenderCode->setDbValueDef($rsnew, $this->GenderCode->CurrentValue, null, false);

        // SizeCode
        $this->SizeCode->setDbValueDef($rsnew, $this->SizeCode->CurrentValue, null, false);

        // GiftCard
        $this->GiftCard->setDbValueDef($rsnew, $this->GiftCard->CurrentValue, null, false);

        // ToonLabel
        $this->ToonLabel->setDbValueDef($rsnew, $this->ToonLabel->CurrentValue, null, false);

        // GarmentType
        $this->GarmentType->setDbValueDef($rsnew, $this->GarmentType->CurrentValue, null, false);

        // AgeGroup
        $this->AgeGroup->setDbValueDef($rsnew, $this->AgeGroup->CurrentValue, null, false);

        // Season
        $this->Season->setDbValueDef($rsnew, $this->Season->CurrentValue, null, false);

        // DailyStockEntry
        $this->DailyStockEntry->setDbValueDef($rsnew, $this->DailyStockEntry->CurrentValue, null, false);

        // ModifierApplicable
        $this->ModifierApplicable->setDbValueDef($rsnew, $this->ModifierApplicable->CurrentValue, 0, false);

        // ModifierType
        $this->ModifierType->setDbValueDef($rsnew, $this->ModifierType->CurrentValue, 0, false);

        // AcceptZeroRate
        $this->AcceptZeroRate->setDbValueDef($rsnew, $this->AcceptZeroRate->CurrentValue, 0, false);

        // ExciseDutyCode
        $this->ExciseDutyCode->setDbValueDef($rsnew, $this->ExciseDutyCode->CurrentValue, null, false);

        // IndentProductGroupCode
        $this->IndentProductGroupCode->setDbValueDef($rsnew, $this->IndentProductGroupCode->CurrentValue, null, false);

        // IsMultiBatch
        $this->IsMultiBatch->setDbValueDef($rsnew, $this->IsMultiBatch->CurrentValue, null, false);

        // IsSingleBatch
        $this->IsSingleBatch->setDbValueDef($rsnew, $this->IsSingleBatch->CurrentValue, null, false);

        // MarkUpRate1
        $this->MarkUpRate1->setDbValueDef($rsnew, $this->MarkUpRate1->CurrentValue, null, false);

        // MarkDownRate1
        $this->MarkDownRate1->setDbValueDef($rsnew, $this->MarkDownRate1->CurrentValue, null, false);

        // MarkUpRate2
        $this->MarkUpRate2->setDbValueDef($rsnew, $this->MarkUpRate2->CurrentValue, null, false);

        // MarkDownRate2
        $this->MarkDownRate2->setDbValueDef($rsnew, $this->MarkDownRate2->CurrentValue, null, false);

        // Yield
        $this->_Yield->setDbValueDef($rsnew, $this->_Yield->CurrentValue, null, false);

        // RefProductCode
        $this->RefProductCode->setDbValueDef($rsnew, $this->RefProductCode->CurrentValue, null, false);

        // Volume
        $this->Volume->setDbValueDef($rsnew, $this->Volume->CurrentValue, null, false);

        // MeasurementID
        $this->MeasurementID->setDbValueDef($rsnew, $this->MeasurementID->CurrentValue, null, false);

        // CountryCode
        $this->CountryCode->setDbValueDef($rsnew, $this->CountryCode->CurrentValue, null, false);

        // AcceptWMQty
        $this->AcceptWMQty->setDbValueDef($rsnew, $this->AcceptWMQty->CurrentValue, null, false);

        // SingleBatchBasedOnRate
        $this->SingleBatchBasedOnRate->setDbValueDef($rsnew, $this->SingleBatchBasedOnRate->CurrentValue, null, false);

        // TenderNo
        $this->TenderNo->setDbValueDef($rsnew, $this->TenderNo->CurrentValue, null, false);

        // SingleBillMaximumSoldQtyFiled
        $this->SingleBillMaximumSoldQtyFiled->setDbValueDef($rsnew, $this->SingleBillMaximumSoldQtyFiled->CurrentValue, null, false);

        // Strength1
        $this->Strength1->setDbValueDef($rsnew, $this->Strength1->CurrentValue, null, false);

        // Strength2
        $this->Strength2->setDbValueDef($rsnew, $this->Strength2->CurrentValue, null, false);

        // Strength3
        $this->Strength3->setDbValueDef($rsnew, $this->Strength3->CurrentValue, null, false);

        // Strength4
        $this->Strength4->setDbValueDef($rsnew, $this->Strength4->CurrentValue, null, false);

        // Strength5
        $this->Strength5->setDbValueDef($rsnew, $this->Strength5->CurrentValue, null, false);

        // IngredientCode1
        $this->IngredientCode1->setDbValueDef($rsnew, $this->IngredientCode1->CurrentValue, null, false);

        // IngredientCode2
        $this->IngredientCode2->setDbValueDef($rsnew, $this->IngredientCode2->CurrentValue, null, false);

        // IngredientCode3
        $this->IngredientCode3->setDbValueDef($rsnew, $this->IngredientCode3->CurrentValue, null, false);

        // IngredientCode4
        $this->IngredientCode4->setDbValueDef($rsnew, $this->IngredientCode4->CurrentValue, null, false);

        // IngredientCode5
        $this->IngredientCode5->setDbValueDef($rsnew, $this->IngredientCode5->CurrentValue, null, false);

        // OrderType
        $this->OrderType->setDbValueDef($rsnew, $this->OrderType->CurrentValue, null, false);

        // StockUOM
        $this->StockUOM->setDbValueDef($rsnew, $this->StockUOM->CurrentValue, null, false);

        // PriceUOM
        $this->PriceUOM->setDbValueDef($rsnew, $this->PriceUOM->CurrentValue, null, false);

        // DefaultSaleUOM
        $this->DefaultSaleUOM->setDbValueDef($rsnew, $this->DefaultSaleUOM->CurrentValue, null, false);

        // DefaultPurchaseUOM
        $this->DefaultPurchaseUOM->setDbValueDef($rsnew, $this->DefaultPurchaseUOM->CurrentValue, null, false);

        // ReportingUOM
        $this->ReportingUOM->setDbValueDef($rsnew, $this->ReportingUOM->CurrentValue, null, false);

        // LastPurchasedUOM
        $this->LastPurchasedUOM->setDbValueDef($rsnew, $this->LastPurchasedUOM->CurrentValue, null, false);

        // TreatmentCodes
        $this->TreatmentCodes->setDbValueDef($rsnew, $this->TreatmentCodes->CurrentValue, null, false);

        // InsuranceType
        $this->InsuranceType->setDbValueDef($rsnew, $this->InsuranceType->CurrentValue, null, false);

        // CoverageGroupCodes
        $this->CoverageGroupCodes->setDbValueDef($rsnew, $this->CoverageGroupCodes->CurrentValue, null, false);

        // MultipleUOM
        $this->MultipleUOM->setDbValueDef($rsnew, $this->MultipleUOM->CurrentValue, null, false);

        // SalePriceComputation
        $this->SalePriceComputation->setDbValueDef($rsnew, $this->SalePriceComputation->CurrentValue, null, false);

        // StockCorrection
        $this->StockCorrection->setDbValueDef($rsnew, $this->StockCorrection->CurrentValue, null, false);

        // LBTPercentage
        $this->LBTPercentage->setDbValueDef($rsnew, $this->LBTPercentage->CurrentValue, null, false);

        // SalesCommission
        $this->SalesCommission->setDbValueDef($rsnew, $this->SalesCommission->CurrentValue, null, false);

        // LockedStock
        $this->LockedStock->setDbValueDef($rsnew, $this->LockedStock->CurrentValue, null, false);

        // MinMaxUOM
        $this->MinMaxUOM->setDbValueDef($rsnew, $this->MinMaxUOM->CurrentValue, null, false);

        // ExpiryMfrDateFormat
        $this->ExpiryMfrDateFormat->setDbValueDef($rsnew, $this->ExpiryMfrDateFormat->CurrentValue, null, false);

        // ProductLifeTime
        $this->ProductLifeTime->setDbValueDef($rsnew, $this->ProductLifeTime->CurrentValue, null, false);

        // IsCombo
        $this->IsCombo->setDbValueDef($rsnew, $this->IsCombo->CurrentValue, null, false);

        // ComboTypeCode
        $this->ComboTypeCode->setDbValueDef($rsnew, $this->ComboTypeCode->CurrentValue, null, false);

        // AttributeCount6
        $this->AttributeCount6->setDbValueDef($rsnew, $this->AttributeCount6->CurrentValue, null, false);

        // AttributeCount7
        $this->AttributeCount7->setDbValueDef($rsnew, $this->AttributeCount7->CurrentValue, null, false);

        // AttributeCount8
        $this->AttributeCount8->setDbValueDef($rsnew, $this->AttributeCount8->CurrentValue, null, false);

        // AttributeCount9
        $this->AttributeCount9->setDbValueDef($rsnew, $this->AttributeCount9->CurrentValue, null, false);

        // AttributeCount10
        $this->AttributeCount10->setDbValueDef($rsnew, $this->AttributeCount10->CurrentValue, null, false);

        // LabourCharge
        $this->LabourCharge->setDbValueDef($rsnew, $this->LabourCharge->CurrentValue, null, false);

        // AffectOtherCharge
        $this->AffectOtherCharge->setDbValueDef($rsnew, $this->AffectOtherCharge->CurrentValue, null, false);

        // DosageInfo
        $this->DosageInfo->setDbValueDef($rsnew, $this->DosageInfo->CurrentValue, null, false);

        // DosageType
        $this->DosageType->setDbValueDef($rsnew, $this->DosageType->CurrentValue, null, false);

        // DefaultIndentUOM
        $this->DefaultIndentUOM->setDbValueDef($rsnew, $this->DefaultIndentUOM->CurrentValue, null, false);

        // PromoTag
        $this->PromoTag->setDbValueDef($rsnew, $this->PromoTag->CurrentValue, null, false);

        // BillLevelPromoTag
        $this->BillLevelPromoTag->setDbValueDef($rsnew, $this->BillLevelPromoTag->CurrentValue, null, false);

        // IsMRPProduct
        $this->IsMRPProduct->setDbValueDef($rsnew, $this->IsMRPProduct->CurrentValue, null, false);

        // MrpList
        $this->MrpList->setDbValueDef($rsnew, $this->MrpList->CurrentValue, null, false);

        // AlternateSaleUOM
        $this->AlternateSaleUOM->setDbValueDef($rsnew, $this->AlternateSaleUOM->CurrentValue, null, false);

        // FreeUOM
        $this->FreeUOM->setDbValueDef($rsnew, $this->FreeUOM->CurrentValue, null, false);

        // MarketedCode
        $this->MarketedCode->setDbValueDef($rsnew, $this->MarketedCode->CurrentValue, null, false);

        // MinimumSalePrice
        $this->MinimumSalePrice->setDbValueDef($rsnew, $this->MinimumSalePrice->CurrentValue, null, false);

        // PRate1
        $this->PRate1->setDbValueDef($rsnew, $this->PRate1->CurrentValue, null, false);

        // PRate2
        $this->PRate2->setDbValueDef($rsnew, $this->PRate2->CurrentValue, null, false);

        // LPItemCost
        $this->LPItemCost->setDbValueDef($rsnew, $this->LPItemCost->CurrentValue, null, false);

        // FixedItemCost
        $this->FixedItemCost->setDbValueDef($rsnew, $this->FixedItemCost->CurrentValue, null, false);

        // HSNId
        $this->HSNId->setDbValueDef($rsnew, $this->HSNId->CurrentValue, null, false);

        // TaxInclusive
        $this->TaxInclusive->setDbValueDef($rsnew, $this->TaxInclusive->CurrentValue, null, false);

        // EligibleforWarranty
        $this->EligibleforWarranty->setDbValueDef($rsnew, $this->EligibleforWarranty->CurrentValue, null, false);

        // NoofMonthsWarranty
        $this->NoofMonthsWarranty->setDbValueDef($rsnew, $this->NoofMonthsWarranty->CurrentValue, null, false);

        // ComputeTaxonCost
        $this->ComputeTaxonCost->setDbValueDef($rsnew, $this->ComputeTaxonCost->CurrentValue, null, false);

        // HasEmptyBottleTrack
        $this->HasEmptyBottleTrack->setDbValueDef($rsnew, $this->HasEmptyBottleTrack->CurrentValue, null, false);

        // EmptyBottleReferenceCode
        $this->EmptyBottleReferenceCode->setDbValueDef($rsnew, $this->EmptyBottleReferenceCode->CurrentValue, null, false);

        // AdditionalCESSAmount
        $this->AdditionalCESSAmount->setDbValueDef($rsnew, $this->AdditionalCESSAmount->CurrentValue, null, false);

        // EmptyBottleRate
        $this->EmptyBottleRate->setDbValueDef($rsnew, $this->EmptyBottleRate->CurrentValue, null, false);

        // Call Row Inserting event
        $insertRow = $this->rowInserting($rsold, $rsnew);
        if ($insertRow) {
            $addRow = $this->insert($rsnew);
            if ($addRow) {
            }
        } else {
            if ($this->getSuccessMessage() != "" || $this->getFailureMessage() != "") {
                // Use the message, do nothing
            } elseif ($this->CancelMessage != "") {
                $this->setFailureMessage($this->CancelMessage);
                $this->CancelMessage = "";
            } else {
                $this->setFailureMessage($Language->phrase("InsertCancelled"));
            }
            $addRow = false;
        }
        if ($addRow) {
            // Call Row Inserted event
            $this->rowInserted($rsold, $rsnew);
        }

        // Clean upload path if any
        if ($addRow) {
        }

        // Write JSON for API request
        if (IsApi() && $addRow) {
            $row = $this->getRecordsFromRecordset([$rsnew], true);
            WriteJson(["success" => true, $this->TableVar => $row]);
        }
        return $addRow;
    }

    // Set up Breadcrumb
    protected function setupBreadcrumb()
    {
        global $Breadcrumb, $Language;
        $Breadcrumb = new Breadcrumb("index");
        $url = CurrentUrl();
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("PharmacyProductsList"), "", $this->TableVar, true);
        $pageId = ($this->isCopy()) ? "Copy" : "Add";
        $Breadcrumb->add("add", $pageId, $url);
    }

    // Setup lookup options
    public function setupLookupOptions($fld)
    {
        if ($fld->Lookup !== null && $fld->Lookup->Options === null) {
            // Get default connection and filter
            $conn = $this->getConnection();
            $lookupFilter = "";

            // No need to check any more
            $fld->Lookup->Options = [];

            // Set up lookup SQL and connection
            switch ($fld->FieldVar) {
                default:
                    $lookupFilter = "";
                    break;
            }

            // Always call to Lookup->getSql so that user can setup Lookup->Options in Lookup_Selecting server event
            $sql = $fld->Lookup->getSql(false, "", $lookupFilter, $this);

            // Set up lookup cache
            if ($fld->UseLookupCache && $sql != "" && count($fld->Lookup->Options) == 0) {
                $totalCnt = $this->getRecordCount($sql, $conn);
                if ($totalCnt > $fld->LookupCacheCount) { // Total count > cache count, do not cache
                    return;
                }
                $rows = $conn->executeQuery($sql)->fetchAll(\PDO::FETCH_BOTH);
                $ar = [];
                foreach ($rows as $row) {
                    $row = $fld->Lookup->renderViewRow($row);
                    $ar[strval($row[0])] = $row;
                }
                $fld->Lookup->Options = $ar;
            }
        }
    }

    // Page Load event
    public function pageLoad()
    {
        //Log("Page Load");
    }

    // Page Unload event
    public function pageUnload()
    {
        //Log("Page Unload");
    }

    // Page Redirecting event
    public function pageRedirecting(&$url)
    {
        // Example:
        //$url = "your URL";
    }

    // Message Showing event
    // $type = ''|'success'|'failure'|'warning'
    public function messageShowing(&$msg, $type)
    {
        if ($type == 'success') {
            //$msg = "your success message";
        } elseif ($type == 'failure') {
            //$msg = "your failure message";
        } elseif ($type == 'warning') {
            //$msg = "your warning message";
        } else {
            //$msg = "your message";
        }
    }

    // Page Render event
    public function pageRender()
    {
        //Log("Page Render");
    }

    // Page Data Rendering event
    public function pageDataRendering(&$header)
    {
        // Example:
        //$header = "your header";
    }

    // Page Data Rendered event
    public function pageDataRendered(&$footer)
    {
        // Example:
        //$footer = "your footer";
    }

    // Form Custom Validate event
    public function formCustomValidate(&$customError)
    {
        // Return error message in CustomError
        return true;
    }
}
