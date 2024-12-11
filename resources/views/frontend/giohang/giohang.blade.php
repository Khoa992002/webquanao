@extends('frontend.layouts.app')
@section('content')   


 <section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">sản phẩm bạn đả thêm vào giỏ hàng</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@foreach ($cart as $cart)
						<tr>
							<td class="cart_product">
								<a href=""><img style="height:50px; width:50px;" src="{{ asset('admin/upload/product/' . $cart->image) }}" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$cart->name}}</a></h4>
								<p class="cart_id">{{$cart->id}}</p>
							</td>
							<td class="cart_price">
								<p>{{$cart->price}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up" > + </a>
									<input class="cart_quantity_input" type="text" name="quantity" value="{{ $cart->quantity }}" autocomplete="off" size="2">
									<a class="cart_quantity_down" > - </a>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{$cart->total_price}}</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" data-cart-id="{{ $cart->id }}" ><i class="fa fa-times"></i></a>
							</td>
						</tr>
                            @endforeach

						
					</tbody>
				</table>
			</div>
		</div>
	</section>

@endsection