<?php

namespace PHPMaker2021\HIMS;

/**
 * Export to Excel
 */
class ExportReportWord
{
    public static $TableStyle = ["borderSize" => 6, "borderColor" => "A9A9A9", "cellMargin" => 60];
    public static $NoBorderTableStyle = ["cellMargin" => 30];
    public static $TableHeaderCellStyle = ["bgColor" => "E4E4E4"];
    public static $TableHeaderFontStyle = ["bold" => true];
    public static $SpaceAfter = ["spaceAfter" => 0];
    public static $TextBreakStyle = ["lineHeight" => 1];

    // Export
    public function __invoke($page, $html)
    {
        global $ExportFileName;
        $doc = new \DOMDocument();
        $html = preg_replace('/<meta\b(?:[^"\'>]|"[^"]*"|\'[^\']*\')*>/i', "", $html); // Remove meta tags
        @$doc->loadHTML('<?xml encoding="uft-8">' . ConvertToUtf8($html)); // Convert to utf-8
        $tables = $doc->getElementsByTagName("table");
        $phpword = new \PhpOffice\PhpWord\PhpWord();
        $section = $phpword->createSection(["orientation" => $page->ExportWordPageOrientation]);
        $cellwidth = $page->ExportWordColumnWidth;
        $div = $doc->getElementById("ew-filter-list");
        if ($div) {
            $parent = $div->parentNode;
            $cls = $parent->getAttribute("class");
            if (preg_match('/\bd-none\b/', $cls)) {
                $div2 = $doc->getElementById("ew-current-date");
                if ($div2) {
                    $value = trim($div2->textContent);
                    $section->addText($value);
                }
                $div2 = $doc->getElementById("ew-current-filters");
                if ($div2) {
                    $value = trim($div2->textContent);
                    $section->addText($value);
                }
                $spans = $div->getElementsByTagName("span");
                $spancnt = $spans->length;
                for ($i = 0; $i < $spancnt; $i++) {
                    $span = $spans->item($i);
                    $class = $span->getAttribute("class");
                    if ($class == "ew-filter-caption") {
                        $caption = trim($span->textContent);
                        $i++;
                        $span = $spans->item($i);
                        $class = $span->getAttribute("class");
                        if ($class == "ew-filter-value") {
                            $value = trim($span->textContent);
                            $section->addText($caption . ": " . $value);
                        }
                    }
                }
            }
        }
        $phpword->addTableStyle("phpWord", self::$TableStyle);
        $phpword->addTableStyle("phpWordNoBorder", self::$NoBorderTableStyle);
        for ($n = 0; $n < $tables->length; $n++) {
            $table = $tables->item($n);
            $tableclass = $table->getAttribute("class");
            $type = "";
            if (ContainsText($tableclass, "ew-table")) {
                $type = "table";
            } elseif (ContainsText($tableclass, "ew-chart")) {
                $type = "chart";
            }
            if ($type == "table" || $type == "chart") {
                // Add page break
                if ($type == "chart" && $page->ExportChartPageBreak && $table->getAttribute("data-page-break") == "before") { // Chart (before)
                    $section->addPageBreak();
                }
                if ($type == "chart") {
                    $images = $table->getElementsByTagName("img");
                    $cnt = $images->length;
                    for ($m = 0; $m < $cnt; $m++) {
                        $imagefn = $images->item($m)->getAttribute("src");
                        if (file_exists($imagefn)) {
                            $size = getimagesize($imagefn);
                            if ($size[0] != 0) {
                                $settings = $section->getSettings();
                                $factor = \PhpOffice\PhpWord\Shared\Converter::INCH_TO_PIXEL / \PhpOffice\PhpWord\Shared\Converter::INCH_TO_TWIP; // 96/1440
                                $w = min($size[0], ($settings->getPageSizeW() - $settings->getMarginLeft() - $settings->getMarginRight()) * $factor);
                                $h = $w / $size[0] * $size[1];
                                $section->addImage($imagefn, ["width" => $w, "height" => $h]);
                            } else {
                                $section->addImage($imagefn);
                            }
                        }
                    }
                } elseif ($type == "table") {
                    $noBorder = ContainsText($tableclass, "no-border");
                    $tbl = $section->addTable($noBorder ? "phpWordNoBorder" : "phpWord");
                    $rows = $table->getElementsByTagName("tr");
                    $rowcnt = $rows->length;
                    for ($i = 0; $i < $rowcnt; $i++) {
                        $row = $rows->item($i);
                        if (!($row->parentNode->tagName == "table" && $row->parentNode->getAttribute("class") == "ew-table-header-btn")) {
                            $cells = $row->childNodes;
                            $cellcnt = $cells->length;
                            $tbl->addRow(0);
                            for ($j = 0; $j < $cellcnt; $j++) {
                                $cell = $cells->item($j);
                                if ($cell->nodeType != XML_ELEMENT_NODE || $cell->tagName != "td" && $cell->tagName != "th") {
                                    continue;
                                }
                                $k = 1;
                                if ($cell->hasAttribute("colspan")) {
                                    $k = intval($cell->getAttribute("colspan"));
                                }
                                $images = $cell->getElementsByTagName("img");
                                if ($images->length >= 1) { // Image
                                    $cell = $tbl->addCell($cellwidth);
                                    $cnt = $images->length;
                                    for ($m = 0; $m < $cnt; $m++) {
                                        $imagefn = $images->item($m)->getAttribute("src");
                                        if (file_exists($imagefn)) {
                                            $cell->addImage($imagefn);
                                        }
                                    }
                                } else { // Text
                                    $text = htmlspecialchars(trim($cell->textContent), ENT_NOQUOTES);
                                    $text = preg_replace(['/[\r\n\t]+:/', '/[\r\n\t]+\(/'], [":", " ("], trim($text)); // Replace extra whitespaces before ":" and "("
                                    if ($row->parentNode->tagName == "thead") { // Caption
                                        $cellStyle = self::$TableHeaderCellStyle;
                                        $cellStyle["gridSpan"] = $k;
                                        $tbl->addCell($cellwidth, $cellStyle)->addText($text, self::$TableHeaderFontStyle, self::$SpaceAfter); // Customize table header cell styles here
                                    } else {
                                        $tbl->addCell($cellwidth, ["gridSpan" => $k])->addText($text, [], self::$SpaceAfter);
                                    }
                                }
                            }
                        }
                    }
                }

                // Last
                if ($n == $tables->length - 1) {
                    break;
                }

                // Add page break
                if ($type == "chart" && $page->ExportChartPageBreak && $table->getAttribute("data-page-break") == "after") { // Chart (after)
                    $section->addPageBreak();
                    continue;
                } elseif ($type == "table") { // Table
                    $node = $table->parentNode;
                    while ($node && $node->getAttribute("class") && !ContainsText($node->getAttribute("class"), "ew-grid")) {
                        $node = $node->parentNode;
                    }
                    if ($node) {
                        $node = $node->nextSibling;
                        while ($node && $node->nodeType != XML_ELEMENT_NODE) {
                            $node = $node->nextSibling;
                        }
                        if ($node && $node->getAttribute("class") && $node->getAttribute("class") == "ew-page-break") {
                            $section->addPageBreak();
                            continue;
                        }
                    }
                }

                // Add text break
                $node = $table->nextSibling;
                while ($node && $node->nodeType != XML_ELEMENT_NODE) {
                    $node = $node->nextSibling;
                }
                if ($node && SameText($node->nodeName, "br")) {
                    $section->addTextBreak(1, null, self::$TextBreakStyle);
                }
            }
        }
        if (!Config("DEBUG") && ob_get_length()) {
            ob_end_clean();
        }
        header("Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document");
        header("Content-Disposition: attachment; filename=" . $ExportFileName . ".docx");
        header("Cache-Control: max-age=0");
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpword, "Word2007");
        @$objWriter->save("php://output");
        DeleteTempImages();
        exit();
    }
}
