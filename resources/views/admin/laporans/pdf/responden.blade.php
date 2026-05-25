<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Laporan Responden</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'DejaVu Sans', Arial, sans-serif;
            font-size: 10px;
            line-height: 1.4;
            color: #333;
            margin-left:10px;
            margin-right:10px;        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid #4f46e5;
        }
        .header h1 {
            font-size: 18px;
            color: #1f2937;
            margin-bottom: 5px;
        }
        .header p {
            font-size: 11px;
            color: #6b7280;
        }
        .info-box {
            background: #f3f4f6;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
        }
        .info-box p {
            font-size: 9px;
            color: #6b7280;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table thead th {
            background: #4f46e5;
            color: white;
            padding: 8px 6px;
            text-align: left;
            font-weight: bold;
            font-size: 12px;
        }
        table tbody td {
            padding: 6px;
            border-bottom: 1px solid #e5e7eb;
            font-size: 12px;
            vertical-align: top;
        }
        table tbody tr:nth-child(even) {
            background: #f9fafb;
        }
        .footer {
            margin-left: auto;
            width: fit-content;
            margin-top: 30px;
            padding-top: 15px;
            border-top: 1px solid #e5e7eb;
            text-align: left;
            font-size: 12px;
            color: #6b7280;
        }
        .badge {
            display: inline-block;
            padding: 2px 6px;
            border-radius: 3px;
            font-size: 7px;
            font-weight: bold;
        }
        .badge-male { background: #dbeafe; color: #1e40af; }
        .badge-female { background: #fce7f3; color: #9d174d; }
    </style>
</head>
<body>
    <div class="header">
        <h2>Sistem Informasi Aplikasi Survei Kepuasan Masyarakat</h2>
        <h1>KELURAHAN KERTAK BARU ULU</h1>
        <p>Jl H. Anang Adenansi No 13 RT 2 RW 1</p>
    </div>

    <div class="info-box">
        <p><strong>Filter:</strong> 
            @if(isset($filters['start_date']) && $filters['start_date']) Tanggal Mulai: {{ $filters['start_date'] }} @endif
            @if(isset($filters['end_date']) && $filters['end_date']) - Tanggal Selesai: {{ $filters['end_date'] }} @endif
            @if(isset($filters['wilayah_id']) && $filters['wilayah_id']) - Wilayah: {{ $wilayahs->find($filters['wilayah_id'])->nama ?? 'Semua' }} @endif
            @if(isset($filters['layanan_id']) && $filters['layanan_id']) - Layanan: {{ $layanans->find($filters['layanan_id'])->nama ?? 'Semua' }} @endif
        </p>
        <p><strong>Total Data:</strong> {{ count($respondens) }} Responden | <strong>Tanggal Cetak:</strong> {{ \App\Helpers\FormatTanggal::indo('d/m/Y H:i:s') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="18%">Nama</th>
                <th width="10%">JK</th>
                <th width="15%">Pekerjaan</th>
                <th width="15%">Wilayah</th>
                <th width="17%">Layanan</th>
                <th width="15%">Alamat</th>
                <th width="10%">Telp</th>
                <th width="10%">Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @forelse($respondens as $index => $responden)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $responden->nama }}</td>
                <td>
                    <span class="badge {{ $responden->jkel == 'L' ? 'badge-male' : 'badge-female' }}">
                        {{ $responden->jkel == 'L' ? 'Laki-laki' : 'Perempuan' }}
                    </span>
                </td>
                <td>{{ $responden->pekerjaan ?? '-' }}</td>
                <td>{{ $responden->wilayah->nama ?? '-' }}</td>
                <td>{{ $responden->layanan->nama ?? '-' }}</td>
                <td>{{ $responden->alamat ?? '-' }}</td>
                <td>{{ $responden->telp ?? '-' }}</td>
                <td>{{ \App\Helpers\FormatTanggal::indo('d/m/Y', date('d/m/Y', strtotime($responden->created_at))) }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="9" style="text-align: center; color: #6b7280;">Tidak ada data responden</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        <table>
            <tr>
                <td width="75%"></td>
                <td width="25%" style="text-align: left;">
                    Banjarmasin, {{ \App\Helpers\FormatTanggal::indo('d/m/Y') }}<br/>
                    Mengetahui,<br/>
                    Lurah Kertak Baru Ulu<br/><br/><br/>
                    Della Syahbana, SH,MH <br/>
                    NIP. 19840612 201001 2 001
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
