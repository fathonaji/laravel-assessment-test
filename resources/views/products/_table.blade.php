@php $grandTotal = 0; @endphp

@forelse($products as $index => $p)
@php $grandTotal += $p['total']; @endphp
<tr>
    <td>{{ $p['product_name'] }}</td>
    <td>{{ $p['quantity'] }}</td>
    <td>${{ number_format($p['price'], 2) }}</td>
    <td>{{ $p['submitted_at'] }}</td>
    <td>${{ number_format($p['total'], 2) }}</td>
    <td>
        <button class="btn btn-sm btn-secondary btn-edit" data-index="{{ $index }}" data-product='@json($p)'>
            Edit
        </button>
    </td>
</tr>
@empty
<tr>
    <td colspan="6" class="text-center text-muted">
        No data submitted yet
    </td>
</tr>
@endforelse

<tr>
    <th colspan="5" class="text-right">TOTAL</th>
    <th>${{ number_format($grandTotal, 2) }}</th>
</tr>