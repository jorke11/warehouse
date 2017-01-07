function Suppliers() {
    var table;
    this.init = function () {
        table = this.table();
        $("#newSupplier").click(this.save);
        $("#editSupplier").click(this.edit);
    }

    this.save = function () {
        var frm = $("#frmSupplier");
        var data = frm.serialize();
        var url = frm.attr("action");
        $.ajax({
            url: url,
            method: "POST",
            data: data,
            dataType: 'JSON',
            success: function (data) {
                if (data.success == 'true') {
                    table.ajax.reload();
                    $("#modalNew").modal("toggle");
                    toastr.success("Ok");
                }
            }
        })
    }

    this.edit = function () {
        toastr.remove();
        var frm = $("#frmEditSupplier");
        var data = frm.serialize();
        var url = "suppliers/" + $("#frmEditSupplier #id").val();
        $.ajax({
            url: url,
            method: "PUT",
            data: data,
            dataType: 'JSON',
            success: function (data) {
                if (data.success == 'true') {
                    table.ajax.reload();
                    toastr.success("Ok");
                    $("#modalEdit").modal("toggle");
                }
            }
        })
    }

    this.showModal = function (id) {
        var frm = $("#frmSupplier");
        var data = frm.serialize();
        var url = "/suppliers/" + id + "/edit";
        $("#modalEdit").modal("show");
        $.ajax({
            url: url,
            method: "GET",
            data: data,
            dataType: 'JSON',
            success: function (data) {
                $("#id").val(data.id);
                $("#name").val(data.name);
            }
        })
    }

    this.delete = function (id) {
        toastr.remove();
        if (confirm("Deseas eliminar")) {
            var token = $("input[name=_token]").val();
            var url = "/suppliers/" + id;
            $.ajax({
                url: url,
                headers: {'X-CSRF-TOKEN': token},
                method: "DELETE",
                dataType: 'JSON',
                success: function (data) {
                    if (data.success == 'true') {
                        table.ajax.reload();
                        toastr.warning("Ok");
                    }
                }, error: function (err) {
                    toastr.error("No se puede borrra Este registro");
                }
            })
        }
    }

    this.table = function () {
        return $('#tblSuppliers').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "/api/listSupplier",
            columns: [
                {data: "id"},
                {data: "name"}
            ],
            order: [[1, 'ASC']],
            aoColumnDefs: [
                {
                    aTargets: [0, 1],
                    mRender: function (data, type, full) {
                        return '<a href="#" onclick="obj.showModal(' + full.id + ')">' + data + '</a>';
                    }
                },
                {
                    targets: [2],
                    searchable: false,
                    "mData": null,
                    "mRender": function (data, type, full) {
                        return '<button class="btn btn-danger" onclick="obj.delete(' + data.id + ')"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>';
                    }
                }
            ],
        });
    }

}

var obj = new Suppliers();
obj.init();


