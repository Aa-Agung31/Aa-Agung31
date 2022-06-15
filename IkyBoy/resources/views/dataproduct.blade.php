<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
    <h1 class="text-center mb-4 mt-4 ">DATA PRODUCT</h1>
    
        <div class="container">
            @if($massage = Session::get('success'))
                    <div class="alert alert-info" role="alert">
                        {{ $massage }}
                    </div>
             @endif
        <a href="/tambahproduct" type="button" class="btn btn-primary btn-sm">Tambah Data +</a>
            <div class="row">
                <table class="table">
                <thead>
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">foto</th>
                    <th scope="col">Harga Barang</th>
                    <th scope="col">Tanggal Dibuat</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php 
                        $no = 1;
                    @endphp

                    @foreach($data as $product)
                    <tr>
                        <th scope="row">{{$no++}}</th>
                        <td>{{$product->nama}}</td>
                        <td>
                            <img src="{{asset('fotopegawai/' .$product->foto)}}" style="width: 50px;">
                        </td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->created_at->diffForhumans()}}</td>
                        <td>{{$product->tanggal}}</td>
                        <td>
                          <!-- link Href Delete   -->
                        <!-- /deleteproduct/{{$product->id}} -->
                            <a href="#" class="btn btn-danger btn-sm deleteproduct" data-id="{{$product->id}}" data-nama="{{$product->nama}}">Delete</a>
                            <a href="/tampilkanproduct/{{$product->id}}" class="btn btn-info btn-sm">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
                </table>
            </div>
        </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
</body>
    <script>
     $('.deleteproduct').click(function(){
            var productid = $(this).attr('data-id');
            var nama = $(this).attr('data-nama');
            
            swal({
            title: "Yakin?",
            text: "Kamu Akan Menghapus Data Product Dengan Nama "+nama+" Dan ID "+productid+"",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                window.location = "deleteproduct/"+productid+""
                swal("Poof! Your imaginary file has been deleted!", {
                icon: "success",
                });
            } else {
                swal("Data Tidak Jadi Di Hapus");
            }
         });
        });

       
    </script>
</html>