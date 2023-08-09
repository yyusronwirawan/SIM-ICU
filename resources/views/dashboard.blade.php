@extends('master.master-admin')

@section('title')
SIM ICU
@endsection

@section('header')
@endsection

@section('navbar')
@parent
@endsection


@section('menunya')
Beranda
@endsection

{{-- @section('menu')
    
@endsection --}}

@section('content')
<!--Buat Admin-->
@auth
<div class="row">
    <div class="col-xl-12">
        <div class="row">
            <div class="col-xl-6">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card tryal-gradient">
                            <div class="card-body tryal row">
                                <div class="col-xl-7 col-sm-6">
                                    <h2>Selamat Datang, @auth
                                        {{ auth()->user()->name }}
                                        @endauth
                                    </h2>
                                    <span>Lakukan yang terbaik hari ini, untuk kesehatan masyarakat yang lebih
                                        baik</span>
                                    {{-- <a href="data-registration" class="btn btn-rounded  fs-18 font-w500">Lihat
                                                pendaftar</a> --}}
                                </div>
                                <div class="col-xl-5 col-sm-6">
                                    <img src="{{ asset('sipenmaru/images/chart.png') }}" alt="" class="sd-shape">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-6 col-sm-6">
                                        <div class="items">
                                            <h4 class="fs-20 font-w700 mb-4">Data Presentase <br> Pasien Masuk ICU</h4>
                                            <span class="fs-14 font-w400">Data berbentuk presentase pasien</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 redial col-sm-6">
                                        @php
                                        $hasilpersenan = ($jumlahIcu * 100) / $jmluser;
                                        @endphp

                                        <div id="redial"></div>
                                        <span class="text-center d-block fs-18 font-w600">Pasien Di ICU
                                            <small class="text-success"><span id="progressnya">{{ $hasilpersenan }}</span>
                                                %</small></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-xl-6 col-sm-6">
                                <div class="card">
                                    <div class="card-body d-flex px-4 pb-0 justify-content-between">
                                        <div>
                                            <h4 class="fs-18 font-w600 mb-4 text-nowrap">Pemeriksaan
                                            </h4>
                                            <div class="d-flex align-items-center">
                                                <h2 class="fs-32 font-w700 mb-0">{{ $jmlpendaftar }}</h2>
                                            </div>
                                            <span class="fs-16 font-w400">Jumlah Pemeriksaan </span>
                                        </div>
                                        @php
                                        $no = 1;
                                        @endphp
                                        <div id="columnChart">
                                            @foreach ($jmlpendaftarprodi as $x)
                                            <span id="prodi{{ $no }}" style="color:transparent" aria-disabled>{{ $x->jmldaftarprodi }}</span>
                                            @php
                                            $no++;
                                            @endphp
                                            @endforeach


                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-sm-6">
                                <div class="card">
                                    <div class="card-body px-4 pb-0">
                                        <h4 class="fs-18 font-w600 mb-5 text-nowrap">Jumlah Pasien ICU</h4>
                                        <div class="progress default-progress">

                                            <div class="progress-bar bg-gradient1 progress-animated" style="width: {{ $hasilpersenan }}%; height:10px;" role="progressbar">
                                            </div>

                                        </div>
                                        <div class="d-flex align-items-end mt-2 pb-3 justify-content-between">
                                            <span>{{ $jumlahIcu }} dari {{ $jmluser }} pasien berada di
                                                ICU</span>
                                            {{-- <h4 class="mb-0">{{ $jmluser }} Pasien</h4> --}}
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-sm-6">
                                <div class="card">
                                    <div class="card-body d-flex px-4  justify-content-between">
                                        <div>
                                            <div class="">
                                                <h4 class="fs-32 font-w700">{{ $jmluser }}</h4>
                                                <span class="fs-18 font-w500 d-block">Total
                                                    Pasien</span></span>
                                            </div>
                                        </div>
                                        <div id="NewCustomers"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-sm-6">
                                <div class="card">
                                    <div class="card-body d-flex px-4  justify-content-between">
                                        <div>
                                            <div class="">
                                                <h4 class="fs-32 font-w700">{{ $jmlPeriksaPerhari }}</h4>
                                                <span class="fs-18 font-w500 d-block">Pemeriksaan Hari ini</span>
                                            </div>
                                        </div>
                                        <div id="NewCustomers1"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header border-0 pb-0">
                                <h4 class="card-title">Linimasa </h4>
                            </div>
                            <div class="card-body">
                                <div id="DZ_W_TimeLine11" class="widget-timeline dlab-scroll style-1 height150">
                                    <ul class="timeline">
                                        @foreach ($timeline as $item)
                                        <li> @php
                                            $no = 1;
                                            @endphp
                                            {{-- @foreach ($viewDataUser as $x) --}}
                                            <div class="timeline-badge warning">
                                            </div>
                                            <a class="timeline-panel text-muted" href="#">
                                                <span>{{ $item->tgl_update }}</span>
                                                <h6 class="mb-0">{{ $item->dokter()->name }},
                                                    {{ $item->status }}.
                                                </h6>
                                            </a>
                                            @php
                                            $no++;
                                            @endphp
                                            {{-- @endforeach --}}
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endauth
@endsection

@section('footer')
@endsection