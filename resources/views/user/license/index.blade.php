<x-user.app-layout>

    <x-slot name="tabTitle">Lincense</x-slot>

    <x-slot name="header">
        <x-admin.content-header>
            <x-slot name="title">
                <h1>  লাইসেন্স </h1>
            </x-slot>
            <a href="{{ route('pourashava_frontend.user.license.renew' ,Request::route('pourashava_slug')) }}" class="btn btn-primary"> <i class="fas fa-plus mr-1"></i> লাইসেন্স নবায়ন</a>
        </x-admin.content-header>
    </x-slot>

    <div class="card card-info">
        
        <div class="card-body">
            <table id="data_table" class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th> সিরিয়াল </th>
                        <th> শুরু </th>
                        <th>  শেষ   </th>
                        <th> স্ট্যাটাস </th>
                        <th> অ্যাকশন </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($licenses as $license)
                    <tr>
                        <td> {{ ++$loop->index }} </td>
                        <td> {{ $license->start_year }} </td>
                        <td> {{ $license->end_year }} </td>
                        <td> @if ($license->status == 0)
                            <a href="#" class="badge badge-warning">Pending</a>
                            @else
                            <a href="#" class="badge badge-success">Success</a>
                            @endif
                        
                        <td>
                            <div class="dropdown">
                                <a class="d-block" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-align-left"></i>
                                </a>

                                <div  @if ($license->status == 1) class="dropdown-menu dropdown-menu-right"  @endif aria-labelledby="dropdownMenuLink">
                                
                                   
                                    @if ($license->status == 1)
                                    <a class="dropdown-item" href="{{ route('pourashava_frontend.user.license.renew',Request::route('pourashava_slug')) }}"> পিডিএফ  </a>
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