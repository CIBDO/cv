 @extends('layouts.master')

@section('content')
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Modifier - CV</h4>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('update.employee', ['id' => $employee->employee_id]) }}"
                      method="POST"
                      enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Matricule</label>
                                <input type="text" name="matricule" value="{{ $employee->matricule }}" required>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Prénom</label>
                                <input type="text" name="prenom" value="{{ $employee->first_name }}" required>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Nom</label>
                                <input type="text" name="nom" value="{{ $employee->last_name }}" required>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Sexe</label>
                                <select class="form-control" name="sexe">
                                    <option value="M" {{ $employee->sexe === 'M' ? 'selected' : '' }}>M</option>
                                    <option value="F" {{ $employee->sexe === 'F' ? 'selected' : '' }}>F</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Services</label>
                                <select class="form-control" name="service">
                                    @foreach(['CIFP', 'ACCT', 'PGT', 'RGD', 'TR', 'RP', 'DBF', 'DA',
                                    'DC', 'DCP', 'DSCTOP'] as $option)
                                        <option value="{{ $option }}" {{ $employee->service === $option ?
                                    'selected' : '' }}>
                                            {{($option) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Cadre</label>
                                <input type="text" name="cadre" value="{{ $employee->cadre }}" required>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Localité</label>
                                <input type="text" name="localite" value="{{ $employee->localite }}" required>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label> Fichier </label>
                                <div class="image-upload">
                                    <input type="file" name="cv">
                                    <div class="image-uploads">
                                        @if($employee->cv_path)
                                            <img src="{{ asset('storage/' . $employee->cv_path) }}" alt="img">
                                        @else
                                            <img src="{{ asset('assets/img/icons/upload.svg') }}" alt="img">
                                        @endif
                                        {{--                                        <img src="{{('assets/img/icons/upload.svg')}}" alt="img">--}}
                                        <h4>Glisser-déposer un fichier à uploader</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-submit me-2">Mise à jour</button>
                            <a href="{{route('cv-list')}}" class="btn btn-cancel">Quitter</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
