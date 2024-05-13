<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NOTA</title>
    <style>
        @page ,
        body {
            margin: 0;
            padding: 0;
        }

        #nota {
            max-width: 200px;
        }

        #nota header {
            text-align: center;
        }

        #nota header .logo {
            width: 80%;
        }

        #nota header p {
            font-family: Tahoma;
            font-size: 14px;
            margin: 0;
            padding: 0;
        }

        #nota header table {
            margin: 5px 0;
            padding: 5px 0;
            border-top: 1px solid #000;
            border-bottom: 1px solid #000;
        }

        #nota header table td {
            font-family: Tahoma;
            font-size: 14px;
            margin: 0;
            padding: 0;
            text-align: left;
        }

        #nota .content table {
            border-collapse: collapse;
        }

        #nota .content table td {
            font-size: 12px;
            font-family: Tahoma;
        }

        #nota .right {
            text-align: right;
        }

        #nota td.price {
            vertical-align: top;
            text-align: right;
            font-size: 16px;
        }

        #nota .grandtotal {
            border-top: 1px solid #000;
            border-bottom: 1px solid #000;
            margin: 5px 0;
            padding: 5px 0;
        }

        #nota .grandtotal table tr td {
            font-size: 14px;
            font-family: Tahoma;
        }

        #nota .thank p {
            text-align: center;
        }
    </style>
</head>

<body>
    <div id="nota">
        <header>
            <img src="{{ asset('dashmin/img/Logo.png') }}" alt="" class="logo">
            <p>{{ $transaksi->trans_nota }}</p>
            <p>{{ $transaksi->trans_tanggal }}</p>
            <table width="100%">
                <tr>
                    <td width="35%">Pelanggan</td>
                    <td width="1%">: </td>
                    <td width="64%">
                        {{ $transaksi->pelanggan_nama }}
                    </td>
                </tr>
            </table>
        </header>
        <div class="content">
            <table width="100%">
                @foreach ($detail as $detail)
                    <tr>
                        <td width="65%">
                            {{ $detail->produk_nama }}<br />
                            @ {{ number_format($detail->detail_harga, '0', ',', '.') }} x {{ $detail->detail_jumlah }}
                        </td>
                        <td width="35%" class="right price">{{ number_format($detail->subtotal, '0', ',', '.') }}
                        </td>
                    </tr>

                    {{-- Menjumlakan Subtotal --}}
                    @php
                        $total += $detail->subtotal;
                    @endphp
                    {{-- End Sub Total --}}
                @endforeach
            </table>
        </div>
        <div class="grandtotal">
            {{-- Hitung Bayar --}}
            @php
                $bayar = $total + $transaksi->trans_ppn;
            @endphp
            {{-- Hitung Bayar --}}
            <table width="100%">
                <tr>
                    <td width="65%"><strong>TOTAL</strong></td>
                    <td class="right">{{ number_format($total, '0', ',', '.') }} </td>
                </tr>
                <tr>
                    <td width="65%"><strong>PPN 11%</strong></td>
                    <td class="right">{{ number_format($transaksi->trans_ppn, '0', ',', '.') }} </td>
                </tr>
                <tr>
                    <td width="65%"><strong>AMOUNT</strong></td>
                    <td class="right">{{ number_format($bayar, '0', ',', '.') }} </td>
                </tr>
            </table>
        </div>
        <div class="thank">
            <p>Terimakasih Atas Kunjungan Anda :)</p>
        </div>
    </div>
    {{-- Print --}}
    <script>
        window.print();
    </script>
</body>

</html>
