$(document).ready(function () {
    $("#dtCustomer").DataTable({
        paging: true,
        lengthChange: true,
        searching: true,
        ordering: true,
        info: true,
        autoWidth: false,
        responsive: true,
    });
});

// Pilih Customer
function pilih_customer(id_pelanggan, kota_pelanggan, nm_pelanggan) {
    $("#member").html(nm_pelanggan + " ( " + kota_pelanggan + " )");
    $("#modal-customer").modal("hide");
    $("#txtCusID").val(id_pelanggan);

    // Update Gtotal
    grandtotal();
}

// Pilih Menu
function add_menu(id_menu, nm_menu, harga_menu) {
    // Clone Template
    $item = $("#tmp-menu").clone();
    $item.show();

    // Isi setiap bagian
    if ($("#mn-" + id_menu).length == 0) {
        // Jika Menu belum ada
        $item.attr("id", "mn-" + id_menu);
        $item.find(".jumlah").attr("data-id", "#mn-" + id_menu);
        $item.find(".jumlah").attr("data-harga", harga_menu);
        $item.find(".delete").attr("data-id", "#mn-" + id_menu);
        $item.find(".item").find("h4").html(nm_menu);
        $item
            .find(".price")
            .find("h4")
            .html("<span>Rp</span>" + number_format(harga_menu));
        $(".detail").append($item);

        // Data diisikan ke masing-masing input
        $item.find(".txtID").val(id_menu);
        $item.find(".txtNama").val(nm_menu);
        $item.find(".txtHarga").val(harga_menu);
    } else {
        // Jika sudah ada Cukup Update jumlah
        $jumlah =
            parseInt(
                $("#mn-" + id_menu)
                    .find(".jumlah")
                    .val()
            ) + 1; // Ambil jumlah item
        // $total = parseInt(harga_menu) * parseInt($jumlah);
        $total = parseInt(harga_menu) * parseInt($jumlah);
        $("#mn-" + id_menu)
            .find(".jumlah")
            .val($jumlah); // update jumlah
        $("#mn-" + id_menu)
            .find(".price")
            .find("h4")
            .html("<span>Rp</span>" + number_format(parseInt($total))); // Update total
    }

    // Update Gtotal
    grandtotal();
}

// Ganti Harga
function ganti_harga(e) {
    $id = $(e).attr("data-id");
    $jumlah = parseInt($(e).val());
    $harga = parseInt($(e).attr("data-harga"));
    $total = $harga * $jumlah;

    $($id)
        .find(".price")
        .find("h4")
        .html("<span>Rp</span>" + number_format(parseInt($total)));

    // Update Gtotal
    grandtotal();
}

// Hapus Item Menu
function del_menu(e) {
    $id = $(e).attr("data-id");
    $($id).remove();

    // Update Gtotal
    grandtotal();
}

// Hitung Grand Total
function grandtotal() {
    var total = 0;
    var ppn = 0;
    $(".detail > .detail-item").each(function (e) {
        var harga = parseInt($(this).find(".txtHarga").val());
        var jumlah = parseInt($(this).find(".jumlah").val());
        total += harga * jumlah; // total = total + (harga*jumlah)
    });

    // Hitung Total setelah dapat Diskon
    // total = total - parseInt($("#txtDiskon").val());

    // PPN 11%
    ppn = (11 / 100) * total;
    $("#ppn").html("<span>Rp</span>" + number_format(ppn));
    $("#txtPPN").val(ppn);

    // Total Setelah PPN
    total = total + ppn;

    // Set Grand TOtal
    $("#amount").html("<span>Rp</span>" + number_format(total));
    $("#gtotal").val(total);
}

// Format Number
function number_format(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

// Save Bill / Transaksi
function save_transaksi() {
    // Validasi
    if ($("#txtCusID").val() == "") {
        alert("Maaf Pelanggan Belum Dipilih !!!");
        return;
    }
    if ($("#catatan").val() == "") {
        alert("Maaf catatan Belum diisi !!!");
        return;
    }
    if ($(".detail .detail-item").length == 0) {
        alert("Maaf Menu Belum dipilih !!!");
        return;
    }

    // Save
    $.ajax({
        url: $("#frmTransaksi").attr("action"),
        dataType: "json",
        data: $("#frmTransaksi").serialize(),
        method: "POST",
        beforeSend: function () {
            $("#loading").fadeIn();
        },
        success: function (data) {
            console.log(data);
            $("#loading").fadeOut();

            if (data.error == 0) {
                // Proses Jika berhasil disimpan
                // showMessage(data.type, data.message, "#transaksi");
                alert(data.message);

                // Cetak nota
                var url =
                    $("#btn-save").attr("data-url") + "/" + data.id_transaksi;
                $("#nota").attr("src", url);

                // Sembunyikan Save
                $("#btn-save").addClass("d-none");
                $("#btn-new").removeClass("d-none");
            }
        },
        error: function (data) {
            console.log(data);
            $("#loading").fadeOut();
        },
    });
}

function new_transaksi() {
    $(".detail").html("");
    $("#txtCusID").val("");
    $("#member").html("");
    $("#catatan").val("Catatan Belum Diisi");
    // $("#txtDiskon").val(0);
    $("#txtPPN").val(0);
    $("#gtotal").val(0);

    // $("#diskon").html("<span>Rp</span> 0");
    $("#ppn").html("<span>Rp</span> 0");
    $("#amount").html("<span>Rp</span> 0");

    $("#btn-save").removeClass("d-none");
    $("#btn-new").addClass("d-none");
    location.reload();
}

//Searching transaksi
function searching() {
    var value = $("#search").val().toLowerCase();
    $(".menu-list .menu-item").filter(function () {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
    });
}

$(document).ready(function () {
    // Foto click
    $("#photo-preview").click(function () {
        $("#photo-input").click();
    });

    // Ketika file input change
    $("#photo-input").change(function () {
        setImage(this, "#photo-preview");
    });
});

// Read Image
function setImage(input, target) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        // Mengganti src dari object img#avatar
        reader.onload = function (e) {
            $(target).attr("src", e.target.result);
            // $("#foto").val(e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

// Searching
//Searching transaksi
function searching() {
    var value = $("#search").val().toLowerCase();
    $(".menu-list .menu-item").filter(function () {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
    });
}
