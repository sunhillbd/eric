
@extends('frontend.layouts.master')


@section('title','ESE Law')

@section('header')
	@include('frontend.partials.header')
@endsection


@section('content')

		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

					<div class="col_one_third">
						<h4>1. Waiver Contract</h4>

						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the relvease of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>

						<label for="register-form-name">Signature</label>
						<input type="text" id="contract-name" name="contract-name" value="Type your full name here" class="form-control" /><br>
						<button class="button button-3d nomargin" id="contract-accept" name="login-form-submit" value="accept">Accept</button>
					</div>


					<div class="col_two_third col_last">
						@if (count($errors) > 0)
							<div class="alert alert-danger">
								<ul>
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
						@endif

							@if (session()->has('success'))
								<div class="alert alert-success">
									{{ session('success') }}
								</div>
							@endif
							<h4>2. Review Your Selection</h4>
							{!! Form::open(['route' => 'payment.submit','id'=>'payment-form','class'=>'nobottommargin']) !!}

							<div class="columnbox">

								<div class="panel panel-default">
									<div class="panel-body">
										{!! Form::radio('package','Bronze',$existingUserPlan=='Bronze') !!} Bronze package
										<span class="pull-right"> price: $45</span>
									</div>

								</div>
								<div class="panel panel-default">
									<div class="panel-body">
										{!! Form::radio('package','Silver',$existingUserPlan=='Silver') !!} Silver package <span class="pull-right"> price: $65</span>
									</div>

								</div>
								<div class="panel panel-default">
									<div class="panel-body">
										{!! Form::radio('package','Gold', $existingUserPlan=='Gold') !!} Gold package <span class="pull-right"> price: $85</span>
									</div>

								</div>
								<div class="panel panel-default">
									<div class="panel-body">
										{!! Form::radio('package','Platinum',$existingUserPlan=='Platinum') !!} Platinum package <span class="pull-right">  price: $200</span>
									</div>

								</div>

							</div>

						<h4> Enter Your Payment Information</h4>

						<div class="columnbox">

							<div class="col_half">
									{!! Form::label('register-form-card-number','Card number') !!}
									<span class="pull-right">
										<img src="{{ asset('images/creditcards/amex.png') }}" class="creditcard">
										<img src="{{ asset('images/creditcards/discover.png') }}" class="creditcard">
										<img src="{{ asset('images/creditcards/mastercard.png') }}" class="creditcard">
										<img src="{{ asset('images/creditcards/visa.png') }}" class="creditcard">
									</span>

									{!! Form::number('',null,['placeholder'=>'Card Number...','class'=>'form-control','data-stripe'=>'number','size'=>20]) !!}
									{{--<input type="text" id="card-number" name="card-number" value="" class="form-control" />--}}
								</div>
								<div class="col_half col_last">
									{!! Form::label('expiration-date','Expiration date') !!}<br>

									{!! Form::text('',null,['size'=>3,'placeholder'=>'MM','data-stripe'=>'exp_month']) !!}
									<span class="">/</span>

									{!! Form::text('',null,['size'=>3,'placeholder'=>'YY','data-stripe'=>'exp_year']) !!}

								</div>
								<div class="clear"></div>
								<div class="col_half">

									{!! Form::label('register-form-cvc','Security Code') !!}

									{!! Form::text('',null,['class'=>'form-control','style'=>'width:100px','data-stripe'=>'cvc']) !!}

								</div>
								<div class="col_half col_last">
									{!! Form::label('register-form-zip-code','Zip-code') !!}
									{!! Form::text('',null,['class'=>'form-control','data-stripe'=>'address_zip','style'=>'width:100px']) !!}

								</div>
								<div class="clear"></div>
								{!! Form::label('coupon-code','Coupon code') !!}
								{!! Form::text('coupon_code',null,['class'=>'form-control','Placeholder'=>'Coupon Code (Optional)']) !!}
								<br>
								By clicking Complete Payment, I agree to the <a href="{{ route('index') }}">terms of use</a> and <a href="privacy-policy.html">privacy policy</a><br>
								<span style="font-size:12px"><i class="icon-lock"></i> Your information is secure and protected</span><br><br>
							<button class="submit button button-3d nomargin" >Complete Payment</button>

						</div>
						<div class="form-group payment-errors-group">
                                    <span class="payment-errors alert alert-danger" style="display:none;">
                                    </span>
						</div>
							{!! Form::close() !!}
					</div>

				</div>

			</div>

		</section>


{{--		@include('frontend.partials.login-modal')--}}

@endsection

@section('scripts')

	<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

	<script type="text/javascript">
		Stripe.setPublishableKey('pk_test_I5KuB5CgGzT0R8i8efGNn36o');
	</script>

	<script>

		$(function() {
			var $form = $('#payment-form');
			$form.submit(function(event) {
				// Disable the submit button to prevent repeated clicks:
				$form.find('.submit').prop('disabled', true);

				// Request a token from Stripe:
				Stripe.card.createToken($form, stripeResponseHandler);

				// Prevent the form from being submitted:
				return false;
			});

			function stripeResponseHandler(status, response) {
				// Grab the form:
				var $form = $('#payment-form');

				if (response.error) { // Problem!

					// Show the errors on the form:
					$form.find('.payment-errors').text(response.error.message).css('display','block');
					$form.find('.submit').prop('disabled', false); // Re-enable submission

				} else { // Token was created!

					// Get the token ID:
					var token = response.id;

					// Insert the token ID into the form so it gets submitted to the server:
					$form.append($('<input type="hidden" name="stripeToken">').val(token));

					// Submit the form:
					$form.get(0).submit();
				}
			};
		});


	</script>

@endsection
