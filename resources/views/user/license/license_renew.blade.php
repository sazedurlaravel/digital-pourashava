<x-user.app-layout>

    <x-slot name="tabTitle">License</x-slot>

    <x-slot name="header">
        <x-admin.content-header>
            <x-slot name="title">
                <h1>  লাইসেন্স </h1>
            </x-slot>
        </x-admin.content-header>
    </x-slot>

    <div class="card card-info">
        
        <div class="card-body">
            {{ Form::open(['route'=>['pourashava_frontend.user.license.apply', Request::route('pourashava_slug')],'method'=>'post', 'class'=>'form-horizontal','enctype'=>'multipart/form-data']) }}

            <div class="row">
                 <div class="form-group col-md-4">
                <x-label for="start_year" :require="true"> শুরু </x-label>
                {{ Form::number('start_year',$start_year, ['class' => 'form-control', 'id'=>'start_year','required','readonly']) }}

                @error('start_year')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
             <div class="form-group col-md-4">
                <x-label for="end_year" :require="true"> শেষ </x-label>
                {{ Form::selectYear('end_year', Carbon\Carbon::now()->format('Y'),2030,null,['class'=>'form-control select2_global','id'=>'end_year','required','placeholder'=>' বছর নির্বাচন করুন'] )}}
                
                @error('end_year')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
             </div>   
            
             <div class="form-group col-md-4">
                <x-label for="total_payable_amount"> টোটাল টাকা </x-label>
                {{ Form::number('',null,['class'=>'form-control ','id'=>'total_payable_amount','readonly'] )}}
                
            
             </div>   
          
              
        </div>
        
        <div class="form-group float-right">
            <a href="{{ route('pourashava_frontend.user.license', Request::route('pourashava_slug')) }}" class="btn btn-danger"> ক্যান্সেল </a>
            <button type="submit" class="btn btn-info"> <i class="fa fa-save mr-1"></i> আবেদন করুন </button>
        </div>
    
 
        {{ Form::close() }}
    
    </div>

   
    @push('scripts')
        <script>
        $("#end_year").change(function(){
            var end_year= $(this).val();
            var start_year= $('#start_year').val();
            var dataString = '{end_year:'+ end_year+',}';
           
             $.ajax({
                    type: "GET",
                    url: "{{ route('pourashava_frontend.user.license.get_amount', Request::route('pourashava_slug'))}}",
                    data: {end_year:end_year,start_year:start_year},
                    cache: false,
                    success: function(data){
                        $('#total_payable_amount').val(data);  
                    
                    } 
                });

          });
        </script>
    @endpush

</x-admin.app-layout>