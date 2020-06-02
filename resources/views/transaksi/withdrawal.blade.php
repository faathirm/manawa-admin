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
                    <th>USER <i class="fa fa-sort text-agakgrey"></i></th>
                    <th>AMOUNT <i class="fa fa-sort text-agakgrey"></i></th>
                    <th>BANK <i class="fa fa-sort text-agakgrey"></i></th>
                    <th>STATUS <i class="fa fa-sort text-agakgrey"></i></th>
                    <th>DATE <i class="fa fa-sort text-agakgrey"></i></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($withdraw as $w)
                    @php
                        $u = \App\Customer::where('id',$w->id_user)->first();
                        $acc = \App\CustomerAccount::where('id', $w->id_user_acc)->first();
                        $s = \App\WithdrawStatus::Where('id_withdraw', $w->id)->OrderBy('created_at', 'desc')->first();
                    @endphp
                    <tr>
                        <td><div class="status-dot @if($s->status == "Selesai") bg-primary @elseif($s->status == "Dibatalkan") bg-danger @else bg-success @endif"></div></td>
                        <td>{{ucwords($u->name)}}</td>
                        <td>@currency($w->amount)</td>
                        <td>{{$acc->acc_bank}}</td>
                        <td>{{$s->status}}</td>
                        <td>{{$w->created_at}}</td>
                        <td>
                            <div class="dropdown">
                                <div class=" " type="button" id="dropdownMenuButton" data-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false">
                                    <i data-feather="more-vertical"></i>
                                </div>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <div class="dropdown-item cursor-pointer edit-data" data-id="{{$w->id}}" data-name="{{ucwords($u->name)}}" data-date="{{$w->created_at}}" data-status="{{$s->status}}" data-amount="{{$w->amount}}" data-bank="{{$acc->acc_bank}}" data-photo="{{$s->photo_url}}"><i data-feather="edit" class="text-blue mr-2"></i>Update</div>
                                    <div class="dropdown-item cursor-pointer remove-data" data-id="{{$w->id}}"><i data-feather="trash" class="text-blue mr-2"></i>Remove</div>
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
                <form method="POST" action="{{route('trc.withdrawal.new')}}" enctype="multipart/form-data">
                    <div class="modal-header">
                        <div class="modal-title d-flex flex-column" id="exampleModalLabel">
                            <h3 class="font-weight-bold text-blue mb-0 modal-view-id">2564</h3>
                            <div class="small badge badge-success modal-view-status">Waiting</div>
                        </div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body modal-background">
                        @csrf
                        <input type="hidden" class="modal-id" name="id">
                        <div class="d-flex justify-content-between font-weight-bold pb-2">
                            <div class="modal-view-name">Dini mardini</div>
                            <div class="modal-view-date">11/02/2020</div>
                        </div>
                        <div class="form-group mb-1">
                            <label class="mb-0 small">Status</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white border-right-0"><i data-feather="activity"></i></span>
                                </div>
                                <select class="form-control border-left-0 modal-status-select" id="exampleFormControlSelect1" name="status">
                                    <option value="Dalam Proses">Dalam Proses</option>
                                    <option value="Dibatalkan">Dibatalkan</option>
                                    <option value="Selesai">Selesai</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group mb-1">
                            <label class="mb-0 small">Amount</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light border-right-0"><i data-feather="command"></i></span>
                                </div>
                                <input type="text" class="form-control bg-light border-left-0 modal-view-amount" readonly>
                            </div>
                        </div>
                        <div class="form-group mb-1">
                            <label class="mb-0 small">Bank</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light border-right- bg-light"><i data-feather="briefcase"></i></span>
                                </div>
                                <input type="text" class="form-control bg-light border-left-0 modal-view-bank" readonly>
                            </div>
                        </div>
                        <div class="form-group mb-1 modal-upload-image">
                            <label class="mb-0 small">Photo</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white border-right-0"><i data-feather="camera"></i></span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input bg-white input-image" id="validatedCustomFile" name="photo">
                                    <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-image mt-2">
                            <label class="mb-0 small">Photo</label>
                            <img src="{{asset('image/bukt-transfer.jpg')}}" class="img-fluid modal-view-image  img-thumbnail" alt="">
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
                searchBox: false
            });
            $('#search-data').on( 'keyup', function () {
                console.log($(this).val())
                table.search($(this).val()).draw() ;
            } );

            $(".edit-data").on("click", function () {
                var id = $(this).data("id");
                var status = $(this).data("status");
                var name = $(this).data("name");
                var date = $(this).data("date");
                var amount = $(this).data("amount");
                var bank = $(this).data("bank");
                var photo = $(this).data("photo");

                console.log(status);
                $(".modal-view-id").text(id);
                $(".modal-view-status").text(status);
                $(".modal-view-name").text(name);
                $(".modal-view-date").text(date);
                $(".modal-view-amount").val(amount);
                $(".modal-view-bank").val(bank);
                $(".modal-id").val(id);

                $(".modal-status-select").val(status).change();
                if(status == "Selesai"){
                    $(".modal-view-status").removeClass().addClass('small modal-view-status badge badge-primary');;
                    $(".modal-view-status").text('Selesai');
                    $(".modal-upload-image").hide();
                    $(".modal-image").show();
                    $(".modal-view-image").attr('src',$(this).data("photo"));
                }else if(status == "Dibatalkan"){
                    $(".modal-view-status").removeClass().addClass('small modal-view-status badge badge-danger');
                    $(".modal-view-status").text('Dibatalkan');
                    $(".modal-upload-image").show();
                    $(".modal-image").hide();
                }else{
                    $(".modal-view-status").removeClass().addClass('small modal-view-status badge badge-success');
                    $(".modal-view-status").text('Dalam Proses');
                    $(".modal-upload-image").show();
                    $(".modal-image").hide();
                }

                $("#exampleModal").modal("show")

                $('.input-image').change(function() {
                    $(this).next('label').text($(this).val());
                })
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

        $(document).on("click", ".remove-data", function () {
            var id = $(this).data("id");
            var url = "{{route('trc.withdrawal.delete')}}";
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
    </script>
@endsection
