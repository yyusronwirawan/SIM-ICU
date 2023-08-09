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
    Pemeriksaan
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        {{ $dataPasien == null ? 'Data Pemeriksaan' : 'Riwayat Pemeriksaan ' . $dataPasien->Nama }}
                    </h4>

                    <!-- center modal -->
                    <div>
                        @if ($dataPasien == null)
                            <a href="/pemeriksaan/print" target="_blank" class="btn btn-info waves-effect waves-light mb-4"><i
                                   class="fa fa-print"></i></a>
                            {{-- <button class="btn btn-info waves-effect waves-light mb-4" onclick="printDiv('cetak')"><i
                               class="fa fa-print"> </i></button> --}}
                            <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal"
                                    data-bs-target="#masuk" style="margin-bottom: 1rem;"><i
                                   class="mdi mdi-plus me-1"></i>Pemeriksaan Masuk</button>
                            <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal"
                                    data-bs-target="#keluar" style="margin-bottom: 1rem;"><i
                                   class="mdi mdi-plus me-1"></i>Pemeriksaan Keluar</button>
                        @else
                            <a href="/pemeriksaan/print?pasien={{ $dataPasien->Id_pasien }}" target="_blank"
                               class="btn btn-info waves-effect waves-light mb-4"><i class="fa fa-print"></i></a>
                        @endif
                    </div>


                    @if ($dataPasien == null)
                        <div class="modal fade" id="masuk" tabindex="-1" role="dialog"
                             aria-labelledby="mySmallModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Pemeriksaan Pasien Indikasi Masuk ICU</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="save-pemeriksaan" method="POST" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="type" value="masuk">
                                            <div class="form-group mb-2">
                                                <label for="iduser">Pasien</label>
                                                <input class="form-control" list="datalistOptionsPasien"
                                                       placeholder="Pilih pasien" name="pasien"
                                                       value="{{ old('pasien') }}">
                                                <datalist id="datalistOptionsPasien">
                                                    @foreach ($viewDataUser as $item)
                                                        <option value="{{ $item->Id_pasien }}">
                                                            {{ $item->Nama . ' - ' . $item->Alamat }}
                                                        </option>
                                                    @endforeach
                                                </datalist>
                                                <small class="text-danger">*Jika pasien tidak
                                                    ditemukan, buat dulu di
                                                    menu pasien</small>
                                            </div>
                                            <div class="form-group mb-2">
                                                <div class="d-flex justify-content-between">
                                                    <label for="iduser">Kriteria Fisiologis</label>
                                                    <a data-bs-toggle="collapse" href="#collapseExample" role="button"
                                                       aria-expanded="false" aria-controls="collapseExample">
                                                        <i class="fa fa-plus-circle"></i>
                                                    </a>
                                                </div>
                                                <div class="collapse" id="collapseExample">
                                                    <div class="card card-body">
                                                        <div class="form-group mb-1">
                                                            <div class="row">
                                                                <label for="inputEmail3" class="col-sm-9 col-form-label">1.
                                                                    Membutuhkan
                                                                    ventilator</label>
                                                                <div class="col-sm-3">
                                                                    <input class="form-check-input" type="radio"
                                                                           name="fisiologi_1" value="ya" required>
                                                                    <label class="form-check-label me-2"
                                                                           for="gridRadios1">Ya</label>
                                                                    <input class="form-check-input" type="radio"
                                                                           name="fisiologi_1" value="tidak" required>
                                                                    <label class="form-check-label"
                                                                           for="gridRadios1">Tidak</label>
                                                                </div>
                                                            </div>
                                                            <input type="text" name="ket_1" class="form-control"
                                                                   placeholder="Keterangan"
                                                                   style="height: 2.5rem;padding: 0.3125rem 1rem;">
                                                        </div>
                                                        <div class="form-group mb-1">
                                                            <div class="row">
                                                                <label for="inputEmail3" class="col-sm-9 col-form-label">2.
                                                                    Kesadaran
                                                                    dengan GCS ≤ 8 </label>
                                                                <div class="col-sm-3">
                                                                    <input class="form-check-input" type="radio"
                                                                           name="fisiologi_2" value="ya" required>
                                                                    <label class="form-check-label me-2"
                                                                           for="gridRadios1">Ya</label>
                                                                    <input class="form-check-input" type="radio"
                                                                           name="fisiologi_2" value="tidak" required>
                                                                    <label class="form-check-label"
                                                                           for="gridRadios1">Tidak</label>
                                                                </div>
                                                            </div>
                                                            <input type="text" name="ket_2" class="form-control"
                                                                   placeholder="Keterangan"
                                                                   style="height: 2.5rem;padding: 0.3125rem 1rem;">
                                                        </div>
                                                        <div class="form-group mb-1">
                                                            <div class="row">
                                                                <label for="inputEmail3"
                                                                       class="col-sm-9 col-form-label">3.
                                                                    Sudah
                                                                    diintubasi</label>
                                                                <div class="col-sm-3">
                                                                    <input class="form-check-input" type="radio"
                                                                           name="fisiologi_3" value="ya" required>
                                                                    <label class="form-check-label me-2"
                                                                           for="gridRadios1">Ya</label>
                                                                    <input class="form-check-input" type="radio"
                                                                           name="fisiologi_3" value="tidak" required>
                                                                    <label class="form-check-label"
                                                                           for="gridRadios1">Tidak</label>
                                                                </div>
                                                            </div>
                                                            <input type="text" name="ket_3" class="form-control"
                                                                   placeholder="Keterangan"
                                                                   style="height: 2.5rem;padding: 0.3125rem 1rem;">
                                                        </div>
                                                        <div class="form-group mb-1">
                                                            <div class="row">
                                                                <label for="inputEmail3"
                                                                       class="col-sm-9 col-form-label">4. RR
                                                                    < 8 x/mnt or> 35 x/mnt ( adanya gangguan ventilasi :
                                                                        hypoxia
                                                                        and
                                                                        hypercapnia)
                                                                </label>
                                                                <div class="col-sm-3">
                                                                    <input class="form-check-input" type="radio"
                                                                           name="fisiologi_4" value="ya" required>
                                                                    <label class="form-check-label me-2"
                                                                           for="gridRadios1">Ya</label>
                                                                    <input class="form-check-input" type="radio"
                                                                           name="fisiologi_4" value="tidak" required>
                                                                    <label class="form-check-label"
                                                                           for="gridRadios1">Tidak</label>
                                                                </div>
                                                            </div>
                                                            <input type="text" name="ket_4" class="form-control"
                                                                   placeholder="Keterangan"
                                                                   style="height: 2.5rem;padding: 0.3125rem 1rem;">
                                                        </div>
                                                        <div class="form-group mb-1">
                                                            <div class="row">
                                                                <label for="inputEmail3"
                                                                       class="col-sm-9 col-form-label">5. HR
                                                                    < 40 x/mnt atau> 150 x/mnt (tidak stabil dengan gambaran
                                                                        EKG
                                                                        mengancam nyawa)
                                                                </label>
                                                                <div class="col-sm-3">
                                                                    <input class="form-check-input" type="radio"
                                                                           name="fisiologi_5" value="ya" required>
                                                                    <label class="form-check-label me-2"
                                                                           for="gridRadios1">Ya</label>
                                                                    <input class="form-check-input" type="radio"
                                                                           name="fisiologi_5" value="tidak" required>
                                                                    <label class="form-check-label"
                                                                           for="gridRadios1">Tidak</label>
                                                                </div>
                                                            </div>
                                                            <input type="text" name="ket_5" class="form-control"
                                                                   placeholder="Keterangan"
                                                                   style="height: 2.5rem;padding: 0.3125rem 1rem;">
                                                        </div>
                                                        <div class="form-group mb-1">
                                                            <div class="row">
                                                                <label for="inputEmail3"
                                                                       class="col-sm-9 col-form-label">6.
                                                                    PaO2 < 50-60 mmHg</label>
                                                                        <div class="col-sm-3">
                                                                            <input class="form-check-input" type="radio"
                                                                                   name="fisiologi_6" value="ya"
                                                                                   required>
                                                                            <label class="form-check-label me-2"
                                                                                   for="gridRadios1">Ya</label>
                                                                            <input class="form-check-input" type="radio"
                                                                                   name="fisiologi_6" value="tidak"
                                                                                   required>
                                                                            <label class="form-check-label"
                                                                                   for="gridRadios1">Tidak</label>
                                                                        </div>
                                                            </div>
                                                            <input type="text" name="ket_6" class="form-control"
                                                                   placeholder="Keterangan"
                                                                   style="height: 2.5rem;padding: 0.3125rem 1rem;">
                                                        </div>
                                                        <div class="form-group mb-1">
                                                            <div class="row">
                                                                <label for="inputEmail3"
                                                                       class="col-sm-9 col-form-label">7.
                                                                    SpO2 < 90% ( dengan udara ruangan )</label>
                                                                        <div class="col-sm-3">
                                                                            <input class="form-check-input" type="radio"
                                                                                   name="fisiologi_7" value="ya"
                                                                                   required>
                                                                            <label class="form-check-label me-2"
                                                                                   for="gridRadios1">Ya</label>
                                                                            <input class="form-check-input" type="radio"
                                                                                   name="fisiologi_7" value="tidak"
                                                                                   required>
                                                                            <label class="form-check-label"
                                                                                   for="gridRadios1">Tidak</label>
                                                                        </div>
                                                            </div>
                                                            <input type="text" name="ket_7" class="form-control"
                                                                   placeholder="Keterangan"
                                                                   style="height: 2.5rem;padding: 0.3125rem 1rem;">
                                                        </div>
                                                        <div class="form-group mb-1">
                                                            <div class="row">
                                                                <label for="inputEmail3"
                                                                       class="col-sm-9 col-form-label">8.
                                                                    PaCO2 < 50 mm Hg</label>
                                                                        <div class="col-sm-3">
                                                                            <input class="form-check-input" type="radio"
                                                                                   name="fisiologi_8" value="ya"
                                                                                   required>
                                                                            <label class="form-check-label me-2"
                                                                                   for="gridRadios1">Ya</label>
                                                                            <input class="form-check-input" type="radio"
                                                                                   name="fisiologi_8" value="tidak"
                                                                                   required>
                                                                            <label class="form-check-label"
                                                                                   for="gridRadios1">Tidak</label>
                                                                        </div>
                                                            </div>
                                                            <input type="text" name="ket_8" class="form-control"
                                                                   placeholder="Keterangan"
                                                                   style="height: 2.5rem;padding: 0.3125rem 1rem;">
                                                        </div>
                                                        <div class="form-group mb-1">
                                                            <div class="row">
                                                                <label for="inputEmail3"
                                                                       class="col-sm-9 col-form-label">9. pH
                                                                    < 7,1 or> 7,7
                                                                </label>
                                                                <div class="col-sm-3">
                                                                    <input class="form-check-input" type="radio"
                                                                           name="fisiologi_9" value="ya" required>
                                                                    <label class="form-check-label me-2"
                                                                           for="gridRadios1">Ya</label>
                                                                    <input class="form-check-input" type="radio"
                                                                           name="fisiologi_9" value="tidak" required>
                                                                    <label class="form-check-label"
                                                                           for="gridRadios1">Tidak</label>
                                                                </div>
                                                            </div>
                                                            <input type="text" name="ket_9" class="form-control"
                                                                   placeholder="Keterangan"
                                                                   style="height: 2.5rem;padding: 0.3125rem 1rem;">
                                                        </div>
                                                        <div class="form-group mb-1">
                                                            <div class="row">
                                                                <label for="inputEmail3"
                                                                       class="col-sm-9 col-form-label">10.
                                                                    Membutuhkan perawatan dan pengawasan yang ketat
                                                                    (Inotropic,
                                                                    vasoactive agent, insulin drip, dan koreksi elektrolit).
                                                                </label>
                                                                <div class="col-sm-3">
                                                                    <input class="form-check-input" type="radio"
                                                                           name="fisiologi_10" value="ya" required>
                                                                    <label class="form-check-label me-2"
                                                                           for="gridRadios1">Ya</label>
                                                                    <input class="form-check-input" type="radio"
                                                                           name="fisiologi_10" value="tidak" required>
                                                                    <label class="form-check-label"
                                                                           for="gridRadios1">Tidak</label>
                                                                </div>
                                                            </div>
                                                            <input type="text" name="ket_10" class="form-control"
                                                                   placeholder="Keterangan"
                                                                   style="height: 2.5rem;padding: 0.3125rem 1rem;">
                                                        </div>
                                                        <div class="form-group mb-1">
                                                            <div class="row">
                                                                <label for="inputEmail3"
                                                                       class="col-sm-9 col-form-label">11.
                                                                    Kelainan Multiple Organ Disfungtions (MODS) dengan
                                                                    risiko
                                                                    tinggi akan
                                                                    terjadi komplikasi.
                                                                </label>
                                                                <div class="col-sm-3">
                                                                    <input class="form-check-input" type="radio"
                                                                           name="fisiologi_11" value="ya" required>
                                                                    <label class="form-check-label me-2"
                                                                           for="gridRadios1">Ya</label>
                                                                    <input class="form-check-input" type="radio"
                                                                           name="fisiologi_11" value="tidak" required>
                                                                    <label class="form-check-label"
                                                                           for="gridRadios1">Tidak</label>
                                                                </div>
                                                            </div>
                                                            <input type="text" name="ket_11" class="form-control"
                                                                   placeholder="Keterangan"
                                                                   style="height: 2.5rem;padding: 0.3125rem 1rem;">
                                                        </div>
                                                        <div class="form-group mb-1">
                                                            <div class="row">
                                                                <label for="inputEmail3"
                                                                       class="col-sm-9 col-form-label">12.
                                                                    Membutuhkan perawatan perioperative pasien operasi
                                                                    risiko
                                                                    tinggi.
                                                                </label>
                                                                <div class="col-sm-3">
                                                                    <input class="form-check-input" type="radio"
                                                                           name="fisiologi_12" value="ya" required>
                                                                    <label class="form-check-label me-2"
                                                                           for="gridRadios1">Ya</label>
                                                                    <input class="form-check-input" type="radio"
                                                                           name="fisiologi_12" value="tidak" required>
                                                                    <label class="form-check-label"
                                                                           for="gridRadios1">Tidak</label>
                                                                </div>
                                                            </div>
                                                            <input type="text" name="ket_12" class="form-control"
                                                                   placeholder="Keterangan"
                                                                   style="height: 2.5rem;padding: 0.3125rem 1rem;">
                                                        </div>
                                                        <div class="form-group mb-1">
                                                            <div class="row">
                                                                <label for="inputEmail3"
                                                                       class="col-sm-9 col-form-label">13.
                                                                    MAP ≤ 60 mmHg.
                                                                </label>
                                                                <div class="col-sm-3">
                                                                    <input class="form-check-input" type="radio"
                                                                           name="fisiologi_13" value="ya" required>
                                                                    <label class="form-check-label me-2"
                                                                           for="gridRadios1">Ya</label>
                                                                    <input class="form-check-input" type="radio"
                                                                           name="fisiologi_13" value="tidak" required>
                                                                    <label class="form-check-label"
                                                                           for="gridRadios1">Tidak</label>
                                                                </div>
                                                            </div>
                                                            <input type="text" name="ket_13" class="form-control"
                                                                   placeholder="Keterangan"
                                                                   style="height: 2.5rem;padding: 0.3125rem 1rem;">
                                                        </div>
                                                        <div class="form-group mb-1">
                                                            <div class="row">
                                                                <label for="inputEmail3"
                                                                       class="col-sm-9 col-form-label">14.
                                                                    Gula darah> 250 mg/dl dengan pH < 7,35 , osml> 280 mg/dl
                                                                </label>
                                                                <div class="col-sm-3">
                                                                    <input class="form-check-input" type="radio"
                                                                           name="fisiologi_14" value="ya" required>
                                                                    <label class="form-check-label me-2"
                                                                           for="gridRadios1">Ya</label>
                                                                    <input class="form-check-input" type="radio"
                                                                           name="fisiologi_14" value="tidak" required>
                                                                    <label class="form-check-label"
                                                                           for="gridRadios1">Tidak</label>
                                                                </div>
                                                            </div>
                                                            <input type="text" name="ket_14" class="form-control"
                                                                   placeholder="Keterangan"
                                                                   style="height: 2.5rem;padding: 0.3125rem 1rem;">
                                                        </div>
                                                        <div class="form-group mb-1">
                                                            <div class="row">
                                                                <label for="inputEmail3"
                                                                       class="col-sm-9 col-form-label">15.
                                                                    Natrium serum ≤ 120 mmol/L atau≥ 150 mmol/L
                                                                </label>
                                                                <div class="col-sm-3">
                                                                    <input class="form-check-input" type="radio"
                                                                           name="fisiologi_15" value="ya" required>
                                                                    <label class="form-check-label me-2"
                                                                           for="gridRadios1">Ya</label>
                                                                    <input class="form-check-input" type="radio"
                                                                           name="fisiologi_15" value="tidak" required>
                                                                    <label class="form-check-label"
                                                                           for="gridRadios1">Tidak</label>
                                                                </div>
                                                            </div>
                                                            <input type="text" name="ket_15" class="form-control"
                                                                   placeholder="Keterangan"
                                                                   style="height: 2.5rem;padding: 0.3125rem 1rem;">
                                                        </div>
                                                        <div class="form-group mb-1">
                                                            <div class="row">
                                                                <label for="inputEmail3"
                                                                       class="col-sm-9 col-form-label">16.
                                                                    Potasium Serum < 3,5 mmol/L atau> 5,5 mmol/L
                                                                </label>
                                                                <div class="col-sm-3">
                                                                    <input class="form-check-input" type="radio"
                                                                           name="fisiologi_16" value="ya" required>
                                                                    <label class="form-check-label me-2"
                                                                           for="gridRadios1">Ya</label>
                                                                    <input class="form-check-input" type="radio"
                                                                           name="fisiologi_16" value="tidak" required>
                                                                    <label class="form-check-label"
                                                                           for="gridRadios1">Tidak</label>
                                                                </div>
                                                            </div>
                                                            <input type="text" name="ket_16" class="form-control"
                                                                   placeholder="Keterangan"
                                                                   style="height: 2.5rem;padding: 0.3125rem 1rem;">
                                                        </div>
                                                        <div class="form-group mb-1">
                                                            <div class="row">
                                                                <label for="inputEmail3"
                                                                       class="col-sm-9 col-form-label">17.
                                                                    Calsium serum ( ion) < 1 mmol/L atau> 1,3 mmol/L
                                                                </label>
                                                                <div class="col-sm-3">
                                                                    <input class="form-check-input" type="radio"
                                                                           name="fisiologi_17" value="ya" required>
                                                                    <label class="form-check-label me-2"
                                                                           for="gridRadios1">Ya</label>
                                                                    <input class="form-check-input" type="radio"
                                                                           name="fisiologi_17" value="tidak" required>
                                                                    <label class="form-check-label"
                                                                           for="gridRadios1">Tidak</label>
                                                                </div>
                                                            </div>
                                                            <input type="text" name="ket_17" class="form-control"
                                                                   placeholder="Keterangan"
                                                                   style="height: 2.5rem;padding: 0.3125rem 1rem;">
                                                        </div>
                                                        <div class="form-group mb-1">
                                                            <div class="row">
                                                                <label for="inputEmail3"
                                                                       class="col-sm-9 col-form-label">18.
                                                                    Pasien atau Keluarga bersedia dirawat lebih lanjut di
                                                                    ICU
                                                                </label>
                                                                <div class="col-sm-3">
                                                                    <input class="form-check-input" type="radio"
                                                                           name="fisiologi_18" value="ya" required>
                                                                    <label class="form-check-label me-2"
                                                                           for="gridRadios1">Ya</label>
                                                                    <input class="form-check-input" type="radio"
                                                                           name="fisiologi_18" value="tidak" required>
                                                                    <label class="form-check-label"
                                                                           for="gridRadios1">Tidak</label>
                                                                </div>
                                                            </div>
                                                            <input type="text" name="ket_18" class="form-control"
                                                                   placeholder="Keterangan"
                                                                   style="height: 2.5rem;padding: 0.3125rem 1rem;">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            {{-- <div class="form-group mb-2">
                                                <label for="iduser">Hasil Pemeriksaan</label>
                                                <textarea name="hasil" rows="10" class="form-control" placeholder="Masukkan hasil pemeriksaan"></textarea>
                                            </div> --}}
                                            {{-- <div class="form-group mb-2">
                                                <label for="iduser">Keputusan</label>
                                                <select name="keputusan" class="form-control" required>
                                                    <option selected disabled>Pilih Keputusan</option>
                                                    <option value="Tidak Masuk ICU">Tidak Masuk ICU</option>
                                                    <option value="Masuk ICU">Masuk ICU</option>
                                                </select>
                                            </div> --}}
                                            <div class="modal-footer border-top-0 d-flex">
                                                <button type="button" class="btn btn-danger light"
                                                        data-bs-dismiss="modal">Tutup</button>
                                                <button type="submit" name="add" class="btn btn-primary">Tambahkan
                                                    Data</button>
                                            </div>
                                        </form>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->

                        <div class="modal fade" id="keluar" tabindex="-1" role="dialog"
                             aria-labelledby="mySmallModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Pemeriksaan Pasien Indikasi Keluar ICU</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="save-pemeriksaan" method="POST" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="type" value="keluar">
                                            <div class="form-group mb-2">
                                                <label for="iduser">Pasien</label>
                                                <input class="form-control" list="datalistOptionsPasien"
                                                       placeholder="Pilih pasien" name="pasien"
                                                       value="{{ old('pasien') }}">
                                                <datalist id="datalistOptionsPasien">
                                                    @foreach ($viewDataUser as $item)
                                                        <option value="{{ $item->Id_pasien }}">
                                                            {{ $item->Nama . ' - ' . $item->Alamat }}
                                                        </option>
                                                    @endforeach
                                                </datalist>
                                                <small class="text-danger">*Jika pasien tidak
                                                    ditemukan, buat dulu di
                                                    menu pasien</small>
                                            </div>
                                            <div class="form-group mb-2">
                                                <div class="d-flex justify-content-between">
                                                    <label for="iduser">Kriteria Fisiologis</label>
                                                    <a data-bs-toggle="collapse" href="#collapseExample" role="button"
                                                       aria-expanded="false" aria-controls="collapseExample">
                                                        <i class="fa fa-plus-circle"></i>
                                                    </a>
                                                </div>
                                                <div class="collapse" id="collapseExample">
                                                    <div class="card card-body">
                                                        <div class="form-group mb-1">
                                                            <div class="row">
                                                                <label for="inputEmail3"
                                                                       class="col-sm-9 col-form-label">1.
                                                                    Pasien meninggal dunia</label>
                                                                <div class="col-sm-3">
                                                                    <input class="form-check-input" type="radio"
                                                                           name="fisiologi_1" value="ya" required>
                                                                    <label class="form-check-label me-2"
                                                                           for="gridRadios1">Ya</label>
                                                                    <input class="form-check-input" type="radio"
                                                                           name="fisiologi_1" value="tidak" required>
                                                                    <label class="form-check-label"
                                                                           for="gridRadios1">Tidak</label>
                                                                </div>
                                                            </div>
                                                            <input type="text" name="ket_1" class="form-control"
                                                                   placeholder="Keterangan"
                                                                   style="height: 2.5rem;padding: 0.3125rem 1rem;">
                                                        </div>
                                                        <div class="form-group mb-1">
                                                            <div class="row">
                                                                <label for="inputEmail3"
                                                                       class="col-sm-9 col-form-label">2.
                                                                    Tidak membutuhkan ventilator</label>
                                                                <div class="col-sm-3">
                                                                    <input class="form-check-input" type="radio"
                                                                           name="fisiologi_2" value="ya" required>
                                                                    <label class="form-check-label me-2"
                                                                           for="gridRadios1">Ya</label>
                                                                    <input class="form-check-input" type="radio"
                                                                           name="fisiologi_2" value="tidak" required>
                                                                    <label class="form-check-label"
                                                                           for="gridRadios1">Tidak</label>
                                                                </div>
                                                            </div>
                                                            <input type="text" name="ket_2" class="form-control"
                                                                   placeholder="Keterangan"
                                                                   style="height: 2.5rem;padding: 0.3125rem 1rem;">
                                                        </div>
                                                        <div class="form-group mb-1">
                                                            <div class="row">
                                                                <label for="inputEmail3"
                                                                       class="col-sm-9 col-form-label">3.
                                                                    Kesadaran GCS > 8 atau ≤ 15 (tidak diintubasi) dengan
                                                                    kondisi
                                                                    hemodynamic stabil.</label>
                                                                <div class="col-sm-3">
                                                                    <input class="form-check-input" type="radio"
                                                                           name="fisiologi_3" value="ya" required>
                                                                    <label class="form-check-label me-2"
                                                                           for="gridRadios1">Ya</label>
                                                                    <input class="form-check-input" type="radio"
                                                                           name="fisiologi_3" value="tidak" required>
                                                                    <label class="form-check-label"
                                                                           for="gridRadios1">Tidak</label>
                                                                </div>
                                                            </div>
                                                            <input type="text" name="ket_3" class="form-control"
                                                                   placeholder="Keterangan"
                                                                   style="height: 2.5rem;padding: 0.3125rem 1rem;">
                                                        </div>
                                                        <div class="form-group mb-1">
                                                            <div class="row">
                                                                <label for="inputEmail3"
                                                                       class="col-sm-9 col-form-label">4.
                                                                    Pasien tidak terintubasi</label>
                                                                <div class="col-sm-3">
                                                                    <input class="form-check-input" type="radio"
                                                                           name="fisiologi_4" value="ya" required>
                                                                    <label class="form-check-label me-2"
                                                                           for="gridRadios1">Ya</label>
                                                                    <input class="form-check-input" type="radio"
                                                                           name="fisiologi_4" value="tidak" required>
                                                                    <label class="form-check-label"
                                                                           for="gridRadios1">Tidak</label>
                                                                </div>
                                                            </div>
                                                            <input type="text" name="ket_4" class="form-control"
                                                                   placeholder="Keterangan"
                                                                   style="height: 2.5rem;padding: 0.3125rem 1rem;">
                                                        </div>
                                                        <div class="form-group mb-1">
                                                            <div class="row">
                                                                <label for="inputEmail3"
                                                                       class="col-sm-9 col-form-label">5. RR
                                                                    > 10 x/mnt or < 35 x/mnt ( tidak adanya gangguan
                                                                      ventilasi : hypoxia and hypercapnia)</label>
                                                                        <div class="col-sm-3">
                                                                            <input class="form-check-input" type="radio"
                                                                                   name="fisiologi_5" value="ya"
                                                                                   required>
                                                                            <label class="form-check-label me-2"
                                                                                   for="gridRadios1">Ya</label>
                                                                            <input class="form-check-input" type="radio"
                                                                                   name="fisiologi_5" value="tidak"
                                                                                   required>
                                                                            <label class="form-check-label"
                                                                                   for="gridRadios1">Tidak</label>
                                                                        </div>
                                                            </div>
                                                            <input type="text" name="ket_5" class="form-control"
                                                                   placeholder="Keterangan"
                                                                   style="height: 2.5rem;padding: 0.3125rem 1rem;">
                                                        </div>
                                                        <div class="form-group mb-1">
                                                            <div class="row">
                                                                <label for="inputEmail3"
                                                                       class="col-sm-9 col-form-label">6. HR
                                                                    > 40 x/mnt atau < 150 x/mnt ( stabil dengan gambaran EKG
                                                                      tidak mengancam nyawa) </label>
                                                                        <div class="col-sm-3">
                                                                            <input class="form-check-input" type="radio"
                                                                                   name="fisiologi_6" value="ya"
                                                                                   required>
                                                                            <label class="form-check-label me-2"
                                                                                   for="gridRadios1">Ya</label>
                                                                            <input class="form-check-input" type="radio"
                                                                                   name="fisiologi_6" value="tidak"
                                                                                   required>
                                                                            <label class="form-check-label"
                                                                                   for="gridRadios1">Tidak</label>
                                                                        </div>
                                                            </div>
                                                            <input type="text" name="ket_6" class="form-control"
                                                                   placeholder="Keterangan"
                                                                   style="height: 2.5rem;padding: 0.3125rem 1rem;">
                                                        </div>
                                                        <div class="form-group mb-1">
                                                            <div class="row">
                                                                <label for="inputEmail3"
                                                                       class="col-sm-9 col-form-label">7.
                                                                    PaO2 > 60 mmHg
                                                                </label>
                                                                <div class="col-sm-3">
                                                                    <input class="form-check-input" type="radio"
                                                                           name="fisiologi_7" value="ya" required>
                                                                    <label class="form-check-label me-2"
                                                                           for="gridRadios1">Ya</label>
                                                                    <input class="form-check-input" type="radio"
                                                                           name="fisiologi_7" value="tidak" required>
                                                                    <label class="form-check-label"
                                                                           for="gridRadios1">Tidak</label>
                                                                </div>
                                                            </div>
                                                            <input type="text" name="ket_7" class="form-control"
                                                                   placeholder="Keterangan"
                                                                   style="height: 2.5rem;padding: 0.3125rem 1rem;">
                                                        </div>
                                                        <div class="form-group mb-1">
                                                            <div class="row">
                                                                <label for="inputEmail3"
                                                                       class="col-sm-9 col-form-label">8.
                                                                    SpO2 >90% ( dengan udara ruangan ) </label>
                                                                <div class="col-sm-3">
                                                                    <input class="form-check-input" type="radio"
                                                                           name="fisiologi_8" value="ya" required>
                                                                    <label class="form-check-label me-2"
                                                                           for="gridRadios1">Ya</label>
                                                                    <input class="form-check-input" type="radio"
                                                                           name="fisiologi_8" value="tidak" required>
                                                                    <label class="form-check-label"
                                                                           for="gridRadios1">Tidak</label>
                                                                </div>
                                                            </div>
                                                            <input type="text" name="ket_8" class="form-control"
                                                                   placeholder="Keterangan"
                                                                   style="height: 2.5rem;padding: 0.3125rem 1rem;">
                                                        </div>
                                                        <div class="form-group mb-1">
                                                            <div class="row">
                                                                <label for="inputEmail3"
                                                                       class="col-sm-9 col-form-label">9.
                                                                    PaCO2 < 50 mm Hg</label>
                                                                        <div class="col-sm-3">
                                                                            <input class="form-check-input" type="radio"
                                                                                   name="fisiologi_9" value="ya"
                                                                                   required>
                                                                            <label class="form-check-label me-2"
                                                                                   for="gridRadios1">Ya</label>
                                                                            <input class="form-check-input" type="radio"
                                                                                   name="fisiologi_9" value="tidak"
                                                                                   required>
                                                                            <label class="form-check-label"
                                                                                   for="gridRadios1">Tidak</label>
                                                                        </div>
                                                            </div>
                                                            <input type="text" name="ket_9" class="form-control"
                                                                   placeholder="Keterangan"
                                                                   style="height: 2.5rem;padding: 0.3125rem 1rem;">
                                                        </div>
                                                        <div class="form-group mb-1">
                                                            <div class="row">
                                                                <label for="inputEmail3"
                                                                       class="col-sm-9 col-form-label">10.
                                                                    pH > 7,1 or < 7,74 </label>
                                                                        <div class="col-sm-3">
                                                                            <input class="form-check-input" type="radio"
                                                                                   name="fisiologi_10" value="ya"
                                                                                   required>
                                                                            <label class="form-check-label me-2"
                                                                                   for="gridRadios1">Ya</label>
                                                                            <input class="form-check-input" type="radio"
                                                                                   name="fisiologi_10" value="tidak"
                                                                                   required>
                                                                            <label class="form-check-label"
                                                                                   for="gridRadios1">Tidak</label>
                                                                        </div>
                                                            </div>
                                                            <input type="text" name="ket_10" class="form-control"
                                                                   placeholder="Keterangan"
                                                                   style="height: 2.5rem;padding: 0.3125rem 1rem;">
                                                        </div>
                                                        <div class="form-group mb-1">
                                                            <div class="row">
                                                                <label for="inputEmail3"
                                                                       class="col-sm-9 col-form-label">11.
                                                                    Pasien mengalami Mati Batang Otak (MBO)</label>
                                                                <div class="col-sm-3">
                                                                    <input class="form-check-input" type="radio"
                                                                           name="fisiologi_11" value="ya" required>
                                                                    <label class="form-check-label me-2"
                                                                           for="gridRadios1">Ya</label>
                                                                    <input class="form-check-input" type="radio"
                                                                           name="fisiologi_11" value="tidak" required>
                                                                    <label class="form-check-label"
                                                                           for="gridRadios1">Tidak</label>
                                                                </div>
                                                            </div>
                                                            <input type="text" name="ket_11" class="form-control"
                                                                   placeholder="Keterangan"
                                                                   style="height: 2.5rem;padding: 0.3125rem 1rem;">
                                                        </div>
                                                        <div class="form-group mb-1">
                                                            <div class="row">
                                                                <label for="inputEmail3"
                                                                       class="col-sm-9 col-form-label">12.
                                                                    Pasien terminal/ ARDS stadium akhir</label>
                                                                <div class="col-sm-3">
                                                                    <input class="form-check-input" type="radio"
                                                                           name="fisiologi_12" value="ya" required>
                                                                    <label class="form-check-label me-2"
                                                                           for="gridRadios1">Ya</label>
                                                                    <input class="form-check-input" type="radio"
                                                                           name="fisiologi_12" value="tidak" required>
                                                                    <label class="form-check-label"
                                                                           for="gridRadios1">Tidak</label>
                                                                </div>
                                                            </div>
                                                            <input type="text" name="ket_12" class="form-control"
                                                                   placeholder="Keterangan"
                                                                   style="height: 2.5rem;padding: 0.3125rem 1rem;">
                                                        </div>
                                                        <div class="form-group mb-1">
                                                            <div class="row">
                                                                <label for="inputEmail3"
                                                                       class="col-sm-9 col-form-label">13.
                                                                    Pasien atau keluarga menolak dirawat lebih lanjut di
                                                                    ICU</label>
                                                                <div class="col-sm-3">
                                                                    <input class="form-check-input" type="radio"
                                                                           name="fisiologi_13" onclick="menolak(this)"
                                                                           value="ya" required>
                                                                    <label class="form-check-label me-2"
                                                                           for="gridRadios1">Ya</label>
                                                                    <input class="form-check-input" type="radio"
                                                                           name="fisiologi_13" onclick="menolak(this)"
                                                                           value="tidak" required>
                                                                    <label class="form-check-label"
                                                                           for="gridRadios1">Tidak</label>
                                                                </div>
                                                            </div>
                                                            <input type="text" name="ket_13" class="form-control"
                                                                   placeholder="Keterangan"
                                                                   style="height: 2.5rem;padding: 0.3125rem 1rem;">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="form-group mb-2" id="hasil_keluar">
                                                <label for="iduser">Hasil Pemeriksaan</label>
                                                <textarea name="hasil" rows="10" class="form-control" placeholder="Masukkan hasil pemeriksaan"></textarea>
                                            </div>
                                            <div class="form-group mb-2" id="keputusan_keluar">
                                                <label for="iduser">Keputusan</label>
                                                <select name="keputusan" class="form-control" required>
                                                    <option selected disabled>Pilih Keputusan</option>
                                                    <option value="Tetap Di ICU">Tetap Di ICU</option>
                                                    <option value="Keluar ICU">Keluar ICU</option>
                                                </select>
                                            </div>
                                            <div class="modal-footer border-top-0 d-flex">
                                                <button type="button" class="btn btn-danger light"
                                                        data-bs-dismiss="modal">Tutup</button>
                                                <button type="submit" name="add" class="btn btn-primary">Tambahkan
                                                    Data</button>
                                            </div>
                                        </form>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                    @endif
                </div>
                <div class="card-body" id="cetak">
                    <div class="table-responsive">
                        {{ csrf_field() }}

                        <table id="example3" class="display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Pasien</th>
                                    <th>Dokter</th>
                                    <th>Hasil</th>
                                    <th>Keputusan</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($viewData as $x)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $x->pasien()->Nama }}</td>
                                        <td>{{ $x->dokter()->name }}</td>
                                        <td>{{ $x->hasil }}</td>
                                        <td>{{ $x->keputusan }}</td>
                                        <td>{{ $x->created_at }}</td>
                                        <td>
                                            <a href="/detail-pemeriksaan/{{ $x->id }}" target="_blank"
                                               class="btn btn-primary shadow btn-xs sharp mx-1"
                                               title="Detail Pemeriksaan"><i class="fa fa-eye"></i></a>
                                        </td>
                                        {{-- <td>
                                            <div class="d-flex">
                                                <a class="btn btn-primary shadow btn-xs sharp me-1" title="Edit"
                                                    data-bs-toggle="modal" data-bs-target=".edit{{ $x->id }}"><i
                                                        class="fa fa-pencil-alt"></i></a>
                                                <a class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"
                                                        data-bs-toggle="modal"
                                                        data-bs-target=".delete{{ $x->id }}"></i></a>
                                                <div class="modal fade delete{{ $x->id }}" tabindex="-1"
                                                    role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog modal-sm">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Hapus Data</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal">
                                                                </button>
                                                            </div>
                                                            <div class="modal-body text-center"><i
                                                                    class="fa fa-trash"></i><br> Anda yakin ingin menghapus
                                                                data ini?<br>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger light"
                                                                    data-bs-dismiss="modal">Batalkan</button>
                                                                <a href="delete-school/{{ $x->id }}">
                                                                    <button type="submit" class="btn btn-danger shadow">
                                                                        Ya, Hapus Data!
                                                                    </button></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function menolak(element) {
            console.log(element.value);
            if (element.value == 'ya') {
                $('#hasil_keluar').hide();
                $('#keputusan_keluar').hide();
            } else {
                $('#hasil_keluar').show();
                $('#keputusan_keluar').show();
            }
        }
    </script>
@endsection
