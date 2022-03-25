<?php

namespace PHPMaker2021\HIMS;

/**
 * Class for export to Word by PHPWord
 */
class ExportPhpWord extends ExportBase
{
    protected $PhpWord;
    protected $Section;
    protected $CellWidth;
    protected $StyleTable;
    protected $PhpWordTbl;
    protected $RowType;
    public static $MaxImageWidth = 250; // Max image width

    // Constructor
    public function __construct(&$tbl, $style = "")
    {
        parent::__construct($tbl, $style);
        $this->PhpWord = new \PhpOffice\PhpWord\PhpWord();
        $this->Section = $this->PhpWord->createSection(["orientation" => $tbl->ExportWordPageOrientation]);
        $this->CellWidth = $tbl->ExportWordColumnWidth;
        $this->StyleTable = ["borderSize" => 6, "borderColor" => "A9A9A9", "cellMargin" => 60]; // Customize table cell styles here
        $this->PhpWord->addTableStyle("phpWord", $this->StyleTable);
        $this->PhpWordTbl = $this->Section->addTable("phpWord");
    }

    // Convert to UTF-8
    protected function convertToUtf8($value)
    {
        $value = RemoveHtml($value);
        $value = HtmlDecode($value);
        $value = HtmlEncode($value);
        return ConvertToUtf8($value);
    }

    // Table header
    public function exportTableHeader()
    {
    }

    // Field aggregate
    public function exportAggregate(&$fld, $type)
    {
        if (!$fld->Exportable) {
            return;
        }
        $this->FldCnt++;
        if ($this->Horizontal) {
            global $Language;
            if ($this->FldCnt == 1) {
                $this->PhpWordTbl->addRow(0);
            }
            $val = "";
            if (in_array($type, ["TOTAL", "COUNT", "AVERAGE"])) {
                $val = $Language->phrase($type) . ": " . $this->convertToUtf8($fld->exportValue());
            }
            $this->PhpWordTbl->addCell($this->CellWidth, ["gridSpan" => 1])->addText(trim($val));
        }
    }

    // Field caption
    public function exportCaption(&$fld)
    {
        if (!$fld->Exportable) {
            return;
        }
        $this->FldCnt++;
        $this->exportCaptionBy($fld, $this->FldCnt - 1, $this->RowCnt);
    }

    // Field caption by column and row
    public function exportCaptionBy(&$fld, $col, $row)
    {
        if ($col == 0) {
            $this->PhpWordTbl->addRow(0);
        }
        $val = $this->convertToUtf8($fld->exportCaption());
        $this->PhpWordTbl->addCell($this->CellWidth, ["gridSpan" => 1, "bgColor" => "E4E4E4"])->addText(trim($val), ["bold" => true]); // Customize table header cell styles here
    }

    // Field value by column and row
    public function exportValueBy(&$fld, $col, $row)
    {
        if ($col == 0) {
            $this->PhpWordTbl->addRow(0);
        }
        $val = "";
        $maxImageWidth = self::$MaxImageWidth;
        if ($fld->ExportFieldImage && $fld->ViewTag == "IMAGE") { // Image
            $imagefn = $fld->getTempImage();
            $cell = $this->PhpWordTbl->addCell($this->CellWidth);
            if (!$fld->UploadMultiple || !ContainsString($imagefn, ",")) {
                $fn = ServerMapPath($imagefn, true);
                if ($imagefn != "" && file_exists($fn) && !is_dir($fn)) {
                    $size = @getimagesize($fn);
                    $style = [];
                    if ($maxImageWidth > 0 && @$size[0] > $maxImageWidth) {
                        $style["width"] = $maxImageWidth;
                        $style["height"] = $maxImageWidth / $size[0] * $size[1];
                    }
                    $cell->addImage($fn, $style);
                }
            } else {
                $ar = explode(",", $imagefn);
                foreach ($ar as $imagefn) {
                    $fn = ServerMapPath($imagefn, true);
                    if ($imagefn != "" && file_exists($fn) && !is_dir($fn)) {
                        $size = @getimagesize($fn);
                        $style = [];
                        if ($maxImageWidth > 0 && @$size[0] > $maxImageWidth) {
                            $style["width"] = $maxImageWidth;
                            $style["height"] = $maxImageWidth / $size[0] * $size[1];
                        }
                        $cell->addImage($fn, $style);
                    }
                }
            }
        } elseif ($fld->ExportFieldImage && $fld->ExportHrefValue != "") { // Export custom view tag
            $imagefn = $fld->ExportHrefValue;
            $cell = $this->PhpWordTbl->addCell($this->CellWidth);
            $fn = ServerMapPath($imagefn, true);
            if ($imagefn != "" && file_exists($fn) && !is_dir($fn)) {
                $size = @getimagesize($fn);
                $style = [];
                if ($maxImageWidth > 0 && @$size[0] > $maxImageWidth) {
                    $style["width"] = $maxImageWidth;
                    $style["height"] = $maxImageWidth / $size[0] * $size[1];
                }
                $cell->addImage($fn, $style);
            }
        } else { // Formatted Text
            $val = $this->convertToUtf8($fld->exportValue());
            if ($this->RowType > 0) { // Not table header/footer
                if (in_array($fld->Type, [4, 5, 6, 14, 131])) { // If float or currency
                    $val = $this->convertToUtf8($fld->CurrentValue); // Use original value instead of formatted value
                }
            }
            $this->PhpWordTbl->addCell($this->CellWidth, ["gridSpan" => 1])->addText(trim($val));
        }
    }

    // Begin a row
    public function beginExportRow($rowCnt = 0, $useStyle = true)
    {
        $this->RowCnt++;
        $this->FldCnt = 0;
        $this->RowType = $rowCnt;
    }

    // End a row
    public function endExportRow($rowcnt = 0)
    {
    }

    // Empty row
    public function exportEmptyRow()
    {
        $this->RowCnt++;
    }

    // Page break
    public function exportPageBreak()
    {
    }

    // Export a field
    public function exportField(&$fld)
    {
        if (!$fld->Exportable) {
            return;
        }
        $this->FldCnt++;
        if ($this->Horizontal) {
            $this->exportValueBy($fld, $this->FldCnt - 1, $this->RowCnt);
        } else { // Vertical, export as a row
            $this->RowCnt++;
            $this->exportCaptionBy($fld, 0, $this->RowCnt);
            $this->exportValueBy($fld, 1, $this->RowCnt);
        }
    }

    // Table footer
    public function exportTableFooter()
    {
    }

    // Add HTML tags
    public function exportHeaderAndFooter()
    {
    }

    // Export
    public function export()
    {
        global $ExportFileName;
        if (!Config("DEBUG") && ob_get_length()) {
            ob_end_clean();
        }
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        header('Content-Disposition: attachment; filename=' . $ExportFileName . '.docx');
        header('Cache-Control: max-age=0');
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($this->PhpWord, 'Word2007');
        @$objWriter->save('php://output');
        DeleteTempImages();
    }

    // Destructor
    public function __destruct()
    {
        DeleteTempImages();
    }
}
