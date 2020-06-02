@extends('layout')
@section('content')
    <div class="row d-flex justify-content-end">
        <div class="col-md-4">
            <input type="text" class="form-control" id="search-data" placeholder="Search">
        </div>
    </div>
    <div class="row ml-2 mr-2 mt-3 rounded" style=" height: 85%; -webkit-box-shadow: 0px 0px 30px -14px rgba(204,204,204,1);">
        <div class="col-md-12 pt-3 pb-4">
            <table id="myTable" class="hover row-border compact">
                <thead>
                <tr class="small">
                    <th width="1"></th>
                    <th>TID <i class="fa fa-sort text-agakgrey"></i></th>
                    <th>USER <i class="fa fa-sort text-agakgrey"></i></th>
                    <th>PRODUCT <i class="fa fa-sort text-agakgrey"></i></th>
                    <th>AGE <i class="fa fa-sort text-agakgrey"></i></th>
                    <th>LAST REPORT <i class="fa fa-sort text-agakgrey"></i></th>
                    <th>DATE <i class="fa fa-sort text-agakgrey"></i></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($livestock as $l)
                    @php
                        $u = \App\Customer::find($l->id_user);
                        $fv = \App\FarmVariety::find($l->id_farm_variety);
                        $v = \App\Variety::find($fv->id_variety);
                        $a = \App\Animal::find($v->id_animal);
                        $s = \App\LivestockReport::where('id_livestock',$l->id)->OrderBy('created_at','desc')->first();
                        $time = new \DateTime(substr($l->born_at, 0,10));
                        $lastreport = new \DateTime(substr($s->created_at, 0, 10));
                        $now = new \DateTime(Date("Y-m-d"));
                        $interval = $now->diff($time);
                        $report_checker = $now->diff($lastreport);
                    @endphp
                    <tr>
                        <td>
                            @if(isset($s->kesehatan))
                                @if($s->kesehatan == "Sehat")
                                    <i class="fa fa-heart text-danger"></i>
                                @elseif($s->kesehatan == "Mati")
                                    <i class="fa fa-times text-dark"></i>
                                @endif
                            @endif
                        </td>
                        <td>{{$l->id_transaction}}</td>
                        <td>{{ucwords($u->name)}}</td>
                        <td>{{$a->name}} {{$v->name}} - {{ucwords($fv->sales_type)}}</td>
                        <td>{{$interval->m}} Mo</td>
                        <td>@if(isset($s->created_at)) {{substr($s->created_at, 0, 10)}} @endif @if($report_checker->m > 0) <i class="fa fa-exclamation text-danger"></i> @endif</td>
                        <td>{{$l->created_at}}</td>
                        <td>
                            <div class="dropdown">
                                <div class=" " type="button" id="dropdownMenuButton" data-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false">
                                    <i data-feather="more-vertical"></i>
                                </div>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a href="{{route('live.user.detail',$l->id)}}" class="dropdown-item cursor-pointer"><i data-feather="eye" class="text-blue mr-1"></i> View</a>
                                    <div class="dropdown-item cursor-pointer remove-data"><i data-feather="trash" class="text-blue mr-2"></i>Remove</div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title d-flex flex-column" id="exampleModalLabel">
                        <h3 class="font-weight-bold text-blue mb-0">2564</h3>
                        <div class="small badge badge-success">Unverified</div>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body modal-background">
                    <div class="d-flex justify-content-between font-weight-bold pb-2">
                        <div>Dini mardini</div>
                        <div>11/02/2020</div>
                    </div>
                    <div>
                        <img src="{{asset('image/bukt-transfer.jpg')}}" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Verify</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalView" tabindex="-1" role="dialog" aria-labelledby="modalView" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="height: 30em">
                <div class="modal-body modal-background d-flex flex-column ">
                    <div class="row h-100">
                        <div class="col-md-4 d-flex justify-content-center" style="border-right: 1.5px solid gainsboro">
                            <img src="https://ui-avatars.com/api/?rounded=true&name=Faathir+Muhammad&background=EB5757&color=fff&size=128&bold=true&font-size=0.4" style="height: 128px; width: 128px">
                        </div>
                        <div class="col-md-8">
                            <div class="form-group mb-1">
                                <label class="mb-0 small">Full Name</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-light border-right-0 text-blue"><i data-feather="user"></i></span>
                                    </div>
                                    <input type="text" class="form-control bg-light border-left-0" value="Faathir Muhammad" readonly>
                                </div>
                            </div>
                            <div class="form-group mb-1">
                                <label class="mb-0 small">Email Address</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-light border-right-0 text-blue"><i data-feather="mail"></i></span>
                                    </div>
                                    <input type="email" class="form-control bg-light border-left-0" value="faathir.muhammad@gmail.com" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalEdit" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="height: 30em">
                <div class="modal-body modal-background d-flex flex-column ">
                    <div class="row h-100">
                        <div class="col-md-4 d-flex justify-content-center" style="border-right: 1.5px solid gainsboro">
                            <img src="https://ui-avatars.com/api/?rounded=true&name=Faathir+Muhammad&background=EB5757&color=fff&size=128&bold=true&font-size=0.4" style="height: 128px; width: 128px">
                        </div>
                        <div class="col-md-8">
                            <div class="form-group mb-1">
                                <label class="mb-0 small">Full Name</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-white border-right-0"><i data-feather="user"></i></span>
                                    </div>
                                    <input type="text" class="form-control border-left-0" value="Faathir Muhammad">
                                </div>
                            </div>
                            <div class="form-group mb-1">
                                <label class="mb-0 small">Email Address</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-white border-right-0"><i data-feather="mail"></i></span>
                                    </div>
                                    <input type="email" class="form-control border-left-0" value="faathir.muhammad@gmail.com">
                                </div>
                            </div>
                            <div class="form-group mb-1">
                                <label class="mb-0 small">Previous Password</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-white border-right-0"><i data-feather="lock"></i></span>
                                    </div>
                                    <input type="password" class="form-control border-left-0" placeholder="Enter previous password">
                                </div>
                            </div>
                            <div class="form-group mb-1">
                                <label class="mb-0 small">New Password</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-white border-right-0"><i data-feather="lock"></i></span>
                                    </div>
                                    <input type="password" class="form-control border-left-0" placeholder="Enter new password">
                                </div>
                            </div>
                            <div class="form-group mb-1">
                                <label class="mb-0 small">Confirm Password</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-white border-right-0"><i data-feather="lock"></i></span>
                                    </div>
                                    <input type="password" class="form-control border-left-0" placeholder="Enter confirmation password">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Submit</button>
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
            $('#search-data').on( 'keyup', function () {
                console.log($(this).val())
                table.search($(this).val()).draw() ;
            } );

            $(".view-photo").on("click", function () {
                console.log("D")
                $("#exampleModal").modal("show")
            })

            $(".edit-data").on("click", function () {
                $("#modalEdit").modal("show")
            })

            $(".remove-data").on("click", function () {
                swal({
                    title: "Are you sure?",
                    text: "System will remove this data permanently!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            swal("Success! data has been removed permanently", {
                                icon: "success",
                            });
                        } else {
                            swal("Action cancelled",{
                                icon: "success",
                            });
                        }
                    });
            })

        } );
    </script>
@endsection
