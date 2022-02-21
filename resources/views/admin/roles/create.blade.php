@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.role.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.roles.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.role.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.role.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="permissions">{{ trans('cruds.role.fields.permissions') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('permissions') ? 'is-invalid' : '' }}" name="permissions[]" id="permissions" multiple required>
                    @foreach($permissions as $id => $permission)
                        <option value="{{ $id }}" {{ in_array($id, old('permissions', [])) ? 'selected' : '' }}>{{ $permission }}</option>
                    @endforeach
                </select>
                @if($errors->has('permissions'))
                    <div class="invalid-feedback">
                        {{ $errors->first('permissions') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.role.fields.permissions_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="price">{{ trans('cruds.role.fields.price') }}</label>
                <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="number" name="price" id="price" value="{{ old('price', '') }}" step="0.01" required>
                @if($errors->has('price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('price') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.role.fields.price_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="features">{{ trans('cruds.role.fields.features') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('features') ? 'is-invalid' : '' }}" name="features" id="features">{!! old('features') !!}</textarea>
                @if($errors->has('features'))
                    <div class="invalid-feedback">
                        {{ $errors->first('features') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.role.fields.features_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.role.fields.validity') }}</label>
                <select class="form-control {{ $errors->has('validity') ? 'is-invalid' : '' }}" name="validity" id="validity" required>
                    <option value disabled {{ old('validity', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Role::VALIDITY_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('validity', 'Monthly') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('validity'))
                    <div class="invalid-feedback">
                        {{ $errors->first('validity') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.role.fields.validity_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="products_limit">{{ trans('cruds.role.fields.products_limit') }}</label>
                <input class="form-control {{ $errors->has('products_limit') ? 'is-invalid' : '' }}" type="number" name="products_limit" id="products_limit" value="{{ old('products_limit', '50') }}" step="1" required>
                @if($errors->has('products_limit'))
                    <div class="invalid-feedback">
                        {{ $errors->first('products_limit') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.role.fields.products_limit_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="shop_limit">{{ trans('cruds.role.fields.shop_limit') }}</label>
                <input class="form-control {{ $errors->has('shop_limit') ? 'is-invalid' : '' }}" type="number" name="shop_limit" id="shop_limit" value="{{ old('shop_limit', '1') }}" step="1" required>
                @if($errors->has('shop_limit'))
                    <div class="invalid-feedback">
                        {{ $errors->first('shop_limit') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.role.fields.shop_limit_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="customers_limit">{{ trans('cruds.role.fields.customers_limit') }}</label>
                <input class="form-control {{ $errors->has('customers_limit') ? 'is-invalid' : '' }}" type="number" name="customers_limit" id="customers_limit" value="{{ old('customers_limit', '1') }}" step="1" required>
                @if($errors->has('customers_limit'))
                    <div class="invalid-feedback">
                        {{ $errors->first('customers_limit') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.role.fields.customers_limit_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="orders_limit">{{ trans('cruds.role.fields.orders_limit') }}</label>
                <input class="form-control {{ $errors->has('orders_limit') ? 'is-invalid' : '' }}" type="number" name="orders_limit" id="orders_limit" value="{{ old('orders_limit', '100') }}" step="1" required>
                @if($errors->has('orders_limit'))
                    <div class="invalid-feedback">
                        {{ $errors->first('orders_limit') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.role.fields.orders_limit_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.role.fields.stock_management') }}</label>
                <select class="form-control {{ $errors->has('stock_management') ? 'is-invalid' : '' }}" name="stock_management" id="stock_management" required>
                    <option value disabled {{ old('stock_management', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Role::STOCK_MANAGEMENT_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('stock_management', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('stock_management'))
                    <div class="invalid-feedback">
                        {{ $errors->first('stock_management') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.role.fields.stock_management_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.role.fields.new_courier_add') }}</label>
                <select class="form-control {{ $errors->has('new_courier_add') ? 'is-invalid' : '' }}" name="new_courier_add" id="new_courier_add" required>
                    <option value disabled {{ old('new_courier_add', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Role::NEW_COURIER_ADD_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('new_courier_add', 'Yes') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('new_courier_add'))
                    <div class="invalid-feedback">
                        {{ $errors->first('new_courier_add') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.role.fields.new_courier_add_helper') }}</span>
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
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.roles.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $role->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

@endsection
