  <div class="row">
                <!-- name -->
                <div class="form-group col-md-6">
                    <x-label for="name" :require="true"> নাম </x-label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name"
                        value="{{ old('name', isset($important_link) ? $important_link->name : '') }}"
                        required autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <x-label for="url" :require="true"> লিঙ্ক </x-label>
                    <input type="text" name="url" class="form-control @error('url') is-invalid @enderror" id="url"
                        value="{{ old('url', isset($important_link) ? $important_link->name : '') }}"
                        required autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group float-right">
                <a href="{{ route('admin.settings.important_links.index') }}" class="btn btn-danger"> ক্যান্সেল </a>
                <button type="submit" class="btn btn-info"> <i class="fa fa-save mr-1"></i> সেভ করুন </button>
            </div>
            </form>

        </div>
        <!-- /.card-body -->
    </div>
