<div class="modal fade" tabindex="-1" role="dialog" id='modalEdit'>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Supplier</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['id'=>'frmEditSupplier','url'=>'suppliers.edit']) !!}
                <input type="hidden" id="id" name="id">
                {!!form::text('name',null,['id'=>'name','class'=>'form-control','placeholder'=>'Digite Producto'])!!}<br>
                {!!Form::close()!!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-success" id='editSupplier'>Save</button>
            </div>
        </div>
    </div>
</div>