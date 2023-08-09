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
Pasien
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Pasien</h4>

                <!-- center modal -->
                <div>
                    {{-- <button class="btn btn-info waves-effect waves-light mb-4" onclick="printDiv('cetak')"><i
                               class="fa fa-print"> </i></button> --}}
                    <!--<button class="btn btn-secondary waves-effect waves-light mb-4"><i class="fas fa-eye"
                                                                                                                                                                                                            title="Mode grid"> </i></button>-->
                    <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target=".modal" style="margin-bottom: 1rem;"><i class="mdi mdi-plus me-1"></i>Tambahkan Pasien</button>
                </div>


                <div class="modal fade modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah Pengguna</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="save-pasien" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="userid" value="{{ auth()->user()->id_user }}">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <label for="iduser">Nama</label>
                                                <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama" name="nama" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="iduser">Jenis Kelamin</label>
                                        <select class="default-select form-control wide" title="Jenis Kelamin" name="gender" required>
                                            <option value="-">Pilih Jenis Kelamin</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="iduser">Alamat</label>
                                        <input type="text" class="form-control" placeholder="Masukkan Alamat Pasien" name="alamat" required>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <label for="iduser">Tempat Lahir</label>
                                                <input type="text" class="form-control" placeholder="Masukkan Tempat Lahir" name="tempat_lahir" required>
                                            </div>
                                            <div class="col-xl-6">
                                                <label for="iduser">Tanggal Lahir</label>
                                                <input type="date" class="form-control" placeholder="Masukkan Tanggal Lahir" name="tanggal_lahir" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="iduser">No. HP</label>
                                        <input type="text" class="form-control" placeholder="Masukkan No. HP" name="no_hp" required>
                                    </div>
                                    <div class="modal-footer border-top-0 d-flex">
                                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" name="add" class="btn btn-primary">Tambah
                                            Data</button>
                                    </div>
                                </form>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
            </div>
            <div class="card-body">
                <div class="table-responsive" id="cetak">
                    {{ csrf_field() }}
                    <table id="example3" class="display" style="min-width: 845px">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($viewData as $x)
                            <tr>
                                <td>
                                    <img class="rounded-circle img-thumbnail" src="{{ asset('sipenmaru/images/ava.png') }}" alt="" width="45px" />
                                </td>
                                <td>{{ $x->Nama }}</td>
                                <td>
                                    @if ($x->Gender == 'Perempuan')
                                    <span class="badge badge-secondary">Perempuan</span>
                                    @elseif($x->Gender == 'Laki-laki')
                                    <span class="badge" style="background-color: rgb(81, 171, 255)">Laki-Laki</span>
                                    @endif
                                </td>
                                <td><strong>{{ $x->Alamat }}</strong></a></td>
                                <td><strong>{{ $x->status }}</strong></a></td>
                                <td>
                                    <div class="d-flex">
                                        <a class="btn btn-primary shadow btn-xs sharp" title="Edit" href="edit-user/{{ $x->Id_pasien }}"><i class="fa fa-pencil-alt"></i></a>
                                        <a href="delete-user/{{ $x->Id_pasien }}" class="btn btn-danger shadow btn-xs sharp mx-1" title="Hapus"><i class="fa fa-trash"></i></a>
                                        <div class="modal fade delete{{ $x->Id_pasien }}" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Hapus Data</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-center"><i class="fa fa-trash"></i><br> Apakah anda yakin ingin
                                                        menghapus data ini?<br> {{ $x->Id_pasien }}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Batalkan</button>
                                                        <a href="delete-user/{{ $x->Id_pasien }}">
                                                            <button type="submit" class="btn btn-danger shadow">
                                                                Ya, Hapus Data!
                                                            </button></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a class="btn btn-success shadow btn-xs sharp" target="_blank" title="History Pemeriksaan" href="/riwayat-pemeriksaan/{{ $x->Id_pasien }}"><i class="fa fa-eye"></i></a>
                                    </div>
                                </td>
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

@section('footer')
@endsection