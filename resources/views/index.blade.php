@extends('layout.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-auto col-md-10">
        <h2><center>Senarai blog</center></h2>
        <button type="button" class="btn btn-primary float-end">Tambah Blog</button>
        <table class="table table-striped table-responsive">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tajuk</th>
                    <th scope="col">Tarikh publish</th>
                    <th scope="col">Penulis</th>
                    <th scope="col">Kategori</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Laravel training course</td>
                    <td>24/12/2023</td>
                    <td>Mark</td>
                    <td>Programming</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Laravel training course</td>
                    <td>24/12/2023</td>
                    <td>Mark</td>
                    <td>Programming</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Laravel training course</td>
                    <td>24/12/2023</td>
                    <td>Mark</td>
                    <td>Programming</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection