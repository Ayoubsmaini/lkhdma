@extends('client.layouts.app')
@section('main')
    <section class="section-0 lazy d-flex bg-image-style dark align-items-center " class=""
        data-bg="{{ asset('assets/images/77.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-7 col-xl-8">
                    <h1 class="mb-3">Trouvez Votre Voie Professionnelle</h1>
                    <p class="mb-4">Trouvez la solution qui correspond parfaitement à vos besoins</p>
                    <div class="banner-btn mt-3 mt-md-4">
                        @if (auth()->check())
                            <a href="{{ route('account.profile') }}" class="btn btn-primary mb-3 mb-sm-0">
                                Mon Porfile</a>
                        @else
                            <a href="{{ route('account.login') }}" class="btn btn-primary mb-3 mb-sm-0">M'inscrire</a>
                        @endif
                    </div>
                </div>
                <div>
                    <div smooth='true' class='cs-down_btn md:mt-5 mt-5'></div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container mt-5 ">
            <div class="row mt-3">
                <div class="col-md-6">
                    <img src="{{ asset('assets/images/show.png') }}" class="img-fluid" alt="Logo">
                </div>
                <div class="col-md-6 mt-5">

                    <h3 class="textU">Qui sommes-nous</h3>

                    <p class="text-sm-md" style="text-align: justify;">
                        Bienvenue sur <strong>Lkhdma</strong>, la plateforme dédiée au talent artisanal personnel au Maroc.
                        <br>Lkhdma connecte les talents aux opportunités correspondant à leurs compétences, pour une
                        recherche d'emploi réussie, qu'ils soient artisans expérimentés ou jeunes diplômés.. <br> Développé
                        par
                        <a href="https://www.linkedin.com/in/ayoub-smaini " target="block">
                            <strong class="textR">Ayoub Smaini</strong>.</a>

                    </p>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container  mb-5">
            <div class="row mt-3">
                <div class="col-md-6 mt-5">
                    <h3 class="textU">La Richesse de l'Artisanat Marocain</h3>
                    <p class="text-sm-md" style="text-align: justify;">
                        L'artisanat au Maroc est riche et diversifié, reflétant l'histoire, la culture et les traditions du
                        pays. Les artisans marocains sont réputés pour leur savoir-faire exceptionnel dans divers métiers,
                        allant de la poterie et de la vannerie à la broderie, en passant par le travail du bois, du métal et
                        du cuir.
                    </p>
                </div>
                <div class="col-md-6 text-center">
                    <img src="{{ asset('assets/images/flag.jpg') }}" style="width: 300px;" class="img-fluid moving-image"
                        alt="Logo">
                </div>
            </div>
        </div>
    </section>
    <section class="section bg-2 py-5">
        <div class="container">
            <div class="circle-container">
                <div class="row pt-5">
                    <div class="col-md-4">
                        <div class="card">
                            <img src="{{ asset('assets/images/p1.jpg') }}" class="card-img-top img-fluid"
                                alt="Artisan at work">
                            <div class="card-body">
                                <p class="card-text">Un artisan fabriquant méticuleusement une pièce, mettant en valeur le
                                    dévouement et la précision requis dans l’artisanat traditionnel.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <img src="{{ asset('assets/images/p2.jpg') }}" class="card-img-top img-fluid"
                                alt="Modern machinery">
                            <div class="card-body">
                                <p class="card-text">Une sélection de matières premières haut de gamme, soulignant
                                    l'importance de la qualité dans la création de produits durables et beaux.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <img src="{{ asset('assets/images/p3.jpg') }}" class="card-img-top img-fluid"
                                alt="Raw materials">
                            <div class="card-body">
                                <p class="card-text">Machines de pointe utilisées dans le processus de fabrication,
                                    garantissant une production et une efficacité de haute qualité.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-home bg-2 py-5">
        <div class="container">
            <div class="row pt-3">
                <div class="col-md-3">
                    <div class="circle-container">
                        <div class="circle">
                            <img src="{{ asset('assets/images/a.png') }}" class="img-fluid">
                        </div>
                        <p class="circle-text">Savoir-faire </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="circle-container">
                        <div class="circle">
                            <img src="{{ asset('assets/images/b.png') }}" class="img-fluid">
                        </div>
                        <p class="circle-text">Fabrication</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="circle-container">
                        <div class="circle">
                            <img src="{{ asset('assets/images/c.png') }}" class="img-fluid">
                        </div>
                        <p class="circle-text">Matériaux</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="circle-container">
                        <div class="circle">
                            <img src="{{ asset('assets/images/d.png') }}" class="img-fluid">
                        </div>
                        <p class="circle-text">Tradition</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section- bg-2 py-5 ">
        <div class="container">
            <div class="card border p-5">
                <form action="{{ route('jobs') }}" method="GET">
                    <div class="row">
                        <div class="col-md-6 mb-3 mb-sm-3 mb-lg-0">
                            <input type="text" class="form-control" name="keyword" id="keyword"
                                placeholder="Mots clés">
                        </div>
                        <div class="col-md-3 mb-3 mb-sm-3 mb-lg-0">
                            <select name="category" id="category" class="form-select">
                                <option value="">Choisir une catégorie</option>
                                @if ($newCategories->isNotEmpty())
                                    @foreach ($newCategories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class=" col-md-3 mb-xs-3 mb-sm-3 mb-lg-0">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-block">Recherche</button>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <section class="section-1  py-5">
        <div class="container">
            <h3 class="textR text-center">Derniers emplois</h3>
            <div class="row pt-5">
                <div class="job_listing_area">
                    <div class="job_lists">
                        <div class="row">
                            @if ($latestJobs->isNotEmpty())
                                @foreach ($latestJobs as $latestJob)
                                    <div class="col-md-4">
                                        <div class="card border p-3 mb-4">
                                            <div class="card-body">
                                                <h3 class="border-0 textU text-center fs-5 mb-3 pb-2 mb-0">
                                                    {{ $latestJob->title }}</h3>


                                                <div class="bg-light p-3 border" style="border-radius: 10px;">
                                                    <p class="mb-0">
                                                        <span class="fw-bolder">Lieu : </span>
                                                        <span class="ps-1">{{ $latestJob->location }}</span>
                                                    </p>
                                                    <p class="mb-0">
                                                        <span class="fw-bolder">Type d'emploi : </span>
                                                        <span class="ps-1">{{ $latestJob->jobType->name }}</span>
                                                    </p>
                                                    @if (!is_null($latestJob->salary))
                                                        <p class="mb-0">
                                                            <span class="fw-bolder">Salaire : </span>
                                                            <span class="ps-1">{{ $latestJob->salary }}</span> DH
                                                        </p>
                                                    @endif
                                                </div>
                                                <div class="d-grid mt-3">
                                                    <a href="{{ route('jobDetail', $latestJob->id) }}"
                                                        class="btn btn-primary btn-lg">Details</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

{{-- Scripts pour les animation de cards et les icons --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let observerOptions = {
            root: null,
            rootMargin: "0px",
            threshold: 0.1
        };
        function observerCallback(entries, observer) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate');
                    observer.unobserve(entry.target);
                }
            });
        }
        let observer = new IntersectionObserver(observerCallback, observerOptions);
        document.querySelectorAll('.circle-container').forEach(container => {
            observer.observe(container);
        });
    });
</script>
