<x-admin.app-layout>

    <x-slot name="tabTitle"> সেবা ব্যবহারকারী </x-slot>

    <x-slot name="header">
        <x-admin.content-header>
            <x-slot name="title">
                <h1> সেবা ব্যবহারকারী </h1>
            </x-slot>
            <a href="{{ url()->previous() }}" class="btn btn-primary"> ফিরে যান </a>
        </x-admin.content-header>
    </x-slot>

    <div class="card">
        <div class="card-body">
            @if (Storage::exists($user->picture))
                <img src="{{ Storage::url($user->picture) }}" class="img img-thumbnail mb-2" style="width: 100px;">
            @endif
            <div class="row">



                <!-- name -->
                <div class="col-md-6 border p-3">
                    নাম: {{ $user->name }}
                </div>

                <!-- email -->
                <div class="col-md-6 border p-3">
                    ই-মেইল: {{ $user->email }}
                </div>

                <!-- mobile -->
                <div class="col-md-6 border p-3">
                    মোবাইল: {{ $user->mobile }}
                </div>

                <!-- father_or_husband_name -->
                <div class="col-md-6 border p-3">
                    পিতা/স্বামীর নাম: {{ $user->father_or_husband_name }}
                </div>

                <!-- mother_name -->
                <div class="col-md-6 border p-3">
                    মায়ের নাম: {{ $user->mother_name }}
                </div>

               
                <!-- birth_day -->
                <div class="col-md-6 border p-3">
                    জন্ম তারিখ: {{ $user->birth_day->format('Y-m-d') }}
                </div>

                <!-- nid_no -->
                <div class="col-md-6 border p-3">
                    জাতীয়তা পরিচয়পত্র নং: {{ $user->nid_no }}
                </div>

                <!-- division -->
                <div class="col-md-6 border p-3">

                    বিভাগ: {{ $user->pourashava->zila->division->name }}
                </div>

                <!-- zila -->
                <div class="col-md-6 border p-3">
                    জেলা: {{ $user->pourashava->zila->name }}
                </div>

                <!-- pourashava -->
                <div class="col-md-6 border p-3">
                    পৌরসভা: {{ $user->pourashava->name }}
                </div>

                <!-- post_code -->
                <div class="col-md-6 border p-3">
                    পোষ্ট কোড: {{ $user->post_code }}
                </div>

                <!-- word_no -->
                <div class="col-md-6 border p-3">
                    ওয়ার্ড নং: {{ $user->ward->number }}
                </div>

               
                <!-- permanent_address -->
                <div class="col-md-6 border p-3">
                    স্থায়ী ঠিকানা: {{ $user->permanent_address }}
                </div>
                <!-- permanent_address -->
                <div class="col-md-6 border p-3">
                    বর্তমান ঠিকানা: {{ $user->permanent_address }}
                </div>

                @if (auth()->user()->hasRole('super_admin'))

                    <div class="col-md-6 border p-3">
                        কার্ড নং: {{ $user->card_no }}
                    </div>

                    <div class="col-md-6 border p-3">
                        পিন নং: {{ $user->pin_no }}
                    </div>
                @endif


            </div>



            <div class="float-right mt-3">
                <a href="{{ route('admin.business_holders.index') }}" class="btn btn-danger"> ক্যান্সেল </a>
            </div>
            </form>

        </div>
        <!-- /.card-body -->
    </div>

</x-admin.app-layout>
