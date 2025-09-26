<table>
    <thead>
        <tr>
            <th>
                No
            </th>
            <th>
                Name
            </th>
            <th>
                Address
            </th>
            <th>
                Amount
            </th>
            <th>
                Date
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($transactions as $transaction)
            <tr>
                <td>
                    {{ $loop->iteration }}
                </td>
                <td>
                    {{ $transaction->customer->nama }}
                </td>
                <td>
                    {{ $transaction->customer->alamat }}
                </td>
                <td>
                    {{ 'Rp ' . number_format($transaction->items[0]->total, 0, ',', '.') }}
                </td>
                <td>
                    {{ $transaction->created_at->format('d M Y') }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
