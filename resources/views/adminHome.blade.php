@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    <h2>Pending User List</h2>

                    <table>
                        <tr>
                            <th>SN</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th colspan="2">Action</th>
                        </tr>

                        @php
                            $i = 0
                        @endphp

                            @foreach ($list as $l)


                                @if (!$l->is_approved)
                                    @php
                                        $i++
                                    @endphp
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $l->name }}</td>
                                        <td>{{ $l->email }}</td>
                                        <td><a href="/accept/{{ $l->id }}" class="btn btn-success" name="accept">Accept</a></td>
                                        <td><a href="/decline/{{ $l->id }}" class="btn btn-danger" name="decline">Decline</a></td>
                                    </tr>

                                @endif

                            @endforeach

                            @if ($i<=0)
                                <h2 style="color: blue">No Pending Requests</h2>
                            @endif
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
