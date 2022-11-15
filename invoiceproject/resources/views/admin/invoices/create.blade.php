@extends('admin.master')

@section('title','Create | '.env('APP_NAME'))

@section('styles')
    <link rel="stylesheet" href="{{ asset('assetsadmin/css/invoice.css') }}">
<style>
    .info input{
        margin: 3px 0;

    }


</style>

@endsection

@section('content')



    <div id="invoiceholder">

        <div id="headerimage"></div>
            <div id="invoice" class="effect2">
                @if($id == -1)
                    <form id="create-form">
                        @csrf
                        <div id="invoice-top">
                            <div class="info">
                                <input type="text" placeholder="Enter Name Client ..." id="name_client" name="name_client" class="form-control float-left "/>

                                <input type="text" placeholder="Enter Number Phone " id="phone_client" name="phone_client" class="form-control float-left"/>

                            </div><!--End Info-->

                            <div class="title">
                                <button type="button" onclick="performStore()" class="btn btn-success px-5"> <i class="fas fa-plus px-1"></i> Save </button>
                            </div><!--End Title-->
                        </div><!--End InvoiceTop-->
                        <br>
                    </form>
                @else
                        <div id="invoice-top">
                            <div class="info">
                                <div class="mb-6">
                                    Client Name : {{ $invoice->name_client }}
                                </div>
                                <div class="mb-6">
                                    Phone Number : {{ $invoice->phone_client }}
                                </div>
                            </div><!--End Info-->
                            <div class="title">
                                Invoice<span class="ml-2 font-mono text-base text-gray-400">#{{$invoice->id}}</span><span class="block w-16 mt-4 bg-blue-500" style="height: 2px;"></span></h2>
                                <div class="mt-2 text-sm text-gray-400 uppercase">{{ $invoice->created_at }}</div>

                            </div><!--End Title-->
                        </div><!--End InvoiceTop-->
                        <br>

                    <div id="invoice-bot">

                        <div id="table">
                            <table>
                                <form >
                                    @csrf
                                    <tr class="text-dark ">
                                        <td colspan="3" class="text-lg">Table Product</td>
                                        <td><button type="button" onclick="performStoreItem()"
                                                    class="btn btn-primary">  Add Product </button>
                                        </td>
                                    </tr>
                                    <tr class="tabletitle">
                                        <td class="item">
                                            <input type="text" placeholder="Item name" id="name" name="name" class="form-control"/>
                                        </td>
                                        <td class="Hours">
                                            <input type="number" placeholder="price" id="price" name="price" class="form-control"/></td>
                                        <td class="Rate"><input type="number" placeholder="Quantity" id="quantity" name="quantity" class="form-control"/></td>
                                        <td class="subtotal"><h2>Sum</h2></td>
                                    </tr>
                                </form>
                                @forelse($details as $detail)
                                    <tr class="service">
                                        <td class="tableitem">{{ $detail->name }}</td>
                                        <td class="tableitem">{{ $detail->price }}</td>
                                        <td class="tableitem">{{ $detail->quantity }}</td>
                                        <td class="tableitem">{{ $detail->sum }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td>No Data Found</td>
                                    </tr>
                                @endforelse
                                <tr class="tabletitle">
                                    <td></td>
                                    <td></td>
                                    <td class="Rate"><h2>Total</h2></td>
                                    <td class="payment"><h2>{{ $details->sum('sum') }}</h2></td>
                                </tr>
                            </table>
                        </div><!--End Table-->
                    </div><!--End InvoiceBot-->
                @endif

        </div><!--End Invoice-->
    </div><!-- End Invoice Holder-->


@endsection
@section('script')
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        let invoice_id= '';

        function performStore() {
            axios.post('/admin/invoices', {
                name_client: document.getElementById('name_client').value,
                phone_client: document.getElementById('phone_client').value,
            })
                .then(function (response) {
                    //2xx
                    invoice_id =response.data.invoice_id;
                    console.log(response.data.invoice_id);
                    window.location.href='/admin/invoicedetails/'+invoice_id;
                    toastr.success(response.data.message);
                    document.getElementById('create-form').reset();

                })
                .catch(function (error) {
                    //4xx - 5xx
                    toastr.error(error.response.data.message);
                    console.log(error.response.data.message);
                });
        }
        // let id_in =localStorage.getItem(invoice_id);

            function performStoreItem() {
                $name= document.getElementById('name').value,
                    $price= document.getElementById('price').value,
                    $quantity= document.getElementById('quantity').value,

                    axios.post('/admin/details', {
                        name:$name,
                        price:$price,
                        quantity:$quantity,
                        sum: $price*$quantity,
                        invoice_id: {{ $id }}
                    })
                        .then(function (response) {
                            //2xx
                            console.log(response);
                            window.location.href='/admin/invoicedetails/'+{{$id}};
                        })
                        .catch(function (error) {
                            //4xx - 5xx
                            console.log(error.response.data.message);
                        });

        }

    </script>

@endsection
