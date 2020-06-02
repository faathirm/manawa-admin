@extends('layout')
@section('content')
    <div class="row pb-4">
        <div class="col-md-4">
            <div class="card modal-background">
                <div class="card-body d-flex flex-column align-self-center">
                    <img src="https://ui-avatars.com/api/?rounded=true&name=Dini+Mardini&background=2F80ED&color=fff&size=160&bold=true&font-size=0.4" style="height: 160px; width: 160px">
                    <h4 class="font-weight-bold mt-3 mb-0">Dini Mardini <i data-feather="check-circle" class="text-blue"></i></h4>
                    <small>dini.mardini@gmail.com</small>
                </div>
            </div>
            <ul class="list-group mt-2 small">
                <li class="list-group-item d-flex justify-content-between">
                    <div>Balance</div>
                    <div class="font-weight-bold">Rp 375.000</div>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <div>Registered on</div>
                    <div class="font-weight-bold">11/02/2020</div>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <div>Livestock amount</div>
                    <div class="font-weight-bold">15</div>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <div>Transaction</div>
                    <div class="font-weight-bold">18</div>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <div>Pending order</div>
                    <div class="font-weight-bold">0</div>
                </li>
            </ul>
        </div>
        <div class="col-md-8">
            <div id="accordion">
                <div class="card">
                    <div class="card-header bg-transparent" id="headingOne">
                        <h5 class="mb-0">
                            <div class="cursor-pointer small font-weight-bold" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Personal Data
                            </div>
                        </h5>
                    </div>

                    @php $size = "12rem"; @endphp
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            Soon to be updated.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header bg-transparent" id="headingTwo">
                        <h5 class="mb-0">
                            <div class="cursor-pointer small font-weight-bold" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Livestock
                            </div>
                        </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-group">
                            <div class="card-group">
                                <div class="card livestock-background border-light" style="min-width: {{$size}};">
                                    <div class="card-body d-flex flex-column">
                                        <div class="progress" style="height: 10px">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <i class="fa fa-paw fa-5x text-dark align-self-center pt-3"></i>
                                    </div>
                                    <div class="card-footer text-center bg-transparent border-top-0 text-dark p-0">
                                        <h6 class="font-weight-bold border-bottom-1 border-white">Kambing #5</h6>
                                        <div class="d-flex justify-content-between bg-light small p-2">
                                            <div>3 Mo</div>
                                            <div class="font-weight-bold"><i data-feather="circle" class="icon-regular"></i> Regular</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card livestock-background border-light" style="min-width: {{$size}};">
                                    <div class="card-body d-flex flex-column">
                                        <div class="progress" style="height: 10px">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 90%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <i class="fa fa-paw fa-5x text-dark align-self-center pt-3"></i>
                                    </div>
                                    <div class="card-footer text-center bg-transparent border-top-0 text-dark p-0">
                                        <h6 class="font-weight-bold border-bottom-1 border-white">Kambing #6</h6>
                                        <div class="d-flex justify-content-between bg-light small p-2">
                                            <div>9 Mo</div>
                                            <div class="font-weight-bold"><i data-feather="circle" class="icon-qurban"></i> Qurban</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card livestock-background border-light" style="min-width: {{$size}};">
                                    <div class="card-body d-flex flex-column">
                                        <div class="progress" style="height: 10px">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <i class="fa fa-paw fa-5x text-dark align-self-center pt-3"></i>
                                    </div>
                                    <div class="card-footer text-center bg-transparent border-top-0 text-dark p-0">
                                        <h6 class="font-weight-bold border-bottom-1 border-white">Kambing #5</h6>
                                        <div class="d-flex justify-content-between bg-light small p-2">
                                            <div>3 Mo</div>
                                            <div class="font-weight-bold"><i data-feather="circle" class="icon-regular"></i> Regular</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card livestock-background border-light" style="min-width: {{$size}};">
                                    <div class="card-body d-flex flex-column">
                                        <div class="progress" style="height: 10px">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <i class="fa fa-paw fa-5x text-dark align-self-center pt-3"></i>
                                    </div>
                                    <div class="card-footer text-center bg-transparent border-top-0 text-dark p-0">
                                        <h6 class="font-weight-bold border-bottom-1 border-white">Kambing #5</h6>
                                        <div class="d-flex justify-content-between bg-light small p-2">
                                            <div>3 Mo</div>
                                            <div class="font-weight-bold"><i data-feather="circle" class="icon-regular"></i> Regular</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card livestock-background border-light" style="min-width: {{$size}};">
                                    <div class="card-body d-flex flex-column">
                                        <div class="progress" style="height: 10px">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <i class="fa fa-paw fa-5x text-dark align-self-center pt-3"></i>
                                    </div>
                                    <div class="card-footer text-center bg-transparent border-top-0 text-dark p-0">
                                        <h6 class="font-weight-bold border-bottom-1 border-white">Kambing #5</h6>
                                        <div class="d-flex justify-content-between bg-light small p-2">
                                            <div>3 Mo</div>
                                            <div class="font-weight-bold"><i data-feather="circle" class="icon-regular"></i> Regular</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header bg-transparent" id="headingThree">
                        <h5 class="mb-0">
                            <div class="cursor-pointer small font-weight-bold" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Transaction
                            </div>
                        </h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="card-body">
                            <table id="myTable" class="hover row-border compact">
                                <thead>
                                <tr class="small bg-light">
                                    <th>DATE <i class="fa fa-sort text-agakgrey"></i></th>
                                    <th>MESSAGE <i class="fa fa-sort text-agakgrey"></i></th>
                                    <th class="text-left">AMOUNT <i class="fa fa-sort text-agakgrey"></i></th>
{{--                                    <th class="text-left">Cr./Dr. <i class="fa fa-sort text-agakgrey"></i></th>--}}
                                </tr>
                                </thead>
                                <tbody class="small">
                                <tr>
                                    <td>11/02/2020</td>
                                    <td>Livestock purchase</td>
                                    <td class="text-left"><span class="badge badge-primary">Dr.</span> Rp 695.000</td>
                                </tr>
                                @for($i=0;$i<30;$i++)
                                    <tr>
                                        <td>11/02/2020</td>
                                        <td>Livestock purchase</td>
                                        <td class="text-left"><span class="badge badge-danger">Cr.</span> Rp 695.000</td>
                                    </tr>
                                @endfor
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('jquery')
    <script>
        $(document).ready( function () {
            var table = $('#myTable').DataTable({
                paging: true,
                ordering: true,
                searchBox: false
            });
        });
    </script>
@endsection
