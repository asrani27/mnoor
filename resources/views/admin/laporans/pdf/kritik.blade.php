<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Laporan Kritik</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'DejaVu Sans', Arial, sans-serif;
            font-size: 10px;
            line-height: 1.5;
            color: #333;
            
            margin-left:10px;
            margin-right:10px;   
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid #ca8a04;
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
            background: #ca8a04;
            color: white;
            padding: 10px 8px;
            text-align: left;
            font-weight: bold;
            font-size: 12px;
        }
        table tbody td {
            padding: 8px;
            border-bottom: 1px solid #e5e7eb;
            font-size: 12px;
            vertical-align: top;
        }
        table tbody tr:nth-child(even) {
            background: #f9fafb;
        }
        .kritik-text {
            max-width: 200px;
            word-wrap: break-word;
        }
        .status-badge {
            display: inline-block;
            padding: 3px 8px;
            border-radius: 3px;
            font-size: 7px;
            font-weight: bold;
        }
        .status-pending { background: #fef3c7; color: #92400e; }
        .status-progress { background: #dbeafe; color: #1e40af; }
        .status-done { background: #dcfce7; color: #166534; }
        .footer {
            margin-top: 30px;
            padding-top: 15px;
            border-top: 1px solid #e5e7eb;
            text-align: right;
            font-size: 8px;
            color: #6b7280;
        }
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
            @if(isset($filters['layanan_id']) && $filters['layanan_id']) - Layanan: {{ $layanans->find($filters['layanan_id'])->nama ?? 'Semua' }} @endif
        </p>
        <p><strong>Total Data:</strong> {{ count($kritiks) }} Kritik | <strong>Tanggal Cetak:</strong> {{ date('d/m/Y H:i:s') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th width="4%">No</th>
                <th width="15%">Responden</th>
                <th width="12%">Layanan</th>
                <th width="25%">Isi Kritik</th>
                <th width="25%">Tindak Lanjut</th>
                <th width="10%">Status</th>
                <th width="9%">Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @forelse($kritiks as $index => $kritik)
            @php
                $statusClass = 'status-pending';
                $statusText = 'Pending';
                if ($kritik->tindak_lanjut) {
                    $statusClass = 'status-done';
                    $statusText = 'Selesai';
                }
            @endphp
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $kritik->responden->nama ?? '-' }}</td>
                <td>{{ $kritik->layanan->nama ?? '-' }}</td>
                <td class="kritik-text">{{ Str::limit($kritik->isi_kritik, 100) }}</td>
                <td class="kritik-text">{{ $kritik->tindak_lanjut ? Str::limit($kritik->tindak_lanjut, 100) : '-' }}</td>
                <td><span class="status-badge {{ $statusClass }}">{{ $statusText }}</span></td>
                <td>{{ date('d/m/Y', strtotime($kritik->created_at)) }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="7" style="text-align: center; color: #6b7280;">Tidak ada data kritik</td>
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
