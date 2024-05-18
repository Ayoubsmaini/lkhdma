@extends('client.layouts.form')

@section('main')
<section >
    <div class="container mt-4 ">

        <div class="row d-flex justify-content-center">
            <div class="row d-flex justify-content-center">
             
                <div class="col-md-5">
                    <div class="card border p-5">
                        <div class="row">
                            <div class="d-flex justify-content-between  ">
                                <h1 class="h3 text-danger">S'inscrire</h1>
                                <a href="{{ route('home') }}">
                                    <img class="mb-5" src="{{ asset('assets/images/logo.png') }}" style="width: 100px; height: auto;" alt="">
                                </a>
                            </div>
                        </div>
                        
                        <form action="" name="registrationForm" id="registrationForm">
                            <div class="mb-3">
                                <label for="name" class="mb-2">Nom Comlpet</label>
                                <input type="text" name="name" id="name" class="form-control">
                                <p></p>
                            </div> 
                            <div class="mb-3">
                                <label for="email" class="mb-2">Adresse Email</label>
                                <input type="text" name="email" id="email" class="form-control">
                                <p></p>
                            </div> 
                            <div class="mb-3">
                                <label for="password" class="mb-2">Mot de passe</label>
                                <input type="password" name="password" id="password" class="form-control">
                                <p></p>
                            </div> 
                            <div class="mb-3">
                                <label for="confirm_password" class="mb-2">Confirmez le mot de passe</label>
                                <input type="password" name="confirm_password" id="confirm_password" class="form-control">
                                <p></p>
                            </div> 
                           <div >
                               <div class="row d-flex justify-content-between " >
                                <button class="btn btn-primary mt-2">S'inscrire</button> 
                            </div>
                            <div class=" mt-4 text-center">
                            <p>Vous avez un compte? <a class="text-success" href="{{ route('account.login') }}">Connexion</a></p>

                            </div>
                           </div>
                        </form>                    
                    </div>
                    
                </div>
                
        </div>
    </div>
</section>
@endsection

@section('customJs')
<script>
$("#registrationForm").submit(function(e){
    e.preventDefault();

    $.ajax({
        url: '{{ route("account.processRegistration") }}',
        type: 'post',
        data: $("#registrationForm").serializeArray(),
        dataType: 'json',
        success: function(response) {
            if (response.status == false) {
                var errors = response.errors;
                if (errors.name) {
                    $("#name").addClass('is-invalid')
                    .siblings('p')
                    .addClass('invalid-feedback')
                    .html(errors.name)
                } else {
                    $("#name").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback')
                    .html('')
                }

                if (errors.email) {
                    $("#email").addClass('is-invalid')
                    .siblings('p')
                    .addClass('invalid-feedback')
                    .html(errors.email)
                } else {
                    $("#email").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback')
                    .html('')
                }

                if (errors.password) {
                    $("#password").addClass('is-invalid')
                    .siblings('p')
                    .addClass('invalid-feedback')
                    .html(errors.password)
                } else {
                    $("#password").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback')
                    .html('')
                }

                if (errors.confirm_password) {
                    $("#confirm_password").addClass('is-invalid')
                    .siblings('p')
                    .addClass('invalid-feedback')
                    .html(errors.confirm_password)
                } else {
                    $("#confirm_password").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback')
                    .html('')
                }
            } else {
                $("#name").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback')
                    .html('');

                $("#email").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback')
                    .html('')

                $("#password").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback')
                    .html('')

                $("#confirm_password").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback')
                    .html('');
                    
                window.location.href='{{ route("account.login") }}';
            }
        }
    });
});
</script>
@endsection