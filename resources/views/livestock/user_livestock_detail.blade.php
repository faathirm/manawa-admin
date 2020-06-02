@extends('layout')
@section('content')
    @php
        $u = \App\Customer::find($livestock->id_user);
        $fv = \App\FarmVariety::find($livestock->id_farm_variety);
        $v = \App\Variety::find($fv->id_variety);
        $a = \App\Animal::find($v->id_animal);
        $s = \App\LivestockReport::where('id_livestock',$livestock->id)->OrderBy('created_at','desc')->first();
        $time = new \DateTime(substr($livestock->born_at, 0,10));
        $lastreport = new \DateTime(substr($s->created_at, 0, 10));
        $now = new \DateTime(Date("Y-m-d"));
        $interval = $now->diff($time);
        $report_checker = $now->diff($lastreport);

        $report = \App\LivestockReport::Where('id_livestock',$livestock->id)->get();

        $waktu_jual = null;
        if($fv->sales_type == "Regular"){
            $waktu_jual = 12;
        }else{
            $waktu_qurban = new \DateTime("2020-07-30");
            $bedawaktu = $time->diff($waktu_qurban);
            $diff = (($waktu_qurban->format('Y') - $time->format('Y')) *12 + ($waktu_qurban->format('m') - $time->format('m')));
            $waktu_jual = $diff;
        }
    @endphp
    <div class="row pb-4">
        <div class="col-md-4">
            <div class="card modal-background">
                <div class="card-body d-flex flex-column align-self-center">
                    <img src="@isset($s->photo_url){{$s->photo_url}}"@endisset class="rounded-circle" style="height: 160px; width: 160px; object-fit: cover">
                    <h4 class="font-weight-bold mt-3 mb-0 text-center">{{$a->name}} {{$v->name}}</h4>
                    <div class="progress mt-2 mb-2" style="height: 10px">
                        <div class="progress-bar bg-success" role="progressbar" style="width: {{($interval->m / $waktu_jual) * 100}}%" aria-valuenow="{{($interval->m / $waktu_jual) * 100}}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <small class="align-self-center">{{ucwords($fv->sales_type)}} / {{$interval->m}} Mo / {{$s->berat}} Kg / {{$s->kesehatan}} <i class="text-danger fa fa-heart"></i></small>
                </div>
            </div>
            <ul class="list-group mt-2 small">
                <li class="list-group-item d-flex justify-content-between">
                    <div>Owner</div>
                    <div class="font-weight-bold">{{ucwords($u->name)}}</div>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <div>Price</div>
                    <div class="font-weight-bold">Rp 725.000</div>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <div>Insurance</div>
                    <div class="font-weight-bold">Yes</div>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <div>Born At</div>
                    <div class="font-weight-bold">{{substr($livestock->born_at, 0,10)}}</div>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <div>Added At</div>
                    <div class="font-weight-bold">{{substr($livestock->created_at, 0,10)}}</div>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <div>Sold At</div>
                    <div class="font-weight-bold">{{substr($livestock->sell_at, 0,10)}}</div>
                </li>
            </ul>
        </div>
        <div class="col-md-8">
            <div id="accordion">
                <div class="card">
                    <div class="card-header bg-transparent d-flex justify-content-between" id="headingThree">
                        <h5 class="mb-0 align-self-center">
                            <div class="cursor-pointer small font-weight-bold" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Livestock Report History @if($report_checker->m > 0) <i class="fa fa-exclamation text-danger"></i> @endif
                            </div>
                        </h5>
                        <button class="btn btn-dark btn-sm new-data"><i data-feather="plus"></i> New Entry</button>
                    </div>
                    <div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="card-body">
                            <table id="myTable" class="hover row-border compact">
                                <thead>
                                <tr class="small bg-light">
                                    <th>NO</th>
                                    <th>WEIGHT <i class="fa fa-sort text-agakgrey"></i></th>
                                    <th>STATUS <i class="fa fa-sort text-agakgrey"></i></th>
                                    <th>REPORT DESC <i class="fa fa-sort text-agakgrey"></i></th>
                                    <th>REPORTED BY <i class="fa fa-sort text-agakgrey"></i></th>
                                    <th>DATE <i class="fa fa-sort text-agakgrey"></i></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody class="small">
                                @foreach($report as $r)
                                    @php $x=0; @endphp
                                    @php $user = \App\Administrator::find($r->reported_by) @endphp
                                    <tr>
                                        <td>{{$x+1}}</td>
                                        <td>{{$r->berat}}</td>
                                        <td>{{$r->kesehatan}}</td>
                                        <td class="text-left">{{$r->report_desc}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$r->created_at}}</td>
                                        <td><button class="btn btn-outline-dark btn-sm ml-1 view-photo" data-name="{{$a->name}} {{$v->name}}" data-date="{{$r->created_at}}" data-photo="{{$r->photo_url}}"><i class="fa fa-camera"></i></button></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title d-flex flex-column" id="exampleModalLabel">
                        <h4 class="font-weight-bold text-blue mb-0 modal-photo-name"></h4>
                        <small class="modal-photo-date"></small>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body modal-background">
                    <div class="d-flex justify-content-center">
                        <img src="" class="img-fluid modal-photo-photo" alt="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title d-flex flex-column" id="newModalLabel">
                        <h5 class="modal-title font-weight-bold text-blue" id="exampleModalLabel"><i data-feather="plus-square" style="height: 24px; width: 24px;"></i> New Entry</h5>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{route('live.user.add')}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id_livestock" value="{{$livestock->id}}">
                    <div class="modal-body modal-background">
                        <div class="form-group mb-1">
                            <label class="mb-0 small">Weight</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white border-right-0"><i class="fa fa-weight-hanging text-muted"></i></span>
                                </div>
                                <input type="text" class="form-control border-left-0" placeholder="Enter weight" name="berat">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white border-left-0">Kg</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-1">
                            <label class="mb-0 small">Status</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text border-right-0 bg-white"><i data-feather="activity"></i></span>
                                </div>
                                <select class="form-control border-left-0" id="exampleFormControlSelect1" name="kesehatan">
                                    <option value="Sehat" selected>Sehat</option>
                                    <option value="Mati">Mati</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group mb-1">
                            <label class="mb-0 small">Report</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text border-right-0 bg-white"><i data-feather="edit-2"></i></span>
                                </div>
                                <input type="text" class="form-control border-left-0" placeholder="Enter report" name="report_desc">
                            </div>
                        </div>
                        <div class="form-group mb-1">
                            <label class="mb-0 small">Photo</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white border-right-0"><i data-feather="camera"></i></span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input bg-white input-image" id="validatedCustomFile" name="photo_url" required>
                                    <label class="custom-file-label" for="validatedCustomFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
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

            $(".view-photo").on("click", function () {
                var name = $(this).data("name");
                var date = $(this).data("date");
                var photo = $(this).data("photo");

                $(".modal-photo-name").text(name);
                $(".modal-photo-date").text(date);
                $(".modal-photo-photo").attr("src",photo);
                $("#exampleModal").modal("show")
            })

            $(".new-data").on("click", function () {
                $("#newModal").modal("show")
            })

            $('.input-image').change(function() {
                $(this).next('label').text($(this).val());
            })
        });
    </script>
@endsection
