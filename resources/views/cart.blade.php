
@extends(layouts.master)
@section('content')

 <main class="main">
        	<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title">Shopping Cart<span>Shop</span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
            	<div class="cart">
	                <div class="container">
	                	<div class="row">
	                		<div class="col-lg-9">
	                			<table class="table table-cart table-mobile">
									<thead>
										 <tr>
											<th scope="col">Product</th>
											<th scope="col">Price</th>
											<th scope="col">Quantity</th>
											<th scope="col">Total</th>
											<th scope="col">Action</th>
										</tr>
									</thead>

								<tbody>
										@foreach($cart as $id=>$item)
										<tr>
											<td>{{ $item['name'] }}</td>
											<td>BDT{{ number_format($item['price'], 2) }}</td>
											<td>
												<button type="button" class="btn btn-secondary btn-sm" onclick="updateCart({{$id}},'decrease')">-</button>
													<input type="number" name="" id="" value="{{ $item['quantity'] }}" style="width: 40px; text-align: center;" readonly>
												<button type="button" class="btn btn-secondary btn-sm" onclick="updateCart({{$id}},'increase')">+</button>
											</td>
											<td>BDT{{ number_format($item['price'] * $item['quantity'], 2) }}</td>
											<td>
												<button type="button" class="btn btn-danger btn-sm" onclick="deleteItem({{$id}})">
													<i class="fa fa-trash"></i>
												</button>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table><!-- End .table table-wishlist -->
                                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                                           <div>
											<input type="text" class="form-control mb-3" placeholder="Coupon Code" id="coupon_code">
											<button class="btn btn-primary w-100" onclick="checkCoupon()">Apply Coupon</button>
										  </div>
										<div class="section-title">
											<p class="fs-5 fw-medium fst-italic text-primary">Cart Summary</p>
											<h1 class="display-6">Order Summary</h1>
										</div>
										<ul class="list-group">
											<li class="list-group-item d-flex justify-content-between align-items-center">
												Subtotal
												<span>
													BDT {{ number_format(collect($cart)->sum(function($item) { return $item['price'] * $item['quantity']; }), 2) }}
												</span>
											</li>
											<li class="list-group-item d-flex justify-content-between align-items-center">
												Discount
												<span>

													@if(isset(session()->get('coupon')['discount_amount']))
														BDT {{ number_format(session()->get('coupon')['discount_amount'], 2) }}
													@else
														BDT 0.00
													@endif
												</span>
											</li>
											<li class="list-group-item d-flex justify-content-between align-items-center">
												Total
												<span>
													@if(isset(session()->get('coupon')['total_after_discount']))
														BDT {{ number_format(session()->get('coupon')['total_after_discount'], 2) }}
													@else
														BDT {{ number_format(collect($cart)->sum(function($item) { return $item['price'] * $item['quantity']; }), 2) }}
													@endif
												</span>
											</li>
										</ul>
										<a href="{{route('checkout')}}" class="btn btn-primary w-100 mt-3">Proceed to Checkout</a>
									</div>
								<aside class="col-lg-3">
									<div class="summary summary-cart">
										<h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->
                                          
										<table class="table table-summary">
											<tbody>
												<tr class="summary-subtotal">
													<td>Subtotal:</td>
													<span>
                                                    BDT {{ number_format(collect($cart)->sum(function($item) { return $item['price'] * $item['quantity']; }), 2) }}
                                                    </span>
												</tr><!-- End .summary-subtotal -->
												<tr class="summary-shipping">
													<td>Shipping:</td>
													<td>&nbsp;</td>
												</tr>

												<tr class="summary-shipping-row">
													<td>
														<div class="custom-control custom-radio">
															<input type="radio" id="free-shipping" name="shipping" class="custom-control-input">
															<label class="custom-control-label" for="free-shipping">Free Shipping</label>
														</div><!-- End .custom-control -->
													</td>
													<td>$0.00</td>
												</tr><!-- End .summary-shipping-row -->

												<tr class="summary-shipping-row">
													<td>
														<div class="custom-control custom-radio">
															<input type="radio" id="standart-shipping" name="shipping" class="custom-control-input">
															<label class="custom-control-label" for="standart-shipping">Standart:</label>
														</div><!-- End .custom-control -->
													</td>
													<td>$10.00</td>
												</tr><!-- End .summary-shipping-row -->

												<tr class="summary-shipping-row">
													<td>
														<div class="custom-control custom-radio">
															<input type="radio" id="express-shipping" name="shipping" class="custom-control-input">
															<label class="custom-control-label" for="express-shipping">Express:</label>
														</div><!-- End .custom-control -->
													</td>
													<td>$20.00</td>
												</tr><!-- End .summary-shipping-row -->

												<tr class="summary-shipping-estimate">
													<td>Estimate for Your Country<br> <a href="dashboard.html">Change address</a></td>
													<td>&nbsp;</td>
												</tr><!-- End .summary-shipping-estimate -->

												<tr class="summary-total">
													<td>Total:</td>
													<td>$160.00</td>
												</tr><!-- End .summary-total -->
											</tbody>
										</table><!-- End .table table-summary -->

										<a href="checkout.html" class="btn btn-outline-primary-2 btn-order btn-block">PROCEED TO CHECKOUT</a>
									</div><!-- End .summary -->

									<a href="category.html" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE SHOPPING</span><i class="icon-refresh"></i></a>
								</aside><!-- End .col-lg-3 -->
							</div><!-- End .row -->
						</div><!-- End .container -->
					</div><!-- End .cart -->
				</div><!-- End .page-content -->
			</main><!-- End .main -->

        @endsection

		@push('scripts')
		<script>
			function deleteItem(id) {
				let url = "{{ route('cart.remove', '') }}/" + id;
				let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
				fetch(url, {
					method: 'get',
					headers: {
						'Content-Type': 'application/json',
						'X-CSRF-TOKEN': token
					}
				}).then(response => response.json())
				.then(data => {
					console.log(data);
					location.reload();
				})
				.catch(error => {
					console.error('Error:', error);
				});
			}
			function updateCart(id, action) {
				let url = "{{ route('cart.update') }}";
				let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
				fetch(url, {
					method: 'POST',
					headers: {
						'Content-Type': 'application/json',
						'X-CSRF-TOKEN': token
					},
					body: JSON.stringify({
						product_id: id,
						action: action
					})
				}).then(response => response.json())
				.then(data => {
					console.log(data);
					location.reload();
				})
				.catch(error => {
					console.error('Error:', error);
				});
			}

			function checkCoupon() {
				let coupon_code = document.getElementById('coupon_code').value;
				let url = "{{ route('cart.check_coupon') }}";
				let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
				fetch(url, {
					method: 'POST',
					headers: {
						'Content-Type': 'application/json',
						'X-CSRF-TOKEN': token
					},
					body: JSON.stringify({
						coupon_code: coupon_code
					})
				}).then(response => response.json())
				.then(data => {
					if(data.valid) {
						alert('Coupon applied! Discount: BDT' + data.discount);
					} else {
						alert('Invalid coupon code.');
					}
					location.reload();
				})
				.catch(error => {
					console.error('Error:', error);
				});
			}
		</script>
     @endpush
