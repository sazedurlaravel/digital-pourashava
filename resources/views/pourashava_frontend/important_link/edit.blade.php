<x-admin.app-layout>

    <x-slot name="tabTitle">গুরুত্বপূর্ণ লিঙ্ক</x-slot>

    <x-slot name="header">
        <x-admin.content-header>
            <x-slot name="title">
                <h1>গুরুত্বপূর্ণ লিঙ্ক</h1>
            </x-slot>
            <a href="{{ url()->previous() }}" class="btn btn-primary"> ফিরে যান </a>
        </x-admin.content-header>
    </x-slot>

    <div class="card card-info">
        <div class="card-body">

           {{ Form::model($important_link, ['route'=>['admin.settings.important_links.update',$important_link->id],'method'=>'put', 'class'=>'form-horizontal','enctype'=>'multipart/form-data']) }}
           @include('pourashava_frontend.important_link.form',['buttonText'=>'আপডেট  করুন '])
          {{ Form::close() }}
        </div>
        <!-- /.card-body -->
    </div>

</x-admin.app-layout>
