<x-admin.app-layout>

    <x-slot name="tabTitle">নোটিশ</x-slot>

    <x-slot name="header">
        <x-admin.content-header>
            <x-slot name="title">
                <h1>নোটিশ</h1>
            </x-slot>
            <a href="{{ url()->previous() }}" class="btn btn-primary"> ফিরে যান </a>
        </x-admin.content-header>
    </x-slot>

    <div class="card card-info">
        <div class="card-body">

           {{ Form::model($notice, ['route'=>['admin.settings.notics.update',$notice->id],'method'=>'put', 'class'=>'form-horizontal','enctype'=>'multipart/form-data']) }}
           @include('pourashava_frontend.notice.form',['buttonText'=>'আপডেট  করুন '])
          {{ Form::close() }}
        </div>
        <!-- /.card-body -->
    </div>

</x-admin.app-layout>
