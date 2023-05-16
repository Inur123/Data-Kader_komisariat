@extends('layouts.admin')
@push('css')
<link rel="icon" href="http://hmikomfitrah.or.id/assets/img/rocket.png" type="image/gif" sizes="16x16">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

@endpush
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard v2</h1>
        </div><!-- /.col -->
      
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <div class="container">
    <a href="/tambahkader"class="btn btn-success">Tambah +</a>
    {{-- {{ Session::get('halaman_url') }} --}}
   <div class="row g-3 align-items-center mt-1 mb-2">
    <div class="col-auto"> 
      <form action="/kader" method="GET">
        <input type="search" name="search" class="form-control">
      </form>
    </div>
  
    <div class="col-auto">
      <a href="/exportpdf"class="btn btn-info">Export PDF</a>
    </div>
   </div>
    <div class="row">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">No Telpone</th>
                <th scope="col">Alamat</th>
                <th scope="col">Jenjang Perkaderan</th>
                <th scope="col">Fakultas</th>
                <th scope="col">Prodi</th>
                <th scope="col">Foto</th>
                <th scope="col">Dibuat</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @php
              $no = 1;    
              @endphp
  
              @foreach ($data as $index => $row)
              <tr>
                <th scope="row">{{ $index + $data->firstItem() }}</th>
                <td>{{ $row->nama }}</td>
                <td>{{ $row->jeniskelamin }}</td>
                <td>{{ $row->notelpone }}</td>
                <td>{{ $row->alamat }}</td>
                <td>{{ $row->jenjangperkaderan }}</td>
                <td>{{ $row->fakultas }}</td>
                <td>{{ $row->prodi }}</td>
                <td>
                  <img src="{{ asset('fotokader/'.$row->foto) }}" alt="" style="width: 50px; height: 50px;">
                </td>
                <td>{{ $row->created_at->format('D M Y') }}</td>
            
                <td>
                  <a href="/tampilkandata/{{ $row->id }}" type="button" class="btn btn-info">Edit</a>
                  <a href="#" class="btn btn-danger delete" data-id="{{ $row->id }}" data-nama="{{ $row->nama }}">Hapus</a>
                </td>
              </tr>
              @endforeach
              
            </tbody>
          </table>
          {{ $data->links() }}
    </div>
  </div>
</div>


@endsection

@push('scripts')
        {{-- script --}}
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
              $('.delete').click(function(){
                  var kaderid = $(this).attr('data-id');
                  var nama = $(this).attr('data-nama');
                          swal({
                                  title: "Yakin ?",
                                  text: "Kamu akan menghapus kader "+nama+"",
                                  icon: "warning",
                                  buttons: true,
                                  dangerMode: true,
                              })
                  .then((willDelete) => {
                  if (willDelete) {
                      window.location = "/delete/"+kaderid+""
                      swal("Data berhasil di hapus", {
                      icon: "success",
                      });
                  } else {
                      swal("Data tidak jadi di hapus");
                  }
                  });
              });
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
        <script>
          @if(Session::has('success'))
              toastr.success("{{ Session::get('success') }}")
          @endif
      </script>
@endpush