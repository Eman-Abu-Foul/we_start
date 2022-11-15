@extends('admin.master')

@section('title','All Invoices | '.env('APP_NAME'))

@section('styles')
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .table th,
        .table td{
            vertical-align : middle
        }
        .div-input{
            display: flex;
            justify-content: space-between
        }
        .selector{
            display: inline-flex;
            justify-content: space-between;
            align-items: center;
            vertical-align : middle;

        }
        .products-wrapper {
            width: 80%;
            margin: 0 auto;
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }
        .products-wrapper .box {
            width: 48%;
            margin: 1%;
            padding: 15px;
            background: #fff;
            border: 2px solid #eee;
        }
        .products-wrapper .box button{
            padding: 10px 20px;
        }
        .products-wrapper .box h2{
            margin: 10px 0;
            padding: 0;
        }
    </style>
@endsection
@section('content')
    <h1 class="h3 mb-4 text-gray-800">All Invoices</h1>
    <form method="GET" id="search-form" action="{{ route('admin.invoices.index') }}">
        <div class="input-group mb-3 div-input">
            <div class="input-group-prepend mb-3">
                <input type="text" class="form-control" value="{{request()->search}}" name="search" placeholder="Search Name Invoice ...">
                <div class="input-group-append">
                    <button class="btn btn-outline-dark px-4" >Search</button>
                </div>
            </div>
            <div>
                <label class="selector"> Show
                    <select name="count" onchange="document.getElementById('search-form').submit()" id class="custom-select row-cols-sm-3">
                        <option {{ request()->count == 10 ? 'selected' : '' }} value="10">10</option>
                        <option {{ request()->count == 25 ? 'selected' : '' }} value="25">25</option>
                        <option {{ request()->count == 50 ? 'selected' : '' }} value="50">50</option>
                        <option {{ request()->count == $invoices->total() ? 'selected' : '' }} value="{{ $invoices->total() }}">all</option>
                    </select>
                     entries
                </label>
            </div>
        </div>
    </form>


        @forelse($invoices as $invoice)

            <div class="products-wrapper">
                <div class="box">
                        <h2 class="mb-10 text-xl uppercase">
                            Invoice<span class="ml-2 font-mono text-base text-gray-400">#{{$invoice->id}}</span><span class="block w-16 mt-4 bg-blue-500" style="height: 2px;"></span></h2>
                        <div class="mb-6">
                            Client Name : {{ $invoice->name_client }}
                            <div class="mt-2 text-sm text-gray-400 uppercase">{{ $invoice->created_at }}</div>
                        </div>
                        <div class="flex justify-between pt-4 text-lg border-t border-gray-200">
                            <button class="px-12 tracking-widest text-white uppercase bg-blue-600 rounded hover:bg-blue-500">Read More</button>
                        </div>
                </div>

            </div>

        @empty
            <tr>
                <td colspan="5">No Data Found</td>
            </tr>
        @endforelse


    {{ $invoices->appends($_GET)->links() }}
@endsection
