<x-admin.app-layout>

    <x-slot name="tabTitle"> গুরুত্বপূর্ণ  প্রয়োগ </x-slot>

    <x-slot name="header">
        <x-admin.content-header>
            <x-slot name="title">
                <h1>গুরুত্বপূর্ণ  প্রয়োগ</h1>
            </x-slot>
            <a href="{{ route('admin.settings.important_applications.create') }}" class="btn btn-primary"> <i
                    class="fas fa-plus mr-1"></i> নতুন গুরুত্বপূর্ণ  প্রয়োগ </a>
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
                        <th> অ্যাকশন </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($important_applicaions as $important_application)
                    <tr>
                        <td> {{ ++$loop->index }} </td>
                        <td>  {{$important_application->name}}  </td>
                        <td> <img src="{{ Storage::url($important_application->file) }}" class="img img-thumbnail mb-2"
                              style="width: 100px;"> </td>
                        <td>
                            <div class="dropdown">
                                <a class="d-block" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-align-left"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item"
                                        href="{{ route('admin.settings.important_applications.edit', $important_application) }}">
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
