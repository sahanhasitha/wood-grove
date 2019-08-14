@extends('layouts.app')

@section('content')
    <section role="main" class="content-body">
        <header class="page-header">
            <h2>Registrations</h2>
        </header>

        <!-- start: page -->
        <div class="row">
            <div class="col-lg-6 mb-3">
                <section class="card">
                    <div class="card-body">
                        <div class="row">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">System ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">EMail</th>
                                    <th scope="col">Registered Through</th>
                                    <th scope="col">Social Media ID</th>
                                    <th scope="col">Registered On</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach ($users as $user)

                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->provider }}</td>
                                        <td>{{ $user->provider_id }}</td>
                                        <td>{{ $user->created_at }}</td>
                                    </tr>

                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- end: page -->
    </section>
@endsection