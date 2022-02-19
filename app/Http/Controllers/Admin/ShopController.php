<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyShopRequest;
use App\Http\Requests\StoreShopRequest;
use App\Http\Requests\UpdateShopRequest;
use App\Models\Shop;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ShopController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('shop_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Shop::with(['created_by'])->select(sprintf('%s.*', (new Shop())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'shop_show';
                $editGate = 'shop_edit';
                $deleteGate = 'shop_delete';
                $crudRoutePart = 'shops';

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
            $table->editColumn('shop_name', function ($row) {
                return $row->shop_name ? $row->shop_name : '';
            });
            $table->editColumn('shop_address', function ($row) {
                return $row->shop_address ? $row->shop_address : '';
            });
            $table->editColumn('shop_phone_number', function ($row) {
                return $row->shop_phone_number ? $row->shop_phone_number : '';
            });
            $table->editColumn('shop_logo', function ($row) {
                if ($photo = $row->shop_logo) {
                    return sprintf(
        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
        $photo->url,
        $photo->thumbnail
    );
                }

                return '';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? Shop::STATUS_SELECT[$row->status] : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'shop_logo']);

            return $table->make(true);
        }

        return view('admin.shops.index');
    }

    public function create()
    {
        abort_if(Gate::denies('shop_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.shops.create');
    }

    public function store(StoreShopRequest $request)
    {
        $shop = Shop::create($request->all());

        if ($request->input('shop_logo', false)) {
            $shop->addMedia(storage_path('tmp/uploads/' . basename($request->input('shop_logo'))))->toMediaCollection('shop_logo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $shop->id]);
        }

        return redirect()->route('admin.shops.index');
    }

    public function edit(Shop $shop)
    {
        abort_if(Gate::denies('shop_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shop->load('created_by');

        return view('admin.shops.edit', compact('shop'));
    }

    public function update(UpdateShopRequest $request, Shop $shop)
    {
        $shop->update($request->all());

        if ($request->input('shop_logo', false)) {
            if (!$shop->shop_logo || $request->input('shop_logo') !== $shop->shop_logo->file_name) {
                if ($shop->shop_logo) {
                    $shop->shop_logo->delete();
                }
                $shop->addMedia(storage_path('tmp/uploads/' . basename($request->input('shop_logo'))))->toMediaCollection('shop_logo');
            }
        } elseif ($shop->shop_logo) {
            $shop->shop_logo->delete();
        }

        return redirect()->route('admin.shops.index');
    }

    public function show(Shop $shop)
    {
        abort_if(Gate::denies('shop_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shop->load('created_by');

        return view('admin.shops.show', compact('shop'));
    }

    public function destroy(Shop $shop)
    {
        abort_if(Gate::denies('shop_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shop->delete();

        return back();
    }

    public function massDestroy(MassDestroyShopRequest $request)
    {
        Shop::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('shop_create') && Gate::denies('shop_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Shop();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
