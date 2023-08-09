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
Profil Pengguna
@endsection

@section('menu')
@auth
<ul class="metismenu" id="menu">
    <li><a href="index">
            <i class="fas fa-home"></i>
            <span class="nav-text">Beranda</span>
        </a>
    </li>
    @if (auth()->user()->role == 'Administrator')
    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
            <i class="fa fa-book"></i>
            <span class="nav-text">Data Master </span>
        </a>
        <ul aria-expanded="false">
            <li><a href="data-user">Pengguna</a></li>
            <li><a href="data-school">Sekolah</a></li>
            <li><a href="data-studyProgram">Program Studi</a></li>
        </ul>
    </li>
    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
            <i class="fa fa-database"></i>
            <span class="nav-text">Data Transaksi</span>
        </a>
        <ul aria-expanded="false">
            <li><a href="data-registration">Registrasi</a></li>
            <li><a href="data-payment">Pembayaran</a></li>
        </ul>
    </li>
    @elseif (auth()->user()->role == 'Calon Mahasiswa')
    <li><a href="data-registration" aria-expanded="false">
            <i class="fa fa-database"></i>
            <span class="nav-text">Pendaftaran</span>
        </a>
    </li>
    @endif
</ul>
@endauth
@endsection

@section('content')
<div class="row mb-4">
    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <div class="dropdown float-end">
                        <a class="text-body dropdown-toggle font-size-18" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"> <i class="uil uil-ellipsis-v"></i> </a>
                        <div class="dropdown-menu dropdown-menu-end"> <a class="dropdown-item" href="#profile-settings">Perbaharui Data</a> <a class="dropdown-item" href="profile">Segarkan</a>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div>
                        @foreach ($viewDataUser as $x)
                        @if (auth()->user()->email == $x->Email)
                        {{-- @if ($x->Foto != null)
                                        <img class="avatar-lg rounded-circle img-thumbnail" src="{{ url('/' . $x->Foto) }}"
                        alt="" width="100px" />
                        @else --}}
                        <img class="avatar-lg rounded-circle img-thumbnail" src="{{ asset('/sipenmaru/images/ava.png') }}" alt="" width="100px" />
                        {{-- @endif --}}
                        @endif
                        @endforeach
                        @if (auth()->user()->image != null)
                        <img style="width:100px; height:100px; border: 1px solid #dee2e6; border-radius:50%; object-fit: cover" src="{{ asset('image/'.auth()->user()->image ) }}" alt="" width="100px" />
                        @else
                        <img style="width:100px; height:100px; border: 1px solid #dee2e6; border-radius:50%; object-fit: cover" src="{{ asset('sipenmaru/images/ava.png') }}" alt="" width="100px" />
                        @endif
                    </div>
                    <h5 class="mt-3 mb-1">
                        {{ auth()->user()->name }}
                    </h5>
                    <p class="text-muted">
                        {{ auth()->user()->role }}
                    </p>
                    {{-- <div class="mt-4">
                            <a href="mailto:{{ auth()->user()->email }}"><button type="button" class="btn btn-primary btn-sm"><i class="uil uil-envelope-alt me-2"></i>
                        Kirim Pesan </button></a>
                </div> --}}
            </div>
            <hr class="my-4">
            <div class="text-muted">
                <div class="table-responsive mt-4">
                    @auth

                    <div>
                        <p class="mb-1">Nama :</p>
                        <h5 class="font-size-16">
                            {{ auth()->user()->name }}
                        </h5>
                    </div>
                    <div class="mt-4">
                        <p class="mb-1">No Hp :</p>
                        <h5 class="font-size-16">
                            {{auth()->user()->no_telp}}
                        </h5>
                    </div>
                    <div class="mt-4">
                        <p class="mb-1">E-mail :</p>
                        <h5 class="font-size-16">{{ auth()->user()->email }}</h5>
                    </div>
                    <div class="mt-4">
                        <p class="mb-1">Tampat Lahir</p>
                        <h5 class="font-size-16">{{ auth()->user()->tempat_lahir }}</h5>
                    </div>
                    <div class="mt-4">
                        <p class="mb-1">Tanggal Lahir</p>
                        <h5 class="font-size-16">{{ auth()->user()->tanggal_lahir }}</h5>
                    </div>
                    <div class="mt-4">
                        <p class="mb-1">Alamat</p>
                        <h5 class="font-size-16">{{ auth()->user()->Alamat }}</h5>
                    </div>

                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-8">
    <div class="card">
        <div class="card-body">
            <div class="profile-tab">
                <div class="custom-tab-1">
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a href="#profile-settings" data-bs-toggle="tab" class="nav-link active show">Profil</a>
                        </li>
                        <li class="nav-item"><a href="#acc-settings" data-bs-toggle="tab" class="nav-link">Perbaharui Sandi</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="profile-settings" class="tab-pane fade active show">
                            <div class="pt-3">
                                <div class="settings-form">
                                    <br>
                                    <h4 class="text-primary">Pengaturan Profil</h4>
                                    <form action="/edit-profile" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <input type="hidden" name="id" value="{{ auth()->user()->id }}">
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label">Nama</label>
                                                <input type="text" value="{{ auth()->user()->name }}" class="form-control" name="nama">

                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label">Email</label>
                                                <input type="email" value="{{ auth()->user()->email }}" class="form-control" name="email">
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label">No. Telp</label>
                                                <input type="text" class="form-control" name="telp" value="{{ auth()->user()->no_telp }}">

                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label">Jenis Kelamin</label>
                                                <select name="jk" class="form-control">
                                                    <option value="Laki-laki" {{ auth()->user()->jenis_kelamin == 'Laki-laki' ? 'selected':'' }}>Laki-laki</option>
                                                    <option value="Perempuan" {{ auth()->user()->jenis_kelamin == 'Perempuan' ? 'selected':'' }}>Perempuan</option>
                                                </select>
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label">Tempat Lahir</label>
                                                <input type="text" name="tempat_lahir" class="form-control" value="{{ auth()->user()->tempat_lahir }}">
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label">Tanggal Lahir</label>
                                                <input type="date" name="tanggal_lahir" class="form-control" value="{{ auth()->user()->tanggal_lahir }}">
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label class="form-label">Alamat</label>
                                                <input type="text" name="alamat" class="form-control" value="{{ auth()->user()->Alamat }}">
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label class="form-label">Foto Profile</label>
                                                <input type="file" name="image" class="form-control" style="height: unset;">
                                                <small class="text-danger">Kosongkan jika tidak merubah foto profile</small>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary" type="submit">Perbaharui Data</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div id="acc-settings" class="tab-pane fade">
                            <div class="pt-3">
                                <div class="settings-form">
                                    <br>
                                    <h4 class="text-primary">Perbaharui Sandi</h4>
                                    <form action="edit-pw/{{ auth()->user()->id }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id_user" class="form-control-file" value="{{ $x->Id_user }}">
                                        <input type="hidden" name="id" class="form-control-file" value="{{ auth()->user()->id }}">
                                        <!-- <div class="row">
                                                                                                    <div class="mb-3 col-md-6">
                                                                                                        <label class="form-label">Nama</label>
                                                                                                        <input type="text" value="{{ auth()->user()->name }}"
                                                                                                            class="form-control" name="name">
                                                                                                        @error('name')
        <div class="alert alert-warning" role="alert">
                                                                                                                                                                <strong>Warning!</strong>
                                                                                                                                                                {{ $message }}
                                                                                                                                                            </div>
    @enderror
                                                                                                    </div>
                                                                                                    <div class="mb-3 col-md-6">
                                                                                                        <label class="form-label">Email</label>
                                                                                                        <input type="email" value="{{ auth()->user()->email }}"
                                                                                                            class="form-control" name="email">
                                                                                                        @error('email')
        <div class="alert alert-warning" role="alert">
                                                                                                                                                                <strong>Warning!</strong>
                                                                                                                                                                {{ $message }}
                                                                                                                                                            </div>
    @enderror
                                                                                                    </div>
                                                                                                </div>-->
                                        <div class="mb-3 col-md-12">
                                            <label class="form-label">Kata Sandi Baru</label>
                                            <input type="hidden" name="userid" value="{{ auth()->user()->id_user }}">
                                            <input type="password" class="form-control" name="password">
                                            @error('password')
                                            <div class="alert alert-warning" role="alert">
                                                <strong>Warning!</strong>
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <button class="btn btn-primary" type="submit">Perbaharui Data</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- end row -->
@endsection

@section('footer')
@endsection