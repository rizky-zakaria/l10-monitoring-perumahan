<!DOCTYPE html>
<html>

<head>
    <title>Invoice</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            font-size: 12px;
            line-height: 1.5;
            width: 80mm;
        }

        .header,
        .body,
        .footer {
            width: 100%;
            text-align: center;
        }

        .body {
            margin-top: 10px;
            text-align: left;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            /* border: 1px solid black; */
        }

        th,
        td {
            padding: 2px 5px;
            text-align: left;
        }

        .text-right {
            text-align: right;
        }
    </style>
</head>

<body>
    <div class="header">
        <h2>
            Invoice <br>
            {{ $data->order_id }}
        </h2>
        <p>Tgl: {{ $data->created_at }}</p>
    </div>
    <div class="body">
        <h4>Data Customer:</h4>
        <p>Nama: {{ $data->user->name }}</p>
        <p>Alamat: {{ $data->user->biodata->kawasan->kawasan . ' - ' . $data->user->biodata->perumahan->nomor_rumah }}
            </b></p>

        <h4>Detail Belanja:</h4>
        <table>
            <tr>
                <th>Item</th>
                <th>Qty</th>
                <th>Harga</th>
                <th>Total</th>
            </tr>
            @php
                $total = [];
            @endphp
            @foreach ($data->transaksiDetail as $item)
            @endforeach
            <tr>
                <td>{{ $item->produk->produk }}</td>
                <td>{{ $item->qty }}</td>
                <td>Rp. {{ number_format($item->produk->harga, 0, ',', '.') }}</td>
                <td>Rp. {{ number_format($item->produk->harga * $item->qty, 0, ',', '.') }}</td>
            </tr>
        </table>
        @php
            $total[] = $item->produk->harga * $item->qty;
        @endphp
        <p class="text-right"><strong>Total: Rp. {{ number_format(array_sum($total), 0, ',', '.') }}</strong></p>
    </div>
    <div class="footer">
        <p>== Terimakasih ==</p>
    </div>
    <script>
        window.print();
    </script>
</body>

</html>
