<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Laporan Jawaban</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'DejaVu Sans', Arial, sans-serif;
            font-size: 9px;
            line-height: 1.4;
            color: #333;
            margin-left:10px;
            margin-right:10px;   
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid #16a34a;
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
            background: #16a34a;
            color: white;
            padding: 8px 5px;
            text-align: left;
            font-weight: bold;
            font-size: 12px;
        }
        table tbody td {
            padding: 5px;
            border-bottom: 1px solid #e5e7eb;
            font-size: 12px;
            vertical-align: top;
        }
        table tbody tr:nth-child(even) {
            background: #f9fafb;
        }
        .badge {
            display: inline-block;
            padding: 2px 5px;
            border-radius: 3px;
            font-size: 6px;
            font-weight: bold;
        }
        .badge-baik { background: #dcfce7; color: #166534; }
        .badge-kurang { background: #fef9c3; color: #854d0e; }
        .badge-buruk { background: #fee2e2; color: #991b1b; }
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
        <p><strong>Total Data:</strong> {{ count($jawabans) }} Jawaban | <strong>Tanggal Cetak:</strong> {{ date('d/m/Y H:i:s') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th width="4%">No</th>
                <th width="20%">Pertanyaan</th>
                <th width="10%">Responden</th>
                <th width="12%">Layanan</th>
                <th width="10%">Jawaban</th>
                <th width="8%">Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @forelse($jawabans as $index => $jawaban)
            @php
                $badgeClass = 'badge-kurang';
                if (strtolower($jawaban->jawaban) == 'baik' || strtolower($jawaban->jawaban) == 'puas' || strtolower($jawaban->jawaban) == 'sangat puas') {
                    $badgeClass = 'badge-baik';
                } elseif (strtolower($jawaban->jawaban) == 'buruk' || strtolower($jawaban->jawaban) == 'tidak puas' || strtolower($jawaban->jawaban) == 'sangat tidak puas') {
                    $badgeClass = 'badge-buruk';
                }
            @endphp
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ Str::limit($jawaban->pertanyaan->pertanyaan ?? '-', 50) }}</td>
                <td>{{ $jawaban->responden->nama ?? '-' }}</td>
                <td>{{ $jawaban->responden->layanan->nama ?? '-' }}</td>
                <td><span class="badge {{ $badgeClass }}">{{ strtoupper($jawaban->jawaban) }}</span></td>
                <td>{{ date('d/m/Y', strtotime($jawaban->created_at)) }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="6" style="text-align: center; color: #6b7280;">Tidak ada data jawaban</td>
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
