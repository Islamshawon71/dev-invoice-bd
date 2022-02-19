@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.shop.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.shops.update", [$shop->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="shop_name">{{ trans('cruds.shop.fields.shop_name') }}</label>
                <input class="form-control {{ $errors->has('shop_name') ? 'is-invalid' : '' }}" type="text" name="shop_name" id="shop_name" value="{{ old('shop_name', $shop->shop_name) }}" required>
                @if($errors->has('shop_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('shop_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.shop.fields.shop_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="shop_address">{{ trans('cruds.shop.fields.shop_address') }}</label>
                <input class="form-control {{ $errors->has('shop_address') ? 'is-invalid' : '' }}" type="text" name="shop_address" id="shop_address" value="{{ old('shop_address', $shop->shop_address) }}" required>
                @if($errors->has('shop_address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('shop_address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.shop.fields.shop_address_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="shop_phone_number">{{ trans('cruds.shop.fields.shop_phone_number') }}</label>
                <input class="form-control {{ $errors->has('shop_phone_number') ? 'is-invalid' : '' }}" type="text" name="shop_phone_number" id="shop_phone_number" value="{{ old('shop_phone_number', $shop->shop_phone_number) }}" required>
                @if($errors->has('shop_phone_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('shop_phone_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.shop.fields.shop_phone_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="shop_logo">{{ trans('cruds.shop.fields.shop_logo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('shop_logo') ? 'is-invalid' : '' }}" id="shop_logo-dropzone">
                </div>
                @if($errors->has('shop_logo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('shop_logo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.shop.fields.shop_logo_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.shop.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Shop::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', $shop->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.shop.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
    Dropzone.options.shopLogoDropzone = {
    url: '{{ route('admin.shops.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="shop_logo"]').remove()
      $('form').append('<input type="hidden" name="shop_logo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="shop_logo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($shop) && $shop->shop_logo)
      var file = {!! json_encode($shop->shop_logo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="shop_logo" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
@endsection