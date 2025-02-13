<?php

namespace App\Controllers;


use App\Controllers\BaseController;
use App\ThirdParty\FPDF;
use App\Models\Penghuni_model;
use App\Models\Dokumen_model;

class Export extends BaseController
{
    protected $penghuni;
    protected $dokumen;

    public function __construct()
    {
        $this->penghuni = new Penghuni_model();
        $this->dokumen = new Dokumen_model();
        helper(['tgl_indo']);
    }

    public function index()
    {
        //test
    }
    public function dpk($kode = null)
    {
        $penghuni = $this->penghuni->getDetailPenghuniWithKelKec($kode)->getRowArray();
        $dokumen = $this->dokumen->where(['kode_penghuni' => $kode])->orderBy('namadokumen', 'DESC')->findAll();
        $pdf = new FPDF('P', 'mm', 'A4');
        $pdf->AddPage();
        $width = $pdf->GetPageWidth(); // Width of Current Page
        //judul
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell($width - 20, 8, 'DATA PEMOHON DAN KEPENDUDUKAN', 0, 1, 'C');
        $pdf->Cell($width - 20, 8, '(DPK)', 0, 1, 'C');
        $pdf->Line(10, 30, $width - 10, 30);
        $pdf->Line(10, 31, $width - 10, 31);
        $pdf->ln(20);
        //data
        $pdf->SetFont('Arial', '', 14);
        $data = array(
            array('1. NIK', ': ' . $penghuni['ktp']),
            array('2. Nama Lengkap', ': ' . $penghuni['nama']),
            array('3. Tempat & tanggal lahir', ': ' . $penghuni['tempat_lahir'] . ', ' . tgl_indo2($penghuni['tanggal_lahir'])),
            array('4. Jenis Kelamin', ': ' . $penghuni['jeniskelamin']),
            array('5. Agama', ': ' . $penghuni['agama']),
            array('6. Status Pernikahan', ': ' . $penghuni['statusmenikah']),
            array('7. Alamat', ': ' . $penghuni['alamat']),
            array('', ': Kel ' . $penghuni['nama_kelurahan'] . ', Kec ' . $penghuni['nama_kecamatan'] . ', Kota Bontang'),
            array('9. Nomor Telepon', ': 081359774765'),
        );
        foreach ($data as $value) {
            $pdf->Cell(60, 9, $value[0], 0);
            $pdf->Cell(60, 9, $value[1], 0);
            $pdf->Ln();
        }
        $pdf->ln(8);
        //lampiran
        $pdf->Cell(60, 8, 'Lampiran:', 0, 1);
        foreach ($dokumen as $d) {
            $pdf->SetFont('ZapfDingbats', '', 14);
            $pdf->Cell(20, 9, chr(138) . chr(51) . chr(139), 0, 0, 'R');
            $pdf->SetFont('Arial', '', 14);
            $pdf->Cell(60, 9, $d['namadokumen'], 0);
            $pdf->Ln();
        }
        $pdf->ln(30);
        //ttd
        $pdf->Cell($width / 2, 6, '');
        $pdf->Cell($width / 2 - 20, 6, 'Bontang, ' . tgl_indo2(date('Y-m-d')), 0, 1, 'C');
        $pdf->Cell($width / 2, 6, '');
        $pdf->Cell($width / 2 - 20, 6, 'Pemohon', 0, 1, 'C');
        $pdf->ln(30);
        $pdf->Cell($width / 2, 6, '');
        $pdf->SetFont('Arial', 'u', 14);
        $pdf->Cell($width / 2 - 20, 6, $penghuni['nama'], 0, 1, 'C');
        $this->response->setHeader("Content-Type", "application/pdf");
        $pdf->Output("DPK_" . $penghuni['ktp'] . ".pdf", 'I');
    }
    public function tatatertib($kode = null)
    {
        $penghuni = $this->penghuni->getDetailPenghuniWithKelKec($kode)->getRowArray();
        $pdf = new FPDF('P', 'mm', 'A4');
        $pdf->AddPage();
        $width = $pdf->GetPageWidth(); // Width of Current Page
        //judul
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell($width - 20, 7, 'TATA TERTIB PENGHUNIAN', 0, 1, 'C');
        $pdf->Cell($width - 20, 7, 'RUMAH SUSUN SEDERHANA SEWA (RUSUNAWA)', 0, 1, 'C');
        $pdf->Line(10, 28, $width - 10, 28);
        $pdf->Line(10, 29, $width - 10, 29);
        $pdf->ln(10);
        //data
        $pdf->SetFont('Arial', '', 11.5);
        $data = array(
            array('1.', 'Penghuni adalah penyewa yang ditetapkan berdasarkan perjanjian sewa.'),
            array('2.', 'Tempat penghunian luas 24 m2 hanya diperkenankan dihuni maksimum 4 orang atau 2 orang dewasa dan 2 anak, dengan usia anak maksimal 15 tahun.'),
            array('3.', 'Menciptakan keamanan dan estetika (kebersihan dan kerapihan) tempat dan lingkungan hunian.'),
            array('4.', 'Apabila meninggalkan tempat, listrik sebaiknya dipadamkan, pastikan kran air dan gas tertutup.'),
            array('5.', 'Menjaga suara radio dan televisi jangan sampai mengganggu tetangga.'),
            array('6.', 'Bagi penghuni rusunawa yang meninggalkan/mengosongkan tenpat hunian untuk sementara harus melaporkan kepada Ketua Lingkungan dan badan Pengelola.'),
            array('7.', 'Menjalin hubungan kekeluargaan antara sesama penghuni dan menjaga kebersihan lingkungan Rusunawa.'),
            array('8.', 'Pengerjaan peralatan, perbaikan/renovasi yang bersifat umum, harus seijin Badan Pengelola.'),
            array('9.', 'Saling menjaga dan menginformasikan kepada pengelola, jika mengetahui adanya kegiatan atatu transaksi atau memakai dan/ atau penyalahgunaan narkotika dan obat-obat terlarang, yang dilarang oleh peraturan perundang-undangan.'),
            array('10.', 'Perjanjian penghunian dibuat jangka waktu 1 tahun dan bisa diperpanjang sebanyak-banyaknya dua kali.'),
            array('11.', 'Penghuni/tamu penghuni yang membawa kendaraan menempatkan pada tempat parkir/lokasi yang telah ditetapkan.'),
            array('12.', 'Tidak diperbolehkan memanfaatkan ruang terbuka untuk meletakkan dan menumpuk barang atau sejenisnya.'),
            array('13.', 'Bersedia mematuhi ketentuan yang ditetapkan oleh pengelola.'),
            array('14.', 'Dilarang berbuat onar dan tindakan tercela lainnya.'),
            array('15.', 'Dilarang memelihara hewan peliharaan anjing, kucing, binatang primata, binatang liar lainnya, kecuali burung dalam sangkar, ikan di dalam aquarium.'),
            array('16.', 'Penghuni rusunawa tidak diperkenankan membawa tamu (wanita/pria) ke dalam satuan rusunawa untuk diinapkan.'),
            array('17.', 'Penghuni satuan Rusunawa dilarang melakukan perbuatan maksiat di dalam satuan Rusunawa dan jika diketahui oleh pengelola, maka penghuni bersedia untuk dikeluarkan dari daftar penghuni satuan Rusunawa setelah memenuhi kewajiban.'),
            array('18.', 'Penghuni satuan Rusunawa tidak boleh mengalihkan hak sewa kepada pihak lain atau menyewakan kembali kepada pihak lain.'),
            array('19.', 'Satuan Rusunawa tidak boleh dialih fungsikan menjadi gudang atau tempat penumpukan barang sejenisnya.'),
            array('20.', 'Ketentuan-ketentuan lain yang diatur dalam Perjanjian Sewa Menyewa Rusunawa dan diberlakukan oleh Badan Pengelola.'),
        );
        foreach ($data as $value) {
            $pdf->Cell(8, 5.5, $value[0]);
            $pdf->SetLeftMargin(10);
            $pdf->multiCell($width - 30, 5.5, $value[1]);
        }
        $pdf->ln(8);
        //ttd
        $pdf->Cell($width / 2, 6, '');
        $pdf->Cell($width / 2 - 20, 6, 'Bontang, ' . tgl_indo2(date('Y-m-d')), 0, 1, 'C');
        $pdf->Cell($width / 2, 6, '');
        $pdf->Cell($width / 2 - 20, 6, 'Pemohon', 0, 1, 'C');
        $pdf->ln(20);
        $pdf->Cell($width / 2, 6, '');
        $pdf->SetFont('Arial', 'u', 11.5);
        $pdf->Cell($width / 2 - 20, 6, $penghuni['nama'], 0, 1, 'C');
        $this->response->setHeader("Content-Type", "application/pdf");
        $pdf->Output("PERSETUJUAN_TATIB_" . $penghuni['ktp'] . ".pdf", 'I');
    }
}
