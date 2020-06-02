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
                    <th>STATUS <i class="fa fa-sort text-agakgrey"></i></th>
                    <th>MESSAGE <i class="fa fa-sort text-agakgrey"></i></th>
                    <th>DATE <i class="fa fa-sort text-agakgrey"></i></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                    @foreach($confirmation as $conf)
                        @php
                            $transaction = \App\Transaction::find($conf->id_transaction);
                            $user = \App\Customer::find($transaction->id_user);

                            $message = "";
                            if($conf->id_journal_topup != null){
                                $journal = \App\Journal::where('id', $conf->id_journal_topup)->first();
                                $message = ucwords($journal->journal_desc);
                            }else{
                                $message="";
                            }

                            $status = "";
                            if($conf->denied_by != null){
                                $status = "Denied";
                            }else if($conf->verified_by != null){
                                $status = "Verified";
                            }else{
                                $status = "Unverified";
                            }
                        @endphp
                        <tr>
                            <td>
                                @php
                                    if($conf->denied_by != null){
                                        echo '<div class="status-dot bg-danger"></div>';
                                    }else if($conf->verified_by != null){
                                        echo '<div class="status-dot bg-primary"></div>';
                                    }else{
                                        echo '<div class="status-dot bg-success"></div>';
                                    }
                                @endphp
                            </td>
                            <td>{{$transaction->id}}</td>
                            <td>{{ucwords($user->name)}}</td>
                            <td>
                                @php
                                    if($conf->denied_by != null){
                                        echo 'Denied';
                                    }else if($conf->verified_by != null){
                                        echo 'Verified';
                                    }else{
                                        echo 'Unverified';
                                    }
                                @endphp
                            </td>
                            <td>{{$message}}</td>
                            <td>{{$conf->created_at}}</td>
                            <td>
                                <div class="dropdown">
                                    <div class=" " type="button" id="dropdownMenuButton" data-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false">
                                        <i data-feather="more-vertical"></i>
                                    </div>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <div class="dropdown-item cursor-pointer edit-data" data-url="{{$conf->photo_url}}" data-id="{{$transaction->id}}" data-name="{{ucwords($user->name)}}" data-date="{{$conf->created_at}}" data-status="{{$message}}" data-conf-id="{{$conf->id}}"><i class="text-blue mr-2 fa fa-eye"></i>View</div>
                                        <div class="dropdown-item cursor-pointer remove-data" data-id="{{$conf->id}}"><i data-feather="trash" class="text-blue mr-2"></i>Remove</div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
{{--                    <tr>--}}
{{--                        <td><div class="status-dot bg-primary"></div></td>--}}
{{--                        <td>{{substr(md5(mt_rand()), 0, 7)}}</td>--}}
{{--                        <td>Dendy Armandiaz Aziz</td>--}}
{{--                        <td>Verified</td>--}}
{{--                        <td>23/02/2020</td>--}}
{{--                        <td><button class="btn btn-outline-dark view-photo btn-sm"><i class="fa fa-camera"></i> View</button></td>--}}
{{--                        <td>--}}
{{--                            <div class="dropdown">--}}
{{--                                <div class=" " type="button" id="dropdownMenuButton" data-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false">--}}
{{--                                    <i data-feather="more-vertical"></i>--}}
{{--                                </div>--}}
{{--                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">--}}
{{--                                    <div class="dropdown-item cursor-pointer remove-data"><i data-feather="trash" class="text-blue mr-2"></i>Remove</div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                        <td><div class="status-dot bg-danger"></div></td>--}}
{{--                        <td>{{substr(md5(mt_rand()), 0, 7)}}</td>--}}
{{--                        <td>Dini Mardini</td>--}}
{{--                        <td>Denied</td>--}}
{{--                        <td>30/02/2020</td>--}}
{{--                        <td><button class="btn btn-outline-dark view-photo btn-sm"><i class="fa fa-camera"></i> View</button></td>--}}
{{--                        <td>--}}
{{--                            <div class="dropdown">--}}
{{--                                <div class=" " type="button" id="dropdownMenuButton" data-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false">--}}
{{--                                    <i data-feather="more-vertical"></i>--}}
{{--                                </div>--}}
{{--                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">--}}
{{--                                    <div class="dropdown-item cursor-pointer remove-data"><i data-feather="trash" class="text-blue mr-2"></i>Remove</div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </td>--}}
{{--                    </tr>--}}
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
                        <h3 class="font-weight-bold text-blue mb-0 modal-view-id"></h3>
                        <div class="small modal-view-status">Unverified</div>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body modal-background">
                    <div class="d-flex justify-content-between font-weight-bold pb-2">
                        <div class="modal-view-name"></div>
                        <div class="modal-view-date"></div>
                    </div>
                    <div>
                        <img src="{{asset('image/bukt-transfer.jpg')}}" class="img-fluid modal-view-image" alt="">
                    </div>
                </div>
                <div class="modal-footer">
                    <form method="POST" class="form-inline" action="{{route('trc.confirmation.update')}}">
                        @csrf
                        <button type="button" class="btn btn-dark mr-2" data-dismiss="modal">Close</button>
                        <input type="hidden" class="modal-id-value" name="id">
                        <select class="form-control" name="status">
                            <option disabled selected>Status</option>
                            <option value="verified">Verify</option>
                            <option value="denied">Deny</option>
                            <option value="unverified">Unverify</option>
                        </select>
                        <button type="submit" class="btn btn-primary ml-2">Submit</button>
                    </form>
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
                searchBox: false,
                {{--processing: true,--}}
                {{--serverSide: true,--}}
                {{--ajax: '{{route('trc.confirmation.json')}}',--}}
                {{--columns: [--}}
                {{--    {render: function (data, type, row) {--}}
                {{--        if(row.denied_by != null){--}}
                {{--            return '<div class="status-dot bg-danger"></div>';--}}
                {{--        }else if(row.verified_by != null){--}}
                {{--            return '<div class="status-dot bg-primary"></div>';--}}
                {{--        }else{--}}
                {{--            return '<div class="status-dot bg-success"></div>';--}}
                {{--        }--}}
                {{--    }},--}}
                {{--    {data:'id',name:'id'},--}}
                {{--    {data:'id_user_acc',name:'id_user_acc'},--}}
                {{--    {data: 'status', name:'status'},--}}
                {{--    {data: 'message', name:'message'},--}}
                {{--    {data:'created_at',name:'created_at'},--}}
                {{--    {render: function (data, type, row) {--}}
                {{--            return '<div class="dropdown">\n' +--}}
                {{--                '<div class=" " type="button" id="dropdownMenuButton" data-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false">\n' +--}}
                {{--                '<i class="fa fa-ellipsis-v"></i>\n' +--}}
                {{--                '</div>\n' +--}}
                {{--                '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">\n' +--}}
                {{--                '<div class="dropdown-item cursor-pointer edit-data" data-url="'+row.photo_url+'" data-id="'+row.id+'" data-name="'+row.id_user_acc+'" data-date="'+row.created_at+'" data-status="'+row.status+'"><i class="text-blue mr-2 fa fa-eye"></i>View</div>\n' +--}}
                {{--                '<div class="dropdown-item cursor-pointer remove-data" data-id="'+row.id+'"><i class="text-blue mr-2 fa fa-trash"></i>Remove</div>\n' +--}}
                {{--                '</div>\n' +--}}
                {{--                '</div>';--}}
                {{--        }}--}}
                {{--]--}}
            });
            $('#search-data').on( 'keyup', function () {
                table.search($(this).val()).draw() ;
            } );

            $(".view-photo").on("click", function () {
                console.log("D")
                $("#exampleModal").modal("show")
            })

        } );

        $(document).on("click", ".remove-data", function () {
            var id = $(this).data("id");
            var url = "{{route('trc.confirmation.delete')}}";
            console.log(id)
            swal({
                title: "Are you sure?",
                text: "System will remove this data permanently!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            type: "POST",
                            url: url,
                            data: { id: id, _token: "{{ csrf_token() }}", }
                        }).done(function( msg ) {
                            swal("Success! data has been removed permanently", {
                                icon: "success",
                            });
                            location.reload();
                        });
                    } else {
                        swal("Action cancelled",{
                            icon: "success",
                        });
                    }
                });
        })

        $(document).on("click",".edit-data", function () {
            $(".modal-view-image").attr('src',$(this).data("url"));
            $(".modal-view-name").text($(this).data("name"));
            $(".modal-view-date").text($(this).data("date"));
            $(".modal-view-id").text($(this).data("id"));
            $(".modal-id-value").val($(this).data("conf-id"));


            var status = $(this).data("status");
            if(status == "Verified"){
                $(".modal-view-status").removeClass().addClass('small modal-view-status badge badge-primary');;
                // $(".modal-view-status").addClass('small modal-view-status badge badge-primary');
                $(".modal-view-status").text('Verified');
            }else if(status == "Denied"){
                $(".modal-view-status").removeClass().addClass('small modal-view-status badge badge-danger');
                // $(".modal-view-status").addClass('small modal-view-status badge badge-danger');
                $(".modal-view-status").text('Denied');
            }else{
                $(".modal-view-status").removeClass().addClass('small modal-view-status badge badge-success');
                // $(".modal-view-status").addClass('small modal-view-status badge badge-success');
                $(".modal-view-status").text('Unverified');
            }

            $("#exampleModal").modal("show")
        })
    </script>
@endsection
