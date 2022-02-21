<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySendSmsRequest;
use App\Http\Requests\StoreSendSmsRequest;
use App\Http\Requests\UpdateSendSmsRequest;
use App\Models\Customer;
use App\Models\Order;
use App\Models\SendSms;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;
use Xenon\LaravelBDSms\Facades\SMS;



class SendSmsController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('send_sms_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = SendSms::with(['order', 'created_by'])->select(sprintf('%s.*', (new SendSms())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'send_sms_show';
                $editGate = 'send_sms_edit';
                $deleteGate = 'send_sms_delete';
                $crudRoutePart = 'send-sms';

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
            $table->addColumn('order_invoice_number', function ($row) {
                return $row->order ? $row->order->invoice_number : '';
            });

            $table->editColumn('customer_number', function ($row) {
                return $row->customer_number ? $row->customer_number : '';
            });
            $table->editColumn('sms_content', function ($row) {
                return $row->sms_content ? $row->sms_content : '';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? $row->status : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'order']);

            return $table->make(true);
        }

        return view('admin.sendSms.index');
    }

    public function create()
    {
        abort_if(Gate::denies('send_sms_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orders = Order::pluck('invoice_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.sendSms.create', compact('orders'));
    }

    public function store(StoreSendSmsRequest $request)
    {

        $sms = SMS::shoot($request->customer_number, $request->sms_content);

        $sendSms = SendSms::create($request->all());

        return redirect()->route('admin.send-sms.index');
    }

    public function edit(SendSms $sendSms)
    {
        abort_if(Gate::denies('send_sms_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orders = Order::pluck('invoice_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sendSms->load('order', 'created_by');

        return view('admin.sendSms.edit', compact('orders', 'sendSms'));
    }

    public function update(UpdateSendSmsRequest $request, SendSms $sendSms)
    {
        $sendSms->update($request->all());

        return redirect()->route('admin.send-sms.index');
    }

    public function show(SendSms $sendSms)
    {
        abort_if(Gate::denies('send_sms_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sendSms->load('order', 'created_by');

        return view('admin.sendSms.show', compact('sendSms'));
    }

    public function destroy(SendSms $sendSms)
    {
        abort_if(Gate::denies('send_sms_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sendSms->delete();

        return back();
    }

    public function massDestroy(MassDestroySendSmsRequest $request)
    {
        SendSms::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function getCustomerNumber(Request $request){

        $customer = Customer::where('customer_phone','like', '%'.request('number').'%')->get();
        return response($customer, Response::HTTP_OK);

    }
}
