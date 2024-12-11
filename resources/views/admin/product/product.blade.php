@extends('admin.layouts.app')
@section('content')
<div class="container-fluid">
    
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Default Table</h4>
                                <h6 class="card-subtitle">Using the most basic table markup, here’s how <code>.table</code>-based tables look in Bootstrap. All table styles are inherited in Bootstrap 4, meaning any nested tables will be styled in the same manner as the parent.</h6>
                                <h6 class="card-title m-t-40"><i class="m-r-5 font-18 mdi mdi-numeric-1-box-multiple-outline"></i> Table With Outside Padding</h6>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Title</th>
                                                <th scope="col">Image</th>
                                                <th scope="col">Loại</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">Giới thiệu</th>
                                                <th scope="col">Price</th>
                                            </tr>
                                            <tr>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tbody>
                                                @foreach($data as $key =>$item)
                                            <tr>
                                                <th scope="row">{{$key+1}}</th>
                                                <td>{{$item->name}}</td>
                                                <td>{{$item->image}}</td>
                                                <td></td>
                                                <td>{{$item->description}}</td>
                                                <td>{{$item->introduce}}</td>
                                                <td>{{$item->price}}</td>
                                                <td><a href="{{ route('edit', ['id' => $item->id]) }}">Sửa</a></td>
                                                
                                                
                                                
                                            </tr>
                                              @endforeach
                                            <tr>
                                            
                                                
                                                
                                            </tr>
                                              
                                            </tr>
                                        
                                           
                                        </tbody>
                                        <tfoot>
                                           <td colspan="8">
                                             <a href="product/addproduct"><button class="btn btn-success" id="button" method="post" >Thêm Sản phẩm</button></a>
                                            </td>
                                        </tfoot>
                                    </table>
                                </div>
                                <h6 class="card-title"><i class="m-r-5 font-18 mdi mdi-numeric-2-box-multiple-outline"></i> Table Without Outside Padding</h6>
                            </div>
                              {!! $data->links('pagination::bootstrap-4') !!}
                        </div>
                    </div>
                   
                    
                    
                    
                    
                </div>
               
            </div>

@endsection