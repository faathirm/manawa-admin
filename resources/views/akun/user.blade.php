@extends('layout')
@section('content')
    <div class="row">
        <div class="col-md-8">
            <button type="button" class="btn btn-dark font-weight-bold" data-toggle="modal" data-target="#exampleModal"><i data-feather="plus"></i> New Entry</button>
        </div>
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
                    <th>NAME <i class="fa fa-sort text-agakgrey"></i></th>
                    <th>EMAIL <i class="fa fa-sort text-agakgrey"></i></th>
                    <th class="text-center">LIVESTOCK AMOUNT <i class="fa fa-sort text-agakgrey"></i></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
{{--                @foreach($user as $us)--}}
{{--                    @php $livestock = \App\Livestock::where('id_user',$us->id)->whereNotNull('id_journal_purchase')->get(); @endphp--}}
{{--                    <tr>--}}
{{--                        <td><img src="https://ui-avatars.com/api/?rounded=true&name={{str_replace(' ','+',$us->name)}}&background=EB5757&color=fff&size=32&bold=true&font-size=0.3"></td>--}}
{{--                        <td>{{ucwords($us->name)}}</td>--}}
{{--                        <td>{{$us->email}}</td>--}}
{{--                        <td class="text-center">{{count($livestock)}}</td>--}}
{{--                        <td>--}}
{{--                            <div class="dropdown">--}}
{{--                                <div class=" " type="button" id="dropdownMenuButton" data-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false">--}}
{{--                                    <i data-feather="more-vertical"></i>--}}
{{--                                </div>--}}
{{--                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">--}}
{{--                                    <a href="{{route('acc.user.detail')}}" class="dropdown-item cursor-pointer"><i data-feather="eye" class="text-blue mr-1"></i> View</a>--}}
{{--                                    <div class="dropdown-item cursor-pointer edit-data"><i data-feather="edit" class="text-blue mr-2"></i>Edit</div>--}}
{{--                                    <div class="dropdown-item cursor-pointer remove-data"><i data-feather="trash" class="text-blue mr-2"></i>Remove</div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--                @endforeach--}}
                </tbody>
            </table>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold text-blue" id="exampleModalLabel"><i data-feather="plus-square" style="height: 24px; width: 24px;"></i> New Entry</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body modal-background">
                    <div class="form-group mb-1">
                        <label class="mb-0 small">Full Name</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white border-right-0"><i data-feather="user"></i></span>
                            </div>
                            <input type="text" class="form-control border-left-0" placeholder="Enter full name">
                        </div>
                    </div>
                    <div class="form-group mb-1">
                        <label class="mb-0 small">Email Address</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white border-right-0"><i data-feather="mail"></i></span>
                            </div>
                            <input type="email" class="form-control border-left-0" placeholder="Enter email address">
                        </div>
                    </div>
                    <div class="form-group mb-1">
                        <label class="mb-0 small">Password</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white border-right-0"><i data-feather="lock"></i></span>
                            </div>
                            <input type="password" class="form-control border-left-0" placeholder="Enter password">
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Submit</button>
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
                processing: true,
                serverSide: true,
                ajax: '{{route('acc.user.json')}}',
                columns: [
                    {render:function(data,type,row){
                        return '<img src="https://ui-avatars.com/api/?rounded=true&name='+row.name.replace(/\s+/g, '+')+'&background=EB5757&color=fff&size=32&bold=true&font-size=0.3"></td>';
                        }},
                    {data:'name',name:'name', className:'ucwords'},
                    {data:'email',name:'email'},
                    {data:'livestock_amount',name:'livestock_amount', className:'text-center'},
                    {render:function(data,type,row){
                        return '<div class="dropdown">\n' +
                            '                                <div class=" " type="button" id="dropdownMenuButton" data-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false">' +
                            '                                    <i class="fa fa-ellipsis-v"></i>' +
                            '                                </div>' +
                            '                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">' +
                            '                                    <a href="{{route("acc.user.detail")}}" class="dropdown-item cursor-pointer"><i class="fa fa-eye text-blue mr-1"></i> View</a>' +
                            '                                    <div class="dropdown-item cursor-pointer edit-data"><i class="fa fa-edit text-blue mr-2"></i>Edit</div>' +
                            '                                    <div class="dropdown-item cursor-pointer remove-data"><i class="fa fa-trash text-blue mr-2"></i>Remove</div>' +
                            '                                </div>' +
                            '                            </div>'
                        }}
                ]
            });
            $('#search-data').on( 'keyup', function () {
                console.log($(this).val())
                table.search($(this).val()).draw() ;
            } );

            $(".view-data").on("click", function () {
                $("#modalView").modal("show")
            })

            $(".edit-data").on("click", function () {
                $("#modalEdit").modal("show")
            })

            $(".remove-data").on("click", function () {
                swal({
                    title: "Are you sure?",
                    text: "System will remove this account permanently!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            swal("Success! account has been removed permanently", {
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
