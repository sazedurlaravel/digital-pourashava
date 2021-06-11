<x-admin.app-layout>

    <x-slot name="tabTitle">Lincense</x-slot>

    <x-slot name="header">
        <x-admin.content-header>
            <x-slot name="title">
                <h1>  লাইসেন্স </h1>
            </x-slot>
        </x-admin.content-header>
    </x-slot>

    <div class="card card-info">
        
        <div class="card-body">
            <table id="data_table" class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th> সিরিয়াল </th>
                        <th> ব্যবহারকারীর নাম </th>
                        <th> শুরু </th>
                        <th> শেষ </th>
                        <th> টাকার পরিমান</th>
                        <th> স্ট্যাটাস </th>
                        <th> অ্যাকশন </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($license_request as $list)
                    <tr>
                        <td> {{ ++$loop->index }} </td>
                        <td> {{ $list->user->name }} </td>
                        <td> {{ $list->start_year }} </td>
                        <td> {{ $list->end_year }} </td>
                        <td> {{ $list->payable_amount }} </td>
                        <td> @if ($list->status == 0)
                            <a href="#" class="badge badge-warning">Pending</a>
                            @else
                            <a href="#" class="badge badge-success">Approved</a>
                            @endif
                        
                        <td>
                            <div class="dropdown">
                                <a class="d-block" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-align-left"></i>
                                </a>

                                <div  @if ($list->status ==0) class="dropdown-menu dropdown-menu-right"  @endif aria-labelledby="dropdownMenuLink">
                                
                                   
                                    @if ($list->status == 0)
                                    <a class="dropdown-item" href="{{ route('admin.user_license.approve',$list->id) }}">  এপ্রুভ   </a>
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

   
    @push('scripts')
        <script>
        
          
        </script>
    @endpush

</x-admin.app-layout>