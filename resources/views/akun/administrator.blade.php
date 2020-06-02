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
                    <th>ADDED BY <i class="fa fa-sort text-agakgrey"></i></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($administrator as $ad)
                    @php $usr = \App\Administrator::Where('id',$ad->added_by)->first(); @endphp
                    <tr>
                        <td><img src="https://ui-avatars.com/api/?rounded=true&name={{str_replace(' ','+',$ad->name)}}&background=EB5757&color=fff&size=32&bold=true&font-size=0.3"></td>
                        <td>{{$ad->name}}</td>
                        <td>{{$ad->email}}</td>
                        <td>{{$usr->name}}</td>
                        <td>
                            <div class="dropdown">
                                <div class=" " type="button" id="dropdownMenuButton" data-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false">
                                    <i data-feather="more-vertical"></i>
                                </div>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <div class="dropdown-item cursor-pointer view-data" data-name="{{$ad->name}}" data-email="{{$ad->email}}"><i data-feather="eye" class="text-blue mr-1"></i> View</div>
                                    <div class="dropdown-item cursor-pointer edit-data" data-name="{{$ad->name}}" data-email="{{$ad->email}}" data-id="{{$ad->id}}"><i data-feather="edit" class="text-blue mr-2"></i>Edit</div>
                                    <div class="dropdown-item cursor-pointer remove-data" data-id="{{$ad->id}}"><i data-feather="trash" class="text-blue mr-2"></i>Remove</div>
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
                <form method="POST" action="{{route('acc.admin.new')}}">
                    <div class="modal-header">
                        <h5 class="modal-title font-weight-bold text-blue" id="exampleModalLabel"><i data-feather="plus-square" style="height: 24px; width: 24px;"></i> New Entry</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body modal-background">
                        @csrf
                        <div class="form-group mb-1">
                            <label class="mb-0 small">Full Name</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white border-right-0"><i data-feather="user"></i></span>
                                </div>
                                <input type="text" class="form-control border-left-0" placeholder="Enter full name" name="name" required>
                            </div>
                        </div>
                        <div class="form-group mb-1">
                            <label class="mb-0 small">Email Address</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white border-right-0"><i data-feather="mail"></i></span>
                                </div>
                                <input type="email" class="form-control border-left-0" placeholder="Enter email address" name="email" required>
                            </div>
                        </div>
                        <div class="form-group mb-1">
                            <label class="mb-0 small">Password</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white border-right-0"><i data-feather="lock"></i></span>
                                </div>
                                <input type="password" class="form-control border-left-0" placeholder="Enter password" name="password" required>
                            </div>
                        </div>
                        <div class="form-group mb-1">
                            <label class="mb-0 small">Confirm Password</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white border-right-0"><i data-feather="lock"></i></span>
                                </div>
                                <input type="password" class="form-control border-left-0" placeholder="Enter confirmation password" name="confirmpassword" required>
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
                            <img class="modal-view-image" src="https://ui-avatars.com/api/?rounded=true&name=Faathir+Muhammad&background=EB5757&color=fff&size=128&bold=true&font-size=0.4" style="height: 128px; width: 128px">
                        </div>
                        <div class="col-md-8">
                            <div class="form-group mb-1">
                                <label class="mb-0 small">Full Name</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-light border-right-0 text-blue"><i data-feather="user"></i></span>
                                    </div>
                                    <input type="text" class="form-control bg-light border-left-0  modal-view-name"  readonly>
                                </div>
                            </div>
                            <div class="form-group mb-1">
                                <label class="mb-0 small">Email Address</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-light border-right-0 text-blue"><i data-feather="mail"></i></span>
                                    </div>
                                    <input type="email" class="form-control bg-light border-left-0 modal-view-email" readonly>
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
                <form method="POST" action="{{route('acc.admin.update')}}">
                    <div class="modal-body modal-background d-flex flex-column pb-5">
                        <div class="row h-100">
                            <div class="col-md-4 d-flex justify-content-center" style="border-right: 1.5px solid gainsboro">
                                <img class="modal-edit-image" src="https://ui-avatars.com/api/?rounded=true&name=Faathir+Muhammad&background=EB5757&color=fff&size=128&bold=true&font-size=0.4" style="height: 128px; width: 128px">
                            </div>
                            <div class="col-md-8">
                                @csrf
                                <input type="hidden" name="id" class="modal-edit-id">
                                <div class="form-group mb-1">
                                    <label class="mb-0 small">Full Name</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-white border-right-0"><i data-feather="user"></i></span>
                                        </div>
                                        <input type="text" class="form-control border-left-0 modal-edit-name" name="name">
                                    </div>
                                </div>
                                <div class="form-group mb-1">
                                    <label class="mb-0 small">Email Address</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-white border-right-0"><i data-feather="mail"></i></span>
                                        </div>
                                        <input type="email" class="form-control border-left-0 modal-edit-email" name="email">
                                    </div>
                                </div>
                                <div class="form-group mb-1">
                                    <label class="mb-0 small">Previous Password</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-white border-right-0"><i data-feather="lock"></i></span>
                                        </div>
                                        <input type="password" class="form-control border-left-0" placeholder="Enter previous password" name="previouspassword">
                                    </div>
                                </div>
                                <div class="form-group mb-1">
                                    <label class="mb-0 small">New Password</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-white border-right-0"><i data-feather="lock"></i></span>
                                        </div>
                                        <input type="password" class="form-control border-left-0" placeholder="Enter new password" name="password">
                                    </div>
                                </div>
                                <div class="form-group mb-1">
                                    <label class="mb-0 small">Confirm Password</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-white border-right-0"><i data-feather="lock"></i></span>
                                        </div>
                                        <input type="password" class="form-control border-left-0" placeholder="Enter confirmation password" name="confirmpassword">
                                    </div>
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
            $('#search-data').on( 'keyup', function () {
                console.log($(this).val())
                table.search($(this).val()).draw() ;
            } );

            $(".view-data").on("click", function () {
                var nama = $(this).data("name");
                var email = $(this).data("email");
                var image = 'https://ui-avatars.com/api/?rounded=true&name='+nama.replace(/\s+/g, '+')+'&background=EB5757&color=fff&size=128&bold=true&font-size=0.4'

                $(".modal-view-image").attr('src',image);
                $(".modal-view-name").val(nama);
                $(".modal-view-email").val(email);
                $("#modalView").modal("show")
            })

            $(".edit-data").on("click", function () {
                var id = $(this).data("id");
                var nama = $(this).data("name");
                var email = $(this).data("email");
                var image = 'https://ui-avatars.com/api/?rounded=true&name='+nama.replace(/\s+/g, '+')+'&background=EB5757&color=fff&size=128&bold=true&font-size=0.4'

                $(".modal-edit-image").attr('src',image);
                $(".modal-edit-id").val(id);
                $(".modal-edit-name").val(nama);
                $(".modal-edit-email").val(email);
                $("#modalEdit").modal("show")
            })

            $(".remove-data").on("click", function () {
                var id_usr = $(this).data("id");
                var url = "{{route('acc.admin.delete')}}";
                console.log(url)
                swal({
                    title: "Are you sure?",
                    text: "System will remove this account permanently!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                type: "POST",
                                url: url,
                                data: { id: id_usr, _token: "{{ csrf_token() }}", }
                            }).done(function( msg ) {
                                swal("Success! account has been removed permanently", {
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

        } );
    </script>
@endsection
