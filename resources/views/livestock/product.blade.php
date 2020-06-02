@extends('layout')
@section('content')
    <div class="row">
        <div class="col-md-8">

        </div>
        <div class="col-md-4">
        </div>
    </div>
    <div class="row ml-2 mr-2 mt-3 rounded">
        <div class="col-md-6 pt-3 pb-4"  style=" height: 85%; -webkit-box-shadow: 0px 0px 30px -14px rgba(204,204,204,1);">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="font-weight-bold text-blue">ANIMAL</h4>
                    <hr class="mt-0">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <button type="button" class="btn btn-dark btn-sm font-weight-bold" data-toggle="modal" data-target="#animalNew"><i data-feather="plus"></i> New Entry</button>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control form-control-sm" id="search-data" placeholder="Search">
                </div>
            </div>
            <table id="myTable" class="hover row-border compact">
                <thead>
                <tr class="small">
                    <th width="1">NO</th>
                    <th>NAME <i class="fa fa-sort text-agakgrey"></i></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @php $x=1; @endphp
                @foreach($animal as $a)
                    <tr>
                        <td>{{$x++}}</td>
                        <td>{{$a->name}}</td>
                        <td>
                            <div class="dropdown">
                                <div class=" " type="button" id="dropdownMenuButton" data-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false">
                                    <i data-feather="more-vertical"></i>
                                </div>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <div class="dropdown-item cursor-pointer update-animal" data-id="{{$a->id}}" data-name="{{$a->name}}"><i data-feather="edit" class="text-blue mr-2"></i>Edit</div>
                                    <div class="dropdown-item cursor-pointer delete-animal" data-id="{{$a->id}}"><i data-feather="trash" class="text-blue mr-2"></i>Remove</div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-md-6 pt-3 pb-4"  style=" height: 85%; -webkit-box-shadow: 0px 0px 30px -14px rgba(204,204,204,1);">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="font-weight-bold text-blue">VARIETY</h4>
                    <hr class="mt-0">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <button type="button" class="btn btn-dark btn-sm font-weight-bold" data-toggle="modal" data-target="#varietyNew"><i data-feather="plus"></i> New Entry</button>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control form-control-sm" id="search-data-variety" placeholder="Search">
                </div>
            </div>
            <table id="varietyTable" class="hover row-border compact">
                <thead>
                <tr class="small">
                    <th width="1">NO</th>
                    <th>ANIMAL <i class="fa fa-sort text-agakgrey"></i></th>
                    <th>VARIETY <i class="fa fa-sort text-agakgrey"></i></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @php $x=1; @endphp
                @foreach($variety as $v)
                    @php $a = \App\Animal::find($v->id_animal); @endphp
                    <tr>
                        <td>{{$x++}}</td>
                        <td>{{$a->name}}</td>
                        <td>{{$v->name}}</td>
                        <td>
                            <div class="dropdown">
                                <div class=" " type="button" id="dropdownMenuButton" data-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false">
                                    <i data-feather="more-vertical"></i>
                                </div>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <div class="dropdown-item cursor-pointer update-variety" data-id="{{$v->id}}" data-animal="{{$a->id}}" data-name="{{$v->name}}"><i data-feather="edit" class="text-blue mr-2"></i>Edit</div>
                                    <div class="dropdown-item cursor-pointer delete-variety" data-id="{{$v->id}}"><i data-feather="trash" class="text-blue mr-2"></i>Remove</div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-12 pt-3 pb-4">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="font-weight-bold text-blue">PRODUCT</h4>
                    <hr class="mt-0">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <button type="button" class="btn btn-dark btn-sm font-weight-bold" data-toggle="modal" data-target="#modalNew"><i data-feather="plus"></i> New Entry</button>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control form-control-sm" id="search-data-farmVariety" placeholder="Search">
                </div>
            </div>
            <table id="farmVarietyTable" class="hover row-border compact">
                <thead>
                <tr class="small">
                    <th width="1">NO</th>
                    <th>FARM <i class="fa fa-sort text-agakgrey"></i></th>
                    <th>NAME <i class="fa fa-sort text-agakgrey"></i></th>
                    <th>TYPE <i class="fa fa-sort text-agakgrey"></i></th>
                    <th>PRICE BASE <i class="fa fa-sort text-agakgrey"></i></th>
                    <th>PRICE INCREMENT<i class="fa fa-sort text-agakgrey"></i></th>
                    <th>STOCK <i class="fa fa-sort text-agakgrey"></i></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @php $x=1; @endphp
                @foreach($farm_variety as $fv)
                    @php
                        $f = \App\Farm::find($fv->id_farm);
                        $v = \App\Variety::find($fv->id_variety);
                        $a = \App\Animal::find($v->id_animal);
                    @endphp
                    <tr>
                        <td>{{$x++}}</td>
                        <td>{{$f->name}}</td>
                        <td>{{$a->name}} {{$v->name}}</td>
                        <td>{{ucwords($fv->sales_type)}}</td>
                        <td>@currency($fv->price_base)</td>
                        <td>@currency($fv->price_monthly_incr)</td>
                        <td>{{$fv->stock}}</td>
                        <td>
                            <div class="dropdown">
                                <div class=" " type="button" id="dropdownMenuButton" data-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false">
                                    <i data-feather="more-vertical"></i>
                                </div>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <div class="dropdown-item cursor-pointer view-product"
                                         data-image="{{$fv->photo_url}}"
                                         data-id-farm="{{$f->name}}"
                                         data-id-variety="{{$v->name}}"
                                         data-sales-type="{{ucwords($fv->sales_type)}}"
                                         data-price-base="{{$fv->price_base}}"
                                         data-price-monthly-incr="{{$fv->price_monthly_incr}}"
                                         data-price-insurance="{{$fv->price_insurance}}"
                                         data-price-est-sell="{{$fv->price_est_sell}}"
                                         data-variety-desc="{{$fv->variety_desc}}"
                                         data-stock="{{$fv->stock}}"
                                    ><i data-feather="eye" class="text-blue mr-2"></i>View</div>
                                    <div class="dropdown-item cursor-pointer update-product"><i data-feather="edit" class="text-blue mr-2"></i>Edit</div>
                                    <div class="dropdown-item cursor-pointer delete-product"
                                         data-id="{{$fv->id}}"
                                    ><i data-feather="trash" class="text-blue mr-2"></i>Remove</div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
{{--    Animal New--}}
    <div class="modal fade" id="animalNew" tabindex="-1" role="dialog" aria-labelledby="animalNewLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="{{route('live.product.animal.add')}}">
                    <div class="modal-header">
                        <h5 class="modal-title font-weight-bold text-blue" id="exampleModalLabel"><i data-feather="plus-square" style="height: 24px; width: 24px;"></i> New Entry</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body modal-background">
                        @csrf
                        <div class="form-group mb-1">
                            <label class="mb-0 small">Name</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white border-right-0"><i data-feather="gitlab"></i></span>
                                </div>
                                <input type="text" class="form-control border-left-0" placeholder="Enter animal name" name="name" required>
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
{{--    Animal Update--}}
    <div class="modal fade" id="animalUpdate" tabindex="-1" role="dialog" aria-labelledby="animalUpdateLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="{{route('live.product.animal.update')}}">
                    <div class="modal-header">
                        <h5 class="modal-title font-weight-bold text-blue" id="exampleModalLabel"><i data-feather="edit" style="height: 24px; width: 24px;"></i> Update Entry</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body modal-background">
                        @csrf
                        <input type="hidden" name="id" class="input-animal-id">
                        <div class="form-group mb-1">
                            <label class="mb-0 small">Name</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white border-right-0"><i data-feather="gitlab"></i></span>
                                </div>
                                <input type="text" class="form-control border-left-0 input-animal-name" placeholder="Enter animal name" name="name" required>
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
{{--    Variety New--}}
    <div class="modal fade" id="varietyNew" tabindex="-1" role="dialog" aria-labelledby="varietyNewLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="{{route('live.product.variety.add')}}">
                    <div class="modal-header">
                        <h5 class="modal-title font-weight-bold text-blue" id="exampleModalLabel"><i data-feather="plus-square" style="height: 24px; width: 24px;"></i> New Entry</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body modal-background">
                        @csrf
                        <div class="form-group mb-1">
                            <label class="mb-0 small">Name</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white border-right-0"><i data-feather="gitlab"></i></span>
                                </div>
                                <select class="form-control" name="animal" required>
                                    <option disabled selected>Animal</option>
                                    @foreach($animal as $a)
                                        <option value="{{$a->id}}">{{$a->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group mb-1">
                            <label class="mb-0 small">Name</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white border-right-0"><i data-feather="gitlab"></i></span>
                                </div>
                                <input type="text" class="form-control border-left-0" placeholder="Enter variety name" name="name" required>
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
{{--    Animal Update--}}
    <div class="modal fade" id="varietyUpdate" tabindex="-1" role="dialog" aria-labelledby="varietyUpdateLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="{{route('live.product.variety.update')}}">
                    <div class="modal-header">
                        <h5 class="modal-title font-weight-bold text-blue" id="exampleModalLabel"><i data-feather="edit" style="height: 24px; width: 24px;"></i> Update Entry</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body modal-background">
                        @csrf
                        <input type="hidden" name="id" class="input-variety-id">
                        <div class="form-group mb-1">
                            <label class="mb-0 small">Name</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white border-right-0"><i data-feather="gitlab"></i></span>
                                </div>
                                <select class="form-control input-variety-select " name="id_animal" required>
                                    <option disabled selected>Animal</option>
                                    @foreach($animal as $a)
                                        <option value="{{$a->id}}">{{$a->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group mb-1">
                            <label class="mb-0 small">Name</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white border-right-0"><i data-feather="gitlab"></i></span>
                                </div>
                                <input type="text" class="form-control border-left-0 input-variety-name" placeholder="Enter animal name" name="name" required>
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
{{--    Product View--}}
    <div class="modal fade" id="modalView" tabindex="-1" role="dialog" aria-labelledby="modalView" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body modal-background ">
                    <div class="row d-flex">
                        <div class="col-md-3 d-flex justify-content-center" style="border-right: 1.5px solid gainsboro">
                            <img class="productImage rounded-circle" src="" style="height: 128px; width: 128px">
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-1">
                                        <label class="mb-0 small">Farm</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-light border-right-0 text-blue"><i data-feather="home"></i></span>
                                            </div>
                                            <input type="text" class="form-control bg-light border-left-0 id-farm" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group mb-1">
                                        <label class="mb-0 small">Variety</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-light border-right-0 text-blue"><i data-feather="gitlab"></i></span>
                                            </div>
                                            <input type="text" class="form-control bg-light border-left-0 id-variety" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-1">
                                        <label class="mb-0 small">Type</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-light border-right-0 text-blue"><i data-feather="type"></i></span>
                                            </div>
                                            <input type="text" class="form-control bg-light border-left-0 sales-type" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group mb-1">
                                        <label class="mb-0 small">Stock</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-light border-right-0 text-blue"><i data-feather="archive"></i></span>
                                            </div>
                                            <input type="text" class="form-control bg-light border-left-0 stock" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group mb-1">
                                        <label class="mb-0 small">Variety Description</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-light border-right-0 text-blue"><i data-feather="edit-2"></i></span>
                                            </div>
                                            <textarea type="text" class="form-control bg-light border-left-0 variety-desc" rows="5" style="height: 100%;" readonly></textarea>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-1">
                                        <label class="mb-0 small">Price Base</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-light border-right-0 text-blue"><i data-feather="bar-chart-2"></i></span>
                                            </div>
                                            <input type="text" class="form-control bg-light border-left-0 price-base" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group mb-1">
                                        <label class="mb-0 small">Price Monthly Increment</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-light border-right-0 text-blue"><i data-feather="bar-chart-2"></i></span>
                                            </div>
                                            <input type="text" class="form-control bg-light border-left-0 price-monthly-incr" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-1">
                                        <label class="mb-0 small">Price Insurance</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-light border-right-0 text-blue"><i data-feather="bar-chart-2"></i></span>
                                            </div>
                                            <input type="text" class="form-control bg-light border-left-0 price-insurance" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group mb-1">
                                        <label class="mb-0 small">Price Estimated Sell</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-light border-right-0 text-blue"><i data-feather="bar-chart-2"></i></span>
                                            </div>
                                            <input type="text" class="form-control bg-light border-left-0 price-est-sell" readonly>
                                        </div>
                                    </div>
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
{{--    Product New--}}
    <div class="modal fade" id="modalNew" tabindex="-1" role="dialog" aria-labelledby="modalNew" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="{{route('live.product.new')}}"  enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title font-weight-bold text-blue" id="exampleModalLabel"><i data-feather="plus-square" style="height: 24px; width: 24px;"></i> New Entry</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body modal-background ">
                        <div class="row d-flex">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-1">
                                            <label class="mb-0 small">Farm</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-light border-right-0 text-blue"><i data-feather="home"></i></span>
                                                </div>
                                                <select class="form-control bg-light border-left-0" name="id_farm" required>
                                                    @foreach($farm as $f)
                                                        <option value="{{$f->id}}">{{$f->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group mb-1">
                                            <label class="mb-0 small">Variety</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-light border-right-0 text-blue"><i data-feather="gitlab"></i></span>
                                                </div>
                                                <select class="form-control bg-light border-left-0" name="id_variety" required>
                                                    @foreach($variety as $v)
                                                        @php $a = \App\Animal::find($v->id_animal) @endphp
                                                        <option value="{{$v->id}}">{{$a->name}} {{$v->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-1">
                                            <label class="mb-0 small">Type</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-light border-right-0 text-blue"><i data-feather="type"></i></span>
                                                </div>
                                                <select class="form-control bg-light border-left-0" name="sales_type" required>
                                                    <option value="regular">Regular</option>
                                                    <option value="qurban">Qurban</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group mb-1">
                                            <label class="mb-0 small">Stock</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-light border-right-0 text-blue"><i data-feather="archive"></i></span>
                                                </div>
                                                <input type="number" class="form-control bg-light border-left-0 stock" name="stock" placeholder="Enter product stock">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group mb-1">
                                            <label class="mb-0 small">Variety Description</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-light border-right-0 text-blue"><i data-feather="edit-2"></i></span>
                                                </div>
                                                <textarea type="text" class="form-control bg-light border-left-0 variety-desc" name="variety_desc" rows="5" style="height: 100%;" required></textarea>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-1">
                                            <label class="mb-0 small">Price Base</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-light border-right-0 text-blue"><i data-feather="bar-chart-2"></i></span>
                                                </div>
                                                <input type="text" class="form-control bg-light border-left-0 price-base" name="price_base" placeholder="Enter base price" required>
                                            </div>
                                        </div>
                                        <div class="form-group mb-1">
                                            <label class="mb-0 small">Price Monthly Increment</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-light border-right-0 text-blue"><i data-feather="bar-chart-2"></i></span>
                                                </div>
                                                <input type="text" class="form-control bg-light border-left-0 price-monthly-incr" name="price_monthly_incr" placeholder="Enter monthly increment price" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-1">
                                            <label class="mb-0 small">Price Insurance</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-light border-right-0 text-blue"><i data-feather="bar-chart-2"></i></span>
                                                </div>
                                                <input type="text" class="form-control bg-light border-left-0 price-insurance" name="price_insurance" placeholder="Enter insurance price" required>
                                            </div>
                                        </div>
                                        <div class="form-group mb-1">
                                            <label class="mb-0 small">Price Estimated Sell</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-light border-right-0 text-blue"><i data-feather="bar-chart-2"></i></span>
                                                </div>
                                                <input type="text" class="form-control bg-light border-left-0 price-est-sell" name="price_est_sell" placeholder="Enter estimated sell price" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <hr>
                                        <div class="form-group mb-1 modal-upload-image">
                                            <label class="mb-0 small">Photo</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-white border-right-0"><i data-feather="camera"></i></span>
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input bg-white input-image" id="validatedCustomFile" name="photo_url">
                                                    <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                                </div>
                                            </div>
                                        </div>
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
            //Animal
            var table = $('#myTable').DataTable({
                paging: true,
                ordering: true,
                searchBox: true
            });
            $('#search-data').on('keyup', function () {
                console.log($(this).val())
                table.search($(this).val()).draw();
            });
            $(".update-animal").on("click", function () {
                $(".input-animal-id").val($(this).data("id"));
                $(".input-animal-name").val($(this).data("name"));
                $("#animalUpdate").modal("show");
            })
            $(".delete-animal").on("click", function () {
                var id_usr = $(this).data("id");
                var url = "{{route('live.product.animal.delete')}}";
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
                                data: { id: id_usr, _token: "{{ csrf_token() }}", }
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

            //Variety
            var varietytable = $('#varietyTable').DataTable({
                paging: true,
                ordering: true,
                searchBox: true
            });
            $('#search-data-variety').on('keyup', function () {
                varietytable.search($(this).val()).draw();
            });
            $(".update-variety").on("click", function () {
                $(".input-variety-id").val($(this).data("id"));
                $(".input-variety-name").val($(this).data("name"));
                $(".input-variety-select").val($(this).data("animal")).change();
                // console.log("c");
                $("#varietyUpdate").modal("show");
            })
            $(".delete-variety").on("click", function () {
                var id_usr = $(this).data("id");
                var url = "{{route('live.product.variety.delete')}}";
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
                                data: { id: id_usr, _token: "{{ csrf_token() }}", }
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

            //Farm Variety
            var table = $('#farmVarietyTable').DataTable({
                paging: true,
                ordering: true,
                searchBox: true
            });
            $('#search-data-farmVariety').on('keyup', function () {
                console.log($(this).val())
                table.search($(this).val()).draw();
            });
            $(".view-product").on("click", function () {
                console.log($(this).data("image"));
                $(".productImage").attr('src', $(this).data("image"));

                $(".id-farm").val($(this).data("id-farm"))
                $(".id-variety").val($(this).data("id-variety"))
                $(".sales-type").val($(this).data("sales-type"))
                $(".price-base").val(formatRupiah($(this).data("price-base").toString(),'Rp. '))
                $(".price-monthly-incr").val(formatRupiah($(this).data("price-monthly-incr").toString(),'Rp. '))
                $(".price-insurance").val(formatRupiah($(this).data("price-insurance").toString(),'Rp. '))
                $(".price-est-sell").val(formatRupiah($(this).data("price-est-sell").toString(),'Rp. '))
                $(".variety-desc").text($(this).data("variety-desc"))
                $(".stock").val($(this).data("stock"))
                $("#modalView").modal("show");
            })

            $(".delete-product").on("click", function () {
                var id_usr = $(this).data("id");
                var url = "{{route('live.product.delete')}}";
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
                                data: { id: id_usr, _token: "{{ csrf_token() }}", }
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

            $(".price-base").on("keyup",function () {
                $(this).val(formatRupiah($(this).val().toString(),'Rp. '));
            })

            $(".price-monthly-incr").on("keyup",function () {
                $(this).val(formatRupiah($(this).val().toString(),'Rp. '));
            })

            $(".price-insurance").on("keyup",function () {
                $(this).val(formatRupiah($(this).val().toString(),'Rp. '));
            })

            $(".price-est-sell").on("keyup",function () {
                $(this).val(formatRupiah($(this).val().toString(),'Rp. '));
            })

            $('.input-image').change(function() {
                $(this).next('label').text($(this).val());
            })


        });

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
    </script>
@endsection


