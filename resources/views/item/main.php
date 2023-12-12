<table class="table">
    <tr>
        <th>transaction_number</th>
        <th>date</th>
        <th>item_number</th>
        <th>desc</th>
        <th>variant_code</th>
        <th>quantity</th>
        <th>cost</th>
    </tr>
    @php ($current_transaction_number = null)

    @foreach ($items as $item)
        @if ($loop->index > 0 && $current_transaction_number != $item->transaction_number)
           @include ('item/subtotal', compact('items', 'current_transaction_number'))
        @endif
        <tr>
            @if ($current_transaction_number == $item->transaction_number)
                <td colspan="2"></td>
            @else
                @php ($current_transaction_number = $item->transaction_number)
                <td>{{ $item->transaction_number }}</td>
                <td>{{ $item->date }}</td>
            @endif
            <td>{{ $item->item_number }}</td>
            <td>{{ $item->desc }}</td>
            <td>{{ $item->variant_code }}</td>
            <td>{{ $item->quantity }}</td>
            <td>{{ $item->cost }}</td>
        </tr>
        @if ($loop->last)
           @include ('item/subtotal', compact('items', 'current_transaction_number'))
           @include ('item/total', compact('items'))
        @endif
    @endforeach
</table>

