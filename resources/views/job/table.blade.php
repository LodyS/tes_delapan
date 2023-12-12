<body>
    <div class="container mt-5">
        <table class="table table-inverse">
            <tr>
                <th>Job</th>
            </tr>

            @foreach ($data as $oke =>$rekap)
                <td><a class="showhr" href="#"><b>{{ $oke }}</b></a></td>
            <tr class="child">
            @foreach($rekap as $r)
                <td>{{ $r->first_name }}  {{ $r->last_name }}</td>
            </tr>
            @endforeach
            @endforeach
        </table>
    </div>
</body>




<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script type="text/javaScript">
$(".showhr").click(function() {
    $(this).closest('tr').nextUntil("tr:has(.showhr)").toggle("slow", function() {

    });
});
</script>
