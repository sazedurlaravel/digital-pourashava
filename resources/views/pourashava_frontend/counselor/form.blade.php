  <div class="row">

                <!-- picture -->
                <div class="form-group col-md-6 row">
                    <div class="col-md-10">
                        <x-label for="image"> প্রোফাইল পিকচার </x-label>
                        <input type='file' name="image" class="form-control @error('image') is-invalid @enderror"
                            onchange="counselor_lists_image(this);" />

                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                    <div class="col-md-2 mt-4">
                        @if (Request::routeIs('admin.settings.counselor_lists.create'))
                            <img id="counselor_lists" src="" class="img img-thumbnail mb-2" style="width: 100px;">
                        @else
                            <img id="digital_center_admin"
                                src="{{ asset('uploads/' . $counselor->picture) }}"
                                class="img img-thumbnail mb-2" style="width: 100px;">
                        @endif

                    </div>
                </div>

                <!-- name -->
                <div class="form-group col-md-6">
                    <x-label for="name" :require="true"> নাম </x-label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name"
                        value="{{ old('name', isset($counselor) ? $counselor->name : '') }}"
                        required autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group float-right">
                <a href="{{ route('admin.settings.counselor_lists.index') }}" class="btn btn-danger"> ক্যান্সেল </a>
                <button type="submit" class="btn btn-info"> <i class="fa fa-save mr-1"></i> সেভ করুন </button>
            </div>
            </form>

        </div>
        <!-- /.card-body -->
    </div>
