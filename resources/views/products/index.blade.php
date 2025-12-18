@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h4>Data Products</h4>

    <button type="button" class="btn btn-primary" id="btnAddProduct" data-toggle="modal" data-target="#productModal">
        + Add Product
    </button>
</div>

<div class="table-responsive">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Product Name</th>
                <th>Quantity in Stock</th>
                <th>Price per Item</th>
                <th>Datetime Submitted</th>
                <th>Total Value Number</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="productTbody">
            @include('products._table')
        </tbody>
    </table>
</div>

<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <form id="product-form">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title" id="productModalLabel">
                        Add Product
                    </h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <input type="hidden" name="id" id="idProduct">
                    <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" name="product_name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Quantity in Stock</label>
                        <input type="number" name="quantity" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Price per Item</label>
                        <input type="number" name="price" class="form-control" required>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Cancel
                    </button>

                    <button type="submit" class="btn btn-primary">
                        Save Product
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

@endsection