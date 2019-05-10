@extends('landing.app')
@section('support','active')
@section('content')
<!---->
<div class="banner banner-in">
		 <div class="container">
			<div class="col-md-6 banner-matter-in">
				<h1>CONTACT US</h1>
			</div>
				<div class="col-md-6 banner-side side-banner">
					<div class="col-md-6 side">
						<img class="img-responsive" src="images/se1.jpg" alt="">
					</div>
					<div class="col-md-6 side">
						<img class="img-responsive" src="images/se.jpg" alt="">
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>
			</div>	
	</div>
	<!---->
	<!---->
	<div class="content">
		<div class="container">
			<div class="contact">				
					<div class="contact-grids">
						<div class="contact-form">
							{{ Form::open(['url' => route('query.submit'),'method'=>'post']) }}
								<div class="contact-form-row">
									<div>
										<span>Name :</span>
										{{ Form::text('name','', ['class' => 'text', 'placeholder'=>'Enter Your Name'])}}
										@if($errors->has('name'))
					                        <span class="help-block">
                                				<strong class="text-danger">{{$errors->first('name')}}</strong>
					                        </span>
					                    @endif
									</div>
									<div>
										<span>Email :</span>
										{{ Form::text('email','', ['class' => 'text', 'placeholder'=>'Enter Your Email'])}}
										@if($errors->has('email'))
					                        <span class="help-block">
                                				<strong class="text-danger">{{$errors->first('email')}}</strong>
					                        </span>
					                    @endif
									</div>
									<div>
										<span>Subject :</span>
										{{ Form::text('subject','', ['class' => 'text', 'placeholder'=>'Enter Subject'])}}
										@if($errors->has('subject'))
					                        <span class="help-block">
                                				<strong class="text-danger">{{$errors->first('subject')}}</strong>
					                        </span>
					                    @endif
									</div>
									<div class="clearfix"> </div>
								</div>
								<div class="clearfix"> </div>
								<div class="contact-form-row2">
									<span>Message :</span>
									<textarea name="message"> </textarea>
									@if($errors->has('message'))
					                    <span class="help-block">
                                			<strong class="text-danger">{{$errors->first('message')}}</strong>
					                    </span>
					                @endif
								</div>
								<input type="submit" value="send">
							{{Form::close()}}
						</div>						
					</div>
				</div>
			</div>
		<div class="content-bottom">
			<div class="container">
				<h3>DO YOU HATE WITH ME?</h3>
				<p>we are the biggest haters on planet, fella.</p>
			</div>
			<i> </i>
		</div>
	</div>
	<!---->
@endsection