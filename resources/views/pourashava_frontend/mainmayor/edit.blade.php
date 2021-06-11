<x-admin.app-layout>

    <x-slot name="tabTitle">তথ্য</x-slot>

    <x-slot name="header">
        <x-admin.content-header>
            <x-slot name="title">
                <h1>  ড্যাশবোর্ড  </h1>
            </x-slot>
            <a href="{{ url()->previous() }}" class="btn btn-primary"> ফিরে যান </a>
        </x-admin.content-header>
    </x-slot>

    <div class="card card-info">
        <div class="card-body">

          {{ Form::model($mainmayor, ['route'=>['admin.settings.main_mayors.update',$mainmayor->id],'method' => 'PUT', 'class'=>'form-horizontal','enctype'=>'multipart/form-data']) }}
          @include('pourashava_frontend.mainmayor.form',['buttonText'=>'আপডেট  করুন '])
         {{ Form::close() }}
        </div>
        <!-- /.card-body -->
    </div>
</x-admin.app-layout>

<style>
    img {
        margin-top: 8px;
        max-width: 60px;
        max-height: 40px;
    }

</style>
<script type="text/javascript">
    function main_mayor_image(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#main_mayor')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

</script>
