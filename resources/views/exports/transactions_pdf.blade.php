<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Transaksi</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #333; padding: 6px; text-align: left; }
        h2 { text-align: center; }
    </style>
</head>
<body>
    <h2>Laporan Transaksi Keuangan</h2>

    <table>
        <thead>
            <tr>
                <th>Kategori</th>
                <th>Tanggal</th>
                <th>Jenis</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->category->nama ?? '-' }}</td>
                    <td>{{ \Carbon\Carbon::parse($transaction->date_transaction)->format('d-m-Y') }}</td>
                    <td>
                        @if ($transaction->category->pengeluaran)
                            Pengeluaran
                        @else
                            Pemasukan
                        @endif
                    </td>
                    <td>Rp{{ number_format($transaction->jumlah, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
