<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Laporan Summary</title>
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
        }
        .header {
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid #9333ea;
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
        .summary-cards {
            display: flex;
            justify-content: space-between;
            margin-bottom: 25px;
            gap: 15px;
        }
        .summary-card {
            flex: 1;
            background: linear-gradient(135deg, #9333ea 0%, #7c3aed 100%);
            color: white;
            padding: 15px;
            border-radius: 8px;
            text-align: center;
        }
        .summary-card.green {
            background: linear-gradient(135deg, #16a34a 0%, #15803d 100%);
        }
        .summary-card.yellow {
            background: linear-gradient(135deg, #ca8a04 0%, #a16207 100%);
        }
        .summary-card.blue {
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
        }
        .summary-card h3 {
            font-size: 10px;
            opacity: 0.9;
            margin-bottom: 5px;
        }
        .summary-card .number {
            font-size: 24px;
            font-weight: bold;
        }
        .section {
            margin-bottom: 25px;
        }
        .section-title {
            font-size: 14px;
            font-weight: bold;
            color: #1f2937;
            margin-bottom: 10px;
            padding-bottom: 5px;
            border-bottom: 2px solid #9333ea;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }
        table thead th {
            background: #9333ea;
            color: white;
            padding: 8px 10px;
            text-align: left;
            font-weight: bold;
            font-size: 9px;
        }
        table tbody td {
            padding: 7px 10px;
            border-bottom: 1px solid #e5e7eb;
            font-size: 8px;
        }
        table tbody tr:nth-child(even) {
            background: #f9fafb;
        }
        .stat-bar {
            background: #e5e7eb;
            border-radius: 5px;
            overflow: hidden;
            height: 15px;
            position: relative;
        }
        .stat-fill {
            background: linear-gradient(90deg, #9333ea, #a855f7);
            height: 100%;
            border-radius: 5px;
        }
        .stat-text {
            position: absolute;
            right: 5px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 7px;
            font-weight: bold;
            color: #374151;
        }
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
        <table>
            <tr>
                <td>
                    <img src="{{ public_path('logo/bjm.png') }}" alt="Logo" style="height: 90px;">
                </td>
                <td>
                    <div style="text-align: center;">
                        <h2>Sistem Informasi Aplikasi Survei Kepuasan Masyarakat</h2>
                        <h1>KELURAHAN KERTAK BARU ULU</h1>
                        <p>Jl H. Anang Adenansi No 13 RT 2 RW 1</p>
                    </div>
                </td>
                <td>
                    <img src="" style="height: 90px;">
                </td>
            </tr>
        </table>
    </div>

    <div class="summary-cards">
        <div class="summary-card blue">
            <h3>Total Responden</h3>
            <div class="number">{{ $totalRespondens }}</div>
        </div>
        <div class="summary-card green">
            <h3>Total Jawaban</h3>
            <div class="number">{{ $totalJawabans }}</div>
        </div>
        <div class="summary-card yellow">
            <h3>Total Kritik</h3>
            <div class="number">{{ $totalKritiks }}</div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">REKAPITULASI PER LAYANAN</div>
        <table>
            <thead>
                <tr>
                    <th width="10%">No</th>
                    <th width="40%">Nama Layanan</th>
                    <th width="25%">Jumlah Responden</th>
                    <th width="25%">Jumlah Kritik</th>
                </tr>
            </thead>
            <tbody>
                @forelse($layanans as $index => $layanan)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $layanan->nama }}</td>
                    <td>{{ $layanan->respondens_count }}</td>
                    <td>{{ $layanan->kritiks_count }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" style="text-align: center; color: #6b7280;">Tidak ada data layanan</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="section">
        <div class="section-title">STATISTIK JAWABAN</div>
        <table>
            <thead>
                <tr>
                    <th width="10%">No</th>
                    <th width="50%">Jawaban</th>
                    <th width="40%">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                @forelse($jawabanCounts as $index => $count)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ ucfirst($count->answer) }}</td>
                    <td>
                        <div class="stat-bar" style="width: 150px;">
                            <div class="stat-fill" style="width: {{ $totalJawabans > 0 ? ($count->count / $totalJawabans) * 100 : 0 }}%;"></div>
                            <span class="stat-text">{{ $count->count }}</span>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" style="text-align: center; color: #6b7280;">Tidak ada data jawaban</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

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
