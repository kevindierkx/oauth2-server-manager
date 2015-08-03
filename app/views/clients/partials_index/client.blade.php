<tr>
    <td>
        {{ $client->name }}
        <small>{{ $client->endpoint->redirect_uri }}</small>
    </td>

    <td>
        <span class="badge">
            {{ $client->grants->count() }}
        </span>
    </td>

    <td>
        <span class="badge">
            {{ $client->scopes->count() }}
        </span>
    </td>

    <td>{{ $client->created_at }}</td>
</tr>
