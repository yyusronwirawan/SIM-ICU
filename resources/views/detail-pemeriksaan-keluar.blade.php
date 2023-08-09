<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <style>
        table {
            font-size: 12px;
        }
    </style>
</head>

<body>
    @php
        $dataPemeriksaan = json_decode($data->kriteria);
    @endphp

    <div class="mb-3">
        <h4 class="text-center">Detail Pemeriksaan</h4>
        <span>Nama Pasien : {{ $pasien->Nama }} <br> </span>
        <span>Alamat Pasien : {{ $pasien->Alamat }} <br> </span>
        <span>Tanggal Pemeriksaan : {{ $data->created_at }} <br> </span>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Kriteria</th>
                    <th>Jawaban</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Pasien Meninggal Dunia</td>
                    <td>{{ $dataPemeriksaan->fisiologi_1 }}</td>
                    <td>{{ $dataPemeriksaan->ket_1 }}</td>
                </tr>
                <tr>
                    <td>Tidak Membutuhkan Ventilator</td>
                    <td>{{ $dataPemeriksaan->fisiologi_2 }}</td>
                    <td>{{ $dataPemeriksaan->ket_2 }}</td>
                </tr>
                <tr>
                    <td>Kesadaran GCS > 8 atau ≤ 15 (tidak diintubasi) dengan kondisi hemodynamic stabil.</td>
                    <td>{{ $dataPemeriksaan->fisiologi_3 }}</td>
                    <td>{{ $dataPemeriksaan->ket_3 }}</td>
                </tr>
                <tr>
                    <td>Pasien tidak terintubasi</td>
                    <td>{{ $dataPemeriksaan->fisiologi_4 }}</td>
                    <td>{{ $dataPemeriksaan->ket_4 }}</td>
                </tr>
                <tr>
                    <td>RR > 10 x/mnt or < 35 x/mnt ( tidak adanya gangguan ventilasi : hypoxia and hypercapnia)</td>
                    <td>{{ $dataPemeriksaan->fisiologi_5 }}</td>
                    <td>{{ $dataPemeriksaan->ket_5 }}</td>
                </tr>
                <tr>
                    <td>HR > 40 x/mnt atau < 150 x/mnt ( stabil dengan gambaran EKG tidak mengancam nyawa)</td>
                    <td>{{ $dataPemeriksaan->fisiologi_6 }}</td>
                    <td>{{ $dataPemeriksaan->ket_6 }}</td>
                </tr>
                <tr>
                    <td>PaO2 > 60 mmHg</td>
                    <td>{{ $dataPemeriksaan->fisiologi_7 }}</td>
                    <td>{{ $dataPemeriksaan->ket_7 }}</td>
                </tr>
                <tr>
                    <td>SpO2 >90% ( dengan udara ruangan )</td>
                    <td>{{ $dataPemeriksaan->fisiologi_8 }}</td>
                    <td>{{ $dataPemeriksaan->ket_8 }}</td>
                </tr>
                <tr>
                    <td>PaCO2 < 50 mm Hg</td>
                    <td>{{ $dataPemeriksaan->fisiologi_9 }}</td>
                    <td>{{ $dataPemeriksaan->ket_9 }}</td>
                </tr>
                <tr>
                    <td>pH > 7,1 or < 7,74</td>
                    <td>{{ $dataPemeriksaan->fisiologi_10 }}</td>
                    <td>{{ $dataPemeriksaan->ket_10 }}</td>
                </tr>
                <tr>
                    <td>Pasien mengalami Mati Batang Otak (MBO)</td>
                    <td>{{ $dataPemeriksaan->fisiologi_11 }}</td>
                    <td>{{ $dataPemeriksaan->ket_11 }}</td>
                </tr>
                <tr>
                    <td>Pasien terminal/ ARDS stadium akhir</td>
                    <td>{{ $dataPemeriksaan->fisiologi_12 }}</td>
                    <td>{{ $dataPemeriksaan->ket_12 }}</td>
                </tr>
                <tr>
                    <td>Pasien atau keluarga menolak dirawat lebih lanjut di ICU</td>
                    <td>{{ $dataPemeriksaan->fisiologi_13 }}</td>
                    <td>{{ $dataPemeriksaan->ket_13 }}</td>
                </tr>
            </tbody>
        </table>
        <p style="text-align: justify">{{ $data->hasil }}, Sehingga kami memberikan keputusan bahwa pasien tersebut
            {{ $data->keputusan }}</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
            integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            window.print()
        });
    </script>
</body>

</html>
