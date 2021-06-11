<x-admin.app-layout>

    <x-slot name="tabTitle">প্রধান মেয়র</x-slot>

    <x-slot name="header">
        <x-admin.content-header>
            <x-slot name="title">
                <h1>প্রধান মেয়র</h1>
            </x-slot>

                  <a href="{{ route('admin.settings.main_mayors.create') }}" class="btn btn-primary"> <i class="fas fa-plus mr-1"></i> নতুন পৌরসভা তথ্য</a>

        </x-admin.content-header>
    </x-slot>

    <div class="card card-info">
        <div class="card-body">

            <table id="data_table" class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th> সিরিয়াল </th>
                        <th> নাম </th>
                        <th> পিকচার </th>
                        <th> ঠিকানা </th>
                        <th> অ্যাকশন </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($main_mayors as $mainmayor)
                        <tr>
                            <td> {{ ++$loop->index }} </td>
                            <td> {{ $mainmayor->name }} </td>
                            <td> {{ $mainmayor->facebook_url }} </td>
                            <td> {{ $mainmayor->address }} </td>
                            <td>
                                <div class="dropdown">
                                    <a class="d-block" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-align-left"></i>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">

                                        <a class="dropdown-item" href="{{ route('admin.settings.main_mayors.edit', $mainmayor->id) }}"> এডিট </a>

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
