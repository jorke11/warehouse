function Products() {
    var table;
    this.init = function () {
        this.loadSelect("frmProducts");
        table = this.table();
        $("#newProducts").click(this.save)
        $("#editProduct").click(this.edit)
    }

    this.edit = function () {
        var frm = $("#frmEditProducts");
        var data = frm.serialize();
        var url = "products/" + $("#frmEditProducts #id").val();
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

    this.delete = function (id) {
        toastr.remove();
        if (confirm("Deseas eliminar")) {
            var token = $("input[name=_token]").val();
            var url = "/products/" + id;
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

    this.loadSelect = function (frm) {
        $.ajax({
            url: 'getSuppliers',
            method: "GET",
            dataType: 'JSON',
            success: function (data) {
                var html = "";
                $.each(data, function (i, val) {
                    html += '<option value="' + val.id + '">' + val.name + '</option>';
                })
                $("#" + frm + " #suppliers_id").html(html);
            }
        })
    }

    this.save = function () {
        var frm = $("#frmProducts");
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
                    toastr.success("Ok");
                    $("#modalNew").modal("toggle");
                }
            }
        })
    }

    this.showModal = function (id) {
        var frm = $("#frmProducts");
        var data = frm.serialize();
        this.loadSelect("frmEditProducts");
        var url = "/products/" + id + "/edit";
        $("#modalEdit").modal("show");
        $.ajax({
            url: url,
            method: "GET",
            data: data,
            dataType: 'JSON',
            success: function (data) {
                $("#frmEditProducts #id").val(data.id);
                $("#frmEditProducts #name").val(data.name);
                $("#frmEditProducts #price").val(data.price);
                $("#frmEditProducts #suppliers_id").val(data.suppliers_id);
            }
        })

    }

    this.table = function () {
        return $('#tblProducts').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "/api/listProducts",
            columns: [
                {data: "id"},
                {data: "name"},
                {data: "price"},
                {data: "suppliers_id"},
            ],
            order: [[1, 'ASC']],
            aoColumnDefs: [
                {
                    aTargets: [0, 1, 2, 3],
                    mRender: function (data, type, full) {
                        return '<a href="#" onclick="obj.showModal(' + full.id + ')">' + data + '</a>';
                    }
                },
                {
                    targets: [4],
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

var obj = new Products();
obj.init();


