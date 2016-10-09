@extends('layout.app')

@section('content')
    <h1>Mailgun</h1>

    <hr/>

    @if(!empty($domain))
        <div class="col-md-5">
            <table class="table">
                <tr>
                    <td>Created at</td>
                    <td>{{ $domain->created_at }}</td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td>{{ $domain->name }}</td>
                </tr>
                <tr>
                    <td>Require TLS</td>
                    <td>{{ $domain->require_tls }}</td>
                </tr>
                <tr>
                    <td>Skip Verification</td>
                    <td>{{ $domain->skip_verification }}</td>
                </tr>
                <tr>
                    <td>State</td>
                    <td>{{ $domain->state }}</td>
                </tr>
            </table>
        </div>
    @endif

    @if(!empty($logs))
        <table class="table table-striped">
            <th>Date</th>
            <th>Status</th>
            <th>Message</th>
            <th>Type</th>
            @foreach($logs as $log => $values)
                <tr>
                    <td>{{ $values->created_at }}</td>
                    <td>{{ $values->hap }}</td>
                    <td>{{ $values->message }}</td>
                    <td>{{ $values->type }}</td>
                </tr>
            @endforeach
        </table>
    @endif
@endsection