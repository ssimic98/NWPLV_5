@extends('layouts.app')

@section('content')
    <h1>Zadaci dodani od strane nastavnika</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Naziv rada</th>
                <th>Naziv rada (eng)</th>
                <th>Zadatak rada</th>
                <th>Tip studija</th>
                <th>Ime profesora</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->naziv_rada }}</td>
                    <td>{{ $task->naziv_rada_eng }}</td>
                    <td>{{ $task->zadatak_rada }}</td>
                    <td>{{ $task->tip_studija }}</td>
                    <td>{{ $task->users->name }}</td>
                    <td><button type="submit" class="btn btn-primary">Izaberi</button></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
