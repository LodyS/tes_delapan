<tr>
    <td colspan="4"></td>
    <td>SUBTOTAL</td>

    <td>{{ $items->where('transaction_number', $current_transaction_number)->sum('quantity') }}</td>
    <td>{{ $items->where('transaction_number', $current_transaction_number)->sum('cost') }}</td>
</tr>
<tr>
    <td colspan="7"></td>
</tr>
