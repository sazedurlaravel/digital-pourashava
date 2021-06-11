<x-admin.app-layout>

    <x-slot name="tabTitle">ব্যবহারকারীর কার্ড</x-slot>

    <x-slot name="header">
        <x-admin.content-header>
            <x-slot name="title">
                <h1> ব্যবহারকারীর কার্ড </h1>
            </x-slot>
            <a onclick="userCard_form('ব্যবহারকারী কার্ড', '{{ route('admin.settings.user-card.store') }}')" data-toggle="modal" data-target="#userCardForm" href="#" class="btn btn-primary"> <i class="fas fa-plus mr-1"></i> ব্যবহারকারীর কার্ড </a>
        </x-admin.content-header>
    </x-slot>

    <div class="card card-info">
        <div class="card-body">
            
            <table id="data_table" class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th> সিরিয়াল </th>
                        <th> কার্ড নাম্বার </th>
                        <th> পিন নাম্বার </th>
                        <th> অ্যাকশন </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($userCards as $userCard)
                        <tr>
                            <td> {{ ++$loop->index }} </td>
                            <td> {{ $userCard->card_no }} </td>
                            <td> {{ $userCard->pin_no }} </td>
                            <td>
                                <div class="dropdown">
                                    <a class="d-block" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-align-left"></i>
                                    </a>
                                  
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                      <a href="#"> পিডিএফ তৈরি করুন </a>
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

    {{-- userCard form modal --}}
    <div class="modal fade" id="userCardForm" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="userCardFormLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userCardFormLabel">
                        ব্যবহারকারীর কার্ড
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="userCardFormTag" method="POST">
                        @csrf

                        <div id="new_input" class="form-group">
                            <x-label for="userCard_name" :require="true">কার্ডের পরিমান</x-label>
                            <div class="input-group mb-2">
                                <input type="text" name="amount" class="form-control @error('amount') is-invalid @enderror" id="userCard_name" value="{{ old('amount') }}" required>
                                @error('amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="float-right">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"> ক্যান্সেল </button>
                            <button type="submit" class="btn btn-primary"> সেভ করুন </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            // userCard form manipulate
            function userCard_form(name, form_url, userCard_name = null) {
                $("#userCardFormTag").attr("action", form_url)
                $("#userCardFormLabel").text(name)
                if(userCard_name) {
                    // put method is not exist, add this field
                    if(! $('#put_method').length){
                        let put_method_field = `<input type='hidden' name='_method' id='put_method' value='put' />`
                        $("#userCardFormTag").prepend(put_method_field)
                    }
                    
                    // userCard value added in input field
                    $("#userCard_name").val(userCard_name)

                } else {
                    if($('#put_method').length) {
                        // put method is exist, remove this field
                        $("#put_method").remove();
                    }
                }
            }
        </script>
    @endpush

</x-admin.app-layout>