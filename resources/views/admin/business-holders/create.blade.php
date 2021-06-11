<x-admin.app-layout>

    <x-slot name="tabTitle"> ব্যবসায়িক সেবা ব্যবহারকারী </x-slot>

    <x-slot name="header">
        <x-admin.content-header>
            <x-slot name="title">
                <h1> ব্যবসায়িক সেবা ব্যবহারকারী </h1>
            </x-slot>
            <a href="{{ url()->previous() }}" class="btn btn-primary"> ফিরে যান </a>
        </x-admin.content-header>
    </x-slot>

    <div class="card card-info">
        <div class="card-body">
             {{ Form::open(['route'=>['admin.business_holders.store'],'method'=>'post', 'class'=>'form-horizontal','enctype'=>'multipart/form-data']) }}
               @include('admin.business-holders.form',['buttonText'=>'সেভ করুন '])

           {{ Form::close() }}

        </div>
        <!-- /.card-body -->
    </div>
   
   
    @push('scripts')
    <script> 
     $(document).ready(function(){
            $('input[type="checkbox"]').click(function(){

                let  permanent_address = $('#permanent_address').val()
                if($(this).prop("checked") == true){
                    $('#present_address').prop('readonly', true);

                    if(!permanent_address){
                        $('p.text-danger').show();
                    }else{
                        $('p.text-danger').hide(); 
                        $('#present_address').val(permanent_address);
                    }
                   
                   
                    
                }
                else if($(this).prop("checked") == false){
                    $('#present_address').prop('readonly', false);
                   
                    $("#present_address").val('')
                }
            });
        });
    </script>
  @endpush
    

</x-admin.app-layout>