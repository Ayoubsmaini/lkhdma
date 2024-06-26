<!DOCTYPE html>
<html class="no-js" lang="en_AU" />
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Lkhdma</title>
	<meta name="description" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1, user-scalable=no" />
	<meta name="HandheldFriendly" content="True" />
	<meta name="pinterest" content="nopin" />
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/ui/trumbowyg.min.css" integrity="sha512-Fm8kRNVGCBZn0sPmwJbVXlqfJmPC13zRsMElZenX6v721g/H7OukJd8XzDEBRQ2FSATK8xNF9UYvzsCtUpfeJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}" />
		
    <link rel="icon" href="{{ asset('assets/images/icon.png') }}"type="image/png" sizes="64x64">

	
	<link rel="shortcut icon" type="image/x-icon" href="#" />
</head>
<body data-instant-intensity="mousedown">
	<header>
		<nav class="navbar navbar-expand-lg navbar-light    py-3">
			<div class="container d-flex align-items-baseline">
				<a class="navbar-brand me-4" href="{{ route('home') }}">
					<img src="{{ asset('assets/images/logo.png') }}" style="width: 100px; height: auto;" alt="logo">
				</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ms-auto mb-2 px-4 mb-lg-0">
						<li class="nav-item">
							<a class="nav-link" aria-current="page" href="{{ route('home') }}">Accueil</a>
						</li>   
						<li class="nav-item">
							<a class="nav-link" aria-current="page" href="{{ route ('tarif') }}">Nos Services</a>
						</li>   
						<li class="nav-item">
							<a class="nav-link" aria-current="page" href="{{ route('details') }}">Trouver un emploi</a>
						</li>                                    
					</ul>               
					@if(Auth::check())
					<a href="{{ route('account.profile') }}" class="btn btn-primary mb-3 mb-sm-0">
						Mon Profile
					</a>
				@else
					<a href="{{ route('account.createJob') }}" class="btn btn-primary mb-3 mb-sm-0">
						Publier un Offre
					</a>
				@endif
				<div class="px-2">
					@if(Auth::check())
				<a href="{{ route('account.logout') }}"  class="btn btn-outline-secondary mb-3 mb-sm-0">
               
					Se dconnecter
                </a>
				@else @endif</div>
				</div>
			</div>
		</nav>
		
	</header>
@yield('main')

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title pb-0" id="exampleModalLabel">Change Profile Picture</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="profilePicForm" name="profilePicForm" action="" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Profile Image</label>
                <input type="file" class="form-control" id="image" name="image">
				<p class="text-danger" id="image-error"></p>
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary mx-3">Update</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>            
        </form>
      </div>
    </div>
  </div>
</div>

<footer class=" lazy d-flex bg-image-style dark align-items-center " class=""
data-bg="{{ asset('assets/images/77.png') }}">

<div class="container">
    <p class="text-center text-white pt-3 fw-bold fs-6">
		<a href="{{ route('home') }}"><img src="{{ asset('assets/images/zelij.png') }}" style="width: 200px; height: auto;" alt="pattern"> </a>
		
	</p>
</div>
</footer> 
<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.5.1.3.min.js') }}"></script>
<script src="{{ asset('assets/js/instantpages.5.1.0.min.js') }}"></script>
<script src="{{ asset('assets/js/lazyload.17.6.0.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/trumbowyg.min.js" integrity="sha512-YJgZG+6o3xSc0k5wv774GS+W1gx0vuSI/kr0E0UylL/Qg/noNspPtYwHPN9q6n59CTR/uhgXfjDXLTRI+uIryg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>

<script>
	$('.textarea').trumbowyg();

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	$("#profilePicForm").submit(function(e){
		e.preventDefault();

		var formData = new FormData(this);

		$.ajax({
			url: '{{ route("account.updateProfilePic") }}',
			type: 'post',
			data: formData,
			dataType: 'json',
			contentType: false,
			processData: false,
			success: function(response) {
				if(response.status == false) {
					var errors = response.errors;
					if (errors.image) {
						$("#image-error").html(errors.image)
					}
				} else {
					window.location.href = '{{ url()->current() }}';
				}
			}
		});
	});
</script>

@yield('customJs')
</body>
</html>