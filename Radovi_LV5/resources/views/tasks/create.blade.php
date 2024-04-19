@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dodavanje novog zadatka</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('tasks.store') }}" class="needs-validation" novalidate>
                            @csrf
                            <div class="form-group">
                                <label for="naziv_rada">Naziv rada:</label>
                                <input type="text" class="form-control" name="naziv_rada" id="naziv_rada" required>
                                <div class="invalid-feedback">Molimo unesite naziv rada.</div>
                            </div>

                            <div class="form-group">
                                <label for="naziv_rada_eng">Naziv rada na engleskom:</label>
                                <input type="text" class="form-control" name="naziv_rada_eng" id="naziv_rada_eng" required>
                                <div class="invalid-feedback">Molimo unesite naziv rada na engleskom jeziku.</div>
                            </div>

                            <div class="form-group">
                                <label for="zadatak_rada">Zadatak rada:</label>
                                <textarea class="form-control" name="zadatak_rada" id="zadatak_rada" required></textarea>
                                <div class="invalid-feedback">Molimo unesite zadatak rada.</div>
                            </div>

                            <div class="form-group">
                                <label for="tip_studija">Tip studija:</label>
                                <select class="form-control" name="tip_studija" id="tip_studija" required>
                                    <option value="strucni_studij">Stručni</option>
                                    <option value="preddiplomski_studij">Preddiplomski</option>
                                    <option value="diplomski_studij">Diplomski</option>
                                </select>
                                <div class="invalid-feedback">Molimo odaberite tip studija.</div>
                            </div>

                            <button type="submit" class="btn btn-primary">Dodaj zadatak</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
