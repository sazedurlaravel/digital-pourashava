<x-admin.app-layout>

    <x-slot name="tabTitle">মেয়রবৃন্দ</x-slot>

    <x-slot name="header">
        <x-admin.content-header>
            <x-slot name="title">
                <h1>মেয়রবৃন্দ</h1>
            </x-slot>
            <a href="{{ url()->previous() }}" class="btn btn-primary"> ফিরে যান </a>
        </x-admin.content-header>
    </x-slot>

    <div class="card card-info">
        <div class="card-body">

           {{ Form::model($mayorlist, ['route'=>['admin.settings.mayor_lists.update',$mayorlist->id],'method'=>'put', 'class'=>'form-horizontal','enctype'=>'multipart/form-data']) }}
           @include('pourashava_frontend.mayorlist.form',['buttonText'=>'আপডেট  করুন '])
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
    function mayor_list_image(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#mayor_list')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

</script>
