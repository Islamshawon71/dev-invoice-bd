@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">

            <div class="row">
                <div class="col-lg-6 col-6">
                    Total <span class="count">0</span> {{ trans('cruds.customer.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="col-lg-6 col-6 action-button">
                    @can('customer_create')
                        <a class="btn btn-sm btn-success float-right" href="{{ route('admin.customers.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.customer.title_singular') }}
                        </a>
                    @endcan
                </div>
            </div>
        </div>

        <div class="card-body">
            <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Customer">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.customer.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.customer.fields.customer_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.customer.fields.customer_phone') }}
                        </th>
                        <th>
                            {{ trans('cruds.customer.fields.customer_address') }}
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
        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            @can('customer_delete')
                let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
                let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.customers.massDestroy') }}",
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
                ajax: "{{ route('admin.customers.index') }}",
                columns: [{
                        data: 'placeholder',
                        name: 'placeholder'
                    },
                    {
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'customer_name',
                        name: 'customer_name'
                    },
                    {
                        data: 'customer_phone',
                        name: 'customer_phone'
                    },
                    {
                        data: 'customer_address',
                        name: 'customer_address'
                    },
                    {
                        data: 'actions',
                        name: '{{ trans('global.actions') }}'
                    }
                ],
                orderCellsTop: true,
                order: [
                    [1, 'desc']
                ],
                pageLength: 100,
                footerCallback: function ( ) {
                    var api = this.api();
                    var numRows = api.rows().count();
                    $('.count').empty().append(numRows);
                    if(numRows >= 50){
                        $('.action-button').empty().append(' <a class="btn btn-sm btn-success float-right" href="#">{{ trans('global.add') }} {{ trans('cruds.customer.title_singular') }}</a>');
                    }
                }
            };
            let table = $('.datatable-Customer').DataTable(dtOverrideGlobals);
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        });
    </script>
@endsection
