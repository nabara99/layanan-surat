<!DOCTYPE html>
<html lang="id">

<?php
use Carbon\Carbon;
setlocale(LC_TIME, 'id_ID');
?>

<head>
    <meta charset="UTF-8">
    <title>Surat Layanan</title>
</head>

<body style="font-family: Arial, sans-serif;">

    <!-- Kop Surat -->
    <table border="0" style="width: 100%; font-family: Arial;">
        <tr>
            <td rowspan="4" style="width: 80px; text-align: center; padding-left: 25px; ">
                <img src="{{ asset('img/logo.png') }}" alt="logo" width="70">
            </td>
            <td style="text-align: center; font-size: 14pt;">
                <b>PEMERINTAH KABUPATEN TANAH BUMBU</b>
            </td>
        </tr>
        <tr>
            <td style="text-align: center; font-size: 14pt;">
                <b>KECAMATAN TELUK KEPAYANG</b>
            </td>
        </tr>
        <tr>
            <td style="text-align: center; font-size: 16pt;">
                <b>DESA TAPUS</b>
            </td>
        </tr>
        <tr>
            <td style="text-align: center; font-size: 9pt;">
                Alamat: Jl. Batu Amparan RT.04 Desa Tapus Kecamatan Teluk Kepayang <br>
                Kabupaten Tanah Bumbu KP 72272 Email : desatapushebat04@gmail.com
            </td>
        </tr>
    </table>

    <!-- Garis bawah kop -->
    <hr style="border: 1px solid #000; margin: 4px 40px;">

    <!-- Judul Surat -->
    <div style="text-align: center; font-size: 12pt; margin-top: 10px;">
        <b><u>{{ strtoupper($layanan->jenisLayanan->nama_layanan) }}
        </u></b><br>
    </div>

    <!-- Isi Surat -->
    <p style="font-size: 10pt; text-align: justify; margin: 20px 40px 10px 40px;">
        Yang bertanda tangan di bawah ini Kepala Desa Tapus Kecamatan Teluk Kepayang Kabupaten Tanah Bumbu,
        dengan ini menerangkan dengan sebenarnya bahwa :
    </p>

    <!-- Data Penduduk -->
    <table border="0" style="width: 100%; font-size: 10pt; margin-left: 40px; margin-right: 40px;">
        <tr><td>Nama</td><td>: {{ $layanan->nama }}</td></tr>
        <tr><td>Tempat, Tanggal Lahir</td><td>: {{ $layanan->tempat }}, {{ Carbon::parse($layanan->tanggal)->locale('id')->translatedFormat('d F Y') }}</td></tr>
        <tr><td>Jenis Kelamin</td><td>: {{ $layanan->jenis_kelamin }}</td></tr>
        <tr><td style="width: 200px;">NIK</td><td>: {{ $layanan->nik ?? '-' }}</td></tr>
        <tr><td>Agama</td><td>: {{ $layanan->agama }}</td></tr>
        <tr><td>Pekerjaan</td><td>: {{ $layanan->pekerjaan ?? '-' }}</td></tr>
        <tr><td>Status Perkawinan</td><td>: {{ $layanan->status_perkawinan }}</td></tr>
        <tr><td>Alamat</td><td>: {{ $layanan->alamat }}</td></tr>
    </table>

    @if ($layanan->jenisLayanan->initial_name == 'SKK')
    <br>

    @else

    @endif

    @if ($layanan->jenisLayanan->initial_name == 'SKKB')
         <table border="0" style="width: 100%; font-size: 10pt; margin-left: 40px; margin-right: 40px;">
        <tr>
            <td style="width: 200px ">Keperluan</td><td>: {{ $layanan->keperluan }}</td>
        </tr>
         </table>
     @else

     @endif

     @if ($layanan->jenisLayanan->initial_name == 'SKKB')
         <p style="font-size: 10pt; text-align: justify; margin: 20px 40px;">
            Warga yang namanya tersebut diatas dalam pengamatan kami dilingkungan desa, bahwa dalam tingkah laku dan <br>
            pergaulan sehari-hari di masyarakat termasuk orang yang baik-baik
        </p>

     @else

     @endif
    @if ($layanan->jenisLayanan->initial_name == 'SPPK')
        <p style="font-size: 10pt; text-align: justify; margin: 20px 40px;">
            Mohon dibuatkan Kartu Tanda Penduduk atas nama tersebut di atas menurut keterangan RT
            dan pengamatan kami, warga tersebut benar belum pernah membuat/rekam E-KTP di Desa Tapus Kecamatan Teluk Kepayang Kabupaten Tanah Bumbu.
        </p>
    @elseif ($layanan->jenisLayanan->initial_name == 'SKK')
        <table border="0" style="width: 100%; font-size: 10pt; margin-left: 40px; margin-right: 40px;">
            <tr>
                <td style="width: 200px"> Telah Meninggal Dunia Pada :</td>
            </tr>
        </table>
         <table border="0" style="width: 100%; font-size: 10pt; margin-left: 40px; margin-right: 40px;">
            <tr>
                <td style="width: 200px">Tanggal Meninggal </td>
                <td style="width: 5px">:</td>
                <td>{{ $layanan->tanggal_meninggal ? \Carbon\Carbon::parse($layanan->tanggal_meninggal)->format('d-m-Y') : '-' }}</td></tr>
            <tr>
                <td>Tempat </td>
                <td>:</td>
                <td>{{ $layanan->tempat_meninggal ?? '-' }}</td></tr>
            <tr>
                <td>Penyebab</td>
                <td>:</td>
                <td>{{ $layanan->penyebab_meninggal ?? '-' }}</td></tr>
        </table>
    @else

    @endif

    <p style="font-size: 10pt; text-align: justify; margin: 20px 40px;">
        Demikian surat keterangan ini kami buat dengan sebenarnya untuk diketahui dan dipergunakan sebagaimana mestinya.
    </p>

    <!-- Tanda tangan -->
    <br><br>
    <table border="0" style="width: 100%; font-size: 10pt; margin-right: 40px;">
        <tr>
            <td style="width: 60%;"></td>
            <td style="text-align: center;">
                Kepala Desa Tapus <br><br><br><br><br><br><br>
                <b>HERYADI, S.Kom</b>
            </td>
        </tr>
    </table>

</body>
</html>
