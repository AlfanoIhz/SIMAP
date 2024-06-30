<?php
require('../fpdf/fpdf.php');
include '../php/koneksi.php'; // Include your database connection

// Fetch report details based on ID
$id = (int)$_GET['id'];
$sql_fetch_report = "SELECT * FROM laporan_aset WHERE id = $id";
$result_report = mysqli_query($mysqli, $sql_fetch_report);
$report = mysqli_fetch_assoc($result_report);

// Fetch assets based on report details
$sql_fetch_assets = "SELECT * FROM aset WHERE departemen = '{$report['departemen']}' AND MONTH(tanggalMasuk) = {$report['bulan']} AND YEAR(tanggalMasuk) = {$report['tahun']}";
$result_assets = mysqli_query($mysqli, $sql_fetch_assets);

class PDF extends FPDF {
    // Define column widths
    private $widths = array(20, 40, 40, 20, 40, 30);

    // Header function
    function Header() {
        global $report;
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(0, 10,  $report['judul'], 0, 1, 'C');
        $this->Cell(0, 10, 'Departemen: ' . $report['departemen'], 0, 1, 'L');
        $this->Cell(0, 10, 'Tahun: ' . $report['tahun'], 0, 1, 'L');
        $this->Ln(10);
    }

    // Footer function
    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');
    }

    // Table header function
    function TableHeader($header) {
        $this->SetFont('Arial', 'B', 12);
        $this->SetFillColor(74, 85, 162); // Set the fill color for the header
        foreach ($header as $i => $col) {
            $this->Cell($this->widths[$i], 7, $col, 1, 0, 'C', true); // The last parameter `true` enables the fill color
        }
        $this->Ln();
    }

    // Check if page break is needed
    function CheckPageBreak($h) {
        if($this->GetY() + $h > $this->PageBreakTrigger) {
            $this->AddPage($this->CurOrientation);
            $this->TableHeader(array('ID Aset', 'Nama Aset', 'Kategori Aset', 'Jumlah', 'Departemen', 'Tanggal Masuk'));
        }
    }

    // Row function
    function Row($data) {
        $nb = 0;
        foreach($data as $i => $col) {
            $nb = max($nb, $this->NbLines($this->widths[$i], $col));
        }
        $h = 6 * $nb;
        $this->CheckPageBreak($h);
        foreach($data as $i => $col) {
            $this->Cell($this->widths[$i], 6, $col, 1);
        }
        $this->Ln();
    }

    // Number of lines a MultiCell will take
    function NbLines($w, $txt) {
        $cw = &$this->CurrentFont['cw'];
        if($w == 0) {
            $w = $this->w - $this->rMargin - $this->x;
        }
        $wmax = ($w - 2 * $this->cMargin) * 1000 / $this->FontSize;
        $s = str_replace("\r", '', $txt);
        $nb = strlen($s);
        if($nb > 0 && $s[$nb-1] == "\n") {
            $nb--;
        }
        $sep = -1;
        $i = 0;
        $j = 0;
        $l = 0;
        $nl = 1;
        while($i < $nb) {
            $c = $s[$i];
            if($c == "\n") {
                $i++;
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
                continue;
            }
            if($c == ' ') {
                $sep = $i;
            }
            $l += $cw[$c];
            if($l > $wmax) {
                if($sep == -1) {
                    if($i == $j) {
                        $i++;
                    }
                } else {
                    $i = $sep + 1;
                }
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
            } else {
                $i++;
            }
        }
        return $nl;
    }

    // Main table function
    function ReportTable($header, $data) {
        $this->TableHeader($header);
        foreach ($data as $row) {
            $this->Row($row);
        }
    }
}

$pdf = new PDF();
$pdf->AddPage();
$header = array('ID Aset', 'Nama Aset', 'Kategori Aset', 'Jumlah', 'Departemen', 'Tanggal Masuk');
$data = array();
while ($row = mysqli_fetch_assoc($result_assets)) {
    $data[] = array($row['idAset'], $row['namaAset'], $row['kategoriAset'], $row['jumlah'], $row['departemen'], $row['tanggalMasuk']);
}
$pdf->ReportTable($header, $data);

$pdf->Output('D', 'report_' . $id . '.pdf'); // The 'D' parameter forces a download prompt
?>
