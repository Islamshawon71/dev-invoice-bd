@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-6 col-6">
                    Total <span class="count">0</span> {{ trans('cruds.shop.title_singular') }}
                    {{ trans('global.list') }}
                </div>
                <div class="col-lg-6 col-6 action-button">
                    @can('shop_create')
                        <a class="btn btn-sm btn-success float-right" href="{{ route('admin.shops.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.shop.title_singular') }}
                        </a>
                    @endcan
                </div>
            </div>

        </div>

        <div class="card-body">
            <table class=" table table-bordered dt-responsive  nowrap w-100 table-hover ajaxTable datatable datatable-Shop">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.shop.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.shop.fields.shop_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.shop.fields.shop_address') }}
                        </th>
                        <th>
                            {{ trans('cruds.shop.fields.shop_phone_number') }}
                        </th>
                        <th>
                            {{ trans('cruds.shop.fields.shop_logo') }}
                        </th>
                        <th>
                            {{ trans('cruds.shop.fields.status') }}
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
            @can('shop_delete')
                let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
                let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.shops.massDestroy') }}",
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
                ajax: "{{ route('admin.shops.index') }}",
                columns: [{
                        data: 'placeholder',
                        name: 'placeholder'
                    },
                    {
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'shop_name',
                        name: 'shop_name'
                    },
                    {
                        data: 'shop_address',
                        name: 'shop_address'
                    },
                    {
                        data: 'shop_phone_number',
                        name: 'shop_phone_number'
                    },
                    {
                        data: 'shop_logo',
                        name: 'shop_logo',
                        sortable: false,
                        searchable: false
                    },
                    {
                        data: 'status',
                        name: 'status'
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
                footerCallback: function() {
                    var api = this.api();
                    var numRows = api.rows().count();
                    $('.count').empty().append(numRows);
                }
            };
            let table = $('.datatable-Shop').DataTable(dtOverrideGlobals);
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        });
    </script>
@endsection
