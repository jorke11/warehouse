<div class="modal fade" tabindex="-1" role="dialog" id='modalNew'>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">New Products</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['id'=>'frmProducts','route'=>'products.store']) !!}
                <input type="hidden" id="id" name="id">
                {!! Form::text('name',null,['id'=>'name','class'=>'form-control','placeholder'=>'Digite Producto'])!!}<br>
                {!! Form::text('price',null,['id'=>'price','class'=>'form-control','placeholder'=>'Digite Precio'])!!}<br>
                
                <select id="suppliers_id" name="suppliers_id" class="form-control">

                </select>
                {!!Form::close()!!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-success" id='newProducts'>Save</button>
            </div>
        </div>
    </div>
</div>