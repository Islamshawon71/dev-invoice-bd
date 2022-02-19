<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProductPurchaseRequest;
use App\Http\Requests\StoreProductPurchaseRequest;
use App\Http\Requests\UpdateProductPurchaseRequest;
use App\Models\Product;
use App\Models\ProductPurchase;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ProductPurchaseController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('product_purchase_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ProductPurchase::with(['product', 'created_by'])->select(sprintf('%s.*', (new ProductPurchase())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'product_purchase_show';
                $editGate = 'product_purchase_edit';
                $deleteGate = 'product_purchase_delete';
                $crudRoutePart = 'product-purchases';

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
            $table->addColumn('product_product_name', function ($row) {
                return $row->product ? $row->product->product_name : '';
            });

            $table->editColumn('quantity', function ($row) {
                return $row->quantity ? $row->quantity : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'product']);

            return $table->make(true);
        }

        return view('admin.productPurchases.index');
    }

    public function create()
    {
        abort_if(Gate::denies('product_purchase_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('product_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.productPurchases.create', compact('products'));
    }

    public function store(StoreProductPurchaseRequest $request)
    {
        $productPurchase = ProductPurchase::create($request->all());

        return redirect()->route('admin.product-purchases.index');
    }

    public function edit(ProductPurchase $productPurchase)
    {
        abort_if(Gate::denies('product_purchase_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('product_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $productPurchase->load('product', 'created_by');

        return view('admin.productPurchases.edit', compact('productPurchase', 'products'));
    }

    public function update(UpdateProductPurchaseRequest $request, ProductPurchase $productPurchase)
    {
        $productPurchase->update($request->all());

        return redirect()->route('admin.product-purchases.index');
    }

    public function show(ProductPurchase $productPurchase)
    {
        abort_if(Gate::denies('product_purchase_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productPurchase->load('product', 'created_by');

        return view('admin.productPurchases.show', compact('productPurchase'));
    }

    public function destroy(ProductPurchase $productPurchase)
    {
        abort_if(Gate::denies('product_purchase_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productPurchase->delete();

        return back();
    }

    public function massDestroy(MassDestroyProductPurchaseRequest $request)
    {
        ProductPurchase::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
