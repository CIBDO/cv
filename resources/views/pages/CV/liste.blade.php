 @extends('layouts.master')
@section('content')
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Liste des CVs</h4>
            </div>
            <div class="page-btn">
                <a href="{{ route('cv-import') }}" class="btn btn-added"><img src="assets/img/icons/plus.svg" alt="img"
                                                                    class="me-1">Ajouter CV</a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-top">
                    <div class="search-set">
                        <div class="search-path">
                            <a class="btn btn-filter" id="filter_search">
                                <img src="assets/img/icons/filter.svg" alt="img">
                                <span><img src="{{asset('assets/img/icons/closes.svg" alt="img')}}"></span>
                            </a>
                        </div>
                        <div class="search-input">
                            <a class="btn btn-searchset"><img src="assets/img/icons/search-white.svg" alt="img"></a>
                        </div>
                    </div>
                    <div class="wordset">
                        <ul>
                            <li>
                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img
                                        src="{{asset('assets/img/icons/pdf.svg')}}" alt="img"></a>
                            </li>
                            <li>
                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img
                                        src="{{asset('assets/img/icons/excel.svg')}}" alt="img"></a>
                            </li>
                            <li>
                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img
                                        src="{{asset('assets/img/icons/printer.svg')}}" alt="img"></a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="card" id="filter_inputs">
                    <div class="card-body pb-0">
                        <div class="row">
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <input type="text" placeholder="Enter Name">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <input type="text" placeholder="Enter Reference No">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <select class="select">
                                        <option>Completed</option>
                                        <option>Paid</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <a class="btn btn-filters ms-auto"><img src="{{asset('assets/img/icons/search-whites.svg')}}"
                                                                            alt="img"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table  datanew">
                        <thead>
                        <tr>
                            <th>
                                <label class="checkboxs">
                                    <input type="checkbox" id="select-all">
                                    <span class="checkmarks"></span>
                                </label>
                            </th>
                            <th>Matricule</th>
                            <th>Prénom</th>
                            <th>Nom</th>
                            <th>Sexe</th>
                            <th>Cadre</th>
                            <th>Localité</th>
                            <th>Services</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($employees as $employee)
                            <tr class="odd">
                                <td class="sorting_1">
                                    <label class="checkboxs">
                                        <input type="checkbox">
                                        <span class="checkmarks"></span>
                                    </label>
                                </td>
                                {{--                                    <td class="productimgname">--}}
                                {{--                                        <iframe src="{{Storage::url($employee->cv->first()->path)}}" width="100" height="100" ></iframe>--}}
                                {{--                                    </td>--}}
                                <td >
                                    <a href="javascript:void(0);">{{$employee->matricule}}</a>
                                </td>
                                <td>{{$employee->first_name}}</td>
                                <td>{{$employee->last_name}}</td>
                                <td>{{$employee->sexe}}</td>
                                <td>{{$employee->cadre}}</td>
                                <td>{{$employee->localite}}</td>
                                <td>{{$employee->service}}</td>
                                <td>
                                    <a class="me-3" href="{{route('employee-detail', ['id'=>$employee->employee_id])}}">
                                        <img src="{{asset('assets/img/icons/eye.svg')}}" alt="img">
                                    </a>
                                     <a class="me-3" href="{{route('edit.employee', ['id'=>$employee->employee_id])}}">
                                        <img src="{{asset('assets/img/icons/edit.svg')}}" alt="img">
                                    </a>
                                    {{-- <a class="confirm-text" href=" {{ route('employee.destroy', 
                                    ['id' => $employee->employee_id])">
                                        <img src="{{asset('assets/img/icons/delete.svg')}}" alt="img"> --}}
                                        
                                            {{-- <button type="submit" class="btn btn-submit me-2">Mise à jour</button> --}}
                                            <a href="{{ route('employee.destroy', ['id' => $employee->employee_id]) }}"
                                             class="" onclick="event.preventDefault(); 
                                             if(confirm('Êtes-vous sûr de vouloir supprimer cet employé?')) 
                                             document.getElementById('delete-form').submit();">
                                                <img src="{{asset('assets/img/icons/delete.svg')}}" alt="img">
                                            </a>
                                            <a href="{{ route('cv-list') }}"></a>
                                        

                                        <!-- Formulaire pour la suppression (à cacher par défaut) -->
                                        <form id="delete-form" action="{{ route('employee.destroy', 
                                        ['id' => $employee->employee_id]) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

@endsection
