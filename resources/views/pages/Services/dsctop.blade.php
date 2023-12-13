@extends('layouts.master')
@section('content')
<div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Les CVs de la Division Suivi des Collectivités Térritoriales et des Organismes Personnalisés</h4>
            </div>
        </div>
    <div class="table-top">
        <div class="search-set">
            <div class="search-path">
                <a class="btn btn-filter" id="filter_search">
                    <img src="assets/img/icons/filter.svg" alt="img">
                    <span><img src="assets/img/icons/closes.svg" alt="img"></span>
                </a>
            </div>
            <div class="search-input">
                <a class="btn btn-searchset"><img src="assets/img/icons/search-white.svg" alt="img"></a>
                <div id="DataTables_Table_0_filter" class="dataTables_filter"><label> <input type="search" class="form-control form-control-sm" placeholder="Search..." aria-controls="DataTables_Table_0"></label></div>
            </div>
        </div>
        <div class="wordset">
            <ul>
                <li>
                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="pdf" aria-label="pdf"><img src="assets/img/icons/pdf.svg" alt="img"></a>
                </li>
                <li>
                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="excel" aria-label="excel"><img src="assets/img/icons/excel.svg" alt="img"></a>
                </li>
                <li>
                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="print" aria-label="print"><img src="assets/img/icons/printer.svg" alt="img"></a>
                </li>
            </ul>
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
                 <th>Prénoms</th>
                 <th>Nom </th>
                 <th>Sexe</th>
                 <th>Services</th>
                 <th>Grade</th>
                 <th>Corps</th>
                 <th>Action</th>
             </tr>
         </thead>
 </div>
 
</div>

@endsection
