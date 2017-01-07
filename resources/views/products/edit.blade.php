<div class="modal fade" tabindex="-1" role="dialog" id='modalEdit'>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Products</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['id'=>'frmEditProducts','url'=>'products.edit']) !!}
                <input type="hidden" id="id" name="id">
                {!! Form::text('name',null,['id'=>'name','class'=>'form-control','placeholder'=>'Digite Producto'])!!}<br>
                {!! Form::text('price',null,['id'=>'price','class'=>'form-control','placeholder'=>'Digite Precio'])!!}<br>
                <select id="suppliers_id" name="suppliers_id" class="form-control">
                </select>
                {!!Form::close()!!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-success" id='editProduct'>Save</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal --