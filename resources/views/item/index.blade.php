<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>Laravel Traits Example</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">

        <table class="table table-inverse">
            <thead>
                <tr>
                    <th>Transcation Number</th>
                    <th>Item Number</th>
                    <th>Quantity</th>
                    <th>Price</th>

                </tr>
            </thead>
            <tbody>

                @foreach($data as $key=>$items)

                    <td>{{$items->transaction_number }}</td>
                    <td>{{$items->item_number }}</td>
                    <td>{{$items->quantity }}</td>
                    <td>{{ $items->cost }}</td>

                </tr>
                @endforeach

            </tbody>

        </table>


    </div>
</body>

</html>

<script src="{{ asset('js/app.js') }}"></script>

