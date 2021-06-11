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
          {{ Form::model($seba, ['route'=>['admin.sebas.update',$seba->id],'method' => 'PUT', 'class'=>'form-horizontal','enctype'=>'multipart/form-data']) }}
          @include('admin.seba.form',['buttonText'=>'আপডেট  করুন '])
         {{ Form::close() }}
        </div>
        <!-- /.card-body -->
    </div>
</x-admin.app-layout>
