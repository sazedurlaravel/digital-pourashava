  <div class="row">

                <!-- picture -->
                <div class="form-group col-md-6 row">
                    <div class="col-md-10">
                        <x-label for="file"> প্রোফাইল পিকচার </x-label>
                        <input type='file' name="file" class="form-control @error('file') is-invalid @enderror"
                            onchange="digital_center_admin_image(this);" />

                        @error('file')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                    <div class="col-md-2 mt-4">
                        @if (Request::routeIs('admin.settings.notics.create'))
                            <img id="digital_center_admin" src="" class="img img-thumbnail mb-2" style="width: 100px;">
                        @else
                            <img id="digital_center_admin"
                                src="{{ asset('uploads/' . $notice->file) }}"
                                class="img img-thumbnail mb-2" style="width: 100px;">
                        @endif

                    </div>
                </div>

                <!-- name -->
                <div class="form-group col-md-6">
                    <x-label for="name" :require="true"> নাম </x-label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name"
                        value="{{ old('name', isset($notice) ? $notice->name : '') }}"
                        required autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <!-- name -->
                <div class="form-group col-md-6">
                    <x-label for="details" :require="true"> নাম </x-label>
                    <input type="text" name="details" class="form-control @error('details') is-invalid @enderror" id="details"
                        value="{{ old('details', isset($notice) ? $notice->details : '') }}"
                        required autofocus>
                    @error('details')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group float-right">
                <a href="{{ route('admin.settings.notics.index') }}" class="btn btn-danger"> ক্যান্সেল </a>
                <button type="submit" class="btn btn-info"> <i class="fa fa-save mr-1"></i> সেভ করুন </button>
            </div>
            </form>

        </div>
        <!-- /.card-body -->
    </div>
