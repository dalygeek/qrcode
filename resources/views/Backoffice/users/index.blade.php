@extends('Backoffice.layout')
@section('content')
    
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Liste des utilisateurs</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Utilisateurs</a></li>
                    <li class="breadcrumb-item active">Liste des utilisateurs</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
   <div class="col-lg-12">
       <div class="card">
           <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="mb-3">
                            {{-- <h5 class="card-title">Contact List <span class="text-muted fw-normal ms-2">(834)</span></h5> --}}
                            <h5 class="card-title">Liste des utilisateurs</h5>

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
                            <div>
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a class="nav-link active"  data-bs-toggle="tooltip" data-bs-placement="top" title="List"><i class="bx bx-list-ul"></i></a>
                                    </li>
                                    {{-- <li class="nav-item">
                                        <a class="nav-link" href="apps-contacts-grid.html" data-bs-toggle="tooltip" data-bs-placement="top" title="Grid"><i class="bx bx-grid-alt"></i></a>
                                    </li> --}}
                                </ul>
                            </div>
                            <div>
                                <a href="{{route('showAddUser')}}" class="btn btn-light"><i class="bx bx-plus me-1"></i> Ajouter Un Utilisateur</a>
                            </div>
                            
                            {{-- <div class="dropdown">
                                <a class="btn btn-link text-muted py-1 font-size-16 shadow-none dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bx bx-dots-horizontal-rounded"></i>
                                </a>
                            
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </div> --}}
                        </div>

                    </div>
                </div>
                <!-- end row -->

                <div class="table-responsive mb-4">
                    <table class="table align-middle datatable dt-responsive table-check nowrap" style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
                        <thead>
                        <tr>
                            <th scope="col" style="width: 50px;">
                                <div class="form-check font-size-16">
                                    <input type="checkbox" class="form-check-input" id="checkAll">
                                    <label class="form-check-label" for="checkAll"></label>
                                </div>
                            </th>
                            <th scope="col">Nom d'utulisateur</th>
                            {{-- <th scope="col">Position</th> --}}
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Nombres des QRs</th>
                            <th scope="col">Date de creation</th>
                            <th style="width: 80px; min-width: 80px;">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                     
                                <tr>
                                    <th scope="row">
                                        <div class="form-check font-size-16">
                                            <input type="checkbox" class="form-check-input" id="contacusercheck1">
                                            <label class="form-check-label" for="contacusercheck1"></label>
                                        </div>
                                    </th>
                                    <td>
                                        <a href="#" class="text-body">{{$user->name}}</a>
                                    </td>
                                    {{-- <td>UI/UX Designer</td> --}}
                                    <td>{{$user->email}}</td>
                                    <td>@if($user->role == 7)
                                           <p style="color: blue"> Admin </p> 
                                        @elseif($user->role == 9)
                                        <p style="color: green"> User </p> 
                                        @else
                                            NULL
                                        @endif</td>
                                        <td>{{$user->nb_qr}}</td>

                                    <td>
                                        {{$user->created_at}}
                                        {{-- <div class="d-flex gap-2">
                                            <a href="#" class="badge badge-soft-primary">Photoshop</a>
                                            <a href="#" class="badge badge-soft-primary">illustrator</a>
                                        </div> --}}
                                    </td>
                                    <td>

                                        <a class="btn btn-primary" href="{{route('changePassUser',$user->id)}}">
                                            Modifier
                                        </a>
                                        {{-- <div class="dropdown">
                                            <button class="btn btn-link font-size-16 shadow-none py-0 text-muted dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bx bx-dots-horizontal-rounded"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a class="dropdown-item" href="#">Action</a></li>
                                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                                            </ul>
                                        </div> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- end table -->
                </div>
                <!-- end table responsive -->
           </div>
       </div>
   </div>
</div>

</div>
@endsection
