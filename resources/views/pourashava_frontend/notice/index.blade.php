<x-admin.app-layout>

    <x-slot name="tabTitle"> নোটিশ </x-slot>

    <x-slot name="header">
        <x-admin.content-header>
            <x-slot name="title">
                <h1>নোটিশ</h1>
            </x-slot>
            <a href="{{ route('admin.settings.notics.create') }}" class="btn btn-primary"> <i
                    class="fas fa-plus mr-1"></i> নতুন নোটিশ </a>
        </x-admin.content-header>
    </x-slot>

    <div class="card card-info">
        <div class="card-body">

            <table id="data_table" class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th> সিরিয়াল </th>
                        <th> নাম </th>
                        <th>পিকচার </th>
                        <th>বিশদ</th>
                        <th> অ্যাকশন </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($notices as $notice)
                    <tr>
                        <td> {{ ++$loop->index }} </td>
                        <td>  {{$notice->name}}  </td>
                        <td> <img src="{{ Storage::url($notice->file) }}" class="img img-thumbnail mb-2"
                              style="width: 100px;"> </td>
                        <td>  {{$notice->details}}  </td>
                        <td>
                            <div class="dropdown">
                                <a class="d-block" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-align-left"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item"
                                        href="{{ route('admin.settings.notics.edit', $notice) }}">
                                        এডিট </a>
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
