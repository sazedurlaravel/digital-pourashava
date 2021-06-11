<div class="row">
              <!-- picture -->
              <div class="form-group col-md-6 row">
                  <div class="col-md-10">
                      <x-label for="image"> প্রোফাইল পিকচার </x-label>
                      <input type='file' name="image" class="form-control @error('image') is-invalid @enderror"
                          onchange="main_mayor_image(this);" />

                      @error('image')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror

                  </div>
                  <div class="col-md-2 mt-4">
                      @if (Request::routeIs('admin.settings.main_mayors.create'))
                          <img id="main_mayor" src="" class="img img-thumbnail mb-2" style="width: 100px;">
                      @else
                          <img id="main_mayor"
                              src="{{ asset('uploads/' . $main_mayor->image) }}"
                              class="img img-thumbnail mb-2" style="width: 100px;">
                      @endif

                  </div>
              </div>

              <!-- name -->
              <div class="form-group col-md-6">
                  <x-label for="name" :require="true"> নাম </x-label>
                  <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name"
                      value="{{ old('name', isset($main_mayor) ? $main_mayor->name : '') }}"
                      required autofocus>
                  @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
              <div class="form-group col-md-6">
                  <x-label for="title" :require="true"> শিরোনাম </x-label>
                  <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title"
                      value="{{ old('title', isset($main_mayor) ? $main_mayor->title : '') }}"
                      required autofocus>
                  @error('title')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
              <div class="form-group col-md-6">
                  <x-label for="paurashava_name" :require="true">পৌরসভা নাম </x-label>
                  <input type="text" name="paurashava_name" class="form-control @error('paurashava_name') is-invalid @enderror" id="paurashava_name"
                      value="{{ old('paurashava_name', isset($main_mayor) ? $main_mayor->paurashava_name : '') }}"
                      required autofocus>
                  @error('paurashava_name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
              <div class="form-group col-md-6">
                  <x-label for="address" :require="true"> ঠিকানা </x-label>
                  <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="address"
                      value="{{ old('address', isset($main_mayor) ? $main_mayor->address : '') }}"
                      required autofocus>
                  @error('address')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
              <div class="form-group col-md-6">
                  <x-label for="welcome_message" :require="true"> স্বাগত বার্তা </x-label>
                  <input type="text" name="welcome_message" class="form-control @error('welcome_message') is-invalid @enderror" id="welcome_message"
                      value="{{ old('welcome_message', isset($main_mayor) ? $main_mayor->welcome_message : '') }}"
                      required autofocus>
                  @error('welcome_message')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
          </div>

          <div class="form-group float-right">
              <a href="{{ route('admin.settings.main_mayors.index') }}" class="btn btn-danger"> ক্যান্সেল </a>
              <button type="submit" class="btn btn-info"> <i class="fa fa-save mr-1"></i> সেভ করুন </button>
          </div>
          </form>

      </div>
      <!-- /.card-body -->
  </div>
