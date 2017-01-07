@extends('layouts.app')
@include('suppliers.edit')
@include('suppliers.new')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-lg-3">List Supplier</div>
                        <div class="col-lg-9 text-right">
                            <button class="btn btn-success" type="submit" data-toggle='modal' data-target="#modalNew">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                        </div>
                    </div>

                </div>
                <div class="panel-body">
                    <table class="table table-condensed table-bordered" id="tblSuppliers" width='100%'>
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
{!!Html::script('assets/js/products/suppliers.js')!!}
@endsection
