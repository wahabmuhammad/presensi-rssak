<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Slip Gaji</title>
    <style>
        body {
            font-family: "Times New Roman", serif;
            font-size: 13px;
            color: #000;
        }

        .slip-container {
            width: 800px;
            margin: auto;
            border: 2px solid #000;
            padding: 15px;
        }

        .header {
            width: 100%;
            margin-bottom: 15px;
        }

        .header table {
            width: 100%;
        }

        .header td {
            vertical-align: top;
        }

        .title {
            font-weight: bold;
            text-transform: uppercase;
        }

        .content {
            width: 100%;
            margin-top: 10px;
        }

        .content table {
            width: 100%;
            border-collapse: collapse;
        }

        .content th {
            text-align: left;
            padding-bottom: 5px;
        }

        .content td {
            padding: 3px 0;
        }

        .right {
            text-align: right;
        }

        .bold {
            font-weight: bold;
        }

        .total {
            border-top: 1px solid #000;
            font-weight: bold;
        }

        .box-total {
            border: 1px solid #000;
            margin-top: 10px;
            padding: 5px;
            font-weight: bold;
        }

        .footer {
            margin-top: 50px;
            text-align: center;
        }

        @media print {
            body {
                margin: 0;
            }
        }
    </style>
</head>

<body>

    <div class="slip-container">

        {{-- HEADER --}}
        <div class="header">
            <table>
                <tr>
                    <td width="55%">
                        <div class="title">RS SARKIES AISYIYAH KUDUS</div>
                        <div class="title">SLIP GAJI KARYAWAN</div>
                        <div class="title">BULAN DESEMBER 2025</div>
                    </td>
                    <td width="45%">
                        <table>
                            <tr>
                                <td>No</td>
                                <td>: {{ $no ?? 7 }}</td>
                            </tr>
                            <tr>
                                <td>NPP</td>
                                <td>: {{ $npp ?? '2385007' }}</td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td>: {{ $nama ?? 'Munawati, Amd.Keb' }}</td>
                            </tr>
                            <tr>
                                <td>Jab/Bag</td>
                                <td>: {{ $jabatan ?? 'Manajer Penunjang Medik' }}</td>
                            </tr>
                            <tr>
                                <td>Gol/Ruang</td>
                                <td>: {{ $gol ?? 'III B / 9 th' }}</td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>: {{ $status ?? 'PT' }}</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>

        {{-- CONTENT --}}
        <div class="content">
            <table>
                <tr>
                    <th width="50%">Gaji</th>
                    <th width="50%">Potongan</th>
                </tr>
                <tr>
                    {{-- GAJI --}}
                    <td style="padding: 2%">
                        <table width="100%">
                            <tr>
                                <td>Gaji Pokok</td>
                                <td class="right">3.287.000</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="bold">Tunjangan</td>
                            </tr>
                            <tr>
                                <td>Tunj. Suami / Istri</td>
                                <td class="right">164.350</td>
                            </tr>
                            <tr>
                                <td>Tunj. Anak</td>
                                <td class="right">131.480</td>
                            </tr>
                            <tr>
                                <td>Tunj. Pangan</td>
                                <td class="right">200.000</td>
                            </tr>
                            <tr>
                                <td>Tunj. Fungsional</td>
                                <td class="right">325.000</td>
                            </tr>
                            <tr>
                                <td>Tunj. Jabatan</td>
                                <td class="right">2.000.000</td>
                            </tr>
                            <tr>
                                <td>Tunj. Kinerja</td>
                                <td class="right">1.500.000</td>
                            </tr>
                            <tr>
                                <td>BPJS KS</td>
                                <td class="right">126.383</td>
                            </tr>
                            <tr>
                                <td>BPJS TK</td>
                                <td class="right">167.262</td>
                            </tr>
                            <tr class="total">
                                <td>Jumlah</td>
                                <td class="right">7.901.475</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="bold" style="margin-top: 3%">Lembur</td>
                            </tr>
                        </table>
                    </td>

                    {{-- POTONGAN --}}
                    <td style="padding: 2%">
                        <table width="100%">
                            <tr>
                                <td>Lazismu</td>
                                <td class="right">190.196</td>
                            </tr>
                            <tr>
                                <td>Obat, Periksa & Logistik</td>
                                <td class="right">74.883</td>
                            </tr>
                            <tr>
                                <td>Koperasi</td>
                                <td class="right">1.111.000</td>
                            </tr>
                            <tr>
                                <td>Aisyiyah</td>
                                <td class="right">5.000</td>
                            </tr>
                            <tr>
                                <td>PAY</td>
                                <td class="right">-</td>
                            </tr>
                            <tr>
                                <td>Kas Unit</td>
                                <td class="right">-</td>
                            </tr>
                            <tr>
                                <td>PPNI</td>
                                <td class="right">-</td>
                            </tr>
                            <tr>
                                <td>IBI</td>
                                <td class="right">25.000</td>
                            </tr>
                            <tr>
                                <td>Lain-lain</td>
                                <td class="right">50.000</td>
                            </tr>
                            <tr>
                                <td>BPJS KS-RSSA</td>
                                <td class="right">126.383</td>
                            </tr>
                            <tr>
                                <td>BPJS KS-Pegawai</td>
                                <td class="right">63.192</td>
                            </tr>
                            <tr>
                                <td>BPJS TK-RSSA</td>
                                <td class="right">167.262</td>
                            </tr>
                            <tr>
                                <td>BPJS TK-Pegawai</td>
                                <td class="right">80.415</td>
                            </tr>
                            <tr>
                                <td>PPH Pasal 21</td>
                                <td class="right">-</td>
                            </tr>
                            <tr>
                                <td>Kredit BRI & BPD</td>
                                <td class="right">-</td>
                            </tr>
                            <tr class="total">
                                <td>Jumlah Potongan</td>
                                <td class="right">1.893.330</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

            <div class="box-total">
                <table width="100%">
                    <tr>
                        <td>Jumlah Gaji</td>
                        <td class="right">7.901.475</td>
                    </tr>
                    <tr>
                        <td>Jumlah Potongan</td>
                        <td class="right">1.893.330</td>
                    </tr>
                    <tr>
                        <td>Gaji - Potongan</td>
                        <td class="right">6.008.145</td>
                    </tr>
                    <tr>
                        <td>Pembulatan</td>
                        <td class="right">855</td>
                    </tr>
                    <tr>
                        <td class="bold">Gaji yang Diterima</td>
                        <td class="right bold">6.009.000</td>
                    </tr>
                </table>
            </div>
        </div>

        {{-- FOOTER --}}
        <div class="footer">
            Kudus, Desember 2025<br>
            Mengetahui,<br>
            Manajer Umum<br><br><br>
            <u>Aulia Zumrotus Sholikah, SKM</u>
        </div>
        <div class="footer">
            Kudus, Desember 2025<br>
            Mengetahui,<br>
            Manajer Umum<br><br><br>
            <u>Monika Anggelina, A.Md.Kep</u>
        </div>   
    </div>

</body>

</html>
