@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.reply.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.replies.update", [$reply->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="ticket_id">{{ trans('cruds.reply.fields.ticket') }}</label>
                <select class="form-control select2 {{ $errors->has('ticket') ? 'is-invalid' : '' }}" name="ticket_id" id="ticket_id" required>
                    @foreach($tickets as $id => $entry)
                        <option value="{{ $id }}" {{ (old('ticket_id') ? old('ticket_id') : $reply->ticket->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('ticket'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ticket') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.reply.fields.ticket_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="reply">{{ trans('cruds.reply.fields.reply') }}</label>
                <textarea class="form-control {{ $errors->has('reply') ? 'is-invalid' : '' }}" name="reply" id="reply">{{ old('reply', $reply->reply) }}</textarea>
                @if($errors->has('reply'))
                    <div class="invalid-feedback">
                        {{ $errors->first('reply') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.reply.fields.reply_helper') }}</span>
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