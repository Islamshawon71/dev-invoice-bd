@extends('layouts.admin')
@section('content')

<style>
    .order-tabs > div {
        width: 100%;
        padding: 10px;
    }
    .order-tabs > div:first-child{
        padding-left: 0px;
    }
    .order-tabs > div:last-child{
        padding-right: 0px;
    }
    .order-tabs {
        display: flex;
    }
</style>
<div class="order-tabs">
    <div class="">
        <a href="{{ url('admin/orders') }}">
            <div class="card mb-0">
                <div class="card-body shadow">
                    <h5 class="mb-2">All Orders</h5>
                    <h4 class="mb-1">
                        <span class="counter-value all-orders">0</span>
                    </h4>
                </div>
            </div>
        </a>
    </div>
@foreach(App\Models\Order::STATUS_SELECT as $key => $label)
    {{-- <option value="{{ $key }}" {{ old('status', $order->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option> --}}
    <div class="">
        <a href="{{ url('admin/orders?status='.$label) }}">
            <div class="card mb-0">
                <div class="card-body shadow">
                    <h5 class="mb-2">{{ $label }}</h5>
                    <h4 class="mb-1">
                        <span class="counter-value {{ strtolower(str_replace(' ', '-', $label)) }}">0</span>
                    </h4>
                </div>
            </div>
        </a>
    </div>

@endforeach
</div>

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-lg-6">

                {{ trans('cruds.order.title_singular') }} {{ trans('global.list') }}
            </div>
            <div class="col-lg-6">
                @can('order_create')
                    <a class="btn btn-sm btn-success float-right" href="{{ route('admin.orders.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.order.title_singular') }}
                    </a>
                @endcan
            </div>

        </div>
    </div>

    <div class="card-body">
        <table class=" table table-bordered dt-responsive  nowrap w-100 table-hover ajaxTable datatable datatable-Order">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.order.fields.invoice_number') }}
                    </th>
                    <th>
                        {{ trans('cruds.order.fields.customer_info') }}
                    </th>
                    <th>
                       Product Details
                    </th>
                    <th>
                        {{ trans('cruds.order.fields.total_bill') }}
                    </th>
                    <th>
                        Courier Name
                     </th>
                    <th>
                        {{ trans('cruds.order.fields.status') }}
                    </th>
                    <th>
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
@can('order_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.orders.massDestroy') }}",
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
    ajax: {
        url:"{{ route('admin.orders.index') }}",
        data: {
            'status': '{{ isset($_REQUEST["status"]) ? $_REQUEST["status"] : ''  }}'
        },
    },
    columns: [
        { data: 'placeholder', name: 'placeholder' },
        { data: 'invoice_number', name: 'invoice_number' },
        { data: 'customer_info', name: 'customer.customer_info' },
        { data: 'products', name: 'Product Details' },
        { data: 'total_bill', name: 'total_bill' },
        { data: 'courier_courier_name', name: 'Courier Name' },
        { data: 'status', name: 'status' },

        { data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    ordering:false,
    searching: false,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
    footerCallback: function ( ) {
        loadcountOrders();
    }

  };
  let table = $('.datatable-Order').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

    $(document).on('click', '.btn-status', function (e) {
        e.preventDefault();
        var status = $(this).attr('data-status');
        var id = $(this).attr('data-id');
        $.ajax({
            type: "post",
            url: "{{ route('admin.orders.statusChange') }}",
            data: {
                'status': status,
                'id': id,
                '_token': '{{ csrf_token() }}'
            },
            success: function (response) {
                console.log(response);
                var data = JSON.parse(response);
                if (data['status'] == 'success') {
                    table.ajax.reload();
                } else {
                    alert('something went wrong');
                }
            }
        });

    });

    function loadcountOrders(){
        $.ajax({
        type: "post",
        headers: {'x-csrf-token': '{{ csrf_token() }}'},
        url: "{{ route('admin.orders.orderCount') }}",
        contentType: "application/json",
        success: function (response) {
            response.forEach(item => {
                let tag = item.status.replace(/\s/g, '-').toLowerCase();
                $('.'+tag).text(item.total);
            });
        }
    });
}

});

</script>
@endsection
