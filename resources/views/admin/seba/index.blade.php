<x-admin.app-layout>

    <x-slot name="tabTitle">সেবা</x-slot>

    <x-slot name="header">
        <x-admin.content-header>
            <x-slot name="title">
                <h1>সেবা</h1>
            </x-slot>

                  <a href="{{ route('admin.sebas.create') }}" class="btn btn-primary"> <i class="fas fa-plus mr-1"></i>নতুন সেবা</a>

        </x-admin.content-header>
    </x-slot>

    <div class="card card-info">
        <div class="card-body">

            <table id="data_table" class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th> সিরিয়াল </th>
                        <th> শিরোনাম </th>
                        <th> ছবি </th>
                        <th> অ্যাকশন </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($sebas as $seba)
                        <tr>
                            <td> {{ ++$loop->index }} </td>
                            <td> {{ $seba->title }} </td>
                            <td> <img src="{{ Storage::url($seba->image) }}" class="img img-thumbnail mb-2"
                                  style="width: 100px;"> </td>
                            <td>
                                <div class="dropdown">
                                    <a class="d-block" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-align-left"></i>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                        @if (auth()->user()->hasRole('super_admin'))
                                        <a class="dropdown-item" href="{{ route('admin.sebas.edit', $seba->id) }}"> এডিট </a>
                                        @endif
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        <!-- /.card-body -->
    </div>


</x-admin.app-layout>
