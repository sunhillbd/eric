
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
						<h4> Waiver Contract</h4>

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


							{!! Form::open(['route' => 'auth.password.update','name'=>'register-form','class'=>'nobottommargin']) !!}

							<input type="hidden" name="reset_pass_token" value="{{ $passwordResetToken }}">
						<h4> Enter Your Account Information</h4>
						<div class="columnbox">

									{!! Form::label('password', 'Password') !!}<span>at least 6 characters long</span>
									{!! Form::password('password',['id'=>'register-form-password','class'=>'form-control']) !!}
									<br>
									{!! Form::label('password_confirmation', 'Confirm Password') !!}<br>
									{!! Form::password('password_confirmation',['id'=>'register-form-cpassword','class'=>'form-control']) !!}


							<br>
							<a data-toggle="modal" data-target="#myModal" href="javascript:void(0)">Already have an account?</a>
							<br><br>
							<button class="button button-3d nomargin" id="sign-up" name="sign-up" value="sign-up">Sign-up</button>

						</div>

							{!! Form::close() !!}
					</div>

				</div>

			</div>

		</section>


		@include('frontend.partials.login-modal')

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
