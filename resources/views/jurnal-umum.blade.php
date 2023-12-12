<div class="page-header">
    <h1 class="page-title">Jurnal Umum </h1>
</div>

<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<div class="page-content">
    <div class="panel">
        <div class="panel-body">
            @include('flash-message')
	        <form action="{{ url('simpan-jurnal-umum')}}" method="post">{{ @csrf_field() }}

                <button class="btn btn-dark" type="button" id="add">
                    <i class="icon glyphicon glyphicon-plus-sign"></i></i>Tambah</button>
                    <table class="table table-hover" id="tambah_form">
                        <tr>
                            <th>Perkiraan</th>
                            <th>Debet</th>
                            <th>Kredit</th>
                            <th></th>
                        </tr>

                        <tbody>
                            <tr>
                                <td>Total</td>

                                <td><input type="text" id="get_debet" class="form-control" readonly></td>
                                <td><input type="text" id="get_kredit" class="form-control" readonly></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Balance</td>

                                <td></td>
                                <td><input type="text" id="get_balance" name="balance" class="form-control" readonly></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                <button type="submit" align="right" class="btn btn-primary"><i class="icon glyphicon glyphicon-list-alt"></i>Simpan</button>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">



function formatRupiah(number) {
  return number.toString().replace(/(?!\,)\D/g, "").replace(/(?<=\,,*)\./g, "").replace(/(?<=\.\d\d).*/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ".");

}

$(document).ready(function() {

var i = 0;

$("#add").on("click", function() {
    var newRow = $("<tr>");
    var cols = "";

    cols += '<td><select name="id_perkiraan[]" class="form-control cari"><option value="">Pilih</option>@foreach($perkiraan as $kira)<option value="{{ $kira->id }}">{{ $kira->nama }}</option>@endforeach</select></td>';
    cols += '<td><input type="text" class="form-control nominal" data-action="sumDebet" name="debet[]"/></td>';
    cols += '<td><input type="text" class="form-control nominal" data-action="sumKredit" name="kredit[]"/></td>';
    cols += '<td><button type="button" class="btn btn-danger adRow ibtnDel" style="width:25%;">x</button></a></td>';
    newRow.append(cols);

    //newRow.find('.cari').select2({  theme: "bootstrap-5", width:'300px'});

    newRow.find('.nominal').on('change click keyup input paste',(function (event) {
        $(this).val(function (index, value) {
            return value.replace(/(?!\,)\D/g, "").replace(/(?<=\,,*)\./g, "").replace(/(?<=\.\d\d).*/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        });
    }));

    $("#tambah_form").append(newRow);
    i++;
});

$("#tambah_form").on("click", ".ibtnDel", function(_event) {
    $(this).closest("tr").remove();
    $("#get_kredit").val();
    $("#get_balance").val();
    i -= 1
    evaluateTotal()
});

// script form dinamis dan hitung debet dan kredit

$('body').on('change keyup', '[data-action="sumDebet"]', function() {
    evaluateTotal();
    balance();
}); // hitung total kredit dari jumlah form yang di klik beserta penjumlahan balance (debet -kredit)

$('body').on('change keyup', '[data-action="sumKredit"]', function() {
    evaluateKredit();
    balance();
}); // hitung total kredit dari jumlah form yang di klik beserta penjumlahan balance (debet -kredit)

function evaluateTotal() {
    var total = 0;

    $('[data-action="sumDebet"]').each(function(_i, e) {

    var val = Number(e.value.replace(/[^0-9,-]+/g,""));


    if (!isNaN(val))
        total += val;
    });

    $('#get_debet').val(formatRupiah(total));
    balance();
} // cari menghitung akumulasi debet

function evaluateKredit() {
    var total = 0;

    $('[data-action="sumKredit"]').each(function(_i, e) {
    var val = Number(e.value.replace(/[^0-9,-]+/g,""));

    if (!isNaN(val))
        total += val;
    });

    $('#get_kredit').val(formatRupiah(total));
    balance();
} // cari menghitung akumulasi kredit

function balance ()
{
    var debet = $('#get_debet').val();
    var kredit  = $('#get_kredit').val();

    var balance = Number(debet.replace(/[^0-9,-]+/g,"")) - Number(kredit.replace(/[^0-9,-]+/g,""));
    $('#get_balance').val(formatRupiah(balance)).change();
} // fungsi untuk menghitung balance

});
</script>

