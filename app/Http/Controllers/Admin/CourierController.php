<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCourierRequest;
use App\Http\Requests\StoreCourierRequest;
use App\Http\Requests\UpdateCourierRequest;
use App\Models\Courier;
use App\Models\Shop;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CourierController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('courier_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Courier::with(['shop'])->select(sprintf('%s.*', (new Courier())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'courier_show';
                $editGate = 'courier_edit';
                $deleteGate = 'courier_delete';
                $crudRoutePart = 'couriers';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('courier_name', function ($row) {
                return $row->courier_name ? $row->courier_name : '';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? Courier::STATUS_SELECT[$row->status] : '';
            });
            $table->addColumn('shop_shop_name', function ($row) {
                return $row->shop ? $row->shop->shop_name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'shop']);

            return $table->make(true);
        }

        return view('admin.couriers.index');
    }

    public function create()
    {
        abort_if(Gate::denies('courier_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shops = Shop::pluck('shop_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.couriers.create', compact('shops'));
    }

    public function store(StoreCourierRequest $request)
    {
        $courier = Courier::create($request->all());

        return redirect()->route('admin.couriers.index');
    }

    public function edit(Courier $courier)
    {
        abort_if(Gate::denies('courier_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shops = Shop::pluck('shop_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $courier->load('shop');

        return view('admin.couriers.edit', compact('courier', 'shops'));
    }

    public function update(UpdateCourierRequest $request, Courier $courier)
    {
        $courier->update($request->all());

        return redirect()->route('admin.couriers.index');
    }

    public function show(Courier $courier)
    {
        abort_if(Gate::denies('courier_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courier->load('shop');

        return view('admin.couriers.show', compact('courier'));
    }

    public function destroy(Courier $courier)
    {
        abort_if(Gate::denies('courier_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courier->delete();

        return back();
    }

    public function massDestroy(MassDestroyCourierRequest $request)
    {
        Courier::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
