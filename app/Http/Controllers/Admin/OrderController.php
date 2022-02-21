<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyOrderRequest;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Courier;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\Shop;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

use function PHPSTORM_META\map;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('order_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Order::with(['customer', 'courier', 'shop', 'created_by','products'])->select(sprintf('%s.*', (new Order())->table));
            if($request->status){
                $query->where('status','like','%'.$request->status.'%');
            }
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'order_show';
                $editGate = 'order_edit';
                $deleteGate = 'order_delete';
                $crudRoutePart = 'orders';

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
            $table->editColumn('invoice_number', function ($row) {
                return $row->invoice_number ? $row->invoice_number : '';
            });
            $table->editColumn('delivery_charge', function ($row) {
                return $row->delivery_charge ? $row->delivery_charge : '';
            });
            $table->editColumn('total_bill', function ($row) {
                return $row->total_bill ? $row->total_bill : '';
            });
            $table->editColumn('discount', function ($row) {
                return $row->discount ? $row->discount : '';
            });
            $table->editColumn('status', function ($row) {
                return $this->status($row->id,$row->status);
                // return $row->status ? Order::STATUS_SELECT[$row->status] : '';
            });

            $table->addColumn('customer_info', function ($row) {

                $csutomerInfo = $row->customer->customer_name .'<br>';
                $csutomerInfo = $csutomerInfo . $row->customer->customer_phone.'<br>';
                $csutomerInfo = $csutomerInfo .$row->customer->customer_address ;
                return $csutomerInfo;
            });

            $table->editColumn('products', function ($row) {
                $allProducts = $row->products->map(function ($item) {
                    $product = Product::where('id', $item->product_id)->first();
                    $item->product_name = $product->product_name;
                    $item->product_code = $product->product_code;
                    return $item;
                });

                $product = '';
                foreach ($allProducts as $item) {
                    $product =  $item->quantity.' x '.$item->product_name.'<br>';
                }
                return $product;
             });

            // $table->addColumn('customer_customer_name', function ($row) {
            //     return $row->customer ? $row->customer->customer_name : '';
            // });

            // $table->editColumn('customer.customer_phone', function ($row) {
            //     return $row->customer ? (is_string($row->customer) ? $row->customer : $row->customer->customer_phone) : '';
            // });
            // $table->editColumn('customer.customer_address', function ($row) {
            //     return $row->customer ? (is_string($row->customer) ? $row->customer : $row->customer->customer_address) : '';
            // });


            $table->addColumn('courier_courier_name', function ($row) {
                return $row->courier ? $row->courier->courier_name : '';
            });


            $table->editColumn('courier_tracking_number', function ($row) {
                return $row->courier_tracking_number ? $row->courier_tracking_number : '';
            });
            $table->addColumn('shop_shop_name', function ($row) {
                return $row->shop ? $row->shop->shop_name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'customer', 'courier', 'shop']);

            return $table->escapeColumns([])->make(true);
        }

        return view('admin.orders.index');
    }

    public function create()
    {
        abort_if(Gate::denies('order_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customers = Customer::pluck('customer_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $couriers = Courier::pluck('courier_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $products = Product::pluck('product_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $shops = Shop::pluck('shop_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.orders.create', compact('couriers', 'customers', 'shops','products'));
    }

    public function store(StoreOrderRequest $request)
    {

        DB::transaction(function () use ($request) {

            // dd($request->product);

            $customer = Customer::create($request->all());
            $request['customer_id'] = $customer->id;
            $order = Order::create($request->all());

            foreach ($request->product as $product) {
                $product['order_id'] = $order->id;
                OrderProduct::create($product);
            }



            // dd($customer);


        });

        return redirect()->route('admin.orders.index');
    }

    public function edit(Order $order)
    {
        abort_if(Gate::denies('order_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customers = Customer::pluck('customer_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $couriers = Courier::pluck('courier_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $shops = Shop::pluck('shop_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $order->load('customer', 'courier', 'shop', 'created_by','products');

        return view('admin.orders.edit', compact('couriers', 'customers', 'order', 'shops'));
    }

    public function update(UpdateOrderRequest $request, Order $order)
    {
        $order->update($request->all());

        return redirect()->route('admin.orders.index');
    }

    public function show(Order $order)
    {
        abort_if(Gate::denies('order_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $order->load('customer', 'courier', 'shop', 'created_by');

        return view('admin.orders.show', compact('order'));
    }

    public function destroy(Order $order)
    {
        abort_if(Gate::denies('order_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $order->delete();

        return back();
    }

    public function massDestroy(MassDestroyOrderRequest $request)
    {
        Order::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function products()
    {
        if (isset($request['q'])) {
            $products = Product::query()->where('product_name', 'like', '%' . $request['q'] . '%')->get();
        } else {
            $products = Product::all();
        }
        $product = array();
        foreach ($products as $item) {
            $product[] = array(
                "id" => $item['id'],
                "text" => $item['product_name'],
                "product_photo" => $item->getMedia('product_photo')->first()->getUrl(),
                "product_code" => $item['product_code'],
                "product_price" => $item['product_price']
            );
        }
        $data['data'] = $product;
        return json_encode($data);
    }

    public function status($id,$status) {

        // return $status ? Order::STATUS_SELECT[$status] : '';

        $html = '<div class="btn-group" role="group">
            <button id="btnGroupDrop1" type="button" class="btn btn-primary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                '.Order::STATUS_SELECT[$status].'
            </button>
            <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1" style="">';
            foreach (Order::STATUS_SELECT as $key => $label){
                if($label != $status){
                    $html = $html . '<li><a class="dropdown-item btn-status" data-id="'.$id.'" data-status="'.$label.'" href="#">'.$label.'</a></li>';
                }
            }
        $html = $html . '</ul>
        </div>';
        return $html;
    }
    public function statusChange(Request $request){
        if(isset($request->id) && isset($request->status)){
            $order  = Order::find($request->id);
            $order->status = $request->status;
            $order->save();
            $response['status'] = 'success';
        }else{
            $response['status'] = 'failed';
        }
        return json_encode($response);
    }
    public function orderCount(Request $request){
        $order = Order::groupBy('status')->select('status', DB::raw('count(*) as total'))->get();
        $order = json_decode(json_encode($order), true);
        array_push($order , [
            'status' => 'All Orders',
            'total' => Order::get()->count()
        ]);
        return $order;
    }
}
