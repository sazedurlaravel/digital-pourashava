<div class="row">
  <!-- picture -->
    <div class="form-group col-md-6 row">
        <div class="col-md-10">
            <x-label for="image">পিকচার </x-label>
            <input type='file' name="image" class="form-control @error('image') is-invalid @enderror"
                onchange="seba_list_image(this);" />

            @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>
        <div class="col-md-2 mt-4">
            @if (Request::routeIs('admin.sebas.create'))
                <img id="seba_list" src="" class="img img-thumbnail mb-2" style="width: 100px;">
            @else
                <img id="seba_list"
                    src="{{ asset('uploads/' . $seba->image) }}"
                    class="img img-thumbnail mb-2" style="width: 100px;">
            @endif

        </div>
    </div>
      <div class="form-group col-md-6">
          <x-label for="title" :require="true"> শিরোনাম </x-label>
          <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="title"    value="{{ old('title', isset($seba) ? $seba->title : '') }}"  required autofocus>
          @error('name')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
      </div>
    </div>
    <div class="form-group float-right">
        <a href="{{ route('admin.home') }}" class="btn btn-danger"> ক্যান্সেল </a>
        <button type="submit" class="btn btn-info"> <i class="fa fa-save mr-1"></i> সেভ করুন </button>
    </div>
