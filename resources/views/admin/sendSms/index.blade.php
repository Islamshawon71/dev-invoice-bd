@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-lg-6 col-6">
                Total <span class="count">0</span> {{ trans('cruds.sendSms.title_singular') }} {{ trans('global.list') }}
            </div>
            <div class="col-lg-6 col-6 action-button">
                @can('role_create')
                    <a class="btn btn-sm btn-success float-right" href="{{ route('admin.send-sms.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.sendSms.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
    </div>

    <div class="card-body">
        <table class=" table table-bordered dt-responsive  nowrap w-100 table-hover ajaxTable datatable datatable-SendSms">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.sendSms.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.sendSms.fields.order') }}
                    </th>
                    <th>
                        {{ trans('cruds.sendSms.fields.customer_number') }}
                    </th>
                    <th>
                        {{ trans('cruds.sendSms.fields.sms_content') }}
                    </th>
                    <th>
                        {{ trans('cruds.sendSms.fields.status') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
            </thead>
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('send_sms_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.send-sms.massDestroy') }}",
    className: 'btn-sm btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.send-sms.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'order_invoice_number', name: 'order.invoice_number' },
{ data: 'customer_number', name: 'customer_number' },
{ data: 'sms_content', name: 'sms_content' },
{ data: 'status', name: 'status' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
    footerCallback: function ( ) {
        var api = this.api();
        var numRows = api.rows().count();
        $('.count').empty().append(numRows);
    }
  };
  let table = $('.datatable-SendSms').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

});

</script>
@endsection
