<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\Invoice;
use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\Response;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $count =10;
        if($request->has($count)){
            $count = $request->count;
        }
        $invoices = Invoice::latest('id')->paginate($count);

        if($request->has('search')){
            $invoices = Invoice::where('name_client','like' , '%'. $request->search .'%')->latest('id')->paginate(10);
        }
        return view('admin.invoices.index' ,[
            'invoices'=>$invoices
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if($request->invoice_id !=null){
            dd($request->invoice_id);

        }
        return view('admin.invoices.create');
    }

    public function invoicedetails($id=-1)
    {
        $details=[];
        $invoice='';
        if($id != -1){
            $details=Detail::where('invoice_id',$id)->get();
            $invoice = Invoice::findOrFail($id);

        }
        return view('admin.invoices.create',['details'=>$details,'id'=>$id,'invoice'=>$invoice]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(), [
            'name_client' => 'required|string|min:3|max:50',
            'phone_client' => 'required',
        ]);

        if (!$validator->fails()) {
            $invoice = new Invoice();
            $invoice->name_client = $request->input('name_client');
            $invoice->phone_client = $request->input('phone_client');
            $isSaved = $invoice->save();
            return response()->json(
                [
                    'message' => $isSaved ? 'Invoice created successfully' : 'Create failed!',
                    'invoice_id' => $invoice->id,
                ],
                $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST,
            );
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
