<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>

    <div class="row d-flex justify-content-center" style="margin-top: 50px">
        <div class="col-12 d-flex justify-content-center">
            {{-- <img src="{{ asset('assets/images/logo/checklist.png') }}" width="35px" alt=""> --}}
        </div>
        <div class="col-8 mt-3 ">
            <table>
                <tr>
                    <td>ID Order</td>
                    <td>:</td>
                    <td>
                        <b> {{ $data->order_id }}</b>
                    </td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>
                        <b> {{ $data->user->name }}</b>
                    </td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>
                        <b>
                            {{ $data->user->biodata->kawasan->kawasan . ' - ' . $data->user->biodata->perumahan->nomor_rumah }}
                        </b>
                    </td>
                </tr>
            </table>
            <div class="container  mt-3">
                <b><u> Daftar Belanja </u></b>
            </div>
            <table>
                @php
                    $total = [];
                @endphp
                @foreach ($data->transaksiDetail as $item)
                    <tr>
                        <td>{{ $item->produk->produk }}</td>
                        <td style="width: 10px"></td>
                        <td> {{ number_format($item->produk->harga, 0, ',', '.') }}</td>
                        <td style="width: 10px"></td>
                        <td>
                            x{{ $item->qty }}
                        </td>
                        <td style="width: 10px"></td>
                        <td>{{ number_format($item->produk->harga * $item->qty, 0, ',', '.') }}</td>
                    </tr>
                    @php
                        $total[] = $item->produk->harga * $item->qty;
                    @endphp
                @endforeach

                <th>
                <td>Total</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><b>Rp. {{ number_format(array_sum($total), 0, ',', '.') }}</b></td>
                </th>
            </table>
            <div class="container">
                <span>Terimakasih telah melakukan transaksi menggunakan layanan kami.</span>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
    <script>
        print()
    </script>
</body>

</html>
