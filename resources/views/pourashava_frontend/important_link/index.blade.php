<x-admin.app-layout>

    <x-slot name="tabTitle"> গুরুত্বপূর্ণ লিঙ্ক </x-slot>

    <x-slot name="header">
        <x-admin.content-header>
            <x-slot name="title">
                <h1>গুরুত্বপূর্ণ লিঙ্ক</h1>
            </x-slot>
            <a href="{{ route('admin.settings.important_links.create') }}" class="btn btn-primary"> <i
                    class="fas fa-plus mr-1"></i> নতুন গুরুত্বপূর্ণ লিঙ্ক </a>
        </x-admin.content-header>
    </x-slot>

    <div class="card card-info">
        <div class="card-body">

            <table id="data_table" class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th> সিরিয়াল </th>
                        <th> নাম </th>
                        <th>লিঙ্ক</th>
                        <th> অ্যাকশন </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($important_links as $important_link)
                    <tr>
                        <td> {{ ++$loop->index }} </td>
                        <td>  {{$important_link->name}}  </td>
                        <td>{{$important_link->url}}</td>
                        <td>
                            <div class="dropdown">
                                <a class="d-block" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-align-left"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item"
                                        href="{{ route('admin.settings.important_links.edit', $important_link) }}">
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
