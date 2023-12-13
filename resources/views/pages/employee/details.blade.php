@extends('layouts.master')
@section('content')
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>
                    {{$employee->first_name}}
                    {{$employee->last_name}}
                </h4>
                <h6>
                    {{$employee->service}} - {{$employee->grade}} - {{$employee->corps}}
                </h6>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <iframe src="https://dntcp.com/public{{Storage::url($employee->cv->path)}}" width="100%" height="700"></iframe>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="page-btn">
                            <a href="{{Storage::url($employee->cv->path)}}" download class="btn btn-added" style="   
                             background: #ff9f43;
                                    padding: 7px 15px;
                                    color: #fff;
                                    font-weight: 700;
                                    font-size: 14px;">
                                <img src="{{asset('assets/img/icons/plus.svg')}}" alt="img" class="me-1">
                                Téléchargé le CV
                            </a>
                            <a href="{{ route('cv-list') }}" class="btn btn-added" style="   
                             background: #ff9f43;
                                    padding: 7px 15px;
                                    color: #fff;
                                    font-weight: 700;
                                    font-size: 14px;"><img src="{{asset('assets/img/icons/plus.svg')}}" alt="img"
                                                                    class="me-1">Liste CV</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
@stop
