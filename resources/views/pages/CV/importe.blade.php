 @extends('layouts.master')
@section('content')
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Import - CV</h4>
                {{--                <h6>Create new product Category</h6>--}}
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{route('cv-import-store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Matricule</label>
                                <input type="text" name="matricule">
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Prénom</label>
                                <input type="text" name="prenom">
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Nom</label>
                                <input type="text" name="nom">
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Sexe</label>
                                <select class="form-control" name="sexe">
                                    <option value="M">M</option>
                                    <option value="F">F</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Services</label>
                                <select class="form-control" name="service" >
                                    <option value="cifp">CIFP</option>
                                    <option value="acct">ACCT</option>
                                    <option value="pgt">PGT</option>
                                    <option value="rgd">RGD</option>
                                    <option value="tr">TR</option>
                                    <option value="rp">RP</option>
                                    <option value="dbf">DBF</option>
                                    <option value="da">DA</option>
                                    <option value="dc">DC</option>
                                    <option value="dcp">DCP</option>
                                    <option value="dsctop">DSCTOP</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Cadre</label>
                                <input type="text" name="cadre">
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Localité</label>
                                <input type="text" name="localite">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label> Fichier </label>
                                <div class="image-upload">
                                    <input type="file" name="fichier">
                                    <div class="image-uploads">
                                        <img src="assets/img/icons/upload.svg" alt="img">
                                        <h4>Glissez-déposez le fichier pour télécharger</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-submit me-2">Archiver</button>
                            <a href="categorylist.html" class="btn btn-cancel">Quitter</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
