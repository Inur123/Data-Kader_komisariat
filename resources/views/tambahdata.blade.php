@extends('layouts.admin')
@push('css')
<link rel="icon" href="http://hmikomfitrah.or.id/assets/img/rocket.png" type="image/gif" sizes="16x16">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

@endpush
@section('content')
<body>
 
    <br>
    <h1 class="text-center mb-5  mt-5">TAMBAH DATA KADER HMI KOMISARIAT FITRAH</h1>
    
    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <form action="/insertdata" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                    <label for="inputEmail4">Nama Lengkap</label>
                                    <input type="text" class="form-control" name="nama" id="inputEmail4" required>
                              </div>
                                <div class="form-grup col-md-6">
                                    <label for="exampleInputEmail1" class="form-label">Jenjang Perkaderan</label>
                                    <input type="text" name="jenjangperkaderan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                </div> 
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
                                    <select class="form-select" name="jeniskelamin" aria-label="Default select example" required>
                                        <option selected>Pilih Jenis Kelamin</option>
                                        <option value="lakilaki">Laki-Laki</option>
                                        <option value="perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-grup col-md-6">
                                    <label for="exampleInputEmail1" class="form-label">Fakultas</label>
                                    <select class="form-select" name="fakultas" aria-label="Default select example" required>
                                    <option selected>Pilih Fakultas</option>
                                    <option value="Teknik">Teknik</option>
                                    <option value="fai">Fai</option>
                                    <option value="fisip">Fisip</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputAddress">No Telpone</label>
                                    <input type="text" name="notelpone" class="form-control" id="inputAddress" required">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputAddress">Prodi</label>
                                    <input type="text" name="prodi" class="form-control" id="inputAddress" required">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="inputAddress2">Alamat</label>
                                  <input type="text" name="alamat" class="form-control" id="inputAddress2" required">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1" class="form-label">Masukkan Foto</label>
                                    <input type="file" name="foto" class="form-control" required>
                                </div> 
                            </div>                           
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <a href="/kader" class="btn btn-danger">Back</a>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- script --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
  </body>
  
@endsection