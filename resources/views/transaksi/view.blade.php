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
                    <th>TID <i class="fa fa-sort text-agakgrey"></i></th>
                    <th>USER <i class="fa fa-sort text-agakgrey"></i></th>
                    <th>DESCRIPTION <i class="fa fa-sort text-agakgrey"></i></th>
                    <th>AMOUNT <i class="fa fa-sort text-agakgrey"></i></th>
                    <th>DATE <i class="fa fa-sort text-agakgrey"></i></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
{{--                @foreach($transaction as $trans)--}}
{{--                    <tr>--}}
{{--                        @php $user = \App\Customer::Where('id',$trans->id_user)->first(); @endphp--}}
{{--                        <td>{{$trans->id}}</td>--}}
{{--                        <td>{{ucwords($user->name)}}</td>--}}
{{--                        <td>{{$trans->status}}</td>--}}
{{--                        <td>@currency($trans->total_price)</td>--}}
{{--                        <td>{{$trans->created_at}}</td>--}}
{{--                        <td>--}}
{{--                            <div class="dropdown">--}}
{{--                                <div class=" " type="button" id="dropdownMenuButton" data-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false">--}}
{{--                                    <i data-feather="more-vertical"></i>--}}
{{--                                </div>--}}
{{--                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">--}}
{{--                                    <div class="dropdown-item cursor-pointer edit-data" data-id="{{$trans->id}}" data-status="{{$trans->status}}" data-name="{{ucwords($user->name)}}" data-date="{{$trans->created_at}}" data-amount="{{$trans->total_price}}"><i data-feather="edit" class="text-blue mr-2"></i>Update</div>--}}
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
                <form method="POST" action="{{route('trc.view.update')}}">
                    <div class="modal-header">
                        <div class="modal-title d-flex flex-column" id="exampleModalLabel">
                            <h3 class="font-weight-bold text-blue mb-0 modal-edit-id"></h3>
                        </div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body modal-background">
                        <div class="d-flex justify-content-between font-weight-bold pb-2">
                            <div class="modal-edit-name"></div>
                            <div class="modal-edit-date"></div>
                        </div>
                        <input type="hidden" name="id" class="modal-form-id">
                        @csrf
                        <div class="form-group mb-1">
                            <label class="mb-0 small">Description</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white border-right-0"><i data-feather="message-square"></i></span>
                                </div>
                                <input type="text" class="form-control bg-white border-left-0 modal-edit-status" name="status">
                            </div>
                        </div>
                        <div class="form-group mb-1">
                            <label class="mb-0 small">Amount</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white border-right-0"><i data-feather="command"></i></span>
                                </div>
                                <input type="text" class="form-control bg-white border-left-0 modal-edit-amount" name="total_price">
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
                ajax: '{{route('trc.view.json')}}',
                columns: [
                    {data:'id',name:'id'},
                    {data:'id_user',name:'id_user'},
                    {data:'status',name:'status'},
                    {data:'total_price',name:'total_price'},
                    {data:'created_at',name:'created_at'},
                    {render: function (data, type, row) {
                        return '<div class="dropdown">\n' +
                            '                                <div class=" " type="button" id="dropdownMenuButton" data-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false">\n' +
                            '                                    <i class="fa fa-ellipsis-v"></i>\n' +
                            '                                </div>\n' +
                            '                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">\n' +
                            '                                    <div class="dropdown-item cursor-pointer edit-data" data-id="'+row.id+'" data-status="'+row.status+'" data-name="'+row.id_user+'" data-date="'+row.created_at+'" data-amount="'+row.total_price+'"><i class="text-blue mr-2 fa fa-edit"></i>Update</div>\n' +
                            '                                    <div class="dropdown-item cursor-pointer remove-data" data-id="'+row.id+'"><i class="text-blue mr-2 fa fa-trash"></i>Remove</div>\n' +
                            '                                </div>\n' +
                            '                            </div>';
                    }}
                ]
            });
            $('#search-data').on( 'keyup', function () {
                table.search($(this).val()).draw() ;
            } );

            $(".modal-edit-amount").on("keyup", function () {
                var value = $(this).val();
                $(this).val(formatRupiah(value.replace(/[^\d.-]/g, '').toString(), 'Rp. '))
            })

        } );

        $(document).on('click', '.edit-data', function () {
            var id = $(this).data("id");
            var name = $(this).data("name");
            var date = $(this).data("date");
            var amount = $(this).data("amount");
            var status = $(this).data("status");

            $(".modal-edit-id").text(id);
            $(".modal-edit-name").text(name);
            $(".modal-edit-date").text(date);
            $(".modal-form-id").val(id);
            $(".modal-edit-amount").val(formatRupiah(amount.toString(), "Rp. "));
            $(".modal-edit-status").val(status);

            $("#exampleModal").modal("show")
        })

        $(document).on("click", ".remove-data", function () {
            var id = $(this).data("id");
            var url = "{{route('trc.view.delete')}}";
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

        function formatRupiah(angka, prefix){
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split   		= number_string.split(','),
                sisa     		= split[0].length % 3,
                rupiah     		= split[0].substr(0, sisa),
                ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if(ribuan){
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }

        function test(){
        return '<div class=" " type="button" id="dropdownMenuButton" data-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"><i data-feather="more-vertical"></i></div>';
            //     <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            //     <div class="dropdown-item cursor-pointer edit-data"><i data-feather="edit" class="text-blue mr-2"></i>Update</div>
            // <div class="dropdown-item cursor-pointer remove-data"><i data-feather="trash" class="text-blue mr-2"></i>Remove</div>
            // </div>
        }

    </script>
@endsection
