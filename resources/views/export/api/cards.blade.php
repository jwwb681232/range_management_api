<table>
    <thead>
    <tr>
        <th style="text-align: center;font-weight: bold;">User Name</th>
        <th style="text-align: center;font-weight: bold;">Card No.</th>
        <th style="text-align: center;font-weight: bold;">Unit</th>
        <th style="text-align: center;font-weight: bold;">Role</th>
    </tr>
    </thead>
    <tbody>
    @foreach($cards as $card)
        <tr style="text-align: center;">
            <td style="text-align: center;">{{ $card['user'] ? $card['user']['name'] : '' }}</td>
            <td style="text-align: center;">{{ $card['number'] }}</td>
            <td style="text-align: center;">{{ $card['user'] ? $card['user']['unit'] : '' }}</td>
            <td style="text-align: center;">{{ $card['user'] ? $card['user']['modes'] : '' }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
