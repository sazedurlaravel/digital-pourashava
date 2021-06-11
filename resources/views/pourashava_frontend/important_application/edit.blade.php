<x-admin.app-layout>

    <x-slot name="tabTitle">গুরুত্বপূর্ণ  প্রয়োগ</x-slot>

    <x-slot name="header">
        <x-admin.content-header>
            <x-slot name="title">
                <h1>গুরুত্বপূর্ণ  প্রয়োগ</h1>
            </x-slot>
            <a href="{{ url()->previous() }}" class="btn btn-primary"> ফিরে যান </a>
        </x-admin.content-header>
    </x-slot>

    <div class="card card-info">
        <div class="card-body">

           {{ Form::model($important_application, ['route'=>['admin.settings.important_applications.update',$important_application->id],'method'=>'put', 'class'=>'form-horizontal','enctype'=>'multipart/form-data']) }}
           @include('pourashava_frontend.important_application.form',['buttonText'=>'আপডেট  করুন '])
          {{ Form::close() }}
        </div>
        <!-- /.card-body -->
    </div>

</x-admin.app-layout>
