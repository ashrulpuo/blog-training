<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (Session::get('message'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('message') }}
                        </div>
                    @endif

                    <h2>
                        <center>Senarai blog</center>
                    </h2>
                    <button type="button" class="btn btn-primary float-end">Tambah Blog</button>
                    <table class="table table-striped table-responsive">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tajuk</th>
                                <th scope="col">Tarikh publish</th>
                                <th scope="col">Penulis</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($articles as $key => $article)
                                <tr>
                                    <td scope="row">{{ $key + 1 }}</td>
                                    <td>{{ $article->tajuk }}</td>
                                    <td>{{ $article->tarikh_publish }}</td>
                                    <td>{{ $article->penulis }}</td>
                                    <td>{{ $article->kategori }}</td>
                                    <td>
                                        <a href="{{ route('edit', $article->id) }}" type="button"
                                            class="btn btn-primary">Edit</a>
                                        <form action="{{ route('destroy', $article->id) }}" method="post"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit"
                                                onclick="return confirm('Adakah anda pasti ?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
