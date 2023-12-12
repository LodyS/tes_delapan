<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css"> --}}
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    {{-- <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script> --}}
    <link rel="stylesheet" href="//cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css">
    <title>Lazy Loading </title>
</head>

<body>
    <div class="scrolling-pagination">
        @foreach($pegawai as $p)
            <div class="main-blog">
                <div class="blog-img">
                    <a href="/blog/{{ $p->nama }}">
                        <img src="{{ $p->id }}" class="img-fluid" alt="{{ $p->nama }}">
                    </a>
                </div>
                <div class="blog-detail">
                    <h6 class="">{{ $p->tanggal_masuk }}</h6>
                </div>
            </div>
        @endforeach
        {{ $pegawai->links() }}
    </div>

 
</body>
</html>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.min.js"></script>

<script type="text/javascript">
$('ul.pagination').hide();
$(function() {
    $('.scrolling-pagination').jscroll({
        autoTrigger: true,
        padding: 0,
        nextSelector: '.pagination li.active + li a',
        contentSelector: 'div.scrolling-pagination',
        callback: function() {
            $('ul.pagination').remove();
        }
    });
});
</script>