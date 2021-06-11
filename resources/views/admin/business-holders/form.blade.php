<div class="row">
    @if (auth()->user()->hasRole('pourashava_admin') || auth()->user()->hasRole('digital_center_admin'))
        <div class="col-12 mb-2">
            <div class="bg-primary p-2 font-weight-bold"> ব্যক্তিগত তথ্য </div>
        </div>
        <!-- picture -->
        <div class="form-group col-md-6">
            @if (Request::routeIs('admin.business_holders.create'))
                <x-label for="picture" :require="true"> প্রোফাইল পিকচার </x-label>
            @else
                <x-label for="picture"> প্রোফাইল পিকচার </x-label>
            @endif
            <input type="file" name="picture" class="form-control @error('picture') is-invalid @enderror" id="picture">
            @error('picture')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <!-- name -->
        <div class="form-group col-md-6">
            <x-label for="name" :require="true"> ব্যবহারকারীর নাম </x-label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name"
                value="{{ old('name', isset($user) ? $user->name : '') }}" required autofocus>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <!-- email -->
        <div class="form-group col-md-6">
            <x-label for="email" :require="true"> ই-মেইল </x-label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email"
                value="{{ old('email', isset($user) ? $user->email : '') }}" required>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <!-- mobile -->
        <div class="form-group col-md-6">
            <x-label for="mobile" :require="true"> মোবাইল </x-label>
            <input type="text" name="mobile" class="form-control @error('mobile') is-invalid @enderror" id="mobile"
                value="{{ old('mobile', isset($user) ? $user->mobile : '') }}" required>
            @error('mobile')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <!-- father_or_husband_name -->
        <div class="form-group col-md-6">
            <x-label for="father_or_husband_name" :require="true"> পিতা/স্বামীর নাম </x-label>
            <input type="text" name="father_or_husband_name"
                class="form-control @error('father_or_husband_name') is-invalid @enderror" id="father_or_husband_name"
                value="{{ old('father_or_husband_name', isset($user) ? $user->father_or_husband_name : '') }}"
                required>
            @error('father_or_husband_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <!-- mother_name -->
        <div class="form-group col-md-6">
            <x-label for="mother_name" :require="true"> মায়ের নাম </x-label>
            <input type="text" name="mother_name" class="form-control @error('mother_name') is-invalid @enderror"
                id="mother_name" value="{{ old('mother_name', isset($user) ? $user->mother_name : '') }}" required>
            @error('mother_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- <!-- age -->
        <div class="form-group col-md-6">
            <x-label for="age" :require="true"> বয়স </x-label>
            <input type="number" name="age" class="form-control @error('age') is-invalid @enderror" id="age"
                value="{{ old('age', isset($user) ? $user->age : '') }}" required>
            @error('age')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div> --}}
        <!-- genger -->
        <div class="form-group col-md-6">
            <x-label for="age" :require="true"> লিঙ্গ</x-label>
            <br>
            {{ Form::radio('gender', 'Male', true) }}
            {{ Form::label('male', 'Male', ['class' => '']) }}
            {{ Form::radio('gender', 'Female', false) }}
            {{ Form::label('female', 'Female', ['class' => '']) }}
            {{ Form::radio('gender', 'Other', false) }}
            {{ Form::label('other', 'Other', ['class' => '']) }}
            @error('gender')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- @if (Request::routeIs('admin.business_holders.create')) --}}
        <!-- birth_day -->
        <div class="form-group col-md-6">
            <x-label for="birth_day" :require="true"> জন্ম তারিখ </x-label>
            <input type="date" name="birth_day" class="form-control @error('birth_day') is-invalid @enderror"
                id="birth_day" value="{{ old('birth_day', isset($user) ? $user->birth_day : '') }}" required>
            @error('birth_day')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <!-- nid_no -->
        <div class="form-group col-md-6">
            <x-label for="nid_no" :require="true"> জাতীয়তা পরিচয়পত্র নং </x-label>
            <input type="number" name="nid_no" class="form-control @error('nid_no') is-invalid @enderror" id="nid_no"
                value="{{ old('nid_no', isset($user) ? $user->nid_no : '') }}" required>
            @error('nid_no')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group col-md-6">
            <x-label for="ward_id"> ওয়ার্ড নং </x-label>

            {{ Form::select('ward_id', $wards, null, ['class' => 'form-control select2_global ', 'style' => 'width:100% !important', 'required', 'id' => 'ward_id', 'placeholder' => 'ওয়ার্ড নং নির্বাচন করুন']) }}

            @error('ward_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>


        {{-- <!-- village -->
        <div class="form-group col-md-6">
            <x-label for="village" :require="true"> গ্রামের নাম </x-label>
            {{ Form::select('village_id', $villages, null, ['class' => 'form-control select2_global ', 'style' => 'width:100% !important', 'required', 'id' => 'village_id', 'placeholder' => 'গ্রামের নাম নির্বাচন করুন']) }}

            @error('village_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div> --}}




        <!-- permanent_address -->
        <div class="form-group col-md-6">
            <x-label for="permanent_address" :require="true"> স্থায়ী ঠিকানা </x-label>
            {{ Form::textarea('permanent_address', null, ['class' => 'form-control', 'rows' => 2,'id'=>'permanent_address']) }}
            @error('permanent_address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <p class="text-danger" style="display: none">স্থায়ী ঠিকানা লিখুন।</p>
        </div>
        <!-- present_address -->
        <div class="form-group col-md-6">
            <x-label for="present_address" :require="true">
                   বর্তমান ঠিকানা
            </x-label>


            <input type="checkbox" class="" id=""> <span style="color: blue">(&#8730;  স্থায়ী ঠিকানার মত ) </span>
            {{ Form::textarea('present_address', null, ['class' => 'form-control', 'rows' => 2 ,'id'=>'present_address']) }}

            @error('present_address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <!-- user_registration_fees -->
        <div class="col-12 mb-2">
            <div class="bg-success p-2 font-weight-bold"> ব্যবসায়িক তথ্য </div>
        </div>
        <div class="form-group col-md-6">
            <x-label for="bussiness_name" :require="true"> ব্যবসার নাম </x-label>
            {{ Form::text('business_name', $user->businessHolderUser ? $user->businessHolderUser->business_address : null, ['class' => 'form-control', 'required']) }}
            @error('bussiness_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group col-md-6">
            <x-label for="business_address" :require="true"> ব্যবসার ঠিকানা </x-label>
            {{ Form::text('business_address', $user->businessHolderUser ? $user->businessHolderUser->business_address : null, ['class' => 'form-control', 'placeholder' => 'ব্যবসায়িক ঠিকানা']) }}
            @error('business_address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group col-md-6">
            <x-label for="business_tin_no"> ব্যবসায়িক টিন নং </x-label>
            {{ Form::number('business_tin_no', null, ['class' => 'form-control', 'required']) }}
            @error('business_tin_no')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <x-label for="owner_tin_no"> মালিকের টিন নং </x-label>
            {{ Form::number('owner_tin_no', null, ['class' => 'form-control', 'required']) }}
            @error('owner_tin_no')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <x-label for="ownership_type_id" :require="true"> মালিকানার ধরণ </x-label>
            {{ Form::select('', $ownership_types, null  ,['class'=>'form-control select2_global','id'=>'ownership_type_id','required','placeholder'=>'মালিকানার ধরণ নির্বাচন করুন'] )}}


            @error('ownership_type_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <x-label for="business_type_id" :require="true"> ব্যবসার ধরণ </x-label>
            {{ Form::select('business_type_id', $business_types,null,['class'=>'form-control select2_global','id'=>'business_type_id','required','placeholder'=>'ব্যবসার ধরণ নির্বাচন করুন'] )}}

            @error('business_type_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <div class="form-group col-md-6">
            <x-label for="capital_range_id" :require="true"> ব্যবসার মূলধন পরিসর </x-label>
            {{ Form::select('capital_range_id',[],null,['class'=>'form-control select2_global','id'=>'capital_range_id','required','placeholder'=>'মূলধন পরিসর নির্বাচন করুন'] )}}
            @error('capital_range_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group col-md-6">
            <x-label for="last_license_issued" :require="true"> সর্বশেষ লাইসেন্স ইস্যু </x-label>
            {!! Form::selectYear('last_license_issued', 2010, 2030, null, ['class' => 'form-control select2_global', 'style' => 'width:100% !important', 'required', 'placeholder' => 'বছর নির্বাচন করুন']) !!}
            @error('last_license_issued')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>



        <!-- user_registration_fees -->
        <div class="col-12 mb-2">
            <div class="bg-warning p-2 font-weight-bold"> লাইসেন্স ফি </div>
        </div>

        <!-- license_fees -->
        <div class="form-group col-md-6">
            <x-label for="license_fees" :require="true"> লাইসেন্স ফি (টাকায়) </x-label>
            {{ Form::number('licence_fee',null,['class'=>'form-control', 'id'=>"licence_fee",'readonly'] )}}

            @error('licence_fee')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group col-md-6">
            <x-label for="singboard_tax" :require="true"> সাইনবোর্ড টেক্স </x-label>
            {{ Form::number('singboard_tax',null,['class'=>'form-control', 'id'=>"singboard_tax",'readonly'] )}}

            @error('singboard_tax')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <!-- service_charge -->
        <div class="form-group col-md-6">
            <x-label for="service_charge" :require="true"> সার্ভিস ফি </x-label>
            {{ Form::number('service_charge',null,['class'=>'form-control', 'id'=>"service_charge",'readonly'] )}}

            @error('service_charge')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <!-- due -->
        <div class="form-group col-md-6">
            <x-label for="pay_from">ভ্যাট (লাইসেন্স ফি এর ১৫%) </x-label>
            {{ Form::text('vat',null,['class'=>'form-control', 'id'=>"vat",'readonly'] )}}

            @error('vat')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <!-- Total Amount -->
        <div class="form-group col-md-12">
             <div class="input-group mb-2 mr-sm-2">
                <div class="input-group-prepend">
                    <div class="input-group-text">টোটাল টাকা</div>
                </div>
              {{ Form::text('',null,['class'=>'form-control', 'id'=>"total_amount",'readonly'] )}}

             </div>
       </div>

    @endif
    @if (auth()->user()->hasRole('super_admin'))
        <div class="form-group col-md-6">
            <x-label for="card_id" :require="true"> কার্ড নং </x-label>
            {{ Form::select('card_id',$cards,null,['class'=>'form-control select2_global','id'=>'card_id','required','placeholder'=>'কার্ড নং নির্বাচন করুন'] )}}
            @error('card_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    @endif

</div>

<div class="form-group float-right">
    <a href="{{ route('admin.business_holders.index') }}" class="btn btn-danger"> ক্যান্সেল </a>
    <button type="submit" class="btn btn-info"> <i class="fa fa-save mr-1"></i> {{ $buttonText }} </button>
</div>
